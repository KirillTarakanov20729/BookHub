<?php

namespace App\Http\Controllers\Admin\Book;

use App\DTO\Admin\Book\AdminSearchBookDTO;
use App\DTO\Admin\Book\StoreBookDTO;
use App\DTO\Admin\Book\UpdateBookDTO;
use App\DTO\Book\BookData;
use App\DTO\Book\BookDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Book\GetBookRequest;
use App\Http\Requests\Admin\Book\StoreBookRequest;
use App\Http\Requests\Admin\Book\UpdateBookRequest;
use App\Services\Admin\AdminBookService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class BookController extends Controller
{
    private AdminBookService $service;
    public function __construct(AdminBookService $service)
    {
        $this->service = $service;
    }

    public function index(GetBookRequest $request)
    {
        $book_info = new AdminSearchBookDTO($request->validated());

        $books     = $this->service->get_books($book_info);

        $data      = $this->service->get_data();

        return view('admin.books.index', [
            'books' => $books,
            'data' => $data
        ]);
    }

    public function create(): View
    {
        $data = $this->service->get_data();

        return view('admin.books.create', [
            'data' => $data
        ]);
    }

    public function store(StoreBookRequest $request): RedirectResponse
    {
        $data = new StoreBookDTO($request->validated());

        if ($this->service->store_book($data)){
            return redirect()->route('admin.books.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }

    public function edit(int $id): View
    {
        $book = $this->service->get_book($id);

        $data = $this->service->get_data();

        return view('admin.books.edit', [
            'book' => $book,
            'data' => $data
        ]);

    }

    public function update(UpdateBookRequest $request): RedirectResponse
    {
        $data = new UpdateBookDTO($request->validated());

        if ($this->service->update_book($data)){
            return redirect()->route('admin.books.index');
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }

    public function delete(int $id): RedirectResponse
    {
        if ($this->service->delete_book($id)) {
            return redirect()->route('admin.books.index');
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }
}
