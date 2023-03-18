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
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(500) NOT NULL,
  `image2` varchar(500) NOT NULL
  
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
INSERT INTO `products` (`id`, `name`, `description`, `category`, `quantity`, `price`, `image`, `image1`, `image2`) VALUES
(4, 'Dr. Martens', 'Durable, classic boots.\r\n\r\n- Colour: black\r\n- 2.8cm heel\r\n- Upper Material: Leather\r\n- Lining: Leather\r\n- Sole: Rubber', 1, 10, 160, 'blackboots.jpg', 'blackboots1.jpg', 'blackboots2.jpg'),
(5, 'Fluffy slippers', 'Casual', 5, 20, 11, 'fluffyslippers.jpg', '', ''),
(8, 'Classic block heal', 'This wide fit heel is perfect for a night out, with an adjustable strap to fit you with absolute comfort. The high block heel fits perfectly with skinny jeans and various dress types. An open toe design provides any wearer with comfort and style. \r\nColour: Black \r\nHeel height: 8.5cm \r\nPin-buckle fastening ', 2, 30, 29.99, 'blackblockheal.jpg', 'blackblockheal1.jpg', 'blackblockheal2.jpg'),
(9, 'Stilleto heels ', 'This flat soled heel provides the wearer with optimum comfort, combined with the pointed toe gives any wearer a sleek and stylish look. Suited for various dress types for a normal day as well as providing a formal business look. \r\n\r\n- Colour – black  \r\n- Heel height: 7.5cm \r\n- Mid point heel \r\n ', 2, 20, 32.99, 'stilettohealsblack.jpg', 'stilettohealsblack1.jpg', 'stilettohealsblack2.jpg'),
(10, 'Gold heel sandals', 'With the heels gold coloured, shine bright in any place these are worn. It is flashy and subtle, being the perfect shoe for any wearer. It is open toed providing an accent to whatever you choose to wear with this.\r\nColour: gold \r\nHeel height: 10cm \r\nHigh point heel \r\nAdjustable strap  ', 2, 10, 19.99, 'goldheal.jpg', 'goldheal1.jpg', 'goldheal2.jpg'),
(11, 'Nike Metcon ', 'With a black and white colourway, these trainers provide a sleek look matching any outfit. They are tested for optimum running capabilities through the wide base which provides stability. A tough rubber outsole keeps the wearers feet gripped.\r\n \r\n- Colour: black and white \r\n- Material: textile & synthetic upper/synthetic sole \r\n- Textured overlays  \r\n- Breathable mesh ', 4, 15, 115, 'nikemetcon.jpg', 'nikemetcon1.jpg', 'nikemetcon2.jpg'),
(12, 'Adidas Originals', 'With a retro runner style, look sleek and stylish while using these running trainers to achieve higher speeds. These trainers are lightweight and breathable, which is helpful in running more comfortably. Includes plush padding around the ankles. \r\n\r\n- Colour – white tint \r\n- Locked in finish \r\n- Cushioned step ', 4, 5, 100, 'adidasoriginalsw.jpg', 'adidasoriginalsw1.jpg', 'adidasoriginalsw2.jpg');



---(test for java app thing)---- 
--inserts tables--- 
CREATE TABLE inventory (
    item_name VARCHAR(255) PRIMARY KEY,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    in_stock BOOLEAN NOT NULL
);

CREATE TABLE incoming_orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    item_name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    order_date DATE NOT NULL,
    received BOOLEAN NOT NULL
);

CREATE TABLE outgoing_orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    item_name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    order_date DATE NOT NULL,
    shipped BOOLEAN NOT NULL
);
