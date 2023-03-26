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
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
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
ALTER TABLE `orders` 
  ADD `date` VARCHAR(20) NOT NULL AFTER `product_image`;
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
(4, 'Dr Martens', 'Durable, classic boots.\r\n\r\n- Colour: black\r\n- 2.8cm heel\r\n- Upper Material: Leather\r\n- Lining: Leather\r\n- Sole: Rubber', 1, 10, 160, 'blackboots.jpg', 'blackboots1.jpg', 'blackboots2.jpg'),
(8, 'Classic block heel', 'This wide fit heel is perfect for a night out, with an adjustable strap to fit you with absolute comfort. The high block heel fits perfectly with skinny jeans and various dress types. An open toe design provides any wearer with comfort and style. \r\nColour: Black \r\nHeel height: 8.5cm \r\nPin-buckle fastening ', 2, 30, 29.99, 'blackblockheal.jpg', 'blackblockheal1.jpg', 'blackblockheal2.jpg'),
(9, 'Stilleto heels ', 'This flat soled heel provides the wearer with optimum comfort, combined with the pointed toe gives any wearer a sleek and stylish look. Suited for various dress types for a normal day as well as providing a formal business look. \r\n\r\n- Colour – black  \r\n- Heel height: 7.5cm \r\n- Mid point heel \r\n ', 2, 20, 32.99, 'stilettohealsblack.jpg', 'stilettohealsblack1.jpg', 'stilettohealsblack2.jpg'),
(10, 'Gold heel sandals', 'With the heels gold coloured, shine bright in any place these are worn. It is flashy and subtle, being the perfect shoe for any wearer. It is open toed providing an accent to whatever you choose to wear with this.\r\nColour: gold \r\nHeel height: 10cm \r\nHigh point heel \r\nAdjustable strap  ', 2, 10, 19.99, 'goldheal.jpg', 'goldheal1.jpg', 'goldheal2.jpg'),
(11, 'Nike Metcon ', 'With a black and white colourway, these trainers provide a sleek look matching any outfit. They are tested for optimum running capabilities through the wide base which provides stability. A tough rubber outsole keeps the wearers feet gripped.\r\n \r\n- Colour: black and white \r\n- Material: textile & synthetic upper/synthetic sole \r\n- Textured overlays  \r\n- Breathable mesh ', 4, 15, 115, 'nikemetcon.jpg', 'nikemetcon1.jpg', 'nikemetcon2.jpg'),
(12, 'Adidas Originals', 'With a retro runner style, look sleek and stylish while using these running trainers to achieve higher speeds. These trainers are lightweight and breathable, which is helpful in running more comfortably. Includes plush padding around the ankles. \r\n\r\n- Colour – white tint \r\n- Locked in finish \r\n- Cushioned step ', 4, 5, 100, 'adidasoriginalsw.jpg', 'adidasoriginalsw1.jpg', 'adidasoriginalsw2.jpg'),
(13, 'Pink suede heel', '', 2, 0, 24.99, 'pinksuedeheels.jpg', 'pinksuedeheels1.jpg', 'pinksuedeheels2.jpg'),
(14, 'Silver heel', '', 2, 0, 35.99, 'silverheel.jpg', 'silverheel1.jpg', 'silverheel2.jpg'),
(15, 'Platform heel', '', 2, 0, 45.99, 'platformblackheel.jpg', 'platformblackheel1.jpg', 'platformblackheel2.jpg'),
(16, 'Strappy heel', '', 2, 0, 29.99, 'yellowstrappyheel.jpg', 'yellowstrappyheel1.jpg', 'yellowstrappyheel2.jpg'),
(17, 'Gold stiletto', '', 2, 0, 42.99, 'goldstiletto.jpg', 'goldstiletto1.jpg', 'goldstiletto2.jpg'),
(18, 'Air Force 1', '', 4, 0, 100, 'airforce1.jpg', 'airforce11.jpg', 'airforce12.jpg'),
(19, 'Vans Old Skool', '', 4, 0, 65, 'vans.jpg', 'vans1.jpg', 'vans2.jpg'),
(20, 'Nike Air Max 90', '', 4, 0, 130, 'nikeairmax.jpg', 'nikeairmax1.jpg', 'nikeairmax2.jpg'),
(21, 'Yellow Dunk Low', '', 4, 0, 110, 'dunklow.jpg', 'dunklow1.jpg', 'dunklow2.jpg'),
(22, 'Adidas Superstar', '', 4, 0, 90, 'adidassuperstar.jpg', 'adidassuperstar1.jpg', 'adidassuperstar2.jpg'),
(23, 'Reebok Classic ', '', 4, 0, 60, 'reebok.jpg', 'reebok1.jpg', 'reebok2.jpg'),
(24, 'Suede western boots', '', 1, 0, 34.99, 'suedeboot.jpg', 'suedeboot1.jpg', 'suedeboot2.jpg'),
(25, 'Croc block boots', '', 1, 0, 29.99, 'crocboot.jpg', 'crocboot1.jpg', 'crocboot2.jpg'),
(26, 'Maroon boot', '', 1, 0, 45.99, 'maroonboot.jpg', 'maroonboot1.jpg', 'maroonboot2.jpg'),
(27, 'Lace up boot', '', 1, 0, 55, 'laceboot.jpg', 'laceboot1.jpg', 'laceboot2.jpg'),
(28, 'Pink quilted shoes', '', 3, 0, 17.99, 'pinkpump.jpg', 'pinkpump1.jpg', 'pinkpump2.jpg'),
(29, 'Gold bow pumps', '', 3, 0, 20.99, 'goldpumps.jpg', 'goldpumps1.jpg', 'goldpumps2.jpg'),
(30, 'Cross Strap Pumps', '', 3, 0, 20.99, 'crossstrappumps.jpg', 'crossstrappumps1.jpg', 'crossstrappumps2.jpg'),
(31, 'Silver Metallic pumps', '', 3, 0, 24.99, 'metallicpumps.jpg', 'metallicpumps1.jpg', 'metallicpumps2.jpg'),
(32, 'Pink Diamanté Pumps', '', 3, 0, 24.99, 'pinkdiamante.jpg', 'pinkdiamante1.jpg', 'pinkdiamante2.jpg'),
(33, 'Chunky sandals\r\n', '', 5, 0, 35.55, 'chunkysandals.jpg', 'chunkysandals1.jpg', 'chunkysandals2.jpg'),
(34, 'Leopard Print Sliders', '', 5, 0, 29.99, 'leapordslides.jpg', 'leapordslides1.jpg', 'leapordslides2.jpg'),
(35, 'Pink crocs', '', 5, 0, 35.99, 'pinkcrocs.jpg', 'pinkcrocs1.jpg', 'pinkcrocs2.jpg'),
(36, 'Leather-Look Sandals', '', 5, 0, 25.99, 'leathersandals.jpg', 'leathersandals1.jpg', 'leathersandals2.jpg'),
(37, 'Khaki sandals\r\n', '', 5, 0, 60.99, 'khakisandals.jpg', 'khakisandals1.jpg', 'khakisandals2.jpg');



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
