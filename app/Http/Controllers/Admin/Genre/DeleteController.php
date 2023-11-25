<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Genre $genre)
    {
        $genre->delete();

        return redirect()->back();
    }
}
