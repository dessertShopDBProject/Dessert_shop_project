-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023-12-09 22:58:15
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
  `dess_Description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `desstype_ID` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dess_Photo` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `dessert`
--

INSERT INTO `dessert` (`shop_ID`, `dess_ID`, `dess_Name`, `dess_Price`, `dess_Description`, `desstype_ID`, `dess_Photo`) VALUES
('s_01', 'd_01', '原味舒芙蕾', 200, '舒芙蕾鬆餅(限內用)\r\n', 'dt_08', NULL),
('s_02', 'd_01', '聖誕帽', 110, '甜點系列\r\n', NULL, NULL),
('s_01', 'd_02', '可可舒芙蕾', 220, '舒芙蕾鬆餅(限內用)\r\n', 'dt_08', NULL),
('s_02', 'd_02', '青蘋果', 120, '甜點系列\r\n', NULL, NULL),
('s_01', 'd_03', '抹茶舒芙蕾', 220, '舒芙蕾鬆餅(限內用)\r\n', 'dt_08', NULL),
('s_02', 'd_03', '提拉米蘇', 80, '甜點系列\r\n', 'dt_04', NULL),
('s_01', 'd_04', '芒果舒芙蕾(期間限定)', 240, '舒芙蕾鬆餅(限內用)\r\n', 'dt_08', NULL),
('s_02', 'd_04', '烤布蕾', 45, '甜點系列\r\n', 'dt_13', NULL),
('s_01', 'd_05', '草莓舒芙蕾(期間限定)', 240, '舒芙蕾鬆餅(限內用)', 'dt_08', NULL),
('s_02', 'd_05', '濃巧克力', 120, '甜點系列\r\n', 'dt_14', NULL),
('s_01', 'd_06', '乳酪布丁燒', 70, '現場甜點\r\n', 'dt_09', NULL),
('s_02', 'd_06', '海焦', 110, '甜點系列\r\n', NULL, NULL),
('s_01', 'd_07', '提拉米蘇', 90, '現場甜點\r\n', 'dt_04', NULL),
('s_02', 'd_07', '巧慕', 120, '甜點系列\r\n', 'dt_07', NULL),
('s_01', 'd_08', '檸檬塔', 70, '現場甜點\r\n', 'dt_11', NULL),
('s_02', 'd_08', '波士頓派', 50, '甜點系列\r\n', 'dt_04', NULL),
('s_01', 'd_09', '芒果奶酪', 80, '現場甜點\r\n', 'dt_12', NULL),
('s_02', 'd_09', '草莓塔', 110, '甜點系列\r\n', 'dt_11', NULL),
('s_01', 'd_10', '藍莓奶酪', 70, '現場甜點\r\n', 'dt_12', NULL),
('s_02', 'd_10', '起司蛋糕', 130, '甜點系列\r\n', NULL, NULL),
('s_01', 'd_11', '千層蛋糕', 100, '現場甜點\r\n', 'dt_04', NULL),
('s_02', 'd_11', '藍莓生乳酪', 140, '甜點系列\r\n', NULL, NULL),
('s_01', 'd_12', '巴斯克', 80, '現場甜點\r\n', 'dt_04', NULL),
('s_02', 'd_12', '磅蛋糕', 30, '甜點系列\r\n', NULL, NULL),
('s_01', 'd_13', 'Oreo蛋糕', 80, '現場甜點\r\n', 'dt_04', NULL),
('s_02', 'd_13', '素鹹派', 100, '甜點系列\r\n', NULL, NULL),
('s_01', 'd_14', '巧克力蛋糕', 90, '現場甜點\r\n', 'dt_04', NULL),
('s_02', 'd_14', '草慕', 130, '甜點系列\r\n', NULL, NULL),
('s_01', 'd_15', '乳酪蛋糕', 70, '現場甜點\r\n', 'dt_04', NULL),
('s_01', 'd_16', '蛋糕捲', 70, '現場甜點\r\n', 'dt_04', NULL);

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
('dt_01', '點心'),
('dt_02', '麵包'),
('dt_03', '三明治'),
('dt_04', '蛋糕'),
('dt_05', '鬆餅'),
('dt_06', '餅乾'),
('dt_07', '慕斯'),
('dt_08', '舒芙蕾鬆餅'),
('dt_09', '布丁燒'),
('dt_10', '布丁'),
('dt_11', '塔類'),
('dt_12', '奶酪'),
('dt_13', '布蕾'),
('dt_14', '(單)巧克力');

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
('s1002', 'u1101604');

