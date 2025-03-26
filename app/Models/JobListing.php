<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobListing extends Model
{
    use HasFactory;

    protected $table = 'job_listings';

    protected $fillable = [
        'title',
        'description',
        'salary',
        'job_type',
        'remote',
        'requirements',
        'benefits',
        'user_id'
    ];

    // Relation to user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    // Relation to bookmarks
    public function bookmarkedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'bookmarks', 'job_id', 'user_id')->withTimestamps();
    }

    // Relation to applicants
    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'job_listing_tag');
    }

}
