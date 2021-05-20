<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateStockRequest;
use App\Http\Requests\CreateStockRequest;

class StockController extends Controller
{
    
    public function index($itemId)
    {
        return Auth::user()
            ->home()
            ->firstOrFail()
            ->items()
            ->findOrFail($itemId)
            ->stocks()
            ->with('box', 'item.owners', 'expire')
            ->get()
            ->each(function($stock){
                $stock->item->makeHidden('stocks');
            });
    }

    public function show($itemId, $stockId)
    {
        return Auth::user()
            ->home()
            ->firstOrFail()
            ->stocks()
            ->where('item_id', '=', $itemId)
            ->with('box', 'item.owners', 'expire')
            ->findOrFail($stockId);
    }

    public function create(CreateStockRequest $request, $itemId)
    {

        $item = Auth::user()
            ->home()
            ->firstOrFail()
            ->items()
            ->findOrFail($itemId);
    
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

    public function update(UpdateStockRequest $request, $itemId, $stockId)
    {
        $item = Auth::user()
            ->home()
            ->firstOrFail()
            ->items()
            ->findOrFail($itemId);

        $stock = $item
            ->stocks()
            ->with('box', 'item.owners', 'expire')
            ->findOrFail($stockId);
        
        $stock -> update(
            $request->only([
                'count',
                'box_id'
            ])
        );
    
        $disposable = $item->disposable()->first();

        if($disposable){
            $disposable->expires()->updateOrCreate(
                ['stock_id' => $stockId],
                ['expiration_date' => $request->input('expiration_date')]
            );
        }
        
        return response(null,204);

    }

}
