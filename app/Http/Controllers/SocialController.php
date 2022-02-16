<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function loginVK(){
        if(\Auth::id()){
            return redirect()->route('main');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVk()
    {
        $user = Socialite::driver('vkontakte')->user();
        $ownUser = User::where('id_in_soc', $user->getId())
                       ->where('type_auth', 'vk')
                       ->first();

        if(is_null($ownUser)) {
            $ownUser = new User();
            $ownUser->fill([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => \Hash::make('qwerty'),
                'id_in_soc' => $user->getId(),
                'type_auth' => 'vk'
            ])->save();
        }

        \Auth::login($ownUser);
        return redirect()->route('main');
    }
}
