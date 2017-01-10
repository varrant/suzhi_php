<?php
namespace Home\Controller;
use Think\Controller;
class TaskController extends Controller {
    /*猎头领取任务*/
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
    /*取二维码图片*/
    function code(){
         $db=M('orderinfo');
         $map['ord_poschaid']=I('pos_id');
        /*判断是否已经生成分享图片*/
        $mapord_co['ord_poschaid']=I('pos_id');
        $ord_coedf=$db->where($mapord_co)->field('ord_coedf')->find();
        if($ord_coedf){
            $this->ajaxReturn($ord_coedf['ord_coedf']);
            }else{
            $deerm=$db->where($map)->field('ord_headimg')->find();
            $src_path=$deerm['ord_headimg'];
            /*查出工作类型*/
            $db_pos=M('poscha');
            $map_pos['pos_id']=I('pos_id');
            $type=$db_pos->where($map_pos)->field('pos_task_type,pos_name,pos_salary,pos_welfarebenefits')->find();
            // $type_path=$type['pos_tasl_type'];
            /*工作类型*/
            if ($type['pos_tasl_type']==0) {
                 $type_path='0.png';
            } elseif ($type['pos_tasl_type']==1) {
               $type_path='1.png';
            } else {
               $type_path='2.png';
            }
            $position=$type['pos_name'];
            $salary=$type['pos_salary'];
            $fringe =$type['pos_welfarebenefits'];
            /*封装二维码 
            $src_path 二维码 
            $type_path图片类型
            $position职位
            $salary  薪资待遇
            $fringe  福利待遇 
            */
            /*生成分享的二维码*/
            $data=fcode($src_path, $type_path, $position, $salary, $fringe );
            if($data){
              $data_1['ord_coedf']=$data;
              $do_1=$db->where($map)->save($data_1);
              if($do_1){
                $this->ajaxReturn($data);
              }    
            }
        }
    }
    /*调猎头信息*/
  function userinfor(){
     $db_uer=M('headhunter');
        $map_use['he_phone']=I('phone');
        $data_uer=$db_uer->where($map_use)->find();
        if($data_uer){
            $this->ajaxReturn($data_uer);    
        }
  }

}