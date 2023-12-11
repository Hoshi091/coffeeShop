-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Po 11.Dec 2023, 14:50
-- Verzia serveru: 10.4.28-MariaDB
-- Verzia PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `coffeeshop_db`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `daily_menu`
--

CREATE TABLE `daily_menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `daily_menu`
--

INSERT INTO `daily_menu` (`id`, `menu_name`) VALUES
(1, 'Phasellus nisl arcu, venenatis ut venenatis a, aliquet at felis '),
(2, 'Nam quam nunc, blandit vel, luctus pulvinar.\r\n'),
(3, 'Tellus eget condimentum rhoncus.\r\n'),
(4, 'Donec vitae sapien ut libero ventenatis faucibus.\r\n'),
(5, 'Maecenas nec odio et ante tincidunt tempus.\r\n');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `drink`
--

CREATE TABLE `drink` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `drink_category_id` int(11) NOT NULL,
  `img_url` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `drink`
--

INSERT INTO `drink` (`id`, `name`, `description`, `price`, `drink_category_id`, `img_url`) VALUES
(1, 'latte 1', 'latte 1', 2.8, 3, 'https://www.acouplecooks.com/wp-content/uploads/2020/09/Latte-Art-067s.jpg'),
(2, 'Americano 1', 'americano 1', 1.5, 2, 'https://www.foodandwine.com/thmb/9JyfZPcxlV9ubEeuSznhO-M4q0w=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/Partners-Americano-FT-BLOG0523-b8e18cc340574cc9bed536cceeec7082.jpg'),
(3, 'Affogato1', 'affogato1', 2.2, 1, 'https://www.recipetineats.com/wp-content/uploads/2023/06/Affogato_0-SQ.jpg'),
(4, 'Mocha 1', 'mocha 1', 2.3, 4, 'https://www.spoonfulofflavor.com/wp-content/uploads/2021/11/mocha-latte-recipe.jpg'),
(5, 'latte 2', 'latte 2', 2.7, 3, 'https://hips.hearstapps.com/hmg-prod/images/hearst-truvia-c121887-edit-1633468112.jpg?crop=1xw:0.8441720860430215xh;center,top&resize=1200:*'),
(6, 'Americano 2', 'americano 2', 1.4, 2, 'https://www.acouplecooks.com/wp-content/uploads/2020/10/How-to-make-an-Americano-004.jpg');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `drink_category`
--

CREATE TABLE `drink_category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `drink_category`
--

INSERT INTO `drink_category` (`id`, `name`, `description`) VALUES
(1, 'Affogato', 'affogato'),
(2, 'Americano', 'americano'),
(3, 'Caffe latte', 'caffe latte'),
(4, 'Mocha', 'Mocha');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `page_name` varchar(45) NOT NULL,
  `page_url` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `menu`
--

INSERT INTO `menu` (`id`, `page_name`, `page_url`) VALUES
(1, 'Home', 'index.php'),
(2, 'Today\'s special', 'today-special.php'),
(3, 'Menu', 'menu.php'),
(4, 'Contact', 'contact.php');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `popular_items`
--

CREATE TABLE `popular_items` (
  `id` int(11) NOT NULL,
  `drink_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `popular_items`
--

INSERT INTO `popular_items` (`id`, `drink_id`) VALUES
(13, 3),
(14, 4),
(15, 6);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `daily_menu`
--
ALTER TABLE `daily_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_drink_drink_category_idx` (`drink_category_id`);

--
-- Indexy pre tabuľku `drink_category`
--
ALTER TABLE `drink_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `popular_items`
--
ALTER TABLE `popular_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_popular_items_drink1_idx` (`drink_id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `daily_menu`
--
ALTER TABLE `daily_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pre tabuľku `drink`
--
ALTER TABLE `drink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pre tabuľku `drink_category`
--
ALTER TABLE `drink_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pre tabuľku `popular_items`
--
ALTER TABLE `popular_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `drink`
--
ALTER TABLE `drink`
  ADD CONSTRAINT `fk_drink_drink_category` FOREIGN KEY (`drink_category_id`) REFERENCES `drink_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Obmedzenie pre tabuľku `popular_items`
--
ALTER TABLE `popular_items`
  ADD CONSTRAINT `fk_popular_items_drink1` FOREIGN KEY (`drink_id`) REFERENCES `drink` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
