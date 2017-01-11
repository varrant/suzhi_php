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

        <hr/>

        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
            </div>
            <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                <?php if(is_array($data)): foreach($data as $key=>$v): ?><div class="am-form am-form-horizontal" >
                    <input type="hidden" id="pos_id" value="<?php echo ($v['pos_id']); ?>">
                    <div class="am-form-group">
                        <div id="upimg">
                            <label for="user-name" class="am-u-sm-3 am-form-label">任务照片</label>
                            <div class="am-u-sm-9">
                                <input id="work" name="file_upload" type="file" multiple="true">
                                <img src="<?php echo ($v['pos_img']); ?>" id="work_image" style="width: 130px;height: 130px;margin-top: 15px;">
                                <!--<div style="clear:both;"></div>-->
                                <!--<div id="queue"></div>-->
                                <!--</div>-->
                                <!--<div id="both" style="width:200px">-->

                            </div>
                        </div>
                    </div>


                    <div class="am-form-group" >
                        <label for="user-email" class="am-u-sm-3 am-form-label">任务名称</label>
                        <div class="am-u-sm-9">
                            <input type="text" value ="<?php echo ($v['pos_name']); ?>" id="pos_name" placeholder="请输入任务名称" style="width:52%"/>

                        </div>
                    </div>
                    <!--<div class="am-form-group">-->
                    <!--<label for="user-email" class="am-u-sm-3 am-form-label">所属公司</label>-->
                    <!--<div class="am-u-sm-9">-->
                    <!--<input type="" name="comangel" id="comangel" placeholder="" />-->
                    <!--&lt;!&ndash; <select id="comangel" class="" name="comangel">-->
                    <!--<option value="未融资">未融资</option>-->
                    <!--<option value="天使轮">天使轮</option>-->
                    <!---->
                    <!--</select> &ndash;&gt;-->
                    <!--</div>-->
                    <!--</div>-->

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">需求人数</label>
                        <div class="am-u-sm-9">
                            <input type="number" value ="<?php echo ($v['pos_recruitmun']); ?>" id="pos_recruitmun" placeholder="请输入需求人数" style="width:52%"/>

                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">区域</label>
                        <div class="am-u-sm-9">
                            <!-- <input type="" name="comangel" id="comangel" placeholder="" /> -->
                            <select id="pos_county" class="" name="posjoptype" style="width:52%">
                                <option value="0">请选择区域</option>
                                <?php
 $posdb=M('pos'); $map['pos_joptype']=3; $map['pos_is_delete']=1; $posdata=$posdb->where($map)->select(); foreach($posdata as $k=>$ma){ if($v['pos_county'] == $ma['pos_id']){ echo "<option value=".$ma['pos_id']." selected='selected'>".$ma['pos_name']."</option>"; }else{ echo "<option value=".$ma['pos_id'].">".$ma['pos_name']."</option>"; } } ?>
                            </select>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">佣金</label>
                        <div class="am-u-sm-9">
                            <input type="number" value ="<?php echo ($v['pos_brokerage']); ?>" id="pos_brokerage"  placeholder="请输入佣金数量" style="width:52%"/>

                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">薪资</label>
                        <div class="am-u-sm-9">
                            <input type="number" value ="<?php echo ($v['pos_salary']); ?>" id="pos_salary" placeholder="请输入薪资数目" style="width:52%"/>

                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">工作类型</label>
                        <div class="am-u-sm-9">
                            <!-- <input type="" name="comangel" id="comangel" placeholder="" /> -->
                            <select id="pos_joptype" class="" name="posjoptype" style="width:52%">
                                <option value="0">请选择工作类型</option>
                                <?php
 $posdb=M('pos'); $map['pos_joptype']=0; $map['pos_is_delete']=1; $posdata=$posdb->where($map)->select(); foreach($posdata as $k=>$ma){ if($v['pos_joptype'] == $ma['pos_id']){ echo "<option value=".$ma['pos_id']." selected='selected'>".$ma['pos_name']."</option>"; }else{ echo "<option value=".$ma['pos_id'].">".$ma['pos_name']."</option>"; } } ?>
                            </select>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">工作时间</label>
                        <div class="am-u-sm-9">
                            <input type="text" value ="<?php echo ($v['pos_worktime']); ?>" id="pos_worktime" placeholder="请输入工作时间段" style="width:52%"/>

                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">上班时段</label>
                        <div class="am-u-sm-9">
                            <input type="text"  value ="<?php echo ($v['pos_hours']); ?>"id="pos_hours" placeholder="请输入上班时间段"  style="width:52%"/>

                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">公司名称</label>
                        <div class="am-u-sm-9">
                            <input type="text"     value ="<?php echo ($v['pos_company_name']); ?>"  id="pos_company_name" placeholder="请输入公司名称"  style="width:52%"/>

                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">详细地址</label>
                        <div class="am-u-sm-9">
                            <input type="text"   value ="<?php echo ($v['pos_company_address']); ?>"  id="pos_company_address" placeholder="请输入详细地址"  style="width:52%"/>

                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">真实浏览次数</label>
                        <div class="am-u-sm-9">
                            <input type="text" id="pos_true_liulan"    value ="<?php echo ($v['pos_true_liulan']); ?>"   readonly="readonly" style="width:52%"/>

                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">真实投递简历次数</label>
                        <div class="am-u-sm-9">
                            <input type="text" id="pos_true_toudi"   value ="<?php echo ($v['pos_true_toudi']); ?>"  readonly="readonly" style="width:52%"/>

                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">+浏览次数</label>
                        <div class="am-u-sm-9">
                            <input type="text" id="pos_liuan" value ="<?php echo ($v['pos_liuan']); ?>" placeholder="请输入浏览次数"  value="" style="width:52%"/>

                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">+投递简历次数</label>
                        <div class="am-u-sm-9">
                            <input type="text" id="pos_toudi" value ="<?php echo ($v['pos_toudi']); ?>" placeholder="请输入投递简历次数"  value="" style="width:52%"/>

                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">工作描述</label>
                        <div class="am-u-sm-9">
                            <textarea id="pos_jobdescription" class="form-control"  rows="3"><?php echo ($v['pos_jobdescription']); ?></textarea>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">职责描述</label>
                        <div class="am-u-sm-9">
                            <textarea id="pos_responsibilities" class="form-control" rows="3"><?php echo ($v['pos_responsibilities']); ?></textarea>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">福利待遇</label>
                        <div class="am-u-sm-9">
                            <textarea id="pos_welfarebenefits" class="form-control" rows="2"><?php echo ($v['pos_welfarebenefits']); ?></textarea>

                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">上下架</label>
                        <div class="am-u-sm-9">
                            <!-- <input type="" name="comangel" id="comangel" placeholder="" /> -->
                            <select id="pos_online" class="" name="comangel" style="width:52%">
                                <?php
 if($v['pos_online'] == 1){ echo "<option value='1' selected='selected'>上架</option>"; echo "<option value='0'>下架</option>"; }else{ echo "<option value='1' >上架</option>"; echo "<option value='0' selected='selected'>下架</option>"; } ?>
                            </select>
                        </div>
                    </div>

                    <!--<div class="am-form-group">-->
                    <!--<label for="user-email" class="am-u-sm-3 am-form-label">人才匹配</label>-->
                    <!--<div class="am-u-sm-9">-->
                    <!--&lt;!&ndash; <input type="" name="comangel" id="comangel" placeholder="" /> &ndash;&gt;-->
                    <!--<select id="comangel" class="" name="comangel">-->
                    <!--<option value="">开启</option>-->
                    <!--<option value="">关闭</option>-->
                    <!---->
                    <!--</select>-->
                    <!--</div>-->
                    <!--</div>-->

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
            upload("work", "work_image"); //上传证件合影
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
        //$(document).ready(function(){
        //　 $('#file_upload').uploadifive({
        //        'auto'             : false,
        //        'formData'         : {
        //            'timestamp' : '<?php echo $timestamp;?>',
        //            'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
        //                             },
        //        'queueID'          : 'queue',
        //        'uploadScript'     : "<?php echo U('Com/doPhoto');?>",
        //        'onUploadComplete' : function(file, data) {
        //          console.log(data);
        //            $('#both').append("<div class='add'><img  class='img1' width=100px src='"+data+"' >          <img class='ico' src='/Public/img/ywrong.png'> <input type='hidden' name='img[]' value="+data+"></div>");
        //              /*点击删除上传图片*/
        //              $(".ico").unbind("click");
        //              $(".ico").click(function(){
        //                  var objo=$(this).prev();
        //                  var img=$(this).prev(".img1").attr('src')
        //                  var url ="<?php echo U('Com/delimg');?>";
        //                  $.ajax({
        //                        type:"post",
        //                        url:url,
        //                        data:{'img':img},
        //                        dataType:"json",
        //                        success:function(data){
        //                          if(data=="ok"){
        //                             $(objo).parent('.add').remove();
        //                          }
        //                          }
        //                    });
        //              });
        //            }
        //          });
        //      });



        function baocun(){
            //获取ID
            var pos_id=$('#pos_id').val();
            var pos_img =$('#work_image').attr('src');
            var pos_name = $('#pos_name').val();
            var pos_recruitmun=$('#pos_recruitmun').val();
            var pos_county=$('#pos_county').val();
            var pos_brokerage =$('#pos_brokerage').val();
            var pos_salary=$('#pos_salary').val();
            var pos_joptype=$('#pos_joptype').val();
            var pos_worktime=$('#pos_worktime').val();
            var pos_hours=$('#pos_hours').val();
            var pos_company_name=$('#pos_company_name').val();
            var pos_company_address=$('#pos_company_address').val();
            var pos_true_liulan=$('#pos_true_liulan').val();
            var pos_true_toudi=$('#pos_true_toudi').val();
            var pos_liuan=$('#pos_liuan').val();
            var pos_toudi=$('#pos_toudi').val();
            var pos_jobdescription=$('#pos_jobdescription').val();
            var pos_responsibilities=$('#pos_responsibilities').val();
            var pos_welfarebenefits=$('#pos_welfarebenefits').val();
            var pos_online=$('#pos_online').val();


            if(pos_img=="" || pos_img == null){
                alert('任务照片不能为空');
                return;
            }

            if(pos_name=="" || pos_name == null){
                alert('任务名称不能为空');
                return;
            }
            if(pos_recruitmun=="" || pos_recruitmun == null){
                alert('需求人数不能为空');
                return;
            }
            if(pos_county =="0" ){
                alert('请选择区域');
                return;
            }
            if(pos_brokerage=="" || pos_brokerage == null){
                alert('佣金不能为空');
                return;
            }
            if(pos_worktime=="" || pos_worktime == null){
                alert('薪资不能为空');
                return;
            }
            if(pos_joptype =="0" ){
                alert('请选择工作类型');
                return;
            }

            if(pos_salary=="" || pos_salary == null){
                alert('工作时间不能为空');
                return;
            }
            if(pos_hours=="" || pos_hours == null){
                alert('上班时间段不能为空');
                return;
            }
            if(pos_company_name=="" || pos_company_name == null){
                alert('公司名称不能为空');
                return;
            }
            if(pos_company_address=="" || pos_company_address == null){
                alert('详细地址不能为空');
                return;
            }
            if(pos_liuan == '' || pos_liuan == null){
                pos_liuan=0;
            }
            if(pos_toudi == '' || pos_toudi == null){
                pos_toudi=0;
            }
            if(pos_jobdescription=="" || pos_jobdescription == null){
                alert('工作描述不能为空');
                return;
            }
            if(pos_responsibilities=="" || pos_responsibilities == null){
                alert('职责描述不能为空');
                return;
            }
            if(pos_welfarebenefits=="" || pos_welfarebenefits == null){
                alert('福利待遇描述不能为空');
                return;
            }

            var data={'pos_id':pos_id,'pos_img':pos_img,'pos_name':pos_name,'pos_recruitmun':pos_recruitmun,'pos_county':pos_county,'pos_brokerage':pos_brokerage,'pos_salary':pos_salary,'pos_joptype':pos_joptype,'pos_worktime':pos_worktime,'pos_hours':pos_hours,'pos_company_name':pos_company_name,'pos_company_address':pos_company_address,'pos_true_liulan':pos_true_liulan,'pos_true_toudi':pos_true_toudi,'pos_liuan':pos_liuan,'pos_toudi':pos_toudi,'pos_jobdescription':pos_jobdescription,'pos_responsibilities':pos_responsibilities,'pos_welfarebenefits':pos_welfarebenefits,'pos_online':pos_online};
            $.ajax({
                url:"<?php echo U('poscha/doview');?>",
                data:data,
                type:'post',
                dataType:"json",
                success:function(data){
                    if(data.status){
                        alert('保存成功');
                        window.location="<?php echo U('Poscha/lists');?>";
                    }else{
                        alert(data.message);
                    }
                }
            });
        }
    </script>