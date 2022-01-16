-- MariaDB dump 10.19  Distrib 10.4.20-MariaDB, for Win64 (AMD64)
--
-- Host: jtb9ia3h1pgevwb1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com    Database: w5cgi2a0oinw4mtp
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nationalite_id` int DEFAULT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datedenaissance` date NOT NULL,
  `codeidentification` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9596AB6E1B063272` (`Nationalite_id`),
  CONSTRAINT `FK_9596AB6E1B063272` FOREIGN KEY (`Nationalite_id`) REFERENCES `nationalite` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agents`
--

LOCK TABLES `agents` WRITE;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` VALUES (1,1,'Fournel','Graziella','1986-01-10','fsdfsdgsd'),(2,1,'bghdgh','hghfgh','1947-01-01','hgdhdghfghnbnv'),(3,1,'bghdghgfhfghfhfgh','hghfgh','1947-01-01','hgdhdghfgh'),(4,1,'xsqdcqsd','dqsdqsd','1947-01-01','dsqdqsdqsd'),(5,1,'fsdsdf','fdsfsdfsdf','1967-01-01','fdsfsdfsdfsdf'),(6,1,'vcxvxcvxcvx','vcxvx','1947-01-01','vcxv'),(7,2,'dsqdqsd','dsqdsqdqsdqd','1947-01-01','qsdqsdqsdsqdqsd'),(8,1,'fgfdg','gfdgfdg','1947-01-01','gfdgfdgfdg');
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agents_specialite`
--

