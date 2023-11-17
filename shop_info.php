<?php
// 載入 db.php 來連結資料庫
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>搜蒐甜點店</title>
    <style>
    .search-bar {
        width: 70%;
        height: 30px;
        border-radius: 10px;
        background-color: lightgray;
    }
    </style>
</head>

<body>
    <?php
    // 獲取 Shop_ID 參數
    $shopID = isset($_GET['shop_id']) ? $_GET['shop_id'] : '';

    // 查詢資料
    $sql = "SELECT * FROM dessert_shop WHERE Shop_ID = '$shopID'";
    $result = $conn->query($sql);

    // 顯示查詢結果
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>店家詳細資訊</h2>";
        echo "<p><strong>Name:</strong> " . $row["Shop_Name"] . "</p>";
        echo "<p><strong>Email:</strong> " . $row["Shop_Email"] . "</p>";
        echo "<p><strong>Seat:</strong> " . $row["Shop_Seat"] . "</p>";
        echo "<p><strong>Phone:</strong> " . $row["Shop_Phone"] . "</p>";
        echo "<p><strong>Website:</strong> " . $row["Shop_Website"] . "</p>";

        // Add a form with a button to submit the data
        echo "<form method='POST'>";
        echo "<input type='submit' name='addToFavorites' value='加入我的最愛'>";
        echo "</form>";

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addToFavorites'])) {
            $insertSQL = "INSERT INTO fav (shop_id, fav_id) VALUES ('$shopID', 'fav0000001')";

            if ($conn->query($insertSQL) === TRUE) {
                echo "加入我的最愛成功！";
            } else {
                echo "Error: " . $insertSQL . "<br>" . $conn->error;
            }
        }
    } else {
        echo "未找到相應的店家資訊";
    }
?>

    <div class="comment">
        <p>ping</p>
        <form action="shop_info.php?shop_id=<?php echo $shopID?>" method="POST">
            <input type="text" placeholder="寫下你的看法..." class="comment-content" name="comment_content">
            <input type="number" class="comment-rating" name="comment_rating">
            <input type="submit" value="新增評論">
        </form>

        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["comment_content"]) && isset($_POST["comment_rating"])) {
       
        $com_content = $_POST["comment_content"];
        $com_rating = $_POST["comment_rating"];
        $com_date = date("Y-m-d");
        // Retrieve the current minimum com_id for the specified shop_id
        $result = $conn->query("SELECT MAX(com_id) AS max_com_id FROM comment WHERE shop_id = '$shopID'");
        $row = $result->fetch_assoc();
        $maxComId = $row['max_com_id'];
        if ($maxComId === null) {
            $newComId = 'Com0000000';
        }
        else{
            $newComId = 'Com' . str_pad((int)substr($maxComId, 3) + 1, 7, '0', STR_PAD_LEFT);
        }
        $sql = "INSERT INTO comment (shop_id,com_id,com_date, com_content,com_rating) 
                VALUES ('$shopID', '$newComId','$com_date', '$com_content', '$com_rating')";

        if ($conn->query($sql) === TRUE) {
            echo "Comment added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "One or more form fields are not set.";
    }
}
?>

    </div>


    <?php
    $shopID = isset($_GET['shop_id']) ? $_GET['shop_id'] : '';
    $sql="SELECT * FROM comment WHERE Shop_ID='$shopID'";
    $result=$conn->query($sql);
    // 顯示查詢結果
    if ($result->num_rows > 0 ) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>" . $row["Com_Date"] . "</p>";
            echo "<p><strong>內容:</strong> " . $row["Com_Content"] . "</p>";
            echo "<p><strong>星等:</strong> " . $row["Com_Rating"] . "</p>";
            echo "<hr>"; // Add a horizontal line between comments for better readability
        }
    } else {
        echo "目前沒有評論資訊";
    }
    $conn->close();
?>
</body>