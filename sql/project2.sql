-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `project2`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `admin_db`
-- 

CREATE TABLE `admin_db` (
  `admin_id` int(11) unsigned zerofill NOT NULL auto_increment,
  `username` varchar(100) collate utf8_unicode_ci NOT NULL,
  `password` varchar(100) collate utf8_unicode_ci NOT NULL,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(50) collate utf8_unicode_ci NOT NULL,
  `email` varchar(100) collate utf8_unicode_ci NOT NULL,
  `position` int(5) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

-- 
-- dump ตาราง `admin_db`
-- 

INSERT INTO `admin_db` VALUES (00000000001, 'thanawut01', '1234', 'arm', 'Dana', '081234561', 'nubeemc@hotmail.com', 1);
INSERT INTO `admin_db` VALUES (00000000002, 'somchai', '1234', 'à¸˜à¸™à¸²à¸à¸²à¸£', 'à¸„à¸­à¸¡à¸žà¸´à¸§à¹€à¸•à¸­à¸£à¹Œ', '08123456123', 'welove_9@hotmail.com', 1);
INSERT INTO `admin_db` VALUES (00000000003, 'admin', '1234', 'Thanawut', 'Decharn', '08123456123', 'thanawut.dth@gmail.com', 1);
INSERT INTO `admin_db` VALUES (00000000019, 'technic', '1234', 'somboon', 'montree', '082321234', 'somboon@hotmail.com', 2);
INSERT INTO `admin_db` VALUES (00000000020, 'montree', 'a1234', 'มนตรี', 'มานะ', '0912348434', 'welove_9@hotmail.com', 2);
INSERT INTO `admin_db` VALUES (00000000021, '', '', '', '', '', '', 0);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `device_db`
-- 

CREATE TABLE `device_db` (
  `device_id` int(11) NOT NULL auto_increment,
  `flname` varchar(100) collate utf8_unicode_ci NOT NULL,
  `type` varchar(100) collate utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`device_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- dump ตาราง `device_db`
-- 

INSERT INTO `device_db` VALUES (2, '', '', '0000-00-00');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `files`
-- 

CREATE TABLE `files` (
  `FilesID` int(10) NOT NULL,
  `FilesName` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`FilesID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- dump ตาราง `files`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `fix_db`
-- 

CREATE TABLE `fix_db` (
  `fix_id` int(11) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) collate utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `Building` varchar(100) collate utf8_unicode_ci NOT NULL,
  `type` varchar(100) collate utf8_unicode_ci NOT NULL,
  `detail` varchar(1000) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(15) collate utf8_unicode_ci NOT NULL,
  `status` varchar(100) collate utf8_unicode_ci NOT NULL,
  `infer` varchar(500) collate utf8_unicode_ci NOT NULL default 'รอระบุ',
  `technician` varchar(100) collate utf8_unicode_ci NOT NULL default 'รอระบุ',
  PRIMARY KEY  (`fix_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

-- 
-- dump ตาราง `fix_db`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `image_path`
-- 

CREATE TABLE `image_path` (
  `image_id` int(4) NOT NULL auto_increment,
  `image_name` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- 
-- dump ตาราง `image_path`
-- 

INSERT INTO `image_path` VALUES (4, 'Wait.png');
INSERT INTO `image_path` VALUES (5, 'Correct.png');
INSERT INTO `image_path` VALUES (6, 'Close.png');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `member_db`
-- 

CREATE TABLE `member_db` (
  `member_id` int(11) NOT NULL auto_increment,
  `username` varchar(100) collate utf8_unicode_ci NOT NULL,
  `password` varchar(100) collate utf8_unicode_ci NOT NULL,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(50) collate utf8_unicode_ci NOT NULL,
  `email` varchar(100) collate utf8_unicode_ci NOT NULL,
  `address` varchar(1000) collate utf8_unicode_ci NOT NULL,
  `sector` varchar(50) collate utf8_unicode_ci NOT NULL,
  `position` int(1) NOT NULL default '3',
  PRIMARY KEY  (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

-- 
-- dump ตาราง `member_db`
-- 

INSERT INTO `member_db` VALUES (61, 'Aungsuma', '1234', 'samagom', 'gommara', '0827837543', 'nubeemc@hotmail.com', 'talad\r\ntalad ', 'โรงเรียนเสือโก้กวิทยาสรรค์ ', 3);
INSERT INTO `member_db` VALUES (62, 'thanawut01', '', 'somchit', '', '', '', ' ', 'หน่วยงานในสังกัด', 3);
INSERT INTO `member_db` VALUES (63, 'admin', '1234', 'rrr', 'gommara', '0827837543', 'nubeemc@hotmail.com', 'talad\r\ntalad ', 'โรงเรียนหนองเหล็กศึกษา', 3);
INSERT INTO `member_db` VALUES (64, 'user', '1234', 'samagom', 'gommara', '0827837543', 'nubeemc@hotmail.com', '21/ 3 หูม่ 4  ', 'โรงเรียนดอนเงินพิทยาคาร', 3);

-- --------------------------------------------------------

-- 
-- Stand-in structure for view `viewcheck`
-- 
CREATE TABLE `viewcheck` (
`admin_id` int(11) unsigned
,`username` varchar(100)
,`password` varchar(100)
,`position` int(11)
);
-- --------------------------------------------------------

-- 
-- Stand-in structure for view `viewdatabase`
-- 
CREATE TABLE `viewdatabase` (
`admin_id` int(11) unsigned
,`username` varchar(100)
,`password` varchar(100)
,`name` varchar(100)
,`position` int(11)
);
-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `webboard_ans`
-- 

CREATE TABLE `webboard_ans` (
  `id_ans` int(15) NOT NULL,
  `id_question` int(15) NOT NULL,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `message` text collate utf8_unicode_ci NOT NULL,
  `email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `date_a` varchar(10) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id_ans`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- dump ตาราง `webboard_ans`
-- 

INSERT INTO `webboard_ans` VALUES (0, 0, 'q', 'q', 'q', 'q');
INSERT INTO `webboard_ans` VALUES (1, 1, 'สุทธิพงษ์', 'aaaaa', 'welove_9@hotmail.com', '12');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `webboard_quiz`
-- 

CREATE TABLE `webboard_quiz` (
  `id_question` int(11) NOT NULL,
  `title` varchar(50) collate utf8_unicode_ci NOT NULL,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `message` text collate utf8_unicode_ci NOT NULL,
  `email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `date_q` varchar(50) collate utf8_unicode_ci NOT NULL,
  `count_q` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id_question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- dump ตาราง `webboard_quiz`
-- 

INSERT INTO `webboard_quiz` VALUES (0, 'q', 'q', 'q', 'qq', 'q', 'q');
INSERT INTO `webboard_quiz` VALUES (1, 'ทำไมคอมไม่ติดครับ??', 'ธนาวุฒิ', 'คอมเป็นไร', 'welove_9@hotmail.com', '12-34-56', '');
INSERT INTO `webboard_quiz` VALUES (2, 'ทดสอบๆๆ', 'อารม', 'ฟหกฟหกห', 'welove_9@hotmail.com', '', '');

-- --------------------------------------------------------

-- 
-- Structure for view `viewcheck`
-- 
DROP TABLE IF EXISTS `viewcheck`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `project2`.`viewcheck` AS select `project2`.`admin_db`.`admin_id` AS `admin_id`,`project2`.`admin_db`.`username` AS `username`,`project2`.`admin_db`.`password` AS `password`,`project2`.`admin_db`.`position` AS `position` from `project2`.`admin_db` union select `project2`.`member_db`.`member_id` AS `member_id`,`project2`.`member_db`.`username` AS `username`,`project2`.`member_db`.`password` AS `password`,`project2`.`member_db`.`position` AS `position` from `project2`.`member_db`;

-- --------------------------------------------------------

-- 
-- Structure for view `viewdatabase`
-- 
DROP TABLE IF EXISTS `viewdatabase`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `project2`.`viewdatabase` AS select `project2`.`admin_db`.`admin_id` AS `admin_id`,`project2`.`admin_db`.`username` AS `username`,`project2`.`admin_db`.`password` AS `password`,`project2`.`admin_db`.`name` AS `name`,`project2`.`admin_db`.`position` AS `position` from `project2`.`admin_db` union select `project2`.`member_db`.`member_id` AS `member_id`,`project2`.`member_db`.`username` AS `username`,`project2`.`member_db`.`password` AS `password`,`project2`.`member_db`.`name` AS `name`,`project2`.`member_db`.`position` AS `position` from `project2`.`member_db`;
