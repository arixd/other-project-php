-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2017 pada 09.32
-- Versi Server: 5.6.14
-- Versi PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `bogorvalleyapartement`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_divisi`
--

CREATE TABLE IF NOT EXISTS `tabel_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(20) NOT NULL,
  PRIMARY KEY (`id_divisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_ijin_pribadi`
--

CREATE TABLE IF NOT EXISTS `tabel_ijin_pribadi` (
  `id_ijin_pribadi` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `id_shift` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `status_approve` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `jam` date NOT NULL,
  PRIMARY KEY (`id_ijin_pribadi`),
  KEY `id_pegawai` (`id_pegawai`),
  KEY `id_pegawai_2` (`id_pegawai`),
  KEY `id_shift` (`id_shift`),
  KEY `id_shift_2` (`id_shift`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jabatan`
--

CREATE TABLE IF NOT EXISTS `tabel_jabatan` (
  `id_jabatan` int(5) NOT NULL,
  `nama_jabatan` varchar(25) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jadwal`
--

CREATE TABLE IF NOT EXISTS `tabel_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pegawai`
--

CREATE TABLE IF NOT EXISTS `tabel_pegawai` (
  `id_pegawai` int(5) NOT NULL,
  `nip` int(8) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `access` varchar(30) NOT NULL,
  `tlpon` varchar(16) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `adress` text NOT NULL,
  `gender` varchar(25) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_permohonan_cuti`
--

CREATE TABLE IF NOT EXISTS `tabel_permohonan_cuti` (
  `id_cuti` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `id_shift` int(5) NOT NULL,
  `approve_status` int(11) NOT NULL,
  `keperluan` text NOT NULL,
  `jumlah_cuti` int(11) NOT NULL,
  `rencana` date NOT NULL,
  `kembali` date NOT NULL,
  PRIMARY KEY (`id_cuti`),
  KEY `id_pegawai` (`id_pegawai`),
  KEY `id_shift` (`id_shift`),
  KEY `id_shift_2` (`id_shift`),
  KEY `id_shift_3` (`id_shift`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_shift`
--

CREATE TABLE IF NOT EXISTS `tabel_shift` (
  `id_shift` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `nama_shift` varchar(20) NOT NULL,
  PRIMARY KEY (`id_shift`),
  KEY `id_pegawai` (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_spdl`
--

CREATE TABLE IF NOT EXISTS `tabel_spdl` (
  `id_spdl` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `nama_instansi` int(11) NOT NULL,
  `alasan` int(11) NOT NULL,
  `keperluan` int(11) NOT NULL,
  `tanggal_berangkat` int(11) NOT NULL,
  `tanggal_kembali` int(11) NOT NULL,
  `approve_status` int(11) NOT NULL,
  PRIMARY KEY (`id_spdl`),
  KEY `id_shift` (`id_shift`),
  KEY `id_pegawai` (`id_pegawai`),
  KEY `id_shift_2` (`id_shift`),
  KEY `id_shift_3` (`id_shift`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_tukar_jaga`
--

CREATE TABLE IF NOT EXISTS `tabel_tukar_jaga` (
  `id_tukar_jaga` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `id_shift` int(5) NOT NULL,
  `approve_status` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `alasan` text NOT NULL,
  `waktu_menggajukan` int(11) NOT NULL,
  `waktu_menggantikan` int(11) NOT NULL,
  PRIMARY KEY (`id_tukar_jaga`),
  KEY `id_pegawai` (`id_pegawai`),
  KEY `id_pegawai_2` (`id_pegawai`),
  KEY `id_shift` (`id_shift`),
  KEY `id_shift_2` (`id_shift`),
  KEY `id_shift_3` (`id_shift`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_tukar_off`
--

CREATE TABLE IF NOT EXISTS `tabel_tukar_off` (
  `id_off` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `id_shift` int(5) NOT NULL,
  `alasan` text NOT NULL,
  `approve_status` int(11) NOT NULL,
  `tanggal_mengajukan` date NOT NULL,
  `tanggal_mengantikan` date NOT NULL,
  PRIMARY KEY (`id_off`),
  KEY `id_pegawai` (`id_pegawai`),
  KEY `id_shift` (`id_shift`),
  KEY `id_shift_2` (`id_shift`),
  KEY `id_shift_3` (`id_shift`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tabel_ijin_pribadi`
--
ALTER TABLE `tabel_ijin_pribadi`
  ADD CONSTRAINT `tabel_ijin_pribadi_ibfk_2` FOREIGN KEY (`id_shift`) REFERENCES `tabel_shift` (`id_shift`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_ijin_pribadi_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tabel_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tabel_permohonan_cuti`
--
ALTER TABLE `tabel_permohonan_cuti`
  ADD CONSTRAINT `tabel_permohonan_cuti_ibfk_2` FOREIGN KEY (`id_shift`) REFERENCES `tabel_shift` (`id_shift`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_permohonan_cuti_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tabel_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tabel_shift`
--
ALTER TABLE `tabel_shift`
  ADD CONSTRAINT `tabel_shift_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tabel_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tabel_spdl`
--
ALTER TABLE `tabel_spdl`
  ADD CONSTRAINT `tabel_spdl_ibfk_2` FOREIGN KEY (`id_shift`) REFERENCES `tabel_shift` (`id_shift`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_spdl_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tabel_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tabel_tukar_jaga`
--
ALTER TABLE `tabel_tukar_jaga`
  ADD CONSTRAINT `tabel_tukar_jaga_ibfk_2` FOREIGN KEY (`id_shift`) REFERENCES `tabel_shift` (`id_shift`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_tukar_jaga_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tabel_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tabel_tukar_off`
--
ALTER TABLE `tabel_tukar_off`
  ADD CONSTRAINT `tabel_tukar_off_ibfk_2` FOREIGN KEY (`id_shift`) REFERENCES `tabel_shift` (`id_shift`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_tukar_off_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tabel_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
