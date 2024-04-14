-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 12:26 AM
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
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(128) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Sepatu Jordan', 'Sepatu Merk All-star', 'Pakaian Pria', 400000, 14, 'sepatu.jpg'),
(2, 'Hp', 'Merk Samsung', 'Elektronik', 2500000, 9, 'hp.jpg'),
(3, 'Laptop', 'Laptop Asus', 'Elektronik', 3500000, 8, 'laptop.jpg'),
(4, 'Canon 3000', 'Canon 3000', 'Elektronik', 5000000, 8, 'kamera.jpg'),
(7, 'Baju cowok lengan panjang', 'Baju Cowok lengan panjang polos pakaian pria Jova Smooth Maroon/navy', 'Pakaian Pria', 150000, 2, 'pakaian_pria.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(4, 'susi', 'cipayung', '2024-03-21 09:52:34', '2024-03-22 09:52:34'),
(5, 'agus', 'cilacap', '2024-03-22 05:46:38', '2024-03-23 05:46:38'),
(6, 'udin', 'cilacap', '2024-03-23 10:36:39', '2024-03-24 10:36:39'),
(7, 'siti', 'Depok', '2024-03-24 10:29:45', '2024-03-25 10:29:45'),
(8, 'siti Badriah', 'Depok', '2024-03-24 10:30:12', '2024-03-25 10:30:12'),
(9, 'user', 'cilacap', '2024-03-24 11:07:57', '2024-03-25 11:07:57'),
(10, 'user', 'cilacap', '2024-03-27 11:35:42', '2024-03-28 11:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 4, 'Canon 3000', 1, 5000000, ''),
(2, 1, 2, 'Hp', 1, 2500000, ''),
(3, 1, 3, 'Laptop', 1, 3500000, ''),
(4, 2, 4, 'Canon 3000', 1, 5000000, ''),
(5, 3, 4, 'Canon 3000', 1, 5000000, ''),
(6, 4, 2, 'Hp', 1, 2500000, ''),
(7, 5, 2, 'Hp', 3, 2500000, ''),
(8, 5, 4, 'Canon 3000', 2, 5000000, ''),
(9, 5, 1, 'Sepatu Jordan', 1, 400000, ''),
(10, 5, 3, 'Laptop', 2, 3500000, ''),
(11, 6, 7, 'Baju cowok lengan panjang', 3, 150000, ''),
(12, 7, 1, 'Sepatu Jordan', 1, 400000, ''),
(13, 8, 4, 'Canon 3000', 1, 5000000, ''),
(14, 9, 3, 'Laptop', 1, 3500000, ''),
(15, 9, 4, 'Canon 3000', 1, 5000000, ''),
(16, 10, 8, 'Jam Dinding', 1, 500000, ''),
(17, 10, 2, 'Hp', 1, 2500000, ''),
(18, 10, 3, 'Laptop', 1, 3500000, '');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok=stok-NEW.jumlah
    WHERE id_brg=NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `alamat`, `no_telp`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'Bogor', '08746373475', 'admin', 'admin', 1),
(2, 'user', 'cilacap', '08230847308', 'user', 'user', 2),
(3, 'Dodi', 'Depok', '08762354673', 'Dodi', '1234', 2),
(4, 'siti', 'Depok', '08236487', 'Siti Badriah', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
