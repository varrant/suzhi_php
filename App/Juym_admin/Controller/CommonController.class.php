<?php
	namespace Juym_admin\Controller;
        use Think\Controller;	  
	Class CommonController extends Controller{


		Public function _initialize(){
			//$this->redirect(('Juym_admin/Login/index'));exit;

			//$this->redirect();
			$ad_id=$_SESSION['ad_id'];
			$ad_username=$_SESSION['ad_username'];
			if($ad_username == 'zengling' || $ad_username == 'fenghao' || $ad_username == 'admin'){

				//$this->redirect(('/Juym_admin/Poscha/lists'));
			}else{
				$this->redirect(('/Juym_admin/Login/index'));
				exit;
			}

	}
		
}