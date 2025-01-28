-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 28 jan. 2025 à 12:42
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Cookooning`
--

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `recette_id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `quantite` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id`, `recette_id`, `nom`, `quantite`, `created_at`) VALUES
(169, 41, 'Pommes', '5', '2025-01-23 11:27:33'),
(170, 41, 'Pâte brisée', '1 rouleau', '2025-01-23 11:27:33'),
(171, 41, 'Sucre', '50g', '2025-01-23 11:27:33'),
(172, 41, 'Cannelle', '1 cuillère à café', '2025-01-23 11:27:33'),
(173, 42, 'Lardons', '200g', '2025-01-23 11:27:33'),
(174, 42, 'Crème fraîche', '200ml', '2025-01-23 11:27:33'),
(175, 42, 'Œufs', '3', '2025-01-23 11:27:33'),
(176, 42, 'Pâte feuilletée', '1 rouleau', '2025-01-23 11:27:33'),
(177, 42, 'Gruyère râpé', '100g', '2025-01-23 11:27:33'),
(178, 43, 'Laitue', '1', '2025-01-23 11:27:33'),
(179, 43, 'Poulet', '200g', '2025-01-23 11:27:33'),
(180, 43, 'Croûtons', '100g', '2025-01-23 11:27:33'),
(181, 43, 'Parmesan', '50g', '2025-01-23 11:27:33'),
(182, 43, 'Sauce César', '50ml', '2025-01-23 11:27:33'),
(183, 44, 'Poulet', '400g', '2025-01-23 11:27:33'),
(184, 44, 'Curry en poudre', '2 cuillères à soupe', '2025-01-23 11:27:33'),
(185, 44, 'Lait de coco', '200ml', '2025-01-23 11:27:33'),
(186, 44, 'Oignons', '1', '2025-01-23 11:27:33'),
(187, 48, 'Spaghetti', '500g', '2025-01-23 11:27:33'),
(188, 48, 'Viande hachée', '300g', '2025-01-23 11:27:33'),
(189, 48, 'Tomates', '4', '2025-01-23 11:27:33'),
(190, 48, 'Ail', '2 gousses', '2025-01-23 11:27:33'),
(191, 49, 'Feuilles de lasagnes', '12', '2025-01-23 11:27:33'),
(192, 49, 'Courgettes', '2', '2025-01-23 11:27:33'),
(193, 49, 'Aubergines', '1', '2025-01-23 11:27:33'),
(194, 49, 'Fromage râpé', '150g', '2025-01-23 11:27:33'),
(195, 50, 'Oignons', '4', '2025-01-23 11:27:33'),
(196, 50, 'Bouillon de bœuf', '500ml', '2025-01-23 11:27:33'),
(197, 50, 'Pain', '4 tranches', '2025-01-23 11:27:33'),
(198, 50, 'Gruyère râpé', '100g', '2025-01-23 11:27:33'),
(199, 51, 'Tomates', '4', '2025-01-23 11:27:33'),
(200, 51, 'Courgettes', '2', '2025-01-23 11:27:33'),
(201, 51, 'Aubergines', '1', '2025-01-23 11:27:33'),
(202, 51, 'Poivrons', '2', '2025-01-23 11:27:33'),
(203, 52, 'Chocolat noir', '200g', '2025-01-23 11:27:33'),
(204, 52, 'Beurre', '100g', '2025-01-23 11:27:33'),
(205, 52, 'Farine', '100g', '2025-01-23 11:27:33'),
(206, 52, 'Œufs', '2', '2025-01-23 11:27:33'),
(207, 53, 'Farine', '250g', '2025-01-23 11:27:33'),
(208, 53, 'Œufs', '2', '2025-01-23 11:27:33'),
(209, 53, 'Lait', '500ml', '2025-01-23 11:27:33'),
(210, 53, 'Sucre', '50g', '2025-01-23 11:27:33'),
(211, 54, 'Farine', '150g', '2025-01-23 11:28:29'),
(212, 54, 'Chocolat noir', '200g', '2025-01-23 11:28:29'),
(213, 54, 'Beurre', '100g', '2025-01-23 11:28:29'),
(214, 54, 'Sucre', '100g', '2025-01-23 11:28:29'),
(215, 54, 'Œufs', '3', '2025-01-23 11:28:29'),
(216, 55, 'Riz basmati', '300g', '2025-01-23 11:28:29'),
(217, 55, 'Oignon', '1', '2025-01-23 11:28:29'),
(218, 55, 'Bouillon de légumes', '500ml', '2025-01-23 11:28:29'),
(219, 55, 'Beurre', '30g', '2025-01-23 11:28:29'),
(220, 55, 'Épices', '1 cuillère à soupe', '2025-01-23 11:28:29'),
(221, 56, 'Pommes de terre', '2', '2025-01-23 11:28:29'),
(222, 56, 'Carottes', '2', '2025-01-23 11:28:29'),
(223, 56, 'Pois chiches', '150g', '2025-01-23 11:28:29'),
(224, 56, 'Lait de coco', '200ml', '2025-01-23 11:28:29'),
(225, 56, 'Curry en poudre', '1 cuillère à soupe', '2025-01-23 11:28:29'),
(226, 57, 'Farine', '200g', '2025-01-23 11:28:29'),
(227, 57, 'Lait', '300ml', '2025-01-23 11:28:29'),
(228, 57, 'Œufs', '2', '2025-01-23 11:28:29'),
(229, 57, 'Levure chimique', '1 cuillère à café', '2025-01-23 11:28:29'),
(230, 57, 'Sucre', '30g', '2025-01-23 11:28:29'),
(231, 58, 'Pommes de terre', '1kg', '2025-01-23 11:28:29'),
(232, 58, 'Crème fraîche', '300ml', '2025-01-23 11:28:29'),
(233, 58, 'Lait', '200ml', '2025-01-23 11:28:29'),
(234, 58, 'Ail', '2 gousses', '2025-01-23 11:28:29'),
(235, 58, 'Fromage râpé', '100g', '2025-01-23 11:28:29'),
(236, 59, 'Mascarpone', '250g', '2025-01-23 11:28:29'),
(237, 59, 'Café', '200ml', '2025-01-23 11:28:29'),
(238, 59, 'Biscuits à la cuillère', '150g', '2025-01-23 11:28:29'),
(239, 59, 'Cacao en poudre', '1 cuillère à soupe', '2025-01-23 11:28:29'),
(240, 59, 'Œufs', '3', '2025-01-23 11:28:29'),
(241, 60, 'Pâte à pizza', '1', '2025-01-23 11:28:29'),
(242, 60, 'Tomates', '3', '2025-01-23 11:28:29'),
(243, 60, 'Mozzarella', '200g', '2025-01-23 11:28:29'),
(244, 60, 'Basilic frais', 'Quelques feuilles', '2025-01-23 11:28:29'),
(245, 60, 'Huile d\'olive', '2 cuillères à soupe', '2025-01-23 11:28:29'),
(246, 61, 'Œufs', '4', '2025-01-23 11:28:29'),
(247, 61, 'Champignons', '200g', '2025-01-23 11:28:29'),
(248, 61, 'Lait', '50ml', '2025-01-23 11:28:29'),
(249, 61, 'Beurre', '20g', '2025-01-23 11:28:29'),
(250, 61, 'Sel et poivre', 'Au goût', '2025-01-23 11:28:29'),
(251, 62, 'Farine', '200g', '2025-01-23 11:28:29'),
(252, 62, 'Sucre', '100g', '2025-01-23 11:28:29'),
(253, 62, 'Myrtilles', '150g', '2025-01-23 11:28:29'),
(254, 62, 'Lait', '150ml', '2025-01-23 11:28:29'),
(255, 62, 'Beurre fondu', '50g', '2025-01-23 11:28:29'),
(256, 63, 'Pâtes', '300g', '2025-01-23 11:28:29'),
(257, 63, 'Pesto', '150g', '2025-01-23 11:28:29'),
(258, 63, 'Parmesan râpé', '50g', '2025-01-23 11:28:29'),
(259, 63, 'Huile d\'olive', '2 cuillères à soupe', '2025-01-23 11:28:29'),
(260, 63, 'Basilic frais', 'Quelques feuilles', '2025-01-23 11:28:29'),
(261, 64, 'Riz rond', '200g', '2025-01-23 11:29:10'),
(262, 64, 'Lait entier', '1L', '2025-01-23 11:29:10'),
(263, 64, 'Sucre', '100g', '2025-01-23 11:29:10'),
(264, 64, 'Vanille', '1 gousse', '2025-01-23 11:29:10'),
(265, 64, 'Cannelle', '1 pincée', '2025-01-23 11:29:10'),
(266, 65, 'Fromage râpé', '150g', '2025-01-23 11:29:10'),
(267, 65, 'Beurre', '50g', '2025-01-23 11:29:10'),
(268, 65, 'Farine', '50g', '2025-01-23 11:29:10'),
(269, 65, 'Lait', '500ml', '2025-01-23 11:29:10'),
(270, 65, 'Œufs', '4', '2025-01-23 11:29:10'),
(271, 65, 'Sel et poivre', 'Au goût', '2025-01-23 11:29:10'),
(272, 101, 'jarret de boeuf', '1,5kg', '2025-01-24 15:03:21'),
(273, 102, 'zdf', 'zd', '2025-01-25 09:45:06'),
(274, 103, 'confiture de fraise', '500gr', '2025-01-26 09:41:49'),
(275, 104, 'confiture de fraise', '500gr', '2025-01-26 09:46:50'),
(278, 107, 'pommle', '5', '2025-01-28 11:42:26');

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text,
  `preparation` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id`, `utilisateur_id`, `titre`, `description`, `preparation`, `image`, `created_at`) VALUES
