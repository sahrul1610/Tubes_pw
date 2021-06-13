-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 03:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_buku_sahrul`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_ketegori` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `gambar` text NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `halaman` varchar(5) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `stok` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_ketegori`, `judul`, `gambar`, `penerbit`, `pengarang`, `halaman`, `harga`, `stok`) VALUES
(21, 3, ' PKN', '60bbc7f4d957a.jpg', '  PT. Sapi Bentong', 'Bang sahrul', ' 100', '60000', '67'),
(22, 3, 'B. Inggris', '60bbc815d53f9.jpg', 'CV. Kurang ngopi', 'Atok', '200', '40000', '51'),
(23, 3, 'Kimia', '60bbc8345c113.png', 'ga tau lupa', 'Nopal', '10', '45000', '20'),
(24, 3, 'PHP', '60bbc86e64f4e.jpg', 'CV. nguntul', 'abdul', '100', '71000', '22'),
(25, 4, 'Bisnis Online', '60bbc8996d6dc.jpg', 'PT. Sok Ganteng', 'yahya', '10', '80000', '46'),
(26, 3, 'Desain grafis', '60bbc8b340571.jpg', ' PT. Kurang Turu', ' prof. Ir. Dr. Diko s.kom', ' 20', ' 99000', '51'),
(27, 0, 'Sistem OperasI', '60bbc8e2e5e7e.jpg', 'sahsah', 'sahrul', '100', '50000', '37'),
(57, 2, 'senja kehidupan', '60c51d4bbe744.jpg', 'ilham ', 'feby', '123', '40000', '50'),
(58, 11, 'munajat', '60c521fe1f115.jpg', 'fazri', 'sahrul', '123', '50000', '30');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkout_id`, `user_id`, `produk_id`, `qty`, `sub_total`) VALUES
(1, 3, 22, 1, 40000),
(2, 3, 21, 1, 60000),
(3, 3, 22, 1, 40000),
(4, 3, 21, 1, 60000),
(5, 3, 25, 1, 80000),
(6, 3, 21, 1, 60000),
(7, 7, 21, 7, 420000),
(8, 9, 21, 3, 180000),
(9, 10, 25, 3, 240000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`) VALUES
(3, 'pendidikan'),
(4, 'bisnis'),
(5, 'sejarah'),
(10, 'uotobiografi'),
(11, 'novel');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `keranjang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `Nama` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `No.Hp` int(25) NOT NULL,
  `Alamat` varchar(25) NOT NULL,
  `Kota` varchar(25) NOT NULL,
  `Provinsi` varchar(25) NOT NULL,
  `Id_user` int(25) NOT NULL,
  `Id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`Nama`, `Email`, `No.Hp`, `Alamat`, `Kota`, `Provinsi`, `Id_user`, `Id`) VALUES
('8', '8', 8, '8', '8', '8', 3, 1),
('8', '8', 8, '8', '8', '8', 3, 2),
('ssa', 'hi', 28938, '98', '989', '899', 7, 22),
('aldi', 'aldi@gmail.com', 877777, 'indramayu', 'indramayu', 'jawabarat', 6, 23),
('aldi', 'aldi@gmail.com', 877777, 'indramayu', 'indramayu', 'jawabarat', 6, 24),
('sahrul fazri', 'sahrul@gmail.com', 8777771, 'indramayu', 'indramayu', 'jawabarat', 9, 25),
('1', '1', 1, '1', '1', '1', 4, 26),
('1', '1', 1, '1', '1', '1', 4, 27),
('9', '9', 9, '9', '9', '9', 4, 28),
('sahrul fazri', 'sahrul@gmail.com', 877777567, 'lamaran tarung', 'indramayu', 'jawa barat', 10, 29);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(20) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `nama`, `role`) VALUES
(3, 'sahrul', '$2y$10$ZAyR6981PUm01B89N.OmqOTFzSwlIQDruXGWF9w05O9qK0YJr/6yK', 'sahrul', 0),
(4, 'admin', '$2y$10$m6ZmkgdaTGwVU6i2RG02huAba6hTEDq8C1MdhPLEFXWZs7q.Nw/u2', 'admin', 1),
(6, 'fazri', '$2y$10$EE2kvh8XljtBmitDdR/jouy2vVSlPAe3UMe4GzvCFs8pqeghD5sP2', 'fazri', 0),
(9, 'feby', '$2y$10$xgXKHLfKIKsRxrdocNxljeAq0ickw/Uiyfg3sD/iIXl/7p64ckRPi', 'feby', 0),
(10, 'udin', '$2y$10$6CI0vr7BSW/NT7n/HJrR7uOeF6JlXQqkauPSJtkgEJIiztex0I31q', 'udin', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`keranjang_id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `keranjang_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `Id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
