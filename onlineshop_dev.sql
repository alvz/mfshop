
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `AuthAssignment`
-- ----------------------------
DROP TABLE IF EXISTS `AuthAssignment`;
CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`itemname`,`userid`),
  KEY `userid` (`userid`),
  CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `AuthAssignment_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of AuthAssignment
-- ----------------------------
INSERT INTO `AuthAssignment` VALUES ('admin', '1', '', 's:0:\"\";');

-- ----------------------------
-- Table structure for `AuthItem`
-- ----------------------------
DROP TABLE IF EXISTS `AuthItem`;
CREATE TABLE `AuthItem` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of AuthItem
-- ----------------------------
INSERT INTO `AuthItem` VALUES ('admin', '2', null, null, null);
INSERT INTO `AuthItem` VALUES ('member', '2', '', '', 's:0:\"\";');

-- ----------------------------
-- Table structure for `AuthItemChild`
-- ----------------------------
DROP TABLE IF EXISTS `AuthItemChild`;
CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of AuthItemChild
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_address`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_address`;
CREATE TABLE `tbl_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alley` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pelak` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tbl_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_address
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_book`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_book`;
CREATE TABLE `tbl_book` (
  `id` int(11) NOT NULL,
  `isbn` int(11) DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `pages_count` int(11) DEFAULT NULL,
  `edition` int(11) DEFAULT NULL,
  `press_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `isbn` (`isbn`),
  KEY `publisher_id` (`publisher_id`),
  CONSTRAINT `tbl_book_ibfk_3` FOREIGN KEY (`id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_book_ibfk_4` FOREIGN KEY (`publisher_id`) REFERENCES `tbl_publisher` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_book
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_comment_news`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_comment_news`;
CREATE TABLE `tbl_comment_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `comment_text` mediumtext COLLATE utf8_unicode_ci,
  `comment_time` int(11) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news_id` (`news_id`),
  CONSTRAINT `tbl_comment_news_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `tbl_news` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_comment_news
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_comment_product`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_comment_product`;
CREATE TABLE `tbl_comment_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `comment_text` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `comment_time` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `tbl_comment_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_comment_product
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_faq`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_faq`;
CREATE TABLE `tbl_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` mediumtext COLLATE utf8_unicode_ci,
  `answer` mediumtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_faq
-- ----------------------------
INSERT INTO `tbl_faq` VALUES ('1', 'How to contact?', '<p>\r\n	Please go to contact page and submit your question.</p>\r\n');
INSERT INTO `tbl_faq` VALUES ('2', 'How to pay?', 'You can pay online using your credit card or you can pay directly to the post officer who will come by.');
INSERT INTO `tbl_faq` VALUES ('3', 'How to comment?', 'You should first login to site (or register if it\'s your first visit) and then your  can comment for each product.');
INSERT INTO `tbl_faq` VALUES ('4', 'How to change address?', 'You can go to you account using the link on top-right corner of this page and change your address.');
INSERT INTO `tbl_faq` VALUES ('5', 'Question 5?', 'Answer 5');
INSERT INTO `tbl_faq` VALUES ('6', 'Question 6?', 'Answer 6.');
INSERT INTO `tbl_faq` VALUES ('7', 'question 3', '<p>\r\n	fs <span style=\"font-family:courier new,courier,monospace;\"><span style=\"background-color: rgb(255, 0, 0);\">hdfhghsldfg</span></span></p>\r\n<ol>\r\n	<li>\r\n		&nbsp;<a href=\"http://www.google.com\">kfdlh</a>;d</li>\r\n	<li>\r\n		&nbsp;fkhgl;sd</li>\r\n	<li>\r\n		&nbsp;jfdsk</li>\r\n</ol>\r\n');
INSERT INTO `tbl_faq` VALUES ('8', 'csrf', 'csrf');

-- ----------------------------
-- Table structure for `tbl_link`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_link`;
CREATE TABLE `tbl_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_link
-- ----------------------------
INSERT INTO `tbl_link` VALUES ('1', 'imdb', 'http://www.imdb.com');
INSERT INTO `tbl_link` VALUES ('2', 'Amazon', 'http://www.amazon.com');
INSERT INTO `tbl_link` VALUES ('3', 'Samandehi', 'http://www.samandehi.com');
INSERT INTO `tbl_link` VALUES ('4', 'PayPal', 'http://www.paypal.com');
INSERT INTO `tbl_link` VALUES ('5', 'Visa Card', 'http://www.visacard.com');

-- ----------------------------
-- Table structure for `tbl_lookup`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_lookup`;
CREATE TABLE `tbl_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_lookup
-- ----------------------------
INSERT INTO `tbl_lookup` VALUES ('1', 'Book', '1', 'productType', '1');
INSERT INTO `tbl_lookup` VALUES ('2', 'Video', '2', 'productType', '2');
INSERT INTO `tbl_lookup` VALUES ('3', 'Not read yet', '1', 'commentStatus', '1');
INSERT INTO `tbl_lookup` VALUES ('4', 'Read but not approved', '2', 'commentStatus', '2');
INSERT INTO `tbl_lookup` VALUES ('5', 'Approved', '3', 'commentStatus', '3');
INSERT INTO `tbl_lookup` VALUES ('6', 'Buying', '1', 'cartStatus', '1');
INSERT INTO `tbl_lookup` VALUES ('7', 'Buyed', '2', 'cartStatus', '2');
INSERT INTO `tbl_lookup` VALUES ('8', 'Pending delivery', '3', 'cartStatus', '3');
INSERT INTO `tbl_lookup` VALUES ('9', 'Delivered', '4', 'cartStatus', '4');
INSERT INTO `tbl_lookup` VALUES ('10', 'Unactive', '1', 'userStatus', '1');
INSERT INTO `tbl_lookup` VALUES ('11', 'Active', '2', 'userStatus', '2');
INSERT INTO `tbl_lookup` VALUES ('12', 'Suspended', '3', 'userStatus', '3');

-- ----------------------------
-- Table structure for `tbl_news`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_news`;
CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_text` mediumtext COLLATE utf8_unicode_ci,
  `create_time` int(11) DEFAULT NULL,
  `user_create_id` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `user_update_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_create_id` (`user_create_id`),
  KEY `user_update_id` (`user_update_id`),
  CONSTRAINT `tbl_news_ibfk_1` FOREIGN KEY (`user_create_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_news_ibfk_2` FOREIGN KEY (`user_update_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_news
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_product`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `user_create_id` int(11) DEFAULT NULL,
  `user_update_id` int(11) DEFAULT NULL,
  `off_percent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_create_id` (`user_create_id`),
  KEY `user_update_id` (`user_update_id`),
  CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`user_create_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`user_update_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_product
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_product_image`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_image`;
CREATE TABLE `tbl_product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `product_image_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `tbl_product_image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_product_image
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_publisher`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_publisher`;
CREATE TABLE `tbl_publisher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8_unicode_ci,
  `phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_publisher
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_tag`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tag`;
CREATE TABLE `tbl_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `frequency` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_tag
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_tag_news_assign`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tag_news_assign`;
CREATE TABLE `tbl_tag_news_assign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_id_tag_id_unique` (`news_id`,`tag_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `tbl_tag_news_assign_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `tbl_news` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_tag_news_assign_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tbl_tag` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_tag_news_assign
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_tag_product_assign`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tag_product_assign`;
CREATE TABLE `tbl_tag_product_assign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_id_2` (`product_id`,`tag_id`),
  KEY `tag_id` (`tag_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `tbl_tag_product_assign_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_tag_product_assign_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tbl_tag` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_tag_product_assign
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_user`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_login_time` int(11) DEFAULT NULL,
  `activation_code` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `off_percent` int(11) NOT NULL DEFAULT '0',
  `phone_number2` int(11) DEFAULT NULL,
  `cell_number` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `activation_code` (`activation_code`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@mfshop.com', 'Farid', 'Amizadeh', '1300003476', null, '2', '912', '0', null, null, '1300003476', '1300003476');

-- ----------------------------
-- Table structure for `tbl_user_cart`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user_cart`;
CREATE TABLE `tbl_user_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `final_price` int(11) DEFAULT NULL COMMENT 'Final price of each product considering off percent',
  `creation_time` int(11) NOT NULL COMMENT 'The time which a product is inserted to the user cart',
  `update_time` int(11) NOT NULL COMMENT 'The time which the user updates his selected product in his/her cart',
  `pay_time` int(11) DEFAULT NULL COMMENT 'The time which the cost of the product has been paid',
  `deliver_time` int(11) DEFAULT NULL COMMENT 'The time which the product has been delivered to the user',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `tbl_user_cart_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_user_cart_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_user_cart
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_user_image`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user_image`;
CREATE TABLE `tbl_user_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_image_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tbl_user_image_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_user_image
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_video`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_video`;
CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `format` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `tbl_video_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_video
-- ----------------------------
