-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2016 at 08:42 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siukm`
--

-- --------------------------------------------------------

--
-- Table structure for table `adart`
--

CREATE TABLE `adart` (
  `idadart` int(11) NOT NULL,
  `idukm` int(11) NOT NULL,
  `AD` int(11) NOT NULL,
  `ART` int(11) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adart`
--

INSERT INTO `adart` (`idadart`, `idukm`, `AD`, `ART`, `tahun`) VALUES
(1, 1, 1001, 10000, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `anggarandana`
--

CREATE TABLE `anggarandana` (
  `idanggaran` int(11) NOT NULL,
  `idukm` int(11) NOT NULL,
  `namakegiatan` varchar(500) NOT NULL,
  `anggarandanakegiatan` varchar(500) NOT NULL,
  `mime` varchar(10) NOT NULL,
  `validasi_BEM` tinyint(4) NOT NULL,
  `validasi_PD3` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggarandana`
--

INSERT INTO `anggarandana` (`idanggaran`, `idukm`, `namakegiatan`, `anggarandanakegiatan`, `mime`, `validasi_BEM`, `validasi_PD3`) VALUES
(3, 1, 'yuhu', 'php2256.tmp', 'docx', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `anggotaukm`
--

CREATE TABLE `anggotaukm` (
  `idAnggota` int(11) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `nama` text NOT NULL,
  `tempatlahir` varchar(25) NOT NULL,
  `tanggallahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notlp` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `divisi` text NOT NULL,
  `idukm` int(11) NOT NULL,
  `pass` varchar(8) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggotaukm`
--

INSERT INTO `anggotaukm` (`idAnggota`, `nim`, `nama`, `tempatlahir`, `tanggallahir`, `alamat`, `notlp`, `email`, `divisi`, `idukm`, `pass`, `password`) VALUES
(1, '333333', 'sads', 'adwada', '2016-06-06', 'eqwddadawwd', 21312321, 'dsad@gmail.com', 'asdsa', 1, '12', '$2y$10$VMhTeO43XJxGrMcnOyIteO0ASNPfI858B9a38gcu3m7e1os9oGP4C');

-- --------------------------------------------------------

--
-- Table structure for table `jadwalkegiatan`
--

CREATE TABLE `jadwalkegiatan` (
  `idjadwal` int(11) NOT NULL,
  `idkegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `idkegiatan` int(11) NOT NULL,
  `idukm` int(11) NOT NULL,
  `namakegiatan` varchar(500) NOT NULL,
  `tglkegiatan` date NOT NULL,
  `deskripsikegiatan` text NOT NULL,
  `anggarandanakegiatan` int(11) NOT NULL,
  `panitia` text NOT NULL,
  `tempat` varchar(10000) NOT NULL,
  `softfile` longblob NOT NULL,
  `volume` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `validasi_BEM` tinyint(4) NOT NULL,
  `validasi_PD3` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lpj`
--

CREATE TABLE `lpj` (
  `idlpj` int(11) NOT NULL,
  `idukm` int(11) NOT NULL,
  `idkegiatan` int(11) NOT NULL,
  `softfile` longblob NOT NULL,
  `gambar` longblob NOT NULL,
  `validasi_BEM` tinyint(4) NOT NULL,
  `validasi_PD3` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `idpengurus` int(11) NOT NULL,
  `idAnggota` int(11) NOT NULL,
  `jabatan` text NOT NULL,
  `periodepelantikan` year(4) NOT NULL,
  `periodeakhir` year(4) NOT NULL,
  `idukm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`idpengurus`, `idAnggota`, `jabatan`, `periodepelantikan`, `periodeakhir`, `idukm`) VALUES
(3, 1, 'Ketua', 2016, 2017, 1);

-- --------------------------------------------------------

--
-- Table structure for table `spj`
--

CREATE TABLE `spj` (
  `idspj` int(11) NOT NULL,
  `idukm` int(11) NOT NULL,
  `idkegiatan` int(11) NOT NULL,
  `nota` longblob NOT NULL,
  `validasi_BEM` tinyint(4) NOT NULL,
  `validasi_PD3` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suratkerjasama`
--

CREATE TABLE `suratkerjasama` (
  `idkerjasama` int(11) NOT NULL,
  `nosurat` varchar(100) NOT NULL,
  `hal` text NOT NULL,
  `namakegiatan` text NOT NULL,
  `waktu` date NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `idukm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suratpeminjaman`
--

CREATE TABLE `suratpeminjaman` (
  `idpeminjaman` int(11) NOT NULL,
  `nosurat` varchar(100) NOT NULL,
  `hal` text NOT NULL,
  `namakegiatan` text NOT NULL,
  `waktu` date NOT NULL,
  `idukm` int(11) NOT NULL,
  `tujuansurat` varchar(200) NOT NULL,
  `tempat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suratperijinan`
--

CREATE TABLE `suratperijinan` (
  `idperijinan` int(11) NOT NULL,
  `nosurat` varchar(100) NOT NULL,
  `hal` text NOT NULL,
  `namakegiatan` text NOT NULL,
  `waktu` date NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `idukm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suratundangan`
--

CREATE TABLE `suratundangan` (
  `idundangan` int(11) NOT NULL,
  `nosurat` varchar(100) NOT NULL,
  `hal` text NOT NULL,
  `namakegiatan` text NOT NULL,
  `waktu` date NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `idukm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE `ukm` (
  `idukm` int(11) NOT NULL,
  `namaukm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`idukm`, `namaukm`) VALUES
(1, 'UKM O MACO'),
(2, 'UKM ETALASE'),
(3, 'UKM LAOS'),
(4, 'UKM BINARY'),
(5, 'UKM MAPALA BALWANA'),
(6, 'HIMASIF');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `password` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `idukm` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `remember_token`, `created_at`, `updated_at`, `password`, `idukm`) VALUES
(1, 'KETUA PSSI', 'ketua', 'SHOpH6cKAHHGxKmCU8KwSYQt0JJH9dyjNh46baBRlbZH1uNY3sYkTgZ0ojLr', '0000-00-00 00:00:00', '2016-06-21 22:54:50', '$2y$10$0P0ZXG4tYvwcF5b0lIqntuq1HfLH54r6nWIB7lH/9e1oAliBe1MKq', NULL),
(2, 'PD III', 'pd3', '40IqcEit5QrU8UQ6K5A4BJh6exLEW8qFFr8YPPbc1JCO7qy3l4YOyeW9W2zl', '0000-00-00 00:00:00', '2016-06-22 11:39:40', '$2y$10$ERqQV3UPHfhi0O7qfctgjuA8zULRQMu4kjtmZd8Zse9qInCu1cYi.', NULL),
(3, 'KEMAHASISWAAN', 'siswa', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$2y$10$tf4RyKSf6zhumviZWXL9HeJ4LaOumFJFpWu63xu134kul3QAw9J1O', NULL),
(4, 'BEM', 'bem', '9hu8zx2x7MwgHo3hJoRaGEVWctS24eUmfmjVLmUYadPsQUV7lEWRG0ptsSTb', '0000-00-00 00:00:00', '2016-06-22 11:37:13', '$2y$10$Sspzou9KogoF.VhP8G5vxObCZEVmzfMvThZe1xxJ10EjxjJuAT63e', NULL),
(5, 'UKM MACO', 'maco', '7ZT7VEZiOTAn87AY0iv4LdUaRn4THuAt0zXvN5QLXoeDOJ1xluoFVx0zjm7T', '0000-00-00 00:00:00', '2016-06-22 11:21:33', '$2y$10$KKvRJBmBF0YcrTn7PCjnpuJA3sqcQ1NFciqflACwqAqAMjL2Lv.pC', 1),
(6, 'UKM LAOS', 'laos', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$2y$10$xkWB8Kvhoyffo4t.cNhs5uIYct0iQE3D8G04poOo6h32jcd/r40/a', 3),
(7, 'UKM ETALASE', 'etalase', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$2y$10$ql0jQ9MljrV9OgWWRPKEu.ntV3Pe7oonzVLkfECu9odu6qwdncgVS', 2),
(8, 'UKM BALWANA', 'balwana', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$2y$10$4hVCx65YSXGszQw508ydmOeaHp7zRFm2M9KIMRyuCT6Hvq7evaYjq', 5),
(9, 'UKM BINARY', 'binary', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$2y$10$PggRxepltcJGbvSRB4ib5OEDEh6TIy7.VTFLX3.5XIRQ2hL41alCO', 4),
(10, 'HIMASIF', 'himasif', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '$2y$10$7ruHPimMTp7s43ZFtPOxMuNcWu.rLcjnOvfP6qX/33Skqi3okl0dG', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adart`
--
ALTER TABLE `adart`
  ADD PRIMARY KEY (`idadart`),
  ADD KEY `idukm` (`idukm`);

--
-- Indexes for table `anggarandana`
--
ALTER TABLE `anggarandana`
  ADD PRIMARY KEY (`idanggaran`),
  ADD KEY `idukm` (`idukm`);

--
-- Indexes for table `anggotaukm`
--
ALTER TABLE `anggotaukm`
  ADD PRIMARY KEY (`idAnggota`),
  ADD KEY `idukm` (`idukm`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `jadwalkegiatan`
--
ALTER TABLE `jadwalkegiatan`
  ADD PRIMARY KEY (`idjadwal`),
  ADD KEY `idkegiatan` (`idkegiatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`idkegiatan`),
  ADD KEY `idukm` (`idukm`);

--
-- Indexes for table `lpj`
--
ALTER TABLE `lpj`
  ADD PRIMARY KEY (`idlpj`),
  ADD KEY `idukm` (`idukm`),
  ADD KEY `idkegiatan` (`idkegiatan`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`idpengurus`),
  ADD KEY `idukm` (`idukm`);

--
-- Indexes for table `spj`
--
ALTER TABLE `spj`
  ADD PRIMARY KEY (`idspj`),
  ADD KEY `idukm` (`idukm`),
  ADD KEY `idkegiatan` (`idkegiatan`);

--
-- Indexes for table `suratkerjasama`
--
ALTER TABLE `suratkerjasama`
  ADD PRIMARY KEY (`idkerjasama`),
  ADD KEY `idukm` (`idukm`),
  ADD KEY `idukm_2` (`idukm`);

--
-- Indexes for table `suratpeminjaman`
--
ALTER TABLE `suratpeminjaman`
  ADD PRIMARY KEY (`idpeminjaman`),
  ADD KEY `idukm` (`idukm`),
  ADD KEY `idukm_2` (`idukm`);

--
-- Indexes for table `suratperijinan`
--
ALTER TABLE `suratperijinan`
  ADD PRIMARY KEY (`idperijinan`),
  ADD KEY `idukm` (`idukm`);

--
-- Indexes for table `suratundangan`
--
ALTER TABLE `suratundangan`
  ADD PRIMARY KEY (`idundangan`),
  ADD KEY `idukm` (`idukm`);

--
-- Indexes for table `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`idukm`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adart`
--
ALTER TABLE `adart`
  MODIFY `idadart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `anggarandana`
--
ALTER TABLE `anggarandana`
  MODIFY `idanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `anggotaukm`
--
ALTER TABLE `anggotaukm`
  MODIFY `idAnggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `idpengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `adart`
--
ALTER TABLE `adart`
  ADD CONSTRAINT `adart_ibfk_1` FOREIGN KEY (`idukm`) REFERENCES `ukm` (`idukm`);

--
-- Constraints for table `anggarandana`
--
ALTER TABLE `anggarandana`
  ADD CONSTRAINT `anggarandana_ibfk_1` FOREIGN KEY (`idukm`) REFERENCES `ukm` (`idukm`);

--
-- Constraints for table `anggotaukm`
--
ALTER TABLE `anggotaukm`
  ADD CONSTRAINT `anggotaukm_ibfk_1` FOREIGN KEY (`idukm`) REFERENCES `ukm` (`idukm`);

--
-- Constraints for table `jadwalkegiatan`
--
ALTER TABLE `jadwalkegiatan`
  ADD CONSTRAINT `jadwalkegiatan_ibfk_1` FOREIGN KEY (`idkegiatan`) REFERENCES `kegiatan` (`idkegiatan`);

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`idukm`) REFERENCES `ukm` (`idukm`);

--
-- Constraints for table `lpj`
--
ALTER TABLE `lpj`
  ADD CONSTRAINT `lpj_ibfk_1` FOREIGN KEY (`idukm`) REFERENCES `ukm` (`idukm`);

--
-- Constraints for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `pengurus_ibfk_1` FOREIGN KEY (`idukm`) REFERENCES `ukm` (`idukm`);

--
-- Constraints for table `spj`
--
ALTER TABLE `spj`
  ADD CONSTRAINT `spj_ibfk_1` FOREIGN KEY (`idukm`) REFERENCES `ukm` (`idukm`);

--
-- Constraints for table `suratkerjasama`
--
ALTER TABLE `suratkerjasama`
  ADD CONSTRAINT `suratkerjasama_ibfk_1` FOREIGN KEY (`idukm`) REFERENCES `ukm` (`idukm`);

--
-- Constraints for table `suratpeminjaman`
--
ALTER TABLE `suratpeminjaman`
  ADD CONSTRAINT `suratpeminjaman_ibfk_1` FOREIGN KEY (`idukm`) REFERENCES `ukm` (`idukm`);

--
-- Constraints for table `suratperijinan`
--
ALTER TABLE `suratperijinan`
  ADD CONSTRAINT `suratperijinan_ibfk_1` FOREIGN KEY (`idukm`) REFERENCES `ukm` (`idukm`);

--
-- Constraints for table `suratundangan`
--
ALTER TABLE `suratundangan`
  ADD CONSTRAINT `suratundangan_ibfk_1` FOREIGN KEY (`idukm`) REFERENCES `ukm` (`idukm`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
