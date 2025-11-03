At first install run: ```docker compose up --build -d```

Then go into the container: ```docker exec -it ADV2 bash```. And run ```composer install``` (This creates the vendor
folder)

### To start the Tests inside the container ```/var/www/html```:

``` ./vendor/bin/phpunit tests ```

### To test the coverage use:

```./vendor/bin/phpunit --coverage-html coverage/```

