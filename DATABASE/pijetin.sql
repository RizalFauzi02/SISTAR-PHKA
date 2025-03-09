-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2022 pada 10.46
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pijetin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `durasi` varchar(128) NOT NULL,
  `date_order` varchar(100) NOT NULL,
  `time_order` time NOT NULL,
  `date_done` datetime DEFAULT NULL,
  `tipe_pijat` varchar(20) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `note` text DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_users`, `durasi`, `date_order`, `time_order`, `date_done`, `tipe_pijat`, `jk`, `note`, `status`, `alamat`, `created_at`, `update_at`) VALUES
(1, 7, '120000', '7 January, 2022', '13:00:00', NULL, 'rumah', 'P', 'Nanti tlpn saya ya pak..!', 'Menunggu..', 'Kosambi, Ramai Penduduk, Daerah Karawang, Klari, Jawa Barat Indonesia', '2022-01-07 09:43:20', '2022-01-07 16:43:20'),
(2, 8, '120000', '10 January, 2022', '10:00:00', NULL, 'tempat', 'L', '', 'Menunggu..', 'Deket Juga di Kosambi, tapi belum pernah ke sana, Karawang, Jawa Barat', '2022-01-07 09:45:39', '2022-01-07 16:45:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `sertif` varchar(255) DEFAULT NULL,
  `profile` varchar(255) NOT NULL,
  `hash_key` varchar(255) DEFAULT NULL,
  `hash_expiry` varchar(50) DEFAULT NULL,
  `is_active` int(3) NOT NULL,
  `is_reject` int(3) DEFAULT NULL,
  `is_role` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `name`, `username`, `password`, `email`, `alamat`, `nohp`, `jenis_kelamin`, `ktp`, `sertif`, `profile`, `hash_key`, `hash_expiry`, `is_active`, `is_reject`, `is_role`, `created_at`, `updated_at`) VALUES
(1, 'RIZAL FAUZI', 'admin', '$2y$10$NBjC7o2dPLuXDOFu/XS4cu/btQmX0Ex6L/l5wKt4c2mLt2H1yXkXq', 'rizalfauzi1558@gmail.com', 'Perum Gading Elok 1 Kel. Karawang Wetan Kec. Karawang Timur Kab. Karawang, Jawa Barat INDONESIA', '6289664091196', 'L', '9a39f9725ec685f31109e439c45618ff.jpg', '', '2a7cdd8512767b0cd6a128369909342a.jpg', NULL, NULL, 1, NULL, 1, '2021-12-29 09:57:05', '2022-01-06 15:25:38'),
(3, 'Antika Sari', 'pelanggan', '$2y$10$9no.WDgmKsfdN8v5ICyLUOoS9mm82Fc19C3fUiD5iwyvZRVu4w/l6', 'dimasarya1551@gmail.com', 'CKM, Klari, Karawang', '62896648711654', 'P', NULL, NULL, 'default.jpg', NULL, NULL, 0, NULL, 3, '2021-12-30 07:41:11', '2022-01-06 11:35:39'),
(7, 'Suci Alifiya Andang', 'suci', '$2y$10$xL2T2D/uvFB1SGvFYQsgSOCOuXR4LjQ4egHOTt8eGHMDla/m9Zq9W', 'rizalfauzi1557@gmail.com', 'Kosambi, Ramai Penduduk, Daerah Karawang, Klari, Jawa Barat Indonesia', '62896648766532', 'P', '07151107fb02b67c05fde2d0c4546749.png', '90d665d724e64dbd8952b320ba0571a9.png', '99a3533ae08dea2d43459740f9fec5e5.jpg', NULL, NULL, 1, NULL, 2, '2021-12-31 04:29:24', '2022-01-06 15:17:35'),
(8, 'Faturrochman', 'fatur', '$2y$10$X0635N.l/5DvNQh.8vCtBuj6vLB6edWeMTZ90MFMAHBW.wAImO78C', 'rizalfauzi1559@gmail.com', 'Deket Juga di Kosambi, tapi belum pernah ke sana, Karawang, Jawa Barat', '6289645128896', 'L', '8f087954be956e034846f17d27323712.jpg', '7ad61d6c6286ab9905971ee89888326d.jpg', 'default.jpg', NULL, NULL, 1, NULL, 2, '2021-12-31 04:30:42', '2022-01-06 11:35:43'),
(9, 'Antika Sari Ci boedaxx gaole', 'antika', '$2y$10$3tx13cLjG1HpDNa/wtJ9ou41JXrJCjFdblJ6OOFV0Bx1tNKtJaMT6', 'rizalfauzi1555@gmail.com', 'Ini deket rumahnya si alfian, lebih deket kerumahnya lewat belakang CKM, Karawang, Jawa Barat', '628964212343423', 'P', 'e41ee2a6c5a4a0120b29ce577adc9aaf.jpg', '9d7e81a5387f9fa5a4ce59a6a584c9e1.jpg', 'c8f407eece7b4c0097b5f34d429e72c9.jpg', NULL, NULL, 1, NULL, 3, '2021-12-31 04:34:11', '2022-01-06 15:08:00'),
(14, 'testing', 'testing', '$2y$10$8CIfRCMpQYarygL0uJa5p.fp/M9MdItltmmHwtEEBSKoUuP1dzNX2', 'random07@gmail.com', 'Alamat Testing dan testing aja ya gaes yyaaaa', '6289664342265', 'L', NULL, NULL, 'default.jpg', NULL, NULL, 1, NULL, 3, '2022-01-07 01:16:49', '2022-01-07 08:16:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
