<?php
// register.php - Xử lý đăng ký tài khoản bằng mysqli

$host = "localhost";
$user = "root";
$pass = "";
$db   = "userdb";

// Bắt lỗi kết nối rõ ràng thay vì để crash
$conn = @new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error .
        " (Kiểm tra lại: MySQL trong Laragon đã Start chưa? Database '$db' đã được tạo chưa?)");
}
$conn->set_charset("utf8mb4");

$username = trim($_POST['username'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// Kiểm tra dữ liệu phía server (không chỉ tin JS)
if (strlen($username) < 3) {
    echo "Tên đăng nhập phải >= 3 ký tự";
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email không hợp lệ";
    exit;
}
if (strlen($password) < 6) {
    echo "Mật khẩu phải >= 6 ký tự";
    exit;
}

// Kiểm tra trùng username hoặc email
$check = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
$check->bind_param("ss", $username, $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "Tên đăng nhập hoặc email đã tồn tại";
    $check->close();
    $conn->close();
    exit;
}
$check->close();

// Mã hóa mật khẩu và lưu vào DB
$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $hash);

if ($stmt->execute()) {
    echo "Đăng ký thành công!";
} else {
    echo "Lỗi: " . $stmt->error;
}

$stmt->close();
$conn->close();
