/*
Navicat MySQL Data Transfer

Source Server         : FFF
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : netsalesystem

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-11-10 19:51:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for company
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO `company` VALUES ('1', '国寿股份', null, null, '1');
INSERT INTO `company` VALUES ('2', '中国人寿', null, null, '1');
INSERT INTO `company` VALUES ('3', '平安人寿', null, null, '1');
INSERT INTO `company` VALUES ('4', '太平洋人寿', null, null, '1');
INSERT INTO `company` VALUES ('5', '生命人寿', null, null, '1');
INSERT INTO `company` VALUES ('6', '人保财险', null, null, '4');
INSERT INTO `company` VALUES ('7', '平安财险', null, null, '4');
INSERT INTO `company` VALUES ('8', '国寿财险', null, null, '4');
INSERT INTO `company` VALUES ('9', '阳光财险', null, null, '4');
INSERT INTO `company` VALUES ('10', '平安车险', null, null, '3');
INSERT INTO `company` VALUES ('11', '人保车险', null, null, '3');
INSERT INTO `company` VALUES ('12', '中华联合', null, null, '3');
INSERT INTO `company` VALUES ('13', '大地车险', null, null, '3');
INSERT INTO `company` VALUES ('14', '永安车险', null, null, '3');

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `number` varchar(11) NOT NULL,
  `region` varchar(255) NOT NULL,
  `kpi` varchar(255) DEFAULT NULL,
  `orders` varchar(255) DEFAULT NULL,
  `sex` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('2', '王大雷', 'KC2017001', '北京', '20', '1,6', '男');

-- ----------------------------
-- Table structure for place
-- ----------------------------
DROP TABLE IF EXISTS `place`;
CREATE TABLE `place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `market` varchar(255) DEFAULT NULL,
  `input` varchar(255) NOT NULL,
  `profit` varchar(255) DEFAULT NULL,
  `orders` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of place
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('admin', '123456', '0');
