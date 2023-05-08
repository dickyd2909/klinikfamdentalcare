/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `klinikfamdentalcare` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `klinikfamdentalcare`;

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(7) NOT NULL DEFAULT 'brg',
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(5) NOT NULL,
  `harga_barang` int(13) NOT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `fk_barang` (`nama_barang`,`harga_barang`,`jumlah_barang`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `counter` (
  `ip_addr` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `count` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `counter` DISABLE KEYS */;
INSERT INTO `counter` (`ip_addr`, `date`, `count`) VALUES
	('127.0.0.1', '2022-09-05', 2),
	('127.0.0.1', '2022-09-06', 7),
	('127.0.0.1', '2022-09-07', 5),
	('127.0.0.1', '2022-09-11', 1),
	('127.0.0.1', '2022-09-13', 10),
	('127.0.0.1', '2022-09-23', 11),
	('127.0.0.1', '2022-09-30', 7),
	('127.0.0.1', '2022-10-08', 1),
	('127.0.0.1', '2022-11-17', 1);
/*!40000 ALTER TABLE `counter` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` varchar(7) NOT NULL DEFAULT 'dkt',
  `nama_dokter` varchar(80) NOT NULL,
  `no_hp_dokter` int(20) NOT NULL,
  `images` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_dokter` varchar(40) NOT NULL,
  `jadwal_dokter` varchar(80) NOT NULL,
  `str_dokter` varchar(50) NOT NULL DEFAULT '',
  `sip_dokter` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_dokter`),
  KEY `fk_dokter` (`nama_dokter`,`str_dokter`,`sip_dokter`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `dokter` DISABLE KEYS */;
INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `no_hp_dokter`, `images`, `email_dokter`, `jadwal_dokter`, `str_dokter`, `sip_dokter`) VALUES
	('DOK-001', 'DRG.Martiyanti Doanna', 0, '1673007258-DOK-001.jpg', 'a@a.com', 'selasa', '0', '0013/IPFK-DG/VII/2021/DPMPTSP'),
	('DOK-002', 'Amalia Meisyafitri, drg', 0, '1673007237-DOK-002.jpg', 'a@a.com', 'Senin, Selasa, Kamis jam 10:00 – 15:00 Jumat jam 15:00 – 20:00', '0', '0013/IPFK-DG/VII/2021/DPMPTSP'),
	('DOK-003', 'DRG. Munawar Chalid', 0, '1673007328-DOK-003.jpg', 'a@a.com', 'Selasa, Kamis, Sabtu jam 15:00 – 20:00', '0', 'SIP: 0014/IPFK-DG/III/2022/DPMPTSP'),
	('DOK-004', 'DRG. Fathridi Thoriq', 0, '1673007423-DOK-004.jpg', 'a@a.com', '-', '0', '503/0346-SIP-DR/DPMPTSP/XI/2020'),
	('DOK-005', 'DRG. Geta Widhi', 0, '1673007494-DOK-005.jpg', 'a@a.com', 'Rabu jam 10:00 – 20:00, Jumat jam 10:00 – 15:00', '0', '0'),
	('DOK-006', 'DRG. Deborah Cerfina', 0, '1673007539-DOK-006.jpg', 'a@a.com', '-', '0', '0'),
	('DOK-007', 'DRG. Jane Firsty', 0, '1673007608-DOK-007.jpg', 'a@a.com', '-', '0', '0'),
	('DOK-008', 'DRG. Stacia Ariella', 85, '1673007824-DOK-008.jpg', 'a@a.com', 'Senin jam 15:00 – 20:00, Sabtu jam 10:00 – 15:00', '0', '0');
/*!40000 ALTER TABLE `dokter` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `galeri` (
  `id_galeri` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
INSERT INTO `galeri` (`id_galeri`, `judul`, `deskripsi`, `images`) VALUES
	('GL-005', 'Tindakan Bleaching', '<b>Bleaching gigi</b>&nbsp;atau pemutihan gigi merupakan prosedur estetika yang digunakan untuk membuat permukaan gigi tampak lebih putih.', '1673006494-GL-005.jpg'),
	('GL-006', 'Pemasangan Kawat Gigi', '<p>Kawat gigi atau behel adalah salah satu alat yang digunakan untuk mendapatkan susunan gigi yang ideal. Kawat gigi bekerja dengan cara memberikan tekanan ke gigi untuk secara perlahan menggerakkan gigi ke posisi idealnya.<br></p>', '1673006541-GL-006.jpg'),
	('GL-007', 'Penambalan Gigi Depan', '<p>Tambal gigi adalah perawatan yang dilakukan untuk memperbaiki gigi rusak atau gigi berlubang. Tambal gigi dilakukan dengan prosedur memasukkan bahan tambalan ke bagian gigi yang rusak atau berlubang. Tambal gigi akan mengembalikan bentuk dan kondisi gigi seperti semula.<br></p>', '1673006639-GL-007.jpg'),
	('GL-008', 'Tindakan Diastem Enclosure', '<p>-</p>', '1673008703-GL-008.jpg');
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
	('KT-001', 'Sample'),
	('KT-002', 'Sample1');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(7, '2014_10_12_100000_create_password_resets_table', 1),
	(8, '2019_08_19_000000_create_failed_jobs_table', 1),
	(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(10, '2022_09_05_053043_create_tentangs_table', 1),
	(14, '2022_09_05_060307_create_files_table', 4),
	(16, '2014_10_12_000000_create_users_table', 5),
	(17, '2022_09_05_054505_create_galeris_table', 6),
	(18, '2022_09_05_081527_create_counters_table', 7),
	(20, '2022_09_05_084705_create_dokters_table', 8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int(10) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(50) NOT NULL,
  `tanggal_janji` datetime NOT NULL,
  `email_pasien` varchar(50) NOT NULL,
  `no_hp_pasien` varchar(20) NOT NULL DEFAULT '',
  `alamat_pasien` varchar(50) NOT NULL,
  `keluhan_pasien` varchar(300) NOT NULL,
  `total_harga_pasien` varchar(60) DEFAULT NULL,
  `tindakan_pasien` varchar(60) DEFAULT NULL,
  `template` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_pasien`),
  KEY `Fk_pasien` (`nama_pasien`,`tanggal_janji`,`email_pasien`,`no_hp_pasien`,`alamat_pasien`,`keluhan_pasien`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `pasien` DISABLE KEYS */;
INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `tanggal_janji`, `email_pasien`, `no_hp_pasien`, `alamat_pasien`, `keluhan_pasien`, `total_harga_pasien`, `tindakan_pasien`, `template`) VALUES
	(3, 'Ahmad', '2023-02-04 00:00:00', 'ahmad@gmail.com', '6287776503014', 'Bandung', 'Gusi sakit', NULL, NULL, NULL),
	(4, 'Muhammad Raihan Nurfaisal', '2023-02-03 00:00:00', 'rehan@gmail.com', '6281313917090', 'Tasikmalaya', 'Gusi bengkak', NULL, NULL, NULL),
	(5, 'Dhita', '2023-02-13 17:36:00', 'dhita@gmail.com', '6281779557001', 'Bandung', 'Gigi berkarang banyak', NULL, NULL, NULL);
