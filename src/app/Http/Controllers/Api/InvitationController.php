<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Invitation;

class InvitationController extends Controller
{
    //
    public function store(){
        $user = Invitation::create([
            'token' => Hash::make((string) Str::uuid()),
            'home_id' => Auth::user()->home()->id,
            'user_id' => Auth::user()->id,
         ]);
    }

    public function generate(Request $req){
        /**
         * 招待ＵＲＬの作成
        */
        $token = Invitation::find($req->input('id'))->token;

        return url("/api/invitations/${token}/register");

    }

}
