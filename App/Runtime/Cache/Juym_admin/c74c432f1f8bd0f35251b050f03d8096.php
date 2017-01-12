<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js fixed-layout">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>速职</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="/Public/assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="/Public/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="/Public/assets/css/admin.css">
  <link rel="stylesheet" href="/Public/mycss/my.css">
  <script type="text/javascript" src="/Public/assets/js/jquery.min.js"></script>
  <script src="/Public/uploadifive/jquery.uploadifive.min.js" type="text/javascript"></script>
   <link rel="stylesheet" type="text/css" href="/Public/uploadifive/uploadifive.css">
  <script type="text/javascript" src="/Public/layer/layer.js"></script>
  <script charset="utf-8" src="/Public/kindeditor/kindeditor-all.js"></script>
  <script charset="utf-8" src="/Public/kindeditor/lang/zh-CN.js"></script>
  <script>
          var editor1;

        KindEditor.ready(function(K) {
          editor1 = K.create('textarea[name="content"]', {
            width : '100%',
            height : '500px',
            allowFileManager : true,
            afterCreate : function() {
              var self = this;
              K.ctrl(document, 13, function() {
                self.sync();
                K('form')[0].submit();
              });
              K.ctrl(self.edit.doc, 13, function() {
                self.sync();
                K('form')[0].submit();
              });
              
           }

        });

    });



          var editor2;
     KindEditor.ready(function(K) {
          editor2 = K.create('textarea[name="content1"]', {
            width : '100%',
            height : '500px',
            allowFileManager : true,
            afterCreate : function() {
              var self = this;
              K.ctrl(document, 13, function() {
                self.sync();
                K('form')[0].submit();
              });
              K.ctrl(self.edit.doc, 13, function() {
                self.sync();
                K('form')[0].submit();
              });
              
           }

        });

    });
        

  </script>


</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand">
    <strong>速职</strong> <small>后台管理</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
     
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> <?php if($s_name != null): echo ($s_name); ?> <?php else: echo ($c_name); endif; ?><span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
         
          <li><a href="<?php echo U('Login/outLogin');?>"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href=""><span class="am-icon-home"></span> 首页</a></li>

        
      <li class="admin-parent">
        <a class="am-cf" data-am-collapse="{target: '#collapse-nav2'}"><span class="am-icon-columns"></span> 任务管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
        <ul class="am-list am-collapse admin-sidebar-sub " id="collapse-nav2">
          <li><a href="<?php echo U('Poscha/lists');?>" class="am-cf"><span class="am-icon-slideshare"></span>兼职列表<span class="am-icon-star am-fr am-margin-right "></span></a></li>
          <li><a href="<?php echo U('Poscha/lists_s');?>" class="am-cf"><span class="am-icon-slideshare"></span>实习列表<span class="am-icon-star am-fr am-margin-right "></span></a></li>
          <li><a href="<?php echo U('Poscha/lists_q');?>" class="am-cf"><span class="am-icon-slideshare"></span>全职列表<span class="am-icon-star am-fr am-margin-right "></span></a></li>
        </ul>
      </li>

      <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav3'}"><span class="am-icon-columns"></span> 猎头管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub " id="collapse-nav3">
              <li><a href="<?php echo U('Head/lists');?>" class="am-cf"><span class="am-icon-slideshare"></span>猎头列表<span class="am-icon-star am-fr am-margin-right "></span></a></li>
          </ul>
      </li>

      <li class="admin-parent">
        <a class="am-cf" data-am-collapse="{target: '#collapse-nav0'}"><span class="am-icon-columns"></span> 企业管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
        <ul class="am-list am-collapse admin-sidebar-sub " id="collapse-nav0">
          <li><a href="<?php echo U('Com/lists');?>" class="am-cf"><span class="am-icon-slideshare"></span>企业列表<span class="am-icon-star am-fr am-margin-right "></span></a></li>
        </ul>
      </li>

      <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav4'}"><span class="am-icon-columns"></span>订单中心<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub " id="collapse-nav4">
              <li><a href="<?php echo U('Order/receive_list');?>" class="am-cf"><span class="am-icon-slideshare"></span>已领取<span class="am-icon-star am-fr am-margin-right "></span></a></li>
          </ul>
      </li>
      <li class="admin-parent">
        <a class="am-cf" data-am-collapse="{target: '#collapse-nav1'}"><span class="am-icon-users"></span>管理员管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
        <ul class="am-list am-collapse admin-sidebar-sub " id="collapse-nav1">
          <li><a href="<?php echo U('Admin/Index');?>" class="am-cf"><span class="am-icon-child"></span>管理员列表<span class="am-icon-star am-fr am-margin-right "></span></a></li>
        </ul>
      </li>

       <li class="admin-parent">
        <a class="am-cf" data-am-collapse="{target: '#collapse-nav21'}"><span class="am-icon-users"></span>选项管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
        <ul class="am-list am-collapse admin-sidebar-sub " id="collapse-nav21">
          <li><a href="<?php echo U('Optiment/tjlist',array('id'=>0));?>" class="am-cf"><span class="am-icon-child"></span>兼职类型<span class="am-icon-star am-fr am-margin-right "></span></a></li>
          <li><a href="<?php echo U('Optiment/sxlist',array('id'=>1));?>" class="am-cf"><span class="am-icon-child"></span>实习类型<span class="am-icon-star am-fr am-margin-right "></span></a></li>
           <li><a href="<?php echo U('Optiment/qzlist',array('id'=>2));?>" class="am-cf"><span class="am-icon-child"></span>全职类型<span class="am-icon-star am-fr am-margin-right "></span></a></li>
             <li><a href="<?php echo U('Optiment/qylist');?>" class="am-cf"><span class="am-icon-child"></span>区域类型<span class="am-icon-star am-fr am-margin-right "></span></a></li>
        </ul>
      </li>
	<!-- 轮播图管理 -->
       <li class="admin-parent">
        <a class="am-cf" data-am-collapse="{target: '#collapse-nav22'}"><span class="am-icon-columns"></span> 轮播图管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
        <ul class="am-list am-collapse admin-sidebar-sub " id="collapse-nav22">
          <li><a href="<?php echo U('Rotmap/lists');?>" class="am-cf"><span class="am-icon-slideshare"></span>轮播图列表<span class="am-icon-star am-fr am-margin-right "></span></a></li>
        </ul>
      </li>
		<!-- 轮播图管理end -->
      </ul>
    </div>
  </div>

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

  <!-- content start -->
    <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg"><?php echo ($zname); ?></strong> / <small>子栏目添加</small></div>
      </div>

      <hr/>

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        </div>
        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
          <form class="am-form am-form-horizontal" id="form1" action="<?php echo U('Column/doaddcolumn');?>" action1="<?php echo U('Column/columnlist');?>" method="post">

            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">图片上传</label>
                <div class="am-u-sm-9">
                 <input id="file_upload" name="file_upload" type="file" multiple="true">
                  <a style="position: relative; top: 8px;" href="javascript:$('#file_upload').uploadifive('upload')">上传文件</a> 
              <div style="clear:both;"></div>
                <div id="queue"></div>
               </div>
            </div>
              <div style="clear:both;"></div>
            <div id="both"></div>
            <div style="clear:both;"></div>

            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">子栏目名字/Cate</label>
              <div class="am-u-sm-9">
                <input type="text" style="width:400px" id="name" name="Zname" placeholder="请输入栏目名字" required/>
                <small></small>
              </div>
            </div>

          <div class="am-form-group">
            <label for="user-name" class="am-u-sm-3 am-form-label">型号/model</label>
              <div class="am-u-sm-9">
                <input type="text" style="width:400px" id="name" name="model" placeholder="请输入型号" required/>
                <small></small>
             </div>
          </div>

        <div class="am-form-group">
          <label for="user-name" class="am-u-sm-3 am-form-label">性能/performance</label>
            <div class="am-u-sm-9">
              <textarea style="width:400px;height:120px" id="name" name="performance" placeholder="性能描素" required/></textarea>
              <small></small>
           </div>
        </div>

      
        
          <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">描述/describe</label>
            <div class="am-u-sm-9">
              <textarea  id="editor_id" name="PayContent"  name="catedesc"  placeholder="简单描素"   style="width:300px;height:600px;"> <?php echo ($data[0]['catedesc']); ?>  </textarea>
            </div>
          </div>
            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
                <button type="button" id="button_a"  class="am-btn am-btn-primary">添加</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

