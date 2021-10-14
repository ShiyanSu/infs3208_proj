-- phpMyAdmin SQL Dump
-- version 5.0.4deb2~bpo10+1+bionic1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2021 at 01:43 AM
-- Server version: 5.7.34-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myProj`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `path` text NOT NULL,
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filename`, `path`, `username`) VALUES
(3, '????????6.jpg', '/var/www/htdocs/infs3200proj/uploads/????????6.jpg', 'infs3202'),
(4, 'Moon.jpg', '/var/www/htdocs/infs3200proj/uploads/Moon.jpg', 'infs3202'),
(5, 'Category_page.png', '/var/www/htdocs/infs3200proj/uploads/Category_page.png', 'infs3202');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `review_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_date` datetime NOT NULL,
  `image_name` text,
  `liked_times` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`review_id`, `title`, `category`, `review`, `user_name`, `user_id`, `post_date`, `image_name`, `liked_times`) VALUES
(1, 'gtrg', 'Movies', 'rgeg', 'lansu', 7, '0000-00-00 00:00:00', NULL, 0),
(2, 'gtrg', 'Movies', 'rgeg', 'lansu', 12, '0000-00-00 00:00:00', NULL, 0),
(3, 'ewdew', 'Food', 'dwedew', 'lansu', 12, '0000-00-00 00:00:00', NULL, 0),
(4, 'ewdafa', 'Cars', 'erfreger', 'lansu', 12, '0000-00-00 00:00:00', NULL, 0),
(5, '3t43t', 'Food', 't43t43', 'lansu', 12, '0000-00-00 00:00:00', NULL, 0),
(6, 'ew3fr', 'Food', '3r3r', 'lansu', 12, '0000-00-00 00:00:00', NULL, 0),
(7, 'j9uju', 'Food', 'u98u9', 'lansu', 12, '2021-04-25 03:27:08', NULL, 0),
(8, 'dwewe', 'Food', 'weddew', 'lansu', 12, '2021-04-25 04:15:44', NULL, 0),
(9, 'dwewe', 'Food', 'weddew', 'lansu', 12, '2021-04-25 04:16:36', NULL, 0),
(10, 'dwewe', 'Food', 'weddew', 'lansu', 12, '2021-04-25 04:17:54', NULL, 0),
(11, 'dwewe', 'Food', 'weddew', 'lansu', 12, '2021-04-25 04:19:04', ';storyboard1.png', 0),
(12, 'dwewe', 'Food', 'weddew', 'lansu', 12, '2021-04-25 04:22:07', NULL, 0),
(13, 'dwewe', 'Food', 'weddew', 'lansu', 12, '2021-04-25 04:22:59', ';pager and order.jpg', 0),
(14, 'dwewe', 'Food', 'weddew', 'lansu', 12, '2021-04-25 04:24:48', ';pager and order.jpg', 0),
(15, 'dwewe', 'Food', 'weddew', 'lansu', 12, '2021-04-25 04:27:50', ';pager and order.jpg', 0),
(16, 'dwewe', 'Food', 'weddew', 'lansu', 12, '2021-04-25 04:35:27', ';excerpt1.2.PNG', 0),
(17, 'few', 'Food', 'fwe', 'lansu', 12, '2021-04-25 04:39:29', ';pager and order.jpg;probe.jpg', 0),
(18, 'My favourite Brisbane hotpot', 'Food', 'The hotpot is very delicious.', 'alexsu', 8, '2021-04-29 22:58:18', ';reviewpage.png;user profile page.png', 0),
(25, 'A fancy car', 'Cars', 'This is a kind of car that I like most.', 'alexsu', 8, '2021-04-29 23:10:54', ';alexsu.jpg;homepage.png', 0),
(26, 'A special movie theater', 'Movies', 'It is located in the south brisbane', 'alexsu', 8, '2021-04-29 23:26:51', ';Moon.jpg;lansu.jpg', 0),
(27, 'A wonderful place to enjoy the holiday', 'Resorts', 'It has amazing views.', 'alexsu', 8, '2021-05-04 03:20:30', ';Moon.jpg;homepage.png', 0),
(28, 'delicious Mexico food ', 'Food', 'taco Tuesday ', 'alexsu', 8, '2021-05-04 05:47:18', ';homepage.png;lansu.jpg', 0),
(29, 'asdhui', 'Food', 'asddsahuuihi', 'alexsu', 8, '2021-05-04 06:17:44', ';homepage.png;lansu.jpg', 6),
(30, 'Wonderful Product', 'Hotels', 'I highly recommend The Hotel Collection, their products are high quality & very professional company. I have used their bedding in my Interior Design projects & in my home for several years now.', 'alexsu', 8, '2021-05-14 04:40:46', ';hotel1.jpg;hotel2.jpg', 39);

-- --------------------------------------------------------

--
-- Table structure for table `review_comment`
--

