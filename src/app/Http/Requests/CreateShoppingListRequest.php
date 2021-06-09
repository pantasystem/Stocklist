<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateShoppingListRequest extends FormRequest
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
            'title' => ['required', 'max:20', 'string', ],
            'user_id' => ['nullable', Rule::exists('users', 'id')->where(function($query) use ($homeId){
                $query->where('home_id', '=', $homeId);
            })]
        ];
    }
}
