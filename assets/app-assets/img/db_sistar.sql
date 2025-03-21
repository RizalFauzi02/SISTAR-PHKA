-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2025 pada 17.54
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_sendwhatsapp`
--

CREATE TABLE `log_sendwhatsapp` (
  `id_logWA` int(11) NOT NULL,
  `username_pengirim` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nomor_pasien` varchar(20) NOT NULL,
  `pesan_whatsapp` text NOT NULL,
  `tgl_kirim` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_sendwhatsapp`
--

INSERT INTO `log_sendwhatsapp` (`id_logWA`, `username_pengirim`, `id_user`, `id_pasien`, `nomor_pasien`, `pesan_whatsapp`, `tgl_kirim`, `id_status`) VALUES
(1, 'perawat', 3, 1, '6281310734281', '*Selamat Malam Bapak/Ibu,*\n\nNama: *Rizal Fauzi*\nTanggal Lahir: *02/03/2001*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-17 15:39:45', 1),
(2, 'admin', 2, 1, '6281310734281', '*Selamat Pagi Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \n\nEstimasi waktu penyelesaian adalah 10 menit. Terima kasih atas pengertiannya.', '2025-03-19 12:19:29', 20),
(3, 'admin', 2, 1, '6281310734281', '*Selamat Pagi Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi.\nTerima kasih telah bersedia menunggu.', '2025-03-19 12:20:08', 4),
(4, 'admin', 2, 1, '6281310734281', '*Selamat Pagi Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sudah selesai, mohon untuk menunggu obat pulang.\nTerima kasih telah bersedia menunggu.', '2025-03-19 12:20:25', 4),
(5, 'admin', 2, 1, '6281310734281', '*Selamat Malam Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \n\nEstimasi waktu penyelesaian adalah 10 menit. Terima kasih atas pengertiannya.', '2025-03-19 13:27:50', 4),
(6, 'admin', 2, 1, '6281310734281', '*Selamat Malam Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sudah selesai, mohon untuk menunggu obat pulang.\nTerima kasih telah bersedia menunggu.', '2025-03-19 13:29:00', 20),
(7, 'admin', 2, 2, '6285956368533', '*Selamat Malam Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \n\nEstimasi waktu penyelesaian adalah 10 menit. Terima kasih atas pengertiannya.', '2025-03-19 13:30:46', 4),
(8, 'superadmin', 1, 2, '6285956368533', '*Selamat Malam Bapak/Ibu,*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-19 16:23:41', 1),
(9, 'perawat', 3, 8, '628554153365', '*Selamat Malam Bapak/Ibu,*\n\nNama: *TRIASTUTRI*\nTanggal Lahir: *26/09/2001*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-19 16:30:17', 1),
(10, 'farmasi', 4, 1, '6281310734281', '*Selamat Malam Bapak/Ibu,*\n\nTerima kasih telah bersedia menunggu. \n\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan', '2025-03-19 16:34:27', 2),
(11, 'admin', 2, 1, '6281310734281', '*Selamat Malam Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \n\nEstimasi waktu penyelesaian adalah 10 menit. Terima kasih atas pengertiannya.', '2025-03-21 05:16:09', 4),
(12, 'perawat', 3, 19, '6281310734281', '*Selamat Pagi Bapak/Ibu,*\n\nNama: *Eva Yanti*\nTanggal Lahir: *10/05/1985*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-21 05:26:40', 1),
(13, 'admin', 2, 19, '6281310734281', '*Selamat Pagi Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \n\nEstimasi waktu penyelesaian adalah 10 menit. Terima kasih atas pengertiannya.', '2025-03-21 05:28:22', 4),
(14, 'admin', 2, 19, '6281310734281', '*Selamat Pagi Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \n\nEstimasi waktu penyelesaian adalah 10 menit. Terima kasih atas pengertiannya.', '2025-03-21 05:33:33', 4),
(15, 'admin', 2, 19, '6281310734281', '*Selamat Pagi Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \n\nEstimasi waktu penyelesaian adalah 10 menit. Terima kasih atas pengertiannya.', '2025-03-21 05:34:34', 4),
(16, 'admin', 2, 19, '6281310734281', '*Selamat Pagi Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \n\nEstimasi waktu penyelesaian adalah 10 menit. Terima kasih atas pengertiannya.', '2025-03-21 05:34:41', 4),
(17, 'admin', 2, 19, '6281310734281', '*Selamat Pagi Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \n\nEstimasi waktu penyelesaian adalah 10 menit. Terima kasih atas pengertiannya.', '2025-03-21 05:45:08', 4),
(18, 'admin', 2, 19, '6281310734281', '*Selamat Pagi Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sudah selesai, mohon untuk menunggu obat pulang.\nTerima kasih telah bersedia menunggu.', '2025-03-21 05:45:42', 20),
(19, 'farmasi', 4, 1, '6281310734256', '*Selamat Malam Bapak/Ibu,*\n\nNama: *Rizal Fauzi*\nTanggal Lahir: *02/03/2001*\n\nTerima kasih telah bersedia menunggu. \n\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan', '2025-03-21 16:23:24', 2),
(20, 'admin', 2, 2, '6285956368533', '*Selamat Malam Bapak/Ibu,*\n\nNama: *Syaiful Fikri*\nTanggal Lahir: *02/03/2001*\n\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \n\nEstimasi waktu penyelesaian adalah 10 menit. Terima kasih atas pengertiannya.', '2025-03-21 16:25:46', 4),
(21, 'admin', 2, 2, '6285956368533', '*Selamat Sore Bapak/Ibu,*\n\nNama: *Syaiful Fikri*\nTanggal Lahir: *02/03/2001*\n\nBerkas kepulangan Anda saat ini sudah selesai, mohon untuk menunggu obat pulang.\nTerima kasih telah bersedia menunggu.', '2025-03-21 16:26:38', 20),
(22, 'superadmin', 1, 2, '6285956368533', '*Selamat Malam Bapak/Ibu,*\n\nNama: *Syaiful Fikri*\nTanggal Lahir: *02/03/2001*\n\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi.\nTerima kasih telah bersedia menunggu.', '2025-03-21 16:29:45', 3),
(23, 'admin', 2, 1, '6281310734256', '*Selamat Malam Bapak/Ibu,*\n\nNama: *Rizal Fauzi*\nTanggal Lahir: *02/03/2001*\n\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \n\nEstimasi waktu penyelesaian adalah 10 menit. Terima kasih atas pengertiannya.', '2025-03-21 16:51:48', 4),
(24, 'admin', 2, 1, '6281310734256', '*Selamat Malam Bapak/Ibu,*\n\nNama: *Rizal Fauzi*\nTanggal Lahir: *02/03/2001*\n\nBerkas kepulangan Anda saat ini sudah selesai, mohon untuk menunggu obat pulang.\nTerima kasih telah bersedia menunggu.', '2025-03-21 16:52:05', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pasien`
--

