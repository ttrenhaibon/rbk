<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nạp tiền</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://asianchesscont-shj2014.com/wp-content/uploads/2024/10/cac-phien-ban-game-tai-xiu-truc-tuyen.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            max-width: 600px;
            margin: 20px;
            padding: 20px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .instructions {
            margin-top: 20px;
            text-align: left;
        }
        .instructions p {
            margin: 10px 0;
            line-height: 1.5;
        }
        .small-image {
            width: 10%;
            height: auto;
            margin-top: 10px;
            border-radius: 10px;
        }
        .input-field {
            margin: 10px 0;
            padding: 10px;
            width: calc(100% - 22px);
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn-submit {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
        .btn-home {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-home:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nạp tiền</h1>
        <img src="https://z-p3-scontent.fhan3-2.fna.fbcdn.net/v/t1.15752-9/462565227_1258849635458996_2847629946448952815_n.jpg" alt="Hình ảnh nhỏ" class="small-image">
        
        <?php
        session_start(); // Bắt đầu session

        // Thông tin nạp tiền
        $accountNumber = "123456789"; // Số tài khoản
        $bankName = "Ngân hàng ABC";

        // Kiểm tra nếu có thông tin nạp tiền được gửi
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $amount = intval($_POST['amount']); // Lấy số tiền nạp từ form

            if ($amount < 20000) {
                echo "<p style='color:red;'>Số tiền nạp tối thiểu là 20.000 VND!</p>";
            } else {
                // Khởi tạo số dư nếu chưa có
                if (!isset($_SESSION['balance'])) {
                    $_SESSION['balance'] = 1000000; // Giả sử số dư khởi tạo
                }
                $_SESSION['balance'] += $amount; // Cộng số tiền nạp vào số dư
                
                // Chuyển hướng đến trang kết quả xổ số
                header('Location: index.php');
                exit;
            }
        }
        ?>

        <!-- Hiển thị hướng dẫn nạp tiền -->
        <div class="instructions">
            <h2>Hướng dẫn nạp tiền</h2>
            <p><strong>Số tài khoản:</strong> <?php echo $accountNumber; ?></p>
            <p><strong>Ngân hàng:</strong> <?php echo $bankName; ?></p>
            <p>Vui lòng quét mã QR bằng ứng dụng ngân hàng hoặc ví điện tử để nạp tiền vào tài khoản.</p>
            <p>Nếu có bất kỳ thắc mắc nào, vui lòng liên hệ bộ phận hỗ trợ.</p>
        </div>

        <!-- Thêm các ô nhập -->
        <input type="text" class="input-field" placeholder="Tên tài khoản người nạp" required>
        <input type="text" class="input-field" placeholder="Số tài khoản người nạp" required>
        <form action="" method="post"> <!-- Form gửi số tiền -->
            <input type="number" name="amount" class="input-field" placeholder="Số tiền nạp" required>
            <button type="submit" class="btn-submit">Đã nạp</button>
        </form>

        <!-- Nút quay về trang chủ -->
        <a href="index.php" class="btn-home">Về trang chủ</a>
    </div>
</body>
</html>
