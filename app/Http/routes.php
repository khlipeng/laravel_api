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

Route::post('/', function () {
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
         * 路由为 : /api/request
         */
        $api->post('user/request','AuthController@register');
        $api->post('user/login','AuthController@authenticate');
        /**
         * 使用 JWT-AUTH 认证
         */
        $api->group(['middleware' => 'jwt.auth'],function($api){
            $api->get('user/me','AuthController@getAuthenticatedUser');
            $api->get('users','UserController@index');
            $api->get('users/{id}','UserController@show');
        });
    });
});