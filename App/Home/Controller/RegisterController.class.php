<?php
namespace Home\Controller;

use Think\Controller;
use Think\Upload;

/**
 * 猎头注册；
 * Class RegisterController
 * @package Home\Controller
 */
class RegisterController extends CommonController
{
    /**
     * 注册页面；
     */
    public function index()
    {
        $this->display('/register/register');
    }

    /**
     * 发送短信验证码；
     */
    public function smsvcode()
    {
        $this->send_sms_vcode();
    }

    /**
     * 注册：第一步;
     * 用户协议；
     */
    public function regstep0()
    {
        //显示用户协议页面；
        $this->display();
    }

    /**
     * 注册：第二步；
     * 实名认证；
     */
    public function regstep1()
    {
        //判断是否同意
        $agree = intval($_REQUEST['agree']);//同意
        if ($agree !== 1) {
            $this->redirect(U('Home/Register/regstep0'));
        }

        //设置第一步骤完成；
        session('reg_step0', 1);

        //显示实名认证页面；
        $this->display();
    }

    /**
     * 注册：第三步骤；
     * 个人信息；
     */
    public function regstep2()
    {
        //只有第一步完成,才能保存第二步骤的数据；
        if (session('reg_step0') !== 1) {
            $this->redirect(U('Home/Register/regstep0'));
        }
        //保存第二步的数据；
        $username = $_REQUEST['username'];//用户名；
        $idno = $_REQUEST['idno'];//身份证号码；

        if (empty($username)) {
            $this->error('请填写用户名');
        }
        if (empty($idno)) {
            $this->error('请填写身份证号码');
        }
        if (empty($_FILES['idcardimg']['size'])) {
            $this->error('请上传身份正图片');
        }

        $upload = new Upload();
        $upload->savePath = './Public/home/upload';
        $upload_result = $upload->upload($_FILES);
        if (!$upload_result) {
            $this->error('图片上传失败');
        }
        $idcardimg = $upload_result['idcardimg']['savepath'] . $upload_result['idcardimg']['savename'];

        $user_data['he_name'] = $username;
        $user_data['he_carid'] = $idno;
        $user_data['he_idimg'] = $idcardimg;
        $model_headhunter = M('headhunter');
        $he_id = $model_headhunter->data($user_data)->add();
        if(!($he_id !== false && $he_id > 0)){
            $this->error('保存信息失败');
        }
        session('he_id', $he_id);//保存生成的ID;

        //设置第二步完成；
        session('reg_step1', 1);

        //显示第三步的页面；
        $this->display();
    }

    /**
     * 注册：第四步；操作进入第三方支付；
     * 缴纳保证金；
     */
    public function regstep3()
    {
        //一二部完成；
        if (session('reg_step0') !== 1) {
            $this->redirect(U('Home/Register/regstep0'));
        }
        if (session('reg_step1') !== 1) {
            $this->redirect(U('Home/Register/regstep1'));
        }
        //保存第三步提交的数据；
        $he_id = session('he_id');
        if(empty($he_id)){
            $this->error('he_id不存在');
        }
        $nickname = $_REQUEST['nickname'];
        $sex = $_REQUEST['sex'];
        $birthday = ($_REQUEST['birth']);
        $job = $_REQUEST['job'];
        $edu = $_REQUEST['edu'];
        $school = $_REQUEST['school'];
        $major = $_REQUEST['major'];
        $edutime = $_REQUEST['edutime'];//入学时间；

        $user_data['he_nickname'] = $nickname;
        $user_data['he_sex'] = $sex;
        $user_data['he_birthday'] = $birthday;
        $user_data['he_occupation'] = $job;
        $user_data['he_topdegreee'] = $edu;
        $user_data['he_school'] = $school;
        $user_data['he_major'] = $major;
        $user_data['he-grade'] = $edutime;//猎头年级，入学年份；

        $model_user = M('headhunter');
        $success = $model_user->where('he_id = ' . $he_id)->data($user_data)->save();

        if($success === false){
            $this->error('保存信息失败');
        }

        //设置第三步完成；
        session('reg_step2', 1);

        //显示第四步界面， 支付界面；
        $this->display();
    }

