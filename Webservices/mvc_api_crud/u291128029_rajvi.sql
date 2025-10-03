-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 15, 2025 at 11:53 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u291128029_rajvi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Block','Unblock') NOT NULL DEFAULT 'Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'Vipul kumar', 'rajvi@gmail.com', 'rajvi@123', 'Unblock');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `service_id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `app_Date` date NOT NULL,
  `status` enum('Approved','Pending') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `service_id`, `userid`, `app_Date`, `status`) VALUES
(21, 24, 122, '2024-12-13', 'Approved'),
(22, 26, 122, '2024-12-27', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `blog_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `blog_img`) VALUES
(55, 'sdsad ss', 'sadsads', '1727335312_2.jpg'),
(61, 'sdasd sdsdsad', 'sdsadsadsd', '1737712659_download (2).jfif');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `cate_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `cate_img`) VALUES
(78, 'HAIR TREATMENT', '1739169465_HAIR TREATMENT.jpg'),
(79, 'SKIN TREATMENT', '1739021079_skin treatment1.jpg'),
(81, 'FACIAL', '1739007953_facial treatment.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `mobile`, `comment`) VALUES
(9, 'vipul', 'texuslifecare840@gmail.com', 919106856105, 'hello'),
(26, 'TEXUS LIFE CARE', 'texuslifecare840@gmail.com', 9898244350, 'hello'),
(27, 'arya', 'arya@gmail.com', 1234567891, 'demo inquiry');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` bigint(255) NOT NULL,
  `ser_img` varchar(255) NOT NULL,
  `status` enum('Block','Unblock') NOT NULL DEFAULT 'Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `cate_id`, `service_name`, `description`, `price`, `ser_img`, `status`) VALUES
(22, 81, 'HYDRA FACIAL', 'The HydraFacial is an advanced, non-invasive skin treatment that cleanses, exfoliates, and hydrates your skin in a single session. It’s a popular choice for individuals looking for a quick, effective way to rejuvenate their skin with no downtime.', 1199, '1737954807_SKIN TREATMENT.jpg', 'Unblock'),
(24, 79, 'MICROBLEDING', 'Microblading is a semi-permanent cosmetic procedure designed to enhance the appearance of eyebrows and lips. It involves the use of a hand-held tool with fine needles to deposit pigment into the upper layers of the skin', 2499, '1732812642_MICRONEEDLING.jpg', 'Unblock'),
(25, 81, 'CARBON FACIAL', 'A carbon facial, also known as the \"Hollywood Peel,\" is a non-invasive laser treatment designed to rejuvenate the skin, treat acne, and reduce signs of aging. This advanced treatment uses a layer of liquid carbon and a laser to cleanse, exfoliate, and imp', 1498, '1732813190_carbon facial.jpg', 'Unblock'),
(26, 79, 'CHEMICAL PEELING', 'Chemical peeling is a dermatological procedure that involves applying a chemical solution to the skin to exfoliate and remove its damaged outer layers. This treatment promotes cell turnover, revealing smoother, clearer, and more youthful-looking skin.', 1199, '1737954968_CHEMICAL PEEL.jpg', 'Unblock'),
(27, 79, 'MICRONEEDLING', 'Microneedling, is a minimally invasive skin treatment that uses tiny, sterile needles to create micro-injuries on the skin. These controlled injuries trigger the body’s natural healing process and boosting collagen ', 2499, '1738256295_MICRO NEEDLING.jpg', 'Unblock'),
(29, 79, 'SKIN PIGMENTATION', 'Skin pigmentation refers to changes in skin color due to excess or reduced melanin production. It can appear as dark patches, uneven skin tone, or lighter spots, affecting overall skin appearance.', 1499, '1738260557_SKIN PIGMENTATION.jpg', 'Unblock'),
(31, 81, 'KOREAN GLASS SKIN FACIAL', 'Korean Glass Skin Facial is a multi-step skincare routine designed to give your skin a smooth, dewy, and radiant look—just like a piece of glass. It focuses on deep hydration, gentle exfoliation, and layering lightweight skincare products to achieve a lum', 2499, '1739189782_korean facial.jpg', 'Unblock'),
(33, 81, 'OXYGENEO FACIAL', 'OxyGeneo facial is an advanced skin rejuvenation treatment that combines exfoliation, oxygenation, and nourishment for healthier, glowing skin. It is often referred to as a \"super facial\" because it delivers multiple benefits in one session.', 1999, '1739192416_OXYGENO.jpg', 'Unblock'),
(34, 81, 'FIRE AND ICE FACIAL', 'The Fire and Ice Facial is a popular professional skincare treatment designed to rapidly resurface the skin, reduce fine lines and wrinkles, and promote a smooth, glowing complexion. It is also known as the \"Red Carpet Facial\" because of its instant brigh', 2499, '1739251014_FIRE AND ICE.jpg', 'Unblock'),
(35, 79, 'ACNE AND ACNE SPOTS TREATMENT', 'Acne can be frustrating, but the right treatment can transform your skin! Our expert cosmetologists offer personalized, science-backed solutions to target breakouts, reduce inflammation, and prevent future acne.', 1199, '1739259934_ACNE.jpg', 'Unblock'),
(36, 79, 'LASER HAIR REMOVAL FOR MALE & FEMALE', 'Laser Hair Removal is a popular cosmetic procedure used to remove unwanted hair by targeting the hair follicles with concentrated light. The light is absorbed by the pigment in the hair, which damages the follicle and inhibits future hair growth.', 500, '1739279611_LASER HAIR REMOVAL1.jpg', 'Unblock'),
(37, 79, 'MOLE & WART REMOVAL', 'Mole removal by cautery is a safe and effective procedure that uses heat to remove unwanted moles, skin tags, or small benign growths. This method is minimally invasive, requires little downtime.', 497, '1739281038_MOLE.jpg', 'Unblock'),
(38, 79, 'ANTI AGING ', 'Anti-aging treatments help reduce wrinkles, fine lines, sagging skin, and other signs of aging to achieve a youthful and radiant appearance', 1499, '1739282024_ANTI AGING.jpg', 'Unblock'),
(39, 78, 'HAIR PRP', 'Hair loss can be frustrating, but with PRP therapy you can naturally stimulate hair growth and improve hair density. Our advanced PRP hair treatment is a safe, non-surgical solution designed to rejuvenate hair follicles and promote healthier, thicker hair', 1999, '1739426652_hair prp.jpg1.jpg', 'Unblock'),
(40, 78, 'HAIR SPA', 'Hair spa is a luxurious treatment designed to rejuvenate and nourish your hair , promoting both health and shine. Our expert stylist use high-quality products infused with natural ingredients that hydrate, repair and restore damaged strands', 999, '1739448432_hair spa.jpg', 'Unblock');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` bigint(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` enum('Block','Unblock') NOT NULL DEFAULT 'Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `mobile`, `img`, `status`) VALUES
(122, 'nirav', 'nirav@gmail.com', '1234', 1234567891, '1727516047_photo.jpg', 'Unblock');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
