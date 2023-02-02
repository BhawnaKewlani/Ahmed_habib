-- CREATE TABLE `amenities` (
--   `amenities_id` int(11) NOT NULL auto_increment,
--   `pic` varchar(100) NOT NULL,
--   `des` text NOT NULL,
--   PRIMARY KEY  (`amenities_id`)
-- ) ;



-- INSERT INTO `amenities` (`amenities_id`, `pic`, `des`) VALUES 
-- (1, 'amenities/IconAC.jpg', 'Every room in the Tamera Plaza Inn has Air Conditioning. Each room has an easy-to-use remote control to set your comfort level without having to leave the bed.'),
-- (2, 'amenities/IconBkfst.jpg', 'Upon your arrival, you will recieve a complimentary "Welcome Drink" for your travel here. Also, there is Free Breakfast for all accomodations.'),
-- (3, 'amenities/IconCocktail.jpg', 'Located in the lobby, we offer a full-service Bar & Coffee Shop with a variety of beverages. '),
-- (4, 'amenities/IconFunction.jpg', 'Located on the 4th floor, we hold many activities for all occasions here in the Function Room. One can reserve this room for conferences, parties, and more.'),
-- (5, 'amenities/IconGen.jpg', 'We have generators on standby 24 hours a day, 7 days a week in an event of a "Brown Out", providing uninterrupted electricity service to the building.'),
-- (6, 'amenities/IconLaundry.jpg', 'Whether on business or pleasure, we provide laundry and pressing service here. We deliver your clothes to your room, or in person to accomodate your schedule.'),
-- (7, 'amenities/IconLongDist.jpg', 'Need to call home or send documents? We provide Fax services and phones equipped for Long Distance calls to home, the office, or anywhere in between.'),
-- (8, 'amenities/restaurantLG.jpg', 'Not only a great place to eat, but has great street-side view of Bacolod City. Try the famous "Tamera Chicken", great for the whole family!'),
-- (9, 'amenities/IconShower.jpg', 'Every room is individualy equipped with personal water heaters in the showers. Fully adjustable, you''ll always have a comfortable shower without burning or freezing yourself.'),
-- (10, 'amenities/IconTaxi.jpg', 'Have a meeting to go to or just want to go out? You can schedule trips anywhere around Bacolod City by utilizing our transportation service offered here.'),
-- (11, 'amenities/IconTV.jpg', 'No room would be complete without complimentary Cable TV and telephone service in every room. Channels may vary.'),
-- (12, 'amenities/SmIconWiFi.png', 'All area of Tamera Plaza Inn is wifi ready');

-- -- --------------------------------------------------------

-- -- 
-- -- Table structure for table `comment`
-- -- 

-- CREATE TABLE `comment` (
--   `comment_id` int(11) NOT NULL auto_increment,
--   `name` varchar(60) NOT NULL,
--   `email` varchar(100) NOT NULL,
--   `content` text NOT NULL,
--   PRIMARY KEY  (`comment_id`)
-- ); 

-- -- 
-- -- Dumping data for table `comment`
-- -- 

-- INSERT INTO `comment` (`comment_id`, `name`, `email`, `content`) VALUES 
-- (1, 'sunusi mohd inuwa', 'sunusi@yahoo.com', 'in the name of allah the most merciful and the most beneficent'),
-- (2, 'IBRAHIM AMINU', 'ADADSD2@hotmail.com', 'please you need to improve your');

-- --------------------------------------------------------

-- 
-- Table structure for table `payment_notification`
-- 

-- CREATE TABLE `payment_notification` (
--   `pay_id` int(11) NOT NULL auto_increment,
--   `item_name` varchar(100) NOT NULL,
--   `item_number` varchar(100) NOT NULL,
--   `status` varchar(100) NOT NULL,
--   `amount` decimal(65,0) NOT NULL,
--   `currency` varchar(20) NOT NULL,
--   `txn_id` varchar(30) NOT NULL,
--   `payer_email` varchar(100) NOT NULL,
--   PRIMARY KEY  (`pay_id`)
-- );

