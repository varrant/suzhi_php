<?php
namespace Home\Controller;
use Think\Controller;
class TaskController extends Controller {
    function Relation(){
    	$data['ord_poschaid']=I('pos_id');
	    $data['ord_headh']=100;
    	$db=M('orderinfo');
    	$do=$db->where($data)->find();
    	if($do){
	    	$this->ajaxReturn('no');
    	}else{
    		$data['ord_poschaid']=I('pos_id');
	    	$data['ord_headh']=100;
	    	$data['ord_status']=1;
            /*生成二维码*/
            $save_path = isset($_GET['save_path'])?$_GET['save_path']:'Public/qrcode/';
            $web_path = isset($_GET['save_path'])?$_GET['web_path']:'/Public/qrcode/';
            $qr_data = isset($_GET['qr_data'])?$_GET['qr_data']:'http://suzhi.hzjuym.com/index.php/Home/Poscha/view/heid/'.$data['ord_headh'].'/pos_id/'.I('pos_id');
            $qr_level = isset($_GET['qr_level'])?$_GET['qr_level']:'H';
            $qr_size = isset($_GET['qr_size'])?$_GET['qr_size']:'8';
            $save_prefix = isset($_GET['save_prefix'])?$_GET['save_prefix']:'ZETA';
            if($filename = createQRcode($save_path,$qr_data,$qr_level,$qr_size,$save_prefix)){
               $pic = $web_path.$filename;
            }
            $data['ord_headimg']=$pic;
            $do_add=$db->add($data);
            if($do_add){
                $this->ajaxReturn('ok');
            }
	    	
    	}
    }
    
    /*返回二维码分享链接*/
    function code(){

        /*取二维码图片*/
        $map['ord_poschaid']=I('pos_id');
        $db=M('orderinfo');
        $deerm=$db->where($map)->field('ord_headimg')->find();
        var_dump($deerm);
        var_dump($db->getLastSql());
        fcode($src_path, $type_path, $position, $salary, $fringe );


    }
   
}