<?php


namespace RedisHelper\HelperLists;


class RedisListsFacade
{
    protected static function getFacadeAccessor()
    {
        return RedisLists::class;
    }
}