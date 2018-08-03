/*
Navicat MySQL Data Transfer

Source Server         : 线下
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : pt

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-07-30 17:25:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `pt_nav`
-- ----------------------------
DROP TABLE IF EXISTS `pt_nav`;
CREATE TABLE `pt_nav` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '导航id',
  `nav_name` varchar(60) DEFAULT NULL COMMENT '名称',
  `position` char(5) DEFAULT '1' COMMENT '显示位置（1.头部 2.底部）',
  `orders` smallint(4) DEFAULT '50' COMMENT '排序',
  `show_nav` smallint(1) DEFAULT NULL COMMENT '是否显示（1.显示 0.隐藏）',
  `pid` int(5) DEFAULT NULL COMMENT '父级id',
  `allow_son` tinyint(1) DEFAULT NULL COMMENT '是否可以添加子栏目（1.是 0.否）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pt_nav
-- ----------------------------
INSERT INTO `pt_nav` VALUES ('72', '产品中心', '1', '1', '1', '0', '1');
INSERT INTO `pt_nav` VALUES ('73', '应用案例', '1', '2', '1', '0', '1');
INSERT INTO `pt_nav` VALUES ('75', '合作客户', '1', '4', '1', '0', '1');
INSERT INTO `pt_nav` VALUES ('76', '关于平特', '1', '5', '1', '0', '1');
INSERT INTO `pt_nav` VALUES ('77', '企业形象', '1', '6', '1', '0', '1');
INSERT INTO `pt_nav` VALUES ('78', '新闻咨询', '1', '7', '1', '0', '1');
INSERT INTO `pt_nav` VALUES ('79', '常见问题', '1', '8', '1', '0', '1');
INSERT INTO `pt_nav` VALUES ('80', '在线留言', '1', '9', '1', '0', '1');
INSERT INTO `pt_nav` VALUES ('81', '联系平特', '1', '10', '1', '0', '1');
INSERT INTO `pt_nav` VALUES ('82', '铜工', '1', '11', '1', '72', '1');
INSERT INTO `pt_nav` VALUES ('83', '公司产品', '1', '12', '1', '72', '1');
INSERT INTO `pt_nav` VALUES ('84', '精密产品', '1', '13', '1', '72', '1');
INSERT INTO `pt_nav` VALUES ('85', '公司简介', '1', '14', '1', '76', '1');
INSERT INTO `pt_nav` VALUES ('86', '组织机构', '1', '15', '1', '76', '1');

-- ----------------------------
-- Table structure for `pt_photos`
-- ----------------------------
DROP TABLE IF EXISTS `pt_photos`;
CREATE TABLE `pt_photos` (
  `photo_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品相册id',
  `sm_photo` varchar(255) DEFAULT NULL COMMENT '商品小图',
  `mb_photo` varchar(255) DEFAULT NULL COMMENT '商品中图',
  `big_photo` varchar(255) DEFAULT NULL COMMENT '商品大图',
  `pid` smallint(6) DEFAULT NULL COMMENT '商品id',
  `og_photo` varchar(255) DEFAULT NULL COMMENT '商品原图',
  PRIMARY KEY (`photo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pt_photos
-- ----------------------------

-- ----------------------------
-- Table structure for `pt_product`
-- ----------------------------
DROP TABLE IF EXISTS `pt_product`;
CREATE TABLE `pt_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品ID',
  `pname` varchar(30) DEFAULT NULL COMMENT '产品',
  `nid` smallint(4) DEFAULT NULL COMMENT '分类ID',
  `orders` smallint(5) DEFAULT '50' COMMENT '排序',
  `pdesc` text COMMENT '产品详情',
  `thumb` varchar(200) DEFAULT NULL,
  `time` int(12) DEFAULT NULL,
  `enable` smallint(1) DEFAULT '1' COMMENT '1启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pt_product
-- ----------------------------
INSERT INTO `pt_product` VALUES ('34', 'rgfd对方GV对方', '73', '31', '<p>fsd吃vb31111</p>', '20180730\\95e4c6a785ba8b50ef2f776fd509e158.png', '1532938767', '1');
INSERT INTO `pt_product` VALUES ('33', '电饭锅电饭锅', '82', '213', '<p>gf</p>', '20180730\\0f3da9450611d1b614d8667244879333.jpg', '1532937777', '1');
