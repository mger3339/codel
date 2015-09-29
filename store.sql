/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : store

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2015-09-29 17:54:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'mher', '123123');

-- ----------------------------
-- Table structure for areas
-- ----------------------------
DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of areas
-- ----------------------------
INSERT INTO `areas` VALUES ('4', 'France');
INSERT INTO `areas` VALUES ('6', 'Italy');
INSERT INTO `areas` VALUES ('8', 'China');
INSERT INTO `areas` VALUES ('9', 'Russia');
INSERT INTO `areas` VALUES ('19', 'Usa');
INSERT INTO `areas` VALUES ('20', 'Armenia');
INSERT INTO `areas` VALUES ('21', 'Germany');
INSERT INTO `areas` VALUES ('23', 'Canada');
INSERT INTO `areas` VALUES ('39', 'Sweden');

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES ('153', '16', '2', '17');
INSERT INTO `cart` VALUES ('154', '14', '1', '14');
INSERT INTO `cart` VALUES ('155', '1', '1', '14');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('3', 'Tools');
INSERT INTO `category` VALUES ('5', 'Watches');
INSERT INTO `category` VALUES ('7', 'Computers');
INSERT INTO `category` VALUES ('8', 'Cars');
INSERT INTO `category` VALUES ('13', 'Phone');
INSERT INTO `category` VALUES ('14', 'Material');

