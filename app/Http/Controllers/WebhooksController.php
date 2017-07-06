<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    \Log::info($request);
  }
}
