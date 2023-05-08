/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `fdc` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `fdc`;

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` varchar(5) NOT NULL DEFAULT 'adm',
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `no_hp_admin` int(13) NOT NULL,
  `email_admin` varchar(40) NOT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(7) NOT NULL DEFAULT 'brg',
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(5) NOT NULL,
  `harga_barang` int(13) NOT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `fk_barang` (`nama_barang`,`harga_barang`,`jumlah_barang`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` varchar(5) NOT NULL DEFAULT 'dkt',
  `nama_dokter` varchar(50) NOT NULL,
  `no_hp_dokter` int(13) NOT NULL,
  `email_dokter` varchar(40) NOT NULL,
  `jadwal_dokter` varchar(50) NOT NULL,
  `str_dokter` int(16) NOT NULL,
  `sip_dokter` int(16) NOT NULL,
  PRIMARY KEY (`id_dokter`),
  KEY `fk_dokter` (`nama_dokter`,`str_dokter`,`sip_dokter`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int(6) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `tanggal_janji` date NOT NULL,
  `email_pasien` varchar(50) NOT NULL,
  `no_hp_pasien` int(13) NOT NULL,
  `alamat_pasien` varchar(50) NOT NULL,
  `keluhan_pasien` varchar(300) NOT NULL,
  PRIMARY KEY (`id_pasien`),
  KEY `Fk_pasien` (`nama_pasien`,`tanggal_janji`,`email_pasien`,`no_hp_pasien`,`alamat_pasien`,`keluhan_pasien`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `pembelian_barang` (
  `id_beli_barang` varchar(5) NOT NULL DEFAULT 'bb',
  `id_barang` varchar(7) NOT NULL DEFAULT 'brg',
  `nama_barang` varchar(50) NOT NULL,
  `id_supplier` varchar(5) NOT NULL DEFAULT 'sp',
  `nama_supplier` varchar(50) NOT NULL,
  `harga_supplier` int(11) NOT NULL,
  `jumlah_barang` int(5) NOT NULL,
  `total_beli` int(5) NOT NULL,
  `total_harga` int(13) NOT NULL,
  PRIMARY KEY (`id_beli_barang`,`id_barang`,`id_supplier`) USING BTREE,
  KEY `FK_pembelian_barang_supplier` (`id_supplier`),
  KEY `FK_pembelian_barang_barang` (`id_barang`),
  KEY `FK_pembelian_barang_supplier_2` (`nama_supplier`,`harga_supplier`),
  KEY `FK_pembelian_barang_barang_2` (`nama_barang`),
  CONSTRAINT `FK_pembelian_barang_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pembelian_barang_barang_2` FOREIGN KEY (`nama_barang`) REFERENCES `barang` (`nama_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pembelian_barang_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pembelian_barang_supplier_2` FOREIGN KEY (`nama_supplier`, `harga_supplier`) REFERENCES `supplier` (`nama_supplier`, `harga_supplier`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` varchar(5) NOT NULL DEFAULT 'sp',
  `nama_supplier` varchar(50) NOT NULL,
  `harga_supplier` int(11) NOT NULL,
  PRIMARY KEY (`id_supplier`),
  KEY `fk_supplier` (`nama_supplier`,`harga_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` varchar(9) NOT NULL DEFAULT 'trs',
  `id_pasien` int(6) NOT NULL,
  `nama_pasien` varchar(50) DEFAULT NULL,
  `tanggal_janji` date DEFAULT NULL,
  `email_pasien` varchar(50) DEFAULT NULL,
  `no_hp_pasien` int(13) DEFAULT NULL,
  `alamat_pasien` varchar(50) DEFAULT NULL,
  `keluhan_pasien` varchar(300) DEFAULT NULL,
  `diagnosa` varchar(300) NOT NULL,
  `id_dokter` varchar(5) NOT NULL DEFAULT 'dkt',
  `nama_dokter` varchar(50) NOT NULL,
  `str_dokter` int(16) NOT NULL,
  `sip_dokter` int(16) NOT NULL,
  `id_barang` varchar(7) NOT NULL DEFAULT 'brg',
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(5) NOT NULL,
  `harga_barang` int(13) NOT NULL,
  `total_barang_pakai` int(3) NOT NULL,
  `total_harga_transaksi` int(13) NOT NULL,
  PRIMARY KEY (`id_transaksi`,`id_dokter`,`id_barang`,`id_pasien`) USING BTREE,
  KEY `FK_transaksi_dokter` (`id_dokter`),
  KEY `FK_transaksi_pasien` (`id_pasien`),
  KEY `FK_transaksi_barang` (`id_barang`),
  KEY `FK_transaksi_barang_2` (`nama_barang`,`harga_barang`,`jumlah_barang`),
  KEY `FK_transaksi_dokter_2` (`nama_dokter`,`str_dokter`,`sip_dokter`),
  KEY `FK_transaksi_pasien_2` (`nama_pasien`,`tanggal_janji`,`email_pasien`,`no_hp_pasien`,`alamat_pasien`,`keluhan_pasien`),
  CONSTRAINT `FK_transaksi_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_transaksi_barang_2` FOREIGN KEY (`nama_barang`, `harga_barang`, `jumlah_barang`) REFERENCES `barang` (`nama_barang`, `harga_barang`, `jumlah_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_transaksi_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_transaksi_dokter_2` FOREIGN KEY (`nama_dokter`, `str_dokter`, `sip_dokter`) REFERENCES `dokter` (`nama_dokter`, `str_dokter`, `sip_dokter`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_transaksi_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_transaksi_pasien_2` FOREIGN KEY (`nama_pasien`, `tanggal_janji`, `email_pasien`, `no_hp_pasien`, `alamat_pasien`, `keluhan_pasien`) REFERENCES `pasien` (`nama_pasien`, `tanggal_janji`, `email_pasien`, `no_hp_pasien`, `alamat_pasien`, `keluhan_pasien`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
