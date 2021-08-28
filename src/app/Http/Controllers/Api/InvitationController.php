<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Invitation;
use App\Home;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\JoinUserRequest;
use Carbon\Carbon;
use DB;

class InvitationController extends Controller
{
    //
    public function store(Request $req){
        $token = (string)Str::uuid();
        $invitation = Invitation::create([
            'token' => $token,
            'home_id' => $req->input('home_id'),
            'user_id' => Auth::user()->id,
            'id' => $req->input('id'),
        ]);
        return [
            'token' => $token,
            'invitation' => $invitation
        ];      
    }

    public function index(){

        $user = Auth::user();

        return Invitation::where('home_id', $user->home_id)->whereNull('accepted_at')->get();
    }

    public function join(JoinUserRequest $req, $token) {
        $invitation = Invitation::where('token', '=', $token)->whereNull('accepted_at')->firstOrFail();
        $user = DB::transaction(function() use ($invitation){
            $user = User::create([
                'email' => $req->email,
                'name' => $req->user_name,
                'password' => Hash::make($req->password),
                'home_id' => $invitation->home_id,
            ]);

            $invitation->accepted_at = Carbon::now();
            $invitation->save();

            return $user;
        });
        $token = $user->createToken($req->device_name ?? 'unknown')->plainText;
        return [
            'token' => $token,
            'user' => $user
        ];
    }
}   
