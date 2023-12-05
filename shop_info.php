<?php
    require_once 'db.php';
    require_once 'process_comment.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>搜蒐甜點店</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="all.css">
    
</head>
<body>
    <div class="wrap">
        <div class="navbar">
            <h1 class="logo"><a href="index.php">搜蒐甜點店</a></h1>
            <ul class="nav">
                <?php
                    if (isset($_SESSION['nowUser'])) {
                        // 使用者已登入，顯示收藏和圖鑑
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
        <div class="shop-detail-main">
        <?php
            // 獲取 Shop_ID 參數
            $shopID = isset($_GET['shop_id']) ? $_GET['shop_id'] : '';
            if (isset($_SESSION['nowUser']['user_ID'])) {
                $userID = $_SESSION['nowUser']['user_ID'];
            }
            // 查詢資料
            $sql = "SELECT * FROM shop WHERE shop_ID = '$shopID'";
            $result = $conn->query($sql);
            // 顯示查詢結果
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "
                <div class='left-content'>
                    <div class='simple-intro'>
                        <img src='../image/dessert.jpg' alt='店面照片'>
                        <ul class='shop-info'>
                            <li class='address'>地址:".$row['shop_Address']."</li>
                            <li class='phone'>電話:".$row['shop_Phone']."</li>
                            <li class='website'>網頁:".$row['shop_Website']."</li>
                            <li class='email'>Email:".$row['shop_Email']."</li>
                        </ul>
                    </div>
                    <div class='shop-name'>
                        <p>" . $row['shop_Name'] . "</p>
                    </div>
                    <ul class='add'>";
                    if (isset($_SESSION['nowUser']['user_ID'])) {
                        $favorite_sql="SELECT * FROM favorite WHERE shop_ID='$shopID' AND user_ID='$userID'";
                        $result_favorite = $conn->query($favorite_sql);
                        $row_favorite = $result_favorite->fetch_assoc();
                        $visited_sql= "SELECT * FROM visited WHERE shop_ID='$shopID' AND user_ID='$userID'";
                        $result_visited = $conn->query($visited_sql);
                        $row_visited = $result_visited->fetch_assoc();
                        if($row_favorite!=null){
                            echo "<li class='favorite-link' data-shopid=$shopID><a href='addToFavorite.php?id=$shopID'><i class='fa-solid fa-heart'></i>收藏</a></li>";
                        }
                        else if($row_favorite==null){
                            echo "<li class='favorite-link' data-shopid=$shopID><a href='addToFavorite.php?id=$shopID'><i class='fa-regular fa-heart'></i>收藏</a></li>";
                        }
                        if($row_visited!=null){
                            echo "<li class='collect-link'><a href='addToGallery.php?id=$shopID'><i class='fa-solid fa-check' aria-hidden='true'></i>圖鑑</a></li>";
                        }
                        else if($row_visited==null){
                            echo "<li class='collect-link'><a href='addToGallery.php?id=$shopID'><i class='fa fa-plus' aria-hidden='true'></i>圖鑑</a></li>";
                        }
                    }
                    else{
                        echo "<li class='favorite-link' data-shopid=$shopID><a href='addToFavorite.php?id=$shopID'><i class='fa-regular fa-heart'></i>收藏</a></li>
                        <li class='collect-link'><a href='addToGallery.php?id=$shopID'><i class='fa fa-plus' aria-hidden='true'></i>圖鑑</a></li>";
                    }
                    echo "
                    </ul>
                    <div class='introduce'>
                        <h2>簡介</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere illo quisquam vel laborum distinctio voluptates expedita, quam maxime in nihil, possimus libero quibusdam similique reiciendis. Corporis ex nihil tenetur excepturi.
                            Voluptatem doloremque harum voluptates minus numquam exercitationem repellat corrupti expedita? Velit suscipit, voluptate, vel aperiam harum officiis, rerum praesentium aliquid illum repellat quas nostrum quod distinctio! Ipsum fuga voluptatum atque!</p>
                    </div>
                    <h2 class='dessert-title'>品項</h2> ";

                $dessert_sql = "SELECT * FROM dessert WHERE shop_ID = '$shopID'";
                $result_dessert = $conn->query($dessert_sql);
                if ($result_dessert->num_rows > 0) {
                    echo "<ul class='dessert-list'>";
                    while ($row_dessert = $result_dessert->fetch_assoc()) {
                        echo "
                            <li class='dessert'>
                                <img src='../image/dessert.jpg' alt=''>
                                <h3>" . $row_dessert['dess_Name'] . "</h3>
                                <p>$" . $row_dessert['dess_Price'] . "</p>
                            </li>";
                    }
                    echo "</ul>";
                } else {
                    echo "暫無任何品項";
                }
                echo "</div>
                <div class='right-content'>";
                if (isset($_SESSION['nowUser'])) {
                    $userID=$_SESSION['nowUser']['user_ID'];
                    $commentornot_sql="SELECT shop_ID,user_ID,com_Content,com_Rating FROM comment WHERE shop_ID='$shopID' AND user_ID='$userID'";
                    $editComment_sql = "UPDATE comment SET com_Content = 'TINA',com_Rating= WHERE shop_ID = $shopID AND user_ID=$userID";
                    $result_commentornot=$conn->query($commentornot_sql);
                }
                $rating_sql="SELECT shop_ID,AVG(com_Rating) AS Rating_avg FROM comment WHERE shop_ID='$shopID' GROUP BY shop_ID";
                $result_rating=$conn->query($rating_sql);
                
                if($result_rating->num_rows > 0) {
                    $row_rating = $result_rating->fetch_assoc();
                    echo "<div class='comment-nav'>
                        <p class='avg'>" .round($row_rating['Rating_avg'],1). " 顆星</p>";
                        if (isset($_SESSION['nowUser'])) {
                            if($result_commentornot->num_rows > 0) {
                                $row_comment_edit=$result_commentornot->fetch_assoc();
                                echo "<div class='write-comment'><i class='fa-solid fa-pen'></i><input type='submit' name='edit-comment-button' class='edit-comment-button' value='修改評論' onclick='editCommentForm()'></div>";
                            }
                            else
                            {
                                echo "<div class='write-comment'><i class='fa-solid fa-pen'></i><input type='submit' name='write-comment-button' class='write-comment-button' value='撰寫評論' onclick='openCommentForm()'></div>";
                            }
                        }
                    echo "
                    </div>";
                }
                else
                {
                    echo "<div class='comment-nav'>
                    <p class='avg'>暫無評論</p>";
                            if (isset($_SESSION['nowUser'])) {
                                if($result_commentornot->num_rows > 0) {
                                    $row_comment_edit=$result_commentornot->fetch_assoc();
                                    echo "<div class='write-comment'><i class='fa-solid fa-pen'></i><input type='submit' name='edit-comment-button' class='edit-comment-button' value='修改評論' onclick='editCommentForm()'> </div>";
                                }
                                else
                                {
                                    echo "<div class='write-comment'><i class='fa-solid fa-pen'></i><input type='submit' name='write-comment-button' class='write-comment-button' value='撰寫評論' onclick='openCommentForm()'> </div>";
                                }
                            }
                    echo "
                    </div>";
                }
            }
            ?>
            <!-- 彈出的評論表單模態視窗(新增) -->
            <div id="commentFormOverlay" class="overlay">
                <div class="comment-form">
                    <p class='comment-user'></p>
                    <form action="process_comment.php" method="POST">
                        <input type="hidden" name="shop_id" value="<?php echo $row['shop_ID']; ?>">
                        <ul class='comment-rating'>
                            <span>極差</span>
                            <li class='rating-number' onclick="setRating(1)"><i class="fa-solid fa-1"></i></li>
                            <li class='rating-number' onclick="setRating(2)"><i class="fa-solid fa-2"></i></li>
                            <li class='rating-number' onclick="setRating(3)"><i class="fa-solid fa-3"></i></li>
                            <li class='rating-number' onclick="setRating(4)"><i class="fa-solid fa-4"></i></li>
                            <li class='rating-number' onclick="setRating(5)"><i class="fa-solid fa-5"></i></li>
                            <span>非常好</span>
                        </ul>
                        <input type="hidden" id="selectedRating" name="selected_rating" value="" required>
                        <span class="validation-message">請選擇評分</span>
                        <textarea class='textarea-content' placeholder='請輸入你的想法...' name="comment-content"></textarea>
                        <input type="submit" value="提交評論" class='comment-submit'>
                    </form>
                    <button class='comment-form-close' onclick='closeCommentForm()'>&times;</button>
                </div>
            </div>
            <!-- 彈出的評論表單模態視窗(修改) -->
            <div id="commentEditFormOverlay" class="Editoverlay">
                <div class="comment-form">
                    <p class='comment-user'></p>
                    <form action="update_comment.php" method="POST">
                        <input type="hidden" name="shop_id" value="<?php echo $row['shop_ID']; ?>">
                        <?php echo "
                        <ul class='comment-rating'>
                            <span>極差</span>";
                        for ($i= 1; $i <= 5; $i++) {
                            if($row_comment_edit["com_Rating"]==$i)
                            {
                                echo "<li class='rating-number active' data-rating=$i onclick='setEditRating($i)'><i class='fa-solid fa-$i'></i></li>";
                            }
                            else{
                                echo "<li class='rating-number' data-rating=$i onclick='setEditRating($i)'><i class='fa-solid fa-$i'></i></li>";
                            }
                        }
                        echo" <span>非常好</span>
                        </ul>";
                        ?>
                        <input type="hidden" id="selectedRating" name="selected_edit_rating" value="<?php echo $row_comment_edit["com_Rating"];?>">
                        <textarea class='textarea-content' name="comment-content"><?php echo $row_comment_edit["com_Content"];?></textarea>
                        <div class="revise-button">
                            <input type="submit" value="更新評論" class='comment-submit' name='comment-update'>
                            <button class="comment-delete" name="comment-delete">
                                <i class="fa-solid fa-trash-can"></i>刪除評論
                            </button>
                        </div>
                    </form>
                    <button class='comment-form-close' onclick='closeEditCommentForm()'>&times;</button>
                </div>
            </div>
                
                <div class="comment-search">
                    <form action="search_comment.php" method="POST">
                        <input type="hidden" name="shop_id" value="<?php echo $row['shop_ID']; ?>">
                        <input type="text" placeholder="請輸入查詢評論關鍵字" name="comment-keyword" class="search-bar comment-search-bar">
                        <select class="comment-rating-choice" name="comment-rating-choice">
                            <option value="全部">全部</option>    
                            <option value="5">5 星</option>
                            <option value="4">4 星</option>
                            <option value="3">3 星</option>
                            <option value="2">2 星</option>
                            <option value="1">1 星</option>
                        </select>
                        <i class="fa-solid fa-magnifying-glass" onclick="submitForm()"></i>
                    </form>
                </div>
            <?php 
                if (isset($_SESSION['searchResultHTML'])) {
                    echo $_SESSION['searchResultHTML'];
                    // 清除 SESSION 中的搜尋結果，以避免重複顯示
                    unset($_SESSION['searchResultHTML']);
                } 
                else {
                    $comment_sql="SELECT comment.*,user.* FROM comment,user WHERE shop_ID='$shopID' AND comment.user_ID=user.user_ID";
                    $result_comment=$conn->query($comment_sql);
                    echo "<ul class='comment-list'>";
                    if($result_comment->num_rows > 0) {
                        while($row_comment = $result_comment->fetch_assoc())
                        {
                            echo"
                            <li class='comment'>
                                <div class='comment-user'>
                                    <p>".$row_comment['user_NickName']."</p>
                                    <p>".$row_comment['com_Rating']."</p>
                                </div>
                                <p>".$row_comment['com_Content']."</p>
                            </li>";
                        }
                    echo "</ul>";
                    }
                    else{
                        echo "<li class='comment'>暫無評論</li>";
                    }
                }
                // 關閉數據庫連接
                $conn->close();
            ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="swiper.js"></script>
    <script src="all.js"></script>
</body>
</html>