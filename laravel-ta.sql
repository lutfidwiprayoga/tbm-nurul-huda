-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2022 pada 08.41
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-ta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_buku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pengarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_halaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bukus`
--

INSERT INTO `bukus` (`id`, `kode_buku`, `judul_buku`, `nama_pengarang`, `tahun_terbit`, `jumlah_halaman`, `jumlah_buku`, `jenis_buku`, `kategori`, `foto_cover`, `created_at`, `updated_at`) VALUES
(1, 'TBM-162022001', 'Kisah Si Kancil', 'Si Pengarang', '2001', '100', '2', 'Dongeng', 'Komik', 'TBM.png', '2022-05-28 07:52:06', '2022-06-01 09:29:13'),
(2, 'TBM-162022002', 'Lagu Tradisional', 'WR. Supratman', '1999', '50', '4', 'Lagu Anak', 'Lainnya', 'logo.svg', '2022-05-29 22:39:47', '2022-06-01 08:26:07'),
(3, 'TBM-162022003', 'Ari anak terlantar', 'Suprimin', '2001', '100', '2', 'Dongeng', 'Pelajaran', 'admin.jpg', '2022-06-01 05:54:26', '2022-06-01 08:21:44'),
(5, 'TBM-262022004', 'Diki vs Puntent', 'Suprimin', '2022', '200', '3', 'Fiksi', 'Pelajaran', 'logo2.png', '2022-06-01 20:44:30', '2022-06-01 20:44:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasis`
--

CREATE TABLE `donasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_donasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_bukti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `donasis`
--

INSERT INTO `donasis` (`id`, `nomor_donasi`, `user_id`, `nama`, `email`, `alamat`, `no_hp`, `judul_buku`, `jumlah_buku`, `jenis_buku`, `status`, `foto_cover`, `upload_bukti`, `created_at`, `updated_at`) VALUES
(1, NULL, 3, '', '', '', '', 'Timun Mas', '2', 'Dongeng', 'Sudah Diterima', NULL, NULL, '2022-05-29 06:45:54', '2022-05-28 23:54:33'),
(2, NULL, 3, '', '', '', '', 'Si Anak Kembar', '5', 'Dongeng', 'Menunggu Verifikasi', 'logo-white.svg', NULL, '2022-05-29 22:26:20', '2022-05-29 22:26:20'),
(3, NULL, 3, '', '', '', '', 'Malin Kundang', '4', 'Dongeng', 'Sudah Diterima', 'logo-mini.svg', 'people.png', '2022-05-30 20:35:24', '2022-06-01 02:08:58'),
(4, NULL, 3, '', '', '', '', 'Laskar Pelangi', '2', 'Novel', 'Sudah Diterima', 'admin.jpg', 'placeholder.png', '2022-06-01 08:27:43', '2022-06-01 08:35:12'),
(5, NULL, 3, '', '', '', '', 'Danau Toba', '2', 'Dongeng', 'Dikirim', 'Dias.jpg', 'Dias.jpg', '2022-06-01 21:13:00', '2022-06-01 21:16:29'),
(6, 'DNTBM-1462022006', NULL, 'Malik Fajar', 'malik@gmail.com', 'Sukojati', '08221235452', 'Si Paling Pintar', '2', 'Dongeng', 'Sudah Diterima', 'Malik Fajar.png', 'Malik Fajar.png', '2022-06-14 04:06:13', '2022-06-14 23:36:12');

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
-- Struktur dari tabel `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengajar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `mata_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwals`
--

INSERT INTO `jadwals` (`id`, `nama_pengajar`, `tanggal`, `mata_pelajaran`, `created_at`, `updated_at`) VALUES
(4, 'Nabila', '2022-06-03', 'Bahasa Arab', '2022-05-28 09:42:04', '2022-05-29 22:48:35'),
(5, 'Fatimah', '2022-06-01', 'IPA', '2022-05-28 09:42:21', '2022-05-28 09:42:21'),
(6, 'Rifki', '2022-05-30', 'Psikologi Anak', '2022-05-28 09:42:57', '2022-05-28 09:42:57');

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
(5, '2022_05_26_054004_create_bukus_table', 1),
(6, '2022_05_26_054228_create_jadwals_table', 1),
(7, '2022_05_26_055635_create_donasis_table', 1),
(8, '2022_05_26_063522_create_peminjaman_bukus_table', 1),
(9, '2022_05_26_071901_create_murids_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `murids`
--

CREATE TABLE `murids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `murids`
--

INSERT INTO `murids` (`id`, `nama`, `alamat`, `umur`, `sekolah`, `created_at`, `updated_at`) VALUES
(1, 'Laha', 'Langring', '13', 'MTS Darussholah', '2022-05-26 00:32:05', '2022-05-26 00:32:05'),
(4, 'Mualim', 'Langring', '13', 'MI Darussholah', '2022-06-01 21:57:41', '2022-06-01 21:57:41'),
(6, 'Ayu', 'Langring', '12', 'MI Darussholah', '2022-06-01 21:59:17', '2022-06-01 21:59:17');

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
-- Struktur dari tabel `peminjaman_bukus`
--

CREATE TABLE `peminjaman_bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED DEFAULT NULL,
  `murid_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal_pinjam` datetime NOT NULL,
  `tanggal_kembali` datetime DEFAULT NULL,
  `jumlah_pinjam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminjaman_bukus`
--

INSERT INTO `peminjaman_bukus` (`id`, `buku_id`, `murid_id`, `tanggal_pinjam`, `tanggal_kembali`, `jumlah_pinjam`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-06-01 00:00:00', '2022-06-01 16:29:13', '1', 'Selesai', 'Sek pinjam', '2022-06-01 08:24:37', '2022-06-01 09:29:13');

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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `role_user`, `email`, `email_verified_at`, `password`, `alamat`, `no_hp`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$hqNcWbNTrNJdTvtCBYnmouEvBx9/zF2JUmBQ5JT0Yl7YondVcd7RS', NULL, NULL, NULL, NULL, '2022-05-26 00:31:10', '2022-05-26 00:31:10'),
(3, 'Dias', 'donatur', 'dias@gmail.com', NULL, '$2y$10$wM7n2H5hg.kh.MaHYdKz/uuZ.iSFQtarqjzxbcTtRxU.SxhuhYk7W', NULL, NULL, NULL, NULL, '2022-05-29 00:28:35', '2022-05-29 00:28:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `donasis`
--
ALTER TABLE `donasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `murids`
--
ALTER TABLE `murids`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `peminjaman_bukus`
--
ALTER TABLE `peminjaman_bukus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT untuk tabel `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `donasis`
--
ALTER TABLE `donasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `murids`
--
ALTER TABLE `murids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `peminjaman_bukus`
--
ALTER TABLE `peminjaman_bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
