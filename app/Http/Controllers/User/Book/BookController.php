<?php

namespace App\Http\Controllers\User\Book;

use App\DTO\Admin\Book\SearchBookDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Books\GetBookRequest;
use App\Models\Book;
use App\Services\User\UserBookService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookController extends Controller
{
    private UserBookService $service;

    public function __construct(UserBookService $service)
    {
        $this->service = $service;
    }

    public function main(): View
    {
        $data = $this->service->get_books_for_main_page();

        return view('user.books.main', [
            'data' => $data
        ]);
    }

    public function index(GetBookRequest $request): View
    {
        $data = new SearchBookDTO($request->validated());

        $books = $this->service->get_books($data);

        $data = $this->service->get_data();
        return view('user.books.index',[
            'books' => $books,
            'genres' => $data['genres'],
            'authors' => $data['authors'],
            'publishers' => $data['publishers'],
            'age_limits' => $data['age_limits'],
        ]);
    }

    public function show(int $id): View
    {
        $book = $this->service->get_book($id);

        $user = $this->service->get_user();

        return view('user.books.show', [
            'book' => $book,
            'user' => $user
        ]);
    }

    public function read(Book $book)
    {
        $response = $this->service->get_pdf_file($book);

        if (!$response) {
            return redirect()->back()->withErrors(['error' => 'Текст книги не найден']);
        }
        else {
            return response($response, 200)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="' . $book->name . '.pdf"')
                ->header('Content-Length', strlen($response));
        }
    }

    public function was_read(int $id): RedirectResponse
    {
        $book = $this->service->get_book($id);

        $this->service->set_book_was_read($book);

        return redirect()->back();
    }

}
