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

Route::get('/{vue?}', function() {
  if (Auth::check()) {
    return redirect('/dashboard', ['user' => Auth::user()]);
  } else {
    return redirect('/');
  }
})->where('vue', '[\/\w\.-]*');
