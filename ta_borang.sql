-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2018 at 10:50 AM
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
  `substandar_id` int(11) DEFAULT NULL,
  `butir_id` int(11) DEFAULT NULL,
  `pengajuan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id`, `nama`, `substandar_id`, `butir_id`, `pengajuan_id`) VALUES
(41, 'jquery.chained.min.js', NULL, 3, 6),
(42, 'jquery.min.js', NULL, 4, 6),
(43, 'select.php', 4, NULL, 6),
(44, 'belajar.sql', NULL, 5, 6),
(45, 'jquery.chained.min.js', NULL, 6, 6),
(46, 'belajar.sql', 5, NULL, 6),
(47, 'jquery.chained.min.js', 6, NULL, 6),
(48, 'jquery.chained.min.js', 7, NULL, 6),
(49, 'belajar.sql', 8, NULL, 6),
(50, 'jquery.chained.min.js', 9, NULL, 6),
(51, 'belajar.sql', 10, NULL, 6),
(52, 'jquery.chained.min.js', NULL, 3, 10),
(53, 'jquery.chained.min.js', NULL, 4, 10),
(54, 'jquery.min.js', NULL, 5, 10),
(55, 'jquery.chained.min.js', NULL, 6, 10),
(56, 'jquery.chained.min.js', 4, NULL, 10),
(57, 'jquery.chained.min.js', 5, NULL, 10),
(58, 'jquery.chained.min.js', 6, NULL, 10),
(59, 'jquery.chained.min.js', 7, NULL, 10),
(60, 'jquery.chained.min.js', 8, NULL, 10),
(61, 'belajar.sql', 9, NULL, 10),
(62, 'jquery.min.js', 10, NULL, 10),
(63, 'Leggimi.txt', 5, NULL, 11),
(64, 'Lisezmoi.txt', 6, NULL, 11),
(65, '??.txt', 8, NULL, 11),
(66, 'Readme.txt', 10, NULL, 11),
(67, 'Lisezmoi.txt', NULL, 3, 11),
(68, 'Readme.txt', 4, NULL, 11);

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
(3, '1.1.1', 'Jelaskan mekanisme penyusunan visi, misi, tujuan dan sasaran program studi, serta pihak-pihak yang dilibatkan', 1),
(4, '1.1.2', 'Sasaran dan strategi pencapaian', 1),
(5, '5.1.1', 'a', 11),
(6, '5.1.2', 'b', 11);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `judul_aplikasi` varchar(255) NOT NULL,
  `judul_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`judul_aplikasi`, `judul_menu`) VALUES
('Aplikasi Pengumpulan Data Pengajuan Akreditasi Berbasis Web di Universitas XYZ', 'APDPA');

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
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tahun_usulan` year(4) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `versi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `tanggal_pengajuan`, `tahun_usulan`, `prodi_id`, `versi_id`) VALUES
(6, '2018-06-11', 2003, 13, 1),
(7, '2018-06-23', 2003, 15, 1),
(10, '2018-07-04', 2003, 13, 1),
(11, '2018-07-09', 2008, 13, 1);

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
  `versi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `standar`
--

