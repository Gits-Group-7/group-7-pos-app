-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 12 Apr 2023 pada 08.29
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos_test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `total_price` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
('1', 'Smartphone', 'Meliputi Smartphone, Handphone Tablet dan Lain-lain', 'Aktif', '2023-04-11 23:28:52', '2023-04-11 23:28:52'),
('2', 'Laptop', 'Meliputi Perangkat Laptop, Mobile Device, dan PC', 'Aktif', '2023-04-11 23:28:52', '2023-04-11 23:28:52'),
('3', 'Kamera', 'Meliputi Kamera, Lensa dan Lain-lain', 'Aktif', '2023-04-11 23:28:52', '2023-04-11 23:28:52'),
('4', 'Monitor', 'Meliputi Monitor, LED TV dan Lain-lain', 'Aktif', '2023-04-11 23:28:52', '2023-04-11 23:28:52'),
('5', 'Storage Device', 'Meliputi Flashdisk, Memory Card, Harddisk & SSD', 'Aktif', '2023-04-11 23:28:52', '2023-04-11 23:28:52'),
('6', 'Gaming Device', 'Meliputi Device Gaming, Setup Gaming dan Sparepart Gaming', 'Aktif', '2023-04-11 23:28:52', '2023-04-11 23:28:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_08_013730_create_categories_table', 1),
(6, '2023_04_08_013749_create_products_table', 1),
(7, '2023_04_10_071134_create_carts_table', 1),
(8, '2023_04_11_053644_create_transactions_table', 1),
(9, '2023_04_11_053655_create_transaction_details_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty` int(10) UNSIGNED NOT NULL,
  `condition` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `photo`, `price`, `stock`, `description`, `warranty`, `condition`, `status`, `created_at`, `updated_at`) VALUES
('11d04a84-292d-4bce-8c28-5f587b253862', '6', 'NUBWO G06 Wireless Gaming Headset with Microphone for PS5, PS4, PC', 'null', 745000, 5, 'The Ultimate In-game Sound Experience - Benamkan diri Anda dalam audio stereo yang kaya dengan headset gaming nirkabel NUBWO, yang dirancang khusus untuk PS5, PS4, dan perangkat gaming lainnya. Driver 50mm dan 2 driver kamar ganda menghasilkan suara yang tajam dan kuat yang menempatkan Anda tepat di tengah-tengah aksi. Lossless Wireless Connectivity - Ucapkan selamat tinggal pada kabel yang kusut dan nikmati kenyamanan permainan nirkabel. Headset NUBWO memiliki konektivitas nirkabel 2.4GHz melalui dongle USB untuk konsol dan PC, memastikan koneksi yang stabil dan bebas lag.', 1, 'Baru', 'Tersedia', '2023-04-11 23:28:52', '2023-04-11 23:28:52'),
('4c75cd4b-0a68-4172-91df-5c7e12a08ab2', '2', 'Apple MacBook Air with 1.1GHz Core i3', 'null', 9400000, 20, 'Intel Core i3 processor1.1GHz dual-core 10th-generation, 13.3 inch 1440 x 900 LED IPS, 8 GB LPDDR3 2133 MHz, SSD 256GB-IND, macOS', 2, 'Baru', 'Tersedia', '2023-04-11 23:28:52', '2023-04-11 23:28:52'),
('9b3e3168-959f-43d0-8d07-666bb7d0ae53', '1', 'Google Pixel 4a Smartphone', 'null', 1775000, 10, 'Google Pixel 4a merupakan HP dengan layar 5.8\" dan tingkat densitas piksel sebesar 413ppi. Ia dilengkapi dengan kamera belakang 12.2MP dan kamera depan 8MP. HP ini juga hadir dengan kapasitas baterai 3140mAh. Google Pixel 4a dirilis pada: 2020', 3, 'Baru', 'Tersedia', '2023-04-11 23:28:52', '2023-04-11 23:28:52'),
('9ce2a696-d4bf-4df6-a29b-ed8baf2552f3', '3', 'Logitech C920x HD Pro Webcam, Full HD 1080p/30fps', 'null', 1045000, 1, 'Resolusi Maks.: 1080 p/30 fps - 720p/ 30 fps, Kamera mega pixel: 3, Jenis fokus: Autofocus, Jenis lensa: Kaca, Mikrofon internal: Stereo, Jangkauan mikrofon: Maksimal 1 m, Bidang pandang diagonal (dFoV):: 78°, Universal clip yang kompatibel dengan tripod ini cocok dengan berbagai laptop, LCD, atau monitor 1Tripod tidak disertakan', 1, 'Like a New', 'Habis', '2023-04-11 23:28:52', '2023-04-11 23:28:52'),
('9d610414-ecde-4398-9533-f8ff43b3dec6', '4', 'SAMSUNG 32\" Odyssey G55A QHD 165Hz 1ms FreeSync Curved', 'null', 6415000, 15, 'WQHD resolution and HDR10 boasts incredibly detailed, pin-sharp images, 165Hz refresh rate and 1ms response time to reduce lag and ghosting, Adaptive Sync technology allows fast-action and stutter-free with AMD FreeSync Premium', 3, 'Baru', 'Pre Order', '2023-04-11 23:28:52', '2023-04-11 23:28:52'),
('e23929f8-775c-47ef-8e1d-2001325a5826', '5', '850 PRO SATA III 2.5 inch SSD', 'null', 1595000, 25, 'Samsung SSD 870 EVO 250GB 500GB 1TB 2.5\" SATA III Internal SSD. The perfect choice for creators, IT professionals or everyday users, the latest 870 EVO has indisputable performance, reliability and compatibility built upon Samsungs pioneering technology.', 1, 'Baru', 'Pre Order', '2023-04-11 23:28:52', '2023-04-11 23:28:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `total_price` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$PYzgun2qEtPc6ru5BkyMce7p4rPeIHh.3pPNk9l5BQGgaY3y89nUi', NULL, '2023-04-11 23:28:52', '2023-04-11 23:28:52'),
(2, 'Admin GWS', 'admingws@gmail.com', NULL, '$2y$10$.iSMvY8OFpDaeb72Vyk/7Omwz5Ft91n7DRQo8cdrfOWasLv/3ibJS', NULL, '2023-04-11 23:28:52', '2023-04-11 23:28:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
