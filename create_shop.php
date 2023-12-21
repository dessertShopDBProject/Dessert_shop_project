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
                        echo '<li class="nav-content"><a href="manager_index.php">管理店家</a></li>';
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
            // 從資料庫中獲取最後一個 "shop_ID"
            $sql = "SELECT shop_ID FROM shop ORDER BY shop_ID DESC LIMIT 1";
            $result = $conn->query($sql);
            $lastShopID = $result->fetch_assoc();
            // 取得結果
            // $lastShopID = $result->fetchColumn();
            // 將 "s_" 後的數字提取出來，加1，再組合成新的 "shop_ID"
            $lastNumber = (int) substr($lastShopID['shop_ID'], 2,2);
            $newNumber = $lastNumber + 1;
            $newID = 's_' . sprintf('%02d', $newNumber);
        ?>
        <div class="adjust-shop-main">
            <h2>新增店家</h2>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <label for="shop_ID">店家ID(自動配給)</label>
                <input type="text" id="shop_ID" name="shop_ID" value="<?php echo $newID; ?>" readonly>
                <label for="shop_Name">名稱</label>
                <input type="text" id="shop_Name" name="shop_Name" value="" required>
                <label for="shop_Phone">電話</label>
                <input type="text" id="shop_Phone" name="shop_Phone" value="">
                <label for="shop_Website">網站</label>
                <input type="text" id="shop_Website" name="shop_Website" value="">
                <label for="shop_IG">IG</label>
                <input type="text" id="shop_IG" name="shop_IG" value="">
                <label for="shop_FB">FB</label>
                <input type="text" id="shop_FB" name="shop_FB" value="">
                <label for="shop_Email">Email</label>
                <input type="email" id="shop_Email" name="shop_Email" value="">
                <label for="shop_Address">地址</label>
                <input type="text" id="shop_Address" name="shop_Address" value="" required>
                <label for="shop_ForHere">內用/外帶(預設內用)</label>
                <div>
                    <input type="radio" id="shop_ForHere_1" name="shop_ForHere" value="1" checked><label for="newshop_ForHere_1">內用</label>
                    <input type="radio" id="shop_ForHere_0" name="shop_ForHere" value="0"><label for="newshop_ForHere_0">外帶</label>
                </div>
                <!-- 照片 -->
                <input type="file" name="fileToUpload" id="fileToUpload">
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
<?php
    if (isset($_SESSION["nowUser"]) && !empty($_SESSION["nowUser"]) && $_SESSION['nowUser']['user_Role'] == "manager" &&isset($_FILES["fileToUpload"])) {
        // 檢查表單是否提交
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // 取得表單提交的資料
            $shop_ID = $_POST["shop_ID"];
            $shop_Name = $_POST["shop_Name"];
            $shop_Phone = $_POST["shop_Phone"];
            $shop_Website = $_POST["shop_Website"];
            $shop_IG = $_POST["shop_IG"];
            $shop_FB = $_POST["shop_FB"];
            $shop_Email = $_POST["shop_Email"];
            $shop_Address = $_POST["shop_Address"];
            $shop_ForHere = isset($_POST["shop_ForHere"]) ? intval($_POST["shop_ForHere"]) : NULL;
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
    }
?>
<?php

if(isset($_FILES["fileToUpload"])){
$target_dir = "./temp/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//echo $_FILES['fileToUpload']['tmp_name'];
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    $fileName=$newID;
    $extension  = pathinfo( $_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION ); 
    $baseName=$fileName.".".$extension;
    $destination="./upload/{$baseName}";
    echo $destination;
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $destination);
    
     // 新增進資料庫內
     $insertSql = "INSERT INTO shop(shop_ID, shop_Name, shop_Phone, shop_Website, shop_IG, shop_FB, shop_Email, shop_Address, shop_ForHere,shop_Photo) VALUES ('$shop_ID', '$shop_Name', '$shop_Phone', '$shop_Website', '$shop_IG', '$shop_FB', '$shop_Email', '$shop_Address', '$shop_ForHere','$destination')";


     if ($conn->query($insertSql) === TRUE) {
         header("Location: manager_index.php");
         exit();
     } else {
         echo "錯誤：" . $conn->error;
     }
}
}

?>