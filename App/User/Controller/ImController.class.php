<?php
namespace Home\Controller;
use Think\Controller;
class ImController extends Controller {
   public function index(){
 
   		var_dump(import("Org.Util.Im1"));
   		var_dump(import("Org.Util.Im2"));
   		$result = sendTemplateSMS("13606520694" ,array('6532','5'),"117318");	
   }
}