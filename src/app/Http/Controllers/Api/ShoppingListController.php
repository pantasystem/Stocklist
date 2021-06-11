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
        return Auth::user()->home()->first()->shoppingLists()->with('tasks')->get();
    }


    /**
     * @bodyParam title string required 最大二十文字のタイトル
     * @bodyParam user_id number required この買い物リストを担当するユーザーのId
     */
    public function update(UpdateShoppingListRequest $request, $shoppingListId)
    {
        $home = Auth::user()->home()->first();
        $sl = $home->shoppingLists()->findOrFail($shoppingListId);
        $sl->fill($request->only('title', 'user_id'));
        return response(null, 204);
    }


    /**
     * @bodyParam title string required 最大二十文字のタイトル
     * @bodyParam user_id number required この買い物リストを担当するユーザーのId
     */
    public function create(CreateShoppingListRequest $request)
    {
        $home = Auth::user()->home()->first();
        return $home->shoppingLists()->create($request->only('title', 'user_id'))->load('tasks','tasks.item', 'user', 'tasks.box'); 
        
    }


    public function delete($shoppingListId)
    {
        $home = Auth::user()->home()->first();
        $home->shoppingLists()->findOrFail($shoppingListId)->delete();
        return response(null, 204);
    }

  
    public function show($shoppingListId)
    {
        $home = Auth::user()->home()->first();
        return $home->shoppingLists()->with('tasks','tasks.item', 'user', 'tasks.box')->findOrFail($shoppingListId);
    }
}
