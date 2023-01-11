/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100119
 Source Host           : localhost:3306
 Source Schema         : sorumvar

 Target Server Type    : MySQL
 Target Server Version : 100119
 File Encoding         : 65001

 Date: 26/05/2018 06:39:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ayarlar
-- ----------------------------
DROP TABLE IF EXISTS `ayarlar`;
CREATE TABLE `ayarlar`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ayar` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `deger` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ayarlar
-- ----------------------------
INSERT INTO `ayarlar` VALUES (1, 'siteBasligi', 'SorumVar');
INSERT INTO `ayarlar` VALUES (2, 'dil', 'tr');
INSERT INTO `ayarlar` VALUES (3, 'tasarımcı', 'Colorlib');
INSERT INTO `ayarlar` VALUES (4, 'tasarımcıLink', 'https://colorlib.com');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategoriBaslik` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `kategoriResim` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `gorunurluk` int(11) NULL DEFAULT NULL,
  `silinebilirlik` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Matematik', 'matematik.jpg', 1, 1);
INSERT INTO `kategori` VALUES (2, 'Biyoloji', 'biyoloji.jpg', 1, 1);
INSERT INTO `kategori` VALUES (3, 'Fizik', 'fizik.jpg', 1, 1);
INSERT INTO `kategori` VALUES (4, 'Kimya', 'kimya.jpg', 1, 1);
INSERT INTO `kategori` VALUES (5, 'Coğrafya', 'cografya.jpg', 1, 1);
INSERT INTO `kategori` VALUES (6, 'Tarih', 'tarih.jpg', 1, 1);

-- ----------------------------
-- Table structure for kullanici
-- ----------------------------
DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE `kullanici`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `cinsiyet` int(11) NOT NULL,
  `kAdi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kTarihi` datetime(6) NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kullanici
-- ----------------------------
INSERT INTO `kullanici` VALUES (1, 'mehmet şemdin', 'aktay', 2, 'admin', '*E6CC90B878B948C35E92B003C792C46C58C4AF40', 'mehmetsemdinaktay@gmail.com', '5428925988', '2018-04-27 16:24:40.000000', 'avatar.png', 1);
INSERT INTO `kullanici` VALUES (2, 'test2', 'soyad', 1, 'test', '*E6CC90B878B948C35E92B003C792C46C58C4AF40', 'test@gmail.com', '5325945175', '2018-04-11 01:27:27.000000', 'avatar2.png', 0);
INSERT INTO `kullanici` VALUES (3, 'deneme', 'hesap', 2, 'denemehesap', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'deneme@hotmail.com', '5555555555', '2018-05-24 01:11:49.000000', 'avatar.png', 0);
INSERT INTO `kullanici` VALUES (4, 'Mehmet Şemdin', 'Aktay', 1, 'mehmett', '*6F469890BCDCD2B4E43845B8FE2F781FE45B4A71', 'deneme123@hotmail.com', '5428925988', '2018-05-24 03:37:45.000000', 'avatar.png', 1);
INSERT INTO `kullanici` VALUES (5, 'deneme22', 'hesap22', 2, 'denemehesap22', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'deneme22@hotmail.com', '5555555522', '2018-05-24 01:11:49.000000', 'avatar.png', 0);

