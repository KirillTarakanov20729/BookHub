<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register\StoreUserRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    private AuthService $storeUserService;
    public function __construct(AuthService $storeUserService)
    {
        $this->storeUserService = $storeUserService;
    }

    public function register(): View
    {
        return view('auth.register.register');
    }

    public function store_user(StoreUserRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($this->storeUserService->register_user($data))
        {
            Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
            return redirect()->route('user.books.index');
        }
        else {
            return redirect()->back()->withErrors(['error' => 'Произошла ошибка, попробуйте позже'])->withInput();
        }

    }
}
