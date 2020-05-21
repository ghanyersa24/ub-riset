-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 03:54 AM
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `harga_produksi` text NOT NULL,
  `bmc` tinytext NOT NULL,
  `keuangan` tinytext NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(10) UNSIGNED NOT NULL,
  `fcm` varchar(255) DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventor`
--

CREATE TABLE `inventor` (
  `produk_id` int(10) UNSIGNED NOT NULL,
  `users_id` varchar(15) NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `omset_profit`
--

CREATE TABLE `omset_profit` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `tipe` enum('Omset','Profit') NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `nilai` int(10) UNSIGNED DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `file_tkt` tinytext DEFAULT NULL,
  `file_katsinov` tinytext NOT NULL,
  `status` enum('diajukan','diperiksa','dinilai') NOT NULL,
  `verifikator` varchar(15) DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` char(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `satuan` tinytext NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jumlah` varchar(15) DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `is_delete` tinyint(1) NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `bidang` tinytext NOT NULL,
  `kategori` text NOT NULL,
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
  `is_delete` tinyint(1) NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jumlah` varchar(15) DEFAULT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk_perusahaan`
--

CREATE TABLE `produk_perusahaan` (
  `produk_id` int(10) UNSIGNED NOT NULL,
  `perusahaan_id` int(10) UNSIGNED NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seen`
--

CREATE TABLE `seen` (
  `produk_id` int(10) UNSIGNED NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `fakultas`, `jurusan`, `prodi`, `status`, `is_admin`, `email`, `kontak`, `foto`, `nik`, `jenis_kelamin`, `tanggal_lahir`, `foto_ktp`, `cv`, `pendidikan_terakhir`, `fcm`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('165150401111060', 'Ghany Abdillah Ersa', 'Fakultas Ilmu Komputer', 'Sistem Informasi', 'Sistem Informasi', 'mahasiswa', 'no', '', '', 'https://siakad.ub.ac.id/dirfoto/foto/foto_2016/165150401111060.jpg', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, '165150401111060', '2020-05-20 13:46:33', NULL, '2020-05-21 01:23:37'),
('admin super', 'Super Admin', 'BIW Corporation', '', '', 'mahasiswa', 'admin', '', '', 'https://i.pinimg.com/originals/28/93/ca/2893ca2a6c253b745b5ce9a7ce70c9ba.png', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, 'admin super', '2020-05-19 19:22:00', NULL, '2020-05-21 01:23:37'),
('verifikator', 'Tim Verifikator', 'BIW Corporation', '', '', 'mahasiswa', 'verifikator', '', '', 'https://media.tabloidbintang.com/files/thumb/1111af44ae808bc127ab84342b15af5a.jpg/745', NULL, NULL, NULL, NULL, NULL, 'SMA/Sederajat', NULL, 'verifikator', '2020-05-19 19:27:59', NULL, '2020-05-21 01:23:37');

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
