<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
   /* 登入页面*/
    public function index(){

        $this->display();
    } 

    public function dologin(){
        /*判别用户是否已经注册*/
        $phone=I('phone');
        $db_he=M('headhunter');
        $map_he['he_phone']=$phone;
        $type=$db_he->where($map_he)->field('he_type,he_phone')->select();
        if(!$type){
           $this->ajaxReturn('nophone');
        }
        $db_co=M('code');
        $map_co['code_phone']=I('phone');
        $map_co['cod_code']=I('code');
        $code=$db_co->where( $map_co)->find();
        // var_dump($code);
        if($type&&$code){
            setcookie("type", $type[0]['he_type'], time()+315360000,'/');
            setcookie("pohone", $type[0]['he_phone'], time()+315360000,'/');
            $_SESSION['type']=$type[0]['he_type'];
            $_SESSION['pohone']=$type[0]['he_phone'];
            if($type[0]['he_type']==0){
                $this->ajaxReturn('qzok');
            }
            $this->ajaxReturn('ok');
        }else{
            $this->ajaxReturn('no'); 
        }  
    }
    

}