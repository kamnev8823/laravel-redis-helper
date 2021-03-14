<?php


namespace RedisHelper\HelperHash;

use Illuminate\Support\Facades\Facade;

class RedisHashHelperFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RedisHashHelper::class;
    }
}