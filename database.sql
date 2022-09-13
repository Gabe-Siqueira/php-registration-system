-- Adminer 4.8.1 MySQL 8.0.30-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `php_registration_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `php_registration_system`;

DROP TABLE IF EXISTS `card_flag`;
CREATE TABLE `card_flag` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `card_flag` (`id`, `name`, `created_date`) VALUES
(1,	'Visa',	'2022-09-12 18:34:49'),
(2,	'Mastercard',	'2022-09-12 18:34:53'),
(3,	'Elo',	'2022-09-12 18:35:01'),
(4,	'American Express',	'2022-09-12 18:35:12'),
(5,	'Hipercard',	'2022-09-12 18:35:21'),
(6,	'Diners Club',	'2022-09-12 18:35:30');

DROP TABLE IF EXISTS `credit`;
CREATE TABLE `credit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_donor` int NOT NULL,
  `id_card_flag` int NOT NULL,
  `digits` varchar(16) NOT NULL,
  `created_date` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_donor` (`id_donor`),
  KEY `id_card_flag` (`id_card_flag`),
  CONSTRAINT `credit_ibfk_1` FOREIGN KEY (`id_donor`) REFERENCES `donor` (`id`),
  CONSTRAINT `credit_ibfk_2` FOREIGN KEY (`id_card_flag`) REFERENCES `card_flag` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `debit`;
CREATE TABLE `debit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_donor` int NOT NULL,
  `bank_code` varchar(4) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `agency` varchar(4) NOT NULL,
  `account` varchar(8) NOT NULL,
  `created_date` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_donor` (`id_donor`),
  CONSTRAINT `debit_ibfk_1` FOREIGN KEY (`id_donor`) REFERENCES `donor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `donation_interval`;
CREATE TABLE `donation_interval` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `donation_interval` (`id`, `name`) VALUES
(1,	'Único'),
(2,	'Bimestral'),
(3,	'Semestral'),
(4,	'Anual');

DROP TABLE IF EXISTS `donor`;
CREATE TABLE `donor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `birth_date` date NOT NULL,
  `id_donation_interval` int NOT NULL,
  `donation_amount` decimal(10,2) NOT NULL,
  `id_form_payment` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_donation_interval` (`id_donation_interval`),
  KEY `id_form_payment` (`id_form_payment`),
  CONSTRAINT `donor_ibfk_1` FOREIGN KEY (`id_donation_interval`) REFERENCES `donation_interval` (`id`),
  CONSTRAINT `donor_ibfk_2` FOREIGN KEY (`id_form_payment`) REFERENCES `form_payment` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `form_payment`;
CREATE TABLE `form_payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `form_payment` (`id`, `name`) VALUES
(1,	'Débito'),
(2,	'Crédito');

-- 2022-09-13 01:37:36