-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 03 2023 г., 19:59
-- Версия сервера: 10.4.19-MariaDB
-- Версия PHP: 7.4.27

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
  `idauto` int(11) NOT NULL,
  `number` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `VIN` varchar(17) COLLATE utf8_bin DEFAULT NULL,
  `model` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `mileage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `auto`
--

INSERT INTO `auto` (`idauto`, `number`, `VIN`, `model`, `year`, `mileage`) VALUES
(1, 'О343ВА39', '11111111111111111', 'Lada Kalina', 2009, 140000),
(2, 'Р738АП39', '22222222222222222', 'Kia Rio', 2017, 40000),
(5, 'А333АА39', '33333334333333333', 'BMW X5M', 2021, 1000000);

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `idclient` int(11) NOT NULL,
  `client` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`idclient`, `client`, `phone`) VALUES
(1, 'Сергеев ИВ', '833234'),
(2, 'Петров ВА', '334411');

-- --------------------------------------------------------

--
-- Структура таблицы `login_users`
--

CREATE TABLE `login_users` (
  `id_l` int(11) NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `login_users`
--

INSERT INTO `login_users` (`id_l`, `login`, `password`) VALUES
(1, 'admin1', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `orderclient`
--

CREATE TABLE `orderclient` (
  `idorderclient` int(11) NOT NULL,
  `dateorder` date DEFAULT NULL,
  `idstatus` int(11) NOT NULL,
  `termorder` date DEFAULT NULL,
  `idworker` int(11) NOT NULL,
  `idauto` int(11) NOT NULL,
  `idclient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `orderclient`
--

INSERT INTO `orderclient` (`idorderclient`, `dateorder`, `idstatus`, `termorder`, `idworker`, `idauto`, `idclient`) VALUES
(1, '2022-09-12', 1, '2022-09-14', 1, 2, 1),
(2, '2022-09-05', 3, '2022-09-13', 2, 1, 2),
(5, '2022-09-13', 2, '2022-09-13', 1, 2, 2),
(6, '2022-10-22', 3, '2022-11-06', 2, 5, 2),
(10, '2023-01-10', 3, '2023-01-15', 1, 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `service`
--

CREATE TABLE `service` (
  `idservice` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `service` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `idserviceorder` int(11) NOT NULL,
  `idorderclient` int(11) NOT NULL,
  `idservice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `serviceorder`
--

INSERT INTO `serviceorder` (`idserviceorder`, `idorderclient`, `idservice`) VALUES
(1, 1, 2),
(2, 1, 59),
(3, 2, 1),
(5, 2, 2),
(6, 6, 19),
(9, 10, 39),
(10, 10, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `servicetype`
--

CREATE TABLE `servicetype` (
  `id_type` int(11) NOT NULL,
  `type` varchar(130) COLLATE utf8mb4_unicode_ci NOT NULL
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
(15, 'проверка333');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `idstatus` int(11) NOT NULL,
  `status` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `idworker` int(11) NOT NULL,
  `worker` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `worker`
--

INSERT INTO `worker` (`idworker`, `worker`, `phone`) VALUES
(1, 'Макаров ВА', '334411'),
(2, 'Селезнев ВА', '341123');

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
  MODIFY `idauto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `idclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `login_users`
--
ALTER TABLE `login_users`
  MODIFY `id_l` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `orderclient`
--
ALTER TABLE `orderclient`
  MODIFY `idorderclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `service`
--
ALTER TABLE `service`
  MODIFY `idservice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT для таблицы `serviceorder`
--
ALTER TABLE `serviceorder`
  MODIFY `idserviceorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `servicetype`
--
ALTER TABLE `servicetype`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `idstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `worker`
--
ALTER TABLE `worker`
  MODIFY `idworker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
