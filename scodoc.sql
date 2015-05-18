-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Février 2015 à 01:06
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `scodoc`
--

-- --------------------------------------------------------

--
-- Structure de la table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `departments`
--

INSERT INTO `departments` (`id`, `name`, `admin_id`) VALUES
(1, 'Informatique', 1);

-- --------------------------------------------------------

--
-- Structure de la table `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(55) COLLATE utf8_bin DEFAULT NULL,
  `date` date DEFAULT NULL,
  `exam_coefficient` double NOT NULL DEFAULT '1',
  `begins` time NOT NULL DEFAULT '00:00:00',
  `ends` time NOT NULL DEFAULT '23:59:59',
  `group_id` int(11) DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Contenu de la table `exams`
--

INSERT INTO `exams` (`id`, `title`, `date`, `exam_coefficient`, `begins`, `ends`, `group_id`, `lesson_id`, `user_id`, `locked`) VALUES
(1, 'Contrôle de COO', '2014-12-23', 6, '00:00:00', '23:59:59', 1, 1, 1, 0),
(2, 'DS de BD 2', '2015-02-16', 2, '00:00:00', '23:59:59', 1, 2, 2, 0),
(3, 'Interrogation orale anglais', '0000-00-00', 3, '09:00:00', '00:00:00', NULL, NULL, 0, 0),
(4, 'Soutenance projet tutorÃ©', '0000-00-00', 2, '09:00:00', '10:00:00', 1, 2, 0, 0),
(5, 'test', '0000-00-00', 1, '00:00:00', '12:00:00', 1, 1, 2, 0),
(6, 'test2', '2015-02-20', 3, '00:00:00', '12:00:00', 1, 1, 2, 0),
(7, 'Test 3', '2015-02-20', 0, '01:00:00', '02:00:00', 1, 2, 2, 0),
(8, 'Test 4', '2015-02-20', 12, '01:00:00', '02:00:00', 1, 2, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `dept_id`) VALUES
(1, 'INFO2-FA', 1);

-- --------------------------------------------------------

--
-- Structure de la table `lessons`
--

CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `lesson_coefficient` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Contenu de la table `lessons`
--

INSERT INTO `lessons` (`id`, `lesson_name`, `user_id`, `group_id`, `lesson_coefficient`) VALUES
(1, 'Conception orientée objet avancée', 1, 1, 1),
(2, 'Bases de données avancées', 1, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mark` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Contenu de la table `marks`
--

INSERT INTO `marks` (`id`, `exam_id`, `user_id`, `mark`) VALUES
(1, 1, 2, 17),
(2, 2, 2, 14),
(3, 2, 2, 12);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET latin1 NOT NULL,
  `login` varchar(20) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(10) CHARACTER SET latin1 NOT NULL,
  `passwd` varchar(32) CHARACTER SET latin1 NOT NULL,
  `mail` varchar(55) CHARACTER SET latin1 NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `rank` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `phone`, `passwd`, `mail`, `dept_id`, `group_id`, `rank`) VALUES
(1, 'Administrateur', 'admin', '0123456789', '21232f297a57a5a743894a0e4a801fc3', 'admin@iut-velizy.fr', 1, NULL, 2),
(2, 'Paul DALLEMAGNE', '21301103', '0123456789', 'e55e3fc7a6cb06d4bf6b792314750752', 'blc@mail.fr', 1, 1, 0),
(3, 'Test AJOUT', 'Test AJOUT', '0123456789', '25f9e794323b453885f5181f1b624d0b', 'testajout@uvsq.fr', NULL, 1, 1),
(4, 'Maxime DUFOUR', '21301104', '', '827ccb0eea8a706c4c34a16891f84e7b', 'm.dufour@gmail.com', NULL, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
