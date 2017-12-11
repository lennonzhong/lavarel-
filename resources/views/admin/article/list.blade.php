<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../resources/views/pages/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../resources/views/pages/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../resources/views/pages/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('resources/views/org//layui/css/layui.css')}}">
    <script src="{{asset('resources/views/org/layui/layui.js')}}"></script>
    <style>
        .crumb_warp {
            height: 40px;
            line-height: 39px;
            text-indent: 5px;
            border-bottom: 1px solid #e5e5e5;
            background: #f5f5f5;
        }
        * {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        a {
            color: #428bca;
            text-decoration: none;
            cursor: pointer;
            outline: 0;
        }
        .result_wrap {
            padding: 10px 20px;
            border-bottom: 1px solid #e5e5e5;
        }

        .result_content .short_wrap a {
            margin-right: 20px;
        }
        .result_wrap i {
            margin-right: 5px;
        }

        .result_wrap {
            padding: 10px 20px;
            border-bottom: 1px solid #e5e5e5;
        }

        table.list_tab {
            border-collapse: collapse;
            border: 1px solid #ddd;
            font-size: 13px;
            width: 100%;
        }

        table.list_tab tr:nth-child(odd) {
            background: #f9f9f9;
        }
        table.list_tab tr {
            line-height: 35px;
        }

        table.list_tab tr td.tc, table.list_tab tr th.tc {
            text-align: center;
        }
        table.list_tab tr td, table.list_tab tr th {
            padding: 5px;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #e1e1e1;
        }
        table.list_tab tr th {
            font-weight: normal;
            font-size: 14px;
            text-align: left;
            background: #eee;
        }
        table.list_tab tr td, table.list_tab tr th {
            padding: 5px;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #e1e1e1;
        }

        table.list_tab tr td input[type='text'] {
            width: 35px;
            text-align: center;
            display: inline;
        }
        table.list_tab tr input {
            margin-right: 0;
        }
        input[type='text'], input[type='password'] {
            width: 350px;
            margin-right: 5px;
            padding: 6px 5px;
            line-height: 12px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <i class="glyphicon glyphicon-home"></i> <a href="">首页</a> &raquo; 添加文章
    </div>

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/article/create')}}"><i class="glyphicon glyphicon-plus"></i>新增文章</a>
                    <a href="{{url('admin/article')}}"><i class="glyphicon glyphicon-send"></i>文章列表</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>标题</th>
                        <th>发布人</th>
                        <th>更新时间</th>
                        <th>点击次数</th>
                        <th>操作</th>
                    </tr>

                    @foreach($list as $item)
                    <tr>
                        <td class="tc">{{$item->art_id}}</td>
                        <td>
                            <a href="#">{{$item->art_title}}</a>
                        </td>
                        <td>{{$item->art_editor}}</td>
                        <td>{{$item->art_time}}</td>
                        <td>{{$item->art_viewTime}}</td>
                        <td>
                            <a href="{{url('admin/article/'.$item->art_id)}}/edit">修改</a>
                            <a href="javascript:;" onclick="deleteArticle({{$item->art_id}})">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

                <div class="page_list">
                    {{ $list->links() }}
                </div>
                <style>
                    .result_content ul li span{
                        display: block;
                        padding: 0px 12px;
                    }
                </style>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
</body>
</html>
<script>
    function deleteArticle(id) {
        layui.use('layer', function () {
            var layer = layui.layer;
            layer.confirm('您确定删除吗？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                $.ajax({
                    url: 'article/'+id,
                    'type':'delete'
                })
                    .done(function(data) {
                        if(data.status==1){
                            layui.use('layer', function () {
                                var layer = layui.layer;
                                layer.msg(data.msg, {
                                    icon: 1,
                                    time: 1200
                                });
                            });
                        }else{
                            layui.use('layer', function () {
                                var layer = layui.layer;
                                layer.msg(data.msg, {
                                    icon: 2,
                                    time: 1200
                                });
                            });
                        }
                        setTimeout(function () {
                            window.location=window.location;
                        },1200);
                    });
            }, function () {
                layer.msg('未做任何操作', {
                    icon: 1,
                    time: 1000
                });
            });
        })
    }
</script>