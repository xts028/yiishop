/*
Navicat MySQL Data Transfer

Source Server         : zz
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : yiishop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-04-03 14:31:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `last_login_ip` int(11) NOT NULL,
  `last_login_time` int(11) NOT NULL,
  `authKey` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('8', 'ni来了', '$2y$13$XFkrJXtO.cn5sdTfEOenPe.QG2l19qP5BuWH/TUSlBbjI1fzs49nK', '113443@qq.com', '1', '0', '0', '');
INSERT INTO `admin` VALUES ('10', '我来也', '$2y$13$zLO6pJ4VFwEi4Ht0WEGou.nkXtdoe4T.T9Abiy7AFLwGq.hCBvYyS', '229@qq.com', '1', '0', '0', '1WDb2dkTtKp5jECZXXb_KkAt3KtHNWMY');

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '文章名称',
  `article_category_id` smallint(3) NOT NULL COMMENT '文章分类',
  `intro` text COMMENT '简介',
  `status` smallint(4) NOT NULL COMMENT '状态',
  `sort` smallint(4) NOT NULL COMMENT '排序',
  `inputtime` int(10) NOT NULL COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('14', '【表情】', '3', '撒点粉', '3', '1', '1490777351');
INSERT INTO `article` VALUES ('11', 'Yii2的应用', '2', '这是php的一个框架', '1', '2', '1490777251');
INSERT INTO `article` VALUES ('13', 'ui', '3', '大师傅', '2', '3', '1490777330');
INSERT INTO `article` VALUES ('12', 'thinkphp', '2', '这个也是PHP的一个运用较为管饭的一个框架', '1', '2', '1490777305');

-- ----------------------------
-- Table structure for article_category
-- ----------------------------
DROP TABLE IF EXISTS `article_category`;
CREATE TABLE `article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `intro` text COMMENT '简介',
  `status` smallint(4) NOT NULL COMMENT '状态',
  `sort` smallint(4) NOT NULL COMMENT '排序',
  `is_help` smallint(6) NOT NULL COMMENT '是否是帮助相关的分类',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article_category
-- ----------------------------
INSERT INTO `article_category` VALUES ('1', 'IOS', '互联网iOS技术', '-1', '3', '0');
INSERT INTO `article_category` VALUES ('2', 'PHP', '互联网的热门学科', '1', '1', '1');
INSERT INTO `article_category` VALUES ('3', 'Java', 'java些', '1', '2', '1');
INSERT INTO `article_category` VALUES ('5', 'UI', '美工的简称', '0', '2', '0');

-- ----------------------------
-- Table structure for article_detail
-- ----------------------------
DROP TABLE IF EXISTS `article_detail`;
CREATE TABLE `article_detail` (
  `article_id` int(11) unsigned NOT NULL,
  `content` text COMMENT '文章内容',
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article_detail
-- ----------------------------
INSERT INTO `article_detail` VALUES ('12', '第三方的地方');
INSERT INTO `article_detail` VALUES ('11', '说的话回家啊数据库');
INSERT INTO `article_detail` VALUES ('13', '水电费');
INSERT INTO `article_detail` VALUES ('14', '撒点粉');

-- ----------------------------
-- Table structure for brand
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '品牌名称',
  `intro` text COMMENT '品牌简介',
  `logo` varchar(255) NOT NULL COMMENT 'LOGO',
  `sort` int(11) DEFAULT '1' COMMENT '排序',
  `status` int(11) DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of brand
-- ----------------------------
INSERT INTO `brand` VALUES ('1', '小米', '这是小米手机', '', '1', '0');
INSERT INTO `brand` VALUES ('2', 'iphone', '这是iPhone手机', '', '1', '0');
INSERT INTO `brand` VALUES ('12', '电视上', '上的', '/upload/brand/91/ab/91ab72ae531d9e7eb3b6e4ca85aca98ee70850d5.jpg', '33', '1');
INSERT INTO `brand` VALUES ('11', '米3', '米', '', '2', '0');
INSERT INTO `brand` VALUES ('9', 'vivo', 'vivo手机', '', '2', '1');
INSERT INTO `brand` VALUES ('8', 'OPPO', 'OPPO手机', '', '1', '0');
INSERT INTO `brand` VALUES ('10', '诺基亚', '诺基亚手机', '', '33', '0');
INSERT INTO `brand` VALUES ('16', 'dgsdf', '2213', '', '33', '1');
INSERT INTO `brand` VALUES ('14', 'mac', 'mac电脑', '', '12', '0');
INSERT INTO `brand` VALUES ('15', '华为', 'afddsf', '', '2', '1');
INSERT INTO `brand` VALUES ('21', 'asd', 'sad', '/upload/brand/21/6b/216bdb8d6d8ff6a6ada0635d8c804c19dfbb2b57.jpg', '2', '-1');
INSERT INTO `brand` VALUES ('17', '上好佳', '爱的方式', '', '222', '-1');
INSERT INTO `brand` VALUES ('18', '梵蒂冈', '傻大个', '', '33', '1');
INSERT INTO `brand` VALUES ('20', 'dasf', 'adsfd', '/upload/brand/4e/f7/4ef7b847b0c0551744dfc3d64e4d44183c5fd12f.jpg', '2', '1');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '名称',
  `sn` varchar(15) NOT NULL COMMENT '货号',
  `logo` varchar(150) NOT NULL COMMENT '商品LOGO',
  `goods_category_id` smallint(3) NOT NULL COMMENT '商品分类',
  `brand_id` int(5) NOT NULL COMMENT '品牌',
  `market_price` decimal(10,2) NOT NULL COMMENT '市场价格',
  `shop_price` decimal(10,2) NOT NULL COMMENT '本店价格',
  `stock` int(11) NOT NULL COMMENT '库存',
  `is_on_sale` smallint(4) NOT NULL COMMENT '是否上架:1是0否 ',
  `status` smallint(4) NOT NULL COMMENT '1正常0回收站',
  `sort` smallint(4) NOT NULL COMMENT '排序',
  `inputtime` int(11) NOT NULL COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', 'GL350', '', '/upload/goods/66/ed/66ed33b5847d011e73df51a6dffa3eefc39e7c94.jpg', '5', '16', '50000.00', '588888.00', '243', '1', '1', '23', '1491024111');
INSERT INTO `goods` VALUES ('2', 'X5', '', '/upload/goods/e9/9a/e99ad04b9496409bd18018f9197e2c26551489e4.jpg', '2', '18', '60000.00', '4545435.00', '23', '1', '1', '1', '1491024377');
INSERT INTO `goods` VALUES ('3', '林肯大陆', '', '/upload/goods/69/da/69dafc917ebccf886547f68dbf62cc3dc2c96024.jpg', '4', '2', '54683456.00', '32452345.00', '32', '1', '1', '34', '1491024464');
INSERT INTO `goods` VALUES ('4', '阿斯顿', '', '/upload/goods/8f/cb/8fcbc01bc3170fd77fd4aa2e04730c726f940470.jpg', '4', '1', '124343.00', '3214325.00', '23', '1', '1', '3', '1491024521');
INSERT INTO `goods` VALUES ('5', '阿斯顿', '', '/upload/goods/8f/cb/8fcbc01bc3170fd77fd4aa2e04730c726f940470.jpg', '4', '1', '124343.00', '3214325.00', '23', '1', '1', '3', '1491024580');
INSERT INTO `goods` VALUES ('6', '阿斯顿', '', '/upload/goods/8f/cb/8fcbc01bc3170fd77fd4aa2e04730c726f940470.jpg', '4', '1', '124343.00', '3214325.00', '23', '1', '1', '3', '1491024631');
INSERT INTO `goods` VALUES ('20', 'Z4', '201704020001', '/upload/goods/d6/1f/d61f8374bced57e831e89d3ac836517f4f0a417a.jpg', '2', '14', '324.00', '435.00', '34', '1', '1', '234', '1491100544');
INSERT INTO `goods` VALUES ('9', '大师傅', '', '/upload/goods/7d/33/7d33974dc68ba38f4b9f199b6d1ef39a871cae36.jpg', '2', '1', '324.00', '325.00', '32', '0', '1', '3', '1491027540');
INSERT INTO `goods` VALUES ('18', '霸道', '201704020001', '/upload/goods/c0/b5/c0b5f522db3fa7328bf29649d2d0b300405ad763.jpg', '3', '14', '324.00', '34.00', '23', '1', '1', '2', '1491100129');
INSERT INTO `goods` VALUES ('19', '规范的过', '201704020001', '/upload/goods/ec/81/ec81f3d39d765e3604fb15122d01fcaa7f045676.jpg', '3', '11', '345.00', '65546.00', '54', '1', '1', '5', '1491100233');
INSERT INTO `goods` VALUES ('16', '的萨芬', '', '/upload/goods/ea/81/ea81b9a56edc82b6bf083794c4ba251b443970f6.jpg', '3', '12', '324.00', '34.00', '3', '1', '1', '3', '1491098233');
INSERT INTO `goods` VALUES ('14', '水电费', '', '/upload/goods/04/09/04098f29f8fc1dc3adb38b677cd995fc1e770a01.jpg', '3', '2', '345.00', '435.00', '34', '1', '1', '4', '1491036332');
INSERT INTO `goods` VALUES ('15', '隧道股份', '', '/upload/goods/33/e7/33e76b510979547fb2d415f92212aae5931bccb1.jpg', '3', '2', '234.00', '324.00', '324', '0', '0', '23', '1491036709');
INSERT INTO `goods` VALUES ('21', '韩国发货', '201704020001', '/upload/goods/26/ea/26ea7aee4aa64208e1bb6b6290fa34666cd1019b.jpg', '2', '15', '324.00', '34.00', '34', '1', '1', '43', '1491100579');
INSERT INTO `goods` VALUES ('22', 'sdsdf', '201704030001', '/upload/goods/65/9c/659cee443dca36f7cd9df7b8ea52d1f10cb6a9c0.jpg', '2', '2', '123.00', '123.00', '123', '1', '1', '1', '1491182706');
INSERT INTO `goods` VALUES ('23', '43', '201704030001', '/upload/goods/57/22/5722eb5b3c5c78955f01c08ee79801e6abec54b6.jpg', '4', '8', '324.00', '432.00', '23', '0', '1', '23', '1491182776');

-- ----------------------------
-- Table structure for goods_category
-- ----------------------------
DROP TABLE IF EXISTS `goods_category`;
CREATE TABLE `goods_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `tree` int(11) NOT NULL COMMENT '树',
  `lft` int(11) NOT NULL COMMENT '左节点',
  `rgt` int(11) NOT NULL COMMENT '右节点',
  `depth` int(11) NOT NULL COMMENT '层级',
  `name` varchar(255) NOT NULL COMMENT '分类名称',
  `parent_id` int(11) NOT NULL COMMENT '父分类',
  `intro` text COMMENT '简介',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_category
-- ----------------------------
INSERT INTO `goods_category` VALUES ('1', '1', '1', '10', '0', '家用汽车', '0', '家用汽车类');
INSERT INTO `goods_category` VALUES ('2', '1', '6', '9', '1', 'Suv', '1', 'suv类');
INSERT INTO `goods_category` VALUES ('3', '1', '7', '8', '2', 'H6', '2', 'dfg');
INSERT INTO `goods_category` VALUES ('4', '1', '2', '5', '1', '三厢车', '1', '水电费');
INSERT INTO `goods_category` VALUES ('5', '1', '3', '4', '2', 'C4', '4', '大范甘迪');

-- ----------------------------
-- Table structure for goods_day_count
-- ----------------------------
DROP TABLE IF EXISTS `goods_day_count`;
CREATE TABLE `goods_day_count` (
  `day` date NOT NULL COMMENT '日期',
  `count` int(11) DEFAULT NULL COMMENT '商品数',
  PRIMARY KEY (`day`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_day_count
-- ----------------------------
INSERT INTO `goods_day_count` VALUES ('2017-04-02', '0');
INSERT INTO `goods_day_count` VALUES ('2017-04-03', '0');

-- ----------------------------
-- Table structure for goods_gallery
-- ----------------------------
DROP TABLE IF EXISTS `goods_gallery`;
CREATE TABLE `goods_gallery` (
  `goods_id` int(20) NOT NULL COMMENT '商品ID',
  `path` varchar(255) NOT NULL COMMENT '商品图片地址',
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_gallery
-- ----------------------------
INSERT INTO `goods_gallery` VALUES ('1', 'upload/gallery/58e0b372586b0.jpg', '3');
INSERT INTO `goods_gallery` VALUES ('3', 'upload/gallery/58e0b43f263d0.jpg', '10');
INSERT INTO `goods_gallery` VALUES ('3', 'upload/gallery/58e0b43f279c1.jpg', '11');
INSERT INTO `goods_gallery` VALUES ('3', 'upload/gallery/58e0b43f28df3.jpg', '12');
INSERT INTO `goods_gallery` VALUES ('4', 'upload/gallery/58e0b454c1049.jpg', '13');
INSERT INTO `goods_gallery` VALUES ('4', 'upload/gallery/58e0b454c4763.jpg', '14');
INSERT INTO `goods_gallery` VALUES ('4', 'upload/gallery/58e0b454c5f57.jpg', '15');
INSERT INTO `goods_gallery` VALUES ('4', 'upload/gallery/58e0b49c404f3.jpg', '16');
INSERT INTO `goods_gallery` VALUES ('4', 'upload/gallery/58e0b49c41a92.jpg', '17');
INSERT INTO `goods_gallery` VALUES ('4', 'upload/gallery/58e0b49c42540.jpg', '18');
INSERT INTO `goods_gallery` VALUES ('5', 'upload/gallery/58e0b4d6b8970.jpg', '19');
INSERT INTO `goods_gallery` VALUES ('5', 'upload/gallery/58e0b4d6ba047.jpg', '20');
INSERT INTO `goods_gallery` VALUES ('5', 'upload/gallery/58e0b4d6ba98c.jpg', '21');
INSERT INTO `goods_gallery` VALUES ('9', 'upload/gallery/58e0b5932c3b8.jpg', '23');
INSERT INTO `goods_gallery` VALUES ('9', 'upload/gallery/58e0b5932e4d1.jpg', '24');

-- ----------------------------
-- Table structure for goods_intro
-- ----------------------------
DROP TABLE IF EXISTS `goods_intro`;
CREATE TABLE `goods_intro` (
  `goods_id` int(20) NOT NULL COMMENT '商品ID',
  `content` text COMMENT '商品描述',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_intro
-- ----------------------------
INSERT INTO `goods_intro` VALUES ('15', '<p>水电费</p>');
INSERT INTO `goods_intro` VALUES ('16', '<p>而广泛的</p>');
INSERT INTO `goods_intro` VALUES ('18', '<p>发电公司的风格</p>');
INSERT INTO `goods_intro` VALUES ('19', '<p>发的是很好</p>');
INSERT INTO `goods_intro` VALUES ('20', '<p>35345345</p>');
INSERT INTO `goods_intro` VALUES ('21', '<p>废话规范化</p>');
INSERT INTO `goods_intro` VALUES ('22', '<p>sdfa</p>');
INSERT INTO `goods_intro` VALUES ('23', '<p>dfgsfdsdfhf</p>');

-- ----------------------------
-- Table structure for goods_promotion
-- ----------------------------
DROP TABLE IF EXISTS `goods_promotion`;
CREATE TABLE `goods_promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) NOT NULL COMMENT '商品id',
  `promotion_id` int(10) NOT NULL COMMENT '促销类型Id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_promotion
-- ----------------------------

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1490673886');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1490673889');
INSERT INTO `migration` VALUES ('m170328_031013_create_table_brand', '1490673889');
INSERT INTO `migration` VALUES ('m170329_033016_create_article_table', '1490758604');
INSERT INTO `migration` VALUES ('m170329_033816_create_article_detail_table', '1490758826');
INSERT INTO `migration` VALUES ('m170329_034216_create_article_category_table', '1490759238');
INSERT INTO `migration` VALUES ('m170330_060722_create_goods_category_table', '1490854273');
INSERT INTO `migration` VALUES ('m170401_021551_create_goods_day_count_table', '1491013111');
INSERT INTO `migration` VALUES ('m170401_021915_create_goods_table', '1491013777');
INSERT INTO `migration` VALUES ('m170401_023229_create_goods_intro_table', '1491014080');
INSERT INTO `migration` VALUES ('m170401_023518_create_goods_gallery_table', '1491014224');
INSERT INTO `migration` VALUES ('m170401_023846_create_promotion_table', '1491014483');
INSERT INTO `migration` VALUES ('m170401_024150_create_goods_promotion_table', '1491014598');

-- ----------------------------
-- Table structure for promotion
-- ----------------------------
DROP TABLE IF EXISTS `promotion`;
CREATE TABLE `promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '促销名称',
  `start_time` int(10) DEFAULT NULL COMMENT '开始时间',
  `end_time` int(10) DEFAULT NULL COMMENT '结束时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of promotion
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
