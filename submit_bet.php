<?php
session_start(); // Bắt đầu session

// Kiểm tra nếu số dư đã được thiết lập trong session
if (!isset($_SESSION['balance'])) {
    $_SESSION['balance'] = 1000000; // Khởi tạo số dư nếu chưa có
}

// Lấy thông tin từ form
$bet_numbers = $_POST['bet_numbers'];
$bet_amount = intval($_POST['bet_amount']);
$balance = $_SESSION['balance'];

// Kiểm tra số dư trước khi đặt cược
if ($bet_amount > $balance) {
    echo "<p style='color:red;'>Số tiền đặt cược lớn hơn số dư hiện tại!</p>";
    echo '<a href="play.php">Quay lại trang đặt cược</a>';
    exit;
}

// Trừ số tiền đặt cược từ số dư
$_SESSION['balance'] -= $bet_amount;

// Có thể thêm mã để xử lý đặt cược ở đây (ví dụ: lưu vào cơ sở dữ liệu)

// Chuyển hướng về trang kết quả xổ số
header('Location: index.php');
exit;
?>
