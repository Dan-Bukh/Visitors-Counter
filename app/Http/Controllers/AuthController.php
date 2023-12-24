<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function login_store(LoginUserRequest $request) {
        if(auth('web')->attempt($request->validated())){
            auth('web')->user();
            return redirect(route('stats'));
        }
        return redirect(route('login'))->withErrors(['email' => 'Неправильное Имя пользователя или Пароль']);
    }

    public function logout() 
    {
        auth('web')->logout();
        return redirect(route('home'));
    }
}
