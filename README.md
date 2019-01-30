<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel blog


Screenshots
------------
![avatar](public/images/1.jpg)

![avatar](public/images/2.jpg)

![avatar](public/images/3.jpg)

![avatar](public/images/4.jpg)

![avatar](public/images/5.jpg)

![avatar](public/images/6.jpg)

Requirements
------------
 - PHP >= 7.0.0
 - Laravel >= 5.5.0
 - Fileinfo PHP Extension

Installation
------------

> This package requires PHP 7+ and Laravel 5.5, for old versions please refer to [1.4](https://laravel-admin.org/docs/v1.4/#/)


```
git clone git@github.com:JensonHarris/laravel-blog.git
```
我们需要复制跟目录下的 .env.example 文件并重命名为 .env ；

```
cp .env.example .env  
```
我们需要在 .env文件中修改数据库配置；
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

使用 composer ；

```
composer install  
```
生成 key ；
```
php artisan key:generate  
```
生成数据表；
```
php artisan migrate  
```
生成初始化的数据；
```
php artisan db:seed    
```
