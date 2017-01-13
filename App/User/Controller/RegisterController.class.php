<?php
namespace User\Controller;

use Think\Controller;

/**
 * 求职注册;
 * Class RegisterController
 * @package Home\Controller
 */
class RegisterController extends UserCommonController
{
    /**
     * 显示注册页面
     */
    public function index()
    {

        $this->display();
    }

    /**
     * 获取验证码；
     */
    public function smsvcode(){
        $this->send_sms_vcode();
    }

    /**
     * 注册信息提交保存；
     */
    public function regcmt()
    {
        $tel = intval($_REQUEST['tel']);
        $vcode = $_REQUEST['vcode'];
        $nickname = $_REQUEST['nickname'];
        $username = $_REQUEST['username'];
        $sex = $_REQUEST['sex'];
        $job = $_REQUEST['job'];

        //判断数据是否为空；
        if (empty($tel) || empty($vcode) || empty($nickname) || empty($username) || empty($sex) || empty($job)) {
            $this->json_return(1, '缺少必填参数');
        }

        //手机号码格式检查 todo
        $is_mobile = $this->is_mobile($tel);
        if (!$is_mobile) {
            $this->json_return(1, '请输入正确手机号码');
        }

        //验证码检查, 未做过期检查；
        $model_code = M('code');
        $map_co['cod_phone'] = $tel;
        $map_co['cod_code'] = $vcode;
        $map_co['cod_used'] = 0;
        $map_data['cod_used'] = 1;
        $result = $model_code->data($map_data)->where($map_co)->save();
        if (!($result !== false && $result > 0)) {
            $this->json_return(1, '验证码错误');
        }

        //唯一性判断，手机号码唯一；
        if (!$this->tel_not_register($tel)) {
            $this->json_return(1, '手机号码已经注册');
        }

        //写入数据；
        $headhunter = M('headhunter');
        $user_data['he_phone'] = $tel;
        $user_data['he_nickname'] = $nickname;
        $user_data['he_sex'] = $sex;
        $user_data['he_name'] = $username;//username
        $user_data['he_sex'] = $sex;//sex
        $user_data['he_job'] = $job;//job
        $user_data['he_type'] = 2; //求职者身份；
        $success = $headhunter->data($user_data)->add();
        if (!$success) {
            $this->json_return(1, '添加用户信息失败');
        }

        //显示注册成功页面；
        $this->json_return(0, '注册成功');
    }

    /**
     * 手机号码没有注册；
     * @param $tel
     * @return bool
     */
    private function tel_not_register($tel)
    {

        $db_head = M('headhunter');
        $map_head['he_phone'] = $tel;
        $db_phone = $db_head->where($map_head)->find();

        return empty($db_phone);
    }

    //////////////////////////////////////////////////////////////////////////////////
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

}