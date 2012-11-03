/*
Navicat MySQL Data Transfer

Source Server         : Mysql
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : puskesmas

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-11-02 14:27:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `berita`
-- ----------------------------
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita` (
  `Id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `Tgl_berita` date NOT NULL,
  `Judul_berita` varchar(30) NOT NULL,
  `Isi_berita` text NOT NULL,
  PRIMARY KEY (`Id_berita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of berita
-- ----------------------------

-- ----------------------------
-- Table structure for `dokter`
-- ----------------------------
DROP TABLE IF EXISTS `dokter`;
CREATE TABLE `dokter` (
  `Id_dokter` int(11) NOT NULL,
  `Nm_dokter` text NOT NULL,
  `Jk_dokter` enum('p','l') NOT NULL,
  `Alamat` text NOT NULL,
  `Spesialis` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dokter
-- ----------------------------

-- ----------------------------
-- Table structure for `kamar`
-- ----------------------------
DROP TABLE IF EXISTS `kamar`;
CREATE TABLE `kamar` (
  `Id_kamar` int(11) NOT NULL,
  `Nm_kamar` varchar(30) NOT NULL,
  `Harga` int(11) NOT NULL,
  PRIMARY KEY (`Id_kamar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kamar
-- ----------------------------

-- ----------------------------
-- Table structure for `kategoriretribusi`
-- ----------------------------
DROP TABLE IF EXISTS `kategoriretribusi`;
CREATE TABLE `kategoriretribusi` (
  `Id_kategoriretribusi` int(11) NOT NULL,
  `Jenis_retribusi` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_kategoriretribusi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategoriretribusi
-- ----------------------------

-- ----------------------------
-- Table structure for `konsultasi`
-- ----------------------------
DROP TABLE IF EXISTS `konsultasi`;
CREATE TABLE `konsultasi` (
  `Id_konsultasi` int(11) NOT NULL AUTO_INCREMENT,
  `Tgl_konsultasi` date NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Isi_konsultasi` text NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Status` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_konsultasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of konsultasi
-- ----------------------------

-- ----------------------------
-- Table structure for `kritiksaran`
-- ----------------------------
DROP TABLE IF EXISTS `kritiksaran`;
CREATE TABLE `kritiksaran` (
  `Id_kritiksaran` int(11) NOT NULL AUTO_INCREMENT,
  `Tgl_kirim` date NOT NULL,
  `Isi_kritiksaran` text NOT NULL,
  PRIMARY KEY (`Id_kritiksaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kritiksaran
-- ----------------------------

-- ----------------------------
-- Table structure for `notapembayaran`
-- ----------------------------
DROP TABLE IF EXISTS `notapembayaran`;
CREATE TABLE `notapembayaran` (
  `Id_notaPembayaran` int(11) NOT NULL,
  `Id_tindakanPemeriksaan` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Tgl_notaPembayaran` date NOT NULL,
  PRIMARY KEY (`Id_notaPembayaran`),
  KEY `fk_tindakanPemeriksaan_notaPembayaran` (`Id_tindakanPemeriksaan`),
  CONSTRAINT `fk_tindakanpemeriksaan_notapembayaran` FOREIGN KEY (`Id_tindakanPemeriksaan`) REFERENCES `tindakanpemeriksaan` (`Id_tindakanPemeriksaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of notapembayaran
-- ----------------------------

-- ----------------------------
-- Table structure for `notarawat`
-- ----------------------------
DROP TABLE IF EXISTS `notarawat`;
CREATE TABLE `notarawat` (
  `Id_notaRawat` int(11) NOT NULL,
  `Id_rawat` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Tgl_notaRawat` date NOT NULL,
  PRIMARY KEY (`Id_notaRawat`),
  KEY `fk_rawat_notarawat` (`Id_rawat`),
  CONSTRAINT `fk_rawat_notrawat` FOREIGN KEY (`Id_rawat`) REFERENCES `rawat` (`Id_rawat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of notarawat
-- ----------------------------

-- ----------------------------
-- Table structure for `pasien`
-- ----------------------------
DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien` (
  `Id_pasien` int(11) NOT NULL,
  `Nm_pasien` text NOT NULL,
  `no_askes` char(13) DEFAULT NULL,
  `Jk_pasien` enum('l','p') NOT NULL,
  `Alamat` text NOT NULL,
  `Tgl_lahir` date NOT NULL,
  PRIMARY KEY (`Id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pasien
-- ----------------------------

-- ----------------------------
-- Table structure for `pemeriksaan`
-- ----------------------------
DROP TABLE IF EXISTS `pemeriksaan`;
CREATE TABLE `pemeriksaan` (
  `Id_pemeriksaan` int(11) NOT NULL,
  `Id_pendaftaranPeriksa` int(11) NOT NULL,
  `Tgl_periksa` date NOT NULL,
  `Id_penyakit` int(11) NOT NULL,
  `Obat` varchar(30) NOT NULL,
  `Nadi` int(11) NOT NULL,
  `Tekanan_darah` int(11) NOT NULL,
  `Respirasi` int(11) NOT NULL,
  `Suhu` int(11) NOT NULL,
  `Id_dokter` int(11) NOT NULL,
  PRIMARY KEY (`Id_pemeriksaan`),
  KEY `fk_dokter_pemeriksaan` (`Id_dokter`),
  KEY `fk_pendaftaranperiksa_pemeriksaan` (`Id_pendaftaranPeriksa`),
  KEY `fk_penyakit_pemeriksan` (`Id_penyakit`),
  CONSTRAINT `fk_dokter_pemeriksaan` FOREIGN KEY (`Id_dokter`) REFERENCES `dokter` (`Id_dokter`),
  CONSTRAINT `fk_pendaftaranperiksa_pemeriksaaan` FOREIGN KEY (`Id_pendaftaranPeriksa`) REFERENCES `pendaftaranperiksa` (`Id_pendaftaranPeriksa`),
  CONSTRAINT `fk_penyakit_pemeriksaan` FOREIGN KEY (`Id_penyakit`) REFERENCES `penyakit` (`Id_penyakit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pemeriksaan
-- ----------------------------

-- ----------------------------
-- Table structure for `pendaftaranperiksa`
-- ----------------------------
DROP TABLE IF EXISTS `pendaftaranperiksa`;
CREATE TABLE `pendaftaranperiksa` (
  `Id_pendaftaranPeriksa` int(11) NOT NULL,
  `Id_pasien` int(11) NOT NULL,
  `Tgl_periksa` date NOT NULL,
  `Keluhan` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_pendaftaranPeriksa`),
  KEY `fk_pasien_pendaftaranperiksa` (`Id_pasien`),
  CONSTRAINT `fk_pasien_pendaftaranperiksa` FOREIGN KEY (`Id_pasien`) REFERENCES `pasien` (`Id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pendaftaranperiksa
-- ----------------------------

-- ----------------------------
-- Table structure for `penyakit`
-- ----------------------------
DROP TABLE IF EXISTS `penyakit`;
CREATE TABLE `penyakit` (
  `Id_penyakit` int(4) NOT NULL,
  `Nm_penyakit` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_penyakit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of penyakit
-- ----------------------------

-- ----------------------------
-- Table structure for `rawat`
-- ----------------------------
DROP TABLE IF EXISTS `rawat`;
CREATE TABLE `rawat` (
  `Id_rawat` int(11) NOT NULL,
  `Tgl_masuk` date NOT NULL,
  `Id_kamar` int(11) NOT NULL,
  `Id_tindakanPemeriksaan` int(11) NOT NULL,
  PRIMARY KEY (`Id_rawat`),
  KEY `fk_tindakanpemeriksaan_rawat` (`Id_tindakanPemeriksaan`),
  KEY `fk_kamar_rawat` (`Id_kamar`),
  CONSTRAINT `fk_kamar_rawat` FOREIGN KEY (`Id_tindakanPemeriksaan`) REFERENCES `kamar` (`Id_kamar`),
  CONSTRAINT `fk_tindakanpemeriksaan_rawat` FOREIGN KEY (`Id_tindakanPemeriksaan`) REFERENCES `tindakanpemeriksaan` (`Id_tindakanPemeriksaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rawat
-- ----------------------------

-- ----------------------------
-- Table structure for `retribusi`
-- ----------------------------
DROP TABLE IF EXISTS `retribusi`;
CREATE TABLE `retribusi` (
  `Id_retribusi` int(11) NOT NULL,
  `Nm_retribusi` varchar(30) NOT NULL,
  `Tarif` int(11) NOT NULL,
  `Id_kategoriretribusi` int(11) NOT NULL,
  PRIMARY KEY (`Id_retribusi`),
  KEY `fk_kategoriRetribusi_retribusi` (`Id_kategoriretribusi`),
  CONSTRAINT `fk_kategoriretribusi_retribusi` FOREIGN KEY (`Id_kategoriretribusi`) REFERENCES `kategoriretribusi` (`Id_kategoriretribusi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of retribusi
-- ----------------------------

-- ----------------------------
-- Table structure for `retribusi_pemeriksaan`
-- ----------------------------
DROP TABLE IF EXISTS `retribusi_pemeriksaan`;
CREATE TABLE `retribusi_pemeriksaan` (
  `id_retribusi_pemeriksaan` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `id_retribusi` int(11) NOT NULL,
  PRIMARY KEY (`id_retribusi_pemeriksaan`),
  KEY `fk_pemeriksaan_retribusi_pemeriksaan` (`id_pemeriksaan`),
  KEY `fk_retribusi_retribusi_pemeriksaan` (`id_retribusi`),
  CONSTRAINT `fk_retribusi_retribusi_pemeriksaan` FOREIGN KEY (`id_retribusi`) REFERENCES `retribusi` (`Id_retribusi`),
  CONSTRAINT `fk_pemeriksaaan_retribusi_pemeriksaan` FOREIGN KEY (`id_pemeriksaan`) REFERENCES `pemeriksaan` (`Id_pemeriksaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of retribusi_pemeriksaan
-- ----------------------------

-- ----------------------------
-- Table structure for `rujuk`
-- ----------------------------
DROP TABLE IF EXISTS `rujuk`;
CREATE TABLE `rujuk` (
  `Id_rujuk` int(11) NOT NULL,
  `Rumah_sakit` varchar(30) NOT NULL,
  `Id_tindakanPemeriksaan` int(11) NOT NULL,
  `Tgl_rujuk` date NOT NULL,
  PRIMARY KEY (`Id_rujuk`),
  KEY `fk_tindakanpemeriksaan_rujuk` (`Id_tindakanPemeriksaan`),
  CONSTRAINT `fk_tindakanpemeriksaa` FOREIGN KEY (`Id_tindakanPemeriksaan`) REFERENCES `tindakanpemeriksaan` (`Id_tindakanPemeriksaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rujuk
-- ----------------------------

-- ----------------------------
-- Table structure for `tindakanpemeriksaan`
-- ----------------------------
DROP TABLE IF EXISTS `tindakanpemeriksaan`;
CREATE TABLE `tindakanpemeriksaan` (
  `Id_tindakanPemeriksaan` int(11) NOT NULL,
  `Nm_tindakanPemeriksaaan` varchar(30) NOT NULL,
  `Id_pemeriksaan` int(11) NOT NULL,
  PRIMARY KEY (`Id_tindakanPemeriksaan`),
  KEY `fk_pemeriksaan_tindakanpemeriksaan` (`Id_pemeriksaan`),
  CONSTRAINT `fk_pemeriksaan_tindakanpemeriksaan` FOREIGN KEY (`Id_pemeriksaan`) REFERENCES `pemeriksaan` (`Id_pemeriksaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tindakanpemeriksaan
-- ----------------------------

-- ----------------------------
-- Table structure for `tindakanpenyakit`
-- ----------------------------
DROP TABLE IF EXISTS `tindakanpenyakit`;
CREATE TABLE `tindakanpenyakit` (
  `Id_tindakanPemeriksaan` int(11) NOT NULL AUTO_INCREMENT,
  `Nm_penyakit` varchar(30) NOT NULL,
  `Tindakan_penyait` text NOT NULL,
  PRIMARY KEY (`Id_tindakanPemeriksaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tindakanpenyakit
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Id_user` int(11) NOT NULL AUTO_INCREMENT,
  `Nm_user` text NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` text NOT NULL,
  `Status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
