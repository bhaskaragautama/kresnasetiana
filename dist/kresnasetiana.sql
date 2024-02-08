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
/*Table structure for table `portfolio` */

DROP TABLE IF EXISTS `portfolio`;

CREATE TABLE `portfolio` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `orientation` tinyint(1) DEFAULT NULL,
  `is_best` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `portfolio` */

insert  into `portfolio`(`id`,`title`,`picture`,`orientation`,`is_best`,`created_at`,`updated_at`) values 
(2,'Killing with a Smile','1707386209-portrait-man-laughing.jpg',0,1,'2024-02-08 17:56:49',NULL),
(3,'Hey','1707386896-2150526696.jpg',0,NULL,'2024-02-08 18:08:16',NULL),
(4,'Let\'s Go','1707386946-john-fowler-03Pv2Ikm5Hk-unsplash.jpg',1,NULL,'2024-02-08 18:09:07',NULL);

/*Table structure for table `portfolio_pivot` */

DROP TABLE IF EXISTS `portfolio_pivot`;

CREATE TABLE `portfolio_pivot` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `port_id` int unsigned DEFAULT NULL,
  `tag_id` int unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `portfolio_pivot` */

insert  into `portfolio_pivot`(`id`,`port_id`,`tag_id`,`created_at`,`updated_at`) values 
(7,2,13,'2024-02-08 17:56:50',NULL),
(8,2,15,'2024-02-08 17:56:50',NULL),
(9,2,10,'2024-02-08 17:56:50',NULL),
(10,2,12,'2024-02-08 17:56:50',NULL),
(11,3,13,'2024-02-08 18:08:16',NULL),
(12,3,10,'2024-02-08 18:08:16',NULL),
(13,4,13,'2024-02-08 18:09:07',NULL),
(14,4,10,'2024-02-08 18:09:07',NULL);

/*Table structure for table `portfolio_tag` */

DROP TABLE IF EXISTS `portfolio_tag`;

CREATE TABLE `portfolio_tag` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `portfolio_tag` */

insert  into `portfolio_tag`(`id`,`tag`,`created_at`,`updated_at`) values 
(2,'Wedding','2024-02-08 09:01:22',NULL),
(3,'Road','2024-02-08 09:01:28',NULL),
(5,'Bicycle','2024-02-08 15:41:37',NULL),
(6,'Touring','2024-02-08 15:41:42',NULL),
(7,'Fusion','2024-02-08 15:41:47',NULL),
(8,'Food','2024-02-08 15:41:50',NULL),
(9,'Bikini','2024-02-08 15:41:54',NULL),
(10,'Nature','2024-02-08 15:41:59',NULL),
(11,'Heritage','2024-02-08 15:42:04',NULL),
(12,'Spirit','2024-02-08 15:42:09',NULL),
(13,'Awesome','2024-02-08 15:42:14',NULL),
(14,'Culture Shock','2024-02-08 15:42:23',NULL),
(15,'Extra Ordinary','2024-02-08 15:42:33',NULL);

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
(1,1,'Pernikahan Dini','2024-02-08 17:28:25','2024-02-09 01:18:38'),
(2,1,'Pernikahan Ditu','2024-02-08 17:28:43','2024-02-08 21:01:10');

/*Table structure for table `stories_cat` */

DROP TABLE IF EXISTS `stories_cat`;

CREATE TABLE `stories_cat` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `stories_cat` */

insert  into `stories_cat`(`id`,`category`,`created_at`,`updated_at`) values 
(1,'Wedding','2024-02-08 17:18:45',NULL);

/*Table structure for table `stories_pict` */

DROP TABLE IF EXISTS `stories_pict`;

CREATE TABLE `stories_pict` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `story_id` int unsigned DEFAULT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `orientation` tinyint(1) DEFAULT NULL,
  `desc` text,
  `desc_position` tinyint(1) DEFAULT NULL,
  `is_best` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `stories_pict` */

insert  into `stories_pict`(`id`,`story_id`,`picture`,`orientation`,`desc`,`desc_position`,`is_best`,`created_at`,`updated_at`) values 
(1,1,'1707384504-moon-sky-night-background-asset-game-2d-futuristic-generative-ai.jpg',1,'',NULL,0,'2024-02-08 17:28:25','2024-02-08 23:59:58'),
(2,1,'1707384505-2150526696.jpg',0,'',NULL,0,'2024-02-08 17:28:25','2024-02-08 23:59:58'),
(3,1,'1707384505-pngtree-wolf-line-art-png-image_13323979.png',0,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita pariatur doloribus omnis fugit officiis. Reprehenderit maxime incidunt est, amet tempora perferendis cupiditate reiciendis, officiis, cum quidem odit assumenda atque delectus.',3,0,'2024-02-08 17:28:25','2024-02-09 01:18:38'),
(4,2,'1707384523-pretty-smiling-joyfully-female-with-fair-hair-dressed-casually-looking-with-satisfaction.jpg',1,'',NULL,0,'2024-02-08 17:28:43','2024-02-08 21:01:10'),
(5,2,'1707384523-close-up-young-successful-man-smiling-camera-standing-casual-outfit-against-blue-background.jpg',1,'',NULL,0,'2024-02-08 17:28:43','2024-02-08 21:01:10'),
(6,2,'1707384523-original-2426331e7de82bfe0dabff6b77baae2d.png',1,'',NULL,1,'2024-02-08 17:28:43','2024-02-08 21:01:10'),
(7,1,'1707384545-beautiful-asian-woman-portrait-smiling-face.jpg',1,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita pariatur doloribus omnis fugit officiis. Reprehenderit maxime incidunt est, amet tempora perferendis cupiditate reiciendis, officiis, cum quidem odit assumenda atque delectus.',4,1,'2024-02-08 17:29:05','2024-02-09 01:18:38');

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
