<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\GetUserRequest;
use App\Services\Admin\UserService;
use Illuminate\View\View;

class UserController extends Controller
{
    private UserService $service;
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    public function index(GetUserRequest $request): View
    {
        $data = $request->validated();

        $users = $this->service->get_users($data);

        return view('admin.users.index', ['users' => $users]);
    }
}
