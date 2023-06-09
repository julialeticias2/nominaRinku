-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: nominarinku
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `cat_isr`
--

DROP TABLE IF EXISTS `cat_isr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_isr` (
  `ID_ISR` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `Rango` mediumint(8) unsigned DEFAULT 0,
  `Porcentaje` tinyint(3) unsigned DEFAULT 0,
  PRIMARY KEY (`ID_ISR`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla creada el 22-04-2023 por Ing. Julia Leticia Sanchez Sanchez.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_isr`
--

LOCK TABLES `cat_isr` WRITE;
/*!40000 ALTER TABLE `cat_isr` DISABLE KEYS */;
INSERT INTO `cat_isr` VALUES (1,0,9),(2,10000,12);
/*!40000 ALTER TABLE `cat_isr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_jornada`
--

DROP TABLE IF EXISTS `cat_jornada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_jornada` (
  `ID_JORNADA` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `horasXdia` tinyint(3) unsigned DEFAULT 0,
  `diasXsemana` tinyint(3) unsigned DEFAULT 0,
  PRIMARY KEY (`ID_JORNADA`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla creada el 22-04-2023 por Ing. Julia Leticia Sanchez Sanchez.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_jornada`
--

LOCK TABLES `cat_jornada` WRITE;
/*!40000 ALTER TABLE `cat_jornada` DISABLE KEYS */;
INSERT INTO `cat_jornada` VALUES (1,8,6);
/*!40000 ALTER TABLE `cat_jornada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipousuario`
--

DROP TABLE IF EXISTS `cat_tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipousuario` (
  `ID_TIPO_USUARIO` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `tipoUsuario` varchar(30) DEFAULT '',
  PRIMARY KEY (`ID_TIPO_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla creada el 22-04-2023 por Ing. Julia Leticia Sanchez Sanchez.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipousuario`
--

LOCK TABLES `cat_tipousuario` WRITE;
/*!40000 ALTER TABLE `cat_tipousuario` DISABLE KEYS */;
INSERT INTO `cat_tipousuario` VALUES (1,'Administrador'),(2,'Responsable de Nomina');
/*!40000 ALTER TABLE `cat_tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `ID_EMPLEADO` varchar(18) NOT NULL,
  `nombre` varchar(50) DEFAULT '',
  `primerApellido` varchar(50) DEFAULT '',
  `segundoApellido` varchar(50) DEFAULT '',
  `FK_ID_ROL` tinyint(3) unsigned DEFAULT 0,
  `estatus` varchar(10) DEFAULT 'activo',
  `usuarioAlta` mediumint(8) unsigned DEFAULT 1,
  `fechaAlta` datetime DEFAULT current_timestamp(),
  `usuarioModificacion` mediumint(8) unsigned DEFAULT 0,
  `fechaUltimaModificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuarioBaja` mediumint(8) unsigned DEFAULT 0,
  `fechaBaja` datetime DEFAULT '2000-01-01 00:00:00',
  PRIMARY KEY (`ID_EMPLEADO`),
  KEY `FK_ID_ROL` (`FK_ID_ROL`,`fechaAlta`,`fechaUltimaModificacion`,`fechaBaja`),
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`FK_ID_ROL`) REFERENCES `rol` (`ID_ROL`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla creada el 22-04-2023 por Ing. Julia Leticia Sanchez Sanchez. Valores por defecto: 1)estatus="activo" \n2)usuarioAlta=1 <<Administrador>> 3)fechaAlta=CURRENT_TIMESTAMP 4)usuarioModificacion=0 \n5)fechaUltimaModificacion=CURRENT_TIMESTAMP <<Al crear y al actualizar>> 6)usuarioBaja=0 \n7)fechaBaja="2000-01-01 00:00:00". El estatus queda de la siguiente forma: estatus=["activo" | "inactivo"]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES ('ABJC940605HNTMTL62','Carlos','Abellan','Jaen',3,'activo',1,'2023-04-25 21:51:02',0,'2023-04-25 21:51:02',0,'2000-01-01 00:00:00'),('AFMC580611HNLICK19','Clemente Ian','Afonso','Medrano',3,'activo',1,'2023-04-25 21:42:20',0,'2023-04-25 21:42:20',0,'2000-01-01 00:00:00'),('CARJ750910HDGJLN22','Juan Ignacio','Cabrera','Revilla',1,'activo',1,'2023-04-25 21:53:15',0,'2023-04-25 21:58:03',0,'2000-01-01 00:00:00'),('CAVA911226MGTSPJ71','Abril','Carranza','Vargas',1,'activo',1,'2023-04-25 21:36:48',0,'2023-04-25 21:36:48',0,'2000-01-01 00:00:00'),('FEPM620912MVZZDX09','Mar├¡a Victoria','Ferreira','Puerto',2,'activo',1,'2023-04-25 21:49:01',0,'2023-04-25 21:49:01',0,'2000-01-01 00:00:00'),('LUAC880615MASDPJ26','Carmen','Lujan','Alvarado',2,'activo',1,'2023-04-25 21:55:09',0,'2023-04-25 21:58:21',0,'2000-01-01 00:00:00'),('MEGF790629HQRUGF54','Fabian','Melendez','Gomez',3,'activo',1,'2023-04-25 21:57:19',0,'2023-04-25 21:57:19',0,'2000-01-01 00:00:00'),('VEMC891213HDFHFG51','Camilo','Ventura','Manzano',2,'activo',1,'2023-04-25 21:40:07',0,'2023-04-25 21:40:07',0,'2000-01-01 00:00:00'),('VIYE760303MJCUHM02','Elia Carla','Vilches','Yague',1,'activo',1,'2023-04-25 21:46:46',0,'2023-04-25 21:46:46',0,'2000-01-01 00:00:00');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `ID_ROL` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) DEFAULT '',
  `FK_ID_JORNADA` tinyint(3) unsigned DEFAULT 0,
  `pagoXhora` smallint(5) unsigned DEFAULT 0,
  `pagoXentrega` smallint(5) unsigned DEFAULT 0,
  `bonoXhora` smallint(5) unsigned DEFAULT 0,
  `porcVales` tinyint(3) unsigned DEFAULT 0,
  `estatus` varchar(10) DEFAULT 'activo',
  `usuarioAlta` mediumint(8) unsigned DEFAULT 1,
  `fechaAlta` datetime DEFAULT current_timestamp(),
  `usuarioModificacion` mediumint(8) unsigned DEFAULT 0,
  `fechaUltimaModificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuarioBaja` mediumint(8) unsigned DEFAULT 0,
  `fechaBaja` datetime DEFAULT '2000-01-01 00:00:00',
  PRIMARY KEY (`ID_ROL`),
  KEY `FK_ID_JORNADA` (`FK_ID_JORNADA`,`fechaAlta`,`fechaUltimaModificacion`,`fechaBaja`),
  FULLTEXT KEY `rol` (`rol`),
  CONSTRAINT `rol_ibfk_1` FOREIGN KEY (`FK_ID_JORNADA`) REFERENCES `cat_jornada` (`ID_JORNADA`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla creada el 22-04-2023 por Ing. Julia Leticia Sanchez Sanchez. Valores por defecto: 1)estatus="activo" \n2)usuarioAlta=1 <<Administrador>> 3)fechaAlta=CURRENT_TIMESTAMP 4)usuarioModificacion=0 \n5)fechaUltimaModificacion=CURRENT_TIMESTAMP <<Al crear y al actualizar>> 6)usuarioBaja=0 \n7)fechaBaja="2000-01-01 00:00:00". El estatus queda de la siguiente forma: estatus=["activo" | "inactivo"]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Chofer',1,30,5,10,4,'activo',1,'2023-04-23 09:57:26',0,'2023-04-24 17:23:28',0,'2000-01-01 00:00:00'),(2,'Cargador',1,30,5,5,4,'activo',1,'2023-04-23 09:58:20',0,'2023-04-24 17:23:34',0,'2000-01-01 00:00:00'),(3,'Auxiliar',1,30,5,0,4,'activo',1,'2023-04-23 09:58:53',0,'2023-04-24 01:01:43',0,'2000-01-01 00:00:00');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sueldo`
--

DROP TABLE IF EXISTS `sueldo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sueldo` (
  `ID_SUELDO` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `anio` smallint(5) unsigned DEFAULT 0,
  `mes` tinyint(3) unsigned DEFAULT 1 CHECK (`mes` >= 1 and `mes` <= 12),
  `horasTrabajadas` smallint(5) unsigned DEFAULT 0,
  `sueldoBase` mediumint(8) unsigned DEFAULT 0,
  `montoXentregas` mediumint(8) unsigned DEFAULT 0,
  `montoXbonos` mediumint(8) unsigned DEFAULT 0,
  `FK_ID_ISR` tinyint(3) unsigned DEFAULT 0,
  `montoXretenciones` mediumint(8) unsigned DEFAULT 0,
  `montoXvales` mediumint(8) unsigned DEFAULT 0,
  `montoSueldo` mediumint(8) unsigned DEFAULT 0,
  `FK_ID_EMPLEADO` varchar(18) DEFAULT '',
  `estatus` varchar(10) DEFAULT 'activo',
  `usuarioAlta` mediumint(8) unsigned DEFAULT 1,
  `fechaAlta` datetime DEFAULT current_timestamp(),
  `usuarioModificacion` mediumint(8) unsigned DEFAULT 0,
  `fechaUltimaModificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuarioBaja` mediumint(8) unsigned DEFAULT 0,
  `fechaBaja` datetime DEFAULT '2000-01-01 00:00:00',
  PRIMARY KEY (`ID_SUELDO`),
  KEY `FK_ID_EMPLEADO` (`FK_ID_EMPLEADO`,`FK_ID_ISR`,`anio`,`mes`,`fechaAlta`,`fechaUltimaModificacion`,`fechaBaja`),
  KEY `FK_ID_ISR` (`FK_ID_ISR`),
  CONSTRAINT `sueldo_ibfk_1` FOREIGN KEY (`FK_ID_ISR`) REFERENCES `cat_isr` (`ID_ISR`) ON UPDATE CASCADE,
  CONSTRAINT `sueldo_ibfk_2` FOREIGN KEY (`FK_ID_EMPLEADO`) REFERENCES `empleado` (`ID_EMPLEADO`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla creada el 22-04-2023 por Ing. Julia Leticia Sanchez Sanchez. Valores por defecto: 1)mes=1, 2)estatus="activo" \n3)usuarioAlta=1 <<Administrador>> 4)fechaAlta=CURRENT_TIMESTAMP 5)usuarioModificacion=0 \n6)fechaUltimaModificacion=CURRENT_TIMESTAMP <<Al crear y al actualizar>> 7)usuarioBaja=0 \n8)fechaBaja="2000-01-01 00:00:00". El estatus queda de la siguiente forma: estatus=["activo" | "inactivo"]. El mes debe tener valores entre 1 y 12.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sueldo`
--

LOCK TABLES `sueldo` WRITE;
/*!40000 ALTER TABLE `sueldo` DISABLE KEYS */;
INSERT INTO `sueldo` VALUES (1,2023,1,192,5760,0,0,1,518,210,5242,'ABJC940605HNTMTL62','activo',1,'2023-04-26 08:34:54',0,'2023-05-02 09:48:38',0,'2000-01-01 00:00:00');
/*!40000 ALTER TABLE `sueldo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `ID_USUARIO` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `correoElectronico` varchar(50) DEFAULT '',
  `contrasenia` varchar(255) DEFAULT '1234',
  `FK_ID_TIPO_USUARIO` tinyint(3) unsigned DEFAULT 0,
  `estatus` varchar(10) DEFAULT 'activo',
  `usuarioAlta` mediumint(8) unsigned DEFAULT 1,
  `fechaAlta` datetime DEFAULT current_timestamp(),
  `usuarioModificacion` mediumint(8) unsigned DEFAULT 0,
  `fechaUltimaModificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuarioBaja` mediumint(8) unsigned DEFAULT 0,
  `fechaBaja` datetime DEFAULT '2000-01-01 00:00:00',
  PRIMARY KEY (`ID_USUARIO`),
  KEY `FK_ID_TIPO_USUARIO` (`FK_ID_TIPO_USUARIO`,`fechaAlta`,`fechaUltimaModificacion`,`fechaBaja`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`FK_ID_TIPO_USUARIO`) REFERENCES `cat_tipousuario` (`ID_TIPO_USUARIO`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla creada el 22-04-2023 por Ing. Julia Leticia Sanchez Sanchez. Valores por defecto: 1)contrasenia="1234" 2)estatus="activo" \n3)usuarioAlta=1 <<Administrador>> 4)fechaAlta=CURRENT_TIMESTAMP 5)usuarioModificacion=0 \n6)fechaUltimaModificacion=CURRENT_TIMESTAMP <<Al crear y al actualizar>> 7)usuarioBaja=0 \n8)fechaBaja="2000-01-01 00:00:00" El estatus queda de la siguiente forma: estatus=["activo" | "inactivo"]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'juliasanchez15@gmail.com','$2y$10$LGobxF1.2Ov3fuwvcz0UQ.lHvYystA0GV7/HRYy6pjSNM27uyGZnO',1,'activo',1,'2023-04-23 09:50:37',0,'2023-04-25 14:07:37',0,'2000-01-01 00:00:00'),(2,'juliasanchez@rinku.jp','$2y$10$z5SS8Mv9GUaSWV1qcN92ZeaFM6r97N0ugi1BIkBWoJ3YNTovS35Gy\n\n$2y$10$z5SS8Mv9GUaSWV1qcN92ZeaFM6r97N0ugi1BIkBWoJ3YNTovS35Gy\n\n$2y$10$z5SS8Mv9GUaSWV1qcN92ZeaFM6r97N0ugi1BIkBWoJ3YNTovS35Gy',2,'activo',1,'2023-04-23 09:53:53',0,'2023-04-25 14:09:29',0,'2000-01-01 00:00:00');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-02 10:42:31
