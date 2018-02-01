-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Feb 2018 pada 13.36
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES
(1, 'admin'),
(2, 'Tim Kesiswaan'),
(3, 'Tim Kurikulum'),
(4, 'Guru'),
(5, 'Yayasan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `id_surat_masuk` int(11) NOT NULL,
  `kepada_kat` int(11) NOT NULL,
  `kepada_id` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `status_surat` int(1) NOT NULL DEFAULT '0',
  `tanggapan` text NOT NULL,
  `id_parent_disposisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `id_surat_masuk`, `kepada_kat`, `kepada_id`, `catatan`, `status_surat`, `tanggapan`, `id_parent_disposisi`) VALUES
(2, 1, 2, 2, 'Mohon Dipilah', 2, 'sy tidak bisa', 0),
(3, 1, 3, 5, 'mohon di kerjakan', 2, 'oke', 2),
(4, 3, 3, 5, 'mohon di urus', 2, 'sy lagi tidak bisa', 0),
(5, 3, 3, 7, 'mohon di kerjakan', 2, 'oke, sy terima', 4),
(6, 1, 3, 8, 'kerjakan', 0, '', 0),
(7, 5, 2, 2, 'Perihal UNBK pak, deadline dekat', 2, 'saya lagi diluar kota', 0),
(8, 5, 3, 11, 'arya, selesaikan rancangannya. bahas dengan saya besok pukul 8', 2, 'baik pak.', 7),
(9, 1, 6, 6, 'aaaaaaaaaaaaa', 2, 'oke', 0),
(10, 1, 2, 2, 'mohon di rundingkan', 2, 'ok. segera', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `level`) VALUES
(1, 'admin', 0),
(2, 'Kepala Sekolah', 1),
(3, 'Waka Kurikulum', 2),
(5, 'Waka Kesiswaan', 2),
(6, 'Kesiswaan 1', 3),
(7, 'Kesiswaan 2', 3),
(8, 'Kesiswaan 3', 3),
(9, 'Kesiswaan 4', 3),
(10, 'Kesiswaan 5', 3),
(11, 'Guru A1', 4),
(12, 'Guru A2', 4),
(13, 'Guru A3', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `id_jenis_surat` int(11) NOT NULL,
  `jenis_surat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_surat`
--

INSERT INTO `jenis_surat` (`id_jenis_surat`, `jenis_surat`) VALUES
(1, 'Perizinan'),
(2, 'Seminar'),
(3, 'UNBK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `kata_sandi` tinytext NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_depan`, `nama_belakang`, `kata_sandi`, `id_jabatan`, `id_bagian`) VALUES
(1, 'Yusron', 'Imtinan', '52b851e6dffbc3b9cc8ccc36e34eceda', 1, 1),
(2, 'Hendy', 'Ardianto', 'c41888ae5b3b57b5c829587463f49348', 2, 5),
(3, 'Abi', 'Rahman', '19a9228dbbbe3b613190002e54dc3429', 1, 1),
(4, 'Karin', 'Widhia', '5b591ed6a915f05e3629a1b5156ad8e7', 1, 1),
(5, 'Wafiq', 'Fanani', '3bbbe5b5e785f30ecce8350f11190b73', 5, 2),
(6, 'Rizky', 'Aji', '42bc777e94d8f0c2f65ee631f67085d1', 6, 2),
(7, 'Dika', 'Aji', '24d4d64eaa2d76f27268012dbcfab766', 7, 2),
(8, 'Aska', 'Ivan', 'fbb4441579423cc9b6a0a9118003d06f', 8, 2),
(9, 'Khofifah', 'khofifah', 'da49279d5db707830fd6f6bba4af4ef2', 9, 2),
(11, 'Arya', 'Bayu', '8f80598eaadc75b6b657fdca55cd8f96', 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(15) NOT NULL,
  `no_agenda` varchar(15) NOT NULL,
  `nomor_surat` varchar(15) NOT NULL,
  `id_jenis_surat` int(15) NOT NULL,
  `pengirim` text NOT NULL,
  `penerima` text NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `perihal` text NOT NULL,
  `file_surat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `no_agenda`, `nomor_surat`, `id_jenis_surat`, `pengirim`, `penerima`, `tanggal_kirim`, `perihal`, `file_surat`) VALUES
(1, 'adminTestss', '200900admin', 2, 'smk telkom bandung', 'kepala sekolah', '2018-01-27', 'permintaan izin study tour', 'UH_TEKS_ULASAN.pdf'),
(2, '819370keluar', '29129819', 1, 'guru bk', 'guru bk bandung', '2018-01-31', 'murid nakal', '1.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(15) NOT NULL,
  `no_agenda` varchar(15) NOT NULL,
  `nomor_surat` varchar(15) NOT NULL,
  `id_jenis_surat` int(11) NOT NULL,
  `pengirim` text NOT NULL,
  `penerima` text NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `perihal` text NOT NULL,
  `file_surat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `no_agenda`, `nomor_surat`, `id_jenis_surat`, `pengirim`, `penerima`, `tanggal_kirim`, `tanggal_terima`, `perihal`, `file_surat`) VALUES
(1, 'adminTest', '200900admin', 1, 'smk telkom bandung', 'kepala sekolah', '2018-01-20', '2018-01-27', 'permintaan izin study tour', 'surattest.jpg'),
(3, '819370agenda', '9183012839', 1, 'testkirim1', 'testterima1', '2018-11-30', '2018-12-30', 'ajuan', 'PERSIAPAN_UAS_BINDO_2017.pdf'),
(4, '21234555', '32432423', 1, 'kepsek telkom bandung', 'kepsek', '2018-01-19', '2018-01-27', 'izin study', 'UH_Peribahasa-_.pdf'),
(5, '100/2018/VI/SMK', '2018/UNBK/MKLT/', 3, 'DINAS PENDIDIKAN MALANG', 'kepala sekolah', '2018-01-20', '2018-01-27', 'UNBK SIMULASI', 'MODUL_BAHASA_INDONESIA_XII_TEKS_CERITA_SEJARAH.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `id_surat_masuk` (`id_surat_masuk`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`id_jenis_surat`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_bagian` (`id_bagian`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`),
  ADD KEY `id_jenis_surat` (`id_jenis_surat`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`),
  ADD KEY `id_jenis_surat` (`id_jenis_surat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id_jenis_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`id_surat_masuk`) REFERENCES `surat_masuk` (`id_surat_masuk`);

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`),
  ADD CONSTRAINT `pengguna_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Ketidakleluasaan untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_ibfk_1` FOREIGN KEY (`id_jenis_surat`) REFERENCES `jenis_surat` (`id_jenis_surat`);

--
-- Ketidakleluasaan untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `surat_masuk_ibfk_1` FOREIGN KEY (`id_jenis_surat`) REFERENCES `jenis_surat` (`id_jenis_surat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
