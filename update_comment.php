<?php
require_once 'db.php';
session_start();

// 檢查是否有 POST 數據
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shopID = $_POST['shop_id'];
    $userID =$_SESSION['nowUser']['user_ID'];
    $comContent = $_POST['comment-content'];
    $rating =isset($_POST['selected_rating']) ? intval($_POST['selected_rating']) : 0;

    // 假设你要更新 comment 表的 Com_Content 字段
    $sql = "UPDATE comment SET com_Content = '$comContent',com_Rating='$rating' WHERE shop_ID = '$shopID' AND user_ID='$userID'";

    // 执行 SQL 查询
    if ($conn->query($sql) === TRUE) {
        header("Location: shop_info.php?shop_id=" . $shopID);
        exit;
    } else {
        echo "Error updating comment: ";
    }

    // 關閉數據庫連接
    $conn->close();
}
?>
