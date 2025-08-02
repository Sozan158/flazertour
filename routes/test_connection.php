<?php
$host = 'localhost';
$dbname = 'flazertour';  // Tên CSDL bạn muốn kết nối
$username = 'root';      // Nếu bạn dùng XAMPP thường là 'root'
$password = 'Admin@123';          // XAMPP mặc định không có mật khẩu

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    echo "<h2 style='color:green;'>✅ Kết nối MySQL thành công tới cơ sở dữ liệu <b>$dbname</b></h2>";
} catch (PDOException $e) {
    echo "<h2 style='color:red;'>❌ Kết nối thất bại: " . $e->getMessage() . "</h2>";
}
?>
