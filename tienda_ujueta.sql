-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2024 a las 04:00:49
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_ujueta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Precio` varchar(1000) NOT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`Id`, `Nombre`, `Descripcion`, `Precio`, `Stock`) VALUES
(1, 'Laptop', 'Computadora portátil de última generación', '999.9999', 15),
(2, 'Mouse', 'Ratón inalámbrico', '10.0000', 50),
(3, 'Teclado', 'Teclado mecánico retroiluminado', '1.0000', 30),
(7, 'xiaomi', 'bueno', '1.000.000', 2),
(11, 'pc', 'jaaaaaaa', '0.0000', 3),
(87, 'celular', 'es una celular de buen rendimiento 8gb y 16 de ram', '100.000', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Id`, `Nombre`, `Apellido`, `Estado`, `FechaNacimiento`) VALUES
(1, 'junior', 'Florez', 'inaptivo', '2024-12-21'),
(2, 'junior', 'Florez', 'inaptivo', '2024-12-21'),
(3, 'junior', 'gutierrez', 'activo', '2024-12-21'),
(10, 'junior', 'Florezzjaaaaaaaaaaajajaja', 'inaptivo', '2024-12-21'),
(11, 'junior', 'Florezz', 'inaptivo', '2024-12-21'),
(19, 'Jhonatan1', 'Florez fernandez', 'Activoooooo', '2024-12-28'),
(83, 'juana', 'florez', 'Activo', '2024-12-28'),
(84, 'juanes', 'sanchez', 'Activo', '2024-12-13'),
(87, 'carlos', 'de la hoz', 'Activo', '2024-12-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedidos`
--

CREATE TABLE `detallepedidos` (
  `IdLinea` int(11) NOT NULL,
  `IdPedido` int(11) NOT NULL,
  `IdArticulo` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `TotalLinea` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallepedidos`
--

INSERT INTO `detallepedidos` (`IdLinea`, `IdPedido`, `IdArticulo`, `Cantidad`, `TotalLinea`) VALUES
(1, 1, 1, 1, 1200.50),
(2, 1, 2, 2, 50.99),
(3, 2, 3, 1, 75.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `Id` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `Comentario` text DEFAULT NULL,
  `FechaCreacion` datetime DEFAULT current_timestamp(),
  `TotalPedido` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`Id`, `IdCliente`, `Estado`, `Comentario`, `FechaCreacion`, `TotalPedido`) VALUES
(1, 1, 'Pendiente', 'Pedido en proceso', '2024-11-29 23:14:00', 1251.49),
(2, 2, 'Completado', 'Entregado correctamente', '2024-11-29 23:14:00', 50.99),
(3, 3, 'Cancelado', 'Cliente canceló el pedido', '2024-11-29 23:14:00', 0.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `detallepedidos`
--
ALTER TABLE `detallepedidos`
  ADD PRIMARY KEY (`IdLinea`),
  ADD KEY `IdPedido` (`IdPedido`),
  ADD KEY `IdArticulo` (`IdArticulo`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdCliente` (`IdCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `detallepedidos`
--
ALTER TABLE `detallepedidos`
  MODIFY `IdLinea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepedidos`
--
ALTER TABLE `detallepedidos`
  ADD CONSTRAINT `detallepedidos_ibfk_1` FOREIGN KEY (`IdPedido`) REFERENCES `pedidos` (`Id`),
  ADD CONSTRAINT `detallepedidos_ibfk_2` FOREIGN KEY (`IdArticulo`) REFERENCES `articulos` (`Id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
