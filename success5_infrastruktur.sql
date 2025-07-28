-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Jul 2025 pada 11.56
-- Versi server: 10.6.22-MariaDB-cll-lve
-- Versi PHP: 8.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `success5_infrastruktur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bts`
--

CREATE TABLE `bts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `operator_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kecamatan_id` bigint(20) UNSIGNED NOT NULL,
  `nagari_id` bigint(20) UNSIGNED NOT NULL,
  `jorong_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pemilik` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `titik_koordinat` varchar(255) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `teknologi` enum('2G','3G','4G','4G+5G','5G') DEFAULT '4G',
  `status` enum('aktif','non-aktif') DEFAULT 'aktif',
  `tahun_bangun` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bts`
--

INSERT INTO `bts` (`id`, `operator_id`, `kecamatan_id`, `nagari_id`, `jorong_id`, `pemilik`, `alamat`, `titik_koordinat`, `latitude`, `longitude`, `teknologi`, `status`, `tahun_bangun`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 11, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. I Sei Tambang Nag. Kunpar', '-0.86716, 101.37435', NULL, NULL, '4G', 'aktif', '0', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(2, 1, 1, 34, NULL, 'PT. TOWER BERSAMA', 'JL. Karya Darma ke Bukit Sirih Jorong Pematang Sari Bulan', '-0.670679997896, 100.922769998', NULL, NULL, '4G', 'aktif', '0', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(3, 1, 4, 44, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', '-', '-0.561132261566, 100.921614725', NULL, NULL, '4G', 'aktif', '0', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(4, 1, 1, 34, NULL, 'PT. Telkomsel Tbk', 'Jl. Jendral Sudirman Muaro Gambok Nagari Muaro', '-0.661289636988, 100.937849465', NULL, NULL, '4G', 'aktif', '1995', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(5, 1, 8, 6, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Talang Nag. Sungai Lansek', '-0.87784, 101.33033', NULL, NULL, '4G', 'aktif', '2001', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(6, 1, 1, 42, NULL, 'PT. TOWER BERSAMA', 'Jl. Tapian Sudang Dusun Saiyo Jr. Pasar Sijunjung', '-0.70021, 100.98236', NULL, NULL, '4G', 'aktif', '2003', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(7, 1, 1, 34, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Subarang Ombak RT.0102 34', '-0.66593, 100.94313', NULL, NULL, '4G', 'aktif', '2003', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(8, 1, 1, 37, NULL, 'PT. Solusi Tunas Pratama', 'Jl. Lintas Sumatera Jr. Koto Tangah Nag. Pematang Panjang', '-0.73056, 100.9562', NULL, NULL, '4G', 'aktif', '2004', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(9, 3, 1, 34, NULL, 'PT. XL Axiata', 'Jl. Jenderal Sudirman Muaro Gambok 34', '-0.6608306, 100.937211', NULL, NULL, '4G', 'aktif', '2004', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(10, 1, 1, 42, NULL, 'PT. Telkomsel Tbk', 'Jl. Lintas Sumatera Tanah Bedantung Nag. Sijunjung', '-0.73821, 100.99007', NULL, NULL, '4G', 'aktif', '2005', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(11, 1, 3, 1, NULL, 'PT. Telkomsel Tbk', 'Jr. Pantai Cermin (belakang MTSN)', '-0.71391, 100.89802', NULL, NULL, '4G', 'aktif', '2005', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(12, 1, 3, 1, NULL, 'PT. Telkomsel Tbk', 'Jr. Tanjung Udani', '-0.710031, 100.894724', NULL, NULL, '4G', 'aktif', '2005', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(13, 1, 8, 11, NULL, 'PT. Telkomsel Tbk', 'Jl. Lintas Sumatera Jr. Kiliran Jao Nag. Kunpar', '-0.8882222, 101.367108', NULL, NULL, '4G', 'aktif', '2006', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(14, 1, 8, 11, NULL, 'PT. Solusi Tunas Pratama', 'Jl. Lintas Sumatera Jr. Kiliran Jao Nag. Kunpar', '-0.88488889, 101.359834', NULL, NULL, '4G', 'aktif', '2006', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(15, 1, 8, 11, NULL, 'PT. Telkomsel Tbk', 'PT. BPSI Unit Kebun Bina Blok D 6 Nag. Kunpar', '-0.864639, 101.433614', NULL, NULL, '4G', 'aktif', '2006', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(16, 1, 8, 7, NULL, 'PT. Telkomsel Tbk', 'Simp. Dusun Tandikek Jr. Kamang Nag. Kamang', '-0.821059, 101.38642', NULL, NULL, '4G', 'aktif', '2006', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(17, 1, 6, 28, NULL, 'PT. Telkomsel Tbk', 'Jr. Sungai Jodi Nag. Lubuk Tarok', '-0.8112222, 101.001158', NULL, NULL, '4G', 'aktif', '2006', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(18, 3, 7, 60, NULL, 'PT. XL Axiata', 'Jr. Batang Dikek Nag. Tanjung Lolo', '-0.7825556, 101.247389', NULL, NULL, '4G', 'aktif', '2006', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(19, 1, 6, 29, NULL, 'PT. Telkomsel Tbk', 'Jr. Rumbai Nag. Lalan', '-0.7804722, 101.003356', NULL, NULL, '4G', 'aktif', '2006', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(20, 1, 1, 37, NULL, 'PT. TBG', 'Jr. Koran Nag. Pematang Panjang', '-0.7359778, 100.949694', NULL, NULL, '4G', 'aktif', '2006', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(21, NULL, 5, 26, NULL, 'PT. SOLUSI MENARA INDONESIA', 'JL. Lintas Tengah Sumatra Solok - Muaro Bungo Jr. Kapalo Koto Nag. Padang Sibusuk', '-0.7016, 100.8275', NULL, NULL, '4G', 'aktif', '2006', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(22, 1, 1, 34, NULL, 'PT. Telkomsel Tbk', 'Simp. Sinar Jaya Jr. Tangah 34', '-0.677, 100.958972', NULL, NULL, '4G', 'aktif', '2006', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(23, 1, 1, 34, NULL, 'PT. DMT', 'Jl. Mess Pemda Jr. Subarang Ombak 34', '-0.66196, 100.94362', NULL, NULL, '4G', 'aktif', '2006', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(24, 1, 2, 23, NULL, 'PT. Telkomsel Tbk', 'Jr. Ranah Sigading', '-0.6594444, 100.916839', NULL, NULL, '4G', 'aktif', '2006', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(25, 1, 2, 17, NULL, 'PT. Telkomsel Tbk', 'Simp. Mesjid Nurul Ikhlas Jr. MKD', '-0.62891, 100.85988', NULL, NULL, '4G', 'aktif', '2006', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(26, 1, 4, 47, NULL, 'PT. Telkomsel Tbk', 'Jr. Ujung Luhak Nag. Sumpur Kudus', '-0.45511, 100.88482', NULL, NULL, '4G', 'aktif', '2006', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(27, 1, 4, 47, NULL, 'PT. Telkomsel Tbk', 'Jr. Pintu Rayo Nag. Sumpur Kudus', '-0.4463889, 100.910003', NULL, NULL, '4G', 'aktif', '2006', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(28, NULL, 8, 8, NULL, 'PT. SOLUSI MENARA INDONESIA', 'Jr. Kiliran Jao 34 Takung', '-0.89064, 101.35923', NULL, NULL, '4G', 'aktif', '2007', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(29, 1, 8, 7, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jl. Simpang Dusun Tandikek Jr. Kamang Nag. Kamang', '-0.81873, 101.3836', NULL, NULL, '4G', 'aktif', '2007', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(30, 1, 7, 60, NULL, 'PT. Telkomsel Tbk', 'Jr. Batang Dikek Nag. Tanjung Lolo', '-0.7826, 101.24817', NULL, NULL, '4G', 'aktif', '2007', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(31, 1, 1, 42, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jl. Lintas Sumatera Tanah Bedantung Nag. Sijunjung', '-0.73855, 100.9898', NULL, NULL, '4G', 'aktif', '2007', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(32, 2, 3, 1, NULL, 'PT. Protelindo', 'Jr. Pantai Cermin (belakang MTSN)', '-0.71357, 100.89819', NULL, NULL, '4G', 'aktif', '2007', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(33, NULL, 3, 1, NULL, 'PT. SOLUSI MENARA INDONESIA', 'Jl. Protokol No.128 Jr. Pantai Cermin Palangki', '-0.71004, 100.89317', NULL, NULL, '4G', 'aktif', '2007', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(34, NULL, 5, 26, NULL, 'PT. Protelindo', 'Jl. Lintas Jr. Simancung Padang Sibusuk', '-0.6996, 100.83932', NULL, NULL, '4G', 'aktif', '2007', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(35, 1, 1, 34, NULL, 'PT. Telkomsel Tbk', 'Jr. Muaro Gambok 34', '-0.6573056, 100.932694', NULL, NULL, '4G', 'aktif', '2007', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(36, NULL, 2, 17, NULL, 'PT. Protelindo', 'Jl. Raya Simancung-Tj. Ampalu', '-0.65492, 100.85587', NULL, NULL, '4G', 'aktif', '2007', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(37, NULL, 2, 18, NULL, 'PT. SOLUSI MENARA INDONESIA', 'Jl. Raya Lintau Jl.Raya Lintao,Desa Sumpadang Ke koto Tujuh', '-0.63047, 100.84843', NULL, NULL, '4G', 'aktif', '2007', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(38, NULL, 2, 17, NULL, 'PT. Protelindo', 'Jl. Mesjid Nurul Qolbi No. 55 Jr. MKD Nag. Limo Koto', '-0.6298, 100.85988', NULL, NULL, '4G', 'aktif', '2007', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(39, 2, 4, 47, NULL, 'PT. Indosat', 'Jr. Pintu Rayo Nag. Sumpur Kudus', '-0.4477778, 100.9125', NULL, NULL, '4G', 'aktif', '2007', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(40, 1, 7, 60, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Batang Dikek Nag. Tanjung Lolo', '-0.782884, 101.247467', NULL, NULL, '4G', 'aktif', '2007', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(41, 1, 7, 60, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Batang Dikek Nag. Tanjung Lolo', '-0.782726, 101.248024', NULL, NULL, '4G', 'aktif', '2007', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(42, 1, 8, 6, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Koto Nag. Sungai Lansek', '-0.87075, 101.295222', NULL, NULL, '4G', 'aktif', '2008', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(43, 1, 8, 14, NULL, 'PT. Telkomsel Tbk', 'Jr. Lembah Gunung Nag. Siaua', '-0.843, 101.257722', NULL, NULL, '4G', 'aktif', '2008', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(44, 1, 7, 55, NULL, 'PT. Telkomsel Tbk', 'Jr. Mudik Malih Nag. Tanjung Gadang', '-0.76273, 101.1175', NULL, NULL, '4G', 'aktif', '2008', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(45, 1, 7, 55, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Mudik Malih Nag. Tanjung Gadang', '-0.76266, 101.11725', NULL, NULL, '4G', 'aktif', '2008', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(46, 1, 5, 26, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Tapi Balai Nag. Batu Manjulur', '-0.7006306, 100.828556', NULL, NULL, '4G', 'aktif', '2008', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(47, 1, 5, 26, NULL, 'PT. Solusi Tunas Pratama', 'Darat Gurun Jr. Tapi Balai Nag. Padang Sibusuk', '-0.6991389, 100.832278', NULL, NULL, '4G', 'aktif', '2008', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(48, NULL, 1, 34, NULL, 'PT. Protelindo', 'Jl. Imam Bonjol 199 Jr. Hilir Guguk Dadok 34', '-0.68909, 100.96992', NULL, NULL, '4G', 'aktif', '2008', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(49, 1, 5, 25, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Pamuatan Barat Nag. Pamuatan', '-0.6758611, 100.838778', NULL, NULL, '4G', 'aktif', '2008', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(50, 1, 1, 34, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jl. Imam Bonjol Gang Bendang 34', '-0.6661667, 100.955167', NULL, NULL, '4G', 'aktif', '2008', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(51, 1, 1, 34, NULL, 'PT. Telkomsel Tbk', 'Jr. Subarang Ombak 34', '-0.66578, 100.9432', NULL, NULL, '4G', 'aktif', '2008', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(52, NULL, 1, 34, NULL, 'PT. Protelindo', 'Jl. M.Syafei Jr. Subarang Ombak 34', '-0.6606, 100.93007', NULL, NULL, '4G', 'aktif', '2008', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(53, NULL, 2, 17, NULL, 'PT. Protelindo', 'Jl. Lintas Tanjung Ampalu Muaro-Tanjung Jr. Koto Nag. Tanjung', '-0.62869, 100.88126', NULL, NULL, '4G', 'aktif', '2008', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(54, 1, 4, 49, NULL, 'PT. Telkomsel Tbk', 'Jr. Tanjung Raya Nag. Kumanis', '-0.5411389, 100.819194', NULL, NULL, '4G', 'aktif', '2008', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(55, 1, 8, 11, NULL, 'PT. Telkomsel Tbk', 'Jr. II Blok D Nag. Kunpar', '-0.86545, 101.38045', NULL, NULL, '4G', 'aktif', '2009', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(56, 1, 8, 9, NULL, 'PT. Telkomsel Tbk', 'Jr. Guguk Tinggi Nag. Aia Amo', '-0.711796, 101.248843', NULL, NULL, '4G', 'aktif', '2009', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(57, NULL, 1, 42, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Kandang Harimau Nag. Sijunjung', '-0.70246, 100.98243', NULL, NULL, '4G', 'aktif', '2009', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(58, 1, 2, 17, NULL, 'PT. Telkomsel Tbk', 'Jr. Koto Panjang Nag. Limo Koto', '-0.6456944, 100.847278', NULL, NULL, '4G', 'aktif', '2009', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(59, 1, 6, 30, NULL, 'PT. Telkomsel Tbk', 'Jr. Buluh Kasok Nag. Buluh Kasok', '-0.85075, 101.057834', NULL, NULL, '4G', 'aktif', '2010', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(60, 1, 8, 7, NULL, 'PT. Telkomsel Tbk', 'Jalur 5 Jr. Kamang Makmur Nag. Kamang', '-0.7836639, 101.444583', NULL, NULL, '4G', 'aktif', '2010', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(61, 1, 3, 3, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Dusun Tuo 34 Bodi', '-0.7035536, 100.875444', NULL, NULL, '4G', 'aktif', '2010', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(62, 1, 5, 24, NULL, 'PT. Telkomsel Tbk', 'Jr. Batu Manjulur Nag. Batu Manjulur', '-0.7503889, 100.830139', NULL, NULL, '4G', 'aktif', '2011', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(63, 1, 2, 20, NULL, 'PT. TOWER BERSAMA', 'Jr. Koto Padang Laweh Nag. Padang Laweh', '-0.60034, 100.90145', NULL, NULL, '4G', 'aktif', '2011', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(64, 1, 2, 19, NULL, 'PT. Telkomsel Tbk', 'Jr. Buluh Rotan Nag. Guguk', '-0.57628, 100.839', NULL, NULL, '4G', 'aktif', '2011', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(65, 1, 8, 8, NULL, 'PT. TOWER BERSAMA', 'Jl. Lintas Sumatera Jr. Koto Lamo 34 Takung', '-0.91313, 101.40953', NULL, NULL, '4G', 'aktif', '2012', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(66, 1, 6, 32, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Imbang Joyo Nag. Latang', '-0.80244, 101.04813', NULL, NULL, '4G', 'aktif', '2012', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(67, 1, 7, 61, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Koto Nag. Taratak Baru', '-0.80093, 101.06543', NULL, NULL, '4G', 'aktif', '2012', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(68, 1, 7, 60, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Koto Nag. Tanjung Lolo', '-0.78976, 101.21248', NULL, NULL, '4G', 'aktif', '2012', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(69, 1, 7, 62, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Koto Sinyamu Nag. Timbulun', '-0.77605, 101.0705', NULL, NULL, '4G', 'aktif', '2012', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(70, 1, 3, 4, NULL, 'PT. TOWER BERSAMA', 'Jr. Ranah Pasar Nag. Mundam Sakti', '-0.77536, 100.90343', NULL, NULL, '4G', 'aktif', '2012', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(71, 1, 8, 7, NULL, 'PT. TOWER BERSAMA', 'Jorong Kamang Sejahtera Rt.02/05, Ds. Kamang', '-0.83694, 101.48503', NULL, NULL, '4G', 'aktif', '2013', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(72, 1, 8, 7, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jl. Sawit Jr. Galogah Nag. Kamang', '-0.78036, 101.30025', NULL, NULL, '4G', 'aktif', '2013', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(73, 1, 7, 62, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jl. Lintas Sumatera Jr. Sibisir Nag. Timbulun', '-0.76836, 101.04269', NULL, NULL, '4G', 'aktif', '2013', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(74, 1, 7, 55, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jl. Lintas Jr. Pandam Nag. Tanjung Gadang', '-0.76441, 101.15421', NULL, NULL, '4G', 'aktif', '2013', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(75, 1, 7, 55, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Sungai Napar Nag. Tanjung Gadang', '-0.76349, 101.09644', NULL, NULL, '4G', 'aktif', '2013', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(76, 1, 3, 2, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Simpang Ampek Nag. Koto Baru', '-0.74558, 100.89379', NULL, NULL, '4G', 'aktif', '2013', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(77, 1, 2, 17, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jl. Tanjung Ampalu-Muaro Batu Balang Nag. Limo Koto', '-0.63709, 100.8913', NULL, NULL, '4G', 'aktif', '2013', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(78, 1, 2, 22, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Koto Tangah Nag. Bukit Bual', '-0.62159, 100.82745', NULL, NULL, '4G', 'aktif', '2013', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(79, 1, 2, 21, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Tanjung Beringin Nag. Tanjung', '-0.6035, 100.86686', NULL, NULL, '4G', 'aktif', '2013', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(80, 1, 4, 45, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Unggan Aro Nag. Unggan', '-0.40652, 100.89864', NULL, NULL, '4G', 'aktif', '2013', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(81, 1, 8, 7, NULL, 'PT. TOWER BERSAMA', 'Jl. Lintas SumatraJorong Batang Kariang Nag. Kamang', '-0.77975, 101.40903', NULL, NULL, '4G', 'aktif', '2014', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(82, 1, 8, 10, NULL, 'PT. TOWER BERSAMA', 'Jorong Pasar Nagari Sungai Batuang', '-0.68817, 101.21367', NULL, NULL, '4G', 'aktif', '2014', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(83, 1, 1, 41, NULL, 'PT. TOWER BERSAMA', 'Jor Silabau Nagari Aie Angek', '-0.674730001146, 101.05997', NULL, NULL, '4G', 'aktif', '2014', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(84, 1, 8, 13, NULL, 'PT. TOWER BERSAMA', 'Jr. Parik Malintang Nag. Tanjung Kaliang', '-0.65928, 101.23696', NULL, NULL, '4G', 'aktif', '2014', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(85, 1, 2, 17, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jl. Tangah Simpang Tigo Jr. Tanjung Ampalu Nag. Limo Koto', '-0.63271, 100.85035', NULL, NULL, '4G', 'aktif', '2014', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(86, 1, 4, 46, NULL, 'PT. TOWER BERSAMA', 'Jorong Bonai, Nagari Tanjung Bonai Aur', '-0.53741, 100.83714', NULL, NULL, '4G', 'aktif', '2014', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(87, 1, 4, 48, NULL, 'PT. TOWER BERSAMA', 'Jorong Koto Lamo, Nagari Tampa Rungo,', '-0.51048, 100.88482', NULL, NULL, '4G', 'aktif', '2014', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(88, 1, 8, 11, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Sungai Tambang I Dsn. 3 Nag. Kunpar', '-0.86544, 101.37374', NULL, NULL, '4G', 'aktif', '2015', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(89, 1, 3, 3, NULL, 'PT. TOWER BERSAMA', 'Jr. Dusun Tuo 34 Bodi', '-0.70617, 100.88726', NULL, NULL, '4G', 'aktif', '2015', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(90, 1, 3, 1, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jl. Lintas Sumatera Jr. Lintas Harapan', '-0.770683, 100.899872', NULL, NULL, '4G', 'aktif', '2017', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(91, NULL, 1, 42, NULL, 'PT. Protelindo', 'Jl. Lintas Sumatera Tanah Bedantung Nag. Sijunjung', '-0.73855, 100.99108', NULL, NULL, '4G', 'aktif', '2017', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(92, 1, 1, 42, NULL, 'PT. TOWER BERSAMA', 'Jr. Gantiang Nag. Sijunjung', '-0.71706, 100.98461', NULL, NULL, '4G', 'aktif', '2017', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(93, 1, 1, 34, NULL, 'PT. Telkomsel Tbk', 'Jr. Hilie Guguk Dadok 34', '-0.6840583, 100.967139', NULL, NULL, '4G', 'aktif', '2017', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(94, 1, 1, 34, NULL, 'PT. TOWER BERSAMA', 'Jl. Sudirman Wisma Indah Blok A6 Jorong Muaro Gambok', '-0.660270818881, 100.926931465', NULL, NULL, '4G', 'aktif', '2017', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(95, 1, 1, 37, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jl. Lintas Sumatera Jor Koto Tangah Nagari Pematang Panjang', '-0.729845423553, 100.959063532', NULL, NULL, '4G', 'aktif', '2017', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(96, 1, 8, 7, NULL, 'PT. TOWER BERSAMA', 'Dusun I Jorong Kamang Madani Nagari Kamang, RT 03', '-0.835266857126, 101.516830985', NULL, NULL, '4G', 'aktif', '2017', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(97, 1, 8, 7, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jr. Kurnia Kamang Nag. Kamang', '-0.810640001833, 101.464240001', NULL, NULL, '4G', 'aktif', '2017', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(98, NULL, 2, 23, NULL, 'PT. Protelindo', 'Jr. Taratak Baru Padang Laweh Selatan', '-0.637441, 100.911768', NULL, NULL, '4G', 'aktif', '2018', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(99, 1, 1, 36, NULL, 'PT. Telkomsel Tbk', 'Jr. Tanjung Medan, Nagari Silokek', '-0.601118, 101.02547', NULL, NULL, '4G', 'aktif', '2019', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(100, 1, 1, 40, NULL, 'PT. Telkomsel Tbk', 'Jr. Koto Mudik Nag. Durian Gadang', '-0.57376, 101.04079', NULL, NULL, '4G', 'aktif', '2019', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(101, 1, 4, 50, NULL, 'PT. Telkomsel Tbk', 'Jr. Taruko, Nag. Manganti Kecamatan Sumpur Kudus ', '-0.50022, 100.95311', NULL, NULL, '4G', 'aktif', '2020', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(102, 1, 8, 11, NULL, 'PT. Tower Bersama', 'Jorong Kunangan', '-0.828392, 101.349895', NULL, NULL, '4G', 'aktif', '2022', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(103, 1, 2, 20, NULL, 'PT. Tower Bersama', 'Jalan Padat Karya Pal X Nagari Padang Laweh', '-0.621639, 100.888658', NULL, NULL, '4G', 'aktif', '2021', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(104, 1, 8, 11, NULL, 'PT. Tower Bersama', 'Sungai tenang', '-0.868073, 101.407634', NULL, NULL, '4G', 'aktif', '2022', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(105, 1, 8, 11, NULL, 'PT. Tower Bersama', 'Perumahan Indo Raya Permai', '-0.853018, 101.398901', NULL, NULL, '4G', 'aktif', '2022', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(106, 1, 5, 27, NULL, 'PT. Tower Bersama', 'Kampung Baru', '-0.735802, 100.828335', NULL, NULL, '4G', 'aktif', '2022', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(107, 1, 6, 29, NULL, 'PT. Tower Bersama', 'Jorong Padang Basiku', '-0.760782, 101.000211', NULL, NULL, '4G', 'aktif', '2022', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(108, NULL, 2, 19, NULL, 'Tidak diketahui', 'Nagari Guguk Kecamatan Koto VII', '-0.5754987255982972, 100.86204813792399', NULL, NULL, '4G', 'aktif', '2023', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(109, 1, 8, 11, NULL, 'PT. TBG', 'Pasar Baru Sungai tambang', '-0.8604643471008788, 101.3837179677243', NULL, NULL, '4G', 'aktif', '2023', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(110, NULL, 8, 13, NULL, 'Tidak diketahui', 'lapangan bola', '-0.637115, 101.230469', NULL, NULL, '4G', 'aktif', '2023', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(111, NULL, 7, 57, NULL, 'Tidak diketahui', 'pulasan', '-0.812061, 101.126637', NULL, NULL, '4G', 'aktif', '2023', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(112, 1, 7, 59, NULL, 'PT. Telkomsel Tbk', 'sibakur', '-0.858060, 101.124500', NULL, NULL, '4G', 'aktif', '2020', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(113, 1, 8, 7, NULL, 'PT. Telkomsel Tbk', 'Kamang bakti Timpeh', '-0.802711, 101.482193', NULL, NULL, '4G', 'aktif', '2024', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(114, 1, 8, 15, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Lubuk Tarantang', '-0.906856, 101.283390', NULL, NULL, '4G', 'aktif', '2023', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(115, 1, 4, 52, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jorong sipuah', '-0.469267, 100.860677', NULL, NULL, '4G', 'aktif', '2024', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(116, 1, 4, 52, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Jorong Simpang Tigo Sabiluru', '-0.494977, 100.865695', NULL, NULL, '4G', 'aktif', '2024', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(117, 1, 6, 31, NULL, 'PT. DMT (Dayamitra Telekomunikasi /Mitratel)', 'Kampung Dalam', '-0.832210, 101.041390', NULL, NULL, '4G', 'aktif', '2024', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(118, 1, 1, 39, NULL, 'PT. TBG', 'Nagari paru', '-0.645752, 101.134700', NULL, NULL, '4G', 'aktif', '2024', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(119, 1, 3, 5, NULL, 'PT. Tower Bersama', 'Nagari Koto Tuo', '-0.703128, 100.920758', NULL, NULL, '4G', 'aktif', '2024', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(120, 1, 8, 13, NULL, 'PT. Tower Bersama', 'Nagari Padang Tarok', '-0.636600, 101.230460', NULL, NULL, '4G', 'aktif', '2024', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(121, 1, 6, 33, NULL, 'PT. Tower Bersama', 'Nagari Silongo', '-0.824169, 101.064615', NULL, NULL, '4G', 'aktif', '2025', '2025-07-27 16:30:22', '2025-07-27 16:30:22'),
(122, 1, 7, 58, NULL, 'PT. Tower Bersama', 'Nagari Langki', '-0.896392, 101.179879', NULL, NULL, '4G', 'aktif', '2025', '2025-07-27 16:30:22', '2025-07-27 16:30:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('infra_cache_infrastructure_stats', 'a:3:{s:9:\"bts_count\";i:122;s:12:\"nagari_count\";i:62;s:12:\"jorong_count\";i:306;}', 1753680308);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opd_id` bigint(20) UNSIGNED NOT NULL,
  `peralatan_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_peralatan` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jorongs`
--

CREATE TABLE `jorongs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nagari_id` bigint(20) UNSIGNED NOT NULL,
  `nama_jorong` varchar(255) DEFAULT NULL,
  `nama_kepala_jorong` varchar(255) DEFAULT NULL,
  `kontak_kepala_jorong` varchar(255) DEFAULT NULL,
  `jumlah_penduduk_jorong` int(11) DEFAULT NULL,
  `luas_jorong` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jorongs`
--

INSERT INTO `jorongs` (`id`, `nagari_id`, `nama_jorong`, `nama_kepala_jorong`, `kontak_kepala_jorong`, `jumlah_penduduk_jorong`, `luas_jorong`, `created_at`, `updated_at`) VALUES
(609, 1, 'Pantai Cermin', NULL, NULL, 767, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(610, 1, 'Tambang Ameh', NULL, NULL, 672, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(611, 1, 'Tanjung Udani', NULL, NULL, 909, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(612, 1, 'Ranah Tibarau', NULL, NULL, 740, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(613, 1, 'Lintas Harapan', NULL, NULL, 886, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(614, 2, 'Pasar', NULL, NULL, 1212, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(615, 2, 'Simpang Ampek', NULL, NULL, 810, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(616, 2, 'Koto Panjang', NULL, NULL, 1213, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(617, 3, 'Tanjung Pauh', NULL, NULL, 1180, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(618, 3, 'Dusun Tuo', NULL, NULL, 1609, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(619, 3, 'Bungo Pinang', NULL, NULL, 775, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(620, 4, 'Ranah Pasar', NULL, NULL, 1153, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(621, 4, 'Kampung Pinang', NULL, NULL, 952, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(622, 4, 'Tanjung Raya', NULL, NULL, 962, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(623, 5, 'Bukik Malintang', NULL, NULL, 650, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(624, 5, 'Rantau Jambu', NULL, NULL, 631, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(625, 5, 'Koto Tangah', NULL, NULL, 491, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(626, 6, 'Cilacap', NULL, NULL, 889, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(627, 6, 'Talang', NULL, NULL, 1058, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(628, 6, 'Koto', NULL, NULL, 936, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(629, 6, 'Sikayan', NULL, NULL, 882, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(630, 6, 'Sungai Ampang', NULL, NULL, 878, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(631, 6, 'Pasar', NULL, NULL, 514, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(632, 6, 'Batang Tonam', NULL, NULL, 480, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(633, 7, 'Batang Kariang', NULL, NULL, 446, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(634, 7, 'Galogah', NULL, NULL, 815, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(635, 7, 'Kamang', NULL, NULL, 1020, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(636, 7, 'Kamang Abadi', NULL, NULL, 900, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(637, 7, 'Kamang Bhakti', NULL, NULL, 934, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(638, 7, 'Kamang Makmur', NULL, NULL, 1642, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(639, 7, 'Kamang Sejahtera', NULL, NULL, 767, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(640, 7, 'Kurnia Kamang', NULL, NULL, 1590, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(641, 7, 'Simpang Kamang', NULL, NULL, 1367, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(642, 7, 'Kamang Sentosa', NULL, NULL, 1099, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(643, 7, 'Kamang Madani', NULL, NULL, 694, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(644, 8, 'Dusun Tinggi I', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(645, 8, 'Kiliran Jao', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(646, 8, 'Batu Talang', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(647, 8, 'Koto Lamo', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(648, 8, 'Batang Tiau', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(649, 8, 'Koto Rona', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(650, 8, 'Sungai Sariek', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(651, 9, 'Guguk Tinggi', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(652, 9, 'Koto Baru', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(653, 9, 'Banjar Tengah', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(654, 9, 'Lubuk Kapiek', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(655, 9, 'Koto Ronah', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(656, 9, 'Koto Tuo', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(657, 10, 'Koto', NULL, NULL, 1108, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(658, 10, 'Pasar', NULL, NULL, 611, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(659, 10, 'Banjar Pematang', NULL, NULL, 775, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(660, 11, 'Kunangan', NULL, NULL, 1200, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(661, 11, 'Parik Rantang', NULL, NULL, 1684, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(662, 11, 'Sungai Tambang I', NULL, NULL, 2759, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(663, 11, 'Sungai Tambang II', NULL, NULL, 1299, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(664, 11, 'Sungai Tambang III', NULL, NULL, 1282, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(665, 11, 'Sungai Tambang IV', NULL, NULL, 926, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(666, 11, 'Mekar Jaya Sungai Tenang', NULL, NULL, 791, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(667, 11, 'Suka Maju Sungai Tenang', NULL, NULL, 554, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(668, 11, 'Suko Rejo Sungai Tenang', NULL, NULL, 817, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(669, 12, 'Mudiak Imuak', NULL, NULL, 716, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(670, 12, 'Parik Malintang', NULL, NULL, 741, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(671, 12, 'Pincuran Tujuah', NULL, NULL, 624, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(672, 13, 'Binuang Aie Putiah', NULL, NULL, 814, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(673, 13, 'Koto Tangah', NULL, NULL, 600, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(674, 13, 'Muaro Buan', NULL, NULL, 426, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(675, 13, 'Pintu Batu', NULL, NULL, 390, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(676, 14, 'Koto Tangah', NULL, NULL, 539, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(677, 14, 'Lambah Gunung', NULL, NULL, 574, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(678, 14, 'Ranah Pinago', NULL, NULL, 561, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(679, 15, 'Dusun Tinggi II', NULL, NULL, 800, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(680, 15, 'Koto Baru', NULL, NULL, 350, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(681, 15, 'Lubuk Tarantang', NULL, NULL, 450, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(682, 16, 'Koto Ranah', NULL, NULL, 407, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(683, 16, 'Pasar', NULL, NULL, 527, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(684, 16, 'Sungai Alai', NULL, NULL, 308, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(685, 16, 'Sungai Gamuruah', NULL, NULL, 505, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(686, 16, 'Tanjung Balik', NULL, NULL, 513, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(687, 17, 'Aur Gading', NULL, NULL, 1218, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(688, 17, 'Tanjung Ampalu', NULL, NULL, 467, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(689, 17, 'Pasar Tanjung Ampalu', NULL, NULL, 938, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(690, 17, 'Mangkudu Kodok', NULL, NULL, 1066, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(691, 17, 'Taratak Malintang', NULL, NULL, 1158, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(692, 17, 'Sawah Gadang', NULL, NULL, 365, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(693, 17, 'Koto Panjang', NULL, NULL, 1791, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(694, 17, 'Batu Gandang', NULL, NULL, 1532, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(695, 17, 'Batu Balang', NULL, NULL, 1613, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(696, 17, 'Solok Badak', NULL, NULL, 499, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(697, 18, 'Koto Palaluar', NULL, NULL, 517, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(698, 18, 'Bungo', NULL, NULL, 793, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(699, 18, 'Ranah', NULL, NULL, 951, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(700, 18, 'Kampung Baru', NULL, NULL, 436, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(701, 18, 'Sumpadang', NULL, NULL, 473, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(702, 19, 'Buluh Rotan', NULL, NULL, 890, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(703, 19, 'Padang Lalang', NULL, NULL, 357, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(704, 19, 'Koto Guguk', NULL, NULL, 1067, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(705, 20, 'Teratak Betung', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(706, 20, 'Koto Padang Laweh', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(707, 20, 'Sungai Gemiri', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(708, 20, 'Bukik Gombak', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(709, 21, 'Kampung Juar', NULL, NULL, 1389, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(710, 21, 'Lumbaru', NULL, NULL, 435, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(711, 21, 'Koto Tanjung', NULL, NULL, 1174, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(712, 21, 'Ujung Padang', NULL, NULL, 665, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(713, 21, 'Tanjung Beringin', NULL, NULL, 693, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(714, 21, 'Taruko', NULL, NULL, 473, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(715, 21, 'Koto Tuo Tanjung', NULL, NULL, 1477, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(716, 22, 'Koto Mudik', NULL, NULL, 547, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(717, 22, 'Jalan Baru', NULL, NULL, 332, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(718, 22, 'Koto Tangah', NULL, NULL, 517, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(719, 22, 'Koto Hilir', NULL, NULL, 669, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(720, 23, 'Ranah Sigading', NULL, NULL, 1651, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(721, 23, 'Sungai Gemuruh', NULL, NULL, 1069, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(722, 23, 'Taratak Baru', NULL, NULL, 1593, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(723, 23, 'Sawah Tarok', NULL, NULL, 585, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(724, 23, 'Pasar Gambok', NULL, NULL, 814, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(725, 24, 'Batu Manjulur Barat', NULL, NULL, 1094, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(726, 24, 'Batu Manjulur Timur', NULL, NULL, 789, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(727, 25, 'Pamuatan Timur', NULL, NULL, 887, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(728, 25, 'Pamuatan Barat', NULL, NULL, 767, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(729, 26, 'Tapi Balai', NULL, NULL, 1982, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(730, 26, 'Kapalo Koto', NULL, NULL, 1766, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(731, 26, 'Guguk Tinggi', NULL, NULL, 1365, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(732, 26, 'Simancung', NULL, NULL, 1335, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(733, 26, 'Ladang Kapeh', NULL, NULL, 1303, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(734, 27, 'Dusun Koto Tongah', NULL, NULL, 251, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(735, 27, 'Dusun Koto Panjang', NULL, NULL, 353, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(736, 27, 'Dusun Koto Lamo', NULL, NULL, 415, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(737, 27, 'Dusun Koto Ateh', NULL, NULL, 493, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(738, 27, 'Dusun Guguk Bulek', NULL, NULL, 138, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(739, 28, 'Andopan', NULL, NULL, 681, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(740, 28, 'Jambu Lipo', NULL, NULL, 1613, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(741, 28, 'Koto Tuo', NULL, NULL, 2209, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(742, 28, 'Padang Basiku', NULL, NULL, 667, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(743, 28, 'Silalak Kulik', NULL, NULL, 699, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(744, 28, 'Sungai Jodi', NULL, NULL, 1018, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(745, 28, 'Tigo Korong', NULL, NULL, 745, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(746, 29, 'Rumbai', NULL, NULL, 561, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(747, 29, 'Lalan', NULL, NULL, 817, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(748, 29, 'Batu Ajung', NULL, NULL, 870, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(749, 29, 'Batang Lalan', NULL, NULL, 524, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(750, 29, 'Sikaladi', NULL, NULL, 762, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(751, 30, 'Koto', NULL, NULL, 1078, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(752, 30, 'Koto Tangah', NULL, NULL, 731, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(753, 30, 'Taratak', NULL, NULL, 966, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(754, 31, 'Koto Kampung Dalam', NULL, NULL, 524, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(755, 31, 'Limau Sundai', NULL, NULL, 830, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(756, 31, 'Palintangan', NULL, NULL, 576, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(757, 32, 'Imbang Joyo', NULL, NULL, 604, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(758, 32, 'Taratak', NULL, NULL, 354, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(759, 32, 'Tanjung Korong', NULL, NULL, 348, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(760, 33, 'Ranah Lawe', NULL, NULL, 329, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(761, 33, 'Koto Ranah', NULL, NULL, 421, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(762, 33, 'Pakorongan', NULL, NULL, 426, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(763, 34, 'Subarang Ombak', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(764, 34, 'Ilie Guguk Dadok', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(765, 34, 'Tongah', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(766, 34, 'Muaro Gambok', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(767, 34, 'Ilie Pasa Jumak', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(768, 34, 'Subarang Sukam', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(769, 34, 'Pematang Sari Bulan', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(770, 34, 'Pematang Anjung', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(771, 34, 'Pulau Berambai', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(772, 34, 'Batang Salosah', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(773, 36, 'Ranah Tanjung Bungo', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(774, 36, 'Sungai Abu', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(775, 36, 'Samiak', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(776, 36, 'Tanjung Medan', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(777, 36, 'Sankiamo', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(778, 37, 'Kalumpang', NULL, NULL, 380, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(779, 37, 'Sitampung', NULL, NULL, 497, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(780, 37, 'Pondok Jago', NULL, NULL, 678, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(781, 37, 'Koman Kocik', NULL, NULL, 469, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(782, 37, 'Parak Gadang', NULL, NULL, 834, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(783, 37, 'Pale', NULL, NULL, 1009, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(784, 37, 'Koto Tangah', NULL, NULL, 909, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(785, 37, 'Koran', NULL, NULL, 894, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(786, 37, 'Kambuik Koman', NULL, NULL, 505, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(787, 37, 'Limau Sundai', NULL, NULL, 524, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(788, 37, 'Duri', NULL, NULL, 447, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(789, 38, 'Koto Ranah', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(790, 38, 'Koto Mudik', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(791, 38, 'Bukik Tujuh', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(792, 38, 'Rimbo Ambacang', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(793, 38, 'Takuang', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(794, 39, 'Batu Ranjau', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(795, 39, 'Bukik Buar', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(796, 39, 'Kampung Tarandam', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(797, 40, 'Koto Mudik', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(798, 40, 'Koto Ilie', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(799, 40, 'Pinang', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(800, 40, 'Tanggalo', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(801, 40, 'Silukah', NULL, NULL, NULL, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(802, 41, 'Koto Benek', NULL, NULL, 555, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(803, 41, 'Silabau', NULL, NULL, 593, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(804, 41, 'Kapalo Koto', NULL, NULL, 535, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(805, 41, 'Tanggalo', NULL, NULL, 878, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(806, 41, 'Padang Doto', NULL, NULL, 575, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(807, 41, 'Kulampi', NULL, NULL, 220, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(808, 41, 'Sungai Duo', NULL, NULL, 436, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(809, 42, 'Padang Ranah', NULL, NULL, 679, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(810, 42, 'Tapian Nanto', NULL, NULL, 896, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(811, 42, 'Kandang Harimau', NULL, NULL, 744, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(812, 42, 'Tapian Diaro', NULL, NULL, 530, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(813, 42, 'Kampung Berlian', NULL, NULL, 934, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(814, 42, 'Pudak', NULL, NULL, 794, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(815, 42, 'Kampung Baru', NULL, NULL, 976, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(816, 42, 'Pasar Sijunjung', NULL, NULL, 922, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(817, 42, 'Tanah Bato', NULL, NULL, 1232, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(818, 42, 'Ganting', NULL, NULL, 2485, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(819, 44, 'Simawik', NULL, NULL, 552, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(820, 44, 'Rumbai', NULL, NULL, 466, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(821, 44, 'Sungai Tampang', NULL, NULL, 662, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(822, 44, 'Sibolin', NULL, NULL, 242, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(823, 44, 'Koto Sisawah', NULL, NULL, 485, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(824, 44, 'Koto Baru', NULL, NULL, 536, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(825, 44, 'Kabun', NULL, NULL, 589, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(826, 45, 'Koto Unggan', NULL, NULL, 948, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(827, 45, 'Unggan Bukik', NULL, NULL, 783, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(828, 45, 'Taratak Aro', NULL, NULL, 604, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(829, 45, 'Lubuak Batapuak Unggan', NULL, NULL, 681, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(830, 45, 'Kinkin', NULL, NULL, 350, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(831, 45, 'Koto Tangah', NULL, NULL, 413, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(832, 45, 'Koto Ateh', NULL, NULL, 398, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(833, 45, 'Ujung Koto', NULL, NULL, 504, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(834, 45, 'Batang Kinkin', NULL, NULL, 426, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(835, 46, 'Bonai', NULL, NULL, 470, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(836, 46, 'Koto Tinggi', NULL, NULL, 465, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(837, 46, 'Pauh', NULL, NULL, 383, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(838, 46, 'Loban Bungkuok', NULL, NULL, 431, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(839, 46, 'Koto Baru', NULL, NULL, 674, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(840, 46, 'Koto Tangah', NULL, NULL, 501, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(841, 47, 'Pintu Rayo', NULL, NULL, 388, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(842, 47, 'Taratak Ujung Luhak', NULL, NULL, 420, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(843, 47, 'Taratak Tangah', NULL, NULL, 328, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(844, 47, 'Taratak Sipuah', NULL, NULL, 257, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(845, 47, 'Tombang', NULL, NULL, 470, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(846, 47, 'Kampung Rajo', NULL, NULL, 320, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(847, 47, 'Koto', NULL, NULL, 393, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(848, 47, 'Batang Somi', NULL, NULL, 440, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(849, 47, 'Payo Sahadat', NULL, NULL, 327, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(850, 48, 'Sitongek', NULL, NULL, 399, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(851, 48, 'Koto Lamo', NULL, NULL, 348, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(852, 48, 'Pangkahan Sungai Laban', NULL, NULL, 132, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(853, 48, 'Simaru', NULL, NULL, 520, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(854, 48, 'Sitongek Selatan', NULL, NULL, 277, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(855, 48, 'Koto Lamo Utara', NULL, NULL, 355, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(856, 49, 'Tanjung Alam', NULL, NULL, 801, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(857, 49, 'Tanjung Raya', NULL, NULL, 338, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(858, 49, 'Tanjung Gadang', NULL, NULL, 354, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(859, 49, 'Tanjung Gadang Utara', NULL, NULL, 362, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(860, 50, 'Tapi Balai', NULL, NULL, 466, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(861, 50, 'Balai Lamo', NULL, NULL, 578, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(862, 50, 'Taruko', NULL, NULL, 488, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(863, 52, 'Simpang Tigo Sabiluru', NULL, NULL, 560, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(864, 52, 'Sipuah', NULL, NULL, 419, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(865, 52, 'Simpang Sawah Silupak', NULL, NULL, 261, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(866, 53, 'Pincuran Tujuh', NULL, NULL, 666, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(867, 53, 'Air Seriau', NULL, NULL, 519, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(868, 53, 'Payo Lawe', NULL, NULL, 415, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(869, 53, 'Kuok', NULL, NULL, 396, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(870, 53, 'Koto Puntian', NULL, NULL, 300, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(871, 53, 'Uncang Labuah', NULL, NULL, 426, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(872, 53, 'Calau', NULL, NULL, 766, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(873, 53, 'Kampung Baru', NULL, NULL, 519, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(874, 54, 'Balai-Balai', NULL, NULL, 748, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(875, 54, 'Koto Timbulun', NULL, NULL, 867, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(876, 54, 'Sibisir', NULL, NULL, 957, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(877, 54, 'Tandikek', NULL, NULL, 629, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(878, 55, 'Pasar Tanjung Gadang', NULL, NULL, 456, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(879, 55, 'Mudik Malih', NULL, NULL, 137, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(880, 55, 'Guguk Naneh', NULL, NULL, 371, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(881, 55, 'Pandam', NULL, NULL, 193, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(882, 55, 'Koto Baru', NULL, NULL, 256, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(883, 55, 'Koto Ranah', NULL, NULL, 306, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(884, 55, 'Sungai Napar', NULL, NULL, 136, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(885, 55, 'Timbulun Patah', NULL, NULL, 185, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(886, 55, 'Kayu Gadih', NULL, NULL, 227, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(887, 56, 'Koto', NULL, NULL, 166, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(888, 56, 'Ranah Palam', NULL, NULL, 144, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(889, 56, 'Koto Ranah', NULL, NULL, 109, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(890, 57, 'Padang Laweh', NULL, NULL, 538, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(891, 57, 'Sungai Kandi', NULL, NULL, 143, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(892, 57, 'Koto Pulasan', NULL, NULL, 720, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(893, 57, 'Sawah Gadang', NULL, NULL, 178, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(894, 57, 'Ambacang', NULL, NULL, 756, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(895, 57, 'Pasar Pulasan', NULL, NULL, 823, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(896, 57, 'Batang Kati', NULL, NULL, 484, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(897, 58, 'Koto Langki', NULL, NULL, 141, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(898, 58, 'Liambang', NULL, NULL, 271, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(899, 58, 'Muaro Kaluai', NULL, NULL, 82, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(900, 58, 'Muaro Linggo', NULL, NULL, 192, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(901, 59, 'Bancah', NULL, NULL, 173, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(902, 59, 'Lubuk Tolang', NULL, NULL, 87, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(903, 59, 'Koto', NULL, NULL, 270, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(904, 60, 'Pasar Lamo', NULL, NULL, 212, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(905, 60, 'Bukik Sabalah', NULL, NULL, 291, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(906, 60, 'Koto', NULL, NULL, 174, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(907, 60, 'Batang Dikek', NULL, NULL, 266, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(908, 60, 'Pasar Baru', NULL, NULL, 207, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(909, 60, 'Tanjung Medan', NULL, NULL, 219, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(910, 61, 'Lubuk Cupak', NULL, NULL, 232, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(911, 61, 'Pisang Kolek', NULL, NULL, 201, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(912, 62, 'Koto Sinyamu', NULL, NULL, 108, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(913, 62, 'Polak Sinyamu', NULL, NULL, 89, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44'),
(914, 62, 'Kumbayak', NULL, NULL, 95, NULL, '2025-07-25 08:41:44', '2025-07-25 08:41:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatans`
--

CREATE TABLE `kecamatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kecamatans`
--

INSERT INTO `kecamatans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'SIJUNJUNG', '2025-07-25 04:29:04', '2025-07-25 04:29:04'),
(2, 'KOTO VII', '2025-07-25 04:29:04', '2025-07-25 04:29:04'),
(3, 'IV NAGARI', '2025-07-25 04:29:04', '2025-07-25 04:29:04'),
(4, 'SUMPUR KUDUS', '2025-07-25 04:29:04', '2025-07-25 04:29:04'),
(5, 'KUPITAN', '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(6, 'LUBUK TAROK', '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(7, 'TANJUNG GADANG', '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(8, 'KAMANG BARU', '2025-07-25 04:29:05', '2025-07-25 04:29:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapors`
--

CREATE TABLE `lapors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_tiket` varchar(255) NOT NULL,
  `tgl_laporan` datetime NOT NULL,
  `nama_pelapor` varchar(255) NOT NULL,
  `nomor_kontak` varchar(255) NOT NULL,
  `opd_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_laporan` enum('Laporan Gangguan','Koordinasi Teknis','Kenaikan Bandwidth') NOT NULL DEFAULT 'Laporan Gangguan',
  `uraian_laporan` text DEFAULT NULL,
  `file_laporan` varchar(255) DEFAULT NULL,
  `foto_laporan` varchar(255) DEFAULT NULL,
  `status_laporan` varchar(255) NOT NULL DEFAULT 'Belum Diproses',
  `petugas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `keterangan_petugas` varchar(255) NOT NULL DEFAULT 'belum ada',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lapors`
--

INSERT INTO `lapors` (`id`, `no_tiket`, `tgl_laporan`, `nama_pelapor`, `nomor_kontak`, `opd_id`, `jenis_laporan`, `uraian_laporan`, `file_laporan`, `foto_laporan`, `status_laporan`, `petugas_id`, `keterangan_petugas`, `created_at`, `updated_at`) VALUES
(13, 'TIK-20250728-wbvWf', '2025-07-28 01:55:15', 'Ahmad Fauzi', '08123456789', 12, 'Laporan Gangguan', 'Jaringan internet terputus sejak pukul 09.00 WIB. Seluruh komputer di kantor tidak dapat mengakses internet.', NULL, NULL, 'Belum Diproses', NULL, 'belum ada', '2025-07-27 18:55:15', '2025-07-27 18:55:15'),
(14, 'TIK-20250728-b4ySX', '2025-07-27 22:55:15', 'Rudi Hartono', '08123456449', 15, 'Laporan Gangguan', 'Koneksi internet lambat dan sering terputus. Mengganggu proses kerja terutama saat mengakses aplikasi online.', NULL, NULL, 'Belum Diproses', NULL, 'belum ada', '2025-07-27 18:55:15', '2025-07-27 18:55:15'),
(15, 'TIK-20250728-kgwtt', '2025-07-27 20:55:15', 'Siti Rahma', '0812345649', 18, 'Koordinasi Teknis', 'Membutuhkan bantuan teknis untuk instalasi jaringan LAN di ruang rapat baru.', NULL, NULL, 'Belum Diproses', NULL, 'belum ada', '2025-07-27 18:55:15', '2025-07-27 18:55:15'),
(16, 'TIK-20250728-SO50R', '2025-07-27 17:55:15', 'Budi Santoso', '08123456123', 13, 'Laporan Gangguan', 'Server database rumah sakit tidak dapat diakses, mengganggu sistem informasi pasien.', NULL, NULL, 'Sedang Diproses', NULL, 'Tim teknis sedang melakukan pengecekan server', '2025-07-27 18:55:15', '2025-07-27 18:55:15'),
(17, 'TIK-20250728-pOPjK', '2025-07-27 01:55:15', 'Dewi Sartika', '08123456456', 16, 'Koordinasi Teknis', 'Permintaan instalasi WiFi untuk ruang pelayanan masyarakat.', NULL, NULL, 'Selesai Diproses', NULL, 'Instalasi WiFi telah selesai dan berfungsi dengan baik', '2025-07-27 18:55:15', '2025-07-27 18:55:15'),
(18, 'TIK-20250728-4uUie', '2025-07-27 23:55:15', 'Andi Wijaya', '08123456888', 14, 'Laporan Gangguan', 'Printer jaringan tidak dapat mencetak dokumen, lampu indikator berkedip merah.', NULL, NULL, 'Belum Diproses', NULL, 'belum ada', '2025-07-27 18:55:15', '2025-07-27 18:55:15'),
(19, 'TIK-20250728-690wv', '2025-07-27 19:55:15', 'Maya Sari', '08123456321', 17, 'Koordinasi Teknis', 'Membutuhkan upgrade sistem keamanan jaringan untuk melindungi data wisatawan.', NULL, NULL, 'Sedang Diproses', NULL, 'Sedang melakukan analisis kebutuhan sistem keamanan', '2025-07-27 18:55:15', '2025-07-27 18:55:15'),
(20, 'TIK-20250728-L8vOh', '2025-07-26 01:55:15', 'Hendra Gunawan', '08123456654', 19, 'Laporan Gangguan', 'Komputer kasir tidak dapat terhubung ke sistem pembayaran online.', NULL, NULL, 'Selesai Diproses', NULL, 'Masalah koneksi telah diperbaiki, sistem pembayaran normal kembali', '2025-07-27 18:55:15', '2025-07-27 18:55:15'),
(21, 'TIK-20250728-qbv8b', '2025-07-28 00:55:15', 'Ratna Dewi', '08123456987', 20, 'Koordinasi Teknis', 'Permintaan integrasi sistem e-KTP dengan database pusat untuk mempercepat pelayanan.', NULL, NULL, 'Belum Diproses', NULL, 'belum ada', '2025-07-27 18:55:15', '2025-07-27 18:55:15'),
(22, 'TIK-20250728-Bff1m', '2025-07-27 21:55:15', 'Agus Salim', '08123456147', 21, 'Laporan Gangguan', 'Sistem monitoring CCTV jalan raya mengalami gangguan, beberapa kamera tidak menampilkan gambar.', NULL, NULL, 'Sedang Diproses', NULL, 'Tim sedang melakukan pengecekan kamera dan jaringan', '2025-07-27 18:55:15', '2025-07-27 18:55:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000001_create_permission_tables', 1),
(4, '0001_01_01_000002_create_jobs_table', 1),
(5, '0001_01_01_000003_create_opds_table', 1),
(6, '0001_01_01_000004_create_lapors_table', 1),
(7, '0001_01_01_000005_create_kecamatans_table', 1),
(8, '0001_01_01_000006_create_nagaris_table', 1),
(9, '0001_01_01_000007_create_jorongs_table', 1),
(10, '0001_01_01_000008_create_operators_table', 1),
(11, '2025_02_06_111702_create_bts_table', 1),
(12, '2025_02_06_152915_create_peralatans_table', 1),
(13, '2025_02_06_152918_create_inventaris_table', 1),
(14, '2025_02_07_110938_create_notifications_table', 1),
(15, '2025_05_25_005503_create_tindak_lanjuts_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nagaris`
--

CREATE TABLE `nagaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_nagari` varchar(255) DEFAULT NULL,
  `nama_wali_nagari` varchar(255) DEFAULT NULL,
  `kontak_wali_nagari` varchar(255) DEFAULT NULL,
  `alamat_kantor_nagari` varchar(255) DEFAULT NULL,
  `jumlah_penduduk_nagari` int(11) DEFAULT NULL,
  `jumlah_jorong` int(11) DEFAULT NULL,
  `luas_nagari` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nagaris`
--

INSERT INTO `nagaris` (`id`, `kecamatan_id`, `nama_nagari`, `nama_wali_nagari`, `kontak_wali_nagari`, `alamat_kantor_nagari`, `jumlah_penduduk_nagari`, `jumlah_jorong`, `luas_nagari`, `created_at`, `updated_at`) VALUES
(1, 3, 'Palangki', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(2, 3, 'Koto Baru', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(3, 3, 'Muaro Bodi', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(4, 3, 'Mundam Sakti', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(5, 3, 'Koto Tuo', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(6, 8, 'Sungai Lansek', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(7, 8, 'Kamang', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(8, 8, 'Muaro Takuang', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(9, 8, 'Aia Amo', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(10, 8, 'Sungai Batuang', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(11, 8, 'Kunangan Parit Rantang', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(12, 8, 'Tanjuang Kaliang', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(13, 8, 'Padang Tarok', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(14, 8, 'Siaur', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(15, 8, 'Lubuk Tarantang', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(16, 8, 'Maloro', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(17, 2, 'Limo Koto', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(18, 2, 'Palaluar', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(19, 2, 'Guguk', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(20, 2, 'Padang Laweh', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(21, 2, 'Tanjung', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(22, 2, 'Bukit Bual', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(23, 2, 'Padang Laweh Selatan', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(24, 5, 'Batu Manjulur', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(25, 5, 'Pamuatan', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(26, 5, 'Padang Sibusuk', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(27, 5, 'Desa Kampung Baru', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(28, 6, 'Lubuk Tarok', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(29, 6, 'Lalan', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(30, 6, 'Buluh Kasok', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(31, 6, 'Kampung Dalam', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(32, 6, 'Latang', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(33, 6, 'Silongo', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(34, 1, 'Muaro', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(35, 1, 'Kandang Baru', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(36, 1, 'Silokek', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(37, 1, 'Pematang Panjang', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(38, 1, 'Solok Ambah', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(39, 1, 'Paru', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(40, 1, 'Durian Gadang', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(41, 1, 'Aie Angek', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(42, 1, 'Sijunjung', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(43, 4, 'Silantai', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(44, 4, 'Sisawah', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(45, 4, 'Unggan', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(46, 4, 'Tanjung Bonai Aur', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(47, 4, 'Sumpur Kudus', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(48, 4, 'Tamparungo', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(49, 4, 'Kumanis', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(50, 4, 'Mangganti', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(51, 4, 'Sumpur Kudus Selatan', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(52, 4, 'Tanjung Labuh', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(53, 4, 'Tanjung Bonai Aur Selatan', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(54, 7, 'Timbulun', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(55, 7, 'Tanjung Gadang', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(56, 7, 'Taratak Baru', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(57, 7, 'Pulasan', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(58, 7, 'Langki', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(59, 7, 'Sibakur', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(60, 7, 'Tanjung Lolo', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(61, 7, 'Taratak Baru Utara', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05'),
(62, 7, 'Sinyamu', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-25 04:29:05', '2025-07-25 04:29:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `opds`
--

CREATE TABLE `opds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `opds`
--

INSERT INTO `opds` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'BAPPPEDA', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(2, 'BKAD', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(3, 'BKPSDM', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(4, 'BPBD', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(5, 'BPP Kamang Baru', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(6, 'BPP Kupitan', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(7, 'BPP Sijunjung', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(8, 'BPP Sumpur Kudus', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(9, 'Dinas Kependudukan dan Pencatatan Sipil', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(10, 'Dinas Kesehatan', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(11, 'Dinas Ketenagakerjaan dan Transmigrasi', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(12, 'Dinas Komunikasi dan Informatika', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(13, 'Dinas Pangan dan Perikanan', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(14, 'Dinas Pariwisata,Pemuda dan Olahraga', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(15, 'Dinas Pekerjaan Umum dan Penataan Ruang', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(16, 'Dinas Pemberdayaan Masyarakat dan Nagari', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(17, 'Dinas Penanaman Modal dan Pelayanan Terpadu satu Pintu ', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(18, 'Dinas Pendidikan dan Kebudayaan', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(19, 'Dinas Pengendalian Penduduk dan Keluarga Berencana', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(20, 'Dinas Perdagangan,Perindustrian,Koperasi Usaha Kecil dan Menengah', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(21, 'Dinas Perhubungan', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(22, 'Dinas Perpustakaan dan Kearsipan', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(23, 'Dinas Pertanian', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(24, 'Dinas Perumahan,Kawasan Permukiman dan Lingkungan Hidup', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(25, 'Dinas Sosial,Pemberdayaan Perempuan dan Perlindungan Anak', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(26, 'Inspektorat Daerah', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(27, 'Kecamatan IV Nagari ', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(28, 'Kecamatan Kamang Baru', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(29, 'Kecamatan Koto VII', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(30, 'Kecamatan Kupitan', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(31, 'Kecamatan Lubuk Tarok', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(32, 'Kecamatan Sijunjung', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(33, 'Kecamatan Tanjung GAdang', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(34, 'Kecamatan Sumpur Kudus', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(35, 'KESBANGPOL', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(36, 'Puskesmas Gambok', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(37, 'Puskesmas Kamang', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(38, 'Puskesmas Kumanis', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(39, 'Puskesmas Lubuk Tarok', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(40, 'Puskesmas Muaro Bodi', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(41, 'Puskesmas Padang Laweh', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(42, 'Puskesmas Padang Sibusuk', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(43, 'Puskesmas Sijunjung', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(44, 'Puskesmas Sungai Lansek', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(45, 'Puskesmas Tanjung Ampalu', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(46, 'Puskesmas Tanjung Gadang', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(47, 'RSUD', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(48, 'Satpol PP dan Pemadam Kebakaran', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(49, 'Sekretariat Daerah', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(50, 'Sekretariat DPRD', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(51, 'UPTD Alat Berat', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(52, 'UPTD Alsintan', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(53, 'UPTD Balai Penyuluh Pertanian', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(54, 'UPTD Gudang Farmasi', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(55, 'UPTD Labkesda', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(56, 'UPTD Labor Uji Mutu', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(57, 'UPTD Laboratorium Lingkungan', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(58, 'UPTD Pasar Ternak', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(59, 'UPTD Pengujian Kendaraan Bermotor', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(60, 'UPTD Perlindungan Perempuan dan Anak', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(61, 'UPTD Puskeswan Palangki', '2025-07-25 04:29:07', '2025-07-25 04:29:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `operators`
--

CREATE TABLE `operators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_operator` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `operators`
--

INSERT INTO `operators` (`id`, `nama_operator`, `created_at`, `updated_at`) VALUES
(1, 'TELKOMSEL', '2025-07-25 04:29:04', '2025-07-25 04:29:04'),
(2, 'INDOSAT', '2025-07-25 04:29:04', '2025-07-25 04:29:04'),
(3, 'XL AXIATA', '2025-07-25 04:29:04', '2025-07-25 04:29:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peralatans`
--

CREATE TABLE `peralatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_peralatan` varchar(255) NOT NULL,
  `tahun_pengadaan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peralatans`
--

INSERT INTO `peralatans` (`id`, `nama`, `jenis_peralatan`, `tahun_pengadaan`, `created_at`, `updated_at`) VALUES
(1, 'Mikrotik RB1100Dx4', 'Router', '2022', '2025-07-25 04:29:04', '2025-07-25 04:29:04'),
(2, 'Mikrotik RB2011UiAS-2HnD', 'Router', '2022', '2025-07-25 04:29:04', '2025-07-25 04:29:04'),
(3, 'Mikrotik RB951Ui-2HnD', 'Router', '2022', '2025-07-25 04:29:04', '2025-07-25 04:29:04'),
(4, 'Mikrotik RB4011iGS+', 'Router', '2022', '2025-07-25 04:29:04', '2025-07-25 04:29:04'),
(5, 'TP Link', 'Hub', '2022', '2025-07-25 04:29:04', '2025-07-25 04:29:04'),
(6, 'Netis', 'Hub', '2022', '2025-07-25 04:29:04', '2025-07-25 04:29:04'),
(7, 'Ruijie AP720L', 'Akses Point', '2022', '2025-07-25 04:29:04', '2025-07-25 04:29:04'),
(8, 'Ruijie Outdor RG-EAP602', 'Akses Point', '2022', '2025-07-25 04:29:04', '2025-07-25 04:29:04'),
(9, 'Unifie', 'Akses Point', '2022', '2025-07-25 04:29:04', '2025-07-25 04:29:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_bts', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(2, 'view_any_bts', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(3, 'create_bts', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(4, 'update_bts', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(5, 'restore_bts', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(6, 'restore_any_bts', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(7, 'replicate_bts', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(8, 'reorder_bts', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(9, 'delete_bts', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(10, 'delete_any_bts', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(11, 'force_delete_bts', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(12, 'force_delete_any_bts', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(13, 'view_inventaris', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(14, 'view_any_inventaris', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(15, 'create_inventaris', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(16, 'update_inventaris', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(17, 'restore_inventaris', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(18, 'restore_any_inventaris', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(19, 'replicate_inventaris', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(20, 'reorder_inventaris', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(21, 'delete_inventaris', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(22, 'delete_any_inventaris', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(23, 'force_delete_inventaris', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(24, 'force_delete_any_inventaris', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(25, 'view_jorong', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(26, 'view_any_jorong', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(27, 'create_jorong', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(28, 'update_jorong', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(29, 'restore_jorong', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(30, 'restore_any_jorong', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(31, 'replicate_jorong', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(32, 'reorder_jorong', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(33, 'delete_jorong', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(34, 'delete_any_jorong', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(35, 'force_delete_jorong', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(36, 'force_delete_any_jorong', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(37, 'view_kecamatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(38, 'view_any_kecamatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(39, 'create_kecamatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(40, 'update_kecamatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(41, 'restore_kecamatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(42, 'restore_any_kecamatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(43, 'replicate_kecamatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(44, 'reorder_kecamatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(45, 'delete_kecamatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(46, 'delete_any_kecamatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(47, 'force_delete_kecamatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(48, 'force_delete_any_kecamatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(49, 'view_lapor', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(50, 'view_any_lapor', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(51, 'create_lapor', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(52, 'update_lapor', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(53, 'restore_lapor', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(54, 'restore_any_lapor', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(55, 'replicate_lapor', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(56, 'reorder_lapor', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(57, 'delete_lapor', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(58, 'delete_any_lapor', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(59, 'force_delete_lapor', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(60, 'force_delete_any_lapor', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(61, 'view_nagari', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(62, 'view_any_nagari', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(63, 'create_nagari', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(64, 'update_nagari', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(65, 'restore_nagari', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(66, 'restore_any_nagari', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(67, 'replicate_nagari', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(68, 'reorder_nagari', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(69, 'delete_nagari', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(70, 'delete_any_nagari', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(71, 'force_delete_nagari', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(72, 'force_delete_any_nagari', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(73, 'view_opd', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(74, 'view_any_opd', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(75, 'create_opd', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(76, 'update_opd', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(77, 'restore_opd', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(78, 'restore_any_opd', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(79, 'replicate_opd', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(80, 'reorder_opd', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(81, 'delete_opd', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(82, 'delete_any_opd', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(83, 'force_delete_opd', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(84, 'force_delete_any_opd', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(85, 'view_operator', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(86, 'view_any_operator', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(87, 'create_operator', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(88, 'update_operator', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(89, 'restore_operator', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(90, 'restore_any_operator', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(91, 'replicate_operator', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(92, 'reorder_operator', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(93, 'delete_operator', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(94, 'delete_any_operator', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(95, 'force_delete_operator', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(96, 'force_delete_any_operator', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(97, 'view_peralatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(98, 'view_any_peralatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(99, 'create_peralatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(100, 'update_peralatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(101, 'restore_peralatan', 'web', '2025-07-25 04:29:08', '2025-07-25 04:29:08'),
(102, 'restore_any_peralatan', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(103, 'replicate_peralatan', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(104, 'reorder_peralatan', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(105, 'delete_peralatan', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(106, 'delete_any_peralatan', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(107, 'force_delete_peralatan', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(108, 'force_delete_any_peralatan', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(109, 'view_role', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(110, 'view_any_role', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(111, 'create_role', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(112, 'update_role', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(113, 'delete_role', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(114, 'delete_any_role', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(115, 'view_user', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(116, 'view_any_user', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(117, 'create_user', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(118, 'update_user', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(119, 'restore_user', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(120, 'restore_any_user', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(121, 'replicate_user', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(122, 'reorder_user', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(123, 'delete_user', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(124, 'delete_any_user', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(125, 'force_delete_user', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(126, 'force_delete_any_user', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(127, 'widget_StatsLaporan', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(128, 'widget_StatsOverview', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2025-07-25 04:29:07', '2025-07-25 04:29:07'),
(2, 'petugas', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09'),
(3, 'pengguna', 'web', '2025-07-25 04:29:09', '2025-07-25 04:29:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(25, 3),
(26, 1),
(26, 2),
(26, 3),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(37, 3),
(38, 1),
(38, 2),
(38, 3),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(49, 3),
(50, 1),
(50, 2),
(50, 3),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(61, 3),
(62, 1),
(62, 2),
(62, 3),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(67, 1),
(67, 2),
(68, 1),
(68, 2),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(71, 1),
(71, 2),
(72, 1),
(72, 2),
(73, 1),
(73, 2),
(73, 3),
(74, 1),
(74, 2),
(74, 3),
(75, 1),
(75, 2),
(76, 1),
(76, 2),
(77, 1),
(77, 2),
(78, 1),
(78, 2),
(79, 1),
(79, 2),
(80, 1),
(80, 2),
(81, 1),
(81, 2),
(82, 1),
(82, 2),
(83, 1),
(83, 2),
(84, 1),
(84, 2),
(85, 1),
(85, 2),
(85, 3),
(86, 1),
(86, 2),
(86, 3),
(87, 1),
(87, 2),
(88, 1),
(88, 2),
(89, 1),
(89, 2),
(90, 1),
(90, 2),
(91, 1),
(91, 2),
(92, 1),
(92, 2),
(93, 1),
(93, 2),
(94, 1),
(94, 2),
(95, 1),
(95, 2),
(96, 1),
(96, 2),
(97, 1),
(97, 2),
(97, 3),
(98, 1),
(98, 2),
(98, 3),
(99, 1),
(99, 2),
(100, 1),
(100, 2),
(101, 1),
(101, 2),
(102, 1),
(102, 2),
(103, 1),
(103, 2),
(104, 1),
(104, 2),
(105, 1),
(105, 2),
(106, 1),
(106, 2),
(107, 1),
(107, 2),
(108, 1),
(108, 2),
(109, 1),
(109, 2),
(109, 3),
(110, 1),
(110, 2),
(110, 3),
(111, 1),
(111, 2),
(112, 1),
(112, 2),
(113, 1),
(113, 2),
(114, 1),
(114, 2),
(115, 1),
(115, 2),
(115, 3),
(116, 1),
(116, 2),
(116, 3),
(117, 1),
(117, 2),
(118, 1),
(118, 2),
(119, 1),
(119, 2),
(120, 1),
(120, 2),
(121, 1),
(121, 2),
(122, 1),
(122, 2),
(123, 1),
(123, 2),
(124, 1),
(124, 2),
(125, 1),
(125, 2),
(126, 1),
(126, 2),
(127, 1),
(127, 2),
(128, 1),
(128, 2),
(128, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0gbRT6wUlgZQviEUwUDcqHr5gx9fa9TrAA3HoQ9v', NULL, '108.136.184.6', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/533.20.25 (KHTML, like Gecko) Version/5.0.4 Safari/533.20.27', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSzVxSGx1RnMwOE9Ldm1kOXJlejdSSEZvMmZzOXlOc2RMWXdVQVlRRiI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YToxOntzOjI2OiIwMUsxMDZSSzhNNFFOMFBQUzM1RVNZQ0I4SyI7Tjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzI6Imh0dHBzOi8vd3d3LmluZnJhc3RydWt0dXIuc2lqdW5qdW5nLmdvLmlkLnN1Y2Nlc3NtYW5kaXJpLmNvbS9hZG1pbi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MjE6ImZpbGFtZW50X2NhcHRjaGFfY29kZSI7czo1OiI1Q09TUCI7fQ==', 1753427496),
('0z8soImUK4uJZsSUw5X68g4NdrVunHIwraUSlNcd', NULL, '35.208.88.196', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.7049.52 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVjBNRW1UT3RkUUg1ZjhLeU1xTUN3d0RheW10WFZuOHBqeFB3eW9WNSI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvYnRzLW1hcC1kYXRhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753549747),
('1mo2nZ3lR2Keb8UZobnQxlCljRQHWcesemoDF2G9', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiczZCc1ZmakxwU1F5WVpBSUZlNTZGTTd5cnZ0Nm8waTdXUksxalFSTSI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753478155),
('1X4uwijWrhUkeMT596Ce4yi58E4oBAbmRcrNHJET', NULL, '20.169.6.231', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.0; +https://openai.com/searchbot', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicEY2VXVEQ2VkWHFNR0ZWTFdMZzR6bGlKcjNZU3B0T3NtbHJqR2wxNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvc3RhdHMtZGF0YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753610202),
('2oVbgvS22KfCkQDKQHjUlDWWkq9XFrdxHMobRHTZ', NULL, '205.210.31.9', '', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibVFsSEI0U1o2U0dFUGY4b0tReUdGdmQ4dWdVTlpoT2pmc3dwN3RrayI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753525810),
('5ahcqcxbpFnMlj5GAu5RPczjnXtnIXz1lUnUYWrw', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicndJaVJxaUJTMGJ6dEEzSlJaYkl1cEhPOTV0ZmFMNjZ6UHdYYk5aVSI7czo1OiJlcnJvciI7czoyNDoiSGFsYW1hbiB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YToxOntzOjI2OiIwMUsxMVEyNjVWRkRDU1dCQlNKMkdHNjlWUiI7Tjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODQ6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvbGliL3BrcC9saWIvdmVuZG9yL2xlYWd1ZS9jb21tb25tYXJrL3NyYy9JbnB1dCI7fX0=', 1753478142),
('60rzbiBhE5JSzq8w3ZNmRuWGkGtpj1xPd2wmP1aT', NULL, '36.77.106.235', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYnNaVDdwQXc4eDIxOHNnOXFFTmhpcDBTbTRBYXd6ajRKWTZoQXpYaSI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvYnRzLW1hcC1kYXRhIjt9fQ==', 1753621365),
('6tkVBVi3r0uEFAVyACiHyYERN0XpEPeGoodaMoob', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYzJCVXBtZ29oejh6TDhLSTBoU2NKN002OVZGWUJCZFBVVDVEeXRBdSI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753478142),
('7a4QW2hOoSNwZAVlc2O3aJGjDJ5vf0krYVJTuCq6', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieUN3Rjh3S2hHc25lQUd1elY3MzgwTDBycmNEdmh6MFRKSlhaVlVCZyI7czo1OiJlcnJvciI7czoyNDoiSGFsYW1hbiB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YToxOntzOjI2OiIwMUsxMVExOVJQUEQ4RlNUS0NaS0ZDUE44MCI7Tjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTQ6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvbGliL3BrcC9saWIvdmVuZG9yL2xlYWd1ZS9jb21tb25tYXJrL3NyYy9FeHRlbnNpb24vVGFibGUiO319', 1753478113),
('7jwX82Kv0tJlGxTegMPQEDHEKAet4b7E4xdis4WY', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSklQV2NaRDNqSTVtazJaVWNVRFpQOEJhdjZRcHZ5bzg0c0FIb2duVyI7czo1OiJlcnJvciI7czoyNDoiSGFsYW1hbiB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YToxOntzOjI2OiIwMUsxMVExWkpKSzdHS1FCMkRYTU1XRTVGVyI7Tjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvbGliL3BrcC9saWIvdmVuZG9yL2xlYWd1ZS9jb21tb25tYXJrL3NyYy9FeHRlbnNpb24vVGFza0xpc3QiO319', 1753478135),
('9jzXxhUSwwTPZ0UQgJZkv7NZfsBLkchzWWTYADF3', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicWF2TXd0R0JSbTdzRVNZQ1RSU29Jek1BZGZqMmpScnJiR0tSWFppbSI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753478152),
('aV5PcSbSt7jt0vNQj9oqHKpbraaI8YKFZkYUTSGB', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTlRsd2RyRUhJNTZIT2prQzB4OHhOdnpXU0lQMUZvZFkyTnBUbHVHRiI7czo1OiJlcnJvciI7czoyNDoiSGFsYW1hbiB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YToxOntzOjI2OiIwMUsxMVEyRlJNNTJWQVFCRFFTUEpaVEdBMCI7Tjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTA6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvbGliL3BrcC9saWIvdmVuZG9yL2xlYWd1ZS9jb21tb25tYXJrL3NyYy9Ob2RlL0lubGluZSI7fX0=', 1753478151),
('B2KbDLnJZYwQyxqaKd91OXqxBoCtvz1IT3z0bTlb', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidHpEdXBKVXE0SWR6QmhPZ0I1RE54cGxZVzBoMEZ5a3AwUWJFQlMydiI7czo1OiJlcnJvciI7czoyNDoiSGFsYW1hbiB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YToxOntzOjI2OiIwMUsxMVEyVlkwMjJHMjkyN1RWS1pXUldGOCI7Tjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODk6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvbGliL3BrcC9saWIvdmVuZG9yL2xlYWd1ZS9jb21tb25tYXJrL3NyYy9Ob3JtYWxpemVyIjt9fQ==', 1753478164),
('cFlFl0QCf9DQrXkPCLyU2Yo9z8EVrk9cy9wBQMLF', NULL, '34.235.48.77', 'Mozilla/5.0 (compatible)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidGZ5endWaDBQT1l3Qmh4R3lBd01ZZVlkVUlZQmNnTmRwVGhVQnlXbSI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753420932),
('ChQiJQGhrj0htejRf6r6jSAzd9WkXa46o5qr6hE3', 9, '36.77.106.235', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiTjhEM2F5N0Q5enhLZ2xzYmdzaFZMVGlYNU5kbEpMN3F0T1pDMVhoayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvc3RhdHMtZGF0YSI7fXM6MjI6IlBIUERFQlVHQkFSX1NUQUNLX0RBVEEiO2E6MDp7fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfM2RjN2E5MTNlZjVmZDRiODkwZWNhYmUzNDg3MDg1NTczZTE2Y2Y4MiI7aTo5O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkbDg2ajlEbTVLd0pZZFIzTllsYXRrdWhyTWlGZ1hCSmhUYTlFbktYR3AuZjhmL1ZqT2o1MWUiO30=', 1753646299),
('Cwp4uQN8obKAUEUm4PUFwFpzsvxuYendAuCyeXqj', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNFRHZmFBamV2ajVmUmlkek5yQ0JpVmxyTnZ1VzJVa3VHRXZxZmtrbSI7czo1OiJlcnJvciI7czoyNDoiSGFsYW1hbiB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YToxOntzOjI2OiIwMUsxMVExVkdLNzlaRlZWSllONVozNFZNNyI7Tjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTE1OiJodHRwczovL2luZnJhc3RydWt0dXIuc2lqdW5qdW5nLmdvLmlkL2xpYi9wa3AvbGliL3ZlbmRvci9sZWFndWUvY29tbW9ubWFyay9zcmMvRXh0ZW5zaW9uL1RhYmxlT2ZDb250ZW50cy9Ob3JtYWxpemVyIjt9fQ==', 1753478131),
('DBwxTQb8MyO0Kd6Mk8i1d3pBL8YLaE0SVFbPz2bN', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia0loRlJYWVliZUdTUm9FR2JpWm0wbEdXTlNQd1BJU2JRb1lLSTd0UyI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753478149),
('doOrD3JY4Z16w6DT1YkDQjpYJK2gBRf6G6828fAj', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUmNPSGVwbVlsUkxHd0JDWFdSMHJPNGNzTzlVNkRZQTg4Mzg3Y3NnZCI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753478122),
('Ebwmg3wAu9yNzMxaiifZOHuNi6Dezl7ICkPyoGYK', NULL, '172.182.211.202', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.0; +https://openai.com/searchbot', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicWJyNXFVR0VFNk1XamFOUTVjYXFXcnFIdFVESW9jWDY4SU56Y29mRCI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753608261),
('EK3yeCoa5TuQLNwsiBnENndzCIHeWiNdE3UOrzR6', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiR3EzVDltbmI0NWYwakQzYkFQUmd2UzFUOTF3TnRYd2FNbzQyMm9XQiI7czo1OiJlcnJvciI7czoyNDoiSGFsYW1hbiB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YToxOntzOjI2OiIwMUsxMVExOVJQRkZDOUEwMEcwOFlYM1RKNiI7Tjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAyOiJodHRwczovL2luZnJhc3RydWt0dXIuc2lqdW5qdW5nLmdvLmlkL2xpYi9wa3AvbGliL3ZlbmRvci9sZWFndWUvY29tbW9ubWFyay9zcmMvRXh0ZW5zaW9uL1N0cmlrZXRocm91Z2giO319', 1753478113),
('epiQotBVYBCXfOxH707YZIxlnEnLhAdX8jAfhdJG', 11, '36.77.101.176', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo3OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvYWRtaW4vam9yb25ncyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJ3Rm9OaG1GcTJFOFpLUEV0RzRGWnRVVWkwYjJEbEJOc21ZZDdqY3c1IjtzOjIyOiJQSFBERUJVR0JBUl9TVEFDS19EQVRBIjthOjE6e3M6MjY6IjAxSzBaWjJDSFg5TkM4SjY2WEZYUFpNR0JOIjtOO31zOjUwOiJsb2dpbl93ZWJfM2RjN2E5MTNlZjVmZDRiODkwZWNhYmUzNDg3MDg1NTczZTE2Y2Y4MiI7aToxMTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJGVGakZQZWR0V3JoQkRVbUdqOGtEbS5Sb3hRRnROUlo5TU54R296TFZlZXdxM2NQMlM5Y1dPIjt9', 1753433845),
('EYqn0DkrI1WlTZ0ovdSKk2tFoRv2FLoBsjSGZx7G', NULL, '182.4.71.202', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSW9hUEw5cHd2c0lkZUpQM3A1VFhaVnpzUHVSN3FlRnBjTTlZMGl2ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvbGlzdC1idHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753670468),
('fqZRkeIF4GAP0JrHLuoBvjo0i7cESPtklTdOD3my', NULL, '52.167.144.136', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV05BY1hTdHFHSWZ1aVhUMXBTaHpTZzVqWUNKNjJsY29qTlZNZ3lRQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO319', 1753610755),
('Ggu5IQudaLFUhDm2G948qn4XDErhRKp7AJHDhTkh', NULL, '36.77.98.226', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaFg5Zzh5Ykp0aUFQYkJuTnRtdmNoWkpyTGJsdXJqcWluVXNtS0t4OSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvYnRzLW1hcC1kYXRhIjt9czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9fQ==', 1753676708),
('gkd4bkHvwAS21RqPHB4H4W1FqDum5MMEpp4sXFzZ', NULL, '182.4.71.202', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXdRVHcyODNoTXFyZE9lODQ2bnlPMk9rYTdyY08xTlRrM3duNHVPMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvbGlzdC1idHMiO319', 1753670440),
('HOZ4fluF3imBqZVsmk9ZMxcsuMQtAaSLKSRQyQ2I', 11, '36.77.101.176', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoidW9rT3JPUUJoZDZzNWxhV05nTTNOaGlnVmFMWXFiSE5pSjVaRUdoZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjUxOiJodHRwczovL2luZnJhc3RydWt0dXIuc2lqdW5qdW5nLmdvLmlkL2FkbWluL2pvcm9uZ3MiO31zOjUwOiJsb2dpbl93ZWJfM2RjN2E5MTNlZjVmZDRiODkwZWNhYmUzNDg3MDg1NTczZTE2Y2Y4MiI7aToxMTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJGVGakZQZWR0V3JoQkRVbUdqOGtEbS5Sb3hRRnROUlo5TU54R296TFZlZXdxM2NQMlM5Y1dPIjtzOjg6ImZpbGFtZW50IjthOjA6e319', 1753434597),
('HuC3gErlSFgt0AmCfXPk7khmY5g7FaQ4NhnjMeqx', NULL, '205.210.31.55', '', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic1huVDJ4T2JqSFJ0U1lMY29ZbDBKZ0tCMjdPVExwZU05NjFYdmt4ViI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly93d3cuaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQuc3VjY2Vzc21hbmRpcmkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753537557),
('i05eCwtHLTc2BgXyzFOGcJehfENbxo4k1wOFHZep', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMVhucG1LOVdKclluMUhWVmVncllVMkdUQjAxeHZUam5LU2I5M0gzZCI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753478117),
('i0AwbXMDHRo3VXuF96Ec3AkKa9l3kBcY1qhttOd7', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOEdrc3FyVDkwMGRpV3N5aWJybjdJOWF6QzFLMkFDcGRmenhRbVNTUiI7czo1OiJlcnJvciI7czoyNDoiSGFsYW1hbiB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YToxOntzOjI2OiIwMUsxMVEyOUcwTkpDVjRUMlIzRzNaMUY0WiI7Tjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODM6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvbGliL3BrcC9saWIvdmVuZG9yL2xlYWd1ZS9jb21tb25tYXJrL3NyYy9Ob2RlIjt9fQ==', 1753478145),
('Ixq2KUgyzLBptmsMSFAqdWRRxpryn4JnubIl42X0', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU2VLV0hWU0NCT3dEZnNwZ2lsQ0J2Q0h4b2FLZU5wbHRNUWhVQ3dWMSI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753478165),
('jE4QmexsDKi5lJ8qhUHnu3yvK1pgOxNn0GL5WxZZ', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiU0xjeXU0blZiRjNocGpJeE5DV0JTM0NTQ2F3WXRhRVdhSmQ1VzlsdiI7czo1OiJlcnJvciI7czoyNDoiSGFsYW1hbiB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YToxOntzOjI2OiIwMUsxMVExSkhYV1lXMFpaMU5SOEY5TVNHRSI7Tjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA0OiJodHRwczovL2luZnJhc3RydWt0dXIuc2lqdW5qdW5nLmdvLmlkL2xpYi9wa3AvbGliL3ZlbmRvci9sZWFndWUvY29tbW9ubWFyay9zcmMvRXh0ZW5zaW9uL1RhYmxlT2ZDb250ZW50cyI7fX0=', 1753478122),
('Jkct1WJA2v6AIkXRSqgGP45zUnPyJfiQBCuJe2cG', NULL, '207.46.13.157', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2oxUkxFaDV6VExpRHBkMXV6WGtBa3dmYWdDNTB1Q1d3Uldxd0lrSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO319', 1753610715),
('KCaT8qNqb7U83dZvgX6jX7eC2DkccVGaE4BqkZPk', NULL, '36.77.106.235', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZXRORmZrZnhRNEpsQlc0NmhvMEY3VzBDcDJNUWZxOFlZZFNHNGdwcSI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvbGlzdC1qb3JvbmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753621494),
('lM9hg5i9xS5v1qD0gbTvtm4RTqwMTV7Rl86Plfe9', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOUEydHNuTlZYcDMzdkZpdWZ2eVgxU2lUa1VmTklYRGdHNDVlVXVjOCI7czo1OiJlcnJvciI7czoyNDoiSGFsYW1hbiB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YToxOntzOjI2OiIwMUsxMVExUFlNR1NCUFNUTTkzUDNFV05ESCI7Tjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA5OiJodHRwczovL2luZnJhc3RydWt0dXIuc2lqdW5qdW5nLmdvLmlkL2xpYi9wa3AvbGliL3ZlbmRvci9sZWFndWUvY29tbW9ubWFyay9zcmMvRXh0ZW5zaW9uL1RhYmxlT2ZDb250ZW50cy9Ob2RlIjt9fQ==', 1753478126),
('m6FLeyisZMXLJwFvbMHwf4GwbcrR2sy31lBqV5Gs', NULL, '35.193.86.89', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnJkbWdhYzRkMDBSMVRUQlIwSTJmR3ZFN0gyRklrUHRzeW9ueDZrciI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753549740),
('MMlP076mYF29hgwtMjkWasSHdZQKrBtUhcOgOKAp', NULL, '207.46.13.157', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUzMwM1E3NFh4TzJGM3liMHpsUnl1ajNnNjNhWWd3d05ObzN6NXNLNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO319', 1753610696),
('MXcCYIOp0EXNrG1BhG5Nnlxrwk4GIoJKEwW6Hlsa', NULL, '138.199.50.134', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYmtHQjJJck5iTG5BeHhLREpiVG4xZUY0NDk3RGpoNHA0NmpEc1RZeCI7czo1OiJlcnJvciI7czoyNDoiSGFsYW1hbiB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YToxOntzOjI2OiIwMUsxMUc2OTNZMjlRRzlFMU4wMEJLMzY5RCI7Tjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Nzg6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvbGliL3BrcC9saWIvdmVuZG9yL2RvY3RyaW5lL2RiYWwvc3JjL1NRTCI7fX0=', 1753470936),
('of8slUGxGgSKeDdkmUsJRjXp7dMyvnYjodrhS3Km', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQlN4YWNLSUNpbk5DUzBWMlVpYzZqcWprdW1jTlFIOU84aGltc3Y1TSI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753478132),
('pY05rI0bQosTi8U0aLSe3DE8uzrbvvvm4CoGW3ds', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibGNIOXhmVHJtTFl0ZFQ5SHk3cUpsQWVhdVNKa1NRb2VvMGtWMDdnZSI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753478139),
('QxwbDR1UJC6KZwO7U1zPnTtyg3Z6UnonZfbNOJPr', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoib3hLbHl3N2FhY1lYQ3lva2VETmZjNlZhcGpGZEFHM1dxUDU3Rm5qZiI7czo1OiJlcnJvciI7czoyNDoiSGFsYW1hbiB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YToxOntzOjI2OiIwMUsxMVEySjIwQ0JHVE5OQUUxTUUwNDVCQSI7Tjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODk6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvbGliL3BrcC9saWIvdmVuZG9yL2xlYWd1ZS9jb21tb25tYXJrL3NyYy9Ob2RlL1F1ZXJ5Ijt9fQ==', 1753478154),
('sTzYyHSQGyxpqmVrZD8P7KiDdjNWd9oL8JQCJheN', NULL, '36.77.106.235', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSWdBQnl3bjd5bXVVRDEydjdTSkRnTHpZSkFaUHJnWWdZa20xYUZKMiI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvbGlzdC1uYWdhcmkiO319', 1753622055),
('TFbRax9wiB9E919tE2nEKCbMfKxOv7yvVxsp32Pd', NULL, '207.46.13.157', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUnJJcEVSSUxURU9saHdpaHNoeGhMVkxMOFRVamNoTGJEcVhWU3dONiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO319', 1753610594),
('VaReYPcfaRGsGsyrLnq0SDVY98MzupLq5FALQEjG', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibG4weWRDZ2NzeHVUZWNrYVdlSWJqSDVLZEs1T0tLOGpHTk1lTEtIayI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753478146),
('VH6UODDPt8g4iEd706y6awM95zsno1AtcxWq2x9t', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOVhROEdEM0diWDN2dTVacDhnRVZZOUxIcXY2YWJieklCaDhpZVM0eSI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753478127),
('wriU3cSxqaMLbdYgHinECLGuddFeRFInz3VO9D9L', NULL, '36.77.106.235', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicFdyMVNYV1Q4OWp4T29YM0g4UGVFaElmMUU3akFJeWtXMm1uNDFSTCI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvbGlzdC1idHMiO319', 1753587443),
('XbfeyPy71NW6KcRMGPHuaGb3F7PD4JO8eiWkZJlI', NULL, '52.167.144.190', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVWFWZFNIT2Y0ckFsNnhJTFFXSmZhZXA5dkptdENRaHBwaGdBZUFGNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvYWRtaW4vcmVnaXN0ZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1753590516),
('y0DwoOyFrLo3PjtQAMmyzOniR7pG7pzsxnnjPCwb', NULL, '205.210.31.2', '', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibzBlaUNvY2oxYXdRRnYyMGVKcUR1ZzgzSk1BMXJwVWJDTGtqY0tXbCI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHBzOi8vd3d3LmluZnJhc3RydWt0dXIuc2lqdW5qdW5nLmdvLmlkLnN1Y2Nlc3NtYW5kaXJpLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753545985),
('YrMf28TPEro5AJgiYHy4NKKAURbmaxp8AhWYP0Gx', NULL, '20.168.18.38', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36; compatible; OAI-SearchBot/1.0; +https://openai.com/searchbot', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHFSUE9OQmpoRVVTb3pFZGFFU2k2RW1PYlNaTHNaeEZlZlN4MEluMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvYnRzLW1hcC1kYXRhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753610199),
('z7aUncRVGCa82c7fROn5tQ37J7tsL5QBwZAC1NLn', NULL, '89.38.99.102', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/530.8 (KHTML, like Gecko) Chrome/2.0.177.1 Safari/530.8', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUmFGYzNzelN5Y1ljcU1jQnNna3FUV3AxZUx3d3J0RkMxNWRuVVhtMSI7czo1OiJlcnJvciI7czoyNDoiSGFsYW1hbiB0aWRhayBkaXRlbXVrYW4uIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MTp7aTowO3M6NToiZXJyb3IiO319czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YToxOntzOjI2OiIwMUsxMVEyQ044MkNWMEszMjVWU1A4M0dSRyI7Tjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODk6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvbGliL3BrcC9saWIvdmVuZG9yL2xlYWd1ZS9jb21tb25tYXJrL3NyYy9Ob2RlL0Jsb2NrIjt9fQ==', 1753478148),
('ZPTfWcgLWPMhPVPveI0AjaEgnSc4shcI35Gh33BR', NULL, '35.193.86.89', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM3lMWmJDeFZGYzMzYnlxbThJZGt4eWdOdVlPbXREYkhwa3VFR0NHWiI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753549740),
('zQ6tEoktyboAPM0KkLCppuyg18c3H47IkhFfw4iD', 11, '182.4.73.54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQ1IyZ002SnZndjhLVE9tNVhKZUg3RzVybDN3RnBWOVIxZ1hWZVg0TSI7czo1MDoibG9naW5fd2ViXzNkYzdhOTEzZWY1ZmQ0Yjg5MGVjYWJlMzQ4NzA4NTU3M2UxNmNmODIiO2k6MTE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRlRmpGUGVkdFdyaEJEVW1HajhrRG0uUm94UUZ0TlJaOU1OeEdvekxWZWV3cTNjUDJTOWNXTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vaW5mcmFzdHJ1a3R1ci5zaWp1bmp1bmcuZ28uaWQvYWRtaW4vam9yb25ncyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoidGFibGVzIjthOjE6e3M6NDE6IjRlODM4MTIxZDAwMzZiZjA5ZmVjMGI2MTYwNGU1MTE3X3Blcl9wYWdlIjtzOjM6ImFsbCI7fX0=', 1753637013);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindak_lanjuts`
--

CREATE TABLE `tindak_lanjuts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lapor_id` bigint(20) UNSIGNED NOT NULL,
  `petugas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `keterangan` text NOT NULL,
  `status` enum('Belum Diproses','Sedang Diproses','Selesai Diproses') NOT NULL DEFAULT 'Belum Diproses',
  `tanggal` datetime NOT NULL DEFAULT '2025-07-25 11:29:04',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'DON BORLAND', 'superadmin@gmail.com', NULL, '$2y$12$l86j9Dm5KwJYdR3NYlatkuhrMiFgXBJhTa9EnKXGp.f8f/VjOj51e', 1, NULL, '2025-07-25 04:42:27', '2025-07-25 04:42:27'),
(10, 'RIDHO FADHLIL AZMI, S.Pi', 'petugas1@gmail.com', NULL, '$2y$12$i0qIrxi5LzynWodcHLX5ruE7aqiK5ngrOYyB4HM6x/T6Wo/egQrVO', 1, '80zMSTNzjj6JhI4CAPWcStVJ32ZECul2ZlC7AcpOOvjfHfHtnpX0KROvqF2a', '2025-07-25 04:42:27', '2025-07-25 04:52:24'),
(11, 'Aulia Rahmat', 'petugas2@gmail.com', NULL, '$2y$12$eFjFPedtWrhBDUmGj8kDm.RoxQFtNRZ9MNxGozLVeewq3cP2S9cWO', 1, 'lAWmxTCYni1yJ4Kup6c4TpsYiw4Y1eysegTFLsfY1XBhHdA1xaEfR0AGhUbR', '2025-07-25 04:42:28', '2025-07-25 04:53:13'),
(12, 'DINI RAHMAWATI, ST, MM', 'kabidti@gmail.com', NULL, '$2y$12$Rku7RxHwDLWnPZFJzvRyleDeebnBsseiopU49hjdriokugDqZhE6y', 1, NULL, '2025-07-25 04:42:28', '2025-07-25 04:42:28'),
(13, 'drg. EZWANDRA, M.Sc', 'kadiskominfo@gmail.com', NULL, '$2y$12$95Ue9JLH/PL3z67Si5R/guKt5gKdE9o9.i02PQc2JtAup9C3eZShu', 1, NULL, '2025-07-25 04:42:28', '2025-07-25 04:42:28'),
(14, 'Pengguna', 'pengguna@gmail.com', NULL, '$2y$12$W6b74sp7nRCxuCsTw5hKDe3505AkYGTBCtpuPHoLXEcH5R2PH9mw.', 1, NULL, '2025-07-25 04:42:28', '2025-07-25 04:42:28'),
(15, 'Pengguna', 'pengguna2@gmail.com', NULL, '$2y$12$5nJa6uUDiNZLv52NwXDkge5TtxChilUpxKP9KwtED/06MI8F12xwy', 1, NULL, '2025-07-25 04:42:29', '2025-07-25 04:42:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bts`
--
ALTER TABLE `bts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bts_operator_id_index` (`operator_id`),
  ADD KEY `bts_kecamatan_id_index` (`kecamatan_id`),
  ADD KEY `bts_nagari_id_index` (`nagari_id`),
  ADD KEY `bts_jorong_id_index` (`jorong_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventaris_opd_id_foreign` (`opd_id`),
  ADD KEY `peralatan_opd_index` (`peralatan_id`,`opd_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jorongs`
--
ALTER TABLE `jorongs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jorongs_nagari_id_nama_jorong_unique` (`nagari_id`,`nama_jorong`),
  ADD KEY `jorongs_nagari_id_index` (`nagari_id`),
  ADD KEY `jorongs_nama_jorong_index` (`nama_jorong`);

--
-- Indeks untuk tabel `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lapors`
--
ALTER TABLE `lapors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lapors_no_tiket_unique` (`no_tiket`),
  ADD UNIQUE KEY `lapors_nomor_kontak_unique` (`nomor_kontak`),
  ADD KEY `lapors_opd_id_foreign` (`opd_id`),
  ADD KEY `lapors_petugas_id_foreign` (`petugas_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `nagaris`
--
ALTER TABLE `nagaris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nagaris_kecamatan_id_nama_nagari_unique` (`kecamatan_id`,`nama_nagari`),
  ADD KEY `nagaris_kecamatan_id_index` (`kecamatan_id`),
  ADD KEY `nagaris_nama_nagari_index` (`nama_nagari`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indeks untuk tabel `opds`
--
ALTER TABLE `opds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opds_nama_index` (`nama`);

--
-- Indeks untuk tabel `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `peralatans`
--
ALTER TABLE `peralatans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `peralatans_nama_unique` (`nama`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `tindak_lanjuts`
--
ALTER TABLE `tindak_lanjuts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tindak_lanjuts_lapor_id_foreign` (`lapor_id`),
  ADD KEY `tindak_lanjuts_petugas_id_foreign` (`petugas_id`);

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
-- AUTO_INCREMENT untuk tabel `bts`
--
ALTER TABLE `bts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jorongs`
--
ALTER TABLE `jorongs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=915;

--
-- AUTO_INCREMENT untuk tabel `kecamatans`
--
ALTER TABLE `kecamatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `lapors`
--
ALTER TABLE `lapors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `nagaris`
--
ALTER TABLE `nagaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `opds`
--
ALTER TABLE `opds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `operators`
--
ALTER TABLE `operators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peralatans`
--
ALTER TABLE `peralatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tindak_lanjuts`
--
ALTER TABLE `tindak_lanjuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bts`
--
ALTER TABLE `bts`
  ADD CONSTRAINT `bts_jorong_id_foreign` FOREIGN KEY (`jorong_id`) REFERENCES `jorongs` (`id`),
  ADD CONSTRAINT `bts_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatans` (`id`),
  ADD CONSTRAINT `bts_nagari_id_foreign` FOREIGN KEY (`nagari_id`) REFERENCES `nagaris` (`id`),
  ADD CONSTRAINT `bts_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`);

--
-- Ketidakleluasaan untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_opd_id_foreign` FOREIGN KEY (`opd_id`) REFERENCES `opds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventaris_peralatan_id_foreign` FOREIGN KEY (`peralatan_id`) REFERENCES `peralatans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jorongs`
--
ALTER TABLE `jorongs`
  ADD CONSTRAINT `jorongs_nagari_id_foreign` FOREIGN KEY (`nagari_id`) REFERENCES `nagaris` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lapors`
--
ALTER TABLE `lapors`
  ADD CONSTRAINT `lapors_opd_id_foreign` FOREIGN KEY (`opd_id`) REFERENCES `opds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lapors_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nagaris`
--
ALTER TABLE `nagaris`
  ADD CONSTRAINT `nagaris_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tindak_lanjuts`
--
ALTER TABLE `tindak_lanjuts`
  ADD CONSTRAINT `tindak_lanjuts_lapor_id_foreign` FOREIGN KEY (`lapor_id`) REFERENCES `lapors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tindak_lanjuts_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
