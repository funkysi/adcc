-- phpMyAdmin SQL Dump
-- version 3.3.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2010 at 08:27 PM
-- Server version: 5.1.47
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `adcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE IF NOT EXISTS `competition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL DEFAULT '',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `judge` varchar(255) NOT NULL DEFAULT '',
  `round` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `competition`
--


-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `setting` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=124 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `name`, `setting`) VALUES
(118, 'email', 'funkysi1701@gmail.com'),
(115, 'url', 'http://localhost'),
(27, 'livemap1', 'http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAARQwQa1D1kfa4evMahiorVxS6WB8HEAz5CD1ZscW5mFFtB0cN5BTrXWrz2g12d1Qk538bVqr5yW4jXA'),
(28, 'livemap2', 'http://www.google.com/uds/api?file=uds.js&amp;v=1.0&amp;key=ABQIAAAA0jNoc89uwkdl4LgfM9KldRRiKve6JGS7u_Ryr84nOMdV8_I6oxT2bBrU1PUkF3dX7EBzDf0LW8QFBw'),
(31, 'longitude', '53.009219'),
(32, 'latitude', '-1.124395'),
(33, 'zoom', '15'),
(116, 'title', 'Test Website'),
(117, 'location', 'Arnold, Nottingham, UK'),
(122, 'webmaster', 'Greg Foster'),
(121, 'Analytics', ''),
(120, 'Sitemap', ''),
(119, 'notifyemail', 'funkysi1701@gmail.com'),
(123, 'awa', ''),
(111, 'bg', ''),
(112, 'logo', '');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `text` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `page` varchar(255) NOT NULL DEFAULT '',
  `additional` int(11) NOT NULL DEFAULT '0',
  `in_use` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=246 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `text`, `date`, `image`, `link`, `page`, `additional`, `in_use`) VALUES
(5, '', 'The Club Gallery is provided by Arnold &amp; District Camera Club as a means for its members to display their work to a wider audience.\r\n\r\nBelow you will find links to individual galleries in which Club photographers display some of their exceptional work. The number of galleries at present, are few, but will grow as more members provide images to be placed here.\r\n\r\nPlease check back regularly to view new works.\r\n\r\nPlease keep in mind that we are amateurs and we do this out of a love for photography, and a desire to improve our skills.\r\n\r\nConstructive comments are always welcome. If you find a photograph that you are interested in and would like to contact the photographer for more information, or to comment on a photograph, an e-mail link is provided on each of the gallery pages.\r\n\r\nThe Gallery Pages contain large images that may take a few minutes to load, depending on network traffic.\r\n\r\nPlease be patient. It will be worth the wait.', '2007-08-05 16:49:24', '', '', 'gallery', 0, 0),
(6, '', 'If you are interested in purchasing a particular image you may contact the photographer using the link at the bottom of the photographers gallery to obtain more information. Please include photographers name and the image name in your email. The sale of any image will be between the photographer and the prospective purchaser.\r\n\r\nArnold &amp; District Camera Club is a non-profit organization.', '2007-08-05 16:49:24', '', '', 'gallery', 0, 0),
(7, 'Copyright Notice', 'All images on this site are electronic representations of original photographs, slides or negatives. Therefore all electronic images on this site are the sole property of the respective photographers. The images are exhibited here by permission, for your viewing pleasure and may not be downloaded or displayed in any form without the express written consent of the respective photographers.', '2007-08-05 16:50:01', '', '', 'gallery', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ufile` text NOT NULL,
  `comment` text NOT NULL,
  `size` int(11) NOT NULL DEFAULT '0',
  `disp` text NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `download`
--


-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_title` varchar(255) NOT NULL DEFAULT '',
  `score` int(255) NOT NULL DEFAULT '0',
  `users` varchar(255) NOT NULL DEFAULT '',
  `compid` int(11) NOT NULL DEFAULT '0',
  `imageid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `entries`
--


-- --------------------------------------------------------

--
-- Table structure for table `imageJtag`
--

CREATE TABLE IF NOT EXISTS `imageJtag` (
  `image` int(11) NOT NULL DEFAULT '0',
  `tag` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imageJtag`
--


-- --------------------------------------------------------

--
-- Table structure for table `image_store`
--

CREATE TABLE IF NOT EXISTS `image_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `caption` varchar(255) NOT NULL DEFAULT '',
  `info` text NOT NULL,
  `author_id` varchar(11) NOT NULL DEFAULT '',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=752 ;

--
-- Dumping data for table `image_store`
--


-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `linktext` varchar(255) NOT NULL DEFAULT '',
  `pri` int(255) NOT NULL DEFAULT '0',
  `cat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `links`
--


-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `header` varchar(255) NOT NULL DEFAULT '',
  `page` varchar(255) NOT NULL DEFAULT '',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `log`
--


-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `userid` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`userid`, `location`, `level`) VALUES
('simon', 'permission', 1),
('simon', 'gall', 1),
('simon', 'home', 1),
('simon', 'purpose', 1),
('simon', 'news', 1),
('simon', 'schedule', 1),
('simon', 'membership', 1),
('simon', 'location', 1),
('simon', 'links', 1),
('simon', 'download', 1),
('simon', 'competition', 1),
('simon', 'committee', 1),
('simon', 'delusers', 1),
('simon', 'editusers', 1),
('simon', 'createuser', 1),
('simon', 'resetpass', 1),
('simon', 'sitesettings', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_pages`
--

CREATE TABLE IF NOT EXISTS `permission_pages` (
  `page` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission_pages`
--

INSERT INTO `permission_pages` (`page`, `name`) VALUES
('home', 'Home'),
('news', 'News'),
('purpose', 'Purpose'),
('permission', 'User Permissions'),
('membership', 'Membership'),
('schedule', 'Schedule'),
('committee', 'Committee'),
('competition', 'Competition'),
('location', 'Location'),
('download', 'Download'),
('links', 'Links'),
('gall', 'Gallery'),
('password', 'Change Password'),
('resetpass', 'Reset User Password'),
('editusers', 'Edit Users'),
('delusers', 'Delete Users'),
('createuser', 'Create User Account'),
('sitesettings', 'Site Settings');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `event` text NOT NULL,
  `misc` varchar(255) NOT NULL DEFAULT '',
  `seconds` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=258 ;

--
-- Dumping data for table `schedule`
--


-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `tags`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `displayname` varchar(255) NOT NULL DEFAULT '',
  `passw` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `lastname` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `about` text NOT NULL,
  `gall_null` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '',
  `role` varchar(255) NOT NULL DEFAULT '',
  `order_nu` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `displayname`, `passw`, `level`, `lastname`, `image`, `about`, `gall_null`, `email`, `role`, `order_nu`) VALUES
(60, 'simon', 'Funky Si', 'b55766b08fdad449afd8aeeddfd77fab', 0, '(Full Access)', '', 'Simon Fosters full access account for making changes to the website.', 1, 'funkysi1701@gmail.com', '', 0);

