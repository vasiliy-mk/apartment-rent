<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use App\Settings;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = Settings::getArray();

        App::setLocale($settings['language']);

        view()->share('settings', $settings);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