    /**
     * 注册完成页面；
     */
    public function regstep4(){
        //一二三部完成；
        if (session('reg_step0') !== 1) {
            $this->redirect(U('Home/Register/regstep0'));
        }
        if (session('reg_step1') !== 1) {
            $this->redirect(U('Home/Register/regstep1'));
        }

        if (session('reg_step2') !== 1) {
            $this->redirect(U('Home/Register/regstep2'));
        }
        //处理第四步提交的信息；
        //todo 检查支付是否完成；

        //设置第四步完成, 此步骤并无必要；
        session('reg_step3', 1);

        //显示注册完成页面；
        $this->display();
    }

/////////////////////////////////////////////////////////////////////////////
    /*处理验证码是否正确*/
    public function Verif()
    {
        global $phone;
        $phone = I('phone');
        $code = I('code');
        /*查出手机code*/
        $db_code = M('code');
        $db_he = M('headhunter');
        $map_co['cod_phone'] = $phone;
        $map_co['cod_code'] = $code;
        $do_he = $db_code->where($map_co)->find();
        if ($do_he) {
            $data_a['he_phone'] = $phone;
            $map_p['he_phone'] = $phone;
            $db_co = $db_he->where($map_p)->find();
            if ($db_co) {
                $this->ajaxReturn('yorn');
            }
            $db_a = $db_he->add($data_a);
            if ($db_a) {
                $this->ajaxReturn("ok");
            }

        } else {
            $this->ajaxReturn("no");
        }


    }

    public function re2()
    {
        $this->phone = I('phone');
        $this->display();
    }

    /*上传图片*/
    public function doPhoto()
    {
        //上传图片部分
        $uploadDir = '/upimg/lt/';

        // Set the allowed file extensions
        $fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // Allowed file extensions
        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            //var_dump($_FILES);
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;
            // 获取文件后缀名
            $hzm = strtolower(@end(explode('.', $_FILES['Filedata']['name'])));
            //var_dump($hzm);
            // 移动后的文件名
            $targetFile = $uploadDir . time() . rand(100, 999) . '.' . $hzm;
            // Validate the filetype 数组的形式返回文件路径的信息。
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            if (in_array(strtolower($fileParts['extension']), $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);
                $targetFile = str_replace("C:/WWW/suzhi_php/upimg/lt/", "", "$targetFile");

                /*识别身份证信息*/
                $carid = cardrec("./upimg/lt/" . $targetFile);
                if (empty($carid)) {
                    $carid = '{"msg":"error"}';
                }
                echo '{"pic":"' . $targetFile . '","item":' . $carid . '}';

            } else {

            }
        }

    }

    // 删除图片
    public function delimg()
    {
        $path = 'C:/WWW/suzhi_php/' . I('img');
        $do = unlink($path);
        if ($do) {
            $this->ajaxReturn('ok');
        }

    }

    /*处理第二部数据添加*/
    public function dore2()
    {
        $data['he_type'] = 1;
        $data['he_name'] = I('he_name');
        $data['he_carid'] = I('he_carid');
        $data['he_phone'] = I('phone');
        $data['he_idimg'] = I('he_idimg');

        $db_he = M('headhunter');
        $map['he_phone'] = I('phone');
        $do = $db_he->where($map)->save($data);
        if ($do) {
            $this->ajaxReturn('ok');
        }

    }

    public function re3()
    {
        $this->id = I('id');
        $this->data = $_POST;
        $this->display();
    }

    //支付页面
    Public function Alipay()
    {
        var_dump($_POST);
        $this->data = $_POST;
        $this->display();
    }

    /*注册成功猎头信息写入数据库*/
    public function dore3()
    {

        $data['he_phone'] = I('phone');
        $data['he_nickname'] = I('he_nickname');
        $data['he_sex'] = I('he_sex');
        $data['he_birthday'] = I('he_birthday');
        $data['he_occupation'] = I('he_occupation');
        $data['he_education'] = I('he_education');
        $data['he_shcool'] = I('he_school');

        $data['he_grade'] = I('he_grade');
        $db_he = M('headhunter');
        $map['he_phone'] = I('phone');
        $do = $db_he->where($map)->save($data);
        if ($do) {
            $this->ajaxReturn('ok');
        } else {
            $this->ajaxReturn('no');
        }
    }


}