<?php

namespace App\Http\Controllers\Auth;

use App\DTO\Auth\LoginDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login\LoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    private AuthService $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(): View
    {
        return view('auth.login.login');
    }

    public function login_check(LoginRequest $request): RedirectResponse
    {
        $data = new LoginDTO($request->validated());

        if ($this->authService->login_user($data))
        {
            return redirect()->route('user.books.index');
        }
        else
        {
            return back()->withErrors(['error' => 'Неверный логин или пароль'])->onlyInput('email');
        }
    }

}