CREATE TABLE `review_comment` (
  `comment_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `review_comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_comment`
--

INSERT INTO `review_comment` (`comment_id`, `review_id`, `user_id`, `user_name`, `review_comment`) VALUES
(11, 30, 8, 'alexsu', 'rgjieo'),
(12, 30, 8, 'alexsu', 's'),
(13, 30, 8, 'alexsu', 'c'),
(14, 30, 8, 'alexsu', 'c'),
(15, 30, 8, 'alexsu', 'd'),
(16, 30, 8, 'alexsu', 'w'),
(17, 30, 8, 'alexsu', 'rgjieo'),
(18, 30, 8, 'alexsu', 'w'),
(19, 30, 8, 'alexsu', 'wd'),
(20, 30, 8, 'alexsu', 'qwd'),
(21, 29, 8, 'alexsu', 'wd'),
(22, 30, 8, 'alexsu', 'qdwqwd'),
(23, 30, 8, 'alexsu', 'dqwwqdqwdqwd'),
(24, 30, 8, 'alexsu', 'dwdw'),
(25, 30, 8, 'alexsu', 'dwdw'),
(26, 30, 8, 'alexsu', 'rgeregergre'),
(27, 30, 8, 'alexsu', 'greqgeqgq3rg'),
(28, 30, 8, 'alexsu', 'grewuihuioihgewrughreuighrequghrequigheqruigheriugheruigergher'),
(29, 30, 8, 'alexsu', 'thruwihjntrwuihjtruihjtriuhtre'),
(30, 30, 8, 'alexsu', 'wow'),
(31, 30, 13, 'infs3202', 'k'),
(32, 30, 13, 'infs3202', 'l'),
(33, 30, 8, 'alexsu', '32d32'),
(34, 30, 8, 'alexsu', 'd33d3dd3d3d3'),
(35, 30, 21, 'Anonymous User', 'wasdsa'),
(36, 30, 20, 'ls111', 'adsdasdsada'),
(37, 30, 21, 'Anonymous User', 'resgregre'),
(38, 29, 21, 'Anonymous User', 'hahahaha'),
(39, 30, 21, 'Anonymous User', 'joijiojiojioj');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'infs3202', '7202'),
(2, 'infs7202', '3202');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` text,
  `image_path` text,
  `email_verified` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `user_name`, `user_email`, `user_password`, `user_image`, `image_path`, `email_verified`) VALUES
(1, 'alex', '111', '111', NULL, NULL, 0),
(4, '8', '8', '8', NULL, NULL, 0),
(5, '1', '1', '1', NULL, NULL, 0),
(6, 'e', 'e', 'e', NULL, NULL, 0),
(7, '', '', '', NULL, NULL, 0),
(8, 'alexsu', 'shiyansu777@gmail.com', '$2y$10$aak.hrXMawf9moj4XCHgIethjJnEJ4LwTK4sFat6VNQhplTN/i8ZC', 'lansu12.jpg', '/var/www/htdocs/infs3200proj/uploads/lansu12.jpg', 1),
(9, 'hongdong', 'dajhongdong@163.com', '77777777', NULL, NULL, 0),
(10, 'sss', '123456@gmail.com', '777777777', NULL, NULL, 0),
(11, 'su', 'alsex@gmail.com', '12345678', NULL, NULL, 0),
(12, 'lansu', 'sb123@gmail.com', 'Lansu123', 'persona2.jpg', '/var/www/htdocs/infs3200proj/uploads/persona2.jpg', 0),
(13, 'infs3202', 'infs3202@gmail.com', '465qweASD@', NULL, NULL, 0),
(14, 'shiqi', 'shiyan@gmail.com', 'Alex0221', NULL, NULL, 0),
(15, 'pipipi', '1000@gmail.com', 'Ls990905', NULL, NULL, 0),
(16, 'Su Lan', 'lan1830086356@gmail.com', 'Sulan123', 'lansu5.jpg', '/var/www/htdocs/infs3200proj/uploads/lansu5.jpg', 0),
(17, 'tim', 'zhangteng.tim@gmail.com', 'Tim12345', 'lansu6.jpg', '/var/www/htdocs/infs3200proj/uploads/lansu6.jpg', 1),
(18, 'lllanssu', 'lansu123@gmail.com', 'Lansu123', NULL, NULL, 0),
(19, 'shiyan', 'shiyansu123@gmail.com', '$2y$10$h4sIFO6FL2HDYPD8tl6EeuizRFJGZb8iWcrc3pJ99ddvsKa3UajFy', NULL, NULL, 0),
(20, 'ls111', 'lansu111@gmail.com', '$2y$10$oMAmc6gp6SS375zIP.al9uyDC9ROwK9/04Bb8ABeN1H8sHmF3c.SS', NULL, NULL, 0),
(21, 'Anonymous User', 'Anonymous@gmail.com', 'Anonymous123', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `review_id`, `title`, `review`, `user_name`) VALUES
(13, 8, 29, 'asdhui', 'asddsahuuihi', 'alexsu'),
(14, 8, 28, 'delicious Mexico food ', 'taco Tuesday ', 'alexsu'),
(18, 8, 30, 'Wonderful Product', 'I highly recommend The Hotel Collection, their products are high quality & very professional company. I have used their bedding in my Interior Design projects & in my home for several years now.', 'alexsu'),
(19, 8, 25, 'A fancy car', 'This is a kind of car that I like most.', 'alexsu'),
(20, 8, 26, 'A special movie theater', 'It is located in the south brisbane', 'alexsu'),
(21, 8, 10, 'dwewe', 'weddew', 'alexsu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_upload` (`username`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `review_comment`
--
ALTER TABLE `review_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `review_id` (`review_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `review_id` (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `review_comment`
--
ALTER TABLE `review_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `FK_user_upload` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `product_review`
--
ALTER TABLE `product_review`
  ADD CONSTRAINT `product_review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_information` (`id`);

--
-- Constraints for table `review_comment`
--
ALTER TABLE `review_comment`
  ADD CONSTRAINT `review_comment_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `product_review` (`review_id`),
  ADD CONSTRAINT `review_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_information` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_information` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`review_id`) REFERENCES `product_review` (`review_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
