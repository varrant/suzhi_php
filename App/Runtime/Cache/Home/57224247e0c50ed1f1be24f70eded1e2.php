<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js fixed-layout">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VIPETA宠物健康管理系统</title>
  <script type="text/javascript" src="/Public/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="/Public/layer/layer.js"></script>
  <script src="/Public/uploadifive/jquery.uploadifive.min.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="/Public/uploadifive/uploadifive.css">
</head>


<style type="text/css">
.uploadifive-button {
  float: left;
  margin-right: 10px;
}
#queue {
  margin-top: 20px;
  border: 1px solid #E5E5E5;
  height: 107px;
  overflow: auto;
  margin-bottom: 10px;
  padding: 0 3px 3px;
  width: 250px;

}
</style>

<body>
    <form  id="form_1" action="<?php echo U('Register/re3');?>" method="post"  >
   			 	<input  type="hidden" value="<?php echo ($phone); ?>"  name="phone">
          姓名 <input  type="text" id="HeName"  name="HeName">
          身份证号码 <input  type="text" id="Hecardid" name="Hecardid">

           <div id="upimg">
          <div class="am-form-group">
            <label for="user-name" class="am-u-sm-3 am-form-label">图片上传</label>
              <div class="am-u-sm-9">
               <input id="file_upload" name="file_upload" type="file" multiple="true">
                <a style="position: relative; top: 8px;" href="javascript:$('#file_upload').uploadifive('upload')">上传文件</a> 
            <div style="clear:both;"></div>
              <div id="queue"></div>
             </div>
          </div>
          <div id="both" style="width:200px">

          </div>

          <button id="Sub" type="button"   >确定</button>
    </form>
</body>
<script type="text/javascript">
/**/
$(document).ready(function(){ 
　	$('#file_upload').uploadifive({
        'auto'             : false,
        'formData'         : {
                     'timestamp' : '<?php echo $timestamp;?>',
                     'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
                             },
        'queueID'          : 'queue',
        'uploadLimit'      : 1,
        'uploadScript'     : "<?php echo U('Register/doPhoto');?>",
        'onUploadComplete' : function(file, data) {
           	$('#both').append("<div class='add'><img  class='img1' width=100px src='/upimg/lt/"+data+"' ><img class='ico'  src='/Public/img/ywrong.png'><input type='hidden' name='img[]' value="+data+"></div>");
           		/*点击删除上传图片*/
           		$(".ico").unbind("click");
           		$(".ico").click(function(){
			   		var objo=$(this).prev();
			   		var img=$(this).prev(".img1").attr('src')
			    	var url ="<?php echo U('Register/delimg');?>";
			    	$.ajax({
					        type:"post",
					        url:url,
					        data:{'img':img},
					        dataType:"json",
					        success:function(data){
					        	if(data=="ok"){
					        		 $(objo).parent('.add').remove();
					        	}
			             	}
			        });
				});
       		} 
    });
	/*提交手机号码身份证图片*/
	$("#Sub").click(function(){
		$("#Sub").attr('disabled',true);
		$("#form_1").submit();

	})

}); 	

</script>
<html>