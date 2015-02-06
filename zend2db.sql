/*
SQLyog Community Edition- MySQL GUI v8.05 
MySQL - 5.5.27 : Database - zend2_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `destination` */

DROP TABLE IF EXISTS `destination`;

CREATE TABLE `destination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `asc_name` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `logitude` varchar(255) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `destination` */

insert  into `destination`(`id`,`title`,`asc_name`,`state`,`country`,`latitude`,`logitude`,`created_date`) values (1,'Bangalore','bangalore','KA','IN',NULL,NULL,NULL),(2,'Mysore','mysore','KA','IN',NULL,NULL,NULL);

/*Table structure for table `travel` */

DROP TABLE IF EXISTS `travel`;

CREATE TABLE `travel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `destination_id` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`destination_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `travel` */

insert  into `travel`(`id`,`user_id`,`title`,`destination_id`,`created_date`,`modified_date`) values (1,1,'Trip Wayanad',1,NULL,NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`email`,`password`,`full_name`,`created_at`,`modified_at`,`active`) values (1,'sujeeshckm@gmail.com',NULL,'Sujeesh VP',NULL,NULL,NULL),(2,'sujeesh.vp@clariontechnologies.co.in',NULL,'Sujeesh Clarion',NULL,NULL,NULL),(3,'sujeeshvpclarion@gmail.com','pass','sujeesh',NULL,NULL,NULL),(4,'test3@clarion.com','pass','sujeesh',NULL,NULL,NULL),(5,'test3@clarion.com','pass','sujeesh',NULL,NULL,NULL),(6,'test3@clarion.com','pass','sujeesh',NULL,NULL,NULL),(7,'test345@clarion.com','pass','sujeesh',NULL,NULL,NULL),(8,'test3455@clarion.com','pass','sujeesh',NULL,NULL,NULL),(9,'test34552@clarion.com','','sujeesh',NULL,NULL,NULL),(10,'sujeeshvpclarion1@gmail.com','clarion','sujeesh',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
