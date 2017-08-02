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
  `status` enum('ยกเลิก','ใช้งาน') collate utf8_unicode_ci NOT NULL default 'ใช้งาน',
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- 
-- dump ตาราง `admin_db`
-- 

INSERT INTO `admin_db` VALUES (1, 'admin', '1234', 'ธนาวุฒิ ', 'เดชหาญ', '0886723932', 'welove_9@hotmail.com', 1, 'ใช้งาน');
INSERT INTO `admin_db` VALUES (2, 'admin1', '1234', 'ผู้ดูแลระบบคนที่1', 'ผู้ดูแลระบบคนที่1', '081111111', 'admin1@gmail.com', 1, 'ใช้งาน');
INSERT INTO `admin_db` VALUES (3, 'Technic1', '1234', 'ช่างคนที่1', 'ช่างคนที่1', '081111111', 'Technic1@gmail.com', 2, 'ใช้งาน');
INSERT INTO `admin_db` VALUES (4, 'Technic2', '1234', 'ช่างคนที่2', 'ช่างคนที่2', '082222222', 'Technic2@gmail.com', 2, 'ใช้งาน');
INSERT INTO `admin_db` VALUES (5, 'Technic3', '1234', 'ช่างคนที่3', 'ช่างคนที่3', '0833333333', 'Technic3@gmail.com', 2, 'ใช้งาน');
INSERT INTO `admin_db` VALUES (6, 'Technic4', '1234', 'ช่างคนที่4', 'ช่างคนที่4', '0844444444', 'Technic4@gmail.com', 2, 'ใช้งาน');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- dump ตาราง `deveice_addtech`
-- 

INSERT INTO `deveice_addtech` VALUES (3, 4, 1, '1', '2017-08-02', '2017-08-02', 'เบิก');
INSERT INTO `deveice_addtech` VALUES (4, 1, 2, '1', '2017-08-03', '2017-08-03', 'เบิก');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `device_db`
-- 

