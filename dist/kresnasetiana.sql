-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: kresnasetiana
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portfolio` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `orientation` tinyint(1) DEFAULT NULL,
  `is_best` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio`
--

LOCK TABLES `portfolio` WRITE;
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` VALUES (2,'Killing with a Smile','1707386209-portrait-man-laughing.jpg',0,1,'2024-02-08 17:56:49',NULL),(3,'Hey','1707386896-2150526696.jpg',0,1,'2024-02-08 18:08:16','2024-02-10 19:14:10'),(4,'Let\'s Go','1707386946-john-fowler-03Pv2Ikm5Hk-unsplash.jpg',1,1,'2024-02-08 18:09:07','2024-02-10 19:14:04'),(5,'Hanung','1707795928-1potfr.jpg',1,NULL,'2024-02-13 11:45:28',NULL);
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio_pivot`
--

DROP TABLE IF EXISTS `portfolio_pivot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portfolio_pivot` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `port_id` int unsigned DEFAULT NULL,
  `tag_id` int unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio_pivot`
--

LOCK TABLES `portfolio_pivot` WRITE;
/*!40000 ALTER TABLE `portfolio_pivot` DISABLE KEYS */;
INSERT INTO `portfolio_pivot` VALUES (7,2,13,'2024-02-08 17:56:50',NULL),(8,2,15,'2024-02-08 17:56:50',NULL),(9,2,10,'2024-02-08 17:56:50',NULL),(10,2,12,'2024-02-08 17:56:50',NULL),(15,4,13,'2024-02-10 19:14:04',NULL),(16,4,10,'2024-02-10 19:14:04',NULL),(17,3,13,'2024-02-10 19:14:10',NULL),(18,3,10,'2024-02-10 19:14:10',NULL),(19,5,13,'2024-02-13 11:45:28',NULL),(20,5,15,'2024-02-13 11:45:28',NULL);
/*!40000 ALTER TABLE `portfolio_pivot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio_tag`
--

DROP TABLE IF EXISTS `portfolio_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portfolio_tag` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio_tag`
--

