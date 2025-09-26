-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


USE `hestiacpadmin_snotepad`;

-- Dumping structure for table db_fgi_snotepad.table_data
CREATE TABLE IF NOT EXISTS `table_data` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `folder` varchar(50) DEFAULT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `os` varchar(50) DEFAULT NULL,
  `passkey` varchar(50) DEFAULT NULL,
  `language` varchar(50) DEFAULT 'plaintext',
  `date_created` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_snotepad.table_data: ~85 rows (approximately)
DELETE FROM `table_data`;
INSERT INTO `table_data` (`id`, `folder`, `filename`, `ip_address`, `os`, `passkey`, `language`, `date_created`) VALUES
	(5, '20240504', 'kUUkwiS.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-05-04 06:39:19'),
	(6, '20240604', 'tCJkJXG.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-06-04 01:09:40'),
	(7, '20240604', 'jutugLv.snpad', '192.168.0.11', 'Windows', NULL, NULL, '2024-06-04 04:19:46'),
	(8, '20240604', 'tJWtjEg.snpad', '192.168.0.11', 'Windows', NULL, NULL, '2024-06-04 04:20:33'),
	(9, '20240604', 'KkVAieP.snpad', '192.168.0.11', 'Windows', NULL, NULL, '2024-06-04 04:21:58'),
	(10, '20240604', 'hTrGNPI.snpad', '192.168.0.11', 'Windows', NULL, NULL, '2024-06-04 04:23:34'),
	(11, '20240604', 'FIvakHq.snpad', '192.168.0.11', 'Windows', NULL, NULL, '2024-06-04 04:28:10'),
	(12, '20240604', 'bHXgvgj.snpad', '192.168.0.11', 'Windows', NULL, NULL, '2024-06-04 04:30:16'),
	(13, '20240604', 'jGKwkHG.snpad', '192.168.0.11', 'Windows', NULL, NULL, '2024-06-04 04:30:41'),
	(14, '20240604', 'oJIzWlo.snpad', '192.168.0.11', 'Windows', NULL, NULL, '2024-06-04 04:30:41'),
	(15, '20240604', 'QMOEYZF.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-06-04 05:40:19'),
	(16, '20240604', 'aChdkLX.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-06-04 05:41:12'),
	(17, '20240604', 'XecpDZO.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-06-04 05:57:55'),
	(18, '20240604', 'iZVABuX.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-06-04 05:59:07'),
	(19, '20240604', 'rVuxygQ.snpad', '127.0.0.1', 'Unknown', NULL, NULL, '2024-06-04 06:05:36'),
	(20, '20240604', 'abFHRLX.snpad', '127.0.0.1', 'Unknown', NULL, NULL, '2024-06-04 06:08:57'),
	(21, '20240604', 'ATOWZqj.snpad', '127.0.0.1', 'Unknown', NULL, NULL, '2024-06-04 06:47:11'),
	(22, '20240604', 'xzcvqnd.snpad', '127.0.0.1', 'Unknown', NULL, NULL, '2024-06-04 07:16:13'),
	(23, '20240604', 'KXaUCGc.snpad', '127.0.0.1', 'Unknown', NULL, NULL, '2024-06-04 07:16:40'),
	(24, '20240604', 'HCqOWgy.snpad', '127.0.0.1', 'Unknown', NULL, NULL, '2024-06-04 07:43:35'),
	(25, '20240604', 'MfQVaWo.snpad', '127.0.0.1', 'Unknown', NULL, NULL, '2024-06-04 07:49:08'),
	(26, '20240604', 'OJazaso.snpad', '127.0.0.1', 'Unknown', NULL, NULL, '2024-06-04 07:49:22'),
	(27, '20240605', 'AMZLfqe.snpad', '127.0.0.1', 'Unknown', NULL, NULL, '2024-06-05 00:46:04'),
	(29, '20240814', 'ILFknpN.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-08-14 06:33:37'),
	(30, '20240814', 'cXduxXp.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-08-14 06:34:49'),
	(31, '20240814', 'AMqblHa.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-08-14 06:36:35'),
	(32, '20240814', 'SvHXIlW.snpad', '127.0.0.1', 'Windows', '123', NULL, '2024-08-14 07:44:29'),
	(33, '20240814', 'ShUmjKU.snpad', '127.0.0.1', 'Windows', '123', NULL, '2024-08-14 07:44:24'),
	(34, '20240814', 'prbghtf.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-08-14 07:55:29'),
	(35, '20240814', 'RthGiIa.snpad', '127.0.0.1', 'Linux', NULL, NULL, '2024-08-14 08:09:02'),
	(36, '20240814', 'phiQCmS.snpad', '127.0.0.1', 'Linux', NULL, NULL, '2024-08-14 08:10:02'),
	(37, '20240814', 'EtukeFZ.snpad', '127.0.0.1', 'Linux', '089999', NULL, '2024-08-14 08:10:39'),
	(38, '20240814', 'IggcRji.snpad', '127.0.0.1', 'Windows', '089789', NULL, '2024-08-14 08:12:07'),
	(39, '20240814', 'XtJHEuD.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-08-14 09:03:45'),
	(40, '20240814', 'DEbTNqI.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-08-14 09:11:26'),
	(41, '20241216', 'qmmDIHp.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 04:01:52'),
	(42, '20241216', 'MQmjLMs.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 06:45:56'),
	(43, '20241216', 'YHoSiLl.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 06:49:17'),
	(44, '20241216', 'sJpxnux.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 07:48:15'),
	(45, '20241216', 'WfCepWQ.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 07:48:28'),
	(46, '20241216', 'ADTvqxG.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 09:14:09'),
	(47, '20241216', 'FSoNuMv.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 09:18:45'),
	(48, '20241216', 'ESpuinJ.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 09:19:44'),
	(49, '20241216', 'VoFTDXn.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 09:50:55'),
	(50, '20241216', 'BxROrsD.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 09:51:28'),
	(51, '20241216', 'DnPTgNX.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 09:52:54'),
	(52, '20241216', 'WTBiJQX.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 09:54:17'),
	(53, '20241216', 'kwvHXaw.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 09:54:24'),
	(54, '20241216', 'eZoifUT.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 09:57:11'),
	(55, '20241216', 'JryCfnI.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 09:57:19'),
	(56, '20241216', 'fzzJhtU.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 09:58:35'),
	(57, '20241216', 'QKrwcVI.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 10:12:21'),
	(58, '20241216', 'pLSLfJT.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 10:14:21'),
	(59, '20241216', 'IrptuDz.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 10:15:08'),
	(60, '20241216', 'untQwFV.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 10:16:16'),
	(61, '20241216', 'VYlJkSp.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 10:18:42'),
	(62, '20241216', 'enKpEKW.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 10:19:26'),
	(63, '20241216', 'vCObEzF.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 10:21:25'),
	(64, '20241216', 'NWTVtIC.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 10:22:12'),
	(65, '20241216', 'OgczzZgng.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 10:22:56'),
	(66, '20241216', 'rrkqkiybI.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 10:23:29'),
	(67, '20241216', 'gCcVYUvba.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 10:23:50'),
	(68, '20241216', 'JSyQSXjeW.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 13:31:07'),
	(69, '20241216', 'ScAIoLNiY.snpad', '127.0.0.1', 'Windows', NULL, NULL, '2024-12-16 13:56:17'),
	(70, '20241216', 'oWrNxEFlW.snpad', '127.0.0.1', 'Windows', NULL, 'c', '2024-12-16 13:57:16'),
	(71, '20241216', 'MtnKVKoHK.snpad', '127.0.0.1', 'Windows', NULL, 'c', '2024-12-16 14:15:41'),
	(72, '20241216', 'KYDAiawsu.snpad', '127.0.0.1', 'Windows', NULL, 'xml', '2024-12-16 14:22:20'),
	(73, '20241216', 'VKLnVsroG.snpad', '127.0.0.1', 'Windows', NULL, 'xml', '2024-12-16 14:22:50'),
	(74, '20241216', 'ruibXbrvV.snpad', '127.0.0.1', 'Windows', NULL, 'xml', '2024-12-16 14:22:56'),
	(75, '20241216', 'mvLksYhPD.snpad', '127.0.0.1', 'Windows', NULL, 'xml', '2024-12-16 14:26:25'),
	(76, '20241216', 'fXTHDRoyX.snpad', '127.0.0.1', 'Windows', NULL, 'java', '2024-12-16 14:28:12'),
	(77, '20241216', 'FsbLhTBCv.snpad', '127.0.0.1', 'Windows', NULL, 'java', '2024-12-16 14:33:15'),
	(78, '20241216', 'BUGaLLcEx.snpad', '127.0.0.1', 'Windows', NULL, 'java', '2024-12-16 14:39:25'),
	(79, '20241216', 'xWJkoQVkF.snpad', '127.0.0.1', 'Windows', NULL, 'java', '2024-12-16 14:42:06'),
	(80, '20241216', 'WriHMPGes.snpad', '127.0.0.1', 'Windows', NULL, 'java', '2024-12-16 14:43:32'),
	(81, '20241216', 'AxJKbpskR.snpad', '127.0.0.1', 'Windows', NULL, 'java', '2024-12-16 14:44:46'),
	(82, '20241216', 'FRXlwoeJm.snpad', '127.0.0.1', 'Windows', NULL, 'java', '2024-12-16 14:50:39'),
	(83, '20241216', 'QgeMklrSn.snpad', '127.0.0.1', 'Windows', NULL, 'java', '2024-12-16 14:52:35'),
	(84, '20241216', 'rzXFWoydC.snpad', '127.0.0.1', 'Windows', NULL, 'java', '2024-12-16 15:03:03'),
	(85, '20241216', 'gkcjpaAve.snpad', '127.0.0.1', 'Windows', NULL, 'java', '2024-12-16 15:05:18'),
	(86, '20241216', 'snrQyJJex.snpad', '127.0.0.1', 'Windows', NULL, 'java', '2024-12-16 15:06:06'),
	(87, '20241216', 'VjEbEsGhw.snpad', '127.0.0.1', 'Windows', NULL, 'java', '2024-12-16 15:06:47'),
	(88, '20241216', 'xOPtSQmOP.snpad', '127.0.0.1', 'Windows', NULL, 'java', '2024-12-16 15:10:29'),
	(89, '20241216', 'CgTeSpE.snpad', '127.0.0.1', 'Windows', '08125807436', 'css', '2024-12-16 15:34:11'),
	(90, '20241216', 'sPJTbfA.snpad', '127.0.0.1', 'Windows', '08125807436', 'css', '2024-12-16 15:38:50');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
