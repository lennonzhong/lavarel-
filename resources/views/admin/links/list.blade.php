<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{url('resources/views/admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{url('resources/views/admin/style/js/ch-ui.admin.js')}}"></script>
    <script type="text/javascript" src="{{url('resources/views/org/layui/layui.js')}}"></script>
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
    <i class="fa fa-home"></i> <a href="{{url('admin/links')}}">首页</a> &raquo; 友情链接
</div>
<!--搜索结果页面 列表 开始-->
<form action="#" method="post">
    <div class="result_wrap">
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/links/create')}}"><i class="fa fa-plus"></i>新增链接</a>
                <a href="{{url('admin/links')}}"><i class="fa fa-recycle"></i>链接列表</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc">排序</th>
                    <th class="tc">ID</th>
                    <th>链接名称</th>
                    <th>链接描述</th>
                    <th>链接</th>
                    <th>操作</th>
                </tr>

                @foreach($data as $v)

                    <tr>
                        <td class="tc">
                            <input type="text" onchange="changeOrder(this,{{$v->link_id}})" value="{{$v->link_order}}">
                        </td>
                        <td class="tc">
                            {{$v->link_id}}
                        </td>
                        <td class="tc">
                            {{$v->link_name}}
                        </td>
                        <td>
                            <a href="#">{{$v->link_description}}</a>
                        </td>
                        <td>{{$v->link_url}}</td>
                        <td>
                            <a href="{{url('admin/links/'.$v->link_id.'/edit')}}">修改</a>
                            <a onclick="deleteItem({{$v->link_id}})">删除</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
</body>
<script>
    function changeOrder(elem, link_id) {
        var value = $(elem).val();
        $.ajax({
            url: '{{url('admin/links/changeOrder')}}',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                "value": value,
                "link_id": link_id
            }
        })
            .done(function (data) {
                if (data.status) {
                    layui.use('layer', function () {
                        var layer = layui.layer;
                        layer.msg(data.msg, {
                            icon: 1,
                            time: 1000
                        });
                    });
                } else {
                    layui.use('layer', function () {
                        var layer = layui.layer;
                        layer.msg(data.msg, {
                            icon: 2,
                            time: 1000
                        });
                    });
                }
            })
    }

    function deleteItem(link_id) {
        console.log(link_id);
        $.ajax({
            type:'delete',
            url: 'links/'+link_id,
            data:{
                "_token": '{{csrf_token()}}'
            }
        })
            .done(function (data) {
                window.location.href=window.location;
                if (data.status) {
                    layui.use('layer', function () {
                        var layer = layui.layer;
                        layer.msg(data.msg, {
                            icon: 1,
                            time: 1000
                        });
                    });
                } else {
                    layui.use('layer', function () {
                        var layer = layui.layer;
                        layer.msg(data.msg, {
                            icon: 2,
                            time: 1000
                        });
                    });
                }
            })
    }
</script>
</html>