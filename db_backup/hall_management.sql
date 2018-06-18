-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2017 at 05:49 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hall_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `hall_id` int(10) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `event_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_person` int(5) NOT NULL,
  `floor_number` int(5) NOT NULL,
  `customer_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `customer_address` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` int(15) NOT NULL,
  `customer_service` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `hall_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `hall_address` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `hall_contact` int(120) NOT NULL,
  `hall_rent` int(10) NOT NULL,
  `approve` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `booking_cancel` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `hall_id`, `customer_id`, `event_name`, `booking_date`, `booking_time`, `total_person`, `floor_number`, `customer_name`, `customer_email`, `customer_address`, `phone_number`, `customer_service`, `hall_name`, `hall_address`, `hall_contact`, `hall_rent`, `approve`, `booking_cancel`) VALUES
(51, 2, 18, 'Meeting', '2017-08-11', 'Day', 555, 1, ' sk jamal', 'jama@gmail.com', 'dhaka', 1952654596, 'all', 'Zinnurine Convention Centre', 'CDA Avenue, Bayezid Bostami Road, 2 No. Gate, Chit...', 1826596323, 86000, 'Yes', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` int(15) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `customer_ID_deleted` varchar(11) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`id`, `name`, `email`, `phone`, `subject`, `message`, `customer_ID_deleted`) VALUES
(9, 'marufu islam', 'skmarufiiuc@gmail.com', 1825484458, ' i want to cancel my booking on... ', ' i want to cancel my booking on... ', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `food_list`
--

CREATE TABLE `food_list` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `hall_id` int(11) NOT NULL,
  `hall_name` varchar(100) NOT NULL,
  `hall_contact` varchar(100) NOT NULL,
  `hall_rent` varchar(111) NOT NULL,
  `hall_capacity` int(111) NOT NULL,
  `hall_email` varchar(100) NOT NULL,
  `hall_address` varchar(250) NOT NULL,
  `hall_summary` varchar(1000) NOT NULL,
  `hall_floor` varchar(200) NOT NULL,
  `hall_logo` varchar(200) NOT NULL,
  `hall_images` varchar(800) NOT NULL,
  `hall_services` varchar(500) NOT NULL,
  `soft_deleted` varchar(50) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`hall_id`, `hall_name`, `hall_contact`, `hall_rent`, `hall_capacity`, `hall_email`, `hall_address`, `hall_summary`, `hall_floor`, `hall_logo`, `hall_images`, `hall_services`, `soft_deleted`) VALUES
