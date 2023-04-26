-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Kwi 2023, 10:12
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `memy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `value`) VALUES
(5, 6, 1, 1),
(6, 5, 1, -1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `filename` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `userId` int(255) NOT NULL,
  `removed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `post`
--

INSERT INTO `post` (`id`, `timestamp`, `filename`, `ip`, `title`, `userId`, `removed`) VALUES
(5, '2023-04-19 10:47:14', 'img/63f3901fa8bff8ccfbc7e25ac1068e05c54832ebbe064ac2cce0d953e52a5845.webp', '::1', 'kox', 1, 1),
(6, '2023-04-19 10:56:23', 'img/9325e47c7553cedb64bc377bb3b3d85e8273dc5074f02d4901fa748f9c0bb53b.webp', '::1', 'Kox', 1, 1),
(7, '2023-04-19 11:18:00', 'img/52b3c740be3a4777b2ea2fd4a5ff27eec8e5e00a964a69931a910eeb74fe32aa.webp', '::1', 'es', 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'es@es', '$argon2i$v=19$m=65536,t=4,p=1$MUFVY3ViTjdyVnpINlBubA$rL1IhfP1M4XiHqomKrEdDTzFCt8/f+3/l5rjzjor/gg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
