<?php

namespace App\Providers;

use App\View\Composer\RandomImageComposer;
use App\View\Composer\UserComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', UserComposer::class);
        View::composer('*', RandomImageComposer::class);
    }
}
