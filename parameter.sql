-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2022 pada 11.19
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `parameter`
--

CREATE TABLE `parameter` (
  `no` int(11) NOT NULL,
  `field` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `parameter`
--

INSERT INTO `parameter` (`no`, `field`, `type`, `deskripsi`) VALUES
(1, 'sumber', 'Number', 'Source of the data: 1= Export , 2= Import'),
(2, 'periode', 'Number', 'Period of the data: 1= Month , 2= Yearly'),
(3, 'kodehs', 'Number', 'HS Code of the data, use separator ; for multiple HS Code. e.g. firstHScode;secondHScode.'),
(4, 'jenishs', 'Number', 'Type of HS Code: 1= Two digit , 2= Full HS Code. If jenishs = 1 then the kodehs is two digits. If jenishs = 2 then the full digit kodehs follows the master hscode by year.'),
(5, 'Tahun', 'String', 'Year of data'),
(6, 'Key', 'String', 'Key app to access API');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `parameter`
--
ALTER TABLE `parameter`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
