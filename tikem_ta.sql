-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2018 at 08:10 AM
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
-- Database: `tikem_ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('r97cuv1r9sdmjhnpcllvkmsg7otp9i3k', '::1', 1527771524, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373737313331303b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('87n14jdsvtn4vsdiehps8vn11vm77pc6', '::1', 1527772319, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373737323032343b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('5mkoqlshjld4ql20p8bhu4hq9hao4s2o', '::1', 1527772709, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373737323333323b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('c0livj7vuj3i8dmsdn8h9git7e0r8dm7', '::1', 1527773001, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373737323731303b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('00bpnl9t03l20l2fdgp411g6r980tdh8', '::1', 1527773279, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373737333032343b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('dkdmndlqnotc38g5q9i707v7c0d83m6i', '::1', 1527773542, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373737333334373b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('gl7d5n2i6ldf048s9lesja9oo0k3ph7m', '::1', 1527774052, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373737333736333b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('muelco8c06v6jo43t2b0j0c8nuh0rlqj', '::1', 1527774355, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373737343037313b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('24psuk5k28t0ar79ldm1h9ga1tlr4j5i', '::1', 1527774507, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373737343337333b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('7ofpkvljq2pcsp2ahrjk712ivakjkgo1', '::1', 1527774915, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373737343734333b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('drtfbkdig1hjc53urh9khcrpa98cksgi', '::1', 1527776123, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373737353833393b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('ld1i9753g356qiuu9m6aeao8gusv6dfd', '::1', 1527776758, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373737363436303b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('crb4rrbanh6h2eccv2eb0oo3qagm0gnf', '::1', 1527777586, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373737373035343b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('eam3enmprigniqn3jcor7q1mlkjj15q3', '::1', 1527777880, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373737373539303b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('p2ap2j2tak2eqscgl1e2lni01j2t2ddq', '::1', 1527779795, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373737393634303b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('3d4arh05svfu3oeklpoq0fer6vdo1vrd', '::1', 1527781802, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373738313634373b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('tvu7hmplu3rvckqd1dhk7mfbi474cc9j', '::1', 1527821603, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832313339313b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('q6j5aobme8v3do1rehjmhat08ftidg83', '::1', 1527821801, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832313734393b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('7fca3bopc9l0gf5elppeigkb5i7tpo08', '::1', 1527822385, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832323130393b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('1up45v649vmq3dtmtd47pb705j5ukjan', '::1', 1527822512, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832323432323b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('mk2sm0boct4vp3nvk42m96e6mkf2ao3k', '::1', 1527823277, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832323937383b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('dmpa6751t6kvp81np3tkr0jbp44988i8', '::1', 1527823581, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832333238323b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('0a61pncg3b7gg5cj6dj7hn030lk2ov9e', '::1', 1527823888, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832333539303b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('n0u3i7btp1aai13s1staa4jk45voo98e', '::1', 1527824215, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832333933343b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('m03uvgbevn3c9g84sd96s93a9orr21cr', '::1', 1527824478, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832343234393b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('g20g6ncimbb9cuo3scjiaf4i7lckkup0', '::1', 1527824640, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832343538313b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('so6slm7m1ka0jath446c3fcv4muq0iu5', '::1', 1527825172, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832343930303b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('9mm8ptcfjv2hv5503sdm5dlbijbtgbgr', '::1', 1527825587, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832353239323b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('5smn0bor58stck6bj7e80svdvq3q6efo', '::1', 1527825898, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832353632323b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('a3suh32er6jkevcdgjf3c6b4ok6d878e', '::1', 1527826283, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832353938343b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('4u5s5lenmrmm8pb8ort3g7m2oulaa834', '::1', 1527826306, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832363238353b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('ppa9hviq78rn13pvc05nv7hphddan9at', '::1', 1527826607, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832363630363b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6f67696e7c623a313b),
('kqa0uri3ugid2htmlljbq10flq5l3cua', '::1', 1527827397, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832373338323b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6576656c7c733a313a2231223b6c6f67696e7c623a313b),
('j5mh9arausccs5ofeit6n5cl6i6vvhg6', '::1', 1527828839, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373832383537303b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6576656c7c733a313a2231223b6c6f67696e7c623a313b),
('4q3bgsc0rvtht9ip0hp3tdl2mkqbka0o', '::1', 1527832047, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373833313734373b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6576656c7c733a313a2231223b6c6f67696e7c623a313b),
('k179idtl0vpjs38plfr5m6dlskpdj2ri', '::1', 1527832231, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373833323034383b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6576656c7c733a313a2231223b6c6f67696e7c623a313b),
('166tpmckmjf7skp2rlmfeoka664cfa8q', '::1', 1527832716, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532373833323731333b69647c733a313a2231223b6e616d617c733a31333a2241646d696e6973747261746f72223b757365726e616d657c733a353a2261646d696e223b6c6576656c7c733a313a2231223b6c6f67696e7c623a313b);

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
('TIKEM TA', 'TIKEM');

-- --------------------------------------------------------

--
-- Table structure for table `detil_semester`
--

CREATE TABLE `detil_semester` (
  `bulan` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_semester`
