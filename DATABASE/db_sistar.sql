-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2025 pada 18.33
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
-- Struktur dari tabel `m_pasien`
--

CREATE TABLE `m_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_whatsapp` varchar(15) NOT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_pasien`
--

INSERT INTO `m_pasien` (`id_pasien`, `nama_pasien`, `tanggal_lahir`, `no_whatsapp`, `created_at`, `updated_at`) VALUES
(1, 'Rizal Fauzi', '2001-03-02', '6289664091196', '2025-03-08 00:39:58', ''),
(2, 'Syaiful Fikri', '2001-03-02', '6589664019965', '2025-03-08 00:42:54', ''),
(3, 'Fauzi Rizal', '2006-03-05', '6289664091196', '2025-03-08 00:50:31', ''),
(4, 'Faturrochman', '1989-07-09', '6289664152236', '2025-03-09 02:20:19', ''),
(5, 'Novaaaa', '2006-12-05', '628964512556', '2025-03-09 02:28:40', ''),
(6, 'Upi', '2009-06-05', '6289644515663', '2025-03-09 02:31:01', ''),
(7, 'HALIMAHATUS', '2007-05-04', '628544635445', '2025-03-09 02:39:06', ''),
(8, 'TRIASTUTRI', '2001-09-26', '628554153365', '2025-03-09 02:43:43', '');

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
(1, 'Menyiapkan Berkas Pulang', 'Selamat Pagi/Siang/Sore/Malam, \n\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\n\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\n\n[ ini adalah pesan otomatis ]', '2025-03-09 00:39:22', ''),
(2, 'Mengantar Obat Pasien Pulang', 'Terima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi saat ini sedang mempersiapkan obat kepulangan Anda dan akan segera mengantarkannya ke ruang perawatan.\r\n\r\n[ ini adalah pesan otomatis ]', '2025-03-09 01:44:59', ''),
(3, 'Dalam Antrian', 'Berkas kepulangan Anda saat ini sedang dalam antrian di Kasir Rawat Inap. \r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n[ ini adalah pesan otomatis ]', '2025-03-09 01:59:03', ''),
(4, 'Sedang Dalam Proses', 'Berkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 10 menit. Terima kasih atas pengertiannya.', '2025-03-09 01:59:43', '');

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
(1, 1, 1),
(2, 1, 3),
(3, 2, 1),
(4, 2, 4),
(5, 3, 1),
(6, 3, 2),
(7, 4, 1),
(8, 4, 2);

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
(1, 'superadmin', '$2y$10$UphUusGOux7Dmj1AwtqzWOrJH8ykkSblfb17hwsxatECNcC6I8IaO', 1, 1, '2025-03-07 21:59:22', ''),
(2, 'admin', '$2y$10$R325JVmEADszEYGUysKs5ux/dLt8jLaqzW0CZzOjnso7q9.9dU9aW', 1, 2, '2025-03-08 23:47:03', ''),
(3, 'perawat', '$2y$10$qOnhe6pmrs60YMdfHJCYh.kxRTL.EGJh05sPWHLkvHGavKI8Bbagi', 1, 3, '2025-03-08 23:47:37', ''),
(4, 'farmasi', '$2y$10$We2NvUM0cmCOW4j/WyQS4uLxu.QXfamtIg/xkWbxmvFwFsXKwPyvm', 1, 4, '2025-03-08 23:48:07', ''),
(5, 'admin2', '$2y$10$AoZ65NLRD4atC.JiA11iEuiEu12aeGPVeS8uRHFKesnFnFk1AAigi', 0, 2, '2025-03-09 23:41:40', '2025-03-10 00:25:41'),
(6, 'farmasi2', '$2y$10$efIv.P.z.M7lLKVzvPzgCuWOOTQIqdmGx/S9t1dYHgVu.engtvxtS', 0, 4, '2025-03-09 23:43:19', '2025-03-10 00:22:27'),
(7, 'perawat2', '$2y$10$KzQDTS0IkZF6i0z97yJqV.TGPr5143nFsPoLlsq6AHG.gIFJ4BH9i', 0, 3, '2025-03-09 23:45:10', '2025-03-10 00:21:19');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel `m_pasien`
--
ALTER TABLE `m_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `m_status`
--
ALTER TABLE `m_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `status_user`
--
ALTER TABLE `status_user`
  MODIFY `id_status_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
