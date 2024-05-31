<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class AuthorFilter extends AbstractFilter
{
    public const FULL_NAME = 'full_name';

    protected function getCallbacks(): array
    {
        return [
            self::FULL_NAME => [$this, 'full_name'],
        ];
    }

    public function full_name(Builder $builder, $value)
    {
        $builder->where('full_name', 'like', "%{$value}%");
    }


}
