<?php
namespace Juym_admin\Controller;
use Think\Controller;
class PoschaController extends Controller {

    function lists(){

        $id=I('id');
    	$db=M('poscha');
        $map['pos_company_id']=$id;
    	$data=$db->where($map)->select();
    	// var_dump(111111);
    	// var_dump($data);
    	// var_dump($db->getLastSql());
        $count =count($data);    
        $Page = new \Think\Page($count,10);
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
        $show = $Page->show();// 分页显示输出
        $row_page=substr($show,-1);

        $show=substr($show,0,strlen($show)-1);
        $list = $db->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
      
        $this->row_page=$row_page;
        $this->assign('data',$data);// 赋值数据集   
        
       
        $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板

       

        $this->display();
    }

    function lists_j(){

        $db=M('poscha');
        $map['pos_task_type']='0';
        $data=$db->order('pos_id DESC')->where($map)->select();
        // var_dump(111111);
        // var_dump($data);
        // var_dump($db->getLastSql());


        $count =count($data);    
        $Page = new \Think\Page($count,10);
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
        $show = $Page->show();// 分页显示输出
        $row_page=substr($show,-1);

        $show=substr($show,0,strlen($show)-1);
        $list = $db->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
      
        $this->row_page=$row_page;
        $this->assign('data',$data);// 赋值数据集   
        
       
        $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板

       

        $this->display();
    }

    function lists_s(){
        $db=M('poscha');
        $map['pos_task_type']='1';
 
        $data=$db->order('pos_id DESC')->where($map)->select();
        // var_dump(111111);
        // var_dump($data);
        // exit;
        // var_dump($db->getLastSql());
        // exit;
        $count =count($data);    
        $Page = new \Think\Page($count,10);
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
        $show = $Page->show();// 分页显示输出
        $row_page=substr($show,-1);

        $show=substr($show,0,strlen($show)-1);
        $list = $db->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
      
        $this->row_page=$row_page;
        $this->assign('data',$data);// 赋值数据集   
        
       
        $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板

       

        $this->display();
    }

    function lists_q(){
        $db=M('poscha');
        $map['pos_task_type']='2';
 
        $data=$db->order('pos_id DESC')->where($map)->select();
        // var_dump(111111);
        // var_dump($data);
        // exit;
        // var_dump($db->getLastSql());
        // exit;
        $count =count($data);    
        $Page = new \Think\Page($count,10);
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
        $show = $Page->show();// 分页显示输出
        $row_page=substr($show,-1);

        $show=substr($show,0,strlen($show)-1);
        $list = $db->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
      
        $this->row_page=$row_page;
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
    
    function doadds_j(){


        $pos_name=I('pos_name');
        $pos_company_id=I('pos_company_id');
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
        $pos_online=I('pos_online');


        $data['pos_name']=$pos_name;
        $data['pos_company_id']=$pos_company_id;
        $data['pos_task_type']='0';
        $data['pos_recruitmun']=$pos_recruitmun;
        $data['pos_county']=$pos_county;
        $data['pos_brokerage']=$pos_brokerage;
        $data['pos_salary']=$pos_salary;
        $data['pos_joptype']=$pos_joptype;
        $data['pos_worktime']=$pos_worktime;
        $data['pos_hours']=$pos_hours;
        $data['pos_Jobdescription']=$pos_Jobdescription;
        $data['pos_responsibilities']=$pos_responsibilities;
        $data['pos_img']=I('img');
        $data['pos_welfarebenefits']=$pos_welfarebenefits;
        $data['pos_online']=$pos_online;


        $db=M('poscha');
        //添加用户
        $do_add=$db->add($data);

        if($do_add){
            $this->success('保存成功',U('poscha/lists_s'));

           }else{
            $this->error("保存失败");
           }

    }

    function doadds_s(){

        $pos_name=I('pos_name');
        $pos_company_id=I('pos_company_id');
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
        $pos_online=I('pos_online');


        $data['pos_name']=$pos_name;
        $data['pos_company_id']=$pos_company_id;
        $data['pos_task_type']='1';
        $data['pos_recruitmun']=$pos_recruitmun;
        $data['pos_county']=$pos_county;
        $data['pos_brokerage']=$pos_brokerage;
        $data['pos_salary']=$pos_salary;
        $data['pos_joptype']=$pos_joptype;
        $data['pos_worktime']=$pos_worktime;
        $data['pos_hours']=$pos_hours;
        $data['pos_Jobdescription']=$pos_Jobdescription;
        $data['pos_responsibilities']=$pos_responsibilities;
        $data['pos_img']=I('img');
        $data['pos_welfarebenefits']=$pos_welfarebenefits;
        $data['pos_online']=$pos_online;


        $db=M('poscha');
        //添加用户
        $do_add=$db->add($data);

        if($do_add){
            $this->success('保存成功',U('poscha/lists_s'));

           }else{
            $this->error("保存失败");
           }

    }

    function doadds_q(){

        $pos_name=I('pos_name');
        $pos_company_id=I('pos_company_id');
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
        $pos_online=I('pos_online');


        $data['pos_name']=$pos_name;
        $data['pos_company_id']=$pos_company_id;
        $data['pos_task_type']='2';
        $data['pos_recruitmun']=$pos_recruitmun;
        $data['pos_county']=$pos_county;
        $data['pos_brokerage']=$pos_brokerage;
        $data['pos_salary']=$pos_salary;
        $data['pos_joptype']=$pos_joptype;
        $data['pos_worktime']=$pos_worktime;
        $data['pos_hours']=$pos_hours;
        $data['pos_Jobdescription']=$pos_Jobdescription;
        $data['pos_responsibilities']=$pos_responsibilities;
        $data['pos_img']=I('img');
        $data['pos_welfarebenefits']=$pos_welfarebenefits;
        $data['pos_online']=$pos_online;


        $db=M('poscha');
        //添加用户
        $do_add=$db->add($data);

        if($do_add){
            $this->success('保存成功',U('poscha/lists_s'));

           }else{
            $this->error("保存失败");
           }

    }

    function view(){
        $db=M('poscha');
        $map['pos_id']=I('id');
        $data=$db->where($map)->select();
        // var_dump($data);
        // exit;
        $this->assign('data',$data);// 赋值数据集   
        $this->display();

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
        $pos_online=I('pos_online');


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
        $data['pos_img']=I('img');
        $data['pos_welfarebenefits']=$pos_welfarebenefits;
        $data['pos_online']=$pos_online;

        $db=M('poscha');
        $map=array();
        $map['pos_id']=I('posid');
        $do_add=$db->where($map)->save($data);

        if($do_add){
            $this->success('保存成功',U('company/lists'));

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
}
