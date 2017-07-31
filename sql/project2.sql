/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50713
Source Host           : localhost:3306
Source Database       : project2

Target Server Type    : MYSQL
Target Server Version : 50713
File Encoding         : 65001

Date: 2017-07-31 18:43:09
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
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_db
-- ----------------------------
INSERT INTO `admin_db` VALUES ('1', 'admin', '1234', 'Thanawut', 'Decchan', '0886723932', 'welove_9@hotmail.com', '1');
INSERT INTO `admin_db` VALUES ('2', 'somchai', '1234', 'สมชัย', 'สายชม', '09123940321', 'somchai@hotmail.com', '2');
INSERT INTO `admin_db` VALUES ('5', 'sompong', '1234', 'สีดำ', 'สีแดง', '0885723932', 'thanawut@hotmail.com', '2');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of deveice_addtech
-- ----------------------------
INSERT INTO `deveice_addtech` VALUES ('1', '5', '1', '5', '2017-07-31', '2017-08-03', 'คืน');

-- ----------------------------
-- Table structure for `device_db`
-- ----------------------------
DROP TABLE IF EXISTS `device_db`;
CREATE TABLE `device_db` (
  `device_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`device_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of device_db
-- ----------------------------
INSERT INTO `device_db` VALUES ('2', 'ไขควง');
INSERT INTO `device_db` VALUES ('5', 'คอมพิวเตอร์ หน้าจอ');

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
  PRIMARY KEY (`fix_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of fix_db
-- ----------------------------
INSERT INTO `fix_db` VALUES ('1', 'ธนาการ', 'เดชหาญ', '2017-07-31', 'โรงเรียนมัธยมดงยาง', 'เครื่องปริ้น', 'หมึกจางๆqqqqq', '08123456123', 'ยกเลิก', 'รอระบุ', 'รอระบุ', 'user');
INSERT INTO `fix_db` VALUES ('2', 'อังสุมา', 'กุณโฮง', '2017-07-31', 'องค์การบริหารส่วนจังหวัดมหาสารคาม', 'คอมพิวเตอร์', 'คอมค้างมากก', '08123456123', 'รอดำเนินการ', 'ค้างง', 'atom', 'Aungsuma');
INSERT INTO `fix_db` VALUES ('3', 'สมชัย', 'เข็มกลัด', '2017-07-31', 'โรงเรียนเวียงสะอาดพิทยาคม', 'เครื่องปริ้น', 'aaaaaaaaa', '01234567', 'รอดำเนินการ', 'ตตต', 'หกห', 'user');
INSERT INTO `fix_db` VALUES ('4', 'สมชัย', 'เข็มกลัด', '2017-07-31', 'โรงเรียนเวียงสะอาดพิทยาคม', 'คอมพิวเตอร์', 'เอาเอาเอาเอาเอา', '01234567', 'รอดำเนินการ', 'รอระบุ', 'รอระบุ', 'user');
INSERT INTO `fix_db` VALUES ('5', 'สมชัย', 'เข็มกลัด', '2017-07-31', 'โรงเรียนเวียงสะอาดพิทยาคม', 'คอมพิวเตอร์', 'ไม่เอาไม่เอาไม่เอา', '01234567', 'ยกเลิก', 'รอระบุ', 'รอระบุ', 'user');

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
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of member_db
-- ----------------------------
INSERT INTO `member_db` VALUES ('61', 'Aungsuma', '1234', 'samagom', 'gommara', '0827837543', 'nubeemc@hotmail.com', 'talad\r\ntalad ', 'โรงเรียนเสือโก้กวิทยาสรรค์ ', '3');
INSERT INTO `member_db` VALUES ('64', 'user', '1234', 'สมชัย', 'เข็มกลัด', '01234567', 'aaaaa@hotmail.com', '21/ 3 หูม่ 4  aaaaa', 'โรงเรียนเวียงสะอาดพิทยาคม', '3');
INSERT INTO `member_db` VALUES ('65', 'user01', '1234', 'หอมหวล', 'อลอัว', '0827837543', 'nubeemc@hotmail.com', 'มหาสารคาม ', 'หน่วยงานในสังกัด', '3');

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
  `date_a` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_ans`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of webboard_ans
-- ----------------------------
INSERT INTO `webboard_ans` VALUES ('1', '2', 'asdas', 'eqwe', 'sereepap2029@hotmail.com', '2017-07-31');
INSERT INTO `webboard_ans` VALUES ('2', '2', 'dsadsa', 'eqwewq', 'sereepap2029@gmail.com', '2017-07-31');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of webboard_quiz
-- ----------------------------
INSERT INTO `webboard_quiz` VALUES ('1', 'sdasd', 'asdasd', 'qweqw', 'sereepap2029@gmail.com', '2017-07-31 18:03:31', '0');
INSERT INTO `webboard_quiz` VALUES ('2', 'sdasd', 'asdasd', 'qweqw', 'sereepap2029@gmail.com', '2017-07-31 18:31:21', '2');

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
