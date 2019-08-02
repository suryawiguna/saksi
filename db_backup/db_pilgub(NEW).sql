-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Apr 2018 pada 15.24
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pilgub`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `koors`
--

CREATE TABLE `koors` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_kabupatenkota` int(5) NOT NULL,
  `id_kecamatan` int(5) NOT NULL,
  `id_kelurahandesa` int(5) NOT NULL,
  `nama_koor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_diri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `koors`
--

INSERT INTO `koors` (`id`, `id_user`, `id_kabupatenkota`, `id_kecamatan`, `id_kelurahandesa`, `nama_koor`, `alamat`, `no_hp`, `foto_ktp`, `foto_diri`, `created_at`, `updated_at`) VALUES
(1, 21, 4, 21, 301, 'I Kadek Ari Sudana', 'Jl. Ry. Sesetan Gg. Mujair No.6, Dps', '081338998997', 'public/ktpkoor/eoPCo1TOwP4wkMjIlqUw8KF84r6vsM3KtmIxZ1Tm.jpeg', 'public/dirikoor/BL7sa1fRTj5TAzyrG1lYtjcRi1R9GxF8WS72ElOO.jpeg', '2018-03-24 12:16:30', '2018-03-24 12:16:30'),
(2, 42, 7, 42, 507, 'Ida bgs darma wibawa putra', 'Banjar pegubungan', '08124633798', 'public/ktpkoor/X2l0gw2G2HHdcXCecEwugipBRseiq0pCH79KxaPK.jpeg', 'public/dirikoor/YITTRnYh0HHsE3ikXTLRsUeze5vfspKmT8uAscxt.jpeg', '2018-03-24 12:23:04', '2018-03-24 12:23:04'),
(3, 38, 7, 38, 474, 'I Wayan suarya', 'BD Yeh kali', '085237521425', 'public/ktpkoor/GAHUwDiTjAHbfRKHfX2lHK1m56u5HB63Ory2zXqo.jpeg', 'public/dirikoor/L0sGWp7Hwooe6lmNuM4If8PAsxrRjnC8rLuaRcpC.jpeg', '2018-03-24 12:26:05', '2018-03-24 12:26:05'),
(6, 24, 5, 24, 330, 'I Made Suta', 'Br. gelgel Keramas', '081916560684', 'public/ktpkoor/6s34d103OZbCWodz14yFuPuTPJkztbIJur8KLmfu.jpeg', 'public/dirikoor/uKcl3DCz2GeVHJ1kasJbUzpWulIlq2Q0T0cfYUp7.jpeg', '2018-03-24 12:27:47', '2018-03-24 12:27:47'),
(7, 39, 7, 39, 479, 'I nengah jati', 'Dsn Ban', '081337960924', 'public/ktpkoor/c70yLvZgJJAwlCsAzJjmKbXxOmaECVuR5IeJxWTW.jpeg', 'public/dirikoor/0EbSu1I90o2v1S0oN8bXNlySYtfJgYX2fcrSIamU.jpeg', '2018-03-24 12:28:50', '2018-03-24 12:28:50'),
(8, 20, 4, 20, 291, 'Ida bagus widnyana ardaya', 'Jl gunung lebah III no 6', '081338318239', 'public/ktpkoor/SankcANkX50BakuQgA0Eb8fwj1FY4eCo7CzGhumq.jpeg', 'public/dirikoor/aYmY1zZxAZAgslkUdMoB0OKgv6LQ984vSD5IG4ww.jpeg', '2018-03-24 12:29:23', '2018-03-24 12:29:23'),
(9, 57, 9, 57, 714, 'I Made Amantara', 'Br.Tunjuk Kelod, Desa Tunjuk, Kec.Tabanan, Bali', '081239665722', 'public/ktpkoor/ehv6K5tV6YHrAk0WS1hQLYpITzXApeiYR8XxP5ik.jpeg', 'public/dirikoor/24CPC5A37YHPxQxykNPVviCn7MZFCZlYWcnAK1cm.jpeg', '2018-03-24 12:29:31', '2018-03-26 20:44:55'),
(10, 7, 2, 7, 68, 'Ida Bagus Gede Parwita', 'Bangli', '085238946555', 'public/ktpkoor/kcxnH19SnNGJAWb7weHlopRdxTaEgjiu85sV1KrW.jpeg', 'public/dirikoor/gLGoQ7tQhtMn48B6vhRtoW4Uj2lDGyv2vcR6Onef.jpeg', '2018-03-24 12:29:32', '2018-03-24 12:29:32'),
(11, 21, 4, 21, 299, 'I Kadek Muliarta Andika', 'Jl. Penyaringan Sanur Kauh, Belanjong', '081339377848', 'public/ktpkoor/gkYBWwqyxvOeuSuXMZDXeWMbeDqLA0pbRICLEa99.jpeg', 'public/dirikoor/Rl7vm50YebJZQIVKL35U5aAAfXcFNIDKAJSrRHnP.jpeg', '2018-03-24 12:30:03', '2018-03-24 12:30:03'),
(12, 45, 8, 45, 542, 'I Komang karyawanta', 'Kusamba', '081338792189', 'public/ktpkoor/9Hfhd5F8GpFaihIbS0hWDXJRKQqDcdfRrcY6MyVE.jpeg', 'public/dirikoor/c6THP2JXKfcEKTGC7O6rzOXLVxKHqGAoTqCCToWD.jpeg', '2018-03-24 12:30:19', '2018-03-24 12:30:19'),
(13, 38, 7, 38, 468, 'i wayan suarya', 'BD yehkali', '085237521425,', 'public/ktpkoor/iuYjKca7zGzaJbF1QFAbbR0EsINC4ITyvaMN8ACN.jpeg', 'public/dirikoor/E8JFHP9TTAzgnuP9kszDtqK3q2lDgko9ygZX4eY1.jpeg', '2018-03-24 12:30:39', '2018-03-24 12:30:39'),
(14, 7, 2, 7, 68, 'Wayan Partama', 'Lingk.Kel.Kubu Bangli', '083163049729', 'public/ktpkoor/ylajw3SrY0HY0hdWL5CgRpFefvk3Bb7CkwVx4JKm.jpeg', 'public/dirikoor/CyFjzYmg4mKAwLK6sbYePvN3THSKQ1KKxy7YjF51.jpeg', '2018-03-24 12:31:05', '2018-03-24 12:31:05'),
(15, 43, 7, 43, 517, 'I komang putra', 'Br guminten', '082266119095', 'public/ktpkoor/RijGKi7ErVQFE8LjMvxC8cqxvwxB9vR2n1Fe8CVB.jpeg', 'public/dirikoor/3USgU0yPveYfNCnHAkN8hm4SL7aHo15RdCWvDoYo.jpeg', '2018-03-24 12:31:25', '2018-03-24 12:31:25'),
(16, 22, 4, 22, 306, 'I MADE SUARNAYA', 'Jl.Gelintir Br.kertajiwa kertalangu', '081999533234', 'public/ktpkoor/cbCCSJkdzPIymwl1DCWin9hBfXkWdKpSV12at2CC.jpeg', 'public/dirikoor/dUCrk1Qimog2mM2hliJLnFi9y6gsYkZg8ylKLIKJ.jpeg', '2018-03-24 12:31:54', '2018-03-24 12:31:54'),
(17, 10, 2, 10, 131, 'Sang Anom Subadra', 'Peninjoan', '081337948799', 'public/ktpkoor/pMXH4uPFprZwlvi0ztJnkxWUkc2hNEh47vPunzgC.jpeg', 'public/dirikoor/ABIr2bJimCCPBMAxqJAHPuCCkQ1t4sVhNmHl6WKE.jpeg', '2018-03-24 12:33:05', '2018-03-24 12:33:05'),
(18, 35, 6, 35, 438, 'Nengah winarta', 'Asahduren', '083117902589', 'public/ktpkoor/IE6hst1D4YOmDLlTArJwapN2rNCZ489mP3MtPelV.jpeg', 'public/dirikoor/O74N1n9ZNtPVpcCLInNXULkCF4B4BLXo0GQdNv3p.jpeg', '2018-03-24 12:33:15', '2018-03-27 18:42:40'),
(19, 11, 3, 11, 140, 'Komang Armawan', 'Desa Dencarik.Kecamatan Banjar.Singaraja', '087762717242', 'public/ktpkoor/zk6hXEysrc5pDYNthla6SH5bHjChZUDCETMZLwk0.jpeg', 'public/dirikoor/e4SuRexXtEhjmiOnJqDwtA2zATV1lwrHGx3HQ0of.jpeg', '2018-03-24 12:33:17', '2018-03-24 12:33:17'),
(20, 31, 6, 31, 399, 'Sudhiarsa', 'Jl p sumba 1', '081999010001', 'public/ktpkoor/P0czULiGlOYgNckKdvoULUcwjYAufh3qi627vAGK.jpeg', 'public/dirikoor/gfy1iT0QGCJfkKna7hjtdypL6oB8MFGxUWdGurKn.jpeg', '2018-03-24 12:33:44', '2018-03-24 12:33:44'),
(21, 21, 4, 21, 296, 'I Made Bawa', 'Jl. Tk. Yeh Aya No. 208 Dps, Pande', '085237340200', 'public/ktpkoor/rfM3ucarsTmWmP7MbQjZtpGAkLAL1kq6PotaZbZl.jpeg', 'public/dirikoor/OgEihPxhCAMCegYufMdK2P1L1IH671Cjs3DoTEzT.jpeg', '2018-03-24 12:33:49', '2018-03-24 12:33:49'),
(22, 13, 3, 13, 187, 'Pande ngurah sumerta', 'Pucaksari', '087862047244', 'public/ktpkoor/BC9dUJTtadTQI9S6FztZCpczBqRyABRDJOth10uu.jpeg', 'public/dirikoor/cbcR6IBeXH60tRQzIZhgcgS2sNprEPxvkujD9caT.jpeg', '2018-03-24 12:33:55', '2018-03-24 12:33:55'),
(23, 33, 6, 33, 417, 'Ketut Darma', 'Banjar ngoneng', '087862025204', 'public/ktpkoor/YkpZRIN8d0ED7huhvBKLeQTzwxJDxVEyYj2gQzTb.jpeg', 'public/dirikoor/Ioq3beFdDMQYXHXvfKLRiY0bXMybX53b65QMMIoR.jpeg', '2018-03-24 12:33:57', '2018-03-24 12:33:57'),
(24, 40, 7, 40, 488, 'Apel', 'Antiga', '081337029848', 'public/ktpkoor/YO7DGIPt9Zv1MW9X8n2PKsFTKDLKjfaMaMKDA8Uk.jpeg', 'public/dirikoor/ratZZQTLwqB6DSlsrpjgpKVtsKsLE5jFJNTqai5V.jpeg', '2018-03-24 12:34:57', '2018-03-24 12:34:57'),
(26, 11, 3, 11, 149, 'Ketut Nurjana', 'Banjar Dinas Pegayaman.Temukus.banjar', '081916235633', 'public/ktpkoor/Oq3mSMJ0Z3ng6GsxnSTMnPPiINu3pxiZPaIo0QgI.jpeg', 'public/dirikoor/mT8Z7vS2eLqUKOhrEmz6ExNKAOaxgtu2uP77ueAF.jpeg', '2018-03-24 12:37:59', '2018-03-24 12:37:59'),
(28, 17, 3, 17, 244, 'I Gusti Made Arta Winaya', 'Banjar Dinas Mayong,Kec.Seririt', '087762855761', 'public/ktpkoor/y6fJSlZF4dkNezDShKy4sHwF5mzXdpJVW1oPHEmE.jpeg', 'public/dirikoor/acKmHqwxO9iFr5o16d7EklzbfmLbJwPl173ZfgXO.jpeg', '2018-03-24 12:38:28', '2018-03-24 12:38:28'),
(29, 3, 1, 3, 25, 'Dewa gede rauh', 'Kori nuansa timur IX/9', '08123987541', 'public/ktpkoor/6uTQVr7vGTX1TQQUi8amvO1hIAdSXkfiB4zfcoPQ.jpeg', 'public/dirikoor/UzjfLzVNYm9LxQVGPFpJqprEo8qrDsgz0wlZk0bo.jpeg', '2018-03-24 12:38:36', '2018-03-24 12:38:36'),
(30, 46, 8, 46, 559, 'I Gede Setiawan', 'Br. Lebah', '081999955818', 'public/ktpkoor/K1D4cY8IjTXvaTB4bxvkWzE5efuT8Kdfwrf7kPAz.jpeg', 'public/dirikoor/J8Dyz5ser23aLZfV3usx4s2PXLhT2SCLdxtKibCb.jpeg', '2018-03-24 12:40:27', '2018-03-24 12:40:27'),
(31, 6, 1, 6, 59, 'I Ketut Toha Putra', 'Br Pundung Desa Pangsan', '085338877877', 'public/ktpkoor/RytVwYbg7O8BD0YD5Xse1jNPLlmCxAwV69cqbuk3.jpeg', 'public/dirikoor/URqa8u6n9ox6qvI8PCln0GNjCMW1XvvbaXzj7rni.jpeg', '2018-03-24 12:41:03', '2018-03-24 12:41:03'),
(32, 42, 7, 42, 513, 'I gusti l agung ariawan', 'Padang tunggal', '08129814011', 'public/ktpkoor/vftLKEB5suEnck3Ng0RaFh2aRjqFb2tmbusM2Yyo.jpeg', 'public/dirikoor/YK85dunYvJOsJnThBLlkAeS9GiuDC9saxTqHDc8e.jpeg', '2018-03-24 12:42:12', '2018-03-24 12:42:12'),
(33, 8, 2, 8, 113, 'gedesantika', 'bajar desa songan a', '087860167324', 'public/ktpkoor/flrI7JppY9Exbb5IfCN1vlTa37lY6EEcxdWCyFn4.jpeg', 'public/dirikoor/K1tW8tUiLSXE1dCRNhXGslIlq8xPu1Tzi6BAPlU4.jpeg', '2018-03-24 12:42:20', '2018-03-24 12:42:20'),
(34, 7, 2, 7, 69, 'nyoman wirata', 'banjar buayanh', '082237994847', 'public/ktpkoor/g5Xy5FGgRbxPxyan2BQzSC1URRqa4FDXs1rlQ70L.jpeg', 'public/dirikoor/YYcAz7T4r7TGF9bc2RyQdjVpJqJUvUmRpiDYmdbD.jpeg', '2018-03-24 12:42:59', '2018-03-24 12:42:59'),
(35, 5, 1, 5, 51, 'I Dewa Gede Suparta SE', 'Br. Dajan Peken Sembung Mengwi Badung', '081338622945', 'public/ktpkoor/tQzzZRp8USEYA2P656MOoOd7xKTd7zx3eVOZk0L8.png', 'public/dirikoor/DzyTwtmahiyAxdXs5AOJY3JeR7Y0rvSvbs0noeq1.jpeg', '2018-03-24 12:43:27', '2018-03-24 12:43:27'),
(37, 22, 4, 22, 303, 'I Made Suridana', 'Kk. Siulan  gg. Sekar  sari VIII /8 DENPASAR', '081916775599', 'public/ktpkoor/i0GKffGycm9MIHjFhZJuKIsUJxtfBV7cIKgA2G4c.jpeg', 'public/dirikoor/LstGwyIg4xrD9aegljWo30GmlFHPMGZZJuWtwKOA.jpeg', '2018-03-24 12:45:06', '2018-03-24 12:45:06'),
(38, 5, 1, 5, 41, 'Putu Dedy Suandana', 'Jl padma 19 br muncan kapal', '082189085868', 'public/ktpkoor/w3ODdfVSWIZOrj45xT6tfrxkY4bIaF0J2MYLDYQB.jpeg', 'public/dirikoor/0a6oQ18DRmlwLB5NTV0xCqmaY7BD5fWlP894HbfU.jpeg', '2018-03-24 12:46:01', '2018-03-24 12:50:56'),
(39, 1, 1, 1, 12, 'i wayan dana', 'punggul', '081338765255', 'public/ktpkoor/NWLRIEgvAsuUlQDJksPt2DBOixmLsMa8scXXeTGE.jpeg', 'public/dirikoor/GIvhnUrw4VeIEd6nbvTR0su5tGE24wCxb25lSGT0.jpeg', '2018-03-24 12:46:01', '2018-03-24 12:46:01'),
(40, 45, 8, 45, 542, 'I Komang karyawanta', 'Dusun rame kusambe', '081338792189', 'public/ktpkoor/OX54CKgDn1jhZmLFpiSZK3tZIVCxZnDWuUBj1Wel.jpeg', 'public/dirikoor/uQWN6cnG17d7Jvjlof4atHt5ODKTYQJoVHzABRVf.jpeg', '2018-03-24 12:46:35', '2018-03-24 12:46:35'),
(41, 9, 2, 9, 124, 'Sang Ayu Made Setiawati', 'Penglumbaran', '087865923004', 'public/ktpkoor/p9MCePihWIN5WgEaU4ygh1r6DZdOdxQ9u63XJ5mT.jpeg', 'public/dirikoor/o5CdLqvtLstWAo3DoylPEHTkLulXMDWzymWSqBx5.jpeg', '2018-03-24 12:47:54', '2018-03-24 12:47:54'),
(42, 12, 3, 12, 152, 'Ketut Budana', 'Ds Alasangker', '087865213428', 'public/ktpkoor/YbZ05sVXjLTaz1gG2NpHx5LH7CmV7dr5xy4RPdCX.jpeg', 'public/dirikoor/yA0aFUnMWTlIAH2FLDGdrdub9vtD6cE4S8eHqxs7.jpeg', '2018-03-24 12:48:13', '2018-03-24 12:48:13'),
(43, 8, 2, 8, 113, 'gedesantika', '26 04 1984', '087860167324', 'public/ktpkoor/mMhgnVPdNGrACvJvINTWbJSXbfKQvGPIbMoFfMNG.jpeg', 'public/dirikoor/d99Znim2FmXleFoROk8IkNrjHRTl3jm7QLeckvh8.jpeg', '2018-03-24 12:48:17', '2018-03-24 12:48:17'),
(44, 3, 1, 3, 24, 'I PUTU ARWATA', 'Jln. Darmawangsa perum Raya kampial', '08776126822', 'public/ktpkoor/XIfCUSnAPLdDNy9TDEmedR0fAwmx3flRkAkIzpic.jpeg', 'public/dirikoor/buQBXirPSICRAse7ADKWYUOzEYCgVOwa7S16cNui.jpeg', '2018-03-24 12:49:26', '2018-03-24 12:59:49'),
(45, 42, 7, 42, 511, 'Wayan nitia', 'Banjar babakan', '085739979112', 'public/ktpkoor/5tIXWtAFaQkH7BjhaghKF8E1aprvBmnFOMYfY0i1.jpeg', 'public/dirikoor/dwAmsubPJa6FySWcXOLPY38JsxCUno2WxIwUOPpi.jpeg', '2018-03-24 12:56:09', '2018-03-24 12:56:09'),
(47, 1, 1, 1, 16, 'Ketut Sugiartana', 'Sibanggede', '081370865709', 'public/ktpkoor/5uADgDsWixHp1pghIddY2sZoW1skemxTdcByLasK.jpeg', 'public/dirikoor/p51qftdWoSeDoSoQ65Csf8DtUL1EqxJ5vYpWeeVM.jpeg', '2018-03-24 12:59:48', '2018-03-24 12:59:48'),
(48, 42, 7, 42, 510, 'Wayan karaana', 'Banjar yeha', '085237686036', 'public/ktpkoor/xYlbtfhpQNp8kEmvHKcNUp7Kh7XidPMXDP4Xi7kW.jpeg', 'public/dirikoor/03LJVoD2J7nut7gS1yMrsxQ3MRG4jA8qUg1EGtHi.jpeg', '2018-03-24 13:00:32', '2018-03-24 13:00:32'),
(49, 44, 8, 44, 526, 'I kadek soma kastawan', 'Br. Selat', '085934767041', 'public/ktpkoor/EayESqNv1A0LzSUqwtI0ImwLGrybbkmlZQNabqDp.jpeg', 'public/dirikoor/ZVzkbwL2WTaMfH2guQuvPR9NDO5eVYwhygzbxZIu.jpeg', '2018-03-24 13:06:06', '2018-03-25 12:22:28'),
(50, 4, 1, 4, 32, 'I wayan sunarta', 'Jl bedugul gg mangga no 2 link anyar kaja', '087862234588', 'public/ktpkoor/2vSZMJ6a5o5uoTwNrhudTodAYtyHf1p55pbY1LVF.jpeg', 'public/dirikoor/holfRbVO5WCNXjdf8KkCzeyCxbZEh3FLn8enEpVk.jpeg', '2018-03-24 13:06:39', '2018-03-24 13:06:39'),
(51, 12, 3, 12, 167, 'Tumiran', 'Jl. Kepundung', '081236745321', 'public/ktpkoor/tLI3G1G87he2O48oeIDmLq5wVlPoQYV2DNbAmlpi.jpeg', 'public/dirikoor/iwE7vVUbHPFbeNk34rBg3tfOlDK6t9TGkyNB3eQm.jpeg', '2018-03-24 13:09:16', '2018-03-24 13:09:16'),
(52, 6, 1, 6, 56, 'I Made Rahmanta Dioksa', 'Br Sekarmukti Pangsan', '0857-9220-9465', 'public/ktpkoor/7e5qBmydpGhQN5UgOqK5gvHw6RZNQNu2xxwAoVh3.jpeg', 'public/dirikoor/cNlJskItZdnr6hz2nBOnyUOs10cZpKaMEflUGdiB.jpeg', '2018-03-24 22:20:13', '2018-03-24 22:20:13'),
(53, 39, 7, 39, 485, 'Igede dayuh', 'Munti desa timur', '082146935386', 'public/ktpkoor/W1thSDwrBggEbM632oncP20YGqqXTiGN84PY3Qpz.jpeg', 'public/dirikoor/1zu7EosQeGm3XCQv95e9BizRmQwqkpnzDpzhBf79.jpeg', '2018-03-25 11:58:52', '2018-03-25 11:58:52'),
(54, 37, 7, 37, 463, 'I Wayan Budiartika', 'Br. Dinas Tri Wangsa', '082236292807', 'public/ktpkoor/jfDSofeTn6Dy3kSwgojOb9UOQUR1EZuO3PID2mQi.jpeg', 'public/dirikoor/uEgnCS3c6VC59LZOIj0V08zRaVfwzr2wu61EPpVR.jpeg', '2018-03-26 11:47:34', '2018-03-26 11:50:16'),
(55, 41, 7, 41, 500, 'I Gst Ngurah Alit', 'Br.Dinas Palak Besakih', '08124649699', 'public/ktpkoor/oPbqK28dEqXLy3cOi1EIBVYKnzXz9qCfi1zklvpM.jpeg', 'public/dirikoor/loiyPvo4vhuS34ST4DuhgyJ0OVhjGOuQ52Cwndqk.jpeg', '2018-03-26 18:41:49', '2018-03-26 18:41:49'),
(56, 41, 7, 41, 502, 'I Kadek Supardika', 'Br dinas pande desa nongan', '081239114025', 'public/ktpkoor/h6TljWZQEP4zAITxey9JvQkAnC3tyWycL1UHpZTv.jpeg', 'public/dirikoor/8htjVQgmPYw7dnTK6VtQ718qAIyQ27jugeyEqjal.jpeg', '2018-03-26 18:45:44', '2018-03-26 18:45:44'),
(57, 41, 7, 41, 505, 'I Putu Riawan', 'Br.dinas pringalot.rendang kr asem', '083117235578', 'public/ktpkoor/NtpOmwLhis7TTI6LG7vhymqrgIJn9CwPAZHfM8bt.jpeg', 'public/dirikoor/PAIJ2hxoWINeXnoowhzrEjorCNfDU6UgHUDWF7Xy.jpeg', '2018-03-26 19:10:22', '2018-03-26 19:10:22'),
(60, 35, 6, 35, 442, 'Ikomang miasa', 'Banjar asahduren', '087861029221', 'public/ktpkoor/R2TwCSykDpafKnPAaa11yQvhMf0vOyIG0jsZTpFI.jpeg', 'public/dirikoor/Y2cCm24cNlWfhQvjPCeuiyWTKaYBWVeLtN6Ccn8t.jpeg', '2018-03-26 23:37:47', '2018-03-26 23:44:54'),
(61, 35, 6, 35, 439, 'Ikadek dartika', 'Banjar asahduren', '087762242561', 'public/ktpkoor/EaS71Lui9p76Fl7y9ZWZqh0O44U82V9LJQlaJXcB.jpeg', 'public/dirikoor/4JfksGiUsesQb9sFCSQL1pfrdf5T7SfmohNBHgwR.jpeg', '2018-03-26 23:56:50', '2018-03-26 23:56:50'),
(62, 39, 7, 39, 484, 'i nyoman murdana', 'kerta buana', '082237651778', 'public/ktpkoor/BEfUuJRrp0ftRdS8zB154nvjPkeT7PZjz6TOeyHI.jpeg', 'public/dirikoor/1MoYym1bn04wAQSUVffqqdWX00BOOKZf42e3jSjt.jpeg', '2018-03-27 10:37:51', '2018-03-27 10:37:51'),
(63, 35, 6, 35, 444, 'Inyoman sudiana', 'Banjar lebih', '087761065009', 'public/ktpkoor/vKWTfw9lg9j72H64GCj2xUljBY5lv8ZJj1XJsAGP.jpeg', 'public/dirikoor/S9XUQtnUInZ5y0OHjYSssIdSBGKxRuORlqF33aub.jpeg', '2018-03-27 14:46:53', '2018-03-27 14:46:53'),
(64, 35, 6, 35, 445, 'Ikadek lastra', 'Pulukan', '081916664879', 'public/ktpkoor/5F18qXG2rS0A7tXHm0bReOPQWOdIqGaBuLMTmc9u.jpeg', 'public/dirikoor/YbbhLDRFxia5ozO2x96gMR8wx9AmUxZYwlf0wf9V.jpeg', '2018-03-27 14:49:36', '2018-03-27 14:49:36'),
(65, 35, 6, 35, 443, 'Inengah tangkil', 'Pekutatan', '081338654036', 'public/ktpkoor/twHqE1pPqIlEsgoJmUiMFZF0nd2i56wsXGLdUUJu.jpeg', 'public/dirikoor/20ClDpQEqc3hsK4jY9qp1yGjvp5GozVbFe8HkLr2.jpeg', '2018-03-27 14:52:40', '2018-03-27 14:52:40'),
(66, 35, 6, 35, 441, 'Igusti ngurah komang sumer', 'Medewi', '081805300223', 'public/ktpkoor/Shv4S0CzbOhVFoperPiRI4CgaSeXg2xrk9GC0UGn.jpeg', 'public/dirikoor/4ZmAq7XL4YFT2zpsNBwINqXc8rds9t1JLfVJ48oJ.jpeg', '2018-03-27 14:56:52', '2018-03-27 14:56:52'),
(67, 35, 6, 35, 440, 'Imade widyantara', 'Manggisari', '081916741084', 'public/ktpkoor/bmQLQxubTrTruwZqxod1ncK1DsJPNH1ADdJ13Wxv.jpeg', 'public/dirikoor/A7IKRdKnORwMcqVk3dJ0r5blDZF5Jgbi5kEdpefq.jpeg', '2018-03-27 15:01:27', '2018-03-27 15:01:27'),
(68, 41, 7, 41, 503, 'I Wayan Jumu', 'Besakih', '082339669444', 'public/ktpkoor/LLDTKX0B8Jp46Vh10GbblMDd8wFsv8lX7aOTp2gf.jpeg', 'public/dirikoor/mDT3vItrxngHwpRtZwyIwvk94KwSeVvqm1n1CzON.jpeg', '2018-03-27 15:16:20', '2018-03-27 15:16:20'),
(69, 41, 7, 41, 501, 'I Komang sila', 'Batusesa menange', '081338087750', 'public/ktpkoor/JGcS6IK9O22GHo1N9XInBhpT3OPJ3EJw6GPXqXAF.jpeg', 'public/dirikoor/d6bGtiekqXglgGXrePiwSTShw9cFaGcflwwkTDNg.jpeg', '2018-03-27 15:31:29', '2018-03-27 15:31:29'),
(70, 34, 6, 34, 429, 'I Kade Diatmika', 'Banyubiru', '081999820293', 'public/ktpkoor/x25hb5FxGG1nCLwwazM6hOSGb1wiuXwtBoVNwMMA.jpeg', 'public/dirikoor/gLqHMqe4WT54gblHmbUdOdqFe2oGFnwobCGt5n7c.jpeg', '2018-03-27 19:50:13', '2018-03-27 19:50:13'),
(71, 34, 6, 34, 426, 'I Ketut Budhi Wirata', 'Baler bale agung', '087755375788', 'public/ktpkoor/yYmNhnjTZ73EmQeLxbOKYFBN3wmPpp2pQv0nOUoq.jpeg', 'public/dirikoor/rHoR3UTQou6156YWhXtML0BOgzWB9n1tJORmi5K6.jpeg', '2018-03-27 20:27:06', '2018-03-27 20:27:06'),
(72, 34, 6, 34, 434, 'Ryan Azhar', 'Lingk petukangan loloan barat', '081999822215', 'public/ktpkoor/UzDRrY8Rs3LLCHYM0KyFCRQ3x8cyfS77T09Kxxy5.jpeg', 'public/dirikoor/mUw3VvCTqo7pHeEWckhPqyFqQGI3gJBQBrZEeejV.jpeg', '2018-03-27 21:27:09', '2018-03-27 21:27:09'),
(73, 34, 6, 34, 435, 'Sajidi', 'Br Ketapang Pengambengan', '085337708602', 'public/ktpkoor/OoODjj3rJJySDJDkfAdHNYpyiyN2etbzJTocfMPB.jpeg', 'public/dirikoor/cQn3O2iEHUI6ZxRGBzDhkVVtDLLGXQwIqoOMZwAv.jpeg', '2018-03-28 11:16:38', '2018-03-28 11:16:38'),
(74, 34, 6, 34, 430, 'I Gusti Putu Sudiasa', 'Banjar Pengajaran Desa Berambang', '081337086438', 'public/ktpkoor/PhekElRD69XjaOSrgfIcV23Xz9ouORSwsszen1rN.png', 'public/dirikoor/ahsMGDOOsPT4zCpXoKocdnnKm93LY4hDrRgq3TKE.png', '2018-03-28 13:18:23', '2018-03-28 13:36:28'),
(75, 34, 6, 34, 426, 'I Gusti Putu Kamayana', 'Banjar Pengajaran Desa Berambang', '082144712267', 'public/ktpkoor/tPV8tqZF7dOydS1XuKxwV9xKcamnjKhhIH1oJxU4.png', 'public/dirikoor/n9AU6jcrpX2My9bwQVrpifmeUQYL6cPxekAjhXCZ.png', '2018-03-28 13:46:52', '2018-03-28 13:46:52'),
(76, 42, 7, 42, 508, 'I ketut kusnadi', 'br dinas pesangkan anyar', '082236642003', 'public/ktpkoor/prUkhs2ok8qbprIpbKy8F7Ze0CDHSwX52Kmp8TB3.jpeg', 'public/dirikoor/ZcBkVlId9CxZiwa2XiOIJp3vA5aUzmFf5K2SVfT9.jpeg', '2018-03-28 14:56:39', '2018-03-28 14:56:39'),
(77, 57, 9, 57, 704, 'I WAYAN BENI KURNIAWAN', 'BR. TUNJUK KLOD DESA TUNJUK TABANAN', '082144031629', 'public/ktpkoor/kObE1iSI8rC12dBacNZvlmMgPRWDlmokSYtIQ6cU.jpeg', 'public/dirikoor/zsRUmhP9AkVRH77bPKAs66zoQmcLHxklPUdZrUwh.jpeg', '2018-03-28 20:55:10', '2018-03-28 20:55:10'),
(78, 57, 9, 57, 705, 'I MADE SEBUDA ARTA', 'DESA BUAHAN UTARA BUAHAN TABANAN', '0815578433047', 'public/ktpkoor/KZpiA57hAKqPT8VjJDNcG0Whl2A2n9KxlJ5QJmtp.jpeg', 'public/dirikoor/pHZRfxlTzVzyaA6DjlUK5rc5wvX4PR0AHBqlP3fk.jpeg', '2018-03-28 21:05:03', '2018-03-28 21:05:03'),
(79, 57, 9, 57, 706, 'I WAYAN PASEK MASTIKA', 'BANJAR TUNJUK KELOD TUNJUK TABANAN', '085953932878', 'public/ktpkoor/wLJJw26AtpzAPsaxfYRWKhG1ZTrejcZffZ4Cp4em.jpeg', 'public/dirikoor/Pv5GzMnUVmCy81NJlHC0N98uqztvpYKrn02jn6vj.jpeg', '2018-03-28 21:06:47', '2018-03-28 21:06:47'),
(80, 57, 9, 57, 707, 'I WAYAN PUJIAWAN', 'BR. TUNJUK TENGAH TUNJUK TABANAN', '085857642394', 'public/ktpkoor/ZC1XRzAFPcB2DUn2gc1NSo0RTpk6325KndbPZx0p.jpeg', 'public/dirikoor/1dZQpBTl7UpvuBDdvMUoAnEMxDCDsEIuXgLktdT2.jpeg', '2018-03-28 21:08:30', '2018-03-28 21:08:30'),
(82, 57, 9, 57, 709, 'I WAYAN SUTARYA', 'BR. TUNJUK KLOD TUNJUK TABANAN', '085100757409', 'public/ktpkoor/DTeGomfp4gOebnjovWiLESeaCCc1SoMAc8yZD4hI.jpeg', 'public/dirikoor/IMTaEDTbvsmv9PpktuSmSZasqXen8YulTmQc39Yz.jpeg', '2018-03-28 21:14:41', '2018-03-28 21:14:41'),
(83, 57, 9, 57, 710, 'I MADE WIDARMAWAN', 'BR. TUNJUK KLOD TUNJUK TABANAN', '081236146848', 'public/ktpkoor/SRZqF5Gvb56b3ondCzUAUMAQ56825UDXhOBa83rM.jpeg', 'public/dirikoor/MAny7L54RCHEINz98MtfmDmB46pnxRYbQmuedu2y.jpeg', '2018-03-28 21:15:44', '2018-03-28 21:15:44'),
(84, 57, 9, 57, 711, 'I KETUT TUNAARSA', 'BR. TUNJUK KLOD TUNJUK TABANAN', '082236674106', 'public/ktpkoor/8rgXmJQ7rUwy7zE9AhaQ6sr0EkuV9noEbC3krTKB.jpeg', 'public/dirikoor/0bJfViCwYlfduT1oJkfeu3XZig0KMY3tWojNzgHv.jpeg', '2018-03-28 21:19:20', '2018-03-28 21:19:20'),
(85, 57, 9, 57, 712, 'I MADE SUITRA', 'BR. TUNJUK KLOD TUNJUK TABANAN', '082144655475', 'public/ktpkoor/Ea7FBXyBz19ruTMYsRb0DmqsVFA9l2NjsdnKJal0.jpeg', 'public/dirikoor/YZw6r2u8QtyhYWHkAkjV7MCBUucqRdr6t1V1LunP.jpeg', '2018-03-28 21:20:40', '2018-03-28 21:20:40'),
(86, 42, 7, 42, 512, 'I wayan karsana', 'Br dinas yeha', '08123624259', 'public/ktpkoor/4jwQUj03XAzVJYwJ9tY3Veo6fmEy9R7iu3qfxNbM.jpeg', 'public/dirikoor/4vsNoK8rjZYJFuT1JcKOWOUGWGQGSBURI6JMR8DL.jpeg', '2018-03-29 14:58:30', '2018-03-29 14:58:30'),
(87, 34, 6, 34, 429, 'MOHAMAD ILMAN', 'Banjar Pebuahan', '085333481875', 'public/ktpkoor/F9owRqwNt3RAXzPDqy7U9tQZnM3JocGwzqkS9rcP.jpeg', 'public/dirikoor/LxxSGOW6TPTFT7VzhDky4aR8Ci2QpPiuUJoWKULU.jpeg', '2018-03-29 15:20:50', '2018-03-29 15:20:50'),
(88, 34, 6, 34, 432, 'I Gede Eka Ardiawan', 'Banjar Munduk Desa Kaliakah', '081999515907', 'public/ktpkoor/h2M1KC3NsRyzay4fem8jQ4MwPWEdtJ0Hy5O5J0z3.jpeg', 'public/dirikoor/v2bDKDFeG88SI4chAEhxNW8Z1lczPam4hiiB5Elv.jpeg', '2018-03-29 19:47:58', '2018-03-29 19:47:58'),
(89, 14, 3, 14, 205, 'Ketut Sukerta', 'BD Sumberklampok', '083117787532', 'public/ktpkoor/Xb1khthaaVpqLVy6FKTTZOhIpfxWsPwH5PUUU4PB.jpeg', 'public/dirikoor/RJ3feRklIDV6NBT5TuUoRI5dxDZAWE7HOYd29RBJ.jpeg', '2018-03-29 20:09:58', '2018-03-29 20:09:58'),
(90, 30, 5, 30, 392, 'I WAYAN PELIK EDI ARIANTO', 'BR.PENESTANAN KELOD', '085738860783', 'public/ktpkoor/KnyjU3tPaqPIZADR6aVSMa4Bh3OwjvMj4Y0A6ZW7.jpeg', 'public/dirikoor/Rwgj0rWmIv4wQ8cJzKD1CenX02i2ZlKtrfYGpJfh.png', '2018-03-29 23:17:53', '2018-03-30 12:19:43'),
(92, 30, 5, 30, 389, 'I GUSTI PUTU ALIT INDRAWAN MATARAM', 'BR.PENGOSEKAN KAJA', '083114490943', 'public/ktpkoor/7NdMQJW3hMn0F179TW6MeQyVAJvJxK7u4R0CxO3o.jpeg', 'public/dirikoor/JKg61nqGP7eE9yzlauGeAkRIi6fh7dIkHVOWSEVn.jpeg', '2018-03-30 08:34:00', '2018-03-30 12:10:25'),
(93, 30, 5, 30, 392, 'I MADE WARDANA', 'BR.PENESTANAN KAJA', '082144634245', 'public/ktpkoor/0WGg3lQTHGlZysELdI1BzgMBwIQdW1JobqJkKQO9.jpeg', 'public/dirikoor/mL08dGxy2jOd3iFUXCT3wKSEt2fBpl2kfcUKt3gy.jpeg', '2018-03-30 12:14:16', '2018-03-30 12:20:14'),
(94, 30, 5, 30, 389, 'SANG KOMPIANG WIDYA SASTRAWAN', 'BR.PENGOSEKAN KAJA', '081353073617', 'public/ktpkoor/KitmDZIlX010TynQ9c5QbnmPEmpe684SIktAqTk1.jpeg', 'public/dirikoor/Df0qrjvlIgl5NHZ3duvKXQa5hR9DnbTAtwd9Lt41.jpeg', '2018-03-30 12:27:02', '2018-03-30 12:27:02'),
(95, 30, 5, 30, 392, 'I WAYAN SUKA ARNAYA', 'BR.PENESTANAN KAJA', '081999554500', 'public/ktpkoor/FJ6gbT73m5ZUP1lH8js0w6ZR776PpRz3n1n2ShpI.jpeg', 'public/dirikoor/USgNet9GqXuAJMpj8aTpm7002AsOtOfExEBK6vBn.jpeg', '2018-03-30 12:30:29', '2018-03-30 12:30:29'),
(96, 57, 9, 57, 715, 'I Ketut Suarma', 'Br. Wanasari Belodan, Ds.Wanasari, Tabanan', '087761018773', 'public/ktpkoor/nSRqv7DOJUpQZfQTJF8aiBXcypL9Sp75NH0GpjgC.jpeg', 'public/dirikoor/bG2KPHKb59HTMhTLbEfZ960LufjcWOp36Kfo70Uk.jpeg', '2018-03-30 21:05:25', '2018-03-30 21:05:25'),
(97, 14, 3, 14, 200, 'Wayan sugatra', 'Desa pejarakan', '085337582196', 'public/ktpkoor/SjUSeq2LqQXikb8ZtEQoVGE0OsBo3r7DCu0gfFJC.jpeg', 'public/dirikoor/YVjdBkRAUnQA6SJo55kVbv8KT2wIGBsGNp0RTPGV.jpeg', '2018-03-31 20:40:13', '2018-03-31 20:40:13'),
(98, 34, 6, 34, 426, 'I Putu Suartawan', 'Lingkungan Baler Bale Agung Kel Baler bale agung', '08977233310', 'public/ktpkoor/guUpsD8NvOzftcUjMEOX6TVCdedcT4w3cZAU3vRk.jpeg', 'public/dirikoor/yMqVG784Uue8JzD9zAv1fVKzahAFd3zg4V4oKDbu.jpeg', '2018-03-31 21:32:13', '2018-03-31 21:32:13'),
(99, 52, 9, 52, 654, 'GUSTI AYU ARI PURWATI', 'Tabanan. 15 sept 1970', '0858588007076', 'public/ktpkoor/yiDu3YbF2w7kA3ULaYfVpa2jLn6SEyyMujVPPL5V.jpeg', 'public/dirikoor/PJ2zouqZddkVtQRUFgZBuwBZ0cf6m4KoR97Rkoco.jpeg', '2018-04-01 09:49:14', '2018-04-01 09:49:14'),
(100, 37, 7, 37, 460, 'I Komang Geban', 'Br. Dinas Jungseri', '085339069163', 'public/ktpkoor/Cs3urEYpS2hoss49EXkFYJFnXK7DjQHgo2WoXAOm.jpeg', 'public/dirikoor/QW88Y1lJcvbjDwLK8yJv6G9gkIEq4prwXfgbwNWa.jpeg', '2018-04-01 10:06:15', '2018-04-01 10:06:15'),
(101, 14, 3, 14, 199, 'PUTU WIDIASA', 'BD. TEGAL ASRI', '085338861548', 'public/ktpkoor/h6sM0hiXs4Sm9CH5JVPHxz8iusjaSnFVyKGwA4rP.jpeg', 'public/dirikoor/efswbR8OuTRHjDUpGWyOoSbPJxTE4CIikz1epk79.jpeg', '2018-04-01 11:01:36', '2018-04-01 11:25:45'),
(102, 14, 3, 14, 199, 'KOMANG EDI UDYANTARA', 'BD. TEGAL ASRI', '085238300701', 'public/ktpkoor/VaktK7qPPSuxHd7iMJppBGnNHShVPz1dbZYYbF7q.jpeg', 'public/dirikoor/2U4sq0ofgKi2C1ysaujP6EqceJ6bVchTwYcPrOCl.jpeg', '2018-04-01 11:04:56', '2018-04-01 11:04:56'),
(103, 48, 9, 48, 583, 'I NYOMAN SIAWAN', 'MUNDUK LUMBANG, 31-12-1975', '085238499417', 'public/ktpkoor/h4FEKPVJHL6eM7zMvtAUQ4iUP6dVuwRCwuylMKVb.jpeg', 'public/dirikoor/JwTRSiarB7jelIGBZLpA7HCOiFXtEjjlgdsuJwyX.jpeg', '2018-04-01 11:06:33', '2018-04-01 11:06:33'),
(104, 14, 3, 14, 199, 'PUTU PASEK SUDIRA', 'BD. TEGAL ASRI', '085238294500', 'public/ktpkoor/Yr7GxvsUAmNZuvmt1LrcHzUfoCYCbQ7HIea0CpQW.jpeg', 'public/dirikoor/ohorwhp5R10kEHDm6oXBAergKCYiZIqNxIuxvUcR.jpeg', '2018-04-01 11:07:21', '2018-04-01 11:07:21');

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
(1, '2018_03_09_020141_create_saksis_table', 1),
(2, '2018_03_12_064850_create_kabupaten_kotas_table', 2),
(3, '2018_03_12_065246_create_kecamatans_table', 2),
(4, '2018_03_12_065810_create_kelurahan_desas_table', 2),
(5, '2018_03_13_073518_create_partai_table', 3),
(6, '2018_03_13_075655_create_koors_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `partai`
--

CREATE TABLE `partai` (
  `id` int(2) UNSIGNED NOT NULL,
  `nama_partai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `partai`
