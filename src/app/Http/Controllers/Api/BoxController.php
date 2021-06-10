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
    /**
     * 収納を作成します。
     */
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

    /**
     * 収納を更新します。
     */
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

    /**
     * 自分が所属しているHomeの収納を全て取得します。
     */
    public function index()
    {
        // Homeを取得して関連するstocksを取得
        $stocks = Auth::user()->home()->firstOrFail()->boxes()->withCount('stocks')->get();
        return $stocks;
        
    }


    /**
     * 収納をIdに基づいて表示します。
     */
    public function show($boxld)
    {
        return Box::with('stocks')->where('home_id', '=', Auth::user()->home_id)->findOrFail($boxld);
    }
}
