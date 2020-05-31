-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2020 a las 17:47:59
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `booxchange`
--
CREATE DATABASE IF NOT EXISTS `booxchange` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `booxchange`;

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

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`Id_Chat`, `Id_Usuario1`, `Id_Usuario2`, `NumMensajes`, `mensajesSinLeer`, `mensajesSinLeer2`, `fechaActividad`) VALUES
(2, 1, 5, 4, 3, 0, '2020-05-05 18:42:50'),
(3, 17, 5, 21, 0, 0, '2020-05-27 17:42:19'),
(5, 23, 1, 0, 0, 0, '2020-05-29 17:50:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `Id_Comentario` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Texto` varchar(5000) DEFAULT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `Id_Discusion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`Id_Comentario`, `Id_Usuario`, `Texto`, `Fecha`, `Id_Discusion`) VALUES
(2, 5, 'Pues eso, que solo me he visto las películas y aun así no me convence mucho, merece la pena leerse el libro?', '2020-05-10 20:42:32', 3),
(3, 17, 'Desde mi punto de vista es una gran saga para retomar el mundo de la lectura. Aunque ya sepas cómo acaba la historia, en el libro hay matices que la película pierde. Espero si empiezas la saga coméntanso que tal ha parecido.\r\n\r\nSaluditos Muggle', '2020-05-10 20:46:30', 3),
(5, 18, '', '2020-05-10 20:53:56', 5),
(6, 18, '', '2020-05-10 20:53:56', 5),
(7, 18, '', '2020-05-10 20:53:57', 5),
(8, 18, '', '2020-05-10 20:53:57', 5),
(9, 18, 'Bernardo tiene Razón, es una gran sala', '2020-05-10 20:55:19', 3),
(10, 5, '<ol>\r\n<li><strong> Comportamiento general</strong></li>\r\n</ol>\r\n<ul>\r\n<li>Respeto mutuo No se permiten los insultos, los menosprecio, la falta al respeto ajeno, las calumnias ni la arrogancia excesiva, ya sea en temas p&uacute;blicos, mensajes privados o firmas y avatares.</li>\r\n<li>Discusiones personales Toda discusi&oacute;n personal debe tomar lugar en otro medio; el moderador puede borrar los posts o separar/cerrar el thread seg&uacute;n el caso.</li>\r\n<li>Temas prohibidos No se permite hablar de Sexo ni Religi&oacute;n en el foro. Esto incluye mensajes, firmas, im&aacute;genes y v&iacute;deos (especialmente si incluyen contenido desagradable como violencia gr&aacute;fica o gore).</li>\r\n<li>Prohibici&oacute;n de multicuenta Cada usuario solo puede disponer de una cuenta; si se quiere acceder a varias cuentas desde el mismo dispositivo (por ejemplo, de hermanos), debe notificar a un administrador. En caso contrario, se bloquear&aacute;n todas las cuentas.</li>\r\n<li>Cambios de Nick Se debe hacer la solicitud en este thread, cumpliendo sus normas.</li>\r\n</ul>\r\n<ol start=\"2\">\r\n<li><strong> Reglas sobre Mensajes</strong></li>\r\n</ol>\r\n<ul>\r\n<li>Temas repetidos Se recomienda visitar el foro antes de hacer una pregunta, por si esta ya ha sido respondida en otro tema o en el FAQ del subforo.</li>\r\n<li>Prohibici&oacute;n de Spam y Flood</li>\r\n<li>Flood Postear mensajes cortos y sin contenido, sin sentido o sin esperar a que otros usuarios respondan. El moderador puede borrar estos mensajes. El Flood se permite en el subforo de El Manicomio.</li>\r\n<li>Spam Publicitar un producto o servicio sin que tenga que ver con el tema, no le aporte nada o que ya se pueda encontrar en BooxChange, sea en un tema, por mensaje privado o en firmas y avatares. La publicaci&oacute;n sin permiso de spam ser&aacute; inmediatamente removida.</li>\r\n<li>Usuarios con menos de 300 mensajes Pueden pedir permiso al staff si es para publicar contenido relevante y no abusivo.</li>\r\n<li>Usuarios con m&aacute;s de 300 mensajes Pueden publicar contenido si es relevante y el &uacute;nico objetivo es la autopromoci&oacute;n.</li>\r\n<li>Escritura y Ortograf&iacute;a El texto deber&iacute;a tener un tama&ntilde;o razonable, sin escribir en may&uacute;sculas. La ortograf&iacute;a no deber&iacute;a impedir que se entienda tu mensaje. Tampoco es recomendable usar un lenguaje demasiado abreviado ni confuso.</li>\r\n<li>Emoticonos Evita el uso de emoticonos de forma abusiva, puesto que puede confundir al resto de usuarios.</li>\r\n<li>Citas injustificadas Intenta citar solo la parte del mensaje a la que vas a responder.</li>\r\n</ul>\r\n<ol start=\"3\">\r\n<li><strong> Adecuaci&oacute;n al Tema</strong></li>\r\n</ol>\r\n<ul>\r\n<li>Se deben seguir las Reglas Particulares del Tema</li>\r\n<li>Adecuaci&oacute;n del tema al subforo El moderador puede mover el tema a donde deba estar, y tiene la &uacute;ltima palabra en caso de discrepar con el autor. En caso de discrepar con un moderador, puedes escribir a un administrador.</li>\r\n<li>Claridad del t&iacute;tulo del tema Si no expresa, dentro de lo posible, el contenido el mensaje, el moderador podr&aacute; cambiarlo.</li>\r\n<li>Desv&iacute;os y Divisi&oacute;n de Threads El moderador puede redirigir los desv&iacute;os en una conversaci&oacute;n, o bien separarlo en un tema aparte o eliminarlo si no es de inter&eacute;s.</li>\r\n<li>Spoilers Si un tema contiene spoilers, debe indicarse en el t&iacute;tulo con una etiqueta. Se recomienda tambi&eacute;n esconder este contenido con el comando \"spoiler\", que solo los usuarios registrados pueden abrir.</li>\r\n</ul>\r\n<ol start=\"4\">\r\n<li><strong> Reglas sobre Copyright</strong></li>\r\n</ol>\r\n<ul>\r\n<li>Prohibiciones</li>\r\n<li>Pedir o publicar libros sin licencia.</li>\r\n<li>Pedir o publicar obras con copyright (excepto im&aacute;genes y v&iacute;deos).</li>\r\n<li>P&aacute;ginas con contenido ilegal No se permiten links a descargas ni a p&aacute;ginas destinadas &uacute;nicamente a esto</li>\r\n</ul>\r\n<ol start=\"5\">\r\n<li><strong> Moderaci&oacute;n</strong></li>\r\n</ol>\r\n<ul>\r\n<li>Selecci&oacute;n La hace el administrador. Lo m&aacute;s importante para llegar a ser moderador es no querer serlo.</li>\r\n<li>Solicitudes Es el staff el que decide qui&eacute;n pasar&aacute; a ser moderador, as&iacute; que hacer una solicitud ser&aacute; in&uacute;til.</li>\r\n<li>Autoridad Se debe respetar el criterio del moderador y ayudarle, pero nunca es un ser superior a nadie. Est&aacute; prohibida la impersonaci&oacute;n de cualquier miembro del staff.</li>\r\n<li>Poderes Los moderadores pueden mover y cerrar temas, modificar mensajes, dar karma... Siempre para aquello que se les haya encomendado.</li>\r\n</ul>\r\n<p><strong>&nbsp; &nbsp; &nbsp; </strong>6.<strong> Sistema de Sanciones</strong></p>\r\n<ul>\r\n<li>Ban Definitivo o temporal, ir&aacute; con un email que explicar&aacute; sus motivos.</li>\r\n<li>P&eacute;rdida de la posibilidad de cambiarse Avatar y Firma</li>\r\n</ul>', '2020-05-10 20:57:44', 4),
(11, 20, 'Joer Cañi, no son ni las 9 y no sabemos distinguir las sagas de las salas\r\n\r\njajajaja', '2020-05-10 21:02:06', 3),
(12, 20, 'La que estás liando con el foro Cañi, espero qeu un administrador arregle esto pronto.', '2020-05-10 21:03:37', 5),
(13, 20, 'Las reglas están para romperlas', '2020-05-10 21:04:00', 4),
(14, 17, 'Desee mi punto de vista es una saga sobre valorada, ¿Que opináis?', '2020-05-27 20:21:51', 6),
(16, 22, 'No se que es un Harry Potter, pero bien fresco se le ve al amigo Bernardo', '2020-05-27 20:26:47', 6),
(17, 23, 'Avada Kedavra a Bernardo y al gato', '2020-05-27 20:28:12', 6),
(18, 23, 'Pues eso, que debería haber ganado yo. J.K. Rowling me quiso matar y era el personaje al que más cariño tenían los fanes de la saga', '2020-05-27 20:31:04', 7),
(19, 22, 'Mi problema es que mi amigo/pana Frenando íbamos a intercambiarnos los libros. \r\n\r\nYo se lo envié pero aún no me ha llegado mi libro, además Fer se ha borrado su perfil de esta web. ¿Tenéis alguna solución?\r\n\r\nMuchas gracias', '2020-05-27 20:37:23', 8),
(20, 5, '<b>¿Cómo puedo crear un tema?</b>\r\n<br>\r\nLos temas del foro solo pueden ser creados por un Administrador o un Moderador.\r\n<br>\r\n<b>¿Cómo puedo crear una discusión?</b>\r\n<br>\r\nPara poder crear una discusión solo tienes que haber <a href=\"login.php\">iniciado sesión</a>.\r\n<br>\r\n<b>¿Cómo puedo comentar en un foro?</b>\r\n<br>\r\nPara poder crear una discusión solo tienes que haber <a href=\"login.php\">iniciado sesión</a> y al final de la discusión te aparecerá un cuadro de texto donde escribir tu comentario.\r\n<br>\r\n<b>¿Cómo puedo ser moderador?</b>\r\n<br>\r\nPara poder ser moderador tienes que ser un usuario activo y con un comportamiento ejemplar, lo más importante para ser moderador es no querer serlo, en algún momento otro moderador podría recomendar a un usuario y el Administrador se encargaría de nombrarlo moderador.\r\n\r\n\r\n', '2020-05-29 17:57:44', 9);

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
(1, 15, 33, 1, 2147483647, 13, '2020-05-06 13:25:54');

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
(3, 5, '2020-05-10 20:42:02', 'Discusión', '¿Debería empezar a leer Harry Potter?', 0, 0),
(4, 5, '2020-05-10 20:43:41', 'Reglas', 'Reglas del Foro', 0, 0),
(5, 18, '2020-05-10 20:48:14', 'Debates', '¿Es la saga Crepúsculo la peor saga de vampiros?', 0, 0),
(6, 17, '2020-05-27 20:21:20', 'Debates', 'Hearry Potter está sobrevalorado', 0, 0),
(7, 23, '2020-05-27 20:30:12', 'Debates', 'Lord Voldemort debería haber ganado a Harry Potter', 0, 0),
(8, 22, '2020-05-27 20:35:46', 'Devoluciones', 'Mi pana Fer no me quere dar su libro', 0, 0),
(9, 5, '2020-05-29 17:52:15', 'FaQ', 'FAQ, cómo utilizar el foro', 0, 0);

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
('Biografía'),
('Ciencia Ficción'),
('Científico'),
('Comedia'),
('Drama'),
('Epopeya'),
('Fantasía'),
('Histórico'),
('Infantil'),
('Juvenil'),
('Manga'),
('Otros'),
('Poesía'),
('Romántico'),
('Youtubers');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generolibros`
--

CREATE TABLE `generolibros` (
  `id` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generolibros`
--

INSERT INTO `generolibros` (`id`, `idLibro`, `genero`) VALUES
(2, 2, 'Fantasía'),
(6, 11, 'Fantasía'),
(7, 12, 'Fantasía'),
(8, 13, 'Fantasía'),
(9, 14, 'Fantasía'),
(10, 33, 'Comedia'),
(11, 33, 'Drama'),
(12, 34, 'Poesía'),
(13, 35, 'Biografía'),
(14, 36, 'Drama'),
(15, 36, 'Romántico'),
(16, 37, 'Romántico'),
(17, 38, 'Romántico'),
(18, 39, 'Romántico'),
(19, 10, 'Fantasía'),
(20, 27, 'Juvenil'),
(21, 28, 'Juvenil'),
(22, 29, 'Juvenil'),
(23, 30, 'Juvenil'),
(24, 31, 'Juvenil'),
(25, 32, 'Juvenil');

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
(1, NULL, 0, 1, '2020-05-05 16:26:00'),
(2, NULL, 0, 2, '2020-05-05 17:30:45'),
(13, NULL, 0, 4, '2020-05-10 21:11:25'),
(22, NULL, 0, 11, '2020-05-27 20:55:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `Id_Libro` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Autor` varchar(60) NOT NULL,
  `Precio` float NOT NULL,
  `Valoracion` float DEFAULT NULL,
  `Ranking` int(5) DEFAULT NULL,
  `Imagen` varchar(300) NOT NULL,
  `Descripcion` varchar(1000) NOT NULL,
  `Genero` varchar(20) NOT NULL,
  `EnTienda` tinyint(1) NOT NULL,
  `Fecha` date NOT NULL,
  `Idioma` varchar(20) NOT NULL,
  `Editorial` varchar(50) NOT NULL,
  `Descuento` float DEFAULT NULL,
  `unidades` int(11) NOT NULL,
  `FechaPublicacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`Id_Libro`, `Titulo`, `Autor`, `Precio`, `Valoracion`, `Ranking`, `Imagen`, `Descripcion`, `Genero`, `EnTienda`, `Fecha`, `Idioma`, `Editorial`, `Descuento`, `unidades`, `FechaPublicacion`) VALUES
(2, 'La Rueda Del Tiempo, El Ojo Del Mundo', 'Robert Jordan', 19, 3.8, NULL, 'imagenes/libros/portada_el-ojo-del-mundo-n-0114_robert-jordan_201910151031.jpg', 'Moraine, una maga capaz de encauzar el Poder Único, anuncia el despertar de una terrible amenaza. Esa misma noche, el pueblo se ve atacado por espantosos trollocs sedientos de sangre, unas bestias semihumanas que hasta entonces se habían considerado una leyenda.  ', 'Fantasía', 1, '2020-05-04', 'Castellano', 'Minotauro', 0, 97, '1990-01-15'),
(10, 'La Rueda Del Tiempo, El Despertar De Los Héroes', 'Robert Jordan', 20, NULL, NULL, 'imagenes/libros/descargar-libro-el-despertar-de-los-heroes-en-pdf-epub-mobi-o-leer-online.jpg', 'Las fuerzas del mal se agitan y tienden sus garras sobre el mundo, al mismo tiempo que surgen señales que auguran la proximidad de la Ultima Batalla, donde ha de decidirse la suerte de la humanidad. ', 'Fantasía', 1, '2020-05-04', 'Castellano', 'Tor Books', 0, 100, '1990-10-15'),
(11, 'La Rueda Del Tiempo, El Dragón Renacido', 'Robert Jordan', 19, NULL, NULL, 'imagenes/libros/portada_el-dragon-renacido-n-0314_robert-jordan_201912090923.jpg', 'Rand, acosado por inquietantes sueños sobre una espada de cristal, decide abandonar a sus compañeros tras un ataque de Engendros de la Sombra y se encamina hacia Tear para descubrir quién es realmente. Mientras tanto, las tres jóvenes aspirantes a Aes Sedai viajan con Mat hacia Tar Valon para ingresar como novicias en la Torre Blanca, donde esperan que las hermanas sanen a Mat de la extraña enfermedad que padece. Poco tiempo después, la Amyrlin les encomienda una peligrosa misión. . . ', 'Fantasía', 1, '2020-05-04', 'Castellano', 'Minotauro', 0, 99, '1991-10-15'),
(12, 'La Rueda Del Tiempo, El Ascenso De La Sombra', 'Robert Jordan', 20, NULL, NULL, 'imagenes/libros/ascenso de las sombras.jpg', 'Los sellos de Shayol Ghul se han debilitado y la presencia del Oscuro se hace cada vez más evidente. En Tar Valon, Min es testigo de hechos portentosos que vaticinan un horrible futuro. Los Capas Blancas buscan en Dos Ríos a un hombre con los ojos dorados y siguen el rastro del Dragón Renacido. Perrin, acompañado de Fraile, Loial y algunos Aiel llegan allí después de atravesar los Portales de Piedra.\r\n\r\nSe encontrarán con los Trollocs, que sirven al Oscuro, y con los Capas Blancas y su peculiar manera de entender la defensa de la Luz. Mientras Elayne y Nynaeve parten hacia Tanchico siguiendo el rastro de las Aes Sedai del Ajah Negro que se llevaron los numerosos angreal, Rand trata de reunir a todos los clanes de los Aiel. Con ello cumplirá parte de la profecía de Rhuidean.  ', 'Fantasía', 1, '2020-05-04', 'Castellano', 'Minotauro', 0, 100, '1992-09-15'),
(13, 'La Rueda Del Tiempo, Cielo En Llamas', 'Robert Jordan', 19, NULL, NULL, 'imagenes/libros/cielo en llamas.jpg', 'Rand aguarda en Rhuidean a que se unan todos los clanes de los Aiel, pero la actitud del jefe de los Shaido puede obligar a Rand a cambiar de planes. En la corte de Caemlyn, Morgase tiene que enfrentarse a una traición inesperada, mientras la Torre Blanca se convierte en un nido de intrigas. Elaida, ascendida a Sede Amyrlin, pretende capturar al Dragón Renacido para mantenerlo a salvo hasta el momento del Tarmon Gaidon, aunque algunos creen que no es eso lo que pretende. ', 'Fantasía', 1, '2020-05-04', 'Castellano', 'Minotauro', 0, 100, '1993-10-15'),
(14, 'La Rueda Del Tiempo, El Señor Del Caos', 'Robert Jordan', 20, NULL, NULL, 'imagenes/libros/libro-la-rueda-del-tiempo-6-el-senor-del-caos-portada-pdf.jpg', 'Rand se esfuerza por unir a las naciones para combatir al Oscuro al tiempo que sortea las trampas que los Renegados tienden a la desprevenida raza humana. Pero además tiene que enfrentarse a los Hijos de la Luz, cuyo capitán general se propone desprestigiarlo y dirigir la batalla contra la Sombra.\r\nPor su parte, las Aes Sedai buscan a Rand para ofrecerle su apoyo, aunque ése sospecha que su verdadera intención es usarlo para sus propios fines. ', 'Fantasía', 1, '2020-05-04', 'Castellano', 'Minotauro', 0, 100, '1994-10-15'),
(27, 'El Príncipe De La Niebla', 'Carlos Ruiz Zafón', 9, 3, NULL, 'imagenes/libros/principeDeLaNiebla.jpg', '  Un diabólico príncipe que concede cualquier deseo... a un alto precio.\r\n\r\nEl nuevo hogar de los Carver está rodeado de misterio. En él aún se respira el espíritu de Jacob, el hijo de los antiguos propietarios, que murió ahogado. Las extrañas circunstancias de esa muerte sólo empiezan a aclararse con la aparición de un diabólico personaje: el Príncipe de la Niebla.     ', 'Juvenil', 1, '2020-05-04', 'Castellano', 'Planeta', 0, 47, '1993-05-23'),
(28, 'La Sombra Del Viento (Serie 1 El Cementerio De Los Libros Olvidados )', 'Carlos Ruiz Zafón', 10, NULL, NULL, 'imagenes/libros/laSombraDelViento.jpg', ' «Todavía recuerdo aquel amanecer en que mi padre me llevó por primera vez a visitar el Cementerio de los Libros Olvidados.»\r\n\r\nUn amanecer de 1945, un muchacho es conducido por su padre a un misterioso lugar oculto en el corazón de la ciudad vieja: el Cementerio de los Libros Olvidados. Allí, Daniel Sempere encuentra un libro maldito que cambia el rumbo de su vida y le arrastra a un laberinto de intrigas y secretos enterrados en el alma oscura de la ciudad.La Sombra del Vientoes un misterio literario ambientado en la Barcelona de la primera mitad del siglo xx, desde los últimos esplendores del Modernismo hasta las tinieblas de la posguerra.\r\n\r\nAunando las técnicas del relato de intriga y suspense, la novela histórica y la comedia de costumbres,La Sombra del Vientoes sobre todo una trágica', 'Juvenil', 1, '2020-05-04', 'Castellano', 'Planeta', 0, 53, '2001-08-30'),
(29, 'El Juego Del Ángel (Serie 2 El Cementerio De Los Libros Olvidados)', 'Carlos Ruiz Zafón', 11, NULL, NULL, 'imagenes/libros/elJuegoDelAngel.jpg', '  La próxima vez que quieras salvar un libro, no te juegues la vida... Te llevaré a un lugar secreto donde los libros nunca mueren.\r\nEn la turbulenta Barcelona de los años 20 un joven escritor obsesionado con un amor imposible recibe la oferta de un misterioso editor para escribir un libro como no ha existido nunca, a cambio de una fortuna y, tal vez, mucho más.\r\nCon estilo deslumbrante e impecable precisión narrativa, el autor de La Sombra del Viento nos transporta de nuevo a la Barcelona del Cementerio de los Libros Olvidados para ofrecernos una gran aventura de intriga, romance y tragedia, a través de un laberinto de secretos donde el embrujo de los libros, la pasión y la amistad se conjugan en un relato magistral.     ', 'Juvenil', 1, '2020-05-04', 'Castellano', 'Planeta', 0, 27, '2008-09-14'),
(30, 'El Prisionero Del Cielo (Serie 3 El Cementerio De Los Libros Olvidados)', 'Carlos Ruiz Zafón', 10, NULL, NULL, 'imagenes/libros/elPrisioneroDelCielo.jpg', ' Escribo estas palabras en la esperanza y el convencimiento de que algún día descubrirás este lugar…un lugar que cambió mi vida como estoy seguro de que cambiará la tuya.\r\nBarcelona, 1957. Daniel Sempere y su amigo Fermín, los héroes de La Sombra del Viento, regresan de nuevo a la aventura para afrontar el mayor desafío de sus vidas.\r\nJusto cuando todo empezaba a sonreírles, un inquietante personaje visita la librería de Sempere y amenaza con desvelar un terrible secreto que lleva enterrado dos décadas en la oscura memoria de la ciudad. Al conocer la verdad, Daniel comprenderá que su destino le arrastra inexorablemente a enfrentarse con la mayor de las sombras: la que está creciendo en su interior.\r\nRebosante de intriga y emoción,El Prisionero del Cielo es una novela magistral donde los hi', 'Juvenil', 1, '2020-05-04', 'Castellano', 'Planeta', 0, 26, '2011-11-23'),
(31, 'Marina', 'Carlos Ruiz Zafón', 8, 3, NULL, 'imagenes/libros/marina.jpg', 'En la Barcelona de 1980 Óscar Drai sueña despierto, deslumbrado por los palacetes modernistas cercanos al internado en el que estudia. En una de sus escapadas conoce a Marina, una chica delicada de salud que comparte con Óscar la aventura de adentrarse en un enigma doloroso del pasado de la ciudad. Un misterioso personaje de la posguerra se propuso el mayor desafío imaginable, pero su ambición lo arrastró por sendas siniestras cuyas consecuencias debe pagar alguien todavía hoy. ', 'Juvenil', 1, '2020-05-04', 'Castellano', 'Planeta', 0, 17, '1999-05-15'),
(32, 'Las Luces De Septiembre', 'Carlos Ruiz Zafón', 9, NULL, NULL, 'imagenes/libros/lasLucesDeSeptiembre.jpg', 'Un misterioso fabricante de juguetes vive recluido en una mansión poblada de seres mecánicos y sombras del pasado... Un enigma en torno a extrañas luces que brillan entre la niebla que rodea el islote del faro... Estos y otros elementos tejen la trama del misterio que unirá a Irene e Ismael para siempre durante un mágico verano en Bahía Azul. ', 'Juvenil', 1, '2020-05-04', 'Castellano', 'Planeta', 0, 22, '1995-03-26'),
(33, 'Divina Comedia', 'Dante Alighieri', 13, 4, NULL, 'imagenes/libros/divinacomedia.jpg', 'La Divina Comedia es un poema donde se mezcla la vida real con la sobrenatural, muestra la lucha entre la nada y la inmortalidad, una lucha donde se superponen tres reinos, tres mundos, logrando una suma de múltiples visuales que nunca se contradicen o se anulan. Los tres mundos infierno, purgatorio y paraíso reflejan tres modos de ser de la humanidad, en ellos se reflejan el vicio, el pasaje del vicio a la virtud y la condición de los hombres perfectos. Es entonces a través de los viciosos, penitentes y buenos que se revela la vida en todas sus formas, sus miserias y hazañas, pero también se muestra la vida que no es, la muerte, que tiene su propia vida, todo como una mezcla agraciada planteada por Dante, que se vuelve arquitecto de lo universal y de lo sublime. ', 'Comedia', 1, '2020-05-06', 'Castellano', 'Plutón Ediciones', 0, 99, '2019-01-10'),
(34, 'La escala de Mohs', 'Gata Cattana', 13, 3, NULL, 'imagenes/libros/cattana.jpg', 'El único poemario de una artista polifacética que es todo un referente para varias generaciones: feminista, música y poeta; comprometida y talentosa. Gata Cattana. ', 'Poesía', 1, '2020-05-06', 'Español', 'Aguilar', 0, 10, '2019-01-01'),
(35, 'Búnker: memorias de un encierro, rimas y tiburones blancos', 'Toteking', 20, 4, NULL, 'imagenes/libros/toteking.jpg', 'Toteking, leyenda viva del rap español, pero sobre todo lector incansable, escribe: «Viajar a tus recuerdos es buscar pelea». Y lo hace. Sin miedo.  ', 'Biografía', 1, '2020-05-06', 'Español', 'Aguilar', 5, 5, '2019-01-01'),
(36, 'After: 1 (The After Series)', 'Anna Todd', 11, 5, NULL, 'imagenes/libros/after1.jpg', '        Un libro de amor bastante moñas, hay 3 más pero nos duele la vida de solo pensarlo.        ', 'Romántico', 1, '2020-05-06', 'Español', 'Wattpad', 0, 20, '2017-07-11'),
(37, 'After. En mil pedazos', 'Anna Topp', 13, NULL, NULL, 'imagenes/libros/after2.jpg', '  Una historia que nadie quiere que acabe y todo el mundo quiere vivir.\r\nTessa se acaba de despertar de un sueño. Es consciente de que era todo demasiado bonito para ser cierto… \r\n\r\n¿Es posible volver a sonreír cuando todo se rompe en pedazos? Ella y Hardin parecían hechos el uno para el otro, como dos almas gemelas, pero él lo ha roto todo, se ha acabado el sueño para siempre. ¿Cómo ha podido ser tan ingenua? Si quiere recuperarla, Hardin deberá luchar como nunca por lo que ha hecho. ¿Estará preparado? ¿Se puede perdonar todo?    ', 'Romántico', 1, '2020-05-06', '', 'Wattpad', 0, 30, '2015-07-15'),
(38, 'After. Almas perdidas', '', 7, NULL, NULL, 'imagenes/libros/after3.jpg', '   El amor de Tessa y Hardin ya ha sido complicado en otras ocasiones, pero ahora lo es más que nunca. Su vida no volverá a ser como antes…\r\nJusto cuando Tessa toma la decisión más importante de su vida, todo cambia. Los secretos que salen a la luz sobre su familia, y también sobre la de Hardin ponen en duda su relación y su futuro juntos.    ', 'Romántico', 1, '2020-05-06', 'España', 'Wattpad', 12, 36, '2016-06-22'),
(39, 'After. Amor infinito', 'Anna Todd', 7, NULL, NULL, 'imagenes/libros/after4.jpg', 'La historia de dos almas gemelas que no pueden estar separadas, pero que no saben cómo estar juntas. El amor es pasión y complicidad, pero también es aprender a conocer al otro y hacer juntos un proyecto común.\r\n\r\n ', 'Romántico', 1, '2020-05-06', 'Español', 'Wattpad', 0, 20, '2020-04-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `librointercambio`
--

CREATE TABLE `librointercambio` (
  `Id_Libro_Inter` int(11) NOT NULL,
  `AutorLibInter` varchar(30) NOT NULL,
  `Imagen` varchar(300) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Genero` varchar(20) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Intercambiado` tinyint(1) NOT NULL,
  `esOferta` tinyint(4) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `librointercambio`
--

INSERT INTO `librointercambio` (`Id_Libro_Inter`, `AutorLibInter`, `Imagen`, `Descripcion`, `Genero`, `Id_Usuario`, `Titulo`, `Intercambiado`, `esOferta`, `Fecha`) VALUES
(1, 'Charles Perrault', 'imagenes/librosIntercambio/caperucita roja.jpg', 'La clásica historia de la Caperucita Roja, el libro está prácticamente nuevo y es de la editorial SM, me gustaría algún otro libro infantil para tener un intercambio justo aunque estoy abierto a cualquier otra oferta', 'Infantil', 5, 'Caperucita Roja', 0, 0, '2020-05-05 16:26:00'),
(2, 'Jordi Sierra i Fabra', 'imagenes/librosIntercambio/campoDeFresas.jpg', 'Un libro que leí hace tiempo y que no crea que vuelva a leer, sin duda una historia a tener en cuenta que nos enseña que la vida puede cambiar en cualquier momento, el transcurso de la trama es muy interesante y profundo. A cambio me gustaría algún libro de fantasía o drama', 'Juvenil', 5, 'Campo de Fresas', 0, 0, '2020-05-05 17:30:45'),
(3, 'Hajime Isayama', 'imagenes/librosIntercambio/aot23.jpg', 'Llegar hasta el mar solo es el primer paso: más allá de las olas se disputa una terrible batalla entre los eldianos y los marleyanos.', 'Manga', 16, 'Ataque a los titanes 23', 0, 0, '2020-05-06 13:27:42'),
(4, 'Toteking', 'imagenes/librosIntercambio/toteking.jpg', 'Toteking, leyenda viva del rap español, pero sobre todo lector incansable, escribe: «Viajar a tus recuerdos es buscar pelea». Y lo hace. Sin miedo.', 'Biografía', 16, 'Búnker: memorias de un encierr', 0, 0, '2020-05-06 14:07:55'),
(5, 'Gata Cattana', 'imagenes/usuarios/cattana.jpg', 'Libro Misterioso', 'Poesía', 16, 'La escala de mohs', 0, 0, '2020-05-06 14:11:16'),
(6, 'Blon', 'imagenes/usuarios/blon.jpg', 'Libro Misterioso', 'Poesía', 16, 'Eterna(mente)', 0, 0, '2020-05-06 14:15:23'),
(7, 'Mr. Wondewrfull', 'imagenes/librosIntercambio/feliz.jpg', 'Este libro me ha ayudado a pasar largas temporadas con mi madre, si alguien me lo quiere intercambiar por algún libro de gatitos se lo agradecería.', 'Comedia', 17, 'Cosas no aburridas para ser la', 0, 0, '2020-05-06 13:08:30'),
(8, 'Stephenie Meyer', 'imagenes/librosIntercambio/crepusculo.jpg', 'Me lo compré pensando que iba a ser un libro sobre el estudio astronómico pero resultó una novela adolescente. Casi que lo regalo, pero si me ofrecéis un libro de astronomía mejor.', 'Juvenil', 18, 'Crepúsculo', 0, 0, '2020-05-06 13:17:14'),
(9, 'Christophe Galfard', 'imagenes/librosIntercambio/universoenm.jpg', 'Este libro es brutal, me cambió la vida.', 'Histórico', 19, 'El universo en tu mano', 0, 0, '2020-05-06 13:24:42'),
(10, 'Ella Valentine', 'imagenes/librosIntercambio/milibroJQ.jpg', 'Es un poco como mi biografía, la verdad es que te sientes muy identificado con el protagonista. Como ya me lo he acabado, quizá te interese saber cómo se siente ser como yo.', 'Drama', 20, 'Multimillonario &amp; Canalla', 0, 0, '2020-05-06 13:31:47'),
(11, 'Pepe', 'imagenes/librosIntercambio/pepe.jpg', 'ME he sentido maaazo identificado con el dichoso pollo', 'Infantil', 20, 'El pollo pepe', 0, 0, '2020-05-06 13:34:44'),
(13, 'Janet Valade', 'imagenes/librosIntercambio/phpdummies.jpg', 'Un libro para aprender PHP, super útil me ha servido para mucho. Me interesaría otro libro de aspecto tecnológico', 'Científico', 1, 'PHP para dummies', 0, 0, '2020-05-10 21:11:25'),
(14, 'Jon Scieszka y Lane Smith', 'imagenes/librosIntercambio/3cerditos.jpg', 'Creo que este libro cumple las condiciones, me lo cambias?', 'Infantil', 1, 'Los 3 Cerditos', 2, 0, '2020-05-10 21:13:58'),
(15, 'Stephen Randy Davis', 'imagenes/librosIntercambio/510pJu3ssFL.jpg', 'Te parece bien?', 'Científico', 5, 'C++ para dummies', 0, 0, '2020-05-10 21:24:38'),
(22, 'J.K. Rowling', 'imagenes/librosIntercambio/1590612904_130.jpg', 'El final de la saga del niño que vivió', 'Fantasía', 1, 'Harry Potter y las Reliquias de la Muerte', 0, 0, '2020-05-27 20:55:04'),
(23, 'J.K. Rowling', 'imagenes/librosIntercambio/1590775893_938.jpg', 'El libro en el que nuestro señor tenebroso al fin resucita.', 'Juvenil', 23, 'Harry Potter y el Cáliz de Fuego', 0, 0, '2020-05-29 18:11:33'),
(24, 'Brandon Sanderson', 'imagenes/librosIntercambio/1590776068_634.jpg', 'Magia a través de metales ingeridos. Es lo más', 'Fantasía', 23, 'Nacidos de la bruma. El imperio final', 0, 0, '2020-05-29 18:14:28'),
(25, 'Brandon Sanderson', 'imagenes/librosIntercambio/default.jpg', 'Magia mediante metales', 'Fantasía', 23, 'Nacidos de la bruma 1', 0, 0, '2020-05-29 18:15:42');

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
-- Volcado de datos para la tabla `mensajechat`
--

INSERT INTO `mensajechat` (`Id_Chat`, `Id_Mensaje_Chat`, `Id_Usuario`, `Texto`, `Fecha`) VALUES
(2, 14, 1, 'Buenas, me interesaría el libro de Caperucita, que te parece Pinocho a cambio del tuyo?\r\n ', '2020-05-05 18:43:56'),
(2, 15, 5, 'Sí, me parece un buen cambio', '2020-05-06 13:12:09'),
(2, 16, 1, 'Te he enviado otra oferta para ese libro dime que te parece', '2020-05-10 21:14:20'),
(2, 17, 5, 'No me interesa, prefiero el de Pinocho', '2020-05-10 21:22:19'),
(3, 18, 5, 'Hola\n', '2020-05-27 17:42:42'),
(3, 19, 17, 'Hola, está bien el libro?\n', '2020-05-27 17:43:06'),
(3, 20, 5, 'Sí, está guapo\n', '2020-05-27 17:43:17'),
(3, 21, 17, 'Se lo recomiendas a mi madre? Le gusta mucho la saga \"Tarta de fresa\"', '2020-05-27 17:43:47'),
(3, 22, 5, 'La moraleja es que tomar pastillas de un desconocido es mala idea', '2020-05-27 17:43:53'),
(3, 23, 17, 'Uff', '2020-05-27 17:44:01'),
(3, 24, 17, 'Bastante mal la verdad', '2020-05-27 17:44:08'),
(3, 25, 5, 'Pruebaconelenter', '2020-05-27 17:48:30'),
(3, 26, 17, 'Pruebo con el enter', '2020-05-27 17:49:07'),
(3, 27, 5, 'AAaa', '2020-05-27 17:49:12'),
(3, 28, 5, 'aaaa', '2020-05-27 17:49:20'),
(3, 29, 17, 'sd  \n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\ngfasd  ffasdf', '2020-05-27 17:49:25'),
(3, 30, 17, 'ohdiosmio', '2020-05-27 17:49:35'),
(3, 31, 5, 'Ahoratefalla', '2020-05-27 17:49:40'),
(3, 32, 17, 'uwu', '2020-05-27 17:49:43'),
(3, 33, 5, 'Hayquearreglarlo', '2020-05-27 17:49:43'),
(3, 34, 5, '', '2020-05-27 17:49:51'),
(3, 35, 17, 'estoesunproblemagordo', '2020-05-27 17:49:53'),
(3, 36, 17, '', '2020-05-27 17:49:57'),
(3, 37, 5, 'NoTeCreas', '2020-05-27 17:50:02'),
(3, 38, 17, '.ytedigosimelio', '2020-05-27 17:50:08');

--
-- Disparadores `mensajechat`
--
DELIMITER $$
CREATE TRIGGER `aumentoMensajesChat` AFTER INSERT ON `mensajechat` FOR EACH ROW UPDATE chat
	SET chat.NumMensajes = chat.NumMensajes+1
    WHERE chat.Id_Chat= new.Id_Chat
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `disminuirMensajesChat` AFTER DELETE ON `mensajechat` FOR EACH ROW UPDATE chat
	SET chat.NumMensajes = chat.NumMensajes-1
    WHERE chat.Id_Chat= old.Id_Chat
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

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `idUsuario`, `mensaje`, `leido`, `fecha`) VALUES
(1, 1, 'Has comprado 3 unidades del libro <a href=\'libroTienda.php?id=2\'>La Rueda Del Tiempo, El Ojo Del Mundo</a> por 57 €, muchas gracias por su compra', 1, '2020-05-10 21:03:02'),
(2, 1, 'Has comprado el libro <a href=\'libroTienda.php?id=11\'>La Rueda Del Tiempo, El Dragón Renacido</a> por 19 €, muchas gracias por su compra', 1, '2020-05-10 21:03:14'),
(3, 5, 'El usuario Administrador te ha ofrecido el libro Los 3 Cerditos por tu libro Caperucita Roja, puedes ver esta oferta ;y otras más, en detalle <a href=\'ofertasIntercambio.php?id=1\'>aquí</a>.', 1, '2020-05-10 21:13:58'),
(4, 5, 'El usuario Geo te ha ofrecido el libro C++ para dummies por tu libro PHP para dummies, puedes ver esta oferta ;y otras más, en detalle <a href=\'ofertasIntercambio.php?id=13\'>aquí</a>.', 1, '2020-05-10 21:24:39'),
(5, 17, 'Has iniciado un chat con el usuario Geo, puedes hablar con él a través de este <a href=\'chat.php?idchat=3\'>enlace</a>', 1, '2020-05-27 17:42:19'),
(6, 5, 'El usuario Bernard64 ha iniciado un chat contigo, puedes hablar con él a través de este <a href=\'chat.php?idchat=3\'>enlace</a>', 1, '2020-05-27 17:42:19'),
(8, 5, 'El usuario Guarro ha iniciado un chat contigo, puedes hablar con él a través de este <a href=\'chat.php?idchat=4\'>enlace</a>', 1, '2020-05-27 18:57:58'),
(9, 23, 'Has iniciado un chat con el usuario admin, puedes hablar con él a través de este <a href=\'chat.php?idchat=5\'>enlace</a>', 1, '2020-05-29 17:50:08'),
(10, 1, 'El usuario Voldy ha iniciado un chat contigo, puedes hablar con él a través de este <a href=\'chat.php?idchat=5\'>enlace</a>', 1, '2020-05-29 17:50:08'),
(11, 5, 'El usuario Voldy te ha ofrecido el libro Nacidos de la bruma. El imperio final por tu libro Caperucita Roja, puedes ver esta oferta ;y otras más, en detalle <a href=\'ofertasIntercambio.php?id=1\'>aquí</a>.', 1, '2020-05-29 18:14:28'),
(12, 5, 'El usuario Voldy te ha ofrecido el libro Nacidos de la bruma 1 por tu libro Caperucita Roja, puedes ver esta oferta ;y otras más, en detalle <a href=\'ofertasIntercambio.php?id=1\'>aquí</a>.', 1, '2020-05-29 18:15:43'),
(13, 5, 'El usuario Voldy te ha ofrecido el libro Nacidos de la bruma 1 por tu libro Caperucita Roja, puedes ver esta oferta ;y otras más, en detalle <a href=\'ofertasIntercambio.php?id=1\'>aquí</a>.', 1, '2020-05-29 18:16:43'),
(14, 5, 'El usuario dani13 te ha ofrecido el libro Masda por tu libro Caperucita Roja, puedes ver esta oferta ;y otras más, en detalle <a href=\'ofertasIntercambio.php?id=1\'>aquí</a>.', 1, '2020-05-29 18:26:10'),
(15, 5, 'El usuario dani13 te ha ofrecido el libro alksjdlakjsdklsa por tu libro Caperucita Roja, puedes ver esta oferta ;y otras más, en detalle <a href=\'ofertasIntercambio.php?id=1\'>aquí</a>.', 1, '2020-05-29 18:27:18'),
(16, 5, 'El usuario dani13 te ha ofrecido el libro alksjdlakjsdklsa por tu libro Caperucita Roja, puedes ver esta oferta ;y otras más, en detalle <a href=\'ofertasIntercambio.php?id=1\'>aquí</a>.', 1, '2020-05-29 18:29:43'),
(17, 5, 'El usuario Voldy te ha ofrecido el libro Nacidos de la bruma 1 por tu libro Caperucita Roja, puedes ver esta oferta ;y otras más, en detalle <a href=\'ofertasIntercambio.php?id=1\'>aquí</a>.', 1, '2020-05-29 18:30:06');

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
(1, 1, 14, 0),
(2, 13, 15, 2),
(3, 1, 24, 2),
(4, 1, 25, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `Tema` varchar(30) NOT NULL,
  `Descripcion` varchar(350) NOT NULL,
  `Imagen` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`Tema`, `Descripcion`, `Imagen`) VALUES
('Club de lectura', 'Disfruta agradables charlas con amantes de la lectura', 'imagenes/tema/club.png'),
('Debates', 'Debatid sobre vuestras obras favoritas', 'imagenes/tema/critic.png'),
('Devoluciones', 'Ayuda sobre devoluciones', 'imagenes/tema/return.png'),
('Discusión', 'Discute sobre los temas más candentes de la actualidad litearia', 'imagenes/tema/discussion.png'),
('FaQ', 'Preguntas frecuentes', 'imagenes/tema/faq.png'),
('Reglas', 'Las reglas del foro ¡Importante!', 'imagenes/tema/rules.png');

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
(1, 'admin', 'Administrador', '$2y$12$IgSk5wgr4BPD0PiSzHqGdeQau3iwvAAlSuFSA3eJNM28zKTzTlbSi', 'admin@mail.com', 'imagenes/usuarios/p5.gif', 'Mi casa', '2020-03-07', 'Madrid', '2020-03-16 20:07:18', 0),
(2, 'xAlex', 'Alex', '$2y$10$PRkJe1JoBxw4QUNpueSB2.QBGeQuBSDU.EUokxw9e.u3FSy8dBI7q', 'alro12@ucm.es', 'imagenes\\usuarios\\default.png', 'Calle Madrid', '1996-04-19', 'Barcelona', '2020-03-16 20:08:20', 1),
(3, 'Javier ', 'User3', '$2y$10$WzsGXsEBnrzNWpQe983aVuV.DvLh.qU4I1pZsKoVX8Q5eeoCuE47e', 'dani@gmail.com', 'imagenes\\usuarios\\default.png', 'Calle la casa', '1996-08-12', 'Madrid', '2020-03-16 20:08:42', 1),
(4, 'Sergiox', 'Sergio García', '$2y$10$0/IMnYZrpuJlfMJ4PXgHCO9C0VYt0K576pfRJjirbtmQbvwpnWxJe\r\n', 'Serg@gmail.com', 'imagenes\\usuarios\\default.png', 'Calle Los angeles', '1997-08-19', 'Valencia', '2020-03-16 20:09:37', 2),
(5, 'Geo', 'Daniel', '$2y$12$YnvgZwS4gju5WQJKRjftiOCgfFVqQqtcl0GBhnZ5yV2ux5nCd4EtW', 'dsanto07@ucm.es', 'imagenes/usuarios/xion.gif', 'Mi Casa', '1999-12-22', 'Madrid', '2020-03-20 17:56:46', 0),
(6, 'LuiSHer', 'Luis Hernández', '$2y$10$hOhrx2qQo6r04DG9aVOJE.6G.WJd3X3u9tQQY9qwWJ1nZLizsufhW', 'Serg@gmail.com', 'imagenes\\usuarios\\default.png', 'Calle Los angeles', '1997-08-19', 'Salamanca', '2020-03-16 20:10:04', 2),
(10, 'user5', 'pablo', '$2y$12$KMq235V//OdjKlBQ1Eh6U.NztyLz/KuCHnKfCfp45r15X7c8hXb3.', 'pablo43521@gmail.es', 'imagenes\\usuarios\\default.png', 'Mi casa', '2020-02-02', 'Madrid', '0000-00-00 00:00:00', 1),
(11, 'dani12', 'dfsdfs', '$2y$12$tz/uv/Szi4a87JrfPRgYo.GsY6defb0HAsj.2/F8cDO3pWyu0JTLa', 'asdaxdasdas', 'imagenes\\usuarios\\default.png', 'asdad', '2020-04-30', 'sda', '2020-04-02 16:12:50', 1),
(12, 'dani13', 'Daniel Duran', '$2y$12$63EAs32Mo521JFn3WGD3NekkH7Gk1fAkKJCEbw8JVWSjzo5BxZUQu', 'daniel@gmail.es', 'imagenes\\usuarios\\default.png', 'Mi casa', '2020-04-01', 'Zaragoza', '2020-04-02 16:17:32', 1),
(13, 'user', 'Usuario', '$2y$12$ALf/uwh6wYQubFn3761HWOnzWyR6fZ6p.yEwCRCKYxK2x4exBYRNe', 'a', 'imagenes\\usuarios\\default.png', 'a', '2020-04-01', 'a', '2020-04-02 18:47:19', 1),
(14, 'mod', 'Moderador', '$2y$12$5UGSb62o/BgY/bto0aXMqO4pt4obvflUx8Ss3eDfw6X3RJyTCipWq', 'a', 'imagenes\\usuarios\\default.png', 'a', '2020-04-01', 'a', '2020-04-02 18:47:19', 2),
(15, 'Emank', 'Emanuel', '$2y$10$7oIpcxcPqgRjgaJ8JYpQouxZkYLe3FP26XsgJ4UH964UNAsJf3aBS', 'emank@gmail.com', 'imagenes/usuarios/23.jpg', 'Mikasa Ackerman', '2000-01-30', 'Madrid', '2020-05-06 13:24:01', 1),
(16, 'LuciDemonio', 'Luci Demonio', '$2y$10$FLFSAsYgJq0UKoFCPj/v8eiIr/jQTXUGFSOYmpPPDvtridR1/bguu', 'luci@demonio.des', 'imagenes/usuarios/luci.jpg', 'Callejon del elfo, 3', '1963-02-20', 'Dreamland', '2020-05-06 13:12:59', 1),
(17, 'Bernard64', 'Bernardo Marín', '$2y$10$ZroKl1Fho96WLot9xhsF2u6TY5.CvfVVLGrX3GCKxac2s2Aw6SOoa', 'bernardo@cc.es', 'imagenes/usuarios/Bernardo.jpg', 'Vivo con mi madre', '1956-04-23', 'Madrid', '2020-05-06 13:04:10', 1),
(18, 'Cañizares', 'Canizares', '$2y$10$jkiBUD2koRimnAG1fRAtYeRH4GMh9w4b7J.OLvgjvMC.ikaneUcvy', 'canizares@cc.es', 'imagenes/usuarios/canizares.jpg', 'Madrid', '1996-05-16', 'Madrid', '2020-05-06 13:12:49', 1),
(19, 'JuliPachacho', 'Julian Palacios', '$2y$10$h5.Rxhmxwica.FzA5nfOWu3OgZolNMZkv4VygtUzxfANUQah3dTpW', 'julipala@cc.es', 'imagenes/usuarios/julian.jpg', 'Villa de Murcia 45 3', '1975-07-31', 'Murcia', '2020-05-06 13:21:13', 1),
(20, 'Roncolo69', 'Jesús Quesada', '$2y$10$IX7aL/lfo5JmYMjazcbzWu1aDkTPoTSXcDs3xBtjoAq703xmrWiNW', 'jesques@cc.es', 'imagenes/usuarios/jesus.jpg', 'Avenida de la Paz Nº34', '1969-04-18', 'Ciudad Real', '2020-05-06 13:28:19', 1),
(22, 'Mi_pana_Miguel', 'Miguel Pana', '$2y$10$l1BnESoOhbreKJzW/uN8quQ6GihKWunabw5hOoiCwNneFLGyBLp2e', 'mipanamiguel@ucm.es', 'imagenes/usuarios/1590775794_672.png', 'Bien fresco se le ve', '2019-10-15', 'Villa Frescura', '2020-05-27 20:25:40', 2),
(23, 'Voldy', 'Voldy', '$2y$10$ot.reXy4FV5gDoqypx.sq.dH5jE506nMhE.DD6xGVK8v9JSJqpeaS', 'voldy@gmail.com', 'imagenes/usuarios/1590775776_404.png', 'Mansión Malfoy', '1926-12-31', 'Wiltshire', '2020-05-27 20:27:25', 1);

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
(2, 1, 1, '', 1),
(33, 15, 4, 'No le doy más porque nada es perfecto', 2),
(34, 16, 5, 'Mi rapera favorita. Denscasa en paz', 3),
(35, 16, 4, 'Buen libro aunque me gustan más sus canciones', 4),
(2, 17, 5, 'Actualmente es mi saga de ficción favorita. Un 10 si pudiese', 5),
(27, 17, 3, 'El final un poco mustio, pero pone unas buenas bases para la saga de la niebla.', 6),
(36, 20, 5, 'Será una saga para niñas de 14 años pero tiene unas escenas bestiales', 7),
(2, 5, 4, 'Me gusta mucho', 8),
(31, 22, 3, 'Me ha gustado mucho el tramo final. Bien fresca está la pana Marina', 11),
(2, 22, 4, 'Un poco denso al principio, pero luego se pone bien fresco.', 12);

--
-- Disparadores `valoracionlibro`
--
DELIMITER $$
CREATE TRIGGER `mediaValoracion` AFTER UPDATE ON `valoracionlibro` FOR EACH ROW UPDATE libro
    SET valoracion = (SELECT AVG(valoracion) FROM valoracionlibro
                      WHERE libro.Id_Libro = valoracionlibro.Id_Libro)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `mediaValoracionInsert` AFTER INSERT ON `valoracionlibro` FOR EACH ROW UPDATE libro
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
  ADD UNIQUE KEY `Ranking` (`Ranking`),
  ADD KEY `Genero` (`Genero`);

--
-- Indices de la tabla `librointercambio`
--
ALTER TABLE `librointercambio`
  ADD PRIMARY KEY (`Id_Libro_Inter`) USING BTREE,
  ADD KEY `Id_Usuario` (`Id_Usuario`),
  ADD KEY `Genero` (`Genero`);

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
  ADD PRIMARY KEY (`Id_Usuario`);

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
  MODIFY `Id_Comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `discusion`
--
ALTER TABLE `discusion`
  MODIFY `Id_Discusion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `generolibros`
--
ALTER TABLE `generolibros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `intercambios`
--
ALTER TABLE `intercambios`
  MODIFY `Id_Intercambio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `Id_Libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `librointercambio`
--
ALTER TABLE `librointercambio`
  MODIFY `Id_Libro_Inter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `mensajechat`
--
ALTER TABLE `mensajechat`
  MODIFY `Id_Mensaje_Chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ofertasintercambio`
--
ALTER TABLE `ofertasintercambio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `valoracionlibro`
--
ALTER TABLE `valoracionlibro`
  MODIFY `Id_Valoracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Filtros para la tabla `librointercambio`
--
ALTER TABLE `librointercambio`
  ADD CONSTRAINT `librointercambio_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `librointercambio_ibfk_2` FOREIGN KEY (`Genero`) REFERENCES `genero` (`Genero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajechat`
--
ALTER TABLE `mensajechat`
  ADD CONSTRAINT `mensajechat_ibfk_1` FOREIGN KEY (`Id_Chat`) REFERENCES `chat` (`Id_Chat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensajechat_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `valoracionlibro_ibfk_1` FOREIGN KEY (`Id_Libro`) REFERENCES `libro` (`Id_Libro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoracionlibro_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
