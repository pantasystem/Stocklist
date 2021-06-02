<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CreateItemRequest extends FormRequest
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
            'is_disposable' => ['required', Rule::in(['true', 'false'])],
            'image' => ['required','image'],
            'description' => ['max:255', 'string'],
            'category_id' => [
                Rule::exists('categories', 'id')->where(function($query) use ($homeId) {
                    $query->where('home_id', '=', $homeId);
                }),
            ]
        ];
    }
}
