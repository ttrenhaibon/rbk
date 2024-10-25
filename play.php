<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt cược xổ số</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url('https://casino.betmgm.com/en/blog/wp-content/uploads/2022/07/Blackjack-terms-header.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0; /* Reset margin */
            color: black; /* Đặt màu chữ */
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            align-items: center; /* Căn giữa các phần tử trong form */
        }

        label {
            margin-bottom: 10px; /* Khoảng cách dưới nhãn */
            font-weight: bold;
        }

        input[type="text"], input[type="number"] {
            width: 100%; /* Chiều rộng tối đa */
            padding: 10px;
            margin-bottom: 20px; /* Khoảng cách dưới trường nhập */
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%; /* Đặt chiều rộng cho nút */
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            margin-top: 20px;
            color: white; /* Màu chữ của liên kết */
            text-decoration: underline; /* Gạch chân liên kết */
        }

        a:hover {
            color: #ddd; /* Màu chữ khi hover */
        }
    </style>
</head>
<body>
    <h1>Đặt cược xổ số</h1>

    <form action="submit_bet.php" method="post">
        <label for="bet_numbers">Nhập dãy số của bạn (ví dụ: 01, 23, 45, 67, 89, 10):</label>
        <input type="text" id="bet_numbers" name="bet_numbers" required>

        <label for="bet_amount">Số tiền đặt cược (VNĐ):</label>
        <input type="number" id="bet_amount" name="bet_amount" required>

        <button type="submit">Đặt cược</button>
    </form>

    <a href="index.php">Quay lại trang kết quả</a>
</body>
</html>
