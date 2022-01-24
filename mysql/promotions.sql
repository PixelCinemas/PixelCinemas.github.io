-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2021 at 07:41 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `f32ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `title`, `image_url`, `description`, `category`) VALUES
('1','Value Deal for Two', 'valuefortwo.png', 'Bring your buddy and enjoy this special movie bundle! For just $28 (Mon - Thu) or $36 (Fri - Sun), you will get 2 Movie Tickets and a Medium Popcorn!','FoodBeverages'),
('2','Halloween Special', 'halloweenspecial.png', 'Treat (not trick!) yourself and grab our fa-boo-lous new Combo! Enjoy a pack of Chocolate Glazed/Spicy Breath Popcorn, and a Crispy Curry Puff for just $10.10!', 'FoodBeverages'),
('3','Enjoy Senior Privileges', 'seniorprivilege.jpg', 'Old is definitely gold. Enjoy $5 Movie Tickets on Weekdays (before 6pm) for Seniors!', 'Tickets'),
('4','Student Privileges', 'studentspecial.jpg', '$6 on Tuesday, all day and $7 on Mon, Wed - Fri, before 6pm at all Pixel Cinemas','Tickets'),
('5','Salty Egg Fish Skin Combo','saltedeggfishskin.jpg', 'Enjoy this delight when you visit the cinemas! Our Combo includes a packet of salty egg chips, a Small Popcorn and a Fizzy Peach Soda','FoodBeverages');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
