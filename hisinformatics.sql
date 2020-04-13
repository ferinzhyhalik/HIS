-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2020 at 05:36 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hisinformatics`
--

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE `bed` (
  `bed_id` int(11) NOT NULL,
  `inpatient_id` int(128) NOT NULL,
  `room_id` int(11) NOT NULL,
  `nurse_id` int(11) NOT NULL,
  `bed_availability` enum('available','not available','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bed`
--

INSERT INTO `bed` (`bed_id`, `inpatient_id`, `room_id`, `nurse_id`, `bed_availability`) VALUES
(1, 1, 1, 1, 'available'),
(2, 1, 1, 2, 'available'),
(3, 1, 1, 3, 'available'),
(4, 1, 2, 1, 'available'),
(5, 1, 2, 2, 'available'),
(6, 1, 3, 3, 'available'),
(7, 1, 3, 4, 'available'),
(8, 1, 4, 5, 'available'),
(9, 1, 5, 5, 'available'),
(10, 1, 6, 6, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bills_id` int(11) NOT NULL,
  `total_price` int(128) NOT NULL,
  `bill_status` enum('done','not done','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `diagnose_id` int(11) NOT NULL,
  `patient_id` int(128) NOT NULL,
  `diagnose_by_doctor_id` int(128) NOT NULL,
  `details` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `doctor_schedule` varchar(128) NOT NULL,
  `doctor_speciality` varchar(128) NOT NULL,
  `gender` enum('male','female','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `first_name`, `last_name`, `doctor_schedule`, `doctor_speciality`, `gender`) VALUES
(2, 'Jack', 'Sparrow', '', 'Heart', 'male'),
(123, 'Grand', 'Marcell', '', 'Brains', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_assigned_to_patient`
--

CREATE TABLE `doctors_assigned_to_patient` (
  `date_from` datetime NOT NULL,
  `patient_id` int(128) NOT NULL,
  `doctor_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `drug_id` int(11) NOT NULL,
  `drug_name` varchar(128) NOT NULL,
  `drug_type` varchar(128) NOT NULL,
  `drug_price` int(128) NOT NULL,
  `drug_desc` varchar(128) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drugs_for_indications`
--

CREATE TABLE `drugs_for_indications` (
  `drugs_indications_id` int(11) NOT NULL,
  `diagnose_id` int(128) NOT NULL,
  `drug_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inpatient`
--

CREATE TABLE `inpatient` (
  `inpatient_id` int(11) NOT NULL,
  `patientMedicalRecord_id` int(128) NOT NULL,
  `reference` enum('Inpatient','Outpatient','UGD','Other Hospital') NOT NULL,
  `date_in` int(128) NOT NULL,
  `date_out` int(128) NOT NULL,
  `bed_id` int(128) NOT NULL,
  `inpatient_status` enum('Waiting','Inpatient','Discharge','') NOT NULL,
  `doctor_id` int(128) NOT NULL,
  `nurse_id` int(128) NOT NULL,
  `payment_method` enum('Debit','Cash','Installment','BPJS','Insurance') NOT NULL,
  `room_grade` varchar(128) NOT NULL,
  `payment_total` bigint(128) NOT NULL,
  `payment_status` enum('Paid','Not Paid','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inpatient`
--

INSERT INTO `inpatient` (`inpatient_id`, `patientMedicalRecord_id`, `reference`, `date_in`, `date_out`, `bed_id`, `inpatient_status`, `doctor_id`, `nurse_id`, `payment_method`, `room_grade`, `payment_total`, `payment_status`) VALUES
(1, 1233, 'Outpatient', 19032020, 0, 10, 'Inpatient', 123, 2, 'BPJS', 'VIP', 0, 'Not Paid'),
(2, 1234, 'Inpatient', 0, 0, 0, 'Waiting', 2, 0, 'Installment', 'VIP', 0, 'Not Paid'),
(3, 90, 'UGD', 0, 0, 0, 'Waiting', 2, 0, 'Debit', 'Standard', 0, 'Not Paid'),
(4, 111, 'Inpatient', 0, 0, 0, 'Waiting', 123, 0, 'Insurance', 'VVIP', 0, 'Not Paid'),
(5, 71, 'Other Hospital', 0, 0, 0, 'Waiting', 2, 0, 'Debit', 'VVIP', 0, 'Not Paid'),
(6, 71, 'Other Hospital', 0, 0, 0, 'Waiting', 2, 0, 'Debit', 'UGD', 0, 'Not Paid'),
(7, 90, 'Other Hospital', 1586702902, 1586702902, 0, 'Waiting', 2, 0, 'Insurance', 'UGD', 0, 'Not Paid'),
(8, 111, 'Outpatient', 1586702955, 1586702955, 0, 'Waiting', 2, 0, 'BPJS', 'UGD', 0, 'Not Paid');

-- --------------------------------------------------------

--
-- Table structure for table `inpatient_treatment`
--

CREATE TABLE `inpatient_treatment` (
  `id` int(11) NOT NULL,
  `patientMedicalRecord_id` int(128) NOT NULL,
  `diagnose` varchar(128) NOT NULL,
  `lab_schedule` int(128) NOT NULL,
  `lab_pic` int(128) NOT NULL,
  `lab_result` varchar(128) NOT NULL,
  `visit_schedule` int(128) NOT NULL,
  `prescription` varchar(128) NOT NULL,
  `date_added` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inpatient_treatment`
--

INSERT INTO `inpatient_treatment` (`id`, `patientMedicalRecord_id`, `diagnose`, `lab_schedule`, `lab_pic`, `lab_result`, `visit_schedule`, `prescription`, `date_added`) VALUES
(1, 1233, 'usus buntu', 1209202020, 0, '', 0, 'medicine xxx', 812122020),
(2, 1233, 'usus kejepit', 0, 0, '', 0, '', 98562312),
(3, 90, 'sakit usus', 0, 0, '', 0, '', 1586702902),
(4, 111, 'corona', 0, 0, '', 0, '', 1586702955),
(5, 1233, 'usus sakitt', 0, 0, 'ususnya bolong', 0, 'medicine xxx', 1586704306),
(6, 1233, 'usus buntu', 0, 0, '', 2020, 'medicine xxx', 1586704727),
(7, 90, '', 0, 0, '', 0, '', 1586769281),
(8, 90, '', 0, 0, '', 0, '', 1586769373),
(9, 90, '', 0, 0, '', 0, '', 1586769386),
(10, 1234, '', 0, 0, '', 0, '', 1586769411),
(11, 1233, '', 0, 0, '', 0, '', 1586770533);

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `nurse_id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `gender` enum('male','female','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`nurse_id`, `first_name`, `last_name`, `gender`) VALUES
(1, 'Dion', 'Krisnadi', 'male'),
(2, 'Robertus', 'Hudi', 'male'),
(3, 'Angel', 'Lica', 'female'),
(4, 'Alessandro', 'Kartika', 'male'),
(5, 'Nadya', 'Alimin', 'female'),
(6, 'Kayleen', 'Priscilia', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `outpatient`
--

CREATE TABLE `outpatient` (
  `outpatient_id` int(11) NOT NULL,
  `patient_id` int(128) NOT NULL,
  `doctor_id` int(128) NOT NULL,
  `visit_schedule` int(128) NOT NULL,
  `prescription_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `patientMedicalRecord_id` int(128) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `gender` enum('male','female','','') NOT NULL,
  `DOB` date NOT NULL,
  `phonenum` varchar(128) NOT NULL,
  `date_added` int(128) NOT NULL,
  `patient_status` enum('discharged','outpatient','inpatient','') NOT NULL,
  `patient_address` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patientMedicalRecord_id`, `first_name`, `last_name`, `gender`, `DOB`, `phonenum`, `date_added`, `patient_status`, `patient_address`) VALUES
(1, 100, 'ferin', 'asdasd', 'male', '2000-02-15', '08565656598', 20200107, 'outpatient', 'ures1'),
(2, 21, 'ferin', 'zhy', 'male', '2020-03-01', '0817272727', 20200303, 'discharged', 'PIK'),
(3, 111, 'raysa', 'goh', 'female', '2000-03-31', '08123217487', 20200303, 'inpatient', 'jalan   raya'),
(4, 1233, 'hello', 'kitty', 'female', '1990-02-03', '08345678911', 20200901, 'outpatient', 'uph'),
(5, 90, 'john', 'meyer', 'male', '2010-03-01', '08234567898765', 20200715, 'inpatient', 'jalan hutan'),
(6, 71, 'angel', 'lica', 'female', '1999-12-23', '0813977812738', 12092020, 'outpatient', 'banten, tangerang'),
(7, 111, 'grizzly', 'bear', 'female', '2020-04-01', '08135786298', 1586577947, 'outpatient', 'ures1');

-- --------------------------------------------------------

--
-- Table structure for table `patient_drug_treatment`
--

CREATE TABLE `patient_drug_treatment` (
  `patient_drug_treatment_id` int(11) NOT NULL,
  `patient_id` int(128) NOT NULL,
  `drug_id` int(128) NOT NULL,
  `diagnose_id` int(128) NOT NULL,
  `dosage` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_record`
--

CREATE TABLE `patient_record` (
  `patientMedicalRecord_id` int(11) NOT NULL,
  `complaint` varchar(128) NOT NULL,
  `updated_date` date NOT NULL,
  `illness` varchar(128) NOT NULL,
  `blood_type` enum('A','B','AB','O') NOT NULL,
  `height` int(128) NOT NULL,
  `weight` int(128) NOT NULL,
  `blood_pressure` varchar(128) NOT NULL,
  `blood_glucose` varchar(128) NOT NULL,
  `allergies` varchar(128) NOT NULL,
  `patient_id` int(128) NOT NULL,
  `updated_by_staff_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_record`
--

INSERT INTO `patient_record` (`patientMedicalRecord_id`, `complaint`, `updated_date`, `illness`, `blood_type`, `height`, `weight`, `blood_pressure`, `blood_glucose`, `allergies`, `patient_id`, `updated_by_staff_id`) VALUES
(71, '', '2020-04-02', 'corona', 'A', 160, 40, '79', '78', '', 13, 6),
(90, '', '2020-03-03', 'bone cancer', 'B', 150, 50, '60', '60', 'dust', 4, 1),
(111, '', '2020-04-06', 'corona', 'B', 170, 55, '67', '77', 'orange', 5, 0),
(122, '', '2020-04-21', 'obesity', 'AB', 150, 80, '80', '80', 'gluten', 14, 3),
(1233, '', '2020-03-11', 'usus buntu', 'A', 166, 56, '70', '50', 'spicy', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_grade` varchar(128) NOT NULL,
  `room_price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_grade`, `room_price`) VALUES
(1, 'Standard', 500000),
(2, 'UGD', 700000),
(3, 'UGD', 700000),
(4, 'VIP', 1200000),
(5, 'VIP', 1200000),
(6, 'VVIP', 1800000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` int(11) NOT NULL,
  `other_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `symptoms_indications`
--

CREATE TABLE `symptoms_indications` (
  `symptoms_id` int(11) NOT NULL,
  `diagnose_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'denny', 'denny@gmail.com', 'default.jpg', '$2y$10$M8KaRI.8gWGhDWpOJyabquY.fJe4cNu2MTRytDVW8vki7UF66jRDy', 1, 1, 1583908290),
(2, 'raymond', 'raymond@gmail.com', 'default.jpg', '$2y$10$WNrTKAOWSYy4BaB7t.km3.WClsO5FFMZ6TFaHqt8T8DDteeEBzyge', 2, 1, 1583908692),
(3, 'Hendra', 'hendra@gmail.com', 'default.jpg', '$2y$10$JccIBBXtCDuCpQEj24FTvOcWgtHe3wcGplVyzCKvGpzo6y4tuKSzi', 1, 1, 1583910893),
(4, 'testuser', 'test@gmail.com', 'default.jpg', '$2y$10$/jxlZ.cbcZC3sAgV1jgxVeLjGG6d/mET3PVmVMCJhaG9kbzYpRT9O', 1, 1, 1584411172),
(5, 'raysa', 'raysa@gmail.com', 'aesthetic-stickers-png-8.png', '$2y$10$kEfnQAmxwTfS365X2ibva.7PXBra7lulpT2t8hlK7DtmgQPgY6/4W', 2, 1, 1584888336),
(6, 'raysa_admin', 'admin@gmail.com', 'default.jpg', '$2y$10$PCgrDPBpUHi8gpdNpqRRH.1bpWMvnHvfZH1I82FmW.S9g9Zo3kAMS', 1, 1, 1584948030),
(7, 'pakdavid', 'davidh@gmail.com', 'default.jpg', '$2y$10$rC0S84CQcUGSJDMRQJlbzO/LCWH5K77n./9CtHOdi4z4Bg/Ta1B1q', 1, 1, 1584973120);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 2, 3),
(5, 1, 4),
(6, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Inpatient'),
(4, 'Menu'),
(5, 'Patient'),
(6, 'Patient');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin Inpatient'),
(3, 'Doctor'),
(4, 'Pharmacy'),
(5, 'Lab');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user-md', 1),
(4, 2, 'Edit Profile', 'user/edit\r\n', 'fas fa-fw fa-user-edit', 1),
(5, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(6, 3, 'View Inpatient', 'inpatient', 'fas fa-procedures', 1),
(7, 3, 'Register New Inpatient', 'auth/registerInpatient', 'fa-fw fa fa-user-plus', 1),
(8, 3, 'Room', 'inpatient/room', 'fas fas fa-door-closed	', 1),
(12, 5, 'View Patient', 'patient', 'fas fas fa-user-injured	', 1),
(13, 5, 'Register New Patient', 'auth/registerPatient', 'fas fa fa-user-plus', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`bed_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bills_id`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`diagnose_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctors_assigned_to_patient`
--
ALTER TABLE `doctors_assigned_to_patient`
  ADD PRIMARY KEY (`date_from`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `drugs_for_indications`
--
ALTER TABLE `drugs_for_indications`
  ADD PRIMARY KEY (`drugs_indications_id`);

--
-- Indexes for table `inpatient`
--
ALTER TABLE `inpatient`
  ADD PRIMARY KEY (`inpatient_id`);

--
-- Indexes for table `inpatient_treatment`
--
ALTER TABLE `inpatient_treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`nurse_id`);

--
-- Indexes for table `outpatient`
--
ALTER TABLE `outpatient`
  ADD PRIMARY KEY (`outpatient_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `patientMedicalRecord_id` (`patientMedicalRecord_id`);

--
-- Indexes for table `patient_drug_treatment`
--
ALTER TABLE `patient_drug_treatment`
  ADD PRIMARY KEY (`patient_drug_treatment_id`);

--
-- Indexes for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD PRIMARY KEY (`patientMedicalRecord_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `symptoms_indications`
--
ALTER TABLE `symptoms_indications`
  ADD PRIMARY KEY (`symptoms_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bed`
--
ALTER TABLE `bed`
  MODIFY `bed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bills_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `diagnose_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `drug_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drugs_for_indications`
--
ALTER TABLE `drugs_for_indications`
  MODIFY `drugs_indications_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inpatient`
--
ALTER TABLE `inpatient`
  MODIFY `inpatient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inpatient_treatment`
--
ALTER TABLE `inpatient_treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `nurse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `outpatient`
--
ALTER TABLE `outpatient`
  MODIFY `outpatient_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient_drug_treatment`
--
ALTER TABLE `patient_drug_treatment`
  MODIFY `patient_drug_treatment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `symptoms_indications`
--
ALTER TABLE `symptoms_indications`
  MODIFY `symptoms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
