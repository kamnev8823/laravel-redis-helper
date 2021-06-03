<?php


namespace RedisHelper\HelperHash;

use Illuminate\Support\Facades\Facade;

class RedisHashFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RedisHash::class;
    }
}