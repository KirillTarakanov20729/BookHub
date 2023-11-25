<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Author\UpdateService;
use Illuminate\Http\Request;

class UpdateAuthorController extends Controller
{
    private $service;

    public function __construct(UpdateService $service)
    {
        $this->service = $service;
    }

    public function __invoke($id,Request $request)
    {
        $request->merge(['id' => $id]);
        if ($this->service->update($request)) {
            $firstName = $request->input('first_name');
            $lastName = $request->input('last_name');
            return response()->json(['first_name' => $firstName, 'last_name' => $lastName]);
        }
    }
}
