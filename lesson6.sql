-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 24 2022 г., 20:40
-- Версия сервера: 5.6.51
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lesson6`
--

-- --------------------------------------------------------

--
-- Структура таблицы `kids`
--

CREATE TABLE `kids` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `photo_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `kids`
--

INSERT INTO `kids` (`id`, `name`, `price`, `photo_name`) VALUES
(1, 'Classic hard dress', 219, 'product_k1.jpg'),
(2, 'Soft pastel dress', 279, 'product_k2.jpg'),
(3, 'Knitted dress', 199, 'product_k3.jpg'),
(4, 'Pixels T-shirt', 59, 'product_k4.jpg'),
(5, 'Delicate shirt', 79, 'product_k5.jpg'),
(6, 'Striped shirt', 119, 'product_k6.jpg'),
(7, 'Sea waves jacket', 169, 'product_k7.jpg'),
(8, 'Sky dress', 299, 'product_k8.jpg'),
(9, 'Royal coat', 319, 'product_k9.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `men`
--

CREATE TABLE `men` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `photo_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `men`
--

INSERT INTO `men` (`id`, `name`, `price`, `photo_name`) VALUES
(1, 'Quilted jacket', 209, 'product_m1.jpg'),
(2, 'Cherry style shirt', 99, 'product_m2.jpg'),
(3, 'Hoodie one man', 149, 'product_m3.jpg'),
(4, 'T-shirt enzymes', 89, 'product_m4.jpg'),
(5, 'Simple T-shirt man', 49, 'product_m5.jpg'),
(6, 'Sky cap', 79, 'product_m6.jpg'),
(7, 'Office shirt', 99, 'product_m7.jpg'),
(8, 'Bad guy jacket', 499, 'product_m8.jpg'),
(9, 'Military shirt', 129, 'product_m9.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `date`) VALUES
(1, 2, 4, '2021-12-19 21:35:36'),
(2, 2, 4, '2021-12-19 21:40:25'),
(3, 2, 1, '2021-12-19 21:41:55'),
(4, 2, 1, '2021-12-19 21:47:59'),
(5, 2, 1, '2021-12-19 21:51:04'),
(6, 2, 1, '2021-12-19 21:55:40'),
(7, 2, 1, '2021-12-19 21:58:07'),
(8, 2, 1, '2021-12-19 21:58:29'),
(9, 2, 1, '2021-12-19 22:03:09'),
(10, 2, 1, '2021-12-19 22:04:13'),
(11, 2, 1, '2021-12-19 22:04:59'),
(12, 2, 1, '2022-01-05 15:30:34'),
(13, 2, 1, '2022-01-09 15:32:09'),
(14, 2, 1, '2022-01-09 17:32:08'),
(15, 2, 1, '2022-01-09 17:32:52'),
(16, 2, 1, '2022-01-09 17:36:42'),
(17, 2, 1, '2022-01-09 17:37:33'),
(18, 2, 1, '2022-01-09 17:38:09'),
(19, 2, 1, '2022-01-09 18:28:14'),
(20, 2, 1, '2022-01-09 18:29:34'),
(21, 2, 1, '2022-01-09 18:37:10'),
(22, 2, 1, '2022-01-09 18:38:58'),
(23, 2, 1, '2022-01-09 19:09:24'),
(24, 2, 1, '2022-01-09 19:48:04'),
(25, 2, 1, '2022-01-09 19:50:05'),
(26, 2, 1, '2022-01-09 19:54:31'),
(27, 2, 1, '2022-01-09 20:10:19'),
(28, 2, 1, '2022-01-09 20:11:02'),
(29, 3, 1, '2022-01-11 19:04:24'),
(30, 3, 1, '2022-01-11 19:05:49'),
(31, 3, 1, '2022-01-11 19:07:05'),
(32, 3, 1, '2022-01-11 19:07:54'),
(33, 7, 1, '2022-01-24 14:04:51');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `photo_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `city`, `photo_name`, `date`) VALUES
(1, 'Ирина', 'Москва', '288905-Deman1608.jpg', '2021-09-10 20:31:17'),
(2, 'Ольга', 'Санкт-Петербург', 'image_561004131538308381912.jpg', '2021-10-16 17:05:15'),
(3, 'Кристина', 'Уфа', 'me.jpg', '2021-10-26 10:15:02'),
(4, 'Анна', 'Новосибирск', 'tart.jpg', '2021-11-05 20:31:50'),
(5, 'Игорь', 'Хабаровск', 'scale_1200.jpg', '2021-12-09 11:55:01'),
(6, 'Роман', 'Москва', '2541621696.jpg', '2021-12-15 20:58:20'),
(7, 'Ульяна', 'Москва', 'girl-3023853_1280.jpg', '2021-12-16 23:06:20'),
(8, 'Павел', 'Москва', '61eeda1aec24d.jpg', '2022-01-24 19:55:54'),
(9, 'Татьяна', 'Краснодар', '61eedc178af80.jpg', '2022-01-24 20:04:23');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gend` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passw` varchar(2000) NOT NULL,
  `user_photo` varchar(200) NOT NULL,
  `date_reg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `second_name`, `age`, `phone`, `gend`, `email`, `passw`, `user_photo`, `date_reg`) VALUES
(1, 'admin', 'root', 99, '+74950002020', 'm', 'root@root.ru', '6fbhg7BUU&vvys6g63a9f0ea7bb98050796b649e85481845BbJb787yHH7h&uh7uyYh77hbkkdndhgd', 'test.jpg', '2021-12-16 22:53:17'),
(2, 'Alex', 'Brin', 33, '+13198520202', 'm', 'brin@gmail.com', '6fbhg7BUU&vvys6g25f9e794323b453885f5181f1b624d0bBbJb787yHH7h&uh7uyYh77hbkkdndhgd', '61ed7a7019f88.jpg', '2021-12-16 22:58:26'),
(3, 'Вячеслав', 'Артеменок', 31, '89220425817', 'm', 'iart2000@mail.ru', '6fbhg7BUU&vvys6g25f9e794323b453885f5181f1b624d0bBbJb787yHH7h&uh7uyYh77hbkkdndhgd', 'unnamed.jpg', '2022-01-10 18:27:25'),
(4, 'Milana', 'Herris', 23, '+19992580303', 'f', 'vook3333@mail.ru', '6fbhg7BUU&vvys6g25f9e794323b453885f5181f1b624d0bBbJb787yHH7h&uh7uyYh77hbkkdndhgd', 'ava-steam-anime-tyan-19.jpg', '2022-01-18 23:21:22'),
(5, 'Иван', 'Иванов', 28, '89990005252', 'm', 'ivanov777@mail.ru', '25f9e794323b453885f5181f1b624d0b', 'test.jpg', '2022-01-18 23:21:22'),
(6, 'Роман', 'Петров', 18, '84950253344', 'm', 'roma888@mail.ru', '25f9e794323b453885f5181f1b624d0b', 'e965397f6bf559cc9c45e028f5af3ef2.jpeg', '2022-01-18 23:27:04'),
(7, 'John', 'Dump', 39, '+18889993232', 'm', 'dudu@gmail.com', '6fbhg7BUU&vvys6g25f9e794323b453885f5181f1b624d0bBbJb787yHH7h&uh7uyYh77hbkkdndhgd', 'avatar-youtube-10.jpg', '2022-01-18 23:46:09'),
(8, 'Don', 'Pedro', 88, '+13334440505', 'm', 'don777@mail.ru', '6fbhg7BUU&vvys6g25f9e794323b453885f5181f1b624d0bBbJb787yHH7h&uh7uyYh77hbkkdndhgd', 'test.jpg', '2022-01-19 15:41:15'),
(9, 'Nick', 'Rolf', 25, '+14528520202', 'm', 'rolf555@gmail.com', '6fbhg7BUU&vvys6g25f9e794323b453885f5181f1b624d0bBbJb787yHH7h&uh7uyYh77hbkkdndhgd', 'unnamed (1).jpg', '2022-01-19 17:44:49'),
(10, 'Anna', 'Teddis', 55, '+15556662525', 'f', 'teddanna@gmail.com', '6fbhg7BUU&vvys6g25f9e794323b453885f5181f1b624d0bBbJb787yHH7h&uh7uyYh77hbkkdndhgd', 'test.jpg', '2022-01-19 17:47:16'),
(11, 'Bobo', 'Terris', 22, '+15556668989', 'f', 'bobodan222@gmail.com', '6fbhg7BUU&vvys6g25f9e794323b453885f5181f1b624d0bBbJb787yHH7h&uh7uyYh77hbkkdndhgd', 'unnamed (1).jpg', '2022-01-21 21:22:51'),
(12, 'Оля', 'Мишина', 18, '+79520423232', 'f', 'mishka3000@mail.ru', '6fbhg7BUU&vvys6g25f9e794323b453885f5181f1b624d0bBbJb787yHH7h&uh7uyYh77hbkkdndhgd', '3cee5d3d1dfc90a89c0092e2b656c16f.jpg', '2022-01-22 00:02:03'),
(13, 'Kim', 'Li', 25, '+15558886677', 'm', 'kim5000@gmail.com', '6fbhg7BUU&vvys6g25f9e794323b453885f5181f1b624d0bBbJb787yHH7h&uh7uyYh77hbkkdndhgd', 'test.jpg', '2022-01-23 19:11:22');

-- --------------------------------------------------------

--
-- Структура таблицы `women`
--

CREATE TABLE `women` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `photo_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `women`
--

INSERT INTO `women` (`id`, `name`, `price`, `photo_name`) VALUES
(1, 'Simple T-shirt', 69, 'product_w1.jpg'),
(2, 'Sea suit jacket', 349, 'product_w2.jpg'),
(3, 'Nature shirt', 129, 'product_w3.jpg'),
(4, 'Lily shirt', 179, 'product_w4.jpg'),
(5, 'Classic suit', 379, 'product_w5.jpg'),
(6, 'Amazing shirt', 199, 'product_w6.jpg'),
(7, 'Silk pajamas', 289, 'product_w7.jpg'),
(8, 'Sunny shirt', 239, 'product_w8.jpg'),
(9, 'Challenge T-shirt', 139, 'product_w9.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `kids`
--
ALTER TABLE `kids`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `men`
--
ALTER TABLE `men`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `women`
--
ALTER TABLE `women`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `kids`
--
ALTER TABLE `kids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `men`
--
ALTER TABLE `men`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `women`
--
ALTER TABLE `women`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
