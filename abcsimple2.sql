-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2019 a las 21:09:50
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abcsimple2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abecedario`
--

CREATE TABLE `abecedario` (
  `id_abc` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ruta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `abecedario`
--

INSERT INTO `abecedario` (`id_abc`, `nombre`, `descripcion`, `activo`, `created_at`, `updated_at`, `ruta`) VALUES
(2, 'letra a', 'letra a', 1, '2018-07-13 18:24:44', '2018-07-13 18:24:44', 'Vowels.mp3'),
(3, 'letra b', 'letra b', 1, '2018-07-13 18:34:13', '2018-07-13 18:34:13', 'Vowels.mp3'),
(4, 'letra c', 'letra c', 1, '2018-07-13 18:34:41', '2018-07-13 18:34:41', 'Vowels.mp3'),
(5, 'letra d', 'letra d', 1, '2018-07-13 18:36:32', '2018-07-13 18:36:32', 'Vowels.mp3'),
(6, 'letra e', 'letra e', 1, '2018-07-14 00:04:54', '2018-07-14 00:04:54', 'Vowels.mp3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `id_alm` int(10) UNSIGNED NOT NULL,
  `id_emp` int(10) DEFAULT NULL,
  `nombre` varchar(191) DEFAULT NULL,
  `descri` varchar(191) DEFAULT NULL,
  `activo` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `campo_modificado` varchar(255) DEFAULT NULL,
  `valor_anterior` varchar(255) DEFAULT NULL,
  `valor_nuevo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_compras`
--

CREATE TABLE `carrito_compras` (
  `id_carrito` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_curso` int(10) UNSIGNED DEFAULT NULL,
  `id_paquete` int(10) UNSIGNED DEFAULT NULL,
  `id_promocion` int(10) UNSIGNED DEFAULT NULL,
  `id_estatus` int(10) UNSIGNED DEFAULT NULL,
  `precio` double(8,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carrito_compras`
--

INSERT INTO `carrito_compras` (`id_carrito`, `id_user`, `id_curso`, `id_paquete`, `id_promocion`, `id_estatus`, `precio`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, 1, 27.00, '2018-08-22 15:45:51', '2018-08-22 15:45:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `nombre_categoria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `created_at`, `updated_at`) VALUES
(1, 'CURSOS', '2018-10-09 20:56:38', '2018-10-09 20:56:38'),
(2, 'PAQUETES', '2018-10-09 20:56:38', '2018-10-09 20:56:38'),
(3, 'PROMOCIONES', '2018-10-09 20:56:59', '2018-10-09 20:56:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ref` int(10) UNSIGNED DEFAULT NULL,
  `tipo_cliente` int(10) NOT NULL DEFAULT '1',
  `documento` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `fecha_nac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `name`, `last_name`, `phone`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `ref`, `tipo_cliente`, `documento`, `fecha_nac`) VALUES
(3, 'admin', 'admin-last', '04142392030', 'abcsimple@domain.com', '$2y$10$ElAlUeMSSq/BL486.6EEj.skUQQhEw2vBJhbjO0OQ0syheIkaczau', 'TiONMMHhqMyxdIFJfFa4aU3KY2d9OU8Co3up2PerVGFd8k5zaDtjH1qeiDkP', '2018-10-01 21:29:54', '2018-10-01 21:29:54', NULL, 1, '0', NULL),
(14, 'admin', 'admin-last', '04142392030', 'abc3simple@domain.com', '$2y$10$ElAlUeMSSq/BL486.6EEj.skUQQhEw2vBJhbjO0OQ0syheIkaczau', 'lNkuIZUU72VHusaFAuV5ZnzBHXgHcvO3F3gNlKvSWkTzAgOQgUeFeg4dcj5Q', '2018-10-11 13:46:47', '2018-10-11 13:46:47', NULL, 1, '1', NULL),
(15, 'Carlos', 'Suarez', '04166954964', 'csuarezr@gmail.com', '$2y$10$BPYOZc1Cdo4Yg/ZFj4u1GuDolVu7Qg7HDELn9tBfyAAt17g0qyIu2', NULL, '2018-11-08 22:34:05', '2018-11-08 22:34:05', NULL, 1, '0', NULL),
(16, 'sadasd', 'sad', '09998887766', 'renny1@gmail.com', '$2y$10$OIQOJihWmcqo9rT8L8nVWu2.eiZL56MYx6ALTR4DJ0xyHLwr.w1jG', 'lrzY0Gra5vgl7Ut4tVtsvhi83SbuFZ851fWF7RbtVOv8xRFhwyCRSvRSShpX', '2019-02-22 22:54:12', '2019-02-22 22:54:12', NULL, 1, '0', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_password_resets`
--

CREATE TABLE `cliente_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(10) UNSIGNED NOT NULL,
  `id_persona` int(10) UNSIGNED NOT NULL,
  `total` double(8,2) NOT NULL,
  `idCompra_anulada` int(11) NOT NULL,
  `fecha_compra` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_cursos`
--

CREATE TABLE `compras_cursos` (
  `id_compra_c` int(10) UNSIGNED NOT NULL,
  `id_compra` int(10) UNSIGNED NOT NULL,
  `id_curso` int(10) UNSIGNED NOT NULL,
  `precio` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_paquetes`
--

CREATE TABLE `compras_paquetes` (
  `id_compra_pa` int(10) UNSIGNED NOT NULL,
  `id_compra` int(10) UNSIGNED NOT NULL,
  `id_paquete` int(10) UNSIGNED NOT NULL,
  `precio` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_promocion`
--

CREATE TABLE `compra_promocion` (
  `id_comp_promo` int(10) UNSIGNED NOT NULL,
  `id_compra` int(10) UNSIGNED NOT NULL,
  `id_promocion` int(10) UNSIGNED NOT NULL,
  `precio` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_promociones`
--

CREATE TABLE `compra_promociones` (
  `id_compra_promo` int(10) UNSIGNED NOT NULL,
  `id_compra` int(10) UNSIGNED NOT NULL,
  `id_promocion` int(10) UNSIGNED NOT NULL,
  `precio` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id_contenido` int(10) UNSIGNED NOT NULL,
  `id_plantilla` int(10) UNSIGNED NOT NULL,
  `id_tipo_con` int(255) UNSIGNED NOT NULL,
  `idhtml` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parrafo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id_contenido`, `id_plantilla`, `id_tipo_con`, `idhtml`, `nombre`, `tipo`, `descripcion`, `ruta`, `parrafo`, `tiempo`, `activo`, `created_at`, `updated_at`) VALUES
(9, 1, 1, '3#video', 'Bienvenido-Video', NULL, 'video de bienvenida', 'marie_calidad_media.mp4', 'no aplica', 0, 1, '2018-06-29 21:44:19', '2018-12-06 00:05:36'),
(15, 1, 2, '1#parrafo_1', 'bienvenida', NULL, 'bienvenida', '', 'esto es una prueba', 5, 1, '2018-10-10 22:30:48', '2019-02-27 00:32:03'),
(16, 1, 2, '2#parrafo_2', 'introduccion al metodo', NULL, 'introduccion', '', 'esta es la segunda prueba', 10, 1, '2018-10-10 23:15:10', '2019-02-27 00:32:54'),
(17, 1, 2, '3#parrafo_3', 'vídeo introducción', NULL, 'vídeo introducción', '', '3', 37, 1, '2018-10-10 23:38:10', '2018-10-25 23:55:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido_ejercicio`
--

CREATE TABLE `contenido_ejercicio` (
  `id_contenido` int(10) UNSIGNED NOT NULL,
  `id_ejercicio` int(10) UNSIGNED NOT NULL,
  `id_tipo_con` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parrafo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursa`
--

CREATE TABLE `cursa` (
  `id_curso` int(10) UNSIGNED NOT NULL,
  `id_persona` int(10) UNSIGNED NOT NULL,
  `id_nivel` int(10) UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NULL DEFAULT NULL,
  `fecha_final` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(10) UNSIGNED NOT NULL,
  `id_idioma` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `id_idioma`, `codigo`, `nombre`, `descripcion`, `precio`, `activo`, `ruta`, `created_at`, `updated_at`) VALUES
(1, 1, 'C1', 'Curso Inglés Básicos', 'Curso de Ingles 11 niveles', 30.00, 1, 'españa.jpg', '2018-07-19 07:02:00', '2018-10-26 22:27:28'),
(2, 1, 'C5', 'Curso Prueba Ingles español Abc Simple T', 'Curso Prueba Ingles espanol Abc Simple', 55.00, 1, NULL, '2019-01-28 22:15:06', '2019-01-28 22:15:06'),
(4, 1, 'C4', 'Curso 4', 'curso de prueba', 256.00, 1, NULL, '2019-02-22 00:41:38', '2019-02-22 00:41:38'),
(7, 1, 'C7', 'Curso 7', 'curso de prueba', 45.00, 1, NULL, '2019-02-22 00:45:17', '2019-02-22 00:45:17');

--
-- Disparadores `cursos`
--
DELIMITER $$
CREATE TRIGGER `cursos_after_insert` AFTER INSERT ON `cursos` FOR EACH ROW BEGIN

    -- Insert record into audit table
   INSERT INTO products
   ( id_curso,
     id_categoria
     )
   VALUES
   ( NEW.id_curso,
     '1'
     );

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diccionarios`
--

CREATE TABLE `diccionarios` (
  `id_diccionario` int(10) UNSIGNED NOT NULL,
  `id_idioma` int(10) UNSIGNED NOT NULL,
  `palabra` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `traduccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta_audio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta_video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `diccionarios`
--

INSERT INTO `diccionarios` (`id_diccionario`, `id_idioma`, `palabra`, `traduccion`, `ruta_img`, `ruta_audio`, `ruta_video`, `created_at`, `updated_at`) VALUES
(1, 1, 'mouse', 'raton', 'prueba', 'prueba', 'pruebas', '2018-07-10 20:13:22', '2018-07-10 20:15:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplos`
--

CREATE TABLE `ejemplos` (
  `id_ejemplo` int(10) UNSIGNED NOT NULL,
  `id_leccion` int(10) UNSIGNED NOT NULL,
  `id_tipo_ejercicio` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `id_ejercicio` int(10) UNSIGNED NOT NULL,
  `id_tipo_ejercicio` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puntaje` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`id_ejercicio`, `id_tipo_ejercicio`, `codigo`, `descripcion`, `puntaje`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, '0002', 'PRUEBA', 7, 1, '2018-08-23 22:21:16', '2018-08-23 22:21:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios_by_examen`
--

CREATE TABLE `ejercicios_by_examen` (
  `id_ejercicio_by_examen` int(10) UNSIGNED NOT NULL,
  `id_examen` int(10) UNSIGNED NOT NULL,
  `id_ejercicio` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_by_personas`
--

CREATE TABLE `evaluacion_by_personas` (
  `id_evaluacion` int(10) UNSIGNED NOT NULL,
  `id_nivel` int(10) UNSIGNED NOT NULL,
  `id_leccion` int(10) UNSIGNED NOT NULL,
  `id_examen` int(10) UNSIGNED NOT NULL,
  `id_persona` int(10) UNSIGNED NOT NULL,
  `id_ejercicio` int(10) UNSIGNED NOT NULL,
  `puntaje` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id_examen` int(10) UNSIGNED NOT NULL,
  `id_leccion` int(10) UNSIGNED NOT NULL,
  `id_tipo_examen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen_ejercicio`
--

CREATE TABLE `examen_ejercicio` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_examen` int(10) UNSIGNED NOT NULL,
  `id_ejercicio` int(10) UNSIGNED NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_promocion`
--

CREATE TABLE `fecha_promocion` (
  `id_fecha_pr` int(10) UNSIGNED NOT NULL,
  `id_promocion` int(10) UNSIGNED NOT NULL,
  `fecha_i` date NOT NULL,
  `fecha_f` date NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fecha_promocion`
--

INSERT INTO `fecha_promocion` (`id_fecha_pr`, `id_promocion`, `fecha_i`, `fecha_f`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-05-31', '2018-07-05', 0, '2018-08-23 22:47:08', '2019-02-12 00:54:24'),
(2, 2, '2018-05-31', '2018-10-31', 0, '2018-08-24 18:20:07', '2018-11-14 18:23:42'),
(3, 3, '2018-05-31', '2018-10-31', 0, '2018-11-14 18:29:48', '2018-11-14 18:29:48'),
(4, 4, '2019-02-12', '2019-02-14', 0, '2019-02-12 17:38:39', '2019-02-12 17:38:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `idfor` int(10) UNSIGNED NOT NULL,
  `id_personal` int(11) NOT NULL,
  `ubi_admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id_idioma` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id_idioma`, `nombre`, `descripcion`, `activo`, `ruta`, `created_at`, `updated_at`) VALUES
(1, 'INGLES', 'APRENDE INGLES SIMPLE', 1, 'EEUU.jpg', '2018-06-28 19:00:07', '2019-02-11 22:19:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lecciones`
--

CREATE TABLE `lecciones` (
  `id_leccion` int(10) UNSIGNED NOT NULL,
  `id_nivel` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lecciones`
--

INSERT INTO `lecciones` (`id_leccion`, `id_nivel`, `codigo`, `nombre`, `descripcion`, `activo`, `created_at`, `updated_at`) VALUES
(4, 1, 'N1-L0', 'Introduccion al Metodo', 'Introducion al metodo Nivel 1', 1, '2018-08-27 22:09:11', '2018-10-24 22:23:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2015_01_20_084450_create_roles_table', 1),
(29, '2015_01_20_084525_create_role_user_table', 1),
(30, '2015_01_24_080208_create_permissions_table', 1),
(31, '2015_01_24_080433_create_permission_role_table', 1),
(32, '2015_12_04_003040_add_special_role_column', 1),
(33, '2017_02_18_194922_update_users', 1),
(34, '2017_05_19_190822_create_table_cei_migration', 1),
(35, '2017_05_23_193042_create_table_formulario_migration', 1),
(36, '2017_10_17_170735_create_permission_user_table', 1),
(37, '2018_05_20_171526_create_table_idioma', 1),
(38, '2018_05_28_200209_create_tabla__niveles', 1),
(39, '2018_05_28_200442_create_tabla__lecciones', 1),
(40, '2018_05_31_183342_create_table_pantilla', 1),
(41, '2018_05_31_184559_create_table_contenido', 1),
(42, '2018_05_31_184632_create_table__tips', 1),
(43, '2018_05_31_184701_create_table__tips__by__plantilla', 1),
(44, '2018_06_08_201944_update_table_tips_by_plantilla', 1),
(45, '2018_06_18_175358_agregar_campo_tabla_contenido', 1),
(46, '2018_06_19_133546_eliminar_campo_unico_plantilla', 1),
(47, '2018_06_19_135514_actualizar_campo_unico_contenido', 1),
(48, '2018_06_20_023452_abc_simple', 1),
(49, '2018_06_20_171557_create_table_diccionario', 1),
(50, '2018_06_20_171642_create_table_opciones', 1),
(51, '2018_06_20_195249_add_campo_table_tips', 1),
(52, '2018_06_22_161054_actualizar_campo_ruta_tabla_tips', 1),
(53, '2018_06_22_180015_actualizar_tabla_idioma', 1),
(54, '2018_06_22_182019_agregacamponombretablaopciones', 1),
(55, '2018_06_26_153421_actualizartablaopciones', 1),
(56, '2018_06_20_171908_actualizar_foreing_key_nivel', 2),
(57, '2018_06_29_150342_add__campo_idhtml__tabla__contenido', 3),
(58, '2018_07_16_153421_actualizartablatipoplantilla', 4),
(60, '2018_07_06_145850_agregar__campo__pagina__tabla__plantilla', 5),
(61, '2018_07_18_145422_create_tabla_cursos', 6),
(62, '2018_08_05_150157_tipo_producto', 7),
(63, '2018_08_05_153844_producto', 8),
(65, '2018_08_15_151758_tipo_estatus', 9),
(66, '2018_08_16_142232_ventas', 9),
(67, '2018_08_16_172217_ventas_detalles', 10),
(68, '2018_07_24_030831_create_tipo_examen_table', 11),
(69, '2018_08_03_055540_create_promocion_table', 12),
(70, '2018_08_03_060306_create_promocion_paquete_table', 12),
(72, '2018_08_03_061307_create_compra_promocion_table', 12),
(73, '2018_08_22_152859_carrito_compras', 13),
(75, '2018_06_22_225640_create_examenes_table', 15),
(76, '2018_07_26_135921_add__campo__id_tipo_examen_tabla_examen', 16),
(77, '2018_06_20_024054_create_tipo_ejercicio_table', 17),
(78, '2018_06_22_235308_create_ejercicios_table', 17),
(79, '2018_07_16_031706_create_puntaje_examen_table', 17),
(80, '2018_07_29_193249_examen_ejercicio', 17),
(81, '2018_08_02_200233_create_compra_table', 18),
(82, '2018_08_02_200302_create_paquetes_table', 18),
(83, '2018_08_03_055540_create_promociones_table', 18),
(84, '2018_08_12_054621_create_fecha_promocion_table', 18),
(85, '2018_08_03_061101_create_promocion_curso_table', 19),
(86, '2018_09_27_152406_tipo_contenido', 20),
(87, '2018_09_27_152432_contenido_ejercicio', 20),
(88, '2018_07_07_192341_create_admins_table', 21),
(89, '2018_07_07_192342_create_admin_password_resets_table', 21),
(90, '2018_11_29_184444_create_permission_tables', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', 3),
(2, 'App\\User', 5),
(3, 'App\\User', 2),
(3, 'App\\User', 3),
(8, 'App\\User', 2),
(8, 'App\\User', 3),
(8, 'App\\User', 4),
(8, 'App\\User', 5),
(8, 'App\\User', 6),
(10, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id_nivel` int(10) UNSIGNED NOT NULL,
  `id_curso` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id_nivel`, `id_curso`, `codigo`, `nombre`, `descripcion`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, 'N1', 'NIVEL 1', 'NIVEL UNO ESP-INGLES', 1, '2018-06-28 19:48:37', '2018-10-24 22:36:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id_opcion` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_contenido` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `id_paquete` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posicion` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`id_paquete`, `codigo`, `nombre`, `descripcion`, `precio`, `activo`, `ruta`, `posicion`, `created_at`, `updated_at`) VALUES
(1, 'PAQ1', 'PAQUETE11o', 'DESCRIPCIÓN PAQUETE 1', 150.00, 1, NULL, 1, '2018-10-03 23:41:43', '2018-10-03 23:41:43'),
(3, 'PAQ123123uuuu', 'PAQUETE 123uuuu', 'EL 123uuu', 450.00, 1, NULL, 12, '2018-11-20 22:18:18', '2018-11-20 22:18:18'),
(41, 'PAQ12312349877', 'PAQUETE 1230987', 'EL 123uuu9877', 0.00, 1, NULL, 13, '2018-12-19 19:58:53', '2018-12-19 19:58:53'),
(43, 'cd5151', 'PAQUETE 123yyyyy', 'EL 123uuu', 0.00, 1, NULL, 9, '2018-12-19 19:59:53', '2018-12-19 19:59:53'),
(44, 'Paq2', 'PAQUETE 2', 'DESCRIPCION PAQUETE2', 0.00, 1, NULL, 7, '2018-12-26 13:54:23', '2018-12-26 13:54:23'),
(45, 'Paq3', 'PAQUETE 3', 'DESCRIPCION PAQUETE3', 0.00, 1, NULL, 4, '2018-12-26 13:55:07', '2018-12-26 13:55:07'),
(46, 'Paq4', 'PAQUETE 4', 'DESCRIPCION PAQUETE4', 0.00, 1, NULL, 3, '2018-12-26 13:55:38', '2018-12-26 13:55:38'),
(47, 'Paq5', 'PAQUETE 5', 'DESCRIPCION PAQUETE5', 0.00, 1, NULL, 10, '2018-12-26 13:55:55', '2018-12-26 13:55:55'),
(48, 'Paq6', 'PAQUETE 6', 'DESCRIPCION PAQUETE56', 0.00, 1, NULL, 11, '2018-12-26 13:56:18', '2018-12-26 13:56:18'),
(49, 'PAQ7', 'PAQUETE7', 'DESCRIPCION PAQUETE 7', 0.00, 1, NULL, 5, '2019-01-02 17:35:21', '2019-01-02 17:35:21'),
(50, 'PAQ8', 'PAQUETE8', 'DESCRIPCION PAQ8', 0.00, 1, NULL, 6, '2019-01-02 19:03:01', '2019-01-02 19:03:01'),
(51, 'PAQ9', 'PAQUETE9', 'DESCRIPCION PAQ9', 0.00, 1, NULL, 8, '2019-01-02 19:04:26', '2019-01-02 19:04:26'),
(54, 'PAQ10', 'PAQUETE10', 'DESCRIPCION PAQ10', 0.00, 1, NULL, 2, '2019-01-02 19:05:37', '2019-01-02 19:05:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(12, 'edit articles', 'web', '2018-11-30 17:37:04', '2018-11-30 17:37:04'),
(13, 'delete articles', 'web', '2018-11-30 17:37:04', '2018-11-30 17:37:04'),
(14, 'publish articles', 'web', '2018-11-30 17:37:04', '2018-11-30 17:37:04'),
(15, 'unpublish articles', 'web', '2018-11-30 17:37:04', '2018-11-30 17:37:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_roles`
--

CREATE TABLE `permission_roles` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `roles_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permission_roles`
--

INSERT INTO `permission_roles` (`permission_id`, `roles_id`) VALUES
(12, 10),
(13, 10),
(14, 10),
(15, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iddocumento` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantillas`
--

CREATE TABLE `plantillas` (
  `id_plantilla` int(10) UNSIGNED NOT NULL,
  `id_leccion` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `pagina` int(11) NOT NULL,
  `tipo_plantilla` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `plantillas`
--

INSERT INTO `plantillas` (`id_plantilla`, `id_leccion`, `codigo`, `nombre`, `descripcion`, `activo`, `pagina`, `tipo_plantilla`, `created_at`, `updated_at`) VALUES
(1, 4, 'N1L0P1', 'Bienvenida', 'Lamina de Bienvenida', 1, 1, 1, '2018-06-28 19:58:33', '2018-08-27 22:53:30'),
(3, 4, 'N1L0P2', 'Plantilla 2', 'Plantilla 2', 1, 2, 1, '2018-11-14 23:37:53', '2018-11-14 23:37:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `referencia` int(10) UNSIGNED NOT NULL,
  `id_t_producto` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_curso` int(10) UNSIGNED DEFAULT NULL,
  `id_promocion` int(10) UNSIGNED DEFAULT NULL,
  `id_paquete` int(10) UNSIGNED DEFAULT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `id_curso`, `id_promocion`, `id_paquete`, `id_categoria`, `imagen`, `activo`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL, 1, 'tytyr', 1, '2018-10-14 05:29:31', '2018-10-14 05:29:31'),
(3, 2, NULL, NULL, 1, 'tutyut', 1, '2018-10-14 05:29:31', '2018-10-14 05:29:31'),
(8, NULL, 4, NULL, 3, NULL, 1, '2018-10-14 06:01:06', '2018-10-14 06:01:06'),
(10, NULL, NULL, 1, 2, 'LKLKLK', 1, '2018-10-15 02:33:26', '2018-10-15 02:33:26'),
(12, NULL, NULL, 3, 2, 'KLKLK', 1, '2018-10-15 02:33:58', '2018-10-15 02:33:58'),
(16, 4, NULL, NULL, 1, NULL, 1, '2019-02-21 20:41:38', '2019-02-21 20:41:38'),
(17, 7, NULL, NULL, 1, NULL, 1, '2019-02-21 20:45:17', '2019-02-21 20:45:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id_promocion` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `gratis` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id_promocion`, `codigo`, `nombre`, `descripcion`, `precio`, `activo`, `gratis`, `created_at`, `updated_at`) VALUES
(1, 'PRUEBA', 'PRUEBA R', 'PRUEBAS', '200.00', 1, 1, '2018-08-23 22:47:08', '2019-02-23 00:47:11'),
(2, 'PRUEBA1', 'PRUEBA1', 'PRUEBA1', '4545.00', 1, 0, '2018-08-24 18:20:06', '2018-08-24 18:20:06'),
(3, 'promo-10', 'promo', 'promo prueba', '120.00', 1, 0, '2018-11-14 18:29:48', '2019-02-12 18:59:55'),
(4, 'PROMO-25', 'Promoción 25', 'Promoción para probar', '50.00', 1, 0, '2019-02-12 17:38:39', '2019-02-12 17:38:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion_curso`
--

CREATE TABLE `promocion_curso` (
  `id_pr_c` int(10) UNSIGNED NOT NULL,
  `id_promocion` int(10) UNSIGNED NOT NULL,
  `id_curso` int(10) UNSIGNED NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `promocion_curso`
--

INSERT INTO `promocion_curso` (`id_pr_c`, `id_promocion`, `id_curso`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2018-11-14 19:33:59', '2018-11-14 19:33:59'),
(2, 1, 2, 1, '2019-01-28 20:46:11', '2019-01-28 20:46:11'),
(3, 3, 1, 1, '2019-01-29 14:59:03', '2019-01-29 14:59:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion_paquete`
--

CREATE TABLE `promocion_paquete` (
  `id_pr_pa` int(10) UNSIGNED NOT NULL,
  `id_promocion` int(10) UNSIGNED NOT NULL,
  `id_paquete` int(10) UNSIGNED NOT NULL,
  `activo` int(5) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `promocion_paquete`
--

INSERT INTO `promocion_paquete` (`id_pr_pa`, `id_promocion`, `id_paquete`, `activo`, `created_at`, `updated_at`) VALUES
(4, 3, 1, 1, '2019-01-29 14:59:09', '2019-02-12 19:25:50'),
(22, 3, 41, 1, '2019-02-12 15:46:00', '2019-02-12 15:46:00'),
(46, 4, 1, 1, '2019-02-13 14:53:58', '2019-02-13 14:53:58'),
(47, 1, 1, 1, '2019-02-13 19:12:27', '2019-02-15 23:15:46'),
(48, 1, 41, 1, '2019-02-15 20:10:44', '2019-02-15 20:10:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntaje_by_examen`
--

CREATE TABLE `puntaje_by_examen` (
  `id_puntaje` int(10) UNSIGNED NOT NULL,
  `maximo` int(11) NOT NULL,
  `minimo` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntaje_examen`
--

CREATE TABLE `puntaje_examen` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_examen` int(10) UNSIGNED NOT NULL,
  `maximo` int(11) NOT NULL,
  `minimo` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'admin ', 'web', '2018-11-29 20:20:41', '2018-11-29 20:20:41'),
(3, 'usuario ', 'web', '2018-11-29 20:20:46', '2018-11-29 20:20:46'),
(8, 'writer', 'web', '2018-11-30 17:37:04', '2018-11-30 17:37:04'),
(9, 'moderator', 'web', '2018-11-30 17:37:04', '2018-11-30 17:37:04'),
(10, 'super-admin', 'web', '2018-11-30 17:37:05', '2018-11-30 17:37:05');

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
(12, 8),
(12, 10),
(13, 10),
(14, 9),
(14, 10),
(15, 9),
(15, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 10, 1, NULL, NULL),
(4, 8, 2, '2018-11-30 23:23:41', '2018-11-30 23:23:41'),
(6, 8, 4, '2018-12-03 23:13:42', '2018-12-03 23:13:42'),
(7, 8, 3, '2018-12-03 23:39:01', '2018-12-03 23:39:01'),
(8, 8, 5, '2018-12-04 22:35:07', '2018-12-04 22:35:07'),
(9, 8, 6, '2018-12-04 22:46:17', '2018-12-04 22:46:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_ejercicios`
--

CREATE TABLE `tipos_ejercicios` (
  `id_tipo_ejercicio` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cliente`
--

CREATE TABLE `tipo_cliente` (
  `id_tipo_cliente` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_cliente`
--

INSERT INTO `tipo_cliente` (`id_tipo_cliente`, `nombre`, `descripcion`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Cliente', 'Cliente web', 1, NULL, NULL),
(2, 'Empleado', 'Empleado de Empresa', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contenido`
--

CREATE TABLE `tipo_contenido` (
  `id_tipo_con` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_contenido`
--

INSERT INTO `tipo_contenido` (`id_tipo_con`, `nombre`, `descripcion`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'video', 'videos ', 1, '2018-09-27 18:09:17', '2018-09-27 18:09:17'),
(2, 'parrafo', 'texto', 1, '2018-09-27 18:10:06', '2018-09-27 18:10:06'),
(3, 'imagen', 'imagen', 1, '2018-11-14 18:19:42', '2018-11-14 18:19:42'),
(4, 'palabra', 'palabra', 1, '2018-11-14 18:20:14', '2018-11-14 18:20:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ejercicio`
--

CREATE TABLE `tipo_ejercicio` (
  `id_tipo_ejercicio` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_ejercicio`
--

INSERT INTO `tipo_ejercicio` (`id_tipo_ejercicio`, `descripcion`, `tipo`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'SELECCION', 'SELECCION', 1, '2018-08-23 22:20:54', '2018-08-23 22:20:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_estatus`
--

CREATE TABLE `tipo_estatus` (
  `id_estatus` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_estatus`
--

INSERT INTO `tipo_estatus` (`id_estatus`, `nombre`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'FACTURA', 1, '2018-08-22 13:17:46', '2018-08-22 13:17:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_examen`
--

CREATE TABLE `tipo_examen` (
  `id_tipo_examen` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_examen`
--

INSERT INTO `tipo_examen` (`id_tipo_examen`, `descripcion`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'EJEMPLO', 1, '2018-08-23 00:21:15', '2018-08-23 00:21:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_plantilla`
--

CREATE TABLE `tipo_plantilla` (
  `id_tipo` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_plantilla`
--

INSERT INTO `tipo_plantilla` (`id_tipo`, `nombre`) VALUES
(1, 'imagen-video'),
(2, 'Tips'),
(3, 'maq-video');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_productos`
--

CREATE TABLE `tipo_productos` (
  `id_t_producto` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tips`
--

CREATE TABLE `tips` (
  `id_tips` int(10) UNSIGNED NOT NULL,
  `id_leccion` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tips_by_plantilla`
--

CREATE TABLE `tips_by_plantilla` (
  `id_tipsByP` int(10) UNSIGNED NOT NULL,
  `id_` int(10) UNSIGNED NOT NULL,
  `id_plantilla` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tips_by_plantilla`
--

INSERT INTO `tips_by_plantilla` (`id_tipsByP`, `id_`, `id_plantilla`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-07-11 00:06:52', '2018-07-11 00:06:52'),
(2, 2, 1, '2018-07-13 18:49:25', '2018-07-13 18:49:25'),
(3, 3, 1, '2018-07-13 18:49:32', '2018-07-13 18:49:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombres` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `nombres`, `apellidos`, `telefono`) VALUES
(1, 'admin', 'abcsimple@domain.com', '$2y$10$kj711G/q1yG31TqboGUDrexqrjnYqEWpLzhydVJIk3IY26WOgJKUC', 'EFyHsGB2xFzd7K16SeaPWlu5By62hb8uOugzV6G6etYdoLYcAHbM8i9C6vEv', '2018-06-28 00:35:30', '2018-12-03 22:44:18', NULL, NULL, NULL),
(2, 'usuario', 'usuario@domain.com', '$2y$10$Nyy/fTKnDzvIhKv7khptie0xBO4C1nh.K1eP1w1qmi3nQmVjoS5Nm', '4EYGcMlz6y5KkNLdQk6JLPmRcUrC9Oit71zP7aUHl7xOR3Q3rCdS0Ve0PBMj', '2018-06-28 22:38:12', '2018-11-30 18:06:20', NULL, NULL, NULL),
(3, 'Carlos Suarez', 'csuarezr@gmail.com', '$2y$10$.Hxn0GvB9Q0OhPxof4VETu7tv9KpyiTVs4ZctUxZ9Xq2WcAwG0ytK', 'OdGYbdCDyPDto4Ch9ZBtk4HGMcW67yOOQNZ9GGoV5EdjtXZs46YmrQsjKOVS', '2018-11-29 19:18:35', '2018-12-05 21:56:12', NULL, NULL, NULL),
(4, 'Aristides Cortesía', 'cochejose@gmail.com', '$2y$10$HWwBUvLWtnNXx0m7G0URQOfMkYS0XRaarYhWK3TzfFbmvCBS7UewO', NULL, '2018-12-03 23:12:39', '2018-12-03 23:12:39', NULL, NULL, NULL),
(5, 'Renny Hernández', 'rennytox@gmail.com', '$2y$10$D/9CAwyjEHcDR2Zlzd.tkO4NliJMhwBC66iidVqjXdzzJP31VyHXy', NULL, '2018-12-04 22:34:55', '2018-12-04 22:34:55', NULL, NULL, NULL),
(6, 'Geraldo Marcano', 'geraldomarcano@gmail.com', '$2y$10$YltNwC8khz3toEihqvRubO//xVKUZwxwktWEwM1//w2Vgq6pt0foy', NULL, '2018-12-04 22:45:54', '2018-12-04 22:45:54', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `id_estatus` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `total` double(8,2) NOT NULL DEFAULT '0.00',
  `referencia` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `id_estatus`, `fecha`, `total`, `referencia`, `created_at`, `updated_at`) VALUES
(3, 15, 1, '0000-00-00', 0.00, 0, '2018-08-22 13:17:55', '2018-08-22 13:17:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalles`
--

CREATE TABLE `ventas_detalles` (
  `id_venta_d` int(10) UNSIGNED NOT NULL,
  `id_venta` int(10) UNSIGNED NOT NULL,
  `id_curso` int(10) UNSIGNED DEFAULT NULL,
  `id_paquete` int(10) UNSIGNED DEFAULT NULL,
  `id_promocion` int(10) UNSIGNED DEFAULT NULL,
  `precio` double(8,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ventas_detalles`
--

INSERT INTO `ventas_detalles` (`id_venta_d`, `id_venta`, `id_curso`, `id_paquete`, `id_promocion`, `precio`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, NULL, 27.00, '2018-08-22 13:17:55', '2018-08-22 13:17:55'),
(2, 3, 1, NULL, NULL, 27.00, '2018-08-22 14:57:50', '2018-08-22 14:57:50'),
(4, 3, 1, NULL, NULL, 27.00, '2018-08-22 15:01:05', '2018-08-22 15:01:05'),
(5, 3, 1, NULL, NULL, 27.00, '2018-08-22 15:03:48', '2018-08-22 15:03:48'),
(6, 3, 1, NULL, NULL, 27.00, '2018-08-22 15:04:48', '2018-08-22 15:04:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abecedario`
--
ALTER TABLE `abecedario`
  ADD PRIMARY KEY (`id_abc`) USING BTREE,
  ADD UNIQUE KEY `tips_nombre_unique` (`nombre`);

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indices de la tabla `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indices de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`id_alm`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `carrito_compras_id_estatus_foreign` (`id_estatus`),
  ADD KEY `carrito_compras_id_curso_foreign` (`id_curso`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clientes_email_unique` (`email`,`tipo_cliente`,`documento`) USING BTREE,
  ADD KEY `ref` (`ref`),
  ADD KEY `cliente` (`tipo_cliente`);

--
-- Indices de la tabla `cliente_password_resets`
--
ALTER TABLE `cliente_password_resets`
  ADD KEY `cliente_password_resets_email_index` (`email`) USING BTREE,
  ADD KEY `cliente_password_resets_token_index` (`token`) USING BTREE;

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `compras_id_persona_foreign` (`id_persona`);

--
-- Indices de la tabla `compras_cursos`
--
ALTER TABLE `compras_cursos`
  ADD PRIMARY KEY (`id_compra_c`),
  ADD UNIQUE KEY `compras_cursos_id_compra_id_curso_unique` (`id_compra`,`id_curso`),
  ADD KEY `compras_cursos_id_curso_foreign` (`id_curso`);

--
-- Indices de la tabla `compras_paquetes`
--
ALTER TABLE `compras_paquetes`
  ADD PRIMARY KEY (`id_compra_pa`),
  ADD UNIQUE KEY `compras_paquetes_id_compra_id_paquete_unique` (`id_compra`,`id_paquete`),
  ADD KEY `compras_paquetes_id_paquete_foreign` (`id_paquete`);

--
-- Indices de la tabla `compra_promocion`
--
ALTER TABLE `compra_promocion`
  ADD PRIMARY KEY (`id_comp_promo`);

--
-- Indices de la tabla `compra_promociones`
--
ALTER TABLE `compra_promociones`
  ADD PRIMARY KEY (`id_compra_promo`),
  ADD UNIQUE KEY `compra_promociones_id_compra_id_promocion_unique` (`id_compra`,`id_promocion`),
  ADD KEY `compra_promociones_id_promocion_foreign` (`id_promocion`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id_contenido`),
  ADD UNIQUE KEY `contenido_id_plantilla_nombre_unique` (`id_plantilla`,`nombre`),
  ADD UNIQUE KEY `contenido_id_plantilla_idhtml_unique` (`id_plantilla`,`idhtml`),
  ADD KEY `contenido_id_tipo_con_foreign` (`id_tipo_con`);

--
-- Indices de la tabla `contenido_ejercicio`
--
ALTER TABLE `contenido_ejercicio`
  ADD PRIMARY KEY (`id_contenido`),
  ADD KEY `contenido_ejercicio_id_ejercicio_foreign` (`id_ejercicio`),
  ADD KEY `contenido_ejercicio_id_tipo_con_foreign` (`id_tipo_con`);

--
-- Indices de la tabla `cursa`
--
ALTER TABLE `cursa`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `cursa_id_persona_foreign` (`id_persona`),
  ADD KEY `cursa_id_nivel_foreign` (`id_nivel`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`),
  ADD UNIQUE KEY `cursos_id_idioma_nombre_unique` (`id_idioma`,`nombre`),
  ADD UNIQUE KEY `cursos_codigo_unique` (`codigo`);

--
-- Indices de la tabla `diccionarios`
--
ALTER TABLE `diccionarios`
  ADD PRIMARY KEY (`id_diccionario`),
  ADD UNIQUE KEY `diccionarios_id_idioma_palabra_unique` (`id_idioma`,`palabra`);

--
-- Indices de la tabla `ejemplos`
--
ALTER TABLE `ejemplos`
  ADD PRIMARY KEY (`id_ejemplo`),
  ADD UNIQUE KEY `ejemplos_id_leccion_nombre_unique` (`id_leccion`,`nombre`),
  ADD UNIQUE KEY `ejemplos_codigo_unique` (`codigo`),
  ADD KEY `ejemplos_id_tipo_ejercicio_foreign` (`id_tipo_ejercicio`);

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`id_ejercicio`),
  ADD KEY `ejercicios_id_tipo_ejercicio_foreign` (`id_tipo_ejercicio`);

--
-- Indices de la tabla `ejercicios_by_examen`
--
ALTER TABLE `ejercicios_by_examen`
  ADD PRIMARY KEY (`id_ejercicio_by_examen`),
  ADD UNIQUE KEY `ejercicios_by_examen_id_examen_id_ejercicio_unique` (`id_examen`,`id_ejercicio`),
  ADD KEY `ejercicios_by_examen_id_ejercicio_foreign` (`id_ejercicio`);

--
-- Indices de la tabla `evaluacion_by_personas`
--
ALTER TABLE `evaluacion_by_personas`
  ADD PRIMARY KEY (`id_evaluacion`),
  ADD KEY `evaluacion_by_personas_id_persona_foreign` (`id_persona`),
  ADD KEY `evaluacion_by_personas_id_nivel_foreign` (`id_nivel`),
  ADD KEY `evaluacion_by_personas_id_leccion_foreign` (`id_leccion`),
  ADD KEY `evaluacion_by_personas_id_examen_foreign` (`id_examen`),
  ADD KEY `evaluacion_by_personas_id_ejercicio_foreign` (`id_ejercicio`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id_examen`),
  ADD KEY `examenes_id_leccion_foreign` (`id_leccion`);

--
-- Indices de la tabla `examen_ejercicio`
--
ALTER TABLE `examen_ejercicio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `examen_ejercicio_id_examen_id_ejercicio_unique` (`id_examen`,`id_ejercicio`),
  ADD KEY `examen_ejercicio_id_ejercicio_foreign` (`id_ejercicio`);

--
-- Indices de la tabla `fecha_promocion`
--
ALTER TABLE `fecha_promocion`
  ADD PRIMARY KEY (`id_fecha_pr`),
  ADD KEY `fecha_promocion_id_promocion_foreign` (`id_promocion`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`idfor`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id_idioma`),
  ADD UNIQUE KEY `idiomas_nombre_unique` (`nombre`);

--
-- Indices de la tabla `lecciones`
--
ALTER TABLE `lecciones`
  ADD PRIMARY KEY (`id_leccion`),
  ADD UNIQUE KEY `lecciones_id_nivel_nombre_unique` (`id_nivel`,`nombre`),
  ADD UNIQUE KEY `lecciones_codigo_unique` (`codigo`);

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
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id_nivel`),
  ADD UNIQUE KEY `niveles_codigo_unique` (`codigo`),
  ADD UNIQUE KEY `niveles_id_curso_nombre_unique` (`id_curso`,`nombre`) USING BTREE;

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id_opcion`),
  ADD UNIQUE KEY `opciones_id_contenido_nombre_unique` (`id_contenido`,`nombre`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id_paquete`),
  ADD UNIQUE KEY `paquetes_codigo_unique` (`codigo`),
  ADD UNIQUE KEY `paquetes_nombre_unique` (`nombre`),
  ADD UNIQUE KEY `posicion` (`posicion`);

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
-- Indices de la tabla `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD PRIMARY KEY (`permission_id`,`roles_id`) USING BTREE,
  ADD KEY `role_has_permissions_role_id_foreign` (`roles_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD UNIQUE KEY `personas_iddocumento_unique` (`iddocumento`);

--
-- Indices de la tabla `plantillas`
--
ALTER TABLE `plantillas`
  ADD PRIMARY KEY (`id_plantilla`),
  ADD UNIQUE KEY `plantillas_id_leccion_nombre_unique` (`id_leccion`,`nombre`),
  ADD UNIQUE KEY `plantillas_codigo_unique` (`codigo`) USING BTREE,
  ADD UNIQUE KEY `plantillas_id_leccion_pagina_tipo_plantilla_unique` (`id_leccion`,`pagina`,`tipo_plantilla`),
  ADD KEY `plantillas_tipo_plantilla_foreign` (`tipo_plantilla`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `productos_nombre_unique` (`nombre`),
  ADD KEY `productos_referencia_foreign` (`referencia`),
  ADD KEY `productos_id_t_producto_foreign` (`id_t_producto`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_curso_foreign` (`id_curso`),
  ADD KEY `products_id_promocion_foreign` (`id_promocion`),
  ADD KEY `products_id_paquete_foreign` (`id_paquete`),
  ADD KEY `products_id_categoria_foreign` (`id_categoria`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id_promocion`);

--
-- Indices de la tabla `promocion_curso`
--
ALTER TABLE `promocion_curso`
  ADD PRIMARY KEY (`id_pr_c`),
  ADD UNIQUE KEY `promocion_curso_id_promocion_id_curso_unique` (`id_promocion`,`id_curso`),
  ADD KEY `promocion_curso_id_curso_foreign` (`id_curso`);

--
-- Indices de la tabla `promocion_paquete`
--
ALTER TABLE `promocion_paquete`
  ADD PRIMARY KEY (`id_pr_pa`);

--
-- Indices de la tabla `puntaje_by_examen`
--
ALTER TABLE `puntaje_by_examen`
  ADD PRIMARY KEY (`id_puntaje`);

--
-- Indices de la tabla `puntaje_examen`
--
ALTER TABLE `puntaje_examen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `puntaje_examen_id_examen_foreign` (`id_examen`);

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
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `tipos_ejercicios`
--
ALTER TABLE `tipos_ejercicios`
  ADD PRIMARY KEY (`id_tipo_ejercicio`);

--
-- Indices de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
  ADD PRIMARY KEY (`id_tipo_cliente`);

--
-- Indices de la tabla `tipo_contenido`
--
ALTER TABLE `tipo_contenido`
  ADD PRIMARY KEY (`id_tipo_con`);

--
-- Indices de la tabla `tipo_ejercicio`
--
ALTER TABLE `tipo_ejercicio`
  ADD PRIMARY KEY (`id_tipo_ejercicio`);

--
-- Indices de la tabla `tipo_estatus`
--
ALTER TABLE `tipo_estatus`
  ADD PRIMARY KEY (`id_estatus`),
  ADD UNIQUE KEY `tipo_estatus_nombre_unique` (`nombre`);

--
-- Indices de la tabla `tipo_examen`
--
ALTER TABLE `tipo_examen`
  ADD PRIMARY KEY (`id_tipo_examen`);

--
-- Indices de la tabla `tipo_plantilla`
--
ALTER TABLE `tipo_plantilla`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `tipo_productos`
--
ALTER TABLE `tipo_productos`
  ADD PRIMARY KEY (`id_t_producto`),
  ADD UNIQUE KEY `tipo_productos_nombre_unique` (`nombre`);

--
-- Indices de la tabla `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id_tips`) USING BTREE,
  ADD UNIQUE KEY `plantillas_id_leccion_nombre_unique` (`id_leccion`,`nombre`),
  ADD UNIQUE KEY `plantillas_codigo_unique` (`codigo`);

--
-- Indices de la tabla `tips_by_plantilla`
--
ALTER TABLE `tips_by_plantilla`
  ADD PRIMARY KEY (`id_tipsByP`),
  ADD UNIQUE KEY `tips_by_plantilla_id_tips_id_plantilla_unique` (`id_`,`id_plantilla`),
  ADD KEY `tips_by_plantilla_id_plantilla_foreign` (`id_plantilla`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `ventas_id_cliente_foreing` (`id_cliente`),
  ADD KEY `ventas_id_estatus_foreing` (`id_estatus`);

--
-- Indices de la tabla `ventas_detalles`
--
ALTER TABLE `ventas_detalles`
  ADD PRIMARY KEY (`id_venta_d`),
  ADD KEY `ventas_detalles_id_venta_foreign` (`id_venta`),
  ADD KEY `ventas_detalles_id_curso_foreign` (`id_curso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abecedario`
--
ALTER TABLE `abecedario`
  MODIFY `id_abc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  MODIFY `id_alm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  MODIFY `id_carrito` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compras_cursos`
--
ALTER TABLE `compras_cursos`
  MODIFY `id_compra_c` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compras_paquetes`
--
ALTER TABLE `compras_paquetes`
  MODIFY `id_compra_pa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra_promocion`
--
ALTER TABLE `compra_promocion`
  MODIFY `id_comp_promo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra_promociones`
--
ALTER TABLE `compra_promociones`
  MODIFY `id_compra_promo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id_contenido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `contenido_ejercicio`
--
ALTER TABLE `contenido_ejercicio`
  MODIFY `id_contenido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursa`
--
ALTER TABLE `cursa`
  MODIFY `id_curso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `diccionarios`
--
ALTER TABLE `diccionarios`
  MODIFY `id_diccionario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ejemplos`
--
ALTER TABLE `ejemplos`
  MODIFY `id_ejemplo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `id_ejercicio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ejercicios_by_examen`
--
ALTER TABLE `ejercicios_by_examen`
  MODIFY `id_ejercicio_by_examen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evaluacion_by_personas`
--
ALTER TABLE `evaluacion_by_personas`
  MODIFY `id_evaluacion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id_examen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `examen_ejercicio`
--
ALTER TABLE `examen_ejercicio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fecha_promocion`
--
ALTER TABLE `fecha_promocion`
  MODIFY `id_fecha_pr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `idfor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id_idioma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lecciones`
--
ALTER TABLE `lecciones`
  MODIFY `id_leccion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id_nivel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id_opcion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id_paquete` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plantillas`
--
ALTER TABLE `plantillas`
  MODIFY `id_plantilla` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id_promocion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `promocion_curso`
--
ALTER TABLE `promocion_curso`
  MODIFY `id_pr_c` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `promocion_paquete`
--
ALTER TABLE `promocion_paquete`
  MODIFY `id_pr_pa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `puntaje_by_examen`
--
ALTER TABLE `puntaje_by_examen`
  MODIFY `id_puntaje` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puntaje_examen`
--
ALTER TABLE `puntaje_examen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipos_ejercicios`
--
ALTER TABLE `tipos_ejercicios`
  MODIFY `id_tipo_ejercicio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
  MODIFY `id_tipo_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_contenido`
--
ALTER TABLE `tipo_contenido`
  MODIFY `id_tipo_con` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_ejercicio`
--
ALTER TABLE `tipo_ejercicio`
  MODIFY `id_tipo_ejercicio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_estatus`
--
ALTER TABLE `tipo_estatus`
  MODIFY `id_estatus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_examen`
--
ALTER TABLE `tipo_examen`
  MODIFY `id_tipo_examen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_plantilla`
--
ALTER TABLE `tipo_plantilla`
  MODIFY `id_tipo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_productos`
--
ALTER TABLE `tipo_productos`
  MODIFY `id_t_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tips`
--
ALTER TABLE `tips`
  MODIFY `id_tips` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tips_by_plantilla`
--
ALTER TABLE `tips_by_plantilla`
  MODIFY `id_tipsByP` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas_detalles`
--
ALTER TABLE `ventas_detalles`
  MODIFY `id_venta_d` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD CONSTRAINT `carrito_compras_id_curso_foreign` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_compras_id_estatus_foreign` FOREIGN KEY (`id_estatus`) REFERENCES `tipo_estatus` (`id_estatus`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `cliente` FOREIGN KEY (`tipo_cliente`) REFERENCES `tipo_cliente` (`id_tipo_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_ref_forein` FOREIGN KEY (`ref`) REFERENCES `clientes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_id_persona_foreign` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras_cursos`
--
ALTER TABLE `compras_cursos`
  ADD CONSTRAINT `compras_cursos_id_compra_foreign` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_cursos_id_curso_foreign` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras_paquetes`
--
ALTER TABLE `compras_paquetes`
  ADD CONSTRAINT `compras_paquetes_id_compra_foreign` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_paquetes_id_paquete_foreign` FOREIGN KEY (`id_paquete`) REFERENCES `paquetes` (`id_paquete`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra_promociones`
--
ALTER TABLE `compra_promociones`
  ADD CONSTRAINT `compra_promociones_id_compra_foreign` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_promociones_id_promocion_foreign` FOREIGN KEY (`id_promocion`) REFERENCES `promociones` (`id_promocion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `contenido_id_plantilla_foreign` FOREIGN KEY (`id_plantilla`) REFERENCES `plantillas` (`id_plantilla`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contenido_id_tipo_con_foreign` FOREIGN KEY (`id_tipo_con`) REFERENCES `tipo_contenido` (`id_tipo_con`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `contenido_ejercicio`
--
ALTER TABLE `contenido_ejercicio`
  ADD CONSTRAINT `contenido_ejercicio_id_ejercicio_foreign` FOREIGN KEY (`id_ejercicio`) REFERENCES `ejercicios` (`id_ejercicio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contenido_ejercicio_id_tipo_con_foreign` FOREIGN KEY (`id_tipo_con`) REFERENCES `tipo_contenido` (`id_tipo_con`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursa`
--
ALTER TABLE `cursa`
  ADD CONSTRAINT `cursa_id_nivel_foreign` FOREIGN KEY (`id_nivel`) REFERENCES `niveles` (`id_nivel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cursa_id_persona_foreign` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_id_idioma_foreign` FOREIGN KEY (`id_idioma`) REFERENCES `idiomas` (`id_idioma`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `diccionarios`
--
ALTER TABLE `diccionarios`
  ADD CONSTRAINT `diccionarios_id_idioma_foreign` FOREIGN KEY (`id_idioma`) REFERENCES `idiomas` (`id_idioma`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ejemplos`
--
ALTER TABLE `ejemplos`
  ADD CONSTRAINT `ejemplos_id_tipo_ejercicio_foreign` FOREIGN KEY (`id_tipo_ejercicio`) REFERENCES `tipos_ejercicios` (`id_tipo_ejercicio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD CONSTRAINT `ejercicios_id_tipo_ejercicio_foreign` FOREIGN KEY (`id_tipo_ejercicio`) REFERENCES `tipo_ejercicio` (`id_tipo_ejercicio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ejercicios_by_examen`
--
ALTER TABLE `ejercicios_by_examen`
  ADD CONSTRAINT `ejercicios_by_examen_id_ejercicio_foreign` FOREIGN KEY (`id_ejercicio`) REFERENCES `ejercicios` (`id_ejercicio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ejercicios_by_examen_id_examen_foreign` FOREIGN KEY (`id_examen`) REFERENCES `examenes` (`id_examen`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluacion_by_personas`
--
ALTER TABLE `evaluacion_by_personas`
  ADD CONSTRAINT `evaluacion_by_personas_id_ejercicio_foreign` FOREIGN KEY (`id_ejercicio`) REFERENCES `ejercicios` (`id_ejercicio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluacion_by_personas_id_examen_foreign` FOREIGN KEY (`id_examen`) REFERENCES `examenes` (`id_examen`) ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluacion_by_personas_id_leccion_foreign` FOREIGN KEY (`id_leccion`) REFERENCES `lecciones` (`id_leccion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluacion_by_personas_id_nivel_foreign` FOREIGN KEY (`id_nivel`) REFERENCES `niveles` (`id_nivel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluacion_by_personas_id_persona_foreign` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD CONSTRAINT `examenes_id_leccion_foreign` FOREIGN KEY (`id_leccion`) REFERENCES `lecciones` (`id_leccion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `examen_ejercicio`
--
ALTER TABLE `examen_ejercicio`
  ADD CONSTRAINT `examen_ejercicio_id_ejercicio_foreign` FOREIGN KEY (`id_ejercicio`) REFERENCES `ejercicios` (`id_ejercicio`),
  ADD CONSTRAINT `examen_ejercicio_id_examen_foreign` FOREIGN KEY (`id_examen`) REFERENCES `examenes` (`id_examen`);

--
-- Filtros para la tabla `fecha_promocion`
--
ALTER TABLE `fecha_promocion`
  ADD CONSTRAINT `fecha_promocion_id_promocion_foreign` FOREIGN KEY (`id_promocion`) REFERENCES `promociones` (`id_promocion`);

--
-- Filtros para la tabla `lecciones`
--
ALTER TABLE `lecciones`
  ADD CONSTRAINT `lecciones_id_nivel_foreign` FOREIGN KEY (`id_nivel`) REFERENCES `niveles` (`id_nivel`) ON UPDATE CASCADE;

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
-- Filtros para la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD CONSTRAINT `nivel_id_curso_forein` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `opciones_id_contenido_foreign` FOREIGN KEY (`id_contenido`) REFERENCES `contenido` (`id_contenido`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD CONSTRAINT `permission_roles_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_roles_ibfk_2` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `plantillas`
--
ALTER TABLE `plantillas`
  ADD CONSTRAINT `plantillas_id_leccion_foreign` FOREIGN KEY (`id_leccion`) REFERENCES `lecciones` (`id_leccion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `plantillas_tipo_plantilla_foreign` FOREIGN KEY (`tipo_plantilla`) REFERENCES `tipo_plantilla` (`id_tipo`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_id_t_producto_foreign` FOREIGN KEY (`id_t_producto`) REFERENCES `tipo_productos` (`id_t_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_referencia_foreign` FOREIGN KEY (`referencia`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_id_curso_foreign` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_id_paquete_foreign` FOREIGN KEY (`id_paquete`) REFERENCES `paquetes` (`id_paquete`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `promocion_curso`
--
ALTER TABLE `promocion_curso`
  ADD CONSTRAINT `Promocion_curso_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `Promocion_curso_ibfk_2` FOREIGN KEY (`id_promocion`) REFERENCES `promociones` (`id_promocion`);

--
-- Filtros para la tabla `puntaje_examen`
--
ALTER TABLE `puntaje_examen`
  ADD CONSTRAINT `puntaje_examen_id_examen_foreign` FOREIGN KEY (`id_examen`) REFERENCES `examenes` (`id_examen`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tips`
--
ALTER TABLE `tips`
  ADD CONSTRAINT `Tips_ibfk_1` FOREIGN KEY (`id_leccion`) REFERENCES `lecciones` (`id_leccion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tips_by_plantilla`
--
ALTER TABLE `tips_by_plantilla`
  ADD CONSTRAINT `tips_by_plantilla_id_plantilla_foreign` FOREIGN KEY (`id_plantilla`) REFERENCES `plantillas` (`id_plantilla`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_id_cliente_foreing` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_id_estatus_foreing` FOREIGN KEY (`id_estatus`) REFERENCES `tipo_estatus` (`id_estatus`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas_detalles`
--
ALTER TABLE `ventas_detalles`
  ADD CONSTRAINT `ventas_detalles_id_curso_foreign` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_detalles_id_venta_foreign` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
