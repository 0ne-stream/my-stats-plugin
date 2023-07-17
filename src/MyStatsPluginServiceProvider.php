<?php

namespace Acme\MyStats;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Log;

class MyStatsPluginServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (!$this->isVersionCompatible()) {
            return $this->handleVersionNotCompatible();
        }

        // activate only for BO, but register listeners also for LB
        if (config('app.type') == 'LB') {
            Event::subscribe(Subscribers\SecurityEventSubscriber::class);
            return;
        }

        // register new panel routes
        $this->loadRoutesFrom(__DIR__.'/../routes/bo.php');

        // db migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'my_stats');

        // translations
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'my_stats');

        // js, css
        $this->publishes([
            __DIR__.'/../resources/css' => public_path('css/'),
            __DIR__.'/../resources/js' => public_path('js/scripts/'),
        ], 'public');

        // register commands
        $this->commands([
            Commands\ClearCommand::class,
        ]);

        // register to scheduler
        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);
            $schedule->command('my_stats:clear')->weekly();
        });

        Event::subscribe(Subscribers\SecurityEventSubscriber::class);
    }

    public function register()
    {
        if (!$this->isVersionCompatible()) {
            return $this->handleVersionNotCompatible();
        }
        
        $this->mergeConfigFrom(
            __DIR__.'/../config/plugin.php',
            'plugins'
        );
        
        if (config('app.type') == 'LB') {
            return;
        }
            
        $merge = [
            'routes_permissions',
            'reseller_permissions',
            'sidebar_permissions',
            'sidebar_entries',
        ];
        
        foreach ($merge as $c) {
            $this->mergeConfigFrom(
                __DIR__.'/../config/' . $c . '.php',
                $c
            );
        }
    }

    protected function loadRoutesFrom($path)
    {
        require $path;
    }

    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app->make('config');

        $config->set($key, array_merge(
            require $path, $config->get($key, [])
        ));
    }

    protected function isVersionCompatible()
    {
        return config('app.version') >= 'v1.1.32';
    }

    protected function handleVersionNotCompatible()
    {
        Log::notice(sprintf('Failed to load %1$s, app version %2$s not compatible', __CLASS__, config('app.version')));
    }
}
