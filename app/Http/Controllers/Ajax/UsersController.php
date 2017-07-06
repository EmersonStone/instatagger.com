<?php namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaggedPost;
use App\Models\BlacklistHashtag;
use Auth;
use GuzzleHttp\Client;

class UsersController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  public function info(Request $request) {
    $client = new Client();

    $response = $client->request('GET', 'https://api.instagram.com/v1/users/self', [
      'query' => [
        'access_token' => decrypt(Auth::user()->token)
      ]
    ]);

    $user = json_decode((string)$response->getBody());

    return [
      'success' => TRUE,
      'info' => [
        'username' => \Auth::user()->username,
        'full_name' => \Auth::user()->name,
        'avatar' => \Auth::user()->avatar,
        'counts' => $user->data->counts
      ]
    ];
  }

  public function tag(Request $request) {
    $this->validate($request, [
      'instagram_id' => 'required|string'
    ]);

    dispatch(new \App\Jobs\Hashtagify(\Auth::user(), $request->input('instagram_id')));

    return ['success' => TRUE];
  }

  public function posts(Request $request) {
    $client = new Client();

    $response = $client->request('GET', 'https://api.instagram.com/v1/users/self/media/recent', [
      'query' => [
        'access_token' => decrypt(Auth::user()->token)
      ]
    ]);

    $media = json_decode((string)$response->getBody());
    $posts = [];

    if ( !empty($media->data) ) {
      foreach ( $media->data as $media ) {
        $post = [
          'id' => $media->id,
          'video' => $media->type == 'video',
          'image' => $media->images->standard_resolution->url,
          'tags' => []
        ];

        if ( $tags = TaggedPost::where('instagram_id', $media->id)->get()->pluck('hashtag') ) {
          $tags = $tags->map(function($value, $key) {
            return [
              'tag' => $value,
              'blacklisted' => !!Auth::user()->blacklist_hashtags()->where('hashtag', $value)->first()
            ];
          });

          $post['tags'] = $tags;
        }

        $posts[] = $post;
      }
    }

    return ['success' => TRUE, 'posts' => $posts];
  }
}
