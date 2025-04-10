-- MariaDB dump 10.19  Distrib 10.5.23-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: user110
-- ------------------------------------------------------
-- Server version	10.5.23-MariaDB

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
-- Table structure for table `journal`
--

DROP TABLE IF EXISTS `journal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `journal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `ids` int(11) DEFAULT NULL,
  `tag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journal`
--

LOCK TABLES `journal` WRITE;
/*!40000 ALTER TABLE `journal` DISABLE KEYS */;
INSERT INTO `journal` VALUES (1,'Груша',2,3,304),(2,'Черный',5,5,306),(3,'Сильва',4,2,308),(4,'Локи',10,10,306),(5,'Елль',7,1,309),(6,'Пряник',1,6,302),(7,'Помидорка',1,8,307),(8,'Бумеранг',4,2,305),(9,'Веник',8,9,306),(10,'Харроу',8,1,306);
/*!40000 ALTER TABLE `journal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spicies`
--

DROP TABLE IF EXISTS `spicies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spicies` (
  `ids` int(10) unsigned NOT NULL,
  `breed` char(30) DEFAULT NULL,
  `type` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spicies`
--

LOCK TABLES `spicies` WRITE;
/*!40000 ALTER TABLE `spicies` DISABLE KEYS */;
INSERT INTO `spicies` VALUES (1,'Филин','Хищник'),(2,'Ястреб-тетеревятник','Хищник'),(3,'Куропатка','Травоядный'),(4,'Большая синица','Всеядный'),(5,'Ворон','Всеядный'),(6,'Воробей домовой','Всеядный'),(7,'Дрозд рябинник','Всеядный'),(8,'Снегирь','Всеядный'),(9,'Серая ворона','Всеядный'),(10,'Сорока','Всеядный');
/*!40000 ALTER TABLE `spicies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `tag` int(10) unsigned NOT NULL,
  `description` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (300,'Неизвестно'),(301,'Требуется операция'),(302,'Проходит восстановление в стационаре'),(303,'Требуется отправка в другой стационар'),(304,'Проходит обследование'),(305,'Дичает'),(306,'Требует ПМЖ'),(307,'Готов к выпуску'),(308,'Погиб'),(309,'Покинул центр');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-25 20:03:25
