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
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) NOT NULL,
  `answer` text NOT NULL,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `category`) VALUES
('1','What are your current ticket prices?','
- Senior Citizen*: $5.00 (Mon to Fri, for movies before 6pm)
- Student**: $7.00 (Mon to Fri, for movies before 6pm)
- Standard Tickets: $10.50','General'),
('2','Why are ticket prices revised? ', 'Over the past years, we have been able to hold off ticket price revisions in our continuous efforts to increase operating efficiencies and enhance our patrons movie-going experience. However, it has proven to be challenging in offsetting recent inflationary costs in overheads such as rent, utilities, film hire and staff hires. This is especially so in the time of the pandemic, where many restrictions and limitations have been imposed.
', 'Tickets'),
('3','How far in advance can I book my tickets? ', 'A cinema week is from Thursday to Wednesday. To better meet the needs of our patrons, please refer to our Programming schedule:
- Thursday to Friday sessions (released on Wednesday after 3pm) / Saturday to Wednesday sessions (released on Friday after 3pm)
From time to time, we may release Advance Sales for selected blockbuster titles 1 to 3 weeks before opening date.', 'Tickets'),
('4','Do I have to purchase a ticket for my child? ', 'A child above the height of 90cm requires a ticket for admission. The management reserves the right to refuse admission for non-compliance of height limit.','Tickets'),
('5','What are the payment methods for online ticketing? ', 'We accept Credit & Debit Card, Visa Click to Pay, DBS Paylah!, HSBC Movie Card, Pixel Prepaid Card and selected Pixel Gift Vouchers.','Ticket'),
('6','What shall I do if I have a session time-out problem? ', 'If you are using Private Browsing or Incognito tab , please exit this tab and goto the normal browsing mode and try again. This is because our website is using cookies to store your session information for transaction information.','Ticket'),
('7','What is an Automated Ticketing Machine?', 'There are no extra charges for this service.', 'Tickets'),
('8','Do I get to enjoy promotions/discount rate when I purchase tickets at the Automated Ticketing Machines? ', 'Yes, please select the discount option accordingly. However you will need to approach anyone of our staff to enjoy the Senior Citizen/Student offer.', 'Tickets'),
('9','Is there a limit as to how many Pixel Gift Cards to purchase? ', 'No, there is no limit on the number of Gift Cards to purchase. You can purchase as many Gift Cards as you like.','Promotions'),
('10','Are all the films screening in GV subtitled? ', 'No, not all films are subtitled. Please approach our Box Office for more information on which films have subtitles.','Other'),
('11','What do the different film classifications mean? (G, PG, PG13, NC16, M18 and R21) ', 'We accept Credit & Debit Card, Visa Click to Pay, DBS Paylah!, HSBC Movie Card, Pixel Prepaid Card and selected Pixel Gift Vouchers.','Other'),
('12','Do you have any facilities for the physically impaired?', 'All our cinemas except Gold Class® have wheelchair accessibility.','Other'),
('13','Can I buy used movie posters after the movie stops screening?', 'These movie posters are not for sale, and are usually returned to their respective distributors.','Other'),
('14','Is the food sold at Pixel Halal? ', 'Our food does not have Muis Halal Certification.','Other'),
('15','What are the opening hours?', 'The box office opens at 10am in the morning or half an hour before the first public screening (whichever is earlier). We close the box office at the last screening. Please refer to our tickets & showtimes schedule for the last show.', 'General'),
('16','What are your reopening safety measures?','The list of safety measures includes, but is not limited to:
- Face masks to be worn at all times except during consumption of snacks and beverages
- Temperature screening
- Checking-in and out via TraceTogether (token or app)
- Safe distancing measures in the lobby and cinema halls with queue markers and alternate seating arrangements
- Increased frequency of cleaning and disinfecting of high-touch point areas such as counters, touch screens, and restrooms

For the full list of mandatory precautionary measures and protocols, please click here.','General'),
('17','What is your refund policy?','All transactions once completed and confirmed are not exchangeable or refundable under any circumstances. No refunds or exchanges will be entertained if you do not turn up to collect your tickets. If your booking is made via third party websites or mobile apps, we will not be held liable for any errors.','General'),
('18','I cant find my answer in this FAQ, who can I contact to get help?','If you’re at any of our outlets and need immediate assistance, please approach our staff that are on duty. Otherwise, please submit your query using the form here. Our office operates from Mon to Fri, 9am to 6pm, excluding Public Holidays. Your request will be sent to our customer service executive, who will be in touch with you shortly.','General'),
('19','What is a Pixel Gift Card? ','The Pixel Gift Card is a stored value card, which allows you to prepay for movie tickets and candy bar purchase at Pixel cinemas.','Promotions'),
('20','How much does a Pixel Gift Card cost? ','The GV Gift card costs $38 per piece. The Gift Card cannot be exchanged for cash.','Promotions'),
('21','Can I ask for a refund for the Food & Beverages?','No refund will be made for any items purchased based on the receipt.','Promotions');
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
