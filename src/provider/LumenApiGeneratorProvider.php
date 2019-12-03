<?php

namespace LumenApiGenerator\Provider;

use LumenApiGenerator\Command\GenerateFileCommand;
use Illuminate\Support\ServiceProvider;

class LumenApiGeneratorProvider extends ServiceProvider
{

    protected $command = array(
        GenerateFileCommand::class,
    );

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/generate.php' => config_path('generate.php'),
        ],'config');

        $this->commands($this->command);
    }
}