<?php

namespace App\Http\Controllers\Users\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Services\User\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public $service;
    public function __construct(LoginService $service)
    {
        $this->service = $service;
    }

    public function __invoke(LoginRequest $request)
    {
        $data = $request->validated();


        if ($this->service->store($data)) {
            return view("account/index");
        } else {
            return back()->withErrors(['login' => 'Неверные учетные данные.'])->withInput();
        }
    }
}
