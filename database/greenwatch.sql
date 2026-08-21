-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2026 at 08:35 AM
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
-- Database: `greenwatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `image_before` varchar(255) DEFAULT NULL,
  `image_after` varchar(255) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `date_reported` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `title`, `description`, `location`, `image_before`, `image_after`, `feedback`, `status`, `date_reported`) VALUES
(1, 'Garbage dumping', 'Accumulation of garbage or hazardous waste dumped in open areas posing a serious threat to public health and the environment.', 'Near Bus Stop ,Sector 10', 'uploads/garbageissue.jfif', 'uploads/solvedplasticissue.jpeg', 'thank you for reporting issue solved successfully', 'Verified', '2025-08-16 01:07:03'),
(2, 'Pastic Pollution', 'Many plastic bottles are scattered in area any many peoples are suffering from lots of issues', 'Near Gandhi Chauk.', 'uploads/plasticbottle.jfif', 'uploads/solvedgarbageissue.jfif', 'thank you for reporting issue solved successfully', 'Verified', '2025-08-16 01:13:01'),
(3, 'Water Pollution', 'Contamination of  water rivers ,ponds due to chemical discharges, Oli spills\r\naffecting aquatic life as well as human life', 'Near shivaji park.', 'uploads/waterpollution.jfif', 'uploads/solvedwaterpollution.jfif', 'thank you for reporting issue solved successfully', 'Verified', '2025-08-16 01:16:34'),
(4, 'Air Pollution', 'By many vehicals on the areas are spreading a lots of dangerous chemical in air affecting human life', 'Near Shivaji Chauk', 'uploads/airpollutionissue.jfif', 'uploads/airpollutionsolved.jfif', 'thank you for reporting issue solved successfully', 'Verified', '2025-08-16 01:19:43'),
(5, 'Noise Pollution', 'Many peoples in the area making a lots of noise in the function by the making sounds volume more which causes many problems to the people live in this area', 'Near Sanvidhan chauk', 'uploads/noiseissue.jfif', 'uploads/solvedglassissue.jfif', 'thank you for reporting issue solved successfully', 'Verified', '2025-08-16 01:31:07'),
(6, 'Noise Pollution', 'dsgdfshfh', 'Near Sanvidhan chauk', 'uploads/plasticbottle.jfif', 'uploads/solvedgarbageissue.jfif', 'fhfj', 'Verified', '2025-08-18 20:23:04'),
(7, 'Noise Pollution', 'fdhfuk', 'Near Sanvidhan chauk', 'uploads/plasticbottle.jfif', 'uploads/solvedgarbageissue.jfif', 'dflkdsjgl', 'Verified', '2025-08-18 20:24:58'),
(8, 'gfgfadsfdf', 'asdgdsg', 'dsagdg', 'uploads/plasticbottle.jfif', 'uploads/plasticbottle.jfif', 'rgafhgf', 'Verified', '2025-08-18 22:29:34'),
(9, 'tfdhsf', 'sfhnfsgh', 'sfgh', 'uploads/pic.png', 'uploads/plasticbottle.jfif', 'hsghs', 'Verified', '2025-08-19 20:23:26'),
(10, 'tfdhsf', 'kjhkb', 'sfgh', 'uploads/plasticbottle.jfif', 'uploads/solvedgarbageissue.jfif', 'ghdgj', 'Verified', '2025-08-20 22:00:17'),
(11, 'garbage issue', 'dfdgfd', 'sdfghdfsh', 'uploads/nature.webp', NULL, NULL, 'Pending', '2025-09-12 23:20:39'),
(12, 'garbage issue', 'fgdsg', 'sdfghdfsh', 'uploads/nature.webp', NULL, NULL, 'Pending', '2025-09-12 23:30:37'),
(13, 'fakslhdfdso', 'afadsf', 'asfds', 'uploads/nature2.jfif', 'uploads/nature3.jfif', 'dsgff', 'Verified', '2025-11-04 12:09:44'),
(14, 'fhh', 'gyjj', 'gb', 'uploads/nature2.jfif', NULL, NULL, 'Pending', '2026-01-05 15:22:04'),
(15, 'garbage dumpiing', 'some people are creating garbage', 'near stops', 'uploads/atma.jpg', NULL, NULL, 'Pending', '2026-07-04 09:06:29'),
(16, 'plastic waste', 'people are throwing plastic bottles inside the area', 'near gandhi chowk', 'uploads/plasticbottle.jfif', 'uploads/airpollutionsolved.jfif', 'issue solved', 'Verified', '2026-08-19 18:27:31'),
(17, 'plastic waste', 'some peoples are throwing plastic waste on the road', 'near gandhi Chauka', 'uploads/plasticbottle.jfif', 'uploads/airpollutionsolved.jfif', 'solved', 'Verified', '2026-08-19 19:04:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
