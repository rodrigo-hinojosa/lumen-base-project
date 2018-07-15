<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->post('token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');

$router->group(['middleware' => ['cors', 'ctjr']], function () use ($router) {

    $router->group(['prefix' => 'auth/user', 'middleware' => ['auth:api']], function () use ($router) {
        $router->get('', ['uses' => 'UserController@getUserByAccessToken']);
    });

    /**
     * router list of User Model
     *
     * @return \Illuminate\Http\Response
     */
    $router->group(['prefix' => 'users', 'middleware' => ['auth:api']], function () use ($router) {
        $router->get('', ['uses' => 'UserController@index']);
        $router->get('{id}', ['uses' => 'UserController@show']);
        $router->post('', ['uses' => 'UserController@store']);
        $router->put('{id}', ['uses' => 'UserController@update']);
        $router->delete('{id}', ['uses' => 'UserController@destroy']);
    });

    /**
     * router list of UserState Model
     *
     * @return \Illuminate\Http\Response
     */
    $router->group(['prefix' => 'userstates', 'middleware' => ['auth:api']], function () use ($router) {
        $router->get('', ['uses' => 'UserStateController@index']);
        $router->get('{id}', ['uses' => 'UserStateController@show']);
        $router->post('', ['uses' => 'UserStateController@store']);
        $router->put('{id}', ['uses' => 'UserStateController@update']);
        $router->delete('{id}', ['uses' => 'UserStateController@destroy']);
    });

    /**
     * router list of UserType Model
     *
     * @return \Illuminate\Http\Response
     */
    $router->group(['prefix' => 'usertypes', 'middleware' => ['auth:api']], function () use ($router) {
        $router->get('', ['uses' => 'UserTypeController@index']);
        $router->get('{id}', ['uses' => 'UserTypeController@show']);
        $router->post('', ['uses' => 'UserTypeController@store']);
        $router->put('{id}', ['uses' => 'UserTypeController@update']);
        $router->delete('{id}', ['uses' => 'UserTypeController@destroy']);
    });

});



