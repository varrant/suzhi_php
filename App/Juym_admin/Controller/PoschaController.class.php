<?php
namespace Juym_admin\Controller;
use Think\Controller;
class PoschaController extends CommonController {

    function lists(){
    	$db=M('poscha');
        //必须是兼职
        $map['pos_task_type'] = 1;
        //必须是未删除的
        $map['pos_is_delete'] = 1;
        $count =$db->where($map)->count();
        $Page = new \Think\Page($count,10);
        $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
        $show = $Page->show();// 分页显示输出
        $show=substr($show,0,strlen($show)-1);
        $data = $db->where($map)->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->row_page=$count;
        foreach ($data as $key => $value){
            $shuzu=M('pos');
            $arr['pos_id']=$data[$key]['pos_county'];
            $res=$shuzu->where($arr)->select();
            $data[$key]['qu']=$res[0]['pos_name'];
            $brr['pos_id']=$data[$key]['pos_joptype'];
            $result=$shuzu->where($brr)->select();
            $data[$key]['leixing']=$result[0]['pos_name'];

        }
        $this->assign('data',$data);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板
        $this->display();
    }

    function lists_s(){
        $db=M('poscha');
        //必须是实习
        $map['pos_task_type'] = 2;
        //必须是未删除的
        $map['pos_is_delete'] = 1;
        $count =$db->where($map)->count();
        $Page = new \Think\Page($count,10);
        $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
        $show = $Page->show();// 分页显示输出
        $show=substr($show,0,strlen($show)-1);
        $data = $db->where($map)->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->row_page=$count;
        foreach ($data as $key => $value){
            $shuzu=M('pos');
            $arr['pos_id']=$data[$key]['pos_county'];
            $res=$shuzu->where($arr)->select();
            $data[$key]['qu']=$res[0]['pos_name'];
            $brr['pos_id']=$data[$key]['pos_joptype'];
            $result=$shuzu->where($brr)->select();
            $data[$key]['leixing']=$result[0]['pos_name'];

        }
        $this->assign('data',$data);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板
        $this->display();
    }

    function lists_q(){
        $db=M('poscha');
        //必须是全职
        $map['pos_task_type'] = 3;
        //必须是未删除的
        $map['pos_is_delete'] = 1;
        $count =$db->where($map)->count();
        $Page = new \Think\Page($count,10);
        $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
        $show = $Page->show();// 分页显示输出
        $show=substr($show,0,strlen($show)-1);
        $data = $db->where($map)->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->row_page=$count;
        foreach ($data as $key => $value){
            $shuzu=M('pos');
            $arr['pos_id']=$data[$key]['pos_county'];
            $res=$shuzu->where($arr)->select();
            $data[$key]['qu']=$res[0]['pos_name'];
            $brr['pos_id']=$data[$key]['pos_joptype'];
            $result=$shuzu->where($brr)->select();
            $data[$key]['leixing']=$result[0]['pos_name'];

        }
        $this->assign('data',$data);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板
        $this->display();

    }

    function adds(){

        $this->display();
    }
    function adds_s(){
        $this->display();
    }
    function adds_q(){
        $this->display();
    }
    function doadds_j(){
        $data =array();
        $arr=$_POST;
        $data['pos_img']=uploadPic($arr['pos_img']);
        $data['pos_name']=$arr['pos_name'];
        $data['pos_recruitmun']=$arr['pos_recruitmun'];
        $data['pos_county']=$arr['pos_county'];
        $data['pos_brokerage']=$arr['pos_brokerage'];
        $data['pos_salary']=$arr['pos_salary'];
        $data['pos_joptype']=$arr['pos_joptype'];
        $data['pos_worktime']=$arr['pos_worktime'];
        $data['pos_hours']=$arr['pos_hours'];
        $data['pos_company_name']=$arr['pos_company_name'];
        $data['pos_company_address']=$arr['pos_company_address'];
        $data['pos_true_liulan']=$arr['pos_true_liulan'];
        $data['pos_true_toudi']=$arr['pos_true_toudi'];
        $data['pos_liuan']=$arr['pos_liuan'];
        $data['pos_toudi']=$arr['pos_toudi'];
        $data['pos_jobdescription']=$arr['pos_jobdescription'];
        $data['pos_responsibilities']=$arr['pos_responsibilities'];
        $data['pos_welfarebenefits']=$arr['pos_welfarebenefits'];
        $data['pos_online']=$arr['pos_online'];
        //兼职
        $data['pos_task_type']=1;
        $data['pos_create_time']=date('Y-m-d h:i:s',time());

        $db=M('poscha');
        //添加用户
        $do_add=$db->add($data);

        if($do_add){
            $this->success('保存成功',U('poscha/lists'));

           }else{
            $this->error("保存失败");
           }

    }

