﻿--
-- Script was generated by Devart dbForge Studio 2020 for MySQL, Version 9.0.782.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 06.12.2021 20:40:15
-- Server version: 8.0.26
-- Client version: 4.1
--

-- 
-- Disable foreign keys
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set SQL mode
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

DROP DATABASE IF EXISTS bus_park;

CREATE DATABASE bus_park
CHARACTER SET utf8mb4
COLLATE utf8mb4_0900_ai_ci;

--
-- Set default database
--
USE bus_park;

--
-- Create table `dispatcher`
--
CREATE TABLE dispatcher (
  id_dispatcher int NOT NULL AUTO_INCREMENT,
  name varchar(20) NOT NULL,
  surname varchar(20) NOT NULL,
  PRIMARY KEY (id_dispatcher)
)
ENGINE = INNODB,
AUTO_INCREMENT = 6,
AVG_ROW_LENGTH = 3276,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_0900_ai_ci;

--
-- Create table `bus_flight`
--
CREATE TABLE bus_flight (
  id_flight int NOT NULL AUTO_INCREMENT,
  name_start_flight varchar(30) NOT NULL,
  name_end_flight varchar(30) NOT NULL,
  number_flight int NOT NULL,
  PRIMARY KEY (id_flight)
)
ENGINE = INNODB,
AUTO_INCREMENT = 7,
AVG_ROW_LENGTH = 2730,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_0900_ai_ci;

--
-- Create table `bus_driver`
--
CREATE TABLE bus_driver (
  id_driver int NOT NULL AUTO_INCREMENT,
  name_surname varchar(20) NOT NULL,
  work_experience int NOT NULL,
  kol_flight int DEFAULT NULL,
  driver_license varchar(30) NOT NULL,
  id_dispatcher int NOT NULL,
  id_flight int NOT NULL,
  PRIMARY KEY (id_driver)
)
ENGINE = INNODB,
AUTO_INCREMENT = 19,
AVG_ROW_LENGTH = 910,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_0900_ai_ci;

--
-- Create foreign key
--
ALTER TABLE bus_driver
ADD CONSTRAINT bus_driver_ibfk_1 FOREIGN KEY (id_dispatcher)
REFERENCES dispatcher (id_dispatcher);

--
-- Create foreign key
--
ALTER TABLE bus_driver
ADD CONSTRAINT bus_driver_ibfk_2 FOREIGN KEY (id_flight)
REFERENCES bus_flight (id_flight);

--
-- Create table `validator`
--
CREATE TABLE validator (
  id_validator int NOT NULL AUTO_INCREMENT,
  isActive enum ('да', 'нет') NOT NULL DEFAULT (_cp866 '¤ '),
  PRIMARY KEY (id_validator)
)
ENGINE = INNODB,
AUTO_INCREMENT = 28,
AVG_ROW_LENGTH = 606,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_0900_ai_ci;

--
-- Create table `passenger_insurance_company`
--
CREATE TABLE passenger_insurance_company (
  id_company int NOT NULL AUTO_INCREMENT,
  name_insurance_company varchar(20) NOT NULL,
  contract_number int NOT NULL,
  date_of_conclusion date NOT NULL,
  PRIMARY KEY (id_company)
)
ENGINE = INNODB,
AUTO_INCREMENT = 6,
AVG_ROW_LENGTH = 3276,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_0900_ai_ci;

--
-- Create table `advertising_on_the_bus`
--
CREATE TABLE advertising_on_the_bus (
  id_advertising int NOT NULL AUTO_INCREMENT,
  name_of_company varchar(30) NOT NULL,
  begin_advertising_period date NOT NULL,
  end_advertising_period date NOT NULL,
  PRIMARY KEY (id_advertising)
)
ENGINE = INNODB,
AUTO_INCREMENT = 7,
AVG_ROW_LENGTH = 2730,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_0900_ai_ci;

--
-- Create table `bus`
--
CREATE TABLE bus (
  id_bus int NOT NULL AUTO_INCREMENT,
  bus_number int NOT NULL,
  bus_name varchar(30) DEFAULT NULL,
  id_driver int NOT NULL,
  id_validator int NOT NULL,
  id_advertising int DEFAULT NULL,
  id_company int NOT NULL,
  PRIMARY KEY (id_bus, id_driver, id_validator, id_company)
)
ENGINE = INNODB,
AUTO_INCREMENT = 28,
AVG_ROW_LENGTH = 910,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_0900_ai_ci;

--
-- Create foreign key
--
ALTER TABLE bus
ADD CONSTRAINT bus_ibfk_1 FOREIGN KEY (id_driver)
REFERENCES bus_driver (id_driver);

--
-- Create foreign key
--
ALTER TABLE bus
ADD CONSTRAINT bus_ibfk_2 FOREIGN KEY (id_validator)
REFERENCES validator (id_validator);

--
-- Create foreign key
--
ALTER TABLE bus
ADD CONSTRAINT bus_ibfk_3 FOREIGN KEY (id_advertising)
REFERENCES advertising_on_the_bus (id_advertising);

--
-- Create foreign key
--
ALTER TABLE bus
ADD CONSTRAINT bus_ibfk_4 FOREIGN KEY (id_company)
REFERENCES passenger_insurance_company (id_company);

-- 
-- Dumping data for table dispatcher
--
INSERT INTO dispatcher VALUES
(1, 'Татьяна', 'Петровна'),
(2, 'Алекса', 'Маршова'),
(3, 'Акакий', 'Персов'),
(4, 'Владислав', 'Чикатило'),
(5, 'Афанасья', 'Мармеладова');

