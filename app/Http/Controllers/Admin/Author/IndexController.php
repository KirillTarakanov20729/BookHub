<?php

namespace App\Http\Controllers\Admin\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $authors = Author::query()->orderBy('last_name', 'asc')->get();
        return view('admin/authors/index', compact('authors'));
    }
}
