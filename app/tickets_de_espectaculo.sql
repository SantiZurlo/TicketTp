-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 01-11-2024 a las 15:44:17
-- Versión del servidor: 8.3.0
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tickets_de_espectaculo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(1000) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `units` int NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `image` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `date`, `description`, `units`, `price`, `longitude`, `latitude`, `image`) VALUES
(1, 'Te espero en la oscuridad', '2024-10-04 21:00:00', 'Susan Hendrix es una mujer ciega que vive en su departamento de Nueva York. Un día su marido llega a la casa con una muñeca. Este es el puntapié inicial para un espeluznante thriller policial y de suspenso donde tres delincuentes irrumpen en el departamento de Susan buscando esa misteriosa muñeca. Estos tratarán de recuperarla entrando a casa de Susan para lograr que ella les entregue la muñeca. Pero Susan empieza a sospechar del plan que están llevando a cabo los tres hombres y cuando cae la noche decide sorprenderlos dejando su hogar en una absoluta oscuridad.\r\nDe acá en más la historia se transforma en un juego de vida y muerte donde se establece un juego del gato y el ratón entre los personajes.\r\nComo en el cine, pero en el teatro, este thriller de suspenso y policial mantiene al público inmóvil en la platea hasta un sorpresivo final.', 100, 17000.00, -34.594480, -58.447750, '1.jpg'),
(2, 'Circo Digital Teatro En Vivo', '2024-10-19 17:00:00', 'The Amazing Digital Circus sigue a un elenco de humanos —Pomni, Jax, Ragatha, Gangle, Kinger y Zooble— que han quedado atrapados en el circo titular, un juego de realidad virtual. Bajo la dirección de su maestro de ceremonias, la inteligencia artificial Caine, viven aventuras disparatadas a riesgo de perder la cordura y «abstraerse» en monstruos digitales.', 150, 12000.00, -34.601100, -58.383530, '2.jpg'),
(21, 'Dragon Ball DAIMA', '2024-10-31 18:44:00', '¡Goku y compañía vivían vidas pacíficas cuando de repente se volvieron pequeños debido a una conspiración! Cuando descubren que la razón de esto puede estar en un mundo conocido como el \"Reino de los Demonios\", un joven y misterioso Majin llamado Glorio aparece ante ellos.', 12, 125000.00, 47.612540, -122.323400, 'daima1.png'),
(45, 'Disney celebra: Una navidad inolvidable', '2024-12-12 19:00:00', '“DISNEY CELEBRA: UNA NAVIDAD INOLVIDABLE” sumerge al público en el corazón de una celebración navideña en un espectáculo único y sin precedentes. Topa y Laurita Fernández se unen para cumplir una tarea especial: empaquetar los sueños y deseos que llegan al centro de distribución. Ellos están a cargo de la tarea de asegurar que cada deseo llegue a su destino antes de que el gran árbol de Navidad encienda sus luces. Este año, algo mágico sucede: muchos de esos paquetes contienen deseos que conectan con las canciones icónicas de las películas de Disney y el espíritu navideño. A medida que preparan estos paquetes mágicos, cada deseo introduce al público en un viaje musical extraordinario invitando a los espectadores a redescubrir la Navidad', 100, 5000.00, -34.594423, -58.447745, 'mickey3.png'),
(46, 'Axel 25 Tour', '2025-01-25 21:00:00', 'El reconocido cantautor argentino Axel anuncia las primeras fechas de su “25 Tour” con el que recorrerá el país para celebrar sus 25 años de carrera. Ya están confirmados sus shows de Buenos Aires - el 1 y 2 de noviembre en el Teatro Ópera, Rosario - el 29 de noviembre en el Teatro Broadway- y Córdoba - el 30 de noviembre en Quality Espacio.\r\n\r\nTras cerrar el 2023 con un concierto a sala llena en el Estadio Luna Park, Axel confirma esta primera etapa de la gira que se extenderá a lo largo del 2025 por varios escenarios de Argentina y Latinoamérica. Será una oportunidad para festejar con su público su camino con la música, con un repertorio que recorrerá toda su historia: desde sus comienzos, con innumerables éxitos como “Amo”, “Tu amor por...', 150, 7000.00, -34.601069, -58.383530, 'axel_a.png'),
(47, 'The beats', '2024-11-16 19:00:00', 'The Beats se presentará el día Sábado 16 de Noviembre a las 21 Hs. en el Teatro Opera.', 70, 6000.00, -34.603724, -58.378920, 'bea960.png'),
(48, 'Terror sinfonico', '2024-10-31 21:00:00', 'Acompañados por una majestuosa orquesta sinfónica, este tenebroso viaje musical, esta invocación espiritual de las pesadillas generadas por el cine de terror, te hará sentir el suspenso, la tensión y el misterio en su máxima expresión .\r\n\r\nDesde los inquietantes acordes de \"Psicosis\", pasando por la atmósfera sombría de \"El Exorcista\", hasta la intensidad de \"Halloween\" y mucho más, cada nota te acercará al borde de tu asiento. Cada melodía sonara como un cuchillo helado en medio de la niebla.\r\n\r\nDe los creadores de “Swiftie Symphony”, “Galaxias Sinfónicas” y “Cinema Symphony” ahora llega este homenaje único al cine de terror. Con la Dirección Musical de la Maestra Clara Ackermann, la Dirección General de Chacho Garabal, en una coproducción entre Smilehood y Galaxias Creativas.\r\n\r\n¿Te animas a venir solo? No vamos a dejar la luz encendida', 80, 4000.00, -34.594454, -58.447740, 'terror960.png'),
(49, 'Coti', '2024-11-04 21:00:00', 'Coti es, sin dudas, uno de los más reconocidos compositores a nivel global, con una cantidad innumerables de hits que continúan conquistando el mundo reiteradamente. Tras 20 años de carrera sigue girando por América y Europa con sus shows. A lo largo de su carrera, COTI se instaló como un símbolo cultural en el mercado internacional. Logrando varios #1 en rankings de diferentes países y obtuvo galardones de Disco de Oro, Platino y Doble Platino en España, Argentina, México y Colombia. Dos Premios Grammy, Premio Ondas en España, Premio Gardel, Premio Oye en México, 12 Premios ASCAP en USA como songwriter. Y alcanzó reiteradas veces el #1 en Billboard con varias de sus canciones. Otro de los hitos en su carrera fue en 2017 junto a su banda \"Los Brillantes” y la orquesta de cuerdas Ensamble Sur Del Sur, cuando se presentó en el Teatro Colón de Buenos Aires, brindando un show único con invitados como David Lebón, Abel Pintos, Rolo Sartorio y Facundo Soto, entre otros. El repertorio del mis', 50, 9000.50, -34.596399, -58.383222, 'cot960_0.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_product` int NOT NULL,
  `id_user` int NOT NULL,
  `units` int NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `id_product`, `id_user`, `units`, `date`) VALUES
