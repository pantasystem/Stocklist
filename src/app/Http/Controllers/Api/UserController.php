<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

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

    public function store(CreateUserRequest $request)
    {
        $user=Auth::user();

        $user->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return $user->firstOrFail()->home()->create([
            'name' => $request->input('home_name'),
        ]);
    }

}
