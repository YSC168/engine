<?php
namespace Home\Controller;

use Think\Controller;

class UsersController extends Controller
{
    /**
     * 验证用户名密码是否正确
     * @author 风雨雾凇,
     * @version     [version]
     * @anotherdate 2017-01-11
     * @param       [type]     $name [用户名]
     * @param       [type]     $pw   [密码]
     * @return      [type]           [description]
     */
    public function checkUser()
    {
        $name = I('get.name');
        $pw   = I('get.pw');
        if (empty($name)) {
            $res = array(
                'Status' => 0,
                'Mes'    => '用户名不规范',
            );
            $this->ajaxReturn($res);
        } else if (empty($pw)) {
            $res = array(
                'Status' => 0,
                'Mes'    => '密码不规范',
            );
            $this->ajaxReturn($res);
        } else {
            $model = D('Users');
            $res   = $model->checkUser($name, $pw);
            var_dump($res);
        }
    }
}
