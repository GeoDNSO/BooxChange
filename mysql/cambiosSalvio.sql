-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2020 a las 14:31:14
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
-- Base de datos: `bdbooxchange`
--

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`Genero`) VALUES
('Biografía'),
('Ciencia Ficción'),
('Comedia'),
('Drama'),
('Fantasía'),
('Histórico'),
('Infantil'),
('Juvenil'),
('Manga'),
('Poesía'),
('Romántico'),
('Youtubers');

--
-- Volcado de datos para la tabla `generolibros`
--

INSERT INTO `generolibros` (`id`, `idLibro`, `genero`) VALUES
(2, 2, 'Fantasía'),
(6, 11, 'Fantasía'),
(7, 12, 'Fantasía'),
(8, 13, 'Fantasía'),
(9, 14, 'Fantasía'),
(10, 33, 'Poesía'),
(11, 34, 'Biografía');

--
-- Volcado de datos para la tabla `intercambios`
--

INSERT INTO `intercambios` (`Id_Libro_Inter1`, `Id_Libro_Inter2`, `EsMisterioso`, `Id_Intercambio`, `Fecha`) VALUES
(1, NULL, 0, 1, '2020-05-05 16:26:00'),
(2, NULL, 0, 2, '2020-05-05 17:30:45'),
(3, NULL, 0, 3, '2020-05-06 13:27:42'),
(4, NULL, 0, 4, '2020-05-06 14:07:55'),
(5, NULL, 1, 5, '2020-05-06 14:11:16'),
(6, NULL, 1, 6, '2020-05-06 14:15:23');

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`Id_Libro`, `Titulo`, `Autor`, `Precio`, `Valoracion`, `Ranking`, `Imagen`, `Descripcion`, `Genero`, `EnTienda`, `Fecha`, `Idioma`, `Editorial`, `Descuento`, `unidades`, `FechaPublicacion`) VALUES
(2, 'La Rueda Del Tiempo, El Ojo Del Mundo', 'Robert Jordan', 19, 1, NULL, 'imagenes/libros/portada_el-ojo-del-mundo-n-0114_robert-jordan_201910151031.jpg', 'Moraine, una maga capaz de encauzar el Poder Único, anuncia el despertar de una terrible amenaza. Esa misma noche, el pueblo se ve atacado por espantosos trollocs sedientos de sangre, unas bestias semihumanas que hasta entonces se habían considerado una leyenda.  ', 'Fantasía', 1, '2020-05-04', 'Castellano', 'Minotauro', 0, 100, '1990-01-15'),
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
(33, 'La escala de Mohs', 'Gata Cattana', 13, 5, NULL, 'imagenes/libros/cattana.jpg', 'El único poemario de una artista polifacética que es todo un referente para varias generaciones: feminista, música y poeta; comprometida y talentosa. Gata Cattana. ', 'Poesía', 1, '2020-05-06', 'Español', 'Aguilar', 0, 10, '2019-01-01'),
(34, 'Búnker: memorias de un encierro, rimas y tiburones blancos', 'Toteking', 20, 4, NULL, 'imagenes/libros/toteking.jpg', 'Toteking, leyenda viva del rap español, pero sobre todo lector incansable, escribe: «Viajar a tus recuerdos es buscar pelea». Y lo hace. Sin miedo.  ', 'Biografía', 1, '2020-05-06', 'Español', 'Aguilar', 5, 5, '2019-01-01');

--
-- Volcado de datos para la tabla `librointercambio`
--

INSERT INTO `librointercambio` (`Id_Libro_Inter`, `AutorLibInter`, `Imagen`, `Descripcion`, `Genero`, `Id_Usuario`, `Titulo`, `Intercambiado`, `esOferta`, `Fecha`) VALUES
(1, 'Charles Perrault', 'imagenes/librosIntercambio/caperucita roja.jpg', 'La clásica historia de la Caperucita Roja, el libro está prácticamente nuevo y es de la editorial SM, me gustaría algún otro libro infantil para tener un intercambio justo aunque estoy abierto a cualquier otra oferta', 'Infantil', 5, 'Caperucita Roja', 0, 0, '2020-05-05 16:26:00'),
(2, 'Jordi Sierra i Fabra', 'imagenes/librosIntercambio/campoDeFresas.jpg', 'Un libro que leí hace tiempo y que no crea que vuelva a leer, sin duda una historia a tener en cuenta que nos enseña que la vida puede cambiar en cualquier momento, el transcurso de la trama es muy interesante y profundo. A cambio me gustaría algún libro de fantasía o drama', 'Juvenil', 5, 'Campo de Fresas', 0, 0, '2020-05-05 17:30:45'),
(3, 'Hajime Isayama', 'imagenes/librosIntercambio/aot23.jpg', 'Llegar hasta el mar solo es el primer paso: más allá de las olas se disputa una terrible batalla entre los eldianos y los marleyanos.', 'Manga', 15, 'Ataque a los titanes 23', 0, 0, '2020-05-06 13:27:42'),
(4, 'Toteking', 'imagenes/librosIntercambio/toteking.jpg', 'Toteking, leyenda viva del rap español, pero sobre todo lector incansable, escribe: «Viajar a tus recuerdos es buscar pelea». Y lo hace. Sin miedo.', 'Biografía', 15, 'Búnker: memorias de un encierr', 0, 0, '2020-05-06 14:07:55'),
(5, 'Gata Cattana', 'imagenes/usuarios/cattana.jpg', 'Libro Misterioso', 'Poesía', 15, 'La escala de mohs', 0, 0, '2020-05-06 14:11:16'),
(6, 'Blon', 'imagenes/usuarios/blon.jpg', 'Libro Misterioso', 'Poesía', 15, 'Eterna(mente)', 0, 0, '2020-05-06 14:15:23');

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Nombre`, `NombreReal`, `Contraseña`, `Correo`, `Foto`, `Direccion`, `Nacimiento`, `Ciudad`, `FechaDeCreacion`, `Rol`) VALUES
(1, 'admin', 'Administrador', '$2y$12$IgSk5wgr4BPD0PiSzHqGdeQau3iwvAAlSuFSA3eJNM28zKTzTlbSi', 'hola@sad.com', '/fotos/fotos/img1.jpg', 'Mi casa', '2020-03-07', 'sadas', '2020-03-16 20:07:18', 0),
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
(15, 'LuciDemonio', 'Luci Demonio', '$2y$10$FLFSAsYgJq0UKoFCPj/v8eiIr/jQTXUGFSOYmpPPDvtridR1/bguu', 'luci@demonio.des', 'imagenes/usuarios/luci.jpg', 'Callejon del elfo, 3', '1963-02-20', 'Dreamland', '2020-05-06 13:12:59', 1);

--
-- Volcado de datos para la tabla `valoracionlibro`
--

INSERT INTO `valoracionlibro` (`Id_Libro`, `Id_Usuario`, `Valoracion`, `Comentario`, `Id_Valoracion`) VALUES
(2, 1, 1, 'eee', 1),
(33, 15, 5, 'Mi rapera favorita. Denscasa en paz', 3),
(34, 15, 4, 'Buen libro aunque me gustan más sus canciones', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
