-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2016 at 09:14 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fajarlabs`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(5) NOT NULL,
  `tema` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tema_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_agenda` text COLLATE latin1_general_ci NOT NULL,
  `tempat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pengirim` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_posting` date NOT NULL,
  `jam` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(5) NOT NULL,
  `jdl_album` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `album_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `gbr_album` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `hits_album` int(5) NOT NULL DEFAULT '1',
  `tgl_posting` date NOT NULL,
  `jam` time NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `jdl_album`, `album_seo`, `keterangan`, `gbr_album`, `aktif`, `hits_album`, `tgl_posting`, `jam`, `hari`, `username`) VALUES
(36, 'Galeri-1', 'galeri1', 'Galeri 1\r\n', '', 'Y', 1, '2016-10-15', '23:25:17', 'Sabtu', ''),
(37, 'Galeri-2', 'galeri2', 'Galeri 2\r\n', '', 'Y', 1, '2016-10-15', '23:25:28', 'Sabtu', '');

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE `background` (
  `id_background` int(5) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`id_background`, `gambar`) VALUES
(1, 'bg-blue.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(17, 'Komunitas 80an', 'http://komunitas80an.blogspot.com', '80an.jpg', '2011-06-26'),
(14, 'Beta UFO Indonesia', '', 'betaufo.jpg', '2011-06-22'),
(18, 'Lokomedia', 'http://bukulokomedia.com', 'lokomedia2.jpg', '2011-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `sub_judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `youtube` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `headline` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `utama` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `isi_berita` text COLLATE latin1_general_ci NOT NULL,
  `keterangan_gambar` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `sub_judul`, `youtube`, `judul_seo`, `headline`, `aktif`, `utama`, `isi_berita`, `keterangan_gambar`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`) VALUES
(658, 59, '', 'Potret Kecantikan Air Terjun Sipiso-piso', 'Jalan wisata air terjun', '', 'potret-kecantikan-air-terjun-sipisopiso', 'N', 'Y', 'N', '<p>\r\nSelain Danau Toba, objek wisata unggulan lainnya dan menjadi salah satu \r\nandalan Sumatera Utara adalah Air Terjun Sipiso-piso. Beginilah \r\npotretnya.\r\n</p>\r\n<p>\r\n<b>Air Terjun Sipiso-piso</b> merupakan salah satu tempat wisata di <a href="http://www.gosumatra.com/" title="Menjelajah Pulau Sumatera yang Menakjubkan">Pulau Sumatera</a>.\r\nBerada di Kabupaten Karo, Sumatera Utara, yang tidak begitu jauh dari \r\npemukiman penduduk Desa Tongging. Air terjun ini berada di perbukitan \r\ndengan ketinggian sekitar 800 mdpl dan dikelilingi oleh hutan pinus. \r\nPengelolaan wisata alam air terjun ini dipegang oleh Pemda Kabupaten \r\nKaro. Dengan memiliki ketinggian sekitar 120 meter, <a href="http://www.gosumatra.com/air-terjun-sipiso-piso/" title="Air Terjun Sipiso-piso">Air Terjun Sipiso-piso</a> merupakan salah satu<i> air terjun tertinggi di Indonesia</i>.\r\nDengan adanya air terjun ini, Kabupaten Karo menjadi salah satu tempat \r\nwisata yang paling diminati oleh para wisatawan domestik dan \r\nmancanegara. \r\n</p>\r\n', '', 'Minggu', '2016-10-16', '11:29:25', '27Air-Terjun-Sipiso-piso-Kabanjahe.jpg', 0, ''),
(660, 58, '', 'Marquez Juara Dunia MotoGP 2016', 'MotoGP Jepan', '', 'marquez-juara-dunia-motogp-2016', 'Y', 'N', 'N', '<b>Motegi</b> - Marc Marquez memastikan titel juara dunia MotoGP 2016 di MotoGP Jepang setelah Valentino Rossi dan Jorge Lorenzo <i>out </i>dari balapan usai terjatuh.<br />\r\n<br />\r\nBalapan\r\ndi Motegi, Minggu (16/10/2016) siang WIB, langsung berlangsung seru \r\nketika Rossi dan Lorenzo (Movistar Yamaha), dan Marquez (Repsol Honda) \r\nyang menempati baris start terdepan sudah terlibat adu cepat selepas \r\nstart.<br />\r\n<br />\r\nKetiga rider itu kemudian juga terus meluncur di posisi \r\npaling depan. Tapi pada prosesnya Rossi justru meluncur keluar lintasan \r\ndan akhirnya out dari balapan pada putaran tujuh. Padahal saat itu ia \r\nmenempati posisi dua di belakang Marquez.<br />\r\n<br />\r\nDengan lima putaran \r\ntersisa, giliran Lorenzo yang terjatuh ketika menempati posisi dua. \r\nKenyataan tersebut membuat Marquez di ambang gelar juara dunia.<br />\r\n<br />\r\nPada\r\nakhirnya Marquez benar-benar meluncur paling duluan melintasi garis \r\nfinis. Ia memenangi balapan, diikuti Andrea Dovizioso (Ducati) dan rider\r\nSuzuki Ecstar Maveric Vinales.<br />\r\n<br />\r\nHasil tersebut membuat Marquez \r\nkini mengoleksi 273 poin. Ia dipastikan tak lagi bisa terkejar oleh \r\nRossi (196 poin) dan Lorenzo (182) di papan klasemen meskipun masih ada \r\ntiga seri tersisa.\r\n', '', 'Minggu', '2016-10-16', '12:51:26', '85marquest.jpg', 0, ''),
(659, 0, '', 'Kalau Bosan ke Pantai di Bali, Coba Coffee Tasting di Sanur', 'Jalan jalan ke Bali', '', 'kalau-bosan-ke-pantai-di-bali-coba-coffee-tasting-di-sanur', 'N', 'Y', 'N', '<p>\r\n<b>Sanur</b> -         Liburan ke Pantai Sanur di Bali mungkin\r\nsudah mainstream. Sesekali, traveler bisa mencoba aktivitas liburan \r\nyang tak kalah menyenangkan yaitu coffee tasting.<br />\r\n<br />\r\nCoffee tasting \r\natau coffee cupping menjadi salah satu aktivitas yang bisa traveler \r\nikuti di Rumah Sanur, Jl Danau Poso no 51 A, Sanur, Bali. detikTravel \r\nsempat berkunjung ke sana pada Jumat (14/10/2016) kemarin, dalam \r\nrangkaian acara Media Fam Trip Artotel Sanur Bali.\r\n</p>\r\nRumah Sanur \r\nsendiri merupakan sebuah creative hub, yang bisa dibilang sebagai wadah \r\nberkumpulnya orang-orang atau komunitas kreatif untuk saling bertukar \r\nilmu. Ini disebut-sebut sebagai creative hub pertama di Bali.<br />\r\n<p>\r\n&quot;Rumah\r\nSanur bisa dibilang sebagai tempat ketiga bagi komunitas. Tempat \r\npertama rumah, kedua itu kantor. Di sini tak harus terikat, mau ngobrol,\r\nmau keluarkan idenya kita sangat terbuka,&quot; ujar Inar Andrea Prakosa, \r\nEvent &amp; Partnership Manager Rumah Sanur kepada awak media di Rumah \r\nSanur.\r\n</p>\r\n', '', 'Minggu', '2016-10-16', '11:32:47', '88kopi.jpg', 0, ''),
(661, 57, '', 'Yamaha YZF-R6 Generasi Terbaru Dijual Mulai Rp 159 Jutaan', 'MotorSport Yamaha', 'https://youtu.be/r3AUGm2z3vw', 'yamaha-yzfr6-generasi-terbaru-dijual-mulai-rp-159-jutaan', 'Y', 'N', 'N', '<b>Jakarta&nbsp;</b>-Yamaha baru-baru ini telah merilis YZF-R6 \r\nmodel 2017. Sudah lebih dari 10 tahun sejak kelahiran R6 generasi yang \r\nada saat ini, akhirnya Yamaha meluncurkan generasi terbarunya. <br />\r\n<br />\r\nYZF-R6\r\nbakal lebih bertenaga dibanding model sebelumnya. Sasisnya membuat \r\nhandling lebih nyaman dan juga lebih cepat melahap satu putaran di \r\nsirkuit balapan. <br />\r\n<br />\r\nVideo yang dirilis Yamaha Motor Corp \r\nmenampilkan suara serta gambarnya yang ciamik. Dari display instrumennya\r\njuga mengindikasikan penggantian gigi yang lebih cepat dengan sistem \r\nquickshifter. Ada pula fitur seperti kontrol traksi, dan mode \r\nberkendara.<br />\r\n<br />\r\nYamaha mengklaim sistem ride-by-wire Yamaha Chip \r\nControlled Throttle (YCC-T) akan menjadi satu perangkat elektronik yang \r\nmembantu pengendara. Sistem ini mendapat sedikit tenaga yang digas oleh \r\nsi pengendara dan secara instan mengkalkulasi bukaan katup gas yang \r\nideal. Selanjutnya menggerakkan katup gas dan secara aktif mengontrol \r\nvolume intake. <br />\r\n<br />\r\nSistem kontrol traksi membantu si pengendara \r\nmengatur traksi di beberapa kondisi jalan dengan secara cepat memodulasi\r\npembukaan gas, waktu pembakaran, dan volume bensin. Yamaha mengatakan \r\nsistem ini didesain untuk beroperasi lebih cepat dan sangat mudah serta \r\nhanya sedikit gangguan saat melaju, berbeda dengan sistem TC lain yang \r\nmengadaptasi perubahan diameter ban dan grip karena penggunaan ban. <br />\r\n<br />\r\nTerakhir\r\nYamaha sistem D-Mode memungkingkan si pengendara untuk memilih karakter\r\nmesin yang paling optimal untuk situasi berkendara apa pun. Sistem \r\npergantian gigi yang cepat bukan merupakan fitur standar namun bisa \r\ndipesan khusus sesuai permintaan.<br />\r\n<br />\r\nSuspensi depan, swing arm, rem,\r\nroda, dan knalpot rupanya mirip dengan R6 generasi sebelumnya. Namun, \r\nfairing depan memiliki intake port yang mirip dengan motor yang dipakai \r\noleh Valentino Rossi di MotoGP yaitu Yamaha YZR-M1 dengan lampu depan \r\nyang sangat mirip. Lampu-lampu lainnya terlihat sangat ramping. Fairing \r\nbagian belakang, lampu belakang, dan spion juga terlihat mirip dengan \r\nYamaha R1.<br />\r\n<br />\r\nSuspensinya lebih besar dari generasi R6 yang ada saat\r\nini dan memiliki komponen yang sama dengan YZF-R1. Suspensi KYB \r\nberukuran 43 mm lebih besar dari yang sebelumnya 41 mm. Sistem \r\npengereman ABS hadir sebagai fitur standar pada YZF-R6 terbaru.<br />\r\n<br />\r\nSubframenya\r\ndiuat dari magnesium, begitupun dengan tangki bensinnya yang terbuat \r\ndari aluminum. Hal tersebut dilakukan Yamaha agar bobot lebih ringan. <br />\r\n<br />\r\nYZF-R6\r\ngenerasi terbaru ini dijual dengan harga mulai Rp 159 jutaan dan \r\nditawarkan dalam warna biru khas Yamaha, matte raven black dan \r\nwhite/matte silver. Motor ini mulai dikirimkan ke konsumen mulai Maret \r\n2017 mendatang.\r\n', '', 'Minggu', '2016-10-16', '12:56:06', '81yamaha.jpeg', 0, ''),
(662, 59, '', 'Tugu Cantik di Lombok, Seperti Masjid Menyala!', 'Lombok', '', 'tugu-cantik-di-lombok-seperti-masjid-menyala', 'N', 'N', 'Y', '<b>Lombok Barat</b> -         Tugu Giri Menang Square adalah \r\nlandmark baru yang keren di Lombok Barat. Berada di Bundaran Monumen \r\nGirimenang, tugu ini terlihat seperti masjid yang menyala!<br />\r\n<br />\r\nBundaran\r\nGirimenang yang terletak di Gerung, Kabupaten Lombok Barat, NTB \r\nmendadak ramai dalam waktu belakangan. Hal itu imbas dari dibukanya \r\njalur lingkar yang mengarah ke Bandara Internasional Lombok (BIL).<br />\r\n<br />\r\nLalu\r\nbagaimana penampakannya? Pengamatan detikTravel, Sabtu (15/10/2016) \r\nmalam kemarin, suasana di bundaran yang terkenal dengan julukan bundaran\r\npatung sapi itu ramai oleh pengunjung. Keramaian ini terutama pada saat\r\nmalam hari libur. <br />\r\n<br />\r\nMereka yang datang tentu ingin menghabiskan \r\nmalam libur ini dengan duduk dan kongko bareng para sahabat. Secangkir \r\nkopi, selfie, dan gurauan penuh canda melingkupi keriaan para pengunjung\r\nyang semakin malam bertambah ramai ini.<br />\r\n<br />\r\nMenurut petugas \r\nkepolisian yang berjaga, Bripka Mahardika dari kesatuan Polres Lombok \r\nBarat mengatakan semenjak dibangun Girimenang Square ditengah bundaran \r\nkeramaian mulai hinggap. Hal ini dimulai pada tahun 2012.<br />\r\n<br />\r\n&quot;Terutama malam ya pada hari Sabtu dan Minggu. Kalau hari biasa ya biasa nggak ramai,&quot; ucap Mahardika. <br />\r\n<br />\r\nDari\r\nsisi keamanan, menurut dia relatif landai aman terkendali. Namun, yang \r\njadi kendala adalah ketika bundaran dijadikan lahan parkir.<br />\r\n<br />\r\n&quot;Kita\r\nselalu lakukan penyuluhan untuk tertib parkir. Soalnya kan sudah \r\ndisediakan tempat parkir. Imbasnya ya macet,&quot; jelas Mahardika.\r\n', '', 'Minggu', '2016-10-16', '13:01:17', '96lombok.jpg', 0, ''),
(663, 0, '', 'Tiap Tahun, Banyuwangi Kembangkan 20 Tempat Wisata Baru', 'Banyuwangi', '', 'tiap-tahun-banyuwangi-kembangkan-20-tempat-wisata-baru', 'N', 'N', 'Y', '<b>Banyuwangi</b> -         Banyuwangi, kabupaten di paling \r\ntimur Pulau Jawa ini terus gencar mengembangkan pariwisata. Tiap tahun, \r\nbanyak tempat wisata baru di desa-desanya.<br />\r\n<br />\r\nKabupaten Banyuwangi \r\ntelah bertransportasi menjadi daerah dengan segudang tempat wisata. \r\nMulai tahun depan, destinasi wisata di Kabupaten berjuluk Sunrise of \r\nJava itu semakin beragam dan melimpah. <br />\r\n<br />\r\nPasalnya, pemkab \r\nBanyuwangi berencana untuk mencanangkan gerakan sadar wisata bagi \r\nmasyarakat setempat.  &quot;Banyuwangi ke depan, kita target setiap tahun \r\nkita akan mengembangkan 10 sampai 20 destinasi wisata baru. Yang ini \r\ntidak ada dalam gambar,&quot; kata Plt Kepala Dinas Kebudayaan dan Pariwisata\r\nBanyuwangi, MY Bramuda kepada detikTravel, Sabtu (15/10/2016) kemarin. <br />\r\n<br />\r\n&quot;Artinya\r\nbanyak spot Banyuwangi bisa buat selfie, buat foto-foto sama keluarga, \r\nbanyak yang sebenarnya belum kita kembangkan. Nah pemerintah daerah akan\r\nmengadopsi hal-hal seperti itu,&quot; imbuhnya. <br />\r\n<br />\r\nBramuda mengatakan, \r\nkonsep yang akan dikembangkan nantinya tetap mengusung kearifan lokal \r\nmasyarakat di sekitar objek wisata. Pemda, kata Bram, hanya menyediakan \r\nide dan tempat dalam rencana pengembangan. <br />\r\n<br />\r\n&quot;Kita kembalikan ke \r\ndesa, desalah yang akan memelihara dan mengembangkan itu. Otomatis kalau\r\nada spot di situ kan ada UKM, orang jualan di situ dan ada parkir. Ini \r\nkan merangkul masyarakat juga,&quot; ujar Bram.<br />\r\n<br />\r\nPengembangan yang akan\r\ndilakukan tidak hanya menyentuh wisata alam yang sudah tersedia. Pemkab\r\njuga berencana akan mendirikan desa-desa wisata sebagai penyangga dari \r\nobjek wisata unggulan. <br />\r\n<br />\r\n&quot;Jadi kalau misalkan dia (pengunjung) \r\nturun dari Ijen, nanti desa-desa di sekitarnya bisa buat dia bertahan \r\nlebih lama. Kita kembangkan juga seperti itu. Itu nanti yang tahun 2017 \r\njadi destinasi. Sehingga nanti selalu update dan orang akan selalu rindu\r\nBanyuwangi,&quot; sambungnya. <br />\r\n<br />\r\nBupati Banyuwangi, Abdullah Azwar Anas\r\njuga mendorong percepatan pembangunan Banyuwangi sebagai kota wisata. \r\nAnas bahkan menarik pembahasan itu dalam rapat-rapat yang dipimpinnya. <br />\r\n<br />\r\n&quot;Tahun depan kita akan mulai eksplore 20 tempat wisata baru di Banyuwangi ini,&quot; singgung Anas beberapa waktu lalu. 								<b>(aff/aff)</b>\r\n', '', 'Minggu', '2016-10-16', '13:04:10', '78banyuwangi.jpg', 0, ''),
(664, 59, '', 'Cerita Laut yang Hilang di Asia Tengah', 'Travel', '', 'cerita-laut-yang-hilang-di-asia-tengah', 'N', 'Y', 'Y', '<b>Moynaq</b> -         Pernah dengar nama Laut Aral? \r\nBerlokasi di Asia Tengah, airnya kering dan terus menghilang. Kini \r\ntinggal padang pasir yang banyak bangkai kapal.<br />\r\n<br />\r\nIni kisah dari \r\nUzbekistan. Kisah kota Moynaq di bagian utara Uzebekistan, masuk dalam \r\nwilayah otonomi Karakalpakstan. Dilansir BBC Travel, Jumat (14/10/2016) \r\nKota Moynaq dinilai punya pemandangan paling aneh di dunia.<br />\r\n<br />\r\nPemandangannya\r\nberupa, bangkai-bangkai kapal di tengah-tengah padang pasir. Ya, \r\nbiasanya bangkai-bangkai kapal ada di pinggir laut atau justru di dalam \r\nair bukan?<br />\r\n<br />\r\n<table align="center" class="pic_artikel_sisip_table">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<div align="center" class="pic_artikel_sisip">\r\n			<div align="left" class="pic">\r\n			&nbsp;Ceritanya begini, puluhan tahun silam Kota Moynaq berlokasi di \r\n			pesisir Aral Sea alias Laut Aral. Meski namanya &#39;sea&#39; alias laut, Aral \r\n			adalah sebuah danau luas dengan ukuran 68 ribu km persegi. Laut Aral \r\n			pernah menjadi salah satu dari 4 danau terluas di dunia, memegang \r\n			peranan penting bagi pasokan air tawar untuk wilayah-wilayah di \r\n			Uzebekistan bagian utara dan Kazakhstan bagian selatan.<br />\r\n			</div>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\nPara \r\npenduduknya pun menggantungkan hidup dengan menjadi nelayan. Banyak \r\nkapal besar di pesisir danaunya untuk menangkap ikan. Semua berjalan \r\nnormal, hingga tahun 1960-an muncul bencana yang tak terduga.<br />\r\n<br />\r\nSaat\r\nitu, air Laut Aral pelan-pelan mengering. Tiap tahun terus menerus \r\nkering. Celakanya di Kota Moynaq mengeringnya sangatlah drastis. Bahkan \r\nkini, air di Laut Aral tinggal tersisa 10 persennya saja!<br />\r\n<br />\r\n<table align="center" class="pic_artikel_sisip_table">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<div align="center" class="pic_artikel_sisip">\r\n			<div class="pic">\r\n			<img src="https://s17.postimg.org/v87c41nof/aral3.jpg" alt="Potret Laut Aral dari tahun ke tahun (BBC News)" />\r\n			</div>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<br />\r\n<table align="center" class="pic_artikel_sisip_table">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<div align="center" class="pic_artikel_sisip">\r\n			<div class="pic">\r\n			<img src="https://s17.postimg.org/a8mmyswm7/aral5.png" alt="Dulu, padang pasir ini adalah danau yang luas! (Pascal Mannaerts/BBC Travel)" />\r\n			</div>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<br />\r\nPara peneliti menilai, keringnya air di Laut Aral adalah karena \r\nprogram irigasi pertanian Uni Soviet (sebelum pecah dan menjadi Rusia) \r\nmengalihkan aliran 2 sungai utama Amu Darya dan Syr Darya yang sebagian \r\nbesar digunakan untuk pertanian kapas.<br />\r\n<br />\r\nKetika Uni Soviet pecah, \r\nprogram irigasinya tidak terkontrol dengan baik. Ditambah dengan \r\nperubahan cuaca yang ekstrem, musim panas menjadi lebih panas dan kering\r\nsementara musim dingin berlangsung lebih panjang dengan suhu yang lebih\r\ndingin, air di Laut Aral terus mengering!<br />\r\n<br />\r\n<table align="center" class="pic_artikel_sisip_table">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<div align="center" class="pic_artikel_sisip">\r\n			<div class="pic">\r\n			<img src="https://s17.postimg.org/et8tdqgbj/aral6.png" alt="Suasana Kota Moynaq (Pascal Mannaerts/BBC Travel)" />\r\n			</div>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<br />\r\nKembali ke Kota Moynaq, para penduduknya pun mulai meninggalkan \r\nkotanya. Tercatat, 100 ribu orang angkat kaki dari sana karena sudah tak\r\nbisa lagi menangkap ikan. 18 Ribu orang yang bertahan, terus berharap \r\nagar air kembali mengalir dan pindah haluan dengan berternak dan \r\npenghasil kapas.<br />\r\n<br />\r\nBelum selesai, masalah bagi penduduk Moynaq \r\nlainnya adalah soal kesehatan. Pestisida dan pupuk yang digunakan dalam \r\nproduksi kapas di atas tanahnya ternyata mengandung racun. Racun yang \r\ndapat menyebabkan kanker esophagus yang menyerang pencernaan. Bahkan, \r\ntingkat kanker esophagus di sana adalah 25 kali lebih tinggi dari \r\nrata-rata dunia.<br />\r\n<br />\r\nSelanjutnya soal suhu. Suhu saat siang hari \r\nmampu menyentuh angka hingga 50 derajat Celcius. Saat malam, dinginnya \r\nbukan main dengan suhu yang turun hingga -40 derajat Celcius!<br />\r\n<br />\r\nMaka\r\ndari itu, Kota Moynaq dijuluki kota mati karena pelan-pelan terus \r\nditinggalkan. Namun satu pemandangan yang tertinggal di sana, adalah \r\nbangkai-bangkai kapal di atas padang pasir.<br />\r\n<br />\r\nBangkai-bangkai \r\nkapalnya sudah karatan dan dibiarkan teronggok begitu saja di sana. \r\nMenjadikannya pemandangan yang dinilai paling aneh di dunia, bangkai \r\nkapal di padang pasir!\r\n', '', 'Minggu', '2016-10-16', '13:11:15', '11kapal.jpg', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id_download` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hits` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `judul`, `nama_file`, `tgl_posting`, `hits`) VALUES
(3, 'Membuat Shopping Cart dengan PHP', 'shopping cart.pdf', '2009-02-17', 16),
(5, 'Skrip Captcha', 'captcha.rar', '2009-02-06', 15),
(1, 'Kalender Tahun 2009', 'kalender2009.rar', '2009-02-06', 19),
(8, 'Wallpaper PHP', 'PHP_weapon.jpg', '2009-10-28', 37),
(9, 'Slide  Pemrograman VBA Excell', 'Excell_VBA.ppt', '2009-11-03', 24);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(5) NOT NULL,
  `id_album` int(5) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `jdl_gallery` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gallery_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `gbr_gallery` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_album`, `username`, `jdl_gallery`, `gallery_seo`, `keterangan`, `gbr_gallery`) VALUES
(257, 36, '', 'Air Terjun Sipo2', 'air-terjun-sipo2', '', '73Air-Terjun-Sipiso-piso-Kabanjahe.jpg'),
(256, 36, '', 'Wisata Lombok', 'wisata-lombok', '', '35lombok.jpg'),
(255, 36, '', 'Kapal Di Padang Pasir', 'kapal-di-padang-pasir', '', '90kapal1.jpg'),
(258, 37, '', 'Banyuwangi', 'banyuwangi', '', '1banyuwangi.jpg'),
(259, 37, '', 'Kopi', 'kopi', '', '82kopi.jpg'),
(260, 37, '', 'Marquest', 'marquest', '', '91marquest.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `halamanstatis`
--

CREATE TABLE `halamanstatis` (
  `id_halaman` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `jam` time NOT NULL,
  `hari` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `tgl_posting`, `gambar`, `username`, `dibaca`, `jam`, `hari`) VALUES
(50, 'profile', 'profile', '<h2 class="tittle-one font-satisfy">Profil</h2>\r\n<div class="about-text">\r\n<div class="col-md-6 about-text-left">\r\n<div class="history-grid-image">\r\n<img height="170" width="400" src="../editor/gambar/Image/metro-green.png" alt=" " />\r\n</div>\r\n</div>\r\n<div class="col-md-6 about-text-right">\r\n<h4>MetroGreen Solution Startup Bussines in 2016</h4>\r\n<p>\r\nKami adalah sebuah perusahaan startup yang bergerak dalam bidang photography dan bidang informasi terkini seputar pariwisata. \r\n</p>\r\n<p>\r\nTujuan kami adalah untuk memperkenalkan keanekaragaman dan budaya indonesia.\r\n</p>\r\n<ul>\r\n	<li><a href="singlepage.html">Photography.</a></li>\r\n	<li><a href="singlepage.html">Politik</a></li>\r\n	<li><a href="singlepage.html">Travelling.</a></li>\r\n</ul>\r\n</div>\r\n<div class="clearfix">\r\n</div>\r\n</div>\r\n', '2016-10-15', '', 'admin', 0, '23:28:07', 'Sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id_header` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id_header`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(31, 'Header3', '', 'header3.jpg', '2011-04-06'),
(32, 'Header2', '', 'header1.jpg', '2011-04-06'),
(33, 'Header1', '', 'header2.jpg', '2011-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE `hubungi` (
  `id_hubungi` int(5) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `dibaca` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `subjek`, `pesan`, `tanggal`, `jam`, `dibaca`) VALUES
(34, 'Ridwan', 'ridwan@gmail.com', 'Mohon di review lagi', 'Ini psan user', '2016-10-16', '10:40:01', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(5) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `facebook` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `rekening` varchar(100) NOT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `email`, `url`, `facebook`, `rekening`, `no_telp`, `meta_deskripsi`, `meta_keyword`, `favicon`) VALUES
(1, 'Fajarlabs.com The Power Of ReCloning', 'admin@fajarlabs.com', 'http://localhost/fajarlabs', '', '', '089663159652', 'fajarlabs.com Situs Tutorial & Sharing', 'java, php, c, c++, tips & trik', 'github.png');

-- --------------------------------------------------------

--
-- Table structure for table `iklanatas`
--

CREATE TABLE `iklanatas` (
  `id_iklanatas` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `iklantengah`
--

CREATE TABLE `iklantengah` (
  `id_iklantengah` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `katajelek`
--

CREATE TABLE `katajelek` (
  `id_jelek` int(11) NOT NULL,
  `kata` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ganti` varchar(60) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `username`, `kategori_seo`, `aktif`) VALUES
(59, 'Travel & Wisata', '', 'travel--wisata', 'Y'),
(58, 'Olahraga', '', 'olahraga', 'Y'),
(57, 'Bisnis', '', 'bisnis', 'Y'),
(55, 'Politik', '', 'politik', 'Y'),
(56, 'Kulinary', '', 'kulinary', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `kode_html`
--

CREATE TABLE `kode_html` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `html` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_html`
--

INSERT INTO `kode_html` (`id`, `judul`, `kode`, `html`) VALUES
(12, 'Kontak Kami', 'kode-1', '<h3>Kontak Kami</h3>\r\n<table>\r\n	<tbody>\r\n		<tr valign="top">\r\n			<td colspan="2" style="padding-right: 5px">\r\n			<img height="80px" src="../logo/metro-green.png" /><br />\r\n			</td>\r\n		</tr>\r\n		<tr valign="top">\r\n			<td style="padding-right: 5px"><i class="icon-envelope"></i><br />\r\n			</td>\r\n			<td>namaemail@microsoft.com</td>\r\n		</tr>\r\n		<tr valign="top">\r\n			<td style="padding-right: 5px"><i class="icon-home"></i><br />\r\n			</td>\r\n			<td>Jalan Margonda Raya No. 54, Pancoran Mas, Kota Depok, Jawa Barat 16431, Indonesia</td>\r\n		</tr>\r\n		<tr valign="top">\r\n			<td style="padding-right: 5px"><i class="icon-phone"></i><br />\r\n			</td>\r\n			<td>+62 21 7773610</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(13, 'Visi & Misi', 'kode-13', '<div data-wow-delay=".5s" class="col-md-3 wel-left animated wow fadeInLeft">\r\n<img height="128" width="128" src="../editor/gambar/Image/target.png" alt=" " />\r\n<h4>VISI</h4>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<ol style="text-align: left">\r\n	<li>Menjadi Perusahaan Pelayaran yang Tangguh dan Pilihan Utama Pelanggan</li>\r\n</ol>\r\n<p>\r\n&nbsp;\r\n</p>\r\n</div>\r\n<div data-wow-delay=".5s" class="col-md-3 wel-left animated wow fadeInUp animated">\r\n<img height="128" width="128" src="../editor/gambar/Image/stats.png" alt=" " />\r\n<h4>MISI</h4>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<ol style="text-align: left">\r\n	<li>Mengelola dan mengembangkan angkutan laut guna menjamin aksesibilitas masyarakat untuk menunjang terwujudnya wawasan nusantara</li>\r\n	<li>\r\n	Meningkatkan kontribusi pendapatan bagi negara, karyawan\r\n	serta berperan di dalam pembangunan lingkungan dan pelayanan kepada masyarakat</li>\r\n	<li>Meningkatkan Produktifitas<br />\r\n	</li>\r\n</ol>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<ol style="text-align: left">\r\n</ol>\r\n<p>\r\n&nbsp;\r\n</p>\r\n</div>\r\n'),
(14, 'Selamat Datang (Kanan)', 'kode-14', '<div data-wow-delay=".5s" class="col-md-6 wel-right animated wow fadeInRight">\r\n<div class="wel-tp">\r\n<h3 class="font-satisfy">Selamat datang!</h3>\r\n<h4> Portal Paling Eksis Masa Kini!</h4>\r\n<p>\r\n<img height="85" width="200" src="../logo/metro-green.png" alt=" " /> \r\n</p>\r\n<p>\r\nIndeks berita dan galeri terbaru hari ini dari peristiwa, kecelakaan, kriminal, hukum, berita unik, Politik, dan liputan khusus di Indonesia dan Mancanegara.\r\n</p>\r\n</div>\r\n</div>\r\n'),
(15, 'Video Populer', 'kode-15', '<div class="history-grid-image">\r\n<iframe frameborder="0" height="309" width="550" src="https://www.youtube.com/embed/r3AUGm2z3vw"></iframe>\r\n</div>\r\n'),
(16, 'Ikuti Kami', 'kode-16', '<h3>Ikuti Kami</h3>\r\n<ul>\r\n	<li><a href="#">Facebook</a></li>\r\n	<li><a href="#">Twitter</a></li>\r\n	<li><a href="#">Google +</a></li>\r\n	<li><a href="#">Skype</a></li>\r\n</ul>\r\n'),
(17, 'Copyright', 'kode-17', '<div class="copy-right">\r\n<p class="animated wow fadeInRight" data-wow-delay=".5s">\r\n&copy; 2016 Web Portal . All rights reserved | Design by  <a href="http://w3layouts.com/" target="_blank">  W3layouts </a>\r\n</p>\r\n<div class="copy-rights animated wow fadeInLeft" data-wow-delay=".5s">\r\n<ul>\r\n	<li><a href="#"><span class="fa"> </span></a></li>\r\n	<li><a href="#"><span class="tw"> </span></a></li>\r\n	<li><a href="#"><span class="g"> </span></a></li>\r\n</ul>\r\n<div class="clearfix">\r\n</div>\r\n</div>\r\n</div>\r\n'),
(18, 'Profile (Bawah)', 'kode-18', '<h3>Profil</h3>\r\n<p>\r\n[No Data]\r\n</p>\r\n'),
(19, 'Kontak Map & Judul', 'kode-19', '<h2 class="tittle-one font-satisfy">Lihat Lokasi</h2>\r\n<div class="map">\r\n<iframe frameborder="0" height="450" width="600" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6664669606866!2d106.82496411428916!3d-6.175387062231755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sNational+Monument!5e0!3m2!1sen!2sin!4v1476629277090" style="border: 0px none"></iframe>\r\n</div>\r\n<div class="paragraph">\r\n<p>\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. \r\nPraesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. \r\nPhasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus \r\net magnis dis parturient montes, nascetur ridiculus mus. Nulla dui.\r\nFusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, \r\nluctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. \r\nDonec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, \r\nconsectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. \r\nUt tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi\r\net urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus.\r\n</p>\r\n</div>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(5) NOT NULL,
  `id_berita` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentarvid`
--

CREATE TABLE `komentarvid` (
  `id_komentar` int(5) NOT NULL,
  `id_video` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id_logo` int(5) NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `gambar`) VALUES
(15, 'metro-green.png');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(5) NOT NULL,
  `id_parent` int(5) NOT NULL DEFAULT '0',
  `nama_menu` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `aktif_pertama` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `aktif_pertama`) VALUES
(44, 0, '<i class="fa fa-wpforms" aria-hidden="true"></i> Kontak', 'kontak.html', 'Ya', 0),
(43, 0, '<i class="icon-folder-open"></i> Galeri', '#', 'Ya', 0),
(42, 0, '<i class="icon-user"></i> Profil', 'hal-profile.html', 'Ya', 0),
(41, 0, '<i class="icon-home"></i> Beranda', 'index.html', 'Ya', 1),
(46, 43, 'Semua Galeri', 'galeri.html', 'Ya', 0),
(49, 0, 'Semua Artikel', 'semua-artikel.html', 'Ya', 0);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(5) NOT NULL,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `status` enum('user','admin') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int(5) NOT NULL,
  `link_seo` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(2, 'Manajemen User', '', '?module=user', '', '', 'N', 'admin', 'N', 22, ''),
(18, ' Berita', '', '?module=berita', '', '', 'Y', 'user', 'Y', 5, 'semua-berita.html'),
(10, 'Manajemen Modul', '', '?module=modul', '', '', 'N', 'admin', 'N', 23, ''),
(31, 'Kategori Berita ', '', '?module=kategori', '', '', 'Y', 'user', 'Y', 6, ''),
(73, 'Slider Gambar', '', '?module=slidergambar', '', '', 'Y', 'admin', 'Y', 0, ''),
(74, 'Slider Gambar', '', '?module=slidergambar', '', '', 'Y', 'admin', 'Y', 27, ''),
(43, 'Berita Foto', '', '?module=album', '', '', 'Y', 'user', 'Y', 11, ''),
(44, 'Galeri Foto', '', '?module=galeri', '', '', 'Y', 'user', 'Y', 12, ''),
(45, 'Template Web', '', '?module=templates', '', '', 'Y', 'user', 'Y', 16, ''),
(61, 'Identitas Website', '', '?module=identitas', '', '', 'Y', 'user', 'Y', 1, ''),
(57, 'Menu Utama', '', '?module=menuutama', '', '', 'Y', 'user', 'Y', 2, ''),
(59, 'Halaman Baru', '', '?module=halamanstatis', '', '', 'Y', 'user', 'Y', 4, ''),
(66, 'Logo Website', '', '?module=logo', '', '', 'Y', 'user', 'Y', 15, ''),
(75, 'Kode HTML', '', '?module=kodehtml', '', '', 'Y', 'admin', 'Y', 28, ''),
(70, 'Hubungi Kami', '', '?module=hubungi', '', '', 'Y', 'user', 'Y', 24, ''),
(71, 'Artikel Website', 'admin', '?module=artikel', '', '', 'Y', 'admin', 'Y', 25, ''),
(72, 'Kategori Artikel', 'admin', '?module=kategori_artikel', '', '', 'Y', 'admin', 'Y', 26, '');

-- --------------------------------------------------------

--
-- Table structure for table `mod_alamat`
--

CREATE TABLE `mod_alamat` (
  `id_alamat` int(5) NOT NULL,
  `alamat` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mod_alamat`
--

INSERT INTO `mod_alamat` (`id_alamat`, `alamat`) VALUES
(1, '<p>\r\nJl. Kalibata Selatan II/2B\r\n</p>\r\n<p>\r\nJakarta 12740 \r\n</p>\r\n<p>\r\nIndonesia \r\n</p>\r\n<p>\r\nTelp. 021.32972759\r\n</p>\r\n<p>\r\nEmail: <a href="mailto:rizal_fzl@yahoo.com">rizal_fzl@yahoo.com</a> \r\n</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `mod_ym`
--

CREATE TABLE `mod_ym` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `mod_ym`
--

INSERT INTO `mod_ym` (`id`, `nama`, `username`) VALUES
(1, 'Rizal Faizal', 'rizal_fzl');

-- --------------------------------------------------------

--
-- Table structure for table `pasangiklan`
--

CREATE TABLE `pasangiklan` (
  `id_pasangiklan` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id_playlist` int(5) NOT NULL,
  `jdl_playlist` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `playlist_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gbr_playlist` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `jdl_playlist`, `username`, `playlist_seo`, `gbr_playlist`, `aktif`) VALUES
(50, 'POP', '', 'pop', '299267pop.jpg', 'Y'),
(49, 'OLD SCHOOL', '', 'old-school', '89854oldschool.jpg', 'Y'),
(51, 'JAZZ', '', 'jazz', '935169jazz.jpg', 'Y'),
(52, 'ROCK', '', 'rock', '50347Rock.jpg', 'Y'),
(55, 'DANGDUT', '', 'dangdut', '689891dangdut.jpg', 'Y'),
(54, 'DANCE', '', 'dance', '986101dance.jpg', 'Y'),
(56, 'WISATA INDONESIA', 'admin', 'wisata-indonesia', '575958indonesiana.jpg', 'Y'),
(57, 'Serba Serbi', 'admin', 'serba-serbi', '733489serbaserbi.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `poling`
--

CREATE TABLE `poling` (
  `id_poling` int(5) NOT NULL,
  `pilihan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `rating` int(5) NOT NULL DEFAULT '0',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sekilasinfo`
--

CREATE TABLE `sekilasinfo` (
  `id_sekilas` int(5) NOT NULL,
  `info` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `sekilasinfo`
--

INSERT INTO `sekilasinfo` (`id_sekilas`, `info`, `tgl_posting`, `gambar`, `aktif`) VALUES
(1, 'Anak yang mengalami gangguan tidur, cenderung memakai obat2an dan alkohol berlebih saat dewasa.', '2010-04-11', '', 'Y'),
(2, 'WHO merilis, 30 persen anak-anak di dunia kecanduan menonton televisi dan bermain komputer.', '0000-00-00', '', 'Y'),
(3, 'Menurut peneliti di Detroit, orang yang selalu tersenyum lebar cenderung hidup lebih lama.', '2010-04-11', '', 'Y'),
(4, 'Menurut United Stated Trade Representatives, 25% obat yang beredar di Indonesia adalah palsu.', '2010-04-11', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `slider_gambar`
--

CREATE TABLE `slider_gambar` (
  `id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_gambar`
--

INSERT INTO `slider_gambar` (`id`, `gambar`, `judul`, `keterangan`) VALUES
(3, '974456banner-2.jpg', 'Bumi Jakarta', '								<p>Monumen bersejarah di jakarta, visit jakarta</p>\n								<a class="more font-roboto-condensed" href="singlepage.html">Baca selengkapnya</a>'),
(4, '41320banner-3.jpg', 'Ekonomi Jakarta', '<p>Melihat kemajuan jakarta dari sisi ekonomi, visit jakarta</p>\n								<a class="more font-roboto-condensed" href="singlepage.html">Baca selengkapnya</a>'),
(5, '133117banner-1.jpg', 'Wisata Jakarta', '<p>Wisata jakarta sebagai referensi liburan anda, visit jakarta</p>\n								<a class="more font-roboto-condensed" href="singlepage.html">Baca selengkapnya</a>'),
(6, '120239banner-4.jpg', 'Sejarah Kota Jakarta', '<p>\r\nKenali jakarta kenali para pejuangnya lanjutkan perjuangannya, visit jakarta\r\n</p>\r\n<a href="singlepage.html" class="more font-roboto-condensed">Baca selengkapnya</a>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('127.0.0.2', '2009-09-11', 1, '1252681630'),
('127.0.0.1', '2013-01-22', 1, '1358865974'),
('127.0.0.1', '2013-01-23', 14, '1358913313'),
('127.0.0.1', '2013-01-24', 34, '1359046647'),
('127.0.0.1', '2013-01-25', 21, '1359051663'),
('::1', '2016-09-28', 35, '1475074450'),
('::1', '2016-10-08', 7, '1475935487'),
('::1', '2016-10-09', 1, '1476032303'),
('::1', '2016-10-10', 7, '1476072576'),
('::1', '2016-10-12', 1, '1476278931'),
('::1', '2016-10-13', 2, '1476376228'),
('::1', '2016-10-14', 1, '1476415214'),
('::1', '2016-10-15', 14, '1476541920'),
('::1', '2016-10-17', 6, '1476642989');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(5) NOT NULL,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagvid`
--

CREATE TABLE `tagvid` (
  `id_tag` int(5) NOT NULL,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id_templates` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id_templates`, `judul`, `username`, `pembuat`, `folder`, `aktif`) VALUES
(12, 'Web Portal', 'admin', 'Fajarlabs', 'layout/portal', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `foto`, `level`, `blokir`, `id_session`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Fajarlabs', 'admin@fajarlabs.com', '', '78IMG_8399.JPG', 'admin', 'N', 'q173s8hs1jl04st35169ccl8o7'),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Paijo', 'paijo@yahoo.com', '099888777766677', '6IMG_8390.JPG', 'user', 'N', '5bi6b98a7r02hvh15dsog2vfo2');

-- --------------------------------------------------------

--
-- Table structure for table `users_modul`
--

CREATE TABLE `users_modul` (
  `id_umod` int(11) NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `id_modul` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_modul`
--

INSERT INTO `users_modul` (`id_umod`, `id_session`, `id_modul`) VALUES
(88, '5bi6b98a7r02hvh15dsog2vfo2', 44),
(87, '5bi6b98a7r02hvh15dsog2vfo2', 43),
(102, '5bi6b98a7r02hvh15dsog2vfo2', 34),
(80, '5bi6b98a7r02hvh15dsog2vfo2', 18),
(101, '5bi6b98a7r02hvh15dsog2vfo2', 2),
(107, '5bi6b98a7r02hvh15dsog2vfo2', 18),
(108, '5bi6b98a7r02hvh15dsog2vfo2', 31),
(109, '5bi6b98a7r02hvh15dsog2vfo2', 34),
(110, '5bi6b98a7r02hvh15dsog2vfo2', 35),
(111, '5bi6b98a7r02hvh15dsog2vfo2', 43),
(112, '5bi6b98a7r02hvh15dsog2vfo2', 44),
(113, '5bi6b98a7r02hvh15dsog2vfo2', 45),
(114, '5bi6b98a7r02hvh15dsog2vfo2', 46),
(115, '5bi6b98a7r02hvh15dsog2vfo2', 61),
(116, '5bi6b98a7r02hvh15dsog2vfo2', 57),
(117, '5bi6b98a7r02hvh15dsog2vfo2', 58),
(118, '5bi6b98a7r02hvh15dsog2vfo2', 59),
(119, '5bi6b98a7r02hvh15dsog2vfo2', 62),
(120, '5bi6b98a7r02hvh15dsog2vfo2', 64),
(121, '5bi6b98a7r02hvh15dsog2vfo2', 66),
(122, '5bi6b98a7r02hvh15dsog2vfo2', 70),
(134, 'a95c530a7af5f492a74499e70578d150', 35),
(133, 'a95c530a7af5f492a74499e70578d150', 34),
(132, 'a95c530a7af5f492a74499e70578d150', 31),
(131, 'a95c530a7af5f492a74499e70578d150', 18),
(135, 'a95c530a7af5f492a74499e70578d150', 43),
(136, 'q173s8hs1jl04st35169ccl8o7', 0),
(137, '5bi6b98a7r02hvh15dsog2vfo2', 0),
(138, '827ccb0eea8a706c4c34a16891f84e7b', 18),
(139, '827ccb0eea8a706c4c34a16891f84e7b', 31),
(140, '827ccb0eea8a706c4c34a16891f84e7b', 34),
(141, '827ccb0eea8a706c4c34a16891f84e7b', 35),
(142, '827ccb0eea8a706c4c34a16891f84e7b', 43),
(143, '827ccb0eea8a706c4c34a16891f84e7b', 44),
(144, '5bi6b98a7r02hvh15dsog2vfo2', 0),
(145, '', 0),
(146, '467e52c6fcf895ddb55f410b2b09f962', 18),
(147, '467e52c6fcf895ddb55f410b2b09f962', 31),
(148, '467e52c6fcf895ddb55f410b2b09f962', 34);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(5) NOT NULL,
  `id_playlist` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `jdl_video` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `video_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `gbr_video` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `video` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `youtube` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dilihat` int(7) NOT NULL DEFAULT '1',
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `tagvid` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `background`
--
ALTER TABLE `background`
  ADD PRIMARY KEY (`id_background`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id_download`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id_header`);

--
-- Indexes for table `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `iklanatas`
--
ALTER TABLE `iklanatas`
  ADD PRIMARY KEY (`id_iklanatas`);

--
-- Indexes for table `iklantengah`
--
ALTER TABLE `iklantengah`
  ADD PRIMARY KEY (`id_iklantengah`);

--
-- Indexes for table `katajelek`
--
ALTER TABLE `katajelek`
  ADD PRIMARY KEY (`id_jelek`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kode_html`
--
ALTER TABLE `kode_html`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `komentarvid`
--
ALTER TABLE `komentarvid`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `mod_alamat`
--
ALTER TABLE `mod_alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `mod_ym`
--
ALTER TABLE `mod_ym`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasangiklan`
--
ALTER TABLE `pasangiklan`
  ADD PRIMARY KEY (`id_pasangiklan`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id_playlist`);

--
-- Indexes for table `poling`
--
ALTER TABLE `poling`
  ADD PRIMARY KEY (`id_poling`);

--
-- Indexes for table `sekilasinfo`
--
ALTER TABLE `sekilasinfo`
  ADD PRIMARY KEY (`id_sekilas`);

--
-- Indexes for table `slider_gambar`
--
ALTER TABLE `slider_gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `tagvid`
--
ALTER TABLE `tagvid`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id_templates`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `users_modul`
--
ALTER TABLE `users_modul`
  ADD PRIMARY KEY (`id_umod`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `background`
--
ALTER TABLE `background`
  MODIFY `id_background` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=665;
--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id_download` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;
--
-- AUTO_INCREMENT for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  MODIFY `id_halaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id_header` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `id_hubungi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `iklanatas`
--
ALTER TABLE `iklanatas`
  MODIFY `id_iklanatas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `iklantengah`
--
ALTER TABLE `iklantengah`
  MODIFY `id_iklantengah` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `katajelek`
--
ALTER TABLE `katajelek`
  MODIFY `id_jelek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `kode_html`
--
ALTER TABLE `kode_html`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT for table `komentarvid`
--
ALTER TABLE `komentarvid`
  MODIFY `id_komentar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id_logo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `mod_alamat`
--
ALTER TABLE `mod_alamat`
  MODIFY `id_alamat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mod_ym`
--
ALTER TABLE `mod_ym`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pasangiklan`
--
ALTER TABLE `pasangiklan`
  MODIFY `id_pasangiklan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id_playlist` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `poling`
--
ALTER TABLE `poling`
  MODIFY `id_poling` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `sekilasinfo`
--
ALTER TABLE `sekilasinfo`
  MODIFY `id_sekilas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `slider_gambar`
--
ALTER TABLE `slider_gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tagvid`
--
ALTER TABLE `tagvid`
  MODIFY `id_tag` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id_templates` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users_modul`
--
ALTER TABLE `users_modul`
  MODIFY `id_umod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
