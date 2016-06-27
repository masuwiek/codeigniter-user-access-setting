-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 27. Juni 2016 jam 09:44
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mycrm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(35) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`groupid`, `groupname`, `description`) VALUES
(1, 'Super Admin', 'Untuk semua hak akses'),
(29, 'Admin', 'Hanya akses dashboard');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menuid` int(11) NOT NULL AUTO_INCREMENT,
  `menuparentid` int(11) NOT NULL,
  `menuname` varchar(30) NOT NULL,
  `menuicon` varchar(30) NOT NULL,
  `menulink` varchar(30) NOT NULL,
  `menucode` varchar(30) NOT NULL,
  `menuavail` varchar(20) NOT NULL,
  `menusort` int(11) NOT NULL,
  PRIMARY KEY (`menuid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`menuid`, `menuparentid`, `menuname`, `menuicon`, `menulink`, `menucode`, `menuavail`, `menusort`) VALUES
(1, 0, 'Dashboard', 'icon-home', 'dashboard', 'dashboard', 'view', 0),
(2, 0, 'Setting', 'icon-settings', 'setting', 'setting', 'view', 2),
(3, 2, 'User', '', 'setting/user', 'user', 'view,add,edit,del', 0),
(4, 2, 'Menu', '', 'setting/menu', 'menu', 'view,add,edit,del', 0),
(5, 2, 'User Group', '', 'setting/user_group', 'user_group', 'view,add,edit,del', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menuaccess`
--

CREATE TABLE IF NOT EXISTS `menuaccess` (
  `menuaccessid` int(11) NOT NULL AUTO_INCREMENT,
  `menuid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `add` int(11) NOT NULL,
  `edit` int(11) NOT NULL,
  `del` int(11) NOT NULL,
  PRIMARY KEY (`menuaccessid`),
  KEY `menuid` (`menuid`),
  KEY `groupid` (`groupid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=157 ;

--
-- Dumping data untuk tabel `menuaccess`
--

INSERT INTO `menuaccess` (`menuaccessid`, `menuid`, `groupid`, `view`, `add`, `edit`, `del`) VALUES
(21, 1, 29, 1, 0, 0, 0),
(22, 2, 29, 0, 0, 0, 0),
(23, 5, 29, 0, 0, 0, 0),
(24, 4, 29, 0, 0, 0, 0),
(25, 3, 29, 0, 0, 0, 0),
(146, 2, 1, 1, 0, 0, 0),
(149, 1, 1, 1, 0, 0, 0),
(154, 5, 1, 1, 1, 1, 1),
(155, 4, 1, 1, 1, 1, 1),
(156, 3, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(35) NOT NULL,
  `phone` varchar(35) NOT NULL,
  `groupid` int(11) NOT NULL,
  `entryby` varchar(30) NOT NULL,
  `entrydate` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  `lastipaddress` varchar(30) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `groupid`, `entryby`, `entrydate`, `lastlogin`, `lastipaddress`) VALUES
(1, 'Administrator', '7c222fb2927d828af22f592134e8932480637c0d', 'masuwiek@gmail.com', 'Dwi', 'Setyawan', '082111871881', 1, '', '0000-00-00 00:00:00', '2016-06-27 09:42:36', '::1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