-- -- 
-- -- Dumping data for table `payment_notification`
-- -- 

-- INSERT INTO `payment_notification` (`pay_id`, `item_name`, `item_number`, `status`, `amount`, `currency`, `txn_id`, `payer_email`) VALUES 
-- (9, 'Standard Single', '6bvavzx7', 'Completed', '1900', 'Naira', 'vqm5ec8x', 'mohdsunusi4@gmail.com'),
-- (10, 'Standard Double', '7eh45nja', 'Completed', '77000', 'Naira', 'fgv2kvvy', 'fformulator@gmail.com');

-- --------------------------------------------------------

-- 
-- Table structure for table `reservation`
-- 

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL auto_increment,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL,
  `province` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `arrival` varchar(30) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `adults` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `no_room` int(11) NOT NULL,
  `payable` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `confirmation` varchar(20) NOT NULL,
  PRIMARY KEY  (`reservation_id`)
);

-- 
-- Dumping data for table `reservation`
-- 

INSERT INTO `reservation` (`reservation_id`, `firstname`, `lastname`, `city`, `zip`, `province`, `country`, `email`, `contact`, `username`, `password`, `arrival`, `departure`, `adults`, `child`, `result`, `room_id`, `no_room`, `payable`, `status`, `confirmation`) VALUES 
(98, 'Sunusi', 'Mohd', 'kazaure', 112, 'kanti kazaure, jigawa state', 'Nigeria', 'fformulator@gmail.com', 123123, '', '#include<conio.h>', '11/07/2014', '18/07/2014', 10, 0, 7, 9, 5, 38500, '', 'di8mvoyv'),
(97, 'Sunusi', 'Mohd', 'kazaure', 112, 'kanti kazaure, jigawa state', 'Nigeria', 'fformulator@gmail.com', 123123, '', '#include<conio.h>', '09/07/2014', '16/07/2014', 200, 0, 7, 9, 10, 77000, '', '7eh45nja'),
(100, 'Sunusi', 'Mohd', 'kazaure', 112, 'kanti kazaure, jigawa state', 'Nigeria', 'fformulator@gmail.com', 123123, '', '#include<conio.h>', '11/07/2014', '18/07/2014', 10, 0, 7, 9, 5, 38500, '', 's5kmaj8e'),
(99, 'Sunusi', 'Mohd', 'kazaure', 112, 'kanti kazaure, jigawa state', 'Nigeria', 'fformulator@gmail.com', 123123, '', '#include<conio.h>', '11/07/2014', '18/07/2014', 10, 0, 7, 9, 5, 38500, '', 'cyz6ipix');

-- --------------------------------------------------------

-- 
-- Table structure for table `room`
-- 

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL auto_increment,
  `type` varchar(30) NOT NULL,
  `rate` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `max_adult` int(11) NOT NULL,
  `max_child` int(11) NOT NULL,
  PRIMARY KEY  (`room_id`)
);

-- 
-- Dumping data for table `room`
-- 

