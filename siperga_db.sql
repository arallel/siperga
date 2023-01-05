-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2023 at 04:07 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siperga_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `asal`
--

CREATE TABLE `asal` (
  `id_asal` int NOT NULL,
  `nama_asal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buku_induk`
--

CREATE TABLE `buku_induk` (
  `id` int NOT NULL,
  `kd_buku` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_buku` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `penerbit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kota_terbit` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tahun_terbit` year DEFAULT NULL,
  `ISBN` varchar(40) DEFAULT NULL,
  `asal` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `klasifikasi` float DEFAULT NULL,
  `tgl_diterima` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jenis` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `rak` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `stok` int NOT NULL,
  `tanggal` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `keadaan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku_induk`
--

INSERT INTO `buku_induk` (`id`, `kd_buku`, `judul`, `pengarang`, `no_buku`, `penerbit`, `kota_terbit`, `tahun_terbit`, `ISBN`, `asal`, `klasifikasi`, `tgl_diterima`, `jenis`, `rak`, `stok`, `tanggal`, `keadaan`) VALUES
(9, 'A00001', '100 ATLET LEGENDARIS', 'SUMOHADI MARSIS', '1', 'BALAI PUSTAKA', 'JAKARTA', 2010, NULL, 'dropping', 0, '1212121970年1月1日', 'Umum', 'ORK', 1, NULL, 'baik'),
(10, 'A00001', '100 ATLET LEGENDARIS', 'SUMOHADI MARSIS', '2', 'BALAI PUSTAKA', 'JAKARTA', 2010, NULL, 'dropping', 0, '1212121970年1月1日', 'Umum', 'ORK', 1, NULL, 'rusak'),
(11, 'A00001', '100 ATLET LEGENDARIS', 'SUMOHADI MARSIS', '3', 'BALAI PUSTAKA', 'JAKARTA', 2010, NULL, 'dropping', 0, '1212121970年1月1日', 'Umum', 'ORK', 1, NULL, 'hilang'),
(12, 'A00002', 'test', 'SUMOHADI MARSIS', '1', 'BALAI PUSTAKA', 'JAKARTA', 2010, NULL, 'dropping', 0, '1212121970年1月1日', 'Umum', 'ORK', 1, NULL, 'baik'),
(13, 'A00002', 'test', 'SUMOHADI MARSIS', '2', 'BALAI PUSTAKA', 'JAKARTA', 2010, NULL, 'dropping', 0, '1212121970年1月1日', 'Umum', 'ORK', 1, NULL, 'baik');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_buku`
--

CREATE TABLE `jenis_buku` (
  `id_jenis` int NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int NOT NULL,
  `nama_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'jember');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `id_petugas` int NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `tanggal_pinjam` varchar(20) NOT NULL,
  `batas_kembali` varchar(20) NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `pengembalian` AFTER UPDATE ON `peminjaman` FOR EACH ROW BEGIN
	UPDATE buku_induk SET stok = stok + 1
    WHERE kd_buku = NEW.id_buku;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pengurangan` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN
	UPDATE buku_induk SET stok = stok - 1
    WHERE kd_buku = NEW.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` int NOT NULL,
  `tahun` year NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`) VALUES
(2, 'admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asal`
--
ALTER TABLE `asal`
  ADD PRIMARY KEY (`id_asal`);

--
-- Indexes for table `buku_induk`
--
ALTER TABLE `buku_induk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `petugas` (`id_petugas`),
  ADD KEY `buku` (`id_buku`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asal`
--
ALTER TABLE `asal`
  MODIFY `id_asal` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buku_induk`
--
ALTER TABLE `buku_induk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  MODIFY `id_jenis` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `petugas` FOREIGN KEY (`id_petugas`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
