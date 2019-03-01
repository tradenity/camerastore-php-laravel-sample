
Welcome to the Laravel CameraStore sample application for Tradenity ecommerce API PHP SDK
=================================


This is sample application for [Tradenity](https://www.tradenity.com) ecommerce API using the [PHP SDK](https://github.com/tradenity/php-sdk) using the Laravel framework.

This sample application is free and opensource, we encourage you to fork it and use it as a base for your future applications.

## Live demo

Here you can find live demo of the [Camera store sample application](http://camera-store-sample.tradenity.com/).
This is the application we are going to build here.


## Prerequisites

(Will install automatically via composer)

-  Laravel framework > 5.1 (other versions may work but not tested)
-  [Tradenity PHP SDK](https://github.com/tradenity/php-sdk)
-  [Laravel extensions for the PHP SDK](https://github.com/tradenity/php-sdk-laravel-ext)


## Create store and load sample data

- If you are not yet registered, create a new [Tradenity account](https://www.tradenity.com).
- After you login to your account, go to [Getting started](https://admin.tradenity.com/admin/getting_started) page, click "Create sample store", this will create a new store and populate it with sample data
- From the administration side menu, choose "Developers" > "API Keys", you can use the default key or generate a new one.



## Setup your credentials

First of all, you have to get API keys for your store, you can find it in your store `Edit` page.
To get there navigate to the stores list page, click on the `Edit` button next to your store name, scroll down till you find the `API Keys` section.


## Initialize the library

Add your Store keys to `config/tradenity.php` file, also your stripe public key.



```php
return [
    'stripe_key' => 'pk_xxxxxxxxxxxxxxxxxxxx',
    'api_key' => 'sk_xxxxxxxxxxxxxxxxxxxxxx'
];

```


## Run the application


`php artisan serve`


## Tutorials and guides


We also provide a detailed explanation of the code of this sample applications in the form of a step by step tutorials:

[Camera store for Laravel PHP web framework tutorial](http://docs.tradenity.com/kb/tutorials/php/laravel).

