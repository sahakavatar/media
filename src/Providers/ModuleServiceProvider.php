<?php

namespace Sahakavatar\Media\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'media');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'media');
        $tubs = [
            'module_settings' => [
                [
                    'title' => 'Media',
                    'url' => '/admin/media/settings',
                ]
            ]
        ];
        \Eventy::action('my.tab', $tubs);

    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
