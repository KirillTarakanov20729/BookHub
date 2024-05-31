<?php

namespace App\Http\Controllers\Admin\SubscriptionType;

use App\DTO\Admin\Feature\SearchFeatureDTO;
use App\DTO\Admin\Feature\StoreFeatureDTO;
use App\DTO\Admin\Feature\UpdateFeatureDTO;
use App\DTO\Admin\SubscriptionType\SearchSubscriptionTypeDTO;
use App\DTO\Admin\SubscriptionType\StoreSubscriptionTypeDTO;
use App\DTO\Admin\SubscriptionType\UpdateSubscriptionTypeDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Feature\GetFeatureRequest;
use App\Http\Requests\Admin\Feature\StoreFeatureRequest;
use App\Http\Requests\Admin\Feature\UpdateFeatureRequest;
use App\Http\Requests\Admin\SubscriptionType\GetSubscriptionTypeRequest;
use App\Http\Requests\Admin\SubscriptionType\StoreSubscriptionTypeRequest;
use App\Http\Requests\Admin\SubscriptionType\UpdateSubscriptionTypeRequest;
use App\Services\Admin\FeatureService;
use App\Services\Admin\SubscriptionTypeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class SubscriptionTypeController extends Controller
{
    private SubscriptionTypeService $service;
    public function __construct(SubscriptionTypeService $service)
    {
        $this->service = $service;
    }

    public function index(GetSubscriptionTypeRequest $request): View
    {
        $data               = new SearchSubscriptionTypeDTO($request->validated());
        $subscription_types = $this->service->get_subscription_types($data);
        return view('admin.subscription_types.index', ['subscription_types' => $subscription_types]);
    }

    public function create(): View|RedirectResponse
    {
        try {
            $features = $this->service->get_features();

            return view('admin.subscription_types.create', [
                'features' => $features
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }

    public function store(StoreSubscriptionTypeRequest $request): RedirectResponse
    {
        $data = new StoreSubscriptionTypeDTO($request->validated());

        if ($this->service->store_subscription_type($data)){
            return redirect()->route('admin.subscription_types.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }

    public function edit(int $subscriptionTypeID): View
    {
            $subscription_type = $this->service->get_subscription_type($subscriptionTypeID);
            $features          = $this->service->get_features();
            return view('admin.subscription_types.edit', [
                'subscription_type' => $subscription_type,
                'features' => $features
            ]);
    }

    public function update(UpdateSubscriptionTypeRequest $request): RedirectResponse
    {
        $data = new UpdateSubscriptionTypeDTO($request->validated());

        if ($this->service->update_subscription_type($data)){
            return redirect()->route('admin.subscription_types.index');
        }
        else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }

    public function delete(int $subscriptionTypeID): RedirectResponse
    {
        if ($this->service->delete_subscription_type($subscriptionTypeID)) {
            return redirect()->route('admin.subscription_types.index');
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Произошла ошибка, смотрите логи']);
        }
    }
}
