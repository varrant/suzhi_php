<?php
namespace Home\Controller;
use Think\Controller;
class ProfitController extends Controller {

    public function Index(){
    	$this->display();
    } 

    //添加提现记录
    public function Tixianadd(){
        $csmoney=int(I('csmoney'));
        $pohone=I('pohone');

        if(empty($pohone)){
            $this->ajaxReturn('weidengluno');
        }else{
            //获取猎头id
            $map['he_phone']=$pohone;
            $db_code=M('headhunter');
            $do_user=$db_code->where($map)->find();
            if($do_user){
                $he_id=$do_user['he_id'];
            }else{
                $this->ajaxReturn('yonghuweizhino');
            }
        }

        if (empty($csmoney)){
            $this->ajaxReturn('jineno');
        }else{
            if($csmoney<50){
                $this->ajaxReturn('xiaoyujineno');
            }
        }

        //判断支付宝账号是否已存在 
        $db_code=M('cost');
        $data['cos_type']='支付宝支付';
        $data['cos_he_id']=$he_id;
        $data['cos_money']=$csmoney;
        $data['cos_date']=time();
        $data['cos_create_time']=time();
        $db_codes=$db_code->add($data);
        if($db_codes){
          $this->ajaxReturn('ok');  
        }
       
    }

}