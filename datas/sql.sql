/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50539
Source Host           : localhost:3306
Source Database       : biye_blog

Target Server Type    : MYSQL
Target Server Version : 50539
File Encoding         : 65001

Date: 2017-12-11 20:45:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `biye_user`
-- ----------------------------
DROP TABLE IF EXISTS `biye_user`;
CREATE TABLE `biye_user` (
`user_id`  int(11) NOT NULL AUTO_INCREMENT COMMENT '//用户ID' ,
`username`  varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`password`  varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`role`  int(11) NULL DEFAULT 0 COMMENT '//0 代表一般用户' ,
`icon`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
PRIMARY KEY (`user_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=10

;

-- ----------------------------
-- Records of biye_user
-- ----------------------------
BEGIN;
INSERT INTO `biye_user` VALUES ('1', 'yaoyao', '123456789', '0', 'header.jpg'), ('2', 'xiaolong', '123456', '0', 'header.jpg'), ('3', 'liangcici', '123456', '0', 'header.jpg'), ('4', 'yangyang', '123456', '0', 'header.jpg'), ('5', 'yangyang1', '123456', '0', 'header.jpg'), ('7', 'tingting', '123456', '1', 'header.jpg'), ('8', 'guaiguai', '123456', '0', 'header.jpg'), ('9', 'yaoyao1', '1234567', '0', 'header.jpg');
COMMIT;

-- ----------------------------
-- Table structure for `blog_article`
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
`art_id`  int(11) NOT NULL AUTO_INCREMENT ,
`art_title`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`art_viewTime`  int(11) NULL DEFAULT 0 ,
`art_editor`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`art_time`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`art_thumb`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`art_content`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`art_tag`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`art_pid`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`art_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of blog_article
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `blog_category`
-- ----------------------------
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
`cate_id`  int(11) NOT NULL AUTO_INCREMENT ,
`cate_name`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`cate_url`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`cate_order`  int(11) NULL DEFAULT 0 ,
`cate_viewTime`  int(11) NULL DEFAULT 0 ,
PRIMARY KEY (`cate_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=7

;

-- ----------------------------
-- Records of blog_category
-- ----------------------------
BEGIN;
INSERT INTO `blog_category` VALUES ('1', 'PHP', 'xxxxxxxx', '2', '0'), ('2', 'JAVA', '', '1', '0'), ('3', 'HTML5', '', '3', '0'), ('4', 'CSS3', '', '4', '0'), ('5', 'JavaScript', '', '5', '0'), ('6', 'ECMAscript6', '', '6', '0');
COMMIT;

-- ----------------------------
-- Table structure for `replay`
-- ----------------------------
DROP TABLE IF EXISTS `replay`;
CREATE TABLE `replay` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`parent_id`  int(11) NULL DEFAULT 0 ,
`son_id`  int(11) NULL DEFAULT NULL ,
`sender`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`content`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`time`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`replay_order`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=52

;

-- ----------------------------
-- Records of replay
-- ----------------------------
BEGIN;
INSERT INTO `replay` VALUES ('13', '0', '0', 'xiaolong', '333333333333', '2017/10/24 下午9:29:39', ''), ('19', '0', '21', 'xiaolong', '婷婷，是个鸹貔', '2017/10/25 上午9:34:53', ''), ('20', '0', '30', 'xiaolong', '如意纹我红日案发你开房卡还款', '2017/10/25 上午11:29:49', ''), ('21', '19', '22', 'xiaolong', '大家好，我是婷婷猪', '2017/10/25', ''), ('22', '21', '23', 'xiaolong', '婷婷猪就是我', '2017/10/25', ''), ('23', '22', '26', 'tingting', '你去死', '2017/10/25', ''), ('26', '23', '27', 'tingting', '55555555555555555555555555555555555555555555555555555555555555555555555555555555555555\n一月又一月晕晕晕晕晕晕晕晕晕晕\njjjjjjjjjjjjjjj呵呵呵呵呵hhhhhhh\n爆吧宝宝不不不不不不不不不不', '2017/10/25', ''), ('27', '26', '28', 'tingting', '777777777777777777777777777777777777777', '2017/10/25', ''), ('28', '27', '0', 'tingting', '一月又一月晕晕晕晕晕晕晕晕晕晕晕晕晕晕晕晕晕晕晕晕\n呵呵呵呵呵hhhhhhh或或\n呵呵呵呵呵hhhhhhh或或或或\n将就将就军军军军军军军军军', '2017/10/25', ''), ('30', '20', '0', 'tingting', '122222222222', '2017/10/25', ''), ('31', '0', '0', 'tingting', '345678瓶', '2017/10/25 下午3:44:32', ''), ('32', '0', '34', 'tingting', '你是个鸹貔', '2017/10/25 下午3:44:53', ''), ('33', '0', '36', 'tingting', '貔貅是什么', '2017/10/25 下午3:45:02', ''), ('34', '32', '0', 'tingting', '婷婷猪', '2017/10/25', ''), ('36', '33', '0', 'tingting', '555555', '2017/10/2515559', ''), ('37', '0', '38', 'tingting', '55555', '2017/10/25 下午3:55:25', ''), ('38', '37', '39', 'tingting', '22222222', '315569', ''), ('39', '38', '40', 'tingting', '55', '2017102516158176', ''), ('40', '39', '41', 'tingting', '额鹅鹅鹅鹅鹅鹅鹅鹅鹅', '2017/10/25 16:3:53', ''), ('41', '40', '42', 'tingting', '特', '2017/010/25 16:6:49', ''), ('42', '41', '43', 'tingting', '333333', '2017/010/25 16:09:13', ''), ('43', '42', '44', 'tingting', '4444444444', '2017/010/25 16:010:22', ''), ('44', '43', '45', 'tingting', '777777777777777', '2017/10/25 16:10:49', ''), ('45', '44', '46', 'tingting', '2222222222', '2017/10/25 16:12:04', ''), ('46', '45', '0', 'tingting', '3333333333', '2017/10/25 16:13:20', '20171025161320881'), ('48', '0', '0', 'tingting', '234567890', '2017/10/25 下午4:20:41', ''), ('49', '0', '50', 'tingting', '我是第一跳数据', '2017/10/25 16:22:51', '20171025162251911'), ('50', '49', '0', 'tingting', '我是信了', '2017/10/25 16:23:03', '201710251623351'), ('51', '0', '0', 'tingting', '管你信不信', '2017/10/25 16:23:11', '20171025162311160');
COMMIT;

-- ----------------------------
-- Table structure for `user_info`
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
`user_id`  int(11) NOT NULL AUTO_INCREMENT ,
`uesr_icon`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`user_name`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`email`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`user_tel`  varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`user_sex`  varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' ,
`user_qq`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`user_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of user_info
-- ----------------------------
BEGIN;
INSERT INTO `user_info` VALUES ('1', '/graduateDesign/resources/views/pages/images/header.jpg', 'yaoyao', '804537383@qq.com', '18180461521', 'male', '804537383'), ('2', '/graduateDesign/resources/views/pages/images/header.jpg', 'yaoyao1', '12313', '123123', 'male', '123123');
COMMIT;

-- ----------------------------
-- Auto increment value for `biye_user`
-- ----------------------------
ALTER TABLE `biye_user` AUTO_INCREMENT=10;

-- ----------------------------
-- Auto increment value for `blog_article`
-- ----------------------------
ALTER TABLE `blog_article` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `blog_category`
-- ----------------------------
ALTER TABLE `blog_category` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for `replay`
-- ----------------------------
ALTER TABLE `replay` AUTO_INCREMENT=52;

-- ----------------------------
-- Auto increment value for `user_info`
-- ----------------------------
ALTER TABLE `user_info` AUTO_INCREMENT=3;
