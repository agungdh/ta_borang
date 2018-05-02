-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2018 at 06:03 AM
-- Server version: 10.1.29-MariaDB-6
-- PHP Version: 7.2.4-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_borang`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `listdokumen_id` int(11) NOT NULL,
  `pengajuan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `butir`
--

CREATE TABLE `butir` (
  `id` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `substandar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `listdokumen`
--

CREATE TABLE `listdokumen` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `butir_id` int(11) NOT NULL,
  `tipe_listdokumen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `tahun_borang` year(4) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `tipeversi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `fakultas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `standar`
--

CREATE TABLE `standar` (
  `id` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tipeversi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `substandar`
--

CREATE TABLE `substandar` (
  `id` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `standar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipeversi`
--

CREATE TABLE `tipeversi` (
  `id` int(11) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `versi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_listdokumen`
--

CREATE TABLE `tipe_listdokumen` (
  `id` int(11) NOT NULL,
  `tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `unit` int(11) NOT NULL COMMENT '1=universitas&2=prodi',
  `prodi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `unit`, `prodi_id`) VALUES
(1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `versi`
--

CREATE TABLE `versi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listdokumen_id` (`listdokumen_id`),
  ADD KEY `pengajuan_id` (`pengajuan_id`);

--
-- Indexes for table `butir`
--
ALTER TABLE `butir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `substandar_id` (`substandar_id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listdokumen`
--
ALTER TABLE `listdokumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `butir_id` (`butir_id`),
  ADD KEY `tipe_listdokumen_id` (`tipe_listdokumen_id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipeversi_id` (`tipeversi_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fakultas_id` (`fakultas_id`);

--
-- Indexes for table `standar`
--
ALTER TABLE `standar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipeversi_id` (`tipeversi_id`);

--
-- Indexes for table `substandar`
--
ALTER TABLE `substandar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `standar_id` (`standar_id`);

--
-- Indexes for table `tipeversi`
--
ALTER TABLE `tipeversi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `versi_id` (`versi_id`);

--
-- Indexes for table `tipe_listdokumen`
--
ALTER TABLE `tipe_listdokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `versi`
--
ALTER TABLE `versi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `butir`
--
ALTER TABLE `butir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listdokumen`
--
ALTER TABLE `listdokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standar`
--
ALTER TABLE `standar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `substandar`
--
ALTER TABLE `substandar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipeversi`
--
ALTER TABLE `tipeversi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipe_listdokumen`
--
ALTER TABLE `tipe_listdokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `versi`
--
ALTER TABLE `versi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berkas`
--
ALTER TABLE `berkas`
  ADD CONSTRAINT `berkas_ibfk_1` FOREIGN KEY (`listdokumen_id`) REFERENCES `listdokumen` (`id`),
  ADD CONSTRAINT `berkas_ibfk_2` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`);

--
-- Constraints for table `butir`
--
ALTER TABLE `butir`
  ADD CONSTRAINT `butir_ibfk_1` FOREIGN KEY (`substandar_id`) REFERENCES `substandar` (`id`);

--
-- Constraints for table `listdokumen`
--
ALTER TABLE `listdokumen`
  ADD CONSTRAINT `listdokumen_ibfk_1` FOREIGN KEY (`butir_id`) REFERENCES `butir` (`id`),
  ADD CONSTRAINT `listdokumen_ibfk_2` FOREIGN KEY (`tipe_listdokumen_id`) REFERENCES `tipe_listdokumen` (`id`);

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`tipeversi_id`) REFERENCES `tipeversi` (`id`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`);

--
-- Constraints for table `standar`
--
ALTER TABLE `standar`
  ADD CONSTRAINT `standar_ibfk_1` FOREIGN KEY (`tipeversi_id`) REFERENCES `tipeversi` (`id`);

--
-- Constraints for table `substandar`
--
ALTER TABLE `substandar`
  ADD CONSTRAINT `substandar_ibfk_1` FOREIGN KEY (`standar_id`) REFERENCES `standar` (`id`);

--
-- Constraints for table `tipeversi`
--
ALTER TABLE `tipeversi`
  ADD CONSTRAINT `tipeversi_ibfk_1` FOREIGN KEY (`versi_id`) REFERENCES `versi` (`id`);

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