-- 
-- Dumping data for table bus_flight
--
INSERT INTO bus_flight VALUES
(1, 'Медведково', 'Китай-город', 774),
(2, 'метро Некрасовка', 'Орехово', 321),
(3, 'Шляпково', 'Салатовка', 123),
(4, 'Арханельская улица', 'ДЕПО Кирзанов', 21),
(5, 'Широкая улица', 'улица Вернадского', 80),
(6, 'метро Юго-западная', 'метро Раменки', 664);

-- 
-- Dumping data for table validator
--
INSERT INTO validator VALUES
(1, 'да'),
(2, 'да'),
(3, 'нет'),
(4, 'да'),
(5, 'да'),
(6, 'да'),
(7, 'да'),
(8, 'да'),
(9, 'да'),
(10, 'да'),
(11, 'да'),
(12, 'да'),
(13, 'да'),
(14, 'да'),
(15, 'да'),
(16, 'нет'),
(17, 'да'),
(18, 'да'),
(19, 'нет'),
(20, 'да'),
(21, 'нет'),
(22, 'да'),
(23, 'да'),
(24, 'нет'),
(25, 'да'),
(26, 'да'),
(27, 'да');

-- 
-- Dumping data for table passenger_insurance_company
--
INSERT INTO passenger_insurance_company VALUES
(1, 'АО С2ОГАЗ', 221479, '2006-09-20'),
(2, 'АО СОГАЗ', 223231, '2006-09-20'),
(3, 'АО ВТБ', 313279, '2016-03-20'),
(4, 'БВБК Страхование', 9696432, '2001-02-20'),
(5, 'CберСтрахование', 228322, '2020-01-20');

-- 
-- Dumping data for table bus_driver
--
INSERT INTO bus_driver VALUES
(1, 'Платон Крышесносов', 15, 234, 'AA10230D', 1, 2),
(2, 'Алишер Белозубов', 2, 234, 'AB2340A', 3, 1),
(3, 'Мария Блаженая', 10, NULL, 'AA15292H', 5, 3),
(4, 'Златон Ибрагимов', 9, 234, 'B249955D', 3, 1),
(5, 'Марк Золорылов', 21, 234, 'A1439141D', 4, 4),
(6, 'Игорь Индюков', 4, 234, 'AA103203D', 4, 5),
(7, 'Михаил Мафиозов', 7, 234, 'AA4525G', 5, 6),
(8, 'Эсми Мирзалиева', 25, 234, 'AA10423DD', 1, 6),
(9, 'Зокир Джамшутов', 4, 234, 'AA10425W', 2, 2),
(10, 'Мишутка Алфертов', 30, 234, 'A4141D', 1, 2),
(11, 'Али Белокуров', 6, 234, 'B7474', 3, 1),
(12, 'Мар Блаженая', 10, NULL, 'AA15192H', 5, 3),
(13, 'Злат ЗАбрагимов', 10, NULL, 'B219955D', 3, 1),
(14, 'Марк рылов', 21, 234, 'A1439741D', 4, 4),
(15, 'Игорь Индюк', 4, 234, 'AA109203D', 4, 5),
(16, 'Евгений Павлов', 7, 234, 'AA43525G', 5, 6),
(17, 'Эсвоьд Мирзалиев', 25, 234, 'A150423DD', 1, 6),
(18, 'Оскар Джамшутов', 5, 234, 'AA10485W', 2, 2);

-- 
-- Dumping data for table advertising_on_the_bus
--
INSERT INTO advertising_on_the_bus VALUES
(1, 'МТС', '2003-02-20', '2003-02-20'),
(2, 'Cбербанк', '2012-01-20', '2012-02-20'),
(3, 'ВафляShop', '2003-02-20', '2003-03-20'),
(4, 'ShocoShop', '2003-10-20', '2006-12-20'),
(5, 'ShipBorard', '2008-09-20', '2003-02-20'),
(6, 'MagomedShop', '2003-02-20', '2010-06-20');

-- 
-- Dumping data for table bus
--
INSERT INTO bus VALUES
(1, 772, 'Электробус', 1, 1, 4, 2),
(3, 772, 'Обычный автобус', 2, 2, 3, 1),
(4, 772, 'Электробус', 3, 3, 6, 2),
(5, 772, 'Электробус', 4, 4, 6, 3),
(6, 72, 'Электробус', 5, 5, 5, 5),
(7, 1, 'Обычный автобус', 6, 6, 5, 1),
(8, 3, 'Электробус', 7, 7, 2, 3),
(9, 10, 'Обычный автоьус', 8, 8, 1, 2),
(10, 553, 'Электробус', 9, 9, 4, 5),
(11, 1, 'Обычный автобус', 2, 2, 3, 1),
(20, 456, 'Обычный автобус', 6, 10, 3, 1),
(21, 966, 'Электробус', 9, 11, 5, 5),
(22, 453, 'Обычный автобус', 9, 6, 5, 1),
(23, 353, 'Электробус', 1, 13, 2, 3),
(24, 105, 'Обычный автоьус', 14, 8, 1, 2),
(25, 553, 'Электробус', 3, 16, 4, 5),
(26, 666, 'Электробус', 6, 18, 6, 2),
(27, 78, 'Электробус', 7, 4, 6, 3);

-- 
-- Restore previous SQL mode
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;