<?php
/**
 * Created by PhpStorm.
 * User: lipeng
 * Date: 15/11/29
 * Time: 下午5:40
 */

namespace App\Api\Controllers;
class DemoController extends BaseController{
   public function info(){
    	return response()->json(array(
    		'errcode' => 0,
    		'errmsg' => 'success.'
    	));
   }

}