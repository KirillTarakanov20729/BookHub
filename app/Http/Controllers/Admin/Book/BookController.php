<?php

namespace App\Http\Controllers\Admin\Book;

use App\DTO\Admin\Book\SearchBookDTO;
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
use Illuminate\View\View;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class BookController extends Controller
{
    private AdminBookService $service;
    public function __construct(AdminBookService $service)
    {
        $this->service = $service;
    }

    public function index(GetBookRequest $request): View
    {

        try {
            $book_info = new SearchBookDTO($request->validated());
            $books     = $this->service->get_books($book_info);
            $data      = $this->service->get_data();
            return view('admin.books.index', [
                'books' => $books,
                'genres' => $data['genres'],
                'authors' => $data['authors'],
                'publishers' => $data['publishers'],
                'subscription_types' => $data['subscription_types'],
                'age_limits' => $data['age_limits']
            ]);
        } catch (\Exception $e) {

        }
    }

    public function create(): View
    {
        $data = $this->service->get_data();

        return view('admin.books.create', [
            'genres' => $data['genres'],
            'age_limits' => $data['age_limits'],
            'authors' => $data['authors'],
            'publishers' => $data['publishers'],
            'subscription_types' => $data['subscription_types']
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
            'age_limits' => $data['age_limits'],
            'genres' => $data['genres'],
            'authors' => $data['authors'],
            'publishers' => $data['publishers'],
            'subscription_types' => $data['subscription_types']
        ]);
    }

    public function update(UpdateBookRequest $request): RedirectResponse
    {
        $data = new UpdateBookDTO($request->validated());

        if ($this->service->update_book($data)){
            return redirect()->route('admin.books.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }

    public function delete(int $id): RedirectResponse
    {
        $this->service->delete_book($id);
        return redirect()->route('admin.books.index');
    }
}
