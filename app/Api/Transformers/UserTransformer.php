<?php
/**
 * Created by PhpStorm.
 * User: lipeng
 * Date: 15/11/29
 * Time: 下午5:51
 */

namespace App\Api\Transformers;

use App\Api\Model\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract{
    public function transform(User $user){
        return [
            'name' => $user['name'],
            'email' => $user['email'],
            'icon' => $user['icon'],
            'create_time' => $user['create_time']
        ];
    }
}