-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2020 pada 01.57
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

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

DELIMITER $$
--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `id` (`identifier` VARCHAR(15)) RETURNS INT(11) NO SQL
RETURN (SELECT `id` FROM `users` WHERE `users`.`identifier`=identifier)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `id` int(10) UNSIGNED NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `jurusan` tinytext NOT NULL,
  `prodi` tinytext NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` tinytext NOT NULL,
  `status` enum('activate','deactivate') NOT NULL,
  `foto` tinytext DEFAULT NULL,
  `bukti` tinytext NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alumni`
--

INSERT INTO `alumni` (`id`, `nim`, `nama_lengkap`, `fakultas`, `jurusan`, `prodi`, `email`, `password`, `status`, `foto`, `bukti`, `kontak`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '434564546546234', 'Ut quisquam vel dolo', 'FK', 'Velit quis tempore ', 'Voluptatum facere en', 'ghany.ersa@bigio.id', '$2y$10$E4g/VqmktmGk/JgQlY..r.ajp/d8IV8XWQ1KdP264NNeYj3Gpm4xC', 'activate', NULL, 'http://localhost/ub-riset/uploads/bukti/FK_Ut_quisquam_vel_dolo_2020-06-21_05_21.pdf', '20', '', '2020-06-21 05:21:27', '16', '2020-06-20 23:35:08'),
(2, '434564546546234', 'Ut quisquam vel dolo', 'FK', 'Velit quis tempore ', 'Voluptatum facere en', 'ghany.ersa@bigio.id', '$2y$10$oVjEgnSr5eqIOrcRuKTLhOSgI4qRfcDGfv2MHSe1dfhUs0/hB4B7e', 'deactivate', NULL, 'http://localhost/ub-riset/uploads/bukti/FK_Ut_quisquam_vel_dolo_2020-06-21_05_22.pdf', '20', '', '2020-06-21 05:22:24', '', '2020-06-20 22:22:24'),
(3, '165150401111060', 'Assumenda tenetur ea', 'Vokasi', 'Nisi placeat volupt', 'Blanditiis dolore al', 'ghany.ersa@bigio.id', '$2y$10$HBT40ahqjsCgrvrvYYbU5.VgpF9s.S3QAGHs/KwsSqJG8.ITLbE6.', 'activate', NULL, 'http://localhost/ub-riset/uploads/bukti/Vokasi_Assumenda_tenetur_ea_2020-06-21_05_33.pdf', '37', '', '2020-06-21 05:33:43', '16', '2020-06-20 23:52:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset`
--

CREATE TABLE `aset` (
  `id` int(10) UNSIGNED NOT NULL,
  `perusahaan_id` int(10) UNSIGNED NOT NULL,
  `nama_aset` varchar(100) NOT NULL,
  `tahun_perolehan` year(4) DEFAULT NULL,
  `nilai_aset` int(10) UNSIGNED DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspek_bisnis`
--

CREATE TABLE `aspek_bisnis` (
  `produk_id` int(10) UNSIGNED NOT NULL,
  `kompetitor` text DEFAULT NULL,
  `target_pasar` text DEFAULT NULL,
  `pangsa_pasar` text DEFAULT NULL,
  `dampak_sosial_ekonomi` text DEFAULT NULL,
  `biaya_produksi_harga` text DEFAULT NULL,
  `rencana_pemasaran` text DEFAULT NULL,
  `bmc` tinytext DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cluster`
--

CREATE TABLE `cluster` (
  `id` int(10) UNSIGNED NOT NULL,
  `cluster` varchar(30) DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cluster`
--

INSERT INTO `cluster` (`id`, `cluster`, `is_delete`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Penilaian TKT/Katsinov', 0, '', '2020-06-13 13:45:42', '16', '2020-06-13 17:12:58'),
(3, 'Hello Word', 1, '16', '2020-06-14 00:14:09', '16', '2020-06-14 12:14:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dasar`
--

CREATE TABLE `data_dasar` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `status_usaha` enum('Masih Berjalan','Sudah Berhenti') NOT NULL,
  `target_pasar` text DEFAULT NULL,
  `kompetitor` text DEFAULT NULL,
  `jangkauan` text DEFAULT NULL,
  `kanal_pemasaran` text DEFAULT NULL,
  `dampak_sosial` text DEFAULT NULL,
  `skema_harga` text DEFAULT NULL,
  `harga_produksi` int(10) UNSIGNED NOT NULL,
  `keuangan` tinytext DEFAULT NULL,
  `bmc` tinytext DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_kegiatan`
--

CREATE TABLE `foto_kegiatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(20) NOT NULL,
  `foto` tinytext DEFAULT NULL,
  `keterangan` tinytext DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(20) NOT NULL,
  `foto` tinytext DEFAULT NULL,
  `keterangan` tinytext DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `foto_produk`
--

INSERT INTO `foto_produk` (`id`, `produk_id`, `title`, `foto`, `keterangan`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 34, 'inovasiku', 'https://inovasi.ub.ac.id/apps/uploads/inovasi/34/foto/inovasiku-foto-34_2020-05-31_12_45.png', '<p>foto produk</p>', '3', '2020-05-31 12:45:44', '3', '2020-05-31 05:45:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guest`
--

CREATE TABLE `guest` (
  `id` int(10) UNSIGNED NOT NULL,
  `fcm` varchar(255) DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `informasi` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventor`
--

CREATE TABLE `inventor` (
  `produk_id` int(10) UNSIGNED NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inventor`
--

INSERT INTO `inventor` (`produk_id`, `users_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 19, '19', '2020-05-27 13:53:15', '19', '2020-05-27 06:53:15'),
(2, 18, '18', '2020-05-27 14:33:31', '18', '2020-05-27 07:33:31'),
(3, 18, '18', '2020-05-27 14:35:29', '18', '2020-05-27 07:35:29'),
(4, 18, '18', '2020-05-27 14:38:22', '18', '2020-05-27 07:38:22'),
(5, 18, '18', '2020-05-27 14:38:46', '18', '2020-05-27 07:38:46'),
(6, 18, '18', '2020-05-27 14:41:34', '18', '2020-05-27 07:41:34'),
(7, 18, '18', '2020-05-27 14:42:46', '18', '2020-05-27 07:42:46'),
(8, 18, '18', '2020-05-27 14:43:22', '18', '2020-05-27 07:43:22'),
(9, 18, '18', '2020-05-27 14:44:48', '18', '2020-05-27 07:44:48'),
(17, 18, '18', '2020-05-27 15:14:03', '18', '2020-05-27 08:14:03'),
(18, 31, '31', '2020-05-27 21:35:55', '31', '2020-05-27 14:35:55'),
(19, 18, '18', '2020-05-28 07:48:00', '18', '2020-05-28 00:48:00'),
(20, 3, '48', '2020-05-29 15:52:34', '48', '2020-05-29 08:52:34'),
(20, 48, '48', '2020-05-29 15:49:49', '48', '2020-05-29 08:49:49'),
(21, 25, '25', '2020-05-29 18:32:39', '25', '2020-05-29 11:32:39'),
(22, 36, '36', '2020-05-29 19:22:08', '36', '2020-05-29 12:22:08'),
(23, 34, '34', '2020-05-29 20:14:00', '34', '2020-05-29 13:14:00'),
(24, 32, '32', '2020-05-29 21:48:07', '32', '2020-05-29 14:48:07'),
(25, 32, '32', '2020-05-29 21:50:11', '32', '2020-05-29 14:50:11'),
(26, 32, '32', '2020-05-29 21:53:39', '32', '2020-05-29 14:53:39'),
(27, 32, '32', '2020-05-29 21:54:47', '32', '2020-05-29 14:54:47'),
(28, 32, '32', '2020-05-29 21:56:08', '32', '2020-05-29 14:56:08'),
(29, 32, '32', '2020-05-29 21:57:14', '32', '2020-05-29 14:57:14'),
(30, 32, '32', '2020-05-29 21:58:05', '32', '2020-05-29 14:58:05'),
(31, 31, '31', '2020-05-29 22:20:23', '31', '2020-05-29 15:20:23'),
(32, 37, '37', '2020-05-30 09:04:12', '37', '2020-05-30 02:04:12'),
(33, 20, '20', '2020-05-30 20:32:36', '20', '2020-05-30 13:32:36'),
(34, 3, '3', '2020-05-31 11:27:44', '3', '2020-05-31 04:27:44'),
(35, 21, '21', '2020-05-31 15:36:21', '21', '2020-05-31 08:36:21'),
(36, 21, '21', '2020-05-31 15:45:14', '21', '2020-05-31 08:45:14'),
(37, 28, '28', '2020-05-31 16:42:55', '28', '2020-05-31 09:42:55'),
(38, 26, '26', '2020-05-31 16:47:35', '26', '2020-05-31 09:47:35'),
(39, 26, '26', '2020-05-31 16:51:12', '26', '2020-05-31 09:51:12'),
(40, 45, '45', '2020-05-31 17:11:35', '45', '2020-05-31 10:11:35'),
(41, 17, '17', '2020-05-31 17:29:03', '17', '2020-05-31 10:29:03'),
(42, 39, '39', '2020-05-31 19:58:19', '39', '2020-05-31 12:58:19'),
(42, 42, '39', '2020-06-01 13:14:44', '39', '2020-06-01 06:14:44'),
(43, 35, '35', '2020-05-31 23:36:45', '35', '2020-05-31 16:36:45'),
(44, 41, '41', '2020-06-01 12:35:10', '41', '2020-06-01 05:35:10'),
(45, 48, '48', '2020-06-01 13:55:51', '48', '2020-06-01 06:55:51'),
(46, 16, '16', '2020-06-01 16:15:04', '16', '2020-06-01 09:15:04'),
(47, 16, '16', '2020-06-05 09:54:13', '16', '2020-06-05 02:54:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `izin_produk`
--

CREATE TABLE `izin_produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` enum('Belum Diperoleh','Pengajuan Permohonan','Disetujui') DEFAULT NULL,
  `tahun_perolehan` year(4) DEFAULT NULL,
  `no_izin` varchar(30) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `lembaga` varchar(100) DEFAULT NULL,
  `file` tinytext DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kekayaan_intelektual`
--

CREATE TABLE `kekayaan_intelektual` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `deskripsi` tinytext DEFAULT NULL,
  `status_perolehan` enum('Belum Diperoleh','Pengajuan Permohonan','Disetujui') DEFAULT NULL,
  `no_pemohon` varchar(40) DEFAULT NULL,
  `file_formulir` tinytext DEFAULT NULL,
  `no_sertifikat` varchar(40) DEFAULT NULL,
  `file` tinytext DEFAULT NULL,
  `pemegang` varchar(50) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepemilikan`
--

CREATE TABLE `kepemilikan` (
  `id` int(10) UNSIGNED NOT NULL,
  `perusahaan_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tipe` enum('Perseorangan','Kelompok','Perusahaan') NOT NULL,
  `kewarganegaraan` enum('Dalam Negeri','Luar Negeri') NOT NULL,
  `asal_negara` varchar(40) DEFAULT NULL,
  `presentase` float DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `nama_mitra` varchar(100) DEFAULT NULL,
  `mou` tinytext DEFAULT NULL,
  `tujuan` tinytext DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `omset_profit`
--

CREATE TABLE `omset_profit` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `tipe` enum('Omset','Profit') NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `nilai` int(10) UNSIGNED DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasaran`
--

CREATE TABLE `pemasaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `jangkauan` enum('Regional','Nasional','Ekspor') DEFAULT NULL,
  `volume_pemasaran` varchar(15) DEFAULT NULL,
  `nilai_pemasaran` varchar(15) DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `cluster_id` int(10) UNSIGNED NOT NULL,
  `inventor` varchar(100) NOT NULL,
  `slug` tinytext DEFAULT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `bidang` varchar(30) NOT NULL,
  `kategori` tinytext DEFAULT NULL,
  `katsinov` varchar(20) NOT NULL DEFAULT 'belum memenuhi',
  `tkt` varchar(20) NOT NULL DEFAULT 'belum memenuhi',
  `file_katsinov` tinytext DEFAULT NULL,
  `file_tkt` tinytext DEFAULT NULL,
  `status` enum('diajukan','diperiksa','dinilai') NOT NULL,
  `catatan` text NOT NULL,
  `verifikator` varchar(15) DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `produk_id`, `cluster_id`, `inventor`, `slug`, `nama_produk`, `bidang`, `kategori`, `katsinov`, `tkt`, `file_katsinov`, `file_tkt`, `status`, `catatan`, `verifikator`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(6, 46, 3, 'Ghany Abdillah Ersa', '0046-Repudiandae-quia-cup', 'Repudiandae quia cup', 'Energi', '[\"Kesehatan Masyarakat\",\"Management Tools\",\"Pangan Olahan\",\"Peternakan\"]', '4', 'belum memenuhi', 'http://localhost/ub-riset/uploads/inovasi/46/evaluasi/evaluasi_katsinov_2020-06-14_20_04.xls', NULL, 'dinilai', '', '16', '16', '2020-06-14 19:12:19', '16', '2020-06-14 13:41:17'),
(7, 47, 1, 'Ghany Abdillah Ersa', '0047-Aliquam-ad-cupiditat', 'Aliquam ad cupiditat', 'Material Maju', '[\"Alat Kesehatan\",\"Kebencanaan\",\"Keramik Struktural\",\"Kosmetika dan Produk Kecantikan\",\"Material Bio-Katalis\",\"Material untuk Bahan Bangunan\"]', '6', '5', 'http://localhost/ub-riset/uploads/inovasi/47/evaluasi/evaluasi_katsinov_2020-06-14_20_301.xls', 'http://localhost/ub-riset/uploads/inovasi/47/evaluasi/evaluasi_tkt_2020-06-14_20_30.xls', 'dinilai', '', '16', '16', '2020-06-14 19:13:55', '16', '2020-06-14 13:30:55'),
(8, 46, 1, 'Ghany Abdillah Ersa', '0046-Repudiandae-quia-cup', 'Repudiandae quia cup', 'Energi', '[\"Kesehatan Masyarakat\",\"Management Tools\",\"Pangan Olahan\",\"Peternakan\"]', 'belum memenuhi', 'belum memenuhi', NULL, NULL, 'dinilai', '', '16', '16', '2020-06-14 20:06:27', '16', '2020-06-14 13:32:01'),
(9, 46, 1, 'Ghany Abdillah Ersa', '0046-Repudiandae-quia-cup', 'Repudiandae quia cup', 'Energi', '[\"Kesehatan Masyarakat\",\"Management Tools\",\"Pangan Olahan\",\"Peternakan\"]', '4', '1', 'http://localhost/ub-riset/uploads/inovasi/46/evaluasi/evaluasi_katsinov_2020-06-14_20_511.xls', 'http://localhost/ub-riset/uploads/inovasi/46/evaluasi/evaluasi_tkt_2020-06-14_20_51.xls', 'dinilai', '', '16', '16', '2020-06-14 20:34:15', '16', '2020-06-14 13:51:49'),
(10, 46, 1, 'Ghany Abdillah Ersa', '0046-Repudiandae-quia-cup', 'Repudiandae quia cup', 'Energi', '[\"Kesehatan Masyarakat\",\"Management Tools\",\"Pangan Olahan\",\"Peternakan\"]', 'belum memenuhi', 'belum memenuhi', NULL, NULL, 'diperiksa', '', '16', '16', '2020-06-14 21:01:16', '16', '2020-06-14 14:01:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengujian`
--

CREATE TABLE `pengujian` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `status` enum('Sedang Dilakukan','Belum Dilakukan','Sudah Dilakukan') DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `lembaga` varchar(100) DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `hasil` text DEFAULT NULL,
  `created_by` char(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` char(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `users_id` bigint(20) NOT NULL,
  `perusahaan_id` int(10) UNSIGNED NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`users_id`, `perusahaan_id`, `jabatan`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(18, 1, 'CEO', '18', '2020-05-27 14:40:58', '18', '2020-05-27 07:40:58'),
(18, 2, 'CEO', '18', '2020-05-27 14:43:36', '18', '2020-05-27 07:43:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jumlah` varchar(15) DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `slug` tinytext DEFAULT NULL,
  `alamat` tinytext DEFAULT NULL,
  `nama_pendiri` varchar(100) NOT NULL,
  `tahun_berdiri` year(4) DEFAULT NULL,
  `bentuk_usaha` enum('CV','PT','Belum memiliki badan usaha') NOT NULL,
  `status_kantor` enum('Milik sendiri','Sewa','Berbagi dengan perusahaan lain') NOT NULL,
  `alamat_kantor` tinytext DEFAULT NULL,
  `kota_kabupaten` varchar(100) DEFAULT NULL,
  `logo` tinytext DEFAULT NULL,
  `izin` tinytext DEFAULT NULL,
  `akta` tinytext DEFAULT NULL,
  `luas_ruang_produksi` tinyint(3) UNSIGNED DEFAULT NULL,
  `alamat_produksi` tinytext DEFAULT NULL,
  `pegawai_tetap` tinyint(3) UNSIGNED DEFAULT NULL,
  `pegawai_tidak_tetap` tinyint(3) UNSIGNED DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `website` varchar(30) DEFAULT NULL,
  `sosmed` tinytext DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`, `slug`, `alamat`, `nama_pendiri`, `tahun_berdiri`, `bentuk_usaha`, `status_kantor`, `alamat_kantor`, `kota_kabupaten`, `logo`, `izin`, `akta`, `luas_ruang_produksi`, `alamat_produksi`, `pegawai_tetap`, `pegawai_tidak_tetap`, `email`, `telepon`, `website`, `sosmed`, `is_delete`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'javascript:alert(1);', '0001-javascript:alert(1);', NULL, 'javascript:alert(1);', 2000, 'CV', 'Sewa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '18', '2020-05-27 14:40:58', '18', '2020-05-30 06:35:01'),
(2, 'teadsd', '0002-teadsd', NULL, 'asdas', 2020, 'PT', 'Sewa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '18', '2020-05-27 14:43:36', '18', '2020-05-30 06:35:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `nama_acara` varchar(100) NOT NULL,
  `pencapaian` varchar(30) NOT NULL,
  `penyelenggara` varchar(30) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_produk` tinytext NOT NULL,
  `katsinov` varchar(20) NOT NULL DEFAULT 'belum memenuhi',
  `tkt` varchar(20) NOT NULL DEFAULT 'belum memenuhi',
  `slug` tinytext DEFAULT NULL,
  `bidang` tinytext NOT NULL,
  `kategori` text NOT NULL,
  `jenis` enum('digital','non digital') NOT NULL,
  `produksi_barang_fisik` enum('ada','tidak') DEFAULT NULL,
  `logo_produk` tinytext DEFAULT NULL,
  `deskripsi_singkat` tinytext DEFAULT NULL,
  `deskripsi_lengkap` text NOT NULL,
  `latar_belakang` text NOT NULL,
  `keterbaruan_produk` text NOT NULL,
  `kerjasama` text NOT NULL,
  `masalah` text NOT NULL,
  `file_tambahan` tinytext DEFAULT NULL,
  `solusi` text NOT NULL,
  `spesifikasi_teknis` text NOT NULL,
  `kegunaan_manfaat` text NOT NULL,
  `keunggulan_keunikan` text NOT NULL,
  `kesiapan_teknologi` enum('masih riset','prototype','siap komersil') DEFAULT NULL,
  `kepemilikan_teknologi` enum('sendiri','instansi') DEFAULT NULL,
  `pemilik_teknologi` tinytext DEFAULT NULL,
  `teknologi_yang_dikembangkan` text NOT NULL,
  `rencana_pengembangan` text NOT NULL,
  `tautan_video` tinytext DEFAULT NULL,
  `media_sosial` tinytext DEFAULT NULL,
  `website` varchar(30) DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `katsinov`, `tkt`, `slug`, `bidang`, `kategori`, `jenis`, `produksi_barang_fisik`, `logo_produk`, `deskripsi_singkat`, `deskripsi_lengkap`, `latar_belakang`, `keterbaruan_produk`, `kerjasama`, `masalah`, `file_tambahan`, `solusi`, `spesifikasi_teknis`, `kegunaan_manfaat`, `keunggulan_keunikan`, `kesiapan_teknologi`, `kepemilikan_teknologi`, `pemilik_teknologi`, `teknologi_yang_dikembangkan`, `rencana_pengembangan`, `tautan_video`, `media_sosial`, `website`, `is_delete`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Kilap Premium', '', '', '0001-Kilap-Premium', 'Material Maju', '[\"Alumunium Silikat\"]', 'non digital', NULL, NULL, 'Produk Perawatan Kendaraan yang Aman untuk Lapisan Cat dan Dapat Memproteksi', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '19', '2020-05-27 13:53:15', '19', '2020-06-14 11:36:23'),
(2, 'test', '', '', '0002-test', 'Energi', '[\"Alat Kesehatan\",\"Alumunium Silikat\"]', 'digital', NULL, NULL, 'test', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '18', '2020-05-27 14:33:31', '18', '2020-06-14 11:36:23'),
(3, 'test', '', '', '0003-test', 'Pangan', '[\"Alat Kesehatan\"]', 'digital', NULL, NULL, 'test', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '18', '2020-05-27 14:35:29', '18', '2020-06-14 11:36:23'),
(4, '>prompt(1)', '', '', '0004->prompt(1)', 'Kemaritiman', '[\"Alat dan Mesin Pertanian\",\"Alat Kesehatan\",\"Alat Pendukung Industri Material Maju\",\"Alumunium Silikat\",\"Artificial Intellengence (AI)\"]', 'digital', NULL, NULL, '&lt;/ScRiPt&gt;&gt;&lt;ScRiPt&gt;prompt(1)&lt;/ScRiPt&gt;', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '18', '2020-05-27 14:38:22', '18', '2020-06-14 11:36:23'),
(5, 'javascript:alert(1);', '', '', '0005-javascript:alert(1);', 'Energi', 'null', 'digital', NULL, NULL, '&lt;script\\x20type=text/javascript&gt;javascript:alert(1);&lt;/script&gt;', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '18', '2020-05-27 14:38:46', '18', '2020-06-14 11:36:23'),
(6, 'test', '', '', '0006-test', 'Pangan', '[\"Alat Kesehatan\"]', 'digital', NULL, NULL, 'adsadasd', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '18', '2020-05-27 14:41:34', '18', '2020-06-14 11:36:23'),
(7, 'test', '', '', '0007-test', 'Energi', '[\"Alat Kesehatan\"]', 'digital', NULL, NULL, '123123', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '18', '2020-05-27 14:42:46', '18', '2020-06-14 11:36:23'),
(8, 'test', '', '', '0008-test', 'Pertahanan Keamanan', '[\"Alat Kesehatan\"]', 'digital', NULL, NULL, 'test', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '18', '2020-05-27 14:43:22', '18', '2020-06-14 11:36:23'),
(9, '213123', '', '', '0009-213123', 'Pangan', '[\"Alat Kesehatan\"]', 'digital', NULL, NULL, '21312', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '18', '2020-05-27 14:44:48', '18', '2020-06-14 11:36:23'),
(10, '213123', '', '', '0010-213123', 'Pangan', '[\"Alat Kesehatan\"]', 'digital', NULL, NULL, '21312', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '', '2020-05-27 14:45:14', '', '2020-06-14 11:36:23'),
(11, '213123', '', '', '0011-213123', 'Pangan', '[\"Alat Kesehatan\"]', 'digital', NULL, NULL, '21312', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '', '2020-05-27 14:45:23', '', '2020-06-14 11:36:23'),
(12, '213123', '', '', '0012-213123', 'Pangan', '[\"Alat Kesehatan\"]', 'digital', NULL, NULL, '21312', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '', '2020-05-27 14:45:24', '', '2020-06-14 11:36:23'),
(13, '213123', '', '', '0013-213123', 'Pangan', '[\"Alat Kesehatan\"]', 'digital', NULL, NULL, '21312', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '', '2020-05-27 14:45:24', '', '2020-06-14 11:36:23'),
(14, '213123', '', '', '0014-213123', 'Pangan', '[\"Alat Kesehatan\"]', 'digital', NULL, NULL, '21312', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '', '2020-05-27 14:45:29', '', '2020-06-14 11:36:23'),
(15, '213123', '', '', '0015-213123', 'Pangan', '[\"Alat Kesehatan\"]', 'digital', NULL, NULL, '21312', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '', '2020-05-27 14:45:30', '', '2020-06-14 11:36:23'),
(16, '213123', '', '', '0016-213123', 'Pangan', '[\"Alat Kesehatan\"]', 'digital', NULL, NULL, '21312', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '', '2020-05-27 14:46:46', '', '2020-06-14 11:36:23'),
(17, 'test', '', '', '0017-test', 'Transportasi', '[\"Alat Pendukung Industri Material Maju\",\"Alumunium Silikat\"]', 'digital', NULL, NULL, 'wqeqweqweweqwe', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '18', '2020-05-27 15:14:03', '18', '2020-06-14 11:36:23'),
(18, 'BRAIN APPS', '', '', '0018-BRAIN-APPS', 'Energi', '[\"Alat Pendukung Industri Material Maju\",\"Artificial Intellengence (AI)\"]', 'digital', NULL, NULL, 'Sistem Manajemen Utek', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '31', '2020-05-27 21:35:55', '31', '2020-06-14 11:36:23'),
(19, 'w', '', '', '0019-w', 'Pangan', '[\"Alat Kesehatan\"]', 'digital', NULL, NULL, 'w', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '18', '2020-05-28 07:48:00', '18', '2020-06-14 11:36:23'),
(20, 'VEGAZ', '', '', '0020-VEGAZ', 'Rekayasa Keteknikan', '[\"Perbekalan Kesehatan Rumah Tangga\"]', 'non digital', NULL, NULL, 'LSMA;,M;', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '48', '2020-05-29 15:49:49', '48', '2020-06-14 11:36:23'),
(21, 'Indocane', '', '', '0021-Indocane', 'Pangan', '[\"Pangan Fungsional\",\"Pangan Segar\"]', 'non digital', NULL, NULL, 'Produk ini merupakan produk minumas sari tebu ready to drink dengan tambahan beberapa bahan alami yang dapat memberikan manfaat berbagai macam', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '25', '2020-05-29 18:32:39', '25', '2020-06-14 11:36:23'),
(22, 'Yuk Summit', '', '', '0022-Yuk-Summit', 'Sosial Budaya', '[\"E-commerce\",\"Kebencanaan\",\"Marketplace\",\"Travel\",\"Turisme\"]', 'digital', NULL, NULL, 'sebuah platform digital asisten para pendaki', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '36', '2020-05-29 19:22:07', '36', '2020-06-14 11:36:23'),
(23, 'Angkringan Lecep Ngalam', '', '', '0023-Angkringan-Lecep-Ngalam', 'Pangan', '[\"Pangan Olahan\"]', 'non digital', NULL, NULL, 'Sebuah angkirngan yang menyediakan pecel dengan berbagai varian rasa ditambah lauk-lauk yang tersedia dan dapat dipilih sesuai keinginan', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '34', '2020-05-29 20:14:00', '34', '2020-06-14 11:36:23'),
(24, 'Smart Eco Room by myECO', '', '', '0024-Smart-Eco-Room-by-myECO', 'Energi', '[\"Hardware\",\"Internet of Things (IoT)\",\"Management Tools\",\"Penghemat Listrik\"]', 'non digital', NULL, NULL, 'Produk bernama Smart EcoRoom adalah solusi alat penghemat listrik otomatis berbasis IoT (Internet of Things) dengan penghematan hingga 55%. Satu-satunya alat penghemat yang dapat mengendalikan, memanajemen dan memonitoring  perangkat listrik.Menyala-matik', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '32', '2020-05-29 21:48:07', '32', '2020-06-14 11:36:23'),
(25, 'Smart Eco Room by myECO', '', '', '0025-Smart-Eco-Room-by-myECO', 'Energi', '[\"Hardware\",\"Internet of Things (IoT)\",\"Penghemat Listrik\"]', 'digital', NULL, NULL, 'Teknologi penghemat listrik hingga 55% dengan sistem monitoring, kontrol manual dan otomatis berbasis IoT.', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '32', '2020-05-29 21:50:11', '32', '2020-06-14 11:36:23'),
(26, 'Smart Eco Room by myECO', '', '', '0026-Smart-Eco-Room-by-myECO', 'Energi', '[\"Hardware\",\"Internet of Things (IoT)\",\"Penghemat Listrik\"]', 'non digital', NULL, 'https://inovasi.ub.ac.id/apps/uploads/inovasi/26/logo/logo-26_2020-05-29_22_02.png', 'Teknologi penghemat listrik hingga 55% dengan sistem monitoring, kontrol manual dan otomatis berbasis IoT.', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '32', '2020-05-29 21:53:39', '32', '2020-06-14 11:36:23'),
(27, 'Smart E-Plug by myECO', '', '', '0027-Smart-E-Plug-by-myECO', 'Energi', '[\"Hardware\",\"Internet of Things (IoT)\",\"Penghemat Listrik\"]', 'non digital', NULL, NULL, 'Adalah produk myECO yang berfokus penghematan dan pengefektifan listrik pada lampu . Dapat diimplementasikan pada lampu jalan, rumah, desa, kantor ,perusahaan dan berbagai tempat yang mengharuskan pengontrolan lampu secara otomatis. ', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '32', '2020-05-29 21:54:47', '32', '2020-06-14 11:36:23'),
(28, 'Smart E-Plug by myECO', '', '', '0028-Smart-E-Plug-by-myECO', 'Energi', '[\"Hardware\",\"Internet of Things (IoT)\",\"Penghemat Listrik\"]', 'non digital', NULL, NULL, 'Produk myECO yang berfungsi untuk memudahkan pengontrolan dan monitoring perangkat elektronik dengan menggunakan stopkontak ini sebagai jembatan sebelum ke stopkontak sumber\r\n', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '32', '2020-05-29 21:56:08', '32', '2020-06-14 11:36:23'),
(29, 'SLamp by myECO', '', '', '0029-SLamp-by-myECO', 'Energi', '[\"Hardware\",\"Internet of Things (IoT)\",\"Penghemat Listrik\"]', 'non digital', NULL, NULL, 'Smart Lamp Produk myECO yang berfungsi untuk memudahkan pengontrolan dan monitoring perangkat elektronik dengan menggunakan stopkontak ini sebagai jembatan sebelum ke stopkontak sumber', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '32', '2020-05-29 21:57:14', '32', '2020-06-14 11:36:23'),
(30, 'sds', '', '', '0030-sds', 'Pangan', '[\"Artificial Intellengence (AI)\"]', 'digital', NULL, NULL, 'dadaw', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '32', '2020-05-29 21:58:05', '32', '2020-06-14 11:36:23'),
(31, 'URAINs', '', '', '0031-URAINs', 'Energi', '[\"Alat Pendukung Industri Material Maju\"]', 'digital', NULL, NULL, 'Sebuah aplikasi hujan', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '31', '2020-05-29 22:20:23', '31', '2020-06-14 11:36:23'),
(32, 'NEVERSTRESS : Curhat Kuy', '', '', '0032-NEVERSTRESS-:-Curhat-Kuy', 'Kesehatan', '[\"E-commerce\"]', 'digital', NULL, 'https://inovasi.ub.ac.id/apps/uploads/inovasi/32/logo/logo-32_2020-05-30_11_35.jpg', 'Ide ini berupa aplikasi dan website berupa layanan curhat secara online baik via telepon, video call, maupun messages antara klien dengan para ahli di bidang (politik, hukum, ekonomi & bisnis., dll) yang sesuai  dengan keinginan konsumen.', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '37', '2020-05-30 09:04:12', '37', '2020-06-14 11:36:23'),
(33, 'Pasar.ID', '', '', '0033-Pasar.ID', 'Pangan', '[\"B2B\",\"E-commerce\",\"Marketplace\"]', 'digital', NULL, NULL, 'Platform digital yang mempertemukan pedagang, nelayan, petani, pedagang kaki lima dengan konsumen maupun perusahaan', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '20', '2020-05-30 20:32:36', '20', '2020-05-30 13:32:36'),
(34, 'inovasiku', '', '', '0034-inovasiku', 'Rekayasa Keteknikan', '[\"Artificial Intellengence (AI)\"]', 'digital', NULL, NULL, 'sistem inovasi keren', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '3', '2020-05-31 11:27:44', '3', '2020-05-31 04:27:44'),
(35, 'RABBIT GO', '', '', '0035-RABBIT-GO', 'Pangan', '[\"Pangan Fungsional\",\"Pangan Olahan\",\"Pangan Segar\",\"Peternakan\",\"Teknologi Budidaya\",\"Teknologi Pedukung Daya Gerak\"]', 'digital', NULL, NULL, 'Rabbit GO merupakan platform berbasis Aplikasi dan Website untuk peternak kelinci pedaging di Indonesia dengan prinsip Mitra dan Partner guna memenuhi kebutuhan daging kelinci dalam Negeri.\r\n   ', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '21', '2020-05-31 15:36:21', '21', '2020-05-31 08:36:21'),
(36, 'ROZIQIN RABBIT FARM ', '', '', '0036-ROZIQIN-RABBIT-FARM-', 'Pangan', '[\"Pangan Fungsional\",\"Pangan Olahan\",\"Pangan Segar\",\"Peternakan\"]', 'digital', NULL, NULL, 'ROZIQIN RABBIT FARM merupakan budidaya peternakan kelinci dengan sistem mitra di Indonesia guna memenuhi kebutuhan pangan berbahan daging kelinci di Indonesia.', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '21', '2020-05-31 15:45:14', '21', '2020-05-31 08:45:14'),
(37, 'PrivatIn', '', '', '0037-PrivatIn', 'Rekayasa Keteknikan', '[\"Pendidikan\"]', 'digital', NULL, NULL, 'Privatin merupakan platform digital untuk mencari guru / tentor yang ahli di bidang tertentu secara online.', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '28', '2020-05-31 16:42:55', '28', '2020-05-31 09:42:55'),
(38, 'Sahabat Qur an (SaQu) ', '', '', '0038-Sahabat-Qur-an-(SaQu)-', 'Sosial Budaya', '[\"Internet of Things (IoT)\"]', 'digital', NULL, NULL, 'Aplikasi yang menambah semangat, memudahkan dalam menghafalkan serta menyetorkan hafalan secara online', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '26', '2020-05-31 16:47:35', '26', '2020-05-31 09:47:35'),
(39, 'Sahabat Quran (SaQu) ', '', '', '0039-Sahabat-Quran-(SaQu)-', 'Sosial Budaya', '[\"Internet of Things (IoT)\",\"Pendidikan\"]', 'digital', NULL, NULL, 'Aplikasi yang menambah semangat, memudahkan menghafal serta melakukan setoran Quran secara online', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '26', '2020-05-31 16:51:12', '26', '2020-05-31 09:51:12'),
(40, 'Gadepark', '', '', '0040-Gadepark', 'Rekayasa Keteknikan', '[\"Internet of Things (IoT)\"]', 'digital', NULL, NULL, 'Parkir manajemen dengan opsi untuk memilih tempat parkir sendiri', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '45', '2020-05-31 17:11:35', '45', '2020-05-31 10:11:35'),
(41, 'MISTERCLEAN', '', '', '0041-MISTERCLEAN', 'Rekayasa Keteknikan', '[\"Content Management System\"]', 'non digital', NULL, NULL, 'Usaha ini bernama Misterclean, dibuat karena kami merasa sudah \r\nbanyak masyarakat terutama mahasiswa yang bukan hanya memerlukan jasa \r\ncuci pakaian akan tetapi juga memerlukan jasa cuci sepatu, tas, dan helm. \r\nKebutuhan masyarakat yang semakin meningka', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '17', '2020-05-31 17:29:03', '17', '2020-05-31 10:29:03'),
(42, 'Seawith', '', '', '0042-Seawith', 'Kemaritiman', '[\"E-commerce\"]', 'digital', NULL, NULL, 'Platform digital e-commerce dan marketplace berbasis website dan aplikasi yang menyediakan kebutuhan budidaya rumput laut, olahan rumput laut, dan rumput laut.', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '39', '2020-05-31 19:58:19', '39', '2020-05-31 12:58:19'),
(43, 'unifarm', '', '', '0043-unifarm', 'Pangan', '[\"Pangan Olahan\"]', 'digital', NULL, NULL, 'Platform Jasa Cathering Susu Segar Harian', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '35', '2020-05-31 23:36:45', '35', '2020-05-31 16:36:45'),
(44, 'Foldable Bag and Bottle', '', '', '0044-Foldable-Bag-and-Bottle', 'Rekayasa Keteknikan', '[\"Hardware\",\"Limbah Plastik\",\"Tekstil\"]', 'non digital', 'ada', NULL, 'Tas dan pouch yang terbuat dari limbah produksi kain pabrik serta wadah tempat minum dan makan yang bisa dilipat terbuat dari silikon ', '<p>Foldable bag dan pouch adalah sebuah tas belanja dan kantong belanja yang terbuat dari limbah kain sisa pabrik garment atau konveksi yang bisa dilipat dan diserta tali untuk memudahkan pengguna membawanya sebagai barang sehari-hari yang wajib dibawa sebagai pengganti kantong kresek.</p><p>Foldable bottle dan food storage adalah sebuah wadah makanan dan minuman yang terbuat dari silikon yang bisa dilipat saat tidak terisi oleh makanan atau minuman dan mudah dibawa bepergian.</p>', '<p>Banyaknya keberadaaan swalayan yang mudah dijangkau masyarakat serta keharusan untuk memenuhi berbagai macam kebutuhan di swalayan memaksa masyarakat untuk tetap menggunakan kantong plastik atau kresek yang umumnya tidak akan digunakan kembali saat mereka akan melakukan kegiatan belanja dikemudian hari. Adapun kebiasaan ibu rumah tangga saat berbelanja kebutuhan dapur yang beraneka ragam membuat mereka mengantongi satu kresek untuk satu jenis bahan makanan. Mengikuti perkembangan industri indonesia yang terus meningkat dengan banyaknya didirikan pabrik garment serta konveksi dari skala kecil hingga besar yang pada tiap produksinya menyisakan kain-kain sisa yang tidak terpakai merupakan peluang bagi kami untuk memanfaatkan kain sisa tersebut sebagai pengganti kantong plastik atau kresek dan pouch serut yang bisa dilipat dan praktis dibawa bepergian.&nbsp;<br>Maraknya inovasi dalam bidang food and beverage di Indonesia yang menarik banyak masyarakat untuk mencobanya serta kebiasaan mahasiswa berbelanja makanan ringan disekitar kampus adalah salah satu kontribusi nyata dalam penumpukan sampah plastik sekali pakai. Maka dari itu, dibuatlah produk wadah makanan dan minuman yang bentuknya menyerupai kemasan-kemasan tersebut tanpa mahasiswa atau pengguna lainnya malu membawanya. Kecendrungan akan hal yang praktis dan tidak merepotkanpun menjadi pertimbangan sehingga kedua wadah ini didesain dapat dilipat dan mudah dibawa bepergian.</p>', '<p>Foldable bag and pouch sudah banyak diproduksi di Indonesia, namun pemilihan bahan baku menjadi hal yang membedakan produk ini dengan produk lainnya.</p><p>Foldable bottle and food storage di Indonesia belum terlalu banyak di produksi. Produksi yang telah dilakukan dan dipasarkanpun memiliki spesifikasi yang berbeda dimana foldable bottle produk lain hanya dilengkapi dengan satu lubang untuk minum minuman cair (tanpa topping)</p><p>Foldable food storage di Indonesia belum terlalu banyak di produksi. Produksi yang telah dilakukan dan dipasarkanpun memiliki spesifikasi yang berbeda dimana foldable food storage produk lain bentuknya tidak menyerupai kemasan plastik yang umumnya digunakan untuk jajan, sehingga dalam segi ukuran dan bentuk masih kurang cocok dibawa bepergian</p>', '', '<ul><li>Belum mengetahui teknis pembuatan wadah silikon</li></ul>', NULL, '<ul><li>Menghubungi pabrik silikon untuk menanyakan teknis pembuatan wadah silikon&nbsp;</li></ul>', '<ul><li>Foldable bag dilengkapi dengan strap untuk menjaga bentuk tas tetap terlipat saat tidak digunakan dan tali yang memudahkan pengguna untuk membawa dan menyimpannya</li><li>Foldable pouch dilengkapi dengan tali serut untuk memudahkan dan mempercepat proses memasukkan bahan makanan kedalam pouch dan terdapat variasi ukuran sesuai dengan jenis bahan makanan yang dibeli</li><li>Foldable bottle dilengkapi dengan dua opsi cara minum, yaitu dengan sedotan berukuran besar untuk mengomsumsi minuman bertopping dan kontak langsung antara mulut dengan permukaan botol. Tali dan strap untuk memudahkan pengguna melipat dan menyimpannys</li><li>Foldable food storage dilengkapi dengan strap untuk membuka dan menutup wadah makanan serta tali untuk memudahkan pengguna membawanya</li></ul>', '<ul><li>Foldable bag berguna menampung barang belanjaan&nbsp;</li><li>Foldable pouch berguna untuk menampung barang berdasarkan jenis-jenisnya</li><li>Foldable bottle berguna sebagai wadah minum yang memiliki umur penggunaan lebih panjang daripada botol kemasan sekali pakai</li><li>Foldable food storage berguna sebagai wadah makanan yang memiliki umur penggunaan lebih panjang daripada plastik kiloan sekali pakai</li></ul><p>&nbsp;</p>', '<ul><li>Foldable bag dan pouch terbuat dari kain sisa produksi pabrik atau konveksi</li><li>Foldable bag dan pouch bisa dilipat ketika tidak terisi barang</li><li>Foldable bag and pouch tidak memakan tempat bila dimasukkan kedalam tas sehari-hari</li><li>Foldable bag and pouch dapat digunakan dalam waktu yang panjang</li><li>Foldable bottle and food storage anti bocor karena terbuat dari silikon</li><li>Foldable bottle and food storage tidak berbahaya untuk makanan dan minuman panas</li><li>Foldable bottle and food storage bisa dilipat bila tidak terisi makanan atau minuman</li></ul>', 'masih riset', NULL, NULL, '', '<p>Apabila ketersediaan bahan baku (kain sisa produksi pabrik) terus meningkat, produk akan dikembangkan dalam segi desain dan kegunaannya. Tidak hanya tas dan pouch untuk belanja tetapi juga tas sehari-hari dan produk lainnya yang terbuat dari kain.</p>', '', '', '', 0, '41', '2020-06-01 12:35:09', '41', '2020-06-01 06:28:56'),
(45, 'token kerja', '', '', '0045-token-kerja', 'Rekayasa Keteknikan', '[\"Content Management System\"]', 'digital', NULL, NULL, 'dsd', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '48', '2020-06-01 13:55:51', '48', '2020-06-01 06:55:51'),
(46, 'Repudiandae quia cup', '4', '1', '0046-Repudiandae-quia-cup', 'Energi', '[\"Kesehatan Masyarakat\",\"Management Tools\",\"Pangan Olahan\",\"Peternakan\"]', 'digital', NULL, NULL, 'asd asd sad', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '16', '2020-06-01 16:15:04', '16', '2020-06-14 13:51:49'),
(47, 'Aliquam ad cupiditat', '6', '5', '0047-Aliquam-ad-cupiditat', 'Material Maju', '[\"Alat Kesehatan\",\"Kebencanaan\",\"Keramik Struktural\",\"Kosmetika dan Produk Kecantikan\",\"Material Bio-Katalis\",\"Material untuk Bahan Bangunan\"]', 'digital', NULL, NULL, '', '', '', '', '', '', NULL, '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, 0, '16', '2020-06-05 09:54:13', '16', '2020-06-14 13:30:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jumlah` varchar(15) DEFAULT NULL,
  `satuan` varchar(10) NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_perusahaan`
--

CREATE TABLE `produk_perusahaan` (
  `produk_id` int(10) UNSIGNED NOT NULL,
  `perusahaan_id` int(10) UNSIGNED NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `produk_id` int(10) UNSIGNED NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roadmap`
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
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `seen`
--

CREATE TABLE `seen` (
  `produk_id` int(10) UNSIGNED NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id` bigint(20) NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `ulasan` text NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `identifier` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `status` enum('mahasiswa','dosen','alumni') NOT NULL DEFAULT 'mahasiswa',
  `is_admin` enum('no','verifikator','admin') NOT NULL DEFAULT 'no',
  `email` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `foto` tinytext NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto_ktp` tinytext DEFAULT NULL,
  `cv` tinytext DEFAULT NULL,
  `pendidikan_terakhir` enum('SMA/Sederajat','D1','D2','D3','S1','S2','S3') NOT NULL,
  `fcm` varchar(255) DEFAULT NULL,
  `auth` tinytext NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `identifier`, `nama`, `fakultas`, `jurusan`, `prodi`, `status`, `is_admin`, `email`, `kontak`, `foto`, `nik`, `jenis_kelamin`, `tanggal_lahir`, `foto_ktp`, `cv`, `pendidikan_terakhir`, `fcm`, `auth`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '135020500111002', 'ANGGIT SETIADI', 'FEB', 'Studi Pembangunan', 'Ekonomi Islam', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2013/135020500111002.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-29 18:28:00', '', '2020-06-01 09:02:53'),
(2, '135050101111155', 'Tawang Aji Lestari', 'FAPET', 'Non jurusan', 'Peternakan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2013/135050101111155.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-29 17:37:28', '16', '2020-06-13 17:02:37'),
(3, '145090400111025', 'IMRON MASHURI', 'FMIPA', 'Matematika', 'Matematika', 'mahasiswa', 'admin', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2014/145090400111025.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-28 13:07:33', '', '2020-06-01 09:08:13'),
(4, '155020100111021', 'DIKAU TONDO PRASTYO', 'FEB', 'Studi Pembangunan', 'Ekonomi Pembangunan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2015/155020100111021.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-29 18:33:21', '', '2020-06-01 09:02:53'),
(5, '155060301111051', 'Mochammad Abdul Ghofur', 'FT', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', 'mochabdulghofur18@gmail.com', '085732830007', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2015/155060301111051.jpg', NULL, NULL, '1996-09-18', NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-31 22:30:29', '', '2020-06-01 09:09:05'),
(6, '155090307111021', 'AMIRA ULVI ANNISA', 'FMIPA', 'Fisika', 'Fisika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2015/155090307111021.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-27 13:37:29', '', '2020-06-01 09:08:13'),
(7, '155100907111025', 'SANG AJI ARIF SETYAWAN', 'FTP', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2015/155100907111025.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-27 12:04:18', '', '2020-06-01 09:02:31'),
(8, '165030107111097', 'Renji Eko Sandi', 'FIA', 'Ilmu Administrasi Negara', 'Ilmu Administrasi Publik', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165030107111097.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-27 11:32:36', '', '2020-06-01 09:09:48'),
(9, '165040201111230', 'Alvan Fajarudin', 'FP', 'Non Jurusan', 'Agroekoteknologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165040201111230.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-29 18:24:58', '', '2020-06-01 09:07:37'),
(10, '165040201111246', 'Grandy Zovanca', 'FP', 'Non Jurusan', 'Agroekoteknologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165040201111246.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-27 14:21:35', '', '2020-06-01 09:07:37'),
(11, '165060301111026', 'Aidil Fikri Islamy', 'FT', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060301111026.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-29 22:22:02', '', '2020-06-01 09:09:05'),
(12, '165060607111008', 'Ardhian Farrel Maulana', 'FT', 'Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060607111008.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-31 13:02:30', '', '2020-06-01 09:09:05'),
(13, '165100200111013', 'MEY YULIANA', 'FTP', 'Keteknikan Pertanian', 'Teknik Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100200111013.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-30 11:52:02', '', '2020-06-01 09:02:31'),
(14, '165100907111019', 'Adam Taufan Firdaus', 'FTP', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100907111019.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-29 18:26:36', '', '2020-06-01 09:02:31'),
(15, '165150207111058', 'danang trisdiana putra', 'FILKOM', 'Teknik Informatika', 'Teknik Informatika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165150207111058.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-27 17:49:13', '', '2020-06-01 09:09:28'),
(16, '165150401111060', 'Ghany Abdillah Ersa', 'FILKOM', 'Sistem Informasi', 'Sistem Informasi', 'mahasiswa', 'admin', 'ghany.ae@student.ub.ac.id', '21312312331231', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165150401111060.jpg', NULL, NULL, '1997-12-24', NULL, NULL, 'SMA/Sederajat', NULL, 'MTEzNDA4MTIzOTIxMzQwMTM1MDU4', '', '2020-05-27 08:47:06', '', '2020-06-01 21:10:06'),
(17, '173140414111066', 'RACHMATIKA PUTRI ADRIARINI', 'Vokasi', 'Non jurusan', 'Kesekretariatan BK. Public Relation', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2017/173140414111066.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-29 18:36:14', '', '2020-06-01 09:10:32'),
(18, '173141414111134', 'Suliyono', 'Vokasi', 'Non jurusan', 'Keuangan dan Perbankan BK. Perpajakan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2017/173141414111134.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-27 14:32:56', '', '2020-06-01 09:10:32'),
(19, '175040100111151', 'DZAHABY RAZAN', 'FP', 'Sosial Ekonomi Pertanian', 'Agribisnis', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2017/175040100111151.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-27 13:51:44', '', '2020-06-01 09:07:37'),
(20, '175040118113005', 'Khairunnisa Nada Mufidah', 'FP', 'Sosial Ekonomi Pertanian', 'Agribisnis', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2017/175040118113005.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-30 20:28:13', '', '2020-06-01 09:07:37'),
(21, '175050100111148', 'AHMAD ANWAR ROZIQIN', 'FAPET', 'Non jurusan', 'Peternakan', 'mahasiswa', 'no', 'ahmadanwar99.r@gmail.com', '085816525510', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2017/175050100111148.jpg', NULL, NULL, '1998-06-21', NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-31 14:08:45', '', '2020-06-01 09:03:20'),
(22, '175061101111013', 'Dendi Alga Utama', 'FT', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2017/175061101111013.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-27 14:12:14', '', '2020-06-01 09:09:05'),
(23, '175090801111007', 'Aldi Dwi Putra', 'FMIPA', 'Fisika', 'Instrumentasi', 'mahasiswa', 'no', 'aldidwiputra9@student.ub.ac.id', '085283066955', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2017/175090801111007.jpg', NULL, NULL, '1999-08-02', NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-06-01 10:01:57', '', '2020-06-01 09:08:13'),
(24, '175100207111007', 'BAGAS ROHMATULLOH', 'FTP', 'Keteknikan Pertanian', 'Teknik Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2017/175100207111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-31 13:05:33', '', '2020-06-01 09:02:31'),
(25, '175100300111007', 'MUKHAMMAD MUZAKKI MUSTAFA', 'FTP', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2017/175100300111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-29 18:29:42', '', '2020-06-01 09:02:31'),
(26, '175100600111004', 'LUTFI MAHMUDAH', 'FTP', 'Keteknikan Pertanian', 'Teknologi Bioproses', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2017/175100600111004.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-31 16:44:41', '', '2020-06-01 09:02:31'),
(27, '175100900111023', 'FIKAR RAZANI', 'FTP', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2017/175100900111023.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-27 17:12:28', '', '2020-06-01 09:02:31'),
(28, '175150218113022', 'Luthfi Afrizal Ardhani', 'FILKOM', 'Teknik Informatika', 'Teknik Informatika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2017/175150218113022.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-31 16:38:00', '', '2020-06-01 09:09:28'),
(29, '175150400111003', 'MOHAMMAD ROYHAN AFIF AL MUDHARI', 'FILKOM', 'Sistem Informasi', 'Sistem Informasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2017/175150400111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-31 16:52:12', '', '2020-06-01 09:09:28'),
(30, '175150400111027', 'REYHAN IVANDI', 'FILKOM', 'Sistem Informasi', 'Sistem Informasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2017/175150400111027.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-27 14:18:47', '', '2020-06-01 09:09:28'),
(31, '175150400111035', 'FAWWAZ DAFFA MUHAMMAD', 'FILKOM', 'Sistem Informasi', 'Sistem Informasi', 'mahasiswa', 'admin', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2017/175150400111035.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-27 21:35:25', '', '2020-06-01 09:09:28'),
(32, '183140714111025', 'maulana derifato achmad', 'Vokasi', 'Non jurusan', 'Manajemen Informatika dan Teknik Komputer BK. Teknologi Info', 'mahasiswa', 'no', 'maulana.derifato.achmad@gmail.com', '085745617610', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2018/183140714111025.jpg', NULL, NULL, '1999-06-08', NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-29 21:41:45', '', '2020-06-01 09:10:32'),
(33, '183141614111025', 'Ahmat Khoirudin', 'Vokasi', 'Non jurusan', 'Kesekretariatan BK. Perpustakaan dan Arsip', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2018/183141614111025.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-31 19:37:12', '', '2020-06-01 09:10:32'),
(34, '184140314111024', 'MUHAMMAD SAHAL', 'Vokasi', 'Non Jurusan', 'Manajemen Perhotelan Bidang Keahlian Hospitaliti', 'mahasiswa', 'no', 'sahalmas@gmail.com', '085746574330', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2018/184140314111024.jpg', NULL, NULL, '2020-05-29', NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-29 20:12:18', '', '2020-06-01 09:10:32'),
(35, '185050100111076', 'SARAPENDI SABILLA', 'FAPET', 'Non jurusan', 'Peternakan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2018/185050100111076.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-31 23:31:44', '', '2020-06-01 09:03:20'),
(36, '195020200111068', 'MOCHAMMAD RAFLI RACHMADANI', 'FEB', 'Manajemen', 'Manajemen', 'mahasiswa', 'no', 'danimuhamad052@gmail.com', '089661905400', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2019/195020200111068.jpg', NULL, NULL, '2001-04-17', NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-29 16:05:36', '', '2020-06-01 09:02:53'),
(37, '195020201111034', 'Muhammad Dwiky Ilham Prasetya', 'FEB', 'Manajemen', 'Manajemen', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2019/195020201111034.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-30 08:54:58', '', '2020-06-01 09:02:53'),
(38, '195020307111037', 'Muhammad Denay Widyatama', 'FEB', 'Akuntansi', 'Akuntansi', 'mahasiswa', 'no', 'denaywidyatama@student.ub.ac.id', '085228805518', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2019/195020307111037.jpg', NULL, NULL, '2000-05-17', NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-31 16:43:03', '', '2020-06-01 09:02:53'),
(39, '195020400111045', 'Muhammad Adil', 'FEB', 'Studi Pembangunan', 'Keuangan dan Perbankan', 'mahasiswa', 'no', 'muhaddil2014@gmail.com', '085399753904', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2019/195020400111045.jpg', NULL, NULL, '1999-05-13', NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-29 18:46:57', '', '2020-06-01 09:02:53'),
(40, '195030200111145', 'Dyhe Annura Husra', 'FIA', 'Ilmu Administrasi Niaga', 'Ilmu Administrasi Bisnis', 'mahasiswa', 'no', 'dyheannura1@gmail.com', '081267397820', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2019/195030200111145.jpg', NULL, NULL, '2001-04-16', NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-06-01 14:27:11', '', '2020-06-01 09:09:48'),
(41, '195090107111035', 'Ismi Maulaya Shodiq', 'FMIPA', 'Biologi', 'Biologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2019/195090107111035.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-06-01 12:31:44', '', '2020-06-01 09:08:13'),
(42, '195090300111004', 'Johannes Marulitua Nainggolan', 'FMIPA', 'Fisika', 'Fisika', 'mahasiswa', 'no', 'johannesmarulituanainggolan@gmail.com', '082251380714', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2019/195090300111004.jpg', NULL, NULL, '2001-07-22', NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-06-01 12:54:24', '', '2020-06-01 09:08:13'),
(43, '195100301111046', 'Riris Waladatun Nafiah', 'FTP', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', 'iriswaladatun@student.ub.ac.id', '085648300386', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2019/195100301111046.jpg', NULL, NULL, '2001-06-21', NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-29 18:26:50', '', '2020-06-01 09:02:31'),
(44, '195150201111040', 'Muhammad Adib Novan Fanani', 'FILKOM', 'Teknik Informatika', 'Teknik Informatika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2019/195150201111040.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-31 17:02:42', '', '2020-06-01 09:09:28'),
(45, '196030200011004', 'Erlanda Zakaria', 'FIA', 'Ilmu Administrasi Bisnis', 'Ilmu Administrasi Bisnis', 'mahasiswa', 'no', 'erlandazakaria@gmail.com', '082232944548', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2019/196030200011004.jpg', NULL, NULL, '1992-09-22', NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-29 19:47:16', '', '2020-06-01 09:09:48'),
(46, '196060600111001', 'ALIFAL HAMDAN', 'FT', 'Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2019/196060600111001.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-29 17:13:08', '', '2020-06-01 09:09:05'),
(47, 'admin super', 'Super Admin', 'BIW Corporation', '', '', 'mahasiswa', 'admin', '', '', 'https://i.pinimg.com/originals/28/93/ca/2893ca2a6c253b745b5ce9a7ce70c9ba.png', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-28 13:36:38', '', '2020-05-28 06:36:38'),
(48, 'verifikator', 'Tim Verifikator', 'BIW Corporation', '', '', 'mahasiswa', 'verifikator', '', '', 'https://media.tabloidbintang.com/files/thumb/1111af44ae808bc127ab84342b15af5a.jpg/745', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '', '2020-05-28 13:35:11', '', '2020-05-28 06:35:11'),
(70, '165150401111060', 'Assumenda tenetur ea', 'Vokasi', 'Nisi placeat volupt', 'Blanditiis dolore al', 'alumni', 'no', 'ghany.ersa@bigio.id', '37', '', NULL, NULL, NULL, NULL, NULL, 'S1', NULL, '$2y$10$HBT40ahqjsCgrvrvYYbU5.VgpF9s.S3QAGHs/KwsSqJG8.ITLbE6.', '16', '2020-06-21 06:47:03', '16', '2020-06-20 23:47:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aset_FKIndex1` (`perusahaan_id`);

--
-- Indeks untuk tabel `aspek_bisnis`
--
ALTER TABLE `aspek_bisnis`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `aspek_bisnis_FKIndex1` (`produk_id`);

--
-- Indeks untuk tabel `cluster`
--
ALTER TABLE `cluster`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_dasar`
--
ALTER TABLE `data_dasar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_dasar_FKIndex1` (`produk_id`);

--
-- Indeks untuk tabel `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto_kegiatan_FKIndex1` (`produk_id`);

--
-- Indeks untuk tabel `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto_produk_FKIndex1` (`produk_id`);

--
-- Indeks untuk tabel `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informasi_FKIndex1` (`produk_id`);

--
-- Indeks untuk tabel `inventor`
--
ALTER TABLE `inventor`
  ADD PRIMARY KEY (`produk_id`,`users_id`),
  ADD KEY `produk_has_users_FKIndex1` (`produk_id`),
  ADD KEY `produk_has_users_FKIndex2` (`users_id`);

--
-- Indeks untuk tabel `izin_produk`
--
ALTER TABLE `izin_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `izin_produk_FKIndex1` (`produk_id`);

--
-- Indeks untuk tabel `kekayaan_intelektual`
--
ALTER TABLE `kekayaan_intelektual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kekayaan_intelektual_FKIndex1` (`produk_id`);

--
-- Indeks untuk tabel `kepemilikan`
--
ALTER TABLE `kepemilikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kepemilikan_FKIndex1` (`perusahaan_id`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mitra_FKIndex1` (`produk_id`);

--
-- Indeks untuk tabel `omset_profit`
--
ALTER TABLE `omset_profit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `omset_profit_FKIndex1` (`produk_id`);

--
-- Indeks untuk tabel `pemasaran`
--
ALTER TABLE `pemasaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemasaran_FKIndex1` (`produk_id`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuan_FKIndex1` (`produk_id`),
  ADD KEY `cluster` (`cluster_id`);

--
-- Indeks untuk tabel `pengujian`
--
ALTER TABLE `pengujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengujian_FKIndex1` (`produk_id`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`users_id`,`perusahaan_id`),
  ADD KEY `users_has_perusahaan_FKIndex1` (`users_id`),
  ADD KEY `users_has_perusahaan_FKIndex2` (`perusahaan_id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_FKIndex1` (`produk_id`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prestasi_FKIndex1` (`produk_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produksi_FKIndex1` (`produk_id`);

--
-- Indeks untuk tabel `produk_perusahaan`
--
ALTER TABLE `produk_perusahaan`
  ADD PRIMARY KEY (`produk_id`,`perusahaan_id`),
  ADD KEY `produk_has_perusahaan_FKIndex1` (`produk_id`),
  ADD KEY `produk_has_perusahaan_FKIndex2` (`perusahaan_id`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`produk_id`,`users_id`),
  ADD KEY `produk_has_users_FKIndex1` (`produk_id`),
  ADD KEY `produk_has_users_FKIndex2` (`users_id`);

--
-- Indeks untuk tabel `roadmap`
--
ALTER TABLE `roadmap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roadmap_FKIndex1` (`produk_id`);

--
-- Indeks untuk tabel `seen`
--
ALTER TABLE `seen`
  ADD KEY `seen_FKIndex1` (`produk_id`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasan_FKIndex1` (`produk_id`),
  ADD KEY `ulasan_FKIndex2` (`users_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_unique` (`email`,`identifier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `aset`
--
ALTER TABLE `aset`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cluster`
--
ALTER TABLE `cluster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_dasar`
--
ALTER TABLE `data_dasar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `izin_produk`
--
ALTER TABLE `izin_produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kekayaan_intelektual`
--
ALTER TABLE `kekayaan_intelektual`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kepemilikan`
--
ALTER TABLE `kepemilikan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `omset_profit`
--
ALTER TABLE `omset_profit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemasaran`
--
ALTER TABLE `pemasaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengujian`
--
ALTER TABLE `pengujian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roadmap`
--
ALTER TABLE `roadmap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aset`
--
ALTER TABLE `aset`
  ADD CONSTRAINT `aset_ibfk_1` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `aspek_bisnis`
--
ALTER TABLE `aspek_bisnis`
  ADD CONSTRAINT `aspek_bisnis_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `data_dasar`
--
ALTER TABLE `data_dasar`
  ADD CONSTRAINT `data_dasar_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  ADD CONSTRAINT `foto_kegiatan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD CONSTRAINT `foto_produk_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD CONSTRAINT `informasi_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `inventor`
--
ALTER TABLE `inventor`
  ADD CONSTRAINT `inventor_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inventor_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `izin_produk`
--
ALTER TABLE `izin_produk`
  ADD CONSTRAINT `izin_produk_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `kekayaan_intelektual`
--
ALTER TABLE `kekayaan_intelektual`
  ADD CONSTRAINT `kekayaan_intelektual_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `kepemilikan`
--
ALTER TABLE `kepemilikan`
  ADD CONSTRAINT `kepemilikan_ibfk_1` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD CONSTRAINT `mitra_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `omset_profit`
--
ALTER TABLE `omset_profit`
  ADD CONSTRAINT `omset_profit_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pemasaran`
--
ALTER TABLE `pemasaran`
  ADD CONSTRAINT `pemasaran_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `cluster` FOREIGN KEY (`cluster_id`) REFERENCES `cluster` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengujian`
--
ALTER TABLE `pengujian`
  ADD CONSTRAINT `pengujian_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `pengurus_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pengurus_ibfk_2` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `produksi_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `produk_perusahaan`
--
ALTER TABLE `produk_perusahaan`
  ADD CONSTRAINT `produk_perusahaan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `produk_perusahaan_ibfk_2` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `roadmap`
--
ALTER TABLE `roadmap`
  ADD CONSTRAINT `roadmap_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `seen`
--
ALTER TABLE `seen`
  ADD CONSTRAINT `seen_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