(41, 1, 'Tarte aux pommes', 'Une tarte délicieuse avec des pommes fraîches.', '1. Épluchez les pommes, coupez-les en fines tranches. 2. Étalez la pâte dans un moule. 3. Disposez les pommes et saupoudrez de sucre et de cannelle. 4. Faites cuire au four à 180°C pendant 30 minutes.', 'images/image_recette/apple-pie-5479993_640.jpg', '2025-01-23 11:22:06'),
(42, 1, 'Quiche lorraine', 'Une quiche savoureuse avec du lard et du fromage.', '1. Préchauffez le four à 180°C. 2. Étalez la pâte dans un moule et piquez-la avec une fourchette. 3. Mélangez les œufs, la crème, les lardons et le gruyère. 4. Versez le mélange sur la pâte et enfournez 25 minutes.', 'images/image_recette/tart-2409958_640.jpg', '2025-01-23 11:22:06'),
(43, 1, 'Salade César', 'Une salade classique avec du poulet et des croûtons.', '1. Lavez la laitue et coupez-la en morceaux. 2. Faites griller le poulet et coupez-le en dés. 3. Mélangez la laitue, le poulet, les croûtons et le parmesan. 4. Ajoutez la sauce César et servez frais.', 'images/image_recette/salad-2629262_640.jpg', '2025-01-23 11:22:06'),
(44, 1, 'Poulet curry', 'Un plat épicé au poulet avec une sauce au curry.', NULL, 'images/image_recette/curry-7249247_640.jpg', '2025-01-23 11:22:06'),
(45, 1, 'Spaghetti bolognaise', 'Des pâtes avec une sauce bolognaise maison.', NULL, 'images/image_recette/spaghetti-bolognese-4546233_640.jpg', '2025-01-23 11:22:06'),
(46, 1, 'Lasagnes végétariennes', 'Des lasagnes savoureuses aux légumes.', NULL, 'images/image_recette/lasagna-1900529_640.jpg', '2025-01-23 11:22:06'),
(47, 1, 'Soupe à l’oignon', 'Une soupe traditionnelle française avec du gruyère.', NULL, 'soupe_oignon.jpg', '2025-01-23 11:22:06'),
(48, 1, 'Ratatouille', 'Un plat classique aux légumes méditerranéens.', NULL, 'ratatouille.jpg', '2025-01-23 11:22:06'),
(49, 1, 'Brownies', 'Un dessert chocolaté et moelleux.', NULL, 'brownies.jpg', '2025-01-23 11:22:06'),
(50, 1, 'Crêpes sucrées', 'Des crêpes légères et savoureuses.', NULL, 'crepes_sucrees.jpg', '2025-01-23 11:22:06'),
(51, 1, 'Gâteau au chocolat', 'Un gâteau fondant au chocolat noir.', NULL, 'gateau_chocolat.jpg', '2025-01-23 11:22:06'),
(52, 1, 'Riz pilaf', 'Un riz délicatement parfumé avec des épices.', NULL, 'riz_pilaf.jpg', '2025-01-23 11:22:06'),
(53, 1, 'Curry de légumes', 'Un curry épicé avec des légumes de saison.', NULL, 'curry_legumes.jpg', '2025-01-23 11:22:06'),
(54, 1, 'Pancakes', 'Des pancakes légers et moelleux.', NULL, 'pancakes.jpg', '2025-01-23 11:22:06'),
(55, 1, 'Gratin dauphinois', 'Un gratin crémeux aux pommes de terre.', NULL, 'gratin_dauphinois.jpg', '2025-01-23 11:22:06'),
(56, 1, 'Tiramisu', 'Un dessert italien avec du mascarpone et du café.', NULL, 'tiramisu.jpg', '2025-01-23 11:22:06'),
(57, 1, 'Pizza margherita', 'Une pizza classique à la tomate et au basilic.', NULL, 'pizza_margherita.jpg', '2025-01-23 11:22:06'),
(58, 1, 'Omelette aux champignons', 'Une omelette simple et savoureuse.', NULL, 'omelette_champignons.jpg', '2025-01-23 11:22:06'),
(59, 1, 'Muffins aux myrtilles', 'Des muffins moelleux aux myrtilles.', NULL, 'muffins_myrtilles.jpg', '2025-01-23 11:22:06'),
(60, 1, 'Pâtes au pesto', 'Des pâtes fraîches avec du pesto maison.', NULL, 'pates_pesto.jpg', '2025-01-23 11:22:06'),
(61, 1, 'Tarte aux pommes', 'Une tarte délicieuse avec des pommes fraîches.', NULL, 'tarte_pommes.jpg', '2025-01-23 11:23:04'),
(62, 1, 'Quiche lorraine', 'Une quiche savoureuse avec du lard et du fromage.', NULL, 'quiche_lorraine.jpg', '2025-01-23 11:23:04'),
(63, 1, 'Salade César', 'Une salade classique avec du poulet et des croûtons.', NULL, 'salade_cesar.jpg', '2025-01-23 11:23:04'),
(64, 1, 'Poulet curry', 'Un plat épicé au poulet avec une sauce au curry.', NULL, 'poulet_curry.jpg', '2025-01-23 11:23:04'),
(65, 1, 'Spaghetti bolognaise', 'Des pâtes avec une sauce bolognaise maison.', NULL, 'spaghetti_bolognaise.jpg', '2025-01-23 11:23:04'),
(66, 1, 'Lasagnes végétariennes', 'Des lasagnes savoureuses aux légumes.', NULL, 'lasagnes_vegetariennes.jpg', '2025-01-23 11:23:04'),
(67, 1, 'Soupe à l’oignon', 'Une soupe traditionnelle française avec du gruyère.', NULL, 'soupe_oignon.jpg', '2025-01-23 11:23:04'),
(68, 1, 'Ratatouille', 'Un plat classique aux légumes méditerranéens.', NULL, 'ratatouille.jpg', '2025-01-23 11:23:04'),
(69, 1, 'Brownies', 'Un dessert chocolaté et moelleux.', NULL, 'brownies.jpg', '2025-01-23 11:23:04'),
(70, 1, 'Crêpes sucrées', 'Des crêpes légères et savoureuses.', NULL, 'crepes_sucrees.jpg', '2025-01-23 11:23:04'),
(71, 1, 'Gâteau au chocolat', 'Un gâteau fondant au chocolat noir.', NULL, 'gateau_chocolat.jpg', '2025-01-23 11:23:04'),
(72, 1, 'Riz pilaf', 'Un riz délicatement parfumé avec des épices.', NULL, 'riz_pilaf.jpg', '2025-01-23 11:23:04'),
(73, 1, 'Curry de légumes', 'Un curry épicé avec des légumes de saison.', NULL, 'curry_legumes.jpg', '2025-01-23 11:23:04'),
(74, 1, 'Pancakes', 'Des pancakes légers et moelleux.', NULL, 'pancakes.jpg', '2025-01-23 11:23:04'),
(75, 1, 'Gratin dauphinois', 'Un gratin crémeux aux pommes de terre.', NULL, 'gratin_dauphinois.jpg', '2025-01-23 11:23:04'),
(76, 1, 'Tiramisu', 'Un dessert italien avec du mascarpone et du café.', NULL, 'tiramisu.jpg', '2025-01-23 11:23:04'),
(77, 1, 'Pizza margherita', 'Une pizza classique à la tomate et au basilic.', NULL, 'pizza_margherita.jpg', '2025-01-23 11:23:04'),
(78, 1, 'Omelette aux champignons', 'Une omelette simple et savoureuse.', NULL, 'omelette_champignons.jpg', '2025-01-23 11:23:04'),
(79, 1, 'Muffins aux myrtilles', 'Des muffins moelleux aux myrtilles.', NULL, 'muffins_myrtilles.jpg', '2025-01-23 11:23:04'),
(80, 1, 'Pâtes au pesto', 'Des pâtes fraîches avec du pesto maison.', NULL, 'pates_pesto.jpg', '2025-01-23 11:23:04'),
(81, 1, 'Tarte aux pommes', 'Une tarte délicieuse avec des pommes fraîches.', NULL, 'tarte_pommes.jpg', '2025-01-23 11:24:05'),
(82, 1, 'Quiche lorraine', 'Une quiche savoureuse avec du lard et du fromage.', NULL, 'quiche_lorraine.jpg', '2025-01-23 11:24:05'),
(83, 1, 'Salade César', 'Une salade classique avec du poulet et des croûtons.', NULL, 'salade_cesar.jpg', '2025-01-23 11:24:05'),
(84, 1, 'Poulet curry', 'Un plat épicé au poulet avec une sauce au curry.', NULL, 'poulet_curry.jpg', '2025-01-23 11:24:05'),
(85, 1, 'Spaghetti bolognaise', 'Des pâtes avec une sauce bolognaise maison.', NULL, 'spaghetti_bolognaise.jpg', '2025-01-23 11:24:05'),
(86, 1, 'Lasagnes végétariennes', 'Des lasagnes savoureuses aux légumes.', NULL, 'lasagnes_vegetariennes.jpg', '2025-01-23 11:24:05'),
(87, 1, 'Soupe à l’oignon', 'Une soupe traditionnelle française avec du gruyère.', NULL, 'soupe_oignon.jpg', '2025-01-23 11:24:05'),
(88, 1, 'Ratatouille', 'Un plat classique aux légumes méditerranéens.', NULL, 'ratatouille.jpg', '2025-01-23 11:24:05'),
(89, 1, 'Brownies', 'Un dessert chocolaté et moelleux.', NULL, 'brownies.jpg', '2025-01-23 11:24:05'),
(90, 1, 'Crêpes sucrées', 'Des crêpes légères et savoureuses.', NULL, 'crepes_sucrees.jpg', '2025-01-23 11:24:05'),
(91, 1, 'Gâteau au chocolat', 'Un gâteau fondant au chocolat noir.', NULL, 'gateau_chocolat.jpg', '2025-01-23 11:24:05'),
(92, 1, 'Riz pilaf', 'Un riz délicatement parfumé avec des épices.', NULL, 'riz_pilaf.jpg', '2025-01-23 11:24:05'),
(93, 1, 'Curry de légumes', 'Un curry épicé avec des légumes de saison.', NULL, 'curry_legumes.jpg', '2025-01-23 11:24:05'),
(94, 1, 'Pancakes', 'Des pancakes légers et moelleux.', NULL, 'pancakes.jpg', '2025-01-23 11:24:05'),
(95, 1, 'Gratin dauphinois', 'Un gratin crémeux aux pommes de terre.', NULL, 'gratin_dauphinois.jpg', '2025-01-23 11:24:05'),
(96, 1, 'Tiramisu', 'Un dessert italien avec du mascarpone et du café.', NULL, 'tiramisu.jpg', '2025-01-23 11:24:05'),
(97, 1, 'Pizza margherita', 'Une pizza classique à la tomate et au basilic.', NULL, 'pizza_margherita.jpg', '2025-01-23 11:24:05'),
(98, 1, 'Omelette aux champignons', 'Une omelette simple et savoureuse.', NULL, 'omelette_champignons.jpg', '2025-01-23 11:24:05'),
(99, 1, 'Muffins aux myrtilles', 'Des muffins moelleux aux myrtilles.', NULL, 'muffins_myrtilles.jpg', '2025-01-23 11:24:05'),
(100, 1, 'Pâtes au pesto', 'Des pâtes fraîches avec du pesto maison.', NULL, 'pates_pesto.jpg', '2025-01-23 11:24:05'),
(101, 1, 'tajine au pruneaux', 'Tajine plein d&#039;amour', 'A préparer avec amour', 'images/image_recette/lamb-4506612_640.jpg', '2025-01-24 15:03:21'),
(102, 1, 'aa', 'sad', 'ad', 'images/image_recette/tart-2409958_640.jpg', '2025-01-25 09:45:06'),
(103, 4, 'Confiture de fraise', 'Confiture de pêche ', 'faite de la confiture', 'images/image_recette/apple-pie-5479993_640.jpg', '2025-01-26 09:41:49'),
(104, 4, 'Confiture de fraise', 'Confiture de pêche ', 'faite de la confiture', 'images/image_recette/apple-pie-5479993_640.jpg', '2025-01-26 09:46:50'),
(107, 7, 'Tarte a la pomme', 'Une tarte pleine d&#039;amour et de joie', 'comme vous le sentez', 'images/image_recette/apple-pie-5479993_640.jpg', '2025-01-28 11:42:26');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` enum('admin','utilisateur') NOT NULL DEFAULT 'utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `email`, `password`, `created_at`, `role`) VALUES
(1, 'Admin', 'admin@example.com', 'password123', '2025-01-23 11:22:06', 'utilisateur'),
(4, 'User', 'user@example.com', '$2y$10$499BOop51PgpBLaCFLBGEuwwGjcRq7cOwrpNVKJ5Hm4KVwTQ.FR4i', '2025-01-25 10:30:25', 'admin'),
(5, 'User2', 'user2@example.com', '$2y$10$r/pX6DXcMszKMlqXVvBxqObJBkWJ8Gxs5nrlwBFZCJt8xu8hCV1kS', '2025-01-25 10:33:03', 'utilisateur'),
(6, 'user3', 'user3@example.com', '$2y$10$hmF.Z3eKW./LwBdwA9sX4eYPi6MkHtoXgSA.GRGZpcGjTezCNZ7RW', '2025-01-25 10:34:55', 'utilisateur'),
(7, 'Mona', 'mano@example.com', '$2y$10$y4rkcZibVENiL5CfoLqm0efv4HpnlBReTuN/1Ku1s.IbbMxSnJtQC', '2025-01-27 10:12:48', 'utilisateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recette_id` (`recette_id`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`recette_id`) REFERENCES `recettes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `recettes_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
