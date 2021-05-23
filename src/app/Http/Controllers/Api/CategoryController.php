<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Home;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddCategoryRequest;

class CategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index() 
    {
        return Auth::user()->home()->first()->categories()->get();
    }

    public function add(AddCategoryRequest $request)
    {
        return Auth::user()->home()->first()->categories()->updateOrCreate(
            ['path' => $request->input('path') ],
            ['path' => $request->input('path')]
        );
    }

    public function delete($categoryId)
    {
        Auth::user()->home()->first()->categories()->findOrFail($categoryId)->delete();
        return response(null, 204);
    }
}
