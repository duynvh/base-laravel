### Install application.
-   Clone project and setup
-   Start docker

    ```docker-compose up -d```

-   Install needed packages

    ```docker exec php-fpm composer install```
-   Generate key, migration

    ```docker exec php-fpm php artisan key:generate```
    
    ```docker exec php-fpm php artisan migrate```
