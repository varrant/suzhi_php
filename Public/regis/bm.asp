
<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>报名通道</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="stylesheet" href="css/Template.css">
  <link rel="stylesheet" href="css/WXactivity.css">
  <link rel="stylesheet" href="../js/uploadifive/uploadifive.css">
  <link rel="stylesheet" id="css-front-css" href="../js/Pikaday/css/pikaday.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/cropper.css">
  <link rel="stylesheet" href="css/main.css">
  
  <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>


</head>
<body>
<form id="addform" name="addform" method="post">
<div class="imglist">
<img src="image/bm_top1.png"><br>
</div>
<div class="box">
	<div style="text-align:center; line-height:40px; height:40px; color:#FFFFFF; font-size:20px; display:none;">
		第一期报名已结束!<br>
		二期活动即将开始<br>
		具体事项先联系微信号：ydxuhua<br>
		<img src="image/qcode.jpg" style=" width:50%;">
	</div>
	<div id="step1">
		<ul class="box_item">
			<li>
				<div class="box_item_title">
				主&nbsp;&nbsp;&nbsp;&nbsp;人：
				</div>
				<div class="box_item_value">
					<input type="text" name="WXAName" id="WXAName" placeholder="请填写真实姓名">
				</div>
				<div class="clearbox"></div>
			</li>
			<li>
				<div class="box_item_title">
				手&nbsp;&nbsp;&nbsp;&nbsp;机：
				</div>
				<div class="box_item_value">
					<input type="text" name="WXAPhone" id="WXAPhone">
				</div>
				<div class="clearbox"></div>
			</li>
			<li>
				<div class="box_item_title">
				微&nbsp;&nbsp;&nbsp;&nbsp;信：
				</div>
				<div class="box_item_value">
					<input type="text" name="WXNum" id="WXNum" placeholder="请填正确的微信号，方便客服联系">
				</div>
				<div class="clearbox"></div>
			</li>
			<li>
				<div class="box_item_title">
				验&nbsp;&nbsp;&nbsp;&nbsp;证：
				</div>
				<div class="box_item_value">
					<input type="text" name="WXCode" id="WXCode">
					<div class="phonecode" onClick="getSMS(this)">免费获取验证码</div>
				</div>
				<div class="clearbox"></div>
			</li>
		</ul>
		<div class="box_btn" style="margin-top:40px;">
			<a href="javascript:void(0)" class="box_btn1" onClick="addaction_click()">下一步</a>
		</div>
	</div>
	<div id="step2" style="display:none;">
		<div class="box_item_title" style="font-size:20px; display:none;">
			通信地址：
		</div>
		<div class="box_item_value" style="font-size:14px;display:none; color:#d8a853; line-height:42px;">
			*请填写完整，入围后方便发送礼品
		</div>
		<div class="clearbox"></div>
		<ul class="box_item">
			<li>
				<div class="box_item_title">
				省&nbsp;&nbsp;&nbsp;&nbsp;份：
				</div>
				<div class="box_item_value">
					<div class="user_login_input_value" id="divProIId">
						<div class="user_login_input_value_select_value">请选择省份</div>
						<div class="user_login_input_value_select_arrow"></div>
						<div class="clearbox"></div>
						<div style="position:relative;overflow-y:auto;z-index: 1000;">
						<div class="user_login_input_value_select_list_out">
							<div id="0">请选择省份</div>
							
							<div id="1">北京市</div>
							
							<div id="2">天津市</div>
							
							<div id="3">上海市</div>
							
							<div id="4">重庆市</div>
							
							<div id="5">河北省</div>
							
							<div id="6">山西省</div>
							
							<div id="7">台湾省</div>
							
							<div id="8">辽宁省</div>
							
							<div id="9">吉林省</div>
							
							<div id="10">黑龙江省</div>
							
							<div id="11">江苏省</div>
							
							<div id="12">浙江省</div>
							
							<div id="13">安徽省</div>
							
							<div id="14">福建省</div>
							
							<div id="15">江西省</div>
							
							<div id="16">山东省</div>
							
							<div id="17">河南省</div>
							
							<div id="18">湖北省</div>
							
							<div id="19">湖南省</div>
							
							<div id="20">广东省</div>
							
							<div id="21">甘肃省</div>
							
							<div id="22">四川省</div>
							
							<div id="24">贵州省</div>
							
							<div id="25">海南省</div>
							
							<div id="26">云南省</div>
							
							<div id="27">青海省</div>
							
							<div id="28">陕西省</div>
							
							<div id="29">广西壮族自治区</div>
							
							<div id="30">西藏自治区</div>
							
							<div id="31">宁夏回族自治区</div>
							
							<div id="32">新疆维吾尔自治区</div>
							
							<div id="33">内蒙古自治区</div>
							
							<div id="34">澳门特别行政区</div>
							
							<div id="35">香港特别行政区</div>
							
						</div>
						</div>
						<select name="WX_promaryInfo" id="WX_promaryInfo" style="display:none;">
							<option value="0" selected="selected">请选择省份</option>
							
							<option value="1">北京市</option>
							
							<option value="2">天津市</option>
							
							<option value="3">上海市</option>
							
							<option value="4">重庆市</option>
							
							<option value="5">河北省</option>
							
							<option value="6">山西省</option>
							
							<option value="7">台湾省</option>
							
							<option value="8">辽宁省</option>
							
							<option value="9">吉林省</option>
							
							<option value="10">黑龙江省</option>
							
							<option value="11">江苏省</option>
							
							<option value="12">浙江省</option>
							
							<option value="13">安徽省</option>
							
							<option value="14">福建省</option>
							
							<option value="15">江西省</option>
							
							<option value="16">山东省</option>
							
							<option value="17">河南省</option>
							
							<option value="18">湖北省</option>
							
							<option value="19">湖南省</option>
							
							<option value="20">广东省</option>
							
							<option value="21">甘肃省</option>
							
							<option value="22">四川省</option>
							
							<option value="24">贵州省</option>
							
							<option value="25">海南省</option>
							
							<option value="26">云南省</option>
							
							<option value="27">青海省</option>
							
							<option value="28">陕西省</option>
							
							<option value="29">广西壮族自治区</option>
							
							<option value="30">西藏自治区</option>
							
							<option value="31">宁夏回族自治区</option>
							
							<option value="32">新疆维吾尔自治区</option>
							
							<option value="33">内蒙古自治区</option>
							
							<option value="34">澳门特别行政区</option>
							
							<option value="35">香港特别行政区</option>
							
						</select>
					</div>
				</div>
				<div class="clearbox"></div>
			</li>
			<li>
				<div class="box_item_title">
				市&nbsp;&nbsp;&nbsp;&nbsp;县：
				</div>
				<div class="box_item_value">
					<div class="user_login_input_value" id="divcityID">
						<div class="user_login_input_value_select_value">请选择市县</div>
						<div class="user_login_input_value_select_arrow"></div>
						<div class="clearbox"></div>
						<div style="position:relative;overflow-y:auto;z-index: 1000;">
						<div class="user_login_input_value_select_list_out">
							<div id="0">请选择市县</div>
						</div>
						</div>
						<select name="WX_CityInfo" id="WX_CityInfo" style="display:none;">
							<option value="0" selected="selected">请选择市县</option>
						</select>
					</div>
				</div>
				<div class="clearbox"></div>
			</li>
			<li>
				<div class="box_item_title">
				地&nbsp;&nbsp;&nbsp;&nbsp;址：
				</div>
				<div class="box_item_value">
					<input type="text" name="WXAddress" id="WXAddress" placeholder="请填写详细地址，方便礼品发放">
				</div>
				<div class="clearbox"></div>
			</li>
		</ul>

		<ul class="box_item">
			<li>
				<div class="box_item_title">
				昵&nbsp;&nbsp;&nbsp;&nbsp;称：
				</div>
				<div class="box_item_value">
					<input type="text" name="WXNickName" id="WXNickName" placeholder="请填写宠物的名字">
				</div>
				<div class="clearbox"></div>
			</li>
			<li>
				<div class="box_item_title">
				男&nbsp;&nbsp;&nbsp;&nbsp;女：
				</div>
				<div class="box_item_value">
					<div class="user_login_input_value">
						<div class="user_login_input_value_select_value">男生/女生</div>
						<div class="user_login_input_value_select_arrow"></div>
						<div class="clearbox"></div>
						<div style="position:relative;overflow-y:auto;z-index: 1000;">
						<div class="user_login_input_value_select_list_out">
							<div id="0">男生/女生</div>
							<div id="1">男</div>
							<div id="2">女</div>
						</div>
						</div>
						<select name="WXSex" id="WXSex" style="display:none;">
							<option value="0" selected="selected">男生/女生</option>
							<option value="1">男</option>
							<option value="2">女</option>
						</select>
					</div>
				</div>
				<div class="clearbox"></div>
			</li>
			<li>
				<div class="box_item_title">
				品&nbsp;&nbsp;&nbsp;&nbsp;种：
				</div>
				<div class="box_item_value">
					<input type="text" name="WXPinzhong" id="WXPinzhong" maxlength="8" placeholder="如（斗牛犬、拉布拉多、金毛）">
				</div>
				<div class="clearbox"></div>
			</li>
			<li>
				<div class="box_item_title">
				生&nbsp;&nbsp;&nbsp;&nbsp;日：
				</div>
				<div class="box_item_value">
					<input type="text" name="WXBirthday" id="WXBirthday" readonly="true">
				</div>
				<div class="clearbox"></div>
			</li>
			<li>
				<div class="box_item_title">
				途&nbsp;&nbsp;&nbsp;&nbsp;径：
				</div>
				<div class="box_item_value" style="display:none;">
					<input type="text" name="WXBuyWay2" id="WXBuyWay2" placeholder="XX犬舍/朋友送养/领养">
				</div>
				<div class="box_item_value">
					<div class="user_login_input_value">
						<div class="user_login_input_value_select_value">途径</div>
						<div class="user_login_input_value_select_arrow"></div>
						<div class="clearbox"></div>
						<div style="position:relative;overflow-y:auto;z-index: 1000;">
						<div class="user_login_input_value_select_list_out">
							<div id="0">途径</div>
							<div id="犬舍购买">犬舍购买</div>
							<div id="朋友送养">朋友送养</div>
							<div id="宠物店购买">宠物店购买</div>
						</div>
						</div>
						<select name="WXBuyWay" id="WXBuyWay" style="display:none;">
							<option value="0" selected="selected">途径</option>
							<option value="犬舍购买">犬舍购买</option>
							<option value="朋友送养">朋友送养</option>
							<option value="宠物店购买">宠物店购买</option>
						</select>
					</div>
				</div>
				<div class="clearbox"></div>
			</li>
			<li>
				<div class="box_item_title">
				特&nbsp;&nbsp;&nbsp;&nbsp;长：
				</div>
				<div class="box_item_value">
					<input type="text" name="WXTechang" id="WXTechang" placeholder="如（坐、卧、立、装死、卖萌等）">
				</div>
				<div class="clearbox"></div>
			</li>
			<li>
				<div class="box_item_title">
				天&nbsp;&nbsp;&nbsp;&nbsp;赋：
				</div>
				<div class="box_item_value">
					<input type="text" name="WXTianFu" id="WXTianFu" placeholder="如（听音乐、唱歌、算数等）">
				</div>
				<div class="clearbox"></div>
			</li>
			<li>
				<div class="box_item_title">
				作&nbsp;&nbsp;&nbsp;&nbsp;品：
				</div>
				<div class="box_item_value">
					<input type="text" name="WXZuoPin" id="WXZuoPin" placeholder="如（已拍摄过的电影，广告片）">
				</div>
				<div class="clearbox"></div>
			</li>
		</ul>

		<div style="margin:0px 10px;">
			<div class="box_item_title" style="font-size:20px;">
				描&nbsp;&nbsp;&nbsp;&nbsp;述：
			</div>
			<div class="box_item_value" style="font-size:14px; color:#d8a853; line-height:42px;">
				*用80个字来描述您和宠物之间的感情
			</div>
		</div>
		<div class="clearbox"></div>
		<div class="box_item_textarea">
			<textarea name="WxRemark" id="WxRemark" style="color:#a9a9a9;">在一个很有爱的日子出生了，520的娃，目前2岁多了，萌萌的桂圆圆，我的宝贝蛾子，给我带来了很多欢乐，在这2年多来，我们相互学习，相互关爱，给彼此的生活带来了色彩，妈妈爱你（参考）</textarea>
		</div>
		<div style="margin:0px 10px;">
			<div class="box_item_title" style="font-size:20px;">
				照&nbsp;&nbsp;&nbsp;&nbsp;片：
			</div>
			<div class="box_item_value" style="font-size:14px; color:#d8a853; line-height:42px;">
				*照片须清晰美观，能够体现宠物特色
			</div>
		</div>
		<div class="clearbox"></div>
		<img style="width:100%;" src="image/bmbannereg.png">
		<div class="box_upload" id="box_upload1"><input id="file_upload" name="file_upload" type="file" multiple="true">
		<!--<img src="images/feixiao_info_add_upload.jpg">-->
		</div>
		<div class="box_upload_txt">宠物模卡<br>说明：宠物独拍，尽量清晰</div>
		<div class="clearbox"></div>
		<div id="queue"></div>
		<div class="linebox"></div>
		<div class="box_upload" id="box_upload2"><input id="file_upload2" name="file_upload2" type="file" multiple="true">
		<!--<img src="images/feixiao_info_add_upload.jpg">-->
		</div>
		<div class="box_upload_txt">网页banner<br>说明：宠物主与宠物，横拍照片</div>
		<div class="clearbox"></div>
		<div id="queue2"></div>

		<input type="hidden" name="BMTypes" id="BMTypes" value="1"><!-- 活动类型 -->
		<input type="hidden" name="BMImage1" id="BMImage1" value=""><!-- 模卡图 -->
		<input type="hidden" name="BMImage2" id="BMImage2" value=""><!-- banner图 -->
		
		<div class="box_btn" style="margin-top:40px;">
			<a href="javascript:void(0)" class="box_btn1" onClick="addaction_click2()">提交预览</a>
		</div>
	</div>

