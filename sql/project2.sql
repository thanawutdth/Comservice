/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50713
Source Host           : localhost:3306
Source Database       : project2

Target Server Type    : MYSQL
Target Server Version : 50713
File Encoding         : 65001

Date: 2017-08-02 22:05:39
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin_db`
-- ----------------------------
DROP TABLE IF EXISTS `admin_db`;
CREATE TABLE `admin_db` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(5) NOT NULL,
  `status` enum('ยกเลิก','ใช้งาน') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ใช้งาน',
  `picture` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_db
-- ----------------------------
INSERT INTO `admin_db` VALUES ('1', 'admin', '1234', 'ธนาวุฒิ d', 'เดชหาญaaaa', '0886723932a', 'welove_9@hotmail.com', '1', 'ใช้งาน', 'admin_1501686062.png');
INSERT INTO `admin_db` VALUES ('2', 'admin1', '1234', 'ผู้ดูแลระบบคนที่1', 'ผู้ดูแลระบบคนที่1', '081111111', 'admin1@gmail.com', '1', 'ใช้งาน', null);
INSERT INTO `admin_db` VALUES ('3', 'Technic1', '1234', 'ช่างคนที่1', 'ช่างคนที่1', '081111111', 'Technic1@gmail.com', '2', 'ใช้งาน', 'Technic1_1501685573.png');
INSERT INTO `admin_db` VALUES ('4', 'Technic2', '1234', 'ช่างคนที่2', 'ช่างคนที่2', '082222222', 'Technic2@gmail.com', '2', 'ใช้งาน', null);
INSERT INTO `admin_db` VALUES ('5', 'Technic3', '1234', 'ช่างคนที่3', 'ช่างคนที่3', '0833333333', 'Technic3@gmail.com', '2', 'ใช้งาน', null);
INSERT INTO `admin_db` VALUES ('6', 'Technic4', '1234', 'ช่างคนที่4', 'ช่างคนที่4', '0844444444', 'Technic4@gmail.com', '1', 'ยกเลิก', null);
INSERT INTO `admin_db` VALUES ('7', 'Technic5', '1234', 'ช่างคนที่5', 'ช่างคนที่5', '08123456123', 'thanawut.dth@gmail.com', '1', 'ใช้งาน', null);
INSERT INTO `admin_db` VALUES ('8', 'atom', '1234', 'atom', 'atomd', '0804032819', 'sereepap2029@hotmail.com', '1', 'ใช้งาน', 'admin_1501685709.png');

-- ----------------------------
-- Table structure for `deveice_addtech`
-- ----------------------------
DROP TABLE IF EXISTS `deveice_addtech`;
CREATE TABLE `deveice_addtech` (
  `admin_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `device_addtech_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `date_re` date NOT NULL,
  `status` enum('เบิก','คืน') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'เบิก',
  PRIMARY KEY (`device_addtech_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of deveice_addtech
-- ----------------------------
INSERT INTO `deveice_addtech` VALUES ('3', '4', '1', '1', '2017-08-02', '2017-08-02', 'เบิก');
INSERT INTO `deveice_addtech` VALUES ('4', '1', '2', '1', '2017-08-03', '2017-08-03', 'เบิก');

