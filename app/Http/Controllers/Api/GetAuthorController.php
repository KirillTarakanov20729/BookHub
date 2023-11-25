<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class GetAuthorController extends Controller
{
    public function __invoke($id)
    {
        $author = Author::query()->find($id);

        return $author;
    }
}
