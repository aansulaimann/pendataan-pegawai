# Host: localhost  (Version 5.5.5-10.4.17-MariaDB)
# Date: 2021-02-08 10:48:51
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "tb_jabatan"
#

DROP TABLE IF EXISTS `tb_jabatan`;
CREATE TABLE `tb_jabatan` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_jabatan` varchar(100) DEFAULT NULL,
  `singkatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_jabatan"
#

INSERT INTO `tb_jabatan` VALUES (1,'Chief Executive Officer','CEO'),(2,'Chief Marketing Officer','CMO'),(3,'Chief Technology Officer','CTO'),(4,'Project Manager','PM'),(5,'UI/UX Designer','UIX'),(6,'Web Developer','WEBDEV'),(7,'General Manager','GM');

#
# Structure for table "tb_login"
#

DROP TABLE IF EXISTS `tb_login`;
CREATE TABLE `tb_login` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_login"
#

INSERT INTO `tb_login` VALUES (1,'admin','admin@apkpendataan.com','admin123');

#
# Structure for table "tb_pegawai"
#

DROP TABLE IF EXISTS `tb_pegawai`;
CREATE TABLE `tb_pegawai` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `namaDepan` varchar(30) DEFAULT NULL,
  `namaBelakang` varchar(30) DEFAULT NULL,
  `tmpLahir` varchar(40) DEFAULT NULL,
  `jenKel` varchar(30) DEFAULT NULL,
  `tglLahir` date DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `noTelp` char(13) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_pegawai"
#

INSERT INTO `tb_pegawai` VALUES (1,'Ahmad','Prayoga','Jakarta','laki-laki','2002-06-03','Islam','juny@gmail.com','08765456545','Jalan panjangg','6007eae2a96de.jpg');

#
# Structure for table "tb_kontrak"
#

DROP TABLE IF EXISTS `tb_kontrak`;
CREATE TABLE `tb_kontrak` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `lama_kontrak` varchar(60) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `awalKontrak` date DEFAULT NULL,
  `akhirKontrak` date DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `id pegawai` (`id_pegawai`),
  KEY `id jabatan` (`id_jabatan`),
  CONSTRAINT `id jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`Id`),
  CONSTRAINT `id pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tb_kontrak"
#

INSERT INTO `tb_kontrak` VALUES (1,1,1,'3 tahun','2021-01-17 21:26:20','2021-01-17','2023-12-17');
