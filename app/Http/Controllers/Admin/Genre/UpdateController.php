<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\Genre\UpdateRequest;
use App\Services\Genre\UpdateService;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public $service;
    public function __construct(UpdateService $service)
    {
        $this->service = $service;
    }

    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();


        if ($this->service->update($data)) {
            return redirect()->route('admin.genres.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['name' => 'Такой жанр уже существует']);
        }
    }
}
