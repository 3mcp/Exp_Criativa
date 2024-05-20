-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: safedish
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `prato_categoria`
--

DROP TABLE IF EXISTS `prato_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prato_categoria` (
  `IdPratoCategoria` int NOT NULL AUTO_INCREMENT,
  `fk_Categoria_IdCategoria` int DEFAULT NULL,
  `fk_Prato_IdPrato` int DEFAULT NULL,
  PRIMARY KEY (`IdPratoCategoria`),
  KEY `FK_Prato_Categoria_1` (`fk_Categoria_IdCategoria`),
  KEY `FK_Prato_Categoria_2` (`fk_Prato_IdPrato`),
  CONSTRAINT `FK_Prato_Categoria_1` FOREIGN KEY (`fk_Categoria_IdCategoria`) REFERENCES `categoria` (`IdCategoria`) ON DELETE CASCADE,
  CONSTRAINT `FK_Prato_Categoria_2` FOREIGN KEY (`fk_Prato_IdPrato`) REFERENCES `prato` (`IdPrato`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prato_categoria`
--

LOCK TABLES `prato_categoria` WRITE;
/*!40000 ALTER TABLE `prato_categoria` DISABLE KEYS */;
INSERT INTO `prato_categoria` VALUES (1,2,1),(2,3,1),(3,7,1),(4,3,2),(5,4,2),(6,11,2),(7,1,3),(8,3,3),(9,7,3),(10,13,3),(11,14,3),(12,1,4),(13,3,4),(14,4,4),(15,12,4),(16,13,4);
/*!40000 ALTER TABLE `prato_categoria` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-20  9:29:19
