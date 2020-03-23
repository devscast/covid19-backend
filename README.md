# covid19-backend
## Description
Backend application of the covid19 DRC project, a project of Congolese developers around the world in the fight against coronavirus.

The Client or frontend App is at : https://github.com/devscast/covid19-client

Made with Symfony (backend) and Angular ( frontend)
### Features:
* Case management by the Ministry of Health
* Collection and management of alerts
* Management of notification subscriptions
* News management

## How to contribute
* Fork the repo on your github
* Clone the forked repo 
* Add or choose an issue at https://github.com/devscast/covid19-backend/issues
* Do not change a feature or function that is not relevant to your issue. 
* Commit fast, Commit often , keep it optional
* Commit with A Clear message  eg: ``` git commit -m "[New][update][Fix] function or issue number" ```
* Push your changes on your forked repo ``` git push your_remote your_branch ```
* Make a pull request to the original repo
* if you have conflict or issue contact samy Mwamba or Bernard Ngandu

#Software requirements
PHP Version 7.4 |
Mysql |
Composer
# Set up the App
```

$ composer install

## database setup create .env.local conforming with .env
$ php bin/console doctrine:database:create  
$ php bin/console doctrine:migrations:migrate

##run app
$ php -S localhost:8000 -t public 
```

