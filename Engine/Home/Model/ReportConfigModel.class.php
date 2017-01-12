<?php
/**
 * Created by PhpStorm.
 * User: 宿疯
 * Date: 2017/1/11
 * Time: 17:21
 */

namespace Home\Model;

use Think\Model;

class reportConfigModel extends Model
{
	/**
	 * 新增报表数据字段
	 * @author 风雨雾凇,
	 * @version     [version]
	 * @anotherdate 2017-01-12
	 * @param       [type]     $name  名字
	 * @param       [type]     $value 值
	 */
	public function setOption($name,$value,$type){
		$model=M('reportconfig');
		$add['name']=$name;
		$add['value']=$value;
		$add['type']=$type;
		$model->add($add);
	}
	/**
	 * 获取报表选项
	 * @author 风雨雾凇,
	 * @version     [version]
	 * @anotherdate 2017-01-12
	 * @return      [type]     [description]
	 */
	public function getOption(){
		$model=M('reportconfig');
		$res=$model->select();
		return $res;
	}
	public function getOption_type($type){
		$model=M('reportconfig');
		$map['type']=$type;
		$res=$model->where($map)->select();
		return $res;
	}
	/**
	 * 删除报表选项
	 * @author 风雨雾凇,
	 * @version     [version]
	 * @anotherdate 2017-01-12
	 * @param       [type]     $id 选项id
	 * @return      [type]         [description]
	 */	
	public function delOption($id){
		$model=M('reportconfig');
		$res=$model->delete($id);
		return $res;
	}
}