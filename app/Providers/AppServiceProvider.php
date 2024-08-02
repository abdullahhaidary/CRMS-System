<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Gate::define('super_admin', function (User $user) {
            return $user->type == 1;
        });
        Gate::define('admin', function (User $user) {
            return $user->type == 2;
        });
        Gate::define('moder', function (User $user) {
            return $user->type == 3;
        });
    }
    public function boot()
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        Livewire::component( \App\Http\Livewire\RegisterForm::class, 'RegisterForm');
        Livewire::component(\App\Http\Livewire\SearchRecords::class, );

    }

}