</div>
<div class="imglist" style="display:none;">
<img src="image/bm_bottom.jpg"><br>
</div>

<!-- 图片裁剪 -->
<div class="alertbox">
	<div class="img-container" id="img-container">
	</div>
	<div class="col-md-9 docs-buttons" style="width: 100%;">
	<div class="btn-group btn-group-crop" style="width: 100%;">
	<button type="button" class="btn btn-primary" data-method="getCroppedCanvas" style="height:50px; width:50%;">
	<span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCroppedCanvas&quot;)">
	保存
	</span>
	</button>
	<button type="button" id="btnclose" class="btn btn-primary" style="height:50px; width:50%;">
	<span class="docs-tooltip">
	返回
	</span>
	</button>
	</div>
	</div>
	<div style="text-align:center;">照片传不上请联系客服,微信号：ydxuhua</div>
</div>
</form>
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="../js/Pikaday/js/pikaday.min.js"></script>
<script src="../js/uploadifive/jquery.uploadifiveBM.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/cropper.min.js"></script>
<script src="js/main.js"></script>
<script>
wx.config({
    debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
    appId: 'wxc15a1a77cf5e5440', // 必填，公众号的唯一标识
    timestamp: 1472190684, // 必填，生成签名的时间戳
    nonceStr: 'UMSurKrjGIXqvgde', // 必填，生成签名的随机串
    signature: 'e41c76155c677fc191378d466fce3f740f2e7c89',// 必填，签名，见附录1
    jsApiList: [
		'onMenuShareAppMessage',
		'onMenuShareTimeline',
		'hideMenuItems'
	] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
});
wx.ready(function(){
	wx.hideMenuItems({
		menuList: [
			'menuItem:copyUrl',
			'menuItem:openWithQQBrowser',
			'menuItem:openWithSafari',
			'menuItem:share:email',
			'menuItem:share:qq',
			'menuItem:share:weiboApp',
			'menuItem:share:QZone',
			'menuItem:share:qq'
		] // 要隐藏的菜单项，只能隐藏“传播类”和“保护类”按钮，所有menu项见附录3
	});
	
	//分享给朋友
	wx.onMenuShareAppMessage({
		title: '宠物明星报名通道', // 分享标题
		desc: '欢迎参加VIPETA宠物明星学院，我们在学院等你喔！', // 分享描述
		link: 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc15a1a77cf5e5440&redirect_uri=http://www.vipeta.cn/m/BM/bm.asp&response_type=code&scope=snsapi_base&state=1#wechat_redirect', // 分享链接
		imgUrl: 'http://www.vipeta.cn/m/BM/image/logo.jpg', // 分享图标
		type: '', // 分享类型,music、video或link，不填默认为link
		dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
		success: function () { 
			// 用户确认分享后执行的回调函数
		},
		cancel: function () { 
			// 用户取消分享后执行的回调函数
		}
	});
	
	wx.onMenuShareTimeline({
    title: '宠物明星报名通道', // 分享标题
    link: 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc15a1a77cf5e5440&redirect_uri=http://www.vipeta.cn/m/BM/bm.asp&response_type=code&scope=snsapi_base&state=1#wechat_redirect', // 分享链接
    imgUrl: 'http://www.vipeta.cn/m/BM/image/logo.jpg', // 分享图标
    success: function () { 
        // 用户确认分享后执行的回调函数
    },
    cancel: function () { 
        // 用户取消分享后执行的回调函数
    }
});
});
$(document).ready(function(){
	// $('#WXBirthday').datetimepicker({
	//   format: 'yyyy-mm-dd hh:ii'
	// });
	$("#WxRemark").focus(function(){
		console.log($("#WxRemark").val());
		if($("#WxRemark").val()=="在一个很有爱的日子出生了，520的娃，目前2岁多了，萌萌的桂圆圆，我的宝贝蛾子，给我带来了很多欢乐，在这2年多来，我们相互学习，相互关爱，给彼此的生活带来了色彩，妈妈爱你（参考）"){
			$("#WxRemark").val("");
			$("#WxRemark").attr("style","color:#ffffff;");
		}
	})
	$("#WxRemark").blur(function(){
		if($("#WxRemark").val()==""){
			$("#WxRemark").val("在一个很有爱的日子出生了，520的娃，目前2岁多了，萌萌的桂圆圆，我的宝贝蛾子，给我带来了很多欢乐，在这2年多来，我们相互学习，相互关爱，给彼此的生活带来了色彩，妈妈爱你（参考）");
			$("#WxRemark").attr("style","color:#a9a9a9;");
		}
	})
	var picker = new Pikaday(
    {
        field: document.getElementById('WXBirthday'),
        firstDay: 1,
        minDate: new Date('2000-01-01'),
        maxDate: new Date('2050-12-31'),
        yearRange: [2000,2050]
    });
    $("#btnclose").click(function(){
    	$(".alertbox").attr("style","display:;none;")
    })

    $('#file_upload').uploadifive({
			'auto'             : true,
			'multi'            : true,
			'buttonText'	   : '<img src=\'image/upload_bg.jpg\'>',
			'buttonClass'		:'btn_blue am-round',
			'checkScript'      : 'm_check-exists.asp',
			'height'			:133,
			'formData'         : {
								   'timestamp' : '1231023123132',
								   'token'     : '1231023123132'
								 },        
			'queueID'          : 'queue',
			'uploadScript'     : 'upload.asp',
			'onUploadComplete' : function(file, data) {
				var filetext=eval("(" + file.xhr.responseText + ")")					//解析JSON数据
				console.log(filetext);
				//$(".alertbox").attr("style","width:"+$(window).width()+"px; height:"+$(window).height()+"px;display:inherit;")
				//$("#img-container").html("<img id=\'image\' src=\'upload/"+filetext.savename+"\' />");
				$("#BMImage1").val("upload/"+filetext.savename);
				$("#box_upload1").html("<img src='upload/"+filetext.savename+"'>")
				//jiazai('image',1,1,'box_upload1','BMImage1');
				//$("#piclist").prepend("<li style=\"float: left; width: 90px; height: 90px; overflow: hidden;margin-right: 10px; margin-top: 10px;\"><img src='../upload/"+filetext.PicName+"s."+filetext.ext+"' width='100%'></li>");
				//$("#jsonUrl").val(filetext.PicName+'.'+filetext.ext)
			}
	});

	$('#file_upload2').uploadifive({
			'auto'             : true,
			'multi'            : true,
			'buttonText'	   : '<img src=\'image/upload_bg.jpg\'>',
			'buttonClass'		:'btn_blue am-round',
			'checkScript'      : 'm_check-exists.asp',
			'height'			:133,
			'formData'         : {
								   'timestamp' : '1231023123132',
								   'token'     : '1231023123132'
								 },        
			'queueID'          : 'queue2',
			'uploadScript'     : 'upload.asp',
			'onUploadComplete' : function(file, data) {
				var filetext=eval("(" + file.xhr.responseText + ")")					//解析JSON数据
				console.log(filetext);
				//$(".alertbox").attr("style","width:"+$(window).width()+"px; height:"+$(window).height()+"px;display:inherit;")
				//$("#img-container").html("<img id=\'image\' src=\'upload/"+filetext.savename+"\' />");
				$("#BMImage2").val("upload/"+filetext.savename);
				$("#box_upload2").html("<img src='upload/"+filetext.savename+"'>")
				//jiazai('image',3,2,'box_upload2','BMImage2');
				//$("#piclist").prepend("<li style=\"float: left; width: 90px; height: 90px; overflow: hidden;margin-right: 10px; margin-top: 10px;\"><img src='../upload/"+filetext.PicName+"s."+filetext.ext+"' width='100%'></li>");
				//$("#jsonUrl").val(filetext.PicName+'.'+filetext.ext)
			}
	});
})
	$(".box_item_select .out").click(function(){
		//console.log($(this).html());
		$(".box_item_select .over").addClass("out").removeClass("over");
		$(this).addClass("over").removeClass("out");
		console.log($(this).find(".hide").html());
		$(".Bottom_Navbar").find("span").html("价格：￥"+$(this).find(".hide").html()+"元");
		$("#tprice").val($(this).find(".hide").html());
		$("#tcid").val($(this).find(".divcid").html());
	})
	var time;
	var tcount=59;
	function clock()
	{
		tcount--;
		console.log("重新获取("+tcount+"s)");
		$(".phonecode").html("重新获取("+tcount+"s)");
		if(tcount<1){
			clearInterval(time);
			$(".phonecode").html("重新获取");
			tcount=59;
		}
	}

	function getSMS(t){
		if(tcount<59){
			return false;
		}
		if($("#WXAPhone").val()==""){
			alert('先填写手机号码!');
			$("#WXAPhone").focus();
			return false;
		}
		$("#WXAPhone").attr("")
		$.get("bmSMSAction.asp?types=1&WXAPhone="+$("#WXAPhone").val(),function(data){
			$(this).html("重新获取(59s)");
			time=setInterval("clock()",1000);
			console.log(data);
		})
	}
	
	function addaction_click(){
		if($("#WXAName").val()==""){
			alert('先填写主人!');
			$("#WXAName").focus();
			return false;
		}
		if($("#WXAPhone").val()==""){
			alert('先填写手机号码!');
			$("#WXAPhone").focus();
			return false;
		}
		if($("#WXNum").val()==""){
			alert('先填写微信号!');
			$("#WXNum").focus();
			return false;
		}
		if($("#WXCode").val()==""){
			alert('先填写验证码!');
			$("#WXCode").focus();
			return false;
		}
			$.ajax({
				type:"post",
				url:"bmSMSAction.asp?types=2&UPhoneCode="+$("#WXCode").val(),
				data:$("form#addform").serialize(),
				dataType:"html",
				success:function(data){
					console.log(data);
					if(parseInt(data)==0){
						//alert("信息提交成功，请耐心等待我们的工作人员与您联系！");
						$("#step1").attr("style","display:none;");
						$("#step2").attr("style","display:;");
					}
					else{
						alert("验证码错误！");
					}
				},
				error:function (XMLHttpRequest, textStatus, errorThrown){ 
					alert("提交人数过多，请重试!");
				}
			})
	}

	function addaction_click2(){
		if($("#WX_promaryInfo").val()==0){
			alert("请选择省份");
			return false;
		}
		//console.log($("#WX_promaryInfo").val());
		//console.log($("#WX_CityInfo").val());
		if($("#WX_CityInfo").val()==0){
			alert("请选择市县");
			return false;
		}
		if($("#WXAddress").val()==""){
			alert('先填写地址!');
			$("#WXAddress").focus();
			return false;
		}
		if($("#WXNickName").val()==""){
			alert('先填写昵称!');
			$("#WXNickName").focus();
			return false;
		}

		if($("#WXSex").val()==0){
			alert("请选择男女");
			return false;
		}

		if($("#WXPinzhong").val()==""){
			alert('先填写品种!');
			$("#WXPinzhong").focus();
			return false;
		}

		if($("#WXBirthday").val()==""){
			alert('先填写生日!');
			$("#WXBirthday").focus();
			return false;
		}
		
		if($("#WXBuyWay").val()==0){
			alert("请选择购买途径");
			return false;
		}
		// if($("#WXBuyWay").val()==""){
		// 	alert('先填写购买途径!');
		// 	$("#WXBuyWay").focus();
		// 	return false;
		// }

		if($("#WXTechang").val()==""){
			alert('先填写特长!');
			$("#WXTechang").focus();
			return false;
		}
		if($("#WXTianFu").val()==""){
			alert('先填写天赋!');
			$("#WXTianFu").focus();
			return false;
		}
		if($("#WXZuoPin").val()==""){
			alert('先填写作品!');
			$("#WXZuoPin").focus();
			return false;
		}
		if($("#WxRemark").val()==""){
			alert('先填写情感描述!');
			$("#WxRemark").focus();
			return false;
		}
			$.ajax({
				type:"post",
				url:"bmSMSAction.asp?types=3",
				data:$("form#addform").serialize(),
				dataType:"html",
				success:function(data){
					console.log(data);
					if(parseInt(data)==0){
						//alert("信息提交成功，请耐心等待我们的工作人员与您联系！");
						$("#step1").attr("style","display:none;");
						$("#step2").attr("style","display:;");
						alert("您已经报名成功,审核结果将以短信形式通知！");
						window.location.href='bmConfirm.asp';
					}
					else{
						alert("您已经报名成功，请不要重复报名！");
					}
				},
				error:function (XMLHttpRequest, textStatus, errorThrown){ 
					alert("提交人数过多，请重试!");
				}
			})
	}
	
