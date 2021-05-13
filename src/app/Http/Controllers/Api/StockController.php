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

}
