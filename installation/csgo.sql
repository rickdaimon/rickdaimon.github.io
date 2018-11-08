-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 
-- Версия на сървъра: 5.6.31
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csgoroulette`
--

-- --------------------------------------------------------

--
-- Структура на таблица `bets`
--

CREATE TABLE IF NOT EXISTS `bets` (
  `id` int(11) NOT NULL,
  `user` varchar(17) NOT NULL,
  `collect` int(11) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL,
  `lower` int(11) NOT NULL,
  `upper` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `bots`
--

CREATE TABLE IF NOT EXISTS `bots` (
  `id` int(11) NOT NULL,
  `online` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `steamid` varchar(17) NOT NULL,
  `shared_secret` varchar(28) NOT NULL,
  `identity_secret` varchar(32) NOT NULL,
  `accountName` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `steamguard` varchar(64) NOT NULL,
  `email_login` varchar(64) NOT NULL,
  `email_password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `codes`
--

CREATE TABLE IF NOT EXISTS `codes` (
  `id` int(11) NOT NULL,
  `code` varchar(16) NOT NULL,
  `user` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура на таблица `duels`
--

CREATE TABLE IF NOT EXISTS `duels` (
  `id` int(11) NOT NULL,
  `game_id` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `creator` varchar(20) NOT NULL,
  `opponent` varchar(20) NOT NULL,
  `hash` varchar(250) NOT NULL,
  `secret` varchar(250) NOT NULL,
  `points` int(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура на таблица `hash`
--

CREATE TABLE IF NOT EXISTS `hash` (
  `id` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `hash` varchar(256) NOT NULL,
  `no_hash` varchar(256) NOT NULL,
  `fake` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура на таблица `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `trade` bigint(20) NOT NULL,
  `market_hash_name` varchar(512) NOT NULL,
  `status` int(11) NOT NULL,
  `img` text NOT NULL,
  `botid` int(11) NOT NULL,
  `time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Структура на таблица `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `ticket` int(11) NOT NULL,
  `message` text NOT NULL,
  `user` varchar(17) NOT NULL,
  `time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `rolls`
--

CREATE TABLE IF NOT EXISTS `rolls` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `hash` varchar(256) NOT NULL,
  `time` bigint(20) NOT NULL,
  `team_1` int(11) NOT NULL DEFAULT '5',
  `team_2` int(11) NOT NULL DEFAULT '12'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `rolls`
--

INSERT INTO `rolls` (`id`, `roll`, `hash`, `time`, `team_1`, `team_2`) VALUES
(1, 0, '0', 0, 5, 12);
-- --------------------------------------------------------

--
-- Структура на таблица `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `sitename` varchar(250) NOT NULL,
  `min` int(250) NOT NULL,
  `ip` varchar(250) NOT NULL,
  `referal` int(250) NOT NULL,
  `steamapi` varchar(250) NOT NULL,
  `googleapisecret` varchar(255) NOT NULL,
  `googleapisite` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `settings`
--

INSERT INTO `settings` (`id`, `sitename`, `min`, `ip`, `referal`, `steamapi`, `googleapisecret`, `googleapisite`) VALUES
(1, 'SITE NAME', 25, 'IP ADRES', 150, 'STEAM API', 'GOOGLE API SECRET', 'GOOGLE API SITE');

-- --------------------------------------------------------

--
-- Структура на таблица `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `time` bigint(20) NOT NULL,
  `user` varchar(17) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура на таблица `trades`
--

CREATE TABLE IF NOT EXISTS `trades` (
  `id` bigint(11) NOT NULL,
  `bot_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user` varchar(17) NOT NULL,
  `summa` int(16) NOT NULL,
  `code` varchar(16) NOT NULL,
  `time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `transfers`
--

CREATE TABLE IF NOT EXISTS `transfers` (
  `id` int(11) NOT NULL,
  `from1` varchar(17) NOT NULL,
  `to1` varchar(17) NOT NULL,
  `amount` int(11) NOT NULL,
  `note` varchar(32) NOT NULL,
  `time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `steamid` varchar(17) NOT NULL,
  `mute` bigint(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `referral` varchar(17) NOT NULL DEFAULT '0',
  `rank` varchar(16) DEFAULT '0' COMMENT '1mod, -1streamer, -2veteran, -3pro, -4youtuber, -5coder',
  `balance` int(11) NOT NULL,
  `available` int(11) NOT NULL DEFAULT '0',
  `avatar` text NOT NULL,
  `hash` varchar(32) NOT NULL,
  `tradeurl` varchar(250) NOT NULL,
  `ban` int(255) NOT NULL,
  `admin` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bets`
--
ALTER TABLE `bets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bots`
--
ALTER TABLE `bots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duels`
--
ALTER TABLE `duels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hash`
--
ALTER TABLE `hash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rolls`
--
ALTER TABLE `rolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trades`
--
ALTER TABLE `trades`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bets`
--
ALTER TABLE `bets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bots`
--
ALTER TABLE `bots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `duels`
--
ALTER TABLE `duels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hash`
--
ALTER TABLE `hash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rolls`
--
ALTER TABLE `rolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
