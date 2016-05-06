<?php

return [
    /**
     * Port for forever.
     */
    'port' => env('FOREVER_PORT', 3000),

    /**
     * Broadcast channel in your broadcastOn() method.
     */
    'channel' => env('FOREVER_CHANNEL', 'global')
];
