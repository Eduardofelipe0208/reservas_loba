-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2022 a las 19:32:27
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
(14, 'Administrador', 'Eduardo Marcano', 'Marcano', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '2022-11-08 03:56:04');

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
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `color` text NOT NULL,
  `tipo` text NOT NULL,
  `img` text NOT NULL,
  `descripcion` text NOT NULL,
  `incluye` text NOT NULL,
  `continental_alta` int(11) NOT NULL,
  `continental_baja` int(11) NOT NULL,
  `americano_alta` int(11) NOT NULL,
  `americano_baja` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `ruta`, `color`, `tipo`, `img`, `descripcion`, `incluye`, `continental_alta`, `continental_baja`, `americano_alta`, `americano_baja`, `fecha`) VALUES
(1, 'habitacion-tipo-suite', '#847059', 'artesanal', 'vistas/imagenes/reservar/portada.jpg', 'Lorem ipsum dolor sit amet', '[{ \"item\": \"cama 2 x 2\", \"icono\": \"fas fa-bed\"},\r\n{ \"item\": \"TV de 42 Pulg\", \"icono\": \"fas fa-tv\"},\r\n{ \"item\": \"Agua Caliente\", \"icono\": \"fas fa-tint\"},\r\n{ \"item\": \"Jacuzzi\", \"icono\": \"fas fa-water\"},\r\n{ \"item\": \"Baño privado\", \"icono\": \"fas fa-toilet\"},\r\n{ \"item\": \"Sofá\", \"icono\": \"fas fa-couch\"},\r\n{ \"item\": \"Balcón\", \"icono\": \"far fa-image\"},\r\n{ \"item\": \"Servicio Wifi\", \"icono\": \"fas fa-wifi\"}]', 350000, 300000, 420000, 380000, '2022-05-01 19:22:51'),
(2, 'habitacion-tipo-especial', '#197DB1', 'mediana y industrial', 'vistas/imagenes/reservar/portada2.jpg', 'Lorem ipsum dolor sit amet', '[{ \"item\": \"cama 2 x 2\", \"icono\": \"fas fa-bed\"},\r\n{ \"item\": \"TV de 42 Pulg\", \"icono\": \"fas fa-tv\"},\r\n{ \"item\": \"Agua Caliente\", \"icono\": \"fas fa-tint\"},\r\n{ \"item\": \"Baño privado\", \"icono\": \"fas fa-toilet\"},\r\n{ \"item\": \"Sofá\", \"icono\": \"fas fa-couch\"},\r\n{ \"item\": \"Balcón\", \"icono\": \"far fa-image\"},\r\n{ \"item\": \"Servicio Wifi\", \"icono\": \"fas fa-wifi\"}]', 300000, 250000, 380000, 350000, '2022-05-01 19:23:24'),
(3, 'habitacion-tipo-standar', '#2F7D84', 'otros', 'vistas/imagenes/reservar/portada3.jpg', 'Lorem ipsum dolor sit amet', '[{ \"item\": \"cama 2 x 2\", \"icono\": \"fas fa-bed\"},\r\n{ \"item\": \"TV de 42 Pulg\", \"icono\": \"fas fa-tv\"},\r\n{ \"item\": \"Agua Caliente\", \"icono\": \"fas fa-tint\"},\r\n{ \"item\": \"Baño privado\", \"icono\": \"fas fa-toilet\"},\r\n{ \"item\": \"Sofá\", \"icono\": \"fas fa-couch\"},\r\n{ \"item\": \"Servicio Wifi\", \"icono\": \"fas fa-wifi\"}]', 250000, 200000, 350000, 300000, '2022-05-01 19:23:40');

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
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `estilo` text NOT NULL,
  `galeria` text NOT NULL,
  `video` text NOT NULL,
  `recorrido_virtual` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id`, `tipo`, `estilo`, `galeria`, `video`, `recorrido_virtual`, `descripcion`, `fecha`) VALUES
(1, 1, 'Oriental', '[\"vistas/img/suite/oriental01.jpg\", \"vistas/img/suite/oriental02.jpg\", \"vistas/img/suite/oriental03.jpg\",\"vistas/img/suite/oriental04.jpg\"]\r\n', 'JTu790_yyRc', 'vistas/img/suite/oriental-360.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>PLAN CONTINENTAL</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>\r\n					Temporada Baja: $300.000 COP<br>\r\n					Temporada Alta: $350.000 COP</p>	\r\n\r\n					<br>\r\n\r\n					<h3>PLAN AMERICANO</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>\r\n					Temporada Baja: $380.000 COP<br>\r\n					Temporada Alta: $420.000 COP</p>\r\n					\r\n					<br>\r\n\r\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2019-04-09 02:08:48'),
(2, 1, 'Moderna', '[\"vistas/img/suite/moderna01.jpg\", \"vistas/img/suite/moderna02.jpg\", \"vistas/img/suite/moderna03.jpg\",\"vistas/img/suite/moderna04.jpg\"]\r\n\r\n', 'JTu790_yyRc', 'vistas/img/suite/moderna-360.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>PLAN CONTINENTAL</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>\r\n					Temporada Baja: $300.000 COP<br>\r\n					Temporada Alta: $350.000 COP</p>	\r\n\r\n					<br>\r\n\r\n					<h3>PLAN AMERICANO</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>\r\n					Temporada Baja: $380.000 COP<br>\r\n					Temporada Alta: $420.000 COP</p>\r\n					\r\n					<br>\r\n\r\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2019-04-09 02:08:52'),
(3, 1, 'Africana', '[\"vistas/img/suite/africana01.jpg\", \"vistas/img/suite/africana02.jpg\", \"vistas/img/suite/africana03.jpg\",\"vistas/img/suite/africana04.jpg\"]\r\n', 'JTu790_yyRc', 'vistas/img/suite/africana-360.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>PLAN CONTINENTAL</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>\r\n					Temporada Baja: $300.000 COP<br>\r\n					Temporada Alta: $350.000 COP</p>	\r\n\r\n					<br>\r\n\r\n					<h3>PLAN AMERICANO</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>\r\n					Temporada Baja: $380.000 COP<br>\r\n					Temporada Alta: $420.000 COP</p>\r\n					\r\n					<br>\r\n\r\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2019-04-09 02:08:56'),
(4, 1, 'Clásica', '[\"vistas/img/suite/clasica01.jpg\", \"vistas/img/suite/clasica02.jpg\", \"vistas/img/suite/clasica03.jpg\",\"vistas/img/suite/clasica04.jpg\"]\r\n', 'JTu790_yyRc', 'vistas/img/suite/clasica-360.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>PLAN CONTINENTAL</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>\r\n					Temporada Baja: $300.000 COP<br>\r\n					Temporada Alta: $350.000 COP</p>	\r\n\r\n					<br>\r\n\r\n					<h3>PLAN AMERICANO</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>\r\n					Temporada Baja: $380.000 COP<br>\r\n					Temporada Alta: $420.000 COP</p>\r\n					\r\n					<br>\r\n\r\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2019-04-09 02:08:59'),
(5, 1, 'Retro', '[\"vistas/img/suite/retro01.jpg\", \"vistas/img/suite/retro02.jpg\", \"vistas/img/suite/retro03.jpg\",\"vistas/img/suite/retro04.jpg\"]\r\n', 'JTu790_yyRc', 'vistas/img/suite/retro-360.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>PLAN CONTINENTAL</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>\r\n					Temporada Baja: $300.000 COP<br>\r\n					Temporada Alta: $350.000 COP</p>	\r\n\r\n					<br>\r\n\r\n					<h3>PLAN AMERICANO</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>\r\n					Temporada Baja: $380.000 COP<br>\r\n					Temporada Alta: $420.000 COP</p>\r\n					\r\n					<br>\r\n\r\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2019-04-09 02:09:03'),
(6, 2, 'Oriental', '[\"vistas/img/especial/oriental01.jpg\", \"vistas/img/especial/oriental02.jpg\", \"vistas/img/especial/oriental03.jpg\",\"vistas/img/especial/oriental04.jpg\"]\r\n', 'JTu790_yyRc', 'vistas/img/especial/oriental-360.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>PLAN CONTINENTAL</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>\r\n					Temporada Baja: $300.000 COP<br>\r\n					Temporada Alta: $350.000 COP</p>	\r\n\r\n					<br>\r\n\r\n					<h3>PLAN AMERICANO</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>\r\n					Temporada Baja: $380.000 COP<br>\r\n					Temporada Alta: $420.000 COP</p>\r\n					\r\n					<br>\r\n\r\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2019-04-09 02:09:05'),
(7, 2, 'Moderna', '[\"vistas/img/especial/moderna01.jpg\", \"vistas/img/especial/moderna02.jpg\", \"vistas/img/especial/moderna03.jpg\",\"vistas/img/especial/moderna04.jpg\"]', 'JTu790_yyRc', 'vistas/img/especial/moderna-360.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>PLAN CONTINENTAL</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>\r\n					Temporada Baja: $300.000 COP<br>\r\n					Temporada Alta: $350.000 COP</p>	\r\n\r\n					<br>\r\n\r\n					<h3>PLAN AMERICANO</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>\r\n					Temporada Baja: $380.000 COP<br>\r\n					Temporada Alta: $420.000 COP</p>\r\n					\r\n					<br>\r\n\r\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2019-04-09 02:09:08'),
(8, 2, 'Africana', '[\"vistas/img/especial/africana01.jpg\", \"vistas/img/especial/africana02.jpg\", \"vistas/img/especial/africana03.jpg\",\"vistas/img/especial/africana04.jpg\"]\r\n', 'JTu790_yyRc', 'vistas/img/especial/africana-360.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>PLAN CONTINENTAL</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>\r\n					Temporada Baja: $300.000 COP<br>\r\n					Temporada Alta: $350.000 COP</p>	\r\n\r\n					<br>\r\n\r\n					<h3>PLAN AMERICANO</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>\r\n					Temporada Baja: $380.000 COP<br>\r\n					Temporada Alta: $420.000 COP</p>\r\n					\r\n					<br>\r\n\r\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2019-04-09 02:09:11'),
(9, 2, 'Árabe', '[\"vistas/img/especial/arabe01.jpg\", \"vistas/img/especial/arabe02.jpg\", \"vistas/img/especial/arabe03.jpg\",\"vistas/img/especial/arabe04.jpg\"]', 'JTu790_yyRc', 'vistas/img/especial/arabe-360.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>PLAN CONTINENTAL</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>\r\n					Temporada Baja: $300.000 COP<br>\r\n					Temporada Alta: $350.000 COP</p>	\r\n\r\n					<br>\r\n\r\n					<h3>PLAN AMERICANO</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>\r\n					Temporada Baja: $380.000 COP<br>\r\n					Temporada Alta: $420.000 COP</p>\r\n					\r\n					<br>\r\n\r\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2019-04-09 02:09:14'),
(10, 2, 'Romana', '[\"vistas/img/especial/romana01.jpg\", \"vistas/img/especial/romana02.jpg\", \"vistas/img/especial/romana03.jpg\",\"vistas/img/especial/romana04.jpg\"]', 'JTu790_yyRc', 'vistas/img/especial/romana-360.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>PLAN CONTINENTAL</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>\r\n					Temporada Baja: $300.000 COP<br>\r\n					Temporada Alta: $350.000 COP</p>	\r\n\r\n					<br>\r\n\r\n					<h3>PLAN AMERICANO</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>\r\n					Temporada Baja: $380.000 COP<br>\r\n					Temporada Alta: $420.000 COP</p>\r\n					\r\n					<br>\r\n\r\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2019-04-09 02:09:16'),
(11, 3, 'Caribeña', '[\"vistas/img/standar/caribena01.jpg\", \"vistas/img/standar/caribena02.jpg\", \"vistas/img/standar/caribena03.jpg\",\"vistas/img/standar/caribena04.jpg\"]', 'JTu790_yyRc', 'vistas/img/standar/caribena-360.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>PLAN CONTINENTAL</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>\r\n					Temporada Baja: $300.000 COP<br>\r\n					Temporada Alta: $350.000 COP</p>	\r\n\r\n					<br>\r\n\r\n					<h3>PLAN AMERICANO</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>\r\n					Temporada Baja: $380.000 COP<br>\r\n					Temporada Alta: $420.000 COP</p>\r\n					\r\n					<br>\r\n\r\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2019-04-09 02:09:20'),
(12, 3, 'Colonial', '[\"vistas/img/standar/colonial01.jpg\", \"vistas/img/standar/colonial02.jpg\", \"vistas/img/standar/colonial03.jpg\",\"vistas/img/standar/colonial04.jpg\"]\r\n', 'JTu790_yyRc', 'vistas/img/standar/colonial-360.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>PLAN CONTINENTAL</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>\r\n					Temporada Baja: $300.000 COP<br>\r\n					Temporada Alta: $350.000 COP</p>	\r\n\r\n					<br>\r\n\r\n					<h3>PLAN AMERICANO</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>\r\n					Temporada Baja: $380.000 COP<br>\r\n					Temporada Alta: $420.000 COP</p>\r\n					\r\n					<br>\r\n\r\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2019-04-09 02:09:26'),
(13, 3, 'Hindú', '[\"vistas/img/standar/hindu01.jpg\", \"vistas/img/standar/hindu02.jpg\", \"vistas/img/standar/hindu03.jpg\",\"vistas/img/standar/hindu04.jpg\"]', 'JTu790_yyRc', 'vistas/img/standar/hindu-360.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>PLAN CONTINENTAL</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>\r\n					Temporada Baja: $300.000 COP<br>\r\n					Temporada Alta: $350.000 COP</p>	\r\n\r\n					<br>\r\n\r\n					<h3>PLAN AMERICANO</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>\r\n					Temporada Baja: $380.000 COP<br>\r\n					Temporada Alta: $420.000 COP</p>\r\n					\r\n					<br>\r\n\r\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2019-04-09 02:09:31'),
(14, 3, 'Marroquí', '[\"vistas/img/standar/marroqui01.jpg\", \"vistas/img/standar/marroqui02.jpg\", \"vistas/img/standar/marroqui03.jpg\",\"vistas/img/standar/marroqui04.jpg\"]', 'JTu790_yyRc', 'vistas/img/standar/marroqui-360.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>PLAN CONTINENTAL</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>\r\n					Temporada Baja: $300.000 COP<br>\r\n					Temporada Alta: $350.000 COP</p>	\r\n\r\n					<br>\r\n\r\n					<h3>PLAN AMERICANO</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>\r\n					Temporada Baja: $380.000 COP<br>\r\n					Temporada Alta: $420.000 COP</p>\r\n					\r\n					<br>\r\n\r\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2019-04-09 02:09:34'),
(15, 3, 'Retro', '[\"vistas/img/standar/retro01.jpg\", \"vistas/img/standar/retro02.jpg\", \"vistas/img/standar/retro03.jpg\",\"vistas/img/standar/retro04.jpg\"]\r\n', 'JTu790_yyRc', 'vistas/img/standar/retro-360.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>	\r\n\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum sit, quia blanditiis fugiat nam libero possimus totam modi sint autem repellat fugit dicta est pariatur? Ut aut vel ad sapiente. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, reprehenderit! Deserunt laborum dolorum deleniti molestiae quae vitae animi ratione nihil, minus ut quibusdam incidunt voluptate eos sed id repudiandae ex.\r\n					</p>\r\n\r\n					<br>\r\n\r\n					<h3>PLAN CONTINENTAL</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: desayuno)<br>\r\n					Temporada Baja: $300.000 COP<br>\r\n					Temporada Alta: $350.000 COP</p>	\r\n\r\n					<br>\r\n\r\n					<h3>PLAN AMERICANO</h3>\r\n\r\n					<p>(Precio x pareja 1 día 1 noche, incluye: cena, desayuno, almuerzo)<br>\r\n					Temporada Baja: $380.000 COP<br>\r\n					Temporada Alta: $420.000 COP</p>\r\n					\r\n					<br>\r\n\r\n					<p>Hora de entrada (Check in) 3:00 pm | Hora de salida (Check out) 1:00 pm</p>', '2019-04-09 02:09:37');

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
(198, 2, 1, '8B1NFIF', 'Mediana e industrial', '2022-12-03', '2022-11-04 20:56:25'),
(199, 2, 1, '7MGXEZ8', 'Mediana e industrial', '2022-12-09', '2022-11-07 22:33:45');

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
(1, 'vistas/img/quienes-somos/sobre1a.jpg', 'vistas/img/quienes-somos/sobre1b.jpg', 'Sobre nosotros', 'Somos una empresa dedicada al suministro de combustible a embarcaciones pesqueras de todo el estado Nueva Esparta. Contamos con mas de 30 años de servicio y estamos ubicados en el municipio tubores, en la población de chacachacare.', '2022-11-01 19:49:53'),
(2, 'vistas/img/quienes-somos/sobre2a.jpg', 'vistas/img/quienes-somos/sobre2b.jpg', 'servicios', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo velit quis iusto magnam cupiditate dolorum repudiandae tempore cum minus eos a iure, officiis, eius, consequuntur unde nulla, enim quibusdam beatae.\r\n\r\n', '2022-11-01 19:49:58'),
(3, 'vistas/img/quienes-somos/sobre3a.jpg', 'vistas/img/quienes-somos/sobre3b.jpg', 'mision', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo velit quis iusto magnam cupiditate dolorum repudiandae tempore cum minus eos a iure, officiis, eius, consequuntur unde nulla, enim quibusdam beatae.\r\n\r\n', '2022-11-01 19:50:04'),
(4, 'vistas/img/quienes-somos/sobre3a.jpg', 'vistas/img/quienes-somos/sobre3b.jpg', 'vision', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo velit quis iusto magnam cupiditate dolorum repudiandae tempore cum minus eos a iure, officiis, eius, consequuntur unde nulla, enim quibusdam beatae.\r\n\r\n', '2022-11-01 19:50:10'),
(5, 'vistas/img/quienes-somos/sobre3a.jpg', 'vistas/img/quienes-somos/sobre3b.jpg', 'valores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo velit quis iusto magnam cupiditate dolorum repudiandae tempore cum minus eos a iure, officiis, eius, consequuntur unde nulla, enim quibusdam beatae.\r\n\r\n', '2022-11-01 19:50:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sobre_nosotros`
--

