<?php
namespace Juym_admin\Controller;
use Think\Controller;
class OrderController extends CommonController {

	 public function _initialize() { 
        parent::_initialize();
        if(!$_COOKIE['id']){

            $_COOKIE['id'];
        }
        
        $id=$_COOKIE['id'];
        $map['id']=$id;
        //判断是否一级管理员
        $db=M('admin');
        
       $type=$db->where($map)->field('type')->select();
       	 //var_dump($type);die;
          if($type[0]['type']!=1){
          	// var_dump(1111);die;
            $this->redirect("Juym_admin/index/index");
              
          }
       
      }
     
   // 订单列表
      function Orderlist(){
        header("Content-Type: text/html;charset=utf-8");
        $Model=M("price");
        $map['status']=1;
      	$mo=M();
      	 // $data=  $Model->alias('a')->join('think_regbuy b ON a.openid=b.WXOpenid')->where($map)->field('b.WXAName,a.price ,b.WXAPhone,b.WX_CityInfo,a.price,time,a.status')->select();
      	 // var_dump($data);
		$count = $Model->alias('a')->join('think_regbuy b ON a.ddbh=b.ddbh_re')->where($map)->field('b.WXAName,a.price ,b.WXAPhone,b.WX_CityInfo,a.price,time,a.status')->count();     
		$Page = new \Think\Page($count,10);
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
		$show = $Page->show();// 分页显示输出
		$row_page=substr($show,-1);
		$show=substr($show,0,strlen($show)-2);
		$data=$Model->alias('a')->join('think_regbuy b ON a.ddbh=b.ddbh_re')->join('think_city c ON c.id=b.WX_CityInfo')->where($map)->field('b.WXAName,a.price ,b.WXAPhone,b.WX_CityInfo,b.WX_promaryInfo,a.price,b.id,time,a.status,a.id as aid,b.WXNum,a.Table_p,a.sta,c.name')->limit($Page->firstRow.','.$Page->listRows)->order('a.id desc')->select();
    // var_dump($data);
		$this->row_page=$count;
   
		$this->assign('data',$data);// 赋值数据集  
		// var_dump($show);
		$this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板

      

        $this->display();
       }
    //搜索订单
    function searchOrder(){
      header("Content-Type: text/html;charset=utf-8");
      $Model=M("price");
      $map['status']=1;
      $time=I('date');
      $name=I('name');
      $phone_xinp=I('phone_xinp');
      // var_dump($_POST);
      $time_s="$time 00:00:00";
      $time_s=strtotime($time_s);
      $time_d="$time 23:59:59";
      $time_d=strtotime($time_d);
      $where="";
       if ($time) {
        if($phone_xinp or $name){

          $where.='  time between '.$time_s.' and '.$time_d; 
        }else{
          $where='time between '.$time_s.' and '.$time_d;
         }
    }
      if($name){
      if ($time) {
            $where.=" and b.WXAName like '%".$name."%'";
      }else{
         $where.=" b.WXAName like '%".$name."%'";

      }
    }
      if($phone_xinp){
      if ($time or $name) {
          $where.=" and b.WXAPhone like '%".$phone_xinp."%' or b.cwxp like '%".$phone_xinp."%'"; 
      }else{
         $where.="  b.WXAPhone like '%".$phone_xinp."%' or b.cwxp like '%".$phone_xinp."%'";

      }
    }
     
    $count =  $Model->alias('a')->join('think_regbuy b ON a.ddbh=b.ddbh_re')->where($map)->field('b.WXAName,a.price ,b.WXAPhone,b.WX_CityInfo,a.price,a.status,a.time,a.id,b.WXNum,a.Table_p, a.id as aid')->where($where)->count(); 
    $Page = new \Think\Page($count,10);

    $Page->setConfig('prev', '上一页');

    $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
    $show = $Page->show();// 分页显示输出

    $row_page=substr($show,-1);
    $show=substr($show,0,strlen($show)-1);

    $data=  $Model->alias('a')->join('think_regbuy b ON a.ddbh=b.ddbh_re')->where($map)->field('b.WXAName,a.price ,b.WXAPhone,b.WX_CityInfo, b.id as bid, a.price,a.status,a.time,a.id,b.WXNum,a.Table_p,a.sta,a.id as aid')->order("id desc")->limit($Page->firstRow.','.$Page->listRows)->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();

    //注意limit方法的参数要使用Page类的属性

    $this->row_page=$row_page;

    $this->assign('data',$data);// 赋值数据集  
    // var_dump($show);
    $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板
     $this->display();

  }

