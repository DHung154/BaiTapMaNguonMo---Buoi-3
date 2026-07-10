<?php
// exchange.php - Lấy tỷ giá ngoại tệ từ API thật (có fallback dữ liệu mẫu nếu không kết nối được)
header('Content-Type: application/json; charset=utf-8');

$base = strtoupper($_GET['base'] ?? 'USD');

// API miễn phí, không cần key: https://www.exchangerate-api.com/docs/free
$apiUrl = "https://api.exchangerate-api.com/v4/latest/" . urlencode($base);

$response = false;
$context = stream_context_create(['http' => ['timeout' => 5]]);
$response = @file_get_contents($apiUrl, false, $context);

if ($response === false) {
    // Dữ liệu mẫu dùng khi server không có internet hoặc API lỗi
    echo json_encode([
        'base' => $base,
        'date' => date('Y-m-d'),
        'rates' => [
            'VND' => 25450,
            'EUR' => 0.92,
            'JPY' => 156.3,
            'GBP' => 0.79,
            'AUD' => 1.51,
            'KRW' => 1385.5
        ],
        'note' => 'Dữ liệu mẫu (không kết nối được API thật lúc này)'
    ]);
    exit;
}

echo $response;
