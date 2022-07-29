-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 12:56 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slweightcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `bmi`
--

CREATE TABLE `bmi` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `bmi_value` float NOT NULL,
  `category` varchar(50) NOT NULL,
  `caldate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bmi`
--

INSERT INTO `bmi` (`id`, `username`, `bmi_value`, `category`, `caldate`) VALUES
(1, 'amani', 28.1943, 'Over Weight', '2020-12-15'),
(2, 'achini', 25.9645, 'Over Weight', '2020-12-15'),
(4, 'amani', 18.4765, 'Under Weight', '2020-12-15'),
(26, 'amani', 26.2985, 'Over Weight', '2021-01-03'),
(32, 'aruni', 32.0513, 'OBESE', '2021-01-03'),
(33, 'dilini', 24.0882, 'Normal Weight', '2021-01-03'),
(35, 'sachini', 32.0513, 'OBESE', '2021-01-03'),
(48, 'amani', 22.9481, 'Normal Weight', '2021-02-01'),
(49, 'amani', 31.1951, 'OBESE', '2021-02-01'),
(81, 'nadee', 37.17, 'OBESE', '2021-02-03'),
(82, 'hansi', 24.09, 'Normal Weight', '2021-02-04'),
(84, 'menaka', 31.3, 'OBESE', '2021-02-04'),
(85, 'amani', 27.34, 'Over Weight', '2021-02-14'),
(86, 'amani', 25.96, 'Over Weight', '2021-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `dieticians`
--

CREATE TABLE `dieticians` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `regno` varchar(12) NOT NULL,
  `currentplace` varchar(250) NOT NULL,
  `ppplace` varchar(250) NOT NULL,
  `workingexperience` int(2) NOT NULL,
  `password` varchar(100) NOT NULL,
  `approval` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dieticians`
--

INSERT INTO `dieticians` (`id`, `firstname`, `lastname`, `username`, `email`, `contact`, `nic`, `regno`, `currentplace`, `ppplace`, `workingexperience`, `password`, `approval`) VALUES
(1, 'kamal', 'Bandara', 'kamal', 'kamal@gmail.com', '0718834273', '786789333v', 'slmd1234', 'Kurunegala teaching hospital,kurunegala', 'maharagam medi care, maharagama', 2, 'cbb7de78af0ae6d5845bdf9b58cb0d0f4900f418', 1),
(2, 'Anil', 'Perera', 'anil', 'anil@gmail.com', '712234567', '4567897654v', 'slmc8879', 'Colombo National hospital,Colombo', '', 4, '3a02579c191f8558e3fedece867419cb15398b26', 1),
(3, 'Kumara', 'Eknaligoda', 'kuma', 'kuma@gmail.com', '7156473451', '675436789v', 'slmc3456', 'Colombo National hospital,Colombo', 'Navinne chanel Center, Colombo road, Kurunegala.', 12, 'e8877ff86c63a219f532516fd04f196a5151ad83', 1),
(11, 'akila', 'herath', 'akila', 'akila@gmail.com', '3456789012', '874653123v', 'md1287654', 'Colombo National hospital', 'Navinne chanel Center, Colombo road, Kurunegala.', 5, '67bc4828816577bf277bebe2c29b57b0530532c4', 1),
(17, 'gihan', 'perera', 'gihan', 'abc@gmail.com', '0112345673', '892345678v', 'md5647', 'Colombo National hospital,Colombo', 'maharagam medi care, maharagama', 4, '2ded90af4621435a12946af0691e8b015c07b41e', 1),
(18, 'Anura', 'Silva', 'anura', 'anura@gmail.com', '0712424356', '772345788v', 'mdsl1234', 'Colombo National hospital,Colombo', 'maharagam medi care, maharagama', 5, 'f16b33d9beba7c6c9c1c67ca9837a769bc06522c', 0),
(19, 'Raveen', 'Herath', 'raveen', 'ravi@gmail.com', '0711234567', '875678652v', 'md55678', 'Kurunegala teaching hospital,kurunegala', 'Navinne chanel Center, Colombo road, Kurunegala.', 4, 'aa153b5d1fcb55096034df7a27565f4297f195d2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dietplans`
--

CREATE TABLE `dietplans` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `category` varchar(50) NOT NULL,
  `breakfast` varchar(500) NOT NULL,
  `snack1` varchar(500) NOT NULL,
  `lunch` varchar(500) NOT NULL,
  `snack2` varchar(500) NOT NULL,
  `dinner` varchar(500) NOT NULL,
  `snack3` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dietplans`
--

INSERT INTO `dietplans` (`id`, `username`, `category`, `breakfast`, `snack1`, `lunch`, `snack2`, `dinner`, `snack3`) VALUES
(79, 'menaka', 'vegetarian', '2 thin slices of bread with margerine -  135cal <br>2 medium size bananas (Kolikuttu)  - 210cal ', '1 Highland yoghurt  - 90cal <br>Papaya juice (200ml)  - 114cal ', '1 cup of boiled rice (Red rice)  - 204cal <br>1 cup of boiled rice (Red rice)  - 512cal <br> 4 tbsp dhal curry - 60cal ', ' 1 medium guava - 70cal <br> 1 banana(Ambul) - 110cal <br>2 tbsp cashew nuts - 40cal ', '5 string hoppers -183cal <br>2 tbsp green gram curry -40cal ', '1 banana  -110cal ');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `feedback` text NOT NULL,
  `suggestions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `date`, `username`, `email`, `usertype`, `feedback`, `suggestions`) VALUES
