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

drop schema if exists gersoft;
create schema gersoft;
use gersoft;
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
  `preco` float NOT NULL,
  `data` datetime NOT NULL,
  `imagem` longtext,
  `imagemurl` longtext,
  `estado` int(11) NOT NULL,
  `iva_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `referencia_UNIQUE` (`referencia`),
  KEY `fk_artigo_categoria_idx` (`categoria_id`),
  KEY `fk_artigo_iva_idx` (`iva_id`),
  CONSTRAINT `fk_artigo_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_artigo_iva` FOREIGN KEY (`iva_id`) REFERENCES `iva` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artigo`
--

LOCK TABLES `artigo` WRITE;
/*!40000 ALTER TABLE `artigo` DISABLE KEYS */;
INSERT INTO `artigo` VALUES (36,'Água','água','29789022200',1.2,'2023-01-09 05:25:39','art_36.jpg','http://localhost/gersoft/backend/web/images/art_36.jpg',1,4,5),(37,'Arroz Doce','Sobremesa Arroz Doce','234694572223',2.5,'2023-01-09 05:28:23','art_37.jpg','http://localhost/gersoft/backend/web/images/art_37.jpg',1,2,6),(38,'Arroz de Marisco(para 2 pessoas)','Arroz de Marisco para 2 pessoas','235565333267',49.5,'2023-01-09 05:31:03','art_38.jpg','http://localhost/gersoft/backend/web/images/art_38.jpg',1,2,2),(39,'Bacalhau á bras','Bacalhau á bras','236565674356',12,'2023-01-09 05:33:02','art_39.jpg','http://localhost/gersoft/backend/web/images/art_39.jpg',1,2,2),(40,'Café','café','153782086',0.7,'2023-01-09 05:34:09','art_40.jpg','http://localhost/gersoft/backend/web/images/art_40.jpg',1,3,6),(41,'Caldo Verde','Sopa de caldo verde','3457894536435',2.5,'2023-01-09 05:36:34','art_41.jpg','http://localhost/gersoft/backend/web/images/art_41.jpg',1,3,3),(42,'Canja','Canja ','3457894536344',2.5,'2023-01-09 05:37:21','art_42.jpg','http://localhost/gersoft/backend/web/images/art_42.jpg',1,3,3),(43,'Carne de Porco á alentejana','carne de porco á alentejana','2334564534532',12.5,'2023-01-09 05:39:08','art_43.jpg','http://localhost/gersoft/backend/web/images/art_43.jpg',1,3,1),(44,'Cerveja','Bebida cerveja','65423463647532',1.2,'2023-01-09 05:40:11','art_44.jpg','http://localhost/gersoft/backend/web/images/art_44.jpg',1,2,5),(45,'Cozido á Portuguesa','coziido á portuguesa','245534676575342',13.5,'2023-01-09 05:40:47','art_45.jpg','http://localhost/gersoft/backend/web/images/art_45.jpg',1,3,1),(46,'Jardineira','Jardineira','21356475632',9.5,'2023-01-09 05:41:37','art_46.jpg','http://localhost/gersoft/backend/web/images/art_46.jpg',1,3,1),(47,'Polvo á lagareiro','Polvo á lagareiro','23464536453',15,'2023-01-09 05:42:27','art_47.jpg','http://localhost/gersoft/backend/web/images/art_47.jpg',1,3,2),(48,'Sericaia','Sericaia','34265765324465',3.5,'2023-01-09 05:43:01','art_48.jpg','http://localhost/gersoft/backend/web/images/art_48.jpg',1,2,6),(49,'Sumo de Laranja','sumo','5346456675787546',1.5,'2023-01-09 05:43:32','art_49.jpg','http://localhost/gersoft/backend/web/images/art_49.jpg',1,2,5),(50,'Vinho Branco','Vinho Branco','435658746332546',7,'2023-01-09 05:44:06','art_50.jpg','http://localhost/gersoft/backend/web/images/art_50.jpg',1,2,5),(51,'Vinho Tinto','Vinho Tinto','23344675645',7,'2023-01-09 05:44:44','art_51.jpg','http://localhost/gersoft/backend/web/images/art_51.jpg',1,2,5),(52,'desativo','desativo','2345463453322',0,'2023-01-09 05:45:09','',NULL,0,2,1),(53,'teste','teste','12234235',22,'2023-01-09 05:47:35','',NULL,0,2,1),(55,'teste','teste de aceitacao','234253462',435,'2023-01-09 07:12:19','',NULL,1,3,1),(56,'teste','teste1','safasf',222,'2023-01-09 08:14:10','',NULL,0,2,1);
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
INSERT INTO `auth_assignment` VALUES ('admin','32',1672752464),('admin','37',1672761325),('admin','5',1672148145),('cliente','25',1672148145),('cliente','28',1672148129),('cliente','29',1672148145),('cliente','30',1672752403),('cliente','31',1672752464),('cliente','43',1673257264),('funcionario','35',1672761003),('funcionario','36',1672761148),('funcionario','38',1672761435),('funcionario','39',1672854908),('funcionario','40',1672865786),('funcionario','41',1673220548),('funcionario','42',1673245061);
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
INSERT INTO `auth_item` VALUES ('accessbackend',2,'Aceder ao backend',NULL,NULL,1672077684,1672077684),('accessfrontend',2,'Aceder ao frontend',NULL,NULL,1672077684,1672077684),('admin',1,NULL,NULL,NULL,1672077684,1672077684),('cliente',1,NULL,NULL,NULL,1672077684,1672077684),('create',2,'Criar registo de qualquer tabela',NULL,NULL,1672077684,1672077684),('createartigo',2,'Criar Artigo',NULL,NULL,1672077684,1672077684),('createcategoria',2,'Criar Categoria',NULL,NULL,1672077684,1672077684),('createcomentario',2,'Criar comentário',NULL,NULL,1672077684,1672077684),('createiva',2,'Criar Iva',NULL,NULL,1672077684,1672077684),('createlinhapedido',2,'Criar Linha de pedido',NULL,NULL,1672077684,1672077684),('createmesa',2,'Criar Mesa',NULL,NULL,1672077684,1672077684),('createmetodopagamento',2,'Criar Método Pagamento',NULL,NULL,1672077684,1672077684),('createpedido',2,'Criar Pedido',NULL,NULL,1672077684,1672077684),('createreserva',2,'Criar reserva',NULL,NULL,1672077684,1672077684),('createutilizador',2,'Criar Cliente',NULL,NULL,1672077684,1672077684),('delete',2,'Apagar',NULL,NULL,1672077684,1672077684),('deleteartigo',2,'Apagar Artigo',NULL,NULL,1672077684,1672077684),('deletecategoria',2,'Apagar Categoria',NULL,NULL,1672077684,1672077684),('deletecomentario',2,'Apagar comentário',NULL,NULL,1672077684,1672077684),('deleteiva',2,'Apagar taxa de iva',NULL,NULL,1672077684,1672077684),('deletelinhapedido',2,'Apagar linha pedido',NULL,NULL,1672077684,1672077684),('deletemesa',2,'Apagar Mesa',NULL,NULL,1672077684,1672077684),('deletemetodopagamento',2,'Apagar método pagamento',NULL,NULL,1672077684,1672077684),('deletepedido',2,'Apagar pedido',NULL,NULL,1672077684,1672077684),('deletereserva',2,'Apagar Reserva',NULL,NULL,1672077684,1672077684),('funcionario',1,NULL,NULL,NULL,1672077684,1672077684),('update',2,'Editar qualquer registo',NULL,NULL,1672077684,1672077684),('updateartigo',2,'Editar Artigo',NULL,NULL,1672077684,1672077684),('updatecategoria',2,'Editar Categoria',NULL,NULL,1672077684,1672077684),('updatecomentario',2,'Editar Comentário',NULL,NULL,1672077684,1672077684),('updateiva',2,'Editar taxa de iva',NULL,NULL,1672077684,1672077684),('updatelinhapedido',2,'Editar linha de pedido',NULL,NULL,1672077684,1672077684),('updatemesa',2,'Editar Mesa',NULL,NULL,1672077684,1672077684),('updatemetodopagamento',2,'Editar Método Pagamento',NULL,NULL,1672077684,1672077684),('updatepedido',2,'Editar pedido',NULL,NULL,1672077684,1672077684),('updatereserva',2,'Editar Reserva',NULL,NULL,1672077684,1672077684),('updateutilizador',2,'Editar Utilizador',NULL,NULL,1672077684,1672077684);
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
INSERT INTO `auth_item_child` VALUES ('admin','accessbackend'),('funcionario','accessbackend'),('cliente','accessfrontend'),('admin','create'),('admin','createartigo'),('funcionario','createartigo'),('admin','createcategoria'),('funcionario','createcategoria'),('admin','createcomentario'),('cliente','createcomentario'),('funcionario','createcomentario'),('admin','createiva'),('funcionario','createiva'),('admin','createlinhapedido'),('cliente','createlinhapedido'),('funcionario','createlinhapedido'),('admin','createmesa'),('funcionario','createmesa'),('admin','createmetodopagamento'),('admin','createpedido'),('cliente','createpedido'),('funcionario','createpedido'),('admin','createreserva'),('cliente','createreserva'),('funcionario','createreserva'),('admin','createutilizador'),('funcionario','createutilizador'),('admin','delete'),('admin','deleteartigo'),('funcionario','deleteartigo'),('admin','deletecategoria'),('admin','deletecomentario'),('cliente','deletecomentario'),('funcionario','deletecomentario'),('admin','deleteiva'),('admin','deletelinhapedido'),('cliente','deletelinhapedido'),('funcionario','deletelinhapedido'),('admin','deletemesa'),('admin','deletemetodopagamento'),('admin','deletepedido'),('cliente','deletepedido'),('funcionario','deletepedido'),('admin','deletereserva'),('cliente','deletereserva'),('funcionario','deletereserva'),('admin','update'),('admin','updateartigo'),('funcionario','updateartigo'),('admin','updatecategoria'),('funcionario','updatecategoria'),('admin','updatecomentario'),('cliente','updatecomentario'),('funcionario','updatecomentario'),('admin','updateiva'),('funcionario','updateiva'),('admin','updatelinhapedido'),('cliente','updatelinhapedido'),('funcionario','updatelinhapedido'),('admin','updatemesa'),('funcionario','updatemesa'),('admin','updatemetodopagamento'),('admin','updatepedido'),('cliente','updatepedido'),('funcionario','updatepedido'),('admin','updatereserva'),('cliente','updatereserva'),('funcionario','updatereserva'),('admin','updateutilizador'),('funcionario','updateutilizador');
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
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Carne','Pratos de Carne',1),(2,'Peixe','Pratos de Peixe',1),(3,'Sopa','Pratos de Sopa',1),(4,'Entradas','Pratos de Entrada',1),(5,'Bebidas','bebidas',1),(6,'Sobremesas','Sobremesas',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` VALUES (1,'Ver para querer','Teste',10),(4,'Opnião sobre os artigos do menu','Na minha opnião o menu está muito completo.',2);
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
  `capitalsocial` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'Gersoft','gersoft-geral@gersoft.com','962348456','513706873',' R. Gen. Norton de Matos Apartado 4133','2411-901','Leiria',150000);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iva`
--

LOCK TABLES `iva` WRITE;
/*!40000 ALTER TABLE `iva` DISABLE KEYS */;
INSERT INTO `iva` VALUES (1,'Iva Teste 1%',1,0),(2,'Taxa normal',23,1),(3,'Taxa Intermédia',13,1),(4,'Taxa Reduzida',6,1);
/*!40000 ALTER TABLE `iva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linhapedido`
--

DROP TABLE IF EXISTS `linhapedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linhapedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `valorunitario` float NOT NULL,
  `valoriva` float NOT NULL,
  `taxaiva` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `artigo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_linha_pedido_pedido1_idx` (`pedido_id`),
  KEY `fk_linha_pedido_artigo_idx` (`artigo_id`),
  CONSTRAINT `fk_linha_pedido_artigo` FOREIGN KEY (`artigo_id`) REFERENCES `artigo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_linha_pedido_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linhapedido`
