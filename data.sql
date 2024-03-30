-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for danhbadienthoai
CREATE DATABASE IF NOT EXISTS `danhbadienthoai` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `danhbadienthoai`;

-- Dumping structure for table danhbadienthoai.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `departmentid` int NOT NULL AUTO_INCREMENT,
  `departmentname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmentaddress` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmentemail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentdepartmentid` int DEFAULT NULL,
  PRIMARY KEY (`departmentid`),
  KEY `parentdepartmentid` (`parentdepartmentid`),
  CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`parentdepartmentid`) REFERENCES `departments` (`departmentid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table danhbadienthoai.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `employeeid` int NOT NULL AUTO_INCREMENT,
  `employeename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employeeaddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employeeemail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departmentid` int NOT NULL,
  PRIMARY KEY (`employeeid`),
  KEY `departmentid` (`departmentid`),
  CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`departmentid`) REFERENCES `departments` (`departmentid`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table danhbadienthoai.users
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userrole` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employeeid` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`),
  KEY `employeeid` (`employeeid`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`employeeid`) REFERENCES `employees` (`employeeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
