-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2025 pada 15.25
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
  `tgl_kirim` datetime NOT NULL DEFAULT current_timestamp(),
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_sendwhatsapp`
--

INSERT INTO `log_sendwhatsapp` (`id_logWA`, `username_pengirim`, `id_user`, `id_pasien`, `nomor_pasien`, `pesan_whatsapp`, `tgl_kirim`, `id_status`) VALUES
(125, 'Topaz', 7, 42, '6285280058585', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *PAMUJI RAHAYU*\r\nTanggal Lahir: *02/10/2004*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281318770019', '2025-04-09 07:09:19', 26),
(126, 'Admin', 2, 42, '6285280058585', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *PAMUJI RAHAYU*\r\nTanggal Lahir: *02/10/2004*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-09 07:22:23', 4),
(127, 'Admin', 2, 42, '6285280058585', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *PAMUJI RAHAYU*\r\nTanggal Lahir: *02/10/2004*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542\r\n', '2025-04-09 07:35:12', 3),
(128, 'Farmasi', 4, 42, '6285280058585', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *PAMUJI RAHAYU*\r\nTanggal Lahir: *02/10/2004*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-09 07:43:38', 2),
(129, 'Topaz', 7, 46, '62895334676288', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *MUHAMMAD SANDRIA*\r\nTanggal Lahir: *15/06/2000*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281318770019', '2025-04-09 07:48:28', 26),
(130, 'Admin', 2, 46, '62895334676288', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *MUHAMMAD SANDRIA*\r\nTanggal Lahir: *15/06/2000*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-09 08:03:13', 4),
(131, 'Admin', 2, 46, '62895334676288', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *MUHAMMAD SANDRIA*\r\nTanggal Lahir: *15/06/2000*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542\r\n', '2025-04-09 08:12:16', 3),
(132, 'Farmasi', 4, 46, '62895334676288', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *MUHAMMAD SANDRIA*\r\nTanggal Lahir: *15/06/2000*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-09 08:42:34', 2),
(133, 'Admin', 2, 79, '6285272331020', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *DYAH ANISA*\r\nTanggal Lahir: *09/02/1995*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-09 12:35:26', 4),
(134, 'Admin', 2, 79, '6285272331020', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *DYAH ANISA*\r\nTanggal Lahir: *09/02/1995*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-09 12:36:57', 20),
(135, 'Diamond', 13, 79, '6285272331020', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *DYAH ANISA*\r\nTanggal Lahir: *09/02/1995*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6282177754355', '2025-04-09 12:38:19', 28),
(136, 'Farmasi', 4, 79, '6285272331020', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *DYAH ANISA*\r\nTanggal Lahir: *09/02/1995*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-09 12:54:02', 2),
(137, 'Crystal', 12, 60, '628128524641', '*Selamat Sore Bapak/Ibu,*\r\n\r\n', '2025-04-09 14:57:51', 0),
(138, 'Topaz', 7, 64, '6285693664599', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *HISYAM RADITYA PADLURROMAN*\r\nTanggal Lahir: *20/11/2013*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281318770019', '2025-04-09 15:56:06', 26),
(139, 'Admin', 2, 60, '628128524641', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *ENCUM SUMIRAT*\r\nTanggal Lahir: *05/10/1971*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-09 15:59:53', 4),
(140, 'Topaz', 7, 51, '6285716719336', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *HABIBAH ADAWIYAH*\r\nTanggal Lahir: *25/09/2021*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281318770019', '2025-04-09 17:24:55', 26),
(141, 'Topaz', 7, 59, '6285775287752', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *MUHAMMAD NIZAR ALFATH*\r\nTanggal Lahir: *16/10/2023*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281318770019', '2025-04-09 17:25:21', 26),
(142, 'Admin', 2, 60, '628128524641', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *ENCUM SUMIRAT*\r\nTanggal Lahir: *05/10/1971*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-09 17:35:22', 20),
(143, 'Farmasi', 4, 60, '628128524641', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *ENCUM SUMIRAT*\r\nTanggal Lahir: *05/10/1971*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-09 18:19:05', 2),
(144, 'Admin', 2, 64, '6285693664599', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *HISYAM RADITYA PADLURROMAN*\r\nTanggal Lahir: *20/11/2013*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-09 18:29:02', 4),
(145, 'Admin', 2, 51, '6285716719336', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *HABIBAH ADAWIYAH*\r\nTanggal Lahir: *25/09/2021*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-09 19:03:04', 4),
(146, 'Admin', 2, 59, '6285775287752', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *MUHAMMAD NIZAR ALFATH*\r\nTanggal Lahir: *16/10/2023*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-09 19:03:19', 4),
(147, 'Admin', 2, 51, '6285716719336', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *HABIBAH ADAWIYAH*\r\nTanggal Lahir: *25/09/2021*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-09 19:16:02', 20),
(148, 'Crystal', 12, 37, '6281311567482', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *JIHAN NURSUCI*\r\nTanggal Lahir: *05/01/1999*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281316726062', '2025-04-09 19:22:30', 27),
(149, 'Crystal', 12, 44, '628159007509', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *DENY ALAMSYAH*\r\nTanggal Lahir: *21/10/1974*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281316726062', '2025-04-09 19:22:49', 27),
(150, 'Farmasi', 4, 51, '6285716719336', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *HABIBAH ADAWIYAH*\r\nTanggal Lahir: *25/09/2021*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-09 19:30:47', 2),
(151, 'Admin', 2, 64, '6285693664599', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *HISYAM RADITYA PADLURROMAN*\r\nTanggal Lahir: *20/11/2013*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-09 19:34:27', 20),
(152, 'Farmasi', 4, 64, '6285693664599', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *HISYAM RADITYA PADLURROMAN*\r\nTanggal Lahir: *20/11/2013*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-09 19:49:02', 2),
(153, 'Admin', 2, 59, '6285775287752', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *MUHAMMAD NIZAR ALFATH*\r\nTanggal Lahir: *16/10/2023*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-09 20:03:07', 20),
(154, 'Farmasi', 4, 59, '6285775287752', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *MUHAMMAD NIZAR ALFATH*\r\nTanggal Lahir: *16/10/2023*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-09 20:04:40', 2),
(155, 'Admin', 2, 44, '628159007509', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *DENY ALAMSYAH*\r\nTanggal Lahir: *21/10/1974*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-09 21:07:16', 4),
(156, 'Admin', 2, 44, '628159007509', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *DENY ALAMSYAH*\r\nTanggal Lahir: *21/10/1974*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-09 21:07:28', 20),
(157, 'Admin', 2, 37, '6281311567482', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *JIHAN NURSUCI*\r\nTanggal Lahir: *05/01/1999*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-09 21:07:40', 4),
(158, 'Admin', 2, 37, '6281311567482', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *JIHAN NURSUCI*\r\nTanggal Lahir: *05/01/1999*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-09 21:07:51', 20),
(159, 'Farmasi', 4, 44, '628159007509', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *DENY ALAMSYAH*\r\nTanggal Lahir: *21/10/1974*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-09 21:57:54', 2),
(160, 'Farmasi', 4, 37, '6281311567482', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *JIHAN NURSUCI*\r\nTanggal Lahir: *05/01/1999*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-09 21:58:12', 2),
(161, 'Sapphire', 3, 95, '6289664091196', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *TEST PASIEN*\r\nTanggal Lahir: *02/03/2001*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6282177754055', '2025-04-10 06:18:20', 1),
(162, 'UKB', 14, 96, '6281218335147', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *DEDI MULYADI*\r\nTanggal Lahir: *15/05/1976*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat kamar bedah', '2025-04-10 08:49:39', 34),
(163, 'Admin', 2, 96, '6281218335147', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *DEDI MULYADI*\r\nTanggal Lahir: *15/05/1976*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-10 09:20:54', 4),
(164, 'Topaz', 7, 55, '6283814707325', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *LINA MAULINA*\r\nTanggal Lahir: *12/11/1986*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281318770019', '2025-04-10 09:23:51', 26),
(165, 'Admin', 2, 55, '6283814707325', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *LINA MAULINA*\r\nTanggal Lahir: *12/11/1986*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-10 09:55:31', 4),
(166, 'Admin', 2, 55, '6283814707325', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *LINA MAULINA*\r\nTanggal Lahir: *12/11/1986*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-10 10:04:07', 20),
(167, 'Farmasi', 4, 55, '6283814707325', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *LINA MAULINA*\r\nTanggal Lahir: *12/11/1986*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-10 10:07:47', 2),
(168, 'Admin', 2, 96, '6281218335147', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *DEDI MULYADI*\r\nTanggal Lahir: *15/05/1976*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-10 11:19:55', 20),
(169, 'Farmasi', 4, 96, '6281218335147', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *DEDI MULYADI*\r\nTanggal Lahir: *15/05/1976*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-10 11:57:33', 2),
(170, 'Sapphire', 3, 88, '6281285980421', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *AGUS SUDIONO*\r\nTanggal Lahir: *24/05/1981*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6282177754055', '2025-04-10 15:31:13', 1),
(171, 'Topaz', 7, 101, '6289664091196', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *TEST PASIEN*\r\nTanggal Lahir: *02/03/2001*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281318770019', '2025-04-10 15:48:04', 26),
(172, 'Diamond', 13, 43, '6281807376609', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *RYANA LESTARI*\r\nTanggal Lahir: *12/05/2017*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6282177754355', '2025-04-10 15:52:42', 28),
(173, 'Admin', 2, 88, '6281285980421', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *AGUS SUDIONO*\r\nTanggal Lahir: *24/05/1981*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-10 16:52:42', 4),
(174, 'Diamond', 13, 45, '6287879004616', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *SHAUQI KHAIRI WIDARTA*\r\nTanggal Lahir: *21/02/2024*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6282177754355', '2025-04-10 16:53:49', 28),
(175, 'Diamond', 13, 77, '6285781351314', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *NURYATI*\r\nTanggal Lahir: *16/05/1986*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6282177754355', '2025-04-10 16:53:58', 28),
(176, 'Farmasi', 4, 88, '', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *AGUS SUDIONO*\r\nTanggal Lahir: **\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-10 17:19:41', 2),
(177, 'Farmasi', 4, 88, '6281285980421', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *AGUS SUDIONO*\r\nTanggal Lahir: *24/05/1981*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-10 17:21:47', 2),
(178, 'Admin', 2, 43, '6281807376609', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *RYANA LESTARI*\r\nTanggal Lahir: *12/05/2017*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-10 17:22:40', 4),
(179, 'Admin', 2, 77, '6285781351314', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *NURYATI*\r\nTanggal Lahir: *16/05/1986*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-10 17:22:53', 4),
(180, 'Admin', 2, 45, '6287879004616', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *SHAUQI KHAIRI WIDARTA*\r\nTanggal Lahir: *21/02/2024*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-10 17:23:06', 4),
(181, 'Admin', 2, 88, '6281285980421', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *AGUS SUDIONO*\r\nTanggal Lahir: *24/05/1981*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-10 17:30:28', 20),
(182, 'Topaz', 7, 69, '6285710885595', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *HAURA ATHIFAH*\r\nTanggal Lahir: *27/12/2023*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281318770019', '2025-04-10 18:23:38', 26),
(183, 'Topaz', 7, 86, '6283815414353', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *HERI*\r\nTanggal Lahir: *07/11/1984*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281318770019', '2025-04-10 18:26:17', 26),
(184, 'Topaz', 7, 57, '6281386328543', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *MUHAMAD REICHO ALFIAN SAPUTRA*\r\nTanggal Lahir: *09/12/2003*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281318770019', '2025-04-10 18:26:19', 26),
(185, 'Topaz', 7, 62, '62881011168780', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *REZA VAHLEPI*\r\nTanggal Lahir: *18/03/2004*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281318770019', '2025-04-10 18:26:40', 26),
(186, 'Admin', 2, 77, '6285781351314', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *NURYATI*\r\nTanggal Lahir: *16/05/1986*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-10 18:47:12', 20),
(187, 'Admin', 2, 62, '62881011168780', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *REZA VAHLEPI*\r\nTanggal Lahir: *18/03/2004*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-10 19:26:28', 4),
(188, 'Admin', 2, 62, '62881011168780', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *REZA VAHLEPI*\r\nTanggal Lahir: *18/03/2004*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542\r\n', '2025-04-10 19:26:43', 3),
(189, 'Admin', 2, 57, '6281386328543', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *MUHAMAD REICHO ALFIAN SAPUTRA*\r\nTanggal Lahir: *09/12/2003*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-10 19:27:18', 4),
(190, 'Admin', 2, 57, '6281386328543', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *MUHAMAD REICHO ALFIAN SAPUTRA*\r\nTanggal Lahir: *09/12/2003*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542\r\n', '2025-04-10 19:27:34', 3),
(191, 'Admin', 2, 86, '6283815414353', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *HERI*\r\nTanggal Lahir: *07/11/1984*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-10 19:27:48', 4),
(192, 'Admin', 2, 86, '6283815414353', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *HERI*\r\nTanggal Lahir: *07/11/1984*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542\r\n', '2025-04-10 19:28:03', 3),
(193, 'Crystal', 12, 65, '6281906693232', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *SUNARNO*\r\nTanggal Lahir: *25/05/1971*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281316726062', '2025-04-10 19:38:57', 27),
(194, 'Farmasi', 4, 43, '6281807376609', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *RYANA LESTARI*\r\nTanggal Lahir: *12/05/2017*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-10 19:39:05', 2),
(195, 'Farmasi', 4, 77, '6285781351314', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *NURYATI*\r\nTanggal Lahir: *16/05/1986*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-10 19:39:46', 2),
(196, 'Admin', 2, 69, '6285710885595', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *HAURA ATHIFAH*\r\nTanggal Lahir: *27/12/2023*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-10 19:44:33', 20),
(197, 'Admin', 2, 45, '6287879004616', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *SHAUQI KHAIRI WIDARTA*\r\nTanggal Lahir: *21/02/2024*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-10 19:55:18', 20),
(198, 'Topaz', 7, 67, '6289693282888', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *TIAS RAHMA HIDAYAH*\r\nTanggal Lahir: *26/04/2009*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281318770019', '2025-04-10 19:56:04', 26),
(199, 'Farmasi', 4, 81, '6285881923854', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *LISTIYANA*\r\nTanggal Lahir: *14/06/1986*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-10 19:59:58', 2),
(200, 'Farmasi', 4, 86, '6283815414353', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *HERI*\r\nTanggal Lahir: *07/11/1984*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-10 20:26:11', 2),
(201, 'Farmasi', 4, 67, '6289693282888', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *TIAS RAHMA HIDAYAH*\r\nTanggal Lahir: *26/04/2009*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-10 20:50:38', 2),
(202, 'Farmasi', 4, 65, '6281906693232', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *SUNARNO*\r\nTanggal Lahir: *25/05/1971*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-10 21:03:48', 2),
(203, 'Diamond', 13, 85, '6289529374051', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *RONI BUDIYANTO*\r\nTanggal Lahir: *09/09/1979*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6282177754355', '2025-04-10 21:08:22', 28),
(204, 'Crystal', 12, 58, '6289662722674', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *ZULFAN WIDJI WISESA*\r\nTanggal Lahir: *14/07/2022*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281316726062', '2025-04-10 21:28:43', 27),
(205, 'Admin', 2, 58, '6289662722674', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *ZULFAN WIDJI WISESA*\r\nTanggal Lahir: *14/07/2022*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-10 22:19:48', 20),
(206, 'Admin', 2, 58, '6289662722674', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *ZULFAN WIDJI WISESA*\r\nTanggal Lahir: *14/07/2022*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-10 22:20:03', 20),
(207, 'Admin', 2, 85, '6289529374051', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *RONI BUDIYANTO*\r\nTanggal Lahir: *09/09/1979*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-10 22:20:42', 20),
(208, 'Sapphire', 3, 101, '6289664091196', '*Selamat Malam Bapak/Ibu,*\r\n\r\nNama: *TEST PASIEN*\r\nTanggal Lahir: *02/03/2001*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6282177754055', '2025-04-10 23:11:49', 1),
(209, 'Admin', 2, 53, '628128380744', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *MUHAMMAD ADZ DZAHABI AL FARIQI*\r\nTanggal Lahir: *18/07/2008*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-11 09:40:40', 4),
(210, 'Admin', 2, 48, '6287787507526', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *SHAFA ANINDYA ALMEERA*\r\nTanggal Lahir: *09/05/2022*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-11 09:44:49', 4),
(211, 'Admin', 2, 53, '628128380744', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *MUHAMMAD ADZ DZAHABI AL FARIQI*\r\nTanggal Lahir: *18/07/2008*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-11 10:08:52', 20),
(212, 'Farmasi', 4, 53, '628128380744', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *MUHAMMAD ADZ DZAHABI AL FARIQI*\r\nTanggal Lahir: *18/07/2008*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-11 10:18:23', 2),
(213, 'Admin', 2, 48, '6287787507526', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *SHAFA ANINDYA ALMEERA*\r\nTanggal Lahir: *09/05/2022*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-11 10:31:31', 20),
(214, 'Farmasi', 4, 48, '6287787507526', '*Selamat Pagi Bapak/Ibu,*\r\n\r\nNama: *SHAFA ANINDYA ALMEERA*\r\nTanggal Lahir: *09/05/2022*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-11 10:49:40', 2),
(215, 'Crystal', 12, 68, '628111176777', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *TRI WULANDARI*\r\nTanggal Lahir: *20/07/1994*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281316726062', '2025-04-11 11:50:43', 27),
(216, 'Crystal', 12, 82, '6281213616380', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *BY NY TRI WULANDARI*\r\nTanggal Lahir: *09/04/2025*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281316726062', '2025-04-11 11:51:00', 27),
(217, 'Admin', 2, 68, '628111176777', '*Selamat Siang Bapak/Ibu,*\r\n\r\n', '2025-04-11 12:17:29', 0),
(218, 'Admin', 2, 82, '6281213616380', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *BY NY TRI WULANDARI*\r\nTanggal Lahir: *09/04/2025*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-11 12:18:10', 4),
(219, 'Admin', 2, 68, '628111176777', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *TRI WULANDARI*\r\nTanggal Lahir: *20/07/1994*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-11 12:18:24', 4),
(220, 'Farmasi', 4, 68, '628111176777', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *TRI WULANDARI*\r\nTanggal Lahir: *20/07/1994*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-11 13:31:54', 2);
INSERT INTO `log_sendwhatsapp` (`id_logWA`, `username_pengirim`, `id_user`, `id_pasien`, `nomor_pasien`, `pesan_whatsapp`, `tgl_kirim`, `id_status`) VALUES
(221, 'Admin', 2, 68, '628111176777', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *TRI WULANDARI*\r\nTanggal Lahir: *20/07/1994*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap Lantai 1 untuk menyelesaikan administrasi.\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542\r\n', '2025-04-11 13:38:27', 25),
(222, 'Admin', 2, 82, '6281213616380', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *BY NY TRI WULANDARI*\r\nTanggal Lahir: *09/04/2025*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap Lantai 1 untuk menyelesaikan administrasi.\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542\r\n', '2025-04-11 13:38:43', 25),
(223, 'Sapphire', 3, 56, '6281317092030', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *CICIN YUNINGSIH*\r\nTanggal Lahir: *05/05/1976*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6282177754055', '2025-04-11 13:48:11', 1),
(224, 'Admin', 2, 56, '6281317092030', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *CICIN YUNINGSIH*\r\nTanggal Lahir: *05/05/1976*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-11 14:26:52', 4),
(225, 'Admin', 2, 70, '6285946369061', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *ROSIM MULYANA*\r\nTanggal Lahir: *05/03/1992*\r\n\r\nBerkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', '2025-04-11 14:27:06', 4),
(226, 'Sapphire', 3, 70, '6285946369061', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *ROSIM MULYANA*\r\nTanggal Lahir: *05/03/1992*\r\n\r\nSaat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6282177754055', '2025-04-11 14:27:16', 1),
(227, 'Farmasi', 4, 56, '6281317092030', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *CICIN YUNINGSIH*\r\nTanggal Lahir: *05/05/1976*\r\n\r\nTerima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', '2025-04-11 15:03:26', 2),
(228, 'Admin', 2, 56, '6281317092030', '*Selamat Siang Bapak/Ibu,*\r\n\r\nNama: *CICIN YUNINGSIH*\r\nTanggal Lahir: *05/05/1976*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-11 15:44:30', 20),
(229, 'Admin', 2, 70, '6285946369061', '*Selamat Sore Bapak/Ibu,*\r\n\r\nNama: *ROSIM MULYANA*\r\nTanggal Lahir: *05/03/1992*\r\n\r\nBerkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', '2025-04-11 16:52:38', 20);

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
  `jaminan` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_pasien`
