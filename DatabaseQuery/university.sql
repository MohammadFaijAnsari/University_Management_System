-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 05:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `addmission_new`
--

CREATE TABLE `addmission_new` (
  `id` int(11) NOT NULL,
  `c_title` varchar(255) DEFAULT NULL,
  `c_desc` varchar(255) DEFAULT NULL,
  `c_dur` varchar(255) DEFAULT NULL,
  `c_fees` varchar(255) DEFAULT NULL,
  `c_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addmission_new`
--

INSERT INTO `addmission_new` (`id`, `c_title`, `c_desc`, `c_dur`, `c_fees`, `c_image`) VALUES
(8, 'MCA(Master of Computer Application)', 'Master Course of Computer Course', '2 Year', '50,000', 'mca1735631951.jpeg'),
(11, 'BCA(Bachelor of Computer Application)', 'Bachelor Course in Computer Science', '3 Year', '30,000', 'bca1735632529.jpeg'),
(12, 'B-Tech(Bachelor of Computer Technology)', 'Engineering of bachelor courses of software devlopment', '4 Year', '1 Lakh', 'btech1736090686.jpeg'),
(13, 'M-Tech(Master of Computer Technology)', 'Engineering of master courses of software development', '2 Year', '1.5 Lakh', 'mtech1736090739.jpeg'),
(14, 'M-Tech', 'mabm', '2 Year', '46734', '9d0a6780-394a-11eb-9fd1-6296a684b1241736321580.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(10) NOT NULL,
  `city_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Allahaabad'),
(2, 'Jaunpur'),
(3, 'Jaunpur'),
(4, 'Azamgarh');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(10) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'india'),
(2, 'chaina'),
(3, 'pakistan'),
(4, 'thailand');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(10) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_fess` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_fess`) VALUES
(1, 'BCA', '90000'),
(2, 'MCA', '80000'),
(3, 'O LEVEL', '20000'),
(4, 'PGDCA', '40000');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `de_id` int(11) NOT NULL,
  `de_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`de_id`, `de_name`) VALUES
(1, 'Assiciate Prof.'),
(2, 'Reserch Fellow');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `exam_title` varchar(255) NOT NULL,
  `exam_course` varchar(255) NOT NULL,
  `exam_subject` varchar(255) NOT NULL,
  `exam_shift` varchar(255) NOT NULL,
  `exam_date` varchar(255) NOT NULL,
  `exam_decription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_title`, `exam_course`, `exam_subject`, `exam_shift`, `exam_date`, `exam_decription`) VALUES
(13, '1', '2', '2', 'Morning (10:00 AM to 01:00 PM)', '2024-10-29', 'Second Year Examination'),
(15, '3', '3', '5', 'Evening (02:00 PM to 05:00 PM)', '2024-11-06', 'O Level Examination'),
(17, '1', '3', '2', 'Evening (02:00 PM to 05:00 PM)', '2024-10-28', 'kjhkjhkj'),
(18, '2', '1', '1', 'Morning (10:00 AM to 01:00 PM)', '2024-10-31', 'IICS College Allahabad'),
(19, '2', '1', '2', 'Evening (02:00 PM to 05:00 PM)', '2024-11-01', 'hgsgifsd'),
(20, '2', '1', '3', 'Morning (10:00 AM to 01:00 PM)', '2024-11-02', 'gjfjfhgjh'),
(22, '2', '1', '5', 'Morning (10:00 AM to 01:00 PM)', '2024-11-04', 'jyguruuhity'),
(23, '3', '4', '4', 'Evening (02:00 PM to 05:00 PM)', '2025-01-03', 'college');

-- --------------------------------------------------------

--
-- Table structure for table `exam_title`
--

