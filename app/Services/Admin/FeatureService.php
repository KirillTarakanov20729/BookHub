<?php

namespace App\Services\Admin;


use App\DTO\Admin\Feature\SearchFeatureDTO;
use App\DTO\Admin\Feature\StoreFeatureDTO;
use App\DTO\Admin\Feature\UpdateFeatureDTO;
use App\Http\Filters\FeatureFilter;
use App\Models\Feature;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class FeatureService
{
    public function get_features(SearchFeatureDTO $data): LengthAwarePaginator
    {
        $filter = app()->make(FeatureFilter::class, ['queryParams' => array_filter($data->toArray())]);

        return Feature::filter($filter)->paginate(20)->withQueryString();
    }

    public function get_feature(int $id): Feature
    {
        return Cache::remember('feature_'.$id, 3600, function () use ($id) {
            return Feature::query()->findOrFail($id);
        });
    }

    public function store_feature(StoreFeatureDTO $data): bool
    {
        try {
            $feature       = new Feature;
            $feature->name = $data->name;

            $feature->save();

            Cache::put('feature_' . $feature->id, $feature, 60);
            Cache::forget('features');

            return true;
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

            $feature->save();

            Cache::put('feature_' . $feature->id, $feature, 3600);
            Cache::forget('features');

            return true;
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function delete_feature(int $id): bool
    {
        try {
            $feature = Feature::query()->findOrFail($id);

            Cache::forget('feature_' . $feature->id);
            Cache::forget('features');

            return $feature->delete();
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }
}
