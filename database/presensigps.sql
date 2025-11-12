-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Bulan Mei 2025 pada 18.00
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

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
-- Struktur dari tabel `jamsekolah`
--

CREATE TABLE `jamsekolah` (
  `id` int(10) UNSIGNED NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jamsekolah`
--

INSERT INTO `jamsekolah` (`id`, `jam_masuk`, `jam_pulang`) VALUES
(1, '07:30:00', '16:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` char(255) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
('TKJ', 'Teknik Komputer dan Jaringan'),
('TSM', 'Teknik Sepeda Motor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi_lokasi`
--

CREATE TABLE `konfigurasi_lokasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `lokasi_sekolah` varchar(255) NOT NULL,
  `radius` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konfigurasi_lokasi`
--

INSERT INTO `konfigurasi_lokasi` (`id`, `lokasi_sekolah`, `radius`) VALUES
(1, '-5.390264357938437, 105.24105702588515', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `libur_sekolah`
--

CREATE TABLE `libur_sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `murid`
--

CREATE TABLE `murid` (
  `nisn` char(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kode_jurusan` char(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `murid`
--

INSERT INTO `murid` (`nisn`, `nama_lengkap`, `jenis_kelamin`, `kelas`, `no_hp`, `foto`, `kode_jurusan`, `password`) VALUES
('12345', 'Muhammad Duta Faturrahman', 'Laki-laki', 'XII', '088975660188', '12345.png', 'TKJ', '$2y$10$0sKsTzWko2dnnvOPcJ831ut5yne4mq4zxM8bZoESzgKnAqA8jxlgG'),
('12348', 'Rina Handayani', 'Perempuan', 'X', '083175371060', '12348.jpeg', 'TKJ', '$2y$10$75loT8Niz6MfO9WAQe9GB.w40e69c7L2crlESBd9uUWZAdOXvDpDG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_izin`
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
-- Dumping data untuk tabel `pengajuan_izin`
--

INSERT INTO `pengajuan_izin` (`id`, `nisn`, `tgl_izin`, `status`, `keterangan`, `status_approved`) VALUES
(1, '12345', '2025-04-15', 'i', 'Ada urusan keluarga pergi keluar kota', '2'),
(2, '12345', '2025-07-25', 's', 'Sedang masuk RS menjalani perawatan sakit tipes', '1'),
(3, '12348', '2025-07-25', 'i', 'Menghadiri pemakaman nenek', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `tgl_presensi` date NOT NULL,
  `jam_in` time DEFAULT NULL,
  `jam_out` time DEFAULT NULL,
  `lokasi_in` varchar(255) DEFAULT NULL,
  `lokasi_out` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id`, `nisn`, `tgl_presensi`, `jam_in`, `jam_out`, `lokasi_in`, `lokasi_out`) VALUES
(72, '12345', '2025-05-19', '07:00:40', '16:01:19', '-5.390264357938437, 105.24105702588515', '-5.390264357938437, 105.24105702588515'),
(73, '12348', '2025-05-19', '07:31:00', '16:02:19', '-5.390264357938437, 105.24105702588515', '-5.390264357938437, 105.24105702588515');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pelanggaran`
--

CREATE TABLE `riwayat_pelanggaran` (
  `id_riwayat` int(11) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `kelompok` varchar(255) NOT NULL,
  `jenis_pelanggaran` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayat_pelanggaran`
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
(38, '12345', 'kelompok_a', 'b. Membawa minum-minuman keras/narkoba'),
(43, '12348', 'kelompok_a', 'b. Membawa minum-minuman keras/narkoba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$GepN6CP3AcloKXUglciQueo2m2/b0AYUhvHhE4hF6EJb4JS6IEtmO');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jamsekolah`
--
ALTER TABLE `jamsekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konfigurasi_lokasi`
--
ALTER TABLE `konfigurasi_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `libur_sekolah`
--
ALTER TABLE `libur_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan_izin`
--
ALTER TABLE `pengajuan_izin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`,`tgl_presensi`),
  ADD KEY `presensi_nisn_index` (`nisn`);

--
-- Indeks untuk tabel `riwayat_pelanggaran`
--
ALTER TABLE `riwayat_pelanggaran`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `riwayat_pelanggaran_nisn_index` (`nisn`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jamsekolah`
--
ALTER TABLE `jamsekolah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi_lokasi`
--
ALTER TABLE `konfigurasi_lokasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `libur_sekolah`
--
ALTER TABLE `libur_sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_izin`
--
ALTER TABLE `pengajuan_izin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pelanggaran`
--
ALTER TABLE `riwayat_pelanggaran`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
