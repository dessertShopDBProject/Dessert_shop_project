-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023-12-15 10:26:47
-- 伺服器版本： 8.0.35
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `finaldessert`
--

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `user_ID` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `shop_ID` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `com_Date` datetime NOT NULL,
  `com_Content` varchar(500) NOT NULL,
  `com_Rating` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `dessert`
--

CREATE TABLE `dessert` (
  `shop_ID` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dess_ID` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dess_Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dess_Price` int NOT NULL,
  `desstype_ID` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dess_Photo` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `dessert`
--

INSERT INTO `dessert` (`shop_ID`, `dess_ID`, `dess_Name`, `dess_Price`, `desstype_ID`, `dess_Photo`) VALUES
('s_01', 'd_01', '原味舒芙蕾', 200, 'dt_08', NULL),
('s_02', 'd_01', '聖誕帽', 110, 'dt_01', NULL),
('s_03', 'd_01', '藍莓朱古力', 85, 'dt_14', NULL),
('s_04', 'd_01', '芋泥紫米糕(半台斤)', 120, 'dt_01', NULL),
('s_05', 'd_01', '玫妮布可蛋糕(6吋)', 800, 'dt_04', NULL),
('s_06', 'd_01', '73%巧克力繽紛組合G（73%巧克力+重乳酪）', 440, 'dt_04', NULL),
('s_07', 'd_01', '檸檬老奶奶', 60, 'dt_01', NULL),
('s_08', 'd_01', '芒果塔', 140, 'dt_11', NULL),
('s_09', 'd_01', '草莓小巴', 230, 'dt_01', NULL),
('s_10', 'd_01', '藍莓千層', 190, 'dt_02', NULL),
('s_01', 'd_02', '可可舒芙蕾', 220, 'dt_08', NULL),
('s_02', 'd_02', '青蘋果', 120, 'dt_01', NULL),
('s_03', 'd_02', '栗子蒙布朗', 95, 'dt_01', NULL),
('s_04', 'd_02', '巴斯克乳酪蛋糕(切片)', 85, 'dt_04', NULL),
('s_05', 'd_02', '靜岡抹茶捲(6吋)', 480, 'dt_01', NULL),
('s_06', 'd_02', '草莓繽紛組合C（草莓＋重乳酪）', 490, 'dt_04', NULL),
('s_07', 'd_02', '歐培拉', 100, 'dt_01', NULL),
('s_08', 'd_02', '焦糖烤布蕾', 50, 'dt_13', NULL),
('s_09', 'd_02', '珍珠奶茶可麗餅', 165, 'dt_01', NULL),
('s_10', 'd_02', '抹茶草莓乳酪', 180, 'dt_04', NULL),
('s_01', 'd_03', '抹茶舒芙蕾', 220, 'dt_08', NULL),
('s_02', 'd_03', '提拉米蘇', 80, 'dt_04', NULL),
('s_03', 'd_03', '藍莓生乳酪', 85, 'dt_10', NULL),
('s_04', 'd_03', '千層蛋糕(單片)', 210, 'dt_02', NULL),
('s_05', 'd_03', '義大利提拉米蘇(6吋)', 780, 'dt_04', NULL),
('s_06', 'd_03', '草莓繽紛組合B（草莓＋73％巧克力）', 490, 'dt_04', NULL),
('s_07', 'd_03', '紫芋藍莓塔', 120, 'dt_11', NULL),
('s_08', 'd_03', '靜岡抹茶塔', 120, 'dt_11', NULL),
('s_09', 'd_03', '無限香草千層派', 190, 'dt_02', NULL),
('s_10', 'd_03', '純芋頭千層', 180, 'dt_02', NULL),
('s_01', 'd_04', '芒果舒芙蕾(期間限定)', 240, 'dt_08', NULL),
('s_02', 'd_04', '烤布蕾', 45, 'dt_13', NULL),
('s_03', 'd_04', '蔓越莓生乳酪', 85, 'dt_10', NULL),
('s_04', 'd_04', '提拉米蘇', 340, 'dt_04', NULL),
('s_05', 'd_04', '夏威夷果仁蛋糕(6吋)', 500, 'dt_04', NULL),
('s_06', 'd_04', '草莓繽紛組合E（草莓＋蔓越莓乳酪）', 510, 'dt_04', NULL),
('s_07', 'd_04', '古典巧克力', 70, 'dt_14', NULL),
('s_08', 'd_04', '檸檬塔', 90, 'dt_11', NULL),
('s_09', 'd_04', '抹茶生乳捲', 240, 'dt_01', NULL),
('s_10', 'd_04', '桑葚玫瑰千層', 180, 'dt_02', NULL),
('s_01', 'd_05', '草莓舒芙蕾(期間限定)', 240, 'dt_08', NULL),
('s_02', 'd_05', '濃巧克力', 120, 'dt_14', NULL),
('s_03', 'd_05', '小京都', 85, 'dt_01', NULL),
('s_04', 'd_05', '肉鬆小貝', 155, 'dt_01', NULL),
('s_05', 'd_05', '北海道香橙乳酪(6吋)', 825, 'dt_04', NULL),
('s_06', 'd_05', '6吋聖誕Oreo巧克力蛋糕', 770, 'dt_04', NULL),
('s_07', 'd_05', 'Oreo重乳酪', 80, 'dt_04', NULL),
('s_08', 'd_05', '藍莓塔', 120, 'dt_11', NULL),
('s_09', 'd_05', '紅蘋果', 160, 'dt_01', NULL),
('s_10', 'd_05', '芝麻牛奶千層', 180, 'dt_02', NULL),
('s_01', 'd_06', '乳酪布丁燒', 70, 'dt_01', NULL),
('s_02', 'd_06', '海焦', 110, 'dt_14', NULL),
('s_03', 'd_06', '提拉米蘇', 85, 'dt_04', NULL),
('s_04', 'd_06', '昭和布丁', 55, 'dt_01', NULL),
('s_05', 'd_06', '米蘭生巧克力(6吋)', 350, 'dt_04', NULL),
('s_06', 'd_06', '6吋聖誕草莓鮮奶油蛋糕', 790, 'dt_04', NULL),
('s_07', 'd_06', '法式千層', 110, 'dt_02', NULL),
('s_08', 'd_06', '黑糖栗子蒙布朗', 120, 'dt_01', NULL),
('s_09', 'd_06', '芝麻夏威夷豆塔', 145, 'dt_11', NULL),
('s_10', 'd_06', '黑松露巧克力', 170, 'dt_14', NULL),
('s_01', 'd_07', '提拉米蘇', 90, 'dt_04', NULL),
('s_02', 'd_07', '巧慕', 120, 'dt_07', NULL),
('s_03', 'd_07', '抹茶生乳酪', 95, 'dt_10', NULL),
('s_04', 'd_07', '法式檸檬塔', 90, 'dt_11', NULL),
('s_06', 'd_07', '8吋聖誕OREO巧克力蛋糕', 970, 'dt_04', NULL),
('s_07', 'd_07', '檸檬塔', 80, 'dt_11', NULL),
('s_08', 'd_07', '生巧克力塔', 120, 'dt_11', NULL),
('s_09', 'd_07', '秋旬', 165, 'dt_01', NULL),
('s_10', 'd_07', '夢想', 160, 'dt_01', NULL),
('s_01', 'd_08', '檸檬塔', 70, 'dt_11', NULL),
('s_02', 'd_08', '波士頓派', 50, 'dt_04', NULL),
('s_03', 'd_08', '烏龍茶紅豆塔', 95, 'dt_11', NULL),
('s_04', 'd_08', '英式司康', 45, 'dt_01', NULL),
('s_06', 'd_08', '8吋聖誕草莓鮮奶油蛋糕 ', 990, 'dt_04', NULL),
('s_07', 'd_08', '提拉米蘇', 80, 'dt_04', NULL),
('s_09', 'd_08', '可麗露', 60, 'dt_01', NULL),
('s_10', 'd_08', '巧克力脆片千層', 180, 'dt_02', NULL),
('s_01', 'd_09', '芒果奶酪', 80, 'dt_12', NULL),
('s_02', 'd_09', '草莓塔', 110, 'dt_11', NULL),
('s_03', 'd_09', '香蕉微醺', 85, 'dt_01', NULL),
('s_04', 'd_09', '瑪德蓮', 50, 'dt_01', NULL),
('s_06', 'd_09', '法式聖誕草莓派', 590, 'dt_01', NULL),
('s_07', 'd_09', '草莓奶酪', 60, 'dt_12', NULL),
('s_09', 'd_09', '老奶奶檸檬蛋糕', 60, 'dt_04', NULL),
('s_01', 'd_10', '藍莓奶酪', 70, 'dt_12', NULL),
('s_02', 'd_10', '起司蛋糕', 130, 'dt_04', NULL),
('s_03', 'd_10', '鮮果蜂蜜生乳', 95, 'dt_01', NULL),
('s_04', 'd_10', '70%苦甜巧克力布朗尼餅乾', 35, 'dt_06', NULL),
('s_06', 'd_10', '聖誕Oreo巧克力', 370, 'dt_04', NULL),
('s_07', 'd_10', '藍莓泡泡', 90, 'dt_01', NULL),
('s_09', 'd_10', '草莓千層派', 200, 'dt_02', NULL),
('s_01', 'd_11', '千層蛋糕', 100, 'dt_02', NULL),
('s_02', 'd_11', '藍莓生乳酪', 140, 'dt_10', NULL),
('s_03', 'd_11', '花生布朗尼', 85, 'dt_01', NULL),
('s_04', 'd_11', '費南雪', 50, 'dt_01', NULL),
('s_06', 'd_11', '聖誕瑪格麗特', 460, 'dt_01', NULL),
('s_07', 'd_11', '榛果圓舞曲', 120, 'dt_01', NULL),
('s_01', 'd_12', '巴斯克', 80, 'dt_04', NULL),
('s_02', 'd_12', '磅蛋糕', 30, 'dt_04', NULL),
('s_03', 'd_12', '葡萄加柚生乳酪', 85, 'dt_10', NULL),
('s_01', 'd_13', 'Oreo蛋糕', 80, 'dt_04', NULL),
('s_02', 'd_13', '素鹹派', 100, 'dt_01', NULL),
('s_01', 'd_14', '巧克力蛋糕', 90, 'dt_04', NULL),
('s_02', 'd_14', '草慕', 130, 'dt_07', NULL),
('s_01', 'd_15', '乳酪蛋糕', 70, 'dt_04', NULL),
('s_01', 'd_16', '蛋糕捲', 70, 'dt_01', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `desstype`
--

CREATE TABLE `desstype` (
  `desstype_ID` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `desstype_Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `desstype`
--

INSERT INTO `desstype` (`desstype_ID`, `desstype_Name`) VALUES
('dt_01', '其他'),
('dt_02', '千層'),
('dt_04', '蛋糕'),
('dt_05', '鬆餅'),
('dt_06', '餅乾'),
('dt_07', '慕斯'),
('dt_08', '舒芙蕾'),
('dt_10', '生乳酪'),
('dt_11', '塔類'),
('dt_12', '奶酪'),
('dt_13', '布蕾'),
('dt_14', '巧克力');

-- --------------------------------------------------------

--
-- 資料表結構 `favorite`
--

CREATE TABLE `favorite` (
  `shop_ID` varchar(15) NOT NULL,
  `user_ID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `favorite`
--

INSERT INTO `favorite` (`shop_ID`, `user_ID`) VALUES
('s_01', 'u1101601');

-- --------------------------------------------------------

--
-- 資料表結構 `opentime`
--

CREATE TABLE `opentime` (
  `shop_ID` varchar(15) NOT NULL,
  `shop_OpenWeek` varchar(100) NOT NULL,
  `shop_OpenTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `opentime`
--

INSERT INTO `opentime` (`shop_ID`, `shop_OpenWeek`, `shop_OpenTime`) VALUES
('s_01', '星期一', '未營業'),
('s_01', '星期三', '下午2:30 - 下午10:00'),
('s_01', '星期二', '下午2:30 - 下午10:00'),
('s_01', '星期五', '下午2:30 - 下午10:00'),
('s_01', '星期六', '下午2:30 - 下午10:00'),
('s_01', '星期四', '下午2:30 - 下午10:00'),
('s_01', '星期日', '下午2:30 - 下午10:00'),
('s_02', '星期一', '下午12:00 - 下午8:00'),
('s_02', '星期三', '下午12:00 - 下午8:00'),
('s_02', '星期二', '下午12:00 - 下午8:00'),
('s_02', '星期五', '下午12:00 - 下午8:00'),
('s_02', '星期六', '下午12:00 - 下午8:00'),
('s_02', '星期四', '下午12:00 - 下午8:00'),
('s_02', '星期日', '下午12:00 - 下午8:00'),
('s_03', '星期一', '下午1:00 - 下午9:00'),
('s_03', '星期三', '下午1:00 - 下午9:00'),
('s_03', '星期二', '下午1:00 - 下午9:00'),
('s_03', '星期五', '下午1:00 - 下午9:00'),
('s_03', '星期六', '下午1:00 - 下午9:00'),
('s_03', '星期四', '下午1:00 - 下午9:00'),
('s_03', '星期日', '下午1:00 - 下午9:00'),
('s_04', '星期一', '上午11:00 - 下午8:00'),
('s_04', '星期三', '上午11:00 - 下午8:00'),
('s_04', '星期二', '上午11:00 - 下午8:00'),
('s_04', '星期五', '上午11:00 - 下午8:00'),
('s_04', '星期六', '上午11:00 - 下午8:00'),
('s_04', '星期四', '上午11:00 - 下午8:00'),
('s_04', '星期日', '上午11:00 - 下午8:00'),
('s_05', '星期一', '上午11:00 - 下午10:00'),
('s_05', '星期三', '上午11:00 - 下午10:00'),
('s_05', '星期二', '上午11:00 - 下午10:00'),
('s_05', '星期五', '上午11:00 - 下午10:00'),
('s_05', '星期六', '上午11:00 - 下午10:00'),
('s_05', '星期四', '上午11:00 - 下午10:00'),
('s_05', '星期日', '上午11:00 - 下午10:00'),
('s_06', '星期一', '上午11:00 - 下午10:00'),
('s_06', '星期三', '上午11:00 - 下午10:00'),
('s_06', '星期二', '上午11:00 - 下午10:00'),
('s_06', '星期五', '上午11:00 - 下午10:00'),
('s_06', '星期六', '上午11:00 - 下午10:00'),
('s_06', '星期四', '上午11:00 - 下午10:00'),
('s_06', '星期日', '上午11:00 - 下午10:00'),
('s_07', '星期一', '下午12:00 - 下午6:00'),
('s_07', '星期三', '下午12:00 - 下午6:00'),
('s_07', '星期二', '休息'),
('s_07', '星期五', '下午12:00 - 下午6:00'),
('s_07', '星期六', '下午12:00 - 下午6:00'),
('s_07', '星期四', '下午12:00 - 下午6:00'),
('s_07', '星期日', '下午12:00 - 下午6:00'),
('s_08', '星期一', '休息'),
('s_08', '星期三', '下午2:00 - 下午6:30'),
('s_08', '星期二', '下午2:00 - 下午6:30'),
('s_08', '星期五', '下午2:00 - 下午6:30'),
('s_08', '星期六', '下午2:00 - 下午6:30'),
('s_08', '星期四', '下午2:00 - 下午6:30'),
('s_08', '星期日', '休息'),
('s_09', '星期一', '休息'),
('s_09', '星期三', '上午11:30–下午8:00'),
('s_09', '星期二', '上午11:30–下午8:00'),
('s_09', '星期五', '上午11:30–下午8:00'),
('s_09', '星期六', '上午11:30–下午8:00'),
('s_09', '星期四', '上午11:30–下午8:00'),
('s_09', '星期日', '上午11:30–下午8:00'),
('s_10', '星期一', '下午2:00–下午8:00'),
('s_10', '星期三', '下午2:00–下午8:00'),
('s_10', '星期二', '下午2:00–下午8:00'),
('s_10', '星期五', '下午2:00–下午8:00'),
('s_10', '星期六', '下午2:00–下午6:00'),
('s_10', '星期四', '下午2:00–下午8:00'),
('s_10', '星期日', '下午2:00–下午6:00');

-- --------------------------------------------------------

--
-- 資料表結構 `shop`
--

CREATE TABLE `shop` (
  `shop_ID` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `shop_Name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `shop_Phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `shop_Website` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `shop_IG` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `shop_FB` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `shop_Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `shop_Address` varchar(250) NOT NULL,
  `shop_ForHere` tinyint(1) DEFAULT NULL COMMENT '1:內用 0:外帶',
  `shop_Photo` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `shop`
--

INSERT INTO `shop` (`shop_ID`, `shop_Name`, `shop_Phone`, `shop_Website`, `shop_IG`, `shop_FB`, `shop_Email`, `shop_Address`, `shop_ForHere`, `shop_Photo`) VALUES
('s_01', '不能吃糖的貓', '034350757', NULL, 'https://www.instagram.com/suger_love_cat', '', NULL, '320桃園市中壢區興仁路二段303號\r\n', 1, NULL),
('s_02', '哈囉 hello 甜點店', '0966020665', NULL, NULL, 'https://hello-dessert-shop.business.site/', 'HelloHello2329@gmail.com', '334桃園市八德區中華北街10號\r\n', 1, NULL),
('s_03', '兔子的森林甜點', '0906582402', NULL, 'https://www.instagram.com/rabbit_dessert_/', 'https://www.facebook.com/RabbitDessert/?locale=zh_TW', NULL, '桃園市中壢區大仁五街15號', 1, NULL),
('s_04', '甜點先生', '0928378314', NULL, 'https://www.instagram.com/mr.sweets_taiwan?fbclid=IwAR25aQRQlIfdzC8dS4MZL_LWSdsZ391L7j7utGEECug9vClOI-7SIBXd2BY', 'https://www.facebook.com/profile.php?id=100076890150974', NULL, '桃園市中壢區龍岡路三段634號1樓', 0, NULL),
('s_05', '恬品軒 ROOM 4 DESSERT SOGO中壢店', '034256711', 'https://r4d.com.tw/', NULL, 'https://www.facebook.com/r4dessert/', 'service@r4-dessert.com', '桃園縣中壢市元化路357號 B1', 1, NULL),
('s_06', '橘村屋 桃園站前站', '033946153', 'https://kmcake.tw/', 'https://www.instagram.com/kmcake_official/', 'https://www.facebook.com/kitsumuraya/?locale=zh_TW', NULL, '桃園市桃園區中正路43號', 0, NULL),
('s_07', '微楓甜點', '033797789', NULL, 'https://www.instagram.com/micromaple_dessert/', 'https://www.facebook.com/micromaple/', NULL, '桃園市桃園區龍泉六街18號', 1, NULL),
('s_08', '局外人甜點 中原分店', '0972010734', NULL, 'https://www.instagram.com/outsiders_4/', 'https://www.facebook.com/professional.tarte?locale=zh_TW', 'outsiders.four@gmail.com', '桃園市中壢區大仁二街18之1號', 1, NULL),
('s_09', '小初心法式甜點', '033783426', NULL, 'https://www.instagram.com/bonheur0122_patisserie/', 'https://www.facebook.com/bonheur327?locale=zh_TW', NULL, '桃園市桃園區國聖一街111號', 1, NULL),
('s_10', 'MOFA魔法氛子', '034370010', 'www.specialthank.com/shop', 'https://www.instagram.com/love_mofa/', 'https://www.facebook.com/MOFAsLOVE/', NULL, '桃園市中壢區力行北街33號', 1, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_ID` varchar(15) NOT NULL COMMENT '全部打小寫uXXXXXX',
  `user_NickName` varchar(25) NOT NULL,
  `user_Email` varchar(50) NOT NULL,
  `user_Password` varchar(50) NOT NULL,
  `user_Photo` varchar(500) DEFAULT NULL,
  `user_Role` varchar(25) DEFAULT NULL COMMENT '用戶屬性'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_ID`, `user_NickName`, `user_Email`, `user_Password`, `user_Photo`, `user_Role`) VALUES
('u1101601', 'Jessica', 'Jessica@gmail.com', '000000', NULL, 'manager'),
('u1101602', 'Ryan', 'Ryan@gmail.com', '123123', NULL, NULL),
('u1101603', 'Roy', 'Roy@gmail.com', '777777', NULL, NULL),
('u1101604', 'yui', 'yui@gmail.com', '000000', NULL, NULL),
('u1101609', 'Yuu', 'Yuu01@gmail.comm', '123456', NULL, NULL),
('u1101610', 'Yuu', 'Yuu01@gmail.comm', '123456', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `visited`
--

CREATE TABLE `visited` (
  `shop_ID` varchar(15) NOT NULL,
  `user_ID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `visited`
--

INSERT INTO `visited` (`shop_ID`, `user_ID`) VALUES
('s_01', 'u1101601');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`shop_ID`,`user_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `shop_ID` (`shop_ID`);

--
-- 資料表索引 `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`dess_ID`,`shop_ID`),
  ADD KEY `dessert_shop_ID` (`shop_ID`),
  ADD KEY `dessert_desstype_ID` (`desstype_ID`);

--
-- 資料表索引 `desstype`
--
ALTER TABLE `desstype`
  ADD PRIMARY KEY (`desstype_ID`);

--
-- 資料表索引 `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`shop_ID`,`user_ID`),
  ADD KEY `shop_ID` (`shop_ID`),
  ADD KEY `favorite_user_ID` (`user_ID`);

--
-- 資料表索引 `opentime`
--
ALTER TABLE `opentime`
  ADD PRIMARY KEY (`shop_ID`,`shop_OpenWeek`),
  ADD KEY `shop_ID` (`shop_ID`) USING BTREE;

--
-- 資料表索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_ID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- 資料表索引 `visited`
--
ALTER TABLE `visited`
  ADD PRIMARY KEY (`shop_ID`,`user_ID`),
  ADD KEY `shop_ID` (`shop_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_shop_ID` FOREIGN KEY (`shop_ID`) REFERENCES `shop` (`shop_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_user_ID` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `dessert`
--
ALTER TABLE `dessert`
  ADD CONSTRAINT `dessert_desstype_ID` FOREIGN KEY (`desstype_ID`) REFERENCES `desstype` (`desstype_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `dessert_shop_ID` FOREIGN KEY (`shop_ID`) REFERENCES `shop` (`shop_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_shop_ID` FOREIGN KEY (`shop_ID`) REFERENCES `shop` (`shop_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_user_ID` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `opentime`
--
ALTER TABLE `opentime`
  ADD CONSTRAINT `opentime_shop_ID` FOREIGN KEY (`shop_ID`) REFERENCES `shop` (`shop_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `visited`
--
ALTER TABLE `visited`
  ADD CONSTRAINT `visited_shop_ID` FOREIGN KEY (`shop_ID`) REFERENCES `shop` (`shop_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visited_user_ID` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
