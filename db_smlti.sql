/*
SQLyog Ultimate v10.3 
MySQL - 5.5.5-10.3.16-MariaDB : Database - db_smlti
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_smlti` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_smlti`;

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `password` varchar(256) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`name`,`nip`,`image`,`role_id`,`is_active`,`password`,`date_created`) values (1,'Admin PTIP','admin','default.jpg',1,1,'$2y$10$9KjYFGmZZQ5WOro5beXqjex46UQanf/F8hGpjlHeO6D.ClPfavKNa','2022-07-19 10:03:27');

/*Table structure for table `user_access_menu` */

DROP TABLE IF EXISTS `user_access_menu`;

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `user_access_menu` */

insert  into `user_access_menu`(`id`,`role_id`,`menu_id`) values (1,1,1),(2,1,2),(4,1,3),(6,2,4),(7,1,4),(8,1,6),(9,1,7),(10,1,8),(11,1,9),(12,2,9),(14,1,11),(16,4,2),(17,4,10),(18,5,2),(20,5,11),(21,1,12);

/*Table structure for table `user_menu` */

DROP TABLE IF EXISTS `user_menu`;

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) CHARACTER SET utf8 NOT NULL,
  `icon` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `user_menu` */

insert  into `user_menu`(`id`,`menu`,`icon`) values (1,'Admin','nav-icon fas fa-tachometer-alt'),(2,'User','nav-icon fas fa-users'),(3,'Menu','nav-icon fas fa-folder');

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_role` */

insert  into `user_role`(`id_role`,`role`) values (1,'Administrator'),(2,'Member'),(3,'Moderator');

/*Table structure for table `user_sub_menu` */

DROP TABLE IF EXISTS `user_sub_menu`;

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `user_sub_menu` */

insert  into `user_sub_menu`(`id`,`menu_id`,`title`,`url`,`icon`,`is_active`) values (1,1,'Dashboard','admin','fas fa-columns nav-icon',1),(2,2,'My Profile','user','fas fa-user nav-icon',1),(3,3,'Menu Management','menu/','fas fa-folder-open nav-icon',1),(4,3,'Submenu Management','menu/submenu/','fas fa-folder-open nav-icon',1),(9,1,'Role Management','admin/role/','nav-icon fas fa-user-tie',1),(10,2,'Edit Profile','user/edit/','nav-icon fas fa-user-edit',1),(11,2,'Change Password','user/ubahpassword/','nav-icon fas fa-key',1),(12,6,'Daftar Induk SK','arsip/','nav-icon fas fa-book-open',1),(13,7,'Laporan','permohonan/laporan','nav-icon fas fa-users',1),(15,10,'Tambah Usulan','cuti/tambahUsulan/','nav-icon fas fa-plus',1),(17,10,'Dasboard','cuti/','nav-icon fas fa-circle',1),(19,11,'Sisa Cuti','manajemen/sisaCuti','nav-icon fas fa-plus',1),(20,11,'Approval','manajemen/','nav-icon fas fa-plus',1),(22,11,'Pegawai','manajemen/pegawai','nav-icon fas fa-plus',1),(23,11,'Laporan','manajemen/laporan','nav-icon fas fa-plus',1),(24,11,'Kendali','manajemen/kendali','nav-icon fas fa-plus',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
