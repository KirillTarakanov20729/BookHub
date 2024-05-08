<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Services\User\ProfileService;
use Illuminate\View\View;

class ProfileController extends Controller
{
    private ProfileService $service;
    public function __construct(ProfileService $service)
    {
        $this->service = $service;
    }
    public function profile(): View
    {
        $user = $this->service->get_user();

        $active_book = $this->service->get_active_book();

        return view('user.profile.profile', [
            'user' => $user,
            'active_book' => $active_book
        ]);
    }
}
