-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2013 at 10:19 AM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kunostor_p4_kunostories_biz`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`content_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`content_id`, `title`, `url`, `course_id`, `position`) VALUES
(1, 'Th vs S Sounds', 'th-v-s', 1, 1),
(2, 'S vs Z Sounds', 's-v-z', 1, 2),
(3, 'F vs V Sounds', 'f-v-v', 1, 3),
(4, 'F vs P Sounds', 'f-v-p', 1, 4),
(5, 'Review of Consonant Sounds', 'review-consonant', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `length` int(11) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `badge` varchar(255) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `title`, `about`, `url`, `length`, `logo`, `badge`) VALUES
(1, 'Pronunciation: Consonant Sounds', 'Learn how to pronounce the [Th], [S], [Z], [F], [V], and [P] English consonant sounds. No more pronunciation mistakes!', 'pronunciation-consonant-sounds', 5, 'pronunciation-consonant-logo.png', 'pronunciation-consonant-badge.png'),
(2, 'Top 5 Most Useful English Phrases', 'Master the basics and speak better conversational English after learning these 5 most useful English tenses.', 'most-useful', 8, 'most-useful-logo.png', 'most-useful-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `modified`, `token`, `password`, `last_login`, `timezone`, `first_name`, `last_name`, `email`, `alias`, `location`, `age`) VALUES
(1, 1382343465, 1387328238, '1fb591a2d47e471f7107bb27d037c93d2892c3d8', '6c2d6ba3c620cfdb411b902884608a3790af422f', 0, 0, 'Tester', 'Guy', 'test@test.com', 'Test', 'Everywhere', '29'),
(2, 1383104848, 1383199273, 'b2a41b6237c1706fa6fd4d81eb7fbd93810059a6', 'dc5b550755b09f84d7ffbd4a6b78803925be4ce7', 0, 0, 'Leroy', 'Scroggins', 'leroyscroggins@gmail.com', 'leroy', '', '0'),
(3, 1383124055, 1383130009, 'c7f8a5b088337274a4687db8995c2713937f6d5b', 'daa61aa50ae109fbd1c8076e00562e7e30bcbc33', 0, 0, 'Shawn', '', 'shawn@shawnroe.com', 'shawn', '', '0'),
(4, 1383124485, 1383124485, '73f94709ba4df34564b16dfd0505b9674ff281c6', '927427f079c887aecd01923068c78e521a5f33a0', 0, 0, '', '', 'new@new', 'new', '', ''),
(20, 1383547496, 1383552725, '1a63451659ca328ab8c084ef4c2fbb839b8b9e9b', '861058ba60b34e44510364f3811035f45567b4f5', 0, 0, 'The', 'Numberthree', 'three@four.com', 'three', '', '30'),
(21, 1383551253, 1383551253, 'd4c2032f058117dfab2698f1d30300d9a5795db5', '41f7752ff1e277b4cd9885b1e12c85adf575b050', 0, 0, '', '', 'slow@mail.com', 'slow', '', '0'),
(22, 1383553878, 1383553894, 'c39867efed876e20aa8964d7f53cde82bb75d9c6', '1805103df74d9129be789ce5b733c6b24b59ca92', 0, 0, 'Boramee', 'Kim', 'boramee@gmail.com', 'Bobonim', 'Gwangju, Korea', '28'),
(23, 1383636766, 1383640858, '0d5607e1ec727d039080c2cfd5064697e9562eb2', 'e72b9fcf642b556fc5772b022dc0023e0cb93ed7', 0, 0, '', '', 'ask@ask.com', 'Ask', '', '56'),
(24, 1387101339, 1387101386, '96263e99602b7cd0d4dedb75c758bfbba3204867', 'd4c4438d4ceaf4a9322c266298101449aef26ddb', 0, 0, 'New', 'Guy', 'newguy@new.com', 'newguy', '24', '100'),
(25, 1387335640, 1387335658, '2db31abede13523579ec305748aca2b6aa06c6bb', 'a00696343b9a80a72f6f7ce933f1056bc68e7d04', 0, 0, 'Local', 'Tester', 'local@local.com', 'local', 'localhost', '21'),
(26, 1387417012, 1387417021, 'ed648f31cec328b78f5446392f313c8fad40035e', 'aee2ef5ca3e04e240c39c23dc56a7e4520fef74a', 0, 0, 'Ian', 'Thelatest', 'latest@latest.com', 'latest', '', ''),
(27, 1387439325, 1387439686, 'accf09a2ea7dae51f35fded628c8d31a2c2bf27f', 'a926eec2d92eb84f1b31ddd6863abda3505f63cf', 0, 0, '', '', 'boram@boram.com', 'boram', '', '43'),
(28, 1387505719, 1387505719, '3dab8f9271dc1f9f99ba69be6021d5bcea5d791d', '3518506b0c4c94035966ccd7e0cc8834eeefcd81', 0, 0, '', '', 'deb@deb.net', 'deb', '', ''),
(29, 1387528977, 1387528977, '06e8904f64aaa1765b882c67653e7b9d206b1801', '7d5fd0f4b086be2f416772b40ebdb30ee774870e', 0, 0, '', '', 'wow@wow.com', 'Wow', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_courses`
--

CREATE TABLE `users_courses` (
  `user_course_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_course_id`),
  KEY `user_id` (`user_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users_courses`
--

INSERT INTO `users_courses` (`user_course_id`, `user_id`, `course_id`, `progress`) VALUES
(1, 1, 1, 3),
(2, 2, 1, 1),
(3, 2, 2, 1),
(4, 24, 1, 1),
(6, 3, 2, 1),
(7, 3, 1, 1),
(9, 24, 2, 1),
(10, 27, 2, 1),
(11, 27, 1, 1),
(12, 29, 2, 1),
(13, 29, 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_courses`
--
ALTER TABLE `users_courses`
  ADD CONSTRAINT `users_courses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_courses_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
