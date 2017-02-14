# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.18-MariaDB)
# Database: kp_widi
# Generation Time: 2017-02-14 12:23:32 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table barang_keluar
# ------------------------------------------------------------

DROP TABLE IF EXISTS `barang_keluar`;

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(11) NOT NULL,
  `qty` int(5) NOT NULL,
  `id_ruangan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal_penarikan` date DEFAULT NULL,
  `status_pengembalian` int(1) DEFAULT NULL,
  `tanggal_penarikan_seharusnya` date DEFAULT NULL,
  PRIMARY KEY (`id_barang_keluar`),
  KEY `kode_barang` (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `barang_keluar` WRITE;
/*!40000 ALTER TABLE `barang_keluar` DISABLE KEYS */;

INSERT INTO `barang_keluar` (`id_barang_keluar`, `tanggal`, `kode_barang`, `qty`, `id_ruangan`, `id_user`, `keterangan`, `status`, `tanggal_penarikan`, `status_pengembalian`, `tanggal_penarikan_seharusnya`)
VALUES
	(1,'2017-01-06','B009',2,4,0,'',1,NULL,NULL,NULL),
	(2,'2017-01-06','B009',2,4,0,'',2,'2017-02-06',NULL,'2017-02-09'),
	(3,'2017-01-06','B009',2,4,0,'',2,'2017-02-06',NULL,'2017-02-02'),
	(4,'2017-01-06','B009',2,4,0,'',2,'2017-02-14',NULL,'2017-02-02'),
	(5,'2017-01-06','B009',2,4,0,'',2,'2017-02-14',NULL,'2017-02-08');

/*!40000 ALTER TABLE `barang_keluar` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table barang_masuk
# ------------------------------------------------------------

DROP TABLE IF EXISTS `barang_masuk`;

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `qty` int(5) NOT NULL,
  PRIMARY KEY (`id_barang_masuk`),
  KEY `kode_barang` (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `barang_masuk` WRITE;
/*!40000 ALTER TABLE `barang_masuk` DISABLE KEYS */;

INSERT INTO `barang_masuk` (`id_barang_masuk`, `tanggal`, `kode_barang`, `qty`)
VALUES
	(7,'2017-02-07','C001',200);

/*!40000 ALTER TABLE `barang_masuk` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table data_barang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_barang`;

CREATE TABLE `data_barang` (
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `stok_maksimum` int(5) NOT NULL,
  `id_jenis_barang` int(10) NOT NULL,
  `id_satuan` int(10) NOT NULL,
  `stok_minimum` int(5) NOT NULL,
  PRIMARY KEY (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `data_barang` WRITE;
/*!40000 ALTER TABLE `data_barang` DISABLE KEYS */;

INSERT INTO `data_barang` (`kode_barang`, `nama_barang`, `stok_maksimum`, `id_jenis_barang`, `id_satuan`, `stok_minimum`)
VALUES
	('B009','Komputer Acer X908',90,3,5,2),
	('C001','Keyboard XYZ',100,2,5,30);

/*!40000 ALTER TABLE `data_barang` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table keluhan_barang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `keluhan_barang`;

CREATE TABLE `keluhan_barang` (
  `id_keluhan` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `keluhan` text NOT NULL,
  `nama_barang` varchar(100) DEFAULT '',
  `tempat_perbaikan` varchar(20) NOT NULL DEFAULT '',
  `tanggal_kerusakan` date NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `penanggung_jawab` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_keluhan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table kondisi_barang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kondisi_barang`;

CREATE TABLE `kondisi_barang` (
  `id_kondisi` int(10) NOT NULL,
  `tanggal_cek` date NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `status_barang` enum('baik','rusak','servis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table master_jenis_barang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_jenis_barang`;

CREATE TABLE `master_jenis_barang` (
  `id_jenis_barang` int(10) NOT NULL AUTO_INCREMENT,
  `nama_jenis_barang` varchar(32) NOT NULL,
  PRIMARY KEY (`id_jenis_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `master_jenis_barang` WRITE;
/*!40000 ALTER TABLE `master_jenis_barang` DISABLE KEYS */;

INSERT INTO `master_jenis_barang` (`id_jenis_barang`, `nama_jenis_barang`)
VALUES
	(2,'keyboard'),
	(3,'Komputer'),
	(4,'Printer');

/*!40000 ALTER TABLE `master_jenis_barang` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_ruangan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_ruangan`;

CREATE TABLE `master_ruangan` (
  `id_ruangan` int(10) NOT NULL AUTO_INCREMENT,
  `nama_ruangan` varchar(32) NOT NULL,
  PRIMARY KEY (`id_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `master_ruangan` WRITE;
/*!40000 ALTER TABLE `master_ruangan` DISABLE KEYS */;

INSERT INTO `master_ruangan` (`id_ruangan`, `nama_ruangan`)
VALUES
	(4,'CK08');

/*!40000 ALTER TABLE `master_ruangan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_satuan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_satuan`;

CREATE TABLE `master_satuan` (
  `id_satuan` int(10) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(32) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `master_satuan` WRITE;
/*!40000 ALTER TABLE `master_satuan` DISABLE KEYS */;

INSERT INTO `master_satuan` (`id_satuan`, `nama_satuan`)
VALUES
	(5,'Pcs'),
	(7,'Ekor');

/*!40000 ALTER TABLE `master_satuan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `level_user` varchar(150) NOT NULL DEFAULT 'member',
  `niy` varchar(32) NOT NULL,
  `jabatan` varchar(32) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `level_user`, `niy`, `jabatan`)
VALUES
	(1,'ONPHPID','admin','21232f297a57a5a743894a0e4a801fc3','admin','',''),
	(2,'Regha','member','aa08769cdcb26674c6706093503ff0a3','member','','');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table usulan_barang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usulan_barang`;

CREATE TABLE `usulan_barang` (
  `id_usulan` int(10) NOT NULL AUTO_INCREMENT,
  `nama_barang_usulan` varchar(32) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(1) NOT NULL,
  `jumlah` int(5) NOT NULL,
  PRIMARY KEY (`id_usulan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