CREATE TABLE `m_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_whatsapp` varchar(15) NOT NULL,
  `kamar` varchar(50) DEFAULT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_pasien`
--

INSERT INTO `m_pasien` (`id_pasien`, `nama_pasien`, `tanggal_lahir`, `no_whatsapp`, `kamar`, `created_at`, `updated_at`) VALUES
(1, 'Rizal Fauzi', '2001-03-02', '6281310734256', 'TOPAZ', '2025-03-08 00:39:58', '0000-00-00 00:00:00'),
(2, 'Syaiful Fikri', '2001-03-02', '6285956368533', 'EMERALD', '2025-03-08 00:42:54', '0000-00-00 00:00:00'),
(3, 'Fauzi Rizal', '2006-03-05', '6289664091196', 'KAMAR', '2025-03-08 00:50:31', '0000-00-00 00:00:00'),
(4, 'Faturrochman', '1989-07-09', '6289664152236', 'KAMAR', '2025-03-09 02:20:19', '2025-03-17 17:31:23'),
(6, 'Upi', '2009-06-05', '6289644515663', 'KAMAR', '2025-03-09 02:31:01', '0000-00-00 00:00:00'),
(7, 'HALIMAHATUS', '2007-05-04', '628544635445', 'KAMAR', '2025-03-09 02:39:06', '0000-00-00 00:00:00'),
(8, 'TRIASTUTRI', '2001-09-26', '628554153365', 'DIAMOND', '2025-03-09 02:43:43', '0000-00-00 00:00:00'),
(9, 'Ayu Kepo', '1989-11-17', '6289664872217', 'DIAMOND', '2025-03-10 08:28:35', '2025-03-16 06:26:16'),
(12, 'TEST aaaaa', '2002-02-02', '62865442056698', 'ICU/HCU', '2025-03-16 06:25:25', '2025-03-21 22:53:29'),
(18, 'YANTO', '2005-05-02', '62896546198896', NULL, '2025-03-21 12:23:51', '0000-00-00 00:00:00'),
(19, 'Eva Yanti', '1985-05-10', '6281310734281', 'SAPPHIRE', '2025-03-21 12:25:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_status`
--

CREATE TABLE `m_status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(150) NOT NULL,
  `pesan_status` varchar(255) NOT NULL,
  `jaminan` varchar(50) DEFAULT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_status`
--

