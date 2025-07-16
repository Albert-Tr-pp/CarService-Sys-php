-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: carservice
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `AppointmentID` smallint(6) NOT NULL AUTO_INCREMENT,
  `ClientID` smallint(6) NOT NULL,
  `App_Date` date NOT NULL,
  `App_Time` varchar(5) NOT NULL,
  `Cost` decimal(10,2) NOT NULL,
  `Status` char(1) NOT NULL,
  PRIMARY KEY (`AppointmentID`),
  KEY `fk_client` (`ClientID`),
  CONSTRAINT `fk_client` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ClientID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (32,1,'2025-05-05','10:00',1532.00,'R');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `ClientID` smallint(6) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `Phone` varchar(13) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `County` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Street` varchar(20) NOT NULL,
  `EirCode` varchar(7) NOT NULL,
  `Status` char(1) NOT NULL,
  PRIMARY KEY (`ClientID`),
  UNIQUE KEY `Phone` (`Phone`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Joe','Blackwood','+354654647545','woods@gmail.com','Carlow','Bluewater','St. Winton 23G','S45FG46','R'),(4,'Vasia','Prianick','+354654646546','prianick@gmail.com','NY','BlackTown','St. Winston 23a','F45HK46','R'),(12,'Jack','Morgan','+465767543567','jack221@gmail.com','LA','YellowRock','St. Winston 2c','G34BN46','R');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fordeletion`
--

DROP TABLE IF EXISTS `fordeletion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fordeletion` (
  `conditionItem` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fordeletion`
--

LOCK TABLES `fordeletion` WRITE;
/*!40000 ALTER TABLE `fordeletion` DISABLE KEYS */;
INSERT INTO `fordeletion` VALUES (1);
/*!40000 ALTER TABLE `fordeletion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parts`
--

DROP TABLE IF EXISTS `parts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parts` (
  `PartID` smallint(6) NOT NULL AUTO_INCREMENT,
  `Type` varchar(30) NOT NULL,
  `Compatibility` varchar(30) NOT NULL,
  `Supplier` varchar(30) NOT NULL,
  `Manufacturer` varchar(30) NOT NULL,
  `Quantity` smallint(6) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `usedTimes` smallint(6) NOT NULL,
  `Status` char(1) NOT NULL,
  PRIMARY KEY (`PartID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parts`
--

LOCK TABLES `parts` WRITE;
/*!40000 ALTER TABLE `parts` DISABLE KEYS */;
INSERT INTO `parts` VALUES (1,'Engine V8','Nisssan','Vasia_store24/7','Nissan LTD',96,1234.00,0,'R'),(2,'Engine V4','Nisssan GT','Vasia_store24/7','Nissan LTD',97,123.50,0,'R'),(3,'Brakes','Toyota','Toyota LCD','Toyota Japan',15,1254.00,0,'R'),(4,'Front Window','Nissan','Nissan LCD','Nissan Japan',35,376.00,0,'R'),(5,'Left Door','Suzuki','Suzuki LCD','Suzuki Japan',20,578.00,0,'R');
/*!40000 ALTER TABLE `parts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partsused`
--

DROP TABLE IF EXISTS `partsused`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partsused` (
  `AppointmentID` smallint(6) NOT NULL,
  `PartID` smallint(6) NOT NULL,
  KEY `fk_part` (`PartID`),
  KEY `fk_appointment` (`AppointmentID`),
  CONSTRAINT `fk_appointment` FOREIGN KEY (`AppointmentID`) REFERENCES `appointments` (`AppointmentID`),
  CONSTRAINT `fk_part` FOREIGN KEY (`PartID`) REFERENCES `parts` (`PartID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partsused`
--

LOCK TABLES `partsused` WRITE;
/*!40000 ALTER TABLE `partsused` DISABLE KEYS */;
INSERT INTO `partsused` VALUES (32,5),(32,5),(32,4);
/*!40000 ALTER TABLE `partsused` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-05 19:14:32
