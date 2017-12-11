<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>博客首页</title>
    <link rel="icon" href="{{asset('resources/views/pages/images/icon.ico')}}">
    <link rel="stylesheet" href="{{asset('resources/views/pages/node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <script src="{{asset('resources/views/pages/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('resources/views/pages/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('resources/views/pages/css/aboutMe.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/pages/css/contact.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/pages/css/replay.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/pages/css/base.css')}}">
</head>
<body>
<!--头部开始-->
<header id="header">
    <div class="topbar row">
        <nav class="nav navbar">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img alt="Brand" src="{{url('resources/views/pages/images/blog.png')}}" height="30" style="position: relative;top: -4px;">
                    </a>
                </div>
                <div class="collapse navbar-collapse pull-right">
                    <ul class="nav navbar-nav" id="menus">
                        <li class="active"><a href="{{url('/index')}}">首页</a></li>
                        <li id="category"><a href="#">文章&nbsp;<span class="caret"></span>
                                <ul class="text-center">
                                    @foreach($list as $item)
                                        <li><a href="{{$item->cate_url}}">
                                        {{$item->cate_name}}
                                            </a></li>
                                        @endforeach
                                </ul>
                            </a></li>
                        <li><a href="{{url('/replay')}}">留言板</a></li>
                        <li><a href="{{url('/contact')}}">联系我</a></li>
                        <li class="about"><a href="{{url('/about')}}">关于我</a></li>
                        <li><a href="{{url('admin/index')}}">管理员</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="alertDialog">
            <p>警告！<span class="glyphicon glyphicon-remove pull-right"></span></p>
            <div style="padding: 20px 70px;text-align: center">请先登录，再尝试！！</div>
            <div class="alertClose">
                <a href="javascript:;">关闭全部</a>
            </div>
        </div>

        <div class="pull-right" id="actions">
            <span id="loginBtn"></span>&nbsp;|&nbsp;<span class="registerBtn"></span>
        </div>
    </div>
    <div id="loginDialog">
        <div class="innerDialog">
            <span class="glyphicon glyphicon-remove closeBtn"></span>
            <div class="text-center" style="padding-top: 30px;padding-bottom: 20px">
                <img src="{{url('resources/views/pages/images/title.png')}}" alt="" width="150" style="position:relative;">
            </div>
            <form>
                <div class="form-group">
                    <label for="username">Account</label>
                    <input type="email" class="form-control" id="username" placeholder="输入你的账号...">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="输入你的密码...">
                </div>
                <div class="form-group" id="codeDiv">
                    <label for="validateCode">Validate Code</label>
                    <input type="text" class="form-control" id="validateCode" placeholder="输入验证码...">
                    <img src="/graduateDesign/api/codeUrl" alt="" id="codeImg" onclick="this.src='/graduateDesign/api/codeUrl?'+Math.random()*1000">
                </div>
                <div class="form-group">
                    <p id="error" style="font-size: 14px;"></p>
                </div>
                <div class="form-group btngroup clearfix">
                    <button type="button" class="btn pull-left" id="submitLoginBtn">Submit</button>
                    <span class="pull-right toRegister">还没有账号？去注册</span>
                </div>
            </form>
        </div>
    </div>
    <div id="registerDialog">
        <div class="innerDialog">
            <span class="glyphicon glyphicon-remove closeReister"></span>
            <div class="text-center" style="padding-top: 30px;padding-bottom: 20px">
                <img src="{{url('resources/views/pages/images/title.png')}}" alt="" width="150" style="position:relative;">
            </div>
            <form>
                <div class="form-group">
                    <label for="registerusername">Account</label>
                    <input type="email" class="form-control" id="registerusername" placeholder="输入你的账号...">
                </div>
                <div class="form-group">
                    <label for="registerpassword">Password</label>
                    <input type="password" class="form-control" id="registerpassword" placeholder="输入你的密码...">
                </div>
                <div class="form-group">
                    <label for="validateCode">Repeat Password</label>
                    <input type="password" class="form-control" id="repeatPassword" placeholder="重复密码...">
                </div>
                <div class="form-group">
                    <p id="registerError" style="font-size: 14px;"></p>
                </div>
                <div class="form-group btngroup clearfix">
                    <button type="button" class="btn pull-left" id="btnRegister">Submit</button>
                    <span class="pull-right toLogin">已有账号？去登录</span>
                </div>
            </form>
        </div>
    </div>
    @yield('content');
</header>
@yield('contentBody');
<!--头部结束-->
<!--中间内容区域-->
<!--中间内容区域结束-->
<!--尾部区域-->
<footer id="footer">
    <p class="text-center">Copyright @ 2017 blog.freezone.website . All Rights Reserved Lennon Zhong</p>
</footer>
<!--尾部结束-->
</body>
</html>
<script src="{{url('resources/views/pages/js/index.js')}}"></script>
