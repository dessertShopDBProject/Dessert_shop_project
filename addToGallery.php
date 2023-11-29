<?php
    require_once 'db.php';
    session_start();
?>
<?php
    $userID = $_SESSION['nowUser']['user_ID'];
    $shopID = $_GET['id'];

    // Check if the record already exists
    $checkSql = "SELECT * FROM visited WHERE shop_id = '$shopID' AND user_id = '$userID'";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        // If the record exists, delete it
        $deleteSql = "DELETE FROM visited WHERE shop_id = '$shopID' AND user_id = '$userID'";
        
        if ($conn->query($deleteSql) === TRUE) {
            header("Location: shop_info.php?shop_id=$shopID");
            exit;
        } else {
            echo "Error deleting record.";
        }
    } else {
        // If the record does not exist, insert it
        $insertSql = "INSERT INTO visited VALUES ('$shopID', '$userID')";

        if ($conn->query($insertSql) === TRUE) {
            header("Location: shop_info.php?shop_id=$shopID");
            exit;
        } else {
            echo "Error inserting record.";
        }
    }

    // Close the connection
    $conn->close();
?>
