<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AgeLimit extends Model
{
    use HasFactory;


    public $timestamps = false;

    protected $fillable = [
        'age_limit',
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
