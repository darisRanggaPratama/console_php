-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Des 2015 pada 15.36
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog_crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` text,
  `email` varchar(100) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `jk` char(1) NOT NULL,
  `status` char(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `nama`, `alamat`, `email`, `agama`, `jk`, `status`, `created_date`, `modified_date`) VALUES
(1, 'edi sutanto    ', 'Jakarta', 'edisutanto007@gmail.com', 'Islam', 'L', 'A', '2015-12-24 20:00:00', '2015-12-26 20:45:53'),
(2, 'Alex', 'Lampung', 'aaaa@gmail.com', 'Kristen', 'L', 'A', '2015-12-26 21:35:28', NULL),
(3, 'Dewi', 'Bekasi', 'ddd@gmail.com', 'Katolik', 'P', 'T', '2015-12-26 21:35:58', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
