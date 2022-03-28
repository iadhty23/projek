-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2022 pada 08.06
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL,
  `c6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`) VALUES
(1, 1, 4, 2, 3, 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `per_pem` decimal(8,2) NOT NULL,
  `pel_pem` decimal(8,2) NOT NULL,
  `pen_pem` decimal(8,2) NOT NULL,
  `mel_mem` decimal(8,2) NOT NULL,
  `tug_tam` decimal(8,2) NOT NULL,
  `peng_keg` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nama`, `per_pem`, `pel_pem`, `pen_pem`, `mel_mem`, `tug_tam`, `peng_keg`) VALUES
(1, 'M. Nurcholis', '60.00', '64.29', '70.45', '58.33', '60.00', '56.25'),
(2, 'david', '100.00', '100.00', '77.27', '83.33', '80.00', '81.25'),
(3, 'Rukmaja', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai2`
--

CREATE TABLE `nilai2` (
  `id_nilai2` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `k1` int(4) NOT NULL,
  `k2` int(4) NOT NULL,
  `k3` int(4) NOT NULL,
  `k4` int(4) NOT NULL,
  `k5` int(4) NOT NULL,
  `k6` int(4) NOT NULL,
  `k7` int(4) NOT NULL,
  `k8` int(4) NOT NULL,
  `k9` int(4) NOT NULL,
  `k10` int(4) NOT NULL,
  `k11` int(4) NOT NULL,
  `k12` int(4) NOT NULL,
  `k13` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai2`
--

INSERT INTO `nilai2` (`id_nilai2`, `nama`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`, `k7`, `k8`, `k9`, `k10`, `k11`, `k12`, `k13`) VALUES
(9, '    David    ', 3, 3, 2, 3, 3, 4, 3, 4, 4, 3, 3, 2, 2),
(10, 'Fauzal Mubarok', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 4, 4, 4),
(11, '   Ilham   ', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `pend_ter` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `tanggal`, `telpon`, `kelamin`, `alamat`, `pend_ter`) VALUES
(29, 'David', '25', 'Laki-laki', 'Guru', '3 Tahun', 'S1'),
(30, 'Fauzal Mubarok', '30', 'Laki-laki', 'Guru', '5 Tahun/Lebih', 'S1'),
(31, 'Rifqi', '20', 'Laki-laki', 'Guru', '1 Tahun', 'SMA'),
(32, 'Ilham', '23', 'Laki-laki', 'Manager', '5 Tahun/Lebih', 'S2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Kepala Sekolah', 'admin', 'admin123', 'admin'),
(2, 'Guru', 'user', 'user123', 'user'),
(4, 'David', '29', 'user123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `nilai2`
--
ALTER TABLE `nilai2`
  ADD PRIMARY KEY (`id_nilai2`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `nilai2`
--
ALTER TABLE `nilai2`
  MODIFY `id_nilai2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
