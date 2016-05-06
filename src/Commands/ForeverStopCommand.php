<?php

namespace Mmstreet\Forever\Commands;

use Illuminate\Console\Command;

class ForeverStopCommand extends ForeverCommand
{
     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forever:stop {--c|clear : Also clear the logs}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Walang Por e ber! </3';

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
        $this->warn('Stopping forever...');
        $this->line(shell_exec($this->prefix . ' stop ' . $this->options['--id']));
        $this->info('Forever has been stopped!');
        if ($this->option('clear')) {
            $this->call('forever:clear');
        }
    }
}
