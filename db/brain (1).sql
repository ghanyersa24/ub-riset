-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 08:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brain`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspek_bisnis`
--

CREATE TABLE `aspek_bisnis` (
  `produk_id` int(10) UNSIGNED NOT NULL,
  `calon_perusahaan_id` int(10) UNSIGNED NOT NULL,
  `kompetitor` text DEFAULT NULL,
  `target_pasar` text DEFAULT NULL,
  `pangsa_pasar` text DEFAULT NULL,
  `dampak_sosial_ekonomi` text DEFAULT NULL,
  `biaya_produksi_harga` text DEFAULT NULL,
  `rencana_pemasaran` text DEFAULT NULL,
  `bmc` tinytext DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `calon_perusahaan`
--

CREATE TABLE `calon_perusahaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `kota_kabupaten` varchar(100) DEFAULT NULL,
  `alamat` tinytext DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foto_kegiatan`
--

CREATE TABLE `foto_kegiatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `foto` tinytext DEFAULT NULL,
  `keterangan` tinytext DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `foto` tinytext DEFAULT NULL,
  `keterangan` tinytext DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(10) UNSIGNED NOT NULL,
  `fcm` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventor`
--

CREATE TABLE `inventor` (
  `produk_id` int(10) UNSIGNED NOT NULL,
  `users_id` varchar(15) NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `izin_produk`
--

CREATE TABLE `izin_produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` enum('belum diperoleh','permohonan','disetujui') DEFAULT NULL,
  `tahun_perolehan` year(4) DEFAULT NULL,
  `no_izin` varchar(30) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `lembaga` varchar(100) DEFAULT NULL,
  `file` tinytext DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `kategori` tinytext DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kekayaan_intelektual`
--

CREATE TABLE `kekayaan_intelektual` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `deskripsi` tinytext DEFAULT NULL,
  `status_perolehan` enum('belum diperoleh','permohonan','disetujui') DEFAULT NULL,
  `no_pemohon` varchar(40) DEFAULT NULL,
  `file_formulir` tinytext DEFAULT NULL,
  `no_sertifikat` varchar(40) DEFAULT NULL,
  `file` tinytext DEFAULT NULL,
  `pemegang` varchar(50) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengujian`
--

CREATE TABLE `pengujian` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `status` enum('sedang dilakukan','belum dilakukan','sudah dilakukan') DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `lembaga` varchar(100) DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `hasil` text DEFAULT NULL,
  `created_by` char(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` char(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_produk` tinytext NOT NULL,
  `bidang` enum('Pangan','Energi','Transportasi','Rekayasa Keteknikan','Kesehatan','Pertahanan Keamanan','Material Maju','Kemaritiman','Sosial Budaya') NOT NULL,
  `kategori` tinytext NOT NULL,
  `jenis` enum('digital','non digital') NOT NULL,
  `produksi_barang_fisik` enum('ada','tidak') DEFAULT NULL,
  `logo_produk` tinytext DEFAULT NULL,
  `deskripsi_singkat` tinytext DEFAULT NULL,
  `deskripsi_lengkap` text DEFAULT NULL,
  `latar_belakang` text DEFAULT NULL,
  `keterbaruan_produk` text DEFAULT NULL,
  `masalah` text DEFAULT NULL,
  `solusi` text DEFAULT NULL,
  `spesifikasi_teknis` text DEFAULT NULL,
  `kegunaan_manfaat` text DEFAULT NULL,
  `keunggulan_keunikan` text DEFAULT NULL,
  `kesiapan_teknologi` enum('masih riset','prototype','siap komersil') DEFAULT NULL,
  `kepemilikan_teknologi` enum('sendiri','instansi') DEFAULT NULL,
  `pemilik_teknologi` tinytext DEFAULT NULL,
  `teknologi_yang_dikembangkan` text DEFAULT NULL,
  `rencana_pengembangan` text DEFAULT NULL,
  `tautan_video` tinytext DEFAULT NULL,
  `media_sosial` tinytext DEFAULT NULL,
  `website` varchar(30) DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `bidang`, `kategori`, `jenis`, `produksi_barang_fisik`, `logo_produk`, `deskripsi_singkat`, `deskripsi_lengkap`, `latar_belakang`, `keterbaruan_produk`, `masalah`, `solusi`, `spesifikasi_teknis`, `kegunaan_manfaat`, `keunggulan_keunikan`, `kesiapan_teknologi`, `kepemilikan_teknologi`, `pemilik_teknologi`, `teknologi_yang_dikembangkan`, `rencana_pengembangan`, `tautan_video`, `media_sosial`, `website`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Repellendus In temp', 'Energi', '[\"Energi\",\"Rekayasa Keteknikan\"]', 'non digital', 'ada', NULL, 'Iusto aut eaque labo', '<p><strong>asd asdasdsad</strong><i><strong> sadsadsad </strong>sdsad aaaaaaaaaaaaaaaaaaaaaaaaaaaa</i></p><blockquote><p>asdasdsadsadas</p></blockquote>', '<ul><li>asd asddas</li><li>sad</li><li>sda</li><li>sad</li><li>sad</li><li>sad</li><li>sad</li><li>&nbsp;</li></ul>', '', '<ul><li>asd</li><li>sad</li><li>asd</li><li>asd</li><li>asd</li><li>ads</li><li>asd</li><li>&nbsp;</li></ul>', '<p>s adsadsadsadsadsadsdasdasd</p>', '', '', '', 'prototype', 'instansi', 'Aut ex qui voluptate', '', '', 'Magnam dignissimos e', 'Quos laborum Enim e', 'https://www.cuwajijijym.info', '', '2020-05-01 23:08:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `produk_id` int(10) UNSIGNED NOT NULL,
  `users_id` varchar(15) NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roadmap`
--

CREATE TABLE `roadmap` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `nama` tinytext DEFAULT NULL,
  `tahun_mulai` year(4) DEFAULT NULL,
  `tahun_selesai` year(4) DEFAULT NULL,
  `sumber_pendanaan` varchar(50) DEFAULT NULL,
  `skema` varchar(50) DEFAULT NULL,
  `nilai_pendanaan` int(11) DEFAULT NULL,
  `aktivitas` text DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `hasil` text DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seen`
--

CREATE TABLE `seen` (
  `produk_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sertifikasi`
--

CREATE TABLE `sertifikasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` enum('belum diperoleh','permohonan','disetujui') DEFAULT NULL,
  `tahun_perolehan` year(4) DEFAULT NULL,
  `no_sertifikat` varchar(30) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `lembaga_penerbit` varchar(100) DEFAULT NULL,
  `file_sertifikasi` tinytext DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` varchar(15) NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `ulasan` text NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(15) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto_ktp` tinytext DEFAULT NULL,
  `cv` tinytext DEFAULT NULL,
  `foto` tinytext DEFAULT NULL,
  `pendidikan_terakhir` enum('SD','SMP/Sederajat','SMA/Sederajat','D1','D2','D3','S1','S2','S3') DEFAULT NULL,
  `status` enum('mahasiswa','dosen') DEFAULT NULL,
  `fcm` varchar(255) DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspek_bisnis`
--
ALTER TABLE `aspek_bisnis`
  ADD PRIMARY KEY (`produk_id`,`calon_perusahaan_id`),
  ADD KEY `aspek_bisnis_FKIndex1` (`produk_id`),
  ADD KEY `aspek_bisnis_FKIndex2` (`calon_perusahaan_id`);

--
-- Indexes for table `calon_perusahaan`
--
ALTER TABLE `calon_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto_kegiatan_FKIndex1` (`produk_id`);

--
-- Indexes for table `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto_produk_FKIndex1` (`produk_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventor`
--
ALTER TABLE `inventor`
  ADD PRIMARY KEY (`produk_id`,`users_id`),
  ADD KEY `produk_has_users_FKIndex1` (`produk_id`),
  ADD KEY `produk_has_users_FKIndex2` (`users_id`);

--
-- Indexes for table `izin_produk`
--
ALTER TABLE `izin_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `izin_produk_FKIndex1` (`produk_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kekayaan_intelektual`
--
ALTER TABLE `kekayaan_intelektual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kekayaan_intelektual_FKIndex1` (`produk_id`);

--
-- Indexes for table `pengujian`
--
ALTER TABLE `pengujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengujian_FKIndex1` (`produk_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`produk_id`,`users_id`),
  ADD KEY `produk_has_users_FKIndex1` (`produk_id`),
  ADD KEY `produk_has_users_FKIndex2` (`users_id`);

--
-- Indexes for table `roadmap`
--
ALTER TABLE `roadmap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roadmap_FKIndex1` (`produk_id`);

--
-- Indexes for table `seen`
--
ALTER TABLE `seen`
  ADD KEY `seen_FKIndex1` (`produk_id`);

--
-- Indexes for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sertifikasi_FKIndex1` (`produk_id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasan_FKIndex1` (`produk_id`),
  ADD KEY `ulasan_FKIndex2` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_perusahaan`
--
ALTER TABLE `calon_perusahaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_produk`
--
ALTER TABLE `foto_produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `izin_produk`
--
ALTER TABLE `izin_produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kekayaan_intelektual`
--
ALTER TABLE `kekayaan_intelektual`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengujian`
--
ALTER TABLE `pengujian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roadmap`
--
ALTER TABLE `roadmap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aspek_bisnis`
--
ALTER TABLE `aspek_bisnis`
  ADD CONSTRAINT `aspek_bisnis_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `aspek_bisnis_ibfk_2` FOREIGN KEY (`calon_perusahaan_id`) REFERENCES `calon_perusahaan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  ADD CONSTRAINT `foto_kegiatan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD CONSTRAINT `foto_produk_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inventor`
--
ALTER TABLE `inventor`
  ADD CONSTRAINT `inventor_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventor_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `izin_produk`
--
ALTER TABLE `izin_produk`
  ADD CONSTRAINT `izin_produk_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kekayaan_intelektual`
--
ALTER TABLE `kekayaan_intelektual`
  ADD CONSTRAINT `kekayaan_intelektual_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pengujian`
--
ALTER TABLE `pengujian`
  ADD CONSTRAINT `pengujian_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `roadmap`
--
ALTER TABLE `roadmap`
  ADD CONSTRAINT `roadmap_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `seen`
--
ALTER TABLE `seen`
  ADD CONSTRAINT `seen_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  ADD CONSTRAINT `sertifikasi_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