CREATE TABLE `device_db` (
  `device_id` int(11) NOT NULL auto_increment,
  `type` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`device_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

-- 
-- dump ตาราง `device_db`
-- 

INSERT INTO `device_db` VALUES (1, 'ชุดอุปกรณ์ไขควง');
INSERT INTO `device_db` VALUES (2, 'power supply');
INSERT INTO `device_db` VALUES (3, 'ชุดสายแปลง power');
INSERT INTO `device_db` VALUES (4, 'ชุดลงโปรแกรมและwindows');
INSERT INTO `device_db` VALUES (5, 'เครื่องเป่าฝุ่น');
INSERT INTO `device_db` VALUES (6, 'ชุดอุปกรณ์ Network');
INSERT INTO `device_db` VALUES (7, 'สาย VGA');
INSERT INTO `device_db` VALUES (8, 'Debug card');

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
  `type_device` varchar(100) collate utf8_unicode_ci NOT NULL default 'รอระบุ',
  `amount` varchar(50) collate utf8_unicode_ci NOT NULL default 'รอระบุ',
  `date_pre` date NOT NULL,
  `date_pos` date NOT NULL,
  PRIMARY KEY  (`fix_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

-- 
-- dump ตาราง `fix_db`
-- 

INSERT INTO `fix_db` VALUES (1, 'สมาชิก', 'สมาชิก', '2017-08-02', 'โรงเรียนหนองบัวปิยนิมิตร', 'คอมพิวเตอร์ pc', 'รบกวนลงโปรแกรมหน่อยครับ', '080000000', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member', 'power supply', '1', '2017-08-03', '2017-08-03');
INSERT INTO `fix_db` VALUES (2, 'สมาชิกคนที่1', 'สมาชิกคนที่1', '2017-08-03', 'อบจ มหาสารคาม', 'เครื่องปริ้นเตอร์', 'กระดาษปริ้นไม่ออกค่ะ', '0811111111', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member1', 'ชุดอุปกรณ์ไขควง', '1', '2017-08-03', '2017-08-04');
INSERT INTO `fix_db` VALUES (3, 'สมาชิกคนที่2', 'สมาชิกคนที่2', '2017-08-02', 'โรงเรียนเวียงสะอาดพิทยาคม', 'คอมพิวเตอร์ pc', 'ลงวินโดวส์', '0822222222', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member2', '0', '', '0000-00-00', '0000-00-00');
INSERT INTO `fix_db` VALUES (4, 'สมาชิกคนที่3', 'สมาชิกคนที่3', '2017-08-03', 'โรงเรียนมะค่าพิทยาคม', 'คอมพิวเตอร์โน๊ตบุ๊ค', 'ลงโปรแกรมแอนตี้ไวรัส', '0833333333', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member3', '0', '', '0000-00-00', '0000-00-00');
INSERT INTO `fix_db` VALUES (5, 'สมาชิกคนที่4', 'สมาชิกคนที่4', '2017-08-03', 'โรงเรียนนาสีนวนพิทยาสรรค์', 'คอมพิวเตอร์โน๊ตบุ๊ค', 'ลงโปรแกรม', '0844444444', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member4', '0', '', '0000-00-00', '0000-00-00');
INSERT INTO `fix_db` VALUES (6, 'สมาชิกคนที่1', 'สมาชิกคนที่1', '2017-08-03', 'อบจ มหาสารคาม', 'เครื่องปริ้นเตอร์', 'หมึกไม่ออก จางๆๆ', '0811111111', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member1', '0', '', '0000-00-00', '0000-00-00');
INSERT INTO `fix_db` VALUES (7, 'สมาชิกคนที่2', 'สมาชิกคนที่2', '2017-08-03', 'โรงเรียนเวียงสะอาดพิทยาคม', 'คอมพิวเตอร์โน๊ตบุ๊ค', 'ลงวินโดวส์', '0822222222', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member2', '0', '', '0000-00-00', '0000-00-00');
INSERT INTO `fix_db` VALUES (8, 'สมาชิกคนที่1', 'สมาชิกคนที่1', '2017-08-02', 'โรงเรียนหนองโพธิ์วิทยาคม', 'คอมพิวเตอร์ pc', 'ลง Microsoft', '0811111111', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member1', '0', '', '0000-00-00', '0000-00-00');

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
  `status` enum('ใช้งาน','ยกเลิก') collate utf8_unicode_ci NOT NULL default 'ใช้งาน',
  PRIMARY KEY  (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- 
-- dump ตาราง `member_db`
-- 

INSERT INTO `member_db` VALUES (1, 'member', '1234', 'สมาชิก', 'สมาชิก', '080000000', 'member@hotmail.com', '222/1 mahasarakham', 'โรงเรียนหนองบัวปิยนิมิตร', 3, 'ใช้งาน');
INSERT INTO `member_db` VALUES (2, 'member1', '1234', 'สมาชิกคนที่1', 'สมาชิกคนที่1', '0811111111', 'member1@gmail.com', '111/1 มหาสารคาม ', 'โรงเรียนหนองโพธิ์วิทยาคม', 3, 'ใช้งาน');
INSERT INTO `member_db` VALUES (3, 'member2', '1234', 'สมาชิกคนที่2', 'สมาชิกคนที่2', '0822222222', 'member2@gmail.com', '222/2 มหาสารคาม ', 'โรงเรียนเวียงสะอาดพิทยาคม', 3, 'ใช้งาน');
INSERT INTO `member_db` VALUES (4, 'member3', '1234', 'สมาชิกคนที่3', 'สมาชิกคนที่3', '0833333333', 'member3@gmail.com', '333/3 มหาสารคาม', 'โรงเรียนมะค่าพิทยาคม', 3, 'ใช้งาน');
INSERT INTO `member_db` VALUES (5, 'member4', '1234', 'สมาชิกคนที่4', 'สมาชิกคนที่4', '0844444444', 'member4@gmail.com', '444/4 มหาสารคาม', 'โรงเรียนนาสีนวนพิทยาสรรค์', 3, 'ใช้งาน');

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
  `id_ans` int(15) NOT NULL auto_increment,
  `id_question` int(15) NOT NULL,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `message` text collate utf8_unicode_ci NOT NULL,
  `email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `date_a` varchar(10) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id_ans`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `webboard_ans`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `webboard_quiz`
-- 

CREATE TABLE `webboard_quiz` (
  `id_question` bigint(11) NOT NULL auto_increment,
  `title` varchar(50) collate utf8_unicode_ci NOT NULL,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `message` text collate utf8_unicode_ci NOT NULL,
  `email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `date_q` varchar(50) collate utf8_unicode_ci NOT NULL,
  `count_q` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id_question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `webboard_quiz`
-- 


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
