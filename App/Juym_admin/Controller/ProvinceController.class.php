<?php
namespace Juym_admin\Controller;
use Think\Controller;
class ProvinceController extends CommonController {


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
   // 管理员列表
      function Provincelist(){
        header("Content-Type: text/html;charset=utf-8");
      	$db=M('admin');
      	
            $map['type']=2;
            $count = $db->where($map)->count();     
           
            $Page = new \Think\Page($count,10);
            
            
           
           $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
            $show = $Page->show();// 分页显示输出
            
            $row_page=substr($show,-1);
            $show=substr($show,0,strlen($show)-2);

           $data= $db->alias('a')->join('think_province b  ON a.province=b.id')->field('a.id,a.username,a.logintime,a.email,a.zhifubao,a.iPhone,a.name,b.name as pname')-> where($map)->limit($Page->firstRow.','.$Page->listRows)->select(); 

        
           foreach ($data as $key => $va) {
              $map_pid['pid']=$va['id'];
               $username=$db->where($map_pid)->field('username')->select();
               $data[$key]['user']=$username;
              
           }


          //var_dump($data);
            // $data = $db->order('id')-> // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
           
            $this->row_page=$count;
           
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
      $data['email']=I('email');
      $data['type']=I('level');
      $data['zhifubao']=I('zhifubao');
      $data['name']=I('name');
      $data['iPhone']=I('iphone');
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
      
      $count=count(I('img'));
      
      if($count!=2){

            $this->ajaxReturn('img_no');

      }

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
           // var_dump($data);
            //图片处理
           $img=$data[0]['sfzimg'];
          
           if(!$img){
              $data[0]['sfzimg']="";   
              
           }else{

               $data[0]['sfzimg']=explode(",",$img);
           }
      
       	$this->data=$data[0];
       	$this->display();
       
       	
       }

       function doeidadmin(){

            // var_dump($_POST);

            $data['username']=I('username');
            $data['email']=I('email');
            $data['type']=I('level');
            $data['zhifubao']=I('zhifubao');
            $data['name']=I('name');
            $data['iPhone']=I('iphone');
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
            
            $count=count(I('img'));
            
            if($count!=2){

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
       //检查城市
       function chakcs(){
          $id=I('id');
          $db=M('admin');
          // $user=$db->alias('a')->join('think_city b ON a.city=b.id')->field('a.id,a.username,a.name,b.name as name_a ,a.iPhone')->where("a.pid=$id")->select();

          $count = $db->alias('a')->join('think_city b ON a.city=b.id')->field('a.id,a.username,a.name,b.name as name_a ,a.iPhone')->where("a.pid=$id")->count();     

          $Page = new \Think\Page($count,10);

          $Page->setConfig('prev', '上一页');

          $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
          $show = $Page->show();// 分页显示输出

          $row_page=substr($show,-1);
          $show=substr($show,0,strlen($show)-2);
          $data=$db->alias('a')->join('think_city b ON a.city=b.id')->field('a.id,a.pid,a.username,a.name,b.name as name_a ,a.iPhone')->where("a.pid=$id")->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();

          foreach ($data as $key => $va) {
          $data[$key]['zid']=passport_encrypt($va['id'],key);
          }

          // $data = $db->order('id')->where($map)->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
          $this->row_page= $count;
          // var_dump($data);
          $this->assign('data',$data);// 赋值数据集  
          $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板
          // var_dump($data);
          $this->user=$data;
          $this->display();
       }

  
}