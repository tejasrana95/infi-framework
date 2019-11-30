-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2014 at 03:09 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myframework`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `profilepic` varchar(1000) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `lastAcess` datetime NOT NULL,
  `active` int(11) NOT NULL,
  `permission` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uid`, `username`, `password`, `name`, `email`, `profilepic`, `ip`, `lastAcess`, `active`, `permission`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin@admin.com', '', '127.0.0.1', '2014-11-14 10:47:51', 1, '1234500000'),
(3, 'tejas', '21232f297a57a5a743894a0e4a801fc3', 'Tejas', 'tejasrana95@gmail.com', 'http://localhost/myframework/images/profile/default_avatar.jpg', '127.0.0.1', '2014-11-13 19:42:04', 1, '1234500000');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `description` varchar(200) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `templates` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `category` int(11) NOT NULL,
  `permalink` varchar(1000) NOT NULL,
  `doa` date NOT NULL,
  `featuredImage` varchar(1000) NOT NULL,
  `crawl` int(11) NOT NULL,
  `optional1` varchar(1000) NOT NULL,
  `optional2` varchar(1000) NOT NULL,
  `optional3` varchar(1000) NOT NULL,
  `searchTags` varchar(1000) NOT NULL,
  `customJS` text NOT NULL,
  `customCSS` text NOT NULL,
  `LastModify` datetime NOT NULL,
  `LastModifyBy` bigint(20) NOT NULL,
  `subCategory` bigint(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent` bigint(20) NOT NULL,
  `text` varchar(1000) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`uid`, `parent`, `text`) VALUES
(21, 0, 'Category 1'),
(22, 0, 'Category 2'),
(23, 21, 'Sub cate 1'),
(24, 21, 'Sub cate 2'),
(25, 22, 'Sub cate 3'),
(26, 22, 'Sub cate 4');

-- --------------------------------------------------------

--
-- Table structure for table `coment`
--

CREATE TABLE IF NOT EXISTS `coment` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `blogId` bigint(20) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `text` text NOT NULL,
  `dop` date NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `coment`
--

INSERT INTO `coment` (`uid`, `blogId`, `name`, `email`, `text`, `dop`) VALUES
(1, 16, 'Tejas', 'tejasrana95@gmail.com', 'asdas', '2014-01-29'),
(2, 16, 'Tejas', 'tejasrana95@gmail.com', 'asdas', '2014-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `demo_module`
--

CREATE TABLE IF NOT EXISTS `demo_module` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  `link` varchar(500) NOT NULL,
  `parent` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `noLink` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`uid`, `label`, `link`, `parent`, `sort`, `noLink`) VALUES
(13, 'Home', '{URL}', 0, 1, 0),
(14, 'About us', '{URL}about-us/', 0, 2, 0),
(15, 'Services', '{URL}services/', 0, 3, 0),
(22, 'Packages', '{URL}packages', 0, 4, 0),
(24, 'Contact us', '{URL}contact', 0, 10, 0),
(25, 'Search Engine Optimization', '{URL}seo-packages-jaipur', 15, 1, 0),
(26, 'Social Media Marketing', '{URL}social-media-marketing-company', 15, 2, 0),
(27, 'Web design', '{URL}website-designing-company-india', 15, 3, 0),
(28, 'Web Development', '{URL}web-development-company-india', 15, 4, 0),
(29, 'E-Commerce Development', '{URL}ecommerce-development-company-india', 15, 5, 0),
(30, 'Mobile Application Development', '{URL}mobile-application-development-company', 15, 6, 0),
(31, 'test', 'test', 25, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `moduleName` varchar(1000) NOT NULL,
  `source` text NOT NULL,
  `responsiveCode` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`uid`, `moduleName`, `source`, `responsiveCode`, `active`) VALUES
(14, 'JS FOOTER', '<script>\r\n(function(i,s,o,g,r,a,m){i[''GoogleAnalyticsObject'']=r;i[r]=i[r]||function(){\r\n(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\r\nm=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\r\n})(window,document,''script'',''//www.google-analytics.com/analytics.js'',''ga'');\r\n\r\nga(''create'', ''UA-52567471-1'', ''auto'');\r\nga(''send'', ''pageview'');\r\n\r\n</script>\r\n<!-- Histats.com  START (hidden counter)-->\r\n<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>\r\n<a href="http://www.histats.com" target="_blank" title="page hit counter" ><script  type="text/javascript" >\r\ntry {Histats.start(1,2668669,4,0,0,0,"");\r\nHistats.track_hits();} catch(err){};\r\n</script></a>\r\n<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2668669&101" alt="page hit counter" border="0"></a></noscript>\r\n<!-- Histats.com  END  -->\r\n<!--Start of Zopim Live Chat Script-->\r\n<script type="text/javascript">\r\nwindow.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=\r\nd.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.\r\n_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute(''charset'',''utf-8'');\r\n$.src=''//v2.zopim.com/?1zaRR0W2n4BAIzApgrBxjMhUqOEqXaFI'';z.t=+new Date;$.\r\ntype=''text/javascript'';e.parentNode.insertBefore($,e)})(document,''script'');\r\n</script>\r\n<!--End of Zopim Live Chat Script-->\r\n\r\n', 12, 0),
(15, 'CSS HEADER', '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">', 12, 0),
(16, 'Module 1', '', 12, 1),
(17, 'Module 2', '', 12, 1),
(18, 'Content With Accordion - Home', '<div class="col-md-6">\r\n                                <h3>Content With Accordion</h3>\r\n                                <div class="accordion-box">\r\n\r\n                                    <div class="accord-elem active">\r\n                                        <div class="accord-title">\r\n                                            <h5><i class="fa fa-question"></i>Marketplace Basics</h5>\r\n                                            <a class="accord-link" href="#"></a>\r\n                                        </div>\r\n                                        <div class="accord-content">\r\n                                            <span class="image-content"><i class="fa fa-suitcase"></i></span>\r\n                                            <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio</p>\r\n                                        </div>\r\n                                    </div>\r\n\r\n                                    <div class="accord-elem">\r\n                                        <div class="accord-title">\r\n                                            <h5><i class="fa fa-question"></i>Marketplace Basics</h5>\r\n                                            <a class="accord-link" href="#"></a>\r\n                                        </div>\r\n                                        <div class="accord-content">\r\n                                            <span class="image-content"><i class="fa fa-suitcase"></i></span>\r\n                                            <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio</p>\r\n                                        </div>\r\n                                    </div>\r\n\r\n                                    <div class="accord-elem">\r\n                                        <div class="accord-title">\r\n                                            <h5><i class="fa fa-question"></i>Marketplace Basics</h5>\r\n                                            <a class="accord-link" href="#"></a>\r\n                                        </div>\r\n                                        <div class="accord-content">\r\n                                            <span class="image-content"><i class="fa fa-suitcase"></i></span>\r\n                                            <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio</p>\r\n                                        </div>\r\n                                    </div>\r\n\r\n                                    <div class="accord-elem">\r\n                                        <div class="accord-title">\r\n                                            <h5><i class="fa fa-question"></i>Marketplace Basics</h5>\r\n                                            <a class="accord-link" href="#"></a>\r\n                                        </div>\r\n                                        <div class="accord-content">\r\n                                            <span class="image-content"><i class="fa fa-suitcase"></i></span>\r\n                                            <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio</p>\r\n                                        </div>\r\n                                    </div>\r\n\r\n                                    <div class="accord-elem">\r\n                                        <div class="accord-title">\r\n                                            <h5><i class="fa fa-question"></i>Marketplace Basics</h5>\r\n                                            <a class="accord-link" href="#"></a>\r\n                                        </div>\r\n                                        <div class="accord-content">\r\n                                            <span class="image-content"><i class="fa fa-suitcase"></i></span>\r\n                                            <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio</p>\r\n                                        </div>\r\n                                    </div>\r\n\r\n                                </div>\r\n                            </div>', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  `heading` varchar(1000) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(500) NOT NULL,
  `subCategory` bigint(20) NOT NULL,
  `template` bigint(20) NOT NULL,
  `seoTitle` varchar(500) NOT NULL,
  `keywords` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `crawl` int(11) NOT NULL,
  `optional1` varchar(1000) NOT NULL,
  `optional2` varchar(1000) NOT NULL,
  `optional3` varchar(1000) NOT NULL,
  `searchTags` varchar(1000) NOT NULL,
  `customJS` text NOT NULL,
  `customCSS` text NOT NULL,
  `LastModify` datetime NOT NULL,
  `LastModifyBy` bigint(20) NOT NULL,
  `permalink` varchar(500) NOT NULL,
  `featuredImage` varchar(1000) NOT NULL,
  `speciallist` bigint(20) NOT NULL DEFAULT '0',
  `modules` varchar(1000) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`uid`, `title`, `heading`, `content`, `category`, `subCategory`, `template`, `seoTitle`, `keywords`, `description`, `crawl`, `optional1`, `optional2`, `optional3`, `searchTags`, `customJS`, `customCSS`, `LastModify`, `LastModifyBy`, `permalink`, `featuredImage`, `speciallist`, `modules`) VALUES
(23, 'Services', 'Services', '<div class="span3">\r\n<div class="service-wrap">\r\n<div class=" wrap-icon hi-icon-effect-1 hi-icon-effect-1a">\r\n<div class="hi-icon icon-globe"></div>\r\n</div>\r\n<h2>Web Development</h2>\r\n<p>Infi Technology is a popular Web development agency, taking pleasure in offering Web Program Solutions for local as well as worldwide company.</p>\r\n</div>\r\n</div>\r\n<div class="span3">\r\n<div class="service-wrap">\r\n<div class="wrap-icon hi-icon-effect-1 hi-icon-effect-1a">\r\n<div class="hi-icon icon-mobile-phone"></div>\r\n</div>\r\n<h2>Mobile App</h2>\r\n<p>Are you looking for reliable mobile application Development Company who can help in develop mobile app? Infi Technology provides brilliant sites with effect, on time and in price range.</p>\r\n</div>\r\n</div>\r\n<div class="span3">\r\n<div class="service-wrap">\r\n<div class="wrap-icon hi-icon-effect-1 hi-icon-effect-1a">\r\n<div class="hi-icon icon-desktop"></div>\r\n</div>\r\n<h2>Web Designing</h2>\r\n<p>Web design development plays a crucial part, similar to that of ads. Your clients get stunned at seeing your alternatives and products which is shown beautifully and successfully.</p>\r\n</div>\r\n</div>\r\n<div class="span3">\r\n<div class="service-wrap">\r\n<div class="wrap-icon hi-icon-effect-1 hi-icon-effect-1a">\r\n<div class="hi-icon icon-shopping-cart"></div>\r\n</div>\r\n<h2>E-Commerce</h2>\r\n<p>Infi Technology is a recognized web development company delivering web development services to clients located worldwide.</p>\r\n<p></p>\r\n</div>\r\n</div>\r\n<div class="span12">\r\n<p><img src="../../images/website-design-process.jpg" alt="website-design-process" style="display: block; margin-left: auto; margin-right: auto;" /></p>\r\n</div>\r\n<!--\r\n<div class="span3">\r\n<div class="service-wrap">\r\n<div class="wrap-icon hi-icon-effect-1 hi-icon-effect-1a">\r\n<div class="hi-icon icon-globe"></div>\r\n</div>\r\n<h2>Search Engine Optimisation (SEO)</h2>\r\n<p>Nunc sit amet nisl ut ipsum auctor placerat ut at turpis. Phasellus gravida volutpat velit, a tempus neque consequat vel.</p>\r\n</div>\r\n</div>\r\n<div class="span3">\r\n<div class="service-wrap">\r\n<div class="wrap-icon hi-icon-effect-1 hi-icon-effect-1a">\r\n<div class="hi-icon icon-facebook"></div>\r\n</div>\r\n<h2>Social Media Marketing (SMM)</h2>\r\n<p>Nunc sit amet nisl ut ipsum auctor placerat ut at turpis. Phasellus gravida volutpat velit, a tempus neque consequat vel.</p>\r\n</div>\r\n</div>\r\n<div class="span3">\r\n<div class="service-wrap">\r\n<div class="wrap-icon hi-icon-effect-1 hi-icon-effect-1a">\r\n<div class="hi-icon icon-bullhorn"></div>\r\n</div>\r\n<h2>Pay Per Click (PPC) Marketing</h2>\r\n<p>Nunc sit amet nisl ut ipsum auctor placerat ut at turpis. Phasellus gravida volutpat velit, a tempus neque consequat vel.</p>\r\n</div>\r\n</div>\r\n<div class="span3">\r\n<div class="service-wrap">\r\n<div class="wrap-icon hi-icon-effect-1 hi-icon-effect-1a">\r\n<div class="hi-icon icon-briefcase"></div>\r\n</div>\r\n<h2>Business Planning & ResearchÂ </h2>\r\n<p>Nunc sit amet nisl ut ipsum auctor placerat ut at turpis. Phasellus gravida volutpat velit, a tempus neque consequat vel.</p>\r\n</div>\r\n</div>\r\n<div class="span12 divider-1">Â </div>\r\n<div class="span12">\r\n<div class="head-style1">\r\n<h3>How We Work</h3>\r\n</div>\r\n</div>\r\n<div class="span3 pad-bot">\r\n<div class="we-work">\r\n<div class="work-icon"></div>\r\n<div class="work-txt">\r\n<h3>Planning</h3>\r\n<p>Nunc sit amet nisl ut ipsum auctor placerat ut at turpis. Phasellus gravida</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="span3 pad-bot">\r\n<div class="we-work">\r\n<div class="work-icon"></div>\r\n<div class="work-txt">\r\n<h3>Designing</h3>\r\n<p>Nunc sit amet nisl ut ipsum auctor placerat ut at turpis. Phasellus gravida</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="span3 pad-bot">\r\n<div class="we-work">\r\n<div class="work-icon"></div>\r\n<div class="work-txt">\r\n<h3>Coding</h3>\r\n<p>Nunc sit amet nisl ut ipsum auctor placerat ut at turpis. Phasellus gravida</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="span3 pad-bot">\r\n<div class="we-work">\r\n<div class="work-icon"></div>\r\n<div class="work-txt">\r\n<h3>Launch</h3>\r\n<p>Nunc sit amet nisl ut ipsum auctor placerat ut at turpis. Phasellus gravida</p>\r\n</div>\r\n</div>\r\n</div> -->', '21', 23, 1, '', '', '', 1, '', '', '', '', '', '', '2014-10-12 20:04:27', 1, 'services', '', 0, ''),
(25, 'About us', 'About us', '<p><b>infitechnology</b> is one of the top <b>digital marketing agency</b> in India includes web design, developing &amp; mobile application development organization thinking about in the company of offering alternatives of any complexness to customers globally. We have been working with a wide range of companies in different verticals and across different geo-graphics, over the decades and offering them alternatives that perform and address their company needs. We are inspired and thrilled about we do as it is always new on technological innovation through our strategic branding solution.</p>\r\n<p>Infitechnology is a Major <b>Web Design Company located in Delhi, Bangalore</b>. At our Web Designing Company, We have a group of 50+ Web experts and years of experience in Web page design, Web development, Online Promotion, Market Research. We provide a professional website for your company with impressive technological innovation. For many years we have been helping companies build impressive manufacturers for their company. Please check out us our Successful customers here Check out our Profile here: <b>http://www.infitechnology.com/portfolio.html</b></p>\r\n<p>We are one of the best <b>SEO companies in Bangalore, SEO Company in Delhi</b>, web design company companies that set the silver requirements in web development. We have perfected the art of easily combining design creativeness and complexness in web growth technological innovation. Here at Infitechnology , every program code is a step towards achievements.</p>\r\n<p>We are internet marketing strategic firm and we are the leading <b>SEO Company in India</b>. We employ a well organized mix of internet marketing strategies &ndash; from online marketing, social networking, content marketing, PPC, influencer outreach and PR&ndash;that meet easily to bring customers, interact with your viewers, increase brings and increase sales.</p>\r\n<p>Being an <b>affordable SEO company in India</b>, we treasures the viewpoint to add new measurements in the international IT industry with its remarkable quality SEO alternatives, link-building, pay per click and other related web alternatives. With our highly trained group of IT professionals, we are walking on the path of achievements towards the viewpoint of accomplishing the superior position in web alternatives in international viewpoint.</p>', '22', 25, 2, 'SEO Company in Bangalore, SEO Services in Delhi', '', '', 1, '', '', '', '', '', '', '2014-10-12 20:00:41', 1, 'about-us', 'http://localhost/myframework/images/banner.jpg', 1, '16,17,18'),
(26, 'index', 'About us', '<p><strong>{URL},{SITENAME},{VIEW}</strong></p>\r\n<p><strong></strong></p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p></p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p></p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p></p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p></p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p></p>', '22', 25, 1, '', '', '', 1, '', '', '', '', '', '', '2014-10-31 18:41:21', 1, 'index', '', 0, ''),
(28, 'test', 'test', '<p>test page</p>', '21', 23, 1, '', '', '', 1, '', '', '', '', '', '', '2014-10-12 20:03:56', 1, 'test', 'http://localhost/myframework/images/banner.jpg', 0, ''),
(29, 'Jammu and Kashmir floods LIVE updates: Rehabilitation a big challenge, says Omar Abdullah', 'Jammu and Kashmir floods LIVE updates: Rehabilitation a big challenge, says Omar Abdullah', '<p>Jammu and Kashmir floods LIVE updates: Rehabilitation a big challenge, says Omar Abdullah</p>', '21', 24, 1, '', '', '', 1, '', '', '', '', '', '', '2014-10-21 16:44:04', 1, 'jammu-and-kashmir-floods-live-updates-rehabilitation-a-big-challenge-says-omar-abdullah', 'http://localhost/myframework/images/view-our-work.png', 0, '17,18');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  `content` text NOT NULL,
  `client` varchar(1000) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `technology` varchar(1000) NOT NULL,
  `featuredImage` varchar(1000) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`uid`, `title`, `content`, `client`, `type`, `technology`, `featuredImage`) VALUES
(1, 'Food Chain', '<p>A food chain project. Web Site development as well Web Desiging.</p>', 'Azafran', 'Website', 'PHP, HTML5, JQUERY, CSS3', 'images/portfolio/14045796461-big.jpg'),
(2, 'A Tour & Travel Website', '<p>This Website is developed for Tour &amp; Travel Agency</p>', 'Firedous', 'Website', 'PHP, HTML5, JQUERY, CSS3', 'images/portfolio/14045799782-big.jpg'),
(3, 'PharmaTech Expo', '<p>A Website for PharmaTech Expo Event.</p>', 'PharmaTech Expo', 'Website', 'PHP, HTML5, JQUERY, CSS3', 'images/portfolio/14045801303big.jpg'),
(4, 'Furniture Website', '<p>A furniture Website for <strong>Ghar Ghar me Timbor </strong>organization.</p>', 'Ghar Ghar me Timbor', 'Website', 'PHP, HTML5, JQUERY, CSS3', 'images/portfolio/14045802034-big.jpg'),
(5, 'Website for Dairy Den', '<p>A Website for Dairy Den. A dairy Den is a big and very popular Dairy in its city.</p>', 'Dairy Den', 'Website', 'PHP, HTML5, JQUERY, CSS3', 'images/portfolio/14045802985_big.jpg'),
(6, 'Furniture Website', '<p>A website for Door making Industry. DPPL is a Trusted name for Door making.</p>', 'DPPL', 'Website', 'PHP, HTML5, JQUERY, CSS3', 'images/portfolio/14045804266-big.jpg'),
(7, 'Textile Website', '<p>We have develop website for Textile industry.</p>', 'Creator', 'Website', 'PHP, HTML5, JQUERY, CSS3', 'images/portfolio/14045805727-big.jpg'),
(8, 'Website for Moksha', '<p>We have develop and Design a website for Moksha. Moksha is a Home Product Making. as well as we have done SEO for Moksha also.</p>', 'Moksha', 'Website, SEO', 'PHP, HTML5, JQUERY, CSS3', 'images/portfolio/14045807438-big.jpg'),
(9, 'Brochure for Recipes Book', '<p>We have design the brochure for Recipes book.</p>', 'Brochure', 'Graphics', 'Photshop', 'images/portfolio/1404580863g1-big.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  `image` text NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `speciallist`
--

CREATE TABLE IF NOT EXISTS `speciallist` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `pageId` bigint(20) NOT NULL,
  `sort` bigint(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sysmodule`
--

CREATE TABLE IF NOT EXISTS `sysmodule` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(1000) NOT NULL,
  `module_id` varchar(1000) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sysmodule`
--

INSERT INTO `sysmodule` (`uid`, `module_name`, `module_id`, `enable`) VALUES
(5, 'Test Module', 'testmodule', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `system` varchar(1000) NOT NULL,
  `value` varchar(1000) NOT NULL,
  `reserved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`uid`, `system`, `value`, `reserved`) VALUES
