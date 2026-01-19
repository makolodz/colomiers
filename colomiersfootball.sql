-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 19 jan. 2026 à 08:29
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
-- Base de données : `colomiersfootball`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `permission` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom`, `prenom`, `email`, `password`, `permission`) VALUES
(1, 'SUBRA', 'Denis', 'DenisSUBRA@gmail.com', 'Colomiersfoot', NULL),
(2, 'SICARD', 'Bernard', 'BernardSICARD@gmail.com', 'Colomiersfoot', NULL),
(3, 'TRAVAL MICHELET', 'Karine', 'KarineTRAVALMICHELET@gmail.com', 'Colomiersfoot', NULL),
(5, 'AIT ALI', 'Florian', 'FlorianAITALI@gmail.com', 'Colomiersfoot', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(150) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL,
  `date_publication` datetime DEFAULT NULL,
  `categorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `contenu`, `image`, `date_publication`, `categorie`) VALUES
(1, 'Nouveau site pour l\'US Colomiers', 'On a fait un nouveau site ! C\'est vachement plus joli dites-donc.', NULL, '0000-00-00 00:00:00', 1),
(2, 'Nouveau site pour l\'US Colomiers', 'On a fait un nouveau site ! C\'est vachement plus joli dites-donc.', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `classement`
--

CREATE TABLE `classement` (
  `id_classement` int(11) NOT NULL,
  `nom_team` varchar(50) NOT NULL,
  `position` int(11) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classement`
--

INSERT INTO `classement` (`id_classement`, `nom_team`, `position`, `points`) VALUES
(0, 'Anglet Genets', 1, 55),
(0, 'Blagnac', 2, 51),
(0, 'Castanet', 3, 48),
(0, 'Pau II', 4, 42),
(0, 'Colomiers', 5, 40),
(0, 'Stade Bordelais', 6, 35),
(0, 'Canet Roussillon', 7, 34),
(0, 'Lège-Cap-Ferret', 8, 34),
(0, 'Alberes Argelès', 9, 32),
(0, 'Bayonne', 10, 30),
(0, 'Onet-le-Château', 11, 30),
(0, 'Bordeaux  II', 12, 29),
(0, 'Saint-Paul Sport', 13, 19),
(0, 'Saint-Estève Perpignan', 14, 10);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` int(11) NOT NULL,
  `lien_calendrier` varchar(255) DEFAULT NULL,
  `lien_classement` varchar(255) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id_equipe`, `lien_calendrier`, `lien_classement`, `nom`) VALUES
(1, 'https://occitanie.fff.fr/recherche-clubs?subtab=calendar&tab=resultats&scl=2689&competition=439452&stage=1&group=1&label=N3%20POULE%20A', 'https://occitanie.fff.fr/recherche-clubs?subtab=ranking&tab=resultats&scl=2689&competition=439452&stage=1&group=1&label=N3', 'Nationale 3'),
(2, 'https://occitanie.fff.fr/recherche-clubs?subtab=calendar&tab=resultats&scl=2689&competition=434785&stage=1&group=1&label=R%C3%A9gional%201%20F%20POULE%20UNIQUE', 'https://occitanie.fff.fr/recherche-clubs?subtab=ranking&tab=resultats&scl=2689&competition=434785&stage=1&group=1&label=R%C3%A9gional%201%20F', 'R1 Féminine'),
(3, 'https://occitanie.fff.fr/recherche-clubs?subtab=calendar&tab=resultats&scl=2689&beginWeek=2025-08-04&endWeek=2025-08-10&competition=434764&stage=1&group=4&label=R%C3%A9gional%202%20M%20POULE%20D', 'https://occitanie.fff.fr/recherche-clubs?subtab=ranking&tab=resultats&scl=2689&competition=434764&stage=1&group=4&label=R%C3%A9gional%202%20M', 'Régional 2'),
(4, 'https://occitanie.fff.fr/recherche-clubs?subtab=calendar&tab=resultats&scl=2689&competition=434786&stage=1&group=3&label=R%C3%A9gional%202%20F%20POULE%20C', 'https://occitanie.fff.fr/recherche-clubs?subtab=ranking&tab=resultats&scl=2689&competition=434786&stage=1&group=3&label=R%C3%A9gional%202%20F', 'Régional 2 Féminin'),
(5, 'https://occitanie.fff.fr/recherche-clubs?subtab=calendar&tab=resultats&scl=2689&competition=434793&stage=1&group=1&label=R%C3%A9gional%201%20Futsal%20M%20POULE%20UNIQUE', 'https://occitanie.fff.fr/recherche-clubs?subtab=ranking&tab=resultats&scl=2689&competition=434793&stage=1&group=1&label=R%C3%A9gional%201%20Futsal%20M', 'R1 Futsal'),
(6, 'https://occitanie.fff.fr/recherche-clubs?subtab=calendar&tab=resultats&scl=2689&beginWeek=2025-10-13&endWeek=2025-10-19&competition=434794&stage=1&group=2&label=R%C3%A9gional%202%20M%20Futsal%20-%20PRO-SER%20POULE%20B', 'https://occitanie.fff.fr/recherche-clubs?subtab=ranking&tab=resultats&scl=2689&beginWeek=2025-10-13&endWeek=2025-10-19&competition=434794&stage=1&group=2&label=R%C3%A9gional%202%20M%20Futsal%20-%20PRO-SER', 'R2 Futsal'),
(7, 'https://occitanie.fff.fr/recherche-clubs?subtab=calendar&tab=resultats&scl=2689&competition=439015&stage=1&group=4&label=CHAMPIONNAT%20NATIONAL%20U19%20POULE%20D', 'https://occitanie.fff.fr/recherche-clubs?subtab=ranking&tab=resultats&scl=2689&competition=439015&stage=1&group=4&label=CHAMPIONNAT%20NATIONAL%20U19', 'U19 Nationaux'),
(8, 'https://occitanie.fff.fr/recherche-clubs?subtab=calendar&tab=resultats&scl=2689&competition=434767&stage=1&group=2&label=U18%20R%C3%A9gional%201%20M%20POULE%20B', 'https://occitanie.fff.fr/recherche-clubs?subtab=ranking&tab=resultats&scl=2689&competition=434767&stage=1&group=2&label=U18%20R%C3%A9gional%201%20M', 'U18 Régional 1'),
(9, 'https://occitanie.fff.fr/recherche-clubs?subtab=calendar&tab=resultats&scl=2689&competition=434787&stage=1&group=1&label=U18%20R%C3%A9gional%201%20F%20POULE%20UNIQUE', 'https://occitanie.fff.fr/recherche-clubs?subtab=ranking&tab=resultats&scl=2689&competition=434787&stage=1&group=1&label=U18%20R%C3%A9gional%201%20F', 'U18 Féminines R1'),
(10, 'https://occitanie.fff.fr/recherche-clubs?subtab=calendar&tab=resultats&scl=2689&competition=434769&stage=1&group=2&label=U17%20R%C3%A9gional%201%20M%20POULE%20B', 'https://occitanie.fff.fr/recherche-clubs?subtab=ranking&tab=resultats&scl=2689&competition=434769&stage=1&group=2&label=U17%20R%C3%A9gional%201%20M', 'U17 Régional 1'),
(11, 'https://occitanie.fff.fr/recherche-clubs?subtab=calendar&tab=resultats&scl=2689&competition=436451&stage=1&group=1&label=U17%20Niveau%20A%20POULE%20A', 'https://occitanie.fff.fr/recherche-clubs?subtab=ranking&tab=resultats&scl=2689&competition=436451&stage=1&group=1&label=U17%20Niveau%20A', 'U17 Niveau A'),
(12, 'https://occitanie.fff.fr/recherche-clubs?subtab=calendar&tab=resultats&scl=2689&competition=434770&stage=1&group=2&label=U16%20R%C3%A9gional%201%20M%20POULE%20B', 'https://occitanie.fff.fr/recherche-clubs?subtab=ranking&tab=resultats&scl=2689&competition=434770&stage=1&group=2&label=U16%20R%C3%A9gional%201%20M', 'U16 Régional 1'),
(13, 'https://occitanie.fff.fr/recherche-clubs?subtab=calendar&tab=resultats&scl=2689&competition=434772&stage=1&group=2&label=U15%20R%C3%A9gional%201%20POULE%20B', 'https://occitanie.fff.fr/recherche-clubs?subtab=ranking&tab=resultats&scl=2689&competition=434772&stage=1&group=2&label=U15%20R%C3%A9gional%201', 'U15 Régional 1'),
(14, 'https://occitanie.fff.fr/recherche-clubs?subtab=calendar&tab=resultats&scl=2689&competition=436462&stage=1&group=1&label=U15%20Niveau%20A%20POULE%20A', 'https://occitanie.fff.fr/recherche-clubs?subtab=ranking&tab=resultats&scl=2689&competition=436462&stage=1&group=1&label=U15%20Niveau%20A', 'U15 Niveau A'),
(15, 'https://www.colomiersfoot.fr/calendrier.jpg?v=3eed1c5eacvrxwl', 'https://occitanie.fff.fr/recherche-clubs?subtab=ranking&tab=resultats&scl=2689&competition=434773&stage=1&group=3&label=U14%20R%C3%A9gional%201', 'U14 Régional 1'),
(59, 'qbpeiuhgrli', 'bite eheh', 'phjnbbernvbferb'),
(61, NULL, NULL, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `histoires`
--

CREATE TABLE `histoires` (
  `id_histoire` int(11) NOT NULL,
  `titre` varchar(150) DEFAULT NULL,
  `tranche_date` varchar(50) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `histoires`
--

INSERT INTO `histoires` (`id_histoire`, `titre`, `tranche_date`, `image`, `contenu`) VALUES
(1, 'Aux origines de l’US Colomiers Football', '1925 – 1932', NULL, 'Pourquoi ne pas se remémorer l’histoire de notre club, de ses Présidents successifs et de toutes les personnes passionnées qui ont œuvré depuis sa création pour le rendre tel qu’il est aujourd’hui.\r\n\r\nCette belle histoire commence dans les années 1925 par la création d’une équipe de football jouant sans être officiellement déclarée. Il s’agit alors du premier sport pratiqué à Colomiers.\r\n\r\nLe 27 octobre 1932, le bureau du club composé de Bertrand Andrieeux, Albert Lazerge, Jean Castex et Émile Bertin se rend à la préfecture afin de créer officiellement l’association Union Sportive de Colomiers.'),
(2, 'Les premières décennies du club', '1932 – 1962', NULL, 'À partir de 1934, Monsieur Éloi Julia prend la présidence du club, suivi par plusieurs retours de Bertrand Andrieeux à la tête de l’association.\r\n\r\nDurant la Seconde Guerre mondiale, la présidence est assurée par le Commandant Thibaudau puis de nouveau par Éloi Julia jusqu’en 1950.\r\n\r\nSur le plan sportif, le club évolue dans un contexte amateur instable, en première série, alors que la ville de Colomiers compte un peu plus de 5 000 habitants.'),
(3, 'Structuration et premières ambitions sportives', '1962 – 1976', NULL, 'En 1962, Pierre Redonnet devient président et inaugure le stade municipal de la rue des Sports. Il confie l’équipe à Jean Thomas, entraîneur confirmé.\r\n\r\nLes résultats sont immédiats. Le club devient plus compétitif et réalise notamment un superbe parcours en Coupe de France en 1966, qui se termine à Sète face à une équipe professionnelle.'),
(4, 'La métamorphose du club', '1976 – 1986', NULL, 'En novembre 1976, Jean-Michel Touzelet prend la présidence et lance une profonde transformation du club autour de quatre axes majeurs : la remontée des équipes seniors, la structuration administrative, la formation des jeunes et la création du tournoi de Pâques.\r\n\r\nCe tournoi accueille rapidement des clubs prestigieux comme le Real Madrid, Benfica ou l’AS Monaco, donnant une notoriété nationale au club.'),
(5, 'Reconnaissance nationale et formation', '1986 – 2004', NULL, 'Le 30 avril 1986, les poussins de l’US Colomiers remportent la finale nationale de la Coupe des Poussins au Parc des Princes face à l’Olympique de Marseille.\r\n\r\nEn 1994, le club est classé premier club formateur amateur de France, distinction remise par le président de la FFF Claude Simonet.'),
(6, 'L’accession au niveau national', '2004 – 2014', NULL, 'En 2007, l’US Colomiers Football accède pour la première fois au CFA 2 à l’issue de barrages mémorables remportés aux tirs au but.\r\n\r\nLe club enchaîne avec une accession au CFA et atteint à plusieurs reprises les 64èmes de finale de la Coupe de France, notamment face au SC Bastia.'),
(7, 'Défis, formation et diversification', '2015 – 2021', NULL, 'Malgré des périodes sportives plus difficiles, le club continue de briller grâce à sa formation.\r\n\r\nLa section féminine est créée, une section futsal voit le jour et de nombreux titres sont remportés chez les jeunes, renforçant l’identité formatrice de l’US Colomiers Football.'),
(8, 'Un club tourné vers l’avenir', '2021 – Aujourd’hui', NULL, 'Après la crise sanitaire, le club poursuit son développement. Les féminines accèdent à la D3, les équipes jeunes évoluent au plus haut niveau national et de nombreux joueurs rejoignent des clubs professionnels.\r\n\r\nSous la présidence de Florian Aït-Ali, l’US Colomiers Football continue d’écrire son histoire avec ambition et passion.');

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `id_joueur` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`id_joueur`, `nom`, `prenom`, `role`, `photo`) VALUES
(1, 'PARRA CARVALHO', 'Pedro', 'Gardien de but', 'https://www.colomiersfoot.fr/Pedro_20PARRA_20CARVALHO0.png?v=3axrc88wbspw4nh'),
(2, 'MORVAN', 'Loup', 'Gardien de but', 'https://www.colomiersfoot.fr/Loup_20MORVAN0.png?v=3axsjcw16gzuqw'),
(3, 'COAT', 'Pierre', 'Défenseur', 'https://www.colomiersfoot.fr/Pierre_20COAT0.png?v=3aykog8wbspxewh'),
(4, 'LEBON', 'Léo', 'Défenseur', 'https://www.colomiersfoot.fr/L_C3_A9o_20LEBON0.png?v=345mqg2gz9z4rjeg'),
(5, 'LOIRETTE', 'Rudy', 'Défenseur', 'https://www.colomiersfoot.fr/Rudy_20LOIRETTE0.png?v=344i0o2gz9z4smef'),
(6, 'POLOMAT', 'Pierre-Yves', 'Défenseur', 'https://www.colomiersfoot.fr/Pierre-Yves_20POLOMAT0.png?v=3ayvgg2gz9z4t508'),
(7, 'SAKHO', 'Pape', 'Défenseur', 'https://www.colomiersfoot.fr/Pape_20SAKHO0.png?v=3aywnk2gz9z4tb9l'),
(8, 'TOURÉ', 'Yakouba', 'Défenseur', 'https://www.colomiersfoot.fr/Yakouba_20TOURE0.png?v=3ay2ps2gz9z4tjlj'),
(9, 'GADJI', 'Momar', 'Milieu de terrain', 'https://www.colomiersfoot.fr/Momar_20GADJI0.png?v=344hf48wbspoq6n'),
(10, 'HERVY', 'Nicolas', 'Milieu de terrain', 'https://www.colomiersfoot.fr/Nicolas_20HERVY0.png?v=344dts2gz9z4urq2'),
(11, 'KOUTAR', 'Walid', 'Milieu de terrain', 'https://www.colomiersfoot.fr/Walid_20KOUTAR0.png?v=345hy02gz9z4uzsu'),
(12, 'REY', 'Tim', 'Milieu de terrain', 'https://www.colomiersfoot.fr/Tim_20REY0.png?v=1lp7s82gz9z541qf'),
(13, 'SOUDANI', 'Iliès', 'Milieu de terrain', 'https://www.colomiersfoot.fr/Ili_C3_A8s_20SOUDANI0.png?v=3452z42gz9z4voa1'),
(14, 'TOURÉ', 'Seiti', 'Milieu de terrain', 'https://www.colomiersfoot.fr/Seiti_20TOURE0.png?v=344ys88wbspox9s'),
(15, 'ABOUBACAR', 'Abdoul', 'Attaquant', 'https://www.colomiersfoot.fr/Abdoul_20ABOUBACAR0.png?v=3axt4w2gz9z4wzih'),
(16, 'BELTRAN', 'Hamilton', 'Attaquant', 'https://www.colomiersfoot.fr/Hamilton_20BELTRAN0.png?v=3axyiw8wbspox2e'),
(17, 'KONTÉ', 'Djibril', 'Attaquant', 'https://www.colomiersfoot.fr/Djibril_20KONTE0.png?v=3ayyg82gz9z4xfex'),
(18, 'LEGRAND', 'Gabin', 'Attaquant', 'https://www.colomiersfoot.fr/Gabin_20LEGRAND0.png?v=3ayb3k8wbspoymb'),
(19, 'SELLAMI', 'Camil', 'Attaquant', 'https://www.colomiersfoot.fr/Camil_20SELLAMI0.png?v=3ay6wo2gz9z4xso7'),
(20, 'SUARES', 'Teddy', 'Attaquant', 'https://www.colomiersfoot.fr/Teddy_20SUARES0.png?v=3aye3c8wbspp6bk');

-- --------------------------------------------------------

--
-- Structure de la table `meteo`
--

CREATE TABLE `meteo` (
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `temperature` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `id_partenaire` int(11) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `nom_societe` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`id_partenaire`, `photo`, `nom_societe`) VALUES
(1, 'https://www.colomier', 'Ville de Colomiers'),
(2, 'https://www.colomier', 'Région Occitanie'),
(3, 'https://www.colomier', 'Conseil Départemental de la Haute-Garonne'),
(4, 'https://www.colomier', 'La Dépêche du Midi'),
(5, 'https://www.colomier', 'Groupe Alliaserv'),
(6, 'https://www.colomier', 'MMA'),
(7, 'https://www.colomier', 'Intermarché Cornebarrieu'),
(8, 'https://www.colomier', 'Cassin Travaux Publics'),
(9, 'https://www.colomier', 'Alain Afflelou'),
(10, 'https://www.colomier', 'McDonald\'s'),
(11, 'https://www.colomier', 'Trevi Sport'),
(12, 'https://www.colomier', 'Puma'),
(13, 'https://www.colomier', 'Sup Peinture'),
(14, 'https://www.colomier', 'Subra Henry'),
(15, 'https://www.colomier', 'Toshiba'),
(16, 'https://www.colomier', 'Selectour'),
(17, 'https://www.colomier', 'CZN Machinery'),
(18, 'https://www.colomier', 'TGF'),
(19, 'https://www.colomier', 'ACE Hôtel'),
(20, 'https://www.colomier', 'Eat Salad'),
(21, '16-01-2026', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `photo` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `staff`
--

INSERT INTO `staff` (`id_staff`, `nom`, `email`, `prenom`, `role`, `photo`) VALUES
(1, 'BLANCHARD', NULL, 'Yannick', 'Entraîneur N3', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f424c414e43484152445f323059616e6e69636b30302e706e673f763d32667a357463766b347276753631),
(2, 'PATRY', NULL, 'Florian', 'Adjoint & Prépa N3', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f50415452595f3230466c6f7269616e302e706e673f763d32667938613838726c6271756f3376),
(3, 'BARTHIE', NULL, 'Thomas', 'Adjoint N3', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f424152544849455f323054686f6d6173302e706e673f763d317770396673387374667833676570),
(4, 'MACCARINI', NULL, 'Romuald', 'Ent. Gardiens N3', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f526f6d75616c645f32304d4143434152494e49302e706e673f763d3275653179777736797338646439),
(5, 'SALLES', NULL, 'Didier', 'Directeur Sportif N3', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f53414c4c45535f3230446964696572302e706e673f763d323162306c6b38726c627177357834),
(6, 'SLAMNIA', NULL, 'Ahmed', 'Entraîneur R2', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f534c414d4e49415f323041686d65642e6a70673f763d356c347a79673332793577616873),
(7, 'BURTIN', NULL, 'Hugo', 'Préparateur Physique R2', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f42555254494e5f32304875676f2e6a70673f763d3267616d75383878786e6b66763977),
(8, 'BALAGUE', NULL, 'Guillaume', 'Entraîneur R1 Féminine', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f42414c414755455f32304775696c6c61756d652e6a70673f763d356a77707538393566617830347337),
(9, 'DAKOS', NULL, 'Axel', 'Préparateur Physique R1 Féminine', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f44414b4f535f32304178656c2e6a70673f763d32676171666b3878786e6b6d66636c),
(10, 'SONZOGNI', NULL, 'Olivier', 'Responsable Futsal', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f46555453414c2d534f4e5a4f474e495f32304f6c69766965722e6a70673f763d347a6237366f323276677673636b7139),
(11, 'ALLAL', NULL, 'Mohamed', 'Entraîneur Futsal', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f414c4c414c5f32304d6f68616d65642e6a70673f763d333536756e633332793769357664),
(12, 'ESFARELL', NULL, 'Eric', 'Responsables Vétérans', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f5645544552414e532d455350415252454c4c5f3230457269632e6a70673f763d36303377713075396437766e3062),
(13, 'PATRY', NULL, 'Florian', 'Coordinateur Préparation Physique', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f50415452595f3230466c6f7269616e302e6a70673f763d3232346b6834333777397a773178),
(14, 'MEDDAH', NULL, 'Enice', 'Entraineurs des Gardiens Jeunes', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f4d45444441485f3230456e6963652e6a70673f763d31786f63733077367972766c7431),
(15, 'MOUSSI', NULL, 'Nabil', 'Entraîneur U19', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f4d4f555353495f32304e6162696c2e6a70673f763d3234666d75773337776130633639),
(16, 'MARTELLI', NULL, 'Antonin', 'Préparateur Physique U19', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f4d415254454c4c495f3230416e746f6e696e2e6a70673f763d323234726e7377367973326b6d32),
(17, 'IMBERT', NULL, 'Martin', 'Entraîneur des Gardiens U19', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f494d424552545f32304d617274696e2e6a70673f763d317065706c6b77367972746a786c),
(18, 'KABA', NULL, 'Kalifa', 'Educateur U17', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f4b4142415f32304b616c6966612e6a70673f763d323466726e63773679726b763662),
(19, 'AHMAT', NULL, 'Mahamat', 'Educateur Adjoint U17', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f41484d41545f32304d6168616d61742e6a70673f763d3234666e67673337773979683237),
(20, 'MATHIEU', NULL, 'Eric', 'Educateur U17', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f4d4154484945555f3230457269632e6a70673f763d3335376a736f3332793771793579),
(21, 'BLANCHARD', NULL, 'Cédric', 'Educateur U15', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f424c414e43484152445f3230435f43335f4139647269632e6a70673f763d32673976616f3878786e6e766e6e6f),
(22, 'AÏT-ALI', NULL, 'Florian', 'Président', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f434f4d4954455f32304449524543544555522d415f43335f3846542d414c495f3230466c6f7269616e2e6a70673f763d623131726c3432327667767263733976),
(23, 'TRAVAL MICHELET', NULL, 'Karine', 'Présidente d\'honneur', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f63726273745f4d696368656c65742e6a70673f763d32367461726b6a6d347674337a78),
(24, 'SICARD', NULL, 'Bernard', 'Président d\'honneur', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f6265726e6172645f7369636172642e6a70673f763d3236743864636a6d347674337a76),
(25, 'SUBRA', NULL, 'Denis', 'Vice-Président', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f434f4d4954455f32304449524543544555522d53554252415f323044656e69732e6a70673f763d623132396a7332327667767263616561),
(26, 'MAURY', NULL, 'Sébastien', 'Vice-Président', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f434f4d4954455f32304449524543544555522d4d415552595f3230535f43335f41396261737469656e2e6a70673f763d62313262793032327667767263696f71),
(27, 'LABAUME', NULL, 'Daniel', 'Secrétaire Général', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f434f4d4954455f32304449524543544555522d4c414241554d455f323044616e69656c2e6a70673f763d6231316e7a7337686a6f7279356d34),
(28, 'BARTHIE', NULL, 'Max', 'Trésorier', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f434f4d4954455f32304449524543544555522d424152544849455f32304d61782e6a70673f763d6231306d397337686a6f7278756636),
(29, 'TSERE', NULL, 'Gilles', 'Trésorier Adjoint', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f434f4d4954455f32304449524543544555522d534552455f323047696c6c65732e6a70673f763d623131756b7732327667767265317134),
(30, 'AÏT-ALI', NULL, 'Ahmed', 'Membre', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f434f4d4954455f32304449524543544555522d415f43335f3846542d414c495f323041686d65642e6a70673f763d326565783677746878797a697373),
(31, 'AÏT-ALI', NULL, 'Mohamed', 'Membre', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f434f4d4954455f32304449524543544555522d415f43335f3846542d414c495f32304d6f68616d65642e6a70673f763d62313264716f37686a6f7278757131),
(32, 'LEMPERIER', NULL, 'Stéphane', 'Membre', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f53745f43335f41397068616e655f32304c454d5045524945522e706e673f763d32656630366f38367a66707a616775),
(33, 'MOUTET', NULL, 'Florian', 'Membre', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f434f4d4954455f32304449524543544555522d4d4f555445545f3230466c6f7269616e2e6a70673f763d6231316f6c6332327667767267643238),
(34, 'ROQUES', NULL, 'Jean-Paul', 'Membre', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f434f4d4954455f32304449524543544555522d524f515545535f32304a65616e2d5061756c2e6a70673f763d623132613563323276677672676b3139),
(35, 'COSTE', NULL, 'Mickaël', 'Coordinateur Général', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f41444d494e49535452415449462d434f5354455f32304d69636b615f43335f41426c2e6a70673f763d623131786b6f3232766776726c30736b),
(36, 'HAMOUDI', NULL, 'Anne-Sophie', 'Secrétaire', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f32373641363532315f32302d5f3230436f7069655f6d6f646966695f43335f41392e6a70673f763d32676e7568737535367536696730),
(37, 'FAUTHOUS', NULL, 'Chantal', 'Responsable buvette et commandes', 0x68747470733a2f2f7777772e636f6c6f6d69657273666f6f742e66722f55362d46415554484f55535f32304368616e74616c2e6a70673f763d3335376d36777574687774323663);

-- --------------------------------------------------------

--
-- Structure de la table `staff_equipe`
--

CREATE TABLE `staff_equipe` (
  `id_staff` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `staff_equipe`
--

INSERT INTO `staff_equipe` (`id_staff`, `id_equipe`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 5),
(1, 6),
(1, 8),
(1, 14),
(1, 15),
(1, 61),
(2, 1),
(2, 2),
(2, 5),
(2, 10),
(2, 14),
(2, 15),
(2, 61),
(3, 1),
(3, 2),
(3, 5),
(3, 14),
(3, 61),
(4, 1),
(5, 1),
(5, 14),
(6, 2),
(6, 3),
(6, 6),
(6, 14),
(7, 3),
(8, 1),
(8, 59),
(9, 5),
(9, 59),
(10, 1),
(10, 5),
(10, 59),
(11, 1),
(11, 4),
(11, 5),
(11, 6),
(11, 59),
(12, 5),
(16, 5),
(16, 59),
(18, 5),
(18, 7),
(18, 10),
(19, 8),
(19, 11),
(20, 10),
(21, 13),
(22, 9),
(22, 14),
(23, 5),
(26, 5),
(26, 9),
(27, 7),
(29, 4),
(33, 6),
(35, 4),
(36, 7),
(37, 4),
(37, 9),
(37, 15);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`);

--
-- Index pour la table `histoires`
--
ALTER TABLE `histoires`
  ADD PRIMARY KEY (`id_histoire`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id_joueur`);

--
-- Index pour la table `meteo`
--
ALTER TABLE `meteo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id_partenaire`);

--
-- Index pour la table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Index pour la table `staff_equipe`
--
ALTER TABLE `staff_equipe`
  ADD PRIMARY KEY (`id_staff`,`id_equipe`),
  ADD KEY `id_equipe` (`id_equipe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `histoires`
--
ALTER TABLE `histoires`
  MODIFY `id_histoire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id_joueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `meteo`
--
ALTER TABLE `meteo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id_partenaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `staff_equipe`
--
ALTER TABLE `staff_equipe`
  ADD CONSTRAINT `staff_equipe_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`),
  ADD CONSTRAINT `staff_equipe_ibfk_2` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id_equipe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
