<?php
namespace Home\Controller;

use Think\Controller;

/**
 * 猎头登录
 * Class LoginController
 * @package User\Controller
 */
class LoginController extends CommonController
{
    /**
     * 登录检查：如果用户已经登录，直接跳转到“我的”界面；
     * 登录的依据为：$_SESSION['user_id'] > 0;
     */
    public function _initialize(){
        if(0 < intval(session(['he_id']))){
            $this->redirect(U('Home/User/index'));
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
     * 猎头：发送短信验证码；
     *
     */
    public function smsvcode(){
        $this->send_sms_vcode();
    }

    /**
     * 登录检查：猎头登录检查；
     */
    public function login()
    {

        $phone = I('phone');
        $code = I('code');
        /**
         * 检查帐号状态；
         * 1.存在；2.状态正常；3.猎头；
         */
        $model_headhunter = M('headhunter');
        $map_he['he_phone'] = $phone;
        $headhunter_data = $model_headhunter
            ->where($map_he)
            ->field('he_id, he_type,he_phone,he_is_delete')
            ->select();
        $headhunter_data = $headhunter_data[0];
        if (empty($headhunter_data)) {
            $this->json_return(1, '帐号不存在');
        }

        if ($headhunter_data['he_is_delete'] === 2) {
            $this->json_return(1, '已封号');
        }
        //猎头帐号为1；
        if (!($headhunter_data['he_type'] == 1)) {
            $this->json_return(1, '此帐号不是猎头帐号');
        }

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
         * 登录成功，保存session
         */
        setcookie("type", 2, time() + 315360000, '/');//类型为猎头；
        setcookie("phone", $phone, time() + 315360000, '/');//电话
        $_SESSION['type'] = 2;//猎头；
        $_SESSION['phone'] = $phone;//电话；
        $_SESSION['he_id'] = $headhunter_data['he_id'];//表示但前用户已经登录，未登录的用户ID为0；

        $this->json_return(0, '登录成功');

    }


}