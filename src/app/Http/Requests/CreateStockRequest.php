<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateStockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $homeId = Auth::user()->home_id;
        return [
            'count' => ['required', 'integer', 'numeric', 'min:0'],
            'box_id' => [
                'required',
                Rule::exists('boxes', 'id')->where(function($query) use ($homeId){
                    $query->where('home_id', $homeId);
                })
            ],
            'item_id' => [
                'required',
                Rule::exists('items', 'id')->where(function($query) use ($homeId) {
                    $query->where('home_id', $homeId);
                })
            ],
            'expiration_date' => ['date'],
        ];
    }
}
