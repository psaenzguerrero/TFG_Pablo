-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2025 a las 12:51:58
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
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id_pedido` bigint(20) UNSIGNED NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id_pedido`, `id_producto`, `cantidad`) VALUES
(1, 2, 10),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(2, 3, 1),
(3, 11, 1),
(4, 2, 1),
(4, 3, 1),
(4, 10, 1),
(6, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `nombre_equipo` varchar(20) NOT NULL,
  `tipo_equipo` enum('Ordenador','VR','Consolas') NOT NULL,
  `sala_equipo` enum('pc_normal','vr_normal','consola_normal','pc_vip','vr_vip','consola_vip') NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `puntos_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `nombre_equipo`, `tipo_equipo`, `sala_equipo`, `precio`, `puntos_equipo`) VALUES
(1, 'O1', 'Ordenador', 'pc_normal', 5.00, 10),
(2, 'O2', 'Ordenador', 'pc_normal', 5.00, 15),
(3, 'O3', 'Ordenador', 'pc_normal', 5.00, 8),
(4, 'C1', 'Consolas', 'consola_normal', 6.00, 12),
(5, 'C2', 'Consolas', 'consola_normal', 8.50, 18),
(6, 'C3', 'Consolas', 'consola_normal', 5.00, 10),
(7, 'VR1', 'VR', 'vr_normal', 5.50, 11),
(8, 'VR2', 'VR', 'vr_normal', 7.50, 16),
(9, 'VR3', 'VR', 'vr_normal', 4.50, 9),
(10, 'OV1', 'Ordenador', 'pc_vip', 7.00, 14),
(11, 'OV2', 'Ordenador', 'pc_vip', 9.00, 20),
(12, 'OV3', 'Ordenador', 'pc_vip', 6.00, 12),
(13, 'CV1', 'Consolas', 'consola_vip', 6.00, 12),
(14, 'CV2', 'Consolas', 'consola_vip', 8.50, 18),
(15, 'CV3', 'Consolas', 'consola_vip', 5.00, 10),
(16, 'VV1', 'VR', 'vr_vip', 5.50, 11),
(17, 'VV2', 'VR', 'vr_vip', 7.50, 16),
(18, 'VV3', 'VR', 'vr_vip', 4.50, 9);

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
(13, 'maite', 'videojuegos', '2025-03-04', '100€', 'Sony'),
(14, 'Concurso VR', 'Videojuegos', '2025-05-11', '100€', 'Soni');

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
(13, 2),
(13, 3),
(13, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` bigint(20) UNSIGNED NOT NULL,
  `id_usu` int(11) NOT NULL,
  `precio` float UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `metodo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_usu`, `precio`, `fecha`, `metodo`) VALUES
(1, 13, 5579.86, '2025-06-04', 'riñon'),
(2, 13, 299.99, '2025-06-04', 'efectivo'),
(3, 13, 399.99, '2025-06-04', 'efectivo'),
(4, 3, 929.97, '2025-06-04', 'paypal'),
(6, 3, 499.99, '2025-06-04', 'paypal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `precio_producto` decimal(10,2) NOT NULL,
  `tipo_producto` enum('Equipo','Accesorios','Juegos','Consolas') NOT NULL,
  `puntos_compra` int(11) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `precio_producto`, `tipo_producto`, `puntos_compra`, `img`) VALUES
