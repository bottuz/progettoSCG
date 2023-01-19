-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Dic 14, 2022 alle 15:45
-- Versione del server: 8.0.26
-- Versione PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_juistdoit`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Costo_Impiego_B_unit_vero`
--

CREATE TABLE `Costo_Impiego_B_unit_vero` (
  `NrArticolo` varchar(20) NOT NULL,
  `BudgetConsuntivo` varchar(20) NOT NULL,
  `CostoTot` double DEFAULT NULL,
  `QuantitaTot` decimal(54,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Costo_Impiego_B_unit_vero`
--

INSERT INTO `Costo_Impiego_B_unit_vero` (`NrArticolo`, `BudgetConsuntivo`, `CostoTot`, `QuantitaTot`) VALUES
('ART0000018', 'BUDGET', 106.25, '2'),
('ART0000041', 'BUDGET', 293.25, '4'),
('ART0000042', 'BUDGET', 433.5, '4'),
('ART0000043', 'BUDGET', 340.0068, '2'),
('ART0000115', 'BUDGET', 318.75, '6'),
('ART0000116', 'BUDGET', 548.25, '5'),
('ART0000119', 'BUDGET', 297.5, '10'),
('ART0000121', 'BUDGET', 0, '16'),
('ART0000125', 'BUDGET', 561, '5'),
('ART0000128', 'BUDGET', 0, '11'),
('ART0000129', 'BUDGET', 306.612, '5'),
('ART0000131', 'BUDGET', 429.25, '7'),
('ART0000151', 'BUDGET', 607.75, '6'),
('ART0000152', 'BUDGET', 395.25, '6'),
('ART0000157', 'BUDGET', 1062.5, '1'),
('ART0000223', 'BUDGET', 499.375, '17'),
('ART0000226', 'BUDGET', 471.75, '4'),
('ART0000227', 'BUDGET', 994.5, '6'),
('ART0000228', 'BUDGET', 408, '12'),
('ART0000229', 'BUDGET', 484.5, '24'),
('ART0000308', 'BUDGET', 669.375, '35'),
('ART0000312', 'BUDGET', 0, '118'),
('ART0000313', 'BUDGET', 0, '19'),
('ART0000320', 'BUDGET', 289, '6'),
('ART0000323', 'BUDGET', 63.75, '5'),
('ART0000324', 'BUDGET', 0, '5'),
('ART0000325', 'BUDGET', 25.5, '5'),
('ART0000456', 'BUDGET', 93.33, '10'),
('ART0000555', 'BUDGET', 96.322, '1'),
('ART0000625', 'BUDGET', 446.25, '20'),
('ART0000627', 'BUDGET', 414.375, '65'),
('ART0000628', 'BUDGET', 765, '11'),
('ART0000630', 'BUDGET', 711.875, '93'),
('ART0000635', 'BUDGET', 148.75, '20'),
('ART0000638', 'BUDGET', 42.5, '10'),
('ART0000639', 'BUDGET', 95.625, '17'),
('ART0000641', 'BUDGET', 174.25, '5'),
('ART0000642', 'BUDGET', 148.75, '5'),
('ART0000643', 'BUDGET', 102, '51'),
('ART0000644', 'BUDGET', 977.5, '76'),
('ART0000645', 'BUDGET', 918.1292, '82'),
('ART0000690', 'BUDGET', 127.5, '10'),
('ART0000697', 'BUDGET', 510, '10'),
('ART0000748', 'BUDGET', 711.875, '199'),
('ART0000749', 'BUDGET', 0, '2'),
('ART0000752', 'BUDGET', 286.875, '32'),
('ART0000753', 'BUDGET', 63.75, '10'),
('ART0000756', 'BUDGET', 318.75, '25'),
('ART0000757', 'BUDGET', 0, '1'),
('ART0000758', 'BUDGET', 106.25, '16'),
('ART0000762', 'BUDGET', 1126.25, '105'),
('ART0000765', 'BUDGET', 10.625, '1'),
('ART0000769', 'BUDGET', 21.25, '3'),
('ART0000772', 'BUDGET', 148.75, '5'),
('ART0000778', 'BUDGET', 0, '2'),
('ART0000779', 'BUDGET', 21.25, '2'),
('ART0000780', 'BUDGET', 42.5, '2'),
('ART0000782', 'BUDGET', 180.625, '18'),
('ART0000783', 'BUDGET', 85, '14'),
('ART0000784', 'BUDGET', 159.375, '7'),
('ART0000786', 'BUDGET', 116.875, '8'),
('ART0000788', 'BUDGET', 53.125, '4'),
('ART0000790', 'BUDGET', 21.25, '1'),
('ART0000795', 'BUDGET', 977.5, '112'),
('ART0000796', 'BUDGET', 10.625, '1'),
('ART0000797', 'BUDGET', 0, '1'),
('ART0000804', 'BUDGET', 116.875, '18'),
('ART0000805', 'BUDGET', 42.5, '2'),
('ART0000811', 'BUDGET', 148.75, '10'),
('ART0000812', 'BUDGET', 191.25, '9'),
('ART0000814', 'BUDGET', 42.5, '1'),
('ART0000825', 'BUDGET', 148.75, '5'),
('ART0000826', 'BUDGET', 127.5, '5'),
('ART0000830', 'BUDGET', 0, '1'),
('ART0000841', 'BUDGET', 85, '1'),
('ART0000843', 'BUDGET', 31.875, '2'),
('ART0000845', 'BUDGET', 42.5, '1'),
('ART0000847', 'BUDGET', 42.5, '4'),
('ART0000848', 'BUDGET', 318.75, '88'),
('ART0000849', 'BUDGET', 21.25, '1'),
('ART0000850', 'BUDGET', 10.625, '11'),
('ART0000851', 'BUDGET', 106.25, '30'),
('ART0000853', 'BUDGET', 286.875, '46'),
('ART0000877', 'BUDGET', 178.5, '4'),
('ART0000878', 'BUDGET', 178.5, '4'),
('ART0000879', 'BUDGET', 95.625, '4'),
('ART0000880', 'BUDGET', 76.5, '16'),
('ART0000881', 'BUDGET', 259.25, '4'),
('ART0000882', 'BUDGET', 204, '16'),
('ART0000883', 'BUDGET', 212.5, '4'),
('ART0000885', 'BUDGET', 127.5, '4'),
('ART0000887', 'BUDGET', 51, '4'),
('ART0000888', 'BUDGET', 320.875, '4'),
('ART0000889', 'BUDGET', 331.5, '4'),
('ART0000890', 'BUDGET', 82.875, '4'),
('ART0000891', 'BUDGET', 497.25, '10'),
('ART0000893', 'BUDGET', 901, '6'),
('ART0001017', 'BUDGET', 38.25, '2'),
('ART0001018', 'BUDGET', 0, '1'),
('ART0001046', 'BUDGET', 265.625, '5'),
('ART0001047', 'BUDGET', 212.5, '4'),
('ART0001095', 'BUDGET', 53.125, '1'),
('ART0001099', 'BUDGET', 114.75, '4'),
('ART0001100', 'BUDGET', 76.5, '4'),
('ART0001102', 'BUDGET', 25.5, '4'),
('ART0001104', 'BUDGET', 38.25, '4'),
('ART0001110', 'BUDGET', 42.5, '1'),
('ART0001113', 'BUDGET', 140.25, '1'),
('ART0001117', 'BUDGET', 1946.5, '9'),
('ART0001129', 'BUDGET', 51, '2'),
('ART0001149', 'BUDGET', 331.5, '21'),
('ART0001154', 'BUDGET', 1219.75, '162'),
('ART0001162', 'BUDGET', 437.75, '2'),
('ART0001164', 'BUDGET', 408, '3'),
('ART0001170', 'BUDGET', 342.125, '2'),
('ART0001174', 'BUDGET', 612, '2'),
('ART0001180', 'BUDGET', 127.5, '11'),
('ART0001185', 'BUDGET', 820.25, '14'),
('ART0001188', 'BUDGET', 46.75, '1'),
('ART0001190', 'BUDGET', 85, '6'),
('ART0001202', 'BUDGET', 464.44, '1'),
('ART0001203', 'BUDGET', 251.94, '1'),
('ART0001208', 'BUDGET', 348.5, '1'),
('ART0001214', 'BUDGET', 204, '1'),
('ART0001215', 'BUDGET', 255, '2'),
('ART0001218', 'BUDGET', 34, '1'),
('ART0001219', 'BUDGET', 45.56, '2'),
('ART0001228', 'BUDGET', 18.36, '2'),
('ART0001238', 'BUDGET', 68, '2'),
('ART0001244', 'BUDGET', 937.125, '3'),
('ART0001249', 'BUDGET', 102, '3'),
('ART0001252', 'BUDGET', 850, '7'),
('ART0001253', 'BUDGET', 93.5, '1'),
('ART0001261', 'BUDGET', 34, '2'),
('ART0001263', 'BUDGET', 34, '2'),
('ART0001264', 'BUDGET', 5.44, '1'),
('ART0001265', 'BUDGET', 1542.75, '1'),
('ART0001266', 'BUDGET', 433.5, '1'),
('ART0001267', 'BUDGET', 51, '1'),
('ART0001272', 'BUDGET', 1096.5, '11'),
('ART0001276', 'BUDGET', 5.44, '1'),
('ART0001277', 'BUDGET', 0, '1'),
('ART0001290', 'BUDGET', 34, '1'),
('ART0001294', 'BUDGET', 39.44, '4'),
('ART0001391', 'BUDGET', 89.25, '39'),
('ART0001409', 'BUDGET', 102, '50'),
('ART0001422', 'BUDGET', 119, '24'),
('ART0001427', 'BUDGET', 34, '12'),
('ART0001429', 'BUDGET', 68, '37'),
('ART0001433', 'BUDGET', 165.75, '38'),
('ART0001441', 'BUDGET', 85, '2'),
('ART0001492', 'BUDGET', 51, '3'),
('ART0001493', 'BUDGET', 170, '2'),
('ART0001497', 'BUDGET', 113.492, '7'),
('ART0001500', 'BUDGET', 51, '1'),
('ART0001514', 'BUDGET', 386.75, '18'),
('ART0001515', 'BUDGET', 0, '1'),
('ART0001520', 'BUDGET', 34, '1'),
('ART0001534', 'BUDGET', 68, '2'),
('ART0001535', 'BUDGET', 136, '16'),
('ART0001566', 'BUDGET', 153, '18'),
('ART0001575', 'BUDGET', 107.44, '44'),
('ART0001587', 'BUDGET', 119, '12'),
('ART0001588', 'BUDGET', 34, '6'),
('ART0001590', 'BUDGET', 280.5, '24'),
('ART0001593', 'BUDGET', 109.242, '8'),
('ART0001605', 'BUDGET', 306, '12'),
('ART0001606', 'BUDGET', 0, '12'),
('ART0001609', 'BUDGET', 68, '6'),
('ART0001610', 'BUDGET', 119, '8'),
('ART0001612', 'BUDGET', 34, '8'),
('ART0001615', 'BUDGET', 165.75, '28'),
('ART0001628', 'BUDGET', 221, '42'),
('ART0001636', 'BUDGET', 22.44, '8'),
('ART0001637', 'BUDGET', 688.5, '8'),
('ART0001653', 'BUDGET', 297.5, '21'),
('ART0001659', 'BUDGET', 170, '24'),
('ART0001669', 'BUDGET', 68, '4'),
('ART0001670', 'BUDGET', 51, '4'),
('ART0001731', 'BUDGET', 858.5, '10'),
('ART0001733', 'BUDGET', 629, '31'),
('ART0001739', 'BUDGET', 505.75, '6'),
('ART0001740', 'BUDGET', 153, '1'),
('ART0001741', 'BUDGET', 357, '4'),
('ART0001743', 'BUDGET', 1064.625, '6'),
('ART0001745', 'BUDGET', 739.5, '2'),
('ART0001759', 'BUDGET', 2078.25, '112'),
('ART0001761', 'BUDGET', 38.25, '2'),
('ART0001762', 'BUDGET', 191.25, '1'),
('ART0001765', 'BUDGET', 726.75, '21'),
('ART0001766', 'BUDGET', 510, '5'),
('ART0001767', 'BUDGET', 165.75, '3'),
('ART0001768', 'BUDGET', 165.75, '5'),
('ART0001770', 'BUDGET', 694.875, '21'),
('ART0001772', 'BUDGET', 344.25, '10'),
('ART0001773', 'BUDGET', 395.25, '10'),
('ART0001775', 'BUDGET', 3763.375, '95'),
('ART0001776', 'BUDGET', 346.375, '6'),
('ART0001777', 'BUDGET', 140.25, '2'),
('ART0001778', 'BUDGET', 140.25, '2'),
('ART0001779', 'BUDGET', 242.25, '8'),
('ART0001783', 'BUDGET', 777.75, '15'),
('ART0001785', 'BUDGET', 2501.125, '96'),
('ART0001786', 'BUDGET', 765, '24'),
('ART0001788', 'BUDGET', 1147.5, '7'),
('ART0001789', 'BUDGET', 374, '2'),
('ART0001794', 'BUDGET', 752.25, '11'),
('ART0001799', 'BUDGET', 1090.125, '30'),
('ART0001804', 'BUDGET', 76.5, '3'),
('ART0001807', 'BUDGET', 2091, '90'),
('ART0001811', 'BUDGET', 2575.5, '33'),
('ART0001813', 'BUDGET', 395.25, '9'),
('ART0001817', 'BUDGET', 191.25, '3'),
('ART0001821', 'BUDGET', 510, '5'),
('ART0001825', 'BUDGET', 127.5, '1'),
('ART0001829', 'BUDGET', 144.5, '1'),
('ART0001830', 'BUDGET', 561, '12'),
('ART0001832', 'BUDGET', 318.75, '10'),
('ART0001837', 'BUDGET', 331.5, '1'),
('ART0001840', 'BUDGET', 280.5, '1'),
('ART0001841', 'BUDGET', 318.75, '1'),
('ART0001866', 'BUDGET', 7237.76428, '94'),
('ART0001868', 'BUDGET', 4993.7568, '203'),
('ART0001869', 'BUDGET', 267.75, '2'),
('ART0001872', 'BUDGET', 1177.318, '22'),
('ART0001873', 'BUDGET', 790.5, '7'),
('ART0001874', 'BUDGET', 238, '1'),
('ART0001877', 'BUDGET', 1088.0068, '18'),
('ART0001880', 'BUDGET', 433.5, '5'),
('ART0001882', 'BUDGET', 276.25, '2'),
('ART0001884', 'BUDGET', 497.25, '17'),
('ART0001885', 'BUDGET', 476.0068, '5'),
('ART0001886', 'BUDGET', 3157.8248000000003, '76'),
('ART0001889', 'BUDGET', 393.125, '6'),
('ART0001890', 'BUDGET', 229.5, '2'),
('ART0001891', 'BUDGET', 0, '8'),
('ART0001895', 'BUDGET', 675.75, '14'),
('ART0001897', 'BUDGET', 5104.25748, '96'),
('ART0001898', 'BUDGET', 1921, '26'),
('ART0001900', 'BUDGET', 216.75, '2'),
('ART0001908', 'BUDGET', 1185.75, '75'),
('ART0001913', 'BUDGET', 223.125, '9'),
('ART0001917', 'BUDGET', 2924.612, '59'),
('ART0001920', 'BUDGET', 331.5, '5'),
('ART0001921', 'BUDGET', 1772.25, '33'),
('ART0001923', 'BUDGET', 1389.75, '9'),
('ART0001926', 'BUDGET', 102, '12'),
('ART0001931', 'BUDGET', 1882.75, '5'),
('ART0001935', 'BUDGET', 267.75, '1'),
('ART0001939', 'BUDGET', 191.25, '1'),
('ART0001940', 'BUDGET', 2707.2636, '18'),
('ART0001942', 'BUDGET', 1797.7568, '10'),
('ART0001945', 'BUDGET', 306, '1'),
('ART0001946', 'BUDGET', 1700, '1'),
('ART0001947', 'BUDGET', 395.25, '3'),
('ART0001950', 'BUDGET', 573.75, '1'),
('ART0001951', 'BUDGET', 828.75, '1'),
('ART0001981', 'BUDGET', 119, '3'),
('ART0001989', 'BUDGET', 51, '12'),
('ART0001993', 'BUDGET', 276.25, '2'),
('ART0001994', 'BUDGET', 80.58, '19'),
('ART0002010', 'BUDGET', 106.25, '3'),
('ART0002012', 'BUDGET', 397.375, '3'),
('ART0002015', 'BUDGET', 174.25, '2'),
('ART0002017', 'BUDGET', 0, '1'),
('ART0002018', 'BUDGET', 38.25, '1'),
('ART0002019', 'BUDGET', 25.5, '1'),
('ART0002026', 'BUDGET', 127.5, '4'),
('ART0002027', 'BUDGET', 314.5, '4'),
('ART0002028', 'BUDGET', 76.5, '2'),
('ART0002029', 'BUDGET', 0, '2'),
('ART0002041', 'BUDGET', 255, '7'),
('ART0002042', 'BUDGET', 331.5, '7'),
('ART0002048', 'BUDGET', 140.25, '15'),
('ART0002070', 'BUDGET', 310.25, '3'),
('ART0002079', 'BUDGET', 204, '12'),
('ART0002102', 'BUDGET', 682.125, '39'),
('ART0002107', 'BUDGET', 216.75, '21'),
('ART0002109', 'BUDGET', 55.25, '4'),
('ART0002112', 'BUDGET', 22.44, '6'),
('ART0002123', 'BUDGET', 34, '3'),
('ART0002132', 'BUDGET', 153, '2'),
('ART0002133', 'BUDGET', 399.5, '7'),
('ART0002139', 'BUDGET', 232.9, '3'),
('ART0002140', 'BUDGET', 267.75, '3'),
('ART0002141', 'BUDGET', 178.5, '2'),
('ART0002142', 'BUDGET', 344.25, '1'),
('ART0002144', 'BUDGET', 153, '2'),
('ART0002145', 'BUDGET', 221, '2'),
('ART0002148', 'BUDGET', 714, '18'),
('ART0002152', 'BUDGET', 280.5, '12'),
('ART0002172', 'BUDGET', 97.75, '2'),
('ART0002173', 'BUDGET', 178.5, '3'),
('ART0002191', 'BUDGET', 153, '2'),
('ART0002195', 'BUDGET', 199.75, '1'),
('ART0002210', 'BUDGET', 212.5, '5'),
('ART0002214', 'BUDGET', 263.5, '3'),
('ART0002224', 'BUDGET', 344.25, '16'),
('ART0002228', 'BUDGET', 374, '3'),
('ART0002238', 'BUDGET', 63.75, '1'),
('ART0002240', 'BUDGET', 242.25, '2'),
('ART0002249', 'BUDGET', 140.25, '4'),
('ART0002262', 'BUDGET', 301.75, '2'),
('ART0002263', 'BUDGET', 297.5, '2'),
('ART0002267', 'BUDGET', 399.5, '6'),
('ART0002271', 'BUDGET', 590.75, '9'),
('ART0002273', 'BUDGET', 157.25, '1'),
('ART0002274', 'BUDGET', 303.875, '2'),
('ART0002284', 'BUDGET', 0, '1'),
('ART0002299', 'BUDGET', 250.75, '2'),
('ART0002306', 'BUDGET', 159.375, '2'),
('ART0002360', 'BUDGET', 1076.95, '4'),
('ART0002366', 'BUDGET', 586.5, '20'),
('ART0002370', 'BUDGET', 125.375, '7'),
('ART0002385', 'BUDGET', 433.5, '67'),
('ART0002411', 'BUDGET', 217.8125, '8'),
('ART0002416', 'BUDGET', 127.5, '13'),
('ART0002423', 'BUDGET', 51, '5'),
('ART0002424', 'BUDGET', 153, '16'),
('ART0002444', 'BUDGET', 527, '16'),
('ART0002450', 'BUDGET', 603.5, '2'),
('ART0002451', 'BUDGET', 431.375, '2'),
('ART0002452', 'BUDGET', 357, '2'),
('ART0002455', 'BUDGET', 755.6500000000001, '2'),
('ART0002456', 'BUDGET', 539.75, '2'),
('ART0002464', 'BUDGET', 102, '1'),
('ART0002476', 'BUDGET', 178.5, '15'),
('ART0002488', 'BUDGET', 331.5, '1'),
('ART0002490', 'BUDGET', 306, '15'),
('ART0002494', 'BUDGET', 340, '3'),
('ART0002498', 'BUDGET', 144.5, '1'),
('ART0002502', 'BUDGET', 167.875, '7'),
('ART0002504', 'BUDGET', 709.818, '26'),
('ART0002508', 'BUDGET', 127.5, '1'),
('ART0002511', 'BUDGET', 93.5, '1'),
('ART0002513', 'BUDGET', 586.5, '16'),
('ART0002517', 'BUDGET', 76.5, '1'),
('ART0002530', 'BUDGET', 0, '8'),
('ART0002531', 'BUDGET', 255, '5'),
('ART0002551', 'BUDGET', 924.375, '7'),
('ART0002552', 'BUDGET', 380.375, '9'),
('ART0002554', 'BUDGET', 306, '5'),
('ART0002555', 'BUDGET', 195.5, '2'),
('ART0002556', 'BUDGET', 238, '2'),
('ART0002580', 'BUDGET', 446.25, '2'),
('ART0002581', 'BUDGET', 412.25, '2'),
('ART0002586', 'BUDGET', 182.75, '2'),
('ART0002598', 'BUDGET', 314.5, '3'),
('ART0002608', 'BUDGET', 327.25, '1'),
('ART0002614', 'BUDGET', 242.25, '1'),
('ART0002615', 'BUDGET', 123.25, '1'),
('ART0002617', 'BUDGET', 204, '2'),
('ART0002619', 'BUDGET', 85, '1'),
('ART0002628', 'BUDGET', 153, '2'),
('ART0002706', 'BUDGET', 452.625, '2'),
('ART0002707', 'BUDGET', 535.5, '3'),
('ART0002712', 'BUDGET', 61.625, '1'),
('ART0002718', 'BUDGET', 0, '1'),
('ART0002719', 'BUDGET', 0, '1'),
('ART0002739', 'BUDGET', 204, '7'),
('ART0002740', 'BUDGET', 2596.75, '162'),
('ART0002747', 'BUDGET', 408, '3'),
('ART0002753', 'BUDGET', 263.5, '2'),
('ART0002755', 'BUDGET', 344.25, '3'),
('ART0002793', 'BUDGET', 816, '100'),
('ART0002829', 'BUDGET', 357, '24'),
('ART0002836', 'BUDGET', 527, '21'),
('ART0002859', 'BUDGET', 378.25, '7'),
('ART0002860', 'BUDGET', 318.75, '7'),
('ART0002866', 'BUDGET', 839.375, '15'),
('ART0002867', 'BUDGET', 599.25, '15'),
('ART0002882', 'BUDGET', 199.75, '1'),
('ART0002886', 'BUDGET', 395.25, '3'),
('ART0002895', 'BUDGET', 236.3, '2'),
('ART0002896', 'BUDGET', 225.675, '2'),
('ART0002897', 'BUDGET', 191.25, '2'),
('ART0002909', 'BUDGET', 369.75, '15'),
('ART0002918', 'BUDGET', 629, '7'),
('ART0002919', 'BUDGET', 637.5, '7'),
('ART0002938', 'BUDGET', 552.5, '5'),
('ART0002949', 'BUDGET', 488.75, '3'),
('ART0002958', 'BUDGET', 197.625, '3'),
('ART0002959', 'BUDGET', 216.75, '3'),
('ART0002961', 'BUDGET', 95.625, '2'),
('ART0002962', 'BUDGET', 74.375, '2'),
('ART0002963', 'BUDGET', 74.375, '2'),
('ART0002968', 'BUDGET', 255, '2'),
('ART0002969', 'BUDGET', 289, '2'),
('ART0002978', 'BUDGET', 263.5, '2'),
('ART0002988', 'BUDGET', 427.125, '2'),
('ART0002989', 'BUDGET', 422.875, '2'),
('ART0002990', 'BUDGET', 397.375, '2'),
('ART0002996', 'BUDGET', 159.375, '2'),
('ART0002997', 'BUDGET', 705.5, '2'),
('ART0003099', 'BUDGET', 159.375, '20'),
('ART0003101', 'BUDGET', 191.25, '7'),
('ART0003105', 'BUDGET', 140.25, '1'),
('ART0003132', 'BUDGET', 170, '14'),
('ART0003135', 'BUDGET', 10.625, '4'),
('ART0003160', 'BUDGET', 255, '2'),
('ART0003164', 'BUDGET', 369.75, '2'),
('ART0003167', 'BUDGET', 182.75, '4'),
('ART0003169', 'BUDGET', 170, '8'),
('ART0003189', 'BUDGET', 102, '52'),
('ART0003195', 'BUDGET', 119, '4'),
('ART0003197', 'BUDGET', 21.25, '3'),
('ART0003202', 'BUDGET', 21.25, '5'),
('ART0003263', 'BUDGET', 22.44, '1'),
('ART0003268', 'BUDGET', 5.44, '1'),
('ART0003269', 'BUDGET', 318.75, '18'),
('ART0003275', 'BUDGET', 221, '8'),
('ART0003277', 'BUDGET', 159.375, '11'),
('ART0003309', 'BUDGET', 204, '28'),
('ART0003310', 'BUDGET', 144.5, '42'),
('ART0003578', 'BUDGET', 0, '10'),
('ART0003580', 'BUDGET', 0, '10'),
('ART0003609', 'BUDGET', 544, '24'),
('ART0003610', 'BUDGET', 420.75, '216'),
('ART0003612', 'BUDGET', 153, '8'),
('ART0003613', 'BUDGET', 68, '4'),
('ART0003642', 'BUDGET', 133.875, '22'),
('ART0003704', 'BUDGET', 552.5, '22'),
('ART0003780', 'BUDGET', 408, '42'),
('ART0003782', 'BUDGET', 0, '4'),
('ART0003785', 'BUDGET', 556.75, '60'),
('ART0003824', 'BUDGET', 510, '124'),
('ART0003844', 'BUDGET', 393.125, '10'),
('ART0003935', 'BUDGET', 749.343, '4'),
('ART0003940', 'BUDGET', 2720.0068, '15'),
('ART0003982', 'BUDGET', 51, '1'),
('ART0003984', 'BUDGET', 38.25, '1'),
('ART0003989', 'BUDGET', 63.75, '1'),
('ART0004014', 'BUDGET', 905.25, '2'),
('ART0004015', 'BUDGET', 280.5, '10'),
('ART0004084', 'BUDGET', 133.875, '0'),
('ART0004099', 'BUDGET', 170, '1'),
('ART0004104', 'BUDGET', 425, '4'),
('ART0004146', 'BUDGET', 442, '31'),
('ART0004149', 'BUDGET', 204, '35'),
('ART0004152', 'BUDGET', 637.5, '30'),
('ART0004169', 'BUDGET', 306, '10'),
('ART0004175', 'BUDGET', 306, '4'),
('ART0004202', 'BUDGET', 140.25, '2'),
('ART0004357', 'BUDGET', 412.25, '75'),
('ART0004362', 'BUDGET', 153, '10'),
('ART0004363', 'BUDGET', 285.6, '116'),
('ART0004373', 'BUDGET', 238, '102'),
('ART0004374', 'BUDGET', 221, '102'),
('ART0004375', 'BUDGET', 93.5, '6'),
('ART0004384', 'BUDGET', 153, '110'),
('ART0004385', 'BUDGET', 153, '41'),
('ART0004386', 'BUDGET', 255, '54'),
('ART0004392', 'BUDGET', 208.25, '30'),
('ART0004397', 'BUDGET', 983.875, '101'),
('ART0004403', 'BUDGET', 331.5, '26'),
('ART0004410', 'BUDGET', 157.25, '4'),
('ART0004420', 'BUDGET', 170, '13'),
('ART0004440', 'BUDGET', 359.125, '4'),
('ART0004656', 'BUDGET', 42.5, '6'),
('ART0004659', 'BUDGET', 244.375, '12'),
('ART0004660', 'BUDGET', 95.625, '6'),
('ART0004671', 'BUDGET', 95.625, '5'),
('ART0004675', 'BUDGET', 127.5, '5'),
('ART0004689', 'BUDGET', 99.875, '12'),
('ART0004697', 'BUDGET', 42.5, '1'),
('ART0004711', 'BUDGET', 74.375, '3'),
('ART0004717', 'BUDGET', 63.75, '13'),
('ART0004718', 'BUDGET', 53.125, '2'),
('ART0004724', 'BUDGET', 91.375, '3'),
('ART0004725', 'BUDGET', 91.375, '3'),
('ART0004726', 'BUDGET', 80.75, '3'),
('ART0004727', 'BUDGET', 91.375, '3'),
('ART0004737', 'BUDGET', 116.875, '10'),
('ART0004836', 'BUDGET', 148.75, '20'),
('ART0004880', 'BUDGET', 331.5, '34'),
('ART0004885', 'BUDGET', 1051.875, '19'),
('ART0004886', 'BUDGET', 1610.75, '12'),
('ART0004889', 'BUDGET', 280.5, '15'),
('ART0004898', 'BUDGET', 184.875, '13'),
('ART0004901', 'BUDGET', 102, '12'),
('ART0004902', 'BUDGET', 272.0068, '12'),
('ART0004904', 'BUDGET', 119, '4'),
('ART0004919', 'BUDGET', 159.375, '3'),
('ART0004924', 'BUDGET', 233.75, '9'),
('ART0004941', 'BUDGET', 329.375, '8'),
('ART0004942', 'BUDGET', 218.875, '8'),
('ART0004944', 'BUDGET', 119, '8'),
('ART0004946', 'BUDGET', 276.25, '16'),
('ART0004947', 'BUDGET', 120.275, '8'),
('ART0005011', 'BUDGET', 306, '2'),
('ART0005026', 'BUDGET', 329.375, '1'),
('ART0005028', 'BUDGET', 994.5, '6'),
('ART0005029', 'BUDGET', 255, '1'),
('ART0005030', 'BUDGET', 1071, '3'),
('ART0005034', 'BUDGET', 76.5, '2'),
('ART0005035', 'BUDGET', 140.25, '2'),
('ART0005036', 'BUDGET', 420.75, '16'),
('ART0005037', 'BUDGET', 267.75, '16'),
('ART0005091', 'BUDGET', 144.5, '4'),
('ART0005109', 'BUDGET', 102, '4'),
('ART0005110', 'BUDGET', 0, '2'),
('ART0005111', 'BUDGET', 74.375, '2'),
('ART0005112', 'BUDGET', 95.625, '2'),
('ART0005136', 'BUDGET', 5621.815, '406');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;