-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 05:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sahabateducation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(1000) NOT NULL,
  `admin_pass` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin@username', 'admin@password'),
(2, 'admin@sahabateducation.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `cou_id` int(11) NOT NULL,
  `cou_name` varchar(1000) NOT NULL,
  `cou_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`cou_id`, `cou_name`, `cou_created`) VALUES
(71, 'PROGRAMMING', '2024-05-18 14:58:37'),
(72, 'KALKULUS', '2024-05-18 14:59:01'),
(73, 'BAHASA INDONESIA', '2024-05-18 14:59:15'),
(74, 'MATHEMATIC', '2024-05-18 14:59:29');

-- --------------------------------------------------------

--
-- Table structure for table `examinee_tbl`
--

CREATE TABLE `examinee_tbl` (
  `exmne_id` int(11) NOT NULL,
  `exmne_fullname` varchar(1000) NOT NULL,
  `exmne_course` varchar(1000) NOT NULL,
  `exam` varchar(1000) NOT NULL,
  `exmne_gender` varchar(1000) NOT NULL,
  `exmne_birthdate` varchar(1000) NOT NULL,
  `exmne_school` varchar(1000) NOT NULL,
  `exmne_year_level` varchar(1000) NOT NULL,
  `exmne_email` varchar(1000) NOT NULL,
  `exmne_password` varchar(1000) NOT NULL,
  `exmne_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `examinee_tbl`
--

INSERT INTO `examinee_tbl` (`exmne_id`, `exmne_fullname`, `exmne_course`, `exam`, `exmne_gender`, `exmne_birthdate`, `exmne_school`, `exmne_year_level`, `exmne_email`, `exmne_password`, `exmne_status`) VALUES
(26, 'test1', '[\"71\",\"72\",\"73\",\"74\"]', '[\"36\",\"38\",\"40\",\"42\"]', 'laki-laki', '2024-05-09', 'SMA Pamulang', 'sma', 'test1@mail.com', '123', 'active'),
(27, 'test2', '[\"73\",\"74\"]', '[\"35\",\"37\"]', 'perempuan', '2024-05-14', 'SD Muhamadiyah', 'sd', 'test2@mail.com', '123', 'active'),
(28, 'test3', '[\"71\",\"72\"]', '[\"39\",\"41\"]', 'laki-laki', '2024-05-01', 'SMP Gunung Kidul', 'smp', 'test3@mail.com', '123', 'active'),
(29, 'test4', '[\"73\"]', '[\"38\"]', 'perempuan', '2024-05-05', 'MA Sukoharjo', 'sma', 'test4@mail.com', '123', 'active'),
(30, 'test5', '[\"71\",\"74\"]', '[\"35\",\"41\"]', 'laki-laki', '2024-05-02', 'MA Parung', 'sma', 'test5@mail.com', '123', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `exans_id` int(11) NOT NULL,
  `axmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `exans_answer` varchar(1000) NOT NULL,
  `exans_status` varchar(1000) NOT NULL DEFAULT 'new',
  `exans_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_answers`
--

INSERT INTO `exam_answers` (`exans_id`, `axmne_id`, `exam_id`, `quest_id`, `exans_answer`, `exans_status`, `exans_created`) VALUES
(334, 26, 42, 67, 'Ulangi langkah B sampai hanya ada satu elemen di tumpukan, yang merupakan hasil akhir.', 'new', '2024-05-24 06:50:42'),
(335, 26, 42, 66, 'Pencarian biner', 'new', '2024-05-24 06:50:42'),
(336, 26, 38, 55, 'Deklaratif', 'new', '2024-05-24 06:54:57'),
(337, 26, 38, 54, 'Simile', 'new', '2024-05-24 06:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attempt`
--

CREATE TABLE `exam_attempt` (
  `examat_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `examat_status` varchar(1000) NOT NULL DEFAULT 'used'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_attempt`
--

INSERT INTO `exam_attempt` (`examat_id`, `exmne_id`, `exam_id`, `examat_status`) VALUES
(66, 26, 42, 'used'),
(67, 26, 38, 'used');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question_tbl`
--

CREATE TABLE `exam_question_tbl` (
  `eqt_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_question` varchar(1000) NOT NULL,
  `exam_ch1` varchar(1000) NOT NULL,
  `exam_ch2` varchar(1000) NOT NULL,
  `exam_ch3` varchar(1000) NOT NULL,
  `exam_ch4` varchar(1000) NOT NULL,
  `exam_answer` varchar(1000) NOT NULL,
  `exam_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_question_tbl`
--

INSERT INTO `exam_question_tbl` (`eqt_id`, `exam_id`, `exam_question`, `exam_ch1`, `exam_ch2`, `exam_ch3`, `exam_ch4`, `exam_answer`, `exam_status`) VALUES
(52, 37, 'Kalimat berikut yang menggunakan kata tanya dengan tepat adalah ....', 'Kapan kamu pergi ke sekolah?', 'Saya pergi ke sekolah.', 'Apa kamu senang belajar?', 'Kamu suka makan apa?', 'Kapan kamu pergi ke sekolah?', 'active'),
(53, 37, 'Lawan kata dari kata \"besar\" adalah ....', 'Jauh', 'Tinggi', 'Kecil', 'Tebal', 'Kecil', 'active'),
(54, 38, 'Bacalah paragraf berikut dengan seksama:      \r\nDi tengah hiruk pikuk kota, terdapat sebuah taman kecil yang menjadi oasis bagi para pengunjungnya. Taman ini dihiasi dengan berbagai jenis bunga dan pepohonan yang rindang. Sebuah air mancur kecil di tengah taman memancarkan suara gemericik air yang menenangkan. Di beberapa sudut taman, terdapat bangku-bangku kayu yang dapat digunakan untuk duduk dan bersantai. Taman ini menjadi tempat yang ideal untuk melarikan diri dari keramaian kota dan menikmati ketenangan alam.  \r\nMajas yang paling dominan dalam paragraf tersebut adalah ....', ' Hiperbola', 'Simile', 'Personifikasi', 'Metafora', 'Simile', 'active'),
(55, 38, 'Bacalah kalimat berikut:\r\n\r\n    \"Meskipun badai menerjang, semangat para pahlawan tidak pernah padam.\"\r\n\r\nKalimat tersebut termasuk dalam jenis kalimat ....', 'Eksklamasif', 'Imperatif', 'Interogatif', 'Deklaratif', 'Deklaratif', 'active'),
(56, 39, 'Diketahui fungsi f(x) = x^2 + 2x - 3. Tentukan nilai turunan pertama dari fungsi f(x) di titik x = 1.', '1', '3', '5', '7', '5', 'active'),
(57, 39, 'Diketahui integral f(x) dx = 2x^3 + 3x^2 + C. Tentukan nilai integral f(x) dx dari x = 1 sampai x = 2.', '18', '24', '30', '36', '24', 'active'),
(58, 40, 'Diketahui fungsi f(x, y) = x^2 + 2xy + y^2. Hitunglah gradien dari fungsi f di titik P(1, 2).', '(2, 4)', '(3, 5)', '(4, 6)', '(5, 7)', '(2, 4)', 'active'),
(59, 40, 'Diketahui integral ganda âˆ«âˆ«_R f(x, y) dA, di mana R adalah daerah yang dibatasi oleh garis x = 0, y = 0, x = 1, dan y = 2. Hitunglah nilai integral ganda tersebut jika f(x, y) = x + y.', '3', '4', '5', '6', '4', 'active'),
(60, 35, 'Sebuah toko buku menjual buku dengan harga Rp 10.000 per buku. Jika kamu membeli 5 buku, berapa total yang harus kamu bayar?', 'Rp 70.000', 'Rp 60.000', 'Rp 40.000', 'Rp 50.000', 'Rp 50.000', 'active'),
(61, 35, 'Sebuah mobil melaju dengan kecepatan 60 km/jam selama 2 jam. Berapa jarak yang ditempuh mobil tersebut?', '120 km', '240 km', '180 km', '300 km', '240 km', 'active'),
(62, 36, 'Diketahui persamaan garis l: 2x - 3y + 5 = 0 dan l\': 3x + 4y - 11 = 0. Titik potong kedua garis tersebut adalah ....', '(1,2)', '(2,3)', '(3,4)', '(4,5)', '(1,2)', 'active'),
(63, 36, 'Diketahui fungsi f(x) = x^3 - 2x^2 + 5x - 3. Nilai maksimum dari fungsi f(x) pada interval [0, 2] adalah ....', '3', '4', '5', '6', '5', 'active'),
(64, 41, 'Bahasa pemrograman mana yang paling banyak digunakan di dunia pada tahun 2024?', 'Javascript', 'Java', 'C++', 'Python', 'Python', 'active'),
(65, 41, 'Berikut adalah kode program untuk menghitung luas persegi panjang:\r\n\r\npanjang = float(input(\"Masukkan panjang: \"))\r\nlebar = float(input(\"Masukkan lebar: \"))\r\nluas = panjang * lebar\r\nprint(\"Luas persegi panjang:\", luas)\r\n\r\nApa yang akan dicetak oleh program ini jika pengguna memasukkan panjang 5 dan lebar 3?', '8', '3', '15', '5', '15', 'active'),
(66, 42, 'Algoritma apa yang paling efisien untuk mencari elemen dalam array yang tidak diurut?', 'Pencarian linear', 'Pencarian biner', 'Insertion sort', 'Selection sort', 'Pencarian biner', 'active'),
(67, 42, 'Berikut adalah kode program untuk mengimplementasikan struktur data tumpukan (stack):\r\n\r\nclass Stack:\r\n  def __init__(self):\r\n    self.items = []\r\n\r\n  def push(self, item):\r\n    self.items.append(item)\r\n\r\n  def pop(self):\r\n    if not self.items:\r\n      raise IndexError(\"Stack is empty\")\r\n    return self.items.pop()\r\n\r\n  def is_empty(self):\r\n    return not self.items\r\n\r\nBagaimana cara menggunakan kelas Stack ini untuk menghitung nilai ekspresi postfix 3 + 4 * 2 / ( 1 - 5 ) ^ 2 ^ 3?', 'Lakukan semua langkah di atas dalam urutan yang berlawanan.', 'Ulangi langkah B sampai hanya ada satu elemen di tumpukan, yang merupakan hasil akhir.', 'Keluarkan dua token teratas dari tumpukan, lakukan operasi yang sesuai, dan masukkan hasilnya kembali ke tumpukan.', 'Buat tumpukan dan masukkan setiap token ekspresi postfix ke dalam tumpukan.', 'Ulangi langkah B sampai hanya ada satu elemen di tumpukan, yang merupakan hasil akhir.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `exam_tbl`
--

CREATE TABLE `exam_tbl` (
  `ex_id` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  `ex_title` varchar(1000) NOT NULL,
  `ex_time_limit` varchar(1000) NOT NULL,
  `ex_questlimit_display` int(11) NOT NULL,
  `ex_description` varchar(1000) NOT NULL,
  `ex_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exam_tbl`
--

INSERT INTO `exam_tbl` (`ex_id`, `cou_id`, `ex_title`, `ex_time_limit`, `ex_questlimit_display`, `ex_description`, `ex_created`) VALUES
(35, 74, 'matematika dasar', '90', 2, 'dasar dari matematika ', '2024-05-24 06:29:15'),
(36, 74, 'matematika lanjutan', '120', 2, 'perkembangan lebih lanjut pada matematika', '2024-05-24 04:15:40'),
(37, 73, 'bahasa indonesia dasar', '30', 2, 'dasar bahasa indonesia', '2024-05-24 04:20:08'),
(38, 73, 'bahasa indonesia lanjutan', '120', 2, 'perkembanagan lebih lanjut pada materi', '2024-05-24 04:26:56'),
(39, 72, 'kalkulus dasar', '150', 2, 'dasar dari kalkulus', '2024-05-24 06:25:09'),
(40, 72, 'kalkulus lanjutan', '180', 2, 'perkembangan lanjutan kalkulus', '2024-05-24 06:27:26'),
(41, 71, 'Programming dasar', '120', 2, 'dasar programming', '2024-05-24 06:34:42'),
(42, 71, 'programming lanjutan', '90', 2, 'lanjutan programming dasar', '2024-05-24 06:37:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indexes for table `examinee_tbl`
--
ALTER TABLE `examinee_tbl`
  ADD PRIMARY KEY (`exmne_id`);

--
-- Indexes for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`exans_id`);

--
-- Indexes for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  ADD PRIMARY KEY (`examat_id`);

--
-- Indexes for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  ADD PRIMARY KEY (`eqt_id`);

--
-- Indexes for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD PRIMARY KEY (`ex_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `examinee_tbl`
--
ALTER TABLE `examinee_tbl`
  MODIFY `exmne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `exans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  MODIFY `examat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  MODIFY `eqt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
