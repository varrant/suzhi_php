<?php
namespace Juym_admin\Controller;
use Think\Controller;
class PabxController extends CommonController {

  
         public function _initialize() { 
           parent::_initialize();
          
   
          if(!$_COOKIE['id']){

                $_COOKIE['id'];
          }
        
          $id=$_COOKIE['id'];
         
          $map['id']=$id;
          //判断是否一级管理员
          $db=M('admin');
            
           $type=$db->where($map)->field('type')->select();
             //var_dump($type);die;
              if(!(($type[0]['type']==1)or($type[0]['type']==4))){
               
                $this->redirect("Juym_admin/index/index");   
              }
              
           
          }
          //表单列表
         public function bxlist(){
              $db=M('pabx');
              $data=$db->select();
              $count = $db->count();     
              $Page = new \Think\Page($count,10);
              $Page->setConfig('prev', '上一页');
              $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
              $show = $Page->show();// 分页显示输出
              $row_page=substr($show,-1);
              $show=substr($show,0,strlen($show)-2);
             $data=$db->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
              // var_dump($data);
              $this->row_page=$count;
   
            $this->assign('data',$data);// 赋值数据集  
            // var_dump($show);
            $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板
            $this->data=$data;

                      $this->display();
         }

       public function exportExcel($expTitle,$expCellName,$expTableData){
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $_SESSION['account'].date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);

        vendor("PHPExcel.PHPExcel");
            
        $objPHPExcel =  new \ PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }
        
        Header('content-Type:application/vnd.ms-excel;charset=utf-8');
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \ PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

         public function excl(){
            $kaishisj=strtotime(I('kaishirq'));
            
            $jieshurq=strtotime(I('jieshurq'));
            
            $db=M('pabx');
            $map['patime']  = array('between'," $kaishisj, $jieshurq");
            $xlsName  = "User";
            $xlsCell  = array(
            array('id','id'),
            array('cwname','主人名字'),
            array('userid','身份证号码'),
            array('iphone','手机号码'),
            array('cwxp','芯片号'),
            array('patime','激活时间')
            );
           
            $xlsData  = $db->where($map)->Field('id,cwname,userid,iphone,cwxp,patime')->select();
            
            foreach ($xlsData as $k => $v)
            {
                $xlsData[$k]['id']=$v['id'];
                $xlsData[$k]['cwname']=$v['cwname'];
                $xlsData[$k]['userid']=$v['userid'];
                $xlsData[$k]['cwxp']=$v['cwxp'];
                $xlsData[$k]['patime']=date("Y-m-d H:i:s",$v['patime']);
                

            }
            
            ob_clean();
            $this->exportExcel($xlsName,$xlsCell,$xlsData);
            
            }
            //修改提交上报险信息
         function eidbxlist(){
         	$db=M("pabx");
         	$id=I('id');
         	$map['id']=$id;
         	$data=$db->where($map)->select();
         	$this->data=$data;
         	$this->display();
         }
         function doeidbxlist(){
         	$map["id"]=I("id");
         	$data['cwname']=I('cwname');
         	$data['userid']=I('userid');
         	$data['iphone']=I('iphone');
         	$data['cwxp']=I('cwxp');
         	$db=M('pabx');
         	$db->where($map)->save($data);
         	$this->ajaxReturn('ok');
         	

         }
         //删除平安保险
         function delbxlist(){ 
            $id=I('id');
            $map['id']=$id;
            $db=M('pabx');
            $do=$db->where($map)->delete();
            if(!$do==false){
                  $this->ajaxReturn("del_ok");
            }else{
                  $this->ajaxReturn("del_no") ;  
            }
         }
         //体检报告
         function tijianbaogao(){
          var_dump($_GET);
          $db=M('regbuy');
          $map['a.cwxp']=I('id');
          $data=$db
              ->alias('a')->join('think_price as b ON a.ddbh_re=b.ddbh')
              ->where($map)
              ->field('a.WXAName,a.WXNickName,a.WXSex,a.WXPinzhong,b.time,b.id,a.WXage,b.tox,b.leptospira,b.cper,b.hot,b.ascaris,b.tiny,b.nematode,b.ccoccidiosis,b.trichomonad,b.egg,a.WXlb,a.WXBirthday,b.id as bid, a.cwxp')
              ->select();
          $this->data=$data;
          $this->display();
         }
      
}