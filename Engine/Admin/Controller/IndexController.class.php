<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    //载入首页左边导航
    public function index(){
        $this->display('Index/index_');
    }
    //载入iform内容
    public function index_v1(){
        $this->display('Index/index_v1_');
    }
    //查看所有通知
    public function AllInform(){
        $this->display('Index/inform_show');
    }
    //管理通知
    public function InformManager(){
        $this->display('Index/inform_manager');
    }
    //展示全部文件
    public function AllFile(){
        $this->display('Index/file_show');
    }
    //文件管理
    public function FileManager(){
        $this->display('Index/file_manager');
    }
    //展示全部报表
    public function  ALLReport(){
        $this->display('Index/report_show');
    }
    //管理报表
    public function ReportManager(){
        $this->display('Index/report_manager');
    }
    //报表的设置
    public function OptionReport(){
        $this->display('Index/option_report');
    }
}