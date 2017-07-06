<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhooksController extends Controller {

  public function verify(Request $request) {
    $this->verify($request, [
      'hub.mode' => 'required|in:subscribe',
      'hub.challenge' => 'required',
      'hub.verify_token' => 'required|in:' . env('INSTAGRAM_VERIFY_TOKEN')
    ]);
  }

  public function receive(Request $request) {

  }
}
