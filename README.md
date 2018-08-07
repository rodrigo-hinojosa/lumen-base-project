# lumen-base-project
## Structure standar for any project with Lumen 5.6

## Installation

```sh
git clone https://github.com/RhinojosaDeveloper/lumen-base-project.git
```

## Install dependencies

```sh
//cd inside project folder
cd lumen-base-project

//install dependencies
composer install

//update dependencies (before check the libraries project for any breaking changes)
composer update
```

## Generate new app  key

```sh
php artisan key:generate
```

## Running Migrations

> **NOTES** before run `migrate` and next commands: edit you `.env` project file and complete database credentials

```sh
# Create new tables from model migrations and passport tables
php artisan migrate --seed
```

## install Laravel Passport

```sh
# Install encryption keys and other necessary stuff for Passport
php artisan passport:install
```

## Get secret client key from database

run the following query:

```sh
select * from oauth_clients;
```
![alt text](https://github.com/RhinojosaDeveloper/images_for_projects/blob/master/get_passport_secret_id.gif)

## Get some username from database

run the following query:

```sh
select * from users;
```
![alt text](https://github.com/RhinojosaDeveloper/images_for_projects/blob/master/get_username.gif)

## Generate token  
Set secret client key and login credentials and get Token

> **NOTES** download the following client for check the api: `https://www.getpostman.com/` 

import this API routes collection : https://github.com/RhinojosaDeveloper/lumen-base-project/blob/master/base-project.postman_collection.json

![alt text](https://github.com/RhinojosaDeveloper/images_for_projects/blob/master/generate_token.gif)


## Check API REST send token with your request AND ENJOY!!

Get user list from database
![alt text](https://github.com/RhinojosaDeveloper/images_for_projects/blob/master/get_user_list.gif)

insert user into database
![alt text](https://github.com/RhinojosaDeveloper/images_for_projects/blob/master/create_user.gif)

### Installed routes

This base -project mounts the following routes after you call routes() method (see instructions below):

Verb | Path | NamedRoute | Controller | Action | Middleware
--- | --- | --- | --- | --- | ---
POST   | /oauth/token                             |            | \Laravel\Passport\Http\Controllers\AccessTokenController@issueToken' | issueToken        | -
GET    | /auth/user                               |            | UserController@getUserByAccessToken                                  | get user by token | auth
GET    | /users                                   |            | UserController@index                                                 | get all users     | auth
GET    | /users/{id}                              |            | UserController@show                                                  | get a user        | auth
POST   | /users                                   |            | UserController@store                                                 | create a user     | auth
PUT    | /users/{id}                              |            | UserController@update                                                | update a user     | auth
DELETE | /users/{id}                              |            | UserController@destroy                                               | delete a user     | auth
GET    | /usertypes                               |            | UserTypeController@index                                             | get all userTypes | auth
GET    | /usertypes/{id}                          |            | UserTypeController@show                                              | get a userType    | auth
POST   | /usertypes                               |            | UserTypeController@store                                             | create a userType | auth
PUT    | /usertypes/{id}                          |            | UserTypeController@update                                            | update a userType | auth
DELETE | /usertypes/{id}                          |            | UserTypeController@destroy                                           | delete a userType | auth


### Fractal serialize data conversion

When you send or request data to api rest, the input or output data is in Camel case format.

```sh
# example "user_type_id" in model Lumen
user_type_id => userTypeId
```

### This project uses the following libraries

#### Lumen Generator
* https://github.com/flipboxstudio/lumen-generator

#### Fractal
* https://github.com/thephpleague/fractal

#### Lumen Passport
* https://github.com/dusterio/lumen-passport

#### Laravel Cors
* https://github.com/barryvdh/laravel-cors

#### Request Validate
* https://github.com/pearlkrishn/lumen-request-validate
