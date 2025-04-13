<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\JobListing;
use App\Models\User;
use App\Policies\CompanyPolicy;
use App\Policies\JobPolicy;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        JobListing::class => JobPolicy::class,
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
        Gate::define('edit-job', function (User $user, JobListing $job) {
            return $user->id === $job -> user_id;
        });
        // Gate::define('update', function (User $user, JobListing $job) {
        //     return $user->id === $job->user_id;
        // });

        // Gate::define('delete', function (User $user, JobListing $job) {
        //     return $user->id === $job->user_id;
        // });
    }
}
