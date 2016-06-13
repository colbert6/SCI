-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2016 a las 16:47:28
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sci`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
`car_id` int(11) NOT NULL,
  `car_descripcion` varchar(50) NOT NULL,
  `car_abreviatura` varchar(20) NOT NULL,
  `car_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`car_id`, `car_descripcion`, `car_abreviatura`, `car_estado`) VALUES
(1, 'Tecnico', 'Tec.', 1),
(2, 'Vendedor', 'Vend.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_problema`
--

CREATE TABLE IF NOT EXISTS `categoria_problema` (
`catpro_id` int(11) NOT NULL,
  `catpro_descripcion` varchar(100) NOT NULL,
  `catpro_abreviatura` varchar(20) DEFAULT NULL,
  `catpro_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`cli_id` int(11) NOT NULL,
  `cli_dni` varchar(11) NOT NULL,
  `cli_nombre` varchar(100) NOT NULL,
  `cli_direccion` varchar(100) DEFAULT NULL,
  `cli_telefono` varchar(12) DEFAULT NULL,
  `cli_email` varchar(50) DEFAULT NULL,
  `cli_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
`mar_id` int(11) NOT NULL,
  `mar_descripcion` varchar(50) NOT NULL,
  `mar_abrevitura` varchar(20) DEFAULT NULL,
  `mar_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
`per_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `per_dni` int(11) NOT NULL,
  `per_nombre` int(11) NOT NULL,
  `per_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `problema`
--

CREATE TABLE IF NOT EXISTS `problema` (
`pro_id` int(11) NOT NULL,
  `ser_id` int(11) NOT NULL,
  `catpro_id` int(11) NOT NULL,
  `pro_descripcion` text NOT NULL,
  `pro_fecha` datetime NOT NULL,
  `pro_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE IF NOT EXISTS `servicio` (
`ser_id` int(11) NOT NULL,
  `ser_codigo` varchar(30) NOT NULL,
  `ser_tipo_equipo` int(11) NOT NULL,
  `ser_marca` int(11) NOT NULL,
  `ser_modelo` varchar(50) DEFAULT NULL,
  `ser_descripcion` text,
  `ser_accesorio` text,
  `ser_estado_recepcion` int(11) NOT NULL,
  `ser_estado_servicio` int(11) NOT NULL,
  `ser_fecha_recepcion` datetime NOT NULL,
  `ser_fecha_entrega` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solucion`
--

CREATE TABLE IF NOT EXISTS `solucion` (
`sol_id` int(11) NOT NULL,
  `ser_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `sol_estado` int(11) NOT NULL,
  `sol_descripcion` text,
  `sol_agregados` text,
  `sol_fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipo`
--

CREATE TABLE IF NOT EXISTS `tipo_equipo` (
`tipequ_id` int(11) NOT NULL,
  `tipequ_descripcion` varchar(50) NOT NULL,
  `tipequ_abreviatura` varchar(20) DEFAULT NULL,
  `tipequ_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`usu_id` int(11) NOT NULL,
  `usu_name` varchar(50) NOT NULL,
  `usu_password` varchar(100) NOT NULL,
  `usu_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_name`, `usu_password`, `usu_estado`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
 ADD PRIMARY KEY (`car_id`);

--
-- Indices de la tabla `categoria_problema`
--
ALTER TABLE `categoria_problema`
 ADD PRIMARY KEY (`catpro_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`cli_id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
 ADD PRIMARY KEY (`mar_id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
 ADD PRIMARY KEY (`per_id`);

--
-- Indices de la tabla `problema`
--
ALTER TABLE `problema`
 ADD PRIMARY KEY (`pro_id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
 ADD PRIMARY KEY (`ser_id`);

--
-- Indices de la tabla `solucion`
--
ALTER TABLE `solucion`
 ADD PRIMARY KEY (`sol_id`);

--
-- Indices de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
 ADD PRIMARY KEY (`tipequ_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `categoria_problema`
--
ALTER TABLE `categoria_problema`
MODIFY `catpro_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
MODIFY `mar_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `problema`
--
ALTER TABLE `problema`
MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `solucion`
--
ALTER TABLE `solucion`
MODIFY `sol_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
MODIFY `tipequ_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
