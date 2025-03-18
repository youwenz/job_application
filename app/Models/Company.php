<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'address',
        'city',
        'state',
        'zipcode',
        'website'
    ];

    // a company belongs to a user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // a company has many job listings
    public function jobs(): HasMany
    {
        return $this->hasMany(JobListing::class);
    }
}
