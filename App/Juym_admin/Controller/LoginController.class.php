<?php
namespace Juym_admin\Controller;
use Think\Controller;
class LoginController extends Controller {
   
    function index(){

        // var_dump(isMobile());

        if(isMobile()){

           $this->redirect('Juym_admin/Login/index_phone');    
        }

        $this->display();
    }
     function index_phone(){

        $this->display();


    }
      //市级
       function index_c(){
        //显示拉去省份的
     $db=M('province');
      $data=$db->select();
      // var_dump($data);
      $this->data=$data;
       $this->display();


    }

     //省级
       function index_s(){

        $this->display();


    }

   function code(){

      import('Org.Util.vcode');
      $code= new \vcode(70, 30, 4); 
     //显示验证码
      ob_clean();
      $code->outimg();
      $_SESSION['code'] = $code->getcode();
    }


    function doLogin(){
      
        $code=I('code');
        $_SESSION['code'];
        $password=I('password');
        $username=I('username');
        $checks=I("checkbox");
       // var_dump($_POST);
        //验证 验证码 z正确
       
       if( $code!= $_SESSION['code']){

            $data['stuta']="codeisno";
           
           
            $this->ajaxReturn($data);

       }else{
             
          $db=M('admin');
          $map['username']=$username;
          $map['password']=md5($password);
          $user=$db->where($map)->select();
          $id=$user['0']['id'];
          $type=$user['0']['type'];
           //登入成功
           if($user){
            $time=time();
            $data['logintime']=time();
            //更新登入时间
            $user1=$db->where("id=$id")->save($data); 
            if( $user1){
                $_SESSION['uid']=$user['0']['id'];
                $_SESSION['name']=$user['0']['name'];
               
                $data['stuta']="login_ok";
                $data['type']= $type;
                $_SESSION['user']=$username;
                $type=$user[0]['type'];
                 //类型存cookie
                setcookie("type", $type,time()+3600*24*7,'/');
                setcookie("id", $id,time()+3600*24*7,'/');
                setcookie("name", $_SESSION['name'],time()+3600*24*7,'/');
                
                 if($checks=="on"){

                    setcookie("username",$username,time()+3600*24*7,'/');

                  }


                     $this->ajaxReturn($data);

                     // var_dump($data);die;

                  }
                     }else{
                      //帐号密码错误
                      $data['stuta']="login_no";
                      $this->ajaxReturn($data);
                     }


             }
    	

    }


    //城市推荐码模块
    function Cszcm(){
       // var_dump($_POST);
      $db=M('admin');
      $data['username']=I('c_name');
      $data['iPhone']  =I('c_phone');
      $data['password']=I('c_password');
      $repassword      =I('c_rpassword');
      $data['province']=I('province');
      $data['wxNum']=I('wxNum');
      $data['city']=I('city');
      $data['type']=3;
       if( $repassword!=$data['password']){
        $arr['password']=2;
        $this->ajaxReturn( $arr,"JSON");
      }
      //查出所有省的
       $map_pri['type']=array('in','2');
       $id_arr=$db->where($map_pri)->field('id')->select();
       $id= substr(I('yqm'),2);  
      foreach ($id_arr as $va) {
       $do= array_search((int)$id,$va);
           if($do){
            
            $data['pid']=$id;
            $data['password']=md5($data['password']);
            $data['logintime']=time();
            $data['type']=3;
            $data['province']=$province[0]['province'];

          $do_zc=$db->add($data);
            if($do_zc){
               $arr['ok']=1;
               $this->ajaxReturn ($arr,'JSON');
           }else{
            $this->ajaxReturn("zcsb");
           }
         }
       }


    
      // die;
    

     
     //  $data['password']=md5( $data['password']);
     //  $map['province']=$data['province'];
     // $province_1=$db->where( $map)->field('id ,province')->order('id')->limit(1)->select();
     // $data['pid']=$province_1[0]['id'];

      // //查询所有省级和超级管理员id
      //  $id= substr($data['csyqm'],2);
      // //查他的省级id
      // $map_s['id']=$id;
      
      // $province=$db->where($map_s)->field('province')->select();
      // // var_dump($province);
      //  $do= $db->add($data);

  

      //  // var_dump($id);
      
     


      // var_dump($id_arr);
      //进行匹配
      // var_dump($id_arr);
      // var_dump($id);
      //

      // }
    }

    function outLogin(){
        $_SESSION=array();
        setcookie('username','',time()-1,'/');
        setcookie('type',    '',time()-1,'/');
        setcookie('id',     '',time()-1,'/');
        setcookie('name',   '' ,time()-1,'/');
       
       
       

        $this->redirect('Juym_admin/Login/index');
        
    }
}