-- ----------------------------
-- Table structure for `device_db`
-- ----------------------------
DROP TABLE IF EXISTS `device_db`;
CREATE TABLE `device_db` (
  `device_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`device_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of device_db
-- ----------------------------
INSERT INTO `device_db` VALUES ('1', 'ชุดอุปกรณ์ไขควง');
INSERT INTO `device_db` VALUES ('2', 'power supply');
INSERT INTO `device_db` VALUES ('3', 'ชุดสายแปลง power');
INSERT INTO `device_db` VALUES ('4', 'ชุดลงโปรแกรมและwindows');
INSERT INTO `device_db` VALUES ('5', 'เครื่องเป่าฝุ่น');
INSERT INTO `device_db` VALUES ('6', 'ชุดอุปกรณ์ Network');
INSERT INTO `device_db` VALUES ('7', 'สาย VGA');
INSERT INTO `device_db` VALUES ('8', 'Debug card');
INSERT INTO `device_db` VALUES ('9', 'คีย์บอร์ด');

-- ----------------------------
-- Table structure for `files`
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `FilesID` int(10) NOT NULL,
  `FilesName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`FilesID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of files
-- ----------------------------

-- ----------------------------
-- Table structure for `fix_db`
-- ----------------------------
DROP TABLE IF EXISTS `fix_db`;
CREATE TABLE `fix_db` (
  `fix_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `sector` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('รอดำเนินการ','เสร็จสิ้น','ไม่สามารถดำเนินการได้','ยกเลิก') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'รอดำเนินการ',
  `infer` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'รอระบุ',
  `technician` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'รอระบุ',
  `fixuser` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type_device` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'รอระบุ',
  `amount` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'รอระบุ',
  `date_pre` date DEFAULT NULL,
  `date_pos` date DEFAULT NULL,
  PRIMARY KEY (`fix_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of fix_db
-- ----------------------------
INSERT INTO `fix_db` VALUES ('1', 'สมาชิก', 'สมาชิก', '2017-08-02', 'โรงเรียนหนองบัวปิยนิมิตร', 'คอมพิวเตอร์ pc', 'รบกวนลงโปรแกรมหน่อยครับ', '080000000', 'รอดำเนินการ', 'ลงโปรแกรม', 'รอระบุ', 'member', 'ชุดอุปกรณ์ไขควง', '1', '2017-08-03', '2017-08-04');
INSERT INTO `fix_db` VALUES ('2', 'สมาชิกคนที่1', 'สมาชิกคนที่1', '2017-08-03', 'อบจ มหาสารคาม', 'เครื่องปริ้นเตอร์', 'กระดาษปริ้นไม่ออกค่ะ', '0811111111', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member1', 'ชุดอุปกรณ์ไขควง', '1', '2017-08-03', '2017-08-04');
INSERT INTO `fix_db` VALUES ('3', 'สมาชิกคนที่2', 'สมาชิกคนที่2', '2017-08-02', 'โรงเรียนเวียงสะอาดพิทยาคม', 'คอมพิวเตอร์ pc', 'ลงวินโดวส์', '0822222222', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member2', '0', '', '0000-00-00', '0000-00-00');
INSERT INTO `fix_db` VALUES ('4', 'สมาชิกคนที่3', 'สมาชิกคนที่3', '2017-08-03', 'โรงเรียนมะค่าพิทยาคม', 'คอมพิวเตอร์โน๊ตบุ๊ค', 'ลงโปรแกรมแอนตี้ไวรัส', '0833333333', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member3', '0', '', '0000-00-00', '0000-00-00');
INSERT INTO `fix_db` VALUES ('5', 'สมาชิกคนที่4', 'สมาชิกคนที่4', '2017-08-03', 'โรงเรียนนาสีนวนพิทยาสรรค์', 'คอมพิวเตอร์โน๊ตบุ๊ค', 'ลงโปรแกรม', '0844444444', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member4', '0', '', '0000-00-00', '0000-00-00');
INSERT INTO `fix_db` VALUES ('6', 'สมาชิกคนที่1', 'สมาชิกคนที่1', '2017-08-03', 'อบจ มหาสารคาม', 'เครื่องปริ้นเตอร์', 'หมึกไม่ออก จางๆๆ', '0811111111', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member1', '0', '', '0000-00-00', '0000-00-00');
INSERT INTO `fix_db` VALUES ('7', 'สมาชิกคนที่2', 'สมาชิกคนที่2', '2017-08-03', 'โรงเรียนเวียงสะอาดพิทยาคม', 'คอมพิวเตอร์โน๊ตบุ๊ค', 'ลงวินโดวส์', '0822222222', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member2', '0', '', '0000-00-00', '0000-00-00');
INSERT INTO `fix_db` VALUES ('8', 'สมาชิกคนที่1', 'สมาชิกคนที่1', '2017-08-02', 'โรงเรียนหนองโพธิ์วิทยาคม', 'คอมพิวเตอร์ pc', 'ลง Microsoft', '0811111111', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member1', '0', '', '0000-00-00', '0000-00-00');
INSERT INTO `fix_db` VALUES ('9', 'ธนาวุฒิ p', 'เดชหาญ', '2017-08-16', 'องค์การบริหารส่วนจังหวัดมหาสารคาม', 'คอมพิวเตอร์โน๊ตบุ๊ค', 'asdasd sadasdasd', '0886723932', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'admin', 'รอระบุ', 'รอระบุ', null, null);
INSERT INTO `fix_db` VALUES ('10', 'ธนาวุฒิ p', 'เดชหาญ', '2017-08-31', 'องค์การบริหารส่วนจังหวัดมหาสารคาม', 'คอมพิวเตอร์ pc', 'ewwee234433455 23243264565564', '0886723932', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'admin', 'รอระบุ', 'รอระบุ', null, null);
INSERT INTO `fix_db` VALUES ('11', 'สมาชิก0', 'สมาชิก9', '2017-08-16', 'โรงเรียนหนองบัวปิยนิมิตร', 'คอมพิวเตอร์โน๊ตบุ๊ค', 'aaaaaaaaa', '080000000', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member', 'รอระบุ', 'รอระบุ', null, null);
INSERT INTO `fix_db` VALUES ('12', 'ช่างคนที่11', 'ช่างคนที่1', '2017-08-04', 'องค์การบริหารส่วนจังหวัดมหาสารคาม', 'คอมพิวเตอร์โน๊ตบุ๊ค', 'ssssssssssssss', '081111111', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'Technic1', 'รอระบุ', 'รอระบุ', null, null);
INSERT INTO `fix_db` VALUES ('13', 'ธนาวุฒิ a', 'เดชหาญ', '2017-08-10', 'องค์การบริหารส่วนจังหวัดมหาสารคาม', 'คอมพิวเตอร์ pc', '1234', '0886723932', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'admin', 'รอระบุ', 'รอระบุ', null, null);
INSERT INTO `fix_db` VALUES ('14', 'สมาชิกคนที่1', 'สมาชิกคนที่1', '2017-08-24', 'โรงเรียนหนองโพธิ์วิทยาคม', 'คอมพิวเตอร์ pc', 'โลกแตก', '0811111111', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'member1', 'รอระบุ', 'รอระบุ', null, null);
INSERT INTO `fix_db` VALUES ('15', 'ธนาวุฒิ ', 'เดชหาญaaaa', '2017-08-02', 'องค์การบริหารส่วนจังหวัดมหาสารคาม', 'คอมพิวเตอร์โน๊ตบุ๊ค', 'ลงวินโดว', '0886723932a', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'admin', 'รอระบุ', 'รอระบุ', null, null);

-- ----------------------------
-- Table structure for `image_path`
-- ----------------------------
DROP TABLE IF EXISTS `image_path`;
CREATE TABLE `image_path` (
  `image_id` int(4) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of image_path
-- ----------------------------
INSERT INTO `image_path` VALUES ('4', 'Wait.png');
INSERT INTO `image_path` VALUES ('5', 'Correct.png');
INSERT INTO `image_path` VALUES ('6', 'Close.png');

-- ----------------------------
-- Table structure for `member_db`
-- ----------------------------
DROP TABLE IF EXISTS `member_db`;
CREATE TABLE `member_db` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `sector` varchar(50) CHARACTER SET utf8 NOT NULL,
  `position` int(1) NOT NULL DEFAULT '3',
  `status` enum('ใช้งาน','ยกเลิก') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ใช้งาน',
  `picture` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of member_db
-- ----------------------------
INSERT INTO `member_db` VALUES ('1', 'member', '1234', 'สมาชิก0', 'สมาชิก9', '080000000', 'member@hotmail.com', '222/1 mahasarakhamo', 'โรงเรียนหนองบัวปิยนิมิตร', '3', 'ใช้งาน', 'member_1501685356.png');
INSERT INTO `member_db` VALUES ('2', 'member1', '1234', 'สมาชิกคนที่1', 'สมาชิกคนที่1', '0811111111', 'member1@gmail.com', '111/1 มหาสารคาม ', 'โรงเรียนหนองโพธิ์วิทยาคม', '3', 'ใช้งาน', null);
INSERT INTO `member_db` VALUES ('3', 'member2', '1234', 'สมาชิกคนที่2', 'สมาชิกคนที่2', '0822222222', 'member2@gmail.com', '222/2 มหาสารคาม ', 'โรงเรียนเวียงสะอาดพิทยาคม', '3', 'ใช้งาน', null);
INSERT INTO `member_db` VALUES ('4', 'member3', '1234', 'สมาชิกคนที่3', 'สมาชิกคนที่3', '0833333333', 'member3@gmail.com', '333/3 มหาสารคาม', 'โรงเรียนมะค่าพิทยาคม', '3', 'ยกเลิก', null);
INSERT INTO `member_db` VALUES ('5', 'member4', '1234', 'สมาชิกคนที่4', 'สมาชิกคนที่4', '0844444444', 'member4@gmail.com', '444/4 มหาสารคาม', 'โรงเรียนนาสีนวนพิทยาสรรค์', '3', 'ยกเลิก', null);

-- ----------------------------
-- Table structure for `webboard_ans`
-- ----------------------------
DROP TABLE IF EXISTS `webboard_ans`;
CREATE TABLE `webboard_ans` (
  `id_ans` int(15) NOT NULL AUTO_INCREMENT,
  `id_question` int(15) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_a` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_ans`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of webboard_ans
-- ----------------------------

-- ----------------------------
-- Table structure for `webboard_quiz`
-- ----------------------------
DROP TABLE IF EXISTS `webboard_quiz`;
CREATE TABLE `webboard_quiz` (
  `id_question` bigint(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_q` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `count_q` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of webboard_quiz
-- ----------------------------
INSERT INTO `webboard_quiz` VALUES ('3', 'sdasd', 'aasdasdwqesadzxczx', 'asdasdqwe4qwewq', 'sereepap2029@hotmail.com', '2017-08-02 21:08:43', '0');

-- ----------------------------
-- View structure for `viewcheck`
-- ----------------------------
DROP VIEW IF EXISTS `viewcheck`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewcheck` AS select `admin_db`.`admin_id` AS `admin_id`,`admin_db`.`username` AS `username`,`admin_db`.`password` AS `password`,`admin_db`.`position` AS `position` from `admin_db` union select `member_db`.`member_id` AS `member_id`,`member_db`.`username` AS `username`,`member_db`.`password` AS `password`,`member_db`.`position` AS `position` from `member_db`;

-- ----------------------------
-- View structure for `viewdatabase`
-- ----------------------------
DROP VIEW IF EXISTS `viewdatabase`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewdatabase` AS select `admin_db`.`admin_id` AS `admin_id`,`admin_db`.`username` AS `username`,`admin_db`.`password` AS `password`,`admin_db`.`name` AS `name`,`admin_db`.`position` AS `position` from `admin_db` union select `member_db`.`member_id` AS `member_id`,`member_db`.`username` AS `username`,`member_db`.`password` AS `password`,`member_db`.`name` AS `name`,`member_db`.`position` AS `position` from `member_db`;
