## 使用 Laravel 5.1 创建 RESTful Api
### 项目备注

* PHP 5.9 +
* 具体数据返回形式、数据存储等操作，请按照项目要求进行。
* 由于本项目是以 Api 接口形式提供数据，这里使用了 `JWT-auth` ,有认证的路由需要在请求头带上
	
	`Authorization` : `Bearer {token}`
	 
* 如果是使用 Apache 服务器，请在 `public/.htaccess` 添加以下配置

		RewriteEngine On
		RewriteCond %{HTTP:Authorization} ^(.*)
		RewriteRule .* - [e=HTTP_AUTHORIZATION:%1]

		
### 引入的中间件有

* dingo/api: `1.0.*@dev`
* tymon/jwt-auth: `0.5.*`

### 配置文件
* /api/config/api.php
* /api/config/jwt.php

#### ENV 需设置的项目有
	
	API_VENDOR=Api
	API_VERSION=v1
	API_PREFIX=api
	API_DEBUG=true
	API_DEFAULT_FORMAT=json
	
* API_DEBUG 为 Api 的 DEBUG 输出，线上环境请 设置为 `false`。

### 由于是使用 Api 接口方式，需要禁用 `CSRF`
* 禁用方法 
	
	1、打开文件：app\Http\Kernel.php
	
	2、把这行注释掉：
		
		'App\Http\Middleware\VerifyCsrfToken'
		
### 查看已经存在的路由
* Laravel 查看路由命令 
	
		php artisan api:routes



	
