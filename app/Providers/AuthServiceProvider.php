<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\categoryPolicy;
use App\Policies\dashboardPolicy;
use App\Policies\permissionPolicy;
use App\Policies\productPolicy;
use App\Policies\rolePolicy;
use App\Policies\userPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // dashboard
        Gate::define('dashboard_index', [dashboardPolicy::class, 'index']);
        // category
        Gate::define('category_index', [categoryPolicy::class, 'index']);
        Gate::define('category_create', [categoryPolicy::class, 'create']);
        Gate::define('category_store', [categoryPolicy::class, 'store']);
        Gate::define('category_edit', [categoryPolicy::class, 'edit']);
        Gate::define('category_update', [categoryPolicy::class, 'update']);
        Gate::define('category_delete', [categoryPolicy::class, 'delete']);
        //permission
        Gate::define('permission_index', [permissionPolicy::class, 'index']);
        Gate::define('permission_create', [permissionPolicy::class, 'create']);
        Gate::define('permission_store', [permissionPolicy::class, 'store']);
        Gate::define('permission_edit', [permissionPolicy::class, 'edit']);
        Gate::define('permission_update', [permissionPolicy::class, 'update']);
        Gate::define('permission_delete', [permissionPolicy::class, 'delete']);
        //product
        Gate::define('product_index', [productPolicy::class, 'index']);
        Gate::define('product_create', [productPolicy::class, 'create']);
        Gate::define('product_store', [productPolicy::class, 'store']);
        Gate::define('product_edit', [productPolicy::class, 'edit']);
        Gate::define('product_update', [productPolicy::class, 'update']);
        Gate::define('product_delete', [productPolicy::class, 'delete']);
        //role
        Gate::define('role_index', [rolePolicy::class, 'index']);
        Gate::define('role_create', [rolePolicy::class, 'create']);
        Gate::define('role_store', [rolePolicy::class, 'store']);
        Gate::define('role_edit', [rolePolicy::class, 'edit']);
        Gate::define('role_update', [rolePolicy::class, 'update']);
        Gate::define('role_delete', [rolePolicy::class, 'delete']);
        //user
        Gate::define('user_index', [userPolicy::class, 'index']);
        Gate::define('user_create', [userPolicy::class, 'create']);
        Gate::define('user_store', [userPolicy::class, 'store']);
        Gate::define('user_edit', [userPolicy::class, 'edit']);
        Gate::define('user_update', [userPolicy::class, 'update']);
        Gate::define('user_delete', [userPolicy::class, 'delete']);

    }
}
