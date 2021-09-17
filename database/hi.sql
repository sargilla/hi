-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: hi
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `configuraciones`
--

DROP TABLE IF EXISTS `configuraciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `configuraciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuraciones`
--

LOCK TABLES `configuraciones` WRITE;
/*!40000 ALTER TABLE `configuraciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuraciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `eventos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_id` int(10) unsigned NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `contenido` text COLLATE utf8mb4_unicode_ci,
  `imagenes` text COLLATE utf8mb4_unicode_ci,
  `documentos` text COLLATE utf8mb4_unicode_ci,
  `links` text COLLATE utf8mb4_unicode_ci,
  `videos` text COLLATE utf8mb4_unicode_ci,
  `fecha_desde` datetime DEFAULT NULL,
  `fecha_hasta` datetime DEFAULT NULL,
  `marcado` tinyint(1) NOT NULL DEFAULT '0',
  `publicado` tinyint(1) NOT NULL DEFAULT '0',
  `campos_extra` text COLLATE utf8mb4_unicode_ci,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eventos_slug_publicado_marcado_index` (`slug`,`publicado`,`marcado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES (1,'sdadssa dadf','sdadssa-dadf',1,NULL,'<p>asdfasdfsf asdfsaf</p>','[{\"imagen\":\"JNK7gWlzDlhXi1v6oemWzn3KhVh8j1mnbMvDT0y6.jpg\"}]',NULL,NULL,NULL,NULL,NULL,1,1,NULL,NULL,'2021-09-16 18:19:09','2021-09-16 18:25:11');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `mensajes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Contacto',
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asunto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empresa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puesto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archivo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mensaje` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `leido` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensajes`
--

LOCK TABLES `mensajes` WRITE;
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `padre_id` int(10) unsigned NOT NULL DEFAULT '0',
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destino` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `configuraciones` text COLLATE utf8mb4_unicode_ci,
  `orden` int(11) DEFAULT NULL,
  `permiso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,0,'Dashboard','admin','dashboard','route','gestion.index','fas fa-tachometer-alt',NULL,NULL,0,'gestion','2021-07-16 14:05:10','2021-07-16 14:05:10'),(2,0,'Menus','admin','menus','route','menus.index','fas fa-map-signs',NULL,NULL,1,'admin-menu','2021-07-16 14:05:10','2021-07-16 14:05:10'),(3,0,'Usuarios','admin','usuarios','url','#','fas fa-users',NULL,NULL,2,'admin-usuarios','2021-07-16 14:05:10','2021-07-16 14:05:10'),(4,3,'Usuarios','admin','usuarios-index','route','users.index','fas fa-users',NULL,NULL,1,'admin-usuarios','2021-07-16 14:05:10','2021-07-16 14:05:10'),(5,3,'Roles','admin','roles','route','roles.index','fas fa-id-card',NULL,NULL,2,'admin-usuarios','2021-07-16 14:05:10','2021-07-16 14:05:10'),(6,3,'Permisos','admin','permisos','route','permisos.index','fas fa-lock',NULL,NULL,3,'admin-usuarios','2021-07-16 14:05:10','2021-07-16 14:05:10'),(7,0,'Configuraciones','admin','configuraciones','route','configuraciones.index','fas fa-cogs',NULL,NULL,20,'admin-configuraciones','2021-07-16 14:05:10','2021-07-16 14:05:10'),(8,0,'Páginas','admin','paginas','route','paginas.index','fas fa-sitemap',NULL,NULL,6,'gestion','2021-07-16 11:25:29','2021-07-16 11:25:29'),(9,0,'Modulos','admin','modulos','route','modulos.index','fas fa-cubes',NULL,NULL,7,'gestion','2021-07-16 11:25:29','2021-07-16 11:25:29'),(10,0,'Mensajes','admin','mensajes','route','mensajes.index','fas fa-envelope',NULL,NULL,8,'gestion','2021-07-16 11:25:29','2021-07-16 11:25:29'),(11,0,'Noticias','admin','noticias','route','noticias.index','fas fa-newspaper',NULL,NULL,5,'gestion','2021-07-16 14:37:35','2021-07-16 14:50:42'),(13,0,'Eventos','admin','eventos','route','eventos.index','fas fa-newspaper',NULL,NULL,6,'gestion','2021-09-16 17:00:12','2021-09-16 17:00:12');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_000001_create_menus_table',1),(3,'2014_10_12_000002_create_permission_tables',1),(4,'2014_10_12_100000_create_password_resets_table',1),(5,'2018_04_18_104451_create_configuraciones_table',1),(6,'2019_08_19_000000_create_failed_jobs_table',1),(7,'2017_05_09_142554_create_paginas_table',2),(8,'2017_08_16_142621_create_mensajes_table',2),(9,'2018_08_17_102909_create_modulos_table',2),(10,'2019_09_03_130930_add_header_to_paginas_table',2),(11,'2021_09_03_130930_add_archivo_to_mensajes_table',2),(12,'2017_12_10_134932_create_temas_table',3),(13,'2018_11_12_122358_create_noticias_table',3),(14,'2019_10_04_143122_add_intro_to_noticias_table',3),(15,'2020_05_12_111241_add_publico_to_temas_table',3),(16,'2020_11_02_105643_add_orden_to_noticias_table',3),(17,'2017_12_10_134932_create_tipos_table',4),(18,'2018_11_12_122358_create_eventos_table',4),(19,'2019_10_04_143122_add_intro_to_eventos_table',4),(20,'2021_09_16_191041_add_pais_to_noticias_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`),
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
 SET character_set_client = utf8mb4 ;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(1,'App\\Models\\User',2),(1,'App\\Models\\User',3),(1,'App\\Models\\User',4);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulos`
--

DROP TABLE IF EXISTS `modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `modulos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estilo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci,
  `posicion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `orden` int(11) NOT NULL DEFAULT '0',
  `settings` text COLLATE utf8mb4_unicode_ci,
  `mostraren` text COLLATE utf8mb4_unicode_ci,
  `publicado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulos`
