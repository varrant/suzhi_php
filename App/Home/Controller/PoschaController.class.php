<?php
namespace Home\Controller;
use Think\Controller;
class PoschaController extends Controller {

//全部任务列表
    function lists(){
        // $id=I('id');
        // 连接任务表和公司表
    	$db=M('poscha');
        $db1=M('company');
        // $map['pos_company_id']=$id;
    	$data=$db->select();
        $a=array();
        foreach ($data as $datas) {
            $map['pos_company_id']=$datas['com_id'];
                                        
            $data7=$db1->where($map)->select();
            //将公司表中的信息压到$datas['zwgs']中
            $datas['zwgs']=$data7; 
            $a[]=$datas;  
        }

        $this->ajaxReturn($a);

    }

//兼职列表
    function lists_j(){

        
        // $id=I('id');
        // 连接任务表和公司表
        $db=M('poscha');
        //类型是兼职
        $map['pos_task_type']='0';
        $db1=M('company');

        // $map['pos_company_id']=$id;
        $data=$db->select();
        $data1=$db1->select();
        $a=array();
        foreach ($data as $datas) {
            // $map['pos_company_id']=$datas['com_id'];
      
            $data7=$db1->select();
            //将公司表中的信息压到$datas['zwgs']中
            $datas['zwgs']=$data7; 
             $a[]=$datas;
             // var_dump($datas); 
         
        }
        $this->ajaxReturn($a);
    }

//实习列表
    function lists_s(){
        // $id=I('id');
        // 连接任务表和公司表
        $db=M('poscha');
        //类型是实习
        $map['pos_task_type']='0';
        $db1=M('company');

        // $map['pos_company_id']=$id;
        $data=$db->select();
        $data1=$db1->select();
        $a=array();
        foreach ($data as $datas) {
            //$map['pos_company_id']=$datas['com_id'];
            $data7=$db1->select();
            //将公司表中的信息压到$datas['zwgs']中
            $datas['zwgs']=$data7; 
            $a[]=$datas;
            // var_dump($datas); 
        }
        $this->ajaxReturn($a);
    }

//全职列表
    function lists_q(){
        // $id=I('id');
        // 连接任务表和公司表
        $db=M('poscha');
        //类型是全职
        $map['pos_task_type']='2';
        $db1=M('company');

        // $map['pos_company_id']=$id;
        $data=$db->select();
        $data1=$db1->select();
        $a=array();
        foreach ($data as $datas) {
            // $map['pos_company_id']=$datas['com_id'];
      
            $data7=$db1->select();
            //将公司表中的信息压到$datas['zwgs']中
            $datas['zwgs']=$data7; 
             $a[]=$datas;
             // var_dump($datas); 
         
        }
        $this->ajaxReturn($a);
    }

//任务详情页面显示
    function view(){
            $db=M('poscha');
            $db1=M('company');
            $db_pos=M('pos');
            //获取任务id
            $map['pos_id']=I('id');
            $data=$db->where($map)->select();
            $data1=$db1->select();
            // var_dump($data->getLastSql());
            $a=array();
            foreach ($data as $key => $datas) {
                // $map['pos_company_id']=$datas['com_id'];
                /*查出工作类型*/
                $map['pos_id'] = $datas['pos_joptype'];
                $jop=$db_pos->where($map)->field('pos_name')->find();
                $db_t=M('address_town');
                $map_t['townid']=$datas['pos_county'];
                $town=$db_t->where( $map_t)->find();

                $datas['pos_county']=$town['towname'];
                $datas['pos_joptype']=$jop['pos_name'];
                $map_o['com_id']=$datas['pos_company_id'];
                $data7=$db1->where($map_o)->select();
                //将公司表中的信息压到$datas['zwgs']中
                $db_ord=M('orderinfo');
                $map_ord['ord_poschaid']=I('id');
                $map_ord['ord_headh']=100;
                /*判断猎头是否已经领取了任务*/
                $db_ord_1=$db_ord->where($map_ord)->find();
                $datas['zwgs']=$data7; 
                $datas['orderinfo']=$db_ord_1;
                $a[]=$datas;           
        }
  
            $this->ajaxReturn($a);
       
    }    
 

    function doview(){

        $pos_name=I('pos_name');
        $pos_task_type=I('pos_task_type');
        $pos_recruitmun=I('pos_recruitmun');
        $pos_county=I('pos_county');
        $pos_brokerage=I('pos_brokerage');
        $pos_salary=I('pos_salary');
        $pos_joptype=I('pos_joptype');
        $pos_worktime=I('pos_worktime');
        $pos_hours=I('pos_hours');
        $pos_Jobdescription=I('pos_Jobdescription');
        $pos_responsibilities=I('pos_responsibilities');
        $pos_welfarebenefits=I('pos_welfarebenefits');
        
        $data['pos_name']=$pos_name;
        $data['pos_recruitmun']=$pos_recruitmun;
        $data['pos_task_type']=$pos_task_type;
        $data['pos_brokerage']=$pos_brokerage;
        $data['pos_salary']=$pos_salary;
        $data['pos_joptype']=$pos_joptype;
        $data['pos_worktime']=$pos_worktime;
        $data['pos_hours']=$pos_hours;
        $data['pos_Jobdescription']=$pos_Jobdescription;
        $data['pos_responsibilities']=$pos_responsibilities;
        // $data['pos_img']=I('img');
        $data['pos_welfarebenefits']=$pos_welfarebenefits;
        $data['pos_online']=$pos_online;

        $db=M('poscha');
        $map=array();
        $map['pos_id']=I('posid');
        $do_add=$db->where($map)->add($data);

        if($do_add){
            $this->success('保存成功');
           }else{
            $this->error("保存失败");
           }
    }

    function doonline(){

        $data['pos_online']=I('pos_online');
        $db=M('poscha');
        $map['pos_id']=I('id');
        $data=$db->where($map)->save($data);

        if($data){
            $this->success('保存成功');

           }else{

            $this->error("保存失败");
           }
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
}