INSERT INTO `standar` (`id`, `nomor`, `nama`, `versi_id`) VALUES
(2, '1', 'Visi, misi, tujuan dan sasaran, serta strategi pencapaian', 1),
(6, '2', 'Tata pamong, kepemimpinan, sistem pengelolaan, dan penjaminan mutu', 1),
(7, '3', 'Mahasiswa dan lulusan', 1),
(8, '4', 'Sumber daya manusia', 1),
(9, '5', 'Kurikulum, pembelajaran, dan suasana akademik', 1),
(10, '6', 'Pembiayaan, sarana dan prasarana, serta sistem informasi', 1),
(11, '7', 'Penelitian, pelayanan/pengabdian kepada masyarakat, dan kerjasama', 1);

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
(1, '1.1', 'Visi, misi, tujuan dan sasaran, serta strategi pencapaian', 2),
(4, '1.2', 'Sosialisasi', 2),
(5, '2.1', 'Sistem Tata Pamong', 6),
(6, '2.2', 'Kepemimpinan', 6),
(7, '2.3', 'Sistem Pengelolaan', 6),
(8, '2.4', 'Penjaminan Mutu', 6),
(9, '2.5', 'Umpan Balik', 6),
(10, '2.6', 'Keberlanjutan', 6),
(11, '5.1', 'asadfs adfsadf ', 9);

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
  `prodi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `prodi_id`) VALUES
(1, 'Administrator', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 1, NULL),
(2, 'Operator FTI 1', 'opfti1', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3, 13),
(4, 'Test Admin', 'testadmin', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 1, NULL),
(5, 'Test DPM', 'testdpm', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 2, NULL),
(6, 'Test Fe', 'testfe', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3, 15),
(12, 'cobafti1', 'cobafti1', '82652b6d108ee60bbfddccd3e220e1135a6aa793c8103430f64b0c1861ff5d37de92b8980b63b7af42115edd0168702317a88da72bf308d59b6524c156703a84', 3, 13),
(16, 'w', 'r', 'a882f0ac848b0b6b4ca7b42bfa1d266afd0ddeba9204ae57a984a69376d59816b1ef3f4d442ea8a70396067ff5b70e0ae8eab3935b617b8e366d8e35c3bfe14c', 3, 13),
(17, '1', '2', '3bafbf08882a2d10133093a1b8433f50563b93c14acd05b79028eb1d12799027241450980651994501423a66c276ae26c43b739bc65c4e16b10c3af6c202aebb', 2, NULL);

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
(1, '7 Standar Diploma', 2009),
(9, '9 Standar', 2017);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pengajuan`
-- (See below for the actual view)
--
CREATE TABLE `v_pengajuan` (
`id` int(11)
,`tanggal_pengajuan` date
,`tahun_usulan` year(4)
,`prodi_id` int(11)
,`prodi` varchar(255)
,`versi_id` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v_pengajuan`
--
DROP TABLE IF EXISTS `v_pengajuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengajuan`  AS  select `pe`.`id` AS `id`,`pe`.`tanggal_pengajuan` AS `tanggal_pengajuan`,`pe`.`tahun_usulan` AS `tahun_usulan`,`pe`.`prodi_id` AS `prodi_id`,`pr`.`nama` AS `prodi`,`pe`.`versi_id` AS `versi_id` from (`pengajuan` `pe` join `prodi` `pr`) where (`pe`.`prodi_id` = `pr`.`id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `butir_id` (`butir_id`),
  ADD KEY `pengajuan_id` (`pengajuan_id`),
  ADD KEY `substandar_id` (`substandar_id`);

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
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodi_id` (`prodi_id`),
  ADD KEY `versi_id` (`versi_id`);

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
  ADD KEY `versi_id` (`versi_id`);

--
-- Indexes for table `substandar`
--
ALTER TABLE `substandar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `standar_id` (`standar_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodi_id` (`prodi_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `standar`
--
ALTER TABLE `standar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `substandar`
--
ALTER TABLE `substandar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `versi`
--
ALTER TABLE `versi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berkas`
--
ALTER TABLE `berkas`
  ADD CONSTRAINT `berkas_ibfk_1` FOREIGN KEY (`butir_id`) REFERENCES `butir` (`id`),
  ADD CONSTRAINT `berkas_ibfk_2` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`),
  ADD CONSTRAINT `berkas_ibfk_3` FOREIGN KEY (`substandar_id`) REFERENCES `substandar` (`id`);

--
-- Constraints for table `butir`
--
ALTER TABLE `butir`
  ADD CONSTRAINT `butir_ibfk_1` FOREIGN KEY (`substandar_id`) REFERENCES `substandar` (`id`);

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`versi_id`) REFERENCES `versi` (`id`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`);

--
-- Constraints for table `standar`
--
ALTER TABLE `standar`
  ADD CONSTRAINT `standar_ibfk_1` FOREIGN KEY (`versi_id`) REFERENCES `versi` (`id`);

--
-- Constraints for table `substandar`
--
ALTER TABLE `substandar`
  ADD CONSTRAINT `substandar_ibfk_1` FOREIGN KEY (`standar_id`) REFERENCES `standar` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
