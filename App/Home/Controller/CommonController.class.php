<?php
namespace Home\Controller;

use Think\Controller;

/**
 * 猎头：公共方法；
 * Class CommonController
 * @package Home\Controller
 */
Class CommonController extends Controller
{
//    Public function _initialize()
//    {
//        $phone = $_COOKIE['pohone'] ? $_COOKIE['pohone'] : $_SESSION['pohone'];
//        if (!$phone) {
//            $this->redirect("Home/Login/index");
//        }
//
//
//    }

    /**
     * 判断是否为手机号码;
     * @param $tel
     * @return int
     */
    public function is_mobile($tel)
    {
        return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $tel);
    }

    /**
     * 返回前端ajax；
     * @param $errcode
     * @param string $errmsg
     * @param array $data
     */
    public function json_return($errcode, $errmsg = '', $data = array())
    {
        $return = array(
            'errcode' => $errcode,
            'errmsg' => $errmsg,
            'data' => $data
        );

        $json = json_encode($return);

        die($json);
    }


    /**
     * 登录检查
     * 如果登录返回 user_id;
     * 否则跳转到登录页面；
     */
    public function login_inspect()
    {

        $user_id = intval(session('he_id'));
        if (empty($user_id)) {
            $this->redirect('/Home/Login/index');
            exit;
        }

        return $user_id;

        //查询用户信息
        //MK 无需检查用户信息，在登录时已检查，无需重复检查
//        $db = M('headhunter');
//        $where['he_id'] = $user_id;
//        $where['he_is_delete'] = 1;
//        $res = $db->where($where)->select();
//        if (empty($res)) {
//            $this->redirect('/Home/Login/index');
//            exit;
//        } else {
//            return $user_id;
//        }


    }

    /**
     * 短信验证码；
     */
    public function send_sms_vcode()
    {
        $phone = I('phone');
        //手机号码格式检查
        $is_mobile = $this->is_mobile($phone);
        if (!$is_mobile) {
            $this->json_return(1, '请输入正确手机号码');
        }

        //判别该手机号码是否已注册
        //if ($this->tel_not_register($phone)) {
        // $this->json_return(1, '手机号码未注册');
        // }


        /*生成四位随机码*/
        $num = "";
        for ($i = 0; $i < 4; $i++) {
            $num .= rand(0, 9);
        }

        import("Org.Util.Im1");
        import("Org.Util.Im2");

        /*发送短信*/
        $result = sendTemplateSMS("$phone", array($num, '5'), "117318");
        if ($result !== 1) {
//            $this->json_return(1, '短信验证码发送失败(SZ' . __LINE__ . ')');
        }

        //保存手机验证码；
        $db_code = M('code');
        $data['cod_code'] = $num;
        $data['cod_phone'] = $phone;
        $data['cod_time'] = time();

        $db_codes = $db_code->add($data);//到数据库；
        if ($db_codes === false) {
            $this->json_return(1, '短信验证码发送失败(SZ' . __LINE__ . ')');
        }

        $this->json_return(0, '短信验证码发送成功');
    }

    /**
     * 手机号码没有注册；
     * @param $tel
     * @return bool
     */
    public function tel_not_register($tel)
    {

        $db_head = M('headhunter');
        $map_head['he_phone'] = $tel;
        $map_head['he_type'] = 1;//猎头
        $db_phone = $db_head->where($map_head)->find();

        return empty($db_phone);
    }

    public function get_user_by_tel($tel)
    {

        $db_head = M('headhunter');
        $map_head['he_phone'] = $tel;
        $map_head['he_type'] = 1;//猎头
        $db_phone = $db_head->where($map_head)->find();

        return ($db_phone);
    }
}