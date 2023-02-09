-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 fév. 2023 à 01:10
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `taskboard`
--

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'todo',
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `status`, `description`, `created_at`, `deadline`) VALUES
(307, 1, 'doing', 'abderrahmane test 2', '2023-01-26 15:33:51', '2023-01-14'),
(308, 1, 'done', 'abderrahmane test 3', '2023-01-26 15:33:55', '2023-01-14'),
(309, 10, 'done', 'helloworld i&#39;m safia', '2023-01-26 15:35:23', '2023-01-27'),
(310, 10, 'todo', 'description of safia', '2023-01-26 15:36:10', '2023-01-28'),
(313, 11, 'todo', 'first', '2023-01-26 19:00:22', '2023-01-27'),
(316, 11, 'todo', 'daada', '2023-02-06 11:00:43', '2023-02-05'),
(317, 11, 'doing', 'firstDescription', '2023-02-06 11:22:44', '2023-02-25'),
(325, 1, 'todo', 'hellozrold', '2023-02-08 18:08:28', '2023-02-11'),
(326, 1, 'todo', 'Rhdhdhdh', '2023-02-08 18:08:28', '2023-02-10');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Abderrahman', 'abderrahmanehaouate@gmail.com', '$2y$10$2MxbJZvXJtlkDCMdCKKBJOxRdircqo1emNC8OV/9zqjYQ0pr2LkCC', '2023-01-24'),
(10, 'safia', 'safia@gmail.com', '$2y$10$Rp87r3mrzvA.wUxu6K0BEuGZaktFTfXQm/iX1A9qwNadFu1BPU7Iy', '2023-01-26'),
(11, 'salah', 'salah@gmail.com', '$2y$10$CHWRRT4FP0tnfB80GG578uGCJ5pP96jEbyIH6qDm24uAz2Tsh9vVy', '2023-01-26');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `R1` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
