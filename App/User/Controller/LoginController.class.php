<?php
namespace  User\Controller;

use Think\Controller;

/**
 * 求职者登录
 * Class LoginController
 * @package User\Controller
 */
class LoginController extends UserCommonController
{
    /**
     * 登录检查：如果用户已经登录，直接跳转到“我的”界面；
     * 登录的依据为：$_SESSION['user_id'] > 0;
     */
    public function _initialize(){
        if(0 < intval(session(['user_id']))){
            $this->redirect(U('User/User/index'));
        }
    }

    /**
     * 登入页面
     */
    public function index()
    {

        $this->display();
    }

    /**
     * 发送短信验证码；
     */
    public function smsvcode(){
        //用户已经注册求职者端口；
        $tel = I('phone');
        $user_info = $this->get_user_by_tel($tel);

        if(empty($user_info)){
            $this->json_return(1, '手机号码未注册求职者');
        }

        if(!($user_info['he_is_delete'] == 1)){
            $this->json_return(1, '已封号');
        }

        $this->send_sms_vcode();
    }
    /**
     * 登录检查：求职者登录检查；
     */
    public function login()
    {

        $phone = I('phone');
        $code = I('code');
        /**
         * 验证码检查；
         */
        $db_co = M('code');
        $map_co['code_phone'] = $phone;
        $map_co['cod_code'] = $code;
        $map_co['cod_used'] = 0;//未使用；
        $code_data['cod_used'] = 1;//设为已使用
        $code = $db_co->data($code_data)->where($map_co)->save();
        if (!($code !== false && $code > 0)) {
            $this->json_return(1, '验证码错误');
        }

        /**
         * 检查帐号状态；
         * 1.存在；2.状态正常；3.求职者；
         */
        $headhunter_data = $this->get_user_by_tel($phone);
        if (empty($headhunter_data)) {
            $this->json_return(1, '帐号不存在');
        }

        if (!($headhunter_data['he_is_delete'] == 1)) {
            $this->json_return(1, '已封号');
        }

        if (!($headhunter_data['he_type'] == 2)) {
            $this->json_return(1, '此帐号不是求职者帐号');//2 为求职者；
        }

        /**
         * 登录成功，保存session
         */
        setcookie("type", 1, time() + 315360000, '/');//类型；
        setcookie("phone", $phone, time() + 315360000, '/');//电话
        $_SESSION['type'] = 1;//求职者；
        $_SESSION['phone'] = $phone;//电话；
        $_SESSION['user_id'] = $headhunter_data['he_id'];//表示但前用户已经登录，未登录的用户ID为0；

        $this->json_return(0, '登录成功');

    }


}