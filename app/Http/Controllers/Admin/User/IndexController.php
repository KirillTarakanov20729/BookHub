<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::query()
            ->where('isAdmin', '!=', '1')
            ->orderBy('email', 'asc')
            ->get();
        return view('admin/users/index', compact('users'));
    }
}
