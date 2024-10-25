<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả xổ số</title>
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
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 600px;
            text-align: center;
        }

        .top-left {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .balance {
            font-size: 16px;
            color: #333;
            font-weight: bold;
        }

        .btn-nap-tien {
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-nap-tien:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #000000;
        }

        th {
            background-color: #000000;
        }

        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="top-left">
            <?php
            session_start(); // Bắt đầu session
            // Kiểm tra nếu số dư đã được thiết lập trong session
            if (!isset($_SESSION['balance'])) {
                $_SESSION['balance'] = 1000000; // Khởi tạo số dư nếu chưa có
            }
            $balance = $_SESSION['balance'];
            echo "<span class='balance'>Số dư: " . number_format($balance, 0, ',', '.') . " VND</span>";
            ?>
            <a href="nap_tien.php" class="btn-nap-tien">Nạp Tiền</a>
        </div>

        <h1>Kết quả xổ số</h1>

        <?php
        // Thông tin kết nối đến cơ sở dữ liệu
        $dsn = 'mysql:host=localhost:3307;dbname=lottery';
        $username = 'root'; 
        $password = '';

        try {
            // Kết nối đến cơ sở dữ liệu
            $db = new PDO($dsn, $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Truy vấn kết quả xổ số
            $query = "SELECT * FROM results ORDER BY draw_date DESC";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($results) {
                echo "<table>
                        <thead>
                            <tr>
                                <th>Ngày quay</th>
                                <th>Số trúng</th>
                                <th>Hạng giải thưởng</th>
                            </tr>
                        </thead>
                        <tbody>";
                foreach ($results as $result) {
                    echo "<tr>
                            <td>" . htmlspecialchars($result['draw_date']) . "</td>
                            <td>" . htmlspecialchars($result['winning_numbers']) . "</td>
                            <td>" . htmlspecialchars($result['prize_category']) . "</td>
                        </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>Không có kết quả xổ số nào.</p>";
            }

        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }
        ?>

        <form action="play.php" method="get">
            <button type="submit">Đặt cược ngay cho hôm nay</button>
        </form>
    </div>
</body>
</html>
