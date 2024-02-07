/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.36-0ubuntu0.22.04.1 : Database - kresnasetiana
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kresnasetiana` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `kresnasetiana`;

/*Table structure for table `portfolio` */

DROP TABLE IF EXISTS `portfolio`;

CREATE TABLE `portfolio` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `is_best` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `portfolio` */

/*Table structure for table `portfolio_tag` */

DROP TABLE IF EXISTS `portfolio_tag`;

CREATE TABLE `portfolio_tag` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `portfolio_tag` */

/*Table structure for table `portofolio_pivot` */

DROP TABLE IF EXISTS `portofolio_pivot`;

CREATE TABLE `portofolio_pivot` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `port_id` int unsigned DEFAULT NULL,
  `tag_id` int unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `portofolio_pivot` */

/*Table structure for table `store` */

DROP TABLE IF EXISTS `store`;

CREATE TABLE `store` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int unsigned DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `desc` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `store` */

/*Table structure for table `store_cat` */

DROP TABLE IF EXISTS `store_cat`;

CREATE TABLE `store_cat` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `store_cat` */

/*Table structure for table `store_pict` */

DROP TABLE IF EXISTS `store_pict`;

CREATE TABLE `store_pict` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `idr` int DEFAULT NULL,
  `is_best` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `store_pict` */

/*Table structure for table `stories` */

DROP TABLE IF EXISTS `stories`;

CREATE TABLE `stories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int unsigned DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `stories` */

insert  into `stories`(`id`,`cat_id`,`title`,`created_at`,`updated_at`) values 
(1,2,'Made dan Putu','2024-02-07 15:04:51',NULL),
(2,3,'PBK','2024-02-07 15:06:15',NULL);

/*Table structure for table `stories_cat` */

DROP TABLE IF EXISTS `stories_cat`;

CREATE TABLE `stories_cat` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `stories_cat` */

insert  into `stories_cat`(`id`,`category`,`created_at`,`updated_at`) values 
(2,'Wedding','2024-02-07 09:10:46','2024-02-07 09:10:53'),
(3,'Stage','2024-02-07 14:55:58',NULL);

/*Table structure for table `stories_pict` */

DROP TABLE IF EXISTS `stories_pict`;

CREATE TABLE `stories_pict` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `story_id` int unsigned DEFAULT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `orientation` tinyint(1) DEFAULT NULL,
  `desc` text,
  `is_best` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `stories_pict` */

insert  into `stories_pict`(`id`,`story_id`,`picture`,`orientation`,`desc`,`is_best`,`created_at`,`updated_at`) values 
(1,1,'1707289491-side-view-adorable-couple-festival-outfit-standing-face-face-room-closing-eyes-holding-hands-feeling-happy-during-wedding-day.jpg',1,NULL,NULL,'2024-02-07 15:04:51',NULL),
(2,1,'1707289491-full-shot-married-couple-dancing-together.jpg',0,NULL,NULL,'2024-02-07 15:04:51',NULL),
(3,1,'1707289491-bride-groom-having-their-wedding-beach.jpg',0,NULL,NULL,'2024-02-07 15:04:51',NULL),
(4,2,'1707289575-1potfr.jpg',1,NULL,NULL,'2024-02-07 15:06:15',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`username`,`password`) values 
(1,'Kresna Setiana','peker','1c1491add56974143b9a752030ae8c67');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
