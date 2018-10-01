-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: TheWay
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `caminhao`
--

DROP TABLE IF EXISTS `caminhao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caminhao` (
  `cod_caminhao` int(11) NOT NULL,
  `ano_modelo` year(4) DEFAULT NULL,
  `ano_fabricacao` year(4) DEFAULT NULL,
  `capacidade` int(11) DEFAULT NULL,
  `cod_modelo` int(11) DEFAULT NULL,
  `cod_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_caminhao`),
  KEY `cod_tipo` (`cod_tipo`),
  KEY `cod_modelo` (`cod_modelo`),
  CONSTRAINT `caminhao_ibfk_1` FOREIGN KEY (`cod_tipo`) REFERENCES `tipo_caminhao` (`cod_tipo`),
  CONSTRAINT `caminhao_ibfk_2` FOREIGN KEY (`cod_modelo`) REFERENCES `modelo` (`cod_modelo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caminhao`
--

LOCK TABLES `caminhao` WRITE;
/*!40000 ALTER TABLE `caminhao` DISABLE KEYS */;
/*!40000 ALTER TABLE `caminhao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caminhoneiro`
--

DROP TABLE IF EXISTS `caminhoneiro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caminhoneiro` (
  `cod_caminhoneiro` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(25) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `senha` varchar(25) NOT NULL,
  `rg` varchar(7) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `num_antt` varchar(45) NOT NULL,
  `num_cnh` varchar(11) NOT NULL,
  `categoria_cnh` varchar(1) NOT NULL,
  `cod_cidade` int(11) NOT NULL,
  `cod_caminhao` int(11) NOT NULL,
  PRIMARY KEY (`cod_caminhoneiro`),
  KEY `fk_caminhoneiro1_cidade1_idx` (`cod_cidade`),
  KEY `fk_caminhoneiro1_caminhao1_idx` (`cod_caminhao`),
  CONSTRAINT `fk_caminhoneiro1_caminhao1` FOREIGN KEY (`cod_caminhao`) REFERENCES `caminhao` (`cod_caminhao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_caminhoneiro1_cidade1` FOREIGN KEY (`cod_cidade`) REFERENCES `cidade` (`cod_cidade`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caminhoneiro`
--

LOCK TABLES `caminhoneiro` WRITE;
/*!40000 ALTER TABLE `caminhoneiro` DISABLE KEYS */;
/*!40000 ALTER TABLE `caminhoneiro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carreta`
--

DROP TABLE IF EXISTS `carreta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carreta` (
  `cod_carreta` int(11) NOT NULL,
  `ano_fabricacao` year(4) DEFAULT NULL,
  `ano_modelo` year(4) DEFAULT NULL,
  `cod_produto` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_carreta`),
  KEY `cod_produto` (`cod_produto`),
  CONSTRAINT `carreta_ibfk_1` FOREIGN KEY (`cod_produto`) REFERENCES `tipo_produto` (`cod_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carreta`
--

LOCK TABLES `carreta` WRITE;
/*!40000 ALTER TABLE `carreta` DISABLE KEYS */;
/*!40000 ALTER TABLE `carreta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidade`
--

DROP TABLE IF EXISTS `cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidade` (
  `nome` varchar(30) DEFAULT NULL,
  `cod_cidade` int(11) NOT NULL,
  `cod_estado` int(11) NOT NULL,
  PRIMARY KEY (`cod_cidade`),
  KEY `cod_estado` (`cod_estado`),
  CONSTRAINT `cidade_ibfk_1` FOREIGN KEY (`cod_estado`) REFERENCES `estado` (`cod_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `nome` varchar(30) DEFAULT NULL,
  `siglauf` char(2) DEFAULT NULL,
  `cod_estado` int(11) NOT NULL,
  PRIMARY KEY (`cod_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscricao`
--

DROP TABLE IF EXISTS `inscricao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscricao` (
  `cod_servico` int(11) DEFAULT NULL,
  `data_insc` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  KEY `cod_servico` (`cod_servico`),
  CONSTRAINT `inscricao_ibfk_1` FOREIGN KEY (`cod_servico`) REFERENCES `servico` (`cod_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscricao`
--

LOCK TABLES `inscricao` WRITE;
/*!40000 ALTER TABLE `inscricao` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscricao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelo`
--

DROP TABLE IF EXISTS `modelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelo` (
  `cod_modelo` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `cod_montadora` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_modelo`),
  KEY `cod_montadora` (`cod_montadora`),
  CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`cod_montadora`) REFERENCES `montadora` (`cod_montadora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelo`
--

LOCK TABLES `modelo` WRITE;
/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `montadora`
--

DROP TABLE IF EXISTS `montadora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `montadora` (
  `cod_montadora` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cod_montadora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `montadora`
--

LOCK TABLES `montadora` WRITE;
/*!40000 ALTER TABLE `montadora` DISABLE KEYS */;
/*!40000 ALTER TABLE `montadora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servico` (
  `numero_seguro` int(11) DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `cod_servico` int(11) NOT NULL,
  `data_cadastro` date DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `data_retirada` date DEFAULT NULL,
  `data_retirada_prev` date DEFAULT NULL,
  `data_entrega_prev` date DEFAULT NULL,
  `cod_status` int(11) DEFAULT NULL,
  `cod_cidade` int(11) DEFAULT NULL,
  `cod_produto` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_servico`),
  KEY `cod_status` (`cod_status`),
  KEY `cod_cidade` (`cod_cidade`),
  KEY `cod_produto` (`cod_produto`),
  CONSTRAINT `servico_ibfk_1` FOREIGN KEY (`cod_status`) REFERENCES `status_servico` (`cod_status`),
  CONSTRAINT `servico_ibfk_2` FOREIGN KEY (`cod_cidade`) REFERENCES `cidade` (`cod_cidade`),
  CONSTRAINT `servico_ibfk_3` FOREIGN KEY (`cod_produto`) REFERENCES `tipo_produto` (`cod_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servico`
--

LOCK TABLES `servico` WRITE;
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_servico`
--

DROP TABLE IF EXISTS `status_servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_servico` (
  `cod_status` int(11) NOT NULL,
  `desc_status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cod_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_servico`
--

LOCK TABLES `status_servico` WRITE;
/*!40000 ALTER TABLE `status_servico` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_caminhao`
--

DROP TABLE IF EXISTS `tipo_caminhao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_caminhao` (
  `cod_tipo` int(11) NOT NULL,
  `descricao` varchar(180) DEFAULT NULL,
  PRIMARY KEY (`cod_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_caminhao`
--

LOCK TABLES `tipo_caminhao` WRITE;
/*!40000 ALTER TABLE `tipo_caminhao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_caminhao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_produto`
--

DROP TABLE IF EXISTS `tipo_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_produto` (
  `cod_produto` int(11) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cod_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_produto`
--

LOCK TABLES `tipo_produto` WRITE;
/*!40000 ALTER TABLE `tipo_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transportadora`
--

DROP TABLE IF EXISTS `transportadora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transportadora` (
  `cod_transportadora` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(25) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `senha` varchar(25) NOT NULL,
  `razao_social` varchar(180) NOT NULL,
  `cnpj` int(11) NOT NULL,
  `cidade_cod_cidade` int(11) NOT NULL,
  PRIMARY KEY (`cod_transportadora`),
  KEY `fk_transportadora_cidade1_idx` (`cidade_cod_cidade`),
  CONSTRAINT `fk_transportadora_cidade1` FOREIGN KEY (`cidade_cod_cidade`) REFERENCES `cidade` (`cod_cidade`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transportadora`
--

LOCK TABLES `transportadora` WRITE;
/*!40000 ALTER TABLE `transportadora` DISABLE KEYS */;
/*!40000 ALTER TABLE `transportadora` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-14 14:37:38
