-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2025 at 08:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensigps`
--

-- --------------------------------------------------------

--
-- Table structure for table `jamsekolah`
--

CREATE TABLE `jamsekolah` (
  `id` int(10) UNSIGNED NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jamsekolah`
--

INSERT INTO `jamsekolah` (`id`, `jam_masuk`, `jam_pulang`) VALUES
(1, '07:30:00', '15:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` char(255) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
('TKJ', 'Teknik Komputer dan Jaringan'),
('TKJ 1', 'Teknik Komputer dan Jaringan 1'),
('TKJ 2', 'Teknik Komputer dan Jaringan 2');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi_lokasi`
--

CREATE TABLE `konfigurasi_lokasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `lokasi_sekolah` varchar(255) NOT NULL,
  `radius` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konfigurasi_lokasi`
--

INSERT INTO `konfigurasi_lokasi` (`id`, `lokasi_sekolah`, `radius`) VALUES
(1, '-5.707728594878937, 105.58962202650785', 100);

-- --------------------------------------------------------

--
-- Table structure for table `libur_sekolah`
--

CREATE TABLE `libur_sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_03_023211_create_presensi_table', 1),
(6, '2024_08_03_034806_create_pengajuan_izin_table', 1),
(7, '2024_08_03_035641_create_murid_table', 1),
(8, '2024_08_03_040109_create_konfigurasi_lokasi_table', 1),
(9, '2024_08_03_040307_create_jurusan_table', 1),
(10, '2025_02_25_000758_create_presensi_table', 2),
(11, '2025_04_16_232632_create_riwayat_pelanggaran_table', 2),
(13, '2025_04_21_234729_create_libur_sekolah_table', 3),
(14, '2025_05_13_112838_create_jamsekolah_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `nisn` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kode_jurusan` char(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`nisn`, `nama_lengkap`, `jenis_kelamin`, `kelas`, `no_hp`, `foto`, `kode_jurusan`, `password`) VALUES
('0106568573', 'Alinda Evriza Rani', 'Perempuan', 'X', '085766698404', '0106568573.jpg', 'TKJ 1', '$2y$10$r6szQf2tNU5LH/JbrvFOo.Q3fF9tBuNJjLCocQDYZLWZ3kzX6Lv3u'),
('0101611112', 'Ahmat Alvin', 'Laki-laki', 'X', '085766698404', '0101611112.jpg', 'TKJ 1', '$2y$10$iM0qHnwP4fYf72y5SKjdQOqyYN.Fub4iUlv/8cF3fpKsIu8s/WY/K'),
('0101710950', 'Anjaya Thre Fauzan', 'Laki-laki', 'X', '085766698404', '0101710950.jpg', 'TKJ 1', '$2y$10$td/typx93luniFY5YvIceu3Y9a47f0AfE9HfDLVKKhD4zUJBfKH26'),
('0103534987', 'Arieliansyah', 'Laki-laki', 'X', '085766698404', '0103534987.jpg', 'TKJ 1', '$2y$10$Mz4ds9eChYER53O/fADLSe.fl74yhy3/ajd.chG68eLmXkwZyLYy.'),
('0101096037', 'Arvindi Dharma Wiratama', 'Laki-laki', 'X', '085766698404', '0101096037.jpg', 'TKJ 1', '$2y$10$1SuPQ4qMv0I9TpCULcZCEuHlh3bx1DY92fI7tzc.8sGqw0VKFW6OK'),
('0101694311', 'Aulia Safitri', 'Perempuan', 'X', '085766698404', '0101694311.jpg', 'TKJ 1', '$2y$10$Ftf25aTlniuJNNjce8rMdunTF/bcl2KTHpZHeaG.WfBcKYUsaVAES'),
('0091878274', 'Auril Syaputri', 'Perempuan', 'X', '085766698404', '0091878274.jpg', 'TKJ 1', '$2y$10$DxRnb1So9V/EH8OQVe7tyeDFNeAdrjHR678JFwheIoo3PjubKDvkC'),
('0105658257', 'Bagas Hadiansyah', 'Laki-laki', 'X', '085766698404', '0105658257.jpg', 'TKJ 1', '$2y$10$7RIywqrenznc1Genxho3E.RQhz3qAABp8X9gdiT5GDJB50SMq7U/S'),
('0101777199', 'Chandra Muda Qsrana', 'Laki-laki', 'X', '085766698404', '0101777199.png', 'TKJ 1', '$2y$10$gqrJn9OAP245Cb9LMZmTyeVZRhSPzJqY8KIREBU/q3VR.ciwtlsby'),
('0092360125', 'Daffa Adilla Kurniawan', 'Laki-laki', 'X', '085766698404', '0092360125.jpg', 'TKJ 1', '$2y$10$COtfdGe/IG3RYHDdSFX3T.0n/wn6TfmDzJDqMUgw6k.k9tjbztkpi'),
('3093323626', 'Dewi Ayu Ariska', 'Perempuan', 'X', '085766698404', '3093323626.png', 'TKJ 1', '$2y$10$coSSbspt.emcKyXdn5Lk8O4NQ6ht6UySRWLqFLxrNco4UZVcMHWyK'),
('0094747357', 'Fabian Alvis N', 'Laki-laki', 'X', '085766698404', '0094747357.jpg', 'TKJ 1', '$2y$10$lWGYInxJLz79LTqntz/3Ie5H4csa8zBxjLieEiQ3XaizS6ayrvgMy'),
('0102259036', 'Fathul Ikhsan Alfakri', 'Laki-laki', 'X', '085766698404', '0102259036.jpg', 'TKJ 1', '$2y$10$D/JinUwFSnsJHsEJmUASMeu1QTUNksaaV21tGgTQiK71bnbka01qG'),
('0094393170', 'Fauzy Rabani', 'Laki-laki', 'X', '083846827542', '0094393170.jpg', 'TKJ 1', '$2y$10$jln62UA07w.tAGmv28RGhOacuFmqyL/haJLsYdwch2Ql35u7VPtPq'),
('0105478878', 'Galang Putra Hidayat', 'Laki-laki', 'X', '085766698404', '0105478878.webp', 'TKJ 1', '$2y$10$3aOCmnH2sjPXYm9ybpjE6OSucYXd.pDjAJaSEgbWHjoF7M8h2VOtK'),
('0092099112', 'Ghiyats Zaky Zikrillah', 'Laki-laki', 'X', '085766698404', '0092099112.jpg', 'TKJ 1', '$2y$10$.pRJwuIOQjw/VDoazOQKeO5kg7FFysByN0zaarp/s9WgrjQouPRoi'),
('0010867043', 'Hanfala Ikram Syarezi', 'Laki-laki', 'X', '085766698404', '0010867043.jpg', 'TKJ 1', '$2y$10$cKhuFKDoY/6eHXHJ8CrgyejczRql5mv/XJaAE6FkH/N01Om79VM/G'),
('0105174468', 'M. Gilang Pratama', 'Laki-laki', 'X', '085766698404', '0105174468.jpg', 'TKJ 1', '$2y$10$d6sUC5kdbg8bVsBkOOBCxOs0GhwoLloNAWFXkYpDnWSRhzQ7uYpi2'),
('0101793240', 'Melita Ananda', 'Perempuan', 'X', '085766698404', '0101793240.jpg', 'TKJ 1', '$2y$10$fl9YCSPJK8GENyJ9kKHIPePDLbofZXlQgk/I/LvLgTfMATvvUAxoi'),
('0103632537', 'Muhammad Abdul Rodzaki', 'Laki-laki', 'X', '085766698404', '0103632537.jpg', 'TKJ 1', '$2y$10$8VEcSA7snt32SmBbA6.OqunAx5iJsqkMtYxrPK.IvbMb8Hk0mDL52'),
('0123456789', 'Muhammad Aqil Fulgari', 'Laki-laki', 'X', '085766698404', '0123456789.jpg', 'TKJ 1', '$2y$10$Tmwfm2nFH0Nb1OeBuusVTO.EvMPdGz5/CBzu3HOxbaxMxEDfl/gAO'),
('0105819387', 'Naufal Faiz Pratama', 'Laki-laki', 'X', '085766698404', '0105819387.jpeg', 'TKJ 1', '$2y$10$WXmuXoM73cbpByhUMiyjhOGYUpqJXGXkwb4egAvniIFWy7uNKeu8C'),
('0107213033', 'Raditia Buranena. A', 'Laki-laki', 'X', '085766698404', '0107213033.jpg', 'TKJ 1', '$2y$10$h7TtPetIxhA0hLBJdr6iOu5B2j8L5o8eqz6u3PUq2KVdsSstJL7Fq'),
('0095464471', 'Rafif Alifiansyah', 'Laki-laki', 'X', '085766698404', '0095464471.jpeg', 'TKJ 1', '$2y$10$Mhrp4b8P.j3wLJvv6Sq43e2LH8FGT8E8TsGYBdkpQqTojZ7k2oaVq'),
('0102211108', 'Rahma Nur Arsy', 'Perempuan', 'X', '085766698404', '0102211108.jpg', 'TKJ 1', '$2y$10$tsI1DFoUNXDy5hKwqgJFTOeBBNLfs7i3zIHXS8z1asnqyM3cJqyze'),
('0109853009', 'Rama Aditiya', 'Laki-laki', 'X', '083196889649', '0109853009.jpg', 'TKJ 1', '$2y$10$EvSvEjtodMDves9CEciRPeWiZd7xInyaJ9KOvZvMdkghFyd01SHN2'),
('0105147718', 'Rama Aditya Putra', 'Laki-laki', 'X', '085766698404', '0105147718.jpg', 'TKJ 1', '$2y$10$crNbbYeA6y/6OLy1st.qrOJPjjgZQO4sI6wIY5u7g4Hgqz/6FNpIi'),
('0109479549', 'Radinka Mikayla Salsabila', 'Perempuan', 'X', '085766698404', '0109479549.jpg', 'TKJ 1', '$2y$10$5hExtDqi78BGcaXsBVa9QeaV1EC/phGg.sESS.8L4eg6jgHnLTKNe'),
('0102580029', 'Riya Amelliya', 'Perempuan', 'X', '085766698404', '0102580029.jpg', 'TKJ 1', '$2y$10$BcDrQHChZ.5VmPOYgpYRgOJSbjZCnP0L2mH6XJlV6JH.Yc5CGYuVy'),
('0102171325', 'Rozhendra Atha Kayzhan', 'Laki-laki', 'X', '085766698404', '0102171325.jpeg', 'TKJ 1', '$2y$10$5.XlyY0SkzKT5YW6xa9lNur/BFpgW3hazpe2AsJFA/yMciZSlQOr6'),
('0093597696', 'Salsabil Haq', 'Perempuan', 'X', '085766698404', '0093597696.jpg', 'TKJ 1', '$2y$10$5E6.AlFywnhkyedqrfcf.OcK/zXxgRWFoVSU0YWPybmwJ2QONVVs.'),
('0109527713', 'Siska Indah Saputri', 'Perempuan', 'X', '085766698404', '0109527713.jpg', 'TKJ 1', '$2y$10$f2QLTwaHDc7QHMbRfapVj.pSozMUkKEy4gW5BchenTtFCLJJL75Rq'),
('0097232106', 'Siti Nafita Sari', 'Perempuan', 'X', '085766698404', '0097232106.jpg', 'TKJ 1', '$2y$10$6dVfs9WsjH0JwqMrjn1rAO/C36BiK2UqTdYKBWoRNkCqn4nWyxOWS'),
('0096177645', 'Syifa Selfiani', 'Perempuan', 'X', '085766698404', '0096177645.jpeg', 'TKJ 1', '$2y$10$nO.XCIQpkvF6hL8vRpc62.NPByWvB73g1zzTtz28smuxOluRB5oAK'),
('0109417545', 'Vaneszya Febri Eka Putri', 'Perempuan', 'X', '085766698404', '0109417545.jpeg', 'TKJ 1', '$2y$10$tZhLMxxVVrglFEPu9/D8fupUuAXmEUu89BW6Gpz7pD7VqQlmx3xJK'),
('0102583486', 'Zahira Alzena Tanjung', 'Perempuan', 'X', '085766698404', '0102583486.jpg', 'TKJ 1', '$2y$10$l2JveQzZyUK3UZpNrrkKNuwmrhSwEePNaqhHVtkUL0On9r6WZ/PqC'),
('0103296547', 'Zahratul Ayunda', 'Perempuan', 'X', '085766698404', '0103296547.jpg', 'TKJ 1', '$2y$10$4C85t2QlrE8EW3jx9Ji49uUtW.1IplGoEfJQTe8YbUBIIPqOjYQmG'),
('0092304352', 'Almira Zahra Sopiya', 'Perempuan', 'XI', '085766698404', '0092304352.jpeg', 'TKJ 1', '$2y$10$S1soYbW.wH.5NkfBLO7zeeCEZqww.iBvrcq7yI4fjj0BphgpoSQI.'),
('0094345370', 'Amel Adelia', 'Perempuan', 'XI', '085709052372', '0094345370.jpeg', 'TKJ 1', '$2y$10$M.uMHEkpFnUczH38P7ee2OULIWWIkWxoj74a9mpRdYMPv0vg7.QKG'),
('0092704341', 'Ayra Fadhilah', 'Perempuan', 'XI', '082279299720', '0092704341.jpg', 'TKJ 1', '$2y$10$Gv3A0/FI/sz14OMqqINQ5e3L6VTHev9Qq/hPvArDQHQMuWFr8p4de'),
('0094168494', 'Bella Fusfita Indah Cahyani', 'Perempuan', 'XI', '083831658557', '0094168494.jpg', 'TKJ 1', '$2y$10$Uerq/WMeX6Fe2Im.9jtdUeZh8jiLIn5MvxYOqu1FKeGuTBP2ryCLu'),
('0081430441', 'Dapa Ardi Winarta', 'Laki-laki', 'XI', '083111100291', '0081430441.jpg', 'TKJ 1', '$2y$10$BvTQm1Zz2UA2BhGauYbeTecw1wUgC1G3wolcfm1/s5jTCXmJYN6De'),
('0094015906', 'Dedi Asep Kurniawan', 'Laki-laki', 'XI', '085766698404', '0094015906.jpg', 'TKJ 1', '$2y$10$6XpoTRG9KcwGs6Nysn2zHOAbKvo.CS5uaF.y5GSlFxO6t6qBw0YBm'),
('0092957269', 'Devo Fernanda', 'Laki-laki', 'XI', '085832210612', '0092957269.jpg', 'TKJ 1', '$2y$10$d82v904FZIlTeOFm0wzNlOhbxUlXTEbuQUaVZduF4GR33Tiw9wdZ.'),
('0092233013', 'Diana Fita Silfianingsih', 'Perempuan', 'XI', '085766698404', '0092233013.jpeg', 'TKJ 1', '$2y$10$764RUh0SfOpdJYdW3asaaOqXyG5ZuqExGbXLkVJnTL2XqLuWtK40O'),
('0093724662', 'Elina', 'Perempuan', 'XI', '083170600175', '0093724662.jpg', 'TKJ 1', '$2y$10$xYSDgzix8rTpV8Ocf2hZMOAr/ZYSIu8fApAclpykJA6kOG2LcEs.a'),
('0093399893', 'Farpi Yudana', 'Laki-laki', 'XI', '082279728074', '0093399893.jpg', 'TKJ 1', '$2y$10$0inNQxo.I9SNrFCkv0QrBeE7.7EaQyaT3N3b6ZlvOt4NT4WA..DzC'),
('0093727814', 'Haiddar Hanif Aprizal', 'Laki-laki', 'XI', '083172374222', '0093727814.png', 'TKJ 1', '$2y$10$1sZh7wxCdks495zfsm9X..PLsLG/rR9gzLrHx60ic60B6uX8pi1Xa'),
('0089487900', 'Haikal Hafiz', 'Laki-laki', 'XI', '082269873099', '0089487900.jpg', 'TKJ 1', '$2y$10$rq3d9FKk8lFmtZm0TFP1BuTvpm1O4iefZxDGHakKeMFFYr68mI7n2'),
('0086160254', 'Hilman Fadhli', 'Laki-laki', 'XI', '85758198894', '0086160254.jpg', 'TKJ 1', '$2y$10$QfXBotp75UsLCUiG5hsMFO1kazU/7WF8/NluCEo9E9b.Lb5D2thju'),
('0092261112', 'Khairul Umam', 'Laki-laki', 'XI', '+62 838-4629-7920', '0092261112.jpg', 'TKJ 1', '$2y$10$R7pQnJq8xbyAwnqCsy71C.OE5UkyMxFYsqgvkIXJnXxiixpIWHTjm'),
('0099524584', 'Lezia Dwi Yanti', 'Perempuan', 'XI', '083890275158', '0099524584.jpg', 'TKJ 1', '$2y$10$cPcZFPiILMhKxLTeU2A3yOZww9/Jsd7oecFNiBetaPyd6kBVaQ74a'),
('0088198807', 'Mastuni', 'Laki-laki', 'XI', '083874757629', '0088198807.jpg', 'TKJ 1', '$2y$10$ZNZXSSnxyWIARaY418xJ.e2ZiJRyCzAQt5Ch7a4xZMb/zLZYAobTW'),
('0094853434', 'Mila Safitri', 'Perempuan', 'XI', '083823328404', '0094853434.jpg', 'TKJ 1', '$2y$10$BYUNcQ.fjZSVQsEAGqtF3.XG.fEs6VWakgnmVr7CgzagTY7Kjtrlq'),
('0094163263', 'Muhammad Alkhadaffi Supi', 'Laki-laki', 'XI', '085769952734', '0094163263.jpg', 'TKJ 1', '$2y$10$0nTo/7HcxE/l4/tbEj.i1O87QXVess/zKauWRPl.bRElT3ZSEkS2.'),
('0083035867', 'Muhammad Habil Al Fathir', 'Laki-laki', 'XI', '083822332106', '0083035867.jpeg', 'TKJ 1', '$2y$10$MEd5xR2mxJkrtAgnrsC8beXRUGajRgyt5ZZxsUHFUMeZaflyNZGeq'),
('0097712432', 'Muhammad Nurkholis Majid', 'Laki-laki', 'XI', '83862353892', '0097712432.jpg', 'TKJ 1', '$2y$10$3LgKih7n9GJFl3YnDnKyQ.jGaV59q05eYr8LbWZL9C/fC4ZbPR.ki'),
('0085993137', 'Nur Shila Ismarani', 'Perempuan', 'XI', '083170046077', '0085993137.jpg', 'TKJ 1', '$2y$10$tM5RMCtMz7zDzq42ybiJ4OIRbMKmcrvxvnrMKRECyvGQTAvbNAmQC'),
('0098074989', 'Nursila', 'Perempuan', 'XI', '085658983043', '0098074989.jpg', 'TKJ 1', '$2y$10$A6KfzR/K7SkHSOgU/jDogust7gTBIdt6mWCI3Z8/vdMOoc/UgqU7m'),
('0095245597', 'Prastian Hugo Albani', 'Laki-laki', 'XI', '083193616668', '0095245597.jpg', 'TKJ 1', '$2y$10$7ii81umvfbRQqGSVUesfm.umy/Buz88DX3.IkzXsrxo3ROR8p6keW'),
('0097493312', 'Riswar Apriadi', 'Laki-laki', 'XI', '838-3038-4990', '0097493312.jpg', 'TKJ 1', '$2y$10$zAcaI10R0zq9h5FGd/yyPuh.O59mdk.5m5uNXp.f9Pg4SSpj.oLiG'),
('0097115668', 'Sekar Dhea Pramesti Adi Hartono', 'Perempuan', 'XI', '085279694219', '0097115668.jpg', 'TKJ 1', '$2y$10$whzJhB5sWoDNAX116BUAieDT7hKxYmuqmJlsPjrjnAwIbAF1PKJ/K'),
('0091396142', 'Syifa Fauziyah', 'Perempuan', 'XI', '085267994924', '0091396142.jpg', 'TKJ 1', '$2y$10$ttS2wejJoG/qNNavpfdZDe0LC5McKbTHi13tPXaqPWSp7U9eS.QL6'),
('0088544782', 'Valladino Javier Anjatra', 'Laki-laki', 'XI', '+62 852-7991-5957', '0088544782.jpg', 'TKJ 1', '$2y$10$2zfkBUHqFZhlBZWiOKWpa.1ahNfItjfC2v7L.vEfEYTzsgEoNVtj.'),
('0084258667', 'Wahyu Safitri', 'Perempuan', 'XI', '085758832545', '0084258667.jpg', 'TKJ 1', '$2y$10$hn6gMfLjeezKDnmdYmQ/ZOdLPDDKSZCmjIb8nII79BGwv5hgk0WUC'),
('0081716927', 'Yoda Nopriyadi', 'Laki-laki', 'XI', '085643720511', '0081716927.jpg', 'TKJ 1', '$2y$10$q4bwCHUBFxKUNvguZVRwKu3ZXLQRIXIBsoSfS/IWuun9wVZTWxlIG'),
('0091827541', 'Zamza Marya', 'Perempuan', 'XI', '085766698404', '0091827541.jpg', 'TKJ 1', '$2y$10$84GlchQAC5OQcRHX/2Gsf.50ov0sr/t3G8AN1iGfTc7htgP7DBLRS'),
('0097191432', 'Zepira Saputri', 'Perempuan', 'XI', '083168934149', '0097191432.jpg', 'TKJ 1', '$2y$10$PWUczQk/2EuBhB9rlRzzJu8O3EoTurv4Xo5SNw0QZ/VRByzwC7rYG'),
('0087769624', 'Abi Malik', 'Laki-laki', 'XI', '085766698404', '0087769624.jpeg', 'TKJ 2', '$2y$10$bC/050l.O3zdI6WZmRG.Z.DNqNHDjOn/3eLBoKEVPBgP6/n2ZuvN6'),
('0083415365', 'Ahmad Ramadhan', 'Laki-laki', 'XI', '085766698404', '0083415365.jpeg', 'TKJ 2', '$2y$10$S9HJ4se6A.T3y.8/EyYdquFyYYXHgFG3s.WbSwMZFi8Mk13RTeTo2'),
('0096826400', 'Andini', 'Perempuan', 'XI', '085766698404', '0096826400.jpeg', 'TKJ 2', '$2y$10$.JMC2/29jWW6y4HenGgfw.12fNUrjOcKeyNgHItA8JyzvkrZGhu2W'),
('0103553334', 'Annisa Ainurrahman', 'Perempuan', 'XI', '085766698404', '0103553334.jpg', 'TKJ 2', '$2y$10$EA2EkdPUnAMKjzp5cgpuM.QCVjFn0duzTUwwBShacn57DQLRqNdoy'),
('0095507558', 'Chania Laura Fernanda', 'Perempuan', 'XI', '085766698404', '0095507558.jpg', 'TKJ 2', '$2y$10$gEMQWF1dR8AoKeO6kN2z1.QJCAxkqbLHWRBNhoUSI4v3hb8KAZSw6'),
('0099250307', 'Deva Aryo Febiansyah', 'Laki-laki', 'XI', '085766698404', '0099250307.jpg', 'TKJ 2', '$2y$10$bsyL/x4OqYDmr34Kj8jGdOHCwrKIQ7ve1OygPaMBnaDJU9MAzjg9e'),
('0099366914', 'Dzikri Ibnu Sopian', 'Laki-laki', 'XI', '085766698404', '0099366914.jpeg', 'TKJ 2', '$2y$10$8MneWDk.Lw02vX8OmtkH7eWD5Clzs02pwLUuAAQbWn91aGyPjWYTi'),
('0094670023', 'Fadly Alvaro Dzakwan', 'Laki-laki', 'XI', '085766698404', '0094670023.jpeg', 'TKJ 2', '$2y$10$Z30/cwQqBBb4po2zkOn.eeGXO7YSY5QEUPB9dHdpx6YHP/pSi7ReO'),
('0088977923', 'Farel Bintang Kharisma', 'Laki-laki', 'XI', '085766698404', '0088977923.jpeg', 'TKJ 2', '$2y$10$m078LGgFIUlyoeRpymPIsOmaqn2ED0HjaewSsbUWX8bQLFePRlExO'),
('0095074994', 'Farhan Rizki Wahdana', 'Laki-laki', 'XI', '085766698404', '0095074994.jpeg', 'TKJ 2', '$2y$10$01fYor2lIEG93Ke6Gf6h9eD/utwCDmulW/3DzFJB0tI8zOXSk4P26'),
('0099671509', 'Fitra Ali', 'Laki-laki', 'XI', '085766698404', '0099671509.jpeg', 'TKJ 2', '$2y$10$VYOZcchLSWYJiKWa5GRd6uJFiqyWsF8qKr4wkryGnRJj4yBGcIm/S'),
('0094283192', 'Hanafi Akmal', 'Laki-laki', 'XI', '085766698404', '0094283192.jpg', 'TKJ 2', '$2y$10$LNWHbqmFEhLHvSCGskZrkuSoGepe/1AoKrdVcnFGpank6O/u88quC'),
('0087520279', 'I Made Satria Bhadratara', 'Laki-laki', 'XI', '085766698404', '0087520279.jpg', 'TKJ 2', '$2y$10$1ayLNWm3rJ.rFyPKiH7nV.wA2hTl4O3C/w2Lcx9hsZHDhdcxK.Vu2'),
('0086209431', 'Ibra Makaila Pratama', 'Laki-laki', 'XI', '085766698404', '0086209431.jpg', 'TKJ 2', '$2y$10$hY925meAkUzg663o4GwoTutgPhQ8UupAGgivd3t13cbL1UFxa3Ykm'),
('0094877718', 'Julia Isnaini', 'Perempuan', 'XI', '085766698404', '0094877718.jpg', 'TKJ 2', '$2y$10$kcdsJtgk0hEgMmoD7HUcI.wfFevFnUak.DOI7v1bX2zrKEQI0ISlG'),
('0098857527', 'Juwita Dwi Putri R.', 'Perempuan', 'XI', '085766698404', '0098857527.jpeg', 'TKJ 2', '$2y$10$79zyAIJSGVgzflz6JjzUmesG2ZVOVgCPpnvq3.ZsHltlD8QzXlCaG'),
('0091932426', 'Kesya Nuvita Eka Putri', 'Perempuan', 'XI', '085766698404', '0091932426.jpg', 'TKJ 2', '$2y$10$R/KvRz01VxnDBSPt4aYJd.sRm3ItFui2m39TKcvkcYMcU2Qjaz4y2'),
('0099541015', 'Keysya Eka Dwanty', 'Perempuan', 'XI', '085766698404', '0099541015.jpg', 'TKJ 2', '$2y$10$IYXPX0zag8LYVeopFAGSgOrmIkpzT/noOY62zKuK231b.a5lF5mcu'),
('0081900319', 'Lucky Aditya Prasetyo', 'Laki-laki', 'XI', '085766698404', '0081900319.jpeg', 'TKJ 2', '$2y$10$w0PfiWmMPbQiBZPXVw/zquPqZkj3vo6fuOJKoaiYXyR7p9h7owVHG'),
('0098553828', 'M. Ilham', 'Laki-laki', 'XI', '085766698404', '0098553828.jpeg', 'TKJ 2', '$2y$10$X5FolI2mLvuvW6I9V4pnUOB954aBuk8lDT.Jb/MGdVCKay9FH5gKa'),
('0071365595', 'Mahesa', 'Laki-laki', 'XI', '085766698404', '0071365595.jpg', 'TKJ 2', '$2y$10$0.osvltBG9yiH/Gmv1DYvOHQ65btdUYTT1m.NV/HY7FQS5HZakhDG'),
('0091251204', 'Mailani Azizia Putri', 'Perempuan', 'XI', '085766698404', '0091251204.jpg', 'TKJ 2', '$2y$10$VMl1nPCv1isGTWkfB0NbwO4l4jEnvCg9rvd5BMCLQzByYdBXaFEum'),
('0099294925', 'Mesya Nihayatul Auza', 'Perempuan', 'XI', '085766698404', '0099294925.jpeg', 'TKJ 2', '$2y$10$HgS.L.A0LY4rPKDHdEg/AezdIjMKLVzKyZAERe.HSNnwumTmwPL3u'),
('0089873497', 'Mirza Mahdy Ismail', 'Laki-laki', 'XI', '085766698404', '0089873497.jpeg', 'TKJ 2', '$2y$10$qVkkHMhYQvYiP2r1zWVaTucwbqGFRsvc6Z1W.xuLq7Odnmuu./gja'),
('0094246794', 'Rahma Amelia', 'Perempuan', 'XI', '085766698404', '0094246794.jpg', 'TKJ 2', '$2y$10$dAtuFsMcf/On0wAwv2EsNumTnVgLR7pR1oswU0rIcOe8u.9QurJX2'),
('0096586771', 'Rahma Susanti', 'Perempuan', 'XI', '085766698404', '0096586771.jpeg', 'TKJ 2', '$2y$10$ZIbptxnAOQsBPirNA3CZ6O4GtD1rcolR5A5yW57ttd./LaIoA9BwS'),
('0089840874', 'Ridwan Zaki Aban', 'Laki-laki', 'XI', '085766698404', '0089840874.jpeg', 'TKJ 2', '$2y$10$JFRNPSWq.O99zCyTHC3S8eu.o5ABgcFE3bmWfBOye8RZ4FidW20lO'),
('0101395398', 'Rizki Maulana', 'Laki-laki', 'XI', '085766698404', '0101395398.jpeg', 'TKJ 2', '$2y$10$rndB/5nPUMk/ZYszGnALoO98K4B.irN0Ha06hizQny8GcZFj0YAB2'),
('0097337932', 'Ryan Saputra', 'Laki-laki', 'XI', '085766698404', '0097337932.jpg', 'TKJ 2', '$2y$10$xJAGVl/Es6Rps8BZ3MKmi.Ei0w2C5NJ3u/O4Jp.5IQF5unYSLVjgq'),
('0093856752', 'Selvi Oktavia', 'Perempuan', 'XI', '085766698404', '0093856752.jpeg', 'TKJ 2', '$2y$10$q/c9A.5Mevryk7Tp6FQ3qOh0RQ/dirEXpFGsnJxD/mQTuIIJdskY.'),
('0105476640', 'Siti Harisah', 'Perempuan', 'XI', '085766698404', '0105476640.jpg', 'TKJ 2', '$2y$10$7kD8vuX/Ut93rn5PTO7e2.mwl5XMQw0wNQyuFAdA5UERXRMnat4UG'),
('0089592432', 'Sobriyansyah', 'Laki-laki', 'XI', '085766698404', '0089592432.jpeg', 'TKJ 2', '$2y$10$/5SqbacnusOFRVg4S9dIU.yk/df8pGLej.TbMILD0GRJsw/S/rjlO'),
('0107339518', 'Tina Anjani', 'Perempuan', 'XI', '085766698404', '0107339518.jpeg', 'TKJ 2', '$2y$10$wuOXSAJmjomwaEzXsyY5DeC2S4j708voAmMs87AMN4XVKAARuhHAm'),
('0099607211', 'Wahyu Ibni Ziyad Witha', 'Laki-laki', 'XI', '085766698404', '0099607211.jpg', 'TKJ 2', '$2y$10$p7e8GLrDTJUKA9f1F6trPOep3c1ExbMlfFUzmG/kK1dGHV58OlNXG'),
('0098376152', 'Wahyu Syahputra', 'Laki-laki', 'XI', '085766698404', '0098376152.jpeg', 'TKJ 2', '$2y$10$PnVz9R9xJ1.hQi0.3gETiuhQWi.trb9NIebJF0h8A/b6JiK2s6Sty'),
('0099088724', 'Yuanda Anfaqi', 'Laki-laki', 'XI', '085766698404', '0099088724.jpeg', 'TKJ 2', '$2y$10$F8Ivk7cSAUybC55nKDfISOKHs/H0Qwhl.2aC5.nhJUMCIgaxu46Xe'),
('0987654369', 'Hilda', 'Perempuan', 'XII', '085766698404', '0987654369.png', 'TKJ', '$2y$10$Y2HlqvblNzcU8cRE.zy/5OVkTNd6/9O3Cnz9wyREyNgUZxUmISaLW'),
('0987654321', 'Sri Mulya Wulandari', 'Perempuan', 'X', '085766698404', '0987654321.png', 'TKJ 1', '$2y$10$QfjiIgK/Kxj3m.BrVf61s.sCb/0upUmlfD/NzQT/gXGMsWTTmKv5i'),
('3099818422', 'Ageng Bagus Yulianto', 'Laki-laki', 'XI', '085766698404', '3099818422.jpg', 'TKJ 1', '$2y$10$CAZTOaRWoLAMWiN2DBcH4OSa68ZyGWOAAHyjfA0CNTKwGH2xmp2Oa'),
('3094044648', 'Heru Tri Budiman', 'Laki-laki', 'XI', '085766698404', '3094044648.jpg', 'TKJ 1', '$2y$10$rYYscIpaXKIbfsL.ZvbskOFzNqKEsxDyQgIiZDAbBgtKRs2kiNare'),
('3099280751', 'Muhammad Alfatih', 'Laki-laki', 'XI', '085766698404', '3099280751.jpg', 'TKJ 1', '$2y$10$MgHsFGsbys1WrqtS/CaMa.7o4eqKgawuqlye20qwWL6qLXt/W.6je'),
('3092983014', 'Muhammad Andreatama', 'Laki-laki', 'XI', '085766698404', '3092983014.webp', 'TKJ 1', '$2y$10$yn3Hu9a9Yviju99.uQW1FOjV/uYuytt9b/juyYTyj3EgCVKNAVU1i'),
('3098860857', 'Tegar Satria Putra', 'Laki-laki', 'XI', '085766698404', '3098860857.png', 'TKJ 1', '$2y$10$NBczPee3FU.giDo66/Xt8Oe/r6JAfePnNpM.DFOd2yAXvzyorab3i'),
('3093789914', 'Raka Pratama', 'Laki-laki', 'XI', '085766698404', '3093789914.jpeg', 'TKJ 1', '$2y$10$9WBAkE9AE6AOKfIArwZsuOL9os5R7TBDfEbKlxBSajTlUHlPDSJNy'),
('3096021282', 'Imam Ali Reza', 'Laki-laki', 'XI', '085766698404', '3096021282.jpeg', 'TKJ 1', '$2y$10$UWFAXYb3s6PUfvpRyQLEBOfRn/Eup94KFo9hBRkHa1i4J96tHaPA2'),
('3093281486', 'Ahmad Faizal', 'Laki-laki', 'XI', '085766698404', '3093281486.jpeg', 'TKJ 2', '$2y$10$7EHXTY1fmxya.5xJJqjeg.qKz4xiPBIa8JTwimMZWKum.IipVUCci'),
('3099945542', 'Lizam Rhaditya', 'Laki-laki', 'XI', '085766698404', '3099945542.jpeg', 'TKJ 2', '$2y$10$/SHqk6A7LhHnsDnIiP7Y6.Z2E0R8WmbpTDuj/GKJXbmH31X8fJS..');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_izin`
--

CREATE TABLE `pengajuan_izin` (
  `id` int(10) UNSIGNED NOT NULL,
  `nisn` char(255) NOT NULL,
  `tgl_izin` date NOT NULL,
  `status` char(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status_approved` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan_izin`
--

INSERT INTO `pengajuan_izin` (`id`, `nisn`, `tgl_izin`, `status`, `keterangan`, `status_approved`) VALUES
(1, '0101710950', '2025-07-24', 'i', 'Ada urusan keluarga pergi keluar kota', '0'),
(2, '0103534987', '2025-07-25', 's', 'Sedang masuk RS menjalani perawatan sakit tipes', '0'),
(3, '0101694311', '2025-07-25', 'i', 'Menghadiri pemakaman nenek', '0'),
(4, '0094168494', '2025-07-24', 'i', 'Ingin melaksanakan perlombaan di Singapura', '0'),
(5, '0092957269', '2025-07-24', 'i', 'Ada urusan keluarga pergi keluar kota', '0'),
(6, '0089487900', '2025-07-25', 's', 'Sedang masuk RS menjalani perawatan sakit tipes', '0'),
(7, '0071365595', '2025-07-25', 's', 'Sedang masuk RS menjalani perawatan sakit tipes', '0'),
(8, '0094877718', '2025-07-24', 'i', 'Ingin melaksanakan perlombaan di Singapura', '0'),
(9, '0099607211', '2025-07-25', 's', 'Sedang masuk RS menjalani perawatan sakit tipes', '0'),
(10, '101611112', '2025-07-25', 'i', 'Menjenguk Nenek di Rumah Sakit Bob Bazar', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `tgl_presensi` date NOT NULL,
  `jam_in` time DEFAULT NULL,
  `jam_out` time DEFAULT NULL,
  `lokasi_in` varchar(255) DEFAULT NULL,
  `lokasi_out` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `nisn`, `tgl_presensi`, `jam_in`, `jam_out`, `lokasi_in`, `lokasi_out`) VALUES
(90, '0101611112', '2025-07-21', '07:28:27', '15:30:43', '-5.7093068,105.5894946', '-5.7092579,105.589667'),
(91, '0106568573', '2025-07-21', '07:29:32', '15:31:15', '-5.7093068,105.5894946', '-5.7092591,105.5896356'),
(92, '0101710950', '2025-07-21', '07:29:22', '15:31:18', '-5.7093484,105.589682', '-5.709253,105.5896543'),
(93, '0103534987', '2025-07-21', '07:26:30', '15:31:50', '-5.7092531,105.5896525', '-5.7093052,105.5894944'),
(94, '0101096037', '2025-07-21', '07:29:33', '15:32:33', '-5.7092872,105.5895735', '-5.709253,105.5896543'),
(95, '0101694311', '2025-07-21', '07:27:47', '15:33:47', '-5.7092579,105.589667', '-5.7092707,105.5896307'),
(96, '0091878274', '2025-07-21', '07:28:27', '15:31:45', '-5.7092479,105.5896572', '-5.7092701,105.5896045'),
(97, '0105658257', '2025-07-21', '07:32:34', '15:34:16', '-5.7092718,105.5896072', '-5.7092475,105.5896517'),
(98, '0101777199', '2025-07-21', '07:28:37', '15:32:25', '-5.7093048,105.5894962', '-5.7092529,105.5896479'),
(99, '0092360125', '2025-07-21', '07:29:39', '15:33:50', '-5.7093052,105.5894944', '-5.7093068,105.5896994'),
(100, '3093323626', '2025-07-21', '07:25:15', '15:32:45', '-5.709253,105.5896543', '-5.7092701,105.5896045'),
(101, '0094747357', '2025-07-21', '07:29:06', '15:33:46', '-5.709054610413271,105.58965315865831', '-5.709391,105.5894767'),
(102, '0102259036', '2025-07-21', '07:30:11', '15:33:46', '-5.7093068,105.5896994', '-5.7092528,105.5896437'),
(103, '0085993137', '2025-07-21', '07:27:29', '15:34:46', '-5.7092563,105.5896457', '-5.7092591,105.5896356'),
(104, '0105478878', '2025-07-21', '07:28:48', '15:32:27', '-5.7092707,105.5896307', '-5.7092529,105.5896479'),
(105, '0092099112', '2025-07-21', '07:27:00', '15:33:35', '-5.7092696,105.5895918', '-5.7093086,105.5894951'),
(106, '0010867043', '2025-07-21', '07:24:16', '15:34:31', '-5.7092528,105.5896437', '-5.7093294,105.5895036'),
(107, '0105174468', '2025-07-21', '07:26:23', '15:33:41', '-5.7092475,105.5896517', '-5.7093204,105.5894905'),
(108, '0101793240', '2025-07-21', '07:24:33', '15:33:28', '-5.7092815,105.5895673', '-5.7093018,105.5894984'),
(109, '0103632537', '2025-07-21', '07:27:53', '15:34:40', '-5.7093086,105.5894951', '-5.7093297,105.5894983'),
(110, '0123456789', '2025-07-21', '07:28:13', '15:32:51', '-5.7092529,105.5896479', '-5.7089637,105.5901676'),
(111, '0105819387', '2025-07-21', '07:24:32', '15:31:53', '-5.7092638,105.5896256', '-5.7093073,105.5894991'),
(112, '0109479549', '2025-07-21', '07:25:51', '15:31:12', '-5.7092614,105.5896314', '-5.7093021,105.5894987'),
(113, '0107213033', '2025-07-21', '07:30:57', '15:33:35', '-5.7092817,105.589625', '-5.7092531,105.5896525'),
(114, '0095464471', '2025-07-21', '07:29:12', '15:33:46', '-5.709391,105.5894767', '-5.7092579,105.589667'),
(115, '0102211108', '2025-07-21', '07:25:07', '15:34:21', '-5.7090278,105.5893834', '-5.7092701,105.5896045'),
(116, '0109853009', '2025-07-21', '07:27:08', '15:32:36', '-5.7093205,105.5894871', '-5.7093052,105.5894944'),
(117, '0105147718', '2025-07-21', '07:25:21', '15:31:53', '-5.7093289,105.5894944', '-5.7092563,105.5896457'),
(118, '0102580029', '2025-07-21', '07:28:43', '15:33:10', '-5.7093294,105.5895036', '-5.7092707,105.5896307'),
(119, '0102171325', '2025-07-21', '07:29:46', '15:34:08', '-5.7093302,105.589462', '-5.7092529,105.5896479'),
(120, '0093597696', '2025-07-21', '07:30:52', '15:31:30', '-5.7092677,105.5895681', '-5.7092529,105.5896479'),
(121, '0109527713', '2025-07-21', '07:29:57', '15:33:12', '-5.709306,105.5895018', '-5.7092638,105.5896256'),
(122, '0097232106', '2025-07-21', '07:26:59', '15:31:20', '-5.7092531,105.5896525', '-5.7093484,105.589682'),
(123, '0987654321', '2025-07-21', '07:28:04', '15:31:44', '-5.7093204,105.5894905', '-5.7092696,105.5895918'),
(125, '0096177645', '2025-07-21', '07:30:18', '15:34:07', '-5.7093286,105.5894942', '-5.7093146,105.5895288'),
(126, '0109417545', '2025-07-21', '07:27:26', '15:33:40', '-5.7093031,105.5895006', '-5.7090278,105.5893834'),
(127, '0102583486', '2025-07-21', '07:25:37', '15:31:44', '-5.7093297,105.5894983', '-5.7092638,105.5896256'),
(128, '0103296547', '2025-07-21', '07:29:38', '15:34:10', '-5.7093155,105.5895232', '-5.7093068,105.5896994'),
(129, '3099818422', '2025-07-21', '07:29:56', '15:31:49', '-5.709329,105.5894964', '-5.709315,105.589523'),
(130, '0092304352', '2025-07-21', '07:25:09', '15:33:25', '-5.7093021,105.5894987', '-5.7092992,105.5895047'),
(131, '0094345370', '2025-07-21', '07:23:11', '15:34:25', '-5.7093018,105.5894984', '-5.7093484,105.589682'),
(132, '0092704341', '2025-07-21', '07:22:14', '15:32:22', '-5.709302,105.5895008', '-5.709253,105.5896543'),
(133, '0094168494', '2025-07-21', '07:22:17', '15:33:25', '-5.709315,105.589523', '-5.7092479,105.5896572'),
(134, '0081430441', '2025-07-21', '07:23:24', '15:32:40', '-5.7093073,105.5894991', '-5.7093021,105.5894987'),
(135, '0094015906', '2025-07-21', '07:24:05', '15:33:46', '-5.7077703,105.5891291', '-5.709391,105.5894767'),
(136, '0092957269', '2025-07-21', '07:24:26', '15:32:40', '-5.7091822,105.5895943', '-5.7092529,105.5896479'),
(137, '0092233013', '2025-07-21', '07:27:33', '15:34:10', '-5.7092257,105.5895539', '-5.7093068,105.5896994'),
(138, '0093724662', '2025-07-21', '07:28:55', '15:32:16', '-5.7092198,105.5895475', '-5.7092614,105.5896314'),
(139, '0093399893', '2025-07-21', '07:28:02', '15:34:30', '-5.7092608,105.5895359', '-5.7092817,105.589625'),
(140, '0093727814', '2025-07-21', '07:34:10', '15:33:45', '-5.7093059,105.5895', '-5.7093297,105.5894983'),
(141, '0089487900', '2025-07-21', '07:24:28', '15:32:37', '-5.7092992,105.5895047', '-5.7092563,105.5896457'),
(142, '3094044648', '2025-07-21', '07:28:41', '15:34:10', '-5.7092525,105.5896569', '-5.7093286,105.5894942'),
(143, '0086160254', '2025-07-21', '07:32:00', '15:33:10', '-5.7093072,105.5894984', '-5.7092529,105.5896479'),
(144, '3096021282', '2025-07-21', '07:29:42', '15:32:15', '-5.711711711711712,105.58727777185973', '-5.7092638,105.5896256'),
(145, '0092261112', '2025-07-21', '07:24:51', '15:33:26', '-5.709231,105.589549', '-5.7091822,105.5895943'),
(146, '0099524584', '2025-07-21', '07:27:39', '15:31:50', '-5.7093044,105.5895038', '-5.7093086,105.5894951'),
(147, '0088198807', '2025-07-21', '07:23:44', '15:33:50', '-5.7093055,105.589518', '-5.7093059,105.5895'),
(148, '0094853434', '2025-07-21', '07:33:02', '15:32:30', '-5.7092608,105.5895359', '-5.7093068,105.5896994'),
(149, '3099280751', '2025-07-21', '07:20:48', '15:33:10', '-5.7089631,105.5901704', '-5.7092525,105.5896569'),
(150, '0094163263', '2025-07-21', '07:26:49', '15:32:55', '-5.7089844,105.5901359', '-5.7092707,105.5896307'),
(151, '3092983014', '2025-07-21', '07:24:50', '15:32:35', '-5.708971,105.5901591', '-5.7092529,105.5896479'),
(152, '0083035867', '2025-07-21', '07:26:55', '15:34:15', '-5.7089637,105.5901676', '-5.7092591,105.5896356'),
(153, '0097712432', '2025-07-21', '07:25:25', '15:34:10', '-5.70886,105.5898408', '-5.7093048,105.5894962'),
(154, '0098074989', '2025-07-21', '07:28:35', '15:32:59', '-5.7092934,105.589549', '-5.7093486,105.5896018'),
(155, '0094393170', '2025-07-21', '07:27:29', '15:34:46', '-5.7092563,105.5896457', '-5.7092591,105.5896356'),
(156, '0095245597', '2025-07-21', '07:25:15', '15:32:45', '-5.709253,105.5896543', '-5.7092701,105.5896045'),
(157, '3093789914', '2025-07-21', '07:30:18', '15:34:07', '-5.7093286,105.5894942', '-5.7093146,105.5895288'),
(158, '0097493312', '2025-07-21', '07:25:51', '15:31:12', '-5.7092614,105.5896314', '-5.7093021,105.5894987'),
(159, '0097115668', '2025-07-21', '07:24:51', '15:33:26', '-5.709231,105.589549', '-5.7091822,105.5895943'),
(160, '0091396142', '2025-07-21', '07:29:39', '15:33:50', '-5.7093052,105.5894944', '-5.7093068,105.5896994'),
(161, '3098860857', '2025-07-21', '07:30:57', '15:33:35', '-5.7092817,105.589625', '-5.7092531,105.5896525'),
(162, '0088544782', '2025-07-21', '07:29:06', '15:33:46', '-5.709054610413271,105.58965315865831', '-5.709391,105.5894767'),
(163, '0084258667', '2025-07-21', '07:27:29', '15:34:46', '-5.7092563,105.5896457', '-5.7092591,105.5896356'),
(164, '0081716927', '2025-07-21', '07:26:30', '15:31:50', '-5.7092531,105.5896525', '-5.7093052,105.5894944'),
(165, '0091827541', '2025-07-21', '07:25:51', '15:31:12', '-5.7092614,105.5896314', '-5.7093021,105.5894987'),
(166, '0097191432', '2025-07-21', '07:24:32', '15:31:53', '-5.7092638,105.5896256', '-5.7093073,105.5894991'),
(167, '0087769624', '2025-07-21', '07:29:32', '15:31:15', '-5.7093068,105.5894946', '-5.7092591,105.5896356'),
(168, '3093281486', '2025-07-21', '07:26:30', '15:31:50', '-5.7092531,105.5896525', '-5.7093052,105.5894944'),
(169, '0083415365', '2025-07-21', '07:27:47', '15:33:47', '-5.7092579,105.589667', '-5.7092707,105.5896307'),
(170, '0096826400', '2025-07-21', '07:32:34', '15:34:16', '-5.7092718,105.5896072', '-5.7092475,105.5896517'),
(171, '0103553334', '2025-07-21', '07:29:39', '15:33:50', '-5.7093052,105.5894944', '-5.7093068,105.5896994'),
(172, '0095507558', '2025-07-21', '07:25:15', '15:32:45', '-5.709253,105.5896543', '-5.7092701,105.5896045'),
(173, '0099250307', '2025-07-21', '07:27:29', '15:34:46', '-5.7092563,105.5896457', '-5.7092591,105.5896356'),
(174, '0099366914', '2025-07-21', '07:27:00', '15:33:35', '-5.7092696,105.5895918', '-5.7093086,105.5894951'),
(175, '0094670023', '2025-07-21', '07:30:57', '15:33:35', '-5.7092817,105.589625', '-5.7092531,105.5896525'),
(176, '0088977923', '2025-07-21', '07:25:07', '15:34:21', '-5.7090278,105.5893834', '-5.7092701,105.5896045'),
(177, '0095074994', '2025-07-21', '07:26:59', '15:31:20', '-5.7092531,105.5896525', '-5.7093484,105.589682'),
(178, '0099671509', '2025-07-21', '07:30:18', '15:34:07', '-5.7093286,105.5894942', '-5.7093146,105.5895288'),
(179, '0094283192', '2025-07-21', '07:25:37', '15:31:44', '-5.7093297,105.5894983', '-5.7092638,105.5896256'),
(180, '0087520279', '2025-07-21', '07:29:56', '15:31:49', '-5.709329,105.5894964', '-5.709315,105.589523'),
(181, '0086209431', '2025-07-21', '07:23:11', '15:34:25', '-5.7093018,105.5894984', '-5.7093484,105.589682'),
(182, '0094877718', '2025-07-21', '07:22:17', '15:33:25', '-5.709315,105.589523', '-5.7092479,105.5896572'),
(183, '0098857527', '2025-07-21', '07:24:05', '15:33:46', '-5.7077703,105.5891291', '-5.709391,105.5894767'),
(184, '0091932426', '2025-07-21', '07:27:33', '15:34:10', '-5.7092257,105.5895539', '-5.7093068,105.5896994'),
(185, '0099541015', '2025-07-21', '07:28:02', '15:34:30', '-5.7092608,105.5895359', '-5.7092817,105.589625'),
(186, '3099945542', '2025-07-21', '07:24:28', '15:32:37', '-5.7092992,105.5895047', '-5.7092563,105.5896457'),
(187, '0081900319', '2025-07-21', '07:27:08', '15:32:36', '-5.7093205,105.5894871', '-5.7093052,105.5894944'),
(188, '0098553828', '2025-07-21', '07:30:18', '15:34:07', '-5.7093286,105.5894942', '-5.7093146,105.5895288'),
(189, '0071365595', '2025-07-21', '07:22:17', '15:33:25', '-5.709315,105.589523', '-5.7092479,105.5896572'),
(190, '0091251204', '2025-07-21', '07:24:05', '15:33:46', '-5.7077703,105.5891291', '-5.709391,105.5894767'),
(191, '0099294925', '2025-07-21', '07:24:28', '15:32:37', '-5.7092992,105.5895047', '-5.7092563,105.5896457'),
(192, '0089873497', '2025-07-21', '07:32:00', '15:33:10', '-5.7093072,105.5894984', '-5.7092529,105.5896479'),
(193, '0094246794', '2025-07-21', '07:20:48', '15:33:10', '-5.7089631,105.5901704', '-5.7092525,105.5896569'),
(194, '0096586771', '2025-07-21', '07:24:50', '15:32:35', '-5.708971,105.5901591', '-5.7092529,105.5896479'),
(195, '0089840874', '2025-07-21', '07:30:18', '15:34:07', '-5.7093286,105.5894942', '-5.7093146,105.5895288'),
(196, '0101395398', '2025-07-21', '07:24:51', '15:33:26', '-5.709231,105.589549', '-5.7091822,105.5895943'),
(197, '0097337932', '2025-07-21', '07:26:30', '15:31:50', '-5.7092531,105.5896525', '-5.7093052,105.5894944'),
(198, '0093856752', '2025-07-21', '07:28:27', '15:31:45', '-5.7092479,105.5896572', '-5.7092701,105.5896045'),
(199, '0105476640', '2025-07-21', '07:29:39', '15:33:50', '-5.7093052,105.5894944', '-5.7093068,105.5896994'),
(200, '0089592432', '2025-07-21', '07:29:06', '15:33:46', '-5.709054610413271,105.58965315865831', '-5.709391,105.5894767'),
(201, '0107339518', '2025-07-21', '07:30:11', '15:33:46', '-5.7093068,105.5896994', '-5.7092528,105.5896437'),
(202, '0099607211', '2025-07-21', '07:28:48', '15:32:27', '-5.7092707,105.5896307', '-5.7092529,105.5896479'),
(203, '0098376152', '2025-07-21', '07:26:23', '15:33:41', '-5.7092475,105.5896517', '-5.7093204,105.5894905'),
(204, '0099088724', '2025-07-21', '07:24:33', '15:33:28', '-5.7092815,105.5895673', '-5.7093018,105.5894984'),
(205, '0101611112', '2025-07-22', '07:28:27', '15:30:43', '-5.7093068,105.5894946', '-5.7092579,105.589667'),
(206, '0106568573', '2025-07-22', '07:29:32', '15:31:15', '-5.7093068,105.5894946', '-5.7092591,105.5896356'),
(207, '0101710950', '2025-07-22', '07:29:22', '15:31:18', '-5.7093484,105.589682', '-5.709253,105.5896543'),
(208, '0103534987', '2025-07-22', '07:26:30', '15:31:50', '-5.7092531,105.5896525', '-5.7093052,105.5894944'),
(209, '0101096037', '2025-07-22', '07:29:33', '15:32:33', '-5.7092872,105.5895735', '-5.709253,105.5896543'),
(210, '0101694311', '2025-07-22', '07:27:47', '15:33:47', '-5.7092579,105.589667', '-5.7092707,105.5896307'),
(211, '0091878274', '2025-07-22', '07:28:27', '15:31:45', '-5.7092479,105.5896572', '-5.7092701,105.5896045'),
(212, '0105658257', '2025-07-22', '07:32:34', '15:34:16', '-5.7092718,105.5896072', '-5.7092475,105.5896517'),
(213, '0101777199', '2025-07-22', '07:28:37', '15:32:25', '-5.7093048,105.5894962', '-5.7092529,105.5896479'),
(214, '0092360125', '2025-07-22', '07:29:39', '15:33:50', '-5.7093052,105.5894944', '-5.7093068,105.5896994'),
(215, '3093323626', '2025-07-22', '07:25:15', '15:32:45', '-5.709253,105.5896543', '-5.7092701,105.5896045'),
(216, '0094747357', '2025-07-22', '07:29:06', '15:33:46', '-5.709054610413271,105.58965315865831', '-5.709391,105.5894767'),
(217, '0102259036', '2025-07-22', '07:30:11', '15:33:46', '-5.7093068,105.5896994', '-5.7092528,105.5896437'),
(218, '0085993137', '2025-07-22', '07:27:29', '15:34:46', '-5.7092563,105.5896457', '-5.7092591,105.5896356'),
(219, '0105478878', '2025-07-22', '07:28:48', '15:32:27', '-5.7092707,105.5896307', '-5.7092529,105.5896479'),
(220, '0092099112', '2025-07-22', '07:27:00', '15:33:35', '-5.7092696,105.5895918', '-5.7093086,105.5894951'),
(221, '0010867043', '2025-07-22', '07:24:16', '15:34:31', '-5.7092528,105.5896437', '-5.7093294,105.5895036'),
(222, '0105174468', '2025-07-22', '07:26:23', '15:33:41', '-5.7092475,105.5896517', '-5.7093204,105.5894905'),
(223, '0101793240', '2025-07-22', '07:24:33', '15:33:28', '-5.7092815,105.5895673', '-5.7093018,105.5894984'),
(224, '0103632537', '2025-07-22', '07:27:53', '15:34:40', '-5.7093086,105.5894951', '-5.7093297,105.5894983'),
(225, '0123456789', '2025-07-22', '07:28:13', '15:32:51', '-5.7092529,105.5896479', '-5.7089637,105.5901676'),
(226, '0105819387', '2025-07-22', '07:24:32', '15:31:53', '-5.7092638,105.5896256', '-5.7093073,105.5894991'),
(227, '0109479549', '2025-07-22', '07:25:51', '15:31:12', '-5.7092614,105.5896314', '-5.7093021,105.5894987'),
(228, '0107213033', '2025-07-22', '07:30:57', '15:33:35', '-5.7092817,105.589625', '-5.7092531,105.5896525'),
(229, '0095464471', '2025-07-22', '07:29:12', '15:33:46', '-5.709391,105.5894767', '-5.7092579,105.589667'),
(230, '0102211108', '2025-07-22', '07:25:07', '15:34:21', '-5.7090278,105.5893834', '-5.7092701,105.5896045'),
(231, '0109853009', '2025-07-22', '07:27:08', '15:32:36', '-5.7093205,105.5894871', '-5.7093052,105.5894944'),
(232, '0105147718', '2025-07-22', '07:25:21', '15:31:53', '-5.7093289,105.5894944', '-5.7092563,105.5896457'),
(233, '0102580029', '2025-07-22', '07:28:43', '15:33:10', '-5.7093294,105.5895036', '-5.7092707,105.5896307'),
(234, '0102171325', '2025-07-22', '07:29:46', '15:34:08', '-5.7093302,105.589462', '-5.7092529,105.5896479'),
(235, '0093597696', '2025-07-22', '07:30:52', '15:31:30', '-5.7092677,105.5895681', '-5.7092529,105.5896479'),
(236, '0109527713', '2025-07-22', '07:29:57', '15:33:12', '-5.709306,105.5895018', '-5.7092638,105.5896256'),
(237, '0097232106', '2025-07-22', '07:26:59', '15:31:20', '-5.7092531,105.5896525', '-5.7093484,105.589682'),
(238, '0987654321', '2025-07-22', '07:28:04', '15:31:44', '-5.7093204,105.5894905', '-5.7092696,105.5895918'),
(239, '0096177645', '2025-07-22', '07:30:18', '15:34:07', '-5.7093286,105.5894942', '-5.7093146,105.5895288'),
(240, '0109417545', '2025-07-22', '07:27:26', '15:33:40', '-5.7093031,105.5895006', '-5.7090278,105.5893834'),
(241, '0102583486', '2025-07-22', '07:25:37', '15:31:44', '-5.7093297,105.5894983', '-5.7092638,105.5896256'),
(242, '0103296547', '2025-07-22', '07:29:38', '15:34:10', '-5.7093155,105.5895232', '-5.7093068,105.5896994'),
(243, '3099818422', '2025-07-22', '07:29:56', '15:31:49', '-5.709329,105.5894964', '-5.709315,105.589523'),
(244, '0092304352', '2025-07-22', '07:25:09', '15:33:25', '-5.7093021,105.5894987', '-5.7092992,105.5895047'),
(245, '0094393170', '2025-07-22', '07:27:29', '15:34:46', '-5.7092563,105.5896457', '-5.7092591,105.5896356'),
(246, '0094345370', '2025-07-22', '07:23:11', '15:34:25', '-5.7093018,105.5894984', '-5.7093484,105.589682'),
(247, '0092704341', '2025-07-22', '07:22:14', '15:32:22', '-5.709302,105.5895008', '-5.709253,105.5896543'),
(248, '0094168494', '2025-07-22', '07:22:17', '15:33:25', '-5.709315,105.589523', '-5.7092479,105.5896572'),
(249, '0081430441', '2025-07-22', '07:23:24', '15:32:40', '-5.7093073,105.5894991', '-5.7093021,105.5894987'),
(250, '0094015906', '2025-07-22', '07:24:05', '15:33:46', '-5.7077703,105.5891291', '-5.709391,105.5894767'),
(251, '0092957269', '2025-07-22', '07:24:26', '15:32:40', '-5.7091822,105.5895943', '-5.7092529,105.5896479'),
(252, '0092233013', '2025-07-22', '07:27:33', '15:34:10', '-5.7092257,105.5895539', '-5.7093068,105.5896994'),
(253, '0093724662', '2025-07-22', '07:28:55', '15:32:16', '-5.7092198,105.5895475', '-5.7092614,105.5896314'),
(254, '0093399893', '2025-07-22', '07:28:02', '15:34:30', '-5.7092608,105.5895359', '-5.7092817,105.589625'),
(255, '0093727814', '2025-07-22', '07:34:10', '15:33:45', '-5.7093059,105.5895', '-5.7093297,105.5894983'),
(256, '0089487900', '2025-07-22', '07:24:28', '15:32:37', '-5.7092992,105.5895047', '-5.7092563,105.5896457'),
(257, '3094044648', '2025-07-22', '07:28:41', '15:34:10', '-5.7092525,105.5896569', '-5.7093286,105.5894942'),
(258, '0086160254', '2025-07-22', '07:32:00', '15:33:10', '-5.7093072,105.5894984', '-5.7092529,105.5896479'),
(259, '3096021282', '2025-07-22', '07:29:42', '15:32:15', '-5.711711711711712,105.58727777185973', '-5.7092638,105.5896256'),
(260, '0092261112', '2025-07-22', '07:24:51', '15:33:26', '-5.709231,105.589549', '-5.7091822,105.5895943'),
(261, '0099524584', '2025-07-22', '07:27:39', '15:31:50', '-5.7093044,105.5895038', '-5.7093086,105.5894951'),
(262, '0088198807', '2025-07-22', '07:23:44', '15:33:50', '-5.7093055,105.589518', '-5.7093059,105.5895'),
(263, '0094853434', '2025-07-22', '07:33:02', '15:32:30', '-5.7092608,105.5895359', '-5.7093068,105.5896994'),
(264, '3099280751', '2025-07-22', '07:20:48', '15:33:10', '-5.7089631,105.5901704', '-5.7092525,105.5896569'),
(265, '0094163263', '2025-07-22', '07:26:49', '15:32:55', '-5.7089844,105.5901359', '-5.7092707,105.5896307'),
(266, '3092983014', '2025-07-22', '07:24:50', '15:32:35', '-5.708971,105.5901591', '-5.7092529,105.5896479'),
(267, '0083035867', '2025-07-22', '07:26:55', '15:34:15', '-5.7089637,105.5901676', '-5.7092591,105.5896356'),
(268, '0097712432', '2025-07-22', '07:25:25', '15:34:10', '-5.70886,105.5898408', '-5.7093048,105.5894962'),
(269, '0098074989', '2025-07-22', '07:28:35', '15:32:59', '-5.7092934,105.589549', '-5.7093486,105.5896018'),
(270, '0095245597', '2025-07-22', '07:25:15', '15:32:45', '-5.709253,105.5896543', '-5.7092701,105.5896045'),
(271, '3093789914', '2025-07-22', '07:30:18', '15:34:07', '-5.7093286,105.5894942', '-5.7093146,105.5895288'),
(272, '0097493312', '2025-07-22', '07:25:51', '15:31:12', '-5.7092614,105.5896314', '-5.7093021,105.5894987'),
(273, '0097115668', '2025-07-22', '07:24:51', '15:33:26', '-5.709231,105.589549', '-5.7091822,105.5895943'),
(274, '0091396142', '2025-07-22', '07:29:39', '15:33:50', '-5.7093052,105.5894944', '-5.7093068,105.5896994'),
(275, '3098860857', '2025-07-22', '07:30:57', '15:33:35', '-5.7092817,105.589625', '-5.7092531,105.5896525'),
(276, '0088544782', '2025-07-22', '07:29:06', '15:33:46', '-5.709054610413271,105.58965315865831', '-5.709391,105.5894767'),
(277, '0084258667', '2025-07-22', '07:27:29', '15:34:46', '-5.7092563,105.5896457', '-5.7092591,105.5896356'),
(278, '0081716927', '2025-07-22', '07:26:30', '15:31:50', '-5.7092531,105.5896525', '-5.7093052,105.5894944'),
(279, '0091827541', '2025-07-22', '07:25:51', '15:31:12', '-5.7092614,105.5896314', '-5.7093021,105.5894987'),
(280, '0097191432', '2025-07-22', '07:24:32', '15:31:53', '-5.7092638,105.5896256', '-5.7093073,105.5894991'),
(281, '0087769624', '2025-07-22', '07:32:32', '15:32:10', '-5.7093068,105.5894946', '-5.7092591,105.5896356'),
(282, '3093281486', '2025-07-22', '07:25:30', '15:32:50', '-5.7092531,105.5896525', '-5.7093052,105.5894944'),
(283, '0083415365', '2025-07-22', '07:33:47', '15:31:47', '-5.7092579,105.589667', '-5.7092707,105.5896307'),
(284, '0096826400', '2025-07-22', '07:28:29', '15:32:10', '-5.7092718,105.5896072', '-5.7092475,105.5896517'),
(285, '0103553334', '2025-07-22', '07:25:39', '15:32:50', '-5.7093052,105.5894944', '-5.7093068,105.5896994'),
(286, '0095507558', '2025-07-22', '07:34:15', '15:33:45', '-5.709253,105.5896543', '-5.7092701,105.5896045'),
(287, '0099250307', '2025-07-22', '07:26:15', '15:33:30', '-5.7092563,105.5896457', '-5.7092591,105.5896356'),
(288, '0099366914', '2025-07-22', '07:29:15', '15:34:39', '-5.7092696,105.5895918', '-5.7093086,105.5894951'),
(289, '0094670023', '2025-07-22', '07:27:57', '15:32:35', '-5.7092817,105.589625', '-5.7092531,105.5896525'),
(290, '0088977923', '2025-07-22', '07:30:07', '15:31:21', '-5.7090278,105.5893834', '-5.7092701,105.5896045'),
(291, '0095074994', '2025-07-22', '07:28:59', '15:32:20', '-5.7092531,105.5896525', '-5.7093484,105.589682'),
(292, '0099671509', '2025-07-22', '07:25:18', '15:32:07', '-5.7093286,105.5894942', '-5.7093146,105.5895288'),
(293, '0094283192', '2025-07-22', '07:31:37', '15:33:44', '-5.7093297,105.5894983', '-5.7092638,105.5896256'),
(294, '0087520279', '2025-07-22', '07:24:56', '15:32:49', '-5.709329,105.5894964', '-5.709315,105.589523'),
(295, '0086209431', '2025-07-22', '07:28:11', '15:31:25', '-5.7093018,105.5894984', '-5.7093484,105.589682'),
(296, '0094877718', '2025-07-22', '07:27:17', '15:34:25', '-5.709315,105.589523', '-5.7092479,105.5896572'),
(297, '0098857527', '2025-07-22', '07:30:05', '15:32:46', '-5.7077703,105.5891291', '-5.709391,105.5894767'),
(298, '0091932426', '2025-07-22', '07:31:33', '15:32:49', '-5.7092257,105.5895539', '-5.7093068,105.5896994'),
(299, '0099541015', '2025-07-22', '07:25:02', '15:32:17', '-5.7092608,105.5895359', '-5.7092817,105.589625'),
(300, '3099945542', '2025-07-22', '07:26:28', '15:32:45', '-5.7092992,105.5895047', '-5.7092563,105.5896457'),
(301, '0081900319', '2025-07-22', '07:32:08', '15:32:50', '-5.7093205,105.5894871', '-5.7093052,105.5894944'),
(302, '0098553828', '2025-07-22', '07:25:18', '15:33:07', '-5.7093286,105.5894942', '-5.7093146,105.5895288'),
(303, '0071365595', '2025-07-22', '07:28:17', '15:34:20', '-5.709315,105.589523', '-5.7092479,105.5896572'),
(304, '0091251204', '2025-07-22', '07:29:05', '15:32:30', '-5.7077703,105.5891291', '-5.709391,105.5894767'),
(305, '0099294925', '2025-07-22', '07:35:28', '15:33:30', '-5.7092992,105.5895047', '-5.7092563,105.5896457'),
(306, '0089873497', '2025-07-22', '07:27:36', '15:32:35', '-5.7093072,105.5894984', '-5.7092529,105.5896479'),
(307, '0094246794', '2025-07-22', '07:28:48', '15:34:16', '-5.7089631,105.5901704', '-5.7092525,105.5896569'),
(308, '0096586771', '2025-07-22', '07:27:50', '15:33:47', '-5.708971,105.5901591', '-5.7092529,105.5896479'),
(309, '0089840874', '2025-07-22', '07:27:18', '15:33:10', '-5.7093286,105.5894942', '-5.7093146,105.5895288'),
(310, '0101395398', '2025-07-22', '07:29:51', '15:34:37', '-5.709231,105.589549', '-5.7091822,105.5895943'),
(311, '0097337932', '2025-07-22', '07:28:30', '15:33:50', '-5.7092531,105.5896525', '-5.7093052,105.5894944'),
(312, '0093856752', '2025-07-22', '07:25:27', '15:33:45', '-5.7092479,105.5896572', '-5.7092701,105.5896045'),
(313, '0105476640', '2025-07-22', '07:33:39', '15:34:15', '-5.7093052,105.5894944', '-5.7093068,105.5896994'),
(314, '0089592432', '2025-07-22', '07:25:06', '15:32:46', '-5.709054610413271,105.58965315865831', '-5.709391,105.5894767'),
(315, '0107339518', '2025-07-22', '07:29:11', '15:32:50', '-5.7093068,105.5896994', '-5.7092528,105.5896437'),
(316, '0099607211', '2025-07-22', '07:33:48', '15:34:27', '-5.7092707,105.5896307', '-5.7092529,105.5896479'),
(317, '0098376152', '2025-07-22', '07:25:23', '15:32:41', '-5.7092475,105.5896517', '-5.7093204,105.5894905'),
(318, '0099088724', '2025-07-22', '07:28:33', '15:34:28', '-5.7092815,105.5895673', '-5.7093018,105.5894984'),
(319, '0101611112', '2025-07-23', '07:25:27', '15:33:43', '-5.7093068,105.5894946', '-5.7092579,105.589667'),
(320, '0106568573', '2025-07-23', '07:26:32', '15:33:15', '-5.7093068,105.5894946', '-5.7092591,105.5896356'),
(321, '0101710950', '2025-07-23', '07:33:22', '15:34:18', '-5.7093484,105.589682', '-5.709253,105.5896543'),
(322, '0103534987', '2025-07-23', '07:26:30', '15:31:50', '-5.7092531,105.5896525', '-5.7093052,105.5894944'),
(323, '0101096037', '2025-07-23', '07:29:33', '15:32:33', '-5.7092872,105.5895735', '-5.709253,105.5896543'),
(324, '0101694311', '2025-07-23', '07:28:47', '15:34:47', '-5.7092579,105.589667', '-5.7092707,105.5896307'),
(325, '0091878274', '2025-07-23', '07:28:27', '15:31:45', '-5.7092479,105.5896572', '-5.7092701,105.5896045'),
(326, '0105658257', '2025-07-23', '07:29:34', '15:33:16', '-5.7092718,105.5896072', '-5.7092475,105.5896517'),
(327, '0101777199', '2025-07-23', '07:30:37', '15:33:25', '-5.7093048,105.5894962', '-5.7092529,105.5896479'),
(328, '0092360125', '2025-07-23', '07:26:39', '15:32:50', '-5.7093052,105.5894944', '-5.7093068,105.5896994'),
(329, '3093323626', '2025-07-23', '07:25:15', '15:32:45', '-5.709253,105.5896543', '-5.7092701,105.5896045'),
(330, '0094747357', '2025-07-23', '07:27:06', '15:32:46', '-5.709054610413271,105.58965315865831', '-5.709391,105.5894767'),
(331, '0102259036', '2025-07-23', '07:28:11', '15:32:46', '-5.7093068,105.5896994', '-5.7092528,105.5896437'),
(332, '0105478878', '2025-07-23', '07:28:48', '15:32:27', '-5.7092707,105.5896307', '-5.7092529,105.5896479'),
(333, '0094393170', '2025-07-23', '07:29:29', '15:32:46', '-5.7092563,105.5896457', '-5.7092591,105.5896356'),
(334, '0092099112', '2025-07-23', '07:27:00', '15:33:35', '-5.7092696,105.5895918', '-5.7093086,105.5894951'),
(335, '0010867043', '2025-07-23', '07:24:16', '15:34:31', '-5.7092528,105.5896437', '-5.7093294,105.5895036'),
(336, '0105174468', '2025-07-23', '07:26:23', '15:33:41', '-5.7092475,105.5896517', '-5.7093204,105.5894905'),
(337, '0101793240', '2025-07-23', '07:24:33', '15:33:28', '-5.7092815,105.5895673', '-5.7093018,105.5894984'),
(338, '0103632537', '2025-07-23', '07:27:53', '15:34:40', '-5.7093086,105.5894951', '-5.7093297,105.5894983'),
(339, '0123456789', '2025-07-23', '07:28:13', '15:32:51', '-5.7092529,105.5896479', '-5.7089637,105.5901676'),
(340, '0105819387', '2025-07-23', '07:24:32', '15:31:53', '-5.7092638,105.5896256', '-5.7093073,105.5894991'),
(341, '0109479549', '2025-07-23', '07:25:51', '15:31:12', '-5.7092614,105.5896314', '-5.7093021,105.5894987'),
(342, '0107213033', '2025-07-23', '07:30:57', '15:33:35', '-5.7092817,105.589625', '-5.7092531,105.5896525'),
(343, '0095464471', '2025-07-23', '07:29:12', '15:33:46', '-5.709391,105.5894767', '-5.7092579,105.589667'),
(344, '0102211108', '2025-07-23', '07:25:07', '15:34:21', '-5.7090278,105.5893834', '-5.7092701,105.5896045'),
(345, '0109853009', '2025-07-23', '07:27:08', '15:32:36', '-5.7093205,105.5894871', '-5.7093052,105.5894944'),
(346, '0105147718', '2025-07-23', '07:25:21', '15:31:53', '-5.7093289,105.5894944', '-5.7092563,105.5896457'),
(347, '0102580029', '2025-07-23', '07:28:43', '15:33:10', '-5.7093294,105.5895036', '-5.7092707,105.5896307'),
(348, '0102171325', '2025-07-23', '07:29:46', '15:34:08', '-5.7093302,105.589462', '-5.7092529,105.5896479'),
(349, '0093597696', '2025-07-23', '07:30:52', '15:31:30', '-5.7092677,105.5895681', '-5.7092529,105.5896479'),
(350, '0109527713', '2025-07-23', '07:29:57', '15:33:12', '-5.709306,105.5895018', '-5.7092638,105.5896256'),
(351, '0097232106', '2025-07-23', '07:26:59', '15:31:20', '-5.7092531,105.5896525', '-5.7093484,105.589682'),
(352, '0987654321', '2025-07-23', '07:28:04', '15:31:44', '-5.7093204,105.5894905', '-5.7092696,105.5895918'),
(353, '0096177645', '2025-07-23', '07:30:18', '15:34:07', '-5.7093286,105.5894942', '-5.7093146,105.5895288'),
(354, '0109417545', '2025-07-23', '07:27:26', '15:33:40', '-5.7093031,105.5895006', '-5.7090278,105.5893834'),
(355, '0102583486', '2025-07-23', '07:25:37', '15:31:44', '-5.7093297,105.5894983', '-5.7092638,105.5896256'),
(356, '0103296547', '2025-07-23', '07:29:38', '15:34:10', '-5.7093155,105.5895232', '-5.7093068,105.5896994'),
(357, '3099818422', '2025-07-23', '07:27:45', '15:34:49', '-5.709329,105.5894964', '-5.709315,105.589523'),
(358, '0092304352', '2025-07-23', '07:26:15', '15:34:20', '-5.7093021,105.5894987', '-5.7092992,105.5895047'),
(359, '0094345370', '2025-07-23', '07:31:27', '15:32:42', '-5.7093018,105.5894984', '-5.7093484,105.589682'),
(360, '0092704341', '2025-07-23', '07:28:27', '15:34:19', '-5.709302,105.5895008', '-5.709253,105.5896543'),
(361, '0094168494', '2025-07-23', '07:25:39', '15:32:47', '-5.709315,105.589523', '-5.7092479,105.5896572'),
(362, '0081430441', '2025-07-23', '07:29:40', '15:34:15', '-5.7093073,105.5894991', '-5.7093021,105.5894987'),
(363, '0094015906', '2025-07-23', '07:32:26', '15:32:38', '-5.7077703,105.5891291', '-5.709391,105.5894767'),
(364, '0092957269', '2025-07-23', '07:26:49', '15:33:28', '-5.7091822,105.5895943', '-5.7092529,105.5896479'),
(365, '0092233013', '2025-07-23', '07:33:15', '15:32:39', '-5.7092257,105.5895539', '-5.7093068,105.5896994'),
(366, '0093724662', '2025-07-23', '07:25:30', '15:34:49', '-5.7092198,105.5895475', '-5.7092614,105.5896314'),
(367, '0093399893', '2025-07-23', '07:30:06', '15:32:28', '-5.7092608,105.5895359', '-5.7092817,105.589625'),
(368, '0093727814', '2025-07-23', '07:26:10', '15:32:10', '-5.7093059,105.5895', '-5.7093297,105.5894983'),
(369, '0089487900', '2025-07-23', '07:29:38', '15:34:45', '-5.7092992,105.5895047', '-5.7092563,105.5896457'),
(370, '3094044648', '2025-07-23', '07:25:23', '15:33:45', '-5.7092525,105.5896569', '-5.7093286,105.5894942'),
(371, '0086160254', '2025-07-23', '07:29:45', '15:32:34', '-5.7093072,105.5894984', '-5.7092529,105.5896479'),
(372, '0085993137', '2025-07-23', '07:33:34', '15:32:23', '-5.7092563,105.5896457', '-5.7092591,105.5896356'),
(373, '3096021282', '2025-07-23', '07:26:59', '15:33:47', '-5.711711711711712,105.58727777185973', '-5.7092638,105.5896256'),
(374, '0092261112', '2025-07-23', '07:30:34', '15:34:56', '-5.709231,105.589549', '-5.7091822,105.5895943'),
(375, '0099524584', '2025-07-23', '07:23:52', '15:33:56', '-5.7093044,105.5895038', '-5.7093086,105.5894951'),
(376, '0088198807', '2025-07-23', '07:27:54', '15:32:12', '-5.7093055,105.589518', '-5.7093059,105.5895'),
(377, '0094853434', '2025-07-23', '07:25:34', '15:32:17', '-5.7092608,105.5895359', '-5.7093068,105.5896994'),
(378, '3099280751', '2025-07-23', '07:29:16', '15:34:27', '-5.7089631,105.5901704', '-5.7092525,105.5896569'),
(379, '0094163263', '2025-07-23', '07:30:55', '15:33:32', '-5.7089844,105.5901359', '-5.7092707,105.5896307'),
(380, '3092983014', '2025-07-23', '07:25:29', '15:34:18', '-5.708971,105.5901591', '-5.7092529,105.5896479'),
(381, '0083035867', '2025-07-23', '07:34:10', '15:32:50', '-5.7089637,105.5901676', '-5.7092591,105.5896356'),
(382, '0097712432', '2025-07-23', '07:29:38', '15:32:30', '-5.70886,105.5898408', '-5.7093048,105.5894962'),
(383, '0098074989', '2025-07-23', '07:26:10', '15:34:28', '-5.7092934,105.589549', '-5.7093486,105.5896018'),
(384, '0095245597', '2025-07-23', '07:29:30', '15:33:16', '-5.709253,105.5896543', '-5.7092701,105.5896045'),
(385, '3093789914', '2025-07-23', '07:28:20', '15:32:39', '-5.7093286,105.5894942', '-5.7093146,105.5895288'),
(386, '0097493312', '2025-07-23', '07:34:10', '15:34:49', '-5.7092614,105.5896314', '-5.7093021,105.5894987'),
(387, '0097115668', '2025-07-23', '07:32:25', '15:32:50', '-5.709231,105.589549', '-5.7091822,105.5895943'),
(388, '0091396142', '2025-07-23', '07:26:26', '15:32:45', '-5.7093052,105.5894944', '-5.7093068,105.5896994'),
(389, '3098860857', '2025-07-23', '07:27:45', '15:34:10', '-5.7092817,105.589625', '-5.7092531,105.5896525'),
(390, '0088544782', '2025-07-23', '07:29:30', '15:34:10', '-5.709054610413271,105.58965315865831', '-5.709391,105.5894767'),
(391, '0084258667', '2025-07-23', '07:29:38', '15:32:49', '-5.7092563,105.5896457', '-5.7092591,105.5896356'),
(392, '0081716927', '2025-07-23', '07:29:50', '15:34:25', '-5.7092531,105.5896525', '-5.7093052,105.5894944'),
(393, '0091827541', '2025-07-23', '07:35:15', '15:33:49', '-5.7092614,105.5896314', '-5.7093021,105.5894987'),
(394, '0097191432', '2025-07-23', '07:28:16', '15:32:45', '-5.7092638,105.5896256', '-5.7093073,105.5894991'),
(395, '0087769624', '2025-07-23', '07:27:20', '15:33:50', '-5.7093068,105.5894946', '-5.7092591,105.5896356'),
(396, '3093281486', '2025-07-23', '07:29:25', '15:34:38', '-5.7092531,105.5896525', '-5.7093052,105.5894944'),
(397, '0083415365', '2025-07-23', '07:35:10', '15:32:30', '-5.7092579,105.589667', '-5.7092707,105.5896307'),
(398, '0096826400', '2025-07-23', '07:26:29', '15:32:38', '-5.7092718,105.5896072', '-5.7092475,105.5896517'),
(399, '0103553334', '2025-07-23', '07:25:18', '15:32:59', '-5.7093052,105.5894944', '-5.7093068,105.5896994'),
(400, '0095507558', '2025-07-23', '07:30:15', '15:34:27', '-5.709253,105.5896543', '-5.7092701,105.5896045'),
(401, '0099250307', '2025-07-23', '07:23:37', '15:32:33', '-5.7092563,105.5896457', '-5.7092591,105.5896356'),
(402, '0099366914', '2025-07-23', '07:29:03', '15:32:58', '-5.7092696,105.5895918', '-5.7093086,105.5894951'),
(403, '0094670023', '2025-07-23', '07:27:15', '15:34:34', '-5.7092817,105.589625', '-5.7092531,105.5896525'),
(405, '0088977923', '2025-07-23', '07:29:27', '15:32:30', '-5.7090278,105.5893834', '-5.7092701,105.5896045'),
(406, '0095074994', '2025-07-23', '07:30:23', '15:33:56', '-5.7092531,105.5896525', '-5.7093484,105.589682'),
(407, '0099671509', '2025-07-23', '07:27:29', '15:33:36', '-5.7093286,105.5894942', '-5.7093146,105.5895288'),
(408, '0094283192', '2025-07-23', '07:29:55', '15:33:18', '-5.7093297,105.5894983', '-5.7092638,105.5896256'),
(409, '0087520279', '2025-07-23', '07:24:30', '15:34:10', '-5.709329,105.5894964', '-5.709315,105.589523'),
(410, '0086209431', '2025-07-23', '07:28:30', '15:32:56', '-5.7093018,105.5894984', '-5.7093484,105.589682'),
(411, '0094877718', '2025-07-23', '07:26:29', '15:34:30', '-5.709315,105.589523', '-5.7092479,105.5896572'),
(412, '0098857527', '2025-07-23', '07:29:10', '15:32:50', '-5.7077703,105.5891291', '-5.709391,105.5894767'),
(413, '0091932426', '2025-07-23', '07:33:44', '15:32:45', '-5.7092257,105.5895539', '-5.7093068,105.5896994'),
(414, '0099541015', '2025-07-23', '07:28:02', '15:34:30', '-5.7092608,105.5895359', '-5.7092817,105.589625'),
(415, '3099945542', '2025-07-23', '07:24:28', '15:32:37', '-5.7092992,105.5895047', '-5.7092563,105.5896457'),
(416, '0081900319', '2025-07-23', '07:27:08', '15:32:36', '-5.7093205,105.5894871', '-5.7093052,105.5894944'),
(417, '0098553828', '2025-07-23', '07:30:18', '15:34:07', '-5.7093286,105.5894942', '-5.7093146,105.5895288'),
(418, '0071365595', '2025-07-23', '07:22:17', '15:33:25', '-5.709315,105.589523', '-5.7092479,105.5896572'),
(419, '0091251204', '2025-07-23', '07:24:05', '15:33:46', '-5.7077703,105.5891291', '-5.709391,105.5894767'),
(420, '0099294925', '2025-07-23', '07:24:28', '15:32:37', '-5.7092992,105.5895047', '-5.7092563,105.5896457'),
(421, '0089873497', '2025-07-23', '07:25:36', '15:32:31', '-5.7093072,105.5894984', '-5.7092529,105.5896479'),
(422, '0094246794', '2025-07-23', '07:20:48', '15:33:10', '-5.7089631,105.5901704', '-5.7092525,105.5896569'),
(423, '0096586771', '2025-07-23', '07:24:50', '15:32:35', '-5.708971,105.5901591', '-5.7092529,105.5896479'),
(424, '0089840874', '2025-07-23', '07:30:18', '15:34:07', '-5.7093286,105.5894942', '-5.7093146,105.5895288'),
(425, '0101395398', '2025-07-23', '07:24:51', '15:33:26', '-5.709231,105.589549', '-5.7091822,105.5895943'),
(426, '0097337932', '2025-07-23', '07:26:30', '15:31:50', '-5.7092531,105.5896525', '-5.7093052,105.5894944'),
(427, '0093856752', '2025-07-23', '07:28:27', '15:31:45', '-5.7092479,105.5896572', '-5.7092701,105.5896045'),
(428, '0105476640', '2025-07-23', '07:29:39', '15:33:50', '-5.7093052,105.5894944', '-5.7093068,105.5896994'),
(429, '0089592432', '2025-07-23', '07:29:06', '15:33:46', '-5.709054610413271,105.58965315865831', '-5.709391,105.5894767'),
(430, '0107339518', '2025-07-23', '07:30:11', '15:33:46', '-5.7093068,105.5896994', '-5.7092528,105.5896437'),
(431, '0099607211', '2025-07-23', '07:28:48', '15:32:27', '-5.7092707,105.5896307', '-5.7092529,105.5896479'),
(432, '0098376152', '2025-07-23', '07:26:23', '15:33:41', '-5.7092475,105.5896517', '-5.7093204,105.5894905'),
(433, '0099088724', '2025-07-23', '07:24:33', '15:33:28', '-5.7092815,105.5895673', '-5.7093018,105.5894984');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pelanggaran`
--

CREATE TABLE `riwayat_pelanggaran` (
  `id_riwayat` int(11) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `kelompok` varchar(255) NOT NULL,
  `jenis_pelanggaran` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_pelanggaran`
--

INSERT INTO `riwayat_pelanggaran` (`id_riwayat`, `nisn`, `kelompok`, `jenis_pelanggaran`) VALUES
(18, '12345', 'kelompok_c', 'f. Makan didalam kelas (waktu pelajaran)'),
(19, '12345', 'kelompok_c', 'o. Berada dikantin, UKS pada waktu pergantian pelajaran tanpa ijin'),
(20, '12345', 'kelompok_c', 'k. Memakai gelang, kalung, anting-anting bagi pria'),
(21, '12345', 'kelompok_c', 'm. Tidak mengindahkan surat panggilan'),
(22, '12345', 'kelompok_c', 'e. Berpakaian seragam tidak lengkap'),
(23, '12345', 'kelompok_c', 'h. Membuang sampah tidak pada tempatnya'),
(24, '12345', 'kelompok_c', 's. Mengendarai kendaraan di halaman sekolah'),
(25, '12345', 'kelompok_c', 'r. Tidak memakai sepatu hitam pada hari senin, selasa, rabu, dan kamis'),
(26, '12345', 'kelompok_c', 'd. Tidak melakukan tugas piket kelas'),
(28, '12345', 'kelompok_a', 'h. Membawa senjata tajam'),
(29, '12345', 'kelompok_a', 'j. Mengikuti organisasi terlarang'),
(30, '12345', 'kelompok_b', 'j. Merokok disekolah'),
(31, '12345', 'kelompok_b', 'c. Membawa Handphone'),
(32, '12345', 'kelompok_b', 'f. Meloncat pagar'),
(33, '12345', 'kelompok_b', 'e. Melindungi teman yang bersalah'),
(34, '12345', 'kelompok_b', 'd. Membawa buku/gambar/video porno'),
(35, '12345', 'kelompok_b', 'i. Mencorat-coret tembok, pintu, meja, kursi, dengan kata-kata yang tidak semestinya'),
(36, '12345', 'kelompok_b', 'b. Membolos/keluar meninggalkan sekolah tanpa ijin'),
(37, '12345', 'kelompok_c', 'q. Membuat gaduh selama pelaksanaan KBM'),
(38, '12345', 'kelompok_a', 'b. Membawa minum-minuman keras/narkoba');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$GepN6CP3AcloKXUglciQueo2m2/b0AYUhvHhE4hF6EJb4JS6IEtmO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jamsekolah`
--
ALTER TABLE `jamsekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfigurasi_lokasi`
--
ALTER TABLE `konfigurasi_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libur_sekolah`
--
ALTER TABLE `libur_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_izin`
--
ALTER TABLE `pengajuan_izin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`,`tgl_presensi`),
  ADD KEY `presensi_nisn_index` (`nisn`);

--
-- Indexes for table `riwayat_pelanggaran`
--
ALTER TABLE `riwayat_pelanggaran`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `riwayat_pelanggaran_nisn_index` (`nisn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jamsekolah`
--
ALTER TABLE `jamsekolah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konfigurasi_lokasi`
--
ALTER TABLE `konfigurasi_lokasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `libur_sekolah`
--
ALTER TABLE `libur_sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengajuan_izin`
--
ALTER TABLE `pengajuan_izin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=434;

--
-- AUTO_INCREMENT for table `riwayat_pelanggaran`
--
ALTER TABLE `riwayat_pelanggaran`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
