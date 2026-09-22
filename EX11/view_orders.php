<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Orders</title>
    <style>
        body { background: #f4f7f6; padding: 40px 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .container { max-width: 1000px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.1); }
        h2 { color: #333; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background-color: #f8f9fa; color: #555; font-weight: 600; text-transform: uppercase; font-size: 13px; }
        tr:hover { background-color: #f5f5f5; }
        .amount { font-weight: bold; color: #4CAF50; }
        .btn { display: inline-block; padding: 12px 24px; background: #4CAF50; color: white; text-decoration: none; border-radius: 8px; margin-top: 30px; font-weight: bold; }
        .btn:hover { background: #45a049; }
        .empty-state { text-align: center; padding: 40px; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <h2>📦 Order History</h2>
        <?php
        include "db_connect.php";
        
        // Ensure table exists (create if not exists for better portability)
        $conn->query("CREATE TABLE IF NOT EXISTS orders (
            order_id INT AUTO_INCREMENT PRIMARY KEY,
            customer_name VARCHAR(100) NOT NULL,
            product_name VARCHAR(100) NOT NULL,
            quantity INT NOT NULL,
            price DECIMAL(10,2) NOT NULL,
            order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        $sql = "SELECT * FROM orders ORDER BY order_date DESC";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Customer</th><th>Product</th><th>Qty</th><th>Price</th><th>Total</th><th>Date</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $total = $row['quantity'] * $row['price'];
                echo "<tr>";
                echo "<td>#" . htmlspecialchars($row['order_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                echo "<td>$" . number_format($row['price'], 2) . "</td>";
                echo "<td class='amount'>$" . number_format($total, 2) . "</td>";
                echo "<td>" . htmlspecialchars(date('M j, Y g:i A', strtotime($row['order_date']))) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<div class='empty-state'><h3>No orders found.</h3><p>Be the first to place an order!</p></div>";
        }
        $conn->close();
        ?>
        <a href="index.html" class="btn">➕ Place Another Order</a>
    </div>
</body>
</html>
