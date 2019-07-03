<?php
/**
 * @author samark chaisanguan
 * @email samarkchsngn@gmail.com
 */
namespace Lumpineevill\ServiceProvider;

use Illuminate\Support\ServiceProvider;
use Lumpineevill\Command\GenAPICommand;
use Lumpineevill\Command\GenFrontCommand;

class LumpineevillServiceProvider extends ServiceProvider
{
    /**
     * set command list
     * @var array
     */
    protected $commands = [
        GenAPICommand::class,
        GenFrontCommand::class,
    ];

    /**
     * register servicde
     * @return [type] [description]
     */
    public function register()
    {
        $this->publishes([
            __DIR__ . '/../Config/Form.php' => config_path('Form.php'),
            __DIR__ . '/../Config/front.php' => config_path('front.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/../Config/Form.php', 'Form'
        );
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/front.php', 'front'
        );
    }

    /**
     * booting application
     * @return [type] [description]
     */
    public function boot()
    {
        # add routing
        require __DIR__ . '/../Http/Routing.php';

        # add commnads
        $this->commands($this->commands);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['lumpineevill.sukumvit76'];
    }

}
