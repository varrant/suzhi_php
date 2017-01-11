<?php
namespace Juym_admin\Controller;
use Think\Controller;
class HeadController extends CommonController {
   //猎头列表
      function lists(){
          $db=M('headhunter');
          //必须是兼职
          $map['he_type'] = 1;
          //必须是未封号
          $map['he_is_delete'] = 1;
          $count =$db->where($map)->count();
          $Page = new \Think\Page($count,5);
          $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
          $show = $Page->show();// 分页显示输出
          $show=substr($show,0,strlen($show)-1);
          $data = $db->where($map)->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
          $this->row_page=$count;
          $this->assign('data',$data);// 赋值数据集
          $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板
          $this->display();

       }
    //查看个人信息
    function view(){
        $db=M('headhunter');
        $map['he_id']=I('id');
        $data=$db->where($map)->select();
        $this->assign('data',$data);// 赋值数据集
        $this->display();

    }
    //更新操作
    function doview(){
        $data=array();
        $map=array();
        $arr=$_POST;
        //查询照片是否发生改变
        $db=M('headhunter');
        $map['he_id']=$arr['he_id'];
        $aa=$db->where($map)->find();
        if($aa['he_image'] == $arr['he_image']){
            $data['he_image']=$arr['he_image'];
        }else{
            $data['he_image']=uploadPic($arr['he_image']);
        }
        if($aa['he_idimg'] == $arr['he_idimg']){
            $data['he_idimg']=$arr['he_idimg'];
        }else{
            $data['he_idimg']=uploadPic($arr['he_idimg']);
        }
        $data['he_phone']=$arr['he_phone'];
        $data['he_nickname']=$arr['he_nickname'];
        $data['he_name']=$arr['he_name'];
        $data['he_sex']=$arr['he_sex'];
        $data['he_carid']=$arr['he_carid'];
        $data['he_birthday']=$arr['he_birthday'];
        $data['he_occupation']=$arr['he_occupation'];
        $data['he_education']=$arr['he_education'];
        $data['he_shcool']=$arr['he_shcool'];
        $data['he_major']=$arr['he_major'];
        $data['he_grade']=$arr['he_grade'];
        //更新时间
        $data['he_update_time']=date('Y-m-d h:i:s',time());

        $do_add=$db->where($map)->save($data);

        if($do_add){
            $this->success('保存成功',U('head/lists'));

        }else{

            $this->error("保存失败");
        }
    }
    //封号操作
    function delete(){
        $map = array();
        $data = array();
        $map['he_id'] = $_POST['he_id'];
        //改为已封号
        $data['he_is_delete'] = 2;
        $data['he_delete_time'] = date('Y-m-d h:i:s', time());
        $db = M('headhunter');

        $do_add = $db->where($map)->save($data);

        if ($do_add) {
            $this->success('封号成功', U('head/lists'));

        } else {

            $this->error("封号失败");
        }
    }
    //增加猎头操作
    function adds(){

        $this->display();
    }
    function doadds(){
        $data=array();

        $arr=$_POST;
        $data['he_image']=uploadPic($arr['he_image']);
        $data['he_idimg']=uploadPic($arr['he_idimg']);
        $data['he_phone']=$arr['he_phone'];
        $data['he_nickname']=$arr['he_nickname'];
        $data['he_name']=$arr['he_name'];
        $data['he_sex']=$arr['he_sex'];
        $data['he_carid']=$arr['he_carid'];
        $data['he_birthday']=$arr['he_birthday'];
        $data['he_occupation']=$arr['he_occupation'];
        $data['he_education']=$arr['he_education'];
        $data['he_shcool']=$arr['he_shcool'];
        $data['he_major']=$arr['he_major'];
        $data['he_grade']=$arr['he_grade'];
        //添加时间
        $data['he_create_time']=date('Y-m-d h:i:s',time());
        //添加类型 猎头
        $data['he_type']=1;

        $db=M('headhunter');
        $do_add=$db->add($data);
        if($do_add){
            $this->success('添加成功',U('head/lists'));
        }else{
            $this->error("添加失败");
        }
    }





}