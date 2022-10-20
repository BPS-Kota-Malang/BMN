-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 03:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmn_peminjaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow_products`
--

CREATE TABLE `borrow_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` double NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_peminjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi_setelahdipinjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `petugas` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_merk` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrow_products`
--

INSERT INTO `borrow_products` (`id`, `kode_peminjaman`, `jumlah`, `deskripsi`, `nama_peminjam`, `tanggal_pinjam`, `tanggal_pengembalian`, `status`, `kondisi_setelahdipinjam`, `catatan`, `created_at`, `updated_at`, `petugas`, `id_product`, `id_user`, `id_merk`) VALUES
(1, 'PMB-20102022-0001', 1, 'coba', 'barang', '2022-10-20', '2022-10-21', 'disetujui', 'baik tanpa lecet', 'akan di kembalikan', '2022-10-19 17:47:20', '2022-10-19 17:47:47', 3, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_rooms`
--

CREATE TABLE `borrow_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_peminjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `petugas` bigint(20) UNSIGNED NOT NULL,
  `id_room` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrow_rooms`
--

INSERT INTO `borrow_rooms` (`id`, `kode_peminjaman`, `deskripsi`, `status`, `nama_peminjam`, `tanggal_pinjam`, `tanggal_selesai`, `tgl_selesai`, `created_at`, `updated_at`, `petugas`, `id_room`, `id_user`) VALUES
(1, 'PMR-19102022-0001', 'coba', 'selesai', 'wahyu', '2022-10-20', '2022-10-21', '2022-10-19', '2022-10-19 05:02:37', '2022-10-19 05:03:49', 2, 1, 2);

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
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `kode_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'JBT-0001', NULL, NULL),
(2, 'penanggung jawab ruangan', 'JBT-0002', NULL, NULL),
(3, 'penanggung jawab barang', 'JBT-0003', NULL, NULL),
(4, 'peminjam', 'JBT-0004', NULL, NULL);

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
(1, 'MRK-0001', 'Asus', '2022-10-19 17:45:38', '2022-10-19 17:45:38');

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
(1, '2014_10_11_104153_create_jabatan_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2022_04_20_130201_create_product_categories_table', 1),
(6, '2022_04_20_130437_create_room_categories_table', 1),
(7, '2022_04_20_130700_create_status_products_table', 1),
(8, '2022_04_20_132453_create_rooms_table', 1),
(9, '2022_04_22_135359_create_borrow_rooms_table', 1),
(10, '2022_04_23_132402_create_merk_products_table', 1),
(11, '2022_04_23_132455_create_products_table', 1),
(12, '2022_04_23_134203_create_borrow_products_table', 1),
(13, '2022_04_24_112430_create_service_products_table', 1),
(14, '2022_04_25_113303_create_nonaktif_products_table', 1),
(15, '2022_05_28_143843_create_sessions_table', 1),
(16, '2022_05_31_082527_add_column_to_service_products', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nonaktif_products`
--

CREATE TABLE `nonaktif_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` double NOT NULL,
  `tanggal_nonaktif` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `id_status` bigint(20) UNSIGNED NOT NULL,
  `id_merk` bigint(20) UNSIGNED NOT NULL
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
  `jumlah` double NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_input` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_productcategory` bigint(20) UNSIGNED NOT NULL,
  `id_statusproduct` bigint(20) UNSIGNED NOT NULL,
  `id_merkproduct` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `kode_barang`, `nama_barang`, `jumlah`, `keterangan`, `tanggal_input`, `created_at`, `updated_at`, `id_productcategory`, `id_statusproduct`, `id_merkproduct`) VALUES
