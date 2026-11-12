<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Gate: hanya admin yang diizinkan membuat artikel FAQ baru
        Gate::define('kelola-faq-baru', fn(User $user) => $user->hasRole('admin'));
    }
}