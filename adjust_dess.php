<?php
require_once 'db.php';

// 接收 AJAX 請求中的數據
$shopID = $_POST['shopID'];
$dessID = $_POST['dessID'];
$newValues = json_decode($_POST['newValues'], true);
// $newName=$newValues['dess_Name'];
// $newPrice=$newValues['dess_Price'];
$newName=$newValues[0];
$newPrice=$newValues[1];
// $newName=$_POST['newValues']['dess_Name'];
// $newPrice=$_POST['newValues']['dess_Price'];
// $newName=$newValues['dess_Price'];

echo $newName;

// 執行資料庫更新操作，這裡僅為示範，實際操作可能涉及 SQL 語句等
// $db 為你的資料庫連線對象，這裡假設使用 mysqli
// 你需要根據你的實際情況進行適當的資料庫更新操作

// 假設你的資料表為 dess_table，你需要替換為實際的表名
$sql = "UPDATE dessert SET dess_Name='$newName', dess_Price='$newPrice' WHERE shop_ID='$shopID' AND dess_ID='$dessID'";
$rsult = $conn->query($sql);
if ($conn->query($sql) == TRUE) {
    echo "succes";
    // header("Location: manager_dessert_index.php?shop_id=$shopID&dess_id=$dessID");
    // exit();
}
else 
{
    echo "錯誤：" . $conn->error;
}
// $stmt->bind_param('ssss', $newValues['dess_Name'], $newValues['dess_Price'], $shopID, $dessID);
// $stmt->execute();

// 關閉資料庫連線
$conn->close();

// 返回確認消息
echo 'Data updated successfully';
?>