--

INSERT INTO `partai` (`id`, `nama_partai`, `created_at`, `updated_at`) VALUES
(1, 'Golkar', '2018-03-13 07:38:16', '2018-03-13 07:38:16'),
(2, 'Demokrat', '2018-03-13 07:38:16', '2018-03-13 07:38:16'),
(3, 'Gerindra', '2018-03-13 07:40:36', '2018-03-13 07:40:36'),
(4, 'Nasdem', '2018-03-13 07:40:36', '2018-03-13 07:40:36'),
(5, 'Berkarya', '2018-03-13 07:40:36', '2018-03-13 07:40:36'),
(6, 'PKS', '2018-03-13 07:40:36', '2018-03-13 07:40:36'),
(7, 'PSI', '2018-03-13 07:40:36', '2018-03-13 07:40:36'),
(8, 'PBB', '2018-03-14 02:38:28', '2018-03-14 02:38:28'),
(9, 'Relawan', '2018-03-20 05:14:32', '2018-03-20 05:14:32');

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
-- Struktur dari tabel `saksis`
--

CREATE TABLE `saksis` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_koor` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_kabupatenkota` int(5) NOT NULL,
  `id_kecamatan` int(5) NOT NULL,
  `id_kelurahandesa` int(5) NOT NULL,
  `no_tps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_partai` int(2) NOT NULL,
  `nama_saksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_diri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `saksis`
--

INSERT INTO `saksis` (`id`, `id_koor`, `id_user`, `id_kabupatenkota`, `id_kecamatan`, `id_kelurahandesa`, `no_tps`, `id_partai`, `nama_saksi`, `alamat`, `no_hp`, `foto_ktp`, `foto_diri`, `created_at`, `updated_at`) VALUES
(3, 53, 39, 7, 39, 485, 'TPS-2', 4, 'ni nengah wangi', 'munti desa timur', '085205505840', 'public/ktpsaksi/B23GBMGMoo7QNNPvsUgGWTzq1KRk3Qrc1NFCEHU9.jpeg', 'public/dirisaksi/7wKisb3YesyOGoRZPFMSKBHwru1ypiFr3sgdwWRU.jpeg', '2018-03-25 12:26:58', '2018-03-25 12:26:58'),
(4, 53, 39, 7, 39, 485, 'TPS-1', 4, 'i kadek aswin anom saka prasta', 'munti desa timur', '085965906540', 'public/ktpsaksi/aubgbAar523piQbcpCTpDlDwsHuH3dJ6MlXHyphi.jpeg', 'public/dirisaksi/b9cPUPXImm4YhdjPYJs90hwmABTr1Z3mgzDYrgsm.jpeg', '2018-03-25 12:37:28', '2018-03-25 12:37:28'),
(5, 54, 37, 7, 37, 463, 'TPS-8', 4, 'I Komang Gunartha', 'Br. Dinas Papung', '085338236999', 'public/ktpsaksi/OuVshHZ7PwcCJcXc1RhSiYWHwushmOz72xYfhrII.jpeg', 'public/dirisaksi/1lsr6ed8dIw4F70ODNuUJqOgNHzDYnacxsQDwoVJ.jpeg', '2018-03-26 11:59:35', '2018-03-26 11:59:35'),
(6, 54, 37, 7, 37, 463, 'TPS-8', 4, 'I Wayan Sadiya', 'Br. Dinas Papung', '08239779422', 'public/ktpsaksi/XdhfJoCtmIvYcA9guG83cvwteXuWVqYH3JOuXtPF.jpeg', 'public/dirisaksi/Tof8fuLiZwawXJMUdZAxoDQ6ghaihZl3ARZfwmZx.jpeg', '2018-03-26 12:47:48', '2018-03-26 12:47:48'),
(7, 56, 41, 7, 41, 502, 'TPS-1', 4, 'I Made Wenten', 'Dusun Segah', '085792458228', 'public/ktpsaksi/nYGbzfE6wpJ0w3U3aW3BDw1be4uHsohUsCU7Fwuj.jpeg', 'public/dirisaksi/c8C8p7Mzq8XZZlVBjU0bhChIlkMUrxeqKMUEFb9L.jpeg', '2018-03-27 07:05:11', '2018-03-27 07:05:11'),
(8, 56, 41, 7, 41, 502, 'TPS-1', 4, 'Pande Gede Agus Joniarta', 'Br.Dinas Pande Nongan', '081999293731', 'public/ktpsaksi/JtgSiszAWxtR1zqcescotnJX855ULqzTfeZEHbWL.jpeg', 'public/dirisaksi/DNt0KT5AhdGJ56PfrFapk7neutrlqkctvnSpqm8C.jpeg', '2018-03-27 07:12:50', '2018-03-27 07:12:50'),
(9, 18, 35, 6, 35, 438, 'TPS-1', 4, 'I Wayan mudana', 'Banjar lebih.', '087862402437', 'public/ktpsaksi/JhkTSTEOyyDGeY9BCPWtbI8ijcuA32cE8MXFMkgK.jpeg', 'public/dirisaksi/MNesLsJy4JfzLgVAJ7GQHMmA7YrA1ImCP3wrXf9i.jpeg', '2018-03-27 14:27:38', '2018-03-27 18:42:40'),
(10, 18, 35, 6, 35, 438, 'TPS-1', 4, 'Iwayan sirya', 'Banjar lebih', '087862807770', 'public/ktpsaksi/kstwEMOUS0vf2hmbHSylv2nrA7w9jmynX48mUDhK.jpeg', 'public/dirisaksi/ua9zNyM3qwx0YOVehEGLKGVAZ909cwtoh39VbzsJ.jpeg', '2018-03-27 14:30:21', '2018-03-27 18:42:40'),
(11, 18, 35, 6, 35, 438, 'TPS-2', 4, 'Sutadnya', 'Banjar lebih.', '081936544198', 'public/ktpsaksi/zyRrVISPv9uQQxB8ReWtqBR0yP7cLUU3YQMOKiRo.jpeg', 'public/dirisaksi/HwzFFzDebRBHVC8n0FCGX50CvPhN7nJNVWykdd8u.jpeg', '2018-03-27 14:33:04', '2018-03-27 18:42:40'),
(12, 18, 35, 6, 35, 438, 'TPS-2', 4, 'Komang budiartama', 'Banjar lebih.', '081999691269', 'public/ktpsaksi/EdIzGTD9JjiSBgYlErtZd9RGSAGg8c0JTr0Ys4yk.jpeg', 'public/dirisaksi/Ht6H7xnFkMl6DnEDhT8mNXfEE6Ww04ZM1313l9mR.jpeg', '2018-03-27 14:35:21', '2018-03-27 18:42:40'),
(13, 70, 34, 6, 34, 429, 'TPS-1', 4, 'I Gede Teguh Adnyana', 'Banyubiru', '083114234847', 'public/ktpsaksi/ptKmJAHbgFnfnqdYrIt45TstKaB3rSEc0rT9sNBD.jpeg', 'public/dirisaksi/OKWCfRJBMIMqvfnxLOoCNYGm8La2I33Pw6Vg4bxt.jpeg', '2018-03-27 19:55:23', '2018-03-27 19:55:23'),
(14, 71, 34, 6, 34, 426, 'TPS-3', 4, 'Putu Bismantya Adi', 'Baler bale agung', '085843280331', 'public/ktpsaksi/7XiZxG5mVttpL4SXrpwKVgx0RxdkVLPRsbQlKKY5.jpeg', 'public/dirisaksi/3dlZKwBcyB5pduw00Xv1WYkeLDxU1dQON07y92gu.jpeg', '2018-03-27 20:29:53', '2018-03-27 20:29:53'),
(15, 72, 34, 6, 34, 434, 'TPS-1', 4, 'Sahranudin', 'Link terusan Loloan Barat', '087863215150', 'public/ktpsaksi/nOWMlbnJ5W7Nrqj4zotKaPafw3JA3EnzcBk006Wf.jpeg', 'public/dirisaksi/ufR2r5KvKIS6vjc3tP7qFGMir8pBec3v6O3tRAV0.jpeg', '2018-03-27 21:49:14', '2018-03-27 21:49:14'),
(16, 72, 34, 6, 34, 434, 'TPS-4', 4, 'Ahmad Roziqin', 'Link pertukangan loloan barat', '087755793480', 'public/ktpsaksi/IhJ7nsvxxTarNLtTjpgn4YZAvxrmg6gxre6TXTSs.jpeg', 'public/dirisaksi/KgsScXYyxZ1wgHYSgRKkIJGz4gZR7nPmY69QVHN7.jpeg', '2018-03-27 21:53:12', '2018-03-27 21:53:12'),
(17, 72, 34, 6, 34, 434, 'TPS-2', 4, 'Fajar Syarif', 'Link pertukangan loloan barat', '081236632067', 'public/ktpsaksi/VTebTRuftRf3jBZMd9CCs4TtKwFPBPf9WXHjhIxT.jpeg', 'public/dirisaksi/l3wlfven1vV79jKsOslyR4adwzckzCXrJBAExVxu.jpeg', '2018-03-27 22:03:41', '2018-03-27 22:03:41'),
(18, 72, 34, 6, 34, 434, 'TPS-5', 4, 'Nur Yasin', 'Link pertukangan loloan barat', '082144659259', 'public/ktpsaksi/Odnj6pFdyxaYSE3yYgHZWdpDfbUFK7xnQ2hznsyX.jpeg', 'public/dirisaksi/P5pqgNQlPiSLMnhVwSpyuoXpucLy5UISsq6ThgI3.jpeg', '2018-03-27 22:10:44', '2018-03-27 22:10:44'),
(19, 72, 34, 6, 34, 434, 'TPS-7', 4, 'Sayiful Bahri', 'Link pertukangan loloan barat', '082340141851', 'public/ktpsaksi/4xRjiNdBmFP3mlKcyrmQ5lbwPE8a9JHBNF9qdIlA.jpeg', 'public/dirisaksi/E1JU8LDn4DfCkehlbsNNXrATIhuzsCjhucIYmE51.jpeg', '2018-03-27 22:22:47', '2018-03-27 22:22:47'),
(20, 72, 34, 6, 34, 434, 'TPS-1', 4, 'Mustakim', 'Link pertukangan loloan barat', '081337337985', 'public/ktpsaksi/gsPxPs8TGwyl9G1qVwxOoe7UILFRKN7qiinDylgk.jpeg', 'public/dirisaksi/6qIFV1Dcv7uiTkPkeuri66JiPKQUhR585o6foNyy.jpeg', '2018-03-27 22:32:04', '2018-03-27 22:32:04'),
(21, 72, 34, 6, 34, 434, 'TPS-3', 4, 'Yazidudin', 'Link krobokan', '085738488365', 'public/ktpsaksi/oJnO6JeWPB91ml7jUVXmYMWOT0xwJzfxf0nORgQX.jpeg', 'public/dirisaksi/uctESzwupOBVlIVuLD6o860JZTkdYikjILXgmgNK.jpeg', '2018-03-27 22:36:56', '2018-03-27 22:36:56'),
(22, 72, 34, 6, 34, 434, 'TPS-5', 4, 'Mohamad Ali', 'Link pertukangan loloan barat', '082146273372', 'public/ktpsaksi/0r1AquhvCSd3fm0Y58H8euS83iwA2wySMXPwTFml.jpeg', 'public/dirisaksi/fQUJqvmGcax9n4kcH9nZuF270BVGyEyHclknust8.jpeg', '2018-03-27 22:39:24', '2018-03-27 22:39:24'),
(23, 72, 34, 6, 34, 434, 'TPS-6', 4, 'Mustain', 'Link pertukangan loloan barat', '087863261580', 'public/ktpsaksi/SnOyF0qUxMO1K7Nyl5DSfA0py05fSmSZOmZuzZ1K.jpeg', 'public/dirisaksi/8EqYTopdfeZyOWyCjha8vItVCObJ9tG8wZUiqcoe.jpeg', '2018-03-27 22:50:22', '2018-03-27 22:50:22'),
(24, 72, 34, 6, 34, 434, 'TPS-3', 4, 'Muh Bustanul Arifin', 'Link pertukangan loloan barat', '082147333010', 'public/ktpsaksi/eTMWXStOdJdF6TujTpKJMBdbfdXJzuHKmff6Ky7Y.jpeg', 'public/dirisaksi/saxxZVn1nHtzCjrDep9sLyI1nQM097DbsfOCuv4x.jpeg', '2018-03-27 23:09:22', '2018-03-27 23:09:22'),
(25, 2, 42, 7, 42, 507, 'TPS-4', 4, 'iwayan suastawa', 'br dinas duda', '082144556866', 'public/ktpsaksi/DtqN3HBo2BA304X2uPcclacTpRmhB3VnVj5r2auU.jpeg', 'public/dirisaksi/kLI7oTpPTDMamGPhPoNltipSvY2phNNA9hlwkJzO.jpeg', '2018-03-28 15:07:45', '2018-03-28 15:07:45'),
(26, 72, 34, 6, 34, 434, 'TPS-6', 4, 'Abdul Aziz', 'Link pertukangan loloan barat', '085399841015', 'public/ktpsaksi/WYpNCB4BHUtU8yMlj2JIfiBq599VqrH5h2ZFFgG0.jpeg', 'public/dirisaksi/JEI0MqJjsUEPKn8z9CPzJATUeclQMB9jcd8npBZv.jpeg', '2018-03-28 15:15:39', '2018-03-28 15:15:39'),
(27, 2, 42, 7, 42, 507, 'TPS-4', 4, 'imade herman', 'br dinas duda', '081999481154', 'public/ktpsaksi/Ju9DuxYPknH3848mGgRO1nCmdSRBpliWQRrKyw7z.jpeg', 'public/dirisaksi/qMdJMmjq8iqCbY0EgSsQgX19j9fALZzeBHv7I7zK.jpeg', '2018-03-28 15:18:21', '2018-03-28 15:18:21'),
(28, 76, 42, 7, 42, 508, 'TPS-1', 4, 'iwayan suka', 'br dinas putung', '082339196066', 'public/ktpsaksi/GnzkhW8IBiZuNK24m1ChlWsFpQIYA2yNuqXEeHhI.jpeg', 'public/dirisaksi/xOnlUte3GHf27jMFgpmYX2it1ECt3lzc6PikbiXY.jpeg', '2018-03-28 15:48:29', '2018-03-28 15:48:29'),
(29, 76, 42, 7, 42, 508, 'TPS-1', 4, 'igede abdi gunantara', 'br dinas putung', '082247432408', 'public/ktpsaksi/F4HwnUO4eWhgnuJJpUjFnQ4kgegqYWjj9N5Jagf8.jpeg', 'public/dirisaksi/W02Ns5iPnx3j4qlQbd5qdjNwLeVgvG6aLUTzXvxE.jpeg', '2018-03-28 15:50:53', '2018-03-28 15:50:53'),
(31, 2, 42, 7, 42, 507, 'TPS-8', 4, 'iwayan urip', 'br dinas pegubugan', '081237825271', 'public/ktpsaksi/phTSAETpaWFzU0OWhN7qagyIFP42gS8taCDMvCPH.jpeg', 'public/dirisaksi/oD2cXzkRmrVlUh2ezE4QRzmqEChEcaiL9KrzTm1e.jpeg', '2018-03-28 18:59:33', '2018-03-28 18:59:33'),
(32, 2, 42, 7, 42, 507, 'TPS-8', 4, 'i made puja astawa', 'br dinas pegubugan', '082237979739', 'public/ktpsaksi/ykjswr1WdinrALaAq8VN1UAo7PbsJofrvyu8MQco.jpeg', 'public/dirisaksi/YfqlXhoYR12pZD1YqleoviPZGpZ5FTTqbhZYYwTV.jpeg', '2018-03-28 19:39:52', '2018-03-28 19:39:52'),
(33, 2, 42, 7, 42, 507, 'TPS-3', 4, 'i komang sunarta', 'br dinas duda', '085829643756', 'public/ktpsaksi/qmm1a8l989jUuRNiIIgYbLBgFEKbT8LRVSlQ0noe.jpeg', 'public/dirisaksi/tWqZd3JHOWx2gmpVgKnTOrAnFZU7tUOgYQr6Ot6W.jpeg', '2018-03-28 20:14:29', '2018-03-28 20:14:29'),
(34, 2, 42, 7, 42, 507, 'TPS-1', 4, 'i wayan gede astika', 'br dinas duda', '085237355017', 'public/ktpsaksi/kpIs59iXQnFq5OpqSew1EhFczrDWIaFpbyLhns0c.jpeg', 'public/dirisaksi/82nLDkCIX6kqRML2PJnLpfcwBhaXPqLv5cUvqA8V.jpeg', '2018-03-28 20:19:53', '2018-03-28 20:19:53'),
(35, 2, 42, 7, 42, 507, 'TPS-5', 4, 'ni luh putu pitria wati', 'br dinas duda', '082266341544', 'public/ktpsaksi/xi7BKoUtdrFymYXzmcvB23Qq6uVKzQ146CFhIwmk.jpeg', 'public/dirisaksi/goAUOJrW564db5oBOFQsFTr89rkSQzlNIuSQLQYK.jpeg', '2018-03-28 20:27:29', '2018-03-28 20:27:29'),
(36, 76, 42, 7, 42, 508, 'TPS-7', 4, 'Ni ketut pebri yanti', 'Br.dinas duda', '085858516160', 'public/ktpsaksi/AcDwLOHwp9zgbnCuk9230eeXAyOIMUnBNS7fkS92.jpeg', 'public/dirisaksi/ZkIaF7j8aJ04f9pObT14W6nX5KfoosFG2ukFKIor.jpeg', '2018-03-28 22:44:20', '2018-03-28 22:44:20'),
(37, 76, 42, 7, 42, 508, 'TPS-7', 4, 'Ni ketut metriani', 'Br.dinas duda', '082114556883', 'public/ktpsaksi/FGRxvuA7VQ7uX0RikGBqTnQAT3CETszPh0fxM5JD.jpeg', 'public/dirisaksi/Rf5n4mq9U3cqtNfk3vDprjCDz7MkDXHYlsFtfsN0.jpeg', '2018-03-28 22:47:52', '2018-03-28 22:47:52'),
(38, 76, 42, 7, 42, 508, 'TPS-9', 4, 'I ketut sudana', 'Br.dinas pegubugan', '08124634685', 'public/ktpsaksi/T366bOy0HkoiXuDpeudb2MFDB1fULOqVrVCyeubb.jpeg', 'public/dirisaksi/eIOKXI5mQq1EowBl1EnT9Gr8120WQDjIFT9v18xJ.jpeg', '2018-03-29 08:46:57', '2018-03-29 08:46:57'),
(39, 70, 34, 6, 34, 429, 'TPS-12', 4, 'Ahmad Nurrahim', 'Banjar Pebuahan Desa Banyubiru', '085259056074', 'public/ktpsaksi/sxjriubUjl10oLxw2J0JfiGsVBo5asvBphm3218t.jpeg', 'public/dirisaksi/Z70VnjMoPOUw1KkqFT649XvgtcRlLzqDrgn1UwJU.jpeg', '2018-03-29 15:24:53', '2018-03-29 15:24:53'),
(40, 9, 57, 9, 57, 714, 'TPS-1', 4, 'I Gede Randika', 'Br. Tunjuk Tengah, Ds.Tunjuk Tabanan', '083119639016', 'public/ktpsaksi/NGAjkocfRq3hcs1Jd5bnctfxaWhTorK5kwH6bDtT.jpeg', 'public/dirisaksi/XF7BgJ9SGUuSPXTJIbSHBcvLe3BdNlWvIWydDWyW.jpeg', '2018-03-29 19:45:39', '2018-03-29 19:45:39'),
(41, 88, 34, 6, 34, 432, 'TPS-4', 4, 'I Komang Suarna', 'Banjar Munduk Desa Kaliakah', '087863215079', 'public/ktpsaksi/ldtTpMJCIeKyPbYrPOcTyZohKrHgjngbllh9fYpY.jpeg', 'public/dirisaksi/leDPbhsqrX2NAz7kRr5Xlmmwqk5TyurX5ksdVNH4.jpeg', '2018-03-29 20:08:15', '2018-03-29 20:08:15'),
(42, 89, 14, 3, 14, 205, 'TPS-1', 4, 'GEDE SIKI', 'BD. TEGAL BUNDER', '085333967906', 'public/ktpsaksi/VzeF35zmIGTxfYq5zS4xkftzrDGaoJRiQJAwVnzO.jpeg', 'public/dirisaksi/S0sOQGl9hHZFeUGV7lKf1V7VQwm6bcQi6uLK46HJ.jpeg', '2018-03-29 20:15:46', '2018-03-29 20:15:46'),
(43, 73, 34, 6, 34, 435, 'TPS-7', 4, 'Rukiyat', 'Banjar Ketapang Desa Pengambengan', '082340645849', 'public/ktpsaksi/rUNzoNl817LIJ1R5E2JOUbJU9geeNS8166UZa94X.jpeg', 'public/dirisaksi/irG41xFZlyh0P0yfsWXIkO2qKqKUhPj5Uc26tfJU.jpeg', '2018-03-29 20:27:49', '2018-03-29 20:27:49'),
(44, 89, 14, 3, 14, 205, 'TPS-1', 4, 'I NENGAH POGLAG', 'BD. TEGAL BUNDER', '082340226398', 'public/ktpsaksi/z06ljwkHLfmteazryqW4AGu9tdaYTQIn1k7CxGJL.jpeg', 'public/dirisaksi/iqmeIVnIXQoN7p31S7dNtBcDhOF1ItiIABKKTtnQ.jpeg', '2018-03-29 20:28:22', '2018-03-29 20:28:22'),
(45, 73, 34, 6, 34, 435, 'TPS-8', 4, 'Mas Hidayatus Sufiyan', 'Banjar Ketapang Desa Pengambengan', '082340337124', 'public/ktpsaksi/HLvBQbYjnrRu54VOTWHkXkodVlE8yXOEX832QOvJ.jpeg', 'public/dirisaksi/sfpz82xmknQ3FH5XWqofif3aPLnNiqjfhwCo6hCH.jpeg', '2018-03-29 20:38:17', '2018-03-29 20:38:17'),
(46, 89, 14, 3, 14, 205, 'TPS-4', 4, 'GEDE PARSA', 'BD.  SUMBERKLAMPOK', '081915657302', 'public/ktpsaksi/DiedwWx45C754bjH0GHfEUOAJY6D5fmSIck9oywY.jpeg', 'public/dirisaksi/lIxs73JW7LfqpD46XC5PiOSNd6DT4AfFpzRRGsbu.jpeg', '2018-03-29 20:45:42', '2018-03-29 20:45:42'),
(47, 73, 34, 6, 34, 435, 'TPS-9', 4, 'Akhmad Zarkasyih', 'Banjar Ketapang Desa Pengambengan', '083115593576', 'public/ktpsaksi/fMCeW0w7C3jS4uA1xgODOn5CnmWQTH3akss9wpco.jpeg', 'public/dirisaksi/RiDq1ocZvwr85g9Tr6CqngEO44Hj9FCCKazedVnq.jpeg', '2018-03-29 21:12:28', '2018-03-29 21:12:28'),
(48, 89, 14, 3, 14, 205, 'TPS-3', 4, 'KOMANG EDI SURIYAN ANTARA', 'BD. SUMBERBATOK', '085337582194', 'public/ktpsaksi/w62svSsuO7RkAvd4rUnJbhETr5S86NS24QqJNsHa.jpeg', 'public/dirisaksi/x5cJqDnxGfV5F6OHCT8AXqUbDaCnIOpBKL8opXvG.jpeg', '2018-03-29 21:18:39', '2018-03-29 21:18:39'),
(49, 76, 42, 7, 42, 508, 'TPS-6', 4, 'I komang adi sumerta', 'Br.dinas pegubugan', '085739315689', 'public/ktpsaksi/NQIpdXobluFHuHRb15TURPszkAZJcIR7wEM1qgtt.jpeg', 'public/dirisaksi/AA7WpTxBP6IkXzIAojQNDN6TAmMlx8F5sqP7O0c2.jpeg', '2018-03-29 22:21:37', '2018-03-29 22:21:37'),
(50, 73, 34, 6, 34, 435, 'TPS-9', 4, 'Siti Komaria', 'Banjar Ketapang Desa Pengambengan', '08563997137', 'public/ktpsaksi/EcECmUSbe6KM8IG5VM2qx43aSXs23Eqwq9jZK09X.jpeg', 'public/dirisaksi/EMKQGy0RkwUEar49QwSIN5P5QRPSeNSXnEKSFgVA.jpeg', '2018-03-30 01:28:26', '2018-03-30 01:28:26'),
(51, 73, 34, 6, 34, 435, 'TPS-6', 4, 'Moh Soleh', 'Banjar Ketapang Desa Pengambengan', '081237671007', 'public/ktpsaksi/uO7RTNa2zz8kA0qj0CGolQA24j7ZnNKC57wkx7FY.jpeg', 'public/dirisaksi/fiztgKhVea6Fh2fcjESiwEtRy3XO2JxJ7QBQnqX9.jpeg', '2018-03-30 01:30:26', '2018-03-30 01:30:26'),
(52, 73, 34, 6, 34, 435, 'TPS-7', 4, 'Eka Nur Jannah', 'Banjar Ketapang Desa Pengambengan', '087861149554', 'public/ktpsaksi/IGt6iw2IjBTsZwYRtMCCLIVKKEEA9bGIWZlWtQCb.jpeg', 'public/dirisaksi/MKGh1dl2a4bguylfcI6TPGEs7E7W1UoHmiI0mN7I.jpeg', '2018-03-30 12:50:10', '2018-03-30 12:50:10'),
(53, 96, 57, 9, 57, 715, 'TPS-1', 4, 'I Wayan Sulisman', 'Br.Wanasari Belodan, Ds.Wanasari, Tabanan', '087861824676', 'public/ktpsaksi/pfslCLVczqhQWAaTBo8jtqjqW8Hohgw8hjTQX5PS.jpeg', 'public/dirisaksi/2LN7Safvdi8X2iytb56psPjrI2J3zkI2KOr1WySL.jpeg', '2018-03-30 21:09:05', '2018-03-30 21:09:05'),
(54, 96, 57, 9, 57, 715, 'TPS-1', 4, 'I Made Lisnawan', 'Br.Wanasari Belodan, Ds.Wanasari, Tabanan', '082236094811', 'public/ktpsaksi/Lk8Oyep27tox371m6IRO1Uf2aJakBBuAAbHflzNo.jpeg', 'public/dirisaksi/ZpgzjPfb90Qva5GjeSFSDDIxxLvZSGYJvDvSYUM4.jpeg', '2018-03-30 21:17:46', '2018-03-30 21:17:46'),
(55, 96, 57, 9, 57, 715, 'TPS-2', 4, 'I Nengah Suamba', 'Br.Wanasari Belodan, Ds.Wanasari, Tabanan', '085238269990', 'public/ktpsaksi/zB5K1l0qgb5a6wACq5dFE342TKf7WVZy5fFOCPhI.jpeg', 'public/dirisaksi/wR5GpRWG8QykwgQu8UGqUdVpRayWP0i86aRIkHXp.jpeg', '2018-03-30 21:23:45', '2018-03-30 21:23:45'),
(56, 96, 57, 9, 57, 715, 'TPS-2', 4, 'I Wayan Aryatmika', 'Br.Wanasari Belodan, Ds.Wanasari, Tabanan', '085858720545', 'public/ktpsaksi/7Z6BMIMyW9uekJIBkibqqIFzuLKrWS2dJ3cBxEPk.jpeg', 'public/dirisaksi/i7lEn90TwloTKb7wGKS9ezNuK7i3BikFRFXlSlHE.jpeg', '2018-03-30 21:26:39', '2018-03-30 21:26:39'),
(57, 96, 57, 9, 57, 715, 'TPS-3', 4, 'I Made Adiguna', 'Br.Wanasari Belodan, Ds.Wanasari, Tabanan', '085738210664', 'public/ktpsaksi/q40VZIWNWCsu5s8ZCekva3UiBsQdn6ePUsshGtqU.jpeg', 'public/dirisaksi/DgtvRmOHXcctqsqGojfIR9mjyHqlcrakXJTaaYXX.jpeg', '2018-03-30 21:28:42', '2018-03-30 21:28:42'),
(58, 96, 57, 9, 57, 715, 'TPS-3', 4, 'I Wayan Arianto', 'Br.Wanasari Belodan, Ds.Wanasari, Tabanan', '085739740205', 'public/ktpsaksi/3jaVVTr9m1jszMikcGY3A7PPPNUP9Ug91ZaXpEi2.jpeg', 'public/dirisaksi/Ugr8wbbl55XT7DCwcDDMlYUQTEGp14QS9D5tssNc.jpeg', '2018-03-30 21:33:20', '2018-03-30 21:33:20'),
(59, 96, 57, 9, 57, 715, 'TPS-4', 4, 'I Made Suatra', 'Br.Wanasari Belodan, Ds.Wanasari, Tabanan', '081236317063', 'public/ktpsaksi/2RsFfPQXMG3AIQlxfP6ZIreB0iwabsuoUJ1UlOjv.jpeg', 'public/dirisaksi/PN6akwQE05xSE7wXfUOXnyyGr1vfb0QQOd6N8sKm.jpeg', '2018-03-30 21:35:25', '2018-03-30 21:35:25'),
(60, 96, 57, 9, 57, 715, 'TPS-4', 4, 'I Made Endi Armika', 'Br.Wanasari Belodan, Ds.Wanasari, Tabanan', '085737519450', 'public/ktpsaksi/UlbbP5FDgwRBQ3zcgA1ohiHsLCaBJzcLVnExsfCz.jpeg', 'public/dirisaksi/IAWc0XGTxZ8Tjl0joSVRYABsoVnU7Tr2D9gTyEt0.jpeg', '2018-03-30 21:37:49', '2018-03-30 21:37:49'),
(61, 96, 57, 9, 57, 715, 'TPS-5', 4, 'I Made Susanta', 'Br.Wanasari Belodan, Ds.Wanasari, Tabanan', '085792639826', 'public/ktpsaksi/fEVHfI8DCy0V1uu61vvh2NhPjs9njQqqBREKY0Us.jpeg', 'public/dirisaksi/38z2njWzuhO11nLylaa502rd2zdYIi5hMmmPsAA1.jpeg', '2018-03-30 21:41:06', '2018-03-30 21:41:06'),
(62, 96, 57, 9, 57, 715, 'TPS-5', 4, 'I Nyoman Gama Sujaya', 'Br.Wanasari Belodan, Ds.Wanasari, Tabanan', '085737186186', 'public/ktpsaksi/H0Ozq1IcK5YmBY7PSLPH8adeUV8AB3Q4jjy1BaLw.jpeg', 'public/dirisaksi/UFuCkCTLP6kIhpNr7hTlkqJKAr1ARCuHTKrNiBnM.jpeg', '2018-03-30 21:47:35', '2018-03-30 21:47:35'),
(63, 96, 57, 9, 57, 715, 'TPS-6', 4, 'I Ketut Yatim', 'Br.Wanasari Belodan, Ds.Wanasari, Tabanan', '082339247140', 'public/ktpsaksi/WbqnoH73Z34qalEhsfcRNLvLmlL2iJlr6nZW4v8D.jpeg', 'public/dirisaksi/DISJwcwcYZ9NFgKf9zO5zp8Ek5Gi09WAoAYjqybu.jpeg', '2018-03-30 21:49:10', '2018-03-30 21:49:10'),
(64, 89, 14, 3, 14, 205, 'TPS-2', 4, 'KOMANG ARNAMA YASA', 'BD.  SUMBERKLAMPOK', '083831761439', 'public/ktpsaksi/yuXkM70vZGYlLzuprTIe67ZNumobZReyQcyKpJd9.jpeg', 'public/dirisaksi/ZX9FEbPv47HyUCvZb5OXgyCS20b975dgpsFb8c5X.jpeg', '2018-03-30 22:36:03', '2018-03-30 22:36:03'),
(65, 89, 14, 3, 14, 205, 'TPS-2', 4, 'KOMANG LODRA', 'BD.  SUMBERKLAMPOK', '085237270965', 'public/ktpsaksi/fqppf7JwAOAfA9FUakCHC253slnKmO0oDkvuwyfz.jpeg', 'public/dirisaksi/dcWz18gcLMMyjaMKaVlMl4Tuv8DpcVTZDKCr9m0B.jpeg', '2018-03-30 22:38:09', '2018-03-30 22:38:09'),
(66, 89, 14, 3, 14, 205, 'TPS-3', 4, 'I NYOMAN SUIDRA', 'BD. SUMBERBATOK', '082340779539', 'public/ktpsaksi/pEkxgTYJLHSJDEsgxXqckkgWMY4q9SGeZ5hpVxVq.jpeg', 'public/dirisaksi/GaBsLJMXgMZuDTZluLUsUI6XChihhk9ckbfjm0XS.jpeg', '2018-03-30 22:40:50', '2018-03-30 22:40:50'),
(67, 9, 57, 9, 57, 714, 'TPS-1', 4, 'I Gede Suryantha', 'Br. Legung, ds.Tunjuk, Tabanan', '085738895022', 'public/ktpsaksi/jdrEZLi9XKzkqzJrnuuEONLXbIOY36jtwVbjAc3S.jpeg', 'public/dirisaksi/zgFR37rqOgS3uSnLhEXvALu1z6Am1oc7rIjVTyIH.jpeg', '2018-03-31 08:09:00', '2018-03-31 08:09:00'),
(68, 2, 42, 7, 42, 507, 'TPS-2', 4, 'I wayan gede wardana', 'br dinas duda', '082247637110', 'public/ktpsaksi/C1GE0prFKI5zZpVEgH0S0K5bOCke9ivDt0Q91FXA.jpeg', 'public/dirisaksi/NrC761mUW2QJ332gaJ1vswHt01IqrSctGk7DJw2N.jpeg', '2018-03-31 17:30:32', '2018-03-31 17:30:32'),
(69, 74, 34, 6, 34, 430, 'TPS-10', 4, 'I Komang Sukarma', 'Banjar Pengajaran Kaler Desa Berambang', '087861521454', 'public/ktpsaksi/85jCvRTKLgxvm2VDvh564Jws77oY7sq4cBnkOkAZ.jpeg', 'public/dirisaksi/gUpol7vduizn08oYA6YGTSFr028PtCSLDYNBCTEA.jpeg', '2018-03-31 22:58:12', '2018-03-31 22:58:12'),
(70, 74, 34, 6, 34, 430, 'TPS-11', 4, 'I Ketut Madia', 'Banjar Pengajaran Kaler Desa Berambang', '087761431917', 'public/ktpsaksi/hA5GU9orHuTS7Xsj7548gBZWTbq6zCR38fWNlKNm.jpeg', 'public/dirisaksi/IIAt93tsdaYb527S9x1VtbAFrnI8qJh9ahC5rckJ.jpeg', '2018-03-31 23:02:14', '2018-03-31 23:02:14'),
(71, 71, 34, 6, 34, 426, 'TPS-12', 4, 'I Gusti Kade Satriana', 'Banjar Kebon Desa Baler bale Agung', '081999501243', 'public/ktpsaksi/cQz5cBLMHLYym3lpXKVJRcNkFBItk1OIku6VLuMJ.jpeg', 'public/dirisaksi/1weI8Vgno70CapjIWu11H8V9HZfglUwwgo9hg28v.jpeg', '2018-03-31 23:08:51', '2018-03-31 23:08:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamus`
--

