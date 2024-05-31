<?php

namespace App\Models;

use App\Traits\Models\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    use HasFactory, Filterable;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function books(): BelongsToMany
    {
        return $this->BelongsToMany(Book::class);
    }
}
