-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2021 a las 19:49:57
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
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `idactividad` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` char(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`idactividad`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Realizar Cotizacion', '0', NULL, '2021-03-05 21:41:58'),
(2, 'Llamada al cliente', '0', '2021-03-05 21:41:15', '2021-03-05 21:41:15'),
(3, 'Visitar al cliente', '0', '2021-03-05 21:41:46', '2021-03-05 21:41:46'),
(4, 'Subir cotización', '0', '2021-03-05 21:42:17', '2021-03-05 21:42:24');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercializacion`
--

CREATE TABLE `comercializacion` (
  `idcomercializacion` int(11) NOT NULL,
  `idclientes` int(11) NOT NULL,
  `persona_contacto` varchar(150) DEFAULT NULL,
  `idactividad` int(11) NOT NULL,
  `idmedios` int(11) NOT NULL,
  `idusers` int(11) NOT NULL,
  `detalla_llamada` text DEFAULT NULL,
  `ideventos` int(11) NOT NULL,
  `fecha_evento` timestamp NULL DEFAULT NULL,
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
-- Estructura de tabla para la tabla `correlativo`
--

CREATE TABLE `correlativo` (
  `idcorrelativo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `serie` varchar(45) DEFAULT NULL,
  `correlativo` varchar(45) DEFAULT NULL,
  `estado` char(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `correlativo`
--

INSERT INTO `correlativo` (`idcorrelativo`, `nombre`, `serie`, `correlativo`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'COTIZACION', 'CEATEC', '3', '', NULL, '2021-03-05 23:25:20');

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
(1, 'Venta', 'Venta de productos', '1', '2021-02-04 19:52:42', '2021-03-03 19:05:40'),
(2, 'Compra', 'Compra de productos', '0', '2021-02-04 20:43:09', '2021-02-04 20:43:09'),
(3, 'Reventa', 'Revendedores de prodctos', '0', '2021-02-10 23:18:42', '2021-02-10 23:18:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `idfacturacion` int(11) NOT NULL,
  `idclientes` int(11) NOT NULL,
  `nombre_certificado` varchar(200) DEFAULT NULL,
  `entrysign` varchar(450) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `user_sol_primario` varchar(45) DEFAULT NULL,
  `clave_sol_primario` varchar(45) DEFAULT NULL,
  `user_sol_secundario` varchar(45) DEFAULT NULL,
  `clave_sol_secundario` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giro_negocio`
--

CREATE TABLE `giro_negocio` (
  `idgiro_negocio` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `giro_negocio`
--

INSERT INTO `giro_negocio` (`idgiro_negocio`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Ventas', NULL, NULL, NULL),
(2, 'Compras', NULL, NULL, NULL),
(3, 'Compra-Venta', NULL, '2021-03-05 19:04:38', '2021-03-05 19:04:38');

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
(1, 'Correo electrónico', '0', '2021-03-05 22:27:52', '2021-03-05 22:27:52'),
(2, 'Facebook', '0', '2021-03-05 22:28:02', '2021-03-05 22:28:02'),
(3, 'Messenger', '0', '2021-03-05 22:28:10', '2021-03-05 22:28:10'),
(4, 'Pagina', '0', '2021-03-05 22:28:17', '2021-03-05 22:28:17'),
(5, 'Boca a Boca', '0', '2021-03-05 22:28:32', '2021-03-05 22:28:32'),
(6, 'Eventos webinar', '0', '2021-03-05 22:28:39', '2021-03-05 22:28:39'),
(7, 'Otros eventos', '0', '2021-03-05 22:28:48', '2021-03-05 22:28:48');

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
  `caracteristicas` longtext DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '0' COMMENT '0 =  activo\n1 = inactivo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`idmodulos`, `nombre`, `caracteristicas`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'CEAERP Integral', '<div class=\"col-md-7\" style=\"width: 951.406px; flex-basis: 58.3333%; max-width: 58.3333%; color: rgb(33, 37, 41); font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><div class=\"container align-items-center\" style=\"width: 921.406px;\"><div class=\"row justify-content-center my-2\"><div class=\"col-md-10 text-center\" style=\"width: 767.828px; flex-basis: 83.3333%; max-width: 83.3333%;\"><div id=\"detalle_nombre\"><h1 class=\"text-center my-2 a-sigh titulo-ceaerp-integral\" style=\"font-weight: 500; line-height: 1.2; font-size: 2.5rem;\"><span style=\"font-weight: bolder;\">CEA</span>ERP Integral</h1></div><div id=\"detalle_descripción\"><h2 class=\"text-justify my-4 a-jello\" style=\"font-weight: 500; font-size: 2rem; line-height: 1.4rem !important;\"><p class=\"MsoNormal\"><span style=\"font-size: 11.5pt; line-height: 16.4067px; font-family: Arial, sans-serif; color: rgb(33, 37, 41); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Un ERP, están orientados generalmente a empresas medianas y/o grandes. Son sistemas integrales que permiten automatizar áreas de la empresa tales como: Compras, Logística, Inventario, Contabilidad, Producción, Activos Fijos, Recursos Humanos, entre otros.; considerando las mejores prácticas de gestión de procesos, metodología y técnica de desarrollo de software. &nbsp;Garantizando su adaptabilidad a cualquier tipo de negocio.<o:p></o:p></span></p></h2><h3 class=\"text-center my-4 a-sigh titulo-ceaerp-integral\" style=\"font-weight: 500; line-height: 1.2; font-size: 1.75rem; color: rgb(33, 37, 41); font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">CARACTERÍSTICAS</h3><div class=\"row my-4\"><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Mejora en la toma de decisiones contando con información integral y actualizada en línea.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Reduce costos derivados de procesos repetitivos, mantenimiento de varios sistemas y papeleos</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Ayuda a optimizar procedimientos de las distintas áreas del negocio.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Mejora la seguridad, trazabilidad y auditoria de información por tener todo centralizado.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Adaptable a todos los cambios internos y externos producto del crecimiento evolutivo de los negocios.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Acceso a toda la información de forma confiable, precisa y oportuna (integridad de datos).</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Compartir información entre todos los componentes de la organización.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Reducir en tiempo y costos de todos los procesos empresariales</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Integración con cualquier área del negocio.</p></div></div></div><div><br></div></div></div></div></div><div class=\"col-md-5 d-lg-flex flex-lg-column\" style=\"width: 679.578px; padding: 0px; flex-basis: 41.6667%; max-width: 41.6667%; color: rgb(33, 37, 41); font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"></div>', '0', '2021-03-05 22:02:49', '2021-03-05 22:02:49'),
(2, 'CEAContabilidad', '<div id=\"detalle_nombre\" style=\"color: rgb(33, 37, 41); font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; text-align: center;\"><h1 class=\"text-center my-2 a-sigh titulo-cea-contabilidad\" style=\"font-weight: 500; line-height: 1.2; font-size: 3rem; background-image: linear-gradient(-45deg, rgb(110, 180, 234), rgb(19, 52, 77)); -webkit-text-fill-color: transparent;\"><br></h1></div><div id=\"detalle_descripción\" style=\"text-align: center;\"><h2 class=\"text-justify my-4 a-jello\" style=\"color: rgb(33, 37, 41); font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-weight: 500; font-size: 2rem; line-height: 1.4rem !important;\"><p><span style=\"font-family: Roboto, sans-serif; font-size: 15px;\">Ágil, útil y amigable; apoya en la gestión empresarial. Fácil&nbsp;<span style=\"font-weight: bolder;\">operatividad&nbsp;</span>y rápida en procesar información, Mejora el trabajó contable para&nbsp;<span style=\"font-weight: bolder;\">todo tipo de empresa</span>. Cuenta con las últimas actualizaciones de la normativa contable vigente de SUNAT.</span></p><p style=\"text-align: center; \"><span style=\"font-family: Roboto, sans-serif; font-size: 15px;\">CARACTERISTICAS</span></p></h2><h2 class=\"text-justify my-4 a-jello\" style=\"color: rgb(33, 37, 41); font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-weight: 500; font-size: 2rem; line-height: 1.4rem !important;\"><div class=\"row my-4\" style=\"color: rgb(33, 37, 41); font-size: 16px; text-align: center;\"><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Seguridad (Usuarios, Niveles de Acceso, Administración de Empresas)</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Registro de Compras y Gastos, Registro de Ventas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Ingreso de Caja, Diario y Bancos</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Backup automático diario</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Asiento de apertura automática</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Asiento de Cierre automático</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Estados Financieros</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Centro de Costos Independientes y/o relacionado con Plan Contable</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Cancelaciones Automáticas desde su provisión de Compras y Ventas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Registro de Asientos de Planilla Automática</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Importar desde Cualquier Sistema Registro de Compras y Ventas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Análisis del Balance de Comprobación</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Consulta Automática OnLine de Tipo Cambio y RUC de Sunat</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Generación de&nbsp; Formatos&nbsp; TXT&nbsp; Según Sunat (PLE, DAOT, PDT, PDB)</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Permite administrar ilimitadas empresas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Costeo del IGV automático para las empresas de la Selva</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span></p><p>Reporte de los Gastos Reparables en cada ejercicio económico</p></div></div></h2></div>', '0', '2021-03-05 22:07:20', '2021-03-05 22:07:20'),
(3, 'CEAComerial', '<p class=\"MsoNormal\" align=\"center\" style=\"text-align: center; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size:24.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#212529;mso-font-kerning:18.0pt;mso-fareast-language:\r\nES-PE\">CEA</span></b><span style=\"font-size:24.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#212529;mso-font-kerning:18.0pt;\r\nmso-fareast-language:ES-PE\">Comercial<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align: justify; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#212529;mso-fareast-language:ES-PE\">Tenga el control de\r\nlas ventas en efectivo, crédito y/o tarjetas.&nbsp;Controle el stock en tiempo\r\nreal, realice en seguimiento de Cuentas por Cobrar/Pagar en forma dinámica.\r\nPermite controlar comisiones por vendedor, realiza proformas y/o cotizaciones en\r\nforma dinámica, también puedes realizar apertura y cierre de Caja, entre\r\notros.&nbsp;Con diferentes reportes que ayuda a gestionar tu empresa, obtén\r\ninformación por fechas para la toma de decisiones, además todos los reportes\r\nson exportables a&nbsp;<b>Word, Excel, o PDF.</b></span></p><p class=\"MsoNormal\" style=\"text-align: center; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><font color=\"#212529\" face=\"Arial, sans-serif\"><span style=\"font-size: 15.3333px;\">CARACTERISTICAS</span></font></p><div class=\"row my-4\" style=\"color: rgb(33, 37, 41); font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; text-align: center;\"><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Definición&nbsp; de&nbsp; Grupo, Familia, Unidades y Marcas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Maestro de Artículos por clasificación</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Registro de Compras al contado o crédito</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Ventas de artículos en efectivo, crédito y tarjeta</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Amortización de Compras / Ventas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Valorización de compra / Flete (transporte)</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>&nbsp;Facturación – Ventas y/o Servicios</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Control de Caja de ingresos y salidas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Anulación de Facturas y/o Boletas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Registro y control de gastos</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>&nbsp;Reportes de gastos por rango de fechas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Reporte de Movimiento de Caja</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Consulta de facturas y boletas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>&nbsp;Consulta Automática OnLine de Tipo Cambio y RUC de Sunat</p></div></div><p class=\"MsoNormal\" style=\"text-align: justify; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#212529;mso-fareast-language:ES-PE\"><b><o:p></o:p></b></span></p>', '0', '2021-03-05 22:09:57', '2021-03-05 22:09:57'),
(4, 'CEAAlmacen', '<p class=\"MsoNormal\" align=\"center\" style=\"text-align: center; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size:24.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#212529;mso-font-kerning:18.0pt;mso-fareast-language:\r\nES-PE\">CEA</span></b><span style=\"font-size:24.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#212529;mso-font-kerning:18.0pt;\r\nmso-fareast-language:ES-PE\">Almacén<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:\r\n&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;color:#212529;\r\nmso-fareast-language:ES-PE\">La gestión de almacén es mas dinámico,de fácil\r\noperatividad y rápida en procesar la información.</span><span style=\"font-size:\r\n18.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;\r\ncolor:#212529;mso-fareast-language:ES-PE\"><o:p></o:p></span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align: center; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" style=\"line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:\r\n&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;color:#212529;\r\nmso-fareast-language:ES-PE\">Controle los productos de su empresa en tiempo\r\nreal, actualice sus costos mediante la valoración de flete y gastos. Obtenga su\r\nKardex por artículo, Kardex Valorizado por almacén y por centro de costos,\r\nactualizaciones acuerdo a la normativa vigente. Obtenga los reportes\r\ndiariamente o por rango de fechas según necesidad, además todos los reportes\r\nson exportables a Word, Excel, o PDF. Integrado a CEACONTA.</span></p><p class=\"MsoNormal\" style=\"text-align: center; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:\r\n&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;color:#212529;\r\nmso-fareast-language:ES-PE\">CARACTERISTICAS</span></p><p class=\"MsoNormal\" style=\"line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:18.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#212529;mso-fareast-language:ES-PE\"><o:p></o:p></span></p><div class=\"row my-4\" style=\"color: rgb(33, 37, 41); font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; text-align: center;\"><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Administración de Grupos y Familias</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Kardex por artículo</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Salida de artículos para producción</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Valorización de Compra /Flete (Transporte)</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Kardex o inventario Físico</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Kardex o inventario Físico Permanente</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Kardex o inventario Valorizado según formato Sunat</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Registro de la distribución de insumos por procesos y/o centro de costos.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Reporte de consumo de insumos por procesos y/o centro de costos.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Movimientos de compras, ventas y Guías</p></div></div><p class=\"MsoNormal\" style=\"text-align: justify; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#212529;mso-fareast-language:ES-PE\"><b><o:p></o:p></b></span></p>', '0', '2021-03-05 22:11:38', '2021-03-05 22:11:38'),
(5, 'CEAFacturación Electronica', '<h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\">CEA</span><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529;font-weight:normal\">Facturación\r\nElectrónica<o:p></o:p></span></h1><p class=\"MsoNormal\" align=\"center\" style=\"text-align: center; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">\r\n\r\n</p><h2 style=\"text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-size: 2rem; margin-top: 1.5rem !important; margin-bottom: 1.5rem !important; line-height: 1.4rem !important;\"><span style=\"font-size:\r\n11.5pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif;color:#212529\">Gestione su facturación electrónica&nbsp;en\r\nforma dinámica.&nbsp;CEA FACTURACIÓN, está desarrollado con tecnología vigente\r\ny con motor de base de datos SQL Server, eso hace que el software sea ágil,\r\nútil, amigable, de fácil operatividad y rápida en procesar información.\r\nOrientado a&nbsp;todo tipo de negocio&nbsp;evitando\r\nlargas colas y tiempo de demora en emitir facturas y/o boletas, notas de\r\nCrédito consultando el RUC de los clientes online con SUNAT, controla la\r\napertura y cierre de Caja, entre otros. Los reportes se pueden realizar\r\ndiariamente o por rango de fechas según necesidad, además todos los reportes\r\nson exportables a Word, Excel, o PDF, Integrado a CEACONTA.</span></h2><h2 style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-size: 2rem; margin-top: 1.5rem !important; margin-bottom: 1.5rem !important; line-height: 1.4rem !important;\"><span style=\"font-size:\r\n11.5pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif;color:#212529\">CARACTERISTICAS</span></h2><h2 style=\"text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-size: 2rem; margin-top: 1.5rem !important; margin-bottom: 1.5rem !important; line-height: 1.4rem !important;\"><span style=\"font-size:\r\n11.5pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif;color:#212529\"><div class=\"row my-4\" style=\"font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-weight: 400; text-align: center;\"><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>&nbsp;Administración de Grupos y Familias</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>&nbsp;Administración de Cliente Proveedor</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Facturación – Ventas y/o Servicios</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Emisión de Facturas, Boletas Electrónicas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Envió automático a Sunat</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Consulta de Facturas y boletas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Anulación de Facturas y/o Boletas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Emisión de Notas de Crédito y Debito</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Avisos de Mensaje de alerta por rechazado ante Sunat</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Reporte de Ventas por fechas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Reporte de Movimiento de Caja</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Resumen de Ventas Diarias</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Reporte de Ingreso de Efectivo a Caja</p></div></div></span></h2><h2 style=\"text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-size: 2rem; margin-top: 1.5rem !important; margin-bottom: 1.5rem !important; line-height: 1.4rem !important;\"><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></h2><p class=\"MsoNormal\" style=\"text-align: justify; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#212529;mso-fareast-language:ES-PE\"><b><o:p></o:p></b></span></p>', '0', '2021-03-05 22:14:09', '2021-03-05 22:14:09'),
(6, 'CEAPlanilla', '<h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\">CEA</span><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529;font-weight:normal\">Planilla<o:p></o:p></span></h1><h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">\r\n\r\n<p style=\"margin-top: 0cm; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#212529\">Con CeaPlanilla y su\r\ninterfaces&nbsp;dinámico&nbsp;y amigable, la generación del proceso de planilla\r\nes más fácil y oportuna en la generación de reportes, permitiendo exportar\r\ninformación al PLAME, T-Registro, AFPNet, PDT, Asientos Contables, entre otros.&nbsp;</span>Adaptable a cualquier giro empresarial\r\n(Administrativo, Agraria, Construcción, etc.). Procesa el cálculo de la\r\nplanilla con un solo click.&nbsp;Esta\r\nde acuerdo con la Normatividad Vigente de las leyes laborales, emite las\r\nBoletas de Pago y genera archivos para el pago de remuneración, según entidad\r\nfinanciera. Emite varios reportes como CTS, Renta de 5ta Cat., trabajadores por\r\nconcepto, hoja de trabajo dinámico, etc.&nbsp;</p><p style=\"text-align: center; margin-top: 0cm; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">CARACTERISTICAS</p></h1><h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><div class=\"row my-4\" style=\"color: rgb(33, 37, 41); font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-weight: 400;\"><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span></p><p>Administración de maestro de Personal</p><p></p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Administración de Conceptos de planilla</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Definición de conceptos de planilla Ingresos, Descuentos, Aportes</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Administración de Personal Administrativo, Jornaleros, Obreros, Peones, etc.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Generación de planilla mensual</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Cálculo Automático de Gratificación</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Cálculo Automático de la 5ta categoría</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>&nbsp;Movimientos de personal (vacaciones, bonificaciones, horas extras, descuentos, prestamos, etc.)</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Emisión de Boletas de Pago Semanal y Mensual</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>&nbsp;Emisión de Certificados de CTS</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Liquidaciones, Cálculo de AFP</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Provisiones de CTS, Vacaciones e Impuesto a la Renta</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>&nbsp;Transferencia al T- Registro y PLAME</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Transferencia al AFP Net</p></div></div><p style=\"margin-top: 0cm; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:18.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></p></h1><h2 style=\"text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-size: 2rem; margin-top: 1.5rem !important; margin-bottom: 1.5rem !important; line-height: 1.4rem !important;\"><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></h2><p class=\"MsoNormal\" style=\"text-align: justify; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#212529;mso-fareast-language:ES-PE\"><b><o:p></o:p></b></span></p>', '0', '2021-03-05 22:15:40', '2021-03-05 22:15:40');
INSERT INTO `modulos` (`idmodulos`, `nombre`, `caracteristicas`, `estado`, `created_at`, `updated_at`) VALUES
(7, 'CEALogistica', '<h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\">CEA</span><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529;font-weight:normal\">Logística<o:p></o:p></span></h1><h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">\r\n\r\n<p style=\"margin-top: 0cm; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#212529\">Apoya en\r\nla gestión de Logística. Desarrollado con motor de base de datos SQL Server,\r\nhaciendo que el software sea ágil, útil, amigable y de fácil operatividad,\r\nademás es dinámico y rápida en procesar la información.</span><span style=\"font-size:18.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></p>\r\n\r\n<p style=\"margin-top: 0cm; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#212529\">Permite\r\ngestionar los procesos de logística y almacenes, llevando un control de las\r\ncompras y sus respectivas salidas por áreas o centro de costos, emite los\r\ninformes de pagos correspondientes por cliente. Administrar de forma eficiente\r\nla distribución y el transporte, abastecimiento de sucursales, entre otros. Los\r\nreportes se pueden realizar por rango de fechas según necesidad, además todos\r\nlos reportes son exportables a Word, Excel, o PDF.</span></p><p style=\"text-align: center; margin-top: 0cm; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">CARACTERISTICAS</p></h1><h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><div class=\"row my-4\" style=\"color: rgb(33, 37, 41); font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-weight: 400;\"><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Requerimientos técnicos de compra</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Recepción de bien o servicio</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Emisión de ordenes de compra y/o servicio</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Verificación de especificaciones técnicas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Confirmación del bien o servicio</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Registro de artículos y/o materiales</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Creación de Ordenes de Compra o Servicio</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Lista de Ordenes Aprobadas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Registro de FUR por área empresarial</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Lista de proveedores e identificación del mismo</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Registro de entrada de almacén a área usuaria</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Comprobante de Salida</p></div></div></h1><h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><p style=\"margin-top: 0cm; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:18.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></p></h1><h2 style=\"text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-size: 2rem; margin-top: 1.5rem !important; margin-bottom: 1.5rem !important; line-height: 1.4rem !important;\"><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></h2><p class=\"MsoNormal\" style=\"text-align: justify; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#212529;mso-fareast-language:ES-PE\"><b><o:p></o:p></b></span></p>', '0', '2021-03-05 22:17:50', '2021-03-05 22:17:50'),
(8, 'CEACostos', '<h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\">CEA</span><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529;font-weight:normal\">Costos<o:p></o:p></span></h1><h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">\r\n\r\n<p style=\"margin-top: 0cm; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#212529\">Desarrollado\r\ncon tecnología vigente y un potente motor de base de datos (SQL Server),\r\nhaciendo que el software sea ágil, útil, amigable y de fácil operatividad.&nbsp;</span>Permite controlar los costos de producción de\r\nforma dinámico, en el momento oportuno.<span style=\"font-size:\r\n18.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></p>\r\n\r\n<p style=\"margin-top: 0cm; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#212529\">Software\r\nespecializado para empresas industriales y de producción destinados a optimizar\r\nlas operaciones, proporcionándoles un control total de sus procesos productivos\r\ndeterminando el costo real de sus productos y/o recetas de fabricación.</span></p><p style=\"text-align: center; margin-top: 0cm; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><font color=\"#212529\" face=\"Arial, sans-serif\"><span style=\"font-size: 15.3333px;\">CARACTERISTICAS</span></font></p></h1><h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><div class=\"row my-4\" style=\"color: rgb(33, 37, 41); font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-weight: 400;\"><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Genera Órdenes Trabajo para Producción de Productos Terminados</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Elaboración de fórmulas para productos terminados</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Asignación de trabajos por Centros de Costo para Productos Terminados</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Procesa cálculo de Horas Hombre por actividad asignada en centro de costo de Planillas.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Registro de la distribución de insumos por procesos y/o centro de costos.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Reporte de consumo de insumos por procesos y/o centro de costos.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Registros de gastos indirectos por centro de costo</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Control de Materia Prima para productos terminados</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Genera cálculo de costos de Producción</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Elabora Guías de salida de almacén para Materias Primas.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Control de ingreso y salida de al almacén para Productos Terminados</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Elabora Cotizaciones.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Transferencía de Asientos Contables al Sistema Gestión Contable CEAConta</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Instalación, Configuración y servicio técnico.</p></div></div></h1><h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><p style=\"margin-top: 0cm; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:18.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></p></h1><h2 style=\"text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-size: 2rem; margin-top: 1.5rem !important; margin-bottom: 1.5rem !important; line-height: 1.4rem !important;\"><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></h2><p class=\"MsoNormal\" style=\"text-align: justify; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#212529;mso-fareast-language:ES-PE\"><b><o:p></o:p></b></span></p>', '0', '2021-03-05 22:19:08', '2021-03-05 22:19:08'),
(9, 'CEAActivo Fijo', '<h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\">CEA</span><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529;font-weight:normal\">Activo\r\nFijo<o:p></o:p></span></h1><h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">\r\n\r\n<p style=\"margin-top: 0cm; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#212529\">Tenga el\r\ncontrol de los Activos Fijos de la empresa en una sola plataforma, controlando\r\nde forma dinámica y de fácil operatividad.</span><span style=\"font-size:\r\n18.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></p>\r\n\r\n<p style=\"margin-top: 0cm; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#212529\">Controlar\r\nla situación de un Activo Fijo, es crucial para la toma de decisiones;\r\nidentificando que activos son asignados al responsable del área, tiempo de\r\ndepreciación del mismo, mejoras realizadas a cada uno de ellos, entre otros.\r\nCon sus diferentes reportes que ofrece este módulo, obtén datos por rango de\r\nfechas según necesidad,&nbsp;</span>además\r\nfacilita la exportación a formatos Word, Excel, o PDF. También permite\r\nintegrarlos como asientos a la parte contable del CEACONTA.</p><p style=\"text-align: center; margin-top: 0cm; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">CARACTERISTICAS</p></h1><h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><div class=\"row my-4\" style=\"color: rgb(33, 37, 41); font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-weight: 400;\"><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Clasificación de activos fijos</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Depreciación de los bienes y/o equipo usando el método de línea recta.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Depreciación Mensual y/o Anual.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Permite administrar ilimitadas empresas.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Reportes de Activos Fijos por clasificación.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Listado de Activos por descripción.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Listado de Activos por responsable y/o área.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Tablas Auxiliares (Grupo, Familia, Marca, Área de la empresa, Responsable, otros).</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>&nbsp; Reporte de Depreciaciones (Ajuste de vida útil o de valuación).</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Planificación de mantenimiento preventivo y correctivo de Activos Fijos.</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>&nbsp;Reportes de Activos Fijos dados de baja (Historial, Próximos, Vencidos).</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>&nbsp;Reporte Vigentes de los formatos exigidos por SUNAT (7.1, 7.3, 7.4) PLE</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>&nbsp;Generación de asientos contables para el Sistema Contable CEAConta</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Manejo de catálogo de Activos</p></div></div><p style=\"margin-top: 0cm; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:18.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></p></h1><h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><p style=\"margin-top: 0cm; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:18.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></p></h1><h2 style=\"text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-size: 2rem; margin-top: 1.5rem !important; margin-bottom: 1.5rem !important; line-height: 1.4rem !important;\"><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></h2><p class=\"MsoNormal\" style=\"text-align: justify; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#212529;mso-fareast-language:ES-PE\"><b><o:p></o:p></b></span></p>', '0', '2021-03-05 22:21:12', '2021-03-05 22:21:12'),
(10, 'CEARestaurante', '<h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\">CEA</span><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529;font-weight:normal\">Restaurante<o:p></o:p></span></h1><h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">\r\n\r\n<p style=\"margin-top: 0cm; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#212529\">Desarrollado\r\ncon tecnología vigente y potente motor de base de datos (SQL Server), esto hace\r\nque el software sea ágil, útil, amigable y de fácil operatividad, haciendo que\r\nel control de los Restaurantes sea dinámico, oportuno y rápida en procesar la información.</span><span style=\"font-size:18.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></p>\r\n\r\n<p style=\"margin-top: 0cm; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;color:#212529\">Software\r\nespecializado para restaurantes o bares destinados a optimizar las operaciones,\r\nproporcionando un control total de las operaciones del restaurante, controla la\r\natención por comandas y atención por delivery. Los reportes se pueden realizar\r\npor rango de fechas según necesidad, además todos los reportes son exportables\r\na Word, Excel, o PDF.</span></p><p style=\"text-align: center; margin-top: 0cm; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><font color=\"#212529\" face=\"Arial, sans-serif\"><span style=\"font-size: 15.3333px;\">CARACTERISTICAS</span></font></p></h1><h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><div class=\"row my-4\" style=\"color: rgb(33, 37, 41); font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-weight: 400;\"><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Pedidos</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Compras</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Puntos de Ventas y/o facturación mediante comandas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Ventas por Delivery</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Cuentas por Pagar y Cobrar</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Amortizaciones de Compras</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Amortizaciones de Ventas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Elaboración de orden de pedido (Cotizaciones)</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Valorización de Compra /Flete (Transporte)</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Facturación - Ventas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Notas de Crédito</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Cobranza y Cobranza de créditos</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Anulación de Facturas</p></div><div class=\"col-md-4\" style=\"width: 380px; flex-basis: 33.3333%; max-width: 33.3333%; color: rgb(115, 115, 115);\"><p class=\"my-2\" style=\"text-align: left; display: flex;\"><span class=\"fas fa-check-circle mr-2 mt-1\"></span>Consulta de Facturas</p></div></div><p style=\"text-align: center; margin-top: 0cm; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><font color=\"#212529\" face=\"Arial, sans-serif\"><span style=\"font-size: 15.3333px;\"><br></span></font></p></h1><h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><p style=\"margin-top: 0cm; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:18.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></p></h1><h1 align=\"center\" style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><p style=\"margin-top: 0cm; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:18.0pt;font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></p></h1><h2 style=\"text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-size: 2rem; margin-top: 1.5rem !important; margin-bottom: 1.5rem !important; line-height: 1.4rem !important;\"><span style=\"font-family:&quot;Segoe UI&quot;,sans-serif;color:#212529\"><o:p></o:p></span></h2><p class=\"MsoNormal\" style=\"text-align: justify; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:11.5pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#212529;mso-fareast-language:ES-PE\"><b><o:p></o:p></b></span></p>', '0', '2021-03-05 22:22:59', '2021-03-05 22:22:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo_comercializacion`
--

CREATE TABLE `modulo_comercializacion` (
  `idmodulo_comercializacion` int(11) NOT NULL,
  `idmodulos` int(11) NOT NULL,
  `cant_licencias` int(11) DEFAULT NULL,
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
  `fecha_compromiso` timestamp NULL DEFAULT NULL,
  `fecha_solucion` timestamp NULL DEFAULT NULL,
  `solucion_minutos` int(11) DEFAULT NULL,
  `solucion_dias` double DEFAULT NULL,
  `evidencia` text DEFAULT NULL,
  `emite_accion` varchar(100) DEFAULT NULL,
  `estado` char(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idactividad`);

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
  ADD KEY `fk_comercializacion_personal1_idx` (`idpersonal`),
  ADD KEY `fk_comercializacion_actividad1_idx` (`idactividad`);

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
-- Indices de la tabla `correlativo`
--
ALTER TABLE `correlativo`
  ADD PRIMARY KEY (`idcorrelativo`,`estado`);

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
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`idfacturacion`),
  ADD KEY `fk_facturacion_clientes1_idx` (`idclientes`);

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
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `idactividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `actualizaciones`
--
ALTER TABLE `actualizaciones`
  MODIFY `idactualizaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idclientes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comercializacion`
--
ALTER TABLE `comercializacion`
  MODIFY `idcomercializacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idcompras` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra_modulos`
--
ALTER TABLE `compra_modulos`
  MODIFY `idcompra_modulos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `idcotizaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cotizacion_comercializacion`
--
ALTER TABLE `cotizacion_comercializacion`
  MODIFY `idcotizacion_comercializacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ideventos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  MODIFY `idfacturacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `giro_negocio`
--
ALTER TABLE `giro_negocio`
  MODIFY `idgiro_negocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `medios`
--
ALTER TABLE `medios`
  MODIFY `idmedios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idmodulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `idpersonal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  MODIFY `idreclamos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `fk_comercializacion_actividad1` FOREIGN KEY (`idactividad`) REFERENCES `actividad` (`idactividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
-- Filtros para la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD CONSTRAINT `fk_facturacion_clientes1` FOREIGN KEY (`idclientes`) REFERENCES `clientes` (`idclientes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
