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
use App\Http\Requests\GetItemRequest;

class ItemController extends Controller
{
    //
    public function index(GetItemRequest $request)
    {
        
        // Homeを取得して関連するItemと一緒にownerとstocks数を取得して返す
        $query = Auth::user()->home()->firstOrFail()->items()->with('owners')->withCount(['stocks']);
        if($request->input('since_updated_at')) {
            $query->where('updated_at', '>=', $request->input('since_updated_at'));
        }
        return $query->get();

    }

    public function store(CreateItemRequest $request)
    {

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
