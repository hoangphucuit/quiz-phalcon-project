-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2017 at 07:15 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `name`) VALUES
('CB', 'Cơ bản'),
('NC', 'Nâng cao');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `questionlab` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id`, `questionlab`) VALUES
('lab01', 'Hoàn thành bài Word với các yêu cầu sau:\r\na/...\r\nb/...\r\nc/...'),
('lab02', 'Hoàn thành bài excel với các yêu cầu sau:\r\na/...\r\nb/...\r\nc/...');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type_cer` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`code`, `name`, `type_cer`) VALUES
('IU01', 'Hiểu biết CNTT cơ bản', 'CB'),
('IU02', 'Sử dụng máy tính cơ bản', 'CB'),
('IU03', 'Xử lý văn bản cơ bản', 'CB'),
('IU04', 'Sử dụng bảng tính cơ bản', 'CB'),
('IU05', 'Sử dụng trình chiếu cơ bản', 'CB'),
('IU06', 'Sử dụng Internet cơ bản', 'CB'),
('IU07', 'Xử lý văn bản nâng cao', 'NC'),
('IU08', 'Sử dụng bảng tính nâng cao', 'NC'),
('IU09', 'Sử dụng trình chiếu nâng cao', 'NC');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kindcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `answer1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `answer2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `answer3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `answer4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correctanswer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `kindcode`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `correctanswer`, `image`) VALUES
('1', 'IU09', 'Trong Powerpoint, sau khi chèn hiệu ứng cho đối tượng trên Slide, muốn hiệu ứng xuất hiện đồng thời khi trình diễn, tại mục Start ta chọn', 'After previous', 'On click', 'After click', 'With previous', 'D', NULL),
('10', 'IU09', 'Trong Powerpoint, vào HOME -> LINE SPACING', 'Để quy định khoảng cách giữa các dòng', 'Để quy định khoảng cách giữa các đoạn', 'Để quy định khoảng cách giữa các dòng, các đoạn', 'Tất cả đề sai', 'C', NULL),
('100', 'IU01', 'DVD Combo có chức năng nào sau đây? ', 'Đọc và ghi đĩa CD, DVD ', 'Đọc đĩa CD, DVD ', 'Đọc và ghi đĩa DVD ', 'Đọc CD, DVD và ghi đĩa CD ', 'D', NULL),
('11', 'IU09', 'Trong Powerpoint, để cài mật mã cho tập tin hiện thời', 'Vào File -> Info -> Protect Presentation -> Encrypt with Password…', 'Vào File -> Save -> Protect Presentation -> Encrypt with Password…', 'Vào Home -> Info -> Protect Presentation -> Encrypt with Password…', 'Vào Home -> Save -> Protect Presentation -> Encrypt with Password…', 'A', NULL),
('12', 'IU09', 'Trong Powerpoint, sau khi đã chèn một bảng vào slide, muốn chia ô hiện tại thành 2 ô', 'Nhấn chuột phải và chọn Split Cells…', 'Vào Table -> Split Cells', 'Nhấn chuột trái và chọn Split Cells…', 'Vào Home -> Split Cells', 'A', NULL),
('13', 'IU09', 'Trong Powerpoint, sau khi đã chèn một bảng vào slide, muốn xóa cột nào đó', 'Chọn cột cần xóa, nhấn chuột phải và chọn Split Cells', 'Chọn cột cần xóa, nhấn chuột phải và chọn Merge Cells', 'Chọn cột cần xóa, nhấn chuột trái và chọn Delete Columns', 'Chọn cột cần xóa, nhấn chuột phải và chọn Delete Columns', 'D', NULL),
('14', 'IU09', 'Khi đang trình chiếu, muốn chuyển sang màn hình của một chương trình ứng dụng khác (đã mở trước) để minh họa mà không kết thúc việc trình chiếu, sử dụng tổ hợp phím nào sau đây', 'Home + Tab', 'Shift + Tab', 'Alt + Tab', 'Esc + Tab', 'C', NULL),
('15', 'IU09', 'Trong Powerpoint, lần lượt nhấn phím ALT, phím H, phím 1 tương ứng với tổ hợp phím nào sau đây', 'CTRL + B', 'CTRL + I', 'CTRL + U', 'CTRL + Z', 'A', NULL),
('16', 'IU09', 'Trong Powerpoint, lần lượt nhấn phím ALT, phím N, phím T tương ứng với lựa chọn nào sau đây', 'Vào Home -> Format', 'Vào Insert -> Table', 'Vào Design -> Page Setup', 'Vào View -> Zoom', 'B', NULL),
('17', 'IU09', 'Trong Powerpoint, để thêm 1 slide giống slide hiện tại ta dùng tố hợp phím lệnh nào sau đây', 'ALT + H + E + D', 'ALT + H + I + D', 'ALT + H + D + I', 'ALT + H + E + I', 'B', NULL),
('18', 'IU09', 'Trong Powerpoint, tổ hợp phím Shift + F9 được sử dụng để', 'Chuyển sang chế độ đọc', 'Tắt chế độ khung lưới khi soạn thảo', 'Bật chế độ khung lưới khi soạn thảo', 'Bật, hoặc Tắt chế độ khung lưới khi soạn thảo', 'D', NULL),
('19', 'IU09', 'Trong Powerpoint, tổ hợp phím Shift + Alt + F9 được sử dụng để', 'Bật thanh thước kẻ', 'Tắt thanh thước kẻ', 'Bật hoặc Tắt thanh thước kẻ', 'Tất cả đều sai', 'C', NULL),
('2', 'IU09', 'Trong Powerpoint, để chèn âm thanh vào Slide ta thực hiện', 'Vào Insert -> Movies and Sounds -> Sound from file…', 'Vào Insert -> Audio -> Audio from file…', 'Vào Insert -> Sounds -> Sound from file…', 'Vào Insert -> Audio -> Movies and Sounds…', 'B', NULL),
('20', 'IU09', 'Trong Powerpoint, thao tác nào sau đây để tạo hiệu ứng bóng mờ cho đoạn văn bản được chọn', 'Vào Home -> Text Shadow', 'Vào Format -> Text Shadow', 'Vào View -> Text Shadow', 'Vào Insert -> Text Shadow', 'A', NULL),
('21', 'IU08', 'Các ô dữ liệu của bảng tính Microsoft Excel có thể chứa: ', 'Các giá trị logic, ngày, số, chuỗi ', 'Các giá trị kiểu ngày, số, chuỗi ', 'Các dữ liệu là công thức ', 'Tất cả đều đúng ', 'D', NULL),
('22', 'IU08', 'Kết quả của một phép so sánh hoặc phép toán Logic bao giờ cũng cho kết quả là ', 'True ', 'False ', 'Chỉ một trong hai giá trị: True hoặc False ', 'Cả True và False ', 'C', NULL),
('23', 'IU08', 'Trong Microsoft Excel, ô Name Box có công dụng gì ', 'Hiển thị công thức của ô ', 'Hiển thị dữ liệu trong ô ', 'Canh lề dữ liệu cho ô ', 'Hiển thị địa chỉ ô hiện hành và tên của vùng đang chọn ', 'D', NULL),
('24', 'IU08', 'Để tính trung bình cộng giá trị số tại các ô C1, C2 và C3. Ta thực hiện công thức nào sau đây: ', '=SUM(C1:C3)/3 ', '=AVERAGE(C1:C3) ', '=(C1+SUM(C2:C3))/3 ', 'Tất cả đều đúng ', 'D', NULL),
('25', 'IU08', 'Trong Microsoft Excel, hàm SUM dùng để ', 'Tính tổng các giá trị được chọn ', 'Tìm giá trị lớn nhất trong các giá trị được chọn ', 'Tìm giá trị nhỏ nhất trong các giá trị được chọn ', 'Tính giá trị trung bình của các giá trị được chọn ', 'A', NULL),
('26', 'IU08', 'Trong Microsoft Excel, hàm MAX dùng để ', 'Tính tổng các giá trị được chọn ', 'Tìm giá trị lớn nhất trong các giá trị được chọn ', 'Tìm giá trị nhỏ nhất trong các giá trị được chọn ', 'Tính giá trị trung bình của các giá trị được chọn ', 'B', NULL),
('27', 'IU08', 'Trong Microsoft Excel, hàm MIN dùng để ', 'Tính tổng các giá trị được chọn ', 'Tìm giá trị lớn nhất trong các giá trị được chọn ', 'Tìm giá trị nhỏ nhất trong các giá trị được chọn ', 'Tính giá trị trung bình của các giá trị được chọn ', 'C', NULL),
('28', 'IU08', 'Trong Microsoft Excel, hàm AVERAGE dùng để ', 'Tính tổng các giá trị được chọn ', 'Tìm giá trị lớn nhất trong các giá trị được chọn ', 'Tìm giá trị nhỏ nhất trong các giá trị được chọn ', 'Tính giá trị trung bình của các giá trị được chọn ', 'D', NULL),
('29', 'IU08', 'Trong Microsoft Excel, hàm ROUND dùng để ', 'Tính tổng ', 'Tìm giá trị nhỏ nhất ', 'Làm tròn số ', 'Tính giá trị trung bình ', 'C', NULL),
('3', 'IU09', 'Trong Powerpoint, để thu âm thanh bên ngoài và chèn vào Slide ta thực hiện', 'Vào Insert -> Audio -> Record Audio…', 'Vào Insert -> Audio -> Audio from file…', 'Vào Insert -> Audio -> Clip Art Audio…', 'Vào Insert -> Audio -> Movies and Sounds…', 'A', NULL),
('30', 'IU08', 'Chức năng của hàm TRIM(text) là để dùng: ', 'Cắt bỏ các khoảng trống đầu chuỗi Text ', 'Cắt bỏ các khoảng trống cuối chuỗi Text ', 'Cắt bỏ các khoảng trống đầu và cuối của chuỗi Text ', 'Cắt bỏ các khoảng trống giữa chuỗi Text ', 'D', NULL),
('31', 'IU07', 'Trong Microsoft Word, để chèn số trang vào vị trí con trỏ của tài liệu ta gọi lệnh nào? ', 'Vào Insert, Nhấn Page Number và chọn Bottom of Page ', 'Vào Insert, Nhấn Page Number và chọn Top of Page ', 'Vào Insert, Nhấn Page Number, chọn Current Position ', 'Vào Insert, Nhấn Number Page, chọn Format Page Numbers ', 'C', NULL),
('32', 'IU07', 'Trong Microsoft Word, để tạo chữ lớn đầu đoạn văn (Drop cap) cho ký tự đang chọn, ta thực hiện. ', 'Tại thẻ Home, Nhấn nút Dropcap và chọn Dropped ', 'Tại thẻ Insert, Nhấn nút Dropcap và chọn Dropped ', 'Tại thẻ Insert, Nhấn nút Dropcap và chọn None ', 'Tại thẻ Insert, Nhấn nút Dropcap và chọn In Margin ', 'B', NULL),
('33', 'IU07', 'Trong Microsoft Word, làm thế nào để hình ảnh đang chọn chìm xuống dưới văn bản? ', 'Trong thẻ Format, Nhấn Wrap Text và chọn In Front of text ', 'Trong thẻ Format, Nhấn Wrap Text và chọn In Line with text ', 'Trong thẻ Format, Nhấn Wrap Text và chọn Through ', 'Trong thẻ Format, Nhấn Wrap Text và chọn Behind text ', 'D', NULL),
('34', 'IU07', 'Trong Microsoft Word, để soạn thảo đúng tiếng việt khi sử dụng bảng mã Unicode thì phải chọn font (kiểu chữ) ', 'VNI-Avo ', 'Arial ', 'VnTimes ', 'VNArial ', 'B', NULL),
('35', 'IU07', 'Trong Microsoft Word, làm thế nào để áp dụng mẫu (style) cho hình ảnh đang chọn? ', 'Trong thẻ Format, chọn mẫu trong nhóm Picture Effect ', 'Trong thẻ Format, chọn mẫu trong nhóm Picture Border ', 'Trong thẻ Format, Nhấn nút Artistic Effect rồi chọn mẫu ', 'Trong thẻ Format, chọn mẫu trong nhóm Picture Styles ', 'D', NULL),
('36', 'IU07', 'Tên gọi nào say đây không phải là tên của bảng mã tiếng Việt. ', 'TCVN 3 ', 'Telex ', 'Unicode ', 'VietWare_X ', 'B', NULL),
('37', 'IU07', 'Trong văn bản Microsoft Word đang mở, muốn thay tất cả chữ “VN” thành “Việt Nam” thì ', 'Trong thẻ Home, chọn Clear ', 'Trong thẻ Home, chọn Go To ', 'Trong thẻ Home, chọn Advanced Find ', 'Trong thẻ Home, chọn Replace ', 'D', NULL),
('38', 'IU07', 'Trong Microsoft Word, thao tác nào dưới dây được dùng để chọn một từ trong đoạn văn bản? ', 'Giữ phím Ctrl và Nhấn chuột trái lên câu cần chọn ', 'Giữ phím Shift và Nhấn chuột trái lên câu cần chọn ', 'Nhấn chuột trái 3 lần vào lề trái của văn bản ', 'Nhấn đôi chuột trái lên từ cần chọn ', 'D', NULL),
('39', 'IU07', 'Trong Microsoft Word, khi đang soạn thảo văn bản để xác định tổng số trang của văn bản hiện hành ta quan sát ở ', 'Thanh công cụ Ribbon ', 'Thanh trạng thái ', 'Trong trang Backstage của thực đom File ', 'Thanh ruler ', 'B', NULL),
('4', 'IU09', 'Trong Powerpoint, để tạo một slide giống hệt như slide hiện hành', 'Vào New Slide -> Duplicate selected slides…', 'Vào Insert -> Duplicate selected slides…', 'Vào Slide -> New Slide -> Duplicate selected slides…', 'Vào Home -> New Slide - > Duplicate selected slides…', 'D', NULL),
('40', 'IU07', 'Trong Microsoft Word, khi cần gõ các chỉ số dưới H2O thì sử dụng tổ hợp phím tắt nào trong khi gõ. ', 'Ctrl = ', 'Ctrl Shift = ', 'Ctrl Alt Shift = ', 'Shift = ', 'A', NULL),
('41', 'IU06', 'Dịch vụ Internet được cung cấp vào Việt Nam vào năm nào? ', '1,986', '1,990', '1,997', '2,000', 'C', NULL),
('42', 'IU06', 'WWW là viết tắt của? ', 'Word Wide Wed ', 'Word Wide Web ', 'Word Wild Web ', 'World Wide Web ', 'D', NULL),
('43', 'IU06', 'Internet có nghĩa là ', 'Hệ thống máy tính ', 'Hệ thống mạng máy tính ', 'Hệ thống mạng máy tính trong một nước ', 'Hệ thống mạng máy tính toàn cầu ', 'D', NULL),
('44', 'IU06', 'Online có nghĩa là ', 'Đang tải ', 'Không tải được ', 'Trực tuyến ', 'Ngoại tuyến ', 'C', NULL),
('45', 'IU06', 'Nút “Home” trên trang web có nghĩa là ', 'Đi đến trang trước ', 'Đi đến trang chủ ', 'Đi đến nhà ', 'Không có ý nghĩa gì, chỉ để trang trí ', 'B', NULL),
('46', 'IU06', 'www.google.com thì “.com” có nghĩa là ', 'Đây là đuôi tên miền của các trang web giáo dục ', 'Đây là đuôi tên miền của các trang web thông thường ', 'Đây là đuôi tên miền của các trang web thông thường ', 'Đây là đuôi tên miền của các trang web thương mại, dịch vụ ', 'D', NULL),
('47', 'IU06', 'Ứng dụng nào dùng để duyệt web ', 'Internet Explorer ', 'Safari ', 'RockMelt ', 'Tất cả đều đúng ', 'D', NULL),
('48', 'IU06', 'Tiền thân của mạng Internet ngày nay là ? ', 'Intranet ', 'ARPANET ', 'LAN ', 'WAN ', 'B', NULL),
('49', 'IU06', 'Bộ giao thức dùng trên Internet hiện nay là ? ', 'TCP/IP ', 'OSI ', 'IPX ', 'AppleTalk ', 'A', NULL),
('5', 'IU09', 'Virus có thể lây lan qua? ', 'USB ', 'Môi trường mạng ', 'Ổ cứng di động ', 'Tất cả đều đúng ', 'D', NULL),
('50', 'IU06', 'ISP là viết tắt của ', 'Internet Server Provider ', 'Internet Service Provider ', 'Internet Super Provider ', 'Tất cả đều sai ', 'B', NULL),
('51', 'IU05', 'Tên một tập tin Trình diễn Powerpoint thường có đuôi mở rộng là ', 'PPTA ', 'PPTR ', 'PPTK ', 'PPTX ', 'D', NULL),
('52', 'IU05', 'Trong Powerpoint, để chèn thêm 1 Slide vào file trình điễn ', 'Vào Insert -> New Slide... ', 'Vào File -> New Slide ', 'Vào Home -> New Slide ', 'Vào Edit -> New Slide ', 'C', NULL),
('53', 'IU05', 'Trong Powerpoint, để tạo hiệu ứng cho các đối tượng ', 'Chọn đối tượng cần tạo hiệu ứng -> Animations -> Add Animation… ', 'Chọn đối tượng cần tạo hiệu ứng -> Slide Show -> Add Effect… ', 'Chọn đối tượng cần tạo hiệu ứng -> Custom Animation -> Add Effect… ', 'Chọn đối tượng cần tạo hiệu ứng -> Insert -> Add Animation… ', 'A', NULL),
('54', 'IU05', 'Trong Powerpoint, để tạo hiệu ứng chuyển đổi giữa các trang ', 'Vào Slide Show -> Custom Animation ', 'Vào Slide Show -> Slide Transition ', 'Vào View -> Slide Transition... ', 'Vào Transitions -> chọn hiệu ứng... ', 'D', NULL),
('55', 'IU05', 'Trong Powerpoint, để chọn mẫu giao diện cho các Slide ', 'Vào Format -> Slide Design... ', 'Vào Slide Show -> Slide Design... ', 'Vào Design -> chọn mẫu... ', 'Vào Slide Design -> chọn mẫu... ', 'C', NULL),
('56', 'IU05', 'Trong Powerpoint, để chèn biểu đồ ', 'Vào View -> Chart… ', 'Vào Format -> Chart… ', 'Vào Slide Design -> Chart… ', 'Vào Insert -> Chart... ', 'D', NULL),
('57', 'IU05', 'Trong Powerpoint, để tạo liên kết chuyển đến trang kế tiếp ', 'Chọn đối tượng cần tạo liên kết -> Insert -> Custom Shows -> Slide -> Next slide ', 'Chọn đối tượng cần tạo liên kết -> Insert -> Action -> Hyperlink to -> Next slide ', 'Chọn đối tượng cần tạo liên kết -> Slide Show -> Action settings -> Slide -> Next slide ', 'Chọn đối tượng cần tạo liên kết -> Slide Show -> Custom Shows -> Hyperlink to -> Next slide ', 'B', NULL),
('58', 'IU05', 'Trong Powerpoint, để tạo liên kết chuyển đến trang bất kỳ ', 'Chọn đối tượng cần tạo liên kết -> Insert -> Action -> Hyperlink to -> Slide… ', 'Chọn đối tượng cần tạo liên kết -> Insert -> Action -> Hyperlink to -> Next slide… ', 'Chọn đối tượng cần tạo liên kết -> Insert -> Action -> Hyperlink to -> Custom Show… ', 'Chọn đối tượng cần tạo liên kết -> Insert -> Custom Shows -> Hyperlink to -> URL… ', 'A', NULL),
('59', 'IU05', 'Trong Powerpoint, để tạo liên kết chuyển đến trang cuối cùng ', 'Chọn đối tượng cần tạo liên kết -> Insert -> Custom Shows -> Slide -> Last slide ', 'Chọn đối tượng cần tạo liên kết -> Insert -> Action -> Hyperlink to -> Next slide ', 'Chọn đối tượng cần tạo liên kết -> Insert -> Custom Shows -> Slide -> End Show ', 'Chọn đối tượng cần tạo liên kết -> Insert -> Action -> Hyperlink to -> Last slide ', 'D', NULL),
('6', 'IU09', 'Trong Powerpoint, nút lệnh Screenshot có chức năng nào sau đây', 'Chèn hình ảnh vào Slide', 'Chụp ảnh các chương trình đang chạy để chèn vào Slide', 'Chèn âm thanh vào Slide', 'Chèn Video vào Slide', 'B', NULL),
('60', 'IU05', 'Trong Powerpoint, để đánh số trang cho tất cả các slide ', 'Vào Insert -> Header and Footer -> Slide -> Chọn Slide Number -> Apply to All. ', 'Vào Insert -> Header and Footer -> Slide -> Chọn Page Number -> Apply to All. ', 'Vào Insert -> Header and Footer -> Slide -> Chọn Slide Number -> Apply. ', 'Vào Insert -> Header and Footer -> Slide -> Chọn Page Number -> Apply. ', 'A', NULL),
('61', 'IU04', 'Trong Microsoft Excel, khi muốn sắp xếp (Sort) vùng dữ liệu đang chọn ', 'Vào Data -> Sort... ', 'Vào Data -> Options… ', 'Vào Data -> Filter… ', 'Vào Format -> Options… ', 'A', NULL),
('62', 'IU04', 'Trong Microsoft Excel, để chọn toàn bộ các ô trên bảng tính ', 'Nhấn tổ hợp phím Ctrl + Shift + B ', 'Nhấn tổ hợp phím Ctrl + C ', 'Nhấn tổ hợp phím Ctrl + A ', 'Nhấn tổ hợp phím Ctrl + Alt + D ', 'C', NULL),
('63', 'IU04', 'Trong Microsoft Excel, để xuống dòng trong cùng một ô ', 'Nhấn tổ hợp phím Ctrl + B ', 'Nhấn tổ hợp phím Alt + Enter ', 'Nhấn tổ hợp phím Alt + F11 ', 'Nhấn tổ hợp phím Ctrl + D ', 'B', NULL),
('64', 'IU04', 'Trong Microsoft Excel, để định dạng kiểu dữ liệu cho vùng được chọn ', 'Vào Home -> Number... ', 'Vào Data -> Number... ', 'Vào Insert -> Number… ', 'Vào View -> Number... ', 'A', NULL),
('65', 'IU04', 'Trong Microsoft Excel, để tạo biểu đồ cho vùng giá trị được chọn ', 'Vào Tool -> Chart… ', 'Vào Insert -> Chart... ', 'Vào View -> Chart... ', 'Vào Format -> Chart... ', 'B', NULL),
('66', 'IU04', 'Trong Microsoft Excel, để chèn thêm 1 Bảng tính (Worksheet) ', 'Nhấn tổ hợp phím Ctrl + Shift + F11 ', 'Nhấn tổ hợp phím Alt + Shift + F11 ', 'Nhấn tổ hợp phím Shift + F11 ', 'Nhấn tổ hợp phím Shift + F10 ', 'C', NULL),
('67', 'IU04', 'Trong Microsoft Excel, để chèn thêm 1 Dòng (Row) trên dòng hiện tại ', 'Vào Data -> Insert -> Insert Sheet Rows ', 'Vào View -> Insert -> Insert Sheet Rows ', 'Vào Home -> Insert -> Insert Sheet Row ', 'Vào Home -> Insert -> Insert Sheet Rows ', 'D', NULL),
('68', 'IU04', 'Trong Microsoft Excel, để chèn thêm 1 Cột (Column) trước cột hiện tại ', 'Vào Home -> Insert -> Insert Sheet Columns ', 'Vào View -> Insert -> Insert Sheet Column ', 'Vào Insert -> Insert Sheet Columns ', 'Vào Data -> Insert -> Insert Sheet Columns ', 'A', NULL),
('69', 'IU04', 'Trong Microsoft Excel, vào DATA -> FILTER... ', 'Để xóa toàn bộ nội dung ', 'Để trích lọc thông tin ', 'Để in ', 'Để thay đổi phông chữ ', 'B', NULL),
('7', 'IU09', 'Trong Powerpoint, nút lệnh Remove Background cho phép', 'Loại bỏ nền của ảnh được chọn', 'Loại bỏ hình nền Slide được chọn', 'Loại bỏ màu nền Slide được chọn', 'Tất cả đều sai', 'A', NULL),
('70', 'IU04', 'Trong Microsoft Excel, để in bảng tính được chọn ', 'Vào View -> Print... ', 'Vào Format -> Print... ', 'Vào File -> Print... ', 'Vào View -> Print Preview... ', 'C', NULL),
('71', 'IU03', 'Trong Microsoft Word, phím nào đưa con trỏ về đầu dòng hiện hành? ', 'Home ', 'Ctrl + Home ', 'End ', 'Ctrl + Page Up ', 'A', NULL),
('72', 'IU03', 'Trong Microsoft Word, trong Table (bảng) để chèn thêm một dòng bên dưới dòng đang chọn thì ta vào thẻ Layout rồi chọn nút lệnh gì? ', 'Insert Above ', 'Insert Below ', 'Rows Below ', 'Insert Right ', 'B', NULL),
('73', 'IU03', 'Trong Microsoft Word, sau khi bôi đen toàn bộ bảng, nếu nhấn phím Delete thì điều gì xảy ra? ', 'Không có tác dụng gì ', 'Xóa toàn bộ nội dung và bảng biểu ', 'Xóa bảng, không xóa nội dung ', 'Xóa toàn bộ nội dung trong bảng, không xóa bảng ', 'D', NULL),
('74', 'IU03', 'Trong Microsoft Word, để xóa bỏ toàn bộ định dạng kiểu chữ của văn bản đang chọn ta nhấn tổ hợp phím gì? ', 'Ctrl + Space ', 'Ctrl + Delete ', 'Ctrl + Enter ', 'Shift + Space ', 'A', NULL),
('75', 'IU03', 'Trong Microsoft Word, tổ hợp phím nào dùng để ra lệnh in ', 'Ctrl + N ', 'Ctrl + S ', 'Ctrl + U ', 'Ctrl + P ', 'D', NULL),
('76', 'IU03', 'Phát biểu nào sau đây là sai? ', 'Canh lề mặc định trong văn bản mỗi khi tạo tập tin mới là canh trái ', 'Khi soạn thảo trong Word, nếu hết trang thì tự động nhảy sang trang mới ', 'Chỉ được phép mở một văn bản trong phiên làm việc ', 'Mặc định mỗi khi khởi động MS Word 2010 đã có một văn bản trống ', 'C', NULL),
('77', 'IU03', 'Trong Microsoft Word, để di chuyển con trỏ về cuối tài liệu nhấn: ', 'Page Down ', 'Ctrl + Page Down ', 'End ', 'Ctrl + End ', 'D', NULL),
('78', 'IU03', 'Trong Microsoft Word, trong khi soạn thảo văn bản, nếu nhấn phím số 1 khi có một khối văn bản đang được chọn thì ', 'Khối văn bản đó biến mất ', 'Khối văn bản đó biến mất và thay vào đó là số 1 ', 'Số 1 sẽ chèn vào trước khối đang chọn ', 'số 1 sẽ chèn vào sau khối đang chọn ', 'B', NULL),
('79', 'IU03', 'Trong Microsoft Word, tổ hợp phím được dùng để đóng tài liệu đang mở? ', 'Ctrl + O ', 'Ctrl + N ', 'Ctrl + P ', 'Ctrl + W ', 'D', NULL),
('8', 'IU09', 'Trong Powerpoint, ở chế độ trình chiếu, có thể chuyển con trỏ chuột sang dạng Laser bằng cách', 'Giữ phím CTRL và nút chuột trái', 'Giữ phím CTRL và nút chuột phải', 'Giữ phím ALT và nút chuột trái', 'Giữ phím ALT và nút chuột trái', 'A', NULL),
('80', 'IU03', 'Trong Microsoft Word, để chọn toàn bộ nội dung thì nhấn tổ hợp phím ', 'Shift + Ctrl + A ', 'Ctrl + A ', 'Ctrl + Alt + A ', 'Shift + A ', 'B', NULL),
('81', 'IU02', 'Trong Microsoft Windows, ta sử dụng tổ hợp phím nào để kích hoạt menu Start ', 'CTRL+X ', 'CTRL+ESC ', 'ALT + F4 ', 'CTRL + Z ', 'B', NULL),
('82', 'IU02', 'Trong Microsoft Windows, ta sử dụng lệnh nào để đổi tên Folder hoặc File đang chọn? ', 'F2 ', 'F3 ', 'F4 ', 'F6 ', 'A', NULL),
('83', 'IU02', 'Trong Microsoft Windows, khi xóa file hoặc folder thì nó được lưu trong Recycle Bin, muốn xóa hẳn file hoặc folder ta Nhấn tổ hợp phím ? ', 'SHIFT + DEL ', 'ALT + DEL ', 'CTRL + DEL ', 'Tất cả đều sai ', 'A', NULL),
('84', 'IU02', 'Trong Microsoft Windows, từ Shortcut có ý nghĩa gì? ', 'Xóa một đối tượng được chọn tại màn hình nền. ', 'Di chuyển một đối tượng đến nơi khác ', 'Đóng các cửa sổ đang mở ', 'Tạo đường tắt để truy cập ', 'D', NULL),
('85', 'IU02', 'Trong các tập tin có phần mở rộng sau. Tập tin nào là tập tin chương trình có thể chạy trực tiếp được? ', 'RAR ', 'ZIP ', 'EXE ', 'Tất cả đều đúng ', 'C', NULL),
('86', 'IU02', 'Kiểm tra dung lượng ổ đĩa, để biết ổ đĩa của ta có dung lượng còn trống bao nhiêu? hay đã sử dụng hết ', 'Nhấn phải chuột vào ổ đĩa, chọn Properties ', 'Nhấn phải chuột vào ổ đĩa, chọn Format ', 'Nhấn phải chuột vào ổ đĩa, chọn Create Shortcut ', 'Nhấn phải chuột vào ổ đĩa, chọn Pin to Start ', 'A', NULL),
('87', 'IU02', 'Khi các biểu tượng trên màn hình Desktop Microsoft Windows bị ẩn hết. Thao tác nào sau đây để hiển thị các biểu tượng trên màn hình Desktop. ', 'Nhấn phải chuột vào màn hình nền, chọn View, chọn tiếp Auto arrange icons ', 'Nhấn phải chuột vào màn hình nền, chọn View, chọn tiếp Show desktop icons ', 'Nhấn phải chuột vào màn hình nền, chọn View, chọn tiếp Align icons to grid ', 'Không thể hiển thị được, Windows đã bị lỗi ', 'B', NULL),
('88', 'IU02', 'Trong Microsoft Windows, ta sử dụng công cụ nào để quản lý các files và folders ? ', 'Microsoft Offíce ', 'Control Panel ', 'Windows Explorer ', 'Paint ', 'C', NULL),
('89', 'IU02', 'Trong Microsoft Windows, Hiểu thế nào là Driver ? ', 'Chương trình dạy lái xe ô tô ', 'Chương trình hướng dẫn sử dụng Windows ', 'Chương trình giúp chạy các ứng dụng DOS trên Windows XP ', 'Chương trình giúp Windows điều khiển các thiết bị ngoại vi ', 'D', NULL),
('9', 'IU09', 'Trong Powerpoint, để chuyển tập tin trình diễn Powerpoint sang dạng Video', 'Vào File -> Save as -> Create a Video…', 'Vào File -> Save & Send - > Create a Video…', 'Vào File -> Save & Send - > Save a Video…', 'Vào File -> Save as -> Save a Video…', 'B', NULL),
('90', 'IU02', 'Trong Microsoft Windows, làm thế nào để gỡ bỏ một chương trình khỏi máy tính tốt nhất? ', 'Xóa biểu tượng của chương trình đó trên màn hình ', 'Xóa thư mục của chương trình đó trên hệ thống ', 'Vào Control Panel, chọn Programs, chọn Uninstall programs, chọn chương trình cần gỡ rồi Nhấn Uninsta', 'Vào Start, tìm kiếm tên chương trình rồi chọn xóa, sau đó khởi động lại máy tính ', 'C', NULL),
('91', 'IU01', 'Virus có thể lây lan qua? ', 'USB ', 'Môi trường mạng ', 'Ổ cứng di động ', 'Tất cả đều đúng ', 'D', NULL),
('92', 'IU01', 'Điều gì mà tất cả các Virus đều có thể thực hiện? ', 'Lây nhiễm vào BOOT RECORD ', 'Phá huỷ CMOS ', 'Xóa các tệp chương trình trên đĩa cứng ', 'Tự nhân bản ', 'D', NULL),
('93', 'IU01', 'Giao thức nào được sử dụng cho trình duyệt web? ', 'ipx', 'ftp', 'www ', 'http ', 'D', '/img/test.jpg'),
('94', 'IU01', 'Trong hệ điều hành Microsoft Windows, 1 MB bằng ', '1011bytes ', '1024bytes ', '1013bytes ', '106bytes ', 'B', NULL),
('95', 'IU01', 'Trong hệ điều hành Microsoft Windows, phiên bản 32bit nhận và quản lý được bộ nhớ RAM tối đa là ', '4GB ', '2GB ', '3,2GB ', 'Bao nhiêu cũng được ', 'A', NULL),
('96', 'IU01', 'Hệ điều hành là gì? ', 'Là một phần mềm chạy trên máy tính ', 'Là một phần mềm dùng để điều hành, quản lý các thiết bị phần cứng ', 'Là một phần mềm dùng để điều hành, quản lý các tài nguyên phần mềm trên máy tính ', 'Tất cả đều đúng ', 'D', NULL),
('97', 'IU01', 'Trong hệ điều hành Microsoft Windows, định dạng chuẩn của phân vùng đĩa cài hệ điều hành là gì? ', 'FAT ', 'FAT32 ', 'FAT16 ', 'NTFS ', 'D', NULL),
('98', 'IU01', 'Cổng nào sau đây là cổng kết nối giữa màn hình và máy tính ? ', 'COM ', 'Ethernet ', 'Firewire ', 'VGA ', 'D', NULL),
('99', 'IU01', 'Bộ nhớ đệm trong CPU gọi là ', 'ROM ', 'DRAM ', 'Buffer ', 'Cache ', 'D', NULL),
('WD11231', 'EX', 'Công cụ SEARCH trong Windows dùng để :', 'Tìm kiếm file, folder.', 'Dùng để tính toán.', 'Dùng để vẽ.', 'Dùng để soạn thảo văn bản.', 'A', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `result_test`
--

CREATE TABLE `result_test` (
  `id` int(11) NOT NULL,
  `test_id` int(10) NOT NULL,
  `cer_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ques_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `A` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `B` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `C` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `D` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correctanswer` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `result_test`
--

INSERT INTO `result_test` (`id`, `test_id`, `cer_id`, `ques_id`, `A`, `B`, `C`, `D`, `answer`, `correctanswer`) VALUES
(161, 10, 'CB', '100', 'Đọc đĩa CD, DVD ', 'Đọc CD, DVD và ghi đĩa CD ', 'Đọc và ghi đĩa CD, DVD ', 'Đọc và ghi đĩa DVD ', NULL, 'B'),
(162, 10, 'CB', '96', 'Là một phần mềm dùng để điều hành, quản lý các tài nguyên phần mềm trên máy tính ', 'Tất cả đều đúng ', 'Là một phần mềm dùng để điều hành, quản lý các thiết bị phần cứng ', 'Là một phần mềm chạy trên máy tính ', 'D', 'B'),
(163, 10, 'CB', '93', 'ipx', 'ftp', 'http ', 'www ', 'A', 'C'),
(164, 10, 'CB', '98', 'VGA ', 'Firewire ', 'COM ', 'Ethernet ', 'D', 'A'),
(165, 10, 'CB', '95', '4GB ', '2GB ', 'Bao nhiêu cũng được ', '3,2GB ', 'D', 'A'),
(166, 10, 'CB', '97', 'FAT ', 'NTFS ', 'FAT32 ', 'FAT16 ', 'A', 'B'),
(167, 10, 'CB', '91', 'Môi trường mạng ', 'Tất cả đều đúng ', 'USB ', 'Ổ cứng di động ', 'A', 'B'),
(168, 10, 'CB', '99', 'Buffer ', 'ROM ', 'Cache ', 'DRAM ', 'A', 'C'),
(169, 10, 'CB', '94', '1024bytes ', '106bytes ', '1011bytes ', '1013bytes ', 'A', 'A'),
(170, 10, 'CB', '92', 'Tự nhân bản ', 'Phá huỷ CMOS ', 'Lây nhiễm vào BOOT RECORD ', 'Xóa các tệp chương trình trên đĩa cứng ', 'A', 'A'),
(171, 11, 'CB', '98', 'Firewire ', 'COM ', 'Ethernet ', 'VGA ', NULL, 'D'),
(172, 11, 'CB', '100', 'Đọc CD, DVD và ghi đĩa CD ', 'Đọc và ghi đĩa CD, DVD ', 'Đọc và ghi đĩa DVD ', 'Đọc đĩa CD, DVD ', NULL, 'A'),
(173, 11, 'CB', '91', 'Tất cả đều đúng ', 'Môi trường mạng ', 'USB ', 'Ổ cứng di động ', 'A', 'A'),
(174, 11, 'CB', '99', 'ROM ', 'DRAM ', 'Cache ', 'Buffer ', 'A', 'C'),
(175, 11, 'CB', '93', 'ipx', 'ftp', 'www ', 'http ', NULL, 'D'),
(176, 11, 'CB', '96', 'Là một phần mềm chạy trên máy tính ', 'Là một phần mềm dùng để điều hành, quản lý các tài nguyên phần mềm trên máy tính ', 'Là một phần mềm dùng để điều hành, quản lý các thiết bị phần cứng ', 'Tất cả đều đúng ', NULL, 'D'),
(177, 11, 'CB', '95', '3,2GB ', '2GB ', 'Bao nhiêu cũng được ', '4GB ', NULL, 'D'),
(178, 11, 'CB', '94', '106bytes ', '1011bytes ', '1013bytes ', '1024bytes ', NULL, 'D'),
(179, 11, 'CB', '97', 'NTFS ', 'FAT ', 'FAT16 ', 'FAT32 ', NULL, 'A'),
(180, 11, 'CB', '92', 'Tự nhân bản ', 'Lây nhiễm vào BOOT RECORD ', 'Phá huỷ CMOS ', 'Xóa các tệp chương trình trên đĩa cứng ', NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `code` int(1) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`code`, `name`) VALUES
(1, 'admin'),
(2, 'teacher'),
(3, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `time` int(10) NOT NULL,
  `cer_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numquestion` int(10) NOT NULL,
  `nummodule1` int(10) NOT NULL DEFAULT '0',
  `nummodule2` int(10) NOT NULL DEFAULT '0',
  `nummodule3` int(10) NOT NULL DEFAULT '0',
  `nummodule4` int(10) NOT NULL DEFAULT '0',
  `nummodule5` int(10) NOT NULL DEFAULT '0',
  `nummodule6` int(10) NOT NULL DEFAULT '0',
  `nummodule7` int(10) NOT NULL DEFAULT '0',
  `nummodule8` int(10) NOT NULL DEFAULT '0',
  `nummodule9` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `name`, `datetime`, `time`, `cer_id`, `teacher_id`, `numquestion`, `nummodule1`, `nummodule2`, `nummodule3`, `nummodule4`, `nummodule5`, `nummodule6`, `nummodule7`, `nummodule8`, `nummodule9`) VALUES
('0012', 'akjshdkajs', '2016-12-15 15:30:00', 10, 'NC', NULL, 15, 0, 0, 0, 0, 0, 0, 6, 4, 5),
('test', 'chung chi A', '2016-12-27 14:50:00', 200, 'CB', NULL, 10, 10, 0, 0, 0, 0, 0, 0, 0, 0),
('test02', 'thi nang cao', '2016-12-20 00:11:00', 90, 'NC', NULL, 10, 0, 0, 0, 0, 0, 0, 5, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(10) NOT NULL,
  `student_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `test_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theory_score` float DEFAULT NULL,
  `practice_score` float DEFAULT NULL,
  `sche_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `student_id`, `test_id`, `theory_score`, `practice_score`, `sche_id`) VALUES
(5, '8', '10', NULL, NULL, 'test'),
(6, 'A91', NULL, NULL, NULL, 'test'),
(7, '13', '11', NULL, NULL, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(10) NOT NULL,
  `cer_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `student_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sche_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `cer_id`, `student_id`, `sche_id`) VALUES
(10, 'CB', '8', 'test'),
(11, 'CB', '13', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `mail`, `phone`, `date_create`, `status`, `role`) VALUES
('0013', 'SSS', 'user1', '$2y$08$M2kwc2hzNlRkUlpXRmtua.ia6lsjLx954ghmKLtc/WoH4Br8j0dzG', 'ss@gm.uit', '0122222134', '2016-12-15 15:36:52', '1', 3),
('13', 'phuc', 'phuc', '$2y$08$SWlucExZNFgvbk53b2R6VOfGPbKqOofSpgMQdTHw70gkntEq/tRi2', 'phuc@gmail.com', '123456789', '2016-11-18 10:44:05', '0', 2),
('8', 'admin', 'admin', '$2y$08$WktOQ3pqczF3YVNlbXFkReWDjM2LPvvwDg5SY3uwQiZmRJd3u8JtG', 'admin@gmail.com', '123456', '2016-10-16 16:03:20', '1', 1),
('A004', 'user4', 'user4', '$2y$08$cGpYdWVrZWRJcm5XSUhmRemq.uKQ2unLm.K9FZ6kSSRpqhErsTxgu', 'user4@gm.com', '01228282', '2016-12-15 15:52:52', '1', 2),
('A007', 'user2', 'user2', '$2y$08$emRiM0tqOVFGeVNrRjdwROFNB1qUvZZN1pWZOmlqA4pubkV0qUjwC', 'user2@gm.com', '01228282', '2016-12-15 15:53:18', '1', 3),
('A90', 'user5', 'user5', '$2y$08$Ujg3c0k5Tm5kVFpsVGIrV.QcHyuJkKS3B/jmz6DW0mc5M/DZ3nlaa', 'usad1@asfa', '123', '2016-12-15 16:09:39', '1', 3),
('A91', 'user3', 'user3', '$2y$08$ZUFUTWFpSHY0L0NIcmM4W.mSb5vT7UJfCFtAtk7rmfrCUtSPLpWvS', 'p1@as', '123', '2016-12-15 16:11:25', '1', 2),
('A92', 'user6', 'user6', '$2y$08$RkNRUHFmTjRqRXNyNElOYOc6UYcMJbrHjnQKsegxApwPLG75IG2YC', 'user6@gmail.com', '123456', NULL, NULL, 2),
('A93', 'user7', 'user7', '$2y$08$WmJ3UGI2eTRnb1BvRWJPQetmOfk3p.7g2gDOsnYO9wIYC5M/yR23e', 'user7@gmail.com', '123456', NULL, NULL, 2),
('A95', 'user8', 'user8', '$2y$08$YXJsTWFMQ0NmbGtkd3lRc.1FXMQY53EHZAe4acSNMBmmduCoIvAO2', 'user6@gmail.com', '123456', NULL, NULL, 2),
('A96', 'user9', 'user9', '$2y$08$UmpQL3MvR0FDU0xwbTRObOG69RmexvfwxzfcEcDvRNyG02OlJXwuC', 'user7@gmail.com', '123456', NULL, NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `code_2` (`code`),
  ADD KEY `type_cer` (`type_cer`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kindcode` (`kindcode`),
  ADD KEY `kindcode_2` (`kindcode`);

--
-- Indexes for table `result_test`
--
ALTER TABLE `result_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `cer_id` (`cer_id`),
  ADD KEY `ques_id` (`ques_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cer_id` (`cer_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `sche_id` (`sche_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cer_id` (`cer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `constraints_13` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `result_test`
--
ALTER TABLE `result_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `code` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `Module_ibfk_1` FOREIGN KEY (`type_cer`) REFERENCES `certificate` (`id`);

--
-- Constraints for table `result_test`
--
ALTER TABLE `result_test`
  ADD CONSTRAINT `result_test_ibfk_3` FOREIGN KEY (`cer_id`) REFERENCES `certificate` (`id`),
  ADD CONSTRAINT `result_test_ibfk_4` FOREIGN KEY (`ques_id`) REFERENCES `question` (`id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`cer_id`) REFERENCES `certificate` (`id`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_4` FOREIGN KEY (`sche_id`) REFERENCES `schedule` (`id`),
  ADD CONSTRAINT `score_ibfk_5` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`cer_id`) REFERENCES `certificate` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