(1, 2, 2, 1, '2024-10-20 22:37:41'),
(2, 1, 2, 1, '2024-10-25 05:49:20'),
(3, 2, 2, 112, '2024-10-25 05:50:14'),
(4, 2, 2, 37, '2024-10-25 05:51:08'),
(5, 1, 2, 1, '2024-10-25 05:54:21'),
(6, 1, 2, 6, '2024-10-25 06:30:31'),
(7, 1, 2, 10, '2024-10-25 14:42:21'),
(8, 21, 2, 4, '2024-10-25 14:45:25'),
(9, 49, 2, 10, '2024-10-31 23:22:26'),
(10, 48, 2, 20, '2024-10-31 23:22:36'),
(11, 47, 2, 25, '2024-10-31 23:22:45'),
(12, 46, 2, 41, '2024-10-31 23:23:23'),
(13, 49, 6, 3, '2024-11-01 10:45:18'),
(14, 49, 2, 4, '2024-11-01 12:42:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `type` enum('client','employee') CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT 'client',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `type`) VALUES
(1, 'Reaxter', 'alejandrojavierlemi@gmail.com', 'ba27e7d348b1b6a593cf68e28edeeb80fa8a5257', 'employee'),
(2, 'Aley', 'aleycobalto@gmail.com', '49d1e953d898dca41a7ce65e7a62aefd49defbb7', 'client'),
(6, 'Lopes', 'lopez@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'client');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