(1, 'GOOGLEANYTICS', 'UA-123456', 0),
(3, 'TEL', '+9182 90 843931', 0),
(4, 'ADDRESS', '125, Thavre Kare, Near BTM Layout, Bangalore', 0),
(5, 'FACEBOOK', 'https://www.facebook.com/pages/Infi-Technology/277411435772153', 0),
(6, 'TWITTER', '', 0),
(7, 'LINKEDIN', '', 0),
(8, 'PINTEREST', '', 0),
(9, 'GOOGLEPLUS', '', 0),
(14, 'YOUTUBE', '', 0),
(17, 'SKYPE', 'skype:infitechnology?chat', 0),
(18, 'TEL1', '+91 70 23 864936', 0),
(19, 'EMAIL', 'support@infitechnology.com', 0),
(20, 'ADDRESS1', '96, Himmat Nagar, Gopal Pura Bypass, Jaipur', 0),
(21, 'TEL2', '+91 70 23 864936', 0),
(22, 'ADDRESS2', 'Jaipur', 0),
(23, 'KUWAIT', 'Building no. 60, Khitan, Near All Mula Exchange, Kuwait', 0),
(24, 'KUWAITNUMBER', '00 965 67616592', 0),
(70, 'THEME', 'default', 1),
(71, 'SITENAME', 'Infi Technology', 1),
(72, 'TITLE', 'Affordable SEO Company India | SEO Company in Delhi', 1),
(73, 'TITLEPOSTFIX', 'Infi', 1),
(74, 'KEYWORDS', ' ', 1),
(75, 'DESCRIPTION', 'Improve your Website Ranking & ROI by choosing Affordable SEO Company in India, SEO services Delhi. âœ”Call +91-8290843931 âœ”starts at $160/Month.', 1),
(76, 'WWW', 'www.infitechnology.com', 1),
(77, 'MAIL', 'info@infitechnology.com', 1),
(78, 'AUTHOR', 'Tejas Rana', 1);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`uid`, `name`) VALUES
(1, 'Full Widths'),
(2, 'Rightbar');

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE IF NOT EXISTS `urls` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `url` varchar(1000) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `link_id` varchar(1000) NOT NULL,
  `link_with` varchar(1000) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `urls`
--

INSERT INTO `urls` (`uid`, `url`, `path`, `link_id`, `link_with`) VALUES
(8, 'testmodule', 'c:/wamp/www/myframework/admin/Controllers/modules/testmodule', 'testmodule', 'module');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
