-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2025 a las 12:23:04
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
-- Base de datos: `tfg_pablo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `id_usuario` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `fecha_limite` date NOT NULL,
  `pago` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_usuario`, `id_producto`, `fecha_compra`) VALUES
(2, 2, '2025-02-11'),
(3, 3, '2025-02-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `tipo_equipo` enum('Ordenador','VR','Consolas') NOT NULL,
  `estado` enum('Disponible','Ocupado') NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `puntos_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `tipo_equipo`, `estado`, `precio`, `puntos_equipo`) VALUES
(1, 'Ordenador', 'Disponible', 5.00, 10),
(2, 'VR', 'Ocupado', 7.00, 15),
(3, 'Consolas', 'Disponible', 4.00, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `nombre_evento` varchar(100) NOT NULL,
  `tipo_evento` varchar(50) NOT NULL,
  `fecha_evento` date NOT NULL,
  `premio` varchar(100) DEFAULT NULL,
  `patrocinadores` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_evento`, `nombre_evento`, `tipo_evento`, `fecha_evento`, `premio`, `patrocinadores`) VALUES
(1, 'Torneo FIFA', 'Videojuegos', '2025-03-15', 'Trofeo + 100 puntos', 'Sony'),
(2, 'Concurso VR', 'Realidad Virtual', '2025-03-28', '200€', 'Oculuss'),
(3, 'Torneo FIFA', 'Videojuegos', '2025-03-21', 'Trofeo + 100 puntos', 'Soni'),
(4, 'Concurso VR', 'Realidad Virtual', '2025-04-20', 'Casco VR', 'Oculus'),
(5, 'Competencia eSports', 'Videojuegos', '2025-06-10', 'Medalla + $3000', 'Razer'),
(6, 'Carrera de Drones', 'Tecnología', '2025-07-05', 'Drone Profesional', 'DJI'),
(7, 'Torneo de Smash', 'Videojuegos', '2025-08-12', 'Trofeo + Suscripción Online', 'Nintendo'),
(13, 'maite', 'videojuegos', '2025-03-04', '100€', 'Sony');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscribe`
--

CREATE TABLE `inscribe` (
  `id_usuario` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `inscribe`
--

INSERT INTO `inscribe` (`id_usuario`, `id_evento`) VALUES
(2, 2),
(3, 1),
(13, 1),
(13, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `metodo` varchar(50) NOT NULL,
  `estado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `id_usuario`, `cantidad`, `metodo`, `estado`) VALUES
(1, 1, 50.00, 'Tarjeta de crédito', 1),
(2, 2, 30.00, 'Paypal', 1),
(3, 3, 20.00, 'Efectivo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `precio_producto` decimal(10,2) NOT NULL,
  `tipo_producto` enum('Equipo','Accesorios','Juegos','Consolas') NOT NULL,
  `puntos_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `precio_producto`, `tipo_producto`, `puntos_compra`) VALUES
(2, 'Xbox Series X', 499.99, 'Consolas', 500),
(3, 'Monitor Gaming', 299.99, '', 300),
(4, 'PlayStation 5', 499.99, 'Consolas', 500),
(5, 'Xbox Series X', 499.99, 'Consolas', 500),
(6, 'Monitor Gaming', 299.99, '', 300),
(7, 'Nintendo Switch', 299.99, 'Consolas', 300),
(8, 'Teclado Mecánico', 89.99, '', 90),
(9, 'Ratón Gaming', 59.99, '', 60),
(10, 'Auriculares Inalámbricos', 129.99, 'Equipo', 130),
(11, 'Proyector 4K', 399.99, 'Equipo', 400),
(12, 'Smart TV 55\"', 699.99, 'Equipo', 700),
(13, 'Tablet Android', 199.99, 'Equipo', 200),
(14, 'wi', 80.00, 'Consolas', 40),
(17, 'agch', 1000.00, 'Equipo', 101);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_usuario` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `horaIni` time NOT NULL,
  `horaFin` time NOT NULL,
  `snack` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_usuario`, `id_equipo`, `fecha_reserva`, `horaIni`, `horaFin`, `snack`) VALUES
(2, 2, '2025-03-02', '00:00:00', '00:00:00', 0),
(3, 3, '2025-03-03', '00:00:00', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `DNI` varchar(20) DEFAULT NULL,
  `pass_usuario` varchar(255) NOT NULL,
  `tipo_usuario` enum('Admin','Vip','Normal') NOT NULL DEFAULT 'Normal',
  `puntos_usuario` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `DNI`, `pass_usuario`, `tipo_usuario`, `puntos_usuario`) VALUES
(1, 'Juan Pérez', '12345678A', 'pass123', 'Admin', 100),
(2, 'María López', '87654321B', 'pass456', 'Vip', 200),
(3, 'Carlos García', '45612378C', 'pass789', 'Normal', 50),
(13, 'Pablo', '75570672D', '12345', 'Normal', 0),
(14, 'AGCH', '11111111D', '12345', 'Normal', 0),
(15, 'Maite', '11111112D', '12345', 'Normal', 0),
(16, 'Pepe', '12121212D', '12345', 'Normal', 0),
(17, 'Manu', '12345678D', '12345', 'Normal', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_usuario`,`id_producto`,`fecha_compra`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `inscribe`
--
ALTER TABLE `inscribe`
  ADD PRIMARY KEY (`id_usuario`,`id_evento`),
  ADD KEY `id_evento` (`id_evento`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_usuario`,`id_pago`),
  ADD UNIQUE KEY `id_pago` (`id_pago`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_usuario`,`id_equipo`,`fecha_reserva`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `DNI` (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inscribe`
--
ALTER TABLE `inscribe`
  ADD CONSTRAINT `inscribe_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscribe_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
