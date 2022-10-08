-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Okt 2022 pada 21.35
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekinerja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `atasan`
--

CREATE TABLE `atasan` (
  `id_atasan` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_atasan` varchar(255) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_unit_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `atasan`
--

INSERT INTO `atasan` (`id_atasan`, `nip`, `nama_atasan`, `id_jabatan`, `id_unit_kerja`) VALUES
(7, '1911523007', 'Antono', 1, 1),
(8, '1911523098 ', 'Rere', 4, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Pahlawan'),
(2, 'Pahlawak'),
(3, 'Kepala Pundak'),
(4, 'Lutut Kaki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kinerja`
--

CREATE TABLE `kinerja` (
  `id_kinerja` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `waktu_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_harian`
--

CREATE TABLE `laporan_harian` (
  `id_laporan_harian` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kegiatan_harian` varchar(125) NOT NULL,
  `id_skp_bulanan` int(11) NOT NULL,
  `id_skp_tahunan` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `satuankuantitas` varchar(20) NOT NULL,
  `status_laporan_harian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan_harian`
--

INSERT INTO `laporan_harian` (`id_laporan_harian`, `tanggal`, `kegiatan_harian`, `id_skp_bulanan`, `id_skp_tahunan`, `kuantitas`, `satuankuantitas`, `status_laporan_harian`) VALUES
(6, '2022-10-12', 'Membuat Tabel', 2, 3, 1, 'Surat', 'Belum Disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `id_unit_kerja` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_atasan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skp_bulanan`
--

CREATE TABLE `skp_bulanan` (
  `id_skp_bulanan` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `id_skp_tahunan` int(11) NOT NULL,
  `kegiatan_bulanan` varchar(125) NOT NULL,
  `target_kuantitas` int(11) NOT NULL,
  `satuan_kuantitas` varchar(20) NOT NULL,
  `target_waktu` varchar(20) NOT NULL,
  `biaya` int(11) NOT NULL,
  `status_skp_bulanan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skp_bulanan`
--

INSERT INTO `skp_bulanan` (`id_skp_bulanan`, `tahun`, `bulan`, `id_skp_tahunan`, `kegiatan_bulanan`, `target_kuantitas`, `satuan_kuantitas`, `target_waktu`, `biaya`, `status_skp_bulanan`) VALUES
(2, 2022, 'Februari', 4, 'Mengangsur DB', 2, 'Dokumen', '28', 0, 'Belum Disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skp_tahunan`
--

CREATE TABLE `skp_tahunan` (
  `id_skp_tahunan` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `kegiatan_tahunan` varchar(125) NOT NULL,
  `target_kuantitas` int(11) NOT NULL,
  `satuan_kuantitas` varchar(20) NOT NULL,
  `target_kualitas` int(11) NOT NULL,
  `target_waktu` int(11) NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `biaya` int(11) NOT NULL,
  `status_skp_tahunan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skp_tahunan`
--

INSERT INTO `skp_tahunan` (`id_skp_tahunan`, `tahun`, `kegiatan_tahunan`, `target_kuantitas`, `satuan_kuantitas`, `target_kualitas`, `target_waktu`, `periode_awal`, `periode_akhir`, `biaya`, `status_skp_tahunan`) VALUES
(3, 2022, 'Membuat Database', 3, 'Dokumen', 100, 2, '2022-09-01', '2022-12-01', 0, 'Belum Disetujui'),
(4, 2022, 'Membuat Aplikasi Samsat', 1, 'Dokumen', 100, 2, '2022-10-01', '2022-10-29', 0, 'Belum Disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id_unit_kerja` int(11) NOT NULL,
  `unit_kerja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit_kerja`
--

INSERT INTO `unit_kerja` (`id_unit_kerja`, `unit_kerja`) VALUES
(1, 'Evos'),
(2, 'Geek'),
(3, 'Ngab Rio'),
(4, 'Underrated');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `email`, `no_telp`, `level`) VALUES
(1, 'Dewi Kartika', 'admin', 'admin', 'dewi@gmail.com', '082267369831', 'admin'),
(2, 'lisca', 'lisca', 'lisca', 'lisca@gmail.com', '0208492836574', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `atasan`
--
ALTER TABLE `atasan`
  ADD PRIMARY KEY (`id_atasan`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_bidang` (`id_unit_kerja`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `kinerja`
--
ALTER TABLE `kinerja`
  ADD PRIMARY KEY (`id_kinerja`),
  ADD KEY `uraian_kegiatan` (`id_kegiatan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `laporan_harian`
--
ALTER TABLE `laporan_harian`
  ADD PRIMARY KEY (`id_laporan_harian`),
  ADD KEY `id_skp_bulanan` (`id_skp_bulanan`),
  ADD KEY `laporan_harian_ibfk_2` (`id_skp_tahunan`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `atasan` (`id_atasan`),
  ADD KEY `id_unit_kerja` (`id_unit_kerja`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `skp_bulanan`
--
ALTER TABLE `skp_bulanan`
  ADD PRIMARY KEY (`id_skp_bulanan`),
  ADD KEY `id_skp_tahunan` (`id_skp_tahunan`);

--
-- Indeks untuk tabel `skp_tahunan`
--
ALTER TABLE `skp_tahunan`
  ADD PRIMARY KEY (`id_skp_tahunan`);

--
-- Indeks untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id_unit_kerja`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `atasan`
--
ALTER TABLE `atasan`
  MODIFY `id_atasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kinerja`
--
ALTER TABLE `kinerja`
  MODIFY `id_kinerja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan_harian`
--
ALTER TABLE `laporan_harian`
  MODIFY `id_laporan_harian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `skp_bulanan`
--
ALTER TABLE `skp_bulanan`
  MODIFY `id_skp_bulanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `skp_tahunan`
--
ALTER TABLE `skp_tahunan`
  MODIFY `id_skp_tahunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id_unit_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `atasan`
--
ALTER TABLE `atasan`
  ADD CONSTRAINT `atasan_ibfk_1` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `atasan_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kinerja`
--
ALTER TABLE `kinerja`
  ADD CONSTRAINT `kinerja_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kinerja_ibfk_2` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan_harian`
--
ALTER TABLE `laporan_harian`
  ADD CONSTRAINT `laporan_harian_ibfk_1` FOREIGN KEY (`id_skp_bulanan`) REFERENCES `skp_bulanan` (`id_skp_bulanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_harian_ibfk_2` FOREIGN KEY (`id_skp_tahunan`) REFERENCES `skp_tahunan` (`id_skp_tahunan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_atasan`) REFERENCES `atasan` (`id_atasan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_3` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skp_bulanan`
--
ALTER TABLE `skp_bulanan`
  ADD CONSTRAINT `skp_bulanan_ibfk_1` FOREIGN KEY (`id_skp_tahunan`) REFERENCES `skp_tahunan` (`id_skp_tahunan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
