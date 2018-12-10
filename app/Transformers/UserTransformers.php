<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/10 0010
 * Time: 17:41
 */

namespace App\Transformers;


use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformers extends TransformerAbstract
{
    public function transform(User $user){
        return [
            'id' => $user['id'],
            'name' => $user['name'],
        ];
    }
}
