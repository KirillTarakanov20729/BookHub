<?php

namespace App\Http\Controllers\Admin\Author;

use App\DTO\Admin\Author\SearchAuthorDTO;
use App\DTO\Admin\Author\StoreAuthorDTO;
use App\DTO\Admin\Author\UpdateAuthorDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Author\GetAuthorRequest;
use App\Http\Requests\Admin\Author\StoreAuthorRequest;
use App\Http\Requests\Admin\Author\UpdateAuthorRequest;
use App\Services\Admin\AuthorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthorController extends Controller
{
    private AuthorService $service;
    public function __construct(AuthorService $service)
    {
        $this->service = $service;
    }

    public function index(GetAuthorRequest $request): View
    {
        $data = new SearchAuthorDTO($request->validated());

        $authors = $this->service->get_authors($data);

        return view('admin.authors.index', ['authors' => $authors]);
    }

    public function create(): View
    {
        return view('admin.authors.create');
    }

    public function store(StoreAuthorRequest $request): RedirectResponse
    {
        $data = new StoreAuthorDTO($request->validated());

        if ($this->service->store_author($data)){
            return redirect()->route('admin.authors.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }

    public function edit(int $authorID): View
    {
        $author = $this->service->get_author($authorID);

        return view('admin.authors.edit', ['author' => $author]);
    }

    public function update(UpdateAuthorRequest $request): RedirectResponse
    {
        $data = new UpdateAuthorDTO($request->validated());

        if ($this->service->update_author($data)){
            return redirect()->route('admin.authors.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }

    public function delete(int $authorID): RedirectResponse
    {
       if ($this->service->delete_author($authorID)){
            return redirect()->route('admin.authors.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }
}
