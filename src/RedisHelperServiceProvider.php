<?php
namespace RedisHelper;

use Illuminate\Support\ServiceProvider;
use RedisHelper\HelperHash\RedisHash;
use RedisHelper\HelperString\RedisString;

class RedisHelperServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RedisHash::class);
        $this->app->bind(RedisString::class);
    }
}