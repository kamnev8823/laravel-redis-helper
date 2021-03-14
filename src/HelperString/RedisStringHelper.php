<?php


namespace RedisHelper\HelperString;

use Illuminate\Support\Facades\Redis;

class RedisStringHelper
{
    /**
     * Set the string value of key
     *
     * @param string $key key
     * @param string $value value
     * @param string $option time option "EX" or "EXAT" or "PXAT" or "NX" or "XX" or "KEEPTTL" or "GET" (see more https://redis.io/commands/set)
     * @param int $time time
     * @return bool
     */
    public static function set(string $key, string $value, string $option = "KEEPTTL", int $time = 600): bool
    {
        if ($option === "EX" || $option === "PX" || $option === "EXAT" || $option === "PXAT") {
            Redis::set($key, $value, $option, $time);
        } else {
            Redis::set($key, $value, $option);
        }
        return true;
    }

    /**
     * Get the value of key.
     *
     * @param string $key key
     * @param bool $decode json_decoding = false
     * @return mixed
     */
    public static function get(string $key, bool $decode = false)
    {
        if ($decode) {
            return json_decode(Redis::get($key), false, 512, JSON_ERROR_NONE);
        }
        return Redis::get($key);
    }
}