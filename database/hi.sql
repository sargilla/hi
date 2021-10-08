-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-10-2021 a las 16:23:48
-- Versión del servidor: 10.3.31-MariaDB
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pereyracom_hi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagenes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documentos` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `links` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videos` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_desde` datetime DEFAULT NULL,
  `fecha_hasta` datetime DEFAULT NULL,
  `marcado` tinyint(1) NOT NULL DEFAULT 0,
  `publicado` tinyint(1) NOT NULL DEFAULT 0,
  `campos_extra` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pais` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Pais',
  `nivel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sector` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `slug`, `tipo_id`, `intro`, `contenido`, `imagenes`, `documentos`, `links`, `videos`, `fecha_desde`, `fecha_hasta`, `marcado`, `publicado`, `campos_extra`, `tags`, `created_at`, `updated_at`, `pais`, `nivel`, `sector`) VALUES
(1, 'sdadssa dadf', 'sdadssa-dadf', 1, NULL, '<p>asdfasdfsf asdfsaf</p>', '[{\"imagen\":\"kRPAL6RyQ15kfU3n3j1EO4TwkzcweQrEpPNwFLxZ.jpg\"}]', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '2021-09-16 18:19:09', '2021-09-29 21:28:55', 'Argentina', 'Prueba', 'Prueba'),
(2, 'lorem ipsum', 'lorem-ipsum', 1, NULL, '<p>wadawdaw</p>', '[{\"imagen\":\"WckTIwTcdUBc9ovkmkCN0fwwhtRsNr15i8v6Cjvh.jpg\"}]', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, '2021-09-29 18:55:33', '2021-09-29 18:56:18', 'Pais', NULL, NULL),
(3, 'lorem ipsum 4', 'lorem-ipsum-4', 1, NULL, '<p>wadadaw</p>', '[{\"imagen\":\"ej27rkdFQslUI6ppVUahJVqVjPYNnK57ts6q45kD.jpg\"}]', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, '2021-09-29 18:55:58', '2021-09-29 18:56:19', 'Pais', NULL, NULL),
(4, 'lorem ipsum 6', 'lorem-ipsum-6', 1, NULL, '<p>wadadawdawdawda</p>', '[{\"imagen\":\"PNrrxt3PXtq82VBHUZAsUobUmwIQ8F0v5FqXfCxq.jpg\"}]', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, '2021-09-29 18:56:15', '2021-09-29 19:10:49', 'Pais', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `leido` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `padre_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destino` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `configuraciones` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `permiso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `padre_id`, `nombre`, `menu`, `alias`, `tipo`, `destino`, `icono`, `color`, `configuraciones`, `orden`, `permiso`, `created_at`, `updated_at`) VALUES
(1, 0, 'Dashboard', 'admin', 'dashboard', 'route', 'gestion.index', 'fas fa-tachometer-alt', NULL, NULL, 0, 'gestion', '2021-07-16 14:05:10', '2021-07-16 14:05:10'),
(2, 0, 'Menus', 'admin', 'menus', 'route', 'menus.index', 'fas fa-map-signs', NULL, NULL, 1, 'admin-menu', '2021-07-16 14:05:10', '2021-07-16 14:05:10'),
(3, 0, 'Usuarios', 'admin', 'usuarios', 'url', '#', 'fas fa-users', NULL, NULL, 2, 'admin-usuarios', '2021-07-16 14:05:10', '2021-07-16 14:05:10'),
(4, 3, 'Usuarios', 'admin', 'usuarios-index', 'route', 'users.index', 'fas fa-users', NULL, NULL, 1, 'admin-usuarios', '2021-07-16 14:05:10', '2021-07-16 14:05:10'),
(5, 3, 'Roles', 'admin', 'roles', 'route', 'roles.index', 'fas fa-id-card', NULL, NULL, 2, 'admin-usuarios', '2021-07-16 14:05:10', '2021-07-16 14:05:10'),
(6, 3, 'Permisos', 'admin', 'permisos', 'route', 'permisos.index', 'fas fa-lock', NULL, NULL, 3, 'admin-usuarios', '2021-07-16 14:05:10', '2021-07-16 14:05:10'),
(7, 0, 'Configuraciones', 'admin', 'configuraciones', 'route', 'configuraciones.index', 'fas fa-cogs', NULL, NULL, 20, 'admin-configuraciones', '2021-07-16 14:05:10', '2021-07-16 14:05:10'),
(8, 0, 'Páginas', 'admin', 'paginas', 'route', 'paginas.index', 'fas fa-sitemap', NULL, NULL, 6, 'gestion', '2021-07-16 11:25:29', '2021-07-16 11:25:29'),
(9, 0, 'Modulos', 'admin', 'modulos', 'route', 'modulos.index', 'fas fa-cubes', NULL, NULL, 7, 'gestion', '2021-07-16 11:25:29', '2021-07-16 11:25:29'),
(10, 0, 'Mensajes', 'admin', 'mensajes', 'route', 'mensajes.index', 'fas fa-envelope', NULL, NULL, 8, 'gestion', '2021-07-16 11:25:29', '2021-07-16 11:25:29'),
(11, 0, 'Noticias', 'admin', 'noticias', 'route', 'noticias.index', 'fas fa-newspaper', NULL, NULL, 5, 'gestion', '2021-07-16 14:37:35', '2021-07-16 14:50:42'),
(13, 0, 'Eventos', 'admin', 'eventos', 'route', 'eventos.index', 'fas fa-newspaper', NULL, NULL, 6, 'gestion', '2021-09-16 17:00:12', '2021-09-16 17:00:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_000001_create_menus_table', 1),
(3, '2014_10_12_000002_create_permission_tables', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_04_18_104451_create_configuraciones_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2017_05_09_142554_create_paginas_table', 2),
(8, '2017_08_16_142621_create_mensajes_table', 2),
(9, '2018_08_17_102909_create_modulos_table', 2),
(10, '2019_09_03_130930_add_header_to_paginas_table', 2),
(11, '2021_09_03_130930_add_archivo_to_mensajes_table', 2),
(12, '2017_12_10_134932_create_temas_table', 3),
(13, '2018_11_12_122358_create_noticias_table', 3),
(14, '2019_10_04_143122_add_intro_to_noticias_table', 3),
(15, '2020_05_12_111241_add_publico_to_temas_table', 3),
(16, '2020_11_02_105643_add_orden_to_noticias_table', 3),
(17, '2017_12_10_134932_create_tipos_table', 4),
(18, '2018_11_12_122358_create_eventos_table', 4),
(19, '2019_10_04_143122_add_intro_to_eventos_table', 4),
(21, '2021_09_16_191041_add_pais_to_noticias_table', 5),
(22, '2021_09_29_181603_add_pais_to_eventos_table', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estilo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posicion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `orden` int(11) NOT NULL DEFAULT 0,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mostraren` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publicado` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tema_id` int(10) UNSIGNED NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagenes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documentos` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `links` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videos` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_desde` datetime DEFAULT NULL,
  `fecha_hasta` datetime DEFAULT NULL,
  `marcada` tinyint(1) NOT NULL DEFAULT 0,
  `orden` int(11) DEFAULT NULL,
  `publicada` tinyint(1) NOT NULL DEFAULT 0,
  `campos_extra` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pais` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Pais'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `slug`, `tema_id`, `intro`, `contenido`, `imagenes`, `documentos`, `links`, `videos`, `fecha_desde`, `fecha_hasta`, `marcada`, `orden`, `publicada`, `campos_extra`, `tags`, `created_at`, `updated_at`, `pais`) VALUES
(4, 'Lorem Ipsum', 'lorem-ipsum', 1, NULL, '<p>wadawdada</p>', '[{\"imagen\":\"Tdam2WyVWQNtqZJGHNE5NwjxgiEhpL9zIo6V3IQQ.jpg\"}]', NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, '2021-09-30 03:00:00', '2021-09-29 21:44:44', 'Pais'),
(5, 'Lorem Ipsum 2', 'lorem-ipsum-2', 1, NULL, '<p>eadwadawda</p>', '[{\"imagen\":\"ZjhZH0V0ybAOWoScmmlqE8O0uADMQsv0RKCK2AuK.jpg\"}]', NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, '2021-09-16 03:00:00', '2021-09-29 18:16:41', 'Pais'),
(6, 'Lorem ipsum 3', 'lorem-ipsum-3', 1, NULL, '<p>wadada</p>', '[{\"imagen\":\"K5ZfR3gXtJk2ihxMMBq8aVK2Kk0zYhopfRebdcAv.jpg\"}]', NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, '2021-09-16 03:00:00', '2021-09-29 18:13:43', 'Pais'),
(7, 'Lorem ipsum 4', 'lorem-ipsum-4', 1, NULL, '<p>wadawdaw</p>', '[{\"imagen\":\"5mRLC56RjhlZhVKXCryZhUqXZE081PnhpkVxVwHY.jpg\"}]', NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, '2021-09-16 03:00:00', '2021-09-16 21:40:24', 'Pais'),
(8, 'Lorem ipsum 5', 'lorem-ipsum-5', 1, NULL, '<p>wdawdaw</p>', '[{\"imagen\":\"RRJnvuHmAf7EeRPLOJOsZrkfcfhUDn6uu0yg6unh.jpg\"}]', NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, '2021-09-16 03:00:00', '2021-09-16 21:41:25', 'Pais'),
(9, 'Lorem ipsum 6', 'lorem-ipsum-6', 2, NULL, '<p>wadawdawdaw</p>', '[{\"imagen\":\"axeURzGWecezofSZ1u23utXnsrtcG0IWVLwSKYOG.jpg\"}]', NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, '2021-09-16 03:00:00', '2021-09-23 17:04:17', 'Pais'),
(10, 'Lorem ipsum 9', 'lorem-ipsum-9', 2, NULL, '<p>wadawdawda</p>', '[{\"imagen\":null}]', NULL, '\"dawdawdadaw\"', NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, '2021-09-16 03:00:00', '2021-09-23 17:04:27', 'Pais'),
(11, 'lorem ipsum 11', 'lorem-ipsum-11', 2, NULL, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, sapiente quae sed quis explicabo ullam et, debitis nobis odio qui a placeat. Delectus placeat excepturi ea vitae velit quaerat iste.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, sapiente quae sed quis explicabo ullam et, debitis nobis odio qui a placeat. Delectus placeat excepturi ea vitae velit quaerat iste.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, sapiente quae sed quis explicabo ullam et, debitis nobis odio qui a placeat. Delectus placeat excepturi ea vitae velit quaerat iste.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, sapiente quae sed quis explicabo ullam et, debitis nobis odio qui a placeat. Delectus placeat excepturi ea vitae velit quaerat iste.</p>', '[{\"imagen\":\"HslSaTIOcMSDmj9rHnNE5IVLzh2GXTVuuSg7TMnS.jpg\"},{\"imagen\":\"g3ylW20Ope2REYe4bj92EOtC3aH1gYfXeoeFtkCX.jpg\"},{\"imagen\":\"dtUGQnv3fZp0IB0HnRP4cYEsG8xP1zWCKWAJmYB1.jpg\"}]', NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, '2021-09-23 03:00:00', '2021-09-23 21:56:29', NULL),
(12, 'prueba', 'prueba', 2, NULL, '<p>wdawdawdada</p>', '[{\"imagen\":null}]', NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, '2021-09-23 03:00:00', '2021-09-23 17:15:36', NULL),
(15, 'lorem ipsum 20', 'lorem-ipsum-20', 4, NULL, '<p>wadada</p>', '[{\"imagen\":null}]', NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, '2021-09-23 03:00:00', '2021-09-23 20:37:46', NULL),
(16, 'lorem ipsum 21', 'lorem-ipsum-21', 4, NULL, '<p>wadawda</p>', '[{\"imagen\":null}]', NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, '2021-09-23 03:00:00', '2021-09-23 20:37:43', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginas`
--

CREATE TABLE `paginas` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encabezado` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `derecha` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `izquierda` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_contenido` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pie_contenido` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pie` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posiciones` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publicado` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paginas`
--

INSERT INTO `paginas` (`id`, `titulo`, `slug`, `encabezado`, `contenido`, `derecha`, `izquierda`, `top_contenido`, `pie_contenido`, `pie`, `posiciones`, `settings`, `publicado`, `created_at`, `updated_at`) VALUES
(1, 'inicio', 'inicio', '[]', '[{\"nombre\":\"Bienvenida\",\"tipo\":\"titulo_texto_video\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"texto\":\"<p>Bienvenidas y bienvenidos en este espacio que promueve una gesti\\u00f3n del riesgo de desastres con enfoque de inclusi\\u00f3n, poniendo a las personas en situaci\\u00f3n de mayor vulnerabilidad en el centro de la gesti\\u00f3n del riesgo, haci\\u00e9ndolessiendo part\\u00edcipes como personas sujetas de derechos, en condiciones de igualdad, sin exclusiones ni discriminaci\\u00f3n.<\\/p><p>\\u00a1Les invitamos a sumarse a este esfuerzo para comunidades m\\u00e1s inclusivas y m\\u00e1s resilientes!<\\/p>\",\"titulo\":\"Gesti\\u00f3n inclusiva del riesgo de desastres\",\"video\":\"https:\\/\\/www.youtube.com\\/watch?v=TcDKToV5BrA\",\"texto_boton\":\"Recursos\",\"link_boton\":\"\\/\"}},{\"nombre\":\"Actualidad\",\"tipo\":\"noticias_inicio\",\"campos\":{\"categoria\":\"actualidad\",\"estilo\":\"1\"}},{\"nombre\":\"Datos Impactos\",\"tipo\":\"datos_impactos\",\"campos\":{\"modulos\":[{\"titulo\":\"Desastres ocurridos en el mundo entre 1997 y 2017\",\"texto\":\"Corresponden Am\\u00e9rica latina\",\"texto_link\":\"Informe de evaluacion regional del a\\u00f1o 2021\",\"link\":\"https:\\/\\/www.undrr.org\\/sites\\/default\\/files\\/inline-files\\/RAR-LAC%202021%20ESP.pdf\",\"porcentaje\":\"25%\"},{\"titulo\":\"Personas con discapacidad\",\"texto\":\"En el mundo existen\",\"texto_link\":\"Informe sobre discapacidad organizacion panaamericana de la salud\",\"link\":\"https:\\/\\/www.paho.org\\/es\\/temas\\/discapacidad\",\"porcentaje\":\"15%\"},{\"titulo\":\"Violencia fisica o sexual en mujeres\",\"texto\":\"Han sufrido violencia al menos una vez\",\"texto_link\":\"Maria Noel Valeza, Dia internacional emilinacion de la violencia con la mujer 2019\",\"link\":\"https:\\/\\/lac.unwomen.org\\/es\\/noticias-y-eventos\\/articulos\\/2019\\/11\\/editorial-directora-regional-onu-mujeres\",\"porcentaje\":\"33%\"},{\"titulo\":\"Pueblo indigenas\",\"texto\":\"Poblacion en America Latina\",\"texto_link\":\"Rese\\u00f1a Latinoamericana indigena en el siglo 21 Banco Mundial\",\"link\":\"https:\\/\\/www.undrr.org\\/sites\\/default\\/files\\/inline-files\\/RAR-LAC%202021%20ESP.pdf\",\"porcentaje\":\"8%\"},{\"titulo\":\"Situacion de Pobreza\",\"texto\":\"Porcentaje de la poblacion\",\"texto_link\":\"Informe panorama social de America Latina por CEPAL 2020\",\"link\":\"https:\\/\\/www.undrr.org\\/sites\\/default\\/files\\/inline-files\\/RAR-LAC%202021%20ESP.pdf\",\"porcentaje\":\"34%\"}],\"titulo_principal\":\"<h2>\\u00bfPor&nbsp;qu\\u00e9&nbsp;es&nbsp;necesario&nbsp;en&nbsp;enfoque&nbsp;de&nbsp;inclusi\\u00f3n&nbsp;en&nbsp;la&nbsp;GRD en&nbsp;Am\\u00e9rica&nbsp;latina?&nbsp;<\\/h2>\"}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-07-16 11:25:33', '2021-09-23 16:51:15'),
(2, 'Experiencias', 'experiencias', '[]', '[{\"nombre\":\"Experiencias\",\"tipo\":\"titulo_texto\",\"campos\":{\"titulo\":\"Experiencias\",\"color\":\"1\",\"estilo\":\"1\",\"pagina_anterior\":\"Pagina Principal\"}},{\"nombre\":\"Bloques Experiencias\",\"tipo\":\"bloques_experiencias\",\"campos\":{\"modulos\":[{\"titulo\":\"Practicas inclusivas del riesgo de desastre\",\"imagen\":\"g61shbAwO2QEe3W3jnfo9bI2vgJxG06gKbtAq8aj.jpg\",\"link\":\"practicas-inclusivas-del-riesgo-de-desastre\"},{\"titulo\":\"Historias de vida\",\"imagen\":\"3Fqp1MGwLL90ncg3YUsszXCqqWL0MnA0SPLsJzkk.jpg\",\"link\":\"historia-de-vida\"},{\"titulo\":\"Diagnosticos comunitarios inclusivos por paises\",\"imagen\":\"FpRSpV7OPaMFxUJYNLsuDIKWKbgiVlB5h9lVn9ln.jpg\",\"link\":\"diagnosticos-comunitarios-inclusivos\"},{\"titulo\":\"Evidencias covid x3\",\"imagen\":\"P6ibCuuzARhTf9jS9O2xyC4peL1GhusFelyGAcRT.jpg\",\"link\":\"evidencias-covid\"}]}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-09-15 19:41:44', '2021-09-29 16:31:55'),
(4, 'Recursos', 'recursos', '[]', '[{\"nombre\":\"Recursos\",\"tipo\":\"titulo_texto\",\"campos\":{\"titulo\":\"Recursos\",\"texto\":\"<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe, aliquam.&nbsp;<\\/p>\",\"color\":\"1\",\"estilo\":\"1\",\"pagina_anterior\":\"Pagina Principal\"}},{\"nombre\":\"Descarga PDF\",\"tipo\":\"imagen_texto_link\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"texto\":\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque a deserunt quaerat delectus iusto reiciendis hic, ullam non fugiat perferendis quae possimus odio temporibus ducimus veritatis nobis sunt quibusdam esse commodi culpa sed, voluptatibus sint voluptas dignissimos. Ea, omnis expedita?&nbsp;<\\/p>\",\"link\":null,\"imagen\":\"DN45kdh5bEJNyNfSeOlnOb9htn0a1Dt3WbzD04jH.jpg\",\"texto_link\":\"Guia para la ayuda humanitaria ante desastres naturales y emergencias\",\"estilo\":\"1\"}},{\"nombre\":\"Caja de herramientas\",\"tipo\":\"bloques\",\"campos\":{\"modulos\":[{\"texto\":\"Herramientas Comunitarias\",\"imagen\":\"Dw45JraBSE3XVv4YE2lYftA6PEAYKfnsDprjYEb3.jpg\",\"link\":null},{\"texto\":\"Herramientas\",\"imagen\":\"8limsVKzlsB5Y6Wz2rtK1ou3izrCZjilh9ITtXD3.jpg\",\"link\":null},{\"texto\":\"Herramientas Covid\",\"imagen\":\"weSs9rDrlCx2o6qB2C2YRlrAHTukEAEO2npMUJsu.jpg\"}],\"columnas\":\"3\",\"titulo\":\"Caja de herramientas\",\"color\":\"negro\",\"estilo\":\"1\"}},{\"nombre\":\"Glosario\",\"tipo\":\"titulo_texto_link\",\"campos\":{\"titulo\":\"Glosario\",\"texto\":\"<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad debitis vitae quisquam illo sapiente ex aspernatur non, illum aperiam ab sunt odio sint eum, dignissimos voluptatem itaque ullam quaerat? Nesciunt.&nbsp;<\\/p>\",\"texto_link\":\"Ver Glosario\",\"link\":\"https:\\/\\/docs.google.com\\/document\\/d\\/1nXQIt-kov6a68eJOSo02k7aSYkqRZiLA\\/edit?rtpof=true\"}},{\"nombre\":\"Tematicas\",\"tipo\":\"bloques\",\"campos\":{\"modulos\":[{\"texto\":\"Reducci\\u00f3n de riesgo de desastre\",\"imagen\":\"HOUUgdMyZcl5B4PrFFWcLaYpQO0ZLAnwf1HKYTms.jpg\",\"link\":\"reduccion-de-riesgo-de-desastre\"},{\"texto\":\"Discapacidad\",\"imagen\":\"ePy4QTuKTGg6MtImQFGeIy6aLt6QiTUF7aFpaUUx.jpg\",\"link\":\"discapacidad\"},{\"texto\":\"G\\u00e9nero\",\"imagen\":\"HqUUUgZqvDvcshhAjvG8xg8xw3u5xc6lAwfOxUxp.jpg\",\"link\":\"genero\"},{\"texto\":\"Edad\",\"imagen\":\"hpKQErrxqhfNmW0JoJpzgs5lgoeYUJ4kffqkvysb.jpg\",\"link\":\"edad\"},{\"texto\":\"\\u00c9tnico\",\"imagen\":\"a1iep7RoGJocJcqsai4Xu4h0TQcIJc0OXayRYQjz.jpg\",\"link\":\"etnico\"},{\"texto\":\"Enfoque de inclusi\\u00f3n\",\"imagen\":\"NrxsGte1leLeRHeYwz2uDgPJvggwyLOt1io6alwo.jpg\",\"link\":\"enfoque-de-inclusion\"},{\"texto\":\"Acci\\u00f3n humanitaria inclusiva\",\"imagen\":\"8YApawz8pSmja3qvYwmI1DotdS4gLXr35MXwN4yP.jpg\",\"link\":\"accion-humanitaria-inclusiva\"},{\"texto\":\"Respuesta inclusiva COVID\",\"imagen\":\"0MgMek7dUn8GT1PHL2WK5LxsrsWqbJjSIAsaOZWj.jpg\",\"link\":\"respuesta-inclusiva-covid\"}],\"columnas\":\"4\",\"titulo\":\"Tematicas\",\"color\":\"negro\",\"estilo\":\"1\"}},{\"nombre\":\"Banderas\",\"tipo\":\"bloques_banderas\",\"campos\":{\"modulos\":[{\"texto\":\"Colombia\",\"imagen\":\"7Qei0M5hpPI91Sy4iymZPJl6TdynZeL835uRjC5x.png\",\"link\":null},{\"texto\":\"Peru\",\"imagen\":\"qfvnqaF7IAQeK0FZCJUNVzZXJCBdh2CwJUczvJxk.png\",\"link\":null},{\"texto\":\"Paraguay\",\"imagen\":\"RMhiLnTlMHGt9ggpItaa7WESXvD7APOvc40M7rdS.png\",\"link\":null}],\"titulo\":\"Recursos por paises\"}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-09-16 23:10:30', '2021-09-22 22:31:42'),
(6, 'Discapacidad', 'discapacidad', '[]', '[{\"nombre\":\"Discapacidad\",\"tipo\":\"titulo_texto\",\"campos\":{\"titulo\":\"Discapacidad\",\"color\":\"2\",\"estilo\":\"2\",\"pagina_anterior\":\"Recursos\"}},{\"nombre\":\"Titulo Principal\",\"tipo\":\"titulo_texto_imagen\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"titulo\":\"Esto seria una breve descripcion de la Dimension y Ambito\",\"texto\":\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque a deserunt quaerat delectus iusto reiciendis hic, ullam non fugiat perferendis quae possimus odio temporibus ducimus veritatis nobis sunt quibusdam esse commodi culpa sed, voluptatibus sint voluptas dignissimos. Ea, omnis expedita?&nbsp;<\\/p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque a deserunt quaerat delectus iusto reiciendis hic, ullam non fugiat perferendis quae possimus odio temporibus ducimus veritatis nobis sunt quibusdam esse commodi culpa sed, voluptatibus sint voluptas dignissimos. Ea, omnis expedita?&nbsp;<\\/p>\",\"imagen\":\"4R3nxc756TW7nudSbjruBmT3uHuYSBVvbbMx2AAh.jpg\",\"estilo\":\"1\"}},{\"nombre\":\"Documentos recomendados\",\"tipo\":\"bloques\",\"campos\":{\"modulos\":[{\"texto\":\"Convenci\\u00f3n sobre los Derechos de las Personas con Discapacidad.\",\"imagen\":\"ybfGEXeQXYzw1WXytZbL8PoBurVnFEdy08B9ZUA6.jpg\",\"link\":null},{\"texto\":\"OMS, 2011: Informe mundial sobre la discapacidad\",\"imagen\":\"krakKqgBBqL6FACTmn566TGROthr5HTWHgVKv020.jpg\",\"link\":null}],\"estilo\":\"2\",\"color\":\"blanco\",\"titulo\":\"Documentos recomendados\",\"columnas\":\"2\"}},{\"nombre\":\"Marco Normativo\",\"tipo\":\"titulo_texto_links\",\"campos\":{\"modulos\":[{\"texto\":\"Normas Uniformes sobre la igualdad de oportunidades para las personas con discapacidad 1994\",\"imagen\":null,\"link\":null},{\"texto\":\"Acuerdo de Marrakech 1994\",\"imagen\":null,\"link\":null},{\"texto\":\"Compendio de Legislaci\\u00f3n sobre Discapacidad, Marco Internacional, Interamericano y de Am\\u00e9rica Latina PNUD Mexico\",\"imagen\":null,\"link\":null}],\"titulo\":\"Marco normativo\",\"texto\":\"Convecciones y acuerdos internaciones de derecho personas con discapacidad\"}},{\"nombre\":null,\"tipo\":\"imagen_texto_link\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"texto\":\"<p>P\\u00e1ginas web de referencia<\\/p>\",\"texto_link\":\"Red de gesti\\u00f3n inclusiva del riesgo de desastres y discapacidad de America latina y el caribe - Red GIRDD-LAC\",\"imagen\":\"9e1CjGkVjx3OfUsZzaevUfYxa0GIIeW7UwHs2KCZ.jpg\",\"estilo\":\"2\"}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-09-21 22:23:38', '2021-09-22 22:55:34'),
(7, 'Genero', 'genero', '[]', '[{\"nombre\":\"Genero\",\"tipo\":\"titulo_texto\",\"campos\":{\"titulo\":\"Genero\",\"estilo\":\"2\",\"pagina_anterior\":\"Recursos\"}},{\"nombre\":\"Titulo Principal\",\"tipo\":\"titulo_texto_imagen\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"titulo\":\"Esto seria una breve descripcion de la Dimension y Ambito\",\"texto\":\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque a deserunt quaerat delectus iusto reiciendis hic, ullam non fugiat perferendis quae possimus odio temporibus ducimus veritatis nobis sunt quibusdam esse commodi culpa sed, voluptatibus sint voluptas dignissimos. Ea, omnis expedita?&nbsp;<\\/p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque a deserunt quaerat delectus iusto reiciendis hic, ullam non fugiat perferendis quae possimus odio temporibus ducimus veritatis nobis sunt quibusdam esse commodi culpa sed, voluptatibus sint voluptas dignissimos. Ea, omnis expedita?&nbsp;<\\/p>\",\"imagen\":\"Fxtz1Lu4JWrg6KhBzoEdcc04eRjcFtsIlnnmuHJl.jpg\",\"estilo\":\"1\"}},{\"nombre\":\"Documentos recomendados\",\"tipo\":\"bloques\",\"campos\":{\"modulos\":[{\"texto\":\"Centro de capacitacion ONU Mujeres: Glosario de igualdad de G\\u00e9nero\",\"imagen\":\"clStk7akloufT7wZsHcS2FLQIjefbnMgMCYfzHGp.jpg\",\"link\":null},{\"texto\":\"IFRC, 2015: Invisible y silenciosa: la violencia por motivos de g\\u00e9nero en situaciones de desastre\",\"imagen\":\"JBY96kHHFIYgJ7ubwLHs92GHKq0Bi0Aqqy3nPaef.jpg\",\"link\":null},{\"texto\":\"Global Study\",\"imagen\":\"yFYaU4PHwH3fSHjtXwZJMqbJZb2uxnPaUftXXS2D.jpg\",\"link\":null},{\"texto\":\"UNFPA, s\\/f : Desastres Naturales: Escenarios de violencia de G\\u00e9nero\",\"imagen\":\"yverDKVlNSR6tshejcNEOycd8KtgO07nuufa05Fc.jpg\",\"link\":null}],\"columnas\":\"2\",\"titulo\":\"Documentos recomendados\",\"color\":\"blanco\",\"estilo\":\"2\"}},{\"nombre\":\"Marco normativo\",\"tipo\":\"titulo_texto_links\",\"campos\":{\"modulos\":[{\"texto\":\"Normas Uniformes sobre la igualdad de oportunidades para las personas con discapacidad 1994\",\"imagen\":null,\"link\":null},{\"texto\":\"Acuerdo de Marrakech 1994\",\"imagen\":null,\"link\":null},{\"texto\":\"Compendio de Legislaci\\u00f3n sobre Discapacidad, Marco Internacional, Interamericano y de Am\\u00e9rica Latina PNUD Mexico\",\"imagen\":null,\"link\":null}],\"titulo\":\"Marco normativo\",\"texto\":\"Convecciones y acuerdos internaciones de derecho personas con discapacidad\"}},{\"nombre\":null,\"tipo\":\"imagen_texto_link\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"texto\":\"<p>P\\u00e1ginas web de referencia<\\/p>\",\"texto_link\":\"Red de gesti\\u00f3n inclusiva del riesgo de desastres y discapacidad de America latina y el caribe - Red GIRDD-LAC\",\"imagen\":\"4BrHc5JeSH73emj0lxaPfzdPl11j5obIiJn6ZbcP.jpg\",\"estilo\":\"2\"}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-09-22 21:10:23', '2021-09-22 22:57:54'),
(8, 'Reducción de riesgo de desastre', 'reduccion-de-riesgo-de-desastre', '[]', '[{\"nombre\":\"Reducci\\u00f3n de riesgo de desastres\",\"tipo\":\"titulo_texto\",\"campos\":{\"estilo\":\"2\",\"pagina_anterior\":\"Recursos\"}},{\"nombre\":null,\"tipo\":\"titulo_texto_imagen\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"titulo\":\"Esto seria una breve descripcion de la Dimension y Ambito\",\"texto\":\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque a deserunt quaerat delectus iusto reiciendis hic, ullam non fugiat perferendis quae possimus odio temporibus ducimus veritatis nobis sunt quibusdam esse commodi culpa sed, voluptatibus sint voluptas dignissimos. Ea, omnis expedita?&nbsp;<\\/p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque a deserunt quaerat delectus iusto reiciendis hic, ullam non fugiat perferendis quae possimus odio temporibus ducimus veritatis nobis sunt quibusdam esse commodi culpa sed, voluptatibus sint voluptas dignissimos. Ea, omnis expedita?&nbsp;<\\/p>\",\"imagen\":\"dV07cqOklU3lU29SYiYwd82qI9SfGQBwW88Pnl3z.jpg\",\"estilo\":\"1\"}},{\"nombre\":null,\"tipo\":\"bloques\",\"campos\":{\"modulos\":[{\"texto\":\"Centro de capacitacion ONU Mujeres: Glosario de igualdad de G\\u00e9nero\",\"imagen\":\"Q7Rl2BBDOHwPqiFZvkE5b99XoQGl6CYGFyQkHPwt.jpg\",\"link\":null},{\"texto\":\"Centro de capacitacion ONU Mujeres: Glosario de igualdad de G\\u00e9nero\",\"imagen\":\"6M9aijUbhzy7GaKQ6evGF9JwImZU9sRtyiNYhdOX.jpg\",\"link\":null}],\"columnas\":\"2\",\"color\":\"blanco\",\"estilo\":\"2\"}},{\"nombre\":null,\"tipo\":\"titulo_texto_links\",\"campos\":{\"modulos\":[{\"texto\":\"Normas Uniformes sobre la igualdad de oportunidades para las personas con discapacidad 1994\",\"imagen\":null,\"link\":null}],\"titulo\":\"Marco normativo\",\"texto\":\"Convecciones y acuerdos internaciones de derecho personas con discapacidad\"}},{\"nombre\":null,\"tipo\":\"imagen_texto_link\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"imagen\":\"ddcG01IIVRzFWa67RTJF4ReOKX1Fx1gcyQFN91yP.jpg\",\"estilo\":\"2\"}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-09-22 21:22:54', '2021-09-22 22:58:28'),
(9, 'Edad', 'edad', '[]', '[{\"nombre\":null,\"tipo\":\"titulo_texto\",\"campos\":{\"estilo\":\"2\",\"titulo\":\"Edad\",\"pagina_anterior\":\"Recursos\"}},{\"nombre\":null,\"tipo\":\"titulo_texto_imagen\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"imagen\":\"k2VZdJyOjzCIUGxY2DCgZb5Y1Cxw6pmVh8BRQJeT.jpg\",\"titulo\":\"Esto seria una breve descripcion de la Dimension y Ambito\",\"texto\":\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque a deserunt quaerat delectus iusto reiciendis hic, ullam non fugiat perferendis quae possimus odio temporibus ducimus veritatis nobis sunt quibusdam esse commodi culpa sed, voluptatibus sint voluptas dignissimos. Ea, omnis expedita?&nbsp;<\\/p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque a deserunt quaerat delectus iusto reiciendis hic, ullam non fugiat perferendis quae possimus odio temporibus ducimus veritatis nobis sunt quibusdam esse commodi culpa sed, voluptatibus sint voluptas dignissimos. Ea, omnis expedita?&nbsp;<\\/p>\",\"estilo\":\"1\"}},{\"nombre\":null,\"tipo\":\"bloques\",\"campos\":{\"modulos\":[{\"texto\":null,\"imagen\":\"murk98HpFBx6tfTfVcyX0ETtEskg7fAYNAmnzHrj.jpg\",\"link\":null},{\"texto\":null,\"imagen\":\"lUZfmWMI2Q6tMybvgZKrzgGcQTA9j1FBmoqvOv3r.jpg\",\"link\":null}],\"columnas\":\"2\",\"titulo\":\"Documentos recomendados\",\"color\":\"blanco\",\"estilo\":\"2\"}},{\"nombre\":null,\"tipo\":\"titulo_texto_links\",\"campos\":{\"modulos\":[{\"texto\":null,\"imagen\":null,\"link\":null}],\"titulo\":\"Marco normativo\"}},{\"nombre\":null,\"tipo\":\"imagen_texto_link\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"estilo\":\"2\",\"imagen\":\"tZRhOk8cCElShIJurchWORZGk9z14gtLI3Nhi8Hd.jpg\"}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-09-22 21:26:38', '2021-09-22 22:56:42'),
(10, 'Étnico', 'etnico', '[]', '[{\"nombre\":null,\"tipo\":\"titulo_texto\",\"campos\":{\"titulo\":\"Etnico\",\"estilo\":\"2\",\"pagina_anterior\":\"Recursos\"}},{\"nombre\":null,\"tipo\":\"titulo_texto_imagen\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"imagen\":\"g3wn4XrbFjcn3DBqb5KGIkbxPnhd3kaoZSD89I2k.jpg\",\"estilo\":\"1\"}},{\"nombre\":null,\"tipo\":\"bloques\",\"campos\":{\"modulos\":[{\"texto\":null,\"imagen\":\"jwHlwAzovKhHXy8ayynyr4GNdt878ryaNQ9l0If9.jpg\",\"link\":null},{\"texto\":null,\"imagen\":\"amSb3eDRPACwsyLZxSwnx5gPwdUnSAJtUT3CecdR.jpg\",\"link\":null}],\"color\":\"blanco\",\"estilo\":\"2\",\"columnas\":\"2\"}},{\"nombre\":null,\"tipo\":\"titulo_texto_links\",\"campos\":{\"modulos\":[{\"texto\":null,\"imagen\":null,\"link\":null}]}},{\"nombre\":null,\"tipo\":\"imagen_texto_link\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"imagen\":\"J34AxtTAXiun2Txf0ApZjJbtYcXudwp9KySCpaBV.jpg\",\"estilo\":\"2\"}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-09-22 21:31:04', '2021-09-22 22:57:29'),
(11, 'Enfoque de inclusión', 'enfoque-de-inclusion', '[]', '[{\"nombre\":null,\"tipo\":\"titulo_texto\",\"campos\":{\"estilo\":\"2\",\"titulo\":\"Enfoque de inclusion\",\"pagina_anterior\":\"Recursos\"}},{\"nombre\":null,\"tipo\":\"titulo_texto_imagen\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"estilo\":\"1\"}},{\"nombre\":null,\"tipo\":\"bloques\",\"campos\":{\"modulos\":[{\"texto\":null,\"imagen\":null,\"link\":null},{\"texto\":null,\"imagen\":null,\"link\":null}],\"columnas\":\"2\",\"color\":\"blanco\",\"estilo\":\"2\"}},{\"nombre\":null,\"tipo\":\"titulo_texto_links\",\"campos\":{\"modulos\":[{\"texto\":null,\"imagen\":null,\"link\":null},{\"texto\":null,\"imagen\":null,\"link\":null}]}},{\"nombre\":null,\"tipo\":\"imagen_texto_link\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"estilo\":\"2\"}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-09-22 21:39:52', '2021-09-22 22:56:58'),
(12, 'Acción humanitaria inclusiva', 'accion-humanitaria-inclusiva', '[]', '[{\"nombre\":null,\"tipo\":\"titulo_texto\",\"campos\":{\"titulo\":\"Acci\\u00f3n humanitaria inclusiva\",\"estilo\":\"2\",\"pagina_anterior\":\"Recursos\"}},{\"nombre\":null,\"tipo\":\"titulo_texto_imagen\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"estilo\":\"1\"}},{\"nombre\":null,\"tipo\":\"bloques\",\"campos\":{\"modulos\":[{\"texto\":null,\"imagen\":null,\"link\":null},{\"texto\":null,\"imagen\":null,\"link\":null}],\"estilo\":\"2\",\"color\":\"blanco\",\"columnas\":\"2\"}},{\"nombre\":null,\"tipo\":\"titulo_texto_links\",\"campos\":{\"modulos\":[{\"texto\":null,\"imagen\":null,\"link\":null}]}},{\"nombre\":null,\"tipo\":\"imagen_texto_link\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"estilo\":\"2\"}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-09-22 21:40:20', '2021-09-22 22:55:16'),
(13, 'Respuesta inclusiva COVID', 'respuesta-inclusiva-covid', '[]', '[{\"nombre\":null,\"tipo\":\"titulo_texto\",\"campos\":{\"titulo\":\"Respuesta inclusiva COVID\",\"estilo\":\"2\",\"pagina_anterior\":\"Recursos\"}},{\"nombre\":null,\"tipo\":\"titulo_texto_imagen\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"estilo\":\"1\"}},{\"nombre\":null,\"tipo\":\"bloques\",\"campos\":{\"modulos\":[{\"texto\":null,\"imagen\":null,\"link\":null},{\"texto\":null,\"imagen\":null,\"link\":null}],\"columnas\":\"2\",\"color\":\"blanco\",\"estilo\":\"2\"}},{\"nombre\":null,\"tipo\":\"titulo_texto_links\",\"campos\":{\"modulos\":[{\"texto\":null,\"imagen\":null,\"link\":null}]}},{\"nombre\":null,\"tipo\":\"imagen_texto_link\",\"campos\":{\"imagenes\":[{\"imagen\":null}],\"estilo\":\"2\"}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-09-22 21:40:39', '2021-09-22 22:58:38'),
(14, 'Prácticas inclusivas del riesgo de desastre', 'practicas-inclusivas-del-riesgo-de-desastre', '[]', '[{\"nombre\":null,\"tipo\":\"titulo_texto\",\"campos\":{\"estilo\":\"2\",\"titulo\":\"Pr\\u00e1cticas inclusivas del riesgo de desastre\",\"pagina_anterior\":\"Experiencias\"}},{\"nombre\":null,\"tipo\":\"titulo_texto_link\",\"campos\":{\"titulo\":\"Experiencias de actores sociales y entidades gubernamentales en Am\\u00e9rica Latina\",\"texto\":\"<p>La publicaci\\u00f3n \\u201cPr\\u00e1cticas inclusivas para la gesti\\u00f3n del riesgo de desastres\\u201d, ha sido desarrollada por Humanity &amp; Inclusion, Save the Children y COOPI, con el apoyo de USAID, en el marco del proyecto regional \\u201cGesti\\u00f3n inclusiva de riesgos de desastres: un enfoque innovador para la inclusi\\u00f3n de los grupos de mayor riesgo\\u201d. Su objetivo es ilustrar c\\u00f3mo los grupos en situaci\\u00f3n de mayor vulnerabilidad participan de las intervenciones de gesti\\u00f3n del riesgo de desastres.<\\/p><p>El documento recoge 12 experiencias de pr\\u00e1cticas inclusivas de gesti\\u00f3n del riesgo de desastres identificadas de actores sociales y entidades gubernamentales en 6 pa\\u00edses de la regi\\u00f3n latinoamericana. Por cada experiencia, se document\\u00f3 el contexto, la descripci\\u00f3n de la pr\\u00e1ctica, el impacto generado, el potencial para ser replicado, la sostenibilidad y los desaf\\u00edos para el futuro.<\\/p><p>Compartimos esta primera selecci\\u00f3n de pr\\u00e1cticas, esperando que su lectura sea inspiradora \\u00a1y estimule la difusi\\u00f3n de un enfoque inclusivo para la gesti\\u00f3n del riesgo de desastres!<\\/p>\",\"link\":null,\"texto_link\":\"Descargar 12 practicas\"}},{\"nombre\":null,\"tipo\":\"lista_imagen_titulo_texto\",\"campos\":{\"modulos\":[{\"texto\":null,\"imagen\":null,\"link\":null},{\"texto\":null,\"imagen\":null,\"link\":null},{\"texto\":null,\"imagen\":null,\"link\":null},{\"texto\":null,\"imagen\":null,\"link\":null},{\"texto\":null,\"imagen\":null,\"link\":null},{\"texto\":null,\"imagen\":null,\"link\":null},{\"texto\":null,\"imagen\":null,\"link\":null},{\"texto\":null,\"imagen\":null,\"link\":null},{\"texto\":null,\"imagen\":null,\"link\":null},{\"texto\":null,\"imagen\":null,\"link\":null},{\"texto\":null,\"imagen\":null,\"link\":null},{\"texto\":null,\"imagen\":null,\"link\":null}],\"estilo\":\"1\"}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-09-22 22:14:00', '2021-09-22 23:17:00'),
(15, 'Historia de vida', 'historia-de-vida', '[]', '[{\"nombre\":null,\"tipo\":\"titulo_texto\",\"campos\":{\"pagina_anterior\":\"Experiencias\",\"estilo\":\"1\",\"texto\":\"<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe, aliquam.&nbsp;<\\/p>\",\"titulo\":\"Historias de vida\"}},{\"nombre\":null,\"tipo\":\"filtro\",\"campos\":{\"titulo\":null,\"estilo\":\"1\",\"busqueda\":\"experiencias\"}},{\"nombre\":\"Historias de vida\",\"tipo\":\"noticias_inicio\",\"campos\":{\"estilo\":\"2\",\"categoria\":\"historia-de-vida\"}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-09-22 23:24:17', '2021-09-29 20:38:44'),
(16, 'Diagnósticos comunitarios inclusivos', 'diagnosticos-comunitarios-inclusivos', '[]', '[{\"nombre\":null,\"tipo\":\"titulo_texto\",\"campos\":{\"titulo\":\"Diagn\\u00f3sticos comunitarios inclusivos\",\"estilo\":\"2\",\"pagina_anterior\":\"Experiencias\"}},{\"nombre\":null,\"tipo\":\"filtro\",\"campos\":{\"estilo\":\"2\",\"titulo\":\"Busqueda por pais\",\"busqueda\":\"experiencias\"}},{\"nombre\":null,\"tipo\":\"noticias_inicio\",\"campos\":{\"categoria\":\"diagnosticos-comunitarios-inclusivos\",\"estilo\":\"3\"}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-09-23 18:35:30', '2021-09-29 19:44:32'),
(17, 'Evidencias covid', 'evidencias-covid', '[]', '[{\"nombre\":null,\"tipo\":\"titulo_texto\",\"campos\":{\"titulo\":\"Evidencia Covid\",\"estilo\":\"2\",\"pagina_anterior\":\"Experiencias\"}},{\"nombre\":null,\"tipo\":\"filtro\",\"campos\":{\"titulo\":null,\"estilo\":\"2\"}},{\"nombre\":null,\"tipo\":\"noticias_inicio\",\"campos\":{\"categoria\":\"evidencias-covid\",\"estilo\":\"3\"}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-09-29 16:31:18', '2021-09-29 16:34:11'),
(18, 'Actualidad', 'actualidad', '[]', '[{\"nombre\":null,\"tipo\":\"titulo_texto\",\"campos\":{\"pagina_anterior\":\"Pagina Principal\",\"estilo\":\"1\",\"texto\":\"<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe, aliquam.<\\/p>\",\"titulo\":\"Actualidad\"}},{\"nombre\":null,\"tipo\":\"filtro\",\"campos\":{\"estilo\":\"1\",\"titulo\":\"Desde aqui podras filtrar notas por paises y por fecha\",\"busqueda\":\"actualidad\"}},{\"nombre\":null,\"tipo\":\"noticias_inicio\",\"campos\":{\"categoria\":\"actualidad\",\"estilo\":\"4\"}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-09-29 16:35:15', '2021-09-29 19:28:26'),
(19, 'Eventos', 'eventos', '[]', '[{\"nombre\":null,\"tipo\":\"titulo_texto\",\"campos\":{\"pagina_anterior\":\"Pagina Principal\",\"estilo\":\"1\",\"texto\":\"<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe, aliquam.&nbsp;<\\/p>\",\"titulo\":\"Eventos\"}},{\"nombre\":null,\"tipo\":\"filtro\",\"campos\":{\"titulo\":\"Desde aqui podras filtrar eventos por paises y por fecha\",\"estilo\":\"1\",\"busqueda\":\"eventos\"}},{\"nombre\":null,\"tipo\":\"modulo_eventos\",\"campos\":{\"columnas\":2}}]', '[]', '[]', NULL, NULL, '[]', '[]', NULL, 0, '2021-09-29 18:21:16', '2021-09-29 19:29:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'mensajes-recibir', 'web', '2021-07-16 14:05:08', '2021-07-16 14:05:08'),
(2, 'admin-configuraciones', 'web', '2021-07-16 14:05:08', '2021-07-16 14:05:08'),
(3, 'admin-usuarios', 'web', '2021-07-16 14:05:08', '2021-07-16 14:05:08'),
(4, 'admin-menu', 'web', '2021-07-16 14:05:08', '2021-07-16 14:05:08'),
(5, 'gestion', 'web', '2021-07-16 14:05:08', '2021-07-16 14:05:08'),
(6, 'paginas-crearmodulos', 'web', '2021-07-16 11:25:29', '2021-07-16 11:25:29'),
(7, 'paginas-borrarmodulos', 'web', '2021-07-16 11:25:30', '2021-07-16 11:25:30'),
(8, 'paginas-dragmodulos', 'web', '2021-07-16 11:25:30', '2021-07-16 11:25:30'),
(9, 'paginas-editartitulo', 'web', '2021-07-16 11:25:30', '2021-07-16 11:25:30'),
(10, 'noticias-crear', 'web', '2021-07-16 14:37:35', '2021-07-16 14:37:35'),
(11, 'noticias-borrar', 'web', '2021-07-16 14:37:35', '2021-07-16 14:37:35'),
(12, 'noticias-editar', 'web', '2021-07-16 14:37:35', '2021-07-16 14:37:35'),
(13, 'eventos-crear', 'web', '2021-09-16 16:46:19', '2021-09-16 16:46:19'),
(14, 'eventos-borrar', 'web', '2021-09-16 16:46:20', '2021-09-16 16:46:20'),
(15, 'eventos-editar', 'web', '2021-09-16 16:46:20', '2021-09-16 16:46:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', '2021-07-16 14:05:08', '2021-07-16 14:05:08'),
(2, 'Gestor', 'web', '2021-07-16 14:05:08', '2021-07-16 14:05:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagenes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publico` tinyint(1) NOT NULL DEFAULT 1,
  `archivado` tinyint(1) NOT NULL DEFAULT 0,
  `color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id`, `nombre`, `slug`, `descripcion`, `imagenes`, `publico`, `archivado`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Actualidad', 'actualidad', NULL, NULL, 1, 0, '#000000', '2021-07-16 14:37:35', '2021-07-16 14:37:35'),
(2, 'Historia de vida', 'historia-de-vida', NULL, NULL, 1, 0, '#000000', '2021-07-16 14:37:35', '2021-07-16 14:37:35'),
(3, 'General', 'general', NULL, NULL, 1, 0, '#000000', '2021-09-23 17:04:57', '2021-09-23 17:04:57'),
(4, 'Diagnosticos comunitarios inclusivos', 'diagnosticos-comunitarios-inclusivos', NULL, NULL, 1, 0, '#000000', '2021-09-23 17:04:57', '2021-09-23 17:04:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagenes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archivado` tinyint(1) NOT NULL DEFAULT 0,
  `color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `nombre`, `slug`, `descripcion`, `imagenes`, `archivado`, `color`, `created_at`, `updated_at`) VALUES
(1, 'General', 'general', NULL, NULL, 0, '#000000', '2021-09-16 18:17:06', '2021-09-16 18:17:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `settings`, `activated`, `confirmed`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Santiago Argilla', 'sargilla@gmail.com', '$2y$10$zsy6ncNm0Qwwa45A1IH/gebY.bDcGWVCX0hs3aSmdQXEjKQIJzTfO', '\"{}\"', NULL, NULL, NULL, '2021-07-16 14:05:09', '2021-07-16 14:05:09'),
(4, 'David Zisele', 'davidzisele2016@gmail.com', '$2y$10$PsOwvS4XtqnVdio.PAaWLekAjX151kX9hUHLIgqf/CzxFsZKSBcUW', '\"{}\"', NULL, NULL, NULL, '2021-07-16 14:05:09', '2021-07-16 14:05:09'),
(5, 'Eduardo Pereyra', 'pereyraeduardo@hotmail.com', '$2y$10$xJKQGCcqoS/3sWQj.0/okObo9DT8qn0K8CSGTaoaAlhk9ZdqpfEGC', '[]', NULL, NULL, NULL, '2021-10-08 19:21:32', '2021-10-08 19:21:32');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventos_slug_publicado_marcado_index` (`slug`,`publicado`,`marcado`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noticias_slug_publicada_marcada_index` (`slug`,`publicada`,`marcada`),
  ADD KEY `noticias_orden_index` (`orden`);

--
-- Indices de la tabla `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `paginas`
--
ALTER TABLE `paginas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
