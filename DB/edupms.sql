-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 10:49 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edupms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(10) NOT NULL,
  `patient_id` varchar(20) NOT NULL,
  `doctor_id` varchar(20) NOT NULL,
  `doctor_name` text NOT NULL,
  `symptom` varchar(200) NOT NULL,
  `past_history` varchar(100) NOT NULL,
  `bp` varchar(12) NOT NULL,
  `test_result` varchar(200) NOT NULL,
  `appointment_date` varchar(20) NOT NULL,
  `visited_flag` text NOT NULL,
  `work_day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient_id`, `doctor_id`, `doctor_name`, `symptom`, `past_history`, `bp`, `test_result`, `appointment_date`, `visited_flag`, `work_day`) VALUES
(80, 'user3168', 'doct01', 'Dr. Ahmed', 'Fever', 'Cold-cough', '120', 'None', '2020-05-13 14-52-34', 'Visited', '2020-05-13'),
(81, 'user3169', 'doct01', 'Dr. Ahmed', 'Cold-cough', 'Fever', '121', 'None', '2020-05-13 14-53-09', 'Pending', '2020-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(10) NOT NULL,
  `patient_id` varchar(20) NOT NULL,
  `past_history` varchar(200) NOT NULL,
  `symptom` varchar(200) NOT NULL,
  `test_result` varchar(200) NOT NULL,
  `basic_info` varchar(200) NOT NULL,
  `tests` varchar(200) NOT NULL,
  `prescription` varchar(200) NOT NULL,
  `prescription_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `patient_id`, `past_history`, `symptom`, `test_result`, `basic_info`, `tests`, `prescription`, `prescription_date`) VALUES
(55, 'user3168', 'Cold-cough', 'Fever', 'None', 'Bed rest, Avoid cold food', 'None', 'Paracetamol (1-1-1) (1 Week)', '2020-05-13 14:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_images`
--

CREATE TABLE `prescription_images` (
  `id` int(10) NOT NULL,
  `patient_id` varchar(20) NOT NULL,
  `image` blob NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `admin_valid` int(1) NOT NULL,
  `doctor_created` int(1) NOT NULL,
  `date_doct_added` date NOT NULL,
  `has_assistant` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sp_users`
--

CREATE TABLE `sp_users` (
  `id` int(10) NOT NULL,
  `sp_user_type` text NOT NULL,
  `name` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(14) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` text NOT NULL,
  `date_joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `patient_id` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `dob` datetime NOT NULL DEFAULT current_timestamp(),
  `age` int(3) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL,
  `profession` text NOT NULL,
  `address` varchar(200) NOT NULL,
  `reg_date` datetime NOT NULL,
  `role` varchar(10) NOT NULL,
  `new_appointment_lock` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `patient_id`, `pass`, `email`, `phone`, `dob`, `age`, `gender`, `blood_group`, `weight`, `height`, `profession`, `address`, `reg_date`, `role`, `new_appointment_lock`) VALUES
(15, 'Mr. Ahad', 'user3168', '123', 'patient-ahad@gmail.com', 1844332211, '2000-04-01 00:00:00', 20, 'Male', 'A', 50, 5.5, 'Teacher', 'GEC, CTG', '2020-04-29 02:16:24', 'Patient', 1),
(16, 'Akib', 'user3169', '123', 'abc2@gmail.com', 1800, '2000-05-01 00:00:00', 20, 'Male', 'A', 50, 5.5, 'Engineer', 'GEC, CTG', '2020-05-02 17:27:40', 'Patient', 1),
(18, 'Abir', 'user3170', '123', 'abc3@gmail.com', 1800, '2000-05-01 00:00:00', 20, 'Male', 'A', 50, 5.5, 'Engineer', 'GEC, CTG', '2020-05-03 00:21:43', 'Patient', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_images`
--
ALTER TABLE `prescription_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_users`
--
ALTER TABLE `sp_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `prescription_images`
--
ALTER TABLE `prescription_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_users`
--
ALTER TABLE `sp_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
