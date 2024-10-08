-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2023 a las 06:33:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `olivos_nicolas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'SAMSUNG'),
(2, 'APPLE'),
(3, 'MOTOROLA'),
(4, 'XIAOMI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_persona` int(11) NOT NULL,
  `nombre_consulta` varchar(50) NOT NULL,
  `apellido_consulta` varchar(50) NOT NULL,
  `email_consulta` varchar(30) NOT NULL,
  `celular_consulta` varchar(60) NOT NULL,
  `mensaje_consulta` text NOT NULL,
  `estado_consulta` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_persona`, `nombre_consulta`, `apellido_consulta`, `email_consulta`, `celular_consulta`, `mensaje_consulta`, `estado_consulta`) VALUES
(3, 'juan', 'casemiro', 'casejuan@gmail.com', '12345678', 'Trabajan feriados?', 'NO'),
(4, 'gera', 'agustin', 'gera@gmail.com', '123456789', 'Horarios de atención?', 'NO'),
(5, 'pepe', 'rios', 'pepe@gmail.com', '987654321', 'Aceptan dolares?', 'SI'),
(6, 'luis', 'red', 'red@gmail.com', '1234567891', 'hola', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `descripcion`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_prod` varchar(100) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `precio_vta` float(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `eliminado` varchar(20) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_prod`, `imagen`, `categoria_id`, `precio`, `precio_vta`, `stock`, `stock_min`, `eliminado`) VALUES
(7, 'Celular Samsung A12', '1686374638_47b6eaa2f1b6c6553d7b.jpg', 1, 60000.00, 70000.00, 16, 5, 'NO'),
(8, 'Samsung a52  128GB', '1686777097_365aee83a14a2d62160b.jpg', 4, 175000.00, 190000.00, 10, 5, 'NO'),
(9, 'Samsung S22 ultra ', '1686374563_d8b55a85c7de6e13fa21.jpg', 1, 260000.00, 280000.00, 20, 5, 'NO'),
(10, 'Apple Iphone 13 PRO 128GB', '1686474749_937b453d7f4b389e53a8.jpg', 2, 530000.00, 560000.00, 8, 5, 'NO'),
(11, 'Apple Iphone 12 púrpura 128GB', '1686474245_10cb2b190c240c23bbbc.jfif', 2, 400000.00, 430000.00, 9, 4, 'NO'),
(12, 'Iphone X 64GB', '1686374817_b0a92e5a9932e8a824cf.webp', 2, 170000.00, 200000.00, 15, 5, 'NO'),
(13, 'Motorola Edge 30PRO', '1686374897_d32089aede7657eb554b.jpg', 3, 330000.00, 360000.00, 10, 4, 'NO'),
(14, 'Motorola G200 5G 128GB', '1686374971_c42051470388901588a8.jpg', 3, 120000.00, 165000.00, 10, 4, 'NO'),
(15, 'Motorola G60s ', '1686375182_ab7cd41c125ec4fec4fc.jpg', 3, 80000.00, 90000.00, 14, 5, 'NO'),
(16, 'Xiaomi MI 11 PRO 5G 128GB', '1686776938_242dabd61fd9ee889619.jpg', 4, 175000.00, 190000.00, 0, 5, 'NO'),
(17, 'Xiaomi Redmi Note 10s 128GB', '1686474101_51b24513bb00fa5d9854.jpg', 4, 140000.00, 160000.00, 10, 4, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `baja` varchar(2) DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `email`, `pass`, `perfil_id`, `baja`) VALUES
(44, 'Jose', 'Perez', 'jeypi', 'jPe@hotmail.com', '$2y$10$Cx7zfu08IRopRt4zqTlK.O2BYQeSE2MM0YETtvI5bKQ/9XvoBJiH2', 2, 'NO'),
(45, 'Nicolas', 'Olivos', 'nico', 'nicooli@gmail.com', '$2y$10$pDbfQt60FZ53KLDtk4hszuYW0C4G3stuRhC.qshVRulJvD4F/hL72', 1, 'NO'),
(47, 'luis', 'esca', 'les', 'luis@gmail.com', '$2y$10$Y7wchxKzFSGdEpsYE80iB.vbgdW.Dlfh6qJrOaZO5MMKOOh8a8pxu', 2, 'NO'),
(59, 'juan', 'casemiro', 'juan', 'casejuan@gmail.com', '$2y$10$qLVUH1UwUjSr3/vNSz61t.FV7S4BgPt5vBpT4rhffQ93x8pae3Hme', 2, 'NO'),
(60, 'marcela', 'lopez', 'marce', 'marcela@gmail.com', '$2y$10$A0nZsJ/GKk1DjA5px3lM9.vgVf1fyIT38nHIxi9lhR.WlAE2Otud2', 2, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_cabecera`
--

CREATE TABLE `ventas_cabecera` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha_venta` datetime NOT NULL,
  `total_venta` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas_cabecera`
--

INSERT INTO `ventas_cabecera` (`id`, `id_cliente`, `fecha_venta`, `total_venta`) VALUES
(45, 44, '2023-06-24 00:00:00', 70000.00),
(46, 44, '2023-06-24 00:00:00', 710000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `detalle_cantidad` int(11) NOT NULL,
  `detalle_precio` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id`, `id_venta`, `id_producto`, `detalle_cantidad`, `detalle_precio`) VALUES
(13, 45, 7, 1, 70000.00),
(14, 46, 11, 1, 430000.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- Indices de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id_perfil`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD CONSTRAINT `ventas_cabecera_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD CONSTRAINT `ventas_detalle_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `ventas_detalle_ibfk_3` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `ventas_detalle_ibfk_4` FOREIGN KEY (`id_venta`) REFERENCES `ventas_cabecera` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
