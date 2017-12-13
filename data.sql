/*
Navicat MySQL Data Transfer

Source Server         : FFF
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : data

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-05 15:22:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '123456');

-- ----------------------------
-- Table structure for bank
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bank
-- ----------------------------
INSERT INTO `bank` VALUES ('1', '工商银行', '95588', '广州天河', '王小明', '2');
INSERT INTO `bank` VALUES ('2', '交通银行', '95559', '广州天河', '	何晓芬', '26');
INSERT INTO `bank` VALUES ('5', '农业银行', '95599', '广州越秀', '王小明', '2');
INSERT INTO `bank` VALUES ('6', '广发银行', '95508', '广州海珠', '何晓芬', '26');

-- ----------------------------
-- Table structure for car
-- ----------------------------
DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modal` varchar(255) NOT NULL,
  `car_code` varchar(255) NOT NULL,
  `car_num` int(11) NOT NULL,
  `car_price` decimal(10,0) NOT NULL,
  `create_time` datetime NOT NULL,
  `state` varchar(255) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `regulatory_name` varchar(255) NOT NULL,
  `regulatory_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car
-- ----------------------------
INSERT INTO `car` VALUES ('12', '凯美瑞', 'AB00201001', '20', '19', '2017-12-02 15:45:00', '', '诚立丰田', '2', '', '0', '0', '');
INSERT INTO `car` VALUES ('13', 'ES250', 'AB00201002', '10', '32', '2017-12-02 15:55:00', '', '永佳丰田', '1', '', '0', '0', '');
INSERT INTO `car` VALUES ('16', '汉兰达', 'AB00201003', '3', '26', '2017-12-02 15:55:00', '', '诚立丰田', '2', '', '0', '0', '');
INSERT INTO `car` VALUES ('17', 'E级', 'AB00201004', '50', '50', '2017-12-07 19:55:00', '', '广州中升奔驰店', '3', '', '0', '0', '');
INSERT INTO `car` VALUES ('18', 'C级', 'AB00201005', '10', '32', '2017-12-07 14:50:00', '', '广州中升奔驰店', '3', '', '0', '0', '');
INSERT INTO `car` VALUES ('20', 'RX', 'AB00201006', '20', '45', '2017-12-07 19:55:00', '', '永佳丰田', '1', '', '0', '0', '');
INSERT INTO `car` VALUES ('21', 'GLC', 'AB00201011', '10', '50', '2017-12-13 19:55:00', '', '广州中升奔驰店', '3', '哈哈第三方监管有限公司', '2', '5', '农业银行');
INSERT INTO `car` VALUES ('22', 'GLC', 'AB00201011', '10', '50', '2017-12-13 19:55:00', '', '广州中升奔驰店', '3', '哈哈第三方监管有限公司', '2', '5', '农业银行');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_code` varchar(255) NOT NULL,
  `modal` varchar(255) NOT NULL,
  `car_num` int(11) NOT NULL,
  `car_price` decimal(10,0) NOT NULL,
  `car_total` varchar(255) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `regulatory_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `regulatory_name` varchar(255) NOT NULL,
  `send_state` varchar(255) NOT NULL,
  `apply_state` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('4', 'AB00201007', '雷凌', '14', '15', '210', '', '', '2', '2', '5', '2', '诚立丰田', '农业银行', '哈哈第三方监管有限公司', '0', '0');
INSERT INTO `order` VALUES ('5', 'AB00201008', 'S级', '2', '140', '280', '', '', '3', '4', '5', '1', '广州中升奔驰店', '农业银行', '快捷第三方监管有限公司', '3', '5');
INSERT INTO `order` VALUES ('6', 'AB00201009', 'LX', '3', '140', '420', '', '2017-12-05 15:55', '1', '2', '1', '1', '永佳丰田', '工商银行', '哈哈第三方监管有限公司', '0', '0');
INSERT INTO `order` VALUES ('9', 'AB00201011', 'GLC', '10', '50', '500', '50辆GLC', '2017-12-13 19:55', '3', '2', '5', '1', '广州中升奔驰店', '农业银行', '哈哈第三方监管有限公司', '0', '0');

-- ----------------------------
-- Table structure for regulatory
-- ----------------------------
DROP TABLE IF EXISTS `regulatory`;
CREATE TABLE `regulatory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `business_num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of regulatory
-- ----------------------------
INSERT INTO `regulatory` VALUES ('1', '天天第三方监管有限公司', '84812345', '广州增城', '3');
INSERT INTO `regulatory` VALUES ('2', '哈哈第三方监管有限公司', '84812345', '广州番禺', '0');
INSERT INTO `regulatory` VALUES ('4', '快捷第三方监管有限公司', '84812345', '广州白云', '0');

-- ----------------------------
-- Table structure for shop
-- ----------------------------
DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(255) NOT NULL,
  `shop_phone` varchar(255) NOT NULL,
  `shop_address` varchar(255) NOT NULL,
  `charge` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop
-- ----------------------------
INSERT INTO `shop` VALUES ('1', '永佳丰田', '020-84812345', '广州番禺', '小明');
INSERT INTO `shop` VALUES ('2', '诚立丰田', '020-84812345', '广州番禺', '小红');
INSERT INTO `shop` VALUES ('3', '广州中升奔驰店', '020-84812345', '广州增城', '小花');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `login_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '0', 'admin', 'admin', '123456', '13800138000');
INSERT INTO `user` VALUES ('2', '1', 'abc123', '王小明', '123456', '13800138001');
INSERT INTO `user` VALUES ('3', '2', 'abc456', '张小红', '123456', '13800138002');
INSERT INTO `user` VALUES ('19', '2', 'abc789', '张大明', '22', '13800138002');
INSERT INTO `user` VALUES ('26', '1', 'abc147', '何晓芬', '33', '13800138004');
