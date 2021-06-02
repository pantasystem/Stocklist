<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class UpdateItemRequest extends FormRequest
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
        $homeId = Auth::user()->home_id;
        return [
            'name' => ['required', 'string', 'max:20'],
            'is_disposable' => ['required', 'boolean'],
            'description' => ['max:255'],
            'category_id' => [
                Rule::exists('categories', 'id')->where(function($query) use ($homeId) {
                    $query->where('home_id', '=', $homeId);
                })
            ]
        ];
    }
}
