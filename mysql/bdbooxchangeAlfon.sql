-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2020 a las 20:16:14
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.27

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

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`Id_Chat`, `Id_Usuario1`, `Id_Usuario2`, `NumMensajes`, `mensajesSinLeer`, `mensajesSinLeer2`, `fechaActividad`) VALUES
(2, 1, 5, 14, 0, 1, '2020-05-05 18:42:50'),
(3, 16, 15, 13, 0, 1, '2020-05-06 13:13:11'),
(4, 17, 15, 12, 1, 0, '2020-05-06 13:22:18'),
(5, 17, 16, 11, 1, 0, '2020-05-06 13:24:46'),
(6, 18, 16, 10, 1, 0, '2020-05-06 13:31:53'),
(7, 18, 5, 9, 0, 1, '2020-05-06 13:33:17'),
(8, 15, 18, 6, 0, 0, '2020-05-06 13:48:28'),
(9, 1, 18, 3, 0, 3, '2020-05-06 20:15:02');

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

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`Genero`) VALUES
('Ciencia Ficción'),
('Comedia'),
('Drama'),
('Fantasía'),
('Histórico'),
('Infantil'),
('Juvenil'),
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
(10, 33, 'Drama'),
(11, 33, 'Romántico'),
(12, 34, 'Romántico'),
(13, 35, 'Romántico'),
(14, 36, 'Romántico');

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
(3, NULL, 0, 3, '2020-05-06 13:08:30'),
(4, NULL, 0, 4, '2020-05-06 13:17:14'),
(6, NULL, 0, 5, '2020-05-06 13:31:47');

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
(2, 'La Rueda Del Tiempo, El Ojo Del Mundo', 'Robert Jordan', 19, 4, NULL, 'imagenes/libros/portada_el-ojo-del-mundo-n-0114_robert-jordan_201910151031.jpg', '   Moraine, una maga capaz de encauzar el Poder Único, anuncia el despertar de una terrible amenaza. Esa misma noche, el pueblo se ve atacado por espantosos trollocs sedientos de sangre, unas bestias semihumanas que hasta entonces se habían considerado una leyenda.        ', 'Fantasía', 1, '2020-05-04', 'Castellano', 'Minotauro', 0, 100, '1990-01-15'),
(10, 'La Rueda Del Tiempo, El Despertar De Los Héroes', 'Robert Jordan', 20, NULL, NULL, 'imagenes/libros/descargar-libro-el-despertar-de-los-heroes-en-pdf-epub-mobi-o-leer-online.jpg', 'Las fuerzas del mal se agitan y tienden sus garras sobre el mundo, al mismo tiempo que surgen señales que auguran la proximidad de la Ultima Batalla, donde ha de decidirse la suerte de la humanidad. ', 'Fantasía', 1, '2020-05-04', 'Castellano', 'Tor Books', 0, 100, '1990-10-15'),
(11, 'La Rueda Del Tiempo, El Dragón Renacido', 'Robert Jordan', 19, NULL, NULL, 'imagenes/libros/portada_el-dragon-renacido-n-0314_robert-jordan_201912090923.jpg', 'Rand, acosado por inquietantes sueños sobre una espada de cristal, decide abandonar a sus compañeros tras un ataque de Engendros de la Sombra y se encamina hacia Tear para descubrir quién es realmente. Mientras tanto, las tres jóvenes aspirantes a Aes Sedai viajan con Mat hacia Tar Valon para ingresar como novicias en la Torre Blanca, donde esperan que las hermanas sanen a Mat de la extraña enfermedad que padece. Poco tiempo después, la Amyrlin les encomienda una peligrosa misión. . . ', 'Fantasía', 1, '2020-05-04', 'Castellano', 'Minotauro', 0, 100, '1991-10-15'),
(12, 'La Rueda Del Tiempo, El Ascenso De La Sombra', 'Robert Jordan', 20, NULL, NULL, 'imagenes/libros/ascenso de las sombras.jpg', 'Los sellos de Shayol Ghul se han debilitado y la presencia del Oscuro se hace cada vez más evidente. En Tar Valon, Min es testigo de hechos portentosos que vaticinan un horrible futuro. Los Capas Blancas buscan en Dos Ríos a un hombre con los ojos dorados y siguen el rastro del Dragón Renacido. Perrin, acompañado de Fraile, Loial y algunos Aiel llegan allí después de atravesar los Portales de Piedra.\r\n\r\nSe encontrarán con los Trollocs, que sirven al Oscuro, y con los Capas Blancas y su peculiar manera de entender la defensa de la Luz. Mientras Elayne y Nynaeve parten hacia Tanchico siguiendo el rastro de las Aes Sedai del Ajah Negro que se llevaron los numerosos angreal, Rand trata de reunir a todos los clanes de los Aiel. Con ello cumplirá parte de la profecía de Rhuidean.  ', 'Fantasía', 1, '2020-05-04', 'Castellano', 'Minotauro', 0, 100, '1992-09-15'),
(13, 'La Rueda Del Tiempo, Cielo En Llamas', 'Robert Jordan', 19, NULL, NULL, 'imagenes/libros/cielo en llamas.jpg', 'Rand aguarda en Rhuidean a que se unan todos los clanes de los Aiel, pero la actitud del jefe de los Shaido puede obligar a Rand a cambiar de planes. En la corte de Caemlyn, Morgase tiene que enfrentarse a una traición inesperada, mientras la Torre Blanca se convierte en un nido de intrigas. Elaida, ascendida a Sede Amyrlin, pretende capturar al Dragón Renacido para mantenerlo a salvo hasta el momento del Tarmon Gaidon, aunque algunos creen que no es eso lo que pretende. ', 'Fantasía', 1, '2020-05-04', 'Castellano', 'Minotauro', 0, 100, '1993-10-15'),
(14, 'La Rueda Del Tiempo, El Señor Del Caos', 'Robert Jordan', 20, NULL, NULL, 'imagenes/libros/libro-la-rueda-del-tiempo-6-el-senor-del-caos-portada-pdf.jpg', 'Rand se esfuerza por unir a las naciones para combatir al Oscuro al tiempo que sortea las trampas que los Renegados tienden a la desprevenida raza humana. Pero además tiene que enfrentarse a los Hijos de la Luz, cuyo capitán general se propone desprestigiarlo y dirigir la batalla contra la Sombra.\r\nPor su parte, las Aes Sedai buscan a Rand para ofrecerle su apoyo, aunque ése sospecha que su verdadera intención es usarlo para sus propios fines. ', 'Fantasía', 1, '2020-05-04', 'Castellano', 'Minotauro', 0, 100, '1994-10-15'),
(27, 'El Príncipe De La Niebla', 'Carlos Ruiz Zafón', 9, NULL, NULL, 'imagenes/libros/principeDeLaNiebla.jpg', '  Un diabólico príncipe que concede cualquier deseo... a un alto precio.\r\n\r\nEl nuevo hogar de los Carver está rodeado de misterio. En él aún se respira el espíritu de Jacob, el hijo de los antiguos propietarios, que murió ahogado. Las extrañas circunstancias de esa muerte sólo empiezan a aclararse con la aparición de un diabólico personaje: el Príncipe de la Niebla.     ', 'Juvenil', 1, '2020-05-04', 'Castellano', 'Planeta', 0, 47, '1993-05-23'),
(28, 'La Sombra Del Viento (Serie 1 El Cementerio De Los Libros Olvidados )', 'Carlos Ruiz Zafón', 10, NULL, NULL, 'imagenes/libros/laSombraDelViento.jpg', ' «Todavía recuerdo aquel amanecer en que mi padre me llevó por primera vez a visitar el Cementerio de los Libros Olvidados.»\r\n\r\nUn amanecer de 1945, un muchacho es conducido por su padre a un misterioso lugar oculto en el corazón de la ciudad vieja: el Cementerio de los Libros Olvidados. Allí, Daniel Sempere encuentra un libro maldito que cambia el rumbo de su vida y le arrastra a un laberinto de intrigas y secretos enterrados en el alma oscura de la ciudad.La Sombra del Vientoes un misterio literario ambientado en la Barcelona de la primera mitad del siglo xx, desde los últimos esplendores del Modernismo hasta las tinieblas de la posguerra.\r\n\r\nAunando las técnicas del relato de intriga y suspense, la novela histórica y la comedia de costumbres,La Sombra del Vientoes sobre todo una trágica', 'Juvenil', 1, '2020-05-04', 'Castellano', 'Planeta', 0, 53, '2001-08-30'),
(29, 'El Juego Del Ángel (Serie 2 El Cementerio De Los Libros Olvidados)', 'Carlos Ruiz Zafón', 11, NULL, NULL, 'imagenes/libros/elJuegoDelAngel.jpg', '  La próxima vez que quieras salvar un libro, no te juegues la vida... Te llevaré a un lugar secreto donde los libros nunca mueren.\r\nEn la turbulenta Barcelona de los años 20 un joven escritor obsesionado con un amor imposible recibe la oferta de un misterioso editor para escribir un libro como no ha existido nunca, a cambio de una fortuna y, tal vez, mucho más.\r\nCon estilo deslumbrante e impecable precisión narrativa, el autor de La Sombra del Viento nos transporta de nuevo a la Barcelona del Cementerio de los Libros Olvidados para ofrecernos una gran aventura de intriga, romance y tragedia, a través de un laberinto de secretos donde el embrujo de los libros, la pasión y la amistad se conjugan en un relato magistral.     ', 'Juvenil', 1, '2020-05-04', 'Castellano', 'Planeta', 0, 27, '2008-09-14'),
(30, 'El Prisionero Del Cielo (Serie 3 El Cementerio De Los Libros Olvidados)', 'Carlos Ruiz Zafón', 10, NULL, NULL, 'imagenes/libros/elPrisioneroDelCielo.jpg', ' Escribo estas palabras en la esperanza y el convencimiento de que algún día descubrirás este lugar…un lugar que cambió mi vida como estoy seguro de que cambiará la tuya.\r\nBarcelona, 1957. Daniel Sempere y su amigo Fermín, los héroes de La Sombra del Viento, regresan de nuevo a la aventura para afrontar el mayor desafío de sus vidas.\r\nJusto cuando todo empezaba a sonreírles, un inquietante personaje visita la librería de Sempere y amenaza con desvelar un terrible secreto que lleva enterrado dos décadas en la oscura memoria de la ciudad. Al conocer la verdad, Daniel comprenderá que su destino le arrastra inexorablemente a enfrentarse con la mayor de las sombras: la que está creciendo en su interior.\r\nRebosante de intriga y emoción,El Prisionero del Cielo es una novela magistral donde los hi', 'Juvenil', 1, '2020-05-04', 'Castellano', 'Planeta', 0, 26, '2011-11-23'),
(31, 'Marina', 'Carlos Ruiz Zafón', 8, NULL, NULL, 'imagenes/libros/marina.jpg', 'En la Barcelona de 1980 Óscar Drai sueña despierto, deslumbrado por los palacetes modernistas cercanos al internado en el que estudia. En una de sus escapadas conoce a Marina, una chica delicada de salud que comparte con Óscar la aventura de adentrarse en un enigma doloroso del pasado de la ciudad. Un misterioso personaje de la posguerra se propuso el mayor desafío imaginable, pero su ambición lo arrastró por sendas siniestras cuyas consecuencias debe pagar alguien todavía hoy. ', 'Juvenil', 1, '2020-05-04', 'Castellano', 'Planeta', 0, 17, '1999-05-15'),
(32, 'Las Luces De Septiembre', 'Carlos Ruiz Zafón', 9, NULL, NULL, 'imagenes/libros/lasLucesDeSeptiembre.jpg', 'Un misterioso fabricante de juguetes vive recluido en una mansión poblada de seres mecánicos y sombras del pasado... Un enigma en torno a extrañas luces que brillan entre la niebla que rodea el islote del faro... Estos y otros elementos tejen la trama del misterio que unirá a Irene e Ismael para siempre durante un mágico verano en Bahía Azul. ', 'Juvenil', 1, '2020-05-04', 'Castellano', 'Planeta', 0, 22, '1995-03-26'),
(33, 'After: 1 (The After Series)', 'Anna Todd', 11, NULL, NULL, 'imagenes/libros/after1.jpg', '        Un libro de amor bastante moñas, hay 3 más pero nos duele la vida de solo pensarlo.        ', 'Romántico', 1, '2020-05-06', 'Español', 'Wattpad', 0, 20, '2017-07-11'),
(34, 'After. En mil pedazos', 'Anna Topp', 13, NULL, NULL, 'imagenes/libros/after2.jpg', '  Una historia que nadie quiere que acabe y todo el mundo quiere vivir.\r\nTessa se acaba de despertar de un sueño. Es consciente de que era todo demasiado bonito para ser cierto… \r\n\r\n¿Es posible volver a sonreír cuando todo se rompe en pedazos? Ella y Hardin parecían hechos el uno para el otro, como dos almas gemelas, pero él lo ha roto todo, se ha acabado el sueño para siempre. ¿Cómo ha podido ser tan ingenua? Si quiere recuperarla, Hardin deberá luchar como nunca por lo que ha hecho. ¿Estará preparado? ¿Se puede perdonar todo?    ', 'Romántico', 1, '2020-05-06', '', 'Wattpad', 0, 30, '2015-07-15'),
(35, 'After. Almas perdidas', '', 7, NULL, NULL, 'imagenes/libros/after3.jpg', '   El amor de Tessa y Hardin ya ha sido complicado en otras ocasiones, pero ahora lo es más que nunca. Su vida no volverá a ser como antes…\r\nJusto cuando Tessa toma la decisión más importante de su vida, todo cambia. Los secretos que salen a la luz sobre su familia, y también sobre la de Hardin ponen en duda su relación y su futuro juntos.    ', 'Romántico', 1, '2020-05-06', 'España', 'Wattpad', 12, 36, '2016-06-22'),
(36, 'After. Amor infinito', 'Anna Todd', 7, NULL, NULL, 'imagenes/libros/after4.jpg', 'La historia de dos almas gemelas que no pueden estar separadas, pero que no saben cómo estar juntas. El amor es pasión y complicidad, pero también es aprender a conocer al otro y hacer juntos un proyecto común.\r\n\r\n ', 'Romántico', 1, '2020-05-06', 'Español', 'Wattpad', 0, 20, '2020-04-30');

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
  `Titulo` varchar(30) NOT NULL,
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
(3, 'Mr. Wondewrfull', 'imagenes/librosIntercambio/feliz.jpg', 'Este libro me ha ayudado a pasar largas temporadas con mi madre, si alguien me lo quiere intercambiar por algún libro de gatitos se lo agradecería.', 'Comedia', 15, 'Cosas no aburridas para ser la', 0, 0, '2020-05-06 13:08:30'),
(4, 'Stephenie Meyer', 'imagenes/librosIntercambio/crepusculo.jpg', 'Me lo compré pensando que iba a ser un libro sobre el estudio astronómico pero resultó una novela adolescente. Casi que lo regalo, pero si me ofrecéis un libro de astronomía mejor.', 'Juvenil', 16, 'Crepúsculo', 0, 0, '2020-05-06 13:17:14'),
(5, 'Christophe Galfard', 'imagenes/librosIntercambio/universoenm.jpg', 'Este libro es brutal, me cambió la vida.', 'Histórico', 17, 'El universo en tu mano', 0, 0, '2020-05-06 13:24:42'),
(6, 'Ella Valentine', 'imagenes/librosIntercambio/milibroJQ.jpg', 'Es un poco como mi biografía, la verdad es que te sientes muy identificado con el protagonista. Como ya me lo he acabado, quizá te interese saber cómo se siente ser como yo.', 'Drama', 18, 'Multimillonario &amp; Canalla', 0, 0, '2020-05-06 13:31:47'),
(7, 'Pepe', 'imagenes/librosIntercambio/pepe.jpg', 'ME he sentido maaazo identificado con el dichoso pollo', 'Infantil', 18, 'El pollo pepe', 0, 0, '2020-05-06 13:34:44');

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
(3, 15, 16, 'Hola Bernardo, la verdad es que tengo unos libros de gaticos muy chulos', '2020-05-06 13:13:35'),
(4, 16, 17, 'A ver, yo soy bastante feliz pero no tengo  libros de gaticos, te interesa uno de cómo saltarte el trabajo sin que te pillen. jejejeje', '2020-05-06 13:23:00'),
(5, 17, 17, 'Te he ofrecido un libro de astronomía, revisa las notificaciones!', '2020-05-06 13:25:08'),
(6, 18, 18, 'Uuuf, lo de los vampiros esos voladores mola cacho, te interesa un libro romántico/dramático?', '2020-05-06 13:33:00'),
(7, 19, 18, 'T Einteresa el pollo Pepe, es la cosa maás gracios aque he leído en mi vida, mis chavales se lo pasaban pipa leyéndolo, pero ya se lo saben de memoria.', '2020-05-06 13:35:19'),
(3, 20, 15, '¡Lechés!\r\nPuedes decirme cómo se llaman?', '2020-05-06 13:47:39'),
(4, 21, 15, 'Julián que nos conocemos, no me quiero saltar el trabajo. Solo quiero un buen gato de felinos!', '2020-05-06 13:48:17'),
(5, 22, 16, 'La verdad es que es muy buena oferta, muchas gracias Julián. Pero déjamelo pensar un par de días', '2020-05-06 13:52:16'),
(6, 23, 16, 'Jesús para por favor', '2020-05-06 13:52:49'),
(3, 24, 16, '-Michis tristes Vol.1\r\n-El Gran Libro de Gatos Gordos\r\n-1000 fotos de gaticos que debes ver antes de morir\r\n', '2020-05-06 13:53:54'),
(9, 25, 1, 'Te vamos a benear', '2020-05-06 20:15:26'),
(9, 26, 1, 'Te vamos a banear*', '2020-05-06 20:15:35'),
(9, 27, 1, 'Por canallita', '2020-05-06 20:15:44');

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

