-- MySQL dump 10.13  Distrib 5.7.36, for Win64 (x86_64)
--
-- Host: localhost    Database: gersoft
-- ------------------------------------------------------
-- Server version	5.7.36

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
-- Table structure for table `artigo`
--

DROP TABLE IF EXISTS `artigo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artigo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `referencia` varchar(45) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` float NOT NULL,
  `data` datetime NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `iva_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`categoria_id`),
  KEY `fk_artigo_iva1_idx` (`iva_id`),
  KEY `fk_artigo_categoria1_idx` (`categoria_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artigo`
--

LOCK TABLES `artigo` WRITE;
/*!40000 ALTER TABLE `artigo` DISABLE KEYS */;
/*!40000 ALTER TABLE `artigo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comentario_profile1_idx` (`profile_id`),
  CONSTRAINT `fk_comentario_profile1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeempresa` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `nif` varchar(45) NOT NULL,
  `morada` varchar(200) NOT NULL,
  `codpostal` varchar(20) NOT NULL,
  `localidade` varchar(255) DEFAULT NULL,
  `capitalsocial` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iva`
--

DROP TABLE IF EXISTS `iva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  `taxaiva` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iva`
--

LOCK TABLES `iva` WRITE;
/*!40000 ALTER TABLE `iva` DISABLE KEYS */;
/*!40000 ALTER TABLE `iva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linha_pedido`
--

DROP TABLE IF EXISTS `linha_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linha_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `preco` varchar(45) NOT NULL,
  `iva` varchar(45) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `artigo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`pedido_id`),
  KEY `fk_linha_pedido_pedido1_idx` (`pedido_id`),
  KEY `fk_linha_pedido_artigo1_idx` (`artigo_id`),
  CONSTRAINT `fk_linha_pedido_artigo1` FOREIGN KEY (`artigo_id`) REFERENCES `artigo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_linha_pedido_pedido1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linha_pedido`
--

LOCK TABLES `linha_pedido` WRITE;
/*!40000 ALTER TABLE `linha_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `linha_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mesa`
--

DROP TABLE IF EXISTS `mesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nrmesa` int(11) NOT NULL,
  `nrlugares` int(11) NOT NULL,
  `tipomesa` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mesa`
--

LOCK TABLES `mesa` WRITE;
/*!40000 ALTER TABLE `mesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `mesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metodo_pagamento`
--

DROP TABLE IF EXISTS `metodo_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metodo_pagamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomepagamento` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metodo_pagamento`
--

LOCK TABLES `metodo_pagamento` WRITE;
/*!40000 ALTER TABLE `metodo_pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `metodo_pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `total` float NOT NULL,
  `tipo_pedido` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `metodo_pagamento_id` int(11) NOT NULL,
  `mesa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedido_profile1_idx` (`profile_id`),
  KEY `fk_pedido_metodo_pagamento1_idx` (`metodo_pagamento_id`),
  KEY `fk_pedido_mesa1_idx` (`mesa_id`),
  CONSTRAINT `fk_pedido_mesa1` FOREIGN KEY (`mesa_id`) REFERENCES `mesa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_metodo_pagamento1` FOREIGN KEY (`metodo_pagamento_id`) REFERENCES `metodo_pagamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_profile1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numcontribuinte` varchar(45) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telemovel` varchar(45) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_profile_user1_idx` (`user_id`),
  CONSTRAINT `fk_profile_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(45) NOT NULL,
  `hora` varchar(45) NOT NULL,
  `nrpessoas` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reserva_profile1_idx` (`profile_id`),
  CONSTRAINT `fk_reserva_profile1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (5,'tiago','9R_Qb1NaNudneG5MeIp18aKV5NMTMhId','$2y$13$cPPThD1BGn0DlAfVfl.9juGbZ2egsTNYlXxDTpgCEta.lUzdWDNd.',NULL,'tiagoamaro021@gmail.com',10,1669980396,1669980396,'uY9N-9PY38DKifKo3EOAVpO-2x9PSNp9_1669980396');
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

-- Dump completed on 2022-12-06 12:31:25
