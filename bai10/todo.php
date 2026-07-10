<?php
// todo.php - API xử lý To-do list, lưu dữ liệu vào file JSON
header('Content-Type: application/json; charset=utf-8');

$file = __DIR__ . '/todos.json';

function loadTodos($file) {
    if (!file_exists($file)) return [];
    $content = file_get_contents($file);
    $data = json_decode($content, true);
    return is_array($data) ? $data : [];
}

function saveTodos($file, $todos) {
    file_put_contents($file, json_encode($todos, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
}

$method = $_SERVER['REQUEST_METHOD'];

// GET: lấy danh sách công việc
if ($method === 'GET') {
    echo json_encode(loadTodos($file));
    exit;
}

// POST: thêm / xóa / đánh dấu hoàn thành
$input = json_decode(file_get_contents('php://input'), true);
$todos = loadTodos($file);
$action = $input['action'] ?? '';

switch ($action) {
    case 'add':
        $text = trim($input['text'] ?? '');
        if ($text !== '') {
            $todos[] = [
                'id'   => uniqid(),
                'text' => htmlspecialchars($text),
                'done' => false
            ];
        }
        break;

    case 'toggle':
        foreach ($todos as &$t) {
            if ($t['id'] === $input['id']) {
                $t['done'] = !$t['done'];
            }
        }
        unset($t);
        break;

    case 'delete':
        $todos = array_values(array_filter($todos, function ($t) use ($input) {
            return $t['id'] !== $input['id'];
        }));
        break;
}

saveTodos($file, $todos);
echo json_encode($todos);   