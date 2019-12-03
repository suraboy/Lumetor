<?php

namespace LumenApiGenerator\Command;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use LumenApiGenerator\Generate\GenerateFile;

class GenerateFileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'boynii:genfile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate API Resource file.';

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
        $this->generate = app(GenerateFile::class, ['namespace' => $namespace]);
        $this->generate->setPath(base_path());
        $this->generate->execute();
        $this->generate->makeMigration();

        echo "\r\n";
        dump("append route file");
        $this->generate->appendRoute();
        echo "\r\n";
        dump('#########################################');
        dump('generate module ' . $namespace . ' success !');

    }
}
