-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 31 mars 2025 à 17:06
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `exo`
--

-- --------------------------------------------------------

--
-- Structure de la table `exoauthent`
--

CREATE TABLE `exoauthent` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `exoauthent`
--

INSERT INTO `exoauthent` (`id`, `login`, `password`, `email`) VALUES
(25, 'zinsou', 0, 'juvenalzinsou7@gmai.com'),
(27, 'nadji', 9, 'nadji@gmail.com'),
(28, 'jeff', 2829, 'nadji@gmail.com'),
(29, 'NICAISE', 733, 'nicaise2@gmail.com'),
(30, 'deen', 0, 'momocm@gamil.com');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `detail` varchar(300) NOT NULL,
  `catégorie` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `prix` varchar(50) NOT NULL,
  `remise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `detail`, `catégorie`, `photo`, `prix`, `remise`) VALUES
(1, 'Mangues', 'La mangue, reine des fruits tropicaux, est une source exquise de vitamines A et C, essentielles pour la santé de la peau, la vision et le système immunitaire. Sa richesse en fibres favorise une digestion saine et regule le taux de cholestérol. ', 'Fruits', 'Images/mangue.jpg', '1200', 20),
(2, 'Ananas', 'L\'ananas, avec sa saveur acidulée et sucrée, est une excellente source de vitamine C et de manganèse, un minéral essentiel pour la santé des os et le métabolisme. La bromélaïne, une enzyme présente dans l\'ananas, possède des propriétés anti-inflammatoires et digestives.', 'Fruits', 'Images/ananas.jpg', '1500', 0),
(3, 'Papaye', 'La papaye, avec sa chair douce et orangée, est une source riche en vitamines A, C et E, ainsi qu\'en fibres et en enzymes digestives. La papaïne, une enzyme unique de la papaye, facilite la digestion des protéines et soulage les troubles digestifs.', 'Fruits', 'Images/papaye.jpg', '1960', 30),
(4, 'Fruit de la Passion', 'Le fruit de la passion, avec sa saveur acidulée et exotique, est une excellente source de vitamines A et C, de fibres et d\'antioxydants. Ses fibres solubles favorisent la régularité intestinale et régulent le taux de cholestérol.', 'Fruits', 'Images/passion.jpg', '7000', 0),
(5, 'Goyave', 'La goyave, avec sa chair rose ou blanche et sa saveur sucrée et acidulée, est une source exceptionnelle de vitamine C, de fibres et d\'antioxydants. Elle contient plus de vitamine C que les agrumes, ce qui en fait un excellent allié pour le système immunitaire. ', 'Fruits', 'Images/goyave.jpg', '2000', 0),
(6, 'Banane', 'La banane, fruit populaire et nutritif, est une excellente source de potassium, de fibres et de vitamines B6 et C. Le potassium est essentiel pour la santé cardiaque et la régulation de la pression artérielle. Les fibres de la banane favorisent la régularité intestinale et la satiété. ', 'Fruits', 'Images/banane.jpg', '950', 0),
(7, 'Orange', 'L\'orange, agrume juteux et rafraîchissant, est une source exceptionnelle de vitamine C, un antioxydant puissant qui renforce le système immunitaire et protège les cellules contre les dommages. Elle est également riche en fibres, favorisant la régularité intestinale et la satiété.', 'Fruits', 'Images/orange.jpg', '900', 10),
(8, 'Citron', 'Le citron, agrume acidulé et rafraîchissant, est une excellente source de vitamine C, un antioxydant puissant qui renforce le système immunitaire et protège les cellules contre les dommages. Il est également riche en flavonoïdes, tels que la diosmine et l\'hespéridine, qui possèdent des propriétés ', 'Fruits', 'Images/citron.jpg', '700', 0),
(9, 'Pamplemousse', 'Le pamplemousse, agrume juteux et légèrement amer, est une source riche en vitamine C, en fibres et en antioxydants. Il contient également du lycopène, un antioxydant puissant qui protège les cellules contre les dommages causés par les radicaux libres.', 'Fruits', 'Images/pamp.jpg', '2640', 45),
(10, 'Mandarine', 'La mandarine, agrume sucré et facile à peler, est une excellente source de vitamine C, de fibres et de bêta-carotène. Elle contient également des flavonoïdes, tels que la nobilétine et la tangérétine, qui possèdent des propriétés anti-inflammatoires et antioxydantes. ', 'Fruits', 'Images/mandarine.jpg', '4000', 0),
(11, 'Lime', 'Le citron vert, agrume acidulé et rafraîchissant, est une source riche en vitamine C, en antioxydants et en huiles essentielles. Il est connu pour ses propriétés antimicrobiennes et anti-inflammatoires. Le citron vert est un ingrédient essentiel de la cuisine mexicaine et asiatique.', 'Fruits', 'Images/lime.jpg', '2000', 0),
(12, 'Clémentine', '\r\nLa clémentine, agrume sucré et facile à peler, est une excellente source de vitamine C, de fibres et de bêta-carotène. Elle contient également des flavonoïdes, tels que la nobilétine et la tangérétine, qui possèdent des propriétés anti-inflammatoires et antioxydantes.', 'Fruits', 'Images/clementine.jpg', '1950', 0),
(13, 'Amandes', 'Les amandes, riches en nutriments, sont une excellente source de vitamine E, de magnésium, de fibres et de protéines. La vitamine E est un antioxydant puissant qui protège les cellules contre les dommages causés par les radicaux libres, contribuant ainsi à la santé de la peau.', 'Fruits', 'Images/amand.jpg', '1200', 20),
(14, 'Noix', 'Les noix, riches en antioxydants, sont une excellente source d\'acides gras oméga-3, de fibres, de vitamines et de minéraux. Les acides gras oméga-3 sont essentiels pour la santé cardiaque, la fonction cérébrale et la réduction de l\'inflammation. Les fibres favorisent la régularité intestinale. ', 'Fruits', 'Images/noix.jpg', '4000', 0),
(15, 'Noisettes', 'Les noisettes, riches en nutriments, sont une excellente source de vitamine E, de magnésium, de fibres et de protéines. La vitamine E est un antioxydant puissant qui protège les cellules contre les dommages causés par les radicaux libres, contribuant ainsi à la santé de la peau. ', 'Fruits', 'Images/nois.jpg', '4000', 50),
(16, 'Cajoux', '\r\nLes noix de cajou, riches en nutriments, sont une excellente source de cuivre, de magnésium, de phosphore et de zinc. Le cuivre est essentiel pour la formation des globules rouges, le maintien de la santé des os et la fonction immunitaire. Le magnésium est essentiel pour la santé des os.', 'Fruits', 'Images/cajou.jpg', '2675', 0),
(17, 'Pistaches', 'Les pistaches, riches en nutriments, sont une excellente source de fibres, de protéines, de vitamines et de minéraux. Les fibres favorisent la régularité intestinale et la satiété, aidant à contrôler le poids et à maintenir une digestion saine.', 'Fruits', 'Images/pistache.jpg', '3000', 0),
(18, 'Raisins secs', 'Les raisins secs, riches en nutriments, sont une excellente source de fibres, de vitamines et de minéraux. Les fibres favorisent la régularité intestinale et la satiété, aidant à contrôler le poids et à maintenir une digestion saine. Les vitamines et minéraux présents dans les raisins secs.', 'Fruits', 'Images/raisin.jpg', '1700', 0),
(19, 'Tomates', 'Les tomates, riches en nutriments et en antioxydants, sont une excellente source de vitamine C, de potassium et de lycopène. La vitamine C renforce le système immunitaire et protège les cellules contre les dommages causés par les radicaux libres. Le potassium est essentiel pour la santé cardiaque. ', 'Légumes', 'Images/tomates.jpg', '1125', 25),
(20, 'Carottes', 'Les carottes, riches en bêta-carotène, en fibres et en vitamines, sont une excellente source de vitamine A, de vitamine K1, de vitamine B6 et de potassium. Le bêta-carotène, un antioxydant puissant, est converti en vitamine A dans le corps, essentielle pour la santé des yeux.', 'Légumes', 'Images/carotte.jpg', '1700', 0),
(21, 'Concombre', 'Les concombres, rafraîchissants et hydratants, sont une excellente source de vitamines K et C, de potassium et de fibres. La vitamine K est essentielle pour la coagulation sanguine et la santé des os. La vitamine C renforce le système immunitaire.', 'Légumes', 'Images/concombre.jpg', '3800', 0),
(22, 'Poivron', 'Les poivrons, riches en vitamines et en antioxydants, sont une excellente source de vitamines C, A et B6, ainsi que de fibres et de potassium. La vitamine C renforce le système immunitaire et protège les cellules contre les dommages causés par les radicaux libres.', 'Légumes', 'Images/poivron.jpg', '500', 0),
(23, 'Brocoli', 'Les brocolis, riches en nutriments et en antioxydants, sont une excellente source de vitamines C, K et A, ainsi que de fibres et de composés phytochimiques. La vitamine C renforce le système immunitaire et protège les cellules contre les dommages causés par les radicaux libres.', 'Légumes', 'Images/brocoli.jpg', '16800', 30),
(24, 'Epinards', 'La vitamine A est essentielle pour la santé des yeux, la croissance cellulaire et la fonction immunitaire. La vitamine B6 est importante pour le métabolisme énergétique et la fonction cérébrale. Le potassium est essentiel pour la santé cardiaque et la régulation de la pression artérielle.', 'Légumes', 'Images/epinards.jpg', '850', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `exoauthent`
--
ALTER TABLE `exoauthent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `exoauthent`
--
ALTER TABLE `exoauthent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
