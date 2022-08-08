<?php

namespace Lumetor\Providers;

use Lumetor\Command\GenerateFileCommand;
use Illuminate\Support\ServiceProvider;

/**
 * Class LumetorsProvider
 * @package Lumetor\Providers
 * @author mr.sirichai janpan <13_oy@hotmail.co.th>
 */
class LumetorsProvider extends ServiceProvider
{
    /**
     * @var string[]
     */
    protected $command = array(
        GenerateFileCommand::class,
    );

    /**
     *
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/generate.php' => config_path('generate.php'),
        ],'config');

        $this->commands($this->command);
    }
}