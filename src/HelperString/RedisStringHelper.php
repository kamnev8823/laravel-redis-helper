<?php


namespace RedisHelper\HelperString;

use Illuminate\Support\Facades\Facade;

class RedisStringHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RedisString::class;
    }
}