LOCK TABLES `portfolio_tag` WRITE;
/*!40000 ALTER TABLE `portfolio_tag` DISABLE KEYS */;
INSERT INTO `portfolio_tag` VALUES (2,'Wedding','2024-02-08 09:01:22',NULL),(3,'Road','2024-02-08 09:01:28',NULL),(5,'Bicycle','2024-02-08 15:41:37',NULL),(6,'Touring','2024-02-08 15:41:42',NULL),(7,'Fusion','2024-02-08 15:41:47',NULL),(8,'Food','2024-02-08 15:41:50',NULL),(9,'Bikini','2024-02-08 15:41:54',NULL),(10,'Nature','2024-02-08 15:41:59',NULL),(11,'Heritage','2024-02-08 15:42:04',NULL),(12,'Spirit','2024-02-08 15:42:09',NULL),(13,'Awesome','2024-02-08 15:42:14',NULL),(14,'Culture Shock','2024-02-08 15:42:23',NULL),(15,'Extra Ordinary','2024-02-08 15:42:33',NULL);
/*!40000 ALTER TABLE `portfolio_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store`
--

DROP TABLE IF EXISTS `store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `store` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int unsigned DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store`
--

LOCK TABLES `store` WRITE;
/*!40000 ALTER TABLE `store` DISABLE KEYS */;
INSERT INTO `store` VALUES (2,2,'Barong Landung','Barong landung adalah barong yang landung. Kenapa barong landung? Karena dia landung. Apa yang terjadi kalau barong landung tidak landung? Dia akan dirawat secara eksklusif oleh tim dari susu Zee.','2024-02-10 12:51:27',NULL);
/*!40000 ALTER TABLE `store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store_cat`
--

DROP TABLE IF EXISTS `store_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `store_cat` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_cat`
--

LOCK TABLES `store_cat` WRITE;
/*!40000 ALTER TABLE `store_cat` DISABLE KEYS */;
INSERT INTO `store_cat` VALUES (2,'Barong','2024-02-10 10:09:18',NULL),(3,'Beach','2024-02-10 10:09:22',NULL),(4,'Legong','2024-02-10 10:09:28',NULL);
/*!40000 ALTER TABLE `store_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store_pict`
--

DROP TABLE IF EXISTS `store_pict`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `store_pict` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int unsigned DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `orientation` tinyint(1) DEFAULT NULL,
  `idr` int DEFAULT NULL,
  `is_best` tinyint(1) DEFAULT NULL,
  `is_thumb` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_pict`
--

LOCK TABLES `store_pict` WRITE;
/*!40000 ALTER TABLE `store_pict` DISABLE KEYS */;
INSERT INTO `store_pict` VALUES (3,2,'Bukan Barong','1707541311-majestic-feline-gazes-glowing-alien-planet-generated-by-ai.jpg',1,3000000,1,0,'2024-02-10 13:01:52','2024-02-12 16:11:31'),(4,2,'Ini Juga Bukan Barong','1707542144-bird-with-bright-orange-feathers-black-head-that-says-bird-is-bird.jpg',1,1000,1,1,'2024-02-10 13:15:45','2024-02-12 16:11:42');
/*!40000 ALTER TABLE `store_pict` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stories`
--

DROP TABLE IF EXISTS `stories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int unsigned DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stories`
--

LOCK TABLES `stories` WRITE;
/*!40000 ALTER TABLE `stories` DISABLE KEYS */;
INSERT INTO `stories` VALUES (1,1,'Pernikahan Dini','2024-02-08 17:28:25','2024-02-12 15:41:59'),(2,1,'Pernikahan Ditu','2024-02-08 17:28:43','2024-02-10 22:49:28'),(3,2,'Rocket Rockers - Art Center','2024-02-10 19:52:11','2024-02-12 16:20:39'),(4,2,'Bayu KW','2024-02-10 19:59:35','2024-02-12 16:20:32');
/*!40000 ALTER TABLE `stories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stories_cat`
--

DROP TABLE IF EXISTS `stories_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stories_cat` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stories_cat`
--

LOCK TABLES `stories_cat` WRITE;
/*!40000 ALTER TABLE `stories_cat` DISABLE KEYS */;
INSERT INTO `stories_cat` VALUES (1,'Wedding','2024-02-08 17:18:45',NULL),(2,'Stages','2024-02-10 19:51:07',NULL);
/*!40000 ALTER TABLE `stories_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stories_pict`
--

DROP TABLE IF EXISTS `stories_pict`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stories_pict` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `story_id` int unsigned DEFAULT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `orientation` tinyint(1) DEFAULT NULL,
  `desc` text,
  `desc_position` tinyint(1) DEFAULT NULL,
  `is_best` tinyint(1) DEFAULT NULL,
  `is_thumb` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stories_pict`
--

LOCK TABLES `stories_pict` WRITE;
/*!40000 ALTER TABLE `stories_pict` DISABLE KEYS */;
INSERT INTO `stories_pict` VALUES (1,1,'1707384504-moon-sky-night-background-asset-game-2d-futuristic-generative-ai.jpg',1,'',NULL,1,0,'2024-02-08 17:28:25','2024-02-12 15:41:59'),(4,2,'1707384523-pretty-smiling-joyfully-female-with-fair-hair-dressed-casually-looking-with-satisfaction.jpg',1,'',NULL,1,NULL,'2024-02-08 17:28:43','2024-02-10 22:49:28'),(5,2,'1707384523-close-up-young-successful-man-smiling-camera-standing-casual-outfit-against-blue-background.jpg',1,'',NULL,1,NULL,'2024-02-08 17:28:43','2024-02-10 22:49:28'),(6,2,'1707384523-original-2426331e7de82bfe0dabff6b77baae2d.png',1,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita pariatur doloribus omnis fugit officiis. Reprehenderit maxime incidunt est, amet tempora perferendis cupiditate reiciendis, officiis, cum quidem odit assumenda atque delectus.',3,1,NULL,'2024-02-08 17:28:43','2024-02-10 22:49:28'),(7,1,'1707384545-beautiful-asian-woman-portrait-smiling-face.jpg',1,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita pariatur doloribus omnis fugit officiis. Reprehenderit maxime incidunt est, amet tempora perferendis cupiditate reiciendis, officiis, cum quidem odit assumenda atque delectus.',4,1,0,'2024-02-08 17:29:05','2024-02-12 15:41:59'),(8,1,'1707461022-2077.jpeg',0,'',NULL,0,0,'2024-02-09 14:43:46','2024-02-12 15:41:59'),(9,1,'1707461022-undangan.jpg',1,'',NULL,1,0,'2024-02-09 14:43:46','2024-02-12 15:41:59'),(10,1,'1707461023-IMG_2757.jpg',0,'',NULL,0,0,'2024-02-09 14:43:46','2024-02-12 15:41:59'),(11,1,'1707461024-89tw2j.jpg',1,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita pariatur doloribus omnis fugit officiis. Reprehenderit maxime incidunt est, amet tempora perferendis cupiditate reiciendis, officiis, cum quidem odit assumenda atque delectus.',3,1,0,'2024-02-09 14:43:46','2024-02-12 15:41:59'),(12,1,'1707461024-delicate-pearls-bride-s-beautiful-dress.jpg',0,'',NULL,0,0,'2024-02-09 14:43:46','2024-02-12 15:41:59'),(13,1,'1707461025-bride-groom-their-wedding-ceremony.jpg',1,'',NULL,1,0,'2024-02-09 14:43:46','2024-02-12 15:41:59'),(14,1,'1707461025-side-view-adorable-couple-festival-outfit-standing-face-face-room-closing-eyes-holding-hands-feeling-happy-during-wedding-day.jpg',1,'',NULL,1,0,'2024-02-09 14:43:46','2024-02-12 15:41:59'),(15,1,'1707461025-full-shot-married-couple-dancing-together.jpg',0,'',NULL,0,0,'2024-02-09 14:43:46','2024-02-12 15:41:59'),(16,1,'1707461025-bride-groom-having-their-wedding-beach.jpg',0,'',NULL,0,0,'2024-02-09 14:43:46','2024-02-12 15:41:59'),(18,1,'1707461026-curious-well-dressed-girl-standing-yellow-wall-pensive-blonde-young-woman-black-dress-thinking-about-something.jpg',1,'',NULL,1,0,'2024-02-09 14:43:46','2024-02-12 15:41:59'),(19,1,'1707461148-galerry2.jpg',0,'',NULL,0,0,'2024-02-09 14:45:55','2024-02-12 15:41:59'),(20,1,'1707461150-IMG_20230115_220005.jpg',0,'',NULL,0,0,'2024-02-09 14:45:55','2024-02-12 15:41:59'),(22,1,'1707461153-ini-cahyo-yang-lagi-dicari-cari-gibran-soal-vandalisme-1_43.jpg',1,'',NULL,0,0,'2024-02-09 14:45:55','2024-02-12 15:41:59'),(23,1,'1707461153-ini-cahyo-yang-lagi-dicari-cari-gibran-soal-vandalisme-1_43.jpeg',1,'',NULL,0,0,'2024-02-09 14:45:55','2024-02-12 15:41:59'),(24,1,'1707461153-barefoot-man-is-walking-sand-beach.jpg',1,'',NULL,0,0,'2024-02-09 14:45:55','2024-02-12 15:41:59'),(25,1,'1707461155-WhatsApp Image 2022-07-18 at 7.55.52 AM.jpeg',1,'',NULL,0,0,'2024-02-09 14:45:55','2024-02-12 15:41:59'),(26,1,'1707481664-pretty-smiling-joyfully-female-with-fair-hair-dressed-casually-looking-with-satisfaction.jpg',1,'',NULL,1,0,'2024-02-09 20:27:44','2024-02-12 15:41:59'),(27,3,'1707565929-majestic-feline-gazes-glowing-alien-planet-generated-by-ai.jpg',1,'',NULL,0,1,'2024-02-10 19:52:11','2024-02-12 16:20:39'),(28,3,'1707565929-john-fowler-03Pv2Ikm5Hk-unsplash.jpg',1,'',NULL,0,0,'2024-02-10 19:52:11','2024-02-12 16:20:39'),(29,3,'1707565930-bird-with-bright-orange-feathers-black-head-that-says-bird-is-bird.jpg',1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies ultrices ipsum, sit amet vulputate ipsum condimentum nec. Maecenas at neque lorem. Nullam congue pulvinar quam. In blandit ipsum ut neque convallis imperdiet. Suspendisse neque mauris, consequat a molestie in, semper vel justo. In aliquam augue nec aliquam efficitur. Quisque eleifend, justo eget efficitur porta, metus lectus tincidunt diam, vel tincidunt felis orci nec est.\r\n\r\nPellentesque felis dui, blandit rutrum metus sit amet, ultrices sollicitudin turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Sed mollis ac mauris sed faucibus. Sed a libero sed lectus tincidunt ultricies. Maecenas id risus ut ligula fermentum rhoncus. Ut maximus rhoncus nisi, at ullamcorper urna posuere vel. Vivamus finibus ipsum non libero venenatis, sed scelerisque neque rutrum. Aliquam nec erat et urna lacinia semper.',3,1,1,'2024-02-10 19:52:11','2024-02-12 16:20:39'),(30,4,'1707566375-IMG_2757.jpg',0,'',NULL,0,0,'2024-02-10 19:59:35','2024-02-12 16:20:32'),(31,4,'1707566386-IMG_2815.jpg',1,'',NULL,0,1,'2024-02-10 19:59:48','2024-02-12 16:20:32'),(32,4,'1707566387-IMG_2751.jpg',1,'',NULL,0,0,'2024-02-10 19:59:48','2024-02-12 16:20:32'),(33,4,'1707566387-IMG_2777.jpg',1,'',NULL,0,1,'2024-02-10 19:59:48','2024-02-12 16:20:32'),(34,4,'1707566417-IMG_2965.jpg',0,'',NULL,0,0,'2024-02-10 20:00:18','2024-02-12 16:20:32'),(35,4,'1707566441-2150526696.jpg',0,'',NULL,0,0,'2024-02-10 20:00:41','2024-02-12 16:20:32');
/*!40000 ALTER TABLE `stories_pict` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Kresna Setiana','peker','1c1491add56974143b9a752030ae8c67',NULL,'2024-02-14 22:04:45');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-15  1:21:52