(74, '2020-12-13 15:08:16', 'kamal', 'kamal@gmail.com', 'Dietician', 'good', 'Good system and user friendly. But I think dieticians have to do more work.'),
(76, '2021-01-01 16:50:26', 'sanduni', '', 'Normal user', 'good', 'If you can add more diet plans, it would be better'),
(88, '2021-02-04 07:14:50', '', '', 'Normal user', 'good', ''),
(89, '2021-02-04 07:19:58', '', '', 'Dietician', 'neutral', '');

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE `forum_posts` (
  `post_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_text` text NOT NULL,
  `post_create_time` datetime NOT NULL,
  `post_owner` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_posts`
--

INSERT INTO `forum_posts` (`post_id`, `topic_id`, `post_text`, `post_create_time`, `post_owner`) VALUES
(80, 50, 'what is the exact meaning of these two', '2021-02-04 12:41:59', 'menaka(User)'),
(81, 50, 'vegan are not use any animal product', '2021-02-04 12:43:32', ' amani'),
(82, 50, 'vegan and vegitarians are two difference things', '2021-02-04 12:49:17', ' gihan');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

CREATE TABLE `forum_topics` (
  `topic_id` int(11) NOT NULL,
  `topic_title` varchar(150) NOT NULL,
  `topic_create_time` datetime NOT NULL,
  `topic_owner` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`topic_id`, `topic_title`, `topic_create_time`, `topic_owner`) VALUES
(50, 'Difference between vegan and vegetarian', '2021-02-04 12:41:59', 'menaka(User)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(3, 'amani', 'herath', 'amani', 'amani@gmail.com', 'fd2a83a9fc2a062bda5e3b6055e4842425a02bb7'),
(4, 'Achini', 'Liyanage', 'achini', 'achini@gmail.com', '10af1a10b890c577381f49acc663007acc85cf6c'),
(5, 'Tharushi', 'Rathnayaka', 'tharu', 'tharu@gmail.com', 'f724435f44013f2c7c978200ee5c566824c227fc'),
(6, 'madara', 'Liyanage', 'madara', 'madara@gmail.com', 'a044ea81e3c56100127a6fcdd70b9dddd25fc2e3'),
(20, 'pamalka', 'rathnayaka', 'pamal', 'pamalka@gmail.com', '5f1d7bd4d939a7212ad72a0de839e66ebb05f960'),
(21, 'hansi', 'herath', 'hansi', 'abc@gmail.com', '81509c905224e42282a19b350853c4ec5e010f55'),
(22, 'menaka', 'silva', 'menaka', 'menu@gmail.com', '3c93ca1ac7bd669fcfd0adb12d3a580bebd4d11f');

-- --------------------------------------------------------

--
-- Table structure for table `userstories`
--

CREATE TABLE `userstories` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `story` text NOT NULL,
  `uploadate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userstories`
--

INSERT INTO `userstories` (`id`, `firstname`, `lastname`, `username`, `story`, `uploadate`) VALUES
(2, 'Amani', 'Pathirana', 'amani', 'By using this system I have lost 5kg just in one  month. As a happy user I thought to write my story here may worth for the other friends as well. ', '2020-12-21 16:53:33'),
(8, 'aruni', 'perera', 'aruni', 'I loss my 5kg weight within 1 month. This system is sri lankan user friendly........', '2021-01-03 13:07:02'),
(15, 'amani', 'Pathirana', 'amani', 'i am happy to say........', '2021-02-04 07:14:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bmi`
--
ALTER TABLE `bmi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dieticians`
--
ALTER TABLE `dieticians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dietplans`
--
ALTER TABLE `dietplans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `forum_topics`
--
ALTER TABLE `forum_topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userstories`
--
ALTER TABLE `userstories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bmi`
--
ALTER TABLE `bmi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `dieticians`
--
ALTER TABLE `dieticians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `dietplans`
--
ALTER TABLE `dietplans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `forum_topics`
--
ALTER TABLE `forum_topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `userstories`
--
ALTER TABLE `userstories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
