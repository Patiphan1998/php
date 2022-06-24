-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 12:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `singer`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(5) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Tel` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `confirm_order` int(2) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `OrderDate`, `Name`, `Address`, `Tel`, `Email`, `user_id`, `confirm_order`) VALUES
(36, '2022-02-14 09:28:11', 'user', 'home111222', '0989898989', 'user@test.com', 5, 0),
(35, '2022-02-14 09:24:59', 'user', 'home111222', '0989898989', 'user@test.com', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `DetailID` int(5) NOT NULL,
  `OrderID` int(5) NOT NULL,
  `ProductID` int(4) NOT NULL,
  `Qty` int(3) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`DetailID`, `OrderID`, `ProductID`, `Qty`, `user_id`) VALUES
(55, 36, 23, 1, 5),
(54, 35, 26, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(4) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Price` double NOT NULL,
  `Picture` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `Price`, `Picture`) VALUES
(1, 'Product 1', 100, '1.gif'),
(2, 'Product 2', 200, '2.gif'),
(3, 'Product 3', 300, '3.gif'),
(4, 'Product 4', 400, '4.gif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id` int(11) NOT NULL COMMENT 'รหัส',
  `brand` varchar(50) NOT NULL COMMENT 'แบรนด์',
  `name` varchar(50) NOT NULL COMMENT 'ชื่อสินค้า',
  `pice` int(10) NOT NULL COMMENT 'ราคา',
  `quantity` int(10) NOT NULL COMMENT 'จำนวน',
  `image` varchar(250) NOT NULL COMMENT 'รูปภาพสินค้า',
  `product_detail` varchar(250) NOT NULL COMMENT 'รายละเอียดสินค้า',
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id`, `brand`, `name`, `pice`, `quantity`, `image`, `product_detail`, `status`) VALUES
(14, 'singger', 'แอร์', 18900, 10, '11.png', 'Power supply : 1/220/50\r\n100% capacity : 11,400\r\nค่าประหยัดพลังงาน : 15\r\nขนาดคอล์ยเย็น : 85.5 x 28 x 20 cm.\r\nน้ำหนักคอล์ยเย็น : 10 kg.\r\nขนาดคอล์ยร้อน : 78 x 54 x 24.5 cm.\r\nน้ำหนักคอล์ยร้อน : 25 kg.\r\nประเภทน้ำยาทำความเย็น : R32\r\nแนะนำความสูงในการเดินท', 1),
(15, 'singger', 'แอร์', 21900, 10, '22.png', 'Power supply : 1/220/50\r\n100% capacity : 12,300\r\nค่าประหยัดพลังงาน : 18\r\nขนาดคอล์ยเย็น : 85.5 x 28 x 20 cm.\r\nน้ำหนักคอล์ยเย็น : 10 kg.\r\nขนาดคอล์ยร้อน : 78 x 54 x 24.5 cm.\r\nน้ำหนักคอล์ยร้อน : 26 kg.\r\nประเภทน้ำยาทำความเย็น : R32\r\nแนะนำความสูงในการเดินท', 2),
(16, 'singger', 'แอร์', 28900, 10, '33.PNG', 'Power supply : 1/220/50\r\n100% capacity : 18,000\r\nค่าประหยัดพลังงาน : 18\r\nขนาดคอล์ยเย็น : 97.7 x 32.2 x 23 cm.\r\nน้ำหนักคอล์ยเย็น : 12.5 kg.\r\nขนาดคอล์ยร้อน : 80 x 55.3 x 27.5 cm.\r\nน้ำหนักคอล์ยร้อน : 33.3 kg.\r\nประเภทน้ำยาทำความเย็น : R32\r\nแนะนำความสูงใน', 0),
(17, 'singger', 'ตู้เย็น', 9150, 5, '8.6คิว.PNG', 'ขนาดของตัวเครื่อง ก x ย x ส : 548 x 589 x 1057 มม.\r\nน้ำหนัก : 29 กก.\r\nแบบ 1 ประตู ระบบละลายน้ำแข็งกึ่งอัตโนมัติ\r\nขนาด 5.2 คิว\r\nกระจายความเย็นแบบสม่ำเสมอด้วย Evaporator ด้านในทั้งผ่านในช่องแช่เย็นและช่องแช่แข็ง\r\nน้ำยา R-600a หรือ Isobutene เป็นสารทำคว', 1),
(18, 'singger', 'ตู้เย็น', 10500, 5, '17.1คิว.PNG', 'ขนาดของตัวเครื่อง ก x ย x ส : 548 x 589 x 1222 มม.\r\nน้ำหนัก : 33 กก.\r\nแบบ 1 ประตู ระบบละลายน้ำแข็งกึ่งอัตโนมัติ\r\nขนาด 6.3 คิว\r\nกระจายความเย็นแบบสม่ำเสมอด้วย Evaporator ด้านในทั้งผ่านในช่องแช่เย็นและช่องแช่แข็ง\r\nน้ำยา R-600a หรือ Isobutene เป็นสารทำคว', 2),
(19, 'singger', 'ตู้เย็น', 42900, 4, '19.9คิว.PNG', 'ขนาดของตัวเครื่อง ก x ย x ส : 911 x 706 x 1780 มม.\r\nน้ำหนัก 92 กก.\r\nขนาด 19.9 คิว\r\nน้ำยา R-600a หรือ Isobutene เป็นสารทำความเย็นที่เป็นมิตรต่อสิ่งแวดล้อม\r\nระบบกระจายความเย็นแบบสม่ำเสมอด้วย Evaporator ด้านในทั้งช่องแช่เย็นและช่องแช่แข็ง\r\nได้มาตรฐานการ', 0),
(20, 'singger', 'ตู้เย็น', 17200, 4, '8.6คิว.PNG', 'ขนาดของตัวเครื่อง ก x ย x ส : 551 x 645x1573.5 มม.\r\nน้ำหนัก 47 กก.\r\nแบบ 2 ประตู ระบบละลายน้ำแข็งอัตโนมัติ\r\nขนาด 8.6 คิว\r\nDeodorizer ระบบกำจัดกลิ่นด้วย Charcoal เพื่อไม่ให้มีกลิ่นเหม็นภายในตู้เย็น\r\nน้ำยา R-600a หรือ Isobutene เป็นสารทำความเย็นที่เป็นม', 0),
(21, 'singger', 'ตู้เย็น', 28900, 4, '17.1คิว.PNG', 'ขนาดของตัวเครื่อง ก x ย x ส : 723 x 749 x 1809 มม.\r\nน้ำหนัก 76 กก.\r\nขนาด 17.1 คิว\r\nDeodorizer ระบบกำจัดกลิ่นด้วย Charcoal เพื่อไม่ให้มีกลิ่นเหม็นภายในตู้เย็น\r\nน้ำยา R-600a หรือ Isobutene เป็นสารทำ ความเย็นที่เป็นมิตรต่อสิ่งแวดล้อม\r\nระบบกระจายความเย็น', 0),
(22, 'singger', 'ตู้แช่เครื่องดื่ม', 20500, 5, '1ปต.PNG', 'รุ่น SGPA-1413 ขนาด กxลxส : 615x510x2000 มม. และ 400 ลิตร/ 14.1 คิวบิกฟุตจำนวนชั้นวาง 3-4 ชั้น\r\nระบบควบคุมอุณหภูมิ Mechanical\r\nระบบควบคุมความเย็นเป็นเทอร์โมสาร์ท\r\nประหยัดไฟเบอร์ 5\r\nน้ำยาทำความเย็น R -134a\r\nทำความเย็นได้ 1° ~ 10 °C\r\nรับประกันความเย็น ', 1),
(23, 'singger', 'ตู้แช่เครื่องดื่ม', 45000, 4, '2ปต.PNG', 'รุ่น SGPM-4203 ขนาด กxลxส = 1650 x 600 x 2000 มม. และ 1044 ลิตร/ 42 คิวบิกฟุตขนาด กxลxส = 1650 x 600 x 2000 มม.\r\nน้ำหนักสุทธิ 155 กก.\r\nจำนวนชั้นวาง 15 ชั้น\r\nมีเทอร์โมมิเตอร์แสดงอุณหภูมิ\r\nปริมาตร 1044 ลิตร / 42 คิวบิกฟุต\r\nระบบควบคุมความเย็นเป็น Electr', 2),
(24, 'singger', 'ตู้แช่เครื่องดื่ม', 46500, 3, '3ปต.PNG', 'รุ่รุ่น SGDM-2703 ขนาด กxลxส = 1100x600x2000 มม. และ 680 ลิตร/ 27คิวบิกฟุตขนาด กxลxส = 1100x600x2000 มม.\r\nน้ำหนักสุทธิ 135 กก.\r\nจำนวนชั้นวาง 10 ชั้นการควบคุม\r\nมีเทอร์โมมิเตอร์แสดงอุณหภูมิ\r\nปริมาตร 680 ลิตร / 27คิวบิกฟุต\r\nระบบควบคุมความเย็นเป็น Electr', 0),
(25, 'singger', 'ตู้แช่เครื่องดื่ม', 23900, 3, '4ปต.PNG', 'ขนาด 43 นิ้ว\r\nความละเอียด 1920 x 1080 pixels ระดับ Full HDจอคุณภาพสูง คมชัด สมจริง\r\nชัดเจนด้วยระบบกรองความถี่แบบดิจิตอล\r\nสะดวกด้วยช่องต่อ HDMI, AV, PC และ USB\r\nระบบ Smart TV เชื่อมต่อ Internet ได้\r\nสามารถตั้งเวลาเปิดปิด และอัดรายการทีวีล่วงหน้าผ่าน U', 0),
(26, 'singger', 'ทีวี', 14900, 2, 'tv.PNG', 'ขนาด 32 นิ้ว\r\nความละเอียด 1366 x 768 pixels ระดับ HD Readyจอคุณภาพสูง คมชัด สมจริง\r\nชัดเจนด้วยระบบกรองความถี่แบบดิจิตอล\r\nสะดวกด้วยช่องต่อ HDMI, AV, PC และ USB\r\nระบบ Smart TV เชื่อมต่อ Internet ได้\r\nสามารถตั้งเวลาเปิดปิด และอัดรายการทีวีล่วงหน้าผ่าน U', 1),
(27, 'singger', 'ตู้น้ำมัน', 105000, 10, '5.PNG', 'โครงตู้ : เหล็กหนาพิเศษ พ่นอบสีกันสนิมอย่างดี (Proxy) ออกแบบถูกต้องตามข้อกำหนดของกรมธุรกิจพลังงาน\r\nขนาดตู้ : 1 X 2.3 เมตร (กว้าง X สูง)\r\nขนาดถัง : ถังบรรจุน้ำมันขนาด 200 ลิตร\r\nชุดหัวจ่ายน้ำมัน : ระบบหัวจ่ายน้ำมันอัตโนมัติ (Automatic Nozzle) มาตรฐานเด', 2),
(28, 'singger', 'ตู้แช่หมู', 151200, 3, '262231996_247074564158101_2075572527606231634_n.jpg', 'กว้าง1.8ม.*0.85.*1ม.แถมฟรีถาด12 ชิ้น', 1),
(29, 'singger', 'ตู้แช่เบียร์', 15000, 2, '265977137_251437723721785_6293783052644202388_n.jpg', 'รุ่น SGSH-0715 ขนาด กxลxส : 905x550 x 850 มม., 200 ลิตร/ 7.1 คิวบิกฟุต ใส่เบียร์ได้ 90 ขวดมีเทอร์โมมิเตอร์แสดงอุณหภูมิ\r\nระบบควบคุมอุณหภูมิ Electronic\r\nน้ำยาทำความเย็น R600a\r\nทำความเย็นได้ -2°~ -8°C\r\nรับประกันความเย็น 1 ปี\r\nรับประกันคอมเพรสเซอร์ 5 ปี', 0),
(30, 'singger', 'ตู้แช่เบียร์', 18600, 2, '266679046_251437787055112_1821148874990462958_n.jpg', 'รุ่น SGSH-1245 ขนาด กxลxส 1120x700 x 850 มม., 350 ลิตร/ 12.4 คิวบิกฟุต ใส่เบียร์ได้ 120 ขวดแสดงอุณหภูมิ\r\nระบบควบคุมอุณหภูมิ Electronic\r\nน้ำยาทำความเย็น R600a\r\nทำความเย็นได้ -2°~ -8°C\r\nรับประกันความเย็น 1 ปี\r\nรับประกันคอมเพรสเซอร์ 5 ปี', 1),
(31, 'singger', 'ตู้แช่เค้ก', 18500, 3, '1.PNG', 'รุ่น SGKK-0907 ขนาด กxลxส : 900x730 x 1325 มม.จำนวนชั้นวาง 3 ชั้น\r\nมีเทอร์โมมิเตอร์แสดงอุณหภูมิ\r\nปริมาตร 1190 ลิตร\r\nระบบควบคุมอุณหภูมิ Electronic\r\nน้ำยาทำความเย็น R-134a\r\nทำความเย็นได้ 5° ~ 15 °C\r\nรับประกันความเย็น 1 ปี\r\nรับประกันคอมเพรสเซอร์ 5 ปี', 0),
(32, 'singger', 'ตู้แช่เค้ก', 22000, 3, '237814269_178063174392574_1829758758681416163_n.jpg', 'รุ่น SGKK-1207 ขนาด กxลxส : 1200x730x 1325 มม.จำนวนชั้นวาง 3 ชั้น\r\nมีเทอร์โมมิเตอร์แสดงอุณหภูมิ\r\nปริมาตร 1190 ลิตร\r\nระบบควบคุมอุณหภูมิ Electronic\r\nน้ำยาทำความเย็น R-134a\r\nทำความเย็นได้ 5° ~ 15 °C\r\nรับประกันความเย็น 1 ปี\r\nรับประกันคอมเพรสเซอร์ 5 ปี', 2),
(33, 'singger', 'เครื่องซักผ้า', 10800, 5, 'ถังเดียว9.1ล.PNG', 'แบบถังเดี่ยวอัตโนมัติ ขนาด 9.5 kg.\r\nถังซักทำจากสแตนเลส พื้นผิวออกแบบลายหัวเพชรช่วยซักผ้าให้สะอาดยิ่งขึ้นมีโปรแกรมการทำงานให้เลือกหลากหลาย และตั้งเวลาซักล่วงหน้าได้\r\nโปรแกรมควบคุมอัตโนมัติระบบ ฟัชซี่ ลอจิก ช่วยให้งานซักเป็นเรื่องง่ายเพียงปลายนิ้วสัมผั', 1),
(34, 'singger', 'เครื่องซักผ้า', 13800, 5, 'ถังเดียว15ก.PNG', 'แบบถังเดี่ยวอัตโนมัติ ขนาด 15 kg.\r\nถังซักทำจากสแตนเลส พื้นผิวออกแบบลายหัวเพชรช่วยซักผ้าให้สะอาดยิ่งขึ้นมีโปรแกรมการทำงานให้เลือกหลากหลาย และตั้งเวลาซักล่วงหน้าได้\r\nโปรแกรมควบคุมอัตโนมัติระบบ ฟัชซี่ ลอจิก ช่วยให้งานซักเป็นเรื่องง่ายเพียงปลายนิ้วสัมผัส', 0),
(35, 'singger', 'เครื่องซักผ้า', 6240, 5, 'ถังคู่2ถัง11ก.PNG', 'แบบ 2 ถังกึ่งอัตโนมัติ ขนาด 7.5 kg.\r\nขนาด 830 x 510 x 990 มม.\r\nน้ำหนัก 25.5 kg.\r\nรอบมอเตอร์ปั่นเร็วถึง 1,200 รอบถังแบบ 2 ชั้น แข็งแรงทนทาน ไม่เป็นสนิม\r\nลูกบิดดีไซน์ใหม่ ด้วยวัสดุโครเมี่ยม\r\nปั่นแห้งไวกว่าเดิม ด้วยระบบดึงลงเป่าจากภายนอก\r\nเลือกฟังก์ชั่น', 2),
(36, 'singger', 'เครื่องซักผ้า', 15000, 5, 'ถังคู่15ล.PNG', 'แบบ 2 ถังกึ่งอัตโนมัติ ขนาด 11 kg.\r\nขนาด 960 x 570 x 1085 มม.\r\nรอบมอเตอร์ปั่นเร็วถึง 1,200 รอบ\r\nรับประกัน 2 ปีถังแบบ 2 ชั้น แข็งแรงทนทาน ไม่เป็นสนิม\r\nปั่นแห้งไวกว่าเดิม ด้วยระบบดึงลงเป่าจากภายนอก\r\nลูกบิดดีไซน์ใหม่ ด้วยวัสดุโครเมี่ยม\r\nเลือกฟังก์ชั่นกา', 0),
(37, 'singger', 'เครื่องซักผ้า', 14000, 4, 'ถังคู่15ล.PNG', 'แบบ 2 ถังกึ่งอัตโนมัติ ขนาด 13 kg.\r\nขนาด 960 x 570 x 1085 มม.\r\nน้ำหนัก 32.5 kg.\r\nรอบมอเตอร์ปั่นเร็วถึง 1,200 รอบ\r\nรับประกัน 2 ปีถังแบบ 2 ชั้น แข็งแรงทนทาน ไม่เป็นสนิม\r\nปั่นแห้งไวกว่าเดิม ด้วยระบบดึงลงเป่าจากภายนอก\r\nลูกบิดดีไซน์ใหม่ ด้วยวัสดุโครเมี่ยม', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_promote`
--

CREATE TABLE `tb_promote` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_image` varchar(250) NOT NULL,
  `pro_status` int(2) NOT NULL DEFAULT 1 COMMENT '0 = ไม่ใช้งาน\r\n1 = ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_promote`
--

INSERT INTO `tb_promote` (`id`, `pro_name`, `pro_image`, `pro_status`) VALUES
(6, 'promote1', '1.jpg', 1),
(7, 'promote2', '2.jpg', 1),
(8, 'promote3', '267028253_251437757055115_8979443536675206973_n.jpg', 1),
(9, 'promote4', '263659059_247074627491428_1931281383291137739_n.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `email`, `password`, `address`, `tel`, `status`) VALUES
(1, 'admin', 'admin@test.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ซุ้มโจร 509', '0925728232', 1),
(2, 'taem', 'taem@test.com', '81dc9bdb52d04dc20036dbd8313ed055', 'อยู่ห้องabcd55566', '0985686158', 0),
(4, 'bee', 'bee@test.com', '81dc9bdb52d04dc20036dbd8313ed055', 'dfdfdfdfdfd', '0985556677', 0),
(5, 'user', 'user@test.com', '81dc9bdb52d04dc20036dbd8313ed055', 'home111222', '0989898989', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`DetailID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_promote`
--
ALTER TABLE `tb_promote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `DetailID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_promote`
--
ALTER TABLE `tb_promote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
