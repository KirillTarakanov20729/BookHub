<?php

namespace App\Http\Controllers\Admin\Feature;

use App\DTO\Admin\Feature\SearchFeatureDTO;
use App\DTO\Admin\Feature\StoreFeatureDTO;
use App\DTO\Admin\Feature\UpdateFeatureDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Feature\GetFeatureRequest;
use App\Http\Requests\Admin\Feature\StoreFeatureRequest;
use App\Http\Requests\Admin\Feature\UpdateFeatureRequest;
use App\Services\Admin\FeatureService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FeatureController extends Controller
{
    private FeatureService $service;
    public function __construct(FeatureService $service)
    {
        $this->service = $service;
    }

    public function index(GetFeatureRequest $request): View
    {
        $data = new SearchFeatureDTO($request->validated());

        $features = $this->service->get_features($data);

        return view('admin.features.index', ['features' => $features]);
    }

    public function create(): View
    {
        return view('admin.features.create');
    }

    public function store(StoreFeatureRequest $request): RedirectResponse
    {
        $data = new StoreFeatureDTO($request->validated());

        if ($this->service->store_feature($data)){
            return redirect()->route('admin.features.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }

    public function edit(int $featureID): View
    {
        $feature = $this->service->get_feature($featureID);

        return view('admin.features.edit', ['feature' => $feature]);
    }

    public function update(UpdateFeatureRequest $request): RedirectResponse
    {
        $data = new UpdateFeatureDTO($request->validated());

        if ($this->service->update_feature($data)){
            return redirect()->route('admin.features.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }

    public function delete(int $featureID): RedirectResponse
    {
        if ($this->service->delete_feature($featureID)){
            return redirect()->route('admin.features.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }
}
