# covid19-backend
* Alertes and Notifications : https://covid19news.devs-cast.com
* Api endpoints : https://covid19news.devs-cast.com/api

## install
```
$ git clone https://github.com/devscast.com/covid19-backend.git covid19-backend
$ cd covid19-backend

$ composer install
$ php bin/console doctrine:database:create  \\ database setup create .env.local conforming with .env
$ php bin/console doctrine:migrations:migrate

$ php -S localhost:8000 -t public \\ run app
```
