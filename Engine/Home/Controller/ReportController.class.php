<?php
/**
 * Created by PhpStorm.
 * User: 宿疯
 * Date: 2017/1/11
 * Time: 16:09
 */

namespace Home\Controller;

use Think\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $this->display();
    }
    /**
     * 新增报表设置接口
     * @author 风雨雾凇,
     * @version     [version]
     * name         名称
     * value         值
     * @anotherdate 2017-01-12
     */
    public function setOption()
    {
        $name         = I('post.name');
        $value        = I('post.value');
        $type         = I("post.type");
        $reportConfig = D('reportConfig');
        $reportConfig->setOption($name, $value, $type);
        $res = array(
            'Status' => 200,
            'Mes'    => '添加成功！',
        );
        $this->ajaxReturn($res);
    }
    /**
     * 查询报表配置设置
     * @author 风雨雾凇,
     * @version     [version]
     * @anotherdate 2017-01-12
     * @return      [type]     [description]
     */
    public function getOption()
    {
        $type         = I('post.type');
        $reportConfig = D('reportConfig');

        if ($type == '') {
            $res = $reportConfig->getOption();
        } else {
            $res = $reportConfig->getOption_type($type);
        }
        $res = array(
            'Status' => 200,
            'res'    => $res,
            'Mes'    => '查询成功！');
        $this->ajaxReturn($res);
    }
    /**
     * 删除报表配置选项
     * @author 风雨雾凇,
     * @version     [version]
     * @anotherdate 2017-01-12
     * @param       [type]     $id [选项id]
     * @return      [type]         [description]
     */
    public function delOption()
    {
        $id = I('post.id');
        if (!empty($id)) {
            $reportConfig = D('ReportConfig');
            $res          = $reportConfig->delOption($id);
            if ($res == 0) {
                $res = array(
                    'Status' => 1,
                    'Mes'    => '不存在！',
                );
            } else {
                $res = array(
                    'Status' => 200,
                    'Mes'    => '删除成功！',
                );
            }
        } else {
            $res = array(
                'Status' => 0,
                'Mes'    => '未填参数!',
            );
        }
        $this->ajaxReturn($res);
    }

    /**
     * 获取报表类型
     * @author 风雨雾凇,
     * @version     [version]
     * @anotherdate 2017-01-12
     * @return      [type]     [description]
     */
    public function getReportType()
    {
        $type         = I('post.type');
        $reportOption = D('Reportoption');
        if ($type == '') {
            $res = $reportOption->getType();
        } else {
            $res = $reportOption->getType_type($type);
        }
        $res = array(
            'Status' => 200,
            'Mes'    => '成功！',
            'res'    => $res,
        );
        $this->ajaxReturn($res);
    }
    /**
     * 设置报表类型
     * @author 风雨雾凇,
     * @version     [version]
     * @anotherdate 2017-01-12
     */
    public function setReportType()
    {
        $name  = I('post.name');
        $value = I("post.value");
        $type  = I("post.type");
        if (empty($name) || empty($value)) {
            $res = array(
                'Status' => 0,
                'Mes'    => '参数不完整！');
        } else {
            $reportOption = D('reportoption');
            $value        = explode(',', $value);
            $value        = json_encode($value);
            $reportOption->setType($name, $value);
            $res = array(
                'Status' => 200,
                'Mes'    => '添加成功！');
        }
        $this->ajaxReturn($res);
    }
    /**
     * 删除类型
     * @author 风雨雾凇,
     * @version     [version]
     * @anotherdate 2017-01-12
     * @return      [type]     [description]
     */
    public function delReportType(){
        $id=I('post.id');
        if(empty($id)){
            $res=array(
                'Status'=>0,
                'Mes'=>'参数未定义');
        }else{
            $reportOption=D('reportoption');
            $res=$reportOption->delType($id);
            if($res){
                $res=array(
                    'Status'=>200,
                    'Mes'=>'删除成功！');
            }else{
                $res=array(
                    'Status'=>1,
                    'Mes'=>'id不存在！');
            }
        }
        $this->ajaxReturn($res);
    }

    
}
