<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    echo '{"Version":1.0,"Server":"Api"}';
});

/**
 * Api 路由接管
 */
$api = app('Dingo\Api\Routing\Router');
/**
 * 路由定义样例
 */
$api->version('v1', function ($api) {
    /**
     * 该路由的命名空间为  App\Api\Controllers
     */
    $api->group(['namespace' => 'App\Api\Controllers','prefix' => 'v1'],function($api){
        /**
         * 路由为 : /api/v1/users
         */
        $api->get('users','UserController@index');
    });
    $api->group(['namespace' => 'App\Api\Controllers'],function($api){
        /**
         * 路由为 : /api/users
         */
        $api->get('users','UserController@index');

        $api->post('user/login','AuthController@authenticate');
    });
});