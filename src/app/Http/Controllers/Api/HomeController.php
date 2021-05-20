<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User; //User 追加
use App\Home; //Home 追加
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {

    }

    public function store()
    {

    }

    public function show()
    {
        // 現在認証されているユーザーの取得
        $user = Auth::user();
        return $home = $user->home::with('members')->firstOrFail();
    }

}
