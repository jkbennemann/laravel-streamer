<?php

declare(strict_types=1);

namespace Prwnr\Streamer\Concerns;

use Illuminate\Database\Connection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redis;

trait ConnectsWithRedis
{
    /**
     * Returns Redis connection based on configuration.
     */
    protected function redis(): Connection
    {
        $connectionName = Config::get('streamer.redis_connection');

        $connection = Redis::connection($connectionName ?? 'default');
        $connection->setOption(\Redis::OPT_PREFIX, '');

        return $connection;
    }
}
