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
        if (empty($res)) {
            return false;
        } else {
            return $res;
        }
    }
    /**
     * 获取用户权限
     * @author 风雨雾凇,
     * @version     [version]
     * @anotherdate 2017-01-12
     * @param       [type]     $name [用户名]
     * @return      [type]           [description]
     */
    public function getPower(){
    	$model=M('users');
    	$map['logname']=session('name');
    	$res=$model->where($map)->field('power')->find();
    	return $res;
    }	
    /**
     * 设置老师管理权限
     * @author 风雨雾凇,
     * @version     [version]
     * @anotherdate 2017-01-12
     */
    public function setPower()
    {
        $model           = M('users');
        $map['password'] = "tech!";
        $change['power'] = 1;
        $model->where($map)->save($change);
    }
}
