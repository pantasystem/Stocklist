<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\LoginUserRequest;

class UserController extends Controller
{
    //

    public function login(LoginUserRequest $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            return ['message' => 'ログインしました。'];
        }

        throw ValidationException::withMessages([
            'email' => ['メールアドレスまたはパスワードが違います。'],
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return ['message' => 'ログアウトしました。'];
    }

}
