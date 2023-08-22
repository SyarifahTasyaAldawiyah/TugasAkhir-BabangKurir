-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 04:34 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babangkurir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `no_hp` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `no_hp`, `username`, `password`, `foto`) VALUES
(1, 'admin', '082151355959', 'admin', 'admin', 'BabangKurir.png'),
(2, 'mus', 'mus', 'mus', 'anda', 'login.png'),
(8, 'mus', 'mus', '800.000', '300.000', 'jago.png');

-- --------------------------------------------------------

--
-- Table structure for table `detaillaporanharian`
--

CREATE TABLE `detaillaporanharian` (
  `id_laporanharian` int(11) NOT NULL,
  `tgllaporanharian` date NOT NULL,
  `id_driver` varchar(225) NOT NULL,
  `modal` varchar(225) NOT NULL,
  `kantorplus` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `bon` varchar(225) NOT NULL,
  `qris` varchar(225) NOT NULL,
  `man` varchar(225) NOT NULL,
  `bca` varchar(225) NOT NULL,
  `bpd` varchar(225) NOT NULL,
  `bri` varchar(225) NOT NULL,
  `dll` varchar(225) NOT NULL,
  `kantorminus` varchar(225) NOT NULL,
  `keteranganmin` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detaillaporanharian`
--

INSERT INTO `detaillaporanharian` (`id_laporanharian`, `tgllaporanharian`, `id_driver`, `modal`, `kantorplus`, `keterangan`, `bon`, `qris`, `man`, `bca`, `bpd`, `bri`, `dll`, `kantorminus`, `keteranganmin`) VALUES
(129, '2023-08-18', '2', '150000', '10000', '', '', '', '50000', '', '', '', '', '', ''),
(130, '2023-08-18', '2', '', '', '', '', '', '', '', '', '', '', '', ''),
(131, '2023-08-18', '2', '', '', '', '', '', '', '', '', '', '', '', ''),
(132, '2023-08-18', '2', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `detailorderan`
--

CREATE TABLE `detailorderan` (
  `id_detailorder` int(11) NOT NULL,
  `id_driver` varchar(22) NOT NULL,
  `alamatorderan` varchar(225) NOT NULL,
  `jenisorderan` varchar(225) NOT NULL,
  `jmlorderan` varchar(225) NOT NULL,
  `titik` varchar(225) NOT NULL,
  `ttlbelanja` varchar(225) NOT NULL,
  `id_ongkir` varchar(225) NOT NULL,
  `ongkir` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `tglorder` date NOT NULL,
  `keorder` varchar(20) NOT NULL,
  `file` varchar(225) NOT NULL,
  `kettolak` varchar(225) NOT NULL,
  `totalongkir` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailorderan`
--

INSERT INTO `detailorderan` (`id_detailorder`, `id_driver`, `alamatorderan`, `jenisorderan`, `jmlorderan`, `titik`, `ttlbelanja`, `id_ongkir`, `ongkir`, `keterangan`, `status`, `tglorder`, `keorder`, `file`, `kettolak`, `totalongkir`) VALUES
(390, '1', 'a', '4', '2', '1', '30000', '', '20000', '', 'Di Tolak', '2023-07-26', 'Selesai', '', 'aaa', ''),
(391, '1', 'dsd', '4', '2', '2', '200000', '', '100000', '', 'Di Tolak', '2023-07-26', 'Selesai', '', 'aaa', ''),
(392, '1', 'c', '5', '3', '3', '10000', '', '10000', '', 'Di Tolak', '2023-07-26', 'Selesai', '', 'aaa', ''),
(414, '2', '', '1', '2', '2', '300000', '1', '20000', '', 'Di Terima', '2023-08-18', 'Selesai', '', '', '40000'),
(415, '2', '', '4', '2', '1', '2000000', '3', '30000', '', 'Di Terima', '2023-08-18', 'Selesai', '', '', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id_driver` int(11) NOT NULL,
  `nobb` varchar(12) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama_driver` varchar(225) NOT NULL,
  `id_level` varchar(225) NOT NULL,
  `no_hp` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `ktp` varchar(225) NOT NULL,
  `ttl` varchar(225) NOT NULL,
  `jk` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `nobb`, `password`, `nama_driver`, `id_level`, `no_hp`, `foto`, `alamat`, `ktp`, `ttl`, `jk`) VALUES
(1, 'BB006', '1', 'Zary', '2', '082151355959', 'BabangKurir.png', 'mempawah', 'IMG-20220618-WA0007.jpg', 'Mempawah, 07 Agustus 1998', 'Laki-laki'),
(2, 'BB008', '1', 'Taufik', '1', '081352959448', 'login.png', 'mempawah', 'log.png', 'Mempawah, 07 Juni 1998', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `kode_order`
--

CREATE TABLE `kode_order` (
  `id_kode` int(11) NOT NULL,
  `nama_order` varchar(225) NOT NULL,
  `code_order` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_order`
--

INSERT INTO `kode_order` (`id_kode`, `nama_order`, `code_order`) VALUES
(1, 'BANG-JEK', 'B-J'),
(4, 'BANG-MART', 'B-M'),
(5, 'BANG-FOOD', 'B-F'),
(6, 'BANG-PAKET', 'B-P'),
(7, 'BANG-PPOB', 'B-PP'),
(8, 'DLL', 'DLL'),
(9, 'DRIVER-AWAY', 'D-A');

-- --------------------------------------------------------

--
-- Table structure for table `laporanharian`
--

CREATE TABLE `laporanharian` (
  `id_laporan` int(11) NOT NULL,
  `id_driver` varchar(225) NOT NULL,
  `tgllaporan` date NOT NULL,
  `komisi` varchar(225) NOT NULL,
  `setoran` varchar(225) NOT NULL,
  `neracamin` varchar(225) NOT NULL,
  `neracaplus` int(225) NOT NULL,
  `income` varchar(225) NOT NULL,
  `bon` varchar(11) NOT NULL,
  `gaji` varchar(225) NOT NULL,
  `anaksekolah` varchar(225) NOT NULL,
  `jmlorderan` varchar(20) NOT NULL,
  `status` varchar(225) NOT NULL,
  `kettolak` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporanharian`
--

INSERT INTO `laporanharian` (`id_laporan`, `id_driver`, `tgllaporan`, `komisi`, `setoran`, `neracamin`, `neracaplus`, `income`, `bon`, `gaji`, `anaksekolah`, `jmlorderan`, `status`, `kettolak`) VALUES
(39, '2', '2023-08-18', '70%', '180000', '50000', 230000, '70000', '0', '49000', '0', '4', 'Di Terima', '');

-- --------------------------------------------------------

--
-- Table structure for table `level_driver`
--

CREATE TABLE `level_driver` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(225) NOT NULL,
  `persentase` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_driver`
--

INSERT INTO `level_driver` (`id_level`, `nama_level`, `persentase`) VALUES
(1, 'STARKAN', '70%'),
(2, 'SPARTAN', '63000');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `ke` varchar(225) NOT NULL,
  `dari` varchar(225) NOT NULL,
  `ongkir` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `ke`, `dari`, `ongkir`) VALUES
(1, 'Sungai Pinyuh', ' Mempawah', '20000'),
(3, 'Singkawang', 'Mempawah', '30000'),
(4, 'Mempawah', 'Sungai Pinyuh', '20000'),
(5, 'Mempawah', 'Singkawang', '30000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detaillaporanharian`
--
ALTER TABLE `detaillaporanharian`
  ADD PRIMARY KEY (`id_laporanharian`);

--
-- Indexes for table `detailorderan`
--
ALTER TABLE `detailorderan`
  ADD PRIMARY KEY (`id_detailorder`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `kode_order`
--
ALTER TABLE `kode_order`
  ADD PRIMARY KEY (`id_kode`);

--
-- Indexes for table `laporanharian`
--
ALTER TABLE `laporanharian`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `level_driver`
--
ALTER TABLE `level_driver`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `detaillaporanharian`
--
ALTER TABLE `detaillaporanharian`
  MODIFY `id_laporanharian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `detailorderan`
--
ALTER TABLE `detailorderan`
  MODIFY `id_detailorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=416;
--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kode_order`
--
ALTER TABLE `kode_order`
  MODIFY `id_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `laporanharian`
--
ALTER TABLE `laporanharian`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `level_driver`
--
ALTER TABLE `level_driver`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
