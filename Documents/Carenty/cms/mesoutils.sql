-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-03-2020 a las 16:26:48
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mesoutils`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visiteur_id` int(11) NOT NULL,
  `modele_id` int(11) NOT NULL,
  `commentaire` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `object_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `commentaire_fk` (`visiteur_id`),
  KEY `commentaire_fk_1` (`modele_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `commentaire`
--

INSERT INTO `commentaire` (`id`, `visiteur_id`, `modele_id`, `commentaire`, `date`, `object_id`) VALUES
(1, 3, 1, 'dkfjuhcbaeqmkoujjfbghzkmjrfb', '2020-03-28 16:16:44', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modeles`
--

DROP TABLE IF EXISTS `modeles`;
CREATE TABLE IF NOT EXISTS `modeles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modeles`
--

INSERT INTO `modeles` (`id`, `nom`) VALUES
(1, 'outils'),
(2, 'prets');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `outils`
--

DROP TABLE IF EXISTS `outils`;
CREATE TABLE IF NOT EXISTS `outils` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visiteur_id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type_disponibilite_id` int(11) NOT NULL DEFAULT '1',
  `modele` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nro_serie` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `presentation` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `outil_fk` (`visiteur_id`),
  KEY `outil_fk_1` (`type_disponibilite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `outils`
--

INSERT INTO `outils` (`id`, `visiteur_id`, `nom`, `type_disponibilite_id`, `modele`, `nro_serie`, `presentation`) VALUES
(1, 1, 'Tondeuse stylé', 2, 'super modèle', '344ERFA235R4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non lectus magna. Phasellus in suscipit orci. Fusce cursus eros eget orci consequat, ut varius velit hendrerit. In laoreet sollicitudin urna ac interdum. Donec quam orci, dapibus eget enim nec, congue bibendum magna. In hac habitasse platea dictumst. Maecenas eu nunc sed mauris commodo dictum vitae eu erat. Integer rhoncus massa nec elit euismod venenatis. Nullam rutrum enim ac turpis aliquam, at volutpat sem interdum. Sed in dignissim leo, at tincidunt ex. Sed nec mattis urna. Nulla massa magna, malesuada sit amet placerat non, dictum sit amet elit.'),
(2, 2, 'Tondeuse stylé', 2, 'super modèle', '344ERFA235R4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non lectus magna. Phasellus in suscipit orci. Fusce cursus eros eget orci consequat, ut varius velit hendrerit. In laoreet sollicitudin urna ac interdum. Donec quam orci, dapibus eget enim nec, congue bibendum magna. In hac habitasse platea dictumst. Maecenas eu nunc sed mauris commodo dictum vitae eu erat. Integer rhoncus massa nec elit euismod venenatis. Nullam rutrum enim ac turpis aliquam, at volutpat sem interdum. Sed in dignissim leo, at tincidunt ex. Sed nec mattis urna. Nulla massa magna, malesuada sit amet placerat non, dictum sit amet elit.'),
(3, 2, 'Tondeuse stylé', 2, 'super modèle', '344ERFA235R4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non lectus magna. Phasellus in suscipit orci. Fusce cursus eros eget orci consequat, ut varius velit hendrerit. In laoreet sollicitudin urna ac interdum. Donec quam orci, dapibus eget enim nec, congue bibendum magna. In hac habitasse platea dictumst. Maecenas eu nunc sed mauris commodo dictum vitae eu erat. Integer rhoncus massa nec elit euismod venenatis. Nullam rutrum enim ac turpis aliquam, at volutpat sem interdum. Sed in dignissim leo, at tincidunt ex. Sed nec mattis urna. Nulla massa magna, malesuada sit amet placerat non, dictum sit amet elit.'),
(4, 2, 'UNDISPO', 1, 'super modèle', '344ERFA235R4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non lectus magna. Phasellus in suscipit orci. Fusce cursus eros eget orci consequat, ut varius velit hendrerit. In laoreet sollicitudin urna ac interdum. Donec quam orci, dapibus eget enim nec, congue bibendum magna. In hac habitasse platea dictumst. Maecenas eu nunc sed mauris commodo dictum vitae eu erat. Integer rhoncus massa nec elit euismod venenatis. Nullam rutrum enim ac turpis aliquam, at volutpat sem interdum. Sed in dignissim leo, at tincidunt ex. Sed nec mattis urna. Nulla massa magna, malesuada sit amet placerat non, dictum sit amet elit.'),
(5, 2, 'Tondeuse stylé', 2, 'super modèle', '344ERFA235R4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non lectus magna. Phasellus in suscipit orci. Fusce cursus eros eget orci consequat, ut varius velit hendrerit. In laoreet sollicitudin urna ac interdum. Donec quam orci, dapibus eget enim nec, congue bibendum magna. In hac habitasse platea dictumst. Maecenas eu nunc sed mauris commodo dictum vitae eu erat. Integer rhoncus massa nec elit euismod venenatis. Nullam rutrum enim ac turpis aliquam, at volutpat sem interdum. Sed in dignissim leo, at tincidunt ex. Sed nec mattis urna. Nulla massa magna, malesuada sit amet placerat non, dictum sit amet elit.'),
(6, 2, 'Tondeuse stylé', 2, 'super modèle', '344ERFA235R4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non lectus magna. Phasellus in suscipit orci. Fusce cursus eros eget orci consequat, ut varius velit hendrerit. In laoreet sollicitudin urna ac interdum. Donec quam orci, dapibus eget enim nec, congue bibendum magna. In hac habitasse platea dictumst. Maecenas eu nunc sed mauris commodo dictum vitae eu erat. Integer rhoncus massa nec elit euismod venenatis. Nullam rutrum enim ac turpis aliquam, at volutpat sem interdum. Sed in dignissim leo, at tincidunt ex. Sed nec mattis urna. Nulla massa magna, malesuada sit amet placerat non, dictum sit amet elit.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prets`
--

DROP TABLE IF EXISTS `prets`;
CREATE TABLE IF NOT EXISTS `prets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donneur_id` int(11) NOT NULL,
  `receveur_id` int(11) NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `outil_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `prets_fk` (`donneur_id`),
  KEY `prets_fk_1` (`receveur_id`),
  KEY `prets_fk_2` (`status`),
  KEY `prets_fk_3` (`outil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `prets`
--

INSERT INTO `prets` (`id`, `donneur_id`, `receveur_id`, `debut`, `fin`, `status`, `outil_id`) VALUES
(1, 2, 3, '2020-03-28 12:52:00', '2020-04-28 12:52:00', 6, 3),
(2, 3, 1, '2020-03-28 12:52:00', '2020-10-28 12:52:00', 5, 3),
(3, 2, 3, '2020-03-28 15:40:00', '2020-03-31 15:40:00', 3, 3),
(4, 2, 3, '2020-03-28 15:40:00', '2020-03-28 15:40:00', 1, 3),
(5, 2, 3, '2020-03-28 15:40:00', '2020-03-28 15:40:00', 1, 3),
(6, 2, 3, '2020-05-28 15:54:00', '2020-09-28 15:54:00', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_prets`
--

DROP TABLE IF EXISTS `status_prets`;
CREATE TABLE IF NOT EXISTS `status_prets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `status_prets`
--

INSERT INTO `status_prets` (`id`, `nom`) VALUES
(1, 'demande'),
(2, 'accepte'),
(3, 'valide'),
(4, 'attente_retour'),
(5, 'retourne'),
(6, 'annule');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_disponibilite`
--

DROP TABLE IF EXISTS `type_disponibilite`;
CREATE TABLE IF NOT EXISTS `type_disponibilite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `type_disponibilite`
--

INSERT INTO `type_disponibilite` (`id`, `nom`) VALUES
(1, 'no_dispo'),
(2, 'dispo_tout'),
(3, 'dispo_amis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visiteurs`
--

DROP TABLE IF EXISTS `visiteurs`;
CREATE TABLE IF NOT EXISTS `visiteurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'WEBS',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `visiteurs`
--

INSERT INTO `visiteurs` (`id`, `nom`, `prenom`, `email`, `password`, `source`) VALUES
(1, 'Moreno', 'Chilitas', 'ailin@test.com', '$2y$10$95eP/BUE3njPq.bikO0.U.19d/qdT/i.zNJtf8C5k/x.W7t5vLyIu', 'WEBS'),
(2, 'Moreno', 'Sara', 'test@test.com', '$2y$10$S1w23tv4Ow82mp3MgGfcQOt7ckygB/EweFJdV38Val0.UC1WKmi5G', 'WEBS'),
(3, 'Gil', 'Ana', 'anasofiagil5@gmail.com', '$2y$10$7dsAmfvWUDMm.m9EJghrIeOjwfqmGwaXI5UkDBW87zD9IuhKpBaqm', 'WEBS');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_fk` FOREIGN KEY (`visiteur_id`) REFERENCES `visiteurs` (`id`),
  ADD CONSTRAINT `commentaire_fk_1` FOREIGN KEY (`modele_id`) REFERENCES `modeles` (`id`);

--
-- Filtros para la tabla `outils`
--
ALTER TABLE `outils`
  ADD CONSTRAINT `outil_fk` FOREIGN KEY (`visiteur_id`) REFERENCES `visiteurs` (`id`),
  ADD CONSTRAINT `outil_fk_1` FOREIGN KEY (`type_disponibilite_id`) REFERENCES `type_disponibilite` (`id`);

--
-- Filtros para la tabla `prets`
--
ALTER TABLE `prets`
  ADD CONSTRAINT `prets_fk` FOREIGN KEY (`donneur_id`) REFERENCES `visiteurs` (`id`),
  ADD CONSTRAINT `prets_fk_1` FOREIGN KEY (`receveur_id`) REFERENCES `visiteurs` (`id`),
  ADD CONSTRAINT `prets_fk_2` FOREIGN KEY (`status`) REFERENCES `status_prets` (`id`),
  ADD CONSTRAINT `prets_fk_3` FOREIGN KEY (`outil_id`) REFERENCES `outils` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
