-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2020 at 11:24 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `his`
--

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

CREATE TABLE `clinics` (
  `id` int(11) NOT NULL,
  `engname` varchar(255) NOT NULL,
  `arabname` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clinics`
--

INSERT INTO `clinics` (`id`, `engname`, `arabname`, `image`) VALUES
(1, 'Dentist Clinic', 'عيادة الأسنان', '10.jpg'),
(2, 'Internal Clinic', 'عيادة الباطنة', '2.png'),
(3, 'Surgery Clinic', 'عيادة الجراحة', '3.jpg'),
(4, 'Bones Clinic', 'عيادة العظام', '4.jpg'),
(5, 'Gynecology and Obstetrics Clinic', 'عيادة النسا والتوليد', '5.jpg'),
(6, 'Neurology Clinic', 'عيادة المخ والأعصاب', '6.jpg'),
(7, 'Hematology', 'أمرض الدم', '5.png'),
(8, 'Pediatric', 'طب الاطفال', '11.jpeg'),
(10, 'Clinic', 'عيادة', '9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `engname` varchar(255) NOT NULL,
  `arabname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `national_id` varchar(255) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `activation` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `contacts` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `engname`, `arabname`, `password`, `salt`, `email`, `national_id`, `clinic_id`, `activation`, `image`, `contacts`, `phone`, `access`) VALUES