DROP TABLE IF EXISTS `agents_specialite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agents_specialite` (
  `Agents_id` int NOT NULL,
  `Specialite_id` int NOT NULL,
  PRIMARY KEY (`Agents_id`,`Specialite_id`),
  KEY `IDX_968C180709770DC` (`Agents_id`),
  KEY `IDX_968C1802195E0F0` (`Specialite_id`),
  CONSTRAINT `FK_968C1802195E0F0` FOREIGN KEY (`Specialite_id`) REFERENCES `specialite` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_968C180709770DC` FOREIGN KEY (`Agents_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agents_specialite`
--

LOCK TABLES `agents_specialite` WRITE;
/*!40000 ALTER TABLE `agents_specialite` DISABLE KEYS */;
INSERT INTO `agents_specialite` VALUES (6,2),(7,2),(8,2);
/*!40000 ALTER TABLE `agents_specialite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cibles`
--

DROP TABLE IF EXISTS `cibles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cibles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nationalite_id` int DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datedenaissance` date NOT NULL,
  `nomdecode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AAE47BC31B063272` (`Nationalite_id`),
  CONSTRAINT `FK_AAE47BC31B063272` FOREIGN KEY (`Nationalite_id`) REFERENCES `nationalite` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cibles`
--

LOCK TABLES `cibles` WRITE;
/*!40000 ALTER TABLE `cibles` DISABLE KEYS */;
INSERT INTO `cibles` VALUES (1,1,'gfdgfdg','gfdg','1947-01-01','gfdgdfgdfgdg'),(2,1,'cvxvxc','vcxvcx','1947-01-01','gfdgdfgdfgdg');
/*!40000 ALTER TABLE `cibles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nationalite_id` int DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datedenaissance` date NOT NULL,
  `nomdecode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_334015731B063272` (`Nationalite_id`),
  CONSTRAINT `FK_334015731B063272` FOREIGN KEY (`Nationalite_id`) REFERENCES `nationalite` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (3,1,'cvxv','vcxvcx','1947-01-01','vcxvcxvcxvx');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20211004185813','2022-01-10 21:14:56',3860);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `missions`
--

DROP TABLE IF EXISTS `missions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `missions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_id` int DEFAULT NULL,
  `statut_id` int DEFAULT NULL,
  `Specialite_id` int DEFAULT NULL,
  `Pays_id` int DEFAULT NULL,
  `titre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codemission` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datededebut` date NOT NULL,
  `datedefin` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_34F1D47EC54C8C93` (`type_id`),
  KEY `IDX_34F1D47EF6203804` (`statut_id`),
  KEY `IDX_34F1D47E2195E0F0` (`Specialite_id`),
  KEY `IDX_34F1D47EA6E44244` (`Pays_id`),
  CONSTRAINT `FK_34F1D47E2195E0F0` FOREIGN KEY (`Specialite_id`) REFERENCES `specialite` (`id`),
  CONSTRAINT `FK_34F1D47EA6E44244` FOREIGN KEY (`Pays_id`) REFERENCES `pays` (`id`),
  CONSTRAINT `FK_34F1D47EC54C8C93` FOREIGN KEY (`type_id`) REFERENCES `typemission` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `missions`
--

LOCK TABLES `missions` WRITE;
/*!40000 ALTER TABLE `missions` DISABLE KEYS */;
INSERT INTO `missions` VALUES (1,2,2,3,1,'xwXW','xwXWXW','xWXwX','2017-01-01','2017-01-01');
/*!40000 ALTER TABLE `missions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `missions_agents`
--

DROP TABLE IF EXISTS `missions_agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `missions_agents` (
  `Missions_id` int NOT NULL,
  `Agents_id` int NOT NULL,
  PRIMARY KEY (`Missions_id`,`Agents_id`),
  KEY `IDX_5340AFB917C042CF` (`Missions_id`),
  KEY `IDX_5340AFB9709770DC` (`Agents_id`),
  CONSTRAINT `FK_5340AFB917C042CF` FOREIGN KEY (`Missions_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_5340AFB9709770DC` FOREIGN KEY (`Agents_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `missions_agents`
--

LOCK TABLES `missions_agents` WRITE;
/*!40000 ALTER TABLE `missions_agents` DISABLE KEYS */;
INSERT INTO `missions_agents` VALUES (1,2),(1,4),(1,6);
/*!40000 ALTER TABLE `missions_agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `missions_cibles`
--

DROP TABLE IF EXISTS `missions_cibles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `missions_cibles` (
  `Missions_id` int NOT NULL,
  `Cibles_id` int NOT NULL,
  PRIMARY KEY (`Missions_id`,`Cibles_id`),
  KEY `IDX_6C327F1417C042CF` (`Missions_id`),
  KEY `IDX_6C327F149E046BDF` (`Cibles_id`),
  CONSTRAINT `FK_6C327F1417C042CF` FOREIGN KEY (`Missions_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_6C327F149E046BDF` FOREIGN KEY (`Cibles_id`) REFERENCES `cibles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `missions_cibles`
--

LOCK TABLES `missions_cibles` WRITE;
/*!40000 ALTER TABLE `missions_cibles` DISABLE KEYS */;
INSERT INTO `missions_cibles` VALUES (1,1),(1,2);
/*!40000 ALTER TABLE `missions_cibles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `missions_contacts`
--

DROP TABLE IF EXISTS `missions_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `missions_contacts` (
  `Missions_id` int NOT NULL,
  `Contacts_id` int NOT NULL,
  PRIMARY KEY (`Missions_id`,`Contacts_id`),
  KEY `IDX_FA54446417C042CF` (`Missions_id`),
  KEY `IDX_FA544464719FB48E` (`Contacts_id`),
  CONSTRAINT `FK_FA54446417C042CF` FOREIGN KEY (`Missions_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_FA544464719FB48E` FOREIGN KEY (`Contacts_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `missions_contacts`
--

LOCK TABLES `missions_contacts` WRITE;
/*!40000 ALTER TABLE `missions_contacts` DISABLE KEYS */;
INSERT INTO `missions_contacts` VALUES (1,3);
/*!40000 ALTER TABLE `missions_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `missions_planques`
--

DROP TABLE IF EXISTS `missions_planques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `missions_planques` (
  `Missions_id` int NOT NULL,
  `Planques_id` int NOT NULL,
  PRIMARY KEY (`Missions_id`,`Planques_id`),
  KEY `IDX_F9E5FE8A17C042CF` (`Missions_id`),
  KEY `IDX_F9E5FE8A70AF8C0F` (`Planques_id`),
  CONSTRAINT `FK_F9E5FE8A17C042CF` FOREIGN KEY (`Missions_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_F9E5FE8A70AF8C0F` FOREIGN KEY (`Planques_id`) REFERENCES `planques` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `missions_planques`
--

LOCK TABLES `missions_planques` WRITE;
/*!40000 ALTER TABLE `missions_planques` DISABLE KEYS */;
INSERT INTO `missions_planques` VALUES (1,1),(1,2);
/*!40000 ALTER TABLE `missions_planques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nationalite`
--

DROP TABLE IF EXISTS `nationalite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nationalite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nationalite`
--

LOCK TABLES `nationalite` WRITE;
/*!40000 ALTER TABLE `nationalite` DISABLE KEYS */;
INSERT INTO `nationalite` VALUES (1,'Espagnole'),(2,'sdqsdq'),(3,'gfdgdfgdf');
/*!40000 ALTER TABLE `nationalite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pays` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalite_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pays`
--

LOCK TABLES `pays` WRITE;
/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
INSERT INTO `pays` VALUES (1,'xcwvcxvcxv',1);
/*!40000 ALTER TABLE `pays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planques`
--

DROP TABLE IF EXISTS `planques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planques` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_id` int DEFAULT NULL,
  `codeidentification` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_30F1AF9DC54C8C93` (`type_id`),
  CONSTRAINT `FK_30F1AF9DC54C8C93` FOREIGN KEY (`type_id`) REFERENCES `typeplanque` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planques`
--

LOCK TABLES `planques` WRITE;
/*!40000 ALTER TABLE `planques` DISABLE KEYS */;
INSERT INTO `planques` VALUES (1,1,'fdsfs','fdsfsd',1),(2,1,'xcwxc','cxcxwc',1),(3,1,'cwxcwx','cxwcxwcw',1);
/*!40000 ALTER TABLE `planques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialite`
--

LOCK TABLES `specialite` WRITE;
/*!40000 ALTER TABLE `specialite` DISABLE KEYS */;
INSERT INTO `specialite` VALUES (2,'xwXWX'),(3,'sqdqsd'),(4,'dsqdqsd'),(5,'cfdsfdsf');
/*!40000 ALTER TABLE `specialite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statumission`
--

DROP TABLE IF EXISTS `statumission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statumission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statumission`
--

LOCK TABLES `statumission` WRITE;
/*!40000 ALTER TABLE `statumission` DISABLE KEYS */;
INSERT INTO `statumission` VALUES (1,'en cours'),(2,'terminÃ©');
/*!40000 ALTER TABLE `statumission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typemission`
--

DROP TABLE IF EXISTS `typemission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typemission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typemission`
--

LOCK TABLES `typemission` WRITE;
/*!40000 ALTER TABLE `typemission` DISABLE KEYS */;
INSERT INTO `typemission` VALUES (1,'Espionnage'),(2,'Assasinat');
/*!40000 ALTER TABLE `typemission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typeplanque`
--

DROP TABLE IF EXISTS `typeplanque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typeplanque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeplanque`
--

LOCK TABLES `typeplanque` WRITE;
/*!40000 ALTER TABLE `typeplanque` DISABLE KEYS */;
INSERT INTO `typeplanque` VALUES (1,'fgvdfgfd'),(2,'dsfdsfdsf');
/*!40000 ALTER TABLE `typeplanque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Grazou','[]','$2y$13$dhBdTQ25GU/c11vLlFeXU.1VDknkMS3oCUfuw29Eiayicf9jcQ.P6','Fournel','Graziella','1947-01-01',NULL),(2,'perenoel','[]','$2y$13$8TJArJQTfG77wDrf4FWxFedXr1jOPPB7bDggS2ZH2bNAuTJVNVbZK','papa','noel','2022-01-15','perrenoel@orange.fr');
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

-- Dump completed on 2022-01-15 16:44:15
cc53vsqwdfr613hv