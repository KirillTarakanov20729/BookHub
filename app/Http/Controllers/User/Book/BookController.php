<?php

namespace App\Http\Controllers\User\Book;

use App\DTO\Admin\Book\SearchBookDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Books\GetBookRequest;
use App\Models\Book;
use App\Services\User\UserBookService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
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

        return view('user.book.main', [
            'data' => $data
        ]);
    }

    public function index(GetBookRequest $request): View
    {
        $data = new SearchBookDTO($request->validated());

        $books = $this->service->get_books($data);

        $data = $this->service->get_data();
        return view('user.book.index',[
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

        return view('user.book.show', [
            'book' => $book
        ]);
    }

    public function read(Book $book): RedirectResponse|ResponseFactory
    {
        if (!$this->service->get_pdf_file($book)){
            return redirect()->back()->withErrors(['error' => 'Текст книги не найден']);
        }
        else {
            return response($this->service->get_pdf_file($book), 200)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="' . $book->name . '.pdf"')
                ->header('Content-Length', strlen($this->service->get_pdf_file($book)));
        }
    }

    public function was_read(int $id): RedirectResponse
    {
        $book = $this->service->get_book($id);

        $this->service->set_book_was_read($book);

        return redirect()->back();
    }

}
