-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 03:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warga`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `hubungan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_iuran`
--

CREATE TABLE `tb_iuran` (
  `id_iuran` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `iuran_aman` varchar(11) NOT NULL,
  `bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL,
  `tgl` date NOT NULL,
  `ket` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kk`
--

CREATE TABLE `tb_kk` (
  `id_kk` int(11) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `kepala` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kab` varchar(20) NOT NULL,
  `prov` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kk`
--

INSERT INTO `tb_kk` (`id_kk`, `no_kk`, `kepala`, `alamat`, `desa`, `rt`, `rw`, `kec`, `kab`, `prov`) VALUES
(26, '3216', 'Okta Setyawan', 'Jl.Chemco Raya Blok L6 No.18', 'Simpangan', '001', '008', 'Cikarang Utara', 'Kab. Bekasi', 'Jawa Barat'),
(28, 'Quaerat in consequat', 'Illo ipsum do et do', 'Blanditiis voluptate', 'Voluptas similique a', 'Debit', 'Accus', 'Tempora odit est et', 'Ab odit est reicien', 'Fugit qui autem ali');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pdd`
--

CREATE TABLE `tb_pdd` (
  `id_pend` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lh` varchar(15) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `desa` varchar(15) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `kawin` varchar(15) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `status` enum('Ada','Meninggal','Pindah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pdd`
--

INSERT INTO `tb_pdd` (`id_pend`, `nik`, `nama`, `tempat_lh`, `tgl_lh`, `jekel`, `alamat`, `desa`, `rt`, `rw`, `agama`, `kawin`, `pekerjaan`, `status`) VALUES
(54, '3216', 'Minim voluptas porro', 'Ipsum veniam se', '1982-11-18', 'LK', 'Voluptatem qui lauda', 'Vel vel quas ea', 'Est ', 'Eum ', 'Et sed aliquip ', 'Cerai Mati', 'Unde vel beatae blan', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','Kaur Pemerintah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(4, 'Kenny', 'admin', 'admin', 'Administrator'),
(5, 'Kenny2', 'admin2', 'admin2', 'Kaur Pemerintah'),
(6, 'ale', 'ale', 'ale', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengu`
--

CREATE TABLE `tb_pengu` (
  `id_pengu` int(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` varchar(500) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `tb_anggota_ibfk_1` (`id_pend`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indexes for table `tb_iuran`
--
ALTER TABLE `tb_iuran`
  ADD PRIMARY KEY (`id_iuran`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indexes for table `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `tb_pdd`
--
ALTER TABLE `tb_pdd`
  ADD PRIMARY KEY (`id_pend`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_pengu`
--
ALTER TABLE `tb_pengu`
  ADD PRIMARY KEY (`id_pengu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tb_iuran`
--
ALTER TABLE `tb_iuran`
  MODIFY `id_iuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tb_kk`
--
ALTER TABLE `tb_kk`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_pdd`
--
ALTER TABLE `tb_pdd`
  MODIFY `id_pend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pengu`
--
ALTER TABLE `tb_pengu`
  MODIFY `id_pengu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_pend`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_iuran`
--
ALTER TABLE `tb_iuran`
  ADD CONSTRAINT `tb_iuran_ibfk_1` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
