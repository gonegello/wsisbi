-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: wsis
-- ------------------------------------------------------
-- Server version	8.0.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `profile` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `designation` varchar(45) DEFAULT NULL,
  `office` varchar(45) DEFAULT NULL,
  `contact_n` varchar(45) DEFAULT NULL,
  `date_updated` varchar(100) DEFAULT NULL,
  `time_updated` varchar(100) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (37,'admin_images/f725f070ab502161be8a10e0e2a5c70bistockphoto-1290599844-170667a.jpg','Katherine B. Mcphee','Supply Officer','Supply Office','09953346236',NULL,NULL,57);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adminlog`
--

DROP TABLE IF EXISTS `adminlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminlog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) DEFAULT NULL,
  `activity` varchar(100) DEFAULT NULL,
  `details` varchar(45) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) /*!80000 INVISIBLE */,
  CONSTRAINT `userid_log_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminlog`
--

LOCK TABLES `adminlog` WRITE;
/*!40000 ALTER TABLE `adminlog` DISABLE KEYS */;
INSERT INTO `adminlog` VALUES (32,'Georgie Lee Ong','Updated','Profile Picture','2021-11-23 21:45:36',57),(33,'Georgie Lee Ong','Signed In',NULL,'2021-11-24 08:34:33',57),(37,'Georgie Lee Ong','Signed In',NULL,'2021-11-25 04:34:02',57),(38,'Georgie Lee Ong','Signed In',NULL,'2021-11-25 05:43:40',57),(39,'Georgie Lee Ong','Signed In',NULL,'2021-11-25 21:28:14',57),(40,'Georgie Lee Ong','Signed In',NULL,'2021-11-26 13:20:33',57),(41,'Georgie Lee Ong','Signed In',NULL,'2021-11-29 10:00:55',57),(42,'Georgie Lee Ong','Signed In',NULL,'2021-11-29 11:41:30',57),(43,'Georgie Lee Ong','Signed In',NULL,'2021-11-29 14:57:17',57),(44,'Georgie Lee Ong','Signed In',NULL,'2021-11-30 10:12:28',57),(45,'Georgie Lee Ong','Signed In',NULL,'2021-11-30 10:47:23',57),(46,'Georgie Lee Ong','Signed In',NULL,'2021-11-30 16:10:12',57),(47,'Georgie Lee Ong','Signed In',NULL,'2021-11-30 20:37:52',57),(48,'Georgie Lee Ong','Signed In',NULL,'2021-12-02 11:15:59',57),(49,'Georgie Lee Ong','Signed In',NULL,'2021-12-03 10:56:17',57),(50,'Georgie Lee Ong','Signed In',NULL,'2021-12-03 11:01:36',57),(51,'Georgie Lee Ong','Signed In',NULL,'2021-12-03 12:13:30',57),(52,'Georgie Lee Ong','Signed In',NULL,'2021-12-03 14:47:30',57),(53,'Georgie Lee Ong','Signed In',NULL,'2021-12-03 15:40:40',57),(54,'Georgie Lee Ong','Signed In',NULL,'2021-12-03 15:41:44',57),(55,'Georgie Lee Ong','Signed In',NULL,'2021-12-03 19:15:42',57),(56,'Georgie Lee Ong','Signed In',NULL,'2021-12-03 22:55:37',57),(57,'Georgie Lee Ong','Signed In',NULL,'2021-12-04 20:45:01',57),(58,'Georgie Lee Ong','Signed In',NULL,'2021-12-05 01:00:39',57),(59,'Georgie Lee Ong','Signed In',NULL,'2021-12-05 17:43:08',57),(60,'Georgie Lee Ong','Signed In',NULL,'2021-12-05 22:15:14',57),(61,'Georgie Lee Ong','Signed In',NULL,'2021-12-05 23:47:53',57),(62,'Georgie Lee Ong','Signed In',NULL,'2021-12-06 00:02:52',57),(64,'Georgie Lee Ong','Signed In',NULL,'2021-12-06 11:48:05',57),(66,'Georgie Lee Ong','Updated','Profile Picture','2022-02-09 08:51:23',57),(67,'Georgie Lee Ong','Updated','Profile Picture','2022-02-09 08:51:47',57);
/*!40000 ALTER TABLE `adminlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `approvedr`
--

DROP TABLE IF EXISTS `approvedr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `approvedr` (
  `id` int NOT NULL AUTO_INCREMENT,
  `r_id` varchar(45) DEFAULT NULL,
  `item` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `client_id` varchar(45) DEFAULT NULL,
  `approved_by` varchar(45) DEFAULT NULL,
  `date_approved` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `typeid` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`typeid`) /*!80000 INVISIBLE */,
  CONSTRAINT `t_id_fk` FOREIGN KEY (`typeid`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `approvedr`
--

LOCK TABLES `approvedr` WRITE;
/*!40000 ALTER TABLE `approvedr` DISABLE KEYS */;
/*!40000 ALTER TABLE `approvedr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arstock`
--

DROP TABLE IF EXISTS `arstock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arstock` (
  `id` int NOT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `stock_name` varchar(45) DEFAULT NULL,
  `brand` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `date_arrived` datetime DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `type_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arstock`
--

LOCK TABLES `arstock` WRITE;
/*!40000 ALTER TABLE `arstock` DISABLE KEYS */;
/*!40000 ALTER TABLE `arstock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autofill`
--

DROP TABLE IF EXISTS `autofill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autofill` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product` varchar(45) DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autofill`
--

LOCK TABLES `autofill` WRITE;
/*!40000 ALTER TABLE `autofill` DISABLE KEYS */;
INSERT INTO `autofill` VALUES (1,'Bondpaper','rem','RIS'),(2,'Pencil','pcs',' '),(3,'Ballpen','pcs',NULL),(4,'Correction Tape','pcs',NULL),(5,'Marker','pcs',NULL),(6,'Alcohol','gallon',NULL),(7,'Facemask','box',NULL),(8,'Paper Clip','box',NULL),(9,'Printer','none',NULL);
/*!40000 ALTER TABLE `autofill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brandname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'One'),(2,'Panda'),(3,'Lotus'),(4,'Faber Castel'),(5,'Monggol'),(6,'HBW'),(7,'Pilot'),(8,'HARD COPY'),(9,'Ethyl'),(10,'Keji Magnetic'),(11,'Venus'),(12,'Prince'),(13,'Standalone'),(14,'Deli');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `idcart` int NOT NULL AUTO_INCREMENT,
  `item_id` int DEFAULT NULL,
  `client_id` int DEFAULT NULL,
  `quan` int DEFAULT NULL,
  `order_price` float DEFAULT NULL,
  `datte` varchar(100) DEFAULT NULL,
  `timee` varchar(100) DEFAULT NULL,
  `stat` varchar(100) DEFAULT NULL,
  `r_date` varchar(100) DEFAULT NULL,
  `purpose` varchar(45) DEFAULT NULL,
  `h_id` int DEFAULT NULL,
  `hd_aprvd` varchar(100) DEFAULT NULL,
  `dd_aprvd` varchar(100) DEFAULT NULL,
  `sup_aprvd` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcart`),
  KEY `item_id` (`item_id`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `clien_id_fk` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `item_id_fk` FOREIGN KEY (`item_id`) REFERENCES `stocks` (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (80,33,10,2,196,'2022-02-16','10:04:00 AM ','3','02-16-22','For Lecture Purposes',6,'02-16-22','02-16-22','Feb 16, 2022'),(81,35,10,3,707.25,'2022-02-16','10:04:14 AM ','3','02-16-22','For Lecture Purposes',6,'02-16-22','02-16-22','Feb 16, 2022'),(82,41,10,1,125,'2022-02-16','10:04:24 AM ','3','02-16-22','For room cleaning',6,'02-16-22','02-16-22','Feb 16, 2022'),(83,36,10,2,2468,'2022-02-16','10:04:42 AM ','3','02-16-22','For room cleaning',6,'02-16-22','02-16-22','Feb 16, 2022');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `idcategory` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) DEFAULT NULL,
  `des_cription` varchar(45) DEFAULT NULL,
  `cat_status` varchar(45) DEFAULT NULL,
  `date_encoded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `encoded_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Cleaning Materials',NULL,NULL,'2021-12-15 21:15:43',NULL),(2,'Office Materials',NULL,NULL,'2021-12-15 21:15:43',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientlog`
--

DROP TABLE IF EXISTS `clientlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientlog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) DEFAULT NULL,
  `activity` varchar(100) DEFAULT NULL,
  `details` varchar(45) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `clientlog_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientlog`
--

LOCK TABLES `clientlog` WRITE;
/*!40000 ALTER TABLE `clientlog` DISABLE KEYS */;
INSERT INTO `clientlog` VALUES (1,'Vico Sotto','updated','profile photo','2021-11-24 15:57:10',62),(2,'Vico Sotto','updated','profile photo','2021-11-24 15:57:10',62),(7,'Vico Sotto','updated','profile info','2021-11-24 15:57:10',62),(8,'Mayor Vico Sotto','updated','profile info and account security','2021-11-24 15:57:10',62),(10,'Mayor Vico Sotto','updated','Profile Picture','2021-12-01 16:31:09',62),(11,'Mayor Vico Sotto','updated','Profile Picture','2021-12-01 16:31:09',62),(12,'Mayor Vico Sotto','updated','Profile Picture','2021-12-01 16:31:09',62),(13,'Mayor Vico Sotto','updated','Profile Picture','2021-12-01 16:31:09',62),(14,'Vico Sotto','Updated','Profile Info and Account Security','2021-12-03 03:25:46',62),(15,'Vico Sotto','Updated','Profile Picture','2021-12-03 13:48:24',62),(16,'Vico Sotto','Updated','Profile Info and Account Security','2022-02-01 10:28:22',62),(17,'Vico Sotto','Updated','Profile Info and Account Security','2022-02-01 10:37:15',62),(18,'Vico Sotto','Updated','Profile Info and Account Security','2022-02-01 10:37:27',62),(19,'Vilma Santos','Updated','Profile Info and Account Security','2022-02-01 10:43:44',74),(20,'Vico Sotto','Updated','Profile Picture','2022-02-09 08:55:53',62),(21,'Franklin A.  Goth','Updated','Profile Info and Account Security','2022-02-09 08:58:10',62),(22,'Franklin A.  Goth','Updated','Profile Info and Account Security','2022-02-09 08:58:58',62),(23,'Vilma Santos','Updated','Profile Picture','2022-02-09 09:01:20',74),(24,'Mark Peter A. Pan','Updated','Profile Info and Account Security','2022-02-09 09:03:28',74);
/*!40000 ALTER TABLE `clientlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `profile` varchar(100) DEFAULT NULL,
  `fullname` varchar(45) DEFAULT NULL,
  `designation` varchar(45) DEFAULT NULL,
  `office` varchar(45) DEFAULT NULL,
  `contact_n` varchar(45) DEFAULT NULL,
  `date_updated` varchar(100) DEFAULT NULL,
  `time_updated` varchar(100) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `userid_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (6,'admin_images/f979828b03541dc7dd5e9d67bb14d60cIan-Somerhalder.jpg','Franklin A.  Goth','Head','Information Technology Office','253456756878','2021-12-01','10:45:35 PM',62),(7,'admin_images/7dea34050ac69e27914d15fad214a192entrepreneur-1.jpg','Mark Peter A. Pan','Instructor','Information Technology Office','09953346236','2021-12-06','12:54:25 PM ',74),(9,'client_images/c55ce072fab89db31897462311187032dean.jpeg','Ericka Viax O. Dean','Campus Director','Administration Office','92345949','2022-02-09','09:04:24 AM ',78),(10,'client_images/9867a1f075590d628e26e3a6661a03e0sw.jpg','Samson D. Lilah','Instructor','Information Technology Office','987878','2022-02-09','03:28:55 PM ',82),(11,'client_images/32e200056043b43c571ff7222e9a4e4esw.jpg','Education Ko','Head','Education Office','928945794','2022-02-12','11:11:57 AM ',83),(12,'client_images/652d127a3402b7676bc27413f70d1e57entrepreneur-1.jpg','Educ Instructor','Instructor','Education Office','92345949','2022-02-12','11:13:40 AM ',84);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `descrip`
--

DROP TABLE IF EXISTS `descrip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `descrip` (
  `des_id` int NOT NULL AUTO_INCREMENT,
  `descrip` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`des_id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `descrip`
--

LOCK TABLES `descrip` WRITE;
/*!40000 ALTER TABLE `descrip` DISABLE KEYS */;
INSERT INTO `descrip` VALUES (123,'Size A4'),(124,'Legal Size'),(125,'Short'),(126,'White pulled electric');
/*!40000 ALTER TABLE `descrip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `draft`
--

DROP TABLE IF EXISTS `draft`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `draft` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `client_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `draft`
--

LOCK TABLES `draft` WRITE;
/*!40000 ALTER TABLE `draft` DISABLE KEYS */;
INSERT INTO `draft` VALUES (1,'Hard drive solid green','1','2021-11-25 19:44:05',5),(2,'Hard drive solid green','1','2021-11-25 19:44:05',5),(3,'Save to Draft only one','1','2021-11-25 19:45:53',5),(4,'Tv Flat LED','2','2021-11-25 20:33:09',5),(12,'Hard drive solid green','1','2021-11-26 12:33:57',6);
/*!40000 ALTER TABLE `draft` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gen`
--

DROP TABLE IF EXISTS `gen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gen` varchar(45) DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `typeid` int DEFAULT NULL,
  `cat_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `typeid` (`typeid`),
  CONSTRAINT `typeid_fk` FOREIGN KEY (`typeid`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gen`
--

LOCK TABLES `gen` WRITE;
/*!40000 ALTER TABLE `gen` DISABLE KEYS */;
INSERT INTO `gen` VALUES (1,'Bond Paper','rem',2,NULL),(2,'Ink','container',2,NULL),(3,'Stapler','pcs',1,NULL),(4,'Pencil','box',2,NULL),(5,'Ballpen','box',2,NULL),(6,'Chalk','box',2,NULL),(7,'Bluebook','pcs',2,NULL),(8,'White Board Eraser','pcs',1,NULL),(9,'Alcohol','gallon',2,NULL),(10,'Marker','box',2,NULL),(11,'Dustpan','pcs',1,NULL),(12,'Hand Sanitizer','liter',2,NULL),(13,'Paper Clip','box',2,NULL),(14,'Paper Puncher','pcs',1,NULL),(15,'Wire extension','meter',1,NULL),(16,'Wipe Mop','pcs',1,NULL),(17,'Computer','set',3,NULL);
/*!40000 ALTER TABLE `gen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `office`
--

DROP TABLE IF EXISTS `office`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `office` (
  `office_id` int NOT NULL AUTO_INCREMENT,
  `office_ad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `office`
--

LOCK TABLES `office` WRITE;
/*!40000 ALTER TABLE `office` DISABLE KEYS */;
INSERT INTO `office` VALUES (1,'Education Department'),(2,'Information Technology Department'),(3,'Agri-Business Department'),(4,'Agriculture Department');
/*!40000 ALTER TABLE `office` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `orderid` int NOT NULL AUTO_INCREMENT,
  `item_id` int DEFAULT NULL,
  `client_id` int DEFAULT NULL,
  `oo_quan` int DEFAULT NULL,
  `order_quan` int DEFAULT NULL,
  `order_amount` float DEFAULT NULL,
  `date_ordered` varchar(100) DEFAULT NULL,
  `order_time` varchar(100) DEFAULT NULL,
  `issu_d` varchar(45) DEFAULT NULL,
  `issu_time` varchar(45) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (33,33,6,1,1,98,'12-12-2021','04:51:15 PM ',NULL,NULL,'accepted'),(34,35,6,2,2,471.5,'12-12-2021','08:52:27 PM ',NULL,NULL,'declined'),(35,41,6,2,2,250,'12-12-2021','09:14:52 PM ',NULL,NULL,'accepted'),(36,39,6,3,3,297,'12-13-2021','08:33:33 AM ',NULL,NULL,'accepted'),(38,40,6,1,1,86,'12-13-2021','11:21:01 AM ',NULL,NULL,'declined'),(39,35,8,8,8,1886,'12-13-2021','03:27:30 PM ',NULL,NULL,'accepted'),(40,36,8,2,2,2468,'12-13-2021','03:34:07 PM ',NULL,NULL,'declined'),(41,36,6,5,5,6170,'02-04-2022','04:01:56 AM ',NULL,NULL,'waiting'),(42,36,6,3,3,3702,'02-04-2022','04:16:47 AM ',NULL,NULL,'waiting'),(43,36,6,2,2,2468,'02-04-2022','04:18:55 AM ',NULL,NULL,'waiting'),(44,36,6,1,1,1234,'02-04-2022','04:19:17 AM ',NULL,NULL,'waiting'),(45,36,6,2,2,2468,'02-04-2022','04:29:29 AM ',NULL,NULL,'waiting'),(46,36,6,2,2,2468,'02-04-2022','04:43:26 AM ',NULL,NULL,'waiting'),(47,34,6,3,3,234,'02-04-2022','04:43:56 AM ',NULL,NULL,'waiting'),(48,36,6,1,1,1234,'02-04-2022','04:45:46 AM ',NULL,NULL,'waiting'),(49,36,6,2,2,2468,'02-04-2022','04:48:06 AM ',NULL,NULL,'waiting');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `par_unit`
--

DROP TABLE IF EXISTS `par_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `par_unit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit` varchar(45) DEFAULT NULL,
  `type_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `type_id_fk` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `par_unit`
--

LOCK TABLES `par_unit` WRITE;
/*!40000 ALTER TABLE `par_unit` DISABLE KEYS */;
INSERT INTO `par_unit` VALUES (1,'set',3),(2,'unit',3);
/*!40000 ALTER TABLE `par_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pr`
--

DROP TABLE IF EXISTS `pr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pr` (
  `idpr` int NOT NULL AUTO_INCREMENT,
  `acc_quan` int DEFAULT NULL,
  `cart_id` int DEFAULT NULL,
  PRIMARY KEY (`idpr`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr`
--

LOCK TABLES `pr` WRITE;
/*!40000 ALTER TABLE `pr` DISABLE KEYS */;
INSERT INTO `pr` VALUES (4,1,82),(5,1,83),(6,2,80),(7,2,81);
/*!40000 ALTER TABLE `pr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request` (
  `req_id` int NOT NULL AUTO_INCREMENT,
  `item` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `req_purpose` varchar(100) DEFAULT NULL,
  `req_status` varchar(45) DEFAULT NULL,
  `date_` varchar(100) DEFAULT NULL,
  `time_` varchar(100) DEFAULT NULL,
  `date_approved` varchar(100) DEFAULT NULL,
  `approved_time` varchar(100) DEFAULT NULL,
  `approved_by` varchar(45) DEFAULT NULL,
  `issuance_date` varchar(100) DEFAULT NULL,
  `time_issuance` varchar(45) DEFAULT NULL,
  `client_id` int DEFAULT NULL,
  `type_id` int DEFAULT '3',
  PRIMARY KEY (`req_id`),
  KEY `client_id` (`client_id`) /*!80000 INVISIBLE */,
  CONSTRAINT `client_id_fk` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` VALUES (52,'Hard drive solid green','1','For my studies','Approved','2021-11-30','10:08:14 AM ','12-09-2021','10:51:22 PM ','37',NULL,NULL,6,3),(53,'Poco Pro','4','For my studies','Approved','2021-11-30','10:08:14 AM ','12-09-2021','10:51:22 PM ','37',NULL,NULL,6,3),(57,'Fire extinguisher','3','For my happiness','Approved','2021-12-10','12:21:00 PM ','12-10-2021','12:22:02 PM ','37',NULL,NULL,6,3),(58,'Tv Flat LED','4','For my happiness','Approved','2021-12-10','12:21:00 PM ','12-10-2021','12:22:02 PM ','37',NULL,NULL,6,3);
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin'),(2,'client'),(3,'storekeeper');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skeeper`
--

DROP TABLE IF EXISTS `skeeper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skeeper` (
  `id` int NOT NULL AUTO_INCREMENT,
  `profile` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `designation` varchar(45) DEFAULT NULL,
  `office` varchar(45) DEFAULT NULL,
  `contact_n` varchar(45) DEFAULT NULL,
  `date_updated` varchar(100) DEFAULT NULL,
  `time_updated` varchar(100) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `u_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skeeper`
--

LOCK TABLES `skeeper` WRITE;
/*!40000 ALTER TABLE `skeeper` DISABLE KEYS */;
/*!40000 ALTER TABLE `skeeper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_details`
--

DROP TABLE IF EXISTS `stock_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_number` varchar(100) DEFAULT NULL,
  `custodian` int DEFAULT NULL COMMENT 'id of the client or employee',
  `stock_id` int DEFAULT NULL COMMENT 'from stocks table , stock id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_details`
--

LOCK TABLES `stock_details` WRITE;
/*!40000 ALTER TABLE `stock_details` DISABLE KEYS */;
INSERT INTO `stock_details` VALUES (183,'2022-02-16-001',NULL,39),(184,'2022-02-16-002',NULL,39),(185,'2022-02-16-003',NULL,39),(186,'2022-02-16-004',NULL,36),(187,'2022-02-16-005',NULL,36),(188,'2022-02-16-006',NULL,36),(189,'2022-02-16-007',NULL,36),(190,'2022-02-16-008',NULL,36),(191,'2022-02-16-009',NULL,36),(192,'2022-02-16-010',NULL,41),(193,'2022-02-16-011',NULL,41),(194,'2022-02-16-012',NULL,41),(195,'2022-02-16-013',NULL,41),(196,'2022-02-16-014',NULL,41),(197,'2022-02-16-015',NULL,34),(198,'2022-02-16-016',NULL,34),(199,'2022-02-16-017',NULL,34),(200,'2022-02-16-018',NULL,34),(201,'2022-02-16-019',NULL,34),(202,'2022-02-16-020',NULL,34),(203,'2022-02-16-021',NULL,34),(204,'2022-02-16-022',NULL,34),(205,'2022-02-16-023',NULL,34),(206,'2022-02-16-024',NULL,34),(207,'2022-02-16-025',NULL,34),(208,'2022-02-16-026',NULL,34),(209,'2022-02-16-027',NULL,34),(210,'2022-02-16-028',NULL,34),(211,'2022-02-16-029',NULL,34);
/*!40000 ALTER TABLE `stock_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_out`
--

DROP TABLE IF EXISTS `stock_out`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock_out` (
  `so_id` int NOT NULL,
  `stock_id` int DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  PRIMARY KEY (`so_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_out`
--

LOCK TABLES `stock_out` WRITE;
/*!40000 ALTER TABLE `stock_out` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_out` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stocks` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `product_code` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `stock_name` varchar(45) DEFAULT NULL,
  `brand` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `in_quantity` int DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `total_price` float unsigned DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `date_arrived` datetime DEFAULT NULL,
  `input_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `officer` int DEFAULT NULL,
  `int_typeid` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`s_id`),
  KEY `int_typeid` (`int_typeid`),
  CONSTRAINT `int_typeid_fk` FOREIGN KEY (`int_typeid`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks`
--

LOCK TABLES `stocks` WRITE;
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;
INSERT INTO `stocks` VALUES (33,'4YT9K','stock_photo/22822316933a1c176ce4ebfa6d9d9b8c2af8f5d8b4777896361dad0bd6d4ea11.jpg','Marker','Pilot','Ball Point RT',5,5,'box',98,490,'available','2021-12-02 00:00:00','2021-12-15 21:11:05',37,2,NULL),(34,'NYQEN','stock_photo/a6c3530481bf9143ea71e0d0ef2c3d442af8f5d8b4777896361dad0bd6d4ea11sdfsd.jpg','Wire extension','Omigle','White pulled electric',15,15,'meter',78,1170,'available','2021-12-01 00:00:00','2022-02-16 10:48:34',37,1,NULL),(35,'KSPQH','stock_photo/c27cd8be9cb09a838ae6d582a27d87654e4771cde22edd22f7fdc8a719259a6c.jpg_2200x2200q80.jpg_.webp','Bond Paper','One','Size A4',8,8,'rem',235.75,1886,'available','2021-12-01 00:00:00','2022-02-09 14:27:59',37,2,NULL),(36,'20BIR','stock_photo/758d0575166a1363406d8dc217fddf24729926b4fc1c5cadcb6e6ab47d4f9d72.jpg','Wipe Mop','Allaon','Two Heads',6,6,'pcs',1234,7404,'available','2021-12-08 00:00:00','2022-02-16 10:48:34',37,1,NULL),(39,'ZS18Q','stock_photo/5193293c122a54acf6e59f022075ec0a3527612de6c55986f5174be2ebdf7387.png_2200x2200q80.jpg_.webp','Paper Puncher','HBW','Two Holes',3,3,'pcs',99,297,'available','2021-11-28 00:00:00','2022-02-16 10:48:34',37,1,NULL),(40,'XLLSG','stock_photo/95cbf58f223d7d085127af62ba47f694Pilot-RT.png','Ballpen','Pilot','Ball point',2,2,'box',86,172,'available','2021-11-28 00:00:00','2021-12-15 21:11:05',37,2,NULL),(41,'NDZ2A','stock_photo/5e73945f78261edfa84865f04a4c4358KEJIT19G_keji_magnetic_whiteboard_eraser_large_green.jpg','White Board Eraser','Keji Magnetic','Green',5,5,'pcs',125,625,'available','2021-12-05 00:00:00','2022-02-16 10:48:34',37,1,NULL),(42,'XL31C','stock_photo/216fefb616eb56f9f66d32f6123c7764download.jpg','Computer','Dell','All on in desktop com',5,5,'set',30000,500000,'available','2021-12-13 00:00:00','2021-12-15 21:11:05',37,3,NULL);
/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'ICS'),(2,'RIS'),(3,'PAR');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unit` (
  `idunit` int NOT NULL AUTO_INCREMENT,
  `unit` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idunit`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
INSERT INTO `unit` VALUES (1,'box'),(2,'rem'),(3,'rim'),(4,'pc.'),(5,'pcs.'),(6,'gallon'),(7,'meter'),(8,'inch'),(9,'inches'),(10,'cm'),(11,'ft'),(12,'liter'),(13,'container');
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload`
--

DROP TABLE IF EXISTS `upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `upload` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `office` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload`
--

LOCK TABLES `upload` WRITE;
/*!40000 ALTER TABLE `upload` DISABLE KEYS */;
INSERT INTO `upload` VALUES (22,'Marestila','all_images/803daa71b9c6924b4478981a56e54440Picture10.png',NULL),(23,'Marestila','all_images/7da001bf7901a8bc6c11700eac7e2113Picture10.png',NULL),(24,'Marestila','all_images/4f242d2fb2a9555f84cb440b6332a3a3Picture10.png',NULL),(25,'Marestila','all_images/4fe9850f4b8c71fe509424f594f9521fPicture10.png',NULL),(26,'Marestila','all_images/e388135e61ad707006a94234773dade3Picture10.png',NULL),(27,'Viscara','all_images/6da3ce36d21f374aec1956a71b56083bPicture7.png',NULL),(28,'Georgie Lee','all_images/1e9c950aae55c4f3c7a46d0ad4898a1bJesus.png',NULL),(29,'','all_images/947eb4ac838696faf5664fd4dc4bb1e1Jesus.png',NULL),(30,'cheyy','all_images/84b8e577edac88f57189e7722deada6dphpfib.PNG','Supply office'),(31,'sdf','all_images/aac040cc802bafdf96910c7909a11107IMG_20210920_162444.jpg','sdf');
/*!40000 ALTER TABLE `upload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `userole` varchar(45) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `dc` varchar(100) DEFAULT NULL,
  `time_created` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (57,'admin','admin','admin','updated','37','2021-12-01','01:34:02 AM'),(62,'gothy','gothy','client','updated','37','2021-12-02','04:45:10 AM'),(74,'peterpan','peterpan','client','updated','37','2021-12-05','11:48:06 PM '),(78,'imEricka','imEricka','client','updated','37','2021-12-06','01:21:06 PM '),(82,'samson','samson','client','updated','37','2021-02-09','03:29:02 PM'),(83,'educ','educ','client','updated','37','2022-02-12','11:34:09 AM'),(84,'educ1','educ1','client','updated','37','2022-02-12','11:34:09 AM');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-16 12:45:37
