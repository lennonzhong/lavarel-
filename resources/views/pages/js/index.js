$(function () {
    // 用户名的保存
    $.ajax({
              url: '/graduateDesign/api/user',
              type: 'get'
          })
          .done(function(data) {
              if (data){
                  $('#loginBtn').html(data);
                  $('.registerBtn').html('退出');
              }else{
                  $('#loginBtn').html('登录');
                  $('.registerBtn').html('注册');
              }
          });
//    分类的显示与隐藏
    $('#category').stop().mouseenter(function () {
        $('#category span').css({
            "transform": "rotate(180deg)"
        });
        $('#category ul').stop().slideDown(500);
    }).mouseleave(function () {
        $('#category span').css({
            "transform": "rotate(0deg)"
        });
        $('#category ul').stop().slideUp(500);
    })

//    close the login dialog
    $('.closeBtn').on('click',function () {
        $('#loginDialog').animate({
            'width': '100%',
            'height': '0',
            'opacity': '0'
        },1000,function () {
            $('#loginDialog').css({
                'display': 'none'
            })
        })
    });

    //open the login dialog
    $('#loginBtn').click(function () {

        if (($('#loginBtn').html())=='登录'){
            $('#loginDialog').css({
                'display': 'block'
            });

            $('#loginDialog').animate({
                'width': '100%',
                'height': '100%',
                'opacity': '1'
            },1000)
        }
        else{
            //跳转到个人界面
            $.ajax({
                url: '/graduateDesign/user/info',
                type: 'get',
            })
                .done(function(data) {
                    if(data.statusCode){
                        window.location=data.url;
                    }else{
                        alertDialog();
                    }
                })
        }
    });


// open register dialog
    $('.registerBtn').on('click',function () {

        if($('.registerBtn').html()=='注册'){
            $('#registerDialog').css({
                'display': 'block'
            });

            $('#registerDialog').animate({
                'width': '100%',
                'height': '100%',
                'opacity': '1'
            },1000)
        }else
        {
            //注销登录
            $.ajax({
                url: '/graduateDesign/api/exit',
                type: 'get'
            })
                .done(function() {
                    $('#loginBtn').html('登录');
                    $('.registerBtn').html('注册');
                });
        }
    })

    //close the register dialog
    $('.closeReister').on('click',function () {
        $('#registerDialog').animate({
            'width': '100%',
            'height': '0',
            'opacity': '0'
        },1000,function () {
            $('#registerDialog').css({
                'display': 'none'
            })
        })
    });

    // from the login to register
    $('.toRegister').click(function () {
        $('.closeBtn').click();
        $('.registerBtn').click();
    });


    // from the register to login
    $('.toLogin').click(function () {
        $('.closeReister').click();
        $('#loginBtn').click();
    });

    //登录的字段过滤
    $('#submitLoginBtn').on('click',function () {
        var username=$('#username').val();
        var password=$('#password').val();
        var code=$('#validateCode').val();
        var reg=/^([0-9]|[a-zA-Z]){6,16}$/;

        var loginStatus=validateStr(username,reg);
        var passwordStatus=validateStr(password,reg);
        var codeStatus=validateStr(code,/^([0-9]|[a-zA-Z]){4}$/);
        if(loginStatus==false){
            $('#error').html('账户格式错误...');
        }
        else if (passwordStatus==false){
            $('#error').html('密码格式错误...');
        }
        if (codeStatus==false){
            $('#error').html('验证码格式错误...');
        }

        if(loginStatus&&passwordStatus&&codeStatus){
            $.ajax({
                      url: '/graduateDesign/api/login',
                      type: 'post',
                      dataType:'json',
                      data: {
                          'username': username,
                          'password': password,
                          'code': code,
                      },
                  })
                  .done(function(data) {
                      if(data.status==1){
                          //登录成功
                          $('.closeBtn').click();
                          $('#loginBtn').html(data.msg);
                          $('.registerBtn').html('退出');
                      }
                      else{
                          $('#error').html(data.msg);
                      }
                  })
        }

    });

    //注册的过滤
    $('#btnRegister').on('click',function () {
        var username=$('#registerusername').val();
        var password=$('#registerpassword').val();
        var repeat=$('#repeatPassword').val();
        var reg=/^([0-9]|[a-zA-Z]){6,16}$/;

        var loginStatus=validateStr(username,reg);
        var passwordStatus=validateStr(password,reg);

        if(loginStatus==false){
            $('#registerError').html('账户格式错误...');
        }
        else if (passwordStatus==false){
            $('#registerError').html('密码格式错误...');
        }
        if (loginStatus&&passwordStatus){
            if(repeat!=password){
                $('#registerError').html('重复密码与密码不一致');
            }else{
                $('#registerError').html('');
                $.ajax({
                          url: '/graduateDesign/api/register',
                          type: 'post',
                          data: {
                              'username': username,
                              'password': password,
                          },
                      })
                      .done(function(data) {
                          if(data.status==1){
                              $('#loginBtn').html(data.msg);
                              $('.closeReister').click();
                          }else{
                              $('#registerError').html(data.msg);
                          }
                      })
            }
        }




    });

    function validateStr(str,reg) {
        var flag= reg.test(str);
        return flag;
    }
    // $('.about').click(function () {
    //     $.ajax({
    //               url: '/graduateDesign/user/info',
    //               type: 'get',
    //           })
    //           .done(function(data) {
    //                 if(data.statusCode){
    //                     window.location=data.url;
    //                 }else{
    //                     alertDialog();
    //                 }
    //           })
    // })

    function alertDialog() {
        $('.alertDialog').stop().fadeIn(600,function () {
            setTimeout(function () {
                $('.alertDialog').stop().fadeOut(600);
            },1000);
        });
    }
});