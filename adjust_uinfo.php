
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
</html>
<?php
    require_once('db.php'); // 引入資料庫連線

    session_start();

    if (isset($_SESSION["nowUser"]) && !empty($_SESSION["nowUser"])) {
        // 確認使用者登入
        $nowUser = $_SESSION["nowUser"];
        $showUser = $nowUser['user_ID'];
        // $originalNickName = $nowUser['user_NickName'];
        // $originalEmail = $nowUser['user_Email'];
        // $originalPassword = $nowUser['user_Password'];

        //從資料庫選取NickName 
        $nickNameQuery = "SELECT user_NickName FROM user WHERE user_ID = '$showUser'";
        $nickNameResult = $conn->query($nickNameQuery);
        $nickName = $nickNameResult->fetch_assoc();
        $nickName = $nickName["user_NickName"];
        
        //從資料庫選取Email
        $emailQuery = "SELECT user_Email FROM user WHERE user_ID = '$showUser'";
        $emailResult = $conn->query($emailQuery);
        $email = $emailResult->fetch_assoc();
        $email = $email["user_Email"];
        
        //從資料庫選取Password
        $passwordQuery = "SELECT user_Password FROM user WHERE user_ID = '$showUser'";
        $passwordResult = $conn->query($passwordQuery);
        $password = $passwordResult->fetch_assoc();
        $password = $password["user_Password"];
        

        
        // 檢查表單是否提交
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // 取得表單提交的資料
            $newNickName = $_POST["newNickName"];
            $newEmail = $_POST["newEmail"];
            $newPassword = $_POST["newPassword"];

            // 更新資料庫中的使用者資訊
            $updateSql = "UPDATE user SET user_NickName='$newNickName', user_Email='$newEmail', user_Password='$newPassword' WHERE user_ID='$showUser'";

            if ($conn->query($updateSql) == TRUE) {
                echo '
                    <script>
                        Swal.fire({
                            title: "資料更新成功",
                            icon: "success",
                            confirmButtonText: "確認"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "user_info.php";
                            }
                        });
                            // 清除表單中的輸入數據
                            document.getElementById("updateForm").reset();
                        </script>';
            }
            else 
            {
                echo "錯誤：" . $conn->error;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>修改使用者資料</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
    // ...（上面的 PHP 代碼不變）
    ?>
    <h2>修改使用者資料</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="newNickName">新的暱稱:</label>
        <!-- 在 value 中預填現有的使用者暱稱 -->
        <input type="text" id="newNickName" name="newNickName" value="<?php echo $nickName ;?>" required>
        <br>
        <label for="newEmail">新的電子郵件:</label>
        <!-- 在 value 中預填現有的使用者電子郵件 -->
        <input type="email" id="newEmail" name="newEmail" value="<?php echo $email; ?>"  required>
        <br>
        <label for="newPassword">新的密碼:</label>
        <!-- 在 value 中預填現有的使用者密碼 -->
        <input type="text" id="newPassword" name="newPassword" value="<?php  echo $password; ?>" required>
        <br>
        <input type="submit" value="更新資料" onclick="showAlert(event)">
    </form>
    

</body>
</html>
