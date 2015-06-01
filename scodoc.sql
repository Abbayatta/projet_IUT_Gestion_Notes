-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 01 Juin 2015 à 14:27
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Contenu de la table `exams`
--

INSERT INTO `exams` (`id`, `title`, `date`, `exam_coefficient`, `begins`, `ends`, `group_id`, `lesson_id`, `user_id`, `locked`) VALUES
(3, 'Interrogation orale anglais', '0000-00-00', 3, '09:00:00', '00:00:00', 1, 4, 1, 0),
(4, 'Soutenance projet tutorÃ©', '0000-00-00', 2, '09:00:00', '10:00:00', 1, 3, 0, 0);

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
  `teachingunit_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `lesson_coefficient` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Contenu de la table `lessons`
--

INSERT INTO `lessons` (`id`, `lesson_name`, `user_id`, `teachingunit_id`, `group_id`, `lesson_coefficient`) VALUES
(3, 'Projet TutorÃ©', 5, 0, 1, 4),
(4, 'Anglais', 1, 0, 1, 1);

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
(1, 3, 2, 17),
(2, 4, 2, 14),
(3, 4, 2, 12);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(150) NOT NULL,
  `body` varchar(5000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recipient_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `subject`, `body`, `date`, `recipient_id`, `sender_id`) VALUES
(1, 'Test', 'Test de message', '2015-06-01 12:27:04', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `teachingunit`
--

CREATE TABLE IF NOT EXISTS `teachingunit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `description` varchar(400) NOT NULL,
  `dept_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `teachingunit`
--

INSERT INTO `teachingunit` (`id`, `name`, `description`, `dept_id`) VALUES
(1, '11', 'Informatique', 1),
(3, '12', 'Connaissances et compÃ©tences gÃ©nÃ©rales', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `phone`, `passwd`, `mail`, `dept_id`, `group_id`, `rank`) VALUES
(1, 'Administrateur', 'admin', '0123456789', '21232f297a57a5a743894a0e4a801fc3', 'admin@iut-velizy.fr', 1, NULL, 2),
(2, 'Paul DALLEMAGNE', '21301103', '0123456789', 'e55e3fc7a6cb06d4bf6b792314750752', 'blc@mail.fr', 1, 1, 0),
(3, 'Test AJOUT', 'Test AJOUT', '0123456789', '25f9e794323b453885f5181f1b624d0b', 'testajout@uvsq.fr', NULL, 1, 1),
(4, 'Maxime DUFOUR', '21301104', '', '827ccb0eea8a706c4c34a16891f84e7b', 'm.dufour@gmail.com', NULL, 1, 0),
(5, 'Fabrice HOGUIN', 'Fabrice HOGUIN', '', 'd47de916cacd0b7bb6879a4013d8b7d7', 'hoguin@uvsq.fr', NULL, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
