<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateStockRequest;
use App\Http\Requests\CreateStockRequest;

class StockController extends Controller
{
    
    public function index(Request $request)
    {
        return Auth::user()
            ->home()
            ->firstOrFail()
            ->stocks()
            ->with('box', 'item.owners', 'expire')
            ->whereByItemIdAndBoxId($request->input('item_id'), $request->input('box_id'))
            ->get()
            ->each(function($stock){
                $stock->item->makeHidden('stocks');
            });
    }

    public function show(Request $request, $stockId)
    {
        return Auth::user()
            ->home()
            ->firstOrFail()
            ->stocks()
            ->whereByItemIdAndBoxId($request->input('item_id'), $request->input('box_id'))
            ->with('box', 'item.owners', 'expire')
            ->findOrFail($stockId);
    }

    public function create(CreateStockRequest $request)
    {

        $item = Auth::user()
            ->home()
            ->firstOrFail()
            ->items()
            ->findOrFail($request->input('item_id'));
    
        $stockCreated = $item->stocks()
            ->create(
                $request->only([
                    'count',
                    'box_id'
                ])
            );
        
        $disposable = $item->disposable()->first();

        if($disposable){
            $disposable->expires()->updateOrCreate(
                ['stock_id' => $stockCreated->id],
                ['expiration_date' => $request->input('expiration_date')]
            );
        }
        
        return $stockCreated->load('box', 'item.owners', 'expire');

    }

    public function update(UpdateStockRequest $request, $stockId)
    {
        $home = Auth::user()->home()->firstOrFail();
        $item = $home->items()
            ->find($request->input('item_id'));

        $stock = $home->stocks()
            ->with('box', 'item.owners', 'expire')
            ->findOrFail($stockId);
        
        $stock->update(
            $request->only([
                'count',
                'box_id',
                'item_id'
            ])
        );
    
        

        $disposable = $item->disposable()->first();
        if($disposable){
            $stock->expire()->updateOrCreate(
                ['stock_id' => $stockId],
                [
                    'expiration_date' => $request->input('expiration_date'),
                    'item_id' => $disposable->item_id
                ]
            );
        }
        
        return response(null,204);

    }

}
