<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SidebarComposer extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeSidebar();
    }

    public function composeSidebar(){
        view()->composer('components.topBar','App\Http\Composers\SidebarComposer');
    }
}