(1, 'BRG-0001', 'handphone', 1, 'baik', '2022-10-20', '2022-10-19 17:46:21', '2022-10-19 17:47:20', 1, 3, 1);

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
(1, 'KTB-0001', 'call phone', '2022-10-19 17:45:50', '2022-10-19 17:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_roomcategory` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `kode_ruangan`, `nama_ruangan`, `status_ruangan`, `id_roomcategory`, `created_at`, `updated_at`) VALUES
(1, 'RNG-0001', 'aula lantai 2', 'Tersedia', 1, '2022-10-19 04:56:43', '2022-10-19 05:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kategruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`id`, `kode_kategruangan`, `nama_kategruangan`, `created_at`, `updated_at`) VALUES
(1, 'KTR-0001', 'ruang rapat', '2022-10-19 04:56:11', '2022-10-19 04:56:11');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'STS-0001', 'Tersedia', '2022-10-19 17:44:28', '2022-10-19 17:44:28'),
(2, 'STS-0002', 'Rusak', '2022-10-19 17:44:36', '2022-10-19 17:44:36'),
(3, 'STS-0003', 'Diajukan', '2022-10-19 17:44:44', '2022-10-19 17:44:44'),
(4, 'STS-0004', 'Dipinjam', '2022-10-19 17:44:54', '2022-10-19 17:44:54'),
(5, 'STS-0005', 'Hilang', '2022-10-19 17:45:08', '2022-10-19 17:45:08'),
(6, 'STS-0006', 'Diservis', '2022-10-19 17:45:16', '2022-10-19 17:45:16');

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
  `role` enum('admin','pjruangan','pjbarang','peminjam') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'peminjam',
  `id_jabatan` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `kontak`, `alamat`, `role`, `id_jabatan`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fajar', 'fajar@gmail.com', NULL, '$2y$10$zkGh0QWiDr9I296Q33yUZuV2ZudV2wNJ85W.SgMEkXs0XkGd1wWhO', '082247477770', 'malang', 'admin', 1, NULL, NULL, NULL),
(2, 'wahyu', 'pjruang@gmail.com', NULL, '$2y$10$leeLcViVESKDSjR9nnGGguOHd2ZbcmtXF.FmWFIhX7sPTfnQXU966', '082247477770', 'malang', 'pjruangan', 2, NULL, NULL, NULL),
(3, 'barang', 'pjbarang@gmail.com', NULL, '$2y$10$ZiVj.IVsLo6Es.W/dBzj.OgMm7PI.enQ8PE8u5kWu1XFv9CZNsAWa', '082247477770', 'malang', 'pjbarang', 3, NULL, NULL, NULL),
(4, 'peminjam', 'peminjam@gmail.com', NULL, '$2y$10$QnUFuPRFGOuGI0QOh0khK.nRhdjWbetAlIFHkEdhcVfdzl9W6sLYC', '082247477770', 'malang', 'peminjam', 4, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow_products`
--
ALTER TABLE `borrow_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrow_products_petugas_foreign` (`petugas`),
  ADD KEY `borrow_products_id_product_foreign` (`id_product`),
  ADD KEY `borrow_products_id_user_foreign` (`id_user`),
  ADD KEY `borrow_products_id_merk_foreign` (`id_merk`);

--
-- Indexes for table `borrow_rooms`
--
ALTER TABLE `borrow_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrow_rooms_petugas_foreign` (`petugas`),
  ADD KEY `borrow_rooms_id_room_foreign` (`id_room`),
  ADD KEY `borrow_rooms_id_user_foreign` (`id_user`);

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
  ADD KEY `nonaktif_products_id_product_foreign` (`id_product`),
  ADD KEY `nonaktif_products_id_status_foreign` (`id_status`),
  ADD KEY `nonaktif_products_id_merk_foreign` (`id_merk`);

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
  ADD KEY `products_id_productcategory_foreign` (`id_productcategory`),
  ADD KEY `products_id_statusproduct_foreign` (`id_statusproduct`),
  ADD KEY `products_id_merkproduct_foreign` (`id_merkproduct`);

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
  ADD KEY `rooms_id_roomcategory_foreign` (`id_roomcategory`);

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
  ADD KEY `service_products_id_user_foreign` (`id_user`);

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
  ADD KEY `users_id_jabatan_foreign` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow_products`
--
ALTER TABLE `borrow_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `borrow_rooms`
--
ALTER TABLE `borrow_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `merk_products`
--
ALTER TABLE `merk_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nonaktif_products`
--
ALTER TABLE `nonaktif_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_categories`
--
ALTER TABLE `room_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_products`
--
ALTER TABLE `service_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_products`
--
ALTER TABLE `status_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow_products`
--
ALTER TABLE `borrow_products`
  ADD CONSTRAINT `borrow_products_id_merk_foreign` FOREIGN KEY (`id_merk`) REFERENCES `merk_products` (`id`),
  ADD CONSTRAINT `borrow_products_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `borrow_products_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `borrow_products_petugas_foreign` FOREIGN KEY (`petugas`) REFERENCES `users` (`id`);

--
-- Constraints for table `borrow_rooms`
--
ALTER TABLE `borrow_rooms`
  ADD CONSTRAINT `borrow_rooms_id_room_foreign` FOREIGN KEY (`id_room`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `borrow_rooms_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `borrow_rooms_petugas_foreign` FOREIGN KEY (`petugas`) REFERENCES `users` (`id`);

--
-- Constraints for table `nonaktif_products`
--
ALTER TABLE `nonaktif_products`
  ADD CONSTRAINT `nonaktif_products_id_merk_foreign` FOREIGN KEY (`id_merk`) REFERENCES `merk_products` (`id`),
  ADD CONSTRAINT `nonaktif_products_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `nonaktif_products_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status_products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_merkproduct_foreign` FOREIGN KEY (`id_merkproduct`) REFERENCES `merk_products` (`id`),
  ADD CONSTRAINT `products_id_productcategory_foreign` FOREIGN KEY (`id_productcategory`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `products_id_statusproduct_foreign` FOREIGN KEY (`id_statusproduct`) REFERENCES `status_products` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_id_roomcategory_foreign` FOREIGN KEY (`id_roomcategory`) REFERENCES `room_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_products`
--
ALTER TABLE `service_products`
  ADD CONSTRAINT `service_products_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `service_products_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_jabatan_foreign` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
