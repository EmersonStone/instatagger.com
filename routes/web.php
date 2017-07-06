<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('app');
});

Route::get('auth/logout', 'AuthController@logout');
Route::get('auth/instagram', 'AuthController@redirectToProvider');
Route::get('auth/instagram/callback', 'AuthController@handleProviderCallback');

Route::get('webhooks/instagram', 'WebhooksController@verify');
Route::post('webhooks/instagram', 'WebhooksController@receive');

Route::get('/terms-and-conditions', function() {
  return view('terms');
});

Route::get('/privacy-policy', function() {
  return view('privacy');
});

Route::get('/{vue?}', function() {
  return view('app');
})->where('vue', '[\/\w\.-]*');
