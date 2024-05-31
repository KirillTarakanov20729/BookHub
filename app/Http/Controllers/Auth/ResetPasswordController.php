<?php

namespace App\Http\Controllers\Auth;

use App\DTO\Auth\ResetPassword\ResetPasswordDTO;
use App\DTO\Auth\ResetPassword\SendEmailForResetPasswordDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Password\ResetPassword\ChangePasswordRequest;
use App\Http\Requests\Auth\Password\ResetPassword\SendEmailRequest;
use App\Models\ResetPasswordRequest;
use App\Services\Auth\ResetPasswordService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
    private ResetPasswordService $service;
    public function __construct(ResetPasswordService $service)
    {
        $this->service = $service;
    }

    public function email(): View
    {
        return view('auth.password.reset.email');
    }

    public function send_email(SendEmailRequest $request): View|RedirectResponse
    {
        try {
        $data = new SendEmailForResetPasswordDTO($request->validated());

        $this->service->send_email($data);

        return view('auth.password.reset.answer');
        } catch (\Exception $exception) {
            Log::error($exception);

            return redirect()->back()->withInput()->withErrors(['error'=> 'Произошла ошибка. Попробуйте еще раз.']);
        }
    }

    public function reset_view(ResetPasswordRequest $reset_password_request): View
    {
        if ($reset_password_request->user_id === null || $reset_password_request->status !== 'pending') {
            abort(404);
        }

        return view('auth.password.reset.reset', [
            'reset_password_request' => $reset_password_request
        ]);
    }

    public function reset_password(ChangePasswordRequest $request, ResetPasswordRequest $reset_password_request): RedirectResponse
    {
        if ($reset_password_request->user_id === null || $reset_password_request->status !== 'pending') {
            abort(404);
        }

        $data = new ResetPasswordDTO(['new_password' => $request->new_password, 'request' => $reset_password_request]);

        if ($this->service->reset_password($data, $reset_password_request)) {
            return redirect()->route('profile');
        } else {
            return redirect()->back()->withInput()->withErrors(['error'=> 'Произошла ошибка. Попробуйте еще раз.']);
        }
    }
}
