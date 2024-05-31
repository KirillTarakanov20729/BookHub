<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const SUBSCRIPTION_TYPE_ID = 'subscription_type_id';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::SUBSCRIPTION_TYPE_ID => [$this, 'subscription_type_id'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function subscription_type_id(Builder $builder, $value)
    {
        $builder->whereHas('subscription', function ($query) use ($value) {
            return $query->where('subscription_type_id', $value);
        });
    }

}
