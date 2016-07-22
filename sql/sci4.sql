-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2016 a las 17:37:39
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sci`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorio`
--

CREATE TABLE `accesorio` (
  `acc_id` int(11) NOT NULL,
  `ser_id` int(11) NOT NULL,
  `pie_id` int(11) NOT NULL,
  `acc_observacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `accesorio`
--

INSERT INTO `accesorio` (`acc_id`, `ser_id`, `pie_id`, `acc_observacion`) VALUES
(1, 1, 1, ' '),
(2, 1, 2, 'ss');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `car_id` int(11) NOT NULL,
  `car_descripcion` varchar(50) NOT NULL,
  `car_abreviatura` varchar(20) NOT NULL,
  `car_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`car_id`, `car_descripcion`, `car_abreviatura`, `car_estado`) VALUES
(1, 'Tecnico', 'Tec.', 1),
(2, 'Vendedor', 'Vend.', 1),
(3, 'Dispositivo de Almacenamiento', '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_problema`
--

CREATE TABLE `categoria_problema` (
  `catpro_id` int(11) NOT NULL,
  `catpro_descripcion` varchar(100) NOT NULL,
  `catpro_abreviatura` varchar(20) DEFAULT NULL,
  `catpro_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria_problema`
--

INSERT INTO `categoria_problema` (`catpro_id`, `catpro_descripcion`, `catpro_abreviatura`, `catpro_estado`) VALUES
(1, 'Pantalla rota', '', 1),
(2, 'Mantenimiento', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cli_id` int(11) NOT NULL,
  `cli_dni` varchar(11) NOT NULL,
  `cli_nombre` varchar(100) NOT NULL,
  `cli_direccion` varchar(100) DEFAULT NULL,
  `cli_telefono` varchar(12) DEFAULT NULL,
  `cli_email` varchar(50) DEFAULT NULL,
  `cli_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cli_id`, `cli_dni`, `cli_nombre`, `cli_direccion`, `cli_telefono`, `cli_email`, `cli_estado`) VALUES
(1, '73031935', 'Nombre Cliente ', 'Direccion Cliente', '973949945', 'correocliente@.com', 1),
(2, '12345678', 'cliente dos', 'su casa', '973949944', 'colbersi@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `mar_id` int(11) NOT NULL,
  `mar_descripcion` varchar(50) NOT NULL,
  `mar_abreviatura` varchar(20) DEFAULT NULL,
  `mar_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`mar_id`, `mar_descripcion`, `mar_abreviatura`, `mar_estado`) VALUES
(1, 'Apple', 'Apple', 1),
(2, 'Hewlett-Packard ', 'HP', 1),
(3, 'Samsung', 'Samsung', 1),
(4, 'Dell', 'Dell', 1),
(5, 'ACER', 'ACER', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `per_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `per_dni` int(11) NOT NULL,
  `per_nombre` varchar(50) NOT NULL,
  `per_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`per_id`, `car_id`, `per_dni`, `per_nombre`, `per_estado`) VALUES
(1, 1, 87467234, 'Pepe Vasquez', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pieza`
--

CREATE TABLE `pieza` (
  `pie_id` int(11) NOT NULL,
  `pie_nombre` varchar(50) NOT NULL,
  `pie_descripcion` varchar(100) NOT NULL,
  `tipie_id` int(11) NOT NULL,
  `pie_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pieza`
--

INSERT INTO `pieza` (`pie_id`, `pie_nombre`, `pie_descripcion`, `tipie_id`, `pie_estado`) VALUES
(1, 'Teclado', 'Teclado SF', 1, 1),
(2, 'Disco Duros', 'Disco Duro Sata', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `problema`
--

CREATE TABLE `problema` (
  `pro_id` int(11) NOT NULL,
  `ser_id` int(11) NOT NULL,
  `catpro_id` int(11) NOT NULL,
  `pro_descripcion` text NOT NULL,
  `pro_fecha` datetime NOT NULL,
  `pro_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `problema`
--

INSERT INTO `problema` (`pro_id`, `ser_id`, `catpro_id`, `pro_descripcion`, `pro_fecha`, `pro_estado`) VALUES
(1, 1, 2, 'sss', '2016-07-20 14:10:10', 0),
(2, 1, 1, ' ', '2016-07-20 14:10:10', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuesto`
--

CREATE TABLE `repuesto` (
  `rep_id` int(11) NOT NULL,
  `sol_id` int(11) NOT NULL,
  `pie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `ser_id` int(11) NOT NULL,
  `ser_cliente` int(11) NOT NULL,
  `ser_codigo` varchar(30) NOT NULL,
  `ser_tipo_equipo` int(11) NOT NULL,
  `ser_marca` int(11) NOT NULL,
  `ser_modelo` varchar(50) DEFAULT NULL,
  `ser_descripcion` text,
  `ser_estado_recepcion` int(11) DEFAULT NULL,
  `ser_estado_servicio` int(11) NOT NULL DEFAULT '1',
  `ser_fecha_recepcion` datetime NOT NULL,
  `ser_fecha_entrega` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`ser_id`, `ser_cliente`, `ser_codigo`, `ser_tipo_equipo`, `ser_marca`, `ser_modelo`, `ser_descripcion`, `ser_estado_recepcion`, `ser_estado_servicio`, `ser_fecha_recepcion`, `ser_fecha_entrega`) VALUES
(1, 1, '73031935-1', 1, 1, 'LTXX12', ' Equipo en Buen estado', NULL, 1, '2016-07-20 14:10:10', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solucion`
--

CREATE TABLE `solucion` (
  `sol_id` int(11) NOT NULL,
  `ser_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `sol_estado` int(11) NOT NULL,
  `sol_descripcion` text,
  `sol_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipo`
--

CREATE TABLE `tipo_equipo` (
  `tipequ_id` int(11) NOT NULL,
  `tipequ_descripcion` varchar(50) NOT NULL,
  `tipequ_abreviatura` varchar(20) DEFAULT NULL,
  `tipequ_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_equipo`
--

INSERT INTO `tipo_equipo` (`tipequ_id`, `tipequ_descripcion`, `tipequ_abreviatura`, `tipequ_estado`) VALUES
(1, 'Computadora de Escritorio', 'PC', 1),
(2, 'Laptop Portatil', 'Portatil', 1),
(3, 'Impresora', 'Impresora', 1),
(4, '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pieza`
--

CREATE TABLE `tipo_pieza` (
  `tipie_id` int(11) NOT NULL,
  `tipie_nombre` varchar(50) NOT NULL,
  `tipie_descripcion` varchar(100) NOT NULL,
  `tipie_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_pieza`
--

INSERT INTO `tipo_pieza` (`tipie_id`, `tipie_nombre`, `tipie_descripcion`, `tipie_estado`) VALUES
(1, 'E/S', 'Dispositivo de Entrada y Salida', 1),
(2, 'ALMACENAMIENTO', 'Dispositivo de Almacenamiento', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_name` varchar(50) NOT NULL,
  `usu_password` varchar(100) NOT NULL,
  `usu_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_name`, `usu_password`, `usu_estado`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesorio`
--
ALTER TABLE `accesorio`
  ADD PRIMARY KEY (`acc_id`);

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
-- Indices de la tabla `pieza`
--
ALTER TABLE `pieza`
  ADD PRIMARY KEY (`pie_id`);

--
-- Indices de la tabla `problema`
--
ALTER TABLE `problema`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indices de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  ADD PRIMARY KEY (`rep_id`);

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
-- Indices de la tabla `tipo_pieza`
--
ALTER TABLE `tipo_pieza`
  ADD PRIMARY KEY (`tipie_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesorio`
--
ALTER TABLE `accesorio`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `categoria_problema`
--
ALTER TABLE `categoria_problema`
  MODIFY `catpro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `mar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pieza`
--
ALTER TABLE `pieza`
  MODIFY `pie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `problema`
--
ALTER TABLE `problema`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `solucion`
--
ALTER TABLE `solucion`
  MODIFY `sol_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  MODIFY `tipequ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_pieza`
--
ALTER TABLE `tipo_pieza`
  MODIFY `tipie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
