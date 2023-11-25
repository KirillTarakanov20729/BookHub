<?php

namespace App\Http\Controllers\Users\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Services\User\RegisterService;

class StoreController extends Controller
{
    public $service;
    public function __construct(RegisterService $service)
    {
        $this->service = $service;
    }

    public function __invoke(RegisterRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('home');
    }
}
