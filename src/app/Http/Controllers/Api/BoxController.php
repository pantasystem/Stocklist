<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Box;

class BoxController extends Controller
{
    //
    public function index()
    {
        // Homeを取得して関連するstocksを取得
        $stocks = Auth::user()->home()->firstOrFail()->boxes()->withCount('stocks')->get();
        return $stocks;
        
    }

    public function store()
    {

    }

    public function show($boxld)
    {
        return Box::with('stocks')->findOrFail($boxld);
    }
}
