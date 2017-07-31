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
  `admin_id` int(11) NOT NULL auto_increment,
  `username` varchar(100) collate utf8_unicode_ci NOT NULL,
  `password` varchar(100) collate utf8_unicode_ci NOT NULL,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(50) collate utf8_unicode_ci NOT NULL,
  `email` varchar(100) collate utf8_unicode_ci NOT NULL,
  `position` int(5) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- 
-- dump ตาราง `admin_db`
-- 

INSERT INTO `admin_db` VALUES (1, 'admin', '1234', 'Thanawut', 'Decchan', '0886723932', 'welove_9@hotmail.com', 1);
INSERT INTO `admin_db` VALUES (2, 'somchai', '1234', 'สมชัย', 'สายชม', '09123940321', 'somchai@hotmail.com', 2);
INSERT INTO `admin_db` VALUES (5, 'sompong', '1234', 'สีดำ', 'สีแดง', '0885723932', 'thanawut@hotmail.com', 2);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `deveice_addtech`
-- 

CREATE TABLE `deveice_addtech` (
  `admin_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `device_addtech_id` int(11) NOT NULL auto_increment,
  `amount` varchar(50) collate utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `date_re` date NOT NULL,
  `status` enum('เบิก','คืน') collate utf8_unicode_ci NOT NULL default 'เบิก',
  PRIMARY KEY  (`device_addtech_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- dump ตาราง `deveice_addtech`
-- 

INSERT INTO `deveice_addtech` VALUES (1, 5, 1, '5', '2017-07-31', '2017-08-03', 'คืน');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `device_db`
-- 

CREATE TABLE `device_db` (
  `device_id` int(11) NOT NULL auto_increment,
  `type` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`device_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- 
-- dump ตาราง `device_db`
-- 

INSERT INTO `device_db` VALUES (2, 'ไขควง');
INSERT INTO `device_db` VALUES (5, 'คอมพิวเตอร์ หน้าจอ');

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
  `sector` varchar(100) collate utf8_unicode_ci NOT NULL,
  `type` varchar(100) collate utf8_unicode_ci NOT NULL,
  `detail` varchar(1000) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(15) collate utf8_unicode_ci NOT NULL,
  `status` enum('รอดำเนินการ','เสร็จสิ้น','ไม่สามารถดำเนินการได้','ยกเลิก') collate utf8_unicode_ci NOT NULL default 'รอดำเนินการ',
  `infer` varchar(500) collate utf8_unicode_ci NOT NULL default 'รอระบุ',
  `technician` varchar(100) collate utf8_unicode_ci NOT NULL default 'รอระบุ',
  `fixuser` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`fix_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- 
-- dump ตาราง `fix_db`
-- 

INSERT INTO `fix_db` VALUES (1, 'ธนาการ', 'เดชหาญ', '2017-07-31', 'โรงเรียนมัธยมดงยาง', 'เครื่องปริ้น', 'หมึกจางๆqqqqq', '08123456123', 'ยกเลิก', 'รอระบุ', 'รอระบุ', 'user');
INSERT INTO `fix_db` VALUES (2, 'อังสุมา', 'กุณโฮง', '2017-07-31', 'องค์การบริหารส่วนจังหวัดมหาสารคาม', 'คอมพิวเตอร์', 'คอมค้างมากก', '08123456123', 'รอดำเนินการ', 'ค้างง', 'atom', 'Aungsuma');
INSERT INTO `fix_db` VALUES (3, 'สมชัย', 'เข็มกลัด', '2017-07-31', 'โรงเรียนเวียงสะอาดพิทยาคม', 'เครื่องปริ้น', 'aaaaaaaaa', '01234567', 'รอดำเนินการ', 'ตตต', 'หกห', 'user');
INSERT INTO `fix_db` VALUES (4, 'สมชัย', 'เข็มกลัด', '2017-07-31', 'โรงเรียนเวียงสะอาดพิทยาคม', 'คอมพิวเตอร์', 'เอาเอาเอาเอาเอา', '01234567', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'user');
INSERT INTO `fix_db` VALUES (5, 'สมชัย', 'เข็มกลัด', '2017-07-31', 'โรงเรียนเวียงสะอาดพิทยาคม', 'คอมพิวเตอร์', 'ไม่เอาไม่เอาไม่เอา', '01234567', 'ยกเลิก', 'รอระบุ', 'รอระบุ', 'user');

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
  `address` text collate utf8_unicode_ci NOT NULL,
  `sector` varchar(50) character set utf8 NOT NULL,
  `position` int(1) NOT NULL default '3',
  PRIMARY KEY  (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=66 ;

-- 
-- dump ตาราง `member_db`
-- 

INSERT INTO `member_db` VALUES (61, 'Aungsuma', '1234', 'samagom', 'gommara', '0827837543', 'nubeemc@hotmail.com', 'talad\r\ntalad ', 'โรงเรียนเสือโก้กวิทยาสรรค์ ', 3);
INSERT INTO `member_db` VALUES (64, 'user', '1234', 'สมชัย', 'เข็มกลัด', '01234567', 'aaaaa@hotmail.com', '21/ 3 หูม่ 4  aaaaa', 'โรงเรียนเวียงสะอาดพิทยาคม', 3);
INSERT INTO `member_db` VALUES (65, 'user01', '1234', 'หอมหวล', 'อลอัว', '0827837543', 'nubeemc@hotmail.com', 'มหาสารคาม ', 'หน่วยงานในสังกัด', 3);

-- --------------------------------------------------------

-- 
-- Stand-in structure for view `viewcheck`
-- 
CREATE TABLE `viewcheck` (
`admin_id` int(11)
,`username` varchar(100)
,`password` varchar(100)
,`position` int(11)
);
-- --------------------------------------------------------

-- 
-- Stand-in structure for view `viewdatabase`
-- 
CREATE TABLE `viewdatabase` (
`admin_id` int(11)
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
