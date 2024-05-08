<?php

namespace App\Http\Controllers\Admin\Publisher;

use App\DTO\Admin\Publisher\SearchPublisherDTO;
use App\DTO\Admin\Publisher\StorePublisherDTO;
use App\DTO\Admin\Publisher\UpdatePublisherDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Publisher\GetPublisherRequest;
use App\Http\Requests\Admin\Publisher\StorePublisherRequest;
use App\Http\Requests\Admin\Publisher\UpdatePublisherRequest;
use App\Services\Admin\PublisherService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PublisherController extends Controller
{
    private PublisherService $service;
    public function __construct(PublisherService $service)
    {
        $this->service = $service;
    }

    public function index(GetPublisherRequest $request): View
    {
        $data = new SearchPublisherDTO($request->validated());

        $publishers = $this->service->get_publishers($data);

        return view('admin.publishers.index', ['publishers' => $publishers]);
    }


    public function create(): View
    {
        return view('admin.publishers.create');
    }


    public function store(StorePublisherRequest $request): RedirectResponse
    {
        $data = new StorePublisherDTO($request->validated());

        if ($this->service->store_publisher($data)){
            return redirect()->route('admin.publishers.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }


    public function edit($publisherID): View
    {
        $publisher = $this->service->get_publisher($publisherID);

        return view('admin.publishers.edit', ['publisher' => $publisher]);
    }


    public function update(UpdatePublisherRequest $request): RedirectResponse
    {
        $data = new UpdatePublisherDTO($request->validated());

        if ($this->service->update_publisher($data)) {
            return redirect()->route('admin.publishers.index');
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }


    public function delete($publisherID): RedirectResponse
    {
        if ($this->service->delete_publisher($publisherID)){
            return redirect()->route('admin.publishers.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }


}