--

INSERT INTO `m_pasien` (`id_pasien`, `nama_pasien`, `tanggal_lahir`, `no_whatsapp`, `kamar`, `jaminan`, `created_at`, `updated_at`) VALUES
(37, 'JIHAN NURSUCI', '1999-01-05', '6281311567482', NULL, 'ASURANSI', '2025-04-08 09:00:56', '0000-00-00 00:00:00'),
(38, 'VIO PAMUNGKAS', '1996-10-17', '6289893816881', NULL, 'BPJS TK', '2025-04-08 09:01:09', '0000-00-00 00:00:00'),
(39, 'JESSICA NYDIA ESTHERINA', '2000-02-03', '628129067442', NULL, 'ASURANSI', '2025-04-08 09:01:44', '0000-00-00 00:00:00'),
(40, 'NENG MIREN SURIYANI', '2000-06-10', '6285881337881', NULL, 'ASURANSI', '2025-04-08 09:02:15', '0000-00-00 00:00:00'),
(41, 'ARALINE ANANTARI FATHURRAHMAN', '2025-01-13', '6282111409585', NULL, 'ASURANSI', '2025-04-08 09:02:56', '0000-00-00 00:00:00'),
(42, 'PAMUJI RAHAYU', '2004-10-02', '6285280058585', NULL, 'BPJS TK', '2025-04-08 09:03:13', '0000-00-00 00:00:00'),
(43, 'RYANA LESTARI', '2017-05-12', '6281807376609', NULL, 'ASURANSI', '2025-04-08 09:03:15', '0000-00-00 00:00:00'),
(44, 'DENY ALAMSYAH', '1974-10-21', '628159007509', NULL, 'ASURANSI', '2025-04-08 09:03:56', '0000-00-00 00:00:00'),
(45, 'SHAUQI KHAIRI WIDARTA', '2024-02-21', '6287879004616', NULL, 'ASURANSI', '2025-04-08 09:04:13', '0000-00-00 00:00:00'),
(46, 'MUHAMMAD SANDRIA', '2000-06-15', '62895334676288', NULL, 'BPJS TK', '2025-04-08 09:04:33', '0000-00-00 00:00:00'),
(47, 'NADIA OCTAVIANA', '1999-06-22', '6289664584466', NULL, 'UMUM', '2025-04-08 09:05:07', '0000-00-00 00:00:00'),
(48, 'SHAFA ANINDYA ALMEERA', '2022-05-09', '6287787507526', NULL, 'ASURANSI', '2025-04-08 09:05:10', '0000-00-00 00:00:00'),
(49, 'DARYANTO', '1972-12-16', '6285697544621', NULL, 'BPJS TK', '2025-04-08 09:05:36', '0000-00-00 00:00:00'),
(50, 'PUTRI CORNEA PUASARI', '1993-10-27', '6285173060694', NULL, 'ASURANSI', '2025-04-08 09:06:16', '0000-00-00 00:00:00'),
(51, 'HABIBAH ADAWIYAH', '2021-09-25', '6285716719336', NULL, 'ASURANSI', '2025-04-08 09:06:40', '0000-00-00 00:00:00'),
(52, 'PANDU KRISNA MURTI', '1985-03-10', '628989906271', NULL, 'ASURANSI', '2025-04-08 09:06:40', '0000-00-00 00:00:00'),
(53, 'MUHAMMAD ADZ DZAHABI AL FARIQI', '2008-07-18', '628128380744', NULL, 'ASURANSI', '2025-04-08 09:07:02', '0000-00-00 00:00:00'),
(54, 'ARABELLA ZULAIKHA AZIZ', '2023-07-17', '6281389940793', NULL, 'ASURANSI', '2025-04-08 09:07:25', '0000-00-00 00:00:00'),
(55, 'LINA MAULINA', '1986-11-12', '6283814707325', NULL, 'ASURANSI', '2025-04-08 09:07:54', '0000-00-00 00:00:00'),
(56, 'CICIN YUNINGSIH', '1976-05-05', '6281317092030', 'SAPPHIRE', 'ASURANSI', '2025-04-08 09:08:21', '0000-00-00 00:00:00'),
(57, 'MUHAMAD REICHO ALFIAN SAPUTRA', '2003-12-09', '6281386328543', NULL, 'BPJS TK', '2025-04-08 09:08:47', '0000-00-00 00:00:00'),
(58, 'ZULFAN WIDJI WISESA', '2022-07-14', '6289662722674', NULL, 'ASURANSI', '2025-04-08 09:08:56', '0000-00-00 00:00:00'),
(59, 'MUHAMMAD NIZAR ALFATH', '2023-10-16', '6285775287752', NULL, 'ASURANSI', '2025-04-08 09:09:37', '0000-00-00 00:00:00'),
(60, 'ENCUM SUMIRAT', '1971-10-05', '628128524641', NULL, 'ASURANSI', '2025-04-08 09:09:53', '0000-00-00 00:00:00'),
(61, 'KAI EMRAN GHIFARI', '2021-01-17', '6289658565088', NULL, 'ASURANSI', '2025-04-08 09:10:43', '0000-00-00 00:00:00'),
(62, 'REZA VAHLEPI', '2004-03-18', '62881011168780', NULL, 'BPJS TK', '2025-04-08 09:10:45', '0000-00-00 00:00:00'),
(63, 'WIDATI', '1970-11-02', '6285779622683', NULL, 'ASURANSI', '2025-04-08 09:10:58', '0000-00-00 00:00:00'),
(64, 'HISYAM RADITYA PADLURROMAN', '2013-11-20', '6285693664599', NULL, 'ASURANSI', '2025-04-08 09:11:23', '0000-00-00 00:00:00'),
(65, 'SUNARNO', '1971-05-25', '6281906693232', NULL, 'ASURANSI', '2025-04-08 09:11:38', '0000-00-00 00:00:00'),
(66, 'PAWIAT NUGROHO', '1970-09-25', '6283895484872', NULL, 'BPJS TK', '2025-04-08 09:12:05', '0000-00-00 00:00:00'),
(67, 'TIAS RAHMA HIDAYAH', '2009-04-26', '6289693282888', NULL, 'ASURANSI', '2025-04-08 09:12:35', '0000-00-00 00:00:00'),
(68, 'TRI WULANDARI', '1994-07-20', '628111176777', 'CRYSTAL', 'UMUM', '2025-04-08 09:12:54', '0000-00-00 00:00:00'),
(69, 'HAURA ATHIFAH', '2023-12-27', '6285710885595', NULL, 'ASURANSI', '2025-04-08 09:22:05', '0000-00-00 00:00:00'),
(70, 'ROSIM MULYANA', '1992-03-05', '6285946369061', 'SAPPHIRE', 'ASURANSI', '2025-04-08 12:11:22', '0000-00-00 00:00:00'),
(71, 'MOHAMAD JEJEN SUPRAJA', '1993-06-20', '6282298367336', NULL, 'ASURANSI', '2025-04-08 15:36:46', '0000-00-00 00:00:00'),
(72, 'SRI ROYANI', '1977-08-30', '628111284716', NULL, 'ASURANSI', '2025-04-08 15:37:54', '0000-00-00 00:00:00'),
(73, 'MULYANI', '1960-03-16', '628111833090', NULL, 'UMUM', '2025-04-08 15:38:43', '0000-00-00 00:00:00'),
(76, 'HILWA AULIYA SYAHLATUN', '2016-09-01', '6285772025416', NULL, 'ASURANSI', '2025-04-08 21:47:48', '0000-00-00 00:00:00'),
(77, 'NURYATI', '1986-05-16', '6285781351314', NULL, 'ASURANSI', '2025-04-08 21:48:31', '0000-00-00 00:00:00'),
(78, 'AULIA ZAHRA ALLIFA', '1999-08-29', '6285641998741', NULL, 'ASURANSI', '2025-04-08 21:53:44', '0000-00-00 00:00:00'),
(79, 'DYAH ANISA', '1995-02-09', '6285272331020', NULL, 'ASURANSI', '2025-04-08 22:49:40', '0000-00-00 00:00:00'),
(80, 'FADILLAH ASSEGAFF', '1997-03-12', '6282216757548', NULL, 'ASURANSI', '2025-04-08 23:31:22', '0000-00-00 00:00:00'),
(81, 'LISTIYANA', '1986-06-14', '6285881923854', NULL, 'ASURANSI', '2025-04-08 23:42:03', '0000-00-00 00:00:00'),
(82, 'BY NY TRI WULANDARI', '2025-04-09', '6281213616380', 'CRYSTAL', 'UMUM', '2025-04-09 02:27:02', '0000-00-00 00:00:00'),
(83, 'MUHAMMAD SULTON ARIFIN', '2002-08-10', '628987270515', NULL, 'BPJS TK', '2025-04-09 09:04:55', '0000-00-00 00:00:00'),
(84, 'SYAHRUL MAWASAH', '2003-09-16', '6282211419069', NULL, 'ASURANSI', '2025-04-09 09:05:51', '0000-00-00 00:00:00'),
(85, 'RONI BUDIYANTO', '1979-09-09', '6289529374051', NULL, 'ASURANSI', '2025-04-09 09:07:01', '0000-00-00 00:00:00'),
(86, 'HERI', '1984-11-07', '6283815414353', NULL, 'BPJS TK', '2025-04-09 09:07:56', '0000-00-00 00:00:00'),
(87, 'BRILLIANIE ARSHILA VIANDRA', '2025-02-16', '628122020445', NULL, 'ASURANSI', '2025-04-09 09:08:47', '0000-00-00 00:00:00'),
(88, 'AGUS SUDIONO', '1981-05-24', '6281285980421', NULL, 'ASURANSI', '2025-04-09 10:42:26', '0000-00-00 00:00:00'),
(89, 'IBRA SEPTYA LORENZ', '2005-09-13', '62895403352629', NULL, 'BPJS TK', '2025-04-09 11:23:22', '2025-04-09 14:03:19'),
(90, 'NAURA TAZKIAH CAHYA RAMADHANI', '2011-08-28', '628998041302', NULL, 'ASURANSI', '2025-04-09 14:04:53', '0000-00-00 00:00:00'),
(91, 'SHELINA', '2000-10-23', '628128337087', NULL, 'UMUM', '2025-04-09 17:12:55', '0000-00-00 00:00:00'),
(92, 'MUHAMAD NASIR', '1992-11-16', '6289637153578', NULL, 'BPJS TK', '2025-04-09 17:13:57', '0000-00-00 00:00:00'),
(93, 'MUHAMMAD ARDAN UNAIS ALBANI', '2008-04-30', '6281310270635', NULL, 'ASURANSI', '2025-04-09 23:09:08', '0000-00-00 00:00:00'),
(94, 'UUS USNAENAH', '1991-08-22', '6289527862810', NULL, 'UMUM', '2025-04-10 00:47:36', '0000-00-00 00:00:00'),
(96, 'DEDI MULYADI', '1976-05-15', '6281218335147', NULL, 'ASURANSI', '2025-04-10 07:42:56', '0000-00-00 00:00:00'),
(97, 'FELICITA SILKADHIPA WICAKSONO', '2025-03-23', '6281280772986', NULL, 'ASURANSI', '2025-04-10 11:25:11', '2025-04-10 11:27:02'),
(98, 'MARTINUS ENNDY ANGGORO PUTRO', '1999-04-20', '6288806482773', NULL, 'ASURANSI', '2025-04-10 11:26:31', '0000-00-00 00:00:00'),
(99, 'ADELINA ESTER NAOMI GURNING', '2002-01-08', '6283199321017', NULL, 'ASURANSI', '2025-04-10 13:38:16', '0000-00-00 00:00:00'),
(100, 'JESSICA ANASTASYA', '2003-07-23', '628979218813', NULL, 'UMUM', '2025-04-10 13:38:59', '0000-00-00 00:00:00'),
(102, 'DEDEH', '1957-01-01', '6281617921417', NULL, 'UMUM', '2025-04-10 20:34:19', '0000-00-00 00:00:00'),
(103, 'NANI SUPARNI', '1973-04-24', '6281287185507', NULL, 'ASURANSI', '2025-04-10 20:35:07', '0000-00-00 00:00:00'),
(104, 'BADRUN FAELANI SAPUTRA', '1996-03-15', '6281225672557', NULL, 'ASURANSI', '2025-04-10 22:06:39', '0000-00-00 00:00:00'),
(105, 'KHRISNA TIRTA ENDIRA', '2009-01-25', '6289528047133', NULL, 'UMUM', '2025-04-10 22:07:28', '0000-00-00 00:00:00'),
(106, 'RIFKI FIRMANSYAH', '1996-08-28', '6285316641996', NULL, 'ASURANSI', '2025-04-10 22:07:44', '0000-00-00 00:00:00'),
(107, 'YUINGGA AGTA TRIANGKA', '1989-08-11', '6281381671238', NULL, 'UMUM', '2025-04-10 22:08:38', '0000-00-00 00:00:00'),
(108, 'DEDI NUR ROHIM', '1994-07-05', '6281119999954', NULL, 'ASURANSI', '2025-04-10 22:09:22', '0000-00-00 00:00:00'),
(109, 'INDAH WILDAN YATI', '1998-08-01', '6289664096117', NULL, 'BPJS TK', '2025-04-11 05:00:57', '0000-00-00 00:00:00'),
(110, 'ARIA WINATA', '2001-05-18', '6287741635265', NULL, 'ASURANSI', '2025-04-11 06:58:29', '0000-00-00 00:00:00'),
(111, 'ARKAN SOPANDI', '1967-10-09', '6285777525552', NULL, 'UMUM', '2025-04-11 06:59:16', '0000-00-00 00:00:00'),
(112, 'FAZA RAFARDHAN', '2019-04-08', '6282111444181', NULL, 'ASURANSI', '2025-04-11 07:01:12', '0000-00-00 00:00:00'),
(113, 'KEZIA VALERINA YANAFI', '2008-12-03', '6289510153055', NULL, 'ASURANSI', '2025-04-11 07:02:16', '0000-00-00 00:00:00'),
(114, 'VALERIAN ADNAN ANGGARA', '2009-02-10', '6282311817568', NULL, 'ASURANSI', '2025-04-11 11:03:45', '0000-00-00 00:00:00'),
(115, 'GATHAN ALGIO DHARMAWAN', '2018-11-03', '6282111406262', NULL, 'ASURANSI', '2025-04-11 14:42:57', '0000-00-00 00:00:00'),
(116, 'DENI SYAFRI', '1980-01-06', '6281310734281', NULL, 'ASURANSI', '2025-04-11 14:43:38', '0000-00-00 00:00:00'),
(117, 'elyzabeth crystal', '2025-04-04', '6281281010869', NULL, 'BPJS TK', '2025-04-15 13:54:19', '0000-00-00 00:00:00'),
(118, 'PRAMUDYA ANDIKA PRATAMA', '2002-07-06', '6282118518633', NULL, 'BPJS TK', '2025-04-15 14:46:06', '0000-00-00 00:00:00'),
(119, 'ALMAIRA ASMATAQIYYA', '2013-01-31', '6281382555479', NULL, 'ASURANSI', '2025-04-15 14:47:21', '0000-00-00 00:00:00'),
(120, 'ALZAM GD', '2009-12-22', '6281314400424', NULL, 'ASURANSI', '2025-04-15 14:48:31', '0000-00-00 00:00:00'),
(121, 'FAUZAN RAMADHAN', '2012-07-20', '628129706080', NULL, 'ASURANSI', '2025-04-15 20:40:31', '0000-00-00 00:00:00'),
(122, 'RATMI HANA S', '1981-03-01', '6281286522228', NULL, 'ASURANSI', '2025-04-15 21:21:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_status`
--

CREATE TABLE `m_status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(150) NOT NULL,
  `pesan_status` varchar(5000) NOT NULL,
  `jaminan` varchar(50) DEFAULT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_status`
--

INSERT INTO `m_status` (`id_status`, `nama_status`, `pesan_status`, `jaminan`, `created_at`, `updated_at`) VALUES
(1, '1. Menyiapkan Berkas Pulang', 'Saat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6282177754055', NULL, '2025-03-09 00:39:22', ''),
(2, '4. Mengantar Obat Pasien Pulang', 'Terima kasih telah bersedia menunggu. \r\n\r\nPetugas Farmasi akan segera mengantarkan obat ke ruang perawatan\r\n\r\n-------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n', NULL, '2025-03-09 01:44:59', ''),
(3, '3. Penyelesaian Administrasi', 'Berkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542\r\n', 'BPJS TK', '2025-03-09 01:59:03', ''),
(4, '2. Sedang Dalam Proses', 'Berkas kepulangan Anda saat ini sedang diproses oleh Petugas Kasir Rawat Inap. \r\n\r\nEstimasi waktu penyelesaian adalah 60 menit. Terima kasih atas pengertiannya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, Silahkan menghubungi Nomor berikut: https://wa.me/6281316192542', NULL, '2025-03-09 01:59:43', ''),
(20, '3. Penyelesaian Administrasi', 'Berkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap untuk menyelesaikan administrasi. \r\n\r\nNote :\r\n- Hari Senin-Sabtu silahkan ke kasir rawat Inap Lantai 5 (Jam 07.00-21.00)\r\n- Di luar jam operasional, hari Minggu dan Tanggal Merah silahkan ke kasir rawat inap Lantai 1 (24 Jam)\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542', 'ASURANSI', '2025-03-19 12:14:52', ''),
(25, '3. Penyelesaian Administrasi', 'Berkas kepulangan Anda saat ini sudah selesai, silahkan ke Kasir Rawat Inap Lantai 1 untuk menyelesaikan administrasi.\r\n\r\nTerima kasih telah bersedia menunggu.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan, silahkan menghubungi petugas Administrasi dengan nomor berikut: \r\nhttps://wa.me/6281316192542\r\n', 'UMUM', '2025-03-27 10:09:13', ''),
(26, '1. Menyiapkan Berkas Pulang', 'Saat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281318770019', NULL, '2025-03-27 10:11:33', ''),
(27, '1. Menyiapkan Berkas Pulang', 'Saat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281316726062', NULL, '2025-03-27 10:52:09', ''),
(28, '1. Menyiapkan Berkas Pulang', 'Saat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6282177754355', NULL, '2025-03-27 10:56:44', ''),
(29, '1. Menyiapkan Berkas Pulang', 'Saat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6282177754655', NULL, '2025-03-27 10:58:11', ''),
(30, '1. Menyiapkan Berkas Pulang', 'Saat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281299284099', NULL, '2025-03-27 10:59:24', ''),
(31, '1. Menyiapkan Berkas Pulang', 'Saat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281299730630', NULL, '2025-03-27 11:00:24', ''),
(33, '1. Menyiapkan Berkas Pulang', 'Saat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat dengan nomor berikut:\r\nhttps://wa.me/6281299284099', NULL, '2025-04-08 09:36:57', ''),
(34, '1. Menyiapkan Berkas Pulang', 'Saat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat kamar bedah', NULL, '2025-04-08 09:50:17', ''),
(35, '1. Menyiapkan Berkas Pulang', 'Saat ini perawat sedang menyiapkan berkas kepulangan Anda.\r\nMohon menunggu, kami akan segera menginformasikan proses selanjutnya.\r\n\r\n-----------\r\n_Ini adalah pesan otomatis mohon untuk tidak membalas pesan_\r\n\r\nJika ada yang ingin ditanyakan silahkan menghubungi perawat ruangan endoscopy', NULL, '2025-04-08 10:03:01', '');

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
(210, 1, 1),
(211, 1, 3),
(212, 26, 1),
(213, 26, 7),
(214, 27, 1),
(215, 27, 12),
(216, 28, 1),
(217, 28, 13),
(218, 29, 1),
(219, 29, 15),
(220, 30, 1),
(221, 30, 16),
(222, 31, 1),
(223, 31, 17),
(224, 4, 1),
(225, 4, 2),
(226, 3, 1),
(227, 3, 2),
(228, 20, 1),
(229, 20, 2),
(230, 25, 1),
(231, 25, 2),
(232, 33, 1),
(233, 33, 19),
(234, 34, 1),
(235, 34, 14),
(236, 35, 1),
(237, 35, 18),
(238, 2, 1),
(239, 2, 4);

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
(1, 'Superadmin', '$2y$10$UphUusGOux7Dmj1AwtqzWOrJH8ykkSblfb17hwsxatECNcC6I8IaO', 1, 1, '2025-03-07 21:59:22', '2025-03-27 10:39:49'),
(2, 'Admin', '$2y$10$R325JVmEADszEYGUysKs5ux/dLt8jLaqzW0CZzOjnso7q9.9dU9aW', 1, 2, '2025-03-08 23:47:03', '2025-03-27 10:39:20'),
(3, 'Sapphire', '$2y$10$qOnhe6pmrs60YMdfHJCYh.kxRTL.EGJh05sPWHLkvHGavKI8Bbagi', 1, 3, '2025-03-08 23:47:37', '2025-04-04 08:47:30'),
(4, 'Farmasi', '$2y$10$We2NvUM0cmCOW4j/WyQS4uLxu.QXfamtIg/xkWbxmvFwFsXKwPyvm', 1, 4, '2025-03-08 23:48:07', '2025-03-27 10:39:13'),
(7, 'Topaz', '$2y$10$KzQDTS0IkZF6i0z97yJqV.TGPr5143nFsPoLlsq6AHG.gIFJ4BH9i', 1, 3, '2025-03-09 23:45:10', '2025-04-04 08:47:50'),
(9, 'dr.Ratnah', '$2y$10$XxQOWf7ba11e8R8kxO5F8u8MwSFhRFrZc8hThapBuX4Gr1V4Z6sNO', 1, 1, '2025-03-10 11:25:58', '2025-03-27 10:38:46'),
(12, 'Crystal', '$2y$10$EHMidHg/m4VfKtDy/SPS2epU8ie.aZjvlCFZ0gXwk9aX6wYhXqyaO', 1, 3, '2025-03-26 08:11:52', '2025-04-04 08:46:01'),
(13, 'Diamond', '$2y$10$rZ4s/tny/.n58wTQsaHgk.KKhN7/V5eEaWiesFz3INnhpX0IRTS8q', 1, 3, '2025-03-26 08:23:46', '2025-04-04 08:46:12'),
(14, 'UKB', '$2y$10$FBVXcUZmiGV9lYsQNZEnjuBUxAudG1KX/qWjzdtEANR2D8Ucth8HW', 1, 3, '2025-03-26 08:26:51', '2025-04-04 08:48:16'),
(15, 'ICU/HCU', '$2y$10$wPuTZi0Twqmzqc6dkWd8JOd8otlnEGsdY23U6U350HV9kOjISKlrG', 1, 3, '2025-03-26 08:27:36', '2025-04-04 08:46:45'),
(16, 'NICU', '$2y$10$gzgsuTjkZPK0Q.tdYZqSr.1LQBjYSiNyL33FIf44.M1AY9uKrVNbu', 1, 3, '2025-03-26 08:27:55', '2025-04-04 08:46:59'),
(17, 'VK', '$2y$10$sI.2bcBFIztVyWbL2.uzTuSN4d.2NwQ5yn8hnRPdlPl7xMEDTXbIu', 1, 3, '2025-03-26 08:29:40', '2025-04-04 08:46:23'),
(18, 'Endoscopy', '$2y$10$vggpeCzJrPy1MXEapjgqXubi8fGsw9bL/VaWmFlIgrXQm4SUYPZsW', 1, 3, '2025-03-26 10:43:30', '2025-04-04 08:46:31'),
(19, 'PICU', '$2y$10$HUF5Lp80br/wisI/uUexmeALG.hMpqV7YlPIkaCGgxg/CBTZU7nna', 1, 3, '2025-04-04 08:47:16', ''),
(21, 'dr.Viba', '$2y$10$oYwC1b2RKaGAN9fnrJkvOeNIjlD0iKhVYSNtAly2vlUgt/Yg.nKC.', 1, 5, '2025-04-09 10:36:36', '2025-04-09 10:51:11'),
(22, 'dr.Alienda', '$2y$10$vW8D1KZnP6cyLLsCb/5CluJU5p.QyYrR2rX88eNxjdomT7m/PrZQS', 1, 5, '2025-04-09 10:37:11', '2025-04-09 10:50:46'),
(23, 'dr.Meyliska', '$2y$10$sYIkhItyuXF8U7N5WN1dieB9mHVqc.xVQI/9zLC/g5f.LUG7izIvy', 1, 5, '2025-04-09 10:37:25', '2025-04-09 10:50:54'),
(24, 'Ida', '$2y$10$yY3NTg5wjarXt783FvrMueXdfRH3/JuOU.MIIzExbyg00UDqPWAv.', 1, 5, '2025-04-09 10:37:37', '2025-04-09 10:51:28'),
(25, 'Mayang', '$2y$10$QsUxFYNK4AubaIq73ndvAeB.lcxdtOnnd.yAWvCqkpEBzZXvYHCsO', 1, 5, '2025-04-09 10:38:37', '2025-04-09 10:54:12'),
(26, 'dr.Khoi', '$2y$10$KRxFxjQLxZOb35hP92SK.uwwNWUxLYvekOL.ySQ4w4YelbQ9trgdO', 1, 5, '2025-04-09 10:40:35', '2025-04-09 10:51:01'),
(27, 'Riki', '$2y$10$4G8c1L/7V2116HiLxJKLZOB6dnA3Ms8G8Vp85Dr1tsz1RJv/cZh2a', 1, 5, '2025-04-09 10:41:58', '2025-04-09 10:54:22'),
(28, 'Shinta', '$2y$10$F1bWGIiQTJ6pVq.od1EXRuo24tcgnfZj4ynm0dlY.79ZqSE/YyHeO', 1, 5, '2025-04-09 10:46:31', '2025-04-09 10:54:31'),
(29, 'dr.Winardi', '$2y$10$hatx4wQ1cBwqDmodpDjDB.BhUURmvSPYHQ0WTuCsSz3oOI0L0ggGq', 1, 5, '2025-04-09 11:20:46', '2025-04-09 11:20:56');

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
  MODIFY `id_logWA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT untuk tabel `m_pasien`
--
ALTER TABLE `m_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT untuk tabel `m_status`
--
ALTER TABLE `m_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `status_user`
--
ALTER TABLE `status_user`
  MODIFY `id_status_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
