<?php
namespace Juym_admin\Controller;
use Think\Controller;
class OrderController extends CommonController {

	//状态为 已领取的列表
  function receive_list(){
    $db=M('orderinfo');
    //必须是猎头订单 暂时未做
//    $map['ord_type'] = 0;
    //状态必须为已领取
    $map['ord_status'] = 1;
    if(I('id')){
      $map['ord_headh'] = I('id');
    }
    $count =$db->where($map)->count();
    $Page = new \Think\Page($count,3);
    $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
    $show = $Page->show();// 分页显示输出
    $show=substr($show,0,strlen($show)-1);
    $data = $db->field("sz_orderinfo.ord_id,sz_orderinfo.ord_poschaid,sz_orderinfo.ord_headh,sz_poscha.pos_name,sz_poscha.pos_worktime,sz_poscha.pos_salary,sz_poscha.pos_brokerage,sz_poscha.pos_online,sz_headhunter.he_phone,sz_headhunter.he_nickname,sz_headhunter.he_name" )->join( "sz_poscha on sz_orderinfo.ord_poschaid=sz_poscha.pos_id" )->join( "sz_headhunter on sz_orderinfo.ord_headh=sz_headhunter.he_id" )->where($map)->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    $this->row_page=$count;
    $this->assign('data',$data);// 赋值数据集
    $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板
    $this->display();
  }
  //状态为已领取的详情
  function receive_details(){
    $db=M('orderinfo');
    $map['ord_id']=I('id');
    $data = $db->field("sz_orderinfo.ord_id,sz_orderinfo.ord_poschaid,sz_orderinfo.ord_headh,sz_poscha.*,sz_headhunter.he_phone,sz_headhunter.he_nickname,sz_headhunter.he_name" )->join( "sz_poscha on sz_orderinfo.ord_poschaid=sz_poscha.pos_id" )->join( "sz_headhunter on sz_orderinfo.ord_headh=sz_headhunter.he_id" )->where($map)->select();
    $this->assign('data',$data);// 赋值数据集
    $this->display();
  }
  //状态为 报名工作的列表
  function enlist_list(){

    $db=M('orderinfo');
    $head=M('headhunter');
    //必须是猎头订单 暂时未做
//    $map['ord_type'] = 0;
    //状态必须为已报名
    $map['ord_status'] = 2;
    if(I('id')){
      $map['ord_jobseekerid'] = I('id');
    }
    $count =$db->where($map)->count();
    $Page = new \Think\Page($count,2);
    $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
    $show = $Page->show();// 分页显示输出
    $show=substr($show,0,strlen($show)-1);
    $data = $db->field("sz_orderinfo.ord_id,sz_orderinfo.order_id,sz_orderinfo.ord_jobseekerid,sz_poscha.pos_name,sz_poscha.pos_worktime,sz_poscha.pos_salary,sz_poscha.pos_brokerage,sz_headhunter.he_phone,sz_headhunter.he_nickname,sz_headhunter.he_name" )->join( "sz_poscha on sz_orderinfo.ord_poschaid=sz_poscha.pos_id" )->join( "sz_headhunter on sz_orderinfo.ord_headh=sz_headhunter.he_id" )->where($map)->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
   foreach ($data as $key => $value){
     $where['he_id']=$value['ord_jobseekerid'];
     $res=$head->where($where)->find();
     $data[$key]['q_phone']=$res['he_contact'];
     $data[$key]['q_nick']=$res['he_nickname'];
     $data[$key]['q_name']=$res['he_name'];

   }
    $this->row_page=$count;
    $this->assign('data',$data);// 赋值数据集
    $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板
    $this->display();
  }
  //状态为已报名的详情
  function enlist_details(){
    $db=M('orderinfo');
    $head=M('headhunter');
    $map['ord_id']=I('id');
    $data = $db->field("sz_orderinfo.ord_id,sz_orderinfo.order_id,sz_orderinfo.ord_jobseekerid,sz_poscha.*,sz_headhunter.he_phone,sz_headhunter.he_nickname,sz_headhunter.he_name" )->join( "sz_poscha on sz_orderinfo.ord_poschaid=sz_poscha.pos_id" )->join( "sz_headhunter on sz_orderinfo.ord_headh=sz_headhunter.he_id" )->where($map)->select();
    foreach ($data as $key => $value){
      $where['he_id']=$value['ord_jobseekerid'];
      $res=$head->where($where)->find();
      $data[$key]['q_phone']=$res['he_contact'];
      $data[$key]['q_nick']=$res['he_nickname'];
      $data[$key]['q_name']=$res['he_name'];

    }
    $this->assign('data',$data);// 赋值数据集
    $this->display();
  }
}