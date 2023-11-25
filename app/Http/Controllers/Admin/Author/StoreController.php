<?php

namespace App\Http\Controllers\Admin\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\StoreRequest;
use App\Services\Author\StoreService;
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

        if ($this->service->store($data))
        {
            return redirect()->route('admin.authors.index');
        }
        {
            return back()->withErrors(['full_name' => 'Такой автор уже существует'])->withInput();
        }

    }
}
