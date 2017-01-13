<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends  CommonController {
   /*猎头首页*/
    public function _initialize() {
        //类型必须为猎头



//        parent::_initialize();
//        $type=$_COOKIE['type']?$_COOKIE['type']:$_SESSION['type'];
//        if($type!=1){
//        	$this->redirect("home/Login/index");
//    	}
    }
  	/*猎头页面*/
    public function index(){
    	//获取轮播图
        $db=M('role');
        $data=$db->select();
        $dbs=M('poscha');
        $where['pos_is_delete'] =1;
        $where['pos_isindex']=2;
        $res=$dbs->where($where)->select();
        foreach ($res as $key => $value){
            $res[$key]['total_liulan']=(int)$value['pos_liuan'] + (int)$value['pos_true_liulan'];
            $res[$key]['total_toudi']=(int)$value['pos_toudi'] + (int)$value['pos_true_toudi'];
        }
        $this->assign('data',$data);
        $this->assign('res',$res);
    	$this->display();
    } 
   

}