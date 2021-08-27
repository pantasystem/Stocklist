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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MobileUserController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        
        $email = $request->input('email');
        $user = User::where('email', $email)->with('home')->firstOrFail();
        if(!($user && Hash::check($request->input('password', $user->password)))) {
            throw ValidationException::withMessages([
                'email' => ['メールアドレスまたはパスワードが違います。'],
            ]);
        }
        
        $token = $user->createToken($request->input('device_name') ?? 'unknown');
        return [
            'token' => $token,
            'user' => $user
        ];
        
    }


    public function store(CreateUserRequest $request)
    {


        $user = new User;
        $user->name = $request->input('user_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        

        $home = DB::transaction(function() use ($user,$request){
            return $user->home()->create([
                'name' => $request->input('home_name')
            ]);

            $user->home_id = $home->id;
            $user->save();
        });
        

        // $user->update([
        //     'home_id' => $home->id
        // ]);
        $user->load('home');
        $token = $user->createToken($request->input('device_name') ?? 'unknown')->plainTextToken;
        return [
            'token' => $token,
            'user' => $user,
        ];

    }

}
