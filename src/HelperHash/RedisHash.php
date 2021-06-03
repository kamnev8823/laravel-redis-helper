<?php


namespace RedisHelper\HelperHash;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redis;

class RedisHash
{
    /**
     * Get all values of key
     *
     * @param string $key key
     * @param bool $decodeValues return json decode values
     * @param bool $toArray
     * @return Collection
     */
    public static function getAll(string $key, bool $decodeValues = false, bool $toArray = false): Collection
    {
        $data = collect(Redis::hgetall($key));

        if ($decodeValues) {
            $data = $data->map(static function ($value) use ($toArray) {
                return json_decode($value, $toArray, 512, JSON_ERROR_NONE);
            });
        }

        return $data;
    }

    /**
     * Get all values without keys
     *
     * @param string $key
     * @param bool $decodeValues
     * @param bool $toArray
     * @return Collection
     */
    public static function getAllVal(string $key, bool $decodeValues = false, bool $toArray = false): Collection
    {
        $data = collect(Redis::hvals($key));

        if ($decodeValues) {
            $data = $data->map(static function ($value) use ($toArray) {
                return json_decode($value, $toArray, 512, JSON_ERROR_NONE);
            });
        }

        return $data;
    }

    /**
     * Get all keys
     *
     * @param string $key
     * @return Collection
     */
    public static function getAllKeys(string $key): Collection
    {
        return collect(Redis::hkeys($key));
    }

    /**
     * Get value on key
     *
     * @param string $key key
     * @param string|int $field data
     * @param bool $decode return json decode values
     * @return mixed
     */
    public static function get(string $key, string $field, bool $decode = false, bool $toArray = false)
    {
        $data = Redis::hget($key, $field);

        if ($decode) {
            $data = json_decode($data, $toArray, 512, JSON_ERROR_NONE);
        }

        return $data;
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
     * @param mixed ...$fields data
     * @return int how many deleted
     */
    public static function del(string $key, ...$fields): int
    {
        $count = 0;
        foreach ($fields as $field) {
            $count += Redis::hdel($key, $field);
        }
        return $count;
    }
}