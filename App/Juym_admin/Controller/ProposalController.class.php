<?php
namespace Juym_admin\Controller;
use Think\Controller;
class ProposalController extends Controller {

    function lists(){

    	$db=M('proposal');
    	$data=$db->select();
    	// var_dump(111111);
    	// var_dump($data);
    	// var_dump($db->getLastSql());
        $count =count($data);    
        $Page = new \Think\Page($count,10);
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('theme', "%UP_PAGE% %FIRST% %END% %LINK_PAGE% %DOWN_PAGE% %TOTAL_ROW%");
        $show = $Page->show();// 分页显示输出
        $row_page=substr($show,-1);

        $show=substr($show,0,strlen($show)-1); 
        $list = $db->limit($Page->firstRow.','.$Page->listRows)->select(); // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
      
        $this->row_page=$row_page;
        $this->assign('data',$data);// 赋值数据集   
        
       
        $this->assign('page',$show);// 赋值分页输出 $this->display(); // 输出模板

       

        $this->display();
    }

 
}
