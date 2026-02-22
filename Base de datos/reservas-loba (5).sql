-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2022 a las 20:17:17
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservas-loba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `perfil` text NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `perfil`, `nombre`, `usuario`, `password`, `estado`, `fecha`) VALUES
(1, 'Administrador', 'Distribuidora Loba', 'loba', '123', 1, '2022-11-07 15:13:21'),
(22, 'Empleado', 'eduardo felipe', 'edu', '123', 1, '2022-12-04 01:40:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `img`, `fecha`) VALUES
(1, 'vistas/img/banner/banner01.jpg', '2022-11-04 20:00:14'),
(3, 'vistas/img/banner/banner3.jpg', '2022-11-04 20:21:44'),
(4, 'vistas/img/banner/banner6.jpg', '2022-11-01 19:40:18'),
(5, 'vistas/img/banner/banner2.jpg', '2022-11-01 19:40:18'),
(6, 'vistas/img/banner/banner4.jpg', '2022-11-04 20:06:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `color` text NOT NULL,
  `tipo` text NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nombre` text DEFAULT NULL,
  `img1` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `ruta`, `color`, `tipo`, `img`, `descripcion`, `fecha`, `nombre`, `img1`) VALUES
(1, 'artesanal', '#197DB1', ' Embarcaciones artesanales', 'vistas/img/reservar/embarcaciones-pequeñas.jpg', 'Capacidad entre 1.000 lts a 10.000 lts', '2022-11-01 19:43:32', 'Artesanal', 'vistas/imagenes/embarcaciones/Embarcaciones-artesanales.jpg'),
(2, 'mediana-industrial', '#2F7D84', 'Embarcaciones medianas e industriales', 'vistas/img/reservar/portada2.jpg', 'Capacidad entre 10.000 lts a 80.000 lts', '2022-11-01 19:44:45', 'Mediana e industrial', 'vistas/imagenes/reservar/portada2.jpg'),
(3, 'otros', '#847059', 'Otros tipos de embarcaciones', 'vistas/img/reservar/ferry2.jpg', 'Otros tipos de embarcaciones', '2022-11-01 19:44:53', 'Otros ', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `embarcaciones`
--

CREATE TABLE `embarcaciones` (
  `id` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `embarcaciones`
--

INSERT INTO `embarcaciones` (`id`, `tipo`, `img`, `descripcion`, `fecha`) VALUES
(1, 'Embarcaciones artesanales', 'vistas/img/embarcaciones/embarcaciones-pequeñas.jpg', '<p> En caso de tener una embarcacion artesanal, podras utilizar nuestro servicio de combustible. La embarcacion artesanal tiene una capacidad de combustible comprendida entre 1.000 a 10.000 litros.</p>', '2022-11-01 19:46:45'),
(2, 'Embarcaciones medianas', 'vistas/img/embarcaciones/Embarcaciones-medianas.jpg', '<p> En caso de tener una embarcacion mediana o industrial, podras utilizar nuestro servicio de combustible. Este tipo de embarcaciones que son las mas comunes, tienen una capacidad de combustible comprendida entre 10.000 a 80.000 litros.</p>', '2022-11-01 19:46:52'),
(3, 'Embarcaciones industriales', 'vistas/img/embarcaciones/Embarcaciones-industriales.jpg', '<p> En caso de tener una embarcacion mediana o industrial, podras utilizar nuestro servicio de combustible. Este tipo de embarcaciones que son las mas comunes, tienen una capacidad de combustible comprendida entre 10.000 a 80.000 litros.</p>', '2022-11-01 19:46:58'),
(4, 'Otros tipos de embarcaciones', 'vistas/img/embarcaciones/ferry2.jpg', '<p> En caso de contar con otro tipo de embarcacion, que no sea artesanal ni mediana o industrial. Tambien puedes surtir combustible a tu embarcación con nuestro servicio.</h3>', '2022-11-01 19:47:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `id_proceso` int(11) NOT NULL,
  `id_reservas` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo_proceso` text NOT NULL,
  `descripcion_proceso` text NOT NULL,
  `fecha_proceso` date NOT NULL,
  `fecha_cuando` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`id_proceso`, `id_reservas`, `id_usuario`, `codigo_proceso`, `descripcion_proceso`, `fecha_proceso`, `fecha_cuando`) VALUES
(191, 1, 1, '6Q1UPNX', 'Artesanal', '2022-11-18', '2022-10-29 02:13:53'),
(196, 3, 1, 'FLW1WW7', 'Otros', '2022-11-30', '2022-11-02 02:18:40'),
(197, 2, 1, 'VN3AZO5', 'Mediana e industrial', '2022-11-24', '2022-11-02 14:06:32'),
(207, 2, 1, '1748SAV', 'Mediana e industrial', '2022-12-14', '2022-12-01 01:26:16'),
(208, 1, 1, '88ANYIU', 'Artesanal', '2022-12-07', '2022-12-01 01:28:34'),
(209, 3, 1, 'WK51E4U', 'Otros', '2022-12-09', '2022-12-01 03:47:10'),
(210, 2, 1, '02Y433B', 'Mediana e industrial', '2022-12-05', '2022-12-01 15:32:38'),
(211, 1, 1, 'HLHIBK4', 'Artesanal', '2023-01-05', '2022-12-02 15:56:05'),
(212, 1, 1, 'FBNOGZ6', 'Artesanal', '2023-01-06', '2022-12-02 15:59:27'),
(213, 1, 1, 'CME1MGR', 'Artesanal', '2022-12-23', '2022-12-02 16:18:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_r` int(11) NOT NULL,
  `tipo_r` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `galeria` text NOT NULL,
  `descripcion_r` text NOT NULL,
  `fecha_r` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_r`, `tipo_r`, `categoria`, `galeria`, `descripcion_r`, `fecha_r`) VALUES
(1, 1, 'artesanales', 'vistas/img/galeria/Embarcaciones-artesanales1.jpg', '<h3> Aqui podras reservar tu cupo, en caso de tener una embarcacion artesanal, la embarcacion artesanal tiene una capacidad de combustible comprendida entre 1.000 a 10.000 litros.</h3>', '2022-07-23 17:00:12'),
(2, 2, 'medianas y industriales', 'vistas/img/galeria/embarcaciones-Medianas.jpg', '<h3> Aqui podras reservar tu cupo, en caso de tener una embarcacion mediana o industrial, cabe destacar que la capacidad de combustible comprendida en estas embarcaciones es de 10.000 litros hasta 80.000 litros de combustible.</h3>', '2022-07-23 17:00:22'),
(3, 3, 'otro', 'vistas/img/galeria/ferry1.jpg', '<h3> Aqui podras reservar tu cupo, en caso de contar con otro tipo de embarcacion, que no sea artesanal ni mediana o industrial.</h3>', '2022-07-23 17:00:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sobre`
--

CREATE TABLE `sobre` (
  `id` int(11) NOT NULL,
  `foto_peq` text NOT NULL,
  `foto_grande` text NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sobre`
--

INSERT INTO `sobre` (`id`, `foto_peq`, `foto_grande`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 'vistas/img/quienes-somos/sobre1a.jpg', 'vistas/img/quienes-somos/sobre1b.jpg', 'Sobre nosotros', 'Somos una empresa dedicada al suministro de combustible a embarcaciones pesqueras de todo el estado Nueva Esparta. Contamos con mas de 30 años de servicio y estamos ubicados en el municipio tubores, en la población de chacachacare.', '2022-11-30 18:35:49'),
(2, 'vistas/img/quienes-somos/sobre2a.jpg', 'vistas/img/quienes-somos/sobre2b.jpg', 'Servicios', 'La DISTRIBUIDORA INDUSTRIAL MARINA CONGELADORA LOBA C.A, se dedica principalmente al suministro de combustible a embarcaciones pesqueras ubicadas en Chacachacare, municipio Tubores y tambien en todo el territorio Neoespartano.', '2022-11-30 18:37:08'),
(3, 'vistas/img/quienes-somos/sobre3a.jpg', 'vistas/img/quienes-somos/sobre3b.jpg', 'Mision', 'Ofrecer a nuestra distinguida clientela, el mejor servicio posible en el surtimiento de combustible a sus embarcaciones pesqueras.\r\n\r\n', '2022-11-30 18:39:43'),
(4, 'vistas/img/quienes-somos/sobre3a.jpg', 'vistas/img/quienes-somos/sobre3b.jpg', 'Vision', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo velit quis iusto magnam cupiditate dolorum repudiandae tempore cum minus eos a iure, officiis, eius, consequuntur unde nulla, enim quibusdam beatae.\r\n\r\n', '2022-11-30 18:35:26'),
(5, 'vistas/img/quienes-somos/sobre3a.jpg', 'vistas/img/quienes-somos/sobre3b.jpg', 'Valores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo velit quis iusto magnam cupiditate dolorum repudiandae tempore cum minus eos a iure, officiis, eius, consequuntur unde nulla, enim quibusdam beatae.\r\n\r\n', '2022-11-30 18:35:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios1`
--

CREATE TABLE `usuarios1` (
  `id_u` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `tipo_documento` varchar(5) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(15) NOT NULL,
  `nombre_embarcacion` text NOT NULL,
  `capacidad_combustible` int(11) NOT NULL,
  `matricula` varchar(15) NOT NULL,
  `foto` text NOT NULL,
  `email_encriptado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios1`
--

INSERT INTO `usuarios1` (`id_u`, `nombre`, `apellido`, `tipo_documento`, `cedula`, `email`, `password`, `nombre_embarcacion`, `capacidad_combustible`, `matricula`, `foto`, `email_encriptado`) VALUES
(77, 'Pedro', 'marmol', 'CI', '7368292', 'pepe@mail.com', '$2a$07$asxx54ah', 'La marquesa', 1000, 'f5rws456', '', 'c4c98d810e201549924778f724c66367'),
(80, 'pepe', 'nava', 'CI', '17823', 'pepe@gmail.com', '$2a$07$asxx54ah', 'xiaomi', 1000, '1q2w3e1', '', '6b0becddecd5a06042b3f8078c97f2e0'),
(81, 'eduardo felipe', 'marcano dominguez', 'CI', 'm', 'eduardos@mail.com', '$2a$07$asxx54ah', 'La marquesa', 123, 'f5rws456', '', '3b9b3ae25d6c465576ad67cd4d095c93'),
(82, 'eduardo felipe', 'marcano dominguez', 'CI', '27525', 'eduardofelipe0208@gmail.com', '123', 'xiaomi', 1000, '12d63hr', '', 'bc75bbdf118ce4dd71296c9ec935a31b'),
(83, 'eduardo felipe', 'marcano dominguez', 'E', '9999', 'usuariocamilo@pepe000', '$2a$07$asxx54ah', 'La marquesa', 1000, '12d63hr', '', '05a291cd5446a9515b1ec9b5806519fe'),
(84, 'eduardo felipe', 'marcano dominguez', 'CI', '27525928', 'eduardofelipe020877@gmail.com', '$2a$07$asxx54ah', 'edydjk', 123, '1q2w3e1', '', '5f6993fdf9485ef1409c48fc6fc263b4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `embarcaciones`
--
ALTER TABLE `embarcaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`id_proceso`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_r`);

--
-- Indices de la tabla `sobre`
--
ALTER TABLE `sobre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios1`
--
ALTER TABLE `usuarios1`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `embarcaciones`
--
ALTER TABLE `embarcaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `id_proceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_r` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sobre`
--
ALTER TABLE `sobre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios1`
--
ALTER TABLE `usuarios1`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
