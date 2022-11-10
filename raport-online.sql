-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jun 2019 pada 07.25
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raport-online`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `guru` ()  begin
select * from guru;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `kelas` ()  begin
select * from kelas;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mapel` ()  begin
select * from mapel order by kd_mapel asc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orang_tua` ()  begin
SELECT no_induk, nama_siswa, nama_ayah, nama_ibu, nama_wali, no_hp_ortu, orang_tua.id_ortu FROM siswa, orang_tua where orang_tua.id_ortu=siswa.id_ortu;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pengumuman` ()  begin
select * from pengumuman order by id_pengumuman desc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `santri` (`kelas` INT)  begin
SELECT * FROM siswa join guru on siswa.id_guru=guru.id_guru join orang_tua on siswa.id_ortu=orang_tua.id_ortu join kelas on kelas.id_kelas=siswa.id_kelas where siswa.id_kelas = kelas;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `santri2` ()  begin
SELECT * FROM siswa join guru on siswa.id_guru=guru.id_guru join orang_tua on siswa.id_ortu=orang_tua.id_ortu join kelas on kelas.id_kelas=siswa.id_kelas;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user` ()  begin
select * from user;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `ID_ABSEN` int(11) NOT NULL,
  `NO_INDUK` varchar(10) DEFAULT NULL,
  `SUBUH` varchar(5) DEFAULT NULL,
  `MAGHRIB` varchar(5) DEFAULT NULL,
  `ISYAK` varchar(5) DEFAULT NULL,
  `TANGGAL` date NOT NULL,
  `SEMESTER` varchar(6) NOT NULL,
  `THN_AJARAN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`ID_ABSEN`, `NO_INDUK`, `SUBUH`, `MAGHRIB`, `ISYAK`, `TANGGAL`, `SEMESTER`, `THN_AJARAN`) VALUES
(1, 'E31171151', 'Hadir', 'Hadir', 'Hadir', '2019-01-03', 'ganjil', '2018/2019'),
(2, 'E31171233', 'Hadir', 'Hadir', 'Hadir', '2019-01-03', 'ganjil', '2018/2019'),
(3, 'E31171350', 'Hadir', 'Hadir', 'Hadir', '2019-01-03', 'ganjil', '2018/2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `ID_GURU` int(11) NOT NULL,
  `NAMA_GURU` varchar(40) DEFAULT NULL,
  `TGL_LAHIR_GURU` date DEFAULT NULL,
  `NO_HP_GURU` varchar(13) DEFAULT NULL,
  `EMAIL_GURU` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`ID_GURU`, `NAMA_GURU`, `TGL_LAHIR_GURU`, `NO_HP_GURU`, `EMAIL_GURU`) VALUES
