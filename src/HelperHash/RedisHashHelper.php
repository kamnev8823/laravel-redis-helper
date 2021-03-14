<?php


namespace RedisHelper\HelperHash;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redis;

class RedisHashHelper
{
    /**
     * Get all values of key
     *
     * @param string $key key
     * @param bool $decodeValues return json decode values
     * @return Collection
     */
    public static function getAll(string $key, bool $decodeValues = false): Collection
    {
        if ($decodeValues) {
            return collect(Redis::hgetall($key))->map(static function ($value) {
                return json_decode($value, false, 512, JSON_ERROR_NONE);
            });
        }
        return collect(Redis::hgetall($key));
    }

    /**
     * Get value on key
     *
     * @param string $key key
     * @param string|int $field data
     * @param bool $decode return json decode values
     * @return mixed
     */
    public static function get(string $key, string $field, bool $decode = false)
    {
        if ($decode) {
            return json_decode(Redis::hget($key, $field), false, 512, JSON_ERROR_NONE);
        }
        return Redis::hget($key, $field);
    }

    /**
     * Set the string value of a hash field
     *
     * @param string $key key
     * @param string|int $field field
     * @param string $value data values
     * @return bool
     */
    public static function set(string $key, string $field, string $value): bool
    {
        Redis::hset($key, $field, $value);
        return true;
    }

    /**
     * Del one or more hash fields
     *
     * @param string $key key
     * @param string|array $field data to del
     * @return int how many deleted
     */
    public static function del(string $key, $field): int
    {
        return Redis::hdel($key, $field);
    }
}