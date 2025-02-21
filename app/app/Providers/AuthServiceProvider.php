<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Producto;
use App\Policies\ProductoPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Producto::class => ProductoPolicy::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        // Aquí puedes registrar otras lógicas de autorización personalizadas si las necesitas
    }
}
