# laravel-redis-helper
Laravel Redis Helper package of Predis\Predis

### Use Redis more effectively with Laravel!
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
***

## Usage

You can now using the Facades:

#### `RedisStringHelper` working with strings in Redis:

 1. Method `set` takes 4 parameters `set(string $key, string $value, string $option = "KEEPTTL", int $time = 600)`
    `$option` supports a set of options that modify its behavior: "EX" or "EXAT" or "PXAT" or "NX" or "XX" or "KEEPTTL" or "GET".
 2. Method `get` have 1 required parameter `key` and 1 optional `decode` if you set json (default = false).

```php
  //Set string value in cache
  RedisString::set('products', json_encode(Product::all()), 'EX', 6000);
  
  //Get decoded products 
  RedisString::get('products', true);
```

#### `RedisHashHelper` working with hash in Redis:

 1. Method `getAll` - get all values of key. If you set models collection in json, then you can decoded passing the second parameter `true` (default = false), the fird parameter convert to array or object StdClass return Collection
 2. Method `getAllVal` - get all values. 
 3. Method `getAllKeys` - get all keys. 
 4. Method `get` - Get value on key. The first parameter is key, the second parameter is field(maybe model id), the third parameter is decoding json data (default = false).
 5. Method `set` - Set the string value of a hash field.
 6. Method `del` - Del one or more hash fields. The second parameter can be string or array.
```php
  //Get get all values of key  
  RedisHash::getAll('products', true, true);
  
  //Get all values.
  RedisHash::getAllValue('products', true, true);  
  
  //Get all keys.
  RedisHash::getAllKeys('products');
  
  //Get value on key 
  RedisHash::get('products', 2, true, false);
  
  //Set the string value of a hash field
  RedisHash::set('products', 2, json_encode(Product::find(3)));
  
  //Del one or more hash fields
  RedisHash::del('products', [1,2,3,4, etc..]));
```
