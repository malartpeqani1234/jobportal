-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 02:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `category-name` varchar(50) NOT NULL,
  `category-image` varchar(255) DEFAULT NULL,
  `category-description` varchar(255) DEFAULT 'Category Description Empty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category-name`, `category-image`, `category-description`) VALUES
(1, 'Software development', 'image-blog-future-software-development.png', 'The process of designing, coding, testing, and maintaining software programs, applications, and systems.'),
(2, 'Data science and analytics', '0x0.jpg', 'The practice of collecting, processing, and analyzing large and complex data sets to extract insights and solve business problems.'),
(3, 'Cybersecurity', 'download.jpg', 'The protection of computer systems, networks, and data from theft, damage, or unauthorized access.'),
(4, 'Cloud computing', 'download (1).jpg', 'The delivery of computing services, including servers, storage, databases, and software, over the internet on a pay-as-you-go basis.'),
(5, 'Network and systems administration', 'computer-networking-system-administration-2-illustration.jpg', 'The management of computer networks, servers, and other IT infrastructure to ensure that they operate effectively and securely.'),
(6, 'Project management', 'download (2).jpg', 'The process of planning, organizing, and overseeing resources to achieve specific goals and objectives within a defined timeline and budget.'),
(7, 'UI/UX design', 'download (3).jpg', 'UI/UX design'),
(8, 'Technical writing', 'download (4).jpg', 'The practice of creating technical documentation, such as user manuals, system specifications, and help files, for software applications, hardware products, and other technical systems.'),
(9, 'Quality assurance/testing', 'download (5).jpg', 'The process of ensuring that software programs, applications, and systems meet specified requirements and operate as intended through testing and debugging.'),
(10, 'DevOps engineering', 'download (6).jpg', 'The practice of combining software development and IT operations to accelerate the development, testing, and deployment of software products and services.');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `job-name` varchar(255) NOT NULL,
  `job-description` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `category` int(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `when_posted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job-name`, `job-description`, `city`, `category`, `schedule`, `email`, `when_posted`) VALUES
(1, 'Programmer', 'U can do stuff', 'Array', 3, 'parttime', 'vesa@gmail.com', '2023-05-20 16:36:25'),
(2, 'Programmer', 'U can do stuff', 'Array', 3, 'parttime', 'vesa@gmail.com', '2023-05-20 16:36:25'),
(3, 'Programmer', 'U can do stuff', 'Array', 3, 'parttime', 'vesa@gmail.com', '2023-05-20 16:36:25'),
(4, 'Programmer', 'U can do stuff', 'Array', 3, 'parttime', 'vesa@gmail.com', '2023-05-20 16:36:25'),
(5, 'Programmer', 'U can do stuff', 'Array', 3, 'parttime', 'vesa@gmail.com', '2023-05-20 16:36:25'),
(6, 'Programmer', 'U can do stuff', 'Array', 2, 'intern', 'malartpeqani@gmail.com', '2023-05-20 16:36:25'),
(7, 'sdisdi', 'In the code snippet you provided, there doesn\'t appear to be any immediate issues. However, there are a few suggestions and best practices you can follow to improve the code and avoid potential errors:  SQL Injection: It\'s important to sanitize user input', 'Array', 4, 'fulltime', 'malartpeqani@gmail.com', '2023-05-25 21:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `full-name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full-name`, `email`, `password`, `usertype`) VALUES
(1, 'Malart Peqani', 'malartpeqani@gmail.com', 'malart123', 'user'),
(2, 'admin', 'admin@admin.com', 'admin123', 'admin'),
(3, 'Blin Peqani', 'blinpeqani@gmail.com', 'blini123', 'user'),
(4, 'Ammar Sylejmani', 'ammarsylejmani@gmail.com', 'amar123', 'user'),
(5, 'Erza Gacaferi', 'erzagaceferi@gmail.com', 'erza123', 'user'),
(6, 'Arianit', 'niti@gmail.com', '12345678', 'user'),
(7, 'fisnik', 'fisnik@gmail.com', 'fisi123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
