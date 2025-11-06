This projec was set and run up by using laravel sail, desktop docker with wsl ubuntu.

Before start you should create env file from .env.example and add these environment variables. they can be changed if nesecery.

DB_CONNECTION=mariadb

DB_HOST=mariadb

DB_PORT=3306

DB_DATABASE=movies

DB_USERNAME=dbuser

DB_PASSWORD=dbpasword

OMDBAPI_KEY=yoromdbapikey #from omdbapi.com


To run project I have to start desktop docker, open wsl ubuntu in project dir and run these commands 

composer install

./vendor/bin/sail up -d

./vendor/bin/sail artisan migrate

Project should be running on localhost
