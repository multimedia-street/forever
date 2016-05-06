<?php

namespace Mmstreet\Forever;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * @var array
     */
    protected $commands = [
        'generate' => Commands\ForeverGenerateCommand::class,
        'start' => Commands\ForeverStartCommand::class,
        'stop'  => Commands\ForeverStopCommand::class,
        'clear' => Commands\ForeverClearCommand::class,
    ];

    /**
     * @var string
     */
    protected $namespace = 'command.forever.';

    /**
     * Filename of the forever.
     *
     * @var string
     */
    protected $file = 'forever.js';

    /**
     * Boot the package.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('forever.php'),
        ], 'config');
        foreach ($this->commands as $key => $value) {
            $this->commands($this->namespace . $key);
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands();
        $this->mergeConfig();
    }

    /**
     * Register the commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        foreach ($this->commands as $key => $value) {
            $this->app->singleton($this->namespace . $key, function ($app) use ($value) {
                return new $value($this->file);
            });
        }
    }

    /**
     * Merges forever configs.
     *
     * @return void
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'forever');
    }

    /**
     * Get the services provided.
     *
     * @return array
     */
    public function provides()
    {
        $i = [];
        foreach ($this->commands as $key => $value) {
            array_push($i, 'command.forever.' . $key);
        }

        return $i;
    }
}
