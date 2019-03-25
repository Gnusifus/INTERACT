-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 11:39 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interact`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `epost` varchar(45) NOT NULL,
  `passord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin_has_cases`
--

CREATE TABLE `admin_has_cases` (
  `admin_idadmin` int(11) NOT NULL,
  `cases_idcases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bilde`
--

CREATE TABLE `bilde` (
  `idbilde` int(11) NOT NULL,
  `bilde` varchar(45) NOT NULL,
  `sub_nodes_idsub_nodes` int(11) NOT NULL,
  `sub_nodes_nodes_idnodes` int(11) NOT NULL,
  `sub_nodes_nodes_cases_idcases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `idcases` int(11) NOT NULL,
  `bilde` varchar(45) DEFAULT NULL,
  `tittel` varchar(45) NOT NULL,
  `tekst` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`idcases`, `bilde`, `tittel`, `tekst`) VALUES
(6, '1553265394718310.png', 'Min case', 'Her er min case'),
(7, '1553265414718310.png', 'Casen min', 'Dette er min case'),
(8, '1553265578845646.jpg', 'ewdfwe', 'efwef'),
(9, '1553265587ilcio8km31c21.jpg', 'fewf', 'wefwf'),
(10, '1553266184845646.jpg', 'ewf', 'wefwe');

-- --------------------------------------------------------

--
-- Table structure for table `dokument`
--

CREATE TABLE `dokument` (
  `iddokument` int(11) NOT NULL,
  `dokument` varchar(45) NOT NULL,
  `sub_nodes_idsub_nodes` int(11) NOT NULL,
  `sub_nodes_nodes_idnodes` int(11) NOT NULL,
  `sub_nodes_nodes_cases_idcases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `idlink` int(11) NOT NULL,
  `link` varchar(45) NOT NULL,
  `sub_nodes_idsub_nodes` int(11) NOT NULL,
  `sub_nodes_nodes_idnodes` int(11) NOT NULL,
  `sub_nodes_nodes_cases_idcases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lyd`
--

CREATE TABLE `lyd` (
  `idlyd` int(11) NOT NULL,
  `lyd` varchar(45) NOT NULL,
  `sub_nodes_idsub_nodes` int(11) NOT NULL,
  `sub_nodes_nodes_idnodes` int(11) NOT NULL,
  `sub_nodes_nodes_cases_idcases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nodes`
--

CREATE TABLE `nodes` (
  `idnodes` int(11) NOT NULL,
  `bilde` varchar(45) DEFAULT NULL,
  `overskrift` varchar(45) NOT NULL,
  `cases_idcases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nodes`
--

INSERT INTO `nodes` (`idnodes`, `bilde`, `overskrift`, `cases_idcases`) VALUES
(22, '1553265598ilcio8km31c21.jpg', 'wfew', 8),
(23, '1553266547845646.jpg', 'Hei', 10),
(24, '155326656622459187_1473579436097135_296338687', 'dwdw', 10),
(25, '1553506650845646.jpg', '', 7),
(26, '1553506808718310.png', 'wdw', 7),
(27, '1553507623ilcio8km31c21.jpg', 'NAV', 7);

-- --------------------------------------------------------

--
-- Table structure for table `sporsmaal`
--

CREATE TABLE `sporsmaal` (
  `idsporsmaal` int(11) NOT NULL,
  `sporsmaal` varchar(45) NOT NULL,
  `sub_nodes_idsub_nodes` int(11) NOT NULL,
  `sub_nodes_nodes_idnodes` int(11) NOT NULL,
  `sub_nodes_nodes_cases_idcases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_nodes`
--

CREATE TABLE `sub_nodes` (
  `idsub_nodes` int(11) NOT NULL,
  `overskrift` varchar(45) NOT NULL,
  `nodes_idnodes` int(11) NOT NULL,
  `nodes_cases_idcases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tekst`
--

CREATE TABLE `tekst` (
  `idtekst` int(11) NOT NULL,
  `tekst` varchar(255) NOT NULL,
  `sub_nodes_idsub_nodes` int(11) NOT NULL,
  `sub_nodes_nodes_idnodes` int(11) NOT NULL,
  `sub_nodes_nodes_cases_idcases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `idvideo` int(11) NOT NULL,
  `video` varchar(45) NOT NULL,
  `sub_nodes_idsub_nodes` int(11) NOT NULL,
  `sub_nodes_nodes_idnodes` int(11) NOT NULL,
  `sub_nodes_nodes_cases_idcases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `admin_has_cases`
--
ALTER TABLE `admin_has_cases`
  ADD PRIMARY KEY (`admin_idadmin`,`cases_idcases`),
  ADD KEY `fk_admin_has_cases_cases1_idx` (`cases_idcases`),
  ADD KEY `fk_admin_has_cases_admin_idx` (`admin_idadmin`);

--
-- Indexes for table `bilde`
--
ALTER TABLE `bilde`
  ADD PRIMARY KEY (`idbilde`,`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`),
  ADD KEY `fk_bilde_sub_nodes1_idx` (`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`idcases`);

