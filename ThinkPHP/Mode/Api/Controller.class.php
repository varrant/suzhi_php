<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace Think;
/**
 * ThinkPHP API模式控制器基类
 */
abstract class Controller {

   /**
     * 架构函数
     * @access public
     */
    public function __construct() {
        //控制器初始化
        if(method_exists($this,'_initialize'))
            $this->_initialize();
    }

    /**
     * 魔术方法 有不存在的操作的时候执行
     * @access public
     * @param string $method 方法名
     * @param array $args 参数
     * @return mixed
     */
    public function __call($method,$args) {
        if( 0 === strcasecmp($method,ACTION_NAME.C('ACTION_SUFFIX'))) {
            if(method_exists($this,'_empty')) {
                // 如果定义了_empty操作 则调用
                $this->_empty($method,$args);
            }else{
                E(L('_ERROR_ACTION_').':'.ACTION_NAME);
            }
        }else{
            E(__CLASS__.':'.$method.L('_METHOD_NOT_EXIST_'));
            return;
        }
    }

    /**
     * Ajax方式返回数据到客户端
     * @access protected
     * @param mixed $data 要返回的数据
     * @param String $type AJAX返回数据格式
     * @return void
     */
    protected function ajaxReturn($data,$type='') {
        if(empty($type)) $type  =   C('DEFAULT_AJAX_RETURN');
        switch (strtoupper($type)){
            case 'JSON' :
                // 返回JSON数据格式到客户端 包含状态信息
                header('Content-Type:application/json; charset=utf-8');
                exit(json_encode($data));
            case 'XML'  :
                // 返回xml格式数据
                header('Content-Type:text/xml; charset=utf-8');
                exit(xml_encode($data));
            case 'JSONP':
                // 返回JSON数据格式到客户端 包含状态信息
                header('Content-Type:application/json; charset=utf-8');
                $handler  =   isset($_GET[C('VAR_JSONP_HANDLER')]) ? $_GET[C('VAR_JSONP_HANDLER')] : C('DEFAULT_JSONP_HANDLER');
                exit($handler.'('.json_encode($data).');');  
            case 'EVAL' :
                // 返回可执行的js脚本
                header('Content-Type:text/html; charset=utf-8');
                exit($data);            
        }
    }
//    /**
//     * Enter 输出结果，同时会判断返回的code
//     * tags
//     * @param unknowtype
//     * @return string
//     * @version v1.0.0
//     */
//    public function response($success=0, $error_msg='',$is_object=false,$result = array())
//    {
//
//        if($success ==0 ){
//            $result['status']['succeed']='1';
//        }else{
//            $result['status']['succeed']	='0';
//            $result['status']['error_code']	=$success;
//            $result['status']['error_desc'] =$error_msg?$error_msg:$this->getErrorMsg($success);
//        }
//        //error_log(date('Y-m-d H:i:s')."数据开始发送：\n",3,'log.txt');
//        header("Access-Control-Allow-Origin:*");
//        header("Content-type: text/html; charset=utf-8");
//        header('Content-type : application/json');
//        if ($is_object) {
//            echo json_encode($result, JSON_FORCE_OBJECT);
//            exit;
//        } else {
//            echo json_encode($result);
//            exit;
//        }
//    }
//    /**
//     * Enter description here ...
//     * tags
//     * @param unknowtype
//     * @return return_type
//     * @version v1.0.0
//     */
//    private function getErrorMsg($success=0){
////        @include(APPPATH.'config/http_status.php');
//        return isset($http_status[$success])?$http_status[$success]:'未知错误';
//
//    }

    /**
     * Action跳转(URL重定向） 支持指定模块和延时跳转
     * @access protected
     * @param string $url 跳转的URL表达式
     * @param array $params 其它URL参数
     * @param integer $delay 延时跳转的时间 单位为秒
     * @param string $msg 跳转提示信息
     * @return void
     */
    protected function redirect($url,$params=array(),$delay=0,$msg='') {
        $url    =   U($url,$params);
        redirect($url,$delay,$msg);
    }

}