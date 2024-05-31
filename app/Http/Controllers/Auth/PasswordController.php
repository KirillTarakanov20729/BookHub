<?php

namespace App\Http\Controllers\Auth;

use App\DTO\Auth\ChangePasswordDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Password\ResetPassword\SendEmailRequest;
use App\Http\Requests\Auth\Password\UpdatePasswordRequest;
use App\Services\Auth\PasswordService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PasswordController extends Controller
{
    private PasswordService $service;
    public function __construct(PasswordService $service)
    {
        $this->service = $service;
    }

    public function edit(Request $request): View
    {
        $user = $request->user();

        return view('auth.password.edit', [
            'user' => $user
        ]);
    }

    public function update(UpdatePasswordRequest $request): RedirectResponse
    {
        $data = new ChangePasswordDTO($request->validated());

        if ($this->service->change_password($request->user(), $data)) {
            return redirect()->route('profile');
        } else {
            return redirect()->back()->withErrors(['error' => 'Произошла ошибка, попробуйте позже'])->withInput();
        }
    }

}
