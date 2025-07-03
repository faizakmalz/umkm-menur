-- MySQL dump 10.13  Distrib 8.0.38, for macos14 (arm64)
--
-- Host: localhost    Database: umkm_menur
-- ------------------------------------------------------
-- Server version	9.0.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Makanan',NULL,NULL),(2,'Minuman',NULL,NULL),(3,'Kue',NULL,NULL),(4,'Jajanan',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `toko_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `nama_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_toko_id_foreign` (`toko_id`),
  KEY `menus_category_id_foreign` (`category_id`),
  CONSTRAINT `menus_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `menus_toko_id_foreign` FOREIGN KEY (`toko_id`) REFERENCES `tokos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,2,1,'Nasi Kuningg',12000.00,'Menu nasi kuning dengan lauk ayam goreng serta hidangan pendamping berupa bihun goreng dan kering tempe.','menus/BfpDdpt3mbXA9qM5qB73QiEpgEvd20fmRRMcizjJ.png',NULL,'2025-07-02 18:40:34'),(2,2,1,'Nasi Ayam Geprekk',10000.00,'Menu nasi dengan lauk ayam yang digeprek dengan sambal dan dilengkapi dengan lalapan segar','menus/SefkhiBbdcOOQ4gwl2x7nQ6IjMk0N7HR5H7aLwPC.jpg',NULL,'2025-07-02 18:41:44'),(3,2,4,'Macaroni Schotel',80000.00,'Menu macaroni yang dipanggang dengan krim, susu, dan keju.',NULL,NULL,NULL),(4,2,4,'Salad Buah',12000.00,'Potongan Buah segar dengan saus mayo',NULL,NULL,NULL),(5,2,3,'Puding Cup',4000.00,'Puding varian coklat dan strawberry dengan topping fla dan potongan buah',NULL,NULL,NULL),(6,2,3,'Pudding tart',60000.00,'pudding tart dengan topping fla dan potongan buah',NULL,NULL,NULL),(7,2,3,'Puding sedot',8000.00,'Puding lembut dengan varian rasa',NULL,NULL,NULL),(8,2,4,'Risol Mayo',2500.00,'',NULL,NULL,'2025-07-01 23:10:50'),(9,2,4,'Risol Ayam',2500.00,'',NULL,NULL,'2025-07-01 23:10:50'),(10,2,4,'Pisang Coklat',2500.00,'',NULL,NULL,'2025-07-01 23:10:50'),(11,2,4,'Tahu Isi',2500.00,'',NULL,NULL,'2025-07-01 23:10:50'),(12,2,4,'Ote-ote',1000.00,'',NULL,NULL,'2025-07-01 23:10:50'),(13,2,4,'Bakwan Jagung',1000.00,'','menus/8yDtGSEk0AFTeYpCOAQgNm5ooTae2xAqqWKKorwd.png',NULL,'2025-07-02 19:06:18'),(14,2,1,'testes',2222.00,'222','menus/Wev0BDTTYGJhSx9Po5PRBo3xnNpeq6bvUkU3e29m.webp','2025-07-02 19:06:46','2025-07-02 19:06:46'),(15,2,2,'menu baru',10000.00,'testes','menus/hE6dDWgKsHDmdmwyq1IwHeXHfbSgYzRmdbmssWkc.jpg','2025-07-02 19:07:20','2025-07-02 19:07:20'),(16,2,4,'tes 2',11111.00,'12201','menus/trCmbi07Wcl0BCwwiDXjnCIpdkYEAxJLCNMfeNBZ.png','2025-07-02 19:21:17','2025-07-02 19:21:17'),(17,14,1,'new menu',12000.00,'1212','menus/8ebQG2eyrpnWL2RjoMJHijS7HNGQRgWcsrhVXSOy.png','2025-07-02 19:31:02','2025-07-02 19:31:02'),(18,14,1,'wsw',222.00,'dsds','menus/H6pIrdmvXwLq4Fyrby9q6CSLdbmgOYc2GMRrdGDH.png','2025-07-02 21:22:29','2025-07-02 21:22:29'),(19,15,1,'ddfdf',3223.00,'efefe','menus/jURHmbkgWre3XYamWnjhU96bvA1O86mzaxXQ9AaV.webp','2025-07-02 21:22:48','2025-07-02 21:22:48');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tokos`
--

DROP TABLE IF EXISTS `tokos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tokos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_toko` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tokos`
--

