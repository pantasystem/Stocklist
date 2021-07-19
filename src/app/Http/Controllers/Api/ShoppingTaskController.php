<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\CreateShoppingTaskRequest;
use App\Http\Requests\UpdateShoppingTaskRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\ShoppingList;
use Carbon\Carbon;

class ShoppingTaskController extends Controller
{
   
    /**
     * @bodyParam item_id number required 買うべき物のId
     * @bodyParam count number required 買う物の個数
     * @bodyParam box_id number optional 買った物の収納場所(任意)
     */
    public function create(CreateShoppingTaskRequest $request, $listId)
    {
        return Auth::user()
            ->home()
            ->first()
            ->shoppingLists()
            ->findOrFail($listId)
            ->tasks()
            ->create(
                $request->only('item_id', 'box_id', 'count')
            );
    }

    /**
     * @bodyParam item_id number required 買うべき物のId
     * @bodyParam count number required 買う物の個数
     * @bodyParam box_id number optional 買った物の収納場所(任意)
     * @bodyParam completed_at date optional このタスクの達成日時
     */
    public function update(UpdateShoppingTaskRequest $request, $listId, $taskId)
    {
        $task = $this->findShoppingList($listId)->tasks()->findOrFail($taskId);
        $task->fill($request->only('item_id', 'box_id', 'count', 'complated_at'));
        $task->save();
        return response(null, 204);
    }


    public function delete($listId, $taskId)
    {
        $this->findShoppingList($listId)->tasks()->findOrFail($taskId)->delete();
        return response(null, 204);
    }


    public function complete($listId, $taskId)
    {
        $task = $this->findShoppingList($listId)->tasks()->findOrFail($taskId);
        if(!$task->completed_at) {
            $task->completed_at = new Carbon('now');
            $task->save();
        }
        return $task;
    }


    public function incomplete($listId, $taskId)
    {
        $task = $this->findShoppingList($listId)->tasks()->findOrFail($taskId);
        $task->completed_at = null;
        $task->save();
        return $task;
    }

    private function findShoppingList($id) : ShoppingList
    {
        return Auth::user()->home()->first()->shoppingLists()->findOrFail($id);
    }
}
