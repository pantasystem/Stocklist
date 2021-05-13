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

    public function show($id)
    {
        $user = Home::with('members')->get();
        return Home::with('members')->findOrFail($id);
    }

}
