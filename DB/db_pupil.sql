-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 02:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pupil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_contact` varchar(11) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_password`) VALUES
(1, 'Neethu M Mathew', '9765432123', 'neethu123@gmail.com', 'Neethu123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assign`
--

CREATE TABLE `tbl_assign` (
  `assign_id` int(11) NOT NULL,
  `assign_date` varchar(20) NOT NULL,
  `faculty_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `semester_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_assign`
--

INSERT INTO `tbl_assign` (`assign_id`, `assign_date`, `faculty_id`, `subject_id`, `semester_id`) VALUES
(7, '2023-10-07', 5, 27, 1),
(8, '2023-10-07', 6, 31, 1),
(9, '2023-10-07', 7, 32, 1),
(10, '2023-10-07', 7, 36, 2),
(11, '2023-10-07', 5, 37, 2),
(12, '2023-10-07', 1, 38, 2),
(13, '2023-10-07', 7, 41, 3),
(14, '2023-10-07', 8, 43, 3),
(15, '2023-10-07', 1, 46, 3),
(16, '2023-10-07', 5, 44, 3),
(17, '2023-10-07', 9, 45, 3),
(18, '2023-10-07', 1, 47, 4),
(19, '2023-10-07', 9, 49, 4),
(20, '2023-10-07', 7, 50, 4),
(21, '2023-10-07', 8, 51, 4),
(22, '2023-10-07', 1, 24, 5),
(23, '2023-10-07', 9, 25, 5),
(24, '2023-10-07', 8, 53, 6),
(25, '2023-10-07', 9, 54, 6),
(26, '2023-10-07', 1, 55, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `attendance_id` int(11) NOT NULL,
  `attendance_date` varchar(20) NOT NULL,
  `attendance_hour` varchar(20) NOT NULL,
  `student_id` int(10) NOT NULL,
  `faculty_id` int(10) NOT NULL,
  `attendance_status` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`attendance_id`, `attendance_date`, `attendance_hour`, `student_id`, `faculty_id`, `attendance_status`) VALUES
(47, '2023-10-20', '1', 9, 1, '0'),
(48, '2023-10-20', '2', 9, 1, '0'),
(49, '2023-10-20', '3', 9, 1, '0'),
(50, '2023-10-20', '4', 9, 1, '0'),
(51, '2023-10-29', '1', 9, 1, '0'),
(52, '2023-10-29', '2', 9, 1, '0'),
(53, '2023-10-29', '3', 9, 1, '0'),
(54, '2023-10-29', '4', 9, 1, '0'),
(55, '2023-10-29', '5', 9, 1, '0'),
(56, '2023-10-29', '6', 9, 1, '0'),
(57, '2023-10-29', '1', 10, 1, '0'),
(58, '2023-10-29', '2', 10, 1, '0'),
(59, '2023-10-29', '3', 10, 1, '0'),
(60, '2023-10-29', '4', 10, 1, '0'),
(61, '2023-10-29', '1', 11, 1, '0'),
(62, '2023-10-29', '2', 11, 1, '0'),
(63, '2023-10-29', '5', 10, 1, '0'),
(64, '2023-10-29', '3', 11, 1, '0'),
(65, '2023-10-29', '4', 11, 1, '0'),
(66, '2023-10-29', '5', 11, 1, '0'),
(67, '2023-10-29', '6', 11, 1, '0'),
(68, '2023-10-29', '1', 12, 1, '0'),
(69, '2023-10-29', '2', 12, 1, '0'),
(70, '2023-10-29', '3', 12, 1, '0'),
(71, '2023-10-29', '4', 12, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`) VALUES
(6, 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'Ernankulam'),
(4, 'Idukki'),
(5, 'Malappuram'),
(6, 'Kannur'),
(7, 'Kasargode'),
(8, 'Kozhikode'),
(9, 'Wayanad'),
(10, 'Palakkad'),
(11, 'Thrissur'),
(12, 'Pathanamthitta'),
(13, 'Kollam'),
(14, 'Kottayam'),
(15, 'Alappuzha'),
(16, 'Trivandrum');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(30) NOT NULL,
  `faculty_contact` varchar(10) NOT NULL,
  `faculty_address` varchar(500) NOT NULL,
  `faculty_photo` varchar(300) NOT NULL,
  `faculty_proof` varchar(300) NOT NULL,
  `faculty_email` varchar(50) NOT NULL,
  `faculty_password` varchar(10) NOT NULL,
  `place_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`faculty_id`, `faculty_name`, `faculty_contact`, `faculty_address`, `faculty_photo`, `faculty_proof`, `faculty_email`, `faculty_password`, `place_id`) VALUES
(1, 'Priya PG', '9876543210', 'ymbc collage', 'Screenshot 2023-08-18 204020.png', 'Screenshot 2023-08-18 204347.png', 'priya123@gmail.com', 'Priya321', 1),
(5, 'Nimmy Abraham', '657787586', 'ymbc collage', 'Screenshot 2023-06-26 232643.png', 'Screenshot 2023-06-26 232643.png', 'nimmyabraham123@gmail.com', 'nimmy@123', 1),
(6, 'Rohini K P', '4646778217', 'Puthuppady', 'Screenshot 2023-06-26 232730.png', 'Screenshot 2023-06-26 232730.png', 'rohini123@gmail.com', 'rohini123', 1),
(7, 'Bindu', '9876543345', 'Puthuppady', 'Screenshot 2023-06-26 232643.png', 'Screenshot 2023-06-26 232643.png', 'bindu123@gmail.com', 'bindu123', 1),
(8, 'Eldho P', '9876543345', 'Puthuppady', 'Screenshot 2023-06-26 232753.png', 'Screenshot 2023-06-26 232643.png', 'eldho123@gmail.com', 'eldho123', 1),
(9, 'Nandhana ', '9876543345', 'Puthuppady', 'Screenshot 2023-06-26 232730.png', 'Screenshot 2023-06-26 232753.png', 'nandhana123@gmail.com', 'nandhana12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_date` varchar(20) NOT NULL,
  `feedback_title` varchar(100) NOT NULL,
  `feedback_content` varchar(500) NOT NULL,
  `feedback_status` int(20) NOT NULL DEFAULT 0,
  `student_id` int(10) NOT NULL,
  `feedback_reply` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_internalmark`
--

CREATE TABLE `tbl_internalmark` (
  `internalmark_id` int(11) NOT NULL,
  `internalmark_date` varchar(20) NOT NULL,
  `internalmark_mark` varchar(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_internalmark`
--

INSERT INTO `tbl_internalmark` (`internalmark_id`, `internalmark_date`, `internalmark_mark`, `subject_id`, `student_id`) VALUES
(4, '2023-10-11', '12', 38, 14),
(5, '2023-10-11', '15', 38, 15),
(6, '2023-10-11', '10', 38, 16),
(7, '2023-10-11', '13', 38, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_note`
--

CREATE TABLE `tbl_note` (
  `note_id` int(11) NOT NULL,
  `note_date` varchar(20) NOT NULL,
  `note_caption` varchar(50) NOT NULL,
  `note_file` varchar(50) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(1, 'Muvattupuzha', 1),
(2, 'kochi', 1),
(3, 'Vagamon', 4),
(4, 'Thodupuzha', 4),
(5, 'Moolamattom', 4),
(6, 'Manjeri', 5),
(7, 'Edappal', 5),
(8, 'Payyannur', 6),
(9, 'Thalassery', 6),
(10, 'Nileswaram', 7),
(12, 'Feroke', 8),
(13, 'Nadakkavu', 8),
(14, 'Mananthavady', 9),
(15, 'Kalpetta', 9),
(16, 'Patambi', 10),
(17, 'Ottapalam', 10),
(18, 'Ollur', 11),
(19, 'Kunnamkulam', 11),
(20, 'Adoor', 12),
(21, 'Kozhencherry', 12),
(22, 'Kottarakkara', 13),
(23, 'Punalur', 13),
(24, 'Pala', 14),
(25, 'Changanassery', 14),
(26, 'Kayamkulam', 15),
(27, 'Kuttanad', 15),
(28, 'Varkala', 16),
(29, 'Kaniyapuram', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`semester_id`, `semester_name`) VALUES
(1, 'First'),
(2, 'Second'),
(3, 'Third'),
(4, 'Fourth'),
(5, 'Fifth'),
(6, 'Sixth');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_contact` varchar(10) NOT NULL,
  `student_address` varchar(500) NOT NULL,
  `student_photo` varchar(300) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_password` varchar(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `place_id` int(10) NOT NULL,
  `student_admno` int(11) NOT NULL,
  `student_proof` varchar(300) NOT NULL,
  `student_year` varchar(10) NOT NULL,
  `semester_id` int(10) NOT NULL,
  `student_vstatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `student_name`, `student_contact`, `student_address`, `student_photo`, `student_email`, `student_password`, `course_id`, `place_id`, `student_admno`, `student_proof`, `student_year`, `semester_id`, `student_vstatus`) VALUES
(7, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-08-18 204347.png', 'anas123@gmail.com', 'Anas@123', 6, 7, 1006, '', '2021', 5, 1),
(8, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-08-18 204347.png', 'anas123@gmail.com', 'josey123', 6, 7, 1002, 'Screenshot 2023-08-18 204347.png', '2021', 5, 1),
(9, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-09-26 171059.png', 'anas123@gmail.com', 'Abhinav@12', 6, 12, 1007, 'Screenshot 2023-08-18 204347.png', '2021', 5, 1),
(10, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-08-10 214800.png', 'anas123@gmail.com', 'abin@123', 6, 20, 1008, 'Screenshot 2023-08-10 214800.png', '2021', 5, 1),
(11, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-08-18 204328.png', 'anas123@gmail.com', 'albin@123', 6, 20, 1009, 'Screenshot 2023-08-18 204328.png', '2021', 5, 1),
(12, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-09-23 133718.png', 'anas123@gmail.com', 'adib@123', 6, 19, 1010, 'Screenshot 2023-09-23 133718.png', '2021', 5, 1),
(13, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-09-26 171059.png', 'anas123@gmail.com', 'abhishek@1', 6, 7, 1011, 'Screenshot 2023-09-26 171059.png', '2021', 5, 2),
(14, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-09-26 171059.png', 'anas123@gmail.com', 'ameen@123', 6, 7, 1012, 'Screenshot 2023-09-26 171059.png', '2021', 5, 1),
(15, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-08-10 214800 - Copy.png', 'anas123@gmail.com', 'shiyan@123', 6, 6, 1013, 'Screenshot 2023-08-18 204347.png', '2021', 5, 1),
(16, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-08-18 204347.png', 'anas123@gmail.com', 'sinan@123', 6, 16, 1014, 'Screenshot 2023-08-18 204347.png', '2021', 5, 1),
(17, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-08-18 204347.png', 'anas123@gmail.com', 'dhanush@12', 6, 6, 1015, 'Screenshot 2023-08-18 204347.png', '2021', 5, 1),
(18, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-08-18 204328.png', 'anas123@gmail.com', 'aswin@123', 6, 6, 1016, 'Screenshot 2023-08-18 204328.png', '2021', 5, 1),
(19, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-09-23 133718.png', 'anas123@gmail.com', 'anurag@123', 6, 8, 1017, 'Screenshot 2023-09-23 133718.png', '2021', 5, 1),
(20, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-06-26 232643.png', 'anas123@gmail.com', 'annan@123', 6, 25, 1018, 'Screenshot 2023-06-26 232643.png', '2021', 5, 1),
(21, 'Muhammed Anas', '8646778217', 'edappal', 'wallpapersden.com_ultra-goku-cool-2020-minimal_3840x2160.jpg', 'anas123@gmail.com', 'joelj@123', 6, 24, 1019, 'wallpapersden.com_ultra-goku-cool-2020-minimal_3840x2160.jpg', '2021', 5, 2),
(22, 'Muhammed Anas', '8646778217', 'edappal', 'wallpapersden.com_ultra-goku-cool-2020-minimal_3840x2160.jpg', 'anas123@gmail.com', 'alvin@123', 6, 26, 1020, 'wallpapersden.com_ultra-goku-cool-2020-minimal_3840x2160.jpg', '2021', 5, 1),
(23, 'Muhammed Anas', '8646778217', 'edappal', 'wallpapersden.com_ultra-goku-cool-2020-minimal_3840x2160.jpg', 'anas123@gmail.com', 'latheef@12', 6, 7, 1021, 'wallpapersden.com_ultra-goku-cool-2020-minimal_3840x2160.jpg', '2021', 5, 2),
(24, 'Muhammed Anas', '8646778217', 'edappal', 'wallpapersden.com_ultra-goku-cool-2020-minimal_3840x2160.jpg', 'anas123@gmail.com', 'navneeth@1', 6, 6, 1022, 'wallpapersden.com_ultra-goku-cool-2020-minimal_3840x2160.jpg', '2021', 5, 1),
(25, 'Muhammed Anas', '8646778217', 'edappal', 'wallpapersden.com_ultra-goku-cool-2020-minimal_3840x2160.jpg', 'anas123@gmail.com', 'joelv@123', 6, 23, 1023, 'wallpapersden.com_ultra-goku-cool-2020-minimal_3840x2160.jpg', '2021', 5, 1),
(26, 'Muhammed Anas', '8646778217', 'edappal', 'wallpapersden.com_ultra-goku-cool-2020-minimal_3840x2160.jpg', 'anas123@gmail.com', 'fahad@123', 6, 7, 1024, 'wallpapersden.com_ultra-goku-cool-2020-minimal_3840x2160.jpg', '2021', 5, 1),
(27, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-06-26 232643.png', 'anas123@gmail.com', 'akthar@123', 6, 7, 1025, 'Screenshot 2023-06-26 232643.png', '2021', 5, 1),
(28, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-09-23 133718.png', 'anas123@gmail.com', 'sajas@123', 6, 7, 1026, 'Screenshot 2023-09-23 133718.png', '2021', 5, 1),
(29, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-08-18 204347.png', 'anas123@gmail.com', 'aman@123', 6, 7, 1027, 'Screenshot 2023-08-18 204347.png', '2021', 5, 1),
(30, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-08-18 204347.png', 'anas123@gmail.com', 'krish@123', 6, 15, 1028, 'Screenshot 2023-08-18 204347.png', '2021', 5, 1),
(31, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-08-18 204347.png', 'anas123@gmail.com', 'basil@123', 6, 14, 1029, 'Screenshot 2023-08-18 204347.png', '2021', 5, 2),
(32, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-09-23 133718.png', 'anas123@gmail.com', 'midhun@123', 6, 5, 1030, 'Screenshot 2023-09-23 133718.png', '2021', 5, 1),
(33, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-08-18 204328.png', 'anas123@gmail.com', 'adithya@12', 6, 16, 1032, 'Screenshot 2023-08-18 204328.png', '2021', 5, 1),
(34, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-08-10 214800.png', 'anas123@gmail.com', 'naveen@123', 6, 2, 1034, 'Screenshot 2023-08-10 214800.png', '2021', 5, 1),
(35, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-08-18 204347.png', 'anas123@gmail.com', 'sreyaz@123', 6, 7, 1035, 'Screenshot 2023-08-18 204347.png', '2021', 5, 1),
(36, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-08-18 204347.png', 'anas123@gmail.com', 'muflih@123', 6, 7, 1036, 'Screenshot 2023-08-18 204347.png', '2021', 5, 0),
(37, 'Muhammed Anas', '8646778217', 'edappal', 'Screenshot 2023-08-18 204328.png', 'anas123@gmail.com', 'safa@123', 6, 16, 1037, 'Screenshot 2023-08-18 204328.png', '2021', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(20) NOT NULL,
  `semester_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_name`, `semester_id`, `course_id`) VALUES
(31, 'STATISTICS', 1, 6),
(32, 'MATHS', 1, 6),
(33, 'ENGLISH', 1, 6),
(35, 'C-Language', 1, 6),
(36, 'MATHS', 2, 6),
(37, 'CPP', 2, 6),
(38, 'COA', 2, 6),
(39, 'DBMS', 2, 6),
(40, 'ENGLISH', 2, 6),
(41, 'ADV.STATISTICS', 3, 6),
(43, 'COMPUTER GRAPHICS', 3, 6),
(44, 'DATA STRUCTURE', 3, 6),
(45, 'OPERATING SYSTEM', 3, 6),
(46, 'MICRO PROCESSOR', 3, 6),
(47, 'LINUX', 4, 6),
(48, 'SA&SE', 4, 6),
(49, 'DAA', 4, 6),
(50, 'OR', 4, 6),
(51, 'PHP', 4, 6),
(52, 'IT', 5, 6),
(53, 'Web Technology', 6, 6),
(54, 'Software Engineering', 6, 6),
(55, 'Elective', 6, 6),
(56, 'CN', 5, 6),
(57, 'Java', 5, 6),
(58, 'Banking', 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timetable`
--

CREATE TABLE `tbl_timetable` (
  `timetable_id` int(11) NOT NULL,
  `timetable_day` varchar(100) NOT NULL,
  `timetable_hour` varchar(100) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_timetable`
--

INSERT INTO `tbl_timetable` (`timetable_id`, `timetable_day`, `timetable_hour`, `subject_id`, `semester_id`) VALUES
(14, 'Monday', '1', 31, 1),
(15, 'Tuesday', '2', 33, 1),
(16, 'Monday', '1', 52, 5),
(17, 'Monday', '2', 56, 5),
(18, 'Monday', '3', 58, 5),
(19, 'Monday', '4', 57, 5),
(20, 'Monday', '5', 57, 5),
(21, 'Tuesday', '1', 57, 5),
(22, 'Tuesday', '2', 56, 5),
(23, 'Tuesday', '3', 52, 5),
(24, 'Tuesday', '4', 57, 5),
(25, 'Tuesday', '5', 58, 5),
(26, 'Wednesday', '1', 52, 5),
(27, 'Wednesday', '2', 56, 5),
(28, 'Wednesday', '3', 57, 5),
(29, 'Wednesday', '4', 57, 5),
(30, 'Wednesday', '5', 58, 5),
(31, 'Thursday', '1', 56, 5),
(32, 'Thursday', '2', 56, 5),
(33, 'Thursday', '3', 58, 5),
(34, 'Thursday', '4', 57, 5),
(35, 'Thursday', '5', 57, 5),
(36, 'Friday', '1', 58, 5),
(37, 'Friday', '2', 56, 5),
(38, 'Friday', '3', 52, 5),
(39, 'Friday', '4', 56, 5),
(40, 'Friday', '5', 57, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_internalmark`
--
ALTER TABLE `tbl_internalmark`
  ADD PRIMARY KEY (`internalmark_id`);

--
-- Indexes for table `tbl_note`
--
ALTER TABLE `tbl_note`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_timetable`
--
ALTER TABLE `tbl_timetable`
  ADD PRIMARY KEY (`timetable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_internalmark`
--
ALTER TABLE `tbl_internalmark`
  MODIFY `internalmark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_note`
--
ALTER TABLE `tbl_note`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_timetable`
--
ALTER TABLE `tbl_timetable`
  MODIFY `timetable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
