<?php
/**
 * Created by PhpStorm.
 * User: 宿疯
 * Date: 2017/1/11
 * Time: 16:22
 */

namespace Home\Model;

use Think\Model;

class UsersModel extends Model
{
    public function checkUser($name, $pw)
    {
        $model           = M('users');
        $map['logname']  = $name;
        $map['password'] = $pw;
        $res             = $model->where($map)->find();
        var_dump($res);
        if(empty($res)){
        	return false;
        }else{
        	return true;
        }
    }
}