CREATE TABLE `tamus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tamus`
--

INSERT INTO `tamus` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tamu', 'tamu', '$2y$10$bIBygGIKO/3.w.wndsLztOoH1RoA.qdVQ2sS6k2n53pP9ggpcDKim', NULL, '2018-03-20 01:21:27', '2018-03-20 01:21:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kabupatenkota`
--

CREATE TABLE `tb_kabupatenkota` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kabupatenkota` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_kabupatenkota`
--

INSERT INTO `tb_kabupatenkota` (`id`, `nama_kabupatenkota`) VALUES
(1, 'Badung'),
(2, 'Bangli'),
(3, 'Buleleng'),
(4, 'Denpasar'),
(5, 'Gianyar'),
(6, 'Jembrana'),
(7, 'Karangasem'),
(8, 'Klungkung'),
(9, 'Tabanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kabupatenkota` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id`, `nama_kecamatan`, `id_kabupatenkota`) VALUES
(1, 'Abiansemal', 1),
(2, 'Kuta', 1),
(3, 'Kuta Selatan', 1),
(4, 'Kuta Utara', 1),
(5, 'Mengwi', 1),
(6, 'Petang', 1),
(7, 'Bangli', 2),
(8, 'Kintamani', 2),
(9, 'Susut', 2),
(10, 'Tembuku', 2),
(11, 'Banjar', 3),
(12, 'Buleleng', 3),
(13, 'Busungbiu', 3),
(14, 'Gerokgak', 3),
(15, 'Kubutambahan', 3),
(16, 'Sawan', 3),
(17, 'Seririt', 3),
(18, 'Sukasada', 3),
(19, 'Tejakula', 3),
(20, 'Denpasar Barat', 4),
(21, 'Denpasar Selatan', 4),
(22, 'Denpasar Timur', 4),
(23, 'Denpasar Utara', 4),
(24, 'Blahbatuh', 5),
(25, 'Gianyar', 5),
(26, 'Payangan', 5),
(27, 'Sukawati', 5),
(28, 'Tampak Siring', 5),
(29, 'Tegallalang', 5),
(30, 'Ubud', 5),
(31, 'Jembrana', 6),
(32, 'Melaya', 6),
(33, 'Mendoyo', 6),
(34, 'Negara', 6),
(35, 'Pekutatan', 6),
(36, 'Abang', 7),
(37, 'Bebandem', 7),
(38, 'Karang Asem', 7),
(39, 'Kubu', 7),
(40, 'Manggis', 7),
(41, 'Rendang', 7),
(42, 'Selat', 7),
(43, 'Sidemen', 7),
(44, 'Banjarangkan', 8),
(45, 'Dawan', 8),
(46, 'Klungkung', 8),
(47, 'Nusapenida', 8),
(48, 'Baturiti', 9),
(49, 'Kediri', 9),
(50, 'Kerambitan', 9),
(51, 'Marga', 9),
(52, 'Penebel', 9),
(53, 'Pupuan', 9),
(54, 'Selemadeg Barat', 9),
(55, 'Selemadeg Timur', 9),
(56, 'Selemadeg', 9),
(57, 'Tabanan', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelurahandesa`
--

