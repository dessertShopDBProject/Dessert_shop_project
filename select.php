<?php
// 載入db.php來連結資料庫
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
            <div class="select-search-section">
                <input type="text" placeholder="請輸入店名或甜點關鍵字" name="keyword" class="select-search-bar">
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
                <select class="style-choice" name="style-choice">
                    <option value='all'>全部</option>
                <?php //更改處
                    $sql = "
                    SELECT *
                    FROM desstype";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()){
                            echo "<option value='".$row['desstype_Name']."'>".$row['desstype_Name']."</option>";
                        }}
                ?>
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
        </form>
        <div id="search-result">
        <?php
            if (isset($_SESSION['indexSearchResultHTML'])) {
                echo $_SESSION['indexSearchResultHTML'];
                unset($_SESSION['indexSearchResultHTML']);
            }
            else{
            $searchTerm=array();
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
            $zone = isset($_GET['zone-choice']) ? $_GET['zone-choice'] :'';
            $style= isset($_GET['style-choice']) ? $_GET['style-choice'] :'';
            if (isset($_SESSION['nowUser']['user_ID'])) {
                $userID = $_SESSION['nowUser']['user_ID'];
            }
            $noVisited = isset($_GET['no-visited']) ? true : false;
            $fourStar = isset($_GET['four-star']) ? true : false;
            
            $sql = "SELECT DISTINCT shop.shop_ID, shop_Name, shop_Address,shop_Phone 
            FROM shop 
            LEFT JOIN dessert ON shop.shop_ID = dessert.shop_ID
            LEFT JOIN desstype ON dessert.desstype_ID=desstype.desstype_ID";
            $sql .= " WHERE 1=1";  // To always have a valid condition to append
            
            if ($keyword !== null) {
                $sql .= " AND (shop_Name LIKE '%$keyword%' OR dess_Name LIKE '%$keyword%' OR desstype_Name LIKE '%$keyword%')";
            }
            if ($zone !== 'all') {
                $sql .= " AND shop_Address LIKE '%$zone%'";
            }
            if ($style !== "all") {
                $sql .= " AND desstype_Name='$style'";
            }
            if ($noVisited) {
                $sql .= " AND shop.shop_ID NOT IN (SELECT shop_ID FROM visited WHERE user_ID='$userID')";
            }

            if ($fourStar) {
                $sql .= " AND shop.shop_ID IN (SELECT shop_ID FROM comment GROUP BY shop_ID HAVING AVG(com_Rating) >= 4)";
            }

            $result = $conn->query($sql);
            
            // 顯示查詢結果
            echo "<ul class='shop-list'>";
            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $shopID=$row["shop_ID"];
                $rating_sql="SELECT shop_ID,AVG(com_Rating) AS Rating_avg FROM comment WHERE shop_ID='$shopID' GROUP BY shop_ID";
                $result_rating=$conn->query($rating_sql);
                
                $shopName= $row["shop_Name"];
                echo"
                    <li>
                    <img src='#' alt=$shopName>
                    <div class='shop-list-content'>
                        <div class='name-and-comment'>
                            <h2>$shopName</h2>";
                            if($result_rating->num_rows > 0) {
                                $row_rating = $result_rating->fetch_assoc();
                                echo "<p>" .round($row_rating['Rating_avg'],1). "<i class='fa-solid fa-star'></i></p>";
                            };
                echo "
                        </div>
                        <p><i class='fa-solid fa-phone' style='color: #199b08; margin-right:5px;'></i>".$row['shop_Phone']."</p>
                        <p><i class='fas fa-map-marker-alt' style='color: #fb1313;'></i>".$row['shop_Address']."</p>
                        <p>";
                        $tagSql="SELECT COUNT(desstype_Name) AS SumofType,desstype_Name FROM dessert,desstype,shop
                        WHERE dessert.desstype_ID=desstype.desstype_ID  AND shop.shop_ID=dessert.shop_ID AND shop.shop_ID='$shopID'
                        GROUP BY desstype_Name ORDER BY SumofType DESC LIMIT 3";
                        $result_tag=$conn->query($tagSql);
                        if($result_tag->num_rows>0){
                            while($row_tag = $result_tag->fetch_assoc()){
                                echo  "<i class='fa-solid fa-tags' style='color: #FF9B8F;margin:5px;'></i>".$row_tag['desstype_Name']."";
                            }
                            
                        }    
                        echo "</p>
                        <a href='shop_info.php?shop_id=" . $row["shop_ID"] . "'><input type='submit' value='查看詳細資訊' name='shop-detail-button' class='shop-detail-button'></a>
                    </div>
                    </li>";
                }
            } else {
                echo "<script>alert('没有找到匹配的结果'); window.location.href = 'select.php';</script>";
                exit();
            }
            echo "</ul>";
        }
            // 關閉資料庫連接
            $conn->close();
            ?>
        </div>
        </div>
    </div>
    <div class="footer">
        <div class="left-footer"><img src='../image/logo-4.png'></div>
        <div class="right-footer">
            <p>Copyright © 2023 搜蒐甜點店 All Rights Reserved</p>
        </div>
    </div>
</body>
</html>