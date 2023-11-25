<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function store($data): bool
    {
        $email = $data['email'];
        $password = $data['password'];
        $remember_token = $data['remember_token'] ?? null;

        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        if (Auth::attempt($credentials, $remember_token))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
