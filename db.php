<?php
    $servername = "localhost";
    $username = "your_username";
    $password = "your_pwd";
    $dbname = 'your_dbname';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>
<?php
    session_start();
    if(isset($_SESSION['expiretime'])) {
        if($_SESSION['expiretime'] < time()) {
            unset($_SESSION['expiretime']);
            $_SESSION = array();

            // Destroy the session
            session_destroy();
            header('Location: index.php'); // 登出
            //echo retJson(401,'請重新登錄!','');
            exit(0);
        } else {
            $_SESSION['expiretime'] = time() + 1800; // 刷新時間
        }
    }else{
        $_SESSION['expiretime'] = time() + 1800; // 5小时后过期
    }
?>
