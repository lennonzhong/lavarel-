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
        <li class="active">User Data</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
           <div id="infotable">
               <img class="headerIcon" src="" alt="">
               <table>
                   <tr>
                       <td class="text-right">账号：</td>
                       <td><span id="username"></span></td>
                   </tr>
                    <tr>
                        <td class="text-right">E-mail：</td>
                        <td><span class="email"></span></td>
                    </tr>
                   <tr>
                       <td class="text-right">Tel：</td>
                       <td><span class="tel"></span></td>
                   </tr>
                   <tr>
                       <td class="text-right">QQ：</td>
                       <td class="qq"></td>
                   </tr>
                   <tr>
                       <td class="text-right">性别：</td>
                       <td class="sex">男</td>
                   </tr>
               </table>
           </div>
        </div>
    </div>
</body>
</html>