<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        ul,ol{
            list-style: none;
        }
        .locationtip{
            width: 100%;
            height: 40px;
        }
        .crumb_warp > .breadcrumb li{
            display: block;
            list-style: none;
            float: left;
        }


        .result_title {
            line-height: 35px;
            padding-bottom: 5px;
            overflow: hidden;
        }
        .result_title h3 {
            font-size: 14px;
        }

        .result_content .short_wrap a {
            margin-right: 20px;
        }
        a {
            color: #428bca;
            text-decoration: none;
            cursor: pointer;
            outline: 0;
        }
        .result_wrap i {
            margin-right: 5px;
        }

        .result_wrap {
            padding: 10px 20px;
            border-bottom: 1px solid #e5e5e5;
        }

        .result_title {
            line-height: 35px;
            padding-bottom: 5px;
            overflow: hidden;
        }
        .result_title h3 {
            font-size: 14px;
        }
        .result_content ul li {
            line-height: 35px;
            border-bottom: 1px dashed #eaeaea;
        }

        .result_content ul li label {
            color: #909090;
            display: inline-block;
            width: 150px;
            padding-right: 10px;
            text-align: right;
        }
        label {
            margin-right: 15px;
            vertical-align: middle;
            font-family: sans-serif SimSun-ExtB;
        }
        .result_content ul li span {
            font-size: 15px;
        }
    </style>
    <link rel="stylesheet" href="../pages/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../pages/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../pages/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
<!--面包屑导航 开始-->
<div class="locationtip">
    <ol class="breadcrumb">
        你当前的位置为：
        <li><a href="">Home</a></li>
        <li class="active">系统基本信息</li>
    </ol>
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>快捷操作</h3>
    </div>
    <div class="result_content">
        <div class="short_wrap">
            <a href="#"><i class="glyphicon glyphicon-plus"></i>新增文章</a>
            <a href="#"><i class="glyphicon glyphicon-minus"></i>批量删除</a>
        </div>
    </div>
</div>
<!--结果集标题与导航组件 结束-->


<div class="result_wrap">
    <div class="result_title">
        <h3>系统基本信息</h3>
    </div>
    <div class="result_content">
        <ul>
            <li>
                <label>操作系统</label><span><?php echo PHP_OS;?></span>
            </li>
            <li>
                <label>运行环境</label><span><?php echo $_SERVER['SERVER_SOFTWARE'];?></span>
            </li>
            <li>
                <label>更迭版本</label><span>v-1.0</span>
            </li>
            <li>
                <label>上传附件限制</label><span><?php echo get_cfg_var('upload_max_filesize') ?></span>
            </li>
            <li>
                <label>北京时间</label><span><?php echo date('y年m月d日  h:m') ?></span>
            </li>
            <li>
                <label>服务器域名/IP</label><span><?php echo $_SERVER['SERVER_SOFTWARE'] ?></span>
            </li>
            <li>
                <label>Host</label><span><?php echo $_SERVER['SERVER_ADDR'] ?></span>
            </li>
        </ul>
    </div>
</div>
</body>
</html>