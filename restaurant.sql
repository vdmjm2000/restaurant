-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 02 fév. 2023 à 13:48
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_time` int(11) NOT NULL,
  `date_booking` date DEFAULT NULL,
  `nbr_people` int(11) NOT NULL,
  `time_booking` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_user`, `id_time`, `date_booking`, `nbr_people`, `time_booking`) VALUES
(254, 19, 0, '2023-02-01', 3, '19:30:00'),
(255, 19, 0, '2023-02-01', 1, '19:45:00'),
(256, 19, 0, '2023-02-01', 2, '19:45:00'),
(257, 19, 0, '2023-02-01', 1, '21:00:00'),
(258, 19, 0, '2023-02-01', 2, '20:00:00'),
(259, 19, 0, '2023-02-01', 2, '21:00:00'),
(260, 19, 0, '2023-02-01', 2, '20:15:00'),
(261, 19, 0, '2023-02-01', 10, '20:00:00'),
(262, 19, 0, '2023-02-01', 2, '20:30:00'),
(263, 32, 0, '2023-02-02', 1, '19:30:00'),
(264, 19, 0, '2023-02-02', 1, '19:30:00'),
(265, 19, 0, '2023-02-14', 1, '21:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_recipe`
--

CREATE TABLE `categorie_recipe` (
  `id_categorie_recipe` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id_picture` int(11) NOT NULL,
  `picture` int(11) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `recipe`
--

CREATE TABLE `recipe` (
  `id_recipe` int(11) NOT NULL,
  `id_categorie_recipe` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recipe`
--

INSERT INTO `recipe` (`id_recipe`, `id_categorie_recipe`, `title`, `description`, `price`) VALUES
(19, 0, 'burger', 'ihlujhu', '5'),
(20, 0, 'pizza', 'fromages', '12'),
(21, 0, 'P&acirc;tes Carbonara', 'Des p&acirc;tes quoi', '15'),
(22, 0, 'coucous', 'Semoule et l&eacute;gumes', '20');

-- --------------------------------------------------------

--
-- Structure de la table `time_booked`
--

CREATE TABLE `time_booked` (
  `id_time` int(11) NOT NULL,
  `time_book` time NOT NULL,
  `capacity` int(11) NOT NULL,
  `date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `time_booked`
--

INSERT INTO `time_booked` (`id_time`, `time_book`, `capacity`, `date_time`) VALUES
(1, '20:00:00', 3, '2023-01-25'),
(3, '20:15:00', 3, '2023-01-25'),
(4, '20:30:00', 3, '2023-01-25'),
(5, '20:45:00', 3, '2023-01-25'),
(6, '21:00:00', 3, '2023-01-25'),
(7, '19:45:00', 3, '2023-01-25'),
(8, '19:30:00', 3, '2023-01-25');

-- --------------------------------------------------------

--
-- Structure de la table `time_table`
--

CREATE TABLE `time_table` (
  `id_timeTable` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `open_timelunch` time NOT NULL,
  `close_timelunch` time NOT NULL,
  `open_timeDinner` time NOT NULL,
  `close_timeDinner` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `time_table`
--

INSERT INTO `time_table` (`id_timeTable`, `day`, `open_timelunch`, `close_timelunch`, `open_timeDinner`, `close_timeDinner`) VALUES
(1, 'Lundi', '11:30:00', '14:00:00', '19:00:00', '23:00:00'),
(3, 'Mardi', '11:30:00', '14:00:00', '19:00:00', '23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `civilite` tinyint(1) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `cp` int(5) NOT NULL,
  `adresse` varchar(500) NOT NULL,
  `tel` text NOT NULL,
  `commentaire` varchar(500) NOT NULL,
  `pseudo` varchar(10) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `admin` int(11) NOT NULL,
  `id_booked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `civilite`, `nom`, `prenom`, `email`, `ville`, `cp`, `adresse`, `tel`, `commentaire`, `pseudo`, `mdp`, `admin`, `id_booked`) VALUES
(19, 0, 'van der Meeren', 'Jean-Michel', 'tata@gmail.com', 'Pignan', 34570, '5 Rue clement ader', '0620612351', 'sans sel, sans colorant, sans miel', 'pp', 'mm', 1, 0),
(32, 0, 'Tardieu', 'Pierre', 'pierre@hotmail.com', 'Florensac', 34510, '7 Rue de la r&eacute;publique', '0719602250', 'sans gluten, sans sucre', 'vdmjm', 'aa', 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id_picture`);

--
-- Index pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id_recipe`);

--
-- Index pour la table `time_booked`
--
ALTER TABLE `time_booked`
  ADD PRIMARY KEY (`id_time`);

--
-- Index pour la table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id_timeTable`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`nom`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id_picture` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id_recipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `time_booked`
--
ALTER TABLE `time_booked`
  MODIFY `id_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id_timeTable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
