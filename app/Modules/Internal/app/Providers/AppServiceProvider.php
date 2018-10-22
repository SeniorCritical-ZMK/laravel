<?php

namespace App\Modules\Internal\app\Providers;

use App\Modules\Internal\app\Http\Middleware\InternalAuth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Role' => 'App\Modules\Internal\app\Policies\RolePolicy',
        'App\User' => 'App\Modules\Internal\app\Policies\UserPolicy',
    ];

    public function boot(Router $router)
    {
        $router->aliasMiddleware('internal-auth', InternalAuth::class);

        $this->loadRoutesFrom(
            __DIR__.'/../../routes/web.php'
        );

        $this->loadRoutesFrom(
            __DIR__.'/../../routes/backend.php'
        );

        $this->loadViewsFrom(
            __DIR__.'/../../resources/view', 'internal'
        );

        $this->mergeConfigFrom(
            __DIR__.'/../../config/permissions.php', 'permissions'
        );

        $this->registerPolicies();
    }

    public function register()
    {
        //
    }

    public function registerPolicies()
    {
        foreach ($this->policies as $key => $value) {
            Gate::policy($key, $value);
        }
    }
}