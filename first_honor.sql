/*
Navicat MySQL Data Transfer

Source Server         : kompassl_main
Source Server Version : 50713
Source Host           : localhost:3306
Source Database       : first_honor

Target Server Type    : MYSQL
Target Server Version : 50713
File Encoding         : 65001

Date: 2017-06-10 19:33:36
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `about`
-- ----------------------------
DROP TABLE IF EXISTS `about`;
CREATE TABLE `about` (
  `title` text COLLATE utf8_unicode_ci,
  `des_1` text COLLATE utf8_unicode_ci,
  `des_2` text COLLATE utf8_unicode_ci,
  `philosophy` text COLLATE utf8_unicode_ci,
  `footer` text COLLATE utf8_unicode_ci,
  `title_jp` text COLLATE utf8_unicode_ci,
  `des_1_jp` text COLLATE utf8_unicode_ci,
  `des_2_jp` text COLLATE utf8_unicode_ci,
  `philosophy_jp` text COLLATE utf8_unicode_ci,
  `footer_jp` text COLLATE utf8_unicode_ci,
  `home_des` text COLLATE utf8_unicode_ci,
  `home_des_jp` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of about
-- ----------------------------
INSERT INTO `about` VALUES ('About<br>Kompass', 'With a team of experienced professionals, Kompass Law is capable of providing a variety of legal services, be it advisory, transactional, strategic planning or dispute resolution services. Our services, divided into 3 practice groups, i.e. General Commercial & Corporate, Work Permit & Immigration and Dispute Resolution, cover a wide range of legal practice areas, including merger & acquisition; corporate & securities laws; mega-project; investment; foreign business law; international trade; contracts; employment law; work permit & immigration; environmental & mining laws; antitrust law; consumer protection law; and litigation & arbitration.', 'Apart from our business practice, the Firm always has responsive consideration on public participation. Our senior legal practitioners have constantly dedicated their times and efforts to participate and support activities of several public organizations on pro-bono basis. Being long-term member of the Board of Trade of Thailand, Thai Chamber of Commerce, International Chamber of Commerce as well as several Foreign Chambers of Commerce, our Firm’s members have involved in preparation of the Thai version of ICC’s INCOTERMS and been appointed to participate in numbers of Government specific Committees and Sub-committees including legislation drafting groups.', 'TOGETHERNESS', 'is always reflected in the way we provide our service. Alongside our clients, we work with a mind set of a business partner and a common goal to help them arrive at a practical solution to all their legal issues.', 'About<br>Kompass', 'With a team of experienced professionals, Kompass Law is capable of providing a variety of legal services, be it advisory, transactional, strategic planning or dispute resolution services. Our services, divided into 3 practice groups, i.e. General Commercial & Corporate, Work Permit & Immigration and Dispute Resolution, cover a wide range of legal practice areas, including merger & acquisition; corporate & securities laws; mega-project; investment; foreign business law; international trade; contracts; employment law; work permit & immigration; environmental & mining laws; antitrust law; consumer protection law; and litigation & arbitration.JP', 'Apart from our business practice, the Firm always has responsive consideration on public participation. Our senior legal practitioners have constantly dedicated their times and efforts to participate and support activities of several public organizations on pro-bono basis. Being long-term member of the Board of Trade of Thailand, Thai Chamber of Commerce, International Chamber of Commerce as well as several Foreign Chambers of Commerce, our Firm’s members have involved in preparation of the Thai version of ICC’s INCOTERMS and been appointed to participate in numbers of Government specific Committees and Sub-committees including legislation drafting groups.JP', 'TOGETHERNESS JP', 'is always reflected in the way we provide our service. Alongside our clients, we work with a mind set of a business partner and a common goal to help them arrive at a practical solution to all their legal issues. JP', 'Kompass Law Ltd. is a mid-size city law firm located in Bangkok’s central business area. Founded in early 2002 by former veteran lawyers from the world’s leading international law firm, Kompass Law offers full range of legal services with a goal to provide our clients with responsive solution to all their legal issues. Originally known as HNP Legal, our Firm has worked closely with a diverse group of clients, varying among domestic and international enterprises, both private and state owned.', 'Kompass Law Ltd. is a mid-size city law firm located in Bangkok’s central business area. Founded in early 2002 by former veteran lawyers from the world’s leading international law firm, Kompass Law offers full range of legal services with a goal to provide our clients with responsive solution to all their legal issues. Originally known as HNP Legal, our Firm has worked closely with a diverse group of clients, varying among domestic and international enterprises, both private and state owned. JP');

-- ----------------------------
-- Table structure for `admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_access` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('sadmin', 'sadmin', 'sadmin', 'sadmin', '1497096932');

-- ----------------------------
-- Table structure for `album`
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `date` bigint(11) DEFAULT '999',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of album
-- ----------------------------
INSERT INTO `album` VALUES ('021d41cf95', 'BB', '1497035161');
INSERT INTO `album` VALUES ('1ac354e4be', '2017 - Australia', '1497036541');
INSERT INTO `album` VALUES ('1bb1a485fa', '2017 - Australia', '1497468421');
INSERT INTO `album` VALUES ('2f5d7b5f06', '2017 - Australia', '1496345341');
INSERT INTO `album` VALUES ('7e104b2480', '2017 - Australia', '1496863681');
INSERT INTO `album` VALUES ('a04411dd73', '2017 - Australia', '1496345341');
INSERT INTO `album` VALUES ('bb9dddff25', '2017 - Australia', '1496345341');
INSERT INTO `album` VALUES ('bfaac5ae00', 'A', '1496258821');

-- ----------------------------
-- Table structure for `contact`
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `prefix` text COLLATE utf8_unicode_ci,
  `name` text COLLATE utf8_unicode_ci,
  `topic` text COLLATE utf8_unicode_ci,
  `Email` text COLLATE utf8_unicode_ci,
  `Phone` text COLLATE utf8_unicode_ci,
  `des` text COLLATE utf8_unicode_ci,
  `date` bigint(11) DEFAULT NULL,
  `is_read` enum('n','y') COLLATE utf8_unicode_ci DEFAULT 'n',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of contact
-- ----------------------------

-- ----------------------------
-- Table structure for `country`
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `picture` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) DEFAULT '999',
  `des` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO `country` VALUES ('3697e8bc28', 'Australia', '3697e8bc28_1496218802.jpg', '1', '');
INSERT INTO `country` VALUES ('46e237cdd1', 'USA', '46e237cdd1_1496218802.jpg', '2', '');
INSERT INTO `country` VALUES ('5ce9db211c', 'Singapore', '5ce9db211c_1496218802.jpg', '4', '');
INSERT INTO `country` VALUES ('83f516ee15', 'Other', '83f516ee15_1496218801.jpg', '6', '');
INSERT INTO `country` VALUES ('9d74914480', 'New Zealand', '9d74914480_1496218802.jpg', '5', '');
INSERT INTO `country` VALUES ('fb899a3151', 'United Kingdom', 'fb899a3151_1496218802.jpg', '3', '');

-- ----------------------------
-- Table structure for `country_img`
-- ----------------------------
DROP TABLE IF EXISTS `country_img`;
CREATE TABLE `country_img` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) DEFAULT NULL,
  `country_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of country_img
-- ----------------------------
INSERT INTO `country_img` VALUES ('187ea8c2d8', '3697e8bc28_187ea8c2d8_1496241822.jpg', '2', '3697e8bc28');
INSERT INTO `country_img` VALUES ('2940839e10', '46e237cdd1_2940839e10_1496242244.jpg', '2', '46e237cdd1');
INSERT INTO `country_img` VALUES ('2ea06e95af', '5ce9db211c_2ea06e95af_1496242323.jpg', '2', '5ce9db211c');
INSERT INTO `country_img` VALUES ('33679314b7', '83f516ee15_33679314b7_1496242304.jpg', '2', '83f516ee15');
INSERT INTO `country_img` VALUES ('3d6d800870', '9d74914480_3d6d800870_1496242312.jpg', '3', '9d74914480');
INSERT INTO `country_img` VALUES ('407763e887', '46e237cdd1_407763e887_1496242244.jpg', '3', '46e237cdd1');
INSERT INTO `country_img` VALUES ('44d6b8f726', 'fb899a3151_44d6b8f726_1496242252.jpg', '3', 'fb899a3151');
INSERT INTO `country_img` VALUES ('5aeed75257', '83f516ee15_5aeed75257_1496242304.jpg', '3', '83f516ee15');
INSERT INTO `country_img` VALUES ('5d898c5b16', '83f516ee15_5d898c5b16_1496242304.jpg', '1', '83f516ee15');
INSERT INTO `country_img` VALUES ('66ef6c875a', 'fb899a3151_66ef6c875a_1496242252.jpg', '2', 'fb899a3151');
INSERT INTO `country_img` VALUES ('829332a441', '5ce9db211c_829332a441_1496242323.jpg', '1', '5ce9db211c');
INSERT INTO `country_img` VALUES ('969c703fbd', '3697e8bc28_969c703fbd_1496241821.jpg', '1', '3697e8bc28');
INSERT INTO `country_img` VALUES ('9b1ae952e8', '3697e8bc28_9b1ae952e8_1496241822.jpg', '3', '3697e8bc28');
INSERT INTO `country_img` VALUES ('b8d824d106', '9d74914480_b8d824d106_1496242312.jpg', '2', '9d74914480');
INSERT INTO `country_img` VALUES ('bf567c31c4', '46e237cdd1_bf567c31c4_1496242244.jpg', '1', '46e237cdd1');
INSERT INTO `country_img` VALUES ('cfcbb02b8a', '9d74914480_cfcbb02b8a_1496242312.jpg', '1', '9d74914480');
INSERT INTO `country_img` VALUES ('db23534dcc', 'fb899a3151_db23534dcc_1496242251.jpg', '1', 'fb899a3151');
INSERT INTO `country_img` VALUES ('f39f393546', '5ce9db211c_f39f393546_1496242323.jpg', '3', '5ce9db211c');

-- ----------------------------
-- Table structure for `etc`
-- ----------------------------
DROP TABLE IF EXISTS `etc`;
CREATE TABLE `etc` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `what` text COLLATE utf8_unicode_ci,
  `fb` text COLLATE utf8_unicode_ci,
  `tw` text COLLATE utf8_unicode_ci,
  `ig` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of etc
-- ----------------------------
INSERT INTO `etc` VALUES ('1', 'Apparently we had reached a great height in the atmosphere, for the sky was a dead black, and the stars had ceased to twinkle. By the same illusion which lifts the horizon of the sea to the level of the spectator on a hillside, the sable cloud beneath was dished out, and the car seemed to float in the middle of an immense dark sphere, whose upper half was strewn with silver. Looking down into the dark gulf below, I could see a ruddy light streaming through a rift in the clouds', '#', '#', '#');

-- ----------------------------
-- Table structure for `etc_img`
-- ----------------------------
DROP TABLE IF EXISTS `etc_img`;
CREATE TABLE `etc_img` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) DEFAULT NULL,
  `link` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of etc_img
-- ----------------------------
INSERT INTO `etc_img` VALUES ('1507742530', '1507742530_1496339930.jpg', '3', 'F');
INSERT INTO `etc_img` VALUES ('5c7d4fa399', '5c7d4fa399_1496337492.jpg', '5', '');
INSERT INTO `etc_img` VALUES ('9d8b37a102', '9d8b37a102_1496337483.jpg', '2', 'S');
INSERT INTO `etc_img` VALUES ('b767468f5d', 'b767468f5d_1496337483.jpg', '1', 'A');
INSERT INTO `etc_img` VALUES ('ef16cc6907', 'ef16cc6907_1496337483.jpg', '4', 'D');

-- ----------------------------
-- Table structure for `faq`
-- ----------------------------
DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8_unicode_ci,
  `answer` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) DEFAULT '999',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of faq
-- ----------------------------
INSERT INTO `faq` VALUES ('48', 'The design looks minimalistic, pleasant to the eye, and user-friendly.20', '• I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors)', '1');
INSERT INTO `faq` VALUES ('49', 'The design looks minimalistic, pleasant to the eye, and user-friendly.5', '• I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors)', '2');
INSERT INTO `faq` VALUES ('50', 'The design looks minimalistic, pleasant to the eye, and user-friendly.', '• I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors)', '3');
INSERT INTO `faq` VALUES ('51', 'The design looks minimalistic, pleasant to the eye, and user-friendly.3', '• I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors)', '4');
INSERT INTO `faq` VALUES ('52', 'The design looks minimalistic, pleasant to the eye, and user-friendly.4', '• I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors) I love the way the blocks are displayed: a simple use of cool orange and black icons (which are SoundCloud’s main logo colors)', '5');

-- ----------------------------
-- Table structure for `feedback`
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci,
  `name` text COLLATE utf8_unicode_ci,
  `position` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) DEFAULT '999',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of feedback
-- ----------------------------
INSERT INTO `feedback` VALUES ('382eed3b62', '382eed3b62_1496335311.jpg', 'Nana', 'They were always helpful when I needed some assistance and were very informative. I didn\'t have any issues with them during my summer in America. The team were friendly from start to finish. It was nice that they came to visit me at the camp too!', '2');
INSERT INTO `feedback` VALUES ('898123adfb', '898123adfb_1496335311.jpg', 'Nana', 'They were always helpful when I needed some assistance and were very informative. I didn\'t have any issues with them during my summer in America. The team were friendly from start to finish. It was nice that they came to visit me at the camp too!', '1');
INSERT INTO `feedback` VALUES ('bcf6fcba5b', 'bcf6fcba5b_1496335311.jpg', 'Nana', 'They were always helpful when I needed some assistance and were very informative. I didn\'t have any issues with them during my summer in America. The team were friendly from start to finish. It was nice that they came to visit me at the camp too!', '3');

-- ----------------------------
-- Table structure for `gallery`
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci,
  `name` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) DEFAULT '999',
  `album_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of gallery
-- ----------------------------
INSERT INTO `gallery` VALUES ('500d45bb82', '1bb1a485fa_500d45bb82_1497036535.jpg', '', '1', '1bb1a485fa');
INSERT INTO `gallery` VALUES ('671379b7be', 'a04411dd73_671379b7be_1497036586.jpg', '', '1', 'a04411dd73');
INSERT INTO `gallery` VALUES ('6b3d8b1cf0', 'bb9dddff25_6b3d8b1cf0_1497036553.jpg', '', '1', 'bb9dddff25');
INSERT INTO `gallery` VALUES ('7f493c0099', '1ac354e4be_7f493c0099_1497036567.jpg', '', '1', '1ac354e4be');
INSERT INTO `gallery` VALUES ('b3d08a8ce3', 'bfaac5ae00_b3d08a8ce3_1497036470.jpg', '', '1', 'bfaac5ae00');
INSERT INTO `gallery` VALUES ('ce67ffb518', '2f5d7b5f06_ce67ffb518_1497036578.jpg', '', '1', '2f5d7b5f06');
INSERT INTO `gallery` VALUES ('d34471192e', '7e104b2480_d34471192e_1497036544.jpg', '', '1', '7e104b2480');
INSERT INTO `gallery` VALUES ('f15ebac923', '021d41cf95_f15ebac923_1497035214.jpg', '', '1', '021d41cf95');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `date` bigint(11) DEFAULT NULL,
  `is_publish` enum('n','y') COLLATE utf8_unicode_ci DEFAULT 'n',
  `picture` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `picture_tmb` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('2d7c29da1c', '\'America is already great\': Barack Obama  urges US to back Clinton in last big speech', '1469466001', 'y', '2d7c29da1c_1496042241.jpg', 'Nelson Njao Munyaka witnessed two \r\ncompanions being shot dead by \r\nBritish soldiers; he carried their corpses \r\nto a white settler’s farm in Kenya’s Rift Valley. \r\nBoth victims had taken the Mau Mau oath \r\nand been trying to escape.', '2d7c29da1c_tmb1496042241.jpg');
INSERT INTO `news` VALUES ('393b063b81', 'Library in UK', '1494867601', 'y', '393b063b81_1496041726.jpg', 'Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, antd Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and', '393b063b81_tmb1496041749.jpg');
INSERT INTO `news` VALUES ('57ef8d0bf5', 'DSSDD', '1495472401', 'y', '57ef8d0bf5_1496124006.jpg', 'Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, antd Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and', '57ef8d0bf5_tmb1496124006.jpg');
INSERT INTO `news` VALUES ('5ba3feb499', 'Library in UK', '1495386001', 'y', '5ba3feb499_1496042175.jpg', 'Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, antd Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and', '5ba3feb499_tmb1496042175.jpg');
INSERT INTO `news` VALUES ('620f838a78', 'Library in UK', '1494867601', 'y', '620f838a78_1496123975.jpg', 'Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, antd Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and', '620f838a78_tmb1496123975.jpg');
INSERT INTO `news` VALUES ('68675e74c5', 'Library in UK', '1495990801', 'y', '68675e74c5_1496041830.jpg', 'Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, antd Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and', '68675e74c5_tmb1496041817.jpg');
INSERT INTO `news` VALUES ('698de2ba32', 'Library in UK', '1493830801', 'y', '698de2ba32_1496042202.jpg', 'Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, antd Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and', '698de2ba32_tmb1496042202.jpg');
INSERT INTO `news` VALUES ('a3543779e0', 'Steep court fee rises  are tax on justice, say MPs', '1468342801', 'y', 'a3543779e0_1496042268.jpg', 'Nelson Njao Munyaka witnessed two \r\ncompanions being shot dead by \r\nBritish soldiers; he carried their corpses \r\nto a white settler’s farm in Kenya’s Rift Valley. \r\nBoth victims had taken the Mau Mau oath \r\nand been trying to escape.', 'a3543779e0_tmb1496042268.jpg');
INSERT INTO `news` VALUES ('b9176e0dd6', 'Library in UK', '1469638801', 'y', 'b9176e0dd6_1496042227.jpg', 'Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, antd Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and', 'b9176e0dd6_tmb1496042227.jpg');
INSERT INTO `news` VALUES ('f9962e27d2', 'Library in UK', '1490979601', 'y', 'f9962e27d2_1496042216.jpg', 'Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, antd Apparently we had reacheda great height in the atmosphere, for the sky was a dead black, and', 'f9962e27d2_tmb1496042216.jpg');

-- ----------------------------
-- Table structure for `our_team`
-- ----------------------------
DROP TABLE IF EXISTS `our_team`;
CREATE TABLE `our_team` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci,
  `name` text COLLATE utf8_unicode_ci,
  `position` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) DEFAULT '999',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of our_team
-- ----------------------------
INSERT INTO `our_team` VALUES ('2e2cf4876a', '2e2cf4876a_1496122895.jpg', 'Nana', 'Co-Fouder', '3');
INSERT INTO `our_team` VALUES ('34a44e914f', '34a44e914f_1496122896.jpg', 'Nana', 'Co-Fouder', '5');
INSERT INTO `our_team` VALUES ('43d090c3da', '43d090c3da_1496122895.jpg', 'Nana', 'Co-Fouder', '2');
INSERT INTO `our_team` VALUES ('91148b05eb', '91148b05eb_1496215236.jpg', 'SS', 'DDD', '4');
INSERT INTO `our_team` VALUES ('d39a00c92d', 'd39a00c92d_1496122895.jpg', 'Nana', 'Co-Fouder', '1');

-- ----------------------------
-- Table structure for `school_abroad`
-- ----------------------------
DROP TABLE IF EXISTS `school_abroad`;
CREATE TABLE `school_abroad` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `why` text COLLATE utf8_unicode_ci,
  `location` text COLLATE utf8_unicode_ci,
  `subject` text COLLATE utf8_unicode_ci,
  `country_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rank` enum('มหาวิทยาลัย','มัธยมศึกษา','ประถมศึกษา') COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of school_abroad
-- ----------------------------
INSERT INTO `school_abroad` VALUES ('332aa9f7a5', 'Liverpool', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '3697e8bc28', 'ประถมศึกษา', '1496155261');
INSERT INTO `school_abroad` VALUES ('a6d35003f7', 'University of Lincoln', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '3697e8bc28', 'มหาวิทยาลัย', '1493649481');
INSERT INTO `school_abroad` VALUES ('aa4d5c7194', 'Manchester', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '3697e8bc28', 'มัธยมศึกษา', '1496155201');

-- ----------------------------
-- Table structure for `school_abroad_img`
-- ----------------------------
DROP TABLE IF EXISTS `school_abroad_img`;
CREATE TABLE `school_abroad_img` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci,
  `school_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT '999',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of school_abroad_img
-- ----------------------------
INSERT INTO `school_abroad_img` VALUES ('015fbde4f4', '332aa9f7a5_015fbde4f4_1496241705.jpg', '332aa9f7a5', '2');
INSERT INTO `school_abroad_img` VALUES ('0f7c48c672', 'aa4d5c7194_0f7c48c672_1496241645.jpg', 'aa4d5c7194', '3');
INSERT INTO `school_abroad_img` VALUES ('1583b80188', 'aa4d5c7194_1583b80188_1496241645.jpg', 'aa4d5c7194', '2');
INSERT INTO `school_abroad_img` VALUES ('40b71a70e0', '332aa9f7a5_40b71a70e0_1496241705.jpg', '332aa9f7a5', '3');
INSERT INTO `school_abroad_img` VALUES ('613e8cd29e', 'a6d35003f7_613e8cd29e_1496241592.jpg', 'a6d35003f7', '3');
INSERT INTO `school_abroad_img` VALUES ('734a3db56a', 'a6d35003f7_734a3db56a_1496241592.jpg', 'a6d35003f7', '1');
INSERT INTO `school_abroad_img` VALUES ('acf509f1a6', '332aa9f7a5_acf509f1a6_1496241705.jpg', '332aa9f7a5', '1');
INSERT INTO `school_abroad_img` VALUES ('b1f801ba00', 'a6d35003f7_b1f801ba00_1496241592.jpg', 'a6d35003f7', '4');
INSERT INTO `school_abroad_img` VALUES ('b2cb139df5', 'a6d35003f7_b2cb139df5_1496241592.jpg', 'a6d35003f7', '2');
INSERT INTO `school_abroad_img` VALUES ('d4a64970d5', 'aa4d5c7194_d4a64970d5_1496241645.jpg', 'aa4d5c7194', '1');

-- ----------------------------
-- Table structure for `school_abroad_lang`
-- ----------------------------
DROP TABLE IF EXISTS `school_abroad_lang`;
CREATE TABLE `school_abroad_lang` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `why` text COLLATE utf8_unicode_ci,
  `location` text COLLATE utf8_unicode_ci,
  `subject` text COLLATE utf8_unicode_ci,
  `country_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rank` enum('โรงเรียน','สถาบันภาษา','มหาวิทยาลัย') COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of school_abroad_lang
-- ----------------------------
INSERT INTO `school_abroad_lang` VALUES ('6e22390a05', 'Liverpool', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '46e237cdd1', 'โรงเรียน', '1493737141');
INSERT INTO `school_abroad_lang` VALUES ('d2d0ac726a', 'Manchester', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '46e237cdd1', 'สถาบันภาษา', '1496242801');
INSERT INTO `school_abroad_lang` VALUES ('db226a162f', 'University of Lincoln', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\n', '3697e8bc28', 'มหาวิทยาลัย', '1496156461');

-- ----------------------------
-- Table structure for `school_abroad_lang_img`
-- ----------------------------
DROP TABLE IF EXISTS `school_abroad_lang_img`;
CREATE TABLE `school_abroad_lang_img` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci,
  `school_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT '999',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of school_abroad_lang_img
-- ----------------------------
INSERT INTO `school_abroad_lang_img` VALUES ('017e2530e2', 'db226a162f_017e2530e2_1496242905.jpg', 'db226a162f', '2');
INSERT INTO `school_abroad_lang_img` VALUES ('0c15b955c6', 'd2d0ac726a_0c15b955c6_1496242866.jpg', 'd2d0ac726a', '3');
INSERT INTO `school_abroad_lang_img` VALUES ('4be0d6861d', 'db226a162f_4be0d6861d_1496242905.jpg', 'db226a162f', '3');
INSERT INTO `school_abroad_lang_img` VALUES ('92f01e0282', 'd2d0ac726a_92f01e0282_1496242866.jpg', 'd2d0ac726a', '1');
INSERT INTO `school_abroad_lang_img` VALUES ('9cba3ea646', 'db226a162f_9cba3ea646_1496242905.jpg', 'db226a162f', '1');
INSERT INTO `school_abroad_lang_img` VALUES ('9db50e2724', 'd2d0ac726a_9db50e2724_1496242866.jpg', 'd2d0ac726a', '2');
INSERT INTO `school_abroad_lang_img` VALUES ('c37c730453', '6e22390a05_c37c730453_1496242841.jpg', '6e22390a05', '2');
INSERT INTO `school_abroad_lang_img` VALUES ('ed742bf47f', '6e22390a05_ed742bf47f_1496242841.jpg', '6e22390a05', '1');
INSERT INTO `school_abroad_lang_img` VALUES ('f8f1f76de1', '6e22390a05_f8f1f76de1_1496242841.jpg', '6e22390a05', '3');

-- ----------------------------
-- Table structure for `school_abroad_lang_req`
-- ----------------------------
DROP TABLE IF EXISTS `school_abroad_lang_req`;
CREATE TABLE `school_abroad_lang_req` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `des` text COLLATE utf8_unicode_ci,
  `school_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT '999',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of school_abroad_lang_req
-- ----------------------------
INSERT INTO `school_abroad_lang_req` VALUES ('27', 'IELTS', '6e22390a05', '1');
INSERT INTO `school_abroad_lang_req` VALUES ('28', 'GPA 2.5 ขึ้นไป', '6e22390a05', '2');

-- ----------------------------
-- Table structure for `school_abroad_req`
-- ----------------------------
DROP TABLE IF EXISTS `school_abroad_req`;
CREATE TABLE `school_abroad_req` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `des` text COLLATE utf8_unicode_ci,
  `school_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT '999',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of school_abroad_req
-- ----------------------------
INSERT INTO `school_abroad_req` VALUES ('21', 'IELTS', 'a6d35003f7', '1');
INSERT INTO `school_abroad_req` VALUES ('22', 'GPA 2.5 ขึ้นไป', 'a6d35003f7', '2');
INSERT INTO `school_abroad_req` VALUES ('23', 'IELTS', 'aa4d5c7194', '1');
INSERT INTO `school_abroad_req` VALUES ('24', 'GPA 2.5 ขึ้นไป', 'aa4d5c7194', '2');
INSERT INTO `school_abroad_req` VALUES ('25', 'IELTS', '332aa9f7a5', '1');
INSERT INTO `school_abroad_req` VALUES ('26', 'GPA 2.5 ขึ้นไป', '332aa9f7a5', '2');

-- ----------------------------
-- Table structure for `summer_camp`
-- ----------------------------
DROP TABLE IF EXISTS `summer_camp`;
CREATE TABLE `summer_camp` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `cost` text COLLATE utf8_unicode_ci,
  `food` text COLLATE utf8_unicode_ci,
  `rest` text COLLATE utf8_unicode_ci,
  `school` text COLLATE utf8_unicode_ci,
  `subject` text COLLATE utf8_unicode_ci,
  `leader` text COLLATE utf8_unicode_ci,
  `main_picture` text COLLATE utf8_unicode_ci,
  `file` text COLLATE utf8_unicode_ci,
  `date` bigint(11) DEFAULT NULL,
  `interest` text COLLATE utf8_unicode_ci,
  `type` enum('Other','USA','New Zealand','Australia','UK','Singapore') COLLATE utf8_unicode_ci DEFAULT 'Singapore',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of summer_camp
-- ----------------------------
INSERT INTO `summer_camp` VALUES ('14b5eb6673', 'ASD', null, null, 'sadasd', 'dasdasd', 'dsadas', 'dasdasd', '14b5eb6673_main_1497097235.jpg', null, '1496492341', null, 'Singapore');
INSERT INTO `summer_camp` VALUES ('4697a3965c', 'Summer Oakland, New Zealand', null, null, 'น้องๆ จะได้เข้าพักร่วมกับครอบครัวท้องถิ่นชาวนิวซีแลนด์ (Host Family) ที่ได้รับการคัดสรรและตรวจสอบเป็นอย่างดีจากทางโรงเรียน โดยจะเข้า พัก 2 คนต่อ 1 ครอบครัว สำหรับการเดินทาง น้องๆ จะเดินทางไปโรงเรียนโดยการเดิน หรือนั่งรถโดยสารประจำทาง โดยใช้เวลาไม่เกิน 30 นาที ซึ่งทาง First Honor ได้รวมค่าเดินทางไว้ให้น้องๆ เป็นที่เรียบร้อยแล้ว', 'NZLC, Auckland ก่อตั้งเมื่อปี 1984 โดยสถาบันสอนภาษาแห่งนี้ ได้รับการรับรองคุณภาพการ ศึกษาจาก English New Zealand, New Zealand Qualifications Authority (NZQA) และทาง สถาบันได้ปฏิบัติตามหลักเกณฑ์การปฏิบัติเพื่อการดูแลความปลอดภัย และสวัสดิภาพของนักเรียน นานาชาติเป็นอย่างดี (The Code of Practice for the Pastoral Care of International Students) สถาบันตั้งอยู่ใกล้กับ Americas Cup Village, The SkyTower และแหล่งช้อปปิ้ง ซึ่งใช้เวลาเดินทาง เพียง 3-5 นาที อีกทั้งยังสามารถชมวิวท่าเรือ Waitemata ได้อีกด้วย โดยสถาบันแห่งนี้ได้รับความ นิยมจากนักเรียนชาติต่างๆทั้วโลก และเม', 'หลักสูตรการเรียนการสอนที่เหมาะสำหรับนักเรียนที่มีอายุตั้งแต่ 10 ปีขึ้นไป โดยน้องๆ ทุกคนจะทำการทดสอบวัดระดับในวันแรกของการเรียน และน้องๆจะได้ร่วมเรียนกับนักเรียน ชาวต่างชาติ ตามอายุ และตามระดับภาษาอังกฤษของน้องๆ เป็นเวลากว่า 4 สัปดาห์ โดย หลักสูตรการเรียนจะเน้นไปที่การพัฒนาทักษะการส', 'คุณครู', '4697a3965c_main_1496325709.jpg', '4697a3965c_file_1496325541.pdf', '1496411581', null, 'UK');
INSERT INTO `summer_camp` VALUES ('c3794a97c5', 'DSD', null, null, '', '', '', '', null, null, '1496434381', null, 'UK');

-- ----------------------------
-- Table structure for `summer_download`
-- ----------------------------
DROP TABLE IF EXISTS `summer_download`;
CREATE TABLE `summer_download` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) DEFAULT NULL,
  `summer_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `download_name` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of summer_download
-- ----------------------------
INSERT INTO `summer_download` VALUES ('2cc2a33798', '14b5eb6673_2cc2a33798_1497097235.pdf', '2', '14b5eb6673', 'DDDSS');
INSERT INTO `summer_download` VALUES ('c1e39a19c2', '14b5eb6673_c1e39a19c2_1497097235.pdf', '1', '14b5eb6673', 'ASS');

-- ----------------------------
-- Table structure for `summer_hiligh`
-- ----------------------------
DROP TABLE IF EXISTS `summer_hiligh`;
CREATE TABLE `summer_hiligh` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `sort_order` int(11) DEFAULT NULL,
  `des` text COLLATE utf8_unicode_ci,
  `summer_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of summer_hiligh
-- ----------------------------
INSERT INTO `summer_hiligh` VALUES ('38', '1', 'โรงเรียนสอนภาษาคุณภาพชั้นนำของประเทศนิวซีแลนด์ ซึ่งมีความเชี่ยวชาญในด้านการสอนภาษาอังกฤษสำหรับเด็กและเยาวชน', '4697a3965c');
INSERT INTO `summer_hiligh` VALUES ('39', '2', ' โปรแกรมซัมเมอร์คอร์สแบบจัดเต็ม ซึ่งมาพร้อมกับกิจกรรมสันทนาการช่วงบ่ายที่น่าสนใจครบทุกวัน อีกทั้งยังมีโปรแกรมทัศนศึกษาใน สถานที่ต่างๆที่อยู่ในบริเวณ Residential Area ที่สามารถเดินทางได้สะดวก และมีความปลอดภัยสูง', '4697a3965c');
INSERT INTO `summer_hiligh` VALUES ('40', '3', 'ทัศนศึกษาสุดสัปดาห์ เต็มวันถึง 6 วัน อาทิ Sheep World, สวนสนุก, Rainbows End, Snow Planet เป็นต้น', '4697a3965c');
INSERT INTO `summer_hiligh` VALUES ('41', '4', 'สุดพิเศษ!! รวมทริป 2 วัน 1 คืน ค้างคืนที่เมืองมาตามาต้า-โรโตรัว รวมอาหารครบทุกมื้อ', '4697a3965c');
INSERT INTO `summer_hiligh` VALUES ('42', '5', 'พิเศษ!! รวมค่าเดินทางและซิมการ์ดโทรศัพท์พร้อมค่าโทร', '4697a3965c');
INSERT INTO `summer_hiligh` VALUES ('43', '6', 'ทีมงาน Group Leader ของ First Honor ที่มีประสบการณ์เป็นผู้นำกลุ่ม ไปดูแลน้องๆอย่างใกล้ชิดด้วยตัวเองตลอดทริปอีกด้วย', '4697a3965c');

-- ----------------------------
-- Table structure for `summer_in_cost`
-- ----------------------------
DROP TABLE IF EXISTS `summer_in_cost`;
CREATE TABLE `summer_in_cost` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `sort_order` int(11) DEFAULT NULL,
  `des` text COLLATE utf8_unicode_ci,
  `summer_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of summer_in_cost
-- ----------------------------
INSERT INTO `summer_in_cost` VALUES ('118', '1', 'ค่าเรียนภาษาอังกฤษ', '4697a3965c');
INSERT INTO `summer_in_cost` VALUES ('119', '2', 'ค่าทัศนศึกษา ค่าเข้าชมสถานที่ท่องเที่ยวต่างๆตามโปรแกรม', '4697a3965c');
INSERT INTO `summer_in_cost` VALUES ('120', '3', 'ค่ารถรับส่งสนามบินและค่าเดินทางทั้งหมดตามโปรแกรม', '4697a3965c');
INSERT INTO `summer_in_cost` VALUES ('121', '4', 'ค่าอาหาร 3 มื้อและค่าเดินทางจากบ้านไปโรงเรียน (กรณีต้องใช้รถเมลล์)', '4697a3965c');
INSERT INTO `summer_in_cost` VALUES ('122', '5', 'กรมธรรม์ประกันการเดินทาง วงเงินค่ารักษาพยาบาล 2,000,000 บาท', '4697a3965c');
INSERT INTO `summer_in_cost` VALUES ('123', '6', 'ค่าที่พักกับครอบครัว (Home stay) นักเรียน 2 คน ต่อ 1 ครอบครัว และค่าซักเสื้อผ้า', '4697a3965c');
INSERT INTO `summer_in_cost` VALUES ('124', '7', 'การปฐมนิเทศเพ', '4697a3965c');
INSERT INTO `summer_in_cost` VALUES ('125', '8', 'ทีมงาน Group Leader ของ First Honor ที่มีประสบการณ์เป็นผู้นำกลุ่มไปดูแลน้องๆอย่างใกล้ชิดด้วยตัวเองตลอดโครงการ', '4697a3965c');
INSERT INTO `summer_in_cost` VALUES ('126', '9', 'ค่าตั๋วเครืองบิน ไป-กลับ ชั้นประหยัด', '4697a3965c');
INSERT INTO `summer_in_cost` VALUES ('127', '10', 'ค่าดำเนินการและค่าวีซ่าเข้านิวซีแลนด์', '4697a3965c');
INSERT INTO `summer_in_cost` VALUES ('128', '11', 'ค่าภาษีสนามบิน', '4697a3965c');
INSERT INTO `summer_in_cost` VALUES ('129', '12', 'ซิมการ์ดโทรศัพท์พร้อมค่าโทร', '4697a3965c');
INSERT INTO `summer_in_cost` VALUES ('133', '1', 'ddd', '14b5eb6673');
INSERT INTO `summer_in_cost` VALUES ('134', '2', 'sss', '14b5eb6673');
INSERT INTO `summer_in_cost` VALUES ('135', '3', 'aaa', '14b5eb6673');

-- ----------------------------
-- Table structure for `summer_out_cost`
-- ----------------------------
DROP TABLE IF EXISTS `summer_out_cost`;
CREATE TABLE `summer_out_cost` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `sort_order` int(11) DEFAULT NULL,
  `des` text COLLATE utf8_unicode_ci,
  `summer_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of summer_out_cost
-- ----------------------------
INSERT INTO `summer_out_cost` VALUES ('46', '1', 'ค่าใช้จ่ายส่วนตัว (100 เหรียญนิวซีแลนด์ต่อสัปดาห์)', '4697a3965c');
INSERT INTO `summer_out_cost` VALUES ('47', '2', 'ค่าใช้จ่ายอื่นๆ เช่น ค่านํ้าหนักกระเป๋าเกิน, ค่าทำพาสปอร์ต, ค่าเติมเงินโทรศัพท์ และอื่นๆ (ถ้ามี)', '4697a3965c');

-- ----------------------------
-- Table structure for `summer_rest_img`
-- ----------------------------
DROP TABLE IF EXISTS `summer_rest_img`;
CREATE TABLE `summer_rest_img` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) DEFAULT NULL,
  `summer_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of summer_rest_img
-- ----------------------------
INSERT INTO `summer_rest_img` VALUES ('16bb0932e7', '4697a3965c_16bb0932e7_1496325542.jpg', '1', '4697a3965c');
INSERT INTO `summer_rest_img` VALUES ('1faaa376f4', '14b5eb6673_1faaa376f4_1497097235.jpg', '3', '14b5eb6673');
INSERT INTO `summer_rest_img` VALUES ('26d004683d', '4697a3965c_26d004683d_1496325543.jpg', '6', '4697a3965c');
INSERT INTO `summer_rest_img` VALUES ('4da4637d6c', '4697a3965c_4da4637d6c_1496325543.jpg', '3', '4697a3965c');
INSERT INTO `summer_rest_img` VALUES ('6e8a440e33', '14b5eb6673_6e8a440e33_1497097235.jpg', '4', '14b5eb6673');
INSERT INTO `summer_rest_img` VALUES ('7d57bf41d2', '4697a3965c_7d57bf41d2_1496325542.jpg', '2', '4697a3965c');
INSERT INTO `summer_rest_img` VALUES ('87fdea3867', '14b5eb6673_87fdea3867_1497097235.jpg', '1', '14b5eb6673');
INSERT INTO `summer_rest_img` VALUES ('8abaaf49b4', '4697a3965c_8abaaf49b4_1496325543.jpg', '5', '4697a3965c');
INSERT INTO `summer_rest_img` VALUES ('b8b95dad21', '14b5eb6673_b8b95dad21_1497097235.jpg', '2', '14b5eb6673');
INSERT INTO `summer_rest_img` VALUES ('c16f096d41', '4697a3965c_c16f096d41_1496325543.jpg', '4', '4697a3965c');

-- ----------------------------
-- Table structure for `summer_school_img`
-- ----------------------------
DROP TABLE IF EXISTS `summer_school_img`;
CREATE TABLE `summer_school_img` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) DEFAULT NULL,
  `summer_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of summer_school_img
-- ----------------------------
INSERT INTO `summer_school_img` VALUES ('458f190b34', '4697a3965c_458f190b34_1496325543.jpg', '2', '4697a3965c');
INSERT INTO `summer_school_img` VALUES ('5703c27653', '14b5eb6673_5703c27653_1497097235.jpg', '1', '14b5eb6673');
INSERT INTO `summer_school_img` VALUES ('63954ed47f', '4697a3965c_63954ed47f_1496325543.jpg', '5', '4697a3965c');
INSERT INTO `summer_school_img` VALUES ('701b03bc84', '4697a3965c_701b03bc84_1496325543.jpg', '1', '4697a3965c');
INSERT INTO `summer_school_img` VALUES ('ac9bc71724', '4697a3965c_ac9bc71724_1496325543.jpg', '4', '4697a3965c');
INSERT INTO `summer_school_img` VALUES ('b538b3b90b', '14b5eb6673_b538b3b90b_1497097235.jpg', '2', '14b5eb6673');
INSERT INTO `summer_school_img` VALUES ('d2da714fda', '4697a3965c_d2da714fda_1496325543.jpg', '3', '4697a3965c');

-- ----------------------------
-- Table structure for `testimonial`
-- ----------------------------
DROP TABLE IF EXISTS `testimonial`;
CREATE TABLE `testimonial` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci,
  `name` text COLLATE utf8_unicode_ci,
  `position` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) DEFAULT '999',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of testimonial
-- ----------------------------
INSERT INTO `testimonial` VALUES ('149f160827', '149f160827_1496216259.jpg', 'Nana', 'They were always helpful when I needed some assistance and were very informative. I didn\'t have any issues with them during my summer in America. The team were friendly from start to finish. It was nice that they came to visit me at the camp too!', '5');
INSERT INTO `testimonial` VALUES ('1e2cfd62c0', '1e2cfd62c0_1496335175.jpg', 'Nana', 'They were always helpful when I needed some assistance and were very informative. I didn\'t have any issues with them during my summer in America. The team were friendly from start to finish. It was nice that they came to visit me at the camp too!', '7');
INSERT INTO `testimonial` VALUES ('2a3c20a1f5', '2a3c20a1f5_1496216259.jpg', 'Nana', 'They were always helpful when I needed some assistance and were very informative. I didn\'t have any issues with them during my summer in America. The team were friendly from start to finish. It was nice that they came to visit me at the camp too!', '6');
INSERT INTO `testimonial` VALUES ('357682f555', '357682f555_1496215280.jpg', 'Nana', 'They were always helpful when I needed some assistance and were very informative. I didn\'t have any issues with them during my summer in America. The team were friendly from start to finish. It was nice that they came to visit me at the camp too!', '1');
INSERT INTO `testimonial` VALUES ('bb1d4d3be4', 'bb1d4d3be4_1496215281.jpg', 'Nana', 'They were always helpful when I needed some assistance and were very informative. I didn\'t have any issues with them during my summer in America. The team were friendly from start to finish. It was nice that they came to visit me at the camp too!', '3');
INSERT INTO `testimonial` VALUES ('cc2bdeaf9c', 'cc2bdeaf9c_1496216259.jpg', 'Nana', 'They were always helpful when I needed some assistance and were very informative. I didn\'t have any issues with them during my summer in America. The team were friendly from start to finish. It was nice that they came to visit me at the camp too!', '4');
INSERT INTO `testimonial` VALUES ('d377d18c87', 'd377d18c87_1496215281.jpg', 'Nana', 'They were always helpful when I needed some assistance and were very informative. I didn\'t have any issues with them during my summer in America. The team were friendly from start to finish. It was nice that they came to visit me at the camp too!', '2');

-- ----------------------------
-- Table structure for `tour`
-- ----------------------------
DROP TABLE IF EXISTS `tour`;
CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tour
-- ----------------------------
INSERT INTO `tour` VALUES ('1', 'Just some 137 kilometres from the Equator, the multi-cultural Republic of Singapore is an international, ultra modern city-state and island lying just off the southern tip of the Malay Peninsula. Since its split from Malaya almost 60 years ago, Singapore’s dramatic rise from a port to one of the world’s leading international economies is a phenomenon. The Village Camps ‘Discover Singapore’ programme will introduce our youngsters into the sights, sounds and stunning facilities of Singapore, illustrating why the city is rated one of the best places in the world to live and visit.ddddddddd');

-- ----------------------------
-- Table structure for `tour_img`
-- ----------------------------
DROP TABLE IF EXISTS `tour_img`;
CREATE TABLE `tour_img` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `picture` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tour_img
-- ----------------------------
INSERT INTO `tour_img` VALUES ('7baf277fd9', '1', 'img_7baf277fd9_1496308252.jpg');
INSERT INTO `tour_img` VALUES ('8ad7b473d0', '2', 'img_8ad7b473d0_1496308252.jpg');
INSERT INTO `tour_img` VALUES ('a21c946b77', '4', 'img_a21c946b77_1496308388.jpg');
INSERT INTO `tour_img` VALUES ('bce03c1b21', '3', 'img_bce03c1b21_1496308388.jpg');

-- ----------------------------
-- Table structure for `tour_partner`
-- ----------------------------
DROP TABLE IF EXISTS `tour_partner`;
CREATE TABLE `tour_partner` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `picture` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tour_partner
-- ----------------------------
INSERT INTO `tour_partner` VALUES ('1b031e8420', '5', 'part_1b031e8420_1496308686.png');
INSERT INTO `tour_partner` VALUES ('4a927c70f3', '4', 'part_4a927c70f3_1496308388.png');
INSERT INTO `tour_partner` VALUES ('8056d88db7', '1', 'part_8056d88db7_1496308388.png');
INSERT INTO `tour_partner` VALUES ('c0d2837d7f', '3', 'part_c0d2837d7f_1496308388.png');
INSERT INTO `tour_partner` VALUES ('f25a566966', '2', 'part_f25a566966_1496308388.png');
