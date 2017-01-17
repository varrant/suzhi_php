<?php
namespace Juym_admin\Controller;
use Think\Controller;
use Juym_admin\Model\PosModel;
class OptimentController extends Controller {
   /* 兼职列表*/
    public function tjlist(){
    	$db_pos=M('pos');
        $map['pos_joptype']=0;
        $map['pos_is_delete']=1;
        $count =$db_pos->where($map)->count();     
		
        $Page = new \Think\Page($count,10);
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
        $show = $Page->show();// 分页显示输出
        $row_page=substr($show,-1);
        $show=substr($show,0,strlen($show)-1);
        $data = $db_pos->where($map)->order('pos_sort')->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        // var_dump($data);
        $this->row_page=$row_page;
        $this->assign('data',$data);// 赋值数据集  
        
        $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板
        $this->display();
    }
    /*添加兼职列表*/
    public function addtjlist(){
        $this->display();
    }
    /*添加兼职数据*/
    public function dotjlist(){
        $datetime = new \DateTime;
        $data['pos_create_time']=$datetime->format('Y-m-d H:i:s');
        $data['pos_name']=I('PosName');
        $data['pos_sort']=I('Possort');
        $data['pos_joptype']=I('Posjoptype');
        $data['pos_hot']=I('Poshot');
        $data['pos_is_delete']=1;
        $db_pos=M('pos');
        $do=$db_pos->add($data);
        if($do){
           $this->ajaxReturn('ok');
        }else{
           $this->ajaxReturn('no');
        }
    }
    /*修改兼职*/
    public function eidtjlist(){
        $map['pos_id']=I('id');
        $db_pos=M('pos');
        $data=$db_pos->where($map)->select();
        $this->data=$data;
        $this->display();
    }
    /*处理修改兼职*/
    public function doeidtjlist(){
        $db_pos=M('pos');
        $datetime = new \DateTime;
        $data['pos_update_time']=$datetime->format('Y-m-d H:i:s');
        $data['pos_name']=I('PosName');
        $data['pos_sort']=I('Possort');
        $data['pos_hot']=I('Poshot');
        $map['pos_id']=I('Posid');
        $do= $db_pos->where($map)->save($data);
        if($do){
            $this->ajaxReturn('ok');   
        }else{
            $this->ajaxReturn('no'); 
        }
    }
    /*实习列表*/
    public function sxlist(){
        $db_pos=M('pos');
        $map['pos_joptype']=1;
        $map['pos_is_delete']=1;
        $data=$db_pos->where($map)->select();
        $count =$db_pos->where($map)->count();     
        $Page = new \Think\Page($count,10);
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
        $show = $Page->show();// 分页显示输出
        $row_page=substr($show,-1);
        $show=substr($show,0,strlen($show)-1);
        $data = $db_pos->where($map)->order('pos_sort')->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->row_page=$row_page;
        $this->assign('data',$data);// 赋值数据集  
        $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板
        $this->display();
    }

    /*添加实习列表*/
    public function addsxlist(){
        $this->display();
    }
    /*添加实习数据*/
    public function dosxlist(){
        $datetime = new \DateTime;
        $data['pos_create_time']=$datetime->format('Y-m-d H:i:s');
        $data['pos_name']=I('PosName');
        $data['pos_sort']=I('Possort');
        $data['pos_joptype']=1;
        $data['pos_hot']=I('Poshot');
        $db_pos=M('pos');
        $do=$db_pos->add($data);
        if($do){
           $this->ajaxReturn('ok');
        }else{
           $this->ajaxReturn('no');
        }
    }
    /*修改实习兼职*/
    public function eidsxlist(){
        $map['pos_id']=I('id');
        $db_pos=M('pos');
        $data=$db_pos->where($map)->select();
        $this->data=$data;
        $this->display();
    }
    /*修改实习数据*/
    public function doeidsxlist(){
        $db_pos=M('pos');
        $data['pos_name']=I('PosName');
        $data['pos_sort']=I('Possort');
        $data['pos_hot']=I('pos_hot');
        $map['pos_id']=I('Posid');
        $do= $db_pos->where($map)->save($data);
        if($do){
            $this->ajaxReturn('ok');   
        }else{
            $this->ajaxReturn('no'); 
        }
    }
     /*全职列表*/
    public function qzlist(){
        $db_pos=M('pos');
        $map['pos_joptype']=2;
        $map['pos_is_delete']=1;
        $data=$db_pos->where($map)->select();
        $count =$db_pos->where($map)->count();     
        $Page = new \Think\Page($count,10);
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
        $show = $Page->show();// 分页显示输出
        $row_page=substr($show,-1);
        $show=substr($show,0,strlen($show)-1);
        $data = $db_pos->where($map)->order('pos_sort')->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->row_page=$row_page;
        $this->assign('data',$data);// 赋值数据集  
        $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板
        $this->display();
    }

