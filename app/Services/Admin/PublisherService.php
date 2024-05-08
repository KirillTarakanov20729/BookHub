<?php

namespace App\Services\Admin;

use App\DTO\Admin\Publisher\SearchPublisherDTO;
use App\DTO\Admin\Publisher\StorePublisherDTO;
use App\DTO\Admin\Publisher\UpdatePublisherDTO;
use App\Models\Publisher;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class PublisherService
{

    public function get_publishers(SearchPublisherDTO $data): LengthAwarePaginator
    {
        $publisher = Publisher::query();

        if (isset($data->name)) {
            $publisher->where('name', 'like', '%' . $data->name . '%');
        }

        return $publisher->paginate(20);
    }

    public function get_publisher(int $id): Publisher
    {
        return Publisher::query()->findOrFail($id);
    }

    public function store_publisher(StorePublisherDTO $data): bool
    {
        try {
            $publisher       = new Publisher;
            $publisher->name = $data->name;
            return $publisher->save();
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
            return $publisher->save();
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function delete_publisher(int $id): bool
    {
        try {
            $publisher = Publisher::query()->findOrFail($id);
            return $publisher->delete();
        } catch (\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }
}