INSERT INTO `m_status` (`id_status`, `nama_status`, `pesan_status`, `jaminan`, `created_at`, `updated_at`) VALUES
(1, '1. Menyiapkan Berkas Pulang', 'Saat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n', NULL, '2025-03-09 00:39:22', ''),
(2, '4. Mengantar Obat Pasien Pulang', 'Terima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n\r\n', NULL, '2025-03-09 01:44:59', ''),
(3, '3. Penyelesaian Administrasi', 'Berkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi.\r\nTerima kasih telah bersedia menunggu.\r\n', 'NON JKN', '2025-03-09 01:59:03', ''),
(4, '2. Sedang Dalam Proses', 'Berkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 10 menit. Terima kasih atas pengertiannya.', NULL, '2025-03-09 01:59:43', ''),
(20, '3. Penyelesaian Administrasi', 'Berkas kepulangan Anda saat ini sudah selesai, mohon untuk menunggu obat pulang.\r\nTerima kasih telah bersedia menunggu.', 'JKN', '2025-03-19 12:14:52', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_user`
--

CREATE TABLE `status_user` (
  `id_status_user` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_user`
--

INSERT INTO `status_user` (`id_status_user`, `id_status`, `id_user`) VALUES
(69, 1, 1),
(70, 1, 3),
(77, 2, 1),
(78, 2, 4),
(79, 3, 1),
(80, 3, 2),
(81, 20, 1),
(82, 20, 2),
(96, 4, 1),
(97, 4, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_role` int(1) NOT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `is_active`, `is_role`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '$2y$10$UphUusGOux7Dmj1AwtqzWOrJH8ykkSblfb17hwsxatECNcC6I8IaO', 1, 1, '2025-03-07 21:59:22', '2025-03-16 12:39:30'),
(2, 'admin', '$2y$10$R325JVmEADszEYGUysKs5ux/dLt8jLaqzW0CZzOjnso7q9.9dU9aW', 1, 2, '2025-03-08 23:47:03', '2025-03-17 13:34:55'),
(3, 'perawat', '$2y$10$qOnhe6pmrs60YMdfHJCYh.kxRTL.EGJh05sPWHLkvHGavKI8Bbagi', 1, 3, '2025-03-08 23:47:37', ''),
(4, 'farmasi', '$2y$10$We2NvUM0cmCOW4j/WyQS4uLxu.QXfamtIg/xkWbxmvFwFsXKwPyvm', 1, 4, '2025-03-08 23:48:07', '2025-03-11 23:07:20'),
(5, 'admin2', '$2y$10$AoZ65NLRD4atC.JiA11iEuiEu12aeGPVeS8uRHFKesnFnFk1AAigi', 0, 2, '2025-03-09 23:41:40', '2025-03-10 00:25:41'),
(7, 'perawat2', '$2y$10$KzQDTS0IkZF6i0z97yJqV.TGPr5143nFsPoLlsq6AHG.gIFJ4BH9i', 0, 3, '2025-03-09 23:45:10', '2025-03-16 12:41:48'),
(9, 'drRatnah', '$2y$10$XxQOWf7ba11e8R8kxO5F8u8MwSFhRFrZc8hThapBuX4Gr1V4Z6sNO', 0, 1, '2025-03-10 11:25:58', '2025-03-16 12:14:27'),
(10, 'farmasi2', '$2y$10$g4Dwzf9r9ynv7OU6Ni0QgucDWuCw2ii0By.G/7ef3vIvm.Q/8PQnC', 1, 4, '2025-03-16 12:52:25', '2025-03-16 12:53:22'),
(11, 'EVI', '$2y$10$dzMY40cdG5rxVnwWVlecI.ob3cOB6FQk4YkSB0DQLWEF4OFIwqora', 1, 2, '2025-03-17 13:36:54', '2025-03-17 13:37:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log_sendwhatsapp`
--
ALTER TABLE `log_sendwhatsapp`
  ADD PRIMARY KEY (`id_logWA`);

--
-- Indeks untuk tabel `m_pasien`
--
ALTER TABLE `m_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `m_status`
--
ALTER TABLE `m_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `status_user`
--
ALTER TABLE `status_user`
  ADD PRIMARY KEY (`id_status_user`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_sendwhatsapp`
--
ALTER TABLE `log_sendwhatsapp`
  MODIFY `id_logWA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `m_pasien`
--
ALTER TABLE `m_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `m_status`
--
ALTER TABLE `m_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `status_user`
--
ALTER TABLE `status_user`
  MODIFY `id_status_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `status_user`
--
ALTER TABLE `status_user`
  ADD CONSTRAINT `status_user_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `m_status` (`id_status`) ON DELETE CASCADE,
  ADD CONSTRAINT `status_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
