-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2021 a las 16:26:03
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cmr_comercialización`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actualizaciones`
--

CREATE TABLE `actualizaciones` (
  `idactualizaciones` int(11) NOT NULL,
  `idcompras` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `version` varchar(100) DEFAULT NULL,
  `tiempo_licencia` int(11) DEFAULT NULL,
  `cantidad_licencia` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `acta` double DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `fecha_instalacion` timestamp NULL DEFAULT NULL,
  `fecha_entrega` timestamp NULL DEFAULT NULL,
  `fecha_fin` timestamp NULL DEFAULT NULL,
  `procedimiento` text DEFAULT NULL,
  `estado` char(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actualizaciones`
--

INSERT INTO `actualizaciones` (`idactualizaciones`, `idcompras`, `tipo`, `version`, `tiempo_licencia`, `cantidad_licencia`, `precio`, `acta`, `saldo`, `fecha_instalacion`, `fecha_entrega`, `fecha_fin`, `procedimiento`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 'Contrato', '2.0.5', 1, 5, 500, 2, 100.25, '2021-02-10 17:04:42', '2021-02-09 17:04:42', '2021-02-28 17:05:41', 'De ley', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idclientes` int(11) NOT NULL,
  `idgiro_negocio` int(11) NOT NULL,
  `tipo_documento` char(1) NOT NULL COMMENT '1 = DNI\n2 = RUC',
  `nro_documento` varchar(11) DEFAULT NULL,
  `nombres_razon_social` varchar(120) DEFAULT NULL,
  `apellidos_nombre_comercial` varchar(120) DEFAULT NULL,
  `correo_1` varchar(45) DEFAULT NULL,
  `correo_2` varchar(45) DEFAULT NULL,
  `correo_3` varchar(45) DEFAULT NULL,
  `telefono_empresa` varchar(45) DEFAULT NULL,
  `telefono_contacto` varchar(45) DEFAULT NULL,
  `telefono_otro` varchar(45) DEFAULT NULL,
  `tipo_persona` char(1) DEFAULT NULL COMMENT '1 = INTERESADO\n2 = CLIENTE',
  `estado` char(1) NOT NULL DEFAULT '0' COMMENT '0 =  activo\n1 = inactivo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idclientes`, `idgiro_negocio`, `tipo_documento`, `nro_documento`, `nombres_razon_social`, `apellidos_nombre_comercial`, `correo_1`, `correo_2`, `correo_3`, `telefono_empresa`, `telefono_contacto`, `telefono_otro`, `tipo_persona`, `estado`, `created_at`, `updated_at`) VALUES
(1, 2, '6', '76429291', 'VperEr', 'Vper.SAC', 'erick@gmail.com', 'erick@gmail.com', 'erick@gmail.com', '923666378', '923666378', '923666378', '2', '0', NULL, '2021-02-11 22:01:25'),
(2, 1, '3', '76429291', 'Erick Daniel', 'Zumaeta', 'erick@gmail.com', 'daniel@gmail.com', 'zumaeta@gmail.com', '923666379', '923666379', '923666379', '1', '0', '2021-02-09 19:21:58', '2021-02-11 22:00:32'),
(3, 1, '3', '76429291', 'Prueba', 'Acordeon', 'VperEr@gmail.com', 'daniel@gmail.com', 'zumaeta@gmail.com', '923666379', '923666379', '923666379', '1', '0', '2021-02-09 20:55:58', '2021-02-11 22:30:12'),
(4, 1, '3', '76429291', 'Erick Daniel', 'Zumaeta', 'erick@gmail.com', 'daniel@gmail.com', 'zumaeta@gmail.com', '923666379', '923666379', '923666379', '2', '0', '2021-02-11 21:58:46', '2021-02-11 22:01:18'),
(5, 1, '3', '76429291', 'Erick Daniel', 'Zumaeta', 'erick@gmail.com', 'daniel@gmail.com', 'zumaeta@gmail.com', '923666379', '923666379', '923666379', '2', '0', '2021-02-11 21:59:12', '2021-02-11 21:59:12'),
(6, 2, '3', '76429291', 'Erick Daniel', 'Zumaeta', 'erick@gmail.com', 'daniel@gmail.com', NULL, '923666379', '923666379', NULL, '1', '0', '2021-02-12 19:15:53', '2021-02-12 20:00:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercializacion`
--

CREATE TABLE `comercializacion` (
  `idcomercializacion` int(11) NOT NULL,
  `idclientes` int(11) NOT NULL,
  `persona_contacto` varchar(150) DEFAULT NULL,
  `actividad` text DEFAULT NULL,
  `idmedios` int(11) NOT NULL,
  `idusers` int(11) NOT NULL,
  `detalla_llamada` text DEFAULT NULL,
  `ideventos` int(11) NOT NULL,
  `fecha_evento` date DEFAULT NULL,
  `descripcion_evento` text DEFAULT NULL,
  `idpersonal` int(11) NOT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `avance` varchar(500) DEFAULT NULL,
  `por_cobrar` double DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `estado` char(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comercializacion`
--

INSERT INTO `comercializacion` (`idcomercializacion`, `idclientes`, `persona_contacto`, `actividad`, `idmedios`, `idusers`, `detalla_llamada`, `ideventos`, `fecha_evento`, `descripcion_evento`, `idpersonal`, `calificacion`, `avance`, `por_cobrar`, `observacion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ratatatata', 'Ilicitas', 3, 2, 'Detalle llamada', 2, '2021-02-09', 'Descripción evento', 6, 1, 'Avance', 150, 'xD', '0', NULL, '2021-02-10 22:48:14'),
(2, 3, 'Samir Zumaeta', 'Venta de drones', 2, 1, 'Detalle', 1, '2021-02-09', 'evntos gaaaaaa', 6, 4, 'Estaas por acabar esto', 200.5, 'Ninguna observacion', '1', NULL, '2021-02-10 21:45:28'),
(3, 1, 'Erick', 'Venta', 1, 1, NULL, 1, '2018-11-23', 'Det', 6, 1, 'avance', 500, 'ningunna', '0', '2021-02-10 20:42:43', '2021-02-10 20:42:43'),
(4, 1, 'Daniel', 'Compra', 1, 1, NULL, 1, '2018-11-23', 'Det', 6, 1, 'avance', 500, 'Ninguna', '0', '2021-02-10 20:51:07', '2021-02-10 20:51:07'),
(5, 3, 'Prueba', 'awddwa', 1, 2, 'Ratatatata', 2, '2021-02-10', 'Det', 6, 2, 'avance', 500, NULL, '1', '2021-02-10 21:41:54', '2021-02-10 21:45:32'),
(6, 2, 'Erick', 'Venta de pitufinas', 1, 2, 'detalle llamada', 1, '2021-02-10', 'Det', 6, 2, 'avance', 500, 'gaaaaaaaaaaaaaaaaaaaaaaaaa', '0', '2021-02-10 23:14:06', '2021-02-10 23:14:47'),
(7, 2, 'Erick', 'Venta de pitufinas', 1, 2, NULL, 1, '2021-02-11', 'Det', 9, 1, 'avance', 500, 'Sin conclusiones', '1', '2021-02-11 22:13:10', '2021-02-11 22:13:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idcompras` int(11) NOT NULL,
  `idclientes` int(11) NOT NULL,
  `idcotizaciones` int(11) NOT NULL,
  `fecha_cotizacion` timestamp NULL DEFAULT NULL,
  `contrato_cotizacion` varchar(100) DEFAULT NULL,
  `factura` varchar(12) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_instalacion` timestamp NULL DEFAULT NULL,
  `fecha_entrega` timestamp NULL DEFAULT NULL,
  `fecha_renovacion` timestamp NULL DEFAULT NULL,
  `licencia` varchar(450) DEFAULT NULL,
  `dias_sobrantes` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`idcompras`, `idclientes`, `idcotizaciones`, `fecha_cotizacion`, `contrato_cotizacion`, `factura`, `cantidad`, `fecha_instalacion`, `fecha_entrega`, `fecha_renovacion`, `licencia`, `dias_sobrantes`, `estado`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2021-02-09 17:04:42', 'COntrato', '1234857', 1, '2021-02-10 17:04:42', '2021-02-09 17:04:42', '2021-02-28 17:04:42', 'AadaDKKMAD46AWDda64w', 5, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_modulos`
--

CREATE TABLE `compra_modulos` (
  `idcompra_modulos` int(11) NOT NULL,
  `idcompras` int(11) NOT NULL,
  `idmodulos` int(11) NOT NULL,
  `estado` char(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `idcotizaciones` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `ruta` varchar(500) NOT NULL,
  `estado` char(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`idcotizaciones`, `nombre`, `ruta`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'CEARTEC123', 'LOL', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_comercializacion`
--

CREATE TABLE `cotizacion_comercializacion` (
  `idcotizacion_comercializacion` int(11) NOT NULL,
  `idcomercializacion` int(11) NOT NULL,
  `idcotizaciones` int(11) NOT NULL,
  `estado` char(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `ideventos` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descrripcion` text DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '0' COMMENT '0 =  activo\n1 = inactivo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`ideventos`, `nombre`, `descrripcion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Ventas', 'Venta de productos', '0', '2021-02-04 19:52:42', '2021-02-04 20:03:49'),
(2, 'Compra', 'Compra de productos', '0', '2021-02-04 20:43:09', '2021-02-04 20:43:09'),
(3, 'Reventa', 'Revendedores de prodctos', '0', '2021-02-10 23:18:42', '2021-02-10 23:18:42'),
(4, 'Distribuidor', 'Distribuidora de productos', '0', '2021-02-11 22:23:26', '2021-02-11 22:23:26'),
(5, 'Proveedor', 'Proveedor de productos', '0', '2021-02-11 22:25:44', '2021-02-11 22:25:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giro_negocio`
--

CREATE TABLE `giro_negocio` (
  `idgiro_negocio` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `giro_negocio`
--

INSERT INTO `giro_negocio` (`idgiro_negocio`, `nombre`) VALUES
(1, 'Venta'),
(2, 'Compras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios`
--

CREATE TABLE `medios` (
  `idmedios` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '0' COMMENT '0 =  activo\n1 = inactivo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medios`
--

INSERT INTO `medios` (`idmedios`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Telefono', '1', NULL, '2021-02-05 19:30:20'),
(2, 'Personal', '0', '2021-02-04 21:05:22', '2021-02-04 21:05:22'),
(3, 'Correo', '0', '2021-02-04 21:06:12', '2021-02-04 21:06:12'),
(4, 'prueba', '0', '2021-02-04 21:07:38', '2021-02-04 21:07:38'),
(5, 'Agregado', '0', '2021-02-05 19:30:28', '2021-02-05 19:30:28'),
(6, 'Fax', '0', '2021-02-11 22:26:08', '2021-02-11 22:26:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `idmodulos` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '0' COMMENT '0 =  activo\n1 = inactivo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`idmodulos`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(2, 'CeaFinanzas', '0', '2021-02-05 21:04:19', '2021-02-05 21:21:36'),
(7, 'CeaConta', '0', '2021-02-05 21:55:55', '2021-02-05 21:55:55'),
(8, 'CeaEmpresas', '0', '2021-02-05 21:56:08', '2021-02-08 22:45:51'),
(9, 'CeaErick', '0', '2021-02-06 21:53:07', '2021-02-06 21:53:07'),
(10, 'CeaMarket', '0', '2021-02-08 22:46:04', '2021-02-08 22:46:13'),
(11, 'CeaModulos', '0', '2021-02-09 19:26:12', '2021-02-09 19:26:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo_comercializacion`
--

CREATE TABLE `modulo_comercializacion` (
  `idmodulo_comercializacion` int(11) NOT NULL,
  `idmodulos` int(11) NOT NULL,
  `idcomercializacion` int(11) NOT NULL,
  `estado` char(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `idpersonal` int(11) NOT NULL,
  `nombres` varchar(120) DEFAULT NULL,
  `apellidos` varchar(120) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '0' COMMENT '0 =  activo\n1 = inactivo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`idpersonal`, `nombres`, `apellidos`, `estado`, `created_at`, `updated_at`) VALUES
(6, 'Vper', 'Steam', '0', '2021-02-05 20:21:58', '2021-02-05 20:27:45'),
(7, 'Erick', 'Zumaeta', '0', '2021-02-10 23:16:40', '2021-02-10 23:16:40'),
(8, 'Samir', 'Zumaeta', '0', '2021-02-10 23:16:47', '2021-02-10 23:16:47'),
(9, 'Zujey', 'Zumaeta', '0', '2021-02-10 23:16:56', '2021-02-10 23:16:56'),
(10, 'Marisol', 'Diaz', '0', '2021-02-11 22:26:45', '2021-02-11 22:26:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamos`
--

CREATE TABLE `reclamos` (
  `idreclamos` int(11) NOT NULL,
  `idclientes` int(11) NOT NULL,
  `persona_contacto` varchar(450) DEFAULT NULL,
  `Ruc_nro_contrato` varchar(100) DEFAULT NULL,
  `idmedios` int(11) NOT NULL,
  `idmodulos` int(11) NOT NULL,
  `descripcion_reclamo` text DEFAULT NULL,
  `tipo_solucion` varchar(250) DEFAULT NULL,
  `causa` varchar(250) DEFAULT NULL,
  `procede` char(1) DEFAULT NULL,
  `accion_tomar` text DEFAULT NULL,
  `idpersonal` int(11) NOT NULL,
  `fecha_compromiso` date DEFAULT NULL,
  `fecha_solucion` date DEFAULT NULL,
  `solucion_minutos` int(11) DEFAULT NULL,
  `solucion_dias` double DEFAULT NULL,
  `evidencia` text DEFAULT NULL,
  `emite_accion` varchar(100) DEFAULT NULL,
  `estado` char(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reclamos`
--

INSERT INTO `reclamos` (`idreclamos`, `idclientes`, `persona_contacto`, `Ruc_nro_contrato`, `idmedios`, `idmodulos`, `descripcion_reclamo`, `tipo_solucion`, `causa`, `procede`, `accion_tomar`, `idpersonal`, `fecha_compromiso`, `fecha_solucion`, `solucion_minutos`, `solucion_dias`, `evidencia`, `emite_accion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 'Erick', '10764292915', 1, 7, 'SOS', 'Mandar Avion)', 'Se lamogro el avion xD', NULL, 'Sobrevivir', 6, '2021-02-11', '2021-02-11', 25, 60, 'Internet', 'Nell pastel', '0', NULL, '2021-02-11 21:29:00'),
(2, 2, 'Daniel', '76429291', 1, 2, 'DEtalle reclamo', 'Sol', 'Feo xD', NULL, 'No se we', 6, '2018-11-23', '2018-11-23', 42, 6, 'Evidencia de la verificacion de conformidad de accion tomada', 'NEll pastel', '0', '2021-02-11 20:23:54', '2021-02-11 20:23:54'),
(3, 2, 'Daniel', '76429291', 1, 2, 'DEtalle reclamo', 'Sol', 'Feo xD', NULL, 'No se we', 6, '2018-11-23', '2018-11-23', 42, 6, 'Evidencia de la verificacion de conformidad de accion tomada', 'NEll pastel', '0', '2021-02-11 20:23:55', '2021-02-11 20:23:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_has_permissions`
--

CREATE TABLE `roles_has_permissions` (
  `permission_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `nombres` varchar(250) DEFAULT NULL,
  `apellidos` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `codigo_confirmacion` varchar(200) DEFAULT NULL,
  `codigo_recuperacion` varchar(200) DEFAULT NULL,
  `fecha_recuperacion` timestamp NULL DEFAULT NULL,
  `estado` char(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idusers`, `nombres`, `apellidos`, `email`, `email_verified_at`, `password`, `remember_token`, `codigo_confirmacion`, `codigo_recuperacion`, `fecha_recuperacion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Erick', 'Zumaeta Diaz', 'erick@gmail.com', NULL, 'erick123', NULL, NULL, NULL, NULL, '0', NULL, '2021-02-06 22:50:01'),
(2, 'Samir', 'Zumaeta', 'minionschispita@gmail.com', NULL, '123', NULL, NULL, NULL, NULL, '0', '2021-02-06 22:44:48', '2021-02-06 22:44:48'),
(3, 'Erick Daniel', 'Zumaeta', 'minionschispita@gmail.com', NULL, '123erick', NULL, NULL, NULL, NULL, '0', '2021-02-11 22:27:50', '2021-02-11 22:27:50'),
(4, 'Marisol', 'Diaz', 'minionschispita@gmail.com', NULL, 'marisol123', NULL, NULL, NULL, NULL, '1', '2021-02-11 22:28:39', '2021-02-11 22:29:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actualizaciones`
--
ALTER TABLE `actualizaciones`
  ADD PRIMARY KEY (`idactualizaciones`),
  ADD KEY `fk_actualizaciones_compras1_idx` (`idcompras`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idclientes`),
  ADD KEY `fk_cliente_giro_negocio_idx` (`idgiro_negocio`);

--
-- Indices de la tabla `comercializacion`
--
ALTER TABLE `comercializacion`
  ADD PRIMARY KEY (`idcomercializacion`),
  ADD KEY `fk_comercializacion_clientes2_idx` (`idclientes`),
  ADD KEY `fk_comercializacion_users1_idx` (`idusers`),
  ADD KEY `fk_comercializacion_medios1_idx` (`idmedios`),
  ADD KEY `fk_comercializacion_eventos1_idx` (`ideventos`),
  ADD KEY `fk_comercializacion_personal1_idx` (`idpersonal`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idcompras`),
  ADD KEY `fk_historial_cliente_clientes1_idx` (`idclientes`),
  ADD KEY `fk_compras_cotizaciones1_idx` (`idcotizaciones`);

--
-- Indices de la tabla `compra_modulos`
--
ALTER TABLE `compra_modulos`
  ADD PRIMARY KEY (`idcompra_modulos`),
  ADD KEY `fk_compra_modulos_modulos1_idx` (`idmodulos`),
  ADD KEY `fk_compra_modulos_compras1_idx` (`idcompras`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`idcotizaciones`);

--
-- Indices de la tabla `cotizacion_comercializacion`
--
ALTER TABLE `cotizacion_comercializacion`
  ADD PRIMARY KEY (`idcotizacion_comercializacion`),
  ADD KEY `fk_cotizacion_comercializacion_comercializacion1_idx` (`idcomercializacion`),
  ADD KEY `fk_cotizacion_comercializacion_cotizaciones1_idx` (`idcotizaciones`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`ideventos`);

--
-- Indices de la tabla `giro_negocio`
--
ALTER TABLE `giro_negocio`
  ADD PRIMARY KEY (`idgiro_negocio`);

--
-- Indices de la tabla `medios`
--
ALTER TABLE `medios`
  ADD PRIMARY KEY (`idmedios`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`model_type`,`model_id`),
  ADD KEY `fk_model_has_permissions_permissions1_idx` (`permission_id`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`model_type`,`model_id`),
  ADD KEY `fk_model_has_roles_roles1_idx` (`role_id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`idmodulos`);

--
-- Indices de la tabla `modulo_comercializacion`
--
ALTER TABLE `modulo_comercializacion`
  ADD PRIMARY KEY (`idmodulo_comercializacion`),
  ADD KEY `fk_table1_modulos1_idx` (`idmodulos`),
  ADD KEY `fk__comercializacion1_idx` (`idcomercializacion`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`idpersonal`);

--
-- Indices de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  ADD PRIMARY KEY (`idreclamos`),
  ADD KEY `fk_reclamos_clientes1_idx` (`idclientes`),
  ADD KEY `fk_reclamos_medios1_idx` (`idmedios`),
  ADD KEY `fk_reclamos_modulos1_idx` (`idmodulos`),
  ADD KEY `fk_reclamos_personal1_idx` (`idpersonal`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles_has_permissions`
--
ALTER TABLE `roles_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `fk_roles_has_permissions_permissions1_idx` (`permission_id`),
  ADD KEY `fk_roles_has_permissions_roles1_idx` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actualizaciones`
--
ALTER TABLE `actualizaciones`
  MODIFY `idactualizaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idclientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `comercializacion`
--
ALTER TABLE `comercializacion`
  MODIFY `idcomercializacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idcompras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compra_modulos`
--
ALTER TABLE `compra_modulos`
  MODIFY `idcompra_modulos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `idcotizaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cotizacion_comercializacion`
--
ALTER TABLE `cotizacion_comercializacion`
  MODIFY `idcotizacion_comercializacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ideventos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `giro_negocio`
--
ALTER TABLE `giro_negocio`
  MODIFY `idgiro_negocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `medios`
--
ALTER TABLE `medios`
  MODIFY `idmedios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idmodulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `modulo_comercializacion`
--
ALTER TABLE `modulo_comercializacion`
  MODIFY `idmodulo_comercializacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `idpersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  MODIFY `idreclamos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actualizaciones`
--
ALTER TABLE `actualizaciones`
  ADD CONSTRAINT `fk_actualizaciones_compras1` FOREIGN KEY (`idcompras`) REFERENCES `compras` (`idcompras`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_cliente_giro_negocio` FOREIGN KEY (`idgiro_negocio`) REFERENCES `giro_negocio` (`idgiro_negocio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comercializacion`
--
ALTER TABLE `comercializacion`
  ADD CONSTRAINT `fk_comercializacion_clientes2` FOREIGN KEY (`idclientes`) REFERENCES `clientes` (`idclientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comercializacion_eventos1` FOREIGN KEY (`ideventos`) REFERENCES `eventos` (`ideventos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comercializacion_medios1` FOREIGN KEY (`idmedios`) REFERENCES `medios` (`idmedios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comercializacion_personal1` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comercializacion_users1` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compras_cotizaciones1` FOREIGN KEY (`idcotizaciones`) REFERENCES `cotizaciones` (`idcotizaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historial_cliente_clientes1` FOREIGN KEY (`idclientes`) REFERENCES `clientes` (`idclientes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compra_modulos`
--
ALTER TABLE `compra_modulos`
  ADD CONSTRAINT `fk_compra_modulos_compras1` FOREIGN KEY (`idcompras`) REFERENCES `compras` (`idcompras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compra_modulos_modulos1` FOREIGN KEY (`idmodulos`) REFERENCES `modulos` (`idmodulos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cotizacion_comercializacion`
--
ALTER TABLE `cotizacion_comercializacion`
  ADD CONSTRAINT `fk_cotizacion_comercializacion_comercializacion1` FOREIGN KEY (`idcomercializacion`) REFERENCES `comercializacion` (`idcomercializacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cotizacion_comercializacion_cotizaciones1` FOREIGN KEY (`idcotizaciones`) REFERENCES `cotizaciones` (`idcotizaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `fk_model_has_permissions_permissions1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `fk_model_has_roles_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `modulo_comercializacion`
--
ALTER TABLE `modulo_comercializacion`
  ADD CONSTRAINT `fk__comercializacion1` FOREIGN KEY (`idcomercializacion`) REFERENCES `comercializacion` (`idcomercializacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_modulos1` FOREIGN KEY (`idmodulos`) REFERENCES `modulos` (`idmodulos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reclamos`
--
ALTER TABLE `reclamos`
  ADD CONSTRAINT `fk_reclamos_clientes1` FOREIGN KEY (`idclientes`) REFERENCES `clientes` (`idclientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reclamos_medios1` FOREIGN KEY (`idmedios`) REFERENCES `medios` (`idmedios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reclamos_modulos1` FOREIGN KEY (`idmodulos`) REFERENCES `modulos` (`idmodulos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reclamos_personal1` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `roles_has_permissions`
--
ALTER TABLE `roles_has_permissions`
  ADD CONSTRAINT `fk_roles_has_permissions_permissions1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roles_has_permissions_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
