-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 25 avr. 2024 à 17:44
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `carshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `creationDate`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2024-04-21 13:20:17');

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Audi'),
(2, 'Mercedes'),
(3, 'Ferrari'),
(4, 'BMW'),
(5, 'Honda'),
(6, 'Nissan'),
(7, 'Lamborghini'),
(8, 'Toyota'),
(9, 'Volkswagen');

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `oil` varchar(20) DEFAULT NULL,
  `kilometre` varchar(20) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `modele` varchar(50) DEFAULT NULL,
  `brand` varchar(10) DEFAULT NULL,
  `transition` varchar(100) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `engine` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `addingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `name`, `category`, `price`, `oil`, `kilometre`, `adresse`, `modele`, `brand`, `transition`, `year`, `image`, `color`, `engine`, `description`, `addingDate`) VALUES
(6, 'G-Class', 'Luxury Car', '111', 'Essence', '145', 'Tunis', 'MF-12E3', '5', 'Automatic', '2018', '1713624692car-13.jpg', 'Black', 'ZA321-E12D', '', '2024-04-20 14:51:32'),
(8, 'Marcedes AMG', 'Sports Car', '185.000', 'Diesel', '110.000', 'Sousse', 'AMG-12', '7', 'Automatic', '2018', '1713650643car-12.jpg', 'Black', 'ZA321-E12D', 'Hello', '2024-04-20 22:04:03');

-- --------------------------------------------------------

--
-- Structure de la table `enrolledCars`
--

CREATE TABLE `enrolledCars` (
  `id` int(11) NOT NULL,
  `cardID` varchar(50) DEFAULT NULL,
  `userId` varchar(50) DEFAULT NULL,
  `paymentID` varchar(255) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `shop`
--

INSERT INTO `shop` (`id`, `name`, `price`, `image`, `creationDate`) VALUES
(1, 'Brakes', '200', 'shop/shop-2.jpg', '2024-04-23 21:14:48'),
(2, 'Air Filter', '170', 'shop/shop-3.jpg', '2024-04-23 21:14:48'),
(3, 'Car Wheel', '250', 'shop/shop-4.jpg', '2024-04-23 21:14:48'),
(4, 'USB air Compressor', '550', 'shop/shop-1.jpg', '2024-04-23 21:14:48'),
(5, 'Best Plug', '45', 'shop/shop-5.jpg', '2024-04-23 21:14:48'),
(6, 'Hyundai Santa', '2500', 'shop/shop-6.jpg', '2024-04-23 21:14:48'),
(7, 'Car Looking Glasses', '120', 'shop/shop-7.jpg', '2024-04-23 21:14:48'),
(8, 'Car Rims', '65', 'shop/shop-8.jpg', '2024-04-23 21:14:48');

-- --------------------------------------------------------

--
-- Structure de la table `shopenrolled`
--

CREATE TABLE `shopenrolled` (
  `id` int(11) NOT NULL,
  `userID` varchar(255) DEFAULT NULL,
  `paiementID` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `shopenrolled`
--

INSERT INTO `shopenrolled` (`id`, `userID`, `paiementID`, `amount`) VALUES
(1, '6', 'maWnIySOT6eehqM0tBNrgg', '1107000'),
(2, '6', 'Zi1V1fZdQw6pGG0LXnAKmA', '597000'),
(3, '6', 'fe6ziIf5RlKBwAo78nKxew', '507000');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `creationDate`) VALUES
(12, 'Moemen Chihi', 'moemen@gmail.com', '96e79218965eb72c92a549dd5a330112', '2024-04-25 14:03:27'),
(13, 'Rommene', 'rom@gmail.com', '5f397a1e588cfe96b4aa4bab7a5b1d44', '2024-04-25 15:27:55'),
(14, 'Houssem Romdhani', 'houssem@gmail.com', '09aaa3d717d2bb9cbc0d0141b84ec228', '2024-04-25 15:28:51');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enrolledCars`
--
ALTER TABLE `enrolledCars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shopenrolled`
--
ALTER TABLE `shopenrolled`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `enrolledCars`
--
ALTER TABLE `enrolledCars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `shopenrolled`
--
ALTER TABLE `shopenrolled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
