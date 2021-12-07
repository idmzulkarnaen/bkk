-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2016 at 09:53 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bkk`
--
CREATE DATABASE IF NOT EXISTS `bkk` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bkk`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `user`, `pwd`) VALUES
(1, 'Amin', 'admin', 'e4da3b7fbbce2345d7772b0674a318d5');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `id_admin` int(5) NOT NULL,
  `id_tag` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `tgl` datetime NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_admin`, `id_tag`, `judul`, `isi`, `tgl`) VALUES
(1, 1, 0, 'Searching for the best job', '<p><span style="font-family:open sans,sans-serif; font-size:14px">Using the outcomes from the job, we will put together a plan for the most effective marketing strategy to get the best results.</span></p>\r\n', '2015-11-28 05:22:24'),
(2, 1, 0, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '<p><span style="font-family:open sans,sans-serif; font-size:14px">aaaaUsing the outcomes from the job, we will put together a plan for the most effective marketing strategy to get the best results.aaa</span></p>\r\n', '2015-11-28 07:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE IF NOT EXISTS `daftar` (
  `id_daftar` int(5) NOT NULL AUTO_INCREMENT,
  `id_loker` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `tgl` datetime NOT NULL,
  PRIMARY KEY (`id_daftar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id_daftar`, `id_loker`, `id_user`, `tgl`) VALUES
(2, 4, 1, '2015-11-23 14:24:11'),
(4, 2, 1, '2015-11-24 08:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `detail_berita`
--

CREATE TABLE IF NOT EXISTS `detail_berita` (
  `id_detail` int(5) NOT NULL AUTO_INCREMENT,
  `id_berita` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `komentar` text NOT NULL,
  `tgl` datetime NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `detail_berita`
--

INSERT INTO `detail_berita` (`id_detail`, `id_berita`, `id_admin`, `id_user`, `komentar`, `tgl`) VALUES
(1, 1, 1, 0, 'Cek cek', '2015-11-28 05:40:18'),
(2, 1, 1, 0, 'Cekkk', '2015-11-28 05:40:56'),
(3, 1, 0, 1, 'User cek', '2015-11-28 08:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `lampiran`
--

CREATE TABLE IF NOT EXISTS `lampiran` (
  `id_lampiran` int(5) NOT NULL AUTO_INCREMENT,
  `id_daftar` int(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL,
  PRIMARY KEY (`id_lampiran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `lampiran`
--

