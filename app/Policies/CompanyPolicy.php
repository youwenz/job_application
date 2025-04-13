<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Company;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any companies.
     */
    public function viewAny(User $user)
    {
        // Allow all authenticated users to view companies
        return true;
    }

    /**
     * Determine whether the user can view the company.
     */
    public function view(User $user, Company $company)
    {
        // Allow all authenticated users to view companies
        return true;
    }

    /**
     * Determine whether the user can create a company.
     */
    public function create(User $user)
    {
        // Only employers can create companies
        return $user->role === 'employer';
    }

    /**
     * Determine whether the user can update the company.
     */
    public function update(User $user, Company $company)
    {
        // Allow users to update only their own company
        return $user->id === $company->user_id;
    }

    /**
     * Determine whether the user can delete the company.
     */
    public function delete(User $user, Company $company)
    {
        // Allow users to delete only their own company
        return $user->id === $company->user_id;
    }
}
