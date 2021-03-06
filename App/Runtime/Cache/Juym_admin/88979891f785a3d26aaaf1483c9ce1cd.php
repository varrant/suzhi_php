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
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav4'}"><span class="am-icon-columns"></span>求职者管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub " id="collapse-nav4">
              <li><a href="<?php echo U('Head/qz_lists');?>" class="am-cf"><span class="am-icon-slideshare"></span>求职者列表<span class="am-icon-star am-fr am-margin-right "></span></a></li>
          </ul>
      </li>

      <!--<li class="admin-parent">-->
        <!--<a class="am-cf" data-am-collapse="{target: '#collapse-nav0'}"><span class="am-icon-columns"></span> 企业管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>-->
        <!--<ul class="am-list am-collapse admin-sidebar-sub " id="collapse-nav0">-->
          <!--<li><a href="<?php echo U('Com/lists');?>" class="am-cf"><span class="am-icon-slideshare"></span>企业列表<span class="am-icon-star am-fr am-margin-right "></span></a></li>-->
        <!--</ul>-->
      <!--</li>-->

      <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav5'}"><span class="am-icon-columns"></span>订单中心<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub " id="collapse-nav5">
              <li><a href="<?php echo U('Order/receive_list');?>" class="am-cf"><span class="am-icon-slideshare"></span>已领取<span class="am-icon-star am-fr am-margin-right "></span></a></li>
              <li><a href="<?php echo U('Order/enlist_list');?>" class="am-cf"><span class="am-icon-slideshare"></span>工作报名<span class="am-icon-star am-fr am-margin-right "></span></a></li>
          </ul>
      </li>
      <!--<li class="admin-parent">-->
        <!--<a class="am-cf" data-am-collapse="{target: '#collapse-nav1'}"><span class="am-icon-users"></span>管理员管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>-->
        <!--<ul class="am-list am-collapse admin-sidebar-sub " id="collapse-nav1">-->
          <!--<li><a href="<?php echo U('Admin/Index');?>" class="am-cf"><span class="am-icon-child"></span>管理员列表<span class="am-icon-star am-fr am-margin-right "></span></a></li>-->
        <!--</ul>-->
      <!--</li>-->

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
        <hr/>
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
            </div>
            <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                <?php if(is_array($data)): foreach($data as $key=>$v): ?><div class="am-form am-form-horizontal" >
                    <input type="hidden" id="he_id" value="<?php echo ($v['he_id']); ?>">
                    <div class="am-form-group">
                        <div id="upimg">
                            <label for="user-name" class="am-u-sm-3 am-form-label">头像</label>
                            <div class="am-u-sm-9">
                                <input id="work" name="file_upload" type="file" multiple="true">
                                <img src="<?php echo ($v['he_image']); ?>" id="work_image" style="width: 130px;height: 130px;margin-top: 15px;">
                            </div>
                        </div>
                    </div>
                    <div class="am-form-group" >
                        <label for="user-email" class="am-u-sm-3 am-form-label">手机号</label>
                        <div class="am-u-sm-9">
                            <input type="text" value ="<?php echo ($v['he_phone']); ?>" id="he_phone" placeholder="请输入手机号" style="width:52%"/>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">昵称</label>
                        <div class="am-u-sm-9">
                            <input type="text" value ="<?php echo ($v['he_nickname']); ?>" id="he_nickname" placeholder="请输入昵称" style="width:52%"/>

                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">姓名</label>
                        <div class="am-u-sm-9">
                            <input type="text" value ="<?php echo ($v['he_name']); ?>" id="he_name" placeholder="请输入姓名" style="width:52%"/>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">性别</label>
                        <div class="am-u-sm-9">
                            <select id="he_sex" class="" name="posjoptype" style="width:52%">
                                <?php
 if($v['he_sex'] == '0'){ echo "<option value='2'>请选择性别</option>"; echo "<option value='0' selected='selected'>男</option>"; echo "<option value='1' >女</option>"; }elseif($v['he_sex'] == '1'){ echo "<option value='2'>请选择性别</option>"; echo "<option value='0' >男</option>"; echo "<option value='1' selected='selected'>女</option>"; }else{ echo "<option value='2' selected='selected'>请选择性别</option>"; echo "<option value='0' >男</option>"; echo "<option value='1' >女</option>"; } ?>
                            </select>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">身份证号</label>
                        <div class="am-u-sm-9">
                            <input type="text" value ="<?php echo ($v['he_carid']); ?>" id="he_carid"  placeholder="请输入身份证号" style="width:52%"/>

                        </div>
                    </div>

                    <div class="am-form-group">
                        <div id="upimgs">
                            <label for="user-name" class="am-u-sm-3 am-form-label">身份证照片</label>
                            <div class="am-u-sm-9">
                                <input id="works" name="file_upload" type="file" multiple="true">
                                <img src="<?php echo ($v['he_idimg']); ?>" id="work_images" style="width: 130px;height: 130px;margin-top: 15px;">
                            </div>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">生日</label>
                        <div class="am-u-sm-9">
                            <input type="text" value ="<?php echo ($v['he_birthday']); ?>" id="he_birthday" placeholder="请输入生日" style="width:52%"/>

                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">职业</label>
                        <div class="am-u-sm-9">
                            <input type="text" value ="<?php echo ($v['he_occupation']); ?>" id="he_occupation" placeholder="请输入职业" style="width:52%"/>

                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">学历</label>
                        <div class="am-u-sm-9">
                            <input type="text" value ="<?php echo ($v['he_education']); ?>" id="he_education" placeholder="请输入学历" style="width:52%"/>

                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">毕业学校</label>
                        <div class="am-u-sm-9">
                            <input type="text" value ="<?php echo ($v['he_shcool']); ?>" id="he_shcool" placeholder="请输入毕业学校" style="width:52%"/>

                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">专业</label>
                        <div class="am-u-sm-9">
                            <input type="text" value ="<?php echo ($v['he_major']); ?>" id="he_major" placeholder="请输入专业" style="width:52%"/>

                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">入学年份</label>
                        <div class="am-u-sm-9">
                            <input type="text" value ="<?php echo ($v['he_grade']); ?>" id="he_grade" placeholder="请输入入学年份" style="width:52%"/>

                        </div>
                    </div>
                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="button" onclick="baocun()" class="am-btn am-btn-primary">保存</button>
                            <button type="button" onclick="history.go(-1)" class="am-btn am-btn-primary">取消</button>
                        </div>

                    </div>
                </div><?php endforeach; endif; ?>
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

    <script src="/Public/myjs/UploadPic.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            upload("work", "work_image"); //上传头像
            upload("works", "work_images"); //上传证件合影
        });
        /*
         * id file input的id
         * thumb 缩略图id
         */
        function upload(id, thumb) {
            //上传证书
            var u = new UploadPic();
            u.init({
                input: document.getElementById(id),
                callback: function(base64, fileType) {
                    console.log(base64);
                    $("#" + thumb).attr("src", base64);
                    $("#" + thumb).attr("filetype", fileType);
                },
                loading: function() {
                    //say_error("等待上传...");
                }
            });
        }
        function baocun(){
            //获取ID
            var he_id=$('#he_id').val();
            //获取头像
            var he_image =$('#work_image').attr('src');
            var he_phone = $('#he_phone').val();
            var he_nickname=$('#he_nickname').val();
            var he_name=$('#he_name').val();
            var he_sex =$('#he_sex').val();
            var he_carid=$('#he_carid').val();
            var he_idimg=$('#work_images').attr('src');
            var he_birthday=$('#he_birthday').val();
            var he_occupation=$('#he_occupation').val();
            var he_education=$('#he_education').val();
            var he_shcool=$('#he_shcool').val();
            var he_major=$('#he_major').val();
            var he_grade=$('#he_grade').val();


            if(he_sex =="2" ){
                alert('请选择性别');
                return;
            }
            if(he_idimg =="" || he_idimg == null ){
                alert('身份证照不能为空');
                return;
            }



            var data={'he_id':he_id,'he_image':he_image,'he_phone':he_phone,'he_nickname':he_nickname,'he_name':he_name,'he_sex':he_sex,'he_carid':he_carid,'he_idimg':he_idimg,'he_birthday':he_birthday,'he_occupation':he_occupation,'he_education':he_education,'he_shcool':he_shcool,'he_major':he_major,'he_grade':he_grade};

            $.ajax({
                url:"<?php echo U('head/doview');?>",
                data:data,
                type:'post',
                dataType:"json",
                success:function(data){
                    if(data.status){
                        alert('保存成功');
                        window.location="<?php echo U('head/lists');?>";
                    }else{
                        alert(data.message);
                    }
                }
            });
        }
    </script>