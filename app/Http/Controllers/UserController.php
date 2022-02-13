<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileUpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    public function save(UserProfileUpdateRequest $request){
        $user = User::updateUser($request);
        $errors = [];
        if(!$user){
            $errors['current_password'][] = 'Пароль указан неверно';
            return redirect()->back()
                ->withErrors($errors);
        } else {
            return redirect()->route("profiles::update", ['user' => $user])
                ->with('success', "Данные сохранены");
        }
    }

    public function update(){
        return view("user", ['user' => \Auth::user()]);
    }
}
