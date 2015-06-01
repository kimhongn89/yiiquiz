-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2015 at 11:32 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `title` varchar(255) NOT NULL,
  `result` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=212 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `id_question`, `status`, `title`, `result`) VALUES
(1, 1, 1, 'Home Tool Markup Language', 0),
(2, 1, 1, 'Hyper Text Markup Language', 1),
(3, 1, 1, 'Hyperlinks and Text Markup Language', 0),
(4, 2, 1, 'Google', 0),
(5, 2, 1, 'Microsoft', 0),
(6, 2, 1, 'The World Wide Web Consortium', 1),
(7, 2, 1, 'Mozilla', 0),
(8, 3, 1, '<h6>', 0),
(9, 3, 1, '<h1>', 1),
(10, 3, 1, '<heading>', 0),
(11, 3, 1, '<head>', 0),
(12, 4, 1, '<break>', 0),
(13, 4, 1, '<lb>', 0),
(14, 4, 1, '<br>', 1),
(15, 5, 1, '<body style="background-color:yellow;">', 1),
(16, 5, 1, '<background>yellow</background>', 0),
(17, 5, 1, '<body background="yellow">', 0),
(18, 6, 1, '<bold>', 0),
(19, 6, 1, '<b>', 1),
(20, 7, 1, '<i>', 1),
(21, 7, 1, '<italic>', 0),
(22, 8, 1, '<a url="http://www.w3schools.com">W3Schools.com</a>', 0),
(23, 8, 1, '<a name="http://www.w3schools.com">W3Schools.com</a>', 0),
(24, 8, 1, '<a href="http://www.w3schools.com">W3Schools</a>', 1),
(25, 8, 1, '<a>http://www.w3schools.com</a>', 0),
(26, 9, 1, '<mail>xxx@yyy</mail>', 0),
(27, 9, 1, '<a href="mailto:xxx@yyy">', 1),
(28, 9, 1, '<a href="xxx@yyy">', 0),
(29, 9, 1, '<mail href="xxx@yyy">', 0),
(30, 11, 1, '<a href="url" target="_blank">', 1),
(31, 11, 1, '<a href="url" target="new">', 0),
(32, 11, 1, '<a href="url" new>', 0),
(33, 12, 1, '<table><tr><tt>', 0),
(34, 12, 1, '<table><tr><td>', 1),
(35, 12, 1, '<thead><body><tr>', 0),
(36, 12, 1, '<table><head><tfoot>', 0),
(37, 13, 1, 'true', 1),
(38, 13, 1, 'false', 0),
(39, 14, 1, '<ol>', 1),
(40, 14, 1, '<ul>', 0),
(41, 14, 1, '<dl>', 0),
(42, 14, 1, '<list>', 0),
(43, 15, 1, '<dl>', 0),
(44, 15, 1, '<list>', 0),
(45, 15, 1, '<ol>', 0),
(46, 15, 1, '<ul>', 1),
(47, 16, 1, '<checkbox>', 0),
(48, 16, 1, '<input type="check">', 0),
(49, 16, 1, '<check>', 0),
(50, 16, 1, '<input type="checkbox">', 1),
(51, 17, 1, '<textfield>', 0),
(52, 17, 1, '<input type="text">', 1),
(53, 17, 1, '<input type="textfield">', 0),
(54, 17, 1, '<textinput type="text">', 0),
(55, 19, 1, '<list>', 0),
(56, 19, 1, '<input type="dropdown">', 0),
(57, 19, 1, '<input type="list">', 0),
(58, 19, 1, '<select>', 1),
(59, 20, 1, '<input type="textarea">', 0),
(60, 20, 1, '<input type="textbox">', 0),
(61, 20, 1, '<textarea>', 1),
(62, 21, 1, '<img href="image.gif" alt="MyImage">', 0),
(63, 21, 1, '<img alt="MyImage">image.gif</img>', 0),
(64, 21, 1, '<image src="image.gif" alt="MyImage">', 0),
(65, 21, 1, '<img src="image.gif" alt="MyImage">', 1),
(66, 22, 1, '<body background="background.gif">', 0),
(67, 22, 1, '<body style="background-image:url(background.gif)">', 1),
(68, 22, 1, '<background img="background.gif">', 0),
(69, 23, 1, 'radio', 1),
(70, 23, 1, 'checkbox', 1),
(71, 23, 1, 'textarea', 0),
(72, 23, 1, 'textbox', 1),
(73, 24, 1, 'required', 1),
(74, 24, 1, 'href', 0),
(75, 24, 1, 'email', 1),
(76, 24, 1, 'alt', 0),
(77, 25, 1, 'alt', 1),
(78, 25, 1, 'href', 0),
(79, 25, 1, 'src', 1),
(80, 25, 1, 'title', 0),
(81, 28, 1, 'Creative Style Sheets', 0),
(82, 28, 1, 'Cascading Style Sheets', 1),
(83, 28, 1, 'Colorful Style Sheets', 0),
(84, 28, 1, 'Computer Style Sheets', 0),
(85, 29, 1, '<style src="mystyle.css">', 0),
(86, 29, 1, '<link rel="stylesheet" type="text/css" href="mystyle.css">', 1),
(87, 29, 1, '<stylesheet>mystyle.css</stylesheet>', 0),
(88, 30, 1, 'At the top of the document', 0),
(89, 30, 1, 'In the <head> section', 1),
(90, 30, 1, 'At the end of the document', 0),
(91, 30, 1, 'In the <body> section', 0),
(92, 31, 1, '<script>', 0),
(93, 31, 1, '<style>', 1),
(94, 31, 1, '<css>', 0),
(95, 32, 1, 'style', 1),
(96, 32, 1, 'class', 0),
(97, 32, 1, 'styles', 0),
(98, 32, 1, 'font', 0),
(99, 33, 1, '{body:color=black;}', 0),
(100, 33, 1, 'body:color=black;', 0),
(101, 33, 1, 'body {color: black;}', 1),
(102, 33, 1, '{body;color:black;}', 0),
(103, 34, 1, '/* this is a comment */', 0),
(104, 34, 1, ''' this is a comment', 0),
(105, 34, 1, '// this is a comment //', 0),
(106, 34, 1, '// this is a comment', 0),
(107, 35, 1, 'background-color', 1),
(108, 35, 1, 'color', 0),
(109, 35, 1, 'bgcolor', 0),
(110, 36, 1, 'h1 {background-color:#FFFFFF;}', 1),
(111, 36, 1, 'h1.all {background-color:#FFFFFF;}', 0),
(112, 36, 1, 'all.h1 {background-color:#FFFFFF;}', 0),
(113, 37, 1, 'fgcolor', 0),
(114, 37, 1, 'text-color', 0),
(115, 37, 1, 'color', 1),
(116, 38, 1, 'font-style', 0),
(117, 38, 1, 'text-size', 0),
(118, 38, 1, 'font-size', 1),
(119, 38, 1, 'text-style', 0),
(120, 39, 1, 'p {text-size:bold;}', 0),
(121, 39, 1, '<p style="text-size:bold;">', 0),
(122, 39, 1, '<p style="font-size:bold;">', 0),
(123, 39, 1, 'p {font-weight:bold;}', 1),
(124, 40, 1, 'a {text-decoration:no-underline;}', 0),
(125, 40, 1, 'a {decoration:no-underline;}', 0),
(126, 40, 1, 'a {underline:none;}', 0),
(127, 40, 1, 'a {text-decoration:none;}', 1),
(128, 41, 1, 'You can''t do that with CSS', 0),
(129, 41, 1, 'text-transform:uppercase', 0),
(130, 41, 1, 'text-transform:capitalize', 1),
(131, 42, 1, 'Both font-family and font can be used', 0),
(132, 42, 1, 'font-family', 1),
(133, 42, 1, 'font', 0),
(134, 43, 1, 'font-weight:bold;', 1),
(135, 43, 1, 'style:bold;', 0),
(136, 43, 1, 'font:bold;', 0),
(137, 44, 1, 'border-width:10px 20px 5px 1px;', 0),
(138, 44, 1, 'border-width:5px 20px 10px 1px;', 0),
(139, 44, 1, 'border-width:10px 1px 5px 20px;', 0),
(140, 44, 1, 'border-width:10px 5px 20px 1px;', 1),
(141, 45, 1, 'indent', 0),
(142, 45, 1, 'margin-left', 1),
(143, 45, 1, 'padding-left', 0),
(144, 46, 1, 'yes', 1),
(145, 46, 1, 'no', 0),
(146, 47, 1, 'list: square;', 0),
(147, 47, 1, 'list-type: square;', 0),
(148, 47, 1, 'list-style-type: square;', 1),
(149, 48, 1, '<js>', 0),
(150, 48, 1, '<scripting>', 0),
(151, 48, 1, '<script>', 1),
(152, 48, 1, '<javascript>', 0),
(153, 49, 1, 'document.getElement("p").innerHTML = "Hello World!";', 0),
(154, 49, 1, 'document.getElementByName("p").innerHTML = "Hello World!";', 0),
(155, 49, 1, 'document.getElementById("demo").innerHTML = "Hello World!";', 1),
(156, 49, 1, '#demo.innerHTML = "Hello World!";', 0),
(157, 50, 1, 'The <body> section', 1),
(158, 50, 1, 'The <head> section', 1),
(159, 50, 1, 'No one', 0),
(160, 51, 1, '<script name="xxx.js">', 0),
(161, 51, 1, '<script href="xxx.js">', 0),
(162, 51, 1, '<script src="xxx.js">', 1),
(163, 52, 1, 'true', 1),
(164, 52, 1, 'false', 0),
(165, 53, 1, 'alertBox("Hello World");', 0),
(166, 53, 1, 'msgBox("Hello World");', 0),
(167, 53, 1, 'alert("Hello World");', 1),
(168, 53, 1, 'msg("Hello World");', 0),
(169, 54, 1, 'function myFunction()', 1),
(170, 54, 1, 'function:myFunction()', 0),
(171, 54, 1, 'function = myFunction()', 0),
(172, 55, 1, 'call myFunction()', 0),
(173, 55, 1, 'call function myFunction()', 0),
(174, 55, 1, 'myFunction()', 1),
(175, 56, 1, 'if i = 5 then', 0),
(176, 56, 1, 'if i = 5', 0),
(177, 56, 1, 'if i == 5 then', 0),
(178, 56, 1, 'if (i == 5)', 1),
(179, 57, 1, 'if (i <> 5)', 0),
(180, 57, 1, 'if i <> 5', 0),
(181, 57, 1, 'if i =! 5 then', 0),
(182, 57, 1, 'if (i != 5)', 1),
(183, 58, 1, 'while (i <= 10; i++)', 0),
(184, 58, 1, 'while i = 1 to 10', 0),
(185, 58, 1, 'while (i <= 10)', 1),
(186, 59, 1, 'for (i <= 5; i++)', 0),
(187, 59, 1, 'for i = 1 to 5', 0),
(188, 59, 1, 'for (i = 0; i <= 5; i++)', 1),
(189, 59, 1, 'for (i = 0; i <= 5)', 0),
(190, 60, 1, '''This is a comment', 0),
(191, 60, 1, '<!--This is a comment-->', 0),
(192, 60, 1, '//This is a comment', 1),
(193, 61, 1, '//This comment has more than one line//', 0),
(194, 61, 1, '/*This comment has more than one line*/', 1),
(195, 61, 1, '<!--This comment has more than one line-->', 0),
(196, 62, 1, 'var colors = ["red", "green", "blue"]', 1),
(197, 62, 1, 'var colors = "red", "green", "blue"', 0),
(198, 62, 1, 'var colors = (1:"red", 2:"green", 3:"blue")', 0),
(199, 62, 1, 'var colors = 1 = ("red"), 2 = ("green"), 3 = ("blue")', 0),
(200, 63, 1, 'round(7.25)', 0),
(201, 63, 1, 'Math.round(7.25)', 1),
(202, 63, 1, 'rnd(7.25)', 0),
(203, 63, 1, 'Math.rnd(7.25)', 0),
(204, 64, 1, 'Math.ceil(x, y)', 0),
(205, 64, 1, 'ceil(x, y)', 0),
(206, 64, 1, 'top(x, y)', 0),
(207, 64, 1, 'Math.max(x, y)', 1),
(208, 65, 1, 'w2 = window.new("http://www.w3schools.com");', 0),
(209, 65, 1, 'w2 = window.open("http://www.w3schools.com");', 1),
(210, 66, 1, 'true', 0),
(211, 66, 1, 'false', 1);

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '1', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, '', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `sort` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `status`, `sort`) VALUES
(1, 'Html', 1, 0),
(2, 'Css', 1, 0),
(3, 'Javascript', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `sort` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `title`, `status`, `sort`) VALUES
(1, 'Easy', 1, 0),
(2, 'Medium', 1, 0),
(3, 'Hard', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `id_category` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `sort` tinyint(4) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `id_level` int(11) NOT NULL,
  `short_answer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `content`, `type`, `id_category`, `status`, `sort`, `created_on`, `id_level`, `short_answer`) VALUES
(1, '<p>What does HTML stand for?</p>\r\n', 1, 1, 1, 0, '2015-05-17 22:59:20', 1, ''),
(2, '<p>Who is making the Web standards?</p>\r\n', 1, 1, 1, 0, '2015-05-17 23:44:34', 2, ''),
(3, '<p>Choose the correct HTML tag for the largest heading</p>\r\n', 1, 1, 1, 0, '2015-05-17 23:45:55', 3, ''),
(4, '<p>What is the correct HTML tag for inserting a line break?</p>\r\n', 1, 1, 1, 0, '2015-05-17 23:47:01', 1, ''),
(5, '<p>What is the preferred way for adding a background color in HTML?</p>\r\n', 1, 1, 1, 0, '2015-05-17 23:48:28', 2, ''),
(6, '<p>Choose the correct HTML tag to make a text bold</p>\r\n', 1, 1, 1, 0, '2015-05-17 23:49:12', 3, ''),
(7, '<p>Choose the correct HTML tag to make a text italic</p>\r\n', 1, 1, 1, 0, '2015-05-17 23:50:10', 1, ''),
(8, '<p>What is the correct HTML for creating a hyperlink?</p>\r\n', 1, 1, 1, 0, '2015-05-17 23:51:54', 2, ''),
(9, '<p>How can you create an e-mail link?</p>\r\n', 1, 1, 1, 0, '2015-05-17 23:53:10', 3, ''),
(11, '<p>How can you open a link in a new tab/browser window?</p>\r\n', 1, 1, 1, 0, '2015-05-17 23:54:43', 1, ''),
(12, '<p>Which of these tags are all &lt;table&gt; tags?</p>\r\n', 1, 1, 1, 0, '2015-05-17 23:56:02', 2, ''),
(13, '<p>In HTML, inline elements are normally displayed without starting a new line.</p>\r\n', 1, 1, 1, 0, '2015-05-17 23:57:06', 3, ''),
(14, '<p>How can you make a numbered list?</p>\r\n', 1, 1, 1, 0, '2015-05-17 23:59:18', 1, ''),
(15, '<p>How can you make a bulleted list?</p>\r\n', 1, 1, 1, 0, '2015-05-18 00:00:51', 2, ''),
(16, '<p>What is the correct HTML for making a checkbox?</p>\r\n', 1, 1, 1, 0, '2015-05-18 00:04:41', 3, ''),
(17, '<p>What is the correct HTML for making a text input field?</p>\r\n', 1, 1, 1, 0, '2015-05-18 00:05:57', 1, ''),
(19, '<p>What is the correct HTML for making a drop-down list?</p>\r\n', 1, 1, 1, 0, '2015-05-18 00:07:42', 2, ''),
(20, '<p>What is the correct HTML for making a text area?</p>\r\n', 1, 1, 1, 0, '2015-05-18 00:09:09', 3, ''),
(21, '<p>What is the correct HTML for inserting an image?</p>\r\n', 1, 1, 1, 0, '2015-05-18 00:11:02', 1, ''),
(22, '<p>What is the correct HTML for inserting a background image?</p>\r\n', 1, 1, 1, 0, '2015-05-18 00:12:23', 1, ''),
(23, '<p>Choose a field place into &lt;input&gt;</p>\r\n', 2, 1, 1, 0, '2015-05-18 00:17:38', 1, ''),
(24, '<p>Attributes are used validation?</p>\r\n', 2, 1, 1, 0, '2015-05-18 00:22:41', 1, ''),
(25, '<p>Attributes belong to &lt;img&gt;</p>\r\n', 2, 1, 1, 0, '2015-05-18 00:24:53', 1, ''),
(26, '<p>IQ question &#39;+&#39;<br />\r\n1+1=?</p>\r\n', 3, 1, 1, 0, '2015-05-18 00:25:50', 1, '2'),
(27, '<p>IQ question &#39;-&#39;<br />\r\n1 - 10 =?</p>\r\n', 3, 1, 1, 0, '2015-05-18 00:27:22', 1, '-9'),
(28, '<p>What does CSS stand for?</p>\r\n', 1, 2, 1, 0, '2015-05-18 00:30:04', 1, ''),
(29, '<p>What is the correct HTML for referring to an external style sheet?</p>\r\n', 1, 2, 1, 0, '2015-05-18 00:32:29', 2, ''),
(30, '<p>Where in an HTML document is the correct place to refer to an external style sheet?</p>\r\n', 1, 1, 1, 0, '2015-05-18 00:35:41', 3, ''),
(31, '<p>Which HTML tag is used to define an internal style sheet?</p>\r\n', 1, 2, 1, 0, '2015-05-18 00:40:40', 1, ''),
(32, '<p>Which HTML attribute is used to define inline styles?</p>\r\n', 1, 2, 1, 0, '2015-05-18 00:42:56', 2, ''),
(33, '<p>Which is the correct CSS syntax?</p>\r\n', 1, 2, 1, 0, '2015-05-18 01:01:03', 3, ''),
(34, '<p>How do you insert a comment in a CSS file?</p>\r\n', 1, 2, 1, 0, '2015-05-18 01:02:21', 1, ''),
(35, '<p>Which property is used to change the background color?</p>\r\n', 1, 2, 1, 0, '2015-05-18 01:03:05', 2, ''),
(36, '<p>How do you add a background color for all &lt;h1&gt; elements?</p>\r\n', 1, 2, 1, 0, '2015-05-18 01:03:49', 3, ''),
(37, '<p>Which CSS property is used to change the text color of an element?</p>\r\n', 1, 1, 1, 0, '2015-05-18 01:04:39', 1, ''),
(38, '<p>Which CSS property controls the text size?</p>\r\n', 1, 2, 1, 0, '2015-05-18 01:05:31', 2, ''),
(39, '<p>What is the correct CSS syntax for making all the &lt;p&gt; elements bold?</p>\r\n', 1, 2, 1, 0, '2015-05-18 01:06:29', 3, ''),
(40, '<p>How do you display hyperlinks without an underline?</p>\r\n', 1, 2, 1, 0, '2015-05-18 01:07:21', 1, ''),
(41, '<p>How do you make each word in a text start with a capital letter?</p>\r\n', 1, 2, 1, 0, '2015-05-18 01:08:22', 2, ''),
(42, '<p>Which property is used to change the font of an element?</p>\r\n', 1, 2, 1, 0, '2015-05-18 01:09:13', 3, ''),
(43, '<p>How do you make the text bold?</p>\r\n', 1, 2, 1, 0, '2015-05-18 01:10:08', 1, ''),
(44, '<p>How do you display a border like this:<br />\r\nThe top border = 10 pixels<br />\r\nThe bottom border = 5 pixels<br />\r\nThe left border = 20 pixels<br />\r\nThe right border = 1pixel?</p>\r\n', 1, 2, 1, 0, '2015-05-18 01:11:06', 2, ''),
(45, '<p>Which property is used to change the left margin of an element?</p>\r\n', 1, 2, 1, 0, '2015-05-18 01:11:54', 3, ''),
(46, '<p>When using the padding property; are you allowed to use negative values?</p>\r\n', 1, 2, 1, 0, '2015-05-18 01:13:02', 1, ''),
(47, '<p>How do you make a list that lists its items with squares?</p>\r\n', 1, 2, 1, 0, '2015-05-18 01:13:41', 1, ''),
(48, '<p>Inside which HTML element do we put the JavaScript?</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:14:55', 1, ''),
(49, '<p>What is the correct JavaScript syntax to change the content of the HTML element below?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&lt;p id=&quot;demo&quot;&gt;This is a demonstration.&lt;/p&gt;</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:15:48', 2, ''),
(50, '<p>Where is the correct place to insert a JavaScript?</p>\r\n', 2, 3, 1, 0, '2015-05-18 01:16:39', 3, ''),
(51, '<p>What is the correct syntax for referring to an external script called &quot;xxx.js&quot;?</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:17:18', 3, ''),
(52, '<p>The external JavaScript file must contain the &lt;script&gt; tag.</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:18:13', 1, ''),
(53, '<p>How do you write &quot;Hello World&quot; in an alert box?</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:19:01', 2, ''),
(54, '<p>How do you create a function in JavaScript?</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:19:38', 1, ''),
(55, '<p>How do you call a function named &quot;myFunction&quot;?</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:20:19', 2, ''),
(56, '<p>How to write an IF statement in JavaScript?</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:21:42', 2, ''),
(57, '<p>How to write an IF statement for executing some code if &quot;i&quot; is NOT equal to 5?</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:23:00', 3, ''),
(58, '<p>How does a WHILE loop start?</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:23:45', 3, ''),
(59, '<p>How does a FOR loop start?</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:24:47', 3, ''),
(60, '<p>How can you add a comment in a JavaScript?</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:25:31', 1, ''),
(61, '<p>How to insert a comment that has more than one line?</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:26:17', 2, ''),
(62, '<p>What is the correct way to write a JavaScript array?</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:27:25', 3, ''),
(63, '<p>How do you round the number 7.25, to the nearest integer?</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:28:44', 1, ''),
(64, '<p>How do you find the number with the highest value of x and y?</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:30:03', 2, ''),
(65, '<p>What is the correct JavaScript syntax for opening a new window called &quot;w2&quot; ?</p>\r\n', 1, 3, 1, 0, '2015-05-18 01:31:56', 3, ''),
(66, '<p><strong>JavaScript is the same as Java.</strong></p>\r\n', 1, 3, 1, 0, '2015-05-18 01:32:29', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `quizs`
--

CREATE TABLE IF NOT EXISTS `quizs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `no_of_question` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `sort` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `quizs`
--

INSERT INTO `quizs` (`id`, `title`, `time`, `no_of_question`, `status`, `sort`) VALUES
(1, 'Front End', 600, 50, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_cate_level`
--

CREATE TABLE IF NOT EXISTS `quiz_cate_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_quiz` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `no_of_question` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `quiz_cate_level`
--

INSERT INTO `quiz_cate_level` (`id`, `id_quiz`, `id_category`, `id_level`, `no_of_question`) VALUES
(1, 1, 1, 1, 10),
(2, 1, 1, 2, 5),
(3, 1, 1, 3, 5),
(4, 1, 2, 1, 5),
(5, 1, 2, 2, 5),
(6, 1, 2, 3, 5),
(7, 1, 3, 1, 5),
(8, 1, 3, 2, 5),
(9, 1, 3, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `score` int(11) DEFAULT '0',
  `start` datetime NOT NULL,
  `done` tinyint(4) DEFAULT '0',
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `result_detail`
--

CREATE TABLE IF NOT EXISTS `result_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_result` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_answer` varchar(50) DEFAULT NULL,
  `text_answer` varchar(255) DEFAULT NULL,
  `result` tinyint(4) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='0:fail,1:true' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `address`, `DOB`, `gender`, `status`, `created_on`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'c6922b6ba9e0939583f973bc1682493351ad4fe8', 'elisoft', '1989-09-16', 1, 1, '2015-05-17 14:40:39'),
(2, 'username', 'Nguyễn Kim Hồng', 'kimhong_n89@yahoo.com.vn', 'c6922b6ba9e0939583f973bc1682493351ad4fe8', '57 Thích bửu đăng', '1989-09-16', 1, 1, '2015-05-17 14:44:12');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
