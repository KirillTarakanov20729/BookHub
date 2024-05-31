<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class BookFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const AUTHOR_ID = 'author_id';
    public const PUBLISHER_ID = 'publisher_id';
    public const GENRE_ID = 'genre_id';
    public const AGE_LIMIT_ID = 'age_limit_id';
    public const SUBSCRIPTION_TYPE_ID = 'subscription_type_id';
    public const AVAILABILITY = 'availability';

    public const NEWEST = 'newest';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::AUTHOR_ID => [$this, 'author'],
            self::PUBLISHER_ID => [$this, 'publisher'],
            self::GENRE_ID => [$this, 'genre'],
            self::AGE_LIMIT_ID => [$this, 'age_limit'],
            self::SUBSCRIPTION_TYPE_ID => [$this, 'subscription_type'],
            self::AVAILABILITY => [$this, 'availability'],
            self::NEWEST => [$this, 'newest'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function genre(Builder $builder, $value)
    {
        $builder->whereHas('genres', function ($query) use ($value) {
            $query->where('genre_id', $value);
        });
    }

    public function publisher(Builder $builder, $value)
    {
        $builder->whereHas('publishers', function ($query) use ($value) {
            $query->where('publisher_id', $value);
        });
    }

    public function author(Builder $builder, $value)
    {
        $builder->whereHas('authors', function ($query) use ($value) {
            $query->where('author_id', $value);
        });
    }

    public function age_limit(Builder $builder, $value)
    {
        $builder->where('age_limit_id', $value);
    }

    public function subscription_type(Builder $builder, $value)
    {
        $builder->where('subscription_type_id', $value);
    }

    public function availability(Builder $builder, $value)
    {
        $builder->where('subscription_type_id', '<=' , Auth::user()->subscription->subscription_type_id);
    }

    public function newest(Builder $builder, $value)
    {
        $builder->orderBy('created_at', 'desc');
    }

}
