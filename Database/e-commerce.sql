-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Nov 2018 pada 09.29
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_alamat`
--

CREATE TABLE IF NOT EXISTS `tbl_alamat` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_alamat`
--

INSERT INTO `tbl_alamat` (`id`, `username`, `alamat`) VALUES
(1, 'linda', 'Gg Haji Mantik Rt01/03 No6D Karadenan Cibinong Bogor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `kode_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`kode_barang`, `nama_barang`, `jenis_barang`, `harga`, `stock`, `deskripsi`, `foto`) VALUES
(1, 'Bloods Distros', 'Bajus', 400000, 90, 'deksrisdada', 'Capture.PNG'),
(3, 'Restart', 'Celana Jeans', 800000, 1, 'Celana restart bahan alami', '13112018141129jDIE.png'),
(4, 'wqdasd', 'as dka', 123, 1, '', '5784287579.jpg'),
(6, 'AsASj', 'jasdbjabdja', 12131, 123014, '	', '507995923.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keranjang`
--

CREATE TABLE IF NOT EXISTS `tbl_keranjang` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_keranjang`
--

INSERT INTO `tbl_keranjang` (`id`, `username`, `kode_barang`, `nama_barang`, `foto`, `harga`, `jumlah_barang`, `total`) VALUES
(2, 'linda', 4, 'wqdasd', '5784287579.jpg', 123, 1, 123),
(5, 'linda', 1, 'Bloods Distros', 'Capture.PNG', 400000, 3, 1200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE IF NOT EXISTS `tbl_pembayaran` (
  `kode_pesanan` int(11) NOT NULL,
  `no_resi` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `bukti_pembayaran` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`kode_pesanan`, `no_resi`, `username`, `total_pembayaran`, `bukti_pembayaran`) VALUES
(1, 2147483647, 'linda', 1600000, 'Capture.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesanan`
--

CREATE TABLE IF NOT EXISTS `tbl_pesanan` (
  `kode_pesanan` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `status` enum('pending','sudah dibayar','tidak masuk') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`kode_pesanan`, `username`, `kode_barang`, `jumlah_pesanan`, `harga_barang`, `tgl_pembayaran`, `status`) VALUES
(1, 'linda', 3, 2, 800000, '2018-11-14', 'sudah dibayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_profile` (
  `username` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` varchar(14) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_profile`
--

INSERT INTO `tbl_profile` (`username`, `nama`, `email`, `no_tlp`, `jenis_kelamin`, `tgl_lahir`) VALUES
('developer', '123', 'develop123@gmail.com', '10101000100010', 'Laki-Laki', '2018-11-01'),
('fazri', 'Noer Fazri Ramadhan', 'fazri121014@gmail.com', '085101003330', 'Laki-Laki', '2001-12-09'),
('linda', 'Linda Apriyanti', 'lindapriyanti67@gmail.com', '089612392121', 'Perempuan', '2001-04-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` enum('admin','pelanggan','developer') NOT NULL,
  `status` enum('terblokir','tidak terblokir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `password`, `level`, `status`) VALUES
('developer', '123', 'developer', 'tidak terblokir'),
('fazri', '123', 'admin', 'tidak terblokir'),
('linda', '123', 'pelanggan', 'tidak terblokir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alamat`
--
ALTER TABLE `tbl_alamat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`kode_pesanan`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`kode_pesanan`);

--
-- Indexes for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_alamat`
--
ALTER TABLE `tbl_alamat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `kode_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `kode_pesanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `kode_pesanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
