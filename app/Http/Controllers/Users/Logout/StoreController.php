<?php

namespace App\Http\Controllers\Users\Logout;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke(User $user)
    {
        Auth::logout($user);
        return redirect()->route('account');
    }
}
