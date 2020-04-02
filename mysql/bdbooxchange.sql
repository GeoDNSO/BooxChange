-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2020 a las 12:37:46
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdbooxchange`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `Id_Chat` int(11) NOT NULL,
  `Id_Usuario1` int(11) NOT NULL,
  `Id_Usuario2` int(11) NOT NULL,
  `NumMensajes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`Id_Chat`, `Id_Usuario1`, `Id_Usuario2`, `NumMensajes`) VALUES
(1, 2, 3, 7),
(2, 2, 5, 32),
(3, 5, 4, 21),
(4, 3, 6, 13),
(5, 5, 1, 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `Id_Comentario` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Texto` varchar(2000) DEFAULT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `Id_Discusion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`Id_Comentario`, `Id_Usuario`, `Texto`, `Fecha`, `Id_Discusion`) VALUES
(1, 5, 'Comentario Dummy jeje', '2020-03-08 00:00:00', 1),
(2, 4, 'Otro mas', '2020-03-06 00:00:00', 1),
(3, 2, 'Pues muy bien redactao el reglamento, si señor!.', '2020-03-08 00:00:00', 1),
(4, 1, 'Las devoluciones se harán efectivas en menos de 5 días hábiles', '2020-03-08 00:00:00', 2),
(5, 5, 'Funciona\r\n', '2020-03-26 23:18:13', 3),
(6, 10, 'oaidosakda\r\n', '2020-03-27 12:16:52', 3),
(7, 10, 'sfsadhfsudifhas', '2020-03-27 12:16:56', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `unidades` int(11) NOT NULL,
  `numTarjeta` int(11) NOT NULL,
  `coste` float NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `idUsuario`, `idLibro`, `unidades`, `numTarjeta`, `coste`, `fecha`) VALUES
