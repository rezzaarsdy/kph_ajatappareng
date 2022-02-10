-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Feb 2022 pada 02.50
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kph_ajatappareng`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berita_category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_categories`
--

CREATE TABLE `berita_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berita_categories`
--

INSERT INTO `berita_categories` (`id`, `uuid`, `name`, `created_at`, `updated_at`) VALUES
(1, '11a9f381-0d4b-479e-b515-05f0d67f38d7', 'Berita', NULL, NULL),
(2, '53b7947f-2088-4ed5-a24d-3328d3b72777', 'Pengumuman', NULL, NULL),
(3, '76e59ffe-a418-4eb2-9672-dab75be1b9fa', 'Artikel', NULL, NULL),
(4, '095d7d7b-b091-47f5-a312-28101cd61682', 'Agenda', NULL, NULL);

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
-- Struktur dari tabel `galeries`
--

CREATE TABLE `galeries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeries`
--

INSERT INTO `galeries` (`id`, `uuid`, `title`, `description`, `img`, `created_at`, `updated_at`) VALUES
(1, '498a319bcb3d449e84ba2a5db2a1e7c5', 'Pelatihan', 'Khusus', 'Foto GaleriPelatihan__1644303368__1.png', '2022-02-08 05:56:08', '2022-02-08 05:56:08'),
(2, '75885cc54036438faaa87a188a8448c6', 'Judul', 'Khusus', 'Foto GaleriJudul__1644382565__Absensi.png|Foto GaleriJudul__1644382566__Absensi2.png|Foto GaleriJudul__1644382566__Absensi3.png', '2022-02-09 03:56:06', '2022-02-09 03:56:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inboxes`
--

CREATE TABLE `inboxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`id`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Kepala UPT KPH Ajatappareng', NULL, NULL),
(2, 'Kasi Perlindungan Hutan dan Pemberdayaan Masyarakat', NULL, NULL),
(3, 'Kasi Perencanaan dan Pemanfaatan Hutan', NULL, NULL),
(4, 'Kepala Sub Bagian Tata Usaha', NULL, NULL),
(5, 'Penyusun Program Anggaran dan Pelaporan', NULL, NULL),
(6, 'Analisis Pasar Hasil Hutan', NULL, NULL),
(7, 'Pengadministrasi Keuangan', NULL, NULL),
(8, 'Analis Informasi Sumber Daya Hutan', NULL, NULL),
(9, 'Penyusun Program Anggaran dan Pelaporan', NULL, NULL),
(10, 'Analisis Perencanaan dan Kerjasama', NULL, NULL),
(11, 'Polisi Kehutanan Ahli Utama', NULL, NULL),
(12, 'Polisi Kehutanan Ahli Madya', NULL, NULL),
(13, 'Polisi Kehutanan Ahli Muda', NULL, NULL),
(14, 'Polisi Kehutanan Ahli Pertama', NULL, NULL),
(15, 'Polisi Kehutanan Penyelia', NULL, NULL),
(16, 'Polisi Kehutanan Mahir', NULL, NULL),
(17, 'Polisi Kehutanan Terampil', NULL, NULL),
(18, 'Polisi Kehutanan Pemula', NULL, NULL),
(19, 'Penyuluh Kehutanan Ahli Utama', NULL, NULL),
(20, 'Penyuluh Kehutanan Ahli Madya', NULL, NULL),
(21, 'Penyuluh Kehutanan Ahli Muda', NULL, NULL),
(22, 'Penyuluh Kehutanan Ahli Pertama', NULL, NULL),
(23, 'Penyuluh Kehutanan Penyelia', NULL, NULL),
(24, 'Penyuluh Kehutanan Mahir', NULL, NULL),
(25, 'Penyuluh Kehutanan Terampil', NULL, NULL),
(26, 'Penyuluh Kehutanan Pemula', NULL, NULL),
(27, 'Pengelola Perlindungan Tanaman dan Pengelolaan Hasil Perkebunan dan Kehutanan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `uuid`, `fullname`, `nip`, `pangkat`, `address`, `place_of_birth`, `date_of_birth`, `religion`, `email`, `education`, `golongan`, `level_id`, `img`, `created_at`, `updated_at`) VALUES
(1, '3ab4b81c6ceb4408bc36b06ad9256253', 'Reza', '', '', 'Jalan Mawar', 'Pangkajene', '2022-02-09', 'Islam', 'reza@gmail.com', 'S1', 'PNS', 1, 'Foto Member__Reza__1644307316__Foto Reza Arisandy Safruddin.JPG', '2022-02-08 07:01:57', '2022-02-08 07:01:57'),
(2, '335c624885e14979b6bbb807843c5c9b', 'Rezaaaaa', '', '', 'Jalan Mawar', 'Pangkajene', '2022-02-07', 'Islam', 'rezaasdf@gmail.com', 'S1', 'PNS', 2, NULL, '2022-02-08 13:30:48', '2022-02-08 13:30:48'),
(3, '839eb85bb9634c80b2c0a560e08d8339', 'Reza Arisandy Safruddin', '', '', 'Jalan Mawar', 'Pangkajene', '2022-02-02', 'Islam', 'rezanaruto@yahoo.co.id', 'S1', 'PNS', 3, NULL, '2022-02-08 13:35:15', '2022-02-08 13:35:15'),
(4, '7391998bdfea40faa897b4e61fc14318', 'Reza', '', '', 'Jalan Mawar', 'Pangkajene', '2022-02-01', 'Islam', 'reza@gmail.com', 'S1', 'PNS', 5, NULL, '2022-02-08 13:45:44', '2022-02-08 13:45:44'),
(5, '72cccc4adf9d439596e05e77d6e87ad0', 'Reza', '', '', 'Jalan Mawar', 'Pangkajene', '2022-02-08', 'Islam', 'reza@gmail.com', 'S1', 'PNS', 6, 'Foto Member__Reza__1644332837__Foto Reza Arisandy Safruddin.JPG', '2022-02-08 13:46:10', '2022-02-08 14:07:18'),
(6, '8a2b8c7a310d42be92115f843739c0b9', 'Reza', '', '', 'Jalan Mawar', 'Pangkajene', '2022-02-16', 'Islam', 'reza@gmail.com', 'S1', 'PNS', 7, NULL, '2022-02-08 13:46:42', '2022-02-08 13:46:42'),
(7, '36fd13f5e5c7445792e001b70f6ded59', 'Reza', '', '', 'Jalan Mawar', 'Pangkajene', '2022-02-02', 'Islam', 'reza@gmail.com', 'S1', 'PNS', 8, NULL, '2022-02-08 13:47:09', '2022-02-08 13:47:09'),
(8, '1e2e254aa907480fabd932863e95b6cb', 'Reza', '', '', 'Jalan Mawar', 'Pangkajene', '2022-02-01', 'Islam', 'admin@gmail.com', 'S1', 'PNS', 9, NULL, '2022-02-08 13:47:49', '2022-02-08 13:47:49'),
(9, '19229b856edd48bbbe0abfa1b110f849', 'Reza', '', '', 'Jalan Mawar', 'Pangkajene', '2022-02-04', 'Islam', 'rezanaruto@yahoo.co.id', 'S1', 'PNS', 10, NULL, '2022-02-08 13:48:15', '2022-02-08 13:48:15'),
(10, 'd42c38cc0fd14652a50b7c9894f929dc', 'Rezaaaaa', '', '', 'Jalan Mawar', 'Pangkajene', '2022-02-02', 'Islam', 'reza@gmail.com', 'S1', 'PNS', 4, NULL, '2022-02-09 02:43:52', '2022-02-09 02:43:52');

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
(5, '2021_12_30_062623_create_roles_table', 1),
(6, '2022_01_05_022331_add_img_to_users_table', 1),
(7, '2022_01_05_052446_create_members_table', 1),
(8, '2022_01_07_152348_create_beritas_table', 1),
(9, '2022_01_07_160606_create_berita_categories_table', 1),
(10, '2022_01_10_024614_create_galeries_table', 1),
(11, '2022_01_10_034803_create_inboxes_table', 1),
(12, '2022_01_10_051818_create_profiles_table', 1),
(13, '2022_01_10_051905_create_profile_categories_table', 1),
(14, '2022_02_04_203353_add_slug_to_beritas_table', 1),
(15, '2022_02_04_224335_add_slug_to_profile_categories_table', 1),
(16, '2022_02_08_090013_create_perhutanan_categories_table', 2),
(17, '2022_02_08_091327_create_perhutanans_table', 2),
(18, '2022_02_08_113215_add_perhutanan_category_id_to_perhutanans_table', 3),
(26, '2022_02_08_205212_create_levels_table', 4),
(27, '2022_02_09_110128_add_nip_to_members_table', 4);

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
-- Struktur dari tabel `perhutanans`
--

CREATE TABLE `perhutanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perhutanan_category_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perhutanans`
--

INSERT INTO `perhutanans` (`id`, `title`, `link`, `perhutanan_category_id`, `content`, `created_at`, `updated_at`) VALUES
(4, 'Hutan Kemasyarakatan', NULL, 5, '<p>Test, ini hutan kemasyarakatan, dimana isi nya ada banyak sesuatu. ada banyak potensi maksudnya</p>\r\n<p>dicobaa</p>\r\n<p>cekk</p>\r\n<p>oknahh.</p>', '2022-02-08 09:22:12', '2022-02-08 12:01:47'),
(5, 'Hutan Desa', 'http://www.facebook.com', 6, 'testt testt ji ini nahh', '2022-02-08 11:11:01', '2022-02-08 11:56:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perhutanan_categories`
--

CREATE TABLE `perhutanan_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perhutanan_categories`
--

INSERT INTO `perhutanan_categories` (`id`, `uuid`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(5, '42c94923-fa75-4d15-bcb6-6887241e2c80', 'HKm', 'hkm', NULL, NULL),
(6, '92afccb5-14ab-4f75-a9d5-7bc6c2a45b43', 'HD', 'hd', NULL, NULL),
(7, '92dc37a1-9b23-49c9-bfbf-2e7e0d2307b2', 'HTR', 'htr', NULL, NULL),
(8, 'a070aa7b-6196-43da-b90e-d1ea3390fca1', 'Pengamanan dan Perlindungan Hutan', 'pengamanan-dan-perlindungan-hutan', NULL, NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_category_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile_categories`
--

CREATE TABLE `profile_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profile_categories`
--

INSERT INTO `profile_categories` (`id`, `uuid`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'ea029a06-1228-4004-a374-e5490649dd7f', 'Visi dan Misi', 'visi-dan-misi', NULL, NULL),
(2, 'dfdd4083-0876-4d19-a720-8e5bbde04806', 'Sejarah', 'sejarah', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `uuid`, `nama`, `created_at`, `updated_at`) VALUES
(1, '26308b66-5ca4-475d-9b19-d3f9fd270c52', 'superadmin', NULL, NULL),
(2, '0625360a-eeb3-48e0-9419-68eb6161de57', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `username`, `password`, `role_id`, `img`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'Reza Arisandy S', 'superadmin', '$2y$10$v84dYhrxr1MLQY7SbEYYRe7K8M3GZetvocmpiuN5kKGgAhifFo6Hq', 1, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `beritas_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `beritas_slug_unique` (`slug`);

--
-- Indeks untuk tabel `berita_categories`
--
ALTER TABLE `berita_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `berita_categories_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `galeries`
--
ALTER TABLE `galeries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `galeries_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inboxes`
--
ALTER TABLE `inboxes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inboxes_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `perhutanans`
--
ALTER TABLE `perhutanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perhutanan_categories`
--
ALTER TABLE `perhutanan_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `perhutanan_categories_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `profile_categories`
--
ALTER TABLE `profile_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profile_categories_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `profile_categories_slug_unique` (`slug`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uuid_unique` (`uuid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `berita_categories`
--
ALTER TABLE `berita_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeries`
--
ALTER TABLE `galeries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `inboxes`
--
ALTER TABLE `inboxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `perhutanans`
--
ALTER TABLE `perhutanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `perhutanan_categories`
--
ALTER TABLE `perhutanan_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profile_categories`
--
ALTER TABLE `profile_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
