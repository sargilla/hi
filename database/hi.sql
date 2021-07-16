-- Adminer 4.8.1 MySQL 5.7.24 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `configuraciones`;
CREATE TABLE `configuraciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
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


DROP TABLE IF EXISTS `mensajes`;
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


DROP TABLE IF EXISTS `menus`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menus` (`id`, `padre_id`, `nombre`, `menu`, `alias`, `tipo`, `destino`, `icono`, `color`, `configuraciones`, `orden`, `permiso`, `created_at`, `updated_at`) VALUES
(1,	0,	'Dashboard',	'admin',	'dashboard',	'route',	'gestion.index',	'fas fa-tachometer-alt',	NULL,	NULL,	0,	'gestion',	'2021-07-16 14:05:10',	'2021-07-16 14:05:10'),
(2,	0,	'Menus',	'admin',	'menus',	'route',	'menus.index',	'fas fa-map-signs',	NULL,	NULL,	1,	'admin-menu',	'2021-07-16 14:05:10',	'2021-07-16 14:05:10'),
(3,	0,	'Usuarios',	'admin',	'usuarios',	'url',	'#',	'fas fa-users',	NULL,	NULL,	2,	'admin-usuarios',	'2021-07-16 14:05:10',	'2021-07-16 14:05:10'),
(4,	3,	'Usuarios',	'admin',	'usuarios-index',	'route',	'users.index',	'fas fa-users',	NULL,	NULL,	1,	'admin-usuarios',	'2021-07-16 14:05:10',	'2021-07-16 14:05:10'),
(5,	3,	'Roles',	'admin',	'roles',	'route',	'roles.index',	'fas fa-id-card',	NULL,	NULL,	2,	'admin-usuarios',	'2021-07-16 14:05:10',	'2021-07-16 14:05:10'),
(6,	3,	'Permisos',	'admin',	'permisos',	'route',	'permisos.index',	'fas fa-lock',	NULL,	NULL,	3,	'admin-usuarios',	'2021-07-16 14:05:10',	'2021-07-16 14:05:10'),
(7,	0,	'Configuraciones',	'admin',	'configuraciones',	'route',	'configuraciones.index',	'fas fa-cogs',	NULL,	NULL,	20,	'admin-configuraciones',	'2021-07-16 14:05:10',	'2021-07-16 14:05:10'),
(8,	0,	'Páginas',	'admin',	'paginas',	'route',	'paginas.index',	'fas fa-sitemap',	NULL,	NULL,	6,	'gestion',	'2021-07-16 11:25:29',	'2021-07-16 11:25:29'),
(9,	0,	'Modulos',	'admin',	'modulos',	'route',	'modulos.index',	'fas fa-cubes',	NULL,	NULL,	7,	'gestion',	'2021-07-16 11:25:29',	'2021-07-16 11:25:29'),
(10,	0,	'Mensajes',	'admin',	'mensajes',	'route',	'mensajes.index',	'fas fa-envelope',	NULL,	NULL,	8,	'gestion',	'2021-07-16 11:25:29',	'2021-07-16 11:25:29'),
(11,	0,	'Noticias',	'admin',	'noticias',	'route',	'noticias.index',	'fas fa-newspaper',	NULL,	NULL,	5,	'gestion',	'2021-07-16 14:37:35',	'2021-07-16 14:50:42');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_000001_create_menus_table',	1),
(3,	'2014_10_12_000002_create_permission_tables',	1),
(4,	'2014_10_12_100000_create_password_resets_table',	1),
(5,	'2018_04_18_104451_create_configuraciones_table',	1),
(6,	'2019_08_19_000000_create_failed_jobs_table',	1),
(7,	'2017_05_09_142554_create_paginas_table',	2),
(8,	'2017_08_16_142621_create_mensajes_table',	2),
(9,	'2018_08_17_102909_create_modulos_table',	2),
(10,	'2019_09_03_130930_add_header_to_paginas_table',	2),
(11,	'2021_09_03_130930_add_archivo_to_mensajes_table',	2),
(12,	'2017_12_10_134932_create_temas_table',	3),
(13,	'2018_11_12_122358_create_noticias_table',	3),
(14,	'2019_10_04_143122_add_intro_to_noticias_table',	3),
(15,	'2020_05_12_111241_add_publico_to_temas_table',	3),
(16,	'2020_11_02_105643_add_orden_to_noticias_table',	3);

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1,	'App\\Models\\User',	1),
(1,	'App\\Models\\User',	2),
(1,	'App\\Models\\User',	3),
(1,	'App\\Models\\User',	4);

DROP TABLE IF EXISTS `modulos`;
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


