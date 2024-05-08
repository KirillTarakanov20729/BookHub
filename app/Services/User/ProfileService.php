<?php

namespace App\Services\User;

use App\Models\Book;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class ProfileService
{
    private Authenticatable $user;
    public function get_user(): Authenticatable
    {
        return $this->user = Auth::user();
    }

    public function get_active_book(): Book
    {
        return Book::query()->where('id', $this->user->active_book_id)->first();
    }
}
