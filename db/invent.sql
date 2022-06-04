/*
SQLyog Ultimate v9.50 
MySQL - 5.5.5-10.1.16-MariaDB : Database - invent
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`invent` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `invent`;

/*Table structure for table `bagian` */

DROP TABLE IF EXISTS `bagian`;

CREATE TABLE `bagian` (
  `id_bagian` varchar(10) NOT NULL,
  `nama_bagian` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_bagian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bagian` */

insert  into `bagian`(`id_bagian`,`nama_bagian`) values ('ajl','Ajl'),('prep','Preparation'),('shtl2','Shuttle 2'),('shtl3','Shuttle 3');

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `id_fungsi` int(11) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL,
  `status_barang` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`id_barang`,`nama_barang`,`id_jenis`,`id_fungsi`,`id_bagian`,`status_barang`) values ('SP.121','dasf',2,6,'Shtl2',NULL),('SP.A003','ASBETOS',5,3,'Shtl2',NULL),('SP.F004','Finder Stay',9,2,'Shtl2',NULL),('AS.101','KOLOR',1,6,'Shtl3',NULL),('sp.ss','bearing',4,3,'Shtl2',NULL),('54654','SAFDF',15,8,'Ajl','AJL');

/*Table structure for table `barang_keluar` */

DROP TABLE IF EXISTS `barang_keluar`;

CREATE TABLE `barang_keluar` (
  `id_transaksi` varchar(20) NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `stok_keluar` int(11) DEFAULT NULL,
  `total_harga_keluar` int(11) DEFAULT NULL,
  `id_mesin` varchar(10) DEFAULT NULL,
  `id_mtc` varchar(10) DEFAULT NULL,
  `id_kagrup` varchar(10) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang_keluar` */

insert  into `barang_keluar`(`id_transaksi`,`tgl_keluar`,`stok_keluar`,`total_harga_keluar`,`id_mesin`,`id_mtc`,`id_kagrup`,`id_bagian`) values ('OUT00000001','2019-07-16',1,1000,'A23','MTC14','KG01','Shtl2'),('OUT00000002','2019-07-16',1,1000,'A21','MTC15','KG01','Shtl2'),('OUT00000003','2019-07-16',1,1200,'A24','MTC11','KG01','Shtl2'),('OUT00000004','2019-07-19',1,100,'A24','MTC15','KG03','Shtl3'),('OUT00000005','2019-08-02',10,11500,'J01','2424','2141','Ajl');

/*Table structure for table `barang_masuk` */

DROP TABLE IF EXISTS `barang_masuk`;

CREATE TABLE `barang_masuk` (
  `id_transaksi` varchar(20) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `stok_masuk` int(10) DEFAULT NULL,
  `total_harga_masuk` int(11) DEFAULT NULL,
  `penanggung_jawab` varchar(20) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang_masuk` */

insert  into `barang_masuk`(`id_transaksi`,`tgl_masuk`,`stok_masuk`,`total_harga_masuk`,`penanggung_jawab`,`id_bagian`) values ('IN00000001','2019-06-10',2,2000,'ASDAS','Shtl2'),('IN00000002','2019-07-16',7,8400,'ASDAS','Shtl2'),('IN00000003','2019-06-03',8,32000,'ASDAS','Shtl2'),('IN00000004','2019-07-05',10,50000,'ASDAS','Shtl2'),('IN00000005','2019-07-24',7,7000,'SDFAS','Ajl'),('IN00000006','2019-08-01',4,6000,'FGJG','Ajl');

/*Table structure for table `dtl_barang_keluar` */

DROP TABLE IF EXISTS `dtl_barang_keluar`;

CREATE TABLE `dtl_barang_keluar` (
  `id_transaksi` varchar(20) DEFAULT NULL,
  `id_barang` varchar(20) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `sub_harga` int(11) DEFAULT NULL,
  `id_trans_msk` varchar(20) DEFAULT NULL,
  `tgl_msk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dtl_barang_keluar` */

insert  into `dtl_barang_keluar`(`id_transaksi`,`id_barang`,`tgl_keluar`,`stok`,`harga`,`sub_harga`,`id_trans_msk`,`tgl_msk`) values ('OUT00000001','SP.A003','2019-07-16',1,1000,1000,'IN00000001','2019-06-10'),('OUT00000002','SP.A003','2019-07-16',1,1000,1000,'IN00000001','2019-06-10'),('OUT00000003','SP.A003','2019-07-16',1,1200,1200,'IN00000002','2019-07-16'),('OUT00000004','WQWQ12','2019-07-19',1,100,100,'IN00000005','2019-07-18'),('OUT00000005','54654','2019-08-02',7,1000,7000,'IN00000005','2019-07-24'),('OUT00000005','54654','2019-08-02',3,1500,4500,'IN00000006','2019-08-01');

/*Table structure for table `fungsi` */

DROP TABLE IF EXISTS `fungsi`;

CREATE TABLE `fungsi` (
  `id_fungsi` int(11) NOT NULL AUTO_INCREMENT,
  `fungsi` varchar(30) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_fungsi`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `fungsi` */

insert  into `fungsi`(`id_fungsi`,`fungsi`,`id_bagian`) values (1,'LUSI (WARP LINE)','Shtl2'),(2,'PAKAN  (WEFT LINE)','Shtl2'),(3,'MOTOR UTAMA','Shtl2'),(4,'MESIN PALET','Shtl2'),(5,'BAUT BAUT','Shtl2'),(6,'BARANG LAIN-LAIN','Shtl2'),(7,'LUSI','Ajl'),(8,'PAKAN','Ajl'),(9,'PENOLONG','Ajl');

/*Table structure for table `jenis` */

DROP TABLE IF EXISTS `jenis`;

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(30) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `jenis` */

insert  into `jenis`(`id_jenis`,`jenis`,`id_bagian`) values (1,'AKSESORIS','Shtl2'),(2,'ALAT KERJA','Shtl2'),(3,'ALAT TULIS','Shtl2'),(4,'COP CHANGE','Shtl2'),(5,'GERAKAN UTAMA','Shtl2'),(6,'LET OF','Shtl2'),(7,'MC SCHARER','Shtl2'),(8,'PELUMAS','Shtl2'),(9,'PICKING','Shtl2'),(10,'SEDDING','Shtl2'),(11,'TACKING UP','Shtl2'),(12,'WARP STOP','Shtl2'),(13,'WEFT STOP','Shtl2'),(14,'AKSESORIS','Ajl'),(15,'SHEDING MOTION','Ajl'),(16,'BEATHING MOTION','Ajl'),(17,'TAKE UP MOTION','Ajl'),(18,'LET OFF MOTION','Ajl'),(19,'INSERTION','Ajl'),(20,'LUBRICANT','Ajl');

/*Table structure for table `kagrup` */

DROP TABLE IF EXISTS `kagrup`;

CREATE TABLE `kagrup` (
  `id_kagrup` varchar(10) NOT NULL,
  `nama_kagrup` varchar(30) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_kagrup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kagrup` */

insert  into `kagrup`(`id_kagrup`,`nama_kagrup`,`id_bagian`) values ('2141','ASWW','Ajl'),('KG01','Suprihatin','Shtl2'),('KG02','Dedy Ardiyanto','Shtl2'),('KG03','Daris Ismanto','Shtl2'),('KG04','Hendrik Helis','Shtl2');

/*Table structure for table `mesin` */

DROP TABLE IF EXISTS `mesin`;

CREATE TABLE `mesin` (
  `id_mesin` varchar(10) NOT NULL,
  `zona` varchar(8) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_mesin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mesin` */

insert  into `mesin`(`id_mesin`,`zona`,`id_bagian`) values ('A1','Zona 1','Shtl2'),('A10','Zona 1','Shtl2'),('A11','Zona 1','Shtl2'),('A12','Zona 1','Shtl2'),('A13','Zona 1','Shtl2'),('A14','Zona 1','Shtl2'),('A15','Zona 1','Shtl2'),('A16','Zona 1','Shtl2'),('A17','Zona 1','Shtl2'),('A18','Zona 1','Shtl2'),('A19','Zona 3','Shtl2'),('A2','Zona 1','Shtl2'),('A20','Zona 3','Shtl2'),('A21','Zona 3','Shtl2'),('A22','Zona 3','Shtl2'),('A23','Zona 3','Shtl2'),('A24','Zona 3','Shtl2'),('A25','Zona 3','Shtl2'),('A26','Zona 3','Shtl2'),('A27','Zona 3','Shtl2'),('A28','Zona 3','Shtl2'),('A29','Zona 3','Shtl2'),('A3','Zona 1','Shtl2'),('A30','Zona 3','Shtl2'),('A31','Zona 3','Shtl2'),('A32','Zona 3','Shtl2'),('A33','Zona 3','Shtl2'),('A34','Zona 3','Shtl2'),('A35','Zona 3','Shtl2'),('A36','Zona 3','Shtl2'),('A4','Zona 1','Shtl2'),('A5','Zona 1','Shtl2'),('A6','Zona 1','Shtl2'),('A7','Zona 1','Shtl2'),('A8','Zona 1','Shtl2'),('A9','Zona 1','Shtl2'),('B1','Zona 1','Shtl2'),('B10','Zona 1','Shtl2'),('B11','Zona 1','Shtl2'),('B12','Zona 1','Shtl2'),('B13','Zona 1','Shtl2'),('B14','Zona 1','Shtl2'),('B15','Zona 1','Shtl2'),('B16','Zona 1','Shtl2'),('B17','Zona 1','Shtl2'),('B18','Zona 1','Shtl2'),('B19','Zona 3','Shtl2'),('B2','Zona 1','Shtl2'),('B20','Zona 3','Shtl2'),('B21','Zona 3','Shtl2'),('B22','Zona 3','Shtl2'),('B23','Zona 3','Shtl2'),('B24','Zona 3','Shtl2'),('B25','Zona 3','Shtl2'),('B26','Zona 3','Shtl2'),('B27','Zona 3','Shtl2'),('B28','Zona 3','Shtl2'),('B29','Zona 3','Shtl2'),('B3','Zona 1','Shtl2'),('B30','Zona 3','Shtl2'),('B31','Zona 3','Shtl2'),('B32','Zona 3','Shtl2'),('B33','Zona 3','Shtl2'),('B34','Zona 3','Shtl2'),('B35','Zona 3','Shtl2'),('B36','Zona 3','Shtl2'),('B4','Zona 1','Shtl2'),('B5','Zona 1','Shtl2'),('B6','Zona 1','Shtl2'),('B7','Zona 1','Shtl2'),('B8','Zona 1','Shtl2'),('B9','Zona 1','Shtl2'),('C1','Zona 1','Shtl2'),('C10','Zona 1','Shtl2'),('C11','Zona 1','Shtl2'),('C12','Zona 1','Shtl2'),('C13','Zona 1','Shtl2'),('C14','Zona 1','Shtl2'),('C15','Zona 1','Shtl2'),('C16','Zona 1','Shtl2'),('C17','Zona 1','Shtl2'),('C18','Zona 1','Shtl2'),('C19','Zona 3','Shtl2'),('C2','Zona 1','Shtl2'),('C20','Zona 3','Shtl2'),('C21','Zona 3','Shtl2'),('C22','Zona 3','Shtl2'),('C23','Zona 3','Shtl2'),('C24','Zona 3','Shtl2'),('C25','Zona 3','Shtl2'),('C26','Zona 3','Shtl2'),('C27','Zona 3','Shtl2'),('C28','Zona 3','Shtl2'),('C29','Zona 3','Shtl2'),('C3','Zona 1','Shtl2'),('C30','Zona 3','Shtl2'),('C31','Zona 3','Shtl2'),('C32','Zona 3','Shtl2'),('C33','Zona 3','Shtl2'),('C34','Zona 3','Shtl2'),('C35','Zona 3','Shtl2'),('C36','Zona 3','Shtl2'),('C4','Zona 1','Shtl2'),('C5','Zona 1','Shtl2'),('C6','Zona 1','Shtl2'),('C7','Zona 1','Shtl2'),('C8','Zona 1','Shtl2'),('C9','Zona 1','Shtl2'),('D1','Zona 1','Shtl2'),('D10','Zona 1','Shtl2'),('D11','Zona 1','Shtl2'),('D12','Zona 1','Shtl2'),('D13','Zona 1','Shtl2'),('D14','Zona 1','Shtl2'),('D15','Zona 1','Shtl2'),('D16','Zona 1','Shtl2'),('D17','Zona 1','Shtl2'),('D18','Zona 1','Shtl2'),('D19','Zona 3','Shtl2'),('D2','Zona 1','Shtl2'),('D20','Zona 3','Shtl2'),('D21','Zona 3','Shtl2'),('D22','Zona 3','Shtl2'),('D23','Zona 3','Shtl2'),('D24','Zona 3','Shtl2'),('D25','Zona 3','Shtl2'),('D26','Zona 3','Shtl2'),('D27','Zona 3','Shtl2'),('D28','Zona 3','Shtl2'),('D29','Zona 3','Shtl2'),('D3','Zona 1','Shtl2'),('D30','Zona 3','Shtl2'),('D31','Zona 3','Shtl2'),('D32','Zona 3','Shtl2'),('D33','Zona 3','Shtl2'),('D34','Zona 3','Shtl2'),('D35','Zona 3','Shtl2'),('D36','Zona 3','Shtl2'),('D4','Zona 1','Shtl2'),('D5','Zona 1','Shtl2'),('D6','Zona 1','Shtl2'),('D7','Zona 1','Shtl2'),('D8','Zona 1','Shtl2'),('D9','Zona 1','Shtl2'),('E1','Zona 1','Shtl2'),('E10','Zona 1','Shtl2'),('E11','Zona 1','Shtl2'),('E12','Zona 1','Shtl2'),('E13','Zona 1','Shtl2'),('E14','Zona 1','Shtl2'),('E15','Zona 1','Shtl2'),('E16','Zona 1','Shtl2'),('E17','Zona 1','Shtl2'),('E18','Zona 1','Shtl2'),('E19','Zona 3','Shtl2'),('E2','Zona 1','Shtl2'),('E20','Zona 3','Shtl2'),('E21','Zona 3','Shtl2'),('E22','Zona 3','Shtl2'),('E23','Zona 3','Shtl2'),('E24','Zona 3','Shtl2'),('E25','Zona 3','Shtl2'),('E26','Zona 3','Shtl2'),('E27','Zona 3','Shtl2'),('E28','Zona 3','Shtl2'),('E29','Zona 3','Shtl2'),('E3','Zona 1','Shtl2'),('E30','Zona 3','Shtl2'),('E31','Zona 3','Shtl2'),('E32','Zona 3','Shtl2'),('E33','Zona 3','Shtl2'),('E34','Zona 3','Shtl2'),('E35','Zona 3','Shtl2'),('E36','Zona 3','Shtl2'),('E4','Zona 1','Shtl2'),('E5','Zona 1','Shtl2'),('E6','Zona 1','Shtl2'),('E7','Zona 1','Shtl2'),('E8','Zona 1','Shtl2'),('E9','Zona 1','Shtl2'),('F1','Zona 2','Shtl2'),('F10','Zona 2','Shtl2'),('F11','Zona 2','Shtl2'),('F12','Zona 2','Shtl2'),('F13','Zona 2','Shtl2'),('F14','Zona 2','Shtl2'),('F15','Zona 2','Shtl2'),('F16','Zona 2','Shtl2'),('F17','Zona 2','Shtl2'),('F18','Zona 2','Shtl2'),('F19','Zona 4','Shtl2'),('F2','Zona 2','Shtl2'),('F20','Zona 4','Shtl2'),('F21','Zona 4','Shtl2'),('F22','Zona 4','Shtl2'),('F23','Zona 4','Shtl2'),('F24','Zona 4','Shtl2'),('F25','Zona 4','Shtl2'),('F26','Zona 4','Shtl2'),('F27','Zona 4','Shtl2'),('F28','Zona 4','Shtl2'),('F29','Zona 4','Shtl2'),('F3','Zona 2','Shtl2'),('F30','Zona 4','Shtl2'),('F31','Zona 4','Shtl2'),('F32','Zona 4','Shtl2'),('F33','Zona 4','Shtl2'),('F34','Zona 4','Shtl2'),('F35','Zona 4','Shtl2'),('F36','Zona 4','Shtl2'),('F4','Zona 2','Shtl2'),('F5','Zona 2','Shtl2'),('F6','Zona 2','Shtl2'),('F7','Zona 2','Shtl2'),('F8','Zona 2','Shtl2'),('F9','Zona 2','Shtl2'),('G1','Zona 2','Shtl2'),('G10','Zona 2','Shtl2'),('G11','Zona 2','Shtl2'),('G12','Zona 2','Shtl2'),('G13','Zona 2','Shtl2'),('G14','Zona 2','Shtl2'),('G15','Zona 2','Shtl2'),('G16','Zona 2','Shtl2'),('G17','Zona 2','Shtl2'),('G18','Zona 2','Shtl2'),('G19','Zona 4','Shtl2'),('G2','Zona 2','Shtl2'),('G20','Zona 4','Shtl2'),('G21','Zona 4','Shtl2'),('G22','Zona 4','Shtl2'),('G23','Zona 4','Shtl2'),('G24','Zona 4','Shtl2'),('G25','Zona 4','Shtl2'),('G26','Zona 4','Shtl2'),('G27','Zona 4','Shtl2'),('G28','Zona 4','Shtl2'),('G29','Zona 4','Shtl2'),('G3','Zona 2','Shtl2'),('G30','Zona 4','Shtl2'),('G31','Zona 4','Shtl2'),('G32','Zona 4','Shtl2'),('G33','Zona 4','Shtl2'),('G34','Zona 4','Shtl2'),('G35','Zona 4','Shtl2'),('G36','Zona 4','Shtl2'),('G4','Zona 2','Shtl2'),('G5','Zona 2','Shtl2'),('G6','Zona 2','Shtl2'),('G7','Zona 2','Shtl2'),('G8','Zona 2','Shtl2'),('G9','Zona 2','Shtl2'),('H1','Zona 2','Shtl2'),('H10','Zona 2','Shtl2'),('H11','Zona 2','Shtl2'),('H12','Zona 2','Shtl2'),('H13','Zona 2','Shtl2'),('H14','Zona 2','Shtl2'),('H15','Zona 2','Shtl2'),('H16','Zona 2','Shtl2'),('H17','Zona 2','Shtl2'),('H18','Zona 2','Shtl2'),('H19','Zona 4','Shtl2'),('H2','Zona 2','Shtl2'),('H20','Zona 4','Shtl2'),('H21','Zona 4','Shtl2'),('H22','Zona 4','Shtl2'),('H23','Zona 4','Shtl2'),('H24','Zona 4','Shtl2'),('H25','Zona 4','Shtl2'),('H26','Zona 4','Shtl2'),('H27','Zona 4','Shtl2'),('H28','Zona 4','Shtl2'),('H29','Zona 4','Shtl2'),('H3','Zona 2','Shtl2'),('H30','Zona 4','Shtl2'),('H31','Zona 4','Shtl2'),('H32','Zona 4','Shtl2'),('H33','Zona 4','Shtl2'),('H34','Zona 4','Shtl2'),('H35','Zona 4','Shtl2'),('H36','Zona 4','Shtl2'),('H4','Zona 2','Shtl2'),('H5','Zona 2','Shtl2'),('H6','Zona 2','Shtl2'),('H7','Zona 2','Shtl2'),('H8','Zona 2','Shtl2'),('H9','Zona 2','Shtl2'),('I1','Zona 2','Shtl2'),('I10','Zona 2','Shtl2'),('I11','Zona 2','Shtl2'),('I12','Zona 2','Shtl2'),('I13','Zona 2','Shtl2'),('I14','Zona 2','Shtl2'),('I15','Zona 2','Shtl2'),('I16','Zona 2','Shtl2'),('I17','Zona 2','Shtl2'),('I18','Zona 2','Shtl2'),('I19','Zona 4','Shtl2'),('I2','Zona 2','Shtl2'),('I20','Zona 4','Shtl2'),('I21','Zona 4','Shtl2'),('I22','Zona 4','Shtl2'),('I23','Zona 4','Shtl2'),('I24','Zona 4','Shtl2'),('I25','Zona 4','Shtl2'),('I26','Zona 4','Shtl2'),('I27','Zona 4','Shtl2'),('I28','Zona 4','Shtl2'),('I29','Zona 4','Shtl2'),('I3','Zona 2','Shtl2'),('I30','Zona 4','Shtl2'),('I31','Zona 4','Shtl2'),('I32','Zona 4','Shtl2'),('I33','Zona 4','Shtl2'),('I34','Zona 4','Shtl2'),('I35','Zona 4','Shtl2'),('I36','Zona 4','Shtl2'),('I4','Zona 2','Shtl2'),('I5','Zona 2','Shtl2'),('I6','Zona 2','Shtl2'),('I7','Zona 2','Shtl2'),('I8','Zona 2','Shtl2'),('I9','Zona 2','Shtl2'),('J01','ZONA 1','Ajl'),('K1','Zona 2','Shtl2'),('K10','Zona 2','Shtl2'),('K11','Zona 2','Shtl2'),('K12','Zona 2','Shtl2'),('K13','Zona 2','Shtl2'),('K14','Zona 2','Shtl2'),('K15','Zona 2','Shtl2'),('K16','Zona 2','Shtl2'),('K17','Zona 2','Shtl2'),('K18','Zona 2','Shtl2'),('K19','Zona 4','Shtl2'),('K2','Zona 2','Shtl2'),('K20','Zona 4','Shtl2'),('K21','Zona 4','Shtl2'),('K22','Zona 4','Shtl2'),('K23','Zona 4','Shtl2'),('K24','Zona 4','Shtl2'),('K25','Zona 4','Shtl2'),('K26','Zona 4','Shtl2'),('K27','Zona 4','Shtl2'),('K28','Zona 4','Shtl2'),('K29','Zona 4','Shtl2'),('K3','Zona 2','Shtl2'),('K30','Zona 4','Shtl2'),('K31','Zona 4','Shtl2'),('K32','Zona 4','Shtl2'),('K33','Zona 4','Shtl2'),('K34','Zona 4','Shtl2'),('K35','Zona 4','Shtl2'),('K36','Zona 4','Shtl2'),('K4','Zona 2','Shtl2'),('K5','Zona 2','Shtl2'),('K6','Zona 2','Shtl2'),('K7','Zona 2','Shtl2'),('K8','Zona 2','Shtl2'),('K9','Zona 2','Shtl2'),('N1','Zona 2','Shtl2'),('N10','Zona 2','Shtl2'),('N11','Zona 2','Shtl2'),('N12','Zona 2','Shtl2'),('N13','Zona 2','Shtl2'),('N14','Zona 2','Shtl2'),('N15','Zona 2','Shtl2'),('N16','Zona 2','Shtl2'),('N17','Zona 2','Shtl2'),('N18','Zona 2','Shtl2'),('N19','Zona 4','Shtl2'),('N2','Zona 2','Shtl2'),('N20','Zona 4','Shtl2'),('N21','Zona 4','Shtl2'),('N22','Zona 4','Shtl2'),('N23','Zona 4','Shtl2'),('N24','Zona 4','Shtl2'),('N25','Zona 4','Shtl2'),('N26','Zona 4','Shtl2'),('N27','Zona 4','Shtl2'),('N28','Zona 4','Shtl2'),('N29','Zona 4','Shtl2'),('N3','Zona 2','Shtl2'),('N30','Zona 4','Shtl2'),('N31','Zona 4','Shtl2'),('N32','Zona 4','Shtl2'),('N33','Zona 4','Shtl2'),('N34','Zona 4','Shtl2'),('N35','Zona 4','Shtl2'),('N36','Zona 4','Shtl2'),('N4','Zona 2','Shtl2'),('N5','Zona 2','Shtl2'),('N6','Zona 2','Shtl2'),('N7','Zona 2','Shtl2'),('N8','Zona 2','Shtl2'),('N9','Zona 2','Shtl2');

/*Table structure for table `mtc` */

DROP TABLE IF EXISTS `mtc`;

CREATE TABLE `mtc` (
  `id_mtc` varchar(10) NOT NULL,
  `nama_mtc` varchar(30) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_mtc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mtc` */

insert  into `mtc`(`id_mtc`,`nama_mtc`,`id_bagian`) values ('2424','DFSGS','Ajl'),('MTC01','ARIS ARTIYANA','Shtl2'),('MTC02','DEDY ARIYANTO','Shtl2'),('MTC03','DANANG EKA. S','Shtl2'),('MTC04','DWI CAHYO','Shtl2'),('MTC05','AHMAD ASRORI','Shtl2'),('MTC06','RIZAL','Shtl2'),('MTC07','DIMAS','Shtl2'),('MTC08','HERI ARIYANTO','Shtl2'),('MTC09','KHOIRUDIN','Shtl2'),('MTC10','WENDYTIA','Shtl2'),('MTC11','ILHAM','Shtl2'),('MTC12','ALFIAN','Shtl2'),('MTC13','NUR AHMAD','Shtl2'),('MTC14','MUNAWAR','Shtl2'),('MTC15','TRIYONO','Shtl2'),('MTC16','SIDIQ SUSANTA','Shtl2');

/*Table structure for table `stok_barang` */

DROP TABLE IF EXISTS `stok_barang`;

CREATE TABLE `stok_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_barang` varchar(20) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `stok_out` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_stok_barang` (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `stok_barang` */

insert  into `stok_barang`(`id`,`id_transaksi`,`tanggal`,`id_barang`,`stok`,`stok_out`,`harga`,`id_bagian`) values (13,'IN00000001','2019-06-10','SP.A003',0,2,1000,'Shtl2'),(14,'IN00000002','2019-07-16','SP.A003',6,1,1200,'Shtl2'),(15,'IN00000003','2019-06-03','SP.F004',8,0,4000,'Shtl2'),(16,'IN00000004','2019-07-05','SP.F004',10,0,5000,'Shtl2'),(17,'IN00000005','2019-07-24','54654',0,7,1000,'Ajl'),(18,'IN00000006','2019-08-01','54654',1,3,1500,'Ajl');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_bagian` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
