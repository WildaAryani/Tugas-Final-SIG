-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2024 pada 07.37
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sigg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `lat_lng` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `lat_lng`, `nama`, `kategori`, `keterangan`, `gambar`) VALUES
(21, '-4.8221339,122.7149296', 'Apotek Mynna', 'Katobu', '08.00-22.00', 'Screenshot (156).png'),
(22, '-4.8227373,122.7208969', 'Apotek Sejahtera Medika', 'Katobu', '08.00-22.00', 'Screenshot (163).png'),
(23, '-4.825881,122.7123694', 'Apotek JF2', 'Katobu', '08.00-22.00', 'Screenshot (158).png'),
(24, '-4.8281129,122.7182787', 'APOTEK NURUL FARMA', 'Katobu', '08.00-22.00', '{75763228-2206-49E0-AD57-45F5AD966D48}.png.jpg'),
(26, '-4.8333081,122.7258833', 'Apotek Alqirani Farma', 'Katobu', '08.00-22.00', '{70E79AA8-693C-4B87-BE4F-D00F9CF65A62}.png.jpg'),
(27, '-4.8339729,122.724858', 'APOTEK SEHAT 24 AHMAD YANI', 'Katobu', '08.00-22.00', '3.jpg'),
(28, '-4.8073376,122.6992472', 'Apotek Lestari', 'Batalaiworu', '08.00-22.00', 'Screenshot (150).png'),
(29, '-4.8062257,122.7090319', 'Apotek Abdi Utama', 'Batalaiworu', '08.00-22.00', '4.jpg'),
(30, '-4.8225348,122.7156912', 'APOTIK SEHAT 24 (Md Sabara)', 'Katobu', '08.00-22.00', '5.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'aaa', '$2y$10$n7RJEMP91E0ft.5fTS61GOC1bAAXEUn2lUwk/jqbNnJtf7/bmOP5S'),
(2, 'titin', '$2y$10$JU0AEnMiVDo.pk4anX0wHe6nUjJPRKuJwBSGhUHIQhn7AfrIX7SqW'),
(3, 'bijaa', '$2y$10$bt5CRkltHOAibXvbMCOdQuaGyeWNvd6cfKyu9oFF6K.msOhTCFW3e');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
