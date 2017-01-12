<?php
namespace Juym_admin\Controller;
use Think\Controller;
class CooperController extends CommonController {

  
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
          //定点医院列表
         public function Fixtal(){
              $db=M("artn");
              $map['sts']=0;
              $data=$db->where($map)->select();
              $this->data=$data;
              $this->display();
         }
         public function addFixtal(){

          $this->display();
         }
         // 增加定点医院
         public function doaddFixtal(){
            $db=M('artn');
            $data['hosme']  =I('yym');
            $data['nperso'] =I('fzrm');
            $data['iphone'] =I('iphone');
            $data['address']=I('dz');
            $data['attend'] =I('zzb');
            $data['city'] =I('city');
            $data['sts']    =0;
            $data['zzbtype']=I('zzbtype');
            $do=$db->add($data);
            if($do){
              $this->ajaxReturn('ok');
            }
         }
        //修改定点医院信息
        public function eidFixtal(){
          $id=I('id');
          $db=M('artn');
          $map['id']=$id;
          $map['sts']=0;
          $data=$db->where($map)->select();
          $this->data=$data;
         
          $this->display();
        }
        function doeidFixtal(){
            $db=M('artn');
            $data['hosme']  =I('yym');
            $data['nperso'] =I('fzrm');
            $data['iphone'] =I('iphone');
            $data['address']=I('dz');
            $data['attend'] =I('zzb');
            $data['city'] =I('city');
            $data['sts']    =0;
            $data['zzbtype']=I('zzbtype');
            $map['id']      =I('id');
            $do=$db->where($map)->save($data);
            if($do){
              $this->ajaxReturn('ok');
            }

        }
        function delFixtal(){
          $db=M('artn');
          $map['id']=I('id');
          $do=$db->where($map)->delete();
          if($do!==false){
            $this->ajaxReturn('del_ok');
          }

        }
        //显示定点医院
       function  showtatu(){
         $id=I('id');
         $map['id']=$id;
         //取出状态
         $db=M('artn');
         $sta=$db->where($map)->field('sta')->select();
         if($sta[0]['sta']=="0"){
         $status=1;
         }else{
          $status=0;
         }
         //插入数据库
         $data['sta']= $status;
         $do=$db->where($map)->save($data);
         
         if ($do) {
            $this->ajaxReturn($status);
         }
       }
}