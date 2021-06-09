<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateShoppingListRequest;
use App\Http\Requests\UpdateShoppingListRequest;
use App\Home;
use Illuminate\Support\Facades\Auth;

class ShoppingListController extends Controller
{
    //

    public function index()
    {
        Auth::user()->home()->first()->shoppingLists()->get();
    }

    public function update(UpdateShoppingListRequest $request, $shoppingListId)
    {
        $home = Auht::user()->home()->first();
        $sl = $home->shoppingLists()->findOrFail($shoppingListId);
        $sl->fill($request->only('title'));
        return response(null, 204);
    }

    public function create(CreateShoppingListRequest $request)
    {
        $home = Auht::user()->home()->first();
        return $home->shoppingLists()->create($request->only('title')); 
        
    }

    public function delete($shoppingListId)
    {
        $home = Auht::user()->home()->first();
        $home->shoppingLists()->findOrFail($shoppingListId)->delete();
        return response(null, 204);
    }

    public function show($shoppingListId)
    {
        $home = Auht::user()->home()->first();
        return $home->shoppingLists()->findOrFail($shoppingListId);
    }
}
