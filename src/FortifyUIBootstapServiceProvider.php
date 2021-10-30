<?php

namespace Bezner\FortifyUIBootstap;

use Illuminate\Support\ServiceProvider;
use Bezner\FortifyUIBootstap\Commands\FortifyUIBootstapCommand;

class FortifyUIBootstapServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../stubs/resources/js' => base_path('resources/js'),
                __DIR__ . '/../stubs/resources/views' => base_path('resources/views'),
                __DIR__ . '/../stubs/resources/sass' => base_path('resources/sass'),
                // Add more resources here
            ], 'fortify-ui-bootstrap-resources');

            $this->commands([
                FortifyUIBootstapCommand::class,
            ]);
        }
    }
}
