-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2020 a las 15:49:56
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

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
  `Fecha` date NOT NULL,
  `Id_Discusion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`Id_Comentario`, `Id_Usuario`, `Texto`, `Fecha`, `Id_Discusion`) VALUES
(1, 5, 'Comentario Dummy jeje', '2020-03-08', 1),
(2, 4, 'Otro mas', '2020-03-06', 1),
(3, 2, 'Pues muy bien redactao el reglamento, si señor!.', '2020-03-08', 1),
(4, 1, 'Las devoluciones se harán efectivas en menos de 5 días hábiles', '2020-03-08', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `unidades` int(11) NOT NULL,
  `numTarjeta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `idUsuario`, `idLibro`, `unidades`, `numTarjeta`) VALUES
(1, 2, 4, 3, 10342);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discusion`
--

CREATE TABLE `discusion` (
  `Id_Discusion` int(11) NOT NULL,
  `Id_Usuario_Creador` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Tema` varchar(30) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `NumComentarios` int(11) NOT NULL,
  `NumVisitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `discusion`
--

INSERT INTO `discusion` (`Id_Discusion`, `Id_Usuario_Creador`, `Fecha`, `Tema`, `Titulo`, `NumComentarios`, `NumVisitas`) VALUES
(1, 1, '2020-03-08 11:39:07', 'Reglamento', 'Cuidado de los libros', 5, 10),
(2, 1, '2020-03-08 11:53:07', 'FAQ\'s', 'Contacto', 20, 57);

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
  `Id_Libro_Inter2` int(11) NOT NULL,
  `EsMisterioso` tinyint(1) NOT NULL,
  `Id_Intercambio` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `intercambios`
--

INSERT INTO `intercambios` (`Id_Libro_Inter1`, `Id_Libro_Inter2`, `EsMisterioso`, `Id_Intercambio`, `Fecha`) VALUES
(1, 2, 1, 1, '2020-03-08 11:01:52'),
(4, 3, 0, 2, '2020-03-06 10:01:52');

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
  `unidades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`Id_Libro`, `Titulo`, `Autor`, `Precio`, `Valoracion`, `Ranking`, `Imagen`, `Descripcion`, `Genero`, `EnTienda`, `Fecha`, `Idioma`, `Editorial`, `Descuento`, `unidades`) VALUES
(1, 'Harry Potter', 'J.K. Rowling', 12.5, 5, NULL, '/fotosportadas/img.jpg', 'Libro de magia mu chulo', 'Ciencia Ficción', 1, '2020-03-08', 'Español', 'BOOKET', 10, 10),
(2, 'Virtual Hero', 'El rubius', 20, 4, NULL, 'imgprotada/img2.jpg', 'Libro del famoso youtuber elrubius', 'Youtubers', 1, '2020-03-08', 'Español', 'BOOKET', NULL, 10),
(3, 'El mapa de los afectos', 'Ana Merino', 15, NULL, NULL, 'fotosportada/img3.jpg', 'Valeria, una joven maestra de escuela que tiene una relación secreta con Tom, que le lleva treinta años, se enfrenta al dilema de los sentimientos y quiere entender el significado del amor.', 'Romántico', 0, '2020-03-05', 'Español', 'BOOKET', 5, 10),
(4, 'A corazón abierto', 'Elvira Lindo', 17.99, NULL, NULL, 'imgportada/img4.jpg', 'El auge y declive de una gran pasión, el amor feroz de dos personas que parecían conjurarse en contra de una vida serena.', 'Romántico', 0, '2020-03-05', 'Español', 'DIANA', NULL, 0),
(5, 'Crónicas Marcianas', 'Ray Bradbury', 25.45, 4, NULL, 'imgportada/img5.jpg', 'Recopilación de relatos que recogen la crónica de la colonización de Marte por parte de una humanidad que huye de un mundo al borde de la destrucción. Los colonos llevan consigo sus deseos más íntimos y el sueño de reproducir en el Planeta Rojo una civilización de perritos calientes, cómodos sofás y limonada en el porche al atardecer. Pero su equipaje incluye también los miedos ancestrales, que se traducen en odio a lo diferente, y las enfermedades que diezmarán a los marcianos.', 'Ciencia Ficción', 1, '2020-03-06', 'Español', 'DIANA', 25, 0);

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
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `librointercambio`
--