(1, 'Amr El-Absya', 'عمرو العبسيش', '2c6a77fa8e399e3651ad0fa8990e5a96f43bde1e', '5c20d51934', 'amrelabsy555@gmail.com', '29902061800231', 1, '1', '', '', '01554010386', 0),
(2, 'Yasser Rashed', 'ياسر راشد', '123456', '123456', 'ششش', '123456', 1, '1', '2.png', 'kjbkbjknl', '0', 0),
(3, 'Ali Muhamed', 'علي محمد', '123456', '123456', 'asdfghjk', '12345679812345', 4, '1', '3.png', 'yfjuuj', '0', 0),
(4, 'Amr Aly', 'عمرو علي', '123456789', '123456789', 'as', '12345678912345', 1, '1', '4.png', 'gnchj', '0', 0),
(6, 'Aya Essam', 'آية عصام', '123456789', '123456789', 'as', '1234578912345', 1, '1', '5.png', 'hvjkk,bk', '01066484685', 0),
(7, 'Fatma Abdelhameed', 'فاطمة عبد الحميد', '132456789', '123456789', 'f@a.com', '1234569987', 1, '1', '6.png', 'nbvhv', '0', 0),
(9, 'mohamed', 'محمد', '37b6a14e8b4e5e053f7b9d3c846b2917eccbbdc8', '2e1a0d083f', 'mmldskf@gmail.com', '29912260223223', 5, '1', '7.png', '', '01284188740', 1),
(11, 'Ahmed Muhamed', 'أحمد محمد', '123456789', '123456789', 'a@m.com', '123456789', 2, '1', '1.png', '767687678', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_attendance`
--

CREATE TABLE `doctor_attendance` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `doctor_attendance`
--

INSERT INTO `doctor_attendance` (`id`, `doctor_id`, `day`) VALUES
(1, 6, '2019-12-18'),
(2, 2, '2019-12-18'),
(3, 4, '2019-12-17'),
(4, 2, '2019-12-27'),
(5, 4, '2020-02-03'),
(16, 7, '2020-02-04'),
(17, 11, '2020-02-04'),
(18, 2, '2020-02-04'),
(19, 7, '2020-02-05'),
(20, 6, '2020-02-05'),
(21, 4, '2020-02-09'),
(22, 3, '2020-02-09'),
(23, 11, '2020-02-09'),
(24, 7, '2020-02-09'),
(25, 11, '2020-02-11'),
(26, 2, '2020-02-11'),
(27, 3, '2020-02-11'),
(28, 4, '2020-02-11'),
(29, 6, '2020-02-11'),
(30, 7, '2020-02-11'),
(31, 9, '2020-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_contacts`
--

CREATE TABLE `doctor_contacts` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

CREATE TABLE `examinations` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `examinations`
--

INSERT INTO `examinations` (`id`, `date`, `time`, `doctor_id`, `patient_id`, `status`) VALUES
(1, '2019-12-01', '08:00:00', 6, 1, 1),
(2, '2019-11-24', '08:30:00', 6, 4, 0),
(3, '2019-11-27', '09:00:00', 6, 2, 1),
(4, '2019-12-01', '09:30:00', 3, 4, 0),
(5, '2019-12-06', '00:00:00', 6, 4, 1),
(6, '2019-12-06', '00:00:00', 6, 2, 0),
(7, '2019-12-17', '25:00:00', 7, 3, 0),
(8, '2019-12-20', '00:00:00', 7, 2, 0),
(9, '2019-12-27', '23:00:00', 4, 3, 0),
(10, '2019-12-27', '02:00:00', 7, 4, 1),
(11, '2019-12-28', '17:00:00', 11, 6, 0),
(12, '2019-12-27', '09:00:00', 9, 2, 0),
(13, '2019-12-27', '11:00:00', 9, 1, 1),
(14, '2020-01-01', '09:00:00', 9, 2, 0),
(15, '2020-01-30', '15:10:00', 7, 3, 0),
(16, '2020-01-31', '15:10:00', 7, 3, 1),
(17, '2020-02-03', '01:00:00', 3, 6, 0),
(18, '2020-02-06', '08:00:00', 3, 7, 0),
(19, '2020-02-04', '15:00:00', 9, 7, 1),
(20, '2020-02-09', '01:00:00', 9, 2, 1),
(21, '2020-02-09', '18:00:00', 9, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `examination_analysis`
--

CREATE TABLE `examination_analysis` (
  `id` int(11) NOT NULL,
  `analysis_id` int(11) NOT NULL,
  `examination_id` int(11) NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_diagnosis`
--

CREATE TABLE `examination_diagnosis` (
  `id` int(11) NOT NULL,
  `diagnosis_id` int(11) NOT NULL,
  `examination_id` int(11) NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_scan`
--

CREATE TABLE `examination_scan` (
  `id` int(11) NOT NULL,
  `scan_id` int(11) NOT NULL,
  `examination_id` int(11) NOT NULL,
  `result` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_analysis`
--

CREATE TABLE `medical_analysis` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `national_id` varchar(14) NOT NULL,
  `engname` varchar(255) NOT NULL,
  `arabname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birth_province` varchar(255) NOT NULL,
  `blood_type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `national_id`, `engname`, `arabname`, `email`, `password`, `salt`, `phone`, `gender`, `birth_province`, `blood_type`, `image`, `birth_date`, `address`) VALUES
(1, '29902061800232', 'Amr El-Absy', 'عمرو العبسي', 'amrelabsy55@gmail.com', '123456789', '123456789', '01066484685', '1', 'El-Buhairah', 'A-', '1.png', '1999-02-06', 'xbfbfbdafbdfb'),
(2, '234435435435', 'mohamed osama', 'محمد أسامة', 'SDVDS@gmail.com', 'mido1234', 'mido1234', '0298312123123', '1', 'sdfdsfdsf', 'B-', '3.jpeg', '2000-01-01', 'sdvdvdsv'),
(3, '34862394824', 'hamo beka', 'حمو بيكا', 'hsgdfag@yahoo.com', 'hamo1234', 'hamo1234', '21093813', '1', 'dslkfdsfds', 'A+', '2.png', '2019-11-26', 'dsfdsfdsf'),
(4, '32435435435', 'muerad yalin', 'مراد يالين', 'sdycjgds@gmail.com', 'murad1234', 'murad1234', '32425435435', '1', 'sdhbdhsdfd', 'B+', '5.jpeg', '2019-11-30', 'sdfdfdsfs'),
(6, '29902061800231', 'Amr El-Absy', 'عمرو العبسي', 'amrelabsy55@gmail.com', 'c682084ce2ef401787911d87503e63a4b83ac064', '34363c8f79', '01066484685', '1', 'Beheira', '', '4.png', '1999-06-02', 'Shagarett El-Durr st, Shubra'),
(7, '29902071800231', 'AbsyAmr', 'عبسي', 'a@aa.com', '123456', '123456', '0123698745', '1', 'البحيرة', 'A-', '3.png', '2020-02-14', 'dfghjk');

-- --------------------------------------------------------

--
-- Table structure for table `patient_contacts`
--

CREATE TABLE `patient_contacts` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_contacts`
--

INSERT INTO `patient_contacts` (`id`, `patient_id`, `icon`, `contact`) VALUES
(1, 1, '', 'gbcvbcbcbcvb'),
(2, 2, 'facebook', 'cvcvbcvbvcvbcvb'),
(3, 3, '', 'vcbcvbvcbvcb'),
(4, 4, '', 'vbvcbvcbvcbvcbvb'),
(5, 1, '', 'vcbvcbcvbvcb'),
(6, 1, '', 'vcbcvbvcbvbvc');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission`) VALUES
(1, 'add user'),
(2, 'edit user'),
(3, 'delete user'),
(4, 'activate user'),
(5, 'add post'),
(6, 'edit post'),
(7, 'delete post');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `examination_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_med`
--

CREATE TABLE `prescription_med` (
  `id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

CREATE TABLE `receptionists` (
  `id` int(11) NOT NULL,
  `arabname` varchar(255) NOT NULL,
  `engname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `receptionists`
--

INSERT INTO `receptionists` (`id`, `arabname`, `engname`, `password`, `salt`, `image`) VALUES
(1, 'علي', 'ali', '37b6a14e8b4e5e053f7b9d3c846b2917eccbbdc8', '2e1a0d083f', '3.png');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Moderator');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`) VALUES
(43, 1, 1),
(44, 1, 2),
(45, 1, 3),
(46, 1, 4),
(47, 1, 5),
(48, 1, 6),
(49, 1, 7),
(54, 2, 1),
(55, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `scans`
--

CREATE TABLE `scans` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `salt`) VALUES
(1, 'Amr El-Absy', 'a@a.com', '5491cf163600e4d8fc165695839f04c6cac5470f', 'd41d8cd98f');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`) VALUES
(2, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `National_ID` (`national_id`),
  ADD KEY `Clinic_ID` (`clinic_id`);

--
-- Indexes for table `doctor_attendance`
--
ALTER TABLE `doctor_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attend_doctor` (`doctor_id`);

--
-- Indexes for table `doctor_contacts`
--
ALTER TABLE `doctor_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `examinations`
--
ALTER TABLE `examinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Doctor_ID` (`doctor_id`),
  ADD KEY `Patient_ID` (`patient_id`);

--
-- Indexes for table `examination_analysis`
--
ALTER TABLE `examination_analysis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Analysis_ID` (`analysis_id`),
  ADD KEY `Examintion_ID` (`examination_id`);

--
-- Indexes for table `examination_diagnosis`
--
ALTER TABLE `examination_diagnosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Diagnosis_ID` (`diagnosis_id`),
  ADD KEY `Examintion_ID` (`examination_id`);

--
-- Indexes for table `examination_scan`
--
ALTER TABLE `examination_scan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Scan_ID` (`scan_id`),
  ADD KEY `Examintion_ID` (`examination_id`);

--
-- Indexes for table `medical_analysis`
--
ALTER TABLE `medical_analysis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `National_ID` (`national_id`);

--
-- Indexes for table `patient_contacts`
--
ALTER TABLE `patient_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Examintion_ID` (`examination_ID`);

--
-- Indexes for table `prescription_med`
--
ALTER TABLE `prescription_med`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Prescription_ID` (`prescription_id`),
  ADD KEY `Medicine_ID` (`medicine_id`);

--
-- Indexes for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permission_role` (`role_id`),
  ADD KEY `role_permission_permission_` (`permission_id`);

--
-- Indexes for table `scans`
--
ALTER TABLE `scans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_user` (`user_id`),
  ADD KEY `user_role_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clinics`
--
ALTER TABLE `clinics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctor_attendance`
--
ALTER TABLE `doctor_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `doctor_contacts`
--
ALTER TABLE `doctor_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examinations`
--
ALTER TABLE `examinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `examination_analysis`
--
ALTER TABLE `examination_analysis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examination_diagnosis`
--
ALTER TABLE `examination_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examination_scan`
--
ALTER TABLE `examination_scan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_analysis`
--
ALTER TABLE `medical_analysis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient_contacts`
--
ALTER TABLE `patient_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription_med`
--
ALTER TABLE `prescription_med`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `scans`
--
ALTER TABLE `scans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctor_clinic` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_attendance`
--
ALTER TABLE `doctor_attendance`
  ADD CONSTRAINT `attend_doctor` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_contacts`
--
ALTER TABLE `doctor_contacts`
  ADD CONSTRAINT `doctor_contacts_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examinations`
--
ALTER TABLE `examinations`
  ADD CONSTRAINT `examinations_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `examinations_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examination_analysis`
--
ALTER TABLE `examination_analysis`
  ADD CONSTRAINT `examination_analysis_ibfk_1` FOREIGN KEY (`analysis_id`) REFERENCES `medical_analysis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `examination_analysis_ibfk_2` FOREIGN KEY (`examination_id`) REFERENCES `examinations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examination_diagnosis`
--
ALTER TABLE `examination_diagnosis`
  ADD CONSTRAINT `examination_diagnosis_ibfk_1` FOREIGN KEY (`diagnosis_id`) REFERENCES `diagnosis` (`id`),
  ADD CONSTRAINT `examination_diagnosis_ibfk_2` FOREIGN KEY (`examination_id`) REFERENCES `examinations` (`id`);

--
-- Constraints for table `examination_scan`
--
ALTER TABLE `examination_scan`
  ADD CONSTRAINT `examination_scan_ibfk_1` FOREIGN KEY (`examination_id`) REFERENCES `examinations` (`id`),
  ADD CONSTRAINT `examination_scan_ibfk_2` FOREIGN KEY (`scan_id`) REFERENCES `scans` (`id`);

--
-- Constraints for table `patient_contacts`
--
ALTER TABLE `patient_contacts`
  ADD CONSTRAINT `patient_contacts_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`examination_ID`) REFERENCES `examinations` (`id`);

--
-- Constraints for table `prescription_med`
--
ALTER TABLE `prescription_med`
  ADD CONSTRAINT `prescription_med_ibfk_1` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`id`),
  ADD CONSTRAINT `prescription_med_ibfk_2` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`);

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_permission_` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_permission_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