CREATE TABLE `exam_title` (
  `title_id` int(11) NOT NULL,
  `title_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_title`
--

INSERT INTO `exam_title` (`title_id`, `title_name`) VALUES
(1, 'unit'),
(2, 'semester'),
(3, 'yearly');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `f_gen` varchar(200) NOT NULL,
  `f_quali` varchar(200) NOT NULL,
  `f_phone` varchar(200) NOT NULL,
  `f_email` varchar(200) NOT NULL,
  `f_expe` varchar(200) NOT NULL,
  `f_interst` varchar(200) NOT NULL,
  `f_doj` varchar(200) NOT NULL,
  `f_degi` varchar(200) NOT NULL,
  `f_stream` varchar(200) NOT NULL,
  `f_que` varchar(200) NOT NULL,
  `f_ans` varchar(200) NOT NULL,
  `f_dp` varchar(200) NOT NULL,
  `f_act` varchar(200) NOT NULL,
  `f_pass` varchar(200) NOT NULL,
  `fc_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `f_name`, `f_gen`, `f_quali`, `f_phone`, `f_email`, `f_expe`, `f_interst`, `f_doj`, `f_degi`, `f_stream`, `f_que`, `f_ans`, `f_dp`, `f_act`, `f_pass`, `fc_pass`) VALUES
(47, 'Asif Aziz', 'Male', '1', '8787998790', 'abcd@gmail.com', '5', '1', '23/09/2023', '1', '1', '1', 'abcd', 'd1733478354.jpg', '1', 'ABCD2023', 'ABCD2023'),
(48, 'Mukesh Sharma', 'Female', '1', '6678678678', 'abcd@gmail.com', '5', '1', '23/09/2023', '1', '1', '1', 'abcd', 'd1733478354.jpg', '1', 'SULU2023', 'SULU2023'),
(50, 'Kaif', 'Male', '3', '8090835664', 'kaif@gmail.com', '2', '1', '12/12/2024', '1', '1', '1', '1', '1733739473.png', '0', 'KAIF2024', 'KAIF2024'),
(52, 'Mohammad Faij Ansari', 'Male', '1', '8090835664', 'faij@gmail.com', '1', '1', '12/12/2024', '1', '1', '1', '1', '', '0', 'MOHA2024', 'MOHA2024');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_quali`
--

CREATE TABLE `faculty_quali` (
  `f_qua_id` int(11) NOT NULL,
  `f_qua_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_quali`
--

INSERT INTO `faculty_quali` (`f_qua_id`, `f_qua_name`) VALUES
(1, 'B.tech'),
(2, 'M.tech'),
(3, 'PHD');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `fs_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `total_fee` bigint(20) NOT NULL,
  `balance` bigint(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `discription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`fs_id`, `st_id`, `name`, `father`, `course`, `total_fee`, `balance`, `amount`, `date`, `discription`) VALUES
(62, 73, 'Akash ', 'Vinod Kumar ', 'MCA', 80000, 0, '20000,20000,30000,10', '06/12/2024,06/12/202', '20k,20k,30k,Full Payment'),
(63, 66, 'Yuraj ', 'Babu ', 'MCA', 80000, 0, '80000', '07/12/2024', 'Full Payment'),
(64, 68, 'Bittu', 'Babu', 'MCA', 80000, 64000, '8000,8000', '09/12/2024,04/01/202', 'Full Paid,paid');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `g_id` int(100) NOT NULL,
  `g_title` varchar(255) NOT NULL,
  `g_image` text NOT NULL,
  `date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`g_id`, `g_title`, `g_image`, `date`) VALUES
(65, 'Gallery', 'gallery11735196191.jpeg', '26/12/24'),
(66, 'Gallery', 'gallery21735196191.jpeg', '26/12/24'),
(67, 'Gallery', 'gallery31735196191.jpeg', '26/12/24'),
(68, 'Gallery', 'gallery41735196191.jpeg', '26/12/24'),
(69, 'Library', 'library11735196287.jpeg', '26/12/24'),
(70, 'Library', 'library21735196287.jpeg', '26/12/24'),
(71, 'Library', 'library31735196287.jpeg', '26/12/24'),
(72, 'Library', 'library41735196287.jpeg', '26/12/24'),
(73, 'Seminor', 'seminor11735196328.jpeg', '26/12/24'),
(74, 'Seminor', 'seminor21735196328.jpeg', '26/12/24'),
(75, 'Seminor', 'seminor31735196328.jpeg', '26/12/24'),
(76, 'Seminor', 'seminor41735196328.jpeg', '26/12/24');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(255) NOT NULL,
  `login_user` varchar(255) NOT NULL,
  `login_pass` varchar(255) NOT NULL,
  `login_cpass` varchar(255) NOT NULL,
  `sec_ques` varchar(255) NOT NULL,
  `sec_ans` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_user`, `login_pass`, `login_cpass`, `sec_ques`, `sec_ans`) VALUES
(1, 'shailesh', 'Shailu@1234', 'Shailu@1234', '1', 'shailu'),
(2, 'iics', '1234', '1234', '2', 'sgic');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `roll_no` int(255) NOT NULL,
  `course` varchar(20) DEFAULT NULL,
  `subject_list` varchar(255) DEFAULT NULL,
  `marks_list` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `roll_no`, `course`, `subject_list`, `marks_list`) VALUES
(1, 73, 'MCA', 'Mathematics,C-Langauge', '50,60'),
(2, 66, 'MCA', 'DBMS', '90');

-- --------------------------------------------------------

--
-- Table structure for table `news_notice`
--

CREATE TABLE `news_notice` (
  `new_id` int(100) NOT NULL,
  `new_title` text NOT NULL,
  `new_desc` text NOT NULL,
  `new_datetime` date NOT NULL,
  `new_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_notice`
--

INSERT INTO `news_notice` (`new_id`, `new_title`, `new_desc`, `new_datetime`, `new_image`) VALUES
(6, 'Eid-Ul-Adha', 'Its is the indian festival ', '2024-12-19', 'eid.jpeg'),
(7, 'Diwali Festival', 'Its is the Indian Festival for Hindu ', '2024-12-19', 'diwali.jpeg'),
(8, 'Chritmas', '25th December', '2024-12-24', 'download1735025588.download.png');

-- --------------------------------------------------------

--
-- Table structure for table `qulification`
--

CREATE TABLE `qulification` (
  `qual_id` int(10) NOT NULL,
  `qual_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qulification`
--

INSERT INTO `qulification` (`qual_id`, `qual_name`) VALUES
(1, '10th'),
(2, '12th'),
(3, 'Graduation');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `sec_id` int(100) NOT NULL,
  `sec_ques` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`sec_id`, `sec_ques`) VALUES
(1, 'What is your name ?'),
(2, 'What is your first school name ?'),
(3, 'What is your Nick Name ?'),
(4, 'What is your Pet Name ?');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(10) NOT NULL,
  `state_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Uttar Pradesh'),
(2, 'Uttarakhand'),
(3, 'Madhya Pradesh'),
(4, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE `stream` (
  `stream_id` int(11) NOT NULL,
  `stream_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`stream_id`, `stream_name`) VALUES
