<?php

namespace App\Http\Controllers\Users\Account;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    public function __invoke()
    {
        return view("account/index");
    }
}
