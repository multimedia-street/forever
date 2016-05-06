<?php

namespace Mmstreet\Forever\Commands;

use Illuminate\Console\Command;

class ForeverStartCommand extends ForeverCommand
{
     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forever:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Forever exists <3';

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
        $this->call('forever:generate');
        $this->info('Forever is starting...');
        $this->line(shell_exec($this->prefix . ' start ' . $this->parseOptions() . ' '. $this->file));
        $this->info('Forever started <3');
    }
}
