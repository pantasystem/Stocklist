<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    //

    public function login(LoginUserRequest $request)
    {
        
        if (Auth::attempt($request->all())) {
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
