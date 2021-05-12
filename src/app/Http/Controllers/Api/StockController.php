<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function show($itemId, $stock_id)
    {
        return Auth::user()
            ->firstOrFail()
            ->home()
            ->findOrFail($itemId)
            ->stocks()
            ->findOrFail($stock_id)
            ->where('id', $stock_id)
            ->get()
            ->each(function($stock){
                $stock->item;
            })
            ->each(function($stock){
                $stock->box;
            });
    }

}
