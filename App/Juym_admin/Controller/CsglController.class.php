<?php
namespace Juym_admin\Controller;
use Think\Controller;
class CsglController extends CommonController {
  
      public function eidCsgl(){
      	
         $db=M('admin');
         if(!$_COOKIE['id']){

            $_COOKIE['id'];
        }
        $id=$_COOKIE['id'];
        //出省的id
      
       	// var_dump( $id);
        $map_p['id']=$id;
        // var_dump($map_p['id']);
      	$city=$db->where($map_p)->field('city')->select();
      	// var_dump($city[0]['city']);
      	if(!$city[0]['city']){
      		
      		// $this->csxz="do";
      	}

      	
        $map['a.id']=$id;
        $user=$db->alias('a')->join('think_city b ON a.city =b.id')->where($map)->field('a.id,a.username,a.email,a.zhifubao,a.sfzimg,a.sfzid,a.iPhone,a.address,a.name as nama_a , b.name')->select();  

                $img=$user[0]['sfzimg'];
          
           if(!$img){
              $data[0]['sfzimg']="";   
              
           }else{

               $user[0]['sfzimg']=explode(",",$img);
           }
         
        $this->data=$user[0];
        $this->display();
      }
      //修改省
      public function doeidCgl(){

            $data['username']=I('username');
            $data['email']=I('email');
            $data['type']=I('level');
            $data['zhifubao']=I('zhifubao');
            $data['name']=I('name');
            $data['address']=I('address');
            $data['type']=3;
            $data['iPhone']=I('iphone');
            $data['sfzid']=I('sfzid');
           
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
            if($count!=1){

                  $this->ajaxReturn('img_no');

            }

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


    //订单管理
    public function Csgorderlist(){
        //城市id
        header("Content-Type: text/html;charset=utf-8");
        if(!$_COOKIE['id']){

            $_COOKIE['id'];
        }

        $id=$_COOKIE['id'];
        $db=M('price');
        $map['status']=1;
        $map['adminid']=$id;
        // $order=$db->alias('a')->join('think_regbuy  b ON a.openid=b.WXOpenid')->field('b.id,b.WXAName,b.WXAPhone, b.WXNum,a.Table,a.time')->where($map)->select();
        //var_dump($order);
         $count =$db->alias('a')->join('think_regbuy  b ON a.ddbh=b.ddbh_re')->field('b.id,b.WXAName,b.WXAPhone, b.WXNum,a.Table_p, a.time')->where($map)->count();     
           
            $Page = new \Think\Page($count,10);
            
            $Page->setConfig('prev', '上一页');
           
           $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
            $show = $Page->show();// 分页显示输出
            
            $row_page=substr($show,-1);
            $show=substr($show,0,strlen($show)-1);
            $data=$db->alias('a')->join('think_regbuy  b ON a.ddbh=b.ddbh_re')->field('b.id,b.WXAName,a.price,b.WXAPhone, b.WXNum,a.Table_p, a.time')->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();

            // $data = $db->order('id')->where($map)->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
           
            $this->row_page=$row_page;
           
            $this->assign('user',$data);// 赋值数据集  
             // var_dump($show);
            $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板
            $this->display();

    }

    public function link(){

         if(!$_COOKIE['id']){

            $_COOKIE['id'];
        }
        $id=$_COOKIE['id'];

        $id=passport_encrypt($id,key);
        $this->id=$id;
        
        $this->display();

    }


  
}