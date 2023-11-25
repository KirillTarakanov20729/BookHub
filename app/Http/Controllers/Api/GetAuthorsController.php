<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class GetAuthorsController extends Controller
{
    public function __invoke()
    {
        $authors = Author::all();

        return $authors;
    }
}
