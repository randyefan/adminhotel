-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2019 at 05:55 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `IDcustomer` int(11) NOT NULL,
  `customerFname` varchar(20) NOT NULL,
  `customerLname` varchar(20) DEFAULT NULL,
  `customerGender` varchar(2) NOT NULL,
  `customerAddress` varchar(255) NOT NULL,
  `customerCity` varchar(10) NOT NULL,
  `customerPhone` varchar(255) NOT NULL,
  `customeremail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`IDcustomer`, `customerFname`, `customerLname`, `customerGender`, `customerAddress`, `customerCity`, `customerPhone`, `customeremail`) VALUES
(1, 'Randy', 'Efan', 'L', 'Jalan Kaliurang', 'Yogyakarta', '082222214905', 'randyrandyrej8@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `IDbook` int(11) NOT NULL,
  `IDroom` int(11) NOT NULL,
  `namapemesan` varchar(255) NOT NULL,
  `bookdate` date NOT NULL,
  `bookarrivaldate` date NOT NULL,
  `booktotalnight` int(3) NOT NULL,
  `bookdeparturedate` date NOT NULL,
  `booktotalbiaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`IDbook`, `IDroom`, `namapemesan`, `bookdate`, `bookarrivaldate`, `booktotalnight`, `bookdeparturedate`, `booktotalbiaya`) VALUES
(5, 1, 'Randy Efan', '0000-00-00', '0000-00-00', 4, '0000-00-00', 1000000),
(6, 4, 'Kamang', '0000-00-00', '2019-07-09', 3, '2019-07-10', 1000000),
(7, 1, 'Jonson', '0000-00-00', '2019-07-15', 6, '2019-07-10', 4),
(8, 5, 'Kemal', '2019-07-10', '2019-07-31', 5, '2019-07-25', 9000000),
(9, 5, 'Kemal', '2019-07-10', '2019-07-31', 5, '2019-07-25', 9000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotel`
--

CREATE TABLE `tbl_hotel` (
  `IDhotel` int(11) NOT NULL,
  `hotelname` varchar(255) NOT NULL,
  `hoteldesc` varchar(255) NOT NULL,
  `hotelstar` varchar(3) NOT NULL,
  `location` varchar(25) NOT NULL,
  `phonenumber` varchar(12) NOT NULL,
  `hotelpict` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hotel`
--

INSERT INTO `tbl_hotel` (`IDhotel`, `hotelname`, `hoteldesc`, `hotelstar`, `location`, `phonenumber`, `hotelpict`) VALUES
(1, 'Swiss Belhotel Yogyakarta', 'Hotel berbintang 5 yang sudah seperti hunian pribadi dengan harga yang sangat terjangkau per kamarnya.', '5', 'Yogyakarta', '0274-551767', '1269976_16100508330047382976-min'),
(2, 'Hotel Tentrem Yogyakarta', 'Hotel yang menjual kenyamanan seperti berada di rumah sendiri.', '4', 'Yogyakarta', '0274-559856', '1526238451.jpg'),
(3, 'Hotel POP!', 'Hotel terbaik yang berada di tengah kota Jakarta, dekat dengan pusat industri bisnis di Ibukota Indonesia', '4', 'Jakarta', '021-122345', '96863496.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `IDroom` int(11) NOT NULL,
  `roomtipe` varchar(255) NOT NULL,
  `roomharga` int(11) NOT NULL,
  `roompict` varchar(255) DEFAULT NULL,
  `roomcapacity` int(5) NOT NULL,
  `IDhotelroom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`IDroom`, `roomtipe`, `roomharga`, `roompict`, `roomcapacity`, `IDhotelroom`) VALUES
(1, 'Deluxe Room', 500000, 'tentrem-hotel-yogyakarta-home-image081.jpg', 2, 1),
(4, 'Deluxe Room', 450000, 'deluxe-room.jpeg', 2, 2),
(5, 'Luxury Room', 900000, 'services.jpeg', 2, 1),
(6, 'Luxury Room', 300000, '52700767.jpg', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IDuser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `IDcustomeruser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IDuser`, `username`, `password`, `IDcustomeruser`) VALUES
(1, 'RandyEfan', 'Indonesia8', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`IDcustomer`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`IDbook`),
  ADD KEY `fk_book_room` (`IDroom`);

--
-- Indexes for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  ADD PRIMARY KEY (`IDhotel`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`IDroom`),
  ADD KEY `fk_room_hotel` (`IDhotelroom`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDuser`),
  ADD KEY `idcustomeruser` (`IDcustomeruser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `IDcustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `IDbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  MODIFY `IDhotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `IDroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IDuser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `fk_book_room` FOREIGN KEY (`IDroom`) REFERENCES `tbl_room` (`IDroom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD CONSTRAINT `fk_room_hotel` FOREIGN KEY (`IDhotelroom`) REFERENCES `tbl_hotel` (`IDhotel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `idcustomeruser` FOREIGN KEY (`IDcustomeruser`) REFERENCES `customer` (`IDcustomer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
