<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'author_id', 'genre_id',
        'link', 'rating', 'description', 'full_description', 'link',
        'subLevel', 'imag_path'
    ];

    protected $casts = [
        'rating' => 'float',
        'subLevel' => 'decimal'
        ];
}
