<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Author\StoreService;
use Illuminate\Http\Request;

class CreateAuthorController extends Controller
{
    private $service;
    public function __construct(StoreService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        if ($this->service->store($request)) {
            $firstName = $request->input('first_name');
            $lastName = $request->input('last_name');
            return response()->json(['first_name' => $firstName, 'last_name' => $lastName]);
        }
    }
}
