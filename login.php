<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>搜蒐甜點店</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="all.css">
</head>
<body>
    <div class="wrap">
        <div class="navbar">
            <h1 class="logo"><a href="index.php">搜蒐甜點店</a></h1>
            <ul class="nav">
                <li class="nav-content hide"><a href="#">收藏</a></li>
                <li class="nav-content hide"><a href="#">圖鑑</a></li>
                <li class="nav-content"><a href="#"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </div>
        <form action="login.php" method="POST" class="login">
            <h2>登入</h2>
            <div class="login-column">
                <label for="email">帳號 </label>
                <input type="email" id="email" placeholder="請輸入 Email" name="email">
            </div>
            <div class="login-column">
                <label for="pwd">密碼 </label>
                <input type="password" id="pwd" placeholder="請輸入密碼" name="pwd">
            </div>
            <input type="submit" value="登入" class="signup-button">
        </form>

<?php

    require_once('db.php'); // 引入資料庫連線
    session_start(); // 啟動 session

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['pwd'];

    // 驗證使用者資料
        $sql = "SELECT * FROM user WHERE user_Email = '$email' AND user_Password = '$password'";
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
        // 登入成功
            $nowUser = $conn->query("SELECT * FROM user  WHERE user_Email = '$email'");
            $nowUser = $nowUser->fetch_assoc();
            $_SESSION['nowUser'] = $nowUser;
            echo '<script>alert("登入成功");</script>';
            header("Location: index.php"); 
            exit();
        } 
        else {
            // 登入失敗
            $error_message = "帳號或密碼錯誤";
            echo '<script>alert("帳號或密碼錯誤") ; window.location.href = "login.php";</script>';
            exit();
        }

    }

$conn->close();
?>
<script src="all.js"></script>
</body>
</html>

