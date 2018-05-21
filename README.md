## NKN CMS

#### 1. Language and framework
PHP >=7.0.0  
Laravel v5.5.*  
[laravel-admin v1.5.x-dev](http://laravel-admin.org/)    

#### 2. Install and run
[Deploy the server environment](http://www.jianshu.com/p/1f17a69f6dcf)

Reboot server.

Go in project path :
```bash
$ cd [project path]
$ chmod -R 777 storage/

$ composer install
$ npm install

$ cp .env.example .env
$ php artisan key:generate 

$ php artisan migrate:install
$ php artisan migrate

$ php artisan passport:install
# 将生成的两个CLIENT_Secret保存到.env中
```  
  
!! If you have problems you need to roll back to rebuild the database:    
!! 如果出现问题需要回滚重建数据库：  
```bash
$ php artisan migrate:refresh
$ php artisan migrate
```
 