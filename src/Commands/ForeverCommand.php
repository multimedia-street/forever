<?php

namespace Mmstreet\Forever\Commands;

use Illuminate\Console\Command;

class ForeverCommand extends Command
{
    /**
     * @var array
     */
    protected $options;

    /**
     * @var string
     */
    public $file;

    /**
     * @var string
     */
    public $prefix = 'forever';

    /**
     * @var string
     */
    public $filePath;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($file = 'forever.js')
    {
        parent::__construct();
        $this->file = $file;
        $this->filePath = base_path($file);
        $this->options = [
            '-l' => storage_path('logs/forever.log'),
            '-o' => storage_path('logs/forever.out.log'),
            '-e' => storage_path('logs/forever.err.log'),
            '--id' => strtolower(config('app.title')),
            '--append' => '',
            '--verbose' => ''
        ];
    }

    /**
     * Parse the options into a string.
     *
     * @return string
     */
    public function parseOptions()
    {
        $attr = array_map(function ($i, $k) {
            return $k . ' ' . $i;
        }, array_values($this->options), array_keys($this->options));

        return implode(' ', $attr);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
