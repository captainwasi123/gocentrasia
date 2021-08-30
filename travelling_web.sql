-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 06:31 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelling_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `about_us_title` varchar(50) NOT NULL,
  `about_us_desc` text NOT NULL,
  `cover_img` text NOT NULL,
  `story_title` varchar(255) NOT NULL,
  `story_desc` text NOT NULL,
  `we_do_title` varchar(255) NOT NULL,
  `we_do_desc` text NOT NULL,
  `our_travelers_title` varchar(255) NOT NULL,
  `our_travelers_desc` text NOT NULL,
  `img` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `about_us_title`, `about_us_desc`, `cover_img`, `story_title`, `story_desc`, `we_do_title`, `we_do_desc`, `our_travelers_title`, `our_travelers_desc`, `img`, `created_at`) VALUES
(1, 'About Us', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>\r\n', 'assets/img/package_img/2021/04/1618565381_about-banner.jpg', 'Our Story', '<p>One day, one jump and two years of passion</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five .</p>\r\n', 'What We Do?', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n\r\n<ul>\r\n	<li>First Class Flights</li>\r\n	<li>Best Price Guarantee</li>\r\n	<li>5 Star Accommodations</li>\r\n	<li>World Class Service</li>\r\n	<li>Inclusive Packages</li>\r\n	<li>Handpicked Hotels</li>\r\n	<li>Latest Model Vehicles</li>\r\n	<li>Accessibility management</li>\r\n	<li>10 Languages available</li>\r\n	<li>+120 Premium city tours</li>\r\n</ul>\r\n\r\n<p>ENROLL TODAY AND LEARN SOMETHING NEW.</p>\r\n', 'Our Travelers', '<p>Benefits our traveler&rsquo;s Enjoy</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum iLorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n', 'assets/img/aboutus_img//2021/04/1617743108_wedo-image.jpg', '2021-04-07 01:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `activity_name` varchar(225) NOT NULL,
  `activity_img` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `custom_activity_img` text NOT NULL,
  `true_activity_img` text NOT NULL,
  `custom_tour_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activity_name`, `activity_img`, `created_at`, `custom_activity_img`, `true_activity_img`, `custom_tour_activity`) VALUES
(1, 'Trekking', 'Tracking1.png', '2021-04-09 11:46:00', 'assets/img/activity_img//2021/04/1618303158_icon05.png', 'assets/img/activity_img//2021/04/1618486492_man.png', 1),
(2, 'Horse Riding', 'Horse.png', '2021-04-09 12:02:51', 'assets/img/activity_img//2021/04/1618303203_icon_02.png', 'assets/img/activity_img//2021/04/1618318010_Icon_02.png', 1),
(3, 'Yurt Stay', 'yurt.png', '2021-04-09 12:10:02', 'assets/img/activity_img//2021/04/1618303273_icon_03.png', 'assets/img/activity_img//2021/04/1618486472_Yurt.png', 1),
(4, 'Home Stay', 'House1.png', '2021-04-09 12:15:50', 'assets/img/activity_img//2021/04/1618303317_icon_04.png', 'assets/img/activity_img//2021/04/1618486453_House.png', 1),
(5, 'Wildlife', 'Deer.png', '2021-04-09 12:21:45', 'assets/img/activity_img//2021/04/1618303406_Icon_Gray.png', 'assets/img/activity_img//2021/04/1618486437_Deer.png', 1),
(6, 'Off road', 'Off_road.png', '2021-04-09 12:25:32', 'assets/img/activity_img//2021/04/1618303453_icon06.png', 'assets/img/activity_img//2021/04/1618606401_Tracking_02.png', 1),
(7, 'Winter Activity', 'Climbing.png', '2021-04-09 12:26:58', 'assets/img/activity_img//2021/04/1618303500_icon07.png', 'assets/img/activity_img//2021/04/1618486397_Winter_Activity.png', 1),
(8, 'City Tour', 'Building1.png', '2021-04-09 12:27:47', '', '', 0),
(9, 'Culture', 'Culture1.png', '2021-04-09 12:28:54', 'assets/img/activity_img//2021/04/1618303579_icon10.png', 'assets/img/activity_img//2021/04/1618486379_Culture.png', 1),
(10, 'History', 'Writting.png', '2021-04-09 12:30:24', 'assets/img/activity_img//2021/04/1618303636_icon11.png', 'assets/img/activity_img//2021/04/1618486358_History.png', 1),
(11, 'Cuisine', 'Cuising1.png', '2021-04-09 12:31:36', 'assets/img/activity_img//2021/04/1618303677_icon12.png', 'assets/img/activity_img//2021/04/1618486341_Cuising.png', 1),
(12, 'Cooking', 'Cook1.png', '2021-04-09 12:33:08', 'assets/img/activity_img//2021/04/1618303724_icon08.png', 'assets/img/activity_img//2021/04/1618486322_Cooking.png', 1),
(13, 'Cycling', 'Cycle1.png', '2021-04-09 12:35:26', 'assets/img/activity_img//2021/04/1618303760_icon09.png', 'assets/img/activity_img//2021/04/1618486304_Cycle.png', 1),
(14, 'Camping', 'Camping1.png', '2021-04-09 12:38:38', '', '', 0),
(15, 'Dancing', 'Dancing1.png', '2021-04-09 12:39:50', '', '', 0),
(16, 'Fishing', 'Fishing1.png', '2021-04-09 12:40:11', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `is_active` int(11) NOT NULL,
  `user_role` enum('admin','user') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `is_active`, `user_role`, `created_at`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1, 'admin', '2021-02-02 17:24:43'),
