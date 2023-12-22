<?php
require_once 'db.php';

// 接收 AJAX 請求中的數據
$shopID = $_POST['shop_id'];
$dessID = $_POST['dess_id'];
$dessName = $_POST['dess_name'];
$dessPrice = $_POST['dess_price'];
//type

echo $dessName;

$insertSql = "INSERT INTO dessert(shop_ID, dess_ID, dess_Name, dess_Price) VALUES ('$shopID', '$dessID', '$dessName', '$dessPrice')";

if ($conn->query($insertSql) === TRUE) {
    echo "succes";
    // header("Location: manager_index.php");
    // exit();
} else {
    echo "錯誤：" . $conn->error;
}

// 關閉資料庫連線
$conn->close();

// 返回確認消息
// echo 'Data updated successfully';
?>