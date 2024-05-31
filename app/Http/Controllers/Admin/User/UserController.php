<?php

namespace App\Http\Controllers\Admin\User;

use App\DTO\Admin\User\SearchUserDTO;
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
        $dataForSearch  = new SearchUserDTO($request->validated());

        $users = $this->service->get_users($dataForSearch);

        $dataForIndex = $this->service->get_index_data();

        return view('admin.users.index', [
            'users' => $users,
            'data' => $dataForIndex
        ]);
    }
}
