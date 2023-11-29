<?php
    require_once 'db.php';
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
        <div class="gallery-main">
            <ul class="gallery-shop">
            <?php 
                    $userID = $_SESSION['nowUser']['user_ID'];
                    $sql = "
                        SELECT shop.*, visited.shop_ID AS visited
                        FROM shop
                        LEFT JOIN visited ON shop.shop_ID = visited.shop_ID AND visited.user_ID = '$userID'
                    ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()){
                            if (!is_null($row['visited'])) {
                                // Shop is visited
                                echo "
                                    <li class='gallery-shop-detail visited'>
                                        <div class='cover'>
                                            <img src='https://wowlavie-aws.hmgcdn.com/file/article_all/A1545983513.jpg'>
                                        </div>
                                        <p>".$row['shop_Name']."</p>
                                        <p>".$row['shop_Address']."</p>
                                    </li>";
                            } else {
                                // Shop is not visited
                                echo "
                                    <li class='gallery-shop-detail'>
                                        <img src='https://wowlavie-aws.hmgcdn.com/file/article_all/A1545983513.jpg'>
                                        <p>".$row['shop_Name']."</p>
                                        <p>".$row['shop_Address']."</p>
                                    </li>";
                            }
                        }
                    }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>