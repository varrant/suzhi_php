<?php
namespace Juym_admin\Controller;
use Think\Controller;
class ComController extends Controller {

    function lists(){

    	$db=M('com');
    	$data=$db->select();
        $count =count($data);
   
        $db1=M('poscha');
        $data1=$db1->select();
        $a=array();
        foreach ($data as $datas) {
            $map['POcomid']=$datas['comid'];
      
            $data7=$db1->where($map)->count();
            $datas['zwgs']=$data7; 
             $a[]=$datas;
             // var_dump($datas); 
         
        }
        
        // var_dump($data);
        // var_dump($map);
        // exit;
        
        // // $count1=count($data1);

        $Page = new \Think\Page($count,10);
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
        $show = $Page->show();// 分页显示输出
        $row_page=substr($show,-1);

        $show=substr($show,0,strlen($show)-1); 
        $list = $db->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        
        $this->row_page=$row_page;
        $this->a=$a;
        // var_dump($a);
        // exit;
        // $this->count1=$count1;
        $this->assign('data',$data);// 赋值数据集   
 
        $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板

       

        $this->display();
    }

    /*上传图片*/
    public function doPhoto(){
           //上传图片部分
        $uploadDir = '/uploads/';
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

            echo $targetFile= str_replace("D:/phpStudy/WWW/hzqf", "", "$targetFile");
           
          } else {

          }
        }

    }
    // 删除图片
    public function delimg(){
        $path='D:/phpStudy/WWW/hzqf/'.I('img');
        $do=unlink($path);
        if ($do) {

           $this->ajaxReturn('ok');
        }
       
    }

    function adds(){

        $this->display();
    }
    
    function doadds(){
        $comname=I('comname');
        $comlinkman=I('comlinkman');
        $comtel=I('comtel');
        $comtype=I('comtype');
        $comangel=I('comangel');
        $communren=I('communren');
        $comaddress=I('comaddress');
        $comdesc=I('comdesc');


        $data['ComName']=$comname;
        $data['Comlinkman']=$comlinkman;
        $data['Comtel']=$comtel;
        $data['Comtype']=$comtype;
        $data['Comangel']=$comangel;
        $data['Communren']=$communren;
        $data['Comaddress']=$comaddress;
        $data['Comdesc']=$comdesc;
        $data['Comlogo']=I('img');


        $db=M('com');
        //添加用户
        $do_add=$db->add($data);

        if($do_add){
            $this->success('保存成功',U('com/lists'));

           }else{
            $this->error("保存失败");
           }

    }

    function view(){
        $db=M('com');
        $map['Comid']=I('id');
        $data=$db->where($map)->select();
        // var_dump($data);
        // exit;
        $db1=M('poscha');
        $data1=$db1->select();
        $map['POcomid']=I('id');
        $data1=$db1->where($map)->select();
        $count1=count($data1);
        $this->count1=$count1;
        $this->assign('data',$data);// 赋值数据集   
        $this->display();
    }

    function doview(){


        $comname=I('comname');
        $comlinkman=I('comlinkman');
        $comtel=I('comtel');
        $comtype=I('comtype');
        $comangel=I('comangel');
        $communren=I('communren');
        $comaddress=I('comaddress');
        $comdesc=I('comdesc');


        $data['ComName']=$comname;
        $data['Comlinkman']=$comlinkman;
        $data['Comtel']=$comtel;
        $data['Comtype']=$comtype;
        $data['Comangel']=$comangel;
        $data['Communren']=$communren;
        $data['Comaddress']=$comaddress;
        $data['Comdesc']=$comdesc;
        $data['Comlogo']=I('img');

        $db=M('com');
        //修改用户
        $map=array();
        $map['Comid']=I('comid');
        // var_dump($map);
        // exit;

        $do_add=$db->where($map)->save($data);

        if($do_add){
            $this->success('保存成功',U('com/lists'));

           }else{

            $this->error("保存失败");
           }
    }
    function dele(){

            
        $id=I('id');
        $db=M('com');
        $do=$db->where($map)->delete();
        if(!$do==false){

              $this->ajaxReturn("del_ok");

        }else{

              $this->ajaxReturn("del_no") ;  
        }

    }

}
