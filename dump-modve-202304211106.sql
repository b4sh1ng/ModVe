-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: modve
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.27-MariaDB

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
-- Table structure for table `lehrer`
--

DROP TABLE IF EXISTS `lehrer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lehrer` (
  `Lid` int(11) NOT NULL AUTO_INCREMENT,
  `Lname` varchar(100) NOT NULL,
  `Lvname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Lid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lehrer`
--

LOCK TABLES `lehrer` WRITE;
/*!40000 ALTER TABLE `lehrer` DISABLE KEYS */;
INSERT INTO `lehrer` VALUES (1,'Ritter','Karl'),(2,'Obeldobel','Joachim'),(3,'Clos','Jürgen'),(4,'Hammen','Andreas');
/*!40000 ALTER TABLE `lehrer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module` (
  `Modnr` int(11) NOT NULL AUTO_INCREMENT,
  `Modu` varchar(100) NOT NULL,
  `Mstd` int(11) DEFAULT NULL,
  `Lid` int(11) NOT NULL,
  `Rnr` int(11) DEFAULT NULL,
  PRIMARY KEY (`Modnr`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` VALUES (1,'Technisches Singen',100,2,5215),(2,'Angewandte Philosophie',0,1,3228),(3,'Objektorientierte Messsysteme',1200,3,5210),(4,'Zustandslose Datenbanken',300,1,5215),(5,'Metallkunde',150,4,3228);
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulzuordnung`
--

DROP TABLE IF EXISTS `modulzuordnung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modulzuordnung` (
  `Modnr` int(11) NOT NULL,
  `Snr` int(11) NOT NULL,
  PRIMARY KEY (`Modnr`,`Snr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulzuordnung`
--

LOCK TABLES `modulzuordnung` WRITE;
/*!40000 ALTER TABLE `modulzuordnung` DISABLE KEYS */;
/*!40000 ALTER TABLE `modulzuordnung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `raeume`
--

DROP TABLE IF EXISTS `raeume`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `raeume` (
  `Rnr` int(11) NOT NULL,
  `Panz` int(11) DEFAULT NULL,
  PRIMARY KEY (`Rnr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `raeume`
--

LOCK TABLES `raeume` WRITE;
/*!40000 ALTER TABLE `raeume` DISABLE KEYS */;
INSERT INTO `raeume` VALUES (420,69),(3228,27),(5210,30),(5215,15);
/*!40000 ALTER TABLE `raeume` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schueler`
--

DROP TABLE IF EXISTS `schueler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schueler` (
  `Snr` int(11) NOT NULL AUTO_INCREMENT,
  `Sname` varchar(100) NOT NULL,
  `Svname` varchar(100) DEFAULT NULL,
  `gebd` date DEFAULT NULL,
  `Str` varchar(100) DEFAULT NULL,
  `PLZ` varchar(10) DEFAULT NULL,
  `Ort` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Snr`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schueler`
--

LOCK TABLES `schueler` WRITE;
/*!40000 ALTER TABLE `schueler` DISABLE KEYS */;
INSERT INTO `schueler` VALUES (1,'Otto','Daniel','1995-08-07','Am Alten Friedhof 1','67655','Kaiserslautern'),(2,'Belyea','Frank','1992-10-27','Gotherstraße 3','67663','Kaiserslautern'),(3,'Strelcov','Artem','1992-05-22','Münchstraße 14','67655','Kaiserslautern'),(4,'Fischer','Michael','1994-09-30','Carl-Zeiss-Straße 10','67227','Frankenthal'),(5,'Brusdeilins','Jan','2000-01-10','Schreberstraße 96','67075','Ludwigshafen');
/*!40000 ALTER TABLE `schueler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verw`
--

DROP TABLE IF EXISTS `verw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `verw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `access` int(11) NOT NULL,
  `passw` varchar(255) NOT NULL,
  `2fakey` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verw`
--

LOCK TABLES `verw` WRITE;
/*!40000 ALTER TABLE `verw` DISABLE KEYS */;
INSERT INTO `verw` VALUES (1,'ritter',10,'test','nope');
/*!40000 ALTER TABLE `verw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'modve'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-21 11:06:10