(2, 'owais', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin', '2021-02-16 12:13:02'),
(3, 'test', '098f6bcd4621d373cade4e832627b4f6', 1, 'user', '2021-03-15 19:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `aggent_rates`
--

CREATE TABLE `aggent_rates` (
  `id` int(11) NOT NULL,
  `itinerary_id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `tour_type` enum('Standard','Custom') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aggent_rates`
--

INSERT INTO `aggent_rates` (`id`, `itinerary_id`, `guide_id`, `tour_type`, `created_at`, `updated_at`) VALUES
(3, 3, 4, 'Standard', '2021-08-13 16:56:44', '2021-08-13 17:11:37'),
(4, 5, 4, 'Standard', '2021-08-13 17:13:29', '2021-08-13 17:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `arrival_city`
--

CREATE TABLE `arrival_city` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `arrival_city_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `video_link` text NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `video_link`, `description`, `img`, `create_at`) VALUES
(1, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor inci', 'https://www.youtube.com/watch?v=CswvZGUUbCk', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum.</p>\r\n', '', '2021-04-07 03:01:19'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor inci', 'https://www.youtube.com/watch?v=CswvZGUUbCk', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum.</p>\r\n', 'kazaghstan-tour31.jpg', '2021-04-07 03:02:47'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor inci', 'https://www.youtube.com/watch?v=CswvZGUUbCk', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum.</p>\r\n', 'kazaghstan-tour314.jpg', '2021-04-07 03:03:48'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor inci', 'https://www.youtube.com/watch?v=CswvZGUUbCk', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum.</p>\r\n', 'kazaghstan-tour311.jpg', '2021-04-22 15:20:03'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor inci', 'https://www.youtube.com/watch?v=CswvZGUUbCk', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum.</p>\r\n', 'kazaghstan-tour312.jpg', '2021-04-22 15:21:19'),
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor inci', 'https://www.youtube.com/watch?v=CswvZGUUbCk', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum.</p>\r\n', 'kazaghstan-tour313.jpg', '2021-04-22 15:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `blog_id`, `tag_id`, `create_at`) VALUES
(5, 4, 1, '2021-04-22 15:20:03'),
(6, 5, 1, '2021-04-22 15:21:19'),
(7, 6, 1, '2021-04-22 15:23:45'),
(11, 3, 1, '2021-04-22 15:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `country_id`, `name`, `longitude`, `latitude`, `created_at`) VALUES
(2, 1, 'Tashkent', 69.2401, 41.2995, '2021-07-12 22:08:15'),
(3, 1, 'Samarqand', 66.9603, 39.6471, '2021-07-12 22:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `client_reviews`
--

CREATE TABLE `client_reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` text NOT NULL,
  `review` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_reviews`
--

INSERT INTO `client_reviews` (`id`, `name`, `img`, `review`, `created_at`) VALUES
(1, 'Jessica Jui', 'avatar21.png', 'Lorem Ipsum passages, and more recenly with desktop publishing  software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum passages, and more recently with  desktop publishing software like .', '2021-04-07 04:59:11'),
(2, 'Jessica Jui', 'avatar31.png', 'Lorem Ipsum passages, and more recenly with desktop publishing  software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum passages, and more recently with  desktop publishing software like .', '2021-04-07 04:59:26'),
(3, 'Jessica Jui', 'avatar12.png', 'Lorem Ipsum passages, and more recenly with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum passages, and more recently with desktop publishing software like .', '2021-04-07 04:59:45'),
(4, 'Jhon Doe', 'avatar22.png', 'Lorem Ipsum passages, and more recenly with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum passages, and more recently with desktop publishing software like .', '2021-04-07 04:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(225) NOT NULL,
  `tag_line` text NOT NULL,
  `tour` text NOT NULL,
  `description` text NOT NULL,
  `country_img` text NOT NULL,
  `cover_img` text NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `show_on_website` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`, `tag_line`, `tour`, `description`, `country_img`, `cover_img`, `longitude`, `latitude`, `show_on_website`, `created_at`) VALUES
(1, 'Uzbekistan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra', '<p>Lorem Ipsum proin gravida nibh vel velit auctor aliqueenean sollicitudin.</p>\r\n\r\n<p>Lorem Ipsum proin gravida nibh vel velit auctor aliqueenean sollicitudin, lorem quis bibendum auct or, nisi elit consequat ipsum, nec sagittis sem nibh id elit. vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odioer tincidunt auctor a ornare. Sed non mauris vitae erat consequat auc tor eu in elit. Class aptent taciti socios qu ad litora torquent per conubia nostra, per inceptos himenaeos. Maur is in erat justo. Nullam ac urna eu felis dapibus condim entum sit ame t a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum ferm entum nuam pharetra, erat sed fer mentum feugiat velit mauris egestas quam, ut aliqua m massa nisl quis neque. Suspendisse in orci enim. neque elit. Sed ut imperdiet nisi. Proin con dimentum ferm entum nuam pharetra, erat sed ferm entum feugiat neque elit. Sed ut imperdiet nisi. Proin condimentum ferm entum nuam pharetra, erat sed fermentum feugiat Suspen disse in orci enim. Etiam ultricies nisi vel augue.</p>\r\n', 'assets/img/country_img//2021/04/1617744565_destination-block1.jpg', 'assets/img/country_img//2021/04/1617744565_uzbekistan-banner.jpg', 64.5853, 41.3775, 1, '2021-04-07 02:24:20'),
(2, 'Tajikistan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra', '<p>Lorem Ipsum proin gravida nibh vel velit auctor aliqueenean sollicitudin.</p>\r\n\r\n<p>Lorem Ipsum proin gravida nibh vel velit auctor aliqueenean sollicitudin, lorem quis bibendum auct or, nisi elit consequat ipsum, nec sagittis sem nibh id elit. vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odioer tincidunt auctor a ornare. Sed non mauris vitae erat consequat auc tor eu in elit. Class aptent taciti socios qu ad litora torquent per conubia nostra, per inceptos himenaeos. Maur is in erat justo. Nullam ac urna eu felis dapibus condim entum sit ame t a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum ferm entum nuam pharetra, erat sed fer mentum feugiat velit mauris egestas quam, ut aliqua m massa nisl quis neque. Suspendisse in orci enim. neque elit. Sed ut imperdiet nisi. Proin con dimentum ferm entum nuam pharetra, erat sed ferm entum feugiat neque elit. Sed ut imperdiet nisi. Proin condimentum ferm entum nuam pharetra, erat sed fermentum feugiat Suspen disse in orci enim. Etiam ultricies nisi vel augue.</p>\r\n', 'assets/img/country_img//2021/04/1617744994_destination-block2.jpg', 'assets/img/country_img//2021/04/1617744994_tajiskistan-banner.jpg', 71.2475, 30.3308, 1, '2021-04-07 02:35:05'),
(3, 'Kyrgistan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra', '<p>Lorem Ipsum proin gravida nibh vel velit auctor aliqueenean sollicitudin.</p>\r\n\r\n<p>Lorem Ipsum proin gravida nibh vel velit auctor aliqueenean sollicitudin, lorem quis bibendum auct or, nisi elit consequat ipsum, nec sagittis sem nibh id elit. vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odioer tincidunt auctor a ornare. Sed non mauris vitae erat consequat auc tor eu in elit. Class aptent taciti socios qu ad litora torquent per conubia nostra, per inceptos himenaeos. Maur is in erat justo. Nullam ac urna eu felis dapibus condim entum sit ame t a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum ferm entum nuam pharetra, erat sed fer mentum feugiat velit mauris egestas quam, ut aliqua m massa nisl quis neque. Suspendisse in orci enim. neque elit. Sed ut imperdiet nisi. Proin con dimentum ferm entum nuam pharetra, erat sed ferm entum feugiat neque elit. Sed ut imperdiet nisi. Proin condimentum ferm entum nuam pharetra, erat sed fermentum feugiat Suspen disse in orci enim. Etiam ultricies nisi vel augue.</p>\r\n', 'assets/img/country_img//2021/04/1617745114_destination-block3.jpg', 'assets/img/country_img//2021/04/1617745114_kyrgyzstan-banner.jpg', 71.2475, 30.3308, 1, '2021-04-07 02:38:34'),
(4, 'Turkmenistan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra', '<p>Lorem Ipsum proin gravida nibh vel velit auctor aliqueenean sollicitudin.</p>\r\n\r\n<p>Lorem Ipsum proin gravida nibh vel velit auctor aliqueenean sollicitudin, lorem quis bibendum auct or, nisi elit consequat ipsum, nec sagittis sem nibh id elit. vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odioer tincidunt auctor a ornare. Sed non mauris vitae erat consequat auc tor eu in elit. Class aptent taciti socios qu ad litora torquent per conubia nostra, per inceptos himenaeos. Maur is in erat justo. Nullam ac urna eu felis dapibus condim entum sit ame t a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum ferm entum nuam pharetra, erat sed fer mentum feugiat velit mauris egestas quam, ut aliqua m massa nisl quis neque. Suspendisse in orci enim. neque elit. Sed ut imperdiet nisi. Proin con dimentum ferm entum nuam pharetra, erat sed ferm entum feugiat neque elit. Sed ut imperdiet nisi. Proin condimentum ferm entum nuam pharetra, erat sed fermentum feugiat Suspen disse in orci enim. Etiam ultricies nisi vel augue.</p>\r\n', 'assets/img/country_img//2021/04/1617745217_destination-block4.jpg', 'assets/img/country_img//2021/04/1617745217_turkmenistan-banner.jpg', 0, 0, 1, '2021-04-07 02:40:17'),
(5, 'Kazakistan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.	', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra', '<p>Lorem Ipsum proin gravida nibh vel velit auctor aliqueenean sollicitudin.</p>\r\n\r\n<p>Lorem Ipsum proin gravida nibh vel velit auctor aliqueenean sollicitudin, lorem quis bibendum auct or, nisi elit consequat ipsum, nec sagittis sem nibh id elit. vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odioer tincidunt auctor a ornare. Sed non mauris vitae erat consequat auc tor eu in elit. Class aptent taciti socios qu ad litora torquent per conubia nostra, per inceptos himenaeos. Maur is in erat justo. Nullam ac urna eu felis dapibus condim entum sit ame t a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum ferm entum nuam pharetra, erat sed fer mentum feugiat velit mauris egestas quam, ut aliqua m massa nisl quis neque. Suspendisse in orci enim. neque elit. Sed ut imperdiet nisi. Proin con dimentum ferm entum nuam pharetra, erat sed ferm entum feugiat neque elit. Sed ut imperdiet nisi. Proin condimentum ferm entum nuam pharetra, erat sed fermentum feugiat Suspen disse in orci enim. Etiam ultricies nisi vel augue.</p>\r\n', 'assets/img/country_img//2021/04/1617745919_destination-block5.jpg', 'assets/img/country_img//2021/04/1617745919_kazaghstan-banner.jpg', 32.8232, 39.9206, 1, '2021-04-07 02:51:59'),
(6, 'iraq', 'new', 'aus nwuqiw f', '<p>mab jkagfkasnczxxjkgiux tvguqgiufqiufhqwiufgkcmnsvd87 t87f;yf323 twfwe</p>\r\n', 'assets/img/country_img//2021/07/1626092549_user-3.jpg', 'assets/img/country_img//2021/07/1626092549_user-6.jpg', 2.14123, 1.23141, 0, '2021-07-12 17:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `country_images`
--

CREATE TABLE `country_images` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `img` text NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country_images`
--

INSERT INTO `country_images` (`id`, `country_id`, `img`, `create_at`) VALUES
(1, 1, 'assets/img/country_img/2021/04/uzbekistan-image11.jpg', '2021-04-07 02:24:20'),
(2, 1, 'assets/img/country_img/2021/04/uzbekistan-image21.jpg', '2021-04-07 02:24:20'),
(3, 1, 'assets/img/country_img/2021/04/uzbekistan-image31.jpg', '2021-04-07 02:24:20'),
(4, 2, 'assets/img/country_img/2021/04/tajiskistan-image1.jpg', '2021-04-07 02:35:05'),
(5, 2, 'assets/img/country_img/2021/04/tajiskistan-image2.jpg', '2021-04-07 02:35:05'),
(6, 2, 'assets/img/country_img/2021/04/tajiskistan-image3.jpg', '2021-04-07 02:35:05'),
(7, 3, 'assets/img/country_img/2021/04/kyrgyzstan-image1.jpg', '2021-04-07 02:38:34'),
(8, 3, 'assets/img/country_img/2021/04/kyrgyzstan-image2.jpg', '2021-04-07 02:38:34'),
(9, 3, 'assets/img/country_img/2021/04/kyrgyzstan-image3.jpg', '2021-04-07 02:38:34'),
(10, 4, 'assets/img/country_img/2021/04/turkmenistan-image1.jpg', '2021-04-07 02:40:17'),
(11, 4, 'assets/img/country_img/2021/04/turkmenistan-image2.jpg', '2021-04-07 02:40:17'),
(12, 4, 'assets/img/country_img/2021/04/turkmenistan-image3.jpg', '2021-04-07 02:40:17'),
(13, 5, 'assets/img/country_img/2021/04/kazaghstan-image1.jpg', '2021-04-07 02:51:59'),
(14, 5, 'assets/img/country_img/2021/04/kazaghstan-image2.jpg', '2021-04-07 02:51:59'),
(15, 5, 'assets/img/country_img/2021/04/kazaghstan-image3.jpg', '2021-04-07 02:51:59'),
(16, 6, 'assets/img/country_img/2021/07/user-7.jpg', '2021-07-12 17:22:30'),
(17, 6, 'assets/img/country_img/2021/07/user-8.jpg', '2021-07-12 17:22:30'),
(18, 6, 'assets/img/country_img/2021/07/user-9.jpg', '2021-07-12 17:22:30'),
(19, 6, 'assets/img/country_img/2021/07/user-10.jpg', '2021-07-12 17:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `custom_tour`
--

CREATE TABLE `custom_tour` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `day` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `place` text NOT NULL,
  `mausoleum` text NOT NULL,
  `image` text NOT NULL,
  `price` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_tour`
--

INSERT INTO `custom_tour` (`id`, `city_id`, `title`, `day`, `description`, `place`, `mausoleum`, `image`, `price`, `status`, `latitude`, `longitude`, `create_at`) VALUES
(2, 2, 'Tour of Turkey', '3 Days', ' spendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'Tashkent Samarqand Fergana Namangan Asgabat Turkmenabat Dasoguz Mary ', '', 'assets/img/custom_tour/2021/04/1618348861_tashkent-image.jpg', 3000, 1, 38.9598, 34.925, '2021-04-14 02:21:01'),
(3, 3, 'New York', '3 Days', 'spendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'Tashkent Samarqand Fergana Namangan Asgabat Turkmenabat Dasoguz Mary', '', 'assets/img/custom_tour/2021/04/1618474744_tashkent-image.jpg', 10000, 1, 40.7419, -73.9893, '2021-04-15 02:19:04'),
(4, 2, 'Los Angel, Frankies Down Street', '3 Days', 'spendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'Tashkent Samarqand Fergana Namangan Asgabat Turkmenabat Dasoguz Mary ', '', 'assets/img/custom_tour/2021/04/1618474818_tashkent-image.jpg', 5000, 1, 5.57949, -0.197542, '2021-04-15 02:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `custom_tour_activities`
--

CREATE TABLE `custom_tour_activities` (
  `id` int(11) NOT NULL,
  `custom_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_tour_activities`
--

INSERT INTO `custom_tour_activities` (`id`, `custom_id`, `activity_id`, `create_at`) VALUES
(12, 4, 4, '2021-04-15 02:20:18'),
(13, 4, 5, '2021-04-15 02:20:18'),
(14, 4, 6, '2021-04-15 02:20:18'),
(60, 2, 6, '2021-07-12 22:50:04'),
(61, 2, 7, '2021-07-12 22:50:04'),
(62, 2, 9, '2021-07-12 22:50:05'),
(63, 3, 2, '2021-07-12 22:50:14'),
(64, 3, 4, '2021-07-12 22:50:14'),
(65, 3, 13, '2021-07-12 22:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `departure_city`
--

CREATE TABLE `departure_city` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `departure_city_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `group_price` float NOT NULL,
  `min_no_people` int(20) DEFAULT NULL,
  `max_no_people` int(20) DEFAULT NULL,
  `private_price` float NOT NULL,
  `affiliate_code` varchar(255) DEFAULT NULL,
  `separate_room_charges` int(20) DEFAULT NULL,
  `base_fare` float DEFAULT NULL,
  `gst` int(20) NOT NULL,
  `tcs` int(20) NOT NULL,
  `group_txt_price` double NOT NULL,
  `private_txt_price` double NOT NULL,
  `discount` int(11) NOT NULL,
  `show_home` enum('yes','no') DEFAULT 'no',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `package_id`, `event_name`, `duration`, `start_date`, `end_date`, `group_price`, `min_no_people`, `max_no_people`, `private_price`, `affiliate_code`, `separate_room_charges`, `base_fare`, `gst`, `tcs`, `group_txt_price`, `private_txt_price`, `discount`, `show_home`, `create_at`) VALUES
(1, 1, 'April Tour For Uzbekistan', '14 Days', '2021-04-10', '2021-04-24', 39999, 2, 16, 45999, 'swt21', 2599, 400, 5, 3, 43198.92, 49678.92, 10, 'yes', '2021-04-09 19:15:29'),
(2, 1, 'Holidays For Uzbekistan', '14 Days', '2021-04-30', '2021-05-08', 41599, 2, 16, 56599, 's2#21w', 4399, 300, 5, 3, 44926.92, 61126.92, 8, 'no', '2021-04-09 19:19:35'),
(3, 2, 'SILKROAD GROUP TOUR', '14 Days', '2021-04-22', '2021-05-26', 39999, 5, 30, 50000, 'sdsad', 5000, 800, 4, 5, 43598.91, 54500, 79, 'yes', '2021-04-10 12:17:35'),
(4, 3, 'CAUCASUS GROUP TOUR', '14 Days', '2021-04-20', '2021-05-31', 35000, 5, 40, 40000, 'a', 8000, 500, 5, 5, 0, 0, 3, 'yes', '2021-04-14 05:57:46'),
(5, 3, 'Uzbekistan 15 Days', '14 Days', '2021-04-30', '2021-06-04', 35000, 7, 45, 45000, 'a', 4000, 500, 5, 5, 0, 0, 4, 'no', '2021-04-14 06:02:02'),
(6, 3, 'Pakistan Tour', '14 Days', '2021-04-30', '2021-07-09', 36000, 6, 50, 46000, 'a', 6000, 450, 5, 5, 0, 0, 3, 'no', '2021-04-14 06:03:04'),
(7, 1, 'Pakistan Tour 12', '14 Days', '2021-04-30', '2021-05-06', 46000, 5, 56, 56000, 'a', 4500, 450, 5, 5, 0, 0, 3, 'no', '2021-04-14 06:04:20'),
(8, 1, 'Uzbekistan 15 Days', '14 Days', '2021-04-23', '2021-05-08', 40000, 5, 50, 50000, 's', 4000, 500, 5, 5, 0, 0, 3, 'no', '2021-04-14 06:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `guide_details`
--

CREATE TABLE `guide_details` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guide_details`
--

INSERT INTO `guide_details` (`id`, `country_id`, `name`, `email`, `created_at`) VALUES
(3, 1, 'Salman', 'salman@guide.com', '2021-08-12 10:27:54'),
(4, 1, 'Sohail', 'sohail@guide.com', '2021-08-12 10:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `home_page`
--

CREATE TABLE `home_page` (
  `id` int(11) NOT NULL,
  `main_title` text NOT NULL,
  `main_title_dec` text NOT NULL,
  `box_title1` text NOT NULL,
  `box_title1_dec` text NOT NULL,
  `box_title2` text NOT NULL,
  `box_title2_dec` text NOT NULL,
  `box_title3` text NOT NULL,
  `box_title3_dec` text NOT NULL,
  `explore_title` text NOT NULL,
  `explore_dec` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_page`
--

INSERT INTO `home_page` (`id`, `main_title`, `main_title_dec`, `box_title1`, `box_title1_dec`, `box_title2`, `box_title2_dec`, `box_title3`, `box_title3_dec`, `explore_title`, `explore_dec`, `created_at`) VALUES
(1, 'Tour Types', 'We offer three kinds of tour packages: Group tours, Private tours and custom tours. All packages offered by us can be purchased as both Group and Private tours. You can select the type of tour based on your needs. Or alternatively , you can design your own custom itinerary from the custom tour page\r\n\r\n', 'Group Tours', 'As the name suggests, you will be travelling with a group of individuals. The group will have one guide who will chauffeur the group during the entire travel. This kind of tour is best suited for solo budget travellers and groups of people who plan to travel together. Go to the destination tab above to explore various packages we offer.\r\n\r\n', 'Private Tours', 'Private tour is for individuals who like to for individuals who prefer travelling alone and enjoy all the benefits of the group tour. In private tour, you will have your own guide who will also act as your chauffeur and personal assistant throughout the entire trip. This type of tour is best suited for couples or individuals who prefer travelling solo yet luxuriously. Go to the destination tab above to explore various packages we offer.\r\n\r\n', 'Custom Tours', 'Custom tour as the name suggest allows you to customize your entire itinerary. All you do is click on the Custom tour tab above, anser a bunch of questions and we will suggest you locations and Itineraries based on your answers.\r\n\r\nYou can create your custom Itinerary from our suggestions which suits your requirements the best.\r\n\r\n', 'Explore With Gocentrasia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', '2021-04-07 01:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary`
--

CREATE TABLE `itinerary` (
  `id` int(11) NOT NULL,
  `pkg_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `img` text NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itinerary`
--

INSERT INTO `itinerary` (`id`, `pkg_id`, `title`, `detail`, `img`, `latitude`, `longitude`, `create_at`) VALUES
(1, 1, 'Day 1: Samarkand – Bukhara (Uzbekistan)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1617995619_path-image1.jpg', 66.3121, 39.9549, '2021-04-09 13:13:39'),
(2, 1, 'Day 2: Almaty – Arrival (Kazakhstan)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1617995619_path-image2.jpg', 76.8512, 43.222, '2021-04-09 13:13:39'),
(3, 1, 'Day 3: Almaty – Arrival (Tajiskistan)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1617995619_path-image3.jpg', 64.4556, 39.7681, '2021-04-09 13:13:39'),
(4, 1, 'Day 4: Bukhara – Mary – Merv – Ashgabat (Uzbekistan/Turkmenistan)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1617995619_path-image4.jpg', 58.3901, 37.9503, '2021-04-09 13:13:39'),
(5, 1, 'Day 5: Ashgabat – Darvaza Gas Crater (Turkmenistan)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1617995619_path-image5.jpg', 58.3901, 37.9503, '2021-04-09 13:13:39'),
(6, 1, 'Day 6: Seven Lakes – Penjikent – Samarkand (Tajikistan/Uzbekistan)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1617995619_path-image6.jpg', -79.5852, 35.2632, '2021-04-09 13:13:39'),
(7, 1, 'Day 7: Tashkent – departure (UZB)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1617995619_path-image7.jpg', 69.2401, 41.2995, '2021-04-09 13:13:39'),
(8, 2, 'Day 1: Islamabad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1618057000_path-image1.jpg', 33.6938, 73.0651, '2021-04-10 06:16:40'),
(9, 2, 'Day 2: Murree, Tehsil Murree, Pakistan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1618057000_path-image2.jpg', 33.9057, 73.3927, '2021-04-10 06:16:40'),
(10, 2, 'Day 3: Skardu, Gilgit-Baltistan, Pakistan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1618057000_path-image3.jpg', 35.2875, 75.6074, '2021-04-10 06:16:40'),
(11, 2, 'Day 4: Hunza, Gilgit-Baltistan, Pakistan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1618057000_path-image4.jpg', 36.5, 75.5, '2021-04-10 06:16:40'),
(12, 2, 'Day 5: Quetta, Balochistan, Pakistan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1618057000_path-image5.jpg', 30.1958, 67.0172, '2021-04-10 06:16:40'),
(13, 2, 'Day 6: Lahore, Punjab, Pakistan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1618057000_path-image6.jpg', 31.5657, 74.3142, '2021-04-10 06:16:40'),
(14, 2, 'Day 7: Faisalabad, Punjab, Pakistan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1618057000_path-image7.jpg', 31.4221, 73.0923, '2021-04-10 06:16:40'),
(15, 3, 'Day 1: Karachi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1618379810_path-image2.jpg', 24.8668, 67.0311, '2021-04-14 10:56:50'),
(16, 3, 'Day 2:Lahore, Punjab, Pakistan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1618379810_path-image6.jpg', 31.5657, 74.3142, '2021-04-14 10:56:50'),
(17, 3, 'Day 3: Rawalpindi, Rawalpindi District, Pakistan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1618379810_path-image4.jpg', 33.5914, 73.0535, '2021-04-14 10:56:50'),
(18, 3, 'Day 4: Faisalabad, Punjab, Pakistan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1618379810_path-image5.jpg', 31.4221, 73.0923, '2021-04-14 10:56:50'),
(19, 3, 'Day 5: Islamabad Capital Territory, Pakistan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'assets/img/itinerary_img//2021/04/1618379810_path-image3.jpg', 33.6938, 73.0651, '2021-04-14 10:56:50'),
(20, 4, 'bans bajfg', ' gh gayhasfglyagsjfg', 'assets/img/itinerary_img//2021/07/1626097535_user-2.jpg', 124.123, 13, '2021-07-12 18:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `our_partners`
--

CREATE TABLE `our_partners` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `our_partners`
--

INSERT INTO `our_partners` (`id`, `img`) VALUES
(1, 'partner-logo1.jpg'),
(2, 'partner-logo2.jpg'),
(3, 'partner-logo3.jpg'),
(4, 'partner-logo4.jpg'),
(5, 'partner-logo5.jpg'),
(6, 'partner-logo6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `package_name` varchar(225) NOT NULL,
  `duration` varchar(225) NOT NULL,
  `places_description` text NOT NULL,
  `description` text NOT NULL,
  `accommodation` text NOT NULL,
  `inclusion` text NOT NULL,
  `exclusion` text NOT NULL,
  `additional_remarks` text NOT NULL,
  `show_on_website` int(11) NOT NULL DEFAULT 0,
  `images` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `country_id`, `package_name`, `duration`, `places_description`, `description`, `accommodation`, `inclusion`, `exclusion`, `additional_remarks`, `show_on_website`, `images`, `created_at`) VALUES
(1, 1, 'Uzbekistan Package', '14 Days', 'Tashkent Samarqand Fergana Namangan Asgabat Turkmenabat Dasoguz Mary', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', '{\"city\":[\"Uzbekistan 1\",\"Uzbekistan 2\",\"Uzbekistan 3\",\"Uzbekistan 4\",\"Uzbekistan 5\",\"Uzbekistan 6\",\"Uzbekistan 7\"],\"stay\":[\"2 nights\",\"2 nights\",\"1 nights\",\"4 nights\",\"2 nights\",\"1 nights\",\"2 nights\"],\"detail\":[\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\"]}', '<ul>\r\n	<li>All transfers: 3-7 pax on minivan/van, 8-16 pax by 20 seat bus;</li>\r\n	<li>Sightseeing tour program with English speaking guides in each country;</li>\r\n	<li>Visa support for Uzbekistan triple entry visa</li>\r\n	<li>Accommodation based on double/twin room sharing, breakfasts included;</li>\r\n	<li>Entrance fees to sights as per itinerary;</li>\r\n	<li>Economy class tickets for flights: Almaty-Bishkek-Tashkent, Mary-Ashgabat, Urgench-Tashkent;</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Tour leader to accompany the group of 1-5 travelers for the whole period of the tour;</li>\r\n	<li>Hotel charges for additional services;</li>\r\n	<li>Consular fees for Turkmenistan tourist visas (80 USD) and migration tax (14 USD)</li>\r\n	<li>Full board (lunches and dinners)</li>\r\n	<li>A tax of 2 USD per night in Turkmenistan, paid to the hotel upon check out</li>\r\n	<li>Personal travel insurance</li>\r\n</ul>\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra', 0, 'assets/img/package_img/2021/04/1617995619_tour-bg1.jpg', '2021-04-09 13:13:39'),
(2, 2, 'SILKROAD GROUP TOUR', '14 Days', 'Tashkent Samarqand Fergana Namangan Asgabat Turkmenabat Dasoguz Mary', 'PACKAGE\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', '{\"city\":{\"0\":\"Islamabad\",\"1\":\"Murree\",\"2\":\"Skardu\",\"3\":\"Hunza\",\"4\":\"Quetta\",\"5\":\"Lahore\",\"12\":\"Faisalabad\"},\"stay\":{\"0\":\"2 nights\",\"1\":\"2 nights\",\"2\":\"2 nights\",\"3\":\"2 nights\",\"4\":\"2 nights\",\"5\":\"2 nights\",\"12\":\"2 nights\"},\"detail\":{\"0\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"1\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"2\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"3\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"4\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"5\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"12\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\"}}', '<ul>\r\n	<li>All transfers: 3-7 pax on minivan/van, 8-16 pax by 20 seat bus;</li>\r\n	<li>Sightseeing tour program with English speaking guides in each country;</li>\r\n	<li>Visa support for Uzbekistan triple entry visa</li>\r\n	<li>Accommodation based on double/twin room sharing, breakfasts included;</li>\r\n	<li>Entrance fees to sights as per itinerary;</li>\r\n	<li>Economy class tickets for flights: Almaty-Bishkek-Tashkent, Mary-Ashgabat, Urgench-Tashkent;</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Tour leader to accompany the group of 1-5 travelers for the whole period of the tour;</li>\r\n	<li>Hotel charges for additional services;</li>\r\n	<li>Consular fees for Turkmenistan tourist visas (80 USD) and migration tax (14 USD)</li>\r\n	<li>Full board (lunches and dinners)</li>\r\n	<li>A tax of 2 USD per night in Turkmenistan, paid to the hotel upon check out</li>\r\n	<li>Personal travel insurance</li>\r\n</ul>\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra', 0, 'assets/img/package_img/2021/04/1618057000_tour-bg2.jpg', '2021-04-10 06:16:40'),
(3, 3, 'CAUCASUS GROUP TOUR', '14 Days', 'Tashkent Samarqand Fergana Namangan Asgabat Turkmenabat Dasoguz Mary', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', '{\"city\":[\"Uzbekistan\",\"Uzbekistan\",\"Uzbekistan\",\"Uzbekistan\",\"Uzbekistan\",\"Uzbekistan\",\"Uzbekistan\"],\"stay\":[\"2 nights\",\"2 nights\",\"2 nights\",\"2 nights\",\"2 nights\",\"2 nights\",\"2 nights\"],\"detail\":[\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\",\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\"]}', '<ul>\r\n	<li>All transfers: 3-7 pax on minivan/van, 8-16 pax by 20 seat bus;</li>\r\n	<li>Sightseeing tour program with English speaking guides in each country;</li>\r\n	<li>Visa support for Uzbekistan triple entry visa</li>\r\n	<li>Accommodation based on double/twin room sharing, breakfasts included;</li>\r\n	<li>Entrance fees to sights as per itinerary;</li>\r\n	<li>Economy class tickets for flights: Almaty-Bishkek-Tashkent, Mary-Ashgabat, Urgench-Tashkent;</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Tour leader to accompany the group of 1-5 travelers for the whole period of the tour;</li>\r\n	<li>Hotel charges for additional services;</li>\r\n	<li>Consular fees for Turkmenistan tourist visas (80 USD) and migration tax (14 USD)</li>\r\n	<li>Full board (lunches and dinners)</li>\r\n	<li>A tax of 2 USD per night in Turkmenistan, paid to the hotel upon check out</li>\r\n	<li>Personal travel insurance</li>\r\n</ul>\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra', 1, 'assets/img/package_img/2021/04/1618379810_tour-bg3.jpg', '2021-04-14 10:56:50'),
(4, 2, 'sa bajs h', '10 days', 'asklh aslkfhaf', 'h aoifhagsoiuf jxbc xkjvgui', '{\"city\":[\"ka\",\"ha\"],\"stay\":[\"2\",\"1 \"],\"detail\":[\"ka siohasf[\",\"hajgf aui sf\"]}', '<p>a sjhfkj asgkfj kncz xguyql fqj</p>\r\n', '<p>jgas giufasgiufagsf; sakmbzxjcguyrvq7ftquwihfkjqwhfiuoqwgfiu&nbsp;</p>\r\n', ' iasjlgjhc gzxjhc gy t uif g qwkjdnnascfzuxy cgkqwf', 1, 'assets/img/package_img/2021/07/1626097534_user-7.jpg', '2021-07-12 18:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `package_activities`
--

CREATE TABLE `package_activities` (
  `id` int(11) NOT NULL,
  `pkg_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_activities`
--

INSERT INTO `package_activities` (`id`, `pkg_id`, `activity_id`, `created_at`) VALUES
(1, 1, 1, '2021-04-09 19:13:39'),
(2, 1, 2, '2021-04-09 19:13:39'),
(3, 1, 3, '2021-04-09 19:13:39'),
(4, 1, 4, '2021-04-09 19:13:39'),
(5, 1, 5, '2021-04-09 19:13:39'),
(6, 1, 6, '2021-04-09 19:13:39'),
(7, 1, 7, '2021-04-09 19:13:39'),
(8, 1, 8, '2021-04-09 19:13:39'),
(9, 1, 9, '2021-04-09 19:13:39'),
(10, 1, 10, '2021-04-09 19:13:39'),
(11, 1, 11, '2021-04-09 19:13:39'),
(12, 1, 12, '2021-04-09 19:13:39'),
(13, 1, 13, '2021-04-09 19:13:39'),
(14, 1, 14, '2021-04-09 19:13:39'),
(15, 1, 15, '2021-04-09 19:13:39'),
(16, 1, 16, '2021-04-09 19:13:39'),
(17, 2, 1, '2021-04-10 12:16:40'),
(18, 2, 2, '2021-04-10 12:16:40'),
(19, 2, 3, '2021-04-10 12:16:40'),
(20, 2, 4, '2021-04-10 12:16:40'),
(21, 2, 5, '2021-04-10 12:16:40'),
(22, 2, 6, '2021-04-10 12:16:40'),
(23, 2, 7, '2021-04-10 12:16:40'),
(24, 2, 8, '2021-04-10 12:16:40'),
(25, 2, 9, '2021-04-10 12:16:40'),
(26, 2, 10, '2021-04-10 12:16:41'),
(27, 2, 11, '2021-04-10 12:16:41'),
(28, 2, 12, '2021-04-10 12:16:41'),
(29, 2, 13, '2021-04-10 12:16:41'),
(30, 2, 14, '2021-04-10 12:16:41'),
(31, 2, 15, '2021-04-10 12:16:41'),
(32, 2, 16, '2021-04-10 12:16:41'),
(33, 3, 1, '2021-04-14 05:56:50'),
(34, 3, 2, '2021-04-14 05:56:50'),
(35, 3, 3, '2021-04-14 05:56:50'),
(36, 3, 4, '2021-04-14 05:56:50'),
(37, 3, 5, '2021-04-14 05:56:50'),
(38, 3, 6, '2021-04-14 05:56:50'),
(39, 3, 7, '2021-04-14 05:56:50'),
(40, 3, 8, '2021-04-14 05:56:50'),
(41, 3, 9, '2021-04-14 05:56:50'),
(42, 3, 10, '2021-04-14 05:56:50'),
(43, 3, 11, '2021-04-14 05:56:50'),
(44, 3, 13, '2021-04-14 05:56:50'),
(45, 3, 14, '2021-04-14 05:56:50'),
(46, 3, 15, '2021-04-14 05:56:50'),
(47, 3, 16, '2021-04-14 05:56:50'),
(48, 4, 1, '2021-07-12 13:45:35'),
(49, 4, 2, '2021-07-12 13:45:35'),
(50, 4, 3, '2021-07-12 13:45:35'),
(51, 4, 5, '2021-07-12 13:45:35'),
(52, 4, 7, '2021-07-12 13:45:35'),
(53, 4, 10, '2021-07-12 13:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `package_images`
--

CREATE TABLE `package_images` (
  `id` int(11) NOT NULL,
  `pkg_id` int(11) NOT NULL,
  `img` text NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_images`
--

INSERT INTO `package_images` (`id`, `pkg_id`, `img`, `created_at`) VALUES
(1, 1, 'assets/img/package_img/2021/04/gallery-image2.jpg', NULL),
(2, 1, 'assets/img/package_img/2021/04/gallery-image1.jpg', NULL),
(3, 2, 'assets/img/package_img/2021/04/gallery-image11.jpg', NULL),
(4, 2, 'assets/img/package_img/2021/04/gallery-image21.jpg', NULL),
(5, 3, 'assets/img/package_img/2021/04/gallery-image12.jpg', NULL),
(6, 3, 'assets/img/package_img/2021/04/gallery-image22.jpg', NULL),
(7, 4, 'assets/img/package_img/2021/07/user-1.jpg', NULL),
(8, 4, 'assets/img/package_img/2021/07/user-2.jpg', NULL),
(9, 4, 'assets/img/package_img/2021/07/user-3.jpg', NULL),
(10, 4, 'assets/img/package_img/2021/07/user-6.jpg', NULL),
(11, 4, 'assets/img/package_img/2021/07/user-8.jpg', NULL),
(12, 4, 'assets/img/package_img/2021/07/user-9.jpg', NULL),
(13, 4, 'assets/img/package_img/2021/07/user-10.jpg', NULL),
(14, 4, 'assets/img/package_img/2021/07/user-11.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_service`
--

CREATE TABLE `package_service` (
  `id` int(11) NOT NULL,
  `pkg_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_service`
--

INSERT INTO `package_service` (`id`, `pkg_id`, `service_id`, `created_at`) VALUES
(1, 1, 1, '2021-04-09 13:13:39'),
(2, 1, 2, '2021-04-09 13:13:39'),
(3, 1, 3, '2021-04-09 13:13:39'),
(4, 1, 4, '2021-04-09 13:13:39'),
(5, 1, 5, '2021-04-09 13:13:39'),
(6, 1, 6, '2021-04-09 13:13:39'),
(7, 1, 7, '2021-04-09 13:13:39'),
(8, 1, 8, '2021-04-09 13:13:39'),
(9, 1, 9, '2021-04-09 13:13:39'),
(10, 1, 10, '2021-04-09 13:13:39'),
(11, 2, 1, '2021-04-10 06:16:41'),
(12, 2, 2, '2021-04-10 06:16:41'),
(13, 2, 3, '2021-04-10 06:16:41'),
(14, 2, 4, '2021-04-10 06:16:41'),
(15, 2, 5, '2021-04-10 06:16:41'),
(16, 2, 6, '2021-04-10 06:16:41'),
(17, 2, 7, '2021-04-10 06:16:41'),
(18, 2, 8, '2021-04-10 06:16:41'),
(19, 2, 9, '2021-04-10 06:16:41'),
(20, 2, 10, '2021-04-10 06:16:41'),
(21, 3, 1, '2021-04-14 10:56:50'),
(22, 3, 2, '2021-04-14 10:56:50'),
(23, 3, 3, '2021-04-14 10:56:50'),
(24, 3, 4, '2021-04-14 10:56:50'),
(25, 3, 5, '2021-04-14 10:56:50'),
(26, 3, 6, '2021-04-14 10:56:50'),
(27, 3, 7, '2021-04-14 10:56:50'),
(28, 3, 8, '2021-04-14 10:56:50'),
(29, 3, 9, '2021-04-14 10:56:50'),
(30, 3, 10, '2021-04-14 10:56:50'),
(31, 4, 1, '2021-07-12 18:45:35'),
(32, 4, 2, '2021-07-12 18:45:35'),
(33, 4, 3, '2021-07-12 18:45:35'),
(34, 4, 4, '2021-07-12 18:45:35'),
(35, 4, 5, '2021-07-12 18:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(225) NOT NULL,
  `service_img` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_img`, `created_at`) VALUES
(1, 'Guide', 'service-icon1.jpg', '2021-04-06 22:12:12'),
(2, 'Driver', 'service-icon2.jpg', '2021-04-06 22:12:49'),
(3, 'Lunch', 'service-icon3.jpg', '2021-04-06 22:13:27'),
(4, 'Accomodation', 'service-icon4.jpg', '2021-04-06 22:13:41'),
(5, 'Domestic Bus/ Flight Tickets', 'service-icon5.jpg', '2021-04-06 22:13:55'),
(6, 'Entrance Tickets', 'service-icon6.jpg', '2021-04-06 22:14:07'),
(7, 'Dinner', 'service-icon7.jpg', '2021-04-06 22:14:25'),
(8, 'Camping', 'service-icon8.jpg', '2021-04-06 22:14:38'),
(9, 'Lunch', 'service-icon9.jpg', '2021-04-06 22:14:55'),
(10, 'Gas', 'GAS.jpg', '2021-04-06 22:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `size_and_cost_aggent_rates`
--

CREATE TABLE `size_and_cost_aggent_rates` (
  `id` int(11) NOT NULL,
  `aggent_rates_id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `group_type` enum('Private','Group') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size_and_cost_aggent_rates`
--

INSERT INTO `size_and_cost_aggent_rates` (`id`, `aggent_rates_id`, `size`, `cost`, `group_type`, `created_at`, `updated_at`) VALUES
(90, 3, 334, '471', 'Private', '2021-08-13 12:11:37', '2021-08-13 12:11:37'),
(91, 3, 830, '709', 'Private', '2021-08-13 12:11:37', '2021-08-13 12:11:37'),
(92, 3, 899, '793', 'Private', '2021-08-13 12:11:37', '2021-08-13 12:11:37'),
(93, 3, 519, '404', 'Private', '2021-08-13 12:11:37', '2021-08-13 12:11:37'),
(94, 3, 120, '254', 'Private', '2021-08-13 12:11:37', '2021-08-13 12:11:37'),
(95, 3, 162, '806', 'Private', '2021-08-13 12:11:37', '2021-08-13 12:11:37'),
(96, 3, 8, '696', 'Private', '2021-08-13 12:11:37', '2021-08-13 12:11:37'),
(97, 3, 242, '779', 'Private', '2021-08-13 12:11:37', '2021-08-13 12:11:37'),
(98, 4, 976, '295', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(99, 4, 129, '562', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(100, 4, 651, '652', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(101, 4, 987, '579', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(102, 4, 992, '946', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(103, 4, 435, '961', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(104, 4, 36, '834', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(105, 4, 29, '236', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(106, 4, 77, '152', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(107, 4, 307, '1000', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(108, 4, 375, '742', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(109, 4, 713, '848', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(110, 4, 921, '954', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(111, 4, 541, '762', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(112, 4, 198, '90', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(113, 4, 982, '858', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(114, 4, 771, '8', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(115, 4, 903, '456', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(116, 4, 601, '248', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(117, 4, 75, '941', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(118, 4, 463, '218', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(119, 4, 753, '800', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(120, 4, 117, '954', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(121, 4, 376, '531', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(122, 4, 991, '820', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(123, 4, 557, '610', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(124, 4, 644, '337', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(125, 4, 781, '976', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(126, 4, 369, '412', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(127, 4, 365, '640', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(128, 4, 188, '674', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29'),
(129, 4, 861, '815', 'Group', '2021-08-13 12:13:29', '2021-08-13 12:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `tag_line` text NOT NULL,
  `img` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `tag_line`, `img`, `created_at`) VALUES
(1, 'Uzbekistan Group Tour 2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus ve', 'assets/img/slider/banner-bg1.jpg', '2021-04-07 01:46:52'),
(2, 'Uzbekistan Group Tour 2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus ve', 'assets/img/slider/banner-bg11.jpg', '2021-04-07 01:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag_name`, `created_at`) VALUES
(1, 'TRAVELING', '2021-04-07 03:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions`
--

CREATE TABLE `terms_and_conditions` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terms_and_conditions`
--

INSERT INTO `terms_and_conditions` (`id`, `title`, `description`, `created_at`) VALUES
(1, 'Terms & Condition', '“You/Client” means and includes the Lead Passenger & on whose behalf the Booking is made and / or the person making the Booking\r\n“We”/”Us”/”Company” means Thomas Cook (India) Ltd.\r\n“Independent Contractors” means Hotelier / Hotel owner, Owner of any airlines or shipping company or Railway, Ferryboat owner / Operator, Coach owner/Operator, or any other person or organization who has been selected by the company to render services to the client.\r\nGST means and includes Goods and Service Tax.\r\nYou confirm that the aforesaid lead passenger is the service recipient for GST purpose', '2021-04-17 15:31:19'),
(2, 'Brochure / Itinerary Accuracy / Change', 'All information given in this brochure / itinerary is based on the information available at the time of publication. We reserve the right to change any brochure /itinerary information before or after your booking the tour due to any events beyond our control. In case we are aware of any changes sufficiently in advance, we will notify you at the time of booking, otherwise our Tour Manager or Local representative will inform you of the changes. Major road works may necessitate route changes in the itineraries, Indian restaurants may close or change management, all of these may cause us to make changes in the itineraries. Where we know of these sufficiently in advance we will notify you, otherwise our Tour Managers or Local Representative will inform you of the changes on the spot. There are also very big fairs and exhibitions, where all the hotels are fully booked well in advance, and therefore it may be necessary to stay in hotels in other cities. We may often operate more than one coach per departure date. We may operate more than one group per departure or club 2 groups in one departure due to operational reasons. For the comfort and convenience of our clients, we will sometimes reverse the direction, or slightly amend the itinerary including the flight routing. We will advise you of these amendments, prior to the start of the tour or on tour. We may modify the itinerary based on various factors like maintenance of historical monuments, museums, major events like sports conventions, religious festivals, etc. We may take a detour to reach sightseeing places due to traffic conditions; road blocks and that may vary the course of itinerary. We reserve the right to change the departure date or cancel a departure due to lack of enough number of passengers and will not take any responsibility for any ticket of the client which they may have purchased in advance for sector within India or abroad. Clients are responsible for the adherence to time at all stages of the tour. In the event that a client misses on any part of the sightseeing tour or any such tour due to delay on his part, he will not be entitled to claim refund of the same. The company shall not accept any liability or responsibility for any damages, loss, baggage loss, injury, accident, death, breakdown, or irregularity, which may occur in carrying out the tour arrangement, weather conditions, strikes, war, quarantine and any other cause whatsoever and all such loss or expense must be borne by the client. We reserve the right to claim any additional expenses incurred due to delay or changes in schedules of train, aeroplane, bus, ship or other services. We further reserve the right to amend, alter, vary or withdraw any particular departure; excursions advertised or substitute a hotel of similar category if deemed necessary. You consent for the amendment/alteration in the brochure/itinerary. These terms shall be read together with the brochure/itinerary but these terms shall prevail over the brochure/itinerary and shall override the brochure/itinerary to the extent that it is contradictory or conflicting thereto', '2021-04-17 15:33:02'),
(3, 'Hotels', 'You will be out sightseeing most of the time and hence we have taken care to select hotels which are convenient and comfortable. Hence sometimes they may be located away from the city centre. Most of the rooms have private bath or shower. The category of hotels will vary according the tour package booked by you. The hotels will either be those shown in the itinerary or of the same category. Due to trade fairs and conventions in the cities the hotels may be blocked out for more than 2 yrs in advance. In view of this you may have to stay in hotels further away from the cities and itineraries may have to be altered / amended. Since the rooms are comparatively small, we would recommend only 3 persons in one room for your own comfort. Triple rooms are usually no larger than twin rooms and the third bed is often a rollaway cot put in a twin room for the night. Also due to favourable conditions in certain countries, most of the hotels may not have air conditioners / fans. All baggage and personal effects are at all times and under all circumstances your responsibility. We will not be responsible or liable in case of loss or theft or damage of such items from the hotel premises / Coach / Cruise / Airport / during travel or place of visit etc. Some hotels offer the facility of safe deposit lockers, which can be availed of by you at your own cost and risk. The company will not be liable for any loss / theft from the same. Any damages caused to the hotel rooms / Coach / place of visit etc. during your stay / tour / visit, shall be borne and payable by you, and the company will not be liable for the same. Company is not liable if there is sudden disruption / disorder of telephone, internet services, and other amenities while staying at the hotels. The company will also be not responsible for the facilities provided or not provided in the room / bathroom / hotel premises etc. by the Hotel or its staff. Rude or Unprofessional behavior of hotel staff does not come under the direct purview of the company and the company will not be responsible for the same. Facilities like mini bar, pay television channels, telephone etc are not complimentary and these facilities if used by the client have to be paid for by the client directly to the Hotel and such charges are not included in the tour cost. The client will have to abide by the check in /check out time of the hotel. Any changes made directly by the hotel come under their direct purview and we will not be liable for any compensation due to this change.', '2021-04-17 16:14:23'),
(4, 'Meals and Special Requests', 'The menus are pre-set menus provided for meals on the tour. The types of meals are clearly indicated in the brochure. Unlike an airline, we cannot provide a special meal, nor do we guarantee a special diet to the client, except to the extent mentioned in the brochure and preferred by you. We however reserve the right to change the meal arrangement if circumstances make it necessary to do so. In the event that the client wakes up late and misses the breakfast off ered to him or the client is out on his own and reaches late or in case of delay of flights or for any other reason whatsoever the client misses any meal including breakfast offered to him by the company, then no claim can be made for the meal/ breakfast, which he has missed and not utilized. Special requests for room allocation, diet consideration on tour / cruise / flight etc. must be made in writing at the time of booking, but all such requests shall be subject to availability. The Company will not be held liable for claims of damages or consequential loss if the company is unable to process such requests for want of availability.', '2021-04-17 16:15:06'),
(5, 'Airline', 'The Company shall, in no circumstances whatsoever and howsoever caused, shall be liable to the client or any person traveling with him for Loss of Baggage by the Airline, failure to provide meal of the client’s choice by the Airline, Overbooking of seats by the Airline, failure on the part of Airline to accommodate client despite having confirmed tickets, Meals offered by the airline/ Quality of meal, Flight delay, if the client misses the flight, Changes of flight schedule / routing / airline mentioned at the time of booking, etc. In this condition the expression ‘howsoever caused’ includes negligence on the part of client or the service provider. If in the event that the client is booked on a particular Airline on a particular date and due to certain reasons beyond the control of the Company, the client is not allowed to board the flight, the client shall not hold the Company responsible for the same and no claim whatsoever can be made by the client against the Company. Airport taxes / Airport Development Fee as applicable to be paid over & above the Tour Cost should there be a rise post the printing of the brochure. All the booking / cancellation / change of the airline ticket and the travel on such airline ticket will be subject to the terms and conditions of respective Airlines and the same may be provided to the client by the company upon request from client. Airlines are operating as per its own norms, rules and regulations and client has to strictly adhere to the same', '2021-04-17 16:16:20'),
(6, 'Loss / Damage', 'Company is not responsible for any loss or damage to personal belongings during the stay in the hotel or while traveling in the coach. Due to theft or loss of baggage, tour participant can lodge a complaint with the local authorities on his/her sole discretion, cost, risk and consequences', '2021-04-17 16:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `website_setting`
--

CREATE TABLE `website_setting` (
  `id` int(11) NOT NULL,
  `basefare` float NOT NULL,
  `gst` int(11) NOT NULL,
  `tcs` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website_setting`
--

INSERT INTO `website_setting` (`id`, `basefare`, `gst`, `tcs`, `create_at`) VALUES
(1, 400, 5, 3, '2021-06-09 14:03:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aggent_rates`
--
ALTER TABLE `aggent_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arrival_city`
--
ALTER TABLE `arrival_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_reviews`
--
ALTER TABLE `client_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_images`
--
ALTER TABLE `country_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_tour`
--
ALTER TABLE `custom_tour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_tour_activities`
--
ALTER TABLE `custom_tour_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departure_city`
--
ALTER TABLE `departure_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide_details`
--
ALTER TABLE `guide_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page`
--
ALTER TABLE `home_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_partners`
--
ALTER TABLE `our_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_activities`
--
ALTER TABLE `package_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_images`
--
ALTER TABLE `package_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_service`
--
ALTER TABLE `package_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_and_cost_aggent_rates`
--
ALTER TABLE `size_and_cost_aggent_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_setting`
--
ALTER TABLE `website_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aggent_rates`
--
ALTER TABLE `aggent_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `arrival_city`
--
ALTER TABLE `arrival_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_reviews`
--
ALTER TABLE `client_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `country_images`
--
ALTER TABLE `country_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `custom_tour`
--
ALTER TABLE `custom_tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `custom_tour_activities`
--
ALTER TABLE `custom_tour_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `departure_city`
--
ALTER TABLE `departure_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `guide_details`
--
ALTER TABLE `guide_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_page`
--
ALTER TABLE `home_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `itinerary`
--
ALTER TABLE `itinerary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `our_partners`
--
ALTER TABLE `our_partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package_activities`
--
ALTER TABLE `package_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `package_images`
--
ALTER TABLE `package_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `package_service`
--
ALTER TABLE `package_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `size_and_cost_aggent_rates`
--
ALTER TABLE `size_and_cost_aggent_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `website_setting`
--
ALTER TABLE `website_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
