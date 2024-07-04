# REST API with Sanctum Authentication

> Laravel 11.9 API that uses the API with PHP/8.2.12

## Quick Start

``` bash
# Install Dependencies
composer install

# Run Migrations
php artisan migrate

# Import Products
php artisan db:seed

# Add virtual host if using Apache

# If you get an error about an encryption key
php artisan key:generate

# Install JS Dependencies
npm install

# Watch Files
npm run watch
```

## Endpoints

### List all products with links and meta
``` bash
GET api/products
```
### Get single products
``` bash
GET api/products/{id}
```
### Search product
``` bash
api/products/search/{name}
```
### Delete products
``` bash
DELETE api/products/{id}
```

### Add products
``` bash
POST api/products
title/body
```

### Update article
``` bash
PUT api/products/{id}
```

### Register
``` bash
POST api/register
```
### Login
``` bash
POST api/login
```

### Logout
``` bash
POST api/logout


```

## App Info

### Author

Abdulrahman Bello

### Version

1.0.0

### License

This project is licensed under the MIT License
