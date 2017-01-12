1、添加JS引用多个编辑器

<script charset="gbk" src="./editor/kindeditor.js"></script>             

<script charset="gbk" sr

c="./editor/lang/zh_CN.js"></script>             

<script>    

var editor1;

var editor2;

var editor3;

            KindEditor.ready(function(K) {

//编辑器1开始; 

                editor1 = K.create('#jianjie', {

                    allowFileManager : true ,         

//设置编辑器为简单模式

              items : [

                        'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',

                        'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',

                        'insertunorderedlist', '|', 'emoticons', 'image', 'link'],

 afterCreate : function() {             

                    var self = this;             

                    K.ctrl(document, 13, function() {             

                        self.sync();             

                        K('form[name=myform]')[0].submit();             

                    });             

                    K.ctrl(self.edit.doc, 13, function() {             

                        self.sync();             

                        K('form[name=myform]')[0].submit();             

                    });             

                }, 

//下面这行代码就是关键的所在,当失去焦点时执行 this.sync();        

afterBlur:function(){this.sync();},

    });

//编辑器2开始; 

editor2 = K.create('#other', {

                    allowFileManager : true ,

//设置编辑器为简单模式

              items : [

                        'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',

                        'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',

                        'insertunorderedlist', '|', 'emoticons', 'image', 'link'],

 afterCreate : function() {             

                    var self = this;             

                    K.ctrl(document, 13, function() {             

                        self.sync();             

                        K('form[name=myform]')[0].submit();             

                    });             

                    K.ctrl(self.edit.doc, 13, function() {             

                        self.sync();             

                        K('form[name=myform]')[0].submit();             

                    });             

                }, 

//下面这行代码就是关键的所在,当失去焦点时执行 this.sync();        

afterBlur:function(){this.sync();}

                });

//编辑器3开始; 

editor3 = K.create('#opinion', {

                    allowFileManager : true ,

//设置编辑器为简单模式

              items : [

                        'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',

                        'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',

                        'insertunorderedlist', '|', 'emoticons', 'image', 'link'],

 afterCreate : function() {             

                    var self = this;             

                    K.ctrl(document, 13, function() {             

                        self.sync();             

                        K('form[name=myform]')[0].submit();             

                    });             

                    K.ctrl(self.edit.doc, 13, function() {             

                        self.sync();             

                        K('form[name=myform]')[0].submit();             

                    });             

                }, 

//下面这行代码就是关键的所在,当失去焦点时执行 this.sync();        

afterBlur:function(){this.sync();}

                });

            });

    </script>

2、引用的地方代码:

           编辑器1: <td > <TEXTAREA NAME="jianjie" COLS="90" ROWS="20" ID="jianjie" > </TEXTAREA></td>

         

           

           编辑器2: <td > <TEXTAREA NAME="other" COLS="90" ROWS="20" ID="other" > </TEXTAREA></td>

          

          

        编辑器3: <td > <TEXTAREA NAME="opinion" COLS="90" ROWS="20" ID="opinion" ><%=trim(rs1("opinion"))%> </TEXTAREA></td>