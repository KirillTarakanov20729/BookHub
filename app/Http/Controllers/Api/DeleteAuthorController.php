<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class DeleteAuthorController extends Controller
{
    public function __invoke(Author $author)
    {
        $author->delete();

        return $author;
    }
}
