<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\Models\User;

class LoginController extends Controller
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginGitHub() {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return Socialite::driver('github')->redirect();
    }

    public function callbackGitHub(UserRepository $userRepository) {
        if(!Auth::check()) {
            $getData = Socialite::driver('github')->user();
            $user = $getData->user;
            $userInSystem = $userRepository->getUserBySocId($user, 'github');
            Auth::login($userInSystem);
        }
        return redirect()->route('home');
    }

    protected function createUser($getData, $provider){

        $user = User::where('provider_id', $getData->id)->first();

        if (!$user) {
            $user = User::create([
                'name'     => $getData->name,
                'email'    => $getData->email,
                'provider' => $provider,
                'provider_id' => $getData->id
            ]);
        }
        return $user;
    }
}
