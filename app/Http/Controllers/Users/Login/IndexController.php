<?php

namespace App\Http\Controllers\Users\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('users/login/index');
    }
}
