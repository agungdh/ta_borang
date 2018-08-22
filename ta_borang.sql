-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 22, 2018 at 05:22 PM
-- Server version: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 5.6.36

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
  `nama` varchar(50) NOT NULL,
  `substandar_id` int(11) DEFAULT NULL,
  `butir_id` int(11) DEFAULT NULL,
  `pengajuan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `butir`
--

CREATE TABLE `butir` (
  `id` int(11) NOT NULL,
  `nomor` varchar(9) NOT NULL,
  `nama` text NOT NULL,
  `substandar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `butir`
--

INSERT INTO `butir` (`id`, `nomor`, `nama`, `substandar_id`) VALUES
(7, '1.1.1', 'Jelaskan mekanisme penyusunan visi, misi, tujuan dan sasaran program studi, serta pihak-pihak yang dilibatkan.', 12),
(8, '1.1.2', 'Sasaran dan strategi pencapaian', 12),
(9, '1.2.1', 'Uraikan upaya penyebaran/sosialisasi visi, misi dan tujuan program studi serta pemahaman sivitas akademika (dosen dan mahasiswa) dan tenaga kependidikan.', 13),
(10, '2.1.1', 'Uraikan secara ringkas sistem dan pelaksanaan tata pamong di program studi untuk  membangun sistem tata pamong yang kredibel, transparan, akuntabel, bertanggung jawab dan adil.', 14),
(11, '2.2.1', 'Jelaskan pola kepemimpinan dalam program studi, mencakup informasi tentang kepemimpinan operasional, kepemimpinan organisasi, dan kepemimpinan publik. ', 15),
(12, '2.3.1', 'Jelaskan sistem pengelolaan program studi serta dokumen pendukungnya', 16),
(13, '2.4.1', 'Jelaskan penjaminan mutu pada program studi yang mencakup informasi tentang kebijakan, sistem dokumentasi, dan tindak lanjut atas laporan pelaksanaannya. ', 17),
(14, '2.5.1', 'jelaskan isi umpan balik dan tindak lanjutnya dari dosen, mahasiswa, alumni dan pengguna lulusan', 18),
(15, '2.6.1', 'Jelaskan upaya untuk menjamin keberlanjutan (sustainability) program studi ini berikut hasilnya', 19),
(16, '3.1.1', 'Tuliskan data seluruh mahasiswa reguler(1) dan lulusannya dalam lima tahun terakhir ', 20),
(17, '3.1.2', 'Sebutkan pencapaian prestasi/reputasi mahasiswa dalam lima tahun terakhir di bidang akademik dan non-akademik (misalnya prestasi dalam penelitian dan lomba karya ilmiah, olahraga, dan seni). ', 20),
(18, '3.1.3', 'Tuliskan data jumlah mahasiswa reguler tujuh tahun terakhir ', 20),
(19, '3.1.4', 'Tuliskan data jumlah mahasiswa reguler lima tahun terakhir ', 20),
(20, '3.1.5', 'Tuliskan data jumlah mahasiswa regular tiga tahun ', 20),
(21, '3.1.6', 'Tuliskan data jumlah mahasiswa regular dua tahun ', 20),
(22, '3.4.1', 'Evaluasi kinerja lulusan oleh pihak pengguna lulusan', 23),
(23, '3.4.2', 'Jelaskan keahlian/kemampuan yang merupakan keunggulan lulusan program  studi ini.', 23),
(24, '3.4.3', 'Rata-rata waktu tunggu lulusan lima tahun terakhir untuk memperoleh pekerjaan yang pertama = … bulan.  Jelaskan bagaimana data ini diperoleh. ', 23),
(25, '3.4.4', 'Persentase lulusan lima tahun terakhir yang bekerja pada bidang yang sesuai dengan keahliannya = …%.  Jelaskan bagaimana data ini diperoleh. ', 23),
(26, '3.4.5', 'Sebutkan lembaga (instansi/industri) yang memesan lulusan untuk bekerja di lembaga  tersebut dalam lima tahun terakhir.', 23),
(27, '3.5.1', 'Jelaskan program kegiatan alumni selama lima tahun terakhir dan hasilnya untuk mendukung kemajuan program studi', 24),
(28, '4.1.1', 'Jelaskan sistem seleksi/perekrutan, penempatan, pengembangan, retensi, dan pemberhentian dosen dan tenaga kependidikan untuk menjamin mutu penyelenggaraan program akademik (termasuk informasi tentang ketersediaan pedoman tertulis).', 25),
(29, '4.2.1', 'Jelaskan sistem monitoring dan evaluasi, serta rekam jejak kinerja akademik dosen dan kinerja tenaga kependidikan (termasuk informasi tentang ketersediaan pedoman tertulis).', 26),
(30, '4.3.1', 'Data dosen tetap yang bidang keahliannya sesuai dengan bidang PS', 27),
(31, '4.3.2', 'Data dosen tetap yang bidang keahliannya di luar bidang PS', 27),
(32, '4.3.3', 'Aktivitas dosen tetap yang bidang bidang keahliannya sesuai dengan PS dinyatakan dalam SKS rata-rata per semester pada satu tahun akademik terakhir, diisi dengan perhitungan sesuai SK Dirjen DIKTI no. 48 tahun 1983 (12 SKS setara dengan 36 jam kerja per minggu)', 27),
(33, '4.3.4', 'Tuliskan data aktivitas mengajar dosen tetap yang bidang keahliannya sesuai dengan PS,  dalam satu tahun akademik terakhir di PS ini ', 27),
(34, '4.3.5', 'Tuliskan data aktivitas mengajar dosen tetap yang bidang keahliannya di luar PS,  dalam satu tahun akademik terakhir di PS ini ', 27),
(35, '4.4.1', 'Tuliskan data dosen tidak tetap pada ', 28),
(36, '4.4.2', 'Tuliskan data aktivitas mengajar dosen tidak tetap pada satu tahun terakhir di PS ini', 28),
(37, '4.5.1', 'Kegiatan tenaga ahli/pakar sebagai pembicara dalam seminar/pelatihan, pembicara tamu, dsb, dari luar PT sendiri (tidak termasuk dosen tidak tetap)', 29),
(38, '4.5.2', 'Peningkatan kemampuan dosen tetap melalui program tugas belajar dalam bidang yang sesuai dengan bidang PS', 29),
(39, '4.5.3', 'Kegiatan dosen tetap yang bidang keahliannya sesuai dengan PS dalam seminar ilmiah/lokakarya/penataran/workshop/ pagelaran/ pameran/peragaan yang tidak hanya melibatkan dosen PT sendiri', 29),
(40, '4.5.4', 'Sebutkan pencapaian prestasi/reputasi dosen (misalnya prestasi dalam pendidikan, penelitian dan pelayanan/pengabdian kepada masyarakat).', 29),
(41, '4.5.5', 'Sebutkan keikutsertaan dosen tetap dalam organisasi keilmuan atau organisasi profesi.', 29),
(42, '4.6.1', 'Tuliskan data tenaga kependidikan  yang ada di PS, Jurusan, Fakultas atau PT yang melayani mahasiswa PS ', 30),
(43, '4.6.2', 'Jelaskan upaya yang telah dilakukan PS dalam meningkatkan kualifikasi dan kompetensi tenaga kependidikan. ', 30),
(44, '5.1.1', 'Kompetensi', 31),
(45, '5.1.2', 'Struktur Kurikulum', 31),
(46, '5.2.1', 'Mekanisme Monitoring Perkuliahan', 32),
(47, '5.2.2', 'Berapa waktu yang disediakan untuk pelaksanaan real proses belajar mengajar yang diselenggarakan oleh program studi ', 32),
(48, '5.2.3', 'Lampirkan contoh soal ujian dalam 1 tahun terakhir untuk 5 mata kuliah keahlian berikut silabusnya.', 32),
(49, '5.3.1', 'Jelaskan mekanisme peninjauan kurikulum dan pihak-pihak yang dilibatkan dalam proses peninjauan tersebut.  ', 33),
(50, '5.3.2', 'Tuliskan hasil peninjauan, khusus untuk silabus/SAP mata kuliah mengikuti format tabel berikut.', 33),
(51, '5.4.1', 'Tuliskan nama dosen pembimbing akademik /wali dan jumlah mahasiswa yang dibimbingnya ', 34),
(52, '5.4.2', 'Jelaskan proses pembimbingan akademik  yang diterapkan pada Program Studi ini ', 34),
(53, '5.5.1', 'Pelaksanaan pembimbingan karya/tugas akhir.', 35),
(54, '5.6.1', 'Uraikan upaya perbaikan pembelajaran serta hasil yang telah dilakukan dan dicapai dalam tiga tahun terakhir dan hasilnya.', 36),
(55, '5.7.1', 'Jelaskan kebijakan tentang suasana akademik (otonomi keilmuan, kebebasan akademik, kebebasan mimbar akademik) serta ketersediaan dokumen pendukungnya.', 37),
(56, '5.7.2', 'Jelaskan ketersediaan dan jenis prasarana, sarana dan dana yang memungkinkan terciptanya interaksi akademik antara sivitas akademika, serta status kepemilikan prasarana dan sarana.', 37),
(57, '5.7.3', 'Jelaskan program dan kegiatan di dalam dan di luar proses pembelajaran, yang dilaksanakan baik di dalam maupun di luar kelas,  untuk menciptakan suasana akademik yang kondusif (misalnya seminar, simposium, lokakarya, bedah buku, penelitian bersama, ', 37),
(58, '5.7.4', 'Jelaskan interaksi akademik antara dosen-mahasiswa, antar mahasiswa, serta antar dosen serta hasilnya.', 37),
(59, '6.1.1', 'Jelaskan keterlibatan PS dalam perencanaan anggaran dan pengelolaan dana.', 40),
(60, '6.2.1', 'Tuliskan realisasi perolehan dan alokasi dana (termasuk hibah) dalam juta rupiah termasuk gaji,  selama tiga tahun terakhir', 41),
(61, '6.2.2', 'Tuliskan dana untuk kegiatan penelitian pada tiga tahun terakhir yang melibatkan dosen yang bidang keahliannya sesuai dengan program studi', 41),
(62, '6.2.3', 'Tuliskan dana yang diperoleh dari/untuk kegiatan pelayanan/pengabdian kepada masyarakat pada tiga tahun terakhir ', 41),
(63, '6.3.1', 'Tuliskan data ruang kerja dosen tetap yang bidang keahliannya sesuai dengan PS ', 42),
(64, '6.3.2', 'Tuliskan data prasarana (kantor, ruang kelas, ruang laboratorium, studio, ruang perpustakaan, kebun percobaan, dsb. kecuali  ruang dosen) yang dipergunakan PS dalam proses belajar mengajar ', 42),
(65, '6.3.3', 'Tuliskan data prasarana lain yang menunjang (misalnya tempat olah raga, ruang bersama, ruang himpunan mahasiswa, poliklinik) ', 42),
(66, '6.4.1', 'Pustaka (buku teks, karya ilmiah, dan jurnal; termasuk juga dalam bentuk CD-ROM dan media lainnya) Tuliskan rekapitulasi jumlah ketersediaan pustaka yang relevan dengan bidang PS ', 43),
(67, '6.4.2', 'Sebutkan sumber-sumber pustaka di lembaga lain (lembaga perpustakaan lainnya) yang biasa diakses/dimanfaatkan oleh dosen dan mahasiswa program studi ini.  Jika ada kerjasama, bukti agar disiapkan saat asesmen lapangan.', 43),
(68, '6.4.3', 'Tuliskan peralatan utama yang digunakan di laboratorium (tempat praktikum, bengkel, studio, ruang simulasi, rumah sakit, puskesmas/balai kesehatan, green house, lahan untuk pertanian, dan sejenisnya) yang dipergunakan dalam proses pembelajaran di jurusan/fakultas/PT', 43),
(69, '6.5.1', 'Jelaskan sistem informasi dan fasilitas yang digunakan oleh program studi untuk proses pembelajaran (hardware, software, e-learning, akses on-line ke perpustakaan, dll.).', 44),
(70, '6.5.2', 'Beri tanda √ pada kolom yang sesuai dengan aksesibilitas tiap jenis data', 44),
(71, '7.1.1', 'Tuliskan jumlah judul penelitian* yang sesuai dengan bidang keilmuan PS, yang dilakukan oleh dosen tetap yang bidang keahliannya sesuai dengan PS selama tiga tahun terakhir ', 45),
(72, '7.1.2', 'Tuliskan judul artikel ilmiah/karya ilmiah/karya seni/buku yang dihasilkan selama tiga tahun terakhir oleh dosen tetap yang bidang keahliannya sesuai dengan ', 45),
(73, '7.1.3', 'Sebutkan karya dosen dan atau mahasiswa program studi yang telah memperoleh Hak atas Kekayaan Intelektual (Paten/HaKI) atau karya yang mendapat pengakuan/penghargaan dari lembaga nasional/ internasional selama tiga tahun terakhir.', 45),
(74, '7.2.1', 'Tuliskan jumlah kegiatan pelayanan/pengabdian kepada masyarakat (*) yang sesuai dengan bidang keilmuan PS selama tiga tahun terakhir yang dilakukan oleh dosen tetap yang bidang keahliannya sesuai dengan PS ', 46),
(76, '7.2.2', 'Adakah mahasiswa yang dilibatkan dalam kegiatan pelayanan/pengabdian kepada masyarakat dalam tiga tahun terakhir', 46),
(77, '7.3.1', 'Tuliskan instansi dalam negeri yang menjalin kerjasama* yang terkait dengan program studi/jurusan dalam tiga tahun terakhir.', 47),
(78, '7.3.2', 'Tuliskan instansi luar negeri yang menjalin kerjasama* yang terkait dengan program studi/jurusan dalam tiga tahun terakhir.', 47);

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
('Aplikasi Pengumpulan Data Pengajuan Akreditasi', 'APDPA');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama`) VALUES
(4, 'Fakultas Teknologi Informasi'),
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
(5, '2018-08-22', 2009, 13, 10);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `fakultas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama`, `fakultas_id`) VALUES
(13, 'Teknik Informatika', 4),
(14, 'Sistem Informasi', 4),
(15, 'Manajemen Keuangan', 5),
(16, 'Manajemen Pemasaran', 5);

-- --------------------------------------------------------

--
-- Table structure for table `standar`
--

CREATE TABLE `standar` (
  `id` int(11) NOT NULL,
  `nomor` varchar(3) NOT NULL,
  `nama` text NOT NULL,
  `versi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `standar`
