/*
SQLyog Ultimate v10.3 
MySQL - 5.5.5-10.5.7-MariaDB : Database - db_smlti
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

/*Table structure for table `data_pegawai` */

DROP TABLE IF EXISTS `data_pegawai`;

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(10) NOT NULL AUTO_INCREMENT,
  `nip` varchar(18) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `jabatan` varchar(128) DEFAULT NULL,
  `unit` varchar(128) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `id_atasan` int(10) DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `id_pejabat` int(10) DEFAULT NULL,
  `urut` int(10) DEFAULT NULL,
  `lingkup` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

/*Data for the table `data_pegawai` */

insert  into `data_pegawai`(`id_pegawai`,`nip`,`nama`,`jabatan`,`unit`,`telp`,`email`,`id_atasan`,`created`,`id_pejabat`,`urut`,`lingkup`) values (13,'196712301994031004','Drs. FAIQ, M.H.','Ketua','Pengadilan Agama Bojonegoro','085235053700','-',58,NULL,NULL,1,'Pimpinan'),(14,'196704241992032002','Dr. Hj. MUNADHIROH, S.H., M.H','Hakim','Pengadilan Agama Bojonegoro','085233661777','',13,NULL,13,3,'Hakim'),(15,'196706061992032003','Dra. SITI ROHMAH, M.Hum.','Hakim','Pengadilan Agama Bojonegoro','081335597008','',13,NULL,13,4,'Hakim'),(16,'196612281991032005','Dra. Hj. UMMU LAILA, M.HI','Hakim','Pengadilan Agama Bojonegoro','081615484810','',13,NULL,13,5,'Hakim'),(17,'196609211994031001','Drs. GEMBONG EDY SUJARNO, M.H.','Hakim','Pengadilan Agama Bojonegoro','085236851508','',13,NULL,13,6,'Hakim'),(18,'196604141994031006','Drs. H. MAHZUMI, M.H.','Hakim','Pengadilan Agama Bojonegoro','081259680466','',13,NULL,13,7,'Hakim'),(19,'196801031994031005','Drs. H.MOCH BAHRUL ULUM, M.H','Hakim','Pengadilan Agama Bojonegoro','085239932696','',13,NULL,13,8,'Hakim'),(20,'196209071992031002','Drs. SUWARTO, M.H.','Hakim','Pengadilan Agama Bojonegoro','081335591413','',13,NULL,13,9,'Hakim'),(21,'196110111991031002','Drs. AUNUR ROFIQ, M.H','Hakim','Pengadilan Agama Bojonegoro','085232052341','',13,NULL,13,10,'Hakim'),(22,'196002121992031001','Dr. Drs. H. MUDZAKKIR, M.HI','Hakim','Pengadilan Agama Bojonegoro','085850060533','',13,NULL,13,11,'Hakim'),(23,'196201011992031004','Drs. MAFTUH BASUNI','Hakim','Pengadilan Agama Bojonegoro','085238885071','',13,NULL,13,12,'Hakim'),(24,'196801031994031001','Drs. H. SOLIKIN, S.H.,M.H.','Panitera','Pengadilan Agama Bojonegoro','081216517017','',13,NULL,13,16,'Pimpinan'),(25,'197601171998032008','YETI RIANAWATI, S.H., M.H','Sekretaris','Pengadilan Agama Bojonegoro','081332600543','',13,NULL,13,17,'Pimpinan'),(26,'196601011994031003','Drs. M NUR WACHID','Panmud Hukum','Pengadilan Agama Bojonegoro','087703387443','',NULL,NULL,NULL,NULL,NULL),(28,'196704042003121001','AHMAD PRIYADI, SH.','PANMUD PERMOHONAN','Pengadilan Agama Bojonegoro','082177255715','-',24,NULL,13,19,'Kepaniteraan'),(29,'198311242011011008','NOVAN YAHYA UTAMA, S.Kom','KASUBAG KEPEGAWAIAN & ORTALA','Pengadilan Agama Bojonegoro','08123237946','-',25,NULL,13,21,'Kesekretariatan'),(30,'198006282011012011','YUNISTIRA FAUZIYAH, S.HI.','KASUBAG UMUM & KEUANGAN','Pengadilan Agama Bojonegoro','081333320491','-',25,NULL,13,22,'Kesekretariatan'),(31,'197007021992031004','M ULIN NUHA, S.Ag','PANITERA PENGGANTI','Pengadilan Agama Bojonegoro','085859835544','111111111111111111',24,NULL,13,23,'Kepaniteraan'),(32,'197712122006041001','SANDHY SUGIJANTO, S.E., S.H','PANITERA PENGGANTI','Pengadilan Agama Bojonegoro','082140002900','',24,NULL,13,24,'Kepaniteraan'),(33,'197601312006042004','ENDAH RATNA WIJAYA, S.H','PANITERA PENGGANTI','Pengadilan Agama Bojonegoro','081216093151','-',24,NULL,13,25,'Kepaniteraan'),(34,'198403152006041002','MUDAKIN, S.H.','PANITERA PENGGANTI','Pengadilan Agama Bojonegoro','085231230510','',24,NULL,13,26,'Kepaniteraan'),(35,'197004132014081001','AHMAD BAJURI, S.H., M.H.','PANITERA PENGGANTI','Pengadilan Agama Bojonegoro','0','111111111111111111',24,NULL,13,27,'Kepaniteraan'),(36,'197112132006041002','MUHAMMAD SUTRISNO','JURUSITA','Pengadilan Agama Bojonegoro','','',NULL,NULL,13,28,'Kepaniteraan'),(37,'196704042014081002','SUDARMANTO','JURUSITA PENGGANTI','Pengadilan Agama Bojonegoro','081359623713','',NULL,NULL,13,29,'Kepaniteraan'),(39,'196410301993031002','Drs. H. MUKIDIN','ANALIS PERKARA PERADILAN','Pengadilan Agama Bojonegoro','082242280044','-',24,NULL,13,30,'Kepaniteraan'),(40,'198910152019032006','TRY MAYA OCTAVIA, S.E.','ANALIS SDM APARATUR','Pengadilan Agama Bojonegoro','085743222732','',25,NULL,NULL,31,'Kesekretariatan'),(41,'198909072019031005','YADI SEPRIADI, S.Kom.','PRANATA KOMPUTER','Pengadilan Agama Bojonegoro','081384972626','',25,NULL,13,33,'Kesekretariatan'),(42,'199611282020122009','NIKEN NOVIRASARI, S.Kom.','CPNS','Pengadilan Agama Bojonegoro','082255565534','nikennovirasari@gmail.com',30,NULL,25,34,'Kesekretariatan'),(43,'199812072020122001','LULUT PUTRI INDAH SARI, A.Md','Pengelola Perkara','Pengadilan Agama Bojonegoro','085654779461','',59,NULL,24,35,'Kepaniteraan'),(45,'198009132008401307','ARIF BUDI SANTOSA S.H.','SATPAM','Pengadilan Agama Bojonegoro','','',66,NULL,NULL,41,'Kepaniteraan'),(46,'198805072011401307','MUJAHIDIN ENDRO WIBOWO, S.H., S.Hi.','SOPIR','Pengadilan Agama Bojonegoro','082333919961','',41,NULL,NULL,44,'Kesekretariatan'),(47,'198407012008401307','AHMAD NUR ROFIQI, SH','SOPIR','Pengadilan Agama Bojonegoro','085230782080','',26,NULL,NULL,42,'Kepaniteraan'),(48,'198709132009401307','M. TANTOWI NUR ANSORI, S.H.','PRAMUBAKTI','Pengadilan Agama Bojonegoro','085736429430','',26,NULL,NULL,43,'Kepaniteraan'),(49,'198606172011401307','FITROHTUZ ZAHRO, S.Sos','PRAMUBAKTI','Pengadilan Agama Bojonegoro','082131588668','',26,NULL,NULL,45,'Kepaniteraan'),(50,'199008242014401307','EKA SITI KHOMARIYAH, S.E','PRAMUBAKTI','Pengadilan Agama Bojonegoro','085854002245','',28,NULL,NULL,47,'Kepaniteraan'),(51,'198511092011401307','AHMAD AHSANUL HIDAYAT, S.T.','PRAMUBAKTI','Pengadilan Agama Bojonegoro','081515552233','',30,NULL,NULL,46,'Kesekretariatan'),(52,'199604022018401307','MOH ZAINAL ABIDIN, S.Kom','PRAMUBAKTI','Pengadilan Agama Bojonegoro','085335567787','',26,NULL,NULL,49,'Kepaniteraan'),(53,'200002202017401307','NILNA HIMAWATI ','PRAMUBAKTI','Pengadilan Agama Bojonegoro','085231636629','',66,NULL,NULL,48,'Kepaniteraan'),(54,'199603122019401307','MOH. RIZAL BAIHAQI, S.Kom','PRAMUBAKTI','Pengadilan Agama Bojonegoro','085749090027','',29,NULL,NULL,51,'Kesekretariatan'),(56,'199811162022032010','NOVIA ADITIA NINGSIH, S.H.','ANALIS PERKARA PERADILAN','Pengadilan Agama Bojonegoro','089522332552','-',66,NULL,NULL,36,'Kepaniteraan'),(57,'196510202008401307','TRIYONO','CLEANNING SERVICE','Pengadilan Agama Bojonegoro','','',41,NULL,NULL,50,'Kesekretariatan'),(59,'197201291998031001','AKHMAD QOMARUL HUDA, S.H., M.H.','PANITERA MUDA HUKUM','Pengadilan Agama Bojonegoro','0','-',24,NULL,13,18,'Kepaniteraan'),(62,'199703292019401307','PANJI SUSETYO AJI, Amd. Kom','PRAMUBAKTI','Pengadilan Agama Bojonegoro','000000000','test@mail.com',29,NULL,NULL,52,'Kepaniteraan'),(64,'195907051992031002','Drs. NURUL ANWAR, M.H','Hakim','Pengadilan Agama Bojonegoro','00','-',13,NULL,13,15,'Hakim'),(65,'196712311994031052','Drs. MURDANI, S.H.','Wakil Ketua','Pengadilan Agama Bojonegoro','0','-',13,NULL,13,2,'Pimpinan'),(66,'198205092006041011','MUHAMMAD NAFI\', S.H.,M.H.I.','PANITERA MUDA GUGATAN','Pengadilan Agama Bojonegoro','085230880056','hima.naff@gmail.com',24,NULL,13,20,'Kepaniteraan'),(67,'198905082019031004','MOCH. ARDANY CHABIB, S.H.','ANALIS PERKARA PERADILAN','Pengadilan Agama Bojonegoro','085730130777','-',59,NULL,24,32,'Kepaniteraan'),(68,'196306061992031005','Drs. ABD. GANI, M.H.','Hakim Utama Muda','Pengadilan Agama Bojonegoro','0','-',13,NULL,13,13,'Hakim'),(69,'199704242022032018','APRILIA DZULAINI, A.Md.','PENGELOLA PERKARA','Pengadilan Agama Bojonegoro','0','-',66,NULL,NULL,39,'Kepaniteraan'),(70,'199706032022032015','DINDA SARASWATI MANURUNG, A.Md.Bns.','PENGELOLA BARANG MILIK NEGARA','Pengadilan Agama Bojonegoro','0','-',30,NULL,NULL,40,'Kesekretariatan'),(71,'199504062022032012','WINDA WARA PERTIWI, S.H.','ANALIS PERKARA PERADILAN','Pengadilan Agama Bojonegoro','0','-',66,NULL,NULL,37,'Kepaniteraan'),(72,'199408032022032015','YOVANA RIKEN KEIKY, S.IAN.','ANALIS PERENCANAAN, EVALUASI DAN PELAPORAN','Pengadilan Agama Bojonegoro','0','-',41,NULL,NULL,38,'Kesekretariatan');

