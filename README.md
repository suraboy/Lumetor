# Lumetor v1.0.1
For repository patten design under `lumen framework`
# Feature 
- can install via `composer`
- can create update delete search all ,where like ,find by id , filter language 
- can reponse json format [not code API standard] 
- can generate request file 
	- Create{namespace}Request
	- Update{namespace}Request
	- Delete{namespace}Request
	- Get{namespace}Request
- can generate model and sync table automatically
- can generate controller 
- can generate route and mapping auto to controller
- can generate repository extended on APIBaseRepository
	- generate automatically interfaces of repository
- can generate migration file
# Installation 
```php
composer require boynii/Lumetor
```
# To register a service provider.
add the Provider to the providers array in bootstrap/app.php
```php
$app->register(Lumetor\Providers\LumetorProvider::class);
```
# Recommend
You can add helpers folder in app folder and add helpers.php
```php
<?php
if ( ! function_exists('config_path'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}
```
then add this to composer.json
```php
"autoload": {
    "psr-4": {
        "App\\": "app/"
    },
    "files": [
        "app/helpers/helpers.php"
    ]
},
```
then run,
```
composer dump-autoload
```


# Command
```php
$ php artisan boynii:genfile
```
# copy environment
 append `.env` file 
```php
$ php boynii:copy-env  
```
# copy migration file
for copy migration file to dastabase/migrations/
```php
$ php boynii:copy-migration 
```
