-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 08:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_peralatan`
--

CREATE TABLE `detail_peralatan` (
  `id_det_alat` int(11) NOT NULL,
  `id_olahraga` int(11) DEFAULT NULL,
  `id_alat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_peralatan`
--

INSERT INTO `detail_peralatan` (`id_det_alat`, `id_olahraga`, `id_alat`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 1),
(5, 5, 1),
(6, 6, 2),
(7, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `instruktur`
--

CREATE TABLE `instruktur` (
  `id_instruktur` int(11) NOT NULL,
  `nama_instruktur` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instruktur`
--

INSERT INTO `instruktur` (`id_instruktur`, `nama_instruktur`) VALUES
(1, 'Pdt. Richard Lois'),
(2, 'Hj. Haniif Ahmad'),
(3, 'Richardo Chandra');

-- --------------------------------------------------------

--
-- Table structure for table `kesulitan`
--

CREATE TABLE `kesulitan` (
  `id_kesulitan` int(11) NOT NULL,
  `tingkat_kesulitan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kesulitan`
--

INSERT INTO `kesulitan` (`id_kesulitan`, `tingkat_kesulitan`) VALUES
(1, 'Beginner'),
(2, 'Intermediate'),
(3, 'Advance');

-- --------------------------------------------------------

--
-- Table structure for table `olahraga`
--

CREATE TABLE `olahraga` (
  `id_olahraga` int(11) NOT NULL,
  `nama_olahraga` varchar(30) DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `video` varchar(100) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `id_kesulitan` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `step` text DEFAULT NULL,
  `id_instruktur` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `olahraga`
--

INSERT INTO `olahraga` (`id_olahraga`, `nama_olahraga`, `durasi`, `deskripsi`, `video`, `id_tipe`, `id_kesulitan`, `image`, `step`, `id_instruktur`) VALUES
(1, 'Donkey Kick', 10, 'Donkey kicks adalah gerakan yang sangat mudah yang menargetkan tempat di mana bokong dan hamstring kamu bertemu dan membantu kamu mengencangkan otot-otot bokong. Yang lebih menarik adalah bahwa latihan ini juga membantu mengencangkan perut dan memperkuat tulang belakang kamu.', 'https://www.youtube.com/embed/SJ1Xuz9D-ZQ', 1, 2, 'donkey-kick.png', '1. Berbaring telentang dengan menekuk lutut dan kaki lurus berbentuk 90 derajat.\n2. Letakkan tangan pada bagian belakang kepala dan jangan mengunci jari-jari tangan Anda atau mendorong kepala ke atas.\n3. Dorong punggung Anda ke lantai untuk melibatkan otot perut.\n4. Geser dagu sedikit sehingga meninggalkan sedikit ruang antara dagu dan dada.\n5. Mulai angkat bahu Anda sekitar 10 cm dari lantai dan tetap menyimpan punggung bagian bawah pada permukaan lantai lantai.\n6. Tahan sejenak posisi tubuh saat berada di atas lalu perlahan-lahan kembali ke bawah.', 1),
(2, 'Plank', 5, 'Plank membantu Anda untuk membangun kekuatan pada inti, atas dan bawah tubuh. Selain itu, manfaat plank lainnya juga bisa meningkatkan fleksibilitas dengan meregangkan otot, sambil memperbaiki keseimbangan dan postur tubuh.\r\n', 'https://www.youtube.com/embed/B296mZDhrP4', 2, 2, 'plank.png', '1. Mulailah dengan posisi menekankan lengan, bukan telapak tangan, pada lantai sehingga berat badan bertumpu di kedua lengan Anda.\n2. Tekuk jari-jari kaki Anda sebagai tumpuan. Pastikan tubuh harus membentuk garis lurus dari bagian bahu hingga pergelangan kaki.\n3. Tahan dan kencangkanan otot perut Anda sambil terus bernapas dengan normal.\n4. Lakukan posisi ini selama 30 detik atau sesuai kemampuan Anda.', 3),
(3, 'Squat', 15, 'Squat yaitu latihan yang baik untuk melatih tubuh bagian bawah dan otot inti tubuh. Jika Anda melakukan latihan ini secara teratur, maka gerakan ini bisa bermanfaat dalam mengencangkan otot paha dan bokong, serta meningkatkan sirkulasi pencernaan.', 'https://www.youtube.com/embed/xqvCmoLULNY', 2, 2, 'squat.png', '1. Berdiri tegak dengan kedua kaki terbuka selebar pinggul.\n2. Turunkan tubuh sejauh yang Anda bisa, sambil mendorong bagian pinggul ke belakang. Ingat, jangan malah mendorong lutut ke depan.\n3. Luruskan kedua lengan Anda ke depan untuk menjaga keseimbangan. Squat juga bisa Anda lakukan dengan menggenggam kedua tangan di depan dada.\n4. Tubuh bagian bawah, terutama paha bagian atas harus sejajar dengan permukaan. \n5. Posisikan dada harus membusung, namun tidak membungkuk.\n6. Angkat kembali tubuh Anda kembali ke posisi semula, lalu lakukan gerakan ini berulang-ulang.', 2),
(4, 'Crunch', 15, 'Abdominal crunch adalah latihan yang baik untuk membangun otot perut yang kuat. Jika Anda melakukan gerakan ini dengan benar dan teratur, crunch juga bisa membantu untuk memberantas lemak perut dan meningkatkan keseimbangan tubuh.', 'https://www.youtube.com/embed/_YVhhXc2pSY', 1, 3, 'abdominal-crunch.png', '1. Berbaring telentang dengan menekuk lutut dan kaki lurus berbentuk 90 derajat.\n2. Letakkan tangan pada bagian belakang kepala dan jangan mengunci jari-jari tangan Anda atau mendorong kepala ke atas.\n3. Dorong punggung Anda ke lantai untuk melibatkan otot perut.\n4. Geser dagu sedikit sehingga meninggalkan sedikit ruang antara dagu dan dada.\n5. Mulai angkat bahu Anda sekitar 10 cm dari lantai dan tetap menyimpan punggung bagian bawah pada permukaan lantai lantai.\n6. Tahan sejenak posisi tubuh saat berada di atas lalu perlahan-lahan kembali ke bawah.', 1),
(5, 'Push Up', 15, 'Latihan push up memiliki manfaat untuk mengencangkan otot lengan, dada, trisep, dan bagian depan bahu Anda\r\n', 'https://www.youtube.com/embed/_l3ySVKYVJ8', 1, 2, 'push-up.png', '1. Mulai dengan posisi tengkurap di lantai dengan tangan sedikit lebih lebar, namun tetap segaris dengan bahu. Pastikan juga menjaga jarak kaki agar selalu berdekatan.\n2. Angkat tubuh dengan lengan dan biarkan berat badan ditopang oleh tangan dan pangkal jari kaki. Jika belum terbiasa, Anda juga bisa menggunakan lutut sebagai tumpuan.\n3. Tahan perut sekencang mungkin dan pastikan kondisi tubuh membentuk garis lurus dari bagian bahu hingga pergelangan kaki.\n4. Turunkan tubuh Anda secara perlahan hingga dada hampir menyentuh lantai. Pastikan siku terselip di dekat batang tubuh.\n5. Berhenti sejenak lalu dorong kembali dengan kedua telapak tangan untuk kembali ke posisi awal. Lakukan gerakan ini selama 30 detik sesuai kemampuan tubuh Anda.', 3),
(6, 'Jumping Jack', 10, 'Jumping jacks atau star jump baik untuk melatih kardiovaskular dan kekuatan tubuh. Gerakan mengayunkan tangan ke atas kepala dan merentangkan kaki ini bisa meningkatkan detak jantung dan merangsang aliran darah ke seluruh tubuh.', 'https://www.youtube.com/embed/1b98WrRrmUs', 1, 1, 'jumping-jack.png', '1. Berdiri tegak lurus dengan kaki menempel dan rapatkan tangan ke bawah pada sisi kanan dan kiri tubuh Anda.\n2. Kemudian lompatkan kaki Anda ke samping kanan dan kiri hingga kaki terbuka lebar. 3. Secara bersamaan, angkat tangan Anda ke atas kepala seperti bertepuk tangan.\n4. Segera kembali lagi ke posisi semula saat mendarat dan lakukan berulang-ulang.', 2),
(19, 'Joget Rickroll', 20, 'joget ini melatih ketangkasan dan meningkatkan kesehatan jasmani dan rohani. joget ini melatih ketangkasan dan meningkatkan kesehatan jasmani dan rohani.joget ini melatih ketangkasan dan meningkatkan kesehatan jasmani dan rohani', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 3, 3, 'Joget Rickroll.jpg', '1. berdiri\r\n2. pakai sepatu mu\r\n3. joget lah sesukamu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `id_peralatan` int(11) NOT NULL,
  `nama_peralatan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peralatan`
--

INSERT INTO `peralatan` (`id_peralatan`, `nama_peralatan`) VALUES
(1, 'Matras'),
(2, 'Dumbbell');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_olahraga`
--

CREATE TABLE `tipe_olahraga` (
  `id_tipe` int(11) NOT NULL,
  `tipe_olahraga` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_olahraga`
--

INSERT INTO `tipe_olahraga` (`id_tipe`, `tipe_olahraga`) VALUES
(1, 'HIIT'),
(2, 'YOGA'),
(3, 'CARDIO');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_peralatan`
--
ALTER TABLE `detail_peralatan`
  ADD PRIMARY KEY (`id_det_alat`),
  ADD KEY `fk_olg_alat` (`id_olahraga`),
  ADD KEY `fk_alat` (`id_alat`);

--
-- Indexes for table `instruktur`
--
ALTER TABLE `instruktur`
  ADD PRIMARY KEY (`id_instruktur`);

--
-- Indexes for table `kesulitan`
--
ALTER TABLE `kesulitan`
  ADD PRIMARY KEY (`id_kesulitan`);

--
-- Indexes for table `olahraga`
--
ALTER TABLE `olahraga`
  ADD PRIMARY KEY (`id_olahraga`),
  ADD KEY `fk_tipe` (`id_tipe`),
  ADD KEY `fk_kesulitan` (`id_kesulitan`),
  ADD KEY `fk_instruktur` (`id_instruktur`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id_peralatan`);

--
-- Indexes for table `tipe_olahraga`
--
ALTER TABLE `tipe_olahraga`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_peralatan`
--
ALTER TABLE `detail_peralatan`
  MODIFY `id_det_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `instruktur`
--
ALTER TABLE `instruktur`
  MODIFY `id_instruktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kesulitan`
--
ALTER TABLE `kesulitan`
  MODIFY `id_kesulitan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `olahraga`
--
ALTER TABLE `olahraga`
  MODIFY `id_olahraga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id_peralatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipe_olahraga`
--
ALTER TABLE `tipe_olahraga`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_peralatan`
--
ALTER TABLE `detail_peralatan`
  ADD CONSTRAINT `fk_alat` FOREIGN KEY (`id_alat`) REFERENCES `peralatan` (`id_peralatan`),
  ADD CONSTRAINT `fk_olg_alat` FOREIGN KEY (`id_olahraga`) REFERENCES `olahraga` (`id_olahraga`);

--
-- Constraints for table `olahraga`
--
ALTER TABLE `olahraga`
  ADD CONSTRAINT `fk_instruktur` FOREIGN KEY (`id_instruktur`) REFERENCES `instruktur` (`id_instruktur`),
  ADD CONSTRAINT `fk_kesulitan` FOREIGN KEY (`id_kesulitan`) REFERENCES `kesulitan` (`id_kesulitan`),
  ADD CONSTRAINT `fk_tipe` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_olahraga` (`id_tipe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
