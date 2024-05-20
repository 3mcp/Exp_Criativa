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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `IdCategoria` int NOT NULL AUTO_INCREMENT,
  `NomeCategoria` varchar(200) DEFAULT NULL,
  `DescricaoCategoria` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`IdCategoria`),
  UNIQUE KEY `NomeCategoria` (`NomeCategoria`),
  UNIQUE KEY `DescricaoCategoria` (`DescricaoCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Vegetariano','Pratos que não contêm carne ou produtos de origem animal.'),(2,'Vegano','Pratos que não contêm nenhum ingrediente de origem animal.'),(3,'Sem Glúten','Pratos que não contêm glúten.'),(4,'Sem Lactose','Pratos que não contêm lactose.'),(5,'Orgânico','Pratos feitos com ingredientes cultivados sem o uso de pesticidas ou fertilizantes sintéticos.'),(6,'Sem Frutos do Mar','Pratos que não contêm frutos do mar ou produtos derivados.'),(7,'Sem Nozes','Pratos que não contêm nozes ou produtos derivados.'),(8,'Kosher','Pratos que seguem as leis dietéticas judaicas.'),(9,'Halal','Pratos que seguem as leis dietéticas islâmicas.'),(10,'Ceto','Pratos com baixo teor de carboidratos e alto teor de gorduras saudáveis.'),(11,'Paleo','Pratos que imitam os alimentos consumidos durante a era paleolítica, excluindo alimentos processados e agrícolas.'),(12,'Baixo teor de gordura','Pratos com reduzido teor de gordura.'),(13,'Baixo teor de açúcar','Pratos com reduzido teor de açúcar.'),(14,'Baixo teor de sódio','Pratos com reduzido teor de sódio.');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-20  9:18:49
