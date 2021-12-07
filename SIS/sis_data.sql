-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2021 at 12:56 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sis_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessed_fees`
--

CREATE TABLE `assessed_fees` (
  `AF_ID` int(20) NOT NULL,
  `Library_fee` int(20) NOT NULL,
  `Computer_fee` int(20) NOT NULL,
  `Guidance` int(20) NOT NULL,
  `Cultural_fee` int(20) NOT NULL,
  `Student_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Book_Code` int(10) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Author` varchar(50) DEFAULT NULL,
  `ISBN_13` int(13) DEFAULT NULL,
  `Category` int(50) DEFAULT NULL,
  `Publication_Year` date DEFAULT NULL,
  `Publisher` varchar(50) DEFAULT NULL,
  `Pages` int(11) DEFAULT NULL,
  `Tags` varchar(255) DEFAULT NULL,
  `Abstract` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Biblio_Notes` varchar(255) DEFAULT NULL,
  `Copies_Number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Class_ID` int(20) NOT NULL,
  `Bloc` varchar(20) NOT NULL,
  `Year_lvl` varchar(20) NOT NULL,
  `Course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Class_ID`, `Bloc`, `Year_lvl`, `Course`) VALUES
(11001, 'A', '1st Year', 'BEEd'),
(11002, 'B', '1st Year', 'BEEd');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Fac_ID` int(20) NOT NULL,
  `Fac_Fname` varchar(20) NOT NULL,
  `Fac_Mname` varchar(20) NOT NULL,
  `Fac_Lname` varchar(20) NOT NULL,
  `Fac_phone` varchar(20) NOT NULL,
  `Fac_address` varchar(100) NOT NULL,
  `Fac_email` varchar(50) NOT NULL,
  `Fac_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_attendancelog`
--