DROP TABLE IF EXISTS `noticias`;
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
  PRIMARY KEY (`id`),
  KEY `noticias_slug_publicada_marcada_index` (`slug`,`publicada`,`marcada`),
  KEY `noticias_orden_index` (`orden`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `paginas`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `paginas` (`id`, `titulo`, `slug`, `encabezado`, `contenido`, `derecha`, `izquierda`, `top_contenido`, `pie_contenido`, `pie`, `posiciones`, `settings`, `publicado`, `created_at`, `updated_at`) VALUES
(1,	'inicio',	'inicio',	NULL,	'[{\"nombre\":\"Texto de inicio\",\"tipo\":\"titulo_texto\",\"campos\":{\"titulo\":\"Pagina inicial Estudio Rompecabezas\",\"texto\":\"Esta es la pagina inicial del paquete Paginas de Estudio Rompecabezas\"}}]',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	0,	'2021-07-16 11:25:33',	'2021-07-16 11:25:33');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1,	'mensajes-recibir',	'web',	'2021-07-16 14:05:08',	'2021-07-16 14:05:08'),
(2,	'admin-configuraciones',	'web',	'2021-07-16 14:05:08',	'2021-07-16 14:05:08'),
(3,	'admin-usuarios',	'web',	'2021-07-16 14:05:08',	'2021-07-16 14:05:08'),
(4,	'admin-menu',	'web',	'2021-07-16 14:05:08',	'2021-07-16 14:05:08'),
(5,	'gestion',	'web',	'2021-07-16 14:05:08',	'2021-07-16 14:05:08'),
(6,	'paginas-crearmodulos',	'web',	'2021-07-16 11:25:29',	'2021-07-16 11:25:29'),
(7,	'paginas-borrarmodulos',	'web',	'2021-07-16 11:25:30',	'2021-07-16 11:25:30'),
(8,	'paginas-dragmodulos',	'web',	'2021-07-16 11:25:30',	'2021-07-16 11:25:30'),
(9,	'paginas-editartitulo',	'web',	'2021-07-16 11:25:30',	'2021-07-16 11:25:30'),
(10,	'noticias-crear',	'web',	'2021-07-16 14:37:35',	'2021-07-16 14:37:35'),
(11,	'noticias-borrar',	'web',	'2021-07-16 14:37:35',	'2021-07-16 14:37:35'),
(12,	'noticias-editar',	'web',	'2021-07-16 14:37:35',	'2021-07-16 14:37:35');

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1,	'Administrador',	'web',	'2021-07-16 14:05:08',	'2021-07-16 14:05:08'),
(2,	'Gestor',	'web',	'2021-07-16 14:05:08',	'2021-07-16 14:05:08');

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2,	1),
(3,	1),
(4,	1),
(5,	1),
(6,	1),
(7,	1),
(8,	1),
(9,	1),
(10,	1),
(11,	1),
(12,	1),
(1,	2),
(5,	2);

DROP TABLE IF EXISTS `temas`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `temas` (`id`, `nombre`, `slug`, `descripcion`, `imagenes`, `publico`, `archivado`, `color`, `created_at`, `updated_at`) VALUES
(1,	'General',	'general',	NULL,	NULL,	1,	0,	'#000000',	'2021-07-16 14:37:35',	'2021-07-16 14:37:35');

DROP TABLE IF EXISTS `users`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `settings`, `activated`, `confirmed`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Santiago Argilla',	'sargilla@gmail.com',	'$2y$10$zsy6ncNm0Qwwa45A1IH/gebY.bDcGWVCX0hs3aSmdQXEjKQIJzTfO',	'\"{}\"',	NULL,	NULL,	NULL,	'2021-07-16 14:05:09',	'2021-07-16 14:05:09'),
(2,	'Mario Figge',	'mario@3tristestigres.com',	'$2y$10$algl8btSSqnaP1uDSFJIG.AExBWpsWVUB63LWU2iZyyLhWrhHRp/O',	'\"{}\"',	NULL,	NULL,	NULL,	'2021-07-16 14:05:09',	'2021-07-16 14:05:09'),
(3,	'Hernan Cefarelli',	'hernancefarelli@gmail.com',	'$2y$10$fGLPAOpBKT2Oy.ZDEW3CPOiGJ/gLbCxR/W46TUraOSEigZYTCi0Sq',	'\"{}\"',	NULL,	NULL,	NULL,	'2021-07-16 14:05:09',	'2021-07-16 14:05:09'),
(4,	'David Zisele',	'davidzisele2016@gmail.com',	'$2y$10$PsOwvS4XtqnVdio.PAaWLekAjX151kX9hUHLIgqf/CzxFsZKSBcUW',	'\"{}\"',	NULL,	NULL,	NULL,	'2021-07-16 14:05:09',	'2021-07-16 14:05:09');

-- 2021-07-16 14:51:41
