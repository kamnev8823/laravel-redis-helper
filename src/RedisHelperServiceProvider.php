<?php
namespace RedisHelper;

use Illuminate\Support\ServiceProvider;
use RedisHelper\HelperHash\RedisHashHelper;
use RedisHelper\HelperString\RedisStringHelper;

class RedisHelperServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RedisHashHelper::class);
        $this->app->bind(RedisStringHelper::class);
    }
}