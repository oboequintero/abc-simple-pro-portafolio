-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: AbcSimple
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB-0+deb9u1

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
-- Table structure for table `Abecedario`
--

DROP TABLE IF EXISTS `Abecedario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Abecedario` (
  `id_abc` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ruta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_abc`) USING BTREE,
  UNIQUE KEY `tips_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Abecedario`
--

LOCK TABLES `Abecedario` WRITE;
/*!40000 ALTER TABLE `Abecedario` DISABLE KEYS */;
INSERT INTO `Abecedario` VALUES (2,'letra a','letra a',1,'2018-07-13 18:24:44','2018-07-13 18:24:44','Vowels.mp3'),(3,'letra b','letra b',1,'2018-07-13 18:34:13','2018-07-13 18:34:13','Vowels.mp3'),(4,'letra c','letra c',1,'2018-07-13 18:34:41','2018-07-13 18:34:41','Vowels.mp3'),(5,'letra d','letra d',1,'2018-07-13 18:36:32','2018-07-13 18:36:32','Vowels.mp3'),(6,'letra e','letra e',1,'2018-07-14 00:04:54','2018-07-14 00:04:54','Vowels.mp3');
/*!40000 ALTER TABLE `Abecedario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Almacenes`
--

DROP TABLE IF EXISTS `Almacenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Almacenes` (
  `id_alm` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_emp` int(10) DEFAULT NULL,
  `nombre` varchar(191) DEFAULT NULL,
  `descri` varchar(191) DEFAULT NULL,
  `activo` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_alm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Almacenes`
--

LOCK TABLES `Almacenes` WRITE;
/*!40000 ALTER TABLE `Almacenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `Almacenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Auditoria`
--

DROP TABLE IF EXISTS `Auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Auditoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) DEFAULT NULL,
  `campo_modificado` varchar(255) DEFAULT NULL,
  `valor_anterior` varchar(255) DEFAULT NULL,
  `valor_nuevo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Auditoria`
--

LOCK TABLES `Auditoria` WRITE;
/*!40000 ALTER TABLE `Auditoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `Auditoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Carrito_Compras`
--

DROP TABLE IF EXISTS `Carrito_Compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Carrito_Compras` (
  `id_carrito` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_curso` int(10) unsigned DEFAULT NULL,
  `id_paquete` int(10) unsigned DEFAULT NULL,
  `id_promocion` int(10) unsigned DEFAULT NULL,
  `id_estatus` int(10) unsigned DEFAULT NULL,
  `precio` double(8,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_carrito`),
  KEY `carrito_compras_id_estatus_foreign` (`id_estatus`),
  KEY `carrito_compras_id_curso_foreign` (`id_curso`),
  CONSTRAINT `carrito_compras_id_curso_foreign` FOREIGN KEY (`id_curso`) REFERENCES `Cursos` (`id_curso`) ON UPDATE CASCADE,
  CONSTRAINT `carrito_compras_id_estatus_foreign` FOREIGN KEY (`id_estatus`) REFERENCES `Tipo_Estatus` (`id_estatus`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Carrito_Compras`
--

LOCK TABLES `Carrito_Compras` WRITE;
/*!40000 ALTER TABLE `Carrito_Compras` DISABLE KEYS */;
INSERT INTO `Carrito_Compras` VALUES (1,1,1,NULL,NULL,1,27.00,'2018-08-22 15:45:51','2018-08-22 15:45:51');
/*!40000 ALTER TABLE `Carrito_Compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cliente_cursos`
--

DROP TABLE IF EXISTS `Cliente_cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cliente_cursos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `id_leccion` int(11) NOT NULL,
  `id_plantilla` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cliente_cursos`
--

LOCK TABLES `Cliente_cursos` WRITE;
/*!40000 ALTER TABLE `Cliente_cursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `Cliente_cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Compra_Promociones`
--

DROP TABLE IF EXISTS `Compra_Promociones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Compra_Promociones` (
  `id_compra_promo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_compra` int(10) unsigned NOT NULL,
  `id_promocion` int(10) unsigned NOT NULL,
  `precio` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_compra_promo`),
  UNIQUE KEY `compra_promociones_id_compra_id_promocion_unique` (`id_compra`,`id_promocion`),
  KEY `compra_promociones_id_promocion_foreign` (`id_promocion`),
  CONSTRAINT `compra_promociones_id_compra_foreign` FOREIGN KEY (`id_compra`) REFERENCES `Compras` (`id_compra`) ON UPDATE CASCADE,
  CONSTRAINT `compra_promociones_id_promocion_foreign` FOREIGN KEY (`id_promocion`) REFERENCES `Promociones` (`id_promocion`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Compra_Promociones`
--

LOCK TABLES `Compra_Promociones` WRITE;
/*!40000 ALTER TABLE `Compra_Promociones` DISABLE KEYS */;
/*!40000 ALTER TABLE `Compra_Promociones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Compras`
--

DROP TABLE IF EXISTS `Compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Compras` (
  `id_compra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_persona` int(10) unsigned NOT NULL,
  `total` double(8,2) NOT NULL,
  `idCompra_anulada` int(11) NOT NULL,
  `fecha_compra` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_compra`),
  KEY `compras_id_persona_foreign` (`id_persona`),
  CONSTRAINT `compras_id_persona_foreign` FOREIGN KEY (`id_persona`) REFERENCES `Personas` (`id_persona`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Compras`
--

LOCK TABLES `Compras` WRITE;
/*!40000 ALTER TABLE `Compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `Compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Compras_Cursos`
--

DROP TABLE IF EXISTS `Compras_Cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Compras_Cursos` (
  `id_compra_c` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_compra` int(10) unsigned NOT NULL,
  `id_curso` int(10) unsigned NOT NULL,
  `precio` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_compra_c`),
  UNIQUE KEY `compras_cursos_id_compra_id_curso_unique` (`id_compra`,`id_curso`),
  KEY `compras_cursos_id_curso_foreign` (`id_curso`),
  CONSTRAINT `compras_cursos_id_compra_foreign` FOREIGN KEY (`id_compra`) REFERENCES `Compras` (`id_compra`) ON UPDATE CASCADE,
  CONSTRAINT `compras_cursos_id_curso_foreign` FOREIGN KEY (`id_curso`) REFERENCES `Cursos` (`id_curso`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Compras_Cursos`
--

LOCK TABLES `Compras_Cursos` WRITE;
/*!40000 ALTER TABLE `Compras_Cursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `Compras_Cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Compras_Paquetes`
--

DROP TABLE IF EXISTS `Compras_Paquetes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Compras_Paquetes` (
  `id_compra_pa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_compra` int(10) unsigned NOT NULL,
  `id_paquete` int(10) unsigned NOT NULL,
  `precio` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_compra_pa`),
  UNIQUE KEY `compras_paquetes_id_compra_id_paquete_unique` (`id_compra`,`id_paquete`),
  KEY `compras_paquetes_id_paquete_foreign` (`id_paquete`),
  CONSTRAINT `compras_paquetes_id_compra_foreign` FOREIGN KEY (`id_compra`) REFERENCES `Compras` (`id_compra`) ON UPDATE CASCADE,
  CONSTRAINT `compras_paquetes_id_paquete_foreign` FOREIGN KEY (`id_paquete`) REFERENCES `Paquetes` (`id_paquete`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Compras_Paquetes`
--

LOCK TABLES `Compras_Paquetes` WRITE;
/*!40000 ALTER TABLE `Compras_Paquetes` DISABLE KEYS */;
/*!40000 ALTER TABLE `Compras_Paquetes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Contenido`
--

DROP TABLE IF EXISTS `Contenido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contenido` (
  `id_contenido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_plantilla` int(10) unsigned NOT NULL,
  `id_tipo_con` int(255) unsigned NOT NULL,
  `idhtml` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamano` int(10) DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parrafo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo` int(11) NOT NULL,
  `negrita` tinyint(1) NOT NULL DEFAULT '0',
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000000',
  `fin_s` tinyint(1) NOT NULL DEFAULT '0',
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_contenido`),
  UNIQUE KEY `contenido_id_plantilla_nombre_unique` (`id_plantilla`,`nombre`),
  UNIQUE KEY `contenido_id_plantilla_idhtml_unique` (`id_plantilla`,`idhtml`),
  KEY `contenido_id_tipo_con_foreign` (`id_tipo_con`),
  CONSTRAINT `contenido_id_plantilla_foreign` FOREIGN KEY (`id_plantilla`) REFERENCES `Plantillas` (`id_plantilla`) ON UPDATE CASCADE,
  CONSTRAINT `contenido_id_tipo_con_foreign` FOREIGN KEY (`id_tipo_con`) REFERENCES `Tipo_Contenido` (`id_tipo_con`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contenido`
--

LOCK TABLES `Contenido` WRITE;
/*!40000 ALTER TABLE `Contenido` DISABLE KEYS */;
INSERT INTO `Contenido` VALUES (9,1,1,'3#video','Bienvenido-Video',1,'video de bienvenida','introduccion_curso.mp4','no aplica',5,0,'#000000',0,1,'2018-06-29 21:44:19','2019-06-20 20:16:21');
/*!40000 ALTER TABLE `Contenido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Contenido_Ejercicio`
--

DROP TABLE IF EXISTS `Contenido_Ejercicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contenido_Ejercicio` (
  `id_contenido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_ejercicio` int(10) unsigned NOT NULL,
  `id_tipo_con` int(10) unsigned NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parrafo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_contenido`),
  KEY `contenido_ejercicio_id_ejercicio_foreign` (`id_ejercicio`),
  KEY `contenido_ejercicio_id_tipo_con_foreign` (`id_tipo_con`),
  CONSTRAINT `contenido_ejercicio_id_ejercicio_foreign` FOREIGN KEY (`id_ejercicio`) REFERENCES `Ejercicios` (`id_ejercicio`) ON UPDATE CASCADE,
  CONSTRAINT `contenido_ejercicio_id_tipo_con_foreign` FOREIGN KEY (`id_tipo_con`) REFERENCES `Tipo_Contenido` (`id_tipo_con`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contenido_Ejercicio`
--

LOCK TABLES `Contenido_Ejercicio` WRITE;
/*!40000 ALTER TABLE `Contenido_Ejercicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `Contenido_Ejercicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cursa`
--

DROP TABLE IF EXISTS `Cursa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cursa` (
  `id_curso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_persona` int(10) unsigned NOT NULL,
  `id_nivel` int(10) unsigned NOT NULL,
  `fecha_inicio` timestamp NULL DEFAULT NULL,
  `fecha_final` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_curso`),
  KEY `cursa_id_persona_foreign` (`id_persona`),
  KEY `cursa_id_nivel_foreign` (`id_nivel`),
  CONSTRAINT `cursa_id_nivel_foreign` FOREIGN KEY (`id_nivel`) REFERENCES `Niveles` (`id_nivel`) ON UPDATE CASCADE,
  CONSTRAINT `cursa_id_persona_foreign` FOREIGN KEY (`id_persona`) REFERENCES `Personas` (`id_persona`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cursa`
--

LOCK TABLES `Cursa` WRITE;
/*!40000 ALTER TABLE `Cursa` DISABLE KEYS */;
/*!40000 ALTER TABLE `Cursa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cursos`
--

DROP TABLE IF EXISTS `Cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cursos` (
  `id_curso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_idioma` int(10) unsigned NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_curso`),
  UNIQUE KEY `cursos_id_idioma_nombre_unique` (`id_idioma`,`nombre`),
  UNIQUE KEY `cursos_codigo_unique` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cursos`
--

LOCK TABLES `Cursos` WRITE;
/*!40000 ALTER TABLE `Cursos` DISABLE KEYS */;
INSERT INTO `Cursos` VALUES (1,1,'C1','Curso Inglés Básico','Curso de Ingles 11 niveles',30.00,1,'españa.jpg','2018-07-19 07:02:00','2018-10-26 22:27:28'),(2,2,'C5','Curso Español 65756','Curso Prueba Ingles espanol Abc Simple',55.00,1,NULL,'2019-01-28 22:15:06','2019-08-08 22:42:22'),(3,1,'wwww','wwww','wwww',444.00,1,NULL,'2019-07-19 19:00:42','2019-07-19 19:00:42'),(4,4,'eee','eee','eee',333.00,1,NULL,'2019-07-19 19:01:27','2019-07-19 19:01:27'),(5,1,'rrrr','rrrr','3333',28.00,1,NULL,'2019-07-25 18:43:46','2019-07-25 18:43:46');
/*!40000 ALTER TABLE `Cursos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`casuarez`@`localhost`*/ /*!50003 TRIGGER `cursos_after_insert` AFTER INSERT ON `Cursos` FOR EACH ROW BEGIN

    -- Insert record into audit table
   INSERT INTO products
   ( id_curso,
     id_categoria
     )
   VALUES
   ( NEW.id_curso,
     '1'
     );

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Diccionarios`
--

DROP TABLE IF EXISTS `Diccionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Diccionarios` (
  `id_diccionario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_idioma` int(10) unsigned NOT NULL,
  `palabra` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `traduccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta_audio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta_video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_diccionario`),
  UNIQUE KEY `diccionarios_id_idioma_palabra_unique` (`id_idioma`,`palabra`),
  CONSTRAINT `diccionarios_id_idioma_foreign` FOREIGN KEY (`id_idioma`) REFERENCES `Idiomas` (`id_idioma`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Diccionarios`
--

LOCK TABLES `Diccionarios` WRITE;
/*!40000 ALTER TABLE `Diccionarios` DISABLE KEYS */;
INSERT INTO `Diccionarios` VALUES (1,1,'mouse','raton','prueba','prueba','pruebas','2018-07-10 20:13:22','2018-07-10 20:15:24');
/*!40000 ALTER TABLE `Diccionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ejemplos`
--

DROP TABLE IF EXISTS `Ejemplos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ejemplos` (
  `id_ejemplo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_leccion` int(10) unsigned NOT NULL,
  `id_tipo_ejercicio` int(10) unsigned NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ejemplo`),
  UNIQUE KEY `ejemplos_id_leccion_nombre_unique` (`id_leccion`,`nombre`),
  UNIQUE KEY `ejemplos_codigo_unique` (`codigo`),
  KEY `ejemplos_id_tipo_ejercicio_foreign` (`id_tipo_ejercicio`),
  CONSTRAINT `ejemplos_id_tipo_ejercicio_foreign` FOREIGN KEY (`id_tipo_ejercicio`) REFERENCES `Tipos_Ejercicios` (`id_tipo_ejercicio`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ejemplos`
--

LOCK TABLES `Ejemplos` WRITE;
/*!40000 ALTER TABLE `Ejemplos` DISABLE KEYS */;
/*!40000 ALTER TABLE `Ejemplos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ejercicios`
--

DROP TABLE IF EXISTS `Ejercicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ejercicios` (
  `id_ejercicio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_tipo_ejercicio` int(10) unsigned NOT NULL,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puntaje` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ejercicio`),
  KEY `ejercicios_id_tipo_ejercicio_foreign` (`id_tipo_ejercicio`),
  CONSTRAINT `ejercicios_id_tipo_ejercicio_foreign` FOREIGN KEY (`id_tipo_ejercicio`) REFERENCES `Tipo_ejercicio` (`id_tipo_ejercicio`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ejercicios`
--

LOCK TABLES `Ejercicios` WRITE;
/*!40000 ALTER TABLE `Ejercicios` DISABLE KEYS */;
INSERT INTO `Ejercicios` VALUES (1,1,'0002','PRUEBA',7,1,'2018-08-23 22:21:16','2018-08-23 22:21:16');
/*!40000 ALTER TABLE `Ejercicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ejercicios_By_Examen`
--

DROP TABLE IF EXISTS `Ejercicios_By_Examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ejercicios_By_Examen` (
  `id_ejercicio_by_examen` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_examen` int(10) unsigned NOT NULL,
  `id_ejercicio` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ejercicio_by_examen`),
  UNIQUE KEY `ejercicios_by_examen_id_examen_id_ejercicio_unique` (`id_examen`,`id_ejercicio`),
  KEY `ejercicios_by_examen_id_ejercicio_foreign` (`id_ejercicio`),
  CONSTRAINT `ejercicios_by_examen_id_ejercicio_foreign` FOREIGN KEY (`id_ejercicio`) REFERENCES `Ejercicios` (`id_ejercicio`) ON UPDATE CASCADE,
  CONSTRAINT `ejercicios_by_examen_id_examen_foreign` FOREIGN KEY (`id_examen`) REFERENCES `Examenes` (`id_examen`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ejercicios_By_Examen`
--

LOCK TABLES `Ejercicios_By_Examen` WRITE;
/*!40000 ALTER TABLE `Ejercicios_By_Examen` DISABLE KEYS */;
/*!40000 ALTER TABLE `Ejercicios_By_Examen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Evaluacion_by_Personas`
--

DROP TABLE IF EXISTS `Evaluacion_by_Personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Evaluacion_by_Personas` (
  `id_evaluacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_nivel` int(10) unsigned NOT NULL,
  `id_leccion` int(10) unsigned NOT NULL,
  `id_examen` int(10) unsigned NOT NULL,
  `id_persona` int(10) unsigned NOT NULL,
  `id_ejercicio` int(10) unsigned NOT NULL,
  `puntaje` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_evaluacion`),
  KEY `evaluacion_by_personas_id_persona_foreign` (`id_persona`),
  KEY `evaluacion_by_personas_id_nivel_foreign` (`id_nivel`),
  KEY `evaluacion_by_personas_id_leccion_foreign` (`id_leccion`),
  KEY `evaluacion_by_personas_id_examen_foreign` (`id_examen`),
  KEY `evaluacion_by_personas_id_ejercicio_foreign` (`id_ejercicio`),
  CONSTRAINT `evaluacion_by_personas_id_ejercicio_foreign` FOREIGN KEY (`id_ejercicio`) REFERENCES `Ejercicios` (`id_ejercicio`) ON UPDATE CASCADE,
  CONSTRAINT `evaluacion_by_personas_id_examen_foreign` FOREIGN KEY (`id_examen`) REFERENCES `Examenes` (`id_examen`) ON UPDATE CASCADE,
  CONSTRAINT `evaluacion_by_personas_id_leccion_foreign` FOREIGN KEY (`id_leccion`) REFERENCES `Lecciones` (`id_leccion`) ON UPDATE CASCADE,
  CONSTRAINT `evaluacion_by_personas_id_nivel_foreign` FOREIGN KEY (`id_nivel`) REFERENCES `Niveles` (`id_nivel`) ON UPDATE CASCADE,
  CONSTRAINT `evaluacion_by_personas_id_persona_foreign` FOREIGN KEY (`id_persona`) REFERENCES `Personas` (`id_persona`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Evaluacion_by_Personas`
--

LOCK TABLES `Evaluacion_by_Personas` WRITE;
/*!40000 ALTER TABLE `Evaluacion_by_Personas` DISABLE KEYS */;
/*!40000 ALTER TABLE `Evaluacion_by_Personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Examen_ejercicio`
--

DROP TABLE IF EXISTS `Examen_ejercicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Examen_ejercicio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_examen` int(10) unsigned NOT NULL,
  `id_ejercicio` int(10) unsigned NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `examen_ejercicio_id_examen_id_ejercicio_unique` (`id_examen`,`id_ejercicio`),
  KEY `examen_ejercicio_id_ejercicio_foreign` (`id_ejercicio`),
  CONSTRAINT `examen_ejercicio_id_ejercicio_foreign` FOREIGN KEY (`id_ejercicio`) REFERENCES `Ejercicios` (`id_ejercicio`),
  CONSTRAINT `examen_ejercicio_id_examen_foreign` FOREIGN KEY (`id_examen`) REFERENCES `Examenes` (`id_examen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Examen_ejercicio`
--

LOCK TABLES `Examen_ejercicio` WRITE;
/*!40000 ALTER TABLE `Examen_ejercicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `Examen_ejercicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Examenes`
--

DROP TABLE IF EXISTS `Examenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Examenes` (
  `id_examen` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_leccion` int(10) unsigned NOT NULL,
  `id_tipo_examen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_examen`),
  KEY `examenes_id_leccion_foreign` (`id_leccion`),
  CONSTRAINT `examenes_id_leccion_foreign` FOREIGN KEY (`id_leccion`) REFERENCES `Lecciones` (`id_leccion`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Examenes`
--

LOCK TABLES `Examenes` WRITE;
/*!40000 ALTER TABLE `Examenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `Examenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Idiomas`
--

DROP TABLE IF EXISTS `Idiomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Idiomas` (
  `id_idioma` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_idioma`),
  UNIQUE KEY `idiomas_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Idiomas`
--

LOCK TABLES `Idiomas` WRITE;
/*!40000 ALTER TABLE `Idiomas` DISABLE KEYS */;
INSERT INTO `Idiomas` VALUES (1,'INGLES','APRENDE INGLES SIMPLE',1,'EEUU.jpg','2018-06-28 19:00:07','2019-03-15 23:08:12'),(2,'tttt','ttttttt',1,NULL,'2019-07-04 15:43:16','2019-07-04 15:43:16'),(4,'DSFDSAFGSG','SFDSDGSDFGSF',1,NULL,'2019-07-04 15:46:25','2019-07-04 15:46:25'),(5,'RUSO','EEEEEE',1,NULL,'2019-07-25 14:57:23','2019-07-25 14:57:23');
/*!40000 ALTER TABLE `Idiomas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Lecciones`
--

DROP TABLE IF EXISTS `Lecciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Lecciones` (
  `id_leccion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_nivel` int(10) unsigned NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `ruta` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_leccion`),
  UNIQUE KEY `lecciones_id_nivel_nombre_unique` (`id_nivel`,`nombre`),
  UNIQUE KEY `lecciones_codigo_unique` (`codigo`),
  CONSTRAINT `lecciones_id_nivel_foreign` FOREIGN KEY (`id_nivel`) REFERENCES `Niveles` (`id_nivel`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Lecciones`
--

LOCK TABLES `Lecciones` WRITE;
/*!40000 ALTER TABLE `Lecciones` DISABLE KEYS */;
INSERT INTO `Lecciones` VALUES (4,1,'N1-L0','Lección 1','A corta Plural un / una',1,NULL,'2018-08-27 22:09:11','2019-05-29 23:21:37'),(5,1,'N1L0P23','3','3',1,NULL,'2019-07-04 16:02:53','2019-07-04 16:02:53'),(9,1,'YYYYYRRRRR','3RRRRRRRRRRRRRRRRRR','YYYY',1,NULL,'2019-07-04 19:10:29','2019-07-04 19:10:29');
/*!40000 ALTER TABLE `Lecciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Niveles`
--

DROP TABLE IF EXISTS `Niveles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Niveles` (
  `id_nivel` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_curso` int(10) unsigned NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `ruta` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_nivel`),
  UNIQUE KEY `niveles_codigo_unique` (`codigo`),
  UNIQUE KEY `niveles_id_curso_nombre_unique` (`id_curso`,`nombre`) USING BTREE,
  CONSTRAINT `nivel_id_curso_forein` FOREIGN KEY (`id_curso`) REFERENCES `Cursos` (`id_curso`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Niveles`
--

LOCK TABLES `Niveles` WRITE;
/*!40000 ALTER TABLE `Niveles` DISABLE KEYS */;
INSERT INTO `Niveles` VALUES (1,1,'N1','NIVEL UNO','NIVEL UNO ESP-INGLES',1,NULL,'2018-06-28 19:48:37','2019-05-29 23:21:01'),(2,1,'N7','NIVEL 7','NIVEL 7 PRUEBA CURSO ABC SIMPLE',1,NULL,'2019-07-25 15:05:24','2019-07-25 15:05:24'),(3,1,'N7EE','NIVEL 7RR','NIVEL 7 PRUEBA CURSO ABC SIMPLE',1,NULL,'2019-07-25 15:05:46','2019-07-25 15:05:46'),(4,3,'YYYYY','NIVEL 7','ADFAFAF',1,NULL,'2019-08-08 18:45:21','2019-08-08 18:45:21');
/*!40000 ALTER TABLE `Niveles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Opciones`
--

DROP TABLE IF EXISTS `Opciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Opciones` (
  `id_opcion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_contenido` int(10) unsigned NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_opcion`),
  UNIQUE KEY `opciones_id_contenido_nombre_unique` (`id_contenido`,`nombre`),
  CONSTRAINT `opciones_id_contenido_foreign` FOREIGN KEY (`id_contenido`) REFERENCES `Contenido` (`id_contenido`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Opciones`
--

LOCK TABLES `Opciones` WRITE;
/*!40000 ALTER TABLE `Opciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `Opciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Paquetes`
--

DROP TABLE IF EXISTS `Paquetes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Paquetes` (
  `id_paquete` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posicion` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_paquete`),
  UNIQUE KEY `paquetes_codigo_unique` (`codigo`),
  UNIQUE KEY `paquetes_nombre_unique` (`nombre`),
  UNIQUE KEY `posicion` (`posicion`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Paquetes`
--

LOCK TABLES `Paquetes` WRITE;
/*!40000 ALTER TABLE `Paquetes` DISABLE KEYS */;
INSERT INTO `Paquetes` VALUES (1,'PAQ1','PAQUETE11o','DESCRIPCIÓN PAQUETE 1',150.00,1,NULL,1,'2018-10-03 23:41:43','2018-10-03 23:41:43'),(3,'PAQ123123uuuu','PAQUETE 123uuuu','EL 123uuu',450.00,1,NULL,12,'2018-11-20 22:18:18','2018-11-20 22:18:18'),(41,'PAQ12312349877','PAQUETE 1230987','EL 123uuu9877',0.00,1,NULL,13,'2018-12-19 19:58:53','2018-12-19 19:58:53'),(43,'cd5151','PAQUETE 123yyyyy','EL 123uuu',0.00,1,NULL,9,'2018-12-19 19:59:53','2018-12-19 19:59:53'),(44,'Paq2','PAQUETE 2','DESCRIPCION PAQUETE2',0.00,1,NULL,7,'2018-12-26 13:54:23','2018-12-26 13:54:23'),(45,'Paq3','PAQUETE 3','DESCRIPCION PAQUETE3',0.00,1,NULL,4,'2018-12-26 13:55:07','2018-12-26 13:55:07'),(46,'Paq4','PAQUETE 4','DESCRIPCION PAQUETE4',0.00,1,NULL,3,'2018-12-26 13:55:38','2018-12-26 13:55:38'),(47,'Paq5','PAQUETE 5','DESCRIPCION PAQUETE5',0.00,1,NULL,10,'2018-12-26 13:55:55','2018-12-26 13:55:55'),(48,'Paq6','PAQUETE 6','DESCRIPCION PAQUETE56',0.00,1,NULL,11,'2018-12-26 13:56:18','2018-12-26 13:56:18'),(49,'PAQ7','PAQUETE7','DESCRIPCION PAQUETE 7',0.00,1,NULL,5,'2019-01-02 17:35:21','2019-01-02 17:35:21'),(50,'PAQ8','PAQUETE8','DESCRIPCION PAQ8',0.00,1,NULL,6,'2019-01-02 19:03:01','2019-01-02 19:03:01'),(51,'PAQ9','PAQUETE9','DESCRIPCION PAQ9',0.00,1,NULL,8,'2019-01-02 19:04:26','2019-01-02 19:04:26'),(54,'PAQ10','PAQUETE10','DESCRIPCION PAQ10',0.00,1,NULL,2,'2019-01-02 19:05:37','2019-01-02 19:05:37'),(55,'232444','tttttt','ttttttt',0.00,1,NULL,14,'2019-06-06 15:55:51','2019-06-06 15:55:51'),(56,'tttt','tttt','tttt',0.00,1,NULL,15,'2019-06-06 15:56:05','2019-06-06 15:56:05');
/*!40000 ALTER TABLE `Paquetes` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`casuarez`@`localhost`*/ /*!50003 TRIGGER `Paquete_after_insert` AFTER INSERT ON `Paquetes` FOR EACH ROW BEGIN
    -- Insert record into audit table
   INSERT INTO products
   ( id_paquete,
     id_categoria
     )
   VALUES
   ( NEW.id_paquete,
     '2'
     );

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Paquetes_Cursos`
--

DROP TABLE IF EXISTS `Paquetes_Cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Paquetes_Cursos` (
  `id_paq_curso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paquete` int(10) unsigned NOT NULL,
  `id_curso` int(10) unsigned NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_paq_curso`),
  UNIQUE KEY `paquetes_cursos_id_paquete_id_curso_unique` (`id_paquete`,`id_curso`),
  KEY `paquetes_cursos_id_curso_foreign` (`id_curso`),
  CONSTRAINT `Paquetes_Cursos_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `Cursos` (`id_curso`) ON UPDATE CASCADE,
  CONSTRAINT `Paquetes_Cursos_ibfk_2` FOREIGN KEY (`id_paquete`) REFERENCES `Paquetes` (`id_paquete`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Paquetes_Cursos`
--

LOCK TABLES `Paquetes_Cursos` WRITE;
/*!40000 ALTER TABLE `Paquetes_Cursos` DISABLE KEYS */;
INSERT INTO `Paquetes_Cursos` VALUES (1,43,1,1,'2019-05-08 00:12:33','2019-05-08 00:12:33'),(2,1,2,1,'2019-05-09 23:14:33','2019-05-09 23:14:33');
/*!40000 ALTER TABLE `Paquetes_Cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Personas`
--

DROP TABLE IF EXISTS `Personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Personas` (
  `id_persona` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iddocumento` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_persona`),
  UNIQUE KEY `personas_iddocumento_unique` (`iddocumento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Personas`
--

LOCK TABLES `Personas` WRITE;
/*!40000 ALTER TABLE `Personas` DISABLE KEYS */;
/*!40000 ALTER TABLE `Personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Plantillas`
--

DROP TABLE IF EXISTS `Plantillas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Plantillas` (
  `id_plantilla` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_leccion` int(10) unsigned NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `pagina` int(11) NOT NULL,
  `tipo_plantilla` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_plantilla`),
  UNIQUE KEY `plantillas_id_leccion_nombre_unique` (`id_leccion`,`nombre`),
  UNIQUE KEY `plantillas_codigo_unique` (`codigo`) USING BTREE,
  UNIQUE KEY `plantillas_id_leccion_pagina_tipo_plantilla_unique` (`id_leccion`,`pagina`,`tipo_plantilla`),
  KEY `plantillas_tipo_plantilla_foreign` (`tipo_plantilla`),
  CONSTRAINT `plantillas_id_leccion_foreign` FOREIGN KEY (`id_leccion`) REFERENCES `Lecciones` (`id_leccion`) ON UPDATE CASCADE,
  CONSTRAINT `plantillas_tipo_plantilla_foreign` FOREIGN KEY (`tipo_plantilla`) REFERENCES `Tipo_Plantilla` (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Plantillas`
--

LOCK TABLES `Plantillas` WRITE;
/*!40000 ALTER TABLE `Plantillas` DISABLE KEYS */;
INSERT INTO `Plantillas` VALUES (1,4,'N1L0P1','Bienvenida','Lamina de Bienvenida',1,1,3,'2018-06-28 19:58:33','2019-05-14 22:18:18'),(2,4,'N1L0P2','Lección 1','Desarrollo lección 1',1,2,3,'2019-05-03 19:09:46','2019-05-14 22:18:27'),(3,4,'N1L0P3','GATO','Imagen de gato',1,3,1,'2019-05-06 22:43:41','2019-05-06 22:43:41'),(4,4,'N1L0P4','LÁMPARA','Imagen de la Lámpara',1,4,1,'2019-05-16 17:47:27','2019-05-16 17:47:27'),(6,4,'N1L0P5','BANDERA','Imagen de la Bandera',1,5,1,'2019-05-16 17:47:27','2019-05-16 17:47:27'),(7,4,'N1L0P6','VASO','Imagen de el Vaso',1,6,1,'2019-05-16 17:47:27','2019-05-16 17:47:27');
/*!40000 ALTER TABLE `Plantillas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Promocion_curso`
--

DROP TABLE IF EXISTS `Promocion_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Promocion_curso` (
  `id_pr_c` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_promocion` int(10) unsigned NOT NULL,
  `id_curso` int(10) unsigned NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pr_c`),
  UNIQUE KEY `promocion_curso_id_promocion_id_curso_unique` (`id_promocion`,`id_curso`),
  KEY `promocion_curso_id_curso_foreign` (`id_curso`),
  CONSTRAINT `Promocion_curso_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `Cursos` (`id_curso`),
  CONSTRAINT `Promocion_curso_ibfk_2` FOREIGN KEY (`id_promocion`) REFERENCES `Promociones` (`id_promocion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Promocion_curso`
--

LOCK TABLES `Promocion_curso` WRITE;
/*!40000 ALTER TABLE `Promocion_curso` DISABLE KEYS */;
INSERT INTO `Promocion_curso` VALUES (1,1,1,1,'2018-11-14 19:33:59','2018-11-14 19:33:59'),(3,3,1,1,'2019-01-29 14:59:03','2019-01-29 14:59:03');
/*!40000 ALTER TABLE `Promocion_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Promocion_paquete`
--

DROP TABLE IF EXISTS `Promocion_paquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Promocion_paquete` (
  `id_pr_pa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_promocion` int(10) unsigned NOT NULL,
  `id_paquete` int(10) unsigned NOT NULL,
  `activo` int(5) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pr_pa`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Promocion_paquete`
--

LOCK TABLES `Promocion_paquete` WRITE;
/*!40000 ALTER TABLE `Promocion_paquete` DISABLE KEYS */;
INSERT INTO `Promocion_paquete` VALUES (4,3,1,1,'2019-01-29 14:59:09','2019-02-12 19:25:50'),(22,3,41,1,'2019-02-12 15:46:00','2019-02-12 15:46:00'),(46,4,1,1,'2019-02-13 14:53:58','2019-02-13 14:53:58'),(49,5,44,1,'2019-02-26 20:04:58','2019-02-26 20:04:58'),(50,5,3,1,'2019-02-26 20:05:25','2019-02-26 20:05:25'),(52,1,43,1,'2019-03-20 15:52:03','2019-03-21 23:06:03'),(53,2,1,1,'2019-05-09 19:17:39','2019-05-09 19:17:39');
/*!40000 ALTER TABLE `Promocion_paquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Promociones`
--

DROP TABLE IF EXISTS `Promociones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Promociones` (
  `id_promocion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `gratis` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_promocion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Promociones`
--

LOCK TABLES `Promociones` WRITE;
/*!40000 ALTER TABLE `Promociones` DISABLE KEYS */;
INSERT INTO `Promociones` VALUES (1,'PRUEBA','PRUEBA R','PRUEBAS',200.00,1,1,'2018-08-23 22:47:08','2019-02-15 23:15:51'),(2,'PRUEBA1','PRUEBA1','PRUEBA1',4545.00,1,1,'2018-08-24 18:20:06','2019-05-09 23:57:50'),(3,'promo-10','promo','promo prueba',120.00,1,0,'2018-11-14 18:29:48','2019-02-12 18:59:55'),(4,'PROMO-25','Promoción 25','Promoción para probar',50.00,1,0,'2019-02-12 17:38:39','2019-02-12 17:38:39'),(5,'PROMOC8','Promocion 8','Promocion 8',2520.00,1,0,'2019-02-27 00:04:47','2019-02-27 00:06:19');
/*!40000 ALTER TABLE `Promociones` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`casuarez`@`localhost`*/ /*!50003 TRIGGER `Promocion_after_insert` AFTER INSERT ON `Promociones` FOR EACH ROW BEGIN
    -- Insert record into audit table
   INSERT INTO products
   ( id_promocion,
     id_categoria
     )
   VALUES
   ( NEW.id_promocion,
     '3'
     );

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Puntaje_by_Examen`
--

DROP TABLE IF EXISTS `Puntaje_by_Examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Puntaje_by_Examen` (
  `id_puntaje` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `maximo` int(11) NOT NULL,
  `minimo` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_puntaje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Puntaje_by_Examen`
--

LOCK TABLES `Puntaje_by_Examen` WRITE;
/*!40000 ALTER TABLE `Puntaje_by_Examen` DISABLE KEYS */;
/*!40000 ALTER TABLE `Puntaje_by_Examen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Puntaje_examen`
--

DROP TABLE IF EXISTS `Puntaje_examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Puntaje_examen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_examen` int(10) unsigned NOT NULL,
  `maximo` int(11) NOT NULL,
  `minimo` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `puntaje_examen_id_examen_foreign` (`id_examen`),
  CONSTRAINT `puntaje_examen_id_examen_foreign` FOREIGN KEY (`id_examen`) REFERENCES `Examenes` (`id_examen`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Puntaje_examen`
--

LOCK TABLES `Puntaje_examen` WRITE;
/*!40000 ALTER TABLE `Puntaje_examen` DISABLE KEYS */;
/*!40000 ALTER TABLE `Puntaje_examen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tipo_Cliente`
--

DROP TABLE IF EXISTS `Tipo_Cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tipo_Cliente` (
  `id_tipo_cliente` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tipo_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tipo_Cliente`
--

LOCK TABLES `Tipo_Cliente` WRITE;
/*!40000 ALTER TABLE `Tipo_Cliente` DISABLE KEYS */;
INSERT INTO `Tipo_Cliente` VALUES (1,'Cliente','Cliente web',1,NULL,NULL),(2,'Empleado','Empleado de Empresa',1,NULL,NULL);
/*!40000 ALTER TABLE `Tipo_Cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tipo_Contenido`
--

DROP TABLE IF EXISTS `Tipo_Contenido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tipo_Contenido` (
  `id_tipo_con` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tipo_con`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tipo_Contenido`
--

LOCK TABLES `Tipo_Contenido` WRITE;
/*!40000 ALTER TABLE `Tipo_Contenido` DISABLE KEYS */;
INSERT INTO `Tipo_Contenido` VALUES (1,'video','videos ',1,'2018-09-27 18:09:17','2018-09-27 18:09:17'),(2,'parrafo','texto',1,'2018-09-27 18:10:06','2018-09-27 18:10:06'),(3,'imagen','imagen',1,'2018-11-14 18:19:42','2018-11-14 18:19:42'),(4,'palabra','palabra',1,'2018-11-14 18:20:14','2018-11-14 18:20:14'),(5,'titulo','titulo',1,'2019-03-18 20:13:04','2019-03-18 20:13:04'),(6,'seccion','secciones',1,'2019-03-19 19:30:12','2019-03-19 19:30:12');
/*!40000 ALTER TABLE `Tipo_Contenido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tipo_Estatus`
--

DROP TABLE IF EXISTS `Tipo_Estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tipo_Estatus` (
  `id_estatus` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_estatus`),
  UNIQUE KEY `tipo_estatus_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tipo_Estatus`
--

LOCK TABLES `Tipo_Estatus` WRITE;
/*!40000 ALTER TABLE `Tipo_Estatus` DISABLE KEYS */;
INSERT INTO `Tipo_Estatus` VALUES (1,'FACTURA',1,'2018-08-22 13:17:46','2018-08-22 13:17:46');
/*!40000 ALTER TABLE `Tipo_Estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tipo_Plantilla`
--

DROP TABLE IF EXISTS `Tipo_Plantilla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tipo_Plantilla` (
  `id_tipo` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tipo_Plantilla`
--

LOCK TABLES `Tipo_Plantilla` WRITE;
/*!40000 ALTER TABLE `Tipo_Plantilla` DISABLE KEYS */;
INSERT INTO `Tipo_Plantilla` VALUES (1,'imagen-video'),(2,'Tips'),(3,'maquina-video'),(4,'parrafo-video');
/*!40000 ALTER TABLE `Tipo_Plantilla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tipo_Productos`
--

DROP TABLE IF EXISTS `Tipo_Productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tipo_Productos` (
  `id_t_producto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_t_producto`),
  UNIQUE KEY `tipo_productos_nombre_unique` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tipo_Productos`
--

LOCK TABLES `Tipo_Productos` WRITE;
/*!40000 ALTER TABLE `Tipo_Productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `Tipo_Productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tipo_ejercicio`
--

DROP TABLE IF EXISTS `Tipo_ejercicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tipo_ejercicio` (
  `id_tipo_ejercicio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tipo_ejercicio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tipo_ejercicio`
--

LOCK TABLES `Tipo_ejercicio` WRITE;
/*!40000 ALTER TABLE `Tipo_ejercicio` DISABLE KEYS */;
INSERT INTO `Tipo_ejercicio` VALUES (1,'SELECCION','SELECCION',1,'2018-08-23 22:20:54','2018-08-23 22:20:54');
/*!40000 ALTER TABLE `Tipo_ejercicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tipo_examen`
--

DROP TABLE IF EXISTS `Tipo_examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tipo_examen` (
  `id_tipo_examen` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tipo_examen`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tipo_examen`
--

LOCK TABLES `Tipo_examen` WRITE;
/*!40000 ALTER TABLE `Tipo_examen` DISABLE KEYS */;
INSERT INTO `Tipo_examen` VALUES (1,'EJEMPLO',1,'2018-08-23 00:21:15','2018-08-23 00:21:15');
/*!40000 ALTER TABLE `Tipo_examen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tipos_Ejercicios`
--

DROP TABLE IF EXISTS `Tipos_Ejercicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tipos_Ejercicios` (
  `id_tipo_ejercicio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tipo_ejercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tipos_Ejercicios`
--

LOCK TABLES `Tipos_Ejercicios` WRITE;
/*!40000 ALTER TABLE `Tipos_Ejercicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `Tipos_Ejercicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tips`
--

DROP TABLE IF EXISTS `Tips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tips` (
  `id_tips` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_leccion` int(10) unsigned NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tips`) USING BTREE,
  UNIQUE KEY `plantillas_id_leccion_nombre_unique` (`id_leccion`,`nombre`),
  UNIQUE KEY `plantillas_codigo_unique` (`codigo`),
  CONSTRAINT `Tips_ibfk_1` FOREIGN KEY (`id_leccion`) REFERENCES `Lecciones` (`id_leccion`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tips`
--

LOCK TABLES `Tips` WRITE;
/*!40000 ALTER TABLE `Tips` DISABLE KEYS */;
/*!40000 ALTER TABLE `Tips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tips_By_Plantilla`
--

DROP TABLE IF EXISTS `Tips_By_Plantilla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tips_By_Plantilla` (
  `id_tipsByP` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_` int(10) unsigned NOT NULL,
  `id_plantilla` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tipsByP`),
  UNIQUE KEY `tips_by_plantilla_id_tips_id_plantilla_unique` (`id_`,`id_plantilla`),
  KEY `tips_by_plantilla_id_plantilla_foreign` (`id_plantilla`),
  CONSTRAINT `tips_by_plantilla_id_plantilla_foreign` FOREIGN KEY (`id_plantilla`) REFERENCES `Plantillas` (`id_plantilla`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tips_By_Plantilla`
--

LOCK TABLES `Tips_By_Plantilla` WRITE;
/*!40000 ALTER TABLE `Tips_By_Plantilla` DISABLE KEYS */;
INSERT INTO `Tips_By_Plantilla` VALUES (1,1,1,'2018-07-11 00:06:52','2018-07-11 00:06:52'),(2,2,1,'2018-07-13 18:49:25','2018-07-13 18:49:25'),(3,3,1,'2018-07-13 18:49:32','2018-07-13 18:49:32');
/*!40000 ALTER TABLE `Tips_By_Plantilla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ventas`
--

DROP TABLE IF EXISTS `Ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ventas` (
  `id_venta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned DEFAULT NULL,
  `id_cliente` int(10) unsigned DEFAULT NULL,
  `total` double(8,2) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_estatus` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_venta`),
  KEY `ventas_id_cliente_foreign` (`id_cliente`),
  KEY `ventas_id_user_foreign` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ventas`
--

LOCK TABLES `Ventas` WRITE;
/*!40000 ALTER TABLE `Ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `Ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ventas_detalle`
--

DROP TABLE IF EXISTS `Ventas_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ventas_detalle` (
  `id_venta_d` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_venta` int(10) unsigned NOT NULL,
  `id_producto` int(10) unsigned NOT NULL,
  `precio_venta` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_venta_d`),
  KEY `ventas_detalle_id_venta_foreign` (`id_venta`),
  KEY `ventas_detalle_id_producto_foreign` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ventas_detalle`
--

LOCK TABLES `Ventas_detalle` WRITE;
/*!40000 ALTER TABLE `Ventas_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `Ventas_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ventas_detalle_pago`
--

DROP TABLE IF EXISTS `Ventas_detalle_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ventas_detalle_pago` (
  `id_detalle_pago` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_venta` int(10) unsigned NOT NULL,
  `id_tipo_pago` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `id_cliente` int(10) unsigned NOT NULL,
  `referencia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detalle_pago`),
  KEY `ventas_detalle_pago_id_venta_foreign` (`id_venta`),
  KEY `ventas_detalle_pago_id_tipo_pago_foreign` (`id_tipo_pago`),
  KEY `ventas_detalle_pago_id_user_foreign` (`id_user`),
  KEY `ventas_detalle_pago_id_cliente_foreign` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ventas_detalle_pago`
--

LOCK TABLES `Ventas_detalle_pago` WRITE;
/*!40000 ALTER TABLE `Ventas_detalle_pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `Ventas_detalle_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ventas_subdetalle`
--

DROP TABLE IF EXISTS `Ventas_subdetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ventas_subdetalle` (
  `id_s_venta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_venta_d` int(10) unsigned NOT NULL,
  `id_promocion` int(11) DEFAULT NULL,
  `id_paquete` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `precio` double(8,2) NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_s_venta`),
  KEY `ventas_subdetalle_id_venta_d_foreign` (`id_venta_d`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ventas_subdetalle`
--

LOCK TABLES `Ventas_subdetalle` WRITE;
/*!40000 ALTER TABLE `Ventas_subdetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `Ventas_subdetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `View_Plantilla`
--

DROP TABLE IF EXISTS `View_Plantilla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `View_Plantilla` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) unsigned NOT NULL,
  `id_plantilla` int(11) unsigned NOT NULL,
  `id_curso` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `View_Plantilla`
--

LOCK TABLES `View_Plantilla` WRITE;
/*!40000 ALTER TABLE `View_Plantilla` DISABLE KEYS */;
/*!40000 ALTER TABLE `View_Plantilla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Vista_plantilla`
--

DROP TABLE IF EXISTS `Vista_plantilla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Vista_plantilla` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) unsigned NOT NULL,
  `id_curso` int(11) unsigned NOT NULL,
  `id_plantilla` int(11) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_cliente` (`id_cliente`),
  KEY `fk_plantilla` (`id_plantilla`),
  CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_plantilla` FOREIGN KEY (`id_plantilla`) REFERENCES `Plantillas` (`id_plantilla`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Vista_plantilla`
--

LOCK TABLES `Vista_plantilla` WRITE;
/*!40000 ALTER TABLE `Vista_plantilla` DISABLE KEYS */;
/*!40000 ALTER TABLE `Vista_plantilla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_password_resets`
--

DROP TABLE IF EXISTS `admin_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_password_resets_email_index` (`email`),
  KEY `admin_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_password_resets`
--

LOCK TABLES `admin_password_resets` WRITE;
/*!40000 ALTER TABLE `admin_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id_categoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'CURSOS','2018-10-09 20:56:38','2018-10-09 20:56:38'),(2,'PAQUETES','2018-10-09 20:56:38','2018-10-09 20:56:38'),(3,'PROMOCIONES','2018-10-09 20:56:59','2018-10-09 20:56:59');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente_password_resets`
--

DROP TABLE IF EXISTS `cliente_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `cliente_password_resets_email_index` (`email`) USING BTREE,
  KEY `cliente_password_resets_token_index` (`token`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente_password_resets`
--

LOCK TABLES `cliente_password_resets` WRITE;
/*!40000 ALTER TABLE `cliente_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente_password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ref` int(10) unsigned DEFAULT NULL,
  `tipo_cliente` int(10) NOT NULL DEFAULT '1',
  `documento` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `fecha_nac` date DEFAULT NULL,
  `photo1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` tinyint(1) DEFAULT '0',
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientes_email_unique` (`email`,`tipo_cliente`,`documento`) USING BTREE,
  KEY `ref` (`ref`),
  KEY `cliente` (`tipo_cliente`),
  CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`ref`) REFERENCES `clientes_o` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (3,'admin','admin-last','04142392030','abcsimple@domain.com','$2y$10$ElAlUeMSSq/BL486.6EEj.skUQQhEw2vBJhbjO0OQ0syheIkaczau','TiONMMHhqMyxdIFJfFa4aU3KY2d9OU8Co3up2PerVGFd8k5zaDtjH1qeiDkP','2018-10-01 21:29:54','2018-10-01 21:29:54',NULL,1,'0',NULL,NULL,0,1),(14,'admin','admin-last','04142392030','abc3simple@domain.com','$2y$10$ElAlUeMSSq/BL486.6EEj.skUQQhEw2vBJhbjO0OQ0syheIkaczau','lNkuIZUU72VHusaFAuV5ZnzBHXgHcvO3F3gNlKvSWkTzAgOQgUeFeg4dcj5Q','2018-10-11 13:46:47','2018-10-11 13:46:47',NULL,1,'1',NULL,NULL,0,1),(15,'Carlos Andrés','Suarez','04166954964','csuarezr@gmail.com','$2y$10$iG5ScP6xXPmiRVwx8EyY3ObxEkReFURjUuSiI90Q1hTvN95DORDJK','6zYVyjsk5KFL6P6KVjinfViIt6RUsUmPZoiZo76QsBsTtyEo1iqgKsE8nzNX','2018-11-08 22:34:05','2019-09-12 17:50:01',NULL,1,'10797999','1973-05-31','',0,1),(16,'Renny','Hernandez','09998887766','renny1@gmail.com','$2y$10$OIQOJihWmcqo9rT8L8nVWu2.eiZL56MYx6ALTR4DJ0xyHLwr.w1jG','77QEb8ejWvxPigBBS20bzSr6FTVbM0uOMd4slyfFSPifNXyi6EFVRaynyDlX','2019-02-22 22:54:12','2019-04-23 18:53:52',NULL,1,'6645747',NULL,'',0,1),(17,'Carlos','Rojas','45454545','crojas@gmail.com','$2y$10$RQ.j3r93uWs3TshsdQoOmexFkfzIyBEZenI0wSXh0WnJSWvYC6asK','Cw9QER7vOrc2BZBakxGF14tnj6c4pgGLfru8Eo0NQ3M9HKV2ZQMwfHJc4Jmp','2019-04-23 00:13:04','2019-04-23 00:16:33',NULL,1,'10797999','2019-04-10','',0,1),(18,'jacqueline','Lopez','98989809','oboequintero@gmail.com','$2y$10$rYHgETPEBnjFDR3ZnkO8pORapTHHHAdDdBWJwBMUBrYM520CYhGJW','rpaeH2YvxyVlnlB77VSKdLIbTPSs27PyJUySbKozRIjj8g80LiQqZdbX3lDk','2019-04-25 22:54:56','2019-04-25 22:55:14',NULL,1,'15656545','2019-04-11','',0,1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes_o`
--

DROP TABLE IF EXISTS `clientes_o`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes_o` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ref` int(10) unsigned DEFAULT NULL,
  `tipo_cliente` int(10) NOT NULL DEFAULT '1',
  `documento` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `fecha_nac` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientes_email_unique` (`email`,`tipo_cliente`,`documento`) USING BTREE,
  KEY `ref` (`ref`),
  KEY `cliente` (`tipo_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes_o`
--

LOCK TABLES `clientes_o` WRITE;
/*!40000 ALTER TABLE `clientes_o` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes_o` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `id_compra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_compra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra_promocion`
--

DROP TABLE IF EXISTS `compra_promocion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra_promocion` (
  `id_comp_promo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_compra` int(10) unsigned NOT NULL,
  `id_promocion` int(10) unsigned NOT NULL,
  `precio` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comp_promo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra_promocion`
--

LOCK TABLES `compra_promocion` WRITE;
/*!40000 ALTER TABLE `compra_promocion` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra_promocion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fecha_promocion`
--

DROP TABLE IF EXISTS `fecha_promocion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fecha_promocion` (
  `id_fecha_pr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_promocion` int(10) unsigned NOT NULL,
  `fecha_i` date NOT NULL,
  `fecha_f` date NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_fecha_pr`),
  KEY `fecha_promocion_id_promocion_foreign` (`id_promocion`),
  CONSTRAINT `fecha_promocion_id_promocion_foreign` FOREIGN KEY (`id_promocion`) REFERENCES `Promociones` (`id_promocion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fecha_promocion`
--

LOCK TABLES `fecha_promocion` WRITE;
/*!40000 ALTER TABLE `fecha_promocion` DISABLE KEYS */;
INSERT INTO `fecha_promocion` VALUES (1,1,'2018-05-31','2018-07-05',0,'2018-08-23 22:47:08','2019-02-12 00:54:24'),(2,2,'2018-05-31','2018-10-31',0,'2018-08-24 18:20:07','2018-11-14 18:23:42'),(3,3,'2018-05-31','2018-10-31',0,'2018-11-14 18:29:48','2018-11-14 18:29:48'),(4,4,'2019-02-12','2019-02-14',0,'2019-02-12 17:38:39','2019-02-12 17:38:39'),(5,5,'2019-02-14','2019-02-28',0,'2019-02-27 00:04:47','2019-02-27 00:04:47');
/*!40000 ALTER TABLE `fecha_promocion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formulario`
--

DROP TABLE IF EXISTS `formulario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formulario` (
  `idfor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_personal` int(11) NOT NULL,
  `ubi_admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idfor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formulario`
--

LOCK TABLES `formulario` WRITE;
/*!40000 ALTER TABLE `formulario` DISABLE KEYS */;
/*!40000 ALTER TABLE `formulario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (26,'2014_10_12_000000_create_users_table',1),(27,'2014_10_12_100000_create_password_resets_table',1),(28,'2015_01_20_084450_create_roles_table',1),(29,'2015_01_20_084525_create_role_user_table',1),(30,'2015_01_24_080208_create_permissions_table',1),(31,'2015_01_24_080433_create_permission_role_table',1),(32,'2015_12_04_003040_add_special_role_column',1),(33,'2017_02_18_194922_update_users',1),(34,'2017_05_19_190822_create_table_cei_migration',1),(35,'2017_05_23_193042_create_table_formulario_migration',1),(36,'2017_10_17_170735_create_permission_user_table',1),(37,'2018_05_20_171526_create_table_idioma',1),(38,'2018_05_28_200209_create_tabla__niveles',1),(39,'2018_05_28_200442_create_tabla__lecciones',1),(40,'2018_05_31_183342_create_table_pantilla',1),(41,'2018_05_31_184559_create_table_contenido',1),(42,'2018_05_31_184632_create_table__tips',1),(43,'2018_05_31_184701_create_table__tips__by__plantilla',1),(44,'2018_06_08_201944_update_table_tips_by_plantilla',1),(45,'2018_06_18_175358_agregar_campo_tabla_contenido',1),(46,'2018_06_19_133546_eliminar_campo_unico_plantilla',1),(47,'2018_06_19_135514_actualizar_campo_unico_contenido',1),(48,'2018_06_20_023452_abc_simple',1),(49,'2018_06_20_171557_create_table_diccionario',1),(50,'2018_06_20_171642_create_table_opciones',1),(51,'2018_06_20_195249_add_campo_table_tips',1),(52,'2018_06_22_161054_actualizar_campo_ruta_tabla_tips',1),(53,'2018_06_22_180015_actualizar_tabla_idioma',1),(54,'2018_06_22_182019_agregacamponombretablaopciones',1),(55,'2018_06_26_153421_actualizartablaopciones',1),(56,'2018_06_20_171908_actualizar_foreing_key_nivel',2),(57,'2018_06_29_150342_add__campo_idhtml__tabla__contenido',3),(58,'2018_07_16_153421_actualizartablatipoplantilla',4),(60,'2018_07_06_145850_agregar__campo__pagina__tabla__plantilla',5),(61,'2018_07_18_145422_create_tabla_cursos',6),(62,'2018_08_05_150157_tipo_producto',7),(63,'2018_08_05_153844_producto',8),(65,'2018_08_15_151758_tipo_estatus',9),(66,'2018_08_16_142232_ventas',9),(67,'2018_08_16_172217_ventas_detalles',10),(68,'2018_07_24_030831_create_tipo_examen_table',11),(69,'2018_08_03_055540_create_promocion_table',12),(70,'2018_08_03_060306_create_promocion_paquete_table',12),(72,'2018_08_03_061307_create_compra_promocion_table',12),(73,'2018_08_22_152859_carrito_compras',13),(75,'2018_06_22_225640_create_examenes_table',15),(76,'2018_07_26_135921_add__campo__id_tipo_examen_tabla_examen',16),(77,'2018_06_20_024054_create_tipo_ejercicio_table',17),(78,'2018_06_22_235308_create_ejercicios_table',17),(79,'2018_07_16_031706_create_puntaje_examen_table',17),(80,'2018_07_29_193249_examen_ejercicio',17),(81,'2018_08_02_200233_create_compra_table',18),(82,'2018_08_02_200302_create_paquetes_table',18),(83,'2018_08_03_055540_create_promociones_table',18),(84,'2018_08_12_054621_create_fecha_promocion_table',18),(85,'2018_08_03_061101_create_promocion_curso_table',19),(86,'2018_09_27_152406_tipo_contenido',20),(87,'2018_09_27_152432_contenido_ejercicio',20),(88,'2018_07_07_192341_create_admins_table',21),(89,'2018_07_07_192342_create_admin_password_resets_table',21),(90,'2018_11_29_184444_create_permission_tables',22),(91,'2019_06_06_155949_create_shoppingcart_table',23);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (2,'App\\User',3),(3,'App\\User',2),(3,'App\\User',3),(8,'App\\User',2),(8,'App\\User',3),(8,'App\\User',4),(8,'App\\User',5),(8,'App\\User',6),(10,'App\\User',1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_roles`
--

DROP TABLE IF EXISTS `permission_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_roles` (
  `permission_id` int(10) unsigned NOT NULL,
  `roles_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`roles_id`) USING BTREE,
  KEY `role_has_permissions_role_id_foreign` (`roles_id`),
  CONSTRAINT `permission_roles_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_roles_ibfk_2` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_roles`
--

LOCK TABLES `permission_roles` WRITE;
/*!40000 ALTER TABLE `permission_roles` DISABLE KEYS */;
INSERT INTO `permission_roles` VALUES (12,10),(13,10),(14,10),(15,10);
/*!40000 ALTER TABLE `permission_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (12,'edit articles','web','2018-11-30 17:37:04','2018-11-30 17:37:04'),(13,'delete articles','web','2018-11-30 17:37:04','2018-11-30 17:37:04'),(14,'publish articles','web','2018-11-30 17:37:04','2018-11-30 17:37:04'),(15,'unpublish articles','web','2018-11-30 17:37:04','2018-11-30 17:37:04');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_curso` int(10) unsigned DEFAULT NULL,
  `id_promocion` int(10) unsigned DEFAULT NULL,
  `id_paquete` int(10) unsigned DEFAULT NULL,
  `id_categoria` int(10) unsigned NOT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `products_id_curso_foreign` (`id_curso`),
  KEY `products_id_promocion_foreign` (`id_promocion`),
  KEY `products_id_paquete_foreign` (`id_paquete`),
  KEY `products_id_categoria_foreign` (`id_categoria`),
  CONSTRAINT `products_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE,
  CONSTRAINT `products_id_curso_foreign` FOREIGN KEY (`id_curso`) REFERENCES `Cursos` (`id_curso`) ON UPDATE CASCADE,
  CONSTRAINT `products_id_paquete_foreign` FOREIGN KEY (`id_paquete`) REFERENCES `Paquetes` (`id_paquete`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,NULL,NULL,1,2,NULL,1,'2019-06-06 15:55:51','2019-06-06 15:55:51'),(2,3,NULL,NULL,1,NULL,1,'2019-07-19 15:00:42','2019-07-19 15:00:42'),(3,4,NULL,NULL,1,NULL,1,'2019-07-19 15:01:27','2019-07-19 15:01:27'),(4,5,NULL,NULL,1,NULL,1,'2019-07-25 14:43:46','2019-07-25 14:43:46');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (12,8),(12,10),(13,10),(14,9),(14,10),(15,9),(15,10);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (3,10,1,NULL,NULL),(4,8,2,'2018-11-30 23:23:41','2018-11-30 23:23:41'),(6,8,4,'2018-12-03 23:13:42','2018-12-03 23:13:42'),(7,8,3,'2018-12-03 23:39:01','2018-12-03 23:39:01'),(8,8,5,'2018-12-04 22:35:07','2018-12-04 22:35:07'),(9,8,6,'2018-12-04 22:46:17','2018-12-04 22:46:17');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (2,'admin ','web','2018-11-29 20:20:41','2018-11-29 20:20:41'),(3,'usuario ','web','2018-11-29 20:20:46','2018-11-29 20:20:46'),(8,'writer','web','2018-11-30 17:37:04','2018-11-30 17:37:04'),(9,'moderator','web','2018-11-30 17:37:04','2018-11-30 17:37:04'),(10,'super-admin','web','2018-11-30 17:37:05','2018-11-30 17:37:05');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shoppingcart`
--

DROP TABLE IF EXISTS `shoppingcart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`identifier`,`instance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shoppingcart`
--

LOCK TABLES `shoppingcart` WRITE;
/*!40000 ALTER TABLE `shoppingcart` DISABLE KEYS */;
/*!40000 ALTER TABLE `shoppingcart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombres` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','abcsimple@domain.com','$2y$10$kj711G/q1yG31TqboGUDrexqrjnYqEWpLzhydVJIk3IY26WOgJKUC','A8oEUTOV3HztlMILSUxysWsfT9gElCm0svbaa2d5Us28z4ekRiAP7s8bCeUG','2018-06-28 00:35:30','2018-12-03 22:44:18',NULL,NULL,NULL),(2,'usuario','usuario@domain.com','$2y$10$Nyy/fTKnDzvIhKv7khptie0xBO4C1nh.K1eP1w1qmi3nQmVjoS5Nm','4EYGcMlz6y5KkNLdQk6JLPmRcUrC9Oit71zP7aUHl7xOR3Q3rCdS0Ve0PBMj','2018-06-28 22:38:12','2018-11-30 18:06:20',NULL,NULL,NULL),(3,'Carlos Suarez','csuarezr@gmail.com','$2y$10$.Hxn0GvB9Q0OhPxof4VETu7tv9KpyiTVs4ZctUxZ9Xq2WcAwG0ytK','OdGYbdCDyPDto4Ch9ZBtk4HGMcW67yOOQNZ9GGoV5EdjtXZs46YmrQsjKOVS','2018-11-29 19:18:35','2018-12-05 21:56:12',NULL,NULL,NULL),(4,'Aristides Cortesía','cochejose@gmail.com','$2y$10$HWwBUvLWtnNXx0m7G0URQOfMkYS0XRaarYhWK3TzfFbmvCBS7UewO',NULL,'2018-12-03 23:12:39','2018-12-03 23:12:39',NULL,NULL,NULL),(5,'Renny Hernández','rennytox@gmail.com','$2y$10$D/9CAwyjEHcDR2Zlzd.tkO4NliJMhwBC66iidVqjXdzzJP31VyHXy',NULL,'2018-12-04 22:34:55','2018-12-04 22:34:55',NULL,NULL,NULL),(6,'Geraldo Marcano','geraldomarcano@gmail.com','$2y$10$YltNwC8khz3toEihqvRubO//xVKUZwxwktWEwM1//w2Vgq6pt0foy',NULL,'2018-12-04 22:45:54','2018-12-04 22:45:54',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-13 10:53:59