-- --------------------------------------------------------

--
-- 資料表結構 `shop`
--

CREATE TABLE `shop` (
  `shop_ID` varchar(15) NOT NULL,
  `shop_Name` varchar(50) NOT NULL,
  `shop_Phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `shop_Website` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `shop_Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `shop_Address` varchar(250) NOT NULL,
  `shop_Description` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `shop_ForHere` tinyint(1) DEFAULT NULL COMMENT '1:內用 0:外帶',
  `shop_OpenTime` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT '營業時間',
  `shop_Photo` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `shop`
--

INSERT INTO `shop` (`shop_ID`, `shop_Name`, `shop_Phone`, `shop_Website`, `shop_Email`, `shop_Address`, `shop_Description`, `shop_ForHere`, `shop_OpenTime`, `shop_Photo`) VALUES
('s_01', '不能吃糖的貓', '034350757', 'https://www.instagram.com/suger_love_cat', NULL, '320桃園市中壢區興仁路二段303號\r\n', 'ig: https://www.instagram.com/suger_love_cat\r\nfb: https://www.facebook.com/sugerlovecat/?locale=zh_TW\r\n', 1, '\"週一 未營業\r\n週二 下午2:30 - 下午10:00\r\n週三 下午2:30 - 下午10:00\r\n週四 下午2:30 - 下午10:00\r\n週五 下午2:30 - 下午10:00\r\n週六 下午2:30 - 下午10:00\r\n週日 下午2:30 - 下午10:00\"\r\n', NULL),
('s_02', '哈囉 hello 甜點店', '0966020665', 'https://hello-dessert-shop.business.site/', 'HelloHello2329@gmail.com', '334桃園市八德區中華北街10號\r\n', '\"FB:\r\n一聲哈囉😊將我們之間的距離拉近\r\n一片蛋糕，一杯咖啡，\r\n一個愜意，享受生活。\"\r\nfb:https://www.facebook.com/hellohello2329/', 1, '\"週一 中午12:00 - 下午8:00\r\n週二 中午12:00 - 下午8:00\r\n週三 中午12:00 - 下午8:00\r\n週四 中午12:00 - 下午8:00\r\n週五 中午12:00 - 下午8:00\r\n週六 中午12:00 - 下午8:00\r\n週日 中午12:00 - 下午8:00\"\r\n', NULL),
('s1001', '甜點店一', '912123123', 'www.google.com', 'aaa@gmail.com', '桃園市桃園區xxxxxxxxxxx', 'fjjiejpjofp', 0, '', ''),
('s1002', '甜點店二', '912345698', 'www.google.com', 'bbb@gmail.com', '桃園市中壢區xxxxxxxxxx', 'uw0 ', 0, '', ''),
('s1003', '甜點店三', '93344433', 'www.google.com', 'ccc@gmail.com', '桃園市復興鄉xxxxx', 'iidioojdo', 0, '', '');

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
('s1001', 'u1101604'),
('s1002', 'u1101604');

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
  ADD KEY `shop_ID` (`shop_ID`),
  ADD KEY `type_ID` (`desstype_ID`);

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
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `shop_ID` (`shop_ID`);

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
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`shop_ID`) REFERENCES `shop` (`shop_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- 資料表的限制式 `dessert`
--
ALTER TABLE `dessert`
  ADD CONSTRAINT `dessert_ibfk_1` FOREIGN KEY (`shop_ID`) REFERENCES `shop` (`shop_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dessert_ibfk_2` FOREIGN KEY (`desstype_ID`) REFERENCES `desstype` (`desstype_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- 資料表的限制式 `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`shop_ID`) REFERENCES `shop` (`shop_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- 資料表的限制式 `visited`
--
ALTER TABLE `visited`
  ADD CONSTRAINT `visited_ibfk_1` FOREIGN KEY (`shop_ID`) REFERENCES `shop` (`shop_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `visited_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
