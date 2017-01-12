<?php
namespace Home\Controller;
use Think\Controller;
class AlipayController extends Controller {

    public function Index(){
    	$this->display();
    } 

    //添加支付宝账号
    public function Zhifubaoadd(){
        $ayname=I('ayname');
        $ayuname=I('ayuname');
        $aypwd1=I('aypwd1');
        $aypwd2=I('aypwd2');
        $phone=I('phone');

        if(empty($phone)){
            $this->ajaxReturn('weidengluno');
        }else{
            //获取猎头id
            $map['he_phone']=$phone;
            $db_code=M('headhunter');
            $do_user=$db_code->where($map)->find();
            if($do_user){
                $he_id=$do_user['he_id'];
            }else{
                $this->ajaxReturn('yonghuweizhino');
            }
        }

        if (empty($ayname)){
            $this->ajaxReturn('zhanghaono');
        }
        if (empty($ayuname)){
            $this->ajaxReturn('zsxingmingno');
        }
        if (empty($aypwd1)){
            $this->ajaxReturn('mimano');
        }
        //判断两次提现密码是否一致
        if ($aypwd1!=$aypwd2){
            $this->ajaxReturn('butongmimano');
        }


        //判断支付宝账号是否已存在 
        $db_code=M('payment_alipay');
        $data['ali_alipay_name']=$ayname;
        $data['Ali_alipay_uname']=$ayuname;
        $data['ali_alipay_password']=$aypwd1;
        $data['ali_he_id']=$he_id;
        $data['ali_create_time']=time();
        $map['ali_alipay_name']=$ayname;
        $do_phone=$db_code->where($map)->find();
        if(!$do_phone){
            $db_codes=$db_code->add($data);
            if($db_codes){
              $this->ajaxReturn('ok');  
            }
        }else{
            $this->ajaxReturn('no');
        }

    }

}