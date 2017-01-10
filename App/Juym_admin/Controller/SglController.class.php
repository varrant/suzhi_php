<?php
namespace Juym_admin\Controller;
use Think\Controller;
class SglController extends CommonController {
    //省自己管理员列表
    
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
          if($type[0]['type']!=2){
            // var_dump(1111);die;
            $this->redirect("Juym_admin/index/index");
              
          }
       
      }
      function SglList(){


        if(!$_COOKIE['id']){

            $_COOKIE['id'];
        }

        $id=$_COOKIE['id'];
        $db=M('admin');
        $map['id']=$id;
        $data=$db->where($map)->select();
        // var_dump($data);
        $this->data=$data;
         $this->display();
       }
      //修改城市管理
      public function eidSgl(){


        $db=M('admin');
         if(!$_COOKIE['id']){

            $_COOKIE['id'];
        }

        $id=$_COOKIE['id'];
        // $map['think.id']=$id;
        $data=$db->alias('a')->join('think_province b ON b.id=a.province')->field('b.name as name_a,a.id,a.username ,a.email,a.type,a.zhifubao,a.sfzimg,a.sfzid,a.iPhone,a.name,a.province as pname')->where("a.id=$id")->select();
           
            //图片处理
           $img=$data[0]['sfzimg'];
          
           if(!$img){
              $data[0]['sfzimg']="";   
              
           }else{

               $data[0]['sfzimg']=explode(",",$img);
           }
        $this->type=$data[0]['type'];
        $this->data=$data[0];
       // var_dump($data);
        $this->display();
      }
      //修改省
      public function doeidSgl(){

            $data['username']=I('username');
            $data['email']=I('email');
            $data['type']=I('level');
            $data['zhifubao']=I('zhifubao');
            $data['name']=I('name');
            $data['iPhone']=I('iphone');
            $data['type']=2;
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
            // var_dump(I('img'));
            $count=count(I('img'));
            // var_dump($count);
            // if($count!=2){

            //       $this->ajaxReturn('img_no');

            // }

             $db=M('admin');

             if(!$_COOKIE['id']){

              $_COOKIE['id'];
               }

            $id=$_COOKIE['id'];
    
             $map['id']=$id;
            $do_1=$db->where($map)->save($data);
             //var_dump($do_1);
            if($do_1){

                  $this->ajaxReturn('up_ok');

            }else{

                  $this->ajaxReturn('up_no');
            }



      }

      public function Scitylist(){
            // 查出省的id
           if(!$_COOKIE['id']){

                $_COOKIE['id'];
            }
            $id=$_COOKIE['id'];

             $db=M('admin');

             // $user=$db->alias('a')->join('think_city b ON a.city=b.id')->field('a.id,a.username,a.name,b.name as name_a ,a.iPhone')->where("a.pid=$id")->select();

             $count = $db->alias('a')->join('think_city b ON a.city=b.id')->field('a.id,a.username,a.name,b.name as name_a ,a.iPhone')->where("a.pid=$id")->count();     
           
            $Page = new \Think\Page($count,10);
            
            $Page->setConfig('prev', '上一页');
           
           $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
            $show = $Page->show();// 分页显示输出
            
            $row_page=substr($show,-1);
            $show=substr($show,0,strlen($show)-1);
            $data=$db->alias('a')->join('think_city b ON a.city=b.id')->field('a.id,a.username,a.name,b.name as name_a ,a.iPhone')->where("a.pid=$id")->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();

            foreach ($data as $key => $va) {
                $data[$key]['zid']=passport_encrypt($va['id'],key);
            }


            // $data = $db->order('id')->where($map)->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
           
            $this->row_page=$row_page;
           
            $this->assign('data',$data);// 赋值数据集  

            // var_dump($data);

             // var_dump($show);
            $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板


         
              // var_dump($data);

            $this->user=$data;
            $this->display();
      }


      public function addScity(){

      // 查出省的id
       if(!$_COOKIE['id']){

            $_COOKIE['id'];
        }

        $id=$_COOKIE['id'];

        $db=M('city');
        $map['id']=$id;
       
        // $user=$db->where($map)->select();

        $city=$db->alias('a')->join('think_admin b ON a.think_province_id=b.province')->field('a.name as name_a, a.id,b.province,b.id as aid')->where("b.id=$id")->select();
          //var_dump($city);
          //
        //   var_dump($db->getLastSql());
        // var_dump($city);
        $this->city=$city;
        $this->display();
      }

      public function doaddScity(){

            // var_dump($_POST);
             $data['username']=I('username');
              $data['email']=I('email');
              $data['type']=I('level');
              $data['zhifubao']=I('zhifubao');
              $data['name']=I('name');
              $data['iPhone']=I('iphone');
              $data['city']=I('city');
              $data['address']=I('address');
              $data['province']=I('province');
              $data['type']=3;
              // $data['province']=I('province');
              $data['sfzid']=I('sfzid');
              $data['pid']=I('id');
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


      public function eidScity(){

          //var_dump(I('id'))
        $db=M('admin');
        $map['id']=I('id');
        $user=$db->where($map)->select();

        //图片处理
         $img=$user[0]['sfzimg'];
        
         if(!$img){
            $user[0]['sfzimg']="";   
            
         }else{

             $user[0]['sfzimg']=explode(",",$img);
         }

        $this->data=$user[0];
        //取城市
        $db_a=M('city');
        $map_city['think_province_id']=$user[0]['province'];
        $city=  $db_a->where($map_city)->select();
        // var_dump($city);
        //var_dump($city);
        $this->city=$city;
      // var_dump($user);

          $this->display();
      }


    public function doeidScity(){

            $data['username']=I('username');
            $data['email']=I('email');
            $data['type']=I('level');
            $data['zhifubao']=I('zhifubao');
            $data['name']=I('name');
            $data['iPhone']=I('iphone');
            $data['type']=3;
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
            // var_dump(I('img'));
            $count=count(I('img'));
            // var_dump($count);
            if($count!=2){

                  $this->ajaxReturn('img_no');

            }

             $db=M('admin');

            // var_dump($data);
    
            $map['id']=I('id');
            $do_1=$db->where($map)->save($data);
             //var_dump($do_1);
            if($do_1){

                  $this->ajaxReturn('up_ok');

            }else{

                  $this->ajaxReturn('up_no');
            }




    }

    //订单管理
    public function Sorderlist(){
        //取出省id
        header("Content-Type: text/html;charset=utf-8");
        if(!$_COOKIE['id']){

            $_COOKIE['id'];
        }

        $id=$_COOKIE['id'];
        //取出查出 该省下城市 id
        $db=M('admin');
        $map['pid']=$id;

        $map['pid']=$id;
        $order=$db->alias('a')->join('think_city  b ON a.city=b.id')->field('a.id,a.username,b.name as city')->where($map)->select();
        //var_dump($order);
         $db_p=M('price');
        foreach ($order as $v) {
           $map_1['c.adminid'] =  $v['id'];    
           $map_1['status']=1;                                                   
          $data=$db_p->alias('c')->join('think_admin d ON c.adminid=d.id')->join('think_city e ON d.city=e.id')->join('think_regbuy f ON c.ddbh=f.ddbh_re')->field('f.WXAName,c.Table_p,f.WXAPhone,f.WXNum,c.price,c.id,c.time,e.name as cname')->where($map_1)->order('e.id')->select();
                  if($data){
                       $user[]=$data;
                   }
        }

        //处理数组 
        $arr=array();
        
        foreach ($user as $va){ 

            foreach ($va as $val) {
              $arr[]=$val;
     
            }
        }
      
        //var_dump($arr);

      //数组做分页
      $count = count($arr) ;// 查询满足要求的总记录数
      
      $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
      $show       = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
      // 分页数据
      $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
      $row_page=substr($show,-1);
       $show=substr($show,0,strlen($show)-1);
      $arr1 = array_slice($arr,$Page->firstRow,$Page->listRows);
      $this->row_page=$count;
      $this->assign('page',$show);// 赋值分页输出
     //var_dump($arr1);
      $this->user=$arr1;
    

        $this->display();

    }


  
}