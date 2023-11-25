<?php

namespace App\Http\Controllers\Users\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view("users/register/index");
    }
}
