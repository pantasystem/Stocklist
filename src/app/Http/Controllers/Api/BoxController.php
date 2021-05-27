<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateBoxRequest;

class BoxController extends Controller
{
    //
    public function create(CreateBoxRequest $request)
    {
        $box = Auth::user()
        ->home()
        ->firstOrFail()
        ->boxes();

        $boxcreated = $box
        ->create(
            $request->only([
                'name',
                'description'
            ])
        );

        return $boxcreated->loadCount('stocks');
    }
}
