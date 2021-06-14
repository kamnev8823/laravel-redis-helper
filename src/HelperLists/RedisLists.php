<?php


namespace RedisHelper\HelperLists;

use Illuminate\Support\Facades\Redis;

class RedisLists
{

    /**
     * Insert all the specified values at the tail of the list stored at key
     *
     * @param string $key
     * @param array|string $elements
     * @return int
     */
    public static function push(string $key, $elements): int
    {
        return Redis::rpush($key, $elements);
    }
}