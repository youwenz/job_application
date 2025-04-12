<?php

namespace App\Policies;

use App\Models\JobListing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Allow any authenticated user to view job listings
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JobListing $job): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobListing $job): bool
    {
        return $user->id == $job->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobListing $job): bool
    {
        return $user->id == $job->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JobListing $job): bool
    {
        return $user->id === $job->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JobListing $job): bool
    {
        return $user->id === $job->user_id;
    }
}