CREATE TABLE `sobre_nosotros` (
  `id` int(11) NOT NULL,
  `foto_peq` text NOT NULL,
  `foto_grande` text NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sobre_nosotros`
--

INSERT INTO `sobre_nosotros` (`id`, `foto_peq`, `foto_grande`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 'vistas/imagenes/quienes-somos/pueblo01a.png', 'vistas/imagenes/quienes-somos/pueblo01b.png', 'Sobre nosotros', 'culo', '2022-05-03 02:54:53'),
(2, 'vistas/imagenes/quienes-somos/pueblo02a.png', 'vistas/imagenes/quienes-somos/pueblo02b.png', 'Servicios', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo velit quis iusto magnam cupiditate dolorum repudiandae tempore cum minus eos a iure, officiis, eius, consequuntur unde nulla, enim quibusdam beatae.\r\n\r\n', '2022-05-03 02:17:28'),
(3, 'vistas/imagenes/quienes-somos/pueblo03a.png', 'vistas/imagenes/quienes-somos/pueblo03b.png', 'mision', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo velit quis iusto magnam cupiditate dolorum repudiandae tempore cum minus eos a iure, officiis, eius, consequuntur unde nulla, enim quibusdam beatae.\r\n\r\n', '2022-05-03 02:17:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios1`
--

CREATE TABLE `usuarios1` (
  `id_u` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `cedula` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `nombre_embarcacion` text NOT NULL,
  `capacidad_combustible` text NOT NULL,
  `matricula` text NOT NULL,
  `foto` text NOT NULL,
  `email_encriptado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios1`
--

INSERT INTO `usuarios1` (`id_u`, `nombre`, `apellido`, `cedula`, `email`, `password`, `nombre_embarcacion`, `capacidad_combustible`, `matricula`, `foto`, `email_encriptado`) VALUES
(28, 'eduardo felipe', 'marcano dominguez', '27525', 'eduardofelipe0208@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'La marquesa', '1000', 'vcu23u', '', 'bc75bbdf118ce4dd71296c9ec935a31b'),
(40, 'Mirian', 'Dominguez', '12222402', 'mirian@jose.com', '123', 'mi virgen del valle', '1000', 'aqwe3w2007', '', '8e2f314aded7ddd2be7961fb93d308a4'),
(44, 'eduardo felipe', 'marcano dominguez', '1212', 'eduardofelipe0208@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'virgen del valle', '5754', '1q2w3e', '', 'bc75bbdf118ce4dd71296c9ec935a31b'),
(47, 'paola', 'marcano', '12342', 'paola23@p', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'duquesa', '1000', 'f67tg', '', '5bb089881771aed8d437ef5638d9b7de'),
(48, 'Daniel', 'Martinez', '12.356.741', 'daniel@gmail.com', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Virgen de Guadalupe', '20.000', 'Arsh- QWE32D4', '', 'd79da72d537151678c9c4433b0b798b7');

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
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `embarcaciones`
--
ALTER TABLE `embarcaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
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
-- Indices de la tabla `sobre_nosotros`
--
ALTER TABLE `sobre_nosotros`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `embarcaciones`
--
ALTER TABLE `embarcaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `id_proceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

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
-- AUTO_INCREMENT de la tabla `sobre_nosotros`
--
ALTER TABLE `sobre_nosotros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios1`
--
ALTER TABLE `usuarios1`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
