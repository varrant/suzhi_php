/*提示框类*/
var dialog = {
    // 错误弹出
    error: function(message) {

        layer.open({
            content: message,
            icon: 2,
            title: "错误提示",

        });
    },

    //成功弹出框
    success: function(message, url) {

        layer.open({
            content: message,
            icon: 1,
            title: "错误提示",
            yes: function() {
                location.href = url;
            }

        });
    },
    alert: function(message,i) {

        layer.open({
            content: message,
            icon: i,
            title: "内容",

        });
    }
}

// function addaction_click1(){
//         var error = false;
//         var name = $('#username').val();
        
//         var code = $('#code').val();
//         var password=$("#password").val();
//         if (name.length == 0) {
//             var error = true;
//             $('#username').css("border-color", "#212821");
//         } else {
//             $('#username').css("border-color", "#666");
//         }

//         if (password.length == 0) {
//             var error = true;
//             $('#password').css("border-color", "#212821");
//         } else {
//             $('#password').css("border-color", "#666");
//         }
//         if (code.length == 0) {
//             var error = true;
//             $('#code').css("border-color", "#212821");
//         } else {
//             $('#code').css("border-color", "#666");
//         }

//         if (error == false) {
         
//             var url = $("#form_a").attr('action');
             
//             var data=$("#form_a").serialize();
              
//             console.log(data);


//             $.ajax({
//                 type:"post",
//                 url:url,
//                 data:data,
//                 dataType:"json",

//                 success:function(data){
                   
//                         if (data["stuta"]=="codeisno") {

//                             dialog.error("验证码错误");

//                             $("#form_a").find("input").val('');

//                             // $('#username').css("border-color", "#666");
//                             // $('#password').css("border-color", "#666");
//                             // $('#code').css("border-color", "#666");


//                         } else {
//                             if(data['stuta']=="login_ok"){
                              
//                                 location.href = "/index.php/Juym_admin/Index/index";
                            

//                             } else if(data['stuta']=='login_no'){
                                
                                
//                                  dialog.error("账号或密码错误");
//                                  $("#form_a").find("input").val('');

                                 
//                             }
                            

//                          }

                            
//                         }

//                     });

            
//                  }




// }

// $('#button').click(function (e) {
        
       
//         var error = false;
//         var name = $('#username').val();
        
//         var code = $('#code').val();
//         var password=$("#password").val();
       

//         if (name.length == 0) {
//             var error = true;
//             $('#username').css("border-color", "#D8000C");
//         } else {
//             $('#username').css("border-color", "#666");
//         }

//         if (password.length == 0) {
//             var error = true;
//             $('#password').css("border-color", "#D8000C");
//         } else {
//             $('#password').css("border-color", "#666");
//         }
//         if (code.length == 0) {
//             var error = true;
//             $('#code').css("border-color", "#D8000C");
//         } else {
//             $('#code').css("border-color", "#666");
//         }

//         //now when the validation is done we check if the error variable is false (no errors)
//         if (error == false) {
         
//             var url = $("#form_a").attr('action');
               
//             var data=$("#form_a").serialize();
               
//             console.log(data);
//             $.ajax({
//                 type:"post",
//                 url:url,
//                 data:data,
//                 dataType:"json",

//                 success:function(data){
//                         if (data["stuta"]=="codeisno") {

//                             dialog.error("验证码错误");

//                             $("#form_a").find("input").val('');

//                             // $('#username').css("border-color", "#666");
//                             // $('#password').css("border-color", "#666");
//                             // $('#code').css("border-color", "#666");


//                         } else {
//                             if(data['stuta']=="login_ok"){
                              
//                                 location.href = "/index.php/Juym_admin/Index/index";
                            

//                             } else if(data['stuta']=='login_no'){
                                
                                
//                                  dialog.error("账号或密码错误");
//                                  $("#form_a").find("input").val('');

                                 
//                             }
                            

//                          }

                            
//                         }

//                     });

            
//                  }
//  });


// 删除弹框

$('button[id^=del]').click(function (e) {
            //获取id
            var id=$(this).attr('id').replace("del", "")
          
            var url = $(this).attr('formaction');

            var t_url=$(this).attr('formaction1')    
            $('#my-confirm').modal({
            relatedTarget: this,
            onConfirm: function(options) {
                $.ajax({
                    type:"get",
                    url:url,
                    data:$("#form1").serialize(),
                    dataType:"json",
                                     
                    success:function(data){
                    
                        if (data=="del_ok") {
                            dialog.success("删除成功",t_url);

                        }
                        
                        if(data=="del_no"){

                            dialog.error("删除失败")
                        }

                    }
            
            
          });
              
            },
            // closeOnConfirm: false,
            onCancel: function() {

             
             }

          });

          
    });