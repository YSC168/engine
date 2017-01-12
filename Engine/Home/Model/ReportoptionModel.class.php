<?php
/**
 * Created by PhpStorm.
 * User: 宿疯
 * Date: 2017/1/11
 * Time: 17:21
 */

namespace Home\Model;

use Think\Model;

class reportoptionModel extends Model
{
    /**
     * 获取报表类型
     * @author 风雨雾凇,
     * @version     [version]
     * @anotherdate 2017-01-12
     * @return      [type]     [description]
     */
    public function getType()
    {
        $model = M('Reportoption');
        $res   = $model->select();
        return $res;
    }
    /**
     * 根据类型获取表类型
     * @author 风雨雾凇,
     * @version     [version]
     * @anotherdate 2017-01-12
     * @param       [type]     $type [description]
     * @return      [type]           [description]
     */
    public function getType_type($type)
    {
        $model       = M('Reportoption');
        $map['type'] = $type;
        $res         = $model->where($map)->select();
        return $res;
    }
    /**
     * 设置类型
     * @author 风雨雾凇,
     * @version     [version]
     * @anotherdate 2017-01-12
     * @param       [type]     $name  名称
     * @param       [type]     $value 值
     */
    public function setType($name, $value)
    {
        $model        = M('Reportoption');
        $add['name']  = $name;
        $add['value'] = $value;
        $model->add($add);
    }
    /**
     * 删除报表类型
     * @author 风雨雾凇,
     * @version     [version]
     * @anotherdate 2017-01-12
     * @param       [type]     $id [description]
     * @return      [type]         [description]
     */
    public function delType($id)
    {
        $model = M('Reportoption');
        $res   = $model->delete($id);
        if ($res == 0) {
            return false;
        } else {
            return true;
        }}
}
