-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2018 at 09:47 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

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

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id`, `nama`, `listdokumen_id`, `pengajuan_id`) VALUES
(43, 'installer_prefs.json', 8, 2),
(44, 'pref_default_overrides', 1, 2),
(45, 'installation_status.json', 3, 2);

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

--
-- Dumping data for table `butir`
--

INSERT INTO `butir` (`id`, `nomor`, `nama`, `substandar_id`) VALUES
(4, '1.1.4', 'satu satu satu jadi empat test', 2),
(5, '1.1.2', 'satu satu dua', 2),
(6, '12', '124wrsdf ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama`) VALUES
(4, 'Fakultas Teknik Informatika'),
(5, 'Fakultas Ekonomi');

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

--
-- Dumping data for table `listdokumen`
--

INSERT INTO `listdokumen` (`id`, `keterangan`, `butir_id`, `tipe_listdokumen_id`) VALUES
(1, 'ini iseng', 4, 4),
(2, 'test', 4, 6),
(3, 'file satu', 5, 4),
(5, 'file tiga', 5, 5),
(6, 'file dua', 5, 5),
(7, 'test aja', 5, 4),
(8, 'test', 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tahun_borang` year(4) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `tipeversi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `tanggal_pengajuan`, `tahun_borang`, `unit_id`, `tipeversi_id`) VALUES
(2, '2018-05-08', 2011, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `fakultas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama`, `fakultas_id`) VALUES
(13, 'fti 1', 4),
(14, 'fti 2', 4),
(15, 'fe 3', 5),
(16, 'fe 4', 5);

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

--
-- Dumping data for table `standar`
--

INSERT INTO `standar` (`id`, `nomor`, `nama`, `tipeversi_id`) VALUES
(2, '1', 'satu satu aja', 5),
(4, '3', 'asf asfewf adsf dua jadi 3', 5),
(5, '2', 'test', 5);

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

--
-- Dumping data for table `substandar`
--

INSERT INTO `substandar` (`id`, `nomor`, `nama`, `standar_id`) VALUES
(2, '1.5', 'satu empat jadi lima', 4),
(3, '12', 'qrw rw', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tipeversi`
--

CREATE TABLE `tipeversi` (
  `id` int(11) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `versi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipeversi`
--

INSERT INTO `tipeversi` (`id`, `tipe`, `versi_id`) VALUES
(3, 'test 1', 3),
(5, 'qwe 1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_listdokumen`
--

CREATE TABLE `tipe_listdokumen` (
  `id` int(11) NOT NULL,
  `tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_listdokumen`
--

INSERT INTO `tipe_listdokumen` (`id`, `tipe`) VALUES
(4, 'Dokumen Wajib'),
(5, 'Dokumen Pendukung'),
(6, 'Dokumen Visitasi');

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
(1, 1, NULL),
(7, 2, 13),
(8, 2, 14),
(9, 2, 15),
(10, 2, 16);

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

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `unit_id`) VALUES
(1, 'Administrator', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 1, NULL),
(2, 'Operator FTI 1', 'opfti1', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3, 7);

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
-- Dumping data for table `versi`
--

INSERT INTO `versi` (`id`, `nama`, `tahun`) VALUES
(3, '9 standar', 2018),
(4, '7 standar', 2009);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_listdokumen`
-- (See below for the actual view)
--
CREATE TABLE `v_listdokumen` (
`id` int(11)
,`keterangan` varchar(255)
,`butir_id` int(11)
,`tipe_listdokumen_id` int(11)
,`nomor_butir` varchar(255)
,`nama_butir` varchar(255)
,`substandar_id` int(11)
,`nomor_substandar` varchar(255)
,`nama_substandar` varchar(255)
,`standar_id` int(11)
,`nomor_standar` varchar(255)
,`nama_standar` varchar(255)
,`tipeversi_id` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v_listdokumen`
--
DROP TABLE IF EXISTS `v_listdokumen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_listdokumen`  AS  select `l`.`id` AS `id`,`l`.`keterangan` AS `keterangan`,`l`.`butir_id` AS `butir_id`,`l`.`tipe_listdokumen_id` AS `tipe_listdokumen_id`,`b`.`nomor` AS `nomor_butir`,`b`.`nama` AS `nama_butir`,`b`.`substandar_id` AS `substandar_id`,`ss`.`nomor` AS `nomor_substandar`,`ss`.`nama` AS `nama_substandar`,`ss`.`standar_id` AS `standar_id`,`s`.`nomor` AS `nomor_standar`,`s`.`nama` AS `nama_standar`,`s`.`tipeversi_id` AS `tipeversi_id` from (((`standar` `s` join `substandar` `ss`) join `butir` `b`) join `listdokumen` `l`) where ((`l`.`butir_id` = `b`.`id`) and (`b`.`substandar_id` = `ss`.`id`) and (`ss`.`standar_id` = `s`.`id`)) ;

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
  ADD UNIQUE KEY `prodi_id_2` (`prodi_id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `butir`
--
ALTER TABLE `butir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `listdokumen`
--
ALTER TABLE `listdokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `standar`
--
ALTER TABLE `standar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `substandar`
--
ALTER TABLE `substandar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipeversi`
--
ALTER TABLE `tipeversi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipe_listdokumen`
--
ALTER TABLE `tipe_listdokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `versi`
--
ALTER TABLE `versi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