var $tmpselect;
$(".user_login_input_value_select_value").click(function(){
	$tmpselect=$(this).parent().find(".user_login_input_value_select_list_out")
	if($tmpselect.length==0){
		$tmpselect=$(this).parent().find(".user_login_input_value_select_list_over")
		$tmpselect.addClass("user_login_input_value_select_list_out");
		$tmpselect.removeClass("user_login_input_value_select_list_over");
	}
	else{
		$tmpselect.addClass("user_login_input_value_select_list_over");
		$tmpselect.removeClass("user_login_input_value_select_list_out");
	}
})
$(".user_login_input_value_select_arrow").click(function(){
	$tmpselect=$(this).parent().find(".user_login_input_value_select_list_out")
	if($tmpselect.length==0){
		$tmpselect=$(this).parent().find(".user_login_input_value_select_list_over")
		$tmpselect.addClass("user_login_input_value_select_list_out");
		$tmpselect.removeClass("user_login_input_value_select_list_over");
	}
	else{
		$tmpselect.addClass("user_login_input_value_select_list_over");
		$tmpselect.removeClass("user_login_input_value_select_list_out");
	}
})
$(".user_login_input_value_select_list_out").find("div").on("click",function(){
	if($(this).parent().parent().parent().attr("id")=="divProIId"){
		if($(this).attr("id")!=0){
			$.get("ServiceInfo.asp?cityID="+$(this).attr("id"),function(data){
				var obj=eval("(" + data + ")");
				//console.log(obj);
				$("#WX_CityInfo").empty();
				$("#WX_CityInfo").append("<option value=\"0\" selected=\"selected\">请选择市县</option>");
				$("#divcityID").find(".user_login_input_value_select_list_out").html("");
				$("#divcityID").find(".user_login_input_value_select_list_out").append("<div id=\"0\">请选择市县</div>");
				for(var i=0;i<obj.item.length;i++){
					// console.log(obj.item[i].cityID);
					// console.log(obj.item[i].cityName);
					$("#divcityID").find(".user_login_input_value_select_list_out").append("<div id=\""+obj.item[i].cityID+"\">"+obj.item[i].cityName+"</div>");
					$("#WX_CityInfo").append("<option value=\""+obj.item[i].cityID+"\">"+obj.item[i].cityName+"</option>");
				}
				$("#divcityID").find(".user_login_input_value_select_list_out").find("div").click(function(){
					$(this).parent().parent().parent().find(".user_login_input_value_select_value").html($(this).html());
					$(this).parent().parent().parent().find("select").val($(this).attr("id"));
					$(this).parent().parent().parent().find(".user_login_input_value_select_list_over").attr("class","user_login_input_value_select_list_out");
				})
				
			});
		}
	}
	$(this).parent().parent().parent().find(".user_login_input_value_select_value").html($(this).html());
	$(this).parent().parent().parent().find("select").val($(this).attr("id"));
	$(this).parent().parent().parent().find(".user_login_input_value_select_list_over").attr("class","user_login_input_value_select_list_out");
})

</script>
</body>
</html>