-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 10:31 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nes_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `laundry_anakan`
--

CREATE TABLE `laundry_anakan` (
  `id` int(11) NOT NULL,
  `id_laundry_induk` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `kg` double NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry_anakan`
--

INSERT INTO `laundry_anakan` (`id`, `id_laundry_induk`, `jenis`, `kg`, `harga`) VALUES
(1, 1, 'selimut', 2, 14),
(4, 4, 'sendal', 8, 12),
(5, 5, 'pakaian', 2, 1200),
(6, 5, 'selimut', 4, 2400),
(7, 5, 'guling', 22, 121),
(8, 5, 'jaket', 11, 112),
(21, 5, 'motor', 12, 12),
(22, 5, 'mobil', 144, 14),
(23, 5, 'guling', 44, 1),
(24, 5, 'hp', 4, 1),
(25, 8, 'pakaian', 100, 1200),
(26, 8, 'motor', 2.45, 1200),
(27, 8, 'mobil', 1, 1),
(29, 9, 'pakaian', 100, 1200),
(30, 9, 'motor', 2, 1200),
(31, 9, 'pakaian', 100, 13213),
(32, 10, 'pakaian', 444, 12);

-- --------------------------------------------------------

--
-- Table structure for table `laundry_induk`
--

CREATE TABLE `laundry_induk` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry_induk`
--

INSERT INTO `laundry_induk` (`id`, `nama`, `alamat`, `no_hp`, `tgl_masuk`, `tgl_keluar`, `status`) VALUES
(1, 'rossi', 'itali', '09211222', '2019-04-04', '2019-04-06', 'Menimbang Laundry'),
(4, 'nasution', 'uber', '912313913', '2019-04-08', '2019-04-10', 'Menimbang Laundry'),
(5, 'Gradi', 'nangor', '9131313199', '2019-04-08', '2019-04-10', 'Belum dikerjakan'),
(8, 'fany', 'uber', '131312213', '2019-04-08', '2019-04-10', 'Belum dikerjakan'),
(9, 'lorexo', 'spain', '13213123', '2019-04-10', '2019-05-10', 'Belum dikerjakan'),
(10, 'om', 'pasir impun', '13131231', '2019-04-08', '2019-04-17', 'Belum dikerjakan');

-- --------------------------------------------------------

--
-- Table structure for table `master_pegawai`
--

CREATE TABLE `master_pegawai` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_pegawai`
--

INSERT INTO `master_pegawai` (`id`, `username`, `password`) VALUES
(1, 'baruna', '12345'),
(2, 'Gradi', '123456'),
(7, 'ronaldo', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laundry_anakan`
--
ALTER TABLE `laundry_anakan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_laundry_induk` (`id_laundry_induk`);

--
-- Indexes for table `laundry_induk`
--
ALTER TABLE `laundry_induk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pegawai`
--
ALTER TABLE `master_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laundry_anakan`
--
ALTER TABLE `laundry_anakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `laundry_induk`
--
ALTER TABLE `laundry_induk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `master_pegawai`
--
ALTER TABLE `master_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laundry_anakan`
--
ALTER TABLE `laundry_anakan`
  ADD CONSTRAINT `laundry_anakan_ibfk_1` FOREIGN KEY (`id_laundry_induk`) REFERENCES `laundry_induk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
