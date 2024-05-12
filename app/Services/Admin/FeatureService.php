<?php

namespace App\Services\Admin;


use App\DTO\Admin\Feature\SearchFeatureDTO;
use App\DTO\Admin\Feature\StoreFeatureDTO;
use App\DTO\Admin\Feature\UpdateFeatureDTO;
use App\Models\Feature;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class FeatureService
{
    public function get_features(SearchFeatureDTO $data): LengthAwarePaginator
    {
        $features = Feature::query();

        if (isset($data->name)) {
            $features->where('name', 'like', '%' . $data->name . '%');
        }

        return $features->paginate(20);
    }

    public function get_feature(int $id): Feature
    {
        return Feature::query()->findOrFail($id);
    }

    public function store_feature(StoreFeatureDTO $data): bool
    {
        try {
            $feature       = new Feature;
            $feature->name = $data->name;
            return $feature->save();
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function update_feature(UpdateFeatureDTO $data): bool
    {
        try {
            $feature       = Feature::query()->findOrFail($data->id);
            $feature->name = $data->name;
            return $feature->save();
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function delete_feature(int $id): bool
    {
        try {
            $feature = Feature::query()->findOrFail($id);
            return $feature->delete();
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }
}
