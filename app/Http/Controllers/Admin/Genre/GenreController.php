<?php

namespace App\Http\Controllers\Admin\Genre;

use App\DTO\Admin\Genre\SearchGenreDTO;
use App\DTO\Admin\Genre\StoreGenreDTO;
use App\DTO\Admin\Genre\UpdateGenreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Genre\GetGenreRequest;
use App\Http\Requests\Admin\Genre\StoreGenreRequest;
use App\Http\Requests\Admin\Genre\UpdateGenreRequest;
use App\Services\Admin\GenreService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GenreController extends Controller
{
    private GenreService $service;
    public function __construct(GenreService $service)
    {
        $this->service = $service;
    }

    public function index(GetGenreRequest $request): View
    {
        $data = new SearchGenreDTO($request->validated());

        $genres = $this->service->get_genres($data);

        return view('admin.genres.index', ['genres' => $genres]);
    }

    public function create(): View
    {
        return view('admin.genres.create');
    }

    public function store(StoreGenreRequest $request): RedirectResponse
    {
        $data = new StoreGenreDTO($request->validated());

        if ($this->service->store_genre($data)){
            return redirect()->route('admin.genres.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }

    public function edit(int $genreID): View
    {
        $genre = $this->service->get_genre($genreID);

        return view('admin.genres.edit', ['genre' => $genre]);
    }

    public function update(UpdateGenreRequest $request): RedirectResponse
    {
        $data = new UpdateGenreDTO($request->validated());

        if ($this->service->update_genre($data)){
            return redirect()->route('admin.genres.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }

    public function delete(int $genreID): RedirectResponse
    {
        if ($this->service->delete_genre($genreID)){
            return redirect()->route('admin.genres.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }
}
