<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class WebhooksController extends Controller {

  public function verify(Request $request) {
    $this->validate($request, [
      'hub_mode' => 'required|in:subscribe',
      'hub_challenge' => 'required',
      'hub_verify_token' => 'required|in:' . env('INSTAGRAM_VERIFY_TOKEN')
    ]);

    return $request->input('hub_challenge');
  }

  public function receive(Request $request) {
    $payload = json_decode($request->getContent());

    foreach ( $payload as $update ) {
      if ( $update->subscription_id === 0 ) {
        dispatch(new \App\Jobs\Hashtagify(User::where('instagram_id', $update->object_id), $update->data->media_id));
      }
    }
  }
}
