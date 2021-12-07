## Set up

Open terminal.

Navigate to project root.

`cd bookstore`

`composer install`

### Generate encription keys

`php artisan passport:install`

This will generate personal access client and password grant client.
You will need password grant client, memorise fields Client Id and Client secret from password grant client.

### Run seeders.

`php artisan migrate --seed`

# To be continued...