    /*添加全职列表*/
    public function addqzlist(){
        $this->display();
    }
    /*添加全职数据*/
    public function doqzlist(){
        $datetime = new \DateTime;
        $data['pos_create_time']=$datetime->format('Y-m-d H:i:s');
        $data['pos_name']=I('PosName');
        $data['pos_sort']=I('Possort');
        $data['pos_joptype']=2;
        $data['pos_hot']=I('Poshot');
        $db_pos=M('pos');
        $do=$db_pos->add($data);
        if($do){
           $this->ajaxReturn('ok');
        }else{
           $this->ajaxReturn('no');
        }
    }
    /*修改全职兼职*/
    public function eidqzlist(){
        $map['pos_id']=I('id');
        $db_pos=M('pos');
        $data=$db_pos->where($map)->select();
        $this->data=$data;
        $this->display();
    }
    /*修改全职数据*/
    public function doeidqzlist(){
        $db_pos=M('pos');
        $datetime = new \DateTime;
        $data['pos_update_time']=$datetime->format('Y-m-d H:i:s');
        $data['pos_name']=I('PosName');
        $data['pos_sort']=I('Possort');
        $data['pos_hot']=I('Poshot');
        $map['pos_id']=I('Posid');
        $do= $db_pos->where($map)->save($data);
        if($do){
            $this->ajaxReturn('ok');   
        }else{
            $this->ajaxReturn('no'); 
        }
    }
    /*区域列表*/
    public function qylist(){
        $db_pos=M('pos');
        $map['pos_joptype']=3;
        $map['pos_is_delete']=1;
        $data=$db_pos->where($map)->select();
        $count =$db_pos->where($map)->count();     
        $Page = new \Think\Page($count,10);
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
        $show = $Page->show();// 分页显示输出
        $row_page=substr($show,-1);
        $show=substr($show,0,strlen($show)-1);
        $data = $db_pos->where($map)->order('pos_sort')->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
     
        $this->row_page=$row_page;
        $this->assign('data',$data);// 赋值数据集  
        $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板
        $this->display();
    }

    /*添加区域列表*/
    public function addqylist(){
        $this->display();
    }
    /*添加区域数据*/
    public function doqylist(){
        $datetime = new \DateTime;
        $data['pos_create_time']=$datetime->format('Y-m-d H:i:s');
        $data['pos_name']=I('PosName');
        $data['pos_sort']=I('Possort');
        $data['pos_joptype']=3;
        $db_pos=M('pos');
        $do=$db_pos->add($data);
        if($do){
           $this->ajaxReturn('ok');
        }else{
           $this->ajaxReturn('no');
        }
    }
    /*修改区域*/
    public function eidqylist(){
        $map['pos_id']=I('id');
        $db_pos=M('pos');
        $data=$db_pos->where($map)->select();
        $this->data=$data;
        $this->display();
    }
    /*修改区域数据*/
    public function doeidqylist(){
        $datetime = new \DateTime;
        $data['pos_update_time']=$datetime->format('Y-m-d H:i:s');
        $db_pos=M('pos');
        $data['pos_name']=I('PosName');
        $data['pos_sort']=I('Possort');
       
        $map['pos_id']=I('Posid');
        $do= $db_pos->where($map)->save($data);
        if($do){
            $this->ajaxReturn('ok');   
        }else{
            $this->ajaxReturn('no'); 
        }
    }
    public function delzwlx(){
        $map['pos_id']=I('id');
        $db_pos=M('pos');
        $datetime = new \DateTime;
        $data['pos_is_delete']=0;
        $data['pos_delete_time']=$datetime->format('Y-m-d H:i:s');
        $do=$db_pos->where($map)->save($data);
        if($do){
            $this->ajaxReturn("del_ok");
        }else{
            $this->ajaxReturn("del_no");
        }

    }
    public function mysql(){
        $user=new PosModel();
        $data=$user->select();
       
    }   
 
}