(2, 'Xbox Series X', 499.99, 'Consolas', 500, './img/productos/xbox.png'),
(3, 'Monitor Gaming', 299.99, 'Equipo', 300, './img/productos/monitor.png'),
(4, 'PlayStation 5', 499.99, 'Consolas', 500, './img/productos/play5.png'),
(5, 'Xbox Series X', 499.99, 'Consolas', 500, './img/productos/xbox.png'),
(6, 'Monitor Gaming', 299.99, 'Equipo', 300, './img/productos/monitor.png'),
(7, 'Nintendo Switch', 299.99, 'Consolas', 300, './img/productos/nintendo.png'),
(8, 'Teclado Mecánico', 89.99, 'Equipo', 90, './img/productos/teclado.png'),
(9, 'Ratón Gaming', 59.99, 'Equipo', 60, './img/productos/raton.png'),
(10, 'Auriculares Inalámbricos', 129.99, 'Equipo', 130, './img/productos/cascos.png'),
(11, 'Proyector 4K', 399.99, 'Accesorios', 400, './img/productos/proyector.png'),
(12, 'Smart TV 55\"', 699.99, 'Equipo', 700, './img/productos/television.png'),
(13, 'Tablet Android', 199.99, 'Accesorios', 200, './img/productos/tablet.png'),
(14, 'wi', 80.00, 'Consolas', 40, './img/productos/wi.png'),
(17, 'agch', 1000.00, 'Accesorios', 101, './img/productos/xbox.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_usuario` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `periodo` enum('periodo1','periodo2','periodo3','periodo4','periodo5','periodo6','periodo7','periodo8','periodo9','periodo10') NOT NULL,
  `snack` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_usuario`, `id_equipo`, `fecha_reserva`, `periodo`, `snack`) VALUES
(1, 1, '2025-05-20', 'periodo1', 1),
(2, 1, '2025-05-31', 'periodo1', 0),
(2, 2, '2025-03-02', 'periodo1', 0),
(3, 1, '2025-05-31', 'periodo3', 0),
(3, 2, '2025-05-31', 'periodo2', 0),
(3, 3, '2025-03-03', 'periodo1', 1),
(3, 10, '2025-03-15', 'periodo1', 1),
(13, 1, '2025-03-13', 'periodo4', 0),
(13, 1, '2025-03-13', 'periodo7', 1),
(13, 1, '2025-03-14', 'periodo1', 1),
(13, 1, '2025-03-14', 'periodo2', 1),
(13, 1, '2025-03-14', 'periodo10', 0),
(13, 1, '2025-03-15', 'periodo1', 0),
(13, 1, '2025-03-31', 'periodo10', 0),
(13, 1, '2025-05-31', 'periodo2', 0),
(13, 2, '2025-03-15', 'periodo1', 0),
(13, 2, '2025-03-15', 'periodo2', 0),
(13, 2, '2025-05-31', 'periodo3', 0),
(13, 3, '2025-03-13', 'periodo2', 0),
(13, 5, '2025-03-13', 'periodo1', 1),
(13, 5, '2025-03-13', 'periodo3', 0),
(13, 5, '2025-03-13', 'periodo5', 1),
(13, 5, '2025-03-13', 'periodo8', 1),
(13, 5, '2025-03-13', 'periodo9', 0),
(13, 5, '2025-03-13', 'periodo10', 0),
(13, 9, '2025-03-14', 'periodo3', 0),
(14, 4, '2025-03-14', 'periodo4', 1),
(14, 18, '2025-03-21', 'periodo10', 0),
(15, 5, '2025-03-22', 'periodo3', 0),
(16, 13, '2025-03-20', 'periodo6', 1);

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
  `puntos_usuario` int(11) DEFAULT 0,
  `foto` varchar(50) NOT NULL DEFAULT '../img/paginacion/icono.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `DNI`, `pass_usuario`, `tipo_usuario`, `puntos_usuario`, `foto`) VALUES
(1, 'Juan Pérez', '12345678A', 'pass123', 'Admin', 100, '../img/paginacion/icono.png'),
(2, 'María López', '87654321B', 'pass456', 'Normal', 200, '../img/paginacion/icono.png'),
(3, 'Carlos García', '45612378C', 'pass789', 'Normal', 50, '../img/paginacion/icono.png'),
(13, 'Pablo', '75570672D', '12345', 'Vip', 200, '../img/paginacion/icono.png'),
(14, 'AGCH', '11111111D', '12345', 'Normal', 0, '../img/paginacion/icono.png'),
(15, 'Maite', '11111112D', '12345', 'Normal', 3000, '../img/paginacion/icono.png'),
(16, 'Pepe', '12121212D', '12345', 'Normal', 0, '../img/paginacion/icono.png'),
(17, 'Manu', '12345678D', '12345', 'Normal', 0, '../img/paginacion/icono.png'),
(18, 'nasaro', NULL, 'nasaro', 'Normal', 0, ''),
(19, 'eri', NULL, 'eri', 'Normal', 0, '../img/paginacion/icono.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_usuario`,`id_producto`,`fecha_compra`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id_pedido`,`id_producto`),
  ADD KEY `contenido_fk_2` (`id_producto`);

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
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD UNIQUE KEY `id_pedido` (`id_pedido`),
  ADD KEY `pedido_fk_2` (`id_usu`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_usuario`,`id_equipo`,`fecha_reserva`,`periodo`) USING BTREE,
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
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE;

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `contenido_fk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contenido_fk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscribe`
--
ALTER TABLE `inscribe`
  ADD CONSTRAINT `inscribe_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscribe_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_fk_2` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE CASCADE;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `borrar_tipos` ON SCHEDULE EVERY 1 MONTH STARTS '2025-03-12 10:32:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE usuario SET tipo_usuario = 'normal' WHERE tipo_usuario = 'Vip'$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
