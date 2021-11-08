-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage de la structure de la table stocksystem. config
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rulename` text,
  `rule` text,
  KEY `Index 1` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table stocksystem.config : ~3 rows (environ)
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
REPLACE INTO `config` (`id`, `rulename`, `rule`) VALUES
	(1, 'stock_pneus', '1'),
	(2, 'gardien_pneus', '0'),
	(3, 'stock_lights', '1');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;

-- Listage de la structure de la table stocksystem. stock_lights
CREATE TABLE IF NOT EXISTS `stock_lights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` text,
  `quant` text,
  KEY `Index 1` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table stocksystem.stock_lights : ~2 rows (environ)
/*!40000 ALTER TABLE `stock_lights` DISABLE KEYS */;
REPLACE INTO `stock_lights` (`id`, `ref`, `quant`) VALUES
	(1, 'Ampoules PHILIPS 12V 55W H7 Longlife', '4'),
	(2, 'Ampoules PHILIPS 12V H4', '4');
/*!40000 ALTER TABLE `stock_lights` ENABLE KEYS */;

-- Listage de la structure de la table stocksystem. stock_pneus
CREATE TABLE IF NOT EXISTS `stock_pneus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` text,
  `saison` text,
  `marque` text,
  `quant` int(11) DEFAULT NULL,
  KEY `Index 1` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- Listage des données de la table stocksystem.stock_pneus : ~23 rows (environ)
/*!40000 ALTER TABLE `stock_pneus` DISABLE KEYS */;
REPLACE INTO `stock_pneus` (`id`, `ref`, `saison`, `marque`, `quant`) VALUES
	(23, 'Agilis Alpin 255 65 16C 112/110R', 'Hiver', 'Michelin', 4),
	(24, 'Winter 255 45 19 104V XL', 'Hiver', 'Pirelli', 2),
	(25, 'Winter Sport 5 205 55 16 91T', 'Hiver', 'Dunlop', 2),
	(26, 'W810 195 75 16C 107/105R', 'Hiver', 'Bridgestone', 2),
	(27, 'W810 205 75 16C 110/108R', 'Hiver', 'Bridgestone', 2),
	(28, 'W810 195 70 15C 104/102R', 'Hiver', 'Bridgestone', 8),
	(29, 'W810 215 70 15C ', 'Hiver', 'Bridgestone', 8),
	(30, 'LM32C 195 60 16C 99/97T', 'Hiver', 'Bridgestone', 4),
	(31, 'LM005 165 65 15 81T', 'Hiver', 'Bridgestone', 2),
	(32, 'LM005 2015 65 17 103H', 'Hiver', 'Bridgestone', 2),
	(33, 'LM25 MO 195 60 16 89H', 'Hiver', 'Bridgestone', 4),
	(34, 'LM001* 205 60 17 93H', 'Hiver', 'Bridgestone', 6),
	(35, 'LM005 225 60 17 99H', 'Hiver', 'Bridgestone', 2),
	(36, 'LM25* 195 55 16 87H', 'Hiver', 'Bridgestone', 1),
	(37, 'LM005 205 55 16 91H', 'Hiver', 'Bridgestone', 4),
	(38, 'LM001 255 55 17 97V', 'Hiver', 'Bridgestone', 2),
	(39, 'LM005 235 55 17 103V XL', 'Hiver', 'Bridgestone', 4),
	(40, 'LM80E 265 50 20 107V', 'Hiver', 'Bridgestone', 4),
	(41, 'LM80 EVO 255 60 17 99H', 'Hiver', 'Bridgestone', 4),
	(42, 'LM005 265 45 21 108V XL', 'Hiver', 'Bridgestone', 4),
	(43, 'B250 155 65 14 75T', 'Ete', 'Bridgestone', 2),
	(44, 'B250 165 65 14 79T', 'Ete', 'Bridgestone', 4),
	(45, 'WINGUARD SPORT 2 SUV 225 60 17 103H', 'Hiver', 'Nexen', 4);
/*!40000 ALTER TABLE `stock_pneus` ENABLE KEYS */;

-- Listage de la structure de la table stocksystem. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `username` text,
  `role` text,
  `password` varchar(50) DEFAULT NULL,
  KEY `Index 1` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table stocksystem.users : ~2 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `surname`, `username`, `role`, `password`) VALUES
	(5, 'Marino', 'Musitelli', 'Musi73', '0', '900dd813637f0b75f7360ac8d5a413a7'),
	(1, 'Ilhann', 'Musitelli', 'Doublondenier72', '3', 'ea4d5a4a8019184a5211884e64d9ff44'),
	(6, 'admin', 'admin', 'admin', '3', '21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
