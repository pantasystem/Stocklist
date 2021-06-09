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

    }

    public function create(CreateShoppingListRequest $request)
    {

    }

    public function delete($shoppingListId)
    {

    }

    public function show($shoppingListId)
    {

    }
}
