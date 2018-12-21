# Host: localhost  (Version 5.5.5-10.1.19-MariaDB)
# Date: 2018-12-21 13:58:54
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "dokter"
#

DROP TABLE IF EXISTS `dokter`;
CREATE TABLE `dokter` (
  `id_dokter` varchar(5) NOT NULL DEFAULT '',
  `nama_dok` varchar(255) DEFAULT NULL,
  `id_klinik` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "dokter"
#

/*!40000 ALTER TABLE `dokter` DISABLE KEYS */;
INSERT INTO `dokter` VALUES ('D02','Dra. Yunita Sari','K02'),('D03','Dr. Samsudin ','K01'),('D04','Dr. Al Farisi','K01'),('D05','Dra. Ayuningtyas','K02'),('D06','Dr. Keno Wijayaa','K01'),('D07','Dr. Deddy','K02'),('D08','Dra. Dimas','K02'),('D09','Dr. Yuni','K02');
/*!40000 ALTER TABLE `dokter` ENABLE KEYS */;

#
# Structure for table "klinik"
#

DROP TABLE IF EXISTS `klinik`;
CREATE TABLE `klinik` (
  `id_klinik` varchar(5) NOT NULL DEFAULT '',
  `nama_klinik` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_klinik`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "klinik"
#

/*!40000 ALTER TABLE `klinik` DISABLE KEYS */;
INSERT INTO `klinik` VALUES ('K01','Gigi'),('K02','Kecantikan');
/*!40000 ALTER TABLE `klinik` ENABLE KEYS */;

#
# Structure for table "lainnya"
#

DROP TABLE IF EXISTS `lainnya`;
CREATE TABLE `lainnya` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `id_klinik` varchar(5) DEFAULT NULL,
  `id_dokter` varchar(5) DEFAULT NULL,
  `jamkunjung` varchar(255) DEFAULT NULL,
  `bayar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "lainnya"
#


#
# Structure for table "pasien"
#

DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien` (
  `no_rm` varchar(15) NOT NULL DEFAULT '',
  `nama` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `alamat` text,
  `tanggal_lahir` varchar(255) DEFAULT NULL,
  `id_klinik` varchar(3) DEFAULT NULL,
  `id_dokter` varchar(3) DEFAULT NULL,
  `id_antrian` varchar(10) DEFAULT NULL,
  `id_proses` varchar(255) DEFAULT NULL,
  `id_user` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`no_rm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "pasien"
#

INSERT INTO `pasien` VALUES ('RM000001','joko susilo bb','Laki-Laki','hghghg','2018-11-30','K01','D04','tAo4bPAc1O','P01','8'),('RM000003','said NUr','Laki-Laki','lll','2016-08-25','K02','D05','f5b7agKbT5','P02','10'),('RM000004','Nurul Muttaqin','Laki-Laki','nbnbnb','2017-11-29','K01','D04','pObR4J3FJj','P02','7');

#
# Structure for table "proses"
#

DROP TABLE IF EXISTS `proses`;
CREATE TABLE `proses` (
  `id_proses` varchar(5) NOT NULL DEFAULT '',
  `ket` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_proses`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "proses"
#

/*!40000 ALTER TABLE `proses` DISABLE KEYS */;
INSERT INTO `proses` VALUES ('P01','Selesai'),('P02','Menunggu');
/*!40000 ALTER TABLE `proses` ENABLE KEYS */;

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','Administrator','admin@admin.com',1),(2,'guest','084e0343a0486ff05530df6c705c8bb4','Guest','guest@gmail.com',2),(7,'taqin98','2f39c48082700646ba48b72dcac8bfac','Nurul Muttaqin','taqinjunior56@gmail.com',2),(8,'joko98','59e9d32bb9ef2a9deabe7531d1035144','joko susilo bb','taqin_j@yahoo.com',2),(9,'andika98','dbc9518c4da568cafb2661910ed511ff','andika','an@yahoo.com',2),(10,'said09','28e9af75dea3095b60cdb47ef2fdb2bd','said98','taqinjunior56@gmail.com',2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
