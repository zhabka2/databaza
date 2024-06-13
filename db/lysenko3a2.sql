-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Št 30.Máj 2024, 08:41
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `lysenko3a2`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `phone_statistics`
--

CREATE TABLE `phone_statistics` (
  `id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `sales` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `phone_statistics`
--

INSERT INTO `phone_statistics` (`id`, `brand`, `model`, `sales`, `created_at`) VALUES
(1, 'Apple', 'iPhone 12', 5000, '2024-05-27 08:29:11'),
(2, 'Samsung', 'Galaxy S21', 4500, '2024-05-27 08:29:11'),
(3, 'Google', 'Pixel 5', 2000, '2024-05-27 08:29:11'),
(4, 'OnePlus', 'OnePlus 8T', 3000, '2024-05-27 08:29:11'),
(5, 'Sony', 'Xperia 5 II', 1500, '2024-05-27 08:29:11'),
(6, 'Nokia', '8.3 5G', 1200, '2024-05-27 08:29:11'),
(7, 'Xiaomi', 'Mi 11', 4000, '2024-05-27 08:29:11'),
(8, 'Oppo', 'Reno5 Pro', 2500, '2024-05-27 08:29:11'),
(9, 'Huawei', 'P40 Pro', 3500, '2024-05-27 08:29:11'),
(10, 'LG', 'Wing', 1000, '2024-05-27 08:29:11');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Denys222', '$2y$10$226ORP/XE0tLISscw7rALeBQF9crVkiKACFs6E4yWcV43c7bRcJEy', '2024-05-27 08:16:02'),
(5, 'Admin', '$2y$10$o6ltmBXMAyZ/U9DIQPzKM.n/QUYXRY3ux2Ly6NfTmgrvpLxCKONCi', '2024-05-30 06:15:54');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `phone_statistics`
--
ALTER TABLE `phone_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `phone_statistics`
--
ALTER TABLE `phone_statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
