<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\CreateShoppingTaskRequest;
use App\Http\Requests\UpdateShoppingTaskRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ShoppingTaskController extends Controller
{
    //
    public function create(CreateShoppingTaskRequest $request, $listId)
    {
        Auth::user()
            ->home()
            ->first()
            ->shoppingLists()
            ->findOrFail($listId)
            ->tasks()
            ->create(
                $request->only('item_id', 'box_id', 'count')
            );
    }

    public function update(UpdateShoppingTaskRequest $request, $listId, $taskId)
    {
        $task = $this->findShoppingList($listId)->tasks()->findOrFail($taskId);
        $task->fill($request->only('item_id', 'box_id', 'count', 'complated_at'));
        return response(null, 204);
    }

    public function delete($listId, $taskId)
    {
        findShoppingList($listId)->tasks()->findOrFail($taskId)->delete();
        return response(null, 204);
    }

    public function complete($listId, $taskId)
    {
        $task = findShoppingList($listId)->tasks()->findOrFail($taskId);
        if($task->complated_at) {
            $task->complated_at = new Carbon('now');
            $task->save();
        }
        return $task;
    }

    public function incomplete($listId, $taskId)
    {
        $task = findShoppingList($listId)->tasks()->findOrFail($taskId);
        $task->complated_at = null;
        $task->save();
        return $task;
    }

    private function findShoppingList($id) : ShoppingTask
    {
        return Auth::user()->home()->first()->shoppingLists()->findOrFail($id);
    }
}
