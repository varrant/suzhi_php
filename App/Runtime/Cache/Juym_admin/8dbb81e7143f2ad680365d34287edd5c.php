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
          <li><a href="<?php echo U('Poscha/xxx.html');?>" class="am-cf"><span class="am-icon-slideshare"></span>实习列表<span class="am-icon-star am-fr am-margin-right "></span></a></li>
          <li><a href="<?php echo U('Poscha/xx.html');?>" class="am-cf"><span class="am-icon-slideshare"></span>全职列表<span class="am-icon-star am-fr am-margin-right "></span></a></li>
        </ul>
      </li>
      
      <li class="admin-parent">
        <a class="am-cf" data-am-collapse="{target: '#collapse-nav0'}"><span class="am-icon-columns"></span> 企业管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
        <ul class="am-list am-collapse admin-sidebar-sub " id="collapse-nav0">
          <li><a href="<?php echo U('Com/lists');?>" class="am-cf"><span class="am-icon-slideshare"></span>企业列表<span class="am-icon-star am-fr am-margin-right "></span></a></li>
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
  <!-- content start -->
    <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">兼职类型添加</strong> / <small>Administrator add</small></div>
      </div>
      <hr/>
      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        </div>
        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
          <form class="am-form am-form-horizontal" id="from_job" action="<?php echo U('Optiment/doeidtjlist');?>" method="post">
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">名称</label>
              <div class="am-u-sm-9">
                <input type="text" id="PosName" name="PosName" value="<?php echo ($data[0]['pos_name']); ?>" placeholder="输入名称" required/>
                <small></small>
              </div>
            </div>
            <div class="am-form-group">
              <label for="user-email" class="am-u-sm-3 am-form-label">排序</label>
              <div class="am-u-sm-9">
                <input type="text" name="Possort" id="Possort" value="<?php echo ($data[0]['pos_sort']); ?>" placeholder="请输入排序" required/>
                <input type="hidden" name="Posjoptype" id="Posjoptype" value="<?php echo ($data[0]['pos_joptype']); ?>">
                <input type="hidden" name="Posid" value="<?php echo ($data[0]['pos_id']); ?>">
                <small></small>
              </div>
            </div>
             <div class="am-form-group">
              <label for="user-email" class="am-u-sm-3 am-form-label">是否热搜</label>
              <div class="am-u-sm-9">
               <select data-am-selected name="Poshot" id=Poshot>
                <option value="">请选着</option>
                <option value="0" <?php if($data[0]['pos_hot'] == 0 ): ?>selected<?php else: endif; ?>>是</option>
                <option value="1" <?php if($data[0]['pos_hot'] == 1 ): ?>selected<?php else: endif; ?>>否</option>
              </select>
              </div>
            </div>
            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
                <button type="button" id="but_job"  class="am-btn am-btn-primary">修改全职类型</button>
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
  $('#but_job').click(function (e) { 
      var url = $("#from_job").attr('action');
      var t_url ="<?php echo U('Optiment/qzlist');?>";
      var dot =1;
      if($('#PosName').val()==""){
            dot=0;
            alert('先写名称');
            return false;
      }
       if($('#Poshot').val()==""){
            dot=0;
            alert('选着是否热搜');
            return false;
      }
        if(dot==1 ){
          $.ajax({
              type:"post",
              url:url,
              data:$("#from_job").serialize(),
              dataType:"json",              
              success:function(data){
                  if (data=="ok") {
                    dialog.success("修该成功",t_url);
                    return false;
                  }
                  if(data=="no"){
                    dialog.error("修改失败");
                    return false;
                  }    
              }
          }); 
        }       
  });

</script>