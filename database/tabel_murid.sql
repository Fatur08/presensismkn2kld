-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2025 at 04:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `nisn` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jurusan` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
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
('3093323626', 'Dewi Ayu Ariska', 'Perempuan', 'X', '085766698404', '3093323626.png', 'TKJ 1', '$2y$10$jw1R.jTyiAG70VQq0IeKdujhwmzFpqfWCMUiXfDy7J9080GQNil62'),
('0094747357', 'Fabian Alvis N', 'Laki-laki', 'X', '085766698404', '0094747357.jpg', 'TKJ 1', '$2y$10$lWGYInxJLz79LTqntz/3Ie5H4csa8zBxjLieEiQ3XaizS6ayrvgMy'),
('0102259036', 'Fathul Ikhsan Alfakri', 'Laki-laki', 'X', '085766698404', '0102259036.jpg', 'TKJ 1', '$2y$10$D/JinUwFSnsJHsEJmUASMeu1QTUNksaaV21tGgTQiK71bnbka01qG'),
('0094393170', 'Fauzy Rabani', 'Laki-laki', 'X', '083846827542', '0094393170.jpg', 'TKJ 1', '$2y$10$jln62UA07w.tAGmv28RGhOacuFmqyL/haJLsYdwch2Ql35u7VPtPq'),
('0105478878', 'Galang Putra Hidayat', 'Laki-laki', 'X', '085766698404', '0105478878.webp', 'TKJ 1', '$2y$10$3aOCmnH2sjPXYm9ybpjE6OSucYXd.pDjAJaSEgbWHjoF7M8h2VOtK'),
('0092099112', 'Ghiyats Zaky Zikrillah', 'Laki-laki', 'X', '085766698404', '0092099112.jpg', 'TKJ 1', '$2y$10$.pRJwuIOQjw/VDoazOQKeO5kg7FFysByN0zaarp/s9WgrjQouPRoi'),
('0010867043', 'Hanfala Ikram Syarezi', 'Laki-laki', 'X', '085766698404', '0010867043.jpg', 'TKJ 1', '$2y$10$cKhuFKDoY/6eHXHJ8CrgyejczRql5mv/XJaAE6FkH/N01Om79VM/G'),
('0105174468', 'M. Gilang Pratama', 'Laki-laki', 'X', '085766698404', '0105174468.jpg', 'TKJ 1', '$2y$10$d6sUC5kdbg8bVsBkOOBCxOs0GhwoLloNAWFXkYpDnWSRhzQ7uYpi2'),
('0101793240', 'Melita Ananda', 'Perempuan', 'X', '085766698404', '0101793240.jpg', 'TKJ 1', '$2y$10$fl9YCSPJK8GENyJ9kKHIPePDLbofZXlQgk/I/LvLgTfMATvvUAxoi'),
('0103632537', 'Muhammad Abdul Rodzaki', 'Laki-laki', 'X', '085766698404', '0103632537.jpg', 'TKJ 1', '$2y$10$8VEcSA7snt32SmBbA6.OqunAx5iJsqkMtYxrPK.IvbMb8Hk0mDL52'),
('0123456789', 'Muhammad Aqil Fulgari', 'Laki-laki', 'X', '085766698404', '0123456789.jpg', 'TKJ 1', '$2y$10$K9SYAz4sE4k0HETM1Li5nuxqLe.CapkeF.QeWQTWBh6LOvEBYEC4q'),
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
('0123456789', 'Muhammad Aqil Fulgari', 'Perempuan', 'X', '085766698404', '0123456789.jpg', 'TKJ 1', '$2y$10$8lZTO2CLbNSsRz7G16epXuGSROZZdQx5PjqWTHimC0cSqQRVyUr/6'),
('0096177645', 'Syifa Selfiani', 'Perempuan', 'X', '085766698404', '0096177645.jpeg', 'TKJ 1', '$2y$10$nO.XCIQpkvF6hL8vRpc62.NPByWvB73g1zzTtz28smuxOluRB5oAK'),
('0109417545', 'Vaneszya Febri Eka Putri', 'Perempuan', 'X', '085766698404', '0109417545.jpeg', 'TKJ 1', '$2y$10$tZhLMxxVVrglFEPu9/D8fupUuAXmEUu89BW6Gpz7pD7VqQlmx3xJK'),
('0102583486', 'Zahira Alzena Tanjung', 'Perempuan', 'X', '085766698404', '0102583486.jpg', 'TKJ 1', '$2y$10$l2JveQzZyUK3UZpNrrkKNuwmrhSwEePNaqhHVtkUL0On9r6WZ/PqC'),
('0103296547', 'Zahratul Ayunda', 'Perempuan', 'X', '085766698404', '0103296547.jpg', 'TKJ 1', '$2y$10$4C85t2QlrE8EW3jx9Ji49uUtW.1IplGoEfJQTe8YbUBIIPqOjYQmG'),
('3099818422', 'Ageng Bagus Yulianto', 'Laki-laki', 'XI', '085609940017', '3099818422.jpg', 'TKJ 1', '$2y$10$iqbX873zgwSqyK9KgnbLSOZVLs6asdzoVI34kDo3IRrj0jEnsVCtm'),
('0092304352', 'Almira Zahra Sopiya', 'Perempuan', 'XI', '085766698404', '0092304352.jpeg', 'TKJ 1', '$2y$10$S1soYbW.wH.5NkfBLO7zeeCEZqww.iBvrcq7yI4fjj0BphgpoSQI.'),
('0094345379', 'Amel Adelia', 'Perempuan', 'XI', '085709052372', '0094345370.jpeg', 'TKJ 1', '$2y$10$/UhBUcIaSFZ93/tvSlx9meBOZJGBlyGIhBOPp0jEVZPrUZkMMPcui'),
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
('3094044648', 'Heru Tri Budiman', 'Laki-laki', 'XI', '082379287780', '3094044648.jpg', 'TKJ 1', '$2y$10$CAyFGHpaq.nXcnUtny/fSO77GrLxAT0cnwj4tUQWCElmBHXN65oPe'),
('0086160254', 'Hilman Fadhli', 'Laki-laki', 'XI', '85758198894', '0086160254.jpg', 'TKJ 1', '$2y$10$QfXBotp75UsLCUiG5hsMFO1kazU/7WF8/NluCEo9E9b.Lb5D2thju'),
('3096021282', 'Imam Ali Reza', 'Laki-laki', 'XI', '085381950809', '3096021282.jpeg', 'TKJ 1', '$2y$10$6fS6ESvzHAPia08ODQPoF.zwH3UPKGi8j7ZNZ0U3RyqBnOvLAlY8O'),
('0092261112', 'Khairul Umam', 'Laki-laki', 'XI', '+62 838-4629-7920', '0092261112.jpg', 'TKJ 1', '$2y$10$R7pQnJq8xbyAwnqCsy71C.OE5UkyMxFYsqgvkIXJnXxiixpIWHTjm'),
('0099524584', 'Lezia Dwi Yanti', 'Perempuan', 'XI', '083890275158', '0099524584.jpg', 'TKJ 1', '$2y$10$cPcZFPiILMhKxLTeU2A3yOZww9/Jsd7oecFNiBetaPyd6kBVaQ74a'),
('0088198807', 'Mastuni', 'Laki-laki', 'XI', '083874757629', '0088198807.jpg', 'TKJ 1', '$2y$10$ZNZXSSnxyWIARaY418xJ.e2ZiJRyCzAQt5Ch7a4xZMb/zLZYAobTW'),
('0094853434', 'Mila Safitri', 'Perempuan', 'XI', '083823328404', '0094853434.jpg', 'TKJ 1', '$2y$10$BYUNcQ.fjZSVQsEAGqtF3.XG.fEs6VWakgnmVr7CgzagTY7Kjtrlq'),
('3099280751', 'Muhammad Alfatih', 'Laki-laki', 'XI', '082297109771', '3099280751.jpg', 'TKJ 1', '$2y$10$9odVzS5SQDRhbBY/wP7VtOykiIBJq55ITeEZwaOdd2sqPcoL8P3C6'),
('0094163263', 'Muhammad Alkhadaffi Supi', 'Laki-laki', 'XI', '085769952734', '0094163263.jpg', 'TKJ 1', '$2y$10$0nTo/7HcxE/l4/tbEj.i1O87QXVess/zKauWRPl.bRElT3ZSEkS2.'),
('3092983014', 'Muhammad Andreatama', 'Laki-laki', 'XI', '088286336332', '3092983014.webp', 'TKJ 1', '$2y$10$J22pj5DWsTkxlFYd.Qqcfe4l23tpJVNyCfLp8S08C.blFjYAMw8Bi'),
('0083035867', 'Muhammad Habil Al Fathir', 'Laki-laki', 'XI', '083822332106', '0083035867.jpeg', 'TKJ 1', '$2y$10$MEd5xR2mxJkrtAgnrsC8beXRUGajRgyt5ZZxsUHFUMeZaflyNZGeq'),
('0097712432', 'Muhammad Nurkholis Majid', 'Laki-laki', 'XI', '83862353892', '0097712432.jpg', 'TKJ 1', '$2y$10$3LgKih7n9GJFl3YnDnKyQ.jGaV59q05eYr8LbWZL9C/fC4ZbPR.ki'),
('0085993137', 'Nur Shila Ismarani', 'Perempuan', 'XI', '083170046077', '0085993137.jpg', 'TKJ 1', '$2y$10$tM5RMCtMz7zDzq42ybiJ4OIRbMKmcrvxvnrMKRECyvGQTAvbNAmQC'),
('0098074989', 'Nursila', 'Perempuan', 'XI', '085658983043', '0098074989.jpg', 'TKJ 1', '$2y$10$A6KfzR/K7SkHSOgU/jDogust7gTBIdt6mWCI3Z8/vdMOoc/UgqU7m'),
('0095245597', 'Prastian Hugo Albani', 'Laki-laki', 'XI', '083193616668', '0095245597.jpg', 'TKJ 1', '$2y$10$7ii81umvfbRQqGSVUesfm.umy/Buz88DX3.IkzXsrxo3ROR8p6keW'),
('3093789914', 'Raka Pratama', 'Laki-laki', 'XI', '085766698404', '3093789914.jpeg', 'TKJ 1', '$2y$10$B.Y5Z/ZK1mCr6S/MXn6dOOpJ4QvN3/t2l2j6qGTthEMpSAp9aLsca'),
('0097493312', 'Riswar Apriadi', 'Laki-laki', 'XI', '838-3038-4990', '0097493312.jpg', 'TKJ 1', '$2y$10$zAcaI10R0zq9h5FGd/yyPuh.O59mdk.5m5uNXp.f9Pg4SSpj.oLiG'),
('0097115668', 'Sekar Dhea Pramesti Adi Hartono', 'Perempuan', 'XI', '085279694219', '0097115668.jpg', 'TKJ 1', '$2y$10$whzJhB5sWoDNAX116BUAieDT7hKxYmuqmJlsPjrjnAwIbAF1PKJ/K'),
('0091396142', 'Syifa Fauziyah', 'Perempuan', 'XI', '085267994924', '0091396142.jpg', 'TKJ 1', '$2y$10$ttS2wejJoG/qNNavpfdZDe0LC5McKbTHi13tPXaqPWSp7U9eS.QL6'),
('3098860857', 'Tegar Satria Putra', 'Laki-laki', 'XI', '0895417320668', '3098860857.png', 'TKJ 1', '$2y$10$fLSwZyunHfzHtmeT8nXxj.jJC5OT4q5dQbgkRDnqYMDExN5mS3rwy'),
('0088544782', 'Valladino Javier Anjatra', 'Laki-laki', 'XI', '+62 852-7991-5957', '0088544782.jpg', 'TKJ 1', '$2y$10$2zfkBUHqFZhlBZWiOKWpa.1ahNfItjfC2v7L.vEfEYTzsgEoNVtj.'),
('0084258667', 'Wahyu Safitri', 'Perempuan', 'XI', '085758832545', '0084258667.jpg', 'TKJ 1', '$2y$10$hn6gMfLjeezKDnmdYmQ/ZOdLPDDKSZCmjIb8nII79BGwv5hgk0WUC'),
('0081716927', 'Yoda Nopriyadi', 'Laki-laki', 'XI', '085643720511', '0081716927.jpg', 'TKJ 1', '$2y$10$q4bwCHUBFxKUNvguZVRwKu3ZXLQRIXIBsoSfS/IWuun9wVZTWxlIG'),
('0091827541', 'Zamza Marya', 'Perempuan', 'XI', '085766698404', '0091827541.jpg', 'TKJ 1', '$2y$10$84GlchQAC5OQcRHX/2Gsf.50ov0sr/t3G8AN1iGfTc7htgP7DBLRS'),
('0097191432', 'Zepira Saputri', 'Perempuan', 'XI', '083168934149', '0097191432.jpg', 'TKJ 1', '$2y$10$PWUczQk/2EuBhB9rlRzzJu8O3EoTurv4Xo5SNw0QZ/VRByzwC7rYG'),
('0087769624', 'Abi Malik', 'Laki-laki', 'XI', '085766698404', '0087769624.jpeg', 'TKJ 2', '$2y$10$bC/050l.O3zdI6WZmRG.Z.DNqNHDjOn/3eLBoKEVPBgP6/n2ZuvN6'),
('3093281486', 'Ahmad Faizal', 'Laki-laki', 'XI', '085766698404', '3093281486.jpeg', 'TKJ 2', '$2y$10$iRgBLgK8NcFZwjrvPNH1XOVJtg4NtiTLBTjdZJrqqi575s5A9VKVW'),
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
('3099945542', 'Lizam Rhaditya', 'Laki-laki', 'XI', '085766698404', '3099945542.jpeg', 'TKJ 2', '$2y$10$ervLJ7P7OWpOkslqnCz6jeLyWAdpmNSO7VEKM115w7Xh2KkRfT2Fu'),
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
('0099088724', 'Yuanda Anfaqi', 'Laki-laki', 'XI', '085766698404', '0099088724.jpeg', 'TKJ 2', '$2y$10$F8Ivk7cSAUybC55nKDfISOKHs/H0Qwhl.2aC5.nhJUMCIgaxu46Xe');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
