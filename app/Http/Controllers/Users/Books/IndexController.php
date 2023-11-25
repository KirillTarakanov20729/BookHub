<?php

namespace App\Http\Controllers\Users\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
       return view('users/books/index');
    }
}
