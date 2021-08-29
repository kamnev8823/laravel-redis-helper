<?php


namespace RedisHelper\HelperLists;

use Illuminate\Support\Facades\Redis;

class RedisLists
{

    /**
     * Append one or multiple elements to a list
     *
     * @param string $key
     * @param string $element
     * @return int
     */
    public static function rpush(string $key, string $element): int
    {
        return Redis::rpush($key, $element);
    }

    /**
     * Append one or multiple elements to a list
     *
     * @param string $key
     * @param string $element
     * @return int
     */
    public static function lpush(string $key, string $element): int
    {
        return Redis::lpush($key, $element);
    }

    /**
     * Remove and get the first elements in a list
     *
     * @param string $key
     * @param int $count
     * @param bool $decode
     * @return int
     */
    public static function lpop(string $key, int $count, bool $decode = false, bool $toArray = false): int
    {
        $data = Redis::lpop($key, $count);

        if ($decode) {
            foreach ($data)
        }
    }
}