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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="all.js"></script>
        <link rel="stylesheet" href="all.css">
    </head>

    <body>
        <div class="wrap">
            <div class="navbar">
                <?php
                if (isset($_SESSION['nowUser']) && $_SESSION['nowUser']['user_Role'] == "manager")
                {
                    echo "<h1 class='logo'><a href='manager_index.php'>搜蒐甜點店</a></h1>";
                }
                else
                {
                    echo "<h1 class='logo'><a href='index.php'>搜蒐甜點店</a></h1>";
                }
                ?>
                <form action="select.php" method="GET" class="search-section">
                    <input type="button" name="zone-choice" id="index-zone-choice" value="選擇地區">
                    <ul class="zone-choice-dropdown">
                        <li><a href="select.php?zone-choice=中壢區">中壢區</a></li>
                        <li><a href="select.php?zone-choice=桃園區">桃園區</a></li>
                    </ul>
                    <input type="button" name="style-choice" id="index-style-choice" value="選擇種類">
                    <ul class="style-choice-dropdown">
                        <?php //更改處
                        $sql = "SELECT * FROM desstype";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0)
                        {
                            while ($row = $result->fetch_assoc())
                            {
                                // Shop is visited
                                echo "<li class='style' name='dess-type' id='dess-type'><a href='select.php?style-choice=" . $row['desstype_Name'] . "' id='dess-type' >" . $row['desstype_Name'] . "</a></li>";
                            }
                        }
                        ?>
                    </ul>
                    <input type="text" placeholder="請輸入店名或甜點名稱關鍵字" name="keyword" class="search-bar">
                    <div class="search-choice">
                        <?php
                        if (isset($_SESSION['nowUser']))
                        {
                            echo "<input type='checkbox' name='no-visited' id='no-visited-input' >
                        <label for='no-visited-input' id='no-visited-label'>不看去過的店家</label>";
                        }
                        ?>
                        <input type='checkbox' name='four-star' id='four-star-input'>
                        <label for='four-star-input' id='four-star-label'>四星以上</label>
                        <input type="submit" value="搜尋" class="search-button">
                    </div>
                </form>
                <ul class="nav">
                    <?php
                    if (isset($_SESSION['nowUser']))
                    {
                        // 使用者已登入，顯示收藏和圖鑑
                        if ($_SESSION['nowUser']['user_Role'] == "manager")
                        {
                            echo '<li class="nav-content"><a href="manager_index.php">管理店家</a></li>';
                        }
                        echo '<li class="nav-content"><a href="favorite.php?userid=' . $_SESSION['nowUser']['user_ID'] . '">收藏</a></li>';
                        echo '<li class="nav-content"><a href="gallery.php?userid=' . $_SESSION['nowUser']['user_ID'] . '">圖鑑</a></li>';
                        echo '<li class="nav-content"><a href="user_info.php?userid=' . $_SESSION['nowUser']['user_ID'] . '"><i class="fa-solid fa-user"></i></a></li>';
                    }
                    else
                    {
                        // 使用者未登入
                        echo '<li class="nav-content hide"><a href="#">收藏</a></li>';
                        echo '<li class="nav-content hide"><a href="#">圖鑑</a></li>';
                        echo '<li class="nav-content"><a href="signup.php"><i class="fa-solid fa-user"></i></a></li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="manager-main">
                <?php
                $sql = "SELECT * FROM desstype";
                $result = $conn->query($sql);
                if ($result->num_rows > 0)
                {
                    echo "<table>";
                    echo "<tr><th>desstype_ID</th><th>desstype_Name</th><th>Action</th></tr>";
                    while ($row = $result->fetch_assoc()){
                        $changed_desstype_ID = $row['desstype_ID'];
                        $changed_desstype_Name = $row['desstype_Name'];
                        echo "<tr>";
                        echo "<td>{$row['desstype_ID']}</td>";
                        echo "<td>{$row['desstype_Name']}</td>";
                        
                        echo "<td><button class='search-button modify-button'  onclick= \"modifyRow('$changed_desstype_ID' ,'$changed_desstype_Name')\")'>Edit</button>";

                        echo "<script>function deletionDessType(ID){
                            console.log('hi');
                            if (confirm('確定要刪除此Dessert Type嗎？')) {
                                window.location.href = 'delete_dessType.php?id=' + ID;
                            } else {
                                window.location.href = 'manager_dessType_index.php';
                            }   
                        }</script>";
                        echo "<td><button type='submit'  onclick=\"deletionDessType('$changed_desstype_ID')\" >刪除</button></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "0 results";
                }

                $conn->close();
                ?>
                
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