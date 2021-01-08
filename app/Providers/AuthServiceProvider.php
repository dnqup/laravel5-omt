<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // check quyền Role
        Gate::define('list_role', 'App\Policies\RolePolicy@view');
        Gate::define('add_role', 'App\Policies\RolePolicy@create');
        Gate::define('edit_role', 'App\Policies\RolePolicy@update');
        Gate::define('delete_role', 'App\Policies\RolePolicy@delete');

        // check quyền User
        Gate::define('list_user', 'App\Policies\UserPolicy@view');
        Gate::define('add_user', 'App\Policies\UserPolicy@create');
        Gate::define('edit_user', 'App\Policies\UserPolicy@update');
        Gate::define('delete_user', 'App\Policies\UserPolicy@delete');

        // check quyền Permission
        Gate::define('list_permission', 'App\Policies\PermissionPolicy@view');
        Gate::define('add_permission', 'App\Policies\PermissionPolicy@create');
        Gate::define('edit_permission', 'App\Policies\PermissionPolicy@update');
        Gate::define('delete_permission', 'App\Policies\PermissionPolicy@delete');

    }
}
