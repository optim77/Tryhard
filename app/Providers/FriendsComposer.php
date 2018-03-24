<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FriendsComposer extends ServiceProvider
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
        $this->composeFriends();
    }

    public function composeFriends(){
        view()->composer('components.topBar','App\Http\Composers\FriendsComposer');
    }
}
