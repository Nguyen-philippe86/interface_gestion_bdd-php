-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 12 jan. 2021 à 10:47
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stock_multimedia`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`) VALUES
(1, 'Alimentation'),
(2, 'Borne Wifi'),
(3, 'Cable'),
(4, 'Casque'),
(5, 'Imprimante'),
(6, 'Machine'),
(7, 'Périphériques'),
(8, 'Projection'),
(9, 'Protection'),
(10, 'Stockage'),
(11, 'Support'),
(12, 'Switch'),
(13, 'Téléphonie'),
(14, 'Utilitaire'),
(15, 'Visio');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `products_name` varchar(255) NOT NULL,
  `reference` varchar(25) NOT NULL,
  `price` varchar(25) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`products_id`, `products_name`, `reference`, `price`, `quantity`, `category_id`, `user_id`) VALUES
(1, 'Voltage Adapter 1000mA', '**', '**', 1, 1, 1),
(2, '45W AC Adapter', '**', '**', 0, 1, 1),
(3, 'Secteur Universelle', '**', '**', 1, 1, 1),
(4, 'ADH-150 AR B+ Alim', '**', '**', 3, 1, 1),
(5, 'Borne Intérieur', '**', '42,00€', 8, 2, 1),
(6, 'Borne Extérieur', '**', '32,00€', 3, 2, 1),
(7, 'Mini Display/HDMI', '**', '7,00€', 6, 3, 1),
(8, 'Mini Display/VGA', '2800220', '19,27€', 0, 3, 1),
(13, 'Mini Display/Display', '**', '**', 5, 3, 1),
(14, 'Mini Display/Ethernet', '7217788', '49,16€', 5, 3, 1),
(15, 'VGA/VGA', '**', '10,00€', 6, 3, 1),
(16, 'Alimentation', '**', '14,00€', 27, 3, 1),
(17, 'Jack RCA', '**', '14,00€', 4, 3, 1),
(18, 'Ethernet 5M Cat6', '**', '4,00€', 24, 3, 1),
(19, 'Ethernet 10M Cat6', '**', '8,00€', 19, 3, 1),
(20, 'Ethernet 1M Cat6', '**', '14,00€', 144, 3, 1),
(21, 'Ethernet 2M Cat6', '**', '10,00€', 96, 3, 1),
(22, 'Ethernet 0,5M Cat6', '**', '10,00€', 90, 3, 1),
(23, 'Ethernet 3M Cat6', '**', '15,00€', 9, 3, 1),
(24, 'HDMI 2m', '**', '**', 46, 3, 1),
(25, 'HDMI/Ethernet', '**', '**', 3, 3, 1),
(26, 'HDMI/VGA', '2809621', '**', 28, 3, 1),
(27, 'Rallonge USB 2.0 1.8m', '**', '**', 7, 3, 1),
(28, 'Display port', '**', '**', 26, 3, 1),
(29, 'VGA Adaptateur', '**', '**', 14, 3, 1),
(30, 'USB 2.0', '**', '**', 5, 3, 1),
(31, 'MINI Display/HDMI F', '**', '**', 2, 3, 1),
(32, 'USB 2.0 New', '**', '**', 4, 3, 1),
(33, 'USB-C', '**', '**', 2, 3, 1),
(34, 'USB/Ethernet', '7217788', '**', 5, 1, 1),
(35, 'Display M/HDMI M', '**', '**', 3, 3, 1),
(36, 'DIsplay/Display', '2874530', '**', 4, 3, 1),
(37, 'HDMI/MINI HDMI', '**', '**', 2, 3, 1),
(38, 'Display/VGA', '2561632', '**', 17, 3, 1),
(39, 'Display M/HDMI F', '**', '**', 1, 3, 1),
(40, 'USB-C/Display', '**', '**', 1, 3, 1),
(41, 'USB-C/DB-9', '**', '**', 6, 3, 1),
(42, 'USB 2.0/VGA', '**', '**', 3, 3, 1),
(43, 'Micro USB/HDMI', '**', '**', 2, 3, 1),
(44, 'USB/USB', '**', '**', 6, 3, 1),
(45, 'VGA/HDMI avec USB Power', '**', '**', 2, 3, 1),
(46, 'Rallonge USB 3.0', '**', '**', 3, 3, 1),
(47, 'USB-C/VGA', '**', '**', 2, 3, 1),
(48, 'Display 1.1', '**', '**', 6, 3, 1),
(49, 'Jack 3.5/RCA PC99', '**', '**', 13, 3, 1),
(50, 'MINI Display/VGA', '**', '**', 1, 3, 1),
(51, 'USB-C/VGA', '**', '**', 2, 3, 1),
(52, 'Rallonge Jack 3.5', '**', '**', 7, 3, 1),
(53, 'SATA', '**', '**', 7, 3, 1),
(54, 'Adaptateur réseau en USB', '**', '**', 4, 3, 1),
(55, 'CBL ASY, USB type A', '**', '**', 3, 3, 1),
(56, 'Connecteur Tours Display', '**', '**', 4, 3, 1),
(57, 'USB/USB-C Charge fast', '**', '**', 9, 3, 1),
(58, 'HDMI/HDMI 5m', '**', '**', 2, 3, 1),
(59, 'Savi 8220 x Plantronics', '**', '250,00€', 1, 4, 1),
(60, 'Jabra Eolve 65e', '7192569', '110,00€', 5, 4, 1),
(61, 'Encorepro 540 x Plantronics', '**', '100,00€', 2, 4, 1),
(62, 'Encorepro 520 x Plantronics', '**', '75,00€', 1, 4, 1),
(63, 'Casque Softphone (télétravail)', '**', '0,00€', 10, 4, 1),
(64, 'Rico P501', '**', '**', 2, 5, 1),
(65, 'HP 650 G5', '**', '**', 8, 6, 1),
(66, 'HP 650 G4', '**', '**', 0, 6, 1),
(67, 'HP 650 G1', '**', '**', 1, 6, 1),
(68, 'HP Elite Desk 800 G3', '**', '**', 1, 6, 1),
(69, 'HP Elite Desk 800 G4', '**', '**', 2, 6, 1),
(70, 'HP 830 G6', '**', '**', 0, 6, 1),
(71, 'HP 450 G5', '**', '**', 3, 6, 1),
(72, 'HP 450 G6', '**', '**', 2, 6, 1),
(73, 'HP 450 G7', '**', '**', 23, 6, 1),
(74, 'Lenovo V110', '**', '**', 6, 6, 1),
(75, 'Dell Latitude Hybride 5285', '**', '**', 1, 6, 1),
(76, 'Surface Pro 6', '**', '**', 3, 6, 1),
(77, 'Tablette Samsung', '**', '**', 30, 6, 1),
(78, 'Tablette Lenovo', '**', '**', 9, 1, 1),
(79, 'Classe Mobile (5-6-7)', '**', '**', 3, 6, 1),
(80, 'Tablette Electronique', '**', '**', 1, 6, 1),
(81, 'HP Elite Desk 800 G5 (mini)', '**', '**', 0, 6, 1),
(82, 'PC Portable (Prêt)', '**', '**', 0, 6, 1),
(83, 'Station d\'acceuil adm', '**', '**', 17, 7, 1),
(84, 'Souris Sans Fil', '**', '**', 9, 7, 1),
(85, 'HP USB-C Dock G5', '**', '**', 2, 7, 1),
(86, 'Clavier K1500 HP', '**', '**', 17, 7, 1),
(87, 'Clavier Surface Pro', '**', '**', 3, 7, 1),
(88, 'Surface Dock', '**', '**', 3, 7, 1),
(89, 'Souris Filaire', '**', '**', 109, 7, 1),
(90, 'Clavier + Souris sans fil Microsoft 850', '7009030', '**', 1, 7, 1),
(91, 'Station d\'accueil (prêt)', '**', '**', 4, 7, 1),
(92, 'Station d\'accueil miniature USB 3.0', '**', '**', 2, 7, 1),
(93, 'Ecran 27p (Iiyama)', '7127367', '19,00€', 0, 8, 1),
(94, 'Ecran 22p (Iiyama)', '7129599', '75,00€', 8, 8, 1),
(95, 'Ecran x V214a Monitor', '**', '93,00€', 12, 8, 1),
(96, 'Ecran occasion', '**', '**', 5, 8, 1),
(97, 'Projecteur EB-W39', '**', '**', 3, 8, 1),
(98, 'HP P21b G4 FHD Monitor', '**', '**', 21, 8, 1),
(99, 'Housse Tablette', '**', '**', 2, 9, 1),
(100, 'Coque Tablette Lenovo', '**', '**', 50, 9, 1),
(101, 'Film Ecran Surface 3', '**', '**', 4, 9, 1),
(102, 'Sacoche HP', '**', '**', 18, 9, 1),
(103, 'Sacoche', '**', '**', 20, 9, 1),
(104, 'BacPack Black (Sac)', '**', '**', 1, 9, 1),
(105, 'Coque Tablette Samsung', '**', '**', 30, 9, 1),
(106, '2 TB', '**', '80,00€', 2, 10, 1),
(107, 'SSD 240GB x Kingston', '**', '50,00€', 5, 10, 1),
(108, 'SSD 250GB x Kingston', '**', '50,00€', 2, 10, 1),
(109, 'SSD 120GB PNY', '**', '30,00€', 2, 10, 1),
(110, 'Network Drive 250GB', '**', '**', 1, 10, 1),
(111, 'SSD 480GB Integral EXT', '**', '**', 0, 10, 1),
(112, 'SSD 256GB HP', '**', '**', 0, 10, 1),
(113, 'Clé USB 16GB Kingston', '**', '**', 10, 10, 1),
(114, 'Bras 1 écran ', '2591904', '51,97€', 2, 11, 1),
(115, 'Bras 2 écran', '2592811', '80,75€', 5, 11, 1),
(116, 'Bras 3 écrans', '7142918', '300,00€', 1, 11, 1),
(117, 'Support Tablette', '**', '**', 1, 11, 1),
(118, '24P 2960 x Cisco', '**', '1510,00€', 1, 12, 1),
(119, '8P 2960 x Cisco', '**', '564,00€', 1, 12, 1),
(120, '24P 2510 x HP', '**', '80,00€', 2, 11, 1),
(121, '24P 2530 x HP', '**', '59,00€', 6, 12, 1),
(122, '8P 2530 x HP', '2769537', '228,00€', 1, 12, 1),
(123, '24P 2510G x HP', '**', '50,00€', 1, 12, 1),
(124, '48P 2510 x HP', '**', '59,00€', 2, 12, 1),
(125, '24P 1810G x HP', '**', '18,00€', 7, 12, 1),
(126, '48P 2530 x HP', '**', '26,00€', 2, 12, 1),
(127, '16P C1000 x Cisco', '**', '**', 3, 12, 1),
(128, '?P C9200L x Cisco', '**', '**', 8, 12, 1),
(129, '24P POE 2530 HP', '**', '**', 4, 12, 1),
(130, '8P POE 2530 x HP', '**', '**', 5, 12, 1),
(131, '7841 x Cisco', '**', '16,00€', 1, 13, 1),
(132, '8811 x Cisco', '**', '19,00€', 2, 13, 1),
(133, 'HDMI Matrix', '**', '**', 2, 14, 1),
(134, 'Video Matrix Switch', '**', '**', 8, 14, 1),
(135, 'Recharge DYMO', '**', '**', 6, 14, 1),
(136, 'Douchette', '**', '**', 4, 14, 1),
(137, 'Charge pour douchette', '**', '**', 4, 14, 1),
(138, 'Anti-Vol', '**', '**', 13, 14, 1),
(139, 'P 501H encre noire x Ricoh', '**', '**', 2, 14, 1),
(140, 'Bandeaux Multiprises (baie)', '**', '**', 4, 14, 1),
(141, 'Spare Batterie Term Logntrack', '**', '**', 1, 14, 1),
(142, 'Ultra Thin DVD Writer', '**', '**', 1, 14, 1),
(143, 'Slim Portable DVD Writer', '**', '**', 10, 14, 1),
(144, 'HP LCD Speaker Bar', '**', '**', 18, 14, 1),
(145, 'USB Download Module', '**', '**', 2, 14, 1),
(146, 'USB Motion Sensor', '**', '**', 1, 14, 1),
(147, 'Baie 19P', '**', '**', 3, 14, 1),
(148, 'Petite Baie', '**', '**', 1, 14, 1),
(149, 'Housse Tablette', '**', '**', 40, 14, 1),
(150, 'Sangle Tablette', '**', '**', 40, 14, 1),
(151, 'Support Tablette', '**', '**', 9, 14, 1),
(152, 'Stylet x Surface', '**', '**', 11, 14, 1),
(153, 'Jabra PanaCast MS', '7200997', '700,00€', 1, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Philippe', '$2y$10$kT5orsEgvKqhJvX2OWPnh.BYRjBr5mbWrwL7OY3l1U6U84g7HhR0W');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `category_id` (`category_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`categories_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
