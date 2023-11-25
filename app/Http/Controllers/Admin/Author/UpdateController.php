<?php

namespace App\Http\Controllers\Admin\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\UpdateRequest;
use App\Services\Author\UpdateService;
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
            return redirect()->route('admin.authors.index');
        }
        else {
            return back()->withErrors(['full_name' => 'Такой автор уже существует'])->withInput();
        }
    }
}
