-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2021 at 04:44 AM
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
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `marginTop` varchar(255) DEFAULT NULL,
  `background` varchar(255) NOT NULL,
  `duration` int(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cast` text NOT NULL,
  `director` varchar(255) NOT NULL,
  `release` date NOT NULL,
  `distributor` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `title`, `poster`, `logo`, `marginTop`, `background`, `duration`, `certificate`, `genre`, `description`, `cast`, `director`, `release`, `distributor`, `language`, `trailer`) VALUES
(1, 'Venom: Let There Be Carnage', 'venom_poster.jpg', 'venom_logo.jpg', '60%', 'venom_bg.png', 98, 'PG13', 'Action', 'Eddie Brock is still struggling to coexist with the shape-shifting extraterrestrial Venom. When deranged serial killer Cletus Kasady also becomes host to an alien symbiote, Brock and Venom must put aside their differences to stop his reign of terror.', 'Tom Hardy, Michelle Williams, Naomie Harris, Reid Scott, Stephen Graham, Woody Harrelson', 'Andy Serkis	', '2021-09-14', 'SPR', 'English (Sub: Chinese)', 'https://www.youtube.com/watch?v=-FmWuCgJmxo'),
(2, 'Ron''s Gone Wrong', 'ron_poster.jpg', 'ron_logo.jpg', '60%', 'ron_bg.png', 107, 'PG', 'Animation', 'The story of Barney, an awkward middle-schooler and Ron, his new walking, talking, digitally-connected device. Ron''s malfunctions set against the backdrop of the social media age launch them on a journey to learn about true friendship.', 'Zach Galifianakis, Jack Dylan Grazer, Olivia Colman, Ed Helms, Justice Smith, Rob Delaney', 'Sarah Smith', '2021-10-21', 'WDS', 'English (Sub: Chinese)', 'https://www.youtube.com/watch?v=fCqGfjBSk0I'),
(3, 'Tokyo Revengers', 'tokyo_poster.jpg', 'tokyo_logo.png', '80%', 'tokyo_bg.png', 121, 'PG13', 'Action', 'A down-and-out youth stands up to power to save the only girl he has ever loved.\r\nTakemichi Hanagaki leads a dead-end life in a run-down apartment while working part-time at a job for a younger manager who treats him like an idiot. Then one day, he learns that a girl he used to date and her brother have been murdered by Tokyo Manji. ', 'Takumi Kitamura, Yuki Yamada, Yosuke Sugino, Mio Imada, Nobuyuki Suzuki, Gordon Maeda, Hiroya Shimizu, Hayato Isomura, Shotaro Mamiya, Ryo Yoshizawa', 'Tsutomu Hanabusa', '2021-10-21', 'GVP', 'Japanese (Sub: English)', 'https://www.youtube.com/watch?v=DBfKSONdIgo'),
(4, 'No Time To Die', 'timedie_poster.jpg', 'timedie_logo.png', '40%', 'timedie_bg.png', 163, 'PG13', 'Adventure', 'In No Time To Die, Bond has left active service and is enjoying a tranquil life in Jamaica. His peace is short-lived when his old friend Felix Leiter from the CIA turns up asking for help. The mission to rescue a kidnapped scientist turns out to be far more treacherous than expected, leading Bond onto the trail of a mysterious villain armed with dangerous new technology.', 'Daniel Craig, Rami Malek, Léa Seydoux, Lashana Lynch, Ben Whishaw, Naomie Harris', 'Cary Joji Fukunaga', '2021-09-30', 'UNI', 'English (Sub: Chinese)', 'https://www.youtube.com/watch?v=BIhNsAtPbPI'),
(5, 'The Addams Family 2', 'addams_poster.png', 'addams_logo.png', '60%', 'addams_bg.png', 120, 'PG', 'Animation', 'In this all-new movie we find Morticia and Gomez distraught that their children are growing up, skipping family dinners, and totally consumed with scream time. To reclaim their bond they decide to hit the road for one last miserable family vacation. What could possibly go wrong?\r\n\r\n', 'Oscar Isaac, Charlize Theron, Chloe Grace Moretz, Finn Wolfhard, Nick Kroll, Bette Midler, Allison Janney\r\n', 'Conrad Vernon', '2021-11-11', 'UNI\r\n', 'English(Sub: Chinese)', 'https://www.youtube.com/watch?v=Kd82bSBDE84'),
(6, 'Resident Evil: Welcome To Raccoon City', 're_poster.jpg', 're_logo.svg', '75%', 're_bg.png', 120, 'PG13', 'Horror', 'Once the booming home of pharmaceutical giant Umbrella Corporation, Raccoon City is now a dying Midwestern town. When theevil is unleashed, a group of survivors must work together to uncover the truth behind Umbrella and make it through the night.', 'Kaya Scodelario, Hannah John-Kamen, Robbie Amell, Tom Hopper, Avan Jogia, Donal Logue, Neal McDonough', 'Johannes Roberts\r\n', '2021-12-02', 'SPR', 'English (Sub: Chinese)', 'https://www.youtube.com/watch?v=4q6UGCyHZCI'),
(7, 'Mulan', 'mulan_poster.jpg', 'mulan_logo.png', '50%', 'mulan_bg.png', 115, 'PG13', 'Action', 'To keep her ailing father from serving in the Imperial Army, a fearless young woman disguises herself as a man and battles northern invaders in China.', 'Yifei Liu, Donnie Yen, Tzi Ma, Jason Scott Lee, Yoson An, Ron Yuan, Gong Li, Jet Li', 'Niki Caro', '2021-09-04', 'WDS', 'English (Sub: Chinese)', 'https://www.youtube.com/watch?v=KK8FHdFluOQ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
