$(function () {
    window.onload=function () {
        $.ajax({
            url: '/graduateDesign/user/userdetail',
            type: 'get'
        }).done(function(data) {
                $('.username').html(data.username);
                $('.type').html(data.type);
            });
        $.ajax({
            url: '/graduateDesign/user/detailinfo',
            type: 'get'
        })
            .done(function(data) {
            $("#basicinfo").contents().find(".headerIcon").attr('src',data.uesr_icon);
            $("#basicinfo").contents().find("#username").html(data.user_name);
            $("#basicinfo").contents().find(".email").html(data.email);
            $("#basicinfo").contents().find(".tel").html(data.user_tel);
            $("#basicinfo").contents().find(".sex").html(data.user_sex);
            $("#basicinfo").contents().find(".qq").html(data.user_qq);
        });

        $('#modifyinfo').contents().find("#submitBtn").click(function () {

            var sex=$('#modifyinfo').contents().find('.user_sex');
            var gender;
            for(var i=0;i<sex.length;i++)
            {
                if(sex[i].checked==true){
                    gender=sex[i].value;
                }
            }
            $.ajax({
                url: '/graduateDesign/user/modifyInfo',
                type: 'post',
                data: {
                    'email': $('#modifyinfo').contents().find('#email').val(),
                    'user_tel':$('#modifyinfo').contents().find('#user_tel').val(),
                    'user_qq':$('#modifyinfo').contents().find('#user_qq').val(),
                    'user_sex': gender
                }
            })
                .done(function(data) {
                    if(data.statusCode==1){
                        alert(data.msg);
                    }else{
                        alert(data.msg);
                    }
                })
                .fail(function () {
                    alert('系统出错，请联系管理员....');
                })
        })

        $('#modifypass').contents().find("#submitBtn").click(function () {
            $.ajax({
                      url: '/graduateDesign/user/modifyPass',
                      type: 'post',
                      data: {
                          "oldpassword": $('#modifypass').contents().find('#oldpassword').val(),
                           'newpassword': $('#modifypass').contents().find('#newPassword').val(),
                           'repeatpassword': $('#modifypass').contents().find('#repeat').val()
                      }
                  })
                  .done(function(data) {
                      alert(data.msg);
                  })
                  .fail(function() {
                      alert('系统出错，请联系管理员....');
                  })
        });
    };


    $('#backInfo').click(function () {
        $('.pages >iframe').css({
            'display': 'none'
        });
        $('.pages > #basicinfo').css({
            'display': 'block'
        })
    });

    $('#modifyinformation').click(function () {
        $('.pages >iframe').css({
            'display': 'none'
        });
        $('.pages > #modifyinfo').css({
            'display': 'block'
        })
    });

    $('#modifyPassword').click(function () {
        $('.pages >iframe').css({
            'display': 'none'
        });
        $('.pages > #modifypass').css({
            'display': 'block'
        })
    });

});