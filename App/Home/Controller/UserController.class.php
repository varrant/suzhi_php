<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
   
    function Check(){
     
        $this->display();
    }

    function userCenter2(){
    if(!$_COOKIE['openid_v']){
        $CODE=$_GET['code'];
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".C(APPID)."&secret=".C(SECRET)."&code=".$CODE."&grant_type=authorization_code";
         $oCurl = curl_init();
        if(stripos($url,"https://")!==FALSE){
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);
        curl_close($oCurl);
        $res=json_decode($sContent,true);
        $open=$res['openid'];
         // var_dump( $open);
        // 查检测结果订单
       
        // var_dump($open);
        
        setcookie("openid_v",$open, time()+3600*24*7); 
        // setcookie("openid_v",$open, time()+3600*24*7);

    }
    else{
        $open=$_COOKIE['openid_v'];
    }

    $map['openid']=$open;
    $map['status']=1;
    $map['Table_p']=6;

    $db=M('price');
    $data=$db->alias('a')->join('think_regbuy b ON a.ddbh=b.ddbh_re')->field('WXNickName,cwxp,time ,b.id')->where($map)->select();
    $db->getLastsql();

    // var_dump($db->getLastsql());
    $this->data=$data;
    $this->display();

    }
    function userCenter1(){

      $this->display();
    }

    function heation(){

      $Model=M("price");
      $map['status']=1;
      $map['b.id']=I('id');
      // $map['b.id']=2754;
      $data=$Model->alias('a')->join('think_regbuy b ON a.ddbh=b.ddbh_re')->field('b.WXAName,b.WXNickName,b.cwxp,WXPinzhong,b.WXSex,b.WXBirthday,a.time,a.tox,a.leptospira,a.cper,a.hot,a.ascaris,a.tiny,a.nematode,a.ccoccidiosis,a.trichomonad,a.egg')->where($map)->select();
     
      // var_dump( $Model->getLastsql());
        $this->ajaxReturn($data);
      // $this->ajaxReturn(json_encode($data),'JSON');
        

    }


    function search(){
    	$phone=I('phonexinpian');
      $cwxp=I('phonexinpian');
      if($phone){
      $where['cwxp']=array('like',"%$cwxp%");
      $where['WXAPhone']=array('like',"%$phone%");
      $where['_logic']="or";
      $map['_complex'] = $where;
      $map['status']  = '1';
      $map['sta']  = '1';
      $db=M('regbuy');
      $data=$db->alias('a')->join('think_price b ON a.ddbh_re=b.ddbh')->where($map)->field('a.cwxp,a.id,b.time,a.WXAName,a.WXlb')->select();
     
     
      $this->data=$data;
      }
     
      $this->display();

    }

    function deaidog(){
      $id=I('pid');
      $db=M('price');
      $map['b.id']=$id;
       $data=$db->alias('a')->join('think_regbuy b ON a.ddbh=b.ddbh_re')->field('b.WXAName,b.WXNickName,b.cwxp,WXPinzhong,b.WXSex,b.WXBirthday,a.time,a.tox,a.leptospira,a.cper,b.WXlb,a.hot,a.ascaris,a.tiny,a.nematode,a.ccoccidiosis,a.trichomonad,a.egg')->where($map)->select();
       $this->data=$data;
       $this->display();
       

    }

    function Perscenter(){


      $this->display();  
    }
    //首页
    function homepage(){
      //查出省份的代理
      header("Content-Type: text/html; charset=utf-8");
      $db=M('admin');
      $map['type']=3;
      $map['a.sta']=0;
      $data=$db->alias('a')->join('think_city as b on a.city=b.id')->where($map)->field('a.id,a.username,a.address,a.iPhone,b.name')->select();
      // var_dump($data);
      
       foreach ($data as $k => $v) {
       		$id=$v['id'];
       		$id=passport_encrypt($id,key);
       		$data[$k]['id']=$id;
       }
        
	     $this->data=$data;
	     $this->display();
    } 
    function searchpro(){
      $pro=I('pro');
      $db=M('admin');
      $map['a.sta']=0;
      $map['type']=3;
      $map['b.name']=array('like',"%$pro%");
    	 $data=$db->alias('a')->join('think_city as b on a.city=b.id')->where($map)->field('a.username,a.address,a.iPhone,b.name')->select();
     $this->data=$data;
    	$this->display();
    }
    //首页检测中心
    function jcenter(){
      $db=M('artn');
      $map['sts']=1;
      $map['sta']=0;
      $data=$db->where($map)->select();
     

      $this->data=$data;
      $this->display();
    }
     function searchjianc(){
      $jczx=I('jczx');
      $db=M('artn');
      $map['city']=$jczx;
      $map['sts']=1;
      $map['sta']=0;
      $map['city']=array('like',"%$jczx%");
      $data=$db->where($map)->select();
      $this->data=$data;
      $this->display();
    }
    //首页定点医院
    function rcenter(){
      $db=M('artn');
      $map['sts']=0;
      $map['sta']=0;
      $data=$db->where($map)->select();
      $this->data=$data;
      // var_dump($data);
     $this->display();
    } 

     function searchddyy(){
      $ddyy=I('ddyy');
      $db=M('artn');
      $map['city']=$ddyy;
      $map['sts']=0;
      $map['sta']=0;
      $map['city']=array('like',"%$ddyy%");
      $data=$db->where($map)->select();
      //var_dump($data);
      $this->data=$data;
      $this->display();
    }
    //招募
    function recruit(){

    
     $this->display();
    } 
    // 平安保险
     function Pice(){

     $this->display();
    }
    // 平安保险参保信息提交
    function painfor(){
      $data['cwname']=I('cwname');
      $data['userid']=I('userid');
      $data['iphone']=I('iphone');
      $data['cwxp']=I('cwxp');
      $data['yueduty']=I('yueduty');
      $data['patime']=time();
      $db=M('pabx');
      $do=$db->add($data);
      if($do){
        $this->ajaxReturn('ok');
      }
    }

}