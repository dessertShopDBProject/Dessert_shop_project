<?php
require_once('db.php'); // 引入資料庫連線
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="all.css">
</head>

</html>

<body>
    <div class="wrap">
        <div class="navbar">
            <?php
            if (isset($_SESSION['nowUser']) && $_SESSION['nowUser']['user_Role'] == "manager") {
                echo "<h1 class='logo'><a href='manager_index.php'>搜蒐甜點店</a></h1>";
            } else {
                echo "<h1 class='logo'><a href='index.php'>搜蒐甜點店</a></h1>";
            }
            ?>
            <ul class="nav">
                <?php
                if (isset($_SESSION['nowUser'])) {
                    // 使用者已登入，顯示收藏和圖鑑
                    if ($_SESSION['nowUser']['user_Role'] == "manager") {
                        echo '<li class="nav-content"><a href="manager_index.php">管理<br>店家</a></li>';
                    }
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
        <?php
        if (isset($_SESSION["nowUser"]) && !empty($_SESSION["nowUser"]) && $_SESSION['nowUser']['user_Role'] == "manager") {
            // 找出現有資料

            // $shop_ID=$_GET['shop_id'];
            $shop_ID = isset($_GET['shop_id']) ? $_GET['shop_id'] : '';

            $shop_NameQuery = "SELECT shop_Name FROM shop WHERE shop_ID = '$shop_ID'";
            $shop_NameResult = $conn->query($shop_NameQuery);
            $shop_Name = $shop_NameResult->fetch_assoc();
            $shop_Name = $shop_Name["shop_Name"];

            $shop_PhoneQuery = "SELECT shop_Phone FROM shop WHERE shop_ID = '$shop_ID'";
            $shop_PhoneResult = $conn->query($shop_PhoneQuery);
            $shop_Phone = $shop_PhoneResult->fetch_assoc();
            $shop_Phone = $shop_Phone["shop_Phone"];

            $shop_WebsiteQuery = "SELECT shop_Website FROM shop WHERE shop_ID = '$shop_ID'";
            $shop_WebsiteResult = $conn->query($shop_WebsiteQuery);
            $shop_Website = $shop_WebsiteResult->fetch_assoc();
            $shop_Website = $shop_Website["shop_Website"];

            $shop_IGQuery = "SELECT shop_IG FROM shop WHERE shop_ID = '$shop_ID'";
            $shop_IGResult = $conn->query($shop_IGQuery);
            $shop_IG = $shop_IGResult->fetch_assoc();
            $shop_IG = $shop_IG["shop_IG"];

            $shop_FBQuery = "SELECT shop_FB FROM shop WHERE shop_ID = '$shop_ID'";
            $shop_FBResult = $conn->query($shop_FBQuery);
            $shop_FB = $shop_FBResult->fetch_assoc();
            $shop_FB = $shop_FB["shop_FB"];

            $shop_EmailQuery = "SELECT shop_Email FROM shop WHERE shop_ID = '$shop_ID'";
            $shop_EmailResult = $conn->query($shop_EmailQuery);
            $shop_Email = $shop_EmailResult->fetch_assoc();
            $shop_Email = $shop_Email["shop_Email"];

            $shop_AddressQuery = "SELECT shop_Address FROM shop WHERE shop_ID = '$shop_ID'";
            $shop_AddressResult = $conn->query($shop_AddressQuery);
            $shop_Address = $shop_AddressResult->fetch_assoc();
            $shop_Address = $shop_Address["shop_Address"];

            $shop_ForHereQuery = "SELECT shop_ForHere FROM shop WHERE shop_ID = '$shop_ID'";
            $shop_ForHereResult = $conn->query($shop_ForHereQuery);
            $shop_ForHere = $shop_ForHereResult->fetch_assoc();
            $shop_ForHere = $shop_ForHere["shop_ForHere"];



            // 檢查表單是否提交
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // 取得表單提交的資料
                $shop_ID=$_POST["shop_ID"];
                $newshop_Name = $_POST["newshop_Name"];
                $newshop_Phone = $_POST["newshop_Phone"];
                $newshop_Website = $_POST["newshop_Website"];
                $newshop_IG = $_POST["newshop_IG"];
                $newshop_FB = $_POST["newshop_FB"];
                $newshop_Email = $_POST["newshop_Email"];
                $newshop_Address = $_POST["newshop_Address"];
                // $shop_ForHere = $_POST["shop_ForHere"];
                // $shop_ForHere = isset($_POST["shop_ForHere"]) ? $_POST["shop_ForHere"] : null;
                $newshop_ForHere = isset($_POST["newshop_ForHere"]) ? intval($_POST["newshop_ForHere"]) : NULL;
                // if (isset($_POST["shop_ForHere"])) {
                //     $shop_ForHere = $_POST["shop_ForHere"];
                // }
                // else{
                //     $shop_ForHere=NULL;
                // }

                $updateSql = "UPDATE shop SET shop_Name='$newshop_Name', shop_Phone='$newshop_Phone', shop_Website='$newshop_Website', shop_IG='$newshop_IG', shop_FB='$newshop_FB', shop_Email='$newshop_Email', shop_Address='$newshop_Address', shop_ForHere='$newshop_ForHere' WHERE shop_ID='$shop_ID'";

                if ($conn->query($updateSql) === TRUE) {
                    header("Location: shop_info.php?shop_id=$shop_ID");
                    exit();
                } else {
                    echo "錯誤：" . $conn->error;
                }
            }
        }
        ?>
        <div class="adjust-user-main">
            <h2>新增店家</h2>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="shop_ID">店家ID(不可更改)</label>
                <input type="text" id="shop_ID" name="shop_ID" value="<?php echo $shop_ID; ?>" readonly>
                <label for="newshop_Name">名稱</label>
                <input type="text" id="newshop_Name" name="newshop_Name" value="<?php echo $shop_Name; ?>" required>
                <label for="newshop_Phone">電話</label>
                <input type="text" id="newshop_Phone" name="newshop_Phone" value="<?php echo $shop_Phone; ?>">
                <label for="newshop_Website">網站</label>
                <input type="text" id="newshop_Website" name="newshop_Website" value="<?php echo $shop_Website; ?>">
                <label for="newshop_IG">IG</label>
                <input type="text" id="newshop_IG" name="newshop_IG" value="<?php echo $shop_IG; ?>">
                <label for="newshop_FB">FB</label>
                <input type="text" id="newshop_FB" name="newshop_FB" value="<?php echo $shop_FB; ?>">
                <label for="newshop_Email">Email</label>
                <input type="email" id="newshop_Email" name="newshop_Email" value="<?php echo $shop_Email; ?>">
                <label for="newshop_Address">地址</label>
                <input type="text" id="newshop_Address" name="newshop_Address" value="<?php echo $shop_Address; ?>" required>
                <label for="newshop_ForHere">內用/外帶(預設內用)</label>
                <input type="radio" id="newshop_ForHere_1" name="newshop_ForHere" value="1" <?php if($shop_ForHere=='1'){echo "checked";} ?>>內用
                <input type="radio" id="newshop_ForHere_0" name="newshop_ForHere" value="0"<?php if($shop_ForHere=='0'){echo "checked";} ?>>外帶
                <!-- 照片 -->
                <button type="submit" class="user-update">送出</button>
            </form>
        </div>
    </div>
    <div class="footer">
        <div class="left-footer"><img src='../image/logo-4.png'></div>
        <div class="right-footer">
            <p>Copyright © 2023 搜蒐甜點店 All Rights Reserved</p>
        </div>
    </div>
    <script src="all.js"></script>
</body>

</html>