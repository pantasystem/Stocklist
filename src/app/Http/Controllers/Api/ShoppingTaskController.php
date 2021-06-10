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
     * 買い物リストにタスクを追加します。
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
     * タスクを更新します。
     */
    public function update(UpdateShoppingTaskRequest $request, $listId, $taskId)
    {
        $task = $this->findShoppingList($listId)->tasks()->findOrFail($taskId);
        $task->fill($request->only('item_id', 'box_id', 'count', 'complated_at'));
        return response(null, 204);
    }

    /**
     * タスクを削除します。
     */
    public function delete($listId, $taskId)
    {
        $this->findShoppingList($listId)->tasks()->findOrFail($taskId)->delete();
        return response(null, 204);
    }

    /**
     * タスクの状態を完了にします。
     */
    public function complete($listId, $taskId)
    {
        $task = $this->findShoppingList($listId)->tasks()->findOrFail($taskId);
        if(!$task->completed_at) {
            $task->completed_at = new Carbon('now');
            $task->save();
        }
        return $task;
    }

    /**
     * タスクの状態を未完了にします。
     */
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