INSERT INTO `lampiran` (`id_lampiran`, `id_daftar`, `judul`, `file`) VALUES
(3, 2, 'Riwayat Hidup', 'FIX_TEKNIS_LOMBA_31.pdf'),
(5, 2, 'Surat Pernyataan', 'Surat_Pernyataan.docx'),
(8, 4, 'Foto', 'Foto.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE IF NOT EXISTS `loker` (
  `id_loker` int(5) NOT NULL AUTO_INCREMENT,
  `id_perusahaan` int(5) NOT NULL,
  `nama_loker` varchar(50) NOT NULL,
  `wilayah` varchar(30) NOT NULL,
  `butuh` int(5) NOT NULL,
  `syarat` text NOT NULL,
  `tempat_test` varchar(30) NOT NULL,
  `tgl_test` datetime NOT NULL,
  `tutup` date NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_loker`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`id_loker`, `id_perusahaan`, `nama_loker`, `wilayah`, `butuh`, `syarat`, `tempat_test`, `tgl_test`, `tutup`, `ket`) VALUES
(1, 2, 'Loker 1', 'Purwokerto', 100, '<p>Nilai UN minimal 7</p>\r\n\r\n<p>Tinggi Minimal 160 cm</p>\r\n', 'SMK N 1 Purwokerto', '2015-11-30 14:11:05', '2015-11-28', '<p>bBbBbBbBbBbB BbBbBbBbBbBbBbBBb&nbsp;bBbBbBbBbBbB BbBbBbBbBbBbBbBBb&nbsp;bBbBbBbBbBbB BbBbBbBbBbBbBbBBb&nbsp;bBbBbBbBbBbB BbBbBbBbBbBbBbBBb&nbsp;bBbBbBbBbBbB BbBbBbBbBbBbBbBBb</p>\r\n'),
(2, 3, 'Manager', 'Bandung', 25, '<p>Rajin</p>\r\n\r\n<p>Ulet</p>\r\n\r\n<p>Pekerja keras</p>\r\n', 'Bandung', '2015-11-28 10:00:00', '2015-11-27', '<p>-</p>\r\n'),
(3, 5, 'System Analyst', 'Jakarta Utara', 5, '<p>Menguasai Databas</p>\r\n', 'SMK N 3 Jakarta', '2015-11-23 10:00:00', '2015-11-22', '<p>KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK KkKkK&nbsp;KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK KkKkK&nbsp;KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK KkKkK&nbsp;KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK KkKkK&nbsp;KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK KkKkK&nbsp;KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK KkKkK&nbsp;KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK KkKkK&nbsp;KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK KkKkK&nbsp;KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK <strong>:)</strong> KkKkK&nbsp;KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK KkKkK&nbsp;KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK KkKkK&nbsp;KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK KkKkK&nbsp;KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK KkKkK&nbsp;KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK KkKkK&nbsp;KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK KkKkK&nbsp;KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK KkKkK&nbsp;KkKkkKKkKKkK kKkKkKkKkKK KkKkKkK KkKkK</p>\r\n'),
(4, 5, 'Programmer', 'Denpasar, Bali', 12, '<p>Menguasai PHP</p>\r\n', 'SMKN 1 Denpasar', '2015-11-30 10:00:00', '2015-11-23', '<p>pPpPpPpPpPpPpPpPpPpPpP pPpPpPpPpPpP&nbsp;pPpPpPpPpPpPpPpPpPpPpP pPpPpPpPpPpP&nbsp;pPpPpPpPpPpPpPpPpPpPpP pPpPpPpPpPpP&nbsp;pPpPpPpPpPpPpPpPpPpPpP pPpPpPpPpPpP&nbsp;pPpPpPpPpPpPpPpPpPpPpP pPpPpPpPpPpP&nbsp;pPpPpPpPpPpPpPpPpPpPpP pPpPpPpPpPpP&nbsp;pPpPpPpPpPpPpPpPpPpP <strong>:p</strong> P pPpPpPpPpPpP&nbsp;pPpPpPpPpPpPpPpPpPpPpP pPpPpPpPpPpP&nbsp;pPpPpPpPpPpPpPpPpPpPpP pPpPpPpPpPpP&nbsp;pPpPpPpPpPpPpPpPpPpPpP pPpPpPpPpPpP&nbsp;pPpPpPpPpPpPpPpPpPpPpP pPpPpPpPpPpP&nbsp;pPpPpPpPpPpPpPpPpPpPpP pPpPpPpPpPpP&nbsp;</p>\r\n'),
(5, 2, 'Programmer', 'Purwokerto', 0, '', '', '0000-00-00 00:00:00', '2015-12-23', '');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `konten` text NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `judul`, `konten`) VALUES
(1, 'Struktur Organisasi', '<p>ihdisdhidshi</p>\r\n'),
(2, 'Struktur Organisasi', '<p>Wakil :pak&nbsp; &#39;....</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `id_perusahaan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_perusahaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `email`, `pwd`, `hp`, `keterangan`, `foto`) VALUES
(2, 'Alfamart', 'Banyumas', 'alfa@gmail.com', '56aed7e7485ff03d5605b885b86e947e', '085743264004', '<p>Alfa OK</p>\r\n', '02__Kastorius_Sinaga.jpg'),
(3, 'Microsoft', 'Jakarta', 'microsoft@gmail.com', '5f532a3fc4f1ea403f37070f59a7a53a', '08264436834', '<p>Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;Microsoft&nbsp;<img alt="laugh" src="http://localhost/bkk/assets/lib/ckeditor/plugins/smiley/images/teeth_smile.png" style="height:23px; width:23px" title="laugh" /></p>\r\n', 'employee5.png'),
(4, 'Facebook', 'Bandung', 'fb@gmail.com', '35ce1d4eb0f666cd136987d34f64aedc', '', '<p>www.facebook.com&nbsp;www.facebook.com&nbsp;www.facebook.com&nbsp;www.facebook.com&nbsp;www.facebook.com&nbsp;www.facebook.com</p>\r\n', 'employee2.png'),
(5, 'Instagram', 'Semarang', 'instagram@gmail.com', 'ffe8560492ef96f860b965341d0c9698', '', '<p>Instagram&nbsp;Instagram&nbsp;Instagram&nbsp;Instagram&nbsp;Instagram&nbsp;Instagram&nbsp;Instagram&nbsp;Instagram&nbsp;Instagram&nbsp;Instagram&nbsp;Instagram&nbsp;Instagram&nbsp;Instagram&nbsp;Instagram&nbsp;Instagram&nbsp;Instagram&nbsp;</p>\r\n', 'employee4.png'),
(6, 'Dribbble', 'Jogja', 'dribbble@gmail.com', '0c3e43e2298d83d51ab0832d14c7f872', '', '<p>Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;Dribbble&nbsp;</p>\r\n', 'employee6.png'),
(7, 'Beats Music', 'Bogor', 'bm@gmail.com', '084243855820f9ca47f466f645784636', '', '<p>Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;<strong>Beats Music</strong>&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;Beats Music&nbsp;</p>\r\n', 'employee1.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `nis` int(10) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `thn` varchar(10) NOT NULL,
  `status` char(2) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=217 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nis`, `jurusan`, `email`, `pwd`, `jk`, `alamat`, `hp`, `thn`, `status`, `tempat`, `foto`) VALUES
(2, 'Ade Widyaningsih', 11146, 'Akuntansi', '', '9c42d4338e4e653d3ad3f12340edf005', 'p', 'Jl Diponegoro Rt 3/1 Blok h  No 6 Sokaraja Kulon', '', '', '', '', ''),
(3, 'Ana Savitri', 11147, 'Akuntansi', '', 'eed054ecd7a0a544cf73292836023ffe', 'p', 'Jl Sutejo Rt 4/6 Purwokerto Barat', '', '', '', '', ''),
(4, 'Ayu Safitri', 11148, 'Akuntansi', '', 'c5a73f074ec0f725cd2d51335da5ec77', 'p', 'Kr Gude Kulon Rt 3/1', '', '', '', '', ''),
(5, 'Azah Mega Apriliana', 11149, 'Akuntansi', '', '51a6ce0252d8fa6e913524bdce8db490', 'p', 'Taman Sari Rt 3/2 Karang Lewas', '', '', '', '', ''),
(6, 'Dea Risky Ananda', 11150, 'Akuntansi', '', 'accfa1212a61b379ba0b009549113863', 'p', 'Jl Grilya Gg II Rt 4/1', '', '', '', '', ''),
(7, 'Diana Irmasti', 11151, 'Akuntansi', '', '0f9447c0f2b0d49e7f24c4c2e6f3bda5', 'p', 'Jl Pahlawan Gg 3 Rt 3/1 Purwokerto Selatan', '', '', '', '', ''),
(8, 'Dinda Ravika Sahnas', 11152, 'Akuntansi', '', 'c8bcfd3fedd67f9abb731ef4aca58448', 'p', 'Jl Marapat Rt 2/4 Sidabowa Patikraja', '', '', '', '', ''),
(9, 'Eli Aprilia', 11153, 'Akuntansi', '', '498f940d9b933c529b06aa96d18f7eda', 'p', 'Jl Bayur Rrt 3/3 Kebocoran Kedungbanteng', '', '', '', '', ''),
(10, 'Fita Riyani', 11154, 'Akuntansi', '', '67f36d6c644a9701979d7059161f3546', 'p', 'Karang Kemiri Rt 1/3 Karang Lewas', '', '', '', '', ''),
(11, 'Inka Siswanti', 11155, 'Akuntansi', '', 'f1efa5d88238b08b7d0d285f2909295b', 'p', 'Kebumen Rt 6/4 Baturaden', '', '', '', '', ''),
(12, 'Isnaeni Hafifah', 11156, 'Akuntansi', '', 'df155694b52c187021971ad5e3123819', 'p', 'Kedungwringin Rt 5/5 Patikraja', '', '', '', '', ''),
(13, 'Julia Dwi Cahya', 11157, 'Akuntansi', '', '89f692589fe6ce8f82cf75828b0821d3', 'p', 'Jl Kombas Gg 2 Rt 4/2 Purwokerto', '', '', '', '', ''),
(14, 'Levana Sarasati Andini', 11159, 'Akuntansi', '', '16e6a3326dd7d868cbc926602a61e4d0', 'p', 'Jl Stasiun Gg 1 Rt 2/1', '', '', '', '', ''),
(15, 'Mega Kristia Monika', 11160, 'Akuntansi', '', '386a7f403925290ad57578b781db32c1', 'p', 'Pangebatan Rt 3/3 Karanglewas', '', '', '', '', ''),
(16, 'Merli Puspitasari', 11161, 'Akuntansi', '', '2190834cf569ffab46854f84b2124104', 'p', 'Jl Martosayogo Rt 1/4 Teluk Purwokerto Selatan', '', '', '', '', ''),
(17, 'Mita Purnama Ningsih', 11162, 'Akuntansi', '', '9bbb9a5df34c69244286195a1154bc36', 'p', 'Jl Kober Gg Riswan Rt 7/6 Purwokerto Barat', '', '', '', '', ''),
(18, 'Nining Catur Yuli Ningih', 11163, 'Akuntansi', '', '17834a259d3d4f21a1d6f100b015ec93', 'p', 'Karangrau Rt 3/2 Sokaraja', '', '', '', '', ''),
(19, 'Novia Nur Safitri', 11164, 'Akuntansi', '', '5a4e1f98b2c8560d0a4d8206f4fa2f09', 'p', 'Jl Bayur Rt 1/3 Kebocoran Kedungbanteng', '', '', '', '', ''),
(20, 'Nur Kholifah', 11165, 'Akuntansi', '', '8337a7365ec44f3d65434a5ea4d73d17', 'p', 'Tambak Sogra Rt 4/4 Sumbang', '', '', '', '', ''),
(21, 'Resiana Febrianti', 11166, 'Akuntansi', '', 'e1c13a13fc6b87616b787b986f98a111', 'p', 'Jl Masjid Rt 1/4 Sokanegara Purwokerto Timur', '', '', '', '', ''),
(22, 'Risca Gita Ayu Puspita', 11167, 'Akuntansi', '', '7d5c5d752a36bf2c89c4e8a2467aad13', 'p', 'Jl Stasiun Gg 2 Rt 5/1 Purwokerto Barat', '', '', '', '', ''),
(23, 'Savitri Riyani W', 11168, 'Akuntansi', '', '0ae7b3a91ddd6335899134fbdf2587cb', 'p', 'Rempoah Rt 5/1 Baturaden', '', '', '', '', ''),
(24, 'Sinta Pujiati', 11169, 'Akuntansi', '', 'aaaac19f0c76aea47ce9f28ec5a15527', 'p', 'Purbadana Rt 3/1 Kembaran', '', '', '', '', ''),
(25, 'Siska Nur Hapsari', 11170, 'Akuntansi', '', 'bba64e6137c253f4ae556a97869e31b1', 'p', 'Jl RA Wiratmaja Gg 5 Rt 3/4', '', '', '', '', ''),
(26, 'Siti Rahmawati', 11171, 'Akuntansi', '', '3bc31a430954d8326605fc690ed22f4d', 'p', 'Kedungwringin Rt 1/7 Patikraja', '', '', '', '', ''),
(27, 'Syerli Riski A', 11172, 'Akuntansi', '', '1330fef5fe4f742c1918c585c2da13b3', 'p', 'Karangnangka Rt 1/3 Kedungbanteng', '', '', '', '', ''),
(28, 'Titik Nur Ratih', 11173, 'Akuntansi', '', 'ba542f3617078b0be2f95e64e425e190', 'p', 'Tambak Sogra Rt 4/2 Sumbang', '', '', '', '', ''),
(29, 'Triyanti', 11174, 'Akuntansi', '', '5a23ed9882ba5a661cedd76afc3415a4', 'p', 'Karangsoka Rt 1/1 Kembaran', '', '', '', '', ''),
(30, 'Viggy Friska Fradella', 11175, 'Akuntansi', '', '876f1f9954de0aa402d91bb988d12cd4', 'p', 'Kedungwuluh Lor Rt 3/1 Purwokerto Barat', '', '', '', '', ''),
(31, 'Adelia Kismiyanti', 11123, 'Multimedia', '', 'd5397f1497b5cdaad7253fdc92db610b', 'p', 'Jl Hr Beyamin Rt 1/4 Pabuaran Purwokerto Barat', '', '', '', '', ''),
(32, 'Anindya Anggelina', 11124, 'Multimedia', '', 'e3050c2fe9297974cbf4328fa4f98d42', 'p', 'Jl Jend Sutoyo Gg II Rt 5/2 Sawangan Purwokerto Selatan', '', '', '', '', ''),
(33, 'Destriana', 11125, 'Multimedia', '', 'cbca7635077d4074f8d30094a3176972', 'p', 'Bantarsoka Jl Stasiun Gg2 Rt 5/1 Purwokerto Barat', '', '', '', '', ''),
(34, 'Eva Damayanti', 11126, 'Multimedia', '', '0b74c9847e45c3be47e0d1a8f92bcab8', 'p', 'Jl Jend Suprapto Gg 4', '', '', '', '', ''),
(35, 'Indah Krisdayanti', 11128, 'Multimedia', '', '293c3b96edea6588bc4b9415c3be4e66', 'p', 'Karangsalam Rt 3/1 Baturaden', '', '', '', '', ''),
(36, 'Isni Noviati', 11129, 'Multimedia', '', '64714a86909d401f8feb83e8c2d94b23', 'p', 'Jl Lesan Pura Rt 1/3 Teluk Purwokerto Selatan', '', '', '', '', ''),
(37, 'Lenasari', 11130, 'Multimedia', '', '14faf969228fc18fcd4fcf59437b0c97', 'p', 'Tamansari Rt 3/2', '', '', '', '', ''),
(38, 'Luh Widy Indah Pratiwi', 11131, 'Multimedia', '', 'e896db75d35788e14104e4eb490e725b', 'p', 'Teluk Rt 6/4 Karangpucung Purwokerto Selatan', '', '', '', '', ''),
(39, 'Meida Retno Kurniati', 11132, 'Multimedia', '', 'd9de6a144a3cc26cb4b3c47b206a121a', 'p', 'Pamijen Rt 2/2 Baturaden', '', '', '', '', ''),
(40, 'Nofia Wjhatul Dwi Maula', 11134, 'Multimedia', '', '9f8c36919400d501da7b9211735b71f2', 'p', 'Jl Gn Lurah Rt 2/1 Cilongok', '', '', '', '', ''),
(41, 'Nurhana Krismontri', 11135, 'Multimedia', '', '47599716060306c09493e977bbbce22e', 'p', 'Kutasari Rt 2/1 Baturaden', '', '', '', '', ''),
(42, 'Risky Dwi Yulianti', 11137, 'Multimedia', '', '76ba9f564ebbc35b1014ac498fafadd0', 'p', 'Jl Kamandaka Gg Rinjani Rt 6/11 Purwokerto', '', '', '', '', ''),
(43, 'Rossi Yanti Eka Saputri', 11139, 'Multimedia', '', '3c7f7c2dae5b4e1dd398cffb26391a58', 'p', 'Pangebatan Rt 4/8 Karanglewas', '', '', '', '', ''),
(44, 'Siti Nur Chijah', 11140, 'Multimedia', '', '81f7acabd411274fcf65ce2070ed568a', 'p', 'Jl Pamujan Raya Rt 5/12 Baturaden', '', '', '', '', ''),
(45, 'Tri Wahyuni', 11141, 'Multimedia', '', '4ceefb51ae9ec399a69540c895f4519f', 'p', 'Jl Suprapto Rt 6/1 Purwosari', '', '', '', '', ''),
(46, 'Venny Puspitasari', 11142, 'Multimedia', '', 'b20bd2a22c7f0aef29ab5a4cb1934f71', 'p', 'Tanjung Rt 7/4 Purwokerto Selatan', '', '', '', '', ''),
(47, 'Aditias Aji Wahyu Utama', 11178, 'Akuntansi', '', '5afd3bb639c0920782586a9843ee0785', 'l', 'Jl Martadireja II Gg Merpati Rt 01/02', '', '', '', '', ''),
(48, 'Aditya Pangestu', 11208, 'Akuntansi', '', 'bea5b83d3a056039813089e7aa7f7e9a', 'l', '', '', '', '', '', ''),
(49, 'Agustin Handayani', 11179, 'Akuntansi', '', '5989add1703e4b0480f75e2390739f34', 'p', 'Pasungkamal Rt 05/08 Lumbir', '', '', '', '', ''),
(50, 'Aprilia Wulandari', 11180, 'Akuntansi', '', '09dbc1177211571ef3e1ca961cc39363', 'p', 'Bantarsoka Rt 04/05', '', '', '', '', ''),
(51, 'Dewi Wahyuningrum', 11181, 'Akuntansi', '', 'e46be61f0050f9cc3a98d5d2192cb0eb', 'p', 'Notog Rt 03/02 Patikraja', '', '', '', '', ''),
(52, 'Dihan Anggraeni', 11182, 'Akuntansi', '', '1f89885d556929e98d3ef9b86448f951', 'p', 'Berkoh Rt 06/01 Purwokerto', '', '', '', '', ''),
(53, 'Een Nuriskiyani', 11183, 'Akuntansi', '', '5bbc7cc2da7217ccaf66f733b3fef728', 'p', 'Banteran Rt 02/05 Sumbang', '', '', '', '', ''),
(54, 'Fanny Ardinda Sari', 11184, 'Akuntansi', '', '3d3621cee6f49e93a34f3f0f654ab41a', 'p', 'Jl Jend Sutoyo Rt 03/02 Purwokerto Barat', '', '', '', '', ''),
(55, 'Himatul Mustofiah', 11185, 'Akuntansi', '', '51e12869e03348d481ca682359282739', 'p', 'Kedungwuluh Lor Rt 04/05 Patikraja', '', '', '', '', ''),
(56, 'Indah Puspita Rini', 11186, 'Akuntansi', '', '51624edfeb2ba95fe669e7b2d2b3be80', 'p', 'Kr Gude Kulon Rt 03/01', '', '', '', '', ''),
(57, 'Irahmatani Ridha Purbaranti', 11187, 'Akuntansi', '', '421b9ff13e012545c871fff7824cd12a', 'p', 'Bantarsoka Rt 03/06 Purwokerto Barat', '', '', '', '', ''),
(58, 'Laela Monika Fathurrizki', 11188, 'Akuntansi', '', 'b90c46963248e6d7aab1e0f429743ca0', 'p', 'Pasir Kidul Rt 02/03 Purwokerto Barat', '', '', '', '', ''),
(59, 'Marina Fitriyani', 11189, 'Akuntansi', '', '30f985ec9336f2a5c2142feb9ebdbb53', 'p', 'Keniten Rt 03/03 Kedungbanteng', '', '', '', '', ''),
(60, 'Meli Amelia', 11190, 'Akuntansi', '', 'e81f1e4fe5b85be7a6619d0b33427e01', 'p', 'Kedungwringin Rt 02/07 Patikraja', '', '', '', '', ''),
(61, 'Mugi Pangastuti', 11191, 'Akuntansi', '', 'ee7af88f5686a35a7943f5dd9ea727f6', 'p', 'Jl Selajanji  Rt 04/05 Beji Kedungbanteng', '', '', '', '', ''),
(62, 'Nanda Ayu Julia Pramestika', 11192, 'Akuntansi', '', '3791226cb3fcb9a6710e1ead55571d86', 'p', 'Kr Blimbing Rt 04/16 Teluk\r\nPurwokerto Selatan', '', '', '', '', ''),
(63, 'Nita Wahyuni ', 11193, 'Akuntansi', '', '7b7916dd2de56297aa29cccb2bbf48d4', 'p', 'Kr Nangka Rt 01/06\r\nKedungbanteng', '', '', '', '', ''),
(64, 'Nunung Riski', 11194, 'Akuntansi', '', 'ac6d3309a61190ccce91186c045cc6dc', 'p', 'Teluk Rt 03/15\r\nPurwokerto Selatan', '', '', '', '', ''),
(65, 'Oni Kris Mentari', 11195, 'Akuntansi', '', 'e9c8064bc8dac39bed69dd1d0158c1cd', 'p', 'Karanglewas Lor Rt 03/02', '', '', '', '', ''),
(66, 'Riski Novia Rani', 11196, 'Akuntansi', '', '09733dde1da9c47d431c043b24056f4e', 'p', 'Karang Mangu Rt 02/01\r\nBaturaden', '', '', '', '', ''),
(67, 'Rizki Nur Fatiah', 11197, 'Akuntansi', '', 'ec47951a847319d0dd4933431b5b2c0f', 'p', 'Perum Ledug Rt 01/07 No. 17', '', '', '', '', ''),
(68, 'Rizki Wahyu zafuanfi', 11198, 'Akuntansi', '', '6934456f54af5ab56c6f347c6427afeb', 'p', 'Arcawinangun RT 06/02\r\nPurwokerto', '', '', '', '', ''),
(69, 'Santi Agus D', 11199, 'Akuntansi', '', '8dbdbf0cedc89e9a82967a7d983c11ca', 'p', 'Jl Sutejo RT 04/06 Kedungwuluh\r\nPurwokerto Barat', '', '', '', '', ''),
(70, 'Sisiyani', 11200, 'Akuntansi', '', 'edd47ba7fa1bbff38973841c9cd0733c', 'p', 'Sidabowa RT 03/07 \r\nPatikraja', '', '', '', '', ''),
(71, 'Siti Fatimah', 11201, 'Akuntansi', '', 'dc1d3cb9517bda57aacd65f5b1986c6e', 'p', 'Kober Gg Terate RT 01/02\r\nPurwokerto Barat', '', '', '', '', ''),
(72, 'Sofia Safitri', 11202, 'Akuntansi', '', 'fe998b49c41c4208c968bce204fa1cbb', 'p', 'Arcawinangun RT 04/05\r\nPurwokerto', '', '', '', '', ''),
(73, 'Tati Ramelan', 11203, 'Akuntansi', '', 'c24c65259d90ed4a19ab37b6fd6fe716', 'p', 'Karangnanas RT 02/06\r\nSokaraja', '', '', '', '', ''),
(74, 'Tri Nurcahyati', 11204, 'Akuntansi', '', '0f0e13216262f4a201bec128044dd30f', 'p', 'Kedungwuluh Lor RT 05/03\r\nPatikraja', '', '', '', '', ''),
(75, 'Umi Chasanah', 11205, 'Akuntansi', '', '002c3a40ac50dc870f1ff386f11f5bae', 'p', 'Sidabowa RT 04/02\r\nPatikraja', '', '', '', '', ''),
(76, 'Vivi Setianingsih', 11206, 'Akuntansi', '', '1ac978c8020be6d7212aa71d4f040fc3', 'p', 'Jl Patroli RT 05/07\r\nKarangklesem', '', '', '', '', ''),
(77, 'Almi Yuliastuti', 11283, 'Administrasi Perkantoran', '', 'f152516615efd05cf4b4903b03d4a45d', 'p', 'Jl R. Supeno RT 03/04\r\nBeji Kedungbanteng', '', '', '', '', ''),
(78, 'Annisa Nurokhman Fauzi', 11284, 'Administrasi Perkantoran', '', 'aab085461de182608ee9f607f3f7d18f', 'p', '', '', '', '', '', ''),
(79, 'Apriliani', 11285, 'Administrasi Perkantoran', '', '58d123e75dac4f3e9fb6c4d20ca6f517', 'p', 'Kober RT 01/01\r\nPurwokerto Barat', '', '', '', '', ''),
(80, 'Ayu Cristianingsih', 11286, 'Administrasi Perkantoran', '', 'f657fe6129962ac0a912607080db1d2c', 'p', 'Kediri RT 06/06\r\nKaranglewas', '', '', '', '', ''),
(81, 'Ayu Selvia Yana', 11287, 'Administrasi Perkantoran', '', 'ae4954bd7d1f28d4b124063731338ae0', 'p', 'Karangnanas RT 03/06\r\nSokaraja', '', '', '', '', ''),
(82, 'Chrisna Saraswati', 11288, 'Administrasi Perkantoran', '', 'cc40d06ff0a16a793d066dbfa2917bab', 'p', 'Jl Sodagaran 2 RT 06/01\r\nPurwokerto', '', '', '', '', ''),
(83, 'Desi Wahyuningsih', 11289, 'Administrasi Perkantoran', '', '7303a103c93fea0445384d6ff3f3d1b9', 'p', 'Sokawera RT 03/06', '', '', '', '', ''),
(84, 'Devi Rizky Savitri', 11290, 'Administrasi Perkantoran', '', '99ef8a644d84701c79bad8f4c3a7b4d7', 'p', 'Jl Angsana Raya RT 06/06 No. 101\r\nPerum Teluk Purwokerto Selatan', '', '', '', '', ''),
(85, 'Dian Pratiwi', 11291, 'Administrasi Perkantoran', '', 'd3b8cf8b9c797942fe68565e4ed2d8c3', 'p', 'Karangrau RT 02/02\r\nSokaraja', '', '', '', '', ''),
(86, 'Dina Wahyu Riani', 11292, 'Administrasi Perkantoran', '', '4a6762703f33302e6d1e65db02155a47', 'p', 'Jl Nilasari RT 03/03\r\nPurwokerto', '', '', '', '', ''),
(87, 'Efit Yuliana', 11293, 'Administrasi Perkantoran', '', '421b0ea70ab7fd681ae63a8f12695199', 'p', 'Jl Karang Benda', '', '', '', '', ''),
(88, 'Evi Krisnanti', 11294, 'Administrasi Perkantoran', '', '83d3d4b6c9579515e1679aca8cbc8033', 'p', 'Karangrau RT 02/02\r\nSokaraja', '', '', '', '', ''),
(89, 'Feni Sarantri', 11295, 'Administrasi Perkantoran', '', 'a7e272202d38f212dcdc3978bcb70a6f', 'p', 'Ledug Kidul RT 07/01\r\nKembaran', '', '', '', '', ''),
(90, 'Ika Supriyati', 11296, 'Administrasi Perkantoran', '', 'fe50ae64d08d4f8245aaabc55d1baf79', 'p', 'Jl Balai Kelurahan 1 No.1 Arcawinangun RT 02/10\r\nPurwokerto', '', '', '', '', ''),
(91, 'Isnaeny Yudita', 11297, 'Administrasi Perkantoran', '', '9d99197e2ebf03fc388d09f1e94af89b', 'p', 'Jl Jend. Suprapto RT 04/06', '', '', '', '', ''),
(92, 'Lia Desi Setya Purwanti', 11299, 'Administrasi Perkantoran', '', '641e167f974d1dd076c0886d17271975', 'p', 'Banyumas RT 01/05', '', '', '', '', ''),
(93, 'Mufinda', 11300, 'Administrasi Perkantoran', '', '836082d549f4deda76377758afa279f6', 'p', 'Ledug Kidul RT 07/01\r\nKembaran', '', '', '', '', ''),
(94, 'Nenti Tiansari', 11301, 'Administrasi Perkantoran', '', 'b983273d87ce44aec57595123cee4c62', 'p', 'Kedungwringin RT 10/06\r\nPatikraja', '', '', '', '', ''),
(95, 'Nur Khakiki', 11302, 'Administrasi Perkantoran', '', '793d8e745d2b346c4ddc27a534083243', 'p', 'Kedungwuluh RT 04/05', '', '', '', '', ''),
(96, 'Ova Prasetianti Putri', 11303, 'Administrasi Perkantoran', '', 'b32d54edfbef54504db682d7d6d5be8d', 'p', 'Jl A Yani RT 06/07\r\nPurwokerto Barat', '', '', '', '', ''),
(97, 'Rahmawati', 11304, 'Administrasi Perkantoran', '', 'd6c2e7c74cad027b49b4369a0548ddfb', 'p', 'Purwosari RT 03/01\r\nBaturaden', '', '', '', '', ''),
(98, 'Ria Febriani', 11305, 'Administrasi Perkantoran', '', '998f28b5baa9b34f23eaf2e08ed2d63c', 'p', 'Karangtengah RT 02/08\r\nBaturaden', '', '', '', '', ''),
(99, 'Ririn Cahya Yulianti', 11306, 'Administrasi Perkantoran', '', '1294afe6156ef3b577821cd2c97769bf', 'p', 'Sodagaran RT 06/01\r\nPurwokerto', '', '', '', '', ''),
(100, 'Rizki Yuliani', 11307, 'Administrasi Perkantoran', '', 'c69dc1d8a3a3b79d0de6fbedb4cb80a7', 'p', 'Jl Selajanji RT 01/14 Beji\r\nKedungbanteng', '', '', '', '', ''),
(101, 'Sema Ayu Retnaningsih', 11308, 'Administrasi Perkantoran', '', '8c460674cd61bf189e62b4da4bd9d7c1', 'p', 'Situmpur No. 179\r\nPurwokerto', '', '', '', '', ''),
(102, 'Sintia Kumala', 11309, 'Administrasi Perkantoran', '', '263138a8b987787df892aaafe081a2d6', 'p', 'Jl Pancurawis RT 03\r\nPurwokerto', '', '', '', '', ''),
(103, 'Sri Nur Hartati', 11310, 'Administrasi Perkantoran', '', '435d43e52666cd74203c69c2bfe2caa7', 'p', 'A Yani RT 06/07\r\nPurwokerto', '', '', '', '', ''),
(104, 'Tasyanita Dewi Umami', 11311, 'Administrasi Perkantoran', '', '7ef6026bb7039837b65084bb74f45c8c', 'p', 'Bantarwuni RT 03/01\r\nSumbang', '', '', '', '', ''),
(105, 'Tri Oktaviana', 11312, 'Administrasi Perkantoran', '', '2301a7bdda1dd4a4b0767fdbdfe911ce', 'p', 'Jl Balai Kambang RT 03/07', '', '', '', '', ''),
(106, 'Vicci Relawati Putri', 11314, 'Administrasi Perkantoran', '', '1a47e38c424a51aba827f45d77a438b1', 'p', 'Jl Turmudi RT 04/01\r\nSokaraja Lor', '', '', '', '', ''),
(107, 'Vita Rahayu', 11315, 'Administrasi Perkantoran', '', '92c3d054835eff3d5a7f7ed731d2a3db', 'p', 'Jl Ragasemangsang Gg 2 RT 03/05\r\nPurwokerto', '', '', '', '', ''),
(108, 'Yuyun Restiana', 11316, 'Administrasi Perkantoran', '', '3798003c3d078a7b4fd1f33843a2e5c0', 'p', 'Kedungwuluh Lor RT 04/05', '', '', '', '', ''),
(165, 'Diah Ratnaningsih', 11219, 'Administrasi Perkantoran', '', 'd7012f5714b8a6a970f5bd34806267c6', 'p', 'karangrau rt04/02 sokaraja', '', '', '', '', ''),
(166, 'Eka Yulianti', 11220, 'Administrasi Perkantoran', '', '975a1c8b9aee1c48d32e13ec30be7905', 'p', 'jl gerilya timur rt01/06 berkoh', '', '', '', '', ''),
(167, 'Fanny Rahmawati', 11221, 'Administrasi Perkantoran', '', '0e105949d99a32ca1751703e94ece601', 'p', 'Karanganyar rt04/01', '', '', '', '', ''),
(168, 'Firda Eka Sapariyani', 11222, 'Administrasi Perkantoran', '', '480eb54452f63abfa7f2eb0ffb1c62fe', 'p', 'kedungringin rt02/0 patikraja', '', '', '', '', ''),
(169, 'Intan Fiana Sakti', 11223, 'Administrasi Perkantoran', '', 'ea3ed20b6b101a09085ef09c97da1597', 'p', 'kedungwuluhlor rt04/05', '', '', '', '', ''),
(170, 'Linda listiani', 11224, 'Administrasi Perkantoran', '', 'ee89223a2b625b5152132ed77abbcc79', 'p', 'karangrau rt03/02 sokaraja', '', '', '', '', ''),
(171, 'Mila Lufiana', 11225, 'Administrasi Perkantoran', '', '0c3dd1f58f7ef11b0eb09971760dfdbd', 'p', 'kedungwuluhlor rt04/05', '', '', '', '', ''),
(172, 'Mugi Asih Rahayu', 11226, 'Administrasi Perkantoran', '', 'e4d78a6b4d93e1d79241f7b282fa3413', 'p', 'kebocoran rt02/06 kedungbanteng', '', '', '', '', ''),
(173, 'Murtiani Anggreani Suyianto', 11227, 'Administrasi Perkantoran', '', 'fa78a16157fed00d7a80515818432169', 'p', 'jl di panjaitan rt06/02 purwokerto', '', '', '', '', ''),
(174, 'Nandya Nurfeti', 11228, 'Administrasi Perkantoran', '', '2c75cf2681788adaca63aa95ae028b22', 'p', 'jl ragasemanggang rt03/04 gg gudeg pwt timur', '', '', '', '', ''),
(175, 'Nofri Tira Larasti', 11229, 'Administrasi Perkantoran', '', '411c451fa50ccb4a60206a83c8d5d8a4', 'p', 'kedungringin rt02/02 patikraja', '', '', '', '', ''),
(176, 'Ofana Tri Wulan', 11230, 'Administrasi Perkantoran', '', 'b4572f47b7c69e27b8e46646d9579e67', 'p', 'jl. suramenggala rt01/06 rejasari', '', '', '', '', ''),
(177, 'Pradita Siwi Utami', 11231, 'Administrasi Perkantoran', '', '87373df3f89fa9932a9c6c58cc75e309', 'p', 'jl. ks tubun gg rasam rt 06/06 kr sempu kober', '', '', '', '', ''),
(178, 'Resti Pangestika', 11232, 'Administrasi Perkantoran', '', 'c291b01517f3e6797c774c306591cc32', 'p', 'kr nangka rt 03/04 kedungbanteng', '', '', '', '', ''),
(179, 'Riana', 11233, 'Administrasi Perkantoran', '', '60e4ac6a656ef4b4fd82aaaf25f14736', 'p', 'ketenger rt02/01 Baturraden', '', '', '', '', ''),
(180, 'Rizki Eka Andriani', 11234, 'Administrasi Perkantoran', '', '6f04f0d75f6870858bae14ac0b6d9f73', 'p', 'beji utara rt04/03 kedungbanteng', '', '', '', '', ''),
(181, 'Rosalia Indah', 11235, 'Administrasi Perkantoran', '', '32e19424b63cc63077a4031b87fb1010', 'p', 'perum kober indah rt01/08 Pwt barat', '', '', '', '', ''),
(182, 'Shinta Wulandari', 11236, 'Administrasi Perkantoran', '', '32e19424b63cc63077a4031b87fb1010', 'p', 'kr lewaslor rt05/02', '', '', '', '', ''),
(183, 'Tatik Astuti', 11239, 'Administrasi Perkantoran', '', '178930ab96f41d43179e4d2d1a3a16e7', 'p', 'JL NILAM RT03/05', '', '', '', '', ''),
(184, 'Velia Ayuningtyas', 11240, 'Administrasi Perkantoran', '', 'dc2ff5f1be7effb525b145bed225e336', 'p', 'karanganyar rt03/01', '', '', '', '', ''),
(185, 'Wening Salsabila Nawang Sari', 11242, 'Administrasi Perkantoran', '', '559b4c29ff85968364f90141f46616b9', 'p', '', '', '', '', '', ''),
(186, 'Zulfa Alkori', 11243, 'Administrasi Perkantoran', '', 'e3c92f539bc17efbcc0c2e5229efa268', 'p', 'purbadana rt05/02', '', '', '', '', ''),
(187, 'Alfen Ester Yolanda', 11246, 'Administrasi Perkantoran', '', 'c99e757a469e0631c1a61e97949885f1', 'p', 'Jl. watusari rt01/03 Purwosari', '', '', '', '', ''),
(188, 'Atifah Fibrianti', 11249, 'Administrasi Perkantoran', '', 'a56fd138b4e913761cd5a28a8ad30174', 'p', 'jl. pejagalan rt03/04 pasir kidul', '', '', '', '', ''),
(189, 'Cici Maelani', 11251, 'Administrasi Perkantoran', '', '6cb993c8fa82ad11ff71fad64d213a72', 'p', 'jl puteran Rt03/01 Berkoh', '', '', '', '', ''),
(190, 'Desi Pratiwi', 11252, 'Administrasi Perkantoran', '', '753a043674f0193523abc1bbce678686', 'p', 'jl hm bachrum rt04/01', '', '', '', '', ''),
(191, 'Dertia Dea Pratami', 11253, 'Administrasi Perkantoran', '', 'ddfa8a1fa86914072eb6e3e55c253856', 'p', 'pangebatan rt 01/04 Kr lewas', '', '', '', '', ''),
(192, 'Dian Fajar Safitri', 11255, 'Administrasi Perkantoran', '', 'ddfa8a1fa86914072eb6e3e55c253856', 'p', 'jl hm bacrum rt04/01', '', '', '', '', ''),
(193, 'Dwi Ayu Yulianti', 11256, 'Administrasi Perkantoran', '', 'cf43a9e6874c5afbebe2858a64d45f52', 'p', 'kauman lama gg 3 rt03/04 pwt lor', '', '', '', '', ''),
(194, 'Dwi Priyanti', 11257, 'Administrasi Perkantoran', '', 'bdc6c33585d0cf5d2a8cb83141cd037f', 'p', '', '', '', '', '', ''),
(195, 'Febi Herdiana', 11259, 'Administrasi Perkantoran', '', '523df5a6db0544f3600434b9ffe68367', 'p', 'jl jend suprapto gg 3 rt02/06', '', '', '', '', ''),
(196, 'Helly Putri Agil', 11260, 'Administrasi Perkantoran', '', '70c549b28626adf8c0d6349053a844af', 'p', 'jl kamandaka rt 06/2 bobosan', '', '', '', '', ''),
(197, 'Janif Wulandari', 11261, 'Administrasi Perkantoran', '', '481d66d7006b307451e463d71d2fc53f', 'p', 'kr kemiri rt 04/04 karang lewas', '', '', '', '', ''),
(198, 'Leni Setiawati', 11262, 'Administrasi Perkantoran', '', '3029352d500acce2c1d5b2c6575c5718', 'p', 'jl martosayogo rt 01/04 Teluk', '', '', '', '', ''),
(199, 'Linda Yunita', 11263, 'Administrasi Perkantoran', '', 'a851bd0d418b13310dd1e5e3ac7318ab', 'p', 'jl selajanji rt01/04 Beji', '', '', '', '', ''),
(200, 'Mila Juliana', 11264, 'Administrasi Perkantoran', '', 'a851bd0d418b13310dd1e5e3ac7318ab', 'p', 'kr batur rt02/05 karangtegah baturraden', '', '', '', '', ''),
(201, 'Murniati', 11265, 'Administrasi Perkantoran', '', '03ca3c0b0ff4ff69a7aec17953d03e0c', 'p', 'jl wijayakusuma rt07/01', '', '', '', '', ''),
(202, 'Novi Pujiastuti', 11266, 'Administrasi Perkantoran', '', 'b6b90237b3ebd1e462a5d11dbc5c4dae', 'p', 'jl ketayasa rt04/04 kedungrandu patikraja', '', '', '', '', ''),
(203, 'Okti Fiana', 11267, 'Administrasi Perkantoran', '', '151d21647527d1079781ba6ae6571ffd', 'p', 'purbadana rt04/01', '', '', '', '', ''),
(204, 'Rima Warhani', 11270, 'Administrasi Perkantoran', '', '7183145a2a3e0ce2b68cd3735186b1d5', 'p', 'kr lewas lor rt04/01', '', '', '', '', ''),
(205, 'Sintari Siti Fatimah', 11272, 'Administrasi Perkantoran', '', 'dbdc69ea6ccbdea0ca2d796e1af24ebf', 'p', 'jl ks tubun kr sempu gg bayan', '', '', '', '', ''),
(206, 'Suryati Indrayanti', 11273, 'Administrasi Perkantoran', '', '42ae1544956fbe6e09242e6cd752444c', 'p', 'jl hm bachrum rt04/01', '', '', '', '', ''),
(207, 'Tri Nur Azizah', 11274, 'Administrasi Perkantoran', '', '1d89c62ce3c488093c75423ef9eaf9ac', 'p', 'jl komplek panpes aliksan beji', '', '', '', '', ''),
(208, 'Trri Suryani', 11275, 'Administrasi Perkantoran', '', '97888b75aa1e8aaac3923028d4466fea', 'p', 'jl arsataka arca winangun pwt timur', '', '', '', '', ''),
(209, 'Tri Wijayanti', 11276, 'Administrasi Perkantoran', '', 'f3e368d04ec3f765654dda0f3bb27552', 'p', 'jl gn tugel rt 04/02', '', '', '', '', ''),
(210, 'Fenni Rose Afriana', 11277, 'Administrasi Perkantoran', '', '600c273011dd92cffe8bb70613bd796f', 'p', 'jl pramuka no 611 rt03/01', '', '', '', '', ''),
(211, 'Vita Indriana', 11278, 'Administrasi Perkantoran', '', '9958517b2a48851d2ada1c76c88cfc56', 'p', 'jl gn tugel rt 04/01', '', '', '', '', ''),
(212, 'Widya Kurnia Aulia', 11279, 'Administrasi Perkantoran', '', '47b4f1bfdf6d298682e610ad74b37dca', 'p', 'jl sokajati rt 05/03 bantarsoka pwt barat', '', '', '', '', ''),
(213, 'Yeni Agustina', 11280, 'Administrasi Perkantoran', '', '6f46dd176364ccec308c2760189a4605', 'p', 'jl gerilya rt03/05', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
