-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2025 pada 12.36
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `produk` varchar(150) DEFAULT NULL,
  `label_barcode` varchar(150) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `produk`, `label_barcode`, `stok`, `harga`) VALUES
(2, 'Royco Ayam 8g', '8 999999 601331', 13, 500),
(34, 'Bedak Salicyl Mentol Cap Gajah 100g', '8 995179 100724', 19, 20000),
(35, 'Evageline Sea Salt', '8 997017 643387', 20, 20000),
(37, 'Instance Hand Sanitizer 100ml', '8 993417 096228', 19, 20000),
(40, 'Rivanol 300ml', '8 997028 985742', 19, 15000),
(41, 'Kayu Putih Cap Lang 60ml', '8 993176 110074', 20, 12000),
(42, 'Indomie Goreng Original 85g', '0 89686 01094 7', 18, 3000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_company_profile`
--

CREATE TABLE `tb_company_profile` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `pemilik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_company_profile`
--

INSERT INTO `tb_company_profile` (`id`, `nama_perusahaan`, `pemilik`) VALUES
(1, 'CV. Nippon Cahaya Asia', 'Bayu Bramasta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(150) DEFAULT NULL,
  `jumlah_item` int(11) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `operator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id`, `nama_barang`, `jumlah_item`, `harga`, `operator`) VALUES
(43, 'Royco Ayam 8g', 2, 500, 'Mirza');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `item` varchar(150) DEFAULT NULL,
  `total_item` int(11) DEFAULT NULL,
  `total_harga` bigint(20) DEFAULT NULL,
  `operator` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `username` varchar(90) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `foto_profile` varchar(255) NOT NULL,
  `level` enum('admin','operator') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `name`, `username`, `password`, `foto_profile`, `level`) VALUES
(4, 'Andhika', 'op2', 'YW5kaGlrYTIwMDc=', 'uploads/avatar5.png', 'operator'),
(5, 'Bayu', 'ad1', 'MTIzNDU2', 'uploads/bayu-bg-white.jpg', 'admin'),
(8, 'Budi', 'ad2', 'YnVkaTE5NzE=', 'uploads/user2-160x160.jpg', 'admin'),
(10, 'Mirza', 'op4', 'MTIzNDU2', 'uploads/user8-128x128.jpg', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_company_profile`
--
ALTER TABLE `tb_company_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tb_company_profile`
--
ALTER TABLE `tb_company_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