(2, 'Zinnurine Convention Centre', '01826596323', '86000', 2000, 'zinnurineconvention@gmail.com', 'CDA Avenue, Bayezid Bostami Road, 2 No. Gate, Chit...', 'The heart of this Convention Center is equipped with all types of audio-visual equipment. The high ceiling centrally air conditioned Grand Ball Rooms/Banquet Hall has been constructed. Zinnurine Convention Centre has been designed with a new concept where any types of Social Corporate or Cultural Programmes could be arranged in the same complex.', '1st Floor,2nd Floor,3rd Floor', '../../../../../resource/hallLogo/1500448261_logo1.png', '../../../../../resource/clientGallery/1500448261Auditorium-banner-1-2650x950-1500x650-c-default.jpg,../../../../../resource/clientGallery/1500448261hall24_3.jpg,../../../../../resource/clientGallery/1500448261hall24_4.jpg', 'Food & Beverage,Water Service,Decoration,Lighting,Staging,Flower,Beauty Parlour,Air Condition,Parking,Transportation Service', 'No'),
(5, 'City Hall Convention Center', '01719913731', '50000', 3000, 'city@gmail.com', 'City Hall Convention Center', 'City Hall, an enterprise of SEACOM one of the country leading Business House. City Hall is a purpose-built and international standard, state-of-the-art convention facility, the first of its kind in Chittagong. It features an internal hall measuring 40,000 plus square feet consisting of four individual halls', '1st Floor,3rd Floor', '../../../../../resource/hallLogo/1489585170_logo7).png', '../../../../../resource/clientGallery/1489585170ctgConvention.jpg,../../../../../resource/clientGallery/1489585170ctgConvention2.jpg,../../../../../resource/clientGallery/1489585170Grand_Ballroom_1_Banner_Photo.jpg', 'Food & Beverage,Water Service,Decoration,Lighting,Staging,Catering,Beauty Parlour,Air Condition,Parking', 'No'),
(6, 'Hall 24 Convention Center ', '01741268650', '70000', 3000, 'hall24@gmail.com', 'C-34 , Block : E , Zakir Hossian Road , MOHAMMADPUR , chittagong', 'We have the sense fresh, new and original ideas that will ensure the event we organize is successful, unique and memorable. And We are Ã¢â‚¬Å“BD Event Management & Wedding ', '1st Floor,2nd Floor,3rd Floor', '../../../../../resource/hallLogo/1489585226_client_(2).png', '../../../../../resource/clientGallery/1489587933banner2.jpg,../../../../../resource/clientGallery/1489587933cityHall_2.jpg,../../../../../resource/clientGallery/1489587933CretaceousCC-Banquet-sm.jpg', 'Food & Beverage,Water Service,Decoration,Lighting,Staging,Catering,Flower,Beauty Parlour,Photography,Exhibition,Sound System,HD Projector,Air Condition', 'No'),
(7, 'K B Convention Hall', '01816613145', '60000', 4000, 'kb@gmail.com', 'Kalamia Bazar, Shah Amanat Bridge Connecting Road, Chittagong', 'With many years of experience in event organising, we understand that there many factors that lead to a well-organised and successful event. ', '1st Floor,2nd Floor,3rd Floor,5th Floor', '../../../../../resource/hallLogo/1489585276_logo_2.jpg', '../../../../../resource/clientGallery/1489588003cityHall_2.jpg,../../../../../resource/clientGallery/1489588003image3.jpg,../../../../../resource/clientGallery/1489588003KB_5.jpg', 'Food & Beverage,Water Service,Decoration,Lighting,Staging,Catering,Flower,Beauty Parlour,Air Condition,Parking', 'No'),
(9, 'Edan garden community centre', '017778885555', '35000', 2000, 'edangarden@yahoo.com', 'Halisahor chittagong', 'Its  very nice convention centre and largest and available parking space', '1st Floor', '../../../../../resource/hallLogo/1489585450_logo_23.png', '../../../../../resource/clientGallery/1489585450KB_3.jpg,../../../../../resource/clientGallery/1489585450KB_4.jpg,../../../../../resource/clientGallery/1489585450KB_5.jpg', 'Food & Beverage,Water Service,Decoration,Lighting,Staging,Catering,Flower,Beauty Parlour,Air Condition', 'Yes'),
(10, 'Swiss Park', '0312550762', '70000', 2500, 'swisspark@gmail.com', 'House no:43, Road no:2, Panchlish Chittagong', 'With many years of experience in event organising, we understand that there many factors that lead to a well-organised and successful event. ', '1st Floor,2nd Floor,3rd Floor,4th Floor', '../../../../../resource/hallLogo/1489585549_logo8.png', '../../../../../resource/clientGallery/1489585549KB_6.jpg,../../../../../resource/clientGallery/1489585549oatlands-house-home-wedding1.jpg,../../../../../resource/clientGallery/1489585549slide.jpg', 'Food & Beverage,Water Service,Decoration,Lighting,Staging,Catering,Flower,Beauty Parlour,Air Condition', 'No'),
(11, 'Rupnager community centre', '01819626242', '120000', 3000, 'rupnagar@gmail.com', 'Prabortok more,Beside of Achifmi Plaza,chittagong', 'With many years of experience in event organising, we understand that there many factors that lead to a well-organised and successful event. ', '2nd Floor,3rd Floor', '../../../../../resource/hallLogo/1489585741_logo_14.png', '../../../../../resource/clientGallery/1489585741slide_4.jpg,../../../../../resource/clientGallery/1489585741slide-1.jpg,../../../../../resource/clientGallery/1489585741top-banner.jpg', 'Food & Beverage,Water Service,Decoration,Lighting,Staging,Catering,Flower,Beauty Parlour,Air Condition,Parking', 'No'),
(12, 'Hafiz Park', '01831959484', '30000', 1500, 'hafiz@yahoo.com', '928Nabab Siraj Uddaula Road,Chittagong', 'With many years of experience in event organising, we understand that there many factors that lead to a well-organised and successful event. ', '1st Floor,2nd Floor,3rd Floor', '../../../../../resource/hallLogo/1489585792_logo9.jpg', '../../../../../resource/clientGallery/1489585792top-banner.jpg,../../../../../resource/clientGallery/1489585792wedding_page_banner_5.jpg,../../../../../resource/clientGallery/1489585792weddings-3-024.jpg', 'Food & Beverage,Water Service,Decoration,Lighting,Staging,Catering,Flower,Beauty Parlour,Photography,Wifi,Air Condition,Parking', 'No'),
(13, 'Mohona Commity Centre', '01826777701', '80000', 5000, 'mohona@gmail.com', 'A.G Road,Chittagong', 'With many years of experience in event organising, we understand that there many factors that lead to a well-organised and successful event. These aspects include events sponsorship, event marketing and promotions as well as producing event merchandising. Each of these aspects is managed carefully as they are the main components of the main event. Of course, achieving our clientsÃ¢â‚¬â„¢ satisfaction is what motivates us to bring out the best events. We believe in the strengths of each of our team members and we have proved to exceed our clientsÃ¢â‚¬â„¢ expectations and presenting them with successful events that raved fantastic reviews around the world', '1st Floor', '../../../../../resource/hallLogo/1489585889_logo_4.png', '../../../../../resource/clientGallery/1489585889banner3.JPG,../../../../../resource/clientGallery/1489585889banner4.jpg,../../../../../resource/clientGallery/1489585889banner-4.jpg', 'Food & Beverage,Water Service,Decoration,Lighting,Staging,Catering,Flower,Beauty Parlour,Air Condition,Parking', 'Yes'),
(15, 'kings Park Chittagong', '01689450054', '70000', 2500, 'kings@gmail.com', 'Halosahor road,chittagong ', 'With many years of experience in event organising, we understand that there many factors that lead to a well-organised and successful event. ', '1st Floor', '../../../../../resource/hallLogo/1489586005_logo900.jpg', '../../../../../resource/clientGallery/1489586005banner5-1200x480.jpg,../../../../../resource/clientGallery/1489586005banner6.jpg,../../../../../resource/clientGallery/1489586005cityHall_2.jpg', 'Food & Beverage,Water Service,Decoration,Lighting,Staging,Catering,Flower,Beauty Parlour,Air Condition,Parking', 'No'),
(16, 'Safa Arcad', '01797485421', '90000', 4000, 'Safa@gmail.com', '94Nabab Siraj ud dolha road,Chittagong', 'With many years of experience in event organising, we understand that there many factors that lead to a well-organised and successful event. ', '1st Floor,2nd Floor', '../../../../../resource/hallLogo/1489586145_logo_1.jpg', '../../../../../resource/clientGallery/1489586145ctgConvention.jpg,../../../../../resource/clientGallery/1489586145ctgConvention2.jpg,../../../../../resource/clientGallery/1489586145Grand_Ballroom_1_Banner_Photo.jpg', 'Food & Beverage,Water Service,Decoration,Lighting,Staging,Catering,Flower,Beauty Parlour,HD Projector,Air Condition,Parking', 'No'),
(17, 'Western Park Community Centre', '01797425421', '90000', 3000, 'western@gmail.com', 'Coxs bazar road,chittagong', 'The heart of this Convention Center is equipped with all types of audio-visual equipment. The high ceiling centrally air conditioned Grand Ball Rooms/Banquet Hall has been constructed. Zinnurine Convention Centre has been designed with a new concept where any types of Social Corporate or Cultural Programmes could be arranged in the same complex.', '2nd Floor,3rd Floor,4th Floor', '../../../../../resource/hallLogo/1489586241_logo99.png', '../../../../../resource/clientGallery/1489586241cityHall_4.jpg,../../../../../resource/clientGallery/1489586241CretaceousCC-Banquet-sm.jpg,../../../../../resource/clientGallery/1489586241crystal-weddings-BANNER.jpg', 'Food & Beverage,Water Service,Decoration,Lighting,Staging,Catering,Flower,Beauty Parlour,Air Condition,Parking', 'No'),
(19, 'The heart of chittagong', '01765489007', '120000', 4000, 'heart@gmail.com', 'Laldighi more,kowtoali,chittagong', 'With many years of experience in event organising, we understand that there many factors that lead to a well-organised and successful event. These aspects include events sponsorship, event marketing and promotions as well as producing event merchandising. Each of these aspects is managed carefully as they are the main components of the main event. Of course, achieving our clientsÃ¢â‚¬â„¢ satisfaction is what motivates us to bring out the best events. We believe in the strengths of each of our team members and we have proved to exceed our clientsÃ¢â‚¬â„¢ expectations and presenting them with successful events that raved fantastic reviews around the world', '1st Floor,2nd Floor', '../../../../../resource/hallLogo/1489586374_logo77.png', '../../../../../resource/clientGallery/1489586374image3.jpg,../../../../../resource/clientGallery/1489586374IMG_2850.jpg,../../../../../resource/clientGallery/1489586374KB_1.jpg', 'Food & Beverage,Water Service,Decoration,Lighting,Staging,Catering,Flower,Beauty Parlour,HD Projector,Air Condition,Parking', 'Yes'),
(21, 'Somabash community Centre', '01776765438', '100000', 3000, 'somabash@gmail.com', '2no gate,sholosahor,chittagong', 'The heart of this Convention Center is equipped with all types of audio-visual equipment. The high ceiling centrally air conditioned Grand Ball Rooms/Banquet Hall has been constructed. Zinnurine Convention Centre has been designed with a new concept where any types of Social Corporate or Cultural Programmes could be arranged in the same complex.', '1st Floor,2nd Floor,3rd Floor,4th Floor,5th Floor', '../../../../../resource/hallLogo/1489586464_logo8.png', '../../../../../resource/clientGallery/1489586464KB_5.jpg,../../../../../resource/clientGallery/1489586464KB_6.jpg,../../../../../resource/clientGallery/1489586464oatlands-house-home-wedding1.jpg', 'Food & Beverage,Water Service,Decoration,Lighting,Staging,Catering,Flower,Beauty Parlour,Air Condition,Parking', 'No'),
(33, 'GEC Convention Hall', '31613819', '120000', 3000, 'gec_convention@gmail.com', 'GEC circle.4100 Chittagong', 'The heart of this Convention Center is equipped with all types of audio-visual equipment. The high ceiling centrally air conditioned Grand Ball Rooms/Banquet Hall has been constructed. Zinnurine Convention Centre has been designed with a new concept where any types of Social Corporate or Cultural Programmes could be arranged in the same complex.', '1st Floor', '../../../../../resource/hallLogo/1500443416_1489586374_logo77.png', '../../../../../resource/clientGallery/1500443416Auditorium-banner-1-2650x950-1500x650-c-default.jpg,../../../../../resource/clientGallery/1500443416cityHall_3.jpg', 'Food & Beverage,Water Service,Decoration,Lighting,Staging,Catering,Beauty Parlour,Photography,Exhibition,Sound System,HD Projector,Wifi,Air Condition,Parking,Generator,Transportation Service', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(10) NOT NULL,
  `hall_id` int(10) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `event_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_person` int(5) NOT NULL,
  `floor_number` int(5) NOT NULL,
  `customer_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `customer_address` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` int(15) NOT NULL,
  `customer_service` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `hall_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `hall_address` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `hall_contact` int(120) NOT NULL,
  `hall_rent` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `transaction_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `booking_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_charges`
--

CREATE TABLE `other_charges` (
  `id` int(11) NOT NULL,
  `particulars` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `serve_type` varchar(111) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_rights`
--

CREATE TABLE `role_rights` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_module` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module_create` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `module_view` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `module_edit` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `module_delete` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `create_link` varchar(110) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view_link` varchar(110) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edit_link` varchar(110) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_link` varchar(110) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_rights`
--

INSERT INTO `role_rights` (`role_id`, `role_name`, `role_module`, `module_create`, `module_view`, `module_edit`, `module_delete`, `create_link`, `view_link`, `edit_link`, `update_link`) VALUES
(1, 'ADMIN', 'HALL', 'yes', 'yes', 'yes', 'yes', '../hall-scs/create.php', '../hall-scs/index.php', '../hall-scs/edit.php', NULL),
(2, 'ADMIN', 'USER', 'yes', 'yes', 'yes', 'yes', '../frontPage/index.php', '../user/index.php', '../user/index.php', NULL),
(3, 'ADMIN', 'BOOKING', 'yes', 'yes', 'yes', 'yes', '../bookNow/bookNow.php', '../bookNow/bookingList.php', '../bookNow/edit.php', NULL),
(4, 'ADMIN-2', 'SERVICES', 'yes', 'yes', 'yes', 'yes', NULL, NULL, NULL, NULL),
(5, 'ADMIN', 'INVOICES', 'yes', 'yes', 'yes', 'yes', '../bookNow/invoice.php', NULL, NULL, NULL),
(6, 'MODERATOR', 'HALL', 'no', 'yes', 'yes', 'yes', '../hall-scs/create.php', NULL, NULL, NULL),
(7, 'MODERATOR', 'USER', 'no', 'no', 'no', 'no', NULL, NULL, NULL, NULL),
(8, 'MODERATOR', 'BOOKING', 'yes', 'no', 'no', 'no', '../bookNow/bookNow.php', '../bookNow/bookingList.php', NULL, NULL),
(9, 'MODERATOR-2', 'SERVICES', 'yes', 'yes', 'yes', 'yes', NULL, NULL, NULL, NULL),
(10, 'MODERATOR', 'INVOICES', 'no', 'yes', 'yes', 'yes', '../bookNow/invoice.php', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(111) NOT NULL,
  `last_name` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `phone` varchar(111) NOT NULL,
  `address` varchar(333) NOT NULL,
  `email_verified` varchar(111) DEFAULT NULL,
  `role_id` varchar(30) DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `email_verified`, `role_id`) VALUES
(5, 'Tajbir', 'Mowla', 'export@bhuiyanenterprise.com', '091903c59612814c3a04b2b85e5d925d', '', '', '388ef4f6643268590bb7d09ebed02c52', 'MODERATOR'),
(6, 'Sheikh Muhammad', 'Maruful Islam', 'skmarufiiuc@gmail.com', '202cb962ac59075b964b07152d234b70', '01825484458', 'Punchlaish,Chittagong', 'beb5f693ad9109937a13536d35eaeaac', 'ADMIN'),
(18, 'sk', 'jamal', 'jama@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01952654596', 'dhaka', '643242543e3c24b3423ed3b8d1318a93', 'USER'),
(19, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '44', '', NULL, NULL),
(20, '', '', 'marufulislamtest@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_list`
--
ALTER TABLE `food_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`hall_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `other_charges`
--
ALTER TABLE `other_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_rights`
--
ALTER TABLE `role_rights`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `food_list`
--
ALTER TABLE `food_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `hall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `other_charges`
--
ALTER TABLE `other_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role_rights`
--
ALTER TABLE `role_rights`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