<!--  底脚 -->

    <footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
    </footer>

  </div>
  <!-- content end -->
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->

<!--<![endif]-->
<script src="/Public/assets/js/amazeui.min.js"></script>
<script src="/Public/assets/js/app.js"></script>
<script type="text/javascript" src="/Public/myjs/my.js"></script>
</body>
</html>

<script type="text/javascript">
    <?php $timestamp = time();?>
    $(function() {
      $('#file_upload').uploadifive({
        'auto'             : false,
        'checkScript'      : '<?php echo U('Upimg/checkexists');?>',
        'formData'         : {
        'timestamp' : '<?php echo $timestamp;?>',
        'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
                             },
        'queueID'          : 'queue',
        'uploadScript'     : "<?php echo U('Upimg/doPhoto');?>",
        'onUploadComplete' : function(file, data) {
         //console.log(data);
        //alert(data);
         //console.log(file);
         //var url =data;
         console.log(data);
         
           $('#both').append("<div class='add'><img  class='img1' src='/uploads/"+data+"'><img class='ico' src='/Public/img/ywrong.png'><input type='hidden' name='img[]' value="+data+"></div>");

             //鼠标经过图片显示小图片
          $(".add").unbind("mouseover");
          $(".add").bind("mouseover",function(){
             $(this).find(".ico").css("display","block");
          });


           //鼠标离开图片不显示显示小图片
          $(".add").unbind("mouseout");
          $(".add").bind("mouseout",function(){
             $(this).find(".ico").css("display","none");

          });
          $(".ico").unbind("click");
          $(".ico").bind('click', function(){

             $(this).parent('.add').remove();
            var img=$(this).prev(".img1").attr('src');
            var url='<?php echo U('Properties/delImgw');?>';
          
            $.ajax({
                  type:"post",
                  url:url,
                  data:{ 'h':img},
                  dataType:"json",
                  
                  success:function(data1){
                    
                            
                    $('.div_tu').css("display","none");                   
          
                  }
      
      
                })


        });



          }

         
      });

    });
      

 

  </script>