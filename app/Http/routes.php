<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return array(
        'errcode' => 0,
        'errmsg' => 'success.'
    );
});

/**
 * Api 路由接管
 */
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function($api){
    $api->group(['namespace' => 'App\Api\Controllers','prefix' => 'v1','middleware' => 'jwt.api.auth'],function($api){
        $api->get('demo', 'DemoController@index'); # Demo
      
    });
    $api->group(['namespace' => 'App\Api\Controllers','prefix' => 'v1'], function($api){

    });
});



