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
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentario` (
  `IdComentario` int NOT NULL AUTO_INCREMENT,
  `TextoComentario` varchar(300) DEFAULT NULL,
  `DataComentario` date DEFAULT NULL,
  `DenunciadoComentario` tinyint(1) DEFAULT '0',
  `NotaComentario` float DEFAULT NULL,
  `fk_Restaurante_IdRestaurante` int DEFAULT NULL,
  `fk_P_R_A__IdPRA` int DEFAULT NULL,
  PRIMARY KEY (`IdComentario`),
  KEY `FK_Comentario_2` (`fk_Restaurante_IdRestaurante`),
  KEY `FK_Comentario_3` (`fk_P_R_A__IdPRA`),
  CONSTRAINT `FK_Comentario_2` FOREIGN KEY (`fk_Restaurante_IdRestaurante`) REFERENCES `restaurante` (`IdRestaurante`) ON DELETE CASCADE,
  CONSTRAINT `FK_Comentario_3` FOREIGN KEY (`fk_P_R_A__IdPRA`) REFERENCES `p_r_a_` (`IdPRA`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` VALUES (1,'Muito bom o restaurante, comi a torta de frutas vermelhas e estava sensacional!','2024-05-20',0,5,1,46),(2,'Muito ruim, odiei, serviço péssimo. Espero que fechem o restaurante em 2 semanas','2024-05-20',1,1,1,95);
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-20  9:29:21
