-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2024 at 07:39 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cvrahayuputra`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `Id_Admin` bigint NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Sebagai` text,
  `Nomor_Registrasi` text,
  `Email` varchar(100) DEFAULT NULL,
  `Nama_Lengkap` varchar(100) DEFAULT NULL,
  `Nomor_Handphone` text,
  `Waktu_Terakhir_Login` datetime DEFAULT NULL,
  `Id_Role` text NOT NULL,
  `Waktu_Simpan_Data` datetime NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`Id_Admin`, `Username`, `Password`, `Sebagai`, `Nomor_Registrasi`, `Email`, `Nama_Lengkap`, `Nomor_Handphone`, `Waktu_Terakhir_Login`, `Id_Role`, `Waktu_Simpan_Data`, `Status`) VALUES
(1, 'admin', 'c8971720819c50b265b0ed632a25b3de', 'Super Administrator', 'A21021302013622', 'admin@cvrahayuputra.com', 'Super Admin', '81231231', NULL, '1', '2021-02-13 02:01:36', 'Aktif'),
(4, 'admin2', '58833e049e2c5bc381b3b39bbd5166de', 'Super Administrator', 'A24022708545244', 'admin@survei.io', 'Admin', '08123132123', NULL, '1', '2024-02-27 08:54:52', 'Aktif'),
(5, 'admin3', '2e9b1bddcdf76f39a063b0afc9abe044', 'Administrator', 'A24022708562426', 'admin@survei.io', 'Staff', '08123132123', NULL, '2', '2024-02-27 08:56:24', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_banner`
--

CREATE TABLE `tb_banner` (
  `Id_Banner` bigint NOT NULL,
  `Judul` varchar(150) NOT NULL,
  `Deskripsi` text,
  `Link` varchar(150) DEFAULT NULL,
  `Kategori` varchar(100) DEFAULT NULL,
  `Foto_Banner` text,
  `Waktu_Simpan_Data` datetime NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_banner`
--

INSERT INTO `tb_banner` (`Id_Banner`, `Judul`, `Deskripsi`, `Link`, `Kategori`, `Foto_Banner`, `Waktu_Simpan_Data`, `Status`) VALUES
(1, 'Banner Home', '', '', 'Website Banner Home 1', '45bd61892478b39add7af63081bb4242_1_Foto_Banner.jpg', '2024-02-27 11:02:52', 'Aktif'),
(2, 'Banner Home 2', '', '', 'Website Banner Home 1', 'dbaeefb92a1d13e4daa68672651919ca_2_Foto_Banner.jpg', '2024-02-27 11:03:04', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_blog_artikel`
--

CREATE TABLE `tb_blog_artikel` (
  `Id_Blog_Artikel` bigint NOT NULL,
  `Id_Pengguna` bigint NOT NULL,
  `Judul_Artikel` text,
  `Isi_Artikel` text,
  `Tag_Artikel` text,
  `Status_Artikel` text NOT NULL,
  `Foto_Artikel` text,
  `Waktu_Terakhir_Update` datetime DEFAULT NULL,
  `Waktu_Simpan_Data` datetime NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_blog_artikel`
--

INSERT INTO `tb_blog_artikel` (`Id_Blog_Artikel`, `Id_Pengguna`, `Judul_Artikel`, `Isi_Artikel`, `Tag_Artikel`, `Status_Artikel`, `Foto_Artikel`, `Waktu_Terakhir_Update`, `Waktu_Simpan_Data`, `Status`) VALUES
(1, 1, 'Mengoptimalkan Keamanan dan Efisiensi: Peran Penting Packing Box Pallet Kayu', 'Packing box pallet kayu telah menjadi salah satu elemen yang tidak terpisahkan dalam rantai pasok modern. Baik untuk pengiriman domestik maupun internasional, pallet kayu menawarkan solusi yang kuat, handal, dan ramah lingkungan untuk mengemas dan mengangkut berbagai jenis barang. Artikel ini akan menjelaskan mengapa penggunaan packing box pallet kayu tetap menjadi pilihan yang populer di berbagai industri.\r\n\r\n1. Keunggulan Keamanan\r\n\r\nKeamanan adalah faktor utama dalam pengiriman barang. Dalam hal ini, pallet kayu menonjol karena kekuatannya yang dapat diandalkan. Dibandingkan dengan material lain, seperti plastik atau kardus, kayu menawarkan kekuatan yang superior, memastikan barang tetap aman selama proses pengiriman. Selain itu, pallet kayu juga memberikan stabilitas yang baik, mengurangi risiko kerusakan akibat pergeseran atau benturan.\r\n\r\n2. Kehandalan dan Daya Tahan\r\n\r\nPallet kayu terkenal karena daya tahan dan kemampuannya untuk menangani beban yang berat. Mereka dapat digunakan berulang kali tanpa mengalami penurunan kinerja yang signifikan. Ini membuatnya menjadi investasi yang berkelanjutan dalam jangka panjang bagi perusahaan yang terlibat dalam rantai pasok.\r\n\r\n3. Ketersediaan dan Kemudahan Pembuatan\r\n\r\nSalah satu keuntungan besar dari pallet kayu adalah ketersediaannya yang luas. Kayu adalah bahan yang relatif murah dan mudah didapat di banyak bagian dunia. Selain itu, pembuatan pallet kayu relatif sederhana dan dapat dilakukan dengan biaya yang rendah. Hal ini memungkinkan perusahaan untuk dengan mudah mengakses dan memperoleh pallet kayu sesuai kebutuhan mereka.\r\n\r\n4. Ramah Lingkungan\r\n\r\nMeskipun ada perdebatan tentang dampak lingkungan dari penggunaan kayu dalam industri, pallet kayu sering dianggap lebih ramah lingkungan daripada alternatifnya. Kayu adalah sumber daya yang dapat diperbarui dan dapat didaur ulang dengan relatif mudah. Selain itu, ketika dibandingkan dengan plastik, pembuatan pallet kayu cenderung menghasilkan jejak karbon yang lebih rendah.\r\n\r\n5. Fleksibilitas dalam Desain\r\n\r\nPallet kayu dapat disesuaikan dengan kebutuhan spesifik pengguna. Mereka dapat dirancang dalam berbagai ukuran dan bentuk, serta dapat dimodifikasi untuk memenuhi persyaratan khusus pengiriman atau penyimpanan. Fleksibilitas ini membuatnya menjadi pilihan yang ideal untuk berbagai jenis barang, dari produk makanan hingga barang elektronik.\r\n\r\nDengan mempertimbangkan keunggulan-keunggulan di atas, tidak mengherankan bahwa packing box pallet kayu tetap menjadi pilihan yang dominan dalam industri pengemasan dan pengiriman. Dalam menghadapi tantangan global seperti meningkatnya kebutuhan akan efisiensi dan keselamatan dalam rantai pasok, penggunaan pallet kayu terus berkembang sebagai solusi yang andal dan efektif.', 'Kayu,PackingBox,Pallet,Box', 'Publikasi', '432895e0936e6f9ac878a4386306a81e_1Foto_Artikel.jpg', '2024-02-27 11:34:09', '2021-06-02 08:27:11', 'Aktif'),
(2, 1, 'Pentingnya Pohon dan Kayu bagi Manusia', 'Pohon dan kayu tidak hanya memberikan manfaat langsung bagi manusia, tetapi juga secara tidak langsung memengaruhi berbagai aspek kehidupan kita. Mereka berperan dalam mengatur iklim, menyerap karbon dioksida, dan mengurangi polusi udara. Selain itu, hutan-hutan yang sehat menjadi habitat bagi berbagai spesies tumbuhan dan hewan, menjaga keanekaragaman hayati Bumi. Dalam bidang ekonomi, industri kayu menyediakan pekerjaan bagi jutaan orang di seluruh dunia.\r\n\r\nOleh karena itu, penting bagi kita untuk memahami nilai ekologis, ekonomis, dan sosial dari pohon dan kayu serta berkomitmen untuk melestarikannya demi masa depan yang berkelanjutan bagi planet ini.', 'Kayu,manusia,kehidupan,pohon', 'Publikasi', 'a308b610a9c38904da864ac1e9988f2a_2Foto_Artikel.jpg', '2024-02-27 11:33:21', '2021-06-03 06:50:41', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_role`
--

CREATE TABLE `tb_data_role` (
  `Id_Role` bigint NOT NULL,
  `Nama_Role` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Deskripsi_Role` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Waktu_Simpan_Data` datetime NOT NULL,
  `Status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_data_role`
--

INSERT INTO `tb_data_role` (`Id_Role`, `Nama_Role`, `Deskripsi_Role`, `Waktu_Simpan_Data`, `Status`) VALUES
(1, 'Super Administrator', 'All of Module', '2022-02-01 12:39:01', 'Aktif'),
(2, 'Staff Informasi', 'Staff Informasi', '2022-02-01 14:15:34', 'Aktif'),
(4, 'Admin Galeri dan Artikel', 'Hanya Galeri dan Artikel', '2024-02-27 09:52:41', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_role_crud`
--

CREATE TABLE `tb_data_role_crud` (
  `Id_Role_CRUD` bigint NOT NULL,
  `Id_Role` bigint NOT NULL,
  `Nama_Modul` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Deskripsi_Modul` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Akses` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_data_role_crud`
--

INSERT INTO `tb_data_role_crud` (`Id_Role_CRUD`, `Id_Role`, `Nama_Modul`, `Deskripsi_Modul`, `Akses`) VALUES
(1, 4, 'Admin_Panel', '', 'Tidak'),
(2, 4, 'Data_Banner', '', 'Tidak'),
(3, 4, 'Tentang_Kami', '', 'Tidak'),
(4, 4, 'FAQ', '', 'Tidak'),
(5, 4, 'Testimoni', '', 'Tidak'),
(6, 4, 'Data_Artikel', '', 'Iya'),
(7, 4, 'Data_Galeri', '', 'Iya'),
(8, 2, 'Admin_Panel', '', 'Tidak'),
(9, 2, 'Data_Banner', '', 'Tidak'),
(10, 2, 'Tentang_Kami', '', 'Iya'),
(11, 2, 'FAQ', '', 'Iya'),
(12, 2, 'Testimoni', '', 'Iya'),
(13, 2, 'Data_Artikel', '', 'Iya'),
(14, 2, 'Data_Galeri', '', 'Iya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_faq`
--

CREATE TABLE `tb_faq` (
  `Id_Faq` int NOT NULL,
  `Pertanyaan` text NOT NULL,
  `Jawaban` text NOT NULL,
  `Waktu_Simpan_Data` datetime NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_faq`
--

INSERT INTO `tb_faq` (`Id_Faq`, `Pertanyaan`, `Jawaban`, `Waktu_Simpan_Data`, `Status`) VALUES
(1, 'Apa itu CV. Rahayu Putra?', 'CV. Rahayu Putra adalah Perusahaan bergerak di bidang industri penggergajian kayu bistek/ckd', '2021-05-30 05:50:28', 'Aktif'),
(2, 'Apa saja yang dikerjakan CV. Rahayu Putra?', 'CV. Rahayu Putra mengerjakan pembuatan berikut :\r\n1. Wooden Pallet (Pallet Kayu)\r\n2. ⁠Glass Packing Box (Kotak Kemasan Kaca)\r\n3. ⁠Siku/Bantalan Box', '2021-05-30 05:56:06', 'Aktif'),
(3, 'Siapa saja yang telah menggunakan vendor CV. Rahayu Putra?', 'Perusahaan kami telah bekerjasama sebagai salah satu vendor box dari PT Asahimas Flat Glass Tbk.', '2021-05-30 05:56:59', 'Aktif'),
(4, 'Apakah CV. Rahayu Putra memiliki hasil pekerjaan yang berkualitas?', 'Kami berkomitmen dengan pelayanan yang terbaik dan kualitas yang terbaik kepada perusahaan-perusahaan yang memerlukan produk kami dan untuk memastikan memenuhi kebutuhan mitra kami. Motto : Terpercaya, Berkualitas & Berintegritas.', '2021-05-30 05:58:35', 'Aktif'),
(5, 'Apakah soal dan pembahasan TryOut bisa didownload?', 'Soal dan pembahasan Try Out UTBK online TryoutMandiri tidak bisa didownload atau dicetak, tetapi soal dan pembahasan akan tersimpan terus di akun kamu supaya bisa kamu gunakan untuk belajar.', '2021-05-30 06:02:58', 'Terhapus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `Id_Galeri` bigint NOT NULL,
  `Id_Pengguna` bigint NOT NULL,
  `Judul_Galeri` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Foto_Galeri` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Waktu_Terakhir_Update` datetime DEFAULT NULL,
  `Waktu_Simpan_Data` datetime NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_galeri`
--

INSERT INTO `tb_galeri` (`Id_Galeri`, `Id_Pengguna`, `Judul_Galeri`, `Keterangan`, `Foto_Galeri`, `Waktu_Terakhir_Update`, `Waktu_Simpan_Data`, `Status`) VALUES
(1, 1, 'Galeri 1', 'Kegiatan CV. Rahayu Putra melakukan pembuatan Pallet Kayu', 'd3ee8cf9bc9101a550cafb6d80f4ef38_1Foto_Galeri.jpg', '2024-02-27 11:19:44', '2024-02-27 11:18:44', 'Aktif'),
(2, 1, 'Galeri 2', 'Karyawan CV. Rahayu Putra', 'd6a886ba701323dc2b4857012e24763d_2Foto_Galeri.jpg', '2024-02-27 11:19:34', '2024-02-27 11:19:20', 'Aktif'),
(3, 1, 'Galeri 3', 'Packing Box Kayu', 'b27a0b9fb259292c4b01942b3bfc3578_3Foto_Galeri.jpg', '2024-02-27 11:20:00', '2024-02-27 11:20:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hubungi_kami`
--

CREATE TABLE `tb_hubungi_kami` (
  `Id_Hubungi_Kami` bigint NOT NULL,
  `Nomor_Hubungi_Kami` varchar(15) NOT NULL,
  `Nama_Lengkap` varchar(50) NOT NULL,
  `Email` text NOT NULL,
  `Nomor_Handphone` varchar(13) NOT NULL,
  `Judul` text NOT NULL,
  `Deskripsi` text NOT NULL,
  `Waktu_Simpan_Data` datetime NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontak`
--

CREATE TABLE `tb_kontak` (
  `Id_Kontak` bigint NOT NULL,
  `Nama` text COLLATE utf8mb4_general_ci NOT NULL,
  `Instansi` text COLLATE utf8mb4_general_ci,
  `Pesan` text COLLATE utf8mb4_general_ci NOT NULL,
  `Email` text COLLATE utf8mb4_general_ci NOT NULL,
  `Follow_Up` text COLLATE utf8mb4_general_ci,
  `Waktu_Simpan_Data` datetime NOT NULL,
  `Status` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kontak`
--

INSERT INTO `tb_kontak` (`Id_Kontak`, `Nama`, `Instansi`, `Pesan`, `Email`, `Follow_Up`, `Waktu_Simpan_Data`, `Status`) VALUES
(1, 'Ari', 'PT. Alva Hill Global', 'Saya ingin memesan packing box kayu sebanyak 2.000 pcs', 'ari@alva.com', NULL, '2024-02-27 04:49:58', 'Aktif'),
(2, 'Irvan', 'PT. Sukidi', 'Saya ingin memesat pallet kayu 1.000 pcs', 'prayudha26@gmail.com', NULL, '2024-02-27 12:29:39', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_newsletter`
--

CREATE TABLE `tb_newsletter` (
  `Id_Newsletter` bigint NOT NULL,
  `Email` text NOT NULL,
  `Waktu_Simpan_Data` datetime NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaturan_website`
--

CREATE TABLE `tb_pengaturan_website` (
  `Id_Pengaturan_Website` int NOT NULL,
  `Judul_Website` text,
  `Deskripsi_Singkat` text,
  `Deksripsi_Lengkap` text,
  `Email_Admin` text,
  `Email_Customer_Service` text,
  `Nomor_Telpon` varchar(13) DEFAULT NULL,
  `Nomor_Handphone` varchar(13) DEFAULT NULL,
  `Alamat_Lengkap` text,
  `Nama_Facebook` text,
  `Url_Facebook` text,
  `Nama_Instagram` text,
  `Url_Instagram` text,
  `Nama_Twitter` text,
  `Url_Twitter` text,
  `Nama_Linkedin` text,
  `Url_Linkedin` text,
  `Nama_Youtube` text,
  `Url_Youtube` text,
  `Embed_Google_Maps` text,
  `Google_Maps_Url` text,
  `Nomor_CS` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Nama_CS` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `CS_Sebagai` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Pesan_CS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengaturan_website`
--

INSERT INTO `tb_pengaturan_website` (`Id_Pengaturan_Website`, `Judul_Website`, `Deskripsi_Singkat`, `Deksripsi_Lengkap`, `Email_Admin`, `Email_Customer_Service`, `Nomor_Telpon`, `Nomor_Handphone`, `Alamat_Lengkap`, `Nama_Facebook`, `Url_Facebook`, `Nama_Instagram`, `Url_Instagram`, `Nama_Twitter`, `Url_Twitter`, `Nama_Linkedin`, `Url_Linkedin`, `Nama_Youtube`, `Url_Youtube`, `Embed_Google_Maps`, `Google_Maps_Url`, `Nomor_CS`, `Nama_CS`, `CS_Sebagai`, `Pesan_CS`) VALUES
(1, 'CV. Rahayu Putra', 'CV Rahayu Putra berdiri 11 November 2016, di Leuwisadeng, Kabupaten Bogor. \r\nUsaha ini berawal dari tahun 1996, bergerak di bidang industri penggergajian kayu bistek/ckd. Saat tahun 2004 sampai saat ini, usaha ini berubah menjadi usaha pallet/packing box.', 'Pada bulan November tahun 2016 kami membentuk badan usaha Commanditaire Vennotschaap atau bisa disebut CV, dengan nama CV Rahayu Putra. \r\nPerusahaan kami telah bekerjasama sebagai salah satu vendor box dari PT Asahimas Flat Glass Tbk. \r\n\r\nKami berkomitmen dengan pelayanan yang terbaik dan kualitas yang terbaik kepada perusahaan-perusahaan yang memerlukan produk kami dan untuk memastikan memenuhi kebutuhan mitra kami. Motto : Terpercaya, Berkualitas & Berintegritas. \r\n\r\nTiga nilai Motto kami Terpercaya, Berkualitas & Berintegritas adalah inti perusahaan kami. Tiga nilai operasional tersebut menjadi dasar perusahaan kami dalam membuat produk yang sesuai standar mitra kami.', 'rahayuputra54@gmail.com', 'rahayuputra54@gmail.com', '085891600488', '085891600488', 'Kp Peuteuy, Leuwisadeng, Kab Bogor, Jawa Barat, 16281', '', '', '', '', '', '', '', '', '', '', '!1m14!1m12!1m3!1d247.7273851817259!2d106.6128568084504!3d-6.56727134351262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1709005439660!5m2!1sen!2sid', 'https://maps.app.goo.gl/jQRB3LJmJiHpn5cx8', '85891600488', 'Iqbal Ibrahim', 'Owner', 'Halo Selamat Datang di CV. Rahayu Putra, Silahkan beritahu kami jika anda terkendala masalah teknis atau administrasi lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tentang_kami`
--

CREATE TABLE `tb_tentang_kami` (
  `Id_Tentang_Kami` int NOT NULL,
  `Visi` text NOT NULL,
  `Misi` text NOT NULL,
  `Motto` text NOT NULL,
  `Sejarah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Sejarah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Waktu_Simpan_Data` datetime NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_tentang_kami`
--

INSERT INTO `tb_tentang_kami` (`Id_Tentang_Kami`, `Visi`, `Misi`, `Motto`, `Sejarah`, `Sejarah`, `Waktu_Simpan_Data`, `Status`) VALUES
(1, 'Menjadi perusahaan yang profesional.', '1. Mewujudkan perusahaan yang handal dalam pembuatan Pallet/Glass Packing Box.\r\n2. ⁠Memberikan kualitas produk yang terbaik.\r\n3. Memberikan manfaat yang nyata bagi seluruh pemangku kepentingan (stakeholder) perusahaan baik pimpinan, karyawan, masyarakat dan lingkungan.', 'Terpercaya, Berkualitas & Berintegritas', 'Try Out Mandiri Adalah Sebuah Pelaksanaan Ujian Yang Dilakukan Sebagai Tahap Uji Coba Untuk Mengetahui Sejauh Mana Tingkat Pemahaman Peserta Didik Yang Didasarkan Atas Standar Kompetensi Lulusan (SKL) Sesuai Dengan Permendiknas Diatas.', 'CV Rahayu Putra berdiri 11 November 2016, di Leuwisadeng, Kabupaten Bogor.\r\nUsaha ini berawal dari tahun 1996, bergerak di bidang industri penggergajian kayu bistek/ckd. Saat tahun 2004 sampai saat ini, usaha ini berubah menjadi usaha pallet/packing box.\r\n\r\nPada bulan November tahun 2016 kami membentuk badan usaha Commanditaire Vennotschaap atau bisa disebut CV, dengan nama CV Rahayu Putra.\r\n\r\nUsaha yang di jalankan CV Rahayu Putra :\r\n1. Wooden Pallet (Pallet Kayu)\r\n2. ⁠Glass Packing Box (Kotak Kemasan Kaca)\r\n3. ⁠Siku/Bantalan Box', '2024-02-27 11:08:29', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `Id_Testimoni` bigint NOT NULL,
  `Nama` text NOT NULL,
  `Instansi` text NOT NULL,
  `Testimoni` text NOT NULL,
  `Rating` text NOT NULL,
  `Foto` text,
  `Waktu_Simpan_Data` datetime NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_testimoni`
--

INSERT INTO `tb_testimoni` (`Id_Testimoni`, `Nama`, `Instansi`, `Testimoni`, `Rating`, `Foto`, `Waktu_Simpan_Data`, `Status`) VALUES
(1, 'Ghifary Ilham', 'Revolter Clothing', 'Packing Box rapi, pengerjaan cepat, kualitas terjamin', '5', '29882b436a897cf2ce1118194c35d178_1_Foto.png', '2021-06-01 07:17:23', 'Aktif'),
(2, 'Irvan', 'PT. Asahimas Flat Glass. Tbk', 'Good product, Good quality, Good performance', '5', '2e02981eb0774e8331fe1dde9f776925_2_Foto.png', '2021-06-01 07:19:55', 'Aktif'),
(3, 'Nazma', 'Universitas Indonesia', 'Masuk UI bukan berarti nggak belajar. Tapi sering ikut TryOut membuat kita percaya diri dalam menghadapi UTBK', '5', '8754a8a3b3940ebd438eeb27a0591d9e_3_Foto.png', '2021-07-20 21:26:04', 'Terhapus Permanen'),
(4, 'Rahmat Hidayat', 'Customer Leuwisadeng', 'Puas banget bikin packing box kayu disini, Top!', '5', '03b835fd7b638e1ad35feea51ebcdf53_4_Foto.png', '2021-08-06 03:47:39', 'Aktif'),
(5, 'Robby', '', 'Perusahaan yang profesional, sesuai dengan visi misi nya', '3', '355818d0ce7f5c24e29b78a8d3386c95_5_Foto.jpg', '2024-02-27 12:30:16', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`Id_Admin`);

--
-- Indexes for table `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD PRIMARY KEY (`Id_Banner`);

--
-- Indexes for table `tb_blog_artikel`
--
ALTER TABLE `tb_blog_artikel`
  ADD PRIMARY KEY (`Id_Blog_Artikel`);

--
-- Indexes for table `tb_data_role`
--
ALTER TABLE `tb_data_role`
  ADD PRIMARY KEY (`Id_Role`);

--
-- Indexes for table `tb_data_role_crud`
--
ALTER TABLE `tb_data_role_crud`
  ADD PRIMARY KEY (`Id_Role_CRUD`);

--
-- Indexes for table `tb_faq`
--
ALTER TABLE `tb_faq`
  ADD PRIMARY KEY (`Id_Faq`);

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`Id_Galeri`);

--
-- Indexes for table `tb_hubungi_kami`
--
ALTER TABLE `tb_hubungi_kami`
  ADD PRIMARY KEY (`Id_Hubungi_Kami`);

--
-- Indexes for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  ADD PRIMARY KEY (`Id_Kontak`);

--
-- Indexes for table `tb_newsletter`
--
ALTER TABLE `tb_newsletter`
  ADD PRIMARY KEY (`Id_Newsletter`);

--
-- Indexes for table `tb_pengaturan_website`
--
ALTER TABLE `tb_pengaturan_website`
  ADD PRIMARY KEY (`Id_Pengaturan_Website`);

--
-- Indexes for table `tb_tentang_kami`
--
ALTER TABLE `tb_tentang_kami`
  ADD PRIMARY KEY (`Id_Tentang_Kami`);

--
-- Indexes for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`Id_Testimoni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `Id_Admin` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `Id_Banner` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_blog_artikel`
--
ALTER TABLE `tb_blog_artikel`
  MODIFY `Id_Blog_Artikel` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_data_role`
--
ALTER TABLE `tb_data_role`
  MODIFY `Id_Role` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_data_role_crud`
--
ALTER TABLE `tb_data_role_crud`
  MODIFY `Id_Role_CRUD` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_faq`
--
ALTER TABLE `tb_faq`
  MODIFY `Id_Faq` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `Id_Galeri` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_hubungi_kami`
--
ALTER TABLE `tb_hubungi_kami`
  MODIFY `Id_Hubungi_Kami` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  MODIFY `Id_Kontak` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_newsletter`
--
ALTER TABLE `tb_newsletter`
  MODIFY `Id_Newsletter` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tentang_kami`
--
ALTER TABLE `tb_tentang_kami`
  MODIFY `Id_Tentang_Kami` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  MODIFY `Id_Testimoni` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
