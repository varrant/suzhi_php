<?php
namespace Juym_admin\Controller;
use Think\Controller;
class SuController extends Controller {
   function  index(){
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

    /**
     *
     * 导出Excel
     */
    function expUser(){//导出Excel
      
        $xlsName  = "User";
        $xlsCell  = array(
        array('id','账号序列'),
        array('pid','pid'),
        array('zname','名字'),
        array('sex','性别'),
        );
        $xlsModel = M('price');

        $xlsData  = $xlsModel->Field('id')->select();
        
        foreach ($xlsData as $k => $v)
        {
           
            $xlsData[$k]['sex']=$v['sex']==1?'男':'女';
        }
        // var_dump($xlsData);
        ob_clean();
        $this->exportExcel($xlsName,$xlsCell,$xlsData);
            
    }
    /**
     *
     * 显示导入页面 ...
     */

    /**实现导入excel
     **/
    function impUser(){
		if (!empty($_FILES)) {
			 $upload = new \Think\Upload();// 实例化上传类  
             $upload->maxSize   =     3145728 ;// 设置附件上传大小    
             $upload->exts      =    array('xlsx','xls');// 设置附件上传类型    
             $upload->savePath  =     ""; // 设置附件上传目录    // 上传单个文件
             $info   =   $upload->uploadOne($_FILES['import']);    
             if(!$info) {// 上传错误提示错误信息        
             $this->error($upload->getError());
             }else{// 上传成功 获取上传文件信息         
             // echo $info['savepath'].$info['savename'];  

             }
			vendor("PHPExcel.PHPExcel");
			$file_name="./uploads/".$info['savepath'].$info['savename'];
			$objReader =  \ PHPExcel_IOFactory::createReader('Excel5');
			$objPHPExcel = $objReader->load($file_name,$encode='utf-8');
			$sheet = $objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow(); // 取得总行数
			$highestColumn = $sheet->getHighestColumn(); // 取得总列数
            
			for($i=2;$i<=$highestRow;$i++)
			{
	
				$data['WXAName'] = $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();
				$data['WXSex'] = $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
				//修改性别;
				if($data['WXSex']=="公"){
					$data['WXSex']=1;
				}elseif ($data['WXSex']=="母") {
					$data['WXSex']=2;
				}else{
					$data['WXSex']="";
				}
				
				$data['WXBirthday']= $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();
                $shared = new \PHPExcel_Shared_Date();
                $shared ->ExcelToPHP($data['WXBirthday']);
                $date3=date('Y-m-d',$shared ->ExcelToPHP($data['WXBirthday']));
                $data['WXBirthday']= $date3;
				$data['WXNickName']= $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();
				$data['WXAPhone']= $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();
				$data['WXNum']= $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();
				$data['WXPinzhong']= $objPHPExcel->getActiveSheet()->getCell("G".$i)->getValue();
				$data['cwxp']= $objPHPExcel->getActiveSheet()->getCell("H".$i)->getValue();
				//查出省的id
				$db_pro=M('province');
				$map_pro['name']=$objPHPExcel->getActiveSheet()->getCell("I".$i)->getValue();
				$d_p=$db_pro->where($map_pro)->select();
				$data['WX_promaryInfo']= $d_p[0]['id'];
				//查出城市id;
				$db_city=M('city');
				$map_city['name']=$objPHPExcel->getActiveSheet()->getCell("J".$i)->getValue();
				$d=$db_city->where($map_city)->select();
				$data['WX_CityInfo']= $d[0]['id'];
				$data['WXAddress']= $objPHPExcel->getActiveSheet()->getCell("K".$i)->getValue();
				$data['ddbh_re']= $objPHPExcel->getActiveSheet()->getCell("L".$i)->getValue();
				M('r')->add($data);
				//第二张表
				$data_price['ddbh']=$objPHPExcel->getActiveSheet()->getCell("L".$i)->getValue();
				$data_price['status']=1;
				$data_price['Table_p']=6;
				$data_price['adminid']=59;
				M('p')->add($data_price);
			}
			$this->success('导入成功！');
		}else
		{
			$this->error("请选择上传的文件");
		}
			

	}
   
}