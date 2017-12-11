<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{url('resources/views/admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{url('resources/views/admin/style/js/ch-ui.admin.js')}}"></script>
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; 添加链接
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增链接</a>
                <a href="category/index"><i class="fa fa-recycle"></i>分类列表</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/links')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th><i class="require">*</i>链接名称：</th>
                    <td>
                        <input type="text" class="sm" name="link_name"><span style="color: red;">* <?php  echo session('msg');?></span>
                    </td>
                </tr>


                <tr>
                    <th>链接描述：</th>
                    <td>
                        <input type="text" class="lg" name="link_name">
                    </td>
                </tr>

                <tr>
                    <th>URL：</th>
                    <td>
                        <input type="text" name="link_url">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>链接排序：</th>
                    <td>
                        <input type="text" class="sm" name="link_order">
                        <span><i class="fa fa-exclamation-circle yellow"></i>这里排序数字</span>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>