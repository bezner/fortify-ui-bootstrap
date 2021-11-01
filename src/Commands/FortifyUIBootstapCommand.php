<?php

namespace Bezner\FortifyUIBootstap\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class FortifyUIBootstapCommand extends Command
{
    public $signature = 'fortify:bootstrap';
    public $description = 'Install Fortify UI Bootstrap with views and resources';

    public function handle()
    {
        $this->install();
        $this->publishAssets();

        $this->comment('Fortify UI Bootstrap is now installed.');
    }

    protected function install()
    {
        $this->updatePackages();
        $this->updateWebpackConfiguration();
        $this->removeNodeModules();
    }

    protected function updatePackages()
    {
        if (file_exists(base_path('package.json')))
        {
            $packages = json_decode(
                file_get_contents(
                    base_path('package.json')
                ), true);

            $packages['devDependencies'] = array_key_exists('devDependencies', $packages) ? $packages['devDependencies'] : [];
            $packages['devDependencies'] = $packages['devDependencies'] + [
                    'bootstrap'          => '^5.1.0',
                    'jquery'             => '^3.6',
                    '@popperjs/core'     => '^2.10.2',
                    'sass'               => '^1.42.0',
                    'sass-loader'        => '^12.1.0',
                    'laravel-mix'        => '^6.0.34',
                    'webpack'            => '^5.58.2',
                    'axios'              => '^0.21',
                    'lodash'             => '^4.17.19',
                    'postcss'            => '^8.1.14',
                    'resolve-url-loader' => '^4.0.0',
                ];

            ksort($packages['devDependencies']);

            file_put_contents(
                base_path('package.json'),
                json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
            );
        }
    }

    protected function updateWebPackConfiguration()
    {
        copy(__DIR__ . '/../../stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    protected function removeNodeModules()
    {
        tap(new Filesystem, function ($files) {
            $files->deleteDirectory(base_path('node_modules'));

            $files->delete(base_path('yarn.lock'));
        });
    }

    protected function publishAssets()
    {
        $this->callSilent('vendor:publish', ['--tag' => 'fortify-ui-bootstrap-resources', '--force' => true]);
    }
}