-- ----------------------------
-- Table structure for coordinates
-- ----------------------------
DROP TABLE IF EXISTS `coordinates`;
CREATE TABLE `coordinates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coordinates
-- ----------------------------
INSERT INTO `coordinates` VALUES ('1', '40.184378', '44.515669', 'Armenia', '20');
INSERT INTO `coordinates` VALUES ('2', '39.896226', '116.256010', 'China', '8');
INSERT INTO `coordinates` VALUES ('3', '38.888928', '-77.013193', 'Usa', '19');
INSERT INTO `coordinates` VALUES ('4', '55.719184', '37.635633', 'Russia', '9');
INSERT INTO `coordinates` VALUES ('5', '48.868006', '2.349463', 'France', '4');
INSERT INTO `coordinates` VALUES ('6', '41.901895', '12.508875', 'Italy', '6');
INSERT INTO `coordinates` VALUES ('7', '52.46939684', '13.41430664', 'Germany', '21');
INSERT INTO `coordinates` VALUES ('8', '45.46013064', '-75.71777344', 'Canada', '23');
INSERT INTO `coordinates` VALUES ('24', '45.46013064', '-75.71777344', 'Sweden', '39');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `shipping` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', 'samsung galaxy s4 mini', 'sdfsdfsdfsdfsdfsdfsdf\'lsd;lfksdfk;sldf;lsd', '12000', 'samsung21.png', 'France', 'Tools', '16', '1', '17', '0');
INSERT INTO `orders` VALUES ('2', 'Notebook', 'asdasdsadsadasdasdsad', '12333243', '13009782481.jpg', 'China', 'Watches', '15', '1', '17', '0');
INSERT INTO `orders` VALUES ('3', 'samsung', 'dsdsadasdasdasdasdasdasdsadasdsa', '500', 'samsung1111211.png', 'France', 'Tools', '14', '1', '17', '0');
INSERT INTO `orders` VALUES ('4', 'samsung galaxy s4 mini', 'sdfsdfsdfsdfsdfsdfsdf\'lsd;lfksdfk;sldf;lsd', '12000', 'samsung21.png', 'France', 'Tools', '16', '2', '17', '0');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `price` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'Mercedes benz S class coupe', 'Most cars begin as concepts whose ideals rarely reach the final product—until now. The all-new 2015 S-Class Coupe is virtually unchanged from the concept version—a breathtaking new expression of our flagshipS-Class. This sporty two-door commands not only a striking, self-assured presence highlighted by refined appointments you´ve come to expect from the S-Class. It also delivers exhilarating driving dynamics that can only come from a coupe powered by a 449-hp V8 biturbo engine. Of course, the S-Class Coupe is packed with some of the world´s most innovative driving assistance systems, such as Intelligent Drive, which includes PRE-SAFE® Brake with Pedestrian Detection and DISTRONIC PLUS with Steering Assist, among others. COLLISION PREVENTION ASSIST PLUS can even autonomously apply the brakes in an emergency, helping to prevent rear-end collisions from up to 25 mph.Who would know that underneath the sensuous curves and sleek lines that such a technologically advanced marvel awaited? One step into the cockpit, one press of the gas pedal, one grin from ear to ear — it\'s all one clear reminder that this is no dream, but the latest incarnation of \"The best or nothing\": The S-Class Coupe.', '150000', '21', '8', '2015-mercedes-benz-s-class-coupe-photo-577637-s-986x603.jpg', '11');
INSERT INTO `products` VALUES ('2', 'Samsung Galaxy S4', 'The fourth generation release of Samsung\'s popular Galaxy smartphone. The Samsung Galaxy S4 was announced in March 2013, with public availability expected in late April. Pricing for the Galaxy S4 will start at close to $600.\r\nThe Samsung Galaxy S4 runs Android 4.2.2 Jelly Bean mobile operating system in a profile that is slimmer and lighter than the previous Samsung Galaxy 3 III. One of the Galaxy S4\'s many enhancements over previous generations of the Galaxy smartphone is the use of Gorilla Glass 3 for superior screen protection of a 5-inch, 1080p Super AMOLED panel that offers 441 pixels-per-inch (ppi) density. The Samsung Galaxy S 4 is powered by a quad-core 1.9 GHz Qualcomm Snapdragon 600 processor (with an 8-core Exynos 5 processor available as an option) with 2GB of RAM, and provides 4G LTE support as well as NFC (near-field communication), Bluetooth 4.0 and 802.11 a/b/g/n/ac support.', '650', '8', '13', 'samsung1111211.png', '32');
INSERT INTO `products` VALUES ('7', 'iPhone 6', 'The iPhone 6 represents Apple\'s second largest departure in terms of design since the iPhone 4, and ushers in an era of rounded aesthetics. Equipped with a 4.7-inch display, the iPhone 6 is also much larger than its predecessor, the iPhone 5s, but Apple has managed to trim some extra fat in order to make the new iPhone even thinner, at 0.27 in (6.9 mm). The innards of the iPhone 6, too, went through improvements. The home-grown dual-core A8 processor is the third consecutive Apple chip to be custom-designed, and offers performance improvements of up to 25% and 50% in the of CPU and GPU departments respectively. The 8-megapixel, 1/3” iSight camera also received several upgrades, mostly on the software side, and now offers faster, phase detection auto focus, plus support for super-smooth 720p clips at the industry-leading 240 frames per second.', '800', '19', '4', 'iphone61.jpg', '30');
INSERT INTO `products` VALUES ('8', 'Roof materials', 'Your home’s roof is one of the most vital systems to its structural integrity. Not only does the roof keep things like water and debris from falling directly into your home, it also sheds water and diverts it away from the home’s foundation. On top of that, roofs protect from solar damage caused by UV rays, and fire-resistant roofing materials slow the spread of fire across the roof where it could do some of the most damage to your home.\r\nIn order to reap all of these benefits, you must choose a roofing material that can complement the needs of your home design as well as your particular climate. The wrong sort of roof can lead to structural weakness, or it could create problems like ice dams.To help you decide which roofing material would work best for you, here are some of the options you have at your disposal:', '100', '9', '14', 'beacon-roofing-supply21.jpg', '35');
INSERT INTO `products` VALUES ('9', 'Leather_tool', 'Using the wrong tool for the job can have disastrous results for both user and the subject as well.  A great example of this from a construction standpoint is when years ago when my wife and I were rehabbing an old house; my mother in law came over to help pull nails out of a hardwood floor to assist in prepping it for refinishing. I was in another room setting a toilet, and bringing in the refinished claw foot tub.  As I strolled in to see how things were going, I saw my mother in law prying up nails with one of my very nice wood chisels, using a hammer to drive it under the nail heads so she could then pry them up with the claw on the hammer! I just stood there speechless as my chisel was abused beyond repair and just shook my head like an Etch-a-sketch to make it all go away.  I still have that chisel and have never been able to bring it back from the dead.  Again, the right tool for the job was a pry bar, but she either did not see it or did not know that it was the proper tool for the job.', '250', '20', '3', '5400_Leather_tool_belt1121.jpg', '43');
INSERT INTO `products` VALUES ('10', 'Notebook HP', 'The dv7 is one of three new dv-series notebooks to usher in a fresh Pavilion design. Instead of the old Imprint pattern, the onyx lid now has a subtle grid pattern that extends to the keyboard deck. HP\'s logo glows brightly in the upper left corner. Inside, the shiny silver deck, keyboard, and chrome peaker strip look and feel futuristic. As we noted with the 15-inchdv5t, the one downside to this new look is that the surface picks up fingerprints easily. At 8.4 pounds, the entire package is about as heavy as we would expect for a 17-incher.Above the keyboard is the speaker strip, with a smooth touch-sensitive panel above that. The power button and QuickPlay launch key are discrete controls that are visible at all times. Other controls--mute, volume, rewind, play/pause, fast-foward, stop, and Wi-Fi--glow white only when the computer is turned on.Occasionally, we found the keyboard slippery, but the keys were comfortable for typing and have a bouncy feel. Although we like the quiet touch buttons and the wide orientation of the trackpad, the cursor on our preproduction unit occasionally jumped to parts of documents we weren\'t working on.', '900', '19', '7', 'Notebook-HP-G42-431BR_311.jpg', '26');
INSERT INTO `products` VALUES ('12', 'Swatch', 'Swatch is a brand name for a line of wrist watches from the Swatch Group, a Swiss conglomerate with vertical control of the production of Swiss watches and related products. In 1984, Swatch was conceived and it was introduced to the market in Switzerland in March 1985.From the original cult plastic watches, Swatch has diversified its offerings considerably, and the company now sells more than a dozen different types of watches, including metal-bodied watches (the Irony series), diving watches (the Scuba series), thin and flat bodied watches (the Skin family) and even an Internet-connected watch that can download stock quotes, news headlines, weather reports, and other data (the Paparazzi series).They have now become fashionable objects, generating specialized models (the \"Flik-Flak\" for children) quartz chronographes, automatic and automatic chronographes movements, and even some diamond-decorated Swatches. The company also produces watches with seasonal themes.There are five families under the swatch brand.', '160', '4', '5', 'swatch-black-leather-analog-unisex-watch-suob706.jpg', '15');
INSERT INTO `products` VALUES ('13', 'samsung', 'asdsadsadssdaas', '12000', '4', '3', 'swatch-black-leather-analog-unisex-watch-suob7061.jpg', '36');
INSERT INTO `products` VALUES ('14', 'samsung', 'dsdsadasdasdasdasdasdasdsadasdsa', '500', '4', '3', 'samsung1111211.png', '45');
INSERT INTO `products` VALUES ('15', 'Notebook', 'asdasdsadsadasdasdsad', '12333243', '8', '5', '13009782481.jpg', '123123');
INSERT INTO `products` VALUES ('16', 'samsung galaxy s4 mini', 'sdfsdfsdfsdfsdfsdfsdf\'lsd;lfksdfk;sldf;lsd', '12000', '0', '0', 'samsung21.png', '15');
INSERT INTO `products` VALUES ('17', 'sawewdasd', 'sadasdasdas', '123', '6', '8', 'administrator1.png', '123');
INSERT INTO `products` VALUES ('18', 'dsfdfdgdfgdfgdfgd123', 'wefddxcxvcvxcvxcv', '123', '0', '0', '5400_Leather_tool_belt11211.jpg', '123');
INSERT INTO `products` VALUES ('19', 'ssad', 'asdsadasd', '123', '39', '3', 'administrator2.png', '123');

-- ----------------------------
-- Table structure for shipping
-- ----------------------------
DROP TABLE IF EXISTS `shipping`;
CREATE TABLE `shipping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_price` int(11) NOT NULL,
  `shipping_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shipping
