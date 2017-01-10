var showdata;
var myScroll;
var myScroll2;

function loaded () {
	myScroll = new IScroll('#wrapper', { scrollbars: false,mouseWheel: true,interactiveScrollbars: false,fadeScrollbars: true,HWCompositing:true,disableMouse:false,disablePointer:false,disableTouch:false,preventDefault: false,preventDefaultException: { tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT|A)$/ }});
	document.addEventListener('touchmove', function (e) { e.preventDefault(); var el = document.activeElement;if (el.nodeName.toLowerCase() == 'input') {el.blur();this.disable();setTimeout($.proxy(function () {this.enable();}, this), 250);return;}}, false);
	myScroll.on("scrollStart", function () {
		myScroll.refresh();
	});
}
function loaded2 () {
	myScroll2 = new IScroll('#wrapper2', { scrollbars: false,mouseWheel: true,interactiveScrollbars: false,fadeScrollbars: true,HWCompositing:true,disableMouse:false,disablePointer:false,disableTouch:false,preventDefault: false,preventDefaultException: { tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT|A)$/ }});
	document.addEventListener('touchmove', function (e) { e.preventDefault(); var el = document.activeElement;if (el.nodeName.toLowerCase() == 'input') {el.blur();this.disable();setTimeout($.proxy(function () {this.enable();}, this), 250);return;}}, false);
	myScroll2.on("scrollStart", function () {
		myScroll2.refresh();
	});
}
function loaded2_2 () {
	myScroll2 = new IScroll('#wrapper2', { scrollbars: false,mouseWheel: true,interactiveScrollbars: false,fadeScrollbars: true,HWCompositing:true,disableMouse:false,disablePointer:false,disableTouch:false,preventDefault: false,preventDefaultException: { tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT|A)$/ }});
	document.addEventListener('touchmove', function (e) { var el = document.activeElement;if (el.nodeName.toLowerCase() == 'input') {el.blur();this.disable();setTimeout($.proxy(function () {this.enable();}, this), 250);return;}}, false);
	myScroll2.on("scrollStart", function () {
		myScroll2.refresh();
	});
}
function openUrl(winid,url){
	$.AMUI.utils.cookie.set("urlcookies","t");
    window.parent.document.getElementById(winid).className='iframs_2';
	window.parent.document.getElementById(winid).src=url;
	$.AMUI.utils.cookie.set("urlcookies","o");
}
function closeUrl(winid){
	window.parent.document.getElementById(winid).src='null.html';
    window.parent.document.getElementById(winid).className='iframs_1';
}

function setCookie(name,value)
{
    var Days = 30;
    var exp = new Date();
    exp.setTime(exp.getTime() + Days*24*60*60*1000);
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}

//读取cookies
function getCookie(name)
{
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr=document.cookie.match(reg))
        return (unescape(arr[2]));
    else
        return null;
}