--

INSERT INTO `detil_semester` (`bulan`, `semester_id`) VALUES
(1, 2),
(2, 2),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 2),
(10, 2),
(11, 2),
(12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detil_tim`
--

CREATE TABLE `detil_tim` (
  `tim_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama`) VALUES
(1, 'Fakultas Teknik'),
(5, 'fakultas kemplo');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Seni'),
(2, 'Keagamaan'),
(3, 'Olah Raga'),
(4, 'Sains'),
(5, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tingkat_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `tanggal_lomba_awal` date NOT NULL,
  `tanggal_lomba_akhir` date NOT NULL,
  `semester_id` int(11) NOT NULL,
  `tahun_ajar_awal` year(4) NOT NULL,
  `tahun_ajar_akhir` year(4) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `prodi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nip`, `nama`, `prodi_id`) VALUES
(1, '15753003', 'Agung Sapto Margono Dh', 4);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `prestasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `prestasi`) VALUES
(1, 'Juara Umum'),
(2, 'Juara 1'),
(3, 'Juara 2'),
(4, 'Juara 3'),
(5, 'Juara Harapan 1'),
(6, 'Juara Harapan 2'),
(7, 'Juara Harapan 3');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `fakultas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama`, `fakultas_id`) VALUES
(2, 'test 123', 1),
(4, '1', 5),
(5, '2', 5),
(6, '234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`) VALUES
(1, 'Ganjil'),
(2, 'Genap');

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `prestasi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tingkat`
--

CREATE TABLE `tingkat` (
  `id` int(11) NOT NULL,
  `tingkat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkat`
--

INSERT INTO `tingkat` (`id`, `tingkat`) VALUES
(1, 'Lokal'),
(2, 'Nasional'),
(3, 'Internasional');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'Administrator', 1),
(12, 'egipsons', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Egipson A. W.', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_mahasiswa`
-- (See below for the actual view)
--
CREATE TABLE `v_mahasiswa` (
`id` int(11)
,`nip` varchar(255)
,`nama` varchar(255)
,`prodi_id` int(11)
,`nama_prodi` varchar(255)
,`fakultas_id` int(11)
,`nama_fakultas` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_prodi`
-- (See below for the actual view)
--
CREATE TABLE `v_prodi` (
`id` int(11)
,`nama_prodi` varchar(255)
,`fakultas_id` int(11)
,`nama_fakultas` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `v_mahasiswa`
--
DROP TABLE IF EXISTS `v_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mahasiswa`  AS  select `m`.`id` AS `id`,`m`.`nip` AS `nip`,`m`.`nama` AS `nama`,`m`.`prodi_id` AS `prodi_id`,`p`.`nama` AS `nama_prodi`,`p`.`fakultas_id` AS `fakultas_id`,`f`.`nama` AS `nama_fakultas` from ((`mahasiswa` `m` join `prodi` `p`) join `fakultas` `f`) where ((`m`.`prodi_id` = `p`.`id`) and (`p`.`fakultas_id` = `f`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_prodi`
--
DROP TABLE IF EXISTS `v_prodi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_prodi`  AS  select `p`.`id` AS `id`,`p`.`nama` AS `nama_prodi`,`p`.`fakultas_id` AS `fakultas_id`,`f`.`nama` AS `nama_fakultas` from (`prodi` `p` join `fakultas` `f`) where (`p`.`fakultas_id` = `f`.`id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `detil_semester`
--
ALTER TABLE `detil_semester`
  ADD PRIMARY KEY (`bulan`,`semester_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `detil_tim`
--
ALTER TABLE `detil_tim`
  ADD PRIMARY KEY (`tim_id`,`mahasiswa_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `tim_id` (`tim_id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tingkat_id` (`tingkat_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fakultas_id` (`fakultas_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatan_id` (`kegiatan_id`),
  ADD KEY `prestasi_id` (`prestasi_id`);

--
-- Indexes for table `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tingkat`
--
ALTER TABLE `tingkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_semester`
--
ALTER TABLE `detil_semester`
  ADD CONSTRAINT `detil_semester_ibfk_1` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`);

--
-- Constraints for table `detil_tim`
--
ALTER TABLE `detil_tim`
  ADD CONSTRAINT `detil_tim_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`),
  ADD CONSTRAINT `detil_tim_ibfk_2` FOREIGN KEY (`tim_id`) REFERENCES `tim` (`id`);

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`tingkat_id`) REFERENCES `tingkat` (`id`),
  ADD CONSTRAINT `kegiatan_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`);

--
-- Constraints for table `tim`
--
ALTER TABLE `tim`
  ADD CONSTRAINT `tim_ibfk_1` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`),
  ADD CONSTRAINT `tim_ibfk_2` FOREIGN KEY (`prestasi_id`) REFERENCES `prestasi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
