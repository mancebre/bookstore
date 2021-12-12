# Demo Laravel REST API

This is an example of a Laravel REST API

## Requirements

-   PHP 7.3 >
-   MySQL
-   phpunit
-   composer

## Setup

Open terminal.

Navigate to project root.

```
cd bookstore
composer install
```

### Generate encryption keys

```
php artisan passport:install
```

This will generate personal access client and password grant client.

You will need password grant client, memorise fields Client Id and Client secret from password grant client.

### Run seeders.

```
php artisan migrate --seed
```

For testing purposes seeder always creates the same user.

```
[
    'name' => 'Test User',
    'email' => 'testuser@email.com',
    'password' => 123456,
]
```

To run the project on a local server run this command from the root directory.

```
php artisan serve
```

### Postman

At the root of the project, you can find the postman collection with all API requests.

```
Bookstore.postman_collection.json
```

### Usage

Import "Bookstore.postman_collection.json" collection to postman.

Login using the "Oauth token" request from the Postman collection.

Use all preset fields except field "client_secret", The field "client_secret" need to be changed to the value of field "Client secret" returned by "php artisan passport:install".

The Oauth token request returns this response:

```
{
    "token_type": "Bearer",
    "expires_in": 31536000,
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiNmFhNjY1OThjODg2Mzc4NjEzM2NlYTUwNThkMjdiMmMxMmRhMDRjZTAyZWNhMmY2NGE5NTZiYTNmMDE0ZTcxMTkyOWVlYThhYTUyMWM5MmEiLCJpYXQiOjE2MzkyOTgwMTEuODczNTQyLCJuYmYiOjE2MzkyOTgwMTEuODczNTQ0LCJleHAiOjE2NzA4MzQwMTEuODY5ODUsInN1YiI6IjExIiwic2NvcGVzIjpbXX0.AXmgGXGpWpfBXWD8-zVv9ywDkn5Dkhi7Zy3UZRw1D6Jq9GqhFvXUOhx799tQbyrHjOjNLpfIzRHLQbrwpfCn9xElPKY4Ci-98Ics2mCNOntguq-st_JUqFcwBdXTjLQItccquL7lzNkwtFFNM1SC5WUcGBlUdLB1Jy921w1vQTe-CNVndxUEBqvWsKySLTh7ncbByV-RXkOzIz2Rl3WUbDEevCJNseUp-9UxnIl0gM5TjC-lQADe87HawLSnM8snkfWFbRvDbFvj63xo8bgCTYnj1LvdtXcGgDffMnmebmLfCXotVI_CN6mHSp-XVRMRpuCqLl1qXuKgtqOZupWsgNSc7j2Nr8O9hKpKo2PhCotnmnrapM8QTnxHnC3n7rdJiw9E1YwAy6ZQ8SAe-Thlr_yojCrl4QZygSF_OzRiV4tjO7CvSM6wc_3-AeZFcqn9pjGU3JXNJDL_CJLPGl44OmfThPkOcI5ZA36iHwEjCJh16xQmXgri7KMZgTk73rD33hQAmnvyoPhf2pe62Tyo5Kume4WjLs2eea4ysqQqWvq96_WYNCPSuhq9tSICYNyo-llm3JSr8ymUOzA3-LfJSQup9MAO8COGfbshZhpfwk2rsVgqTL-vSSln95teo8aLSz9W8DqTFyTpM4R9il93o3bai4ctzpzlD5v9POwew3M",
    "refresh_token": "def50200512ecc18a2ef1a34709cc0de6292802b70787faf5b7309a66bf7efa691f7369cb06147848225c4b4592e06ee2a19d8c5898d53ccb65450e6df74208ad92c2082253f7c103677503de7470b585985cf28797fbad83f10542f9c2da9b8c7d39178595ddfa4f2578b87b8879718a67c568414f7a7f9284cc7bc3e329165ae18773c50def1f38d63e39b49af5c3c6375eb4b5f5e56a3a3467ad7272909063208c815b3482b5283bf475c50c5802892e79524d4d7613fff3394a98d0ac199b08a55e4f5284786326e041aad31b6a45cba58549bd7d824ff956867c789578c787a6aaefb74862d8d9fddb3284730dba4040d0e6df99d997f0954fa6cb6173c6c0cf310ff06b45318ce183e7ce9aa42ffb4d21f0b1f4e9190dd5ece16969e293d029e0575eb289a446a3928ad964906953471f8d4654cd96068da2047f87851665bea6edee8159991dee5c440216b5e3fffe97946b96f8feb295357ed692bf77ad6"
}
```

<b>Use the access token from the above request as a bearer token in all other requests!</b>
