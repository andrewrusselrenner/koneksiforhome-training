/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.10-MariaDB : Database - db_pelanggan_coba
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_pelanggan_coba` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_pelanggan_coba`;

/*Table structure for table `langganan` */

DROP TABLE IF EXISTS `langganan`;

CREATE TABLE `langganan` (
  `langgananId` int(120) NOT NULL AUTO_INCREMENT,
  `pelangganId` varchar(15) NOT NULL,
  `paketId` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`langgananId`),
  KEY `langganan_pelangganId_foreign` (`pelangganId`),
  KEY `langganan_paketId_foreign` (`paketId`),
  CONSTRAINT `langganan_paketId_foreign` FOREIGN KEY (`paketId`) REFERENCES `paket` (`paketId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `langganan_pelangganId_foreign` FOREIGN KEY (`pelangganId`) REFERENCES `pelanggan` (`pelangganId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `langganan` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`version`,`class`,`group`,`namespace`,`time`,`batch`) values 
(8,'2020-10-21-124808','App\\Database\\Migrations\\Pelanggan','default','App',1603287821,1),
(9,'2020-10-21-124809','App\\Database\\Migrations\\Paket','default','App',1603287821,1),
(10,'2020-10-21-124810','App\\Database\\Migrations\\Langganan','default','App',1603287821,1);

/*Table structure for table `paket` */

DROP TABLE IF EXISTS `paket`;

CREATE TABLE `paket` (
  `paketId` varchar(10) NOT NULL,
  `nama_paket` varchar(80) NOT NULL,
  `internet` varchar(40) NOT NULL,
  `useetv` varchar(80) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `price` int(100) NOT NULL,
  `pajak` int(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`paketId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `paket` */

insert  into `paket`(`paketId`,`nama_paket`,`internet`,`useetv`,`kategori`,`price`,`pajak`,`created_at`,`updated_at`,`deleted_at`) values 
('PKT1','New Premium 3P','10 Mbps','Esential + OTT','A10',435000,10,'2020-10-21 11:23:54','2020-10-21 11:23:54','0000-00-00 00:00:00'),
('PKT2','New Premium 3P 20Mbps','20 Mbps','Esential + OTT','A22',540000,10,'2020-10-21 11:44:07','2020-10-21 11:44:07','0000-00-00 00:00:00');

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `pelangganId` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL DEFAULT 'Laki-Laki',
  `alamat` text NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`pelangganId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`pelangganId`,`nama`,`jenis_kelamin`,`alamat`,`telpon`,`created_at`,`updated_at`,`deleted_at`) values 
('P1','Agus Wijayanto','Laki-Laki','Jl. Ketimuran Jaya','081127463811','2020-10-21 11:22:54','2020-10-21 11:22:54','0000-00-00 00:00:00'),
('P2','Liliana','Perempuan','Jalan Timur Semongko','08143356721','2020-10-21 11:42:42','2020-10-21 11:42:42','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
