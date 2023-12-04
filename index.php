<?php
    require_once 'db.php';
    //session_start();
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
        <div class="main">
        <form action="select.php" method="GET">
            <div class="search-section">
                <input type="text" placeholder="請輸入店名或甜點名稱關鍵字" name="keyword" class="search-bar">
                <select class="zone-choice" name="zone-choice">
                    <option value="all">全部</option>
                    <option value="中壢區">中壢區</option>
                    <option value="平鎮區">平鎮區</option>
                    <option value="龍潭區">龍潭區</option>
                    <option value="復興區">復興區</option>
                    <option value="大溪區">大溪區</option>
                    <option value="八德區">八德區</option>
                    <option value="桃園區">桃園區</option>
                    <option value="龜山區">龜山區</option>
                    <option value="蘆竹區">蘆竹區</option>
                    <option value="大園區">大園區</option>
                    <option value="觀音區">觀音區</option>
                    <option value="新屋區">新屋區</option>
                    <option value="楊梅區">楊梅區</option>
                </select>
                <?php
                if (isset($_SESSION['nowUser'])) {
                    echo "<input type='checkbox' name='no-visited' id='no-visited'>
                    <label for='no-visited'>不看去過的店家</label>";
                }
                ?>
                <div>
                    <input type="checkbox" name="four-star" id="four-star">
                    <label for="four-star">4 星以上</label>
                </div>
                <input type="submit" value="搜尋" class="search-button">
            </div>
            <ul class="style-choice">
                <?php //更改處
                    $sql = "
                    SELECT *
                    FROM type";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()){
                            // Shop is visited
                            echo "<li class='style' name='dess-type' id='dess-type'><a href='select.php?keyword=".$row['type_Nam']."'".$row['type_ID']."' name='dess-type' id='dess-type' >".$row['type_Nam']."</a></li>";
                        }}
                ?>
            </ul>
            </form>
            <h2 class="title">最多人收藏的店</h2>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php 
                        $sql="SELECT shop.*,COUNT(favorite.user_ID) FROM shop JOIN favorite ON shop.shop_ID = favorite.shop_ID GROUP BY shop.shop_ID ORDER BY COUNT(favorite.user_ID) DESC";
                        $result=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($result)) {
                            echo "<div class='swiper-slide'><img src='../image/dessert.jpg'><p>".$row["shop_Name"]."</p></div>";
                        }
                    ?>
                  
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <h2 class="title">大家都去...</h2>
            <div class="swiper">
                <div class="swiper-wrapper">
                  <?php 
                        $sql="SELECT shop.*,COUNT(visited.user_ID) FROM shop JOIN visited ON shop.shop_ID = visited.shop_ID GROUP BY shop.shop_ID ORDER BY COUNT(visited.user_ID) DESC";
                        $result=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($result)) {
                            echo "<div class='swiper-slide'><img src='../image/dessert.jpg'></div>";
                        }
                    ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <div class="footer">
            <div class="left-footer"><img src='../image/logo-2.jfif'></div>
            <div class="center-footer">
                <h3>搜蒐甜點店</h3>    
                <ul>
                    <li><a href="index.php">首頁</a></li>
                    <li><a href="index.php">首頁</a></li>
                    <li><a href="index.php">首頁</a></li>
                    <li><a href="index.php">首頁</a></li>
                    <li><a href="index.php">首頁</a></li>
                    <li><a href="index.php">首頁</a></li>
                </ul>
            </div>
            <div class="right-footer">
                <p>Copyright © 2023 搜蒐甜點店 All Rights Reserved</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="swiper.js"></script>
    <script src="all.js"></script>
</body>
</html>