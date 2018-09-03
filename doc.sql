/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50720
Source Host           : localhost:3306
Source Database       : doc

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2018-09-03 15:14:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `doc_apis`
-- ----------------------------
DROP TABLE IF EXISTS `doc_apis`;
CREATE TABLE `doc_apis` (
  `api_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `authorid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `wtime` int(10) NOT NULL,
  PRIMARY KEY (`api_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of doc_apis
-- ----------------------------

-- ----------------------------
-- Table structure for `doc_articles`
-- ----------------------------
DROP TABLE IF EXISTS `doc_articles`;
CREATE TABLE `doc_articles` (
  `articleid` int(3) NOT NULL AUTO_INCREMENT,
  `artname` char(10) NOT NULL COMMENT '接口名字',
  `menuid` int(2) NOT NULL,
  `wtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `authorid` int(2) NOT NULL,
  `readnum` int(4) NOT NULL DEFAULT '0',
  `resopath` char(20) NOT NULL,
  PRIMARY KEY (`articleid`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of doc_articles
-- ----------------------------
INSERT INTO `doc_articles` VALUES ('7', '规范化', '3', '2015-12-26 01:47:27', '2', '0', '20151225203404.html');
INSERT INTO `doc_articles` VALUES ('8', '施工方', '3', '2015-12-26 01:47:29', '2', '0', '20151225204130.html');
INSERT INTO `doc_articles` VALUES ('9', '大概是', '3', '2015-12-26 01:47:32', '2', '0', '20151225220837.html');
INSERT INTO `doc_articles` VALUES ('10', '但还是', '3', '2015-12-26 01:47:34', '2', '0', '20151225221052.html');
INSERT INTO `doc_articles` VALUES ('11', '大幅度', '0', '2015-12-26 01:47:36', '0', '0', '20151225222030.html');
INSERT INTO `doc_articles` VALUES ('12', '沙发上是', '0', '2015-12-26 01:47:41', '0', '0', '20151225222112.html');
INSERT INTO `doc_articles` VALUES ('13', '对方回答说', '0', '2015-12-26 01:47:44', '0', '0', '20151225162145.html');
INSERT INTO `doc_articles` VALUES ('17', 'hhhhh', '2', '2015-12-26 20:40:46', '1', '0', '20151225205102.html');
INSERT INTO `doc_articles` VALUES ('20', '违法', '1', '2015-12-26 21:24:50', '1', '0', '20151226035322.html');
INSERT INTO `doc_articles` VALUES ('21', '登陆', '1', '2015-12-26 10:54:49', '1', '0', '20151226035449.html');
INSERT INTO `doc_articles` VALUES ('22', '箭头', '2', '2015-12-26 10:58:32', '1', '0', '20151226035832.html');
INSERT INTO `doc_articles` VALUES ('23', '发射点', '1', '2015-12-26 21:38:35', '1', '0', '20151226052014.html');
INSERT INTO `doc_articles` VALUES ('24', '空间看手机地方', '1', '2015-12-26 12:20:26', '1', '0', '20151226052026.html');
INSERT INTO `doc_articles` VALUES ('25', '', '0', '2015-12-26 16:42:08', '0', '0', '20151226094208.html');
INSERT INTO `doc_articles` VALUES ('26', '登录', '2', '2016-10-20 20:09:27', '4', '182', '20151228025545.html');
INSERT INTO `doc_articles` VALUES ('28', 'Android下载', '10', '2017-04-01 11:42:15', '5', '76', '20151228143228.html');
INSERT INTO `doc_articles` VALUES ('29', '注册', '0', '2015-12-29 06:34:15', '4', '0', '20151228223415.html');
INSERT INTO `doc_articles` VALUES ('30', '注册', '2', '2016-11-09 14:08:44', '4', '129', '20151228223519.html');
INSERT INTO `doc_articles` VALUES ('32', 'APP首页', '7', '2016-11-09 22:39:37', '4', '135', '20151230190147.html');
INSERT INTO `doc_articles` VALUES ('33', '购物车', '8', '2016-09-01 15:55:32', '4', '134', '20151230201511.html');
INSERT INTO `doc_articles` VALUES ('35', '修改购物车商品数量', '8', '2016-09-27 15:46:37', '4', '107', '20151230203149.html');
INSERT INTO `doc_articles` VALUES ('36', '移除购物车中的商品', '8', '2017-04-01 11:42:09', '4', '77', '20151230203251.html');
INSERT INTO `doc_articles` VALUES ('37', '加入购物车', '8', '2016-08-29 16:08:26', '4', '131', '20151231012618.html');
INSERT INTO `doc_articles` VALUES ('38', '收藏', '8', '2016-12-05 17:02:29', '4', '111', '20151231020204.html');
INSERT INTO `doc_articles` VALUES ('39', '取消收藏', '8', '2016-09-27 16:40:45', '4', '81', '20151231021020.html');
INSERT INTO `doc_articles` VALUES ('40', '加入收藏', '8', '2016-11-09 14:09:02', '4', '75', '20151231022829.html');
INSERT INTO `doc_articles` VALUES ('41', '订单列表', '2', '2017-04-01 11:42:06', '4', '87', '20160102200527.html');
INSERT INTO `doc_articles` VALUES ('44', '获取用户资料', '2', '2016-09-27 15:46:51', '4', '184', '20160102201618.html');
INSERT INTO `doc_articles` VALUES ('45', '提交新修改的用户资料', '2', '2016-09-01 15:58:10', '4', '122', '20160102205909.html');
INSERT INTO `doc_articles` VALUES ('46', '所有用户列表', '2', '2017-04-01 11:42:07', '5', '106', '20160104143552.html');
INSERT INTO `doc_articles` VALUES ('48', 'Android 开发', '10', '2017-04-01 11:41:53', '5', '46', '20160106162752.html');
INSERT INTO `doc_articles` VALUES ('49', '云故、云梦、云厨', '9', '2016-07-11 15:53:38', '4', '82', '20160109114611.html');
INSERT INTO `doc_articles` VALUES ('50', '云故乡', '11', '2016-12-05 17:02:34', '4', '145', '20160109123902.html');
INSERT INTO `doc_articles` VALUES ('51', '云梦乡、云厨秀', '11', '2017-04-01 11:42:12', '4', '98', '20160110053818.html');
INSERT INTO `doc_articles` VALUES ('52', '云市集', '11', '2017-04-01 11:42:12', '4', '112', '20160110074742.html');
INSERT INTO `doc_articles` VALUES ('53', '云市集', '9', '2016-07-07 15:05:59', '4', '56', '20160111142214.html');
INSERT INTO `doc_articles` VALUES ('56', '购车车支付-微信', '8', '2016-09-27 15:46:36', '4', '58', '20160117124110.html');
INSERT INTO `doc_articles` VALUES ('58', '乡村景点', '12', '2017-04-01 11:42:13', '4', '19', '20160127054632.html');
INSERT INTO `doc_articles` VALUES ('59', '精品酒店', '12', '2016-08-26 14:56:34', '4', '18', '20160127054752.html');
INSERT INTO `doc_articles` VALUES ('60', '特色美食', '12', '2016-12-05 17:02:36', '4', '11', '20160127054835.html');
INSERT INTO `doc_articles` VALUES ('61', '乡土特产', '12', '2016-08-26 14:59:33', '4', '15', '20160127054922.html');
INSERT INTO `doc_articles` VALUES ('62', '公共字段：栏目位置', '12', '2016-12-05 17:02:36', '4', '13', '20160127055427.html');
INSERT INTO `doc_articles` VALUES ('63', '检测登陆状态', '8', '2016-09-14 18:08:29', '4', '75', '20160128055638.html');
INSERT INTO `doc_articles` VALUES ('64', '购车车支付-APP', '8', '2017-04-01 11:42:11', '4', '33', '20160128092420.html');
INSERT INTO `doc_articles` VALUES ('65', '退出登录', '2', '2016-10-20 20:09:27', '4', '43', '20160128151452.html');
INSERT INTO `doc_articles` VALUES ('66', '直接购买-APP', '8', '2017-04-01 11:42:09', '4', '38', '20160131135043.html');
INSERT INTO `doc_articles` VALUES ('67', '直接购买-jspai', '8', '2016-08-29 16:34:32', '4', '33', '20160131140527.html');
INSERT INTO `doc_articles` VALUES ('68', '直接购买-扫码支付', '8', '2017-04-01 11:42:10', '4', '22', '20160131150921.html');
INSERT INTO `doc_articles` VALUES ('71', '项目工程文档', '10', '2017-04-01 11:42:16', '5', '37', '20160222065716.html');
INSERT INTO `doc_articles` VALUES ('72', 'studio 使用', '10', '2016-12-05 17:02:26', '5', '25', '20160325145834.html');
INSERT INTO `doc_articles` VALUES ('73', '直播列表', '13', '2016-12-05 17:02:27', '5', '56', '20160615030302.html');
INSERT INTO `doc_articles` VALUES ('75', '加载组件', '10', '2016-12-05 17:02:32', '5', '24', '20160713090057.html');
INSERT INTO `doc_articles` VALUES ('76', '用户头像上传', '2', '2016-10-07 11:57:04', '9', '56', '20160720094605.html');
INSERT INTO `doc_articles` VALUES ('77', '获取头像信息', '2', '2017-04-01 11:42:08', '9', '45', '20160720101015.html');
INSERT INTO `doc_articles` VALUES ('79', '获取手机验证码', '2', '2017-04-01 11:42:05', '9', '37', '20160803150125.html');
INSERT INTO `doc_articles` VALUES ('80', '用户登陆2', '2', '2017-04-01 11:42:05', '9', '90', '20160803150423.html');
INSERT INTO `doc_articles` VALUES ('81', '注册2', '2', '2016-11-09 14:08:37', '9', '25', '20160804162904.html');
INSERT INTO `doc_articles` VALUES ('84', '观众获取房间商品列表', '14', '2017-04-01 17:20:43', '5', '158', '20160905114841.html');
INSERT INTO `doc_articles` VALUES ('90', '支付宝支付', '14', '2017-04-01 17:20:40', '5', '47', '20160914033808.html');
INSERT INTO `doc_articles` VALUES ('91', 'SSO单点登录验证', '14', '2017-01-03 10:55:09', '5', '57', '20160919060702.html');
INSERT INTO `doc_articles` VALUES ('92', '用户个人信息收货地址', '14', '2017-04-01 11:42:16', '5', '34', '20160920022606.html');
INSERT INTO `doc_articles` VALUES ('93', '下单', '14', '2017-04-01 11:41:52', '5', '39', '20160920064655.html');
INSERT INTO `doc_articles` VALUES ('94', '微信支付（预付签名）', '14', '2017-04-01 11:42:17', '5', '28', '20160920065447.html');
INSERT INTO `doc_articles` VALUES ('95', '商品购买详情', '14', '2017-04-01 17:20:44', '5', '22', '20160921100359.html');
INSERT INTO `doc_articles` VALUES ('96', '订单支付结果html', '14', '2017-04-01 11:42:17', '5', '26', '20160921101104.html');

-- ----------------------------
-- Table structure for `doc_authors`
-- ----------------------------
DROP TABLE IF EXISTS `doc_authors`;
CREATE TABLE `doc_authors` (
  `authorid` int(2) NOT NULL AUTO_INCREMENT,
  `authname` char(10) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `department` char(10) NOT NULL COMMENT '部门',
  `position` char(10) NOT NULL COMMENT '职位',
  `test_account` varchar(20) DEFAULT NULL,
  `test_pwd` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`authorid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of doc_authors
-- ----------------------------
INSERT INTO `doc_authors` VALUES ('3', '汪君相', '', '研发部', '程序员', '', null);
INSERT INTO `doc_authors` VALUES ('4', '张煌', '', '研发部', '程序员', '', null);
INSERT INTO `doc_authors` VALUES ('5', '陈万洲', '123456', '研发部', '程序员', '', null);
INSERT INTO `doc_authors` VALUES ('6', '李俊宇', '', '研发部', '程序员', '', null);
INSERT INTO `doc_authors` VALUES ('8', '浩天', '', '开发部', '系统架构师', '', null);
INSERT INTO `doc_authors` VALUES ('9', '马小康', '', '开发部', '程序员', '', null);

-- ----------------------------
-- Table structure for `doc_hosts`
-- ----------------------------
DROP TABLE IF EXISTS `doc_hosts`;
CREATE TABLE `doc_hosts` (
  `host_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`host_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of doc_hosts
-- ----------------------------

-- ----------------------------
-- Table structure for `doc_links`
-- ----------------------------
DROP TABLE IF EXISTS `doc_links`;
CREATE TABLE `doc_links` (
  `lkid` int(3) NOT NULL AUTO_INCREMENT,
  `lkname` char(30) NOT NULL,
  `lkurl` char(80) NOT NULL,
  `priority` int(2) NOT NULL,
  PRIMARY KEY (`lkid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of doc_links
-- ----------------------------
INSERT INTO `doc_links` VALUES ('4', '云宿官网', 'www.icloudinn.com', '3');
INSERT INTO `doc_links` VALUES ('5', 'APP原型图', 'jx2012.cn/nb/html/', '7');
INSERT INTO `doc_links` VALUES ('6', 'opencart商城后台', 'api.qingclouds.cn/admin/', '5');
INSERT INTO `doc_links` VALUES ('7', 'SmartAndroid 2.0框架官网', 'www.aplesson.com/smartAndroid/demos/', '6');
INSERT INTO `doc_links` VALUES ('8', '微信官网', 'i.jx2012.cn/', '8');
INSERT INTO `doc_links` VALUES ('9', '云游直播接口文档', 'www.icloudinn.com:8090/yunsu-mobile-webapp/web/api/', '1');
INSERT INTO `doc_links` VALUES ('10', '云游直播后台管理', 'www.icloudinn.com:8090/yunsu-manager-webapp/manager/permission/login', '2');
INSERT INTO `doc_links` VALUES ('11', '云宿官网后台', 'www.icloudinn.com/index.php?m=admin&c=index&a=login', '4');
INSERT INTO `doc_links` VALUES ('12', '免费翻墙VPN', 'www.uoax.net/', '9');

-- ----------------------------
-- Table structure for `doc_menus`
-- ----------------------------
DROP TABLE IF EXISTS `doc_menus`;
CREATE TABLE `doc_menus` (
  `menuid` int(2) NOT NULL AUTO_INCREMENT,
  `menuname` char(10) NOT NULL COMMENT '一级菜单',
  `priority` int(1) NOT NULL,
  PRIMARY KEY (`menuid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of doc_menus
-- ----------------------------
INSERT INTO `doc_menus` VALUES ('2', '用户中心', '4');
INSERT INTO `doc_menus` VALUES ('4', '商品', '5');
INSERT INTO `doc_menus` VALUES ('7', '首页', '3');
INSERT INTO `doc_menus` VALUES ('8', '公共页面', '6');
INSERT INTO `doc_menus` VALUES ('10', 'Android 项目', '2');
INSERT INTO `doc_menus` VALUES ('11', '详情页', '7');
INSERT INTO `doc_menus` VALUES ('12', '列表页', '7');
INSERT INTO `doc_menus` VALUES ('13', '直播接口', '2');
INSERT INTO `doc_menus` VALUES ('14', 'think商店直播', '1');

-- ----------------------------
-- Table structure for `doc_project`
-- ----------------------------
DROP TABLE IF EXISTS `doc_project`;
CREATE TABLE `doc_project` (
  `pro_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of doc_project
-- ----------------------------
INSERT INTO `doc_project` VALUES ('1', '小镇演义', '33');
INSERT INTO `doc_project` VALUES ('10', '琼中云书宿', '0');
INSERT INTO `doc_project` VALUES ('12', '为而为', '0');
INSERT INTO `doc_project` VALUES ('13', 'sdsd', '0');

-- ----------------------------
-- Table structure for `doc_tasks`
-- ----------------------------
DROP TABLE IF EXISTS `doc_tasks`;
CREATE TABLE `doc_tasks` (
  `taskid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `authorid` int(11) DEFAULT NULL,
  `year` tinyint(4) DEFAULT NULL,
  `month` tinyint(2) DEFAULT NULL,
  `day` tinyint(2) DEFAULT NULL,
  `athname` varchar(10) DEFAULT NULL,
  `describe` varchar(2048) DEFAULT NULL,
  `create_time` int(10) DEFAULT NULL,
  `update_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`taskid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of doc_tasks
-- ----------------------------
INSERT INTO `doc_tasks` VALUES ('1', '5', '18', '4', '13', '陈万洲', '[{\"type\":\"新增功能\",\"module\":\"模块\",\"task\":\"胜多负少的\",\"progress\":\"100\"},{\"type\":\"完善功能\",\"module\":\"的双方各\",\"task\":\"水电费\",\"progress\":\"100\"}]', null, null);

-- ----------------------------
-- Table structure for `doc_website`
-- ----------------------------
DROP TABLE IF EXISTS `doc_website`;
CREATE TABLE `doc_website` (
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
-- Records of doc_website
-- ----------------------------
INSERT INTO `doc_website` VALUES ('1', '1', '后台33', 'http://www.runoob.com/try/try.php?filename=try_ng_', '1', '1', '564');
INSERT INTO `doc_website` VALUES ('4', '10', '原型图', 'http://www.pmdaniu.com/rp/view?id=WXoCYwtnVmFWYAMzCyMLTw', '1', '0', '0');
INSERT INTO `doc_website` VALUES ('6', '12', '是打发士大夫', 'http://nav.com/admin/project/create', '', '0', '1501486065');
INSERT INTO `doc_website` VALUES ('7', '13', 'sdfsd', 'http://nav.com/admin/project/create', '', '0', '1501487072');
INSERT INTO `doc_website` VALUES ('8', '13', 'sdfs', 'http://nav.com/admin/project/create', '', '0', '1501487072');
INSERT INTO `doc_website` VALUES ('9', '0', '是的是的', '胜多负少的', '', '0', '1504690153');
INSERT INTO `doc_website` VALUES ('22', '1', 'sdfsd', 'http://www.runoob.com/try/try.php?filename=try_ng_', '', '0', '1504693528');
INSERT INTO `doc_website` VALUES ('23', '1', 'dsfd', 'http://www.runoob.com/try/try.php?filename=try_ng_', '', '0', '1504693556');
INSERT INTO `doc_website` VALUES ('24', '1', 'sdfs', 'http://www.runoob.com/try/try.php?filename=try_ng_', '', '0', '1504693577');
INSERT INTO `doc_website` VALUES ('25', '1', 'sdfsd', 'http://www.runoob.com/try/try.php?filename=try_ng_', '', '0', '1504693726');
INSERT INTO `doc_website` VALUES ('26', '1', 'sdfsd', 'http://www.runoob.com/try/try.php?filename=try_ng_', '', '0', '1504693930');
INSERT INTO `doc_website` VALUES ('27', '1', 'sdfsdsdfs', 'http://www.runoob.com/try/try.php?filename=try_ng_', '', '0', '1504693956');
INSERT INTO `doc_website` VALUES ('28', '1', 'dfsdf', 'svn://www.runoob.com/try/try.php?filename=try_ng_', '', '0', '1504693992');

-- ----------------------------
-- Table structure for `nv_project`
-- ----------------------------
DROP TABLE IF EXISTS `nv_project`;
CREATE TABLE `nv_project` (
  `pro_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `creat_time` int(10) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nv_project
-- ----------------------------
INSERT INTO `nv_project` VALUES ('1', '2323', '33');

-- ----------------------------
-- Table structure for `nv_website`
-- ----------------------------
DROP TABLE IF EXISTS `nv_website`;
CREATE TABLE `nv_website` (
  `website_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `url` varchar(50) NOT NULL,
  `type` varchar(1) NOT NULL,
  `statuse` int(1) NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`website_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nv_website
-- ----------------------------
INSERT INTO `nv_website` VALUES ('1', '1', '酷嗨', 'www.kuhai.con', '1', '1', '20122');
