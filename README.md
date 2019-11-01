[![Build Status](https://travis-ci.org/maxca/Lumpineevill.svg)](https://travis-ci.org/maxca/Lumpineevill)
# Lumpineevill v.1.0.6.*
For repository patten design under `Laravel framework`
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
composer require boynii/lumpineevill 
```
# Laravel 5.*: Serviceprovider
If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php
```php
Lumpineevill\ServiceProvider\LumpineevillServiceProvider::class
```
# Command
```php
$ php artisan boynii:genfile 
$ php artisan boynii:genfront
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
# publishes vendor config 
```php 
$ php artisan vendor:publish --provider="Lumpineevill\ServiceProvider\LumpineevillServiceProvider"
```
