<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateShoppingTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'item_id' => ['required', Rule::exists('items', 'id')->where(function($query){
                $homeId = Auth::user()->home_id;
                $query->where('home_id', '=', $homeId);
            })],
            'count' => ['required', 'integer', 'numeric', 'min:0'],
            'completed_at' => ['date', 'nullable'],
            'shopping_list_id' => ['required', Rule::exists('shopping_lists', 'id')->where(function($query){
                $homeId = Auth::user()->home_id;
                $query->where('home_id', '=', $homeId);
            })],
            'box_id' => ['required', Rule::exists('shopping_lists', 'id')->where(function($query){
                $homeId = Auth::user()->home_id;
                $query->where('home_id', '=', $homeId);
            })]
        ];
    }
}
