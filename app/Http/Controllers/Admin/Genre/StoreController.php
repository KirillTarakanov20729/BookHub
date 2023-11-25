<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\Genre\StoreRequest;
use App\Services\Genre\StoreService;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public $service;
    public function __construct(StoreService $service)
    {
        $this->service = $service;
    }

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();


        if ($this->service->store($data)) {
            return redirect()->route('admin.genres.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['name' => 'Такой жанр уже существует']);
        }
    }
}
