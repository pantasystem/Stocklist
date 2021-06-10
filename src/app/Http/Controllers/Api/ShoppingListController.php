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

    /**
     * 自分の所属しているHomeの買い物リストを全て取得します。
     */
    public function index()
    {
        return Auth::user()->home()->first()->shoppingLists()->with('tasks')->get();
    }

    /**
     * 買い物リストを更新します。
     */
    public function update(UpdateShoppingListRequest $request, $shoppingListId)
    {
        $home = Auth::user()->home()->first();
        $sl = $home->shoppingLists()->findOrFail($shoppingListId);
        $sl->fill($request->only('title', 'user_id'));
        return response(null, 204);
    }

    /** 
     * 買い物リストを作成します。
     */
    public function create(CreateShoppingListRequest $request)
    {
        $home = Auth::user()->home()->first();
        return $home->shoppingLists()->create($request->only('title', 'user_id'))->load('tasks','tasks.item', 'user', 'tasks.box'); 
        
    }

    /**
     * 買い物リストを削除します。
     */
    public function delete($shoppingListId)
    {
        $home = Auth::user()->home()->first();
        $home->shoppingLists()->findOrFail($shoppingListId)->delete();
        return response(null, 204);
    }

    /** 
     * 買い物リストを表示します。
     */
    public function show($shoppingListId)
    {
        $home = Auth::user()->home()->first();
        return $home->shoppingLists()->with('tasks','tasks.item', 'user', 'tasks.box')->findOrFail($shoppingListId);
    }
}
