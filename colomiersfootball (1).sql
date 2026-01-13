-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2026 at 08:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `colomiersfootball`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `permission` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(150) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_publication` datetime DEFAULT NULL,
  `categorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` int(11) NOT NULL,
  `lien_calendrier` varchar(255) DEFAULT NULL,
  `lien_classement` varchar(255) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipe`
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
(15, 'https://www.colomiersfoot.fr/calendrier.jpg?v=3eed1c5eacvrxwl', 'https://occitanie.fff.fr/recherche-clubs?subtab=ranking&tab=resultats&scl=2689&competition=434773&stage=1&group=3&label=U14%20R%C3%A9gional%201', 'U14 Régional 1');

-- --------------------------------------------------------

--
-- Table structure for table `histoires`
--

CREATE TABLE `histoires` (
  `id_histoire` int(11) NOT NULL,
  `titre` varchar(150) DEFAULT NULL,
  `tranche_date` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `joueur`
--

CREATE TABLE `joueur` (
  `id_joueur` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `joueur`
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
-- Table structure for table `match`
--

CREATE TABLE `match` (
  `id_match` int(11) NOT NULL,
  `resultat` varchar(20) DEFAULT NULL,
  `buts_marques` int(11) DEFAULT NULL,
  `buts_encaisses` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partenaire`
--

CREATE TABLE `partenaire` (
  `id_partenaire` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `nom_societe` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `nom`, `prenom`, `role`, `photo`) VALUES
(1, 'BLANCHARD', 'Yannick', 'Entraîneur N3', 'https://www.colomiersfoot.fr/BLANCHARD_20Yannick00.png?v=2fz5tcvk4rvu61'),
(2, 'PATRY', 'Florian', 'Adjoint & Prépa N3', 'https://www.colomiersfoot.fr/PATRY_20Florian0.png?v=2fy8a88rlbquo3v'),
(3, 'BARTHIE', 'Thomas', 'Adjoint N3', 'https://www.colomiersfoot.fr/BARTHIE_20Thomas0.png?v=1wp9fs8stfx3gep'),
(4, 'MACCARINI', 'Romuald', 'Ent. Gardiens N3', 'https://www.colomiersfoot.fr/Romuald_20MACCARINI0.png?v=2ue1yww6ys8dd9'),
(5, 'SALLES', 'Didier', 'Directeur Sportif N3', 'https://www.colomiersfoot.fr/SALLES_20Didier0.png?v=21b0lk8rlbqw5x4'),
(6, 'SLAMNIA', 'Ahmed', 'Entraîneur R2', 'https://www.colomiersfoot.fr/SLAMNIA_20Ahmed.jpg?v=5l4zyg32y5wahs'),
(7, 'BURTIN', 'Hugo', 'Préparateur Physique R2', 'https://www.colomiersfoot.fr/BURTIN_20Hugo.jpg?v=2gamu88xxnkfv9w'),
(8, 'BALAGUE', 'Guillaume', 'Entraîneur R1 Féminine', 'https://www.colomiersfoot.fr/BALAGUE_20Guillaume.jpg?v=5jwpu895fax04s7'),
(9, 'DAKOS', 'Axel', 'Préparateur Physique R1 Féminine', 'https://www.colomiersfoot.fr/DAKOS_20Axel.jpg?v=2gaqfk8xxnkmfcl'),
(10, 'SONZOGNI', 'Olivier', 'Responsable Futsal', 'https://www.colomiersfoot.fr/FUTSAL-SONZOGNI_20Olivier.jpg?v=4zb76o22vgvsckq9'),
(11, 'ALLAL', 'Mohamed', 'Entraîneur Futsal', 'https://www.colomiersfoot.fr/ALLAL_20Mohamed.jpg?v=356unc32y7i5vd'),
(12, 'ESFARELL', 'Eric', 'Responsables Vétérans', 'https://www.colomiersfoot.fr/VETERANS-ESPARRELL_20Eric.jpg?v=603wq0u9d7vn0b'),
(13, 'PATRY', 'Florian', 'Coordinateur Préparation Physique', 'https://www.colomiersfoot.fr/PATRY_20Florian0.jpg?v=224kh437w9zw1x'),
(14, 'MEDDAH', 'Enice', 'Entraineurs des Gardiens Jeunes', 'https://www.colomiersfoot.fr/MEDDAH_20Enice.jpg?v=1xocs0w6yrvlt1'),
(15, 'MOUSSI', 'Nabil', 'Entraîneur U19', 'https://www.colomiersfoot.fr/MOUSSI_20Nabil.jpg?v=24fmuw37wa0c69'),
(16, 'MARTELLI', 'Antonin', 'Préparateur Physique U19', 'https://www.colomiersfoot.fr/MARTELLI_20Antonin.jpg?v=224rnsw6ys2km2'),
(17, 'IMBERT', 'Martin', 'Entraîneur des Gardiens U19', 'https://www.colomiersfoot.fr/IMBERT_20Martin.jpg?v=1peplkw6yrtjxl'),
(18, 'KABA', 'Kalifa', 'Educateur U17', 'https://www.colomiersfoot.fr/KABA_20Kalifa.jpg?v=24frncw6yrkv6b'),
(19, 'AHMAT', 'Mahamat', 'Educateur Adjoint U17', 'https://www.colomiersfoot.fr/AHMAT_20Mahamat.jpg?v=24fngg37w9yh27'),
(20, 'MATHIEU', 'Eric', 'Educateur U17', 'https://www.colomiersfoot.fr/MATHIEU_20Eric.jpg?v=357jso32y7qy5y'),
(21, 'BLANCHARD', 'Cédric', 'Educateur U15', 'https://www.colomiersfoot.fr/BLANCHARD_20C_C3_A9dric.jpg?v=2g9vao8xxnnvnno'),
(22, 'AÏT-ALI', 'Florian', 'Président', 'https://www.colomiersfoot.fr/COMITE_20DIRECTEUR-A_C3_8FT-ALI_20Florian.jpg?v=b11rl422vgvrcs9v'),
(23, 'TRAVAL MICHELET', 'Karine', 'Présidente d\'honneur', 'https://www.colomiersfoot.fr/crbst_Michelet.jpg?v=26tarkjm4vt3zx'),
(24, 'SICARD', 'Bernard', 'Président d\'honneur', 'https://www.colomiersfoot.fr/bernard_sicard.jpg?v=26t8dcjm4vt3zv'),
(25, 'SUBRA', 'Denis', 'Vice-Président', 'https://www.colomiersfoot.fr/COMITE_20DIRECTEUR-SUBRA_20Denis.jpg?v=b129js22vgvrcaea'),
(26, 'MAURY', 'Sébastien', 'Vice-Président', 'https://www.colomiersfoot.fr/COMITE_20DIRECTEUR-MAURY_20S_C3_A9bastien.jpg?v=b12by022vgvrcioq'),
(27, 'LABAUME', 'Daniel', 'Secrétaire Général', 'https://www.colomiersfoot.fr/COMITE_20DIRECTEUR-LABAUME_20Daniel.jpg?v=b11nzs7hjory5m4'),
(28, 'BARTHIE', 'Max', 'Trésorier', 'https://www.colomiersfoot.fr/COMITE_20DIRECTEUR-BARTHIE_20Max.jpg?v=b10m9s7hjorxuf6'),
(29, 'TSERE', 'Gilles', 'Trésorier Adjoint', 'https://www.colomiersfoot.fr/COMITE_20DIRECTEUR-SERE_20Gilles.jpg?v=b11ukw22vgvre1q4'),
(30, 'AÏT-ALI', 'Ahmed', 'Membre', 'https://www.colomiersfoot.fr/COMITE_20DIRECTEUR-A_C3_8FT-ALI_20Ahmed.jpg?v=2eex6wthxyziss'),
(31, 'AÏT-ALI', 'Mohamed', 'Membre', 'https://www.colomiersfoot.fr/COMITE_20DIRECTEUR-A_C3_8FT-ALI_20Mohamed.jpg?v=b12dqo7hjorxuq1'),
(32, 'LEMPERIER', 'Stéphane', 'Membre', 'https://www.colomiersfoot.fr/St_C3_A9phane_20LEMPERIER.png?v=2ef06o86zfpzagu'),
(33, 'MOUTET', 'Florian', 'Membre', 'https://www.colomiersfoot.fr/COMITE_20DIRECTEUR-MOUTET_20Florian.jpg?v=b11olc22vgvrgd28'),
(34, 'ROQUES', 'Jean-Paul', 'Membre', 'https://www.colomiersfoot.fr/COMITE_20DIRECTEUR-ROQUES_20Jean-Paul.jpg?v=b12a5c22vgvrgk19'),
(35, 'COSTE', 'Mickaël', 'Coordinateur Général', 'https://www.colomiersfoot.fr/ADMINISTRATIF-COSTE_20Micka_C3_ABl.jpg?v=b11xko22vgvrl0sk'),
(36, 'HAMOUDI', 'Anne-Sophie', 'Secrétaire', 'https://www.colomiersfoot.fr/276A6521_20-_20Copie_modifi_C3_A9.jpg?v=2gnuhsu56u6ig0'),
(37, 'FAUTHOUS', 'Chantal', 'Responsable buvette et commandes', 'https://www.colomiersfoot.fr/U6-FAUTHOUS_20Chantal.jpg?v=357m6wuthwt26c');

-- --------------------------------------------------------

--
-- Table structure for table `staff_equipe`
--

CREATE TABLE `staff_equipe` (
  `id_staff` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_equipe`
--

INSERT INTO `staff_equipe` (`id_staff`, `id_equipe`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 3),
(7, 3),
(8, 2),
(9, 2),
(10, 5),
(11, 5),
(11, 6),
(15, 7),
(16, 7),
(17, 7),
(18, 10),
(19, 11),
(20, 10),
(21, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Indexes for table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`);

--
-- Indexes for table `histoires`
--
ALTER TABLE `histoires`
  ADD PRIMARY KEY (`id_histoire`);

--
-- Indexes for table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id_joueur`);

--
-- Indexes for table `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`id_match`);

--
-- Indexes for table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id_partenaire`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `staff_equipe`
--
ALTER TABLE `staff_equipe`
  ADD PRIMARY KEY (`id_staff`,`id_equipe`),
  ADD KEY `id_equipe` (`id_equipe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `histoires`
--
ALTER TABLE `histoires`
  MODIFY `id_histoire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id_joueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `match`
--
ALTER TABLE `match`
  MODIFY `id_match` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id_partenaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `staff_equipe`
--
ALTER TABLE `staff_equipe`
  ADD CONSTRAINT `staff_equipe_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`),
  ADD CONSTRAINT `staff_equipe_ibfk_2` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id_equipe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