INSERT INTO `room` (`room_id`, `type`, `rate`, `description`, `image`, `qty`, `max_adult`, `max_child`) VALUES 
(8, 'Standard Single', 950, 'Fully air conditioned', 'photos/conference_hall10.jpg', 5, 200, 100),
(9, 'Standard Double', 1100, 'Fully air conditioned', 'photos/conference_hall8.jpg', 3, 300, 200),
(10, 'Superior Hall', 5000, 'Fully air conditioned, available electric fans, amor(s)', 'photos/DSC_0234.jpg', 7, 100, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `roominventory`
-- 

CREATE TABLE `roominventory` (
  `roominventory_id` int(11) NOT NULL auto_increment,
  `arrival` varchar(30) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `qty_reserve` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `confirmation` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY  (`roominventory_id`)
);

-- 
-- Dumping data for table `roominventory`
-- 

INSERT INTO `roominventory` (`roominventory_id`, `arrival`, `departure`, `qty_reserve`, `room_id`, `confirmation`, `status`) VALUES 
(85, '', '', 0, 0, 'yiqud8zv', 'Active'),
(86, '02/07/2014', '03/07/2014', 1, 10, '4dj55wm7', 'Active'),
(87, '', '', 0, 0, 'g6m4hhgt', 'Active'),
(88, '03/07/2014', '13/07/2014', 10, 8, 'dtsk60xh', 'Active'),
(89, '', '', 0, 0, 'd7zzjfkc', 'Active'),
(90, '03/07/2014', '13/07/2014', 10, 8, 'rbaowtc8', 'Active'),
(91, '03/07/2014', '13/07/2014', 10, 8, '0aopt6gg', 'out'),
(92, '03/07/2014', '17/07/2014', 2, 8, 'pvhaj7kk', 'Active'),
(93, '03/07/2014', '17/07/2014', 2, 8, 'c4yd2io0', 'Active'),
(94, '03/07/2014', '17/07/2014', 2, 8, 'c0tx0ike', 'Active'),
(95, '', '', 1, 8, '3xocj65e', 'Active'),
(96, '31/07/2014', '31/07/2014', 5, 8, '7qghyhcv', 'Active'),
(97, '09/07/2014', '16/07/2014', 10, 9, '7eh45nja', 'Active'),
(98, '11/07/2014', '18/07/2014', 5, 9, 'di8mvoyv', 'Active'),
(99, '11/07/2014', '18/07/2014', 5, 9, 'cyz6ipix', 'Active'),
(100, '11/07/2014', '18/07/2014', 5, 9, 's5kmaj8e', 'Active');

-- --------------------------------------------------------

-- 
-- Table structure for table `sit`
-- 

CREATE TABLE `sit` (
  `name` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `hall` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `sitno` varchar(20) NOT NULL,
  KEY `sitno` (`sitno`)
); 

-- 
-- Dumping data for table `sit`
-- 

INSERT INTO `sit` (`name`, `code`, `hall`, `payment`, `sitno`) VALUES 
('sit 1', 'scode', 'Superior Hall', 'complete', 'sit 1'),
('sit 2', 'codehere', 'Superior Hall', 'complete', 'sit 2'),
('sit 3', 'hall', '', '', ''),
('sit 4', 'hall', '', '', ''),
('sit 5', 'hall', '', '', ''),
('sit 6', 'codehere', 'Superior Hall', 'complete', 'sit 6'),
('sit 7', 'hall', '', '', ''),
('sit 8', 'hall', '', '', ''),
('sit 9', 'hall', '', '', ''),
('sit 10', 'allahu', 'Superior Hall', 'complete', 'sit 10');

-- --------------------------------------------------------

-- 
-- Table structure for table `sits`
-- 

CREATE TABLE `sits` (
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `hall` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `sitno` varchar(100) NOT NULL,
  UNIQUE KEY `code` (`code`,`sitno`),
  UNIQUE KEY `code_2` (`code`)
);

-- 
-- Dumping data for table `sits`
-- 

INSERT INTO `sits` (`name`, `code`, `hall`, `payment`, `sitno`) VALUES 
('Sit 5', '12', 'Standard Double', 'complete', 'Sit 5'),
('Sit 6', '45', 'Standard Double', 'complete', 'Sit 6'),
('Sit 4', 'adfadsf', 'Standard Single', 'complete', 'Sit 4'),
('Sit 1', 'code1', 'Standard Single', 'complete', 'Sit 1'),
('Sit 3', 'code111', 'Standard Single', 'complete', 'Sit 3'),
('Sit 7', 'code6', '', '', 'sit6'),
('Sit 8', 'code7', '', '', 'sit7'),
('Sit 9', 'code8', '', '', 'sit8'),
('Sit 2', 'codes', 'Standard Double', 'complete', 'Sit 2'),
('Sit 10', 'wwwww', 'Standard Single', 'complete', 'Sit 10');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `position` varchar(45) NOT NULL,
  PRIMARY KEY  (`user_id`)
); -- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` (`user_id`, `username`, `password`, `position`) VALUES 
(1, 'admin', 'admin', 'admin'),
(2, 'argie', 'argie', 'frontdesk');
