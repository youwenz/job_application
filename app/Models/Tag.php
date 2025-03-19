<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Relationship: A tag can belong to many job listings.
     */
    public function jobListings()
    {
        return $this->belongsToMany(JobListing::class, 'job_listing_tag');
    }
}
