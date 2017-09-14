/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : latihan_lab

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2016-07-29 20:16:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dt_department
-- ----------------------------
DROP TABLE IF EXISTS `dt_department`;
CREATE TABLE `dt_department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dt_department
-- ----------------------------
INSERT INTO `dt_department` VALUES ('1', 'Room Division');
INSERT INTO `dt_department` VALUES ('2', 'Sales and Marketing');
INSERT INTO `dt_department` VALUES ('3', 'Food and Beverage');
INSERT INTO `dt_department` VALUES ('4', 'Human Resources');
INSERT INTO `dt_department` VALUES ('5', 'Engeenering');
INSERT INTO `dt_department` VALUES ('6', 'Accounting');
INSERT INTO `dt_department` VALUES ('7', 'Kematian Budi Luhur');

-- ----------------------------
-- Table structure for dt_leave
-- ----------------------------
DROP TABLE IF EXISTS `dt_leave`;
CREATE TABLE `dt_leave` (
  `leave_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) DEFAULT NULL,
  `date_request` date DEFAULT NULL,
  `address_while_leave` text,
  `application_type` varchar(255) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `date_backtowork` date DEFAULT NULL,
  `approval_status` int(1) DEFAULT NULL,
  `approval_date` datetime DEFAULT NULL,
  `user_approval_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dt_leave
-- ----------------------------
INSERT INTO `dt_leave` VALUES ('17', '11', '2016-07-29', 'Jl. Susu kuda liar', 'annual_leave', '2016-08-02', '2016-08-05', '3', '2016-08-06', '1', '2016-07-29 09:50:43', '3');

-- ----------------------------
-- Table structure for dt_permit
-- ----------------------------
DROP TABLE IF EXISTS `dt_permit`;
CREATE TABLE `dt_permit` (
  `permit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `date` datetime DEFAULT NULL,
  `reason` text,
  `approval_status` int(1) DEFAULT NULL,
  `time_out` int(3) DEFAULT NULL,
  `duration_allowed` int(3) DEFAULT NULL,
  `user_approval_id` int(3) DEFAULT NULL,
  `approval_date` datetime DEFAULT NULL,
  PRIMARY KEY (`permit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dt_permit
-- ----------------------------
INSERT INTO `dt_permit` VALUES ('16', '11', '2016-07-28 17:12:16', 'Istri Melahirkan', '1', '3', '2', '3', '2016-07-28 18:42:28');

-- ----------------------------
-- Table structure for dt_position
-- ----------------------------
DROP TABLE IF EXISTS `dt_position`;
CREATE TABLE `dt_position` (
  `position_id` int(5) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(255) DEFAULT NULL,
  `department_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dt_position
-- ----------------------------
INSERT INTO `dt_position` VALUES ('1', 'Front Office', '1');
INSERT INTO `dt_position` VALUES ('2', 'Housekeeping', '1');
INSERT INTO `dt_position` VALUES ('4', 'Catering Sales', '2');
INSERT INTO `dt_position` VALUES ('5', 'Group Sales', '2');
INSERT INTO `dt_position` VALUES ('6', 'Restaurant', '3');
INSERT INTO `dt_position` VALUES ('7', 'Lounge and Bar', '3');
INSERT INTO `dt_position` VALUES ('8', 'Room Service', '3');
INSERT INTO `dt_position` VALUES ('9', 'Payroll', '4');
INSERT INTO `dt_position` VALUES ('10', 'Recruitment', '4');
INSERT INTO `dt_position` VALUES ('11', 'Career Development and Training', '4');
INSERT INTO `dt_position` VALUES ('12', 'Maintenance', '5');
INSERT INTO `dt_position` VALUES ('13', 'Groundskeeping', '5');
INSERT INTO `dt_position` VALUES ('14', 'Capital Improvement', '5');
INSERT INTO `dt_position` VALUES ('15', 'Credit', '6');
INSERT INTO `dt_position` VALUES ('16', 'Account Payable', '6');
INSERT INTO `dt_position` VALUES ('18', 'Head Department', '4');
INSERT INTO `dt_position` VALUES ('19', 'Head Department', '1');
INSERT INTO `dt_position` VALUES ('20', 'Head Department', '2');
INSERT INTO `dt_position` VALUES ('21', 'Head Department', '3');

-- ----------------------------
-- Table structure for dt_reschedule
-- ----------------------------
DROP TABLE IF EXISTS `dt_reschedule`;
CREATE TABLE `dt_reschedule` (
  `reschedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_request_id` int(5) NOT NULL,
  `user_change_id` int(5) NOT NULL,
  `sc_from` varchar(10) NOT NULL,
  `sc_to` varchar(10) NOT NULL,
  `user_approval_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `change_status` int(1) DEFAULT NULL,
  `approval_status` int(1) DEFAULT NULL,
  `approval_date` datetime DEFAULT NULL,
  PRIMARY KEY (`reschedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dt_reschedule
-- ----------------------------
INSERT INTO `dt_reschedule` VALUES ('12', '11', '9', 'Middle', 'Middle', '0', '2016-07-08', '1', '0', null);
INSERT INTO `dt_reschedule` VALUES ('13', '9', '10', 'Evening', 'Night', '0', '2016-07-25', '0', '0', null);
INSERT INTO `dt_reschedule` VALUES ('14', '9', '11', 'Middle', 'Evening', '3', '2016-07-25', '1', '1', '2016-07-29 14:26:40');
INSERT INTO `dt_reschedule` VALUES ('16', '11', '10', 'Middle', 'Middle', '0', '2016-07-30', '1', '1', null);

-- ----------------------------
-- Table structure for dt_users
-- ----------------------------
DROP TABLE IF EXISTS `dt_users`;
CREATE TABLE `dt_users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `employee_id` int(30) DEFAULT NULL,
  `fullname` varchar(30) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) DEFAULT NULL,
  `telphone` varchar(16) DEFAULT NULL,
  `address` text,
  `gender` varchar(25) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `position_id` int(5) DEFAULT NULL,
  `access` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dt_users
-- ----------------------------
INSERT INTO `dt_users` VALUES ('2', null, 'Muhammad Firman', 'firman', 'firman1367', '089698963307', 'Pondok Widyatama Indah Blok q nomer 3 - 4', 'male', 'photos/sawamura.png', null, 'admin');
INSERT INTO `dt_users` VALUES ('3', null, 'Adhiyasa', 'adhiyasa', 'adhi123', '087770777850', 'Pondok Widyatama Indah Blok q nomer 3 - 4', 'male', 'photos/sawamura.png', '19', 'head_department');
INSERT INTO `dt_users` VALUES ('4', null, 'BomBom', 'bombom', 'bombom123', '08969896787', 'Grind Line mol', 'male', 'photos/yo.PNG', null, 'director');
INSERT INTO `dt_users` VALUES ('7', null, 'Mugiwara D.Luffy', 'luffy123', 'luffy123', '08969896787', 'Grind Line mol', 'male', 'photos/yo.PNG', null, 'admin');
INSERT INTO `dt_users` VALUES ('9', '1225410532', 'Dewi Verawati', 'dewi', 'dewi', '08969843121', 'LIPPI', 'female', 'photos/Screenshot (22).png', '2', 'employee');
INSERT INTO `dt_users` VALUES ('10', '1225410532', 'Nur Cahya', 'cahya', 'cahya', '08969878903', 'Cibinong', 'female', 'photos/Screenshot (16).png', '2', 'employee');
INSERT INTO `dt_users` VALUES ('11', '90201321', 'Udin Nurohman', 'udin', 'udin', '08969878903', 'Komplek A', 'male', 'photos/2.jpg', '2', 'employee');
INSERT INTO `dt_users` VALUES ('16', '9090000', 'Rudi Hartono', 'rudi', 'sYncm4ster', '+6287870608385', 'Jl. Kuda Liar', 'male', 'photos/illucinati.jpg', '2', 'employee');
INSERT INTO `dt_users` VALUES ('17', '2147483647', 'Moh. Chairul Anwar', 'chair_anwar', 'chair', '+6287870608382', 'Jl. Bambanrung Magelang Raya', 'male', 'photos/illucinati.jpg', '20', 'head_department');
