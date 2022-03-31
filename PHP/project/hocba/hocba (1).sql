-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 15, 2021 lúc 09:06 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hocba`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CursorDiemtb` (IN `id_hocsinh` INT, IN `id_monhoc` INT, IN `id_gv` INT, OUT `Diem` FLOAT)  BEGIN
	DECLARE Diemtk1 float DEFAULT 0;
    DECLARE Diemtk2 float DEFAULT 0;
    DECLARE Diem15plan1 float DEFAULT 0;
    DECLARE Diem15plan2 float DEFAULT 0;
    DECLARE Diemgk float DEFAULT 0;
    DECLARE Diemck float DEFAULT 0;
    DECLARE Diemtb float DEFAULT 0;
    SELECT bangdiem.Diemtk1 ,bangdiem.Diemtk2,bangdiem.Diem15plan1,
    bangdiem.Diem15plan2,bangdiem.Diemgk,bangdiem.Diemck
    INTO 
    Diemtk1,
    Diemtk2,
    Diem15plan1,
    Diem15plan2,
    Diemgk,
    Diemck
    FROM bangdiem
    WHERE bangdiem.id_mshs=id_hocsinh and bangdiem.id_msmh=id_monhoc and bangdiem.id_msgv=id_gv;
    set Diem =  Diemtk1+Diemtk2;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CursorProc` ()  BEGIN

        DECLARE  no_more_products, quantity_in_stock INT DEFAULT 0;

        DECLARE  prd_code VARCHAR(255);

        DECLARE  cur_product CURSOR FOR

               SELECT  productCode FROM products;

        DECLARE  CONTINUE HANDLER FOR NOT FOUND

        SET  no_more_products = 1;

 

        /* for  loggging information */

         CREATE  TABLE infologs (

                Id int(11) NOT NULL AUTO_INCREMENT,

               Msg varchar(255) NOT NULL,

               PRIMARY KEY (Id)

        );

        OPEN  cur_product;

 

        FETCH  cur_product INTO prd_code;

        REPEAT

               SELECT  quantityInStock INTO quantity_in_stock

               FROM  products

               WHERE  productCode = prd_code;

 

               IF  quantity_in_stock < 100 THEN

                       INSERT  INTO infologs(msg)

                       VALUES  (prd_code);

               END  IF;

               FETCH  cur_product INTO prd_code;

        UNTIL  no_more_products = 1

        END REPEAT;

        CLOSE  cur_product;

        SELECT *  FROM infologs;

        DROP TABLE  infologs;

 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Cursor_siso` ()  BEGIN
		DECLARE malop INT (11) DEFAULT 0;

        DECLARE siso INT (11) DEFAULT 0;
        DECLARE v_Count Integer;
        DECLARE v_Found Integer;

        DECLARE  cur_siso CURSOR FOR

        SELECT lop.id_lop,lop.siso  productCode FROM lop;

        DECLARE CONTINUE HANDLER FOR NOT FOUND Set v_Found = 0;
        Set v_Count = 0;
        OPEN cur_siso;
        My_Loop : LOOP
        if v_Found = 0 then
          Leave My_Loop;
        End if;
        fetch cur_siso into malop,siso;
        UPDATE lop 
        set siso = (SELECT COUNT(hocsinh.id_hocsinh)
                   	from hocsinh
                   	WHERE hocsinh.id_malop=malop)
        WHERE lop.id_lop=malop;
        Set v_Count = v_Count +1;
 		end loop My_Loop;

 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Diemtb` (IN `id_hocsinh` INT, IN `id_monhoc` INT, IN `id_gv` INT, IN `id_mshk` INT)  BEGIN
	DECLARE Diemtk1 float DEFAULT 0;
    DECLARE Diemtk2 float DEFAULT 0;
    DECLARE Diem15plan1 float DEFAULT 0;
    DECLARE Diem15plan2 float DEFAULT 0;
    DECLARE Diemgk float DEFAULT 0;
    DECLARE Diemck float DEFAULT 0;
    DECLARE Diemtb float DEFAULT 0;
    SELECT bangdiem.Diemtk1 ,bangdiem.Diemtk2,bangdiem.Diem15plan1,
    bangdiem.Diem15plan2,bangdiem.Diemgk,bangdiem.Diemck
    INTO 
    Diemtk1,
    Diemtk2,
    Diem15plan1,
    Diem15plan2,
    Diemgk,
    Diemck
    FROM bangdiem
    WHERE bangdiem.id_mshs=id_hocsinh and bangdiem.id_msmh=id_monhoc and bangdiem.id_msgv=id_gv and bangdiem.id_mshk =id_mshk;
    if (Diemtk1=0 OR Diemtk2=0 or Diem15plan1=0 or Diem15plan2=0 or Diemgk=0 or Diemck=0) 
    THEN
   	 SET Diemtb=0;
     ELSE 
     set Diemtb = ((Diemtk1+Diemtk2+Diem15plan1+Diem15plan2)+(2*Diemgk)+(3*Diemck))/ 							                          9 ;

     END IF;
 
     UPDATE bangdiem 
     SET bangdiem.Diemtb = Round(Diemtb,1)
   	 WHERE bangdiem.id_mshs = id_hocsinh and bangdiem.id_msmh = id_monhoc and bangdiem.id_msgv = id_gv and bangdiem.id_mshk=id_mshk;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `myProcedure` (`id` INT)  BEGIN  
   SELECT * FROM board
     -- add where condition if required
    WHERE Col_name = id
   ;  
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_admin`
--

