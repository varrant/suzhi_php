<?php
namespace Home\Controller;

use Think\Controller;

/**
 * 猎头：“我的”
 * Class UserController
 * @package Home\Controller
 */
class UserController extends CommonController
{
    /**
     * 我的首页
     */
    public function index()
    {
        $he_id = $this->login_inspect();
        if (empty($he_id)) {
            $this->display();//未登录状态；
        }
        //用户已经登录，显示用户信息；
        $model_headhunter = M('headhunter');
        $user_data = $model_headhunter->where('he_id = ' . $he_id)->find();

        //todo 检查用户信息；

        //数据显示；
        $this->assign('user', $user_data);
        $this->display();
    }

    /**
     * 订单中心\全部订单
     */

    /**
     * 页面：个人信息
     */
    public function pinfo()
    {
        $user_id = $this->login_inspect();

        //查询显示参数；
        $model_headhunter = M('headhunter');
        $user_data = $model_headhunter
            ->where('he_id = ' . $user_id)
            ->find();

        //页面；
        $this->assign('user', $user_data);
        $this->display();
    }
    //提交：个人信息
    public function info(){
        $user_id = $this->login_inspect();
        $nickname = $_REQUEST['nickname'];//
        $tel = $_REQUEST['tel'];
        $username = $_REQUEST['username'];
        $sex = $_REQUEST['sex'];
        $birthday = ($_REQUEST['birth']);
        $edu = $_REQUEST['edu'];
//        $job = $_REQUEST['job'];//
        $school = $_REQUEST['school'];
        $major = $_REQUEST['major'];
        $edutime = $_REQUEST['edutime'];//入学时间；

        $user_data['he_nickname'] = $nickname;
        $user_data['he_sex'] = $sex;
        $user_data['he_birthday'] = $birthday;
        $user_data['he_phone']  = $tel;
        $user_data['he_name'] = $username;
//        $user_data['he_occupation'] = $job;
        $user_data['he_topdegreee'] = $edu;
        $user_data['he_school'] = $school;
        $user_data['he_major'] = $major;
        $user_data['he-grade'] = $edutime;//猎头年级，入学年份；

        /**
         * 处理头像；
         */
        if(!empty($_FILES['image']['size'])){
            $upload = new Upload();
            $upload->savePath = './Public/home/upload';
            $upload_result = $upload->upload($_FILES);
            if (!$upload_result) {
                $this->error('图片上传失败');
            }
            $user_data['he_image'] = $upload_result['idcardimg']['savepath'] . $upload_result['idcardimg']['savename'];
        }else{
            $user_data['he_image'] = $_REQUEST['image_prev'];
        }
        /**
         * 保存数据
         */
        $model_headhunter = M('headhunter');
        $success = $model_headhunter->data($user_data)
            ->where('he_id = ' . $user_id)
            ->save();

        if($success === false){
            $this->json_return(1, '修改失败');
        }

        $this->json_return(0, '修改成功');
    }


    /**
     * 余额
     */
    public function balance()
    {
        $user_id = $this->login_inspect();

        //查询显示参数；
        $model_headhunter = M('headhunter');
        $user_data = $model_headhunter
            ->where('he_id = ' . $user_id)
            ->find();

        //页面；
        $this->assign('user', $user_data);
        $this->display();
    }

    /**
     * 提现：页面；
     */
    public function pwthdraw()
    {
        $user_id = $this->login_inspect();

        //查询显示参数；
        $model_headhunter = M('headhunter');
        $user_data = $model_headhunter
            ->where('he_id = ' . $user_id)
            ->find();

        //页面；
        $this->assign('user', $user_data);
        $this->display();
    }

    //提现：请求提交；
    public function wthdraw()
    {
        //提交提现申请；
        $num = $_REQUEST['cash'];//提现金额
        $addtime = time();//提现时间
        $user_id = $this->login_inspect();//提现用户ID
        $model_headhunter = M('headhunter');
        $user_data = $model_headhunter
            ->where('he_id = ' . $user_id)
            ->find();
        //账户余额检查
        if ($user_data['he_turn_out_jine'] < $num) {
            $this->json_return(1, '可转出金额不足');
        }
        /**
         * 开启事物；
         */
        $model_headhunter->startTrans();
        //添加冻结金额，减少可用金额
        $data_change = array(
            'he_frozen_amount' => array('exp', 'he_frozen_amount + ' . $num),
            'he_turn_out_jine' => array('exp', 'he_turn_out_jine - ' . $num)
        );
        $data_where = array(
            'he_turn_out_jine' => array('gt', $num)
        );
        $success = $model_headhunter->data($data_change)->where($data_where)->save();
        if (!($success !== false && $success > 0)) {
            $model_headhunter->rollback();
            $this->json_return(1, '冻结资金失败');
        }
        //保存体现记录；
        $wthdraw_data['addtime'] = $addtime;
        $wthdraw_data['num'] = $num;
        $wthdraw_data['uid'] = $user_id;

        $model_log = M('withdraw_log');
        $success = $model_log->data($wthdraw_data)->add();
        if ($success === false) {
            $model_headhunter->rollback();
            $this->json_return(1, '申请提现失败');
        }
        //提示提现成功；
        $model_headhunter->commit();
        $this->json_return(0, '申请提现成功');
    }

