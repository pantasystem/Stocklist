<?php

namespace App\Http\Controllers;

use App\User; //User 追加
use App\Home; //Home 追加

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *リソースのリストを表示する
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //userの所属しているhomeを取得
        $home = User::with('home')->get();
        
        $menbers = Home::with('members')->find(id);

        return view("/homes", [
            'home' => $home, 
            'menbers' => $menbers,
        ]);
    }

}