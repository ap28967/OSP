-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 03:23 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gamifikasi`
--

CREATE TABLE `gamifikasi` (
  `username` varchar(20) NOT NULL,
  `npk` int(7) NOT NULL,
  `kehadiran` int(5) DEFAULT NULL,
  `jamabsen` int(5) DEFAULT NULL,
  `senam` int(5) DEFAULT NULL,
  `meeting` int(5) DEFAULT NULL,
  `overtime` int(5) DEFAULT NULL,
  `buatss` int(5) DEFAULT NULL,
  `buatsslebih` int(5) DEFAULT NULL,
  `sslevelup` int(5) DEFAULT NULL,
  `bestss` int(5) DEFAULT NULL,
  `aktifqcc` int(5) DEFAULT NULL,
  `icareday` int(5) DEFAULT NULL,
  `hyarihatto` int(5) DEFAULT NULL,
  `partisipasievent` int(5) DEFAULT NULL,
  `juaraevent` int(5) DEFAULT NULL,
  `partisipasikonvensi` int(5) DEFAULT NULL,
  `juarakonvensi` int(5) DEFAULT NULL,
  `totalpoin` int(10) DEFAULT NULL,
  `rank` int(10) DEFAULT NULL,
  `periode` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gamifikasi`
--

INSERT INTO `gamifikasi` (`username`, `npk`, `kehadiran`, `jamabsen`, `senam`, `meeting`, `overtime`, `buatss`, `buatsslebih`, `sslevelup`, `bestss`, `aktifqcc`, `icareday`, `hyarihatto`, `partisipasievent`, `juaraevent`, `partisipasikonvensi`, `juarakonvensi`, `totalpoin`, `rank`, `periode`) VALUES
('body28967', 28967, 150, 140, 80, 70, 160, 100, 50, 50, 100, 80, 50, 100, 80, 150, 80, 150, 1500, 2, 'Maret 2022');

-- --------------------------------------------------------

--
-- Table structure for table `hyarihatto`
--

CREATE TABLE `hyarihatto` (
  `id` varchar(45) NOT NULL,
  `npk` int(8) NOT NULL,
  `kategori` varchar(40) NOT NULL,
  `risk` varchar(40) NOT NULL,
  `stop6` varchar(40) NOT NULL,
  `icare` varchar(40) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `temuan` text NOT NULL,
  `penyebab` text NOT NULL,
  `saran` text NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `tglinput` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hyarihatto`
--

INSERT INTO `hyarihatto` (`id`, `npk`, `kategori`, `risk`, `stop6`, `icare`, `tanggal`, `lokasi`, `temuan`, `penyebab`, `saran`, `nama_file`, `tglinput`) VALUES
('202112_28967', 28967, 'Unsafe Condition', 'High', 'Electric', 'Accountability', '2021-12-08', 'asasdasfsf', 'hrherhrH', 'AEHRREAH', 'aaaa', '202201_28967.png', '2021-12-29 04:02:15'),
('202201_28967', 28967, 'Unsafe Condition', 'High', 'Electric', 'Accountability', '2022-01-01', 'asasdasfsf', 'hrherhrH', 'AEHRREAH', 'aaaa', '202201_28967.png', '2022-01-18 04:02:15'),
('202202_28967', 28967, 'Unsafe Condition', 'High', 'Electric', 'Accountability', '2022-02-01', 'asasdasfsf', 'hrherhrH', 'AEHRREAH', 'aaaa', '202205_28967.png', '2022-02-15 02:12:35'),
('202203_28967', 28967, 'Unsafe Condition', 'High', 'Electric', 'Accountability', '2022-03-08', 'asasdasfsf', 'hrherhrH', 'AEHRREAH', 'aaaa', '202205_28967.png', '2022-03-29 02:12:35'),
('202204_28967', 28967, 'Unsafe Condition', 'high', 'Aparatus', 'Integrity', '2022-04-05', 'gdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreggdsagreg', 'greagergaegreg', 'aegrregega', 'eageagrgreagr', '202204_28967.png', '2022-04-19 07:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `hyarihatto_icare`
--

CREATE TABLE `hyarihatto_icare` (
  `id` int(1) NOT NULL,
  `icare` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hyarihatto_icare`
--

INSERT INTO `hyarihatto_icare` (`id`, `icare`) VALUES
(1, 'Integrity'),
(2, 'Commitment'),
(3, 'Accountability'),
(4, 'Respect'),
(5, 'Excellent Innovation');

-- --------------------------------------------------------

--
-- Table structure for table `hyarihatto_kategori`
--

CREATE TABLE `hyarihatto_kategori` (
  `id` int(2) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hyarihatto_kategori`
--

INSERT INTO `hyarihatto_kategori` (`id`, `kategori`) VALUES
(1, 'Unsafe Condition'),
(2, 'Unsafe Action'),
(3, 'Near Miss');

-- --------------------------------------------------------

--
-- Table structure for table `hyarihatto_risk`
--

CREATE TABLE `hyarihatto_risk` (
  `id` int(2) NOT NULL,
  `risk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hyarihatto_risk`
--

INSERT INTO `hyarihatto_risk` (`id`, `risk`) VALUES
(1, 'High'),
(2, 'Medium'),
(3, 'Low');

-- --------------------------------------------------------

--
-- Table structure for table `hyarihatto_stop6`
--

CREATE TABLE `hyarihatto_stop6` (
  `id` int(2) NOT NULL,
  `stop6` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hyarihatto_stop6`
--

INSERT INTO `hyarihatto_stop6` (`id`, `stop6`) VALUES
(1, 'Aparatus'),
(2, 'Big Heavy'),
(3, 'Car'),
(4, 'Drop'),
(5, 'Electric'),
(6, 'Fire');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gamifikasi`
--
ALTER TABLE `gamifikasi`
  ADD PRIMARY KEY (`npk`);

--
-- Indexes for table `hyarihatto`
--
ALTER TABLE `hyarihatto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hyarihatto_icare`
--
ALTER TABLE `hyarihatto_icare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hyarihatto_kategori`
--
ALTER TABLE `hyarihatto_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hyarihatto_risk`
--
ALTER TABLE `hyarihatto_risk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hyarihatto_stop6`
--
ALTER TABLE `hyarihatto_stop6`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
