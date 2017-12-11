<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/location.css">
</head>
<body>
<div class="location">
    <ol class="breadcrumb">
        你当前的位置为：<li><a href="">Home</a></li>
        <li class="active">修改密码</li>
    </ol>
</div>
<div class="container">
    <div class="row">
        <div id="modifyPass">
            <table>
                <tr>
                    <td class="text-right">原密码：</td>
                    <td><input type="text" id="oldpassword"></td>
                </tr>
                <tr>
                    <td class="text-right">新密码：</td>
                    <td><input type="text" id="newPassword"></td>
                </tr>
                <tr>
                    <td class="text-right">重复密码：</td>
                    <td><input type="text" id="repeat"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button id="submitBtn">Submit</button>
                        <input type="reset" value="Reset" style="margin-left: 50px"></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>