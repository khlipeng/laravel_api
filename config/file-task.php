<?php

return [

    /*
    |--------------------------------------------------------------------------
    | 文件处理系统任务处理
    |--------------------------------------------------------------------------
    |
    |
    */
    'redis' => [
        'host'     => env('F_TASK_REDIS_HOST', 'localhost'),
        'password' => env('F_TASK_REDIS_PASSWORD', null),
        'port'     => env('F_TASK_REDIS_PORT', 6379),
        'database' => env('F_TASK_REDIS_DATABASE', 1),
    ],
    'key' => env('WORK_LIST_KEY', 'raw-model-list'),
    'path' => env('WORK_PATH', '/raw/'),
];