INSERT INTO `librointercambio` (`Id_Libro_Inter`, `AutorLibInter`, `Imagen`, `Descripcion`, `Genero`, `Id_Usuario`, `Titulo`, `Intercambiado`, `Fecha`) VALUES
(2, 'El rubius', 'imgportada/img.jpg', 'Libro de youtuber', 'Youtubers', 4, 'Virtual Hero', 1, '2020-03-08'),
(3, 'Ana Merino', 'imgportada/img2.jpg', 'No me acuerdo de que va jajasalu2', 'Romántico', 6, 'El mapa de los afectos', 1, '2020-03-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajechat`
--

CREATE TABLE `mensajechat` (
  `Id_Chat` int(11) NOT NULL,
  `Id_Mensaje_Chat` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Texto` varchar(1000) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajechat`
--

INSERT INTO `mensajechat` (`Id_Chat`, `Id_Mensaje_Chat`, `Id_Usuario`, `Texto`, `Fecha`) VALUES
(1, 1, 2, 'Hola!', '2020-03-08'),
(1, 2, 2, 'Estaba interesado en uno', '2020-03-08'),
(1, 3, 2, 'De tus libros para intercambiar', '2020-03-08'),
(1, 4, 5, 'Cual de todos?', '2020-03-08'),
(1, 5, 2, 'El de harry potter', '2020-03-08');

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
('FAQ\'s'),
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
  `FechaDeCreacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Nombre`, `NombreReal`, `Contraseña`, `Correo`, `Foto`, `Direccion`, `Nacimiento`, `Ciudad`, `FechaDeCreacion`, `Rol`) VALUES
(1, 'admin', 'Jin', 'adminpass', 'hola@sad.com', '/fotos/fotos/img1.jpg', 'Mi casa', '2020-03-07', 'sadas', '2020-03-07 13:31:39', 0),
(2, 'xAlex', 'Alex', 'asdasd', 'alro12@ucm.es', '/fotos/fotos/img2.jpg', 'Calle Madrid', '1996-04-19', 'Barcelona', '2020-03-07 11:27:29', 1),
(3, 'Javier ', 'User3', 'pass3', 'dani@gmail.com', '/fotos/fotos/img3.jpg', 'Calle la casa', '1996-08-12', 'Madrid', '2020-03-08 10:41:35', 1),
(4, 'Sergiox', 'Sergio García', 'pass4', 'Serg@gmail.com', '/fotos/fotos/img4.jpg', 'Calle Los angeles', '1997-08-19', 'Valencia', '2020-03-09 10:40:08', 2),
(5, 'Daniel96', 'Daniel Rodriguez', 'pass3', 'dani@gmail.com', '/fotos/fotos/img5.jpg', 'Calle la casa', '1996-08-12', 'Madrid', '2020-03-07 10:39:03', 1),
(6, 'LuiSHer', 'Luis Hernández', 'pass6', 'Serg@gmail.com', '/fotos/fotos/img6.jpg', 'Calle Los angeles', '1997-08-19', 'Salamanca', '2020-03-08 11:03:35', 2);

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
(2, 6, 5, 'Codigo Rubiuh en la tienda del fortnite', 6);

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
  ADD KEY `Id_Libro_Inter1` (`Id_Libro_Inter1`);

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
  MODIFY `Id_Comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `discusion`
--
ALTER TABLE `discusion`
  MODIFY `Id_Discusion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `Id_Favorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `intercambios`
--
ALTER TABLE `intercambios`
  MODIFY `Id_Intercambio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `Id_Libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mensajechat`
--
ALTER TABLE `mensajechat`
  MODIFY `Id_Mensaje_Chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `valoracionlibro`
--
ALTER TABLE `valoracionlibro`
  MODIFY `Id_Valoracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `intercambios_ibfk_1` FOREIGN KEY (`Id_Libro_Inter1`) REFERENCES `libro` (`Id_Libro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `intercambios_ibfk_2` FOREIGN KEY (`Id_Libro_Inter2`) REFERENCES `libro` (`Id_Libro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`Genero`) REFERENCES `genero` (`Genero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `librointercambio`
--
ALTER TABLE `librointercambio`
  ADD CONSTRAINT `librointercambio_ibfk_1` FOREIGN KEY (`Id_Libro_Inter`) REFERENCES `libro` (`Id_Libro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `librointercambio_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `librointercambio_ibfk_3` FOREIGN KEY (`Genero`) REFERENCES `genero` (`Genero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `librointercambio_ibfk_4` FOREIGN KEY (`AutorLibInter`) REFERENCES `libro` (`Autor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajechat`
--
ALTER TABLE `mensajechat`
  ADD CONSTRAINT `mensajechat_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensajechat_ibfk_2` FOREIGN KEY (`Id_Chat`) REFERENCES `chat` (`Id_Chat`) ON DELETE CASCADE ON UPDATE CASCADE;

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
