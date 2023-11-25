<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UnblockController extends Controller
{
    public function __invoke(User $user)
    {
       $user->isActive = 1;
       $user->save();

       return redirect()->back();
    }
}
