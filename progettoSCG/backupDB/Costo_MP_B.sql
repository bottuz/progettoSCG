-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Dic 15, 2022 alle 11:26
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
-- Struttura della tabella `Costo_MP_B`
--

CREATE TABLE `Costo_MP_B` (
  `NrArticolo` varchar(20) NOT NULL,
  `BudgetConsuntivo` varchar(20) NOT NULL,
  `sum(consumi.QuantitaMPImpiegata)` decimal(32,0) DEFAULT NULL,
  `sum(consumi.ImportoCostoTotale)` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Costo_MP_B`
--

INSERT INTO `Costo_MP_B` (`NrArticolo`, `BudgetConsuntivo`, `sum(consumi.QuantitaMPImpiegata)`, `sum(consumi.ImportoCostoTotale)`) VALUES
('ART0000788', 'BUDGET', '28', 920.7000000000002),
('ART0000756', 'BUDGET', '200', 5012.42),
('ART0000772', 'BUDGET', '40', 1315.25),
('ART0000762', 'BUDGET', '1050', 15123.699999999999),
('ART0000825', 'BUDGET', '25', 1670.71),
('ART0001920', 'BUDGET', '1165', 90.43),
('ART0001017', 'BUDGET', '14', 455.24),
('ART0001180', 'BUDGET', '1155', 4.21),
('ART0005136', 'BUDGET', '2480', 136.54),
('ART0003785', 'BUDGET', '6', 146.61),
('ART0003580', 'BUDGET', '550', 82.55),
('ART0003578', 'BUDGET', '600', 23.8),
('ART0003613', 'BUDGET', '164', 32.38),
('ART0003782', 'BUDGET', '712', 10.02),
('ART0002513', 'BUDGET', '572', 94.68),
('ART0000625', 'BUDGET', '4', 464.07),
('ART0000627', 'BUDGET', '7', 241.49),
('ART0000639', 'BUDGET', '1615', 34.44),
('ART0001743', 'BUDGET', '1530', 167.2),
('ART0002551', 'BUDGET', '239', 21.950000000000003),
('ART0002552', 'BUDGET', '16', 2.74),
('ART0001253', 'BUDGET', '670', 5.92),
('ART0001741', 'BUDGET', '280', 39.35),
('ART0000850', 'BUDGET', '56', 1128.6599999999999),
('ART0001891', 'BUDGET', '640', 9.01),
('ART0001779', 'BUDGET', '400', 22.4),
('ART0000758', 'BUDGET', '144', 2899.5400000000004),
('ART0001884', 'BUDGET', '806', 110.93),
('ART0001154', 'BUDGET', '637', 110.22999999999999),
('ART0001188', 'BUDGET', '60', 1.17),
('ART0001214', 'BUDGET', '140', 30.68),
('ART0002132', 'BUDGET', '54', 7.59),
('ART0002144', 'BUDGET', '54', 7.59),
('ART0002145', 'BUDGET', '80', 17.64),
('ART0002511', 'BUDGET', '26', 2.69),
('ART0002012', 'BUDGET', '45', 46.54),
('ART0002274', 'BUDGET', '240', 99.55),
('ART0002997', 'BUDGET', '2', 190),
('ART0003197', 'BUDGET', '3', 36),
('ART0000308', 'BUDGET', '105', 144.9),
('ART0003824', 'BUDGET', '948', 16.27),
('ART0002102', 'BUDGET', '541', 16.72),
('ART0002366', 'BUDGET', '700', 120.19999999999999),
('ART0002740', 'BUDGET', '9', 325.67),
('ART0001228', 'BUDGET', '470', 1.12),
('ART0001238', 'BUDGET', '720', 5.1),
('ART0002753', 'BUDGET', '90', 9.3),
('ART0001926', 'BUDGET', '1', 128.53),
('ART0001817', 'BUDGET', '975', 141.01),
('ART0004099', 'BUDGET', '61', 976.66),
('ART0003935', 'BUDGET', '440', 187.81),
('ART0004146', 'BUDGET', '341', 1790.92),
('ART0001500', 'BUDGET', '12', 9.57),
('ART0002273', 'BUDGET', '48', 4.96),
('ART0002996', 'BUDGET', '560', 51.76),
('ART0000805', 'BUDGET', '22', 695.9000000000001),
('ART0000752', 'BUDGET', '256', 6489.7699999999995),
('ART0001811', 'BUDGET', '1848', 471.96),
('ART0000630', 'BUDGET', '6', 227.94),
('ART0000644', 'BUDGET', '8', 295.49),
('ART0000645', 'BUDGET', '4', 724.4599999999999),
('ART0000312', 'BUDGET', '118', 236),
('ART0000128', 'BUDGET', '11', 66),
('ART0001766', 'BUDGET', '805', 88.13000000000001),
('ART0001593', 'BUDGET', '532', 0.2),
('ART0003160', 'BUDGET', '242', 25.63),
('ART0000782', 'BUDGET', '216', 3748.9999999999995),
('ART0002385', 'BUDGET', '8', 712.8799999999999),
('ART0002793', 'BUDGET', '100', 860),
('ART0001897', 'BUDGET', '14', 673.03),
('ART0001785', 'BUDGET', '5', 918.95),
('ART0002866', 'BUDGET', '685', 230.07),
('ART0000848', 'BUDGET', '675', 10826.09),
('ART0001886', 'BUDGET', '11', 228.42),
('ART0001775', 'BUDGET', '6', 575.52),
('ART0003780', 'BUDGET', '4', 47.78),
('ART0003610', 'BUDGET', '813', 776.07),
('ART0000795', 'BUDGET', '791', 20651.329999999994),
('ART0001866', 'BUDGET', '188', 3456.79),
('ART0001759', 'BUDGET', '7', 945.5100000000001),
('ART0000131', 'BUDGET', '1', 26.22),
('ART0001249', 'BUDGET', '531', 17.23),
('ART0002010', 'BUDGET', '54', 6.09),
('ART0002267', 'BUDGET', '390', 12.48),
('ART0003135', 'BUDGET', '4', 108),
('ART0002139', 'BUDGET', '157', 21.39),
('ART0002140', 'BUDGET', '161', 22),
('ART0002895', 'BUDGET', '560', 51.76),
('ART0002896', 'BUDGET', '560', 51.76),
('ART0000690', 'BUDGET', '450', 11.22),
('ART0004202', 'BUDGET', '25', 2.7),
('ART0002882', 'BUDGET', '50', 8.14),
('ART0001765', 'BUDGET', '1155', 678.2099999999999),
('ART0000765', 'BUDGET', '8', 232.35),
('ART0001628', 'BUDGET', '781', 5.510000000000001),
('ART0001659', 'BUDGET', '10', 22.44),
('ART0000635', 'BUDGET', '20', 60),
('ART0004385', 'BUDGET', '41', 221.6),
('ART0000125', 'BUDGET', '183', 39.11),
('ART0000313', 'BUDGET', '19', 190.8),
('ART0002015', 'BUDGET', '32', 10.850000000000001),
('ART0002070', 'BUDGET', '73', 16.25),
('ART0000757', 'BUDGET', '10', 496.68),
('ART0001874', 'BUDGET', '135', 16.51),
('ART0001762', 'BUDGET', '125', 12.27),
('ART0001895', 'BUDGET', '1190', 47.4),
('ART0001783', 'BUDGET', '825', 73.74000000000001),
('ART0001921', 'BUDGET', '3', 312.08),
('ART0000804', 'BUDGET', '80', 3422.3899999999985),
('ART0005091', 'BUDGET', '152', 3.03),
('ART0004941', 'BUDGET', '1', 55.68),
('ART0004942', 'BUDGET', '224', 17.48),
('ART0004944', 'BUDGET', '112', 1),
('ART0004946', 'BUDGET', '1', 15.81),
('ART0004947', 'BUDGET', '384', 5.24),
('ART0004175', 'BUDGET', '175', 103.52000000000001),
('ART0004084', 'BUDGET', '27', 702.0499999999998),
('ART0003268', 'BUDGET', '235', 0.96),
('ART0000697', 'BUDGET', '420', 4.41),
('ART0001923', 'BUDGET', '1122', 255.94),
('ART0001813', 'BUDGET', '853', 92.05),
('ART0000783', 'BUDGET', '144', 4216.21),
('ART0001898', 'BUDGET', '1496', 383.05000000000007),
('ART0001786', 'BUDGET', '2054', 225.77),
('ART0001261', 'BUDGET', '220', 0.52),
('ART0001263', 'BUDGET', '385', 0.9099999999999999),
('ART0001587', 'BUDGET', '1815', 0.6900000000000001),
('ART0002598', 'BUDGET', '75', 8.06),
('ART0002886', 'BUDGET', '165', 15.41),
('ART0003164', 'BUDGET', '390', 22.3),
('ART0000748', 'BUDGET', '1543', 11130.57),
('ART0001868', 'BUDGET', '32', 627.64),
('ART0001615', 'BUDGET', '8', 34.72),
('ART0002041', 'BUDGET', '196', 65.4),
('ART0002042', 'BUDGET', '231', 56.64),
('ART0002133', 'BUDGET', '532', 115.33),
('ART0002859', 'BUDGET', '7', 161),
('ART0002860', 'BUDGET', '7', 161),
('ART0000643', 'BUDGET', '51', 219.3),
('ART0004410', 'BUDGET', '260', 36.54),
('ART0000893', 'BUDGET', '931', 33.11),
('ART0000129', 'BUDGET', '5', 195),
('ART0001422', 'BUDGET', '1', 18.96),
('ART0002148', 'BUDGET', '606', 59.65),
('ART0000628', 'BUDGET', '3', 320.19),
('ART0002224', 'BUDGET', '1', 166.46),
('ART0003189', 'BUDGET', '52', 109.2),
('ART0001267', 'BUDGET', '235', 2.53),
('ART0001940', 'BUDGET', '2444', 416.58000000000004),
('ART0001830', 'BUDGET', '1800', 215.45999999999998),
('ART0001514', 'BUDGET', '520', 46.25),
('ART0001493', 'BUDGET', '46', 35.14),
('ART0001636', 'BUDGET', '2', 4.05),
('ART0001637', 'BUDGET', '2', 17.9),
('ART0001745', 'BUDGET', '370', 149.18),
('ART0002228', 'BUDGET', '138', 5.029999999999999),
('ART0002262', 'BUDGET', '80', 8.51),
('ART0002263', 'BUDGET', '76', 6.78),
('ART0002455', 'BUDGET', '920', 216.01),
('ART0002456', 'BUDGET', '620', 69.54),
('ART0002580', 'BUDGET', '2', 21),
('ART0002581', 'BUDGET', '2', 31),
('ART0002958', 'BUDGET', '48', 8.07),
('ART0002959', 'BUDGET', '46', 15.35),
('ART0002988', 'BUDGET', '70', 58.35),
('ART0002989', 'BUDGET', '50', 38.02),
('ART0002990', 'BUDGET', '75', 25.41),
('ART0003195', 'BUDGET', '880', 2.32),
('ART0005028', 'BUDGET', '1980', 497.26),
('ART0001252', 'BUDGET', '1780', 41.69),
('ART0001497', 'BUDGET', '56', 41.89),
('ART0001653', 'BUDGET', '3', 18.58),
('ART0002271', 'BUDGET', '420', 22.59),
('ART0002829', 'BUDGET', '420', 222.2),
('ART0002918', 'BUDGET', '160', 98.03),
('ART0002919', 'BUDGET', '157', 95.59),
('ART0003309', 'BUDGET', '233', 22.659999999999997),
('ART0003310', 'BUDGET', '146', 14.2),
('ART0001391', 'BUDGET', '234', 22.75),
('ART0002504', 'BUDGET', '26', 117),
('ART0001908', 'BUDGET', '7', 252.01999999999998),
('ART0003105', 'BUDGET', '110', 0.65),
('ART0001733', 'BUDGET', '15', 123),
('ART0001739', 'BUDGET', '360', 40.28),
('ART0001989', 'BUDGET', '101', 9.91),
('ART0001566', 'BUDGET', '2', 1.22),
('ART0003101', 'BUDGET', '70', 4.21),
('ART0001185', 'BUDGET', '1212', 46.78),
('ART0002109', 'BUDGET', '100', 0.13),
('ART0000790', 'BUDGET', '11', 514.97),
('ART0001829', 'BUDGET', '183', 30.1),
('ART0001939', 'BUDGET', '165', 11.29),
('ART0001794', 'BUDGET', '994', 337.85),
('ART0001776', 'BUDGET', '408', 82.85),
('ART0001889', 'BUDGET', '540', 73.94),
('ART0001264', 'BUDGET', '305', 0.82),
('ART0001590', 'BUDGET', '1577', 9),
('ART0002530', 'BUDGET', '8', 148.8),
('ART0000786', 'BUDGET', '72', 2603.5300000000007),
('ART0001913', 'BUDGET', '8', 1469.78),
('ART0004152', 'BUDGET', '4', 14.2),
('ART0004014', 'BUDGET', '110', 399.41),
('ART0003940', 'BUDGET', '1670', 954.8800000000001),
('ART0004149', 'BUDGET', '3', 5.38),
('ART0005026', 'BUDGET', '150', 63.02),
('ART0001265', 'BUDGET', '450', 328),
('ART0001266', 'BUDGET', '750', 72),
('ART0001515', 'BUDGET', '1', 25),
('ART0001669', 'BUDGET', '1', 4),
('ART0001670', 'BUDGET', '800', 1.28),
('ART0002017', 'BUDGET', '1', 51),
('ART0002018', 'BUDGET', '1', 42),
('ART0002019', 'BUDGET', '1', 49),
('ART0002284', 'BUDGET', '1', 13.5),
('ART0002718', 'BUDGET', '1', 50),
('ART0002719', 'BUDGET', '1', 43),
('ART0002836', 'BUDGET', '189', 348.33),
('ART0003275', 'BUDGET', '280', 0.88),
('ART0002502', 'BUDGET', '140', 21.27),
('ART0001433', 'BUDGET', '801', 11.870000000000001),
('ART0002172', 'BUDGET', '80', 2.21),
('ART0001218', 'BUDGET', '275', 1.03),
('ART0000779', 'BUDGET', '14', 398.31999999999994),
('ART0001047', 'BUDGET', '1030', 40.92),
('ART0001046', 'BUDGET', '805', 8.370000000000001),
('ART0001095', 'BUDGET', '45', 1.62),
('ART0004386', 'BUDGET', '1620', 26.98),
('ART0001880', 'BUDGET', '635', 34.51),
('ART0001768', 'BUDGET', '500', 57.24),
('ART0000797', 'BUDGET', '9', 370.57),
('ART0001869', 'BUDGET', '220', 37.78),
('ART0001761', 'BUDGET', '180', 27.77),
('ART0001162', 'BUDGET', '405', 265.79999999999995),
('ART0001609', 'BUDGET', '672', 1.25),
('ART0001993', 'BUDGET', '2', 14),
('ART0001994', 'BUDGET', '19', 182.39999999999998),
('ART0004420', 'BUDGET', '532', 18.29),
('ART0003277', 'BUDGET', '935', 9.82),
('ART0001272', 'BUDGET', '1', 143.3),
('ART0000116', 'BUDGET', '5', 142),
('ART0002107', 'BUDGET', '2', 18),
('ART0000638', 'BUDGET', '10', 30),
('ART0000641', 'BUDGET', '5', 60),
('ART0005011', 'BUDGET', '210', 39.73),
('ART0001110', 'BUDGET', '1', 12),
('ART0001113', 'BUDGET', '25', 4.29),
('ART0001117', 'BUDGET', '286', 1271.74),
('ART0001129', 'BUDGET', '2', 31),
('ART0001170', 'BUDGET', '382', 40.29),
('ART0002370', 'BUDGET', '7', 288.8),
('ART0000784', 'BUDGET', '63', 3040.26),
('ART0001788', 'BUDGET', '980', 140),
('ART0001873', 'BUDGET', '651', 151.51),
('ART0000151', 'BUDGET', '29', 45.13),
('ART0000152', 'BUDGET', '118', 15.149999999999999),
('ART0001190', 'BUDGET', '1', 4.66),
('ART0001492', 'BUDGET', '60', 0.81),
('ART0002173', 'BUDGET', '126', 13.02),
('ART0002152', 'BUDGET', '552', 12.7),
('ART0001409', 'BUDGET', '263', 5.47),
('ART0004373', 'BUDGET', '102', 1428),
('ART0004374', 'BUDGET', '102', 1039.38),
('ART0004397', 'BUDGET', '101', 2471.47),
('ART0000223', 'BUDGET', '16', 116.8),
('ART0000826', 'BUDGET', '50', 3913.21),
('ART0001931', 'BUDGET', '1175', 254.94),
('ART0001821', 'BUDGET', '1100', 151.43),
('ART0002554', 'BUDGET', '128', 6.890000000000001),
('ART0004885', 'BUDGET', '1664', 36.73),
('ART0004886', 'BUDGET', '18', 278.26),
('ART0001149', 'BUDGET', '2', 33.05),
('ART0002476', 'BUDGET', '225', 12.6),
('ART0005029', 'BUDGET', '511', 59.71),
('ART0005030', 'BUDGET', '835', 292.15999999999997),
('ART0004836', 'BUDGET', '20', 260),
('ART0000812', 'BUDGET', '108', 3900.33),
('ART0001942', 'BUDGET', '751', 435.12),
('ART0001832', 'BUDGET', '681', 159.2),
('ART0002210', 'BUDGET', '100', 2.54),
('ART0002141', 'BUDGET', '63', 13.46),
('ART0002142', 'BUDGET', '64', 13.68),
('ART0002897', 'BUDGET', '682', 131.25),
('ART0001174', 'BUDGET', '302', 78.48),
('ART0002494', 'BUDGET', '3', 56),
('ART0004724', 'BUDGET', '3', 3.11),
('ART0004725', 'BUDGET', '2', 2.38),
('ART0004726', 'BUDGET', '1', 0.95),
('ART0004727', 'BUDGET', '4', 3.8),
('ART0003612', 'BUDGET', '336', 59.23),
('ART0001772', 'BUDGET', '1', 132.11),
('ART0002938', 'BUDGET', '48', 125.62),
('ART0000456', 'BUDGET', '140', 7.84),
('ART0000115', 'BUDGET', '1305', 434.44),
('ART0000320', 'BUDGET', '141', 47.769999999999996),
('ART0000811', 'BUDGET', '96', 3343.14),
('ART0002747', 'BUDGET', '225', 133.1),
('ART0002949', 'BUDGET', '84', 49.69),
('ART0002360', 'BUDGET', '284', 68.53),
('ART0000780', 'BUDGET', '20', 816.87),
('ART0001778', 'BUDGET', '180', 23.82),
('ART0001890', 'BUDGET', '230', 9.57),
('ART0000043', 'BUDGET', '210', 36.06),
('ART0000041', 'BUDGET', '4', 92),
('ART0000018', 'BUDGET', '30', 5.15),
('ART0000042', 'BUDGET', '4', 104),
('ART0000323', 'BUDGET', '100', 45.64),
('ART0000324', 'BUDGET', '75', 25.68),
('ART0000325', 'BUDGET', '125', 57.05),
('ART0000642', 'BUDGET', '5', 62.5),
('ART0003982', 'BUDGET', '100', 1),
('ART0003989', 'BUDGET', '160', 1.43),
('ART0001277', 'BUDGET', '480', 1.19),
('ART0002214', 'BUDGET', '112', 6.14),
('ART0005034', 'BUDGET', '40', 3.63),
('ART0005035', 'BUDGET', '50', 13.61),
('ART0005036', 'BUDGET', '320', 68.38),
('ART0005037', 'BUDGET', '352', 50.3),
('ART0001520', 'BUDGET', '16', 3.91),
('ART0001427', 'BUDGET', '96', 0.14),
('ART0001588', 'BUDGET', '690', 0.32),
('ART0002112', 'BUDGET', '390', 0.73),
('ART0001164', 'BUDGET', '798', 44.36),
('ART0002048', 'BUDGET', '75', 5.76),
('ART0002444', 'BUDGET', '603', 31.520000000000003),
('ART0002867', 'BUDGET', '545', 80.4),
('ART0002909', 'BUDGET', '230', 44.92),
('ART0000814', 'BUDGET', '10', 593.4100000000001),
('ART0001945', 'BUDGET', '140', 29.92),
('ART0005109', 'BUDGET', '100', 6.97),
('ART0002739', 'BUDGET', '364', 8.04),
('ART0000851', 'BUDGET', '240', 2749.55),
('ART0001799', 'BUDGET', '2', 199.17),
('ART0002617', 'BUDGET', '70', 3.8),
('ART0003202', 'BUDGET', '5', 44.8),
('ART0002249', 'BUDGET', '172', 6.97),
('ART0002615', 'BUDGET', '25', 5.34),
('ART0000841', 'BUDGET', '42', 2940.7),
('ART0001946', 'BUDGET', '500', 59.03),
('ART0001837', 'BUDGET', '414', 120.25),
('ART0002608', 'BUDGET', '1', 68),
('ART0004169', 'BUDGET', '450', 96.17),
('ART0000853', 'BUDGET', '320', 11467.17),
('ART0001807', 'BUDGET', '4', 1888.65),
('ART0001917', 'BUDGET', '4', 931.4000000000001),
('ART0000847', 'BUDGET', '51', 706.6800000000001),
('ART0001534', 'BUDGET', '16', 12),
('ART0001535', 'BUDGET', '400', 1.96),
('ART0002026', 'BUDGET', '48', 8.74),
('ART0002027', 'BUDGET', '48', 7.89),
('ART0002028', 'BUDGET', '2', 24),
('ART0002029', 'BUDGET', '2', 33),
('ART0002299', 'BUDGET', '170', 16.76),
('ART0002619', 'BUDGET', '1', 7.7),
('ART0003099', 'BUDGET', '1', 4.5),
('ART0001294', 'BUDGET', '1025', 2.7699999999999996),
('ART0002123', 'BUDGET', '150', 0.12),
('ART0003132', 'BUDGET', '286', 1.05),
('ART0003844', 'BUDGET', '224', 5.65),
('ART0004403', 'BUDGET', '1', 72.26),
('ART0001244', 'BUDGET', '407', 118.77),
('ART0001290', 'BUDGET', '480', 1.19),
('ART0001740', 'BUDGET', '105', 9.38),
('ART0002614', 'BUDGET', '40', 10.89),
('ART0002706', 'BUDGET', '2', 56),
('ART0002707', 'BUDGET', '2', 41),
('ART0002079', 'BUDGET', '1', 1.87),
('ART0000119', 'BUDGET', '310', 16.51),
('ART0003642', 'BUDGET', '1', 14.78),
('ART0003609', 'BUDGET', '127', 890.0799999999999),
('ART0003704', 'BUDGET', '4', 86.01),
('ART0004362', 'BUDGET', '350', 3.9),
('ART0002238', 'BUDGET', '16', 0.96),
('ART0001981', 'BUDGET', '75', 7.39),
('ART0001441', 'BUDGET', '30', 23.33),
('ART0002712', 'BUDGET', '50', 16.68),
('ART0002978', 'BUDGET', '50', 38.03),
('ART0002464', 'BUDGET', '350', 11.67),
('ART0000769', 'BUDGET', '33', 857.4200000000001),
('ART0001804', 'BUDGET', '339', 32.11),
('ART0001947', 'BUDGET', '405', 22.56),
('ART0004440', 'BUDGET', '210', 261.06),
('ART0002586', 'BUDGET', '50', 11.02),
('ART0005110', 'BUDGET', '2', 74),
('ART0005111', 'BUDGET', '2', 16),
('ART0005112', 'BUDGET', '2', 26),
('ART0002306', 'BUDGET', '84', 4.35),
('ART0002488', 'BUDGET', '1', 22),
('ART0001610', 'BUDGET', '1952', 0.95),
('ART0002451', 'BUDGET', '500', 16.06),
('ART0003269', 'BUDGET', '990', 4.97),
('ART0004671', 'BUDGET', '950', 24.83),
('ART0000843', 'BUDGET', '26', 925.2099999999999),
('ART0004357', 'BUDGET', '1', 138.01),
('ART0004880', 'BUDGET', '1360', 12.13),
('ART0002424', 'BUDGET', '1', 1.57),
('ART0000749', 'BUDGET', '24', 883.3900000000001),
('ART0001900', 'BUDGET', '290', 3.91),
('ART0001789', 'BUDGET', '264', 31.17),
('ART0001877', 'BUDGET', '2', 135.38),
('ART0001429', 'BUDGET', '222', 7.35),
('ART0002195', 'BUDGET', '100', 3.2),
('ART0002517', 'BUDGET', '16', 0.89),
('ART0001872', 'BUDGET', '5', 62.33),
('ART0002531', 'BUDGET', '75', 17.84),
('ART0001276', 'BUDGET', '135', 0.36),
('ART0000830', 'BUDGET', '15', 1090.9599999999998),
('ART0001950', 'BUDGET', '251', 34.43),
('ART0001840', 'BUDGET', '235', 52.14),
('ART0000849', 'BUDGET', '9', 322.6500000000001),
('ART0001882', 'BUDGET', '210', 28.98),
('ART0001777', 'BUDGET', '158', 14.38),
('ART0000555', 'BUDGET', '80', 1.33),
('ART0000753', 'BUDGET', '100', 1699.99),
('ART0002755', 'BUDGET', '195', 23.02),
('ART0002628', 'BUDGET', '30', 2.59),
('ART0001219', 'BUDGET', '290', 9.77),
('ART0001612', 'BUDGET', '1', 0.02),
('ART0002240', 'BUDGET', '86', 7.8),
('ART0002452', 'BUDGET', '400', 61.5),
('ART0002555', 'BUDGET', '60', 8.22),
('ART0002556', 'BUDGET', '56', 6.61),
('ART0002968', 'BUDGET', '40', 15.62),
('ART0002969', 'BUDGET', '30', 11.72),
('ART0000121', 'BUDGET', '16', 61.92),
('ART0004375', 'BUDGET', '720', 17.84),
('ART0002498', 'BUDGET', '1', 8),
('ART0004659', 'BUDGET', '15', 33.87),
('ART0004660', 'BUDGET', '1', 44.35),
('ART0004717', 'BUDGET', '1', 8.45),
('ART0002423', 'BUDGET', '725', 0.89),
('ART0004392', 'BUDGET', '30', 294),
('ART0000796', 'BUDGET', '7', 506.83000000000004),
('ART0001935', 'BUDGET', '170', 18.62),
('ART0001825', 'BUDGET', '86', 6.6),
('ART0001767', 'BUDGET', '270', 33.4),
('ART0001575', 'BUDGET', '5', 2.16),
('ART0004889', 'BUDGET', '3', 40),
('ART0001202', 'BUDGET', '431', 77.23),
('ART0001203', 'BUDGET', '481', 73.52000000000001),
('ART0002508', 'BUDGET', '23', 5.07),
('ART0000157', 'BUDGET', '1', 45),
('ART0004711', 'BUDGET', '4', 44.66),
('ART0004697', 'BUDGET', '265', 6.13),
('ART0000845', 'BUDGET', '11', 1370.6100000000001),
('ART0001841', 'BUDGET', '260', 88.09),
('ART0001951', 'BUDGET', '281', 50.49),
('ART0003167', 'BUDGET', '300', 0.67),
('ART0003169', 'BUDGET', '564', 76.67),
('ART0004924', 'BUDGET', '3', 94.31),
('ART0004898', 'BUDGET', '936', 3.13),
('ART0004901', 'BUDGET', '624', 3.44),
('ART0004902', 'BUDGET', '1', 106.7),
('ART0004904', 'BUDGET', '560', 11.17),
('ART0004919', 'BUDGET', '1335', 31.439999999999998),
('ART0004656', 'BUDGET', '1', 10.37),
('ART0004689', 'BUDGET', '725', 19.94),
('ART0004718', 'BUDGET', '70', 0.36),
('ART0004737', 'BUDGET', '600', 8),
('ART0001099', 'BUDGET', '1', 255.53),
('ART0001100', 'BUDGET', '328', 33.98),
('ART0001102', 'BUDGET', '308', 18.21),
('ART0001104', 'BUDGET', '332', 19.62),
('ART0000226', 'BUDGET', '940', 40.31),
('ART0003984', 'BUDGET', '46', 0.58),
('ART0001208', 'BUDGET', '82', 8.5),
('ART0003263', 'BUDGET', '60', 0.02),
('ART0002411', 'BUDGET', '601', 33.05),
('ART0002490', 'BUDGET', '180', 16.32),
('ART0001215', 'BUDGET', '510', 42.27),
('ART0001605', 'BUDGET', '2', 1.72),
('ART0001606', 'BUDGET', '2', 7.14),
('ART0002191', 'BUDGET', '40', 13.57),
('ART0002450', 'BUDGET', '540', 94.77),
('ART0002961', 'BUDGET', '40', 30.42),
('ART0002962', 'BUDGET', '40', 30.42),
('ART0002963', 'BUDGET', '36', 27.38),
('ART0002416', 'BUDGET', '84', 0.42),
('ART0000882', 'BUDGET', '2', 22.04),
('ART0000881', 'BUDGET', '1', 48.28),
('ART0000878', 'BUDGET', '960', 135.16),
('ART0000877', 'BUDGET', '960', 135.14),
('ART0000883', 'BUDGET', '228', 64.05),
('ART0000885', 'BUDGET', '1', 39.34),
('ART0000879', 'BUDGET', '100', 124.31),
('ART0000880', 'BUDGET', '400', 12.94),
('ART0000888', 'BUDGET', '740', 20.94),
('ART0000887', 'BUDGET', '1', 55.44),
('ART0000890', 'BUDGET', '200', 2.16),
('ART0000889', 'BUDGET', '270', 6.8),
('ART0000891', 'BUDGET', '1', 18.93),
('ART0000778', 'BUDGET', '18', 570.9199999999998),
('ART0001885', 'BUDGET', '550', 38.33),
('ART0001773', 'BUDGET', '400', 38.05),
('ART0001018', 'BUDGET', '5', 412.02),
('ART0004384', 'BUDGET', '110', 330),
('ART0000228', 'BUDGET', '3', 62.4),
('ART0000227', 'BUDGET', '1', 25.83),
('ART0000229', 'BUDGET', '1', 7.9),
('ART0004675', 'BUDGET', '225', 3.22),
('ART0001731', 'BUDGET', '21', 90),
('ART0004104', 'BUDGET', '116', 1651.2300000000005),
('ART0004015', 'BUDGET', '200', 52.29),
('ART0001770', 'BUDGET', '1', 148.05),
('ART0004363', 'BUDGET', '116', 826.57);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
