<?php

namespace Mmstreet\Forever\Commands;

use Illuminate\Console\Command;

class ForeverGenerateCommand extends ForeverCommand
{
     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forever:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the forever';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        parent::__construct($file);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->laravel->view->addNamespace($this->prefix, __DIR__ . '/../../views');
        $output = $this->laravel->view->make($this->prefix .'::forever')->with(config('forever'))->render();
        $this->laravel->files->put($this->filePath, $output);
        $this->info('Successfully generate forever.js');
    }
}
