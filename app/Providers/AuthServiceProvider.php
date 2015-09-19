<?php

namespace Nhlpool\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Nhlpool\Model' => 'Nhlpool\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param \Illuminate\Contracts\Auth\Access\Gate $gate
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        $gate->define('join-pool', function ($user, $pool) {
            // Check if this pool is in the user's pool... pbly not the best way to do this...
            $poolsIDsArray = $user->pools()->get()->pluck('id')->toArray();
            return !in_array($pool->id, $poolsIDsArray);
        });
    }
}
