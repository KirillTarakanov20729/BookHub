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

        $total_read_books = $this->service->get_total_read_books();

        $favorite_genres = $this->service->get_favorite_genres();

        $favorite_authors = $this->service->get_favorite_authors();

        return view('user.profile.profile', [
            'user' => $user,
            'active_book' => $active_book,
            'total_read_books' => $total_read_books,
            'favorite_genres' => $favorite_genres,
            'favorite_authors' => $favorite_authors
        ]);
    }
}