-- ----------------------------
INSERT INTO `shipping` VALUES ('1', 'Plane', '20', 'plane.png');
INSERT INTO `shipping` VALUES ('2', 'Post', '0', 'post.png');
INSERT INTO `shipping` VALUES ('3', 'Ship', '10', 'ship.png');
INSERT INTO `shipping` VALUES ('4', 'DHL', '100', 'dhl.png');
INSERT INTO `shipping` VALUES ('5', 'TNT', '150', 'tnt.png');

-- ----------------------------
-- Table structure for slider
-- ----------------------------
DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slider
-- ----------------------------
INSERT INTO `slider` VALUES ('1', 'Atemberaubend-und-unwiderstehlich.jpg');
INSERT INTO `slider` VALUES ('2', 'iphone618.jpg');
INSERT INTO `slider` VALUES ('3', 'Notebook-HP-G42-431BR_3.jpg');
INSERT INTO `slider` VALUES ('4', 'samsung.jpg');
INSERT INTO `slider` VALUES ('5', 'watch1.jpg');
INSERT INTO `slider` VALUES ('6', 'images.jpg');
INSERT INTO `slider` VALUES ('7', 'images_(1).jpg');
INSERT INTO `slider` VALUES ('8', 'apple3.jpg');
INSERT INTO `slider` VALUES ('9', 'iphone618.jpg');
INSERT INTO `slider` VALUES ('10', 'Notebook-HP-G42-431BR_311.jpg');
INSERT INTO `slider` VALUES ('15', 'mercedes2521.jpg');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('14', 'Mher', 'Darbinyan', 'mger33389@mail.ru', '202cb962ac59075b964b07152d234b70');
INSERT INTO `users` VALUES ('15', 'Poxos', 'Poxosyan', 'mger33389@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `users` VALUES ('16', 'aaa', 'aaa', 'mger3389@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');
INSERT INTO `users` VALUES ('17', 'david', 'darbinyan', 'dav77782@mail.ru', 'b59c67bf196a4758191e42f76670ceba');
INSERT INTO `users` VALUES ('18', 'asd', 'asd', 'asd@mail.ru', '7815696ecbf1c96e6894b779456d330e');
INSERT INTO `users` VALUES ('19', 'asd', 'asd', 'asaaad@mail.ru', 'f970e2767d0cfe75876ea857f92e319b');