CREATE TABLE `faculty_attendancelog` (
  `Log_id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `TimeIn_AM` time NOT NULL,
  `TimeOut_AM` time NOT NULL,
  `TimeIn_PM` time NOT NULL,
  `TimeOut_PM` time NOT NULL,
  `Fac_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `Sem_ID` int(20) NOT NULL,
  `Semester` varchar(20) NOT NULL,
  `School_year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_ID` int(20) NOT NULL,
  `F_name` varchar(20) DEFAULT NULL,
  `M_name` varchar(20) DEFAULT NULL,
  `L_name` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Civil_status` varchar(10) DEFAULT NULL,
  `Class_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_ID`, `F_name`, `M_name`, `L_name`, `Email`, `Phone`, `Address`, `Civil_status`, `Class_ID`) VALUES
(2021001, 'Adrian', 'Avila', 'bonaobra', 'admin', '09774245501', 'dawa sain', 's', 11001),
(2021002, 'Just', 'Some', 'One', 'test@email.com', '09876543210', 'di matagpuan', 'm', 11002),
(2021003, 'Super', 'Saiyan', 'Admin', 's_admin', '99999999999', 'sa likod sana', 'c', 11001);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `Subj_ID` int(20) NOT NULL,
  `Subj_name` varchar(50) NOT NULL,
  `Subj_units` int(20) NOT NULL,
  `Subj_class` varchar(20) NOT NULL,
  `Subj_sched_ID` int(11) NOT NULL,
  `Fac_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects_enrolled`
--

CREATE TABLE `subjects_enrolled` (
  `subj_enr_ID` int(20) NOT NULL,
  `Subj_ID` int(11) NOT NULL,
  `Subj_grade_ID` int(11) NOT NULL,
  `Sem_ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject_grade`
--

CREATE TABLE `subject_grade` (
  `Subj_grade_ID` int(11) NOT NULL,
  `Grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject_loading`
--

CREATE TABLE `subject_loading` (
  `SubjLoad_ID` int(20) NOT NULL,
  `Subj_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject_sched`
--

CREATE TABLE `subject_sched` (
  `Subj_sched_ID` int(20) NOT NULL,
  `Time_start` varchar(20) NOT NULL,
  `Time_end` varchar(20) NOT NULL,
  `Date_sched` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Student_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `Username`, `Password`, `Role`, `Student_ID`) VALUES
(1192021001, 'admin123', 'admin123', 'admin', 2021001),
(1192021002, 'user123', 'user123', 'user', 2021002),
(1192021003, 's_admin123', 's_admin123', 's_admin', 2021003);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessed_fees`
--
ALTER TABLE `assessed_fees`
  ADD PRIMARY KEY (`AF_ID`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_Code`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Class_ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Fac_ID`);

--
-- Indexes for table `faculty_attendancelog`
--
ALTER TABLE `faculty_attendancelog`
  ADD PRIMARY KEY (`Log_id`),
  ADD KEY `Fac_ID` (`Fac_ID`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`Sem_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD UNIQUE KEY `Student_ID` (`Student_ID`),
  ADD KEY `Class_ID` (`Class_ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`Subj_ID`),
  ADD KEY `subjects_ibfk_1` (`Subj_sched_ID`),
  ADD KEY `subjects_ibfk_2` (`Fac_ID`);

--
-- Indexes for table `subjects_enrolled`
--
ALTER TABLE `subjects_enrolled`
  ADD PRIMARY KEY (`subj_enr_ID`),
  ADD KEY `subjects_enrolled_ibfk_1` (`Subj_ID`),
  ADD KEY `subjects_enrolled_ibfk_2` (`Subj_grade_ID`),
  ADD KEY `subjects_enrolled_ibfk_3` (`Sem_ID`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `subject_grade`
--
ALTER TABLE `subject_grade`
  ADD PRIMARY KEY (`Subj_grade_ID`);

--
-- Indexes for table `subject_loading`
--
ALTER TABLE `subject_loading`
  ADD PRIMARY KEY (`SubjLoad_ID`),
  ADD KEY `Subj_ID` (`Subj_ID`);

--
-- Indexes for table `subject_sched`
--
ALTER TABLE `subject_sched`
  ADD PRIMARY KEY (`Subj_sched_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessed_fees`
--
ALTER TABLE `assessed_fees`
  MODIFY `AF_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `Book_Code` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `Class_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11003;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `Fac_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty_attendancelog`
--
ALTER TABLE `faculty_attendancelog`
  MODIFY `Log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `Sem_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Student_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2021005;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `Subj_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects_enrolled`
--
ALTER TABLE `subjects_enrolled`
  MODIFY `subj_enr_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_grade`
--
ALTER TABLE `subject_grade`
  MODIFY `Subj_grade_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_loading`
--
ALTER TABLE `subject_loading`
  MODIFY `SubjLoad_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_sched`
--
ALTER TABLE `subject_sched`
  MODIFY `Subj_sched_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1192021004;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessed_fees`
--
ALTER TABLE `assessed_fees`
  ADD CONSTRAINT `assessed_fees_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`);

--
-- Constraints for table `faculty_attendancelog`
--
ALTER TABLE `faculty_attendancelog`
  ADD CONSTRAINT `faculty_attendancelog_ibfk_1` FOREIGN KEY (`Fac_ID`) REFERENCES `faculty` (`Fac_ID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Class_ID`) REFERENCES `class` (`Class_ID`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`Subj_sched_ID`) REFERENCES `subject_sched` (`Subj_sched_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`Fac_ID`) REFERENCES `faculty` (`Fac_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects_enrolled`
--
ALTER TABLE `subjects_enrolled`
  ADD CONSTRAINT `subjects_enrolled_ibfk_1` FOREIGN KEY (`Subj_ID`) REFERENCES `subjects` (`Subj_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_enrolled_ibfk_2` FOREIGN KEY (`Subj_grade_ID`) REFERENCES `subject_grade` (`Subj_grade_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_enrolled_ibfk_3` FOREIGN KEY (`Sem_ID`) REFERENCES `semester` (`Sem_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_enrolled_ibfk_4` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`);

--
-- Constraints for table `subject_loading`
--
ALTER TABLE `subject_loading`
  ADD CONSTRAINT `subject_loading_ibfk_1` FOREIGN KEY (`Subj_ID`) REFERENCES `subjects` (`Subj_ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
