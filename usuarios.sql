-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2023 a las 01:48:11
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
(2, 'DECANO'),
(3, 'DECANO2'),
(4, 'JEFE DE DEPARTAMENTOS');

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
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `especialidades` varchar(255) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firma` varchar(255) DEFAULT NULL,
  `email1` varchar(100) DEFAULT NULL,
  `email2` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `hoja_de_vida` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombres`, `especialidades`, `celular`, `usuario`, `password`, `firma`, `email1`, `email2`, `direccion`, `hoja_de_vida`) VALUES
(2, 'Inocencio Acosta Roman', NULL, NULL, 'inocencio', '1234', NULL, NULL, NULL, NULL, NULL),
(3, 'Yon Espinioza Mendoza', NULL, NULL, 'yon', '1234', NULL, NULL, NULL, NULL, NULL),
(4, 'Luis Cajas Huaman', NULL, NULL, 'luis', '1234', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `id` int(11) NOT NULL,
  `detalle_cierre` text,
  `verificacion_implementacion` varchar(20) DEFAULT NULL,
  `fecha_implementacion` tinyint(1) DEFAULT NULL,
  `fecha_programa_cierre` tinyint(1) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `buscador_archivos` varchar(100) DEFAULT NULL,
  `detalle_sacp` text,
  `fecha_cierre` tinyint(1) DEFAULT NULL,
  `fecha_eficacia` varchar(20) DEFAULT NULL,
  `eficacia_correcta` tinyint(1) DEFAULT NULL,
  `acciones` text,
  `recursos` text,
  `responsable` varchar(50) DEFAULT NULL,
  `fecha_limite` date DEFAULT NULL,
  `descripcion` text,
  `conclusion_analisis` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'HALLASCO DEL PERSONAL', 'PROYECTO EDUCATIVO-CURRICULO', 'Me siento estafado', 'si', 'Imer Mendoza Espinoza', '2023-05-23', '3', '2023-05-27', 'no-conforme'),
(2, 'REVISIONES POR LA ALTA', 'IMPLEMENTACION DE PROGRAMA DE ', 'Buen servicio', 'Considerable', 'Inocencio Acosta Roman', '2023-05-27', '3', '2023-05-30', 'conforme'),
(3, 'QUEJA DEL CLIENTE', 'LABOR DE EXTENSION UNIVERSITAR', 'MÃ¡s eficiente', 'YES', 'Inocencio Acosta Roman', '2023-05-24', '2', '2023-05-25', 'no-conforme'),
(4, 'CONTROL DE PROCESOS', 'AMBIENTES Y EQUIPAMIENTO', 'Good', 'YES', 'Inocencio Acosta Roman', '2023-05-10', '', '2023-05-20', 'no-conforme');

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
(34, 'DESAROLLO DE LAS ACTIVIDADES DE ENSEï¿½ANZA', 'CBC-SUNEDU', 'IV.2 DOCENTES QUE REALIZAN INVESTIGACION', 'Apostar1', 'hello', 'hoydia', '2023-05-20'),
(43, 'PLANIFICACION ESTRATEGICA', 'CBC-SUNEDU', 'IV.1 LINEAS DE INVESTIGACION', 'Puede emplearse en muy diversos ï¿½mbitos. Una ofe', 'FYUD', 'HuÃ¡nuco', '2023-05-20'),
(44, 'ESTUDIANTES Y EGRESADOS', 'CBC-SUNEDU', 'IV.2 DOCENTES QUE REALIZAN INVESTIGACION', 'Puede emplearse en muy diversos ï¿½mbitos. Una ofe', 'good', 'Huanuco', '2023-05-20'),
(45, 'PROYECTO EDUCATIVO-CURRICULO', 'ISO-9001', 'IV.3 REGISTRO DE DOCUMENTOS Y INVESTIGACION', 'La fase de captura, elicitaciï¿½n y registro de re', 'insertado', 'Huanuco', '2023-05-28'),
(46, 'ORGANIZACION, DIRECCION Y CONTROL', 'ISO-9001', 'IV.2 DOCENTES QUE REALIZAN INVESTIGACION', 'La fase de captura, elicitaciï¿½n y registro de re', 'good', 'Huanuco', '2023-05-20'),
(47, 'ORGANIZACION, DIRECCION Y CONTROL', 'ISO-9001', 'IV.2 DOCENTES QUE REALIZAN INVESTIGACION', 'La fase de captura, elicitaciï¿½n y registro de re', 'good', 'Huanuco', '2023-05-20');

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
  `cargo` varchar(255) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `clasificacion` varchar(255) DEFAULT NULL,
  `comentario_descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `inicio3`
--

INSERT INTO `inicio3` (`id`, `proceso`, `direccion`, `parte`, `seleccion`, `externo`, `cargo`, `nombres`, `telefono`, `correo`, `clasificacion`, `comentario_descripcion`) VALUES
(11, 'PLANIFICACION ESTRATEGICA', 'COMISION DE PRACTICAS', 'si', 'PERSONAL DOCENTE', 'no', 'FUNCIONARIOS', 'Yonel Acosta Roman', '987654321', 'yonelacosta@gmail.com', 'reclamos', 'Presenatcion'),
(22, 'PLANIFICACION ESTRATEGICA', 'COMISION DE CALIDAD', 'no', 'ESTUDIANTE', 'no', 'PUBLICO EN GENERAL', 'Yon Acosta Roman', '997654321', 'yonacosta@gmail.com', 'sugerencias', 'excelente'),
(23, 'ESTUDIANTES Y EGRESADOS', 'COMISION DE PRACTICAS', 'no', 'JEFE DE DEPARTAMENTOS', 'no', 'DEL SECTOR EMPRESARIAL', 'Yon Acosta Roman', '997654321', 'yonacosta@gmail.com', 'reclamos', 'relax');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio6`
--

