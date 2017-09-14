-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Nov 2015 pada 06.35
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_laporan`
--

CREATE TABLE IF NOT EXISTS `dt_laporan` (
  `id` int(11) NOT NULL,
  `tgl_upload` date NOT NULL,
  `nama_file` varchar(35) NOT NULL,
  `tipe_file` varchar(10) NOT NULL,
  `ukuran_file` varchar(20) NOT NULL,
  `file` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_laporan`
--

INSERT INTO `dt_laporan` (`id`, `tgl_upload`, `nama_file`, `tipe_file`, `ukuran_file`, `file`) VALUES
(4, '2015-11-05', 'sample', 'pdf', '598370', '../dashboard/files/sample.pdf'),
(7, '2015-11-05', 'tes', 'pptx', '70261', '../dashboard/files/tes.pptx'),
(9, '2015-11-05', 'Laravel', 'pdf', '1140003', '../dashboard/files/Laravel.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_sample`
--

CREATE TABLE IF NOT EXISTS `dt_sample` (
  `id` int(11) NOT NULL,
  `nama_sample` varchar(20) DEFAULT NULL,
  `jenis_sample` varchar(15) DEFAULT NULL,
  `tgl_masuk` varchar(20) DEFAULT NULL,
  `tgl_keluar` varchar(20) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_sample`
--

INSERT INTO `dt_sample` (`id`, `nama_sample`, `jenis_sample`, `tgl_masuk`, `tgl_keluar`, `status`) VALUES
(9, 'Sample A', 'Cair', '11-11-2015', '13-11-2015', 'Proses'),
(10, 'Sample C', 'Padat', '05-11-2015', '14-11-2015', 'Proses'),
(11, 'Sample B', 'Cair', '06-11-2015', '13-11-2015', 'Finish'),
(12, 'Sample B1', 'Cair', '05-11-2015', '09-11-2015', 'Gagal'),
(13, 'Sample B2', 'Cair', '06-11-2015', '15-11-2015', 'Finish'),
(14, 'Sample A1', 'Padat', '12-11-2015', '22-11-2015', 'Finish'),
(15, 'Sample A2', 'Padat', '10-11-2015', '14-11-2015', 'Gagal'),
(16, 'Sample A3', 'Padat', '06-11-2015', '12-11-2015', 'Proses'),
(17, 'Sample C1', 'Padat', '04-11-2015', '14-11-2015', 'Proses'),
(18, 'Sample C2', 'Cair', '10-11-2015', '13-11-2015', 'Finish'),
(19, 'Sample C3', 'Cair', '19-11-2015', '21-11-2015', 'Gagal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `nomer_induk` varchar(30) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `telp` varchar(16) DEFAULT NULL,
  `alamat` text,
  `status` varchar(25) DEFAULT NULL,
  `gender` varchar(25) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `access` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nomer_induk`, `name`, `username`, `password`, `telp`, `alamat`, `status`, `gender`, `foto`, `kelas_id`, `access`) VALUES
(2, NULL, 'Muhammad Firman', 'firman', 'firman136', '089698963307', 'Pondokw Widyatama Indah Blok Q nomer 3- 4', 'PNS', 'Laki-laki', 'foto/yukihira.PNG', NULL, 'admin'),
(5, '90201321', 'Asih Nopriadi', 'asih', 'asih', '08969843121', 'Ulil Albab', 'Honorer', 'Laki-laki', 'foto/Koala.jpg', NULL, 'guru'),
(7, NULL, 'Mugiwara D.Luffy', 'luffy', 'luffy123', '08969896787', 'Grind Line', 'PNS', 'Laki-laki', 'foto/k.png', NULL, 'admin'),
(8, '1225410532', 'Dewi Verawati', 'dewi', 'dewi', '0891239140', 'LIPPI', 'PNS', 'Perempuan', 'foto/fs.jpg', NULL, 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_laporan`
--
ALTER TABLE `dt_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_sample`
--
ALTER TABLE `dt_sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_laporan`
--
ALTER TABLE `dt_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `dt_sample`
--
ALTER TABLE `dt_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
