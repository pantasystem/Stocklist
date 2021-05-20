<?php

namespace App\Http\Controllers\Api;

use App\User; //User 追加
use App\Home; //Home 追加

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
