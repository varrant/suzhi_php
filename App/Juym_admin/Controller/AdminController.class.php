<?php
namespace Juym_admin\Controller;
use Think\Controller;
class AdminController extends CommonController {

    // // 权限判断
     
   
    public function _initialize() { 

        parent::_initialize ();
        
        if(!$_COOKIE['id']){

            $_COOKIE['id'];
        }
        
        $id=$_COOKIE['id'];
       
        $map['id']=$id;
        //判断是否一级管理员
        $db=M('admin');

       $type=$db->where($map)->field('type')->select();

          if($type[0]['type']!=1){

            $this->redirect("Juym_admin/index/index");
              
          }
       
      }

   // 管理员列表
      function Adminlist(){
        // var_dump(2222222);

      	$db=M('admin');
      	
            $map['type']=1;
            $count = $db->where($map)->count();     
           
            $Page = new \Think\Page($count,2);
            
            // $Page->setConfig('prev', '上一页');
           
           $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
            $show = $Page->show();// 分页显示输出
            
            $row_page=substr($show,-1);
            $show=substr($show,0,strlen($show)-1);
            $data = $db->order('id')->where($map)->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
           
            $this->row_page=$row_page;
           
            $this->assign('data',$data);// 赋值数据集  
             // var_dump($show);
            $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板
            $this->display();

       }
       // 显示添加管理员界面
       function addadmin(){
            $this->display();
       }
       // 处理添加管理员
       function doadmin(){

            $data['username']=I('username');
            // $data['email']=I('email');
            $data['address']=I('address');
            $data['type']=I('level');
            
            $data['zhifubao']=I('zhifubao');
            $data['name']=I('name');
            $data['iPhone']=I('iphone');
            $data['wxNum']=I('wxNum');
           // $data['province']=I('province');
            $data['sfzid']=I('sfzid');
           // $data['city']=I('city');
            //判断级别
            if($data['type']==2){
               $data['province']=I('province');   

            }

            if($data['type']==3){
               $data['province']=I('province');   
               $data['city']=I('city');
            }

            //数组转字符串
            $img=I('img');
            $img=implode(",", $img);
            $data['sfzimg']=$img; 
            $data['logintime']=time();
            
            //判断两次密码提价是否一致
            $password=I('password');
            $repassword=I('repassword');
            if($password!=$repassword){
                  $this->ajaxReturn('password_no');
            }else{

                 $data['password']=md5($password);
            }

            //判断是否两张照片
            
            // $count=count(I('img'));
            
            // if($count!=2){

            //       $this->ajaxReturn('img_no');

            // }

             $db=M('admin');


            //判断用户注册表已经已经存在
            
            $map['username']=I('username');
       		
            $do=$db->field("username")->where($map)->select();
       	    //var_dump($do);
            if($do){

                $this->ajaxReturn('username_no') ;
            }

            //管理员信心插入表中 		
            
            $do_1=$db->add($data);
             //var_dump($do_1);
            if($do_1){

                  $this->ajaxReturn('add_ok');

            }else{

                  $this->ajaxReturn('add_no');
            }
       	
       }
       //显示修改管理员信息
       function eidadmin(){

       	$db=M('admin');

       	$map['id']=I('id');
       	$data=$db->where($map)->select();
           //var_dump($data);
            //图片处理
           $img=$data[0]['sfzimg'];
          
           if(!$img){
              $data[0]['sfzimg']="";   
              
           }else{

               $data[0]['sfzimg']=explode(",",$img);
           }
        $this->type=$data[0]['type'];
       	$this->data=$data[0];

       	$this->display();
       
       	
       }

       function doeidadmin(){

            // var_dump($_POST);

            $data['username']=I('username');
            // $data['email']=I('email');
            $data['address']=I('address');
            $data['type']=I('level');
            $data['zhifubao']=I('zhifubao');
            $data['name']=I('name');
            $data['iPhone']=I('iphone');
            $data['wxNum']=I('wxNum');
            
           // $data['province']=I('province');
            $data['sfzid']=I('sfzid');
           // $data['city']=I('city');
            //判断级别
            if($data['type']==1){
              $data['province']='';
              $data['city']='';

            }
            if($data['type']==2){
               $data['province']=I('province');   
                $data['city']='';
            }

             if($data['type']==3){
               $data['province']=I('province');   
               $data['city']=I('city');
            }

            //数组转字符串
            $img=I('img');
            $img=implode(",", $img);
            $data['sfzimg']=$img; 
            $data['logintime']=time();
            
            //判断两次密码提价是否一致
            $password=I('password');
            $repassword=I('repassword');
            if($password!=$repassword){
                  $this->ajaxReturn('password_no');
            }else{

                 $data['password']=md5($password);
            }

            //判断是否两张照片
            
            $count=count(I('img'));
           
            if($count!=1){

                  $this->ajaxReturn('img_no');

            }

             $db=M('admin');


            //判断用户注册表已经已经存在
            
            // $map['username']=I('username');
                  
            // $do=$db->field("username")->where($map)->select();
            // //var_dump($do);
            // if($do){

            //     $this->ajaxReturn('username_no') ;
            // }

            //管理员信息更新表中             
             $map['id']=I('id');
            $do_1=$db->where($map)->save($data);
             //var_dump($do_1);
            if($do_1){

                  $this->ajaxReturn('up_ok');

            }else{

                  $this->ajaxReturn('up_no');
            }

       		

       	
       }

       function deladmin(){

            
            $id=I('id');
            $map['id']=$id;
            $db=M('admin');
            $do=$db->where($map)->delete();

            if(!$do==false){

                  $this->ajaxReturn("del_ok");

            }else{

                  $this->ajaxReturn("del_no") ;  
            }

       }
       function eidmima(){

        $this->id=I('id');  
        $this->display();
        
       }
       function doeidmima(){
  
        $db=M('admin');
        $password=I('password');
        $repassword=I('repassword');
        if($password!=$repassword){
          $this->ajaxReturn('password_no');
        }
        $data['password']=md5(I('password'));
        $map['id']=I('id');
        $do=$db->where($map)->save($data);
        if ($do) {
          $this->ajaxReturn('ok');
        }else{
          $this->ajaxReturn('no');
        }
       
       }

}