-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: mini_blog_site
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (15,'This post is for ALL users','Welcome to our MiniBlog website! Heres a simple and short users guideline to help you make the most out of your experience:\r\n\r\nCreate Your Account: To get started, sign up for a new account using your email or social media profile. If you already have an account, simply log in.\r\n\r\nProfile Setup: Customize your profile by adding a profile picture and a short bio. Let others know a little about yourself and your interests.\r\n\r\nExplore Content: Dive into our MiniBlog community by exploring posts from other users. Like, comment, and share posts that resonate with you. Spread positivity and engage constructively with fellow users.\r\n\r\nCreate Posts: Share your thoughts, ideas, and experiences with the community by creating your own posts. Keep them concise and relevant, adding catchy titles to attract readers.\r\n\r\nBe Respectful: We value a supportive and inclusive community. Treat others with respect, even if you disagree with their views. No hate speech, offensive language, or harassment will be tolerated.\r\n\r\nMind Copyright: When posting content, make sure you have the necessary rights or permissions to share it. Plagiarism is strictly prohibited.\r\n\r\nReport Inappropriate Content: If you come across any content that violates our guidelines or terms of service, please report it immediately. Help us maintain a safe and friendly environment for everyone.\r\n\r\nConnect with Others: Follow users whose content you enjoy to see their latest posts in your feed. Connect with like-minded individuals and build meaningful relationships.\r\n\r\nPrivacy Settings: Review your privacy settings to control who can view your posts and interact with you. We encourage you to maintain a healthy balance between sharing and privacy.\r\n\r\nStay Updated: Keep an eye on our announcements, new features, and community events. Were continuously improving the MiniBlog experience for our users.\r\n\r\nLog Out Securely: When using public computers or devices, remember to log out of your account for security purposes.\r\n\r\nWe hope you have a fantastic time using MiniBlog and engaging with our wonderful community. Happy blogging!',12),(17,'Sample posts here','This is an example post.',12),(18,'Hello world','This is an example post.',13),(20,'Terminator 2','This is an example post.',11);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (11,'exequielarroyo','zekielarroyo@gmail.com','admin123'),(12,'Admin','admin@example.com','admin321'),(13,'user','user@example.com','user123');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-19 15:34:12
