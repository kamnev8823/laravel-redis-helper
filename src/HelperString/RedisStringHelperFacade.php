<?php


namespace RedisHelper\HelperString;

use Illuminate\Support\Facades\Facade;

class RedisStringHelperFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RedisStringHelper::class;
    }
}