CREATE TABLE `tb_kelurahandesa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kelurahandesa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kecamatan` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_kelurahandesa`
--

INSERT INTO `tb_kelurahandesa` (`id`, `nama_kelurahandesa`, `id_kecamatan`) VALUES
(1, 'Abiansemal', 1),
(2, 'Angantaka', 1),
(3, 'Ayunan', 1),
(4, 'Blahkiuh', 1),
(5, 'Bongkasa', 1),
(6, 'Bongkasa Pertiwi', 1),
(7, 'Darmasaba', 1),
(8, 'Dauh Yeh Cani', 1),
(9, 'Jagapati', 1),
(10, 'Mambal', 1),
(11, 'Mekar Bhuwana', 1),
(12, 'Punggul', 1),
(13, 'Sangeh', 1),
(14, 'Sedang', 1),
(15, 'Selat', 1),
(16, 'Sibang Gede', 1),
(17, 'Sibang Kaja', 1),
(18, 'Taman', 1),
(19, 'Kedonganan', 2),
(20, 'Kuta', 2),
(21, 'Legian', 2),
(22, 'Seminyak', 2),
(23, 'Tuban', 2),
(24, 'Benoa', 3),
(25, 'Jimbaran', 3),
(26, 'Kutuh', 3),
(27, 'Pecatu', 3),
(28, 'Tanjung Benoa', 3),
(29, 'Ungasan', 3),
(30, 'Canggu', 4),
(31, 'Dalung', 4),
(32, 'Kerobokan', 4),
(33, 'Kerobokan Kaja', 4),
(34, 'Kerobokan Kelod', 4),
(35, 'Tibubeneng', 4),
(36, 'Abianbase', 5),
(37, 'Baha', 5),
(38, 'Buduk', 5),
(39, 'Cemagi', 5),
(40, 'Gulingan', 5),
(41, 'Kapal', 5),
(42, 'Kekeran', 5),
(43, 'Kuwum', 5),
(44, 'Lukluk', 5),
(45, 'Mengwi', 5),
(46, 'Mengwitani', 5),
(47, 'Munggu', 5),
(48, 'Penarungan', 5),
(49, 'Pererenan', 5),
(50, 'Sading', 5),
(51, 'Sembung', 5),
(52, 'Sempidi', 5),
(53, 'Sobangan', 5),
(54, 'Tumbak Bayuh', 5),
(55, 'Werdi Bhuawana', 5),
(56, 'Belok', 6),
(57, 'Carangsari', 6),
(58, 'Getasan', 6),
(59, 'Pangsan', 6),
(60, 'Pelaga', 6),
(61, 'Petang', 6),
(62, 'Sulangai', 6),
(63, 'Bebalang', 7),
(64, 'Bunutin', 7),
(65, 'Cempaga', 7),
(66, 'Kawan', 7),
(67, 'Kayubihi', 7),
(68, 'Kubu', 7),
(69, 'Landih', 7),
(70, 'Pengotan', 7),
(71, 'Taman Bali', 7),
(72, 'Abang Songan', 8),
(73, 'Abuan', 8),
(74, 'Awan', 8),
(75, 'Bantang', 8),
(76, 'Banua', 8),
(77, 'Batu Dinding', 8),
(78, 'Batukaang', 8),
(79, 'Batur Selatan', 8),
(80, 'Batur Tengah', 8),
(81, 'Batur Utara', 8),
(82, 'Bayungcerik', 8),
(83, 'Bayunggede', 8),
(84, 'Belancan', 8),
(85, 'Belandingan', 8),
(86, 'Belanga', 8),
(87, 'Belantih', 8),
(88, 'Binyan', 8),
(89, 'Bonyoh', 8),
(90, 'Buahan', 8),
(91, 'Bunutin', 8),
(92, 'Catur', 8),
(93, 'Daup', 8),
(94, 'Dausa', 8),
(95, 'Gunungbau', 8),
(96, 'Katung', 8),
(97, 'Kedisan', 8),
(98, 'Kintamani', 8),
(99, 'Kutuh', 8),
(100, 'Langgahan', 8),
(101, 'Lembean', 8),
(102, 'Mangguh', 8),
(103, 'Manikliyu', 8),
(104, 'Mengani', 8),
(105, 'Pengejaran', 8),
(106, 'Pinggan', 8),
(107, 'Satra', 8),
(108, 'Sekaan', 8),
(109, 'Sekardadi', 8),
(110, 'Selulung', 8),
(111, 'Serahi', 8),
(112, 'Siyakin', 8),
(113, 'Songan A', 8),
(114, 'Songan B', 8),
(115, 'Subaya', 8),
(116, 'Sukawana', 8),
(117, 'Suter', 8),
(118, 'Terunyan', 8),
(119, 'Ulian', 8),
(120, 'Abuan', 9),
(121, 'Apuan', 9),
(122, 'Demulih', 9),
(123, 'Pengiangan', 9),
(124, 'Penglumbaran', 9),
(125, 'Selat', 9),
(126, 'Sulahan', 9),
(127, 'Susut', 9),
(128, 'Tiga', 9),
(129, 'Bangbang', 10),
(130, 'Jehem', 10),
(131, 'Peninjoan', 10),
(132, 'Tembuku', 10),
(133, 'Undisan', 10),
(134, 'Yangapi', 10),
(135, 'Banjar', 11),
(136, 'Banjar Tegeha', 11),
(137, 'Banyuatis', 11),
(138, 'Banyusri', 11),
(139, 'Cempaga', 11),
(140, 'Dencarik', 11),
(141, 'Gesing', 11),
(142, 'Gobleg', 11),
(143, 'Kaliasem', 11),
(144, 'Kayuputih', 11),
(145, 'Munduk', 11),
(146, 'Pedawa', 11),
(147, 'Sidetapa', 11),
(148, 'Tampekan', 11),
(149, 'Temukus', 11),
(150, 'Tigawasa', 11),
(151, 'Tirtasari', 11),
(152, 'Alasangker', 12),
(153, 'Anturan', 12),
(154, 'Astina', 12),
(155, 'Banjar Bali', 12),
(156, 'Banjar Jawa', 12),
(157, 'Banjar Tegal', 12),
(158, 'Banyuasri', 12),
(159, 'Banyuning', 12),
(160, 'Beratan', 12),
(161, 'Bakti Seraga', 12),
(162, 'Jinengdalem', 12),
(163, 'Kalibukbuk', 12),
(164, 'Kaliuntu', 12),
(165, 'Kampung Anyar', 12),
(166, 'Kampung Baru', 12),
(167, 'Kampung Bugis', 12),
(168, 'Kampung Kajanan', 12),
(169, 'Kampung Singaraja', 12),
(170, 'Kendran', 12),
(171, 'Liligundi', 12),
(172, 'Nagasepaha', 12),
(173, 'Paket Agung', 12),
(174, 'Pemaron', 12),
(175, 'Penarukan', 12),
(176, 'Penglatan', 12),
(177, 'Petandakan', 12),
(178, 'Poh Bergong', 12),
(179, 'Sari Mekar', 12),
(180, 'Tukadmungga', 12),
(181, 'Bengkel', 13),
(182, 'Bongancina', 13),
(183, 'Busungbiu', 13),
(184, 'Kedis', 13),
(185, 'Kekeran', 13),
(186, 'Pelapuan', 13),
(187, 'Pucaksari', 13),
(188, 'Sepang', 13),
(189, 'Sepang Kelod', 13),
(190, 'Subuk', 13),
(191, 'Telaga', 13),
(192, 'Tista', 13),
(193, 'Titab', 13),
(194, 'Umejero', 13),
(195, 'Banyupoh', 14),
(196, 'Celukan Bawang', 14),
(197, 'Gerokgak', 14),
(198, 'Musi', 14),
(199, 'Patas', 14),
(200, 'Pejarakan', 14),
(201, 'Pemuteran', 14),
(202, 'Pengulon', 14),
(203, 'Penyabangan', 14),
(204, 'Sanggalangit', 14),
(205, 'Sumber Klampok', 14),
(206, 'Sumberkima', 14),
(207, 'Tinga Tinga', 14),
(208, 'Tukad Sumaga', 14),
(209, 'Bengkala', 15),
(210, 'Bila', 15),
(211, 'Bontihing', 15),
(212, 'Bukti', 15),
(213, 'Bulian', 15),
(214, 'Depeha', 15),
(215, 'Kubutambahan', 15),
(216, 'Mengening', 15),
(217, 'Pakisan', 15),
(218, 'Tajun', 15),
(219, 'Tambakan', 15),
(220, 'Tamblang', 15),
(221, 'Tunjung', 15),
(222, 'Bebetin', 16),
(223, 'Bungkulan', 16),
(224, 'Galungan', 16),
(225, 'Giri Emas', 16),
(226, 'Jagaraga', 16),
(227, 'Kerobokan', 16),
(228, 'Lemukih', 16),
(229, 'Menyali', 16),
(230, 'Sangsit', 16),
(231, 'Sawan', 16),
(232, 'Sekumpul', 16),
(233, 'Sinabun', 16),
(234, 'Sudaji', 16),
(235, 'Suwug', 16),
(236, 'Banjar Asem', 17),
(237, 'Bestala', 17),
(238, 'Bubunan', 17),
(239, 'Gunungsari', 17),
(240, 'Joanyar', 17),
(241, 'Kalianget', 17),
(242, 'Kalisada', 17),
(243, 'Lokapaksa', 17),
(244, 'Mayong', 17),
(245, 'Munduk Bestala', 17),
(246, 'Pangkungparuk', 17),
(247, 'Patemon', 17),
(248, 'Pengastulan', 17),
(249, 'Rangdu', 17),
(250, 'Ringdikit', 17),
(251, 'Seririt', 17),
(252, 'Sulanyah', 17),
(253, 'Tangguwisia', 17),
(254, 'Ularan', 17),
(255, 'Umeanyar', 17),
(256, 'Unggahan', 17),
(257, 'Ambengan', 18),
(258, 'Gitgit', 18),
(259, 'Kayuputih', 18),
(260, 'Padangbulia', 18),
(261, 'Pancasari', 18),
(262, 'Panji', 18),
(263, 'Panji Anom', 18),
(264, 'Pegadungan', 18),
(265, 'Pegayaman', 18),
(266, 'Sambangan', 18),
(267, 'Selat', 18),
(268, 'Silangjana', 18),
(269, 'Sukasada', 18),
(270, 'Tegal Linggah', 18),
(271, 'Wanagiri', 18),
(272, 'Bondalem', 19),
(273, 'Julah', 19),
(274, 'Les', 19),
(275, 'Madenan', 19),
(276, 'Pacung', 19),
(277, 'Penuktukan', 19),
(278, 'Sambirenteng', 19),
(279, 'Sembiran', 19),
(280, 'Tejakula', 19),
(281, 'Tembok', 19),
(282, 'Dauh Puri', 20),
(283, 'Dauh Puri Kangin', 20),
(284, 'Dauh Puri Kauh', 20),
(285, 'Dauh Puri Kelod', 20),
(286, 'Padangsambian', 20),
(287, 'Padangsambian Kaja', 20),
(288, 'Padangsambian Kelod', 20),
(289, 'Pemecutan', 20),
(290, 'Pemecutan Kelod', 20),
(291, 'Tegal Harum', 20),
(292, 'Tegal Kertha', 20),
(293, 'Panjer', 21),
(294, 'Pedungan', 21),
(295, 'Pemogan', 21),
(296, 'Renon', 21),
(297, 'Sanur', 21),
(298, 'Sanur Kaja', 21),
(299, 'Sanur Kauh', 21),
(300, 'Serangan', 21),
(301, 'Sesetan', 21),
(302, 'Sidakarya', 21),
(303, 'Dangin Puri', 22),
(304, 'Dangin Puri Klod', 22),
(305, 'Kesiman', 22),
(306, 'Kesiman Kertalangu', 22),
(307, 'Kesiman Petilan', 22),
(308, 'Penatih', 22),
(309, 'Penatih Dangin Puri', 22),
(310, 'Sumerta', 22),
(311, 'Sumerta Kaja', 22),
(312, 'Sumerta Kauh', 22),
(313, 'Sumerta Kelod', 22),
(314, 'Dangin Puri Kaja', 23),
(315, 'Dangin Puri Kangin', 23),
(316, 'Dangin Puri Kauh', 23),
(317, 'Dauh Puri Kaja', 23),
(318, 'Peguyangan', 23),
(319, 'Peguyangan Kaja', 23),
(320, 'Peguyangan Kangin', 23),
(321, 'Pemecutan Kaja', 23),
(322, 'Tonja', 23),
(323, 'Ubung', 23),
(324, 'Ubung Kaja', 23),
(325, 'Bedulu', 24),
(326, 'Belega', 24),
(327, 'Blahbatuh', 24),
(328, 'Bona', 24),
(329, 'Buruan', 24),
(330, 'Keramas', 24),
(331, 'Medahan', 24),
(332, 'Pering', 24),
(333, 'Saba', 24),
(334, 'Abianbase', 25),
(335, 'Bakbakan', 25),
(336, 'Beng', 25),
(337, 'Bitera', 25),
(338, 'Gianyar', 25),
(339, 'Lebih', 25),
(340, 'Petak', 25),
(341, 'Petak Kaja', 25),
(342, 'Samplangan', 25),
(343, 'Serongga', 25),
(344, 'Siangan', 25),
(345, 'Sidan', 25),
(346, 'Sumita', 25),
(347, 'Suwat', 25),
(348, 'Tegal Tugu', 25),
(349, 'Temesi', 25),
(350, 'Tulikup', 25),
(351, 'Bresela', 26),
(352, 'Buahan', 26),
(353, 'Buahan Kaja', 26),
(354, 'Bukian', 26),
(355, 'Kelusa', 26),
(356, 'Kerta', 26),
(357, 'Melinggih', 26),
(358, 'Melinggih Kelod', 26),
(359, 'Puhu', 26),
(360, 'Batuan', 27),
(361, 'Batuan Kaler', 27),
(362, 'Batubulan', 27),
(363, 'Batubulan Kangin', 27),
(364, 'Celuk', 27),
(365, 'Guwang', 27),
(366, 'Kemenuh', 27),
(367, 'Ketewel', 27),
(368, 'Singapadu', 27),
(369, 'Singapadu Kaler', 27),
(370, 'Singapadu Tengah', 27),
(371, 'Sukawati', 27),
(372, 'Manukaya', 28),
(373, 'Pejeng', 28),
(374, 'Pejeng Kaja', 28),
(375, 'Pejeng Kangin', 28),
(376, 'Pejeng Kawan', 28),
(377, 'Pejeng Kelod', 28),
(378, 'Sanding', 28),
(379, 'Tampaksiring', 28),
(380, 'Kedisan', 29),
(381, 'Keliki', 29),
(382, 'Kenderan', 29),
(383, 'Pupuan', 29),
(384, 'Sebatu', 29),
(385, 'Taro', 29),
(386, 'Tegallalang', 29),
(387, 'Kedewatan', 30),
(388, 'Lodtunduh', 30),
(389, 'Mas', 30),
(390, 'Peliatan', 30),
(391, 'Petulu', 30),
(392, 'Sayan', 30),
(393, 'Singakerta', 30),
(394, 'Ubud', 30),
(395, 'Air Kuning', 31),
(396, 'Batuagung', 31),
(397, 'Budeng', 31),
(398, 'Dangin Tukadaya', 31),
(399, 'Dauhwaru', 31),
(400, 'Loloan Timur', 31),
(401, 'Pendem', 31),
(402, 'Perancak', 31),
(403, 'Sangkaragung', 31),
(404, 'Yeh Kuning', 31),
(405, 'Blimbingsari', 32),
(406, 'Candikusuma', 32),
(407, 'Ekasari', 32),
(408, 'Gilimanuk', 32),
(409, 'Manistutu', 32),
(410, 'Melaya', 32),
(411, 'Nusa Sari', 32),
(412, 'Tukadaya', 32),
(413, 'Tuwed', 32),
(414, 'Warnasari', 32),
(415, 'Delod Berawah', 33),
(416, 'Mendoyo Dangin Tukad', 33),
(417, 'Mendoyo Dauh Tukad', 33),
(418, 'Penyaringan', 33),
(419, 'Pergung', 33),
(420, 'Pohsanten', 33),
(421, 'Tegal Cangkring', 33),
(422, 'Yeh Embang', 33),
(423, 'Yeh Embang Kangin', 33),
(424, 'Yeh Embang Kauh', 33),
(425, 'Yeh Sumbul', 33),
(426, 'Baler Bale Agung', 34),
(427, 'Baluk', 34),
(428, 'Banjar Tengah', 34),
(429, 'Banyubiru', 34),
(430, 'Berangbang', 34),
(431, 'Cupel', 34),
(432, 'Kaliakah', 34),
(433, 'Lelateng', 34),
(434, 'Loloan Barat', 34),
(435, 'Pengambengan', 34),
(436, 'Tegal Badeng Barat', 34),
(437, 'Tegal Badeng Timur', 34),
(438, 'Asahduren', 35),
(439, 'Gumbrih', 35),
(440, 'Manggissari', 35),
(441, 'Medewi', 35),
(442, 'Pangyangan', 35),
(443, 'Pekutatan', 35),
(444, 'Pengeragoan', 35),
(445, 'Pulukan', 35),
(446, 'Ababi', 36),
(447, 'Abang', 36),
(448, 'Bunutan', 36),
(449, 'Culik', 36),
(450, 'Datah', 36),
(451, 'Kerta Mandala', 36),
(452, 'Kesimpar', 36),
(453, 'Laba Sari', 36),
(454, 'Nawakerti', 36),
(455, 'Pidpid', 36),
(456, 'Purwakerti', 36),
(457, 'Tista', 36),
(458, 'Tiyingtali', 36),
(459, 'Tri Buana', 36),
(460, 'Bebandem', 37),
(461, 'Buana Giri', 37),
(462, 'Budakeling', 37),
(463, 'Bungaya', 37),
(464, 'Bungaya Kangin', 37),
(465, 'Jungutan', 37),
(466, 'Macang', 37),
(467, 'Sibetan', 37),
(468, 'Bugbug', 38),
(469, 'Bukit', 38),
(470, 'Karangasem', 38),
(471, 'Padang Kerta', 38),
(472, 'Pertima', 38),
(473, 'Seraya Barat', 38),
(474, 'Seraya Tengah', 38),
(475, 'Seraya Timur', 38),
(476, 'Subagan', 38),
(477, 'Tegallinggah', 38),
(478, 'Tumbu', 38),
(479, 'Ban', 39),
(480, 'Batu Ringgit', 39),
(481, 'Dukuh', 39),
(482, 'Kubu', 39),
(483, 'Sukadana', 39),
(484, 'Tianyar Barat', 39),
(485, 'Tianyar Tengah', 39),
(486, 'Tianyar Timur', 39),
(487, 'Tulamben', 39),
(488, 'Antiga', 40),
(489, 'Antiga Kelod', 40),
(490, 'Gegelang', 40),
(491, 'Manggis', 40),
(492, 'Ngis', 40),
(493, 'Nyuh Tebel', 40),
(494, 'Padangbai', 40),
(495, 'Pesedahan', 40),
(496, 'Selumbung', 40),
(497, 'Sengkidu', 40),
(498, 'Tenganan', 40),
(499, 'Ulakan', 40),
(500, 'Besakih', 41),
(501, 'Menanga', 41),
(502, 'Nongan', 41),
(503, 'Pempatan', 41),
(504, 'Pesaban', 41),
(505, 'Rendang', 41),
(506, 'Amerta Bhuana', 42),
(507, 'Duda', 42),
(508, 'Duda Timur', 42),
(509, 'Duda Utara', 42),
(510, 'Muncan', 42),
(511, 'Pering Sari', 42),
(512, 'Sebudi', 42),
(513, 'Selat', 42),
(514, 'Kertha Buana', 43),
(515, 'Lokasari', 43),
(516, 'Sangkan Gunung', 43),
(517, 'Sidemen', 43),
(518, 'Sindu Wati', 43),
(519, 'Talibeng', 43),
(520, 'Tangkup', 43),
(521, 'Telaga Tawang', 43),
(522, 'Tri Eka Buana', 43),
(523, 'Wisma Kerta', 43),
(524, 'Aan', 44),
(525, 'Bakas', 44),
(526, 'Banjarangkan', 44),
(527, 'Bungbungan', 44),
(528, 'Getakan', 44),
(529, 'Negari', 44),
(530, 'Nyalian', 44),
(531, 'Nyanglan', 44),
(532, 'Takmung', 44),
(533, 'Tihingan', 44),
(534, 'Timuhun', 44),
(535, 'Tohpati', 44),
(536, 'Tusan', 44),
(537, 'Besan', 45),
(538, 'Dawan Kaler', 45),
(539, 'Dawan Klod', 45),
(540, 'Gunaksa', 45),
(541, 'Kampung Kusamba', 45),
(542, 'Kusamba', 45),
(543, 'Paksebali', 45),
(544, 'Pesinggahan', 45),
(545, 'Pikat', 45),
(546, 'Sampalan Klod', 45),
(547, 'Sampalan Tengah', 45),
(548, 'Sulang', 45),
(549, 'Akah', 46),
(550, 'Gelgel', 46),
(551, 'Jumpai', 46),
(552, 'Kamasan', 46),
(553, 'Kampung Gelgel', 46),
(554, 'Manduang', 46),
(555, 'Satra', 46),
(556, 'Selat', 46),
(557, 'Selisihan', 46),
(558, 'Semarapura Kaja', 46),
(559, 'Semarapura Kangin', 46),
(560, 'Semarapura Kauh', 46),
(561, 'Semarapura Klod Kangin', 46),
(562, 'Semarapura Kelod', 46),
(563, 'Semarapura Tengah', 46),
(564, 'Tangkas', 46),
(565, 'Tegak', 46),
(566, 'Tojan', 46),
(567, 'Batukandik', 47),
(568, 'Batumadeg', 47),
(569, 'Batununggul', 47),
(570, 'Bunga Mekar', 47),
(571, 'Jungutbatu', 47),
(572, 'Kampung Toyapakeh', 47),
(573, 'Klumpu', 47),
(574, 'Kutampi', 47),
(575, 'Kutampi Kaler', 47),
(576, 'Lembongan', 47),
(577, 'Ped', 47),
(578, 'Pejukutan', 47),
(579, 'Sakti', 47),
(580, 'Sekartaji', 47),
(581, 'Suana', 47),
(582, 'Tanglad', 47),
(583, 'Angseri', 48),
(584, 'Antapan', 48),
(585, 'Apuan', 48),
(586, 'Bangli', 48),
(587, 'Batunya', 48),
(588, 'Baturiti', 48),
(589, 'Candikuning', 48),
(590, 'Luwus', 48),
(591, 'Mekarsari', 48),
(592, 'Perean', 48),
(593, 'Perean Kangin', 48),
(594, 'Perean Tengah', 48),
(595, 'Abian Tuwung', 49),
(596, 'Banjar Anyar', 49),
(597, 'Belalang', 49),
(598, 'Bengkel Sari', 49),
(599, 'Beraban', 49),
(600, 'Buwit', 49),
(601, 'Cepaka', 49),
(602, 'Kaba - Kaba', 49),
(603, 'Kediri', 49),
(604, 'Nyambu', 49),
(605, 'Nyitdah', 49),
(606, 'Pandak Bandung', 49),
(607, 'Pandak Gede', 49),
(608, 'Pangkuang Tibah', 49),
(609, 'Pejaten', 49),
(610, 'Batuaji', 50),
(611, 'Baturiti', 50),
(612, 'Belumbang', 50),
(613, 'Kelating', 50),
(614, 'Kerambitan', 50),
(615, 'Kesiut', 50),
(616, 'Kukuh', 50),
(617, 'Meliling', 50),
(618, 'Pangkung Karung', 50),
(619, 'Penarukan', 50),
(620, 'Samsam', 50),
(621, 'Sembung Gede', 50),
(622, 'Tibubiyu', 50),
(623, 'Timpag', 50),
(624, 'Tista', 50),
(625, 'Baru', 51),
(626, 'Batannyuh', 51),
(627, 'Beringkit', 51),
(628, 'Cau Belayu', 51),
(629, 'Geluntung', 51),
(630, 'Kukuh', 51),
(631, 'Kuwum', 51),
(632, 'Marga', 51),
(633, 'Marga Dajan Puri', 51),
(634, 'Marga Dauh Puri', 51),
(635, 'Payangan', 51),
(636, 'Peken', 51),
(637, 'Petiga', 51),
(638, 'Selanbawak', 51),
(639, 'Tegaljadi', 51),
(640, 'Tua', 51),
(641, 'Babahan', 52),
(642, 'Biaung', 52),
(643, 'Buruan', 52),
(644, 'Jatiluwin', 52),
(645, 'Jegu', 52),
(646, 'Mengeste', 52),
(647, 'Penatahan', 52),
(648, 'Penebel', 52),
(649, 'Pesagi', 52),
(650, 'Pitra', 52),
(651, 'Rejasa', 52),
(652, 'Riang Gede', 52),
(653, 'Sangketan', 52),
(654, 'Senganan', 52),
(655, 'Tajen', 52),
(656, 'Tegalinggah', 52),
(657, 'Tengkudak', 52),
(658, 'Wongaya Gede', 52),
(659, 'Bantiran', 53),
(660, 'Batungsel', 53),
(661, 'Belatungan', 53),
(662, 'Belimbing', 53),
(663, 'Jelijih Punggang', 53),
(664, 'Karya Sari', 53),
(665, 'Kebon Padangan', 53),
(666, 'Munduk Temu', 53),
(667, 'Padangan', 53),
(668, 'Pajahan', 53),
(669, 'Pujungan', 53),
(670, 'Pupuan', 53),
(671, 'Sai', 53),
(672, 'Sanda', 53),
(673, 'Angkah', 54),
(674, 'Antosari', 54),
(675, 'Bengkel Sari', 54),
(676, 'Lalang Linggah', 54),
(677, 'Lumbung', 54),
(678, 'Lumbung Kauh', 54),
(679, 'Mundeh', 54),
(680, 'Mundeh Kangin', 54),
(681, 'Mundeh Kauh', 54),
(682, 'Selabih', 54),
(683, 'Tiying Gading', 54),
(684, 'Bantas', 55),
(685, 'Beraban', 55),
(686, 'Dalang', 55),
(687, 'Gadung Sari', 55),
(688, 'Gadungan', 55),
(689, 'Gunung Salak', 55),
(690, 'Mambang', 55),
(691, 'Megati', 55),
(692, 'Tangguntiti', 55),
(693, 'Tegal Mengkeb', 55),
(694, 'Antap', 56),
(695, 'Bajera', 56),
(696, 'Bajera Utara', 56),
(697, 'Berembeng', 56),
(698, 'Manikyang', 56),
(699, 'Pupuan Sawah', 56),
(700, 'Selemadeg', 56),
(701, 'Serampingan', 56),
(702, 'Wanagiri', 56),
(703, 'Wanagiri Kauh', 56),
(704, 'Bongan', 57),
(705, 'Buahan', 57),
(706, 'Dauh Peken', 57),
(707, 'Dajan Peken', 57),
(708, 'Delod Peken', 57),
(709, 'Denbantas', 57),
(710, 'Gubug', 57),
(711, 'Sesandan', 57),
(712, 'Subamia', 57),
(713, 'Sudimara', 57),
(714, 'Tunjuk', 57),
(715, 'Wanasari', 57);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kab_kota` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `kab_kota`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abiansemal', 'Badung', 'abiansemal', '$2y$10$jAblhMg9Zin2tA7/f5KxE.izB0gr5.3IlAHE3HHBZX/LjYbp.tWgO', NULL, NULL, NULL),
(2, 'Kuta', 'Badung', 'kuta', '$2y$10$PGXTr5rkt1KxP7XKsxObbeg2EC0gjbnx1J27DaKbdOAJMQxUtrNyC', '3yZumkxnMQkoKUCBeNaMmXvDzLIaZXxnSUcMcPSEULjGru3LUPGQGfSFb0x0', NULL, NULL),
(3, 'Kuta Selatan', 'Badung', 'kutaselatan', '$2y$10$KO9H6UkeJKtdxXwyb75/QeZlvvBGgsndm/ao7Uqs3jsI9OYU5Jdae', NULL, NULL, NULL),
(4, 'Kuta Utara', 'Badung', 'kutautara', '$2y$10$QSuqcWfui6vaAZI4g0NXfu7fEGhwlenkBngNs2x30RyMgvekZ6fWO', NULL, NULL, NULL),
(5, 'Mengwi', 'Badung', 'mengwi', '$2y$10$wxtK6YdagX3SqNNym1OSRugnFKuZ1Crv0aX8wyhniRFWZnZs7T4g.', NULL, NULL, NULL),
(6, 'Petang', 'Badung', 'petang', '$2y$10$2cqzTmlshxf2WwfgcmbhPe0mksKs1.GWUNoO6zLHi7vM/Vxdpf66C', NULL, NULL, NULL),
(7, 'Bangli', 'Bangli', 'bangli', '$2y$10$h97RTw6EjCiOUvl.fjUe2OLHwBQJUAd1ew6grCe0VJZqNbJiNHe/G', NULL, NULL, NULL),
(8, 'Kintamani', 'Bangli', 'kintamani', '$2y$10$Jpf.Z55HHiSY5.7JqIsvy.Ss1H85HlIbBkWB4v.RxVShyJhzqTHWm', NULL, NULL, NULL),
(9, 'Susut', 'Bangli', 'susut', '$2y$10$0AcKZ8bwxxyajL3GynAqH.6kASk2r5V2ETrx9Z731zGEVivNt.KBC', NULL, NULL, NULL),
(10, 'Tembuku', 'Bangli', 'tembuku', '$2y$10$eYYP4pnNWiI0rU0MHJ59t.XlEKIvKSyEo/Kf2jRRwxySQI5EpFc1m', NULL, NULL, NULL),
(11, 'Banjar', 'Buleleng', 'banjar', '$2y$10$qlb2z4BZq0Zi2ztB9y1IEOEVIlmKRLaY/HuhZDNLCiecNQ2HvdvPK', NULL, NULL, NULL),
(12, 'Buleleng', 'Buleleng', 'buleleng', '$2y$10$kwOhET9cMaUvKoquFfHunOahpupOZ6IOHWnrlUbCWp53AQmBoHAvy', NULL, NULL, NULL),
(13, 'Busungbiu', 'Buleleng', 'busungbiu', '$2y$10$NJmHViGvVr73bNZncuvNyeppdfum/Qx6gljgCQ8xYpzhr/d85g4s2', NULL, NULL, NULL),
(14, 'Gerokgak', 'Buleleng', 'gerokgak', '$2y$10$d/sZ5PC3eEa2pxyJraXyN.s8ghvPBoL4F6v6XtD16CD1AZPhRMqMS', NULL, NULL, NULL),
(15, 'Kubutambahan', 'Buleleng', 'kubutambahan', '$2y$10$aEFKjZ04m5OYc8cAQIi.H.RDKqpu11wSfJR3WIssruY2C3QudAHX2', NULL, NULL, NULL),
(16, 'Sawan', 'Buleleng', 'sawan', '$2y$10$XsY/hczvOa2CXBzDeWqhW.MJS3O7JhqX8O6h1zd..346liv9hgMeS', NULL, NULL, NULL),
(17, 'Seririt', 'Buleleng', 'seririt', '$2y$10$EM1AyOwdPMzmGL7sn3bQkuE/4XakbNx61u4ED6JLpDYD09vVnecIu', NULL, NULL, NULL),
(18, 'Sukasada', 'Buleleng', 'sukasada', '$2y$10$tL5w/gT261TsksX/URI26.bLr6ZgzMac.2S6PKEbqDbAZojnOlubm', NULL, NULL, NULL),
(19, 'Tejakula', 'Buleleng', 'tejakula', '$2y$10$2oCliuarls1UYemURPZWWeWqeU0eZbYGpYOytRT/tDVkwSYhtNQtm', 'isUf7WfsPslW9u7JHVMTl6uUTBtDwXzf3ODRpnx2JNCvC8sXvKlvz3Jg9Nph', NULL, NULL),
(20, 'Denpasar Barat', 'Denpasar', 'denpasarbarat', '$2y$10$8vUiijVOFfk2wnHm.qdBiOUymzktWtFCBG27AIstJNvarq6Uv6NA2', NULL, NULL, NULL),
(21, 'Denpasar Selatan', 'Denpasar', 'denpasarselatan', '$2y$10$xqXEw9fGXGc2dEK4evAewOp3Cs65KZypssWyneLW7d/cON26FT.bO', '5QNbvJzag13eBEBDyJjNSHfe3QWUcFCKrJhhxtSRX12EAOcrzEmpFQLsYRTa', NULL, NULL),
(22, 'Denpasar Timur', 'Denpasar', 'denpasartimur', '$2y$10$2GkOJr6bHS/a8Z2X/0lAYeNP10qms0z9kaDNMGOBhW717JWKHDysS', NULL, NULL, NULL),
(23, 'Denpasar Utara', 'Denpasar', 'denpasarutara', '$2y$10$T90Np5mQLD3KnjW92fy2pulCceUV/4bzVNr6IC7vaU4.PxbEiMfvC', NULL, NULL, NULL),
(24, 'Blahbatuh', 'Gianyar', 'blahbatuh', '$2y$10$ppSMfO26Ev8SIzQgHHtY3epr4o69t6iEhNWO0KipZj9sos5O4AAD6', NULL, NULL, NULL),
(25, 'Gianyar', 'Gianyar', 'gianyar', '$2y$10$O2mMexj.xK4udjwjmDUyeO3ZXN6mT/.TSqgOCLipyfVBnO9sXhBQu', NULL, NULL, NULL),
(26, 'Payangan', 'Gianyar', 'payangan', '$2y$10$spa02hmOoMWJxaSofrPyI.2/O9g08sN2BYstm4lw3QLujt/fpjx/G', NULL, NULL, NULL),
(27, 'Sukawati', 'Gianyar', 'sukawati', '$2y$10$e5MCLBimzEL2BusnTObK/ekGuhcMzCPnyvQrQxPe.woxadYa.ZdvK', NULL, NULL, NULL),
(28, 'Tampak Siring', 'Gianyar', 'tampaksiring', '$2y$10$Y7GtscPeFZ/YIXjCfbIa0.S3zofXhnMVcuK0AEVTJ8T1MjTNg2H6G', NULL, NULL, NULL),
(29, 'Tegallalang', 'Gianyar', 'tegallalang', '$2y$10$tyg4SQoNqo/1eBZiZ1Kisup6klwwDG5BRc6dkBvELMEtz16cO1lhC', NULL, NULL, NULL),
(30, 'Ubud', 'Gianyar', 'ubud', '$2y$10$xXQqEi5.W0qJO3pg9/SjteaL2GrzxPBeVT27sRRCRNRfKzvtfdMEm', NULL, NULL, NULL),
(31, 'Jembrana', 'Jembrana', 'jembrana', '$2y$10$E4x6XlmcF2xrjZHr3W0HTOGM/gxODYMtyS8jfdsb3EoIqywG9qmRS', NULL, NULL, NULL),
(32, 'Melaya', 'Jembrana', 'melaya', '$2y$10$56raGTc/gdaHbJn9sfPeqO7yL4jF8BBA36hhZJkhHVZYYT9xg9maa', NULL, NULL, NULL),
(33, 'Mendoyo', 'Jembrana', 'mendoyo', '$2y$10$m/PN0SyjL/lqu4o.TlUeguRYkBz3ANpq0OC2F6nnuhbgE9toHvGuq', NULL, NULL, NULL),
(34, 'Negara', 'Jembrana', 'negara', '$2y$10$5RmCBI7jeun5nrXiZKxOcOqZhHciqFpi5mQgMBJ7vyj3G5goTNszC', NULL, NULL, NULL),
(35, 'Pekutatan', 'Jembrana', 'pekutatan', '$2y$10$DGumFJldlxt7n7TGex1.5u1DrBuJ.6ZoeIE6LjEkb2YSK6NRgtpB2', NULL, NULL, NULL),
(36, 'Abang', 'Karangasem', 'abang', '$2y$10$5SpiA3NVvIUJMbaRY.zFy.VZI37yNNPatSMXNjzZWoPVI3hW1cYsy', NULL, NULL, NULL),
(37, 'Bebandem', 'Karangasem', 'bebandem', '$2y$10$9MjRDiW7Uqs6ruAj65L8duv5yU4nziHtLAcTaHmRlFXpwPnJ56ITa', NULL, NULL, NULL),
(38, 'Karang Asem', 'Karangasem', 'karangasem', '$2y$10$DTxS7/lYSu3x0L6QjqXbSeN2IJ4r04T8F/.EXTF.Mr7V.DY5O2pFS', NULL, NULL, NULL),
(39, 'Kubu', 'Karangasem', 'kubu', '$2y$10$iEqCM0YXPnsy8xwFgy6C0Okri8XnrZvIwSr55jEGwHgv2vx3a//Iy', NULL, NULL, NULL),
(40, 'Manggis', 'Karangasem', 'manggis', '$2y$10$ZVQ839e2Gkg6p2BjHWxTTuY.K7QEvbdlWweSFrOZCyHlqV2SIt1y6', NULL, NULL, NULL),
(41, 'Rendang', 'Karangasem', 'rendang', '$2y$10$FdT5ET.XLPkLoYwgxhnPHeGn2shOZRvlwqv7MaHIYWKKFb.nBU8LW', NULL, NULL, NULL),
(42, 'Selat', 'Karangasem', 'selat', '$2y$10$HEbLcE6CJ7lVjOdcYlZpJurrWfeQck5FvPT0666x.RT1UukA8vqZO', NULL, NULL, NULL),
(43, 'Sidemen', 'Karangasem', 'sidemen', '$2y$10$E51mfNCiGs9OI0LKybxvPu5brU62B8THOnjuglGBUUFeDSm9p5ZRW', NULL, NULL, NULL),
(44, 'Banjarangkan', 'Klungkung', 'banjarangkan', '$2y$10$8/843KavtBj9No8irfst.OC6ooRRca7RDeALMiq59x7OcB982IhWq', NULL, NULL, NULL),
(45, 'Dawan', 'Klungkung', 'dawan', '$2y$10$G8dSjvEzK3X79iYAh3VN9uGclnW0eYue.jk1KndYYUgWjCl110ElC', NULL, NULL, NULL),
(46, 'Klungkung', 'Klungkung', 'klungkung', '$2y$10$OOcKyzmuke5rlKWxyB7TlebqObDEj9RrWcsezgTLWBk9U..xArCvy', NULL, NULL, NULL),
(47, 'Nusapenida', 'Klungkung', 'nusapenida', '$2y$10$njCFCdN7pEBZRFNJDRVJKevWOoI0cubxeork8.ZkSyuIeaXZHJo3.', NULL, NULL, NULL),
(48, 'Baturiti', 'Tabanan', 'baturiti', '$2y$10$KAOhR6u0BeXfWckBzio.Y.0s3ioNZaCWd8glJAOE121lLkmQ97gc6', NULL, NULL, NULL),
(49, 'Kediri', 'Tabanan', 'kediri', '$2y$10$s/Lc4rkosCu7xfvcHKkJ2OcDZ43m66wxnh7sgx.cAtlVurEqehj2G', NULL, NULL, NULL),
(50, 'Kerambitan', 'Tabanan', 'kerambitan', '$2y$10$d6ktBkytOFZFNY7Jny0rwOSA4UqqU0Gi/nfAfZaB3Lc7AyqiTHD1.', 'fEYTJj95xIhNVU9nTV0qyVmbw08Udi1XQAsi37csoL9d4WewXVYlciYUvdHU', NULL, NULL),
(51, 'Marga', 'Tabanan', 'marga', '$2y$10$b4M53VP1G76OACQrb0S.ouee9fsTqUg2NfvY3Tgpm.SuhoneG2lP.', NULL, NULL, NULL),
(52, 'Penebel', 'Tabanan', 'penebel', '$2y$10$oKYLKuuNiECt8.6hNDGgNeH5C7/VlE5muFxI5.FdC/9hI8GBdi3ai', NULL, NULL, NULL),
(53, 'Pupuan', 'Tabanan', 'pupuan', '$2y$10$nliO2eIplU1RfoCbNVianOwL4qwHqUK7kNm9DE0v5lbWUjDCLfynu', NULL, NULL, NULL),
(54, 'Selemadeg Barat', 'Tabanan', 'selemadegbarat', '$2y$10$lFZ/wmR3ujcbOV4O3ppnBuPWsSgnCp4PlbD4/by39qZ2DtFV1wq6e', NULL, NULL, NULL),
(55, 'Selemadeg Timur', 'Tabanan', 'selemadegtimur', '$2y$10$gIrCxOwiHFl9VNfjn63cielNCC6LvTLAH0TWRXIfwD9asS64ZyhTe', NULL, NULL, NULL),
(56, 'Selemadeg', 'Tabanan', 'selemadeg', '$2y$10$z0cBrS1t6camnKhdBHxG9eDQp12ih0ppo2162oGL21YjzoWKlI8AO', NULL, NULL, NULL),
(57, 'Tabanan', 'Tabanan', 'tabanan', '$2y$10$QA1jlR569qyL1IWSKr38ye07sRCyfYw/PkjqoI6v/ehuklekmwlk6', 'eUbL6N5QBqgmrVJp8MsHV5CTVigPmGLylAiYmKa2lxFMETX9tS3UcZU1JeF0', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `koors`
--
ALTER TABLE `koors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `partai`
--
ALTER TABLE `partai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saksis`
--
ALTER TABLE `saksis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tamus`
--
ALTER TABLE `tamus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kabupatenkota`
--
ALTER TABLE `tb_kabupatenkota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_kecamatan_id_kabupatenkota_foreign` (`id_kabupatenkota`);

--
-- Indeks untuk tabel `tb_kelurahandesa`
--
ALTER TABLE `tb_kelurahandesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_kelurahandesa_id_kecamatan_foreign` (`id_kecamatan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `koors`
--
ALTER TABLE `koors`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `partai`
--
ALTER TABLE `partai`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `saksis`
--
ALTER TABLE `saksis`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `tamus`
--
ALTER TABLE `tamus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kabupatenkota`
--
ALTER TABLE `tb_kabupatenkota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `tb_kelurahandesa`
--
ALTER TABLE `tb_kelurahandesa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=716;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD CONSTRAINT `tb_kecamatan_id_kabupatenkota_foreign` FOREIGN KEY (`id_kabupatenkota`) REFERENCES `tb_kabupatenkota` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kelurahandesa`
--
ALTER TABLE `tb_kelurahandesa`
  ADD CONSTRAINT `tb_kelurahandesa_id_kecamatan_foreign` FOREIGN KEY (`id_kecamatan`) REFERENCES `tb_kecamatan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
