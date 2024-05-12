<?php

namespace App\Services\Admin;

use App\DTO\Admin\Feature\StoreFeatureDTO;
use App\DTO\Admin\Feature\UpdateFeatureDTO;
use App\DTO\Admin\SubscriptionType\SearchSubscriptionTypeDTO;
use App\DTO\Admin\SubscriptionType\StoreSubscriptionTypeDTO;
use App\DTO\Admin\SubscriptionType\UpdateSubscriptionTypeDTO;
use App\Models\Feature;
use App\Models\SubscriptionType;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class SubscriptionTypeService
{
    public function get_subscription_types(SearchSubscriptionTypeDTO $data): LengthAwarePaginator
    {
        $subscription_types = SubscriptionType::query();

        if (isset($data->name)) {
            $subscription_types->where('name', 'like', '%' . $data->name . '%');
        }

        return $subscription_types->paginate(20);
    }

    public function get_subscription_type(int $id): SubscriptionType
    {
        return SubscriptionType::query()->findOrFail($id);
    }

    public function store_subscription_type(StoreSubscriptionTypeDTO $data): bool
    {
        try {
            $subscription_type       = new SubscriptionType;
            $subscription_type->name = $data->name;
            $subscription_type->price = $data->price;

            if ($subscription_type->save()) {
                $subscription_type->features()->sync($data->features_id);
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
            }

            $subscription_type->features()->sync($data->features_id);

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

            return $subscription_type->delete();
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function get_features()
    {
        return Feature::all();
    }
}
