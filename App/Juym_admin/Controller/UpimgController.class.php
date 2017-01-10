<?php
namespace Juym_admin\Controller;
use Think\Controller;
class UpimgController extends CommonController {

      public function checkexists(){

            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $targetFolder . '/' . $_POST['filename'])) {
              echo 1;
            } else {
              echo 0;
            }
        }

      // 上传图片
       public function doPhoto(){
      
        //上传图片部分
        $uploadDir = '/upimgid/';

        // Set the allowed file extensions
        $fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // Allowed file extensions

        $verifyToken = md5('unique_salt' . $_POST['timestamp']);

        if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
          $tempFile   = $_FILES['Filedata']['tmp_name'];
          //var_dump($_FILES);
          $uploadDir  = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;
          // 获取文件后缀名
          $hzm=strtolower(@end(explode('.',$_FILES['Filedata']['name'])));
          //var_dump($hzm);
          //  移动后的文件名
          $targetFile = $uploadDir . time().rand(100,999).'.'.$hzm;
          
          // Validate the filetype 数组的形式返回文件路径的信息。
          $fileParts = pathinfo($_FILES['Filedata']['name']);
          if (in_array(strtolower($fileParts['extension']), $fileTypes)) {
           
            // Save the file
            move_uploaded_file($tempFile, $targetFile);
            // var_dump($targetFile);
            //echo $targetFile;
             // var_dump("D:/WWW/uploads/", "", $targetFile);
          // echo $targetFile= str_replace("D:/phpStudy/WWW/snail/upimgid/", "", $targetFile);
              echo  $targetFile= str_replace("C:/WWW/vipeta/upimgid/", "", "$targetFile");
              // var_dump($targetFile);
            //echo $_FILES['Filedata']['name'];
          } else {

            // The file type wasn't allowed
           // echo 'Invalid file type.';

          }
        }
      }  

    // ajax 删除修改的图片 很本地文件夹图片 他添加用的
     public function  delImg(){
          //图片地址
          $img = I('h');
          //图片所在的id
          $imgid=I('b');
          //处理图片的路径为删除文件夹里面的图片做准备
          $img= ltrim($img, "/");
         
       
         if(unlink($img)){
           
      }

    }

    //实时删除图片  数据库地址价本地图片
    
    // ajax 删除修改的图片 要删数据库地址  很本地文件夹图片
     public function  delImg_s(){
          //图片地址
          $img = I('h');
          //图片所在的id
          $imgid=I('b');
          // var_dump($imgid);
          //处理图片的路径为删除文件夹里面的图片做准备
          $img= ltrim($img, "/");
          //处理 要删除数据库里面的图片
          $pimgurl = substr($img,8); 

          //取出数据库图片地址
          $db=M('admin');
          $map['id']=$imgid;      
          $Pimg=$db->field('sfzimg')->where($map)->select();
          // var_dump($Pimg);
          // 数据库地址
          // var_dump( $Pimg);die;
          $dbPimg=$Pimg[0]['sfzimg'];
          
          // 删除文件夹里面的图片
         if(unlink($img)){
               // 删除数据库地址 //变数组
               // 
               // 
               
              $a=(explode(",","$dbPimg"));
              //匹配图片是否存在数组中
             // var_dump($a);
              $key = array_search($pimgurl, $a);
              if ($key !== false){
                  //删除数组元素
                  array_splice($a, $key, 1);
                  $Pimg=implode(',',$a);
                  $upimg['sfzimg']=$Pimg;
                  //更新数组
                  $do=$db->where($map)->save($upimg);
            
                }

             }


            

          
      }

    public function province(){

        $db=M('province');
        $data=$db->select();
        //var_dump($data);
       //echo  json_encode($data);
       // var_dump($data);
       $this->ajaxReturn($data,'json');

    }

    public function city(){
        $db=M('city'); 
        $map['think_province_id'] =I('h');
        
        $data=$db->where($map)->select();
        
        $this->ajaxReturn($data,'json');
    }

}