<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;
use App\Models\User;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
      $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider() {
      return Socialite::driver('instagram')->scopes(['basic', 'comments'])->redirect();
    }

    public function handleProviderCallback() {
      $instagram_user = Socialite::driver('instagram')->user();

      $user = User::updateOrCreate([
        'instagram_id' => $instagram_user->getId(),
      ],[
        'name' => $instagram_user->getName(),
        'avatar' => $instagram_user->getAvatar(),
        'username' => $instagram_user->getNickname(),
        'token' => encrypt($instagram_user->token),
      ]);

      Auth::login($user, true);

      return redirect($this->redirectPath());
    }
}
