<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人界面</title>
    <link rel="stylesheet" href="{{asset('resources/views/pages/css/userinfo.css')}}">
    <link rel="icon" href="{{asset('resources/views/pages/images/icon.ico')}}">
    <link rel="stylesheet" href="{{asset('resources/views/pages/node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <script src="{{asset('resources/views/pages/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('resources/views/pages/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('resources/views/pages/js/userinfo.js')}}"></script>
</head>
<body>
    <div class="topbar">
        个人信息界面
        <div class="pull-right">会员：<span class="username"></span></div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div id="changePage">
                <img src="{{asset('resources/views/pages/images/header.jpg')}}" alt="">
                <div class="info">
                    <ul>
                        <li>用户名：<span class="username"></span></li>
                        <li>类&nbsp;&nbsp;&nbsp;型：<span class="type"></span></li>
                    </ul>
                </div>
                <div class="option">
                    <ul>
                        <li id="backInfo">个人信息</li>
                        <li id="modifyinformation">修改资料</li>
                        <li id="modifyPassword">修改密码</li>
                        <li><a href="{{url('/index')}}">返回首页</a></li>
                    </ul>
                </div>
            </div>
            <div class="pages">
                <iframe id="basicinfo" src="{{url('resources/views/pages/basicinfo.blade.php')}}" frameborder="0"></iframe>
                <iframe id="modifyinfo" src="{{url('resources/views/pages/modifyinfo.blade.php')}}" frameborder="0"></iframe>
                <iframe id="modifypass" src="{{url('resources/views/pages/modifypass.blade.php')}}" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</body>
</html>