<?php

namespace Echowebid\SocialCount;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class SocialCountServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap config
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/socialcount.php' => config_path('socialcount.php'),
        ]);
    }

    /**
     * Register bindings in the container
     * @return void
     */
    public function register()
    {
        App::bind('SocialCount', function()
        {
            return new SocialCount;
        });
    }
}