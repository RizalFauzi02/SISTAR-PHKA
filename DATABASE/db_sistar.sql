-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Mar 2025 pada 11.24
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
  `is_role` int(11) NOT NULL,
  `nomor_pasien` varchar(20) NOT NULL,
  `pesan_whatsapp` text NOT NULL,
  `tgl_kirim` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_sendwhatsapp`
--

INSERT INTO `log_sendwhatsapp` (`id_logWA`, `username_pengirim`, `id_user`, `is_role`, `nomor_pasien`, `pesan_whatsapp`, `tgl_kirim`) VALUES
(1, 'superadmin', 1, 1, '6289664091196', 'Selamat Malam Bapak/Ibu,\r\n\r\nPESAN TIDAK ADA UCAPAN\r\n\r\n_[ ini adalah pesan otomatis ]_', '2025-03-11 17:13:26'),
(2, 'admin', 2, 2, '6289664091196', 'Selamat Pagi Bapak/Ibu,\r\n\r\nBerkas kepulangan Anda saat ini sedang dalam antrian di Kasir Rawat Inap. \r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n\r\n_[ ini adalah pesan otomatis ]_', '2025-03-11 17:40:21'),
(3, 'admin', 2, 2, '6281310734281', 'Selamat Pagi Bapak/Ibu,\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 10 menit. Terima kasih atas pengertiannya.\r\n\r\n_[ ini adalah pesan otomatis ]_', '2025-03-12 03:37:13'),
(4, 'superadmin', 1, 1, '6285956368533', '*Selamat Malam Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sedang dalam antrian di Kasir Rawat Inap. \n\nTerima kasih telah bersedia menunggu.', '2025-03-15 15:34:42'),
(5, 'superadmin', 1, 1, '6281310734281', '*Selamat Malam Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sedang dalam antrian di Kasir Rawat Inap. \n\nTerima kasih telah bersedia menunggu.', '2025-03-15 15:35:17'),
(6, 'superadmin', 1, 1, '6289664091196', '*Selamat Malam Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sedang dalam antrian di Kasir Rawat Inap. \n\nTerima kasih telah bersedia menunggu.', '2025-03-15 15:40:26'),
(7, 'admin', 2, 2, '6285956368533', 'Selamat Malam Bapak/Ibu,\n\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \n\nEstimasi waktu penyelesaian adalah 10 menit. Terima kasih atas pengertiannya.', '2025-03-15 15:46:28'),
(8, 'farmasi', 4, 4, '6289664152236', '*Selamat Malam Bapak/Ibu,*\n\nTerima kasih telah bersedia menunggu. \n\nPetugas Farmasi saat ini sedang mempersiapkan obat kepulangan Anda dan akan segera mengantarkannya ke ruang perawatan.', '2025-03-15 15:49:08'),
(9, 'perawat', 3, 3, '6281310734281', '*Selamat Malam Bapak/Ibu,*\n\nNama: *Rizal Fauzi*\nTanggal Lahir: *02/03/2001*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-15 15:52:18'),
(10, 'perawat', 3, 3, '6281310734281', '*Selamat Malam Bapak/Ibu,*\n\nNama: *Rizal Fauzi*\nTanggal Lahir: *02/03/2001*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-15 15:55:42'),
(11, 'perawat', 3, 3, '6285956368533', '*Selamat Malam Bapak/Ibu,*\n\nNama: *Syaiful Fikri*\nTanggal Lahir: *02/03/2001*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-15 16:00:37'),
(12, 'perawat', 3, 3, '628964512556', '*Selamat Malam Bapak/Ibu,*\n\nNama: *Novaaaa*\nTanggal Lahir: *05/12/2006*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-15 16:03:27'),
(13, 'perawat', 3, 3, '6289664152236', '*Selamat Malam Bapak/Ibu,*\n\nNama: *Faturrochman*\nTanggal Lahir: *09/07/1989*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-15 16:04:13'),
(14, 'perawat', 3, 3, '6285956368533', '*Selamat Malam Bapak/Ibu,*\n\nNama: *Syaiful Fikri*\nTanggal Lahir: *02/03/2001*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-15 16:13:47'),
(15, 'perawat', 3, 3, '6285956368533', '*Selamat Malam Bapak/Ibu,*\n\nNama: *Syaiful Fikri*\nTanggal Lahir: *02/03/2001*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-15 16:16:50'),
(16, 'superadmin', 1, 1, '6289664091196', '*Selamat Malam Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sedang dalam antrian di Kasir Rawat Inap. \n\nTerima kasih telah bersedia menunggu.', '2025-03-15 16:19:27'),
(17, 'perawat', 3, 3, '6281310734281', '*Selamat Malam Bapak/Ibu,*\n\nNama: *Rizal Fauzi*\nTanggal Lahir: *02/03/2001*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-15 19:05:31'),
(18, 'perawat', 3, 3, '6289664091196', '*Selamat Malam Bapak/Ibu,*\n\nNama: *Fauzi Rizal*\nTanggal Lahir: *05/03/2006*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-15 19:07:52'),
(19, 'admin', 2, 2, '6285956368533', '*Selamat Malam Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sedang dalam antrian di Kasir Rawat Inap. \n\nTerima kasih telah bersedia menunggu.', '2025-03-15 19:36:19'),
(20, 'admin', 2, 2, '62896541524454', '*Selamat Pagi Bapak/Ibu,*\n\nBerkas kepulangan Anda saat ini sedang dalam antrian di Kasir Rawat Inap. \n\nTerima kasih telah bersedia menunggu.', '2025-03-16 05:01:52'),
(21, 'perawat', 3, 3, '6281310734281', '*Selamat Pagi Bapak/Ibu,*\n\nNama: *Rizal Fauzi*\nTanggal Lahir: *02/03/2001*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-17 01:05:52'),
(22, 'perawat', 3, 3, '6281310734281', '*Selamat Siang Bapak/Ibu,*\n\nNama: *Rizal Fauzi*\nTanggal Lahir: *02/03/2001*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-17 06:15:03'),
(23, 'perawat', 3, 3, '6281310734281', '*Selamat Siang Bapak/Ibu,*\n\nNama: *Rizal Fauzi*\nTanggal Lahir: *02/03/2001*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-17 06:15:41'),
(24, 'perawat', 3, 3, '6285956368533', '*Selamat Siang Bapak/Ibu,*\n\nNama: *Syaiful Fikri*\nTanggal Lahir: *02/03/2001*\n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.', '2025-03-17 06:16:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pasien`
--

