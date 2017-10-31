-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2017 at 10:55 PM
-- Server version: 5.6.36-82.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alexa846_projecttest`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`alexa846`@`localhost` PROCEDURE `CalcPayroll` (IN `emp` VARCHAR(255), INOUT `startDate` VARCHAR(255), INOUT `endDate` VARCHAR(255))  BEGIN
DECLARE hours DECIMAL(10,2);
DECLARE tempHours DECIMAL(10,2);
DECLARE calcPay DECIMAL(10,2);
DECLARE empWage DECIMAL(10,2);
DECLARE NotFound CONDITION FOR SQLSTATE '02000';
DECLARE c CURSOR FOR (SELECT hoursWorked FROM labor WHERE employee = emp AND date >= endDate
AND date <= endDate);
OPEN c;
SET hours = 0;
mainLoop: LOOP
FETCH c INTO tempHours;
IF NotFound THEN LEAVE mainLoop;
END IF;
SET hours = hours + tempHours;
END LOOP;
CLOSE c;
SET empWage = (select wage from employees where employees.ssn = emp);
SET calcPay = (empWage * hours);
INSERT INTO payroll(startDate, endDate, employee, pay) VALUES(startDate, endDate, emp, calcPay);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `duties`
--

CREATE TABLE `duties` (
  `dutyName` varchar(255) NOT NULL DEFAULT '',
  `employee` varchar(255) NOT NULL DEFAULT '',
  `datePerformed` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `wage` decimal(10,2) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `ssn` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`name`, `position`, `wage`, `age`, `salary`, `ssn`) VALUES
('Someone Person', 'Bad', '5.43', 293, 'No', '434-53-1849'),
('John Doe', 'Manager', '9.00', 34, 'No', '843-32-1293');

-- --------------------------------------------------------

--
-- Table structure for table `labor`
--

CREATE TABLE `labor` (
  `date` varchar(255) NOT NULL DEFAULT '',
  `employee` varchar(255) NOT NULL DEFAULT '',
  `hoursWorked` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `labor`
--

INSERT INTO `labor` (`date`, `employee`, `hoursWorked`) VALUES
('2007-12-31', '843-32-1293', '6.43');

-- --------------------------------------------------------

--
-- Stand-in structure for view `management`
-- (See below for the actual view)
--
CREATE TABLE `management` (
`ssn` varchar(255)
,`name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `startDate` varchar(255) NOT NULL DEFAULT '',
  `endDate` varchar(255) NOT NULL DEFAULT '',
  `employee` varchar(255) NOT NULL DEFAULT '',
  `pay` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `dateAndTime` varchar(255) NOT NULL DEFAULT '',
  `manager` varchar(255) DEFAULT NULL,
  `salesAmount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `type` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `costPerUnit` decimal(10,2) DEFAULT NULL,
  `currentStock` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`type`, `name`, `costPerUnit`, `currentStock`) VALUES
('Food', 'Waffle', '32.45', '1.00'),
('Produce', 'Broccoli', '3.43', '23443.00');

-- --------------------------------------------------------

--
-- Table structure for table `usedStock`
--

CREATE TABLE `usedStock` (
  `name` varchar(255) NOT NULL DEFAULT '',
  `amountUsed` decimal(10,2) DEFAULT NULL,
  `date` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usedStock`
--

INSERT INTO `usedStock` (`name`, `amountUsed`, `date`) VALUES
('Waffle', '2.00', '2007-12-31');

--
-- Triggers `usedStock`
--
DELIMITER $$
CREATE TRIGGER `stockAdj` AFTER INSERT ON `usedStock` FOR EACH ROW UPDATE stock
SET currentStock = (currentStock - new.amountUsed)
WHERE stock.name = new.name
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `management`
--
DROP TABLE IF EXISTS `management`;

CREATE ALGORITHM=UNDEFINED DEFINER=`alexa846`@`localhost` SQL SECURITY DEFINER VIEW `management`  AS  select `employees`.`ssn` AS `ssn`,`employees`.`name` AS `name` from `employees` where (`employees`.`position` = 'Manager') ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `duties`
--
ALTER TABLE `duties`
  ADD PRIMARY KEY (`dutyName`,`employee`,`datePerformed`),
  ADD KEY `employee` (`employee`),
  ADD KEY `datePerformed` (`datePerformed`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ssn`);

--
-- Indexes for table `labor`
--
ALTER TABLE `labor`
  ADD PRIMARY KEY (`date`,`employee`),
  ADD KEY `employee` (`employee`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`startDate`,`endDate`,`employee`),
  ADD KEY `employee` (`employee`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`dateAndTime`),
  ADD KEY `manager` (`manager`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`type`,`name`);

--
-- Indexes for table `usedStock`
--
ALTER TABLE `usedStock`
  ADD PRIMARY KEY (`date`,`name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `duties`
--
ALTER TABLE `duties`
  ADD CONSTRAINT `duties_ibfk_1` FOREIGN KEY (`employee`) REFERENCES `employees` (`ssn`),
  ADD CONSTRAINT `duties_ibfk_2` FOREIGN KEY (`datePerformed`) REFERENCES `shift` (`dateAndTime`);

--
-- Constraints for table `labor`
--
ALTER TABLE `labor`
  ADD CONSTRAINT `labor_ibfk_1` FOREIGN KEY (`date`) REFERENCES `shift` (`dateAndTime`),
  ADD CONSTRAINT `labor_ibfk_2` FOREIGN KEY (`employee`) REFERENCES `employees` (`ssn`);

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_ibfk_1` FOREIGN KEY (`employee`) REFERENCES `employees` (`ssn`);

--
-- Constraints for table `shift`
--
ALTER TABLE `shift`
  ADD CONSTRAINT `shift_ibfk_1` FOREIGN KEY (`manager`) REFERENCES `employees` (`ssn`);

--
-- Constraints for table `usedStock`
--
ALTER TABLE `usedStock`
  ADD CONSTRAINT `usedStock_ibfk_1` FOREIGN KEY (`date`) REFERENCES `shift` (`dateAndTime`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
