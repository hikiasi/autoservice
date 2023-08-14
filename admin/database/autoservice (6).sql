-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 15 2023 г., 02:19
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `autoservice`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auto`
--

CREATE TABLE `auto` (
  `idauto` int NOT NULL,
  `number` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `VIN` varchar(17) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `model` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `year` int DEFAULT NULL,
  `mileage` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Дамп данных таблицы `auto`
--

INSERT INTO `auto` (`idauto`, `number`, `VIN`, `model`, `year`, `mileage`) VALUES
(1, 'О343ВА39', '11111111111111111', 'Lada Kalina', 2009, 140000),
(2, 'Р738АП39', '22222222222222222', 'Kia Rio', 2017, 40000),
(5, 'А333АА39', '33333334333333333', 'BMW X5M', 2021, 1000000),
(6, 'М755РХ777', 'UN2MV733022970745', 'Hyundai Elantra', 2002, 132569),
(8, 'О003ОС48', 'XA5SV344566052722', 'Focus Active', 2018, 48102),
(9, 'У947ВТ24', 'TE7MY595850116000', 'Chery Tiggo 4', 2017, 59372),
(10, 'У696СЕ57', 'PS4RB871150822798', 'Geely Coolray', 2019, 25099),
(11, 'К101ВЕ80', 'FU6ZW042695046832', 'Audi A5', 2016, 69217),
(12, 'Н394УР65', 'EL0GP083265370894', 'Infiniti EX', 2008, 361933),
(13, 'Т088АВ84', 'YY3AF354355461403', 'Ford C-Max', 2015, 51879),
(14, 'Н777НН92', 'DV6YF619531095164', 'Chevrolet Corvette', 2017, 60099),
(15, 'Е555ЕЕ39', 'ME0NU284670648530', 'BMW X7', 2022, 33796),
(16, 'М893ОО50', 'ED9ND677415385743', 'BMW M5', 2000, 89881),
(17, 'Н370ВС79', 'WA9SY216020085991', 'Volvo XC40', 2020, 23733),
(18, 'Т300СЕ70', 'UY1VT408546006512', 'Ford Focus', 2000, 374137),
(19, 'Х187ХХ46', 'GU7TL003570655021', 'BMW X4', 2017, 98674),
(20, 'М441ММ92', 'ED1TP858161998659', 'Honda Civic', 2019, 36826);

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `idclient` int NOT NULL,
  `client` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `phone` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`idclient`, `client`, `phone`) VALUES
(1, 'Сергеев Игнатий Вячеславович', '+79054643874'),
(2, 'Петров Вячеслав Артемович', '334411'),
(7, 'Пончиков Герасим Семенович', '+79729838694'),
(8, 'Дементьев Павел Кириллович', '+79834701370'),
(9, 'Пшеничников Давид Захарович', '+79838781822'),
(10, 'Бичурин Яков Серафимович', '+79844419122'),
(11, 'Авдошкин Василий Степанович', '+79511451375'),
(12, 'Жданов Филипп Макарович', '+79354468224'),
(13, 'Корсаков Илья Никандрович', '+79416723690'),
(14, 'Андреев Аркадий Тимофеевич', '+79642595112'),
(15, 'Янков Яков Константинович', '+79381464324'),
(16, 'Свиридов Кузьма Егорович', '+79547965319'),
(17, 'Козаков Николай Германович', '+79798698629'),
(18, 'Энгельгардт Максим Витальевич', '+79198726041'),
(19, 'Качаев Михаил Савванович', '+79743316392'),
(20, 'Кобяков Петр Тимофеевич', '+79293594343'),
(21, 'Выгузов Иван Давидович', '+79198866999'),
(22, 'Мирнов Василий Романович', '+79634486864'),
(23, 'Увакин Тарас Александрович', '+79484396872'),
(24, 'Коломийцев Петр Аркадинович', '+79582465817'),
(25, 'Захаров Арсений Никитович', '+79306386477'),
(26, 'Акакий Петров Иванович', '+79999999999');

-- --------------------------------------------------------

--
-- Структура таблицы `login_users`
--

CREATE TABLE `login_users` (
  `id_l` int NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `job_pos` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `login_users`
--

INSERT INTO `login_users` (`id_l`, `login`, `password`, `job_pos`) VALUES
(1, 'admin1', 'admin', 'Администратор'),
(2, 'user1', 'user1', 'Механик');

-- --------------------------------------------------------

--
-- Структура таблицы `orderclient`
--

CREATE TABLE `orderclient` (
  `idorderclient` int NOT NULL,
  `dateorder` date DEFAULT NULL,
  `idstatus` int NOT NULL,
  `termorder` date DEFAULT NULL,
  `idworker` int NOT NULL,
  `idauto` int NOT NULL,
  `idclient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Дамп данных таблицы `orderclient`
