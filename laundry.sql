-- Adminer 4.8.1 MySQL 5.5.5-10.6.3-MariaDB-log dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1,	'admin',	'5274480b5f9ffd208c46a86382da7e2e');

DROP TABLE IF EXISTS `harga`;
CREATE TABLE `harga` (
  `harga_per_kilo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `harga` (`harga_per_kilo`) VALUES
(7000);

DROP TABLE IF EXISTS `pakaian`;
CREATE TABLE `pakaian` (
  `pakaian_id` int(11) NOT NULL AUTO_INCREMENT,
  `pakaian_transaksi` int(11) NOT NULL,
  `pakaian_jenis` varchar(255) NOT NULL,
  `pakaian_jumlah` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`pakaian_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pakaian` (`pakaian_id`, `pakaian_transaksi`, `pakaian_jenis`, `pakaian_jumlah`) VALUES
(19,	9,	'Kaos Kaki',	4),
(20,	9,	'Kaos Oblong',	4),
(21,	9,	'Celana Kolor',	4),
(24,	8,	'Kemeja',	2),
(25,	8,	'Celana pendek',	3);

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pelanggan_nama` varchar(255) NOT NULL,
  `pelanggan_hp` varchar(20) NOT NULL,
  `pelanggan_alamat` text NOT NULL,
  PRIMARY KEY (`pelanggan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelanggan` (`pelanggan_id`, `pelanggan_nama`, `pelanggan_hp`, `pelanggan_alamat`) VALUES
(1,	'Fuad Muhammad Nur',	'081312943321',	'Perum Rajeg Asri Blok D3 No. 4, Rajeg, Kabupaten Tangerang, Banten.'),
(2,	'Alica Putri Azzahra',	'082249384431',	'Perum Rajeg Asri Blok D2 No. 1, Kabupaten Tangerang, Banten.'),
(3,	'Tata Oky Chandra Habita',	'083895462641',	'Perum Taman Raya Rajeg No. 73, Rajeg, Kabupaten Tangerang, Banten.'),
(4,	'Ilham Fadhillah',	'08132942232',	'Perum Taman Raya Rajeg No. 4, Kabupaten Tangerang, Banten.');

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_tanggal` date NOT NULL,
  `transaksi_pelanggan` int(11) NOT NULL,
  `transaksi_harga` int(11) NOT NULL,
  `transaksi_berat` int(11) NOT NULL,
  `transaksi_tgl_selesai` date NOT NULL,
  `transaksi_status` int(11) NOT NULL,
  PRIMARY KEY (`transaksi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_tanggal`, `transaksi_pelanggan`, `transaksi_harga`, `transaksi_berat`, `transaksi_tgl_selesai`, `transaksi_status`) VALUES
(8,	'2021-07-17',	2,	21000,	3,	'2021-07-19',	1),
(9,	'2021-07-17',	3,	91000,	13,	'2021-07-20',	2);

-- 2021-07-19 11:48:41
