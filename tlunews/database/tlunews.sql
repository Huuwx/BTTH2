-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for tlunews
CREATE DATABASE IF NOT EXISTS `tlunews` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tlunews`;

-- Dumping structure for table tlunews.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tlunews.categories: ~10 rows (approximately)
INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Hoffmann\'s Buckwheat'),
	(2, 'San Diego Coastalcreeper'),
	(3, 'Carolina Laurelcherry'),
	(4, 'Oahu Clermontia'),
	(5, 'Sedge'),
	(6, 'Spring Hill Flax'),
	(7, 'Stalked Moonwort'),
	(8, 'Clubmoss'),
	(9, 'Snow Lichen'),
	(10, 'Platyhypnidium Moss');

-- Dumping structure for table tlunews.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_category_Id` (`category_id`),
  CONSTRAINT `FK_category_Id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tlunews.news: ~10 rows (approximately)
INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`, `category_id`) VALUES
	(1, 'lobortis est phasellus', 'proin risus praesent lectus vestibulum quam sapien', 'http://dummyimage.com/173x100.png/cc0000/ffffff', '2024-11-27 00:00:00', 1),
	(2, 'arcu libero rutrum ac', 'turpis nec euismod scelerisque quam turpis adipiscing lorem vitae', 'http://dummyimage.com/207x100.png/ff4444/ffffff', '2024-09-01 00:00:00', 2),
	(3, 'ut dolor morbi vel', 'metus vitae ipsum aliquam non mauris morbi', 'http://dummyimage.com/223x100.png/ff4444/ffffff', '2024-04-23 00:00:00', 3),
	(4, 'ante ipsum primis in', 'pede justo eu massa donec dapibus duis at velit', 'http://dummyimage.com/190x100.png/cc0000/ffffff', '2024-07-28 00:00:00', 4),
	(5, 'metus sapien ut nunc vestibulum', 'nisi nam ultrices libero non mattis pulvinar nulla pede ullamcorper', 'http://dummyimage.com/140x100.png/dddddd/000000', '2024-01-14 00:00:00', 5),
	(6, 'vestibulum eget vulputate ut ultrices', 'tellus in sagittis dui vel nisl duis ac nibh fusce', 'http://dummyimage.com/134x100.png/5fa2dd/ffffff', '2024-01-05 00:00:00', 6),
	(7, 'fusce congue diam id', 'vestibulum sagittis sapien cum sociis natoque', 'http://dummyimage.com/250x100.png/cc0000/ffffff', '2024-02-03 00:00:00', 7),
	(8, 'libero nullam sit amet turpis', 'faucibus orci luctus et ultrices posuere cubilia curae nulla dapibus', 'http://dummyimage.com/146x100.png/dddddd/000000', '2024-08-10 00:00:00', 8),
	(9, 'ut blandit', 'lorem integer tincidunt ante vel ipsum praesent blandit', 'http://dummyimage.com/249x100.png/5fa2dd/ffffff', '2023-12-27 00:00:00', 9),
	(10, 'volutpat sapien', 'mauris ullamcorper purus sit amet nulla', 'http://dummyimage.com/230x100.png/ff4444/ffffff', '2024-09-07 00:00:00', 10);

-- Dumping structure for table tlunews.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tlunews.users: ~10 rows (approximately)
INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
	(1, 'zknapman0', 'wR9_0D4w9', 1),
	(2, 'bdambrosi1', 'pU7*6MZ3,AZ', 1),
	(3, 'tgauson2', 'iX5}XW1,DP', 1),
	(4, 'bjephson3', 'eN3{xo|e', 1),
	(5, 'jthurbon4', 'rP2/.N#3', 1),
	(6, 'ebirkmyr5', 'xX0~aZ/IU9', 1),
	(7, 'tkisar6', 'gS4=H>3~,)*=', 0),
	(8, 'rmcgrath7', 'tG7+uZ@!B', 1),
	(9, 'abloomfield8', 'oI0&Cq', 1),
	(10, 'bisacq9', 'mU7*}x8M5q', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
