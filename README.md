# covid19-backend
## Description
[![Build Status](https://travis-ci.com/devscast/covid19-backend.svg?branch=master)](https://travis-ci.com/devscast/covid19-backend)

This is the Backend application of the Covid-19 Project for DR Congo, a project initiated and supported by Congolese developers community around the world to help with the fight against coronavirus.

The Github reposiroty for the Client or frontend App is at: https://github.com/devscast/covid19-client

### Framework:
The Web App is fully open-source and based on Symfony 4 PHP framework (backend) and Angular (frontend)

### Features:
* Dashboard: providing a Case management overview (Data provided by the DRC Ministry of Health)
* Alerts module
* Notification subscriptions module
* News module

## How to contribute
* Fork the repo on your github
* Clone your forked repo 
* Add or choose an issue at https://github.com/devscast/covid19-backend/issues
* Do not change a feature or function that is not relevant to your issue.
* Make your changes
* Commit fast, Commit often , keep it optional
* Commit with A Clear message  eg: ``` git commit -m "[New][update][Fix] function or issue number" ```
* Push your changes on your forked repo ``` git push your_remote your_branch ```
* Make a pull request to the original repo
* If a conflict occurs when you ask Git to merge your code, try to resolve it with a new commit, if the conflict persists, please contact Samy Mwamba or Bernard Ngandu

#Software requirements
PHP Version 7.4 |
Mysql 5.5 and newer|
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