    function doadds_s(){

        $data =array();
        $arr=$_POST;
        $data['pos_img']=uploadPic($arr['pos_img']);
        $data['pos_name']=$arr['pos_name'];
        $data['pos_recruitmun']=$arr['pos_recruitmun'];
        $data['pos_county']=$arr['pos_county'];
        $data['pos_brokerage']=$arr['pos_brokerage'];
        $data['pos_salary']=$arr['pos_salary'];
        $data['pos_joptype']=$arr['pos_joptype'];
        $data['pos_worktime']=$arr['pos_worktime'];
        $data['pos_hours']=$arr['pos_hours'];
        $data['pos_company_name']=$arr['pos_company_name'];
        $data['pos_company_address']=$arr['pos_company_address'];
        $data['pos_true_liulan']=$arr['pos_true_liulan'];
        $data['pos_true_toudi']=$arr['pos_true_toudi'];
        $data['pos_liuan']=$arr['pos_liuan'];
        $data['pos_toudi']=$arr['pos_toudi'];
        $data['pos_jobdescription']=$arr['pos_jobdescription'];
        $data['pos_responsibilities']=$arr['pos_responsibilities'];
        $data['pos_welfarebenefits']=$arr['pos_welfarebenefits'];
        $data['pos_online']=$arr['pos_online'];
        //实习
        $data['pos_task_type']=2;
        $data['pos_create_time']=date('Y-m-d h:i:s',time());

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

        $data =array();
        $arr=$_POST;
        $data['pos_img']=uploadPic($arr['pos_img']);
        $data['pos_name']=$arr['pos_name'];
        $data['pos_recruitmun']=$arr['pos_recruitmun'];
        $data['pos_county']=$arr['pos_county'];
        $data['pos_brokerage']=$arr['pos_brokerage'];
        $data['pos_salary']=$arr['pos_salary'];
        $data['pos_joptype']=$arr['pos_joptype'];
        $data['pos_worktime']=$arr['pos_worktime'];
        $data['pos_hours']=$arr['pos_hours'];
        $data['pos_company_name']=$arr['pos_company_name'];
        $data['pos_company_address']=$arr['pos_company_address'];
        $data['pos_true_liulan']=$arr['pos_true_liulan'];
        $data['pos_true_toudi']=$arr['pos_true_toudi'];
        $data['pos_liuan']=$arr['pos_liuan'];
        $data['pos_toudi']=$arr['pos_toudi'];
        $data['pos_jobdescription']=$arr['pos_jobdescription'];
        $data['pos_responsibilities']=$arr['pos_responsibilities'];
        $data['pos_welfarebenefits']=$arr['pos_welfarebenefits'];
        $data['pos_online']=$arr['pos_online'];
        //全职
        $data['pos_task_type']=3;
        $data['pos_create_time']=date('Y-m-d h:i:s',time());

        $db=M('poscha');
        //添加用户
        $do_add=$db->add($data);

        if($do_add){
            $this->success('保存成功',U('poscha/lists_q'));

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
    function view_s(){
        $db=M('poscha');
        $map['pos_id']=I('id');
        $data=$db->where($map)->select();
        // var_dump($data);
        // exit;
        $this->assign('data',$data);// 赋值数据集
        $this->display();

    }
    function view_q(){
        $db=M('poscha');
        $map['pos_id']=I('id');
        $data=$db->where($map)->select();
        // var_dump($data);
        // exit;
        $this->assign('data',$data);// 赋值数据集
        $this->display();

    }

    function doview(){
        $data=array();
        $map=array();
        $arr=$_POST;
        //查询照片是否发生改变
        $db=M('poscha');
        $map['pos_id']=$arr['pos_id'];
        $aa=$db->where($map)->find();
        if($aa['pos_img'] == $arr['pos_img']){
            $data['pos_img']=$arr['pos_img'];
        }else{
            $data['pos_img']=uploadPic($arr['pos_img']);
        }

        $data['pos_name']=$arr['pos_name'];
        $data['pos_recruitmun']=$arr['pos_recruitmun'];
        $data['pos_county']=$arr['pos_county'];
        $data['pos_brokerage']=$arr['pos_brokerage'];
        $data['pos_salary']=$arr['pos_salary'];
        $data['pos_joptype']=$arr['pos_joptype'];
        $data['pos_worktime']=$arr['pos_worktime'];
        $data['pos_hours']=$arr['pos_hours'];
        $data['pos_company_name']=$arr['pos_company_name'];
        $data['pos_company_address']=$arr['pos_company_address'];
        $data['pos_true_liulan']=$arr['pos_true_liulan'];
        $data['pos_true_toudi']=$arr['pos_true_toudi'];
        $data['pos_liuan']=$arr['pos_liuan'];
        $data['pos_toudi']=$arr['pos_toudi'];
        $data['pos_jobdescription']=$arr['pos_jobdescription'];
        $data['pos_responsibilities']=$arr['pos_responsibilities'];
        $data['pos_welfarebenefits']=$arr['pos_welfarebenefits'];
        $data['pos_online']=$arr['pos_online'];
        //更新时间
        $data['pos_update_time']=date('Y-m-d h:i:s',time());

        $do_add=$db->where($map)->save($data);

        if($do_add){
            $this->success('保存成功',U('poscha/lists'));

           }else{

            $this->error("保存失败");
           }
    }
    function doview_s(){
        $data=array();
        $map=array();
        $arr=$_POST;
        //查询照片是否发生改变
        $db=M('poscha');
        $map['pos_id']=$arr['pos_id'];
        $aa=$db->where($map)->find();
        if($aa['pos_img'] == $arr['pos_img']){
            $data['pos_img']=$arr['pos_img'];
        }else{
            $data['pos_img']=uploadPic($arr['pos_img']);
        }

        $data['pos_name']=$arr['pos_name'];
        $data['pos_recruitmun']=$arr['pos_recruitmun'];
        $data['pos_county']=$arr['pos_county'];
        $data['pos_brokerage']=$arr['pos_brokerage'];
        $data['pos_salary']=$arr['pos_salary'];
        $data['pos_joptype']=$arr['pos_joptype'];
        $data['pos_worktime']=$arr['pos_worktime'];
        $data['pos_hours']=$arr['pos_hours'];
        $data['pos_company_name']=$arr['pos_company_name'];
        $data['pos_company_address']=$arr['pos_company_address'];
        $data['pos_true_liulan']=$arr['pos_true_liulan'];
        $data['pos_true_toudi']=$arr['pos_true_toudi'];
        $data['pos_liuan']=$arr['pos_liuan'];
        $data['pos_toudi']=$arr['pos_toudi'];
        $data['pos_jobdescription']=$arr['pos_jobdescription'];
        $data['pos_responsibilities']=$arr['pos_responsibilities'];
        $data['pos_welfarebenefits']=$arr['pos_welfarebenefits'];
        $data['pos_online']=$arr['pos_online'];
        //更新时间
        $data['pos_update_time']=date('Y-m-d h:i:s',time());

        $do_add=$db->where($map)->save($data);

        if($do_add){
            $this->success('保存成功',U('poscha/lists_s'));

        }else{

            $this->error("保存失败");
        }
    }
    function doview_q(){
        $data=array();
        $map=array();
        $arr=$_POST;
        //查询照片是否发生改变
        $db=M('poscha');
        $map['pos_id']=$arr['pos_id'];
        $aa=$db->where($map)->find();
        if($aa['pos_img'] == $arr['pos_img']){
            $data['pos_img']=$arr['pos_img'];
        }else{
            $data['pos_img']=uploadPic($arr['pos_img']);
        }

        $data['pos_name']=$arr['pos_name'];
        $data['pos_recruitmun']=$arr['pos_recruitmun'];
        $data['pos_county']=$arr['pos_county'];
        $data['pos_brokerage']=$arr['pos_brokerage'];
        $data['pos_salary']=$arr['pos_salary'];
        $data['pos_joptype']=$arr['pos_joptype'];
        $data['pos_worktime']=$arr['pos_worktime'];
        $data['pos_hours']=$arr['pos_hours'];
        $data['pos_company_name']=$arr['pos_company_name'];
        $data['pos_company_address']=$arr['pos_company_address'];
        $data['pos_true_liulan']=$arr['pos_true_liulan'];
        $data['pos_true_toudi']=$arr['pos_true_toudi'];
        $data['pos_liuan']=$arr['pos_liuan'];
        $data['pos_toudi']=$arr['pos_toudi'];
        $data['pos_jobdescription']=$arr['pos_jobdescription'];
        $data['pos_responsibilities']=$arr['pos_responsibilities'];
        $data['pos_welfarebenefits']=$arr['pos_welfarebenefits'];
        $data['pos_online']=$arr['pos_online'];
        //更新时间
        $data['pos_update_time']=date('Y-m-d h:i:s',time());

        $do_add=$db->where($map)->save($data);

        if($do_add){
            $this->success('保存成功',U('poscha/lists_q'));

        }else{

            $this->error("保存失败");
        }
    }
    function delete(){
        $map=array();
        $data=array();
        $map['pos_id']=$_POST['pos_id'];
        //改为已删除
        $data['pos_is_delete']=2;
        $data['pos_delete_time']=date('Y-m-d h:i:s',time());
        $db=M('poscha');

        $do_add=$db->where($map)->save($data);

        if($do_add){
            $this->success('删除成功',U('poscha/lists'));

        }else{

            $this->error("删除失败");
        }
    }
    function delete_s()
    {
        $map = array();
        $data = array();
        $map['pos_id'] = $_POST['pos_id'];
        //改为已删除
        $data['pos_is_delete'] = 2;
        $data['pos_delete_time'] = date('Y-m-d h:i:s', time());
        $db = M('poscha');

        $do_add = $db->where($map)->save($data);

        if ($do_add) {
            $this->success('删除成功', U('poscha/lists_s'));

        } else {

            $this->error("删除失败");
        }
    }
    function delete_q()
    {
        $map = array();
        $data = array();
        $map['pos_id'] = $_POST['pos_id'];
        //改为已删除
        $data['pos_is_delete'] = 2;
        $data['pos_delete_time'] = date('Y-m-d h:i:s', time());
        $db = M('poscha');

        $do_add = $db->where($map)->save($data);

        if ($do_add) {
            $this->success('删除成功', U('poscha/lists_q'));

        } else {

            $this->error("删除失败");
        }
    }

}
