<?php
/**
 * Created by PhpStorm.
 * User: lipeng
 * Date: 15/11/29
 * Time: 下午5:40
 */

namespace App\Api\Controllers;
use App\Api\Transformers\UserTransformer;
use App\Api\Model\User;

class UserController extends BaseController{
    public function index(){
        $user = User::all();
        return $this->collection($user, new UserTransformer());

    }
}