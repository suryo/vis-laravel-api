# VIS-LARAVEL API
## Install

1. git clone https://github.com/suryo/vis-laravel-api.git
2. composer install
3. copy .env.example to .env
4. php artisan key:generate
5. php artisan serve
6. dump db_vis.sql

git checkout -b nama_branch

## branch

## Endpoint


## Membuat Model

php artisan make:model nama_model -m
example
php artisan make:model tenant_model -r 

## Membuat Resource

php artisan make:resource nama_resource
example :
php artisan make:resource TenantResource

## Membuat Controller
php artisan make:controller Api\TenantController -r 

## Check Route
php artisan route:list

## API DOCUMENTATION
1. run php artisan l5-swagger:generate
2. run php artisan server
3. open url -> http://127.0.0.1:8000/api/documentation

