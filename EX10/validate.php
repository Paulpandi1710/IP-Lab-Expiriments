<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation Result</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { 
            min-height: 100vh; display: flex; align-items: center; justify-content: center; 
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            padding: 20px;
        }
        .card {
            background: rgba(255, 255, 255, 0.95); padding: 40px;
            border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            width: 100%; max-width: 450px; text-align: center;
        }
        .success { color: #28a745; font-size: 24px; margin-bottom: 15px; }
        .error { color: #dc3545; font-size: 24px; margin-bottom: 15px; }
        .error-list { text-align: left; color: #dc3545; margin: 20px 0; padding-left: 20px; }
        .btn {
            display: inline-block; padding: 12px 25px;
            background: #2a5298; color: white; text-decoration: none;
            border-radius: 8px; font-weight: bold; margin-top: 20px;
            transition: background 0.3s;
        }
        .btn:hover { background: #1e3c72; }
    </style>
</head>
<body>
    <div class="card">
        <?php
        $errors = [];
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $ccnumber = $_POST['ccnumber'] ?? '';
        $phone = $_POST['phone'] ?? '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
        if (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long.";
        }
        if (!preg_match("/^\d{16}$/", preg_replace('/\s+/', '', $ccnumber))) {
            $errors[] = "Credit card must be a 16-digit number.";
        }
        if (!preg_match("/^\d{10}$/", preg_replace('/\s+/', '', $phone))) {
            $errors[] = "Phone number must be a 10-digit number.";
        }

        if (empty($errors)) {
            echo "<h2 class='success'>✅ Registration Successful!</h2>";
            echo "<p>Your account has been created securely.</p>";
        } else {
            echo "<h2 class='error'>❌ Validation Failed</h2>";
            echo "<ul class='error-list'>";
            foreach ($errors as $error) {
                echo "<li>" . htmlspecialchars($error) . "</li>";
            }
            echo "</ul>";
        }
        ?>
        <a href="index.html" class="btn">Go Back</a>
    </div>
</body>
</html>