--

INSERT INTO `orderclient` (`idorderclient`, `dateorder`, `idstatus`, `termorder`, `idworker`, `idauto`, `idclient`) VALUES
(1, '2022-10-22', 3, '2022-11-06', 2, 5, 2),
(2, '2023-01-10', 3, '2023-01-15', 1, 5, 1),
(3, '2023-02-12', 1, '2023-09-15', 6, 2, 7),
(4, '2023-04-24', 3, '2023-06-08', 5, 1, 2),
(5, '2023-02-12', 3, '2023-02-12', 2, 5, 1),
(6, '2023-02-15', 3, '2023-02-12', 1, 1, 7),
(7, '2023-02-15', 2, '2023-04-10', 1, 2, 1),
(18, '2022-02-12', 3, '2022-02-10', 5, 1, 2),
(19, '2023-02-01', 3, '2023-02-03', 6, 6, 7),
(20, '2023-05-20', 3, '2023-05-21', 6, 6, 7),
(21, '2022-01-15', 2, '2022-02-15', 6, 9, 10),
(22, '2022-02-05', 3, '2022-03-05', 2, 8, 7),
(23, '2022-03-10', 3, '2022-04-10', 5, 10, 9),
(24, '2022-04-20', 1, '2022-05-20', 6, 9, 2),
(25, '2022-05-12', 2, '2022-06-12', 5, 10, 8),
(26, '2022-06-25', 3, '2022-07-25', 2, 6, 25),
(27, '2022-07-08', 3, '2022-08-08', 6, 9, 10),
(28, '2022-08-19', 1, '2022-09-19', 5, 6, 9),
(29, '2022-09-30', 2, '2022-10-30', 2, 9, 8),
(30, '2022-10-14', 3, '2022-11-14', 6, 8, 10),
(31, '2022-11-23', 4, '2022-12-23', 2, 9, 7),
(32, '2022-12-07', 1, '2023-01-07', 5, 10, 8),
(33, '2023-01-17', 2, '2023-02-17', 6, 8, 9),
(34, '2023-02-28', 3, '2023-03-28', 5, 9, 10),
(35, '2023-03-12', 4, '2023-04-12', 2, 10, 7),
(36, '2023-04-25', 1, '2023-05-25', 6, 8, 25),
(37, '2023-05-06', 2, '2023-06-06', 5, 9, 10),
(38, '2023-06-19', 3, '2023-07-19', 2, 10, 8),
(39, '2023-06-29', 4, '2023-07-29', 6, 8, 9),
(40, '2023-07-10', 3, '2023-08-10', 5, 10, 7),
(41, '2023-06-09', 3, '2023-06-09', 6, 11, 26);

-- --------------------------------------------------------

--
-- Структура таблицы `service`
--

