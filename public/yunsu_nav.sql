/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : yunsu_nav

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-09-11 10:15:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `nv_project`
-- ----------------------------
DROP TABLE IF EXISTS `nv_project`;
CREATE TABLE `nv_project` (
  `pro_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nv_project
-- ----------------------------
INSERT INTO `nv_project` VALUES ('1', '小镇演义', '33');
INSERT INTO `nv_project` VALUES ('10', '琼中云书宿', '0');
INSERT INTO `nv_project` VALUES ('12', '为而为', '0');
INSERT INTO `nv_project` VALUES ('13', 'sdsd', '0');

-- ----------------------------
-- Table structure for `nv_website`
-- ----------------------------
DROP TABLE IF EXISTS `nv_website`;
CREATE TABLE `nv_website` (
  `web_id` int(5) NOT NULL AUTO_INCREMENT,
  `pro_id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL DEFAULT '1',
  `type` varchar(1) NOT NULL,
  `statuse` int(1) NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`web_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nv_website
-- ----------------------------
INSERT INTO `nv_website` VALUES ('1', '1', '后台33', 'http://www.runoob.com/try/try.php?filename=try_ng_', '1', '1', '564');
INSERT INTO `nv_website` VALUES ('4', '10', '原型图', 'http://www.pmdaniu.com/rp/view?id=WXoCYwtnVmFWYAMzCyMLTw', '1', '0', '0');
INSERT INTO `nv_website` VALUES ('6', '12', '是打发士大夫', 'http://nav.com/admin/project/create', '', '0', '1501486065');
INSERT INTO `nv_website` VALUES ('7', '13', 'sdfsd', 'http://nav.com/admin/project/create', '', '0', '1501487072');
INSERT INTO `nv_website` VALUES ('8', '13', 'sdfs', 'http://nav.com/admin/project/create', '', '0', '1501487072');
INSERT INTO `nv_website` VALUES ('9', '0', '是的是的', '胜多负少的', '', '0', '1504690153');
INSERT INTO `nv_website` VALUES ('22', '1', 'sdfsd', 'http://www.runoob.com/try/try.php?filename=try_ng_', '', '0', '1504693528');
INSERT INTO `nv_website` VALUES ('23', '1', 'dsfd', 'http://www.runoob.com/try/try.php?filename=try_ng_', '', '0', '1504693556');
INSERT INTO `nv_website` VALUES ('24', '1', 'sdfs', 'http://www.runoob.com/try/try.php?filename=try_ng_', '', '0', '1504693577');
INSERT INTO `nv_website` VALUES ('25', '1', 'sdfsd', 'http://www.runoob.com/try/try.php?filename=try_ng_', '', '0', '1504693726');
INSERT INTO `nv_website` VALUES ('26', '1', 'sdfsd', 'http://www.runoob.com/try/try.php?filename=try_ng_', '', '0', '1504693930');
INSERT INTO `nv_website` VALUES ('27', '1', 'sdfsdsdfs', 'http://www.runoob.com/try/try.php?filename=try_ng_', '', '0', '1504693956');
INSERT INTO `nv_website` VALUES ('28', '1', 'dfsdf', 'svn://www.runoob.com/try/try.php?filename=try_ng_', '', '0', '1504693992');
