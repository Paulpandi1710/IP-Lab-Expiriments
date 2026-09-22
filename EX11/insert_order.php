<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Status</title>
    <style>
        body { background: #f4f7f6; display: flex; justify-content: center; padding: 50px 20px; font-family: 'Segoe UI', sans-serif; }
        .card { background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.1); max-width: 500px; width: 100%; text-align: center; }
        .success { color: #4CAF50; }
        .error { color: #f44336; }
        .btn { display: inline-block; padding: 10px 20px; background: #4CAF50; color: white; text-decoration: none; border-radius: 6px; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="card">
        <?php
        include "db_connect.php";

        $customer_name = $_POST['customer_name'] ?? '';
        $product_name = $_POST['product_name'] ?? '';
        $quantity = (int)($_POST['quantity'] ?? 0);
        $price = (float)($_POST['price'] ?? 0);

        if ($quantity > 0 && $price >= 0 && !empty($customer_name) && !empty($product_name)) {
            $sql = "INSERT INTO orders (customer_name, product_name, quantity, price) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssid", $customer_name, $product_name, $quantity, $price);

            if ($stmt->execute()) {
                echo "<h2 class='success'>✅ Order Placed Successfully!</h2>";
                echo "<p>Thank you, " . htmlspecialchars($customer_name) . ".</p>";
            } else {
                echo "<h2 class='error'>❌ Order Failed</h2>";
                echo "<p>" . htmlspecialchars($stmt->error) . "</p>";
            }
            $stmt->close();
        } else {
            echo "<h2 class='error'>❌ Invalid Input</h2><p>Please check your form fields.</p>";
        }
        $conn->close();
        ?>
        <br>
        <a href="view_orders.php" class="btn">View All Orders</a>
        <a href="index.html" class="btn" style="background:#666;">New Order</a>
    </div>
</body>
</html>
