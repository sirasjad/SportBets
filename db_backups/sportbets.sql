-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 05. Okt, 2017 21:41 PM
-- Server-versjon: 5.7.19
-- PHP Version: 7.0.23-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hfDatageni`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `email` varchar(64) COLLATE utf8_bin NOT NULL,
  `password` varchar(128) COLLATE utf8_bin NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `regdate` varchar(64) COLLATE utf8_bin NOT NULL,
  `banned` int(11) NOT NULL DEFAULT '0',
  `referrals` int(11) NOT NULL DEFAULT '0',
  `expiry` int(64) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dataark for tabell `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `admin`, `regdate`, `banned`, `referrals`, `expiry`) VALUES
(1, 'Datageni', 'datageni@online.no', 'A4448537EA4ECF6781CDAE593E47EA897F9824AFC5DACCF033153C35E3F7293FF92327539BEF88E1E117D452674F973AFEB52B421A40B937745B993C4C644CD9', 1, '13 June 2017', 0, 0, 0),
(5, 'Kwast', 'kwastservices@gmail.com', 'A4448537EA4ECF6781CDAE593E47EA897F9824AFC5DACCF033153C35E3F7293FF92327539BEF88E1E117D452674F973AFEB52B421A40B937745B993C4C644CD9', 1, '14 June 2017', 0, 0, 0),
(6, 'swag123', 'lsrpcho@gmail.com', '57DB31A05BFFBD0C695ADD36552380C86DF32A89D51B6D7EB57D208BBF7DDEFF48010E39597395F813DFFC6F8FC6DFB514C7CDEEE24435DCD1C7506AD08CCDF5', 0, '4 July 2017', 0, 0, 0),
(7, 'qaws', 'agsyah1508@gmail.com', '74DFC2B27ACFA364DA55F93A5CAEE29CCAD3557247EDA238831B3E9BD931B01D77FE994E4F12B9D4CFA92A124461D2065197D8CF7F33FC88566DA2DB2A4D6EAE', 0, '6 August 2017', 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `date` varchar(64) COLLATE utf8_bin NOT NULL,
  `ip` varchar(64) COLLATE utf8_bin NOT NULL,
  `browser` varchar(64) COLLATE utf8_bin NOT NULL,
  `hostname` varchar(64) COLLATE utf8_bin NOT NULL,
  `log` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dataark for tabell `logs`
--

INSERT INTO `logs` (`id`, `uid`, `type`, `date`, `ip`, `browser`, `hostname`, `log`) VALUES
(251, 1, 2, '09/10/2017 (16:08)', '81.167.2.121', 'Google Chrome (Linux)', '121.81-167-2.customer.lyse.net', 'Deleted all admin logs'),
(252, 1, 2, '09/10/2017 (16:09)', '81.167.2.121', 'Google Chrome (Linux)', '121.81-167-2.customer.lyse.net', 'Took a backup of the database'),
(253, 1, 1, '09/12/2017 (10:53)', '158.36.228.138', 'Google Chrome (Linux)', '158.36.228.138', 'Successfully logged in'),
(254, 1, 2, '09/12/2017 (10:57)', '158.36.228.138', 'Google Chrome (Linux)', '158.36.228.138', 'Added a new football prediction'),
(255, 1, 1, '09/17/2017 (01:50)', '81.167.2.121', 'Google Chrome (Linux)', '121.81-167-2.customer.lyse.net', 'Successfully logged in'),
(256, 1, 1, '09/20/2017 (14:49)', '79.160.56.198', 'Mozilla Firefox (Windows)', '198.79-160-56.customer.lyse.net', 'Successfully logged in'),
(257, 1, 1, '09/20/2017 (14:50)', '81.167.2.121', 'Google Chrome (Linux)', '121.81-167-2.customer.lyse.net', 'Successfully logged in'),
(258, 5, 1, '09/22/2017 (17:46)', '94.66.56.221', 'Google Chrome (Windows)', 'ppp-94-66-56-221.home.otenet.gr', 'Successfully logged in');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `paylogs`
--

CREATE TABLE `paylogs` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `date` varchar(64) COLLATE utf8_bin NOT NULL,
  `ip` varchar(64) COLLATE utf8_bin NOT NULL,
  `browser` varchar(64) COLLATE utf8_bin NOT NULL,
  `hostname` varchar(64) COLLATE utf8_bin NOT NULL,
  `sender` varchar(64) COLLATE utf8_bin NOT NULL,
  `recipient` varchar(64) COLLATE utf8_bin NOT NULL,
  `amount` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dataark for tabell `paylogs`
--

INSERT INTO `paylogs` (`id`, `uid`, `date`, `ip`, `browser`, `hostname`, `sender`, `recipient`, `amount`) VALUES
(1, 1, '06/26/2017 (21:56)', '81.167.2.121', 'Google Chrome (Windows)', 'test', 'datageni@online.no', 'paypal@sportbets.com', '5,00');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `predictions`
--

CREATE TABLE `predictions` (
  `id` int(11) NOT NULL,
  `league` varchar(64) COLLATE utf8_bin NOT NULL,
  `home` varchar(64) COLLATE utf8_bin NOT NULL,
  `away` varchar(64) COLLATE utf8_bin NOT NULL,
  `score` varchar(64) COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dataark for tabell `predictions`
--

INSERT INTO `predictions` (`id`, `league`, `home`, `away`, `score`, `status`) VALUES
(20, 'Super League', 'Olympiacos', 'Panathinaikos', 'Olympiacos Wins', 1),
(24, 'Test League', 'Norway', 'Sweden', '2-0', 1),
(25, 'Homoleague', 'Pakistan', 'India', '10-0', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `paypal` varchar(64) COLLATE utf8_bin NOT NULL,
  `bitcoins` varchar(64) COLLATE utf8_bin NOT NULL,
  `api_key` varchar(64) COLLATE utf8_bin NOT NULL,
  `api_secret` varchar(64) COLLATE utf8_bin NOT NULL,
  `last_backup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dataark for tabell `settings`
--

INSERT INTO `settings` (`id`, `paypal`, `bitcoins`, `api_key`, `api_secret`, `last_backup`) VALUES
(1, 'testing@paypal.com', 'testwallet123', 'jDwNkJRMlrzwh2Cj', 'LHBGRltHqXB2XoAh175mRX9cpJIGLlZw', '09/10/2017');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `shoutbox`
--

CREATE TABLE `shoutbox` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `message` varchar(128) COLLATE utf8_bin NOT NULL,
  `date` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `price` varchar(64) COLLATE utf8_bin NOT NULL,
  `days` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dataark for tabell `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `price`, `days`) VALUES
(1, '7', '7'),
(2, '22', '30'),
(3, '50', '90');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paylogs`
--
ALTER TABLE `paylogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predictions`
--
ALTER TABLE `predictions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoutbox`
--
ALTER TABLE `shoutbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;
--
-- AUTO_INCREMENT for table `paylogs`
--
ALTER TABLE `paylogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `predictions`
--
ALTER TABLE `predictions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shoutbox`
--
ALTER TABLE `shoutbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
