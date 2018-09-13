/*
MySQL Data Transfer
Source Host: localhost
Source Database: ewsd
Target Host: localhost
Target Database: ewsd
Date: 3/20/2018 9:26:07 PM
*/

SET FOREIGN_KEY_CHECKS=0;


-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  `start_date` varchar(20) DEFAULT NULL,
  `closure_date` varchar(20) DEFAULT NULL,
  `final_closure_date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `std_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `session` int(10) DEFAULT NULL,
  `account_status` varchar(20) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`std_id`),
  KEY `F2` (`department_id`),
  CONSTRAINT `F1` FOREIGN KEY (`std_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `F2` FOREIGN KEY (`department_id`) REFERENCES `department` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `s_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `joinning_date` varchar(20) DEFAULT NULL,
  `post` varchar(20) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`s_id`),
  KEY `F4` (`department_id`),
  CONSTRAINT `F3` FOREIGN KEY (`s_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `F4` FOREIGN KEY (`department_id`) REFERENCES `department` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for idea
-- ----------------------------
DROP TABLE IF EXISTS `idea`;
CREATE TABLE `idea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `idea_title` varchar(200) DEFAULT NULL,
  `idea_body` varchar(2000) DEFAULT NULL,
  `idea_author_id` int(11) DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `author_type` varchar(20) DEFAULT NULL,
  `attachment` varchar(50) DEFAULT NULL,
  `idea_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `F6` (`category_id`),
  KEY `F7` (`idea_author_id`),
  KEY `D2` (`department`),
  CONSTRAINT `F6` FOREIGN KEY (`category_id`) REFERENCES `category` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `F7` FOREIGN KEY (`idea_author_id`) REFERENCES `student` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `idea_id` int(11) DEFAULT NULL,
  `comment_body` varchar(500) DEFAULT NULL,
  `comment_author_id` int(11) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `comment_status` int(2) unsigned zerofill DEFAULT NULL,
  `anonymous` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `F10` (`idea_id`),
  KEY `F11` (`comment_author_id`),
  CONSTRAINT `F10` FOREIGN KEY (`idea_id`) REFERENCES `idea` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `F11` FOREIGN KEY (`comment_author_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;



-- ----------------------------
-- Table structure for favourite
-- ----------------------------
DROP TABLE IF EXISTS `favourite`;
CREATE TABLE `favourite` (
  `idea_id` int(11) NOT NULL,
  `idea_lover_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idea_id`),
  KEY `F15` (`idea_lover_id`),
  CONSTRAINT `F14` FOREIGN KEY (`idea_id`) REFERENCES `idea` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `F15` FOREIGN KEY (`idea_lover_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- ----------------------------
-- Table structure for likes
-- ----------------------------
DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `like` int(10) DEFAULT '0',
  `unlike` int(10) DEFAULT '0',
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `F8` (`pid`),
  KEY `F9` (`uid`),
  CONSTRAINT `F8` FOREIGN KEY (`pid`) REFERENCES `idea` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `F9` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`m_id`),
  KEY `MF1` (`sender_id`),
  KEY `MF2` (`receiver_id`),
  CONSTRAINT `MF1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `MF2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for reply
-- ----------------------------
DROP TABLE IF EXISTS `reply`;
CREATE TABLE `reply` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) DEFAULT NULL,
  `r_author_id` int(11) DEFAULT NULL,
  `reply_body` varchar(500) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`r_id`),
  KEY `F12` (`comment_id`),
  KEY `F13` (`r_author_id`),
  CONSTRAINT `F12` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `F13` FOREIGN KEY (`r_author_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- ----------------------------
-- Table structure for view
-- ----------------------------
DROP TABLE IF EXISTS `view`;
CREATE TABLE `view` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `idea_id` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`v_id`),
  KEY `VF1` (`idea_id`),
  KEY `VF2` (`u_id`),
  CONSTRAINT `VF1` FOREIGN KEY (`idea_id`) REFERENCES `idea` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `VF2` FOREIGN KEY (`u_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `department` VALUES ('0', 'Super');
INSERT INTO `department` VALUES ('1', 'IT');
INSERT INTO `department` VALUES ('2', 'CSE');
INSERT INTO `department` VALUES ('3', 'BBA');
INSERT INTO `department` VALUES ('4', 'CIS');
INSERT INTO `category` VALUES ('15', 'ICT Carnival', '2018/19/03', '2018-03-30', '2018-04-20');
INSERT INTO `category` VALUES ('16', 'New Category', '2018/19/03', '2018-04-19', '2018-04-30');
INSERT INTO `users` VALUES ('1', 'Foysal', 'Ahammad', 'STD', 'foysal35@diit.info', '123', 'Activate');
INSERT INTO `users` VALUES ('2', 'Nazrana', 'Haque', 'STAFF', 'qac@ib.com', '123', 'Activate');
INSERT INTO `users` VALUES ('3', 'Sajid', 'Rayhan', 'STD', 'sajid35@diit.info', '123', 'Activate');
INSERT INTO `users` VALUES ('4', 'Mahmudur', 'Rahman', 'STD', 'samir35@diit.info', '123', 'Activate');
INSERT INTO `users` VALUES ('5', 'Muntasir', 'Hasan', 'STD', 'siam35@diit.info', '123', 'Activate');
INSERT INTO `users` VALUES ('6', 'Najiul', 'Tanvir', 'STD', 'tanvir@gmail.com', '123', 'Activate');
INSERT INTO `users` VALUES ('7', 'Sarowar', 'Hossain', 'STAFF', 'qac.cis@ib.com', '123', 'Active');
INSERT INTO `staff` VALUES ('2', '1', '2018-5-1', 'QAC', 'dist/img/avatar3.png');
INSERT INTO `staff` VALUES ('7', '0', '2018-4-1', 'QAC', 'dist/img/avatar5.png');
INSERT INTO `student` VALUES ('1', '1', '2018', 'Active', 'dist/img/user1-128x128.jpg');
INSERT INTO `student` VALUES ('3', '4', '2018', 'Active', 'dist/img/user8-128x128.jpg');
INSERT INTO `student` VALUES ('4', '1', '2018', 'Active', 'dist/img/user6-128x128.jpg');
INSERT INTO `student` VALUES ('5', '2', '2018', 'Active', 'dist/img/user2-160x160.jpg');
INSERT INTO `student` VALUES ('6', '3', '2018', 'Active', 'dist/img/user8-128x128.jpg');
INSERT INTO `idea` VALUES ('154', '15', 'jg', 'jg', '3', 'CIS', '2018-03-19', '03:23:09 pm', '', 'zip_file/1521451389.zip', 'Active');
INSERT INTO `idea` VALUES ('155', '15', 'New Idea', 'testing', '3', 'CIS', '2018-03-20', '02:28:34 am', '', 'zip_file/1521491314.zip', 'Active');
INSERT INTO `idea` VALUES ('156', '16', 'New Idea', 'fdfgd', '1', 'IT', '2018-03-20', '11:39:37 am', '', '', 'Active');
INSERT INTO `comment` VALUES ('6', '154', 'gdfgdfg', '3', '2018-03-20', '02:10:23 am', '01', 'Sajid');
INSERT INTO `comment` VALUES ('24', '154', 'dfgfdgfd', '3', '2018-03-20', '02:26:27 am', '01', 'Anonymous');
INSERT INTO `comment` VALUES ('26', '154', 'test', '3', '2018-03-20', '02:28:02 am', '01', 'Identified');
INSERT INTO `view` VALUES ('102', '154', '3');
INSERT INTO `view` VALUES ('103', '155', '1');
INSERT INTO `view` VALUES ('104', '154', '1');
INSERT INTO `view` VALUES ('105', '156', '1');