CREATE TABLE `account_admin` (
  `id` int(11) NOT NULL,
  `taikhoan` varchar(30) DEFAULT NULL,
  `matkhau` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account_admin`
--

INSERT INTO `account_admin` (`id`, `taikhoan`, `matkhau`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_gv`
--

CREATE TABLE `account_gv` (
  `id` int(11) NOT NULL,
  `taikhoan` varchar(30) NOT NULL,
  `matkhau` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account_gv`
--

INSERT INTO `account_gv` (`id`, `taikhoan`, `matkhau`) VALUES
(10006, 'giaovien1', 'giaovien'),
(10007, 'giaovien2', 'giaovien'),
(10008, 'giaovien3', 'giaovien'),
(10009, 'giaovien4', 'giaovien'),
(10011, 'giaovien5', 'giaovien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_hs`
--

CREATE TABLE `account_hs` (
  `id` int(11) NOT NULL,
  `taikhoan` varchar(30) NOT NULL,
  `matkhau` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account_hs`
--

INSERT INTO `account_hs` (`id`, `taikhoan`, `matkhau`) VALUES
(573864, 'hocsinh1', 'hocsinh'),
(623775, 'hocsinh2', 'hocsinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangdiem`
--

CREATE TABLE `bangdiem` (
  `id_bangdiem` int(11) NOT NULL,
  `id_mshs` int(11) NOT NULL,
  `id_msmh` int(11) NOT NULL,
  `id_lop` int(11) DEFAULT NULL,
  `id_mshk` int(11) DEFAULT NULL,
  `Diemtk1` float DEFAULT NULL,
  `Diemtk2` float DEFAULT NULL,
  `Diem15plan1` float DEFAULT NULL,
  `Diem15plan2` float DEFAULT NULL,
  `Diemgk` float DEFAULT NULL,
  `Diemck` float DEFAULT NULL,
  `Diemtb` float DEFAULT NULL,
  `id_msgv` int(11) NOT NULL,
  `capnhat` varchar(11) NOT NULL DEFAULT 'Không'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bangdiem`
--

INSERT INTO `bangdiem` (`id_bangdiem`, `id_mshs`, `id_msmh`, `id_lop`, `id_mshk`, `Diemtk1`, `Diemtk2`, `Diem15plan1`, `Diem15plan2`, `Diemgk`, `Diemck`, `Diemtb`, `id_msgv`, `capnhat`) VALUES
(115, 573864, 10011, 1016, 1001, 1, 1, 1, 1, 1, 1, 1, 10006, 'Không'),
(116, 573864, 10011, 1016, 1002, 9, 8, 7, 6, 5, 4, 5.8, 10006, 'có'),
(117, 573864, 10010, 1016, 1001, 5, 8, 7, 6, 5, 5, 5.7, 10007, 'Không'),
(118, 573864, 10010, 1016, 1002, 7, 6, 8, 8, 7, 6, 6.8, 10007, 'Không'),
(119, 573864, 10013, 1016, 1001, 8, 7, 6, 9, 9, 10, 8.7, 10008, 'Không'),
(120, 573864, 10013, 1016, 1002, 9, 8, 10, 10, 7, 6, 7.7, 10008, 'Không'),
(121, 573864, 10012, 1016, 1001, 10, 9, 9, 8, 9, 10, 9.3, 10009, 'co'),
(122, 573864, 10012, 1016, 1002, 8, 9, 6, 10, 9, 9, 8.7, 10009, 'Không'),
(123, 573864, 10014, 1016, 1001, 2, 2, 2, 2, 2, 2, 2, 10011, 'Không'),
(124, 573864, 10014, 1016, 1002, 10, 8, 6, 5, 10, 8, 8.1, 10011, 'Không'),
(126, 573864, 10011, 1017, 1003, 10, 8, 10, 7, 10, 9, 9.1, 10006, 'Không'),
(127, 573864, 10010, 1017, 1003, 7, 8, 10, 9, 10, 7, 8.3, 10007, 'Không'),
(128, 573864, 10013, 1017, 1003, 9, 10, 8, 7, 10, 10, 9.3, 10008, 'Không'),
(129, 573864, 10012, 1017, 1003, 9, 8, 7, 9, 10, 10, 9.2, 10009, 'Không'),
(130, 573864, 10014, 1017, 1003, 10, 9, 10, 9, 10, 9, 9.4, 10011, 'Không'),
(132, 573864, 10011, 1017, 1004, 9, 7, 8, 8, 9, 10, 8.9, 10006, 'Không'),
(133, 573864, 10010, 1017, 1004, 8, 8, 10, 9, 6, 10, 8.6, 10007, 'Không'),
(134, 573864, 10013, 1017, 1004, 9, 10, 10, 9, 10, 9, 9.4, 10008, 'Không'),
(135, 573864, 10012, 1017, 1004, 9, 8, 9, 10, 9, 8, 8.7, 10009, 'Không'),
(136, 573864, 10014, 1017, 1004, 9, 8, 7, 6, 5, 10, 7.8, 10011, 'Không'),
(137, 573864, 10011, 1021, 1005, 9, 8, 9, 9, 10, 8, 8.8, 10006, 'Không'),
(138, 573864, 10011, 1021, 1006, 9, 8, 7, 5, 9, 8, 7.9, 10006, 'Không'),
(139, 573864, 10010, 1021, 1005, 9, 8, 9, 10, 8, 7, 8.1, 10007, 'Không'),
(140, 573864, 10010, 1021, 1006, 9, 8, 9, 10, 8, 7, 8.1, 10007, 'Không'),
(141, 573864, 10013, 1021, 1005, 9, 8, 8, 10, 9, 9, 8.9, 10008, 'Không'),
(142, 573864, 10013, 1021, 1006, 8, 8, 7, 9, 10, 8, 8.4, 10008, 'Không'),
(143, 573864, 10012, 1021, 1005, 9, 8, 10, 7, 10, 9, 9, 10009, 'Không'),
(144, 573864, 10012, 1021, 1006, 9, 8, 7, 6, 10, 10, 8.9, 10009, 'Không'),
(145, 573864, 10014, 1021, 1005, 9, 9, 8, 9, 10, 8, 8.8, 10011, 'Không'),
(146, 573864, 10014, 1021, 1006, 9, 8, 8, 9, 10, 7, 8.3, 10011, 'Không'),
(147, 623775, 10011, 1016, 1001, 10, 10, 10, 10, 10, 10, 10, 10006, 'Không'),
(148, 623775, 10011, 1016, 1002, 7, 7, 7, 7, 7, 7, 7, 10006, 'Không'),
(149, 623775, 10013, 1016, 1002, 6, 6, 6, 6, 6, 6, 6, 10008, 'Không'),
(150, 623775, 10013, 1016, 1001, 5, 5, 5, 5, 5, 5, 5, 10008, 'Không');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `id_giaovien` int(11) NOT NULL,
  `msgv` varchar(11) NOT NULL,
  `tengv` varchar(30) DEFAULT NULL,
  `namsinh` date NOT NULL,
  `gioitinh` varchar(30) NOT NULL,
  `diachi` varchar(30) NOT NULL,
  `id_monhoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`id_giaovien`, `msgv`, `tengv`, `namsinh`, `gioitinh`, `diachi`, `id_monhoc`) VALUES
(10006, 'GV10000', 'Đỗ Hồng Phúc', '1994-01-01', 'Nam', 'Huế  ', 10011),
(10007, 'GV10001', 'Nguyễn Thị Bích Hợp', '1992-04-20', 'Nữ', 'Thái Nguyên', 10010),
(10008, 'GV10002', 'Trần Văn Chiến', '1987-01-01', 'Nam', 'Phú Yên', 10013),
(10009, 'GV10003', 'Mai Thị Thu Thảo', '1993-04-04', 'Nữ', 'Hòa Bình', 10012),
(10011, 'GV100010', 'Trần Thanh Vũ', '1987-01-01', 'Nam', 'Sài Gòn          ', 10014),
(10018, 'GV30000', 'Nguyễn Văn A', '1993-04-04', 'Nam', 'Huế', 10011),
(10019, 'GV40000', 'Nguyễn VĂn B', '1993-04-04', 'Nam', 'Nha trang', 10011);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `id_bangdiem` int(11) DEFAULT NULL,
  `ngaycapnhat` date NOT NULL,
  `giocapnhat` time(6) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `history`
--

INSERT INTO `history` (`id`, `id_bangdiem`, `ngaycapnhat`, `giocapnhat`) VALUES
(24, 115, '2021-10-27', '21:19:58.000000'),
(25, 115, '2021-10-27', '21:21:46.000000'),
(26, 115, '2021-10-28', '21:20:42.000000'),
(27, 115, '2021-10-28', '21:22:19.000000'),
(28, 115, '2021-10-28', '21:54:03.000000'),
(29, 117, '2021-10-28', '21:55:22.000000'),
(30, 123, '2021-10-28', '21:57:13.000000'),
(31, 116, '2021-11-12', '19:48:36.000000'),
(32, 147, '2021-11-15', '07:22:02.000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocki`
--

CREATE TABLE `hocki` (
  `id_hocki` int(11) NOT NULL,
  `mshk` varchar(11) NOT NULL,
  `id_nam` int(11) DEFAULT NULL,
  `tenhk` varchar(11) NOT NULL,
  `batdau` date NOT NULL,
  `ketthuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocki`
--

INSERT INTO `hocki` (`id_hocki`, `mshk`, `id_nam`, `tenhk`, `batdau`, `ketthuc`) VALUES
(1001, '100HK1', 1, 'Học kì 1', '2021-09-08', '2022-01-26'),
(1002, '100HK2', 1, 'Học kì 2', '2022-01-26', '2022-06-01'),
(1003, '101HK1', 2, 'Học kì 1', '2022-09-05', '2023-01-26'),
(1004, '101HK2', 2, 'Học kì 2', '2023-01-30', '2023-06-05'),
(1005, '102HK1', 3, 'Học kì 1', '2023-09-01', '2024-01-20'),
(1006, '102HK2', 3, 'Học kì 2', '2024-01-25', '2024-05-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocsinh`
--

CREATE TABLE `hocsinh` (
  `id_hocsinh` int(11) NOT NULL,
  `mshs` varchar(11) NOT NULL,
  `tenhs` varchar(30) DEFAULT NULL,
  `namsinh` date NOT NULL,
  `gioitinh` varchar(30) DEFAULT NULL,
  `diachi` varchar(30) DEFAULT NULL,
  `id_malop` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocsinh`
--

INSERT INTO `hocsinh` (`id_hocsinh`, `mshs`, `tenhs`, `namsinh`, `gioitinh`, `diachi`, `id_malop`) VALUES
(499288, 'HS10004', 'Nguyễn Văn D', '2001-06-21', 'Nam', 'Phú Yên', 1016),
(573864, 'HS10001', 'Trần Quốc Vinh', '1998-01-01', 'Nam', 'Sài gòn                       ', 1021),
(623775, 'HS10002', 'Nguyễn Văn Tý', '2001-06-21', 'Nam', 'Huế', 1016),
(878356, 'HS10003', 'Nguyễn Văn C', '2001-06-21', 'Nam', 'Phú Yên', 1016);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketqua`
--

CREATE TABLE `ketqua` (
  `id_ketqua` int(11) NOT NULL,
  `id_malop` int(11) DEFAULT NULL,
  `id_msgv` int(11) DEFAULT NULL,
  `id_mshs` int(11) DEFAULT NULL,
  `diemhk1` float DEFAULT NULL,
  `diemhk2` float DEFAULT NULL,
  `diemcanam` float DEFAULT NULL,
  `songaynghi` int(11) DEFAULT 0,
  `hanhkiem` varchar(20) DEFAULT 'Tốt',
  `xeploai` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ketqua`
--

INSERT INTO `ketqua` (`id_ketqua`, `id_malop`, `id_msgv`, `id_mshs`, `diemhk1`, `diemhk2`, `diemcanam`, `songaynghi`, `hanhkiem`, `xeploai`) VALUES
(13, 1016, NULL, 573864, 5.3, 7.4, 6.4, 2, 'Tốt', 'Trung bình'),
(22, 1017, NULL, 573864, 9.1, 8.7, 8.9, 0, 'Tốt', 'Giỏi'),
(24, 1016, NULL, 623775, 0, 0, 0, 1, 'Tốt', 'Trung bình'),
(26, 1021, NULL, 573864, 8.7, 8.3, 8.5, 11, 'Khá', 'Khá'),
(27, 1016, NULL, 878356, NULL, NULL, NULL, 1, 'Tốt', NULL),
(28, 1016, NULL, 499288, NULL, NULL, NULL, 1, 'Tốt', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id_lop` int(11) NOT NULL,
  `malop` varchar(11) NOT NULL,
  `tenlop` varchar(30) DEFAULT NULL,
  `siso` int(11) DEFAULT NULL,
  `id_msgv` int(11) DEFAULT NULL,
  `id_nam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id_lop`, `malop`, `tenlop`, `siso`, `id_msgv`, `id_nam`) VALUES
(1016, 'LH10A', '10A', 3, 10006, 1),
(1017, 'LH11A', '11A', 0, 10007, 2),
(1021, 'LH12A3', '12A3', 1, 10011, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `id_monhoc` int(11) NOT NULL,
  `mamh` varchar(11) NOT NULL,
  `tenmh` varchar(30) DEFAULT NULL,
  `sotiet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`id_monhoc`, `mamh`, `tenmh`, `sotiet`) VALUES
(10010, 'V10010', 'Văn', 60),
(10011, 'T10011', 'Toán', 60),
(10012, 'H10012', 'Hóa', 45),
(10013, 'L10013', 'Lý', 45),
(10014, 'S10014', 'Sinh', 45);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nam`
--

CREATE TABLE `nam` (
  `id_nam` int(11) NOT NULL,
  `nam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nam`
--

INSERT INTO `nam` (`id_nam`, `nam`) VALUES
(1, '2021-2022'),
(2, '2022-2023'),
(3, '2023-2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phancong`
--

CREATE TABLE `phancong` (
  `id_phancong` int(11) NOT NULL,
  `id_gv` int(11) NOT NULL,
  `id_monhoc` int(11) DEFAULT NULL,
  `id_lop` int(11) NOT NULL,
  `id_hocki` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phancong`
--

INSERT INTO `phancong` (`id_phancong`, `id_gv`, `id_monhoc`, `id_lop`, `id_hocki`) VALUES
(10, 10006, 10011, 1016, 1001),
(11, 10007, 10010, 1016, 1001),
(15, 10011, 10014, 1016, 1001),
(16, 10006, 10011, 1016, 1002),
(17, 10007, 10010, 1016, 1002),
(18, 10008, 10013, 1016, 1002),
(19, 10009, 10012, 1016, 1002),
(21, 10011, 10014, 1016, 1002),
(22, 10006, 10011, 1017, 1003),
(23, 10007, 10010, 1017, 1003),
(24, 10008, 10013, 1017, 1003),
(25, 10009, 10012, 1017, 1003),
(26, 10011, 10014, 1017, 1003),
(28, 10007, 10010, 1017, 1004),
(30, 10008, 10013, 1017, 1004),
(32, 10009, 10012, 1017, 1004),
(33, 10011, 10014, 1017, 1004),
(35, 10006, 10011, 1017, 1004),
(48, 10008, 10013, 1016, 1001),
(49, 10009, 10012, 1016, 1001),
(50, 10006, 10011, 1021, 1005),
(51, 10006, 10011, 1021, 1006),
(52, 10007, 10010, 1021, 1005),
(53, 10007, 10010, 1021, 1006),
(54, 10008, 10013, 1021, 1005),
(55, 10008, 10013, 1021, 1006),
(56, 10009, 10012, 1021, 1005),
(57, 10009, 10012, 1021, 1006),
(58, 10011, 10014, 1021, 1005),
(59, 10011, 10014, 1021, 1006),
(60, 10018, 10011, 1016, 1001),
(61, 10019, 10011, 1016, 1001);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanlop`
--

CREATE TABLE `phanlop` (
  `id` int(11) NOT NULL,
  `id_hocsinh` int(11) DEFAULT NULL,
  `id_lop` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phanlop`
--

INSERT INTO `phanlop` (`id`, `id_hocsinh`, `id_lop`) VALUES
(1, 573864, 1016);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account_admin`
--
ALTER TABLE `account_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `account_gv`
--
ALTER TABLE `account_gv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `taikhoan` (`taikhoan`);

--
-- Chỉ mục cho bảng `account_hs`
--
ALTER TABLE `account_hs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `taikhoan` (`taikhoan`);

--
-- Chỉ mục cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  ADD PRIMARY KEY (`id_bangdiem`),
  ADD KEY `fkmh` (`id_msmh`),
  ADD KEY `fkhs1` (`id_mshs`),
  ADD KEY `fkgv1` (`id_msgv`),
  ADD KEY `fkhk` (`id_mshk`),
  ADD KEY `fklop12321` (`id_lop`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`id_giaovien`),
  ADD UNIQUE KEY `unique_giaovien` (`msgv`),
  ADD KEY `fk_monhoc` (`id_monhoc`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bangdiem` (`id_bangdiem`);

--
-- Chỉ mục cho bảng `hocki`
--
ALTER TABLE `hocki`
  ADD PRIMARY KEY (`id_hocki`),
  ADD UNIQUE KEY `mshk` (`mshk`),
  ADD KEY `fk_nam123` (`id_nam`);

--
-- Chỉ mục cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`id_hocsinh`),
  ADD UNIQUE KEY `mshs` (`mshs`),
  ADD KEY `fk_malop` (`id_malop`);

--
-- Chỉ mục cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`id_ketqua`),
  ADD KEY `fkhs` (`id_mshs`),
  ADD KEY `fkgv` (`id_msgv`),
  ADD KEY `fklop` (`id_malop`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id_lop`),
  ADD UNIQUE KEY `malop` (`malop`),
  ADD KEY `fk_magv` (`id_msgv`),
  ADD KEY `fk_nam` (`id_nam`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`id_monhoc`),
  ADD UNIQUE KEY `mamh` (`mamh`);

--
-- Chỉ mục cho bảng `nam`
--
ALTER TABLE `nam`
  ADD PRIMARY KEY (`id_nam`);

--
-- Chỉ mục cho bảng `phancong`
--
ALTER TABLE `phancong`
  ADD PRIMARY KEY (`id_phancong`),
  ADD KEY `fk_gv` (`id_gv`),
  ADD KEY `fk_lop` (`id_lop`),
  ADD KEY `fk_pc_hk` (`id_hocki`);

--
-- Chỉ mục cho bảng `phanlop`
--
ALTER TABLE `phanlop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_phanlop_hs` (`id_hocsinh`),
  ADD KEY `fk_phanlop_lop` (`id_lop`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account_admin`
--
ALTER TABLE `account_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `account_gv`
--
ALTER TABLE `account_gv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10012;

--
-- AUTO_INCREMENT cho bảng `account_hs`
--
ALTER TABLE `account_hs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=623776;

--
-- AUTO_INCREMENT cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  MODIFY `id_bangdiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `id_giaovien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10020;

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `hocki`
--
ALTER TABLE `hocki`
  MODIFY `id_hocki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- AUTO_INCREMENT cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  MODIFY `id_hocsinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=999879;

--
-- AUTO_INCREMENT cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  MODIFY `id_ketqua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id_lop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1022;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `id_monhoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10015;

--
-- AUTO_INCREMENT cho bảng `nam`
--
ALTER TABLE `nam`
  MODIFY `id_nam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `phancong`
--
ALTER TABLE `phancong`
  MODIFY `id_phancong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `phanlop`
--
ALTER TABLE `phanlop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account_gv`
--
ALTER TABLE `account_gv`
  ADD CONSTRAINT `fk_ac` FOREIGN KEY (`id`) REFERENCES `giaovien` (`id_giaovien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `account_hs`
--
ALTER TABLE `account_hs`
  ADD CONSTRAINT `fk_hs` FOREIGN KEY (`id`) REFERENCES `hocsinh` (`id_hocsinh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  ADD CONSTRAINT `fkgv1` FOREIGN KEY (`id_msgv`) REFERENCES `giaovien` (`id_giaovien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkhk` FOREIGN KEY (`id_mshk`) REFERENCES `hocki` (`id_hocki`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkhs1` FOREIGN KEY (`id_mshs`) REFERENCES `hocsinh` (`id_hocsinh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fklop12321` FOREIGN KEY (`id_lop`) REFERENCES `lop` (`id_lop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkmh` FOREIGN KEY (`id_msmh`) REFERENCES `monhoc` (`id_monhoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD CONSTRAINT `fk_monhoc` FOREIGN KEY (`id_monhoc`) REFERENCES `monhoc` (`id_monhoc`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_bangdiem` FOREIGN KEY (`id_bangdiem`) REFERENCES `bangdiem` (`id_bangdiem`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hocki`
--
ALTER TABLE `hocki`
  ADD CONSTRAINT `fk_nam123` FOREIGN KEY (`id_nam`) REFERENCES `nam` (`id_nam`);

--
-- Các ràng buộc cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD CONSTRAINT `fk_malop` FOREIGN KEY (`id_malop`) REFERENCES `lop` (`id_lop`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD CONSTRAINT `fkgv` FOREIGN KEY (`id_msgv`) REFERENCES `giaovien` (`id_giaovien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkhs` FOREIGN KEY (`id_mshs`) REFERENCES `hocsinh` (`id_hocsinh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fklop` FOREIGN KEY (`id_malop`) REFERENCES `lop` (`id_lop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `fk_magv` FOREIGN KEY (`id_msgv`) REFERENCES `giaovien` (`id_giaovien`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nam` FOREIGN KEY (`id_nam`) REFERENCES `nam` (`id_nam`);

--
-- Các ràng buộc cho bảng `phancong`
--
ALTER TABLE `phancong`
  ADD CONSTRAINT `fk_gv` FOREIGN KEY (`id_gv`) REFERENCES `giaovien` (`id_giaovien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lop` FOREIGN KEY (`id_lop`) REFERENCES `lop` (`id_lop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pc_hk` FOREIGN KEY (`id_hocki`) REFERENCES `hocki` (`id_hocki`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phanlop`
--
ALTER TABLE `phanlop`
  ADD CONSTRAINT `fk_phanlop_hs` FOREIGN KEY (`id_hocsinh`) REFERENCES `hocsinh` (`id_hocsinh`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_phanlop_lop` FOREIGN KEY (`id_lop`) REFERENCES `lop` (`id_lop`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
