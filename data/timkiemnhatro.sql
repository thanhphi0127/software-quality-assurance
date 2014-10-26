-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 26 Octobre 2014 à 14:45
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `timkiemnhatro`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `MSADMIN` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `HOTEN` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `GIOITINH` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` decimal(11,0) NOT NULL,
  `MAIL` char(60) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYSINH` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `chitietduyetnhatro`
--

CREATE TABLE IF NOT EXISTS `chitietduyetnhatro` (
  `MA_NHATRO` bigint(20) NOT NULL,
  `MSADMIN` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYDUYET` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `chunhatro`
--

CREATE TABLE IF NOT EXISTS `chunhatro` (
  `MSCHU` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `USERNAME` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `MA_DUONG` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `HOTEN` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` decimal(11,0) NOT NULL,
  `MAIL` char(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIOITINH` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NGAYSINH` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `chunhatro`
--

INSERT INTO `chunhatro` (`MSCHU`, `USERNAME`, `MA_DUONG`, `HOTEN`, `SDT`, `MAIL`, `GIOITINH`, `NGAYSINH`) VALUES
('1', 'nva', 'bth', 'nguyen van a', '913456789', 'a@gmail.com', 'nam', '2014-10-14 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `dangtindiendan`
--

CREATE TABLE IF NOT EXISTS `dangtindiendan` (
`MA_DANGTIN` bigint(20) NOT NULL,
  `NGUOIDANG` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `TIEUDE` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYDANG` datetime NOT NULL,
  `NOIDUNG` text COLLATE utf8_unicode_ci NOT NULL,
  `TRANGTHAI` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `dangtindiendan`
--

INSERT INTO `dangtindiendan` (`MA_DANGTIN`, `NGUOIDANG`, `TIEUDE`, `NGAYDANG`, `NOIDUNG`, `TRANGTHAI`) VALUES
(4, 'nva', 'khong co tieu de', '0000-00-00 00:00:00', 'sfsd sdfsdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `danhgia`
--

CREATE TABLE IF NOT EXISTS `danhgia` (
  `MSTHANHVIEN` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `MA_NHATRO` bigint(20) NOT NULL,
  `THOIGIAN` datetime DEFAULT NULL,
  `MUCDODANHGIA` decimal(1,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `danhgia`
--

INSERT INTO `danhgia` (`MSTHANHVIEN`, `MA_NHATRO`, `THOIGIAN`, `MUCDODANHGIA`) VALUES
('nva', 40, '2014-10-26 00:00:00', '3');

-- --------------------------------------------------------

--
-- Structure de la table `duong`
--

CREATE TABLE IF NOT EXISTS `duong` (
  `MA_PHUONGXA` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `TEN_DUONG` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `MA_DUONG` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `duong`
--

INSERT INTO `duong` (`MA_PHUONGXA`, `TEN_DUONG`, `MA_DUONG`) VALUES
('hl', '3 thang 2', 'bth');

-- --------------------------------------------------------

--
-- Structure de la table `gopy`
--

CREATE TABLE IF NOT EXISTS `gopy` (
`MA_GOPY` bigint(20) NOT NULL,
  `MSTHANHVIEN` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `MA_NHATRO` bigint(20) NOT NULL,
  `THOIGIAN` datetime DEFAULT NULL,
  `NOIDUNG` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `nguoidung`
--

CREATE TABLE IF NOT EXISTS `nguoidung` (
  `USERNAME` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `MA_QUYEN` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` char(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `nguoidung`
--

INSERT INTO `nguoidung` (`USERNAME`, `MA_QUYEN`, `PASSWORD`) VALUES
('nva', '2', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `nhatro`
--

CREATE TABLE IF NOT EXISTS `nhatro` (
`MA_NHATRO` bigint(20) NOT NULL,
  `MSCHU` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `MA_DUONG` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `MOTA` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NAU_AN` tinyint(1) DEFAULT NULL,
  `TOILETTRONG` tinyint(1) DEFAULT NULL,
  `BAIDAUXE` tinyint(1) DEFAULT NULL,
  `SO` text COLLATE utf8_unicode_ci,
  `LUOCXEM` smallint(6) DEFAULT NULL,
  `HINHANH` char(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TUQUAN` tinyint(1) DEFAULT NULL,
  `GIODONGCUA` decimal(2,0) DEFAULT NULL,
  `NGAYDANG` datetime NOT NULL,
  `STATUS` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

--
-- Contenu de la table `nhatro`
--

INSERT INTO `nhatro` (`MA_NHATRO`, `MSCHU`, `MA_DUONG`, `MOTA`, `NAU_AN`, `TOILETTRONG`, `BAIDAUXE`, `SO`, `LUOCXEM`, `HINHANH`, `TUQUAN`, `GIODONGCUA`, `NGAYDANG`, `STATUS`) VALUES
(9, '1', 'bth', 'mo ta', 1, 0, 0, 'zc', 2, NULL, 1, '0', '0000-00-00 00:00:00', 0),
(13, '1', 'bth', 'fsfsf sfsf fsfs', 0, 1, 0, '2dsds sfsfs', 2, NULL, 1, '1', '2014-10-23 00:00:00', NULL),
(14, '1', 'bth', 'dsad a hdadhajdh jadhakdjah', 1, 0, 0, 'dadsad asdad', 2, NULL, 1, '2', '2014-10-23 00:00:00', NULL),
(15, '1', 'bth', 'iyuyui dgdfgdgd', 1, 0, 0, 'wrsfsf sfs', 2, NULL, 1, '1', '2014-10-23 00:00:00', NULL),
(19, '1', 'bth', 'sfsfsfsfs', 0, 0, 0, 'sdfsfs', 2, NULL, 1, '0', '2014-10-23 00:00:00', 0),
(20, '1', 'bth', 'sfsdfsf75665 675756 y46464', 1, 0, 0, '0987654fghfds sdfsf', 2, NULL, 1, '3', '2014-10-23 00:00:00', 0),
(21, '1', 'bth', '53543453345 34434353', 1, 1, 1, '34535345', 2, NULL, 1, '3', '2014-10-23 00:00:00', 0),
(22, '1', 'bth', 'fsdfsf htttuytu ttutuytu', 1, 1, 0, '2dsds sfsfs', 2, NULL, 1, '22', '2014-10-23 00:00:00', 0),
(24, '1', 'bth', '', 0, 0, 0, '', 2, NULL, 1, '0', '2014-10-23 00:00:00', 0),
(25, '1', 'bth', 'yuriopewhfdjksl;abvcxn=-0987654', 0, 1, 0, '145 hem 51', 2, NULL, 1, '22', '2014-10-23 00:00:00', 0),
(26, '1', 'bth', 'fggfh', 0, 0, 1, '145 hem 51', 2, NULL, 1, '22', '2014-10-23 00:00:00', 0),
(29, '1', 'bth', 'dsdsad dasdad dasdad', 1, 1, 1, '2dsds sfsfs', 2, NULL, 1, '23', '2014-10-23 00:00:00', 0),
(30, '1', 'bth', 'dsdsad dasdad dasdad', 1, 1, 1, '2dsds sfsfs', 2, NULL, 1, '23', '2014-10-23 00:00:00', 0),
(31, '1', 'bth', 'dsdsad dasdad dasdad', 1, 1, 1, '2dsds sfsfs', 2, NULL, 1, '23', '2014-10-23 00:00:00', 0),
(32, '1', 'bth', 'dsdsad dasdad dasdad', 1, 1, 1, '2dsds sfsfs', 2, NULL, 1, '23', '2014-10-23 00:00:00', 0),
(33, '1', 'bth', 'dsdsad dasdad dasdad', 1, 1, 1, '2dsds sfsfs', 2, NULL, 1, '23', '2014-10-23 00:00:00', 0),
(34, '1', 'bth', 'dsdsad dasdad dasdad', 1, 1, 1, '2dsds sfsfs', 2, NULL, 1, '23', '2014-10-23 00:00:00', 0),
(35, '1', 'bth', 'asdad', 0, 0, 1, '2dsds sfsfs', 2, NULL, 1, '23', '2014-10-23 00:00:00', 0),
(36, '1', 'bth', 'mnbv', 1, 0, 0, '34535345', 2, NULL, 1, '23', '2014-10-23 00:00:00', 0),
(37, '1', 'bth', 'dasdasd adadad', 0, 0, 0, 'sdadada', 2, NULL, 1, '23', '2014-10-23 00:00:00', 0),
(38, '1', 'bth', 'p0iuyuyuy', 1, 0, 0, 'zc', 2, NULL, 1, '22', '2014-10-23 00:00:00', 0),
(39, '1', 'bth', 'dfghjk', 0, 0, 0, '2dsds sfsfs', 2, NULL, 1, '23', '2014-10-23 00:00:00', 0),
(40, '1', 'bth', 'jjfhfh', 0, 1, 1, '2dsds sfsfs', 2, NULL, 1, '23', '2014-10-23 00:00:00', 0),
(41, '1', 'bth', 'dadas', 0, 1, 1, 'dsada', 2, NULL, 1, '22', '2014-10-23 00:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `phong`
--

CREATE TABLE IF NOT EXISTS `phong` (
  `MA_PHONG` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MA_NHATRO` bigint(20) NOT NULL,
  `SL_NGUOI` smallint(6) NOT NULL,
  `CONTRONG` tinyint(1) DEFAULT NULL,
  `DIENTICH` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIA` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `phong`
--

INSERT INTO `phong` (`MA_PHONG`, `MA_NHATRO`, `SL_NGUOI`, `CONTRONG`, `DIENTICH`, `GIA`) VALUES
('1', 41, 2, 11, '111', 1111.00),
('11', 40, 2, 11, '300', 111.00),
('12', 40, 2, 43, '222', 2222.00),
('13', 40, 2, 3, '3333', 3333.00);

-- --------------------------------------------------------

--
-- Structure de la table `phuongxa`
--

CREATE TABLE IF NOT EXISTS `phuongxa` (
  `MA_PHUONGXA` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `MA_HUYEN` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `TEN_PHUONGXA` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `phuongxa`
--

INSERT INTO `phuongxa` (`MA_PHUONGXA`, `MA_HUYEN`, `TEN_PHUONGXA`) VALUES
('ct', 'cr', 'cai tac'),
('hl', 'nk', 'hung loi'),
('hp', 'nk', 'hung phu');

-- --------------------------------------------------------

--
-- Structure de la table `quanhuyen`
--

CREATE TABLE IF NOT EXISTS `quanhuyen` (
  `MA_HUYEN` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `TENHUYEN` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `quanhuyen`
--

INSERT INTO `quanhuyen` (`MA_HUYEN`, `TENHUYEN`) VALUES
('cr', 'Cai Rang'),
('nk', 'Ninh Kieu');

-- --------------------------------------------------------

--
-- Structure de la table `quyen`
--

CREATE TABLE IF NOT EXISTS `quyen` (
  `MA_QUYEN` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `TENQUYEN` text COLLATE utf8_unicode_ci NOT NULL,
  `MOTA` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `quyen`
--

INSERT INTO `quyen` (`MA_QUYEN`, `TENQUYEN`, `MOTA`) VALUES
('1', 'admin', NULL),
('2', 'chunhatro', NULL),
('3', 'thanhvien', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `thanhvien`
--

CREATE TABLE IF NOT EXISTS `thanhvien` (
  `MSTHANHVIEN` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `HOTEN` char(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIOITINH` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MAIL` char(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` decimal(11,0) DEFAULT NULL,
  `DIACHI` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NGAYSINH` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `thanhvien`
--

INSERT INTO `thanhvien` (`MSTHANHVIEN`, `HOTEN`, `GIOITINH`, `MAIL`, `SDT`, `DIACHI`, `NGAYSINH`) VALUES
('nva', 'Nguyen Van A', 'nam', 'a@gmail.com', '4242423432', 'sdfs sfsf sfsdf', '2014-10-02 00:00:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`MSADMIN`);

--
-- Index pour la table `chitietduyetnhatro`
--
ALTER TABLE `chitietduyetnhatro`
 ADD PRIMARY KEY (`MA_NHATRO`,`MSADMIN`), ADD KEY `FK_XETDUYETTHONTIN` (`MSADMIN`);

--
-- Index pour la table `chunhatro`
--
ALTER TABLE `chunhatro`
 ADD PRIMARY KEY (`MSCHU`), ADD KEY `FK_CHUNHATRO_NGUOIDUNG` (`USERNAME`), ADD KEY `FK_DIACHI_CHUTRO` (`MA_DUONG`);

--
-- Index pour la table `dangtindiendan`
--
ALTER TABLE `dangtindiendan`
 ADD PRIMARY KEY (`MA_DANGTIN`), ADD UNIQUE KEY `MA_DANGTIN` (`MA_DANGTIN`), ADD KEY `FK_THANHVIEN_DANGTIN` (`NGUOIDANG`);

--
-- Index pour la table `danhgia`
--
ALTER TABLE `danhgia`
 ADD PRIMARY KEY (`MSTHANHVIEN`,`MA_NHATRO`), ADD KEY `FK_DANHGIA_NHATRO` (`MA_NHATRO`);

--
-- Index pour la table `duong`
--
ALTER TABLE `duong`
 ADD PRIMARY KEY (`MA_DUONG`), ADD KEY `FK_DUONG_PHUONG` (`MA_PHUONGXA`);

--
-- Index pour la table `gopy`
--
ALTER TABLE `gopy`
 ADD PRIMARY KEY (`MA_GOPY`), ADD UNIQUE KEY `MA_GOPY` (`MA_GOPY`), ADD KEY `FK_GOPY_NHATRO` (`MA_NHATRO`), ADD KEY `FK_NGUOIDUNG_GOPY` (`MSTHANHVIEN`);

--
-- Index pour la table `nguoidung`
--
ALTER TABLE `nguoidung`
 ADD PRIMARY KEY (`USERNAME`), ADD KEY `FK_QUYEN_ND` (`MA_QUYEN`);

--
-- Index pour la table `nhatro`
--
ALTER TABLE `nhatro`
 ADD PRIMARY KEY (`MA_NHATRO`), ADD UNIQUE KEY `MA_NHATRO` (`MA_NHATRO`), ADD KEY `FK_CHITIET_NHATRO` (`MSCHU`), ADD KEY `FK_NHATRO_THUOC_PHUONGXA` (`MA_DUONG`);

--
-- Index pour la table `phong`
--
ALTER TABLE `phong`
 ADD PRIMARY KEY (`MA_PHONG`,`MA_NHATRO`), ADD KEY `FK_NHATRO_PHONG` (`MA_NHATRO`);

--
-- Index pour la table `phuongxa`
--
ALTER TABLE `phuongxa`
 ADD PRIMARY KEY (`MA_PHUONGXA`), ADD KEY `FK_QUANHUYEN_PHUONGXA` (`MA_HUYEN`);

--
-- Index pour la table `quanhuyen`
--
ALTER TABLE `quanhuyen`
 ADD PRIMARY KEY (`MA_HUYEN`);

--
-- Index pour la table `quyen`
--
ALTER TABLE `quyen`
 ADD PRIMARY KEY (`MA_QUYEN`);

--
-- Index pour la table `thanhvien`
--
ALTER TABLE `thanhvien`
 ADD PRIMARY KEY (`MSTHANHVIEN`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `dangtindiendan`
--
ALTER TABLE `dangtindiendan`
MODIFY `MA_DANGTIN` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `gopy`
--
ALTER TABLE `gopy`
MODIFY `MA_GOPY` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `nhatro`
--
ALTER TABLE `nhatro`
MODIFY `MA_NHATRO` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
ADD CONSTRAINT `FK_ADMIN_TAIKHOAN` FOREIGN KEY (`MSADMIN`) REFERENCES `nguoidung` (`USERNAME`);

--
-- Contraintes pour la table `chitietduyetnhatro`
--
ALTER TABLE `chitietduyetnhatro`
ADD CONSTRAINT `FK_CHITIETDANG_CHO_NHATRO` FOREIGN KEY (`MA_NHATRO`) REFERENCES `nhatro` (`MA_NHATRO`),
ADD CONSTRAINT `FK_XETDUYETTHONTIN` FOREIGN KEY (`MSADMIN`) REFERENCES `admin` (`MSADMIN`);

--
-- Contraintes pour la table `chunhatro`
--
ALTER TABLE `chunhatro`
ADD CONSTRAINT `FK_CHUNHATRO_NGUOIDUNG` FOREIGN KEY (`USERNAME`) REFERENCES `nguoidung` (`USERNAME`),
ADD CONSTRAINT `FK_DIACHI_CHUTRO` FOREIGN KEY (`MA_DUONG`) REFERENCES `duong` (`MA_DUONG`);

--
-- Contraintes pour la table `dangtindiendan`
--
ALTER TABLE `dangtindiendan`
ADD CONSTRAINT `FK_THANHVIEN_DANGTIN` FOREIGN KEY (`NGUOIDANG`) REFERENCES `thanhvien` (`MSTHANHVIEN`);

--
-- Contraintes pour la table `danhgia`
--
ALTER TABLE `danhgia`
ADD CONSTRAINT `FK_DANHGIA_NHATRO` FOREIGN KEY (`MA_NHATRO`) REFERENCES `nhatro` (`MA_NHATRO`),
ADD CONSTRAINT `FK_ND_DANHGIA` FOREIGN KEY (`MSTHANHVIEN`) REFERENCES `thanhvien` (`MSTHANHVIEN`);

--
-- Contraintes pour la table `duong`
--
ALTER TABLE `duong`
ADD CONSTRAINT `FK_DUONG_PHUONG` FOREIGN KEY (`MA_PHUONGXA`) REFERENCES `phuongxa` (`MA_PHUONGXA`);

--
-- Contraintes pour la table `gopy`
--
ALTER TABLE `gopy`
ADD CONSTRAINT `FK_GOPY_NHATRO` FOREIGN KEY (`MA_NHATRO`) REFERENCES `nhatro` (`MA_NHATRO`),
ADD CONSTRAINT `FK_NGUOIDUNG_GOPY` FOREIGN KEY (`MSTHANHVIEN`) REFERENCES `thanhvien` (`MSTHANHVIEN`);

--
-- Contraintes pour la table `nguoidung`
--
ALTER TABLE `nguoidung`
ADD CONSTRAINT `FK_QUYEN_ND` FOREIGN KEY (`MA_QUYEN`) REFERENCES `quyen` (`MA_QUYEN`);

--
-- Contraintes pour la table `nhatro`
--
ALTER TABLE `nhatro`
ADD CONSTRAINT `FK_CHITIET_NHATRO` FOREIGN KEY (`MSCHU`) REFERENCES `chunhatro` (`MSCHU`),
ADD CONSTRAINT `FK_NHATRO_THUOC_PHUONGXA` FOREIGN KEY (`MA_DUONG`) REFERENCES `duong` (`MA_DUONG`);

--
-- Contraintes pour la table `phong`
--
ALTER TABLE `phong`
ADD CONSTRAINT `FK_NHATRO_PHONG` FOREIGN KEY (`MA_NHATRO`) REFERENCES `nhatro` (`MA_NHATRO`);

--
-- Contraintes pour la table `phuongxa`
--
ALTER TABLE `phuongxa`
ADD CONSTRAINT `FK_QUANHUYEN_PHUONGXA` FOREIGN KEY (`MA_HUYEN`) REFERENCES `quanhuyen` (`MA_HUYEN`);

--
-- Contraintes pour la table `thanhvien`
--
ALTER TABLE `thanhvien`
ADD CONSTRAINT `FK_THANHVIEN_NGUOIDUNG` FOREIGN KEY (`MSTHANHVIEN`) REFERENCES `nguoidung` (`USERNAME`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
