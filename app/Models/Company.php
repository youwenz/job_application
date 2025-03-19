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
        'logo',
        'description',
        'address',
        'city',
        'state',
        'zipcode',
        'website',
        'company_size',
        'owner_name',
        'phone',
        'country',
        'industry_type'
    ];

    // A company belongs to a user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // A company has many job listings
    public function jobs(): HasMany
    {
        return $this->hasMany(JobListing::class);
    }
}

