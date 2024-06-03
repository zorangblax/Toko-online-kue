-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 12:36 AM
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
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `id_pesanan`, `id_brg`, `nama_brg`, `jumlah`, `harga`) VALUES
(7, 5, 3, 'Laptop', 1, 3500000),
(8, 6, 3, 'Laptop', 1, 3500000),
(9, 7, 7, 'Baju cowok lengan panjang', 1, 150000),
(10, 8, 3, 'Laptop', 1, 3500000),
(11, 8, 4, 'Canon 3000', 1, 5000000),
(12, 9, 2, 'Hp', 1, 2500000),
(13, 9, 4, 'Canon 3000', 1, 5000000),
(14, 10, 16, 'Bolu Berudu Merah', 1, 50000),
(15, 11, 16, 'Bolu Berudu Merah', 1, 50000),
(16, 11, 13, 'Bolu Kukus', 1, 15000),
(17, 11, 15, 'Bolu Gulung', 1, 100000),
(18, 12, 16, 'Bolu Berudu Merah', 1, 50000),
(19, 12, 18, 'Bolu Gulung Spesial', 1, 70000),
(20, 12, 15, 'Bolu Gulung', 1, 100000),
(21, 12, 28, 'Kue Ulang Tahun', 1, 200000),
(22, 13, 16, 'Bolu Berudu Merah', 1, 50000),
(23, 13, 15, 'Bolu Gulung', 1, 100000),
(24, 13, 18, 'Bolu Gulung Spesial', 1, 70000);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `pembayaran` varchar(50) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `id_user`, `nama`, `alamat`, `no_telp`, `pembayaran`, `tgl_pesan`, `status`) VALUES
(6, 2, 'Reza', 'cilacap', '08230847308', 'Mandiri', '2024-05-20 10:19:30', 'dikirim'),
(7, 2, 'Reza', 'cilacap', '08230847308', 'BRI', '2024-05-20 10:26:45', 'Proses'),
(8, 2, 'Reza', 'cilacap', '08230847308', 'Dana', '2024-05-20 14:13:47', 'Proses'),
(9, 2, 'Reza', 'cilacap', '08230847308', 'BRI', '2024-05-20 14:18:54', 'Proses'),
(10, 2, 'Reza', 'cilacap', '08230847308', 'GoPay', '2024-05-29 05:29:23', 'BelumBayar'),
(11, 2, 'Reza', 'cilacap', '08230847308', 'BCA', '2024-05-30 05:37:30', 'BelumBayar'),
(12, 7, 'Zorang', 'Cianjur', '08712307', 'Mandiri', '2024-06-02 12:43:18', 'BelumBayar'),
(13, 2, 'Reza', 'cilacap', '08230847308', 'GoPay', '2024-06-04 05:24:06', 'BelumBayar');

-- --------------------------------------------------------

--
-- Table structure for table `history_detail`
--

