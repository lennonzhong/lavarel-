<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{asset('resources/views/pages/images/icon.ico')}}">
    <link rel="stylesheet" href="{{asset('resources/views/pages/node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <script src="{{asset('resources/views/pages/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('resources/views/pages/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('resources/views/pages/css/admin.css')}}">
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

        table.add_tab tr th {
            text-align: right;
            font-weight: normal;
            padding-right: 10px;
            font-size: 14px;
            border: 1px solid #eee;
        }

        select {
            font-size: 12px;
            border-collapse: collapse;
            padding: 0 5px;
            height: 25px;
            line-height: 25px;
        }
        table.add_tab {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #eee;
        }

        tbody {
            display: table-row-group;
            vertical-align: middle;
            border-color: inherit;
        }

        table.add_tab tr {
            line-height: 40px;
            border: 1px solid #eee;
        }

        table.add_tab tr th {
            text-align: right;
            font-weight: normal;
            padding-right: 10px;
            font-size: 14px;
            border: 1px solid #eee;
            width: 200px;
        }
        table.add_tab tr td {
            text-align: left;
            padding: 3px 10px;
            font-size: 12px;
        }

        input[type='text'], input[type='password'] {
            width: 350px;
            margin-right: 5px;
            padding: 6px 5px;
            line-height: 12px;
            font-size: 12px;
        }

        i.require {
            color: #f60;
            font-family: serif;
            margin-right: 5px;
        }

        textarea {
            width: 580px;
            height: 55px;
            padding: 6px 5px;
            display: block;
            margin: 10px 0;
            font-size: 14px;
            line-height: 14px;
        }

    </style>
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <i class="glyphicon glyphicon-home"></i> <a href="">首页</a> &raquo; 添加文章
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/article/create')}}"><i class="glyphicon glyphicon-plus"></i>新增文章</a>
                <a href="{{url('admin/article')}}"><i class="glyphicon glyphicon-send"></i>文章列表</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/article')}}" method="post">
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>分类：</th>
                        <td>
                            <select name="art_pid">
                                @foreach($kinds as $item)
                                    <option value="{{$item->cate_id}}">{{$item->cate_name}}</option>
                                    @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>作者：</th>
                        <td>
                            <input type="text" class="sm" name="art_editor">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>文章名称：</th>
                        <td>
                            <input type="text" class="lg" name="art_title"><span style="color: red;">* <?php  echo session('msg');?></span>
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>文章标签：</th>
                        <td>
                            <input type="text" class="md" name="art_tag"><span style="color: red;">* <?php  echo session('msg');?></span>
                        </td>
                    </tr>


                    <tr>
                        <th>文章缩略图：</th>
                        <td>
                            <input type="text" name="art_thumb" size="50" id="art_thumb">
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                            <style>

                                .uploadify{display:inline-block;}
                                .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
                                table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
                            </style>
                            <script src="{{asset('resources/views/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('resources/views/org/uploadify/uploadify.css')}}">
                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#file_upload').uploadify({
                                        'buttonText':'图片上传',
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                        },
                                        'swf':"{{asset('resources/views/org/uploadify/uploadify.swf')}}",
                                        'uploader': "{{url('admin/upload')}}",
                                        'onUploadSuccess':function (file,data,response) {
                                            $('#art_thumb').val(data);
                                            $('#uploadImg').attr('src','/graduateDesign/'+data);
                                        }
                                    });
                                });
                            </script>
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <td>
                            <img id="uploadImg" style="max-width: 350px; max-height: 120px;">
                        </td>
                    </tr>
                    <tr>
                        <th>文章内容：</th>
                        <td>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/views/org/ueditor/ueditor.config.js')}}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/views/org/ueditor/ueditor.all.min.js')}}"> </script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/views/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                            <script id="editor" name="art_content" type="text/plain" style="width:768px;height:300px;"></script>
                            <script type="text/javascript">
                                var ue = UE.getEditor('editor');
                            </script>
                            <style>
                                .edui-default{line-height: 28px;}
                                div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                                {overflow: hidden; height:20px;}
                                div.edui-box{overflow: hidden; height:22px;}
                            </style>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input class="btn btn-primary" type="submit" value="提交">
                            <input class="btn btn-default" style="margin-left: 40px" type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>