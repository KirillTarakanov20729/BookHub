<?php

namespace App\Models;

use App\Traits\Models\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    use HasFactory, Filterable;

    public $timestamps = false;

    protected $fillable = [
        'first_name', 'last_name', 'middle_name', 'full_name'
    ];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'author_book', 'author_id', 'book_id');
    }
}
