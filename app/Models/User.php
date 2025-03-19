<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'contact_number',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // a user (employee only) has many bookmarks job
    public function bookmarkedJobs(): BelongsToMany
    {
        //create a pivot table
        return $this->belongsToMany(JobListing::class, 'job_user_bookmarks')->withTimestamps();
    }

    // a user (employee only) has many applications
    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'user_id');
    }

    // a user (employer only) has a company
    public function company(): HasOne
    {
        return $this->hasOne(Company::class);
    }

    // a user (employer only) has many job listing
    public function jobs(): HasMany
    {
        return $this->hasMany(JobListing::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'user_id');
    }
}
