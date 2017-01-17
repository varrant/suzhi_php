<?php
namespace Home\Controller;
use Think\Controller;

class QindexController extends  CommonController {
   /*求助者首页*/
    public function _initialize() { 
        parent::_initialize();
        $type=$_COOKIE['type']?$_COOKIE['type']:$_SESSION['type'];
        if($type!=0){
        	$this->redirect("home/Login/index");
    	}
    }
  	/*猎头页面*/
    public function index(){
    	echo '求职者页面';
    	$this->display();
    } 
   

}