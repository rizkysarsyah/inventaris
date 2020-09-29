-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2020 at 04:09 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `ID_DETAIL_PINJAM` int(5) NOT NULL,
  `ID_PEMINJAMAN` int(5) DEFAULT NULL,
  `ID_INVENTARIS` int(5) DEFAULT NULL,
  `JUMLAH_DETAIL` varchar(30) DEFAULT NULL,
  `ID_PEGAWAI` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`ID_DETAIL_PINJAM`, `ID_PEMINJAMAN`, `ID_INVENTARIS`, `JUMLAH_DETAIL`, `ID_PEGAWAI`) VALUES
(1, 1, 2, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `ID_INVENTARIS` int(11) NOT NULL,
  `ID_PETUGAS` int(5) DEFAULT NULL,
  `ID_RUANG` int(5) DEFAULT NULL,
  `ID_JENIS` int(5) DEFAULT NULL,
  `NAMA` varchar(30) DEFAULT NULL,
  `KONDISI` varchar(30) DEFAULT NULL,
  `KETERANGAN_INVENTARIS` varchar(30) DEFAULT NULL,
  `JUMLAH` varchar(30) DEFAULT NULL,
  `TANGGAL_REGISTER` date DEFAULT NULL,
  `KODE_INVENTARIS` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`ID_INVENTARIS`, `ID_PETUGAS`, `ID_RUANG`, `ID_JENIS`, `NAMA`, `KONDISI`, `KETERANGAN_INVENTARIS`, `JUMLAH`, `TANGGAL_REGISTER`, `KODE_INVENTARIS`) VALUES
(1, 1, 1, 2, 'lcd', 'baik', 'lcd ', '9', '2020-02-12', '1'),
(2, 1, 2, 3, 'Bola Futsal', 'baik', 'bola futsal', '2', '2020-02-12', '2'),
(3, 1, 1, 3, 'gawang', 'baik', 'gawang futsal', '2', '2020-02-12', '3'),
(4, 1, 1, 2, 'speaker', 'rusak', 'speaker rusak', '5', '2020-02-12', '4'),
(5, 1, 2, 3, 'Bola Basket', 'baik', 'bola basket', '0', '2020-02-13', '2');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `ID_JENIS` int(5) NOT NULL,
  `NAMA_JENIS` varchar(30) DEFAULT NULL,
  `KODE_JENIS` varchar(30) DEFAULT NULL,
  `KETERANGAN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`ID_JENIS`, `NAMA_JENIS`, `KODE_JENIS`, `KETERANGAN`) VALUES
(2, 'alat presentasi', '2', 'alat untuk presentasi\r\n'),
(3, 'alat olahragaa', '3', 'alat untuk olahragaa\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `ID_LEVEL` int(11) NOT NULL,
  `NAMA_LEVEL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`ID_LEVEL`, `NAMA_LEVEL`) VALUES
(1, 'admin'),
(2, 'operator'),
(3, 'peminjam');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `ID_PEGAWAI` int(5) NOT NULL,
  `NAMA_PEGAWAI` varchar(30) DEFAULT NULL,
  `NIP` varchar(30) DEFAULT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`ID_PEGAWAI`, `NAMA_PEGAWAI`, `NIP`, `ALAMAT`) VALUES
(1, 'Sarsyah', '124', 'kamal');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `ID_PEMINJAMAN` int(5) NOT NULL,
  `TANGGAL_PINJAM` datetime DEFAULT NULL,
  `TANGGAL_KEMBALI` datetime DEFAULT NULL,
  `STATUS_PEMINJAMAN` varchar(30) DEFAULT NULL,
  `ID_PEGAWAI` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`ID_PEMINJAMAN`, `TANGGAL_PINJAM`, `TANGGAL_KEMBALI`, `STATUS_PEMINJAMAN`, `ID_PEGAWAI`) VALUES
(1, '2020-02-13 05:21:00', '2020-02-13 07:45:00', 'Kembali', 1);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `ID_PETUGAS` int(5) NOT NULL,
  `USERNAME` varchar(30) DEFAULT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL,
  `NAMA_PETUGAS` varchar(30) DEFAULT NULL,
  `ID_LEVEL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`ID_PETUGAS`, `USERNAME`, `PASSWORD`, `NAMA_PETUGAS`, `ID_LEVEL`) VALUES
(1, 'admin', 'admin', 'rizky', 1),
(2, 'aris', 'aris', 'Aris', 2),
(3, 'sarsyah', 'sarsyah', 'Sarsyah', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `ID_RUANG` int(5) NOT NULL,
  `NAMA_RUANG` varchar(30) DEFAULT NULL,
  `KODE_RUANG` varchar(30) DEFAULT NULL,
  `KETERANGAN_RUANG` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`ID_RUANG`, `NAMA_RUANG`, `KODE_RUANG`, `KETERANGAN_RUANG`) VALUES
(1, 'XII RPL 1', '12rpl1', 'Kelas 12 rpl 1'),
(2, 'XII RPL 2', '12rpl2', 'kelass 12 rpl 2  ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`ID_DETAIL_PINJAM`),
  ADD KEY `FK_MEMERIKSA` (`ID_PEMINJAMAN`),
  ADD KEY `FK_MENDETAIL` (`ID_INVENTARIS`),
  ADD KEY `ID_PEGAWAI` (`ID_PEGAWAI`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`ID_INVENTARIS`),
  ADD KEY `FK_MENGECEK` (`ID_PETUGAS`),
  ADD KEY `FK_MEMILIH` (`ID_RUANG`),
  ADD KEY `FK_MENENTUKAN` (`ID_JENIS`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`ID_JENIS`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`ID_LEVEL`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`ID_PEGAWAI`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`ID_PEMINJAMAN`),
  ADD KEY `ID_PEGAWAI` (`ID_PEGAWAI`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`ID_PETUGAS`),
  ADD KEY `ID_LEVEL` (`ID_LEVEL`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`ID_RUANG`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `ID_LEVEL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MEMERIKSA` FOREIGN KEY (`ID_PEMINJAMAN`) REFERENCES `peminjaman` (`ID_PEMINJAMAN`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MENDETAIL` FOREIGN KEY (`ID_INVENTARIS`) REFERENCES `inventaris` (`ID_INVENTARIS`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `FK_MEMILIH` FOREIGN KEY (`ID_RUANG`) REFERENCES `ruang` (`ID_RUANG`),
  ADD CONSTRAINT `FK_MENENTUKAN` FOREIGN KEY (`ID_JENIS`) REFERENCES `jenis` (`ID_JENIS`),
  ADD CONSTRAINT `FK_MENGECEK` FOREIGN KEY (`ID_PETUGAS`) REFERENCES `petugas` (`ID_PETUGAS`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`);

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`ID_LEVEL`) REFERENCES `level` (`ID_LEVEL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
