<?php

namespace App\Models;

use App\Traits\Models\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Feature extends Model
{
    use HasFactory, Filterable;

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function subscription_types(): BelongsToMany
    {
        return $this->BelongsToMany(Book::class);
    }
}
