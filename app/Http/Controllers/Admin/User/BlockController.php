<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function __invoke(User $user)
    {
       $user->isActive = false;
       $user->save();

       return redirect()->back();
    }
}
