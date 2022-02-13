<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileSaveRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::getUsers();
        return view('admin.profiles.index', ['users' => $users]);
    }

    public function create(){
        return view('admin.profiles.create', [
            'user' => new User(),
            'is_succeed' => session('success'),
        ]);
    }

    public function save(AdminProfileSaveRequest $request){
        $user = User::createUser($request);
        $errors = [];
        if(!$user){
            $errors['current_password'][] = 'Пароль указан неверно';
            return redirect()->back()
                ->withErrors($errors);
        } else {
            return redirect()->route("admin::profiles::index")
                ->with('success', "Данные сохранены");
        }
    }

    public function delete($id){
        User::destroy([$id]);
        return redirect()->route("admin::profiles::index");
    }




}
