<?php
namespace Home\Controller;
use Think\Controller;
class indexController extends  CommonController {
   /*猎头首页*/
    public function _initialize() { 
        parent::_initialize();
        $type=$_COOKIE['type']?$_COOKIE['type']:$_SESSION['type'];
        if($type!=1){
        	$this->redirect("home/Login/index");
    	}
    }
  	/*猎头页面*/
    public function index(){
    	echo '猎头页面';
    	$this->display();
    } 
   

}