--
-- Indexes for table `dokument`
--
ALTER TABLE `dokument`
  ADD PRIMARY KEY (`iddokument`,`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`),
  ADD KEY `fk_dokument_sub_nodes1_idx` (`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`idlink`,`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`),
  ADD KEY `fk_link_sub_nodes1_idx` (`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`);

--
-- Indexes for table `lyd`
--
ALTER TABLE `lyd`
  ADD PRIMARY KEY (`idlyd`,`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`),
  ADD KEY `fk_lyd_sub_nodes1_idx` (`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`);

--
-- Indexes for table `nodes`
--
ALTER TABLE `nodes`
  ADD PRIMARY KEY (`idnodes`,`cases_idcases`),
  ADD KEY `fk_nodes_cases1_idx` (`cases_idcases`);

--
-- Indexes for table `sporsmaal`
--
ALTER TABLE `sporsmaal`
  ADD PRIMARY KEY (`idsporsmaal`,`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`),
  ADD KEY `fk_sporsmaal_sub_nodes1_idx` (`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`);

--
-- Indexes for table `sub_nodes`
--
ALTER TABLE `sub_nodes`
  ADD PRIMARY KEY (`idsub_nodes`,`nodes_idnodes`,`nodes_cases_idcases`),
  ADD KEY `fk_sub_nodes_nodes1_idx` (`nodes_idnodes`,`nodes_cases_idcases`);

--
-- Indexes for table `tekst`
--
ALTER TABLE `tekst`
  ADD PRIMARY KEY (`idtekst`,`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`),
  ADD KEY `fk_tekst_sub_nodes1_idx` (`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`idvideo`,`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`),
  ADD KEY `fk_video_sub_nodes1_idx` (`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bilde`
--
ALTER TABLE `bilde`
  MODIFY `idbilde` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `idcases` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dokument`
--
ALTER TABLE `dokument`
  MODIFY `iddokument` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `idlink` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lyd`
--
ALTER TABLE `lyd`
  MODIFY `idlyd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nodes`
--
ALTER TABLE `nodes`
  MODIFY `idnodes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sporsmaal`
--
ALTER TABLE `sporsmaal`
  MODIFY `idsporsmaal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_nodes`
--
ALTER TABLE `sub_nodes`
  MODIFY `idsub_nodes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tekst`
--
ALTER TABLE `tekst`
  MODIFY `idtekst` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `idvideo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_has_cases`
--
ALTER TABLE `admin_has_cases`
  ADD CONSTRAINT `fk_admin_has_cases_admin` FOREIGN KEY (`admin_idadmin`) REFERENCES `admin` (`idadmin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_admin_has_cases_cases1` FOREIGN KEY (`cases_idcases`) REFERENCES `cases` (`idcases`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bilde`
--
ALTER TABLE `bilde`
  ADD CONSTRAINT `fk_bilde_sub_nodes1` FOREIGN KEY (`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`) REFERENCES `sub_nodes` (`idsub_nodes`, `nodes_idnodes`, `nodes_cases_idcases`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dokument`
--
ALTER TABLE `dokument`
  ADD CONSTRAINT `fk_dokument_sub_nodes1` FOREIGN KEY (`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`) REFERENCES `sub_nodes` (`idsub_nodes`, `nodes_idnodes`, `nodes_cases_idcases`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `fk_link_sub_nodes1` FOREIGN KEY (`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`) REFERENCES `sub_nodes` (`idsub_nodes`, `nodes_idnodes`, `nodes_cases_idcases`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lyd`
--
ALTER TABLE `lyd`
  ADD CONSTRAINT `fk_lyd_sub_nodes1` FOREIGN KEY (`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`) REFERENCES `sub_nodes` (`idsub_nodes`, `nodes_idnodes`, `nodes_cases_idcases`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nodes`
--
ALTER TABLE `nodes`
  ADD CONSTRAINT `fk_nodes_cases1` FOREIGN KEY (`cases_idcases`) REFERENCES `cases` (`idcases`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sporsmaal`
--
ALTER TABLE `sporsmaal`
  ADD CONSTRAINT `fk_sporsmaal_sub_nodes1` FOREIGN KEY (`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`) REFERENCES `sub_nodes` (`idsub_nodes`, `nodes_idnodes`, `nodes_cases_idcases`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sub_nodes`
--
ALTER TABLE `sub_nodes`
  ADD CONSTRAINT `fk_sub_nodes_nodes1` FOREIGN KEY (`nodes_idnodes`,`nodes_cases_idcases`) REFERENCES `nodes` (`idnodes`, `cases_idcases`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tekst`
--
ALTER TABLE `tekst`
  ADD CONSTRAINT `fk_tekst_sub_nodes1` FOREIGN KEY (`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`) REFERENCES `sub_nodes` (`idsub_nodes`, `nodes_idnodes`, `nodes_cases_idcases`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `fk_video_sub_nodes1` FOREIGN KEY (`sub_nodes_idsub_nodes`,`sub_nodes_nodes_idnodes`,`sub_nodes_nodes_cases_idcases`) REFERENCES `sub_nodes` (`idsub_nodes`, `nodes_idnodes`, `nodes_cases_idcases`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
