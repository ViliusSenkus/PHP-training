-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 04:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `albumname` varchar(255) NOT NULL,
  `performer` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL DEFAULT 'https://f4.bcbits.com/img/a3440516125_16.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `year`, `albumname`, `performer`, `cover`) VALUES
(1, 1992, 'Experience', 'The Prodigy', 'https://upload.wikimedia.org/wikipedia/en/2/27/TheProdigyExperience.jpg'),
(2, 1992, 'Kaip ir tu', 'SEL', 'https://i.discogs.com/0mZVTBLhetybiwuRT8JLr17HRUut0ASPVu3DmGsunzU/rs:fit/g:sm/q:90/h:598/w:600/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTIwNjA0/OTUtMTU0NDk2NjM1/NS00MTIyLmpwZWc.jpeg'),
(3, 1990, 'World Power', 'SNAP', 'https://upload.wikimedia.org/wikipedia/en/b/be/WorldPower-Snap.jpg'),
(4, 2016, 'Born to be Wenders', 'Udo Wenders', 'https://i.scdn.co/image/ab67616d00001e0230e2bd71502861cda7c0632e'),
(5, 2018, 'Raganu Nakts', 'Tautumeitas', 'https://i.scdn.co/image/ab67616d00001e02b3560445b4280ccd623fbc6c'),
(6, 2015, ' Walk With Me', 'Monika Linkytė', 'https://upload.wikimedia.org/wikipedia/lt/d/dd/MLinkyteWalkWithMe.jpg'),
(7, 2021, 'Love Again', 'Dua Lipa', 'https://rovimusic.rovicorp.com/image.jpg?c=-E0gblfr1LdGosA9msXlhQSijaXJlYnq0St31qpAJWo=&f=5'),
(8, 1995, 'Tragic Kingdom', 'No doubt', 'https://upload.wikimedia.org/wikipedia/en/9/9d/No_Doubt_-_Tragic_Kingdom.png'),
(9, 1997, 'Women in Technology', 'White Town', 'https://upload.wikimedia.org/wikipedia/en/1/10/Women_in_technology.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `performer`
--

CREATE TABLE `performer` (
  `id` int(11) NOT NULL,
  `performername` varchar(255) NOT NULL,
  `performerpicture` varchar(255) NOT NULL DEFAULT 'content/img/performer.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `performer`
--

INSERT INTO `performer` (`id`, `performername`, `performerpicture`) VALUES
(1, 'The Prodigy', 'https://www.billboard.com/wp-content/uploads/2021/02/The-Prodigy-cr-Phil-Nicholls-2021-billbard-1548-1612906872.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `performer` varchar(50) NOT NULL,
  `songname` varchar(100) NOT NULL,
  `musicstyle` varchar(50) NOT NULL,
  `album` varchar(100) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `youtube` varchar(200) NOT NULL,
  `songtype` varchar(50) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `performer`, `songname`, `musicstyle`, `album`, `year`, `youtube`, `songtype`, `likes`) VALUES
(1, 'Dua Lipa', 'Love Again', 'pop', 'Love Again', 2021, 'youtube', 'lyric', 0),
(2, 'Monika Linkytė', 'Po Dangum', 'pop', ' Walk With Me', 2015, '', 'lyric', 0),
(3, 'The Prodigy', 'Breath', 'rock', 'The Fat Of The Land', 2009, 'https://www.youtube.com/embed/rmHDhAohJlQ', 'party', 0),
(33, 'SNAP', 'The Power', 'rap', 'World Power', 1990, 'https://www.youtube.com/embed/nm6DO_7px1I', 'party', 0),
(34, 'The Roop', 'On Fire (Quarantine Edition)', 'pop', NULL, 2021, 'https://www.youtube.com/embed/E8IplV37kIA', 'party', 0),
(39, 'Udo Wenders', 'Amada Mia Amore Mio', 'pop', 'Born to be Wenders', 2015, 'https://www.youtube.com/embed/5i4KJrkUDA0', 'party', 0),
(40, 'SEL', 'Kiemas', 'rap', 'Kaip ir tu', 1993, 'https://www.youtube.com/embed/gh3RFCrpi4U', 'party', 0),
(41, 'The Prodigy', 'Wind It Up', 'rock', 'Experience', 1992, 'https://www.youtube.com/embed/QM_8PiSMpTs', 'party', 0),
(42, 'Tautumeitas', 'Raganu Nakts', 'pop', 'Raganu Nakts', 2018, 'https://www.youtube.com/embed/LsgO5OTUsRU', 'lyric', 0),
(43, 'No Doubt', 'Don\'t Speak', 'pop', 'Tragic Kingdom', 1995, 'https://www.youtube.com/embed/TR3Vdo5etCQ', 'romantic', 0),
(44, 'White Town', 'Your Woman ', 'pop', 'Women in Technology', 1997, 'https://www.youtube.com/embed/lVL-zZnD3VU', 'lyric', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(99) NOT NULL,
  `nickname` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `signdate` date NOT NULL DEFAULT current_timestamp(),
  `plan` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `expires` date NOT NULL,
  `playlists` mediumtext DEFAULT NULL,
  `favorites` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `signdate`, `plan`, `password`, `expires`, `playlists`, `favorites`) VALUES
(1, 'admin', 'admin@admin.lt', '2023-02-14', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2028-02-25', NULL, NULL),
(2, 'user', 'user@user.lt', '2023-02-14', 'basic', 'ee11cbb19052e40b07aac0ca060c23ee', '2028-02-25', '{\"Dar vienas userio listas\":[\"41\"]}', '[[\"40\",\"SEL\",\"Kiemas\"],[\"39\",\"Udo Wenders\",\"Amada Mia Amore Mio\"],[\"34\",\"The Roop\",\"On Fire (Quarantine Edition)\"],[\"34\",\"The Roop\",\"On Fire (Quarantine Edition)\"]]'),
(3, 'vilius', 'vilius.s@outlook.com', '2023-02-14', 'basic', '0da16a4cbd8c9b69e58fc93de93c9662', '0000-00-00', '{\"Mano\":[\"39\",\"40\",\"40\"],\"Prodigy\":[\"41\"],\"Naujas\":[\"42\"],\"Sau selai\":[\"40\"],\"90-i\":[\"44\",\"43\"]}', '[[\"40\",\"SEL\",\"Kiemas\"],[\"39\",\"Udo Wenders\",\"Amada Mia Amore Mio\"],[\"34\",\"The Roop\",\"On Fire (Quarantine Edition)\"],[\"34\",\"The Roop\",\"On Fire (Quarantine Edition)\"],[\"42\",\"Tautumeitas\",\"Raganu Nakts\"],[\"42\",\"Tautumeitas\",\"Raganu Nakts\"],[\"42\",\"Tautumeitas\",\"Raganu Nakts\"],[\"40\",\"SEL\",\"Kiemas\"],[\"39\",\"Udo Wenders\",\"Amada Mia Amore Mio\"],[\"42\",\"Tautumeitas\",\"Raganu Nakts\"]]'),
(4, 'mykolas', 'mykolas@mykolas.lt', '2023-02-14', 'basic', '57d36f1b23041a874b9625970d72ac68', '0000-00-00', NULL, NULL),
(5, 'teta', 'teta@teta.lt', '2023-02-14', 'basic', 'd9c4b80884a6623851c5b6cd6a0a001a', '0000-00-00', NULL, '[[\"39\",\"Udo Wenders\",\"Amada Mia Amore Mio\"],[\"41\",\"The Prodigy\",\"Wind It Up\"],[\"41\",\"The Prodigy\",\"Wind It Up\"],[\"41\",\"The Prodigy\",\"Wind It Up\"],[\"40\",\"SEL\",\"Kiemas\"],[\"40\",\"SEL\",\"Kiemas\"]]'),
(6, 'boy', 'boy@boy.com', '2023-02-14', 'basic', '1a699ad5e06aa8a6db3bcf9cfb2f00f2', '0000-00-00', '{\"u0160itas tai Gerulis\":[\"42\",\"41\",\"40\"]}', '[[\"41\",\"The Prodigy\",\"Wind It Up\"],[\"40\",\"SEL\",\"Kiemas\"]]'),
(7, 'new', 'new@new.com', '2023-02-15', 'basic', '22af645d1859cb5ca6da0c484f1f37ea', '0000-00-00', NULL, '[[\"40\",\"SEL\",\"Kiemas\"],[\"41\",\"The Prodigy\",\"Wind It Up\"],[\"42\",\"Tautumeitas\",\"Raganu Nakts\"],[\"42\",\"Tautumeitas\",\"Raganu Nakts\"],[\"42\",\"Tautumeitas\",\"Raganu Nakts\"],[\"42\",\"Tautumeitas\",\"Raganu Nakts\"],[\"42\",\"Tautumeitas\",\"Raganu Nakts\"],[\"41\",\"The Prodigy\",\"Wind It Up\"]]'),
(8, 'Darvienas', 'nera@ir.nereikia', '2023-02-20', 'basic', 'de8c8e275f9f7cbf72448051600086fe', '0000-00-00', '{\"90s HITS\":[\"41\",\"3\",\"33\"]}', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `albumname` (`albumname`,`performer`);

--
-- Indexes for table `performer`
--
ALTER TABLE `performer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
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
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `performer`
--
ALTER TABLE `performer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