--
-- Volcado de datos para la tabla `ofertasintercambio`
--

INSERT INTO `ofertasintercambio` (`id`, `idLibroIntercambio`, `idLibroOferta`, `ofertaAceptada`) VALUES
(1, 4, 5, 2),
(2, 1, 7, 2);

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
(1, 'admin', 'Administrador', '$2y$12$IgSk5wgr4BPD0PiSzHqGdeQau3iwvAAlSuFSA3eJNM28zKTzTlbSi', 'admin@mail.com', 'imagenes/usuarios/p5.gif', 'Mi casa', '2020-03-07', 'Madrid', '2020-03-16 20:07:18', 0),
(2, 'xAlex', 'Alex', '$2y$10$PRkJe1JoBxw4QUNpueSB2.QBGeQuBSDU.EUokxw9e.u3FSy8dBI7q', 'alro12@ucm.es', '/fotos/fotos/img2.jpg', 'Calle Madrid', '1996-04-19', 'Barcelona', '2020-03-16 20:08:20', 1),
(3, 'Javier ', 'User3', '$2y$10$WzsGXsEBnrzNWpQe983aVuV.DvLh.qU4I1pZsKoVX8Q5eeoCuE47e', 'dani@gmail.com', '/fotos/fotos/img3.jpg', 'Calle la casa', '1996-08-12', 'Madrid', '2020-03-16 20:08:42', 1),
(4, 'Sergiox', 'Sergio García', '$2y$10$0/IMnYZrpuJlfMJ4PXgHCO9C0VYt0K576pfRJjirbtmQbvwpnWxJe\r\n', 'Serg@gmail.com', '/fotos/fotos/img4.jpg', 'Calle Los angeles', '1997-08-19', 'Valencia', '2020-03-16 20:09:37', 2),
(5, 'Geo', 'Daniel', '$2y$12$YnvgZwS4gju5WQJKRjftiOCgfFVqQqtcl0GBhnZ5yV2ux5nCd4EtW', 'dsanto07@ucm.es', 'imagenes/usuarios/xion.gif', 'Mi Casa', '1999-12-22', 'Madrid', '2020-03-20 17:56:46', 0),
(6, 'LuiSHer', 'Luis Hernández', '$2y$10$hOhrx2qQo6r04DG9aVOJE.6G.WJd3X3u9tQQY9qwWJ1nZLizsufhW', 'Serg@gmail.com', '/fotos/fotos/img6.jpg', 'Calle Los angeles', '1997-08-19', 'Salamanca', '2020-03-16 20:10:04', 2),
(10, 'user5', 'pablo', '$2y$10$Ae6ouAPUoc54K5jOHozvgO2Or/8m/NpFIhkUUYYgNvwjubS/juDFy', 'asda', 'hola', 'hola', '2020-02-02', 'hola', '0000-00-00 00:00:00', 1),
(11, 'dani12', 'dfsdfs', '$2y$10$.HltE6BcGJWI2etJUl5PFOkkZh60tNvvtpnZIcoOEKdmxtW0VTZu.', 'asdaxdasdas', 'imagenes/usuarios/', 'asdad', '2020-04-30', 'sda', '2020-04-02 16:12:50', 1),
(12, 'dani13', '43342', '$2y$10$RiSL6Uv3Ji5dOntxmsG3geu83lBVH8GVqqacYqs4K6kycOeOXD5yu', 'aaaaaaaaaaaaaa', 'imagenes/usuarios/librosinter.PNG', 'asdasdsadas', '2020-04-01', 'adsasdasd', '2020-04-02 16:17:32', 1),
(13, 'user', 'Usuario', '$2y$12$ALf/uwh6wYQubFn3761HWOnzWyR6fZ6p.yEwCRCKYxK2x4exBYRNe', 'a', 'imagenes\\usuarios\\default.png', 'a', '2020-04-01', 'a', '2020-04-02 18:47:19', 1),
(14, 'mod', 'Moderador', '$2y$12$5UGSb62o/BgY/bto0aXMqO4pt4obvflUx8Ss3eDfw6X3RJyTCipWq', 'a', 'imagenes\\usuarios\\default.png', 'a', '2020-04-01', 'a', '2020-04-02 18:47:19', 2),
(15, 'Bernard64', 'Bernardo Marín', '$2y$10$ZroKl1Fho96WLot9xhsF2u6TY5.CvfVVLGrX3GCKxac2s2Aw6SOoa', 'bernardo@cc.es', 'imagenes/usuarios/Bernardo.jpg', 'Vivo con mi madre', '1956-04-23', 'Madrid', '2020-05-06 13:04:10', 1),
(16, 'Cañizares', 'Cañizares', '$2y$10$jkiBUD2koRimnAG1fRAtYeRH4GMh9w4b7J.OLvgjvMC.ikaneUcvy', 'cañizares@cc.es', 'imagenes/usuarios/cañizares.jpg', 'Madrid', '1996-05-16', 'Madrid', '2020-05-06 13:12:49', 1),
(17, 'JuliPachacho', 'Julián Palacios', '$2y$10$h5.Rxhmxwica.FzA5nfOWu3OgZolNMZkv4VygtUzxfANUQah3dTpW', 'julipala@cc.es', 'imagenes/usuarios/julián.jpg', 'Villa de Murcia 45 3', '1975-07-31', 'Murcia', '2020-05-06 13:21:13', 1),
(18, 'Roncolo69', 'Jesús Quesada', '$2y$10$IX7aL/lfo5JmYMjazcbzWu1aDkTPoTSXcDs3xBtjoAq703xmrWiNW', 'jesques@cc.es', 'imagenes/usuarios/jesus.jpg', 'Avenida de la Paz Nº34', '1969-04-18', 'Ciudad Real', '2020-05-06 13:28:19', 1);

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
(2, 1, 4, 'Increible', 1);

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
  MODIFY `Id_Chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `Id_Discusion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `Id_Favorito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generolibros`
--
ALTER TABLE `generolibros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `intercambios`
--
ALTER TABLE `intercambios`
  MODIFY `Id_Intercambio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `Id_Libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `librointercambio`
--
ALTER TABLE `librointercambio`
  MODIFY `Id_Libro_Inter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mensajechat`
--
ALTER TABLE `mensajechat`
  MODIFY `Id_Mensaje_Chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ofertasintercambio`
--
ALTER TABLE `ofertasintercambio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `valoracionlibro`
--
ALTER TABLE `valoracionlibro`
  MODIFY `Id_Valoracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
