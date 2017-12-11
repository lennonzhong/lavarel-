<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin后台管理</title>
    <link rel="icon" href="{{asset('resources/views/pages/images/icon.ico')}}">
    <link rel="stylesheet" href="{{asset('resources/views/pages/node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <script src="{{asset('resources/views/pages/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('resources/views/pages/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('resources/views/pages/css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/org//layui/css/layui.css')}}">
    <script src="{{asset('resources/views/org/layui/layui.js')}}"></script>
</head>
<body>
<div class="top_box">
    <div class="top_left">
        <div class="logo">后台管理</div>
        <ul>
            <li><a href="" class="active">首页</a></li>
            <li><a href="{{url('/index')}}">前端页面</a></li>
        </ul>
    </div>
    <div class="top_right">
        <ul>
            <li>管理员：<?php echo session('user') ?></li>
        </ul>
    </div>
</div>
<div class="menu_box">
    <ul>
        <li>
            <h3 class="text-center"><i class="glyphicon glyphicon-th-list"></i>&nbsp;常用操作</h3>
            <ul class="sub_menu" style="display: block;">
                <li><a href="{{url('admin/category')}}" target='main'><i class="glyphicon glyphicon-align-right"></i>&nbsp;&nbsp;分类列表</a></li>
                <li><a href="{{url('admin/article')}}" target='main'><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;文章列表</a></li>
                <li><a href="{{url('admin/category')}}" target='main'><i class="glyphicon glyphicon-share-alt"></i>&nbsp;&nbsp;友情链接</a></li>
            </ul>
        </li>
    </ul>
</div>
<div class="main_box">
    <iframe src="{{url('resources/views/admin/info.blade.php')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
</div>
</body>
</html>
<script>
    $(function(){
        $('.sub_menu').find('li').click(function(){
            $(this).parents('.menu_box').find('li').removeClass('on');
            $(this).addClass('on');
        });
    });

    //左侧点击弹开子菜单
    $(function(){
        $('.menu_box').find('ul').find('li').eq(0).find('.sub_menu').show();
        $('.menu_box').find('ul').find('li').find('h3').click(function(){
            $(this).parent('li').find('.sub_menu').slideToggle();
        });
    })

    //tab面板切换
    $(function(){
        $('.tab_content').eq(0).show();
        $('.tab_title li').click(function() {
            var index = $(this).index();
            $(this).addClass('active').siblings('li').removeClass('active');
            $('.tab_content').eq(index).show().siblings('.tab_content').hide();
        });
    });
</script>