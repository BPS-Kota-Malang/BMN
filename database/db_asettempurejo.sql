-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 05, 2022 at 08:38 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asettempurejo`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow_products`
--

CREATE TABLE `borrow_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` double DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_peminjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `petugas` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kondisi_setelahdipinjam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_merk` bigint(20) UNSIGNED NOT NULL,
  `id_lokasi` bigint(20) UNSIGNED NOT NULL,
  `id_gudang` bigint(20) UNSIGNED NOT NULL,
  `id_department` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrow_products`
--

INSERT INTO `borrow_products` (`id`, `kode_peminjaman`, `jumlah`, `deskripsi`, `nama_peminjam`, `petugas`, `tanggal_pinjam`, `tanggal_kembali`, `tanggal_pengembalian`, `status`, `kondisi_setelahdipinjam`, `catatan`, `id_product`, `id_user`, `id_merk`, `id_lokasi`, `id_gudang`, `id_department`, `created_at`, `updated_at`) VALUES
(75, 'PMB-03072022-0001', NULL, 'preentasi dengan user', 'User Staff GA Pakusari', 9, '2022-06-29', '2022-07-03', '2022-07-03', 'sudah dikembalikan', NULL, NULL, 29, 12, 12, 13, 16, 23, '2022-07-03 03:32:11', '2022-07-02 20:32:11'),
(76, 'PMB-03072022-0002', NULL, 'presentasi dengan user', 'User Staff GA Pakusari', 9, '2022-07-01', '2022-07-03', NULL, 'ditolak', NULL, NULL, 30, 12, 12, 13, 16, 23, '2022-07-03 03:31:52', '2022-07-02 20:31:52'),
(77, 'PMB-03072022-0003', NULL, 'keperluan meeting', 'User Staff GA Pakusari', 9, '2022-07-01', '2022-07-03', '2022-07-03', 'sudah dikembalikan dengan bukti', 'kondisi barang rusak', 'kondisi rusak karena jatuh terkena air', 31, 12, 12, 13, 16, 23, '2022-07-03 03:33:21', '2022-07-02 20:33:21'),
(78, 'PMB-03072022-0004', NULL, 'keperluan test aplikasi', 'User Staff GA Kalisat', 11, '2022-07-03', '2022-07-19', NULL, 'diajukan', NULL, NULL, 32, 13, 12, 13, 16, 23, '2022-07-12 01:39:01', '2022-07-02 20:28:06'),
(79, 'PMB-03072022-0005', NULL, 'keperluan di ruang workshop', 'User Staff GA Pakusari', 9, '2022-07-03', '2022-07-19', NULL, 'disetujui', NULL, NULL, 33, 12, 12, 13, 16, 23, '2022-07-12 01:39:09', '2022-07-02 20:32:18'),
(80, 'PMB-03072022-0006', NULL, 'Keperluan di ruang workshop IT', 'User Staff GA Pakusari', 9, '2022-07-03', '2022-07-19', NULL, 'disetujui', NULL, NULL, 34, 12, 12, 13, 16, 23, '2022-07-12 01:39:15', '2022-07-02 20:33:49'),
(81, 'PMB-03072022-0007', NULL, 'Keperluan di ruang IT', 'User Staff GA Pakusari', 9, '2022-07-03', '2022-07-25', NULL, 'diajukan', NULL, NULL, 35, 12, 12, 13, 16, 23, '2022-07-12 01:39:31', '2022-07-02 20:55:46'),
(82, 'PMB-03072022-0008', NULL, 'Presentasi aplikasi baru', 'User Staff GA Pakusari', 9, '2022-07-03', '2022-07-04', '2022-07-04', 'sudah dikembalikan dengan bukti', 'kondisi barang  masih bagus', 'barang berfungsi dengan baik', 29, 12, 12, 13, 16, 23, '2022-07-12 01:39:55', '2022-07-03 01:15:01'),
(83, 'PMB-12072022-0009', NULL, 'presentasi aplikasi', 'User Staff GA Pakusari', 9, '2022-07-12', '2022-07-12', '2022-07-12', 'sudah dikembalikan dengan bukti', 'kondisi masih bagus', 'kondisi barang aman', 30, 12, 12, 13, 16, 23, '2022-07-12 03:01:58', '2022-07-11 20:01:58'),
(84, 'PMB-26072022-0010', NULL, 'pinjam', 'Atasan HRGA Pakusari', 9, '2022-07-26', '2022-07-27', NULL, 'diajukan', NULL, NULL, 29, 19, 12, 13, 16, 23, '2022-07-26 11:46:49', '2022-07-26 04:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_rooms`
--

CREATE TABLE `borrow_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_peminjaman` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_peminjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `petugas` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_room` bigint(20) UNSIGNED NOT NULL,
  `id_building` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrow_rooms`
--

INSERT INTO `borrow_rooms` (`id`, `kode_peminjaman`, `deskripsi`, `status`, `nama_peminjam`, `petugas`, `tanggal_pinjam`, `tanggal_selesai`, `tgl_selesai`, `created_at`, `updated_at`, `id_room`, `id_building`, `id_user`) VALUES
(19, 'PMR-03072022-0001', 'Meeting', 'selesai', 'User Staff GA Pakusari', 9, '2022-07-03', '2022-07-04', '2022-07-03', '2022-07-03 06:20:47', '2022-07-02 23:20:47', 6, 6, 12),
(20, 'PMR-03072022-0002', 'meeting', 'selesai', 'User Staff GA Pakusari', 16, '2022-07-03', '2022-07-03', '2022-07-03', '2022-07-03 06:32:38', '2022-07-02 23:32:38', 8, 7, 12),
(21, 'PMR-03072022-0003', 'sampel tembakau', 'ditolak', 'User Staff GA Pakusari', 16, '2022-07-03', '2022-07-03', NULL, '2022-07-03 06:26:24', '2022-07-02 23:26:24', 10, 7, 12),
(22, 'PMR-03072022-0004', 'sampel tembakau', 'sedang diajukan', 'User Staff GA Pakusari', 16, '2022-07-03', '2022-07-03', NULL, '2022-07-02 23:30:18', '2022-07-02 23:30:18', 10, 7, 12),
(23, 'PMR-03072022-0005', 'meeting', 'disetujui', 'User Staff GA Pakusari', 16, '2022-07-03', '2022-07-03', NULL, '2022-07-03 06:32:22', '2022-07-02 23:32:22', 11, 6, 12),
(24, 'PMR-03072022-0006', 'Meeting bersama karyawan', 'selesai', 'User Staff GA Pakusari', 16, '2022-07-03', '2022-07-04', '2022-07-03', '2022-07-03 08:26:12', '2022-07-03 01:26:12', 8, 7, 12),
(25, 'PMR-12072022-0007', 'keperluan meeting', 'disetujui', 'User Staff GA Pakusari', 16, '2022-07-12', '2022-07-12', NULL, '2022-07-12 03:11:37', '2022-07-11 20:11:37', 6, 6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_gudang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `kode_gudang`, `nama_gedung`, `alamat`, `created_at`, `updated_at`) VALUES
(6, 'GDG-0001', 'Head Office (HO)', 'Jl. P.B. Sudirman No.110 Kec. Pakusari, Kab. Jember', '2022-06-22 06:38:26', '2022-06-22 06:38:26'),
(7, 'GDG-0002', 'Pakusari (PKS)', 'Jl. P.B. Sudirman No.104 Kec. Pakusari, Kab. Jember', '2022-06-22 06:38:48', '2022-06-22 06:38:48'),
(8, 'GDG-0003', 'Guna Graha (GG)', 'Jl. P.B. Sudirman No.121 Kec. Pakusari, Kab. Jember', '2022-06-22 06:39:09', '2022-06-22 06:39:09'),
(9, 'GDG-0004', 'Mayang 1 - TR (MYG 1)', 'Jl. Taman Makam Pahlawan No.36 Kec. Mayang, Kab. Jember', '2022-06-22 06:39:25', '2022-06-22 06:39:25'),
(10, 'GDG-0005', 'Mayang 2 - PSU (MYG 2)', 'Jl. Banyuwangi No.60-66, Dam Saola, Desa Tegal Rejo, Kec. Mayang, Kab. Jember', '2022-06-22 06:39:41', '2022-06-22 06:39:41'),
(11, 'GDG-0006', 'Balung (BLG)', 'Jl. Ambulu No.189 Kec. Balung, Kab. Jember', '2022-06-22 06:40:01', '2022-06-22 06:40:01'),
(12, 'GDG-0007', 'Bumi Subur (BS)', 'Jl. Karang Duren No.1 Desa Karang Duren, Kec. Balung, Kab. Jember', '2022-06-22 06:40:25', '2022-06-22 06:40:25'),
(13, 'GDG-0008', 'Sumberan (SBR)', 'Jl. Candradimuka No.108 RT 01 / RW24 Desa Sumberan, Kec. Ambulu, Kab. Jember', '2022-06-22 06:40:44', '2022-06-22 06:40:44'),
(14, 'GDG-0009', 'Langkap (LNGKP)', 'Jl. Raya Langkap No.37 Desa Langkap, Kec. Bangsalsari, Kab. Jember', '2022-06-22 06:41:15', '2022-06-22 06:41:15'),
(15, 'GDG-0010', 'Kalisat (KL)', 'Jl. Gajah Mada 151, Kalisat, Krajan II, Glagahwero, Jember, Kabupaten Jember', '2022-06-22 06:41:44', '2022-06-22 06:41:44'),
(16, 'GDG-0011', '-', '-', '2022-06-24 10:20:33', '2022-06-24 10:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_departemen` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `kode_departemen`, `nama_departemen`, `created_at`, `updated_at`) VALUES
(5, 'DPT-0001', 'Agronomy DAC', '2022-06-22 06:43:43', '2022-06-22 06:43:43'),
(6, 'DPT-0002', 'Agronomy DFC', '2022-06-22 06:43:54', '2022-06-22 06:43:54'),
(7, 'DPT-0003', 'Agronomy SC', '2022-06-22 06:44:47', '2022-06-22 06:44:47'),
(8, 'DPT-0004', 'BoD ( Board of Director )', '2022-06-22 06:44:56', '2022-06-22 06:44:56'),
(9, 'DPT-0005', 'Compliance', '2022-06-22 06:45:05', '2022-06-22 06:45:05'),
(10, 'DPT-0006', 'DAC Operational', '2022-06-22 06:45:16', '2022-06-22 06:45:16'),
(11, 'DPT-0007', 'DAC Operational - GG', '2022-06-22 06:45:27', '2022-06-22 06:45:27'),
(12, 'DPT-0008', 'DAC Operational - Mayang 1', '2022-06-22 06:45:40', '2022-06-22 06:45:40'),
(13, 'DPT-0009', 'DAC Operational - Pakusari', '2022-06-22 06:46:04', '2022-06-22 06:46:04'),
(14, 'DPT-0010', 'DAC Quality', '2022-06-22 06:46:17', '2022-06-22 06:46:17'),
(15, 'DPT-0011', 'DAC Quality - GG', '2022-06-22 06:46:45', '2022-06-22 06:46:45'),
(16, 'DPT-0012', 'DAC Quality - Kalisat', '2022-06-22 06:46:54', '2022-06-22 06:46:54'),
(17, 'DPT-0013', 'DAC Quality - Mayang 1', '2022-06-22 06:47:05', '2022-06-22 06:47:05'),
(18, 'DPT-0014', 'DAC Quality - Pakusari', '2022-06-22 06:47:24', '2022-06-22 06:47:24'),
(19, 'DPT-0015', 'EHSS', '2022-06-22 06:47:34', '2022-06-22 06:47:34'),
(20, 'DPT-0016', 'Finance', '2022-06-22 06:47:47', '2022-06-22 06:47:47'),
(21, 'DPT-0017', 'HRGA', '2022-06-22 06:47:56', '2022-06-22 06:47:56'),
(22, 'DPT-0018', 'IPM', '2022-06-22 06:48:07', '2022-06-22 06:48:07'),
(23, 'DPT-0019', 'IT', '2022-06-22 06:48:16', '2022-06-22 06:48:16'),
(24, 'DPT-0020', 'Leaf Operations', '2022-06-22 06:48:24', '2022-06-22 06:48:24'),
(25, 'DPT-0021', 'Leaf Operations SC & DFC', '2022-06-22 06:48:32', '2022-06-22 06:48:32'),
(26, 'DPT-0022', 'Maintenance', '2022-06-22 06:49:00', '2022-06-22 06:49:00'),
(27, 'DPT-0023', 'Non-Tobacco Material Procurement', '2022-06-22 06:49:09', '2022-06-22 06:49:09'),
(28, 'DPT-0024', 'QMS & Non-Tobacco Procurement', '2022-06-22 06:49:21', '2022-06-22 06:49:21'),
(29, 'DPT-0025', 'R&D', '2022-06-22 06:49:30', '2022-06-22 06:49:30'),
(30, 'DPT-0026', 'Sales', '2022-06-22 06:49:39', '2022-06-22 06:49:39'),
(31, 'DPT-0027', 'STP & CCSRP', '2022-06-22 06:49:54', '2022-06-22 06:49:54'),
(32, 'DPT-0028', 'WH Stock and EXIM', '2022-06-22 06:50:04', '2022-06-22 06:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_jabatan` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `kode_jabatan`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(7, 'JBT-0001', 'Administrator IT', '2022-06-22 07:01:12', '2022-06-22 07:01:12'),
(9, 'JBT-0002', 'Secretary', '2022-06-22 07:01:56', '2022-06-22 07:01:56'),
(10, 'JBT-0003', 'Payroll Staff', '2022-06-22 07:02:08', '2022-06-22 07:02:08'),
(11, 'JBT-0004', 'GA Staff', '2022-06-22 07:02:20', '2022-06-22 07:02:20'),
(12, 'JBT-0005', 'IT Admin Staff', '2022-06-22 07:05:14', '2022-06-22 07:05:14'),
(13, 'JBT-0006', 'IT Manager', '2022-06-22 07:05:36', '2022-06-22 07:05:36'),
(14, 'JBT-0007', 'Finance Staff', '2022-06-22 07:55:38', '2022-06-22 07:55:38'),
(15, 'JBT-0008', 'HRGA', '2022-07-20 07:01:52', '2022-07-20 07:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `location_products`
--

CREATE TABLE `location_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lokasibarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location_products`
--

INSERT INTO `location_products` (`id`, `kode_lokasi`, `nama_lokasibarang`, `created_at`, `updated_at`) VALUES
(7, 'LOK-0002', 'Lemari Ruang Server', '2022-06-07 09:52:46', '2022-06-07 09:52:46'),
(8, 'LOK-0003', 'Lemari IT Kalisat', '2022-06-07 09:53:00', '2022-06-07 09:53:00'),
(9, 'LOK-0004', 'IT Room Workspace', '2022-06-07 09:53:49', '2022-06-07 09:53:49'),
(10, 'LOK-0005', 'Rak Ruang Workshop', '2022-06-07 09:54:03', '2022-06-07 09:54:03'),
(12, 'LOK-0007', 'Rak Ruang Server', '2022-06-07 10:03:06', '2022-06-07 10:03:25'),
(13, 'LOK-0008', '-', '2022-06-24 10:19:43', '2022-06-24 10:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `merk_products`
--

CREATE TABLE `merk_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_merkbarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merk_products`
--

INSERT INTO `merk_products` (`id`, `kode_merk`, `nama_merkbarang`, `created_at`, `updated_at`) VALUES
(6, 'MRK-0001', 'Asus ROG', '2022-06-08 00:21:13', '2022-06-08 00:21:13'),
(7, 'MRK-0002', 'Lenovo V130-15IKB', '2022-06-08 00:23:08', '2022-06-08 00:24:49'),
(8, 'MRK-0003', 'Acer', '2022-06-08 00:23:19', '2022-06-08 00:23:19'),
(9, 'MRK-0004', 'Toshiba', '2022-06-08 00:23:33', '2022-06-08 00:23:33'),
(10, 'MRK-0005', 'HP Pavilion', '2022-06-08 00:23:49', '2022-06-08 00:23:49'),
(11, 'MRK-0006', 'Dell', '2022-06-08 00:24:00', '2022-06-08 00:24:00'),
(12, 'MRK-0007', 'tidak ada merk', '2022-06-18 05:32:52', '2022-06-18 05:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_04_20_130201_create_product_categories_table', 1),
(5, '2022_04_20_130437_create_room_categories_table', 1),
(6, '2022_04_20_130700_create_status_products_table', 1),
(7, '2022_04_20_130820_create_departments_table', 1),
(8, '2022_04_20_130951_create_buildings_table', 1),
(9, '2022_04_20_132452_create_warehouses_table', 1),
(10, '2022_04_20_132453_create_rooms_table', 1),
(11, '2022_04_20_132454_create_products_table', 1),
(12, '2022_04_22_112430_create_service_products_table', 1),
(13, '2022_04_22_113303_create_nonaktif_products_table', 1),
(14, '2022_04_22_134203_create_borrow_products_table', 1),
(15, '2022_04_22_135359_create_borrow_rooms_table', 1),
(16, '2022_05_12_141322_create_roles_table', 1),
(17, '2022_05_12_151439_create_manage_users_table', 1),
(18, '2022_05_28_143843_create_sessions_table', 1),
(23, '2022_05_30_075338_create_location_products_table', 2),
(24, '2022_05_30_075422_create_merk_products_table', 2),
(25, '2022_04_20_132455_create_products_table', 3),
(27, '2022_05_31_082527_add_column_to_service_products', 4),
(28, '2022_05_31_170423_create_jabatan_table', 5),
(29, '2022_06_29_132636_create_bukti_pengembalian_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `nonaktif_products`
--

CREATE TABLE `nonaktif_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_nonaktif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` double NOT NULL,
  `tanggal_nonaktif` date NOT NULL,
  `id_status` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `id_merk` bigint(20) UNSIGNED NOT NULL,
  `id_lokasi` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` double DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_input` date NOT NULL,
  `id_productcategory` bigint(10) UNSIGNED NOT NULL,
  `id_merkproduct` bigint(10) UNSIGNED NOT NULL,
  `id_lokasiproduct` bigint(10) UNSIGNED NOT NULL,
  `id_department` bigint(10) UNSIGNED NOT NULL,
  `id_statusproduct` bigint(10) UNSIGNED NOT NULL,
  `id_gudang` bigint(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `kode_barang`, `nama_barang`, `harga_beli`, `jumlah`, `satuan`, `keterangan`, `tanggal_input`, `id_productcategory`, `id_merkproduct`, `id_lokasiproduct`, `id_department`, `id_statusproduct`, `id_gudang`, `created_at`, `updated_at`) VALUES
(29, 'BRG-0001', 'Komputer', 0, NULL, NULL, '', '2022-06-25', 13, 12, 13, 23, 13, 16, '2022-06-24 10:24:24', '2022-07-26 04:46:49'),
(30, 'BRG-0002', 'Notebook', 0, 0, '', '', '2022-06-25', 14, 12, 13, 23, 8, 16, '2022-06-24 10:25:29', '2022-07-11 20:01:09'),
(31, 'BRG-0003', 'Phone Tablet', 0, 0, '', '', '2022-06-25', 15, 12, 13, 23, 12, 16, '2022-06-24 10:26:21', '2022-07-11 20:05:07'),
(32, 'BRG-0004', 'Handphone', 0, NULL, NULL, '', '2022-06-25', 15, 12, 13, 23, 13, 16, '2022-06-24 10:33:07', '2022-07-02 20:28:06'),
(33, 'BRG-0005', 'Server HPE', 0, NULL, NULL, '', '2022-06-25', 16, 12, 13, 23, 11, 16, '2022-06-24 10:35:01', '2022-07-02 20:32:18'),
(34, 'BRG-0006', 'Cisco Switch', 0, 0, '', '', '2022-06-25', 16, 12, 13, 23, 11, 16, '2022-06-24 10:36:35', '2022-07-02 20:33:49'),
(35, 'BRG-0007', 'UPS Server', 0, 0, '', '', '2022-06-25', 16, 12, 13, 23, 13, 16, '2022-06-24 10:37:36', '2022-07-02 20:31:19'),
(36, 'BRG-0008', 'Computer Server', 0, 0, '', '', '2022-06-25', 16, 12, 13, 23, 8, 16, '2022-06-24 10:38:19', '2022-06-30 06:00:28'),
(37, 'BRG-0009', 'Check Point', 0, 0, '', '', '2022-06-25', 17, 12, 13, 23, 8, 16, '2022-06-24 10:43:48', '2022-07-26 04:46:49'),
(38, 'BRG-0010', 'Access Point', 0, 0, '', '', '2022-06-25', 19, 12, 13, 23, 12, 16, '2022-06-24 10:44:49', '2022-06-28 09:54:26'),
(39, 'BRG-0011', 'OTDR Mini Skycom', 0, NULL, NULL, '', '2022-06-25', 17, 12, 13, 23, 9, 16, '2022-06-24 10:45:24', '2022-06-28 09:41:03'),
(40, 'BRG-0012', 'Splicer FO IOT Fullset', 0, NULL, NULL, '', '2022-06-25', 17, 12, 13, 23, 9, 16, '2022-06-24 10:47:59', '2022-06-28 09:50:47'),
(41, 'BRG-0013', 'FLUKE NETWORKS MS2', 0, NULL, NULL, '', '2022-06-25', 17, 12, 13, 23, 10, 16, '2022-06-24 10:49:28', '2022-06-28 09:39:58'),
(42, 'BRG-0014', 'FLUKE Network Intellitone Toner and Probe Kit', 0, 0, '', '', '2022-06-25', 17, 12, 13, 23, 10, 16, '2022-06-24 10:50:38', '2022-06-25 02:01:16'),
(43, 'BRG-0015', 'Barcode Scanner', 0, 0, '', '', '2022-06-25', 18, 12, 13, 23, 9, 16, '2022-06-24 10:51:20', '2022-06-25 02:00:56'),
(44, 'BRG-0016', 'DVR CCTV', 0, 0, '', '', '2022-06-25', 19, 12, 13, 23, 8, 16, '2022-06-24 10:53:26', '2022-06-24 10:53:26'),
(46, 'BRG-0017', 'Laptop', NULL, NULL, NULL, NULL, '2022-07-03', 14, 6, 9, 23, 8, 7, '2022-07-03 01:07:20', '2022-07-03 01:08:03'),
(47, 'BRG-0018', 'Laptop', NULL, NULL, NULL, NULL, '2022-07-12', 14, 7, 9, 23, 8, 7, '2022-07-11 19:53:01', '2022-07-11 19:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategbarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `kode_kategori`, `nama_kategbarang`, `created_at`, `updated_at`) VALUES
(13, 'KTB-0001', 'PC Desktop', '2022-06-08 00:04:06', '2022-06-08 00:04:06'),
(14, 'KTB-0002', 'Laptop', '2022-06-08 00:04:14', '2022-06-08 00:04:14'),
(15, 'KTB-0003', 'Cell Phones', '2022-06-08 00:04:22', '2022-06-08 00:04:22'),
(16, 'KTB-0004', 'Server', '2022-06-08 00:04:31', '2022-06-08 00:04:31'),
(17, 'KTB-0005', 'Network and Internet', '2022-06-08 00:04:39', '2022-06-08 00:04:39'),
(18, 'KTB-0006', 'Pheriperal', '2022-06-08 00:04:50', '2022-06-08 00:04:50'),
(19, 'KTB-0007', 'Others', '2022-06-08 00:05:09', '2022-06-08 00:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_ruangan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_roomcategory` bigint(20) UNSIGNED NOT NULL,
  `id_building` bigint(20) UNSIGNED NOT NULL,
  `status_ruangan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `kode_ruangan`, `nama_ruangan`, `id_roomcategory`, `id_building`, `status_ruangan`, `created_at`, `updated_at`) VALUES
(6, 'RNG-0001', 'Ruang Workshop IT', 5, 6, 'Dipinjam', '2022-06-22 07:40:28', '2022-07-11 20:11:37'),
(7, 'RNG-0002', 'Ruang Workshop IT', 5, 15, 'Tersedia', '2022-06-22 07:41:01', '2022-06-22 09:24:00'),
(8, 'RNG-0003', 'Ruang Meeting', 4, 7, 'Tersedia', '2022-06-22 07:41:30', '2022-07-03 01:26:12'),
(9, 'RNG-0004', 'Ruang Meeting', 4, 15, 'Tersedia', '2022-06-22 07:41:50', '2022-07-02 22:45:47'),
(10, 'RNG-0005', 'Ruang Sampel Tembakau', 6, 7, 'sedang diajukan', '2022-06-22 07:43:28', '2022-07-02 23:30:18'),
(11, 'RNG-0006', 'Ruang Departemen IT', 5, 6, 'Dipinjam', '2022-06-22 07:44:35', '2022-07-02 23:32:22'),
(12, 'RNG-0007', 'Ruang Lab Tembakau', 6, 7, 'Tersedia', '2022-07-03 01:20:37', '2022-07-03 01:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kategruangan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`id`, `kode_kategruangan`, `nama_kategruangan`, `created_at`, `updated_at`) VALUES
(4, 'KTR-0001', 'Meeting', '2022-06-22 06:53:42', '2022-06-22 06:53:42'),
(5, 'KTR-0002', 'Workshop', '2022-06-22 06:53:48', '2022-06-22 06:53:48'),
(6, 'KTR-0003', 'Laboratorium', '2022-06-22 07:42:30', '2022-06-22 07:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `service_products`
--

CREATE TABLE `service_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_servis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_servis` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `id_merk` bigint(20) UNSIGNED NOT NULL,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_lokasi` bigint(20) UNSIGNED NOT NULL,
  `id_gudang` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_products`
--

INSERT INTO `service_products` (`id`, `kode_servis`, `deskripsi`, `tanggal_servis`, `tanggal_kembali`, `id_product`, `id_merk`, `nama_petugas`, `id_lokasi`, `id_gudang`, `id_user`, `created_at`, `updated_at`) VALUES
(11, 'SRV-28062022-0001', 'Komputer tidak bisa menyala', '2022-06-28', '2022-06-30', 38, 12, 'Admin IT Pakusari', 13, 16, 9, '2022-06-28', '2022-06-28'),
(12, 'SRV-12072022-0002', 'tablet tidak bisa menyala', '2022-07-12', '2022-07-16', 31, 12, 'Admin IT Pakusari', 13, 16, 9, '2022-07-12', '2022-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dnZyXTLsSFGAu3pPiDy51espVgZt8E65NeH9Mcsh', 19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUldSY0swRzk3anRXWVZqampvc21KMVZQQUE2S1JidEhpd2NUSFVkYiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGVwYXJ0ZW1lbl9ocmdhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTk7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNjU4ODQ4NDI1O319', 1658851389),
('duVeOATMpWI9NXynmvv9dGTgjoM7hZsJrbnnEY9k', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiN1dYVWNzZTBpM3dXRXV4ZEdwRjV5S3hnVThPS0gzbUhQUU94VjhGMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY2V0YWtfYmFyYW5nIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE2NTkxMDExOTI7fX0=', 1659102358),
('gMKK0Il4ItiNJHnMLiIQwmCognmoLAf00xd7Q55c', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWXBGRDJxZG1QWFhYbDVyVmRIakFoR3hDNW12S1pmbFloS2hKY21YTSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY2V0YWtfYmFyYW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE2NTkxMDA5NTg7fX0=', 1659100961),
('HcYyuB3DWWhizJiPuqrFieOiKu1h4ZFSgGE56cah', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNlZiS1laakpJYU40TFFKSVd4Q3R1MnY2ckNwOFUwdWNLM0FVSmdrMyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY2V0YWtfYmFyYW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE2NTkxMDA5MjM7fX0=', 1659100937);

-- --------------------------------------------------------

--
-- Table structure for table `status_products`
--

CREATE TABLE `status_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_statusbarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_products`
--

INSERT INTO `status_products` (`id`, `kode_status`, `nama_statusbarang`, `created_at`, `updated_at`) VALUES
(8, 'STS-0002', 'Tersedia', '2022-06-08 00:40:58', '2022-06-08 00:40:58'),
(9, 'STS-0003', 'Rusak', '2022-06-08 00:41:58', '2022-06-08 00:41:58'),
(10, 'STS-0004', 'Hilang', '2022-06-08 00:42:07', '2022-06-08 00:42:07'),
(11, 'STS-0005', 'Dipinjam', '2022-06-08 00:42:17', '2022-06-08 00:42:17'),
(12, 'STS-0006', 'Diservis', '2022-06-08 00:42:25', '2022-06-08 00:42:25'),
(13, 'STS-0007', 'Diajukan', '2022-06-17 08:46:49', '2022-06-17 08:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_jabatan` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `kontak`, `alamat`, `role`, `remember_token`, `created_at`, `updated_at`, `id_jabatan`, `image`) VALUES
(9, 'Admin IT Pakusari', 'adminitpakusari@gmail.com', NULL, '$2y$10$o9fjBomlytSLn/5v3bTvoOQ/LoiUqtrM.ZlEraSPNrOBTYarORJ3i', '082330456432', 'Jl. P.B. Sudirman No.110 Kec. Pakusari, Kab. Jember', 'approval', NULL, '2022-06-01 09:09:55', '2022-07-03 00:49:35', 12, 'admin.png'),
(11, 'Admin IT Kalisat', 'adminitkalisat@gmail.com', NULL, '$2y$10$M3EHikdI7uEdcO.De07KAufTSVexdnWkwPVoWnOiL/w4TMAIgquoq', '08000000000', 'Jl. Gajah Mada 151, Kalisat, Krajan II, Glagahwero, Jember, Kabupaten Jember', 'approval', NULL, '2022-06-02 06:44:17', '2022-07-02 10:40:52', 12, 'ad.png'),
(12, 'User Staff GA Pakusari', 'staffgapakusari@gmail.com', NULL, '$2y$10$VXHNbd2AY8mckB9pmEoqlOXRQC610r8uAC6E0fog5MSyCBhUeucs6', '08000000000', 'Jl. P.B. Sudirman No.110 Kec. Pakusari, Kab. Jember', 'requestor', NULL, '2022-06-02 07:41:36', '2022-06-22 07:19:52', 11, 'ad.png'),
(13, 'User Staff GA Kalisat', 'staffgakalisat@gmail.com', NULL, '$2y$10$GJzLjax7dTy8rvF4HX.Ax.jPkZqbZC.83pEyPq/EJw0cFhQRobeJi', '08000000000', 'Jl. Gajah Mada 151, Kalisat, Krajan II, Glagahwero, Jember, Kabupaten Jember', 'requestor', NULL, '2022-06-03 09:32:02', '2022-07-02 20:27:00', 11, 'ad.png'),
(15, 'User Staff Finance Pakusari', 'stafffinancepakusari@gmail.com', NULL, '$2y$10$E1M.LhMoyCLkRwPR1BVNM.A.xdPlPfllxSdV/NLTh4d6FacOXlbFW', '08000000000', 'Jl. P.B. Sudirman No.110 Kec. Pakusari, Kab. Jember', 'requestor', NULL, '2022-06-22 07:34:03', '2022-06-22 07:56:34', 14, NULL),
(16, 'Admin GA Pakusari', 'admingapakusari@gmail.com', NULL, '$2y$10$19US78Ft4NNRiK1vAFV5X.pJKBwMQvI.hQw/IM848tVuI3rtwlP9u', '087654321432', 'Gudang Pakusari', 'approval', NULL, '2022-07-02 20:59:01', '2022-07-03 01:29:29', 11, 'admin.png'),
(17, 'Admin GA Kalisat', 'admingakalisat@gmail.com', NULL, '$2y$10$GQBro.tLxt7fEa96ONlPZeGLH2M2b5nkaJY7In1liCXqqNjZ0gFDy', '089777666555', 'Gudang Kalisat', 'approval', NULL, '2022-07-02 21:00:09', '2022-07-02 21:00:09', 11, NULL),
(18, 'Gita Kartika Pariwara', 'teresagita25@gmail.com', NULL, '$2y$10$Hx.2DkP4r0H51.H3E8Eee.k.M65QsmlI1Z47WZI3vj6XOR4IG8Fj6', '087654444333', 'Situbondo', 'requestor', NULL, '2022-07-11 20:43:09', '2022-07-11 20:43:09', 7, NULL),
(19, 'Atasan HRGA Pakusari', 'atasanhrgapakusari@gmail.com', NULL, '$2y$10$X7.tnzp7umsDcor4iwBW1e7WjLAO.XVBWSQjeDyb2hK9A5ALIkoDu', '080000xxxxxx', 'Jl. P.B. Sudirman No.104 Kec. Pakusari, Kab. Jember', 'hrga', NULL, '2022-07-20 07:03:31', '2022-07-21 09:19:47', 15, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow_products`
--
ALTER TABLE `borrow_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_department` (`id_department`),
  ADD KEY `id_merk` (`id_merk`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_gudang` (`id_gudang`),
  ADD KEY `petugas` (`petugas`);

--
-- Indexes for table `borrow_rooms`
--
ALTER TABLE `borrow_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrow_rooms_id_room_foreign` (`id_room`),
  ADD KEY `id_building` (`id_building`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `petugas` (`petugas`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_products`
--
ALTER TABLE `location_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merk_products`
--
ALTER TABLE `merk_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nonaktif_products`
--
ALTER TABLE `nonaktif_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_statusbarang` (`id_status`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_merk` (`id_merk`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_productcategory` (`id_productcategory`,`id_merkproduct`,`id_lokasiproduct`,`id_department`,`id_statusproduct`,`id_gudang`),
  ADD KEY `id_department` (`id_department`),
  ADD KEY `id_lokasiproduct` (`id_lokasiproduct`),
  ADD KEY `id_merkproduct` (`id_merkproduct`),
  ADD KEY `id_statusproduct` (`id_statusproduct`),
  ADD KEY `id_gudang` (`id_gudang`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_id_roomcategory_foreign` (`id_roomcategory`),
  ADD KEY `rooms_id_building_foreign` (`id_building`);

--
-- Indexes for table `room_categories`
--
ALTER TABLE `room_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_products`
--
ALTER TABLE `service_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_products_id_product_foreign` (`id_product`),
  ADD KEY `service_products_id_merk_foreign` (`id_merk`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_gudang` (`id_gudang`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `status_products`
--
ALTER TABLE `status_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow_products`
--
ALTER TABLE `borrow_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `borrow_rooms`
--
ALTER TABLE `borrow_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `location_products`
--
ALTER TABLE `location_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `merk_products`
--
ALTER TABLE `merk_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `nonaktif_products`
--
ALTER TABLE `nonaktif_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_categories`
--
ALTER TABLE `room_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_products`
--
ALTER TABLE `service_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `status_products`
--
ALTER TABLE `status_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow_products`
--
ALTER TABLE `borrow_products`
  ADD CONSTRAINT `borrow_products_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_products_ibfk_2` FOREIGN KEY (`id_merk`) REFERENCES `merk_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_products_ibfk_3` FOREIGN KEY (`id_lokasi`) REFERENCES `location_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_products_ibfk_4` FOREIGN KEY (`id_department`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_products_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_products_ibfk_6` FOREIGN KEY (`id_gudang`) REFERENCES `buildings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_products_ibfk_7` FOREIGN KEY (`petugas`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrow_rooms`
--
ALTER TABLE `borrow_rooms`
  ADD CONSTRAINT `borrow_rooms_ibfk_1` FOREIGN KEY (`id_building`) REFERENCES `buildings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_rooms_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_rooms_ibfk_3` FOREIGN KEY (`petugas`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_rooms_id_room_foreign` FOREIGN KEY (`id_room`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `nonaktif_products`
--
ALTER TABLE `nonaktif_products`
  ADD CONSTRAINT `nonaktif_products_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status_products` (`id`),
  ADD CONSTRAINT `nonaktif_products_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nonaktif_products_ibfk_3` FOREIGN KEY (`id_lokasi`) REFERENCES `location_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nonaktif_products_ibfk_4` FOREIGN KEY (`id_merk`) REFERENCES `merk_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_productcategory`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_department`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`id_lokasiproduct`) REFERENCES `location_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`id_merkproduct`) REFERENCES `merk_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`id_statusproduct`) REFERENCES `status_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_6` FOREIGN KEY (`id_gudang`) REFERENCES `buildings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_id_building_foreign` FOREIGN KEY (`id_building`) REFERENCES `buildings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rooms_id_roomcategory_foreign` FOREIGN KEY (`id_roomcategory`) REFERENCES `room_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_products`
--
ALTER TABLE `service_products`
  ADD CONSTRAINT `service_products_ibfk_1` FOREIGN KEY (`id_merk`) REFERENCES `merk_products` (`id`),
  ADD CONSTRAINT `service_products_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `location_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_products_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_products_ibfk_4` FOREIGN KEY (`id_gudang`) REFERENCES `buildings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_products_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