CREATE TABLE `history_detail` (
  `id` int(11) NOT NULL,
  `id_history` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history_detail`
--

INSERT INTO `history_detail` (`id`, `id_history`, `id_brg`, `nama_brg`, `jumlah`, `harga`) VALUES
(1, 1, 1, 'Sepatu Jordan', 1, 400000),
(2, 2, 1, 'Sepatu Jordan', 2, 400000),
(3, 2, 7, 'Baju cowok lengan panjang', 1, 150000),
(4, 3, 3, 'Laptop', 1, 3500000),
(8, 6, 3, 'Laptop', 1, 3500000),
(9, 7, 7, 'Baju cowok lengan panjang', 1, 150000),
(10, 8, 3, 'Laptop', 1, 3500000),
(11, 8, 4, 'Canon 3000', 1, 5000000),
(12, 9, 2, 'Hp', 1, 2500000),
(13, 9, 4, 'Canon 3000', 1, 5000000),
(14, 10, 16, 'Bolu Berudu Merah', 1, 50000),
(15, 11, 16, 'Bolu Berudu Merah', 1, 50000),
(16, 11, 13, 'Bolu Kukus', 1, 15000),
(17, 11, 15, 'Bolu Gulung', 1, 100000),
(18, 12, 16, 'Bolu Berudu Merah', 1, 50000),
(19, 12, 18, 'Bolu Gulung Spesial', 1, 70000),
(20, 12, 15, 'Bolu Gulung', 1, 100000),
(21, 12, 28, 'Kue Ulang Tahun', 1, 200000),
(22, 13, 16, 'Bolu Berudu Merah', 1, 50000),
(23, 13, 15, 'Bolu Gulung', 1, 100000),
(24, 13, 18, 'Bolu Gulung Spesial', 1, 70000);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_belanja`
--

CREATE TABLE `keranjang_belanja` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `qty` int(3) NOT NULL,
  `harga` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang_belanja`
--

INSERT INTO `keranjang_belanja` (`id`, `id_user`, `id_brg`, `qty`, `harga`, `nama_barang`) VALUES
(62, 2, 19, 1, 100000, 'Bolu Pandan Kukus'),
(63, 2, 20, 1, 50000, 'Bolu Pisang kukus');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `pembayaran` varchar(50) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_user`, `nama`, `alamat`, `no_telp`, `pembayaran`, `tgl_pesan`, `status`) VALUES
(5, 2, 'Reza', 'cilacap', '08230847308', 'GoPay', '2024-05-20 08:48:37', 'Terima Pesanan'),
(6, 2, 'Reza', 'cilacap', '08230847308', 'Mandiri', '2024-05-20 10:19:30', 'dikirim'),
(7, 2, 'Reza', 'cilacap', '08230847308', 'BRI', '2024-05-20 10:26:45', 'Proses'),
(8, 2, 'Reza', 'cilacap', '08230847308', 'Dana', '2024-05-20 14:13:47', 'Proses'),
(9, 2, 'Reza', 'cilacap', '08230847308', 'BRI', '2024-05-20 14:18:54', 'Proses'),
(10, 2, 'Reza', 'cilacap', '08230847308', 'GoPay', '2024-05-29 05:29:23', 'BelumBayar'),
(11, 2, 'Reza', 'cilacap', '08230847308', 'BCA', '2024-05-30 05:37:30', 'BelumBayar'),
(12, 7, 'Zorang', 'Cianjur', '08712307', 'Mandiri', '2024-06-02 12:43:18', 'BelumBayar'),
(13, 2, 'Reza', 'cilacap', '08230847308', 'GoPay', '2024-06-04 05:24:06', 'BelumBayar');

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
(13, 'Bolu Kukus', 'beli 1 isi 5', 'Bolu', 15000, 99, 'Bolu_Kukus.PNG'),
(15, 'Bolu Gulung', 'Enak dan Manis', 'Bolu', 100000, 17, 'bolu_gulung1.png'),
(16, 'Bolu Berudu Merah', 'Enak dan Manis', 'Bolu', 50000, 16, 'bolu_berudu_merah1.png'),
(18, 'Bolu Gulung Spesial', 'Rasa Stoberi', 'Bolu', 70000, 28, 'Bolu_Gulung_Spesial.png'),
(19, 'Bolu Pandan Kukus', 'Ditaburi keju dan satu cherry', 'Bolu', 100000, 19, 'Bolu_Pandan_kukus.png'),
(20, 'Bolu Pisang kukus', 'Bolu rasa pisang', 'Bolu', 50000, 19, 'Bolu_Pisang_kukus.png'),
(21, 'Donat Bear', 'isi 4', 'Donat', 40000, 20, 'Donat_Bear.png'),
(22, 'Donat Variasi', 'isi 5 ada keju,coklat dan sebagainya secara random', 'Donat', 100000, 20, 'Donat_large.png'),
(23, 'Donat Keju', 'dilapisi keju, isi 5', 'Donat', 30000, 50, 'Donat_Keju.png'),
(24, 'Nastar', 'satu toples', 'Idul Fitri', 40000, 50, 'Nastar.png'),
(25, 'Kastengel', '1 toples', 'Idul Fitri', 25000, 20, 'Kastangel.png'),
(26, 'Kue Putri Salju', '1 toples', 'Idul Fitri', 50000, 15, 'kue_salju.png'),
(27, 'Kue dan Macaron', 'Kue yang di atas terdapat macaron', 'Cake', 150000, 10, 'kue_+_macaron.png'),
(28, 'Kue Ulang Tahun', 'rasa coklat dengan hiasa happy birthday', 'Cake', 200000, 9, 'Kue_Ulang_tahun.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `alamat`, `no_telp`, `email`, `password`, `role_id`) VALUES
(1, 'admin', 'Bogor', '08746373475', 'admin@gmail.com', 'admin', 1),
(2, 'Reza', 'cilacap', '08230847308', 'user@gmail.com', 'user', 2),
(3, 'Dodi', 'Depok', '08762354673', 'Dodi@gmail.com', '1234', 2),
(4, 'siti Badriah', 'Depok', '08236487', 'Siti@gmail.com', '123', 3),
(5, 'sisi', 'aksjdhksajdh', '29387493284', 'sisi@gmail.com', 'sisi', 2),
(6, 'jojo', 'khabdhsabd', '7687387623', 'khabib@gmail.com', '11', 2),
(7, 'Zorang', 'Cianjur', '08712307', 'zorang@gmail.com', 'zorang', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_detail`
--
ALTER TABLE `history_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang_belanja`
--
ALTER TABLE `keranjang_belanja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `history_detail`
--
ALTER TABLE `history_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `keranjang_belanja`
--
ALTER TABLE `keranjang_belanja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
