<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Box;

use App\Http\Requests\UpdateBoxRequest;

use App\Http\Requests\CreateBoxRequest;

class BoxController extends Controller
{
    //
    public function create(CreateBoxRequest $request)
    {
        $box = Auth::user()
        ->home()
        ->firstOrFail()
        ->boxes();

        $boxcreated = $box
        ->create(
            $request->only([
                'name',
                'description'
            ])
        );

        return $boxcreated->loadCount('stocks');
    }
    public function update(UpdateBoxRequest $request, $box_id)
    {
        Auth::user()
        ->home()
        ->firstOrFail()
        ->boxes()
        ->findOrFail($box_id)
        ->update(
            $request->only([
                'name',
                'description'
            ])
        );
        return response(null,204);
    }

    public function index()
    {
        // Homeを取得して関連するstocksを取得
        $stocks = Auth::user()->home()->firstOrFail()->boxes()->withCount('stocks')->get();
        return $stocks;
        
    }



    public function show($boxld)
    {
        return Box::with('stocks')->findOrFail($boxld);
    }
}