    //订单审核
    function examine(){
      $id=I('id');
      $Model=M("price");
      $map['status']=1;
      $map['a.id']=$id;
    $data=$Model->alias('a')->join('think_regbuy b ON a.ddbh=b.ddbh_re')->where($map)->field('b.WXAName,b.WXAPhone,b.WXNickName,b.WXSex,b.WXPinzhong,a.time,a.id,a.time,b.WXage,b.WXNum,a.tox,a.leptospira,a.cper,a.hot,a.ascaris,a.tiny,a.nematode,a.ccoccidiosis,a.trichomonad,a.egg,b.WXlb,b.WXBirthday ,b.id as bid, b.cwxp')->select();
    $this->data=$data;
    $this->display();
    }


    //审核
    function eidexamine(){
      $id=I('id');
      $data['WXBirthday']=I('WXBirthday');
      $data['WXAName'] =I("WXAName");
      $data['cwxp']=I('cwxp');
      $data['WXNickName']=I('WXNickName');
      $data['WXlb']=I('WXlb');
      $data['WXPinzhong']=I('WXPinzhong');
      $data['WXSex']  =I('WXSex');
      $db=M('regbuy');
      $map['id']=$id;
      $do=$db->where($map)->save($data);
      $map_a['id']=I('price_id');
      $db_a=M('price');
      $data_a['sta']=$data_1['sta']=I('sta'); 
      $da_1=$db_a->where($map_a)->save($data_a);
      if($da_1){
        $this->ajaxReturn('ok');
      }

   	  //查出
      if($do){
        $this->ajaxReturn('ok');
      }

    }
    //取消审核
    function cancelexamine(){
      $id=I('id');
      $data['sta']=0;
      $db=M('price');
      $map['id']=$id;
      $do=$db->where($map)->save($data); 
      if($do){
        $this->ajaxReturn('ok');
      }
    }

    function ybeidsta(){

      $id=I('id');
      $tox=I('tox');
      $db=M('price');
    
        if($tox==0){
           $tox=1;
        }else{
            $tox=0;
        } 
      $map['id']=$id;
      if($tox==0 or $tox==1){//弓形虫进入
        $data['tox']=$tox;
        //弓形虫吗模块
        $do=$db->where($map)->save($data);
        if($do){

          $tox1=$db->where($map)->field('tox')->select();
          $tox=$tox1[0]['tox'];
          // var_dump($tox);
          $this->ajaxReturn($tox);
        }
      }//弓形虫进入end
    }
    // 钩端螺旋体
    function leptospira(){

      $id=I('id');
      $leptospira=I('leptospira');
      $db=M('price');
    
        if($leptospira==0){
           $leptospira=1;
        }else{
            $leptospira=0;
        } 

      $map['id']=$id;
      
        $data['leptospira']=$leptospira;
        // var_dump($data);
        $do=$db->where($map)->save($data);

        if($do){

          $leptospira=$db->where($map)->field('leptospira')->select();
          $leptospira=$leptospira[0]['leptospira'];
          // var_dump($tox);
          $this->ajaxReturn($leptospira);
        }
     
    }

      // 犬瘟
    function cper(){

      $id=I('id');
      $cper=I('cper');
      $db=M('price');
     
        if($cper==0){
           $cper=1;
        }else{
            $cper=0;
        } 
      
      $map['id']=$id;
       
        $data['cper']=$cper;

          // var_dump($data);
        $do=$db->where($map)->save($data);

        if($do){

          $cper1=$db->where($map)->field('cper')->select();
          $cper=$cper1[0]['cper'];
          // var_dump($tox);
          $this->ajaxReturn($cper);
        }
     
    }
       // 犬瘟
    function hot(){

      $id=I('id');
      $hot=I('hot');
      $db=M('price');
     
        if($hot==0){
           $hot=1;
        }else{
            $hot=0;
        } 
      
      $map['id']=$id;
       
        $data['hot']=$hot;

          // var_dump($data);
        $do=$db->where($map)->save($data);

        if($do){

          $hot1=$db->where($map)->field('hot')->select();
          $hot=$hot1[0]['hot'];
          // var_dump($tox);
          $this->ajaxReturn($hot);
        }
     
    }