-- ----------------------------
-- Table structure for linkler
-- ----------------------------
DROP TABLE IF EXISTS `linkler`;
CREATE TABLE `linkler`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ustBaslik` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `gorunurluk` int(11) NOT NULL,
  `silinebilirlik` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of linkler
-- ----------------------------
INSERT INTO `linkler` VALUES (1, 'anasayfa', '', 'Anasayfa', 1, 1);
INSERT INTO `linkler` VALUES (2, 'kayit', 'index.php?s=kayit', 'Kayıt Ol', 0, 1);
INSERT INTO `linkler` VALUES (3, 'hata', 'index.php?s=hata', 'HATA', 0, 1);
INSERT INTO `linkler` VALUES (4, 'giris', 'index.php?s=giris', 'Giriş', 0, 0);
INSERT INTO `linkler` VALUES (5, 'hesap', 'index.php?s=hesap', 'Hesap Yönetimi', 0, 1);
INSERT INTO `linkler` VALUES (6, 'cikis', 'index.php?s=cikis', 'Çıkış Yap', 0, 0);
INSERT INTO `linkler` VALUES (7, 'soruekle', 'index.php?s=soruekle', 'Soru Ekle', 0, 0);
INSERT INTO `linkler` VALUES (8, 'yorumekle', 'index.php?s=yorumekle', 'Yorum Ekle', 0, 0);
INSERT INTO `linkler` VALUES (9, 'sorulistele', 'index.php?s=sorulistele', 'Soru Listele', 0, 0);
INSERT INTO `linkler` VALUES (10, 'klistele', 'index.php?s=klistele', 'Kullanıcı Listele', 0, 0);
INSERT INTO `linkler` VALUES (11, 'siteayar', 'index.php?s=siteayar', 'Site Ayarları', 0, 0);
INSERT INTO `linkler` VALUES (12, 'sorulog', 'index.php?s=sorulog', 'Soru Okuma Logları', 0, 0);

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log`  (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `log_soru_id` int(11) NULL DEFAULT NULL,
  `tarih` datetime(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES (1, '::1', 20, '2018-05-26 05:55:07.000000');
INSERT INTO `log` VALUES (2, '::1', 22, '2018-05-26 05:57:53.000000');

-- ----------------------------
-- Table structure for sorular
-- ----------------------------
DROP TABLE IF EXISTS `sorular`;
CREATE TABLE `sorular`  (
  `soru_id` int(11) NOT NULL AUTO_INCREMENT,
  `soru_baslik` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `soru_icerik` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL,
  `yazar_id` int(11) NULL DEFAULT NULL,
  `kategori_id` int(11) NULL DEFAULT NULL,
  `yazim_tarihi` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `goruntulenme` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`soru_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sorular
-- ----------------------------
INSERT INTO `sorular` VALUES (1, 'deneme konu', '<b> 1bu bir deneme konudur. </b>', 1, 1, '2018-04-17 01:27:06', 100);
INSERT INTO `sorular` VALUES (2, 'deneme konu', '<b> 2bu bir deneme konudur. </b>', 1, 5, '2018-04-17 01:27:21', 7);
INSERT INTO `sorular` VALUES (3, 'deneme konu', '<b> 3bu bir deneme konudur. </b>', 1, 2, '2018-05-25 03:53:46', 2);
INSERT INTO `sorular` VALUES (4, 'deneme konu', '<b> 4bu bir deneme konudur. </b>', 2, 3, '2018-04-19 13:21:27', 126);
INSERT INTO `sorular` VALUES (5, 'deneme konu', '<b> 5bu bir deneme konudur. </b>', 1, 1, '2018-04-13 16:50:26', 125);
INSERT INTO `sorular` VALUES (6, 'deneme konu', '<b> 6bu bir deneme konudur. </b>', 1, 1, '2018-04-19 13:20:07', 126);
INSERT INTO `sorular` VALUES (11, 'Soru gönderme denemesi', '<h1><strong><s>sfasfasfasf</s></strong></h1>\r\n', 1, 4, '2018-04-17 21:11:52', 1);
INSERT INTO `sorular` VALUES (12, 'Soru gönderme denemesi', '<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:sorumvar/7ea92b72-0e77-4b7a-b7bf-262f6ef9b46f\" width=\"512\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 2, '2018-04-17 21:12:30', 1);
INSERT INTO `sorular` VALUES (13, 'Soru gönderme denemesi resimli', '<p><strong>Soru 1)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"/sorumvar/ckeditor/kcfinder/upload/images/34978-200.png\" style=\"height:200px; width:200px\" /></p>\r\n', 1, 2, '2018-04-17 21:36:53', 1);
INSERT INTO `sorular` VALUES (14, 'Fizik sorusu', '<p><img alt=\"\" src=\"http://www.onlinesunu.com/wp-content/uploads/9.SINIF-F%C4%B0Z%C4%B0K-ENERJ%C4%B0-%C3%87%C3%96Z%C3%9CML%C3%9C-TEST%C4%B0-13.SORU-MAKARA-K%C4%B0NET%C4%B0K-ENERJ%C4%B0S%C4%B0-SORUSU.gif\" style=\"height:211px; width:274px\" /></p>\r\n', 3, 1, '2018-04-20 00:14:01', 1);
INSERT INTO `sorular` VALUES (18, 'Selam', '<h1><strong>selam</strong></h1>\r\n', 1, 1, '2018-04-22 16:31:04', 1);
INSERT INTO `sorular` VALUES (19, 'Soru gönderme yönlendirme denemesi', '<p>Deneme 123</p>\r\n', 1, 1, '2018-04-22 16:46:43', 1);
INSERT INTO `sorular` VALUES (20, 'Kategori seçerek soru gönderme', '<p>Deneme 123</p>\r\n', 1, 4, '2018-05-26 05:55:07', 2);
INSERT INTO `sorular` VALUES (21, 'Kategori seçerek soru gönderme', '<p>Tarih</p>\r\n', 1, 6, '2018-04-22 16:51:34', 1);
INSERT INTO `sorular` VALUES (22, 'Soru Sayısı arttırma', '<p>soru sayısı denemesi</p>\r\n', 1, 2, '2018-05-26 05:57:53', 2);

-- ----------------------------
-- Table structure for sosyal
-- ----------------------------
DROP TABLE IF EXISTS `sosyal`;
CREATE TABLE `sosyal`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isim` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `resimLink` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `gorunurluk` int(11) NOT NULL,
  `silinebilirik` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sosyal
-- ----------------------------
INSERT INTO `sosyal` VALUES (1, 'facebook', '#', 'ion-social-facebook-outline', 1, 1);
INSERT INTO `sosyal` VALUES (2, 'twitter', '#', 'ion-social-twitter-outline', 1, 1);
INSERT INTO `sosyal` VALUES (3, 'instagram', '#', 'ion-social-instagram-outline', 1, 1);
INSERT INTO `sosyal` VALUES (4, 'vimeo', '#', 'ion-social-vimeo-outline', 1, 1);
INSERT INTO `sosyal` VALUES (5, 'pinterest', '#', 'ion-social-pinterest-outline', 1, 1);

-- ----------------------------
-- Table structure for yorumlar
-- ----------------------------
DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE `yorumlar`  (
  `yorum_id` int(11) NOT NULL AUTO_INCREMENT,
  `yorum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL,
  `yorumcu_id` int(11) NULL DEFAULT NULL,
  `yorum_soru_id` int(11) NULL DEFAULT NULL,
  `gonderme_tarihi` datetime(0) NULL DEFAULT NULL,
  `onem` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`yorum_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of yorumlar
-- ----------------------------
INSERT INTO `yorumlar` VALUES (1, 'deneme yorum', 1, 1, '2018-04-16 00:19:26', 0);
INSERT INTO `yorumlar` VALUES (2, 'deneme yorummmmmmmmmmmmm 2', 2, 1, '2018-04-17 00:44:13', 0);
INSERT INTO `yorumlar` VALUES (3, '<p>selamlar</p>\r\n', 1, 13, '2018-04-20 11:12:23', 0);
INSERT INTO `yorumlar` VALUES (4, '<p>sa</p>\r\n', 1, 13, '2018-04-20 11:14:16', 0);
INSERT INTO `yorumlar` VALUES (5, '<p>sa</p>\r\n', 1, 13, '2018-04-20 11:14:29', 0);
INSERT INTO `yorumlar` VALUES (6, '<p>sa</p>\r\n', 1, 13, '2018-04-20 11:14:47', 0);
INSERT INTO `yorumlar` VALUES (7, '<p>selamlar</p>\r\n', 1, 13, '2018-04-20 12:52:01', 0);
INSERT INTO `yorumlar` VALUES (8, '<p>Konu yeri yanlış matematik bura</p>\r\n', 2, 14, '2018-04-20 13:41:08', 0);
INSERT INTO `yorumlar` VALUES (9, '<p>aynen</p>\r\n', 1, 14, '2018-04-22 16:19:28', 0);
INSERT INTO `yorumlar` VALUES (10, '<p>&lt;h1&gt;okey&lt;/h1&gt;</p>\r\n', 1, 14, '2018-04-22 16:21:25', 0);
INSERT INTO `yorumlar` VALUES (11, '<p>&lt;b&gt; okey &lt;/b&gt;</p>\r\n', 1, 14, '2018-04-22 16:21:43', 0);
INSERT INTO `yorumlar` VALUES (12, '<p>tamam ze</p>\r\n', 1, 14, '2018-04-22 16:21:59', 0);
INSERT INTO `yorumlar` VALUES (13, '<p>yorum sayısı deneme</p>\r\n', 1, 22, '2018-04-22 17:39:04', 0);
INSERT INTO `yorumlar` VALUES (14, '<p>yorum sayısı deneme</p>\r\n', 1, 22, '2018-04-22 17:39:36', 0);
INSERT INTO `yorumlar` VALUES (15, '<p>test</p>\r\n', 1, 22, '2018-05-22 23:07:44', 0);

SET FOREIGN_KEY_CHECKS = 1;
