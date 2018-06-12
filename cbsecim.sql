-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 12 Haz 2018, 04:12:54
-- Sunucu sürümü: 5.7.21
-- PHP Sürümü: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cbsecim`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aday`
--

DROP TABLE IF EXISTS `aday`;
CREATE TABLE IF NOT EXISTS `aday` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_soyad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `sira` smallint(3) NOT NULL,
  `sef` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `aday`
--

INSERT INTO `aday` (`id`, `ad_soyad`, `resim`, `sira`, `sef`, `tarih`) VALUES
(48, 'Meral Akşener', '722201.jpg', 2, 'meral-aksener', '2018-05-27 17:33:29'),
(49, 'Recep Tayyip Erdoğan', '1003901.jpg', 0, 'recep-tayyip-erdogan', '2018-05-27 17:33:37'),
(50, 'Selahattin Demirtaş', '938001.jpg', 5, 'selahattin-demirtas', '2018-05-27 17:33:52'),
(51, 'Temel Karamanoğlu', '1690901.jpg', 4, 'temel-karamanoglu', '2018-05-27 17:34:01'),
(52, 'Doğu Perinçek', '1785801.jpg', 3, 'dogu-perincek', '2018-05-27 17:34:12'),
(53, 'Muharrem İnce', '3272301.jpg', 1, 'muharrem-ince', '2018-05-27 17:35:19');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

DROP TABLE IF EXISTS `ayar`;
CREATE TABLE IF NOT EXISTS `ayar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(333) COLLATE utf8_turkish_ci NOT NULL,
  `tur` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(222) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`id`, `ad`, `tur`, `aciklama`) VALUES
(3, 'keywords', 'seçim, anket scripti , cumhurbaşkanlık seçimi\r\n', ''),
(4, 'author', 'Ertugrul Deniz', ''),
(9, 'title', 'Cb Seçim Anketi', ''),
(15, 'description', ' bu alana gelecek ALAN :)', ''),
(17, 'oyturu', '1', 'mail'),
(18, 'oyturu', '0', 'sms');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE IF NOT EXISTS `kullanici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `kayıt_tarihi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `mail`, `sifre`, `kayıt_tarihi`, `username`) VALUES
(1, 'ertugruldeniz@outlook.com.tr', 'e10adc3949ba59abbe56e057f20f883e', '2018-05-27 11:25:13', 'Ertuğrul Deniz');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
