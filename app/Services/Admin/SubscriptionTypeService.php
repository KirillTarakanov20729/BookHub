<?php

namespace App\Services\Admin;

use App\DTO\Admin\SubscriptionType\SearchSubscriptionTypeDTO;
use App\DTO\Admin\SubscriptionType\StoreSubscriptionTypeDTO;
use App\DTO\Admin\SubscriptionType\UpdateSubscriptionTypeDTO;
use App\Http\Filters\SubscriptionTypeFilter;
use App\Models\Feature;
use App\Models\SubscriptionType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class SubscriptionTypeService
{
    public function get_subscription_types(SearchSubscriptionTypeDTO $data): LengthAwarePaginator
    {
        $filter = app()->make(SubscriptionTypeFilter::class, ['queryParams' => array_filter($data->toArray())]);

        return SubscriptionType::with('features')->filter($filter)->paginate(20)->withQueryString();
    }

    public function get_subscription_type(int $id): SubscriptionType
    {
        return Cache::remember('subscription_type_' . $id, 3600, function () use ($id) {
            return SubscriptionType::query()->with('features')->findOrFail($id);
        });
    }

    public function store_subscription_type(StoreSubscriptionTypeDTO $data): bool
    {
        try {
            $subscription_type       = new SubscriptionType;

            $subscription_type->name = $data->name;
            $subscription_type->price = $data->price;

            if ($subscription_type->save()) {
                $subscription_type->features()->sync($data->features_id);

                Cache::put('subscription_type_'.$subscription_type->id, $subscription_type, 3600);
                Cache::forget('subscription_types');
            }

            return true;
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function update_subscription_type(UpdateSubscriptionTypeDTO $data): bool
    {
        try {
            $subscription_type       = SubscriptionType::query()->findOrFail($data->id);

            $subscription_type->name = $data->name;
            $subscription_type->price = $data->price;

            if ($subscription_type->save()) {
                $subscription_type->features()->sync($data->features_id);

                Cache::put('subscription_type_'.$subscription_type->id, $subscription_type, 3600);
                Cache::forget('subscription_types');
            }

            return true;
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function delete_subscription_type(int $id): bool
    {
        try {
            $subscription_type = SubscriptionType::query()->findOrFail($id);

            $subscription_type->features()->detach();

            Cache::forget('subscription_type_' . $subscription_type->id);
            Cache::forget('subscription_types');

            return $subscription_type->delete();
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function get_features(): Collection
    {
        return Cache::remember('features', 3600, function () {
            return Feature::all();
        });
    }
}