(1, 'Science'),
(2, 'Arts');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `st_id` int(11) NOT NULL,
  `st_name` varchar(200) NOT NULL,
  `st_fathername` varchar(200) NOT NULL,
  `st_gen` varchar(200) NOT NULL,
  `st_phone` varchar(200) NOT NULL,
  `st_course` varchar(200) NOT NULL,
  `st_city` varchar(200) NOT NULL,
  `st_state` varchar(200) NOT NULL,
  `st_country` varchar(200) NOT NULL,
  `st_pincode` varchar(200) NOT NULL,
  `st_email` varchar(200) NOT NULL,
  `st_dob` varchar(200) NOT NULL,
  `st_doj` varchar(200) NOT NULL,
  `st_image` varchar(200) NOT NULL,
  `st_address` varchar(200) NOT NULL,
  `st_qualification` varchar(200) NOT NULL,
  `st_address2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`st_id`, `st_name`, `st_fathername`, `st_gen`, `st_phone`, `st_course`, `st_city`, `st_state`, `st_country`, `st_pincode`, `st_email`, `st_dob`, `st_doj`, `st_image`, `st_address`, `st_qualification`, `st_address2`) VALUES
(68, 'Bittu', 'Babu', 'Male', '0989087968', '2', '1', '1', '1', '212121', 'vishal@gmail.com', '12/12/2000', '12/09/2024', 'download11733724694.jpeg', '   Katahara bazzar ', '1,2,3', '    Katahara '),
(73, 'Akash ', 'Vinod Kumar ', 'Male', '7896970870', '2', '1', '1', '1', '213221', 'akash@gmail.com', '12/16/2014', '12/13/2023', 'c1733302859.jpg', '  Korav Meja', '1,2,3', ' Korav Meja');

-- --------------------------------------------------------

--
-- Table structure for table `student_signin`
--

CREATE TABLE `student_signin` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(100) NOT NULL,
  `stu_email` text NOT NULL,
  `stu_address` varchar(100) NOT NULL,
  `stu_phone` int(100) NOT NULL,
  `stu_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_signin`
--

INSERT INTO `student_signin` (`stu_id`, `stu_name`, `stu_email`, `stu_address`, `stu_phone`, `stu_pass`) VALUES
(18, 'Mohammad Faij Ansari', 'faij@1234gmail.com', 'Prayagraj, Prayagraj', 2147483647, 'asdfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `s_id` int(11) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`s_id`, `subject_name`, `subject_id`) VALUES
(1, 'Mathematics', 73),
(2, 'C-Langauge', 73),
(3, 'DBMS', 66);

-- --------------------------------------------------------

--
-- Table structure for table `subtable`
--

CREATE TABLE `subtable` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `sub_course_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subtable`
--

INSERT INTO `subtable` (`sub_id`, `sub_name`, `sub_course_id`) VALUES
(1, 'C language', '1'),
(2, 'Operating System', '2'),
(3, 'Computer Network ', '3'),
(4, 'C++', '4'),
(5, 'Python', '5'),
(6, 'Java', '6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addmission_new`
--
ALTER TABLE `addmission_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`de_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `exam_title`
--
ALTER TABLE `exam_title`
  ADD PRIMARY KEY (`title_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `faculty_quali`
--
ALTER TABLE `faculty_quali`
  ADD PRIMARY KEY (`f_qua_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`fs_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_notice`
--
ALTER TABLE `news_notice`
  ADD PRIMARY KEY (`new_id`);

--
-- Indexes for table `qulification`
--
ALTER TABLE `qulification`
  ADD PRIMARY KEY (`qual_id`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`stream_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `student_signin`
--
ALTER TABLE `student_signin`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `subtable`
--
ALTER TABLE `subtable`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addmission_new`
--
ALTER TABLE `addmission_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `de_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `exam_title`
--
ALTER TABLE `exam_title`
  MODIFY `title_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `faculty_quali`
--
ALTER TABLE `faculty_quali`
  MODIFY `f_qua_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `fs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `g_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news_notice`
--
ALTER TABLE `news_notice`
  MODIFY `new_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `qulification`
--
ALTER TABLE `qulification`
  MODIFY `qual_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `sec_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stream`
--
ALTER TABLE `stream`
  MODIFY `stream_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `student_signin`
--
ALTER TABLE `student_signin`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subtable`
--
ALTER TABLE `subtable`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
