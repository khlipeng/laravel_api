<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SSO 子站身份认证
    |--------------------------------------------------------------------------
    |
    | sso-secret 需要与提交至 SSO Manage 信息要一致
    | 可以使用命令生成: `php artisan sso-client:generate`
    |
    */

    'secret' => env('SSO_SECRET', 'wanwanhome'),
    /*
    |--------------------------------------------------------------------------
    | 系统域名
    |--------------------------------------------------------------------------
    |
    | 系统域名，需包含 http://  ||  https://
    |
     */

    'host' => env('APP_HOST','http://app.wwh.com'),

    /*
    |--------------------------------------------------------------------------
    | 有效时间
    |--------------------------------------------------------------------------
    | SSO 系统生成的 Token 有效时间
    |
    |
     */
    'validity' => 3600


];