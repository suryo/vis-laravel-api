# VIS Laravel API

this guide contains the best practice, rules about how the development process in VIS API.
this guide is made as simple as possible so it is easy to understand
with this guide, we hope knowledge transfer can be faster, and the software development process will be better

| **Project Info**    | value                     |
| ------------------- | ------------------------- |
| Repository          |                           |
| Application Version | alpha                     |
| Framework           | Laravel PHP Framework (8) |
| Branch              |                           |

## Installation

Use the package manager [composer](https://getcomposer.org/) to install packages.

```bash
git clone https://github.com/suryo/vis-laravel-api.git
cd vis-laravel-api
composer install

```

## Setup

1. Make database with name
   `db_vis`

2. Set .env file

3. Migrate database with
   `php artisan migrate`

## Usage

You can use laravel built-in server to run local server(for development).

```
cd api
php artisan serve

```

## Created By

Suryo Atmojo--2021
