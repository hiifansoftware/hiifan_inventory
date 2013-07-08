/*
SQLyog Ultimate v8.55 
MySQL - 5.5.8 : Database - inventory_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inventory_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `inventory_db`;

/*Table structure for table `cardnumber_details` */

DROP TABLE IF EXISTS `cardnumber_details`;

CREATE TABLE `cardnumber_details` (
  `cardnumber_id` int(11) NOT NULL AUTO_INCREMENT,
  `cardnumber_value` varchar(20) DEFAULT NULL,
  `cardnumber_status` enum('fresh','used') DEFAULT 'fresh',
  `cardnumber_datetime` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cardnumber_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cardnumber_details` */

/*Table structure for table `customer_details` */

DROP TABLE IF EXISTS `customer_details`;

CREATE TABLE `customer_details` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_phone` bigint(11) DEFAULT NULL,
  `customer_card_number` varchar(255) DEFAULT NULL,
  `customer_credit_avail` varchar(10) DEFAULT NULL,
  `customer_reg_date` varchar(50) DEFAULT NULL,
  `customer_dob` varchar(50) DEFAULT NULL,
  `customer_status` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `customer_details` */

/*Table structure for table `function_details` */

DROP TABLE IF EXISTS `function_details`;

CREATE TABLE `function_details` (
  `function_id` int(11) NOT NULL AUTO_INCREMENT,
  `function_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`function_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `function_details` */

/*Table structure for table `product_category_details` */

DROP TABLE IF EXISTS `product_category_details`;

CREATE TABLE `product_category_details` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_name` varchar(255) DEFAULT NULL,
  `product_category_desc` text,
  `product_category_status` enum('active','inactive') DEFAULT 'active',
  `product_category_datetime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `product_category_details` */

insert  into `product_category_details`(`product_category_id`,`product_category_name`,`product_category_desc`,`product_category_status`,`product_category_datetime`) values (1,'Product Category 1','This is the product category 1','active','1373202846'),(2,'Product Category 2','This is the Product Category 2','active','1373203211');

/*Table structure for table `product_details` */

DROP TABLE IF EXISTS `product_details`;

CREATE TABLE `product_details` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) DEFAULT NULL,
  `product_code` varchar(200) DEFAULT NULL,
  `product_price` varchar(100) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_desc` text,
  `product_status` enum('active','inactive') DEFAULT 'active',
  `product_datetime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product_details` */

/*Table structure for table `recharge_details` */

DROP TABLE IF EXISTS `recharge_details`;

CREATE TABLE `recharge_details` (
  `recharge_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `recharge_value` varchar(200) DEFAULT NULL,
  `recharge_by` enum('card','email') DEFAULT 'card',
  `recharge_datetime` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`recharge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `recharge_details` */

/*Table structure for table `setting_details` */

DROP TABLE IF EXISTS `setting_details`;

CREATE TABLE `setting_details` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` text,
  `setting_description` text,
  `setting_value` text,
  `setting_status` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `setting_details` */

insert  into `setting_details`(`setting_id`,`setting_name`,`setting_description`,`setting_value`,`setting_status`) values (1,'store_id','This is the Store Id Value on HiiFan Server','1','active');

/*Table structure for table `store_details` */

DROP TABLE IF EXISTS `store_details`;

CREATE TABLE `store_details` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `merchant_id` int(11) DEFAULT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `store_title` varchar(255) DEFAULT NULL,
  `store_tagline` varchar(255) DEFAULT NULL,
  `store_address` text,
  `store_logo` varchar(255) DEFAULT NULL,
  `store_status` enum('active','inactive') DEFAULT 'active',
  `store_datetime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `store_details` */

/*Table structure for table `store_user_details` */

DROP TABLE IF EXISTS `store_user_details`;

CREATE TABLE `store_user_details` (
  `store_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) DEFAULT NULL,
  `store_user_name` varchar(255) DEFAULT NULL,
  `store_user_password` varchar(255) DEFAULT NULL,
  `store_user_fullname` varchar(255) DEFAULT NULL,
  `store_user_status` enum('active','inactive') DEFAULT 'active',
  `store_user_type` enum('admin','user') DEFAULT 'user',
  `store_user_datetime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`store_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `store_user_details` */

insert  into `store_user_details`(`store_user_id`,`store_id`,`store_user_name`,`store_user_password`,`store_user_fullname`,`store_user_status`,`store_user_type`,`store_user_datetime`) values (3,NULL,'saurabh_sinha','ODI4Njk1c2F1cmFiaA==','Kumar Saurabh Sinha','active','admin','1371956490'),(4,NULL,'saurabh','ODIzNTA0c2F1cmFiaA==','Kumar Saurabh Sinha','inactive','user','1371956561'),(7,NULL,'admin','MjQ4MDk1YWRtaW4=','Administrator','active','admin','1371991293'),(8,NULL,'saurabh','MzEzMjcyc2F1cmFiaA==','saurabh','active','admin','1371992252');

/*Table structure for table `terminal_details` */

DROP TABLE IF EXISTS `terminal_details`;

CREATE TABLE `terminal_details` (
  `terminal_id` int(11) NOT NULL AUTO_INCREMENT,
  `terminal_name` varchar(255) DEFAULT NULL,
  `terminal_desc` text,
  `terminal_status` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`terminal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `terminal_details` */

/*Table structure for table `user_activity_details` */

DROP TABLE IF EXISTS `user_activity_details`;

CREATE TABLE `user_activity_details` (
  `user_activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_ip_address` varchar(255) DEFAULT NULL,
  `user_user_agent` text,
  `user_datetime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_activity_details` */

/*Table structure for table `user_function_details` */

DROP TABLE IF EXISTS `user_function_details`;

CREATE TABLE `user_function_details` (
  `user_function_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_rights` text,
  PRIMARY KEY (`user_function_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `user_function_details` */

insert  into `user_function_details`(`user_function_id`,`user_id`,`user_rights`) values (4,4,'a:2:{s:13:\"category_acid\";s:2:\"on\";s:9:\"user_view\";s:2:\"on\";}'),(6,3,'a:3:{s:13:\"category_edit\";s:2:\"on\";s:12:\"product_edit\";s:2:\"on\";s:8:\"user_add\";s:2:\"on\";}'),(7,7,'a:15:{s:12:\"category_add\";s:2:\"on\";s:15:\"category_delete\";s:2:\"on\";s:13:\"category_view\";s:2:\"on\";s:13:\"category_edit\";s:2:\"on\";s:13:\"category_acid\";s:2:\"on\";s:11:\"product_add\";s:2:\"on\";s:14:\"product_delete\";s:2:\"on\";s:12:\"product_view\";s:2:\"on\";s:12:\"product_edit\";s:2:\"on\";s:12:\"product_acid\";s:2:\"on\";s:8:\"user_add\";s:2:\"on\";s:11:\"user_delete\";s:2:\"on\";s:9:\"user_view\";s:2:\"on\";s:9:\"user_edit\";s:2:\"on\";s:9:\"user_acid\";s:2:\"on\";}'),(8,8,'a:3:{s:12:\"category_add\";s:2:\"on\";s:15:\"category_delete\";s:2:\"on\";s:13:\"category_edit\";s:2:\"on\";}');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
