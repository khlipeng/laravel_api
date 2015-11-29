<?php
/**
 * Created by PhpStorm.
 * User: lipeng
 * Date: 15/11/29
 * Time: 下午6:18
 */

namespace App\Api\Controllers;
use Illuminate\Http\Request;
use JWTAuth;
use App\Api\Model\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthController extends BaseController{
    /**
     * 用户注册
     * @param String $name 用户名
     * @param String $email 用户邮箱
     * @param String $password 用户密码
     * @return Response.json
     */
    public function register(Request $request){
        // 验证规则
        $rules = array(
            'name' => array('required', 'min:2', 'max:16'),
            'email' => array('required'),
            'password' => array('required', 'min:6', 'max:18'),
        );
        $payload = app('request')->only('password', 'name', 'email');
        // 验证格式
        $validator = app('validator')->make($payload, $rules);
        if ($validator->fails()) {
            return response()->json(
                array(
                    'errcode' => -4,
                    'errmsg' => $validator->errors()
                ), 200);
        }

        $newUser = [
            'email' => $request->get('email'),
            'name' => $request->get('name'),
            'password' => bcrypt($request->get('password')),
        ];
        //var_dump($newUser);exit;
        $user = User::create($newUser);
        $token = JWTAuth::fromUser($user);

        return response()->json(compact('token'));
    }
    /**
     * 用户登录
     * @param String $email 用户邮箱
     * @param String $password 用户密码
     * @return Response.json
     */
    public function authenticate(Request $request){

        // 验证规则
        $rules = array(
            'email' => array('required'),
            'password' => array('required', 'min:6', 'max:18'),
        );
        $payload = app('request')->only('password', 'email');
        // 验证格式
        $validator = app('validator')->make($payload, $rules);
        if ($validator->fails()) {
            return response()->json(
                array(
                    'errcode' => -4,
                    'errmsg' => $validator->errors()
                ), 200);
        }


        try {
            if (! $token = JWTAuth::attempt($payload)) {
                return response()->json(array(
                    'errcode' => 401,
                    'erromsg' => 'invalid_credentials'
                ), 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(array(
                'errcode' => 500,
                'erromsg' => 'could_not_create_token'
            ), 500);
        }

        // all good so return the token
        return response()->json(array(
            'errcode' => 0,
            'errmsg' => 'success.',
            'data' => compact('token')
        ));
    }
    public function getAuthenticatedUser(){
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }




}