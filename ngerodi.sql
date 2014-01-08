-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 03 Jan 2014 pada 01.30
-- Versi Server: 5.5.33-MariaDB
-- Versi PHP: 5.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `ngerodi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `prosesor` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `terproses` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `nama`, `prosesor`, `status`, `terproses`) VALUES
(1, 'Gaussian Tugas Grid', 4, 1, 1),
(2, 'Hello World', 1, 1, 1),
(3, 'Hello World 2', 10, 1, 1),
(4, 'Hello World 3', 5, 1, 1),
(5, 'Hello World 5', 5, 1, 1),
(6, 'Hello World 6', 1, 1, 1),
(7, 'Hello World 7', 1, 1, 1),
(8, 'Hello World 8', 6, 1, 1),
(9, 'Hello World 9', 9, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
