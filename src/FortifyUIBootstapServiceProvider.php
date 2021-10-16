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
                __DIR__ . '/../stubs/resources' => base_path('resources'),
                // Add more resources here
            ], 'fortify-ui-bootstrap-resources');

            $this->commands([
                FortifyUIBootstapCommand::class,
            ]);
        }
    }
}
