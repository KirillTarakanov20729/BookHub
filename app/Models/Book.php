<?php

namespace App\Models;

use App\Traits\Models\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory, Filterable;


    protected $fillable = [
        'name',
        'short_description',
        'full_description',
        'release_date',
        'age_limit_id',
        'publisher_id',
        'subscription_type_id',
        'image_path',
        'text_path',
    ];


    public function subscription_type(): BelongsTo
    {
        return $this->belongsTo(SubscriptionType::class);
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

   public function authors(): BelongsToMany
   {
       return $this->belongsToMany(Author::class);
   }

    public function publishers(): BelongsToMany
    {
        return $this->belongsToMany(Publisher::class);
    }

    public function age_limit(): BelongsTo
    {
        return $this->belongsTo(AgeLimit::class);
    }


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
