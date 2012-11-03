-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2012 at 04:11 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pleret`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `id_administrator` char(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`id_administrator`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id_administrator`, `username`, `password`) VALUES
('0001', 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` char(4) NOT NULL,
  `tanggal_berita` datetime NOT NULL,
  `judul_berita` varchar(20) NOT NULL,
  `isi_berita` varchar(1000) NOT NULL,
  KEY `id_berita` (`id_berita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `tanggal_berita`, `judul_berita`, `isi_berita`) VALUES
('6G5H', '2012-10-05 05:47:47', 'asdfasdf sdf', 'sdvasvdsfasf dfgdfgdfgdfgdf fdshysdfyjuchgv hjgdtrdyuhvcjhviugfiti');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` char(4) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `jk_dokter` enum('P','L') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `spesialis` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `jk_dokter`, `alamat`, `spesialis`) VALUES
('s2AJ', 'Eka Kumalasari Suryadi', 'P', 'Hatiku Terdalam', 'Hati');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `id_kamar` char(4) NOT NULL,
  `nama_kamar` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--


-- --------------------------------------------------------

--
-- Table structure for table `kategori_retribusi`
--

CREATE TABLE IF NOT EXISTS `kategori_retribusi` (
  `id_kategori_retribusi` char(4) NOT NULL,
  `jenis_retribusi` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori_retribusi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_retribusi`
--

INSERT INTO `kategori_retribusi` (`id_kategori_retribusi`, `jenis_retribusi`) VALUES
('0jE7', 'Cek Gula'),
('aj3f', 'Cek Darah'),
('xcGp', 'Donor Darah');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE IF NOT EXISTS `konsultasi` (
  `id_konsultasi` char(4) NOT NULL,
  `id_dokter` char(4) NOT NULL,
  `tgl_konsultasi` datetime NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsultasi`
--


-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE IF NOT EXISTS `kritik_saran` (
  `id_kritik_saran` char(4) NOT NULL,
  `tgl_kirim` datetime NOT NULL,
  `kritik_saran` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kritik_saran`
--


-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` char(4) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jk_pasien` enum('P','L') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgl_lahir` datetime NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--


-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE IF NOT EXISTS `pemeriksaan` (
  `id_pemeriksaan` char(4) NOT NULL,
  `nadi` int(11) NOT NULL,
  `tekanan` int(11) NOT NULL,
  `respirasi` int(11) NOT NULL,
  `suhu` int(11) NOT NULL,
  `id_dokter` char(4) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `penyakit` varchar(20) NOT NULL,
  `obat` char(10) NOT NULL,
  `id_periksa` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan`
--


-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_periksa`
--

CREATE TABLE IF NOT EXISTS `pendaftaran_periksa` (
  `id_periksa` char(4) NOT NULL,
  `id_pasien` char(4) NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  `keluhan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran_periksa`
--


-- --------------------------------------------------------

--
-- Table structure for table `rawat`
--

CREATE TABLE IF NOT EXISTS `rawat` (
  `id_rawat` char(4) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `id_kamar` char(4) NOT NULL,
  `id_pemeriksaan` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rawat`
--


-- --------------------------------------------------------

--
-- Table structure for table `retribusi`
--

CREATE TABLE IF NOT EXISTS `retribusi` (
  `nm_retribusi` varchar(20) NOT NULL,
  `id_retribusi` char(4) NOT NULL,
  `tarif` int(11) NOT NULL,
  `id_kategori_retribusi` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retribusi`
--

INSERT INTO `retribusi` (`nm_retribusi`, `id_retribusi`, `tarif`, `id_kategori_retribusi`) VALUES
('Donor Darah', '28R3', 0, 'xcGp');

-- --------------------------------------------------------

--
-- Table structure for table `rujukan`
--

CREATE TABLE IF NOT EXISTS `rujukan` (
  `id_rujukan` char(4) NOT NULL,
  `id_pemeriksaan` char(4) NOT NULL,
  `rumah_sakit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rujukan`
--


-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE IF NOT EXISTS `tindakan` (
  `id_tindakan` char(4) NOT NULL,
  `nama_tindakan` varchar(20) NOT NULL,
  `tindakan_penyakit` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tindakan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindakan`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` char(4) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