/*!40000 ALTER TABLE `pasien` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `tentang` (
  `id_tentang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `informasi_umum` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_sampul` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tupoksi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tentang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `tentang` DISABLE KEYS */;
INSERT INTO `tentang` (`id_tentang`, `informasi_umum`, `foto_sampul`, `visi`, `misi`, `tupoksi`) VALUES
	('TG-001', '<div style="font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;"><span style="background-color: rgb(255, 255, 255);">Family Dental Care Group didirikan pada tanggal 3 September 2019. Berlokasi di wilayah Bandung dan mempunyai 5 cabang, Family Dental Care memiliki beberapa layanan perawatan gigi, diantaranya Scaling, Pemasangan Kawat Gigi, Bleaching, dan lain-lain.</span></div>', 'about.png', '<div style="font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;"><span style="background-color: rgb(255, 255, 255);">Menjadi pusat layanan kesehatan gigi keluarga yang nyaman, ramah, profesional.</span></div><p><br></p>', '<ul><li>Memberikan pelayanan kesehatan gigi yang berkualitas dan profesional.</li><li>Fleksibel dengan perkembangan dan terus berbenah diri untuk memenuhi kebutuhan pasien.</li><li>Menciptakan suasana dan linkungan yang nyaman dan juga ramah bagi keluarga.</li><li>Memberikan edukasi kepada pasien dan keluarga dalam menjaga kesehatan mulut.</li></ul>', 'wkwkwk');
/*!40000 ALTER TABLE `tentang` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pict` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile_pict`, `remember_token`, `created_at`, `updated_at`) VALUES
	('AK-001', 'MOHAMMAD FIRAZ FARUQ IANSYAH', 'admin@gmail.com', NULL, '$2y$10$XKLKg2yCjmrphbJ1qUoDP.5YK6Xt1.8FaK/Hb25zR8N5KQKH/dBeG', '1662371498-AK-001.jpg', NULL, '2022-08-29 13:48:15', '2022-09-05 09:51:51');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
