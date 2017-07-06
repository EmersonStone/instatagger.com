<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use GuzzleHttp\Client;
use App\Models\User;
use App\Models\TaggedPost;

class Hashtagify implements ShouldQueue {

  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  private $_user;
  private $_url;
  private $_caption;
  private $_instagram_id;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(User $user, $instagram_id) {
    $this->_user = $user;
    $this->_instagram_id = $instagram_id;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle() {
    $client = new Client();

    // already dun tagged it
    if ( TaggedPost::where('instagram_id', $this->_instagram_id)->first() ) {
      continue;
    }

    $response = $client->request('GET', 'https://api.instagram.com/v1/media/' . $this->_instagram_id, [
      'query' => [
        'access_token' => decrypt($this->_user->token)
      ]
    ]);

    $media = json_decode((string)$response->getBody());

    // no commenting on _other_ posts
    if ( $media->data->user->id != $this->_user->instagram_id ) {
      return;
    }

    if ( $media->type == 'image' ) {
      $image_classifications = $this->classifyImage($media->data->images->standard_resolution->url);
    } else {
      $image_classification = collect([]);
    }

    if ( !empty($media->data->caption) && !empty($media->data->caption->text) ) {
      $caption_classifications = $this->classifyCaption($media->data->caption->text);
    } else {
      $caption_classifications = collect([]);
    }

    $classifications = $image_classifications->merge($caption_classifications)->unique();

    // nothing to go off of, so skip it and move on
    if ( $classifications->isEmpty() ) {
      return;
    }

    $choices = $this->getHashtags($classifications)->shuffle()->take(4);

    $comment = $choices->map(function($value, $key) {
      return '#' . $value->name;
    })->implode(' ');

    // POST IT
    $client->request('POST', 'https://api.instagram.com/v1/media/' . $this->_instagram_id . '/comments', [
      'query' => [
        'access_token' => decrypt($this->_user->token)
      ],
      'form_params' => [
        'text' => $comment . ' via https://tagnumpi.com and @emersonstone',
      ]
    ]);

    // track posted tags
    foreach ( $choices as $choice ) {
      TaggedPost::create([
        'instagram_id' => $this->_instagram_id,
        'hashtag' => $choice
      ]);
    }
  }

  public function getHashtags($classifications) {
    $hashtags = collect([]);

    foreach ( $classifications as $classification ) {
      $response = $client->request('GET', 'https://api.instagram.com/v1/tags/search', [
        'query' => [
          'q' => $classification,
          'access_token' => decrypt($this->_user->token)
        ]
      ]);

      $results = json_decode((string)$response->getBody());

      if ( !empty($results->data) ) {
        $candidates = collect($results->data)->sortByDesc('media_count')->reject(function($value, $key) {
          // drop hashtags with underscores
          return preg_match("/_/i", $value->name);
        });

        if ( $candidates->isNotEmpty() ) {
          // favor exact matches, where possible
          $exact = $candidates->search(function($item, $key) use ($classification) {
            return $item->name == $classification;
          });

          $hashtags->push($exact !== NULL ? $candidates[$exact] : $candidates->first());
        }
      }
    }

    // get rid of hashtags with less than 1000 uses and less than 4 characters
    $hashtags = $hashtags->reject(function($value, $key) {
      return $value->media_count < 1000 || strlen($value->name) < 4 || !!$this->_user->blacklist_hashtags()->where('hashtag', $value->name)->first();
    });

    return $hashtags;
  }

  public function classifyCaption($caption) {
    $caption = preg_replace("/(#|@)[a-z0-9_]+/i", "", $caption);

    $classifications = [];

    $request = json_encode([
      'encodingType' => 'UTF8',
      'document' => [
        'type' => 'PLAIN_TEXT',
        'content' => $caption
      ]
    ]);

    $client = new Client();

    $response = $client->request('POST', 'https://language.googleapis.com/v1/documents:analyzeEntities', [
      'query' => [
        'key' => env('GOOGLE_API_KEY')
      ],
      'body' => $request
    ]);

    $results = json_decode((string)$response->getBody());

    if ( !empty($results->entities) ) {
      foreach ( $results->entities as $entity ) {
        $classifications[] = strtolower($entity->name);
      }
    }

    return collect($classifications);
  }

  public function classifyImage($image_url) {
    $classifications = [];

    $client = new Client();

    $request = [
      'requests' => [
        'image' => [
          'source' => [
            'imageUri' => $image_url
          ],
        ],
        'features' => [
          [
            'type' => 'LANDMARK_DETECTION',
          ],
          [
            'type' => 'LOGO_DETECTION',
          ],
          [
            'type' => 'LABEL_DETECTION',
          ],
        ]
      ]
    ];

    $request = json_encode($request);

    $response = $client->request('POST', 'https://vision.googleapis.com/v1/images:annotate', [
      'query' => [
        'key' => env('GOOGLE_API_KEY')
      ],
      'body' => $request
    ]);

    $results = json_decode((string)$response->getBody());

    if ( !empty($results->responses[0]) ) {
      $annotations = $results->responses[0];


      foreach ( ['logoAnnotations', 'landmarkAnnotations', 'labelAnnotations'] as $classifier ) {
        if ( !empty($annotations->$classifier) ) {
          foreach ( $annotations->$classifier as $annotation ) {
            $classifications[] = strtolower($annotation->description);
          }
        }
      }
    }

    $classifications = collect($classifications);

    $color_options = ['red', 'orange', 'yellow', 'green', 'blue', 'purple', 'black', 'white'];

    // pluck out colors and use them as modifiers
    $colors = $classifications->filter(function($value, $key) use ($color_options) {
      return in_array($value, $color_options);
    });

    if ( $colors->isNotEmpty() ) {
      $classifications = $classifications->reject(function($value, $key) use ($color_options) {
        return in_array($value, $color_options);
      });

      foreach ( $classifications as $classification ) {
        foreach ( $colors as $color ) {
          $classifications->push($color . ' ' . $classification);
        }
      }
    }

    return $classifications;
  }
}

// dispatch(new \App\Jobs\Hashtagify(App\Models\User::first(), '1061209343249534948_3633506'))