    /**
     * 推荐有奖
     */
    public function recom()
    {

        $uid = $this->login_inspect();

        $this->assign('uid', $uid);//分享时附加的分享人的ID
        $this->display();
    }

    /**
     * 我的人才库
     */
    public function humres()
    {
        $this->display();
    }

    /**
     * 提现设置
     */
    public function pexchset()
    {
        $user_id = $this->login_inspect();
        //查询显示参数；
        $model_headhunter = M('headhunter');
        $user_data = $model_headhunter
            ->where('he_id = ' . $user_id)
            ->find();

        //提现设置页面；
        $this->assign('user', $user_data);
        $this->display();
    }

    public function exchset($id = 0)
    {

        $user_id = $this->login_inspect();//要求登录
        $type = $_REQUEST['type'];
        $account = $_REQUEST['account'];
        $username = $_REQUEST['uname'];

        //参数检查， todo 更严格的检查；
        if (empty($type)) {
            $this->json_return(1, '请选择提现方式');
        }

        if (empty($type)) {
            $this->json_return(1, '请填写帐号');
        }

        if (empty($username)) {
            $this->json_return(1, '请填写真实姓名');
        }

        //保存设置信息
        // 一个用户只能有一条设置信息，数据库已对uid列设置唯一；
        $user_data['uname'] = $username;
        $user_data['account'] = $account;
        $user_data['type'] = $type;
        $user_data['uid'] = $user_id;

        $model_user = M('withdraw_set');
        if (empty($id)) {
            $success = $model_user->data($user_data)->add();
        } else {
            //切记：不可以ID为where条件；
            $success = $model_user->data($user_data)
                ->where(array('uid' => $user_id))
                ->save();
        }
        if (!($success !== false && $success > 0)) {
            //保存失败；
            $this->json_return(1, '保存失败');
        }

        $this->json_return(0, '保存成功');
    }

    /**
     * 意见反馈
     */
    public function feedback()
    {

        $this->display();//显示意见反馈
    }

    //////////////////////////////////////////////////////////////////////////////////
    function Check()
    {

        $this->display();
    }

    function userCenter2()
    {
        if (!$_COOKIE['openid_v']) {
            $CODE = $_GET['code'];
            $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . C(APPID) . "&secret=" . C(SECRET) . "&code=" . $CODE . "&grant_type=authorization_code";
            $oCurl = curl_init();
            if (stripos($url, "https://") !== FALSE) {
                curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
                curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
            }
            curl_setopt($oCurl, CURLOPT_URL, $url);
            curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
            $sContent = curl_exec($oCurl);
            $aStatus = curl_getinfo($oCurl);
            curl_close($oCurl);
            $res = json_decode($sContent, true);
            $open = $res['openid'];
            // var_dump( $open);
            // 查检测结果订单

            // var_dump($open);

            setcookie("openid_v", $open, time() + 3600 * 24 * 7);
            // setcookie("openid_v",$open, time()+3600*24*7);

        } else {
            $open = $_COOKIE['openid_v'];
        }

        $map['openid'] = $open;
        $map['status'] = 1;
        $map['Table_p'] = 6;

        $db = M('price');
        $data = $db->alias('a')->join('think_regbuy b ON a.ddbh=b.ddbh_re')->field('WXNickName,cwxp,time ,b.id')->where($map)->select();
        $db->getLastsql();

        // var_dump($db->getLastsql());
        $this->data = $data;
        $this->display();

    }

    function userCenter1()
    {

        $this->display();
    }