CREATE TABLE `inicio6` (
  `id` int(11) NOT NULL,
  `codigoNCF` varchar(50) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `inicio6`
--

INSERT INTO `inicio6` (`id`, `codigoNCF`, `solicitud`, `tipo`, `proceso`, `descripcion`, `conclusion`, `acciones`, `responsable`, `recursos`, `tipoAccion`, `fechaLimite`, `categoria`) VALUES
(12, '1000PK', '3000R', 'HALLASCO DEL PERSONAL', 'FINANCIAMINETO DE LA IMPLEMENTACION', 'JEFE DE DEPARTAMENTOS', 'Saludos1', 'HA002', 'Imer Mendoza Espinoza', 'Dado', 'AC', '2023-05-21', NULL),
(13, '1000PK', '3000R', 'CONTROL DE PROCESOS', 'VINCULACION CON LOS GRUPOS DE INTERES', 'DECANO1', 'Saludos2', 'Saludar', 'Inocencio Acosta Roman', '89775', 'AC', '2023-05-27', NULL),
(14, '1001PK', '3001R', 'CONTROL DE PROCESOS', 'IMPLEMENTACION DE PROGRAMA DE BIENES', 'mas orden', 'ordenamineto', 'HA001', 'Imer Mendoza Espinoza', '-Solicitud', 'AC', '2023-05-28', NULL),
(18, '', '', 'AUDITORIA INTERNA', 'PLANIFICACION ESTRATEGICA', '', '', '', 'Inocencio Acosta Roman', '', '', '0000-00-00', NULL),
(19, '1000PK', '3000R', 'HALLASCO DEL PERSONAL', 'VINCULACION CON LOS GRUPOS DE INTERES', 'DECANO2', 'Saludos1', 'HA002', 'Imer Mendoza Espinoza', '89775', 'AP', '2023-05-28', NULL);

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
  `nombres` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`idresponsable`, `nombres`) VALUES
(1, 'Inocencio Acosta Roman'),
(2, 'Imer Mendoza Espinoza');

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
-- Estructura de tabla para la tabla `tabla3`
--

CREATE TABLE `tabla3` (
  `id` int(11) NOT NULL,
  `empleado` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `proceso` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tabla3`
--

INSERT INTO `tabla3` (`id`, `empleado`, `cargo`, `proceso`) VALUES
(2, 'Inocencio Acosta Roman', 'STF', 'Educacion'),
(3, 'Yon Acosta Roman', 'Analista', 'Educacion1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla4`
--

CREATE TABLE `tabla4` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `codificacion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tabla4`
--

INSERT INTO `tabla4` (`id`, `descripcion`, `categoria`, `codificacion`) VALUES
(4, 'JEFE DE DEPARTAMENTOS', 'Desarollo1', 'DES-ARE1'),
(5, 'JEFE DE DEPARTAMENTOS', 'Desarollo WEb', 'DES-WEb'),
(6, 'DECANO', 'Desarollo', 'DES-ARE'),
(7, 'DECANO1', 'Desarollo', 'DES-WEb');

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
(27, 'yon', '0000'),
(30, 'hello', '1234'),
(31, 'yonar', '1234'),
(32, 'yonar', '1234'),
(33, 'yonar', '1234'),
(34, 'yonar', '1234'),
(35, 'yonar', '1234'),
(36, '', ''),
(37, '', ''),
(38, '', ''),
(39, '', ''),
(40, '', ''),
(41, 'juan', '4545'),
(42, '', ''),
(43, '', ''),
(44, '', ''),
(45, '', ''),
(46, '', ''),
(47, '', ''),
(48, '', ''),
(49, 'LUIS', '0000');

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
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inicio6`
--
ALTER TABLE `inicio6`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `tabla3`
--
ALTER TABLE `tabla3`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tabla4`
--
ALTER TABLE `tabla4`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `idcargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inicio1`
--
ALTER TABLE `inicio1`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `inicio2`
--
ALTER TABLE `inicio2`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT de la tabla `inicio3`
--
ALTER TABLE `inicio3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `inicio6`
--
ALTER TABLE `inicio6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `tabla3`
--
ALTER TABLE `tabla3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tabla4`
--
ALTER TABLE `tabla4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuario_login`
--
ALTER TABLE `usuario_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
