# VIS-LARAVEL API
## Install

1. git clone https://github.com/suryo/vis-laravel-api.git
2. composer install
3. copy .env.example to .env
4. php artisan key:generate
5. php artisan serve
6. dump db_vis.sql

## Branch
git checkout -b nama_branch

## Endpoint
Please Check on http://127.0.0.1:8000/api/documentation

## Model

php artisan make:model nama_model -m
example
php artisan make:model tenant_model -r 

## Resource

php artisan make:resource nama_resource
example :
php artisan make:resource TenantResource

## Controller
php artisan make:controller Api\TenantController -r 

## Check Route
php artisan route:list

## API DOCUMENTATION
1. install composer require "darkaonline/l5-swagger"
2. run php artisan l5-swagger:generate
3. run php artisan server
4. open url -> http://127.0.0.1:8000/api/documentation

## FILE UPLOAD
the file will be upload on the following path – storage/app/public/files.
