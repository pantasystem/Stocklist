<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Disposable;
use DB;
use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    //
    public function index(){
        
    }

    public function store(CreateItemRequest $request){

        $user = Auth::user();
        $home = $user->home()->firstOrFail();

        $path = $request->image->store('images');
        $item = new Item(
            array_merge(
                $request->only('name', 'description'),
                ['image_path' => $path]
            )
        );
        DB::transaction(function() use ($item, $home, $request){
            $home->items()->save($item);

            if($request->input('is_disposable') == 'true') {
                $item->disposable()->save(new Disposable());
            }
        });
        
        return $item->load('stocks.box', 'disposable');
    }
    

    public function show($itemId)
    {
        return Item::with('owners', 'stocks.expire', 'stocks.box')->findOrFail($itemId);
    }

    public function update(UpdateItemRequest $request, $itemId)
    {
        $item = Auth::user()->home()->firstOrFail()->items()->with('disposable')->findOrFail($itemId);

        DB::transaction(function() use ($item, $request) {
            $item->fill($request->only(['name', 'description']));

            if($request->input('is_disposable') && !$item->disposable) {
                $item->disposable()->save(new Disposable());
            }else if(!$request->input('is_disposable') && $item->disposable) {
                $item->disposable->delete();
            }
            $item->save();

        });
        

        return $item->load('disposable', 'stocks.expire', 'stocks.box');
    }
}
