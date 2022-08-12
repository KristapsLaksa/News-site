# News-site

This project  aggregates top news headlines in USA splitting them by categories.


## Authors

- [@KristapsLaksa](https://github.com/KristapsLaksa)



## API Reference


```http
https://newsapi.org/
```

| Parameter | Type     | Description                       |
| :-------- | :------- |:----------------------------------|
| `NEWS_API_KEY` | `string` | **Required**. Your API key        |
| `MYSQL_DB_NAME` | `string` | **Required**. Your database name. |
| `USER_MY_SQL` | `string` | **Required**. MySql username.     |
| `MYSQL_PASSWORD` | `string` | **Required**. MySql password.     |
| `MYSQL_HOST` | `string` | **Required**. MySql host name.    |
| `MYSQL_DRIVER` | `string` | **Required**. MySql driver.       |

## Required packages

- composer require nikic/fast-route
-   composer require twig/twig
-  composer require guzzlehttp/guzzle
-  composer require vlucas/phpdotenv
-  composer require php-di/php-di
- composer require doctrine/dbal


## For Tests

- composer require pestphp/pest

  https://pestphp.com/
