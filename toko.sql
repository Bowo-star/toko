-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2022 pada 16.54
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nik` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nik`, `username`, `password`, `level`, `nama`, `no_telp`, `alamat`) VALUES
('3411141068', 'admin', 'admin', 'admin', 'abok', '08189283123', 'jl mangga dua lima ratus no 56'),
('123124123123123', 'gudang', 'gudang', 'gudang', 'ifvan', '0989723423423', 'jl kelapa batok'),
('323234234444444', 'owner', 'owner', 'owner', 'agun', '0816123615231', 'jl jeruk purut'),
('348230423874289', 'abok', 'abok', 'customer', 'udin', '0889273465761', 'jl jeruk kelapa'),
('456978612783461', 'member', 'member', 'member', 'raka', '0891286317263', 'jl kelapa mangga dua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` varchar(15) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `id_produk` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `nik`, `nama_customer`, `alamat`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `no_telp`, `id_produk`, `nama_barang`, `jumlah`, `tanggal`, `status`) VALUES
('115070405', '209810293412673', 'udin', 'jl mangga dua ', 'jawa barat', 'bandung', 'cimahi utara', 'padasuka', '0891125617235', 'J002', 'Jam Analog', '50', 'Wednesday, 14-July-2021', 'Pesanan Diterima');

--
-- Trigger `pembelian`
--
DELIMITER $$
CREATE TRIGGER `pembelianproduk` AFTER INSERT ON `pembelian` FOR EACH ROW BEGIN
	UPDATE produk SET stok=stok-new.jumlah
    WHERE id_produk = new.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelianmember`
--

CREATE TABLE `pembelianmember` (
  `id_pembelianm` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelianmember`
--

INSERT INTO `pembelianmember` (`id_pembelianm`, `nik`, `nama_member`, `alamat`, `no_telp`, `nama_produk`, `jumlah`, `deskripsi`, `tanggal`, `status`) VALUES
('117070705', '2313412341', 'agun', 'jl kelapa sawit gang cinta', '0891123123', 'Jam Analog Custom', '10', 'jam cusotm ', 'Saturday, 24-July-20', 'Pesanan Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(20) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `harga` varchar(40) NOT NULL,
  `stok` varchar(40) NOT NULL,
  `deskripsi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_barang`, `harga`, `stok`, `deskripsi`) VALUES
('J001', 'Jam Digital', '40000', '400', 'Jam digitalmotif army coklat'),
('J002', 'Jam Analog', '25000', '250', 'Jam analog strap hitam polos'),
('J003', 'Jam Analog', '30000', '300', 'Jam analog strap hitam sablon'),
('J004', 'Jam Digital', '45000', '500', 'Jam digital dengan motif warna');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelianmember`
--
ALTER TABLE `pembelianmember`
  ADD PRIMARY KEY (`id_pembelianm`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
