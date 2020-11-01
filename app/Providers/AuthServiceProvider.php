<?php

namespace App\Providers;

use App\Models\Auth\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

/**
 * Class AuthServiceProvider.
 */
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        Passport::tokensCan([
            'search-quote' => 'search',
            'view-quote' => 'view',
            'create-quote' => 'create',
            'edit-quote' => 'edit',
            'ex-loading' => 'ex-loading',
        ]);

        //
    }
}
