# covid19-backend
## Description
Backend application of the covid19 DRC project, a project of Congolese developers around the world in the fight against coronavirus.
### Features:
* Case management by the Ministry of Health
* Collection and management of alerts
* Management of notification subscriptions
* News management

## install
PHP Version 7.4 |
Mysql |
Composer
```
$ git clone https://github.com/devscast.com/covid19-backend.git covid19-backend
$ cd covid19-backend

$ composer install

## database setup create .env.local conforming with .env
$ php bin/console doctrine:database:create  
$ php bin/console doctrine:migrations:migrate

##run app
$ php -S localhost:8000 -t public 
```
