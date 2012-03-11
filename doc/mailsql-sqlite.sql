-- MySQL dump 10.13  Distrib 5.1.56, for pc-linux-gnu (x86_64)
--
-- Host: localhost    Database: mailsql
-- ------------------------------------------------------
-- Server version	5.1.56

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `hmm_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hmm_users` (
    id integer primary key,
  `email` varchar(128) NOT NULL DEFAULT '',
  `domain` varchar(255),
  `clear` varchar(128) NOT NULL DEFAULT '',
  `name` tinytext,
  `quota` tinytext,
  `postfix` char(1) DEFAULT 'Y',
  `shell` char(1) DEFAULT NULL,
  `cvs` char(1) DEFAULT NULL,
  `customer` char(1) NOT NULL DEFAULT '',
  `relocated` char(1) DEFAULT 'N',
  `relocated_to` varchar(255) DEFAULT NULL,
  `catchall` char(1) DEFAULT 'N',
  `cc_to` varchar(255) DEFAULT NULL,
  `forward` char(1) DEFAULT NULL,
  `forward_to` varchar(255) DEFAULT NULL,
  `tmp` varchar(255) DEFAULT NULL,
  `pop3_name` varchar(255) NOT NULL DEFAULT '',
  `crypt_password` varchar(255) NOT NULL DEFAULT '',
  `access_level` int(11) NOT NULL DEFAULT '0'

);
/*!40101 SET character_set_client = @saved_cs_client */;

insert into hmm_users (email,clear,access_level,domain,postfix) values ('admin@example.org','secret',99,'example.org','y');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-03-10  0:07:56
