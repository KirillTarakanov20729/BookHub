<?php

namespace App\DTO\Admin\Book;

use Illuminate\Database\Eloquent\Collection;
use Spatie\DataTransferObject\DataTransferObject;

class CreateDataForBookDTO extends DataTransferObject
{
    public Collection $age_limits;
    public Collection $authors;
    public Collection $genres;
    public Collection $publishers;
    public Collection $subscription_types;
}
