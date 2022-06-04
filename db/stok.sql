-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2019 at 08:43 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stok`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` varchar(10) NOT NULL,
  `nama_bagian` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES
('ajl', 'AJL'),
('prep', 'Preparation'),
('shtl2', 'Shuttle 2'),
('shtl3', 'Shuttle 3');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `satuan`, `id_bagian`) VALUES
('001', 'fasfas', 'Box', 'Shtl2'),
('002', 'gasgas', 'Pcs', 'Shtl2'),
('003', 'batu bata', 'boks', 'shutl3'),
('004', 'sendok', 'bagor', 'shutl3');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_transaksi` varchar(20) NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `stok_keluar` int(11) DEFAULT NULL,
  `total_harga_keluar` int(11) DEFAULT NULL,
  `id_mesin` varchar(10) DEFAULT NULL,
  `id_mtc` varchar(10) DEFAULT NULL,
  `id_kagrup` varchar(10) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_transaksi`, `tgl_keluar`, `stok_keluar`, `total_harga_keluar`, `id_mesin`, `id_mtc`, `id_kagrup`, `id_bagian`) VALUES
('OUT00000001', '2019-05-10', 4, 0, 'A1', 'MTC02', 'KG01', 'Shtl2');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_transaksi` varchar(20) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `stok_masuk` int(10) DEFAULT NULL,
  `total_harga_masuk` int(11) DEFAULT NULL,
  `penanggung_jawab` varchar(20) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_transaksi`, `tgl_masuk`, `stok_masuk`, `total_harga_masuk`, `penanggung_jawab`, `id_bagian`) VALUES
('IN0006', '2019-05-10', 50, 100000, 'erik', 'Shtl2'),
('IN004', '2019-05-09', 40, 60000, 'erik pak boss', 'Shtl2'),
('IN01', '2019-05-03', 5, 2500, 'ask', 'Shtl2'),
('IN02', '2019-05-07', 10, 1000, 'ASDSAF', 'Shtl2'),
('IN03', '2019-05-08', 7, 4200, 'hgfg', 'Shtl2');

-- --------------------------------------------------------

--
-- Table structure for table `dtl_barang_keluar`
--

CREATE TABLE `dtl_barang_keluar` (
  `id_transaksi` varchar(20) DEFAULT NULL,
  `id_barang` varchar(20) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `sub_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtl_barang_keluar`
--

INSERT INTO `dtl_barang_keluar` (`id_transaksi`, `id_barang`, `tgl_keluar`, `stok`, `harga`, `sub_harga`) VALUES
('OUT00000001', '002', '2019-05-10', 4, 100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kagrup`
--

CREATE TABLE `kagrup` (
  `id_kagrup` varchar(10) NOT NULL,
  `nama_kagrup` varchar(30) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kagrup`
--

INSERT INTO `kagrup` (`id_kagrup`, `nama_kagrup`, `id_bagian`) VALUES
('KG01', 'BUDENG', 'Shtl2');

-- --------------------------------------------------------

--
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `id_mesin` varchar(10) NOT NULL,
  `daerah` varchar(6) DEFAULT NULL,
  `zona` varchar(6) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesin`
--

INSERT INTO `mesin` (`id_mesin`, `daerah`, `zona`, `id_bagian`) VALUES
('A1', 'I', 'IA', 'Shtl2'),
('A2', 'I', 'IA', 'Shtl2');

-- --------------------------------------------------------

--
-- Table structure for table `mtc`
--

CREATE TABLE `mtc` (
  `id_mtc` varchar(10) NOT NULL,
  `nama_mtc` varchar(30) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mtc`
--

INSERT INTO `mtc` (`id_mtc`, `nama_mtc`, `id_bagian`) VALUES
('MTC01', 'Telo', 'Shtl2'),
('MTC02', 'Gembel', 'Shtl2');

-- --------------------------------------------------------

--
-- Table structure for table `stok_barang`
--

CREATE TABLE `stok_barang` (
  `tanggal` date DEFAULT NULL,
  `id_transaksi` varchar(20) DEFAULT NULL,
  `id_barang` varchar(20) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_barang`
--

INSERT INTO `stok_barang` (`tanggal`, `id_transaksi`, `id_barang`, `stok`, `harga`, `id_bagian`) VALUES
('2019-05-03', 'IN01', '001', 5, 500, 'Shtl2'),
('2019-05-07', 'IN02', '002', 10, 100, 'Shtl2'),
('2019-05-08', 'IN03', '001', 7, 600, 'Shtl2'),
('2019-05-09', 'IN004', '003', 40, 1500, 'Shtl2'),
('2019-05-10', 'IN0006', '003', 50, 2000, 'Shtl2'),
('2019-05-10', 'OUT00000001', '002', 4, 100, 'Shtl2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `kagrup`
--
ALTER TABLE `kagrup`
  ADD PRIMARY KEY (`id_kagrup`);

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`id_mesin`);

--
-- Indexes for table `mtc`
--
ALTER TABLE `mtc`
  ADD PRIMARY KEY (`id_mtc`);

--
-- Indexes for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD KEY `FK_stok_barang` (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
