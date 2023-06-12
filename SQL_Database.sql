-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.119
-- Waktu pembuatan: 12 Jun 2023 pada 13.52
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinjamsepeda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(101, 'Fakultas Sains dan Teknologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(30) NOT NULL,
  `password_user` varchar(32) NOT NULL,
  `status_mahasiswa` int(11) NOT NULL,
  `approve` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `password_user`, `status_mahasiswa`, `approve`, `email`, `nama`, `no_hp`, `jenis_kelamin`, `id_prodi`) VALUES
('20210001', '123123', 1, 1, '20210001@walisongo.ac.id', 'Dedi Cahyadi', '089912348769', 1, 2002),
('20210003', '123', 2, 1, '20210003@walisongo.ac.id', 'Widia', '89077678901', 2, 2001),
('20210004', '456', 1, 1, '20210004@walisongo.ac.id', 'Sultan', '081234567890', 1, 2001),
('20210005', '789', 1, 1, '20210005@walisongo.ac.id', 'Budi', '085678901234', 1, 2002);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `status_pinjam` varchar(20) NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `tgl_kembali` datetime NOT NULL,
  `no_sepeda` varchar(30) NOT NULL,
  `nim` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `status_pinjam`, `tgl_pinjam`, `tgl_kembali`, `no_sepeda`, `nim`) VALUES
(199091, 'Dikembalikan', '2023-06-11 16:48:36', '2023-06-11 16:48:36', 'PA001', '20210001'),
(199105, 'Tersedia', '2023-06-12 10:42:25', '2023-06-12 15:00:03', 'PA003', '20210004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `id_fakultas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `id_fakultas`) VALUES
(2001, 'Teknologi Informasi', 101),
(2002, 'Matematika', 101),
(2003, 'Biologi', 101);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sepeda`
--

CREATE TABLE `sepeda` (
  `no_sepeda` varchar(30) NOT NULL,
  `tgl_input` date NOT NULL,
  `status_sepeda` varchar(30) NOT NULL,
  `jenis_sepeda` varchar(30) NOT NULL,
  `warna` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sepeda`
--

INSERT INTO `sepeda` (`no_sepeda`, `tgl_input`, `status_sepeda`, `jenis_sepeda`, `warna`) VALUES
('PA001', '2023-06-09', 'Tersedia', 'Folding Bike', 'Biru'),
('PA002', '2023-06-09', 'Tersedia', 'Mountain Bike', 'Merah'),
('PA003', '2023-06-09', 'Tersedia', 'Country Bike', 'Hijau'),
('PI001', '2023-06-11', 'Tersedia', 'Electric Bike', 'Kuning'),
('PI002', '2023-06-11', 'Tersedia', 'Electric Bike', 'Putih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status_user` int(1) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nama`, `status_user`, `jabatan`, `password`) VALUES
(1, 'admin', 3, 'admin', '123123'),
(2, 'operator', 4, 'pengguna', '123123'),
(3, 'manager', 2, 'manager', '123123'),
(4, 'superadmin', 1, 'superadmin', '123123'),
(20210004, 'Sultan', 4, 'pengguna', '123123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `constrain_mahasiswa_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `constrain_peminjaman_mahasiswa` (`nim`),
  ADD KEY `constraint_peminjaman_sepeda` (`no_sepeda`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `constraint_prodi_fakultas` (`id_fakultas`);

--
-- Indeks untuk tabel `sepeda`
--
ALTER TABLE `sepeda`
  ADD PRIMARY KEY (`no_sepeda`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199106;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20210005;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `constrain_mahasiswa_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `constrain_peminjaman_mahasiswa` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_peminjaman_sepeda` FOREIGN KEY (`no_sepeda`) REFERENCES `sepeda` (`no_sepeda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `constraint_prodi_fakultas` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