LOCK TABLES `tokos` WRITE;
/*!40000 ALTER TABLE `tokos` DISABLE KEYS */;
INSERT INTO `tokos` VALUES (1,NULL,'2025-07-01 20:50:26','Dapur Bu Santi','Jl. Menur III No. 71','+6282783827269','UMKM yang memproduksi Berbagai olahan makanan berupa nasi tumpeng, nasi kuning, nasi bungkus dengan sajian yang menarik. Dapur Bu Santi juga menjual olahan makanan lain sejenis camilan seperti risoles yang terdiri dari varian ayam dan mayo, berbagai jenis gorengan, kering tempe, dimsum, dan lainnya.',NULL),(2,NULL,'2025-07-01 23:10:50','Dapur Bunda Sarii','JL. Menur III No. 75. A','+6285749733725','UMKM Spesialis Nasi Kuning dengan berbagai pilihan lauk diatasnya seperti ayam goreng, sate, telur dadar, dan ikan. Dapur Bunda Sari juga menawarkan berbagai macam kue dan dessert yang rasanya dijamin akan memanjakan lidah.','logos/JoPG8SN4T6eAa2TulzMcLZvt2iuBHWsZlLhisLZL.png'),(3,NULL,NULL,'TIGA PUTRI','Jl. Menur III No. 71','+6285645858655','UMKM spesialis produksi keripik tempe rumahan yang dalam komposisinya tidak menggunakan bahan kimia maupun pengawet. UMKM Tiga Putri menjual keripik tempe dalam berbagai ukuran, diantaranya 1 ons, 1/4kg, dan 1/2 kg.',NULL),(4,NULL,NULL,'Pawon Mama 25','Jl. Menur III No. 25','+6285749733736','Pawon Mama 25 memproduksi berbagai olahan kue basah dan kering. Kue kering diantaranya seperti kue sagu keju, kue pastel, naster, dan kue salju. Untuk Kue basah diantaranya seperti lemper, nagasari, lumpia. Pawon Mama 25 juga menjual minuman coklat dalam kemasan botol.',NULL),(5,NULL,NULL,'D\'teguk Ing Eijaz','Jl. Menur III No. 49','+6285749733736','D\'teguk Ing Eijaz merupakan nama sebuah produk sari kedelai D\'teguk Ing Eijaz memiliki varian raswa original dan coklat yang tentunya sangat nikmat. Sari kedelai D\'teguk Ing Eijaz memiliki berbagai manfaat bagi tubuh kita. Seperti menurunkan berat badan dan lain-lain.',NULL),(6,NULL,NULL,'Dapur Bu Tutik','Jl. Menur III No. 71','+628155903911','Dapur Bu Tutik memproduksi berbagai macam botok, sayur mayur, brengkes, dan jajanan tradisional. Memiliki cita rasa, rempah-rempah, dan aroma yang khas nusantara dan cocok untuk dimakan dengan nasi hangat. Nikmati sajian Dapur Ibu Tutik yang begitu menggugah selera.',NULL),(7,NULL,NULL,'Ketan Ajib','Jl. Menur III No. 53','+6285608380349','Ketan Ajib memproduksi berbagai jenis ketan dengan varian rasa yang sangat enak. Varian rasa yang dimiliki antaranya, ketan original, ketan susu, dan ketan keju. Cita rasa yang dimiliki oleh ketan ajib sangat khas dan enak karena dipadukan dengan berbagai toping yang berkualitas premium',NULL),(8,NULL,NULL,'Kue Delah','Jl.Menur III No.53','+6285856619047','Kue Delah menyediakan berbagai kue tradisional yang sangat lezat dan cita rasa yang khas. Kue tradisional produksi KueDelah dijual dengan harga yang sangat terjangkau. Kue Delah biasanya memproduksi kue klepon, kue nagasari, serta kue koci-koci.',NULL),(9,NULL,NULL,'Cook 9 Star','Jl. Menur III No. 49','+6285857315172','Cookies 9 Star menyediakan berbagai kue kering seperti kue pastel mini abon, nastar kurma, fla sus, dan kastengel. Cita rasa cookies 9 Star sangat enak dan lezat. Cocok untuk dijadikan camilah dan kue hampers untuk hari raya idul fitri. Mari beli Cookies 9 Star untuk menambah warna harimu.',NULL),(10,NULL,NULL,'Dapoer Mama Noer','Jl. Menur III No.51','+6285785206792','Dapur Mama Noer memproduksi berbagai macam penyetan dan kue seperti penyet ayam goreng, penyet lele, penyet tempe tahu dan untuk kue ada donat, lemper, roti panada. Memiliki cita rasa yang khas dan nikmat',NULL),(11,NULL,NULL,'Kedai Larasati','Jl. Menur III No.51','+6285933825866','Kedai larasati merupakan spesialis ayam di wilayah RW 09. Kedai larasati menyediakan berbagai menu ayam diantaranya ayam geprek, ayam crispy, telur geprek, mie ayam geprek, dan nasi goreng ayam katsu. Cita rasa yang dimiliki sangat menggugah selera nafsu makan.',NULL),(14,'2025-07-02 19:31:02','2025-07-02 19:32:14','New Toko',NULL,'+6282783827269','12','logos/JNPBD3VrP7CdEE1N0BZPxflq2f9i0Bgl8uEeoJ4H.webp'),(15,'2025-07-02 21:21:38','2025-07-02 21:21:38','Tes Toko 3',NULL,'+6282783827269','sdfsdfsd','logos/chvhvu9nphB2oEly5Hth1j8EVbw8nL9W6nqsZsEk.png');
/*!40000 ALTER TABLE `tokos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'faza','faza@mail.com',NULL,'$2y$12$tU8WCNfvU.Oy.KhJXzdSjeNwXoKdy3tAafUvDr1IMicnUT/tZ2IU.',NULL,'2025-06-27 01:16:01','2025-06-27 01:16:01'),(2,'faza','faza2@mail.com',NULL,'$2y$12$nylAKnVLVZGAm0RsUJDlN.c1VPwutTs0Hjv00oDXt/qsurSCBazbS',NULL,'2025-07-01 07:07:11','2025-07-01 07:07:11');
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

-- Dump completed on 2025-07-03 11:27:03
