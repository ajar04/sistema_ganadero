-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2019 a las 02:27:59
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-05:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestionganadera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afaro`
--

CREATE TABLE `afaro` (
  `id` int(4) NOT NULL,
  `id_potrero` int(4) NOT NULL,
  `id_vegetacion` int(4) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `peso` int(4) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `sexo` varchar(11) NOT NULL,
  `estado` varchar(11) NOT NULL,
  `propietario` int(11) NOT NULL,
  `registro` varchar(40) NOT NULL,
  `fecha_nac` date NOT NULL,
  `fecha_dest` date NOT NULL,
  `peso_nac` float NOT NULL,
  `peso_dest` float NOT NULL,
  `raza` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `marca_oreja` varchar(40) NOT NULL,
  `marca_hierro` varchar(20) NOT NULL,
  `tipo_propo` varchar(30) NOT NULL,
  `procedencia` varchar(50) NOT NULL,
  `precio_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`id`, `nombre`, `sexo`, `estado`, `propietario`, `registro`, `fecha_nac`, `fecha_dest`, `peso_nac`, `peso_dest`, `raza`, `color`, `marca_oreja`, `marca_hierro`, `tipo_propo`, `procedencia`, `precio_venta`) VALUES
(1, 'Machito', 'Macho', 'Activo', 1, '10936728', '2018-04-19', '2018-10-19', 40, 60, 4, 6, 'au12', '1', 'Carne', 'vereda san juan', 250000),
(3, 'manchona', 'Hembra', 'Activo', 1, '123527', '2018-08-14', '2019-01-16', 30.5, 13.5, 2, 2, 'asu2', '14a', 'Lechero', 'vereda jun', 250000),
(6, 'cortica', 'Hembra', 'Activo', 1, '13245366', '2018-11-20', '2019-05-14', 27, 49, 15, 3, 'sae2', 'sae2', 'Lechero', 'toledo', 300000),
(7, 'rezonante', 'Macho', 'Vendido', 1, '1234152', '2018-11-08', '2019-05-16', 15, 45, 2, 2, 'as3', 'as3', 'Carne', 'nn', 542312),
(8, 'tomy', 'Macho', 'Activo', 1, 'tm01', '2014-07-15', '2014-09-15', 0, 2014, 2, 2, 'cr03', 'cr', 'Carne', 'finca llano bonito', 1500000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `tipo_cargo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `tipo_cargo`) VALUES
(1, 'Administrador'),
(2, 'Gerente'),
(3, 'Vaquero'),
(4, 'Veterinario'),
(5, 'Asistente Tecnico'),
(6, 'Contador'),
(7, 'Partero'),
(8, 'Ordeñadore'),
(9, 'Guadañadores'),
(10, 'Toconeadores'),
(11, 'Fumigadores'),
(12, 'Tractorista'),
(13, 'Mantenimiento de Cercas'),
(14, 'Conductor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id`, `color`) VALUES
(1, 'rojo'),
(2, 'negro'),
(3, 'Gris'),
(4, 'Perla'),
(5, 'Blanco'),
(6, 'Pardo'),
(7, 'Pintado'),
(8, 'Morado'),
(11, 'marron'),
(13, 'cafe'),
(14, 'manchas cafes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_potrero`
--

CREATE TABLE `control_potrero` (
  `id_potrero` int(4) NOT NULL,
  `control_potre` int(11) NOT NULL,
  `producto` varchar(60) NOT NULL,
  `fecha` date NOT NULL,
  `jornadas` int(4) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `notas` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `sexo` varchar(6) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `salario` int(6) NOT NULL,
  `cargo` varchar(60) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `usuario_creacion` int(3) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_edicion` int(3) NOT NULL,
  `fecha_edicion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `direccion`, `fecha_nac`, `sexo`, `correo`, `salario`, `cargo`, `estado`, `usuario_creacion`, `fecha_creacion`, `usuario_edicion`, `fecha_edicion`) VALUES
(87702742, 'alfredo martinez', 'doÃ±a ceci', '1995-06-19', 'Hombre', 'alfredo@ufps.edu.co', 5000000, 'OrdeÃ±ador', 'Activo', 1, '2019-11-17 21:30:19', 1, '2019-11-17 21:30:19'),
(88265144, 'Alvaro Arias', 'atalaya', '1983-04-13', 'Hombre', 'alvarojosear@ufps.edu.co', 5000000, 'Administrador', 'Activo', 1, '2019-06-06 03:52:46', 1, '2019-06-06 03:52:46'),
(1093769740, 'jefersson PeÃ±aranda', 'CLL40#1-21', '1993-11-13', 'Hombre', 'harbey.14@gmail.com', 2500000, '', 'Activo', 1, '2019-05-22 23:48:11', 1, '2019-05-22 23:48:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id` int(9) NOT NULL,
  `lote` varchar(60) NOT NULL,
  `usuario_creacion` int(3) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_edicion` int(3) NOT NULL,
  `fecha_edicion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`id`, `lote`, `usuario_creacion`, `fecha_creacion`, `usuario_edicion`, `fecha_edicion`) VALUES
(0, 'amarillosni', 1, '2019-05-17 00:43:31', 1, '2019-05-17 00:43:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote_potrero`
--

CREATE TABLE `lote_potrero` (
  `id_potrero` int(4) NOT NULL,
  `id_lote` int(9) NOT NULL,
  `fecha_ent` date NOT NULL,
  `fecha_sal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peso_animal`
--

CREATE TABLE `peso_animal` (
  `id` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL,
  `nombre_animal` varchar(40) NOT NULL,
  `fecha` date NOT NULL,
  `peso` int(4) NOT NULL,
  `fecha_peso_ant` date NOT NULL,
  `peso_ant` int(4) NOT NULL,
  `ganancia` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peso_leche`
--

CREATE TABLE `peso_leche` (
  `id` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `peso_am` int(20) DEFAULT NULL,
  `hora_am` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `peso_pm` int(11) DEFAULT NULL,
  `hora_pm` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `peso_perdido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peso_leche`
--

INSERT INTO `peso_leche` (`id`, `id_animal`, `id_empleado`, `fecha`, `peso_am`, `hora_am`, `peso_pm`, `hora_pm`, `peso_perdido`) VALUES
(2, 1, 88265144, '2019-11-17', 650, '2019-11-17 21:01:47', 610, '2019-11-17 21:01:47', 40),
(4, 3, 88265144, '2019-11-17', 650, '2019-11-17 23:47:37', 630, '2019-11-17 23:47:37', 20),
(3, 3, 1093769740, '2019-11-17', 630, '2019-11-17 21:03:40', NULL, '2019-11-17 21:03:40', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `potrero`
--

CREATE TABLE `potrero` (
  `id` int(4) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `area` varchar(30) NOT NULL,
  `coordenadas` varchar(35) NOT NULL,
  `dias_ent_anim` varchar(15) NOT NULL,
  `dias_sal_anim` varchar(15) NOT NULL,
  `est_cerca` varchar(60) NOT NULL,
  `cap_ganado` int(10) NOT NULL,
  `observacion` varchar(100) NOT NULL,
  `usuario_creacion` int(3) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_edicion` int(3) NOT NULL,
  `fecha_edicion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `potrero`
--

INSERT INTO `potrero` (`id`, `nombre`, `area`, `coordenadas`, `dias_ent_anim`, `dias_sal_anim`, `est_cerca`, `cap_ganado`, `observacion`, `usuario_creacion`, `fecha_creacion`, `usuario_edicion`, `fecha_edicion`) VALUES
(10, 'llano pequeÃ±o', '1500', '7.8982929, -72.50863', 'Lunes', 'Martes', 'Cercado', 100, '', 1, '2019-06-07 00:19:25', 1, '2019-06-07 00:19:25'),
(23, 'asdf', '324', '7.8982929, -72.50863950000002', 'Lunes', 'Martes', 'Cerca Electrica', 234, '', 1, '2019-11-17 17:44:39', 1, '2019-11-17 17:44:39'),
(24, 'pasto rico', '300', '7.8982929, -72.50863950000002', 'Martes', 'Miercoles', 'Cercado', 30, '', 1, '2019-11-18 11:04:33', 1, '2019-11-18 11:04:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `id` int(11) NOT NULL,
  `raza` varchar(60) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`id`, `raza`, `descripcion`) VALUES
(1, 'senepol', 'grande'),
(2, 'Holstein', ''),
(3, 'SAC', 'senepol, angus,sebu'),
(4, 'Cebu', ''),
(5, 'Gyr', ''),
(6, 'Pardo Suizo', ''),
(7, 'Velazques', ''),
(8, 'Angus', ''),
(9, 'Angus Rojo', ''),
(10, 'Archire', ''),
(11, 'Azul Belga', ''),
(12, 'Beefalo', ''),
(13, 'Beefmaster', ''),
(14, 'Blanco Orejinegro (BON)', ''),
(15, 'Braford', ''),
(16, 'Brahman', ''),
(17, 'Brahmousin', ''),
(18, 'Brangus', ''),
(19, 'Bufalo', ''),
(20, 'CasanareÃ±o', ''),
(21, 'anastacia', ''),
(22, 'andres', 'negro'),
(23, 'daniel', 'gordo'),
(24, 'senepol2', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_control_potrero`
--

CREATE TABLE `tipo_control_potrero` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_control_potrero`
--

INSERT INTO `tipo_control_potrero` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Fertilización', ''),
(2, 'Fumigación', ''),
(3, 'Desmatonada', ''),
(4, 'Siembra', ''),
(5, 'riego', ''),
(6, 'Arada', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_vegetal`
--

CREATE TABLE `t_vegetal` (
  `id` int(4) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_vegetal`
--

INSERT INTO `t_vegetal` (`id`, `nombre`, `descripcion`) VALUES
(1, 'pasto', ''),
(2, 'leguminosa', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `permisos_acceso` enum('Super Admin','Gerente','Almacen') NOT NULL,
  `status` enum('activo','bloqueado') NOT NULL DEFAULT 'activo',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `username`, `name_user`, `password`, `email`, `telefono`, `foto`, `permisos_acceso`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrador', '91f5167c34c400758115c2a6826ec2e3', 'info@sist.com', '3102358925', 'usuario.png', 'Super Admin', 'activo', '2017-04-01 08:15:15', '2019-05-20 13:09:55'),
(2, 'juan', 'juan', 'a94652aa97c7211ba8954dd15a3cf838', 'juab@juan.com', '12000', NULL, 'Almacen', 'activo', '2017-07-25 22:34:03', '2017-07-25 22:42:00'),
(3, 'alfredo', 'alfredo', 'e10adc3949ba59abbe56e057f20f883e', 'alfredo@gmail.com', '78258487', 'af137855fc33f7ceb4bcc2511a5a3352_preview_featured.jpg', 'Super Admin', 'activo', '2019-11-17 22:04:17', '2019-11-17 22:11:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vegetacion`
--

CREATE TABLE `vegetacion` (
  `id` int(4) NOT NULL,
  `tipo_vegetacion` int(4) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `observacion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vegetacion`
--

INSERT INTO `vegetacion` (`id`, `tipo_vegetacion`, `nombre`, `observacion`) VALUES
(1, 1, 'nose', 'prueba'),
(2, 1, 'Brachiaria Decumbens', ''),
(3, 1, 'Pasto Natural', ''),
(4, 1, 'Acacia', ''),
(5, 1, 'Aleman', ''),
(6, 1, 'Alfalfa del trÃ³pico', ''),
(7, 1, 'Aliso', ''),
(8, 1, 'Angleton', ''),
(9, 1, 'bahÃ­a', ''),
(10, 1, 'Bermuda', ''),
(11, 1, 'BotÃ³n de oro', ''),
(12, 1, 'Brachiara Brisanta Insurgente', ''),
(13, 1, 'Brachiaria dictyoneura IsleÃ±o', ''),
(14, 1, 'Brachiaria humidÃ­cola', ''),
(15, 1, 'Brachiaria decumbens SeÃ±al o Chontalpo', ''),
(16, 1, 'Brachiaria ruziziensis Ruzi', ''),
(17, 1, 'Buffel', ''),
(18, 1, 'Cacahuete forrajero', ''),
(19, 1, 'Campano', ''),
(20, 1, 'Canavalia', ''),
(21, 1, 'CaÃ±a', ''),
(22, 1, 'Capica', ''),
(23, 1, 'Carimagua', ''),
(24, 1, 'Centrosema', ''),
(25, 1, 'Chachafruto', ''),
(26, 1, 'Clavelon', ''),
(27, 1, 'Dolichos', ''),
(28, 1, 'Elefante', ''),
(29, 1, 'Estrella', ''),
(30, 1, 'Festuca', ''),
(31, 1, 'Frijo terciopelo', ''),
(32, 2, 'Leucaena', ''),
(33, 1, 'Gordura', ''),
(34, 1, 'Guacamayo', ''),
(35, 1, 'Guatemala', ''),
(36, 1, 'Guinea', ''),
(37, 1, 'Hierba Cinta', ''),
(38, 1, 'Imperial', ''),
(39, 1, 'Janeiro', ''),
(40, 1, 'King grass', ''),
(41, 1, 'Kudzu Tropical', ''),
(42, 1, 'Leucaena (guaje)', ''),
(43, 1, 'Libertad', ''),
(44, 1, 'Llanero', ''),
(45, 1, 'Maiz', ''),
(46, 1, 'Malbabisco', ''),
(47, 1, 'ManÃ­ forrajero perenne', ''),
(48, 1, 'Maralfalfa', ''),
(49, 1, 'Mata Raton', ''),
(50, 1, 'Morera', ''),
(51, 1, 'Nacedro', ''),
(52, 1, 'Orejero', ''),
(53, 1, 'Pangola', ''),
(54, 1, 'Panicum maximum cv. CENTENARIO', ''),
(55, 1, 'Panicum maximum cv. MOMBAZA', ''),
(56, 1, 'Panicum maximum cv. Tanzania', ''),
(57, 1, 'Panicum maximum cv. TOBIATÃ', ''),
(58, 1, 'Panicum maximum cv. VENCEDOR', ''),
(59, 1, 'ParÃ¡', ''),
(60, 1, 'PÃ­zamo', ''),
(61, 1, 'Pueraria', ''),
(62, 1, 'Ramio', ''),
(63, 1, 'Saman', ''),
(64, 1, 'Sorgo Forrajero', ''),
(65, 1, 'Totumo', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afaro`
--
ALTER TABLE `afaro`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_empleado` (`id_empleado`) USING BTREE,
  ADD KEY `id_potrero` (`id_potrero`) USING BTREE,
  ADD KEY `id_vegetacion` (`id_vegetacion`) USING BTREE,
  ADD KEY `id_potrero_2` (`id_potrero`) USING BTREE;

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_raza` (`raza`),
  ADD KEY `animal_color` (`color`),
  ADD KEY `sexo` (`sexo`),
  ADD KEY `estado` (`estado`) USING BTREE;

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `control_potrero`
--
ALTER TABLE `control_potrero`
  ADD PRIMARY KEY (`id_potrero`,`control_potre`),
  ADD KEY `control_potr` (`control_potre`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lote_usuariocr` (`usuario_creacion`),
  ADD KEY `lote_usuarioup` (`usuario_edicion`);

--
-- Indices de la tabla `lote_potrero`
--
ALTER TABLE `lote_potrero`
  ADD PRIMARY KEY (`id_potrero`) USING BTREE;

--
-- Indices de la tabla `peso_animal`
--
ALTER TABLE `peso_animal`
  ADD PRIMARY KEY (`id_animal`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `peso_leche`
--
ALTER TABLE `peso_leche`
  ADD PRIMARY KEY (`id_empleado`,`id_animal`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `peso_animal` (`id_animal`);

--
-- Indices de la tabla `potrero`
--
ALTER TABLE `potrero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_control_potrero`
--
ALTER TABLE `tipo_control_potrero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_vegetal`
--
ALTER TABLE `t_vegetal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`permisos_acceso`);

--
-- Indices de la tabla `vegetacion`
--
ALTER TABLE `vegetacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vege_tipo_vege` (`tipo_vegetacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afaro`
--
ALTER TABLE `afaro`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `peso_animal`
--
ALTER TABLE `peso_animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `peso_leche`
--
ALTER TABLE `peso_leche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `potrero`
--
ALTER TABLE `potrero`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tipo_control_potrero`
--
ALTER TABLE `tipo_control_potrero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `t_vegetal`
--
ALTER TABLE `t_vegetal`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vegetacion`
--
ALTER TABLE `vegetacion`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `afaro`
--
ALTER TABLE `afaro`
  ADD CONSTRAINT `afaroemp` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `afaropotr` FOREIGN KEY (`id_potrero`) REFERENCES `potrero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `afarovege` FOREIGN KEY (`id_vegetacion`) REFERENCES `vegetacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_color` FOREIGN KEY (`color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `animal_raza` FOREIGN KEY (`raza`) REFERENCES `raza` (`id`);

--
-- Filtros para la tabla `control_potrero`
--
ALTER TABLE `control_potrero`
  ADD CONSTRAINT `control_potr` FOREIGN KEY (`control_potre`) REFERENCES `tipo_control_potrero` (`id`),
  ADD CONSTRAINT `controlpotre` FOREIGN KEY (`id_potrero`) REFERENCES `potrero` (`id`);

--
-- Filtros para la tabla `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `lote_usuariocr` FOREIGN KEY (`usuario_creacion`) REFERENCES `usuarios` (`id_user`),
  ADD CONSTRAINT `lote_usuarioup` FOREIGN KEY (`usuario_edicion`) REFERENCES `usuarios` (`id_user`);

--
-- Filtros para la tabla `lote_potrero`
--
ALTER TABLE `lote_potrero`
  ADD CONSTRAINT `lote_potr` FOREIGN KEY (`id_potrero`) REFERENCES `potrero` (`id`),
  ADD CONSTRAINT `lotepotrero` FOREIGN KEY (`id_lote`) REFERENCES `lote` (`id`);

--
-- Filtros para la tabla `peso_animal`
--
ALTER TABLE `peso_animal`
  ADD CONSTRAINT `pesoanimal` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id`);

--
-- Filtros para la tabla `peso_leche`
--
ALTER TABLE `peso_leche`
  ADD CONSTRAINT `peso_animal` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id`),
  ADD CONSTRAINT `peso_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`);

--
-- Filtros para la tabla `vegetacion`
--
ALTER TABLE `vegetacion`
  ADD CONSTRAINT `vege_tipo_vege` FOREIGN KEY (`tipo_vegetacion`) REFERENCES `t_vegetal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
