# ticTacToe

For Run the app using symfony framework

required PHP7.2


#Running the app

you have two way

First using symfony server

> chmod 775 -R var/
> composer install

for Run
> bin/console server:run

then the link for app will appear on terminal

For Test
> bin/phpunit 



Second way using Docker
 
> docker-composer up -d

then access the container bash using 

>docker exec -it -u $(id -u):$(id -g) tic-tac-toe-php-fpm bash

then in opening bash run
> chmod 775 -R var/

> composer install

For Test
> bin/phpunit 

then the app will be available on http://localhost:9090/
