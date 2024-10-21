-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 10:38 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_application_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `intake` varchar(50) DEFAULT NULL,
  `comment` varchar(300) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `course_id`, `intake`, `comment`, `timeStamp`) VALUES
(22, 15, 1, 'January 2024', '', '2024-10-20 19:23:50'),
(23, 15, 3, 'January 2024', '', '2024-10-20 19:24:18'),
(24, 15, 4, 'January 2024', '', '2024-10-20 19:24:30'),
(25, 16, 3, 'January 2024', '', '2024-10-20 20:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `description`) VALUES
(1, 'Medical Engineering', 'Biomedical engineering or medical engineering is the application of engineering principles and design concepts to medicine and biology for healthcare applications. BME is also traditionally logical sciences to advance health care treatment, including diagnosis, monitoring, and therapy.'),
(2, 'Dental Technology', 'Dental Technology. Dental Technology is a specialty in the field of dentistry that deals with the treatment and rehabilitation of the tissues of the oral.'),
(3, 'Nursing', 'Nursing is a health care profession that "integrates the art and science of caring and focuses on the protection, promotion, and optimization of health and human functioning; prevention of illness and injury; facilitation of healing; and alleviation of suffering through compassionate presence'),
(4, 'Pharmacy', 'Pharmacy is the science and practice of discovering, producing, preparing, dispensing, reviewing and monitoring medications, aiming to ensure the safe, effective, and affordable use of medicines. It is a miscellaneous science as it links health sciences with pharmaceutical sciences and natural sciences.'),
(5, 'Health System Management', 'Diploma in Optometry\r\nDiploma in Physiotherapy\r\nHealth Systems Management\r\nHealth Systems Management\r\nHealth Systems Management; Safe Phlebotomy; Integumentary and wound care; Geriatric Rehabilitation; Nutrition in critical care; Point of Care Ultrasound in.'),
(6, 'Nutrition and Dietetics', 'Higher Diploma In Psychiatry(Psychiatry)\r\nNutrition and Dietetics\r\nNutrition and Dietetics\r\nProgrammes Search ; 7, CERTIFICATE IN HEALTH RECORDS AND INFORMATION TECHNOLOGY, Health Sciences & Related ; 8, CERTIFICATE IN NUTRITION & DIETETICS, Health.'),
(7, 'Physiotherapy', 'Diploma in Optometry\r\nDiploma in Physiotherapy\r\nDiploma in Physiotherapy\r\nOrthopaedic and Trauma Medicine (Certificate, Diploma and Higher Diploma); Physiotherapy (Diploma and Higher Diploma). Short courses (as at January 2024).'),
(8, 'Public Health', 'Public health is "the science and art of preventing disease, prolonging life and promoting health through the organized efforts and informed choices of society, organizations, public and private, communities and individuals"'),
(9, 'Adherence Counseling', 'HIV Training and Counseling Services (HTS); Adherence Counseling; Echocardiography; Monitoring & Evaluation; Healthcare Entrepreneurship; Safe Phlebotomy.'),
(10, 'Occupational Health And Safety', 'Occupational safety and health or occupational health and safety is a multidisciplinary field concerned with the safety, health, and welfare of people at work. OSH is related to the fields of occupational medicine and occupational hygiene and aligns with workplace health promotion initiatives.'),
(11, 'Basic and advanced life support', 'Basic and Advanced Life Support · Test · Upper Extremity Splinting in Occupational Therapy. Certificate in Community Health Extension Work. HIV Testing services.'),
(12, 'Psychiatry', 'Higher Diploma Courses / Higher DIploma in Mental Health and Psychiatry · Faculty of Clinical Sciences / Department of Clinical Medicine and Surgery / Higher');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(15, 'serah', '$2y$10$tD.gB9FOiuGZhmnFskCOVeAW/V8cvfWbM8R3SChgKEtNACMoaFYiO', 'serah@gmail.com'),
(16, 'simon', '$2y$10$.B4Hegqimngrn8KzPfxH/ewTZBjfLNA.bs7tkXGA3qnE.ypb0ogna', 'simon@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`course_id`,`intake`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