CREATE TABLE `m_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_whatsapp` varchar(15) NOT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_pasien`
--

INSERT INTO `m_pasien` (`id_pasien`, `nama_pasien`, `tanggal_lahir`, `no_whatsapp`, `created_at`, `updated_at`) VALUES
(1, 'Rizal Fauzi', '2001-03-02', '6281310734281', '2025-03-08 00:39:58', '0000-00-00 00:00:00'),
(2, 'Syaiful Fikri', '2001-03-02', '6285956368533', '2025-03-08 00:42:54', '0000-00-00 00:00:00'),
(3, 'Fauzi Rizal', '2006-03-05', '6289664091196', '2025-03-08 00:50:31', '0000-00-00 00:00:00'),
(4, 'Faturrochmankkkkkk', '1989-07-09', '6289664152236', '2025-03-09 02:20:19', '2025-03-17 13:27:45'),
(6, 'Upi', '2009-06-05', '6289644515663', '2025-03-09 02:31:01', '0000-00-00 00:00:00'),
(7, 'HALIMAHATUS', '2007-05-04', '628544635445', '2025-03-09 02:39:06', '0000-00-00 00:00:00'),
(8, 'TRIASTUTRI', '2001-09-26', '628554153365', '2025-03-09 02:43:43', '0000-00-00 00:00:00'),
(9, 'Ayu Kepo', '1989-11-17', '6289664872217', '2025-03-10 08:28:35', '2025-03-16 06:26:16'),
(12, 'TEST', '2002-02-02', '62865442056698', '2025-03-16 06:25:25', '0000-00-00 00:00:00'),
(13, 'test dari ADMIN DI EDIT SAMA ADMIN', '1965-02-05', '62896541524454', '2025-03-16 06:28:14', '2025-03-16 06:31:17'),
(15, 'TEST DARI ADMIN', '2335-06-05', '6285664021185', '2025-03-16 12:00:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_status`
--

CREATE TABLE `m_status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(150) NOT NULL,
  `pesan_status` varchar(255) NOT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_status`
--

INSERT INTO `m_status` (`id_status`, `nama_status`, `pesan_status`, `created_at`, `updated_at`) VALUES
(1, '1. Menyiapkan Berkas Pulang', 'Saat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n', '2025-03-09 00:39:22', ''),
(2, '4. Mengantar Obat Pasien Pulang', 'Terima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n\r\n', '2025-03-09 01:44:59', ''),
(3, '3. Penyelesaian Administrasi', 'Berkas kepulangan Anda saat ini sudah selesai,\r\n\r\nsilahkan ke kasir rawat inap untuk menyelesaikan administrasi\r\nMohon untuk menunggu obat pulang (JKN)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n', '2025-03-09 01:59:03', ''),
(4, '2. Sedang Dalam Proses', 'Berkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 10 menit. Terima kasih atas pengertiannya.', '2025-03-09 01:59:43', ''),
(11, 'TEST BUTTON BARU', 'TEST DISINI DONGGG ASAHZHZHZHZHZHbbbbbbbb', '2025-03-16 00:48:22', '');

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
(64, 11, 1),
(69, 1, 1),
(70, 1, 3),
(73, 4, 1),
(74, 4, 2),
(77, 2, 1),
(78, 2, 4),
(79, 3, 1),
(80, 3, 2);

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
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `m_status`
--
ALTER TABLE `m_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `status_user`
--
ALTER TABLE `status_user`
  MODIFY `id_status_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

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
