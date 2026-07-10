<?php
// config.php - Kết nối tới MySQL bằng PDO
// Chỉnh lại $user, $pass cho đúng với XAMPP/MySQL của bạn

$host = 'localhost';
$db   = 'lab_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    header('Content-Type: application/json');
    die(json_encode([
        'success' => false,
        'errors' => ['Không kết nối được database: ' . $e->getMessage()]
    ]));
}
