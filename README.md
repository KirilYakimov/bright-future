# Bright future project

School project which will write posts to database which will be seen by accessing endpoint which will show on the home wall.

## Pre-reqs

Install php 7.2+: [Ubuntu](https://www.vultr.com/docs/configure-php-7-2-on-ubuntu-18-04) [Windows 10](https://www.dorusomcutean.com/how-to-install-php-7-2-on-windows/)

Install composer 1.9.0+: [With php from above](https://getcomposer.org/download/)

XAMPP(optional): [With binary](https://www.apachefriends.org/download.html)

## Deploy

Install dependancies from `composer.json`: 
```
$ composer install
$ composer require intervention/image
```

## Configure

If you want to edit the projct and make new content you will neeed to install npm
```
$ npm install
$ npm install --save @fortawesome/fontawesome-free
```

In order to connect the laravel installation with your database and other stuff copy the `.env.example` file:
```
$ cp .env.example .env
```

You can see the configuration in that file. Laravel will read from that file.

For example the DB connection(MySQL) configuration looks like:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=brightfuture // you need to create it manualy 
DB_USERNAME=root
DB_PASSWORD=
```

Edit the email verification of choice 
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME= - Your testing mail
MAIL_PASSWORD=    and password 
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null 
MAIL_FROM_NAME="${APP_NAME}"
```

After that you can run those Php artisan commands
```
$ php artisan key:generate
$ php artisane migrate
```