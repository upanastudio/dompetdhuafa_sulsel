-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 08 Sep 2020 pada 07.30
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects_dompet_dhuafa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'akhmad', 1, '2020-04-24 02:36:31', 0),
(2, '::1', 'ahmad7irfandi@gmail.com', 1, '2020-04-24 02:37:17', 1),
(3, '::1', 'dd-admin', 2, '2020-04-24 04:12:03', 0),
(4, '::1', 'ahmad7irfandi@gmail.com', 1, '2020-04-24 04:16:08', 1),
(5, '::1', 'akhmad', NULL, '2020-04-26 04:37:21', 0),
(6, '::1', 'akhmad', NULL, '2020-04-26 04:37:31', 0),
(7, '::1', 'admindd', NULL, '2020-04-26 04:50:18', 0),
(8, '::1', 'admin@dompetdhuafa.com', 2, '2020-04-26 04:50:25', 1),
(9, '::1', 'admin@dompetdhuafa.com', 2, '2020-04-27 03:58:49', 1),
(10, '::1', 'admin@dompetdhuafa.com', 2, '2020-04-27 07:11:41', 1),
(11, '::1', 'admin@dompetdhuafa.com', 2, '2020-04-27 09:51:50', 1),
(12, '0.0.0.0', 'admindd', NULL, '2020-08-26 01:52:58', 0),
(13, '0.0.0.0', 'admin@dompetdhuafa.com', 2, '2020-08-26 01:53:10', 1),
(14, '0.0.0.0', 'admin@dompetdhuafa.com', 2, '2020-08-26 02:00:56', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_donasi`
--

CREATE TABLE `data_donasi` (
  `id_data_donasi` int(11) NOT NULL,
  `midtrans_order_id` int(11) DEFAULT NULL,
  `id_donasi` varchar(16) DEFAULT NULL COMMENT 'nomor referensi/kode konfirmasi',
  `id_donatur` int(11) DEFAULT NULL,
  `id_jenis_donasi` int(11) DEFAULT NULL,
  `id_subjenis_donasi` int(11) DEFAULT NULL,
  `id_target_donasi` int(11) DEFAULT NULL,
  `id_metode_pembayaran` int(11) DEFAULT NULL,
  `nominal` int(50) DEFAULT NULL,
  `kode_unik` int(10) DEFAULT NULL,
  `total_pembayaran` int(50) DEFAULT NULL COMMENT 'nominal+kode_unik',
  `status` enum('0','1','2') DEFAULT '0' COMMENT '0=menunggu_pembayaran; 1=lunas; 2=expired',
  `iat` datetime DEFAULT NULL,
  `uat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `data_donasi`
--

INSERT INTO `data_donasi` (`id_data_donasi`, `midtrans_order_id`, `id_donasi`, `id_donatur`, `id_jenis_donasi`, `id_subjenis_donasi`, `id_target_donasi`, `id_metode_pembayaran`, `nominal`, `kode_unik`, `total_pembayaran`, `status`, `iat`, `uat`) VALUES
(1, NULL, '1522374186754018', 85417083, 49014882, 27819039, NULL, 77823354, 200000, 174, 200174, '0', '2020-08-25 03:41:15', '2020-08-30 17:31:56'),
(2, NULL, '6907461514827358', 91729483, 91077432, 56880199, NULL, 77823355, 100000, 346, 100346, '0', '2020-08-26 07:39:04', '2020-08-30 17:31:56'),
(3, NULL, '8859336012958702', 61649750, 91077432, 56880199, NULL, 77823355, 100000, 203, 100203, '0', '2020-08-26 20:44:08', '2020-08-30 17:31:56'),
(4, NULL, '9542169078834621', 27910348, 91077432, 56880199, NULL, 76957036, 100000, 209, 100209, '0', '2020-08-26 22:58:32', '2020-08-30 17:31:56'),
(5, NULL, '5822551738074961', 27910348, 91077432, 56880199, NULL, 76957036, 100000, 902, 100902, '0', '2020-08-26 23:02:30', '2020-08-30 17:31:56'),
(6, NULL, '2545381741926089', 27910348, 91077432, NULL, NULL, 77823355, 100000, 425, 100425, '0', '2020-08-26 23:02:41', '2020-08-30 17:31:56'),
(7, NULL, '4985941327560638', 27910348, 91077432, NULL, NULL, 76957036, 100000, 826, 100826, '0', '2020-08-26 23:43:49', '2020-08-30 17:31:56'),
(8, NULL, '8619286410253870', 84187039, 91077432, 16858220, 53330514, 77823355, 120000, 530, 120530, '0', '2020-08-26 23:45:43', '2020-08-30 17:31:56'),
(9, NULL, '3398205036574214', 83841096, 91077432, 40650232, NULL, 45259423, 200000, 908, 200908, '0', '2020-08-27 01:41:14', '2020-08-30 17:31:56'),
(10, NULL, '4521932357470864', 93985402, 91077432, 56880199, NULL, 77823355, 200000, 939, 200939, '0', '2020-08-27 01:55:05', '2020-08-30 17:31:56'),
(11, NULL, '8685200398125793', 98964217, 72584460, 78760362, 42122642, 7782356, 200000, 996, 200996, '0', '2020-08-27 01:59:27', '2020-08-30 17:31:56'),
(12, NULL, '2215150687269038', 46910237, 91077432, 56880199, NULL, 77823355, 200000, 445, 200445, '0', '2020-08-27 06:02:58', '2020-08-30 17:31:56'),
(13, NULL, '7871005684373941', 21802495, 91077432, 56880199, NULL, 77823355, 200000, 217, 200217, '0', '2020-08-27 06:35:47', '2020-08-30 17:31:56'),
(14, NULL, '8441586925103267', 80824759, 91077432, 56880199, NULL, 77823355, 199999, 289, 200288, '0', '2020-08-27 14:07:11', '2020-08-30 17:31:56'),
(15, NULL, '9013749672055684', 69827146, 91077432, 56880199, NULL, 77823355, 120000, 315, 120315, '0', '2020-08-30 21:14:43', '2020-08-30 17:31:56'),
(16, NULL, '4074556370161224', 35613842, 91077432, 56880199, NULL, 77823355, 123000, 737, 123737, '0', '2020-08-30 21:24:34', '2020-08-30 17:31:56'),
(17, NULL, '8511647059323624', 89045862, 91077432, 56880199, NULL, 77823355, 100000, 980, 100980, '0', '2020-08-30 21:47:10', '2020-08-30 17:31:56'),
(57, 1413828160, '1219754267148560', 70243719, 91077432, 56880199, NULL, 77823355, 120000, 771, 120771, '0', '2020-09-06 20:35:49', '2020-09-06 12:35:57'),
(58, 1685320726, '1908103776425698', 99204367, 91077432, 56880199, NULL, 77823355, 120000, 996, 120996, '0', '2020-09-06 20:38:41', '2020-09-06 12:39:11'),
(59, 1826094957, '5233565841946702', 81594670, 91077432, 56880199, NULL, 77823355, 150000, 330, 150330, '0', '2020-09-06 20:44:32', '2020-09-06 12:44:45'),
(60, 1164217369, '1880927907641354', 38913205, 91077432, 56880199, NULL, 77823355, 120000, 141, 120141, '0', '2020-09-06 20:46:41', '2020-09-06 12:50:27'),
(61, 1059635690, '3955670734814819', 16451703, 91077432, 56880199, NULL, 77823355, 150000, 824, 150824, '0', '2020-09-06 20:51:22', '2020-09-06 12:52:03'),
(62, 405478967, '1027439502893867', 45329870, 91077432, 56880199, NULL, 77823355, 150000, 835, 150835, '0', '2020-09-06 20:55:31', '2020-09-06 12:55:59'),
(63, 1274851610, '6750942408926113', 42413765, 91077432, 56880199, NULL, 77823355, 120000, 970, 120970, '0', '2020-09-06 20:59:30', '2020-09-06 13:00:07'),
(64, NULL, '7745027303186498', 33108249, 91077432, 56880199, NULL, 76957036, 120000, 635, 120635, '0', '2020-09-06 21:09:38', '2020-09-06 13:09:38'),
(65, 1156639510, '8630717853492896', 24036257, 91077432, 56880199, NULL, 77823355, 150000, 547, 150547, '0', '2020-09-06 21:17:13', '2020-09-06 13:18:19'),
(66, 534280978, '8622113807906955', 75720196, 91077432, 56880199, NULL, 77823355, 140000, 476, 140476, '0', '2020-09-06 21:20:02', '2020-09-06 13:20:13'),
(67, NULL, '3256370879632954', 53846250, 91077432, 56880199, NULL, 77823355, 120000, 741, 120741, '0', '2020-09-06 21:23:12', '2020-09-06 13:23:12'),
(68, 1054146055, '8652619045789271', 97514863, 91077432, NULL, NULL, 77823355, 120000, 563, 120563, '0', '2020-09-07 00:46:14', '2020-09-06 16:47:51'),
(69, 447924291, '1158830266990745', 30375691, 91077432, 56880199, NULL, 77823355, 90000, 893, 90893, '0', '2020-09-07 00:49:06', '2020-09-06 16:50:09'),
(70, 421838209, '6652139714082037', 44265378, 91077432, 56880199, NULL, 77823355, 15000, 181, 15181, '0', '2020-09-07 00:52:01', '2020-09-06 16:59:34'),
(71, 1819142629, '4315275031468029', 47126480, 91077432, 56880199, NULL, 77823355, 90000, 261, 90261, '0', '2020-09-07 01:23:58', '2020-09-06 17:42:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_donatur`
--

CREATE TABLE `data_donatur` (
  `id_data_donatur` int(11) NOT NULL,
  `id_donatur` int(11) DEFAULT NULL,
  `nama_donatur` varchar(255) DEFAULT NULL,
  `sapaan` enum('Bapak','Ibu','Saudara','Saudari') DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(16) DEFAULT NULL,
  `alamat` text,
  `tipe_donatur` enum('personal','institusi') DEFAULT NULL,
  `institusi` varchar(255) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `negara` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `kodepos` varchar(16) DEFAULT NULL,
  `iat` datetime DEFAULT NULL,
  `uat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `data_donatur`
--

INSERT INTO `data_donatur` (`id_data_donatur`, `id_donatur`, `nama_donatur`, `sapaan`, `email`, `telepon`, `alamat`, `tipe_donatur`, `institusi`, `npwp`, `negara`, `provinsi`, `kota`, `kodepos`, `iat`, `uat`) VALUES
(1, 85417083, 'aysa', 'Ibu', 'aysaa@mail.com', '0856232812', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-25 03:41:15', '2020-08-24 19:41:15'),
(2, 91729483, 'eki', 'Ibu', 'aidwajid@gmail.com', '291391293129', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-26 07:39:04', '2020-08-25 23:39:04'),
(3, 61649750, 'ekio', 'Ibu', 'dmwkdamk@gmail.com', '29391102930921', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-26 20:44:08', '2020-08-26 12:44:08'),
(4, 27910348, 'ekac', 'Bapak', 'aekdkawdk@gmail.com', '291390129310', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-26 22:58:32', '2020-08-26 14:58:32'),
(5, 84187039, 'Joko', 'Bapak', 'joko@mail.com', '08098999999', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-26 23:45:43', '2020-08-26 15:45:43'),
(6, 83841096, 'amad', 'Bapak', 'amad@mail.com', '081245678999', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-27 01:41:14', '2020-08-26 17:41:14'),
(7, 93985402, 'sefseffe', 'Bapak', 'adawdaw@mail.com', '12312452453', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-27 01:55:05', '2020-08-26 17:55:05'),
(8, 98964217, 'adadawd', 'Ibu', 'email@email.com', '1231241234124', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-27 01:59:27', '2020-08-26 17:59:27'),
(9, 46910237, 'awdaw', 'Bapak', 'dawaw@gmail.com', '293912391293', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-27 06:02:58', '2020-08-26 22:02:58'),
(10, 21802495, 'eko', 'Bapak', 'adwkk@gmail.com', '293192391239', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-27 06:35:47', '2020-08-26 22:35:47'),
(11, 80824759, 'dawdaw', 'Bapak', 'aejawdjjad@mail.com', '28982831823', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-27 14:07:11', '2020-08-27 06:07:11'),
(12, 69827146, 'eki', 'Bapak', 'kdakwdakw@gmail.com', '29392391239', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-30 21:14:43', '2020-08-30 13:14:43'),
(13, 35613842, 'dhdrgs', 'Bapak', 'sdawrfaw@mail.com', '9149123912391239', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-30 21:24:34', '2020-08-30 13:24:34'),
(14, 89045862, 'axsadda', 'Bapak', 'adkawk@mail.com', '123992392', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-30 21:47:10', '2020-08-30 13:47:10'),
(15, 21530427, 'awkdadwk', 'Bapak', 'kadmkawkd@mail.com', '2913912391293', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-31 01:02:05', '2020-08-30 17:02:05'),
(16, 81345907, 'AHMD', 'Bapak', 'ahnd@mail.com', '09876543244', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-31 01:52:34', '2020-08-30 17:52:34'),
(17, 57501349, 'idiadakdw', 'Bapak', 'dkakwdkaw@mail.com', '9394394293', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-08-31 02:06:40', '2020-08-30 18:06:40'),
(18, 56134790, 'diwiadiad', 'Bapak', 'ajdwajdjw@gmail.com', '9213912931293', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-01 21:02:47', '2020-09-01 13:02:47'),
(19, 13657941, 'adjawjdajwd', 'Bapak', 'ajdjawdj@mail.com', '293923923', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-01 22:06:53', '2020-09-01 14:06:53'),
(20, 57598026, 'hjjijiijjk', 'Bapak', 'jd0awdaw@mail.com', '32382832832', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-01 22:44:11', '2020-09-01 14:44:11'),
(21, 24823709, 'adkawdkadk', 'Bapak', 'dwkdwkowdko@mail.com', '2913912391239', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-01 23:58:21', '2020-09-01 15:58:21'),
(22, 62158734, 'adkkdkwkaka', 'Bapak', 'dkkdwkw@mail.com', '12i312i3i12', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-02 00:37:12', '2020-09-01 16:37:12'),
(23, 11468029, 'dkwkdwkwdkw', 'Bapak', 'kdkwkwdk@mail.com', '1239123912931923', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-02 00:43:02', '2020-09-01 16:43:02'),
(24, 45048173, 'kdakdakwd', 'Bapak', 'kadkawkkda@mail.com', '12319239123912', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-02 01:31:06', '2020-09-01 17:31:06'),
(25, 35963847, 'dawkdakw', 'Bapak', 'kdkwdkwk@mail.com', '304903492349239', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-02 03:49:27', '2020-09-01 19:49:27'),
(26, 16875143, 'dakdakdakw', 'Bapak', 'kdkdk2ddk@mail.com', '2931923912392', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-02 20:55:24', '2020-09-02 12:55:24'),
(27, 58059264, 'akwdkadkawk', 'Bapak', 'dkakwd@mail.com', '123912391293', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-02 21:11:22', '2020-09-02 13:11:22'),
(28, 11735829, 'djdjwkjkwdkj@mail.com', 'Bapak', 'dkawkdakw@mail.com', '2319239129319', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-02 21:49:31', '2020-09-02 13:49:31'),
(29, 11065827, 'dkwdkdwk@mail.com', 'Bapak', 'amdwmdma@mail.com', '2939293219', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-02 22:11:37', '2020-09-02 14:11:37'),
(30, 70925641, 'dkdkwdkw', 'Bapak', 'dmdwmdwm@mail.com', '2939123919', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-02 22:58:57', '2020-09-02 14:58:57'),
(39, 75367924, 'jdamdawd', 'Bapak', 'amdamd@mail.com', '2939123912', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-02 23:22:37', '2020-09-02 15:22:37'),
(40, 93196780, 'kdkadkwdk', 'Bapak', 'dmkwdkmwdmk@mail.com', '921391293192', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-02 23:58:44', '2020-09-02 15:58:44'),
(41, 86817295, 'dkkdkdawkda', 'Bapak', 'kcdmm@mail.com', '923912931239', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-02 23:59:27', '2020-09-02 15:59:27'),
(42, 98965103, 'dkkdakdk', 'Bapak', 'kdkwdkwd@mail.com', '923912931293', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-02 23:59:53', '2020-09-02 15:59:53'),
(43, 29541723, 'dmadadmdkdwk', 'Bapak', 'dmdmdm@Mail.com', '2192391239192', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-03 00:00:23', '2020-09-02 16:00:23'),
(44, 81763504, 'dkadkakdak', 'Bapak', 'mdmadkdkw@mail.com', '2929239', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-03 00:35:59', '2020-09-02 16:35:59'),
(45, 76529843, 'dmkadkmawd', 'Bapak', 'ddmdmmwd@mail.com', '2939239239', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-03 00:38:32', '2020-09-02 16:38:32'),
(46, 97210948, 'putu', 'Bapak', 'putubregezz@gmail.com', '293912939123', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-03 11:21:23', '2020-09-03 03:21:23'),
(47, 95987461, 'dakakwdakwd', 'Bapak', 'dkamwadmd@mail.com', '219312391239', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-06 20:12:32', '2020-09-06 12:12:32'),
(48, 70851364, 'dmamdmawd', 'Bapak', 'damdamw@mail.com', '19391239123', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-06 20:23:21', '2020-09-06 12:23:21'),
(49, 17219083, 'dmadwamd', 'Bapak', 'dmamdaw@mail.com', '29391239123', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-06 20:25:39', '2020-09-06 12:25:39'),
(50, 70243719, 'damdwamwd', 'Bapak', 'damdmwadma@mail.com', '21931923192', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-06 20:35:49', '2020-09-06 12:35:49'),
(51, 99204367, 'dadmawdm', 'Bapak', 'damdamwdma@mail.com', '29319231923', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-06 20:38:41', '2020-09-06 12:38:41'),
(52, 81594670, 'damawdmawd', 'Bapak', 'dadkawdk@mail.com', '123912391239', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-06 20:44:32', '2020-09-06 12:44:32'),
(53, 38913205, 'admadwmawd', 'Bapak', 'admawdmawd@mail.com', '12939123912', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-06 20:46:41', '2020-09-06 12:46:41'),
(54, 16451703, 'acadmwd', 'Bapak', 'camcamcm@mail.com', '2193192319', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-06 20:51:22', '2020-09-06 12:51:22'),
(55, 45329870, 'djamdammd', 'Bapak', 'dmawdmawdm@mail.com', '219912391239', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-06 20:55:31', '2020-09-06 12:55:31'),
(56, 42413765, 'dadmawmdawdm', 'Bapak', 'dmadmwadw@Mail.com', '21931923912', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-06 20:59:30', '2020-09-06 12:59:30'),
(57, 33108249, 'damdawmd', 'Bapak', 'damdmawd@mail.com', '29319239123', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-06 21:09:38', '2020-09-06 13:09:38'),
(58, 24036257, 'dawdmaddamd', 'Bapak', 'dawddamwd@mail.com', '12391231239', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-06 21:17:13', '2020-09-06 13:17:13'),
(59, 75720196, 'admamdawmd', 'Bapak', 'dmwdamwd@mail.com', '912391239', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-06 21:20:02', '2020-09-06 13:20:02'),
(60, 53846250, 'dadmawdm', 'Bapak', 'damdamdw@mail.com', '28318238123', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-06 21:23:12', '2020-09-06 13:23:12'),
(61, 97514863, 'swmsnwsjxkwxkw', 'Bapak', 'waxmkawmk@mail.com', '12881238', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-07 00:46:14', '2020-09-06 16:46:14'),
(62, 30375691, 'dmamawmd', 'Bapak', 'amxamwx@mail.com', '129319239123', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-07 00:49:06', '2020-09-06 16:49:06'),
(63, 44265378, 'ddwmwdmkmk', 'Bapak', 'kadmdkmad@mail.com', '1231239921', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-07 00:52:01', '2020-09-06 16:52:01'),
(64, 47126480, 'zqjqwjqzjqwi', 'Bapak', 'sqjwqjwqjw@mail.com', '1218238123', '', 'personal', '', '', 'Indonesia', '', NULL, '', '2020-09-07 01:23:58', '2020-09-06 17:23:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_konfirmasi_donasi`
--

CREATE TABLE `data_konfirmasi_donasi` (
  `id_data_konfirmasi_donasi` int(11) NOT NULL,
  `id_konfirmasi_donasi` int(11) DEFAULT NULL,
  `id_donasi` varchar(16) DEFAULT NULL,
  `bank_nama` varchar(100) DEFAULT NULL,
  `bank_cabang` varchar(255) DEFAULT NULL,
  `bank_norek` varchar(255) DEFAULT NULL,
  `bank_atas_nama` varchar(100) DEFAULT NULL,
  `tanggal_bayar` datetime DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `catatan` text,
  `iat` datetime DEFAULT NULL,
  `uat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_midtrans_detail`
--

CREATE TABLE `data_midtrans_detail` (
  `id_data_midtrans_detail` int(11) NOT NULL,
  `midtrans_order_id` int(11) NOT NULL,
  `waktu_transaksi` datetime DEFAULT NULL,
  `kode_pembayaran` varchar(20) DEFAULT NULL,
  `bill_key` varchar(20) DEFAULT NULL,
  `bill_code` varchar(20) DEFAULT NULL,
  `bank` varchar(20) DEFAULT NULL,
  `nomor_va` varchar(20) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `permata_va` varchar(20) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_midtrans_detail`
--

INSERT INTO `data_midtrans_detail` (`id_data_midtrans_detail`, `midtrans_order_id`, `waktu_transaksi`, `kode_pembayaran`, `bill_key`, `bill_code`, `bank`, `nomor_va`, `status`, `permata_va`, `create_at`, `update_at`) VALUES
(80, 1413828160, '2020-09-07 08:38:35', '2147483647', NULL, NULL, NULL, NULL, 'pending', NULL, '2020-09-06 20:35:57', '2020-09-06 20:35:57'),
(81, 1685320726, '2020-09-07 08:41:27', '2147483647', NULL, NULL, NULL, NULL, 'pending', NULL, '2020-09-06 20:39:11', '2020-09-06 20:39:11'),
(82, 1826094957, '2020-09-07 08:47:23', '2147483647', NULL, NULL, NULL, NULL, 'pending', NULL, '2020-09-06 20:44:45', '2020-09-06 20:44:45'),
(83, 1164217369, '2020-09-07 08:49:30', NULL, NULL, NULL, NULL, NULL, 'pending', NULL, '2020-09-06 20:50:27', '2020-09-06 20:50:27'),
(84, 1059635690, '2020-09-07 08:54:10', NULL, NULL, NULL, 'bca', '2147483647', 'pending', NULL, '2020-09-06 20:52:03', '2020-09-06 20:52:03'),
(85, 405478967, '2020-09-07 08:58:21', NULL, NULL, NULL, 'bca', '31034428893', 'pending', NULL, '2020-09-06 20:55:59', '2020-09-06 20:55:59'),
(86, 1274851610, '2020-09-07 09:02:23', NULL, NULL, NULL, 'bni', '9883103479609802', 'pending', NULL, '2020-09-06 21:00:07', '2020-09-06 21:00:07'),
(87, 1156639510, '2020-09-07 09:20:52', NULL, '2147483647', '70012', NULL, NULL, 'pending', NULL, '2020-09-06 21:18:19', '2020-09-06 21:18:19'),
(88, 534280978, '2020-09-07 09:22:52', NULL, '865760932482', '70012', NULL, NULL, 'pending', NULL, '2020-09-06 21:20:13', '2020-09-06 21:20:13'),
(89, 1054146055, '2020-09-07 12:50:10', NULL, NULL, NULL, NULL, NULL, 'capture', NULL, '2020-09-07 00:47:51', '2020-09-07 00:47:51'),
(90, 447924291, '2020-09-07 12:52:39', NULL, NULL, NULL, NULL, NULL, 'capture', NULL, '2020-09-07 00:50:09', '2020-09-07 00:50:09'),
(91, 421838209, '2020-09-07 12:54:55', NULL, NULL, NULL, NULL, NULL, 'capture', NULL, '2020-09-07 00:59:34', '2020-09-07 00:59:34'),
(92, 1819142629, '2020-09-07 13:42:45', NULL, NULL, NULL, NULL, NULL, 'capture', NULL, '2020-09-07 01:42:11', '2020-09-07 01:42:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_jenis_donasi`
--

CREATE TABLE `master_jenis_donasi` (
  `id_master_jenis_donasi` int(11) NOT NULL,
  `id_jenis_donasi` int(11) DEFAULT NULL,
  `jenis_donasi` varchar(100) DEFAULT NULL,
  `iat` datetime DEFAULT NULL,
  `uat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `master_jenis_donasi`
--

INSERT INTO `master_jenis_donasi` (`id_master_jenis_donasi`, `id_jenis_donasi`, `jenis_donasi`, `iat`, `uat`) VALUES
(1, 91077432, 'Zakat', '2020-04-19 03:51:11', '2020-04-18 19:51:41'),
(2, 72584460, 'Infaq/Sedekah', '2020-04-19 03:51:14', '2020-04-18 19:51:41'),
(3, 46238496, 'Waqaf', '2020-04-19 03:51:16', '2020-04-18 19:51:41'),
(4, 49014882, 'Kemanusiaan', '2020-04-19 03:51:19', '2020-04-18 19:51:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_metode_pembayaran`
--

CREATE TABLE `master_metode_pembayaran` (
  `id_master_metode_pembayaran` int(11) NOT NULL,
  `id_metode_pembayaran` int(11) DEFAULT NULL,
  `metode_pembayaran` enum('BNI Syariah','BCA','Mandiri','Muamalat','Midtrans') DEFAULT NULL,
  `norek` varchar(100) DEFAULT NULL,
  `atas_nama` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `iat` datetime DEFAULT NULL,
  `uat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `master_metode_pembayaran`
--

INSERT INTO `master_metode_pembayaran` (`id_master_metode_pembayaran`, `id_metode_pembayaran`, `metode_pembayaran`, `norek`, `atas_nama`, `type`, `image`, `iat`, `uat`) VALUES
(2, 76957036, 'Mandiri', '152.0011.7600.51', 'Yayasan Dompet Dhuafa Republika Rekening Zakat ', 'donasi', 'logo-mandiri.png', '2020-04-19 04:11:49', '2020-04-21 16:01:37'),
(3, 42256129, 'BCA', '789.038.7777', 'Yayasan Dompet Dhuafa Republika Rekening Zakat ', 'donasi', 'logo-bca.png', '2020-04-19 04:11:49', '2020-04-21 16:01:57'),
(4, 45259423, 'Muamalat', '801.004.8527 ', 'Yayasan Dompet Dhuafa Republika Rekening Zakat ', 'donasi', 'logo-muamalat.png', '2020-04-19 04:11:49', '2020-04-21 16:02:11'),
(5, 88246397, 'BNI Syariah', '015.938.7145', 'Yayasan Dompet Dhuafa Republika Rekening Zakat', 'sedekah', 'logo-bni.png', '2020-04-19 09:46:12', '2020-04-21 22:23:53'),
(6, 49288787, 'Muamalat', '801.004.8528', 'Yayasan Dompet Dhuafa Republika Rekening Zakat', 'sedekah', 'logo-muamalat.png', '2020-04-19 09:46:12', '2020-04-21 16:02:12'),
(7, 77823354, 'Mandiri', '152.0022.9992.92 ', 'Yayasan Dompet Dhuafa Republika Rekening Zakat', 'sedekah', 'logo-mandiri.png', '2020-04-19 09:46:12', '2020-04-21 16:01:39'),
(8, 77823355, 'Midtrans', NULL, 'Yayasan Dompet Dhuafa Republika Rekening Zakat', 'donasi', 'logo-midtrans.png', NULL, '2020-08-26 07:15:37'),
(9, 7782356, 'Midtrans', NULL, 'Yayasan Dompet Dhuafa Republika Rekening Zakat', 'sedekah', 'logo-midtrans.png', NULL, '2020-08-27 05:17:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_subjenis_donasi`
--

CREATE TABLE `master_subjenis_donasi` (
  `id_master_subjenis_donasi` int(11) NOT NULL,
  `id_subjenis_donasi` int(11) DEFAULT NULL,
  `id_jenis_donasi` int(11) DEFAULT NULL,
  `subjenis_donasi` varchar(200) DEFAULT NULL,
  `iat` datetime DEFAULT NULL,
  `uat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `master_subjenis_donasi`
--

INSERT INTO `master_subjenis_donasi` (`id_master_subjenis_donasi`, `id_subjenis_donasi`, `id_jenis_donasi`, `subjenis_donasi`, `iat`, `uat`) VALUES
(1, 56880199, 91077432, 'Zakat Fitrah', '2020-04-19 03:52:53', '2020-04-18 19:55:31'),
(2, 16858220, 91077432, 'Zakat Maal', '2020-04-19 03:52:56', '2020-04-18 19:55:31'),
(3, 40650232, 91077432, 'Fidyah', '2020-04-19 03:52:59', '2020-04-18 19:55:31'),
(4, 78760362, 72584460, 'Pendidikan', '2020-04-19 03:54:52', '2020-04-18 19:55:31'),
(5, 17817724, 72584460, 'Kesehatan', '2020-04-19 03:54:52', '2020-04-18 19:55:31'),
(6, 67350812, 72584460, 'Sosial', '2020-04-19 03:54:52', '2020-04-18 19:55:31'),
(7, 64183258, 72584460, 'Dakwah', '2020-04-19 03:54:52', '2020-04-18 19:55:31'),
(8, 67323192, 72584460, 'Ekonomi', '2020-04-19 03:54:52', '2020-04-18 19:55:31'),
(9, 96699437, 46238496, 'Waqaf Qur\'an', '2020-04-19 03:56:38', '2020-04-18 19:57:01'),
(10, 92168993, 46238496, 'Waqaf Masjid', '2020-04-19 03:56:38', '2020-04-18 19:57:01'),
(11, 27227237, 46238496, 'Waqaf Pesantren', '2020-04-19 03:56:38', '2020-04-18 19:57:01'),
(12, 61048920, 49014882, 'Bencana Alam', '2020-04-19 03:57:49', '2020-04-18 19:58:26'),
(13, 99102513, 49014882, 'Bantuan untuk Palestina', '2020-04-19 03:57:51', '2020-04-18 19:58:26'),
(14, 27819039, 49014882, 'Penanganan Covid19', '2020-04-24 16:52:15', '2020-04-24 08:52:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_target_donasi`
--

CREATE TABLE `master_target_donasi` (
  `id_master_target_donasi` int(11) NOT NULL,
  `id_target_donasi` int(11) DEFAULT NULL,
  `id_subjenis_donasi` int(11) DEFAULT NULL,
  `target_donasi` varchar(255) DEFAULT NULL,
  `iat` datetime DEFAULT NULL,
  `uat` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `master_target_donasi`
--

INSERT INTO `master_target_donasi` (`id_master_target_donasi`, `id_target_donasi`, `id_subjenis_donasi`, `target_donasi`, `iat`, `uat`) VALUES
(1, 49647637, 16858220, 'Emas', '2020-04-19 04:00:30', '2020-04-18 20:02:38'),
(2, 53330514, 16858220, 'Penghasilan', '2020-04-19 04:00:30', '2020-04-18 20:02:38'),
(3, 23207905, 16858220, 'Simpanan', '2020-04-19 04:00:30', '2020-04-18 20:02:38'),
(4, 83337664, 16858220, 'Perdagangan', '2020-04-19 04:00:30', '2020-04-18 20:02:38'),
(5, 42122642, 78760362, 'Sekolah Literasi Indonesia', '2020-04-19 04:03:21', '2020-04-18 20:03:41'),
(6, 17527834, 78760362, 'Pelatihan guru', '2020-04-19 04:03:24', '2020-04-18 20:04:29'),
(7, 45686355, 17817724, 'Layanan kesehatan cuma-cuma', '2020-04-19 04:04:55', '2020-04-18 20:09:27'),
(8, 84354954, 17817724, 'Kursi roda untuk dhuafa', '2020-04-19 04:04:55', '2020-04-18 20:09:27'),
(9, 33267044, 17817724, 'Ambulance gratis', '2020-04-19 04:04:55', '2020-04-18 20:09:27'),
(10, 28721748, 67350812, 'Kado untuk anak yatim', '2020-04-19 04:05:38', '2020-04-18 20:09:27'),
(11, 22152874, 67350812, 'Sembako untuk dhuafa', '2020-04-19 04:05:40', '2020-04-18 20:09:27'),
(12, 15736309, 64183258, 'Sedekah untuk guru mengaji', '2020-04-19 04:06:56', '2020-04-18 20:09:27'),
(13, 66583779, 64183258, 'Sedekah dai pedalaman', '2020-04-19 04:06:56', '2020-04-18 20:09:27'),
(14, 51902592, 67323192, 'Rumah produksi', '2020-04-19 04:08:07', '2020-04-18 20:09:27'),
(15, 62307373, 67323192, 'Perempuan wirausaha', '2020-04-19 04:08:07', '2020-04-18 20:09:27'),
(16, 80464292, 67323192, 'Modal usaha untuk dhuafa', '2020-04-19 04:08:07', '2020-04-18 20:09:27'),
(17, 65015874, 67323192, 'Ternak untuk dhuafa', '2020-04-19 04:08:07', '2020-04-18 20:09:27'),
(18, 29318318, 67350812, 'Parcel Lebaran untuk Dhuafa', '2020-04-24 16:50:32', '2020-04-24 08:50:39'),
(19, 39381767, 67350812, 'Buka Puasa bersama Yatim', '2020-04-24 16:51:07', '2020-04-24 08:51:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1587712185, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ahmad7irfandi@gmail.com', 'akhmad', '$2y$10$fVEt9OkhMN7tJZlo3N9tSu6dRQAPCT/KgAi/FEd4TC5p0bq6AdtbK', NULL, NULL, NULL, 'c0b72d15ab77729680b05bad1a984c07', NULL, NULL, 1, 0, '2020-04-24 02:36:14', '2020-04-24 02:36:14', NULL),
(2, 'admin@dompetdhuafa.com', 'admindd', '$2y$10$1oyrzoAYBCPPvoPuKXFmg.7RayGegn.XlcobrjQM2uEJxiqxN18rS', NULL, NULL, NULL, '0442a905757979bb6e70316b387faf0c', NULL, NULL, 1, 0, '2020-04-24 04:11:06', '2020-04-24 04:11:06', NULL),
(3, 'abo@dompetdhuafa.com', 'abo', '$2y$10$lYuK05Y/XlJDzSoJdaIAceii3YrjqrXCbfO1bPiSSbZ23NoNCTHtS', NULL, NULL, NULL, '5fb58b627bd4e33c3714840282ad4792', NULL, NULL, 1, 0, '2020-04-24 04:12:55', '2020-04-24 04:12:55', NULL),
(4, 'rahmat@dompetdhuafa.com', 'rahmat', '$2y$10$42MeHC9tBVerOXTTORXiOOkg2CXJELRJ0wGFazmmFXbt6PB0OKq4e', NULL, NULL, NULL, 'ee4be494ca8c92b34ea4e230d299eb85', NULL, NULL, 1, 0, '2020-04-24 04:13:18', '2020-04-24 04:13:18', NULL),
(5, 'eni@dompetdhuafa.com', 'eni', '$2y$10$8lnEkdkG0/WvqND/OlkBneAPJWnDsWIeNwnB1FlX5M4e90lAbpy/u', NULL, NULL, NULL, 'ca5d718bc4de3c1069919b33e2d6f24e', NULL, NULL, 1, 0, '2020-04-24 04:13:41', '2020-04-24 04:13:41', NULL),
(6, 'ini@mail.com', 'adminsss', '$2y$10$d/b.ClOR9jmaCf9hbokOC.KitzSwFejqhuAWBmwRlFd8Qy88I3QUi', NULL, NULL, NULL, '9804e38754ba65c5fa12e4f9775e132f', NULL, NULL, 0, 0, '2020-04-27 20:18:05', '2020-04-27 20:18:05', NULL),
(7, 'ono@mail.com', 'admixxxx', '$2y$10$vHa2C.80QyhkptzhosG3zOMcbw2vBGfWSiUXt4n28lel6NWJV7jTm', NULL, NULL, NULL, '3db6de5b65dae49f3be6c5e59d0ff433', NULL, NULL, 0, 0, '2020-04-27 20:19:23', '2020-04-27 20:19:23', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`) USING BTREE,
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`) USING BTREE;

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `group_id_user_id` (`group_id`,`user_id`) USING BTREE;

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `email` (`email`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `selector` (`selector`) USING BTREE;

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`) USING BTREE,
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`) USING BTREE;

--
-- Indeks untuk tabel `data_donasi`
--
ALTER TABLE `data_donasi`
  ADD PRIMARY KEY (`id_data_donasi`) USING BTREE,
  ADD UNIQUE KEY `id_donasi` (`id_donasi`) USING BTREE,
  ADD KEY `id_donatur` (`id_donatur`) USING BTREE,
  ADD KEY `id_target_donasi` (`id_target_donasi`) USING BTREE,
  ADD KEY `id_metode_pembayaran` (`id_metode_pembayaran`) USING BTREE,
  ADD KEY `id_jenis_donasi` (`id_jenis_donasi`) USING BTREE,
  ADD KEY `id_subjenis_donasi` (`id_subjenis_donasi`) USING BTREE,
  ADD KEY `data_donasi_ibfk_6` (`midtrans_order_id`);

--
-- Indeks untuk tabel `data_donatur`
--
ALTER TABLE `data_donatur`
  ADD PRIMARY KEY (`id_data_donatur`) USING BTREE,
  ADD UNIQUE KEY `id_donatur` (`id_donatur`) USING BTREE,
  ADD UNIQUE KEY `telepon` (`telepon`) USING BTREE;

--
-- Indeks untuk tabel `data_konfirmasi_donasi`
--
ALTER TABLE `data_konfirmasi_donasi`
  ADD PRIMARY KEY (`id_data_konfirmasi_donasi`) USING BTREE,
  ADD UNIQUE KEY `id_konfirmasi_donasi` (`id_konfirmasi_donasi`) USING BTREE,
  ADD UNIQUE KEY `id_donasi` (`id_donasi`) USING BTREE;

--
-- Indeks untuk tabel `data_midtrans_detail`
--
ALTER TABLE `data_midtrans_detail`
  ADD PRIMARY KEY (`id_data_midtrans_detail`),
  ADD UNIQUE KEY `midtrans_order_id` (`midtrans_order_id`) USING BTREE;

--
-- Indeks untuk tabel `master_jenis_donasi`
--
ALTER TABLE `master_jenis_donasi`
  ADD PRIMARY KEY (`id_master_jenis_donasi`) USING BTREE,
  ADD UNIQUE KEY `id_jenis_donasi` (`id_jenis_donasi`) USING BTREE;

--
-- Indeks untuk tabel `master_metode_pembayaran`
--
ALTER TABLE `master_metode_pembayaran`
  ADD PRIMARY KEY (`id_master_metode_pembayaran`) USING BTREE,
  ADD UNIQUE KEY `id_metode_pembayaran` (`id_metode_pembayaran`) USING BTREE;

--
-- Indeks untuk tabel `master_subjenis_donasi`
--
ALTER TABLE `master_subjenis_donasi`
  ADD PRIMARY KEY (`id_master_subjenis_donasi`) USING BTREE,
  ADD UNIQUE KEY `id_subjenis_donasi` (`id_subjenis_donasi`) USING BTREE,
  ADD KEY `id_jenis_donasi` (`id_jenis_donasi`) USING BTREE;

--
-- Indeks untuk tabel `master_target_donasi`
--
ALTER TABLE `master_target_donasi`
  ADD PRIMARY KEY (`id_master_target_donasi`) USING BTREE,
  ADD UNIQUE KEY `id_target_donasi` (`id_target_donasi`) USING BTREE,
  ADD KEY `id_subjenis_donasi` (`id_subjenis_donasi`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_donasi`
--
ALTER TABLE `data_donasi`
  MODIFY `id_data_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `data_donatur`
--
ALTER TABLE `data_donatur`
  MODIFY `id_data_donatur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `data_konfirmasi_donasi`
--
ALTER TABLE `data_konfirmasi_donasi`
  MODIFY `id_data_konfirmasi_donasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_midtrans_detail`
--
ALTER TABLE `data_midtrans_detail`
  MODIFY `id_data_midtrans_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `master_jenis_donasi`
--
ALTER TABLE `master_jenis_donasi`
  MODIFY `id_master_jenis_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `master_metode_pembayaran`
--
ALTER TABLE `master_metode_pembayaran`
  MODIFY `id_master_metode_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `master_subjenis_donasi`
--
ALTER TABLE `master_subjenis_donasi`
  MODIFY `id_master_subjenis_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `master_target_donasi`
--
ALTER TABLE `master_target_donasi`
  MODIFY `id_master_target_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_donasi`
--
ALTER TABLE `data_donasi`
  ADD CONSTRAINT `data_donasi_ibfk_1` FOREIGN KEY (`id_donatur`) REFERENCES `data_donatur` (`id_donatur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_donasi_ibfk_2` FOREIGN KEY (`id_target_donasi`) REFERENCES `master_target_donasi` (`id_target_donasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_donasi_ibfk_3` FOREIGN KEY (`id_metode_pembayaran`) REFERENCES `master_metode_pembayaran` (`id_metode_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_donasi_ibfk_4` FOREIGN KEY (`id_jenis_donasi`) REFERENCES `master_jenis_donasi` (`id_jenis_donasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_donasi_ibfk_5` FOREIGN KEY (`id_subjenis_donasi`) REFERENCES `master_subjenis_donasi` (`id_subjenis_donasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_donasi_ibfk_6` FOREIGN KEY (`midtrans_order_id`) REFERENCES `data_midtrans_detail` (`midtrans_order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_konfirmasi_donasi`
--
ALTER TABLE `data_konfirmasi_donasi`
  ADD CONSTRAINT `data_konfirmasi_donasi_ibfk_1` FOREIGN KEY (`id_donasi`) REFERENCES `data_donasi` (`id_donasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_subjenis_donasi`
--
ALTER TABLE `master_subjenis_donasi`
  ADD CONSTRAINT `master_subjenis_donasi_ibfk_1` FOREIGN KEY (`id_jenis_donasi`) REFERENCES `master_jenis_donasi` (`id_jenis_donasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_target_donasi`
--
ALTER TABLE `master_target_donasi`
  ADD CONSTRAINT `master_target_donasi_ibfk_1` FOREIGN KEY (`id_subjenis_donasi`) REFERENCES `master_subjenis_donasi` (`id_subjenis_donasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