--

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticias`
--

DROP TABLE IF EXISTS `noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `noticias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tema_id` int(10) unsigned NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `contenido` text COLLATE utf8mb4_unicode_ci,
  `imagenes` text COLLATE utf8mb4_unicode_ci,
  `documentos` text COLLATE utf8mb4_unicode_ci,
  `links` text COLLATE utf8mb4_unicode_ci,
  `videos` text COLLATE utf8mb4_unicode_ci,
  `fecha_desde` datetime DEFAULT NULL,
  `fecha_hasta` datetime DEFAULT NULL,
  `marcada` tinyint(1) NOT NULL DEFAULT '0',
  `orden` int(11) DEFAULT NULL,
  `publicada` tinyint(1) NOT NULL DEFAULT '0',
  `campos_extra` text COLLATE utf8mb4_unicode_ci,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pais` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pais',
  PRIMARY KEY (`id`),
  KEY `noticias_slug_publicada_marcada_index` (`slug`,`publicada`,`marcada`),
  KEY `noticias_orden_index` (`orden`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticias`
--

LOCK TABLES `noticias` WRITE;
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
INSERT INTO `noticias` VALUES (4,'Lorem Ipsum','lorem-ipsum',1,NULL,'<p>wadawdada</p>','[{\"imagen\":\"Tdam2WyVWQNtqZJGHNE5NwjxgiEhpL9zIo6V3IQQ.jpg\"}]',NULL,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,'2021-09-16 03:00:00','2021-09-16 21:37:50','Pais'),(5,'Lorem Ipsum 2','lorem-ipsum-2',1,NULL,'<p>eadwadawda</p>','[{\"imagen\":\"ZjhZH0V0ybAOWoScmmlqE8O0uADMQsv0RKCK2AuK.jpg\"}]',NULL,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,'2021-09-16 03:00:00','2021-09-16 21:40:40','Pais'),(6,'Lorem ipsum 3','lorem-ipsum-3',1,NULL,'<p>wadada</p>','[{\"imagen\":\"K5ZfR3gXtJk2ihxMMBq8aVK2Kk0zYhopfRebdcAv.jpg\"}]',NULL,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,'2021-09-16 03:00:00','2021-09-16 21:40:02','Pais'),(7,'Lorem ipsum 4','lorem-ipsum-4',1,NULL,'<p>wadawdaw</p>','[{\"imagen\":\"5mRLC56RjhlZhVKXCryZhUqXZE081PnhpkVxVwHY.jpg\"}]',NULL,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,'2021-09-16 03:00:00','2021-09-16 21:40:24','Pais'),(8,'Lorem ipsum 5','lorem-ipsum-5',1,NULL,'<p>wdawdaw</p>','[{\"imagen\":\"RRJnvuHmAf7EeRPLOJOsZrkfcfhUDn6uu0yg6unh.jpg\"}]',NULL,NULL,NULL,NULL,NULL,0,NULL,1,NULL,NULL,'2021-09-16 03:00:00','2021-09-16 21:41:25','Pais'),(9,'Lorem ipsum 6','lorem-ipsum-6',1,NULL,'<p>wadawdawdaw</p>','[{\"imagen\":\"axeURzGWecezofSZ1u23utXnsrtcG0IWVLwSKYOG.jpg\"}]',NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,'2021-09-16 03:00:00','2021-09-16 21:41:18','Pais'),(10,'Lorem ipsum 9','lorem-ipsum-9',1,NULL,'<p>wadawdawda</p>','[{\"imagen\":null}]',NULL,'\"dawdawdadaw\"',NULL,NULL,NULL,0,NULL,0,NULL,NULL,'2021-09-16 03:00:00','2021-09-16 22:28:14','Argentina');
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paginas`
--

DROP TABLE IF EXISTS `paginas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `paginas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encabezado` longtext COLLATE utf8mb4_unicode_ci,
  `contenido` text COLLATE utf8mb4_unicode_ci,
  `derecha` longtext COLLATE utf8mb4_unicode_ci,
  `izquierda` longtext COLLATE utf8mb4_unicode_ci,
  `top_contenido` longtext COLLATE utf8mb4_unicode_ci,
  `pie_contenido` longtext COLLATE utf8mb4_unicode_ci,
  `pie` longtext COLLATE utf8mb4_unicode_ci,
  `posiciones` text COLLATE utf8mb4_unicode_ci,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `publicado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paginas`
