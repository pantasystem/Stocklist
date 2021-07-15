<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\User;

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
        /*
        $user=Auth::user();

        $home = $user->firstOrFail()->home()->create([
            'name' => $request->input('home_name'),
        ]);
        */

        $user = new User;
        $user->name = $request->input('user_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        
        // $user = User::create([
        //     'name' => $request->input('user_name'),
        //     'email' => $request->input('email'),
        //     'password' => Hash::make($request->input('password')),
        //     'home_id' => 1,
        // ]);

        $home = $user->home()->create([
            'name' => $request->input('home_name')
        ]);

        $user->home_id = $home->id;
        $user->save();

        // $user->update([
        //     'home_id' => $home->id
        // ]);

        // Auth::attempt($user);

        return $home;
    }

}
