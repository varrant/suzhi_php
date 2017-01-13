<?php
namespace User\Controller;
use Think\Controller;
class TaskController extends Controller {
    //求职者的任务列表
    function lists(){
        $db=M('poscha');
        //获取页数
        $page = isset($_POST['page']) ? $_POST['page'] : '1';
        //获取每页的个数
        $limit = 2;
        //获取偏移量
        $offset = ($page-1)*$limit;
        if($_REQUEST['pos_task_type']){
            $where['pos_task_type']=$_REQUEST['pos_task_type'];
            $res=$db->where($where)->limit($offset,$limit)->select();
        }else{
            $res=$db->limit($offset,$limit)->select();
        }
//        $isNextPage='0';
//        //判断是否有下一页
//        if(count($res) == $limit+1){
//            $isNextPage='1';
//        }
//        unset($res[$limit]);
        foreach ($res as $key => $value){
            $res[$key]['total_liulan']=(int)$value['pos_liuan'] + (int)$value['pos_true_liulan'];
            $res[$key]['total_toudi']=(int)$value['pos_toudi'] + (int)$value['pos_true_toudi'];
        }
        if(isset($_REQUEST['fhtype']) && ($_REQUEST['fhtype'] == 'json')){
            $this->ajaxReturn(array('data'=>$res,'page'=>$page));
        }
        $this->assign("res", $res);
        $this->display('/task/task_list');

    }
    //求职者的任务详情
    function details(){
        $where['pos_id']=$_REQUEST['pos_id'];
        //查看订单中该人是否已经报过名
        $dbs=M('orderinfo');
        $arr['ord_poschaid']=$where['pos_id'];
        //求职者的ID不能写死 暂时测试用
        $arr['ord_jobseekerid']=120;
        $arr['ord_status']=2;
//        $arr['ord_headh']=$_SESSION['he_id'];
        $res=$dbs->where($arr)->find();
        $db=M('poscha');
        $data=$db->where($where)->find();
        $data['total_liulan']=(int)$data['pos_liuan']+(int)$data['pos_true_liulan'];
        $data['total_toudi']=(int)$data['pos_toudi']+(int)$data['pos_true_toudi'];
        if($res){
            $data['ord_id']=$res['ord_id'];
            $this->assign('data',$data);
            $this->display('/task/tast_detail_receive');
        }else{
            $this->assign('data',$data);
            $this->display('/task/tast_detail');
        }



    }
    //求职者的任务报名接口
    function head_ling(){
        $data['order_id']=createOrderId();
        $data['ord_poschaid']=$_POST['ord_poschaid'];
        $data['ord_jobseekerid']=$_POST['ord_jobseekerid'];
        $data['ord_status']=2;
        $data['ord_type']=1;
        $data['ord_create_time']=date('Y-m-d h:i:s',time());
        $db=M('orderinfo');
        $do_add=$db->add($data);
        if ($do_add) {
            $this->success('报名成功', U('task/head_hasling',array('ord_id'=>$do_add)));
        } else {
            $this->error("报名失败");
        }
    }
    //求职者的已报名页面
    function head_hasling(){
        //查询订单获取任务ID
        $where['ord_id']=$_REQUEST['ord_id'];
        $db=M('orderinfo');
        $res=$db->where($where)->find();
        //获取任务信息
        $dbs=M('poscha');
        $arr['pos_id']=$res['ord_poschaid'];
        $data=$dbs->where($arr)->find();
        $data['total_liulan']=(int)$data['pos_liuan']+(int)$data['pos_true_liulan'];
        $data['total_toudi']=(int)$data['pos_toudi']+(int)$data['pos_true_toudi'];
        $data['ord_id']=$res['ord_id'];
        $this->assign('data',$data);
        $this->display('/task/tast_detail_receive');

    }





























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
        // var_dump($deerm);
        // var_dump($db->getLastSql());
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