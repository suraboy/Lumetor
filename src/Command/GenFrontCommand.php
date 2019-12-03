<?php

namespace Lumpineevill\Command;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Lumpineevill\Generate\GenerateFront;

class GenFrontCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'boynii:genfront';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Front Resource file.';

    /**
     * generate list
     * @var collection
     */
    protected $generate;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        Log::info('start process ' . get_class());
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $namespace = $this->ask('What is your namespace ?');
        $this->generate = app(GenerateFront::class, ['namespace' => $namespace]);
        $this->generate->setPath(base_path());
        $this->generate->excute();
        echo "\r\n";
        $this->line('#########################################');
        $this->line('generate module ' . $namespace . ' success !');
    }
}
