<?php

namespace App\Services\Admin;

use App\DTO\Admin\Publisher\SearchPublisherDTO;
use App\DTO\Admin\Publisher\StorePublisherDTO;
use App\DTO\Admin\Publisher\UpdatePublisherDTO;
use App\Http\Filters\PublisherFilter;
use App\Models\Publisher;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PublisherService
{

    public function get_publishers(SearchPublisherDTO $data): LengthAwarePaginator
    {
        $filter = app()->make(PublisherFilter::class, ['queryParams' => $data->toArray()]);

        return Publisher::filter($filter)->paginate(20)->withQueryString();
    }

    public function get_publisher(int $id): Publisher
    {
        return Cache::remember('publisher_'.$id, 3600, function () use ($id) {
            return Publisher::query()->findOrFail($id);
        });
    }

    public function store_publisher(StorePublisherDTO $data): bool
    {
        try {
            $publisher       = new Publisher;
            $publisher->name = $data->name;

            $publisher->save();

            Cache::put('publisher_' . $publisher->id, $publisher, 3600);
            Cache::forget('publishers');

            return true;
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function update_publisher(UpdatePublisherDTO $data): bool
    {
        try {
            $publisher       = Publisher::query()->findOrFail($data->id);
            $publisher->name = $data->name;

            $publisher->save();

            Cache::put('publisher_' . $publisher->id, $publisher, 3600);
            Cache::forget('publishers');

            return true;
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function delete_publisher(int $id): bool
    {
        try {
            $publisher = Publisher::query()->findOrFail($id);

            Cache::forget('publisher_' . $publisher->id);
            Cache::forget('publishers');

            return $publisher->delete();
        } catch (\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }
}
