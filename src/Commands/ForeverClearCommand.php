<?php

namespace Mmstreet\Forever\Commands;

use Illuminate\Console\Command;

class ForeverClearCommand extends ForeverCommand
{
     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forever:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear logs in storage.';

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
        $logs = [
            $this->options['-l'],
            $this->options['-o'],
            $this->options['-e'],
        ];
        $this->laravel->files->delete($logs);
        $this->info('Successfully clear the logs.');
    }
}
