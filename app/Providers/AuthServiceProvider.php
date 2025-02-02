<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    //policia para el modelo de role
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Role'=> 'App\Policies\RolePolicy',
        'App\Permission'=> 'App\Policies\PermissionPolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\Speciality' => 'App\Policies\SpecialityPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
