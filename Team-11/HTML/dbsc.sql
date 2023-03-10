-- input the sql into myphpadmin in blocks and it should work--
--block 1--
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `sc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sc`;


CREATE TABLE `user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_orders` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL

  
  
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci; 

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int (5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci; 


CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci; 
--block 1 end--
--block 2 make sure your in the database first before you execute the sql or itll go retarded--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY (`user_email`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

ALTER TABLE `user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
--block 2 end--
--block 3--
CREATE TABLE `cart` (
  `product_id` varchar(255)
);
CREATE TABLE `wishlist` (
  `product_id` varchar(255)
);
CREATE TABLE `viewproduct` (
  `id` varchar(255)
);
--block 3 end--
--block 4--
CREATE TABLE `orders` (
  `user_id` int(10),
  `product_id` int(10),
  `product_name` varchar(500),
  `product_description` varchar(500),
  `product_price` varchar(500),
  `product_image` varchar(500),
  `order_processed` BOOLEAN
);
--block 4 end--
--insert products into database--
INSERT INTO `products` (`id`, `name`, `description`, `category`, `quantity`, `price`, `image`) VALUES
(2, 'Black heal', 'Elegant strap', 2, 30, 20, 'blackheal.jpg'),
(3, 'Red heal', 'Strap', 2, 20, 20, 'redheal.jpg'),
(4, 'Black boots', 'Everyday boots', 1, 10, 26, 'blackboots.jpg'),
(5, 'Fluffy slippers', 'Casual', 5, 20, 11, 'fluffyslippers.jpg'),
(7, 'Black nike trainers', '', 4, 0, 70.99, 'niketrainers.jpg');