(1, 'Saifudin', '1957-03-09', '0812345566778', 'saifudin@polije.ac.id'),
(2, 'Deny Setiawan', '1973-05-25', '081332334335', 'setiawan@polije.ac.id'),
(3, 'Rike Nurmala', '1978-11-08', '0822232242251', 'nurmala@polije.ac.id'),
(4, 'Vita Atmala', '1980-09-09', '081234234234', 'atmala@polije.ac.id'),
(5, 'Budi Santoso', '1977-12-19', '0873577878735', 'santoso@polije.ac.id'),
(6, 'Supardi', '1986-07-16', NULL, 'supardi@gmail.com'),
(7, 'Supardi', '1986-07-16', NULL, 'supardi@gmail.com'),
(8, 'Supardi', '1986-07-16', NULL, 'supardi@gmail.com'),
(9, '', '0000-00-00', '79869', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `ID_KELAS` int(11) NOT NULL,
  `NAMA_KELAS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`ID_KELAS`, `NAMA_KELAS`) VALUES
(1, 'Bacaan'),
(2, 'Lambatan'),
(3, 'Cepatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `KD_MAPEL` varchar(10) NOT NULL,
  `MAPEL` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`KD_MAPEL`, `MAPEL`) VALUES
('M01', 'Surat Al-Baqarah'),
('M02', 'Bahasa Inggris'),
('M03', 'Bahasa Arab'),
('M04', 'Surat Al-Mulks'),
('M05', 'Thaharah'),
('M06', 'Tajwid'),
('M07', 'Adab Pencari Ilmu'),
('M08', 'Qira\'ah Al-Qur\'an'),
('M09', 'Hafalan Surat Pendek'),
('M10', 'Hafalan Do\'a'),
('M11', 'Manasik Haji'),
('M12', 'Tafsir Surat'),
('M13', 'Taaruf '),
('M14', 'Pernikahan'),
('M15', 'Adab Suami Istri'),
('M16', 'Sejarah Islam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `ID_NILAI` int(11) NOT NULL,
  `ID_GURU` int(11) DEFAULT NULL,
  `NO_INDUK` varchar(10) DEFAULT NULL,
  `KD_MAPEL` varchar(10) DEFAULT NULL,
  `NILAI` varchar(5) DEFAULT NULL,
  `SEMESTER` varchar(6) NOT NULL,
  `THN_AJAR` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`ID_NILAI`, `ID_GURU`, `NO_INDUK`, `KD_MAPEL`, `NILAI`, `SEMESTER`, `THN_AJAR`) VALUES
(1, 1, 'E31171098', 'M01', '90', 'ganjil', '2018/2019'),
(2, 1, 'E31171313', 'M01', '50', 'ganjil', '2018/2019'),
(3, 2, 'E31171098', 'M02', '88', 'ganjil', '2018/2019'),
(4, 2, 'E31171313', 'M02', '60', 'ganjil', '2018/2019'),
(5, 3, 'E31171098', 'M03', '78', 'ganjil', '2018/2019'),
(6, 3, 'E31171313', 'M03', '70', 'ganjil', '2018/2019'),
(7, 4, 'E31171098', 'M04', '91', 'ganjil', '2018/2019'),
(8, 4, 'E31171313', 'M04', '52', 'ganjil', '2018/2019'),
(9, 5, 'E31171098', 'M05', '85', 'ganjil', '2018/2019'),
(10, 5, 'E31171313', 'M05', '90', 'ganjil', '2018/2019'),
(11, 1, 'E31171061', 'M06', '90', 'ganjil', '2018/2019'),
(12, 1, 'E31171108', 'M06', '78', 'ganjil', '2018/2019'),
(13, 2, 'E31171061', 'M07', '85', 'ganjil', '2018/2019'),
(14, 2, 'E31171108', 'M07', '76', 'ganjil', '2018/2019'),
(15, 3, 'E31171061', 'M08', '88', 'ganjil', '2018/2019'),
(16, 3, 'E31171108', 'M08', '76', 'ganjil', '2018/2019'),
(17, 4, 'E31171061', 'M09', '79', 'ganjil', '2018/2019'),
(18, 4, 'E31171108', 'M09', '85', 'ganjil', '2018/2019'),
(19, 5, 'E31171061', 'M10', '83', 'ganjil', '2018/2019'),
(20, 5, 'E31171108', 'M10', '90', 'ganjil', '2018/2019'),
(21, 1, 'E31171151', 'M11', '90', 'ganjil', '2018/2019'),
(22, 1, 'E31171233', 'M11', '85', 'ganjil', '2018/2019'),
(23, 1, 'E31171350', 'M11', '88', 'ganjil', '2018/2019'),
(24, 2, 'E31171151', 'M12', '92', 'ganjil', '2018/2019'),
(25, 2, 'E31171233', 'M12', '88', 'ganjil', '2018/2019'),
(26, 2, 'E31171350', 'M12', '90', 'ganjil', '2018/2019'),
(27, 3, 'E31171151', 'M13', '90', 'ganjil', '2018/2019'),
(28, 3, 'E31171233', 'M13', '87', 'ganjil', '2018/2019'),
(29, 3, 'E31171350', 'M13', '75', 'ganjil', '2018/2019'),
(30, 4, 'E31171151', 'M14', '100', 'ganjil', '2018/2019'),
(31, 4, 'E31171233', 'M14', '76', 'ganjil', '2018/2019'),
(32, 4, 'E31171350', 'M14', '89', 'ganjil', '2018/2019'),
(33, 5, 'E31171151', 'M15', '95', 'ganjil', '2018/2019'),
(34, 5, 'E31171233', 'M15', '90', 'ganjil', '2018/2019'),
(35, 5, 'E31171350', 'M15', '94', 'ganjil', '2018/2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orang_tua`
--

CREATE TABLE `orang_tua` (
  `ID_ORTU` int(11) NOT NULL,
  `USER_ORTU` int(11) DEFAULT NULL,
  `NAMA_AYAH` varchar(30) DEFAULT NULL,
  `NAMA_IBU` varchar(30) DEFAULT NULL,
  `NAMA_WALI` varchar(30) DEFAULT NULL,
  `NO_HP_ORTU` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orang_tua`
--

INSERT INTO `orang_tua` (`ID_ORTU`, `USER_ORTU`, `NAMA_AYAH`, `NAMA_IBU`, `NAMA_WALI`, `NO_HP_ORTU`) VALUES
(1, 53, 'Bapak', 'Ibu', 'Ibu dan Bapak', '087857878735'),
(2, 72, 'ayah', 'bunda', 'ayahbunda', '087857878789'),
(3, 57, 'Bpk.Ogies Sadminto Pudji rahar', 'SIH.Endah Tjajaning,S.pd', 'suepan', '081332162122'),
(4, 59, 'bapak', 'emak', 'cacak', '0789234793834'),
(5, 61, 'papa', 'mama', 'papamama', '08123456789'),
(6, 63, 'dodit', 'adadeh', 'apayah', '09877366175'),
(7, 65, 'Tio', 'Umi', 'Mia', '0876543257'),
(8, 70, 'Saykoji', 'Asri Wira', 'Saykoji', '087898912121');

--
-- Trigger `orang_tua`
--
DELIMITER $$
CREATE TRIGGER `track_update_ortu` AFTER UPDATE ON `orang_tua` FOR EACH ROW begin
insert into track_ortu (id_ortu)
values (old.id_ortu);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `ID_PENGUMUMAN` int(11) NOT NULL,
  `JUDUL` varchar(100) DEFAULT NULL,
  `ISI` text,
  `TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`ID_PENGUMUMAN`, `JUDUL`, `ISI`, `TIME`) VALUES
(1, 'Pembayaran SPP', 'Dimohon untuk seluruh santri segera melakukan pelunasan SPP bulanan paling lambat tanggal 10', '2018-12-24 16:04:59'),
(2, 'asd', 'asa', NULL),
(3, 'Raport', 'Raport ONline', NULL),
(4, 'admin', 'admin', NULL),
(5, 'bisa', 'insert', NULL),
(6, 'newINS', 'insert', '2019-06-15 01:32:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `NO_INDUK` varchar(10) NOT NULL,
  `ID_KELAS` int(11) DEFAULT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `ID_GURU` int(11) DEFAULT NULL,
  `ID_ORTU` int(11) DEFAULT NULL,
  `NAMA_SISWA` varchar(30) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(15) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `JENIS_KELAMIN` varchar(10) DEFAULT NULL,
  `GOL_DARAH` varchar(5) DEFAULT NULL,
  `STATUS` varchar(7) NOT NULL,
  `ANGKATAN` varchar(10) NOT NULL,
  `ALAMAT` varchar(100) NOT NULL,
  `HP` varchar(13) DEFAULT NULL,
  `EMAIL` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`NO_INDUK`, `ID_KELAS`, `ID_USER`, `ID_GURU`, `ID_ORTU`, `NAMA_SISWA`, `TEMPAT_LAHIR`, `TANGGAL_LAHIR`, `JENIS_KELAMIN`, `GOL_DARAH`, `STATUS`, `ANGKATAN`, `ALAMAT`, `HP`, `EMAIL`) VALUES
('E31171061', 2, 52, 1, 1, 'Tengku Fahmi Syah Putra', 'Bondowoso', '1998-12-19', 'Laki-laki', 'AB', 'Aktif', '2017/2018', 'Besuki, Situbondo', '085258410987', 'tuapayers@gmail.com'),
('E31171098', 1, 64, 2, 7, 'Sinta P', 'Surabaya', '1997-05-04', 'Perempuan', 'AB', 'Aktif', '2017/2018', 'Surabaya', '089765432356', 'sinta@gmail.com'),
('E31171108', 2, 62, 5, 6, 'andi syaputra', 'jakarta', '1997-01-02', 'Laki-laki', 'A', 'Aktif', '2015/2016', 'baturaden,jakarta', '0898263674121', 'andi@gmail.com'),
('E31171151', 3, 58, 4, 4, 'sumiati', 'lumajang', '2019-06-05', 'Perempuan', 'AB', 'Aktif', '2018/2019', 'pasirian,lumajang', '0888631289233', 'umiakhisumyaty@gmail.com'),
('E31171233', 3, 60, 2, 5, 'Astiti Cahyaningtyas', 'Jember', '1998-06-25', 'Perempuan', 'B', 'Aktif', '2017/2018', 'Kaliwates Jember', '082233121847', 'astiti@gmail.com'),
('E31171313', 1, 133, 4, 3, 'Evan Hendra Lukito', 'Jombang ', '1999-04-23', 'Laki-laki', 'O', 'Aktif', '2018/2019', 'Peterongan,Jombang,jawa Timur', '081332162122', 'evanhendralukito@gmail.com'),
('E31171350', 3, 71, 2, 2, 'Salas Zainul Abdurrohman', 'Jombang', '1999-07-06', 'Laki-laki', 'AB', 'Aktif', '2017/2018', 'Gadingmangu,Perak, Jombang', '085258410999', 'salaszainul354@gmail.com'),
('E31212121', 2, 205, 1, 8, 'Deni Wardana', 'Jogjakarta', '1999-06-17', 'Laki-laki', 'B', 'Aktif', '2017/2018', 'Gg. Sayidan Jogjakarta', '082312123123', 'deniwar@gmail.com');

--
-- Trigger `siswa`
--
DELIMITER $$
CREATE TRIGGER `track_update_siswa` AFTER UPDATE ON `siswa` FOR EACH ROW begin
insert into track_siswa (no_induk)
values (old.no_induk);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `track_ortu`
--

CREATE TABLE `track_ortu` (
  `id_log` int(11) NOT NULL,
  `id_ortu` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `track_ortu`
--

INSERT INTO `track_ortu` (`id_log`, `id_ortu`, `time`) VALUES
(1, 10, '2019-01-07 23:49:22'),
(2, 1, '2019-01-08 07:32:51'),
(3, 2, '2019-01-08 07:36:27'),
(4, 3, '2019-01-08 07:42:05'),
(5, 4, '2019-01-08 07:46:46'),
(6, 5, '2019-01-08 07:49:53'),
(7, 6, '2019-01-08 07:53:31'),
(8, 7, '2019-01-08 07:56:21'),
(9, 8, '2019-06-15 13:22:11'),
(10, 2, '2019-06-15 13:23:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `track_pass`
--

CREATE TABLE `track_pass` (
  `id_track` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `old_pass` varchar(20) NOT NULL,
  `new_pass` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `track_pass`
--

INSERT INTO `track_pass` (`id_track`, `id_user`, `old_pass`, `new_pass`, `time`) VALUES
(2, 57, 'adaajakamubacot', 'adaajakamu', '2019-01-08 07:42:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `track_siswa`
--

CREATE TABLE `track_siswa` (
  `id_t` int(11) NOT NULL,
  `no_induk` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `track_siswa`
--

INSERT INTO `track_siswa` (`id_t`, `no_induk`, `time`) VALUES
(1, 'A15010', '2019-01-07 23:44:08'),
(2, 'E31171061', '2019-01-08 07:32:51'),
(3, 'E31171350', '2019-01-08 07:36:26'),
(4, 'E31171313', '2019-01-08 07:42:04'),
(5, 'E31171151', '2019-01-08 07:46:46'),
(6, 'E31171233', '2019-01-08 07:49:53'),
(7, 'E31171108', '2019-01-08 07:53:31'),
(8, 'E31171098', '2019-01-08 07:56:21'),
(9, 'E31212121', '2019-06-15 13:22:11'),
(10, 'E31171350', '2019-06-15 13:23:27'),
(11, 'E31212121', '2019-06-15 14:08:23'),
(12, 'E31212121', '2019-06-15 14:13:40'),
(13, 'E31212121', '2019-06-15 14:21:33'),
(14, 'E31212121', '2019-06-15 14:22:23'),
(15, 'E31212121', '2019-06-15 14:22:42'),
(16, 'E31212121', '2019-06-15 14:23:02'),
(17, 'E31212121', '2019-06-15 14:23:37'),
(18, 'E31212121', '2019-06-15 14:24:23'),
(19, 'E31212121', '2019-06-15 14:24:38'),
(20, 'E31212121', '2019-06-15 14:25:53'),
(21, 'E31212121', '2019-06-15 14:26:08'),
(22, 'E31212121', '2019-06-15 14:26:32'),
(23, 'E31212121', '2019-06-15 14:27:46'),
(24, 'E31212121', '2019-06-15 14:29:05'),
(25, 'E31212121', '2019-06-15 14:30:31'),
(26, 'E31212121', '2019-06-15 14:30:51'),
(27, 'E31212121', '2019-06-15 15:13:24'),
(28, 'E31212121', '2019-06-15 15:13:52'),
(29, 'E31212121', '2019-06-15 15:17:07'),
(30, 'E31212121', '2019-06-15 15:17:27'),
(32, 'E31212121', '2019-06-15 15:20:21'),
(33, 'E31212121', '2019-06-15 15:20:59'),
(34, 'E31212121', '2019-06-15 15:21:11'),
(35, 'E31212121', '2019-06-15 15:27:28'),
(36, 'E31171313', '2019-06-15 15:27:51'),
(37, 'E31212121', '2019-06-15 15:28:06'),
(38, 'E31212121', '2019-06-15 15:28:31'),
(39, 'E31212121', '2019-06-15 15:28:56'),
(40, 'E31212121', '2019-06-15 15:29:08'),
(41, 'E31212121', '2019-06-15 15:29:29'),
(42, 'E31212121', '2019-06-15 15:29:43'),
(43, 'E31212121', '2019-06-15 15:30:05'),
(44, 'E31212121', '2019-06-15 15:30:39'),
(45, 'E31212121', '2019-06-15 15:30:51'),
(46, 'E31212121', '2019-06-15 15:33:14'),
(47, 'E31212121', '2019-06-15 15:33:32'),
(48, 'E31212121', '2019-06-15 15:33:40'),
(49, 'E31212121', '2019-06-15 15:34:03'),
(50, 'E31212121', '2019-06-15 15:34:33'),
(51, 'E31212121', '2019-06-15 15:35:03'),
(52, 'E31212121', '2019-06-15 15:35:19'),
(53, 'E31212121', '2019-06-15 15:35:32'),
(54, 'E31212121', '2019-06-15 15:36:49'),
(55, 'E31212121', '2019-06-15 15:37:42'),
(56, 'E31212121', '2019-06-15 15:39:12'),
(57, 'E31212121', '2019-06-15 15:39:27'),
(58, 'E31212121', '2019-06-15 15:39:49'),
(59, 'E31212121', '2019-06-15 15:40:07'),
(60, 'E31212121', '2019-06-15 15:40:19'),
(61, 'E31212121', '2019-06-15 15:40:32'),
(62, 'E31212121', '2019-06-15 15:41:01'),
(63, 'E31212121', '2019-06-15 15:41:44'),
(64, 'E31212121', '2019-06-15 15:42:00'),
(65, 'E31212121', '2019-06-15 15:42:06'),
(66, 'E31212121', '2019-06-15 15:42:28'),
(67, 'E31212121', '2019-06-15 15:43:21'),
(68, 'E31212121', '2019-06-15 15:43:46'),
(69, 'E31212121', '2019-06-15 15:45:13'),
(70, 'E31212121', '2019-06-15 15:48:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `AKSES` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USER`, `USERNAME`, `PASSWORD`, `AKSES`) VALUES
(1, 'admin', 'admin', 'admin'),
(52, 'E31171061@siswa', 'fahmi', 'siswa'),
(53, 'E31171061@wali', 'punyaortu', 'ortu'),
(54, 'E31171350@siswa', 'salas', 'siswa'),
(55, 'E31171350@wali', 'ayahbunda', 'ortu'),
(56, 'E31171313@siswa', 'adaajakamu ', 'siswa'),
(57, 'E31171313@wali', 'adaajakamu', 'ortu'),
(58, 'E31171151@siswa', 'jalanidulu', 'siswa'),
(59, 'E31171151@wali', 'ya', 'ortu'),
(60, 'E31171233@siswa', 'astiti', 'siswa'),
(61, 'E31171233@wali', 'papamama', 'ortu'),
(62, 'E31171108@siswa', 'andi123', 'siswa'),
(63, 'E31171108@wali', 'dodit123', 'ortu'),
(64, 'E31171098@siswa', 'sinta', 'siswa'),
(65, 'E31171098@wali', 'adadeh', 'ortu'),
(66, 'data', 'baru', 'admin'),
(76, 'E31212121@wali', 'osas', 'ortu'),
(77, 'E31212121@siswa', 'asas', 'siswa'),
(78, 'E31212121@wali', 'osas', 'ortu'),
(79, 'E31212121@siswa', 'asas', 'siswa'),
(80, 'E31212121@wali', 'osas', 'ortu'),
(81, 'E31212121@siswa', 'asas', 'siswa'),
(82, 'E31212121@wali', 'osas', 'ortu'),
(83, 'E31212121@siswa', 'asas', 'siswa'),
(84, 'E31212121@wali', 'osas', 'ortu'),
(85, 'E31212121@siswa', 'asas', 'siswa'),
(86, 'E31212121@wali', 'osas', 'ortu'),
(87, 'E31212121@siswa', 'asas', 'siswa'),
(88, 'E31212121@wali', 'osas', 'ortu'),
(89, 'E31212121@siswa', 'asas', 'siswa'),
(90, 'E31212121@wali', 'osas', 'ortu'),
(91, 'E31212121@siswa', 'asas', 'siswa'),
(92, 'E31212121@wali', 'osas', 'ortu'),
(93, 'E31212121@siswa', 'asas', 'siswa'),
(94, 'E31212121@wali', 'osas', 'ortu'),
(95, 'E31212121@siswa', 'asas', 'siswa'),
(96, 'E31212121@wali', 'osas', 'ortu'),
(97, 'E31212121@siswa', 'asas', 'siswa'),
(98, 'E31212121@wali', 'osas', 'ortu'),
(99, 'E31212121@siswa', 'asas', 'siswa'),
(100, 'E31212121@wali', 'osas', 'ortu'),
(101, 'E31212121@siswa', 'asas', 'siswa'),
(102, 'E31212121@wali', 'osas', 'ortu'),
(103, 'E31212121@siswa', 'asas', 'siswa'),
(104, 'E31212121@wali', 'osas', 'ortu'),
(105, 'E31212121@siswa', 'asas', 'siswa'),
(106, 'E31212121@wali', 'osas', 'ortu'),
(107, 'E31212121@siswa', 'asas', 'siswa'),
(108, 'E31212121@wali', 'osas', 'ortu'),
(109, 'E31212121@siswa', 'asas', 'siswa'),
(110, 'E31212121@wali', 'osas', 'ortu'),
(111, 'E31212121@siswa', 'asas', 'siswa'),
(112, 'E31212121@wali', 'osas', 'ortu'),
(113, 'E31212121@siswa', 'asas', 'siswa'),
(114, 'E31212121@wali', 'osas', 'ortu'),
(115, 'E31212121@siswa', 'asas', 'siswa'),
(116, 'E31212121@wali', 'osas', 'ortu'),
(117, 'E31212121@siswa', 'asas', 'siswa'),
(118, 'E31212121@wali', 'osas', 'ortu'),
(119, 'E31212121@siswa', 'asas', 'siswa'),
(120, 'E31212121@wali', 'osas', 'ortu'),
(121, 'E31212121@siswa', 'asas', 'siswa'),
(122, 'E31212121@wali', 'osas', 'ortu'),
(123, 'E31212121@siswa', 'asas', 'siswa'),
(124, 'E31212121@wali', 'osas', 'ortu'),
(125, 'E31212121@siswa', 'asas', 'siswa'),
(126, 'E31212121@wali', 'osas', 'ortu'),
(127, 'E31212121@siswa', 'asas', 'siswa'),
(128, 'E31212121@wali', 'osas', 'ortu'),
(129, 'E31212121@siswa', 'asas', 'siswa'),
(130, 'E31212121@wali', 'osas', 'ortu'),
(131, 'E31212121@siswa', 'asas', 'siswa'),
(132, 'E31212121@wali', 'osas', 'ortu'),
(133, 'E31171313@siswa', 'asas', 'siswa'),
(134, 'E31171313@wali', 'osas', 'ortu'),
(135, 'E31212121@siswa', 'asas', 'siswa'),
(136, 'E31212121@wali', 'osas', 'ortu'),
(137, 'E31212121@siswa', 'asas', 'siswa'),
(138, 'E31212121@wali', 'osas', 'ortu'),
(139, 'E31212121@siswa', 'asas', 'siswa'),
(140, 'E31212121@wali', 'osas', 'ortu'),
(141, 'E31212121@siswa', 'asas', 'siswa'),
(142, 'E31212121@wali', 'osas', 'ortu'),
(143, 'E31212121@siswa', 'asas', 'siswa'),
(144, 'E31212121@wali', 'osas', 'ortu'),
(145, 'E31212121@siswa', 'lmmk', 'siswa'),
(146, 'E31212121@wali', 'io0ioj', 'ortu'),
(147, 'E31212121@siswa', 'lmmk', 'siswa'),
(148, 'E31212121@wali', 'io0ioj', 'ortu'),
(149, 'E31212121@siswa', 'lmmk', 'siswa'),
(150, 'E31212121@wali', 'io0ioj', 'ortu'),
(151, 'E31212121@siswa', 'lmmk', 'siswa'),
(152, 'E31212121@wali', 'io0ioj', 'ortu'),
(153, 'E31212121@siswa', 'lmmk', 'siswa'),
(154, 'E31212121@wali', 'io0ioj', 'ortu'),
(155, 'E31212121@siswa', 'lmmk', 'siswa'),
(156, 'E31212121@wali', 'io0ioj', 'ortu'),
(157, 'E31212121@siswa', 'lmmk', 'siswa'),
(158, 'E31212121@wali', 'io0ioj', 'ortu'),
(159, 'E31212121@siswa', 'lmmk', 'siswa'),
(160, 'E31212121@wali', 'io0ioj', 'ortu'),
(161, 'E31212121@siswa', 'lmmk', 'siswa'),
(162, 'E31212121@wali', 'io0ioj', 'ortu'),
(163, 'E31212121@siswa', 'lmmk', 'siswa'),
(164, 'E31212121@wali', 'io0ioj', 'ortu'),
(165, 'E31212121@siswa', 'lmmk', 'siswa'),
(166, 'E31212121@wali', 'io0ioj', 'ortu'),
(167, 'E31212121@siswa', 'lmmk', 'siswa'),
(168, 'E31212121@wali', 'io0ioj', 'ortu'),
(169, 'E31212121@siswa', 'lmmk', 'siswa'),
(170, 'E31212121@wali', 'io0ioj', 'ortu'),
(171, 'E31212121@siswa', 'lmmk', 'siswa'),
(172, 'E31212121@wali', 'io0ioj', 'ortu'),
(173, 'E31212121@siswa', 'lmmk', 'siswa'),
(174, 'E31212121@wali', 'io0ioj', 'ortu'),
(175, 'E31212121@siswa', 'lmmk', 'siswa'),
(176, 'E31212121@wali', 'io0ioj', 'ortu'),
(177, 'E31212121@siswa', 'lmmk', 'siswa'),
(178, 'E31212121@wali', 'io0ioj', 'ortu'),
(179, 'E31212121@siswa', 'lmmk', 'siswa'),
(180, 'E31212121@wali', 'io0ioj', 'ortu'),
(181, 'E31212121@siswa', 'lmmk', 'siswa'),
(182, 'E31212121@wali', 'io0ioj', 'ortu'),
(183, 'E31212121@siswa', 'lmmk', 'siswa'),
(184, 'E31212121@wali', 'io0ioj', 'ortu'),
(185, 'E31212121@siswa', 'lmmk', 'siswa'),
(186, 'E31212121@wali', 'io0ioj', 'ortu'),
(187, 'E31212121@siswa', 'lmmk', 'siswa'),
(188, 'E31212121@wali', 'io0ioj', 'ortu'),
(189, 'E31212121@siswa', 'lmmk', 'siswa'),
(190, 'E31212121@wali', 'io0ioj', 'ortu'),
(191, 'E31212121@siswa', 'lmmk', 'siswa'),
(192, 'E31212121@wali', 'io0ioj', 'ortu'),
(193, 'E31212121@siswa', 'lmmk', 'siswa'),
(194, 'E31212121@wali', 'io0ioj', 'ortu'),
(195, 'E31212121@siswa', 'lmmk', 'siswa'),
(196, 'E31212121@wali', 'io0ioj', 'ortu'),
(197, 'E31212121@siswa', 'lmmk', 'siswa'),
(198, 'E31212121@wali', 'io0ioj', 'ortu'),
(199, 'E31212121@siswa', 'lmmk', 'siswa'),
(200, 'E31212121@wali', 'io0ioj', 'ortu'),
(201, 'E31212121@siswa', 'lmmk', 'siswa'),
(202, 'E31212121@wali', 'io0ioj', 'ortu'),
(203, 'E31212121@siswa', 'lmmk', 'siswa'),
(204, 'E31212121@wali', 'io0ioj', 'ortu'),
(205, 'E31212121@siswa', 'lmmk', 'siswa'),
(206, 'E31212121@wali', 'io0ioj', 'ortu');

--
-- Trigger `user`
--
DELIMITER $$
CREATE TRIGGER `track_pass` AFTER UPDATE ON `user` FOR EACH ROW begin
if old.password<>new.password then
insert into track_pass (id_user, old_pass, new_pass)
values (old.id_user, old.password, new.password);
end if;
end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`ID_ABSEN`),
  ADD KEY `NO_INDUK` (`NO_INDUK`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`ID_GURU`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`ID_KELAS`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`KD_MAPEL`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`ID_NILAI`),
  ADD KEY `FK_RELATIONSHIP_5` (`NO_INDUK`),
  ADD KEY `FK_RELATIONSHIP_3` (`KD_MAPEL`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_GURU`);

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`ID_ORTU`),
  ADD KEY `USER_ORTU` (`USER_ORTU`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`ID_PENGUMUMAN`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NO_INDUK`),
  ADD KEY `FK_RELATIONSHIP_11` (`ID_KELAS`),
  ADD KEY `FK_RELATIONSHIP_8` (`ID_ORTU`),
  ADD KEY `FK_RELATIONSHIP_10` (`ID_GURU`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `track_ortu`
--
ALTER TABLE `track_ortu`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_ortu` (`id_ortu`);

--
-- Indexes for table `track_pass`
--
ALTER TABLE `track_pass`
  ADD PRIMARY KEY (`id_track`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `track_siswa`
--
ALTER TABLE `track_siswa`
  ADD PRIMARY KEY (`id_t`),
  ADD KEY `no_induk` (`no_induk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `ID_ABSEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `ID_GURU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `ID_NILAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `ID_ORTU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `ID_PENGUMUMAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `track_ortu`
--
ALTER TABLE `track_ortu`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `track_pass`
--
ALTER TABLE `track_pass`
  MODIFY `id_track` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `track_siswa`
--
ALTER TABLE `track_siswa`
  MODIFY `id_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`NO_INDUK`) REFERENCES `siswa` (`NO_INDUK`);

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`KD_MAPEL`) REFERENCES `mapel` (`KD_MAPEL`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_GURU`) REFERENCES `guru` (`ID_GURU`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`NO_INDUK`) REFERENCES `siswa` (`NO_INDUK`);

--
-- Ketidakleluasaan untuk tabel `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD CONSTRAINT `orang_tua_ibfk_1` FOREIGN KEY (`USER_ORTU`) REFERENCES `user` (`ID_USER`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`ID_GURU`) REFERENCES `guru` (`ID_GURU`),
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`ID_KELAS`) REFERENCES `kelas` (`ID_KELAS`),
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_ORTU`) REFERENCES `orang_tua` (`ID_ORTU`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Ketidakleluasaan untuk tabel `track_pass`
--
ALTER TABLE `track_pass`
  ADD CONSTRAINT `track_pass_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID_USER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
