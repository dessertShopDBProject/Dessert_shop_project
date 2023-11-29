<?php
        require_once('db.php'); // 引入資料庫連線
        session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>搜蒐甜點店</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="all.css">
    
</head>
<body>
    <div class="wrap">
        <div class="navbar">
            <h1 class="logo"><a href="index.php">搜蒐甜點店</a></h1>
            <ul class="nav">
                <?php
                    if (isset($_SESSION['nowUser'])) {
                        // 使用者已登入，顯示收藏和圖鑑
                        echo '<li class="nav-content"><a href="favorite.php?userid=' . $_SESSION['nowUser']['user_ID'] . '">收藏</a></li>';
                        echo '<li class="nav-content"><a href="gallery.php?userid=' . $_SESSION['nowUser']['user_ID'] . '">圖鑑</a></li>';
                        echo '<li class="nav-content"><a href="user_info.php?userid=' . $_SESSION['nowUser']['user_ID'] . '"><i class="fa-solid fa-user"></i></a></li>';
                    } else {
                        // 使用者未登入
                        echo '<li class="nav-content hide"><a href="#">收藏</a></li>';
                        echo '<li class="nav-content hide"><a href="#">圖鑑</a></li>';
                        echo '<li class="nav-content"><a href="signup.php"><i class="fa-solid fa-user"></i></a></li>';
                    }
                ?>
                
            </ul>
        </div>
    </div>
    <?php
        // 檢查是否有 NowUser 的 session，並確認是否有登入資訊
        if (isset($_SESSION["nowUser"]) && !empty($_SESSION["nowUser"])) {
        // 存在 NowUser 的 session，取出相應的用戶資訊
            $nowUser = $_SESSION["nowUser"];
            $showUser = $nowUser['user_ID'];
            $nickname = $nowUser['user_NickName'];
            $email = $nowUser['user_Email'];
            $pwd=$nowUser['user_Password'];

            echo"
            <div class='main-user-info'>
                <div class='setting'>
                    <img src='#' alt='user photo'>
                    <p><a href='#'>修改資料</a></p>
                    <p><a href='logout.php'>登出</a></p>
                </div>
                <div class='info'>
                    <p>名稱(暱稱):".$nickname."</p>
                    <p>電子郵件:".$email."</p>
                    <p>密碼:".$pwd."</p>
                    <div class='link'>";
                    echo "
                        <a href='favorite.php?userid=$showUser' class='favorite'>
                            收藏
                        </a>";
                    echo "
                    <a href='gallery.php?userid=$showUser' class='collection'>
                        圖鑑
                    </a>
                    </div>
                </div>
            </div>";
        }
    ?>

</body>
</html>