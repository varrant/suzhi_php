<?php
namespace Juym_admin\Controller;
use Think\Controller;
class RotmapController extends CommonController {
  function lists(){
    $db=M('role');
    $count =$db->count();
    $Page = new \Think\Page($count,2);
    $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
    $show = $Page->show();// 分页显示输出
    $show=substr($show,0,strlen($show)-1);
    $data = $db->limit($Page->firstRow.','.$Page->listRows)->order('rl_sort desc')->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    $this->row_page=$count;
    $this->assign('data',$data);// 赋值数据集
    $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板
    $this->display();

  }
  function addRotmap(){
    
    $this->display();
  }
  function dorotmap(){
    $data=array();
    $arr=$_POST;
    $data['rl_image']=uploadPic($arr['rl_image']);
    $data['rl_sort']=$arr['rl_sort'];
    $data['rl_link']=$arr['rl_link'];
    $data['rl_createtime']=time();
    $db=M('role');
    $do_add=$db->add($data);
    if($do_add){
      $this->success('添加成功',U('rotmap/lists'));
    }else{
      $this->error("添加失败");
    }
  }
  function view(){
    $db=M('role');
    $map['rl_id']=I('id');
    $data=$db->where($map)->select();
    $this->assign('data',$data);// 赋值数据集
    $this->display();
  }
  function doview(){
    $data=array();
    $map=array();
    $arr=$_POST;
    //查询照片是否发生改变
    $db=M('role');
    $map['rl_id']=$arr['rl_id'];
    $aa=$db->where($map)->find();
    if($aa['rl_image'] == $arr['rl_image']){
      $data['rl_image']=$arr['rl_image'];
    }else{
      $data['rl_image']=uploadPic($arr['rl_image']);
    }
    $data['rl_sort']=$arr['rl_sort'];
    $data['rl_link']=$arr['rl_link'];
    //更新时间
    $data['rl_updatetime']=time();
    $do_add=$db->where($map)->save($data);
    if($do_add){
      $this->success('保存成功',U('rotmap/lists'));
    }else{
      $this->error("保存失败");
    }
  }
  function delete(){
    $map = array();
    $map['rl_id'] = $_POST['rl_id'];
    $db = M('role');
    $do_add = $db->where($map)->delete();
    if ($do_add) {
      $this->success('删除成功', U('rotmap/lists'));
    } else {

      $this->error("删除失败");
    }
  }






}