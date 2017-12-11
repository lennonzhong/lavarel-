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
<div class="tips">
    <ol class="breadcrumb">
        你当前的位置为：
        <li><a href="">Home</a></li>
        <li class="active">系统基本信息</li>
    </ol>
</div>
<div class="container">
    <div class="row">
        <div id="modifyForm">
            <form>
                <table>
                    <tr>
                        <td class="text-right">E-mail：</td>
                        <td><input type="text" id="email"></td>
                    </tr>
                    <tr>
                        <td class="text-right">Tel：</td>
                        <td><input type="text" id="user_tel"></td>
                    </tr>
                    <tr>
                        <td class="text-right">QQ：</td>
                        <td><input type="text" id="user_qq"></td>
                    </tr>
                    <tr>
                        <td class="text-right">性别：</td>
                        <td>男<input type="radio"  class="user_sex" name="user_sex" checked value="male">&nbsp;&nbsp;&nbsp;女<input type="radio" class="user_sex" name="user_sex" value="female"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button id="submitBtn">Submit</button>
                            <input type="reset" value="Reset" style="margin-left: 50px"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>