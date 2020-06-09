-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Mei 2020 pada 07.41
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirental`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE `merk` (
  `id` int(10) NOT NULL,
  `merk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`id`, `merk`) VALUES
(1, 'Honda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(1, 'Anuj Kumar', 'demo@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2147483647', NULL, NULL, NULL, NULL, '2017-06-17 19:59:27', '2017-06-26 21:02:58'),
(2, 'AK', 'anuj@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '8285703354', NULL, NULL, NULL, NULL, '2017-06-17 20:00:49', '2017-06-26 21:03:09'),
(3, 'Anuj Kumar', 'webhostingamigo@gmail.com', 'f09df7868d52e12bba658982dbd79821', '09999857868', '0000-00-00', 'New Delhi', 'New Delhi', 'New Delhi', '2017-06-17 20:01:43', '2017-06-17 21:07:41'),
(4, 'Anuj Kumar', 'test@gmail.com', '5c428d8875d2948607f3e3fe134d71b4', '9999857868', '0000-00-00', 'New Delhi', 'Delhi', 'Delhi', '2017-06-17 20:03:36', '2017-06-26 19:18:14'),
(8, 'helmy kurniawan', 'helmykurniawan1313@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '08993704720', '2020-05-01', 'Jl. Wonoayu\r\nMedokan Ayu, Kec. Rungkut', 'Kota SBY', 'Indonesia', '2020-05-25 02:53:52', '2020-05-25 02:55:00'),
(9, 'rika', 'rika@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '08992381312', NULL, NULL, NULL, NULL, '2020-05-25 03:24:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `namamobil` varchar(150) DEFAULT NULL,
  `merk` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `namapemilik` varchar(30) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `bahanbakar` varchar(100) DEFAULT NULL,
  `transmisi` varchar(19) DEFAULT NULL,
  `tahun` int(6) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `ktp` int(11) DEFAULT NULL,
  `sim` int(11) DEFAULT NULL,
  `kartukredit` int(11) DEFAULT NULL,
  `sosmed` int(11) DEFAULT NULL,
  `syaratkhusus` longtext,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `namamobil`, `merk`, `email`, `namapemilik`, `telp`, `harga`, `bahanbakar`, `transmisi`, `tahun`, `kapasitas`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `ktp`, `sim`, `kartukredit`, `sosmed`, `syaratkhusus`, `RegDate`, `UpdationDate`) VALUES
(39, 'Brio Satya E 1.2', 1, 'helmykurniawan1313@gmail.com', 'HPM', '08993704720', 300000, 'Bensin', 'Manual', 2019, 5, 'mobil.png', 'mobil.png', 'jazz.png', 'civic2.png', '', 0, 1, 0, 0, 'SEHAT', '2020-05-22 14:35:06', '2020-05-25 04:51:23'),
(40, 'Jazz 1.5', 1, 'helmykurniawan1313@gmail.com', 'HPMI', '08993704720', 300000, 'Bensin', 'Otomatis', 2015, 5, 'civic2.png', 'civic2.png', 'jazz.png', 'hrv.png', '', 0, 1, 1, NULL, 'ini syarat', '2020-05-25 04:30:38', NULL),
(49, 'Mobilio 1.58', 1, 'helmykurniawan1313@gmail.com', 'HPMI', '08993704720', 300000, 'Solar', 'Otomatis', 2019, 7, 'civic2.png', 'jazz.png', 'hrv.png', 'mobilio.png', '', 1, 1, 1, 1, 'qqqqq', '2020-05-25 04:38:29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idorder` int(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `vehicleid` int(11) DEFAULT NULL,
  `tglmulai` date NOT NULL,
  `tglselsai` date NOT NULL,
  `tglorder` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idorder`, `email`, `vehicleid`, `tglmulai`, `tglselsai`, `tglorder`, `status`) VALUES
(22, 'helmykurniawan1313@gmail.com', 39, '2020-05-01', '2020-05-16', '2020-05-24 12:17:51', 1),
(23, 'helmykurniawan1313@gmail.com', 39, '2020-05-01', '2020-05-02', '2020-05-25 02:56:42', 1),
(24, 'rika@gmail.com', 39, '2020-05-28', '2020-05-30', '2020-05-25 03:25:17', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idorder`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idorder` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
