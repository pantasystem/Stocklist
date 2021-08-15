<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Invitation;
use App\Home;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    //
    public function store(Request $req){
        Invitation::create([
            'token' => Hash::make((string) Str::uuid()),
            'home_id' => $req->input('home_id'),
            'user_id' => Auth::user()->id,
            'id' => $req->input('id'),
        ]);

        return url("/api/invitations/{$user->token}/register");
    }

    public function index(Request $req, $token){

        $user = Auth::user();

        $home_id = Invitation::where('token', $token)->create([
            
        ]);

    }

}
