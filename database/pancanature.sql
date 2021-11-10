-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2021 at 09:29 PM
-- Server version: 8.0.26-0ubuntu0.20.04.3
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pancanature`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int NOT NULL,
  `image_header` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image_footer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `image_header`, `title`, `sub_title`, `description`, `image_footer`) VALUES
(2, 'png-clipart-programm-3-2010-microsoft-office-icon.png', 'test', 'test', '<p>test</p>\r\n', 'dbae6abd-9e38-4617-b33d-07697e52e3ec.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `image`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'cara memasak keongs', '<p>cara memasak keongs</p>\r\n', '1200px-Microsoft_Office_2010.svg.png', 0, '2021-10-17 02:29:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `title`, `image`, `description`) VALUES
(2, 'sdf', '6bd9082d-3546-47b4-97f3-eb86058ea59d.jpeg', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `certificate_images`
--

CREATE TABLE `certificate_images` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `certificate_images`
--

INSERT INTO `certificate_images` (`id`, `title`, `image`, `description`) VALUES
(1, 'test', 'cc84e232-b39f-4bdf-beb2-675bc5622a4b.jpeg', '<p>kkkk</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `company_profiles`
--

CREATE TABLE `company_profiles` (
  `id` int NOT NULL,
  `logo` varchar(255) NOT NULL,
  `motto` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `social_medias` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company_profiles`
--

