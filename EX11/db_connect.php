<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping_db";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");
} catch (Exception $e) {
    die("<div style='background:#fee;color:#c00;padding:20px;border-radius:8px;font-family:sans-serif;'>
            <h3>Database Connection Error</h3>
            <p>" . $e->getMessage() . "</p>
         </div>");
}
?>