(1, 2, 4, 3, 10342, 0, '0000-00-00 00:00:00'),
(2, 4, 4, 1, 1, 10, '0000-00-00 00:00:00'),
(3, 5, 1, 4, 123456, 50, '0000-00-00 00:00:00'),
(4, 10, 1, 1, 123123, 12.5, '0000-00-00 00:00:00'),
(5, 10, 1, 1, 121, 12.5, '0000-00-00 00:00:00'),
(6, 10, 1, 1, 123123, 12.5, '0000-00-00 00:00:00'),
(7, 10, 1, 1, 234234, 12.5, '0000-00-00 00:00:00'),
(8, 10, 1, 1, 2423, 12.5, '0000-00-00 00:00:00'),
(9, 10, 1, 1, 123, 12.5, '0000-00-00 00:00:00'),
(10, 10, 1, 1, 12321, 12.5, '0000-00-00 00:00:00'),
(11, 10, 1, 3, 232, 37.5, '0000-00-00 00:00:00'),
(12, 10, 1, 1, 42, 12.5, '0000-00-00 00:00:00'),
(13, 10, 1, 1, 12, 12.5, '0000-00-00 00:00:00'),
(14, 10, 1, 1, 123, 12.5, '0000-00-00 00:00:00'),
(15, 10, 1, 1, 123, 12.5, '0000-00-00 00:00:00'),
(16, 10, 1, 1, 323232, 12.5, '0000-00-00 00:00:00'),
(17, 10, 1, 1, 34, 12.5, '0000-00-00 00:00:00'),
(18, 5, 1, 1, 52353245, 13.5, '2020-03-27 12:14:24'),
(19, 10, 2, 3, 4532452, 60, '2020-03-27 12:28:30'),
(20, 10, 2, 3, 456456, 60, '2020-03-27 12:29:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discusion`
--

CREATE TABLE `discusion` (
  `Id_Discusion` int(11) NOT NULL,
  `Id_Usuario_Creador` int(11) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `Tema` varchar(30) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `NumComentarios` int(11) NOT NULL,
  `NumVisitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `discusion`
--

INSERT INTO `discusion` (`Id_Discusion`, `Id_Usuario_Creador`, `Fecha`, `Tema`, `Titulo`, `NumComentarios`, `NumVisitas`) VALUES
(1, 1, '2020-03-08 12:39:07', 'Reglamento', 'Cuidado de los libros', 5, 10),
(2, 1, '2020-03-08 12:53:07', 'FAQs', 'Contacto', 20, 57),
(3, 5, '2020-03-26 23:17:59', 'General', 'Funciona', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `Id_Libro` int(11) NOT NULL,
  `Id_Favorito` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`Id_Libro`, `Id_Favorito`, `Id_Usuario`) VALUES
(2, 1, 2),
(2, 2, 4),
(4, 3, 6),
(5, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `Genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`Genero`) VALUES
('Ciencia Ficción'),
('Comedia'),
('Drama'),
('Histórico'),
('Infantil'),
('Romántico'),
('Youtubers');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intercambios`
--

CREATE TABLE `intercambios` (
  `Id_Libro_Inter1` int(11) NOT NULL,
  `Id_Libro_Inter2` int(11) DEFAULT NULL,
  `EsMisterioso` tinyint(1) NOT NULL,
  `Id_Intercambio` int(11) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `intercambios`
--

INSERT INTO `intercambios` (`Id_Libro_Inter1`, `Id_Libro_Inter2`, `EsMisterioso`, `Id_Intercambio`, `Fecha`) VALUES
(3, 2, 1, 3, '2020-03-22 01:28:28'),
(47, 48, 1, 23, '2020-03-22 18:01:00'),
(52, 55, 0, 25, '2020-03-23 21:57:34'),
(53, 60, 0, 26, '2020-03-27 12:16:25'),
(56, 57, 0, 27, '2020-03-23 22:52:17'),
(58, NULL, 0, 28, '2020-03-24 14:01:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `Id_Libro` int(11) NOT NULL,
  `Titulo` varchar(30) NOT NULL,
  `Autor` varchar(30) NOT NULL,
  `Precio` float NOT NULL,
  `Valoracion` float DEFAULT NULL,
  `Ranking` int(5) DEFAULT NULL,
  `Imagen` varchar(300) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Genero` varchar(20) NOT NULL,
  `EnTienda` tinyint(1) NOT NULL,
  `Fecha` date NOT NULL,
  `Idioma` varchar(20) NOT NULL,
  `Editorial` varchar(20) NOT NULL,
  `Descuento` float DEFAULT NULL,
  `unidades` int(11) NOT NULL,
  `FechaPublicacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`Id_Libro`, `Titulo`, `Autor`, `Precio`, `Valoracion`, `Ranking`, `Imagen`, `Descripcion`, `Genero`, `EnTienda`, `Fecha`, `Idioma`, `Editorial`, `Descuento`, `unidades`, `FechaPublicacion`) VALUES
(1, 'Harry Potter', 'J.K. Rowling', 13.5, 2, NULL, '/fotosportadas/img.jpg', 'Libro de magia mu chulo', 'Ciencia Ficción', 1, '2020-03-08', 'Español', 'BOOKET', 10, 3, '0000-00-00'),
(2, 'Virtual Hero', 'El rubius', 20, 4, NULL, 'imgprotada/img2.jpg', 'Libro del famoso youtuber elrubius', 'Youtubers', 1, '2020-03-08', 'Español', 'BOOKET', NULL, 10, '0000-00-00'),
(3, 'El mapa de los afectos', 'Ana Merino', 15, NULL, NULL, 'fotosportada/img3.jpg', 'Valeria, una joven maestra de escuela que tiene una relación secreta con Tom, que le lleva treinta años, se enfrenta al dilema de los sentimientos y quiere entender el significado del amor.', 'Romántico', 0, '2020-03-05', 'Español', 'BOOKET', 5, 10, '0000-00-00'),
(4, 'A corazón abierto', 'Elvira Lindo', 17.99, 2, NULL, 'imgportada/img4.jpg', 'El auge y declive de una gran pasión, el amor feroz de dos personas que parecían conjurarse en contra de una vida serena.', 'Romántico', 0, '2020-03-05', 'Español', 'DIANA', NULL, 0, '0000-00-00'),
(5, 'Crónicas Marcianas', 'Ray Bradbury', 25.45, 5, NULL, 'imgportada/img5.jpg', 'Recopilación de relatos que recogen la crónica de la colonización de Marte por parte de una humanidad que huye de un mundo al borde de la destrucción. Los colonos llevan consigo sus deseos más íntimos y el sueño de reproducir en el Planeta Rojo una civilización de perritos calientes, cómodos sofás y limonada en el porche al atardecer. Pero su equipaje incluye también los miedos ancestrales, que se traducen en odio a lo diferente, y las enfermedades que diezmarán a los marcianos.', 'Ciencia Ficción', 1, '2020-03-06', 'Español', 'DIANA', 25, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `librointercambio`
--

CREATE TABLE `librointercambio` (
  `Id_Libro_Inter` int(11) NOT NULL,
  `AutorLibInter` varchar(30) NOT NULL,
  `Imagen` varchar(300) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Genero` varchar(20) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Titulo` varchar(30) NOT NULL,
  `Intercambiado` tinyint(1) NOT NULL,
  `esOferta` tinyint(4) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `librointercambio`
--

INSERT INTO `librointercambio` (`Id_Libro_Inter`, `AutorLibInter`, `Imagen`, `Descripcion`, `Genero`, `Id_Usuario`, `Titulo`, `Intercambiado`, `esOferta`, `Fecha`) VALUES
(1, 'autor', 'a', 'a', 'Romántico', 5, 'Libro Intercambio', 0, 0, '0000-00-00 00:00:00'),
(2, 'El rubius', 'imgportada/img.jpg', 'Libro de youtuber', 'Youtubers', 4, 'Virtual Hero', 1, 0, '2020-03-08 00:00:00'),
(3, 'Ana Merino', 'imgportada/img2.jpg', 'No me acuerdo de que va jajasalu2', 'Romántico', 6, 'El mapa de los afectos', 0, 0, '2020-03-05 00:00:00'),
(47, 'DROSS', 'nada', 'Libro Misterioso', 'Ciencia Ficción', 5, 'No es un libro', 1, 0, '2020-03-22 18:00:27'),
(48, 'Autor', 'NO HAY', 'Libro Misterioso', 'Ciencia Ficción', 10, 'MI LIBRO', 1, 0, '2020-03-22 18:01:00'),
(52, 'Sanderson', 'No', 'Muy bien', 'Ciencia Ficción', 5, 'Archivo de las Tormentas', 1, 0, '2020-03-23 00:07:31'),
(53, 'Sanderson', 'nada', 'Increíble libro de Sanderson', 'Ciencia Ficción', 10, 'El Camino De Los Reyes', 1, 0, '2020-03-23 15:43:23'),
(55, 'fdsafasdf', 'asdfdsfas', 'asdfasdfsafdsa', 'Ciencia Ficción', 10, 'fdsfsadf', 1, 0, '2020-03-23 21:27:59'),
(56, 'Sanderson', 'nada', 'Es muy difícil de leer quiero un libro infantil', 'Ciencia Ficción', 5, 'El Imperio Final', 1, 0, '2020-03-23 22:50:10'),
(57, 'Jerry Pinkney', 'nada', 'Toma libro, este seguro que lo entiendes, pls dame ese libro', 'Infantil', 10, 'Caperucita Roja', 1, 0, '2020-03-23 22:51:23'),
(58, 'Desc', 'asda', 'Cambiamelo por lo que sea anda', 'Ciencia Ficción', 5, 'CSS para dummies', 0, 0, '2020-03-24 14:01:25'),
(59, 'sdasda', 'asdasda', 'Pedazo de libro', 'Ciencia Ficción', 10, 'sdasd', 0, 0, '2020-03-24 14:02:14'),
(60, 'Desconocido', 'no hay', 'Igual te encanta este libro, cambiamelo', 'Infantil', 5, 'Caperutcita Roja', 1, 0, '2020-03-27 12:15:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajechat`
--

CREATE TABLE `mensajechat` (
  `Id_Chat` int(11) NOT NULL,
  `Id_Mensaje_Chat` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Texto` varchar(1000) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajechat`
--

INSERT INTO `mensajechat` (`Id_Chat`, `Id_Mensaje_Chat`, `Id_Usuario`, `Texto`, `Fecha`) VALUES
(1, 1, 2, 'Hola!', '2020-03-08 00:00:00'),
(1, 2, 2, 'Estaba interesado en uno', '2020-03-08 00:00:00'),
(1, 3, 2, 'De tus libros para intercambiar', '2020-03-08 00:00:00'),
(1, 4, 5, 'Cual de todos?', '2020-03-08 00:00:00'),
(1, 5, 2, 'El de harry potter', '2020-03-08 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `leido` tinyint(1) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `idUsuario`, `mensaje`, `leido`, `fecha`) VALUES
(1, 5, 'Notificación de prueba', 1, '2020-03-22 14:24:22'),
(8, 5, 'Ya se ha completado su intercambio misterioso con el usuario user5, ha recibido el libro MI LIBRO a cambio de su libro No es un libro. Que suerte!!!', 1, '2020-03-22 18:01:00'),
(9, 5, 'Ya se ha completado el intercambio entre usted y user5, se han intercambiado los libros fdsfsadf y Archivo de las Tormentas', 1, '2020-03-23 21:59:04'),
(10, 10, 'Ya se ha completado el intercambio entre usted y Geo, se han intercambiado los libros Archivo de las Tormentas y fdsfsadf', 1, '2020-03-23 21:59:04'),
(11, 5, 'Ya se ha completado el intercambio entre usted y user5, se han intercambiado los libros Caperucita Roja y El Imperio Final', 1, '2020-03-23 22:52:17'),
(12, 10, 'Ya se ha completado el intercambio entre usted y Geo, se han intercambiado los libros El Imperio Final y Caperucita Roja', 1, '2020-03-23 22:52:17'),
(13, 10, 'Ya se ha completado el intercambio entre usted y Geo, se han intercambiado los libros Caperutcita Roja y El Camino De Los Reyes', 1, '2020-03-27 12:16:25'),
(14, 5, 'Ya se ha completado el intercambio entre usted y user5, se han intercambiado los libros El Camino De Los Reyes y Caperutcita Roja', 0, '2020-03-27 12:16:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertasintercambio`
--

CREATE TABLE `ofertasintercambio` (
  `id` int(11) NOT NULL,
  `idLibroIntercambio` int(11) NOT NULL,
  `idLibroOferta` int(11) NOT NULL,
  `ofertaAceptada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ofertasintercambio`
--

INSERT INTO `ofertasintercambio` (`id`, `idLibroIntercambio`, `idLibroOferta`, `ofertaAceptada`) VALUES
(2, 3, 48, 1),
(4, 52, 55, 1),
(5, 56, 57, 1),
(6, 58, 59, 2),
(7, 53, 60, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `Tema` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`Tema`) VALUES
('Club de Lectura'),
('Críticas'),
('Devoluciones'),
('FAQs'),
('General'),
('Reglamento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `NombreReal` varchar(30) NOT NULL,
  `Contraseña` varchar(64) NOT NULL,
  `Correo` varchar(20) NOT NULL,
  `Foto` varchar(300) DEFAULT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Nacimiento` date NOT NULL,
  `Ciudad` varchar(15) NOT NULL,
  `FechaDeCreacion` datetime NOT NULL DEFAULT current_timestamp(),
  `Rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Nombre`, `NombreReal`, `Contraseña`, `Correo`, `Foto`, `Direccion`, `Nacimiento`, `Ciudad`, `FechaDeCreacion`, `Rol`) VALUES
(1, 'admin', 'Jin', '$2y$10$jXlPNRuqn9dEXwJkYbaSh.ALvfWtYEHRuFHEGXGY0WqcJ0sfm6w2S', 'hola@sad.com', '/fotos/fotos/img1.jpg', 'Mi casa', '2020-03-07', 'sadas', '2020-03-16 20:07:18', 0),
(2, 'xAlex', 'Alex', '$2y$10$PRkJe1JoBxw4QUNpueSB2.QBGeQuBSDU.EUokxw9e.u3FSy8dBI7q', 'alro12@ucm.es', '/fotos/fotos/img2.jpg', 'Calle Madrid', '1996-04-19', 'Barcelona', '2020-03-16 20:08:20', 1),
(3, 'Javier ', 'User3', '$2y$10$WzsGXsEBnrzNWpQe983aVuV.DvLh.qU4I1pZsKoVX8Q5eeoCuE47e', 'dani@gmail.com', '/fotos/fotos/img3.jpg', 'Calle la casa', '1996-08-12', 'Madrid', '2020-03-16 20:08:42', 1),
(4, 'Sergiox', 'Sergio García', '$2y$10$0/IMnYZrpuJlfMJ4PXgHCO9C0VYt0K576pfRJjirbtmQbvwpnWxJe\r\n', 'Serg@gmail.com', '/fotos/fotos/img4.jpg', 'Calle Los angeles', '1997-08-19', 'Valencia', '2020-03-16 20:09:37', 2),
(5, 'Geo', 'Daniel ', '$2y$12$YnvgZwS4gju5WQJKRjftiOCgfFVqQqtcl0GBhnZ5yV2ux5nCd4EtW', 'dsanto07@ucm.es', '/fotos/fotos/img5.jpg', 'Mi Casa', '1999-12-22', 'Madrid', '2020-03-20 17:56:46', 0),
(6, 'LuiSHer', 'Luis Hernández', '$2y$10$hOhrx2qQo6r04DG9aVOJE.6G.WJd3X3u9tQQY9qwWJ1nZLizsufhW', 'Serg@gmail.com', '/fotos/fotos/img6.jpg', 'Calle Los angeles', '1997-08-19', 'Salamanca', '2020-03-16 20:10:04', 2),
(10, 'user5', 'pablo', '$2y$10$Ae6ouAPUoc54K5jOHozvgO2Or/8m/NpFIhkUUYYgNvwjubS/juDFy', 'asda', 'hola', 'hola', '2020-02-02', 'hola', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracionlibro`
--

CREATE TABLE `valoracionlibro` (
  `Id_Libro` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Valoracion` int(1) NOT NULL,
  `Comentario` varchar(100) DEFAULT NULL,
  `Id_Valoracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `valoracionlibro`
--

INSERT INTO `valoracionlibro` (`Id_Libro`, `Id_Usuario`, `Valoracion`, `Comentario`, `Id_Valoracion`) VALUES
(1, 2, 5, 'Muy buen libro, 100% recomendado', 1),
(1, 5, 0, 'Me ha gustado tan poco que ni lo he terminado', 2),
(2, 4, 3, 'No hay derecho a que tenga que pagar ese dinero por este libro, si se puede llamar asi. Nos salen lo', 3),
(5, 3, 5, 'No me esperaba que fuera así, lectura recomendada! Fascinante!', 4),
(4, 2, 2, 'Buen libro para pasar las horas en el metro.', 5),
(2, 6, 5, 'Codigo Rubiuh en la tienda del fortnite', 6),
(1, 1, 1, 'ewqweqweqweqweqwe', 7);

--
-- Disparadores `valoracionlibro`
--
DELIMITER $$
CREATE TRIGGER `mediaValoracion` AFTER INSERT ON `valoracionlibro` FOR EACH ROW UPDATE libro
    SET valoracion = (SELECT AVG(valoracion) FROM valoracionlibro
                      WHERE libro.Id_Libro = valoracionlibro.Id_Libro)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `mediaValoracion2` AFTER UPDATE ON `valoracionlibro` FOR EACH ROW UPDATE libro
    SET valoracion = (SELECT AVG(valoracion) FROM valoracionlibro
                      WHERE libro.Id_Libro = valoracionlibro.Id_Libro)
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`Id_Chat`),
  ADD KEY `Id_Usuario1` (`Id_Usuario1`) USING BTREE,
  ADD KEY `Id_Usuario2` (`Id_Usuario2`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`Id_Comentario`),
  ADD KEY `Id_Discusion` (`Id_Discusion`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idLibro` (`idLibro`);

--
-- Indices de la tabla `discusion`
--
ALTER TABLE `discusion`
  ADD PRIMARY KEY (`Id_Discusion`),
  ADD KEY `Id_Usuario_Creador` (`Id_Usuario_Creador`),
  ADD KEY `Id_Tema` (`Tema`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`Id_Favorito`) USING BTREE,
  ADD KEY `Id_Libro` (`Id_Libro`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`Genero`);

--
-- Indices de la tabla `intercambios`
--
ALTER TABLE `intercambios`
  ADD PRIMARY KEY (`Id_Intercambio`) USING BTREE,
  ADD KEY `Id_Libro_Inter2` (`Id_Libro_Inter2`),
  ADD KEY `Id_Libro_Inter1` (`Id_Libro_Inter1`),
  ADD KEY `Id_Libro_Inter1_2` (`Id_Libro_Inter1`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`Id_Libro`),
  ADD UNIQUE KEY `Autor` (`Autor`),
  ADD UNIQUE KEY `Ranking` (`Ranking`),
  ADD KEY `Genero` (`Genero`);

--
-- Indices de la tabla `librointercambio`
--
ALTER TABLE `librointercambio`
  ADD PRIMARY KEY (`Id_Libro_Inter`) USING BTREE,
  ADD KEY `Id_Usuario` (`Id_Usuario`),
  ADD KEY `Genero` (`Genero`),
  ADD KEY `AutorLibInter` (`AutorLibInter`);

--
-- Indices de la tabla `mensajechat`
--
ALTER TABLE `mensajechat`
  ADD PRIMARY KEY (`Id_Mensaje_Chat`),
  ADD KEY `Id_Chat` (`Id_Chat`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `ofertasintercambio`
--
ALTER TABLE `ofertasintercambio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLibroIntercambio` (`idLibroIntercambio`),
  ADD KEY `idLibroOferta` (`idLibroOferta`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`Tema`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `valoracionlibro`
--
ALTER TABLE `valoracionlibro`
  ADD PRIMARY KEY (`Id_Valoracion`) USING BTREE,
  ADD KEY `Id_Usuario` (`Id_Usuario`),
  ADD KEY `Id_Libro` (`Id_Libro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `Id_Chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `Id_Comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `discusion`
--
ALTER TABLE `discusion`
  MODIFY `Id_Discusion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `Id_Favorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `intercambios`
--
ALTER TABLE `intercambios`
  MODIFY `Id_Intercambio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `Id_Libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `librointercambio`
--
ALTER TABLE `librointercambio`
  MODIFY `Id_Libro_Inter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `mensajechat`
--
ALTER TABLE `mensajechat`
  MODIFY `Id_Mensaje_Chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `ofertasintercambio`
--
ALTER TABLE `ofertasintercambio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `valoracionlibro`
--
ALTER TABLE `valoracionlibro`
  MODIFY `Id_Valoracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`Id_Usuario1`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`Id_Usuario2`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`Id_Discusion`) REFERENCES `discusion` (`Id_Discusion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`Id_Libro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `discusion`
--
ALTER TABLE `discusion`
  ADD CONSTRAINT `discusion_ibfk_1` FOREIGN KEY (`Id_Usuario_Creador`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discusion_ibfk_2` FOREIGN KEY (`Tema`) REFERENCES `tema` (`Tema`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`Id_Libro`) REFERENCES `libro` (`Id_Libro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `intercambios`
--
ALTER TABLE `intercambios`
  ADD CONSTRAINT `intercambios_ibfk_1` FOREIGN KEY (`Id_Libro_Inter2`) REFERENCES `librointercambio` (`Id_Libro_Inter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `intercambios_ibfk_2` FOREIGN KEY (`Id_Libro_Inter1`) REFERENCES `librointercambio` (`Id_Libro_Inter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`Genero`) REFERENCES `genero` (`Genero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `librointercambio`
--
ALTER TABLE `librointercambio`
  ADD CONSTRAINT `librointercambio_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `librointercambio_ibfk_3` FOREIGN KEY (`Genero`) REFERENCES `genero` (`Genero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajechat`
--
ALTER TABLE `mensajechat`
  ADD CONSTRAINT `mensajechat_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensajechat_ibfk_2` FOREIGN KEY (`Id_Chat`) REFERENCES `chat` (`Id_Chat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ofertasintercambio`
--
ALTER TABLE `ofertasintercambio`
  ADD CONSTRAINT `ofertasintercambio_ibfk_1` FOREIGN KEY (`idLibroIntercambio`) REFERENCES `librointercambio` (`Id_Libro_Inter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ofertasintercambio_ibfk_2` FOREIGN KEY (`idLibroOferta`) REFERENCES `librointercambio` (`Id_Libro_Inter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoracionlibro`
--
ALTER TABLE `valoracionlibro`
  ADD CONSTRAINT `valoracionlibro_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoracionlibro_ibfk_2` FOREIGN KEY (`Id_Libro`) REFERENCES `libro` (`Id_Libro`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
