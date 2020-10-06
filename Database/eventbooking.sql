-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2019 at 04:33 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tennisevent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstName`, `lastName`, `email`, `password`) VALUES
(2, 'Amro', 'Soliman', 'admin@admin.com', '000000');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(4) NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `event_location` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `event_description` mediumtext COLLATE utf8mb4_bin,
  `event_price` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_location`, `event_description`, `event_price`) VALUES
(11, 'Tennis match', 'Stockholm, Sweden.', 'a tennis matchh in sweden\r\n            ', 500),
(12, 'Tennis match', 'kalmar, Sweden.', 'a tennnis worldcup match.    ', 600),
(13, 'Tennis match', 'Halmstad, Sweden.', 'Another great tennis match.', 400);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `ticket_pin` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `ticket_holder` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `event_id`, `ticket_pin`, `ticket_holder`, `status`) VALUES
(405, 4, '5519', 1, 'Used'),
(406, 1, '0980', 1, 'Used'),
(407, 1, '7376', 1, 'Used'),
(408, 3, '4469', 1, 'Used'),
(409, 1, '9219', 1, 'Used'),
(410, 3, '2215', 8, 'pending'),
(411, 2, '4444', 8, 'pending'),
(412, 1, '2215', 8, 'pending'),
(413, 2, '4444', 8, 'pending'),
(414, 1, '1221', 1, 'pending'),
(415, 1, '5367', 1, 'pending'),
(416, 1, '5865', 1, 'pending'),
(417, 1, '3216', 1, 'pending'),
(418, 1, '1183', 1, 'pending'),
(419, 1, '5877', 1, 'pending'),
(420, 1, '5669', 1, 'pending'),
(421, 1, '3320', 1, 'pending'),
(422, 1, '5542', 1, 'pending'),
(423, 1, '1964', 1, 'pending'),
(424, 1, '5065', 1, 'pending'),
(425, 1, '4599', 1, 'pending'),
(426, 1, '8499', 1, 'pending'),
(427, 1, '4184', 1, 'pending'),
(428, 1, '7191', 1, 'pending'),
(429, 1, '4793', 1, 'pending'),
(430, 1, '8054', 1, 'pending'),
(431, 1, '8219', 1, 'pending'),
(432, 1, '2716', 1, 'pending'),
(433, 1, '4573', 1, 'pending'),
(434, 1, '3729', 1, 'pending'),
(435, 1, '1856', 1, 'pending'),
(436, 1, '2904', 1, 'pending'),
(437, 1, '6791', 1, 'pending'),
(438, 1, '2319', 1, 'pending'),
(439, 1, '3788', 1, 'pending'),
(440, 1, '0881', 1, 'pending'),
(441, 1, '4486', 1, 'pending'),
(442, 1, '3660', 1, 'pending'),
(443, 1, '9817', 1, 'pending'),
(444, 1, '0988', 1, 'pending'),
(445, 1, '3714', 1, 'pending'),
(446, 1, '1438', 1, 'pending'),
(447, 1, '2011', 1, 'pending'),
(448, 1, '2066', 1, 'pending'),
(449, 1, '3758', 1, 'pending'),
(450, 1, '3854', 1, 'pending'),
(451, 1, '9313', 1, 'pending'),
(452, 1, '9887', 1, 'pending'),
(453, 1, '3540', 1, 'pending'),
(454, 1, '9983', 1, 'pending'),
(455, 1, '4040', 1, 'pending'),
(456, 1, '0838', 1, 'pending'),
(457, 1, '6499', 1, 'pending'),
(458, 1, '5836', 1, 'pending'),
(459, 1, '8364', 1, 'pending'),
(460, 1, '0417', 1, 'pending'),
(461, 1, '9086', 1, 'pending'),
(462, 1, '0867', 1, 'pending'),
(463, 1, '9789', 1, 'pending'),
(464, 1, '6060', 1, 'pending'),
(465, 1, '1230', 1, 'pending'),
(466, 1, '8297', 1, 'pending'),
(467, 1, '6821', 1, 'pending'),
(468, 1, '9753', 1, 'pending'),
(469, 1, '7869', 1, 'pending'),
(470, 1, '8715', 1, 'pending'),
(471, 1, '5459', 1, 'pending'),
(472, 1, '3328', 1, 'pending'),
(473, 1, '6824', 1, 'pending'),
(474, 1, '4823', 1, 'pending'),
(475, 1, '9009', 1, 'pending'),
(476, 1, '0835', 1, 'pending'),
(477, 1, '0519', 1, 'pending'),
(478, 1, '4158', 1, 'pending'),
(479, 1, '5773', 1, 'pending'),
(480, 1, '5472', 1, 'pending'),
(481, 1, '4551', 1, 'pending'),
(482, 1, '2636', 1, 'pending'),
(483, 1, '7340', 1, 'pending'),
(484, 1, '4650', 1, 'pending'),
(485, 1, '7742', 1, 'pending'),
(486, 1, '5427', 1, 'pending'),
(487, 1, '0375', 1, 'pending'),
(488, 1, '3401', 1, 'pending'),
(489, 1, '2902', 0, 'pending'),
(490, 1, '5202', 0, 'pending'),
(491, 1, '4691', 9, 'pending'),
(492, 1, '5884', 9, 'pending'),
(493, 1, '6440', 9, 'pending'),
(494, 1, '3902', 1, 'pending'),
(495, 11, '3881', 9, 'pending'),
(496, 1, '8710', 1, 'pending'),
(497, 1, '5813', 1, 'pending'),
(498, 11, '3046', 8, 'pending'),
(499, 11, '4348', 8, 'pending'),
(500, 11, '3747', 8, 'Used'),
(545, 11, '9', 9, 'pending'),
(546, 11, '4', 9, 'pending'),
(547, 11, '0', 9, 'pending'),
(548, 12, '0', 9, 'pending'),
(549, 12, '3', 9, 'pending'),
(550, 12, '5', 9, 'pending'),
(551, 12, '', 9, 'pending'),
(552, 12, '', 9, 'pending'),
(553, 12, '', 9, 'pending'),
(554, 12, '', 9, 'pending'),
(555, 11, '0462', 9, 'pending'),
(556, 11, '1517', 9, 'pending'),
(557, 11, '4881', 9, 'pending'),
(558, 12, '7465', 9, 'pending'),
(559, 12, '6780', 9, 'pending'),
(560, 12, '9317', 9, 'pending'),
(561, 12, '6505', 9, 'Used'),
(562, 12, '1899', 9, 'Used'),
(563, 12, '9740', 9, 'Used'),
(564, 12, '4505', 9, 'Used');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `firstName` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `lastName` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `password`, `email`, `country`, `city`) VALUES
(17, 'Amro', 'Soliman', '$2y$10$hOZYyel8GwRECySrp6g.oeh2jx.IgE.gTIjR2EYI04ffGz3J8Ni.K', 'amro@mail.com', 'Sweden', 'Stockholm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=565;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
