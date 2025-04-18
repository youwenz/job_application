<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\JobListing;
use App\Models\User;
use App\Policies\CompanyPolicy;
use App\Policies\JobListingPolicy;
use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        JobListing::class => JobListingPolicy::class,
        Company::class => CompanyPolicy::class
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('isEmployee', fn (Authenticatable $user) => true);
        Gate::define('isEmployer', fn (Authenticatable $user) => true);
    }


}
