-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023-12-04 17:15:07
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
  `dess_ID` varchar(15) NOT NULL,
  `dess_Name` varchar(50) NOT NULL,
  `dess_Price` int NOT NULL,
  `dess_Description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `shop_ID` varchar(15) NOT NULL,
  `type_ID` varchar(15) NOT NULL,
  `dess_Photo` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `dessert`
--

INSERT INTO `dessert` (`dess_ID`, `dess_Name`, `dess_Price`, `dess_Description`, `shop_ID`, `type_ID`, `dess_Photo`) VALUES
('d10001', '蛋糕', 100, '檸檬蛋糕', 's1001', 't1002', ''),
('d10002', '好吃餅乾', 78, '巧克力餅乾', 's1002', 't1001', '');

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
  `shop_ForHere` tinyint(1) DEFAULT NULL COMMENT '1:外帶 0:內用',
  `shop_OpenTime` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT '營業時間',
  `shop_Photo` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `shop`
--

INSERT INTO `shop` (`shop_ID`, `shop_Name`, `shop_Phone`, `shop_Website`, `shop_Email`, `shop_Address`, `shop_Description`, `shop_ForHere`, `shop_OpenTime`, `shop_Photo`) VALUES
('s1001', '甜點店一', '912123123', 'www.google.com', 'aaa@gmail.com', '桃園市桃園區xxxxxxxxxxx', 'fjjiejpjofp', 0, '', ''),
('s1002', '甜點店二', '912345698', 'www.google.com', 'bbb@gmail.com', '桃園市中壢區xxxxxxxxxx', 'uw0 ', 0, '', ''),
('s1003', '甜點店三', '93344433', 'www.google.com', 'ccc@gmail.com', '桃園市復興鄉xxxxx', 'iidioojdo', 0, '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `type`
--

CREATE TABLE `type` (
  `type_ID` varchar(15) NOT NULL,
  `type_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `type`
--

INSERT INTO `type` (`type_ID`, `type_Name`) VALUES
('t1001', '餅乾'),
('t1002', '蛋糕');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_ID` varchar(15) NOT NULL COMMENT '全部打小寫uXXXXXX',
  `user_NickName` varchar(25) NOT NULL,
  `user_Email` varchar(50) NOT NULL,
  `user_Password` varchar(50) NOT NULL,
  `user_Photo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_ID`, `user_NickName`, `user_Email`, `user_Password`, `user_Photo`) VALUES
('u1101601', 'Jessica', 'Jessica@gmail.com', '000000', NULL),
('u1101602', 'Ryan', 'Ryan@gmail.com', '123123', NULL),
('u1101603', 'Roy', 'Roy@gmail.com', '777777', NULL),
('u1101604', 'yui', 'yui@gmail.com', '000000', NULL);

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
  ADD KEY `type_ID` (`type_ID`);

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
-- 資料表索引 `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_ID`);

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
  ADD CONSTRAINT `dessert_ibfk_2` FOREIGN KEY (`type_ID`) REFERENCES `type` (`type_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
