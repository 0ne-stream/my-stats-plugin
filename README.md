# How to create Addon to 1Stream


### Short
Addons are based on the Laravel Packages, but since 1Stream is running in production mode, there are specifics to the loading.

Laravel Packages: https://laravel.com/docs/8.x/packages

If your Addon needs to do validation with 1Stream app version, you can check with config('app.version').


### What can Addons do
You can register event listeners to record statistics.

You can register menu entries with new pages and tables.


### Caution
Beware what addons you are installing to your system, because they can bring security or performance issue.


### Example Addon
`https://github.com/0ne-stream/my-stats-plugin`


### Specifics
Every Addon needs to contain `/init.php` file that should serve to register the Service Provider:

```php
<?php

// Composer autoloader
global $loader;

// 1Stream array that indicates the loaded plugins
global $plugins;

// Register your classes to the Composer autoloader
$loader->addPsr4('Acme\\MyStats\\', __DIR__ . '/src/');

// Push information about the plugin into the 1Stream project
$plugins[] = [
    Acme\MyStats\Plugin::NAME,
    '\Acme\MyStats\MyStatsPluginServiceProvider',
];
```

On 1Stream side, typical installation of addon is done like that
```bash
PROJECT_DIR="/home/onestream/iptv"

cd $PROJECT_DIR/packages;

echo "Extracting $1";
tar -vxf $1;

cd $PROJECT_DIR;

php artisan plugin:autoload-rebuild
php artisan cache:clear
echo 'yes' | php artisan migrate
php artisan settings:setup
php artisan roles:setup
php artisan permission:cache-reset
php artisan vendor:publish --tag=public --force
php artisan routes:javascript --path public/js/scripts/router
```

When the addon has to register new permissions, they have to be added in `config/sidebar_permissions.php`. If there are some specific to reseller, the have to be added to file `config/reseller_permissions.php`.

If you are using 'check.permission' middleware (as in the Example), it is required to set permissions to every new route in `config/route_permissions.php`.