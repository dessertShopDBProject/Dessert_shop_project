<?php
    require_once 'db.php';

    // 初始化一個變數來保存搜尋結果的 HTML 代碼
    $indexSearchResultHTML = "";
    $zone = isset($_GET['zone']) ? $_GET['zone'] :'';
    $type=isset($_GET['type']) ? $_GET['type'] :'';
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
    $noVisited = isset($_GET['no-visited']) ? $_GET['no-visited'] :'';
    $fourStar = isset($_GET['four-star']) ? $_GET['four-star'] :'';

    if (isset($_SESSION['nowUser']['user_ID'])) {
        $userID = $_SESSION['nowUser']['user_ID'];
    }

    if ($zone != "") {
        $sql = "SELECT * FROM shop WHERE shop_Address LIKE '%$zone%'";
    }
    if($type!=""){
        $sql = "SELECT DISTINCT shop.shop_ID,shop.* FROM shop,desstype,dessert WHERE dessert.shop_ID=shop.shop_ID AND dessert.desstype_ID=desstype.desstype_ID AND desstype_Name='$type'"; 
    }
    else{
        $sql = "SELECT DISTINCT shop.shop_ID, shop_Name, shop_Address,shop_Phone 
                FROM shop 
                LEFT JOIN dessert ON shop.shop_ID = dessert.shop_ID
                LEFT JOIN desstype ON dessert.desstype_ID=desstype.desstype_ID";
        $sql .= " WHERE 1=1";  // To always have a valid condition to append

        if ($keyword !== null) {
            $sql .= " AND (shop_Name LIKE '%$keyword%' OR dess_Name LIKE '%$keyword%')";
        }
        if ($noVisited=="yes") {
            $sql .= " AND shop.shop_ID NOT IN (SELECT shop_ID FROM visited WHERE user_ID='$userID')";
        }

        if ($fourStar=="yes") {
            $sql .= " AND shop.shop_ID IN (SELECT shop_ID FROM comment GROUP BY shop_ID HAVING AVG(com_Rating) >= 4)";
        }
    }
    $result = $conn->query($sql);
    $indexSearchResultHTML.= "<ul class='shop-list'>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row;
            $shopID=$row["shop_ID"];
            $rating_sql="SELECT shop_ID,AVG(com_Rating) AS Rating_avg FROM comment WHERE shop_ID='$shopID' GROUP BY shop_ID";
            $result_rating=$conn->query($rating_sql);
            $shopName= $row["shop_Name"];
            $indexSearchResultHTML.="
                <li>
                <img src='#' alt=$shopName>
                <div class='shop-list-content'>
                    <div class='name-and-comment'>
                        <h2>$shopName</h2>";
                        if($result_rating->num_rows > 0) {
                            $row_rating = $result_rating->fetch_assoc();
                            $indexSearchResultHTML.= "<p>" .round($row_rating['Rating_avg'],1). "<i class='fa-solid fa-star'></i></p>";
                        };
        $indexSearchResultHTML.= "
                    </div>
                    <p><i class='fa-solid fa-phone' style='color: #199b08; margin-right:5px;'></i>".$row['shop_Phone']."</p>
                    <p><i class='fas fa-map-marker-alt' style='color: #fb1313;'></i>".$row['shop_Address']."</p>
                    <p>";
                    $tagSql="SELECT COUNT(desstype_Name) AS SumofType,desstype_Name FROM dessert,desstype,shop
                    WHERE dessert.desstype_ID=desstype.desstype_ID  AND shop.shop_ID=dessert.shop_ID AND shop.shop_ID='$shopID'
                    GROUP BY desstype_Name ORDER BY SumofType DESC LIMIT 3";
                    $result_tag=$conn->query($tagSql);
                    if($result_tag->num_rows>0){
                        while($row_tag = $result_tag->fetch_assoc()){
                            $indexSearchResultHTML.=  "<i class='fa-solid fa-tags' style='color: #FF9B8F;margin:5px;'></i>".$row_tag['desstype_Name']."";
                        }
                        
                    }    
                    $indexSearchResultHTML.= "</p>
                    <a href='shop_info.php?shop_id=" . $row["shop_ID"] . "'><input type='submit' value='查看詳細資訊' name='shop-detail-button' class='shop-detail-button'></a>
                </div>
                </li>";
            }
        } else {
            $indexSearchResultHTML.= "<script>alert('没有找到匹配的结果'); window.location.href = 'index.php';</script>";
            exit();
        }
        $indexSearchResultHTML.= "</ul>";
        $_SESSION['indexSearchResultHTML'] = $indexSearchResultHTML;

        #header("Location: select.php");
        #exit;
?>