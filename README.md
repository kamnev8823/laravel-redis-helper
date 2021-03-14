# laravel-redis-helper
Laravel Redis Helper package of Predis\Predis

### Use Redis more effectively together with Laravel!
***

## Installation

```sh
  composer require kamnev/laravel-redis-helper
```
Add from .env redis settings 
```php
  REDIS_HOST=your_redis_host
  REDIS_PASSWORD=your_redis_password
  REDIS_PORT=your_redis_port
  REDIS_CLIENT=predis
```

## Usage

You can now using the Facades:

***
#### `RedisStringHelper` working with strings in Redis:

 1. Method `set` takes 4 parameters `set(string $key, string $value, string $option = "KEEPTTL", int $time = 600)`
    `$option` supports a set of options that modify its behavior: "EX" or "EXAT" or "PXAT" or "NX" or "XX" or "KEEPTTL" or "GET".
 2. Method `get` have 1 required parameter `key` and 1 optional `decode` if you set json (default = false).
 
```php
  //Set string value in cache
  RedisStringHelper::set('product', json_encode(Product::all()), 'EX', 6000)
  
  //Get decoded products 
  RedisStringHelper::get('product', true)
```

#### `RedisHashHelper` working with hash in Redis:

 1. Method `getAll` - get all values of key. If you set models collection in json, then you can decoded passing the second parameter `true` (default = false)
 2. Method `get` - Get value on key. The first parameter is key, the second parameter is field(maybe model id), the third parameter is decoding json data (default = false).
 3. Method `set` - Set the string value of a hash field.
 4. Method `del` - Del one or more hash fields. The second parameter can be string or array.
```php
  //Set string value in cache
  RedisHashHelper::getAll('products', true)
  
  //Get value on key 
  RedisHashHelper::get('product', 2, true)
  
  //Set the string value of a hash field
  RedisHashHelper::set('product', 2, json_encode(Product::find(3)))
  
  //Del one or more hash fields
  RedisHashHelper::del('product', [1,2,3,4, etc..]))
```