CREATE TABLE `service` (
  `idservice` int NOT NULL,
  `id_type` int NOT NULL,
  `service` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `cost` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Дамп данных таблицы `service`
--

INSERT INTO `service` (`idservice`, `id_type`, `service`, `cost`) VALUES
(1, 1, 'Замена сцепления МКПП', 3500),
(2, 1, 'Замена МКПП', 3500),
(4, 1, 'Снятие/установка МКПП ', 4000),
(5, 1, 'Капитальный ремонт МКПП', 8000),
(6, 1, 'Замена масла МКПП', 800),
(7, 1, 'Замена сальника МКПП', 5000),
(8, 1, 'Замена ручки МКПП', 2000),
(9, 1, 'Замена тросов МКПП', 1000),
(10, 1, 'Замена ШРУС наружный', 1600),
(11, 1, 'Замена ШРУС внутренний', 2500),
(12, 1, 'Замена масла в муфте Халдекс', 1500),
(13, 1, 'Замена масла в редукторе заднего моста', 800),
(14, 1, 'Замена масла в редукторе переднего моста', 800),
(15, 1, 'Замена масла в раздаточной коробке передач', 800),
(16, 1, 'Замена масла в КПП/CTV вариаторного типа', 1800),
(17, 1, 'Замена масла в АКПП', 1800),
(18, 1, 'Замена АКПП /CTV', 9000),
(19, 1, 'Ремонт АКПП', 8000),
(20, 2, 'Ремонт рулевого управления', 2000),
(21, 2, 'Замена рулевой тяги', 1000),
(22, 2, 'Замена жидкости ГУР', 500),
(23, 2, 'Ремонт рулевой рейки', 5000),
(24, 2, 'Замена рулевой рейки', 3000),
(25, 2, 'Замена насоса ГУР', 1000),
(26, 2, 'Ремонт насоса ГУР', 1000),
(27, 3, 'Ремонт подвески', 500),
(28, 3, 'Диагностика подвески', 500),
(29, 3, 'Замена заднего амортизатора', 1200),
(30, 3, 'Замена переднего амортизатора', 1200),
(31, 3, 'Замена ступицы', 1000),
(32, 3, 'Замена шаровой', 1000),
(33, 3, 'Замена стоек стабилизатора', 600),
(34, 3, 'Замена сайлентблоков', 1000),
(35, 3, 'Замена полуоси', 1000),
(36, 3, 'Шприцевание точек смазки ходовой части и карданного вала', 800),
(37, 3, 'Замена масла в раздаточной коробке передач', 800),
(38, 3, 'Замена крестовины карданного вала', 800),
(39, 3, 'Замена карданного вала', 1200),
(40, 4, 'Ремонт тормозной системы', 1000),
(41, 4, 'Замена передних колодок', 1100),
(42, 4, 'Замена задних колодок', 1100),
(43, 4, 'Замена передних дисков', 1200),
(44, 4, 'Замена задних дисков', 1200),
(45, 4, 'Прокачка тормозной системы', 1000),
(46, 4, 'Замена тормозной жидкости', 1000),
(47, 4, 'Ремонт и обслуживание суппортов', 800),
(48, 5, 'Замена бензонасоса', 1500),
(49, 5, 'Проверка топливной системы', 600),
(50, 5, 'Проверка топливных форсунок на стенде', 2500),
(51, 5, 'Промывка инжекторов без с/у форсунок', 1800),
(52, 5, 'Замена уплотнителя топливной форсунки', 2500),
(53, 6, 'Ремонт автокондиционера', 1000),
(54, 6, 'Диагностика автокондиционера', 1000),
(55, 6, 'Антибактериальная обработка системы кондиционирования', 1200),
(56, 6, 'Промывка системы А/С', 4500),
(57, 6, 'Заправка автокондиционера', 950),
(58, 6, 'Замена фильтра системы вентиляции салона', 450),
(59, 7, 'Ремонт двигателя', 35000),
(60, 7, 'Компьютерная диагностика ДВС', 800),
(61, 7, 'Проверка системы зажигания', 800),
(62, 7, 'Замена масла в ДВС', 600),
(63, 7, 'Замена воздушного фильтра ДВС', 300),
(64, 7, 'Замена свечей зажигания', 800),
(65, 7, 'Замена турбины в сборе', 6000),
(66, 7, 'Ремонт турбины', 3000),
(67, 7, 'Мойка радиаторов со снятием с автомобиля', 7000),
(68, 7, 'Мойка двигателя', 2000),
(69, 8, 'Ремонт выхлопной системы', 1000),
(70, 8, 'Замена катализатора', 2000),
(71, 8, 'Ремонт катализатора', 2000),
(72, 8, 'Ремонт глушителя', 2000),
(73, 8, 'Диагностика системы', 500),
(74, 8, 'Замена прокладок', 700),
(75, 9, 'Замена антифриза', 1000),
(76, 11, 'Замена радиатора', 2000),
(77, 12, 'Замена термостата двигателя', 1200),
(78, 13, 'Диагностика вентилятора охлаждения двигателя', 1000),
(79, 15, 'проверка услуги333', 200000);

-- --------------------------------------------------------

--
-- Структура таблицы `serviceorder`
--

CREATE TABLE `serviceorder` (
  `idserviceorder` int NOT NULL,
  `idorderclient` int NOT NULL,
  `idservice` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Дамп данных таблицы `serviceorder`
--

INSERT INTO `serviceorder` (`idserviceorder`, `idorderclient`, `idservice`) VALUES
(1, 1, 56),
(2, 2, 39),
(3, 4, 9),
(12, 1, 5),
(13, 1, 39),
(14, 2, 49),
(15, 2, 59),
(16, 4, 25),
(17, 4, 4),
(19, 19, 10),
(21, 7, 35),
(22, 19, 53),
(23, 19, 42),
(24, 19, 68),
(25, 19, 76),
(30, 19, 2),
(31, 19, 37),
(32, 19, 62),
(33, 19, 65),
(34, 19, 74),
(35, 19, 39),
(36, 19, 53),
(37, 7, 5),
(38, 6, 6),
(39, 6, 79),
(41, 7, 6),
(42, 7, 78),
(43, 7, 60),
(44, 7, 35),
(45, 7, 23),
(46, 7, 72),
(47, 7, 66),
(48, 18, 4),
(49, 18, 34),
(50, 18, 31),
(51, 18, 70),
(52, 18, 32),
(53, 18, 11),
(54, 18, 25),
(55, 18, 59),
(56, 7, 2),
(57, 7, 27),
(58, 7, 45),
(59, 7, 71),
(60, 7, 74),
(61, 7, 66),
(62, 20, 1),
(63, 20, 2),
(64, 20, 4),
(65, 20, 6),
(66, 20, 20),
(67, 20, 41),
(68, 20, 42),
(69, 20, 46),
(70, 20, 45),
(71, 20, 65),
(72, 7, 54),
(73, 7, 32),
(74, 7, 62),
(75, 7, 14),
(76, 7, 71),
(77, 7, 25),
(78, 7, 46),
(79, 7, 39),
(80, 7, 58),
(81, 7, 67),
(82, 5, 17),
(83, 5, 63),
(87, 5, 28),
(89, 5, 51),
(90, 5, 65),
(91, 5, 78),
(122, 6, 40),
(123, 7, 54),
(124, 7, 32),
(125, 7, 62),
(126, 7, 14),
(127, 7, 71),
(128, 7, 25),
(129, 7, 46),
(130, 7, 39),
(131, 7, 58),
(132, 7, 67),
(133, 5, 17),
(134, 5, 63),
(135, 5, 36),
(136, 5, 41),
(137, 5, 74),
(138, 5, 28),
(139, 5, 49),
(142, 5, 78),
(143, 29, 44),
(144, 29, 23),
(145, 29, 53),
(146, 29, 6),
(147, 29, 37),
(148, 29, 48),
(149, 29, 59),
(150, 29, 75),
(151, 29, 79),
(152, 29, 12),
(173, 6, 40),
(174, 7, 54),
(175, 7, 32),
(176, 7, 62),
(177, 7, 14),
(178, 7, 71),
(179, 40, 25),
(180, 40, 46),
(181, 40, 39),
(182, 39, 58),
(183, 39, 67),
(184, 38, 17),
(185, 37, 63),
(186, 36, 36),
(187, 35, 41),
(188, 34, 74),
(189, 33, 28),
(190, 32, 49),
(191, 31, 51),
(192, 30, 65),
(193, 28, 78),
(194, 28, 44),
(195, 28, 23),
(196, 27, 53),
(197, 27, 6),
(198, 27, 37),
(199, 29, 48),
(200, 29, 59),
(201, 29, 75),
(202, 29, 79),
(203, 29, 12),
(204, 26, 29),
(205, 26, 72),
(206, 26, 16),
(207, 26, 57),
(208, 25, 21),
(209, 25, 38),
(210, 25, 45),
(211, 24, 76),
(212, 24, 11),
(213, 24, 70),
(214, 24, 13),
(215, 23, 66),
(216, 23, 35),
(217, 23, 56),
(218, 22, 20),
(219, 22, 42),
(220, 22, 68),
(221, 21, 77),
(222, 21, 30),
(223, 20, 19),
(224, 6, 40),
(225, 6, 26),
(226, 6, 18),
(227, 6, 60),
(228, 6, 73),
(229, 6, 24),
(230, 6, 47),
(231, 6, 10),
(232, 6, 69),
(233, 6, 15),
(234, 4, 33),
(235, 4, 64),
(236, 4, 22),
(237, 4, 50),
(238, 4, 9),
(240, 4, 55),
(242, 4, 43),
(245, 3, 23),
(246, 3, 53),
(247, 3, 6),
(248, 3, 37),
(250, 3, 59),
(252, 3, 79),
(258, 2, 21),
(262, 2, 11),
(264, 18, 13),
(265, 19, 66),
(266, 18, 35),
(267, 18, 56),
(268, 18, 20),
(269, 18, 42),
(270, 19, 68),
(271, 19, 77),
(272, 19, 30),
(273, 19, 19),
(274, 40, 6),
(275, 40, 36),
(276, 40, 72),
(277, 40, 76),
(278, 40, 75),
(279, 40, 74),
(280, 41, 2),
(281, 41, 4),
(282, 41, 5),
(283, 41, 7),
(284, 41, 11),
(286, 41, 78),
(287, 41, 76),
(288, 41, 73),
(289, 41, 72),
(290, 41, 27),
(291, 41, 34),
(292, 41, 56),
(293, 40, 49),
(294, 40, 54),
(295, 40, 78),
(296, 40, 75),
(297, 40, 76),
(298, 41, 78),
(299, 41, 32),
(300, 41, 34),
(301, 41, 39),
(302, 41, 46),
(303, 41, 53),
(304, 41, 79),
(305, 41, 59),
(306, 41, 62),
(307, 41, 74),
(308, 41, 77),
(309, 41, 2),
(310, 41, 41),
(311, 41, 68),
(312, 41, 48),
(313, 40, 12),
(314, 40, 17);

-- --------------------------------------------------------

--
-- Структура таблицы `servicetype`
--

CREATE TABLE `servicetype` (
  `id_type` int NOT NULL,
  `type` varchar(130) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `servicetype`
--

INSERT INTO `servicetype` (`id_type`, `type`) VALUES
(1, 'Ремонт трансмиссии'),
(2, 'Ремонт рулевого управления'),
(3, 'Ремонт подвески'),
(4, 'Ремонт тормозной системы'),
(5, 'Ремонт топливной системы'),
(6, 'Ремонт авто кондиционеров'),
(7, 'Ремонт двигателей'),
(8, 'Ремонт выхлопной системы'),
(9, 'Замена антифриза'),
(10, 'Опрессовка системы охлаждения'),
(11, 'Замена радиатора охлаждения'),
(12, 'Замена термостата двигателя'),
(13, 'Диагностика вентилятора охлаждения двигателя'),
(14, 'Ремонт системы охлаждения'),
(15, 'проверка3334444'),
(19, 'проверка4444');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `idstatus` int NOT NULL,
  `status` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`idstatus`, `status`) VALUES
(1, 'Новый'),
(2, 'В работе'),
(3, 'Завершен'),
(4, 'Отменен');

-- --------------------------------------------------------

--
-- Структура таблицы `worker`
--

CREATE TABLE `worker` (
  `idworker` int NOT NULL,
  `worker` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `phone` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Дамп данных таблицы `worker`
--

INSERT INTO `worker` (`idworker`, `worker`, `phone`) VALUES
(1, 'Макаров ВА', '334411'),
(2, 'Селезнев ВА', '341123'),
(5, 'Шмагин Е.А.', '+79816639150'),
(6, 'Дуванов В.В.', '+79427027014');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`idauto`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idclient`);

--
-- Индексы таблицы `login_users`
--
ALTER TABLE `login_users`
  ADD PRIMARY KEY (`id_l`);

--
-- Индексы таблицы `orderclient`
--
ALTER TABLE `orderclient`
  ADD PRIMARY KEY (`idorderclient`),
  ADD KEY `idstatus` (`idstatus`),
  ADD KEY `idworker` (`idworker`),
  ADD KEY `idauto` (`idauto`),
  ADD KEY `idclient` (`idclient`);

--
-- Индексы таблицы `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idservice`),
  ADD KEY `id_type` (`id_type`);

--
-- Индексы таблицы `serviceorder`
--
ALTER TABLE `serviceorder`
  ADD PRIMARY KEY (`idserviceorder`),
  ADD KEY `idorderclient` (`idorderclient`),
  ADD KEY `idservice` (`idservice`);

--
-- Индексы таблицы `servicetype`
--
ALTER TABLE `servicetype`
  ADD PRIMARY KEY (`id_type`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idstatus`);

--
-- Индексы таблицы `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`idworker`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auto`
--
ALTER TABLE `auto`
  MODIFY `idauto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `idclient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `login_users`
--
ALTER TABLE `login_users`
  MODIFY `id_l` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orderclient`
--
ALTER TABLE `orderclient`
  MODIFY `idorderclient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `service`
--
ALTER TABLE `service`
  MODIFY `idservice` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT для таблицы `serviceorder`
--
ALTER TABLE `serviceorder`
  MODIFY `idserviceorder` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT для таблицы `servicetype`
--
ALTER TABLE `servicetype`
  MODIFY `id_type` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `idstatus` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `worker`
--
ALTER TABLE `worker`
  MODIFY `idworker` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orderclient`
--
ALTER TABLE `orderclient`
  ADD CONSTRAINT `orderclient_ibfk_1` FOREIGN KEY (`idstatus`) REFERENCES `status` (`idstatus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderclient_ibfk_2` FOREIGN KEY (`idworker`) REFERENCES `worker` (`idworker`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderclient_ibfk_3` FOREIGN KEY (`idauto`) REFERENCES `auto` (`idauto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderclient_ibfk_4` FOREIGN KEY (`idclient`) REFERENCES `client` (`idclient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `servicetype` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `serviceorder`
--
ALTER TABLE `serviceorder`
  ADD CONSTRAINT `serviceorder_ibfk_1` FOREIGN KEY (`idorderclient`) REFERENCES `orderclient` (`idorderclient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `serviceorder_ibfk_2` FOREIGN KEY (`idservice`) REFERENCES `service` (`idservice`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
