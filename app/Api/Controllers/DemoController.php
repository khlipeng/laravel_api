<?php
/**
 * Created by PhpStorm.
 * User: lipeng
 * Date: 15/11/29
 * Time: 下午5:40
 */

namespace App\Api\Controllers;
use JWTAuth;
class DemoController extends BaseController{
   public function index(){
    	return response()->json(array(
    		'errcode' => 0,
    		'errmsg' => 'success.',
    		'data' => $user
    	));
  }

}