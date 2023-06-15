CREATE DATABASE `modve`;
USE `modve`;
CREATE TABLE `lehrer` (
  `Lid` int(11) NOT NULL AUTO_INCREMENT,
  `Lname` varchar(100) NOT NULL,
  `Lvname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Lid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `lehrer` VALUES (1,'Ritter','Karl'),(2,'Obeldobel','Joachim'),(3,'Clos','Jürgen'),(4,'Hammen','Andreas');
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `module` (
  `Modnr` int(11) NOT NULL AUTO_INCREMENT,
  `Modu` varchar(100) NOT NULL,
  `Mstd` int(11) DEFAULT NULL,
  `Lid` int(11) NOT NULL,
  `Rnr` int(11) DEFAULT NULL,
  PRIMARY KEY (`Modnr`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `module` VALUES (1,'Technisches Singen',100,2,5215),(2,'Angewandte Philosophie',0,1,3228),(3,'Objektorientierte Messsysteme',1200,3,5210),(4,'Zustandslose Datenbanken',300,1,5215),(5,'Metallkunde',150,4,3228);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulzuordnung` (
  `Modnr` int(11) NOT NULL,
  `Snr` int(11) NOT NULL,
  PRIMARY KEY (`Modnr`,`Snr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `modulzuordnung` VALUES (1,1),(1,2),(1,3),(2,1),(2,5),(4,3),(4,5);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `raeume` (
  `Rnr` int(11) NOT NULL,
  `Panz` int(11) DEFAULT NULL,
  PRIMARY KEY (`Rnr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `raeume` VALUES (420,69),(3228,27),(5210,30),(5215,15);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
INSERT INTO `schueler` VALUES (1,'Otto','Daniel','1995-08-07','Am Alten Friedhof 1','67655','Kaiserslautern'),(2,'Belyea','Frank','1992-10-27','Gotherstraße 3','67663','Kaiserslautern'),(3,'Strelcov','Artem','1992-05-22','Münchstraße 14','67655','Kaiserslautern'),(4,'Fischer','Michael','1994-09-30','Carl-Zeiss-Straße 10','67227','Frankenthal'),(5,'Brusdeilins','Jan','2000-01-10','Schreberstraße 96','67075','Ludwigshafen');
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `verw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `access` int(11) NOT NULL,
  `passw` varchar(255) NOT NULL,
  `2fakey` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `verw` VALUES (1,'ritter',10,'$2y$10$/Ew2jA6pt3bP4qzNnvDBZuA8YbqIxycCbl4T2T1nPD1P6zeLuAXj6','GIZTIMTBGEYDGMLEHBSDSZBVGAYGEMRVGU4TGYIK');