/*Table structure for table `tbl_data_laptop` */

DROP TABLE IF EXISTS `tbl_data_laptop`;

CREATE TABLE `tbl_data_laptop` (
  `id_laptop` bigint(16) NOT NULL AUTO_INCREMENT,
  `nama_laptop` varchar(256) NOT NULL,
  `sn_laptop` varchar(256) NOT NULL,
  `tgl_beli` date NOT NULL,
  `penguasaan` enum('BMN','Non BMN') NOT NULL,
  `nup` int(32) NOT NULL,
  `ruangan` int(32) NOT NULL,
  `user` varchar(256) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id_laptop`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_data_laptop` */

/*Table structure for table `tbl_data_pc` */

DROP TABLE IF EXISTS `tbl_data_pc`;

CREATE TABLE `tbl_data_pc` (
  `id_pc` bigint(16) NOT NULL AUTO_INCREMENT,
  `kode_pc` varchar(256) NOT NULL,
  `nama_pc` varchar(256) NOT NULL,
  `nama_monitor` varchar(256) NOT NULL,
  `tgl_beli` date NOT NULL,
  `sn_pc` varchar(128) NOT NULL,
  `sn_monitor` varchar(128) NOT NULL,
  `penguasaan` enum('BMN','Non BMN') NOT NULL,
  `nup` int(32) NOT NULL,
  `ruangan` int(32) NOT NULL,
  `user` varchar(256) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `keterangan` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_pc`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_data_pc` */

insert  into `tbl_data_pc`(`id_pc`,`kode_pc`,`nama_pc`,`nama_monitor`,`tgl_beli`,`sn_pc`,`sn_monitor`,`penguasaan`,`nup`,`ruangan`,`user`,`date_created`,`date_updated`,`keterangan`) values (5,'IT-PABJN-PC-0001','HP ELITEONE 800 G1 ALL-IN-ONE PC','HP MONITOR','2015-12-21','SGH547PWWH','SGH547PWWH','BMN',32,1,'13','2022-07-22 13:21:25',NULL,'PC PAK KETUA'),(6,'IT-PABJN-PC-0002','LENOVO IDEACENTRE IC300-20ISH [90DA0009ID]','LENOVO ','2016-06-06','R30219ML','R30219ML','BMN',33,7,'29','2022-07-22 13:25:10',NULL,'PC PAK NOVAN'),(7,'IT-PABJN-PC-0003','LENOVO IDEACENTRE IC300-20ISH [90DA0009ID]','LG 19 INCH','2016-06-06','R30219MU','0','BMN',34,7,'41','2022-07-22 13:26:25',NULL,'PC YADI'),(8,'IT-PABJN-PC-0004','LENOVO IDEACENTRE IC300-20ISH [90DA0009ID]','LENOVO ','2016-06-06','R30219NH','0','BMN',37,7,'40','2022-07-22 13:27:34',NULL,'PC MAYA'),(9,'IT-PABJN-PC-0005','LENOVO IDEACENTRE IC300-20ISH [90DA0009ID]','LENOVO ','2016-06-06','R30219NH','R30219NH','BMN',36,14,'35','2022-07-22 13:30:55',NULL,'PC PP AHMAD BAJURI'),(10,'IT-PABJN-PC-0006','LENOVO IDEACENTRE IC300-20ISH [90DA0009ID]','LENOVO ','2016-06-06','R30219RL','R30219RL','BMN',35,10,'41','2022-07-22 13:32:43',NULL,'PC SERVER APLIKASI JATI'),(11,'IT-PABJN-PC-0007','DELL INSPIRON 3264 AIO','DELL','2017-05-29','FT64972','FT64972','BMN',38,7,'72','2022-07-22 13:38:38',NULL,'PC YOVANA'),(12,'IT-PABJN-PC-0008','DELL INSPIRON 3264 AIO','DELL','2017-06-08','6174972','6174972','BMN',39,13,'41','2022-07-22 13:39:56',NULL,'PC RUANG SIDANG 3'),(13,'IT-PABJN-PC-0009','DELL INSPIRON 3264 AIO','DELL','2017-06-08','CZ64972','CZ64972','BMN',40,6,'28','2022-07-22 13:41:06',NULL,'PC PANMUD PERMOHONAN (PAK PRI)'),(14,'IT-PABJN-PC-0010','DELL INSPIRON 3264 AIO','DELL','2017-06-08','2X644972 ','2X644972 ','BMN',41,6,'66','2022-07-22 13:42:57',NULL,'PC PAK NAFI'),(15,'IT-PABJN-PC-0011','HP PRO ONE 600 G5 21.5 ALL IN ONE','HP','2019-12-17','8CG939DL21','8CG939DL21','BMN',45,9,'71','2022-07-22 13:45:29',NULL,'PC PTSP BAGIAN PENDAFTARAN'),(16,'IT-PABJN-PC-0012','HP PRO ONE 600 G5 21.5 ALL IN ONE','HP','2019-12-17','8CG94025BL','8CG94025BL','BMN',42,9,'52','2022-07-22 13:46:33',NULL,'PC PTSP BAGIAN AKTA CERAI'),(17,'IT-PABJN-PC-0013','HP PRO ONE 600 G5 21.5 ALL IN ONE','HP','2019-12-17','8CG94025HW','8CG94025HW','BMN',43,9,'48','2022-07-22 13:47:58',NULL,'PC PTSP BAGIAN KASIR'),(18,'IT-PABJN-PC-0014','HP PRO ONE 600 G5 21.5 ALL IN ONE','HP','2019-12-17','8CG94025GT','8CG94025GT','BMN',44,4,'25','2022-07-22 13:48:52',NULL,'PC BU SEK'),(19,'IT-PABJN-PC-0015','HP PRO 3340 MICROTOWER PC','HP','2012-12-10','SGH242R7K7','SGH242R7K7','BMN',31,10,'41','2022-07-22 13:51:37',NULL,'PC RUSAK MB TIDAK BISA DIGUNAKAN'),(20,'IT-PABJN-PC-0016','LENOVO V530-221CB AIO','LENOVO ','2020-05-18','10VS00VEIF','10VS00VEIF','BMN',46,9,'49','2022-07-22 13:57:15',NULL,'PC PTSP BAGIAN LAYANAN ECOURT'),(21,'IT-PABJN-PC-0017','LENOVO V530-221CB AIO','LENOVO ','2020-05-18','MP1RDDTF','MP1RDDTF','BMN',47,11,'41','2022-07-22 13:58:45',NULL,'PC RUANG SIDANG 1'),(22,'IT-PABJN-PC-0018','HP 200 G3 ALL-IN-ONE PC','HP','2019-12-17','8C9382CNF','8C9382CNF','BMN',49,9,'56','2022-07-22 14:02:51',NULL,'PC PTSP BAGIAN INFORMASI'),(23,'IT-PABJN-PC-0019','HP 200 G3 ALL-IN-ONE PC','HP','2019-12-17','8CC9382CRQ','8CC9382CRQ','BMN',48,12,'41','2022-07-22 14:03:58',NULL,'PC RUANG SIDANG 2'),(24,'IT-PABJN-PC-0020','LENOVO THINKCENTRE M70T TOWER DESKTOP','LENOVO ','2021-05-05','PC1VLBYY','PC1VLBYY','BMN',50,7,'42','2022-07-22 14:06:43','2022-07-22 15:48:04','PC NIKEN'),(25,'IT-PABJN-PC-0021','LENOVO THINKCENTRE M70T TOWER DESKTOP','LENOVO ','2021-05-05','0','0','BMN',51,7,'54','2022-07-22 14:07:51',NULL,'PC RIZAL'),(26,'IT-PABJN-PC-0022','LENOVO THINKCENTRE M70T TOWER DESKTOP ','LENOVO ','2021-05-05','0','0','BMN',52,3,'24','2022-07-22 14:09:31',NULL,'PC DI RUANG PANITERA'),(27,'IT-PABJN-PC-0023','HP 280 PRO G6 MICROTOWER PC','HP P204V 19.5 INCH','2022-03-17','4CE201CRXT','3C1520LSZ','BMN',0,7,'70','2022-07-22 14:29:07',NULL,'PC CPNS DINDA'),(28,'IT-PABJN-PC-0024','HP 280 PRO G6 MICROTOWER PC','HP P204V 19.5 INCH','2022-03-17','4CE201CRZ4','3CQ1520LT3','BMN',0,6,'67','2022-07-22 14:30:53','2022-07-22 14:32:48','PC MAS DANY MONITOR DITUKAR SAMA APRIL'),(29,'IT-PABJN-PC-0025','HP 280 PRO G6 MICROTOWER PC ','HP P204V 19.5 INCH','2022-03-17','4CE201CRYT','3CQ1520M43','BMN',0,14,'33','2022-07-22 14:31:57',NULL,'PC BU ENDAH'),(30,'IT-PABJN-PC-0026','HP 280 PRO G6 MICROTOWER PC ','HP P204V 19.5 INCH ','2022-03-17','4CE210CRYP','3CQ1520LS4','BMN',0,14,'39','2022-07-22 14:35:00',NULL,'PC PAK MUKIDIN'),(31,'IT-PABJN-PC-0027','HP COMPACT PRESARIO CQ3321L','HP COMPACT LE1902X','2011-05-04','4CE05119ZR','4CE05119ZR','BMN',28,6,'36','2022-07-25 08:29:47',NULL,'PC PAK TRIS JS'),(32,'IT-PABJN-PC-0028','HP COMPACT PRESARIO CQ3321L ','COMPACT','2011-05-04','CNX03102DK','0','BMN',29,6,'43','2022-07-25 08:31:26',NULL,'PC LULUT UNTUK AC'),(33,'IT-PABJN-PC-0029','HP COMPACT PRESARIO CQ3321L','COMPACT','2011-05-04','0','0','BMN',30,10,'41','2022-07-25 08:32:35',NULL,'PC BEKAS MAS DANY LOKASI RUANG SERVER'),(34,'IT-PABJN-PC-0030','HP PRESARIO CQ 3238L','HP','2010-12-05','0','0','BMN',26,14,'41','2022-07-25 09:42:43','2022-07-25 10:01:09','PC TIDAK TAHU RIMBANYA SAHABAT'),(35,'IT-PABJN-PC-0031','HP PRESARIO CQ 3238L','HP','2010-05-17','0','0','BMN',26,5,'41','2022-07-25 09:46:26','2022-07-25 10:01:17','PC TIDAK JELAS RIMBANYA'),(36,'IT-PABJN-PC-0032','RAKITAN','LG','2015-01-01','0','0','Non BMN',0,6,'45','2022-07-25 10:02:44','2022-07-25 10:04:01','PC MAS ARIF, PC RAKITAN'),(37,'IT-PABJN-PC-0033','RAKITAN','COMPACT','2015-01-01','0','0','Non BMN',0,6,'47','2022-07-25 10:05:10',NULL,'PC MAS ROFIQ, PC RAKITAN'),(38,'IT-PABJN-PC-0034','RAKITAN','COMPACT','2015-01-01','0','0','Non BMN',0,6,'53','2022-07-25 10:06:10',NULL,'PC RAKITAN DIPAKAI NILNA'),(39,'IT-PABJN-PC-0035','RAKITAN','LG','2015-01-01','0','0','Non BMN',0,5,'16','2022-07-25 10:07:04',NULL,'PC DI RUANGAN HAKIM'),(40,'IT-PABJN-PC-0036','RAKITAN','BENQ','2015-01-01','0','0','Non BMN',0,7,'51','2022-07-25 10:08:03',NULL,'PC MAS ANUL KEPEGAWAIAN, RAKIT'),(41,'IT-PABJN-PC-0037','RAKITAN','LG','2015-01-01','0','0','Non BMN',0,7,'30','2022-07-25 10:08:54',NULL,'PC BU ANIS, UMUM KEUANGAN , RAKITAN'),(42,'IT-PABJN-PC-0038','RAKITAN','SAMSUNG','2015-01-01','0','0','Non BMN',0,6,'32','2022-07-25 10:10:02',NULL,'PC PAK SANDHY, RAKITAN'),(43,'IT-PABJN-PC-0039','RAKITAN','ACER','2015-01-01','0','0','Non BMN',0,14,'31','2022-07-25 10:10:37',NULL,'PC PP PAK ULIN, RAKITAN'),(44,'IT-PABJN-PC-0040','RAKITAN','LENOVO','2015-01-01','0','0','Non BMN',0,14,'34','2022-07-25 10:11:54',NULL,'PC PAK MUDAKIN, PP'),(45,'IT-PABJN-PC-0041','RAKITAN','COMPACT','2015-01-01','0','0','Non BMN',0,15,'62','2022-07-25 10:14:41',NULL,'PC PANJI, RAKITAN'),(46,'IT-PABJN-PC-0042','RAKITAN','ACER','2015-01-01','0','0','Non BMN',0,15,'62','2022-07-25 10:15:26',NULL,'PC UNTUK SUARA SIDANG DI PANJI'),(47,'IT-PABJN-PC-0043','RAKITAN','HP P204V 19.5 INCH','2020-01-01','0','0','Non BMN',0,6,'69','2022-07-25 10:16:22',NULL,'PC APRIL, RAKITAN MONITOR BMN TUKAR MAS DANI'),(48,'IT-PABJN-PC-0044','RAKITAN I-5, SSD 120, RAM 4 GB','INFORCE 19 INCH','2022-01-01','0','0','Non BMN',0,10,'41','2022-07-25 10:19:11','2022-07-25 10:21:58','PC RAKITAN DI TEMPATKAN DI MPP');

/*Table structure for table `tbl_ruangan` */

DROP TABLE IF EXISTS `tbl_ruangan`;

CREATE TABLE `tbl_ruangan` (
  `id_ruangan` int(16) NOT NULL AUTO_INCREMENT,
  `nama_ruangan` varchar(256) NOT NULL,
  PRIMARY KEY (`id_ruangan`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_ruangan` */

insert  into `tbl_ruangan`(`id_ruangan`,`nama_ruangan`) values (1,'Ketua'),(2,'Wakil Ketua'),(3,'Panitera'),(4,'Sekretaris'),(5,'Hakim'),(6,'Kepaniteraan'),(7,'Kesekretariatan'),(8,'Media Center'),(9,'PTSP'),(10,'Ruang Server'),(11,'Ruang Sidang 1'),(12,'Ruang Sidang 2'),(13,'Ruang Sidang 3'),(14,'Panitera Pengganti'),(15,'Ruang Hall Lt.1');

/*Table structure for table `tbl_transaksi` */

DROP TABLE IF EXISTS `tbl_transaksi`;

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` bigint(16) NOT NULL AUTO_INCREMENT,
  `kode_transaksi` varchar(256) NOT NULL,
  `nama_transaksi` text NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `harga_barang` int(64) NOT NULL,
  `quantity` int(64) NOT NULL,
  `total_harga` int(64) NOT NULL,
  `realisasi` enum('Perawatan PC','Perawatan Printer','Perawatan Laptop') NOT NULL,
  `keterangan` text NOT NULL,
  `file_upload` varchar(128) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `update_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_transaksi` */

insert  into `tbl_transaksi`(`id_transaksi`,`kode_transaksi`,`nama_transaksi`,`tgl_transaksi`,`harga_barang`,`quantity`,`total_harga`,`realisasi`,`keterangan`,`file_upload`,`date_created`,`update_created`) values (4,'IT-PABJN-TRX-0001','Thinkplus Lenovo TH10 Headphone Bluetooth ','2022-07-15',224000,1,224000,'Perawatan PC','headset untuk zoom','it-pabjn-trx-0001.pdf','2022-07-27 12:16:35','2022-07-27 14:32:20'),(5,'IT-PABJN-TRX-0002','Monitor BenQ 22 Inch','2022-07-19',1660000,1,1660000,'Perawatan Printer','monitor untuk pak nur','it-pabjn-trx-0002.pdf','2022-07-27 12:17:55','2022-07-28 11:03:16'),(6,'IT-PABJN-TRX-0003','HD SSD RX7 120GB','2022-07-20',175000,1,175000,'Perawatan PC','hardiskk ssd persediaan','it-pabjn-trx-0003.pdf','2022-07-27 12:21:32','2022-07-27 13:15:36'),(7,'IT-PABJN-TRX-0004','Modem TP Link LS1005 5 Port','2022-07-20',76000,1,76000,'Perawatan Laptop','hub untuk cadangan','it-pabjn-trx-0004.pdf','2022-07-27 12:23:30','2022-07-28 11:03:10');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`name`,`nip`,`image`,`role_id`,`is_active`,`password`,`date_created`) values (1,'Admin PTIP','admin','default.jpg',1,1,'$2y$10$9KjYFGmZZQ5WOro5beXqjex46UQanf/F8hGpjlHeO6D.ClPfavKNa','2022-07-19 10:03:27'),(2,'User PTIP','user','default.jpg',2,1,'$2y$10$hb8qp.ARv0k3DyBM6vm5J.MWKk.he1IJLaoTq5vtpbS3ohuZo2gSW','2022-07-19 10:03:27');

/*Table structure for table `user_access_menu` */

DROP TABLE IF EXISTS `user_access_menu`;

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `user_access_menu` */

insert  into `user_access_menu`(`id`,`role_id`,`menu_id`) values (1,1,1),(2,1,2),(4,1,3),(6,2,4),(7,1,4),(8,1,6),(9,1,7),(10,1,8),(11,1,9),(12,2,9),(14,1,11),(16,4,2),(17,4,10),(18,5,2),(20,5,11),(21,1,12),(24,2,2),(25,2,13),(26,2,14),(28,1,13),(29,1,14);

/*Table structure for table `user_menu` */

DROP TABLE IF EXISTS `user_menu`;

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) CHARACTER SET utf8 NOT NULL,
  `icon` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `user_menu` */

insert  into `user_menu`(`id`,`menu`,`icon`) values (1,'Admin','nav-icon fas fa-tachometer-alt'),(2,'User','nav-icon fas fa-users'),(3,'Menu','nav-icon fas fa-folder'),(13,'Inventory','nav-icon fas fa-warehouse'),(14,'Transaction','nav-icon fas fa-money-bill');

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `user_sub_menu` */

insert  into `user_sub_menu`(`id`,`menu_id`,`title`,`url`,`icon`,`is_active`) values (1,1,'Dashboard','admin','fas fa-columns nav-icon',1),(2,2,'My Profile','user/my_profile/','fas fa-user nav-icon',1),(3,3,'Menu Management','menu/','fas fa-folder-open nav-icon',1),(4,3,'Submenu Management','menu/submenu/','fas fa-folder-open nav-icon',1),(9,1,'Role Management','admin/role/','nav-icon fas fa-user-tie',1),(10,2,'Edit Profile','user/edit/','nav-icon fas fa-user-edit',1),(11,2,'Change Password','user/ubahpassword/','nav-icon fas fa-key',1),(12,6,'Daftar Induk SK','arsip/','nav-icon fas fa-book-open',1),(13,7,'Laporan','permohonan/laporan','nav-icon fas fa-users',1),(15,10,'Tambah Usulan','cuti/tambahUsulan/','nav-icon fas fa-plus',1),(17,10,'Dasboard','cuti/','nav-icon fas fa-circle',1),(19,11,'Sisa Cuti','manajemen/sisaCuti','nav-icon fas fa-plus',1),(20,11,'Approval','manajemen/','nav-icon fas fa-plus',1),(22,11,'Pegawai','manajemen/pegawai','nav-icon fas fa-plus',1),(23,11,'Laporan','manajemen/laporan','nav-icon fas fa-plus',1),(24,11,'Kendali','manajemen/kendali','nav-icon fas fa-plus',1),(25,13,'Data PC','inventory/data_pc/','nav-icon fas fa-desktop',1),(26,13,'Data Laptop','inventory/data_laptop/','nav-icon fas fa-laptop',1),(27,13,'Data Printer','inventory/data_printer/','nav-icon fas fa-print',1),(28,14,'Data Transaksi','transaction/data_transaksi/','nav-icon fas fa-warehouse',1),(29,14,'Laporan Transaksi','transaction/laporan/','nav-icon fas fa-table',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
