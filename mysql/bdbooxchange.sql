-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2020 a las 18:29:25
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

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
  `NumMensajes` int(11) NOT NULL,
  `mensajesSinLeer` int(11) NOT NULL,
  `mensajesSinLeer2` int(11) NOT NULL,
  `fechaActividad` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `Id_Libro` int(11) NOT NULL,
  `Id_Favorito` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `Genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generolibros`
--

CREATE TABLE `generolibros` (
  `id` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajechat`
--

CREATE TABLE `mensajechat` (
  `Id_Chat` int(11) NOT NULL,
  `Id_Mensaje_Chat` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Texto` varchar(1000) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `mensajechat`
--
DELIMITER $$
CREATE TRIGGER `aumentoMensajesChat` AFTER INSERT ON `mensajechat` FOR EACH ROW UPDATE chat
	SET chat.NumMensajes = chat.NumMensajes+1
    WHERE chat.Id_Chat=Id_Chat
$$
DELIMITER ;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `Tema` varchar(30) NOT NULL,
  `Descripcion` varchar(350) NOT NULL,
  `Imagen` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'admin', 'Administrador', '$2y$12$IgSk5wgr4BPD0PiSzHqGdeQau3iwvAAlSuFSA3eJNM28zKTzTlbSi', 'hola@sad.com', 'imagenes/usuarios/default.png', 'Mi casa', '2020-03-07', 'sadas', '2020-03-16 20:07:18', 0),
(2, 'xAlex', 'Alex', '$2y$10$PRkJe1JoBxw4QUNpueSB2.QBGeQuBSDU.EUokxw9e.u3FSy8dBI7q', 'alro12@ucm.es', 'imagenes/usuarios/default.png', 'Calle Madrid', '1996-04-19', 'Barcelona', '2020-03-16 20:08:20', 1),
(3, 'Javier ', 'User3', '$2y$10$WzsGXsEBnrzNWpQe983aVuV.DvLh.qU4I1pZsKoVX8Q5eeoCuE47e', 'dani@gmail.com', 'imagenes/usuarios/default.png', 'Calle la casa', '1996-08-12', 'Madrid', '2020-03-16 20:08:42', 1),
(4, 'Sergiox', 'Sergio García', '$2y$10$0/IMnYZrpuJlfMJ4PXgHCO9C0VYt0K576pfRJjirbtmQbvwpnWxJe\r\n', 'Serg@gmail.com', 'imagenes/usuarios/default.png', 'Calle Los angeles', '1997-08-19', 'Valencia', '2020-03-16 20:09:37', 2),
(5, 'Geo', 'Daniel', '$2y$12$YnvgZwS4gju5WQJKRjftiOCgfFVqQqtcl0GBhnZ5yV2ux5nCd4EtW', 'dsanto07@ucm.es', 'imagenes/usuarios/xion.gif', 'Mi Casa', '1999-12-22', 'Madrid', '2020-03-20 17:56:46', 0),
(6, 'LuiSHer', 'Luis Hernández', '$2y$10$hOhrx2qQo6r04DG9aVOJE.6G.WJd3X3u9tQQY9qwWJ1nZLizsufhW', 'Serg@gmail.com', 'imagenes/usuarios/default.png', 'Calle Los angeles', '1997-08-19', 'Salamanca', '2020-03-16 20:10:04', 2),
(10, 'user5', 'pablo', '$2y$10$Ae6ouAPUoc54K5jOHozvgO2Or/8m/NpFIhkUUYYgNvwjubS/juDFy', 'asda', 'imagenes/usuarios/default.png', 'hola', '2020-02-02', 'hola', '0000-00-00 00:00:00', 1),
(11, 'dani12', 'dfsdfs', '$2y$10$.HltE6BcGJWI2etJUl5PFOkkZh60tNvvtpnZIcoOEKdmxtW0VTZu.', 'asdaxdasdas', 'imagenes/usuarios/default.png', 'asdad', '2020-04-30', 'sda', '2020-04-02 16:12:50', 1),
(12, 'dani13', '43342', '$2y$10$RiSL6Uv3Ji5dOntxmsG3geu83lBVH8GVqqacYqs4K6kycOeOXD5yu', 'aaaaaaaaaaaaaa', 'imagenes/usuarios/default.png', 'asdasdsadas', '2020-04-01', 'adsasdasd', '2020-04-02 16:17:32', 1),
(13, 'user', 'Usuario', '$2y$12$ALf/uwh6wYQubFn3761HWOnzWyR6fZ6p.yEwCRCKYxK2x4exBYRNe', 'a', 'imagenes/usuarios/default.png', 'a', '2020-04-01', 'a', '2020-04-02 18:47:19', 1),
(14, 'mod', 'Moderador', '$2y$12$5UGSb62o/BgY/bto0aXMqO4pt4obvflUx8Ss3eDfw6X3RJyTCipWq', 'a', 'imagenes/usuarios/default.png', 'a', '2020-04-01', 'a', '2020-04-02 18:47:19', 2);

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
-- Disparadores `valoracionlibro`
--
DELIMITER $$
CREATE TRIGGER `mediaValoracion` AFTER INSERT ON `valoracionlibro` FOR EACH ROW UPDATE libro
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
-- Indices de la tabla `generolibros`
--
ALTER TABLE `generolibros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLibro` (`idLibro`),
  ADD KEY `idGenero` (`genero`);

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
  MODIFY `Id_Chat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `Id_Comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `discusion`
--
ALTER TABLE `discusion`
  MODIFY `Id_Discusion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `Id_Favorito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generolibros`
--
ALTER TABLE `generolibros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `intercambios`
--
ALTER TABLE `intercambios`
  MODIFY `Id_Intercambio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `Id_Libro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `librointercambio`
--
ALTER TABLE `librointercambio`
  MODIFY `Id_Libro_Inter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajechat`
--
ALTER TABLE `mensajechat`
  MODIFY `Id_Mensaje_Chat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ofertasintercambio`
--
ALTER TABLE `ofertasintercambio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `valoracionlibro`
--
ALTER TABLE `valoracionlibro`
  MODIFY `Id_Valoracion` int(11) NOT NULL AUTO_INCREMENT;

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
-- Filtros para la tabla `generolibros`
--
ALTER TABLE `generolibros`
  ADD CONSTRAINT `generolibros_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`Id_Libro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generolibros_ibfk_2` FOREIGN KEY (`genero`) REFERENCES `genero` (`Genero`) ON DELETE CASCADE ON UPDATE CASCADE;

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