--

LOCK TABLES `paginas` WRITE;
/*!40000 ALTER TABLE `paginas` DISABLE KEYS */;
INSERT INTO `paginas` VALUES (1,'inicio','inicio','[]','[{\"nombre\":\"Bienvenida\",\"tipo\":\"titulo_texto_video\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"texto\":\"<p>Bienvenidas y bienvenidos en este espacio que promueve una gesti\\u00f3n del riesgo de desastres con enfoque de inclusi\\u00f3n, poniendo a las personas en situaci\\u00f3n de mayor vulnerabilidad en el centro de la gesti\\u00f3n del riesgo, haci\\u00e9ndolessiendo part\\u00edcipes como personas sujetas de derechos, en condiciones de igualdad, sin exclusiones ni discriminaci\\u00f3n.<\\/p><p>\\u00a1Les invitamos a sumarse a este esfuerzo para comunidades m\\u00e1s inclusivas y m\\u00e1s resilientes!<\\/p>\",\"titulo\":\"Gesti\\u00f3n inclusiva del riesgo de desastres\",\"video\":\"https:\\/\\/www.youtube.com\\/watch?v=TcDKToV5BrA\",\"texto_boton\":\"Recursos\",\"link_boton\":\"\\/\"}},{\"nombre\":\"Actualidad\",\"tipo\":\"noticias_inicio\",\"campos\":[]},{\"nombre\":\"Datos Impactos\",\"tipo\":\"datos_impactos\",\"campos\":{\"modulos\":[{\"titulo\":\"Desastres ocurridos en el mundo entre 1997 y 2017\",\"texto\":\"Corresponden Am\\u00e9rica latina\",\"texto_link\":\"Informe de evaluacion regional del a\\u00f1o 2021\",\"link\":\"https:\\/\\/www.undrr.org\\/sites\\/default\\/files\\/inline-files\\/RAR-LAC%202021%20ESP.pdf\",\"porcentaje\":\"25%\"},{\"titulo\":\"Personas con discapacidad\",\"texto\":\"En el mundo existen\",\"texto_link\":\"Informe sobre discapacidad organizacion panaamericana de la salud\",\"link\":\"https:\\/\\/www.paho.org\\/es\\/temas\\/discapacidad\",\"porcentaje\":\"15%\"},{\"titulo\":\"Violencia fisica o sexual en mujeres\",\"texto\":\"Han sufrido violencia al menos una vez\",\"texto_link\":\"Maria Noel Valeza, Dia internacional emilinacion de la violencia con la mujer 2019\",\"link\":\"https:\\/\\/lac.unwomen.org\\/es\\/noticias-y-eventos\\/articulos\\/2019\\/11\\/editorial-directora-regional-onu-mujeres\",\"porcentaje\":\"33%\"},{\"titulo\":\"Pueblo indigenas\",\"texto\":\"Poblacion en America Latina\",\"texto_link\":\"Rese\\u00f1a Latinoamericana indigena en el siglo 21 Banco Mundial\",\"link\":\"https:\\/\\/www.undrr.org\\/sites\\/default\\/files\\/inline-files\\/RAR-LAC%202021%20ESP.pdf\",\"porcentaje\":\"8%\"},{\"titulo\":\"Situacion de Pobreza\",\"texto\":\"Porcentaje de la poblacion\",\"texto_link\":\"Informe panorama social de America Latina por CEPAL 2020\",\"link\":\"https:\\/\\/www.undrr.org\\/sites\\/default\\/files\\/inline-files\\/RAR-LAC%202021%20ESP.pdf\",\"porcentaje\":\"34%\"}],\"titulo_principal\":\"<h2>\\u00bfPor&nbsp;qu\\u00e9&nbsp;es&nbsp;necesario&nbsp;en&nbsp;enfoque&nbsp;de&nbsp;inclusi\\u00f3n&nbsp;en&nbsp;la&nbsp;GRD en&nbsp;Am\\u00e9rica&nbsp;latina?&nbsp;<\\/h2>\"}}]','[]','[]',NULL,NULL,'[]','[]',NULL,0,'2021-07-16 11:25:33','2021-09-17 00:29:18'),(2,'Experiencias','experiencias','[]','[{\"nombre\":\"Experiencias\",\"tipo\":\"titulo_texto\",\"campos\":{\"titulo\":\"Experiencias\"}},{\"nombre\":\"Bloques Experiencias\",\"tipo\":\"bloques_experiencias\",\"campos\":{\"modulos\":[{\"titulo\":\"Practicas inclusivas del riesgo de desastre\",\"imagen\":\"g61shbAwO2QEe3W3jnfo9bI2vgJxG06gKbtAq8aj.jpg\",\"link\":\"\\/experiencias\\/practicas_inclusivas\"},{\"titulo\":\"Historias de vida\",\"imagen\":\"3Fqp1MGwLL90ncg3YUsszXCqqWL0MnA0SPLsJzkk.jpg\",\"link\":\"\\/experiencias\\/historia_vida\"},{\"titulo\":\"Diagnosticos comunitarios inclusivos por paises\",\"imagen\":\"FpRSpV7OPaMFxUJYNLsuDIKWKbgiVlB5h9lVn9ln.jpg\",\"link\":null},{\"titulo\":\"Evidencias covid x3\",\"imagen\":\"P6ibCuuzARhTf9jS9O2xyC4peL1GhusFelyGAcRT.jpg\",\"link\":null}]}}]','[]','[]',NULL,NULL,'[]','[]',NULL,0,'2021-09-15 19:41:44','2021-09-17 20:23:50'),(4,'Recursos','recursos','[]','[{\"nombre\":\"Recursos\",\"tipo\":\"titulo_texto\",\"campos\":{\"titulo\":\"Recursos\",\"texto\":\"<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe, aliquam.&nbsp;<\\/p>\"}},{\"nombre\":\"Descarga PDF\",\"tipo\":\"imagen_texto_link\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"texto\":\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque a deserunt quaerat delectus iusto reiciendis hic, ullam non fugiat perferendis quae possimus odio temporibus ducimus veritatis nobis sunt quibusdam esse commodi culpa sed, voluptatibus sint voluptas dignissimos. Ea, omnis expedita?&nbsp;<\\/p>\",\"link\":null,\"imagen\":\"DN45kdh5bEJNyNfSeOlnOb9htn0a1Dt3WbzD04jH.jpg\",\"texto_link\":\"Guia para la ayuda humanitaria ante desastres naturales y emergencias\"}},{\"nombre\":\"Caja de herramientas\",\"tipo\":\"bloques\",\"campos\":{\"modulos\":[{\"texto\":\"Herramientas Comunitarias\",\"imagen\":\"Dw45JraBSE3XVv4YE2lYftA6PEAYKfnsDprjYEb3.jpg\"},{\"texto\":\"Herramientas\",\"imagen\":\"8limsVKzlsB5Y6Wz2rtK1ou3izrCZjilh9ITtXD3.jpg\"},{\"texto\":\"Herramientas Covid\",\"imagen\":\"weSs9rDrlCx2o6qB2C2YRlrAHTukEAEO2npMUJsu.jpg\"}],\"columnas\":\"3\",\"titulo\":\"Caja de herramientas\",\"color\":\"negro\"}},{\"nombre\":\"Glosario\",\"tipo\":\"titulo_texto_link\",\"campos\":{\"titulo\":\"Glosario\",\"texto\":\"<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad debitis vitae quisquam illo sapiente ex aspernatur non, illum aperiam ab sunt odio sint eum, dignissimos voluptatem itaque ullam quaerat? Nesciunt.&nbsp;<\\/p>\",\"texto_link\":\"Ver Glosario\",\"link\":\"https:\\/\\/docs.google.com\\/document\\/d\\/1nXQIt-kov6a68eJOSo02k7aSYkqRZiLA\\/edit?rtpof=true\"}},{\"nombre\":\"Tematicas\",\"tipo\":\"bloques\",\"campos\":{\"modulos\":[{\"texto\":\"Reducci\\u00f3n de riesgo de desastre\",\"imagen\":\"HOUUgdMyZcl5B4PrFFWcLaYpQO0ZLAnwf1HKYTms.jpg\",\"link\":null},{\"texto\":\"Discapacidad\",\"imagen\":\"ePy4QTuKTGg6MtImQFGeIy6aLt6QiTUF7aFpaUUx.jpg\",\"link\":\"\\/recursos\\/discapacidad\"},{\"texto\":\"G\\u00e9nero\",\"imagen\":\"HqUUUgZqvDvcshhAjvG8xg8xw3u5xc6lAwfOxUxp.jpg\",\"link\":\"\\/recursos\\/genero\"},{\"texto\":\"Edad\",\"imagen\":\"hpKQErrxqhfNmW0JoJpzgs5lgoeYUJ4kffqkvysb.jpg\",\"link\":null},{\"texto\":\"\\u00c9tnico\",\"imagen\":\"a1iep7RoGJocJcqsai4Xu4h0TQcIJc0OXayRYQjz.jpg\",\"link\":null},{\"texto\":\"Enfoque de inclusi\\u00f3n\",\"imagen\":\"NrxsGte1leLeRHeYwz2uDgPJvggwyLOt1io6alwo.jpg\",\"link\":null},{\"texto\":\"Acci\\u00f3n humanitaria inclusiva\",\"imagen\":\"8YApawz8pSmja3qvYwmI1DotdS4gLXr35MXwN4yP.jpg\",\"link\":null},{\"texto\":\"Respuesta inclusiva COVID\",\"imagen\":\"0MgMek7dUn8GT1PHL2WK5LxsrsWqbJjSIAsaOZWj.jpg\",\"link\":null}],\"columnas\":\"4\",\"titulo\":\"Tematicas\",\"color\":\"negro\"}},{\"nombre\":\"Banderas\",\"tipo\":\"bloques_banderas\",\"campos\":{\"modulos\":[{\"texto\":\"Colombia\",\"imagen\":\"7Qei0M5hpPI91Sy4iymZPJl6TdynZeL835uRjC5x.png\",\"link\":null},{\"texto\":\"Peru\",\"imagen\":\"qfvnqaF7IAQeK0FZCJUNVzZXJCBdh2CwJUczvJxk.png\",\"link\":null},{\"texto\":\"Paraguay\",\"imagen\":\"RMhiLnTlMHGt9ggpItaa7WESXvD7APOvc40M7rdS.png\",\"link\":null}],\"titulo\":\"Recursos por paises\"}}]','[]','[]',NULL,NULL,'[]','[]',NULL,0,'2021-09-16 23:10:30','2021-09-17 20:02:57');
/*!40000 ALTER TABLE `paginas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'mensajes-recibir','web','2021-07-16 14:05:08','2021-07-16 14:05:08'),(2,'admin-configuraciones','web','2021-07-16 14:05:08','2021-07-16 14:05:08'),(3,'admin-usuarios','web','2021-07-16 14:05:08','2021-07-16 14:05:08'),(4,'admin-menu','web','2021-07-16 14:05:08','2021-07-16 14:05:08'),(5,'gestion','web','2021-07-16 14:05:08','2021-07-16 14:05:08'),(6,'paginas-crearmodulos','web','2021-07-16 11:25:29','2021-07-16 11:25:29'),(7,'paginas-borrarmodulos','web','2021-07-16 11:25:30','2021-07-16 11:25:30'),(8,'paginas-dragmodulos','web','2021-07-16 11:25:30','2021-07-16 11:25:30'),(9,'paginas-editartitulo','web','2021-07-16 11:25:30','2021-07-16 11:25:30'),(10,'noticias-crear','web','2021-07-16 14:37:35','2021-07-16 14:37:35'),(11,'noticias-borrar','web','2021-07-16 14:37:35','2021-07-16 14:37:35'),(12,'noticias-editar','web','2021-07-16 14:37:35','2021-07-16 14:37:35'),(13,'eventos-crear','web','2021-09-16 16:46:19','2021-09-16 16:46:19'),(14,'eventos-borrar','web','2021-09-16 16:46:20','2021-09-16 16:46:20'),(15,'eventos-editar','web','2021-09-16 16:46:20','2021-09-16 16:46:20');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
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
INSERT INTO `role_has_permissions` VALUES (2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(1,2),(5,2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador','web','2021-07-16 14:05:08','2021-07-16 14:05:08'),(2,'Gestor','web','2021-07-16 14:05:08','2021-07-16 14:05:08');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temas`
--

DROP TABLE IF EXISTS `temas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `temas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagenes` text COLLATE utf8mb4_unicode_ci,
  `publico` tinyint(1) NOT NULL DEFAULT '1',
  `archivado` tinyint(1) NOT NULL DEFAULT '0',
  `color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temas`
--

LOCK TABLES `temas` WRITE;
/*!40000 ALTER TABLE `temas` DISABLE KEYS */;
INSERT INTO `temas` VALUES (1,'General','general',NULL,NULL,1,0,'#000000','2021-07-16 14:37:35','2021-07-16 14:37:35');
/*!40000 ALTER TABLE `temas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos`
--

DROP TABLE IF EXISTS `tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tipos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagenes` text COLLATE utf8mb4_unicode_ci,
  `archivado` tinyint(1) NOT NULL DEFAULT '0',
  `color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos`
--

LOCK TABLES `tipos` WRITE;
/*!40000 ALTER TABLE `tipos` DISABLE KEYS */;
INSERT INTO `tipos` VALUES (1,'General','general',NULL,NULL,0,'#000000','2021-09-16 18:17:06','2021-09-16 18:17:06');
/*!40000 ALTER TABLE `tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `activated` tinyint(1) DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Santiago Argilla','sargilla@gmail.com','$2y$10$zsy6ncNm0Qwwa45A1IH/gebY.bDcGWVCX0hs3aSmdQXEjKQIJzTfO','\"{}\"',NULL,NULL,NULL,'2021-07-16 14:05:09','2021-07-16 14:05:09'),(2,'Mario Figge','mario@3tristestigres.com','$2y$10$algl8btSSqnaP1uDSFJIG.AExBWpsWVUB63LWU2iZyyLhWrhHRp/O','\"{}\"',NULL,NULL,NULL,'2021-07-16 14:05:09','2021-07-16 14:05:09'),(3,'Hernan Cefarelli','hernancefarelli@gmail.com','$2y$10$fGLPAOpBKT2Oy.ZDEW3CPOiGJ/gLbCxR/W46TUraOSEigZYTCi0Sq','\"{}\"',NULL,NULL,NULL,'2021-07-16 14:05:09','2021-07-16 14:05:09'),(4,'David Zisele','davidzisele2016@gmail.com','$2y$10$PsOwvS4XtqnVdio.PAaWLekAjX151kX9hUHLIgqf/CzxFsZKSBcUW','\"{}\"',NULL,NULL,NULL,'2021-07-16 14:05:09','2021-07-16 14:05:09');
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

-- Dump completed on 2021-09-17 17:34:27
