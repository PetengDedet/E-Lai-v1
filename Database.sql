-- phpMyAdmin SQL Dump
-- version 4.2.9.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2014 at 02:19 PM
-- Server version: 5.5.39-MariaDB
-- PHP Version: 5.5.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `--`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
`administrator_id` int(11) NOT NULL,
  `administrator_nama` varchar(50) NOT NULL,
  `administrator_password` varchar(32) NOT NULL,
  `administrator_gambar` varchar(100) NOT NULL DEFAULT 'img/user.jpg',
  `administrator_session` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`administrator_id`, `administrator_nama`, `administrator_password`, `administrator_gambar`, `administrator_session`) VALUES
(1, 'Ikhwan Maftuh', 'c4ca4238a0b923820dcc509a6f75849b', '../../img/adm/1.jpg', ''),
(2, 'Staff', '03c7c0ace395d80182db07ae2c30f034', '../../img/adm/Staff03c7c0ace395d80182db07ae2c30f034.jpg', ''),
(3, 'Staff Akademik', '03c7c0ace395d80182db07ae2c30f034', '../../img/adm/Staff Akademik03c7c0ace395d80182db07ae2c30f034.jpg', ''),
(4, 'Staff TU', '03c7c0ace395d80182db07ae2c30f034', '../../img/adm/Staff TU4be28dd0d6577ff34fc787989c8a1179.jpg', ''),
(5, 'Asad', '0cc175b9c0f1b6a831c399e269772661', '../../img/adm/5.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `distribusi`
--

CREATE TABLE IF NOT EXISTS `distribusi` (
  `MATAKULIAH_KODE` varchar(4) NOT NULL,
  `DOSEN_KODE` varchar(10) NOT NULL,
`DISTRIBUSI_ID` int(11) NOT NULL,
  `RUANG_ID` int(11) DEFAULT NULL,
  `SEMESTER_ID` int(11) DEFAULT NULL,
  `TAHUNAKADEMIK_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distribusi`
--

INSERT INTO `distribusi` (`MATAKULIAH_KODE`, `DOSEN_KODE`, `DISTRIBUSI_ID`, `RUANG_ID`, `SEMESTER_ID`, `TAHUNAKADEMIK_ID`) VALUES
('MP01', '2000041001', 7, 9, 1, 2014),
('MP01', '2000041001', 9, 15, 1, 2014),
('MP01', '2000041002', 11, 12, 1, 2014),
('MP02', '2000041003', 10, 9, 1, 2014),
('MP02', '2000041003', 12, 12, 1, 2014),
('MP02', '2000041003', 13, 15, 1, 2014),
('MP03', '2000041004', 14, 9, 1, 2014),
('MP03', '2000041005', 15, 12, 1, 2014),
('MP03', '2000041006', 16, 15, 1, 2014),
('MP04', '2000041007', 17, 9, 1, 2014),
('MP04', '2000041008', 18, 12, 1, 2014),
('MP04', '2000041009', 19, 15, 1, 2014),
('MP05', '2000041010', 20, 9, 1, 2014),
('MP05', '2000041010', 21, 12, 1, 2014),
('MP05', '2000041010', 22, 15, 1, 2014),
('MP06', '2000041011', 23, 9, 1, 2014),
('MP13', '2000041018', 24, 9, 3, 2014);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `DOSEN_KODE` varchar(10) NOT NULL,
  `DOSEN_NAMA` varchar(50) DEFAULT NULL,
  `DOSEN_PASSWORD` varchar(32) DEFAULT NULL,
  `DOSEN_GAMBAR` varchar(100) DEFAULT 'img/user.jpg',
  `DOSEN_SESSION` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`DOSEN_KODE`, `DOSEN_NAMA`, `DOSEN_PASSWORD`, `DOSEN_GAMBAR`, `DOSEN_SESSION`) VALUES
('2000041001', 'Ashar Asikin, S.Kom', '7fc56270e7a70fa81a5935b72eacbe29', '../../img/dosen/2000041001.jpg', NULL),
('2000041002', 'Abd. Ghofur, S.Kom', '7fc56270e7a70fa81a5935b72eacbe29', '../../img/dosen/2000041002.jpg', NULL),
('2000041003', 'Rachmat Hidayat, S.Kom', 'e1e1d3d40573127e9ee0480caf1283d6', '../../img/dosen/2000041003.jpg', NULL),
('2000041004', 'A. Farid', '0cc175b9c0f1b6a831c399e269772661', '../../img/dosen/2000041004.jpg', NULL),
('2000041005', 'Irma Yunita, S.Kom', '865c0c0b4ab0e063e5caa3387c1a8741', '../../img/dosen/2000041005.jpg', NULL),
('2000041006', 'Dwi Setyo Raharjo, S.Kom', '8277e0910d750195b448797616e091ad', '../../img/dosen/2000041006.jpg', NULL),
('2000041007', 'Achmad, M.Pd.I', '0cc175b9c0f1b6a831c399e269772661', '../../img/dosen/2000041007.jpg', NULL),
('2000041008', 'Mubasiroh, S.Kom', '6f8f57715090da2632453988d9a1501b', '../../img/dosen/2000041008.jpg', NULL),
('2000041009', 'Saihul Bari, S.Kom', '03c7c0ace395d80182db07ae2c30f034', '../../img/dosen/2000041009.jpg', NULL),
('2000041010', 'Zaehol Fatah, S.Kom', 'fbade9e36a3f36d3d676c1b808451dd7', '../../img/dosen/2000041010.jpg', NULL),
('2000041011', 'Mahrus Ali, MM', '6f8f57715090da2632453988d9a1501b', '../../img/dosen/2000041011.jpg', NULL),
('2000041012', 'Dadan Haedar Rauf, S.Si.', '8277e0910d750195b448797616e091ad', '../../img/dosen/2000041012.jpg', NULL),
('2000041013', 'Drs. Ahmad Rifa&#039;i, S.Pd.', '8277e0910d750195b448797616e091ad', '../../img/dosen/2000041013.jpg', NULL),
('2000041014', 'Muhammad Ihwan, M.HI', '6f8f57715090da2632453988d9a1501b', '../../img/dosen/2000041014.jpg', NULL),
('2000041015', 'Jusrihadi, M.Pd.I', '363b122c528f54df4a0446b6bab05515', '../../img/dosen/2000041015.jpg', NULL),
('2000041016', 'Sucipto, M.Pd.', '03c7c0ace395d80182db07ae2c30f034', '../../img/dosen/2000041016.jpg', NULL),
('2000041017', 'Drs. Shonhaji, M.Pd.I', '8277e0910d750195b448797616e091ad', '../../img/dosen/2000041017.jpg', NULL),
('2000041018', 'Ahmad Homaidi', '0cc175b9c0f1b6a831c399e269772661', '../../img/dosen/2000041018.jpg', NULL),
('2000041019', 'Maksum Syafi&#039;i, S.Kom', '6f8f57715090da2632453988d9a1501b', '../../img/dosen/2000041019.jpg', NULL),
('2000041020', 'Taufik Saleh, S.Kom', 'e358efa489f58062f10dd7316b65649e', '../../img/dosen/2000041020.jpg', NULL),
('2000041021', 'Sunardi, S.Si.', '03c7c0ace395d80182db07ae2c30f034', '../../img/dosen/2000041021.jpg', NULL),
('2000041022', 'Lukman Fakih L, S.Kom', '2db95e8e1a9267b7a1188556b2013b33', '../../img/dosen/2000041022.jpg', NULL),
('2000041023', 'Erwan Pujianto, S.Kom', 'e1671797c52e15f763380b45e841ec32', '../../img/dosen/2000041023.jpg', NULL),
('2000041024', 'Badrul Alamin, S.Kom', '92eb5ffee6ae2fec3ad71c777531578f', '../../img/dosen/2000041024.jpg', NULL),
('2000041025', 'Ahmad Baijuri, S.Kom', '0cc175b9c0f1b6a831c399e269772661', '../../img/dosen/2000041025.jpg', NULL),
('2000041026', 'Satria Utama, S.Kom', '03c7c0ace395d80182db07ae2c30f034', '../../img/dosen/2000041026.jpg', NULL),
('2000041027', 'Nur Azizah, S.Kom', '7b8b965ad4bca0e41ab51de7b31363a1', '../../img/dosen/2000041027.jpg', NULL),
('2000041028', 'Ahmad Lutfi, S.Kom', '0cc175b9c0f1b6a831c399e269772661', '../../img/dosen/2000041028.jpg', NULL),
('2000041029', 'Ika Maria, S.Kom', '865c0c0b4ab0e063e5caa3387c1a8741', '../../img/dosen/2000041029.jpg', NULL),
('2000041030', 'H. Ahmad Muyassir, M.Cs', '2510c39011c5be704182423e3a695e91', '../../img/dosen/2000041030.jpg', NULL),
('2000041031', 'M. Mujib Ridwan, MT', '6f8f57715090da2632453988d9a1501b', '../../img/dosen/2000041031.jpg', NULL),
('2000041032', 'Hermanto, S.Kom', '2510c39011c5be704182423e3a695e91', '../../img/dosen/2000041032.jpg', NULL),
('2000041033', 'Syahrul Ibad, M.AP.', '03c7c0ace395d80182db07ae2c30f034', '../../img/dosen/2000041033.jpg', NULL),
('2000041034', 'Ahmad Khairuddin, M.Pd.', '0cc175b9c0f1b6a831c399e269772661', '../../img/dosen/2000041034.jpg', NULL),
('2000041035', 'Sugeng Purwo, MM', '03c7c0ace395d80182db07ae2c30f034', '../../img/dosen/2000041035.jpg', NULL),
('2000041036', 'M. Haris Baladi, MM', '6f8f57715090da2632453988d9a1501b', '../../img/dosen/2000041036.jpg', NULL),
('2000041037', 'Agung Teguh, S.Kom.', '0cc175b9c0f1b6a831c399e269772661', '../../img/dosen/2000041037.jpg', NULL),
('2000041038', 'Muhasshanah, S.Kom.', '6f8f57715090da2632453988d9a1501b', '../../img/dosen/2000041038.jpg', NULL),
('2000041039', 'Akhlis Munazilin, MT', '0cc175b9c0f1b6a831c399e269772661', '../../img/dosen/2000041039.jpg', NULL),
('2000041040', 'Hari Santoso, S.Kom', '2510c39011c5be704182423e3a695e91', '../../img/dosen/2000041040.jpg', NULL),
('2000041041', 'Ahmad Fauzi, M.Kom.', '0cc175b9c0f1b6a831c399e269772661', '../../img/dosen/2000041041.jpg', NULL),
('2000041042', 'Ricky Juliyastio, S.Kom.', '4b43b0aee35624cd95b910189b3dc231', '../../img/dosen/2000041042.jpg', NULL),
('2000041043', 'Zainul Walid, S.Ag.', 'fbade9e36a3f36d3d676c1b808451dd7', '../../img/dosen/2000041043.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
`jawaban_id` int(11) NOT NULL,
  `jawaban_string` varchar(1) NOT NULL,
  `pertanyaan_id` int(11) NOT NULL,
  `mahasiswa_npm` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kampus`
--

CREATE TABLE IF NOT EXISTS `kampus` (
  `KAMPUS_KODE` varchar(4) NOT NULL,
  `KAMPUS_STRING` varchar(50) DEFAULT NULL,
  `KAMPUS_ALAMAT` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kampus`
--

INSERT INTO `kampus` (`KAMPUS_KODE`, `KAMPUS_STRING`, `KAMPUS_ALAMAT`) VALUES
('BLTK', 'AMIK Bletok', 'Gedung AMIK Ibrahimy Beletok Situbondo'),
('GNTG', 'AMIK Genteng', 'Gedung AMIK Ibrahimy Genteng Banyuwangi'),
('KOTA', 'Kampus Kota', 'Kompleks Institut Agama Islam Ibrahimy Panji Situbondo'),
('SKJ1', 'Sukorejo Putera', 'Pondok Pesantren Salafiyah Syafiiyah Sukorejo Situbondo'),
('SKJ2', 'Sukorejo Putri', 'Pondok Pesantren Salafiyah Syafiiyah Sukorejo Situbondo');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
`komentar_id` int(11) NOT NULL,
  `komentar_isi` text NOT NULL,
  `komentar_tgl_kirim` datetime NOT NULL,
  `komentar_poster_m` varchar(11) DEFAULT NULL,
  `komentar_poster_d` varchar(11) DEFAULT NULL,
  `topik_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`komentar_id`, `komentar_isi`, `komentar_tgl_kirim`, `komentar_poster_m`, `komentar_poster_d`, `topik_id`) VALUES
(105, '&lt;p&gt;Boleh saya bertanya pak?&lt;/p&gt;', '2014-08-18 23:02:19', '2013041002', NULL, 25),
(106, '&lt;p&gt;Ya, silahkan mas gafur...&lt;/p&gt;', '2014-08-18 23:03:05', NULL, '2000041010', 25),
(107, '&lt;p&gt;Sejak kapan persisnya sistem operasi mulai dikenal?&lt;/p&gt;', '2014-08-18 23:04:41', '2013041002', NULL, 25),
(108, '&lt;p&gt;@gafur : Pertanyaanmua aneh&lt;/p&gt;', '2014-08-18 23:06:37', '2013041049', NULL, 25),
(109, '&lt;p&gt;Saya tidak tahu kapan persisnya, tapi sejarah mencatat sistem operasi komputer mulai dikenal pada tahun 60-an di Bell Labs&lt;/p&gt;', '2014-08-18 23:09:41', NULL, '2000041010', 25),
(110, '&lt;p&gt;@yazid : tidak apa-apa, pertanyaan yang bagus menunjukkan rasa ingin tahu yang tinggi :)&lt;/p&gt;', '2014-08-18 23:10:27', NULL, '2000041010', 25),
(111, '&lt;p&gt;Wah, mantap ini jadi ndak usah repot repot bikin css sendiri :D :D :D&lt;/p&gt;', '2014-08-18 23:19:48', '2013041049', NULL, 26);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `MAHASISWA_NPM` varchar(10) NOT NULL,
  `RUANG_ID` int(11) DEFAULT NULL,
  `MAHASISWA_NAMA` varchar(50) DEFAULT NULL,
  `MAHASISWA_PASSWORD` varchar(32) DEFAULT NULL,
  `MAHASISWA_GAMBAR` varchar(100) DEFAULT 'img/user.jpg',
  `MAHASISWA_SESSION` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`MAHASISWA_NPM`, `RUANG_ID`, `MAHASISWA_NAMA`, `MAHASISWA_PASSWORD`, `MAHASISWA_GAMBAR`, `MAHASISWA_SESSION`) VALUES
('2013041001', 9, 'Abdul Aziz', '0cc175b9c0f1b6a831c399e269772661', '../../img/mhs/2013041001.jpg', NULL),
('2013041002', 9, 'Abdul Gafur', '0cc175b9c0f1b6a831c399e269772661', '../../img/mhs/2013041002.jpg', NULL),
('2013041023', 9, 'Badrut Tamam', '92eb5ffee6ae2fec3ad71c777531578f', '../../img/mhs/2013041023.jpg', NULL),
('2013041024', 9, 'Bayu Arif Widya', '92eb5ffee6ae2fec3ad71c777531578f', '../../img/mhs/2013041024.jpg', NULL),
('2013041026', 9, 'Dede Saeful Malik', '8277e0910d750195b448797616e091ad', '../../img/mhs/2013041026.jpg', NULL),
('2013041049', 9, 'M. Yazid Hamdih', '6f8f57715090da2632453988d9a1501b', '../../img/mhs/2013041049.jpg', NULL),
('2013041086', 12, 'Badriyatus Sholihah', '92eb5ffee6ae2fec3ad71c777531578f', '../../img/mhs/2013041086.jpg', NULL),
('2013041091', 12, 'Eriza Tamara Indira Purnamasari', 'e1671797c52e15f763380b45e841ec32', '../../img/mhs/2013041091.jpg', NULL),
('2013041183', 15, 'Rudiyanto', '4b43b0aee35624cd95b910189b3dc231', '../../img/mhs/2013041183.jpg', NULL),
('2013041217', 15, 'Ita Sukriyati', '865c0c0b4ab0e063e5caa3387c1a8741', '../../img/mhs/2013041217.jpg', NULL),
('2013041218', 15, 'Ahmad Taufik', '0cc175b9c0f1b6a831c399e269772661', '../../img/mhs/2013041218.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `MATAKULIAH_KODE` varchar(4) NOT NULL,
  `PRODI_ID` varchar(2) DEFAULT NULL,
  `MATAKULIAH_STRING` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`MATAKULIAH_KODE`, `PRODI_ID`, `MATAKULIAH_STRING`) VALUES
('MP01', '3', 'Logika dan Algoritma'),
('MP02', '3', 'Pemrograman 1'),
('MP03', '3', 'PTI'),
('MP04', '3', 'Aplikasi Perkantoran 1 (Word processing &amp; Presentasi)'),
('MP05', '3', 'Sistem Operasi'),
('MP06', '3', 'Manajemen Bisnis'),
('MP07', '3', 'Matematika Dasar'),
('MP08', '3', 'Pendidikan Agama'),
('MP09', '3', 'Bahasa Indonesia'),
('MP10', '3', 'Sistem Informasi Manajemen'),
('MP11', '3', 'Sistem database (Access &amp; MySQL)'),
('MP12', '3', 'Jaringan Komputer'),
('MP13', '3', 'Desain Web'),
('MP14', '3', 'Jaringan Nirkabel'),
('MP15', '2', 'Desain Grafis 1'),
('MP16', '2', 'Animasi 2D-1 (Flash dn Derector)'),
('MP17', '2', 'Audio &amp; Video Editing'),
('MP18', '1', 'SIA'),
('MP19', '1', 'RPL'),
('MP20', '1', 'Pemrograman Berorientasi Objek'),
('MP21', '3', 'Etika Profesi Informatika'),
('MP22', '3', 'Kewirausahaan'),
('mp23', '2', 'Project Teknologi Informasi'),
('MP24', '3', 'e-Bisnis'),
('MP25', '1', 'Mobile Computing (Java/Android)'),
('MP26', '1', 'GIS'),
('MP27', '3', 'Riset Operasi'),
('MP28', '1', 'SIBO'),
('MP29', '2', 'Produksi TV'),
('MP30', '2', 'Per-Film-an'),
('MP31', '2', 'Spesial Effect'),
('MP32', '2', 'Teknologi Pembelajaran');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
`nilai_id` int(11) NOT NULL,
  `nilai_benar` int(11) NOT NULL,
  `nilai_salah` int(11) NOT NULL,
  `nilai_persentase` int(11) NOT NULL,
  `nilai_kosong` int(11) NOT NULL,
  `mahasiswa_npm` varchar(11) NOT NULL,
  `soal_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nilai_id`, `nilai_benar`, `nilai_salah`, `nilai_persentase`, `nilai_kosong`, `mahasiswa_npm`, `soal_id`) VALUES
(4, 2, 1, 67, 0, '2013041049', 4),
(5, 1, 2, 34, 0, '2013041002', 4),
(6, 0, 2, 0, 1, '2013041026', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE IF NOT EXISTS `pertanyaan` (
`pertanyaan_id` int(11) NOT NULL,
  `pertanyaan_string` text NOT NULL,
  `pertanyaan_pil_a` text NOT NULL,
  `pertanyaan_pil_b` text,
  `pertanyaan_pil_c` text,
  `pertanyaan_pil_d` text,
  `pertanyaan_pil_e` text,
  `pertanyaan_kunci` enum('A','B','C','D','E') NOT NULL DEFAULT 'A',
  `soal_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`pertanyaan_id`, `pertanyaan_string`, `pertanyaan_pil_a`, `pertanyaan_pil_b`, `pertanyaan_pil_c`, `pertanyaan_pil_d`, `pertanyaan_pil_e`, `pertanyaan_kunci`, `soal_id`) VALUES
(5, '&lt;p&gt;Di dalam listing di bawah ini, manakah yang menyebabkan error?&lt;/p&gt;&lt;pre&gt;&lt;code class=&quot;language-css&quot;&gt;\r\n@media print {\r\n  * {\r\n    text-shadow: none !important;\r\n    color: #000 !important;\r\n    background: transparent !important;\r\n    box-shadow: none !important;\r\n  }\r\n  a,\r\n  a:visited {\r\n    text-decoration: underline;\r\n  }\r\n  a[href]:after {\r\n    content: &quot; (&quot; attr(href) &quot;)&quot;;\r\n  }\r\n  abbr[title]:after {\r\n    content: &quot; (&quot; attr(title) &quot;)&quot;;\r\n  }\r\n  a[href^=javascript:]:after,\r\n  a[href^=&quot;#&quot;]:after {\r\n    content: &quot;&quot;;\r\n  }\r\n&lt;/code&gt;&lt;/pre&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '-moz-box-sizing: content-box;', 'a[href^=javascript:]:after,', 'content: &quot; (&quot; attr(href) &quot;)&quot;;', 'color: #000 !important;', 'html input[type=&quot;button&quot;],', 'B', 4),
(6, '&lt;p&gt;Apakah yang menyebabkan listing di bawah ini tidak berjalan dengan benar?&lt;/p&gt;&lt;pre&gt;&lt;code class=&quot;language-javascript&quot;&gt;script type=&quot;text/javascript&quot;&amp;gt;CKEDITOR.replace(&#039;isitopik&#039;,{extraPlugins: &#039;codesnippet&#039;,codeSnippet_theme: &#039;default&#039;})&amp;lt;/script&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 'Kurang singel quote (&#039;)', 'Kurang double quote (&quot;)', 'Kelebihan backslash (/)', 'Kurang semicolon (;)', 'Upper/Lowercase', 'D', 4),
(7, '&lt;p&gt;Temukan kesalahan yang ada di listing berikut ini&lt;/p&gt;&lt;pre&gt;&lt;code class=&quot;language-html&quot;&gt;&amp;lt;script type=&quot;text/javascript&quot; src=&quot;../.../js/jquery-2.0.3.min.js&quot;&amp;gt;&amp;lt;/script&amp;gt;\r\n&amp;lt;script type=&quot;text/javascript&quot; src=&quot;../../js/bootstrap.min.js&quot;&amp;gt;&amp;lt;/script&amp;gt;\r\n&amp;lt;script type=&quot;text/javascript&quot; src=&quot;../../ck/ckeditor.js&quot;&amp;gt;&amp;lt;/script&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 'Baris ke-1', 'Baris ke-2', 'Baris ke-3', 'Semua baris ada kesalahan', 'Tidak ada kesalahan', 'A', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `DOSEN_KODE` varchar(10) DEFAULT '',
  `MAHASISWA_NPM` varchar(10) DEFAULT '',
`PESAN_ID` int(11) NOT NULL,
  `PESAN_SUBJEK` varchar(50) DEFAULT NULL,
  `PESAN_ISI` text,
  `PESAN_LAMPIRAN` varchar(100) DEFAULT NULL,
  `PESAN_TGL_KIRIM` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`DOSEN_KODE`, `MAHASISWA_NPM`, `PESAN_ID`, `PESAN_SUBJEK`, `PESAN_ISI`, `PESAN_LAMPIRAN`, `PESAN_TGL_KIRIM`) VALUES
('2000041018', '2013041002', 27, 'Tanya Bootstrap', '&lt;p&gt;Assalamualaikum,&lt;/p&gt;&lt;p&gt;Pak, apakah bootstrap itu opensource?&lt;/p&gt;&lt;p&gt;Dan apakah kita perlu membayar untuk dapat menggunakan bootstrap?&lt;/p&gt;&lt;p&gt;Trimakasih&lt;/p&gt;', '', '2014-08-18 16:39:51'),
('2000041018', '2013041002', 28, 'Tanya Bootstrap', '&lt;p&gt;Ya, bootstrap bersifat opensource.&lt;/p&gt;&lt;p&gt;Tidak perlu membayar. Selain dibebaskan mengubah dan memodifikasi isi bootstrap, kita dapat menggunakannya secara gratis dan bebas.&lt;/p&gt;&lt;p&gt;Tapi perlu diingat (opensource &amp;lt;&amp;gt; gratis)...!!!&lt;/p&gt;', '', '2014-08-18 16:42:13'),
('2000041010', '2013041002', 29, 'Ubuntu vs Fedora', '&lt;p&gt;Assalamualaikum,&lt;/p&gt;&lt;p&gt;Pak Zaehol apa bedanya Ubuntu dan Fedora? Apakah bisa dibandingkan dengan WIndows 7 dan Windows Vista?&lt;/p&gt;', '', '2014-08-18 16:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `PRODI_ID` varchar(2) NOT NULL,
  `PRODI_STRING` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`PRODI_ID`, `PRODI_STRING`) VALUES
('1', 'PROGRAMMING'),
('2', 'MULTIMEDIA'),
('3', 'UMUM');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE IF NOT EXISTS `ruang` (
`RUANG_ID` int(11) NOT NULL,
  `KAMPUS_KODE` varchar(4) DEFAULT NULL,
  `RUANG_STRING` varchar(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`RUANG_ID`, `KAMPUS_KODE`, `RUANG_STRING`) VALUES
(9, 'SKJ1', 'A'),
(10, 'SKJ1', 'B'),
(11, 'SKJ1', 'C'),
(12, 'SKJ2', 'A'),
(13, 'SKJ2', 'B'),
(14, 'SKJ2', 'C'),
(15, 'KOTA', 'A'),
(16, 'KOTA', 'B'),
(17, 'GNTG', 'A'),
(18, 'BLTK', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `SEMESTER_ID` int(11) NOT NULL,
  `SEMESTER_STRING` varchar(3) DEFAULT NULL,
  `SEMESTER_HITUNGAN` enum('Ganjil','Genap') DEFAULT NULL,
  `SEMESTER_STATUS` enum('Aktif','Tidak Aktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`SEMESTER_ID`, `SEMESTER_STRING`, `SEMESTER_HITUNGAN`, `SEMESTER_STATUS`) VALUES
(1, 'I', 'Ganjil', 'Aktif'),
(2, 'II', 'Genap', 'Tidak Aktif'),
(3, 'III', 'Ganjil', 'Aktif'),
(4, 'IV', 'Genap', 'Tidak Aktif'),
(5, 'V', 'Ganjil', 'Aktif'),
(6, 'VI', 'Genap', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
`soal_id` int(11) NOT NULL,
  `soal_judul` varchar(100) NOT NULL,
  `soal_jenis` enum('UH','UTS','UAS') NOT NULL DEFAULT 'UH',
  `soal_password` varchar(100) DEFAULT NULL,
  `distribusi_id` int(11) NOT NULL,
  `soal_status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Tidak Aktif'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`soal_id`, `soal_judul`, `soal_jenis`, `soal_password`, `distribusi_id`, `soal_status`) VALUES
(4, 'Uji Teliti Script', 'UTS', '51e69892ab49df85c6230ccc57f8e1d1606caccc', 24, 'Aktif'),
(5, 'Pengenalan Sistem Operasi Komputer', 'UTS', '95cb0bfd2977c761298d9624e4b4d4c72a39974a', 22, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tahunakademik`
--

CREATE TABLE IF NOT EXISTS `tahunakademik` (
  `TAHUNAKADEMIK_ID` int(11) NOT NULL,
  `TAHUNAKADEMIK_STRING` varchar(9) DEFAULT NULL,
  `TAHUNAKADEMIK_STATUS` enum('Aktif','Tidak Aktif','Belum Aktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahunakademik`
--

INSERT INTO `tahunakademik` (`TAHUNAKADEMIK_ID`, `TAHUNAKADEMIK_STRING`, `TAHUNAKADEMIK_STATUS`) VALUES
(2014, '2014', 'Aktif'),
(2015, '2015', 'Belum Aktif'),
(2016, '2016', 'Belum Aktif'),
(2017, '2017', 'Belum Aktif'),
(2018, '2018', 'Belum Aktif'),
(2019, '2019', 'Belum Aktif'),
(2020, '2020', 'Belum Aktif'),
(2021, '2021', 'Belum Aktif'),
(2022, '2022', 'Belum Aktif'),
(2023, '2023', 'Belum Aktif'),
(2024, '2024', 'Belum Aktif'),
(2025, '2025', 'Belum Aktif'),
(2026, '2026', 'Belum Aktif'),
(2027, '2027', 'Belum Aktif'),
(2028, '2028', 'Belum Aktif'),
(2029, '2029', 'Belum Aktif'),
(2030, '2030', 'Belum Aktif'),
(2031, '2031', 'Belum Aktif'),
(2032, '2032', 'Belum Aktif'),
(2033, '2033', 'Belum Aktif'),
(2034, '2034', 'Belum Aktif'),
(2035, '2035', 'Belum Aktif'),
(2036, '2036', 'Belum Aktif'),
(2037, '2037', 'Belum Aktif'),
(2038, '2038', 'Belum Aktif'),
(2039, '2039', 'Belum Aktif'),
(2040, '2040', 'Belum Aktif'),
(2041, '2041', 'Belum Aktif'),
(2042, '2042', 'Belum Aktif'),
(2043, '2043', 'Belum Aktif'),
(2044, '2044', 'Belum Aktif'),
(2045, '2045', 'Belum Aktif'),
(2046, '2046', 'Belum Aktif'),
(2047, '2047', 'Belum Aktif'),
(2048, '2048', 'Belum Aktif'),
(2049, '2049', 'Belum Aktif'),
(2050, '2050', 'Belum Aktif'),
(2051, '2051', 'Belum Aktif'),
(2052, '2052', 'Belum Aktif'),
(2053, '2053', 'Belum Aktif'),
(2054, '2054', 'Belum Aktif'),
(2055, '2055', 'Belum Aktif'),
(2056, '2056', 'Belum Aktif'),
(2057, '2057', 'Belum Aktif'),
(2058, '2058', 'Belum Aktif'),
(2059, '2059', 'Belum Aktif'),
(2060, '2060', 'Belum Aktif'),
(2061, '2061', 'Belum Aktif'),
(2062, '2062', 'Belum Aktif'),
(2063, '2063', 'Belum Aktif'),
(2064, '2064', 'Belum Aktif'),
(2065, '2065', 'Belum Aktif'),
(2066, '2066', 'Belum Aktif'),
(2067, '2067', 'Belum Aktif'),
(2068, '2068', 'Belum Aktif'),
(2069, '2069', 'Belum Aktif'),
(2070, '2070', 'Belum Aktif'),
(2071, '2071', 'Belum Aktif'),
(2072, '2072', 'Belum Aktif'),
(2073, '2073', 'Belum Aktif'),
(2074, '2074', 'Belum Aktif'),
(2075, '2075', 'Belum Aktif'),
(2076, '2076', 'Belum Aktif'),
(2077, '2077', 'Belum Aktif'),
(2078, '2078', 'Belum Aktif'),
(2079, '2079', 'Belum Aktif'),
(2080, '2080', 'Belum Aktif'),
(2081, '2081', 'Belum Aktif'),
(2082, '2082', 'Belum Aktif'),
(2083, '2083', 'Belum Aktif'),
(2084, '2084', 'Belum Aktif'),
(2085, '2085', 'Belum Aktif'),
(2086, '2086', 'Belum Aktif'),
(2087, '2087', 'Belum Aktif'),
(2088, '2088', 'Belum Aktif'),
(2089, '2089', 'Belum Aktif'),
(2090, '2090', 'Belum Aktif'),
(2091, '2091', 'Belum Aktif'),
(2092, '2092', 'Belum Aktif'),
(2093, '2093', 'Belum Aktif'),
(2094, '2094', 'Belum Aktif'),
(2095, '2095', 'Belum Aktif'),
(2096, '2096', 'Belum Aktif'),
(2097, '2097', 'Belum Aktif'),
(2098, '2098', 'Belum Aktif'),
(2099, '2099', 'Belum Aktif'),
(2100, '2100', 'Belum Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE IF NOT EXISTS `topik` (
`topik_id` int(11) NOT NULL,
  `topik_judul` varchar(255) NOT NULL,
  `topik_isi` text NOT NULL,
  `topik_tgl_kirim` datetime NOT NULL,
  `topik_lampiran` varchar(100) DEFAULT NULL,
  `distribusi_id` int(11) DEFAULT NULL,
  `topik_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`topik_id`, `topik_judul`, `topik_isi`, `topik_tgl_kirim`, `topik_lampiran`, `distribusi_id`, `topik_update`) VALUES
(25, 'Pengenalan Sistem Operasi Komputer', '&lt;p&gt;&lt;strong&gt;Bagian I. Konsep Dasar&lt;/strong&gt;&lt;/p&gt;&lt;ol&gt;&lt;li&gt;&lt;strong&gt;Perangkat Komputer&lt;/strong&gt;&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;Komputer modern merupakan sistem yang kompleks. Secara fisik, komputer tersebut terdiri dari&lt;br /&gt;beberapa bagian seperti prosesor, memori, disk, pencetak (printer), serta perangkat lainnya.&lt;br /&gt;Perangkat keras tersebut digunakan untuk menjalankan berbagai perangkat lunak aplikasi (software&lt;br /&gt;aplication). Sebuah Sistem Operasi merupakan perangkat lunak penghubung antara perangkat keras&lt;br /&gt;(hardware) dengan perangkat lunak aplikasi tersebut di atas.&lt;br /&gt;Bagian ini (Bagian I, &amp;ldquo;Konsep Dasar Perangkat Komputer&amp;rdquo;), menguraikan secara umum&lt;br /&gt;komponen-komponen komputer seperti Sistem Operasi, perangkat keras, proteksi, keamanan, serta&lt;br /&gt;jaringan komputer. Aspek-aspek tersebut diperlukan untuk memahami konsep-konsep Sistem&lt;br /&gt;Operasi yang akan dijabarkan dalam buku ini. Tentunya tidak dapat diharapkan pembahasan yang&lt;br /&gt;dalam. Rincian lanjut, sebaiknya dilihat pada rujukan yang berhubungan dengan &amp;quot;Pengantar&lt;br /&gt;Organisasi Komputer&amp;quot;, &amp;quot;Pengantar Struktur Data&amp;quot;, serta &amp;quot;Pengantar Jaringan Komputer&amp;quot;. Bagian II,&lt;br /&gt;&amp;ldquo;Konsep Dasar Sistem Operasi&amp;rdquo; akan memperkenalkan secara umum seputar Sistem Operasi.&lt;br /&gt;Bagian selanjutnya, akan menguraikan yang lebih rinci dari seluruh aspek Sistem Operasi.&lt;/p&gt;', '2014-08-18 23:01:40', '../../lampiran/Pengenalan Sistem Operasi Komputer20slackbasics.pdf', 20, '2014-08-18 16:10:27'),
(26, 'Membuat Web Responsive Dengan Twitter Bootstrap', '&lt;p&gt;Bootstrap adalah sebuah framework yang dapat menyelesaikan&lt;br /&gt;permasalahan dalam mendesain web. Slogan dari framework ini adalah &amp;ldquo;Sleek,&lt;br /&gt;intuitive, and powerful front-end framework for faster and easier web&lt;br /&gt;development&amp;rdquo;, yang berarti kita dapat mendesain sebuah website dengan lebih&lt;br /&gt;rapi, cepat dan mudah. Selain itu Bootstrap juga responsive terhadap banyak&lt;br /&gt;platform, artinya tampilan halaman website yang menggunakan Bootstrap ini&lt;br /&gt;akan tampak tetap rapi, baik versi mobile maupun desktop.&lt;br /&gt;Saat ini penggunaan Bootstrap sudah meluas di kalangan disainer front-end&lt;br /&gt;web, perkembangannya pun masih terus berlangsung hingga sekarang.&lt;br /&gt;Penggunaannya pun tidak begitu rumit. Mudah, karna kita tinggal memanggil CSS&lt;br /&gt;dan JS yang tersedia lalu menuliskan class-class nya di kodingan kita aja gan.&lt;br /&gt;Bootstrap memiliki 12-column responsive grid, macam-macam&lt;br /&gt;components, JavaScript plugins, typography, form controls, dan juga sebuah web-&lt;br /&gt;based Customizer untuk membuat Bootstrap agan sendiri.&lt;br /&gt;Agan tau twitter kan? ïŠ nah twitter juga menggunakan CSS frameworks ini&lt;br /&gt;gan. Jadi kalo agan pengen punya tampilan yang &amp;ldquo;mahal&amp;rdquo; agan tinggal pake&lt;br /&gt;Bootstrap ini aja. Bootsrap bisa di unduh melalui situs ini gan &amp;gt;&lt;br /&gt;http://twitter.github.io/bootstrap&lt;br /&gt;Kalo udah di unduh, agan ekstrak ke localdisk yang mudah di jangkau aja.&lt;br /&gt;@WahyuGaje&lt;br /&gt;6Struktur utama file Bootstrap seperti ini gan :&lt;br /&gt;bootstrap/&lt;br /&gt;â”œâ”€â”€ css/&lt;br /&gt;â”‚&lt;br /&gt;â”œâ”€â”€ bootstrap.css&lt;br /&gt;â”‚&lt;br /&gt;â”œâ”€â”€ bootstrap.min.css&lt;br /&gt;â”œâ”€â”€ js/&lt;br /&gt;â”‚&lt;br /&gt;â”œâ”€â”€ bootstrap.js&lt;br /&gt;â”‚&lt;br /&gt;â”œâ”€â”€ bootstrap.min.js&lt;br /&gt;â””â”€â”€ img/&lt;br /&gt;â”œâ”€â”€ glyphicons-halflings.png&lt;br /&gt;â””â”€â”€ glyphicons-halflings-white.png&lt;br /&gt;Text editor&lt;br /&gt;ane saranin agan pake sublime aja, karena ane pake itu juga. Bisa diunduh gratis&lt;br /&gt;di http://sublimetext.com/2&lt;br /&gt;Gambar 1. Tampilan Aplikasi Sublimetext&lt;br /&gt;@WahyuGaje&lt;br /&gt;7Sebelumnya kita harus tau, apa ngaruhnya pake bootsrap atau nggak. Untuk&lt;br /&gt;itulah agan langsung praktekkin langkah ini aja ya. ïŠ&lt;br /&gt;Pertama, buka text editor sublimetext yang udah agan download tadi.&lt;br /&gt;Selanjutnya buat sebuah file dengan nama index.html yang isinya koding seperti&lt;br /&gt;dibawah ini:&lt;/p&gt;&lt;pre&gt;&lt;code class=&quot;language-html&quot;&gt;&amp;lt;html&amp;gt;\r\n&amp;lt;head&amp;gt;\r\n&amp;lt;title&amp;gt;Latihan Bootstrap&amp;lt;/title&amp;gt;\r\n&amp;lt;/head&amp;gt;\r\n&amp;lt;body&amp;gt;\r\n&amp;lt;h1&amp;gt;Hello, world!&amp;lt;/h1&amp;gt;\r\n&amp;lt;script src=&quot;http://code.jquery.com/jquery.js&quot;&amp;gt;&amp;lt;/script&amp;gt;\r\n&amp;lt;/body&amp;gt;\r\n&amp;lt;/html&amp;gt;&lt;/code&gt;&lt;/pre&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '2014-08-18 23:18:21', '../../lampiran/Membuat Web Responsive Dengan Twitter Bootstrap24bootstrap.pdf', 24, '2014-08-18 16:19:48');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_distribusi`
--
CREATE TABLE IF NOT EXISTS `view_distribusi` (
`distribusi_id` int(11)
,`matakuliah_kode` varchar(4)
,`matakuliah_string` varchar(100)
,`PRODI_ID` varchar(2)
,`PRODI_STRING` varchar(50)
,`ruang_id` int(11)
,`ruang_string` varchar(1)
,`KAMPUS_KODE` varchar(4)
,`KAMPUS_STRING` varchar(50)
,`KAMPUS_ALAMAT` text
,`SEMESTER_ID` int(11)
,`SEMESTER_STRING` varchar(3)
,`SEMESTER_HITUNGAN` enum('Ganjil','Genap')
,`SEMESTER_STATUS` enum('Aktif','Tidak Aktif')
,`TAHUNAKADEMIK_ID` int(11)
,`TAHUNAKADEMIK_STRING` varchar(9)
,`TAHUNAKADEMIK_STATUS` enum('Aktif','Tidak Aktif','Belum Aktif')
,`DOSEN_KODE` varchar(10)
,`DOSEN_NAMA` varchar(50)
,`DOSEN_PASSWORD` varchar(32)
,`DOSEN_GAMBAR` varchar(100)
,`DOSEN_SESSION` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_komentar`
--
CREATE TABLE IF NOT EXISTS `view_komentar` (
`ruang_id` int(11)
,`ruang_string` varchar(1)
,`KAMPUS_KODE` varchar(4)
,`KAMPUS_STRING` varchar(50)
,`KAMPUS_ALAMAT` text
,`mahasiswa_npm` varchar(10)
,`mahasiswa_nama` varchar(50)
,`mahasiswa_gambar` varchar(100)
,`mahasiswa_password` varchar(32)
,`mahasiswa_session` varchar(100)
,`DOSEN_KODE` varchar(10)
,`DOSEN_NAMA` varchar(50)
,`DOSEN_PASSWORD` varchar(32)
,`DOSEN_GAMBAR` varchar(100)
,`DOSEN_SESSION` varchar(100)
,`komentar_id` int(11)
,`komentar_isi` text
,`komentar_tgl_kirim` datetime
,`komentar_poster_m` varchar(11)
,`komentar_poster_d` varchar(11)
,`topik_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_list_topik`
--
CREATE TABLE IF NOT EXISTS `view_list_topik` (
`distribusi_id` int(11)
,`matakuliah_kode` varchar(4)
,`matakuliah_string` varchar(100)
,`PRODI_ID` varchar(2)
,`PRODI_STRING` varchar(50)
,`ruang_id` int(11)
,`ruang_string` varchar(1)
,`KAMPUS_KODE` varchar(4)
,`KAMPUS_STRING` varchar(50)
,`KAMPUS_ALAMAT` text
,`SEMESTER_ID` int(11)
,`SEMESTER_STRING` varchar(3)
,`SEMESTER_HITUNGAN` enum('Ganjil','Genap')
,`SEMESTER_STATUS` enum('Aktif','Tidak Aktif')
,`TAHUNAKADEMIK_ID` int(11)
,`TAHUNAKADEMIK_STRING` varchar(9)
,`TAHUNAKADEMIK_STATUS` enum('Aktif','Tidak Aktif','Belum Aktif')
,`DOSEN_KODE` varchar(10)
,`DOSEN_NAMA` varchar(50)
,`DOSEN_PASSWORD` varchar(32)
,`DOSEN_GAMBAR` varchar(100)
,`DOSEN_SESSION` varchar(100)
,`topik_update` timestamp
,`topik_id` int(11)
,`topik_judul` varchar(255)
,`topik_isi` text
,`topik_tgl_kirim` datetime
,`topik_lampiran` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_mahasiswa`
--
CREATE TABLE IF NOT EXISTS `view_mahasiswa` (
`ruang_id` int(11)
,`ruang_string` varchar(1)
,`KAMPUS_KODE` varchar(4)
,`KAMPUS_STRING` varchar(50)
,`KAMPUS_ALAMAT` text
,`mahasiswa_npm` varchar(10)
,`mahasiswa_nama` varchar(50)
,`mahasiswa_gambar` varchar(100)
,`mahasiswa_password` varchar(32)
,`mahasiswa_session` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_matakuliah`
--
CREATE TABLE IF NOT EXISTS `view_matakuliah` (
`matakuliah_kode` varchar(4)
,`matakuliah_string` varchar(100)
,`PRODI_ID` varchar(2)
,`PRODI_STRING` varchar(50)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_nilai`
--
CREATE TABLE IF NOT EXISTS `view_nilai` (
`nilai_id` int(11)
,`nilai_benar` int(11)
,`nilai_salah` int(11)
,`nilai_persentase` int(11)
,`nilai_kosong` int(11)
,`mahasiswa_npm` varchar(10)
,`mahasiswa_nama` varchar(50)
,`mahasiswa_gambar` varchar(100)
,`soal_id` int(11)
,`soal_judul` varchar(100)
,`soal_jenis` enum('UH','UTS','UAS')
,`soal_password` varchar(100)
,`soal_status` enum('Aktif','Tidak Aktif')
,`distribusi_id` int(11)
,`matakuliah_kode` varchar(4)
,`matakuliah_string` varchar(100)
,`PRODI_ID` varchar(2)
,`PRODI_STRING` varchar(50)
,`ruang_id` int(11)
,`ruang_string` varchar(1)
,`KAMPUS_KODE` varchar(4)
,`KAMPUS_STRING` varchar(50)
,`KAMPUS_ALAMAT` text
,`SEMESTER_ID` int(11)
,`SEMESTER_STRING` varchar(3)
,`SEMESTER_HITUNGAN` enum('Ganjil','Genap')
,`SEMESTER_STATUS` enum('Aktif','Tidak Aktif')
,`TAHUNAKADEMIK_ID` int(11)
,`TAHUNAKADEMIK_STRING` varchar(9)
,`TAHUNAKADEMIK_STATUS` enum('Aktif','Tidak Aktif','Belum Aktif')
,`DOSEN_KODE` varchar(10)
,`DOSEN_NAMA` varchar(50)
,`DOSEN_PASSWORD` varchar(32)
,`DOSEN_GAMBAR` varchar(100)
,`DOSEN_SESSION` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pertanyaan`
--
CREATE TABLE IF NOT EXISTS `view_pertanyaan` (
`pertanyaan_id` int(11)
,`pertanyaan_string` text
,`pertanyaan_pil_a` text
,`pertanyaan_pil_b` text
,`pertanyaan_pil_c` text
,`pertanyaan_pil_d` text
,`pertanyaan_pil_e` text
,`pertanyaan_kunci` enum('A','B','C','D','E')
,`soal_id` int(11)
,`soal_judul` varchar(100)
,`soal_jenis` enum('UH','UTS','UAS')
,`soal_password` varchar(100)
,`soal_status` enum('Aktif','Tidak Aktif')
,`distribusi_id` int(11)
,`matakuliah_kode` varchar(4)
,`matakuliah_string` varchar(100)
,`PRODI_ID` varchar(2)
,`PRODI_STRING` varchar(50)
,`ruang_id` int(11)
,`ruang_string` varchar(1)
,`KAMPUS_KODE` varchar(4)
,`KAMPUS_STRING` varchar(50)
,`KAMPUS_ALAMAT` text
,`SEMESTER_ID` int(11)
,`SEMESTER_STRING` varchar(3)
,`SEMESTER_HITUNGAN` enum('Ganjil','Genap')
,`SEMESTER_STATUS` enum('Aktif','Tidak Aktif')
,`TAHUNAKADEMIK_ID` int(11)
,`TAHUNAKADEMIK_STRING` varchar(9)
,`TAHUNAKADEMIK_STATUS` enum('Aktif','Tidak Aktif','Belum Aktif')
,`DOSEN_KODE` varchar(10)
,`DOSEN_NAMA` varchar(50)
,`DOSEN_PASSWORD` varchar(32)
,`DOSEN_GAMBAR` varchar(100)
,`DOSEN_SESSION` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_ruang`
--
CREATE TABLE IF NOT EXISTS `view_ruang` (
`ruang_id` int(11)
,`ruang_string` varchar(1)
,`KAMPUS_KODE` varchar(4)
,`KAMPUS_STRING` varchar(50)
,`KAMPUS_ALAMAT` text
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_soal`
--
CREATE TABLE IF NOT EXISTS `view_soal` (
`soal_id` int(11)
,`soal_judul` varchar(100)
,`soal_jenis` enum('UH','UTS','UAS')
,`soal_password` varchar(100)
,`soal_status` enum('Aktif','Tidak Aktif')
,`distribusi_id` int(11)
,`matakuliah_kode` varchar(4)
,`matakuliah_string` varchar(100)
,`PRODI_ID` varchar(2)
,`PRODI_STRING` varchar(50)
,`ruang_id` int(11)
,`ruang_string` varchar(1)
,`KAMPUS_KODE` varchar(4)
,`KAMPUS_STRING` varchar(50)
,`KAMPUS_ALAMAT` text
,`SEMESTER_ID` int(11)
,`SEMESTER_STRING` varchar(3)
,`SEMESTER_HITUNGAN` enum('Ganjil','Genap')
,`SEMESTER_STATUS` enum('Aktif','Tidak Aktif')
,`TAHUNAKADEMIK_ID` int(11)
,`TAHUNAKADEMIK_STRING` varchar(9)
,`TAHUNAKADEMIK_STATUS` enum('Aktif','Tidak Aktif','Belum Aktif')
,`DOSEN_KODE` varchar(10)
,`DOSEN_NAMA` varchar(50)
,`DOSEN_PASSWORD` varchar(32)
,`DOSEN_GAMBAR` varchar(100)
,`DOSEN_SESSION` varchar(100)
);
-- --------------------------------------------------------

--
-- Structure for view `view_distribusi`
--
DROP TABLE IF EXISTS `view_distribusi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_distribusi` AS (select `distribusi`.`DISTRIBUSI_ID` AS `distribusi_id`,`view_matakuliah`.`matakuliah_kode` AS `matakuliah_kode`,`view_matakuliah`.`matakuliah_string` AS `matakuliah_string`,`view_matakuliah`.`PRODI_ID` AS `PRODI_ID`,`view_matakuliah`.`PRODI_STRING` AS `PRODI_STRING`,`view_ruang`.`ruang_id` AS `ruang_id`,`view_ruang`.`ruang_string` AS `ruang_string`,`view_ruang`.`KAMPUS_KODE` AS `KAMPUS_KODE`,`view_ruang`.`KAMPUS_STRING` AS `KAMPUS_STRING`,`view_ruang`.`KAMPUS_ALAMAT` AS `KAMPUS_ALAMAT`,`semester`.`SEMESTER_ID` AS `SEMESTER_ID`,`semester`.`SEMESTER_STRING` AS `SEMESTER_STRING`,`semester`.`SEMESTER_HITUNGAN` AS `SEMESTER_HITUNGAN`,`semester`.`SEMESTER_STATUS` AS `SEMESTER_STATUS`,`tahunakademik`.`TAHUNAKADEMIK_ID` AS `TAHUNAKADEMIK_ID`,`tahunakademik`.`TAHUNAKADEMIK_STRING` AS `TAHUNAKADEMIK_STRING`,`tahunakademik`.`TAHUNAKADEMIK_STATUS` AS `TAHUNAKADEMIK_STATUS`,`dosen`.`DOSEN_KODE` AS `DOSEN_KODE`,`dosen`.`DOSEN_NAMA` AS `DOSEN_NAMA`,`dosen`.`DOSEN_PASSWORD` AS `DOSEN_PASSWORD`,`dosen`.`DOSEN_GAMBAR` AS `DOSEN_GAMBAR`,`dosen`.`DOSEN_SESSION` AS `DOSEN_SESSION` from (((((`distribusi` join `view_matakuliah` on((`distribusi`.`MATAKULIAH_KODE` = `view_matakuliah`.`matakuliah_kode`))) join `view_ruang` on((`distribusi`.`RUANG_ID` = `view_ruang`.`ruang_id`))) join `semester` on((`distribusi`.`SEMESTER_ID` = `semester`.`SEMESTER_ID`))) join `tahunakademik` on((`distribusi`.`TAHUNAKADEMIK_ID` = `tahunakademik`.`TAHUNAKADEMIK_ID`))) join `dosen` on((`distribusi`.`DOSEN_KODE` = `dosen`.`DOSEN_KODE`))));

-- --------------------------------------------------------

--
-- Structure for view `view_komentar`
--
DROP TABLE IF EXISTS `view_komentar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_komentar` AS (select `view_mahasiswa`.`ruang_id` AS `ruang_id`,`view_mahasiswa`.`ruang_string` AS `ruang_string`,`view_mahasiswa`.`KAMPUS_KODE` AS `KAMPUS_KODE`,`view_mahasiswa`.`KAMPUS_STRING` AS `KAMPUS_STRING`,`view_mahasiswa`.`KAMPUS_ALAMAT` AS `KAMPUS_ALAMAT`,`view_mahasiswa`.`mahasiswa_npm` AS `mahasiswa_npm`,`view_mahasiswa`.`mahasiswa_nama` AS `mahasiswa_nama`,`view_mahasiswa`.`mahasiswa_gambar` AS `mahasiswa_gambar`,`view_mahasiswa`.`mahasiswa_password` AS `mahasiswa_password`,`view_mahasiswa`.`mahasiswa_session` AS `mahasiswa_session`,`dosen`.`DOSEN_KODE` AS `DOSEN_KODE`,`dosen`.`DOSEN_NAMA` AS `DOSEN_NAMA`,`dosen`.`DOSEN_PASSWORD` AS `DOSEN_PASSWORD`,`dosen`.`DOSEN_GAMBAR` AS `DOSEN_GAMBAR`,`dosen`.`DOSEN_SESSION` AS `DOSEN_SESSION`,`komentar`.`komentar_id` AS `komentar_id`,`komentar`.`komentar_isi` AS `komentar_isi`,`komentar`.`komentar_tgl_kirim` AS `komentar_tgl_kirim`,`komentar`.`komentar_poster_m` AS `komentar_poster_m`,`komentar`.`komentar_poster_d` AS `komentar_poster_d`,`komentar`.`topik_id` AS `topik_id` from ((`komentar` left join `view_mahasiswa` on((`komentar`.`komentar_poster_m` = `view_mahasiswa`.`mahasiswa_npm`))) left join `dosen` on((`komentar`.`komentar_poster_d` = `dosen`.`DOSEN_KODE`))));

-- --------------------------------------------------------

--
-- Structure for view `view_list_topik`
--
DROP TABLE IF EXISTS `view_list_topik`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_list_topik` AS (select `view_distribusi`.`distribusi_id` AS `distribusi_id`,`view_distribusi`.`matakuliah_kode` AS `matakuliah_kode`,`view_distribusi`.`matakuliah_string` AS `matakuliah_string`,`view_distribusi`.`PRODI_ID` AS `PRODI_ID`,`view_distribusi`.`PRODI_STRING` AS `PRODI_STRING`,`view_distribusi`.`ruang_id` AS `ruang_id`,`view_distribusi`.`ruang_string` AS `ruang_string`,`view_distribusi`.`KAMPUS_KODE` AS `KAMPUS_KODE`,`view_distribusi`.`KAMPUS_STRING` AS `KAMPUS_STRING`,`view_distribusi`.`KAMPUS_ALAMAT` AS `KAMPUS_ALAMAT`,`view_distribusi`.`SEMESTER_ID` AS `SEMESTER_ID`,`view_distribusi`.`SEMESTER_STRING` AS `SEMESTER_STRING`,`view_distribusi`.`SEMESTER_HITUNGAN` AS `SEMESTER_HITUNGAN`,`view_distribusi`.`SEMESTER_STATUS` AS `SEMESTER_STATUS`,`view_distribusi`.`TAHUNAKADEMIK_ID` AS `TAHUNAKADEMIK_ID`,`view_distribusi`.`TAHUNAKADEMIK_STRING` AS `TAHUNAKADEMIK_STRING`,`view_distribusi`.`TAHUNAKADEMIK_STATUS` AS `TAHUNAKADEMIK_STATUS`,`view_distribusi`.`DOSEN_KODE` AS `DOSEN_KODE`,`view_distribusi`.`DOSEN_NAMA` AS `DOSEN_NAMA`,`view_distribusi`.`DOSEN_PASSWORD` AS `DOSEN_PASSWORD`,`view_distribusi`.`DOSEN_GAMBAR` AS `DOSEN_GAMBAR`,`view_distribusi`.`DOSEN_SESSION` AS `DOSEN_SESSION`,`topik`.`topik_update` AS `topik_update`,`topik`.`topik_id` AS `topik_id`,`topik`.`topik_judul` AS `topik_judul`,`topik`.`topik_isi` AS `topik_isi`,`topik`.`topik_tgl_kirim` AS `topik_tgl_kirim`,`topik`.`topik_lampiran` AS `topik_lampiran` from (`topik` join `view_distribusi` on((`topik`.`distribusi_id` = `view_distribusi`.`distribusi_id`))));

-- --------------------------------------------------------

--
-- Structure for view `view_mahasiswa`
--
DROP TABLE IF EXISTS `view_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_mahasiswa` AS (select `view_ruang`.`ruang_id` AS `ruang_id`,`view_ruang`.`ruang_string` AS `ruang_string`,`view_ruang`.`KAMPUS_KODE` AS `KAMPUS_KODE`,`view_ruang`.`KAMPUS_STRING` AS `KAMPUS_STRING`,`view_ruang`.`KAMPUS_ALAMAT` AS `KAMPUS_ALAMAT`,`mahasiswa`.`MAHASISWA_NPM` AS `mahasiswa_npm`,`mahasiswa`.`MAHASISWA_NAMA` AS `mahasiswa_nama`,`mahasiswa`.`MAHASISWA_GAMBAR` AS `mahasiswa_gambar`,`mahasiswa`.`MAHASISWA_PASSWORD` AS `mahasiswa_password`,`mahasiswa`.`MAHASISWA_SESSION` AS `mahasiswa_session` from (`mahasiswa` left join `view_ruang` on((`mahasiswa`.`RUANG_ID` = `view_ruang`.`ruang_id`))));

-- --------------------------------------------------------

--
-- Structure for view `view_matakuliah`
--
DROP TABLE IF EXISTS `view_matakuliah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_matakuliah` AS (select `matakuliah`.`MATAKULIAH_KODE` AS `matakuliah_kode`,`matakuliah`.`MATAKULIAH_STRING` AS `matakuliah_string`,`prodi`.`PRODI_ID` AS `PRODI_ID`,`prodi`.`PRODI_STRING` AS `PRODI_STRING` from (`matakuliah` left join `prodi` on((`matakuliah`.`PRODI_ID` = `prodi`.`PRODI_ID`))));

-- --------------------------------------------------------

--
-- Structure for view `view_nilai`
--
DROP TABLE IF EXISTS `view_nilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_nilai` AS (select `nilai`.`nilai_id` AS `nilai_id`,`nilai`.`nilai_benar` AS `nilai_benar`,`nilai`.`nilai_salah` AS `nilai_salah`,`nilai`.`nilai_persentase` AS `nilai_persentase`,`nilai`.`nilai_kosong` AS `nilai_kosong`,`mahasiswa`.`MAHASISWA_NPM` AS `mahasiswa_npm`,`mahasiswa`.`MAHASISWA_NAMA` AS `mahasiswa_nama`,`mahasiswa`.`MAHASISWA_GAMBAR` AS `mahasiswa_gambar`,`view_soal`.`soal_id` AS `soal_id`,`view_soal`.`soal_judul` AS `soal_judul`,`view_soal`.`soal_jenis` AS `soal_jenis`,`view_soal`.`soal_password` AS `soal_password`,`view_soal`.`soal_status` AS `soal_status`,`view_soal`.`distribusi_id` AS `distribusi_id`,`view_soal`.`matakuliah_kode` AS `matakuliah_kode`,`view_soal`.`matakuliah_string` AS `matakuliah_string`,`view_soal`.`PRODI_ID` AS `PRODI_ID`,`view_soal`.`PRODI_STRING` AS `PRODI_STRING`,`view_soal`.`ruang_id` AS `ruang_id`,`view_soal`.`ruang_string` AS `ruang_string`,`view_soal`.`KAMPUS_KODE` AS `KAMPUS_KODE`,`view_soal`.`KAMPUS_STRING` AS `KAMPUS_STRING`,`view_soal`.`KAMPUS_ALAMAT` AS `KAMPUS_ALAMAT`,`view_soal`.`SEMESTER_ID` AS `SEMESTER_ID`,`view_soal`.`SEMESTER_STRING` AS `SEMESTER_STRING`,`view_soal`.`SEMESTER_HITUNGAN` AS `SEMESTER_HITUNGAN`,`view_soal`.`SEMESTER_STATUS` AS `SEMESTER_STATUS`,`view_soal`.`TAHUNAKADEMIK_ID` AS `TAHUNAKADEMIK_ID`,`view_soal`.`TAHUNAKADEMIK_STRING` AS `TAHUNAKADEMIK_STRING`,`view_soal`.`TAHUNAKADEMIK_STATUS` AS `TAHUNAKADEMIK_STATUS`,`view_soal`.`DOSEN_KODE` AS `DOSEN_KODE`,`view_soal`.`DOSEN_NAMA` AS `DOSEN_NAMA`,`view_soal`.`DOSEN_PASSWORD` AS `DOSEN_PASSWORD`,`view_soal`.`DOSEN_GAMBAR` AS `DOSEN_GAMBAR`,`view_soal`.`DOSEN_SESSION` AS `DOSEN_SESSION` from ((`nilai` left join `mahasiswa` on((`nilai`.`mahasiswa_npm` = `mahasiswa`.`MAHASISWA_NPM`))) left join `view_soal` on((`nilai`.`soal_id` = `view_soal`.`soal_id`))));

-- --------------------------------------------------------

--
-- Structure for view `view_pertanyaan`
--
DROP TABLE IF EXISTS `view_pertanyaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pertanyaan` AS (select `pertanyaan`.`pertanyaan_id` AS `pertanyaan_id`,`pertanyaan`.`pertanyaan_string` AS `pertanyaan_string`,`pertanyaan`.`pertanyaan_pil_a` AS `pertanyaan_pil_a`,`pertanyaan`.`pertanyaan_pil_b` AS `pertanyaan_pil_b`,`pertanyaan`.`pertanyaan_pil_c` AS `pertanyaan_pil_c`,`pertanyaan`.`pertanyaan_pil_d` AS `pertanyaan_pil_d`,`pertanyaan`.`pertanyaan_pil_e` AS `pertanyaan_pil_e`,`pertanyaan`.`pertanyaan_kunci` AS `pertanyaan_kunci`,`view_soal`.`soal_id` AS `soal_id`,`view_soal`.`soal_judul` AS `soal_judul`,`view_soal`.`soal_jenis` AS `soal_jenis`,`view_soal`.`soal_password` AS `soal_password`,`view_soal`.`soal_status` AS `soal_status`,`view_soal`.`distribusi_id` AS `distribusi_id`,`view_soal`.`matakuliah_kode` AS `matakuliah_kode`,`view_soal`.`matakuliah_string` AS `matakuliah_string`,`view_soal`.`PRODI_ID` AS `PRODI_ID`,`view_soal`.`PRODI_STRING` AS `PRODI_STRING`,`view_soal`.`ruang_id` AS `ruang_id`,`view_soal`.`ruang_string` AS `ruang_string`,`view_soal`.`KAMPUS_KODE` AS `KAMPUS_KODE`,`view_soal`.`KAMPUS_STRING` AS `KAMPUS_STRING`,`view_soal`.`KAMPUS_ALAMAT` AS `KAMPUS_ALAMAT`,`view_soal`.`SEMESTER_ID` AS `SEMESTER_ID`,`view_soal`.`SEMESTER_STRING` AS `SEMESTER_STRING`,`view_soal`.`SEMESTER_HITUNGAN` AS `SEMESTER_HITUNGAN`,`view_soal`.`SEMESTER_STATUS` AS `SEMESTER_STATUS`,`view_soal`.`TAHUNAKADEMIK_ID` AS `TAHUNAKADEMIK_ID`,`view_soal`.`TAHUNAKADEMIK_STRING` AS `TAHUNAKADEMIK_STRING`,`view_soal`.`TAHUNAKADEMIK_STATUS` AS `TAHUNAKADEMIK_STATUS`,`view_soal`.`DOSEN_KODE` AS `DOSEN_KODE`,`view_soal`.`DOSEN_NAMA` AS `DOSEN_NAMA`,`view_soal`.`DOSEN_PASSWORD` AS `DOSEN_PASSWORD`,`view_soal`.`DOSEN_GAMBAR` AS `DOSEN_GAMBAR`,`view_soal`.`DOSEN_SESSION` AS `DOSEN_SESSION` from (`pertanyaan` left join `view_soal` on((`pertanyaan`.`soal_id` = `view_soal`.`soal_id`))));

-- --------------------------------------------------------

--
-- Structure for view `view_ruang`
--
DROP TABLE IF EXISTS `view_ruang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_ruang` AS (select `ruang`.`RUANG_ID` AS `ruang_id`,`ruang`.`RUANG_STRING` AS `ruang_string`,`kampus`.`KAMPUS_KODE` AS `KAMPUS_KODE`,`kampus`.`KAMPUS_STRING` AS `KAMPUS_STRING`,`kampus`.`KAMPUS_ALAMAT` AS `KAMPUS_ALAMAT` from (`ruang` left join `kampus` on((`ruang`.`KAMPUS_KODE` = `kampus`.`KAMPUS_KODE`))));

-- --------------------------------------------------------

--
-- Structure for view `view_soal`
--
DROP TABLE IF EXISTS `view_soal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_soal` AS (select `soal`.`soal_id` AS `soal_id`,`soal`.`soal_judul` AS `soal_judul`,`soal`.`soal_jenis` AS `soal_jenis`,`soal`.`soal_password` AS `soal_password`,`soal`.`soal_status` AS `soal_status`,`view_distribusi`.`distribusi_id` AS `distribusi_id`,`view_distribusi`.`matakuliah_kode` AS `matakuliah_kode`,`view_distribusi`.`matakuliah_string` AS `matakuliah_string`,`view_distribusi`.`PRODI_ID` AS `PRODI_ID`,`view_distribusi`.`PRODI_STRING` AS `PRODI_STRING`,`view_distribusi`.`ruang_id` AS `ruang_id`,`view_distribusi`.`ruang_string` AS `ruang_string`,`view_distribusi`.`KAMPUS_KODE` AS `KAMPUS_KODE`,`view_distribusi`.`KAMPUS_STRING` AS `KAMPUS_STRING`,`view_distribusi`.`KAMPUS_ALAMAT` AS `KAMPUS_ALAMAT`,`view_distribusi`.`SEMESTER_ID` AS `SEMESTER_ID`,`view_distribusi`.`SEMESTER_STRING` AS `SEMESTER_STRING`,`view_distribusi`.`SEMESTER_HITUNGAN` AS `SEMESTER_HITUNGAN`,`view_distribusi`.`SEMESTER_STATUS` AS `SEMESTER_STATUS`,`view_distribusi`.`TAHUNAKADEMIK_ID` AS `TAHUNAKADEMIK_ID`,`view_distribusi`.`TAHUNAKADEMIK_STRING` AS `TAHUNAKADEMIK_STRING`,`view_distribusi`.`TAHUNAKADEMIK_STATUS` AS `TAHUNAKADEMIK_STATUS`,`view_distribusi`.`DOSEN_KODE` AS `DOSEN_KODE`,`view_distribusi`.`DOSEN_NAMA` AS `DOSEN_NAMA`,`view_distribusi`.`DOSEN_PASSWORD` AS `DOSEN_PASSWORD`,`view_distribusi`.`DOSEN_GAMBAR` AS `DOSEN_GAMBAR`,`view_distribusi`.`DOSEN_SESSION` AS `DOSEN_SESSION` from (`soal` left join `view_distribusi` on((`soal`.`distribusi_id` = `view_distribusi`.`distribusi_id`))));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
 ADD PRIMARY KEY (`administrator_id`);

--
-- Indexes for table `distribusi`
--
ALTER TABLE `distribusi`
 ADD PRIMARY KEY (`MATAKULIAH_KODE`,`DOSEN_KODE`,`DISTRIBUSI_ID`), ADD KEY `FK_BERTEMPAT` (`RUANG_ID`), ADD KEY `FK_MEMILIKIS` (`SEMESTER_ID`), ADD KEY `FK_MEMILIKIT` (`TAHUNAKADEMIK_ID`), ADD KEY `FK_MENGAJAR` (`DOSEN_KODE`), ADD KEY `DISTRIBUSI_ID` (`DISTRIBUSI_ID`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
 ADD PRIMARY KEY (`DOSEN_KODE`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
 ADD PRIMARY KEY (`jawaban_id`), ADD KEY `pertanyaan_id` (`pertanyaan_id`), ADD KEY `mahasiswa_npm` (`mahasiswa_npm`);

--
-- Indexes for table `kampus`
--
ALTER TABLE `kampus`
 ADD PRIMARY KEY (`KAMPUS_KODE`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`komentar_id`), ADD KEY `topik_id` (`topik_id`), ADD KEY `komentar_poster_d` (`komentar_poster_d`), ADD KEY `komentar_poster_m` (`komentar_poster_m`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
 ADD PRIMARY KEY (`MAHASISWA_NPM`), ADD KEY `FK_BELAJAR_DI` (`RUANG_ID`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
 ADD PRIMARY KEY (`MATAKULIAH_KODE`), ADD KEY `FK_MEMBAWAHI` (`PRODI_ID`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
 ADD PRIMARY KEY (`nilai_id`), ADD KEY `soal_id` (`soal_id`), ADD KEY `mahasiswa_npm` (`mahasiswa_npm`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
 ADD PRIMARY KEY (`pertanyaan_id`), ADD KEY `soal_id` (`soal_id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
 ADD PRIMARY KEY (`PESAN_ID`), ADD KEY `FK_MENGIRIM_DAN_MENERIMA` (`MAHASISWA_NPM`), ADD KEY `DOSEN_KODE` (`DOSEN_KODE`), ADD KEY `MAHASISWA_NPM` (`MAHASISWA_NPM`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
 ADD PRIMARY KEY (`PRODI_ID`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
 ADD PRIMARY KEY (`RUANG_ID`), ADD KEY `FK_MENEMPATI` (`KAMPUS_KODE`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
 ADD PRIMARY KEY (`SEMESTER_ID`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
 ADD PRIMARY KEY (`soal_id`), ADD KEY `distribusi_id` (`distribusi_id`);

--
-- Indexes for table `tahunakademik`
--
ALTER TABLE `tahunakademik`
 ADD PRIMARY KEY (`TAHUNAKADEMIK_ID`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
 ADD PRIMARY KEY (`topik_id`), ADD KEY `distribusi_id` (`distribusi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
MODIFY `administrator_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `distribusi`
--
ALTER TABLE `distribusi`
MODIFY `DISTRIBUSI_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
MODIFY `jawaban_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
MODIFY `pertanyaan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
MODIFY `PESAN_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
MODIFY `RUANG_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
MODIFY `soal_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
MODIFY `topik_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `distribusi`
--
ALTER TABLE `distribusi`
ADD CONSTRAINT `distribusi_ibfk_1` FOREIGN KEY (`MATAKULIAH_KODE`) REFERENCES `matakuliah` (`MATAKULIAH_KODE`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `distribusi_ibfk_2` FOREIGN KEY (`DOSEN_KODE`) REFERENCES `dosen` (`DOSEN_KODE`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `distribusi_ibfk_3` FOREIGN KEY (`RUANG_ID`) REFERENCES `ruang` (`RUANG_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `distribusi_ibfk_4` FOREIGN KEY (`SEMESTER_ID`) REFERENCES `semester` (`SEMESTER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `distribusi_ibfk_5` FOREIGN KEY (`TAHUNAKADEMIK_ID`) REFERENCES `tahunakademik` (`TAHUNAKADEMIK_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaan` (`pertanyaan_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `jawaban_ibfk_2` FOREIGN KEY (`mahasiswa_npm`) REFERENCES `mahasiswa` (`MAHASISWA_NPM`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`topik_id`) REFERENCES `topik` (`topik_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`komentar_poster_d`) REFERENCES `dosen` (`DOSEN_KODE`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `komentar_ibfk_3` FOREIGN KEY (`komentar_poster_m`) REFERENCES `mahasiswa` (`MAHASISWA_NPM`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`RUANG_ID`) REFERENCES `ruang` (`RUANG_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `matakuliah`
--
ALTER TABLE `matakuliah`
ADD CONSTRAINT `matakuliah_ibfk_1` FOREIGN KEY (`PRODI_ID`) REFERENCES `prodi` (`PRODI_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
ADD CONSTRAINT `nilai_ibfk_8` FOREIGN KEY (`mahasiswa_npm`) REFERENCES `mahasiswa` (`MAHASISWA_NPM`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `nilai_ibfk_9` FOREIGN KEY (`soal_id`) REFERENCES `soal` (`soal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
ADD CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`soal_id`) REFERENCES `soal` (`soal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`DOSEN_KODE`) REFERENCES `dosen` (`DOSEN_KODE`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`MAHASISWA_NPM`) REFERENCES `mahasiswa` (`MAHASISWA_NPM`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `ruang`
--
ALTER TABLE `ruang`
ADD CONSTRAINT `ruang_ibfk_1` FOREIGN KEY (`KAMPUS_KODE`) REFERENCES `kampus` (`KAMPUS_KODE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`distribusi_id`) REFERENCES `distribusi` (`DISTRIBUSI_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topik`
--
ALTER TABLE `topik`
ADD CONSTRAINT `topik_ibfk_2` FOREIGN KEY (`distribusi_id`) REFERENCES `distribusi` (`DISTRIBUSI_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
