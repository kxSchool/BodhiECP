/*
 Navicat Premium Data Transfer

 Source Server         : bodhi
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : 192.168.31.125:3306
 Source Schema         : bodhi_shopmall

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 23/03/2024 11:17:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account_log
-- ----------------------------
DROP TABLE IF EXISTS `account_log`;
CREATE TABLE `account_log`  (
  `log_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'log的id',
  `log_sn` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '流水号',
  `staff_id` mediumint(8) UNSIGNED NOT NULL COMMENT '操作人id 0为系统管理员',
  `user_money` decimal(10, 2) NOT NULL COMMENT '资金',
  `change_time` int(10) UNSIGNED NOT NULL COMMENT '变动时间',
  `change_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '变动原因',
  `status_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '提现成功\r\n,转入钱包成功',
  `change_money` decimal(10, 2) NOT NULL COMMENT '修改金额',
  `shopid` int(11) NOT NULL COMMENT '服务商id',
  `staff_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '操作人名称',
  `status` tinyint(1) NOT NULL COMMENT '1为提现成功，2为转入钱包，3为转入冻结,4为申请提现',
  `adminid` int(11) NOT NULL COMMENT '管理员ID',
  `adminname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '管理员名称',
  PRIMARY KEY (`log_id`) USING BTREE,
  INDEX `user_id`(`staff_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 37 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商铺财务操作日志表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of account_log
-- ----------------------------

-- ----------------------------
-- Table structure for ad
-- ----------------------------
DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '广告名',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '广告描述',
  `spaceid` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '广告位置id（happy_ad_space中的spaceid）',
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '0是图片广告 1是文字广告',
  `setting` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '广告设置（广告内容ad_code、广告链接ad_link组成数组转化成的字符串）',
  `startdate` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '开始显示时间（时间戳）',
  `enddate` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '结束显示时间',
  `addtime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '广告添加时间',
  `clicks` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '广告点击次数',
  `listorder` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `disabled` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1可用  0禁用',
  `description1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '广告描述1',
  `description2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '广告描述2',
  `description3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '广告描述3',
  `description4` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '广告描述4',
  `apptype` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT 'app接口判断跳转的方向：0,默认不做任何操作；1,店铺列表;2,店铺详情;3,商品列表;4,商品详情;5,广告',
  `price` int(10) NULL DEFAULT NULL COMMENT '价格',
  `amount` int(11) NULL DEFAULT NULL COMMENT '销售数量',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `spaceid`(`spaceid`, `disabled`, `listorder`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 209 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '广告位内容' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ad
-- ----------------------------
INSERT INTO `ad` VALUES (1, '公司注册', '公司注册', 1, '0', '{\"ad_link\":\"/product/info?tid=32&sid=2\",\"ad_code\":\"n_banner-1.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (2, '税控代办', '税控代办', 1, '0', '{\"ad_link\":\"/product/info.html?tid=54&sid=7\",\"ad_code\":\"n_banner-2.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (178, '知识产权', '知识产权', 1, '0', '{\"ad_link\":\"/product/info.html?tid=115&sid=21\",\"ad_code\":\"n_banner-4.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (177, '互联网+财税', '互联网+财税', 1, '0', '{\"ad_link\":\"/product/info?tid=53&sid=6\",\"ad_code\":\"n_banner-3.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (118, '财税服务', '财税服务', 2, '0', '{\"ad_link\":\"/product\\/info?tid=53&sid=6\",\"ad_code\":\"home_type2.png\"}', 0, 0, 0, 0, 2, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (7, '工商服务', '开公司', 2, '0', '{\"ad_link\":\"/product\\/info?tid=32&sid=2\",\"ad_code\":\"home_type1.png\"}', 0, 0, 0, 0, 1, 1, '', '', '', '', '', 0, NULL);
INSERT INTO `ad` VALUES (119, '许可服务', '注册商标', 2, '0', '{\"ad_link\":\"/product\\/info?tid=77&sid=14\",\"ad_code\":\"home_type3.png\"}', 0, 0, 0, 0, 3, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (120, '知识产权', '办社保', 2, '0', '{\"ad_link\":\"/product\\/info?tid=91&sid=18\",\"ad_code\":\"home_type4.png\"}', 0, 0, 0, 0, 4, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (121, '认证服务', '找律师', 2, '0', '{\"ad_link\":\"/product\\/info?tid=120&sid=24\",\"ad_code\":\"home_type5.png\"}', 0, 0, 0, 0, 5, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (122, '法律服务', '办著作权', 2, '0', '{\"ad_link\":\"/product\\/info?tid=127&sid=27\",\"ad_code\":\"home_type6.png\"}', 0, 0, 0, 0, 6, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (123, '金融服务', '申请专利', 2, '0', '{\"ad_link\":\"/product\\/info?tid=138&sid=31\",\"ad_code\":\"home_type7.png\"}', 0, 0, 0, 0, 7, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (124, '全部分类', '全部分类', 2, '0', '{\"ad_link\":\"/product\\/index\",\"ad_code\":\"home_type8.png\"}', 0, 0, 0, 0, 8, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (126, '专属定制', '专属定制', 7, '0', '{\"ad_link\":\"/index\\/customization\",\"ad_code\":\"proper_banner.png\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (127, '公司注册+记账服务', '公司注册+记账服务', 3, '0', '{\"ad_link\":\"/product/info.html?tid=151&sid=145\",\"ad_code\":\"ybgszc.jpg\"}', 0, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, '0', 3600, 35);
INSERT INTO `ad` VALUES (128, '餐饮公司注册', '税控代办', 3, '0', '{\"ad_link\":\"/product/info.html?tid=149&sid=145\",\"ad_code\":\"cygs.jpg\"}', 0, 0, 0, 0, 4, 1, '', NULL, NULL, NULL, '0', 3800, 15);
INSERT INTO `ad` VALUES (129, '物流公司注册', '银行开户', 3, '0', '{\"ad_link\":\"/product/info.html?tid=150&sid=145\",\"ad_code\":\"wlgs.jpg\"}', 0, 0, 0, 0, 5, 1, '', NULL, NULL, NULL, '0', 4600, 85);
INSERT INTO `ad` VALUES (130, '商标设计+商标注册', '商标设计+商标注册', 3, '0', '{\"ad_link\":\"/product/info.html?tid=147&sid=145\",\"ad_code\":\"sbfw.jpg\"}', 0, 0, 0, 0, 2, 1, '', NULL, NULL, NULL, '0', 3600, 46);
INSERT INTO `ad` VALUES (131, '法律咨询套餐', '法律咨询套餐', 3, '0', '{\"ad_link\":\"/product/info.html?tid=136&sid=29\",\"ad_code\":\"flfw.jpg\"}', 0, 0, 0, 0, 3, 1, '', NULL, NULL, NULL, '0', 2580, 15);
INSERT INTO `ad` VALUES (181, '税控代办', '专业代办 省时省力', 48, '0', '{\"ad_link\":\"/product/info.html?cid=7_54\",\"ad_code\":\"info-4.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 500, NULL);
INSERT INTO `ad` VALUES (132, '公司注册', '公司注册', 4, '0', '{\"ad_link\":\"/product\\/info.html?tid=32&sid=2\",\"ad_code\":\"gszc.jpg\"}', 0, 0, 0, 0, 1, 1, '', '', '', '', '', 1280, 48);
INSERT INTO `ad` VALUES (133, '代理记账', '代理记账', 4, '0', '{\"ad_link\":\"/product\\/info.html?tid=52&sid=6\",\"ad_code\":\"dljz.jpg\"}', 0, 0, 0, 0, 3, 1, '', '', '', '', '', 3600, 20);
INSERT INTO `ad` VALUES (134, '税控代办', '税控代办', 4, '0', '{\"ad_link\":\"/product/info.html?tid=54&sid=7\",\"ad_code\":\"swch.jpg\"}', 0, 0, 0, 0, 2, 1, '', NULL, NULL, NULL, '0', 500, 60);
INSERT INTO `ad` VALUES (135, '专项审计', '专项审计', 4, '0', '{\"ad_link\":\"/product/info.html?tid=59&sid=8\",\"ad_code\":\"zxsj.jpg\"}', 0, 0, 0, 0, 4, 1, '', NULL, NULL, NULL, '0', 20000, 12);
INSERT INTO `ad` VALUES (136, '公司注销', '公司注销', 4, '0', '{\"ad_link\":\"/product/info.html?tid=45&sid=4\",\"ad_code\":\"gszx.jpg\"}', 0, 0, 0, 0, 5, 1, '', NULL, NULL, NULL, '0', 3800, 10);
INSERT INTO `ad` VALUES (137, '商品条形码', '商品条形码', 6, '0', '{\"ad_link\":\"/product/info.html?tid=118&sid=23\",\"ad_code\":\"sptxm.jpg\"}', 0, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, '0', 3600, 50);
INSERT INTO `ad` VALUES (138, '高新企业认证', '高新企业认证', 6, '0', '{\"ad_link\":\"/product/info.html?tid=125&sid=25\",\"ad_code\":\"gxqyrd.jpg\"}', 0, 0, 0, 0, 2, 1, '', NULL, NULL, NULL, '0', 32800, 6);
INSERT INTO `ad` VALUES (139, '质量管理体系认证', '质量管理体系认证', 6, '0', '{\"ad_link\":\"/product/info.html?tid=120&sid=24\",\"ad_code\":\"zlgltx.jpg\"}', 0, 0, 0, 0, 3, 1, '', NULL, NULL, NULL, '0', 9800, 16);
INSERT INTO `ad` VALUES (140, '环境管理体系认证', '环境管理体系认证', 6, '0', '{\"ad_link\":\"/product/info.html?id=90&tid=121&sid=24\",\"ad_code\":\"hjgltx.png\"}', 0, 0, 0, 0, 4, 1, '', NULL, NULL, NULL, '0', 11800, 20);
INSERT INTO `ad` VALUES (141, '信息管理安全认证', '信息管理安全认证', 6, '0', '{\"ad_link\":\"/product/info.html?id=91&tid=122&sid=24\",\"ad_code\":\"xxgxaq.jpg\"}', 0, 0, 0, 0, 5, 1, '', NULL, NULL, NULL, '0', 11800, 18);
INSERT INTO `ad` VALUES (142, '商标注册', '商标注册', 5, '0', '{\"ad_link\":\"/product/info.html?tid=91&sid=18\",\"ad_code\":\"sbzc.jpg\"}', 0, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, '0', 980, 85);
INSERT INTO `ad` VALUES (143, '商标撤三', '商标撤三', 5, '0', '{\"ad_link\":\"/product/info.html?tid=98&sid=18\",\"ad_code\":\"sbcs.jpg\"}', 0, 0, 0, 0, 5, 1, '', NULL, NULL, NULL, '0', 3000, 17);
INSERT INTO `ad` VALUES (144, '软件著作权', '软件著作权', 5, '0', '{\"ad_link\":\"/product/info.html?tid=108&sid=19\",\"ad_code\":\"rjzzq.jpg\"}', 0, 0, 0, 0, 3, 1, '', NULL, NULL, NULL, '0', 1800, 78);
INSERT INTO `ad` VALUES (145, '发明专利', '发明专利', 5, '0', '{\"ad_link\":\"/product/info.html?tid=112&sid=20\",\"ad_code\":\"fmzl.jpg\"}', 0, 0, 0, 0, 2, 1, '', NULL, NULL, NULL, '0', 5000, 50);
INSERT INTO `ad` VALUES (146, '实用新型专利', '实用新型专利', 5, '0', '{\"ad_link\":\"/product/info.html?tid=113&sid=20\",\"ad_code\":\"syxxzl.jpg\"}', 0, 0, 0, 0, 4, 1, '', NULL, NULL, NULL, '0', 2800, 45);
INSERT INTO `ad` VALUES (147, '食品经营许可证', '食品经营许可证', 8, '0', '{\"ad_link\":\"/product/info.html?id=33&tid=64&sid=11\",\"ad_code\":\"spjy.jpg\"}', 0, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, '0', 3800, 60);
INSERT INTO `ad` VALUES (148, '道路经营许可证', '道路经营许可证', 8, '0', '{\"ad_link\":\"/product/info.html?id=31&tid=62&sid=10\",\"ad_code\":\"dljy.jpg\"}', 0, 0, 0, 0, 2, 1, '', NULL, NULL, NULL, '0', 4600, 31);
INSERT INTO `ad` VALUES (149, '人力资源服务许可证', '人力资源服务许可证', 8, '0', '{\"ad_link\":\"/product/info.html?id=46&tid=77&sid=14\",\"ad_code\":\"rlzy.jpg\"}', 0, 0, 0, 0, 3, 1, '', NULL, NULL, NULL, '0', 8800, 45);
INSERT INTO `ad` VALUES (150, '进出口权许可证', '进出口权许可证', 8, '0', '{\"ad_link\":\"/product/info.html?id=49&tid=79&sid=14\",\"ad_code\":\"jckmy.jpg\"}', 0, 0, 0, 0, 4, 1, '', NULL, NULL, NULL, '0', 3600, 11);
INSERT INTO `ad` VALUES (151, 'ISP经营许可证', 'ISP经营许可证', 8, '0', '{\"ad_link\":\"/product/info.html?id=52&tid=83&sid=16\",\"ad_code\":\"ispjy.jpg\"}', 0, 0, 0, 0, 5, 1, '', NULL, NULL, NULL, '0', 38000, 5);
INSERT INTO `ad` VALUES (152, '开公司', '公司注册', 9, '1', '{\"ad_link\":\"/product/info.html?cid=2_32\",\"ad_code\":\"\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '', 0, NULL);
INSERT INTO `ad` VALUES (153, '记账服务', '知识产权', 9, '1', '{\"ad_link\":\"/product/info.html?cid=6_52\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (154, '商标注册', '代理记账', 9, '1', '{\"ad_link\":\"/product/info.html?cid=18_91\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (155, '版权申请', '国家高新', 9, '1', '{\"ad_link\":\"/product/info.html?cid=19_100\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (156, '专利申请', '税收筹划', 9, '1', '{\"ad_link\":\"/product/info.html?cid=20_112\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (157, '认证服务', '公司转让', 9, '1', '{\"ad_link\":\"/product/info.html?cid=24_120\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (161, '轮播图1', '轮播图1', 10, '0', '{\"ad_link\":\"/product\\/info.html?cid=2_32\",\"ad_code\":\"xxxx_1533806704.png\"}', 0, 0, 0, 0, 0, 0, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (162, '轮播图2', '轮播图2', 10, '0', '{\"ad_link\":\"/product\\/info.html?cid=7_54\",\"ad_code\":\"xxxx_1533806843.jpg\"}', 0, 0, 0, 0, 0, 0, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (163, '轮播图3', '轮播图3', 10, '0', '{\"ad_link\":\"/product\\/info.html?cid=6_52\",\"ad_code\":\"xxxx_1533806812.jpg\"}', 0, 0, 0, 0, 0, 0, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (164, '轮播图4', '轮播图4', 10, '0', '{\"ad_link\":\"/product\\/info.html?cid=21_115\",\"ad_code\":\"xxxx_1533806773.jpg\"}', 0, 0, 0, 0, 0, 0, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (172, '一般公司注册', ' 一般公司注册', 12, '0', '{\"ad_link\":\"/product\\/info.html?cid=145_151\",\"ad_code\":\"setMeal1.jpg\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (173, '优惠套餐', ' 餐饮公司注册', 12, '0', '{\"ad_link\":\"/product/info.html?cid=145_149\",\"ad_code\":\"setMeal2.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (174, '法律服务', '法律服务', 12, '0', '{\"ad_link\":\"/product\\/info.html?cid=29_136\",\"ad_code\":\"setMeal3.jpg\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (175, '优惠套餐', '物流公司注册', 12, '0', '{\"ad_link\":\"/product/info.html?cid=145_149\",\"ad_code\":\"setMeal4.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (176, '商标服务', ' 商标服务', 12, '0', '{\"ad_link\":\"/product\\/info.html?cid=145_147\",\"ad_code\":\"setMeal5.jpg\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (180, '公司注册', '极速注册 省心保障', 48, '0', '{\"ad_link\":\"/product\\/info.html?cid=2_32\",\"ad_code\":\"info-2.jpg\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '', 1280, NULL);
INSERT INTO `ad` VALUES (207, '服务商入驻', '', 10, '0', '{\"ad_link\":\"\",\"ad_code\":\"xxxx_1533869022.png\"}', 0, 0, 1533808856, 0, 0, 0, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (206, '服务商入驻', '', 1, '0', '{\"ad_link\":\"\",\"ad_code\":\"xxxx_1533872372.png\"}', 0, 0, 1533808759, 0, 0, 1, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (182, '代理记账', '记账报税 告别财务风险', 48, '0', '{\"ad_link\":\"/product\\/info.html?cid=6_52\",\"ad_code\":\"info-1.jpg\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '', 3600, NULL);
INSERT INTO `ad` VALUES (183, '专项审计', '贴心指导 专业服务', 48, '0', '{\"ad_link\":\"/product/info.html?cid=8_59\",\"ad_code\":\"info-5.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 2000, NULL);
INSERT INTO `ad` VALUES (184, '公司注销', '快速递交 高授权率', 48, '0', '{\"ad_link\":\"/product/info.html?cid=4_45\",\"ad_code\":\"info-3.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 3800, NULL);
INSERT INTO `ad` VALUES (185, '商标注册', '知识产权保护第一步', 49, '0', '{\"ad_link\":\"/product/info.html?cid=18_91\",\"ad_code\":\"info-14.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 980, NULL);
INSERT INTO `ad` VALUES (186, '发明专利', '防止侵权 抢占市场', 49, '0', '{\"ad_link\":\"/product/info.html?cid=20_112\",\"ad_code\":\"info-11.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 5000, NULL);
INSERT INTO `ad` VALUES (187, '软件著作权', '保护著作权人合法权益', 49, '0', '{\"ad_link\":\"/product/info.html?cid=19_108\",\"ad_code\":\"info-12.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 1800, NULL);
INSERT INTO `ad` VALUES (188, '实用新型专利', '保护知产 先人一步', 49, '0', '{\"ad_link\":\"/product/info.html?cid=20_113\",\"ad_code\":\"info-15.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 2800, NULL);
INSERT INTO `ad` VALUES (189, '商标撤三', '解决疑难商标 排除后顾之忧', 49, '0', '{\"ad_link\":\"/product/info.html?cid=18_98\",\"ad_code\":\"info-13.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 3000, NULL);
INSERT INTO `ad` VALUES (191, '商品条形码', '售后跟踪 省心省力', 50, '0', '{\"ad_link\":\"/product\\/info.html?cid=23_118\",\"ad_code\":\"xxxx_1533546448.jpg\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '0', 3600, NULL);
INSERT INTO `ad` VALUES (192, '高新企业认定', '节省成本 提高效益', 50, '0', '{\"ad_link\":\"/product/info.html?cid=25_125\",\"ad_code\":\"info-6.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 32800, NULL);
INSERT INTO `ad` VALUES (193, '质量管理体系认证', '企业开拓市场金钥匙', 50, '0', '{\"ad_link\":\"/product/info.html?cid=24_120\",\"ad_code\":\"info-8.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 9800, NULL);
INSERT INTO `ad` VALUES (194, '环境管理体系认证', '专业服务 全程跟进', 50, '0', '{\"ad_link\":\"/product/info.html?cid=24_121\",\"ad_code\":\"info-7.png\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 11800, NULL);
INSERT INTO `ad` VALUES (195, '信息管理体系认证', '足不出户 专人办理', 50, '0', '{\"ad_link\":\"/product/info.html?cid=24_122\",\"ad_code\":\"info-10.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 11800, NULL);
INSERT INTO `ad` VALUES (196, '商品条形码', '条形码是商品的身份证   ', 51, '0', '{\"ad_link\":\"/product\\/info.html?cid=23_118\",\"ad_code\":\"xxxx_1535096638.png\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '', 3600, NULL);
INSERT INTO `ad` VALUES (197, '高新企业认证', '享受税收减免优惠 ', 51, '0', '{\"ad_link\":\"/index.php\\/product\\/info.html?cid=25_125\",\"ad_code\":\"xxxx_1535096690.png\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '', 32800, NULL);
INSERT INTO `ad` VALUES (198, '质量管理体系认证', '增强企业市场竞争力', 51, '0', '{\"ad_link\":\"/product\\/info.html?cid=24_120\",\"ad_code\":\"xxxx_1535096722.png\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '', 9800, NULL);
INSERT INTO `ad` VALUES (199, '信息安全体系认证', '有效保障组织信息安全', 51, '0', '{\"ad_link\":\"/product\\/info.html?cid=24_122\",\"ad_code\":\"xxxx_1535096742.png\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '', 11800, NULL);
INSERT INTO `ad` VALUES (200, 'ISP经营许可证', '交易过程 全程担保', 51, '0', '{\"ad_link\":\"/product/info.html?gid=52&cid=16_83\",\"ad_code\":\"info-16.jpg\"}', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '0', 8000, NULL);
INSERT INTO `ad` VALUES (208, '13', '', 9, '2', '{\"ad_link\":\"/product\\/info.html?cid=2_32\"}', 0, 0, 1533954269, 0, 0, 0, '', '', '', '', '4', 0, NULL);
INSERT INTO `ad` VALUES (205, 'gxjah ', '', 10, '0', '{\"ad_link\":\"/product\\/info.html?cid=2_32\",\"ad_code\":\"xxxx_1534564048.png\"}', 0, 0, 1533546820, 0, 0, 1, '', '', '', '', '', 0, NULL);

-- ----------------------------
-- Table structure for ad_space
-- ----------------------------
DROP TABLE IF EXISTS `ad_space`;
CREATE TABLE `ad_space`  (
  `spaceid` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '广告位名',
  `width` smallint(4) UNSIGNED NOT NULL DEFAULT 0 COMMENT '广告位所占用的宽度',
  `height` smallint(4) UNSIGNED NOT NULL DEFAULT 0 COMMENT '广告位所占用的高度',
  `description` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '描述',
  `disabled` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1可用  0禁用',
  PRIMARY KEY (`spaceid`) USING BTREE,
  INDEX `disabled`(`disabled`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 54 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '广告位' ROW_FORMAT = FIXED;

-- ----------------------------
-- Records of ad_space
-- ----------------------------

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '登陆账号',
  `password` char(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码（明码md5）',
  `realname` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '真是姓名',
  `roleid` smallint(3) NOT NULL COMMENT '角色id（对应happy_admin_role表中的roleid）',
  `mobile` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机号',
  `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `register_ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '注册IP',
  `register_time` int(10) NOT NULL COMMENT '注册时间（时间戳）',
  `login_ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '上次登陆IP',
  `login_time` int(10) NOT NULL COMMENT '上次登陆时间（时间戳）',
  `disabled` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1禁用 0可用',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '后台管理员表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin', '96e79218965eb72c92a549dd5a330112', '系统管理员', 1, '15618645670', 'admin@bodhitest.com', '112.2.149.161', 1694150798, '192.168.31.195', 1711116872, 0);

-- ----------------------------
-- Table structure for admin_priv
-- ----------------------------
DROP TABLE IF EXISTS `admin_priv`;
CREATE TABLE `admin_priv`  (
  `privid` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '节点id',
  `name` char(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '节点名',
  `parentid` smallint(6) NOT NULL DEFAULT 0 COMMENT '上级节点',
  `c` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '控制器',
  `a` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '方法',
  `data` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '附加参数',
  `style` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '菜单样式',
  `listorder` smallint(6) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `disabled` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0不显示 显示',
  PRIMARY KEY (`privid`) USING BTREE,
  INDEX `listorder`(`listorder`) USING BTREE,
  INDEX `parentid`(`parentid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 126 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '权限节点表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_priv
-- ----------------------------
INSERT INTO `admin_priv` VALUES (1, '权限管理', 0, 'manager', 'init', '', 'fa fa-group', 0, 1);
INSERT INTO `admin_priv` VALUES (2, '角色管理', 1, 'manager', 'role', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (3, '账户管理', 1, 'manager', 'admin', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (4, '节点管理', 1, 'manager', 'priv', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (22, '会员管理', 0, 'members', 'init', '', 'fa fa-user', 0, 1);
INSERT INTO `admin_priv` VALUES (23, '客户企业', 22, 'members', 'index', 'type=1', '', 0, 1);
INSERT INTO `admin_priv` VALUES (24, '加盟商户', 22, 'members', 'index', 'type=2', '', 0, 1);
INSERT INTO `admin_priv` VALUES (44, '星级管理', 22, 'members', 'star', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (50, '入驻申请', 22, 'members', 'applySeller', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (51, '证书审核', 22, 'members', 'certificate', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (93, '操作日志', 1, 'log', 'manage', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (95, '商品管理', 0, 'goods', 'init', '', 'fa fa-magic', 0, 1);
INSERT INTO `admin_priv` VALUES (96, '商品列表', 95, 'goods', 'index', '', ' ', 0, 1);
INSERT INTO `admin_priv` VALUES (97, '添加商品', 95, 'goods', 'addGoods', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (98, '订单管理', 0, 'order', 'init', '', 'fa fa-list', 0, 1);
INSERT INTO `admin_priv` VALUES (99, '订单列表', 98, 'order', 'index', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (100, '财务管理', 0, 'finance', 'index', '', 'fa fa-rmb', 0, 1);
INSERT INTO `admin_priv` VALUES (102, '财务日志', 100, 'finance', 'logs', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (103, '提现申请', 100, 'finance', 'apply', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (108, '广告管理', 106, 'ad', 'space', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (107, '促销卡券', 106, 'promotion', 'index', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (106, '营销管理', 0, '', '', '', 'fa fa-share-alt', 0, 1);
INSERT INTO `admin_priv` VALUES (109, '分类管理', 95, 'goods', 'cateList', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (110, '添加分类', 95, 'goods', 'addCate', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (111, '进度管理', 95, 'goods', 'progress', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (112, 'CMS管理', 0, 'cms', 'init', '', 'fa fa-archive', 0, 1);
INSERT INTO `admin_priv` VALUES (113, '栏目管理', 112, 'cms', 'channel', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (114, '内容管理', 112, 'cms', 'archive', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (115, '评论管理', 0, 'comment', 'init', '', 'fa fa-comments', 0, 1);
INSERT INTO `admin_priv` VALUES (116, '评论列表', 115, 'comment', 'index', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (117, '添加评论', 115, 'comment', 'addComment', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (123, '财务报表', 121, 'statistic', 'finance', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (121, '统计分析', 0, 'statistic', 'init', '', 'fa fa-area-chart', 0, 1);
INSERT INTO `admin_priv` VALUES (122, '订单统计', 121, 'statistic', 'order', '', '', 0, 1);

-- ----------------------------
-- Table structure for admin_role
-- ----------------------------
DROP TABLE IF EXISTS `admin_role`;
CREATE TABLE `admin_role`  (
  `roleid` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rolename` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '角色名',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '角色描述',
  `disabled` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否可用（1禁用 0可用 默认为0）',
  PRIMARY KEY (`roleid`) USING BTREE,
  INDEX `disabled`(`disabled`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '管理员角色表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_role
-- ----------------------------
INSERT INTO `admin_role` VALUES (1, '超级管理员', '超级管理员', 0);
INSERT INTO `admin_role` VALUES (10, '总经办', '超级管理员', 0);
INSERT INTO `admin_role` VALUES (11, '运营部', '', 0);

-- ----------------------------
-- Table structure for admin_role_priv
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_priv`;
CREATE TABLE `admin_role_priv`  (
  `roleid` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '角色id（对应happy_admin_role表中的roleid）',
  `privid` tinyint(3) NOT NULL DEFAULT 0 COMMENT '权限节点',
  INDEX `roleid`(`roleid`, `privid`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '管理员后台操作权限表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of admin_role_priv
-- ----------------------------
INSERT INTO `admin_role_priv` VALUES (0, 22);
INSERT INTO `admin_role_priv` VALUES (1, 1);
INSERT INTO `admin_role_priv` VALUES (1, 2);
INSERT INTO `admin_role_priv` VALUES (1, 3);
INSERT INTO `admin_role_priv` VALUES (1, 4);
INSERT INTO `admin_role_priv` VALUES (1, 22);
INSERT INTO `admin_role_priv` VALUES (1, 23);
INSERT INTO `admin_role_priv` VALUES (1, 24);
INSERT INTO `admin_role_priv` VALUES (1, 44);
INSERT INTO `admin_role_priv` VALUES (1, 50);
INSERT INTO `admin_role_priv` VALUES (1, 51);
INSERT INTO `admin_role_priv` VALUES (1, 93);
INSERT INTO `admin_role_priv` VALUES (1, 95);
INSERT INTO `admin_role_priv` VALUES (1, 96);
INSERT INTO `admin_role_priv` VALUES (1, 98);
INSERT INTO `admin_role_priv` VALUES (1, 99);
INSERT INTO `admin_role_priv` VALUES (1, 100);
INSERT INTO `admin_role_priv` VALUES (1, 102);
INSERT INTO `admin_role_priv` VALUES (1, 103);
INSERT INTO `admin_role_priv` VALUES (1, 106);
INSERT INTO `admin_role_priv` VALUES (1, 107);
INSERT INTO `admin_role_priv` VALUES (1, 108);
INSERT INTO `admin_role_priv` VALUES (1, 109);
INSERT INTO `admin_role_priv` VALUES (1, 111);
INSERT INTO `admin_role_priv` VALUES (1, 112);
INSERT INTO `admin_role_priv` VALUES (1, 113);
INSERT INTO `admin_role_priv` VALUES (1, 114);
INSERT INTO `admin_role_priv` VALUES (1, 115);
INSERT INTO `admin_role_priv` VALUES (1, 116);
INSERT INTO `admin_role_priv` VALUES (1, 117);
INSERT INTO `admin_role_priv` VALUES (1, 121);
INSERT INTO `admin_role_priv` VALUES (1, 122);
INSERT INTO `admin_role_priv` VALUES (1, 123);
INSERT INTO `admin_role_priv` VALUES (10, 1);
INSERT INTO `admin_role_priv` VALUES (10, 2);
INSERT INTO `admin_role_priv` VALUES (10, 3);
INSERT INTO `admin_role_priv` VALUES (10, 4);
INSERT INTO `admin_role_priv` VALUES (10, 22);
INSERT INTO `admin_role_priv` VALUES (10, 23);
INSERT INTO `admin_role_priv` VALUES (10, 24);
INSERT INTO `admin_role_priv` VALUES (10, 44);
INSERT INTO `admin_role_priv` VALUES (10, 50);
INSERT INTO `admin_role_priv` VALUES (10, 51);
INSERT INTO `admin_role_priv` VALUES (10, 93);
INSERT INTO `admin_role_priv` VALUES (10, 95);
INSERT INTO `admin_role_priv` VALUES (10, 96);
INSERT INTO `admin_role_priv` VALUES (10, 98);
INSERT INTO `admin_role_priv` VALUES (10, 99);
INSERT INTO `admin_role_priv` VALUES (10, 100);
INSERT INTO `admin_role_priv` VALUES (10, 102);
INSERT INTO `admin_role_priv` VALUES (10, 103);
INSERT INTO `admin_role_priv` VALUES (10, 106);
INSERT INTO `admin_role_priv` VALUES (10, 107);
INSERT INTO `admin_role_priv` VALUES (10, 108);
INSERT INTO `admin_role_priv` VALUES (10, 109);
INSERT INTO `admin_role_priv` VALUES (10, 111);
INSERT INTO `admin_role_priv` VALUES (10, 112);
INSERT INTO `admin_role_priv` VALUES (10, 113);
INSERT INTO `admin_role_priv` VALUES (10, 114);
INSERT INTO `admin_role_priv` VALUES (10, 115);
INSERT INTO `admin_role_priv` VALUES (10, 116);
INSERT INTO `admin_role_priv` VALUES (11, 1);
INSERT INTO `admin_role_priv` VALUES (11, 2);
INSERT INTO `admin_role_priv` VALUES (11, 3);
INSERT INTO `admin_role_priv` VALUES (11, 4);
INSERT INTO `admin_role_priv` VALUES (11, 22);
INSERT INTO `admin_role_priv` VALUES (11, 23);
INSERT INTO `admin_role_priv` VALUES (11, 24);
INSERT INTO `admin_role_priv` VALUES (11, 44);
INSERT INTO `admin_role_priv` VALUES (11, 50);
INSERT INTO `admin_role_priv` VALUES (11, 51);
INSERT INTO `admin_role_priv` VALUES (11, 93);
INSERT INTO `admin_role_priv` VALUES (11, 95);
INSERT INTO `admin_role_priv` VALUES (11, 96);
INSERT INTO `admin_role_priv` VALUES (11, 97);
INSERT INTO `admin_role_priv` VALUES (11, 98);
INSERT INTO `admin_role_priv` VALUES (11, 99);
INSERT INTO `admin_role_priv` VALUES (11, 100);
INSERT INTO `admin_role_priv` VALUES (11, 102);
INSERT INTO `admin_role_priv` VALUES (11, 103);
INSERT INTO `admin_role_priv` VALUES (11, 106);
INSERT INTO `admin_role_priv` VALUES (11, 107);
INSERT INTO `admin_role_priv` VALUES (11, 108);
INSERT INTO `admin_role_priv` VALUES (11, 109);
INSERT INTO `admin_role_priv` VALUES (11, 110);
INSERT INTO `admin_role_priv` VALUES (11, 111);
INSERT INTO `admin_role_priv` VALUES (11, 112);
INSERT INTO `admin_role_priv` VALUES (11, 113);
INSERT INTO `admin_role_priv` VALUES (11, 114);
INSERT INTO `admin_role_priv` VALUES (11, 115);
INSERT INTO `admin_role_priv` VALUES (11, 116);
INSERT INTO `admin_role_priv` VALUES (11, 117);
INSERT INTO `admin_role_priv` VALUES (11, 121);
INSERT INTO `admin_role_priv` VALUES (11, 122);
INSERT INTO `admin_role_priv` VALUES (11, 123);

-- ----------------------------
-- Table structure for attention
-- ----------------------------
DROP TABLE IF EXISTS `attention`;
CREATE TABLE `attention`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `attended_id` int(11) NOT NULL DEFAULT 0 COMMENT '被关注者',
  `attention_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '关注者',
  `time` int(11) NOT NULL DEFAULT 0,
  `status` int(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1关注',
  `mutual` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0单向关注 1互相关注',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 263 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '关注表' ROW_FORMAT = FIXED;

-- ----------------------------
-- Records of attention
-- ----------------------------

-- ----------------------------
-- Table structure for bank
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '银行卡' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bank
-- ----------------------------

-- ----------------------------
-- Table structure for bind_info
-- ----------------------------
DROP TABLE IF EXISTS `bind_info`;
CREATE TABLE `bind_info`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `userid` int(11) NOT NULL COMMENT '用户id',
  `type` tinyint(1) NOT NULL COMMENT '0：手机号，1,邮箱',
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `delete` tinyint(1) NOT NULL COMMENT '0 未删除 1删除',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '用户手机及邮箱验证表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bind_info
-- ----------------------------

-- ----------------------------
-- Table structure for bonus_type
-- ----------------------------
DROP TABLE IF EXISTS `bonus_type`;
CREATE TABLE `bonus_type`  (
  `type_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '红包类型流水号',
  `type_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '红包名称',
  `type_money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '红包所值的金额',
  `send_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '红包发送类型.0 卡卷',
  `min_amount` decimal(10, 2) UNSIGNED NOT NULL DEFAULT 0.00 COMMENT '如果是按金额发送红包,该项是最小金额.即只要购买超过该金额的商品都可以领到红包',
  `max_amount` decimal(10, 2) UNSIGNED NOT NULL DEFAULT 0.00,
  `send_start_date` int(11) NOT NULL DEFAULT 0 COMMENT '红包发送的开始时间',
  `send_end_date` int(11) NOT NULL DEFAULT 0 COMMENT '红包发送的结束时间',
  `use_start_date` int(11) NOT NULL DEFAULT 0 COMMENT '红包可以使用的开始时间',
  `use_end_date` int(11) NOT NULL DEFAULT 0 COMMENT '红包可以使用的结束时间',
  `min_goods_amount` decimal(10, 2) UNSIGNED NOT NULL DEFAULT 0.00 COMMENT '可以使用该红包的商品的最低价格.即只要达到该价格的商品才可以使用红包',
  `use_type` tinyint(3) NOT NULL COMMENT '0:不支持并用，1：支持并用',
  `build_action` tinyint(3) NOT NULL COMMENT '生成方式 0 同一暗号 1 凭不同的促销码',
  `sign` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'build_action等于0时代表暗号，1时代表以什么开头',
  `num` int(10) NOT NULL COMMENT 'build_action是1的时候代表促销码位数',
  PRIMARY KEY (`type_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '红包类型表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bonus_type
-- ----------------------------

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment`  (
  `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `seller_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '咨询师id',
  `order_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '订单id',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '详细描述',
  `add_time` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `professional` tinyint(1) UNSIGNED NOT NULL DEFAULT 5 COMMENT '专业程度',
  `attitude` tinyint(1) UNSIGNED NOT NULL DEFAULT 5 COMMENT '服务态度',
  `effect` tinyint(1) UNSIGNED NOT NULL DEFAULT 5 COMMENT '办事效率',
  `tagids` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1.显示  0不显示',
  `is_hot` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1热门评论',
  `goods_id` int(11) NOT NULL COMMENT '商品id',
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'IP',
  `star_level` tinyint(1) NOT NULL COMMENT '星级 ',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '地址',
  `goods_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品名称',
  PRIMARY KEY (`comment_id`) USING BTREE,
  INDEX `id_value`(`order_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1956 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '订单评论表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of comment
-- ----------------------------

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '配置项（包括网站基本信息、邮箱配置、短信平台配置）',
  `value` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '配置项的值（存放配置项所有的值组成的数组，转化为的字符串）',
  `lang` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '汉语（方便阅读理解）',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 81 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '网站信息配置表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of config
-- ----------------------------

-- ----------------------------
-- Table structure for enter_category
-- ----------------------------
DROP TABLE IF EXISTS `enter_category`;
CREATE TABLE `enter_category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '类目名称',
  `parent_id` int(11) NOT NULL COMMENT '上级类目ID',
  `level` tinyint(1) NOT NULL COMMENT '级别',
  `multiple` tinyint(1) NOT NULL COMMENT '是否可以多选 0为单选 1为多选',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态 1为开启',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 140 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '入驻类目' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of enter_category
-- ----------------------------

-- ----------------------------
-- Table structure for feedback
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1是来访者反馈 2是咨询师反馈',
  `disable` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0显示  1不显示',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 54 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '反馈建议表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of feedback
-- ----------------------------

-- ----------------------------
-- Table structure for frozen_account
-- ----------------------------
DROP TABLE IF EXISTS `frozen_account`;
CREATE TABLE `frozen_account`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shopid` int(11) NOT NULL COMMENT '服务商id',
  `money` decimal(10, 2) NOT NULL COMMENT '冻结金额',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `order_id` int(11) NOT NULL COMMENT '订单ID',
  `order_sn` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '订单编号',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci COMMENT = '冻结余额表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of frozen_account
-- ----------------------------

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL COMMENT '登录用户的身份id',
  `product_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '产品名称',
  `product_image` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '公司简介',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NULL DEFAULT NULL COMMENT '更新(修改)时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '产品表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of goods
-- ----------------------------

-- ----------------------------
-- Table structure for goods_news
-- ----------------------------
DROP TABLE IF EXISTS `goods_news`;
CREATE TABLE `goods_news`  (
  `goods_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = FIXED;

-- ----------------------------
-- Records of goods_news
-- ----------------------------

-- ----------------------------
-- Table structure for keywords
-- ----------------------------
DROP TABLE IF EXISTS `keywords`;
CREATE TABLE `keywords`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `searchengine` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `keyword` varchar(90) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `count` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `create_date` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `searchengine`, `keyword`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 20160719 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '平台关键词表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of keywords
-- ----------------------------

-- ----------------------------
-- Table structure for loginkey
-- ----------------------------
DROP TABLE IF EXISTS `loginkey`;
CREATE TABLE `loginkey`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mobile` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `authkey` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 709 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of loginkey
-- ----------------------------

-- ----------------------------
-- Table structure for members1
-- ----------------------------
DROP TABLE IF EXISTS `members1`;
CREATE TABLE `members1`  (
  `userid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '会员id',
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '账号名',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码，加密方式为：明码md5得到的结果后面拼接上加密秘钥（encrypt），最后在md5',
  `encrypt` char(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '秘钥（六位的随机字母）',
  `birthday` int(11) NOT NULL COMMENT '生日',
  `sex` tinyint(1) NOT NULL DEFAULT 0 COMMENT '性别 0保密 1男 2女',
  `realname` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '真实姓名',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '邮箱',
  `emailauth` tinyint(1) NOT NULL COMMENT '0:未认证;1已认证',
  `skype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'skype',
  `qq` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `education` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '最高学历：0 初中 1 高中 2 大专 3本科 4硕士 5博士 6其他',
  `trade` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `profession` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '职业',
  `region_id` int(11) NOT NULL COMMENT '地区id',
  `mobile` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:客户;2:服务商',
  `register_time` int(11) NOT NULL COMMENT '注册时间（时间戳）',
  `register_ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '注册IP',
  `login_time` int(11) NOT NULL COMMENT '上次登陆时间（时间戳）',
  `login_ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '上次登陆IP',
  `login_count` int(11) NOT NULL DEFAULT 0 COMMENT '总计登陆次数',
  `disabled` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1账号禁用 0正常使用',
  `subAccountSid` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '云通讯子账户Id',
  `subToken` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '云通讯子账户的授权令牌',
  `dateCreated` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '云通讯子账户的创建时间',
  `voipAccount` varchar(14) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '云通讯VoIP号码',
  `voipPwd` char(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '云通讯VoIP密码',
  `online` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0 不在线 1在线',
  `money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '钱包',
  `shop_contact` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '商铺联系人',
  `contact_number` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '商铺的联系方式',
  `shop_address` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '商铺的详细地址',
  `sort` tinyint(6) NOT NULL,
  `addtime` datetime NULL DEFAULT '2017-10-23 13:46:53' COMMENT '修理厂入驻平台时间',
  `rtype` tinyint(1) NOT NULL DEFAULT 2 COMMENT '用户类型 {1:签约用户,2:注册用户,3:内部用户,4:注册修理厂}',
  `isexamine` tinyint(2) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0:默认,1:审核通过,2:审核失败,3:待审核状态',
  `login_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '登录验签码',
  `issuppliers` smallint(1) NOT NULL DEFAULT 0 COMMENT '是否为供货商:0默认不是,1是',
  `company` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '公司',
  `post` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '职务',
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '头像',
  `wechat` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '微信号',
  `company_addr` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '公司地址',
  `company_province` int(11) NULL DEFAULT NULL COMMENT '公司所在省',
  `company_city` int(11) NULL DEFAULT NULL COMMENT '公司所在市',
  `company_area` int(11) NULL DEFAULT NULL COMMENT '公司所在区',
  `order_num` int(11) NOT NULL DEFAULT 0 COMMENT '订单数',
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 245 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '账户主表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of members1
-- ----------------------------
INSERT INTO `members1` VALUES (12, '153****5719', 'd2a933660afaad4092e97d6a0f684ff6', 'ncLmgT', 0, 0, '张三', '', 0, '', '', '', '', '', 0, '15371715719', 1, 1529748064, '101.87.3.36', 1711116853, '192.168.31.195', 0, 0, '', '', '', '', '', 0, 0.00, '', '', '', 0, '2017-10-23 13:46:53', 2, 0, '', 0, '', '', '', '', NULL, NULL, NULL, NULL, 0);
INSERT INTO `members1` VALUES (241, '18621153185', '65313bd486ffc8eb4d9aecaebeee4e19', 'jcYQxz', 0, 0, '上海章大牛企业管理有限公司', '28586585@qq.com', 0, '', '', '', '', '', 0, '18621153185', 2, 1530271458, '101.87.3.36', 1710895800, '112.2.149.76', 0, 0, '', '', '', '', '', 0, 76970.05, '', '', '', 100, '2017-10-23 13:46:53', 2, 0, '', 0, '唧唧', 'vh556', '', '', NULL, 10, 109, 1215, 0);

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message`  (
  `messageid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '消息id',
  `send_from_id` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '发送者会员id（happy_users表中的userid）',
  `send_to_id` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '接收者会员id（happy_users表中的userid）',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0没看，1已看',
  `message_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '发送消息时间（时间戳）',
  `subject` char(80) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '信息标题',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '消息内容',
  `replyid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '回复消息id（happy_message表中的messageid）',
  `type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0个人消息 1交易消息',
  PRIMARY KEY (`messageid`) USING BTREE,
  INDEX `msgtoid`(`send_to_id`) USING BTREE,
  INDEX `replyid`(`replyid`) USING BTREE,
  INDEX `folder`(`send_from_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 108 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户中心消息表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of message
-- ----------------------------

-- ----------------------------
-- Table structure for message_data
-- ----------------------------
DROP TABLE IF EXISTS `message_data`;
CREATE TABLE `message_data`  (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '系统消息查看统计表',
  `userid` mediumint(8) NOT NULL COMMENT '用户id',
  `group_message_id` int(5) NOT NULL COMMENT '系统消息id',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `message`(`userid`, `group_message_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 145 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '系统消息查看统计表' ROW_FORMAT = FIXED;

-- ----------------------------
-- Records of message_data
-- ----------------------------

-- ----------------------------
-- Table structure for message_group
-- ----------------------------
DROP TABLE IF EXISTS `message_group`;
CREATE TABLE `message_group`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `groupid` tinyint(4) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1给来访者  2给咨询师',
  `subject` char(80) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '标题',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '内容',
  `inputtime` int(10) UNSIGNED NULL DEFAULT 0 COMMENT '发送时间（时间戳）',
  `status` tinyint(2) UNSIGNED NULL DEFAULT 1 COMMENT '为1的时候，会员才可以查看',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '系统消息表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of message_group
-- ----------------------------

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '文章所属栏目id（对应happy_category中的catid）',
  `userid` mediumint(6) NOT NULL DEFAULT 0 COMMENT '前台用户id',
  `adminid` mediumint(6) NOT NULL DEFAULT 0 COMMENT '后台管理员id',
  `title` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题',
  `style` char(24) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题样式',
  `thumb` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '缩略图',
  `keywords` char(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '关键词',
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '描述',
  `content` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `listorder` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT 1 COMMENT '0草稿   1发布  2未发布',
  `recommend` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1推荐 ',
  `top` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1置顶 0不置顶',
  `copyfrom` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '文章来源',
  `islink` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否是外链文章（0否 1是 默认为0）',
  `url` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '外链url',
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '访问次数',
  `inputtime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '添加文章时间（时间戳）',
  `updatetime` int(10) NOT NULL COMMENT '更新文章时间（时间戳）',
  `publishtime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '发布文章时间（时间戳）',
  `isdel` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1为删除',
  `isshow` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1为显示',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `status`(`status`, `listorder`, `id`) USING BTREE,
  INDEX `listorder`(`catid`, `status`, `listorder`, `id`) USING BTREE,
  INDEX `catid`(`catid`, `status`, `id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 116 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = 'CMS文章表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for news_category
-- ----------------------------
DROP TABLE IF EXISTS `news_category`;
CREATE TABLE `news_category`  (
  `catid` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1：栏目\r\n2：列表\r\n3：链接',
  `parentid` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `catname` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ismenu` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1显示 0不显示',
  `keywords` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `listorder` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `disabled` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1可用 0禁用',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '链接',
  PRIMARY KEY (`catid`) USING BTREE,
  INDEX `module`(`parentid`, `listorder`, `catid`) USING BTREE,
  INDEX `siteid`(`type`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 44 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '栏目表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of news_category
-- ----------------------------

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment`  (
  `pay_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pay_name` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pay_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '支付方式描述',
  `pay_fee` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手续费用',
  `config` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '支付配置',
  `disabled` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否可用 0.可用 1.禁用',
  `author` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '开发者',
  `sort` mediumint(9) NOT NULL DEFAULT 0 COMMENT '排序：值越大，权重越大',
  `client_type` tinyint(1) NULL DEFAULT 0 COMMENT '客户端类型：0，PC端；1，APP端；2，Wap/H5端',
  PRIMARY KEY (`pay_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '支付方式' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of payment
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `product_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '咨询师会员id',
  `start_time` int(10) NOT NULL COMMENT '开始咨询时间',
  `end_time` int(10) NOT NULL COMMENT '结束咨询时间',
  `product_sn` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `product_number` smallint(5) NULL DEFAULT 0,
  PRIMARY KEY (`product_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2903 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商铺库存表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of products
-- ----------------------------

-- ----------------------------
-- Table structure for region
-- ----------------------------
DROP TABLE IF EXISTS `region`;
CREATE TABLE `region`  (
  `region_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `region_name` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `region_type` tinyint(1) NOT NULL DEFAULT 2,
  `agency_id` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `hf_address_id` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '汇付天下地址id',
  `desc` int(10) NOT NULL DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`region_id`) USING BTREE,
  INDEX `parent_id`(`parent_id`) USING BTREE,
  INDEX `region_type`(`region_type`) USING BTREE,
  INDEX `agency_id`(`agency_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4049 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '邮政地址管理表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of region
-- ----------------------------

-- ----------------------------
-- Table structure for remind
-- ----------------------------
DROP TABLE IF EXISTS `remind`;
CREATE TABLE `remind`  (
  `userid` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '会员id',
  `okcancelsms` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '成功或取消咨询短信提醒',
  `twohoursms` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '咨询前2小时短信提醒',
  `twentyminutesms` tinyint(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0 COMMENT '咨询前20分钟短信提醒',
  `okcancelemail` tinyint(1) NOT NULL DEFAULT 0 COMMENT '预约咨询成功邮件提醒',
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '会员提醒设置' ROW_FORMAT = FIXED;

-- ----------------------------
-- Records of remind
-- ----------------------------

-- ----------------------------
-- Table structure for repair_picture
-- ----------------------------
DROP TABLE IF EXISTS `repair_picture`;
CREATE TABLE `repair_picture`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '图片自增id',
  `rid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '修理厂用户id',
  `picture` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '修理厂用户门头照',
  `thumb` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '修理厂用户门头照缩略图',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 380 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '买家门店照片表' ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of repair_picture
-- ----------------------------

-- ----------------------------
-- Table structure for resource
-- ----------------------------
DROP TABLE IF EXISTS `resource`;
CREATE TABLE `resource`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `filename` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '附件名称',
  `filesize` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '附件大小',
  `fileext` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '附件扩展名',
  `uploadtime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '上传时间',
  `originname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '附件真实名',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 72 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'CMS上传资源清单表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of resource
-- ----------------------------

-- ----------------------------
-- Table structure for seller_certificate
-- ----------------------------
DROP TABLE IF EXISTS `seller_certificate`;
CREATE TABLE `seller_certificate`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `userid` int(11) NOT NULL COMMENT '咨询师id',
  `number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '证书编号/专业',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '证书标题/学历',
  `get_time` int(11) NOT NULL COMMENT '证书获得时间',
  `institution` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '培训机构/大学',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '证书照片',
  `add_time` int(255) NOT NULL COMMENT '证书添加时间',
  `authority` tinyint(4) NOT NULL COMMENT '0:未认证;1已认证 2拒绝通过',
  `type` tinyint(1) NOT NULL COMMENT '0 证书 1最高学历',
  `refuse_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '拒绝通过的理由',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 27 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '商铺审核证书表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of seller_certificate
-- ----------------------------

-- ----------------------------
-- Table structure for seller_image
-- ----------------------------
DROP TABLE IF EXISTS `seller_image`;
CREATE TABLE `seller_image`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `userid` int(11) NOT NULL COMMENT '用户id',
  `type` tinyint(1) NOT NULL COMMENT '照片类型 0:身份证认证照片 1:形象照片',
  `filename` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '上传文件名',
  `time` int(11) NOT NULL COMMENT '文件生成时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 53 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '商铺图册表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of seller_image
-- ----------------------------

-- ----------------------------
-- Table structure for seller_profile
-- ----------------------------
DROP TABLE IF EXISTS `seller_profile`;
CREATE TABLE `seller_profile`  (
  `userid` int(11) UNSIGNED NOT NULL COMMENT '咨询师id',
  `starid` smallint(3) NOT NULL DEFAULT 0 COMMENT '星级',
  `experience` int(11) NOT NULL COMMENT '经验',
  `idno` char(18) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '身份证号码',
  `authority` tinyint(1) NOT NULL DEFAULT 2 COMMENT '0:未认证；1认证失败; 2已认证',
  `introduction` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '个性介绍',
  `sign` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '个性签名',
  `skill` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '擅长技能',
  `speciality` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '擅长领域',
  `hobby` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '爱好',
  `add_time` int(11) NOT NULL COMMENT '申请认证时间',
  `is_hot` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1热门咨询师',
  `reg_step` tinyint(1) NOT NULL DEFAULT 0,
  `shop_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0:商家；1:自营',
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商铺信息扩展表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of seller_profile
-- ----------------------------

-- ----------------------------
-- Table structure for sendemail
-- ----------------------------
DROP TABLE IF EXISTS `sendemail`;
CREATE TABLE `sendemail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '发送者邮箱',
  `sendtime` int(11) NOT NULL COMMENT '发送时间（时间戳）',
  `stats` int(11) NOT NULL DEFAULT 0 COMMENT '0未使用 1已使用',
  `recipient` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '接收者邮箱',
  `content` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '短信内容',
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '验证码',
  `sendtype` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 验证邮箱',
  `checktime` int(11) NOT NULL DEFAULT 0 COMMENT '验证码验证时间（时间戳）',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '邮件发送记录表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sendemail
-- ----------------------------

-- ----------------------------
-- Table structure for sendsms
-- ----------------------------
DROP TABLE IF EXISTS `sendsms`;
CREATE TABLE `sendsms`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '结束短信的手机号',
  `sendtime` int(11) NOT NULL COMMENT '发送时间（时间戳）',
  `stats` int(11) NOT NULL DEFAULT 0 COMMENT '0未使用 1已使用 默认为0',
  `supplier` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '短信平台供应商名',
  `content` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '短信内容',
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '验证码',
  `sendtype` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '1' COMMENT 'type为1发送登录短信，type为2发送找回密码短信,type为3发送更换老手机手机短信, type为4发送更换新手机手机短信，type为5发送注册短信卡,200为其他',
  `checktime` int(11) NOT NULL COMMENT '验证码验证时间（时间戳）',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 220 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '短信表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sendsms
-- ----------------------------
INSERT INTO `sendsms` VALUES (219, '15371715719', 1711115885, 0, '阿里云', '5660', '5660', '1', 0);

-- ----------------------------
-- Table structure for shop_ads
-- ----------------------------
DROP TABLE IF EXISTS `shop_ads`;
CREATE TABLE `shop_ads`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL COMMENT '登录用户的身份id',
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '广告名称',
  `ads_image` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商铺广告图片',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NULL DEFAULT NULL COMMENT '更新(修改)时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 87 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '产品表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_ads
-- ----------------------------

-- ----------------------------
-- Table structure for sms_tpl
-- ----------------------------
DROP TABLE IF EXISTS `sms_tpl`;
CREATE TABLE `sms_tpl`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `content` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '邮件内容',
  `note` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '说明',
  `date_added` int(11) NOT NULL,
  `date_updated` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id_langid_index`(`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '邮件模板表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sms_tpl
-- ----------------------------

-- ----------------------------
-- Table structure for star
-- ----------------------------
DROP TABLE IF EXISTS `star`;
CREATE TABLE `star`  (
  `starid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `starname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `low` smallint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '最低经验值',
  `high` smallint(3) NOT NULL DEFAULT 0 COMMENT '高经验值',
  `price` float(8, 2) NOT NULL DEFAULT 0.00 COMMENT '星级报价',
  PRIMARY KEY (`starid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商铺星级表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of star
-- ----------------------------

-- ----------------------------
-- Table structure for supplier_brand
-- ----------------------------
DROP TABLE IF EXISTS `supplier_brand`;
CREATE TABLE `supplier_brand`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shopid` int(11) NOT NULL DEFAULT 0 COMMENT '供货商id',
  `brandname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '管理品牌信息',
  `parentid` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父级公司id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '供货商品牌关系表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of supplier_brand
-- ----------------------------

-- ----------------------------
-- Table structure for tag
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag`  (
  `tagid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `tagname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `catid` smallint(5) NOT NULL COMMENT '标签所属分类ID',
  `ishot` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否是热门标签',
  `listorder` tinyint(5) NOT NULL DEFAULT 0,
  PRIMARY KEY (`tagid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '标签表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tag
-- ----------------------------

-- ----------------------------
-- Table structure for tag_category
-- ----------------------------
DROP TABLE IF EXISTS `tag_category`;
CREATE TABLE `tag_category`  (
  `catid` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `catname` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标签分类名',
  `listorder` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`catid`) USING BTREE,
  INDEX `sort_order`(`listorder`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '标签分类表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tag_category
-- ----------------------------

-- ----------------------------
-- Table structure for tyw_news
-- ----------------------------
DROP TABLE IF EXISTS `tyw_news`;
CREATE TABLE `tyw_news`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL COMMENT '用户身份id',
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '新闻标题',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '新闻内容',
  `image` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '新闻图片',
  `add_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '新闻表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tyw_news
-- ----------------------------

-- ----------------------------
-- Table structure for user_account
-- ----------------------------
DROP TABLE IF EXISTS `user_account`;
CREATE TABLE `user_account`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `admin_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '操作该笔交易的管理员的用户名',
  `amount` decimal(10, 2) NOT NULL COMMENT '资金数目，正数为增加，负数为减少也就是提现',
  `add_time` int(10) NOT NULL DEFAULT 0 COMMENT '记录插入时间',
  `paid_time` int(10) NOT NULL DEFAULT 0 COMMENT '管理员确认时间',
  `admin_note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '管理员备注',
  `user_note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '会员备注',
  `account` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '支付账户名',
  `realname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户真实姓名',
  `payment` varchar(90) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '支付管道名称',
  `is_paid` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否已经付款：0未付；1支付',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `is_paid`(`is_paid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '订单支付表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_account
-- ----------------------------

-- ----------------------------
-- Table structure for user_address
-- ----------------------------
DROP TABLE IF EXISTS `user_address`;
CREATE TABLE `user_address`  (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT '用户详情id',
  `userid` int(11) NOT NULL COMMENT '修理厂用户id',
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '修理厂收货用户地址',
  `full_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '修理厂收货用户姓名',
  `telphone` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '修理厂收货用户电话号码',
  `isdefault` tinyint(1) NULL DEFAULT 0 COMMENT '是否设为默认地址: 0表示不默认,1表示默认',
  `province_id` int(11) NULL DEFAULT 0 COMMENT '省份id',
  `city_id` int(11) NULL DEFAULT 0 COMMENT '市区id',
  `county_id` int(11) NULL DEFAULT 0 COMMENT '县区id',
  `area` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '区域：省-市-县',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 87 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '修理厂用户地址表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_address
-- ----------------------------

-- ----------------------------
-- Table structure for user_bank
-- ----------------------------
DROP TABLE IF EXISTS `user_bank`;
CREATE TABLE `user_bank`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `realname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '真实姓名',
  `idno` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `account` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '账号',
  `accountname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '账号名',
  `type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '账号类型 0 支付宝 1银行卡',
  `is_used` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否可用 0 不可用 1可用',
  `bankid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'type=1时 存放银行id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '会员银行卡设置表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_bank
-- ----------------------------

-- ----------------------------
-- Table structure for user_bonus
-- ----------------------------
DROP TABLE IF EXISTS `user_bonus`;
CREATE TABLE `user_bonus`  (
  `bonus_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '红包的流水号',
  `bonus_type_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '红包发送类型.0,按用户如会员等级,会员名称发放;1,按商品类别发送;2,按订单金额所达到的额度发送;3,线下发送',
  `bonus_sn` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '红包号,如果为0就是没有红包号.如果大于0,就需要输入该红包号才能使用红包',
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '该红包属于某会员的id.如果为0,就是该红包不属于某会员',
  `used_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '红包使用的时间',
  `order_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '使用了该红包的交易号',
  `emailed` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '猜的，应该是是否已经将红包发送到用户的邮箱；1，是；0，否；',
  PRIMARY KEY (`bonus_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10056 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '已经发送的红包信息列表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_bonus
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
