-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: 203.158.109.144    Database: factory_base
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `factory`
--

DROP TABLE IF EXISTS `factory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factory` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fac_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fac_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fac_des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `fac_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fac_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fac_utm1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fac_utm2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fac_lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fac_lon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fac_tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fac_fax` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factory`
--

LOCK TABLES `factory` WRITE;
/*!40000 ALTER TABLE `factory` DISABLE KEYS */;
INSERT INTO `factory` VALUES (1,'Yong Shein Plastic Recycle Ordinary Partnership',NULL,NULL,'12',NULL,'1','1','9.0193759215466E-6','94.51126507429',NULL,NULL,'b.png','2022-07-09 02:14:49','2022-07-09 02:43:49'),(2,'ห้างหุ้นส่วนจำกัด อโนทัยพลาสติก',NULL,NULL,'2',NULL,'490993','2096901','18.964494143391','98.914440871116',NULL,NULL,'b.png','2022-07-09 02:15:21','2022-07-09 02:43:49'),(3,'บริษัท เคียงดอย โปรดักส์ จำกัด',NULL,NULL,'34',NULL,'487964','2059551','18.626914326839','98.885895540515',NULL,NULL,'b.png','2022-07-09 02:15:42','2022-07-09 02:43:49'),(4,'บริษัท พงศ์พสิษฐ์ จำกัด',NULL,NULL,'1',NULL,'487024','2053859','18.575464127476','98.877021051788',NULL,NULL,'b.png','2022-07-09 02:16:13','2022-07-09 02:43:49'),(5,'นิศารัตน์ พลาสติก',NULL,NULL,'0',NULL,'505660','2075884','18.774558468933','99.053704860301',NULL,NULL,'b.png','2022-07-09 02:17:08','2022-07-09 02:43:49'),(6,'พรพรรณพานิช',NULL,NULL,'2',NULL,'1','1','9.0193759215466E-6','94.51126507429',NULL,NULL,'b.png','2022-07-09 02:17:31','2022-07-09 02:43:49'),(7,'บริษัท ล้านนา เอ็น-โพลีเมอร์ จำกัด',NULL,NULL,'123',NULL,'510926','2067323','18.697163736907','99.103624019995',NULL,NULL,'b.png','2022-07-09 02:18:11','2022-07-09 02:43:49'),(8,'บริษัท เจริญมิตรเชียงใหม่ จำกัด',NULL,NULL,'123',NULL,'505655','2075505','18.771133117537','99.053656334074',NULL,NULL,'b.png','2022-07-10 02:18:11','2022-07-09 02:43:49'),(9,'ห้างหุ้นส่วนจำกัด พี.ที.โฟม เชียงใหม่',NULL,NULL,'123',NULL,'504719','2084075','18.848589983256','99.044795786155',NULL,NULL,'b.png','2022-07-11 02:18:11','2022-07-09 02:43:49'),(10,'พลาสติกเก้ายอด',NULL,NULL,'123',NULL,'1','1','9.0193759215466E-6','94.51126507429',NULL,NULL,'b.png','2022-07-12 02:18:11','2022-07-09 02:43:49'),(11,'บริษัท เชียงใหม่อุตสาหกรรมพลาสติก จำกัด',NULL,NULL,'123',NULL,'508477','2082739','18.836503447559','99.080463369209',NULL,NULL,'b.png','2022-07-13 02:18:11','2022-07-09 02:43:49'),(12,'อี.พี.เดคคอร์ (ประเทศไทย)',NULL,NULL,'123',NULL,'500996','2087318','18.877904775982','99.009456316941',NULL,NULL,'b.png','2022-07-14 02:18:11','2022-07-09 02:43:49'),(13,'ล้านนาโพลีแซค',NULL,NULL,'123',NULL,'1','1','9.0193759215466E-6','94.51126507429',NULL,NULL,'b.png','2022-07-15 02:18:11','2022-07-09 02:43:49'),(14,'บริษัท พรีม พรีม แพ็ค จำกัด',NULL,NULL,'123',NULL,'1','1','9.0193759215466E-6','94.51126507429',NULL,NULL,'b.png','2022-07-16 02:18:11','2022-07-09 02:43:49'),(15,'ยิ้มเจริญพลาสติก',NULL,NULL,'123',NULL,'1','1','9.0193759215466E-6','94.51126507429',NULL,NULL,'b.png','2022-07-17 02:18:11','2022-07-09 02:43:49'),(16,'บริษัท โกลเด็น ไดมอนด์ จำกัด',NULL,NULL,'123',NULL,'490498','2063955','18.666730786286','98.909897512255',NULL,NULL,'b.png','2022-07-18 02:18:11','2022-07-09 02:43:49'),(17,'บริษัท จิ้น ลี่ จำกัด',NULL,NULL,'123',NULL,'511948','2072917','18.747716352329','99.113350516689',NULL,NULL,'b.png','2022-07-19 02:18:11','2022-07-09 02:43:49'),(18,'บริษัท รวมแพคส์ พลาสติก จำกัด',NULL,NULL,'123',NULL,'505096','2066155','18.686629773448','99.048328348694',NULL,NULL,'b.png','2022-07-20 02:18:11','2022-07-09 02:43:49'),(19,'บริษัท เคพี พลาสติก เชียงใหม่ จำกัด',NULL,NULL,'123',NULL,'506020','2076221','18.777603228066','99.057121742016',NULL,NULL,'b.png','2022-07-21 02:18:11','2022-07-09 02:43:49'),(20,'บริษัท เมก้า พลาสติก จำกัด',NULL,NULL,'123',NULL,'505261','2072692','18.745710493007','99.049910468355',NULL,NULL,'b.png','2022-07-22 02:18:11','2022-07-09 02:43:49'),(21,'ห้างหุ้นส่วนจำกัด บุญตาอุตสาหกรรมพลาสติก',NULL,NULL,'123',NULL,'499128','2067645','18.70010240929','98.991729659184',NULL,NULL,'b.png','2022-07-23 02:18:11','2022-07-09 02:43:49'),(22,'บริษัท มู่ พลาสติก อินดัสตรีส์ จำกัด',NULL,NULL,'123',NULL,'500110','2070461','18.72555349625','99.001043432987',NULL,NULL,'b.png','2022-07-24 02:18:11','2022-07-09 02:43:49'),(23,'บริษัท ไทลาวา จำกัด',NULL,NULL,'123',NULL,'500110','2070461','18.72555349625','99.001043432987',NULL,NULL,'b.png','2022-07-25 02:18:11','2022-07-09 02:43:49'),(24,'โรงโม่พลาสติกแม่วาง',NULL,NULL,'123',NULL,'1','1','9.0193759215466E-6','94.51126507429',NULL,NULL,'b.png','2022-07-26 02:18:11','2022-07-09 02:43:49'),(25,'Dragon Flying',NULL,NULL,'123',NULL,'536206','2093149','18.930285759929','99.343855766274',NULL,NULL,'b.png','2022-07-27 02:18:11','2022-07-09 02:43:49'),(26,'บริษัท ทิปโก้ฟูดส์(ประเทศไทย) จำกัด (มหาชน)','',NULL,'','','482048','2090229','18.904135831397','98.829532087094','','','b.png','0000-00-00 00:00:00','2022-07-09 02:43:49');
/*!40000 ALTER TABLE `factory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (41,'2014_10_12_000000_create_users_table',1),(42,'2014_10_12_100000_create_password_resets_table',1),(43,'2019_08_19_000000_create_failed_jobs_table',1),(44,'2022_07_07_123445_create_survey_table',1),(45,'2022_07_09_064112_create_factory',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey`
--

DROP TABLE IF EXISTS `survey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `factoryId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey`
--

LOCK TABLES `survey` WRITE;
/*!40000 ALTER TABLE `survey` DISABLE KEYS */;
/*!40000 ALTER TABLE `survey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `factory` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'factory_base'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-21 20:23:09