--

LOCK TABLES `linhapedido` WRITE;
/*!40000 ALTER TABLE `linhapedido` DISABLE KEYS */;
INSERT INTO `linhapedido` VALUES (35,2,49.5,22.77,23,31,38),(40,2,49.5,22.77,23,34,38),(41,2,2.5,1.15,23,34,37),(44,2,49.5,11.385,23,36,38),(45,2,1.2,0.072,6,36,36),(46,10,1.2,0.72,6,39,36),(47,10,1.2,0.72,6,40,36),(48,10,1.2,0.72,6,41,36),(49,10,1.2,0.72,6,42,36),(50,10,1.2,0.72,6,43,36),(51,10,1.2,0.72,6,44,36),(52,10,1.2,0.72,6,45,36),(53,10,1.2,0.72,6,46,36),(54,10,1.2,0.72,6,47,36),(55,3,1.2,0.072,6,48,36),(56,2,9.5,1.235,13,48,46),(57,10,1.2,0.72,6,49,36),(58,10,1.2,0.72,6,50,36);
/*!40000 ALTER TABLE `linhapedido` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mesa`
--

LOCK TABLES `mesa` WRITE;
/*!40000 ALTER TABLE `mesa` DISABLE KEYS */;
INSERT INTO `mesa` VALUES (1,1,5,'quadrada'),(2,2,10,'quadrada'),(9,3,12,'retangular'),(10,4,4,'quadrada'),(11,5,6,'retangular'),(12,6,10,'circular'),(13,7,4,'quadrada'),(14,8,5,'circular'),(15,9,8,'retangular'),(16,10,6,'retangular');
/*!40000 ALTER TABLE `mesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metodopagamento`
--

DROP TABLE IF EXISTS `metodopagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metodopagamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomepagamento` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metodopagamento`
--

LOCK TABLES `metodopagamento` WRITE;
/*!40000 ALTER TABLE `metodopagamento` DISABLE KEYS */;
INSERT INTO `metodopagamento` VALUES (1,'MbWay',1),(2,' Multibanco',1),(3,'Dinheiro',1),(4,'Mastercard',1),(5,'Maestro',1),(6,'Visa',1),(7,'teste',0);
/*!40000 ALTER TABLE `metodopagamento` ENABLE KEYS */;
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
INSERT INTO `migration` VALUES ('m000000_000000_base',1670331359),('m130524_201442_init',1670331361),('m190124_110200_add_verification_token_column_to_user_table',1670331361),('m140506_102106_rbac_init',1670331427),('m170907_052038_rbac_add_index_on_auth_assignment_user_id',1670331427),('m180523_151638_rbac_updates_indexes_without_prefix',1670331427),('m200409_110543_rbac_update_mssql_trigger',1670331427);
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
  `estado` varchar(100) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `metodo_pagamento_id` int(11) DEFAULT NULL,
  `mesa_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedido_profile1_idx` (`profile_id`),
  KEY `fk_pedido_metodo_pagamento1_idx` (`metodo_pagamento_id`),
  KEY `fk_pedido_mesa1_idx` (`mesa_id`),
  CONSTRAINT `fk_pedido_mesa1` FOREIGN KEY (`mesa_id`) REFERENCES `mesa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_metodo_pagamento1` FOREIGN KEY (`metodo_pagamento_id`) REFERENCES `metodopagamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_profile1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (31,'2023-01-09 06:18:06',99,0,'Concluído',1,3,9),(32,'2023-01-09 06:22:46',0,0,'Cancelado',1,NULL,11),(34,'2023-01-09 06:32:29',127.92,0,'Concluído',7,1,11),(36,'2023-01-09 06:46:41',124.314,1,'Concluído',2,1,NULL),(37,'2023-01-09 08:08:39',0,0,'Em Processamento',1,NULL,1),(38,'2023-01-09 08:10:54',0,0,'Em Processamento',1,NULL,1),(39,'2023-01-09 08:11:54',0,0,'Em Processamento',1,NULL,1),(40,'2023-01-09 08:12:54',19.2,0,'Concluído',1,1,1),(41,'2023-01-09 08:14:54',19.2,0,'Concluído',1,1,1),(42,'2023-01-09 08:17:15',19.2,0,'Concluído',1,1,1),(43,'2023-01-09 08:20:15',0,0,'Em Processamento',1,NULL,1),(44,'2023-01-09 08:20:45',19.2,0,'Concluído',1,1,1),(45,'2023-01-09 08:22:00',19.2,0,'Concluído',1,1,1),(46,'2023-01-09 08:28:45',19.2,0,'Concluído',1,1,1),(47,'2023-01-09 08:39:00',19.2,0,'Concluído',1,1,1),(48,'2023-01-09 09:12:00',0,1,'Em Processamento',2,NULL,NULL),(49,'2023-01-09 10:49:01',19.2,0,'Concluído',1,1,1),(50,'2023-01-09 11:24:30',0,0,'Em Processamento',1,NULL,1);
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
  `telemovel` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numcontribuinte_UNIQUE` (`numcontribuinte`),
  KEY `fk_profile_user1_idx` (`user_id`),
  CONSTRAINT `fk_profile_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,'234555111','912345412',1,5),(2,'222222222','911111111',1,25),(5,'212222332','923567662',1,29),(6,'221112222','923456782',1,30),(7,'156789234','923456789',1,31),(8,'222333123','9222222655',1,32),(10,'223464777','915463221',1,35),(17,'246123555','965342888',1,42),(18,'256879666','935678341',1,43);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (1,'22/05/2023','13:30',5,2,2),(2,'22/05/2023','19:30',5,2,5),(3,'23/05/2022','20:00',5,2,2),(11,'31/05/2023','12:00',5,2,2),(12,'31/07/2022','13:00',5,1,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (5,'tiago','9R_Qb1NaNudneG5MeIp18aKV5NMTMhId','$2y$13$CjVWtfEzpginK0kcpDrwrOVViw1Pea36082nNNpMW5yqvzZS4QwEK',NULL,'tiagoamaro021@gmail.com',10,1669980396,1672957294,'uY9N-9PY38DKifKo3EOAVpO-2x9PSNp9_1669980396'),(25,'bernardo','SwqsYsSzen1wSXRZYb_-P1pPEbbFXcey','$2y$13$bQ6jSevGoFmHNUyniy67DOqcWdJRZZOR7b8C3Llq3QEfkn8PvTZg2',NULL,'bernardo@gmail.com',10,1671721707,1672958259,'7L5Q4ZqfHFjfML3rcYzCJaEA9Cu2PQsA_1671721707'),(29,'fabio','O45T70WzP2o1Mdn-pOV_Gd-HimtX9wG5','$2y$13$SrXmOSpUfF9IMVIXOgNI/uRDfSGW5rfwrZYtH71q/I6VdVMcczK9i',NULL,'fabio@gmail.com',10,1672148145,1672148145,'7-3Egl6UIZrrKsnBFq2M2bmjkuxJ8B9P_1672148145'),(30,'diogo','20ZfdmicVC-Q__b-yiFdH4T5PgcX_gBd','$2y$13$z9QkN.2Lt4Ua7BTan4NiHeXKP2bRR0Pxt0FQ8m776cLH/DMYotEzi',NULL,'diogo@hotmail.com',10,1672752403,1672752403,'27MY6UV4CRamrUDErLWStpy8SxJ6oOCK_1672752403'),(31,'joao','zcdbfdor4-O8EaML4kbAHG7H6PmBxtkk','$2y$13$bOPCzTccgAAS5eWky9LpjO.n1zX8RNjsUgsthKB6d2WWnKYCqd7Be',NULL,'joao@gmail.com',10,1672752464,1672752464,'z0T-O6HRKr3xi327IXiHJPOCIVs9mK11_1672752464'),(32,'admin','ZdT5-21tvDPssygmsg_xMiZ5UoJR90Qz','$2y$13$XD0xD1eawlk.Z1ntIXzqTOXpyIHlsipDOr314yjgkh1DK9Ew5njo2',NULL,'admin@admin.pt',10,1672760277,1672760277,'6M_Ht1BSboZXqEX-3fym81GqYHGumm90_1672760277'),(35,'funcionario','rfldxmx03ZScPptJLSEZP6ucbXrxX2z-','$2y$13$y6NgUkgFAYSuluvtPwp6ruB8HA0b4Cd0JD9pYjKyvwTTUCJUQNRh.',NULL,'funcionario@gmail.pt',10,1672761003,1672761003,'h0_C4TvHPxU_Hd2ifX4EwZAAyPfIYdbB_1672761003'),(42,'Fernando','VOJ6dOlOUhdhc6FxbdMWmrsZbG6K72SE','$2y$13$lCWXrDCO1dTnHJciYnEoC.hvz1oGlS8m8Bvj3u61y.9vmJ91Jx/iW',NULL,'fernando@gmail.com',10,1673245061,1673245061,'bOL1fla_iNd83eNpQPKxN55NCKOV0ljp_1673245061'),(43,'miguel','mq5XpHiHU_b1iLiuT5ntAFH6ND7N9PJt','$2y$13$hdXq/NOrbeu5OAR8kuRSJOAxbhu.lL3EWVOAV1pOdNA0WaNLmFe6.',NULL,'miguel@gmail.com',10,1673257264,1673257264,'mqkqnhzKkAixfaf5CiawCBwyfwiDLemA_1673257264');
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

-- Dump completed on 2023-01-09 11:40:08
