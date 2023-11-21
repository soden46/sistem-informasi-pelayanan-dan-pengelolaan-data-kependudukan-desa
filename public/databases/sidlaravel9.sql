-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Des 2022 pada 20.21
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
-- Database: `sidlaravel9`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggotas`
--

CREATE TABLE `anggotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lembaga_id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `namaAnggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamatAnggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikanAnggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaanAnggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoAnggota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggotas`
--

INSERT INTO `anggotas` (`id`, `lembaga_id`, `jabatan_id`, `namaAnggota`, `alamatAnggota`, `pendidikanAnggota`, `pekerjaanAnggota`, `fotoAnggota`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'H. Ahmad Said Wahyudi, S.H', 'Jln Pelita 1', 'Sarjana S1 Hukum', 'wirausaha', NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(2, 1, 2, 'Jumal, S.T', 'Jln Pelita 2', 'Sarjana S1 Teknik Informatika', 'wirausaha', NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(3, 1, 3, 'Bahrul Huda', 'Jln Pelita 2', '-', 'wirausaha', NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(4, 1, 4, 'Rina Marlina', 'Jln Pelita 2', '-', 'wirausaha', NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(5, 1, 5, 'H. Ahmad Afipudin', 'Jln Pelita 2', '-', 'wirausaha', NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(6, 1, 6, 'Samsu', 'Jln Pelita 6', '-', 'wirausaha', NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(7, 1, 7, 'Yanti, S.P', 'Jln Pelita 2', 'Sarjana S1 Pertanian', 'wirausaha', NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(8, 1, 8, 'Yulia Setiawati', 'Jln Pelita 2', '-', 'wirausaha', NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(9, 1, 9, 'Sukron', 'Jln Pelita 12', '-', 'wirausaha', NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(10, 2, 10, 'Muhammad Agung Sholihhudin', 'Jln Pelita 12', 'Sarjana S1 Teknik Informatika', 'wirausaha', NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(11, 3, 11, 'Muhammad Agung Sholihhudin', 'Jln Pelita 12', 'Sarjana S1 Teknik Informatika', 'wirausaha', NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(12, 4, 12, 'Muhammad Agung Sholihhudin', 'Jln Pelita 12', 'Sarjana S1 Teknik Informatika', 'wirausaha', NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(13, 5, 13, 'Muhammad Agung Sholihhudin', 'Jln Pelita 12', 'Sarjana S1 Teknik Informatika', 'wirausaha', NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(14, 6, 14, 'Muhammad Agung Sholihhudin', 'Jln Pelita 12', 'Sarjana S1 Teknik Informatika', 'wirausaha', NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(15, 7, 15, 'Muhammad Agung Sholihhudin', 'Jln Pelita 12', 'Sarjana S1 Teknik Informatika', 'wirausaha', NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `apbdesas`
--

CREATE TABLE `apbdesas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titleApbdes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoApbdes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `apbdesas`
--

INSERT INTO `apbdesas` (`id`, `titleApbdes`, `fotoApbdes`, `created_at`, `updated_at`) VALUES
(1, 'Rincian apbdes desa tapung jaya', 'foto-apbdesa/cboCjjL9vLahpJEXkEVdtXrqvh0op86zqYPRgedx.png', '2022-12-05 15:40:35', '2022-12-05 15:40:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_apbdesas`
--

CREATE TABLE `data_apbdesas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titleData` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isiData` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colorData` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_apbdesas`
--

INSERT INTO `data_apbdesas` (`id`, `titleData`, `isiData`, `colorData`, `created_at`, `updated_at`) VALUES
(1, 'Pendapatan', '1.823.659.906,00', 'primary', '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(2, '1. Pendapatan Asli Desa (PAD)', NULL, NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `demografis`
--

CREATE TABLE `demografis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titleDemografi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isiTitleDemografi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `demografis`
--

INSERT INTO `demografis` (`id`, `titleDemografi`, `isiTitleDemografi`, `created_at`, `updated_at`) VALUES
(1, 'Titik Kordinat', 'N : 0,669893 E : 100.530425', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(2, 'Luas Desa', '6,89 Km <sup>2</sup>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(3, 'Jarak Ke Ibu Kota Kecamatan', '25 Km', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(4, 'Jarak Ke Ibu Kota Kabupaten', '50 Km', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(5, 'Jarak Ke Ibu Kota Provinsi', '190 Km', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(6, 'Perbatasan Sebelah Utara', 'Desa Ujung Batu Timur', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(7, 'Perbatasan Sebelah Selatan', 'Desa Dayo', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(8, 'Perbatasan Sebelah Barat', 'Desa Lubuk Bendahara', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(9, 'Perbatasan Sebelah Timur', 'Desa Tandun Barat', '2022-12-05 15:40:34', '2022-12-05 15:40:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lembaga_id` bigint(20) UNSIGNED NOT NULL,
  `posisiJabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fungsiJabatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatans`
--

INSERT INTO `jabatans` (`id`, `lembaga_id`, `posisiJabatan`, `fungsiJabatan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kepala Desa', '<p>a. Penyelenggaraan pemerintahan desa</p><p>b. Pelaksanaan pembangunan</p><p>c. Pembinaan kemasyarakatan</p>  <p>d. Pemberdayaan masyarakat</p><p>e. Menjaga hubungan kemitraan dengan Lembaga masyarakat dan Lembaga pemerintahan lainnya</p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(2, 1, 'Sekretaris Desa', '<p>a. Penyelenggaraan pemerintahan desa</p><p>b. Pelaksanaan pembangunan</p><p>c. Pembinaan kemasyarakatan</p>  <p>d. Pemberdayaan masyarakat</p><p>e. Menjaga hubungan kemitraan dengan Lembaga masyarakat dan Lembaga pemerintahan lainnya</p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(3, 1, 'Kepala Urusan (KAUR) Keuangan', '<p>a. Penyelenggaraan pemerintahan desa</p><p>b. Pelaksanaan pembangunan</p><p>c. Pembinaan kemasyarakatan</p>  <p>d. Pemberdayaan masyarakat</p><p>e. Menjaga hubungan kemitraan dengan Lembaga masyarakat dan Lembaga pemerintahan lainnya</p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(4, 1, 'Kepala Urusan (KAUR) Tu dan Umum', '<p>a. Penyelenggaraan pemerintahan desa</p><p>b. Pelaksanaan pembangunan</p><p>c. Pembinaan kemasyarakatan</p>  <p>d. Pemberdayaan masyarakat</p><p>e. Menjaga hubungan kemitraan dengan Lembaga masyarakat dan Lembaga pemerintahan lainnya</p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(5, 1, 'Kepala Urusan (KAUR) Perencanaan', '<p>a. Penyelenggaraan pemerintahan desa</p><p>b. Pelaksanaan pembangunan</p><p>c. Pembinaan kemasyarakatan</p>  <p>d. Pemberdayaan masyarakat</p><p>e. Menjaga hubungan kemitraan dengan Lembaga masyarakat dan Lembaga pemerintahan lainnya</p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(6, 1, 'Kepala Seksi (KASI) Kesejahteraan', '<p>a. Penyelenggaraan pemerintahan desa</p><p>b. Pelaksanaan pembangunan</p><p>c. Pembinaan kemasyarakatan</p>  <p>d. Pemberdayaan masyarakat</p><p>e. Menjaga hubungan kemitraan dengan Lembaga masyarakat dan Lembaga pemerintahan lainnya</p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(7, 1, 'Kepala Seksi (KASI) Pemerintahan', '<p>a. Penyelenggaraan pemerintahan desa</p><p>b. Pelaksanaan pembangunan</p><p>c. Pembinaan kemasyarakatan</p>  <p>d. Pemberdayaan masyarakat</p><p>e. Menjaga hubungan kemitraan dengan Lembaga masyarakat dan Lembaga pemerintahan lainnya</p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(8, 1, 'Kepala Seksi (KASI) Pelayanan', '<p>a. Penyelenggaraan pemerintahan desa</p><p>b. Pelaksanaan pembangunan</p><p>c. Pembinaan kemasyarakatan</p>  <p>d. Pemberdayaan masyarakat</p><p>e. Menjaga hubungan kemitraan dengan Lembaga masyarakat dan Lembaga pemerintahan lainnya</p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(9, 1, 'Kepala Dusun (KADUS)', '<p>a. Penyelenggaraan pemerintahan desa</p><p>b. Pelaksanaan pembangunan</p><p>c. Pembinaan kemasyarakatan</p>  <p>d. Pemberdayaan masyarakat</p><p>e. Menjaga hubungan kemitraan dengan Lembaga masyarakat dan Lembaga pemerintahan lainnya</p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(10, 2, 'Ketua BPD', '<p>a. Penyelenggaraan pemerintahan desa</p><p>b. Pelaksanaan pembangunan</p><p>c. Pembinaan kemasyarakatan</p>  <p>d. Pemberdayaan masyarakat</p><p>e. Menjaga hubungan kemitraan dengan Lembaga masyarakat dan Lembaga pemerintahan lainnya</p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(11, 3, 'Ketua PKK', '<p>a. Penyelenggaraan pemerintahan desa</p><p>b. Pelaksanaan pembangunan</p><p>c. Pembinaan kemasyarakatan</p>  <p>d. Pemberdayaan masyarakat</p><p>e. Menjaga hubungan kemitraan dengan Lembaga masyarakat dan Lembaga pemerintahan lainnya</p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(12, 4, 'Ketua Karang Taruna', '<p>a. Penyelenggaraan pemerintahan desa</p><p>b. Pelaksanaan pembangunan</p><p>c. Pembinaan kemasyarakatan</p>  <p>d. Pemberdayaan masyarakat</p><p>e. Menjaga hubungan kemitraan dengan Lembaga masyarakat dan Lembaga pemerintahan lainnya</p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(13, 5, 'Ketua KUD', '<p>a. Penyelenggaraan pemerintahan desa</p><p>b. Pelaksanaan pembangunan</p><p>c. Pembinaan kemasyarakatan</p>  <p>d. Pemberdayaan masyarakat</p><p>e. Menjaga hubungan kemitraan dengan Lembaga masyarakat dan Lembaga pemerintahan lainnya</p>', '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(14, 6, 'Ketua BUMDES', '<p>a. Penyelenggaraan pemerintahan desa</p><p>b. Pelaksanaan pembangunan</p><p>c. Pembinaan kemasyarakatan</p>  <p>d. Pemberdayaan masyarakat</p><p>e. Menjaga hubungan kemitraan dengan Lembaga masyarakat dan Lembaga pemerintahan lainnya</p>', '2022-12-05 15:40:35', '2022-12-05 15:40:35'),
(15, 7, 'Ketua LPMD', '<p>a. Penyelenggaraan pemerintahan desa</p><p>b. Pelaksanaan pembangunan</p><p>c. Pembinaan kemasyarakatan</p>  <p>d. Pemberdayaan masyarakat</p><p>e. Menjaga hubungan kemitraan dengan Lembaga masyarakat dan Lembaga pemerintahan lainnya</p>', '2022-12-05 15:40:35', '2022-12-05 15:40:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lembaga_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalKegiatan_at` date NOT NULL,
  `textKegiatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerptKegiatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoUtamaKegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoPertamaKegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKeduaKegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKetigaKegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKeempatKegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKelimaKegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKeenamKegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKetujuhKegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKedelapanKegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKesembilanKegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKesepuluhKegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKeduabelasKegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKesebelahasKegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiatans`
--

INSERT INTO `kegiatans` (`id`, `lembaga_id`, `title`, `slug`, `tanggalKegiatan_at`, `textKegiatan`, `excerptKegiatan`, `fotoUtamaKegiatan`, `fotoPertamaKegiatan`, `fotoKeduaKegiatan`, `fotoKetigaKegiatan`, `fotoKeempatKegiatan`, `fotoKelimaKegiatan`, `fotoKeenamKegiatan`, `fotoKetujuhKegiatan`, `fotoKedelapanKegiatan`, `fotoKesembilanKegiatan`, `fotoKesepuluhKegiatan`, `fotoKeduabelasKegiatan`, `fotoKesebelahasKegiatan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Maulid Nabi Muhammad SAW dan syukuran peresmian surau suluk Al-Muqarrobah  Desa Tapung Jaya', 'maulid-nabi-muhammad-saw-dan-syukuran-peresmian-surau-suluk-al-muqarrobah-desa-tapung-jaya', '2022-09-20', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam facere sunt ipsa vitae deleniti harum unde porro quos non labore quaerat dicta distinctio saepe voluptate, ipsam aliquid facilis nihil officia voluptatem libero a quas et voluptatibus. Ad quaerat commodi reiciendis, ipsam quod dicta. Natus voluptas qui quod similique consectetur nesciunt, totam voluptate animi, dignissimos, accusamus accusantium soluta earum numquam ad itaque mollitia consequatur nihil nostrum distinctio at? Voluptates id eum nam cumque ex ipsa architecto provident minima alias exercitationem asperiores deserunt doloribus molestias sed minus sit consequuntur, error optio doloremque corporis vel aspernatur velit temporibus! Reprehenderit sequi nihil suscipit modi deleniti reiciendis repellat impedit nostrum eius aspernatur itaque, totam, quia fuga. Nesciunt labore illum ex minus&nbsp;<br><br></div><div>explicabo, maiores nulla consequuntur dolorem, quod eveniet maxime laboriosam autem reiciendis nemo officia aperiam facilis itaque quidem cum consequatur molestias ratione! Omnis nam ipsum voluptatum officia neque maxime esse cupiditate repellat, ullam, temporibus harum autem error consequatur, dolorum earum. Aliquid tempora voluptatum accusamus aperiam, nihil cum quam, asperiores recusandae doloremque fugiat laudantium veritatis odit consectetur blanditiis suscipit nobis perferendis quibusdam dolor ad quis sint. Officia et deserunt sequi ipsum vitae iusto voluptatibus omnis nisi suscipit voluptas! Soluta neque, aut esse minima ratione, laudantium adipisci saepe fugit cum sit, explicabo provident omnis dignissimos dicta. Consequuntur rem quod, mollitia nisi aut assumenda tempore inventore adipisci ea in sed repellendus maiores dignissimos quaerat sequi culpa, unde possimus. Nulla qui explicabo distinctio necessitatibus nihil vel quo, a ipsam. Ratione consectetur veritatis quaerat pariatur aut sed velit illum? Tempore veritatis voluptatum repudiandae esse mollitia natus nihil commodi reiciendis ipsa adipisci ea dolores pariatur aperiam sequi iure cumque explicabo eos libero nam odio dolore, asperiores totam sunt! Laudantium dolores fugiat assumenda consequuntur rem! Similique quam veritatis nesciunt voluptates ea modi voluptatem minus cum totam nam pariatur in ab ipsa quasi saepe, explicabo molestias nemo sunt, tempora deleniti praesentium vitae? Veritatis facilis facere in excepturi cum mollitia, dicta optio laudantium voluptate eligendi sunt. Quod, cumque. Laboriosam cum omnis vero exercitationem id repellat obcaecati ad nemo reprehenderit in perspiciatis, magni quae iusto unde aperiam enim sint consequuntur ex dicta libero dolore officiis? Voluptate dolorem fugit, impedit iure libero odit harum ipsum! Ratione culpa quisquam, perspiciatis sint repudiandae natus perferendis enim veniam amet obcaecati nulla temporibus, error cum voluptas ipsa ab nemo. Culpa repellendus, praesentium labore quibusdam, est laboriosam debitis cumque, vero minima obcaecati ex eius voluptates aut modi exercitationem omnis sunt dignissimos explicabo id velit dolorum officia? Accusantium perspiciatis architecto, autem exercitationem veniam optio? Voluptatibus repudiandae eos consequuntur dolore repellendus. Vero dolor cum quia quasi blanditiis optio facere possimus enim aperiam, quidem voluptatibus maiores esse vitae quas nostrum id a natus neque! Incidunt, adipisci. Tempora quaerat libero vero quis voluptas id laudantium ipsum nisi! Beatae, eos omnis corporis nulla numquam in iure mollitia nam debitis blanditiis corrupti veritatis, perspiciatis rem aliquid soluta excepturi modi iusto? Soluta maxime ipsum hic quas cumque, voluptatem fugit dolorem officia ex possimus. Assumenda maxime tempora consequatur veniam, sed laboriosam aspernatur commodi cupiditate? Nam commodi nobis minima ratione!<br><br></div>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam facere sunt ipsa vitae deleniti harum unde porro quos non labore quaerat dicta distinctio saepe voluptate, ipsam aliquid facilis nihil officia voluptatem libero a quas et voluptatibus. Ad quaerat commodi reiciendis, ipsam quod dicta. N...', 'kegiatan_fotoUtamaKegiatans/MvTpGzhdl2TMBqwADOa3DgR1ldsy3xS1gBM1bQyE.jpg', 'kegiatan_fotoKegiatans/ouDygEma1pV7IibK3gyz1IJMH8lF5Si4zdjpuFoX.webp', 'kegiatan_fotoKegiatans/PB5jHicbCpwStC4FPhqYtVyYjUiRnG2NuLwtLcay.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-05 15:40:35', '2022-12-26 14:16:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembagas`
--

CREATE TABLE `lembagas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaLembaga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketuaLembaga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desaLembaga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatanLembaga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupatenLembaga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsiLembaga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahAnggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logoLembaga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sejarahLembaga` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tugasLembaga` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lembagas`
--

INSERT INTO `lembagas` (`id`, `namaLembaga`, `singkatan`, `slug`, `ketuaLembaga`, `desaLembaga`, `kecamatanLembaga`, `kabupatenLembaga`, `provinsiLembaga`, `jumlahAnggota`, `logoLembaga`, `visi`, `misi`, `sejarahLembaga`, `tugasLembaga`, `created_at`, `updated_at`) VALUES
(1, 'Susunan Organisasi Tatakerja Desa', 'SOTK DESA', 'sotk_desa', 'H. Ahmad Said Wahyudi, S.H', 'Tapung Jaya', 'Tandun', 'Rokan Hulu', 'Riau', '10', 'logo-images/DUh5gDK4rXNijXn2nyDam7hg4ToZGWk4kPg0b2Li.png', 'Mewujudkan Desa Tapung Jaya menjadi desa yang adil dan makmur', '<p>1. Menciptakan pemerintah desa yang bersih dan berwibawa</p><p>2. Menciptakan pelayanan yang maksimal</p><p>3. Membangun desa yang berkesinambungan</p>', '<p>Desa Tapung Jaya terletak di kecamatan Tandun, kabupaten Rokan Hulu,provinsi Riau. Desa Tapung Jaya merupakan salah satu desa yang termasuk dalam daerah Eks Trans UPT 1, dan menjadi desa definitive pertama kali pada tahun 1984. Pada awalnya desa ini termasuk dalam daerah kabupaten Kampar, kemudian terjadi pemekaran pada 12 oktober 1999 dan tergabung ke dalam daerah kabupaten Rokan Hulu.</p><p>Sebelum menjadi desa secara definitive, desa ini dipimpin oleh Kepala Unit Pemukiman Transmigrasi (KUPT) Bapak Darmansya. Setelah menjadi desa definitive pada tahun 1984, pemilihan pertama kepala desa dilakukan tanpa dipilih oleh masyarakat, alim ulama, tokoh masyarakat, atau tokoh agama, melainkan ditunjuk secara langsung, dan terpilih Bapak Nurhadi sebagai kepala desa pertama. Pemilihan kepala desa setelah itu dilakukan secara demokratis melalui pemilu, terpilihlah Bapak Rusman sebagai kepala desa kedua, Bapak Muhammad Yusuf sebagai kepala desa ketiga, Bapak kusnadi sebagai kepala desa keempat, dan Bapak H. Ahmad Said Wahyudi sebagai kepala desa kelima.</p><p>Desa Tapung Jaya Sebagian besar penduduknya didominasi oleh suku Jawa tidak terkecuali pula suku lainnya. Desa tapung jaya terdiri dari tiga dusun, yaitu Dusun Harapan Maju, Dusun Harapan Makmur, dan Dusun Harapan Jaya. Jumlah penduduk Desa Tapung Jaya berdasarkan data tahun 2021 sebanyak 2.857 jiwa, dengan jumlah kepala keluarga (KK) sebanyak 931 KK</p>', '<p>1. Membantu orang-orang tidak mampu secara finansial, dengan memberikan mereka pekerjaan. Dalam hal ini karang taruna berperan pada perekonomian warganya. Mereka begitu membantu orang-orang yang tidak mampu,dengan memberikan pekerjaan. Sasaran pemberian bantuan lapangan kerja ini disasarkan pada mereka yang tak memiliki pekerjaan (tentunya), bahkan untuk kalian yang tidak memiliki pendidikan tinggi diakibatkan putus sekolah.</p><p>2. Menciptakan rasa tanggung jawab kepada sesama makhluk sosial yang tak bernasib baik dari kita. Juga mengatasi berbagai masalah-masalah sosial. Dengan keberadaan organisasi ini, para anggotanya mempunyai tugas untuk mengatasi segala macam masalah tersebut. Jadi dengan demikian, ketika suatu lingkungan tempat tinggal terdapat berbagai masalah sosial, masalahnya ada yang menyelesaikan, jadi tidak hanya didiamkan masalahnya lalu dibiarkan mengendap. </p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(2, 'Badan Perwakilan Desa', 'BPD', 'bpd', 'H. Ahmad Said Wahyudi, S.H', 'Tapung Jaya', 'Tandun', 'Rokan Hulu', 'Riau', '10', 'logo-images/0yzZ56v5CllugmE2XNNsllQPyewoQgAqwKA9OeA9.png', 'Mewujudkan Desa Tapung Jaya menjadi desa yang adil dan makmur', '<p>1. Menciptakan pemerintah desa yang bersih dan berwibawa</p><p>2. Menciptakan pelayanan yang maksimal</p><p>3. Membangun desa yang berkesinambungan</p>', '<p>Desa Tapung Jaya terletak di kecamatan Tandun, kabupaten Rokan Hulu,provinsi Riau. Desa Tapung Jaya merupakan salah satu desa yang termasuk dalam daerah Eks Trans UPT 1, dan menjadi desa definitive pertama kali pada tahun 1984. Pada awalnya desa ini termasuk dalam daerah kabupaten Kampar, kemudian terjadi pemekaran pada 12 oktober 1999 dan tergabung ke dalam daerah kabupaten Rokan Hulu.</p><p>Sebelum menjadi desa secara definitive, desa ini dipimpin oleh Kepala Unit Pemukiman Transmigrasi (KUPT) Bapak Darmansya. Setelah menjadi desa definitive pada tahun 1984, pemilihan pertama kepala desa dilakukan tanpa dipilih oleh masyarakat, alim ulama, tokoh masyarakat, atau tokoh agama, melainkan ditunjuk secara langsung, dan terpilih Bapak Nurhadi sebagai kepala desa pertama. Pemilihan kepala desa setelah itu dilakukan secara demokratis melalui pemilu, terpilihlah Bapak Rusman sebagai kepala desa kedua, Bapak Muhammad Yusuf sebagai kepala desa ketiga, Bapak kusnadi sebagai kepala desa keempat, dan Bapak H. Ahmad Said Wahyudi sebagai kepala desa kelima.</p><p>Desa Tapung Jaya Sebagian besar penduduknya didominasi oleh suku Jawa tidak terkecuali pula suku lainnya. Desa tapung jaya terdiri dari tiga dusun, yaitu Dusun Harapan Maju, Dusun Harapan Makmur, dan Dusun Harapan Jaya. Jumlah penduduk Desa Tapung Jaya berdasarkan data tahun 2021 sebanyak 2.857 jiwa, dengan jumlah kepala keluarga (KK) sebanyak 931 KK</p>', '<p>1. Membantu orang-orang tidak mampu secara finansial, dengan memberikan mereka pekerjaan. Dalam hal ini karang taruna berperan pada perekonomian warganya. Mereka begitu membantu orang-orang yang tidak mampu,dengan memberikan pekerjaan. Sasaran pemberian bantuan lapangan kerja ini disasarkan pada mereka yang tak memiliki pekerjaan (tentunya), bahkan untuk kalian yang tidak memiliki pendidikan tinggi diakibatkan putus sekolah.</p><p>2. Menciptakan rasa tanggung jawab kepada sesama makhluk sosial yang tak bernasib baik dari kita. Juga mengatasi berbagai masalah-masalah sosial. Dengan keberadaan organisasi ini, para anggotanya mempunyai tugas untuk mengatasi segala macam masalah tersebut. Jadi dengan demikian, ketika suatu lingkungan tempat tinggal terdapat berbagai masalah sosial, masalahnya ada yang menyelesaikan, jadi tidak hanya didiamkan masalahnya lalu dibiarkan mengendap. </p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(3, 'Pemberdayaan Kesejahteraan Keluarga', 'PKK', 'pkk', 'H. Ahmad Said Wahyudi, S.H', 'Tapung Jaya', 'Tandun', 'Rokan Hulu', 'Riau', '10', 'logo-images/eQ7nQfnE170nHEg0akxaPKQED5gn2yMif7gCE32l.png', 'Mewujudkan Desa Tapung Jaya menjadi desa yang adil dan makmur', '<p>1. Menciptakan pemerintah desa yang bersih dan berwibawa</p><p>2. Menciptakan pelayanan yang maksimal</p><p>3. Membangun desa yang berkesinambungan</p>', '<p>Desa Tapung Jaya terletak di kecamatan Tandun, kabupaten Rokan Hulu,provinsi Riau. Desa Tapung Jaya merupakan salah satu desa yang termasuk dalam daerah Eks Trans UPT 1, dan menjadi desa definitive pertama kali pada tahun 1984. Pada awalnya desa ini termasuk dalam daerah kabupaten Kampar, kemudian terjadi pemekaran pada 12 oktober 1999 dan tergabung ke dalam daerah kabupaten Rokan Hulu.</p><p>Sebelum menjadi desa secara definitive, desa ini dipimpin oleh Kepala Unit Pemukiman Transmigrasi (KUPT) Bapak Darmansya. Setelah menjadi desa definitive pada tahun 1984, pemilihan pertama kepala desa dilakukan tanpa dipilih oleh masyarakat, alim ulama, tokoh masyarakat, atau tokoh agama, melainkan ditunjuk secara langsung, dan terpilih Bapak Nurhadi sebagai kepala desa pertama. Pemilihan kepala desa setelah itu dilakukan secara demokratis melalui pemilu, terpilihlah Bapak Rusman sebagai kepala desa kedua, Bapak Muhammad Yusuf sebagai kepala desa ketiga, Bapak kusnadi sebagai kepala desa keempat, dan Bapak H. Ahmad Said Wahyudi sebagai kepala desa kelima.</p><p>Desa Tapung Jaya Sebagian besar penduduknya didominasi oleh suku Jawa tidak terkecuali pula suku lainnya. Desa tapung jaya terdiri dari tiga dusun, yaitu Dusun Harapan Maju, Dusun Harapan Makmur, dan Dusun Harapan Jaya. Jumlah penduduk Desa Tapung Jaya berdasarkan data tahun 2021 sebanyak 2.857 jiwa, dengan jumlah kepala keluarga (KK) sebanyak 931 KK</p>', '<p>1. Membantu orang-orang tidak mampu secara finansial, dengan memberikan mereka pekerjaan. Dalam hal ini karang taruna berperan pada perekonomian warganya. Mereka begitu membantu orang-orang yang tidak mampu,dengan memberikan pekerjaan. Sasaran pemberian bantuan lapangan kerja ini disasarkan pada mereka yang tak memiliki pekerjaan (tentunya), bahkan untuk kalian yang tidak memiliki pendidikan tinggi diakibatkan putus sekolah.</p><p>2. Menciptakan rasa tanggung jawab kepada sesama makhluk sosial yang tak bernasib baik dari kita. Juga mengatasi berbagai masalah-masalah sosial. Dengan keberadaan organisasi ini, para anggotanya mempunyai tugas untuk mengatasi segala macam masalah tersebut. Jadi dengan demikian, ketika suatu lingkungan tempat tinggal terdapat berbagai masalah sosial, masalahnya ada yang menyelesaikan, jadi tidak hanya didiamkan masalahnya lalu dibiarkan mengendap. </p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(4, 'Karang Taruna', 'karang taruna', 'karang_taruna', 'Muhammad Agung Sholihhudin, S.T', 'Tapung Jaya', 'Tandun', 'Rokan Hulu', 'Riua', '20', 'logo-images/qtKinWKv6Q0Wmir264aOvL6ygXf7j6dxB4sfusg4.png', 'Mewujudkan Desa Tapung Jaya menjadi desa yang adil dan makmur', '<p>1. Menciptakan pemerintah desa yang bersih dan berwibawa</p><p>2. Menciptakan pelayanan yang maksimal</p><p>3. Membangun desa yang berkesinambungan</p>', '<p>Desa Tapung Jaya terletak di kecamatan Tandun, kabupaten Rokan Hulu,provinsi Riau. Desa Tapung Jaya merupakan salah satu desa yang termasuk dalam daerah Eks Trans UPT 1, dan menjadi desa definitive pertama kali pada tahun 1984. Pada awalnya desa ini termasuk dalam daerah kabupaten Kampar, kemudian terjadi pemekaran pada 12 oktober 1999 dan tergabung ke dalam daerah kabupaten Rokan Hulu.</p><p>Sebelum menjadi desa secara definitive, desa ini dipimpin oleh Kepala Unit Pemukiman Transmigrasi (KUPT) Bapak Darmansya. Setelah menjadi desa definitive pada tahun 1984, pemilihan pertama kepala desa dilakukan tanpa dipilih oleh masyarakat, alim ulama, tokoh masyarakat, atau tokoh agama, melainkan ditunjuk secara langsung, dan terpilih Bapak Nurhadi sebagai kepala desa pertama. Pemilihan kepala desa setelah itu dilakukan secara demokratis melalui pemilu, terpilihlah Bapak Rusman sebagai kepala desa kedua, Bapak Muhammad Yusuf sebagai kepala desa ketiga, Bapak kusnadi sebagai kepala desa keempat, dan Bapak H. Ahmad Said Wahyudi sebagai kepala desa kelima.</p><p>Desa Tapung Jaya Sebagian besar penduduknya didominasi oleh suku Jawa tidak terkecuali pula suku lainnya. Desa tapung jaya terdiri dari tiga dusun, yaitu Dusun Harapan Maju, Dusun Harapan Makmur, dan Dusun Harapan Jaya. Jumlah penduduk Desa Tapung Jaya berdasarkan data tahun 2021 sebanyak 2.857 jiwa, dengan jumlah kepala keluarga (KK) sebanyak 931 KK</p>', '<p>1. Membantu orang-orang tidak mampu secara finansial, dengan memberikan mereka pekerjaan. Dalam hal ini karang taruna berperan pada perekonomian warganya. Mereka begitu membantu orang-orang yang tidak mampu,dengan memberikan pekerjaan. Sasaran pemberian bantuan lapangan kerja ini disasarkan pada mereka yang tak memiliki pekerjaan (tentunya), bahkan untuk kalian yang tidak memiliki pendidikan tinggi diakibatkan putus sekolah.</p><p>2. Menciptakan rasa tanggung jawab kepada sesama makhluk sosial yang tak bernasib baik dari kita. Juga mengatasi berbagai masalah-masalah sosial. Dengan keberadaan organisasi ini, para anggotanya mempunyai tugas untuk mengatasi segala macam masalah tersebut. Jadi dengan demikian, ketika suatu lingkungan tempat tinggal terdapat berbagai masalah sosial, masalahnya ada yang menyelesaikan, jadi tidak hanya didiamkan masalahnya lalu dibiarkan mengendap. </p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(5, 'Koperasi Unit Desa', 'KUD', 'kud', 'Muhammad Agung Sholihhudin, S.T', 'Tapung Jaya', 'Tandun', 'Rokan Hulu', 'Riua', '20', 'logo-images/gKOX0igEG2l8yhXwuiiLvHsAMZUecSLah1lCx5vV.png', 'Mewujudkan Desa Tapung Jaya menjadi desa yang adil dan makmur', '<p>1. Menciptakan pemerintah desa yang bersih dan berwibawa</p><p>2. Menciptakan pelayanan yang maksimal</p><p>3. Membangun desa yang berkesinambungan</p>', '<p>Desa Tapung Jaya terletak di kecamatan Tandun, kabupaten Rokan Hulu,provinsi Riau. Desa Tapung Jaya merupakan salah satu desa yang termasuk dalam daerah Eks Trans UPT 1, dan menjadi desa definitive pertama kali pada tahun 1984. Pada awalnya desa ini termasuk dalam daerah kabupaten Kampar, kemudian terjadi pemekaran pada 12 oktober 1999 dan tergabung ke dalam daerah kabupaten Rokan Hulu.</p><p>Sebelum menjadi desa secara definitive, desa ini dipimpin oleh Kepala Unit Pemukiman Transmigrasi (KUPT) Bapak Darmansya. Setelah menjadi desa definitive pada tahun 1984, pemilihan pertama kepala desa dilakukan tanpa dipilih oleh masyarakat, alim ulama, tokoh masyarakat, atau tokoh agama, melainkan ditunjuk secara langsung, dan terpilih Bapak Nurhadi sebagai kepala desa pertama. Pemilihan kepala desa setelah itu dilakukan secara demokratis melalui pemilu, terpilihlah Bapak Rusman sebagai kepala desa kedua, Bapak Muhammad Yusuf sebagai kepala desa ketiga, Bapak kusnadi sebagai kepala desa keempat, dan Bapak H. Ahmad Said Wahyudi sebagai kepala desa kelima.</p><p>Desa Tapung Jaya Sebagian besar penduduknya didominasi oleh suku Jawa tidak terkecuali pula suku lainnya. Desa tapung jaya terdiri dari tiga dusun, yaitu Dusun Harapan Maju, Dusun Harapan Makmur, dan Dusun Harapan Jaya. Jumlah penduduk Desa Tapung Jaya berdasarkan data tahun 2021 sebanyak 2.857 jiwa, dengan jumlah kepala keluarga (KK) sebanyak 931 KK</p>', '<p>1. Membantu orang-orang tidak mampu secara finansial, dengan memberikan mereka pekerjaan. Dalam hal ini karang taruna berperan pada perekonomian warganya. Mereka begitu membantu orang-orang yang tidak mampu,dengan memberikan pekerjaan. Sasaran pemberian bantuan lapangan kerja ini disasarkan pada mereka yang tak memiliki pekerjaan (tentunya), bahkan untuk kalian yang tidak memiliki pendidikan tinggi diakibatkan putus sekolah.</p><p>2. Menciptakan rasa tanggung jawab kepada sesama makhluk sosial yang tak bernasib baik dari kita. Juga mengatasi berbagai masalah-masalah sosial. Dengan keberadaan organisasi ini, para anggotanya mempunyai tugas untuk mengatasi segala macam masalah tersebut. Jadi dengan demikian, ketika suatu lingkungan tempat tinggal terdapat berbagai masalah sosial, masalahnya ada yang menyelesaikan, jadi tidak hanya didiamkan masalahnya lalu dibiarkan mengendap. </p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(6, 'Badan Usaha Milik Desa', 'BUMDES', 'bumdes', 'Muhammad Agung Sholihhudin, S.T', 'Tapung Jaya', 'Tandun', 'Rokan Hulu', 'Riau', '20', 'logo-images/nvcyF4bbEh2zAuYlQSgFvJkz40ET4H4A8lLbtOLu.png', 'Mewujudkan Desa Tapung Jaya menjadi desa yang adil dan makmur', '<p>1. Menciptakan pemerintah desa yang bersih dan berwibawa</p><p>2. Menciptakan pelayanan yang maksimal</p><p>3. Membangun desa yang berkesinambungan</p>', '<p>Desa Tapung Jaya terletak di kecamatan Tandun, kabupaten Rokan Hulu,provinsi Riau. Desa Tapung Jaya merupakan salah satu desa yang termasuk dalam daerah Eks Trans UPT 1, dan menjadi desa definitive pertama kali pada tahun 1984. Pada awalnya desa ini termasuk dalam daerah kabupaten Kampar, kemudian terjadi pemekaran pada 12 oktober 1999 dan tergabung ke dalam daerah kabupaten Rokan Hulu.</p><p>Sebelum menjadi desa secara definitive, desa ini dipimpin oleh Kepala Unit Pemukiman Transmigrasi (KUPT) Bapak Darmansya. Setelah menjadi desa definitive pada tahun 1984, pemilihan pertama kepala desa dilakukan tanpa dipilih oleh masyarakat, alim ulama, tokoh masyarakat, atau tokoh agama, melainkan ditunjuk secara langsung, dan terpilih Bapak Nurhadi sebagai kepala desa pertama. Pemilihan kepala desa setelah itu dilakukan secara demokratis melalui pemilu, terpilihlah Bapak Rusman sebagai kepala desa kedua, Bapak Muhammad Yusuf sebagai kepala desa ketiga, Bapak kusnadi sebagai kepala desa keempat, dan Bapak H. Ahmad Said Wahyudi sebagai kepala desa kelima.</p><p>Desa Tapung Jaya Sebagian besar penduduknya didominasi oleh suku Jawa tidak terkecuali pula suku lainnya. Desa tapung jaya terdiri dari tiga dusun, yaitu Dusun Harapan Maju, Dusun Harapan Makmur, dan Dusun Harapan Jaya. Jumlah penduduk Desa Tapung Jaya berdasarkan data tahun 2021 sebanyak 2.857 jiwa, dengan jumlah kepala keluarga (KK) sebanyak 931 KK</p>', '<p>1. Membantu orang-orang tidak mampu secara finansial, dengan memberikan mereka pekerjaan. Dalam hal ini karang taruna berperan pada perekonomian warganya. Mereka begitu membantu orang-orang yang tidak mampu,dengan memberikan pekerjaan. Sasaran pemberian bantuan lapangan kerja ini disasarkan pada mereka yang tak memiliki pekerjaan (tentunya), bahkan untuk kalian yang tidak memiliki pendidikan tinggi diakibatkan putus sekolah.</p><p>2. Menciptakan rasa tanggung jawab kepada sesama makhluk sosial yang tak bernasib baik dari kita. Juga mengatasi berbagai masalah-masalah sosial. Dengan keberadaan organisasi ini, para anggotanya mempunyai tugas untuk mengatasi segala macam masalah tersebut. Jadi dengan demikian, ketika suatu lingkungan tempat tinggal terdapat berbagai masalah sosial, masalahnya ada yang menyelesaikan, jadi tidak hanya didiamkan masalahnya lalu dibiarkan mengendap. </p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(7, 'Lembaga Pemberdayaan Masyarakat Desa', 'LPMD', 'lpmd', 'Muhammad Agung Sholihhudin, S.T', 'Tapung Jaya', 'Tandun', 'Rokan Hulu', 'Riau', '20', 'logo-images/ZgxOiWMu1KkcfQYZmZIScDM1ldSjicTMc1B6JoPv.png', 'Mewujudkan Desa Tapung Jaya menjadi desa yang adil dan makmur', '<p>1. Menciptakan pemerintah desa yang bersih dan berwibawa</p><p>2. Menciptakan pelayanan yang maksimal</p><p>3. Membangun desa yang berkesinambungan</p>', '<p>Desa Tapung Jaya terletak di kecamatan Tandun, kabupaten Rokan Hulu,provinsi Riau. Desa Tapung Jaya merupakan salah satu desa yang termasuk dalam daerah Eks Trans UPT 1, dan menjadi desa definitive pertama kali pada tahun 1984. Pada awalnya desa ini termasuk dalam daerah kabupaten Kampar, kemudian terjadi pemekaran pada 12 oktober 1999 dan tergabung ke dalam daerah kabupaten Rokan Hulu.</p><p>Sebelum menjadi desa secara definitive, desa ini dipimpin oleh Kepala Unit Pemukiman Transmigrasi (KUPT) Bapak Darmansya. Setelah menjadi desa definitive pada tahun 1984, pemilihan pertama kepala desa dilakukan tanpa dipilih oleh masyarakat, alim ulama, tokoh masyarakat, atau tokoh agama, melainkan ditunjuk secara langsung, dan terpilih Bapak Nurhadi sebagai kepala desa pertama. Pemilihan kepala desa setelah itu dilakukan secara demokratis melalui pemilu, terpilihlah Bapak Rusman sebagai kepala desa kedua, Bapak Muhammad Yusuf sebagai kepala desa ketiga, Bapak kusnadi sebagai kepala desa keempat, dan Bapak H. Ahmad Said Wahyudi sebagai kepala desa kelima.</p><p>Desa Tapung Jaya Sebagian besar penduduknya didominasi oleh suku Jawa tidak terkecuali pula suku lainnya. Desa tapung jaya terdiri dari tiga dusun, yaitu Dusun Harapan Maju, Dusun Harapan Makmur, dan Dusun Harapan Jaya. Jumlah penduduk Desa Tapung Jaya berdasarkan data tahun 2021 sebanyak 2.857 jiwa, dengan jumlah kepala keluarga (KK) sebanyak 931 KK</p>', '<p>1. Membantu orang-orang tidak mampu secara finansial, dengan memberikan mereka pekerjaan. Dalam hal ini karang taruna berperan pada perekonomian warganya. Mereka begitu membantu orang-orang yang tidak mampu,dengan memberikan pekerjaan. Sasaran pemberian bantuan lapangan kerja ini disasarkan pada mereka yang tak memiliki pekerjaan (tentunya), bahkan untuk kalian yang tidak memiliki pendidikan tinggi diakibatkan putus sekolah.</p><p>2. Menciptakan rasa tanggung jawab kepada sesama makhluk sosial yang tak bernasib baik dari kita. Juga mengatasi berbagai masalah-masalah sosial. Dengan keberadaan organisasi ini, para anggotanya mempunyai tugas untuk mengatasi segala macam masalah tersebut. Jadi dengan demikian, ketika suatu lingkungan tempat tinggal terdapat berbagai masalah sosial, masalahnya ada yang menyelesaikan, jadi tidak hanya didiamkan masalahnya lalu dibiarkan mengendap. </p>', '2022-12-05 15:40:34', '2022-12-05 15:40:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakats`
--

CREATE TABLE `masyarakats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rentangUmur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `masyarakats`
--

INSERT INTO `masyarakats` (`id`, `nama`, `nik`, `alamat`, `rentangUmur`, `penghasilan`, `created_at`, `updated_at`) VALUES
(2, 'Person 1', '1234567899876540', 'Pelita 12', 'usia lanjut', 0, '2022-12-17 15:55:57', '2022-12-17 15:58:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2022_10_31_053248_create_profil_desas_table', 1),
(6, '2022_10_31_191908_create_lembagas_table', 1),
(7, '2022_10_31_224238_create_demografis_table', 1),
(8, '2022_10_31_230203_create_perdesas_table', 1),
(9, '2022_11_02_061519_create_jabatans_table', 1),
(10, '2022_11_02_083728_create_anggotas_table', 1),
(11, '2022_11_02_131649_create_musyawarahs_table', 1),
(12, '2022_11_02_232804_create_kegiatans_table', 1),
(13, '2022_11_06_072954_create_apbdesas_table', 1),
(14, '2022_11_07_012727_create_data_apbdesas_table', 1),
(15, '2022_11_17_045749_create_others_table', 1),
(16, '2022_11_18_155358_create_pengaduans_table', 1),
(17, '2022_11_29_101650_create_masyarakats_table', 1),
(18, '2022_11_30_104614_create_pengajuan_surats_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `musyawarahs`
--

CREATE TABLE `musyawarahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalMusyawarah_at` date NOT NULL,
  `textMusyawarah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerptMusyawarah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoUtamaMusyawarah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoPertamaMusyawarah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKeduaMusyawarah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKetigaMusyawarah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKeempatMusyawarah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKelimaMusyawarah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKeenamMusyawarah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKetujuhMusyawarah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKedelapanMusyawarah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKesembilanMusyawarah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKesepuluhMusyawarah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKesebelahasMusyawarah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKeduabelasMusyawarah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `musyawarahs`
--

INSERT INTO `musyawarahs` (`id`, `title`, `slug`, `tanggalMusyawarah_at`, `textMusyawarah`, `excerptMusyawarah`, `fotoUtamaMusyawarah`, `fotoPertamaMusyawarah`, `fotoKeduaMusyawarah`, `fotoKetigaMusyawarah`, `fotoKeempatMusyawarah`, `fotoKelimaMusyawarah`, `fotoKeenamMusyawarah`, `fotoKetujuhMusyawarah`, `fotoKedelapanMusyawarah`, `fotoKesembilanMusyawarah`, `fotoKesepuluhMusyawarah`, `fotoKesebelahasMusyawarah`, `fotoKeduabelasMusyawarah`, `created_at`, `updated_at`) VALUES
(1, 'Bupati Rohul H. Sukiman Hadiri Kegiatan MPTB Desa Tapung Jaya', 'bupati-rohul-h-sukiman-hadiri-kegiatan-mptb-desa-tapung-jaya', '2022-10-20', '<div>Dalam Rangka Musyawarah laporan pertanggung jawaban tahunan Bumdesa Bunga Sari (MPTB) , sekaligus meresmikan Tribun Mini, Gedung SMPN 4 Tandun, dan Kantor Sekretariat Karang Taruna, dan Pamsimas.Senin 06 Januari 2020.<br><br></div><div>Bupati Rokan Hulu H.Sukiman hadir beserta rombongan dan disambut dengan meriah oleh ratusan Masyarakat Tapung Jaya menggunakan Payung Merah Putih, sedangkan Bupati Rokan Hulu dan Rombongan disambut menggunakan Payung Merah Putih yang merupakan hasil dari usaha Bumdesa Bunga Sari.<br><br></div><div>Kades Tapung Jaya Kusnadi, dalam laporan nya menyampaikan bahwasanya saat ini Bumdesa Bunga Sari telah bisa digolongkan salah satu Bumdesa yang maju, karena dapat dilaporkan bahwasanya hasil laba yang di peroleh saat ini mencapai 135.845.367 rupiah.<br><br></div><div>Pencapaian hasil Bumdesa ini didapatkan melalui usaha pinjaman dan pengembalian yang dijalankan, namun melaui usaha ini tidak terlepas juga dari permasalahan yang dihadapi seperti tunggakan yang relatif tinggi, banyaknya daftar tunggu calon pemanfaat.<br><br></div><div>\"Hal ini dapat kami atasi dengan cara persuasive, mendatangi rumah pemanfaat, memberikan surat peringatan satu sampai tiga kali, bila memungkinkan akan kami jadwal ulang kembali pinjamannya,\"terang kades kusnadi.<br><br></div><div>Dari hasil laba yang didapat Kades Tapung Jaya menyampaikan, hasil laba ini juga akan dipergunakan untuk membantu masyarakat yang membutuhkan, seperti bantuan kambing 12 ekor pada warga yang tidak mampu, kemudian bantuan karpet untuk 5 masjid.<br><br></div><div>Ditempat yang sama Bupati Rokanhulu H.Sukiman dalam sambutannya merasa bangga dengan bumdes bunga sari yang mana telah berhasil mengembangkan dana bumdes ini dari dana 400 jt rupiah menjadi meningkat hingga 1 milyar lebih.<br><br></div><div>Bupati juga menghimbau, Mari kita bersama sama membangkitkan daerah kita, karena dengan kebersamaan itu semua bisa tercapai.<br><br></div><div>\"oleh karena bangga nya Saya dengan masyarakat tapung jaya ini, maka dari itu kita akan bantu pembangunan jalan bagi desa tapung jaya,semoga nanti bisa dimanfaatkan dengan baik,\" ungkap sukiman.<br><br></div><div>Usai dengab sambutannya Bupati Rokanhulu H.Sukiman menyerahkan secara simbolis bantuan kambing 12 ekor, 5 karpet masjid, bagi masyarakat kurang mampu, serta juga menyerahkan bantuan uang tunai dari ketu Tp-pkk Rokanhulu, 2 juta rupiah untuk usaha dendeng daun ubi, yang saat ini menjadi usaha prioritas bumdesa bunga sari.<br><br></div><div>Selanjutnya Bupati Rokanhulu H.Sukiman juga sekaligus meresmikan Tribun mini bola kaki, laboratorium SMP N 4 Tandun, dan Pamsimas.<br><br></div><div>Dalam acara laporan tahunan Bumdesa Bunga Sari ini turut hadir juga, Ketua TP-PKK Rokanhulu Hj.Peni Herawati Sukiman, Kadis PUPR Anton, kadis Perhubungan andi anto, kadis bpmpd margono, Camat Tandun Muhammad Rodi, Kades se Kec. Tandun , kepala PT. RSI (Rohul Sawit Industri), tokoh masyarakat desa tapung jaya, serta ratusan masyarakat Desa Tapung Jaya.<br><br></div>', 'Dalam Rangka Musyawarah laporan pertanggung jawaban tahunan Bumdesa Bunga Sari (MPTB) , sekaligus meresmikan Tribun Mini, Gedung SMPN 4 Tandun, dan Kantor Sekretariat Karang Taruna, dan Pamsimas.Senin 06 Januari 2020.Bupati Rokan Hulu H.Sukiman hadir beserta rombongan dan disambut dengan meriah oleh...', 'Musyawarah_fotoUtamaMusyawarahs/Nr6eCcWL38wmArk4MhAbv2TAJjmzpTUJ4NkSgcSW.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-05 15:40:35', '2022-12-05 15:40:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `others`
--

CREATE TABLE `others` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shortTitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullTitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `informationSystem` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactUsTelpon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactUsEmail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operationDay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operationTime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtubeLink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebookLink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagramLink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `googleLink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsAppLink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoPertama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKedua` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKetiga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `others`
--

INSERT INTO `others` (`id`, `shortTitle`, `fullTitle`, `informationSystem`, `contactUsTelpon`, `contactUsEmail`, `operationDay`, `operationTime`, `youtubeLink`, `facebookLink`, `instagramLink`, `googleLink`, `whatsAppLink`, `fotoPertama`, `fotoKedua`, `fotoKetiga`, `created_at`, `updated_at`) VALUES
(1, 'SIP', 'Sistem Informasi dan Pelayanan', 'Sistem Informasi dan Pelayanan Desa Tapung Jaya, merupakan sistem yang dibangun guna memberikan berbagai informasi mengenai Desa Tapung Jaya, sekaligus memberikan pelayanan kepada masyarakat Desa Tapung Jaya.', '082388514449', 'Tapungjaya@gmail.com', 'Senin - Sabtu', '08.00 - 17.00', 'https://www.youtube.com/channel/UCOtzRAVgxLlGdmUOYTL6tlA', NULL, NULL, 'https://www.google.com/search?gs_ssp=eJzj4tZP1zc0Msg1iC8wM2D0EkhJLU5UKEksKM1LV8hKrEwEAIygCaw&q=desa+tapung+jaya&rlz=1C1YTUH_enID1003ID1003&oq=Desa+Tapung+Jaya&aqs=chrome.0.46i512j69i57j0i22i30j69i60l3.4064j0j4&sourceid=chrome&ie=UTF-8', NULL, 'image-slide/OD1bIr2mbkNNevdlQQ8DEvGuFsqMbjhC297NH1Kb.jpg', 'image-slide/iAZyR9eq957eAwUJs2FSJwYViVOljcmR15sd1IAA.jpg', 'image-slide/MK6vY8lh9f1e23HFQplbmk3kYy3CXn4EyThBZ6xK.jpg', '2022-12-05 15:40:35', '2022-12-05 15:40:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduans`
--

CREATE TABLE `pengaduans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatKejadian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoPertama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKedua` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoKetiga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `textPengaduan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduans`
--

INSERT INTO `pengaduans` (`id`, `title`, `tempatKejadian`, `fotoPertama`, `fotoKedua`, `fotoKetiga`, `textPengaduan`, `created_at`, `updated_at`) VALUES
(1, 'Pencurian Sawit', 'Kebun sawit P12', NULL, NULL, NULL, 'Telah terjadi pencurian buah sawit, atau ninja sawit di perkebunan jalur p.12 ujung, yang dilakukan oleh masyarakat luar desa', '2022-12-05 15:40:35', '2022-12-05 15:40:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_surats`
--

CREATE TABLE `pengajuan_surats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomorSurat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggalTerbit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisKelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatLahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusSurat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perdesas`
--

CREATE TABLE `perdesas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titlePerdes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalPerdes_at` date NOT NULL,
  `filePerdes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perdesas`
--

INSERT INTO `perdesas` (`id`, `titlePerdes`, `tanggalPerdes_at`, `filePerdes`, `created_at`, `updated_at`) VALUES
(1, 'Draft PERDES APBD DESA', '2022-11-07', 'file-perdes/MJPreZRZkqIVbJjwj3BljvRmxZN3UkcIJ21NNvEh.pdf', '2022-12-05 15:40:34', '2022-12-05 15:40:34'),
(2, 'Contoh PERDES Kewenangan Desaddd', '2022-12-27', 'file-perdes/vY2feaGSrnZgSRnosfbWvpGq51HutUZQ7455ipQQ.pdf', '2022-12-28 15:32:23', '2022-12-28 15:32:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_desas`
--

CREATE TABLE `profil_desas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaDesa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepalaDesa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luasDesa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahDusun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahKeluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahJiwa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sejarah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logoDesa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profil_desas`
--

INSERT INTO `profil_desas` (`id`, `namaDesa`, `kepalaDesa`, `kecamatan`, `kabupaten`, `provinsi`, `luasDesa`, `jumlahDusun`, `jumlahKeluarga`, `jumlahJiwa`, `sejarah`, `logoDesa`, `created_at`, `updated_at`) VALUES
(1, 'Desa Tapung Jaya', 'H. Ahmad Said Wahyudi, S.Pi', 'Tandun', 'Rokan Hulu', 'Riau', '6,89', '3', '931', '2.857', '<div>Desa Tapung Jaya terletak di kecamatan Tandun, kabupaten Rokan Hulu,provinsi Riau. Desa Tapung Jaya merupakan salah satu desa yang termasuk dalam daerah Eks Trans UPT 1, dan menjadi desa definitive pertama kali pada tahun 1984. Pada awalnya desa ini termasuk dalam daerah kabupaten Kampar, kemudian terjadi pemekaran pada 12 oktober 1999 dan tergabung ke dalam daerah kabupaten Rokan Hulu.<br><br></div><div>Sebelum menjadi desa secara definitive, desa ini dipimpin oleh Kepala Unit Pemukiman Transmigrasi (KUPT) Bapak Darmansya. Setelah menjadi desa definitive pada tahun 1984, pemilihan pertama kepala desa dilakukan tanpa dipilih oleh masyarakat, alim ulama, tokoh masyarakat, atau tokoh agama, melainkan ditunjuk secara langsung, dan terpilih Bapak Nurhadi sebagai kepala desa pertama. Pemilihan kepala desa setelah itu dilakukan secara demokratis melalui pemilu, terpilihlah Bapak Rusman sebagai kepala desa kedua, Bapak Muhammad Yusuf sebagai kepala desa ketiga, Bapak kusnadi sebagai kepala desa keempat, dan Bapak H. Ahmad Said Wahyudi sebagai kepala desa kelima.<br><br></div><div>Desa Tapung Jaya Sebagian besar penduduknya didominasi oleh suku Jawa tidak terkecuali pula suku lainnya. Desa tapung jaya terdiri dari tiga dusun, yaitu Dusun Harapan Maju, Dusun Harapan Makmur, dan Dusun Harapan Jaya. Jumlah penduduk Desa Tapung Jaya berdasarkan data tahun 2021 sebanyak 2.857 jiwa, dengan jumlah kepala keluarga (KK) sebanyak 931 KK<br><br></div>', 'logo-images/EVCKKVfCAUnFSM59Ehn95ZGsPFj8kvFEOlkli6sV.png', '2022-12-05 15:40:34', '2022-12-19 18:35:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lembaga_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `lembaga_id`, `name`, `userName`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin123', 'Admin123', 'admin', '$2y$10$A4JEnA4FJsimGY9auDm2u.M2XBdz5E6/eul3qX6auldp1lyEyPSiO', NULL, '2022-11-29 22:30:27', '2023-01-01 14:21:02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `apbdesas`
--
ALTER TABLE `apbdesas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `apbdesas_titleapbdes_unique` (`titleApbdes`);

--
-- Indeks untuk tabel `data_apbdesas`
--
ALTER TABLE `data_apbdesas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_apbdesas_titledata_unique` (`titleData`);

--
-- Indeks untuk tabel `demografis`
--
ALTER TABLE `demografis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kegiatans_title_unique` (`title`),
  ADD UNIQUE KEY `kegiatans_slug_unique` (`slug`);

--
-- Indeks untuk tabel `lembagas`
--
ALTER TABLE `lembagas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lembagas_slug_unique` (`slug`);

--
-- Indeks untuk tabel `masyarakats`
--
ALTER TABLE `masyarakats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `masyarakats_nik_unique` (`nik`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `musyawarahs`
--
ALTER TABLE `musyawarahs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `musyawarahs_title_unique` (`title`),
  ADD UNIQUE KEY `musyawarahs_slug_unique` (`slug`);

--
-- Indeks untuk tabel `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan_surats`
--
ALTER TABLE `pengajuan_surats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perdesas`
--
ALTER TABLE `perdesas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `perdesas_fileperdes_unique` (`filePerdes`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `profil_desas`
--
ALTER TABLE `profil_desas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`userName`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `apbdesas`
--
ALTER TABLE `apbdesas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_apbdesas`
--
ALTER TABLE `data_apbdesas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `demografis`
--
ALTER TABLE `demografis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lembagas`
--
ALTER TABLE `lembagas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `masyarakats`
--
ALTER TABLE `masyarakats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `musyawarahs`
--
ALTER TABLE `musyawarahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `others`
--
ALTER TABLE `others`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_surats`
--
ALTER TABLE `pengajuan_surats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perdesas`
--
ALTER TABLE `perdesas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profil_desas`
--
ALTER TABLE `profil_desas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
