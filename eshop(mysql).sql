-- Adminer 4.0.2 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = '+01:00';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `eshop` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `eshop`;

DROP TABLE IF EXISTS `objednavky`;
CREATE TABLE `objednavky` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(80) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `prijmeni` varchar(80) NOT NULL,
  `platba` varchar(5) NOT NULL,
  `doprava` varchar(5) NOT NULL,
  `produkty` varchar(255) NOT NULL,
  `cena` int(11) NOT NULL,
  `mesto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `produkty`;
CREATE TABLE `produkty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(55) NOT NULL,
  `popis` varchar(255) DEFAULT NULL,
  `kategorie` varchar(55) NOT NULL,
  `cena` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `produkty` (`id`, `nazev`, `popis`, `kategorie`, `cena`) VALUES
(1,	'Yamaha YAS-280',	NULL,	'Saxofony',	25000),
(2,	'Yamaha YTS-475',	NULL,	'Saxofony',	40000),
(3,	'Vytěrák na alt-sax',	NULL,	'Prislusenstvi',	500),
(4,	'Vytěrák na tenor-sax',	NULL,	'Prislusenstvi',	500),
(5,	'Věšurek',	NULL,	'Prislusenstvi',	350),
(6,	'Keilwerth SX90R',	'Keilwerth SX90R Professional Alto Saxophone',	'Saxofony',	5000),
(7,	'Yamaha YAS-875EX',	NULL,	'Saxofony',	80000),
(8,	'P. Mauriat Gold Lacquer',	NULL,	'Saxofony',	45000),
(9,	'Buffet 400 Series Matte',	NULL,	'Saxofony',	90000),
(10,	'Metal Berg Larsen Jazz Tenor',	'Nejlepší kovová hubička na trhu.',	'Prislusenstvi',	2500),
(11,	'Stojan na saxofon HERCULES',	'Jak pro alt, tak i pro tenor saxofon ',	'Prislusenstvi',	450),
(12,	'Vandoren Classic Alt Reeds',	'Tvrdost: 2',	'Platky',	60),
(13,	'Rico Plasticover Alto',	'Tvrdost: 2.5',	'Platky',	80),
(14,	'Forestone Synthetic Tenor',	'Novinka na trhu',	'Platky',	150),
(15,	'SKB SKB-440 Alto Sax. ',	'',	'Prislusenstvi',	2500);

-- 2014-01-19 19:44:02
