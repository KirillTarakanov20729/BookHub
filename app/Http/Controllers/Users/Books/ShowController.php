<?php

namespace App\Http\Controllers\Users\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Book $book)
    {
        return "Страница книги $book->id";
    }
}
