
Welcome to the Laravel CameraStore sample application for Tradenity PHP SDK
=================================


## Live demo

Here you can find live demo of the [Camera store sample application](http://camera-store-sample.tradenity.com/).
This is the application we are going to build here.


## Prerequisites

(Will install automatically via maven)

-  Laravel framework > 5.1 (other versions may work but not tested)
-  [Tradenity PHP SDK](https://github.com/tradenity/php-sdk)
-  [Laravel extensions for the Java SDK](https://github.com/tradenity/php-sdk-laravel-ext)



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


## Tutorials and sample applications


We also provide a detailed explanation of the code of this sample applications in the form of a step by step tutorials:

[Camera store for spring mvc tutorial](http://docs.tradenity.com/kb/tutorials/php/laravel).

