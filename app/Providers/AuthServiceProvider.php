<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use OpenApi\Annotations\Post;

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
        
        Gate::define('admin-only',function($user){
            $id = $user->role;
            $checkAdmin = Role::find($id);
            if($checkAdmin->role_name=="admin"){
                return true;
            }
            return false;
        });
        Gate::define('admin-warehouse_staff',function($user){
            $id = $user->role;
            $checkAdmin = Role::find($id);
            if($checkAdmin->role_name=="admin" ||$checkAdmin->role_name=="warehouse_staff"){
                return true;
            }
            return false;
        });
        Gate::define('user-only',function($user){
            $id = $user->role;
            $checkAdmin = Role::find($id);
            if($checkAdmin->role_name=="user"){
                return true;
            }
            return false;
        });
    }
}