        // 细小
    function tiny(){

      $id=I('id');
      $tiny=I('tiny');
      $db=M('price');
     
        if($tiny==0){
           $tiny=1;
        }else{
            $tiny=0;
        } 
      
      $map['id']=$id;
       
        $data['tiny']=$tiny;

          // var_dump($data);
        $do=$db->where($map)->save($data);

        if($do){

          $tiny1=$db->where($map)->field('tiny')->select();
          $tiny=$tiny1[0]['tiny'];
          // var_dump($tox);
          $this->ajaxReturn($tiny);
        }
     
    }
  // 蛔虫
    function ascaris(){

      $id=I('id');
      $ascaris=I('ascaris');
      $db=M('price');
     
        if($ascaris==0){
           $ascaris=1;
        }else{
            $ascaris=0;
        } 
      
      $map['id']=$id;
       
        $data['ascaris']=$ascaris;

          // var_dump($data);
        $do=$db->where($map)->save($data);

        if($do){

          $ascaris1=$db->where($map)->field('ascaris')->select();
          $ascaris=$ascaris1[0]['ascaris'];
          // var_dump($tox);
          $this->ajaxReturn($ascaris);
        }
     
    } 
    //线虫
    function nematode(){

      $id=I('id');
      $nematode=I('nematode');
      $db=M('price');
     
        if($nematode==0){
           $nematode=1;
        }else{
            $nematode=0;
        } 
      
      $map['id']=$id;
       
        $data['nematode']=$nematode;

           // var_dump($data);
        $do=$db->where($map)->save($data);

        if($do){

          $nematode1=$db->where($map)->field('nematode')->select();
          $nematode=$nematode1[0]['nematode'];
          // var_dump($tox);
          $this->ajaxReturn($nematode);
        }
     
    } 

     //球虫
    function ccoccidiosis(){

      $id=I('id');

      $ccoccidiosis=I('ccoccidiosis');
      $db=M('price');
       // var_dump($ccoccidiosis);
        if($ccoccidiosis==0){
           $ccoccidiosis=1;
        }else{
            $ccoccidiosis=0;
        } 
      // var_dump( $ccoccidiosis);
      $map['id']=$id;
       
        $data['ccoccidiosis']=$ccoccidiosis;

        // var_dump($data);
        $do=$db->where($map)->save($data);
        // var_dump( $do);
        if($do){

          $ccoccidiosis1=$db->where($map)->field('ccoccidiosis')->select();
          $ccoccidiosis=$ccoccidiosis1[0]['ccoccidiosis'];
          
          $this->ajaxReturn($ccoccidiosis);
        }
     
    } 
     //滴虫
    function trichomonad(){

      $id=I('id');

      $trichomonad=I('trichomonad');
      $db=M('price');
       // var_dump($ccoccidiosis);
        if($trichomonad==0){
           $trichomonad=1;
        }else{
            $trichomonad=0;
        } 
      // var_dump( $ccoccidiosis);
      $map['id']=$id;
       
        $data['trichomonad']=$trichomonad;

        // var_dump($data);
        $do=$db->where($map)->save($data);
        // var_dump( $do);
        if($do){

          $trichomonad1=$db->where($map)->field('trichomonad')->select();
          $trichomonad=$trichomonad1[0]['trichomonad'];
          
          $this->ajaxReturn($trichomonad);
        }
     
    } 

     //滴虫
    function egg(){

      $id=I('id');

      $egg=I('egg');
      $db=M('price');
       // var_dump($ccoccidiosis);
        if($egg==0){
           $egg=1;
        }else{
            $egg=0;
        } 
        // var_dump($egg);
      // var_dump( $ccoccidiosis);
      $map['id']=$id;
       
        $data['egg']=$egg;

        // var_dump($data);
        $do=$db->where($map)->save($data);
        // var_dump( $do);
        
        if($do){

          $egg1=$db->where($map)->field('egg')->select();
          $egg=$egg1[0]['egg'];
          
          $this->ajaxReturn($egg);
        }
     
    } 


}