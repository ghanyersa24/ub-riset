-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 03:31 PM
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
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id` int(10) UNSIGNED NOT NULL,
  `perusahaan_id` int(10) UNSIGNED NOT NULL,
  `nama_aset` varchar(100) NOT NULL,
  `tahun_perolehan` year(4) DEFAULT NULL,
  `nilai_aset` int(10) UNSIGNED DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `aspek_bisnis`
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_dasar`
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
  `title` varchar(20) NOT NULL,
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
  `title` varchar(20) NOT NULL,
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
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `informasi` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
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
  `status` enum('Belum Diperoleh','Pengajuan Permohonan','Disetujui') DEFAULT NULL,
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
-- Table structure for table `kekayaan_intelektual`
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kepemilikan`
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `nama_mitra` varchar(100) DEFAULT NULL,
  `mou` tinytext DEFAULT NULL,
  `tujuan` tinytext DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `omset_profit`
--

CREATE TABLE `omset_profit` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `jenis` enum('Perolehan','Proyeksi') NOT NULL,
  `tipe` enum('Omset','Profit') NOT NULL,
  `jenis_omset` enum('Perusahaan','Produk') NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `nilai` int(10) UNSIGNED DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemasaran`
--

CREATE TABLE `pemasaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `jangkauan` enum('Regional','Nasional','Ekspor') DEFAULT NULL,
  `volume_pemasaran` varchar(15) DEFAULT NULL,
  `nilai_pemasaran` varchar(15) DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `inventor` varchar(100) NOT NULL,
  `slug` tinytext DEFAULT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `bidang` varchar(30) NOT NULL,
  `kategori` tinytext DEFAULT NULL,
  `katsinov` tinyint(3) UNSIGNED DEFAULT NULL,
  `tkt` tinyint(3) UNSIGNED DEFAULT NULL,
  `file_evaluasi` tinytext DEFAULT NULL,
  `status` enum('diajukan','diperiksa','dinilai') NOT NULL,
  `verifikator` varchar(15) DEFAULT NULL,
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
  `status` enum('Sedang Dilakukan','Belum Dilakukan','Sudah Dilakukan') DEFAULT NULL,
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
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `users_id` varchar(15) NOT NULL,
  `perusahaan_id` int(10) UNSIGNED NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `jenis` enum('Perolehan','Proyeksi') NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jumlah` varchar(15) DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
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
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_produk` tinytext NOT NULL,
  `katsinov` tinyint(3) UNSIGNED DEFAULT NULL,
  `tkt` tinyint(3) UNSIGNED DEFAULT NULL,
  `slug` tinytext DEFAULT NULL,
  `bidang` enum('Kesehatan','Pertahanan Keamanan','Material Maju','Kemaritiman','Sosial Budaya') NOT NULL,
  `kategori` tinytext NOT NULL,
  `jenis` enum('digital','non digital') NOT NULL,
  `produksi_barang_fisik` enum('ada','tidak') DEFAULT NULL,
  `logo_produk` tinytext DEFAULT NULL,
  `deskripsi_singkat` tinytext DEFAULT NULL,
  `deskripsi_lengkap` text DEFAULT NULL,
  `latar_belakang` text DEFAULT NULL,
  `keterbaruan_produk` text DEFAULT NULL,
  `kerjasama` text DEFAULT NULL,
  `masalah` text DEFAULT NULL,
  `file_tambahan` tinytext DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `jenis` enum('Perolehan','Proyeksi') NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jumlah` varchar(15) DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk_perusahaan`
--

CREATE TABLE `produk_perusahaan` (
  `produk_id` int(10) UNSIGNED NOT NULL,
  `perusahaan_id` int(10) UNSIGNED NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `nama` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `status` enum('mahasiswa','dosen') NOT NULL,
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
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `fakultas`, `jurusan`, `prodi`, `status`, `is_admin`, `email`, `kontak`, `foto`, `nik`, `jenis_kelamin`, `tanggal_lahir`, `foto_ktp`, `cv`, `pendidikan_terakhir`, `fcm`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('165060201111050', 'Rio Kristian Siahaan', 'Teknik', 'Teknik Mesin', 'Teknik Mesin', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060201111050.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060207111022', 'Ahmed Arrindya Wafi Artama', 'Teknik', 'Teknik Mesin', 'Teknik Mesin', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060207111022.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060300111002', 'EKA MARDIANA', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060300111002.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060300111005', 'REZA ALIANSYAH', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060300111005.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060300111006', 'MUHAMMAD SETYO HADI JUWONO', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060300111006.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060300111009', 'ARIQ KUSUMA WARDANA', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060300111009.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060300111020', 'FERNESIA DINI ISLAMI', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060300111020.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060300111022', 'ANDREAS PARNINGOTAN. S', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060300111022.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060300111024', 'AHMAD FARID NURROHMAN.S', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060300111024.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060300111030', 'SATRIYO GEDHE SIMO KARSONO', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060300111030.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060300111047', 'JHOSUA CHRISTIAN TAMPUBOLON', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060300111047.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060301111003', 'Rachman Shandy Pratama', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060301111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060301111014', 'Titis Aridanti Pratiwi', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060301111014.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060301111015', 'Rifaldy Yuhendri', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060301111015.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060301111024', 'Prasetyo Rizky Arfan Sodiq', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060301111024.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060301111043', 'Dandy Imam Zaki', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060301111043.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060301111054', 'Mugni Labib Edypoerwa', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060301111054.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060301111055', 'Muhammad Zein Ali Idrus', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060301111055.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060301111056', 'Franerdy David Sandy Noach', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060301111056.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060301111065', 'Made Ayu Sekarrini', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060301111065.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060301111066', 'Ardi Idham Sadewa', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060301111066.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060301111069', 'Muhammad Rifaldi Putra', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060301111069.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060301111076', 'Aufa Rifky Fernanda', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060301111076.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060307111009', 'Novia Alifianti', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060307111009.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060307111022', 'Kintani Dewayanti', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060307111022.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060307111026', 'Ilyas Fatih Ramadhan', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060307111026.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060307111029', 'Alfian Indra Prasetya', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060307111029.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060307111031', 'Arbi Ramadhan', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060307111031.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060307111033', 'Muhammad Nafis Hamas', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060307111033.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060307111044', 'Iqbal alfawwazi hakim', 'Teknik', 'Teknik Elektro', 'Teknik Elektro', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060307111044.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060400111007', 'Reza Indra Forma', 'Teknik', 'Teknik Pengairan', 'Teknik Pengairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060400111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060400111017', 'DELIVEAN RAKHA DERMAWAN', 'Teknik', 'Teknik Pengairan', 'Teknik Pengairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060400111017.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060400111023', 'MUHAMMAD ARIQ FATHYAN KHAIRI', 'Teknik', 'Teknik Pengairan', 'Teknik Pengairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060400111023.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060401111003', 'Deny Ainur Rosidin', 'Teknik', 'Teknik Pengairan', 'Teknik Pengairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060401111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060401111006', 'Ekhsan Zainuri', 'Teknik', 'Teknik Pengairan', 'Teknik Pengairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060401111006.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060401111010', 'Apria Wayah Patra Surya Nugraha', 'Teknik', 'Teknik Pengairan', 'Teknik Pengairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060401111010.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060401111012', 'Ammy Fitriyasari', 'Teknik', 'Teknik Pengairan', 'Teknik Pengairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060401111012.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060401111028', 'Muhammad Adnan Maulana', 'Teknik', 'Teknik Pengairan', 'Teknik Pengairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060401111028.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060407111009', 'HAIDAR NAUFAL MAJID', 'Teknik', 'Teknik Pengairan', 'Teknik Pengairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060407111009.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060407111010', 'MUHAMMAD QURAIS SHIHAB', 'Teknik', 'Teknik Pengairan', 'Teknik Pengairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060407111010.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060407111015', 'Yayan Ishad Roosydi', 'Teknik', 'Teknik Pengairan', 'Teknik Pengairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060407111015.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060407111034', 'DANANG NUR RAHMAN', 'Teknik', 'Teknik Pengairan', 'Teknik Pengairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060407111034.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060500111025', 'MAGVIRA ARDHIA PRATIWI', 'Teknik', 'Arsitektur', 'Arsitektur', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060500111025.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060501111001', 'Edi Setiawan', 'Teknik', 'Arsitektur', 'Arsitektur', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060501111001.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060501111040', 'Aflah Rihadannafis', 'Teknik', 'Arsitektur', 'Arsitektur', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060501111040.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060501111045', 'Gagas Tegar Hardian', 'Teknik', 'Arsitektur', 'Arsitektur', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060501111045.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060507111023', 'EMA DWI ARSITA', 'Teknik', 'Arsitektur', 'Arsitektur', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060507111023.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060507111026', 'Febriana Maharani Sukarno', 'Teknik', 'Arsitektur', 'Arsitektur', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060507111026.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060507111030', 'Brahmatya Dipowaluyo', 'Teknik', 'Arsitektur', 'Arsitektur', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060507111030.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060600111034', 'LASMA KEZIA', 'Teknik', 'Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060600111034.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060601111018', 'Anak Agung Ngurah Yoga Narayana', 'Teknik', 'Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060601111018.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060607111007', 'Maratus Sholihah Fitria', 'Teknik', 'Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060607111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060607111010', 'Muhammad Kemal Akbar', 'Teknik', 'Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060607111010.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060607111013', 'Khodijah Nurfitri Syahrizal', 'Teknik', 'Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060607111013.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060700111027', 'STYAN AGUNG WICAKSONO', 'Teknik', 'Teknik Industri', 'Teknik Industri', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060700111027.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060700111049', 'QURROTA A`YUNIN', 'Teknik', 'Teknik Industri', 'Teknik Industri', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060700111049.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060707111015', 'Muhammad Altaf Zulkarnain', 'Teknik', 'Teknik Industri', 'Teknik Industri', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060707111015.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165060707111045', 'Muhamad Ivan Firsada W.F', 'Teknik', 'Teknik Industri', 'Teknik Industri', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165060707111045.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165061100111007', 'ASRI ENDANG KUSWANDARI', 'Teknik', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165061100111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165061100111017', 'MADE BAGUS ARMADEWA', 'Teknik', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165061100111017.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165061100111018', 'HARZA AGUSTIAN LATIEF', 'Teknik', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165061100111018.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165061100111019', 'LOSENDRA PRIMAMAS YONANDO', 'Teknik', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165061100111019.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165061100111021', 'BRAMANTYA', 'Teknik', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165061100111021.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165061100111022', 'PHILIO VALERINO', 'Teknik', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165061100111022.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165061100111023', 'HIDAYATUL MUSTAFIDAH ROHMAWATI', 'Teknik', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165061100111023.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165061101111003', 'Mohamad Zuhri Arif', 'Teknik', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165061101111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165061101111010', 'Reffly Wahyu Nugroho', 'Teknik', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165061101111010.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165061101111012', 'Fariqul Fahmi Al Wahidi', 'Teknik', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165061101111012.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165061101111026', 'Cahyo Sunu Widagdo', 'Teknik', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165061101111026.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165061101111029', 'Cintia Leony Mustofa', 'Teknik', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165061101111029.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165061107111005', 'Nadhia Sekarwardani', 'Teknik', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165061107111005.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165061107111007', 'Feli', 'Teknik', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165061107111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165061107111012', 'Aditya wicaksana', 'Teknik', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165061107111012.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165061107111014', 'Taslim Maulana', 'Teknik', 'Non Jurusan (Teknik Kimia)', 'Teknik Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165061107111014.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111002', 'NABILAH ROHADATUL `AISY', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111002.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111003', 'BIGY NUURON DANA', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111004', 'ERISKA SITI ROHMANIA', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111004.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111005', 'MUHAMAD HAITSAM', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111005.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111010', 'REZA RACHMANTOKO', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111010.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111011', 'FERY FANDI AHMAD', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111011.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111012', 'RUTH CLARITA PRADIBDO', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111012.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111018', 'ANNISA JASMINE SAFIRYANDRA', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111018.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111020', 'FITRIA', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111020.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111026', 'DIONA OSSY WAHYUNI', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111026.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111027', 'SYAFIRA MAULIDA', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111027.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111032', 'ELIZA OCTAVIA', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111032.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111033', 'SALMA ELFAJRI PRIMADINA', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111033.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111037', 'BRAMASTIAN SAMUDRO ALFATHRON', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111037.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111039', 'MAULIDINA SETIAWATI', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111039.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111042', 'KINANTHI WURI LUKTRI UTAMI', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111042.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111044', 'AULIA PANDU AJI', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111044.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111048', 'Fahri Kurnia R', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111048.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111053', 'DETA BERLIANA', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111053.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111056', 'DHAIFI MUTHMAININA', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111056.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111058', 'FERRISAGA JETHA PRANAWA', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111058.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111064', 'MUHAMMAD HISYAM KARIM', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111064.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111066', 'SYAHRUL AMIRRULLAH', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111066.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111069', 'AVIOLA ANGGITA GUNARDI', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111069.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111071', 'FADHILLAH SALMAN SOFYAN', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111071.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111074', 'SANG ANGGA SYAH MAULANA IBRAHIM', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111074.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111075', 'FIRENA KUSUMANINGTYAS PURWANTO', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111075.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111078', 'I MADE BAGUS N S', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111078.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111082', 'CHINTYADEWI HESAGILANG RAMADHANI', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111082.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070100111084', 'ANNISA ARIMASTUTI', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070100111084.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111001', 'Sri Utami', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111001.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111003', 'Iqbal Mauliddin Rosul', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111007', 'Dira Intan Triayu Putri N', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111008', 'Dini Rahmania Afandi ', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111008.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111010', 'R. Galih Agung Pragiwaksana', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111010.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111011', 'Livia Lailita Sari', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111011.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111015', 'Muhammad Rizki Fauzi', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111015.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111018', 'Ninda Farahdina Nauroh', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111018.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111020', 'Nadya Vira Saputri', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111020.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111021', 'Fauzi Abdillah', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111021.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111022', 'Clarisa Takbira Sugiatno', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111022.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111024', 'Hayyu Rafina Sanjaya', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111024.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111027', 'Istaufa Fauzah', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111027.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111029', 'Siti Ayu Raychika Syampera', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111029.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111030', 'Muhammad Ogan Islakhul Idham', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111030.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111037', 'Sri Ayu Marlevia Br Karo', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111037.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111038', 'Sandova Almas Fadiansyah', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111038.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111039', 'Militanisa Zamzara Arvianti', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111039.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111040', 'Emanuela Indah Hanani', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111040.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111041', 'Rizki Maulidhea Fakhmi', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111041.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111042', 'Stevani Budiharjo', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111042.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111045', 'Angie Devina', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111045.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111047', 'Nurina Hadini Hasya', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111047.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111050', 'Almira Pramadhani', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111050.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111051', 'Luluk Maisaroh', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111051.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111052', 'Naura Anindya Candini', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111052.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111053', 'Muhammad Dzulfikar Arminsya', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111053.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111054', 'Ferine Ludytajati', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111054.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111056', 'Trisha Astari Anggraeni', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111056.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111057', 'Herizal Tarigan', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111057.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111061', 'Azmi Aziz Nur Arraga', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111061.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111063', 'Dennis Wafa Giovanni', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111063.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111065', 'Alrizza Kurnia Rizqi', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111065.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111067', 'Rivaldo Brahmantio Hardani', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111067.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111068', 'Safira Fairuz Adani', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111068.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070101111079', 'Alifia Ramadanty Ardinuri', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070101111079.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111001', 'NABILA ULFAYANI HANIFAH', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111001.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111005', 'Fajar Haikal Ashomadoni', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111005.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111006', 'Sidah Nur Faizah', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111006.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111011', 'Cyndi Putri Novilia', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111011.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111017', 'SAFIRA FAKHRIZAH WILDANI', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111017.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111022', 'Rininta Dewi Syahfitri', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111022.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111023', 'Raden Rachmad Aditya', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111023.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111024', 'RAIHAN GHALIB PRAKOSO PUTRA', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111024.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111026', 'MOHAMMAD HABIBI', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111026.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111027', 'MITA YUNIAWATI PRATIWI', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111027.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111032', 'Nur Laila Putri Widiani', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111032.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111033', 'CHRISTIAN AMBROSIUS SOEIONO', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111033.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111034', 'Amalda Widia Besari', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111034.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111036', 'Joshua Tande Jayapratama', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111036.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111037', 'RISKI VENIA RAHMATILLAH', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111037.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111042', 'Fachri Baladraf', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111042.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111044', 'Aisha Putri Setiowati', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111044.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111048', 'HARIRA', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111048.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111050', 'Theresa Puspanadi', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111050.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111054', 'Muhammad Revi R', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111054.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111057', 'Nadya Ratu Chesty Maharani Saleh', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111057.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111061', 'TITO SANJAYA', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111061.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070107111062', 'Angga Rifqi Mujidiatama', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070107111062.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070112111001', 'Avicenna Hanan Alim', 'Kedokteran', 'Kedokteran', 'Kedokteran', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070112111001.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070200111001', 'MIFTAKHUL RIZKY ANDAYANI NURKHOLILA', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070200111001.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070200111004', 'NAFISAH', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070200111004.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070200111006', 'NURMALIA FILDA SYAFIKY', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070200111006.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070200111008', 'TYAS FEBRI GHEA RACHMADI', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070200111008.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070200111011', 'ANJAS FLORENZA MARGIANTO', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070200111011.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070200111025', 'AINI NUR FARIHAH', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070200111025.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070200111026', 'AZMIYA NAUFALA JAYANTI', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070200111026.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070200111029', 'ARBIDHIO PRIHANDANA', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070200111029.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070201111006', 'Titi Cahyanti', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070201111006.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070201111007', 'Diana Nanda Saputri', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070201111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070201111008', 'Annisa Fatia Putri', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070201111008.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070201111020', 'Rizky Karuniawati', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070201111020.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070201111022', 'Dwi Harsanto Kurniawan', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070201111022.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070201111025', 'Virda Sari', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070201111025.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070201111028', 'Unyati', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070201111028.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL);
INSERT INTO `users` (`id`, `nama`, `fakultas`, `jurusan`, `prodi`, `status`, `is_admin`, `email`, `kontak`, `foto`, `nik`, `jenis_kelamin`, `tanggal_lahir`, `foto_ktp`, `cv`, `pendidikan_terakhir`, `fcm`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('165070201111030', 'Febry Priscila', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070201111030.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070201111031', 'Winda Tri Anggraeni Putri', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070201111031.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070207111009', 'Suci Wulandari Sassanti', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070207111009.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070207111012', 'MARISA DEVINA AGUSTIN', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070207111012.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070207111015', 'FITRI ROSYIDAWATI', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070207111015.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070207111018', 'Styradixa Widhi Trymitha', 'Kedokteran', 'Keperawatan', 'Ilmu Keperawatan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070207111018.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111002', 'AYU LESTARI', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111002.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111003', 'ATTIFA YUHA NURHAYATI', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111005', 'FANNY NOVANTY NUR HANIFAH', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111005.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111006', 'SRI PUJI ASTUTI', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111006.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111009', 'REYNA RACHMA WATI', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111009.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111011', 'WIRYA NANDA KURNIAWAN', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111011.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111012', 'MUTHIA PARAMITA', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111012.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111013', 'NADIA AMALIALJINAN', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111013.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111015', 'JOHANNA ANGKASA PUTRI', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111015.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111016', 'TSANIA NUR MUHARRAMA', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111016.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111017', 'NUR AMALIAH AHMAD', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111017.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111018', 'HANIFAH ABDUL HADI', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111018.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111020', 'ADDIEN ZAHRATUL AISYI AL FARAHI', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111020.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111021', 'SYAHAR BANU', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111021.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111025', 'FITYATUR ROSYIDAH', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111025.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111028', 'RAHMA TRI HUTAMI', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111028.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070300111030', 'EVITA VIRGINIA SIHOMBING', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070300111030.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111002', 'Della Refa Hendrianti', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111002.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111003', 'Siti Isfania Kayla Ramandhika', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111005', 'Ahmad Ramadhan', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111005.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111007', 'Erwanda Maharani', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111009', 'Wihda Liuswatin Alfafa', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111009.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111010', 'Syafiatul Azizah', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111010.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111011', 'Pramudhia Khansa Kirana', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111011.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111012', 'Indri Hafida', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111012.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111013', 'Agustin Putri Rahayu', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111013.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111017', 'Zhafirah Salma Putri', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111017.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111019', 'IMA SETYAWATI', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111019.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111020', 'Dhea Chairunisah Nurmaya', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111020.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111021', 'Ayudia Agustina R A', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111021.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111023', 'Fitri Asri Cahyantika', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111023.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111024', 'Ririk Dwi Anjani', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111024.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111027', 'Sevy Anggita Putri Ayuningtyas', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111027.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111028', 'Zaranada Afifah Yumna', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111028.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111030', 'Tsabitah Nabila Pratiwi', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111030.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111032', 'Neneng Fina Mafazah', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111032.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111035', 'Tri amanda', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111035.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111037', 'Dinda Nur Atikah', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111037.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111040', 'Chica Bonyfa Rahma', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111040.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111041', 'Maria Lelly Aswindani', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111041.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111043', 'Pita', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111043.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111044', 'Shouqi Aji Wiranata', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111044.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070301111045', 'Syifa Faradhilla', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070301111045.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070307111001', 'felicia kleantha setiadi', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070307111001.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070307111002', 'Dewi Rahmawati', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070307111002.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070307111003', 'YUNDA AULIA RAHMA', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070307111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070307111004', 'Katarina Dian Permatasari', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070307111004.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070307111008', 'IFFANA MAHIROR AZHAAR ASHAD', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070307111008.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070307111010', 'ULFAH AMIRAH FADIYAH', 'KEDOKTERAN', '', '', 'mahasiswa', 'no', '', '087759869620', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070307111010.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070307111015', 'Putri Maulidia Permata', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070307111015.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070307111016', 'PRIMARIDIANA PRADIPTASARI', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070307111016.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070307111020', 'Syahvira Kanza Herstyana Putri', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070307111020.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070307111022', 'farhana husna amaliyah', 'Kedokteran', 'Gizi', 'Ilmu Gizi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070307111022.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070500111004', 'DISKA YUNIAROHIM', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070500111004.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070500111007', 'PUTRI SAL SABILLAH IKLIYIN', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070500111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070500111009', 'PUTU DEWI PRADNYA PARAMITHA', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070500111009.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070500111010', 'IMROATUL HASANAH', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070500111010.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070500111011', 'SALSABILA RANIAH', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070500111011.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070500111013', 'ANINDA RIZKI ADITAMA', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070500111013.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070500111014', 'AINUN FATUTA ALMUJIASIH', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070500111014.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070500111017', 'SHAFIRA NUR ILMI', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070500111017.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070500111018', 'AVIRA HAJAR SAWITRI', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070500111018.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070500111020', 'MUHAMMAD FAHMI HIDAYAT', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070500111020.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070500111023', 'CARISSA DWI PUSPITA', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070500111023.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070500111024', 'NURLITA DWI RAHMANINGTIA', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070500111024.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111003', 'Avila Silsivaga Dwijaya', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111004', 'Rory Anggi Okta Senora', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111004.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111007', 'Joshua Alexandro Milano Luluporo', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111010', 'Tia Eka Aprilia', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111010.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111011', 'Dimas Awang Erlangga', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111011.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111012', 'Sinta Oki Lianara', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111012.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111017', 'Lintang Rizkian Nur Yuda', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111017.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111018', 'I`id Wahidatul Karomiyah', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111018.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111019', 'Nicmah Aprilia Iriani Putri', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111019.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111020', 'Nabila Maretha', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111020.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111021', 'Alifia Rahmi Nurfitri', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111021.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111024', 'Rizky Fernanda Sulaiman', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111024.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111025', 'Anis Saraswati', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111025.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111029', 'Indira Hatmanti Puspitasari', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111029.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111030', 'Annisa Intan Ramadhani', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111030.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111037', 'Lince Mardiyanti', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111037.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070501111038', 'Andryaz Carwi Pratiwi', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070501111038.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070507111003', 'Sonia Maskurotin Ratna Intani', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070507111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070507111013', 'AFIF BURHAN IRWANTO', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070507111013.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070507111016', 'Nada Arum Wardhani', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070507111016.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070507111018', 'Inas Okti Anggita Sari', 'Kedokteran', 'Farmasi', 'Farmasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070507111018.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070600111003', 'ZAKI FAJAR ROKHMAH', 'Kedokteran', 'Kebidanan', 'Kebidanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070600111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070600111005', 'NADA PUTRI KALISA', 'Kedokteran', 'Kebidanan', 'Kebidanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070600111005.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070600111009', 'HAFIDZA AULIYA', 'Kedokteran', 'Kebidanan', 'Kebidanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070600111009.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070600111013', 'ZAKIYA MILADYA CHOIROH', 'Kedokteran', 'Kebidanan', 'Kebidanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070600111013.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070601111003', 'Diah Ayuningtyas', 'Kedokteran', 'Kebidanan', 'Kebidanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070601111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070601111004', 'R.A. Rahmawati Nurul Fadilah', 'Kedokteran', 'Kebidanan', 'Kebidanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070601111004.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070601111012', 'Ni Kadek Diah Kartika Dewi', 'Kedokteran', 'Kebidanan', 'Kebidanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070601111012.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070601111014', 'Rahma Haryunita Ega Prosfera', 'Kedokteran', 'Kebidanan', 'Kebidanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070601111014.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070601111016', 'Hanief Oktavia Aziz', 'Kedokteran', 'Kebidanan', 'Kebidanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070601111016.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070607111002', 'Nadia Nur Fadila', 'Kedokteran', 'Kebidanan', 'Kebidanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070607111002.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070607111010', 'Annisa Rizky Aprillianna', 'Kedokteran', 'Kebidanan', 'Kebidanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070607111010.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165070607111012', 'NI LUH GEDE DIAN SUTARINI', 'Kedokteran', 'Kebidanan', 'Kebidanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165070607111012.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080100111038', 'NADILLA DZULFIANNISA', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Manajemen Sumberdaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080100111038.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080101111019', 'Masrur Roziqin', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Manajemen Sumberdaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080101111019.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080101111025', 'Fauzi Dwi Hutomo', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Manajemen Sumberdaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080101111025.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080107111007', 'MUchammad Alif Halilintar', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Manajemen Sumberdaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080107111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080107111011', 'UHA SUKMAKANTATA ELYESDEY', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Manajemen Sumberdaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080107111011.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080107111028', 'MUHAMAD AZRAN FADLILLAH', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Manajemen Sumberdaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080107111028.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080200111006', 'MUCHAMMAD CHOIRUL MUFASHILIN', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080200111006.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080200111016', 'ELYA MAULA IMROATUL KHASANAH', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080200111016.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080200111017', 'SINTA ANGGER TRISKA LARASATI', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080200111017.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080200111038', 'FRANSISCA SARIULI PUTRI T', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080200111038.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080200111046', 'ARBI NURHAKIM', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080200111046.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080200111048', 'DEANDRA LINTANG PANGESTU', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080200111048.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080201111015', 'Rahma Al Islami', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080201111015.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080201111042', 'Ayuri', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080201111042.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080201111043', 'Trisnanda Devi Oktavia', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080201111043.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080201111044', 'Indri Sari Ismaningsih', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080201111044.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080201111065', 'Naily Maufiroh', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080201111065.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080207111013', 'ALFIN MUHAMMAD', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080207111013.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080207111022', 'NOFITA AYU ANDINI', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080207111022.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080207111024', 'RIO DWI CAHYO', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080207111024.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080207111028', 'Sutan Abdillah Ali Sinar Paqsi', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080207111028.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080207111033', 'Bagus Prasetyo Aji', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080207111033.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080207111037', 'MISTAHUL ARIFIN', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Pemanfaatan Sumberdaya Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080207111037.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080300111029', 'NOVIA ULFA HARUM JAIZA', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Teknologi Hasil Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080300111029.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080300111032', 'VALDO APRILIO', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Teknologi Hasil Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080300111032.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080301111002', 'Nilasari Fitria', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Teknologi Hasil Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080301111002.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080301111024', 'Bagas Prasetya', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Teknologi Hasil Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080301111024.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080301111029', 'Citra Cahya Mabruuroh', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Teknologi Hasil Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080301111029.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080400111008', 'KRISNA PRAYUDA', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080400111008.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080400111010', 'NURUL HASANAH', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080400111010.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080400111015', 'REZA NANDA PURISTA', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080400111015.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080400111017', 'MUHIMATUL ALIYAH', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080400111017.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080400111021', 'FATIH RUKMANA SARI', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080400111021.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080400111030', 'NENENG NURLAILA', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080400111030.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080400111031', 'LIRAWATI YUNIAR PUTRI', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080400111031.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080400111032', 'MUHAMMAD AFIF MA`RUF', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080400111032.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080400111035', 'SATYA PERMANA ADITAMA', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080400111035.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080400111039', 'MIA WINDYANINGSIH', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080400111039.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080400111045', 'GILDA METADILA RACHMAN', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080400111045.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080400111048', 'LIONY TETANIA', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080400111048.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080400111049', 'ARNEL ALHADI', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080400111049.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080400111050', 'MUHAMMAD ALFAN TRI ATMAJA', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080400111050.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080400111052', 'DEWI RAHMAWATI ANGGUN CAHYANINGSIH', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080400111052.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111001', 'Siti Nadiyanti', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111001.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111003', 'Inggrid Belanurjanah Sulaiman', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111006', 'Sofyan Theo Juliansyah', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111006.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111013', 'Kusnul Khotimah', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111013.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111016', 'Rif`atul Ma`rifah', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111016.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111017', 'Novia Indriani', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111017.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111020', 'Yunita Sri Lestari', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111020.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111022', 'Ahmad Kurniawan', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111022.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111030', 'Bhellyn Wahyu Putri', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111030.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111036', 'Fadhilah Luthfi', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111036.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111038', 'Novinda Agnike Putri', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111038.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111040', 'Nanda Aisyah Alwiyah', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111040.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111044', 'Nurlita Setia Murni', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111044.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111045', 'Wahyuningtias', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111045.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111047', 'Nunila Febrilia Santi', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111047.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111048', 'Hanandaru Riko Parama Mahendro', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111048.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111050', 'Nahdyatul Khair', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111050.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111055', 'Endah Sari Purwanti', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111055.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111057', 'Fadhellia Vidia Astuti R', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111057.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080401111059', 'Dewi Maulidatuz Zahroh', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080401111059.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080407111007', 'Muhammad Fajar Maulana', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080407111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080407111018', 'Iqbal Imaduddin', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080407111018.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080407111020', 'Himma Islamiyah', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080407111020.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080407111021', 'Sabrina Prasetya Prahamesti', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080407111021.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL);
INSERT INTO `users` (`id`, `nama`, `fakultas`, `jurusan`, `prodi`, `status`, `is_admin`, `email`, `kontak`, `foto`, `nik`, `jenis_kelamin`, `tanggal_lahir`, `foto_ktp`, `cv`, `pendidikan_terakhir`, `fcm`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('165080407111024', 'Alifiatul Iszah', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080407111024.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080407111025', 'Renata Maharany', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080407111025.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080407111031', 'Rama Arya Macky', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080407111031.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080407111039', 'Dharma kurniawan', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080407111039.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080418113005', 'SUNU CAHYO NUGROHO', 'Perikanan dan Ilmu Kelautan', 'Sosial Ekonomi Perikanan', 'Agrobisnis Perikanan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080418113005.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080500111005', 'AKBAR MEI TRIYANTO', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Budidaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080500111005.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080500111018', 'RAHMA RAFIKA', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Budidaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080500111018.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080500111044', 'SALMA', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Budidaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080500111044.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080500111048', 'DATU PUAN ABSA', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Budidaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080500111048.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080501111033', 'Doni Irawan', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Budidaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080501111033.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080501111048', 'Imron Nurmahadi', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Budidaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080501111048.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080501111053', 'Khusnul Khotimah', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Budidaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080501111053.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080507111004', 'NAVARO RAFAEL HAQQA ALTHOV', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Budidaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080507111004.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080507111016', 'RIFQI AR', 'PERIKANAN DAN ILMU KELAUTAN', '', '', 'mahasiswa', 'no', '', '087846016205', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080507111016.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080507111029', 'Salma Putri Mayang Sari', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Budidaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080507111029.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080507113001', 'Ardian Dio Budi Setyawan', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Budidaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080507113001.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080507113002', 'Maulana Mashudi Yusup', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Budidaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080507113002.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080507113004', 'NINDY EKA BERLIANA', 'Perikanan dan Ilmu Kelautan', 'Manajemen Sumberdaya Perairan', 'Budidaya Perairan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080507113004.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080600111001', 'YUDI FEBRIAN', 'PERIKANAN DAN ILMU KELAUTAN', '', '', 'mahasiswa', 'no', '', '082139142909', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080600111001.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080600111034', 'M. RAMDAN YUSFA', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Ilmu Kelautan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080600111034.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080601111040', 'Moch. Rizaldi Akbar', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Ilmu Kelautan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080601111040.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080601111049', 'Ananda Claudio Putra Miryawan', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Ilmu Kelautan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080601111049.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080601111067', 'Sahril Dhaimarhan', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Ilmu Kelautan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080601111067.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165080607111029', 'Shinta Diana Ayu Safitri', 'Perikanan dan Ilmu Kelautan', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'Ilmu Kelautan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165080607111029.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090100111018', 'ERINDA HIDAYATUS SAFITRI', 'Matematika dan IPA', 'Biologi', 'Biologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090100111018.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090100111019', 'NURADI', 'Matematika dan IPA', 'Biologi', 'Biologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090100111019.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090100111022', 'AZIZUDDIN MUHAMMAD NASHAFI', 'Matematika dan IPA', 'Biologi', 'Biologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090100111022.jpg', NULL, NULL, '0000-00-00', NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090200111017', 'INDIANA ZULFA', 'Matematika dan IPA', 'Kimia', 'Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090200111017.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090200111034', 'DAMAN BUDI PRIYANTO', 'Matematika dan IPA', 'Kimia', 'Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090200111034.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090200111040', 'ADE DIRGAH RAHAKBAUW', 'Matematika dan IPA', 'Kimia', 'Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090200111040.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090201111010', 'Shobbu Ibabas Sholihat', 'Matematika dan IPA', 'Kimia', 'Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090201111010.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090201111021', 'Fitria Handayani', 'Matematika dan IPA', 'Kimia', 'Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090201111021.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090201111024', 'Nusindra Dwi Putra Dewangga', 'Matematika dan IPA', 'Kimia', 'Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090201111024.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090207111007', 'Adi Dwi Ashari', 'Matematika dan IPA', 'Kimia', 'Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090207111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090207111021', 'Miralda Syakirah', 'Matematika dan IPA', 'Kimia', 'Kimia', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090207111021.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090300111003', 'Mochamad Irfanudin', '', '', '', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090300111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090300111014', 'MAJDI ROID AL-JIHAD', 'Matematika dan IPA', 'Fisika', 'Fisika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090300111014.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090300111027', 'ABDUL WAHAB RAJABI', 'Matematika dan IPA', 'Fisika', 'Fisika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090300111027.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090301111036', 'Gilang Asmo Negoro', 'Matematika dan IPA', 'Fisika', 'Fisika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090301111036.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090400111001', 'EKO DEDI PRAMANA', 'Matematika dan IPA', 'Matematika', 'Matematika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090400111001.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090400111017', 'FINDY PRASTICA FERDIANDINI', 'Matematika dan IPA', 'Matematika', 'Matematika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090400111017.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090400111021', 'ADITYA FAUZAN NUR', 'Matematika dan IPA', 'Matematika', 'Matematika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090400111021.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090401111027', 'Faninda Rama Daniar', 'Matematika dan IPA', 'Matematika', 'Matematika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090401111027.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090407111007', 'MAGHFIRA RAHMADIATI', 'Matematika dan IPA', 'Matematika', 'Matematika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090407111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090407111008', 'LAILIA ANUGERAH KESUMA', 'Matematika dan IPA', 'Matematika', 'Matematika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090407111008.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090407111013', 'RAFIFA RAFIDA FITRI', 'Matematika dan IPA', 'Matematika', 'Matematika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090407111013.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090407111021', 'MUHAMMAD FAISAL IRSYAD', 'Matematika dan IPA', 'Matematika', 'Matematika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090407111021.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090501111001', 'Muhammad Fajar Zulkifli', 'Matematika dan IPA', 'Statistika', 'Statistika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090501111001.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090507111024', 'FATHIMATUZ ZAHRO', 'Matematika dan IPA', 'Statistika', 'Statistika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090507111024.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090707111020', 'YOGAWINDY FAJAR MUSTTAQIN', 'Matematika dan IPA', 'Fisika', 'Teknik Geofisika', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090707111020.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090800111003', 'M. RIFKI FAUZI', 'Matematika dan IPA', 'Fisika', 'Instrumentasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090800111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090800111011', 'WIDYA AYU MANGESTI', 'Matematika dan IPA', 'Fisika', 'Instrumentasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090800111011.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090801111003', 'Dina Aulia', 'Matematika dan IPA', 'Fisika', 'Instrumentasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090801111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165090807111011', 'Rizhaf Setyo Hartono', 'Matematika dan IPA', 'Fisika', 'Instrumentasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165090807111011.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100100111008', 'ALYA WAHYUNING PRATIWI PUTRI', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Ilmu dan Teknologi Pangan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100100111008.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100100111010', 'THOMAS PRAYOGO', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Ilmu dan Teknologi Pangan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100100111010.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100100111025', 'ARVIN ASSANNY', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Ilmu dan Teknologi Pangan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100100111025.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100100111029', 'TIARA PERMATANISA', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Ilmu dan Teknologi Pangan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100100111029.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100100111042', 'FARAH ANINDYA SHAFAKARIMA', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Ilmu dan Teknologi Pangan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100100111042.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100100111050', 'SYARIFATUL IZZA', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Ilmu dan Teknologi Pangan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100100111050.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100101111007', 'M. Iqbal Baihaqi', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Ilmu dan Teknologi Pangan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100101111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100101111008', 'Widya Arifah Anggraeni', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Ilmu dan Teknologi Pangan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100101111008.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100101111015', 'Dwi Lestari Wibawati', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Ilmu dan Teknologi Pangan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100101111015.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100101111020', 'Zulfa Afifahul Mufida', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Ilmu dan Teknologi Pangan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100101111020.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100101111043', 'Rahmawati Lutfiyah Dewi', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Ilmu dan Teknologi Pangan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100101111043.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100101111059', 'Anisa Fahmi Rahmatika', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Ilmu dan Teknologi Pangan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100101111059.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100107111004', 'Yolanda Dwi Murweni', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Ilmu dan Teknologi Pangan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100107111004.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100107111012', 'Achmad Aqil Zuhdi', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Ilmu dan Teknologi Pangan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100107111012.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100107111015', 'Riko Susiloputro', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Ilmu dan Teknologi Pangan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100107111015.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100107111030', 'Nabila Nuraini', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Ilmu dan Teknologi Pangan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100107111030.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100200111002', 'REDITYO ADE MARCELLINO', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100200111002.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100200111003', 'IIP KURNIA OCTAVIORENTIWI', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100200111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100200111005', 'HARIS MAWARDI', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100200111005.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100200111016', 'BINTI NUR FANI`MATUS SA`DIYAH', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100200111016.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100200111019', 'DAMAR SETYA KRESNA ADI', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100200111019.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100200111031', 'REZA RIENALDY PUTRA', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100200111031.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100200111036', 'HAFIZHA EGA LU`AY', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100200111036.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100201111007', 'Wahyu Dhiki Saputro', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100201111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100201111050', 'Muhammad Irfan Nuha', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100201111050.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100207111003', 'MUHAMMAD YONANTA CAHYO PRABOWO', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100207111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100300111009', 'MUHAMMAD IHWAN SEPTIANSAH', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '1', '11', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100300111009.jpg', NULL, NULL, '2020-01-24', NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100300111016', 'NIKEN DHASA WULAN', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100300111016.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100300111041', 'RACHEEL DEVI SHABRINA', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100300111041.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100300111044', 'ARIAN MUHAMMAD RAIHAN', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100300111044.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100301111005', 'Satyarani Galuh S', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100301111005.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100301111013', 'Amilatun Mardiyah', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100301111013.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100301111026', 'Yogatama Teguh Octafiandi', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100301111026.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100301111033', 'Afrizal Auliya Ansori', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100301111033.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100301111034', 'Dimas Ikhfanul Dwi Putra', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100301111034.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100301111040', 'Ayu Puspita Sari', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100301111040.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100301111042', 'Mohammad Wiranto Aris M', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100301111042.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100301111056', 'Sang Norma Lintang A', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100301111056.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100301111059', 'Muhammad Fadhlan Ar - Rashid', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100301111059.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100301111062', 'Lucky Wiratama', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100301111062.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100301111074', 'Khusika Dhamar Gusti', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100301111074.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100307111006', 'Mohammad Reza', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100307111006.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100307111008', 'Irwan Maulana', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100307111008.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100307111019', 'Chastita Hikmatun Nisa', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100307111019.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100307111025', 'ALFIYATUS SHOLIHAH ASMADI', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100307111025.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100307111038', 'Rizky Adhiansyah', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100307111038.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100307111044', 'Suci Wahyu Ramadhanti', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100307111044.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100307111054', 'Farhan Andafa', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100307111054.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100307111058', 'IRFAN ARI PRASETIYO', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100307111058.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100307111062', 'DIVA MIZAN AHMAD', 'Teknologi Pertanian', 'Teknologi Industri Pertanian', 'Teknologi Industri Pertanian', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100307111062.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100500111004', 'AISYI SAKINA RIFANI', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Bioteknologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100500111004.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100500111005', 'MOH. ZAINURI', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Bioteknologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100500111005.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100500111012', 'CHRISTINA EKAWATI HALIM', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Bioteknologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100500111012.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100501111004', 'Septian Yosafat', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Bioteknologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100501111004.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100501111016', 'Aldrian Febriansyah', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Bioteknologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100501111016.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100501111019', 'Yoga Satria Setiawan', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Bioteknologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100501111019.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100501111022', 'Nur Fauziyah', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Bioteknologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100501111022.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100501111024', 'Raihan Luthfi', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Bioteknologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100501111024.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100501111028', 'Novarina Widya', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Bioteknologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100501111028.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100507111003', 'Anjastari nur aisyah', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Bioteknologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100507111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100507111015', 'Bisri', 'Teknologi Pertanian', 'Ilmu dan Teknologi Pangan', 'Bioteknologi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100507111015.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100600111003', 'SALSABILLA FIRDAUS', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknologi Bioproses', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100600111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100600111014', 'SUHAIMI', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknologi Bioproses', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100600111014.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100600111024', 'P. LEON CARLO R. EMOR', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknologi Bioproses', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100600111024.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100601111014', 'Desy Hani Dhiasari', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknologi Bioproses', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100601111014.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100607111008', 'Mohammad Hisyam Hanifah', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknologi Bioproses', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100607111008.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100900111007', 'FAIRUZ ALYKA', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100900111007.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100900111013', 'MUTIA IZZATI', 'TEKNOLOGI PERTANIAN', '', '', 'mahasiswa', 'no', '', '085723582468', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100900111013.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100900111015', 'FATIMAH NURUL MAHDIYAH JAYATRI', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100900111015.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100900111021', 'NADYA RAHMANITA', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100900111021.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100900111023', 'RACHMAH GUSVIKA KOMAR', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100900111023.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100900111029', 'MA`MUN `AFIF', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100900111029.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100901111006', 'Dhiajeng Setyaning Pratiwi', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100901111006.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100901111012', 'Fina Aprillia Sari', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100901111012.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100901111014', 'Kiki', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100901111014.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100901111022', 'Siti Munawaroh', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100901111022.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100901111028', 'Alfin Munfaridatul Mauliddiyah', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100901111028.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100901111031', 'Robert Antonius', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100901111031.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100901111033', 'Zaki Yamin Idris', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100901111033.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100907111004', 'PUSPITA RHIZQY YUNIA', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100907111004.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100907111019', 'Adam Taufan Firdaus', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100907111019.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100907111027', 'Fita Nestria Putri', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100907111027.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100907111029', 'ADNAN NIBRAS KAUTSAR', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100907111029.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100907111030', 'FARAS TRI KUSNANTO', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100907111030.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165100907111032', 'Ichi Fiaqi Hamada', 'Teknologi Pertanian', 'Keteknikan Pertanian', 'Teknik Lingkungan', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165100907111032.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165110100111015', 'HAFIZH AKBAR PRATAMA', 'Fak Ilmu Budaya', 'Bahasa dan Sastra', 'Sastra Inggris', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165110100111015.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165110100111033', 'AINEZ MAUDYA LISTIYONO', 'Fak Ilmu Budaya', 'Bahasa dan Sastra', 'Sastra Inggris', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165110100111033.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165110100111042', 'FATMA ULULAZMI TUARISSA', 'Fak Ilmu Budaya', 'Bahasa dan Sastra', 'Sastra Inggris', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165110100111042.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165110101111018', 'Maulita Ridha Hafshah', 'Fak Ilmu Budaya', 'Bahasa dan Sastra', 'Sastra Inggris', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165110101111018.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165110101111035', 'Dinda Tri Diastara', 'Fak Ilmu Budaya', 'Bahasa dan Sastra', 'Sastra Inggris', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165110101111035.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165110101111038', 'Siti Afi Faida', 'Fak Ilmu Budaya', 'Bahasa dan Sastra', 'Sastra Inggris', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165110101111038.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165110107111006', 'NABILLA SEKARAYU AMALIA', 'Fak Ilmu Budaya', 'Bahasa dan Sastra', 'Sastra Inggris', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165110107111006.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165110200111002', 'NILNA NADHIROH NISWAH', 'Fak Ilmu Budaya', 'Bahasa dan Sastra', 'Sastra Jepang', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165110200111002.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165110200111018', 'ZASQIA RISKY SETIAWAN', 'Fak Ilmu Budaya', 'Bahasa dan Sastra', 'Sastra Jepang', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165110200111018.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165110201111024', 'Ruth Putri Octavia Dewi', 'Fak Ilmu Budaya', 'Bahasa dan Sastra', 'Sastra Jepang', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165110201111024.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165110307111003', 'Tri Supriansyah', 'Fak Ilmu Budaya', 'Bahasa dan Sastra', 'Bahasa dan Sastra Perancis', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165110307111003.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '', '2020-05-17 13:30:56', NULL, NULL),
('165150401111060', 'Ghany Abdillah Ersa', 'Fakultas Ilmu Komputer', 'Sistem Informasi', 'Sistem Informasi', 'mahasiswa', 'admin', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165150401111060.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '165150401111060', '2020-05-17 11:43:51', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aset_FKIndex1` (`perusahaan_id`);

--
-- Indexes for table `aspek_bisnis`
--
ALTER TABLE `aspek_bisnis`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `aspek_bisnis_FKIndex1` (`produk_id`);

--
-- Indexes for table `data_dasar`
--
ALTER TABLE `data_dasar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_dasar_FKIndex1` (`produk_id`);

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
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informasi_FKIndex1` (`produk_id`);

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
-- Indexes for table `kekayaan_intelektual`
--
ALTER TABLE `kekayaan_intelektual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kekayaan_intelektual_FKIndex1` (`produk_id`);

--
-- Indexes for table `kepemilikan`
--
ALTER TABLE `kepemilikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kepemilikan_FKIndex1` (`perusahaan_id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mitra_FKIndex1` (`produk_id`);

--
-- Indexes for table `omset_profit`
--
ALTER TABLE `omset_profit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `omset_profit_FKIndex1` (`produk_id`);

--
-- Indexes for table `pemasaran`
--
ALTER TABLE `pemasaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemasaran_FKIndex1` (`produk_id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuan_FKIndex1` (`produk_id`);

--
-- Indexes for table `pengujian`
--
ALTER TABLE `pengujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengujian_FKIndex1` (`produk_id`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`users_id`,`perusahaan_id`),
  ADD KEY `users_has_perusahaan_FKIndex1` (`users_id`),
  ADD KEY `users_has_perusahaan_FKIndex2` (`perusahaan_id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_FKIndex1` (`produk_id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prestasi_FKIndex1` (`produk_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produksi_FKIndex1` (`produk_id`);

--
-- Indexes for table `produk_perusahaan`
--
ALTER TABLE `produk_perusahaan`
  ADD PRIMARY KEY (`produk_id`,`perusahaan_id`),
  ADD KEY `produk_has_perusahaan_FKIndex1` (`produk_id`),
  ADD KEY `produk_has_perusahaan_FKIndex2` (`perusahaan_id`);

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
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_dasar`
--
ALTER TABLE `data_dasar`
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
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
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
-- AUTO_INCREMENT for table `kepemilikan`
--
ALTER TABLE `kepemilikan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `omset_profit`
--
ALTER TABLE `omset_profit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemasaran`
--
ALTER TABLE `pemasaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengujian`
--
ALTER TABLE `pengujian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roadmap`
--
ALTER TABLE `roadmap`
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
-- Constraints for table `aset`
--
ALTER TABLE `aset`
  ADD CONSTRAINT `aset_ibfk_1` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `aspek_bisnis`
--
ALTER TABLE `aspek_bisnis`
  ADD CONSTRAINT `aspek_bisnis_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `data_dasar`
--
ALTER TABLE `data_dasar`
  ADD CONSTRAINT `data_dasar_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `informasi`
--
ALTER TABLE `informasi`
  ADD CONSTRAINT `informasi_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `kepemilikan`
--
ALTER TABLE `kepemilikan`
  ADD CONSTRAINT `kepemilikan_ibfk_1` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mitra`
--
ALTER TABLE `mitra`
  ADD CONSTRAINT `mitra_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `omset_profit`
--
ALTER TABLE `omset_profit`
  ADD CONSTRAINT `omset_profit_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pemasaran`
--
ALTER TABLE `pemasaran`
  ADD CONSTRAINT `pemasaran_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pengujian`
--
ALTER TABLE `pengujian`
  ADD CONSTRAINT `pengujian_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `pengurus_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pengurus_ibfk_2` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `produksi_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produk_perusahaan`
--
ALTER TABLE `produk_perusahaan`
  ADD CONSTRAINT `produk_perusahaan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `produk_perusahaan_ibfk_2` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
