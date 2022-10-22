-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2022 a las 04:46:55
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `notime2waste`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Id_Clientes` int(11) NOT NULL,
  `Nombres_Cliente` varchar(50) NOT NULL,
  `Apellidos_Cliente` varchar(50) NOT NULL,
  `NumeroCelular_Cliente` varchar(8) NOT NULL,
  `Email_Cliente` varchar(70) NOT NULL,
  `Password_Cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Id_Clientes`, `Nombres_Cliente`, `Apellidos_Cliente`, `NumeroCelular_Cliente`, `Email_Cliente`, `Password_Cliente`) VALUES
(13, 'Andrews', 'Ivar', '72746533', 'andand@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e'),
(14, 'Andrews', 'Ivar', '72746533', 'asdasdasd@gmail.com', 'c55d52d0b68a73e44dd7dc6bd0381b47'),
(15, 'Jose', 'Juan', '78912345', 'juan@gmail.com', 'a83f0f76c2afad4f5d7260824430b798');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `Id_Comentario` int(11) NOT NULL,
  `Descripcion_Comentario` varchar(200) NOT NULL,
  `Puntuacion_Sobre10` int(11) NOT NULL,
  `Id_Cliente` int(11) NOT NULL,
  `Id_Establecimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `Id_Detalle` int(11) NOT NULL,
  `Fecha_Vendido` date NOT NULL,
  `Numero_Producto` int(11) NOT NULL,
  `hora_Vendido` time NOT NULL,
  `Id_Producto` int(11) NOT NULL,
  `Id_Recibo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento`
--

CREATE TABLE `establecimiento` (
  `Id_Establecimiento` int(11) NOT NULL,
  `Nombres_Establecimiento` varchar(50) NOT NULL,
  `Direccion_Establecimiento` varchar(150) NOT NULL,
  `Nombre_Encargado` varchar(50) NOT NULL,
  `Apellidos_Encargado` varchar(50) NOT NULL,
  `NumeroCelular_Encargado` varchar(8) NOT NULL,
  `Email_Encargado` varchar(70) NOT NULL,
  `Password_Encargado` varchar(50) NOT NULL,
  `Permiso` tinyint(1) NOT NULL,
  `Calificacion` int(11) DEFAULT NULL,
  `Logo` blob DEFAULT NULL,
  `Descripcion_Establecimiento` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id_Producto` int(11) NOT NULL,
  `Nombres_Producto` varchar(50) NOT NULL,
  `Descripcion_Producto` varchar(200) NOT NULL,
  `Tiempo_Disponible` time NOT NULL,
  `Cantidad_Producto` int(11) NOT NULL,
  `Precio_Producto` float NOT NULL,
  `Imagen_Producto` blob NOT NULL,
  `Disponible_Producto` tinyint(1) NOT NULL,
  `Id_Establecimiento` int(11) NOT NULL,
  `Id_Sucursal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE `recibo` (
  `Id_Recibo` int(11) NOT NULL,
  `MontoTotal_Recibo` float NOT NULL,
  `Id_Clientes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `Id_Sucursal` int(11) NOT NULL,
  `direccionSucursal` varchar(150) NOT NULL,
  `Telefono_Sucursal` varchar(8) NOT NULL,
  `Id_Establecimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id_Clientes`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`Id_Comentario`),
  ADD KEY `Id_Cliente` (`Id_Cliente`),
  ADD KEY `Id_Establecimiento` (`Id_Establecimiento`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`Id_Detalle`),
  ADD KEY `Id_Producto` (`Id_Producto`),
  ADD KEY `Id_Recibo` (`Id_Recibo`);

--
-- Indices de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD PRIMARY KEY (`Id_Establecimiento`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id_Producto`),
  ADD KEY `Id_Establecimiento` (`Id_Establecimiento`),
  ADD KEY `Id_Sucursal` (`Id_Sucursal`);

--
-- Indices de la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`Id_Recibo`),
  ADD KEY `Id_Clientes` (`Id_Clientes`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`Id_Sucursal`),
  ADD KEY `Id_Establecimiento` (`Id_Establecimiento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id_Clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `Id_Comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `Id_Detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  MODIFY `Id_Establecimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `recibo`
--
ALTER TABLE `recibo`
  MODIFY `Id_Recibo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `Id_Sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`Id_Cliente`) REFERENCES `clientes` (`Id_Clientes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`Id_Establecimiento`) REFERENCES `establecimiento` (`Id_Establecimiento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`Id_Producto`) REFERENCES `producto` (`Id_Producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`Id_Recibo`) REFERENCES `recibo` (`Id_Recibo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Id_Establecimiento`) REFERENCES `establecimiento` (`Id_Establecimiento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`Id_Sucursal`) REFERENCES `sucursal` (`Id_Sucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD CONSTRAINT `recibo_ibfk_1` FOREIGN KEY (`Id_Clientes`) REFERENCES `clientes` (`Id_Clientes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`Id_Establecimiento`) REFERENCES `establecimiento` (`Id_Establecimiento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
