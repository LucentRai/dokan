-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 08:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dokan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `img`) VALUES
(1, 'art', 'assets/img/thumbnail/category-1.jpg'),
(2, 'antique', 'assets/img/thumbnail/category-2.jpg'),
(3, 'collectible', 'assets/img/thumbnail/category-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `id` varchar(255) NOT NULL,
  `name` varchar(512) NOT NULL,
  `category` int(11) NOT NULL,
  `first_used_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `post_date_time` datetime DEFAULT NULL,
  `seller_username` varchar(255) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `offered_price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`id`, `name`, `category`, `first_used_date`, `status`, `post_date_time`, `seller_username`, `description`, `thumbnail`, `img`, `offered_price`) VALUES
('38fe02b7-fdb1-11ec-b808-98e7435a9c03', 'Mono Lucy', 1, '1990-07-13', 0, '2022-04-04 11:06:45', 'Leonardo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae blandit velit, vitae aliquam justo. Cras ac semper augue. Vivamus justo ligula, dictum et nulla quis, blandit ornare nulla. Aenean at faucibus sem, a tempor risus. Sed euismod neque metus, non molestie lacus condimentum in. Nam varius tellus ullamcorper accumsan accumsan. Vestibulum pellentesque elit sed neque ultricies pretium. Fusce sit amet lobortis arcu, in porttitor ex. Suspendisse potenti. Integer sed sollicitudin arcu. Nulla a rhoncus ante, quis elementum nulla. Ut porttitor vel est et luctus.', 'assets/img/thumbnail/listing/38fe02b7-fdb1-11ec-b808-98e7435a9c03.jpg', 'assets/img/listing/user_upload/38fe02b7-fdb1-11ec-b808-98e7435a9c03.jpg', 300000),
('38fe1035-fdb1-11ec-b808-98e7435a9c03', 'Tiger Leisure Painting', 1, '2022-07-22', 0, '2013-07-03 11:08:03', 'shyam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae blandit velit, vitae aliquam justo. Cras ac semper augue. Vivamus justo ligula, dictum et nulla quis, blandit ornare nulla. Aenean at faucibus sem, a tempor risus. Sed euismod neque metus, non molestie lacus condimentum in. Nam varius tellus ullamcorper accumsan accumsan. Vestibulum pellentesque elit sed neque ultricies pretium. Fusce sit amet lobortis arcu, in porttitor ex. Suspendisse potenti. Integer sed sollicitudin arcu. Nulla a rhoncus ante, quis elementum nulla. Ut porttitor vel est et luctus.', 'assets/img/thumbnail/listing/38fe1035-fdb1-11ec-b808-98e7435a9c03.jpg', 'assets/img/listing/user_upload/38fe1035-fdb1-11ec-b808-98e7435a9c03.jpg', 450000),
('6a0a6e51-fdae-11ec-bbdc-98e7435a9c03', 'Dragon Painting', 1, '1996-07-04', 0, '2026-07-21 11:07:49', 'ram', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae blandit velit, vitae aliquam justo. Cras ac semper augue. Vivamus justo ligula, dictum et nulla quis, blandit ornare nulla. Aenean at faucibus sem,', 'assets/img/thumbnail/listing/6a0a6e51-fdae-11ec-bbdc-98e7435a9c03.jpg', 'assets/img/listing/user_upload/6a0a6e51-fdae-11ec-bbdc-98e7435a9c03.jpg', 150000),
('6fcc8403-fdae-11ec-bbdc-98e7435a9c03', 'Watercolor painting', 1, '1995-05-10', 0, '2022-07-05 11:08:16', 'shyam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae blandit velit, vitae aliquam justo. Cras ac semper augue. Vivamus justo ligula, dictum et nulla quis, blandit ornare nulla. Aenean at faucibus sem,', 'assets/img/thumbnail/listing/6fcc8403-fdae-11ec-bbdc-98e7435a9c03.jpg', 'assets/img/listing/user_upload/6fcc8403-fdae-11ec-bbdc-98e7435a9c03.jpg', 250000),
('88e00e5c-fdb0-11ec-b808-98e7435a9c03', 'Table from 19th Century', 2, '1896-07-06', 0, '2022-07-12 11:08:26', 'ram', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae blandit velit, vitae aliquam justo. Cras ac semper augue. Vivamus justo ligula, dictum et nulla quis, blandit ornare nulla. Aenean at faucibus sem,', 'assets/img/thumbnail/listing/88e00e5c-fdb0-11ec-b808-98e7435a9c03.jpg', 'assets/img/listing/user_upload/88e00e5c-fdb0-11ec-b808-98e7435a9c03.jpg', 250000),
('88e02c18-fdb0-11ec-b808-98e7435a9c03', 'Chinese Vase', 2, '1985-07-19', 0, '2022-05-09 11:08:36', 'shyam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae blandit velit, vitae aliquam justo. Cras ac semper augue. Vivamus justo ligula, dictum et nulla quis, blandit ornare nulla. Aenean at faucibus sem,', 'assets/img/thumbnail/listing/88e02c18-fdb0-11ec-b808-98e7435a9c03.jpg', 'assets/img/listing/user_upload/88e02c18-fdb0-11ec-b808-98e7435a9c03.jpg', 250000),
('a4179a9f-fdb1-11ec-b808-98e7435a9c03', 'Ballet Painting', 1, '2022-07-04', 0, '2022-07-08 11:08:46', 'hari', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae blandit velit, vitae aliquam justo. Cras ac semper augue. Vivamus justo ligula, dictum et nulla quis, blandit ornare nulla. Aenean at faucibus sem, a tempor risus. Sed euismod neque metus, non molestie lacus condimentum in. Nam varius tellus ullamcorper accumsan accumsan. Vestibulum pellentesque elit sed neque ultricies pretium. Fusce sit amet lobortis arcu, in porttitor ex. Suspendisse potenti. Integer sed sollicitudin arcu. Nulla a rhoncus ante, quis elementum nulla. Ut porttitor vel est et luctus.', 'assets/img/thumbnail/listing/a4179a9f-fdb1-11ec-b808-98e7435a9c03.jpg', 'assets/img/listing/user_upload/a4179a9f-fdb1-11ec-b808-98e7435a9c03.jpg', 123456),
('a417a914-fdb1-11ec-b808-98e7435a9c03', 'Chinese clay cup', 3, '2022-07-11', 0, '2022-07-05 11:08:54', 'hari', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae blandit velit, vitae aliquam justo. Cras ac semper augue. Vivamus justo ligula, dictum et nulla quis, blandit ornare nulla. Aenean at faucibus sem, a tempor risus. Sed euismod neque metus, non molestie lacus condimentum in. Nam varius tellus ullamcorper accumsan accumsan. Vestibulum pellentesque elit sed neque ultricies pretium. Fusce sit amet lobortis arcu, in porttitor ex. Suspendisse potenti. Integer sed sollicitudin arcu. Nulla a rhoncus ante, quis elementum nulla. Ut porttitor vel est et luctus.', 'assets/img/thumbnail/listing/a417a914-fdb1-11ec-b808-98e7435a9c03.jpg', 'assets/img/listing/user_upload/a417a914-fdb1-11ec-b808-98e7435a9c03.jpg', 1234),
('e03396c8-fdb1-11ec-b808-98e7435a9c03', 'Anime girl painting', 1, '2022-07-27', 0, '2022-07-04 11:09:16', 'manas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae blandit velit, vitae aliquam justo. Cras ac semper augue. Vivamus justo ligula, dictum et nulla quis, blandit ornare nulla. Aenean at faucibus sem, a tempor risus. Sed euismod neque metus, non molestie lacus condimentum in. Nam varius tellus ullamcorper accumsan accumsan. Vestibulum pellentesque elit sed neque ultricies pretium. Fusce sit amet lobortis arcu, in porttitor ex. Suspendisse potenti. Integer sed sollicitudin arcu. Nulla a rhoncus ante, quis elementum nulla. Ut porttitor vel est et luctus.', 'assets/img/thumbnail/listing/e03396c8-fdb1-11ec-b808-98e7435a9c03.jpg', 'assets/img/listing/user_upload/e03396c8-fdb1-11ec-b808-98e7435a9c03.jpg', 123456),
('e033a77c-fdb1-11ec-b808-98e7435a9c03', 'Piano', 2, '2022-07-04', 0, '2022-07-11 11:09:24', 'manas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae blandit velit, vitae aliquam justo. Cras ac semper augue. Vivamus justo ligula, dictum et nulla quis, blandit ornare nulla. Aenean at faucibus sem, a tempor risus. Sed euismod neque metus, non molestie lacus condimentum in. Nam varius tellus ullamcorper accumsan accumsan. Vestibulum pellentesque elit sed neque ultricies pretium. Fusce sit amet lobortis arcu, in porttitor ex. Suspendisse potenti. Integer sed sollicitudin arcu. Nulla a rhoncus ante, quis elementum nulla. Ut porttitor vel est et luctus.', 'assets/img/thumbnail/listing/e033a77c-fdb1-11ec-b808-98e7435a9c03.jpg', 'assets/img/listing/user_upload/e033a77c-fdb1-11ec-b808-98e7435a9c03.jpg', 456798);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password_hash`, `email`, `phone`) VALUES
('asdf', '$2y$10$uswEbms8gSpkFB7NCauykeFdRboby2K1H4Y3.5Ciw2Xl.zptF.OSO', 'sdf@sdf.com', 'sdf'),
('hari', '$2y$10$EeQ4C5FJ858tLSYMbE1qsOX4nXuXU8qPafaELgp2Ahk74DhT.B7K2', 'hari@nepal.com', '9845678945'),
('ishwor', '$2y$10$B65YFho83I25.qNtx6uJtOKs5U8aExNXsbq7QY9aUOHir/j8QtfYe', 'ishwor@gmail.com', '98123456789'),
('Leonardo', '$2y$10$lUliycAL41J8sHjSbq5GrOYhdd3udxXnLWOqsGj07H8FtAEboc/1O', 'leo@acm.com', '9842064124'),
('lucent', '$2y$10$fiV0j9z566uNE97RZwy0Auo5RqQX1O1KpnNaNI125j7yZMXusCI46', 'lucentthulung@gmail.com', '9812335905'),
('manas', '$2y$10$kt/7B0cvtCBT47vKWEXA7ue8KZtu3svc2EVd1VkeCGcbybwmhYRm6', 'manas@mail.com', '985680541'),
('manis', '$2y$10$Iz6b1fS8rLUGkbHi9QbK/.kOeMjVf7z/T4QBPgvK8RTtGOIPR9oqa', 'manis@gmail.com', '98123456789'),
('ram', '$2y$10$HHNhCgoiPhThbRHwFEEFZuNBVdCIzg0Qj6OuEbGmNfflhgnT3FbBC', 'ram@gmail.com', '98754689'),
('shyam', '$2y$10$nV/FrS4604.OzqCXJxMom.gJOvCGp/fUub2hlVTomB.8I90NLUt4e', 'shyam@shyam.com', '9820546796');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
