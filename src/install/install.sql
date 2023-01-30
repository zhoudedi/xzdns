DROP TABLE IF EXISTS `xzdns_configs`;
CREATE TABLE `xzdns_configs` (
  `k` varchar(150) NOT NULL,
  `v` text,
  PRIMARY KEY (`k`),
  UNIQUE KEY `k` (`k`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `xzdns_configs` VALUES ('array_mail', '{\"host\":\"smtp.exmail.qq.com\",\"port\":\"465\",\"encryption\":\"ssl\",\"username\":\"zdd@zhoudedi.top\",\"password\":\"drgDaMVbehhuD4L\",\"test\":\"2933206697@qq.com\"}');
INSERT INTO `xzdns_configs` VALUES ('array_user', '{\"reg\":\"1\",\"email\":\"1\",\"point\":\"100\"}');
INSERT INTO `xzdns_configs` VALUES ('array_zts', '{\"zt\":\"#00dfff\"}');
INSERT INTO `xzdns_configs` VALUES ('array_qt', '{\"fhkg\":\"0\"}');
INSERT INTO `xzdns_configs` VALUES ('array_web', '{\"name\":\"\\u5c0f\\u5468\\u4e8c\\u7ea7\\u57df\\u540d\\u5206\\u53d1\",\"title\":\"\\u5c0f\\u5468\\u4e8c\\u7ea7\\u57df\\u540d\\u5206\\u53d1 - \\u514d\\u8d39\\u4e8c\\u7ea7\\u57df\\u540d\\u6ce8\\u518c\",\"keywords\":\"\\u5c0f\\u5468\\u4e8c\\u7ea7\\u57df\\u540d\\u5206\\u53d1,\\u514d\\u8d39\\u57df\\u540d,\\u514d\\u8d39\\u4e8c\\u7ea7\\u57df\\u540d,\\u514d\\u8d39\\u5907\\u6848\\u57df\\u540d\",\"description\":\"\\u5c0f\\u5468\\u4e8c\\u7ea7\\u57df\\u540d\\u5206\\u53d1\\u7cfb\\u7edf\\uff0c\\u63d0\\u4f9b\\u514d\\u8d39\\u4e8c\\u7ea7\\u57df\\u540d\\u5206\\u53d1\",\"yzfid\":\"1\",\"yzfmy\":\"bUGZgko5XKD5vdF3c733zXPGB5kuNKF\"}');
INSERT INTO `xzdns_configs` VALUES ('html_header', '<div class=\"alert alert-primary\">\r\n需要使用ddns，ddns-go的用户联系我给你们秘钥。本站提供免费二级域名用于测试、学习等，请勿将二级域名用于一切非法用途，一切责任自负！\r\n</div>');
INSERT INTO `xzdns_configs` VALUES ('html_home', '需要使用ddns，ddns-go的用户联系我给你们秘钥。本站提供免费二级域名用于测试、学习等，请勿将二级域名用于一切非法用途，一切责任自负！');
INSERT INTO `xzdns_configs` VALUES ('html_kefu', 'http://wpa.qq.com/msgrd?v=3&uin=2933206697&site=qq&menu=yes');
INSERT INTO `xzdns_configs` VALUES ('html_bjt', '/images/tx.png');
INSERT INTO `xzdns_configs` VALUES ('html_mb', 'index');
INSERT INTO `xzdns_configs` VALUES ('html_yh', '1');
INSERT INTO `xzdns_configs` VALUES ('index_urls', '小周导航|https://dh.zhoudedi.top/\r\n联系站长|http://wpa.qq.com/msgrd?v=3&uin=2933206697&site=qq&menu=yes');
INSERT INTO `xzdns_configs` VALUES ('reserve_domain_name', 'www,w,m,3g,4g,qq');
DROP TABLE IF EXISTS `xzdns_dns_configs`;
CREATE TABLE `xzdns_dns_configs` (
  `dns` varchar(150) NOT NULL,
  `config` varchar(1024) DEFAULT NULL,
  `created_at` int(10) unsigned DEFAULT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`dns`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `xzdns_domain_records`;
CREATE TABLE `xzdns_domain_records` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `did` int(11) unsigned NOT NULL DEFAULT '0',
  `record_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(32) NOT NULL,
  `value` varchar(255) NOT NULL,
  `line_id` varchar(32) NOT NULL DEFAULT '0',
  `line` varchar(255) DEFAULT NULL,
  `created_at` int(10) unsigned DEFAULT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  `checked_at` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `record_id` (`record_id`),
  KEY `did` (`did`),
  KEY `name` (`name`,`type`),
  KEY `checked_at` (`checked_at`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `xzdns_domains`;
CREATE TABLE `xzdns_domains` (
  `did` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dns` varchar(32) NOT NULL,
  `domain_id` varchar(50) NOT NULL,
  `domain` varchar(50) NOT NULL,
  `groups` varchar(1024) NOT NULL DEFAULT '0',
  `point` int(10) unsigned NOT NULL DEFAULT '0',
  `desc` text,
  `created_at` int(10) unsigned DEFAULT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`did`),
  KEY `domain` (`domain`),
  KEY `domain_id` (`domain_id`),
  KEY `dns` (`dns`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `xzdns_user_groups`;
CREATE TABLE `xzdns_user_groups` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` int(10) unsigned DEFAULT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
INSERT INTO `xzdns_user_groups` VALUES ('99', '管理组', '1555212209', '1555212209');
INSERT INTO `xzdns_user_groups` VALUES ('100', '默认组', '1555212209', '1555235659');
DROP TABLE IF EXISTS `xzdns_user_point_records`;
CREATE TABLE `xzdns_user_point_records` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `action` varchar(32) NOT NULL,
  `point` int(11) NOT NULL,
  `rest` int(11) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `action` (`action`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `xzdns_users`;
CREATE TABLE `xzdns_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL DEFAULT '100',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '0禁用 1待认证 2已认证',
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `sid` varchar(32) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `point` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` int(10) unsigned DEFAULT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `gid` (`gid`),
  KEY `email` (`email`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
INSERT INTO `xzdns_users` VALUES ('99', '99', '1', 'xiaozhou', '$2y$10$v9PHTvnccjua/5FlAf/uFOVPprXxdWjoS54YnjmbQGGk8vDtxk9YS', 'tn38nVWJER1r0uj3oa222roN1E0sPYCDIUZIW30Yz6hR4U3DcHZU09l4gMsZ', '21c4bc5c23819b646aff4bb3196d6de5', null, '0', '1555212209', '1555408180');
