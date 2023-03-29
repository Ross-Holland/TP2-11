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
--block 2 end--
--block 3--
CREATE TABLE `cart` (
  `product_id` varchar(255),
  `size` varchar(10)
);
CREATE TABLE `wishlist` (
  `product_id` varchar(255),
  `size` varchar (10)
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
  `size` varchar(10),
  `date` varchar(20),
  `order_processed` BOOLEAN
);
--block 4 end--
--insert products into database--
INSERT INTO `products` (`id`, `name`, `description`, `category`, `quantity`, `price`, `image`, `image1`, `image2`) VALUES
(4, 'Dr Martens', 'For that classic look, this boot features an all-black colourway with soft leather uppers, iconic yellow stitching, and a PVC AirWair sole.\r\n\r\n-Colour: black\r\n-2.8cm heel\r\n-Upper Material: Leather\r\n-Lining: Leather\r\n-Sole: Rubber', '1', 10, 160, 'blackboots.jpg', 'blackboots1.jpg', 'blackboots2.jpg'),
(8, 'Classic block heel', 'This wide fit heel is perfect for a night out, with an adjustable strap to fit you with absolute comfort. The high block heel fits perfectly with skinny jeans and various dress types. An open toe design provides any wearer with comfort and style. \r\n\r\n-Colour: Black \r\n-Heel height: 8.5cm \r\n-Pin-buckle fastening ', '2', 30, 29.99, 'blackblockheal.jpg', 'blackblockheal1.jpg', 'blackblockheal2.jpg'),
(9, 'Stilleto heels ', 'This flat soled heel provides the wearer with optimum comfort, combined with the pointed toe gives any wearer a sleek and stylish look. Suited for various dress types for a normal day as well as providing a formal business look. \r\n\r\n- Colour – black  \r\n- Heel height: 7.5cm \r\n- Mid point heel \r\n ', '2', 20, 32.99, 'stilettohealsblack.jpg', 'stilettohealsblack1.jpg', 'stilettohealsblack2.jpg'),
(10, 'Gold heel sandals', 'With the heels gold coloured, shine bright in any place these are worn. It is flashy and subtle, being the perfect shoe for any wearer. It is open toed providing an accent to whatever you choose to wear with this.\r\n\r\n-Colour: gold \r\n-Heel height: 10cm \r\n-High point heel \r\n-Adjustable strap  ', '2', 10, 19.99, 'goldheal.jpg', 'goldheal1.jpg', 'goldheal2.jpg'),
(11, 'Nike Metcon ', 'With a black and white colourway, these trainers provide a sleek look matching any outfit. They are tested for optimum running capabilities through the wide base which provides stability. A tough rubber outsole keeps the wearers feet gripped.\r\n \r\n- Colour: black and white \r\n- Material: textile & synthetic upper/synthetic sole \r\n- Textured overlays  \r\n- Breathable mesh ', '4', 15, 115, 'nikemetcon.jpg', 'nikemetcon1.jpg', 'nikemetcon2.jpg'),
(12, 'Adidas Originals', 'With a retro runner style, look sleek and stylish while using these running trainers to achieve higher speeds. These trainers are lightweight and breathable, which is helpful in running more comfortably. Includes plush padding around the ankles. \r\n\r\n- Colour – white tint \r\n- Locked in finish \r\n- Cushioned step ', '4', 5, 100, 'adidasoriginalsw.jpg', 'adidasoriginalsw1.jpg', 'adidasoriginalsw2.jpg'),
(13, 'Pink suede heel', 'Combined with a comfortable width and a stylish suede finish, you\'ll find yourself reaching for these pink heels countlessly.\r\n\r\n-Colour: pink\r\n-Suedette finish\r\n- Ankle-strap fastening\r\n', '2', 60, 24.99, 'pinksuedeheels.jpg', 'pinksuedeheels1.jpg', 'pinksuedeheels2.jpg'),
(14, 'Silver heel', 'Dress  up with these silver chunky toe heels perfect as a statement in your outfits.\r\n\r\n-Colour: silver\r\n-Strappy design \r\n-Open toe\r\n-Chunky sole\r\n-Block heel', '2', 55, 35.99, 'silverheel.jpg', 'silverheel1.jpg', 'silverheel2.jpg'),
(15, 'Platform heel', 'These black platform sandals are elevated by the sky-high heel and shiny patent finish. They look great with everything from dresses to jeans.\r\n\r\n-Colour: black\r\n-Patent finish\r\n-Rounded toe', '2', 70, 45.99, 'platformblackheel.jpg', 'platformblackheel1.jpg', 'platformblackheel2.jpg'),
(16, 'Strappy heel', 'These green strappy stilettos provide a bright complimentary shade and heavenly heel.\r\n\r\n-Colour: yellow/green\r\n-Leather-look finish\r\n-Pointed toe', '2', 35, 29.99, 'yellowstrappyheel.jpg', 'yellowstrappyheel1.jpg', 'yellowstrappyheel2.jpg'),
(17, 'Gold stiletto', 'A shining gold completion and out of this world heel makes these strappy stiletto shoes ideal for exceptional events.\r\n\r\n-Colour: gold\r\n-Pointed toe\r\n-Ankle-strap fastening', '2', 20, 42.99, 'goldstiletto.jpg', 'goldstiletto1.jpg', 'goldstiletto2.jpg'),
(18, 'Air Force 1', 'These Nike Air Force 1 trainers, which are hugely popular in hip hop, have a clean white leather upper that provides durable comfort.\r\n\r\n-Colour: white\r\n-Leather\r\n-Rubber sole', '4', 20, 100, 'airforce1.jpg', 'airforce11.jpg', 'airforce12.jpg'),
(19, 'Vans Old Skool', 'Stick to classic skate style with these Old Skool trainers from Vans. These beige low tops feature a durable textile and suede upper and a padded ankle collar for a soft fit.\r\n\r\n-Colour: beige/white\r\n-Canvas and Suede upper\r\n', '4', 70, 65, 'vans.jpg', 'vans1.jpg', 'vans2.jpg'),
(20, 'Nike Air Max 90', 'Pair the iconic Swoosh with these Nike Air Max 90 Leather Trainers providing a pop of colour to your everyday looks.\r\n\r\n-Colour: White/black/brown/pink/blue\r\n-Material: leather', '4', 40, 130, 'nikeairmax.jpg', 'nikeairmax1.jpg', 'nikeairmax2.jpg'),
(21, 'Yellow Dunk Low', 'Get into iconic style right off the court with these Nike Dunk Low shoes. These sneakers are cut from a durable leather upper for a soft feel and long-lasting wear.\r\n\r\n-Colour: yellow/grey/white\r\n-Material: leather\r\n-Yellow laces', '4', 20, 110, 'dunklow.jpg', 'dunklow1.jpg', 'dunklow2.jpg'),
(22, 'Adidas Superstar', 'Classic trainers ready to become a staple for your everyday looks.\r\n\r\n-Colour: white/blue\r\n-Material: leather', '4', 60, 90, 'adidassuperstar.jpg', 'adidassuperstar1.jpg', 'adidassuperstar2.jpg'),
(24, 'Suede western boots', 'With a suede upper and angled block heel, this shoe features a pointed toe and angled block heel. Choose from a variety of styles with this versatile western ankle boot!\r\n\r\n-Colour: tan/orange\r\n-Heel: 5cm\r\n-Fabric: suede\r\n', '1', 40, 34.99, 'suedeboot.jpg', 'suedeboot1.jpg', 'suedeboot2.jpg'),
(25, 'Croc block boots', 'Featuring a sturdy block heel and croc-effect leather, these boots will keep you comfortable all day long. Dress it up with midi skirts or tailored trousers for that polished look you\'re looking for every day.\r\n\r\n-Colour: Black\r\n-Fabric: Leather\r\n-Zip fastening\r\n', '1', 60, 49.99, 'crocboot.jpg', 'crocboot1.jpg', 'crocboot2.jpg'),
(26, 'Maroon boot', 'With their vivid colour, these ankle boots will inject a confident pop of colour into your favourite outfits.\r\n\r\n-Colour: red/maroon\r\n-Zip-side fastening\r\n-Square toe', '1', 50, 45.99, 'maroonboot.jpg', 'maroonboot1.jpg', 'maroonboot2.jpg'),
(27, 'Lace up boot', 'Add a practical touch to your casual wear with these boots. To keep your feet comfortable, these ankle-high boots feature low heels finished with lace-up details for optimal usability.\r\n\r\n-Colour: beige/black\r\n-Lace-up details\r\n-Platform boot\r\n', '1', 60, 59.99, 'laceboot.jpg', 'laceboot1.jpg', 'laceboot2.jpg'),
(28, 'Pink quilted shoes', 'An essential shoe style, these pink ballerina pumps feature a quilted leather-look finish and built-in comfort lining.\r\n\r\n-Colour: pink\r\n-Rounded toe\r\n-Bow detail', '3', 60, 17.99, 'pinkpump.jpg', 'pinkpump1.jpg', 'pinkpump2.jpg'),
(29, 'Gold bow pumps', 'These gold ballerina pumps will make your steps sparkle. The standard look is given a glamorous makeover with a metallic finish.\r\n\r\n-Colour: Gold\r\n-Round Toe\r\n-Details: Bow\r\n', '3', 30, 20.99, 'goldpumps.jpg', 'goldpumps1.jpg', 'goldpumps2.jpg'),
(30, 'Cross Strap Pumps', 'The chic and cute strappy design of these pumps makes them a smart choice for both formal and informal occasions.\r\n\r\n-Colour: black\r\n-Rounded toe\r\n-Elasticated straps', '3', 50, 20.99, 'crossstrappumps.jpg', 'crossstrappumps1.jpg', 'crossstrappumps2.jpg'),
(31, 'Silver Metallic pumps', 'Super-soft leather ballet flats with a metallic shine finish. Can be employed day or night.\r\n\r\n-Colour: silver\r\n-Bow detail\r\n-Metallic finish', '3', 45, 24.99, 'metallicpumps.jpg', 'metallicpumps1.jpg', 'metallicpumps2.jpg'),
(32, 'Pink Diamanté Pumps', 'These pink ballerina heels have gorgeous straps made of sparkling diamanté. Great for giving you a sense of confidence in your attire\r\n\r\n-Colour:pink\r\n-Pointed toe\r\n-Diamanté straps', '3', 60, 24.99, 'pinkdiamante.jpg', 'pinkdiamante1.jpg', 'pinkdiamante2.jpg'),
(33, 'Chunky sandals\r\n', 'Add a modern touch to your summer ensemble by choosing these leather sandals with wide straps. Gladiator style design fastens with ankle buckles. Thicker outsole provides extra height and comfort.\r\n\r\n-Colour: black\r\n-Leather-look finish\r\n-Thick strap\r\n', '5', 60, 35.55, 'chunkysandals.jpg', 'chunkysandals1.jpg', 'chunkysandals2.jpg'),
(34, 'Leopard Print Sliders', 'From the trendy leopard print  to the effortless slip-on design, these suede slides are a must-have.\r\n\r\n-Colour: brown/black\r\n-Leapard print\r\n-Slip on design\r\n', '5', 50, 29.99, 'leapordslides.jpg', 'leapordslides1.jpg', 'leapordslides2.jpg'),
(35, 'Pink crocs', 'For maximum comfort, these pink Crocs are made of Croslite, a smooth and long-lasting material. To keep you cool, they have pores that let air in.\r\n\r\n-Colour: pink\r\n-Synthetic Upper & Sole\r\n-Heel strap', '5', 70, 35.99, 'pinkcrocs.jpg', 'pinkcrocs1.jpg', 'pinkcrocs2.jpg'),
(36, 'Leather-Look Sandals', 'Emphasise your summer footwear with these flawless leather-look sandals. They have a timeless gladiator design in tan, gold accents, and a stylish buckle for a comfortable fit.\r\n\r\n-Colour: brown/tan\r\n-Buckle fastening\r\n-Gold details', '5', 45, 25.99, 'leathersandals.jpg', 'leathersandals1.jpg', 'leathersandals2.jpg'),
(37, 'Khaki sandals\r\n', 'Get ready for hot days in these chunky sandals. The upper is made of synthetic leather and has an open square toe along with black buckle straps\r\n\r\n-Colour: black/khaki\r\n-Platform\r\n-Strap fastening', '5', 60, 60.99, 'khakisandals.jpg', 'khakisandals1.jpg', 'khakisandals2.jpg'),
(38, '883 Police Mens Boots', 'Leather and Synthetic upper boots, combined with a Textile and Synthetic lining to create a comfortable yet reliabe boot for men. The laces are strong and durable and come with a 1 year guarantee.', 9, 0, 29.99, '883 Police Mnes Case Boots Black.jpg', '883 Police Mnes Case Boots Black 1.jpg','883 Police Mnes Case Boots Black 2.jpg'),
(39, 'Ben Sherman Mens Hugo Suede Chelsea Brown Boots', 'Suede Brown Chelsea boots designed for walking and comfort as well as allowing for a stylish appearence. They have a rubber sole and a heel pull for ease of use.', 9, 0, 24.99, 'Ben Sherman Mens Hugo Suede Chelsea Boots Brown.jpg', 'Ben Sherman Mens Hugo Suede Chelsea Boots Brown 1.jpg', 'Ben Sherman Mens Hugo Suede Chelsea Boots Brown 2.jpg'),
(40, 'Timberland Mens Field Trekker Mid Boots Black', 'Fully branded Timberland boots with ankle support. Designed for hiking in style. Comes with a soft textile lining and lace fastening ability.', 9, 0, 69.99, 'Timberland Mens Field Trekker Mid Boots Black.jpg', 'Timberland Mens Field Trekker Mid Boots Black 1.jpg', 'Timberland Mens Field Trekker Mid Boots Black 2.jpg'),
(41, 'Deakins Mens Oxford Boots Tan', 'Tan lace up Deakins with heel support designed for luxury and support.', 9, 0, 30.00, 'Deakins Mens Oxford Boots Tan.jpg', 'Deakins Mens Oxford Boots Tan 1.jpg', 'Deakins Mens Oxford Boots Tan 2.jpg'),
(42, 'Caterpillar Mens Stickshift Work Boots Black', 'Caterpillar Mens boots designed for luxury and work. They offer ankle support and comforting insoles for design and experience.', 9, 0, 45.99, 'Caterpillar Mens Stickshift Work Boots Black.jpg', 'Caterpillar Mens Stickshift Work Boots Black 1.jpg', 'Caterpillar Mens Stickshift Work Boots Black 2.jpg'),
(43, 'Nike Court Visions', 'Nike Trainers designed to bring back that retro look, with increased height on the ankle support, providing comfort and security.', '10', 0, 59.99, 'Nike Court Vision.jpg', 'Nike Court Vision 1.jpg', 'Nike Court Vision 2.jpg'),
(44, 'Reebok Exofit', 'Black Leather Reebok trainers. Inspired by the retro basketball look designed to promote style and comfort.', '10', 0, 45.99, 'Reebok Exofit.jpg', 'Reebok Exofit 1.jpg', 'Reebok Exofit 2.jpg'),
(45, 'Slazenger Tower', 'Tall, supportive trainers by Slazenger. Designed for comfort and style.', '10', 0, 39.99, 'Slazenger Tower.jpg', 'Slazenger Tower 1.jpg', 'Slazenger Tower 2.jpg'),
(46, 'Diesel Leroji', 'Talk, Black trainers designed by Diesel for you', '10', 0, 139.99, 'Diesel Leroji.jpg', 'Diesel Leroji 1.jpg', 'Diesel Leroji 2.jpg');


INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Womens-boots'),
(2, 'Womens-heels'),
(3, 'Womens-flats'),
(4, 'Womens/mens-trainers'),
(5, 'Womens-slippers');

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