--

INSERT INTO `standar` (`id`, `nomor`, `nama`, `versi_id`) VALUES
(12, '1', 'Visi, misi, tujuan dan sasaran, serta strategi pencapaian ', 10),
(13, '2', 'Tata pamong,  kepemimpinan, sistem pengelolaan, dan penjaminan mutuTata pamong,  kepemimpinan, sistem pengelolaan, dan penjaminan mutu', 10),
(14, '3', 'Mahasiswa dan lulusan ', 10),
(15, '4', 'Sumber daya manusia ', 10),
(16, '5', 'Kurikulum, pembelajaran, dan suasana akademik', 10),
(17, '6', 'Pembiayaan, sarana dan prasarana, serta sistem informasi', 10),
(18, '7', 'Penelitian dan pelayanan/pengabdian kepada masyarakat, dan kerjasama', 10);

-- --------------------------------------------------------

--
-- Table structure for table `substandar`
--

CREATE TABLE `substandar` (
  `id` int(11) NOT NULL,
  `nomor` varchar(6) NOT NULL,
  `nama` text NOT NULL,
  `standar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `substandar`
--

INSERT INTO `substandar` (`id`, `nomor`, `nama`, `standar_id`) VALUES
(12, '1.1', '	Visi, Misi, Tujuan, dan Sasaran serta Strategi Pencapaian', 12),
(13, '1.2', '	Sosialisasi ', 12),
(14, '2.1', 'Sistem Tata Pamong', 13),
(15, '2.2', 'Kepemimpinan', 13),
(16, '2.3', 'Sistem Pengelolaan', 13),
(17, '2.4', 'Penjaminan Mutu', 13),
(18, '2.5', 'Umpan Balik', 13),
(19, '2.6', 'Keberlanjutan', 13),
(20, '3.1', 'Profil Mahasiswa dan Lulusan', 14),
(21, '3.2', 'Layanan kepada Mahasiswa  ', 14),
(22, '3.3', 'Jelaskan usaha-usaha program studi/jurusan mencarikan tempat kerja bagi lulusannya ', 14),
(23, '3.4', 'Evaluasi Lulusan', 14),
(24, '3.5', 'Partisipasi Alumni', 14),
(25, '4.1', 'Sistem Seleksi dan Pengembangan', 15),
(26, '4.2', 'Monitoring dan Evaluasi', 15),
(27, '4.3', 'Dosen Tetap ', 15),
(28, '4.4', 'Dosen Tidak Tetap', 15),
(29, '4.5', 'Upaya Peningkatan Sumber Daya Manusia (SDM) dalam Tiga Tahun Terakhir', 15),
(30, '4.6', 'Tenaga kependidikan', 15),
(31, '5.1', 'Kurikulum', 16),
(32, '5.2', 'Pelaksanaan Proses Pembelajaran', 16),
(33, '5.3', 'Peninjauan kurikulum dalam 5 tahun terakhir ', 16),
(34, '5.4', 'Sistem Pembimbingan Akademik', 16),
(35, '5.5', 'Karya/tugas Akhir ', 16),
(36, '5.6', 'Upaya Perbaikan Pembelajaran', 16),
(37, '5.7', 'Peningkatan Suasana Akademik', 16),
(38, '5.8', 'Pembekalan Etika Profesi', 16),
(39, '5.9', 'Keselamatan Kerja', 16),
(40, '6.1', 'Pengelolaan Dana', 17),
(41, '6.2', 'Perolehan dan Alokasi Dana', 17),
(42, '6.3', 'Prasarana', 17),
(43, '6.4', 'Sarana Pelaksanaan Kegiatan Akademik', 17),
(44, '6.5', 'Sistem Informasi', 17),
(45, '7.1', 'Penelitian Dosen Tetap yang Bidang Keahliannya Sesuai dengan PS', 18),
(46, '7.2', 'Kegiatan Pelayanan/Pengabdian kepada Masyarakat (PkM)', 18),
(47, '7.3', 'Kegiatan Kerjasama dengan Instansi Lain ', 18);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` int(1) NOT NULL,
  `prodi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `prodi_id`) VALUES
(1, 'Administrator', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 1, NULL),
(5, 'DPM', 'dpm', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 2, NULL),
(6, 'OP MK', 'opmk', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3, 15),
(7, 'OP SI', 'opsi', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3, 14),
(8, 'OP TI', 'opti', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `versi`
--

CREATE TABLE `versi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `versi`
--

INSERT INTO `versi` (`id`, `nama`, `tahun`) VALUES
(10, '7 Standar Diploma', 2009);

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
,`prodi` varchar(50)
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `butir`
--
ALTER TABLE `butir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `standar`
--
ALTER TABLE `standar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `substandar`
--
ALTER TABLE `substandar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `versi`
--
ALTER TABLE `versi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
