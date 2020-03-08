<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginVK() {
        session()->get('soc.token');
        if (Auth::id()) {
            return redirect()->route('index');
        }
        return Socialite::with('vkontakte')->redirect();
    }
    public function responseVK(UserRepository $userRepository) {
//        dd(Socialite::driver('vkontakte')->user());
        if (Auth::id()) {
            return redirect()->route('index');
        }
        $user = Socialite::driver('vkontakte')->user();

        session(['soc.token' => $user->token]);

        $userInSystem = $userRepository->getUserBySocId($user, 'vk');

        //  $userInSystem = User::query()->find(1);
        // dd($userInSystem);
        Auth::login($userInSystem);
        return redirect()->route('index');
    }

    public function loginGoogle() {
        session()->get('soc.token');
        if (Auth::id()) {
            return redirect()->route('index');
        }
        return Socialite::with('google')->redirect();
    }

    public function responseGoogle(UserRepository $userRepository) {
//        dd(Socialite::driver('vkontakte')->user());
        if (Auth::id()) {
            return redirect()->route('index');
        }
        $user = Socialite::driver('google')->user();

        session(['soc.token' => $user->token]);

        $userInSystem = $userRepository->getUserBySocId($user, 'google');

        //  $userInSystem = User::query()->find(1);
        // dd($userInSystem);
        Auth::login($userInSystem);
        return redirect()->route('index');
    }
}
