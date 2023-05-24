-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2023 a las 01:27:38
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idcargo` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idcargo`, `descripcion`) VALUES
(0, ''),
(1, 'PROVEEDORES'),
(2, 'DE OTRA FACULTAD DE UNI'),
(3, 'DEL SECTOR EMPRESARIAL'),
(4, 'DEL SECTOR PUBLICO'),
(5, 'JUBILADOS'),
(6, 'FUNCIONARIOS'),
(7, 'PUBLICO EN GENERAL'),
(8, 'EX ALUNMOS DE FIIS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `idcargo` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`idcargo`, `descripcion`) VALUES
(1, 'DECANO'),
(2, 'COMITE DE CALIDAD'),
(3, 'LIDERES DE PROCESO'),
(4, 'JEFE DE DEPARTAMENTOS'),
(11, 'DECANO10'),
(12, 'PROFESOR'),
(13, 'DECANOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificacion`
--

CREATE TABLE `certificacion` (
  `idcertificacion` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `certificacion`
--

INSERT INTO `certificacion` (`idcertificacion`, `descripcion`) VALUES
(1, 'CBC-SUNEDU'),
(2, 'ISO-9001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `idDireccion` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`idDireccion`, `descripcion`) VALUES
(1, 'COMISION DE CALIDAD'),
(2, 'COMISION DE SEGURIDAD'),
(3, 'COMISION DE PRACTICAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `idgrupo` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`idgrupo`, `descripcion`) VALUES
(1, 'IV.1 LINEAS DE INVESTIGACION'),
(2, 'IV.2 DOCENTES QUE REALIZAN INVESTIGACION'),
(3, 'IV.3 REGISTRO DE DOCUMENTOS Y INVESTIGACION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio1`
--

CREATE TABLE `inicio1` (
  `id` int(6) UNSIGNED NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `proceso` varchar(30) NOT NULL,
  `descripcion` text,
  `accion_inmediata` varchar(255) DEFAULT NULL,
  `responsable` varchar(250) DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `alerta` varchar(255) DEFAULT NULL,
  `fecha_limite` date DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inicio1`
--

INSERT INTO `inicio1` (`id`, `tipo`, `proceso`, `descripcion`, `accion_inmediata`, `responsable`, `fecha_emision`, `alerta`, `fecha_limite`, `estado`) VALUES
(42, 'QUEJA DEL CLIENTE', '', 'hola', 'Si', '', '2023-05-11', '5', '2023-05-16', 'conforme'),
(43, 'QUEJA DEL CLIENTE', '', 'hola', 'Si', '', '2023-05-11', '5', '2023-05-16', 'conforme'),
(44, 'QUEJA DEL CLIENTE', 'ORGANIZACION, DIRECCION Y CONT', 'hola', 'Si', '', '2023-05-11', '5', '2023-05-16', 'conforme'),
(45, 'HALLASCO DEL PERSONAL', 'PROYECTO EDUCATIVO-CURRICULO', 'hola', 'Si', '', '2023-05-11', '5', '2023-05-16', 'conforme'),
(46, 'REVISIONES POR LA ALTA', 'LABOR DE INVESTIGACION', 'hola', 'Si', '', '2023-05-11', '5', '2023-05-16', 'conforme'),
(47, 'REVISIONES POR LA ALTA', 'DESAROLLO DE LAS ACTIVIDADES D', 'hola', 'Si', '', '2023-05-30', '5', '2023-06-03', 'conforme'),
(48, '', '', '', '', '', '0000-00-00', '', '0000-00-00', ''),
(49, 'AUDITORIA INTERNA', 'PLANIFICACION ESTRATEGICA', '', '', '', '2023-05-15', '', '0000-00-00', ''),
(50, 'AUDITORIA INTERNA', 'PLANIFICACION ESTRATEGICA', '', '', '', '2023-05-15', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio2`
--

CREATE TABLE `inicio2` (
  `id` int(6) UNSIGNED NOT NULL,
  `proceso` varchar(50) NOT NULL,
  `certificacion` varchar(50) NOT NULL,
  `grupo` varchar(50) NOT NULL,
  `requisito` varchar(50) NOT NULL,
  `descripcion` text,
  `origen` varchar(50) NOT NULL,
  `fecha_hallazgo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inicio2`
--

INSERT INTO `inicio2` (`id`, `proceso`, `certificacion`, `grupo`, `requisito`, `descripcion`, `origen`, `fecha_hallazgo`) VALUES
(1, '', '', '', '', '', '', '0000-00-00'),
(2, '', '', '', '', '', '', '0000-00-00'),
(3, '', '', '', '', '', '', '0000-00-00'),
(4, '', '', '', '', 'dfhdha', 'hhhh', '2023-05-11'),
(5, '', '', '', '', '', '', '0000-00-00'),
(6, '', '', '', '', '', '', '0000-00-00'),
(7, '', '', '', '', '', '', '0000-00-00'),
(8, '', '', '', '', '', '', '0000-00-00'),
(9, '', '', '', '', '', '', '0000-00-00'),
(10, '', '', '', '', '', '', '0000-00-00'),
(11, '', '', '', '', '', '', '0000-00-00'),
(12, '', '', '', '', '', '', '0000-00-00'),
(13, '', '', '', '', '', '', '0000-00-00'),
(14, '', '', '', '', '', '', '0000-00-00'),
(15, '', '', '', '', '', '', '0000-00-00'),
(16, '', '', '', '', '', '', '0000-00-00'),
(17, '', '', '', '', '', '', '0000-00-00'),
(18, '', '', '', '', '', '', '0000-00-00'),
(19, '', '', '', '', 'bien', 'hoy', '2023-05-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio3`
--

CREATE TABLE `inicio3` (
  `id` int(11) NOT NULL,
  `proceso` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `parte` varchar(255) DEFAULT NULL,
  `seleccion` varchar(255) DEFAULT NULL,
  `externo` varchar(255) DEFAULT NULL,
  `seleccion1` varchar(255) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `comentario_descripcion` text,
  `idproceso` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `inicio3`
--

INSERT INTO `inicio3` (`id`, `proceso`, `direccion`, `parte`, `seleccion`, `externo`, `seleccion1`, `nombres`, `telefono`, `correo`, `comentario`, `comentario_descripcion`, `idproceso`) VALUES
(11, 'PLANIFICACION ESTRATEGICA', 'COMISION DE PRACTICAS', 'si', 'PERSONAL DOCENTE', 'no', 'FUNCIONARIOS', 'Yonel Acosta Roman', '987654321', 'yonelacosta@gmail.com', 'reclamos', 'Presenatcion', NULL),
(14, 'PROYECTO EDUCATIVO-CURRICULO', 'COMISION DE SEGURIDAD', 'no', 'OTROS', 'si', 'DEL SECTOR EMPRESARIAL', 'Richard Acosta Roman', '987854321', 'hola1@gmail.com', 'sugerencias', 'Good', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio6`
--

CREATE TABLE `inicio6` (
  `codigoNCF` varchar(50) NOT NULL,
  `solicitud` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `proceso` varchar(50) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `conclusion` varchar(255) DEFAULT NULL,
  `acciones` varchar(255) DEFAULT NULL,
  `responsable` varchar(50) DEFAULT NULL,
  `recursos` varchar(255) DEFAULT NULL,
  `tipoAccion` varchar(50) DEFAULT NULL,
  `fechaLimite` date DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `idproceso` int(8) NOT NULL,
  `descripcion` varchar(400) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`idproceso`, `descripcion`) VALUES
(0, 'PLANIFICACION ESTRATEGICA'),
(1, 'ORGANIZACION, DIRECCION Y CONTROL'),
(2, 'PROYECTO EDUCATIVO-CURRICULO'),
(3, 'ESTRATEGIAS DE ENSEÑANZA-APRENDIZAJE'),
(4, 'DESAROLLO DE LAS ACTIVIDADES DE ENSEÑANZA'),
(5, 'EVALUACION DEL APRENDIZAJE Y ACCIONES'),
(6, 'ESTUDIANTES Y EGRESADOS'),
(7, 'GENERACION Y EVALUACION DE PROYECTO'),
(8, 'LABOR DE ENSEÑANZA Y TUTORIA'),
(9, 'LABOR DE INVESTIGACION'),
(10, 'LABOR DE EXTENSION UNIVERSITARIA'),
(11, 'AMBIENTES Y EQUIPAMIENTO'),
(12, 'IMPLEMENTACION DE PROGRAMA DE BIENES'),
(13, 'FINANCIAMINETO DE LA IMPLEMENTACION'),
(14, 'VINCULACION CON LOS GRUPOS DE INTERES'),
(15, 'NUEVO PROCESO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisito`
--

CREATE TABLE `requisito` (
  `idrequisito` int(11) NOT NULL,
  `descripcion` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `requisito`
--

INSERT INTO `requisito` (`idrequisito`, `descripcion`) VALUES
(1, 'Puede emplearse en muy diversos ámbitos. Una oferta de trabajo puede establecer'),
(2, 'En ingeniería de sistemas se emplea el término requisito en un sentido análogo, como una condición'),
(3, 'La fase de captura, elicitación y registro de requisitos puede estar precedida por una fase de análisis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `idresponsable` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`idresponsable`, `nombre`, `apellidos`) VALUES
(1, 'Inocencio', 'Acosta Roman'),
(2, 'Imer', 'Mendoza Ezpinosa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seleccion`
--

CREATE TABLE `seleccion` (
  `idseleccion` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seleccion`
--

INSERT INTO `seleccion` (`idseleccion`, `descripcion`) VALUES
(1, 'ESTUDIANTE'),
(2, 'PERSONAL DOCENTE'),
(3, 'PERSONAL ADMINISTARTIVO'),
(4, 'PRESONAL DE SERVICIO'),
(5, 'JEFE DE DEPARTAMENTOS'),
(6, 'JEFE DE PRACTICAS Y LABORATORIOS'),
(7, 'OTROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `idtipo` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idtipo`, `descripcion`) VALUES
(1, 'AUDITORIA INTERNA'),
(2, 'QUEJA DEL CLIENTE'),
(3, 'HALLASCO DEL PERSONAL'),
(4, 'CONTROL DE PROCESOS'),
(5, 'REVISIONES POR LA ALTA'),
(6, 'OTROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_log`
--

CREATE TABLE `usuario_log` (
  `usuario` varchar(40) NOT NULL,
  `clave` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_log`
--

INSERT INTO `usuario_log` (`usuario`, `clave`) VALUES
('criss', 0),
('Inocencio', 1234),
('Imer', 12345),
('Yon', 12345678);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_login`
--

CREATE TABLE `usuario_login` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `clave` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_login`
--

INSERT INTO `usuario_login` (`id`, `usuario`, `clave`) VALUES
(1, 'inocencio', '1234'),
(2, 'criss', '12345'),
(19, '', ''),
(20, '', ''),
(21, 'bby', '1234'),
(22, '', ''),
(23, '', ''),
(24, '', ''),
(25, '', ''),
(26, '', ''),
(27, 'yon', '0000'),
(28, 'yon', '0000'),
(29, 'hello', '1234'),
(30, 'hello', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idcargo`),
  ADD UNIQUE KEY `idcargo` (`idcargo`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`idcargo`);

--
-- Indices de la tabla `certificacion`
--
ALTER TABLE `certificacion`
  ADD PRIMARY KEY (`idcertificacion`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idDireccion`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idgrupo`);

--
-- Indices de la tabla `inicio1`
--
ALTER TABLE `inicio1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inicio2`
--
ALTER TABLE `inicio2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inicio3`
--
ALTER TABLE `inicio3`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idproceso` (`idproceso`);

--
-- Indices de la tabla `inicio6`
--
ALTER TABLE `inicio6`
  ADD PRIMARY KEY (`codigoNCF`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`idproceso`);

--
-- Indices de la tabla `requisito`
--
ALTER TABLE `requisito`
  ADD PRIMARY KEY (`idrequisito`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`idresponsable`);

--
-- Indices de la tabla `seleccion`
--
ALTER TABLE `seleccion`
  ADD PRIMARY KEY (`idseleccion`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idtipo`);

--
-- Indices de la tabla `usuario_log`
--
ALTER TABLE `usuario_log`
  ADD PRIMARY KEY (`clave`);

--
-- Indices de la tabla `usuario_login`
--
ALTER TABLE `usuario_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `idcargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `inicio1`
--
ALTER TABLE `inicio1`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `inicio2`
--
ALTER TABLE `inicio2`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `inicio3`
--
ALTER TABLE `inicio3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `usuario_login`
--
ALTER TABLE `usuario_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