INSERT INTO `company_profiles` (`id`, `logo`, `motto`, `address`, `phone`, `email`, `social_medias`) VALUES
(1, '324-3242978_perusahaan-gas-negara-logo-png-clipart.png', 'Far far away, behind the word mountains, far from the countries.', 'test', 'test', 'test', '{\"type\":[\"facebook\",\"ig\"],\"link\":[\"test\",\"test\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `description`, `image`) VALUES
(1, 'Cosmetic Industry', 'Lorem ipsum dolor sit amet consectetur adipisicing onsectetur adipisicing elit.', '1200px-Microsoft_Office_2010.svg.png');

-- --------------------------------------------------------

--
-- Table structure for table `made_ofs`
--

CREATE TABLE `made_ofs` (
  `id` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `made_ofs`
--

INSERT INTO `made_ofs` (`id`, `title`, `image`, `description`) VALUES
(1, 'test', '630e1b4a1c4a46b18ca395ba74e3e578.jpg', 'halal');

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE `missions` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `missions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`id`, `title`, `description`, `missions`) VALUES
(1, 'Our Mission', '', '[\"Mengutamakan inovasi produk dari segi kualitas dan kuantitas.\",\"Memprioritaskan sumber bahan baku dari hasil pertanian lokal.\",\"\"]');

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` int NOT NULL,
  `image_header` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image_footer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `image_header`, `title`, `sub_title`, `description`, `image_footer`) VALUES
(1, 'cc84e232-b39f-4bdf-beb2-675bc5622a4b.jpeg', 'test', 'testdst', '<p>test</p>\r\n', 'webinar.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`) VALUES
(49, 'French Latte', 'Racikan sempurna antara rasa tiramisu yang lembut dan manis, dipadukan dengan house blend espresso dari Robocup. Semakin memanjakan lidah!', 'Product Robocup-05.png'),
(64, 'test', 'test', 'webinar.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category`, `description`, `image`) VALUES
(5, 'COFFEE', 'Introducing Bofi & Sofi. They are very passionate workers and entrepreneurs. Always look stylish and bold in all conditions. These are a drink recommendation from them.', 'cc84e232-b39f-4bdf-beb2-675bc5622a4b.jpeg'),
(12, 'test', 'test\r\n', 'webinar.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_category_details`
--

CREATE TABLE `product_category_details` (
  `id` int NOT NULL,
  `product_category_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_category_details`
--

INSERT INTO `product_category_details` (`id`, `product_category_id`, `product_id`) VALUES
(61, 9, 52),
(62, 10, 52),
(65, 11, 50),
(69, 8, 51),
(93, 8, 61),
(118, 5, 53),
(119, 5, 54),
(120, 5, 55),
(121, 5, 56),
(122, 8, 57),
(125, 5, 58),
(126, 5, 59),
(128, 8, 62),
(129, 8, 60),
(130, 5, 63),
(132, 8, 5),
(133, 5, 49),
(134, 8, 49),
(135, 5, 64);

-- --------------------------------------------------------

--
-- Table structure for table `product_descriptions`
--

CREATE TABLE `product_descriptions` (
  `id` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_title` varchar(50) NOT NULL,
  `image_caption` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_descriptions`
--

INSERT INTO `product_descriptions` (`id`, `title`, `description`, `image`, `image_title`, `image_caption`) VALUES
(1, 'test', 'test', '2021-09-19_20-58.png', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `title`, `image`, `description`) VALUES
(2, 'Who Are We', '2021-09-19_20-58.png', '<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>\r\n\r\n<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `qualities`
--

CREATE TABLE `qualities` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qualities`
--

INSERT INTO `qualities` (`id`, `title`, `image`, `description`) VALUES
(2, 'Bahan yang kami proses adalah hasil terbaik dari alam, untuk menjadi produk yang memiliki nilai tambah.', '9e204305-f444-4874-ad84-1aeaf0761c72.jpeg', 'Bahan yang kami proses adalah hasil terbaik dari alam, untuk menjadi produk yang memiliki nilai tambah.');

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

CREATE TABLE `raw_materials` (
  `id` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`id`, `title`, `image`, `description`) VALUES
(1, 'test', 'cc84e232-b39f-4bdf-beb2-675bc5622a4b.jpeg', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `description`) VALUES
(3, 'test', '2021-09-19_20-58.png', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `solution_descriptions`
--

CREATE TABLE `solution_descriptions` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `solution_descriptions`
--

INSERT INTO `solution_descriptions` (`id`, `title`, `image`, `description`) VALUES
(1, 'k', 'cc84e232-b39f-4bdf-beb2-675bc5622a4b.jpeg', '<p>test</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `title`, `image`, `description`) VALUES
(1, 'Bagaimana kita membuat produk dengan kualitas terbaik?', 'cc84e232-b39f-4bdf-beb2-675bc5622a4b.jpeg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus mollitia nemo');

-- --------------------------------------------------------

--
-- Table structure for table `technology_items`
--

CREATE TABLE `technology_items` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `technology_items`
--

INSERT INTO `technology_items` (`id`, `title`, `image`, `description`) VALUES
(1, 'Raw Materials', '2021-09-19_20-58.png', 'Pemilihan raw material yang berkualitas.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `image`) VALUES
(1, 'admin', 'admin@localhost.com', '$2y$10$Dcs.bkiPe1UTkdbOZyT1geggvFb6sm7ex7e0QxVfMgcADjxkYOULq', '');

-- --------------------------------------------------------

--
-- Table structure for table `visions`
--

CREATE TABLE `visions` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `visions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visions`
--

INSERT INTO `visions` (`id`, `title`, `description`, `visions`) VALUES
(1, 'vision ', 'vision ', '[\"vision 1\",\"vision 3\",\"vision 4\",\"vision 5\"]');

-- --------------------------------------------------------

--
-- Table structure for table `vision_mission_images`
--

CREATE TABLE `vision_mission_images` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vision_mission_images`
--

INSERT INTO `vision_mission_images` (`id`, `title`, `image`, `description`) VALUES
(1, '', 'cc84e232-b39f-4bdf-beb2-675bc5622a4b.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `what_we_dos`
--

CREATE TABLE `what_we_dos` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `what_we_dos`
--

INSERT INTO `what_we_dos` (`id`, `title`, `image`, `description`) VALUES
(2, 'Customized / on Demand Product', 'webinar.png', '<p>Menyediakan produk sesuai dengan kebutuhan pelanggan, bahan mentah hingga produk setengah jadi.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us`
--

CREATE TABLE `why_choose_us` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `why_choose_us`
--

INSERT INTO `why_choose_us` (`id`, `title`, `image`, `description`) VALUES
(2, 'Bahan yang kami proses adalah hasil terbaik dari alam, untuk menjadi produk yang memiliki nilai tambah.', '2021-09-19_20-58.png', 'Bahan yang kami proses adalah hasil terbaik dari alam, untuk menjadi produk yang memiliki nilai tambah.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate_images`
--
ALTER TABLE `certificate_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_profiles`
--
ALTER TABLE `company_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `made_ofs`
--
ALTER TABLE `made_ofs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category_details`
--
ALTER TABLE `product_category_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_descriptions`
--
ALTER TABLE `product_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualities`
--
ALTER TABLE `qualities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solution_descriptions`
--
ALTER TABLE `solution_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technology_items`
--
ALTER TABLE `technology_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visions`
--
ALTER TABLE `visions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vision_mission_images`
--
ALTER TABLE `vision_mission_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `what_we_dos`
--
ALTER TABLE `what_we_dos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `certificate_images`
--
ALTER TABLE `certificate_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_profiles`
--
ALTER TABLE `company_profiles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `made_ofs`
--
ALTER TABLE `made_ofs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_category_details`
--
ALTER TABLE `product_category_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `product_descriptions`
--
ALTER TABLE `product_descriptions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qualities`
--
ALTER TABLE `qualities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `solution_descriptions`
--
ALTER TABLE `solution_descriptions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `technology_items`
--
ALTER TABLE `technology_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visions`
--
ALTER TABLE `visions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vision_mission_images`
--
ALTER TABLE `vision_mission_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `what_we_dos`
--
ALTER TABLE `what_we_dos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
