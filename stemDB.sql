-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.27 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for stem
DROP DATABASE IF EXISTS `stem`;
CREATE DATABASE IF NOT EXISTS `stem` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `stem`;


-- Dumping structure for table stem.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `username`, `password`) VALUES
	(3, 'admin', 'admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


-- Dumping structure for table stem.appointments
DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `instructor_id` int(11) NOT NULL DEFAULT '0',
  `student_id` int(11) NOT NULL DEFAULT '0',
  `course_code` int(11) NOT NULL DEFAULT '0',
  `a_date` date NOT NULL DEFAULT '0000-00-00',
  `from_hour` int(11) NOT NULL DEFAULT '0',
  `to_hour` varchar(11) NOT NULL,
  `from_min` int(11) NOT NULL DEFAULT '0',
  `to_min` int(11) NOT NULL DEFAULT '0',
  `from_period` varchar(2) NOT NULL DEFAULT '0',
  `to_period` varchar(2) NOT NULL DEFAULT '0',
  `purpose` varchar(500) NOT NULL DEFAULT '0',
  `status` varchar(50) DEFAULT 'app_req',
  `row_id` int(11) NOT NULL DEFAULT '0',
  `status1` varchar(50) NOT NULL DEFAULT 'fixed',
  PRIMARY KEY (`instructor_id`,`student_id`,`course_code`,`a_date`,`from_hour`,`to_hour`,`from_period`,`to_period`,`row_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stem.appointments: ~1 rows (approximately)
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` (`instructor_id`, `student_id`, `course_code`, `a_date`, `from_hour`, `to_hour`, `from_min`, `to_min`, `from_period`, `to_period`, `purpose`, `status`, `row_id`, `status1`) VALUES
	(8, 9, 1, '2015-12-21', 7, '8', 0, 0, 'AM', 'AM', '12345', 'app_fixed', 19, 'fixed'),
	(8, 9, 1, '2015-12-21', 8, '9', 0, 0, 'AM', 'AM', 'abcd', 'app_fixed', 18, 'fixed'),
	(8, 9, 1, '2015-12-27', 1, '2', 0, 0, 'PM', 'PM', '67890', 'block', 20, 'fixed'),
	(8, 12, 1, '2015-12-21', 8, '9', 0, 0, 'AM', 'AM', 'abcdddddddddddddddd', 'app_fixed', 18, 'fixed');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;


-- Dumping structure for table stem.complaint
DROP TABLE IF EXISTS `complaint`;
CREATE TABLE IF NOT EXISTS `complaint` (
  `complaint_id` int(11) NOT NULL AUTO_INCREMENT,
  `emailid` varchar(50) NOT NULL DEFAULT '0',
  `subject_name` varchar(50) DEFAULT NULL,
  `tutor_name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `reply` varchar(50) DEFAULT NULL,
  `replied_by` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  KEY `complaint_id` (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stem.complaint: ~0 rows (approximately)
/*!40000 ALTER TABLE `complaint` DISABLE KEYS */;
/*!40000 ALTER TABLE `complaint` ENABLE KEYS */;


-- Dumping structure for table stem.contact
DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.contact: ~1 rows (approximately)
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` (`contact_id`, `customer_name`, `email`, `phone`, `subject`, `description`, `status`) VALUES
	(1, 'nukesh chanti', 'ramesh535kumarb@gmail.com', 9505720080, 'hi', 'how are you', 'pending');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;


-- Dumping structure for table stem.courses_experience
DROP TABLE IF EXISTS `courses_experience`;
CREATE TABLE IF NOT EXISTS `courses_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) NOT NULL DEFAULT '0',
  `course_id` int(11) NOT NULL DEFAULT '0',
  `expertize` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.courses_experience: ~13 rows (approximately)
/*!40000 ALTER TABLE `courses_experience` DISABLE KEYS */;
INSERT INTO `courses_experience` (`id`, `tutor_id`, `course_id`, `expertize`) VALUES
	(1, 1, 1, 'OK'),
	(2, 1, 2, 'OK'),
	(3, 1, 3, 'OK'),
	(4, 2, 1, 'OK'),
	(5, 2, 2, 'OK'),
	(6, 3, 1, 'OK'),
	(7, 4, 1, 'OK'),
	(8, 4, 2, 'OK'),
	(9, 6, 2, 'OK'),
	(10, 7, 1, 'OK'),
	(11, 7, 2, 'OK'),
	(12, 8, 1, 'OK'),
	(13, 8, 2, 'OK');
/*!40000 ALTER TABLE `courses_experience` ENABLE KEYS */;


-- Dumping structure for table stem.course_notifications
DROP TABLE IF EXISTS `course_notifications`;
CREATE TABLE IF NOT EXISTS `course_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_type` varchar(50) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stem.course_notifications: ~0 rows (approximately)
/*!40000 ALTER TABLE `course_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_notifications` ENABLE KEYS */;


-- Dumping structure for table stem.departments
DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(100) DEFAULT NULL,
  `dept_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dept_name` (`dept_name`),
  UNIQUE KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.departments: ~3 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `dept_name`, `dept_id`) VALUES
	(1, 'CSE', '100'),
	(2, 'IT', '101'),
	(3, 'ECE', '102');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;


-- Dumping structure for table stem.excel_date
DROP TABLE IF EXISTS `excel_date`;
CREATE TABLE IF NOT EXISTS `excel_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Year` int(11) DEFAULT NULL,
  `Term` varchar(50) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL,
  `Section` int(11) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `InstructorID` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stem.excel_date: ~0 rows (approximately)
/*!40000 ALTER TABLE `excel_date` DISABLE KEYS */;
/*!40000 ALTER TABLE `excel_date` ENABLE KEYS */;


-- Dumping structure for table stem.schedule
DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_col` date NOT NULL DEFAULT '0000-00-00',
  `week_day` varchar(10) NOT NULL DEFAULT '0',
  `fhour` int(11) NOT NULL DEFAULT '0',
  `fminutes` int(11) NOT NULL DEFAULT '0',
  `fperiod` char(2) NOT NULL DEFAULT '0',
  `thour` int(11) NOT NULL DEFAULT '0',
  `tminutes` int(11) NOT NULL DEFAULT '0',
  `tperiod` char(2) NOT NULL DEFAULT '0',
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.schedule: ~5 rows (approximately)
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` (`id`, `date_col`, `week_day`, `fhour`, `fminutes`, `fperiod`, `thour`, `tminutes`, `tperiod`, `status`) VALUES
	(133, '2015-12-20', 'Sunday', 9, 0, 'AM', 10, 0, 'AM', NULL),
	(134, '2015-12-20', 'Sunday', 10, 0, 'AM', 11, 0, 'AM', NULL),
	(135, '2015-12-21', 'Monday', 8, 0, 'AM', 9, 0, 'AM', NULL),
	(136, '2015-12-21', 'Monday', 9, 0, 'AM', 10, 0, 'AM', NULL),
	(137, '2015-12-27', 'Sunday', 7, 0, 'AM', 8, 0, 'AM', NULL),
	(138, '2015-12-21', 'Monday', 7, 0, 'AM', 8, 0, 'AM', NULL),
	(139, '2015-12-27', 'Sunday', 1, 0, 'PM', 2, 0, 'PM', NULL);
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;


-- Dumping structure for table stem.student
DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_name` varchar(50) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Accept',
  `major` varchar(50) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `stu_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `emailid` (`emailid`),
  UNIQUE KEY `stu_id` (`stu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.student: ~3 rows (approximately)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`student_id`, `student_name`, `emailid`, `password`, `status`, `major`, `year`, `term`, `stu_id`) VALUES
	(9, 'nukesh', 'nukesh.smts@gmail.com', '123', 'Accept', '101', 2014, 'FA', '1234'),
	(10, 'ram', 'ram@gmail.com', '111', 'Accept', '101', 2015, 'SP', '121'),
	(12, 'vinod', 'vinod.smts@gmail.com', '111', 'Accept', '101', 2015, 'SP', '2313');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;


-- Dumping structure for table stem.student_to_tutor
DROP TABLE IF EXISTS `student_to_tutor`;
CREATE TABLE IF NOT EXISTS `student_to_tutor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL DEFAULT '0',
  `courses_list` varchar(100) DEFAULT NULL,
  `phone_number` bigint(20) NOT NULL DEFAULT '0',
  `desp` varchar(1000) DEFAULT NULL,
  `working_hours` int(11) DEFAULT NULL,
  `working_days` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stem.student_to_tutor: ~0 rows (approximately)
/*!40000 ALTER TABLE `student_to_tutor` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_to_tutor` ENABLE KEYS */;


-- Dumping structure for table stem.stu_req_inconvenient_time
DROP TABLE IF EXISTS `stu_req_inconvenient_time`;
CREATE TABLE IF NOT EXISTS `stu_req_inconvenient_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `date_selected` date DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table stem.stu_req_inconvenient_time: ~0 rows (approximately)
/*!40000 ALTER TABLE `stu_req_inconvenient_time` DISABLE KEYS */;
/*!40000 ALTER TABLE `stu_req_inconvenient_time` ENABLE KEYS */;


-- Dumping structure for table stem.subject
DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(50) DEFAULT NULL,
  `course_id` varchar(50) DEFAULT NULL,
  `dept_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`subject_id`),
  UNIQUE KEY `subject_name` (`subject_name`,`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.subject: ~6 rows (approximately)
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` (`subject_id`, `subject_name`, `course_id`, `dept_id`) VALUES
	(1, 'CSE1', '1000', '100'),
	(2, 'CSE2', '1001', '100'),
	(3, 'IT1', '2000', '101'),
	(4, 'IT2', '2001', '101'),
	(5, 'ECE1', '3000', '102'),
	(6, 'ECE2', '4000', '102');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;


-- Dumping structure for table stem.tutor
DROP TABLE IF EXISTS `tutor`;
CREATE TABLE IF NOT EXISTS `tutor` (
  `tutor_id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_name` varchar(50) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `working_hours` int(11) DEFAULT NULL,
  `working_days` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `schedule_status` varchar(50) DEFAULT 'unschedule',
  PRIMARY KEY (`tutor_id`),
  UNIQUE KEY `emailid` (`emailid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.tutor: ~2 rows (approximately)
/*!40000 ALTER TABLE `tutor` DISABLE KEYS */;
INSERT INTO `tutor` (`tutor_id`, `tutor_name`, `emailid`, `password`, `phone_number`, `subject`, `working_hours`, `working_days`, `status`, `schedule_status`) VALUES
	(3, 'hemanth', 'hem.smts@gmail.com', '123', 9985966521, '1', 3, 'Monday,Tuesday,Wednesday', 'Accept', 'unschedule'),
	(8, 'Ramesh', 'ramesh535kumarb@gmail.com', '11', 9505720080, '1,2', 7, 'Monday,Tuesday', 'Accept', 'unschedule');
/*!40000 ALTER TABLE `tutor` ENABLE KEYS */;


-- Dumping structure for table stem.tutor_request
DROP TABLE IF EXISTS `tutor_request`;
CREATE TABLE IF NOT EXISTS `tutor_request` (
  `tutor_req_id` int(11) NOT NULL AUTO_INCREMENT,
  `tutorid` int(11) NOT NULL,
  `data` varchar(50) NOT NULL,
  `from_time` varchar(50) NOT NULL,
  `to_time` varchar(50) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(50) DEFAULT 'pending',
  PRIMARY KEY (`tutor_req_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.tutor_request: ~0 rows (approximately)
/*!40000 ALTER TABLE `tutor_request` DISABLE KEYS */;
INSERT INTO `tutor_request` (`tutor_req_id`, `tutorid`, `data`, `from_time`, `to_time`, `reason`, `description`, `status`) VALUES
	(1, 8, '2015-12-21', '07:00 AM', '08:00 AM', 'class cancellation', 'aaaaaabbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 'accept'),
	(2, 8, '2015-12-21', '08:00 AM', '09:00 AM', 'class cancellation', '123456', 'accept');
/*!40000 ALTER TABLE `tutor_request` ENABLE KEYS */;


-- Dumping structure for table stem.tutor_schedule2
DROP TABLE IF EXISTS `tutor_schedule2`;
CREATE TABLE IF NOT EXISTS `tutor_schedule2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date_day` date NOT NULL DEFAULT '0000-00-00',
  `week_day` varchar(50) DEFAULT NULL,
  `fhours` int(11) NOT NULL DEFAULT '0',
  `fminutes` int(11) NOT NULL DEFAULT '0',
  `fperiod` varchar(50) NOT NULL DEFAULT '0',
  `thours` int(11) DEFAULT '0',
  `tminutes` int(11) DEFAULT '0',
  `tperiod` varchar(50) DEFAULT '0',
  `status` varchar(50) DEFAULT 'Preferred',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table stem.tutor_schedule2: ~3 rows (approximately)
/*!40000 ALTER TABLE `tutor_schedule2` DISABLE KEYS */;
INSERT INTO `tutor_schedule2` (`id`, `tutor_id`, `student_id`, `date_day`, `week_day`, `fhours`, `fminutes`, `fperiod`, `thours`, `tminutes`, `tperiod`, `status`) VALUES
	(16, 8, NULL, '2015-12-20', 'Sunday', 9, 0, 'AM', 10, 0, 'AM', 'Preferred'),
	(17, 8, NULL, '2015-12-27', 'Sunday', 7, 0, 'AM', 8, 0, 'AM', 'Preferred'),
	(18, 8, NULL, '2015-12-21', 'Monday', 8, 0, 'AM', 9, 0, 'AM', 'cancelReq'),
	(19, 8, NULL, '2015-12-21', 'Monday', 7, 0, 'AM', 8, 0, 'AM', 'cancelReq'),
	(20, 8, NULL, '2015-12-27', 'Sunday', 1, 0, 'PM', 2, 0, 'PM', 'block');
/*!40000 ALTER TABLE `tutor_schedule2` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
