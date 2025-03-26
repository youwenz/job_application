<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'user_id',
        'full_name',
        'message',
        'resume_path',
    ];

    // Relation to job
    public function job(): BelongsTo
    {
        return $this->belongsTo(JobListing::class);
    }

    // Relation to user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
