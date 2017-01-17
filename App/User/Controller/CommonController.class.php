<?php
namespace Home\Controller;

use Think\Controller;

Class CommonController extends Controller
{
    Public function _initialize()
    {
        // var_dump($_SESSION);
        // var_dump($_COOKIE);
        $phone = $_COOKIE['pohone'] ? $_COOKIE['pohone'] : $_SESSION['pohone'];
        if (!$phone) {
            $this->redirect("Home/Login/index");
        }


    }

}