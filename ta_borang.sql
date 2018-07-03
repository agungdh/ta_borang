-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2018 pada 05.22
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

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
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `substandar_id` int(11) DEFAULT NULL,
  `butir_id` int(11) DEFAULT NULL,
  `pengajuan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id`, `nama`, `substandar_id`, `butir_id`, `pengajuan_id`) VALUES
(10, 'contributing.md', NULL, 3, 6),
(11, 'data_penting.txt', NULL, 4, 6),
(12, 'index.php', 4, NULL, 6),
(13, '.editorconfig', 5, NULL, 6),
(14, '.gitignore', 7, NULL, 6),
(15, '.htaccess', 8, NULL, 6),
(16, '.editorconfig', 6, NULL, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `butir`
--

CREATE TABLE `butir` (
  `id` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `substandar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `butir`
--

INSERT INTO `butir` (`id`, `nomor`, `nama`, `substandar_id`) VALUES
(3, '1.1.1', 'Jelaskan mekanisme penyusunan visi, misi, tujuan dan sasaran program studi, serta pihak-pihak yang dilibatkan', 1),
(4, '1.1.2', 'Sasaran dan strategi pencapaian', 1),
(5, '5.1.1', 'a', 11),
(6, '5.1.2', 'b', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `config`
--

CREATE TABLE `config` (
  `judul_aplikasi` varchar(255) NOT NULL,
  `judul_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `config`
--

INSERT INTO `config` (`judul_aplikasi`, `judul_menu`) VALUES
('Aplikasi Pengumpulan Data Akreditasi Prodi', 'APDAP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama`) VALUES
(4, 'Fakultas Teknik Informatika'),
(5, 'Fakultas Ekonomi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tahun_usulan` year(4) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `versi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `tanggal_pengajuan`, `tahun_usulan`, `prodi_id`, `versi_id`) VALUES
(6, '2018-06-11', 2003, 13, 1),
(7, '2018-06-23', 2003, 15, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `fakultas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `nama`, `fakultas_id`) VALUES
(13, 'fti 1', 4),
(14, 'fti 2', 4),
(15, 'fe 3', 5),
(16, 'fe 4', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `standar`
--

CREATE TABLE `standar` (
  `id` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `versi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `standar`
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
-- Struktur dari tabel `substandar`
--

CREATE TABLE `substandar` (
  `id` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `standar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `substandar`
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
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `prodi_id`) VALUES
(1, 'Administrator', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 1, NULL),
(2, 'Operator FTI 1', 'opfti1', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3, 13),
(4, 'Test Admin', 'testadmin', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 1, NULL),
(5, 'Test DPM', 'testdpm', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 2, NULL),
(6, 'Test Fe', 'testfe', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3, 15),
(12, 'cobafti1', 'cobafti1', '82652b6d108ee60bbfddccd3e220e1135a6aa793c8103430f64b0c1861ff5d37de92b8980b63b7af42115edd0168702317a88da72bf308d59b6524c156703a84', 3, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `versi`
--

CREATE TABLE `versi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `versi`
--

INSERT INTO `versi` (`id`, `nama`, `tahun`) VALUES
(1, '7 Standar Diploma', 2009),
(7, 'qwrqwrqw', 2003),
(9, '9 Standar', 2017);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `butir_id` (`butir_id`),
  ADD KEY `pengajuan_id` (`pengajuan_id`),
  ADD KEY `substandar_id` (`substandar_id`);

--
-- Indeks untuk tabel `butir`
--
ALTER TABLE `butir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `substandar_id` (`substandar_id`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodi_id` (`prodi_id`),
  ADD KEY `versi_id` (`versi_id`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fakultas_id` (`fakultas_id`);

--
-- Indeks untuk tabel `standar`
--
ALTER TABLE `standar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `versi_id` (`versi_id`);

--
-- Indeks untuk tabel `substandar`
--
ALTER TABLE `substandar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `standar_id` (`standar_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- Indeks untuk tabel `versi`
--
ALTER TABLE `versi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `butir`
--
ALTER TABLE `butir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `standar`
--
ALTER TABLE `standar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `substandar`
--
ALTER TABLE `substandar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `versi`
--
ALTER TABLE `versi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD CONSTRAINT `berkas_ibfk_1` FOREIGN KEY (`butir_id`) REFERENCES `butir` (`id`),
  ADD CONSTRAINT `berkas_ibfk_2` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`),
  ADD CONSTRAINT `berkas_ibfk_3` FOREIGN KEY (`substandar_id`) REFERENCES `substandar` (`id`);

--
-- Ketidakleluasaan untuk tabel `butir`
--
ALTER TABLE `butir`
  ADD CONSTRAINT `butir_ibfk_1` FOREIGN KEY (`substandar_id`) REFERENCES `substandar` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`versi_id`) REFERENCES `versi` (`id`);

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`);

--
-- Ketidakleluasaan untuk tabel `standar`
--
ALTER TABLE `standar`
  ADD CONSTRAINT `standar_ibfk_1` FOREIGN KEY (`versi_id`) REFERENCES `versi` (`id`);

--
-- Ketidakleluasaan untuk tabel `substandar`
--
ALTER TABLE `substandar`
  ADD CONSTRAINT `substandar_ibfk_1` FOREIGN KEY (`standar_id`) REFERENCES `standar` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
