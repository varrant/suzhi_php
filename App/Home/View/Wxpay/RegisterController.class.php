<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
    /*显示注册页面*/  
    public function re(){

    	$this->display();
    } 
    //发送验证码
    public function Sensms(){
        // var_dump(1111);
    	$phone=I('phone');
        //判别该手机号码是否已注册 
        $db_head=M('headhunter');
        $map_head['he_phone']=$phone;
        $db_phone=$db_head->where( $map_head)->find();
        if($db_phone){
            $this->ajaxReturn('exist');
        }
        /*生成四位随机码*/
        $num="";
        for($i=0;$i<4;$i++){
            $num .= rand(0,9);
         }
        import("Org.Util.Im1");
        import("Org.Util.Im2");
        /*发送短信*/
        $result= sendTemplateSMS("$phone" ,array($num,'5'),"117318");
        if($result=='1'){
            $db_code=M('code');
            $data['cod_code']=$num;
            $data['cod_phone']=$phone;
            $data['cod_time']=time();
            $map['cod_phone']=$phone;
            $do_phone=$db_code->where($map)->find();
            if($do_phone){
                $map_up['cod_phone']=$phone;
                $data_up['cod_code']=$num;
                $do_up=$db_code->where($map_up)->save($data_up);
                if($do_up){
                    $this->ajaxReturn('ok'); 
                } 
            }else{
                $db_codes=$db_code->add($data);
                if($db_codes){
                  $this->ajaxReturn('ok');  
                }
            }
        }else{
            $this->ajaxReturn('error');
        }

    }
    /*处理验证码是否正确*/
    public function Verif(){
        global $phone;
        $phone=I('phone');
        $code=I('code');
        /*查出手机code*/
        $db_code=M('code');
        $db_he=M('headhunter');
        $map_co['cod_phone']=$phone;
        $map_co['cod_code']=$code;
        $do_he=$db_code->where($map_co)->find();
        if($do_he){
            $data_a['he_phone']=$phone;
            $map_p['he_phone']=$phone;
            $db_co=$db_he->where($map_p)->find();
            if($db_co){
                $this->ajaxReturn('yorn');
            }
            $db_a=$db_he->add($data_a);
            if($db_a){
                $this->ajaxReturn("ok");
            }
        	
        }else{
           $this->ajaxReturn("no"); 
        }

        
       
    }
    public function re2(){
        $this->phone=I('phone');
        $this->display();
    }
    /*上传图片*/
    public function doPhoto(){
           //上传图片部分
        $uploadDir = '/upimg/lt/';

        // Set the allowed file extensions
        $fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // Allowed file extensions
        if (!empty($_FILES) ) {
          $tempFile   = $_FILES['Filedata']['tmp_name'];
          //var_dump($_FILES);
          $uploadDir  = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;
          // 获取文件后缀名
          $hzm=strtolower(@end(explode('.',$_FILES['Filedata']['name'])));
          //var_dump($hzm);
          // 移动后的文件名
          $targetFile = $uploadDir . time().rand(100,999).'.'.$hzm;
          // Validate the filetype 数组的形式返回文件路径的信息。
          $fileParts = pathinfo($_FILES['Filedata']['name']);
          if (in_array(strtolower($fileParts['extension']), $fileTypes)) {
            move_uploaded_file($tempFile, $targetFile);
            echo $targetFile= str_replace("C:/WWW/suzhi_php/upimg/lt/", "", "$targetFile");

            /*识别身份证信息*/
            // $carid=cardrec("./upimg/lt/".$targetFile);

            var_dump($carid);
           
          } else {

          }
        }

    }
    // 删除图片
    public function delimg(){
        $path='C:/WWW/suzhi_php/'.I('img');
        $do=unlink($path);
        if ($do) {
           $this->ajaxReturn('ok');
        }
       
    }
     /*处理第二部数据添加*/
    public function dore2(){
        $data['he_type']=1;
        $data['he_name']=I('he_name');
        $data['he_carid']=I('he_carid');
        $data['he_phone']=I('phone');
        $data['he_idimg']=I('he_idimg');
        var_dump($data['he_idimg']);
        $db_he=M('headhunter');
        $map['he_phone']=I('phone');
        $do=$db_he->where($map)->save($data);
        if($do){
            $this->ajaxReturn('ok');
        }

    }
    public function re3(){
        $this->id=I('id');
        $this->data=$_POST;
        $this->display();
    }
  
    //支付页面
    Public function Alipay(){
        var_dump($_POST);
        $this->data=$_POST;
        $this->display();
    }

    /*注册成功猎头信息写入数据库*/
    public function dore3(){
        
    	$data['he_phone']=I('phone');
    	$data['he_nickname']=I('he_nickname');
    	$data['he_sex']=I('he_sex');
    	$data['he_birthday']=I('he_birthday');
    	$data['he_occupation']=I('he_occupation');
    	$data['he_education']=I('he_education');
    	$data['he_shcool']=I('he_school');

    	$data['he_grade']=I('he_grade');
    	$db_he=M('headhunter');
        $map['he_phone']=I('phone');
    	$do=$db_he->where($map)->save($data);
    	if ($do) {
    		$this->ajaxReturn('ok');
    	}else{
    		$this->ajaxReturn('no');
    	}
    }

    /*生成二维码*/
    public function qrcode(){
        $save_path = isset($_GET['save_path'])?$_GET['save_path']:'Public/qrcode/';
        $web_path = isset($_GET['save_path'])?$_GET['web_path']:'/Public/qrcode/';
        $qr_data = isset($_GET['qr_data'])?$_GET['qr_data']:'http://www.zetadata.com.cn/';
        $qr_level = isset($_GET['qr_level'])?$_GET['qr_level']:'H';
        $qr_size = isset($_GET['qr_size'])?$_GET['qr_size']:'8';
        $save_prefix = isset($_GET['save_prefix'])?$_GET['save_prefix']:'ZETA';

        if($filename = createQRcode($save_path,$qr_data,$qr_level,$qr_size,$save_prefix)){
            $pic = $web_path.$filename;
        }

        echo "<img src='".$pic."'>";
    }
    public function img(){


   

    }

}