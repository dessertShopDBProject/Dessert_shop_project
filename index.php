<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>搜蒐甜點店</title>
    <style>
        .header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow: 10px 0px 10px lightgray;
        }
        .menu{
            width:50%;
            display:flex;
            justify-content:space-around;
            padding:10px;
        }
        .menu li{
            list-style-type: none;
            
        }
        .menu li:hover{
            border-bottom:3px solid #F28599;
        }
        .menu a{
            text-decoration:none;
            color:#F2507B;
            font-size:18px;
            display:block;
        }
        .logo{
            text-indent:101%; 
            overflow:hidden; 
            white-space:nowrap; 
            background-image:url('./image/logo-2.png');
            width:350px;
            height:80px;
            border-radius:10px;
        }
        .logo a{
            display:block;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 class="logo"><a href="index.php">搜蒐甜點店</a></h1>
        <ul class="menu">
            <li><a href="select.php">select</a></li>
            <li><a href="insert.php">insert</a></li>
            <li><a href="update.php">update</a></li>
            <li><a href="delete.php">delete</a></li>
        </ul>
    </div>
</body>
</html>
