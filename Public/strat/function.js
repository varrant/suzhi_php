var showdata;
var myScroll;
var myScroll2;

function loaded () {
	FastClick.attach(document.body);
	myScroll = new IScroll('#wrapper', { scrollbars: false,mouseWheel: true,interactiveScrollbars: false,fadeScrollbars: true,HWCompositing:true,disableMouse:false,disablePointer:false,disableTouch:false,preventDefault: false,preventDefaultException: { tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT|A)$/ }});
	document.addEventListener('touchmove', function (e) { e.preventDefault(); var el = document.activeElement;if (el.nodeName.toLowerCase() == 'input') {el.blur();this.disable();setTimeout($.proxy(function () {this.enable();}, this), 250);return;}}, false);
	myScroll.on("scrollStart", function () {
		myScroll.refresh();
	});
}
function loaded2 () {
	FastClick.attach(document.body);
	myScroll2 = new IScroll('#wrapper2', { scrollbars: false,mouseWheel: true,interactiveScrollbars: false,fadeScrollbars: true,HWCompositing:true,disableMouse:false,disablePointer:false,disableTouch:false,preventDefault: false,preventDefaultException: { tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT|A)$/ }});
	document.addEventListener('touchmove', function (e) { e.preventDefault(); var el = document.activeElement;if (el.nodeName.toLowerCase() == 'input') {el.blur();this.disable();setTimeout($.proxy(function () {this.enable();}, this), 250);return;}}, false);
	myScroll2.on("scrollStart", function () {
		myScroll2.refresh();
	});
}
function loaded2_2 () {
	FastClick.attach(document.body);
	myScroll2 = new IScroll('#wrapper2', { scrollbars: false,mouseWheel: true,interactiveScrollbars: false,fadeScrollbars: true,HWCompositing:true,disableMouse:false,disablePointer:false,disableTouch:false,preventDefault: false,preventDefaultException: { tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT|A)$/ }});
	document.addEventListener('touchmove', function (e) { var el = document.activeElement;if (el.nodeName.toLowerCase() == 'input') {el.blur();this.disable();setTimeout($.proxy(function () {this.enable();}, this), 250);return;}}, false);
	myScroll2.on("scrollStart", function () {
		myScroll2.refresh();
	});
}
function showclose(Scrollobj,closeobj){
	Scrollobj.destroy();
	$("#"+closeobj).modal('close');
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