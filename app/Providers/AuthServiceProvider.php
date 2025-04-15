<?php

namespace App\Providers;

use App\Models\JobListing;
use App\Policies\JobPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        JobListing::class => JobPolicy::class
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
<<<<<<< Updated upstream
=======

        Gate::define('view-job', function (User $user) {
            return $user->role === 'employee'; 
        });
        // Gate::define('isEmployee', fn (Authenticatable $user) => true);
        // Gate::define('isEmployer', fn (Authenticatable $user) => true);
>>>>>>> Stashed changes
    }
}