    function heation()
    {

        $Model = M("price");
        $map['status'] = 1;
        $map['b.id'] = I('id');
        // $map['b.id']=2754;
        $data = $Model->alias('a')->join('think_regbuy b ON a.ddbh=b.ddbh_re')->field('b.WXAName,b.WXNickName,b.cwxp,WXPinzhong,b.WXSex,b.WXBirthday,a.time,a.tox,a.leptospira,a.cper,a.hot,a.ascaris,a.tiny,a.nematode,a.ccoccidiosis,a.trichomonad,a.egg')->where($map)->select();

        // var_dump( $Model->getLastsql());
        $this->ajaxReturn($data);
        // $this->ajaxReturn(json_encode($data),'JSON');


    }


    function search()
    {
        $phone = I('phonexinpian');
        $cwxp = I('phonexinpian');
        if ($phone) {
            $where['cwxp'] = array('like', "%$cwxp%");
            $where['WXAPhone'] = array('like', "%$phone%");
            $where['_logic'] = "or";
            $map['_complex'] = $where;
            $map['status'] = '1';
            $map['sta'] = '1';
            $db = M('regbuy');
            $data = $db->alias('a')->join('think_price b ON a.ddbh_re=b.ddbh')->where($map)->field('a.cwxp,a.id,b.time,a.WXAName,a.WXlb')->select();


            $this->data = $data;
        }

        $this->display();

    }

    function deaidog()
    {
        $id = I('pid');
        $db = M('price');
        $map['b.id'] = $id;
        $data = $db->alias('a')->join('think_regbuy b ON a.ddbh=b.ddbh_re')->field('b.WXAName,b.WXNickName,b.cwxp,WXPinzhong,b.WXSex,b.WXBirthday,a.time,a.tox,a.leptospira,a.cper,b.WXlb,a.hot,a.ascaris,a.tiny,a.nematode,a.ccoccidiosis,a.trichomonad,a.egg')->where($map)->select();
        $this->data = $data;
        $this->display();


    }

    function Perscenter()
    {


        $this->display();
    }

    //首页
    function homepage()
    {
        //查出省份的代理
        header("Content-Type: text/html; charset=utf-8");
        $db = M('admin');
        $map['type'] = 3;
        $map['a.sta'] = 0;
        $data = $db->alias('a')->join('think_city as b on a.city=b.id')->where($map)->field('a.id,a.username,a.address,a.iPhone,b.name')->select();
        // var_dump($data);

        foreach ($data as $k => $v) {
            $id = $v['id'];
            $id = passport_encrypt($id, key);
            $data[$k]['id'] = $id;
        }

        $this->data = $data;
        $this->display();
    }

    function searchpro()
    {
        $pro = I('pro');
        $db = M('admin');
        $map['a.sta'] = 0;
        $map['type'] = 3;
        $map['b.name'] = array('like', "%$pro%");
        $data = $db->alias('a')->join('think_city as b on a.city=b.id')->where($map)->field('a.username,a.address,a.iPhone,b.name')->select();
        $this->data = $data;
        $this->display();
    }

    //首页检测中心
    function jcenter()
    {
        $db = M('artn');
        $map['sts'] = 1;
        $map['sta'] = 0;
        $data = $db->where($map)->select();


        $this->data = $data;
        $this->display();
    }

    function searchjianc()
    {
        $jczx = I('jczx');
        $db = M('artn');
        $map['city'] = $jczx;
        $map['sts'] = 1;
        $map['sta'] = 0;
        $map['city'] = array('like', "%$jczx%");
        $data = $db->where($map)->select();
        $this->data = $data;
        $this->display();
    }

    //首页定点医院
    function rcenter()
    {
        $db = M('artn');
        $map['sts'] = 0;
        $map['sta'] = 0;
        $data = $db->where($map)->select();
        $this->data = $data;
        // var_dump($data);
        $this->display();
    }

    function searchddyy()
    {
        $ddyy = I('ddyy');
        $db = M('artn');
        $map['city'] = $ddyy;
        $map['sts'] = 0;
        $map['sta'] = 0;
        $map['city'] = array('like', "%$ddyy%");
        $data = $db->where($map)->select();
        //var_dump($data);
        $this->data = $data;
        $this->display();
    }

    //招募
    function recruit()
    {


        $this->display();
    }

    // 平安保险
    function Pice()
    {

        $this->display();
    }

    // 平安保险参保信息提交
    function painfor()
    {
        $data['cwname'] = I('cwname');
        $data['userid'] = I('userid');
        $data['iphone'] = I('iphone');
        $data['cwxp'] = I('cwxp');
        $data['yueduty'] = I('yueduty');
        $data['patime'] = time();
        $db = M('pabx');
        $do = $db->add($data);
        if ($do) {
            $this->ajaxReturn('ok');
        }
    }

}